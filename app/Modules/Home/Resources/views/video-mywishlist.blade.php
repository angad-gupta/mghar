@extends('home::layouts.master')
@section('title')My Wishlist @stop
@section('content')


    <div class="featured-post-block mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-post">
                        <div class="row">
                            <div class="col-12">
                                <div class="main-title">
                                    <h3 class="mb-0">My Wishlist</h3>
                                        
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                             @if($wishlist_videos->total() != 0) 
                                @foreach($wishlist_videos as $key => $value)
                                @php 
                                    $myimages = (optional($value->videoInfo)->video_cover_image) ? asset(optional($value->videoInfo)->file_full_path).'/'.optional($value->videoInfo)->video_cover_image : asset('admin/default.png');
                                @endphp

                            <div class="col-lg-4 col-xl-2">
                                <div class="featured-post-small">
                                    <a href="{{ route('video-detail',['video_id'=>optional($value->videoInfo)->id]) }}" class="featured-post-small-img">
                                        <img src="{{$myimages}}" alt="">
                                        <a href="{{ route('remove-from-wishlist',['video_id'=>optional($value->videoInfo)->id]) }}" class="add-watchlist" data-toggle="tooltip" data-placement="top" title="Remove from Wishlist"><i class="fas fa-times"></i></a>
                                    </a>
                                    <div class="featured-post_content">
                                        <a href="{{ route('video-detail',['video_id'=>optional($value->videoInfo)->id]) }}"><h5>{{optional($value->videoInfo)->video_title}}</h5></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <span>No My Wishlist Added</span>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@stop