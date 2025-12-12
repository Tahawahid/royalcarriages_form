<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote Request - Royal Carriages</title>
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
            <p style="margin: 8px 0 0 0; opacity: 0.9;">New Quote Request</p>
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
            @if(isset($data['company']))
            <div class="info-row">
                <div class="label">Company:</div>
                <div class="value">{{ $data['company'] }}</div>
            </div>
            @endif
            
            <div class="section-divider"></div>
            <div class="section-header">Schedule and Location</div>
            <div class="info-row">
                <div class="label">Pick Date:</div>
                <div class="value">{{ date('m/d/Y', strtotime($data['pickup_date'])) }}</div>
            </div>
            <div class="info-row">
                <div class="label">Pickup Time:</div>
                <div class="value">{{ date('g:i A', strtotime($data['pickup_time'])) }}</div>
            </div>
            <div class="info-row">
                <div class="label">Drop Off Time:</div>
                <div class="value">{{ date('g:i A', strtotime($data['dropoff_time'])) }}</div>
            </div>
            <div class="info-row">
                <div class="label">Pickup Location:</div>
                <div class="value">{{ $data['pickup_location'] }}</div>
            </div>
            <div class="info-row">
                <div class="label">Drop Off Location:</div>
                <div class="value">{{ $data['dropoff_location'] }}</div>
            </div>
            
            <div class="section-divider"></div>
            <div class="section-header">Trip Details</div>
            <div class="info-row">
                <div class="label">Type of Service:</div>
                <div class="value">{{ $data['service_type'] }}</div>
            </div>
            <div class="info-row">
                <div class="label">Type of Vehicle:</div>
                <div class="value">{{ $data['vehicle_type'] }}</div>
            </div>
            <div class="info-row">
                <div class="label">Number of Passengers:</div>
                <div class="value">{{ $data['passengers'] ?? 'Not specified' }}</div>
            </div>
            <div class="info-row">
                <div class="label">Number of Suitcases:</div>
                <div class="value">{{ $data['suitcases'] ?? 'Not specified' }}</div>
            </div>
            
            @if($data['other_requirements'] ?? false)
            <div class="section-divider"></div>
            <div class="section-header">Other Requirements</div>
            <div style="color: #1f2937; line-height: 1.5; white-space: pre-wrap;">{{ $data['other_requirements'] }}</div>
            @endif
        </div>
        
        <div class="footer">
            <p style="margin: 0;">Request Date: {{ date('m/d/Y g:i A') }} | IP: {{ request()->ip() }}</p>
            <p style="margin: 5px 0 0 0;">Royal Carriages Limousines | www.royalcarriages.com</p>
        </div>
    </div>
</body>
</html>