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

        return back()->with('status', "👋 Hi {$data['first_name']},\nThank you for requesting a quote!\nOne of our team members will contact you shortly by phone or email regarding your request.\nFor faster service, please call us at 713-787-5466 we're available 24/7");
    }
}
