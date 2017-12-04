
		@extends('layouts.app')
		@section('content')

		@if (Auth::guest())

		@include('partials.errorlogin')

		@else

		<div class="container">
			<div class="row">
    			<div class="col-sm-4">
        			<img src="{{$peliculas->poster}}" class="pull-right" />
    			</div>
    			<div class="col-sm-8">
        			<h1>{{$peliculas->title}}</h1>
        			<h4>Año: {{$peliculas->year}}</h4>
        			<h4>Director: {{$peliculas->director}}</h4>
        			<p><b>Resumen: </b>{{$peliculas->synopsis}}</p>
        			@if ($peliculas->rented==1)
        				<p><b>Estado: </b>Película actualmente alquilada</p>
	
<form action="{{action('CatalogController@putReturn', $peliculas->id)}}" 
    method="POST" style="display:inline">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <button type="submit" class="btn btn-danger" style="display:inline">
        Devolver película
    </button>
</form>

					@else
						<p><b>Estado: </b>Película disponible</p>


<form action="{{action('CatalogController@putRent', $peliculas->id)}}" 
    method="POST" style="display:inline">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <button type="submit" class="btn btn-default" style="display:inline">
        Alquilar película
    </button>
</form>



					@endif	
					<a class="btn btn-warning" href="{{url('/catalog/edit/'.$peliculas->id) }}"><span class="glyphicon glyphicon glyphicon-pencil"></span> Editar película</a>


<form action="{{action('CatalogController@deleteMovie', $peliculas->id)}}" 
    method="POST" style="display:inline">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button type="submit" class="btn btn-danger" style="display:inline"><span class="glyphicon glyphicon glyphicon-remove"></span>
        Borrar Pelicula
    </button>
</form>


					
					<a class="btn btn-default" href="{{url('/catalog')}}"><span class="glyphicon glyphicon-chevron-left"></span>Volver al listado</a>
    			</div>
			</div>

			@endif
		</div>
		@stop
	