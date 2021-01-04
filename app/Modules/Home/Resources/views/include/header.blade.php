<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manoranjan Ghar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css">
    <link href="{{asset('home/css/magnific.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet">
</head>

<body>

    <header class="header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('home') }}" class="logo">
                            <img src="{{asset('home/images/logo.jpeg')}}" alt="ManoranjanGhar">
                        </a>
                        <div class="nav-bar d-flex ml-4">
                            <ul class="list-unstyled list-inline mb-0">
                                <li class="list-inline-item"><a href="#">Movies</a></li>
                                <li class="list-inline-item"><a href="#">Videos</a></li>
                                <li class="list-inline-item"><a href="#">Celebrity Bio</a></li>
                                <li class="list-inline-item"><a href="#">News</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="mg-search">
                            <input type="text" placeholder="Title, Genre, People">
                            <i class="fa fa-search"></i>
                        </div>
                        <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-user"></i> &nbsp;Subscribe | Login</a>
                    </div>
                </div>

            </div>
        </div>
    </header>