<script src="{{ asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/form_select2.js')}}"></script>
<script src="{{ asset('admin/global/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/picker_date.js')}}"></script>


<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Video Ads Title:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-hat"></i>
                                    </span>
                                </span>
                                {!! Form::text('vidoe_ads_title', $value = null, ['id'=>'ads_title','placeholder'=>'Enter Ads Title','class'=>'form-control']) !!}
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
                <div class="col-lg-9">
                    <div class="row">
                       
                        <label class="col-form-label col-lg-2">Video Ads Category:<span class="text-danger">*</span></label>
                        <div class="col-lg-10 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                @php
                                if($is_edit){
                                    $categories_decoded = json_decode($video_ads_info->ads_category, true);
                                }
                                @endphp
                                
                                <select name="ads_category[]" id="ads_category" class="form-control select-search" aria-placeholder="Select Video Ads Category" multiple>
                                    <option value="latest" 
                                        @if($is_edit)
                                            @if(isset($categories_decoded))
                                                @foreach($categories_decoded as $cat)
                                                    @if($cat == 'latest')
                                                        selected
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endif
                                    > Latest </option>

                                    <option value="trending"
                                        @if($is_edit)
                                            @foreach($categories_decoded as $cat)
                                                @if($cat == 'trending')
                                                    selected
                                                @endif
                                            @endforeach
                                        @endif
                                    > Trending </option>

                                    <option value="most_popular"
                                        @if($is_edit)
                                            @foreach($categories_decoded as $cat)
                                                @if($cat == 'most_popular')
                                                    selected
                                                @endif
                                            @endforeach
                                        @endif
                                    > Most Popular</option>

                                    @foreach( $categories as $key=>$value)
                                        <option value="{{$key}}"
                                        @if($is_edit)
                                            @foreach((array)$categories_decoded as $cat)
                                                @if($cat == $key)
                                                    selected
                                                @endif
                                            @endforeach
                                        @endif
                                        > {{$value}} </option>
                                    @endforeach
                                </select>

                                 {{-- {!! Form::select('ads_category',$categories, $value = null, ['id'=>'ads_category','class'=>'form-control select-search','placeholder'=>'Select Video Ads Category',' data-fouc','multiple']) !!} --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        


            <div class="form-group row">


                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Select Date Range:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i>
                                    </span>
                                </span>
                                @php
                                    if($is_edit){
                                        $start_date = $video_ads_info->start_date;
                                        $end_date = $video_ads_info->end_date;
                                        $arr = [$start_date,$end_date];
                                        $daterange = implode('---',$arr);
                                    }
                                @endphp
                                {!! Form::text('date_range', $value = $daterange ?? null, ['id'=>'date_range','placeholder'=>'Enter Ads Start Date','class'=>'form-control daterange-buttons','readonly','required']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Video Ads:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-play"></i></span>
                                </span>
                                {!! Form::file('video_ads_upload', ['id'=>'video_ads_upload','class'=>'form-control']) !!}
                            </div>
                            <div class="mt-3">
                            @if($is_edit)
                            @php
                                 $video = ($video_ads_info->video_ads_upload) ? asset($video_ads_info->file_full_path).'/'.$video_ads_info->video_ads_upload : asset('admin/image.png');
                            @endphp

                            <video width="320" height="240" controls>
                                <source src="{{$video}}" type="video/mp4">
                                <source src="movie.ogg" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                            
                            @else
                            <img id="ads_image" src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJxkdnLGeMGw_ZRf3VRIHqnTYzNB8dlq3cSo6dxDBDuUgxMuiNCuJmb6cBG6ayvSpddj4&usqp=CAU') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group row">
                <div class="col-lg-6">
                   <div class="row">
                        <label class="col-form-label col-lg-3"></label>
                       <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                      
                       </div>

                   </div>
               </div>
           </div>

           

         

</fieldset>


<div class="text-right">
    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> {{ $btnType }}</button>
</div>



 <!-- Warning modal -->
    {{-- <div id="modal_image_size" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-body">
                    <center>
                        <i class="icon-alert text-warning icon-3x"></i>
                    </center>
                    <br>
                    <center>
                        <h4 class="text-purple">Ads Image Size is Greater Than 2Mb. Please Upload Below 1Mb.</h4>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Thank You !!!</button>
                    </center>
                </div>
            </div>
        </div>
    </div> --}}
<!-- /warning modal -->


{{-- 
<script type="text/javascript">
    
    $(document).ready(function(){
         $('#video_ads_upload').bind('change', function() {
            var a=(this.files[0].size);

            if(a > 2000000) {
               $('#modal_image_size').modal('show');
               $('#video_ads_upload').val('');
            };
        });

    });

</script> --}}

