<x-app-layout>
    <h1 class="text-teal-700 text-2xl">
        {{ __('Statuses') }}
    </h1>
    <p class="my-4">
        <a href="{{route('statuses.create')}}"
           class="rounded bg-sky-500 text-white p-2 px-4"
        >Add New Status</a>
    </p>

    <div class="grid grid-cols-2 w-full gap-4">
        <p class="bg-gray-600 text-white p-2">#</p>
        <p class="p-2">{{ $status->id }} </p>
        <p class="bg-gray-600 text-white p-2">Name</p>
        <p class="p-2">{{ $status->name }} </p>
        <p class="bg-gray-600 text-white p-2">Description</p>
        <p class="p-2">{{ $status->description }} </p>
        <p class="bg-gray-600 text-white p-2">Actions</p>
        <p class="p-2">
            <a href="{{ url()->previous()??route('statuses.index') }}">Back</a>
            <a href="{{ route('statuses.update', ['status'=>$status]) }}">Edit</a>
            <a href="{{ route('statuses.delete', ['status'=>$status]) }}">Delete</a>
        </p>
    </div>
</x-guest-layout>
