@extends('master')

@section('title','ADMIN - VN LADY')

@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="{{url('css/backend/dist/skins/skin-blue.min.css')}}">
	<!-- Select2  -->
	<link rel="stylesheet" href="{{url('css/backend/plugins/select2.min.css')}}">
	<!-- DataTables  -->
	<link rel="stylesheet" href="{{url('css/backend/plugins/datatables/dataTables.bootstrap.css')}}">
	<link rel="stylesheet" href="{{url('css/backend/dist/AdminLTE.min.css')}}">
@endsection

@section('body-class','skin-blue sidebar-mini')

@section('main')
	<div class="wrapper">
		@include('backend.layouts.header')
		@include('backend.layouts.sidebar')
		<div class="content-wrapper" style="min-height: 351px;">
			<!-- Content Header (Page header) -->
	        <section class="content-header">
	          	<h1>
		            Video management
		            <small>Embed from Youtube</small>
	          	</h1>
	        </section>

	        <!-- Main content -->
	        <section class="content">

	        	<div class="row">
	        		<div class="col-sm-12">
		        		<div class="nav-tabs-custom">
			                <ul class="nav nav-tabs">
			                  	<li class="active"><a href="#list" data-toggle="tab" aria-expanded="true">List items</a></li>
			                  	<li class=""><a href="#upload" data-toggle="tab" aria-expanded="false">Upload</a></li>
			                </ul>
			                <div class="tab-content">
			                  	<div class="tab-pane active" id="list">

			                  		@include('backend.list-item')

			                  	</div>
			                  	<div class="tab-pane" id="upload">

			                  		@include('backend.upload-item')

			                  	</div>
			                </div><!-- /.tab-content -->
		              	</div>
	        			
	        		</div>
	        	</div>

	        </section>
		</div>
		@include('backend.layouts.footer')
	</div>
@endsection

@section('js')
	<script src="{{url('js/backend/dist/app.min.js')}}"></script>
	<!-- Select2 -->
	<script src="{{url('js/backend/plugins/select2.full.min.js')}}"></script>
	<!-- DataTables  -->
	<script src="{{url('js/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{url('js/backend/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
	<script type="text/javascript">

		$('form#upload').on('submit',function(e) {
			e.preventDefault();

			// Disable button when ajax is loading
			$('button[type="submit"]').attr('disabled','disabled')
				.find('i.fa-refresh').removeClass('hidden')
				.siblings('i.fa-upload').addClass('hidden');

			$.ajax({
				type:'POST',
				url: $(this).attr('action'),
				data:  new FormData($(this)[0]),
				contentType: false,
				processData: false,
				cache: false,
			}).done(function(data){
				if (data=='success'){
					alert('Upload success!');
					$('form#upload')[0].reset();
					$('.select2').select2('val',0);
				}else{
					alert('Upload fail!');
					var errors =$.parseJSON(data);

					$('small.error').html('');	//reset error message

					function adderror(input,val){
						var input_selector = $('#'+ input );
						input_selector.siblings('label').find('small')
									.html(val)
									.css({'color':'#dd4b39','font-weight':'normal'});
					}

					$.each(errors, function(key,val){
						if (key == 'title') adderror('title',val);
						if (key == 'description') adderror('description',val);
						if (key == 'embed_link') adderror('embed_link',val);
						if (key == 'categories') adderror('categories',val);
						if (key == 'img') adderror('img',val);
					})
				}

				// Enable button when ajax stoped
				$('button[type="submit"]').removeAttr('disabled','disabled')
					.find('i.fa-refresh').addClass('hidden')
					.siblings('i.fa-upload').removeClass('hidden');
			}).fail(function(){
				alert('Error upload to server!');
			})
		})


	    $(document).ready(function () {

			//Initialize Select2 Elements
        	$(".select2").select2();

	    	//DataTable
	        $("#list-item").DataTable();
	    });
    
	</script>
@endsection