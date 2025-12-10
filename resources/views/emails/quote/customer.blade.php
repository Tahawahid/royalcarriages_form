Dear {{ $data['first_name'] }} {{ $data['last_name'] }},

Thank you for your quote request with Royal Carriages!

We have received your request for {{ $data['service_type'] }} service on {{ date('m/d/Y', strtotime($data['pickup_date'])) }} at {{ $data['pickup_time'] }}.

Our team will review your request and contact you within 24 hours with a detailed quote.

Your Request Details:
--------------------------
Pickup Date: {{ date('m/d/Y', strtotime($data['pickup_date'])) }}
Pickup Time: {{ $data['pickup_time'] }}
Pickup Location: {{ $data['pickup_location'] }}
Drop-off Location: {{ $data['dropoff_location'] }}
Vehicle: {{ $data['vehicle_type'] }}
Passengers: {{ $data['passengers'] ?? 'Not specified' }}

If you have any questions or need to make changes, please contact us:
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
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            border-radius: 0;
            color: white;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.2);
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
            color: #dbeafe;
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
        .section-details {
            background-color: #f8fafc;
            border-left-color: #16a34a;
        }
        .section-schedule {
            background: linear-gradient(135deg, #fef7ff 0%, #f3e8ff 100%);
            border-left-color: #a855f7;
        }
        .section-requirements {
            background-color: #f1f5f9;
            border-left-color: #64748b;
        }
        .section-next {
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
        .section-details h2 { color: #15803d; }
        .section-schedule h2 { color: #7c3aed; }
        .section-requirements h2 { color: #475569; }
        .section-next h2 { color: #92400e; }
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
        .process-list {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .process-list ul {
            color: #111827;
            margin: 0;
            padding-left: 25px;
            line-height: 1.8;
        }
        .process-list li {
            margin-bottom: 8px;
        }
        .process-list strong {
            color: #f59e0b;
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
            border-top: 4px solid #3b82f6;
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
                <h1>Quote Request Received!</h1>
                <p>We'll get back to you soon with your personalized quote 💰</p>
            </div>

            <div class="welcome-section">
                <h2>👋 Hi {{ $data['first_name'] }},</h2>
                <p>
                    Thank you for your interest in Royal Carriages! We have received your quote request and our team will review your requirements and provide you with a <strong style="color: #0ea5e9;">personalized quote within 24 hours</strong>. We're excited to help make your transportation experience exceptional!
                </p>
            </div>

            <div class="section section-details">
                <h2>📄 Your Quote Request Details</h2>
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
                        @if(isset($data['company']) && !empty($data['company']))
                        <tr>
                            <td class="label">Company:</td>
                            <td class="value">{{ $data['company'] }}</td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>

            <div class="section section-schedule">
                <h2>📅 Trip Schedule</h2>
                
                <div class="info-card pickup-section">
                    <h3>🛫 Pick-up Details</h3>
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
                    <h3>🏁 Drop-off Details</h3>
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

            @if(!empty($data['other_requirements']))
            <div class="section section-requirements">
                <h2>📝 Your Special Requirements</h2>
                <div class="requirements-content">
                    {{ $data['other_requirements'] }}
                </div>
            </div>
            @endif

            <div class="section section-next">
                <h2>⏰ What Happens Next?</h2>
                <div class="process-list">
                    <ul>
                        <li><strong>Review:</strong> Our team will review your requirements and vehicle availability</li>
                        <li><strong>Quote:</strong> We'll prepare a personalized quote with transparent pricing</li>
                        <li><strong>Contact:</strong> You'll receive your quote via email or phone within 24 hours</li>
                        <li><strong>Book:</strong> Simply confirm your booking and we'll handle the rest!</li>
                    </ul>
                </div>
            </div>

            <div class="section section-contact">
                <h2>📞 Need to Speak with Us?</h2>
                <p style="color: #dcfce7; margin: 0 0 25px 0; font-size: 16px;">Have questions or need to modify your request? We're here to help!</p>
                
                <a href="tel:+17137875466" class="contact-button">
                    📱 Call: (713) 787-5466
                </a>
                
                <div class="contact-info">
                    <strong>Business Hours:</strong> Monday - Sunday, 24/7<br>
                    <strong>Email:</strong> <a href="mailto:quotes@royalcarriages.com">quotes@royalcarriages.com</a>
                </div>
            </div>

            <div class="footer">
                <h3>🌟 Thank you for considering Royal Carriages!</h3>
                <p>
                    We're committed to providing you with exceptional luxury transportation service.<br>
                    <strong style="color: #3b82f6;">Your quote request is our priority.</strong>
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
