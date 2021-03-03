@php
    use Illuminate\Support\Facades\Auth;
    $subscriberInfo = Auth::guard('subscriber')->user();

    $currentRoute = Request::route()->getName();
    $Route = explode('.',$currentRoute);
@endphp

    <div class="nnc-preloader">
        <div class="lds-facebook"><div></div><div></div><div></div></div>
    </div>


    <header class="header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('home')}}" class="logo">
                            <img src="{{asset('home/images/logo.png')}}" alt="Manoranjan Ghar">
                        </a>
                        <div class="nav-bar d-flex ml-4">
                            <ul class="list-unstyled list-inline mb-0">
                                 <li class="list-inline-item"><a class="@if($Route[0]=='home') active @endif" href="{{ route('home')}}">Home</a></li>
                                <li class="list-inline-item"><a class="@if($Route[0]=='khelau') active @endif" href="{{ route('khelau')}}">Khelau Juhari</a></li>
                                <li class="list-inline-item"><a class="@if($Route[0]=='videos') active @endif" href="{{ route('videos')}}">Latest</a></li>
                                <li class="list-inline-item"><a class="@if($Route[0]=='my-wishlist') active @endif" href="{{ route('my-wishlist')}}">My Watchlist</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="mg-search">
                            <input type="text" id="search_val" name="search_val" placeholder="Search...">
                            <input type="hidden" id="search_url" value="{{ route('videos')}}">
                            <a href="javascript:void(0);" id="seach_video"><i class="fa fa-search"></i>
                        </div>

                        @if($subscriberInfo)
                        <div class="btn-group profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('home/images/profile.png')}}" alt="" style="width: 34px; height: 34px; object-fit: contain; border-radius: 3px; margin-right: 6px;">
                                 {{$subscriberInfo->full_name}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('sdashboard')}}"><i class="fa fa-user"></i>My Account</a>
                                <a class="dropdown-item" href="{{ route('subscriber-logout')}}"><i class="fa fa-sign-out-alt"></i>Logout</a>
                            </div>
                        </div>
                        @else
                            <a href="{{ route('subscriber-login')}}" class="btn btn-danger btn-sm text-uppercase"><i class="fa fa-user"></i> Login</a>
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


