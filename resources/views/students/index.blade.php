@include('partials._header')
@php $array = array('title' => 'Student Management System'); @endphp
<x-nav :data="$array"/>


<header class="max-w-lg mx-auto mt-10">
    <a href="#">
        <h1 class="text-4xl text-gray-500 font-bold text-center">
            Student Information
        </h1>
    </a>
</header>
<section class="mt-10">
    <div class="overflow-x-auto relative ">
        <table class="w-2/4 mx-auto text-sm text-left text-gray-500 shadow-xl">
            <thead class="text-sx text gray-700 uppercase bg-gray-50 ">
            <tr>
                <th scope="col" class="py-3 px-6 rounded">

                </th>
                <th scope="col" class="py-3 px-6 rounded">
                    First Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Last Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Gender
                </th>
                <th scope="col" class="py-3 px-6">
                    Age
                </th>
                <th scope="col" class="py-3 px-6">
                    Email
                </th>
                <th scope="col" class="py-3 px-6 rounded">

                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr class="bg-gray-600 border-b-4 border-gray-400 text-white">
                    @php
                        $seed = $student->first_name . "%20" . $student->last_name;
                        $default_profile = "https://api.dicebear.com/7.x/initials/svg?seed=" . $seed;
                    @endphp

                    <td class="">
                        <img
                            src="{{ $student->student_image ? asset("storage/student/thumbnail/".$student->student_image) :  $default_profile }}"
                            alt="">
                    </td>
                    <td class="py-4 px-6">
                        {{ $student->first_name }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $student->last_name }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $student->gender }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $student->age }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $student->email }}
                    </td>
                    <td class="py-4 px-6">
                        <a href="/student/{{ $student->id }}"
                           class="bg-sky-500 text-white px-4 py-2 rounded hover:bg-sky-600">view</a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="flex justify-around mt-10">
            {{ $students->links() }}
        </div>
    </div>


</section>
@include('partials._footer')

{{--<div class="text-center xl:2/4">--}}
{{--    <ul>--}}
{{--        <h1 class="font-bold text-cyan-500 bg-gray-200 text-cyan-500 font-bold rounded-xl mb-5 mx-auto text-center py-12 text-3xl shadow-xl">--}}
{{--            STUDENTS</h1>--}}
{{--        @foreach($students as $student)--}}
{{--            <li>--}}
{{--                --}}{{--{{ $student->first_name }} {{ $student->last_name }} {{ $student->age }}--}}
{{--                {{ $student->gender }} {{ $student->gender_count }}--}}
{{--                --}}{{--{{ $student->first_name }}--}}
{{--            </li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
{{--</div>--}}
