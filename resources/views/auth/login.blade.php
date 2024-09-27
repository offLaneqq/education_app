<x-layout>
    <x-header>Register</x-header>
    <div class="max-w-2xl mx-auto p-4 bg-slate-200 dark:bg-gray-900 rounded-lg">

        <form action="{{ route('login.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label for="default-input"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" id="default-input" name="email"
                    class="bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

            </div>

            <div class="mb-6">
                <label for="default-input"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" id="default-input" name="password"
                    class="bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

            </div>

            <div class="mb-6">
                <button type="sumbit"
                    class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Login</button>
            </div>

        </form>
    </div>
</x-layout>