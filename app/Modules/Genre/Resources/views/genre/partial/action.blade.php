
<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>


            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Genre Name:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-hat"></i>
                                    </span>
                                </span>
                                {!! Form::text('genre_title', $value = null, ['id'=>'genre_title','placeholder'=>'Enter Genre Name','class'=>'form-control']) !!}
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
                                    <span class="input-group-text"><i class="icon-pencil"></i>
                                    </span>
                                </span>
                               {!! Form::select('status',[ '1'=>'Enabled','0'=>'Disabled'], $value = null, ['id'=>'status','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
</fieldset>


<div class="text-right">
    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> {{ $btnType }}</button>
</div>
