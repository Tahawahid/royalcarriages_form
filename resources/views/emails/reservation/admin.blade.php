<x-mail::message>
<div style="text-align:center; margin-bottom:24px; padding:20px; background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); border-radius:12px;">
    <img src="{{ asset('assets/images/logo.png') }}" alt="Royal Carriages" style="height:60px; object-fit:contain; margin-bottom:12px;">
    <h1 style="color: white; font-size: 28px; font-weight: bold; margin: 0; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">New Reservation Request</h1>
    <p style="color: #fef3c7; margin: 8px 0 0 0; font-size: 14px;">Received on {{ now()->format('F j, Y \\a\\t g:i A T') }}</p>
</div>

<div style="background: #f8fafc; padding: 20px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #3b82f6;">
    <h2 style="color: #1e40af; font-size: 18px; margin: 0 0 16px 0; display: flex; align-items: center;">
        👤 Customer Information
    </h2>
    <table style="width: 100%; border-collapse: collapse;">
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151; width: 120px;">Name:</td><td style="color: #111827;">{{ $data['first_name'] }} {{ $data['last_name'] }}</td></tr>
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Email:</td><td style="color: #111827;"><a href="mailto:{{ $data['email'] }}" style="color: #2563eb;">{{ $data['email'] }}</a></td></tr>
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Phone:</td><td style="color: #111827;"><a href="tel:{{ $data['phone'] }}" style="color: #2563eb;">{{ $data['phone'] }}</a></td></tr>
    </table>
</div>

<div style="background: #f0fdf4; padding: 20px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #16a34a;">
    <h2 style="color: #15803d; font-size: 18px; margin: 0 0 16px 0; display: flex; align-items: center;">
        🚗 Service Details
    </h2>
    <table style="width: 100%; border-collapse: collapse;">
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151; width: 120px;">Service:</td><td style="color: #111827; background: #dcfce7; padding: 4px 8px; border-radius: 4px; display: inline-block;">{{ ucfirst(str_replace('_', ' ', $data['service_type'])) }}</td></tr>
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Vehicle:</td><td style="color: #111827;">{{ $data['vehicle_type'] }}</td></tr>
        @if(isset($data['passengers']))
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Passengers:</td><td style="color: #111827;">{{ $data['passengers'] }}</td></tr>
        @endif
        @if(isset($data['suitcases']))
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Suitcases:</td><td style="color: #111827;">{{ $data['suitcases'] }}</td></tr>
        @endif
    </table>
</div>

<div style="background: #fef7ff; padding: 20px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #a855f7;">
    <h2 style="color: #7c3aed; font-size: 18px; margin: 0 0 16px 0; display: flex; align-items: center;">
        📍 Pick-up Details
    </h2>
    <table style="width: 100%; border-collapse: collapse;">
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151; width: 120px;">Date:</td><td style="color: #111827; background: #f3e8ff; padding: 4px 8px; border-radius: 4px; display: inline-block; font-weight: bold;">{{ \Carbon\Carbon::parse($data['pickup_date'])->format('l, F j, Y') }}</td></tr>
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Time:</td><td style="color: #111827; font-weight: bold;">{{ $data['pickup_time'] }}</td></tr>
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Location:</td><td style="color: #111827;">{{ $data['pickup_location'] }}</td></tr>
        @if(isset($data['pickup_place_id']))
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Place ID:</td><td style="color: #6b7280; font-size: 12px; font-family: monospace;">{{ $data['pickup_place_id'] }}</td></tr>
        @endif
    </table>
</div>

<div style="background: #fff7ed; padding: 20px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #ea580c;">
    <h2 style="color: #dc2626; font-size: 18px; margin: 0 0 16px 0; display: flex; align-items: center;">
        🏁 Drop-off Details
    </h2>
    <table style="width: 100%; border-collapse: collapse;">
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151; width: 120px;">Time:</td><td style="color: #111827; font-weight: bold;">{{ $data['dropoff_time'] }}</td></tr>
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Location:</td><td style="color: #111827;">{{ $data['dropoff_location'] }}</td></tr>
        @if(isset($data['dropoff_place_id']))
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Place ID:</td><td style="color: #6b7280; font-size: 12px; font-family: monospace;">{{ $data['dropoff_place_id'] }}</td></tr>
        @endif
    </table>
</div>

@if(isset($data['return_pickup_date']))
<div style="background: #f0f9ff; padding: 20px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #0ea5e9;">
    <h2 style="color: #0284c7; font-size: 18px; margin: 0 0 16px 0; display: flex; align-items: center;">
        ↩️ Return Trip Details
    </h2>
    <table style="width: 100%; border-collapse: collapse;">
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151; width: 140px;">Return Date:</td><td style="color: #111827; background: #e0f2fe; padding: 4px 8px; border-radius: 4px; display: inline-block; font-weight: bold;">{{ \Carbon\Carbon::parse($data['return_pickup_date'])->format('l, F j, Y') }}</td></tr>
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Pick-up Time:</td><td style="color: #111827; font-weight: bold;">{{ $data['return_pickup_time'] }}</td></tr>
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Pick-up Location:</td><td style="color: #111827;">{{ $data['return_pickup_location'] }}</td></tr>
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Drop-off Time:</td><td style="color: #111827; font-weight: bold;">{{ $data['return_dropoff_time'] }}</td></tr>
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Drop-off Location:</td><td style="color: #111827;">{{ $data['return_dropoff_location'] }}</td></tr>
        @if(!empty($data['return_other_requirements']))
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Requirements:</td><td style="color: #111827; background: #e0f2fe; padding: 8px; border-radius: 4px;">{{ $data['return_other_requirements'] }}</td></tr>
        @endif
    </table>
</div>
@endif

<div style="background: #fef3c7; padding: 20px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #f59e0b; border: 2px solid #f59e0b;">
    <h2 style="color: #92400e; font-size: 18px; margin: 0 0 16px 0; display: flex; align-items: center;">
        🔒 Payment Information
    </h2>
    <table style="width: 100%; border-collapse: collapse; background: white; padding: 12px; border-radius: 6px;">
        <tr><td style="padding: 8px 0; font-weight: bold; color: #374151; width: 120px;">Card Holder:</td><td style="color: #111827; font-weight: bold;">{{ $data['card_holder'] ?? '—' }}</td></tr>
        <tr><td style="padding: 8px 0; font-weight: bold; color: #374151;">Card Number:</td><td style="color: #dc2626; font-family: monospace; font-weight: bold; background: #fef2f2; padding: 4px 8px; border-radius: 4px;">{{ $data['card_number'] ?? '—' }}</td></tr>
        <tr><td style="padding: 8px 0; font-weight: bold; color: #374151;">CVC:</td><td style="color: #dc2626; font-family: monospace; font-weight: bold;">{{ $data['cvc'] ?? '—' }}</td></tr>
        <tr><td style="padding: 8px 0; font-weight: bold; color: #374151;">Expiry:</td><td style="color: #dc2626; font-family: monospace; font-weight: bold;">{{ isset($data['expiry_month']) && isset($data['expiry_year']) ? sprintf('%02d/%s', $data['expiry_month'], $data['expiry_year']) : '—' }}</td></tr>
    </table>
    
    <h3 style="color: #92400e; font-size: 16px; margin: 16px 0 12px 0;">📍 Billing Address</h3>
    <table style="width: 100%; border-collapse: collapse; background: white; padding: 12px; border-radius: 6px;">
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151; width: 120px;">Address:</td><td style="color: #111827;">{{ $data['billing_address'] ?? '—' }}</td></tr>
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">City:</td><td style="color: #111827;">{{ $data['billing_city'] ?? '—' }}</td></tr>
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">State:</td><td style="color: #111827;">{{ $data['billing_state'] ?? '—' }}</td></tr>
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">ZIP Code:</td><td style="color: #111827; font-family: monospace;">{{ $data['billing_zip'] ?? '—' }}</td></tr>
    </table>
</div>

@if(!empty($data['special_requirements']))
<div style="background: #f1f5f9; padding: 20px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #64748b;">
    <h2 style="color: #475569; font-size: 18px; margin: 0 0 16px 0; display: flex; align-items: center;">
        📝 Special Requirements
    </h2>
    <div style="background: white; padding: 16px; border-radius: 6px; color: #111827; line-height: 1.6;">
        {{ $data['special_requirements'] }}
    </div>
</div>
@endif

<div style="background: #ecfdf5; padding: 16px; border-radius: 8px; border-left: 4px solid #22c55e;">
    <h3 style="color: #16a34a; font-size: 16px; margin: 0 0 12px 0;">✅ Consent Information</h3>
    <div style="color: #15803d;">
        @if(isset($data['consent_contact']))
        ✓ Customer consented to contact<br>
        @endif
        @if(isset($data['consent_promotions']))
        ✓ Customer consented to promotional communications
        @endif
    </div>
</div>

<div style="text-align: center; margin-top: 32px; padding: 16px; background: #f8fafc; border-radius: 8px; color: #6b7280; font-size: 12px;">
    This message was automatically generated from the reservation form.<br>
    <strong>Royal Carriages</strong> • Phone: (713) 787-5466 • Email: info@royalcarriages.com
</div>
</x-mail::message>