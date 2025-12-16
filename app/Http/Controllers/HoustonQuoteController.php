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
        Mail::mailer('houston_limo')->to('info@limoserviceinhouston.com')->send(new HoustonQuoteAdminMail($data));
        Mail::mailer('houston_limo')->to('muhammadtahawahid1@gmail.com')->send(new HoustonQuoteAdminMail($data));

        Mail::mailer('houston_limo')->to($data['email'])->send(new HoustonQuoteCustomerMail($data));

        return back()->with('status', 'Thank you! Your quote request was received. We will contact you shortly.');
    }
}
