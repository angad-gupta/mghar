@inject('page', '\App\Modules\Page\Repositories\PageRepository')

@php
$setting = App\Modules\Setting\Entities\Setting::getSetting();
$aboutus = $page->getBySlug('about_us');
@endphp

<style>
    @media (min-width: 576px)
    {
        .modal-dialog {
            max-width: 80%;
            margin: 1.75 rem auto;
        }
    }
    </style>


<div class="footer">
    <div class="footer__top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-3">
                    <div class="footer__item">
                        {!! $aboutus['short_content'] !!}
                        <ul class="footer__nav font-size-sm list-unstyled" style="font-size:14px;">
                            <li><i class="fas fa-map-marked" aria-hidden="true"></i>  &nbsp;
                                <a href="" data-toggle="modal" data-target="#map">
                                    {{$setting->address1}}
                                </a> 
                            </li>
                            <li><i class="fas fa-phone-alt" aria-hidden="true"></i> &nbsp; <a href="tel:{{$setting->contact_no1}}">{{$setting->contact_no1}}</a></li>
                            <li><i class="fas fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp; <a href="mailto:{{$setting->company_email}}">{{$setting->company_email}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="footer__item">
                        <ul class="footer__nav font-size-sm list-unstyled">
                            <li><a class="text-hover--white-default" href="{{ route('about-us')}}">About Manoranjan
                                    Ghar</a></li>
                            <li><a class="text-hover--white-default" href="{{ route('term-use')}}">Terms of Use</a></li>
                            <li><a class="text-hover--white-default" href="{{ route('privacy-policy')}}">Privacy
                                    Policy</a></li>
                            <li><a class="text-hover--white-default" href="{{ route('faq')}}">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-2">
                    <div class="footer__item">
                        <ul class="footer__nav font-size-sm list-unstyled">
                            <li><a class="text-hover--white-default"
                                    href="{{ route('subscription-package')}}">Subscription</a></li>
                            <li><a class="text-hover--white-default" href="{{ route('khelau')}}">Khelau Juhari</a></li>
                            <li><a class="text-hover--white-default" href="{{ route('videos')}}">Latest Videos</a></li>
                            <li><a class="text-hover--white-default" href="{{ route('my-wishlist')}}">My Wishlist</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="footer__item">
                        <!--
                        <h6>Manoranjan Ghar App</h6>
                        <div class="footer__store d-flex mb-4">
                            <a class="playstore" href="" target="_blank" rel="noopener noreferrer">&nbsp;</a>
                            <a class="playstore" href="" target="_blank" rel="noopener noreferrer">&nbsp;</a>
                        </div> -->
                        <h6>Connect with us</h6>
                        <div class="footer__social d-flex">
                            <a class="social" href="{{$setting->facebook_link}}" target="_blank"
                                rel="noopener noreferrer">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="social" href="{{$setting->twitter_link}}" target="_blank"
                                rel="noopener noreferrer">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="social" href="{{$setting->youtube_link}}" target="_blank"
                                rel="noopener noreferrer">
                                <i class="fab fa-youtube"></i>
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
                <span class="text-white font-size-sm">Copyright © {{date('Y')}} {{$setting->company_name}} by <a
                        href="https://bidhee.com/" target="_blank4" class="text-blue">Bidhee Pvt. Ltd.</a></span>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="map" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Manoranjanghar Address </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=anamnagar&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://whatismyip-address.com/fmovies"></a><br><style>.mapouter{position:relative;text-align:right;height:600px;width:100%;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:600px;width:100%;}</style></div></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>



</div>