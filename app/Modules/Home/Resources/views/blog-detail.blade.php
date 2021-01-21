@extends('home::layouts.master')
@section('title')Manoranjan Blog Detail @stop
@section('content')

 @php 
    $coverimage = ($blog_detail->blog_image) ? asset($blog_detail->file_full_path).'/'.$blog_detail->blog_image : asset('admin/default.png');
@endphp
    <div class="page">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1 class="mb-3">{{ $blog_detail->title }}</h1>
                    <div class="entry-meta mb-4">
                        <span class="posted-by mr-4"><i class="fa fa-user icon"></i>&nbsp; Manoranjan Ghar</span>
                        <span class="posted-time"><i class="fa fa-clock icon"></i>&nbsp; {{ $blog_detail->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="page_img">
                        <img src="https://www.onlinekhabar.com/wp-content/uploads/2020/10/prakash-and-ashmita-768x474.jpg" alt="">
                    </div>
                    <div class="page_content pt-4">
                        {!! $blog_detail->content !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="small-add mb-4">
                        <img src="https://www.onlinekhabar.com/wp-content/uploads/2020/07/hero-ads.jpg" alt="">
                    </div>
                    <div class="small-add mb-4">
                        <img src="https://www.onlinekhabar.com/wp-content/uploads/2020/10/TATA-Motors-300x200-2.gif" alt="">
                    </div>
                    <div class="small-add">
                        <img src="https://www.onlinekhabar.com/wp-content/uploads/2020/07/hero-ads.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="featured-post-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-post">
                        <div class="row">
                            <div class="col-12">
                                <div class="main-title">
                                    <h4 class="mb-0">Related News</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            @if($related_blog->total() != 0) 
                            @foreach($related_blog as $key => $value)
                            @php 
                            if($key < 3){
                                $relatedimages = ($value->blog_image) ? asset($value->file_full_path).'/'.$value->blog_image : asset('admin/default.png');
                            @endphp
                            <div class="col-4">
                                <div class="featured-post-small">
                                    <div class="featured-post-small-img">
                                        <img src="{{$relatedimages}}" alt="">
                                    </div>
                                    <div class="featured-post_content pt-3">
                                        <span class="posted-time"><i class="fa fa-clock icon"></i> {{ $value->created_at->diffForHumans() }}</span>
                                        <a href="{{ route('blog-detail',['blog_id'=>$value->id]) }}"><h5 class="pt-2">{{ $value->title }}</h5></a>
                                    </div>
                                </div>
                            </div>
                            @php } @endphp
                            @endforeach
                            @else
                            <span>No Related News/Blog Added</span>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="full-width mb-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="https://www.onlinekhabar.com/wp-content/uploads/2020/10/1230x100_Online-Khabar-Banner.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="video-gallery">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main-title">
                        <h4 class="mb-0">Other Videos</h4>
                        <a class="view-all" href="single.php"><i class="fa fa-list"></i> View All</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="video-gallery-big">
                        <img src="https://www.onlinekhabar.com/wp-content/uploads/2019/09/Upasana-sing-thakuri-10.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="video-gallery-small">
                        <img src="https://www.onlinekhabar.com/wp-content/uploads/2019/08/xira-edited-10-of-10-300x200.jpg" alt="">
                        <div class="video-gallery-small-title">
                            <a href="single.php"><h5>New Lok dohori song on Nepali Movie Chauka panja</h5></a>
                        </div>
                    </div>
                    <div class="video-gallery-small">
                        <img src="https://www.onlinekhabar.com/wp-content/uploads/2019/03/185A5338-300x200.jpg" alt="">
                        <div class="video-gallery-small-title">
                            <a href="single.php"><h5>Talking about entertainment industry.</h5></a>
                        </div>
                    </div>
                    <div class="video-gallery-small">
                        <img src="https://www.onlinekhabar.com/wp-content/uploads/2019/02/nirishsha-namrata-and-manish-300x200.jpg" alt="">
                        <div class="video-gallery-small-title">
                            <a href="single.php"><h5>New Nepali Lok dohori Video coming soon!</h5></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="full-width mb-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="https://www.onlinekhabar.com/wp-content/uploads/2020/10/1230x100_Online-Khabar-Banner.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

@stop