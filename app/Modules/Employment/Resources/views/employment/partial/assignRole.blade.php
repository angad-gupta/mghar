
@php
    $userAuth = Auth::user();
    $userType = $userAuth->user_type;

    if($userType == 'admin' || $userType == 'super_admin'){

@endphp

    <div class="form-group row">
        <label class="col-form-label col-lg-3">Role:</label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            
            {!! Form::select('role',$roles, $value = $user->role->pluck('id','name'), ['id'=>'role_id','class'=>'form-control','placeholder'=>'Enter Role','required'=>'required']) !!}

        </div>
    </div>

@php }else{ @endphp 

<span class="text-danger font-weight-black"><i class="icon-alert mr-2"></i>You Don't Have Permission to Access Role Update</span>

@php } @endphp
