<x-layout>
    <x-header>Create Post Page</x-header>
    <div class="max-w-2xl mx-auto p-4 bg-slate-200 dark:bg-gray-900 rounded-lg">

        <!-- for fails validation of create post(see PostController->store()) -->
        <!-- @if ($errors->any())
            @foreach ($errors->all() as $error)
                <span class="text-red-500">{{ $error }}</span>
            @endforeach
        @endif -->

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label for="default-input"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" id="default-input" name="title" value="{{ old('title') }}"
                    class="bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

            </div>

            <div class="mb-6">
                <label for="message"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                <textarea id="message" rows="4" name="content"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here...">{{ old('content') }}</textarea>

                @error('content')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

            </div>

            <div class="mb-6">

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="thumbnail">Upload
                    thumbnail</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="thumbnail" name="thumbnail" type="file">

                @error('thumbnail')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

            </div>

            <div class="mb-6">
                <button type="sumbit"
                    class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Store</button>
            </div>

        </form>
    </div>
</x-layout>