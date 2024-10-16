<x-app-layout>
    <div class="py-16 bg-gray-50 lg:py-24">
        <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
            <div class="">
                <h2 class="text-center text-4xl leading-8 font-bold tracking-tight text-indigo-600 sm:text-6xl">{{ __("Find a job in Tech remotely!") }}</h2>
                <p class="mt-4 max-w-3xl mx-auto text-center text-xl text-gray-500">{{ __("Find your dream job in an international company; We have vacancies for frontend, backend, devops developers and much more!") }}</p>
            </div>
        </div>
    </div>

    <livewire:home-vacancies />
</x-app-layout>