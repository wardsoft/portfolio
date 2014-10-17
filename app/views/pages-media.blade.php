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
						<h2>Media</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Media</span></li>
							</ol>
						</div>
					</header>
					<section id="imagePanel" class="panel">
									<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">Media</h2>
									</header>
									<div class="panel-body" >
											<div id="sortable" class="thumbnail-gallery">
												@foreach($data['files'] as $file)
													<a class="img-thumbnail lightbox" href="{{$file}}" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
														@if(pathinfo($file, PATHINFO_EXTENSION) == 'pdf')
														<img class="img-responsive" width="125" src="/assets/images/pdf_icon.png">
														@else
														<img class="img-responsive" width="215" src="{{$file}}">
														@endif
														<span>
														
														</span>
														<span class="deleteMedia">
															<i class="fa fa-times"></i>
														</span>
														<span class="zoom">
															<i class="fa fa-search"></i>
														</span>
													</a>
												@endforeach
											</div>
										
										<form action="/media/upload" class="dropzone dz-square dz-clickable" id="dropzone-form">
											<div class="dz-default dz-message"><span>Drop files here to upload</span>
											</div>
										</form>
									</div>
						
								</section>
				</section>
			</div>
						

						</div>
					<!-- end: page -->
				</section>
			</div>

		</section>
@stop		
		<!-- end: page -->