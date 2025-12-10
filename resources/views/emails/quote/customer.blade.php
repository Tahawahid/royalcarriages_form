<x-mail::message>
<div style="text-align:center; margin-bottom:32px; padding:24px; background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); border-radius:16px; box-shadow: 0 8px 32px rgba(59, 130, 246, 0.3);">
    <img src="{{ asset('assets/images/logo.png') }}" alt="Royal Carriages" style="height:80px; object-fit:contain; margin-bottom:16px; filter: brightness(0) invert(1);">
    <h1 style="color: white; font-size: 32px; font-weight: bold; margin: 0; text-shadow: 0 2px 8px rgba(0,0,0,0.3); letter-spacing: -0.5px;">Quote Request Received!</h1>
    <p style="color: #dbeafe; margin: 12px 0 0 0; font-size: 18px; font-weight: 500;">We'll get back to you soon with your personalized quote 💰</p>
</div>

<div style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%); padding: 24px; border-radius: 12px; margin-bottom: 24px; border: 1px solid #bae6fd;">
    <h2 style="color: #0c4a6e; font-size: 20px; margin: 0 0 8px 0; display: flex; align-items: center;">
        👋 Hi {{ $data['first_name'] }},
    </h2>
    <p style="color: #0f172a; line-height: 1.7; margin: 0; font-size: 16px;">
        Thank you for your interest in Royal Carriages! We have received your quote request and our team will review your requirements and provide you with a <strong style="color: #0ea5e9;">personalized quote within 24 hours</strong>. We're excited to help make your transportation experience exceptional!
    </p>
</div>

<div style="background: #f8fafc; padding: 24px; border-radius: 12px; margin-bottom: 24px; border-left: 6px solid #16a34a;">
    <h2 style="color: #15803d; font-size: 22px; margin: 0 0 20px 0; display: flex; align-items: center;">
        📄 Your Quote Request Details
    </h2>
    
    <div style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
        <table style="width: 100%; border-collapse: collapse;">
            <tr><td style="padding: 10px 0; font-weight: bold; color: #374151; width: 140px; border-bottom: 1px solid #f1f5f9;">Service Type:</td><td style="color: #111827; border-bottom: 1px solid #f1f5f9;"><span style="background: #dcfce7; color: #15803d; padding: 6px 12px; border-radius: 20px; font-weight: 600; font-size: 14px;">{{ ucfirst(str_replace('_', ' ', $data['service_type'])) }}</span></td></tr>
            <tr><td style="padding: 10px 0; font-weight: bold; color: #374151; border-bottom: 1px solid #f1f5f9;">Vehicle:</td><td style="color: #111827; font-size: 18px; font-weight: 600; border-bottom: 1px solid #f1f5f9;">{{ $data['vehicle_type'] }}</td></tr>
            @if(isset($data['passengers']))
            <tr><td style="padding: 10px 0; font-weight: bold; color: #374151; border-bottom: 1px solid #f1f5f9;">Passengers:</td><td style="color: #111827; border-bottom: 1px solid #f1f5f9;">{{ $data['passengers'] }} people</td></tr>
            @endif
            @if(isset($data['suitcases']))
            <tr><td style="padding: 10px 0; font-weight: bold; color: #374151; border-bottom: 1px solid #f1f5f9;">Suitcases:</td><td style="color: #111827; border-bottom: 1px solid #f1f5f9;">{{ $data['suitcases'] }} pieces</td></tr>
            @endif
            @if(isset($data['company']) && !empty($data['company']))
            <tr><td style="padding: 10px 0; font-weight: bold; color: #374151;">Company:</td><td style="color: #111827;">{{ $data['company'] }}</td></tr>
            @endif
        </table>
    </div>
</div>

<div style="background: linear-gradient(135deg, #fef7ff 0%, #f3e8ff 100%); padding: 24px; border-radius: 12px; margin-bottom: 24px; border-left: 6px solid #a855f7;">
    <h2 style="color: #7c3aed; font-size: 20px; margin: 0 0 20px 0; display: flex; align-items: center;">
        📅 Trip Schedule
    </h2>
    
    <div style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
        <h3 style="color: #16a34a; margin: 0 0 12px 0; font-size: 16px;">🛫 Pick-up Details</h3>
        <table style="width: 100%; border-collapse: collapse;">
            <tr><td style="padding: 8px 0; font-weight: bold; color: #374151; width: 80px;">Date:</td><td style="color: #111827;"><span style="background: #f3e8ff; color: #7c3aed; padding: 8px 16px; border-radius: 8px; font-weight: 700; font-size: 16px;">{{ \Carbon\Carbon::parse($data['pickup_date'])->format('l, F j, Y') }}</span></td></tr>
            <tr><td style="padding: 8px 0; font-weight: bold; color: #374151;">Time:</td><td style="color: #111827; font-size: 18px; font-weight: 600;">{{ $data['pickup_time'] }}</td></tr>
            <tr><td style="padding: 8px 0; font-weight: bold; color: #374151; vertical-align: top;">Location:</td><td style="color: #111827; line-height: 1.5;">{{ $data['pickup_location'] }}</td></tr>
        </table>
    </div>
    
    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
        <h3 style="color: #dc2626; margin: 0 0 12px 0; font-size: 16px;">🏁 Drop-off Details</h3>
        <table style="width: 100%; border-collapse: collapse;">
            <tr><td style="padding: 8px 0; font-weight: bold; color: #374151; width: 80px;">Time:</td><td style="color: #111827; font-size: 18px; font-weight: 600;">{{ $data['dropoff_time'] }}</td></tr>
            <tr><td style="padding: 8px 0; font-weight: bold; color: #374151; vertical-align: top;">Location:</td><td style="color: #111827; line-height: 1.5;">{{ $data['dropoff_location'] }}</td></tr>
        </table>
    </div>
</div>

@if(!empty($data['other_requirements']))
<div style="background: #f1f5f9; padding: 20px; border-radius: 12px; margin-bottom: 24px; border-left: 6px solid #64748b;">
    <h2 style="color: #475569; font-size: 18px; margin: 0 0 16px 0; display: flex; align-items: center;">
        📝 Your Special Requirements
    </h2>
    <div style="background: white; padding: 16px; border-radius: 8px; color: #111827; line-height: 1.6; border-left: 4px solid #64748b;">
        {{ $data['other_requirements'] }}
    </div>
</div>
@endif

<div style="background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%); padding: 24px; border-radius: 12px; margin-bottom: 24px; border: 2px solid #fbbf24;">
    <h2 style="color: #92400e; font-size: 20px; margin: 0 0 16px 0; display: flex; align-items: center;">
        ⏰ What Happens Next?
    </h2>
    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
        <ul style="color: #111827; margin: 0; padding-left: 20px; line-height: 1.8;">
            <li><strong style="color: #f59e0b;">Review:</strong> Our team will review your requirements and vehicle availability</li>
            <li><strong style="color: #f59e0b;">Quote:</strong> We'll prepare a personalized quote with transparent pricing</li>
            <li><strong style="color: #f59e0b;">Contact:</strong> You'll receive your quote via email or phone within 24 hours</li>
            <li><strong style="color: #f59e0b;">Book:</strong> Simply confirm your booking and we'll handle the rest!</li>
        </ul>
    </div>
</div>

<div style="text-align: center; margin: 32px 0;">
    <div style="background: #16a34a; padding: 20px; border-radius: 12px; margin-bottom: 24px;">
        <h2 style="color: white; font-size: 22px; margin: 0 0 16px 0;">📞 Need to Speak with Us?</h2>
        <p style="color: #dcfce7; margin: 0 0 20px 0; font-size: 16px;">Have questions or need to modify your request? We're here to help!</p>
        
        <x-mail::button :url="'tel:+17137875466'" color="success" style="background: white; color: #16a34a; font-weight: bold; padding: 16px 32px; border-radius: 8px; text-decoration: none; display: inline-block; margin: 8px;">
            📱 Call: (713) 787-5466
        </x-mail::button>
        
        <div style="margin-top: 16px;">
            <p style="color: white; margin: 0; font-size: 14px;">
                <strong>Business Hours:</strong> Monday - Sunday, 24/7<br>
                <strong>Email:</strong> <a href="mailto:quotes@royalcarriages.com" style="color: #dcfce7; text-decoration: underline;">quotes@royalcarriages.com</a>
            </p>
        </div>
    </div>
</div>

<div style="background: #f8fafc; padding: 24px; border-radius: 12px; text-align: center; border-top: 4px solid #3b82f6;">
    <h3 style="color: #374151; font-size: 20px; margin: 0 0 12px 0;">🌟 Thank you for considering Royal Carriages!</h3>
    <p style="color: #6b7280; margin: 0; font-size: 16px; line-height: 1.6;">
        We're committed to providing you with exceptional luxury transportation service.<br>
        <strong style="color: #3b82f6;">Your quote request is our priority.</strong>
    </p>
    
    <div style="margin-top: 20px; padding-top: 16px; border-top: 1px solid #e5e7eb; color: #9ca3af; font-size: 12px;">
        Royal Carriages • Luxury Transportation Services<br>
        This is an automated confirmation email sent on {{ now()->format('F j, Y \\a\\t g:i A T') }}
    </div>
</div>
</x-mail::message>
