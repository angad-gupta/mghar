@extends('admin::layout')
@section('title')Ads @stop 
@section('breadcrum')Update Ads @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/ads.js')}}"></script>

<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit Ads</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::model($ads_info,['method'=>'PUT','route'=>['ads.update',$ads_info->id],'class'=>'form-horizontal','id'=>'banner_submit','role'=>'form','files'=>true]) !!} 
        	
        	@include('ads::ads.partial.action',['btnType'=>'Update']) 
        
        {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop