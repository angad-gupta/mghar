@extends('home::layouts.master')
@section('title')Manoranjan Video List @stop
@section('content')


<div class="featured-post-block mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="category-post featured-post">
                    <div class="row">
                        <div class="col-12">
                            <div class="main-title">
                                <h3 class="mb-0"> {{ $block_section_title }}</h3>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Select Genre
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @foreach($genre as $key =>$val)
                                        @php

                                        $select ="";
                                        if($genre_search){
                                        if(in_array($key,$genre_search)){
                                        $select = "selected='selected'";
                                        }
                                        }
                                        @endphp
                                        <a href="{{ route('videos',['blockId' =>request()->get('blockId'),'genre'=>$key]) }}"
                                            class="dropdown-item">{{$val}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="listing">

                            @if($videos->total() != 0)
                            @foreach($videos as $key => $value)
                            @php
                            $coverimages = ($value->video_cover_image) ?
                            asset($value->file_full_path).'/'.$value->video_cover_image : asset('admin/default.png');
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
                        </div>
                    </div>
                    @else
                    <span>No Videos Added</span>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
<script type="text/javascript">
    $(document).ready(function(){

        $('#genre_select_video').on('change',function(){
            $('#searchGenreSubmit').submit();
        });
    });
</script>
@stop

@stop