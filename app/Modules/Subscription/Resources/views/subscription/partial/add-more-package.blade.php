 <tr>
    <td>
         {!! Form::text('subsription_title[]', $value = null, ['id'=>'subsription_title','placeholder'=>'Enter Package Title','class'=>'form-control','required']) !!} 
    </td>
    <td>
        {!! Form::select('is_one_month[]',[ 'yes'=>'Yes','no'=>'No','other'=>'Other'], $value = null, ['id'=>'is_one_month','class'=>'is_one_month form-control']) !!}

         <span class="other-features" style="display: none;">{!! Form::text('one_month_feature[]', $value = null, ['id'=>'one_month_feature','placeholder'=>'Enter Feature','class'=>' one_month_feature form-control mt-2']) !!} </span>
    </td>
    <td>
        {!! Form::select('is_three_month[]',[ 'yes'=>'Yes','no'=>'No','other'=>'Other'], $value = null, ['id'=>'is_three_month','class'=>'is_three_month form-control']) !!}

        <span class="other-features" style="display: none;">{!! Form::text('three_month_feature[]', $value = null, ['id'=>'three_month_feature','placeholder'=>'Enter Feature','class'=>'three_month_feature form-control mt-2']) !!} </span>
    </td>
    <td>
        {!! Form::select('is_six_month[]',[ 'yes'=>'Yes','no'=>'No','other'=>'Other'], $value = null, ['id'=>'is_six_month','class'=>'is_six_month form-control']) !!}

        <span class="other-features" style="display: none;">{!! Form::text('six_month_feature[]', $value = null, ['id'=>'six_month_feature','placeholder'=>'Enter Feature','class'=>'six_month_feature form-control mt-2']) !!}</span> 
    </td>
    <td>
        {!! Form::select('is_one_year[]',[ 'yes'=>'Yes','no'=>'No','other'=>'Other'], $value = null, ['id'=>'is_one_year','class'=>'is_one_year form-control']) !!}

        <span class="other-features" style="display: none;">{!! Form::text('one_year_feature[]', $value = null, ['id'=>'one_year_feature','placeholder'=>'Enter Feature','class'=>'one_year_feature form-control mt-2']) !!} </span>
    </td>
    
    <td>
        <button type="button" class="ml-2 remove_package btn bg-danger-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Remove</button>
    </td>
</tr>


<script type="text/javascript">
$(document).ready(function(){
    $('.remove_package').on('click',function(){ 
            $(this).parent().parent().remove();
        });

    });
</script>