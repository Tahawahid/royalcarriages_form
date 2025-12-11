<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote Confirmation - Royal Carriages</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f8f9fa; }
        .container { max-width: 600px; margin: 0 auto; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg, #d97706, #f59e0b); color: white; padding: 20px; text-align: center; }
        .content { padding: 25px; }
        .greeting { font-size: 18px; color: #1f2937; margin-bottom: 20px; }
        .section { margin-bottom: 20px; }
        .section-title { font-size: 16px; font-weight: bold; color: #374151; margin-bottom: 12px; padding-bottom: 6px; border-bottom: 2px solid #f59e0b; }
        .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px; }
        .info-item { background: #fef3c7; padding: 12px; border-radius: 6px; border-left: 3px solid #f59e0b; }
        .label { font-weight: bold; color: #6b7280; font-size: 12px; text-transform: uppercase; margin-bottom: 4px; }
        .value { color: #1f2937; font-size: 14px; }
        .full-width { grid-column: span 2; }
        .contact-box { background: #fef3c7; border: 1px solid #f59e0b; border-radius: 8px; padding: 20px; text-align: center; margin: 20px 0; }
        .contact-phone { font-size: 20px; font-weight: bold; color: #92400e; margin: 10px 0; }
        .footer { background: #f3f4f6; padding: 15px; text-align: center; font-size: 11px; color: #6b7280; }
        @media (max-width: 480px) { .info-grid { grid-template-columns: 1fr; } .full-width { grid-column: span 1; } }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="margin: 0; font-size: 24px;">Royal Carriages Limousines</h1>
            <p style="margin: 8px 0 0 0; opacity: 0.9;">Quote Request Confirmation</p>
        </div>
        
        <div class="content">
            <div class="greeting">Dear {{ $data['first_name'] }},</div>
            <p style="color: #4b5563; line-height: 1.6; margin-bottom: 20px;">Thank you for your interest in Royal Carriages Limousines! We have received your quote request and will contact you within 24 hours with a detailed quote.</p>
            
            <div class="section">
                <div class="section-title">Your Quote Request Details</div>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="label">Date & Time</div>
                        <div class="value">{{ date('m/d/Y', strtotime($data['pickup_date'])) }} at {{ date('g:i A', strtotime($data['pickup_time'])) }}</div>
                    </div>
                    <div class="info-item">
                        <div class="label">Service Type</div>
                        <div class="value">{{ $data['service_type'] }}</div>
                    </div>
                    <div class="info-item full-width">
                        <div class="label">Route</div>
                        <div class="value">{{ $data['pickup_location'] }} → {{ $data['dropoff_location'] }}</div>
                    </div>
                    <div class="info-item">
                        <div class="label">Vehicle</div>
                        <div class="value">{{ $data['vehicle_type'] }}</div>
                    </div>
                    <div class="info-item">
                        <div class="label">Passengers</div>
                        <div class="value">{{ $data['passengers'] ?? 'Not specified' }}</div>
                    </div>
                    @if($data['other_requirements'] ?? false)
                    <div class="info-item full-width">
                        <div class="label">Special Requirements</div>
                        <div class="value">{{ $data['other_requirements'] }}</div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="contact-box">
                <p style="margin: 0; font-size: 16px; color: #92400e;">Need immediate assistance?</p>
                <div class="contact-phone">+1 (713) 787-5466</div>
                <p style="margin: 0; font-size: 14px; color: #92400e;">Available 24/7</p>
            </div>

            <p style="color: #4b5563; line-height: 1.6; margin-bottom: 0;">Thank you for choosing Royal Carriages!</p>
            <p style="color: #4b5563; margin-top: 5px;"><strong>Royal Carriages Team</strong></p>
        </div>
        
        <div class="footer">
            <p style="margin: 0;">Request sent on {{ date('m/d/Y g:i A') }}</p>
            <p style="margin: 5px 0 0 0;">Royal Carriages Limousines | www.royalcarriages.com</p>
        </div>
    </div>
</body>
</html>
