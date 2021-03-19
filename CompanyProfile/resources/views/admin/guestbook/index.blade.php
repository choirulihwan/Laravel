@extends('layouts.app')

@section('content')

	<div class="card">
		<div class="card-header">Categories</div>
		<div class="card-body">			
			<table class="table table-hover">				
				<thead class="thead-dark">
					<tr>
						<th>Name</th>						
                        <th>Email</th>						
                        <th>Message</th>						
					</tr>
				</thead>
				<tbody>
					@if($guestbooks->count() > 0)
						@foreach($guestbooks as $guestbook)
						<tr>
							<td>{{ $guestbook->name }}</td>	
                            <td>{{ $guestbook->email }}</td>	
                            <td>{{ $guestbook->message }}</td>							
						</tr>
						@endforeach
					@else
						<tr>
							<td class="text-center">No guestbook yet</td>
						</tr>
					@endif
				</tbody>

			</table>
		</div>
	</div>

@stop