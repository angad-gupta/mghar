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
                 <button type="button" class="ml-2 remove_award btn bg-danger-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Remove</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){ 

        $('.remove_award').on('click',function(){ 
            $(this).parent().parent().parent().remove();
        });
        
    });
</script>

