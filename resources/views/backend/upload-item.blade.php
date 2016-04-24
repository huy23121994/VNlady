<div>
	<!-- form start -->
	<form action="{{url('manager/item/store')}}" id="upload" role="form">
		<div class="box-body">
			<div class="form-group">
				<label>Title <small class="error"></small></label>
				<input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
			</div>
			<div style="background-color: #F0F8FF;padding: 10px;">
				<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					<li class="active"><a href="#link" data-toggle="tab" aria-expanded="true">Video</a></li>
					<li class=""><a href="#article" data-toggle="tab" aria-expanded="true">Article</a></li>
				</ul>		
				<div class="tab-content">
				  	<div class="tab-pane active" id="link">
						<div class="form-group">
						   <label>Embed link <small class="error"></small></label>
						   <input type="text" class="form-control" id="embed_link" name="embed_link" placeholder="Enter the embed link">
						</div>
						<div class="form-group">
						   <label>Description <small class="error"></small></label>
						   <textarea class="form-control" id="description" name="description" placeholder="Enter description"></textarea>
						</div>
				  	</div>	
				  	<div class="tab-pane" id="article">
						<div class="form-group">
						   <label>Article content <small class="error"></small></label>
						   <textarea class="textarea"></textarea>
						</div>		
				  	</div>	
				</div><!-- /.tab-content -->
			</div>
			<div class="form-group">
				<label>Category <small class="error"></small></label>
				<input type="hidden" id="categories"></input>
				<select class="form-control select2 select2-hidden-accessible" name="categories[]" multiple data-placeholder="Select category" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
					@foreach($categories as $category)
				      	<option value="{{$category['id']}}">{{$category['category']}}</option>
				    @endforeach
			    </select>
			</div>
			<div class="form-group">
				<label>Tags </label>
				<select class="form-control select2 select2-hidden-accessible" name="tags[]" multiple data-placeholder="Select tags" style="width: 100%;" tabindex="-1" aria-hidden="true">
					@foreach($tags as $tag)
				      	<option value="{{$tag['id']}}">{{$tag['tag_name']}}</option>
				    @endforeach
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