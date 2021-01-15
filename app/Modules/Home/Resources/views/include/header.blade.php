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
    <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>

     @yield('script')
     
</head>

<body>

@php
    use Illuminate\Support\Facades\Auth;
    $subscriberInfo = Auth::guard('subscriber')->user();
@endphp

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
                                <li class="list-inline-item"><a href="{{ route('khelau')}}">Khelau Juhari</a></li>
                                <li class="list-inline-item"><a href="{{ route('videos')}}">Videos</a></li>
                                <!-- <li class="list-inline-item"><a href="#">Celebrity Bio</a></li> -->
                                <li class="list-inline-item"><a href="#">News</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="d-flex align-items-center justify-content-end">
                         <div class="mg-search">
                        {!! Form::open(['route' => ['videos'], 'method' => 'get']) !!}
                            <input type="text" name="search_val" placeholder="Video Title">
                            <i class="fa fa-search"></i>
                        {!! Form::close() !!}
                        </div>
                    
                    @if($subscriberInfo)
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$subscriberInfo->full_name}}
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" type="button">My Account</button>
                                <a href="{{ route('subscriber-logout')}}" class="dropdown-item" type="button">Logout</a>
                            </div>
                        </div>
                    @else
                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger btn-sm"><i class="fa fa-user"></i> &nbsp;Register | Login</a>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if($message)
                    <div class="alert alert-info alert-dismissible">
                            {{$message}}
                    </div>
                @endif
                <div class="modal-body">
                    {!! Form::open(['route'=>'subscriber-login-post','method'=>'POST','id'=>'subscriber_submit','class'=>'form-horizontal','role'=>'form']) !!}
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                   {!! Form::email('email', $value = null, ['id'=>'email','placeholder'=>'Enter Email Address','class'=>'form-control','required']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <input type="password" placeholder="Enter Password" class="form-control" id="password" name="password" required="required">
                            </div>
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-danger w-50 mr-3" type="submit">Login</button>
                            <a href="{{ route('subscriber-register')}}" class="btn btn-primary w-50">Register</a>
                        </div>

                    {!! Form::close() !!}
                    <hr>
                    <!-- <div class="social-login">
                        <h5 class="mb-3">Social Login:</h5>
                        <ul class="list-unstyled d-flex justify-content-center mb-0">
                            <li><a class="fb" href=""><i class="fab fa-facebook"></i></a></li>
                            <li><a class="google mr-0" href=""><i class="fab fa-google"></i></a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>


@include('alertify::alertify')


<style type="text/css">
    .alertify-logs{
        z-index: 99999;
    }
</style>