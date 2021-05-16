@php
use Illuminate\Support\Facades\Auth;
$subscriberInfo = Auth::guard('subscriber')->user();

$currentRoute = Request::route()->getName();
$Route = explode('.',$currentRoute);
@endphp
{{-- 
<div class="nnc-preloader">
    <div class="lds-facebook">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div> --}}


<header class="header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="navholder">
            <nav class="navbar navbar-expand-lg navbar-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand manoranjan" href="{{ route('home')}}"><img src="{{asset('home/images/logo.png')}}" alt="Manoranjan Ghar"></a>
 
               
               
<style>
    .search-box-container {
    position: absolute;
    top: 42px;
    left: 0;
    width: 100%;
    background-color: #333;
    border: 1px solid #333;
    height: 260px;
    overflow: auto;
    z-index: 9;
    padding: 15px;
    display: none;
    border-radius: 5px;
}
.search-box-container a{
    color:white;
}
.search-box-container a:hover{
    color:#54d4e7;
}
</style>                       
 
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
      <a class="@if($Route[0]=='home') active @endif" href="{{ route('home')}}">Home</a>
      </li>
     
      {{-- <li class="nav-item">
        <a class="@if($Route[0]=='khelau') active @endif" href="{{ route('khelau')}}">Khelau Jhuhari</a>
        </li> --}}
        <li class="nav-item">
            <a href="{{ route('videos',['blockId'=>1])}}">Live Dhori</a>
        </li>
      <li class="nav-item">
      <a class="@if($Route[0]=='videos') active @endif" href="{{ route('videos')}}">Latest</a>
      </li>
      <li class="nav-item">
      <a class="@if($Route[0]=='my-wishlist') active @endif" href="{{ route('my-wishlist')}}">My Wishlist</a>
      </li>
    </ul>

    <form class="form-inline my-2 my-lg-0 searchForm">
    <div class="mg-search">
        <input type="text" id="search_val" name="search_val" value="{{$search_val ?? null}}" placeholder="Search..." autocomplete="off">
        <input type="hidden" id="search_url" value="{{ route('videos')}}">
        <a href="javascript:void(0);" id="seach_video"><i class="fa fa-search"></i></a>
            <div class="search-box-container">
                <h6 style="color: #fd8555">Trending Searches</h6>
                @inject('search', '\App\Modules\SearchLog\Repositories\SearchLogRepository')
                @php
                    $most_searched = $search->most_searched();
                @endphp
                <ul class="list-unstyled mb-0">
                    @foreach($most_searched as $ms)
                        <li><a href="{{route('videos',['search_val'=>$ms->keyword])}}" style="text-transform: capitalize;">{{$ms->keyword}}</a></li>
                    @endforeach
                    
                </ul>
            </div>
    </div>
      @if($subscriberInfo)
                        <div class="d-none d-md-block ml-3">
                            <div class="btn-group profile">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <img src="{{asset('home/images/profile.png')}}" alt=""
                                        style="width: 34px; height: 34px; object-fit: contain; border-radius: 3px; margin-right: 6px;">
                                    {{$subscriberInfo->full_name}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('sdashboard')}}"><i
                                            class="fa fa-user"></i>My
                                        Account</a>
                                    <a class="dropdown-item" href="{{ route('subscriber-logout')}}"><i
                                            class="fa fa-sign-out-alt"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                        @else
                            <a href="{{ route('subscriber-login')}}" class="btn btn-danger btn-sm text-uppercase loginBtn"><i
                                class="fa fa-user"></i> Login</a>
                            <a class="btn btn-info subs" href="{{ route('subscription-package')}}">Subscription</a>
                        @endif
    </form>
  </div>
</nav>

            </div>

        </div>
    </div>
</header>

@include('alertify::alertify')


<style type="text/css">
    .alertify-logs {
        z-index: 99999;
        top:auto!important;
        bottom:10px;
    }
</style>

{{-- @section('scripts') --}}
<script>
     $(document).ready(function(){
      $("#search_val").mouseenter(function() {
          $('.search-box-container').show();
      });
      
      $("#search_val, .search-box-container").mouseleave(function() {
        if(!$('.search-box-container').is(':hover')){
          $('.search-box-container').hide();
        };
      });
});
</script>
    {{-- @endsection --}}