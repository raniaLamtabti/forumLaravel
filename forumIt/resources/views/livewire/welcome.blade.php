<div class="flex flex-col gap gap-6 p-20">

    @if ($data->count())
        @foreach ($data as $item)
        <div class="flex gap gap-4 shadow-xl">
            <div class="h-full flex-auto w-50">
                <img src="{{ $item->user->profile_photo_url }}" alt="{{ $item->user->name }}" class="h-full">
            </div>
            <div class="p-20 flex-auto w-full flex flex-col gap gap-4" style="padding: 20px">
                <div class="content">
                    <h1 style="font-size: 24px;font-weight:800">{{ $item->title }}</h1>
                    <p>{!! \Illuminate\Support\Str::limit($item->content, 50, '...') !!}</p>
                </div>
                <div class="flex justify-between">
                    <div class="count flex gap gap-4">
                        <div class="likes">{{ $item->likes }}</div>
                        <div class="reponse">,nkjiok</div>
                    </div>
                    <div class="flex gap gap-4">
                        <div class="user">{{ $item->user->name }}</div>
                        <div class="date">{{ $item->created_at }}</div>
                    </div>
                    <div class="more">
                        <x-jet-button>
                            <a href="{{ route('question', $item->id) }}">{{ __('See More') }}</a>
                        </x-jet-button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <p>No Results Found</p>
    @endif
</div>
