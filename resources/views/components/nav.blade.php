<nav x-data="{open: false}" class="bg-gray-300 fixed w-full z-20 top-0 left-0 border-gray-200 shadow px-5 py-2.5">
    <div class="container-fluid flex flex-wrap justify-between items-center">
        <a href="/" class="">
            <span class="self-center text-xl whitespace-nowrap font-bold text-gray-600 ">
                {{ $data['title'] }}
            </span>
        </a>
        <button @click="open = !open" data-collapse-toggle="navbar-main" class="md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" class=""/>
            </svg>
        </button>
        <div x-show="open" class="w-full md:block md:w-auto" id="navbar-main">
            <x-menu-items />
        </div>
        <div class="hidden w-full md:block md:w-auto" id="navbar-main">
            <x-menu-items />
        </div>
    </div>
</nav>
