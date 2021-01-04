@extends('admin::layout')
@section('title')Dashboard @stop
@section('breadcrum')Dashboard @stop
@section('content')

<script type="text/javascript">
	$(document).ready(function() {
		$('#newsticker').breakingNews();
	});

</script>

<section class="newsticker">
	<div class="row">
		<div class="col-12">
			<div class="best-ticker bg-white bn-effect-scroll bn-direction-ltr" id="newsticker">
				<div class="bn-news">
					<ul>
						<li>
							<div class="d-flex align-items-center">
								<div class="text-dark">
									<div class="newsticker-icon bg-slate-600">
										<i class="icon-users4 rounded-round pb-1"></i>
									</div>
								</div>
								<h6 class="pl-2 m-0 font-weight-semibold">Employees -
									<strong>0</strong>
								</h6>
							</div>
						</li>
						<li>
							<div class="d-flex align-items-center">
								<div class="text-dark">
									<div class="newsticker-icon bg-slate-600">
										<i class="icon-file-presentation rounded-round pb-1"></i>
									</div>
								</div>
								<h6 class="pl-2 m-0 font-weight-semibold">Projects -
									<strong>0</strong>
								</h6>
							</div>
						</li>
						<li>
							<div class="d-flex align-items-center">
								<div class="text-dark">
									<div class="newsticker-icon bg-slate-600">
										<i class="icon-flag3 rounded-round pb-1"></i>
									</div>
								</div>
								<h6 class="pl-2 m-0 font-weight-semibold">Milestones -
									<strong>0</strong>
								</h6>
							</div>
						</li>
						<li>
							<div class="d-flex align-items-center">
								<div class="text-dark">
									<div class="newsticker-icon bg-slate-600">
										<i class="icon-target rounded-round pb-1"></i>
									</div>
								</div>
								<h6 class="pl-2 m-0 font-weight-semibold">Goals -
									<strong>0</strong>
								</h6>
							</div>
						</li>
						<li>
							<div class="d-flex align-items-center">
								<div class="text-dark">
									<div class="newsticker-icon bg-slate-600">
										<i class="icon-file-text rounded-round pb-1"></i>
									</div>
								</div>
								<h6 class="pl-2 m-0 font-weight-semibold">To-Do -
									<strong>0</strong>
								</h6>
							</div>
						</li>
						<li>
							<div class="d-flex align-items-center">
								<div class="text-dark">
									<div class="newsticker-icon bg-slate-600">
										<i class="icon-hour-glass2 rounded-round pb-1"></i>
									</div>
								</div>
								<h6 class="pl-2 m-0 font-weight-semibold">In-Progress -
									<strong>0</strong>
								</h6>
							</div>
						</li>
						<li>
							<div class="d-flex align-items-center">
								<div class="text-dark">
									<div class="newsticker-icon bg-slate-600">
										<i class="icon-file-check rounded-round pb-1"></i>
									</div>
								</div>
								<h6 class="pl-2 m-0 font-weight-semibold">Completed -
									<strong>0</strong>
								</h6>
							</div>
						</li>
						<li>
							<div class="d-flex align-items-center">
								<div class="text-dark">
									<div class="newsticker-icon bg-slate-600">
										<i class="icon-thumbs-up3 rounded-round pb-1"></i>
									</div>
								</div>
								<h6 class="pl-2 m-0 font-weight-semibold">Approved -
									<strong>0</strong>
								</h6>
							</div>
						</li>

					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

@stop
