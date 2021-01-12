@include('home::include.header')

<div class="featured-post-block mt-4">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="featured-post">
                <div class="row">
                    <div class="col-12">
                        <div class="main-title">
                            <h3 class="mb-0">Khelau Juhari</h3>
                                
                        </div>
                    </div>
                </div>
                <div class="row">

                    @if($khelaujuhari_info->total() != 0) 
                    @foreach($khelaujuhari_info as $key => $value)
                    @php 
                        $coverimages = ($value->kj_cover_image) ? asset($value->file_full_path).'/'.$value->kj_cover_image : asset('admin/default.png');
                    @endphp
                    <div class="col-lg-2">
                        <a href="{{ route('khelaujuhari-detail',['juhari_id'=>$value->id]) }}" class="featured-post-small">
                            <div class="featured-post-small-img">
                                <img src="{{$coverimages}}" alt="">
                                <button class="add-watchlist"><i class="fas fa-plus"></i> &nbsp;Add to Watchlist</button>
                            </div>

                        </a>
                    </div>
                    @endforeach
                    @else
                    <span>No Khelau Juhari Added</span>
                    @endif

                </div>

                 <span style="margin: 5px;float: right;">
                    @if($khelaujuhari_info->total() != 0)
                        {{ $khelaujuhari_info->links() }}
                    @endif
            </span>

            </div>
        </div>
    </div>
</div>
</div>

@include('home::include.footer')

<script type="text/javascript">
    $(document).ready(function(){

        $('#genre_select_video').on('change',function(){
            $('#searchGenreSubmit').submit();
        });
    });
</script>
