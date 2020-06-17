@extends('layout')

@section('title')
	create blogpost
@endsection

@section('content')
	<form action="{{ route('companies.update',['company' => $companies->id]) }}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')

		@include('company._form')
		<button type="submit" class="btn btn-primary btn-block">Update</button>
	</form>

@endsection





