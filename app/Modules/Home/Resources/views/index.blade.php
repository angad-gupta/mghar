@include('home::include.header')

    <div class="banner-slider">
        <div class="container-fluid">
            <div class="owl-carousel owl-theme banner">
                <div class="item">
                    <a href="video-single.php" class="sy-banner sy-bg sy-bg--overlay sy-bg--overlay-dark text-white"
                       style="background-image: url('https://cdn.mos.cms.futurecdn.net/9vb2YWe3j5GwoVJagDzxLQ.jpg');">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="sy-banner-info">
                                        <h2>Live Action Movie - Mulan</h2>
                                        <span>Action  |  2020</span>
                                        <p class="mb-0">Mulan is a 2020 American action drama film produced by Walt Disney Pictures. It is a live-action adaptation of Disney's 1998 animated film of the same name, itself based on the Chinese folklore story, "The Ballad of Mulan".</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <!-- banner image size: 1600*500-->
                    <a href="video-single.php" class="sy-banner sy-bg sy-bg--overlay sy-bg--overlay-dark text-white"
                       style="background-image: url('https://i0.wp.com/utsav360.com/wp-content/uploads/2019/05/dal-bhat-tarkari-poster.jpg');">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="sy-banner-info">
                                        <h2>Dal Bhat Tarkari</h2>
                                        <span>Comedy, Family  |  2020</span>
                                        <p class="mb-0">
                                            Respected senior comedian actors Madan Krishna Shrestha and Hari Bamsha Acharya’s new most-awaited movie ‘Dal Bhat Tarkari’ is releasing today (Baisakh 20/May 3) on Qfx, FCube, and BigMovies. Ever since the Mahajodi announced their new movie on August 15, 2018, people were super excited and couldn’t wait to the epic duo once again together onscreen.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
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
                                    <h4 class="mb-0">Latest Videos</h4>
                                    <a class="view-all" href="category.php"><i class="fa fa-list"></i> View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="owl-carousel owl-theme latest">

	
									@if($latest_videos->total() != 0) 
						                @foreach($latest_videos as $key => $value)
						                @php 
						                	$pimages = ($value->video_cover_image) ? asset($value->file_full_path).'/'.$value->video_cover_image : asset('admin/default.png');
						                @endphp
		                                    <div class="item">
		                                        <div class="featured-post-small">
		                                            <div class="featured-post-small-img">
		                                                <img src="{{$pimages}}" alt="Video Image">
		                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
		                                            </div>
		                                            <div class="featured-post_content">
		                                                <a href="{{ route('video-detail',['video_id'=>$value->id]) }}"><h5>{{ $value->video_title }}</h5></a>
		                                                <span class="posted-time"><i class="fa fa-clock icon"></i> {{ $value->created_at->diffForHumans() }}</span>
		                                            </div>
		                                        </div>
		                                    </div>
		                               	@endforeach
					                @else
					                <span>No Latest Video Added</span>
					                @endif


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
                                    <h4 class="mb-0">Popular Videos</h4>
                                    <a class="view-all" href="category.php"><i class="fa fa-list"></i> View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="owl-carousel owl-theme latest">

                                	@if($popular_videos->total() != 0) 
						                @foreach($popular_videos as $key => $value)
						                @php 
						                	$pimages = ($value->video_cover_image) ? asset($value->file_full_path).'/'.$value->video_cover_image : asset('admin/default.png');
						                @endphp
		                                    <div class="item">
		                                        <div class="featured-post-small">
		                                            <div class="featured-post-small-img">
		                                                <img src="{{$pimages}}" alt="Video Image">
		                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
		                                            </div>
		                                            <div class="featured-post_content">
		                                                <a href="video-single.php"><h5>{{ $value->video_title }}</h5></a>
		                                                <span class="posted-time"><i class="fa fa-clock icon"></i> {{ $value->created_at->diffForHumans() }}</span>
		                                            </div>
		                                        </div>
		                                    </div>
		                               	@endforeach
					                @else
					                <span>No Popular Video Added</span>
					                @endif

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
                                    <h4 class="mb-0">New on Manoranjan Ghar</h4>
                                    <a class="view-all" href="category.php"><i class="fa fa-list"></i> View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="owl-carousel owl-theme latest">
                                    <div class="item">
                                        <a href="#" class="featured-post-big">
                                            <div class="featured-post-big-img">
                                                <img src="{{asset('home/images/v-img7.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-big">
                                            <div class="featured-post-big-img">
                                                <img src="{{asset('home/images/v-img1.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-big">
                                            <div class="featured-post-big-img">
                                                <img src="{{asset('home/images/v-img2.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-big">
                                            <div class="featured-post-big-img">
                                                <img src="{{asset('home/images/v-img3.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-big">
                                            <div class="featured-post-big-img">
                                                <img src="{{asset('home/images/v-img4.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-big">
                                            <div class="featured-post-big-img">
                                                <img src="{{asset('home/images/v-img5.png')}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="featured-post-big">
                                            <div class="featured-post-big-img">
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

    <div class="featured-post-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-post">
                        <div class="row">
                            <div class="col-12">
                                <div class="main-title">
                                    <h4 class="mb-0">Trending Videos</h4>
                                    <a class="view-all" href="category.php"><i class="fa fa-list"></i> View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="owl-carousel owl-theme latest">

                                	@if($trending_videos->total() != 0) 
						                @foreach($trending_videos as $key => $value)
						                @php 
						                	$pimages = ($value->video_cover_image) ? asset($value->file_full_path).'/'.$value->video_cover_image : asset('admin/default.png');
						                @endphp
		                                    <div class="item">
		                                        <a href="#" class="featured-post-small">
		                                            <div class="featured-post-small-img">
		                                                <img src="{{$pimages}}" alt="Video Image">
		                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
		                                            </div>
		                                        </a>
		                                    </div>
		                               	@endforeach
					                @else
					                <span>No Trending Video Added</span>
					                @endif

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
                                    <h4 class="mb-0">Videos Recommend for You</h4>
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

    <div class="featured-post-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-post">
                        <div class="row">
                            <div class="col-12">
                                <div class="main-title">
                                    <h4 class="mb-0">Latest News/Blog</h4>
                                    <a class="view-all" href="category.php"><i class="fa fa-list"></i> View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex">
                                <div class="featured-post-small">
                                    <div class="featured-post-small-img">
                                        <img src="{{asset('home/images/v-img.png')}}" alt="">
                                    </div>
                                    <div class="featured-post_content">
                                        <a href="#"><h5>Nepali Film Industry Faces NPR 1 Billion Loss Amid COVID-19!</h5></a>
                                        <span class="posted-time"><i class="fa fa-clock icon"></i> 1 hrs ago</span>
                                        <p class="mb-0 pt-1">"Lajjawati Jhar" is Third Single of Mahesh Kafle.
                                            ✹Available at Spotify, Apple Music, JioSaavn : https://bit.ly/33OPFPu</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="featured-post-small">
                                    <div class="featured-post-small-img">
                                        <img src="{{asset('home/images/v-img1.png')}}" alt="">
                                    </div>
                                    <div class="featured-post_content">
                                        <a href="#"><h5>Nepali Film Industry Faces NPR 1 Billion Loss Amid COVID-19!</h5></a>
                                        <span class="posted-time"><i class="fa fa-clock icon"></i> 1 hrs ago</span>
                                        <p class="mb-0 pt-1">Twelve Notes Presents:-
                                            JAIL PANI SAHULA | जेल पनि सहुँला | Melina Rai & Bal Bahadur Rajbanshi | Feat. Laxmi Bardewa Jiban Bhattarai / Raj Khadka New Nepali song 2020 </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="featured-post-small">
                                    <div class="featured-post-small-img">
                                        <img src="{{asset('home/images/v-img2.png')}}" alt="">
                                    </div>
                                    <div class="featured-post_content">
                                        <a href="#"><h5>Nepali Film Industry Faces NPR 1 Billion Loss Amid COVID-19!</h5></a>
                                        <span class="posted-time"><i class="fa fa-clock icon"></i> 1 hrs ago</span>
                                        <p class="mb-0 pt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="featured-post-small">
                                    <div class="featured-post-small-img">
                                        <img src="{{asset('home/images/v-img3.png')}}" alt="">
                                    </div>
                                    <div class="featured-post_content">
                                        <a href="#"><h5>Nepali Film Industry Faces NPR 1 Billion Loss Amid COVID-19!</h5></a>
                                        <span class="posted-time"><i class="fa fa-clock icon"></i> 1 hrs ago</span>
                                        <p class="mb-0 pt-1">Ut diam quam nulla porttitor massa id. Et magnis dis parturient montes nascetur ridiculus mus mauris. Odio facilisis mauris sit amet massa vitae tortor condimentum.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="featured-post-small">
                                    <div class="featured-post-small-img">
                                        <img src="{{asset('home/images/v-img4.png')}}" alt="">
                                    </div>
                                    <div class="featured-post_content">
                                        <a href="#"><h5>Nepali Film Industry Faces NPR 1 Billion Loss Amid COVID-19!</h5></a>
                                        <span class="posted-time"><i class="fa fa-clock icon"></i> 1 hrs ago</span>
                                        <p class="mb-0 pt-1">Morbi tristique senectus et netus et malesuada fames. Ac tincidunt vitae semper quis.</p>
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