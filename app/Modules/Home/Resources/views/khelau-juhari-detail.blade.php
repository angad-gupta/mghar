@extends('home::layouts.master')
@section('title')Khelau Juhari Detail @stop

@php 
    $coverimage = ($khelau_detail->kj_cover_image) ? asset($khelau_detail->file_full_path).'/'.$khelau_detail->kj_cover_image : asset('admin/default.png');
@endphp


@section('share_head')

<meta property="og:url"           content="{{ route('video-detail',['juhari_id'=>$khelau_detail->id]) }}" />
<meta property="og:type"          content="Manoranjan Ghar Website" />
<meta property="og:title"         content="{{ $khelau_detail->kj_title }}" />
<meta property="og:description"   content="{{ $khelau_detail->description }}" />
<meta property="og:image"         content="{{ $coverimage }}" />
@stop
@section('content')


    <div class="page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="video-block">
                        <div class="video-iframe">
                            <iframe src="https://player.vimeo.com/video/{{$khelau_detail->kj_embeded_url}}" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe><script src="https://player.vimeo.com/api/player.js"></script>
                        </div>
                        <div class="video-content mt-4">
                            <h4>{{ $khelau_detail->kj_title }}</h4>
                            <div class="d-flex justify-content-between">
                                <div class="entry-meta">
                                    
                                    <span class="mr-4"><i class="fa fa-eye icon"></i>&nbsp;{{ $khelau_detail->total_views }} views</span>
                                    <span><i class="fa fa-clock icon"></i>&nbsp;{{ $khelau_detail->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="video-share d-flex align-items-center">
                                    <h6 class="mb-0 mr-1"><i class="fa fa-share"></i>&nbsp;Share:</h6>
                                     <div class="fb-share-button" data-href="{{ route('video-detail',['juhari_id'=>$khelau_detail->id]) }}" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('video-detail',['juhari_id'=>$khelau_detail->id]) }}%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                                   <a href="{{ route('video-detail',['juhari_id'=>$khelau_detail->id]) }}" class="twitter-share-button" data-show-count="false">Tweet</a>
                                </div>
                            </div>
                            <hr>
                            <div class="video-desc">
                                 {!! $khelau_detail->description !!}
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

@stop
