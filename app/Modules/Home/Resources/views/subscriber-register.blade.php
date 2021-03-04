@extends('home::layouts.master')
@section('title')Subscriber Register @stop
@section('content')



<style>
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -28px; 
  position: relative;
  z-index: 2;
  margin-right: 8px;
}

</style>
   <div class="register-page page page--overlay" style="background-image: url('https://images.pexels.com/photos/4009409/pexels-photo-4009409.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-post">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="why-signup">
                                    <h4>Why Sign up?</h4>
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-check"></i>Exclusive TV Shows & Songs.</li>
                                        <li><i class="fas fa-check"></i>Access to wide range in HD Quality.</li>
                                        <li><i class="fas fa-check"></i>High Definition (HD) Video Quality.</li>
                                        <li><i class="fas fa-check"></i>No Commercial Ads.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-5">
                                 {!! Form::open(['route'=>'subscriber-register.store','method'=>'POST','id'=>'subscriber_submit','class'=>'register-form','role'=>'form']) !!}
                                    <ul class="social-login list-unstyled">
                                        <li><a class="fb mb-3" href="{{ url('/auth/redirect/facebook') }}"><i class="fab fa-facebook-f"></i>Login/signup with facebook</a></li>
                                        <li><a class="google" href="{{ url('/auth/redirect/google') }}"><i class="fab fa-google"></i>Login/signup with gmail</a></li>
                                    </ul>
                                    <h5 class="text-center">OR</h5>
                                    <hr>
                                    <h5 class="mb-3">Register</h5>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            {!! Form::text('username', $value = null, ['id'=>'username','placeholder'=>'Enter Username','class'=>'form-control','required']) !!}
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                             {!! Form::text('full_name', $value = null, ['id'=>'full_name','placeholder'=>'Enter Full Name','class'=>'form-control','required']) !!}
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            {!! Form::email('email', $value = null, ['id'=>'email','placeholder'=>'Enter Email','class'=>'form-control','required']) !!}
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            {!! Form::text('mobile_no', $value = null, ['id'=>'mobile_no','placeholder'=>'Enter Mobile No.','class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <input type="password" placeholder="Enter Password" class="form-control" id="rpassword" name="password" required="required">
                                            <span toggle="#rpassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <input type="password" placeholder="Enter Re-Type  Password" class="form-control" id="c_password" name="c_password" required="required">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <div class="form-check mb-1">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1" required="required">
                                                <label class="form-check-label" for="exampleCheck1">
                                                    By clicking Register, you agree to the Manoranjan Ghar <a class="text-primary" href="#">Terms of Use</a> and <a class="text-primary" href="#">Privacy policy</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button class="btn btn-primary w-100" type="submit">Register</button>
                                    </div>
                                    <div class="register-to">
                                        <h6 class="mb-0">Already a member? <a href="{{ route('subscriber-login')}}" class="text-danger">Login here</a></h6>
                                    </div>
                               {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop