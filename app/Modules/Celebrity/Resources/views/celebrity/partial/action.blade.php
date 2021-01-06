<script src="{{ asset('admin/global/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/picker_date.js')}}"></script>

<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>


            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">First Name:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-hat"></i>
                                    </span>
                                </span>
                                {!! Form::text('first_name', $value = null, ['id'=>'first_name','placeholder'=>'Enter First Name','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Last Name:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-hat"></i>
                                    </span>
                                </span>
                                {!! Form::text('last_name', $value = null, ['id'=>'last_name','placeholder'=>'Enter Last Name','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Celebrity Image:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-images3"></i></span>
                                </span>
                                {!! Form::file('celeb_pic', ['id'=>'celeb_pic','class'=>'form-control']) !!}
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
                                    $image = ($celebrity->celeb_pic) ? asset($celebrity->file_full_path).'/'.$celebrity->celeb_pic : asset('admin/default.png');

                                @endphp

                                <img id="celeb_pic" src="{{$image}}" alt="your image" class="preview-image" style="height: 100px;width: auto;" />
                                @else
                                <img id="celeb_pic" src="{{ asset('admin/default.png') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                                @endif
                                <br>
                                <br>
                                <span class="text-success font-weight-bold font-italic">Note :: The recommended dimensions is 450 X 450. </span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">DOB:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar2"></i>
                                    </span>
                                </span>
                                {!! Form::text('dob', $value = null, ['id'=>'dob','placeholder'=>'Enter DOB','class'=>'form-control daterange-single','readonly']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Place of Birth:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-location4"></i>
                                    </span>
                                </span>
                                {!! Form::text('place_of_birth', $value = null, ['id'=>'place_of_birth','placeholder'=>'Enter Place of Birth','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Age:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-user-plus"></i>
                                    </span>
                                </span>
                                {!! Form::text('age', $value = null, ['id'=>'age','placeholder'=>'Enter Age','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Nationality:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-map"></i>
                                    </span>
                                </span>
                                {!! Form::text('nationality', $value = null, ['id'=>'nationality','placeholder'=>'Enter Nationality','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Religion:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-yin-yang"></i>
                                    </span>
                                </span>
                                {!! Form::text('religion', $value = null, ['id'=>'religion','placeholder'=>'Enter Religion','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Occupation:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-man-woman"></i>
                                    </span>
                                </span>
                                {!! Form::text('occupation', $value = null, ['id'=>'occupation','placeholder'=>'Enter Occupation','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
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

                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Weight:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-music"></i>
                                    </span>
                                </span>
                                {!! Form::text('weight', $value = null, ['id'=>'weight','placeholder'=>'Enter Weight','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>  

            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Height:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-dots"></i>
                                    </span>
                                </span>
                                {!! Form::text('height', $value = null, ['id'=>'height','placeholder'=>'Enter Height','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Gender:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-music"></i>
                                    </span>
                                </span>
                                {!! Form::select('gender',[ 'Male'=>'Male','Female'=>'Female'], $value = null, ['id'=>'gender','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Martial Status:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-dots"></i>
                                    </span>
                                </span>
                                {!! Form::select('martial_status',[ 'Single'=>'Single','Married'=>'Married','Divorce'=>'Divorce'], $value = null, ['id'=>'martial_status','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
</fieldset>


<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold">Celebrity Award</legend>

     @if($is_edit)
        @foreach($celebrity->CelebAwardInfo as $key => $award) 
                             
            <div class="appendAward">
                <div class="form-group row">

                    <div class="col-lg-3">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Award:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    {!! Form::text('title[]', $value = $award->title, ['id'=>'title','placeholder'=>'Enter Title','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Description:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    {!! Form::text('description[]', $value = $award->description, ['id'=>'description','placeholder'=>'Enter Description','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>                  
                    <div class="col-lg-3">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Award Image:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                     {!! Form::file('image[]', ['id'=>'image','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>                   
                    <div class="col-lg-2">
                        <div class="row">
                            <label class="col-form-label col-lg-3"></label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                @if($is_edit)
                                @php
                                    $image = ($award->image) ? asset($award->file_full_path).'/'.$award->image : asset('admin/default.png');
                                @endphp
                                 {{ Form::hidden('previouse_image[]', $award->image, array('class' => 'previouse_image')) }}
                                <img id="old_image[]" src="{{$image}}" alt="your image" class="preview-image" style="height: 100px;width: auto;" />
                                @else
                                <img id="image" src="{{ asset('admin/default.png') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-1">
                       <div class="row">
                             <button type="button" class="ml-2 remove_award btn bg-danger-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Remove</button>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    @endif

        <div class="appendAward">
                <div class="form-group row">

                    <div class="col-lg-3">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Award:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    {!! Form::text('title[]', $value = null, ['id'=>'title','placeholder'=>'Enter Title','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Description:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    {!! Form::text('description[]', $value = null, ['id'=>'description','placeholder'=>'Enter Description','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>                  
                    <div class="col-lg-3">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Award Image:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                     {!! Form::file('image[]', ['id'=>'image','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <div class="col-lg-2">
                        <div class="row">
                            <label class="col-form-label col-lg-3"></label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <img id="image" src="{{ asset('admin/default.png') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-1">
                       <div class="row">
                                <button type="button" class="ml-2 add_award btn bg-success-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Add More</button>
                        </div>
                    </div>
                </div>
            </div>

</fieldset>


<div class="text-right">
    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> {{ $btnType }}</button>
</div>




<script type="text/javascript">
    
    $(document).ready(function(){
         $('#image_path').bind('change', function() {
            var a=(this.files[0].size);

            if(a > 2000000) {
               $('#modal_image_size').modal('show');
               $('#image_path').val('');
            };
        });
    });

</script>


 <script type="text/javascript">
    $(document).ready(function(){ 

        $('.add_award').on('click',function(){
            $.ajax({
                    type: 'GET',
                    url: '/admin/celebrity/appendAward',
                    success: function (data) {
                        $('.appendAward').last().append(data.options); 
                    }
                });
        }); 


        $('.remove_award').on('click',function(){ 
            $(this).parent().parent().parent().remove();
        });

        
    });



 </script>