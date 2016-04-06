@extends('master')

@section('title','ADMIN - VN LADY')

@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/backend/dist/skins/skin-blue.min.css">
	@yield('backend-css')
	<link rel="stylesheet" href="/css/backend/dist/AdminLTE.min.css">
@endsection

@section('body-class','skin-blue sidebar-mini')

@section('main')
	<div class="wrapper">
		@include('backend.layouts.header')
		@include('backend.layouts.sidebar')

		@yield('backend-main')
		
		@include('backend.layouts.footer')
	</div>
@endsection

@section('js')
	@yield('backend-js')
	<script src="/js/backend/dist/app.min.js"></script>
@endsection