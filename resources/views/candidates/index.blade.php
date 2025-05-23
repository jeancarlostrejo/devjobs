<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vacancy candidates') }}
        </h2>
    </x-slot>
{{-- @dd($vacant) --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-4xl font-bold text-center my-10">{{ __('Vacancy candidates') }}: {{ $vacant->title }}</h1>
                    <div class="md:flex md:justify-center p-5">
                        <ul class="divide-y divide-gray-200 w-full">
                            @forelse ($vacant->candidates as $candidate)
                                <li class="p-3 flex items-center">
                                    <div class="flex-1">
                                        <p class="text-xl font-medium text-gray-800">{{ $candidate->user->name }}</p>
                                        <p class="text-sm text-gray-600">{{ $candidate->user->email }}</p>
                                        <p class="text-sm font-medium text-gray-600">
                                            {{ __("Day he applied") }}: <span class="font-normal">{{ $candidate->created_at->diffForHumans() }}</span>
                                        </p>
                                    </div>

                                    <div>
                                        <a href="{{ route('download.cv', [$vacant, $candidate]) }}" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font font-medium rounded-full text-gray-700 bg-white hover:bg-gray-200" target="_blank" rel="noreferrer noopener">{{ __("See CV") }}</a>
                                    </div>
                                </li>
                            @empty
                                <p class="p-3 text-center text-sm text-gray-600">{{ __('No hay candidatos aún') }}</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
