<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote Confirmation - Best Limousines</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f5f5f5; }
        .email-container { width: 100%; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: white; }
        
        .header { background: #4f46e5; color: white; padding: 30px; text-align: center; }
        .company-logo { font-size: 28px; font-weight: bold; margin: 0 0 10px 0; }
        .company-subtitle { margin: 0 0 20px 0; font-size: 14px; }
        .header-title { font-size: 24px; font-weight: bold; margin: 20px 0 10px 0; }
        .header-message { margin: 0; font-size: 16px; }
        
        .content { padding: 30px; background: white; }
        .greeting { font-size: 18px; color: #333; margin-bottom: 15px; font-weight: bold; }
        .intro-text { color: #666; line-height: 1.6; margin-bottom: 25px; }
        .highlight-text { color: #4f46e5; font-weight: bold; }
        
        .section-title { font-size: 16px; font-weight: bold; color: #059669; margin: 25px 0 15px 0; }
        
        .detail-card { background: #f8f9fa; padding: 20px; margin-bottom: 15px; border-left: 4px solid #10b981; }
        .detail-table { width: 100%; }
        .detail-row { margin-bottom: 10px; }
        .detail-label { font-size: 12px; font-weight: bold; color: #666; text-transform: uppercase; }
        .detail-value { font-size: 14px; color: #333; font-weight: normal; }
        
        .trip-card { background: #fef3e2; padding: 20px; border-left: 4px solid #f59e0b; }
        .trip-title { font-size: 16px; font-weight: bold; color: #9333ea; margin-bottom: 15px; }
        
        .requirements-card { background: #f0f9ff; padding: 20px; border-left: 4px solid #0ea5e9; }
        .requirements-text { font-size: 14px; color: #333; line-height: 1.6; }
        
        .next-steps { background: #fff7ed; padding: 20px; margin: 25px 0; border-left: 4px solid #ea580c; }
        .next-steps-title { font-size: 16px; font-weight: bold; color: #c2410c; margin-bottom: 15px; }
        .steps-list { margin: 0; padding-left: 20px; }
        .steps-list li { margin-bottom: 8px; color: #92400e; }
        
        .contact-section { background: #059669; color: white; padding: 25px; text-align: center; margin: 30px 0; }
        .contact-title { margin: 0 0 10px 0; font-size: 18px; font-weight: bold; }
        .contact-subtitle { margin: 0 0 15px 0; font-size: 14px; }
        .contact-phone { font-size: 24px; font-weight: bold; margin: 15px 0; color: white; text-decoration: none; }
        .contact-hours { margin: 15px 0 5px 0; font-size: 13px; }
        .contact-email { font-size: 13px; }
        .contact-email a { color: white; text-decoration: none; }
        
        .closing-section { text-align: center; margin: 30px 0; }
        .closing-title { font-size: 18px; font-weight: bold; color: #333; margin-bottom: 10px; }
        .closing-text { color: #666; margin-bottom: 10px; }
        .priority-text { color: #4f46e5; font-weight: bold; }
        
        .footer { background: #f8f9fa; padding: 20px; text-align: center; }
        .footer-company { font-size: 13px; color: #666; margin-bottom: 5px; }
        .footer-timestamp { font-size: 12px; color: #999; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="container">
            <div class="header">
                <div class="logo-section">
                    <h1 class="company-logo">Best Limousines</h1>
                    <p class="company-subtitle">Limousines & Charter • Worldwide Transportation</p>
                    <h2 class="header-title">Quote Request Received!</h2>
                    <p class="header-message">We'll get back to you soon with your personalized quote 💫</p>
                </div>
            </div>
            
            <div class="content">
                <div class="greeting">
                    <span class="greeting-emoji">👋</span>Hi {{ $data['first_name'] }},
                </div>
                <p class="intro-text">
                    Thank you for your interest in Best Limousines! We have received your quote request and our team will review your requirements and provide you with a <span class="highlight-text">personalized quote within 24 hours</span>. We're excited to help make your transportation experience exceptional!
                </p>
                
                <div class="section-title">
                    📅 Schedule and Location
                </div>
                <div class="trip-card">
                    <table class="detail-table">
                        <tr class="detail-row">
                            <td style="width: 50%; padding: 5px; vertical-align: top;">
                                <div class="detail-label">Pickup Date:</div>
                                <div class="detail-value">{{ date('l, F j, Y', strtotime($data['pickup_date'])) }}</div>
                            </td>
                            <td style="width: 50%; padding: 5px; vertical-align: top;">
                                <div class="detail-label">Pick-up Time:</div>
                                <div class="detail-value">{{ date('g:i A', strtotime($data['pickup_time'])) }}</div>
                            </td>
                        </tr>
                        <tr class="detail-row">
                            <td style="width: 50%; padding: 5px; vertical-align: top;">
                                <div class="detail-label">Drop-off Time:</div>
                                <div class="detail-value">{{ date('g:i A', strtotime($data['dropoff_time'])) }}</div>
                            </td>
                            <td style="width: 50%; padding: 5px; vertical-align: top;">
                                <div class="detail-label">Pick-up Location:</div>
                                <div class="detail-value">{{ $data['pickup_location'] }}</div>
                            </td>
                        </tr>
                        <tr class="detail-row">
                            <td style="width: 50%; padding: 5px; vertical-align: top;">
                                <div class="detail-label">Drop-off Location:</div>
                                <div class="detail-value">{{ $data['dropoff_location'] }}</div>
                            </td>
                            @if(isset($data['company']))
                            <td style="width: 50%; padding: 5px; vertical-align: top;">
                                <div class="detail-label">Company:</div>
                                <div class="detail-value">{{ $data['company'] }}</div>
                            </td>
                            @else
                            <td style="width: 50%; padding: 5px; vertical-align: top;"></td>
                            @endif
                        </tr>
                    </table>
                </div>
                
                <div class="section-title">
                    🚗 Trip Details
                </div>
                <div class="detail-card">
                    <table class="detail-table">
                        <tr class="detail-row">
                            <td style="width: 50%; padding: 5px; vertical-align: top;">
                                <div class="detail-label">Type of Service:</div>
                                <div class="detail-value">{{ $data['service_type'] }}</div>
                            </td>
                            <td style="width: 50%; padding: 5px; vertical-align: top;">
                                <div class="detail-label">Type of Vehicle:</div>
                                <div class="detail-value">{{ $data['vehicle_type'] }}</div>
                            </td>
                        </tr>
                        <tr class="detail-row">
                            <td style="width: 50%; padding: 5px; vertical-align: top;">
                                <div class="detail-label">Number of Passengers:</div>
                                <div class="detail-value">{{ $data['passengers'] ?? 'Not specified' }}</div>
                            </td>
                            <td style="width: 50%; padding: 5px; vertical-align: top;">
                                <div class="detail-label">Number of Suitcases:</div>
                                <div class="detail-value">{{ $data['suitcases'] ?? 'Not specified' }}</div>
                            </td>
                        </tr>
                    </table>
                </div>
                
                @if($data['other_requirements'] ?? false)
                <div class="requirements-section">
                    <div class="section-title">
                        <span class="section-icon">📝</span> Your Special Requirements
                    </div>
                    <div class="requirements-card">
                        <div class="requirements-text">{{ $data['other_requirements'] }}</div>
                    </div>
                </div>
                @endif
                
                <div class="next-steps">
                    <div class="next-steps-title">
                        <span class="section-icon">⏰</span> What Happens Next?
                    </div>
                    <ul class="steps-list">
                        <li><strong>Review:</strong> Our team will review your requirements and vehicle availability</li>
                        <li><strong>Quote:</strong> We'll prepare a personalized quote with transparent pricing</li>
                        <li><strong>Contact:</strong> You'll receive your quote via email or phone within 24 hours</li>
                        <li><strong>Queries:</strong> If you have any queries regarding anything, please call us on (743) 974-5466.</li>
                    </ul>
                </div>
                
                <div class="contact-section">
                    <div class="contact-icon">📞</div>
                    <h3 class="contact-title">Need to Speak with Us?</h3>
                    <p class="contact-subtitle">Have questions or need to modify your request? We're here to help!</p>
                    <a href="tel:+17439745466" class="contact-phone">📱 Call: (743) 974-5466</a>
                    <div class="contact-hours"><strong>Business Hours:</strong> Monday - Sunday, 24/7</div>
                    <div class="contact-email"><strong>Email:</strong> <a href="mailto:info@bestlimousines.com">info@bestlimousines.com</a></div>
                </div>
                
                <div class="closing-section">
                    <div class="closing-icon">🌟</div>
                    <h3 class="closing-title">Thank you for considering Best Limousines!</h3>
                    <p class="closing-text">
                        We're committed to providing you with exceptional luxury transportation service.
                    </p>
                    <p class="priority-text">Your quote request is our priority.</p>
                </div>
            </div>
            
            <div class="footer">
                <div class="footer-company">Best Limousines • Luxury Transportation Services</div>
                <div class="footer-timestamp">This is an automated confirmation email sent on {{ date('F j, Y \a\t g:i A T') }}</div>
            </div>
        </div>
    </div>
</body>
</html>


