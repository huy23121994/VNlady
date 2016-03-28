<?php
	$category = $item->categories->first();
	$count = $category->items->count();
	if ($count<5) {
		$items_relate = $category->items->random($count);
	}else{
		$items_relate = $category->items->random(5);
	}
	
?>
@extends('master')
@section('title',$item['title'].' - VNLady')

@section('meta')
	<meta name="description" content="$item['description']" />
	<meta name="keywords" content="$item['title']" />
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
@endsection

@section('main')
<!-- FOR FACEBOOK API -->
<script>
  	window.fbAsyncInit = function() {
    	FB.init({
      		appId      : '855030641283448',
      		xfbml      : true,
      		version    : 'v2.5'
    	});
  	};

  	(function(d, s, id){
     	var js, fjs = d.getElementsByTagName(s)[0];
     	if (d.getElementById(id)) {return;}
     	js = d.createElement(s); js.id = id;
     	js.src = "//connect.facebook.net/en_US/sdk.js";
     	fjs.parentNode.insertBefore(js, fjs);
   	}(document, 'script', 'facebook-jssdk'));
</script>
<!-- END FACEBOOK API -->
	@include('frontend.layouts.header')

	<section class="container" id="show-item">
		<div class="row">
			<div class="col-sm-8 left-content">
				<div class="row header">
					<h4>{{$item['title']}}</h4>
					<p>{{$item['created_at']}}</p>
				</div>
				<div class="h_iframe">
					<img class="ratio" src="http://placehold.it/16x9"/>
	        		<iframe src="{{$item['embed_link']}}" frameborder="0" allowfullscreen></iframe>
				</div>
				<div
				  class="fb-like"
				  data-share="true"
				  data-width="450"
				  data-show-faces="true">
				</div>
				<div class="fb-comments" data-href="{{url('/item/'.$item['id'])}}" data-width="100%" data-numposts="5"></div>
			</div>
			<div class="col-sm-4 right-content">
				<div>
					<h5>Description</h5>
					<p>{{$item['description']}}</p>
				</div>
				<div>
					<h5>Category</h5>
					<p>
					@foreach($item->categories as $category)
						<a href="{{url('category/'.$category['id'])}}">{{$category['category']}} </a>
					@endforeach
					</p>
				</div>
				<div>
					<h5>Related Posts</h5>
					@foreach($items_relate as $item_relate)
					<div class="media">
					  	<div class="media-left">
					    	<a href="{{url('/item/'.$item_relate['id'])}}">
					      		<img class="media-object" src="{{'/'.$item_relate['img_preview']}}" alt="{{$item_relate['title']}}" width="100">
					    	</a>
					  	</div>
					  	<div class="media-body">
						  	<a href="{{url('/item/'.$item_relate['id'])}}">
						    	<h5 class="media-heading">{{$item_relate['title']}}</h5>
					    	</a>
					  	</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>

	@include('frontend.layouts.footer')
@endsection

@section('js')
	<script type="text/javascript">
		$('header .nav li').removeClass('active');
	</script>
@endsection