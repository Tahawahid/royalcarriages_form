Dear {{ $data['first_name'] }} {{ $data['last_name'] }},<br>
<br>
Thank you for your quote request with Royal Carriages!<br>
<br>
We have received your request for {{ $data['service_type'] }} service on {{ date('m/d/Y', strtotime($data['pickup_date'])) }} at {{ date('g:i A', strtotime($data['pickup_time'])) }}.<br>
<br>
Our team will review your request and contact you within 24 hours with a detailed quote.<br>
<br>
Your Request Details:<br>
--------------------------<br>
Pickup Date: {{ date('m/d/Y', strtotime($data['pickup_date'])) }}<br>
Pickup Time: {{ date('g:i A', strtotime($data['pickup_time'])) }}<br>
Pickup Location: {{ $data['pickup_location'] }}<br>
Drop-off Location: {{ $data['dropoff_location'] }}<br>
Vehicle: {{ $data['vehicle_type'] }}<br>
Passengers: {{ $data['passengers'] ?? 'Not specified' }}<br>
<br>
If you have any questions or need to make changes, please contact us:<br>
Phone: (713) 787-5466<br>
Email: info@royalcarriages.com<br>
<br>
Thank you for choosing Royal Carriages!<br>
<br>
Best regards,<br>
Royal Carriages Team<br>
--<br>
This e-mail was sent from Royal Carriages (https://www.royalcarriages.com)
