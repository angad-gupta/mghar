@extends('admin::layout')
@section('title')Video Ads Log Management @stop
@section('breadcrum')Video Ads Log Management @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content') 


<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Video Ads Log</h5>

    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Video Ads Name</th>
                    <th>Video</th>
                    <th>Total Views</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($video_ads_log->total() != 0) 
                @foreach($video_ads_log as $key => $value)

                @inject('video_ads', '\App\Modules\VideoAds\Repositories\VideoAdsRepository')
                @inject('video', '\App\Modules\Video\Repositories\VideoRepository')
                @php
                    $video_ads_name = $video_ads->find($value->video_ads_id);
                    $video_name = $video->find($value->video_id);
                @endphp
           
                <tr>
                    <td>{{$video_ads_log->firstItem() +$key}}</td>
                     <td>{{ $video_ads_name->vidoe_ads_title }}</td>
                     <td>{{ $video_name->video_title }}</td>
                     <td>{{ $value->total_views }}</td>
                    <td>
                        <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-danger-400 btn-icon rounded-round delete_ads" link="{{route('video_ads_log.delete',$value->id)}}" data-popup="tooltip" data-original-title="Delete" data-placement="bottom"><i class="icon-bin"></i></a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">No Video Ads Log Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>

        <span style="margin: 5px;float: right;">
            @if($video_ads_log->total() != 0)
                {{ $video_ads_log->links() }}
            @endif
            </span>
    </div>
</div>

 <!-- Warning modal -->
    <div id="modal_theme_warning" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-body">
                    <center>
                        <i class="icon-alert text-danger icon-3x"></i>
                    </center>
                    <br>
                    <center>
                        <h2>Are You Sure Want To Delete ?</h2>
                        <a class="btn btn-success get_link" href="">Yes, Delete It!</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
<!-- /warning modal -->

<!-- /warning modal -->

    
<script type="text/javascript">
    $('document').ready(function() {
        $('.delete_ads').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });
    });

</script>

@endsection