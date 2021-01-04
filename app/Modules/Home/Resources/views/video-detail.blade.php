@include('home::include.header')

 @php 
    $coverimage = ($video_detail->video_cover_image) ? asset($video_detail->file_full_path).'/'.$video_detail->video_cover_image : asset('admin/default.png');
@endphp

    <div class="page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-slider" style="text-align: center;">
                        {!! $video_detail->video_embeded_url !!}
                    </div>
                    <h5 class="mb-3">{{ $video_detail->video_title }}</h5>
                    <div class="entry-meta mb-4">
                        <span class="posted-by mr-4"><i class="fa fa-user icon"></i>&nbsp; Manoranjan Ghar</span>
                        <span class="posted-time"><i class="fa fa-clock icon"></i>&nbsp; {{ $video_detail->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="featured-post-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-post">
                        <div class="row">
                            <div class="col-12">
                                <div class="main-title">
                                    <h4 class="mb-0">More Like This</h4>
                                    <a class="view-all" href="#"><i class="fa fa-list"></i> View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="owl-carousel owl-theme latest">
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img16.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img17.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img18.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img19.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img20.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img6.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="full-width mb-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <img src="https://www.onlinekhabar.com/wp-content/uploads/2020/10/1230x100_Online-Khabar-Banner.jpg" alt="">
                </div>
            </div>
        </div>
    </div>


    <div class="featured-post-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-post">
                        <div class="row">
                            <div class="col-12">
                                <div class="main-title">
                                    <h4 class="mb-0">Artist Related</h4>
                                    <a class="view-all" href="#"><i class="fa fa-list"></i> View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="owl-carousel owl-theme latest">
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img14.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img13.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img12.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img11.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img10.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img9.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img8.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="featured-post-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-post">
                        <div class="row">
                            <div class="col-12">
                                <div class="main-title">
                                    <h4 class="mb-0">Featured Videos</h4>
                                    <a class="view-all" href="#"><i class="fa fa-list"></i> View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="owl-carousel owl-theme latest">
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img16.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img17.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img18.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img19.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img20.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{asset('home/images/v-img6.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('home::include.footer')