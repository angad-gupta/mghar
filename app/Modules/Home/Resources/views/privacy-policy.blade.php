@extends('home::layouts.master')
@section('title') Privacy Policy @stop
@section('content')


    <div class="page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-content">
                        <h3 class="mb-3">Privacy & Policy</h3>
  							{!! $policy->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop