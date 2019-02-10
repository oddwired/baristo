@extends('layouts.app')
@section('title', "Home")
@section('csscontent')
    <style>
        h5 {
            display: inline-block;
            padding: 10px;
            background: #B9121B;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .p {
            text-align: center;
            padding-top: 40px;
            font-size: 13px;
        }

        .full-screen {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

    </style>
@endsection
@section('navcontent')
    <li class="nav-item">
        <a class="nav-link" href="#">LOCATIONS</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">MENU</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('about')}}">ABOUT US</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">CONTACT US</a>
    </li>
@endsection
@section('content')


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('img/burger.jpg')}}" data-color="lightblue" alt="First Image">
                <div class="carousel-caption d-md-block">
                    <h5>First Image</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('img/pizza.jpg')}}" data-color="firebrick" alt="Second Image">
                <div class="carousel-caption d-md-block">
                    <h5>Second Image</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('img/chicken.jpg')}}" data-color="violet" alt="Third Image">
                <div class="carousel-caption d-md-block">
                    <h5>Third Image</h5>
                </div>
            </div>
        </div>
        <!-- Controls -->
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


@endsection
@section('jscontent')
    <script>
        var $item = $('.carousel-item');
        var $wHeight = $(window).height();
        $item.eq(0).addClass('active');
        $item.height($wHeight);
        $item.addClass('full-screen');

        $('.carousel img').each(function() {
            var $src = $(this).attr('src');
            var $color = $(this).attr('data-color');
            $(this).parent().css({
                'background-image' : 'url(' + $src + ')',
                'background-color' : $color
            });
            $(this).remove();
        });

        $(window).on('resize', function (){
            $wHeight = $(window).height();
            $item.height($wHeight);
        });

        $('.carousel').carousel({
            interval: 6000,
            pause: "false"
        });
    </script>
@endsection