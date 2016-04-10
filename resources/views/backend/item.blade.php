@extends('backend/layouts/backend-layout')

@section('backend-css')
	<!-- DataTables  -->
	<link rel="stylesheet" href="/css/backend/plugins/datatables/dataTables.bootstrap.css">
@endsection
@section('all','active')
@section('backend-main')
		<div class="content-wrapper" style="min-height: 351px;">
			<!-- Content Header (Page header) -->
	        <section class="content-header">
	          	<h1>
		            Posts
		            <a href="{{url('manager/item/create')}}" class="btn btn-primary btn-sm">
		            	<i class="glyphicon glyphicon-plus" style="font-size: 10px;"></i> Add new
		            </a>
	          	</h1>
	          	<ol class="breadcrumb">
		            <li><a href="{{url('manager/item')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		            <li class="active">Posts</li>
		        </ol>
	        </section>

	        <!-- Main content -->
	        <section class="content">

	        	<div class="row">
	        		<div class="col-sm-12">
		        		<div class="nav-tabs-custom">
			                @include('backend.list-item')
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
	        $("#list-item").DataTable();
	    });
    
	</script>
@endsection