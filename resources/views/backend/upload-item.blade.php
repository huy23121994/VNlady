<div>
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
				<input type="file" name="img" id="img" required>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<p class="help-block">Click button to choose image from your device</p>
			</div>
		</div><!-- /.box-body -->

		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</form>
</div>