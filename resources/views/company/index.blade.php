@extends('layout')

@section('title')
	company title
@endsection



@section('content')

    @if (count($company) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
            Companies
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Logo</th>
                        <th>Website</th>
                        <th>Action</th>
                       
                    </thead>

                   
                    <tbody>
                        @forelse ($company as $companies)

                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $companies->id }}</div>
                                </td>

                                <td class="table-text">
                                    <div>{{ $companies->name }}</div>
                                </td>

                                <td class="table-text">
                                    <div>{{ $companies->email }}</div>
                                </td>






                                <td class="table-text">
                                    <!-- <div>{{ $companies->logo }}</div> -->


    <!-- <a href='{{ asset("images/$companies->logo") }}'>{{ $companies->logo }}</a> -->

<img src='{{ asset("images/$companies->logo") }}' alt='No image' width="80" height="60">


                                </td>







                                 <td class="table-text">
                                    <div>{{ $companies->website }}</div>
                                </td>
                                <td>
                                	<a href="{{ route('companies.edit', ['company' =>$companies->id]) }}" class="btn btn-primary">E</a>|

                                	<form   action="{{ route('companies.destroy', ['id' =>$companies->id])}}" method="POST">
                               	@csrf
                               	@method('DELETE')

			<input type="submit" name="" value="D" class="btn btn-primary">
		</form>



                                </td>

                            </tr>

                        @empty
                        	<p>No blog posts yet!</p>

                        @endforelse
                    </tbody>
                </table>
                {!! $company->links() !!}
            </div>
        </div>
    @endif
@endsection
