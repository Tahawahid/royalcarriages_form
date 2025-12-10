Dear {{ $data['first_name'] }} {{ $data['last_name'] }},<br>
<br>
Thank you for your round trip reservation with Royal Carriages!<br>
<br>
We have confirmed your round trip reservation starting {{ date('m/d/Y', strtotime($data['pickup_date'])) }} at {{ date('g:i A', strtotime($data['pickup_time'])) }}.<br>
<br>
Your Reservation Details:<br>
--------------------------<br>
<br>
OUTBOUND TRIP:<br>
Pickup Date: {{ date('m/d/Y', strtotime($data['pickup_date'])) }}<br>
Pickup Time: {{ date('g:i A', strtotime($data['pickup_time'])) }}<br>
Pickup Location: {{ $data['pickup_location'] }}<br>
Drop-off Location: {{ $data['dropoff_location'] }}<br>
Drop-off Time: {{ date('g:i A', strtotime($data['dropoff_time'])) }}<br>
<br>
RETURN TRIP:<br>
Return Pickup Date: {{ date('m/d/Y', strtotime($data['return_pickup_date'])) }}<br>
Return Pickup Time: {{ date('g:i A', strtotime($data['return_pickup_time'])) }}<br>
Return Pickup Location: {{ $data['return_pickup_location'] }}<br>
Return Drop-off Location: {{ $data['return_dropoff_location'] }}<br>
Return Drop-off Time: {{ date('g:i A', strtotime($data['return_dropoff_time'])) }}<br>
<br>
Vehicle: {{ $data['vehicle_type'] }}<br>
Passengers: {{ $data['passengers'] ?? 'Not specified' }}<br>
<br>
Payment Information:<br>
Cardholder: {{ $data['card_holder'] }}<br>
Card: **** **** **** {{ substr($data['card_number'], -4) }}<br>
<br>
Important Information:<br>
- Please be ready 15 minutes before your scheduled pickup times<br>
- Our chauffeur will contact you 30 minutes before each pickup<br>
- For any changes or cancellations, please call us at least 24 hours in advance<br>
- This is a round trip service - please be ready for both pickup times<br>
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