@extends('home::layouts.master')
@section('title') Subscription @stop
@section('content')


<div class="subscription-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="featured-post">
                    <div class="row justify-content-center">
                        <div class="main-title text-center">
                            <h3 class="mb-0">Subscribe to get more out of Manoranjan Ghar</h3>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="pricing-card">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col" class="text-center">
                                                <h6><span class="badge badge-secondary">1 Month</span></h6>
                                            </th>
                                            <th scope="col" class="text-center">
                                                <h6><span class="badge badge-warning">3 Months</span></h6>
                                            </th>
                                            <th scope="col" class="text-center">
                                                <h6><span class="badge badge-danger">6 Months</span></h6>
                                            </th>
                                            <th scope="col" class="text-center">
                                                <h6><span class="badge badge-primary">1 Year</span></h6>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($subscriptionInfo as $key => $subVal)

                                        <tr>
                                            <td scope="row">{{$subVal->subsription_title}}</td>
                                            @if($subVal->is_one_month == 'yes')
                                            <td class="text-center"><i class="fas fa-check"></i></td>
                                            @elseif($subVal->is_one_month == 'no')
                                            <td class="text-center"><i class="fas fa-times"></i></td>
                                            @else
                                            <td class="text-center">{{$subVal->one_month_feature}}</td>
                                            @endif

                                            <!-- ----------------!st Month ------------------------ -->

                                            @if($subVal->is_three_month == 'yes')
                                            <td class="text-center"><i class="fas fa-check"></i></td>
                                            @elseif($subVal->is_three_month == 'no')
                                            <td class="text-center"><i class="fas fa-times"></i></td>
                                            @else
                                            <td class="text-center">{{$subVal->one_month_feature}}</td>
                                            @endif


                                            <!-- ----------------!st Month ------------------------ -->

                                            @if($subVal->is_six_month == 'yes')
                                            <td class="text-center"><i class="fas fa-check"></i></td>
                                            @elseif($subVal->is_six_month == 'no')
                                            <td class="text-center"><i class="fas fa-times"></i></td>
                                            @else
                                            <td class="text-center">{{$subVal->one_month_feature}}</td>
                                            @endif

                                            <!-- ----------------!st Month ------------------------ -->

                                            @if($subVal->is_one_year == 'yes')
                                            <td class="text-center"><i class="fas fa-check"></i></td>
                                            @elseif($subVal->is_one_year == 'no')
                                            <td class="text-center"><i class="fas fa-times"></i></td>
                                            @else
                                            <td class="text-center">{{$subVal->one_month_feature}}</td>
                                            @endif
                                        </tr>
                                        @endforeach

                                        <tr>
                                            <td scope="row"></td>
                                            <td class="text-center">Rs.{{$subscription_payment->one_month_payment}}</td>
                                            <td class="text-center">Rs.{{$subscription_payment->three_month_payment}}
                                            </td>
                                            <td class="text-center">Rs.{{$subscription_payment->six_month_payment}}</td>
                                            <td class="text-center">Rs.{{$subscription_payment->one_year_payment}}</td>
                                        </tr>

                                        @php use Illuminate\Support\Facades\Auth; @endphp

                                        @if(Auth::guard('subscriber')->check())
                                        <tr>
                        
                                            <td scope="row"></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#paymentOneMonthModal">
                                                    Select
                                                </button>
                                
                                            </td>

                                            <td class="text-center">
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#paymentThreeMonthModal">
                                                    Select
                                                </button>

                                            </td>

                                            <td class="text-center">
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#paymentSixMonthModal">
                                                    Select
                                                </button>
                                            </td>

                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paymentOneYearModal">
                                                    Select
                                                </button>
                                            </td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td scope="row"></td>
                                            <td colspan="4" class="text-warning text-center" scope="row">Are you
                                                interested any of these Package ? Please <a class="text-danger"
                                                    href="{{ route('subscriber-login')}}">Login</a> and Select Your
                                                Package and Enjoy your day.</td>
                                        </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="paymentOneMonthModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Select Payment Option</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
            <img src="https://thehimalayantimes.com/uploads/imported_images/wp-content/uploads/2019/08/Khalti-logo-1-1024x571.jpg" 
            id="payment-button" type="Subscription" plan="one_month" height="42"
            style="width: 100px;margin:20px;"
            amount="{{$subscription_payment->one_month_payment}}"
            class="payment-button "
            value="{{$subscription_payment->one_month_payment}}"/>

            <img src="{{ asset('home/images/ime.svg') }}" alt="ime" height="45" 
            style="width: 45px;transform: scale(2.2);margin:20px;border-radius:10px;"
            class="ime"
            data-payment="{{ $subscription_payment->one_month_payment }}"
            data-plan="one_month">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="paymentThreeMonthModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Select Payment Option</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
            <img src="https://thehimalayantimes.com/uploads/imported_images/wp-content/uploads/2019/08/Khalti-logo-1-1024x571.jpg" 
            id="payment-button" type="Subscription" plan="one_month" height="42"
            style="width: 100px;margin:20px;"
            amount="{{$subscription_payment->three_month_payment}}"
            class="payment-button "
            value="{{$subscription_payment->three_month_payment}}"/>

            <img src="{{ asset('home/images/ime.svg') }}" alt="ime" height="45" 
            style="width: 45px;transform: scale(2.2);margin:20px;border-radius:10px;"
            class="ime"
            data-payment="{{ $subscription_payment->three_month_payment }}"
            data-plan="one_month">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="paymentSixMonthModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Select Payment Option</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
            <img src="https://thehimalayantimes.com/uploads/imported_images/wp-content/uploads/2019/08/Khalti-logo-1-1024x571.jpg" 
            id="payment-button" type="Subscription" plan="one_month" height="42"
            style="width: 100px;margin:20px;"
            amount="{{$subscription_payment->six_month_payment}}"
            class="payment-button "
            value="{{$subscription_payment->six_month_payment}}"/>

            <img src="{{ asset('home/images/ime.svg') }}" alt="ime" height="45" 
            style="width: 45px;transform: scale(2.2);margin:20px;border-radius:10px;"
            class="ime"
            data-payment="{{ $subscription_payment->six_month_payment }}"
            data-plan="one_month">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="paymentOneYearModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Select Payment Option</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
            <img src="https://thehimalayantimes.com/uploads/imported_images/wp-content/uploads/2019/08/Khalti-logo-1-1024x571.jpg" 
            id="payment-button" type="Subscription" plan="one_month" height="42"
            style="width: 100px;margin:20px;"
            amount="{{$subscription_payment->one_year_payment}}"
            class="payment-button "
            value="{{$subscription_payment->one_year_payment}}"/>

            <img src="{{ asset('home/images/ime.svg') }}" alt="ime" height="45" 
            style="width: 45px;transform: scale(2.2);margin:20px;border-radius:10px;"
            class="ime"
            data-payment="{{ $subscription_payment->one_year_payment }}"
            data-plan="one_month">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


@stop

@section('script')
<script>
    $(document).ready(function() {
        $('.ime').click(function(){
            var amount = $(this).data('payment')
            var plan = $(this).data('plan')

            console.log(plan)
            // return
            var url = '{{ route("payment.ime", [":amount",":plan"]) }}';
            url = url.replace(':amount',amount).replace(':plan',plan);
            window.location.href=url;

    })
})
</script>
@endsection