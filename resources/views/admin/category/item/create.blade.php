<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Categories') }}
    </x-slot>

    <div class="w-full py-2 overflow-hidden">

        <form method="POST" action="{{ route('admin.category.type.item.store', ['type' => $type->id]) }}">
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
            <x-admin.form.label for="slug" class="{{$errors->has('slug') ? 'text-red-400' : ''}}">{{ __('Slug') }}</x-admin.form.label>

            <x-admin.form.input id="slug" class="{{$errors->has('slug') ? 'border-red-400' : ''}}"
                                type="text"
                                name="slug"
                                value="{{ old('slug') }}"
                                />
            <div>
            The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.
            </div>
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
                <label for="enabled" class="inline-flex items-center">
                    <input id="enabled" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="enabled" value="1" {{ old('enabled', 1) ? 'checked="checked"' : '' }}>
                    <span class="ml-2">{{ __('Enabled') }}</span>
                </label>
            </div>

            @if (!$type->is_flat)
            <div class="py">
                <x-admin.form.label for="parent_id" class="{{$errors->has('parent_id') ? 'text-red-400' : ''}}">{{ __('Parent Item') }}</x-admin.form.label>

                <select name="parent_id" class="input input-bordered w-full ">
                    <option value=''>-ROOT-</option>
                    @foreach ($item_options as $key => $name)
                    <option value="{{ $key }}" @selected(old('parent_id') == $key)>
                        {!! $name !!}
                    </option>
                    @endforeach
                </select>

                <div>
                    The maximum depth for a link and all its children is fixed. Some menu links may not be available as parents if selecting them would exceed this limit.
                </div>
            </div>
            

            <div class="py-2 w-40">
            <x-admin.form.label for="weight" class="{{$errors->has('weight') ? 'text-red-400' : ''}}">{{ __('Weight') }}</x-admin.form.label>

            <x-admin.form.input id="weight" class="{{$errors->has('weight') ? 'border-red-400' : ''}}"
                                type="number"
                                name="weight"
                                value="{{ old('weight', 0) }}"
                                />
            </div>
            @endif

            <div class="flex justify-end mt-4">
                <x-admin.form.button>{{ __('Create') }}</x-admin.form.button>
            </div>
        </form>
    </div>
</x-admin.wrapper>
