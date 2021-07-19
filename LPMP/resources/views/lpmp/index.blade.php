@extends('lpmp/master')

@section('title',"Home - LPMP")
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


@endsection