    <div class="mt-3 mb-3">
        <div class="row">
            <div class="col-lg-6">
                <form>
                    <div class="form-group w-50 m-0 form-group-feedback form-group-feedback-right mr-3">
                        <div class="input-group">
                            <input type="text" class="form-control border-right-0" placeholder="Search..." name="search_value" value="{{ request('search_value') ?? '' }}">
                            <span class="input-group-append">
                                <button class="btn bg-teal" type="submit"><i class="icon-search4"></i></button>
                            </span>
                            <a href="{{ url('admin/employee/list') }}" data-popup="tooltip" data-placement="top" data-original-title="Refresh Search" class="btn bg-danger ml-2">
                                <i class="icon-spinner9"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="w-100 d-flex justify-content-end">
                    <a href="javascript:void(0)" class="btn bg-indigo" data-popup="tooltip" data-placement="top" data-original-title="Download Excel" onclick="exportTableToExcel('employee-list-table', 'employee_list')">
                        <i class="icon-file-excel"></i>
                    </a>
                    <div class="pl-2 justify-content-center filter-employees">
                        <a href="#" class="btn bg-indigo-400 filter-button">
                            <i class="icon-filter3"></i>
                        </a>
                        {{-- <div class="dropdown-menu dropdown-menu-right bd-dropdown-btn dropdown-content w-340 filter-option">
                            <div class="d-flex justify-content-between pt-3 pb-1 pl-3 pr-3">
                                <h6 class="mb-0">Filter By:</h6>
                                <a href="{{ route('employee.list') }}" title="Clear Filter">Clear All</a>
                            </div>
                            {!! Form::open(['method' => 'get', 'route' => 'employee.list']) !!}
                            {{ Form::hidden('search', 'advance') }}
                            <div class="dropdown-divider"></div>
                            <div class="form-group mb-0 pt-1 pb-1 pl-3 pr-3">
                                <label class="d-block font-weight-semibold">Select Organization:</label>
                                <div class="input-group">
                                    {!! Form::select('organization_id[]',$organization, request('organization_id') ?? null, ['class'=>'form-control multiselect-filtering', 'multiple']) !!}
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="form-group mb-0 pt-1 pb-1 pl-3 pr-3">
                                <label class="d-block font-weight-semibold">Select Designation:</label>
                                <div class="input-group">
                                    {!! Form::select('designation_id[]', $designation, request('designation_id') ?? null, ['class'=>'form-control multiselect-filtering', 'multiple']) !!}
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="form-group mb-0 pt-1 pb-1 pl-3 pr-3">
                                <label class="d-block font-weight-semibold">Select Department:</label>
                                <div class="input-group">
                                    {!! Form::select('department_id[]', $department, request('department_id') ?? null, ['class'=>'form-control multiselect-filtering', 'multiple']) !!}
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="form-group mb-0 pt-1 pb-1 pl-3 pr-3">
                                <label class="d-block font-weight-semibold">Select Branch:</label>
                                <div class="input-group">
                                    {!! Form::select('branch_id[]', $branches, request('branch_id') ?? null, ['class'=>'form-control multiselect-filtering', 'multiple']) !!}
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="d-flex justify-content-end pt-1 pb-3 pl-3 pr-3">
                                <button class="btn bg-primary" type="submit">
                                    Search Now
                                </button>
                            </div>
                            {!! Form::close() !!}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>