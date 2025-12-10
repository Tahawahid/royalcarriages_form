@extends('layouts.app')

@php
    $timeOptions = [];

    for ($hour = 0; $hour < 24; $hour++) {
        foreach ([0, 30] as $minute) {
            $timeOptions[] = sprintf('%02d:%02d', $hour, $minute);
        }
    }
@endphp

@section('content')
    <section class="mx-auto max-w-5xl px-6 py-12 md:py-16">
        <div class="space-y-8">
            <div class="space-y-4">
                <p class="text-sm font-semibold uppercase tracking-[0.08em] text-amber-600">Royal Carriages</p>
                <h1 class="text-4xl font-semibold leading-tight text-slate-900 md:text-5xl">
                    Get a tailored quote for your next ride
                </h1>
                <p class="max-w-3xl text-base text-slate-600">
                    Share your trip details and preferences, and our team will craft a precise quote for premium, on-time
                    transportation anywhere in the United States.
                </p>
            </div>

            <div id="quote" class="rounded-2xl bg-white/95 p-6 shadow-lg shadow-amber-100 ring-1 ring-slate-100">
                <div class="mb-4 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-amber-600">Quote Form</p>
                        <p class="text-lg font-semibold text-slate-900">Tell us about your journey</p>
                    </div>
                    <span class="rounded-full bg-slate-900 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-white">
                        Light Mode
                    </span>
                </div>

                <form id="quote-form" class="space-y-6" action="#" method="POST">
                    @csrf

                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <label for="first_name" class="text-sm font-medium text-slate-700">First Name</label>
                            <input id="first_name" name="first_name" type="text" required autocomplete="given-name"
                                   class="mt-1 w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200" />
                        </div>
                        <div>
                            <label for="last_name" class="text-sm font-medium text-slate-700">Last Name</label>
                            <input id="last_name" name="last_name" type="text" required autocomplete="family-name"
                                   class="mt-1 w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200" />
                        </div>
                    </div>

                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <label for="email" class="text-sm font-medium text-slate-700">Email</label>
                            <input id="email" name="email" type="email" required autocomplete="email"
                                   class="mt-1 w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200" />
                        </div>
                        <div>
                            <label for="phone" class="text-sm font-medium text-slate-700">Phone Number (US)</label>
                            <input id="phone" name="phone" type="tel" required inputmode="tel" pattern="^[0-9]{3}-[0-9]{3}-[0-9]{4}$"
                                   placeholder="555-123-4567"
                                   class="mt-1 w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200" />
                            <p class="mt-1 text-xs text-slate-500">Format: 555-123-4567</p>
                        </div>
                    </div>

                    <div>
                        <label for="company" class="text-sm font-medium text-slate-700">Company</label>
                        <input id="company" name="company" type="text" autocomplete="organization"
                               class="mt-1 w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200" />
                    </div>

                    <div class="grid gap-4 md:grid-cols-3">
                        <div>
                            <label for="pickup_date" class="text-sm font-medium text-slate-700">Pick-up Date</label>
                            <input id="pickup_date" name="pickup_date" type="date" required
                                   class="mt-1 w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-slate-900 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200" />
                        </div>
                        <div>
                            <label for="pickup_time" class="text-sm font-medium text-slate-700">Pick-up Time</label>
                            <select id="pickup_time" name="pickup_time" required
                                    class="mt-1 w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-slate-900 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200">
                                <option value="" disabled selected>Select time</option>
                                @foreach ($timeOptions as $time)
                                    <option value="{{ $time }}">{{ date('g:i A', strtotime($time)) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="dropoff_time" class="text-sm font-medium text-slate-700">Drop-off Time</label>
                            <select id="dropoff_time" name="dropoff_time" required
                                    class="mt-1 w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-slate-900 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200">
                                <option value="" disabled selected>Select time</option>
                                @foreach ($timeOptions as $time)
                                    <option value="{{ $time }}">{{ date('g:i A', strtotime($time)) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid gap-4 md:grid-cols-2">
                        <div class="space-y-1.5">
                            <div class="flex items-center justify-between">
                                <label for="pickup_location" class="text-sm font-medium text-slate-700">Pick-up Location</label>
                                <span class="text-xs font-medium text-amber-700">Google verified only</span>
                            </div>
                            <input id="pickup_location" name="pickup_location" type="text" required autocomplete="off"
                                   placeholder="Start typing an address"
                                   class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200" />
                            <p id="pickup_error" class="hidden text-sm text-red-600"></p>
                            <input id="pickup_place_id" name="pickup_place_id" type="hidden" />
                            <input id="pickup_street" name="pickup_street" type="hidden" />
                            <input id="pickup_city" name="pickup_city" type="hidden" />
                            <input id="pickup_state" name="pickup_state" type="hidden" />
                            <input id="pickup_postal_code" name="pickup_postal_code" type="hidden" />
                        </div>

                        <div class="space-y-1.5">
                            <label for="dropoff_location" class="text-sm font-medium text-slate-700">Drop-off Location</label>
                            <input id="dropoff_location" name="dropoff_location" type="text" required autocomplete="off"
                                   placeholder="Start typing an address"
                                   class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200" />
                            <p id="dropoff_error" class="hidden text-sm text-red-600"></p>
                            <input id="dropoff_place_id" name="dropoff_place_id" type="hidden" />
                            <input id="dropoff_street" name="dropoff_street" type="hidden" />
                            <input id="dropoff_city" name="dropoff_city" type="hidden" />
                            <input id="dropoff_state" name="dropoff_state" type="hidden" />
                            <input id="dropoff_postal_code" name="dropoff_postal_code" type="hidden" />
                        </div>
                    </div>

                    @if (! config('services.google_places.key'))
                        <p class="rounded-lg bg-amber-50 px-3 py-2 text-sm text-amber-700">
                            Add your Google Places API key to enable address autocomplete and validation
                            (<code>GOOGLE_PLACES_API_KEY</code> in your environment).
                        </p>
                    @endif

                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <label for="service_type" class="text-sm font-medium text-slate-700">Type of Service</label>
                            <select id="service_type" name="service_type" required
                                    class="mt-1 w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-slate-900 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200">
                                <option value="" disabled selected>Choose service</option>
                                <option value="airport-transfer">Airport Transfer</option>
                                <option value="point-to-point">Point to Point</option>
                                <option value="hourly-charter">Hourly Charter</option>
                                <option value="event-transport">Events &amp; Groups</option>
                                <option value="tbd">To be provided</option>
                            </select>
                        </div>
                        <div>
                            <label for="vehicle_type" class="text-sm font-medium text-slate-700">Type of Vehicle</label>
                            <select id="vehicle_type" name="vehicle_type" required
                                    class="mt-1 w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-slate-900 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200">
                                <option value="" disabled selected>Choose vehicle</option>
                                <option value="sedan">Luxury Sedan</option>
                                <option value="suv">SUV</option>
                                <option value="van">Van / Sprinter</option>
                                <option value="limo">Stretch Limo</option>
                                <option value="bus">Mini Coach</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <label for="passengers" class="text-sm font-medium text-slate-700">Number of Passengers</label>
                            <input id="passengers" name="passengers" type="number" inputmode="numeric" min="1" max="99" required
                                   class="mt-1 w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-slate-900 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200" />
                        </div>
                        <div>
                            <label for="suitcases" class="text-sm font-medium text-slate-700">Number of Suitcases</label>
                            <input id="suitcases" name="suitcases" type="number" inputmode="numeric" min="0" max="99"
                                   class="mt-1 w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-slate-900 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200" />
                        </div>
                    </div>

                    <div>
                        <label for="other_requirements" class="text-sm font-medium text-slate-700">Other Requirements</label>
                        <textarea id="other_requirements" name="other_requirements" rows="3"
                                  class="mt-1 w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-slate-900 placeholder:text-slate-400 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200"
                                  placeholder="Share flight numbers, mobility needs, or special requests"></textarea>
                    </div>

                    <div class="flex flex-col gap-3 rounded-xl bg-slate-50 px-4 py-3 md:flex-row md:items-center md:justify-between">
                        <div>
                            <p class="text-sm font-semibold text-slate-900">We respond fast</p>
                            <p class="text-sm text-slate-600">Expect a tailored quote in minutes during business hours.</p>
                        </div>
                        <button type="submit"
                                class="inline-flex items-center justify-center rounded-xl bg-amber-600 px-4 py-3 text-sm font-semibold text-white shadow-md transition hover:bg-amber-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-500">
                            Request Quote
                        </button>
                    </div>
                </form>
            </div>
            <div class="flex flex-wrap gap-3">
                <div class="flex items-center gap-2 rounded-xl bg-white px-3 py-2 shadow-sm ring-1 ring-slate-100">
                    <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                    <span class="text-sm font-medium text-slate-700">Licensed chauffeurs</span>
                </div>
                <div class="flex items-center gap-2 rounded-xl bg-white px-3 py-2 shadow-sm ring-1 ring-slate-100">
                    <span class="h-2 w-2 rounded-full bg-amber-500"></span>
                    <span class="text-sm font-medium text-slate-700">Quick responses</span>
                </div>
                <div class="flex items-center gap-2 rounded-xl bg-white px-3 py-2 shadow-sm ring-1 ring-slate-100">
                    <span class="h-2 w-2 rounded-full bg-slate-700"></span>
                    <span class="text-sm font-medium text-slate-700">Nationwide coverage</span>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        const requiredComponents = ['street_number', 'route', 'locality', 'administrative_area_level_1', 'postal_code'];

        function mapAddressComponents(components) {
            return (components || []).reduce((acc, component) => {
                component.types.forEach((type) => {
                    acc[type] = component.long_name;
                });

                return acc;
            }, {});
        }

        function clearAddressError(prefix) {
            const errorElement = document.getElementById(`${prefix}_error`);

            errorElement.textContent = '';
            errorElement.classList.add('hidden');
        }

        function setAddress(prefix, place) {
            const input = document.getElementById(`${prefix}_location`);
            const placeIdField = document.getElementById(`${prefix}_place_id`);
            const streetField = document.getElementById(`${prefix}_street`);
            const cityField = document.getElementById(`${prefix}_city`);
            const stateField = document.getElementById(`${prefix}_state`);
            const postalField = document.getElementById(`${prefix}_postal_code`);
            const errorElement = document.getElementById(`${prefix}_error`);

            const components = mapAddressComponents(place.address_components);
            const hasRequiredParts = requiredComponents.every((item) => components[item]);

            if (!place.place_id || !hasRequiredParts) {
                placeIdField.value = '';
                input.value = '';
                streetField.value = '';
                cityField.value = '';
                stateField.value = '';
                postalField.value = '';
                errorElement.textContent = 'Select a complete U.S. street address from the list.';
                errorElement.classList.remove('hidden');

                return;
            }

            input.value = place.formatted_address;
            placeIdField.value = place.place_id;
            streetField.value = `${components.street_number || ''} ${components.route || ''}`.trim();
            cityField.value = components.locality || '';
            stateField.value = components.administrative_area_level_1 || '';
            postalField.value = components.postal_code || '';
            clearAddressError(prefix);
        }

        function initQuotePlaceAutocomplete() {
            if (!(window.google && window.google.maps && window.google.maps.places)) {
                return;
            }

            ['pickup', 'dropoff'].forEach((prefix) => {
                const input = document.getElementById(`${prefix}_location`);
                const placeIdField = document.getElementById(`${prefix}_place_id`);

                input.setAttribute('autocomplete', 'off');

                const autocomplete = new google.maps.places.Autocomplete(input, {
                    types: ['address'],
                    componentRestrictions: { country: 'us' },
                    fields: ['address_components', 'formatted_address', 'place_id'],
                });

                autocomplete.addListener('place_changed', () => {
                    const place = autocomplete.getPlace();
                    setAddress(prefix, place);
                });

                input.addEventListener('input', () => {
                    placeIdField.value = '';
                    clearAddressError(prefix);
                });
            });

            const form = document.getElementById('quote-form');

            form.addEventListener('submit', (event) => {
                const invalidPrefixes = ['pickup', 'dropoff'].filter(
                    (prefix) => !document.getElementById(`${prefix}_place_id`).value,
                );

                if (invalidPrefixes.length) {
                    event.preventDefault();

                    invalidPrefixes.forEach((prefix) => {
                        const errorElement = document.getElementById(`${prefix}_error`);

                        errorElement.textContent = 'Please choose an address suggestion to continue.';
                        errorElement.classList.remove('hidden');
                    });
                }
            });
        }

        window.initQuotePlaceAutocomplete = initQuotePlaceAutocomplete;
    </script>

    @if (config('services.google_places.key'))
        <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_places.key') }}&libraries=places&callback=initQuotePlaceAutocomplete" async defer></script>
    @endif
@endpush
