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

        return back()->with('status', "👋 Hi {$data['first_name']},\nThank you for requesting a quote!\nOne of our team members will contact you shortly by phone or email regarding your request.\nFor faster service, please call us at 713-266-5466 we're available 24/7");
    }
}
