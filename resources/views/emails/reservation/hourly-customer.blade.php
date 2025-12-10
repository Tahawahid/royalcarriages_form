Dear {{ $data['first_name'] }} {{ $data['last_name'] }},<br>
<br>
Thank you for your hourly reservation with Royal Carriages!<br>
<br>
We have confirmed your hourly service for {{ date('m/d/Y', strtotime($data['pickup_date'])) }} at {{ date('g:i A', strtotime($data['pickup_time'])) }}.<br>
<br>
Your Reservation Details:<br>
--------------------------<br>
Pickup Date: {{ date('m/d/Y', strtotime($data['pickup_date'])) }}<br>
Pickup Time: {{ date('g:i A', strtotime($data['pickup_time'])) }}<br>
Pickup Location: {{ $data['pickup_location'] }}<br>
Drop-off Location: {{ $data['dropoff_location'] }}<br>
Service End Time: {{ date('g:i A', strtotime($data['dropoff_time'])) }}<br>
Vehicle: {{ $data['vehicle_type'] }}<br>
Passengers: {{ $data['passengers'] ?? 'Not specified' }}<br>
<br>
Payment Information:<br>
Cardholder: {{ $data['card_holder'] }}<br>
Card: **** **** **** {{ substr($data['card_number'], -4) }}<br>
<br>
Important Information:<br>
- Please be ready 15 minutes before your scheduled pickup time<br>
- Our chauffeur will contact you 30 minutes before arrival<br>
- This is an hourly service - the vehicle will remain available during your booking period<br>
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