<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css">
    <link href="{{asset('home/css/magnific.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet">
    <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script data-ad-client="ca-pub-6368505889757007" async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <style>
        .player {
            width: 100% !important;
            max-width: none !important;
        }
    </style>

    @yield('share_head')

</head>

<body>

    @include('home::include.header')

    @yield('content')

    @include('home::include.footer')


    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
    <!-- Paste this code anywhere in you body tag -->
    <script>
        var plan;

    $(document).on('click','.payment-button',function(){
      plan = $(this).attr('plan');
    });

    var config = {
        // replace the publicKey with yours
        "publicKey": "live_public_key_d45c85b8cf064e7286b6c4d656d62c08",
        "productUrl": "https://manoranjanghar.com/",
        "paymentPreference": [
            "KHALTI",
            "EBANKING",
            "MOBILE_BANKING",
            "CONNECT_IPS",
            "SCT",
            ],
        "eventHandler": {
            onSuccess (payload) {
                // hit merchant api for initiating verfication
                console.log(payload);
                var token = '{{csrf_token()}}';
                // hit merchant api for initiating verfication
                    $.ajax({
                        url:"{{url('/subscriber/payment-verification')}}",
                        type: 'POST',
                        data:{
                            amount : payload.amount,
                            product_identity : payload.product_identity,
                            product_name : payload.product_name,
                            trans_token : payload.token,
                            _token: token
                        },
                        success: function(res)
                        {
                            if(res == '1'){
                                window.location.href = "subscriber/sdashboard";
                                console.log("transaction succedd"); // you can return to success page
                            }else{
                                alert('Transaction Failed. Please Try Again.');
                            }
                        },
                        error: function(error)
                        {
                            console.log("transaction failed");
                        }
                    })
            },
            onError (error) {
                console.log(error);
            },
            onClose () {
                console.log('widget is closing');
            }
        }
    };

    var checkout = new KhaltiCheckout(config);
    // var btn = document.getElementById("payment-button");
    // btn.onclick = function () { alert('test')

    $(document).on('click','.payment-button',function(){
        var samount = $(this).val();
        var plan = $(this).attr('plan');
        var type = $(this).attr('type');
        var amountInPaisa = samount * 100;
        // minimum transaction amount must be 10, i.e 1000 in paisa.
        checkout.show({amount: amountInPaisa,productIdentity:type,productName:plan});
    });
    </script>
    <!-- Paste this code anywhere in you body tag -->


</body>



<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js"></script>
<script src="{{asset('home/js/magnific.min.js')}}"></script>
<script src="{{asset('home/js/custom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>

@yield('script')

<script>
    $(document).ready(function() {
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

     $('#seach_video').on('click',function(){
            var seach_video = $('#search_val').val();
            var seach_url = $('#search_url').val();

            window.location.href = seach_url +"?search_val=" + seach_video;
            return false;

    });


})
</script>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0"
    nonce="wgNUvYEI"></script>

<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

</html>