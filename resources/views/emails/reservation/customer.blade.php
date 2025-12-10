<x-mail::message>
<div style="text-align:center; margin-bottom:32px; padding:24px; background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); border-radius:16px; box-shadow: 0 8px 32px rgba(245, 158, 11, 0.3);">
    <img src="{{ asset('assets/images/logo.png') }}" alt="Royal Carriages" style="height:80px; object-fit:contain; margin-bottom:16px; filter: brightness(0) invert(1);">
    <h1 style="color: white; font-size: 32px; font-weight: bold; margin: 0; text-shadow: 0 2px 8px rgba(0,0,0,0.3); letter-spacing: -0.5px;">Thank You!</h1>
    <p style="color: #fef3c7; margin: 12px 0 0 0; font-size: 18px; font-weight: 500;">Your reservation request has been received 🎉</p>
</div>

<div style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%); padding: 24px; border-radius: 12px; margin-bottom: 24px; border: 1px solid #bae6fd;">
    <h2 style="color: #0c4a6e; font-size: 20px; margin: 0 0 8px 0; display: flex; align-items: center;">
        👋 Dear {{ $data['first_name'] }},
    </h2>
    <p style="color: #0f172a; line-height: 1.7; margin: 0; font-size: 16px;">
        We have received your reservation request and will contact you <strong style="color: #0ea5e9;">within 24 hours</strong> to confirm all details and process your payment. Our team is excited to provide you with exceptional luxury transportation!
    </p>
</div>

<div style="background: #f8fafc; padding: 24px; border-radius: 12px; margin-bottom: 24px; border-left: 6px solid #16a34a;">
    <h2 style="color: #15803d; font-size: 22px; margin: 0 0 20px 0; display: flex; align-items: center;">
        🚗 Your Reservation Summary
    </h2>
    
    <div style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
        <table style="width: 100%; border-collapse: collapse;">
            <tr><td style="padding: 10px 0; font-weight: bold; color: #374151; width: 140px; border-bottom: 1px solid #f1f5f9;">Service Type:</td><td style="color: #111827; border-bottom: 1px solid #f1f5f9;"><span style="background: #dcfce7; color: #15803d; padding: 6px 12px; border-radius: 20px; font-weight: 600; font-size: 14px;">{{ ucfirst(str_replace('_', ' ', $data['service_type'])) }}</span></td></tr>
            <tr><td style="padding: 10px 0; font-weight: bold; color: #374151; border-bottom: 1px solid #f1f5f9;">Vehicle:</td><td style="color: #111827; font-size: 18px; font-weight: 600; border-bottom: 1px solid #f1f5f9;">{{ $data['vehicle_type'] }}</td></tr>
            @if(isset($data['passengers']))
            <tr><td style="padding: 10px 0; font-weight: bold; color: #374151; border-bottom: 1px solid #f1f5f9;">Passengers:</td><td style="color: #111827; border-bottom: 1px solid #f1f5f9;">{{ $data['passengers'] }} people</td></tr>
            @endif
            @if(isset($data['suitcases']))
            <tr><td style="padding: 10px 0; font-weight: bold; color: #374151;">Suitcases:</td><td style="color: #111827;">{{ $data['suitcases'] }} pieces</td></tr>
            @endif
        </table>
    </div>
</div>

<div style="background: linear-gradient(135deg, #fef7ff 0%, #f3e8ff 100%); padding: 24px; border-radius: 12px; margin-bottom: 24px; border-left: 6px solid #a855f7;">
    <h2 style="color: #7c3aed; font-size: 20px; margin: 0 0 20px 0; display: flex; align-items: center;">
        📅 Trip Schedule
    </h2>
    
    <div style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
        <h3 style="color: #16a34a; margin: 0 0 12px 0; font-size: 16px;">🛫 Pick-up</h3>
        <table style="width: 100%; border-collapse: collapse;">
            <tr><td style="padding: 8px 0; font-weight: bold; color: #374151; width: 80px;">Date:</td><td style="color: #111827;"><span style="background: #f3e8ff; color: #7c3aed; padding: 8px 16px; border-radius: 8px; font-weight: 700; font-size: 16px;">{{ \Carbon\Carbon::parse($data['pickup_date'])->format('l, F j, Y') }}</span></td></tr>
            <tr><td style="padding: 8px 0; font-weight: bold; color: #374151;">Time:</td><td style="color: #111827; font-size: 18px; font-weight: 600;">{{ $data['pickup_time'] }}</td></tr>
            <tr><td style="padding: 8px 0; font-weight: bold; color: #374151; vertical-align: top;">Location:</td><td style="color: #111827; line-height: 1.5;">{{ $data['pickup_location'] }}</td></tr>
        </table>
    </div>
    
    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
        <h3 style="color: #dc2626; margin: 0 0 12px 0; font-size: 16px;">🏁 Drop-off</h3>
        <table style="width: 100%; border-collapse: collapse;">
            <tr><td style="padding: 8px 0; font-weight: bold; color: #374151; width: 80px;">Time:</td><td style="color: #111827; font-size: 18px; font-weight: 600;">{{ $data['dropoff_time'] }}</td></tr>
            <tr><td style="padding: 8px 0; font-weight: bold; color: #374151; vertical-align: top;">Location:</td><td style="color: #111827; line-height: 1.5;">{{ $data['dropoff_location'] }}</td></tr>
        </table>
    </div>
</div>

@if(isset($data['return_pickup_date']))
<div style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%); padding: 24px; border-radius: 12px; margin-bottom: 24px; border-left: 6px solid #0ea5e9;">
    <h2 style="color: #0284c7; font-size: 20px; margin: 0 0 20px 0; display: flex; align-items: center;">
        ↩️ Return Trip Details
    </h2>
    
    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
        <table style="width: 100%; border-collapse: collapse;">
            <tr><td style="padding: 10px 0; font-weight: bold; color: #374151; width: 140px; border-bottom: 1px solid #f1f5f9;">Return Date:</td><td style="border-bottom: 1px solid #f1f5f9;"><span style="background: #e0f2fe; color: #0284c7; padding: 8px 16px; border-radius: 8px; font-weight: 700; font-size: 16px;">{{ \Carbon\Carbon::parse($data['return_pickup_date'])->format('l, F j, Y') }}</span></td></tr>
            <tr><td style="padding: 10px 0; font-weight: bold; color: #374151; border-bottom: 1px solid #f1f5f9;">Pick-up:</td><td style="color: #111827; border-bottom: 1px solid #f1f5f9;"><strong>{{ $data['return_pickup_time'] }}</strong> from {{ $data['return_pickup_location'] }}</td></tr>
            <tr><td style="padding: 10px 0; font-weight: bold; color: #374151;">Drop-off:</td><td style="color: #111827;"><strong>{{ $data['return_dropoff_time'] }}</strong> to {{ $data['return_dropoff_location'] }}</td></tr>
        </table>
        @if(!empty($data['return_other_requirements']))
        <div style="margin-top: 16px; padding: 12px; background: #e0f2fe; border-radius: 6px; border-left: 4px solid #0ea5e9;">
            <strong style="color: #0284c7;">Return Requirements:</strong><br>
            <span style="color: #0f172a;">{{ $data['return_other_requirements'] }}</span>
        </div>
        @endif
    </div>
</div>
@endif

@if(!empty($data['special_requirements']))
<div style="background: #f1f5f9; padding: 20px; border-radius: 12px; margin-bottom: 24px; border-left: 6px solid #64748b;">
    <h2 style="color: #475569; font-size: 18px; margin: 0 0 16px 0; display: flex; align-items: center;">
        📝 Special Requirements
    </h2>
    <div style="background: white; padding: 16px; border-radius: 8px; color: #111827; line-height: 1.6; border-left: 4px solid #64748b;">
        {{ $data['special_requirements'] }}
    </div>
</div>
@endif

<div style="background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%); padding: 24px; border-radius: 12px; margin-bottom: 24px; border: 2px solid #fbbf24;">
    <h2 style="color: #92400e; font-size: 20px; margin: 0 0 16px 0; display: flex; align-items: center;">
        💳 Payment Information on File
    </h2>
    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
        <table style="width: 100%; border-collapse: collapse;">
            <tr><td style="padding: 10px 0; font-weight: bold; color: #374151; width: 140px; border-bottom: 1px solid #f1f5f9;">Card Holder:</td><td style="color: #111827; font-weight: 600; border-bottom: 1px solid #f1f5f9;">{{ $data['card_holder'] ?? '—' }}</td></tr>
            <tr><td style="padding: 10px 0; font-weight: bold; color: #374151; border-bottom: 1px solid #f1f5f9;">Card Number:</td><td style="color: #6b7280; font-family: monospace; font-size: 16px; border-bottom: 1px solid #f1f5f9;">{{ $data['card_last_four'] ?? '—' }}</td></tr>
            <tr><td style="padding: 10px 0; font-weight: bold; color: #374151; vertical-align: top;">Billing Address:</td><td style="color: #111827; line-height: 1.5;">{{ $data['billing_address'] ?? '—' }}<br>{{ $data['billing_city'] ?? '—' }}, {{ $data['billing_state'] ?? '—' }} {{ $data['billing_zip'] ?? '—' }}</td></tr>
        </table>
        <div style="margin-top: 16px; padding: 12px; background: #fef3c7; border-radius: 6px; border-left: 4px solid #f59e0b;">
            <p style="color: #92400e; margin: 0; font-size: 14px; display: flex; align-items: center;">
                🔒 <strong>Secure:</strong> Payment will be processed when your reservation is confirmed by our team.
            </p>
        </div>
    </div>
</div>

<div style="text-align: center; margin: 32px 0;">
    <div style="background: #16a34a; padding: 20px; border-radius: 12px; margin-bottom: 24px;">
        <h2 style="color: white; font-size: 22px; margin: 0 0 16px 0;">📞 Need Immediate Assistance?</h2>
        <p style="color: #dcfce7; margin: 0 0 20px 0; font-size: 16px;">Our customer service team is standing by to help you!</p>
        
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

<div style="background: #f8fafc; padding: 24px; border-radius: 12px; text-align: center; border-top: 4px solid #f59e0b;">
    <h3 style="color: #374151; font-size: 20px; margin: 0 0 12px 0;">🌟 Thank you for choosing Royal Carriages!</h3>
    <p style="color: #6b7280; margin: 0; font-size: 16px; line-height: 1.6;">
        We look forward to providing you with exceptional luxury transportation service.<br>
        <strong style="color: #f59e0b;">Your satisfaction is our priority.</strong>
    </p>
    
    <div style="margin-top: 20px; padding-top: 16px; border-top: 1px solid #e5e7eb; color: #9ca3af; font-size: 12px;">
        Royal Carriages • Luxury Transportation Services<br>
        This is an automated confirmation email sent on {{ now()->format('F j, Y \\a\\t g:i A T') }}
    </div>
</div>
</x-mail::message>