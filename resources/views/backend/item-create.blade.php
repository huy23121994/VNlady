@extends('backend/layouts/backend-layout')

@section('backend-css')
	<!-- Select2  -->
	<link rel="stylesheet" href="/css/backend/plugins/select2.min.css">
@endsection
@section('new','active')
@section('backend-main')
		<div class="content-wrapper" style="min-height: 351px;">
			<!-- Content Header (Page header) -->
	        <section class="content-header">
	          	<h1>
		            Add new post
	          	</h1>
	          	<ol class="breadcrumb">
		            <li><a href="{{url('manager/item')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		            <li><a href="{{url('manager/item')}}"> Posts</a></li>
		            <li class="active">Upload</li>
		        </ol>
	        </section>

	        <!-- Main content -->
	        <section class="content">

	        	<div class="row">
	        		<div class="col-sm-12">
		        		<div class="nav-tabs-custom">
			                <!-- form start -->
							<form action="{{url('manager/item/store')}}" id="upload" role="form">
								<div class="box-body">
									<div class="form-group">
										<label>Title <small class="error"></small></label>
										<input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
									</div>
									<div class="form-group">
									   <label>Description <small class="error"></small></label>
									   <textarea class="form-control" id="description" name="description" placeholder="Enter description" required></textarea>
									</div>
									<div class="form-group">
									   <label>Embed link <small class="error"></small></label>
									   <input type="text" class="form-control" id="embed_link" name="embed_link" placeholder="Enter the embed link" required>
									</div>
									<div class="form-group">
										<label>Category <small class="error"></small></label>
										<input type="hidden" id="categories"></input>
										<select class="form-control select2 select2-hidden-accessible" name="categories[]" multiple data-placeholder="Select category" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
									      	<option value="1">Fashion</option>
									      	<option value="2">Makeup</option>
									      	<option value="3">DIY</option>
									      	<option value="4">Hairstyles</option>
									      	<option value="5">Nails</option>
									      	<option value="6">Cooking</option>
										    <option value="7">Health</option>
									    </select>
									</div>
									<div class="form-group">
										<label for="img">Image preview <small class="error"></small></label>
										<input type="file" name="img" id="img" required accept="image/*">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<p class="help-block">Click button to choose image from your device ( Recommend file < 300Kb )</p>
									</div>
								</div><!-- /.box-body -->

								<div class="box-footer">
									<button type="submit" class="btn btn-primary">
										<i class="fa fa-upload"></i>
										<i class="fa fa-refresh fa-spin hidden"></i>
										 Upload
									 </button>
								</div>
							</form>
		              	</div>
	        			
	        		</div>
	        	</div>

	        </section>
		</div>
@endsection

@section('backend-js')
	<!-- Select2 -->
	<script src="/js/backend/plugins/select2.full.min.js"></script>

	<script src="/js/backend/ajax/item-upload.js"></script>
	<script type="text/javascript">
	    $(document).ready(function () {
			//Initialize Select2 Elements
        	$(".select2").select2();
	    });
    
	</script>
@endsection