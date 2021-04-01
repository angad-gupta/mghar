<html>

<head> </head>

<body>
    <form action="https://stg.imepay.com.np:7979/WebCheckout/Checkout" method="post" id="dynForm">
        <input type="hidden" name="TokenId" value="{{$tokenId}}">
        <input type="hidden" name="MerchantCode" value="GHAR">
        <input type="hidden" name="RefId" value="{{$refId}}">
        <input type="hidden" name="TranAmount" value="{{$tranAmount}}">
        <input type="hidden" name="Method" value="POST">
        <input type="hidden" name="RespUrl" value="{{ env('BASE_URL').'/subscriber/payment/ime/status' }}">
        <input type="hidden" name="CancelUrl" value="{{ env('BASE_URL').'/subscription-package' }}">
    </form>
</body>
<script>
    document.getElementById("dynForm").submit();
</script>
<html>