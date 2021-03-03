
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
            <button type="button" class="ml-2 remove_block btn bg-danger-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Remove</button>
        </div>
    </div>

</div>


<script type="text/javascript">
    $(document).ready(function(){ 

        $('.remove_block').on('click',function(){ 
            $(this).parent().parent().remove();
        });
        
    });
</script>



