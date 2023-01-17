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
<body style="height:auto;padding-bottom:10rem">
<nav class="navbar navbar-expand bg-success navbar-success">
    <a class="navbar-brand" href="{{ url("/") }}">
        <img src="{{asset('logo/B2GSOFT.png')}}" alt="logo" style="width:200px;">
    </a>
</nav>
<nav class="bottom-bar" style="z-index:100">
    <ul class="bottom-bar__list">
        <div class="bottom-bar__active-indicator"></div>
        <li class="bottom-bar__link selected" onclick="window.location='{{ url("/") }}'"><span class="material-symbols-outlined"></span>Home</li>
        <li class="bottom-bar__link" onclick="window.location='{{ url("mug") }}'"><span class="material-symbols-outlined"></span>Mug</li>
        <li class="bottom-bar__link" onclick="window.location='{{ url("body-shape") }}'"><span class="material-symbols-outlined"></span>Shape</li>
        <li class="bottom-bar__link"><span class="material-symbols-outlined"></span>About</li>
        <li class="bottom-bar__link"><span class="material-symbols-outlined"></span>Company</li>
    </ul>
</nav>
<br/>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div id="imageDemoContainer">
                <div id="preview"></div>
                <div id="mainImageLoading" class="hide"></div>
                <div id="mainImage"><img id="mainImageTag" src="https://res.cloudinary.com/demo-robert/image/upload/w_700/e_red:0/e_blue:0/e_green:0/l_hanging-shirt-texture,o_0,fl_relative,w_1.0/l_Hanger_qa2diz,fl_relative,w_1.0/Hanging_T-Shirt_v83je9.jpg" data-large-img-url="https://res.cloudinary.com/demo-robert/image/upload/e_red:0/e_blue:0/e_green:0/l_hanging-shirt-texture,o_0,fl_relative,w_1.0/l_Hanger_qa2diz,fl_relative,w_1.0/Hanging_T-Shirt_v83je9.jpg"/></div>
                <div id="imageThumbs">
                    <ul id="thumbs">
                        <li class="active" id="hangingThumb"><img src="https://res.cloudinary.com/demo-robert/image/upload/w_75/e_red:0/e_blue:0/e_green:0/l_hanging-shirt-texture,o_0,fl_relative,w_1.0/l_Hanger_qa2diz,fl_relative,w_1.0/Hanging_T-Shirt_v83je9.jpg" /></li>
                        <li id="layingThumb"><img src="https://res.cloudinary.com/demo-robert/image/upload/w_75/e_red:0/e_blue:0/e_green:0/l_laying-shirt-texture,o_0,fl_relative,w_1.0/laying-shirt_xqstgr.jpg" /></li>
                        <li id="modelThumb"><img src="https://res.cloudinary.com/demo-robert/image/upload/w_75/e_red:0/e_blue:0/e_green:0/u_model2,fl_relative,w_1.0/l_heather_texture,o_0,fl_relative,w_1.0/shirt_only.jpg" /></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="demoInputContainer">
                <div class="inputSelections">
                    <h2>Select a color:</h2>
                    <ul id="colorList" class="swatches">
                        <li class="active" id="ffffff"><img src="//res.cloudinary.com/demo-robert/image/upload/w_30,h_30/l_heather_texture,o_0,w_30,h_30,c_crop/white-bar.jpg" /></li>
                        <li id="47E8D2"><img src="//res.cloudinary.com/demo-robert/image/upload/w_30,h_30/e_replace_color:47E8D2:60:white/l_heather_texture,o_0,w_30,h_30,c_crop/white-bar.jpg" /></li>
                        <li id="DCA381"><img src="//res.cloudinary.com/demo-robert/image/upload/w_30,h_30/e_replace_color:DCA381:60:white/l_heather_texture,o_0,w_30,h_30,c_crop/white-bar.jpg" /></li>
                        <li id="702C3C"><img src="//res.cloudinary.com/demo-robert/image/upload/w_30,h_30/e_replace_color:702C3C:60:white/l_heather_texture,o_0,w_30,h_30,c_crop/white-bar.jpg" /></li>
                        <li id="E9C660"><img src="//res.cloudinary.com/demo-robert/image/upload/w_30,h_30/e_replace_color:E9C660:60:white/l_heather_texture,o_0,w_30,h_30,c_crop/white-bar.jpg" /></li>
                        <li id="A11D1F"><img src="//res.cloudinary.com/demo-robert/image/upload/w_30,h_30/e_replace_color:A11D1F:60:white/l_heather_texture,o_0,w_30,h_30,c_crop/white-bar.jpg" /></li>
                        <li id="897115"><img src="//res.cloudinary.com/demo-robert/image/upload/w_30,h_30/e_replace_color:897115:60:white/l_heather_texture,o_0,w_30,h_30,c_crop/white-bar.jpg" /></li>
                        <li id="598DE6"><img src="//res.cloudinary.com/demo-robert/image/upload/w_30,h_30/e_replace_color:598DE6:60:white/l_heather_texture,o_0,w_30,h_30,c_crop/white-bar.jpg" /></li>
                    </ul>
                    <p><a href="#" onclick="addColor()">Add a custom color</a></p>
                    <input type='text' id="full"/>
                </div>
                <div class="inputSelections">
                    <h2>Select a texture:</h2>
                    <ul id="texture" class="swatches">
                        <li id="flat" class="active"><img src="//res.cloudinary.com/demo-robert/image/upload/w_30,h_30,e_red:0/e_green:0/e_blue:0/l_heather_texture,o_0,w_30,h_30,c_crop/white-bar.jpg" /></li>
                        <li id="heatherTexture"><img src="//res.cloudinary.com/demo-robert/image/upload/w_30,h_30,e_red:0/e_green:0/e_blue:0/l_heather_texture,o_30,w_30,h_30,c_crop/white-bar.jpg" /></li>
                    </ul>
                </div>
                <div class="inputSelections">
                    <h2>Add a logo:</h2>
                    <ul id="logo-list" class="swatches">
                        <li id="cloudinary-logo"><img src="//res.cloudinary.com/demo-robert/image/upload/q_auto,f_auto,h_30/cloudinary-logo.jpg" /></li>
                        <li id="fire"><img src="//res.cloudinary.com/demo-robert/image/upload/q_auto,f_auto,h_30/fire.png" /></li>
                    </ul>
                    <p><a href="#" id="add_a_logo">Add a Custom Logo</a></p>
                </div>
                <div class="inputSelections">
                    <h2>Add text:</h2>
                    <select id="fontList" class="form-control">
                        <option value="Arial">Arial</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Sacramento">Sacramento</option>
                        <option value="Roboto">Roboto</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Bitter">Bitter</option>
                    </select>
                    <div id="textInputContainer">
                        <input type="text" class="form-control" id="shirtText" />
                        <input type="button" id="addText" value="Add Text" />
                    </div>
                </div>
            </div>
        </div>
        <br/>
    </div>
</div>
<script src="{{asset('js/designPattern.js')}}" type="text/javascript"></script>
</body>
</html>
