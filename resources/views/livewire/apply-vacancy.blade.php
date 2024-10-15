<div class="bg-gray-100 p-5 mt-10 flex flex-col overflow-x-hidden md:justify-center md:items-center">
    <h3 class="text-center text-2xl font-bold my-4">{{ __('Apply for this vacancy') }}</h3>

    @if (session()->has('message'))
        <div class="flex justify-between text-sm bg-green-300 px-4 py-3 my-2 rounded text-center mx-2 md:mx-0"
            role="alert">
            <span class="text-green-900 font-bold">{{ session('message') }}</span>
            <span class="inline" onclick="return this.parentNode.remove();">
                <svg class="fill-green-900 h-6 w-6" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>{{ __('Close') }}</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>

    @else
        <form wire:submit='apply' class="w-96 mt-5">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum vitae or resume (PDF)')" />
                <x-text-input id="cv" type="file" wire:model='cv' accept=".pdf" class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('cv')" class="mt-2" />
            </div>

            <x-primary-button wire:loading.attr='disabled' class="my-5">{{ __('Apply') }}</x-primary-button>
        </form>
    @endif
</div>
