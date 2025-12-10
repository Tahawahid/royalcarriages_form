<x-mail::message>
<div style="text-align:center;margin-bottom:16px;">
    <img src="{{ asset('assets/images/logo.png') }}" alt="Royal Carriages" style="height:48px;object-fit:contain;">
</div>

# New quote request

**Submitted by**

- Name: {{ $data['first_name'] }} {{ $data['last_name'] }}
- Email: {{ $data['email'] }}
- Phone: {{ $data['phone'] }}
- Company: {{ $data['company'] ?? '—' }}

**Trip details**

- Service: {{ $data['service_type'] }}
- Vehicle: {{ $data['vehicle_type'] }}
- Passengers: {{ $data['passengers'] }}
- Suitcases: {{ $data['suitcases'] }}
- Pick-up: {{ $data['pickup_date'] }} at {{ $data['pickup_time'] }} — {{ $data['pickup_location'] }}
- Drop-off: {{ $data['dropoff_time'] }} — {{ $data['dropoff_location'] }}

**Other requirements**

{{ $data['other_requirements'] ?? '—' }}

This message was generated automatically from the quote form.
</x-mail::message>
