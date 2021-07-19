@extends('admin/master')

@section('title',"Dashboard")
@section('content')
	<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content container header-elements-md-inline">
			<div class="d-flex">
				<div class="page-title">
					<h4 class="font-weight-semibold">Dashboard</h4>
					<div class="text-muted">Welcome back, Eugene!</div>
				</div>
				<a href="#" class="header-elements-toggle text-body d-md-none"><i class="icon-more"></i></a>
			</div>

			<div class="header-elements d-none py-0 mb-3 mb-md-0">
				<button type="button" class="btn btn-light"><i class="icon-printer mr-2"></i> Print</button>
				<button type="button" class="btn btn-pink ml-3"> <i class="icon-file-presentation mr-2"></i> Generate report</button>
			</div>
		</div>
	</div>
	<!-- /page header -->


	<!-- Content area -->
	<div class="content container pt-0">
		<!-- Blocks with chart -->
		<div class="row">
			<div class="col-lg-4">
				<div class="card">
					<div class="card-header d-flex pb-1">
						<div>
							<span class="card-title font-weight-semibold">Total visitors</span>
							<h2 class="font-weight-bold mb-0">5,274 <small class="text-success font-size-base ml-2">+ 3.6%</small></h2>
						</div>

						<div class="dropdown ml-auto">
							<a href="#" data-toggle="dropdown" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill"><i class="icon-more2"></i></a>

							<div class="dropdown-menu dropdown-menu-right">
								<a href="#" class="dropdown-item"><i class="icon-file-eye"></i> View report</a>
								<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print report</a>
								<a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export report</a>
								<div class="dropdown-divider"></div>
								<a href="#" class="dropdown-item"><i class="icon-cog3"></i> Configure</a>
							</div>
						</div>
					</div>
				
					<div class="chart-container">
						<div class="chart" id="area_gradient_blue" style="height: 100px"></div>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="card">
					<div class="card-header d-flex pb-1">
						<div>
							<span class="card-title font-weight-semibold">New opportunities</span>
							<h2 class="font-weight-bold mb-0">2,785 <small class="text-success font-size-base ml-2">+ 5.9%</small></h2>
						</div>

						<div class="dropdown ml-auto">
							<a href="#" data-toggle="dropdown" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill"><i class="icon-more2"></i></a>

							<div class="dropdown-menu dropdown-menu-right">
								<a href="#" class="dropdown-item"><i class="icon-file-eye"></i> View report</a>
								<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print report</a>
								<a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export report</a>
								<div class="dropdown-divider"></div>
								<a href="#" class="dropdown-item"><i class="icon-cog3"></i> Configure</a>
							</div>
						</div>
					</div>
				
					<div class="chart-container">
						<div class="chart" id="area_gradient_orange" style="height: 100px"></div>
					</div>
				</div>
			</div>
				
			<div class="col-lg-4">
				<div class="card">
					<div class="card-header d-flex pb-1">
						<div>
							<span class="card-title font-weight-semibold">New leads</span>
							<h2 class="font-weight-bold mb-0">1,589 <small class="text-danger font-size-base ml-2">- 1.8%</small></h2>
						</div>
						<div class="dropdown ml-auto">
							<a href="#" data-toggle="dropdown" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill"><i class="icon-more2"></i></a>
							<div class="dropdown-menu dropdown-menu-right">
								<a href="#" class="dropdown-item"><i class="icon-file-eye"></i> View report</a>
								<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print report</a>
								<a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export report</a>
								<div class="dropdown-divider"></div>
								<a href="#" class="dropdown-item"><i class="icon-cog3"></i> Configure</a>
							</div>
						</div>
					</div>
					<div class="chart-container">
						<div class="chart" id="area_gradient_green" style="height: 100px"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- /blocks with chart -->

		{{-- <!-- Sales by country -->
		<div class="card">
			<div class="card-header">
				<h6 class="card-title font-weight-semibold">Daily sales by country</h6>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-xl-6">
						<div class="map overflow-hidden rounded mb-3 mb-xl-0" id="map_europe_effect" style="height: 400px;"></div>
					</div>
					<div class="col-xl-6">
						<div class="row">
							<div class="col-sm-6">
								<div class="d-flex align-items-center justify-content-sm-center mb-3">
									<span class="bg-pink-100 text-pink line-height-1 rounded p-2 mr-3">
										<i class="icon-cart top-0"></i>
									</span>
									<div>
										<h6 class="font-weight-bold mb-0">1,890</h6>
										<span class="text-muted">Total sales</span>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="d-flex align-items-center justify-content-sm-center mb-3">
									<span class="bg-teal-100 text-teal line-height-1 rounded p-2 mr-3">
										<i class="icon-cash3 top-0"></i>
									</span>
									<div>
										<h6 class="font-weight-bold mb-0">€11,781</h6>
										<span class="text-muted">Total revenue</span>
									</div>
								</div>
							</div>
						</div>
						<div class="chart-container">
							<div class="chart" id="progress_bar_sorted" style="height: 333px;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /sales by country --> --}}

		<!-- Latest orders -->
		<div class="card">
			<div class="card-header d-flex py-0">
				<h6 class="card-title font-weight-semibold py-3">Latest orders</h6>
			
				<div class="d-inline-flex align-items-center ml-auto">
					<span class="badge badge-pink font-weight-semibold">+ 29 new</span>
					<div class="dropdown ml-2">
						<a href="#" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-toggle="dropdown">
							<i class="icon-more2"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="#" class="dropdown-item"><i class="icon-file-eye"></i> View report</a>
							<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print report</a>
							<a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export report</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item"><i class="icon-cog3"></i> Configure</a>
						</div>
					</div>
				</div>
			</div>

			<div class="table-responsive border-top-0">
				<table class="table text-nowrap">
					<thead>
						<tr>
							<th>Company</th>
							<th>Delivery date</th>
							<th>Delivery method</th>
							<th>Status</th>
							<th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<div class="d-flex align-items-center">
									<a href="#" class="mr-3">
										<img src="{{asset('images/brands/klm.svg')}}" class="rounded-circle" width="32" height="32" alt="">
									</a>
									<div>
										<a href="#" class="text-body font-weight-semibold">KLM Royal Dutch Airlines</a>
										<div class="text-muted font-size-sm">May 21st</div>
									</div>
								</div>
							</td>
							<td>June 12th</td>
							<td><img src="{{asset('images/brands/ups.svg')}}" class="mr-1" width="20" alt=""> UPS Express</td>
							<td><span class="badge badge-success-100 text-success">Delivered</span></td>
							<td class="text-center">
								<div class="dropdown">
									<a href="#" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-toggle="dropdown">
										<i class="icon-menu7"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="icon-file-eye"></i> Order details</a>
										<a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Download invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-file-stats"></i> Statistics</a>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center">
									<a href="#" class="mr-3">
										<img src="{{asset('images/brands/amazon.svg')}}" class="rounded-circle" width="32" height="32" alt="">
									</a>
									<div>
										<a href="#" class="text-body font-weight-semibold">Amazon Inc.</a>
										<div class="text-muted font-size-sm">May 22nd</div>
									</div>
								</div>
							</td>
							<td>June 13th</td>
							<td><img src="{{asset('images/brands/deutsche-post.svg')}}" class="rounded-sm mr-1" width="20" alt=""> Deutsche post</td>
							<td><span class="badge badge-danger-100 text-danger">Delayed</span></td>
							<td class="text-center">
								<div class="dropdown">
									<a href="#" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-toggle="dropdown">
										<i class="icon-menu7"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="icon-file-eye"></i> Order details</a>
										<a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Download invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-file-stats"></i> Statistics</a>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center">
									<a href="#" class="mr-3">
										<img src="{{asset('images/brands/honda.svg')}}" class="rounded-circle" width="32" height="32" alt="">
									</a> 
									<div>
										<a href="#" class="text-body font-weight-semibold">Honda Motor Company</a>
										<div class="text-muted font-size-sm">May 22nd</div>
									</div>
								</div>
							</td>
							<td>June 14th</td>
							<td><img src="{{asset('images/brands/postnl.svg')}}" class="mr-1" width="20" alt=""> PostNL</td>
							<td><span class="badge badge-secondary-100 text-secondary">Processing</span></td>
							<td class="text-center">
								<div class="dropdown">
									<a href="#" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-toggle="dropdown">
										<i class="icon-menu7"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="icon-file-eye"></i> Order details</a>
										<a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Download invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-file-stats"></i> Statistics</a>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!-- /latest orders -->


		<!-- Reports -->
		<div class="row">
			<div class="col-xl-6">

				<!-- Annual sales report -->
				<div class="card">
					<div class="card-header d-flex py-0">
						<h6 class="card-title font-weight-semibold py-3">Annual sales report</h6>

						<div class="dropdown align-self-center ml-auto">
							<a href="#" data-toggle="dropdown" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill">
								<i class="icon-more2"></i>
							</a>
					
							<div class="dropdown-menu dropdown-menu-right">
								<a href="#" class="dropdown-item"><i class="icon-file-eye"></i> View report</a>
								<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print report</a>
								<a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export report</a>
								<div class="dropdown-divider"></div>
								<a href="#" class="dropdown-item"><i class="icon-cog3"></i> Configure</a>
							</div>
						</div>
					</div>
				
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="d-flex align-items-center justify-content-sm-center mb-3">
									<span class="bg-primary-100 text-primary line-height-1 rounded p-2 mr-3">
										<i class="icon-stack3 top-0"></i>
									</span>
									<div>
										<h6 class="font-weight-bold mb-0">4,485</h6>
										<span class="text-muted">Campaigns</span>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="d-flex align-items-center justify-content-sm-center mb-3">
									<span class="bg-success-100 text-success line-height-1 rounded p-2 mr-3">
										<i class="icon-spinner11 top-0"></i>
									</span>
									<div>
										<h6 class="font-weight-bold mb-0">1,255</h6>
										<span class="text-muted">Leads</span>
									</div>
								</div>
							</div>
						</div>
				
						<div class="chart-container">
							<div class="chart" id="bars_grouped" style="height: 333px;"></div>
						</div>
					</div>
				
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Campaign</th>
									<th>Leads</th>
									<th>Rate</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="d-flex align-items-center">
											April campaign
											<a href="#" class="text-muted ml-auto"><i class="icon-new-tab2"></i></a>
										</div>
									</td>
									<td>4,890</td>
									<td><span class="text-success"><i class="icon-arrow-up8 top-0 font-size-sm mr-1"></i> 0.25%</span></td>
								</tr>
								<tr>
									<td>
										<div class="d-flex align-items-center">
											Flash sale
											<a href="#" class="text-muted ml-auto"><i class="icon-new-tab2"></i></a>
										</div>
									</td>
									<td>1,896</td>
									<td><span class="text-danger"><i class="icon-arrow-down8 top-0 font-size-sm mr-1"></i> 1.2%</span></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /annual sales report -->

			</div>

			<div class="col-xl-6">

				<!-- Daily visitors report -->
				<div class="card">
					<div class="card-header d-flex py-0">
						<h6 class="card-title font-weight-semibold py-3">Daily visitors report</h6>

						<div class="dropdown align-self-center ml-auto">
							<a href="#" data-toggle="dropdown" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill">
								<i class="icon-more2"></i>
							</a>
					
							<div class="dropdown-menu dropdown-menu-right">
								<a href="#" class="dropdown-item"><i class="icon-file-eye"></i> View report</a>
								<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print report</a>
								<a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export report</a>
								<div class="dropdown-divider"></div>
								<a href="#" class="dropdown-item"><i class="icon-cog3"></i> Configure</a>
							</div>
						</div>
					</div>

					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="d-flex align-items-center justify-content-sm-center mb-3">
									<span class="bg-indigo-100 text-indigo line-height-1 rounded p-2 mr-3">
										<i class="icon-user-plus top-0"></i>
									</span>
									<div>
										<h6 class="font-weight-bold mb-0">4,782</h6>
										<span class="text-muted">New users</span>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="d-flex align-items-center justify-content-sm-center mb-3">
									<span class="bg-indigo-100 text-indigo line-height-1 rounded p-2 mr-3">
										<i class="icon-user-check top-0"></i>
									</span>
									<div>
										<h6 class="font-weight-bold mb-0">6,478</h6>
										<span class="text-muted">Returned</span>
									</div>
								</div>
							</div>
						</div>
						
						<div class="chart-container">
							<div class="chart" id="line_label_marks" style="height: 333px;"></div>
						</div>
					</div>
				
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Browser</th>
									<th>Diff</th>
									<th>Count</th>
									<th>Share</th>
				
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<img src="{{asset('images/browsers/chrome.svg')}}" class="mr-2" alt=""
												style="height: 32px;">
											Chrome
										</div>
									</td>
									<td><span class="text-success"><i class="icon-arrow-up8 top-0 font-size-sm mr-1"></i> 4.84%</span>
									</td>
									<td>728</td>
									<td>34.6%</td>
								</tr>
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<img src="{{asset('images/browsers/firefox.svg')}}" class="mr-2" alt=""
												style="height: 32px;">
											Firefox
										</div>
									</td>
									<td><span class="text-danger"><i class="icon-arrow-down8 top-0 font-size-sm mr-1"></i> 0.89%</span>
									</td>
									<td>550</td>
									<td>20.4%</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /daily visitors report -->

			</div>
		</div>
		<!-- /reports -->
		
	</div>
	<!-- /content area -->
@endsection

@section('notification')
	<!-- Notifications -->
	<div id="notifications" class="modal modal-right fade" tabindex="-1" aria-modal="true" role="dialog">
		<div class="modal-dialog modal-dialog-scrollable modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-transparent border-0 align-items-center">
					<h5 class="modal-title font-weight-semibold">Notifications</h5>
					<button type="button" class="btn btn-icon btn-light btn-sm border-0 rounded-pill ml-auto" data-dismiss="modal"><i class="icon-cross2"></i></button>
				</div>

				<div class="modal-body p-0">
					<div class="bg-light text-muted py-2 px-3">New notifications</div>
					<div class="p-3">
						<div class="d-flex mb-3">
							<a href="#" class="mr-3">
								<img src="{{asset('images/placeholders/placeholder.jpg')}}" width="36" height="36" class="rounded-circle" alt="">
							</a>
							<div class="flex-1">
								<a href="#" class="font-weight-semibold">James</a> has completed the task <a href="#">Submit documents</a> from <a href="#">Onboarding</a> list

								<div class="bg-light border rounded p-2 mt-2">
									<label class="custom-control custom-checkbox custom-control-inline mx-1">
										<input type="checkbox" class="custom-control-input" checked disabled>
										<del class="custom-control-label">Submit personal documents</del>
									</label>
								</div>

								<div class="font-size-sm text-muted mt-1">2 hours ago</div>
							</div>
						</div>

						<div class="d-flex mb-3">
							<a href="#" class="mr-3">
								<img src="{{asset('images/placeholders/placeholder.jpg')}}" width="36" height="36" class="rounded-circle" alt="">
							</a>
							<div class="flex-1">
								<a href="#" class="font-weight-semibold">Margo</a> was added to <span class="font-weight-semibold">Customer enablement</span> channel by <a href="#">William Whitney</a>

								<div class="font-size-sm text-muted mt-1">3 hours ago</div>
							</div>
						</div>

						<div class="d-flex">
							<div class="mr-3">
								<div class="bg-danger-100 text-danger rounded-pill">
									<i class="icon-undo position-static p-2"></i>
								</div>
							</div>
							<div class="flex-1">
								Subscription <a href="#">#466573</a> from 10.12.2021 has been cancelled. Refund case <a href="#">#4492</a> created

								<div class="font-size-sm text-muted mt-1">4 hours ago</div>
							</div>
						</div>
					</div>

					<div class="bg-light text-muted py-2 px-3">Older notifications</div>
					<div class="p-3">
						<div class="d-flex mb-3">
							<a href="#" class="mr-3">
								<img src="{{asset('images/placeholders/placeholder.jpg')}}" width="36" height="36" class="rounded-circle" alt="">
							</a>
							<div class="flex-1">
								<a href="#" class="font-weight-semibold">Christine</a> commented on your community <a href="#">post</a> from 10.12.2021

								<div class="font-size-sm text-muted mt-1">2 days ago</div>
							</div>
						</div>

						<div class="d-flex mb-3">
							<a href="#" class="mr-3">
								<img src="{{asset('images/placeholders/placeholder.jpg')}}" width="36" height="36" class="rounded-circle" alt="">
							</a>
							<div class="flex-1">
								<a href="#" class="font-weight-semibold">Mike</a> added 1 new file(s) to <a href="#">Product management</a> project

								<div class="bg-light rounded p-2 mt-2">
									<div class="d-flex align-items-center mx-1">
										<div class="mr-2">
											<i class="icon-file-pdf text-danger icon-2x position-static"></i>
										</div>
										<div class="flex-1">
											new_contract.pdf
											<div class="font-size-sm text-muted">112KB</div>
										</div>
										<div class="ml-2">
											<a href="#" class="btn btn-dark-100 text-body btn-icon btn-sm border-transparent rounded-pill">
												<i class="icon-arrow-down8"></i>
											</a>
										</div>
									</div>
								</div>

								<div class="font-size-sm text-muted mt-1">1 day ago</div>
							</div>
						</div>

						<div class="d-flex mb-3">
							<div class="mr-3">
								<div class="bg-success-100 text-success rounded-pill">
									<i class="icon-calendar3 position-static p-2"></i>
								</div>
							</div>
							<div class="flex-1">
								All hands meeting will take place coming Thursday at 13:45. <a href="#">Add to calendar</a>

								<div class="font-size-sm text-muted mt-1">2 days ago</div>
							</div>
						</div>

						<div class="d-flex mb-3">
							<a href="#" class="mr-3">
								<img src="{{asset('images/placeholders/placeholder.jpg')}}" width="36" height="36" class="rounded-circle" alt="">
							</a>
							<div class="flex-1">
								<a href="#" class="font-weight-semibold">Nick</a> requested your feedback and approval in support request <a href="#">#458</a>

								<div class="font-size-sm text-muted mt-1">3 days ago</div>
							</div>
						</div>

						<div class="d-flex">
							<div class="mr-3">
								<div class="bg-primary-100 text-primary rounded-pill">
									<i class="icon-people position-static p-2"></i>
								</div>
							</div>
							<div class="flex-1">
								<span class="font-weight-semibold">HR department</span> requested you to complete internal survey by Friday

								<div class="font-size-sm text-muted mt-1">3 days ago</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /notifications -->
@endsection