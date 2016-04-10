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
		        	<li category="1"><a href="{{url('category/1')}}" onclick="ga('send', {'hitType': 'event', 'eventCategory': 'Category Click', 'eventAction': 'Click', 'eventLabel': 'Fashion'});">Fashion</a></li>
		        	<li category="2"><a href="{{url('category/2')}}" onclick="ga('send', {'hitType': 'event', 'eventCategory': 'Category Click', 'eventAction': 'Click', 'eventLabel': 'Makeup'});">Makeup</a></li> 
		        	<li category="3"><a href="{{url('category/3')}}" onclick="ga('send', {'hitType': 'event', 'eventCategory': 'Category Click', 'eventAction': 'Click', 'eventLabel': 'DIY'});">DIY</a></li> 
		        	<li category="4"><a href="{{url('category/4')}}" onclick="ga('send', {'hitType': 'event', 'eventCategory': 'Category Click', 'eventAction': 'Click', 'eventLabel': 'Hairstyles'});">Hairstyles</a></li> 
		        	<li category="5"><a href="{{url('category/5')}}" onclick="ga('send', {'hitType': 'event', 'eventCategory': 'Category Click', 'eventAction': 'Click', 'eventLabel': 'Nails'});">Nails</a></li> 
		        	<li category="6"><a href="{{url('category/6')}}" onclick="ga('send', {'hitType': 'event', 'eventCategory': 'Category Click', 'eventAction': 'Click', 'eventLabel': 'Cooking'});">Cooking</a></li> 
		        	<li category="7"><a href="{{url('category/7')}}" onclick="ga('send', {'hitType': 'event', 'eventCategory': 'Category Click', 'eventAction': 'Click', 'eventLabel': 'Health'});">Health</a></li> 
		      	</ul>
	    	</div>
	  	</div>
	</nav>
</header>