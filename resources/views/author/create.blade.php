<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Author') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Author Information') }}
                            </h2>
                    
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Add a new author by filling the form below.") }}
                            </p>
                        </header>

                        <form method="POST" action="{{ route('author.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="mt-1 block w-full"
                                    name="name" type="text"
                                    :value="old('name')"
                                    autocomplete="name"
                                    required autofocus
                                />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="about" :value="__('About')" />
                                <x-textarea id="about" class="mt-1 block w-full"
                                    name="about"
                                    autocomplete="about"
                                >{{ old('about') }}</x-textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('about')" />
                            </div>

                            <div>
                                <x-input-label for="photo" :value="__('Photo')" />
                                <input type="file" name="photo" id="photo" accept="image/png, image/jpeg" />
                                <x-input-error class="mt-2" :messages="$errors->get('photo')" />
                            </div>
                            
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                <a href="{{ route('author.index') }}">
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