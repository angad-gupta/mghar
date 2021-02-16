@extends('home::layouts.master')
@section('title')Khelau Juhari  List @stop
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

                            <div class="col-lg-4 col-xl-2">
                                <div class="featured-post-small">
                                    <a href="{{ route('khelaujuhari-detail',['juhari_id'=>$value->id]) }}" class="featured-post-small-img">
                                        <img src="{{$coverimages}}" alt="">
                                    </a>
                                    <div class="featured-post_content">
                                        <a href="{{ route('khelaujuhari-detail',['juhari_id'=>$value->id]) }}"><h5>{{$value->kj_title}}</h5></a>
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


@stop