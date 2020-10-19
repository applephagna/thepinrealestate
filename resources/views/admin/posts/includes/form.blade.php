<div class="col-xs-10">
	<fieldset>
		<div class="form-group">
			<label for="title" class="col-xs-1 control-label">Title</label>
			<div class="col-xs-4">
				<input name="title" type="text" class="form-control border-form" required="" placeholder="Enter title"  
				value="{{ isset($post)?$post->title:'' }}">        
			</div>
			<label for="body" class="col-xs-1 control-label">Body</label>
			<div class="col-xs-6">
					<input name="body" type="text" class="form-control border-form" requir	ed="" placeholder="Enter Body" 
					value="{{ isset($post)?$post->body:'' }}">        
			</div>
		</div>
		<div class="form-group">
			<label for="name" class="col-xs-1 control-label"></label>
			<div class="col-xs-3">
				<div class="checkbox">
					<label class="block">
						<input name="status" type="checkbox" class="ace input-sm" {{ isset($post)? $post->status==1?'checked':'':'' }}>
						<span class="lbl bigger-120">&nbsp;Publish</span>
					</label>
				</div>			
			</div>
			<label for="display_name" class="col-sm-2 control-label">Feature Image</label>
			<div class="col-xs-6">
				<div class="col-xs-6">
					<input type="file" name="image" id="image" style="display: none;"/>
					<a href="javascript:changeProfile()" id="btn-upload" style="display: block;" class="btn btn-success btn-sm btn-block">Upload</a>							
				</div>
				<div class="col-xs-6">
					<a style="color: red; display: none;" href="javascript:removeImage()" 
					class="btn btn-danger btn-sm btn-block" id="btn-remove">Remove</a>
				</div>						
			</div>
		</div>
	</fieldset>
</div>
<div class="col-xs-2">
	<img id="preview" src="{{ isset($post->image)?asset('uploads/post/'.$post->image): asset('images/no-image.png')}}" alt="" width="80px" height="90px">
</div>
<div class="col-xs-12">
	<div class="form-actions center">
		<a href="{{ route('admin.posts.index') }}" class="btn btn-warning btn-xs">
			<i class="icon-undo bigger-110"></i>
			&nbsp;&nbsp;Back&nbsp;&nbsp;
		</a>
		<button class="btn btn-success btn-xs" type="submit">
			<i class="icon-ok bigger-110"></i>
			{{ $formMode === 'create' ? 'Create' : 'Update' }}
		</button>
	</div>			
</div>