<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Menus') }}
    </x-slot>

    <div class="w-full py-2 overflow-hidden">

        <form method="POST" action="{{ route('admin.menu.update', $menu->id) }}">
        @csrf
        @method('PUT')

            <div class="py-2">
            <x-admin.form.label for="name" class="{{$errors->has('name') ? 'text-red-400' : ''}}">{{ __('Name') }}</x-admin.form.label>

            <x-admin.form.input id="name" class="{{$errors->has('name') ? 'border-red-400' : ''}}"
                                type="text"
                                name="name"
                                value="{{ old('name', $menu->name) }}"
                                />
            </div>

            <div class="py-2">
                <x-admin.form.label for="machine_name">{{ __('Machine name:') }} {{ $menu->machine_name }}</x-admin.form.label>
            </div>

            <div class="py-2">
            <x-admin.form.label for="description" class="{{$errors->has('description') ? 'text-red-400' : ''}}">{{ __('Description') }}</x-admin.form.label>

            <x-admin.form.input id="description" class="{{$errors->has('description') ? 'border-red-400' : ''}}"
                                type="text"
                                name="description"
                                value="{{ old('name', $menu->description) }}"
                                />
            </div>

            <div class="flex justify-end mt-4">
                <x-admin.form.button>{{ __('Update') }}</x-admin.form.button>
            </div>
        </form>
    </div>
</x-admin.wrapper>
