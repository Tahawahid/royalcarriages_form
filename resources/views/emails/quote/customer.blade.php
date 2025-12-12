<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote Confirmation - Royal Carriages</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 20px; background-color: #f5f5f5; }
        .container { max-width: 650px; margin: 0 auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .header { background: linear-gradient(135deg, #1e3a8a, #3b82f6); color: white; padding: 30px 25px; text-align: center; }
        .logo { font-size: 28px; font-weight: 700; margin: 0; letter-spacing: 0.5px; }
        .subtitle { margin: 8px 0 0 0; opacity: 0.95; font-size: 15px; font-weight: 400; }
        .content { padding: 30px 25px; }
        .greeting { font-size: 17px; color: #1f2937; margin-bottom: 8px; font-weight: 600; }
        .intro-text { color: #4b5563; line-height: 1.7; margin-bottom: 25px; font-size: 14px; }
        .action-box { background: #fef3c7; border-left: 4px solid #f59e0b; padding: 18px 20px; margin: 25px 0; border-radius: 6px; }
        .action-title { color: #92400e; font-weight: 700; font-size: 15px; margin: 0 0 8px 0; text-transform: uppercase; letter-spacing: 0.5px; }
        .action-text { color: #78350f; margin: 0; font-size: 14px; line-height: 1.6; }
        .section-divider { height: 2px; background: linear-gradient(to right, #f59e0b, #fbbf24); margin: 25px 0; border-radius: 2px; }
        .section-header { font-weight: 700; color: #1e3a8a; font-size: 13px; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 1px; border-bottom: 2px solid #3b82f6; padding-bottom: 8px; display: inline-block; }
        .info-table { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        .info-row { border-bottom: 1px solid #e5e7eb; }
        .info-row:last-child { border-bottom: none; }
        .info-row td { padding: 12px 8px; vertical-align: top; }
        .label { font-weight: 600; color: #374151; width: 45%; font-size: 14px; }
        .value { color: #1f2937; font-size: 14px; }
        .contact-box { background: linear-gradient(135deg, #1e3a8a, #3b82f6); color: white; border-radius: 10px; padding: 25px; text-align: center; margin: 30px 0 25px; box-shadow: 0 4px 12px rgba(30, 58, 138, 0.3); }
        .contact-title { margin: 0; font-size: 16px; opacity: 0.95; font-weight: 600; }
        .contact-phone { font-size: 26px; font-weight: 700; margin: 12px 0; letter-spacing: 0.5px; }
        .contact-subtitle { margin: 0; font-size: 14px; opacity: 0.9; }
        .footer-text { color: #6b7280; line-height: 1.6; margin-bottom: 0; font-size: 14px; text-align: center; }
        .team-signature { color: #1f2937; margin-top: 8px; font-weight: 600; font-size: 14px; text-align: center; }
        .footer { background: #f9fafb; padding: 20px; text-align: center; font-size: 12px; color: #9ca3af; border-top: 1px solid #e5e7eb; }
        @media (max-width: 480px) { 
            .info-row td { display: block; width: 100%; padding: 8px; }
            .label { margin-bottom: 4px; }
            .container { border-radius: 0; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="logo">Royal Carriages Limousines</h1>
            <p class="subtitle">Quote Request Confirmation</p>
        </div>
        
        <div class="content">
            <div class="greeting">Hi {{ $data['first_name'] }},</div>
            <p class="intro-text">Thank you for your interest in Royal Carriages! We have received your quote request and our team will review your requirements and provide you with a personalized quote within 24 hours. We're excited to help make your transportation experience exceptional!</p>
            
            <div class="action-box">
                <div class="action-title">⏰ Action Required</div>
                <p class="action-text">Please keep an eye on your email inbox. Our team will reach out to you shortly with your personalized quote and next steps.</p>
            </div>
            
            <div class="section-divider"></div>
            <div class="section-header">Schedule and Location</div>
            <table class="info-table">
                <tr class="info-row">
                    <td class="label">Pick Date:</td>
                    <td class="value">{{ date('m/d/Y', strtotime($data['pickup_date'])) }}</td>
                </tr>
                <tr class="info-row">
                    <td class="label">Pickup Time:</td>
                    <td class="value">{{ date('g:i A', strtotime($data['pickup_time'])) }}</td>
                </tr>
                <tr class="info-row">
                    <td class="label">Drop Off Time:</td>
                    <td class="value">{{ date('g:i A', strtotime($data['dropoff_time'])) }}</td>
                </tr>
                <tr class="info-row">
                    <td class="label">Pickup Location:</td>
                    <td class="value">{{ $data['pickup_location'] }}</td>
                </tr>
                <tr class="info-row">
                    <td class="label">Drop Off Location:</td>
                    <td class="value">{{ $data['dropoff_location'] }}</td>
                </tr>
            </table>
            
            <div class="section-divider"></div>
            <div class="section-header">Trip Details</div>
            <table class="info-table">
                <tr class="info-row">
                    <td class="label">Type of Service:</td>
                    <td class="value">{{ $data['service_type'] }}</td>
                </tr>
                <tr class="info-row">
                    <td class="label">Type of Vehicle:</td>
                    <td class="value">{{ $data['vehicle_type'] }}</td>
                </tr>
                <tr class="info-row">
                    <td class="label">Number of Passengers:</td>
                    <td class="value">{{ $data['passengers'] ?? 'Not specified' }}</td>
                </tr>
                <tr class="info-row">
                    <td class="label">Number of Suitcases:</td>
                    <td class="value">{{ $data['suitcases'] ?? 'Not specified' }}</td>
                </tr>
            </table>
            
            @if($data['other_requirements'] ?? false)
            <div class="section-divider"></div>
            <div class="section-header">Other Requirements</div>
            <p style="color: #1f2937; line-height: 1.7; font-size: 14px; margin: 10px 0; white-space: pre-wrap; background: #f9fafb; padding: 15px; border-radius: 6px; border-left: 3px solid #3b82f6;">{{ $data['other_requirements'] }}</p>
            @endif

            <div class="contact-box">
                <p class="contact-title">Need immediate assistance?</p>
                <div class="contact-phone">+1 (713) 787-5466</div>
                <p class="contact-subtitle">Available 24/7</p>
            </div>

            <p class="footer-text">Thank you for choosing Royal Carriages!</p>
            <p class="team-signature">Royal Carriages Team</p>
        </div>
        
        <div class="footer">
            <p style="margin: 0;">Request sent on {{ date('m/d/Y g:i A') }}</p>
            <p style="margin: 5px 0 0 0;">Royal Carriages Limousines | www.royalcarriages.com</p>
        </div>
    </div>
</body>
</html>
