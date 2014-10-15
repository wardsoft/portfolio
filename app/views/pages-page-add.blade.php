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
									<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">{{$data['action']}} Page</h2>
									</header>
									<div class="panel-body" style="display: block;">
										<form id="pageForm" class="form-horizontal form-bordered" method="post">
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Title</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="title" value="{{$data['page']->title or ""}}">											
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="textareaAutosize">Description</label>
												<div class="col-md-6">
													<textarea class="form-control" rows="3" name="description" data-plugin-textarea-autosize="" style="overflow: hidden; resize: none; height: 74px;">{{$data['page']->description or ""}}</textarea>
												</div>
											</div>

											<div class="form-group">
												
												<label class="col-md-3 control-label" for="inputSuccess">Visibility</label>
												<div class="col-md-6">
													<div class="radio">
														<label>
															<input type="radio" name="visability" id="visability1" value="1" 
															@if(isset($data['page']->visability) == 1)
																checked="yes"
															@endif
															>
															Public
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="visability" id="visability2" value="2" 
															@if(isset($data['page']->visability) && $data['page']->visability == 2)
																checked="yes"
															@endif
															>
															Private
														</label>
													</div>

													<div class="checkbox">
														<label>
															<input type="checkbox" name="active" value="1"
															@if(isset($data['page']->active) && $data['page']->active == 1)
																checked="yes"
															@endif
															>
															Active
														</label>
													</div>
						
												</div>
											</div>
									</div>

								</section>

								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">Page Content</h2>
									</header>
									<div class="panel-body">
											<div class="form-group">
												<label class="col-md-3 control-label"></label>
												<div class="col-md-12">
													<div id="summernote">
													@if(isset($data['page']->content))
													{{$data['page']->content}}
													@endif
													</div>
												</div>
											</div>
										
									</div>
								</section>
									<button type="submit" class="mb-xs mt-xs mr-xs btn btn-lg btn-primary">{{$data['action']}}</button>
									<input type="hidden" id="pageID" name="pageID" value="{{$data['page']->id or ""}}">
									</form>
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