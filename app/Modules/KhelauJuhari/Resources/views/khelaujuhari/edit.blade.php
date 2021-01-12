@extends('admin::layout')
@section('title')Khelau Juhari @stop 
@section('breadcrum')Update Khelau Juhari @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/khelaujuhari.js')}}"></script>

<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit Khelau Juhari</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::model($khelaujuhari_info,['method'=>'PUT','route'=>['khelaujuhari.update',$khelaujuhari_info->id],'class'=>'form-horizontal','id'=>'khelaujuhari_submit','role'=>'form','files'=>true]) !!} 
        	
        	@include('khelaujuhari::khelaujuhari.partial.action',['btnType'=>'Update']) 
        
        {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop