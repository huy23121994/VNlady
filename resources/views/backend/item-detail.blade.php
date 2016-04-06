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
		        			<div class="box-header">
			        			<label>Uploader : </label><span> {{$item->user['account']}}</span></br>
			        			<label>Created Time : </label><span> {{$item['created_at']}}</span></br>
			        			<label>Updated Time : </label><span> {{$item['updated_at']}}</span></br>
		        			</div>
			                <form action="{{url('manager/item/'.$item['id'].'/update')}}" id="upload" role="form">
								<div class="box-body">
									<div class="form-group">
										<label>Title <small class="error"></small></label>
										<input type="text" class="form-control" id="title" name="title" value="{{$item['title']}}" placeholder="Enter title" required>
									</div>
									<div class="form-group">
									   <label>Description <small class="error"></small></label>
									   <textarea class="form-control" id="description" name="description" placeholder="Enter description" required>{{$item['description']}}</textarea>
									</div>
									<div class="form-group">
									   <label>Embed link <small class="error"></small></label>
									   <input type="url" class="form-control" id="embed_link" name="embed_link" value="{{$item['embed_link']}}" placeholder="Enter the embed link" required>
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
										<img class="show margin-bottom img_preview" src="{{$item['img_preview']}}" alt="{{$item['title']}}" width="196px">
										<input type="file" name="img" id="img">
										<p class="help-block">Click button to choose image from your device ( Recommend file < 300Kb )</p>
									</div>
								</div><!-- /.box-body -->
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="box-footer">
									<button type="submit" class="btn btn-primary">
										<i class="fa fa-refresh"></i>
										 Update
									</button>
									<a href="" class="btn btn-danger pull-right" data-toggle="modal" data-target=".modal"><i class="fa fa-trash-o"></i> Delete</a>
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
@endsection

@section('backend-js')
	<!-- Select2 -->
	<script src="/js/backend/plugins/select2.full.min.js"></script>
	<script type="text/javascript" src="/js/backend/ajax/item-update.js"></script>
	<script type="text/javascript">
		$('.category p').each(function(){
			$category_id = $(this).text();
			$('option[value="'+$category_id+'"]').attr('selected','true');
		})
		
	    $(document).ready(function () {
			//Initialize Select2 Elements
        	$(".select2").select2();

        	/* Change images before upload */
        	$('#img').on('change',function(){
                readURL(this,'.img_preview'); 
            })

            function readURL(input,selector) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (theFile) {
                        var image = new Image();
                        image.src = theFile.target.result;
                        image.onload = function() {
                            $(selector).attr('src', this.src);
                     
                        };
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            /* END change image*/
	    });
	</script>
@endsection