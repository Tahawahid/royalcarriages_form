<?php
namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Mail\HoustonQuoteAdminMail;
use App\Mail\HoustonQuoteCustomerMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class HoustonQuoteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(QuoteRequest $request): RedirectResponse
    {
        $data = $request->safe()->except(['turnstile_token', 'website']);

        // Send admin emails using Houston Limo mailer
        // Mail::mailer('houston_limo')->to('info@limoserviceinhouston.com')->send(new HoustonQuoteAdminMail($data));
        Mail::mailer('houston_limo')->to('muhammadtahawahid1@gmail.com')->send(new HoustonQuoteAdminMail($data));
        Mail::mailer('houston_limo')->to('sam@royalcarriages.com')->send(new HoustonQuoteAdminMail($data));
        Mail::mailer('houston_limo')->to('info@limoserviceinhouston.com')->send(new HoustonQuoteAdminMail($data));

        Mail::mailer('houston_limo')->to($data['email'])->send(new HoustonQuoteCustomerMail($data));

        return back()->with('status', "👋 Hi {$data['first_name']},\nThank you for your interest in Limo Service In Houston! We have received your quote request and our team will review your requirements and provide you with a personalized quote within 24 hours. We're excited to help make your transportation experience exceptional!\n\nIf you need immediate assistance or have questions about a quote you can reach our office line 24/7 Monday-Sunday 713-266-5466.");
    }
}
