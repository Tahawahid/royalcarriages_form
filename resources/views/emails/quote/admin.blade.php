Date: {{ date('m/d/Y') }}
Quote Request Information:
--------------------------


Name: {{ $data['first_name'] }} {{ $data['last_name'] }}
Email: {{ $data['email'] }}
Phone: {{ $data['phone'] }}
@if(isset($data['company']))
Company: {{ $data['company'] }}
@endif
Pickup Date: {{ date('m/d/Y', strtotime($data['pickup_date'])) }}
Pickup Time: {{ date('g:i A', strtotime($data['pickup_time'])) }}
Drop-off Time: {{ date('g:i A', strtotime($data['dropoff_time'])) }}
Pickup Address: {{ $data['pickup_location'] }}
Drop-off Destination: {{ $data['dropoff_location'] }}
Service Type: {{ $data['service_type'] }}
Vehicle Type: {{ $data['vehicle_type'] }}
Passengers: {{ $data['passengers'] ?? 'Not specified' }}
@if(isset($data['suitcases']))
Suitcases: {{ $data['suitcases'] }}
@endif
Special Requests:
{{ $data['special_requirements'] ?? 'None' }}

{{ request()->ip() }}
--
This e-mail was sent from a contact form on Royal Carriages (https://www.royalcarriages.com)