<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
        <title>TipTap Demo</title>
        @livewireStyles
    </head>

    <body class="bg-gray-100 p-8">
        <h1 class="text-gray-800 text-3xl font-semibold text-center">TipTap Livewire Demo</h1>

        <form action="">
            <ul data-type="taskList">
                <li class="task-list" data-checked="true">
                    <label contenteditable="false">
                        <input type="radio" name="group-1" value="To bring her USB memory stick">
                    </label>
                    <div>
                        <p>To bring her USB memory stick</p>
                    </div>
                </li>
                <li class="task-list" data-checked="true">
                    <label contenteditable="false">
                        <input type="radio" name="group-1" checked><span></span>
                    </label>
                    <div>
                        <p>To hand in her history homework</p>
                    </div>
                </li>
                <li class="task-list" data-checked="true">
                    <label contenteditable="false">
                        <input type="radio" name="group-2" checked><span></span>
                    </label>
                    <div>
                        <p>To lend her a USB memory stick</p>
                    </div>
                </li>
                <li class="task-list" data-checked="true">
                    <label contenteditable="false">
                        <input type="radio" name="group-2"><span></span>
                    </label>
                    <div>
                        <p>To print out her history homework</p>
                    </div>
                </li>
            </ul>
        </form>



        <!-- The editor component -->
        <livewire:editor />

        @livewireScripts
        <script src="{{mix('js/app.js')}}" defer></script>
    </body>

</html>