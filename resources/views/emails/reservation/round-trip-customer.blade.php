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
        
        .closing-section { text-align: center; margin: 40px 0 20px 0; }
        .closing-text { color: #64748b; font-size: 14px; line-height: 1.6; margin-bottom: 12px; }
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
                    <h2 class="header-title">Round-Trip Reservation Confirmed!</h2>
                    <div class="status-confirmed">✓ ROUND-TRIP CONFIRMED</div>
                </div>
            </div>
            
            <div class="content">
                <div class="greeting">
                    <span class="greeting-emoji">👋</span>Hi {{ $data['first_name'] }},
                </div>
                <p class="intro-text">
                    Your round-trip luxury transportation is confirmed! Please save this confirmation for your records. We look forward to providing you with exceptional service.
                </p>
                
                <div class="section">
                    <div class="section-title">
                        <span class="section-icon">✈️</span> Outbound Trip - Schedule and Location
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
                                <div class="detail-label">Drop Off Time:</div>
                                <div class="detail-value">{{ date('g:i A', strtotime($data['dropoff_time'])) }}</div>
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
                <div class="section">
                    <div class="section-title">
                        <span class="section-icon">🔄</span> Return Trip - Schedule and Location
                    </div>
                    <div class="return-card">
                        <div class="detail-grid">
                            <div class="detail-item">
                                <div class="detail-label">Return Date:</div>
                                <div class="detail-value">{{ date('l, F j, Y', strtotime($data['return_date'])) }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Return Pickup Time:</div>
                                <div class="detail-value">{{ date('g:i A', strtotime($data['return_pickup_time'])) }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Return Drop Off Time:</div>
                                <div class="detail-value">{{ date('g:i A', strtotime($data['return_dropoff_time'])) }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Return Pickup Location:</div>
                                <div class="detail-value">{{ $data['return_pickup_location'] }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Return Drop Off Location:</div>
                                <div class="detail-value">{{ $data['return_dropoff_location'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="section">
                    <div class="section-title">
                        <span class="section-icon">🚗</span> Trip Details
                    </div>
                    <div class="detail-card">
                        <div class="detail-grid">
                            <div class="detail-item">
                                <div class="detail-label">Type of Service:</div>
                                <div class="detail-value">{{ $data['service_type'] ?? 'Round-Trip' }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Type of Vehicle:</div>
                                <div class="detail-value">{{ $data['vehicle_type'] }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Number of Passengers:</div>
                                <div class="detail-value">{{ $data['passengers'] ?? 'Not specified' }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Number of Suits:</div>
                                <div class="detail-value">{{ $data['suitcases'] ?? 'Not specified' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="section">
                    <div class="section-title">
                        <span class="section-icon">💳</span> Payment Information
                    </div>
                    <div class="detail-card">
                        <div class="detail-grid">
                            <div class="detail-item">
                                <div class="detail-label">Total Amount:</div>
                                <div class="detail-value">${{ number_format($data['total_amount'] ?? 0, 2) }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Payment Method:</div>
                                <div class="detail-value">{{ $data['payment_method'] ?? 'Credit Card' }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Card Type:</div>
                                <div class="detail-value">{{ $data['card_type'] ?? 'N/A' }}</div>
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
                
                <div class="contact-section">
                    <div class="contact-icon">📞</div>
                    <h3 class="contact-title">Questions? Contact us anytime!</h3>
                    <a href="tel:+17137875466" class="contact-phone">📱 Call: (713) 787-5466</a>
                    <p class="contact-subtitle">Available 24/7</p>
                </div>
                
                <div class="closing-section">
                    <p class="closing-text">Thank you for choosing Royal Carriages!</p>
                    <p class="team-signature">Royal Carriages Team</p>
                </div>
            </div>
            
            <div class="footer">
                <div class="footer-company">Royal Carriages • Luxury Transportation Services</div>
                <div class="footer-timestamp">Reservation confirmed on {{ date('F j, Y \a\t g:i A T') }}</div>
            </div>
        </div>
    </div>
</body>
</html>
<body>
    <div class="container">
        <div class="header">
            <h1 class="logo">Royal Carriages Limousines</h1>
            <p class="subtitle">Round-Trip Reservation Confirmed</p>
        </div>
        
        <div class="content">
            <div class="greeting">Hi {{ $data['first_name'] }},</div>
            <div class="status-confirmed">✓ ROUND-TRIP CONFIRMED</div>
            <p class="intro-text">Your round-trip luxury transportation is confirmed! Please save this confirmation for your records. We look forward to providing you with exceptional service.</p>
            
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
                    <td class="label">Pickup Location:</td>
                    <td class="value">{{ $data['pickup_location'] }}</td>
                </tr>
                <tr class="info-row">
                    <td class="label">Drop Off Location:</td>
                    <td class="value">{{ $data['dropoff_location'] }}</td>
                </tr>
            </table>
            
            <div class="trip-divider"></div>
            <div class="section-header">🚐 Return Trip - Schedule and Location</div>
            <table class="info-table">
                <tr class="info-row">
                    <td class="label">Return Pick Date:</td>
                    <td class="value">{{ date('m/d/Y', strtotime($data['return_pickup_date'])) }}</td>
                </tr>
                <tr class="info-row">
                    <td class="label">Return Pickup Time:</td>
                    <td class="value">{{ date('g:i A', strtotime($data['return_pickup_time'])) }}</td>
                </tr>
                <tr class="info-row">
                    <td class="label">Pickup Location:</td>
                    <td class="value">{{ $data['return_pickup_location'] }}</td>
                </tr>
                <tr class="info-row">
                    <td class="label">Drop Off Location:</td>
                    <td class="value">{{ $data['return_dropoff_location'] }}</td>
                </tr>
            </table>
            
            <div class="section-divider"></div>
            <div class="section-header">Trip Details</div>
            <table class="info-table">
                <tr class="info-row">
                    <td class="label">Type of Service:</td>
                    <td class="value">Round-Trip</td>
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
            
            <div class="section-divider"></div>
            <div class="section-header">Payment Information</div>
            <table class="info-table">
                <tr class="info-row">
                    <td class="label">Total Amount:</td>
                    <td class="value">${{ number_format($data['total_amount'] ?? 0, 2) }}</td>
                </tr>
                <tr class="info-row">
                    <td class="label">Payment Card:</td>
                    <td class="value">**** **** **** {{ $data['card_last_four'] ?? substr($data['card_number'] ?? '', -4) }}</td>
                </tr>
                <tr class="info-row">
                    <td class="label">Payment Status:</td>
                    <td class="value">{{ ucfirst($data['payment_status'] ?? 'pending') }}</td>
                </tr>
            </table>
            
            @if($data['special_requests'] ?? false)
            <div class="section-divider"></div>
            <div class="section-header">Other Requirements</div>
            <p style="color: #1f2937; line-height: 1.7; font-size: 14px; margin: 10px 0; white-space: pre-wrap; background: #f9fafb; padding: 15px; border-radius: 6px; border-left: 3px solid #3b82f6;">{{ $data['special_requests'] }}</p>
            @endif

            <div class="contact-box">
                <p class="contact-title">Questions? Contact us anytime!</p>
                <div class="contact-phone">+1 (713) 787-5466</div>
                <p class="contact-subtitle">Available 24/7</p>
            </div>

            <p class="footer-text">Thank you for choosing Royal Carriages!</p>
            <p class="team-signature">Royal Carriages Team</p>
        </div>
        
        <div class="footer">
            <p style="margin: 0;">Reservation confirmed on {{ date('m/d/Y g:i A') }}</p>
            <p style="margin: 5px 0 0 0;">Royal Carriages Limousines | www.royalcarriages.com</p>
        </div>
    </div>
</body>
</html>
