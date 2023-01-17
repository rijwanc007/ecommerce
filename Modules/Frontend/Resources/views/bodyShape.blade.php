<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="{{ asset('/') }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ config('settings.title') ? config('settings.title') : config('app.name', 'Laravel') }} - @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ 'storage/'.LOGO_PATH.config('settings.favicon')}}">
    <link rel="shortcut icon" href="{{  'storage/'.LOGO_PATH.config('settings.favicon')}}" />
    <link href="{{asset('css/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/frontendCustomDesign.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/config.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/scripts.bundle.js')}}" type="text/javascript"></script>
</head>
<style>
    #menu {
        width: 200px;
        display: flex;
        justify-content: center;
        left: 0;
        bottom: 0;
        height: 3rem;
        border: 3px solid red;
        align-items: center;
        border-radius: 5px;
        background-color: white;
        z-index: 100;
        padding: 0.5rem 1rem;
    }
    #container {
        border-style: solid;
        border-radius: 1rem;
        text-align: justify;
        margin: 1rem auto;
        width: max-content;
        width: max-content;
    }
    .menu-item {
        padding-left: 0.2rem;
    }
</style>
<body style="height:auto;padding-bottom:10rem">
<nav class="navbar navbar-expand bg-success navbar-success">
    <a class="navbar-brand" href="{{ url("/") }}">
        <img src="{{asset('logo/B2GSOFT.png')}}" alt="logo" style="width:200px;">
    </a>
</nav>
<nav class="bottom-bar" style="z-index:100">
    <ul class="bottom-bar__list">
        <div class="bottom-bar__active-indicator" style="transform: translate(200%, -0.5rem);"></div>
        <li class="bottom-bar__link" onclick="window.location='{{ url("/") }}'"><span class="material-symbols-outlined"></span>Home</li>
        <li class="bottom-bar__link" onclick="window.location='{{ url("mug") }}'"><span class="material-symbols-outlined"></span>Mug</li>
        <li class="bottom-bar__link selected" onclick="window.location='{{ url("body-shape") }}'"><span class="material-symbols-outlined"></span>Shape</li>
        <li class="bottom-bar__link"><span class="material-symbols-outlined"></span>About</li>
        <li class="bottom-bar__link"><span class="material-symbols-outlined"></span>Company</li>
    </ul>
</nav>
<br/>
<div id="menu">
    <input type="color" id="color" onchange="getInput()" class="menu-item" />
</div>
<div id="container">
    <svg
        id="product-svg"
        width="800"
        height="800"
        viewBox="0 0 1920 1280"
        data-name="Layer 1"
        xmlns="http://www.w3.org/2000/svg"
    >
        <defs />
        <path
            id="product-shape"
            d="M1091.89 706.86c-.73-4-8.21-37.53-8.21-37.53s-4.37-35.14-8.11-48.45-9.46-37.43-9.46-37.43-2-11.33-5.41-16.43-14.87-23.39-24.74-32.23-24.79-15.11-37.91-20.14S970 504.13 967.9 502s-3.57-5.51-5.51-6.32a8.47 8.47 0 0 1-4.21-3.57c-.81-1.46-2.38-4.19-8.4-4.12 0 0-.42 4.68 2.6 6.13s4.68 5.41 5.41 7.49.52 12.27.52 14.45-.42 4.68-2 6-3.85 5.82-19.55 5.41S892 513.18 892 513.18s-27.45-13.31-36.28-21.42-27.55-26.61-27.55-26.61-3.64-4.89-7.07-4a30.67 30.67 0 0 0-7.59 3.85s-5.09-1.66-10.6 2.81S782 479.7 782 479.7l-7.69 2.18-9.77 5.61s-5.41 1.56-8.42 2.5l-31.92 9.88s-7.49.62-9.15 1-9.36 3.33-13 6.76-17.36 12.58-22.46 23-18.92 32.54-24.22 45.43S639.43 613 639.43 613l-8.73 22.35-4.26 8.73s-1 4 .62 5 21.21 23 21.21 23l3-20.27 3.74-3.64s16.53-1.66 24.22-.31 19.75 4 31.81 10.71c0 0 3.12-.1 11.85 18.51 0 0 3 7.28 13.72 16.84 0 0-4.78 41.27-5.61 52.4s-7.17 55.72-8.84 66.23-2.08 11.75-2.08 11.75l-2 62.17s12.27 22.66 22 45.64 25.89 57.28 25.89 57.28l26.16 50.32 15.95 28.9s5.3 10.71 7.49 11.64 5.41 1.87 5.41 1.87.42.83 4.57 1.35 63.63 0 63.63 0l108.62-.47 34.1-.1 1.77-26.72a12.05 12.05 0 0 1-3.53-8.53c-.21-5.72.31-27.55.31-27.55l-1.87-12.06s-.21-6.34-1.14-8.84a168.52 168.52 0 0 0-11.64-22.77s-.52-6.76-1.14-7.8a11 11 0 0 0-1.46-1.87s.21-7.49-.52-9.36-2-6.55-2-6.55l-1.25-9.15.42-35.35 1-13.72s.1-25.47-.62-31.61-.42-17.57-.42-20.9 4.26-19.55 4.26-27.55.73-6.86-.62-18.3 3.74-16.43 3.53-29.73-.73-35.14-.73-35.14 24.85-2.81 36.91-8.32 36.8-10.4 36.8-10.4 2.66.13 1.93-3.82zM714.66 1046.35l-16.86-28.05-1.6-1.6-9.2 47.23s-4.08 15.27-4.44 19-1.42 11.36.89 12.43a24.54 24.54 0 0 0 13.67 3c7.63-.36 10.3-.71 8.52-3.73s-5.63-3.38-5.63-3.38 6.77-3 12.38-3.36 11.36-.18 24.86-7.1c0 0-2.66-5.86-16.16-24.32s-6.43-10.12-6.43-10.12z"
        />
    </svg>
</div>
<script src="{{asset('js/designPattern.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    let choosedColor;
    const target = document.getElementById("product-shape");
    function getInput(e) {
        let colorInput = document.getElementById("color");
        choosedColor = colorInput.value;
        target.style.fill = choosedColor;
    }
</script>
</body>
</html>
