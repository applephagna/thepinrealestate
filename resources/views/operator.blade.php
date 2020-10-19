<li class="number">
	<a href="tel:{{$property->phone1?$property->phone1:''}}" rel="nofollow" class="number-0 small" title="{{$operator_name1}}:{{$property->phone1?$property->phone1:''}}">
	<img class="icon-provider"
		@if ($operator_name1=="Cellcard")
			src="{{asset('assets/img/sim/cellcard.png')}}"
		@endif
		@if ($operator_name1=="Smart")
			src="{{asset('assets/img/sim/smart.png')}}"
		@endif
		@if ($operator_name1=="Metfone")
			src="{{asset('assets/img/sim/metfone.png')}}"
		@endif
	alt="{{$operator_name1}}">
	<div class="num">{{$property->phone1?$property->phone1:''}}</div>
	</a>
</li>
<li class="number">
	<a href="tel:{{$property->phone2?$property->phone2:''}}" rel="nofollow" class="number-1 small" title="{{$operator_name2}}:{{$property->phone2?$property->phone2:''}}">
	<img class="icon-provider"
		@if ($operator_name2=="Cellcard")
			src="{{asset('assets/img/sim/cellcard.png')}}"
		@endif
		@if ($operator_name2=="Smart")
			src="{{asset('assets/img/sim/smart.png')}}"
		@endif
		@if ($operator_name2=="Metfone")
			src="{{asset('assets/img/sim/metfone.png')}}"
		@endif
	alt="{{$operator_name2}}">
	<div class="num">{{$property->phone2?$property->phone2:''}}</div>
	</a>
</li>
<li class="number">
	<a href="tel:{{$property->phone3?$property->phone3:''}}" rel="nofollow" class="number-2 small" title="{{$operator_name3}}:{{$property->phone3?$property->phone3:''}}">
	<img class="icon-provider"
		@if ($operator_name3=="Cellcard")
			src="{{asset('assets/img/sim/cellcard.png')}}"
		@endif
		@if ($operator_name3=="Smart")
			src="{{asset('assets/img/sim/smart.png')}}"
		@endif
		@if ($operator_name3=="Metfone")
			src="{{asset('assets/img/sim/metfone.png')}}"
		@endif
	alt="{{$operator_name3}}">
	<div class="num">{{$property->phone3?$property->phone3:''}}</div>
	</a>
</li>
