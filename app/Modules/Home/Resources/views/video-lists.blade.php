@extends('home::layouts.master')
@section('title')Manoranjan Video List @stop
@section('content')

<div class="featured-post-block mt-4">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="featured-post">
                <div class="row">
                    <div class="col-12">
                        <div class="main-title">
                            <h3 class="mb-0">Videos</h3>
                                {!! Form::open(['route' => ['videos'], 'method' => 'get','id'=>'searchGenreSubmit']) !!}
                                <div class="form-group mb-2">
                                    <select class="form-control" name="genre" id="genre_select_video">
                                         <option value="0">--Select Any--</option>
                                        @foreach($genre as $key =>$val)
                                            @php 
                                                $select ="";
                                                if($genre_search){
                                                    if(in_array($key,$genre_search)){ 
                                                        $select = "selected='selected'";
                                                    }   
                                                }
                                            @endphp
                                            <option value="{{$key}}" {{$select}}>{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="row">

                    @if($videos->total() != 0) 
                    @foreach($videos as $key => $value)
                    @php 
                        $coverimages = ($value->video_cover_image) ? asset($value->file_full_path).'/'.$value->video_cover_image : asset('admin/default.png');
                    @endphp
                    <div class="col-lg-2">
                            <div class="featured-post-small-img">

                                <div class="featured-post-small">
                                    
                                    <a href="{{ route('video-detail',['video_id'=>$value->id]) }}" class="featured-post-small-img">
                                        <img src="{{$coverimages}}" alt="">
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

                    </div>
                    @endforeach
                    @else
                    <span>No Videos Added</span>
                    @endif

                </div>

                 <span style="margin: 5px;float: right;">
                    @if($videos->total() != 0)
                        {{ $videos->links() }}
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

<script type="text/javascript">
    $(document).ready(function(){

        $('#genre_select_video').on('change',function(){
            $('#searchGenreSubmit').submit();
        });
    });
</script>

@stop