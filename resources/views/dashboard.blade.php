<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>

        {{-- Bagian untuk menampilkan berita terbaru --}}
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-6">
            <h2 class="text-2xl font-semibold text-zinc-900 dark:text-white mb-4">{{ __('Latest Articles') }}</h2>
            @php
                // Panggil metode statis dari NewsController untuk mendapatkan berita
                $latestNews = \App\Http\Controllers\NewsController::getLatestNews(3); // Ambil 3 berita terbaru
            @endphp

            @if ($latestNews->isEmpty())
                <p class="text-zinc-500 dark:text-zinc-400">{{ __('No articles published yet.') }}</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($latestNews as $newsItem)
                        <a href="{{ route('news.show', $newsItem) }}" wire:navigate class="block bg-white dark:bg-zinc-700 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                            @if ($newsItem->image_path)
                                <img src="{{ Storage::url($newsItem->image_path) }}" alt="{{ $newsItem->title }}" class="w-full h-48 object-cover rounded-t-lg">
                            @endif
                            <div class="p-4">
                                <h3 class="text-xl font-bold text-zinc-900 dark:text-white mb-2 line-clamp-2">{{ $newsItem->title }}</h3>
                                <p class="text-sm text-zinc-600 dark:text-zinc-300 line-clamp-3 mb-3">{{ Str::limit(strip_tags($newsItem->content), 100) }}</p>
                                <p class="text-xs text-zinc-500 dark:text-zinc-400">{{ __('Published on') }} {{ $newsItem->created_at->format('d M Y') }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
                @if (\App\Models\News::count() > 3)
                    <div class="mt-6 text-center">
                        <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-indigo-600 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('View All Articles') }}
                        </a>
                    </div>
                @endif
            @endif
        </div>
    </div>
</x-layouts.app>
