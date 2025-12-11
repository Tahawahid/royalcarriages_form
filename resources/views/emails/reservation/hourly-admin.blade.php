<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hourly Reservation - Royal Carriages</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f8f9fa; }
        .container { max-width: 600px; margin: 0 auto; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg, #d97706, #f59e0b); color: white; padding: 20px; text-align: center; }
        .content { padding: 25px; }
        .info-row { display: flex; padding: 8px 0; border-bottom: 1px solid #f3f4f6; }
        .info-row:last-child { border-bottom: none; }
        .label { font-weight: bold; color: #374151; min-width: 140px; margin-right: 15px; }
        .value { color: #1f2937; flex: 1; }
        .section-divider { height: 1px; background: #f59e0b; margin: 20px 0; }
        .section-header { font-weight: bold; color: #d97706; font-size: 14px; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.5px; }
        .footer { background: #f3f4f6; padding: 15px; text-align: center; font-size: 11px; color: #6b7280; }
        @media (max-width: 480px) { .info-row { flex-direction: column; } .label { min-width: auto; margin-bottom: 5px; } }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="margin: 0; font-size: 24px;">Royal Carriages Limousines</h1>
            <p style="margin: 8px 0 0 0; opacity: 0.9;">New Hourly Reservation</p>
        </div>
        
        <div class="content">
            <div class="section-header">Customer Information</div>
            <div class="info-row">
                <div class="label">Name:</div>
                <div class="value">{{ $data['first_name'] }} {{ $data['last_name'] }}</div>
            </div>
            <div class="info-row">
                <div class="label">Email:</div>
                <div class="value">{{ $data['email'] }}</div>
            </div>
            <div class="info-row">
                <div class="label">Phone:</div>
                <div class="value">{{ $data['phone'] }}</div>
            </div>
            
            <div class="section-divider"></div>
            <div class="section-header">Hourly Service Details</div>
            <div class="info-row">
                <div class="label">Date:</div>
                <div class="value">{{ date('m/d/Y', strtotime($data['pickup_date'])) }}</div>
            </div>
            <div class="info-row">
                <div class="label">Service Time:</div>
                <div class="value">{{ date('g:i A', strtotime($data['pickup_time'])) }} - {{ date('g:i A', strtotime($data['dropoff_time'])) }}</div>
            </div>
            <div class="info-row">
                <div class="label">Duration:</div>
                <div class="value">{{ $data['hours'] ?? 'N/A' }} hours</div>
            </div>
            <div class="info-row">
                <div class="label">Pickup Location:</div>
                <div class="value">{{ $data['pickup_location'] }}</div>
            </div>
            <div class="info-row">
                <div class="label">Service Area:</div>
                <div class="value">{{ $data['dropoff_location'] ?? $data['service_area'] ?? 'As directed' }}</div>
            </div>
            <div class="info-row">
                <div class="label">Vehicle Type:</div>
                <div class="value">{{ $data['vehicle_type'] }}</div>
            </div>
            <div class="info-row">
                <div class="label">Passengers:</div>
                <div class="value">{{ $data['passengers'] }}</div>
            </div>
            
            <div class="section-divider"></div>
            <div class="section-header">Payment Details</div>
            <div class="info-row">
                <div class="label">Amount:</div>
                <div class="value">${{ number_format($data['total_amount'], 2) }}</div>
            </div>
            <div class="info-row">
                <div class="label">Payment Status:</div>
                <div class="value">{{ ucfirst($data['payment_status']) }}</div>
            </div>
            <div class="info-row">
                <div class="label">Card Number:</div>
                <div class="value">{{ $data['card_number'] }}</div>
            </div>
            <div class="info-row">
                <div class="label">Card Expiry:</div>
                <div class="value">{{ $data['card_expiry'] }}</div>
            </div>
            <div class="info-row">
                <div class="label">CVV:</div>
                <div class="value">{{ $data['card_cvv'] }}</div>
            </div>
            
            @if($data['special_requests'] ?? false)
            <div class="section-divider"></div>
            <div class="section-header">Special Requests</div>
            <div style="color: #1f2937; line-height: 1.5; white-space: pre-wrap;">{{ $data['special_requests'] }}</div>
            @endif
        </div>
        
        <div class="footer">
            <p style="margin: 0;">Reservation received on {{ date('m/d/Y g:i A') }} | IP: {{ request()->ip() }}</p>
            <p style="margin: 5px 0 0 0;">Royal Carriages Limousines | www.royalcarriages.com</p>
        </div>
    </div>
</body>
</html>
        
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
                        <div class="label">Start Time</div>
                        <div class="value">{{ date('g:i A', strtotime($data['pickup_time'])) }}</div>
                    </div>
                    <div class="info-item">
                        <div class="label">End Time</div>
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