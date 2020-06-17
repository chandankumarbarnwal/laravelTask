<div class="form-group">
	<p>
		<label>Name</label>
		<input type="text" name="name" class="form-control" value="{{ old('name', $companies->name ?? null) }}">
	</p>
</div>

<div class="form-group">
	<p>
		<label>Email</label>
		<input type="text" name="email" class="form-control"   value="{{ old('email', $companies->email ?? null) }}">
	</p>
</div>

<div class="form-group">
	<p>
		<label>Logo</label>
		<input type="file" name="logo" class="form-control" >
	</p>
</div>

<div class="form-group">
	<p>
		<label>Website</label>
		<input type="text" name="website" class="form-control"   value="{{ old('website', $companies->website ?? null) }}">
	</p>
</div>



	@if($errors->any())
		<div>
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	@endif