<?php
namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Mail\BestLimoQuoteAdminMail;
use App\Mail\BestLimoQuoteCustomerMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class BestLimoQuoteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(QuoteRequest $request): RedirectResponse
    {
        $data = $request->safe()->except(['turnstile_token', 'website']);

        // Send admin emails using Best Limousines mailer
        // Mail::mailer('best_limousines')->to('info@bestlimousines.com')->send(new BestLimoQuoteAdminMail($data));

        Mail::mailer('best_limousines')->to('muhammadtahawahid1@gmail.com')->send(new BestLimoQuoteAdminMail($data));
        Mail::mailer('best_limousines')->to('sam@royalcarriages.com')->send(new BestLimoQuoteAdminMail($data));
        Mail::mailer('best_limousines')->to('info@bestlimousines.com')->send(new BestLimoQuoteAdminMail($data));

        Mail::mailer('best_limousines')->to($data['email'])->send(new BestLimoQuoteCustomerMail($data));

        return back()->with('status', "👋 Hi {$data['first_name']},\nThank you for requesting a quote!\nOne of our team members will contact you shortly by phone or email regarding your request.\nFor faster service, please call us at 713-974-5466 we're available 24/7");
    }
}
