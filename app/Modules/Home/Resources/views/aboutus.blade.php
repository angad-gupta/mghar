@extends('home::layouts.master')
@section('title') About Us @stop
@section('content')

 @php 
    $aboutImg = ($about_manoranjan->image) ? asset($about_manoranjan->file_full_path).'/'.$about_manoranjan->image : '');
@endphp

    <div class="page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-content">
                        <h3>About Us</h3>

                        <span style="margin-left: 280px;"><img src="{{$aboutImg}}" style="height:auto;width: 45%;"></span>
                        <br>
                        <br>
                        {!! $about_manoranjan->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop