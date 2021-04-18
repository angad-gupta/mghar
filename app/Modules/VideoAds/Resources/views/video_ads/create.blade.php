@extends('admin::layout')
@section('title')Video Ads @stop 
@section('breadcrum')Create Video Ads @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{asset('admin/validation/ads.js')}}"></script>

<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Create Video Ads</h5>
        <div class="header-elements">

        </div>
    </div>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="text-danger">{{$error}}</div>
    @endforeach
@endif


    <div class="card-body">

        {!! Form::open(['route'=>'video_ads.store','method'=>'POST','id'=>'video_ads_submit','class'=>'form-horizontal','role'=>'form','enctype'=>'multipart/form-data','files'=>true]) !!}
         	@include('videoads::video_ads.partial.action',['btnType'=>'Save']) 
         {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop