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
						<h2>Collections</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Collections</span></li>
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
						
										<h2 class="panel-title">Collections</h2>
									</header>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table mb-none">
												<thead>
													<tr>
														<th>#</th>
														<th>Collection Title</th>
														<th>Short Desc</th>
														<th>Visibility</th>
														<th>Active</th>
													</tr>
												</thead>
												<tbody>
													@if (count($collections) === 0)
													<tr>
														<td colspan="6">No collection records currently exist</td>
													</tr>	
													@else 
														@foreach ($collections as $collection)
														<tr id="{{ $collection->id }}">
															<td class="actions">
																<a href="/collections/edit/{{ $collection->id }}"><i class="fa fa-pencil"></i></a>
																<a collectionID="{{ $collection->id }}" class="deleteCollection"><i class="fa fa-trash-o"></i></a>
															</td>
	    													<td class="actions">{{ $collection->title }}</td>
	    													<td class="actions">{{ substr($collection->description,0,75) }}.....</td>
	    													<td>
	    														@if($collection->visability == 1)
	    															<span class="label label-success">Public</span>
	    														@else
																	<span class="label label-warning">Private</span>
	    														@endif
	    													</td>
	    													<td class="actions">
	    														@if($collection->active == 1)
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
								<a href="/collections/add"><button type="button" class="mb-xs mt-xs mr-xs btn btn-lg btn-primary">Add New</button></a>

							</div>
							</section></div>
						</div>
					<!-- end: page -->
				</section>
			</div>

		</section>
@stop		
		<!-- end: page -->