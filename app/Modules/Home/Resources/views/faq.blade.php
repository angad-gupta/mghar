@extends('home::layouts.master')
@section('title') FAQ @stop
@section('content')


<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-content faq" style="background-color: transparent;">
                    <h3 class="mb-3">FAQ</h3>
                    <div class="page-accordian">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                            @if($faq_detail->total() != 0)
                            @foreach($faq_detail as $key => $value)
                            @php
                            $expand = ($key == 0) ? 'true' : 'false';
                            $collapsed = ($key == 0) ? '' : 'collapsed';
                            $panel_colls = ($key == 0) ? 'in show' : '';
                            @endphp
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne{{$key}}">
                                    <h4 class="panel-title">
                                        <a class="{{$collapsed}}" role="button" data-toggle="collapse"
                                            data-parent="#accordion" href="#collapseOne{{$key}}"
                                            aria-expanded="{{$expand}}" aria-controls="collapseOne{{$key}}">
                                            {{$value->question}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne{{$key}}" class="panel-collapse {{$panel_colls}}" role="tabpanel"
                                    aria-labelledby="headingOne{{$key}}">
                                    <div class="panel-body">
                                        {!! $value->answer !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop