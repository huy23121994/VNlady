@extends('backend/layouts/backend-layout')

@section('backend-css')
	<!-- Select2  -->
	<link rel="stylesheet" href="/css/backend/plugins/select2.min.css">
	<!-- DataTables  -->
	<link rel="stylesheet" href="/css/backend/plugins/datatables/dataTables.bootstrap.css">
@endsection

@section('backend-main')
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
@endsection

@section('backend-js')
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