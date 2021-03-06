@extends('admin::layout')
@section('title')Search Logs @stop
@section('breadcrum')Search Logs @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content')


<div class="card card-body">
    <div class="d-flex justify-content-between">
        <h4>List of Search Logs</h4>
    </div>
    <div class="mb-3 mt-3"></div>
    <div class="table-responsive table-card">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Date</th>
                    <th>Username</th>
                    <th>Keyword</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($search_log->total() != 0)
                @foreach($search_log as $key => $value)

                <tr>
                    <td>{{$search_log->firstItem() +$key}}</td>
                    <td>{{ $value->date }}</td>
                    <td>{{ $value->username }}</td>
                    <td>{{ $value->keyword }}</td>
                    <td>
                        <a data-toggle="modal" data-target="#modal_theme_warning"
                            class="btn bg-danger-400 btn-icon rounded-round delete_page"
                            link="{{route('search_log.delete',$value->id)}}" data-popup="tooltip"
                            data-original-title="Delete" data-placement="bottom"><i class="icon-bin"></i></a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5">No Search Log Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>
    </div>
    <div class="col-12">
        <span class="float-right pagination align-self-end mt-3">
            {{ $search_log->links() }}
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

<script type="text/javascript">
    $('document').ready(function() {

        $('.delete_page').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });
    });

</script>

@endsection