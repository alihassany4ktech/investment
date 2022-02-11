<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
     <?php
            $setting = App\Models\Setting::where('id','=',1)->first();
        ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | {{$setting->company_name}}</title>
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/sold/dist/css/style.css')}}">
	<script src="https://unpkg.com/animejs@3.0.1/lib/anime.min.js"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    
</head>
<body class="is-boxed has-animations">
    <div class="body-wrap site-header">
        <main>
            <section class="hero">
                <div class="container">
                    <div class="hero-inner">
						<div class="hero-copy">
                             <h1 class="mb-3">
							<a href="{{route('index')}}">
								<img class="header-logo-image" src="{{asset('assets/sold/dist/images/logo.svg')}}" alt="Logo">
                            </a>
                        </h1>
	                        <p class="hero-paragraph" style="color: black">We offer Partnership Plans for Non-Expert traders and investors, 100% earning with 0% loss short term plan opportunity for everyone. We Registered in US, UK, China, India & Pakistan
                                </p>
	                        <div class="hero-cta"><a class="button button-primary" href="{{ route('user.login') }}">Sign In</a><a class="button" href="{{ route('user.register') }}">Sign Up</a></div>
						</div>
						<div class="hero-figure anime-element">
							<svg class="placeholder" width="528" height="396" viewBox="0 0 528 396">
								<rect width="528" height="396" style="fill:transparent;" />
							</svg>
							<div class="hero-figure-box hero-figure-box-01" data-rotation="45deg"></div>
							<div class="hero-figure-box hero-figure-box-02" data-rotation="-45deg"></div>
							<div class="hero-figure-box hero-figure-box-03" data-rotation="0deg"></div>
							<div class="hero-figure-box hero-figure-box-04" data-rotation="-135deg"></div>
							<div class="hero-figure-box hero-figure-box-05"></div>
							<div class="hero-figure-box hero-figure-box-06"></div>
							<div class="hero-figure-box hero-figure-box-08" data-rotation="-22deg"></div>
							<div class="hero-figure-box hero-figure-box-09" data-rotation="-52deg"></div>
							<div class="hero-figure-box hero-figure-box-10" data-rotation="-50deg"></div>
						</div>
                    </div>
                </div>
            </section>
        </main>

        <small class="text-center" style="color: black">&copy; {{$setting->company_name}}, all rights reserved &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  <a href="{{route('contactUs')}}" style="text-decoration: none; color:black">Contact Us</a></small>
    </div>
    <script src="{{asset('assets/sold/dist/js/main.min.js')}}"></script>
</body>
</html>
