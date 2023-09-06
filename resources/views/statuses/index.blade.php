<x-guest-layout>
    <h1 class="text-teal-700 text-2xl">
        {{ __('Statuses') }}
    </h1>

    <p class="my-4">
        <a href="{{route('statuses.create')}}"
           class="rounded bg-sky-500 text-white p-2 px-4"
        >Add New Status</a>
    </p>

    <table class="table-fixed">
        <thead class="border-bottom-2 border-gray-400">
            <tr class="w-full">
                <th class="w-1/12">#</th>
                <th class="w-5/12">Name</th>
                <th class="w-1/3">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach( $statuses as $status )
        <tr>
            <td>
                {{ $loop->index + 1 }}
            </td>
            <td>
                {{ $status->name }}
            </td>
            <td class="flex flex-row gap-2">
                <a href="{{ route('statuses.show', $status) }}"
                    class="rounded bg-green-500 text-black p-2">
                Show
                </a>
                Edit
                Delete
            </td>
        </tr>
        @endforeach

        </tbody>
        <tfoot>
        <tr>
            <td colspan="3">
                {{ $statuses->links() }}
            </td>
        </tr>
        </tfoot>
    </table>
</x-guest-layout>
