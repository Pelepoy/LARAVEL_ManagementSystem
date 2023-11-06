@include('partials._header', [$title])

<header class="max-w-lg mx-auto ">
    <a href="#">
        <h1 class="text-4xl text-gray-500 font-bold text-center">
            {{ $student->first_name }} {{ $student->last_name }}
        </h1>
    </a>
</header>
<main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
    <section class="">
        <h3 class="font-bold text-xl text-center text-gray-500">Please Supply Necessary Information</h3>
        {{--        <p class="text-gray-500 pt-2 text-center">Please sign up new account <a href="/register" class="text-gray-500 font-bold hover:text-cyan-500">here </a> :)</p>--}}
    </section>
    <section class="mt-8">
        <form action="/student/{{ $student->id }}" method="POST" class="flex flex-col">
            @method('PUT')
            @csrf
            <div class="mb-6 pt-3 rounded bg-gray-100">
                <label for="first_name" class="block text-gray-600 text-sm font-bold mb-2 ml-3">First Name</label>
                <input type="text" name="first_name" class="bg-gray-100 rounded w-full text-gray-700 focus:outline-none
                border-b-4 border-gray-400 px-3" value="{{ $student->first_name }}">
                @error('first_name')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-100">
                <label for="last_name" class=" block text-gray-600 text-sm font-bold mb-2 ml-3">Last Name</label>
                <input type="text" name="last_name" class="bg-gray-100 rounded w-full text-gray-700 focus:outline-none
                border-b-4 border-gray-400 px-3" value="{{ $student->last_name }}">
                @error('last_name')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-100">
                <label for="gender" class=" block text-gray-600 text-sm font-bold mb-2 ml-3">Gender</label>
                <select type="text" name="gender" class="bg-gray-100 rounded w-full text-gray-700 focus:outline-none
                border-b-4 border-gray-400 px-2">
                    <option value="" {{ $student->gender == "" ? 'selected' : ''}}></option>
                    <option value="Male" {{ $student->gender == "Male" ? 'selected' : ''}}>Male</option>
                    <option value="Female" {{ $student->gender == "Female" ? 'selected' : ''}}>Female</option>
                </select>
                @error('gender')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-100">
                <label for="age" class="block text-gray-600 text-sm font-bold mb-2 ml-3">Age</label>
                <input type="number" name="age" class="bg-gray-100 rounded w-full text-gray-700 focus:outline-none
                border-b-4 border-gray-400 px-3" value="{{ $student->age }}">
                @error('age')
                <p class=" text-sm text-red-500"> {{ $message }} </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-100">
                <label for="email" class="block text-gray-600 text-sm font-bold mb-2 ml-3">Email</label>
                <input type="email" name="email" class="bg-gray-100 rounded w-full text-gray-700 focus:outline-none
                border-b-4 border-gray-400 px-3" value="{{ $student->email }}"">
                @error('email')
                <p class=" text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-sky-500 hover:bg-gray-100 text-white font-bold py-2 rounded
                shadow-lg hover:text-black hover:shadow-xl transition duration-200 mb-2">Update
            </button>
        </form>
        <form action="/student/{{ $student->id }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="bg-red-500 w-full mt-2 hover:bg-gray-100 text-white font-bold py-2 rounded
                shadow-lg hover:text-black hover:shadow-xl transition duration-200">Delete
            </button>
        </form>
    </section>
</main>

@include('partials._footer')
