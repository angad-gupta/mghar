@extends('home::layouts.master')
@section('title')Manoranjan Ghar @stop
@section('content')



<div class="banner-slider">
    <div class="owl-carousel owl-theme banner">

        @if($banner_info->total() != 0)
        @foreach($banner_info as $key => $value)
        @php
        $bannerImg = ($value->banner_image) ? asset($value->file_full_path).'/'.$value->banner_image :
        asset('admin/default.png');
        @endphp

            <div class="item">
                {{-- sy-bg--overlay-dark  ! Removed !--}}
                @if($value->banner_source == '1')
                <a target="_blank" href="{{ $value->banner_link }}"
                    class="sy-banner sy-bg sy-bg--overlay text-white"
                    style="background-image: url({{ $bannerImg }});">
                    @else
                    <a href="{{ route('video-detail',['video_id'=>$value->video_id]) }}"
                        class="sy-banner sy-bg sy-bg--overlay text-white"
                        style="background-image: url({{ $bannerImg }});">
                        @endif

                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="sy-banner-info">
                                        {{-- <h2>{{$value->banner_title}}</h2> --}}
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

@if(!is_null($Below_Banner))
<div class="full-width mb-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @php  
                $adsImage = ($Below_Banner->ads_image) ? asset($Below_Banner->file_full_path).'/'.$Below_Banner->ads_image :
                asset('admin/default.png');
                @endphp
                <a target="_blank" href="{{ $Below_Banner->ads_url }}"><img src="{{$adsImage}}" alt="{{ $Below_Banner->ads_title }}"></a>
                
            </div>
        </div>
    </div>
</div>
@endif

<div class="featured-post-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="featured-post">
                    <div class="row">
                        <div class="col-12">
                            <div class="main-title">
                                <h4 class="mb-0">Latest Videos</h4>
                                <a class="view-all" href="{{ route('videos') }}">View All <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="center latest">

                                    @if($latest_videos->total() != 0)
                                    @foreach($latest_videos as $key => $value)
                                    @php 
                                    $coverimages = ($value->video_cover_image) ? asset($value->file_full_path).'/'.$value->video_cover_image : asset('admin/default.png');
                                    @endphp
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-2">
                                        <div class="featured-post-small">
                                            <a href="{{ route('video-detail',['video_id'=>$value->id,'category'=>'latest']) }}" class="featured-post-small-img">
                                                <img src="{{$coverimages}}" alt="">
                                                <a href="{{ route('add-to-wishlist',['video_id'=>$value->id]) }}" class="add-watchlist" data-toggle="tooltip" data-placement="top" title="Add to my Wishlist"><i class="fas fa-plus"></i></a>
                                            </a> 

                                            <div class="featured-post_content">
                                                <a href="{{ route('video-detail',['video_id'=>$value->id,'category'=>'latest']) }}">
                                                    <h5>{{$value->video_title}}</h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(!is_null($Below_Latest_Video))
<div class="full-width mb-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @php  
                $adsImage = ($Below_Latest_Video->ads_image) ? asset($Below_Latest_Video->file_full_path).'/'.$Below_Latest_Video->ads_image :
                asset('admin/default.png');
                @endphp
                <a target="_blank" href="{{ $Below_Latest_Video->ads_url }}"><img src="{{$adsImage}}" alt="{{ $Below_Latest_Video->ads_title }}"></a>
                
            </div>
        </div>
    </div>
</div>
@endif

<div class="featured-post-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="featured-post">
                    <div class="row">
                        <div class="col-12">
                            <div class="main-title">
                                <h4 class="mb-0">Trending Videos</h4>
                                <a class="view-all" href="{{ route('videos') }}">View All <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="center latest">

                                @if(sizeof($trending_videos) > 0)
                                @foreach($trending_videos as $key => $value)
                                    @php
                                    $coverimages = ($value->video_cover_image) ? asset($value->file_full_path).'/'.$value->video_cover_image : asset('admin/default.png');
                                    @endphp
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-2">
                                        <div class="featured-post-small">
                                            <a href="{{ route('video-detail',['video_id'=>$value->id,'category'=>'trending']) }}"
                                                class="featured-post-small-img">
                                                <img src="{{$coverimages}}" alt="">
                                                <a href="{{ route('add-to-wishlist',['video_id'=>$value->id]) }}"
                                                    class="add-watchlist" data-toggle="tooltip" data-placement="top"
                                                    title="Add to my Wishlist"><i class="fas fa-plus"></i></a>
                                            </a>
                                            {{-- <span class="badge badge-warning" style="position: absolute;top:5px;left:5px;">#{{$trending_videos->firstItem() +$key}}</span> --}}
                                            <div class="featured-post_content">
                                                <a href="{{ route('video-detail',['video_id'=>$value->id,'category'=>'trending']) }}">
                                                    <h5>{{$value->video_title}}</h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                   @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(!is_null($Below_Trending_Video))
<div class="full-width mb-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @php  
                $adsImage = ($Below_Trending_Video->ads_image) ? asset($Below_Trending_Video->file_full_path).'/'.$Below_Trending_Video->ads_image :
                asset('admin/default.png');
                @endphp
                <a target="_blank" href="{{ $Below_Trending_Video->ads_url }}"><img src="{{$adsImage}}" alt="{{ $Below_Trending_Video->ads_title }}"></a>
                
            </div>
        </div>
    </div>
</div>
@endif

<div class="featured-post-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="featured-post">
                    <div class="row">
                        <div class="col-12">
                            <div class="main-title">
                                <h4 class="mb-0">Most Popular Videos</h4>
                                <a class="view-all" href="{{ route('videos') }}">View All <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="center latest">

                                @if(sizeof($popular_vidoes) > 0)
                                @foreach($popular_vidoes as $key => $value)
                                    @php
                                    $coverimages = ($value->video_cover_image) ? asset($value->file_full_path).'/'.$value->video_cover_image : asset('admin/default.png');
                                    @endphp
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-2">
                                        <div class="featured-post-small">
                                            <a href="{{ route('video-detail',['video_id'=>$value->id,'category'=>'most_popular']) }}"
                                                class="featured-post-small-img">
                                                <img src="{{$coverimages}}" alt="">
                                                <a href="{{ route('add-to-wishlist',['video_id'=>$value->id]) }}"
                                                    class="add-watchlist" data-toggle="tooltip" data-placement="top"
                                                    title="Add to my Wishlist"><i class="fas fa-plus"></i></a>
                                            </a>
                                            <div class="featured-post_content">
                                                <a href="{{ route('video-detail',['video_id'=>$value->id,'category'=>'most_popular']) }}">
                                                    <h5>{{$value->video_title}}</h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                   @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(!is_null($Below_Popular_Video))
<div class="full-width mb-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @php  
                $adsImage = ($Below_Popular_Video->ads_image) ? asset($Below_Popular_Video->file_full_path).'/'.$Below_Popular_Video->ads_image :
                asset('admin/default.png');
                @endphp
                <a target="_blank" href="{{ $Below_Popular_Video->ads_url }}"><img src="{{$adsImage}}" alt="{{ $Below_Popular_Video->ads_title }}"></a>
                
            </div>
        </div>
    </div>
</div>
@endif


@if($dynamic_block->total() != 0)
@foreach($dynamic_block as $key => $block)
<div class="featured-post-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="featured-post">
                    <div class="row">
                        <div class="col-12">
                            <div class="main-title">
                                <h4 class="mb-0">{{$block->block_section}}</h4>
                                <a class="view-all" href="{{ route('videos',['blockId'=>$block->id]) }}">View All <i
                                        class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="center latest">
                                {{-- <div class="owl-carousel owl-theme latest"> --}}

                                @inject('video', '\App\Modules\Video\Repositories\VideoRepository')
                                @php
                                $videoBySection = $video->getAllBySection($block->id);
                                @endphp

                                @if($videoBySection->total() != 0)
                                @foreach($videoBySection as $key => $value)
                                @php
                                $pimages = ($value->video_cover_image) ? asset($value->file_full_path).'/'.$value->video_cover_image : asset('admin/default.png');
                                @endphp

                                <div class="item">
                                    <div class="featured-post-small">
                                        <a href="{{ route('video-detail',['video_id'=>$value->id,'category'=>$value->display_block_section]) }}"
                                            class="featured-post-small-img">
                                            <img src="{{$pimages}}" alt="">
                                            <a href="{{ route('add-to-wishlist',['video_id'=>$value->id]) }}"
                                                class="add-watchlist" data-toggle="tooltip" data-placement="top"
                                                title="Add to my Wishlist"><i class="fas fa-plus"></i></a>
                                        </a>
                                        <div class="featured-post_content">
                                            <a href="{{ route('video-detail',['video_id'=>$value->id,'category'=>$value->display_block_section]) }}">
                                                <h5>{{$value->video_title}}</h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <span>No Video Added</span>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="full-width mb-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if($block->is_scripted_ads == 'no')
                @php
                $adsImage = ($block->ads_image) ? asset($block->file_full_path).'/'.$block->ads_image :
                asset('admin/default.png');
                @endphp
                <a target="_blank" href="{{ $block->ads_url }}"><img src="{{$adsImage}}" alt="{{ $block->ads_title }}"></a>
                @elseif($block->is_scripted_ads == 'yes')
                {!!$block->scripted_ads !!}
                @endif
            </div>
        </div>
    </div>
</div>

@endforeach
@endif



@if($blog_info->total() != 0)
<div class="featured-post-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="featured-post">
                    <div class="row">
                        <div class="col-12">
                            <div class="main-title">
                                <h4 class="mb-0">Latest News/Blog</h4>
                                <a class="view-all" href="#"><i class="fa fa-list"></i> View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">


                        @foreach($blog_info as $key => $value)
                        @php
                        $blogimages = ($value->blog_image) ? asset($value->file_full_path).'/'.$value->blog_image :
                        asset('admin/default.png');
                        @endphp
                        <div class="flexitem">
                            <div class="featured-post-small">
                                <div class="featured-post-small-img">
                                    <img src="{{$blogimages}}" alt="">
                                </div>
                                <div class="featured-post_content">
                                    <a href="{{ route('blog-detail',['blog_id'=>$value->id]) }}">
                                        <h5>{{ $value->title }}</h5>
                                    </a>
                                    <span class="posted-time"><i class="fa fa-clock icon"></i>
                                        {{ $value->created_at->diffForHumans() }}</span>
                                    <p class="mb-0 pt-1">{!! $value->sub_content !!}</p>
                                </div>
                            </div>
                        </div>

                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@stop