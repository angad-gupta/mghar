@include('home::include.header')

<div class="featured-post-block mt-4">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="featured-post">
                <div class="row">
                    <div class="col-12">
                        <div class="main-title">
                            <h3 class="mb-0">Videos</h3>
                                <!-- <div class="form-group mb-2">
                                    <select class="form-control" name="genre" id="genre_select_video">
                                         <option value="0">--Select Any--</option>
                                        @foreach($genre as $key =>$val)
                                            <option value="{{$key}}">{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div> -->
                        </div>
                    </div>
                </div>
                <div class="row">

                    @if($videos->total() != 0) 
                    @foreach($videos as $key => $value)
                    @php 
                        $coverimages = ($value->video_cover_image) ? asset($value->file_full_path).'/'.$value->video_cover_image : asset('admin/default.png');
                    @endphp
                    <div class="col-lg-2">
                        <a href="{{ route('video-detail',['video_id'=>$value->id]) }}" class="featured-post-small">
                            <div class="featured-post-small-img">
                                <img src="{{$coverimages}}" alt="">
                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                            </div>

                        </a>
                    </div>
                    @endforeach
                    @else
                    <span>No Videos Added</span>
                    @endif

                </div>

                 <span style="margin: 5px;float: right;">
                    @if($videos->total() != 0)
                        {{ $videos->links() }}
                    @endif
            </span>

            </div>
        </div>
    </div>
</div>
</div>


@include('home::include.footer')