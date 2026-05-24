<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Флеш-карточки — приложение для изучения английского">
    <meta name="keywords" content="flashcards, english, learning">
    <title>{{ $title ?? 'Флеш-карточки' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-screen bg-zinc-50 text-zinc-900 antialiased">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="sticky top-0 z-50 border-b border-zinc-200/80 bg-white/80 backdrop-blur-xl">
            <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
                <!-- Logo -->
                    <div class="flex flex-col leading-none">
                        <a href="{{ route('student.sets') }}" wire:navigate class="text-base font-semibold tracking-tight text-zinc-900">
                            Флеш-карточки
                        </a>
                    </div>

                <!-- Navigation -->
                @auth
                <nav class="flex items-center gap-2">
                    <a
                        href="{{ route('student.sets') }}"
                        class="rounded-xl px-4 py-2 text-sm font-medium text-zinc-600 transition-all duration-200 hover:bg-zinc-100 hover:text-zinc-900">
                        Наборы
                    </a>

                    @if(auth()->user()->role === 'author')
                    <a
                        href="{{ route('author.sets') }}"
                        class="rounded-xl px-4 py-2 text-sm font-medium text-zinc-600 transition-all duration-200 hover:bg-zinc-100 hover:text-zinc-900">
                        Кабинет автора
                    </a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="rounded-xl px-4 py-2 text-sm font-medium text-zinc-500 transition-all duration-200 hover:bg-zinc-100 hover:text-zinc-900">
                            Выйти
                        </button>
                    </form>
                </nav>
                @endauth
            </div>
        </header>

        <!-- Main -->
        <main class="flex-1 py-8">
            {{ $slot }}
        </main>
    </div>
    @livewireScripts
</html>