@extends('backend/layouts/backend-layout')

@section('backend-css')
	<!-- Select2  -->
	<link rel="stylesheet" href="/css/backend/plugins/select2.min.css">
	<!-- Bootstrap WYSIHTML5 -->
	<link href="/css/backend/plugins/editor.css" type="text/css" rel="stylesheet"/>
    <style type="text/css">

    </style>
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
			                <ul class="nav nav-tabs">
			             		<li class="active"><a href="#video" data-toggle="tab" aria-expanded="true">Video</a></li>		
			                  	<li class=""><a href="#article" data-toggle="tab" aria-expanded="false">Article</a></li>		
			                </ul>		
			                <div class="tab-content">		
			                  	<div class="tab-pane active" id="video">		
		
			                  		@include('backend.upload-item')		
		
			                  	</div>		
			                  	<div class="tab-pane" id="article">		
		
			                  		<form>
					                    <textarea class="textarea"></textarea>
					                </form>		
		
			                  	</div>		
			                </div><!-- /.tab-content -->
		              	</div>
	        			
	        		</div>
	        	</div>

	        </section>
		</div>
@endsection

@section('backend-js')
	<!-- Select2 -->
	<script src="/js/backend/plugins/select2.full.min.js"></script>
	<!-- Bootstrap WYSIHTML5 -->
    <script src="/js/backend/plugins/editor.js"></script>

	<script src="/js/backend/ajax/item-upload.js"></script>
	<script type="text/javascript">
	    $(document).ready(function () {
			//Initialize Select2 Elements
        	$(".select2").select2();

	        //bootstrap WYSIHTML5 - text editor
	        $(".textarea").Editor();
	    });
    
	</script>
@endsection