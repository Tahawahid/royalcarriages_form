<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One-Way Reservation - Royal Carriages</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f8f9fa; }
        .container { max-width: 600px; margin: 0 auto; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg, #d97706, #f59e0b); color: white; padding: 20px; text-align: center; }
        .content { padding: 25px; }
        .section { margin-bottom: 20px; }
        .section-title { font-size: 16px; font-weight: bold; color: #374151; margin-bottom: 12px; padding-bottom: 6px; border-bottom: 2px solid #f59e0b; }
        .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px; }
        .info-item { background: #fef3c7; padding: 12px; border-radius: 6px; border-left: 3px solid #f59e0b; }
        .label { font-weight: bold; color: #6b7280; font-size: 12px; text-transform: uppercase; margin-bottom: 4px; }
        .value { color: #1f2937; font-size: 14px; }
        .full-width { grid-column: span 2; }
        .payment-section { background: #fef3c7; border: 1px solid #f59e0b; border-radius: 8px; padding: 15px; margin: 15px 0; }
        .footer { background: #f3f4f6; padding: 15px; text-align: center; font-size: 11px; color: #6b7280; }
        @media (max-width: 480px) { .info-grid { grid-template-columns: 1fr; } .full-width { grid-column: span 1; } }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="margin: 0; font-size: 24px;">Royal Carriages Limousines</h1>
            <p style="margin: 8px 0 0 0; opacity: 0.9;">New One-Way Reservation</p>
        </div>
        
        <div class="content">
            <div class="section">
                <div class="section-title">Customer Information</div>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="label">Name</div>
                        <div class="value">{{ $data['first_name'] }} {{ $data['last_name'] }}</div>
                    </div>
                    <div class="info-item">
                        <div class="label">Phone</div>
                        <div class="value">{{ $data['phone'] }}</div>
                    </div>
                    <div class="info-item full-width">
                        <div class="label">Email</div>
                        <div class="value">{{ $data['email'] }}</div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="section-title">Service Details</div>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="label">Date</div>
                        <div class="value">{{ date('m/d/Y', strtotime($data['pickup_date'])) }}</div>
                    </div>
                    <div class="info-item">
                        <div class="label">Service Type</div>
                        <div class="value">{{ $data['service_type'] }}</div>
                    </div>
                    <div class="info-item">
                        <div class="label">Pickup Time</div>
                        <div class="value">{{ date('g:i A', strtotime($data['pickup_time'])) }}</div>
                    </div>
                    <div class="info-item">
                        <div class="label">Drop-off Time</div>
                        <div class="value">{{ date('g:i A', strtotime($data['dropoff_time'])) }}</div>
                    </div>
                    <div class="info-item full-width">
                        <div class="label">Pickup Location</div>
                        <div class="value">{{ $data['pickup_location'] }}</div>
                    </div>
                    <div class="info-item full-width">
                        <div class="label">Drop-off Location</div>
                        <div class="value">{{ $data['dropoff_location'] }}</div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="section-title">Vehicle & Passengers</div>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="label">Vehicle Type</div>
                        <div class="value">{{ $data['vehicle_type'] }}</div>
                    </div>
                    <div class="info-item">
                        <div class="label">Passengers</div>
                        <div class="value">{{ $data['passengers'] ?? 'Not specified' }}</div>
                    </div>
                    @if(isset($data['suitcases']))
                    <div class="info-item">
                        <div class="label">Suitcases</div>
                        <div class="value">{{ $data['suitcases'] }}</div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="payment-section">
                <div style="font-weight: bold; color: #92400e; margin-bottom: 12px; font-size: 14px;">💳 PAYMENT INFORMATION</div>
                <div class="info-grid">
                    <div class="info-item" style="background: white;">
                        <div class="label">Cardholder</div>
                        <div class="value">{{ $data['card_holder'] }}</div>
                    </div>
                    <div class="info-item" style="background: white;">
                        <div class="label">Card Number</div>
                        <div class="value">**** **** **** {{ substr($data['card_number'], -4) }}</div>
                    </div>
                    <div class="info-item" style="background: white;">
                        <div class="label">Billing Address</div>
                        <div class="value">{{ $data['billing_address'] }}</div>
                    </div>
                    <div class="info-item" style="background: white;">
                        <div class="label">City, State ZIP</div>
                        <div class="value">{{ $data['billing_city'] }}, {{ $data['billing_state'] }} {{ $data['billing_zip'] }}</div>
                    </div>
                </div>
            </div>

            @if($data['special_requirements'] ?? false)
            <div class="section">
                <div class="section-title">Special Requirements</div>
                <div class="info-item full-width">
                    <div class="value" style="white-space: pre-wrap;">{{ $data['special_requirements'] }}</div>
                </div>
            </div>
            @endif
        </div>
        
        <div class="footer">
            <p style="margin: 0;">Reservation Date: {{ date('m/d/Y g:i A') }} | IP: {{ request()->ip() }}</p>
            <p style="margin: 5px 0 0 0;">Royal Carriages Limousines | www.royalcarriages.com</p>
        </div>
    </div>
</body>
</html>