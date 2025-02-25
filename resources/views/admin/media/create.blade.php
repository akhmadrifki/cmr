<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Media') }}
    </x-slot>

    <div class="w-full py-2 overflow-hidden">

        <form method="POST" action="{{ route('admin.media.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="py">
                <x-admin.form.label for="type" class="{{$errors->has('type') ? 'text-red-400' : ''}}">{{ __('Type') }}</x-admin.form.label>

                <select name="type" class="input input-bordered w-full">
                    @foreach (media_type_as_options() as $key => $name)
                    <option value="{{ $key }}" @selected(old('type') == $key)>
                        {!! $name !!}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="py-2">
                <x-admin.form.label for="name" class="{{$errors->has('name') ? 'text-red-400' : ''}}">{{ __('Name') }}</x-admin.form.label>

                <x-admin.form.input id="name" class="{{$errors->has('name') ? 'border-red-400' : ''}}"
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    />
            </div>

            <div class="py-2">
                <x-admin.form.label for="alt" class="{{$errors->has('alt') ? 'text-red-400' : ''}}">{{ __('Alternative Text') }}</x-admin.form.label>

                <x-admin.form.input id="alt" class="{{$errors->has('alt') ? 'border-red-400' : ''}}"
                                    type="text"
                                    name="alt"
                                    value="{{ old('alt') }}"
                                    />
            </div>

            <div class="py-2">
                <x-admin.form.label for="file" class="{{$errors->has('file') ? 'text-red-400' : ''}}">{{ __('File') }}</x-admin.form.label>

                <x-admin.form.input id="file" class="{{$errors->has('file') ? 'border-red-400' : ''}}"
                                type="file"
                                name="file"
                                />
            </div>

            <div class="flex justify-end mt-4">
                <x-admin.form.button>{{ __('Create') }}</x-admin.form.button>
            </div>
        </form>
    </div>
</x-admin.wrapper>