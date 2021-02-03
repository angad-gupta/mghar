@extends('home::layouts.master')
@section('title')Subscriber Login @stop
@section('content')

    <div class="register-page page page--overlay" style="background-image: url('https://assets.nflxext.com/ffe/siteui/vlv3/9a818ce7-5b19-4a0a-8bec-e4a233c8661b/edf0202d-cb01-427f-bd3d-c0f8774f53a7/NP-en-20210104-popsignuptwoweeks-perspective_alpha_website_small.jpg');">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-post">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-5">
                                {!! Form::open(['route'=>'subscriber-login-post','method'=>'POST','id'=>'subscriber_submit','class'=>'register-form','role'=>'form']) !!}
                                    <ul class="social-login list-unstyled">
                                        <li><a class="fb mb-3" href="{{ url('/auth/redirect/facebook') }}"><i class="fab fa-facebook-f"></i>Login/signup with facebook</a></li>
                                        <li><a class="google" href="{{ url('/auth/redirect/google') }}"><i class="fab fa-google"></i>Login/signup with gmail</a></li>
                                    </ul>
                                    <h5 class="text-center">OR</h5>
                                    <hr>
                                    <h5 class="mb-3">Login</h5>
                                     
                                        <div class="form-row">
                                            <div class="form-group col">
                                                {!! Form::email('email', $value = null, ['id'=>'email','placeholder'=>'Enter Email Address','class'=>'form-control','required']) !!}
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <input type="password" placeholder="Enter Password" class="form-control" id="password" name="password" required="required">
                                            </div>
                                        </div>
  <!--                                       <div class="form-row">
                                            <div class="form-group col">
                                                <div class="form-check mb-1">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="form-group col text-right">
                                                <a href="#" data-toggle="modal" data-target="#pwdModal">Forget Password?</a>
                                            </div>
                                        </div> -->
                                        <div class="d-flex">
                                            <button class="btn btn-danger w-100" type="submit">Login</button>
                                        </div>
                                   
                                    <div class="register-to">
                                        <h6 class="mb-0">New member? <a href="{{ route('subscriber-register')}}" class="text-danger">Sign up here</a></h6>
                                    </div>
                                 {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--modal-->
    <div id="pwdModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-2">
                <div class="modal-header">
                    <h5 class="mb-0">Forget Password?</h5>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="">
                                    <p>If you have forgotten your password you can reset it here.</p>
                                    <div class="panel-body">
                                        <fieldset>
                                            <div class="form-group">
                                                <input class="form-control form-control-lg input-lg"
                                                       placeholder="E-mail Address" name="email" type="email">
                                            </div>
                                            <input class="btn btn-warning mt-2" value="Reset Password" type="submit">
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop