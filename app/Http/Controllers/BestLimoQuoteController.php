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
        Mail::mailer('best_limousines')->to('info@bestlimousines.com')->send(new BestLimoQuoteAdminMail($data));
        Mail::mailer('best_limousines')->to('muhammadtahawahid1@gmail.com')->send(new BestLimoQuoteAdminMail($data));

        Mail::mailer('best_limousines')->to($data['email'])->send(new BestLimoQuoteCustomerMail($data));

        return back()->with('status', 'Thank you! Your quote request was received. We will contact you shortly.');
    }
}
