@if (session()->has('message'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
    class="bg-green-300 fixed top-0 left-1/2 -translate-x-1/2 transform rounded-lg px-48 py-3 text-black"
    x-transition:enter="transition-transform transition-opacity ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-x-2"
    x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-300"
    x-transition:leave-end="opacity-0 transform -translate-x-2">
    <p>
        {{ session('message') }}
    </p>
</div>
@endif