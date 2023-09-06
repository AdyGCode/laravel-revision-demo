<x-guest-layout>

    <h1 class="text-teal-700 text-2xl">
        Welcome to {{ env('APP_NAME') }}
    </h1>
    <h2 class="text-teal-500 text-xl">Home...</h2>

    <p class="bg-red-500 text-white">Hello there</p>

    <ul class="flex flex-row gap-4 mt-6">
        <li><a class="bg-stone-300 rounded-full p-2"
               href="{{route('static.home')}}">
                Home
            </a></li>
        <li><a class="bg-stone-300 rounded-full p-2"
               href="{{route('static.privacy')}}">
                Privacy</a>
        </li>
        <li><a class="bg-stone-300 rounded-full p-2"
               href="{{route('static.contact')}}">
                Contact Us
            </a></li>
    </ul>
</x-guest-layout>
