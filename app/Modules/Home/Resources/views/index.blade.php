@extends('home::layouts.master')
@section('title')Manoranjan Ghar @stop
@section('content')

    <div class="banner-slider">
        <div class="owl-carousel owl-theme banner">

            @if($banner_info->total() != 0) 
            @foreach($banner_info as $key => $value)
            @php 
                $bannerImg = ($value->banner_image) ? asset($value->file_full_path).'/'.$value->banner_image : asset('admin/default.png');
            @endphp

            <div class="item">
                @if($value->banner_source == '1')
                    <a target="_blank" href="{{ $value->banner_link }}" class="sy-banner sy-bg sy-bg--overlay sy-bg--overlay-dark text-white"
                   style="background-image: url({{ $bannerImg }});">
                @else
                    <a href="{{ route('video-detail',['video_id'=>$value->video_id]) }}" class="sy-banner sy-bg sy-bg--overlay sy-bg--overlay-dark text-white"
                   style="background-image: url({{ $bannerImg }});">
                @endif

                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="sy-banner-info">
                                    <h2>{{$value->banner_title}}</h2>
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
                                            <a class="view-all" href="{{ route('videos') }}">View All <i class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="owl-carousel owl-theme latest">

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
                                                    <a href="{{ route('video-detail',['video_id'=>$value->id]) }}" class="featured-post-small-img">
                                                        <img src="{{$pimages}}" alt="">
                                                         <a href="{{ route('add-to-wishlist',['video_id'=>$value->id]) }}" class="add-watchlist" data-toggle="tooltip" data-placement="top" title="Add to my Wishlist"><i class="fas fa-plus"></i></a>
                                                    </a>
                                                    <div class="featured-post_content">
                                                        <a href="{{ route('video-detail',['video_id'=>$value->id]) }}"><h5>{{$value->video_title}}</h5></a>
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
                                        $adsImage = ($block->ads_image) ? asset($block->file_full_path).'/'.$block->ads_image : asset('admin/default.png');
                                                @endphp
                                     <a target="_blank" href="{{ $block->ads_url }}"><img src="{{$adsImage}}" alt=""></a>
                                @elseif($block->is_scripted_ads == 'yes')
                                    {{$block->scripted_ads}}
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
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@stop