<form class="md:w-1/2 space-y-4">
    <div>
        <x-input-label for="title" :value="__('Title vacant')" />
        <x-text-input  id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" placeholder="{{ __('Title vacant') }}"/>
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="salary" :value="__('Monthly salary')" />
            <select name="salary" id="salary" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
            </select>
        <x-input-error :messages="$errors->get('salary')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="category" :value="__('Category')" />
            <select name="category" id="category" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
            </select>
        <x-input-error :messages="$errors->get('category')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="company" :value="__('Company')" />
        <x-text-input  id="company" class="block mt-1 w-full" type="text" name="company" :value="old('company')" placeholder="{{ __('Company') }}: Netflix, Uber, Shopify, etc"/>
        <x-input-error :messages="$errors->get('company')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="last_day" :value="__('Last day to postule')" />
        <x-text-input  id="last_day" class="block mt-1 w-full" type="date" name="last_day" :value="old('last_day')"/>
        <x-input-error :messages="$errors->get('last_day')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="description" :value="__('Description of vacant')" />
        <textarea name="description" placeholder="{{ __('Description general of vacant, experience...') }}" id="description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1 h-72"></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="image" :value="__('Image vacant')" />
        <x-text-input  id="image" class="block mt-1 w-full" type="file" name="image"/>
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>
    <x-primary-button>{{ __('Create vacant') }}</x-primary-button>
</form>