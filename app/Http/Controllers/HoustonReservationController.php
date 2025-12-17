<?php
namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Mail\HoustonReservationAdminMail;
use App\Mail\HoustonReservationCustomerMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class HoustonReservationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ReservationRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        // Remove spam protection fields from data
        unset($validatedData['turnstile_token'], $validatedData['website']);

        // Prepare admin email data with full credit card details
        $adminEmailData                   = $validatedData;
        $adminEmailData['total_amount']   = 0;
        $adminEmailData['payment_method'] = 'Credit Card';
        $adminEmailData['card_type']      = $this->getCardType($validatedData['card_number'] ?? '');

        // Add service-specific fields for hourly reservations
        if (($validatedData['reservation_type'] ?? '') === 'hourly') {
            $pickupTime                         = strtotime($validatedData['pickup_time'] ?? '00:00');
            $dropoffTime                        = strtotime($validatedData['dropoff_time'] ?? '00:00');
            $hoursOfService                     = max(1, abs($dropoffTime - $pickupTime) / 3600);
            $adminEmailData['hours_of_service'] = round($hoursOfService, 1) . ' hours';
        }

        // Prepare customer email data with masked credit card information
        $customerEmailData = $validatedData;
        unset($customerEmailData['card_number'], $customerEmailData['cvc'], $customerEmailData['expiry_month'], $customerEmailData['expiry_year']);

        $customerEmailData['total_amount']   = 0;
        $customerEmailData['payment_method'] = 'Credit Card';
        $customerEmailData['card_type']      = $this->getCardType($validatedData['card_number'] ?? '');

        if (($validatedData['reservation_type'] ?? '') === 'hourly') {
            $pickupTime                            = strtotime($validatedData['pickup_time'] ?? '00:00');
            $dropoffTime                           = strtotime($validatedData['dropoff_time'] ?? '00:00');
            $hoursOfService                        = max(1, abs($dropoffTime - $pickupTime) / 3600);
            $customerEmailData['hours_of_service'] = round($hoursOfService, 1) . ' hours';
        }

        // Add masked card number for customer confirmation
        if (isset($validatedData['card_number'])) {
            $cardNumber                          = $validatedData['card_number'];
            $customerEmailData['card_last_four'] = '**** **** **** ' . substr($cardNumber, -4);
            $customerEmailData['card_holder']    = $validatedData['card_holder'];
        }

        try {
            // Send admin emails using Houston Limo mailer
            // Mail::mailer('houston_limo')->to('info@limoserviceinhouston.com')->send(new HoustonReservationAdminMail($adminEmailData));
            Mail::mailer('houston_limo')->to('muhammadtahawahid1@gmail.com')->send(new HoustonReservationAdminMail($adminEmailData));
            Mail::mailer('houston_limo')->to('sam@royalcarriages.com')->send(new HoustonReservationAdminMail($adminEmailData));
            Mail::mailer('houston_limo')->to('info@limoserviceinhouston.com')->send(new HoustonReservationAdminMail($adminEmailData));
            // Send customer email
            Mail::mailer('houston_limo')->to($customerEmailData['email'])->send(new HoustonReservationCustomerMail($customerEmailData));

            return redirect()
                ->route('houston.reservations')
                ->with('success', "👋 Hi {$customerEmailData['first_name']},\nThank you for your interest in Limo Service In Houston! We have received your reservation request and our team will get back to you once we enter your reservation in the system. We're excited to help make your transportation experience exceptional!\n\nIf you need immediate assistance or have questions about your reservation you can reach our office line 24/7 Monday-Sunday 713-266-5466.");

        } catch (\Throwable $e) {
            report($e);

            return redirect()
                ->back()
                ->withInput($request->except('turnstile_token', 'card_number', 'cvc'))
                ->withErrors(['submission' => 'Error: ' . $e->getMessage() . ' (File: ' . $e->getFile() . ' Line: ' . $e->getLine() . ')']);
        }
    }

    /**
     * Determine credit card type from card number
     */
    private function getCardType(string $cardNumber): string
    {
        $cardNumber = preg_replace('/\D/', '', $cardNumber);

        if (preg_match('/^4/', $cardNumber)) {
            return 'Visa';
        } elseif (preg_match('/^5[1-5]/', $cardNumber) || preg_match('/^2[2-7]/', $cardNumber)) {
            return 'Mastercard';
        } elseif (preg_match('/^3[47]/', $cardNumber)) {
            return 'American Express';
        } elseif (preg_match('/^6011|^65/', $cardNumber)) {
            return 'Discover';
        }

        return 'Credit Card';
    }
}
