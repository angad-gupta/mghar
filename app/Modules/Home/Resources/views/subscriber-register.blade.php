@include('home::include.header')
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

    <div class="register-page page page--overlay" style="background-image: url('https://assets.nflxext.com/ffe/siteui/vlv3/9a818ce7-5b19-4a0a-8bec-e4a233c8661b/edf0202d-cb01-427f-bd3d-c0f8774f53a7/NP-en-20210104-popsignuptwoweeks-perspective_alpha_website_small.jpg');">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-post">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-4">
                                {!! Form::open(['route'=>'subscriber-register.store','method'=>'POST','id'=>'subscriber_submit','class'=>'register-form','role'=>'form']) !!}
                                <h3 class="mb-4">Register</h3>
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
                                            <input type="password" placeholder="Enter Password" class="form-control" id="rpassword" name="password" >
                                            <span toggle="#rpassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <input type="password" placeholder="Enter Re-Type  Password" class="form-control" id="c_password" name="c_password" >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <div class="form-check mb-1">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1" required="required">
                                                <label class="form-check-label" for="exampleCheck1">I agree term and conditions.</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button class="btn btn-primary w-100" type="submit">Register</button>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@include('home::include.footer')

