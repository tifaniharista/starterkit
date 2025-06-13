<x-layouts.app :title="__('Create News')">
    <div class="flex flex-col gap-4 p-6">
        <h1 class="text-2xl font-semibold">{{ __('Create New Article') }}</h1>

        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
                    {{ __('Title') }}
                </label>
                <div class="mt-1">
                    <input type="text" name="title" id="title" required
                           class="block w-full rounded-md border-zinc-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-zinc-700 dark:border-zinc-600 dark:text-white">
                </div>
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
                    {{ __('Content') }}
                </label>
                <div class="mt-1">
                    <textarea name="content" id="content" rows="10" required
                              class="block w-full rounded-md border-zinc-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-zinc-700 dark:border-zinc-600 dark:text-white"></textarea>
                </div>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
                    {{ __('Image') }}
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

            <div class="flex justify-end">
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Publish Article') }}
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
