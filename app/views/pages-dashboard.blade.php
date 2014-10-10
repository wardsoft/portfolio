@extends('layouts.master')

@section('content')
@parent
		<section class="body">
			<!--start: header -->
			@include('pages-header')
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				@include('pages-sidebar')
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<!-- end: page -->
				</section>
			</div>
		</section>
@stop		
		<!-- end: page -->