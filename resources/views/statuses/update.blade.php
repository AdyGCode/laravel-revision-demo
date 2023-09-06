<x-guest-layout>
    <h1 class="text-teal-700 text-2xl">
        {{ __('Statuses') }} : Edit
    </h1>


    <form
        action="{{ route('statuses.update', ['status'=>$status]) }}"
        method="POST"
        class="grid grid-cols-2 w-full gap-4">

        @csrf
        @method('PATCH')

        <label for="Name"
               class="bg-gray-600 text-white p-2">Name</label>
        <div>
            <input type="text"
                   name="name"
                   id="Name"
                   class="p-2"
                   value="{{ old('name') ?? $status->name }}"
                   placeholder="Enter name for the status"/>
            @error('name')
            <x-input-error :messages="$message"></x-input-error>
            @enderror
        </div>

        <label class="bg-gray-600 text-white p-2"
               for="Description">Description</label>
        <div>
        <textarea name="description"
                  id="Description"
                  class="p-2"
                  placeholder="Enter description of the status"
        >{{ old('description') ?? $status->description }}</textarea>
            {{-- do not put any space inside textarea --}}
            @error('description')
            <x-input-error :messages="$message"></x-input-error>
            @enderror
        </div>

        <p class="bg-gray-600 text-white p-2">Actions</p>
        <p class="p-2 flex flex-row gap-4">
            <a href="{{ url()->previous()??route('statuses.index') }}"
               class="rounded bg-stone-600 text-white">Cancel</a>
            <button type="submit" name="saveStatus"
                    class="rounded bg-green-600 text-white">
                Save
            </button>
        </p>
    </form>
</x-guest-layout>
