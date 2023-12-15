<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
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
                <a href="{{ route('user.create') }}">
                    <x-primary-button>{{ __('Add new user') }}</x-primary-button>
                </a>

                <table class="table-auto w-full my-8">
                    <thead class="bg-slate-100 text-left">
                        <tr>
                            <th class="p-3">Name</th>
                            <th>Email</th>
                            <th>Registered at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border-b-[1px] border-slate-100 border-solid">
                                <td class="px-3 py-4">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    {{ \Carbon\Carbon::create($user->created_at)->format('d M Y H:i') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>