@extends('admin::layout')
@section('title')Khelau Juhari @stop
@section('breadcrum')Khelau Juhari @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content') 


 <div class="card">
        <div class="card-header bg-purple-400 header-elements-inline">
            <a href="{{ route('khelaujuhari.create') }}" class="btn bg-success-600 btn-labeled btn-labeled-left" style="float: left"><b><i class="icon-pen-plus"></i></b> Add Khelau Juhari
               </a>
        </div>
    </div>

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Khelau Juhari</h5>

    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Khelau Juhari Image</th>
                    <th>Khelau Juhari Name</th>
                    <th>Status</th>
                    <th>Total Views</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($khelaujuhari_info->total() != 0) 
                @foreach($khelaujuhari_info as $key => $value)

                @php
                $image = ($value->kj_cover_image) ? asset($value->file_full_path).'/'.$value->kj_cover_image : asset('admin/default.png');
                @endphp
                <tr>
                    <td>{{$khelaujuhari_info->firstItem() +$key}}</td>
                    <td><a target="_blank" href="{{ $image }}"><img src="{{ $image }}" style="width: 50px;"></a></td>
                    <td>{{ $value->kj_title }}</td>
                    <td class="{{ ($value->status == '1') ? 'text-success font-weight-bold' :'text-danger font-weight-bold' }}">{{ ($value->status == '1') ? 'Enabled' :'Disabled' }}</td>
                    <td>{{ $value->total_views }}</td>
                    <td>
                        <a class="btn bg-teal-400 btn-icon rounded-round" href="{{route('khelaujuhari.edit',$value->id)}}" data-popup="tooltip" data-original-title="Edit" data-placement="bottom"><i class="icon-pencil6"></i></a>

                        <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-danger-400 btn-icon rounded-round delete_khelaujuhari" link="{{route('khelaujuhari.delete',$value->id)}}" data-popup="tooltip" data-original-title="Delete" data-placement="bottom"><i class="icon-bin"></i></a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">No Khelau Juhari Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>

        <span style="margin: 5px;float: right;">
            @if($khelaujuhari_info->total() != 0)
                {{ $khelaujuhari_info->links() }}
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
        $('.delete_khelaujuhari').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });
    });

</script>

@endsection