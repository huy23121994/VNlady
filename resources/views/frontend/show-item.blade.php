<?php
	$category = $item->categories->first();
	$count = $category->items->count();
	if ($count<8) {
		$items_relate = $category->items->random($count);
	}else{
		$items_relate = $category->items->random(8);
	}
	
?>
@extends('master')
@section('title',$item['title'].' - VNLady')

@section('meta')
	<meta property="og:description" content="{{$item['description']}}" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="{{url($item['img_preview'])}}" />
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	  (adsbygoogle = window.adsbygoogle || []).push({
	    google_ad_client: "ca-pub-6448738734982132",
	    enable_page_level_ads: true
	  });
	</script>
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
			<!-- LEFT CONTENT -->
			<div class="col-sm-8 left-content">
				<div class="row header">
					<h4>{{$item['title']}}</h4>
					<p>{{$item['created_at']}}</p>
					<div>
						<!-- vnlaydy01 -->
						<ins class="adsbygoogle"
							 style="display:block"
							 data-ad-client="ca-pub-6448738734982132"
							 data-ad-slot="8095157000"
							 data-ad-format="auto"></ins>
						<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>
				</div>
				<div class="h_iframe">
					@if($item['content']!=null)
	        			{!!$item['content']!!}
	        		@else
						<img class="ratio" src="http://placehold.it/16x9"/>
		        		<iframe src="{{$item['embed_link']}}" frameborder="0" allowfullscreen></iframe>
					@endif
				</div>
				<div class="fb-like"
				  	 data-share="true"
				  	 data-width="340"
				  	 data-show-faces="true">
				</div>
				<div class="text-center" style="margin: 10px auto 30px; width: 336px; height: 280px;">
					<!-- vnlaydy01 -->
					<ins class="adsbygoogle"
						 style="display:block"
						 data-ad-client="ca-pub-6448738734982132"
						 data-ad-slot="8095157000"
						 data-ad-format="auto"></ins>
					<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
				<div class="fb-comments" data-href="{{url('/item/'.$item['slug'])}}" data-width="100%" data-numposts="5"></div>
			</div>
			<!-- END LEFT CONTENT -->

			<!-- RIGHT CONTENT -->
			<div class="col-sm-4 right-content">
				<div style="padding: 25px 0">
					<!-- vnlaydy01 -->
					<ins class="adsbygoogle"
						 style="display:block"
						 data-ad-client="ca-pub-6448738734982132"
						 data-ad-slot="8095157000"
						 data-ad-format="auto"></ins>
					<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
				<div>
					<h5>Description</h5>
					<p>{{$item['description']}}</p>
				</div>
				<div>
					<h5>Category</h5>
					<p>
					@foreach($item->categories as $category)
						<a href="{{url('category/'.$category['slug'])}}">{{$category['category']}} </a>
					@endforeach
					</p>
				</div>
				@if($item->tags->count() > 0)
					<div>
						<h5>Tags</h5>
						<p>
						@foreach($item->tags as $tag)
							<a href="{{url('tag/'.$tag['slug'])}}">{{$tag['tag_name']}} </a>
						@endforeach
						</p>
					</div>
				@endif
				<div>
					<h5>Related Posts</h5>
					@if($count > 0)
						@foreach($items_relate as $item_relate)
						<div class="media">
						  	<div class="media-left">
						    	<a href="{{url('/item/'.$item_relate['slug'])}}">
						      		<img class="media-object" src="{{$item_relate['img_preview']}}" alt="{{$item_relate['title']}}" width="100">
						    	</a>
						  	</div>
						  	<div class="media-body">
							  	<a href="{{url('/item/'.$item_relate['slug'])}}">
							    	<h5 class="media-heading">{{$item_relate['title']}}</h5>
						    	</a>
						  	</div>
						</div>
						@endforeach
					@endif
				</div>
				<!-- END RIGHT CONTENT -->
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