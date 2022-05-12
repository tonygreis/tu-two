<x-guest-layout>
    <div class="mt-12 max-w-6xl mx-auto">
        @can('create', App\Models\Post::class)
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('posts.create') }}" class="px-4 py-2 bg-indigo-400 hover:bg-indigo-600 rounded">
                    New Post</a>
            </div>
        @endcan
        <div class="relative overflow-x-auto shadow-md bg-gray-200 sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $post->id }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $post->title }}
                            </th>

                            <td class="px-6 py-4 text-right">
                                <div class="flex space-x-2">
                                    @can('update', $post)
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    @endcan
                                    @can('delete', $post)
                                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}"
                                            onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                        </form>
                                    @endcan

                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</x-guest-layout>
