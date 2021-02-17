@extends('home::layouts.master')
@section('title')Terms of Use @stop
@section('content')


    <div class="page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-content">
                        <h3 class="mb-3">Terms of Use</h3>
  							{!! $terms_use->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop