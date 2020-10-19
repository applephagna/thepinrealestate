<div class="form-group">
	<label for="ad_text" class="col control-label">Ad Photos <i class="red">*</i></label>
	<div id="plupload" class="col-8">
		<div class="row plupload_block">
			<div class="pl fleft col-12">
				<span class="drop_file_hear"></span>
				<div id="multi-upload">
					<div id="console"></div>
					<ul class="list-image list-unstyled">
						@for ($i = 1; $i < 9; $i++)
							<li>
								<div id="item-{{ $i }}" class="item">
									<a href="javascript:;" class="btn-browse" id="browse-{{ $i }}">Add Image</a>
								</div>
							</li>
						@endfor
					</ul>
					<div class="drop_box" id="drop-image">
						<span class="image_placeholder"></span>
						<p>Drop your photo hear.</p>
					</div>
					<div class="total_status">
						<span class="current_uploads" id="current_uploads">0</span> of
						<span class="total">8</span>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div style="display:none;">
		<input type="hidden" id="count" value="1">
		<input type="hidden" id="csrf" value="{{ csrf_field() }}">
		<input type="hidden" id="browser" value="">
		</div>
	</div>
</div>
