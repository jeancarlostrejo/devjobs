<div>
    <livewire:filter-vacancies/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class=" px-5 md:px-0 font-extrabold text-4xl text-gray-800 mb-12">{{ __("Our available vacancies!") }}</h3>

            <div class="bg-white shadow-sm rounded-lg p-6 divide-y-2 divide-gray-200">
                @forelse ($vacancies as $vacant)
                <div class="md:flex gap-3 md:justify-between md:items-center py-5">
                    <div class="md:flex-1">
                        <a href="{{ route('vacants.show', $vacant) }}" class="text-3xl font-extrabold text-gray-600">{{ $vacant->title }}</a>
                        <p class="text-base text-gray-600 mb-1">{{ $vacant->company }}</p>
                        <p class="text-xs font-bold text-gray-600 mb-1">{{ $vacant->category->name }}</p>
                        <p class="text-base text-gray-600 mb-1">{{ $vacant->salary->salary }}</p>
                        <p class="font-bold text-xs text-gray-600">{{ __("Last day to apply") }}: 
                            <span class="font-normal">{{ $vacant->last_day_apply->format('d-m-Y') }}
                            </span>
                        </p>
                    </div>

                    <div class="mt-5 md:mt-0">
                        <a href="{{ route('vacants.show', $vacant) }}" class="bg-indigo-500 p-3 text-sm uppercase font-bold text-white rounded-lg hover:bg-indigo-600 block text-center">{{ __("See vacancy") }}</a>
                    </div>
                </div>
                    
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">{{ __("There are no vacancies yet") }}</p>
                @endforelse
            </div>
            <div class="mt-10 mx-4 md:mx-0 md:mt-4">
                {{ $vacancies->links(data: ["scrollTo" => false]) }}
            </div>
        </div>
    </div>
</div>
