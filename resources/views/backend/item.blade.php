@extends('master')

@section('title','ADMIN - VN LADY')

@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/backend/dist/skins/skin-blue.min.css">
	<!-- Select2  -->
	<link rel="stylesheet" href="/css/backend/plugins/select2.min.css">
	<!-- DataTables  -->
	<link rel="stylesheet" href="/css/backend/plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="/css/backend/dist/AdminLTE.min.css">
@endsection

@section('body-class','skin-blue sidebar-mini')

@section('main')
	<div class="wrapper">
		@include('backend.layouts.header')
		@include('backend.layouts.sidebar')
		<div class="content-wrapper" style="min-height: 351px;">
			<!-- Content Header (Page header) -->
	        <section class="content-header">
	          	<h1>
		            Video management
		            <small>Embed from Youtube</small>
	          	</h1>
	        </section>

	        <!-- Main content -->
	        <section class="content">

	        	<div class="row">
	        		<div class="col-sm-12">
		        		<div class="nav-tabs-custom">
			                <ul class="nav nav-tabs">
			                  	<li class="active"><a href="#list" data-toggle="tab" aria-expanded="true">List items</a></li>
			                  	<li class=""><a href="#upload" data-toggle="tab" aria-expanded="false">Upload</a></li>
			                </ul>
			                <div class="tab-content">
			                  	<div class="tab-pane active" id="list">

			                  		@include('backend.list-item')

			                  	</div>
			                  	<div class="tab-pane" id="upload">

			                  		@include('backend.upload-item')

			                  	</div>
			                </div><!-- /.tab-content -->
		              	</div>
	        			
	        		</div>
	        	</div>

	        </section>
		</div>
		@include('backend.layouts.footer')
	</div>
@endsection

@section('js')
	<script src="/js/backend/dist/app.min.js"></script>
	<!-- Select2 -->
	<script src="/js/backend/plugins/select2.full.min.js"></script>
	<!-- DataTables  -->
	<script src="/js/backend/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="/js/backend/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script src="/js/backend/ajax/item-upload.js"></script>
	<script type="text/javascript">
	    $(document).ready(function () {
			//Initialize Select2 Elements
        	$(".select2").select2();

	    	//DataTable
	        $("#list-item").DataTable();
	    });
    
	</script>
@endsection