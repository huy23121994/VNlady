<header>
	<nav class="navbar navbar-default">
	  	<div class="container">
	    	<div class="navbar-header">
	      		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span> 
			    </button>
	      		<a class="navbar-brand" href="{{url('/')}}" onclick="ga('send', {'hitType': 'event', 'eventCategory': 'Logo Click', 'eventAction': 'Click', 'eventLabel': 'Home logo'});">
	      			<img src="/img/logo-white.png" alt="logo-vnlady">
	      		</a>
	    	</div>
	    	<div class="collapse navbar-collapse" id="myNavbar">
		      	<ul class="nav navbar-nav">
		        	<li class=""><a href="{{url('/')}}" onclick="ga('send', {'hitType': 'event', 'eventCategory': 'Header Click', 'eventAction': 'Click', 'eventLabel': 'Home'});">Home</a></li>
		        	@foreach($categories as $category)
		        		<li category="{{$category['id']}}"><a href="{{url('category/'.$category['id'])}}" onclick="ga('send', {'hitType': 'event', 'eventCategory': 'Category Click', 'eventAction': 'Click', 'eventLabel': '{{$category['category']}}'});">{{$category['category']}}</a></li>		        		
		        	@endforeach
		      	</ul>
	    	</div>
	  	</div>
	</nav>
</header>