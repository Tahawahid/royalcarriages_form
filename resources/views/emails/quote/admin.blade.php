<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Quote Request - Best Limousines</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f5f5f5; }
        .email-container { width: 100%; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: white; }
        
        .header { background: #dc2626; color: white; padding: 25px; }
        .urgent-badge { background: rgba(255,255,255,0.2); color: white; padding: 4px 12px; font-size: 11px; font-weight: bold; text-transform: uppercase; margin-bottom: 12px; display: inline-block; }
        .company-logo { font-size: 24px; font-weight: bold; margin: 0 0 8px 0; }
        .header-title { font-size: 18px; margin: 8px 0 0 0; }
        
        .content { padding: 30px; }
        .alert-banner { background: #fef2f2; border: 1px solid #fecaca; padding: 15px 20px; margin-bottom: 25px; }
        .alert-text { color: #991b1b; font-size: 14px; font-weight: bold; margin: 0; }
        
        .section { margin-bottom: 25px; }
        .section-title { font-size: 16px; font-weight: bold; color: #dc2626; margin-bottom: 15px; text-transform: uppercase; }
        
        .info-card { background: #fafafa; padding: 20px; border-left: 4px solid #dc2626; }
        .info-table { width: 100%; }
        .info-item { margin-bottom: 10px; }
        .info-label { font-size: 12px; font-weight: bold; color: #666; text-transform: uppercase; }
        .info-value { font-size: 14px; color: #333; font-weight: normal; word-break: break-word; }
        
        .schedule-card { background: #fff7ed; padding: 20px; border-left: 4px solid #ea580c; }
        .trip-card { background: #f0fdf4; padding: 20px; border-left: 4px solid #16a34a; }
        .requirements-card { background: #eff6ff; padding: 20px; border-left: 4px solid #3b82f6; }
        .requirements-text { font-size: 14px; color: #333; line-height: 1.6; margin: 0; }
        
        .priority-section { background: #dc2626; color: white; padding: 20px; text-align: center; margin: 25px 0; }
        .priority-title { color: white; font-size: 16px; font-weight: bold; margin: 0 0 8px 0; }
        .priority-text { font-size: 13px; margin: 0; }
        
        .footer { background: #f8f9fa; padding: 20px; }
        .footer-table { width: 100%; }
        .footer-info { font-size: 12px; color: #666; }
        .footer-timestamp { font-size: 11px; color: #999; text-align: right; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="container">
            <div class="header">
                <div class="header-content">
                    <div class="urgent-badge">🚨 New Quote Request</div>
                    <h1 class="company-logo">Best Limousines</h1>
                    <p class="header-title">Customer Quote Request Notification</p>
                </div>
            </div>
            
            <div class="content">
                <div class="alert-banner">
                    <p class="alert-text">⚡ Action Required: New quote request requires immediate attention</p>
                </div>
                
                <div class="section">
                    <div class="section-title">
                        👤 Customer Information
                    </div>
                    <div class="info-card">
                        <table class="info-table">
                            <tr>
                                <td style="width: 50%; padding: 5px; vertical-align: top;">
                                    <div class="info-item">
                                        <div class="info-label">First Name:</div>
                                        <div class="info-value">{{ $data['first_name'] }}</div>
                                    </div>
                                </td>
                                <td style="width: 50%; padding: 5px; vertical-align: top;">
                                    <div class="info-item">
                                        <div class="info-label">Last Name:</div>
                                        <div class="info-value">{{ $data['last_name'] }}</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50%; padding: 5px; vertical-align: top;">
                                    <div class="info-item">
                                        <div class="info-label">Email Address:</div>
                                        <div class="info-value">{{ $data['email'] }}</div>
                                    </div>
                                </td>
                                <td style="width: 50%; padding: 5px; vertical-align: top;">
                                    <div class="info-item">
                                        <div class="info-label">Phone Number:</div>
                                        <div class="info-value">{{ $data['phone'] }}</div>
                                    </div>
                                </td>
                            </tr>
                            @if(isset($data['company']))
                            <tr>
                                <td colspan="2" style="padding: 5px; vertical-align: top;">
                                    <div class="info-item">
                                        <div class="info-label">Company:</div>
                                        <div class="info-value">{{ $data['company'] }}</div>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
                
                <div class="section">
                    <div class="section-title">
                        📅 Schedule and Location
                    </div>
                    <div class="schedule-card">
                        <table class="info-table">
                            <tr>
                                <td style="width: 50%; padding: 5px; vertical-align: top;">
                                    <div class="info-item">
                                        <div class="info-label">Pickup Date:</div>
                                        <div class="info-value">{{ date('l, F j, Y', strtotime($data['pickup_date'])) }}</div>
                                    </div>
                                </td>
                                <td style="width: 50%; padding: 5px; vertical-align: top;">
                                    <div class="info-item">
                                        <div class="info-label">Pick-up Time:</div>
                                        <div class="info-value">{{ date('g:i A', strtotime($data['pickup_time'])) }}</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50%; padding: 5px; vertical-align: top;">
                                    <div class="info-item">
                                        <div class="info-label">Drop-off Time:</div>
                                        <div class="info-value">{{ date('g:i A', strtotime($data['dropoff_time'])) }}</div>
                                    </div>
                                </td>
                                <td style="width: 50%; padding: 5px; vertical-align: top;">
                                    <div class="info-item">
                                        <div class="info-label">Pick-up Location:</div>
                                        <div class="info-value">{{ $data['pickup_location'] }}</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding: 5px; vertical-align: top;">
                                    <div class="info-item">
                                        <div class="info-label">Drop-off Location:</div>
                                        <div class="info-value">{{ $data['dropoff_location'] }}</div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="section">
                    <div class="section-title">
                        🚗 Service Requirements
                    </div>
                    <div class="trip-card">
                        <table class="info-table">
                            <tr>
                                <td style="width: 50%; padding: 5px; vertical-align: top;">
                                    <div class="info-item">
                                        <div class="info-label">Type of Service:</div>
                                        <div class="info-value">{{ $data['service_type'] }}</div>
                                    </div>
                                </td>
                                <td style="width: 50%; padding: 5px; vertical-align: top;">
                                    <div class="info-item">
                                        <div class="info-label">Type of Vehicle:</div>
                                        <div class="info-value">{{ $data['vehicle_type'] }}</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50%; padding: 5px; vertical-align: top;">
                                    <div class="info-item">
                                        <div class="info-label">Number of Passengers:</div>
                                        <div class="info-value">{{ $data['passengers'] ?? 'Not specified' }}</div>
                                    </div>
                                </td>
                                <td style="width: 50%; padding: 5px; vertical-align: top;">
                                    <div class="info-item">
                                        <div class="info-label">Number of Suitcases:</div>
                                        <div class="info-value">{{ $data['suitcases'] ?? 'Not specified' }}</div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                @if($data['other_requirements'] ?? false)
                <div class="section">
                    <div class="section-title">
                        <span class="section-icon">📝</span> Special Requirements
                    </div>
                    <div class="requirements-card">
                        <div class="requirements-text">{{ $data['other_requirements'] }}</div>
                    </div>
                </div>
                @endif
                
                <div class="section">
                    <div class="section-title">
                        ⚡ Action Required
                    </div>
                    <div class="requirements-card">
                        <div class="info-item" style="margin-bottom: 15px;">
                            <div class="info-label">Task</div>
                            <div class="info-value">📞 Contact customer within 24 hours to provide quote</div>
                        </div>
                        <table class="info-table">
                            <tr>
                                <td style="width: 50%; padding: 5px; vertical-align: top;">
                                    <div class="info-item">
                                        <div class="info-label">📱 Phone:</div>
                                        <div class="info-value"><a href="tel:{{ $data['phone'] }}" style="color: #3b82f6; text-decoration: none;">{{ $data['phone'] }}</a></div>
                                    </div>
                                </td>
                                <td style="width: 50%; padding: 5px; vertical-align: top;">
                                    <div class="info-item">
                                        <div class="info-label">📧 Email:</div>
                                        <div class="info-value"><a href="mailto:{{ $data['email'] }}" style="color: #3b82f6; text-decoration: none;">{{ $data['email'] }}</a></div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="priority-section">
                    <div class="priority-icon">⏰</div>
                    <h3 class="priority-title">Response Required Within 24 Hours</h3>
                    <p class="priority-text">Please review this quote request and respond to the customer promptly to maintain service excellence.</p>
                </div>
            </div>
            
            <div class="footer">
                <table class="footer-table">
                    <tr>
                        <td style="width: 50%; vertical-align: top;">
                            <div class="footer-info">
                                <strong>Best Limousines</strong><br>
                                Admin Notification System
                            </div>
                        </td>
                        <td style="width: 50%; vertical-align: top;">
                            <div class="footer-timestamp">
                                <strong>Request Date:</strong> {{ date('M j, Y g:i A') }}<br>
                                <strong>Client IP:</strong> {{ request()->ip() }}
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

