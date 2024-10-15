<div class="p-10">
    <div class="mb-5">
        <h2 class="font-bold text-3xl text-gray-800 my-3">{{ $vacant->title }}</h2>

       <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
           <p class="font-bold text-sm uppercase text-gray-800 my-3">{{ __('Company') }}: <span class="normal-case font-normal">{{ $vacant->company }}</span></p>

           <p class="font-bold text-sm uppercase text-gray-800 my-3">{{ __('Last day to apply') }}: <span class="normal-case font-normal">{{ $vacant->last_day_apply->format('d-m-Y') }}</span></p>

           <p class="font-bold text-sm uppercase text-gray-800 my-3">{{ __('Category') }}: <span class="normal-case font-normal">{{ $vacant->category->name }}</span></p>

           <p class="font-bold text-sm uppercase text-gray-800 my-3">{{ __('Monthly salary') }}: <span class="normal-case font-normal">{{ $vacant->salary->salary }}</span></p>
       </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
         <div class="md:col-span-2">
             <img src="{{ Storage::url($vacant->image) }}" alt="{{ __('Vacant image') . " ".  $vacant->title }}">
         </div>
         <div class="md:col-span-4 mt-5 md:mt-0">
             <h3 class="text-2xl font-bold mb-5">{{ __('Description of vacant') }}</h3>
             <p>{{ $vacant->description }}</p>
         </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>{{ __('Do you want to apply for this vacancy?') }} <a href="{{ route('register') }}" class="font-bold text-indigo-600">{{ __('Get an account and apply to this and other vacancies') }}</a></p>
        </div>
    @endguest

    @auth
        @cannot('create', App\Models\Vacant::Class)
            <livewire:apply-vacancy :$vacant/>
        @endcannot
    @endauth

</div>
