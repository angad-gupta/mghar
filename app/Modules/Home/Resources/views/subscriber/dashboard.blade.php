@extends('home::layouts.master')
@section('title')Subscriber Dashboard @stop
@section('content')


    <div class="featured-post-block mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main-title">
                        <h3 class="mb-0">My Account</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="inner-page dashboard mb-5"> 
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                           role="tab"
                           aria-controls="v-pills-profile" aria-selected="false"><i class="fa fa-border-all"></i>&nbsp;
                            Membership & Billing</a>
                        <a class="nav-link" id="v-pills-wishlist-tab" data-toggle="pill" href="#v-pills-wishlist"
                           role="tab"
                           aria-controls="v-pills-wishlist" aria-selected="false"><i class="fa fa-heart"></i> &nbsp;My
                            Plan</a>
                        <a class="nav-link" id="v-pills-address-tab" data-toggle="pill" href="#v-pills-address"
                           role="tab"
                           aria-controls="v-pills-address" aria-selected="false"><i class="fa fa-map-marker"></i>&nbsp;
                            Purchase History</a>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fa fa-cog"></i>&nbsp;
                            My Account Details</a>
                        <a class="nav-link" id="v-pills-password-tab" data-toggle="pill" href="#v-pills-password" role="tab" aria-controls="v-pills-password" aria-selected="false"><i class="fa fa-lock"></i>&nbsp;
                            Change Password</a>
                    </div>
                </div>

                <div class="col-md-8 col-lg-9 mt-4 mt-md-0">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                             aria-labelledby="v-pills-profile-tab">
                            <div class="d-flex justify-content-between">
                                <h4>Membership & Billing</h4>
                            </div>
                            <div class="tab-content__block">
                                @if($subscriber_plan)
                                    @php
                                     $remaining = now()->diffInDays(Carbon\Carbon::parse($subscriber_plan->end_date), false);
                                    @endphp

                                    @if($remaining >0)
                                        <div class="alert alert-success" role="alert">
                                            You are a member since {{date('M j, Y',strtotime($subscriber_member->created_at))}}. And Your Plan  
                                            reminaing Days is {{$remaining}} day/s.If you want to renew before Time, Please <a class="btn" style="border-color: #192133;background-color: #192133;padding: 2px 2px 2px 2px;color: white;" href="{{ route('subscription-package')}}">Renew / Subscribe Now</a>
                                        </div>
                                    @else
                                        <div class="alert alert-danger" role="alert">
                                            You are Out of Subsription Time, PLease Renew Soon.<a href="{{ route('subscription-package')}}">Subscribe Now</a>. Otherwise Your Account might be Disabled.
                                    </div>
                                    @endif

                                @else
                                   <div class="alert alert-danger" role="alert">
                                        You have not yet subscribed. <a href="{{ route('subscription-package')}}">Subscribe Now</a> and become a member for exclusive member benefits.
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-wishlist" role="tabpanel"
                             aria-labelledby="v-pills-wishlist-tab">
                            <div class="d-flex justify-content-between">
                                <h4>My Plan Details</h4>
                            </div>
                            <div class="tab-content__block">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th width="15%">Date</th>
                                        <th width="25%">My Plan Details</th>
                                        <th class="text-center" width="5%">Start Date</th>
                                        <th class="text-center" width="15%">Expiry Date</th>
                                        <th class="text-center">Payment Method</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($subscriber_plan)
                                    <tr>
                                        <td>{{date('M j, Y',strtotime($subscriber_plan->date))}}</td>
                                        <td class="productInfo">
                                            <h6 class="mb-0">{{ ucfirst(str_replace('_',' ',$subscriber_plan->plan))}} Package</h6>
                                        </td>
                                        <td class="text-center">{{$subscriber_plan->start_date}}</td>
                                        <td class="text-center">{{$subscriber_plan->end_date}}</td>
                                        <td class="text-center"><img title="khalti" style="height: auto;width: 20%;"  src="{{asset('home/images/khalti.png')}}"></td>
                                        <td class="text-center">{{ucfirst($subscriber_plan->status)}}</td>   
                                    </tr>
                                    @else
                                    <tr colspan="6">You have not yet subscribed. <a href="{{ route('subscription-package')}}">Subscribe Now</a> and become a member for exclusive member benefits.</tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-address" role="tabpanel"
                             aria-labelledby="v-pills-address-tab">
                            <div class="d-flex justify-content-between">
                                <h4>Purchase History</h4>
                            </div>
                            <div class="tab-content__block">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th width="15%">Date</th>
                                        <th width="15%">My Package</th>
                                        <th class="text-center" width="5%">Start Date</th>
                                        <th class="text-center" width="15%">Expiry Date</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Type</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if($subscriber_purchase_history->total() != 0) 
                                            @foreach($subscriber_purchase_history as $key => $value)
                                            <tr>
                                                <td>{{date('M j, Y',strtotime($value->payment_date))}}</td>
                                                <td class="productInfo">
                                                    <h6 class="mb-0">{{ ucfirst(str_replace('_',' ',$value->plan))}}</h6>
                                                </td>
                                                <td class="text-center">{{$value->start_date}}</td>
                                                <td class="text-center">{{$value->end_date}}</td>
                                                <td class="text-center">Rs. {{$value->total_amount}}</td>
                                                <td class="text-center">{{$value->type}}</td>
                                                <td class="text-center">{{ucfirst($value->status)}}</td>   
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="v-pills-settings" role="tabpanel"
                             aria-labelledby="v-pills-settings-tab">
                            <div class="d-flex justify-content-between">
                                <h4>Account Details</h4>
                            </div>
                            <div class="tab-content__block">
                            	{!! Form::model($subscriber_profile,['method'=>'PUT','route'=>['subscriber.update',$subscriber_profile->id],'class'=>'needs-validation','id'=>'team_submit','role'=>'form','files'=>true]) !!} 
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">User Name</label>
                                            {!! Form::text('username', $value = null, ['id'=>'username','placeholder'=>'Enter Username','class'=>'edit_content form-control','required','readonly']) !!}
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom02">Full Name</label>
                                             {!! Form::text('full_name', $value = null, ['id'=>'full_name','placeholder'=>'Enter Full Name','class'=>'edit_content form-control','required','readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="exampleInputEmail1">Email address</label>
                                            {!! Form::email('email', $value = null, ['id'=>'email','placeholder'=>'Enter Email','class'=>'form-control','required','readonly']) !!}
                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom02">Contact No.</label>
                                            {!! Form::text('mobile_no', $value = null, ['id'=>'mobile_no','placeholder'=>'Enter Mobile No.','class'=>'edit_content form-control','readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row mt-4">
                                        <div class="col-sm-10">
                                        	 <button class="btn btn-warning edit_account" type="button">Edit Info</button>

                                        <button class="btn btn-success submit_account" type="submit" style="display: none;">Update Info</button>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                         <div class="tab-pane fade" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab">
                            <div class="d-flex justify-content-between">
                                <h4>For Better Security, Update Password Frequently.</h4>
                            </div>
                            <div class="tab-content__block">
                            	{!! Form::open(['route'=>'subscriber-update-password','method'=>'POST','class'=>'needs-validation','role'=>'form','files' => true]) !!}
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">Old Password</label>
                                            {!! Form::text('old_password', $value = null, ['id'=>'old_password','placeholder'=>'Old Password','class'=>'form-control']) !!}
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom02">New Password</label>
                                            {!! Form::password('password', ['id'=>'password','placeholder'=>'New Password','class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row mt-4">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-success">Update Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <!--modal-->
    <div id="changePlanModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-2">
                <div class="modal-header">
                    <h5 class="mb-0">Change my Plan</h5>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">My Plan</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option>Monthly : Rs. 400</option>
                                                <option>Quarterly : Rs. 800</option>
                                                <option>Anually : Rs. 1000</option>
                                            </select>
                                        </div>
                                        <div class="form-group row mt-4">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


	@section('script')
		<script type="text/javascript">
		    $(document).ready(function(){


		        $(document).on('click', '.edit_account', function () {

		            $('.edit_content').attr('readonly', false); 
		            $('.edit_content').removeClass('text-grey'); 
		            $('.edit_content').addClass('text-dark'); 
		            $('.edit_account').hide();
		            $('.submit_account').show();

		        });
		    
		    });
		</script>
	@stop

@stop