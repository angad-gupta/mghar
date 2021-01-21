@extends('home::layouts.master')
@section('title')Khelau Juhari Video List @stop
@section('content')

<div class="featured-post-block mt-4">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="featured-post">
                <div class="row">
                    <div class="col-12">
                        <div class="main-title">
                            <h3 class="mb-0">Khelau Juhari</h3>
                                
                        </div>
                    </div>
                </div>
                <div class="row">

                    @if($khelaujuhari_info->total() != 0) 
                    @foreach($khelaujuhari_info as $key => $value)
                    @php 
                        $coverimages = ($value->kj_cover_image) ? asset($value->file_full_path).'/'.$value->kj_cover_image : asset('admin/default.png');
                    @endphp
                    <div class="col-lg-2">
                            <div class="featured-post-small-img">

                                <div class="featured-post-small">
                                    
                                    <a href="{{ route('khelaujuhari-detail',['juhari_id'=>$value->id]) }}" class="featured-post-small-img">
                                        <img src="{{$coverimages}}" alt="">
                                        <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                    </a>
                                     @php
                                        $videoTitle = (strlen($value->kj_title) >= 60) ? substr($value->kj_title,0,56).'...' : $value->kj_title;
                                        @endphp
                                    <div class="featured-post_content">
                                        <a href="{{ route('khelaujuhari-detail',['juhari_id'=>$value->id]) }}"><h5>{{ $videoTitle }}</h5></a>
                                        <span class="posted-time"><i class="fa fa-clock icon"></i>{{ $value->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>

                            </div>

                    </div>
                    
                    @endforeach
                    @else
                    <span>No Khelau Juhari Added</span>
                    @endif

                </div>

                 <span style="margin: 5px;float: right;">
                    @if($khelaujuhari_info->total() != 0)
                        {{ $khelaujuhari_info->links() }}
                    @endif
            </span>

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

@include('home::include.footer')

<script type="text/javascript">
    $(document).ready(function(){

        $('#genre_select_video').on('change',function(){
            $('#searchGenreSubmit').submit();
        });
    });
</script>

@stop