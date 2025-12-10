Dear {{ $data['first_name'] }} {{ $data['last_name'] }},

Thank you for your quote request with Royal Carriages!

We have received your request for {{ $data['service_type'] }} service on {{ date('m/d/Y', strtotime($data['pickup_date'])) }} at {{ date('g:i A', strtotime($data['pickup_time'])) }}.

Our team will review your request and contact you within 24 hours with a detailed quote.

Your Request Details:
--------------------------
Pickup Date: {{ date('m/d/Y', strtotime($data['pickup_date'])) }}
Pickup Time: {{ date('g:i A', strtotime($data['pickup_time'])) }}
Pickup Location: {{ $data['pickup_location'] }}
Drop-off Location: {{ $data['dropoff_location'] }}
Vehicle: {{ $data['vehicle_type'] }}
Passengers: {{ $data['passengers'] ?? 'Not specified' }}

If you have any questions or need to make changes, please contact us:
Phone: (713) 787-5466
Email: info@royalcarriages.com

Thank you for choosing Royal Carriages!

Best regards,
Royal Carriages Team
--
This e-mail was sent from Royal Carriages (https://www.royalcarriages.com)
