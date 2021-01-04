
<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>


            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Video Title:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-play"></i>
                                    </span>
                                </span>
                                {!! Form::text('video_title', $value = null, ['id'=>'video_title','placeholder'=>'Enter Video Title','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Select Genre:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-music"></i>
                                    </span>
                                </span>
                                {!! Form::select('genre_id',$genre, $value = null, ['id'=>'genre_id','class'=>'genre_id form-control','placeholder'=>'Select Genre']) !!} 
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Video Cover Image:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-images3"></i></span>
                                </span>
                                {!! Form::file('video_cover_image', ['id'=>'video_cover_image','class'=>'form-control']) !!}
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
                                    $image = ($video_info->video_cover_image) ? asset($video_info->file_full_path).'/'.$video_info->video_cover_image : asset('admin/image.png');

                                @endphp

                                <img id="video_cover_image" src="{{$image}}" alt="your image" class="preview-image" style="height: 100px;width: auto;" />
                                @else
                                <img id="video_cover_image" src="{{ asset('admin/image.png') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                                @endif
                                <br>
                                <br>
                                <span class="text-success font-weight-bold font-italic">Note :: The recommended dimensions is 450 X 450. </span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-12">
                    <div class="row">
                        <label class="col-form-label col-lg-1">Description:</label>
                        <div class="col-lg-11 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                 {!! Form::textarea('description', null, ['id' => 'description','placeholder'=>'Enter Description', 'class' =>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Video Url:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-presentation"></i>
                                    </span>
                                </span>
                                {!! Form::text('video_embeded_url', $value = null, ['id'=>'video_embeded_url','placeholder'=>'Enter Video Url/Embedded','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Select Status:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-dots"></i>
                                    </span>
                                </span>
                                {!! Form::select('status',[ '1'=>'Enabled','0'=>'Disabled'], $value = null, ['id'=>'status','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Is Popular ?:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-dots"></i>
                                    </span>
                                </span>
                                {!! Form::select('is_popular',[ '1'=>'Yes','2'=>'No'], $value = null, ['id'=>'is_popular','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Is Trending ?:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-dots"></i>
                                    </span>
                                </span>
                                {!! Form::select('is_trending',[ '1'=>'Yes','2'=>'No'], $value = null, ['id'=>'is_trending','class'=>'form-control']) !!}
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
                        <h4 class="text-purple">Image Size is Greater Than 2Mb. Please Upload Below 2Mb.</h4>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Thank You !!!</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
<!-- /warning modal -->



<script type="text/javascript">
    
    $(document).ready(function(){
         $('#video_cover_image').bind('change', function() {
            var a=(this.files[0].size);

            if(a > 2000000) {
               $('#modal_image_size').modal('show');
               $('#video_cover_image').val('');
            };
        });
    });

</script>
