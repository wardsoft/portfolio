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
						<h2>Sites</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Sites</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
													@if (count($sites) === 0)
													<tr>
														<td colspan="6">No sites currently exist</td>
													</tr>	
													@else 
														@foreach ($sites as $site)
														<section class="panel panel-featured-left panel-featured-primary">
															<div class="panel-body">
																<div class="widget-summary">
																	<div class="widget-summary-col widget-summary-col-icon">
																		<div class="summary-icon bg-primary">
																			<i class="fa fa-globe"></i>
																		</div>
																	</div>
																	<div class="widget-summary-col">
																		<div class="summary">
																			<h4 class="title">{{$site->title}}</h4>
																			<div class="info">
																				<strong class="amount">{{$site->href}}</strong>
																				<span class="text-primary"></span>
																			</div>
																		</div>
																		<div class="summary-footer">
																			<a href="{{$site->href}}" target="_blank" class="text-muted text-uppercase">(visit site)</a>
																		</div>
																	</div>
																</div>
															</div>
														</section>
														@endforeach
													@endif
							</div>
							</section></div>
						</div>
					<!-- end: page -->
				</section>
			</div>

		</section>
@stop		
		<!-- end: page -->