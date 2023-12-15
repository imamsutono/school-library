<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Book Information') }}
                            </h2>
                    
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Edit a book by updating the form below.") }}
                            </p>
                        </header>

                        <form method="POST" action="{{ route('book.update', $book->id) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" class="mt-1 block w-full"
                                    name="title" type="text"
                                    :value="old('title', $book->title)"
                                    autocomplete="title"
                                    required autofocus
                                />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>

                            <div>
                                <x-input-label for="isbn" :value="__('ISBN')" />
                                <x-text-input id="isbn" class="mt-1 block w-full"
                                    name="isbn" type="number"
                                    :value="old('isbn', $book->isbn)"
                                    autocomplete="isbn"
                                    required autofocus
                                />
                                <x-input-error class="mt-2" :messages="$errors->get('isbn')" />
                            </div>

                            <div>
                                <x-input-label for="publisher" :value="__('Publisher')" />
                                <x-text-input id="publisher" class="mt-1 block w-full"
                                    name="publisher" type="text"
                                    :value="old('publisher', $book->publisher)"
                                    autocomplete="publisher"
                                    required autofocus
                                />
                                <x-input-error class="mt-2" :messages="$errors->get('publisher')" />
                            </div>

                            <div>
                                <x-input-label for="author" :value="__('Author')" />
                                <select
                                    name="author_id" id="author"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                                >
                                    @foreach ($authors as $author)
                                        <option
                                            value="{{ $author->id }}"
                                            @if(old('author_id') == $author->id || old('author_id') == $book->author_id) selected @endif
                                        >
                                            {{ $author->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('author_id')" />
                            </div>

                            <div>
                                @if ($book->cover)
                                    <img src="{{ asset('storage'. $book->cover) }}"
                                        class="w-10" alt="{{ $book->title }} cover">
                                @endif

                                <input type="hidden" name="old_image" value="{{ $book->cover }}">

                                <x-input-label for="cover" :value="__('Cover')" />
                                <input type="file" name="cover" id="cover" accept="image/png, image/jpeg" />
                                <x-input-error class="mt-2" :messages="$errors->get('cover')" />
                            </div>
                            
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                <a href="{{ route('book.index') }}">
                                    <x-secondary-button>{{ __('Cancel') }}</x-secondary-button>
                                </a>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>