Dear {{ $data['first_name'] }} {{ $data['last_name'] }},

Thank you for your reservation with Royal Carriages!

We have confirmed your {{ $data['service_type'] }} reservation for {{ date('m/d/Y', strtotime($data['pickup_date'])) }} at {{ $data['pickup_time'] }}.

Your Reservation Details:
--------------------------
Pickup Date: {{ date('m/d/Y', strtotime($data['pickup_date'])) }}
Pickup Time: {{ $data['pickup_time'] }}
Pickup Location: {{ $data['pickup_location'] }}
Drop-off Location: {{ $data['dropoff_location'] }}
Vehicle: {{ $data['vehicle_type'] }}
Passengers: {{ $data['passengers'] ?? 'Not specified' }}
@if(isset($data['cardholder_name']))

Payment Information:
Cardholder: {{ $data['cardholder_name'] }}
Card: **** **** **** {{ substr($data['card_number'], -4) }}
@endif

Important Information:
- Please be ready 15 minutes before your scheduled pickup time
- Our chauffeur will contact you 30 minutes before arrival
- For any changes or cancellations, please call us at least 24 hours in advance

If you have any questions, please contact us:
Phone: (713) 787-5466
Email: info@royalcarriages.com

Thank you for choosing Royal Carriages!

Best regards,
Royal Carriages Team
--
This e-mail was sent from Royal Carriages (https://www.royalcarriages.com)
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
            padding: 40px 20px;
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            border-radius: 0;
            color: white;
            box-shadow: 0 4px 20px rgba(245, 158, 11, 0.2);
        }
        .header img {
            height: 80px;
            margin-bottom: 20px;
            filter: brightness(0) invert(1);
        }
        .header h1 {
            margin: 0;
            font-size: 32px;
            font-weight: bold;
            text-shadow: 0 2px 8px rgba(0,0,0,0.3);
            letter-spacing: -0.5px;
        }
        .header p {
            margin: 15px 0 0 0;
            color: #fef3c7;
            font-size: 18px;
            font-weight: 500;
        }
        .welcome-section {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 30px;
            border: 1px solid #bae6fd;
        }
        .welcome-section h2 {
            color: #0c4a6e;
            font-size: 22px;
            margin: 0 0 15px 0;
        }
        .welcome-section p {
            color: #0f172a;
            font-size: 16px;
            margin: 0;
            line-height: 1.7;
        }
        .section {
            margin-bottom: 30px;
            padding: 30px;
            border-radius: 12px;
            border-left: 6px solid;
        }
        .section-summary {
            background-color: #f8fafc;
            border-left-color: #16a34a;
        }
        .section-schedule {
            background: linear-gradient(135deg, #fef7ff 0%, #f3e8ff 100%);
            border-left-color: #a855f7;
        }
        .section-return {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            border-left-color: #0ea5e9;
        }
        .section-requirements {
            background-color: #f1f5f9;
            border-left-color: #64748b;
        }
        .section-payment {
            background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
            border: 2px solid #fbbf24;
            border-left: 6px solid #f59e0b;
        }
        .section-contact {
            background-color: #16a34a;
            border-left-color: #15803d;
            color: white;
            text-align: center;
        }
        .section h2 {
            margin: 0 0 20px 0;
            font-size: 20px;
            font-weight: bold;
        }
        .section-summary h2 { color: #15803d; }
        .section-schedule h2 { color: #7c3aed; }
        .section-return h2 { color: #0284c7; }
        .section-requirements h2 { color: #475569; }
        .section-payment h2 { color: #92400e; }
        .section-contact h2 { color: white; }
        .info-card {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
        }
        .info-table td {
            padding: 12px 0;
            border-bottom: 1px solid #f1f5f9;
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
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            display: inline-block;
        }
        .date-badge {
            background-color: #f3e8ff;
            color: #7c3aed;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            display: inline-block;
        }
        .return-badge {
            background-color: #e0f2fe;
            color: #0284c7;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            display: inline-block;
        }
        .pickup-section h3 {
            color: #16a34a;
            margin: 0 0 15px 0;
            font-size: 16px;
        }
        .dropoff-section h3 {
            color: #dc2626;
            margin: 0 0 15px 0;
            font-size: 16px;
        }
        .requirements-content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            color: #111827;
            border-left: 4px solid #64748b;
            margin-top: 15px;
        }
        .return-requirements {
            margin-top: 16px;
            padding: 12px;
            background-color: #e0f2fe;
            border-radius: 6px;
            border-left: 4px solid #0ea5e9;
        }
        .security-note {
            margin-top: 16px;
            padding: 12px;
            background-color: #fef3c7;
            border-radius: 6px;
            border-left: 4px solid #f59e0b;
        }
        .contact-button {
            background-color: #ffffff;
            color: #16a34a;
            font-weight: bold;
            padding: 15px 30px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            margin: 10px;
            border: 2px solid #16a34a;
        }
        .contact-info {
            margin-top: 20px;
            color: #dcfce7;
            font-size: 14px;
        }
        .contact-info a {
            color: #dcfce7;
            text-decoration: underline;
        }
        .footer {
            background-color: #f8fafc;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            border-top: 4px solid #f59e0b;
            margin-top: 40px;
        }
        .footer h3 {
            color: #374151;
            font-size: 20px;
            margin: 0 0 15px 0;
        }
        .footer p {
            color: #6b7280;
            margin: 0;
            font-size: 16px;
            line-height: 1.6;
        }
        .footer-meta {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            color: #9ca3af;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-content">
            <div class="header">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Royal Carriages">
                <h1>Thank You!</h1>
                <p>Your reservation request has been received 🎉</p>
            </div>

            <div class="welcome-section">
                <h2>👋 Dear {{ $data['first_name'] }},</h2>
                <p>
                    We have received your reservation request and will contact you <strong style="color: #0ea5e9;">within 24 hours</strong> to confirm all details and process your payment. Our team is excited to provide you with exceptional luxury transportation!
                </p>
            </div>

            <div class="section section-summary">
                <h2>🚗 Your Reservation Summary</h2>
                <div class="info-card">
                    <table class="info-table">
                        <tr>
                            <td class="label">Service Type:</td>
                            <td class="value"><span class="badge">{{ ucfirst(str_replace('_', ' ', $data['service_type'])) }}</span></td>
                        </tr>
                        <tr>
                            <td class="label">Vehicle:</td>
                            <td class="value" style="font-size: 18px; font-weight: 600;">{{ $data['vehicle_type'] }}</td>
                        </tr>
                        @if(isset($data['passengers']))
                        <tr>
                            <td class="label">Passengers:</td>
                            <td class="value">{{ $data['passengers'] }} people</td>
                        </tr>
                        @endif
                        @if(isset($data['suitcases']))
                        <tr>
                            <td class="label">Suitcases:</td>
                            <td class="value">{{ $data['suitcases'] }} pieces</td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>

            <div class="section section-schedule">
                <h2>📅 Trip Schedule</h2>
                
                <div class="info-card pickup-section">
                    <h3>🛫 Pick-up</h3>
                    <table class="info-table">
                        <tr>
                            <td class="label">Date:</td>
                            <td class="value"><span class="date-badge">{{ \Carbon\Carbon::parse($data['pickup_date'])->format('l, F j, Y') }}</span></td>
                        </tr>
                        <tr>
                            <td class="label">Time:</td>
                            <td class="value" style="font-size: 18px; font-weight: 600;">{{ $data['pickup_time'] }}</td>
                        </tr>
                        <tr>
                            <td class="label">Location:</td>
                            <td class="value">{{ $data['pickup_location'] }}</td>
                        </tr>
                    </table>
                </div>
                
                <div class="info-card dropoff-section">
                    <h3>🏁 Drop-off</h3>
                    <table class="info-table">
                        <tr>
                            <td class="label">Time:</td>
                            <td class="value" style="font-size: 18px; font-weight: 600;">{{ $data['dropoff_time'] }}</td>
                        </tr>
                        <tr>
                            <td class="label">Location:</td>
                            <td class="value">{{ $data['dropoff_location'] }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            @if(isset($data['return_pickup_date']))
            <div class="section section-return">
                <h2>↩️ Return Trip Details</h2>
                <div class="info-card">
                    <table class="info-table">
                        <tr>
                            <td class="label">Return Date:</td>
                            <td class="value"><span class="return-badge">{{ \Carbon\Carbon::parse($data['return_pickup_date'])->format('l, F j, Y') }}</span></td>
                        </tr>
                        <tr>
                            <td class="label">Pick-up:</td>
                            <td class="value"><strong>{{ $data['return_pickup_time'] }}</strong> from {{ $data['return_pickup_location'] }}</td>
                        </tr>
                        <tr>
                            <td class="label">Drop-off:</td>
                            <td class="value"><strong>{{ $data['return_dropoff_time'] }}</strong> to {{ $data['return_dropoff_location'] }}</td>
                        </tr>
                    </table>
                    @if(!empty($data['return_other_requirements']))
                    <div class="return-requirements">
                        <strong style="color: #0284c7;">Return Requirements:</strong><br>
                        <span style="color: #0f172a;">{{ $data['return_other_requirements'] }}</span>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            @if(!empty($data['special_requirements']))
            <div class="section section-requirements">
                <h2>📝 Special Requirements</h2>
                <div class="requirements-content">
                    {{ $data['special_requirements'] }}
                </div>
            </div>
            @endif

            <div class="section section-payment">
                <h2>💳 Payment Information on File</h2>
                <div class="info-card">
                    <table class="info-table">
                        <tr>
                            <td class="label">Card Holder:</td>
                            <td class="value" style="font-weight: 600;">{{ $data['card_holder'] ?? '—' }}</td>
                        </tr>
                        <tr>
                            <td class="label">Card Number:</td>
                            <td class="value" style="color: #6b7280; font-family: monospace; font-size: 16px;">{{ $data['card_last_four'] ?? '—' }}</td>
                        </tr>
                        <tr>
                            <td class="label">Billing Address:</td>
                            <td class="value">{{ $data['billing_address'] ?? '—' }}<br>{{ $data['billing_city'] ?? '—' }}, {{ $data['billing_state'] ?? '—' }} {{ $data['billing_zip'] ?? '—' }}</td>
                        </tr>
                    </table>
                    <div class="security-note">
                        <p style="color: #92400e; margin: 0; font-size: 14px;">
                            🔒 <strong>Secure:</strong> Payment will be processed when your reservation is confirmed by our team.
                        </p>
                    </div>
                </div>
            </div>

            <div class="section section-contact">
                <h2>📞 Need Immediate Assistance?</h2>
                <p style="color: #dcfce7; margin: 0 0 25px 0; font-size: 16px;">Our customer service team is standing by to help you!</p>
                
                <a href="tel:+17137875466" class="contact-button">
                    📱 Call: (713) 787-5466
                </a>
                
                <div class="contact-info">
                    <strong>Business Hours:</strong> Monday - Sunday, 24/7<br>
                    <strong>Email:</strong> <a href="mailto:quotes@royalcarriages.com">quotes@royalcarriages.com</a>
                </div>
            </div>

            <div class="footer">
                <h3>🌟 Thank you for choosing Royal Carriages!</h3>
                <p>
                    We look forward to providing you with exceptional luxury transportation service.<br>
                    <strong style="color: #f59e0b;">Your satisfaction is our priority.</strong>
                </p>
                
                <div class="footer-meta">
                    Royal Carriages • Luxury Transportation Services<br>
                    This is an automated confirmation email sent on {{ now()->format('F j, Y \\a\\t g:i A T') }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>