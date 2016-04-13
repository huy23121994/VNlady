@extends('backend/layouts/backend-layout')

@section('backend-css')
	<style type="text/css">
		.error{
			font-weight: normal;
			color: #dd4b39;
		}
	</style>
@endsection
@section('tag','active')
@section('backend-main')
		<div class="content-wrapper" style="min-height: 351px;">
			<!-- Content Header (Page header) -->
	        <section class="content-header">
	          	<h1>Tags</h1>
	          	<ol class="breadcrumb">
		            <li><a href="{{url('manager/item')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		            <li><a href="{{url('manager/item')}}"> Posts</a></li>
		            <li><a href="{{url('manager/tag')}}"> Tags</a></li>
		            <li class="active">{{$tag['tag_name']}}</li>
		        </ol>
	        </section>

	        <!-- Main content -->
	        <section class="content">

	        	<div class="row">
	        		<div class="col-sm-12">
		        		<div class="nav-tabs-custom">
		        			<div class="box box-success">
				                <div class="box-header with-border">
				                  <h3 class="box-title">Update Tag</h3>
				                </div><!-- /.box-header -->
				                <!-- form start -->
				                <form action="{{url('manager/tag/'.$tag['id'].'/update')}}" role="form" method="post">
				                  <div class="box-body">
				                    <div class="form-group">
				                      	<label>Name</label>
				                      	<input type="text" class="form-control" name="tag_name" value="{{$tag['tag_name']}}" required>
				                      	<p class="help-block">The name is how it appears on your site.</p>
				                    </div>
				                    <div class="form-group">
				                      	<label>
					                      	Slug 
					                      	<small class="error">
					                      		@if(session('error'))
					                      			{{session('error')}}
					                      		@endif
					                      	</small>
				                      	</label>
				                      	<input type="text" class="form-control" name="slug" value="{{$tag['slug']}}">
				                      	<p class="help-block">The “slug” is the URL-friendly version of the name. Ex: If you enter "amazing-nails", url will be "vnlady.us/tag/amazing-nails"</p>
				                    </div>
				                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
				                  </div><!-- /.box-body -->

				                  <div class="box-footer">
				                    <button type="submit" class="btn btn-primary">
				                    	<i class="fa fa-refresh"></i> Update
				                    </button>
				                    <a href="" class="btn btn-danger pull-right" data-toggle="modal" data-target=".modal"><i class="fa fa-trash-o"></i> Delete</a>
				                  </div>
				                </form>
				            </div>

				        	<!-- Small modal -->
				        	<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
							  	<div class="modal-dialog modal-sm">
							   	 	<div class="modal-content">
								      	<div class="modal-header">
								        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        	<h4 class="modal-title" id="myModalLabel">Are you sure delete this item?</h4>
								      	</div>
								      	<div class="modal-body text-center">
								        	<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
								        	<a href="{{url('manager/tag/destroy/'.$tag['id'])}}" class="btn btn-primary" id="delete">Yes</a>
								      	</div>
								    </div>
							  	</div>
							</div><!--END Small modal -->

		            	</div>
	        		</div>
	        	</div>

	        </section>
		</div>
@endsection

@section('backend-js')

@endsection