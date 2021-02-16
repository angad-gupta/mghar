@inject('page', '\App\Modules\Page\Repositories\PageRepository')

@php
    $setting = App\Modules\Setting\Entities\Setting::getSetting(); 
    $aboutus = $page->getBySlug('about_us');
@endphp

<div class="footer">
    <div class="footer__top">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer__item">
                        {!! $aboutus['short_content']  !!}
                        <ul class="footer__nav font-size-sm list-unstyled">
                            <li>{{$setting->address1}}</li>
                            <li>Phone: {{$setting->contact_no1}}</li>
                            <li>Email: {{$setting->company_email}}</li>
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
                            <li><a class="text-hover--white-default" href="{{ route('home')}}">Home</a></li>
                            <li><a class="text-hover--white-default" href="{{ route('khelau')}}">Khelau Juhari</a></li>
                            <li><a class="text-hover--white-default" href="{{ route('videos')}}">Latest Videos</a></li>
                            <li><a class="text-hover--white-default" href="{{ route('my-wishlist')}}">My Watchlist</a></li>
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
                            <a class="social" href="{{$setting->facebook_link}}" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="social" href="{{$setting->twitter_link}}" target="_blank" rel="noopener noreferrer">
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
                <span class="text-white font-size-sm">Copyright © {{date('Y')}} {{$setting->company_name}} by <a href="https://bidhee.com/" target="_blank4" class="text-blue">Bidhee Pvt. Ltd.</a></span>
            </div>
        </div>
    </div>
</div>
