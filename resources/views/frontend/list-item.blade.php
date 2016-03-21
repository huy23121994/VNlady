<section class="container">
	@if(isset($category))
		<h3>{{$category['category']}}</h3>
	@endif
	<div class="row grid">
	@foreach($items as $item)
		<div class="grid-item col-md-3 col-sm-4 col-xs-6">
			<div>
				<div>
					<a href="{{url('/item/'.$item['id'])}}">
						<img src="{{url($item['img_preview'])}}" alt="{{$item['title']}}">
					</a>
				</div>
				<div>
					<h4>{{$item['title']}}</h4>
				</div>
			</div>
		</div>
	@endforeach
	</div>
</section>