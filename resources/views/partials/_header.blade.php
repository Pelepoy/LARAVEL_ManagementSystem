<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $title !== "" ? $title : 'Student Management System' }}</title>
    <script src="//unpkg.com/alpinejs" defer></script>

</head>
<body class="bg-gray-200 min-h-screen pt-12 pb-6 px-2">
<x-messages />
