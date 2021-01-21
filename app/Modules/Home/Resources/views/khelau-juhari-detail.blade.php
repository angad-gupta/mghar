@extends('home::layouts.master')
@section('title')Khelau Juhari Video Detail @stop
@section('content')

 @php 
    $coverimage = ($khelau_detail->kj_cover_image) ? asset($khelau_detail->file_full_path).'/'.$khelau_detail->kj_cover_image : asset('admin/default.png');
@endphp

    <div class="page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="video-block">
                        <div class="video-iframe">
                            <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/{{$khelau_detail->kj_embeded_url}}" style="position:absolute;top:0;left:0;" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
                        </div>
                        <div class="video-content mt-4">
                            <h4>{{ $khelau_detail->kj_title }}</h4>
                            <div class="d-flex justify-content-between">
                                <div class="entry-meta">
                                    <span class="mr-4"><i class="fa fa-user icon"></i>&nbsp;Sugam Pokheral</span>
                                    <span class="mr-4"><i class="fa fa-eye icon"></i>&nbsp;{{ $khelau_detail->created_at->diffForHumans() }}</span>
                                    <span><i class="fa fa-clock icon"></i>&nbsp;5 minutes ago</span>
                                </div>
                            </div>
                            <hr>
                            <div class="video-desc">
                                <p>Published Date : {{ date('Y-m-d',strtotime($khelau_detail->created_at))}}</p>
                                   {!! $khelau_detail->description !!}
                                <!-- <a class="show-more" href="">Show More</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Manoranjan Ghar -->
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-6368505889757007"
         data-ad-slot="4403420886"
         data-ad-format="auto"
         data-full-width-responsive="true"></ins>
    <script>
         (adsbygoogle = window.adsbygoogle || []).push({});
    </script>


    <div class="featured-post-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-post">
                        <div class="row">
                            <div class="col-12">
                                <div class="main-title">
                                    <h4 class="mb-0">Related Videos</h4>
                                    <a class="view-all" href="#"><i class="fa fa-list"></i> View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="owl-carousel owl-theme latest">

                                    @if(sizeof($related_videos) > 0)
                                        @foreach($related_videos as $key => $val)
                                        @php 
                                            $raimages = ($val->kj_cover_image) ? asset($val->file_full_path).'/'.$val->kj_cover_image : asset('admin/default.png');
                                        @endphp
                                        <div class="item">
                                            <a href="{{ route('khelaujuhari-detail',['juhari_id'=>$val->id]) }}" class="featured-post-small">
                                                <div class="featured-post-small-img">
                                                    <img src="{{$raimages}}" alt="">
                                                    <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                                </div>
                                            </a>
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


    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Manoranjan Ghar -->
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-6368505889757007"
         data-ad-slot="4403420886"
         data-ad-format="auto"
         data-full-width-responsive="true"></ins>
    <script>
         (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    
@stop