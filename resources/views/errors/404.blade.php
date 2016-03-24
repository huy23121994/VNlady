@extends('master')
@section('title','404 - Page not found - VN LADY')
@section('css')
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
	<style type="text/css">
			body{
				height: 100vh
			}
            .container {
                text-align: center;
                vertical-align: middle;
                color: #94A0A7;
                height: calc(100% - 130px);
            }
            .content{
            	margin: auto;
			    display: flex;
			    height: 100%;
            }
            .title {
                font-size: 72px;
                font-weight: 100;
                font-family: 'Lato';
                margin: auto;
            }
	</style>
@endsection
@section('main')
		@include('frontend.layouts.header')
		<div class="container">
            <div class="content">
                <p class="title">Sorry, That page doesn't exist!</p>
            </div>
        </div>
@endsection

@section('js')
@endsection