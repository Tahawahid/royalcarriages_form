<x-mail::message>
<div style="text-align:center;margin-bottom:16px;">
    <img src="{{ asset('assets/images/logo.png') }}" alt="Royal Carriages" style="height:48px;object-fit:contain;">
</div>

# New reservation request

**Customer information**

- Name: {{ $data['first_name'] }} {{ $data['last_name'] }}
- Email: {{ $data['email'] }}
- Phone: {{ $data['phone'] }}

**Reservation details**

- Service: {{ $data['service_type'] }}
- Vehicle: {{ $data['vehicle_type'] }}
@if(isset($data['passengers']))
- Passengers: {{ $data['passengers'] }}
@endif
@if(isset($data['suitcases']))
- Suitcases: {{ $data['suitcases'] }}
@endif
- Pick-up: {{ $data['pickup_date'] }} at {{ $data['pickup_time'] }} — {{ $data['pickup_location'] }}
- Drop-off: {{ $data['dropoff_time'] }} — {{ $data['dropoff_location'] }}

@if(isset($data['return_pickup_date']))
**Return trip details**

- Return Pick-up: {{ $data['return_pickup_date'] }} at {{ $data['return_pickup_time'] }} — {{ $data['return_pickup_location'] }}
- Return Drop-off: {{ $data['return_dropoff_time'] }} — {{ $data['return_dropoff_location'] }}
@if(!empty($data['return_other_requirements']))
- Return Requirements: {{ $data['return_other_requirements'] }}
@endif
@endif

**Payment information**

- Card Holder: {{ $data['card_holder'] ?? '—' }}
- Card Number: {{ $data['card_number'] ?? '—' }}
- CVC: {{ $data['cvc'] ?? '—' }}
- Expiry: {{ isset($data['expiry_month']) && isset($data['expiry_year']) ? $data['expiry_month'] . '/' . $data['expiry_year'] : '—' }}
- Billing Address: {{ $data['billing_address'] ?? '—' }}
- Billing City: {{ $data['billing_city'] ?? '—' }}, {{ $data['billing_state'] ?? '—' }} {{ $data['billing_zip'] ?? '—' }}

@if(!empty($data['special_requirements']))
**Special requirements**

{{ $data['special_requirements'] }}
@endif

This message was generated automatically from the reservation form.
</x-mail::message>