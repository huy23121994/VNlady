@extends('master')
@section('title','Title - VN LADY')
@section('css')
	<link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
@endsection
@section('main')
	@include('frontend.layouts.header')

	<section class="container">
		<div class="row">
			<div class="col-sm-8">
				<div>
					<h3>{{$item['title']}}</h3>
					<p>{{$item['created_at']}}</p>
				</div>
				<div class="h_iframe">
					<img class="ratio" src="http://placehold.it/16x9"/>
	        		<iframe src="{{$item['embed_link']}}" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-sm-4">
				<div>
					<p>Description</p>
					<p>{{$item['description']}}</p>
				</div>
				<div>
					<p>Category</p>
					@foreach($item->categories as $category)
						<a href="{{url('category/'.$category['id'])}}">{{$category['category']}} </a>
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