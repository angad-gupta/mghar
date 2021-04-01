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
                                                <button id="payment-button" type="Subscription" plan="one_month"
                                                    amount="{{$subscription_payment->one_month_payment}}"
                                                    class="payment-button btn btn-secondary"
                                                    value="{{$subscription_payment->one_month_payment}}">Select</button>
                                                <img src="{{ asset('home/images/ime.svg') }}" alt="ime" height="45"
                                                    style="width: 45px;transform: scale(2.3);margin-left: 27px;"
                                                    class="ime"
                                                    data-payment="{{ $subscription_payment->one_month_payment }}"
                                                    data-plan="one_month">
                                            </td>

                                            <td class="text-center"><button id="payment-button" type="Subscription"
                                                    plan="three_month"
                                                    value="{{$subscription_payment->three_month_payment}}"
                                                    amount="{{$subscription_payment->three_month_payment}}"
                                                    class="payment-button btn btn-warning">Select</button>
                                                <img src="{{ asset('home/images/ime.svg') }}" alt="ime" height="45"
                                                    style="width: 45px;transform: scale(2.3);margin-left: 27px;"
                                                    class="ime"
                                                    data-payment="{{ $subscription_payment->three_month_payment }}"
                                                    data-plan="three_month">

                                            </td>

                                            <td class="text-center"><button id="payment-button" type="Subscription"
                                                    plan="six_month"
                                                    value="{{$subscription_payment->six_month_payment}}"
                                                    amount="{{$subscription_payment->six_month_payment}}"
                                                    class="payment-button btn btn-danger">Select</button>
                                                <img src="{{ asset('home/images/ime.svg') }}" alt="ime" height="45"
                                                    style="width: 45px;transform: scale(2.3);margin-left: 27px;"
                                                    class="ime"
                                                    data-payment="{{ $subscription_payment->six_month_payment }}"
                                                    data-plan="six_month">
                                            </td>

                                            <td class="text-center"><button id="payment-button" type="Subscription"
                                                    plan="one_year" value="{{$subscription_payment->one_year_payment}}"
                                                    amount="{{$subscription_payment->one_year_payment}}"
                                                    class="payment-button btn btn-primary">Select</button>
                                                <img src="{{ asset('home/images/ime.svg') }}" alt="ime" height="45"
                                                    style="width: 45px;transform: scale(2.3);margin-left: 27px;"
                                                    class="ime"
                                                    data-payment="{{ $subscription_payment->one_year_payment }}"
                                                    data-plan="one_year">
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