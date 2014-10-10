@extends('layouts.master')

@section('content')
@parent
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
					<img src="<?php echo asset('assets/images/logo.png');?>" height="52" alt="Porto Admin"/>
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign Up</h2>
					</div>
					<div id="sign-up-container" class="panel-body">
						<form id="sign-up-form" action="" method="post">
							<div class="form-group mb-lg">
								<label>Name</label>
								<input name="name" type="text" required="yes" class="form-control input-lg" />
							</div>

							<div class="form-group mb-lg">
								<label>E-mail Address</label>
								<input name="email" type="email" required="yes" class="form-control input-lg" />
							</div>

							<div class="form-group mb-none">
								<div class="row">
									<div class="col-sm-6 mb-lg">
										<label>Password</label>
										<input id="pwd" name="pwd" type="password" required="yes" class="form-control input-lg" />
									</div>
									<div class="col-sm-6 mb-lg">
										<label>Password Confirmation</label>
										<input id="pwd_confirm" name="pwd_confirm" type="password" required="yes" class="form-control input-lg" />
									</div>
								</div>
							</div>
							<div class="row" id="alert-placeholder"></div>
							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="AgreeTerms" name="agreeterms" type="checkbox" required="yes"/>
										<label for="AgreeTerms">I agree with <a href="#">terms of use</a></label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs">Sign Up</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign Up</button>
								</div>
							</div>
							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>or</span>
							</span>

							<p class="text-center">Already have an account yet? <a href="/sign-in">Sign In!</a>

						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright 2014. All Rights Reserved.</p>
			</div>
		</section>
@stop		
		<!-- end: page -->