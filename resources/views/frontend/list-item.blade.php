<section class="container">
	@if(isset($category))
		<h3>{{$category['category']}}</h3>
	@elseif(isset($tag))
		<h3>Tag: {{$tag['tag_name']}}</h3>
	@endif
	<div class="row grid">
	@foreach($items as $item)
		<div class="grid-item col-md-3 col-sm-4 col-xs-6">
			<div class="wrapper">
				<div class="img">
					<a href="{{url('/item/'.$item['id'])}}">
						<img src="{{$item['img_preview']}}" alt="{{$item['title']}}">
					</a>
				</div>
				<div class="content">
					<h5><a href="{{url('/item/'.$item['id'])}}">{{$item['title']}}</a></h5>
					<p>
						<i class="fa fa-folder-open"></i> :
						@foreach($item->categories as $category)
							<a href="{{url('category/'.$category['slug'])}}">
								{{$category['category']}}
							</a>
						@endforeach
						@if($item->tags->count() > 0)
							<i class="fa fa-tags"></i> :
							@foreach($item->tags as $tag)
								<a href="{{url('tag/'.$tag['slug'])}}">
									{{$tag['tag_name']}}
								</a>
							@endforeach
						@endif
					</p>
					<p>
						
					</p>
				</div>
			</div>
		</div>
	@endforeach
	</div>
	@include('pagination.limit_links', ['paginator' => $items])
</section>