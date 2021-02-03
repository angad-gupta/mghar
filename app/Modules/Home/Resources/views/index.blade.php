@extends('home::layouts.master')
@section('title')Manoranjan Ghar @stop
@section('content')

    <div class="banner-slider">
        <div class="container-fluid">
            <div class="owl-carousel owl-theme banner">

            @if($banner_info->total() != 0) 
            @foreach($banner_info as $key => $value)
            @php 
                $bannerImg = ($value->banner_image) ? asset($value->file_full_path).'/'.$value->banner_image : asset('admin/default.png');
            @endphp


                <div class="item">
                    <a href="{{ route('videos') }}" class="sy-banner sy-bg sy-bg--overlay sy-bg--overlay-dark text-white"
                       style="background-image: url({{ $bannerImg }});">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="sy-banner-info">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            @endforeach
            @endif
   
            </div>
        </div>
    </div>


    <div class="featured-post-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-post">
                        <div class="row">
                            <div class="col-12">
                                <div class="main-title">
                                    <h4 class="mb-0">Latest Videos</h4>
                                    <a class="view-all" href="{{ route('videos') }}"><i class="fa fa-list"></i> View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="owl-carousel owl-theme latest">

	
									@if($latest_videos->total() != 0) 
						                @foreach($latest_videos as $key => $value)
						                @php 
						                	$pimages = ($value->video_cover_image) ? asset($value->file_full_path).'/'.$value->video_cover_image : asset('admin/default.png');
						                @endphp

                                              <div class="item">
                                            <div class="featured-post-small">
                                                <a href="{{ route('video-detail',['video_id'=>$value->id]) }}" class="featured-post-small-img">
                                                    <img src="{{$pimages}}" alt="">
                                                    <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                                </a>
                                                 @php
                                                    $videoTitle = (strlen($value->video_title) >= 60) ? substr($value->video_title,0,56).'...' : $value->video_title;
                                                    @endphp
                                                <div class="featured-post_content">
                                                    <a href="{{ route('video-detail',['video_id'=>$value->id]) }}"><h5>{{ $videoTitle }}</h5></a>
                                                    <span class="posted-time"><i class="fa fa-clock icon"></i>{{ $value->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        
		                               	@endforeach
					                @else
					                <span>No Latest Video Added</span>
					                @endif


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="featured-post-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-post">
                        <div class="row">
                            <div class="col-12">
                                <div class="main-title">
                                    <h4 class="mb-0">Popular Videos</h4>
                                    <a class="view-all" href="{{ route('videos',['video_type'=>'is_popular']) }}"><i class="fa fa-list"></i> View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="owl-carousel owl-theme latest">

                                	@if($popular_videos->total() != 0) 
						                @foreach($popular_videos as $key => $value)
						                @php 
						                	$pimages = ($value->video_cover_image) ? asset($value->file_full_path).'/'.$value->video_cover_image : asset('admin/default.png');
						                @endphp
                                        <div class="item">
                                            <div class="featured-post-small">
                                                <a href="{{ route('video-detail',['video_id'=>$value->id]) }}" class="featured-post-small-img">
                                                    <img src="{{$pimages}}" alt="">
                                                    <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                                </a>
                                                 @php
                                                    $videoTitle = (strlen($value->video_title) >= 60) ? substr($value->video_title,0,56).'...' : $value->video_title;
                                                    @endphp
                                                <div class="featured-post_content">
                                                    <a href="{{ route('video-detail',['video_id'=>$value->id]) }}"><h5>{{ $videoTitle }}</h5></a>
                                                    <span class="posted-time"><i class="fa fa-clock icon"></i>{{ $value->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </div>

		                               	@endforeach
					                @else
					                <span>No Popular Video Added</span>
					                @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="featured-post-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-post">
                        <div class="row">
                            <div class="col-12">
                                <div class="main-title">
                                    <h4 class="mb-0">New on Manoranjan Ghar</h4>
                                    <a class="view-all" href="category.php"><i class="fa fa-list"></i> View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="owl-carousel owl-theme latest">
                                    <div class="item">
                                        <a href="{{ route('videos')}}" class="featured-post-big">
                                            <div class="featured-post-big-img">
                                                <img src="{{asset('home/images/v-img7.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="{{ route('videos')}}" class="featured-post-big">
                                            <div class="featured-post-big-img">
                                                <img src="{{asset('home/images/v-img1.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="{{ route('videos')}}" class="featured-post-big">
                                            <div class="featured-post-big-img">
                                                <img src="{{asset('home/images/v-img2.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="{{ route('videos')}}" class="featured-post-big">
                                            <div class="featured-post-big-img">
                                                <img src="{{asset('home/images/v-img3.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="{{ route('videos')}}" class="featured-post-big">
                                            <div class="featured-post-big-img">
                                                <img src="{{asset('home/images/v-img4.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="{{ route('videos')}}" class="featured-post-big">
                                            <div class="featured-post-big-img">
                                                <img src="{{asset('home/images/v-img5.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="{{ route('videos')}}" class="featured-post-big">
                                            <div class="featured-post-big-img">
                                                <img src="{{asset('home/images/v-img6.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="featured-post-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-post">
                        <div class="row">
                            <div class="col-12">
                                <div class="main-title">
                                    <h4 class="mb-0">Trending Videos</h4>
                                    <a class="view-all" href="{{ route('videos',['video_type'=>'is_trending']) }}"><i class="fa fa-list"></i> View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="owl-carousel owl-theme latest">

                                	@if($trending_videos->total() != 0) 
						                @foreach($trending_videos as $key => $value)
						                @php 
						                	$pimages = ($value->video_cover_image) ? asset($value->file_full_path).'/'.$value->video_cover_image : asset('admin/default.png');
						                @endphp
		                                    <div class="item">
		                                        <a href="{{ route('video-detail',['video_id'=>$value->id]) }}" class="featured-post-small">
		                                            <div class="featured-post-small-img">
		                                                <img src="{{$pimages}}" alt="Video Image">
		                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
		                                            </div>
		                                        </a>
		                                    </div>
		                               	@endforeach
					                @else
					                <span>No Trending Video Added</span>
					                @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!--   <div class="featured-post-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-post">
                        <div class="row">
                            <div class="col-12">
                                <div class="main-title">
                                    <h4 class="mb-0">Videos Recommend for You</h4>
                                    <a class="view-all" href="#"><i class="fa fa-list"></i> View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="owl-carousel owl-theme latest">
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img16.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img17.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img18.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img19.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img20.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img6.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

<!--     <div class="featured-post-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-post">
                        <div class="row">
                            <div class="col-12">
                                <div class="main-title">
                                    <h4 class="mb-0">Latest News/Blog</h4>
                                    <a class="view-all" href="category.php"><i class="fa fa-list"></i> View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            @if($blog_info->total() != 0) 
                            @foreach($blog_info as $key => $value)
                            @php 
                                $blogimages = ($value->blog_image) ? asset($value->file_full_path).'/'.$value->blog_image : asset('admin/default.png');
                            @endphp
                            <div class="col d-flex">
                                <div class="featured-post-small">
                                    <div class="featured-post-small-img">
                                        <img src="{{$blogimages}}" alt="">
                                    </div>
                                    <div class="featured-post_content">
                                        <a href="{{ route('blog-detail',['blog_id'=>$value->id]) }}"><h5>{{ $value->title }}</h5></a>
                                        <span class="posted-time"><i class="fa fa-clock icon"></i> {{ $value->created_at->diffForHumans() }}</span>
                                        <p class="mb-0 pt-1">{!! $value->sub_content !!}</p>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            @else
                            <span>No News/Blog Added</span>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 -->

@stop