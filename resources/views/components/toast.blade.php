@if (session()->has('message'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="toast toast-end"
    x-transition:enter="transition-transform transition-opacity ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-x-2"
    x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-300"
    x-transition:leave-end="opacity-0 transform -translate-x-2">
    <div class="alert alert-success shadow-lg">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('message') }}</span>
        </div>
    </div>
</div>
@endif
@if (session()->has('error'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="toast toast-end"
    x-transition:enter="transition-transform transition-opacity ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-x-2"
    x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-300"
    x-transition:leave-end="opacity-0 transform -translate-x-2">
    <div class="alert alert-error shadow-lg">
        <div>
            <i class="fa-solid fa-circle-xmark fa-lg my-auto mr-3"></i>
            <span>{{ session('error') }}</span>
        </div>
    </div>
</div>
@endif
@if (session()->has('warning'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="toast toast-end"
    x-transition:enter="transition-transform transition-opacity ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-x-2"
    x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-300"
    x-transition:leave-end="opacity-0 transform -translate-x-2">
    <div class="alert alert-warning shadow-lg">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('warning') }}</span>
        </div>
    </div>
</div>
@endif
@if (session()->has('info'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="toast toast-end"
    x-transition:enter="transition-transform transition-opacity ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-x-2"
    x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-300"
    x-transition:leave-end="opacity-0 transform -translate-x-2">
    <div class="alert alert-info shadow-lg">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('info') }}</span>
        </div>
    </div>
</div>
@endif