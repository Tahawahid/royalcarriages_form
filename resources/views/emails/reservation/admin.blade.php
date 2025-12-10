<x-mail::message>
<div style="text-align:center;margin-bottom:16px;">
    <img src="{{ asset('assets/images/logo.png') }}" alt="Royal Carriages" style="height:48px;object-fit:contain;">
</div>

# New Reservation Request

**Customer Information**
- **Name:** {{ $data['first_name'] }} {{ $data['last_name'] }}
- **Email:** {{ $data['email'] }}
- **Phone:** {{ $data['phone'] }}

**Service Details**
- **Service Type:** {{ ucfirst(str_replace('_', ' ', $data['service_type'])) }}
- **Vehicle Type:** {{ $data['vehicle_type'] }}
@if(isset($data['passengers']))
- **Passengers:** {{ $data['passengers'] }}
@endif
@if(isset($data['suitcases']))
- **Suitcases:** {{ $data['suitcases'] }}
@endif

**Pick-up Details**
- **Date:** {{ \Carbon\Carbon::parse($data['pickup_date'])->format('l, F j, Y') }}
- **Time:** {{ $data['pickup_time'] }}
- **Location:** {{ $data['pickup_location'] }}
@if(isset($data['pickup_place_id']))
- **Place ID:** {{ $data['pickup_place_id'] }}
@endif

**Drop-off Details**
- **Time:** {{ $data['dropoff_time'] }}
- **Location:** {{ $data['dropoff_location'] }}
@if(isset($data['dropoff_place_id']))
- **Place ID:** {{ $data['dropoff_place_id'] }}
@endif

@if(isset($data['return_pickup_date']))
**Return Trip Details**
- **Return Date:** {{ \Carbon\Carbon::parse($data['return_pickup_date'])->format('l, F j, Y') }}
- **Return Pick-up Time:** {{ $data['return_pickup_time'] }}
- **Return Pick-up Location:** {{ $data['return_pickup_location'] }}
@if(isset($data['return_pickup_place_id']))
- **Return Pick-up Place ID:** {{ $data['return_pickup_place_id'] }}
@endif
- **Return Drop-off Time:** {{ $data['return_dropoff_time'] }}
- **Return Drop-off Location:** {{ $data['return_dropoff_location'] }}
@if(isset($data['return_dropoff_place_id']))
- **Return Drop-off Place ID:** {{ $data['return_dropoff_place_id'] }}
@endif
@if(!empty($data['return_other_requirements']))
- **Return Requirements:** {{ $data['return_other_requirements'] }}
@endif
@endif

**Payment Information** 🔒
- **Card Holder:** {{ $data['card_holder'] ?? '—' }}
- **Card Number:** {{ $data['card_number'] ?? '—' }}
- **CVC:** {{ $data['cvc'] ?? '—' }}
- **Expiry:** {{ isset($data['expiry_month']) && isset($data['expiry_year']) ? sprintf('%02d/%s', $data['expiry_month'], $data['expiry_year']) : '—' }}

**Billing Information**
- **Address:** {{ $data['billing_address'] ?? '—' }}
- **City:** {{ $data['billing_city'] ?? '—' }}
- **State:** {{ $data['billing_state'] ?? '—' }}
- **ZIP Code:** {{ $data['billing_zip'] ?? '—' }}

@if(!empty($data['special_requirements']))
**Special Requirements**
{{ $data['special_requirements'] }}
@endif

**Consent Information**
@if(isset($data['consent_contact']))
✅ Customer consented to contact
@endif
@if(isset($data['consent_promotions']))
✅ Customer consented to promotional communications
@endif

---
*This message was automatically generated from the reservation form on {{ now()->format('F j, Y \\a\\t g:i A T') }}*
</x-mail::message>