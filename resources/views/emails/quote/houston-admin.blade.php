<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Limo Service In Houston Quote Submission</title>
</head>
<body>
@php
    $formatDate    = static fn ($value) => $value ? date('m/d/Y', strtotime((string) $value)) : 'N/A';
    $formatTime    = static fn ($value) => $value ? date('g:i A', strtotime((string) $value)) : 'N/A';
    $formatText    = static fn ($value) => ($value = trim((string) ($value ?? ''))) !== '' ? $value : 'N/A';
    $formatService = static fn ($value) => $value ? ucwords(str_replace(['-', '_'], ' ', (string) $value)) : 'N/A';

    $siteName    = 'Limo Service In Houston';
    $siteUrl     = 'https://limoserviceinhouston.com/';
    $submittedAt = now()->format('m/d/Y g:i A');
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

    $lines[] = 'Submitted At: ' . $submittedAt;
    $lines[] = '';
    $lines[] = 'IP Address: ' . $ipAddress;
    $lines[] = '--';
    $lines[] = 'This e-mail was sent from a contact form on ' . $siteName;
    $lines[] = '(' . $siteUrl . ')';
@endphp

<div style="font-family: Arial, sans-serif; line-height: 1.5;">
    {!! nl2br(e(implode(\"\\n\", $lines))) !!}
</div>
</body>
</html>
