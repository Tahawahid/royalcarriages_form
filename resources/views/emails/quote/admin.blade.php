<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Best Limousines Quote Submission</title>
</head>
<body>
@php
    $formatDate    = static fn ($value) => $value ? date('m/d/Y', strtotime((string) $value)) : 'N/A';
    $formatTime    = static fn ($value) => $value ? date('g:i A', strtotime((string) $value)) : 'N/A';
    $formatText    = static fn ($value) => ($value = trim((string) ($value ?? ''))) !== '' ? $value : 'N/A';
    $formatService = static fn ($value) => $value ? ucwords(str_replace(['-', '_'], ' ', (string) $value)) : 'N/A';

    $siteName    = 'Best Limousines';
    $siteUrl     = 'https://bestlimousines.com/';
    $submittedDate = now()->format('F j, Y');
    $ipAddress   = request()->ip();

    $lines = [
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

    if (! empty($data['other_requirements'] ?? '')) {
        $lines[] = 'Other Requirements: ' . trim((string) $data['other_requirements']);
    }

    $lines[] = '';
    $lines[] = 'IP Address: ' . $ipAddress;
    $lines[] = '--';
    $lines[] = 'This e-mail was sent from a contact form on ' . $siteName;
    $lines[] = '(' . $siteUrl . ')';
@endphp

<div style="font-family: Arial, sans-serif; line-height: 1.5;">
    <strong>{{ $submittedDate }}</strong><br>
    <strong>Quote Request Information</strong><br>
    ------------------------------<br><br>
    
    {!! nl2br(e(implode(PHP_EOL, $lines))) !!}
</div>
</body>
</html>

