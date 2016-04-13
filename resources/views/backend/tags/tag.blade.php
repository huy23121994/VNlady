<?php $stt = 1 ?>
@extends('backend/layouts/backend-layout')

@section('backend-css')
	<!-- Select2  -->
	<link rel="stylesheet" href="/css/backend/plugins/select2.min.css">
	<!-- DataTables  -->
	<link rel="stylesheet" href="/css/backend/plugins/datatables/dataTables.bootstrap.css">
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
		            <li class="active">Tags</li>
		        </ol>
	        </section>

	        <!-- Main content -->
	        <section class="content">

	        	<div class="row">
	        		<div class="col-sm-4">
		        		<div class="nav-tabs-custom">
		        			<div class="box box-success">
				                <div class="box-header with-border">
				                  <h3 class="box-title">Add New Tag</h3>
				                </div><!-- /.box-header -->

				                <!-- form start -->
				                <form action="{{url('manager/tag/store')}}" role="form" method="POST">
				                  <div class="box-body">
				                    <div class="form-group">
				                      	<label>Name <small class="error">{{$errors->first('tag_name')}}</small></label>
				                      	<input  type="text" class="form-control" name="tag_name" value="{{ old('tag_name') }}" placeholder="Enter tag name" required>
				                      	<p class="help-block">The name is how it appears on your site.</p>
				                    </div>
				                    <div class="form-group">
				                      	<label>Slug 
				                      		<small class="error">
					                      		@if(session('error'))
					                      			{{session('error')}}
					                      		@endif
					                      	</small>
				                      	</label>
				                      	<input type="text" class="form-control" name="slug" placeholder="Enter tag slug">
				                      	<p class="help-block">The “slug” is the URL-friendly version of the name. Ex: If you enter "amazing-nails", url will be "vnlady.us/tag/amazing-nails"</p>
				                    </div>
				                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
				                  </div><!-- /.box-body -->

				                  <div class="box-footer">
				                    <button type="submit" class="btn btn-primary">Add New Tag</button>
				                  </div>
				                </form>
				            </div>
		            	</div>
	        		</div>
	        		<div class="col-sm-8">
		        		<div class="nav-tabs-custom">
		        			<div class="box box-success">
							    <div class="box-header with-border">
				                  <h3 class="box-title">List Tags</h3>
				                </div><!-- /.box-header -->
				                <!-- form start -->
				                <form role="form">
				                  <div class="box-body">
				                    
		        				<table class="table table-striped" id="list-item" cellspacing="0" width="100%">
							        <thead>
							            <tr>
							            	<th>No.</th>
							                <th>Name</th>
							                <th>Slug</th>
                							<th>Count</th>
							            </tr>
							        </thead>
							        <tfoot>
							            <tr>
							            	<th>No.</th>
							                <th>Name</th>
							                <th>Slug</th>
                							<th>Count</th>
							            </tr>
							        </tfoot>
							        <tbody>
							       	@foreach($tags as $tag)
							            <tr>
							            	<td><?php echo $stt; $stt++ ?></td>
							                <td><a href="{{url('manager/tag/'.$tag['id'].'/edit')}}">{{$tag['tag_name']}}</a></td>
							                <td>{{$tag['slug']}}</td>
							                <td>5</td>
							            </tr>
							        @endforeach
							        </tbody>
							    </table>
				                  </div><!-- /.box-body -->
				                </form>
		        			</div>
		            	</div>
	        		</div>
	        	</div>

	        </section>
		</div>
@endsection

@section('backend-js')
	<!-- DataTables  -->
	<script src="/js/backend/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="/js/backend/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
	    $(document).ready(function () {
	    	//DataTable
	        var table = $("#list-item").DataTable();
	    })
	</script>
@endsection