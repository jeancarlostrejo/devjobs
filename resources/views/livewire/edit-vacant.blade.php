<form class="md:w-1/2 space-y-4" wire:submit='updateVacant'>
    <div>
        <x-input-label for="title" :value="__('Title vacant')" />
        <x-text-input  id="title" class="block mt-1 w-full" type="text" wire:model="title" :value="old('title')" placeholder="{{ __('Title vacant') }}"/>
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="category" :value="__('Category')" />
            <select wire:model="category" id="category" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                <option value="">-- {{ __('Select') }} --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category') ? "selected" : "" }}>{{ $category->name }}</option>
                @endforeach
            </select>
        <x-input-error :messages="$errors->get('category')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="salary" :value="__('Monthly salary')" />
            <select wire:model="salary" id="salary" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                <option value="">-- {{ __('Select') }} --</option>
                @foreach ($salaries as $salary)
                    <option value="{{ $salary->id }}" {{ old('salary') ? "selected" : "" }}>{{ $salary->salary }}</option>
                @endforeach
            </select>
        <x-input-error :messages="$errors->get('salary')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="company" :value="__('Company')" />
        <x-text-input  id="company" class="block mt-1 w-full" type="text" wire:model="company" :value="old('company')" placeholder="{{ __('Company') }}: Netflix, Uber, Shopify, etc"/>
        <x-input-error :messages="$errors->get('company')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="last_day_apply" :value="__('Last day to apply')" />
        <x-text-input  id="last_day_apply" class="block mt-1 w-full" type="date" wire:model="last_day_apply" :value="old('last_day_apply')"/>
        <x-input-error :messages="$errors->get('last_day_apply')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="description" :value="__('Description of vacant')" />
        <textarea wire:model="description" placeholder="{{ __('Description general of vacant, experience...') }}" id="description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1 h-72"></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="image" :value="__('Vacant image')" />
        <x-text-input  id="image" class="block mt-1 w-full" type="file" wire:model="newImage" accept="image/*" />

        <div wire:loading class="my-4 italic" wire:target='newImage'>
            <p class="text-sm">{{ __("Loading preview image") }}...</p>
        </div>

        <div class="my-5 w-80">
            <x-input-label :value="__('Current image')" />
            <img src="{{ Storage::url($image) }}" alt="{{ __('Vacant image') . " ".  $title }}">
        </div>

        <div class="my-5 w-80">
            @if($newImage)
                <x-input-label :value="__('New image')" />
                <img src="{{ $newImage->temporaryUrl() }}" alt="{{ __('Vacant image') }}">
            @endif
        </div>

        <x-input-error :messages="$errors->get('newImage')" class="mt-2" />
    </div>
    <div class="flex gap-4">
        <x-primary-button wire:loading.attr='disabled'>{{ __('Save changes') }}</x-primary-button>
        <a href="{{ route('vacants.index') }}" class="bg-red-600 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase">{{ __('Cancel') }}</a>
    </div>
</form>