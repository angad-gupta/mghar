<div class="footer">
    <div class="footer__top">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer__item">
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum</p>
                        <ul class="footer__nav font-size-sm list-unstyled">
                            <li>Rabi Bhavan, Kalimati, Kathmandu-10, Bagmati, Nepal</li>
                            <li>Phone: +012-345-6789</li>
                            <li>Email: info@test.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer__item">
                        <ul class="footer__nav font-size-sm list-unstyled">
                            <li><a class="text-hover--white-default" href="#">About Manoranjan Ghar</a></li>
                            <li><a class="text-hover--white-default" href="#">Terms of Use</a></li>
                            <li><a class="text-hover--white-default" href="#">Privacy Policy</a></li>
                            <li><a class="text-hover--white-default" href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="footer__item">
                        <ul class="footer__nav font-size-sm list-unstyled">
                            <li><a class="text-hover--white-default" href="#">Home</a></li>
                            <li><a class="text-hover--white-default" href="#">Videos</a></li>
                            <li><a class="text-hover--white-default" href="#">Gallery</a></li>
                            <li><a class="text-hover--white-default" href="#">Celeb Bio</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer__item">
                        <h6>Manoranjan Ghar App</h6>
                        <div class="footer__store d-flex mb-4">
                            <a class="playstore" href="" target="_blank" rel="noopener noreferrer">&nbsp;</a>
                            <a class="playstore" href="" target="_blank" rel="noopener noreferrer">&nbsp;</a>
                        </div>
                        <h6>Connect with us</h6>
                        <div class="footer__social d-flex">
                            <a class="social" href="" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="social" href="" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom pt-3 pb-3">
        <div class="container">
            <div class="row justify-content-center">
                <span class="text-white font-size-sm">Copyright © 2019 Manoranjan Ghar by <a href="#" class="text-blue">Bidhee Pvt. Ltd.</a></span>
            </div>
        </div>
    </div>
</div>


    {!! Form::hidden('message', $message, ['class'=>'message']) !!}
</body>

<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js"></script>
<script src="{{asset('home/js/magnific.min.js')}}"></script>
<script src="{{asset('home/js/custom.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script src="{{asset('admin/validation/subscriberRegister.js')}}"></script>
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

    var is_message = $('.message').val();

    if (is_message != '') {
        $('#exampleModal').modal('show');
        return false;
    }

})
</script>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0" nonce="wgNUvYEI"></script>

</html>