@extends('master')

@section('title','ADMIN - VN LADY')

@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="{{url('css/backend/dist/skins/skin-blue.min.css')}}">
	<!-- Select2  -->
	<link rel="stylesheet" href="{{url('css/backend/plugins/select2.min.css')}}">
	<!-- DataTables  -->
	<link rel="stylesheet" href="{{url('css/backend/plugins/datatables/dataTables.bootstrap.css')}}">
	<link rel="stylesheet" href="{{url('css/backend/dist/AdminLTE.min.css')}}">
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
			                <form action="{{url('manager/item/'.$item['id'].'/update')}}" id="upload" role="form">
								<div class="box-body">
									<div class="form-group">
										<label>Title</label>
										<input type="text" class="form-control" name="title" value="{{$item['title']}}" placeholder="Enter title" required>
									</div>
									<div class="form-group">
									   <label>Description</label>
									   <textarea class="form-control" name="description" placeholder="Enter description" required>{{$item['description']}}</textarea>
									</div>
									<div class="form-group">
									   <label>Embed link</label>
									   <input type="text" class="form-control" name="embed_link" value="{{$item['embed_link']}}" placeholder="Enter the embed link" required>
									</div>
									<div class="form-group">
										<label>Category</label>
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
										<label for="img">Image preview</label>
										<img class="show margin-bottom" src="{{url($item['img_preview'])}}" alt="{{$item['title']}}" width="196px">
										<input type="file" name="img">
										<p class="help-block">Click button to choose image from your device</p>
									</div>
								</div><!-- /.box-body -->
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="box-footer">
									<button type="submit" class="btn btn-primary">Update</button>
									<a href="" class="btn btn-danger pull-right" data-toggle="modal" data-target=".modal">Delete</a>
								</div>
							</form>
		              	</div>
	        		</div>
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
					        	<a href="{{url('manager/item/destroy/'.$item['id'])}}" class="btn btn-primary" id="delete">Yes</a>
					      	</div>
					    </div>
				  	</div>
				</div>
	        	<div class="hidden category">
	        		@foreach($item->categories as $category)
	        			<p>{{$category['id']}}</p>
	        		@endforeach
	        	</div>
	        </section>
		</div>
		@include('backend.layouts.footer')
	</div>
@endsection

@section('js')
	<script src="{{url('js/backend/dist/app.min.js')}}"></script>
	<!-- Select2 -->
	<script src="{{url('js/backend/plugins/select2.full.min.js')}}"></script>
	<script type="text/javascript">
		$('.category p').each(function(){
			$category_id = $(this).text();
			$('option[value="'+$category_id+'"]').attr('selected','true');
		})

		$('form#upload').on('submit',function(e) {
			e.preventDefault();
			$.ajax({
				type:'POST',
				url: $(this).attr('action'),
				data:  new FormData($(this)[0]),
				contentType: false,
				processData: false,
				cache: true,
			}).done(function(data){
				if (data=='success'){
					alert('Update success!');
				}else{
					alert('Update fail!');
				}
			}).fail(function(){
				alert('Loi server');
			})
		})


	    $(document).ready(function () {
			//Initialize Select2 Elements
        	$(".select2").select2();

	    });
    
	</script>
@endsection