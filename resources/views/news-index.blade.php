<x-layouts.app :title="__('All Articles')">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-zinc-900 dark:text-white mb-6">{{ __('All Articles') }}</h1>

        @if ($news->isEmpty())
            <p class="text-zinc-500 dark:text-zinc-400">{{ __('No articles published yet.') }}</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($news as $newsItem)
                    <a href="{{ route('news.show', $newsItem) }}" wire:navigate class="block bg-white dark:bg-zinc-800 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                        @if ($newsItem->image_path)
                            <img src="{{ Storage::url($newsItem->image_path) }}" alt="{{ $newsItem->title }}" class="w-full h-56 object-cover">
                        @endif
                        <div class="p-5">
                            <h2 class="text-2xl font-bold text-zinc-900 dark:text-white mb-2 line-clamp-2">{{ $newsItem->title }}</h2>
                            <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-3">
                                {{ __('Published on') }} {{ $newsItem->created_at->format('d M Y') }}
                            </p>
                            <p class="text-zinc-700 dark:text-zinc-300 line-clamp-3">{{ Str::limit(strip_tags($newsItem->content), 150) }}</p>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $news->links() }} {{-- Untuk pagination jika dibutuhkan --}}
            </div>
        @endif
    </div>
</x-layouts.app>
