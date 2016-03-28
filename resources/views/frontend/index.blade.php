@extends('master')
@if(isset($category))
	@section('title',$category['category'].'- VNLady')
@else
	@section('title','VNLady')
@endif
@section('css')
	<link rel="stylesheet" type="text/css" href="/css/style.css">
@endsection
@section('main')
	@include('frontend.layouts.header')

	@include('frontend.list-item')
	
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