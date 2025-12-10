<x-mail::message>
<div style="text-align:center;margin-bottom:16px;">
    <img src="{{ asset('assets/images/logo.png') }}" alt="Royal Carriages" style="height:48px;object-fit:contain;">
</div>

# Thank you for your quote request

Hi {{ $data['first_name'] }},

We received your request and will contact you shortly.

**Trip details**

- Service: {{ $data['service_type'] }}
- Vehicle: {{ $data['vehicle_type'] }}
- Passengers: {{ $data['passengers'] }}
- Suitcases: {{ $data['suitcases'] }}
- Pick-up: {{ $data['pickup_date'] }} at {{ $data['pickup_time'] }} — {{ $data['pickup_location'] }}
- Drop-off: {{ $data['dropoff_time'] }} — {{ $data['dropoff_location'] }}

**Other notes**

{{ $data['other_requirements'] ?? '—' }}

If you need immediate assistance, call us at +1 (713) 787-5466 or email {{ config('mail.from.address', 'info@royalcarriages.com') }}.

Thanks,<br>
Royal Carriages
</x-mail::message>
