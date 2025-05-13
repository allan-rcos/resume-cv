@use('App\Rules\Phone')
<section>
    <x-profiles.card id="Details">
        @slot('title')
            {{ __('Update Your Details') }}
        @endslot
        <x-slot:description>
            {{ __('You can update your account details here. Some of this data will be used in your resumés.') }}
        </x-slot:description>
    </x-profiles.card>

    <form method="post" action="{{ route('details.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="update_details_career" :value="__('Career')"/>
            <x-text-input id="update_details_career" name="career" type="text"
                          :value="old('career', $details?->career)"
                          class="mt-1 block w-full"/>
            <x-input-error :messages="$errors->updateDetails->get('career')" class="mt-2"/>
        </div>

        <div>
            <x-input-label for="update_details_phone" :value="__('Phone')"/>
            <x-text-input id="update_details_phone" name="phone" type="tel" :pattern="Phone::PATTERN"
                          :value="old('phone', $details?->phone)"
                          class="mt-1 block w-full"/>
            <x-input-error :messages="$errors->updateDetails->get('phone')" class="mt-2"/>
        </div>

        <div>
            <x-input-label for="update_details_address" :value="__('Address')"/>
            <x-text-input id="update_details_address" name="address" type="text"
                          :value="old('address', $details?->address)" class="mt-1 block w-full"/>
            <x-input-error :messages="$errors->updateDetails->get('address')" class="mt-2"/>
        </div>

        <div>
            <x-input-label for="update_details_summary" :value="__('Summary')"/>
            <x-text-area id="update_details_summary" name="summary" class="mt-1 block w-full"
                         :value="old('summary', $details?->summary)"/>
            <x-input-error :messages="$errors->updateDetails->get('summary')" class="mt-2"/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'details-updated')
                <x-profiles.message>
                    {{ __('Saved.') }}
                </x-profiles.message>
            @endif
        </div>
    </form>
</section>
