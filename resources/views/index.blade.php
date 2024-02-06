<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Larabin</title>

    @vite('resources/css/app.css')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="flex flex-col min-h-screen">
    <header>
        <nav class="navbar min-h-0">
            {{-- Create new redirects to homepage --}}
            {{-- Save saves the paste to db, redirects to show --}}
            {{-- Edit only possible when opened show, then after editing click on save --}}
            <!-- Create/new -->
            <a href="{{ route('home') }}">
                <i class="bx bxs-file-plus bx-md"></i>
            </a>

            <!-- Save -->
            <button type="submit">
                <i class="bx bxs-save bx-md"></i>
            </button>

            <!-- Edit -->
            <button>
                <i class="bx bxs-edit bx-md"></i>
            </button>

            <!-- Logo -->
            <a href="#" class="hover:opacity-100 ml-auto opacity-75">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-10">
            </a>
        </nav>
    </header>

    <hr>

    <main class="flex flex-1 p-2 mt-2">
        @php
            // Because if it was in textarea there would be whitespaces
            $content = '';

            if (isset($paste)) {
                $content = $paste->content;
            }
        @endphp
        <textarea @if (isset($paste)) readonly @endif autofocus id="content"
            class="read-only:cursor-default flex-1 w-full min-h-full px-2 bg-transparent outline-none resize-none">{{ $content }}</textarea>
    </main>

    <footer class="footer-center">
        <p class="font-bold">&copy; Tomáš Kriško 2024</p>
    </footer>
</body>

</html>
