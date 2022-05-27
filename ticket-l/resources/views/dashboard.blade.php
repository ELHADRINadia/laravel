@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
	
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"></div>

				<div class="flex flex-col panel-body">
				</br></br></br></br>
					<p class="text DE">Welcome 😁!!! </p>
</br></br></br>
					@if (Auth::user()->is_admin)
						<p class="text">
						 <button class="bg-button no-underline"><a  href="{{ url('admin/tickets') }}">tickets</a></button>
						</p>
						<p class="text">
							  <button class="bg-button border-2 no-underline"><a href="{{ url('/admin/add_category') }}">categories</a></button>
						<p class="text">
						 <button class="bg-button border-2 no-underline"><a  href="{{ url('/admin/users') }}">Utilisateurs</a></button>
						</p>
						</p>
					@else
						<p class="text"> 
						 <button class="bg-button border-2 no-underline"><a href="{{ url('my_tickets') }}">tickets</a></button> ou <button class="bg-button"><a href="{{ route('newticket') }}">nouveau ticket </a></button>
						</p>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	
	.bg-button{
		background-color :#79DAE8;
		border:4px;
		border-radius :6px;
		font-size:30px;
		color:black; 
		text-align: center; 
	    font-family: Arial, "Times New Roman", Verdana, serif; 
		                                                                                                                                                                                                              px;

		
	}
	.text{
		text-align: center; 
	   font-family: Arial, "Times New Roman", Verdana, serif; 
	   font-size:40px;
	   text-decoration: none;
	   margin-right: 200px;
	}
	.text .DE{
		font-size:40;	
	}

	</style>
@endsection