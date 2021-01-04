@extends('admin::layout')
@section('title')Genre @stop 
@section('breadcrum')Create Genre @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{asset('admin/validation/genre.js')}}"></script>

<!-- /theme JS files --> 

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Create Genre</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::open(['route'=>'genre.store','method'=>'POST','id'=>'genre_submit','class'=>'form-horizontal','role'=>'form','files' => true]) !!}
         	@include('genre::genre.partial.action',['btnType'=>'Save']) 
         {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop