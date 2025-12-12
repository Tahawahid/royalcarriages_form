<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Round-Trip Reservation Confirmation - Royal Carriages</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 0; background: linear-gradient(135deg, #f0f4ff 0%, #e0f2fe 100%); }
        .email-container { width: 100%; padding: 30px 15px; box-sizing: border-box; }
        .container { width: 100%; margin: 0 auto; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.12); }
        
        .header { background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #2563eb 100%); color: white; padding: 40px 30px; text-align: center; position: relative; }
        .header::before { content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="1" fill="%23ffffff" opacity="0.1"/><circle cx="80" cy="80" r="1" fill="%23ffffff" opacity="0.1"/><circle cx="40" cy="60" r="1" fill="%23ffffff" opacity="0.1"/><circle cx="60" cy="30" r="1" fill="%23ffffff" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>'); }
        .logo-section { position: relative; z-index: 1; }
        .company-logo { font-size: 32px; font-weight: 800; margin: 0 0 8px 0; letter-spacing: -0.5px; text-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .company-subtitle { margin: 0 0 20px 0; opacity: 0.9; font-size: 14px; font-weight: 400; letter-spacing: 0.5px; text-transform: uppercase; }
        .header-title { font-size: 28px; font-weight: 700; margin: 20px 0 8px 0; }
        .status-confirmed { background: rgba(16, 185, 129, 0.9); color: white; padding: 8px 16px; border-radius: 20px; display: inline-block; font-weight: 700; margin: 10px 0; font-size: 12px; letter-spacing: 0.5px; }
        
        .content { padding: 40px 30px; background: white; }
        .greeting { font-size: 18px; color: #1f2937; margin-bottom: 12px; font-weight: 600; }
        .greeting-emoji { font-size: 20px; margin-right: 8px; }
        .intro-text { color: #64748b; line-height: 1.6; margin-bottom: 30px; font-size: 15px; }
        
        .section { margin: 35px 0; }
        .section-icon { font-size: 18px; margin-right: 8px; }
        .section-title { font-size: 16px; font-weight: 700; color: #059669; margin-bottom: 20px; display: flex; align-items: center; }
        .trip-divider { height: 3px; background: linear-gradient(to right, #f59e0b, #fbbf24); margin: 30px 0 20px; border-radius: 2px; }
        
        .detail-card { background: #f8fafc; border-radius: 12px; padding: 25px; border-left: 4px solid #10b981; }
        .return-card { background: #fef3e2; border-radius: 12px; padding: 25px; border-left: 4px solid #f59e0b; }
        .detail-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        .detail-item { margin-bottom: 12px; }
        .detail-item:last-child { margin-bottom: 0; }
        .detail-label { font-size: 13px; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px; display: inline; }
        .detail-value { font-size: 15px; color: #1f2937; font-weight: 500; display: inline; margin-left: 4px; }
        
        .requirements-section { margin: 35px 0; }
        .requirements-card { background: #f0f9ff; border-radius: 12px; padding: 25px; border-left: 4px solid #0ea5e9; }
        .requirements-text { font-size: 14px; color: #1e293b; line-height: 1.6; white-space: pre-wrap; }
        
        .contact-section { background: linear-gradient(135deg, #059669 0%, #10b981 100%); border-radius: 16px; padding: 30px; text-align: center; margin: 40px 0; box-shadow: 0 8px 25px rgba(5, 150, 105, 0.3); }
        .contact-icon { font-size: 24px; margin-bottom: 12px; }
        .contact-title { margin: 0 0 12px 0; font-size: 18px; font-weight: 700; color: white; }
        .contact-phone { font-size: 28px; font-weight: 800; margin: 15px 0; letter-spacing: 0.5px; color: white; text-decoration: none; }
        .contact-subtitle { margin: 0; font-size: 14px; color: rgba(255,255,255,0.9); }
        .contact-hours { margin: 15px 0 5px 0; font-size: 13px; color: rgba(255,255,255,0.8); }
        .contact-email { font-size: 13px; color: rgba(255,255,255,0.8); }
        .contact-email a { color: rgba(255,255,255,0.9); text-decoration: none; }
        
        .closing-section { text-align: center; margin: 40px 0 20px 0; }
        .closing-icon { font-size: 24px; margin-bottom: 12px; }
        .closing-title { font-size: 18px; font-weight: 700; color: #1f2937; margin-bottom: 8px; }
        .closing-text { color: #64748b; font-size: 14px; line-height: 1.6; margin-bottom: 12px; }
        .priority-text { color: #3b82f6; font-weight: 600; font-size: 14px; }
        .team-signature { color: #1f2937; font-weight: 600; font-size: 14px; }
        
        .footer { background: #f8fafc; padding: 25px 30px; text-align: center; border-top: 1px solid #e2e8f0; }
        .footer-company { font-size: 13px; color: #64748b; margin-bottom: 8px; }
        .footer-timestamp { font-size: 12px; color: #94a3b8; }
        
        @media (max-width: 600px) {
            .email-container { padding: 20px 10px; }
            .container { border-radius: 12px; }
            .header { padding: 30px 20px; }
            .content { padding: 25px 20px; }
            .detail-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="container">
            <div class="header">
                <div class="logo-section">
                    <h1 class="company-logo">Royal Carriages</h1>
                    <p class="company-subtitle">Limousines & Charter • Worldwide Transportation</p>
                    <h2 class="header-title">Reservation Request Received!</h2>
                    <p class="header-message">We'll contact you soon to confirm your reservation 💫</p>
                </div>
            </div>
            
            <div class="content">
                <div class="greeting">
                    <span class="greeting-emoji">👋</span>Hi {{ $data['first_name'] }},
                </div>
                <p class="intro-text">
                    Thank you for your interest in Royal Carriages! We have received your reservation request and our team will review your requirements. <span class="highlight-text">Someone from our team will contact you within 24 hours to confirm your reservation and discuss payment</span>. We're excited to help make your transportation experience exceptional!
                </p>
                
                <div class="schedule-section">
                    <div class="section-title">
                        <span class="section-icon">✈️</span> Outbound Trip Details
                    </div>
                    <div class="detail-card">
                        <div class="detail-grid">
                            <div class="detail-item">
                                <div class="detail-label">Pickup Date:</div>
                                <div class="detail-value">{{ date('l, F j, Y', strtotime($data['pickup_date'])) }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Pickup Time:</div>
                                <div class="detail-value">{{ date('g:i A', strtotime($data['pickup_time'])) }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Pickup Location:</div>
                                <div class="detail-value">{{ $data['pickup_location'] }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Drop Off Location:</div>
                                <div class="detail-value">{{ $data['dropoff_location'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="trip-divider"></div>
                
                <div class="schedule-section">
                    <div class="section-title">
                        <span class="section-icon">🔄</span> Return Trip Details
                    </div>
                    <div class="return-card">
                        <div class="detail-grid">
                            <div class="detail-item">
                                <div class="detail-label">Return Date:</div>
                                <div class="detail-value">{{ isset($data['return_date']) ? date('l, F j, Y', strtotime($data['return_date'])) : 'Not specified' }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Return Time:</div>
                                <div class="detail-value">{{ isset($data['return_pickup_time']) ? date('g:i A', strtotime($data['return_pickup_time'])) : 'Not specified' }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Return Pickup:</div>
                                <div class="detail-value">{{ $data['return_pickup_location'] ?? 'Not specified' }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Return Drop Off:</div>
                                <div class="detail-value">{{ $data['return_dropoff_location'] ?? 'Not specified' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="details-section">
                    <div class="section-title">
                        <span class="section-icon">🚗</span> Service Details
                    </div>
                    <div class="detail-card">
                        <div class="detail-grid">
                            <div class="detail-item">
                                <div class="detail-label">Vehicle Type:</div>
                                <div class="detail-value">{{ $data['vehicle_type'] }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Passengers:</div>
                                <div class="detail-value">{{ $data['passengers'] ?? 'Not specified' }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Payment Method:</div>
                                <div class="detail-value">{{ $data['card_type'] ?? 'Credit Card' }} ending in {{ substr($data['card_number'] ?? '0000', -4) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                @if($data['special_requirements'] ?? false)
                <div class="requirements-section">
                    <div class="section-title">
                        <span class="section-icon">📝</span> Your Special Requirements
                    </div>
                    <div class="requirements-card">
                        <div class="requirements-text">{{ $data['special_requirements'] }}</div>
                    </div>
                </div>
                @endif
                
                <div class="next-steps">
                    <div class="next-steps-title">
                        <span class="section-icon">⏰</span> What Happens Next?
                    </div>
                    <ul class="steps-list">
                        <li><strong>Review:</strong> Our team will review your reservation request and vehicle availability</li>
                        <li><strong>Contact:</strong> We'll call you within 24 hours to confirm details and arrange payment</li>
                        <li><strong>Confirmation:</strong> Once payment is processed, you'll receive final confirmation</li>
                        <li><strong>Service:</strong> We'll be ready to provide exceptional luxury transportation!</li>
                    </ul>
                </div>
                
                <div class="contact-section">
                    <div class="contact-icon">📞</div>
                    <h3 class="contact-title">Need to Speak with Us?</h3>
                    <p class="contact-subtitle">Have questions or need to modify your request? We're here to help!</p>
                    <a href="tel:+17137875466" class="contact-phone">📱 Call: (713) 787-5466</a>
                    <div class="contact-hours"><strong>Business Hours:</strong> Monday - Sunday, 24/7</div>
                    <div class="contact-email"><strong>Email:</strong> <a href="mailto:reservations@royalcarriages.com">reservations@royalcarriages.com</a></div>
                </div>
                
                <div class="closing-section">
                    <div class="closing-icon">🌟</div>
                    <h3 class="closing-title">Thank you for considering Royal Carriages!</h3>
                    <p class="closing-text">
                        We're committed to providing you with exceptional luxury transportation service.
                    </p>
                    <p class="priority-text">Your reservation request is our priority.</p>
                </div>
            </div>
            
            <div class="footer">
                <div class="footer-company">Royal Carriages • Luxury Transportation Services</div>
                <div class="footer-timestamp">This is an automated confirmation email sent on {{ date('F j, Y \a\t g:i A T') }}</div>
            </div>
        </div>
    </div>
</body>
</html>
