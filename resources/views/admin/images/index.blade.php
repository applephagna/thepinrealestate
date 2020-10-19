@extends('layouts.backend.ace_layout')

@section('title', '| Create Product')

@push('css')
    
  <style>
    a.btn.btn-success.btn-xs.insert-space {
      margin-top: 28px;
		}
		.row.spacing-top {
				margin-top: 15px;
		}		
  </style>
@endpush

@section('content')
	<div class="row">
    <div class="col-xs-12">
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="widget-title">Image Gallery</h4>
					<div class="widget-toolbar">
						<a href="#" data-action="collapse">
							<i class="ace-icon fa fa-chevron-up"></i>
						</a>
					</div>
					@if ($message = Session::get('success'))
						<div class="alert alert-success">
							<p>{{ $message }}</p>
						</div>
					@endif				
				</div>						
				<div class="widget-body">
					<div class="widget-main">
						<div class="row">
							<div class="col-md-12">
								@foreach ($images as $key => $image)										
									<div id="mdb-lightbox-ui"></div>
									<div class="mdb-lightbox">

										<figure class="col-md-4">
											<a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(145).jpg" data-size="1600x1067">
												<img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(145).jpg" class="img-fluid">
											</a>
										</figure>

										<figure class="col-md-4">
											<a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(150).jpg" data-size="1600x1067">
												<img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(150).jpg" class="img-fluid" />
											</a>
										</figure>

										<figure class="col-md-4">
											<a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(152).jpg" data-size="1600x1067">
												<img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(152).jpg" class="img-fluid" />
											</a>
										</figure>

										<figure class="col-md-4">
											<a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(42).jpg" data-size="1600x1067">
												<img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(42).jpg" class="img-fluid" />
											</a>
										</figure>

										<figure class="col-md-4">
											<a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(151).jpg" data-size="1600x1067">
												<img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(151).jpg" class="img-fluid" />
											</a>
										</figure>

										<figure class="col-md-4">
											<a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(40).jpg" data-size="1600x1067">
												<img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(40).jpg" class="img-fluid" />
											</a>
										</figure>

										<figure class="col-md-4">
											<a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(148).jpg" data-size="1600x1067">
												<img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(148).jpg" class="img-fluid" />
											</a>
										</figure>

										<figure class="col-md-4">
											<a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(147).jpg" data-size="1600x1067">
												<img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(147).jpg" class="img-fluid" />
											</a>
										</figure>

										<figure class="col-md-4">
											<a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(149).jpg" data-size="1600x1067">
												<img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(149).jpg" class="img-fluid" />
											</a>
										</figure>

									</div>
									<div class="space-4"></div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
    </div>
	</div>
@endsection

@push('js')

@endpush