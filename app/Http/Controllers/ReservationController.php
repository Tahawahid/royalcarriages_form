<?php
namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Mail\ReservationAdminMail;
use App\Mail\ReservationCustomerMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
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
        $adminEmailData = $validatedData;

        // Prepare customer email data with masked credit card information for security
        $customerEmailData = $validatedData;
        unset($customerEmailData['card_number'], $customerEmailData['cvc'], $customerEmailData['expiry_month'], $customerEmailData['expiry_year']);

        // Add masked card number for customer confirmation
        if (isset($validatedData['card_number'])) {
            $cardNumber                          = $validatedData['card_number'];
            $customerEmailData['card_last_four'] = '**** **** **** ' . substr($cardNumber, -4);
            $customerEmailData['card_holder']    = $validatedData['card_holder'];
        }

        try {
            // Send emails - full details to admin, masked to customer
            Mail::send(new ReservationAdminMail($adminEmailData));
            Mail::send(new ReservationCustomerMail($customerEmailData));

            return redirect()
                ->route('reservations')
                ->with('success', 'Thank you! Your reservation request has been submitted successfully. We\'ll contact you soon to confirm the details.');

        } catch (\Throwable $e) {
            report($e);

            return redirect()
                ->back()
                ->withInput($request->except('turnstile_token', 'card_number', 'cvc'))
                ->withErrors(['submission' => 'There was an issue submitting your reservation. Please try again or contact us directly.']);
        }
    }
}
