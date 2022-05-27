@extends('layouts.app')

@section('title', 'All Tickets')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
				</div>

				<div class="panel-body">
					@if ($tickets->isEmpty())
						<p>There are currently no tickets.</p>
					@else
						<table class="table bg-gray-700">
							@include('includes.flash')
							
							<thead>
								<tr>
									<th class="text-white">Category</th>
									<th class="text-white">Title</th>
									<th class="text-white">Status</th>
									<th class="text-white">Last Updated</th>
									<th class="text-white" style="text-align:center" colspan="2">Actions</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($tickets as $ticket)
								<tr>
									<td class="text-white">
									@foreach ($categories as $category)
										@if ($category->id === $ticket->category_id)
											{{ $category->name }}
										@endif
									@endforeach
									</td>
									<td class="text-white">
										<a href="{{ url('tickets/'. $ticket->ticket_id) }}">
											#{{ $ticket->ticket_id }} - {{ $ticket->title }}
										</a>
									</td>
									<td class="text-white">
									@if ($ticket->is_resolved === 'Open')
										<span class="label label-success text-white">{{ $ticket->is_resolved }}</span>
									@else
										<span class="label label-danger text-white">{{ $ticket->is_resolved }}</span>
									@endif
									</td>
									<td class="text-white">{{ $ticket->updated_at }}</td>
									<td>
										<a href="{{ url('tickets/' . $ticket->ticket_id) }}" class="btn btn-primary">Comment</a>
									</td>
									<td class="text-white">
										<form action="{{ url('admin/close_ticket/' . $ticket->ticket_id) }}" method="POST">
											{!! csrf_field() !!}
											<button type="submit" class="btn btn-danger">Fermer</button>
										</form>
                                </br>
										<form action="{{ url('admin/open_ticket/' . $ticket->ticket_id) }}" method="POST">
											{!! csrf_field() !!}
											<button type="submit" class="btn btn-success">Ouvrir</button>
										</form>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>

						{{ $tickets->render() }}
					@endif
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.tailwindcss.com"></script>
@endsection