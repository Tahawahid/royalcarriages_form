<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            line-height: 1.6;
        }
        .email-container {
            width: 100%;
            max-width: 100%;
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
        }
        .email-content {
            width: 100%;
            margin: 0;
            padding: 20px;
            background-color: #ffffff;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding: 30px 20px;
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            border-radius: 0;
            color: white;
        }
        .header img {
            height: 60px;
            margin-bottom: 15px;
            filter: brightness(0) invert(1);
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        .header p {
            margin: 10px 0 0 0;
            color: #dbeafe;
            font-size: 14px;
        }
        .section {
            margin-bottom: 25px;
            padding: 25px;
            border-radius: 8px;
            border-left: 4px solid;
        }
        .section-customer {
            background-color: #f8fafc;
            border-left-color: #3b82f6;
        }
        .section-trip {
            background-color: #f0fdf4;
            border-left-color: #16a34a;
        }
        .section-schedule {
            background-color: #fef7ff;
            border-left-color: #a855f7;
        }
        .section-requirements {
            background-color: #f1f5f9;
            border-left-color: #64748b;
        }
        .section-action {
            background-color: #fef3c7;
            border-left-color: #f59e0b;
        }
        .section h2 {
            margin: 0 0 20px 0;
            font-size: 18px;
            font-weight: bold;
        }
        .section-customer h2 { color: #1e40af; }
        .section-trip h2 { color: #15803d; }
        .section-schedule h2 { color: #7c3aed; }
        .section-requirements h2 { color: #475569; }
        .section-action h2 { color: #92400e; }
        .info-table {
            width: 100%;
            border-collapse: collapse;
        }
        .info-table td {
            padding: 8px 0;
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }
        .info-table .label {
            font-weight: bold;
            color: #374151;
            width: 140px;
            vertical-align: top;
        }
        .info-table .value {
            color: #111827;
        }
        .badge {
            background-color: #dcfce7;
            color: #15803d;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            display: inline-block;
        }
        .date-badge {
            background-color: #f3e8ff;
            color: #7c3aed;
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: bold;
            display: inline-block;
        }
        .requirements-content {
            background-color: #ffffff;
            padding: 15px;
            border-radius: 6px;
            color: #111827;
            margin-top: 10px;
        }
        .action-content {
            margin: 0;
            font-weight: 600;
        }
        .action-content a {
            color: #2563eb;
            text-decoration: none;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            background-color: #f8fafc;
            border-radius: 8px;
            color: #6b7280;
            font-size: 12px;
            border-top: 1px solid #e5e7eb;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-content">
            <div class="header">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Royal Carriages">
                <h1>New Quote Request</h1>
                <p>Received on {{ now()->format('F j, Y \\a\\t g:i A T') }}</p>
            </div>

<div style="background: #f8fafc; padding: 20px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #3b82f6;">
    <h2 style="color: #1e40af; font-size: 18px; margin: 0 0 16px 0; display: flex; align-items: center;">
        👤 Customer Information
    </h2>
    <table style="width: 100%; border-collapse: collapse;">
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151; width: 120px;">Name:</td><td style="color: #111827;">{{ $data['first_name'] }} {{ $data['last_name'] }}</td></tr>
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Email:</td><td style="color: #111827;"><a href="mailto:{{ $data['email'] }}" style="color: #2563eb;">{{ $data['email'] }}</a></td></tr>
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Phone:</td><td style="color: #111827;"><a href="tel:{{ $data['phone'] }}" style="color: #2563eb;">{{ $data['phone'] }}</a></td></tr>
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Company:</td><td style="color: #111827;">{{ $data['company'] ?? '—' }}</td></tr>
    </table>
</div>

<div style="background: #f0fdf4; padding: 20px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #16a34a;">
    <h2 style="color: #15803d; font-size: 18px; margin: 0 0 16px 0; display: flex; align-items: center;">
        🚗 Trip Details
    </h2>
    <table style="width: 100%; border-collapse: collapse;">
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151; width: 120px;">Service:</td><td style="color: #111827; background: #dcfce7; padding: 4px 8px; border-radius: 4px; display: inline-block;">{{ ucfirst(str_replace('_', ' ', $data['service_type'])) }}</td></tr>
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Vehicle:</td><td style="color: #111827; font-weight: 600;">{{ $data['vehicle_type'] }}</td></tr>
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
        📍 Schedule & Locations
    </h2>
    <table style="width: 100%; border-collapse: collapse;">
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151; width: 120px;">Pick-up Date:</td><td style="color: #111827; background: #f3e8ff; padding: 4px 8px; border-radius: 4px; display: inline-block; font-weight: bold;">{{ \Carbon\Carbon::parse($data['pickup_date'])->format('l, F j, Y') }}</td></tr>
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Pick-up Time:</td><td style="color: #111827; font-weight: bold;">{{ $data['pickup_time'] }}</td></tr>
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Pick-up Location:</td><td style="color: #111827;">{{ $data['pickup_location'] }}</td></tr>
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Drop-off Time:</td><td style="color: #111827; font-weight: bold;">{{ $data['dropoff_time'] }}</td></tr>
        <tr><td style="padding: 6px 0; font-weight: bold; color: #374151;">Drop-off Location:</td><td style="color: #111827;">{{ $data['dropoff_location'] }}</td></tr>
    </table>
</div>

@if(!empty($data['other_requirements']))
<div style="background: #f1f5f9; padding: 20px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #64748b;">
    <h2 style="color: #475569; font-size: 18px; margin: 0 0 16px 0; display: flex; align-items: center;">
        📝 Special Requirements
    </h2>
    <div style="background: white; padding: 16px; border-radius: 6px; color: #111827; line-height: 1.6;">
        {{ $data['other_requirements'] }}
    </div>
</div>
@endif

<div style="background: #fef3c7; padding: 20px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #f59e0b;">
    <h2 style="color: #92400e; font-size: 18px; margin: 0 0 12px 0; display: flex; align-items: center;">
        ⚡ Action Required
    </h2>
    <p style="color: #92400e; margin: 0; font-weight: 600;">
        📞 Contact customer within 24 hours to provide quote<br>
        📱 Phone: <a href="tel:{{ $data['phone'] }}" style="color: #2563eb;">{{ $data['phone'] }}</a><br>
        📬 Email: <a href="mailto:{{ $data['email'] }}" style="color: #2563eb;">{{ $data['email'] }}</a>
    </p>
</div>

<div style="text-align: center; margin-top: 32px; padding: 16px; background: #f8fafc; border-radius: 8px; color: #6b7280; font-size: 12px;">
    This quote request was automatically generated from the website.<br>
    <strong>Royal Carriages</strong> • Phone: (713) 787-5466 • Email: info@royalcarriages.com
</div>
</x-mail::message>
