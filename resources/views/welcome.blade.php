@php
$links = [
    [
        'intro' => 'I\'m co-owner at',
        'url' => 'https://kraenk.de',
        'icon' => '🙂 💼',
        'title' => 'Kraenk Visuell',
    ],
    [
        'intro' => 'you can find me on',
        'url' => 'https://kraenk.de',
        'icon' => '🐙 🐱',
        'title' => 'GitHub',
    ],
    [
        'intro' => 'and on',
        'url' => 'https://bsky.app/profile/bastihilger.bsky.social',
        'icon' => '🔵 ☁️',
        'title' => 'Bluesky',
    ],
];

@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/png" href="/favicon.png">

        <title>Sebastian Hilger's Homepage</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans font-semibold antialiased bg-slate-50 dark:bg-slate-800 text-slate-600 dark:text-slate-50 min-h-full">
        <div class="flex h-dvh items-center justify-center px-6 py-8">
            <div class="flex flex-col gap-12 justify-center items-center w-full max-w-screen-sm text-center">
                <div>
                    <p class="text-3xl">🤘</p>
                    <br>
                    <p>Hi, my name is Sebastian Hilger</p>
                </div>

                <div class="grid gap-8">
                    @foreach($links as $link)
                        <div class="grid gap-3">
                            <div>
                                {!! $link['intro'] !!}
                            </div>

                            <a
                                href="{{ $link['url'] }}" title="{{ $link['title'] }}"
                                class="
                                    flex items-center justify-center gap-3 w-72
                                    rounded-full h-8
                                    hover:bg-slate-100 border border-slate-600
                                    dark:hover:bg-slate-600 dark:border-slate-50
                                "
                            >
                                <span>{!! $link['icon'] !!}</span> <span>{{ $link['title'] }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div>
                    <p>Bye!</p>
                    <br>
                    <p class="text-3xl">👋</p>
                </div>
            </div>
        </div>
    </body>
</html>
