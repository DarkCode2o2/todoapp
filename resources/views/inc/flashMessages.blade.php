@if (session('success'))
    <div id="alert-1" class="absolute right-5 top-5 z-50 flex items-center w-fit p-4 mb-4 text-teal-800 rounded-lg bg-teal-200" role="alert">
    <svg class="shrink-0 w-3 h-3 md:w-4 md:h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    <div class="ms-1 text-xs md:text-sm font-medium">
        {{session('success')}}
    </div>
    </div>
@endif


@if (session('error'))
    <div id="alert-1"  class="absolute right-5 top-5 z-50 flex items-center w-fit p-4 mb-4 text-red-800 rounded-lg bg-red-200" role="alert">
        <svg class="shrink-0 w-3 h-3 md:w-4 md:h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-1 text-xs md:text-sm font-medium">
            {{session('error')}}
        </div>
    </div>
@endif