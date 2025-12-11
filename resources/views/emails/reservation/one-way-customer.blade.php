<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One-Way Reservation Confirmation - Royal Carriages</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f8f9fa; }
        .container { max-width: 600px; margin: 0 auto; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg, #d97706, #f59e0b); color: white; padding: 20px; text-align: center; }
        .content { padding: 25px; }
        .greeting { font-size: 18px; color: #1f2937; margin-bottom: 20px; }
        .info-row { display: flex; padding: 8px 0; border-bottom: 1px solid #f3f4f6; }
        .info-row:last-child { border-bottom: none; }
        .label { font-weight: bold; color: #374151; min-width: 120px; margin-right: 15px; }
        .value { color: #1f2937; flex: 1; }
        .section-divider { height: 1px; background: #f59e0b; margin: 20px 0; }
        .section-header { font-weight: bold; color: #d97706; font-size: 14px; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.5px; }
        .status-confirmed { background: #d1fae5; color: #065f46; padding: 8px 15px; border-radius: 20px; display: inline-block; font-weight: bold; margin-bottom: 20px; }
        .contact-box { background: #fef3c7; border: 1px solid #f59e0b; border-radius: 8px; padding: 20px; text-align: center; margin: 20px 0; }
        .contact-phone { font-size: 20px; font-weight: bold; color: #92400e; margin: 10px 0; }
        .footer { background: #f3f4f6; padding: 15px; text-align: center; font-size: 11px; color: #6b7280; }
        @media (max-width: 480px) { .info-row { flex-direction: column; } .label { min-width: auto; margin-bottom: 5px; } }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="margin: 0; font-size: 24px;">Royal Carriages Limousines</h1>
            <p style="margin: 8px 0 0 0; opacity: 0.9;">One-Way Reservation Confirmed</p>
        </div>
        
        <div class="content">
            <div class="greeting">Dear {{ $data['first_name'] }},</div>
            <div class="status-confirmed">✓ ONE-WAY TRIP CONFIRMED</div>
            <p style="color: #4b5563; line-height: 1.6; margin-bottom: 20px;">Your one-way luxury transportation is confirmed! Please save this confirmation for your records.</p>
            
            <div class="section-header">Trip Details</div>
            <div class="info-row">
                <div class="label">Date & Time:</div>
                <div class="value">{{ date('m/d/Y', strtotime($data['pickup_date'])) }} at {{ date('g:i A', strtotime($data['pickup_time'])) }}</div>
            </div>
            <div class="info-row">
                <div class="label">Route:</div>
                <div class="value">{{ $data['pickup_location'] }} → {{ $data['dropoff_location'] }}</div>
            </div>
            <div class="info-row">
                <div class="label">Vehicle:</div>
                <div class="value">{{ $data['vehicle_type'] }}</div>
            </div>
            <div class="info-row">
                <div class="label">Passengers:</div>
                <div class="value">{{ $data['passengers'] }}</div>
            </div>
            
            <div class="section-divider"></div>
            <div class="section-header">Payment Information</div>
            <div class="info-row">
                <div class="label">Total Amount:</div>
                <div class="value">${{ number_format($data['total_amount'], 2) }}</div>
            </div>
            <div class="info-row">
                <div class="label">Payment Card:</div>
                <div class="value">**** **** **** {{ $data['card_last_four'] ?? substr($data['card_number'] ?? '', -4) }}</div>
            </div>
            <div class="info-row">
                <div class="label">Payment Status:</div>
                <div class="value">{{ ucfirst($data['payment_status']) }}</div>
            </div>
            
            @if($data['special_requests'] ?? false)
            <div class="section-divider"></div>
            <div class="section-header">Special Requests</div>
            <div style="color: #1f2937; line-height: 1.5; white-space: pre-wrap;">{{ $data['special_requests'] }}</div>
            @endif

            <div class="contact-box">
                <p style="margin: 0; font-size: 16px; color: #92400e;">Questions? Contact us anytime!</p>
                <div class="contact-phone">+1 (713) 787-5466</div>
                <p style="margin: 0; font-size: 14px; color: #92400e;">Available 24/7</p>
            </div>

            <p style="color: #4b5563; line-height: 1.6; margin-bottom: 0;">Thank you for choosing Royal Carriages!</p>
            <p style="color: #4b5563; margin-top: 5px;"><strong>Royal Carriages Team</strong></p>
        </div>
        
        <div class="footer">
            <p style="margin: 0;">Reservation confirmed on {{ date('m/d/Y g:i A') }}</p>
            <p style="margin: 5px 0 0 0;">Royal Carriages Limousines | www.royalcarriages.com</p>
        </div>
    </div>
</body>
</html>
            <p style="margin: 8px 0 0 0; opacity: 0.9;">One-Way Reservation Confirmation</p>
        </div>
        
        <div class="content">
            <div class="greeting">Dear {{ $data['first_name'] }},</div>
            <p style="color: #4b5563; line-height: 1.6; margin-bottom: 20px;">Thank you for choosing Royal Carriages Limousines! Your one-way reservation has been confirmed. We look forward to providing you with exceptional luxury transportation service.</p>
            
            <div class="section">
                <div class="section-title">Your Reservation Details</div>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="label">Date & Time</div>
                        <div class="value">{{ date('m/d/Y', strtotime($data['pickup_date'])) }} at {{ date('g:i A', strtotime($data['pickup_time'])) }}</div>
                    </div>
                    <div class="info-item">
                        <div class="label">Drop-off Time</div>
                        <div class="value">{{ date('g:i A', strtotime($data['dropoff_time'])) }}</div>
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
                    <div class="info-item full-width">
                        <div class="label">Payment Card</div>
                        <div class="value">{{ $data['card_holder'] }} - {{ $data['card_last_four'] ?? '**** **** **** ' . substr($data['card_number'] ?? '', -4) }}</div>
                    </div>
                    @if($data['special_requirements'] ?? false)
                    <div class="info-item full-width">
                        <div class="label">Special Requirements</div>
                        <div class="value">{{ $data['special_requirements'] }}</div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="important-info">
                <div style="font-weight: bold; color: #92400e; margin-bottom: 10px; font-size: 14px;">ℹ️ Important Information</div>
                <ul style="color: #92400e; margin: 0; padding-left: 20px; font-size: 13px;">
                    <li>Please be ready 15 minutes before your scheduled pickup time</li>
                    <li>Our chauffeur will contact you 30 minutes before arrival</li>
                    <li>For any changes or cancellations, please call us at least 24 hours in advance</li>
                </ul>
            </div>

            <div class="contact-box">
                <p style="margin: 0; font-size: 16px; color: #065f46;">Questions or changes needed?</p>
                <div class="contact-phone">+1 (713) 787-5466</div>
                <p style="margin: 0; font-size: 14px; color: #065f46;">Available 24/7</p>
            </div>

            <p style="color: #4b5563; line-height: 1.6; margin-bottom: 0;">We appreciate your business and look forward to serving you!</p>
            <p style="color: #4b5563; margin-top: 5px;"><strong>Royal Carriages Team</strong></p>
        </div>
        
        <div class="footer">
            <p style="margin: 0;">Reservation confirmed on {{ date('m/d/Y g:i A') }}</p>
            <p style="margin: 5px 0 0 0;">Royal Carriages Limousines | www.royalcarriages.com</p>
        </div>
    </div>
</body>
</html>