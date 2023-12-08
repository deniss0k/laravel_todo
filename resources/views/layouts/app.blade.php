<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel learning</title>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        body {
            @apply text-slate-700
        }

        a {
            @apply text-slate-600 hover:text-slate-400 transition-all
        }

        .btn {
            @apply inline-block text-slate-700 bg-slate-200 rounded-xl px-4 py-2 hover:bg-slate-400 hover:text-slate-100 transition-all
        }

        .btn--red {
            @apply bg-red-500 text-gray-100 hover:bg-red-700
        }

        .btn--green {
            @apply bg-green-600 text-gray-100 hover:bg-green-700
        }

        .btn--dark {
            @apply bg-slate-600 text-slate-100 hover:bg-slate-400 hover:text-slate-700
        }

        .form__group {
            @apply mb-4
        }

        label {
            @apply block mb-2
        }

        input, textarea {
            @apply px-4 py-2 w-full appearance-none border border-slate-200 leading-tight focus:border-slate-700 focus:outline-none rounded-xl
        }

        .error {
            @apply text-red-500 text-sm
        }
    </style>
    {{-- blade-formatter-enable --}}

    @yield('styles')
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
<h1 class="text-3xl font-bold mb-4 text-gray-600">@yield('title')</h1>
<div x-data="{flash: true}">
    @if (session()->has('success'))
        <div
            class="relative mb-4 w-full py-2 text-center bg-green-100 text-green-700 border border-green-700 rounded-xl"
            role="alert"
            x-show="flash">
            <strong>{{ session('success') }}</strong>
            <span class="absolute right-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6 cursor-pointer" @click="flash = false">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </span>
        </div>
    @endif
    @yield('content')
</div>
<script src="https://cdn.tailwindcss.com"></script>
<script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
