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
			                @include('backend.upload-item')
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
	<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
	<script type="text/javascript">
	    $(document).ready(function () {
			//Initialize Select2 Elements
        	$(".select2").select2();

	        //Tiny Editor
	        tinymce.init({
			    selector: '.textarea',
			    min_height : 300,
			    plugins: 'image,advlist,media,link,code,paste,textcolor,table', 
				toolbar: 'undo redo image advlist media link styleselect fontsizeselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code',

			});
	    });
    
	</script>
@endsection