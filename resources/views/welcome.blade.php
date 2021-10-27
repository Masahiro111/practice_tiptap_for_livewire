<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
        <title>TipTap Demo</title>
        @livewireStyles
    </head>

    <body>
        <h1>TipTap Livewire Demo</h1>
        <!-- The editor component -->
        <livewire:editor />

        @livewireScripts
        <script src="{{mix('js/app.js')}}" defer></script>
    </body>

</html>