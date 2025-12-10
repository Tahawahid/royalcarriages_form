<x-mail::message>
<div style="text-align:center;margin-bottom:16px;">
    <img src="{{ asset('assets/images/logo.png') }}" alt="Royal Carriages" style="height:48px;object-fit:contain;">
</div>

# Thank you for your reservation request!

Dear {{ $data['first_name'] }},

We have received your reservation request and will contact you soon to confirm all the details and process your payment.

**Your reservation details**

- Service: {{ $data['service_type'] }}
- Vehicle: {{ $data['vehicle_type'] }}
@if(isset($data['passengers']))
- Passengers: {{ $data['passengers'] }}
@endif
@if(isset($data['suitcases']))
- Suitcases: {{ $data['suitcases'] }}
@endif
- Pick-up: {{ $data['pickup_date'] }} at {{ $data['pickup_time'] }}
- Pick-up location: {{ $data['pickup_location'] }}
- Drop-off: {{ $data['dropoff_time'] }}
- Drop-off location: {{ $data['dropoff_location'] }}

@if(isset($data['return_pickup_date']))
**Return trip details**

- Return Pick-up: {{ $data['return_pickup_date'] }} at {{ $data['return_pickup_time'] }}
- Return Pick-up location: {{ $data['return_pickup_location'] }}
- Return Drop-off: {{ $data['return_dropoff_time'] }}
- Return Drop-off location: {{ $data['return_dropoff_location'] }}
@if(!empty($data['return_other_requirements']))
- Return Requirements: {{ $data['return_other_requirements'] }}
@endif
@endif

**Payment information on file**

- Card Holder: {{ $data['card_holder'] ?? '—' }}
- Card Number: {{ $data['card_last_four'] ?? '—' }}
- Billing Address: {{ $data['billing_address'] ?? '—' }}, {{ $data['billing_city'] ?? '—' }}, {{ $data['billing_state'] ?? '—' }} {{ $data['billing_zip'] ?? '—' }}

@if(!empty($data['special_requirements']))
**Special requirements**

{{ $data['special_requirements'] }}
@endif

If you have any questions or need to make changes, please contact us as soon as possible.

<x-mail::button :url="'tel:+1-555-123-4567'">
Call Us Now
</x-mail::button>

Thank you for choosing Royal Carriages!

Best regards,  
The Royal Carriages Team
</x-mail::message>