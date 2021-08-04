<div class="container mx-auto flex flex-col gap gap-6 p-20">
    @foreach ($question as $item )
    <div class="flex gap gap-4 shadow-xl">
        <div class="h-full flex-auto w-50">
            <img src="{{ $item->user->profile_photo_url }}" alt="{{ $item->user->name }}" class="h-full">
        </div>
        <div class="p-20 flex-auto w-full flex flex-col gap gap-4" style="padding: 20px">
            <div class="content">
                <h1 style="font-size: 24px;font-weight:800">{{ $item->title }}</h1>
                <p>{{ $item->content }}</p>
            </div>
            <div class="flex justify-between">
                <div class="flex gap gap-4">
                    <div class="user">{{ $item->user->name }}</div>
                    <div class="date">{{ $item->created_at }}</div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($reponse as $item )
    <div class="flex gap gap-4 shadow-xl">
        <div class="h-full flex-auto w-50">
            <img src="{{ $item->user->profile_photo_url }}" alt="{{ $item->user->name }}" class="h-full">
        </div>
        <div class="p-20 flex-auto w-full flex flex-col gap gap-4" style="padding: 20px">
            <div class="content">
                <p>{{ $item->content }}</p>
            </div>
        </div>
    </div>
    @endforeach
    @auth
    @foreach ($question as $item )
    <x-jet-form-section submit="create">
        <x-slot name="title">
            {{ __('Add reponse') }}
        </x-slot>

        <x-slot name="description">
            {{ __('') }}
        </x-slot>

        <x-slot name="form">
            <!-- Token Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-input id="question_id"  name="question_id" wire:model.defer="question_id" type="text" class="mt-1 block w-full" hidden value="{{ $item->id }}"/>
                <x-jet-label for="content" value="{{ __('Reponse') }}" />
                <div class="mt-1 bg-white">
                    <div class="body-content" wire:ignore>
                        <trix-editor
                            class="trix-content"
                            x-ref="trix"
                            wire:model.defer="content"
                            wire:key="trix-content-unique-key"
                        ></trix-editor>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="created">
                {{ __('Created.') }}
            </x-jet-action-message>

            <x-jet-button wire:click="create">
                {{ __('Create') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
    @endforeach
    @endauth
</div>
