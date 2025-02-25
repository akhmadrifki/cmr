<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Category Types') }}
    </x-slot>

    <div class="w-full py-2 overflow-hidden">

        <form method="POST" action="{{ route('admin.category.type.store') }}">
        @csrf

            <div class="py-2">
                <x-admin.form.label for="name" class="{{$errors->has('name') ? 'text-red-400' : ''}}">{{ __('Name') }}</x-admin.form.label>

                <x-admin.form.input id="name" class="{{$errors->has('name') ? 'border-red-400' : ''}}"
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    />
            </div>

            <div class="py-2">
                <x-admin.form.label for="machine_name" class="{{$errors->has('machine_name') ? 'text-red-400' : ''}}">{{ __('Machine-readable name') }}</x-admin.form.label>

                <x-admin.form.input id="machine_name" class="{{$errors->has('machine_name') ? 'border-red-400' : ''}}"
                                    type="text"
                                    name="machine_name"
                                    value="{{ old('machine_name') }}"
                                    />
            </div>

            <div class="py-2">
                <x-admin.form.label for="description" class="{{$errors->has('description') ? 'text-red-400' : ''}}">{{ __('Description') }}</x-admin.form.label>

                <x-admin.form.input id="description" class="{{$errors->has('description') ? 'border-red-400' : ''}}"
                                    type="text"
                                    name="description"
                                    value="{{ old('description') }}"
                                    />
            </div>

            <div class="p-2">
                <label for="is_flat" class="inline-flex items-center">
                    <input id="is_flat" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="is_flat" value="1" {{ old('is_flat', 0) ? 'checked="checked"' : '' }}>
                    <span class="ml-2">{{ __('Use Flat Category') }}</span>
                </label>
            </div>

            <div class="flex justify-end mt-4">
                <x-admin.form.button>{{ __('Create') }}</x-admin.form.button>
            </div>
        </form>
    </div>
</x-admin.wrapper>