@php
    use Illuminate\Support\Facades\Auth;
    $subscriberInfo = Auth::guard('subscriber')->user();
@endphp

    <div class="nnc-preloader">
        <div class="nnc-ring">
            <img width="24" src="{{asset('home/images/logo.jpeg')}}" alt="ManoranjanGhar">
        </div>
    </div>

    <header class="header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('home') }}" class="logo">
                            <img src="{{asset('home/images/logo.jpeg')}}" alt="ManoranjanGhar">
                        </a>
                        <div class="nav-bar d-flex ml-4">
                            <ul class="list-unstyled list-inline mb-0">
                                <li class="list-inline-item"><a href="{{ route('home')}}">Home</a></li>
                                <li class="list-inline-item"><a href="{{ route('khelau')}}">Khelau Juhari</a></li>
                                <li class="list-inline-item"><a href="{{ route('videos')}}">Latest</a></li>
                                <li class="list-inline-item"><a href="{{ route('my-wishlist')}}">My WatchList</a></li>
                                <!-- <li class="list-inline-item"><a href="#">Celebrity Bio</a></li> -->
                                <!-- <li class="list-inline-item"><a href="#">News</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>


                  <div class="col-md-8">
                    <div class="d-flex align-items-center justify-content-end">
                         <div class="mg-search">
                        {!! Form::open(['route' => ['videos'], 'method' => 'get']) !!}
                            <input type="text" name="search_val" placeholder="Search Video">
                            <i class="fa fa-search"></i>
                        {!! Form::close() !!}
                        </div>
                    
                    @if($subscriberInfo)
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$subscriberInfo->full_name}}
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{ route('dashboard')}}" class="dropdown-item" type="button">My Account</a>
                                <a href="{{ route('subscriber-logout')}}" class="dropdown-item" type="button">Logout</a>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('subscriber-login')}}" class="btn btn-danger btn-sm"><i class="fa fa-user"></i> Login</a>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </header>



@include('alertify::alertify')


<style type="text/css">
    .alertify-logs{
        z-index: 99999;
    }
</style>