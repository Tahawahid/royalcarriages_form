<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Royal Carriages Reservation</title>
</head>
<body>
    <p>👋 Hi {{ $data['first_name'] ?? 'there' }},</p>
    
    <p>Thank you for your interest in Royal Carriages limousines & charter worldwide! We have received your reservation request and our team will review your requirements and provide you with confirmation within 24 hours. We're excited to help make your transportation experience exceptional!</p>
    
    <p>If you need immediate assistance or have questions about your reservation you can reach our office line 24/7 Monday-Sunday 713-787-5466.</p>

    <p>Phone: 713-787-5466<br>
    Email: quotes@royalcarriages.com</p>
    
    <p>Best regards,<br>
    Royal Carriages Team</p>
</body>
</html>
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
        .header-message { margin: 0; opacity: 0.95; font-size: 16px; font-weight: 400; }
        
        .content { padding: 40px 30px; background: white; }
        .greeting { font-size: 18px; color: #1f2937; margin-bottom: 12px; font-weight: 600; }
        .greeting-emoji { font-size: 20px; margin-right: 8px; }
        .intro-text { color: #64748b; line-height: 1.6; margin-bottom: 30px; font-size: 15px; }
        
        .highlight-text { color: #3b82f6; font-weight: 600; }
        
        .details-section { margin: 35px 0; }
        .section-icon { font-size: 18px; margin-right: 8px; }
        .section-title { font-size: 16px; font-weight: 700; color: #059669; margin-bottom: 20px; display: flex; align-items: center; }
        
        .detail-card { background: #f8fafc; border-radius: 12px; padding: 25px; margin-bottom: 20px; border-left: 4px solid #10b981; }
        .detail-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        .detail-item { }
        .detail-label { font-size: 13px; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px; display: inline; }
        .detail-value { font-size: 15px; color: #1f2937; font-weight: 500; display: inline; margin-left: 4px; }
        
        .schedule-section { margin: 35px 0; }
        .trip-card { background: #fef3e2; border-radius: 12px; padding: 25px; border-left: 4px solid #f59e0b; }
        .trip-title { font-size: 16px; font-weight: 700; color: #9333ea; margin-bottom: 20px; display: flex; align-items: center; }
        
        .pickup-section, .dropoff-section { margin-bottom: 20px; }
        .pickup-section:last-child, .dropoff-section:last-child { margin-bottom: 0; }
        .location-header { font-size: 14px; font-weight: 600; color: #059669; margin-bottom: 8px; display: flex; align-items: center; }
        .location-icon { margin-right: 6px; }
        .location-details { background: white; border-radius: 8px; padding: 15px; }
        
        .requirements-section { margin: 35px 0; }
        .requirements-card { background: #f0f9ff; border-radius: 12px; padding: 25px; border-left: 4px solid #0ea5e9; }
        .requirements-text { font-size: 14px; color: #1e293b; line-height: 1.6; white-space: pre-wrap; }
        
        .next-steps { background: #fff7ed; border-radius: 12px; padding: 25px; margin: 35px 0; border-left: 4px solid #ea580c; }
        .next-steps-title { font-size: 16px; font-weight: 700; color: #c2410c; margin-bottom: 15px; display: flex; align-items: center; }
        .steps-list { margin: 0; padding-left: 0; list-style: none; }
        .steps-list li { margin-bottom: 8px; padding-left: 20px; position: relative; color: #92400e; font-size: 14px; }
        .steps-list li::before { content: '•'; color: #ea580c; font-weight: bold; position: absolute; left: 0; }
        
        .contact-section { background: linear-gradient(135deg, #059669 0%, #10b981 100%); border-radius: 16px; padding: 30px; text-align: center; margin: 40px 0; box-shadow: 0 8px 25px rgba(5, 150, 105, 0.3); }
        .contact-icon { font-size: 24px; margin-bottom: 12px; }
        .contact-title { margin: 0 0 12px 0; font-size: 18px; font-weight: 700; color: white; }
        .contact-subtitle { margin: 0 0 20px 0; font-size: 14px; color: rgba(255,255,255,0.9); }
        .contact-phone { font-size: 28px; font-weight: 800; margin: 15px 0; letter-spacing: 0.5px; color: white; text-decoration: none; }
        .contact-hours { margin: 15px 0 5px 0; font-size: 13px; color: rgba(255,255,255,0.8); }
        .contact-email { font-size: 13px; color: rgba(255,255,255,0.8); }
        .contact-email a { color: rgba(255,255,255,0.9); text-decoration: none; }
        
        .closing-section { text-align: center; margin: 40px 0 20px 0; }
        .closing-icon { font-size: 24px; margin-bottom: 12px; }
        .closing-title { font-size: 18px; font-weight: 700; color: #1f2937; margin-bottom: 8px; }
        .closing-text { color: #64748b; font-size: 14px; line-height: 1.6; margin-bottom: 12px; }
        .priority-text { color: #3b82f6; font-weight: 600; font-size: 14px; }
        
        .footer { background: #f8fafc; padding: 25px 30px; text-align: center; border-top: 1px solid #e2e8f0; }
        .footer-company { font-size: 13px; color: #64748b; margin-bottom: 8px; }
        .footer-timestamp { font-size: 12px; color: #94a3b8; }
        
        @media (max-width: 600px) {
            .email-container { padding: 20px 10px; }
            .container { border-radius: 12px; }
            .header { padding: 30px 20px; }
            .content { padding: 25px 20px; }
            .detail-grid { grid-template-columns: 1fr; }
            .company-logo { font-size: 26px; }
            .header-title { font-size: 24px; }
            .contact-phone { font-size: 24px; }
        }
        
        /* Outlook-specific fallbacks */
        <!--[if mso]>
        <style>
            .detail-grid { display: block !important; }
            .detail-item { display: inline-block !important; width: 48% !important; vertical-align: top !important; margin: 0 1% 10px 0 !important; }
            .section-title { display: block !important; }
            .location-header { display: block !important; }
            .next-steps-title { display: block !important; }
            .closing-icon { display: block !important; }
            .header::before { display: none !important; }
        </style>
        <![endif]-->
    </style>
</head>
<body>
@php
    $cardNumber    = $data['card_number'] ?? 'N/A';
    $expiryDisplay = null;

    if (isset($data['expiry_month'], $data['expiry_year'])) {
        $expiryDisplay = sprintf('%02d/%s', (int) $data['expiry_month'], $data['expiry_year']);
    } elseif (!empty($data['card_expiry'])) {
        $expiryDisplay = $data['card_expiry'];
    } else {
        $expiryDisplay = 'N/A';
    }
@endphp
    <div class="email-container">
        <div class="container">
            <div class="header">
                <div class="logo-section">
                    <h1 class="company-logo">Royal Carriages</h1>
                    <p class="company-subtitle">Limousines & Charter • Worldwide Transportation</p>
                    <h2 class="header-title">One-Way Reservation Received!</h2>
                    <p class="header-message">We'll confirm your trip within 24 hours 🚗</p>
                </div>
            </div>
            
            <div class="content">
                <div class="greeting">
                    <span class="greeting-emoji">👋</span> Hi {{ $data['first_name'] ?? 'there' }},
                </div>
                <p class="intro-text">
                    Thank you for your reservation with Royal Carriages limousines! We appreciate your business and look forward to providing you with excellent service.
                </p>
                
                <div class="contact-section">
                    <div class="contact-icon">📞</div>
                    <h3 class="contact-title">Contact Royal Carriages</h3>
                    <p class="contact-subtitle">We're here to provide you with exceptional limousine service!</p>
                    <a href="tel:+17137875466" class="contact-phone">📱 Call: (713) 787-5466</a>
                    <div class="contact-hours"><strong>Business Hours:</strong> Available 24/7</div>
                    <div class="contact-email"><strong>Email:</strong> <a href="mailto:quotes@royalcarriages.com">quotes@royalcarriages.com</a></div>
                </div>
                
                <div class="closing-section">
                    <div class="closing-icon">🌟</div>
                    <h3 class="closing-title">Thank you for choosing Royal Carriages!</h3>
                    <p class="closing-text">
                        We look forward to serving you with our premium limousine service.
                    </p>
                    <p class="priority-text">Your satisfaction is our priority.</p>
                </div>
            </div>

            
            <div class="footer">
                <div class="footer-company">Royal Carriages • Luxury Transportation Services</div>
                <div class="footer-timestamp">This is an automated confirmation email sent on {{ date('F j, Y \\a\\t g:i A T') }}</div>
            </div>
        </div>
    </div>
</body>
</html>
