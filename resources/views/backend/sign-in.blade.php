@extends('backend/layouts/backend-layout')

@section('title','Sign In - VN LADY')

@section('body-class','hold-transition login-page')

@section('main')
	<div class="login-box">
      	<div class="login-logo">
        	<a href="../../index2.html"><b>VN</b>LADY</a>
      	</div><!-- /.login-logo -->
      	<div class="login-box-body">
        	<p class="login-box-msg">Sign in to start your session</p>
	        <form action="{{url('vnlady-signin/signin')}}">
	          	<div class="form-group has-feedback">
	            	<input type="text" name="account" required class="form-control" placeholder="Account" spellcheck="false">
	            	<span class="glyphicon glyphicon-user form-control-feedback"></span>
	            	<p class="error"></p>
	          	</div>
	          	<div class="form-group has-feedback">
	            	<input type="password" name="password" required class="form-control" placeholder="Password">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
	            	<span class="glyphicon glyphicon-lock form-control-feedback"></span>
	            	<p class="error"></p>
	         	</div>
	          	<div class="row">
	            	<div class="col-xs-offset-4 col-xs-4">
	              	<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
	            	</div>
				</div>
	        </form>
      	</div><!-- /.login-box-body -->
    </div>
@endsection

@section('js')
	<script src="/js/backend/ajax/sign-in.js"></script>
@endsection