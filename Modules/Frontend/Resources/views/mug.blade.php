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
    <script src="{{asset('js/colorPicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/magnifier.js')}}" type="text/javascript"></script>
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
<nav class="bottom-bar" class="bottom-bar" style="z-index:100">
    <ul class="bottom-bar__list">
        <div class="bottom-bar__active-indicator" style="transform: translate(100%, -0.5rem);"></div>
        <li class="bottom-bar__link" onclick="window.location='{{ url("/") }}'"><span class="material-symbols-outlined"></span>Home</li>
        <li class="bottom-bar__link selected" onclick="window.location='{{ url("mug") }}'"><span class="material-symbols-outlined"></span>Mug</li>
        <li class="bottom-bar__link" onclick="window.location='{{ url("body-shape") }}'"><span class="material-symbols-outlined"></span>Shape</li>
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
        xmlns:dc="http://purl.org/dc/elements/1.1/"
        xmlns:cc="http://creativecommons.org/ns#"
        xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
        xmlns:svg="http://www.w3.org/2000/svg"
        xmlns="http://www.w3.org/2000/svg"
        xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
        xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
        version="1.1"
        id="Layer_1"
        x="0px"
        y="0px"
        width="587"
        height="574"
        viewBox="0 0 587.0000000000019 573.999999999998"
        enable-background="new 0 0 578 462"
        xml:space="preserve"
        inkscape:version="0.91 r13725"
    >
                <defs id="defs6" />

        <path
            id="product-shape"
            style="
                        color: #000000;
                        clip-rule: nonzero;
                        display: inline;
                        overflow: visible;
                        visibility: visible;
                        opacity: 1;
                        isolation: auto;
                        mix-blend-mode: normal;
                        color-interpolation: sRGB;
                        color-interpolation-filters: linearRGB;
                        solid-color: #000000;
                        solid-opacity: 1;
                        fill: #000000;
                        fill-opacity: 1;
                        fill-rule: nonzero;
                        stroke: none;
                        stroke-width: 1;
                        stroke-linecap: round;
                        stroke-linejoin: round;
                        stroke-miterlimit: 4;
                        stroke-dasharray: none;
                        stroke-dashoffset: 0;
                        stroke-opacity: 1;
                        marker: none;
                        color-rendering: auto;
                        image-rendering: auto;
                        shape-rendering: auto;
                        text-rendering: auto;
                        enable-background: accumulate;
                    "
            d="m 398.6918923126343,162.9837833500354 64.086486554118,-28.140540570238 33.8918919276587,13.7621621766852 16.0394789538996,24.2318956653775 -1.6611005603475,77.3410774147863 -18.0756756947506,43.2378378834669 -28.9198147266815,44.9987375949686 -37.0371065682204,22.8032381616103 -28.9403761025409,-3.2019756884063 -20.232432453784,-17.3567567750735 9.085587125388,-76.6092057813715 z m -358.31418397551652,-137.13296055968484 -17.57447017550811,9.44083108601672 -5.0835244309321,12.63618929974552 2.82082682070102,29.40188629155239 10.68108108671689,192.46486496641745 6.54170272589693,173.6314493996512 5.47451351947352,10.9253073913546 6.88108108834256,17.3567567750731 7.49729730520906,11.6054054176524 55.56216216107903,26.1891892508572 31.6324324491232,12.1189189253131 116.9180753901024,0 6.2454731517789,-4.1939863623496 48.8018343955559,-21.8591550231587 22.6562389659737,-18.1090208508941 14.7891892047962,-19.616216236917 7.2895868214333,-27.198632072951 9.8765617515254,-39.3610034509317 23.6746994926271,11.1837537480505 39.5753680061631,0 48.8864865122816,-16.2079019844348 38.7714998100294,-45.0848782970904 30.7916334041032,-95.7155026833441 -4.9382805839332,-65.940574220299 -21.9005280056624,-51.761747873824 -32.2753180725566,-24.7816057004984 -61.3895471193979,-11.47244813723215 -24.443243256141,3.69729729924819 -5.4890945123697,-44.22204246462622 -12.4838780583515,-3.68876892729122 -51.1459462057862,-10.62972946303627 -111.4324326701109,-6.9837835039498 -119.7513514145399,0 z"
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
