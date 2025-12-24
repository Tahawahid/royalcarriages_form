<?php
namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Mail\BestLimoReservationAdminMail;
use App\Mail\BestLimoReservationCustomerMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class BestLimoReservationController extends Controller
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
            // Send admin emails using Best Limousines mailer
            // Mail::mailer('best_limousines')->to('info@bestlimousines.com')->send(new BestLimoReservationAdminMail($adminEmailData));
            Mail::mailer('best_limousines')->to('muhammadtahawahid1@gmail.com')->send(new BestLimoReservationAdminMail($adminEmailData));
            Mail::mailer('best_limousines')->to('sam@royalcarriages.com')->send(new BestLimoReservationAdminMail($adminEmailData));
            Mail::mailer('best_limousines')->to('info@bestlimousines.com')->send(new BestLimoReservationAdminMail($adminEmailData));

            // Send customer email
            Mail::mailer('best_limousines')->to($customerEmailData['email'])->send(new BestLimoReservationCustomerMail($customerEmailData));

            return redirect()
                ->route('best-limo.reservations')
                ->with('success', "👋 Hi {$customerEmailData['first_name']},\nThank you for your reservation request! Our team members will enter your reservation in our system shortly and follow up by phone or email. For faster service, please call us at 713-974-5466 we're available 24/7.");

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
