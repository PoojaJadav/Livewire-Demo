<x-app-layout>
    <!-- Page title & actions -->
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                {{ __('Flights') }}
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
            <x-jet-button onclick="Livewire.emit('Flights.Manage.create')">
                @lang('Create')
            </x-jet-button>
        </div>
    </div>

    <livewire:flights.index/>
    <livewire:flights.manage/>
</x-app-layout>
