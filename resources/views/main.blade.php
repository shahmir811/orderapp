<!DOCTYPE html>
<html>
    <head>
        
    @include('partials._head')

    @yield('head')

    </head>


    <body>

    
    
	    <div class="container">

	    	@include('partials._messages')

	        @yield('content')

	        
	        @include('partials._footer')

	        

        </div>

        @include('partials._javascripts')

        @yield('scripts')

    </body>

    @yield('scriptsoutside')
</html>
