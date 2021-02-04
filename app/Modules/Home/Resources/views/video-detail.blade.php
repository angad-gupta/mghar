@extends('home::layouts.master')
@section('title')Manoranjan Video Detail @stop

@php 
    $coverimage = ($video_detail->video_cover_image) ? asset($video_detail->file_full_path).'/'.$video_detail->video_cover_image : asset('admin/default.png');
@endphp


@section('share_head')

<meta property="og:url"           content="{{ route('video-detail',['video_id'=>$video_detail->id]) }}" />
<meta property="og:type"          content="Manoranjan Ghar Website" />
<meta property="og:title"         content="{{ $video_detail->video_title }}" />
<meta property="og:description"   content="{{ $video_detail->video_title }}" />
<meta property="og:image"         content="{{ $coverimage }}" />
@stop
@section('content')


    <div class="page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="video-block">
                        <div class="video-iframe">
                            <iframe src="https://player.vimeo.com/video/{{$video_detail->video_embeded_url}}" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe><script src="https://player.vimeo.com/api/player.js"></script>
                        </div>
                        <div class="video-content mt-4">
                            <h4>{{ $video_detail->video_title }}</h4>
                            <div class="d-flex justify-content-between">
                                <div class="entry-meta">
                                    <span class="mr-4"><i class="fa fa-user icon"></i>&nbsp;{{ optional($video_detail->Celebrity)->first_name .' '.optional($video_detail->Celebrity)->last_name }}</span>
                                    <span class="mr-4"><i class="fa fa-eye icon"></i>&nbsp;{{ $video_detail->total_views }} views</span>
                                    <span><i class="fa fa-clock icon"></i>&nbsp;{{ $video_detail->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="video-share d-flex align-items-center">
                                    <h6 class="mb-0 mr-1"><i class="fa fa-share"></i>&nbsp;Share:</h6>
                                     <div class="fb-share-button" data-href="{{ route('video-detail',['video_id'=>$video_detail->id]) }}" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('video-detail',['video_id'=>$video_detail->id]) }}%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                                   <a href="{{ route('video-detail',['video_id'=>$video_detail->id]) }}" class="twitter-share-button" data-show-count="false">Tweet</a>
                                </div>
                            </div>
                            <hr>
                            <div class="video-desc">
                                 {!! $video_detail->description !!}
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
                                        <h4 class="mb-0">Artist Related</h4>
                                        <a class="view-all" href="#">View All <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="owl-carousel owl-theme latest">

                                        @if(sizeof($artist_related) > 0)
                                            @foreach($artist_related as $key => $val)
                                            @php 
                                                $videoInfo = App\Modules\Video\Entities\Video::findByVidId($val->video_id);
                                                $raimages = ($videoInfo->video_cover_image) ? asset($videoInfo->file_full_path).'/'.$videoInfo->video_cover_image : asset('admin/default.png');
                                            @endphp

                                        <div class="item">
                                            <div class="featured-post-small">
                                                <a href="{{ route('video-detail',['video_id'=>$videoInfo->id]) }}" class="featured-post-small-img">
                                                    <img src="{{$raimages}}" alt="">
                                                    <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                                </a>
                                                <div class="featured-post_content">
                                                    <a href="{{ route('video-detail',['video_id'=>$videoInfo->id]) }}"><h5>{{$videoInfo->video_title}}</h5></a>
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

        <div class="full-width mb-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <img src="https://www.onlinekhabar.com/wp-content/uploads/2020/10/1230x100_Online-Khabar-Banner.jpg" alt="">
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
                                        <h4 class="mb-0">Featured Videos</h4>
                                        <a class="view-all" href="{{ route('videos',['video_type'=>'is_featured']) }}">View All <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="owl-carousel owl-theme latest">

                                       @if($featured_videos->total() != 0) 
                                            @foreach($featured_videos as $key => $value)
                                            @php 
                                                $fimages = ($value->video_cover_image) ? asset($value->file_full_path).'/'.$value->video_cover_image : asset('admin/default.png');
                                            @endphp

                                        <div class="item">
                                            <div class="featured-post-small">
                                                <a href="{{ route('video-detail',['video_id'=>$value->id]) }}" class="featured-post-small-img">
                                                    <img src="{{$fimages}}" alt="">
                                                    <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                                </a>
                                                <div class="featured-post_content">
                                                    <a href="{{ route('video-detail',['video_id'=>$value->id]) }}"><h5>{{$value->video_title}}</h5></a>
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

@stop
