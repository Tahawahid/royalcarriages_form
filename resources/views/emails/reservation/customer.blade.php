Dear {{ $data['first_name'] }} {{ $data['last_name'] }},

Thank you for your reservation with Royal Carriages!

We have confirmed your {{ $data['service_type'] }} reservation for {{ date('m/d/Y', strtotime($data['pickup_date'])) }} at {{ date('g:i A', strtotime($data['pickup_time'])) }}.

Your Reservation Details:
--------------------------
Pickup Date: {{ date('m/d/Y', strtotime($data['pickup_date'])) }}
Pickup Time: {{ date('g:i A', strtotime($data['pickup_time'])) }}
Pickup Location: {{ $data['pickup_location'] }}
Drop-off Location: {{ $data['dropoff_location'] }}
Vehicle: {{ $data['vehicle_type'] }}
Passengers: {{ $data['passengers'] ?? 'Not specified' }}
@if(isset($data['cardholder_name']))

Payment Information:
Cardholder: {{ $data['cardholder_name'] }}
Card: **** **** **** {{ substr($data['card_number'], -4) }}
@endif

Important Information:
- Please be ready 15 minutes before your scheduled pickup time
- Our chauffeur will contact you 30 minutes before arrival
- For any changes or cancellations, please call us at least 24 hours in advance

If you have any questions, please contact us:
Phone: (713) 787-5466
Email: info@royalcarriages.com

Thank you for choosing Royal Carriages!

Best regards,
Royal Carriages Team
--
This e-mail was sent from Royal Carriages (https://www.royalcarriages.com)