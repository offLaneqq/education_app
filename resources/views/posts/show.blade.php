<x-layout>

    <section class="m-6">
        <div class="flex justify-end">
            <div class="justify-between">
                <div class="flex">
                    @can('update', $post)
                        <a href="{{ route('posts.edit', $post->id) }}"
                            class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Edit</a>
                    @endcan

                    @can('delete', $post)
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" href="{{ route('posts.destroy', $post->id) }}"
                                class="text-white bg-gradient-to-br from-black to-red-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-orange-200 dark:focus:ring-yellow-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete</button>
                        </form>
                    @endcan

                </div>
            </div>
        </div>
    </section>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-8 bg-slate-600 rounded-lg p-8">

        <h1 class="text-gray-900 dark:text-white text-3xl font-semibold text-center">
            Title: {{ $post->title }}
        </h1>

        <p class="mt-2 text-gray-900 dark:text-white text-l font-semibold text-center">
            Created by <span class="text-blue-300">{{ $post->user->name }}</span>. Last update:
            <span class="text-green-200">{{ $post->updated_at->format('d.m.Y') }}</span>
        </p>

        <main class="max-w-6xl mx-auto mt-0 lg:mt-10 space-y-6">

            <p class="mt-3 text-lg text-gray-900 md:text-xl dark:text-white text-center">
                Content: {{ $post->content }}
            </p>

        </main>

    </div>

</x-layout>