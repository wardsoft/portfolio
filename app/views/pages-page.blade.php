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
						<h2>Pages</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Pages</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
							<div class="col-md-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">Pages</h2>
									</header>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table mb-none">
												<thead>
													<tr>
														<th>#</th>
														<th>Page Title</th>
														<th>Short Desc</th>
														<th>Visibility</th>
														<th>Active</th>
													</tr>
												</thead>
												<tbody>
													@if (count($pages) === 0)
													<tr>
														<td colspan="6">No pages currently exist</td>
													</tr>	
													@else 
														@foreach ($pages as $page)
														<tr id="{{ $page->id }}">
															<td class="actions">
																<a href="/pages/edit/{{ $page->id }}"><i class="fa fa-pencil"></i></a>
																<a pageID="{{ $page->id }}" class="deletePage"><i class="fa fa-trash-o"></i></a>
															</td>
	    													<td class="actions">{{ $page->title }}</td>
	    													<td class="actions">{{ $page->description }}</td>
	    													<td>
	    														@if($page->visability == 1)
	    															<span class="label label-success">Public</span>
	    														@else
																	<span class="label label-warning">Private</span>
	    														@endif
	    													</td>
	    													<td class="actions">
	    														@if($page->active == 1)
																	<i class="fa fa-check"></i>
	    														@else
																	<i class="fa fa-times"></i>
	    														@endif
	    													</td>
														</tr>
														@endforeach
													@endif	
												</tbody>
											</table>
										</div>
									</div>
								</section>
								<a href="/pages/add"><button type="button" class="mb-xs mt-xs mr-xs btn btn-lg btn-primary">Add New</button></a>

							</div>
							</section></div>
						</div>
					<!-- end: page -->
				</section>
			</div>

		</section>
@stop		
		<!-- end: page -->