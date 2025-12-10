Date: {{ date('m/d/Y') }}<br>
Hourly Reservation Information:<br>
--------------------------<br>
<br>
<br>
Name: {{ $data['first_name'] }} {{ $data['last_name'] }}<br>
Email: {{ $data['email'] }}<br>
Phone: {{ $data['phone'] }}<br>
Pickup Date: {{ date('m/d/Y', strtotime($data['pickup_date'])) }}<br>
Pickup Time: {{ date('g:i A', strtotime($data['pickup_time'])) }}<br>
Drop-off Time: {{ date('g:i A', strtotime($data['dropoff_time'])) }}<br>
Pickup Address: {{ $data['pickup_location'] }}<br>
Drop-off Destination: {{ $data['dropoff_location'] }}<br>
Service Type: {{ $data['service_type'] }}<br>
Vehicle Type: {{ $data['vehicle_type'] }}<br>
Passengers: {{ $data['passengers'] ?? 'Not specified' }}<br>
@if(isset($data['suitcases']))
Suitcases: {{ $data['suitcases'] }}<br>
@endif
<br>
PAYMENT INFORMATION:<br>
Cardholder Name: {{ $data['card_holder'] }}<br>
Card Number: **** **** **** {{ substr($data['card_number'], -4) }}<br>
Billing Address: {{ $data['billing_address'] }}<br>
Billing City: {{ $data['billing_city'] }}<br>
Billing State: {{ $data['billing_state'] }}<br>
Billing ZIP: {{ $data['billing_zip'] }}<br>
<br>
Special Requirements:<br>
{{ $data['special_requirements'] ?? 'None' }}<br>
<br>
{{ request()->ip() }}<br>
--<br>
This e-mail was sent from a contact form on Royal Carriages (https://www.royalcarriages.com)