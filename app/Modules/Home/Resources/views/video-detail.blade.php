@extends('home::layouts.master')
@section('title')Manoranjan Video Detail @stop

@php
$coverimage = ($video_detail->video_cover_image) ?
asset($video_detail->file_full_path).'/'.$video_detail->video_cover_image : asset('admin/default.png');
@endphp


@section('share_head')

<meta property="og:url" content="{{ route('video-detail',['video_id'=>$video_detail->id]) }}" />
<meta property="og:type" content="Manoranjan Ghar Website" />
<meta property="og:title" content="{{ $video_detail->video_title }}" />
<meta property="og:description" content="{{ $video_detail->video_title }}" />
<meta property="og:image" content="{{ $coverimage }}" />
@stop
@section('content')

<div class="page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="video-block">
                    <div class="video-iframe">
                        <video id="video_vimeo_player" class="video-js vjs-default-skin vjs-fluid" controls
                            preload="auto"
                            data-setup='{"techOrder": ["vimeo"], "sources": [{ "type": "video/vimeo", "src":"{{$video_detail->video_embeded_url}}"}], "vimeo": { "color": "#fbc51b"} }'>
                            <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser that
                                <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                    video</a>
                            </p>
                        </video>
                    </div>

                    <br>
                    @if(!is_null($Above_Video_Detail))
                        <div class="full-width mb-4">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        @php  
                                        $adsImage = ($Above_Video_Detail->ads_image) ? asset($Above_Video_Detail->file_full_path).'/'.$Above_Video_Detail->ads_image :
                                        asset('admin/default.png');
                                        @endphp
                                        <a target="_blank" href="{{ $Above_Video_Detail->ads_url }}"><img src="{{$adsImage}}" alt="{{ $Above_Video_Detail->ads_title }}"></a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                    <div class="video-content mt-4">
                        <h4>{{ $video_detail->video_title }}</h4>
                        <div class="viewShare">
                            <div class="entry-meta">
                                <span class="mr-4"><i
                                        class="fa fa-user icon"></i>&nbsp;{{ optional($video_detail->Celebrity)->first_name .' '.optional($video_detail->Celebrity)->last_name }}</span>
                                <span class="mr-4"><i class="fa fa-eye icon"></i>&nbsp;{{ $video_detail->total_views }}
                                    views</span>
                                <span><i
                                        class="fa fa-clock icon"></i>&nbsp;{{ $video_detail->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="video-share d-flex align-items-center">
                                <div class="sharethis-inline-share-buttons"></div>
                            </div>

                        </div>
                        <hr>
                        <div class="descWrapper">
                            <div class="video-desc">
                            
                            {!! $video_detail->description !!}
                            </div>
                            
                        </div>
                        <a href="javascript:void(0);" class="showmore">Show More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(!is_null($Below_Video_Detail))
    <div class="full-width mb-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @php  
                    $adsImage = ($Below_Video_Detail->ads_image) ? asset($Below_Video_Detail->file_full_path).'/'.$Below_Video_Detail->ads_image :
                    asset('admin/default.png');
                    @endphp
                    <a target="_blank" href="{{ $Below_Video_Detail->ads_url }}"><img src="{{$adsImage}}" alt="{{ $Below_Video_Detail->ads_title }}"></a>
                    
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
                                            <a href="{{ route('video-detail',['video_id'=>$value->id]) }}"
                                                class="featured-post-small-img">
                                                <img src="{{$coverimages}}" alt="">
                                                <a href="{{ route('add-to-wishlist',['video_id'=>$value->id]) }}"
                                                    class="add-watchlist" data-toggle="tooltip" data-placement="top"
                                                    title="Add to my Wishlist"><i class="fas fa-plus"></i></a>
                                            </a>
                                            <div class="featured-post_content">
                                                <a href="{{ route('video-detail',['video_id'=>$value->id]) }}">
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

@if(!is_null($Below_Trending_Video_Detail))
    <div class="full-width mb-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @php  
                    $adsImage = ($Below_Trending_Video_Detail->ads_image) ? asset($Below_Trending_Video_Detail->file_full_path).'/'.$Below_Trending_Video_Detail->ads_image :
                    asset('admin/default.png');
                    @endphp
                    <a target="_blank" href="{{ $Below_Trending_Video_Detail->ads_url }}"><img src="{{$adsImage}}" alt="{{ $Below_Trending_Video_Detail->ads_title }}"></a>
                    
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
                                            <a href="{{ route('video-detail',['video_id'=>$value->id]) }}"
                                                class="featured-post-small-img">
                                                <img src="{{$coverimages}}" alt="">
                                                <a href="{{ route('add-to-wishlist',['video_id'=>$value->id]) }}"
                                                    class="add-watchlist" data-toggle="tooltip" data-placement="top"
                                                    title="Add to my Wishlist"><i class="fas fa-plus"></i></a>
                                            </a>
                                            <div class="featured-post_content">
                                                <a href="{{ route('video-detail',['video_id'=>$value->id]) }}">
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

@if(!is_null($Below_Popular_Video_Detail))
    <div class="full-width mb-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @php  
                    $adsImage = ($Below_Popular_Video_Detail->ads_image) ? asset($Below_Popular_Video_Detail->file_full_path).'/'.$Below_Popular_Video_Detail->ads_image :
                    asset('admin/default.png');
                    @endphp
                    <a target="_blank" href="{{ $Below_Popular_Video_Detail->ads_url }}"><img src="{{$adsImage}}" alt="{{ $Below_Popular_Video_Detail->ads_title }}"></a>
                    
                </div>
            </div>
        </div>
    </div>
@endif

<script type="text/javascript">
    (function($) {
        $(this).bind("contextmenu", function(e) {
            e.preventDefault();
        });

      $('.js-share-twitter-link').click(function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        window.open(href, "Twitter", "height=285,width=550,resizable=1");
      });
      $('.js-share-facebook-link').click(function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        window.open(href, "Facebook", "height=269,width=550,resizable=1");
      });

    //   var player = videojs('video_vimeo_player', {
    //     sourceOrder: true,
    //     sources: [{
    //         src: "{{$video_detail->video_embeded_url}}",
    //         type: "video/vimeo"
    //     }],
    //     techOrder: ["vimeo"],
    //     });
    // console.log(player)

    $(".showmore").click(function(){
        if($(this).hasClass('showless')){
            $('.descWrapper').animate({'height':70},200);
            $(this).text('Show More')
            $(this).removeClass('showless')
        }else{
            $('.descWrapper').animate({'height':$('.video-desc').height()},200);
            $(this).text('Show Less')
            $(this).addClass('showless')
        }
    });


})(jQuery);

</script>

@stop