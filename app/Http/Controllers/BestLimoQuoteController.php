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

        return back()->with('status', "👋 Hi {$data['first_name']},\nThank you for your interest in Best Limousines! We have received your quote request and our team will review your requirements and provide you with a personalized quote within 24 hours. We're excited to help make your transportation experience exceptional!\n\nIf you need immediate assistance or have questions about a quote you can reach our office line 24/7 Monday-Sunday 713-974-5466.");
    }
}
