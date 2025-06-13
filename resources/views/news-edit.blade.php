<x-layouts.app :title="__('Edit Article')">
    <div class="flex flex-col gap-4 p-6">
        <h1 class="text-2xl font-semibold">{{ __('Edit Article') }}</h1>

        <form action="{{ route('news.update', $news) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT') {{-- Penting untuk method PUT --}}

            <div>
                <label for="title" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
                    {{ __('Title') }}
                </label>
                <div class="mt-1">
                    <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}" required
                           class="block w-full rounded-md border-zinc-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-zinc-700 dark:border-zinc-600 dark:text-white">
                </div>
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
                    {{ __('Content') }}
                </label>
                <div class="mt-1">
                    <textarea name="content" id="content" rows="10" required
                              class="block w-full rounded-md border-zinc-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-zinc-700 dark:border-zinc-600 dark:text-white">{{ old('content', $news->content) }}</textarea>
                </div>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
                    {{ __('Current Image') }}
                </label>
                @if ($news->image_path)
                    <div class="mt-2 mb-4">
                        <img src="{{ Storage::url($news->image_path) }}" alt="{{ $news->title }}" class="max-w-xs h-auto rounded-md shadow-md">
                        <div class="mt-2">
                            <input type="checkbox" name="remove_image" id="remove_image" class="rounded border-zinc-300 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:bg-zinc-700 dark:border-zinc-600 dark:text-indigo-400">
                            <label for="remove_image" class="ml-2 text-sm text-zinc-700 dark:text-zinc-300">{{ __('Remove current image') }}</label>
                        </div>
                    </div>
                @else
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">{{ __('No image currently set.') }}</p>
                @endif

                <label for="image" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mt-4">
                    {{ __('Upload New Image (optional)') }}
                </label>
                <div class="mt-1">
                    <input type="file" name="image" id="image" accept="image/*"
                           class="block w-full text-sm text-zinc-500
                           file:me-4 file:py-2 file:px-4
                           file:rounded-md file:border-0
                           file:text-sm file:font-semibold
                           file:bg-indigo-50 file:text-indigo-700
                           hover:file:bg-indigo-100 dark:file:bg-indigo-900 dark:file:text-indigo-300 dark:hover:file:bg-indigo-800">
                </div>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('news.show', $news) }}" class="inline-flex items-center px-4 py-2 border border-zinc-300 text-sm font-medium rounded-md shadow-sm text-zinc-700 bg-white hover:bg-zinc-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-zinc-700 dark:border-zinc-600 dark:text-zinc-200 dark:hover:bg-zinc-600">
                    {{ __('Cancel') }}
                </a>
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Update Article') }}
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
