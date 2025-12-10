Dear {{ $data['first_name'] }} {{ $data['last_name'] }},<br>
<br>
Thank you for your reservation with Royal Carriages!<br>
<br>
We have confirmed your {{ $data['service_type'] }} reservation for {{ date('m/d/Y', strtotime($data['pickup_date'])) }} at {{ date('g:i A', strtotime($data['pickup_time'])) }}.<br>
<br>
Your Reservation Details:<br>
--------------------------<br>
Pickup Date: {{ date('m/d/Y', strtotime($data['pickup_date'])) }}<br>
Pickup Time: {{ date('g:i A', strtotime($data['pickup_time'])) }}<br>
Pickup Location: {{ $data['pickup_location'] }}<br>
Drop-off Location: {{ $data['dropoff_location'] }}<br>
Vehicle: {{ $data['vehicle_type'] }}<br>
Passengers: {{ $data['passengers'] ?? 'Not specified' }}<br>
@if(isset($data['cardholder_name']))
<br>
Payment Information:<br>
Cardholder: {{ $data['cardholder_name'] }}<br>
Card: **** **** **** {{ substr($data['card_number'], -4) }}<br>
@endif
<br>
Important Information:<br>
- Please be ready 15 minutes before your scheduled pickup time<br>
- Our chauffeur will contact you 30 minutes before arrival<br>
- For any changes or cancellations, please call us at least 24 hours in advance<br>
<br>
If you have any questions, please contact us:<br>
Phone: (713) 787-5466<br>
Email: info@royalcarriages.com<br>
<br>
Thank you for choosing Royal Carriages!<br>
<br>
Best regards,<br>
Royal Carriages Team<br>
--<br>
This e-mail was sent from Royal Carriages (https://www.royalcarriages.com)