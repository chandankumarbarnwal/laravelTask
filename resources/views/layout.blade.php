<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

<link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">

</head>
<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Company</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="{{ route('companies.index') }}">Companies</a>
        <a class="p-2 text-dark" href="{{ route('companies.create') }}">Add Company</a>

         @guest
          
            <a class="p-2 text-dark" href="{{ route('login') }}">Login</a>

        @else

            <a class="p-2 text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout ({{Auth::user()->name }})</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf       
            </form>

        @endguest


    </nav>
</div>

<div class="container" >

		@if(session()->has('status'))
			<p style="color:green">
				{{session()->get('status')}}
			</p>
		@endif

		@yield('content')
</div>

	<script type="text/javascript" src="{{  mix('js/app.js') }}"></script>

</body>
</html>
