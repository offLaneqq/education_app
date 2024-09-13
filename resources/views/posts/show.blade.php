<x-layout>

    <section class="m-6">
        <div class="flex justify-end">
            <div class="justify-between">
                <div class="flex">
                    <a href="{{ route('posts.edit', $post->id) }}"
                        class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" href="{{ route('posts.destroy', $post->id) }}"
                            class="text-white bg-gradient-to-br from-black to-red-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-orange-200 dark:focus:ring-yellow-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-8 bg-slate-600 rounded-lg p-8">

        <h1 class="text-gray-900 dark:text-white text-3xl font-semibold text-center">
            Title: {{ $post->title }}
        </h1>

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

            <p class="mt-3 text-lg text-gray-900 md:text-xl dark:text-white text-center">
                Content: {{ $post->content }}
            </p>

        </main>

    </div>

</x-layout>