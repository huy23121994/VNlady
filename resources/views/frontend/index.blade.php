@extends('master')
@if(isset($category))
	@section('title',$category['category'].'- VNLady')
@else
	@section('title','VNLady')
@endif
@section('meta')
	<meta property="og:image" content="{{url('/img/1457710294.png')}}" />
@endsection
@section('css')
	<link rel="stylesheet" type="text/css" href="/css/style.css">
@endsection
@section('main')
	@include('frontend.layouts.header')
	
	<!-- Google Adsense -->
	<div class="container" style="margin-bottom: 15px;">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
	<!-- End Google Adsense -->
	
	@include('frontend.list-item')
	
	<!-- Google Adsense -->
	<div class="container" style="margin-bottom: 15px;width: 336px; height: 280px;">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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

	<div class="container" style="margin-bottom: 15px;">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
	<!-- End Google Adsense -->
	
	@include('frontend.layouts.footer')
@endsection

@section('js')
	<script type="text/javascript" src="/js/masonry.pkgd.min.js"></script>
	<script type="text/javascript" src="/js/imagesloaded.pkgd.min.js"></script>
	<script type="text/javascript">
		$('section').imagesLoaded( function() {
		  	$('.grid').masonry({
			  	itemSelector: '.grid-item',
			  	percentPosition: true
			})
		});
		@if (isset($category))
			var category_id = {{ $category['id'] }};
			$('header .nav li[category='+category_id+']').addClass('active');
		@else
			$('header .nav li').first().addClass('active');
		@endif

	</script>
@endsection