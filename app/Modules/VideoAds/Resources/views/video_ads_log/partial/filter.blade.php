<script src="{{ asset('admin/global/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/picker_date.js')}}"></script>

<div class="card">
    <div class="bg-warning card-header header-elements-inline border-bottom-0">
        <h5 class="card-title text-uppercase font-weight-semibold">Advance Filter</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        {!! Form::open(['route' => 'video_ads_log.index', 'method' => 'get']) !!}

        <div class="row">
            
            <div class="col-md-4">
                <label class="d-block font-weight-semibold ml-1">Search Keyword:</label>
                <div class="input-group">
                {!! Form::text('search_value',  request('search_value') ?? null, ['id'=>'search_value','placeholder'=>'Search by name, email','class'=>'form-control']) !!}
                </div>
            </div>


            <div class="col-lg-6">
             
                    <label class="d-block font-weight-semibold ml-2">Select Date Range:</label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-calendar"></i>
                                </span>
                            </span>
                          
                            {!! Form::text('date_range', request('date_range') ?? null, ['id'=>'date_range','placeholder'=>'Enter Ads Filter Range','class'=>'form-control daterange-buttons','readonly']) !!}
                        </div>
                    </div>
             
            </div>

        

            
        </div>
        <div class="d-flex justify-content-end mt-2">
            <button class="btn bg-primary" type="submit">
                Search Now
            </button>
            <a href="{{ route('video_ads_log.index') }}" data-popup="tooltip" data-placement="top"
                data-original-title="Refresh Search" class="btn bg-danger ml-2">
                <i class="icon-spinner9"></i>
            </a>
        </div>
        {!! Form::close() !!}
    </div>
</div>
