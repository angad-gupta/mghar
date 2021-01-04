@extends('admin::layout')
@section('title')Genre @stop 
@section('breadcrum')Update Genre @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/genre.js')}}"></script>

<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit Genre</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::model($genre,['method'=>'PUT','route'=>['genre.update',$genre->id],'class'=>'form-horizontal','id'=>'genre_submit','role'=>'form','files'=>true]) !!} 
        	
        	@include('genre::genre.partial.action',['btnType'=>'Update']) 
        
        {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop