@extends('layout')

@section('title')
	create blogpost
@endsection

@section('content')
	<form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
		
		@include('company._form')

		<button type="submit" class="btn btn-primary btn-block">Create</button>
	</form>

@endsection





