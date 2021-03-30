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
                    <form id="ime-form" action="https://stg.imepay.com.np:7979/WebCheckout/Checkout" method="post">
                        <input type="hidden" id="token-id" name="TokenId" value="">
                        <input type="hidden" id="merchant-code" name="MerchantCode" value="">
                        <input type="hidden" id="ref-id" name="RefId" value="">
                        <input type="hidden" id="tran-amount" name="TranAmount" value="">
                        <input type="hidden" name="Method" value="GET">
                        <input type="hidden" name="RespUrl" value="">
                        <input type="hidden" name="CancelUrl" value="">
                    </form>
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
                                                    data-payment="{{ $subscription_payment->one_month_payment }}">
                                            </td>

                                            <td class="text-center"><button id="payment-button" type="Subscription"
                                                    plan="three_month"
                                                    value="{{$subscription_payment->three_month_payment}}"
                                                    amount="{{$subscription_payment->three_month_payment}}"
                                                    class="payment-button btn btn-warning">Select</button>
                                                <img src="{{ asset('home/images/ime.jpg') }}" alt="ime" height="45"
                                                    style="width: 45px;">

                                            </td>

                                            <td class="text-center"><button id="payment-button" type="Subscription"
                                                    plan="six_month"
                                                    value="{{$subscription_payment->six_month_payment}}"
                                                    amount="{{$subscription_payment->six_month_payment}}"
                                                    class="payment-button btn btn-danger">Select</button>
                                                <img src="{{ asset('home/images/ime.jpg') }}" alt="ime" height="45"
                                                    style="width: 45px;">

                                            </td>

                                            <td class="text-center"><button id="payment-button" type="Subscription"
                                                    plan="one_year" value="{{$subscription_payment->one_year_payment}}"
                                                    amount="{{$subscription_payment->one_year_payment}}"
                                                    class="payment-button btn btn-primary">Select</button>
                                                <img src="{{ asset('home/images/ime.jpg') }}" alt="ime" height="45"
                                                    style="width: 45px;">
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
            var payment = $(this).data('payment')
            var d = new Date();
            var refId = "Ref-" + d.getTime();
            console.log(payment)
            console.log(refId)
            var data ={
                'MerchantCode': 'GHAR',
                'RefId': refId,
                'Amount': payment,
            }

            console.log(data)
            console.log(btoa("ghar:ime@123"))
            // return
            $.ajax({
                type: "POST",
                url: "https://stg.imepay.com.np:7979/api/Web/GetToken",
                headers: {
                    "Access-Control-Allow-Origin": "*",
                    "Authorization": "Basic " + btoa("ghar:ime@123"),
                    "Module":btoa("GHAR")
                },
                dataType: 'json',
                data:data,
                success: function (res){
                  console.log(res)
                  return;
                  if(res && res.data && res.data.TokenId) {
                    let data = {
                    merchant_code: 'MERCHANT CODE',
                    token_id: res.data.TokenId,
                    amount: res.data.Amount,
                    reference_id: res.data.RefId,
                    status: res.data.ResponseCode,
                    };
                    console.log(data);
                    $.ajax({
                        type:"POST",
                        url:"/ime_transaction/save",
                        data:data,
                        success: function(res){
                        $('#token-id').val(res.data.token_id)
                        $('#merchant-code').val(res.data.merchant_code)
                        $('#ref-id').val(res.data.reference_id)
                        $('#tran-amount').val(res.data.amount)

                        $('#ime-form').submit();
                        },
                    })
                    }else{
                        alert("Sorry for the incontinence, we cannot communicate with payment server at the moment. Please try again later.")
                    }
                },
                error: function (xhr,ajaxOptions,throwError){
                    //Error block
                },
            })
        })
    })
</script>
@endsection