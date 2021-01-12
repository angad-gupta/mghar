@include('home::include.header')

 @php 
    $coverimage = ($khelau_detail->kj_cover_image) ? asset($khelau_detail->file_full_path).'/'.$khelau_detail->kj_cover_image : asset('admin/default.png');
@endphp

    <div class="page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-slider" style="text-align: center;">
                        {!! $khelau_detail->kj_embeded_url !!}
                    </div>
                    <h5 class="mb-3">{{ $khelau_detail->kj_title }}</h5>
                    <div class="entry-meta mb-4">
                        <span class="posted-by mr-4"><i class="fa fa-user icon"></i>&nbsp; Manoranjan Ghar</span>
                        <span class="posted-time"><i class="fa fa-clock icon"></i>&nbsp; {{ $khelau_detail->created_at->diffForHumans() }}</span>
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
                                    <h4 class="mb-0">Related Videos</h4>
                                    <a class="view-all" href="#"><i class="fa fa-list"></i> View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="owl-carousel owl-theme latest">

                                    @if(sizeof($related_videos) > 0)
                                        @foreach($related_videos as $key => $val)
                                        @php 
                                            $raimages = ($val->kj_cover_image) ? asset($val->file_full_path).'/'.$val->kj_cover_image : asset('admin/default.png');
                                        @endphp
                                        <div class="item">
                                            <a href="{{ route('khelaujuhari-detail',['juhari_id'=>$val->id]) }}" class="featured-post-small">
                                                <div class="featured-post-small-img">
                                                    <img src="{{$raimages}}" alt="">
                                                    <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                                </div>
                                            </a>
                                        </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@include('home::include.footer')