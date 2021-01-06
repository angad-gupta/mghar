@extends('admin::layout')
@section('title')Video @stop
@section('breadcrum')Video @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content') 


 <div class="card">
        <div class="card-header bg-purple-400 header-elements-inline">
            <a href="{{ route('video.create') }}" class="btn bg-success-600 btn-labeled btn-labeled-left" style="float: left"><b><i class="icon-pen-plus"></i></b> Add Video
               </a>
        </div>
    </div>

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Video</h5>

    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Cover Image</th>
                    <th>Video Name</th>
                    <th>Genre</th>
                    <th>Status</th>
                    <th>Total Views</th>
                    <th>Is Popular ?</th>
                    <th>Is Trending ?</th>
                    <th>Is Featured ?</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($video_info->total() != 0) 
                @foreach($video_info as $key => $value)

                @php
                $image = ($value->video_cover_image) ? asset($value->file_full_path).'/'.$value->video_cover_image : asset('admin/default.png');
                @endphp
                <tr>
                    <td>{{$video_info->firstItem() +$key}}</td>
                    <td><a target="_blank" href="{{ $image }}"><img src="{{ $image }}" style="width: 50px;"></a></td>
                    <td>{{ $value->video_title }}</td>
                    <td>{{ optional($value->genreInfo)->genre_title }}</td>
                    <td class="{{ ($value->status == '1') ? 'text-success font-weight-bold' :'text-danger font-weight-bold' }}">{{ ($value->status == '1') ? 'Enabled' :'Disabled' }}</td>
                    <td>{{ $value->total_views }}</td>
                    <td class="{{ ($value->is_popular == '1') ? 'text-success font-weight-bold' :'text-danger font-weight-bold' }}">{{ ($value->is_popular == '1') ? 'Yes' :'No' }}</td>
                    <td class="{{ ($value->is_trending == '1') ? 'text-success font-weight-bold' :'text-danger font-weight-bold' }}">{{ ($value->is_trending == '1') ? 'Yes' :'No' }}</td>
                    <td class="{{ ($value->is_featured == '1') ? 'text-success font-weight-bold' :'text-danger font-weight-bold' }}">{{ ($value->is_featured == '1') ? 'Yes' :'No' }}</td>
                    <td>

                        <a class="btn bg-teal-400 btn-icon rounded-round" href="{{route('video.edit',$value->id)}}" data-popup="tooltip" data-original-title="Edit" data-placement="bottom"><i class="icon-pencil6"></i></a>

                        <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-danger-400 btn-icon rounded-round delete_video" link="{{route('video.delete',$value->id)}}" data-popup="tooltip" data-original-title="Delete" data-placement="bottom"><i class="icon-bin"></i></a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">No Video Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>

        <span style="margin: 5px;float: right;">
            @if($video_info->total() != 0)
                {{ $video_info->links() }}
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
        $('.delete_video').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });
    });

</script>

@endsection