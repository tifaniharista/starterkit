<x-layouts.app :title="$news->title">
    <div class="container mx-auto p-6">
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg overflow-hidden">
            @if ($news->image_path)
                <img src="{{ Storage::url($news->image_path) }}" alt="{{ $news->title }}" class="w-full h-80 object-cover">
            @endif
            <div class="p-6">
                <h1 class="text-4xl font-extrabold text-zinc-900 dark:text-white mb-4">{{ $news->title }}</h1>
                <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-6">
                    {{ __('Published on') }} {{ $news->created_at->format('d M Y') }}
                </p>
                <div class="prose dark:prose-invert max-w-none text-zinc-700 dark:text-zinc-300">
                    {!! nl2br(e($news->content)) !!}
                </div>

                {{-- Tombol Edit dan Delete --}}
                <div class="mt-6 flex justify-end space-x-4">
                    <a href="{{ route('news.edit', $news) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        {{ __('Edit Article') }}
                    </a>

                    <form action="{{ route('news.destroy', $news) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this article?') }}');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            {{ __('Delete Article') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="mt-8 text-center">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Back to Dashboard') }}
            </a>
        </div>
    </div>
</x-layouts.app>
