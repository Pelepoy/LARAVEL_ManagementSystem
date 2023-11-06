{{--@dd(auth()->user()->email)--}}
@include('partials._header')

<header class="max-w-lg mx-auto ">
    <a href="#">
        <h1 class="text-4xl text-gray-500 font-bold text-center">
            STUDENT REGISTRATION
        </h1>
    </a>
</header>
<main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
    <section class="">
        <h3 class="font-bold text-2xl text-center text-gray-500">Welcome to Dark Continent HS</h3>
        <p class="text-gray-500 pt-2 text-center">Please sign in your account <a href="/login" class="text-gray-500 font-bold hover:text-cyan-500">here </a> :)</p>
    </section>
    <section class="mt-8">
        <form action="/store" method="POST" class="flex flex-col">
            @csrf
            <div class="mb-6 pt-3 rounded bg-gray-100">
                <label for="name" class=" block text-gray-600 text-sm font-bold mb-2 ml-3">Name</label>
                <input type="text" name="name" class="bg-gray-100 rounded w-full text-gray-700 focus:outline-none
                border-b-4 border-gray-400 px-3" value={{old('name')}}>
                @error('name')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-100">
                <label for="email" class=" block text-gray-600 text-sm font-bold mb-2 ml-3">Email</label>
                <input type="email" name="email" class="bg-gray-100 rounded w-full text-gray-700 focus:outline-none
                border-b-4 border-gray-400 px-3" value={{old('email')}}>
                @error('email')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-100">
                <label for="passowrd" class="block text-gray-600 text-sm font-bold mb-2 ml-3">Password</label>
                <input type="password" name="password" class="bg-gray-100 rounded w-full text-gray-700 focus:outline-none
                border-b-4 border-gray-400 px-3">
                @error('password')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-100">
                <label for="password_confirmation" class="block text-gray-600 text-sm font-bold mb-2 ml-3">Confirm
                    Password</label>
                <input type="password" name="password_confirmation" class="bg-gray-100 rounded w-full text-gray-700 focus:outline-none
                border-b-4 border-gray-400 px-3">
                @error('password_confirmation')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button class="bg-gray-600 hover:bg-gray-100 text-white font-bold py-2 rounded
                shadow-lg hover:text-black hover:shadow-xl transition duration-200" type="submit">Sign Up
            </button>
        </form>
    </section>
</main>

@include('partials._footer')
