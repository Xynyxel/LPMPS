<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $__env->yieldContent('title'); ?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo e(asset('css/icons/icomoon/styles.min.css')); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo e(asset('css/icons/fontawesome/styles.min.css')); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo e(asset('css/all.min.css')); ?>" rel="stylesheet" type="text/css">
	<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?php echo e(asset('js/main/jquery.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/main/bootstrap.bundle.min.js')); ?>"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?php echo e(asset('js/plugins/visualization/echarts/echarts.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/plugins/maps/echarts/world.js')); ?>"></script>

	<script src="<?php echo e(asset('js/app.js')); ?>"></script>
	<script src="<?php echo e(asset('js/demo_charts/pages/dashboard_6/light/area_gradient.js')); ?>"></script>
	<script src="<?php echo e(asset('js/demo_charts/pages/dashboard_6/light/map_europe_effect.js')); ?>"></script>
	<script src="<?php echo e(asset('js/demo_charts/pages/dashboard_6/light/progress_sortable.js')); ?>"></script>
	<script src="<?php echo e(asset('js/demo_charts/pages/dashboard_6/light/bars_grouped.js')); ?>"></script>
	<script src="<?php echo e(asset('js/demo_charts/pages/dashboard_6/light/line_label_marks.js')); ?>"></script>
	<!-- /theme JS files -->
</head>
<body>
	<!-- Main navbar -->
	<div class="navbar navbar-expand-xl navbar-light navbar-static px-0">
		<div class="d-flex flex-1 pl-3">
			<div class="navbar-brand wmin-0 mr-1">
				<a href="index.html" class="d-inline-block">
					<img src="<?php echo e(asset('images/logo_dark.png')); ?>" class="d-none d-sm-block" alt="">
					<img src="<?php echo e(asset('images/logo_icon_dark.png')); ?>" class="d-sm-none" alt="">
				</a>
			</div>
		</div>

		<div class="d-flex w-100 w-xl-auto overflow-auto overflow-xl-visible scrollbar-hidden border-top border-top-xl-0 order-1 order-xl-0">
			<ul class="navbar-nav navbar-nav-underline flex-row text-nowrap mx-auto">
				<li class="nav-item">
					<a href="/home" class="navbar-nav-link <?php echo e((request()->is('home')) ? 'active' : ''); ?>">
						<i class="icon-home4 mr-2"></i>
						Home
					</a>
				</li>

				<li class="nav-item mega-menu-full nav-item-dropdown-xl">
					
					<a href="/dataMaster" class="navbar-nav-link <?php echo e((request()->is('dataMaster')) ? 'active' : ''); ?>">
						<i class="icon-make-group mr-2"></i>
						Data Master
					</a>
				
					
				</li>

				<li class="nav-item dropdown nav-item-dropdown-xl">
					
					<a href="/dataSetting" class="navbar-nav-link <?php echo e((request()->is('dataSetting')) ? 'active' : ''); ?>">
						<i class="icon-strategy mr-2"></i>
						Data Setting
					</a>
				
					
				</li>

				<li class="nav-item dropdown nav-item-dropdown-xl">
					<a href="/dataOperasional" class="navbar-nav-link <?php echo e((request()->is('dataOperasional')) ? 'active' : ''); ?>">
						<i class="icon-strategy mr-2"></i>
						Data Operasional
					</a>
				</li>

				<li class="nav-item dropdown nav-item-dropdown-xl">
					
					<a href="/laporan" class="navbar-nav-link <?php echo e((request()->is('laporan')) ? 'active' : ''); ?>">
						<i class="icon-loop3 mr-2"></i>
						Laporan
					</a>

					
				</li>
			</ul>
		</div>

		<div class="d-flex flex-xl-1 justify-content-xl-end order-0 order-xl-1 pr-3">
			<ul class="navbar-nav navbar-nav-underline flex-row">
				<li class="nav-item">
					<a href="#notifications" class="navbar-nav-link navbar-nav-link-toggler" data-toggle="modal">
						<i class="icon-bell2"></i>
						<span class="badge badge-mark border-pink bg-pink"></span>
					</a>
				</li>
		
				<li class="nav-item nav-item-dropdown-xl dropdown dropdown-user h-100">
					<a href="#" class="navbar-nav-link navbar-nav-link-toggler d-flex align-items-center h-100 dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo e(asset('images/placeholders/placeholder.jpg')); ?>" class="rounded-circle mr-xl-2" height="38" alt="">
						<span class="d-none d-xl-block"><?php echo e($LoggedUserInfo['name']); ?></span>
					</a>
		
					<div class="dropdown-menu dropdown-menu-right">
						
						<a href="<?php echo e(route('auth.logout')); ?>" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
		

	<!-- Page content -->
	<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">
			<!-- Inner content -->
			<div class="content-inner">

                <?php echo $__env->yieldContent('content'); ?>

                <!-- Footer -->
				<div class="navbar navbar-expand-lg navbar-light border-bottom-0 border-top">
					<div class="text-center d-lg-none w-100">
						<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
							<i class="icon-unfold mr-2"></i>
							Footer
						</button>
					</div>

					<div class="navbar-collapse collapse" id="navbar-footer">
						<span class="navbar-text">
							&copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a href="https://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
						</span>

						
					</div>
				</div>
				<!-- /footer -->
			</div>
			<!-- /inner content -->
		</div>
		<!-- /main content -->
	</div>
	<!-- /page content -->

    <?php echo $__env->yieldContent('notification'); ?>
</body>
</html>
<?php /**PATH D:\Leo\Project\Project Real\LPMPS\resources\views/admin/master.blade.php ENDPATH**/ ?>