<div class="filter mb-2 mt-2">
	<form action="#" id="filter_form" method="get">
		<div class="row">
			<div class="col filter-left">
				<div class="tab">
					<div class="btn-group manage_ads_tab" role="group" aria-label="Basic example">
            <a class="active_ads btn btn-clear" href="{{ route('agent.dashboard') }}">Active Ads <span class="counter badge badge-primary ml-1">{{ $count_properties }}</span></a>
						<a class="active expired_ads btn btn-clear" href="{{ route('agent.expired_ads') }}">Expired Ads <span class="counter badge badge-danger ml-1">{{ $count_expired_property }}</span></a>
						<a class=" paid-ads btn btn-clear" href="{{ route('agent.paid_ads') }}">Paid Ads <span class="counter badge badge-success ml-1">{{ $count_premium }}</span></a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col text-left filter-left">
				<div class="form-inline">
					<span class="filter_left form-group">
						<label>Search: </label>
						<input type="text" name="search" class="form-control" placeholder="What are you looking for..." value="">
          </span>
					<span class="filter_left form-group">
						<label>Category: </label>
						@include('includes.main_category')
					</span>
					<span class="filter_left form-group">
						<label>Location: </label>
						<select class="form-control" name="location" style="max-width: 160px;">
              <option value="">All Locations</option>
							@foreach ($provinces as $key => $item)
								<option value="{{ $item }}">{{ $item }}</option>
							@endforeach
						</select>
					</span>
					<span class="filter_left form-group">
						<label>Price: </label>
						<div class="row">
							<div class="col pr-1"><input type="number" class="form-control" name="from_price" placeholder="From" style="max-width: 100px;" value=""></div>
							<div class="col pl-1 pr-1"><input type="number" class="form-control" name="to_price" placeholder="To" style="max-width: 100px;" value=""></div>
							<div class="col pl-1"><button class="btn btn-default btn-block">Go</button></div>
						</div>
					</span>
				</div>
			</div>
			<div class="col col-3 text-right filter-right">
				<div class="form-inline">
					<span class="filter_right  form-group">
						<label>Sort: </label>
						<select class="form-control" name="sort" style="max-width: 160px;">
							<option value="posted_date_desc">Post Date: New to Old</option>
							<option value="posted_date_asc">Post Date: Old to New</option>
							<option value="renew_date_desc">Renew Date: New to Old</option>
							<option value="renew_date_asc">Renew Date: Old to New</option>
							<option value="price_desc">Price: High to Low</option>
							<option value="price_asc">Price: Low to High</option>
						</select>
					</span>
			</div>
			</div>
		</div>
	</form>
</div>
<div class="modal" tabindex="-1" role="dialog" id="promote-modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Promote</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="options">
					<div class="custom-control custom-radio" id="option-free">
						<input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="">
						<label class="custom-control-label" for="customRadio1">
						<div class="title">Free</div>
						</label>
					</div>
					<div class="custom-control custom-radio" id="option-feature">
						<input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
						<label class="custom-control-label" for="customRadio2">
						<div class="title">Feature Ad</div>
						<div class="pricing"><span class="price">$50</span>/Month</div>
						</label>
					</div>
					<div class="custom-control custom-radio" id="option-top">
						<input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
						<label class="custom-control-label" for="customRadio3">
						<div class="title">Top Ad</div>
						<div class="pricing"><span class="price">$150</span>/Month</div>
						</label>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary" id="btn-promote">Submit</button>
			</div>
		</div>
	</div>
</div>

<div id="my_content" class="">
	<div class="post_shortcut text-center bg-white border rounded mb-3">
		<div class="text">
		Hi <strong>p-{{ $user->phone }}</strong>, you currently have <strong>{{ $expired_property->count() }}</strong> ads (Expired Ads)
		</div>
		<div>
			<a class="btn btn-warning btn-md " href="{{ route('agent.post.index') }}">
				<span class="icon icon-plus-full"></span> Post an Ad
			</a>
		</div>
	</div>
	<ul class="list_posts list-unstyled">
		@if ($expired_property->count()>0)
			@foreach ($expired_property as $key => $property)
				<li id="item-{{ $property->id }}">
					<div class="item_box">
						<div class="ad_info">
							@if ($property->is_expired)
								<span class="icon-point yellow"></span>
								<span class="status">Ad Expired</span>
							@else
								<span class="icon-point green"></span>
								<span class="status">Ad Active</span>
							@endif
						</div>
						<div class="detail_box ">
							<a class="post_image" href="{{ route('agent.post.show',$property->slug) }}" title="">
								<img alt="" class="img-cover" src="{{isset($property->galleries[0]->gallery_image) ? asset('uploads/property/galleries/'.$property->galleries[0]->gallery_image):asset('assets/img/no_image.gif')}}" />
							</a>
							<div class="post_detail">
								<a class="title" href="{{ route('agent.post.show',$property->slug) }}" title="{{ $property->title }}">{{ $property->title }}</a>
								<div class="ad_price">${{ $property->price }}</div>
								<div class="save_ads_sumery">
									<dl>
										<dt>Ad ID:</dt>
											<dd>{{ $property->id }}</dd>
									</dl>
									<dl>
										<dt>Posted On:</dt>
											<dd>{{ $property->created_at }}</dd>
									</dl>
									<dl>
										<dt>Renew On:</dt>
											<dd>{{ $property->updated_at }}</dd>
									</dl>
									<dl>
										<dt>View:</dt>
											<dd>{{ $property->view_count }}</dd>
									</dl>
								</div>
								<p class="save_post_detail">
									{{ Str::limit($property->description,100) }}
								</p>
							</div>
						</div>
						<div class="controls ">
							<div class="list_control text-center row">
								<div class="col">
									<a href="#promote-ad.html" class="btn btn-link " data-id="{{ $property->id }}" data-m="0" data-h="1" data-ampm="am"><span class="icon icon-renew"></span> Auto Renew
									</a>
								</div>
								<div class="col">
									<a class="btn btn_renew disable disabled" data-disable="true" data-renewdate="20190413" title="Renew" href="#"><span class="icon icon-repost"></span> <span class="text">Renew</span>
									</a>
								</div>
								<div class="col">
									<a class="btn btn_edit " title="Edit" data-id="{{ $property->id }}" href="{{ route('agent.post.edit',[$property->id,$property->parent_id]) }}"><span class="icon icon-edit"></span> <span class="text">Edit</span>
									</a>
								</div>
								<div class="col">
									<a data-status="active" class="btn btn_delete " title="Delete" data-id="{{ $property->id }}" href="#delete_ad_reason"><span class="icon icon-delete"></span> <span class="text">Delete</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</li>
			@endforeach
		@else
			<div class="post_shortcut text-center bg-white border rounded mb-3">
				<div class="text">
				{{-- Hi <strong>p-{{ $user->phone }}</strong>, you currently have <strong>{{ $expired_property->count() }}</strong> ads (Active Ads) --}}
				</div>
				<div>
					<div class="text-center  text-danger">
						<h3>No record found!</h3>
					</div>
				</div>
			</div>
		@endif
	</ul>
</div>

<div class="modal delete_ad_reason" tabindex="-1" role="dialog" id="delete_ad_reason">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Delete Reason</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body form">
				<div id="popup_message"></div>
				<div class="reason">
					<div class="custom-control custom-radio form-group">
						<input type="radio" name="delete_ad_reason" class="custom-control-input" id="reason-lang-reason-1" value="lang-reason-1">
						<label class="custom-control-label" for="reason-lang-reason-1">This product has been sold</label>
					</div>
					<div class="custom-control custom-radio form-group">
						<input type="radio" name="delete_ad_reason" class="custom-control-input" id="reason-lang-reason-2" value="lang-reason-2">
						<label class="custom-control-label" for="reason-lang-reason-2">Suspend this ads</label>
					</div>
					<div class="custom-control custom-radio form-group">
						<input type="radio" name="delete_ad_reason" class="custom-control-input" id="reason-lang-reason-3" value="lang-reason-3">
						<label class="custom-control-label" for="reason-lang-reason-3">Delete to post new ads</label>
					</div>
					<div class="custom-control custom-radio form-group">
						<input type="radio" name="delete_ad_reason" class="custom-control-input" id="reason-other" value="other">
						<label class="custom-control-label" for="reason-other">Other</label>
					</div>
				</div>
				<div class="enter_reason" id="enter_reason">
					<textarea id="input_reason" name="enter_reason" minlength="15" maxlength="255" placeholder="Comment..." class="form-control"></textarea>
				</div>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary btn_close_modal" data-dismiss="modal">Cancel</button>
			<button type="button" class="btn btn-danger" id="btn_delete_ad">Delete</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$('body').delegate('.btn_delete', 'click', function(event) {
			event.preventDefault();
			var id = $(this).data('id');
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.value) {
					$.post('{{ route("agent.post.destroy") }}',{id:id},function(data){
						location.reload();
					})
					Swal.fire({
						title: 'Successful Deleted!',
						html: 'It will close in <strong></strong> seconds.',
						timer: 2000,
						onBeforeOpen: () => {
							Swal.showLoading()
							timerInterval = setInterval(() => {
								Swal.getContent().querySelector('strong')
									.textContent = Swal.getTimerLeft()
							}, 200)
						},
						onClose: () => {
							clearInterval(timerInterval)
						}
					}).then((result) => {
						if (
							// Read more about handling dismissals
							result.dismiss === Swal.DismissReason.timer
						) {
							console.log('I was closed by the timer')
						}
					})
				}
			})
		});
	});
</script>
