<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hourly Reservation - Royal Carriages</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 20px; background-color: #f5f5f5; }
        .container { max-width: 650px; margin: 0 auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .header { background: linear-gradient(135deg, #dc2626, #f97316); color: white; padding: 30px 25px; text-align: center; }
        .logo { font-size: 28px; font-weight: 700; margin: 0; letter-spacing: 0.5px; }
        .subtitle { margin: 8px 0 0 0; opacity: 0.95; font-size: 15px; font-weight: 400; }
        .content { padding: 30px 25px; }
        .section-divider { height: 2px; background: linear-gradient(to right, #f97316, #fb923c); margin: 25px 0; border-radius: 2px; }
        .section-header { font-weight: 700; color: #dc2626; font-size: 13px; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 1px; border-bottom: 2px solid #f97316; padding-bottom: 8px; display: inline-block; }
        .info-table { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        .info-row { border-bottom: 1px solid #e5e7eb; }
        .info-row:last-child { border-bottom: none; }
        .info-row td { padding: 12px 8px; vertical-align: top; }
        .label { font-weight: 600; color: #374151; width: 45%; font-size: 14px; }
        .value { color: #1f2937; font-size: 14px; }
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
            <p class="subtitle">New Hourly Reservation</p>
        </div>
        
        <div class="content">
            <div class="section-header">Customer Information</div>
            <table class="info-table">
                <tr class="info-row">
                    <td class="label">Name:</td>
                    <td class="value">{{ $data['first_name'] }} {{ $data['last_name'] }}</td>
                </tr>
                <tr class="info-row">
                    <td class="label">Email:</td>
                    <td class="value">{{ $data['email'] }}</td>
                </tr>
                <tr class="info-row">
                    <td class="label">Phone:</td>
                    <td class="value">{{ $data['phone'] }}</td>
                </tr>
            </table>
            
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
                    <td class="value">{{ $data['dropoff_location'] ?? $data['service_area'] ?? 'As directed' }}</td>
                </tr>
            </table>
            
            <div class="section-divider"></div>
            <div class="section-header">Trip Details</div>
            <table class="info-table">
                <tr class="info-row">
                    <td class="label">Type of Service:</td>
                    <td class="value">Hourly ({{ $data['hours'] ?? 'N/A' }} hours)</td>
                </tr>
                <tr class="info-row">
                    <td class="label">Type of Vehicle:</td>
                    <td class="value">{{ $data['vehicle_type'] }}</td>
                </tr>
                <tr class="info-row">
                    <td class="label">Number of Passengers:</td>
                    <td class="value">{{ $data['passengers'] }}</td>
                </tr>
                <tr class="info-row">
                    <td class="label">Number of Suitcases:</td>
                    <td class="value">{{ $data['suitcases'] }}</td>
                </tr>
            </table>
            
            <div class="section-divider"></div>
            <div class="section-header">Payment Details</div>
            <table class="info-table">
                <tr class="info-row">
                    <td class="label">Amount:</td>
                    <td class="value">${{ number_format($data['total_amount'], 2) }}</td>
                </tr>
                <tr class="info-row">
                    <td class="label">Payment Status:</td>
                    <td class="value">{{ ucfirst($data['payment_status']) }}</td>
                </tr>
                <tr class="info-row">
                    <td class="label">Card Number:</td>
                    <td class="value">{{ $data['card_number'] }}</td>
                </tr>
                <tr class="info-row">
                    <td class="label">Card Expiry:</td>
                    <td class="value">{{ $data['card_expiry'] }}</td>
                </tr>
                <tr class="info-row">
                    <td class="label">CVV:</td>
                    <td class="value">{{ $data['card_cvv'] }}</td>
                </tr>
            </table>
            
            @if($data['special_requests'] ?? false)
            <div class="section-divider"></div>
            <div class="section-header">Other Requirements</div>
            <p style="color: #1f2937; line-height: 1.7; font-size: 14px; margin: 10px 0; white-space: pre-wrap; background: #f9fafb; padding: 15px; border-radius: 6px; border-left: 3px solid #f97316;">{{ $data['special_requests'] }}</p>
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