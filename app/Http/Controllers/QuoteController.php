<?php
namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Mail\QuoteAdminMail;
use App\Mail\QuoteCustomerMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(QuoteRequest $request): RedirectResponse
    {
        $data = $request->safe()->except(['turnstile_token', 'website']);

        // Send admin emails using Royal Carriages mailer
        // Mail::mailer('royal_carriages')->to('info@royalcarriages.com')->send(new QuoteAdminMail($data));
        Mail::mailer('royal_carriages')->to('muhammadtahawahid1@gmail.com')->send(new QuoteAdminMail($data));
        Mail::mailer('royal_carriages')->to('sam@royalcarriages.com')->send(new QuoteAdminMail($data));
        Mail::mailer('royal_carriages')->to('quotes@royalcarriages.com')->send(new QuoteAdminMail($data));

        Mail::mailer('royal_carriages')->to($data['email'])->send(new QuoteCustomerMail($data));

        return back()->with('status', "👋 Hi {$data['first_name']},\nThank you for your interest in Royal Carriages Limousines & Charter Worldwide! We have received your quote request and our team will review your requirements and provide you with a personalized quote within 24 hours. We're excited to help make your transportation experience exceptional!\n\nIf you need immediate assistance or have questions about a quote you can reach our office line 24/7 Monday-Sunday 713-787-5466.");
    }
}
