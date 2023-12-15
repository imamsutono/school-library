<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Author') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- action result message --}}
        @if (session('action_status'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
                <div class="p-4 bg-green-500 shadow sm:rounded-lg">
                    <div class="max-w-xl text-white">
                        {{ session('action_message') }}
                    </div>
                </div>
            </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <a href="{{ route('author.create') }}">
                    <x-primary-button>{{ __('Add new author') }}</x-primary-button>
                </a>

                <table class="table-auto w-full my-8">
                    <thead class="bg-slate-100 text-left">
                        <tr>
                            <th class="p-3">Name</th>
                            <th>About</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $author)
                            <tr class="border-b-[1px] border-slate-100 border-solid">
                                <td class="px-3 py-4">{{ $author->name }}</td>
                                <td>{{ substr($author->about, 0, 50) }}...</td>
                                <td>
                                    @if ($author->photo)
                                        <img src="{{ asset('storage/'. $author->photo) }}" width="100" alt="{{ $author->name }} photo">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('author.edit', $author->id) }}" class="me-2">
                                        <x-secondary-button>Edit</x-secondary-button>
                                    </a>

                                    <form method="POST" action="{{ route('author.destroy', $author->id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')

                                        <x-danger-button onclick="return confirm('Are you sure want to delete the author?')">
                                            Delete
                                        </x-danger-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $authors->links() }}
            </div>
        </div>
    </div>
</x-app-layout>