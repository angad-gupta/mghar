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

                                    @if(sizeof($artist_related) > 0)
                                        @foreach($artist_related as $key => $val)
                                        @php 
                                            $videoInfo = App\Modules\Video\Entities\Video::findByVidId($val->video_id);
                                            $raimages = ($videoInfo->video_cover_image) ? asset($videoInfo->file_full_path).'/'.$videoInfo->video_cover_image : asset('admin/default.png');
                                        
                                        @endphp
                                        <div class="item">
                                            <a href="{{ route('video-detail',['video_id'=>$videoInfo->id]) }}" class="featured-post-small">
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


    <div class="featured-post-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-post">
                        <div class="row">
                            <div class="col-12">
                                <div class="main-title">
                                    <h4 class="mb-0">Featured Videos</h4>
                                    <a class="view-all" href="{{ route('videos',['video_type'=>'is_featured']) }}"><i class="fa fa-list"></i> View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="owl-carousel owl-theme latest">

                                    @if($featured_videos->total() != 0) 
                                    @foreach($featured_videos as $key => $value)
                                    @php 
                                        $fimages = ($value->video_cover_image) ? asset($value->file_full_path).'/'.$value->video_cover_image : asset('admin/default.png');
                                    @endphp
                                    <div class="item">
                                        <a href="{{ route('video-detail',['video_id'=>$value->id]) }}" class="featured-post-small">
                                            <div class="featured-post-small-img">
                                                <img src="{{$fimages}}" alt="">
                                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                    @else
                                    <span>No Featured Video Added</span>
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