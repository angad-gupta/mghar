@extends('admin::layout')
@section('title')Subscription @stop
@section('breadcrum')Subscription @stop

@section('script')
<script src="{{asset('admin/validation/subscription.js')}}"></script>
@stop

@section('content') 




{!! Form::open(['route'=>'subscription.store','method'=>'POST','id'=>'subscription_submit','class'=>'form-horizontal','role'=>'form','files' => true]) !!}

<div>
    <div>
        <div class="card card-body" style="border: dashed;border-radius: 25px;border-width: thin;">
            <fieldset class="mb-1">
                <legend class="text-uppercase font-size-sm text-danger font-weight-black">Subscription Package</legend>


                <div class="table-responsive table-card">
                    <table class="table table-striped">
                        <thead>
                            <tr class="bg-slate">
                                <th width="50%">Package Title</th>
                                <th>1 Month</th>
                                <th>3 Months</th>
                                <th>6 Months</th>
                                <th>1 year</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="appendBlock">
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
                                    <button type="button" class="ml-2 add_package btn bg-success-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Add More</button>
                                </td>
                        </tr>
    
                    </tbody>

                        <thead>
                            <tr class="bg-pink">
                                <th> Package Payment</th>

                                <th>{!! Form::text('one_month_payment', $value = null, ['id'=>'one_month_payment','placeholder'=>'1 Month Payment','class'=>'form-control numeric','required']) !!} </th>
                                <th>{!! Form::text('three_month_payment', $value = null, ['id'=>'three_month_payment','placeholder'=>'3 Months Payment','class'=>'form-control numeric','required']) !!} </th>
                                <th>{!! Form::text('six_month_payment', $value = null, ['id'=>'six_month_payment','placeholder'=>'6 Months Payment','class'=>'form-control numeric','required']) !!} </th>
                                <th>{!! Form::text('one_year_payment', $value = null, ['id'=>'one_year_payment','placeholder'=>'1 Year Payment','class'=>'form-control numeric','required']) !!} </th>
                            </tr>
                        </thead>

                </table>
            </div>
                        
            </fieldset>
        </div>

    </div>
</div>


<div class="text-right">
    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> Store</button>
</div>

{!! Form::close() !!}

<script type="text/javascript">
    
    $(document).ready(function(){
        $(document).on('change','#is_one_month',function(){
            var is_one_month = $(this).val();

            if(is_one_month == 'other'){
                $(this).parent().find('.other-features').show();
            }else{
                $(this).parent().find('.other-features').hide();
            }

        });

        $(document).on('change','#is_three_month',function(){
            var is_three_month = $(this).val();

            if(is_three_month == 'other'){
                $(this).parent().find('.other-features').show();
            }else{
                $(this).parent().find('.other-features').hide();
            }

        });


        $(document).on('change','#is_six_month',function(){
            var is_six_month = $(this).val();

            if(is_six_month == 'other'){
                $(this).parent().find('.other-features').show();
            }else{
                $(this).parent().find('.other-features').hide();
            }

        });
        

        $(document).on('change','#is_one_year',function(){
            var is_one_year = $(this).val();

            if(is_one_year == 'other'){
                $(this).parent().find('.other-features').show();
            }else{
                $(this).parent().find('.other-features').hide();
            }

        });

        $('.add_package').on('click',function(){
            $.ajax({
                    type: 'GET',
                    url: '/admin/subscription/appendPackage',
                    success: function (data) {
                        $('.appendBlock').last().append(data.options); 
                    }
                });
        }); 

    });    
</script>

@endsection