<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    @forelse ($vacants as $vacant)
        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
            <div class="space-y-3">
                <a href="{{ route('vacants.show', $vacant) }}" class="text-xl font-bold">{{ $vacant->title }}</a>
                <p class="text-sm text-gray-600 font-bold">{{ $vacant->company }}</p>
                <p class="text-sm text-gray-500">{{ __('Last day to apply') }}: {{ $vacant->last_day_apply->format('d-m-Y') }}</p>
            </div>

            <div class="flex flex-col items-stretch gap-3 mt-5 md:mt-0 text-center md:flex-row">
                <a href="#" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase">{{ __('Candidates') }}</a>

                <a href="{{ route('vacants.edit', $vacant) }}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase">{{ __('Edit') }}</a>

                <button wire:click="$dispatch('show-alert', {vacantId: {{ $vacant->id }}})" class="bg-red-600 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase">{{ __('Delete') }}</button>
                
            </div>
        </div>

        <div class="mt-10 mx-2">
            {{ $vacants->links(data: ['scrollTo' => false]) }}
        </div>
    @empty
        <div class="p-3 text-center text-sm text-gray-600">
            <p class="">{{ __("No vacancies") }}</p>
        </div>
    @endforelse
</div>

@push('scripts')
    <script src="{{ asset('js/sweetAlert.js') }}"></script>
    @script
        <script>
            $wire.on('show-alert', vacantId => {
                Swal.fire({
                    title: "{{ __('Delete Vacancy?') }}",
                    text: "{{ __('You won\'t be able to revert this!') }}",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "{{ __('Yes, delete it!') }}",
                    cancelButtonText: "{{ __('Cancel') }}"
                }).then((result) => {
                if (result.isConfirmed) {
                    $wire.dispatch('delete-vacant', {vacant: vacantId})

                    Swal.fire({
                    title: "{{ __('Deleted!') }}",
                    text: "{{ __('Your vacancy has been deleted') }}",
                    icon: "success"
                    });
                }
                });
            })
        </script>
    @endscript
@endpush
