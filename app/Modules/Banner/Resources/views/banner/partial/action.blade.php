<script src="{{ asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/form_select2.js')}}"></script>

<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>


            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Banner Title:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-hat"></i>
                                    </span>
                                </span>
                                {!! Form::text('banner_title', $value = null, ['id'=>'banner_title','placeholder'=>'Enter Banner Title','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Status:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-dots"></i>
                                    </span>
                                </span>
                               {!! Form::select('status',[ '1'=>'Enabled','2'=>'Disabled'], $value = null, ['id'=>'status','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">

                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Banner Image:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-images3"></i></span>
                                </span>
                                {!! Form::file('banner_image', ['id'=>'banner_image','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="col-lg-6">
                    <div class="row">
                         <label class="col-form-label col-lg-3"></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            @if($is_edit)
                                @php
                                     $image = ($banner_info->banner_image) ? asset($banner_info->file_full_path).'/'.$banner_info->banner_image : asset('admin/default.png');
                                @endphp

                                <img id="banner_image" src="{{$image}}" alt="your image" class="preview-image" style="height: 100px;width: auto;" />
                                @else
                                <img id="banner_image" src="{{ asset('admin/default.png') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                                @endif
                                <br>
                                <br>
                                <span class="text-success font-weight-bold font-italic">Note :: The recommended dimensions is 800 X 500. </span>
                        </div>

                    </div>
                </div>
            </div>


@php
    $external_section = ($is_edit AND $banner_info->banner_source == '1') ? "display:block" : "display:none";
    $internal_section = ($is_edit AND $banner_info->banner_source == '2') ? "display:block" : "display:none";
@endphp
            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Banner Source:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-hat"></i>
                                    </span>
                                </span>
                                 {!! Form::select('banner_source',[ '1'=>'External','2'=>'Internal'], $value = null, ['id'=>'banner_source','class'=>'form-control','placeholder'=>'Select Banner Source']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="col-lg-6 external_video" style="{{ $external_section }}">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Video Link:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-pencil"></i>
                                    </span>
                                </span>
                                {!! Form::text('banner_link', $value = null, ['id'=>'banner_link','placeholder'=>'Enter External Link','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="col-lg-6 internal_video" style="{{ $internal_section }}">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Select Video :</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                {!! Form::select('video_id',$video, $value = null, ['id'=>'video_id','placeholder'=>'Select Video','class'=>'form-control select-search','data-fous']) !!}
                            </div>
                        </div>
                    </div>
                </div>



            </div>

</fieldset>


<div class="text-right">
    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> {{ $btnType }}</button>
</div>



 <!-- Warning modal -->
    <div id="modal_image_size" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-body">
                    <center>
                        <i class="icon-alert text-warning icon-3x"></i>
                    </center>
                    <br>
                    <center>
                        <h4 class="text-purple">Banner Image Size is Greater Than 2Mb. Please Upload Below 1Mb.</h4>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Thank You !!!</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
<!-- /warning modal -->



<script type="text/javascript">
    
    $(document).ready(function(){
         $('#banner').bind('change', function() {
            var a=(this.files[0].size);

            if(a > 2000000) {
               $('#modal_image_size').modal('show');
               $('#banner').val('');
            };
        });

         $(document).on('change','#banner_source',function(){

            var source = $(this).val();

            if(source == '2'){
                $('.internal_video').show();
                $('.external_video').hide();
            }else{
                $('.internal_video').hide();
                $('.external_video').show();

            }

         });

    });

</script>

