@extends('backend/layouts/backend-layout')

@section('backend-css')
	<!-- Select2  -->
	<link rel="stylesheet" href="/css/backend/plugins/select2.min.css">
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
		            <li><a href="{{url('manager/item')}}"> Posts</a></li>
		            <li class="active">{{$item['title']}}</li>
		        </ol>
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
									<div style="background-color: #F0F8FF;padding: 10px;">
										<ul class="nav nav-tabs">
											<li class=""><a href="#link" data-toggle="tab" aria-expanded="true">Video</a></li>
											<li class=""><a href="#article" data-toggle="tab" aria-expanded="true">Article</a></li>
										</ul>		
										<div class="tab-content">
										  	<div class="tab-pane " id="link">
												<div class="form-group">
												   <label>Embed link <small class="error"></small></label>
												   <input type="url" class="form-control" id="embed_link" name="embed_link" value="{{$item['embed_link']}}" placeholder="Enter the embed link">
												</div>
												<div class="form-group">
												   <label>Description <small class="error"></small></label>
												   <textarea class="form-control" id="description" name="description" placeholder="Enter description">{{$item['description']}}</textarea>
												</div>
										  	</div>	
										  	<div class="tab-pane" id="article">
												<div class="form-group">
												   <label>Article content <small class="error"></small></label>
												   <textarea class="textarea">{{$item['content']}}</textarea>
												</div>
										  	</div>	
										</div><!-- /.tab-content -->
									</div>
									<div class="form-group categories-select">
										<label>Category <small class="error"></small></label>
										<input type="hidden" id="categories"></input>
										<select class="form-control select2 select2-hidden-accessible" name="categories[]" multiple data-placeholder="Select category" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
											@foreach($categories as $category)
										      	<option value="{{$category['id']}}">{{$category['category']}}</option>
										    @endforeach
									    </select>
									</div>
									<div class="form-group tags-select">
										<label>Tags </label>
										<select class="form-control select2 select2-hidden-accessible" name="tags[]" multiple data-placeholder="Select tags" style="width: 100%;" tabindex="-1" aria-hidden="true">
											@foreach($tags as $tag)
										      	<option value="{{$tag['id']}}">{{$tag['tag_name']}}</option>
										    @endforeach
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
	        	<div class="hidden tag">
	        		@foreach($item->tags as $tag)
	        			<p>{{$tag['id']}}</p>
	        		@endforeach
	        	</div>
	        </section>
		</div>
@endsection

@section('backend-js')
	<!-- Select2 -->
	<script src="/js/backend/plugins/select2.full.min.js"></script>
	<script type="text/javascript" src="/js/backend/ajax/item-update.js"></script>
	<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
	<script type="text/javascript">
		//list category selected
		$('.category p').each(function(){
			$category_id = $(this).text();
			$('.categories-select option[value="'+$category_id+'"]').attr('selected','true');
		})
		//list tag selected
		$('.tag p').each(function(){
			$tag_id = $(this).text();
			$('.tags-select option[value="'+$tag_id+'"]').attr('selected','true');
		})
		
	    $(document).ready(function () {
			//Initialize Select2 Elements
        	$(".select2").select2();

	        tinymce.init({
			    selector: '.textarea',
			    min_height : 300,
			    plugins: 'image,advlist,media,link,code,paste,textcolor,table', 
				toolbar: 'undo redo image advlist media link styleselect fontsizeselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code',

			});
			$('.nav-tabs li').removeClass('active');
	        @if($item['content']==null)
	        	$('.nav-tabs li a[href="#link"]').parent().addClass('active');
	        	$('.tab-pane#link').addClass('active');
	        @else
	        	$('.nav-tabs li a[href="#article"]').parent().addClass('active');
	        	$('.tab-pane#article').addClass('active');
	        @endif
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