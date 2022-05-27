@extends('layouts.app')

@section('title', 'My Tickets')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-ticket">Mes Tickets</i>
				</div>
				<div class="panel-body">
					@if ($tickets->isEmpty())
						<p>Vous n’avez créé aucun ticket.</p>
					@else
						<table class="table bg-gray-700">
							<thead>
								<tr>
									<th>Category</th>
									<th>Title</th>
									<th>Status</th>
									<th>Dernière mise à jour</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($tickets as $ticket)
								<tr>
									<td>
									@foreach ($categories as $category)
										@if ($category->id === $ticket->category_id)
											{{ $category->name }}
										@endif
									@endforeach
									</td>
									<td>
										<a href="{{ url('tickets/'. $ticket->ticket_id) }}">
											#{{ $ticket->ticket_id }} - {{ $ticket->title }}
										</a>
									</td>
									<td>
									@if ($ticket->status === 'Open')
										<span class="label label-success">{{ $ticket->is_resolved }}</span>
									@else
										<span class="label label-danger">{{ $ticket->is_resolved }}</span>
									@endif
									</td>
									<td>{{ $ticket->updated_at }}</td>
								</tr>
							@endforeach
							</tbody>
						</table>

						{{ $tickets->render() }} <!-- Pagination -->
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection