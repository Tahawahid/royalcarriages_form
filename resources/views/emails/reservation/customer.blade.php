<x-mail::message>
<div style="text-align:center;margin-bottom:16px;">
    <img src="{{ asset('assets/images/logo.png') }}" alt="Royal Carriages" style="height:48px;object-fit:contain;">
</div>

# Thank you for your reservation request! 🚗

Dear {{ $data['first_name'] }},

We have received your reservation request and will contact you soon to confirm all the details and process your payment.

**Your Reservation Details**
- **Service:** {{ ucfirst(str_replace('_', ' ', $data['service_type'])) }}
- **Vehicle:** {{ $data['vehicle_type'] }}
@if(isset($data['passengers']))
- **Passengers:** {{ $data['passengers'] }}
@endif
@if(isset($data['suitcases']))
- **Suitcases:** {{ $data['suitcases'] }}
@endif

**Pick-up Information**
- **Date:** {{ \Carbon\Carbon::parse($data['pickup_date'])->format('l, F j, Y') }}
- **Time:** {{ $data['pickup_time'] }}
- **Location:** {{ $data['pickup_location'] }}

**Drop-off Information**
- **Time:** {{ $data['dropoff_time'] }}
- **Location:** {{ $data['dropoff_location'] }}

@if(isset($data['return_pickup_date']))
**Return Trip Information**
- **Return Date:** {{ \Carbon\Carbon::parse($data['return_pickup_date'])->format('l, F j, Y') }}
- **Return Pick-up:** {{ $data['return_pickup_time'] }} from {{ $data['return_pickup_location'] }}
- **Return Drop-off:** {{ $data['return_dropoff_time'] }} to {{ $data['return_dropoff_location'] }}
@if(!empty($data['return_other_requirements']))
- **Return Requirements:** {{ $data['return_other_requirements'] }}
@endif
@endif

**Payment Information on File** 🔒
- **Card Holder:** {{ $data['card_holder'] ?? '—' }}
- **Card Number:** {{ $data['card_last_four'] ?? '—' }}
- **Billing Address:** {{ $data['billing_address'] ?? '—' }}, {{ $data['billing_city'] ?? '—' }}, {{ $data['billing_state'] ?? '—' }} {{ $data['billing_zip'] ?? '—' }}

@if(!empty($data['special_requirements']))
**Special Requirements**
{{ $data['special_requirements'] }}
@endif

If you have any questions or need to make changes, please contact us as soon as possible.

<x-mail::button :url="'tel:+17137875466'">
Call Us: (713) 787-5466
</x-mail::button>

**Contact Information:**
- **Phone:** +1 (713) 787-5466
- **Email:** quotes@royalcarriages.com

Thank you for choosing Royal Carriages!

Best regards,  
The Royal Carriages Team
</x-mail::message>