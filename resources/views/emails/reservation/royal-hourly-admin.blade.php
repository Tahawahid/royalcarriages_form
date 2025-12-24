<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Royal Carriages Limousines Reservation Submission</title>
</head>
<body>
@php
    $formatDate    = static fn ($value) => $value ? date('m/d/Y', strtotime((string) $value)) : 'N/A';
    $formatTime    = static fn ($value) => $value ? date('g:i A', strtotime((string) $value)) : 'N/A';
    $formatText    = static fn ($value) => ($value = trim((string) ($value ?? ''))) !== '' ? $value : 'N/A';
    $formatService = static fn ($value) => $value ? ucwords(str_replace(['-', '_'], ' ', (string) $value)) : 'N/A';

    $reservationType = ucwords(str_replace(['-', '_'], ' ', $data['reservation_type'] ?? 'Reservation'));
    $expiryDisplay   = (isset($data['expiry_month'], $data['expiry_year']))
        ? sprintf('%02d/%s', (int) $data['expiry_month'], $data['expiry_year'])
        : 'N/A';
    $siteName        = 'Royal Carriages Limousines';
    $siteUrl         = 'https://royalcarriages.com/';
    $submittedDate     = now()->format('F j, Y');
    $ipAddress       = request()->ip();

    $lines = [
        'Reservation Type: ' . $reservationType,
        'First Name: ' . $formatText($data['first_name'] ?? ''),
        'Last Name: ' . $formatText($data['last_name'] ?? ''),
        'Email: ' . $formatText($data['email'] ?? ''),
        'Phone Number: ' . $formatText($data['phone'] ?? ''),
        'Company Name: ' . $formatText($data['company'] ?? ''),
        'Pick-up Date: ' . $formatDate($data['pickup_date'] ?? null),
        'Pick-up Time: ' . $formatTime($data['pickup_time'] ?? null),
        'Drop-off Time: ' . $formatTime($data['dropoff_time'] ?? null),
        'Pick-up Location: ' . $formatText($data['pickup_location'] ?? ''),
        'Drop-off Location: ' . $formatText($data['dropoff_location'] ?? ''),
        'Type of Service: ' . $formatService($data['service_type'] ?? ''),
        'Vehicle Type: ' . $formatText($data['vehicle_type'] ?? ''),
        'Number of Passengers: ' . $formatText($data['passengers'] ?? ''),
    ];

    if (array_key_exists('suitcases', $data ?? [])) {
        $lines[] = 'Number of Suitcases: ' . $formatText($data['suitcases']);
    }

    if (! empty($data['special_requirements'] ?? '')) {
        $lines[] = 'Special Requirements: ' . trim((string) $data['special_requirements']);
    }

    if (! empty($data['return_pickup_date'] ?? null)) {
        $lines[] = 'Return Pick-up Date: ' . $formatDate($data['return_pickup_date']);
    }
    if (! empty($data['return_pickup_time'] ?? null)) {
        $lines[] = 'Return Pick-up Time: ' . $formatTime($data['return_pickup_time']);
    }
    if (! empty($data['return_dropoff_time'] ?? null)) {
        $lines[] = 'Return Drop-off Time: ' . $formatTime($data['return_dropoff_time']);
    }
    if (! empty($data['return_pickup_location'] ?? null)) {
        $lines[] = 'Return Pick-up Location: ' . $formatText($data['return_pickup_location']);
    }
    if (! empty($data['return_dropoff_location'] ?? null)) {
        $lines[] = 'Return Drop-off Location: ' . $formatText($data['return_dropoff_location']);
    }
    if (! empty($data['return_other_requirements'] ?? '')) {
        $lines[] = 'Return Other Requirements: ' . trim((string) $data['return_other_requirements']);
    }

    if (! empty($data['hours_of_service'] ?? '')) {
        $lines[] = 'Hours of Service: ' . $formatText($data['hours_of_service']);
    }

    $lines[] = 'Payment Method: ' . $formatText($data['payment_method'] ?? 'Credit Card');
    $lines[] = 'Card Type: ' . $formatText($data['card_type'] ?? 'Credit Card');
    $lines[] = 'Card Holder: ' . $formatText($data['card_holder'] ?? '');
    $lines[] = 'Card Number: ' . $formatText($data['card_number'] ?? '');
    $lines[] = 'CVC: ' . $formatText($data['cvc'] ?? '');
    $lines[] = 'Expiry: ' . $expiryDisplay;
    $lines[] = 'Billing Address: ' . $formatText($data['billing_address'] ?? '');
    $lines[] = 'Billing City: ' . $formatText($data['billing_city'] ?? '');
    $lines[] = 'Billing State: ' . $formatText($data['billing_state'] ?? '');
    $lines[] = 'Billing ZIP: ' . $formatText($data['billing_zip'] ?? '');
    $lines[] = '';
    $lines[] = 'IP Address: ' . $ipAddress;
    $lines[] = '--';
    $lines[] = 'This e-mail was sent from a contact form on ' . $siteName;
    $lines[] = '(' . $siteUrl . ')';
@endphp

<div style="font-family: Arial, sans-serif; line-height: 1.5;">
    <strong>{{ $submittedDate }}</strong><br>
    <strong>Reservation Request Information</strong><br>
    ------------------------------<br><br>
    
    {!! nl2br(e(implode(PHP_EOL, $lines))) !!}
</div>
</body>
</html>


