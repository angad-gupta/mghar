@extends('admin::layout')
@section('title')Dynamic Block @stop
@section('breadcrum')Dynamic Block @stop

@section('script')
<script src="{{asset('admin/validation/dynamicblock.js')}}"></script>
@stop

@section('content') 


<div class="card card-body bg-pink-400" style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png);">
    <div class="media">
        <div class="mr-3 align-self-center">
            <i class="icon-wave icon-2x"></i>
        </div>

        <div class="media-body text-center">
            <h5 class="media-title font-weight-semibold">Banner Section</h5>
            <span class="opacity-75">Did you add Banner in this section ? If not, <a href="{{route('banner.index')}}" class="text-light">Click Me !</a></span>
        </div>
    </div>
</div>


{!! Form::open(['route'=>'dynamicblock.store','method'=>'POST','id'=>'block_submit','class'=>'form-horizontal','role'=>'form','files' => true]) !!}

<div class="appendBlock">
    <div>
        <div class="card card-body" style="border: dashed;border-radius: 25px;border-width: thin;">
            <fieldset class="mb-1">
                <legend class="text-uppercase font-size-sm text-danger font-weight-black"># Block Section</legend>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <label class="col-form-label col-lg-3">Block Section Title:<span class="text-danger">*</span></label>
                                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-hat"></i>
                                                </span>
                                            </span>
                                            {!! Form::text('block_section[]', $value = null, ['id'=>'block_section','placeholder'=>'Enter Block Section Title','class'=>'form-control','required']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="row">
                                    <label class="col-form-label col-lg-3">Sort Order:</label>
                                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-puzzle4"></i>
                                                </span>
                                            </span>
                                           {!! Form::text('sort_order[]', $value = null, ['id'=>'sort_order','placeholder'=>'Set Sort Order','class'=>'numeric form-control','required']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
            </fieldset>
        </div>

        <div class="card card-body" style="border: dashed;border-radius: 25px;border-width: thin;">
            <fieldset class="mb-1">
                <legend class="text-uppercase font-size-sm text-danger font-weight-black"># Ads Section</legend>


                        <div class="row">
                            <div class="col-lg-3">
                                <div class="row">
                                    <label class="col-form-label col-lg-3">Is Script Ads ?:</label>
                                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-hat"></i>
                                                </span>
                                            </span>
                                             {!! Form::select('is_scripted_ads[]',[ 'yes'=>'Yes','no'=>'No','no_ads'=>'No Ads'], $value = null, ['id'=>'is_scripted_ads','class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-9 scripted_ads">
                                <div class="row">
                                    <label class="col-form-label col-lg-3">Scripted Ads:</label>
                                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-puzzle4"></i>
                                                </span>
                                            </span>
                                           {!! Form::text('scripted_ads[]', $value = null, ['id'=>'scripted_ads','placeholder'=>'Enter Scripted Ads','class'=>'form-control','required']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 ads_section" style="display: none;">
                                <div class="row">
                                    <label class="col-form-label col-lg-3">Ads Title:</label>
                                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-puzzle4"></i>
                                                </span>
                                            </span>
                                           {!! Form::text('ads_title[]', $value = null, ['id'=>'ads_title','placeholder'=>'Enter Ads Title','class'=>'form-control','required']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>                            

                            <div class="col-lg-3 ads_section" style="display: none;">
                                <div class="row">
                                    <label class="col-form-label col-lg-3">Ads URL:</label>
                                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-puzzle4"></i>
                                                </span>
                                            </span>
                                           {!! Form::text('ads_url[]', $value = null, ['id'=>'ads_url','placeholder'=>'Enter Ads URL','class'=>'form-control','required']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 ads_section" style="display: none;">
                                <div class="row">
                                    <label class="col-form-label col-lg-3">Ads Image:</label>
                                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-images3"></i></span>
                                            </span>
                                            {!! Form::file('ads_image[]', ['id'=>'ads_image','class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 ads_section" style="display: none;">
                                <div class="row">
                                     <label class="col-form-label col-lg-3"></label>
                                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                        <img id="ads_image" src="{{ asset('admin/image.png') }}" alt="your image" class="preview-image" style="height: 40px; width: auto;" />
                                    </div>

                                </div>
                            </div>

                        </div>
                        
            </fieldset>
        </div>

        <div class="row mb-3 ml-1">
            <button type="button" class="ml-2 add_block btn bg-success-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Add More</button>
        </div>
    </div>
</div>



<div class="text-right">
    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> Store</button>
</div>

{!! Form::close() !!}

<script type="text/javascript">
    
    $(document).ready(function(){
        $(document).on('change','#is_scripted_ads',function(){
            var is_scripted_ads = $(this).val();

            if(is_scripted_ads == 'yes'){
                $(this).parent().parent().parent().parent().parent().find('.scripted_ads').show();
                $(this).parent().parent().parent().parent().parent().find('.ads_section').hide();
            }else if(is_scripted_ads == 'no'){
                $(this).parent().parent().parent().parent().parent().find('.ads_section').show();
                $(this).parent().parent().parent().parent().parent().find('.scripted_ads').hide();
            }else{
                 $(this).parent().parent().parent().parent().parent().find('.ads_section').hide();
                $(this).parent().parent().parent().parent().parent().find('.scripted_ads').hide();
            }

        });

        $('.add_block').on('click',function(){
            $.ajax({
                    type: 'GET',
                    url: '/admin/dynamicblock/appendBlock',
                    success: function (data) {
                        $('.appendBlock').last().append(data.options); 
                    }
                });
        }); 

    });    
</script>

@endsection