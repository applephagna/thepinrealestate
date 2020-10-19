<div class="col-sm-12" style="border:solid 3px #e0e0e0;">
  <div class="pddt20"></div>
	<div class="row">
	  <div class="col-sm-8">
	  	<div class="row">
			<div class="col-sm-12">
        <div class="form-group">
          <label class="control-label">Feature</label>
            <div class="fileupload fileupload-new" data-provides="fileupload">
              <div class="input-append">
                <div class="uneditable-input">
                  <i class="fa fa-file fileupload-exists"></i>
                  <span class="fileupload-preview"></span>
                </div>
                <span class="btn btn-default btn-file">
                  <span class="fileupload-exists">Change</span>
                  <span class="fileupload-new">Select file</span>
                  <input id="feature" name="feature" type="file" required="" />
                </span>
                <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
              </div>
              <label class="error" for="feature"></label>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-12">
	            <div class="form-group">
	              <div class="pddt20"></div>
	              <div class="row">
	 								<div class="col-sm-8" id='images-list'>
	              		<label class="control-label">Images</label>
										<div class="row">
											<?php for ($i = 0; $i < 6; $i++) { ?>
											<div class="col-sm-4 images" id="image-<?php echo $i ?>">
			                    <div class="fileupload fileupload-new" data-provides="fileupload">
		                        <div class="input-append hidden">
		                          <div class="uneditable-input">
		                            <i class="fa fa-file fileupload-exists"></i>
		                            <span class="fileupload-preview"></span>
		                          </div>
		                          <span class="btn btn-default btn-file">
		                            <input id="input-img-image-<?php echo $i ?>" name="images[]" type="file"  onchange="loadFile(event,<?php echo $i ?>)"/>
		                            <input name="images_edit[]" type="text">
		                          </span>
		                        </div>
		                        <div style="padding-bottom: 4px "></div>
		                        <img class="img" id="img-image-<?php echo $i ?>" src="{{asset('img/image.png')}}"   />
                    				<span class="remove_img_preview" id="remove-image-<?php echo $i ?>" data-id="<?php echo $i ?>"></span>
		                        <div style="padding-bottom: 4px "></div>
		                        <label class="error" for="error-<?php echo $i ?>"></label>
		                      </div>
											</div>
											<?php }?>
										</div>
	                </div>
	                <div class="col-sm-4 hidden">
	                	col-sm-4
	                  <a id="add-more-image" class="btn btn-default" style="background: #dedada"><i class="fa fa-plus fa-2x"></i><i class="fa fa-image fa-5x"></i>
	                  </a>
	                </div>
	              </div>
	            </div>
        	</div>
        </div>
			</div>
	  	</div>
	  </div>
  	<div class="col-sm-4">
	  	<div class="row">
				<img class="img-responsive" id="img-feature" src="{{asset('img/products.png')}}" alt="feature" width="95%" height="320" />
	  	</div>
  	</div>
	</div>
</div>
