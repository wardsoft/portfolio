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
									<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">{{$data['action']}} Collection</h2>
									</header>
									<div class="panel-body" style="display: block;">
										<form id="collectionForm" class="form-horizontal form-bordered" method="post">
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Title</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="title" value="{{$data['collection']->title or ""}}">											
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="textareaAutosize">Description</label>
												<div class="col-md-6">
													<textarea class="form-control" rows="3" name="description" data-plugin-textarea-autosize="" style="overflow: hidden; resize: none; height: 74px;">{{$data['collection']->description or ""}}</textarea>
												</div>
											</div>

											<div class="form-group">
												
												<label class="col-md-3 control-label" for="inputSuccess">Visibility</label>
												<div class="col-md-6">
													<div class="radio">
														<label>
															<input type="radio" name="visability" id="visability1" value="1" 
															@if(isset($data['collection']->visability) == 1)
																checked="yes"
															@endif
															>
															Public
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="visability" id="visability2" value="2" 
															@if(isset($data['collection']->visability) && $data['collection']->visability == 2)
																checked="yes"
															@endif
															>
															Private
														</label>
													</div>

													<div class="checkbox">
														<label>
															<input type="checkbox" name="active" value="1"
															@if(isset($data['collection']->active) && $data['collection']->active == 1)
																checked="yes"
															@endif
															>
															Active
														</label>
													</div>
						
												</div>
											</div>
											<button type="submit" class="mb-xs mt-xs mr-xs btn btn-lg btn-primary">{{$data['action']}}</button>
										</form>
									</div>

								</section>

								<section id="imagePanel" class="panel" 
									@if(!isset($data['collection']))
									style="display: none;
									@@endif
									">
									<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">Images</h2>
									</header>
									<div class="panel-body" >
											<div id="sortable" class="thumbnail-gallery">
												@foreach($data['collectionImages'] as $image)
													<a id="{{$image->id}}" class="img-thumbnail lightbox" href="{{$image->image_path}}/{{$image->image_name}}" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
														<img class="img-responsive" width="215" src="{{$image->image_path}}/{{$image->image_name}}">
														<span class="zoom">
															<i class="fa fa-search"></i>
														</span>
													</a>
												@endforeach
											</div>
										
										<form action="/media/upload" class="dropzone dz-square dz-clickable" id="dropzone-form">
											<div class="dz-default dz-message"><span>Drop files here to upload</span>
											</div>
											<input type="hidden" id="collectionID" name="collectionID" value="{{$data['collection']->id or ""}}">
										</form>
									</div>
						
								</section>
									</div>
								</section>

							</div>
							</section></div>
						</div>
					<!-- end: page -->
				</section>
			</div>

		</section>
@stop		
		<!-- end: page -->