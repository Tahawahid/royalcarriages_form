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

            <div class="section section-customer">
                <h2>👤 Customer Information</h2>
                <table class="info-table">
                    <tr>
                        <td class="label">Name:</td>
                        <td class="value">{{ $data['first_name'] }} {{ $data['last_name'] }}</td>
                    </tr>
                    <tr>
                        <td class="label">Email:</td>
                        <td class="value"><a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a></td>
                    </tr>
                    <tr>
                        <td class="label">Phone:</td>
                        <td class="value"><a href="tel:{{ $data['phone'] }}">{{ $data['phone'] }}</a></td>
                    </tr>
                    <tr>
                        <td class="label">Company:</td>
                        <td class="value">{{ $data['company'] ?? '—' }}</td>
                    </tr>
                </table>
            </div>

            <div class="section section-trip">
                <h2>🚗 Trip Details</h2>
                <table class="info-table">
                    <tr>
                        <td class="label">Service:</td>
                        <td class="value"><span class="badge">{{ ucfirst(str_replace('_', ' ', $data['service_type'])) }}</span></td>
                    </tr>
                    <tr>
                        <td class="label">Vehicle:</td>
                        <td class="value" style="font-weight: 600;">{{ $data['vehicle_type'] }}</td>
                    </tr>
                    @if(isset($data['passengers']))
                    <tr>
                        <td class="label">Passengers:</td>
                        <td class="value">{{ $data['passengers'] }}</td>
                    </tr>
                    @endif
                    @if(isset($data['suitcases']))
                    <tr>
                        <td class="label">Suitcases:</td>
                        <td class="value">{{ $data['suitcases'] }}</td>
                    </tr>
                    @endif
                </table>
            </div>

            <div class="section section-schedule">
                <h2>📍 Schedule & Locations</h2>
                <table class="info-table">
                    <tr>
                        <td class="label">Pick-up Date:</td>
                        <td class="value"><span class="date-badge">{{ \Carbon\Carbon::parse($data['pickup_date'])->format('l, F j, Y') }}</span></td>
                    </tr>
                    <tr>
                        <td class="label">Pick-up Time:</td>
                        <td class="value" style="font-weight: bold;">{{ $data['pickup_time'] }}</td>
                    </tr>
                    <tr>
                        <td class="label">Pick-up Location:</td>
                        <td class="value">{{ $data['pickup_location'] }}</td>
                    </tr>
                    <tr>
                        <td class="label">Drop-off Time:</td>
                        <td class="value" style="font-weight: bold;">{{ $data['dropoff_time'] }}</td>
                    </tr>
                    <tr>
                        <td class="label">Drop-off Location:</td>
                        <td class="value">{{ $data['dropoff_location'] }}</td>
                    </tr>
                </table>
            </div>

            @if(!empty($data['other_requirements']))
            <div class="section section-requirements">
                <h2>📝 Special Requirements</h2>
                <div class="requirements-content">
                    {{ $data['other_requirements'] }}
                </div>
            </div>
            @endif

            <div class="section section-action">
                <h2>⚡ Action Required</h2>
                <div class="action-content">
                    📞 Contact customer within 24 hours to provide quote<br>
                    📱 Phone: <a href="tel:{{ $data['phone'] }}">{{ $data['phone'] }}</a><br>
                    📧 Email: <a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a>
                </div>
            </div>

            <div class="footer">
                This quote request was automatically generated from the website.<br>
                <strong>Royal Carriages</strong> • Phone: (713) 787-5466 • Email: info@royalcarriages.com
            </div>
        </div>
    </div>
</body>
</html>