<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Notification;

class CatalogController extends Controller{

	public function getIndex(){
		// Notification::success('Success message');
		// Notification::error('Error message');
		// Notification::info('Info message');
		// Notification::warning('Warning message');
		$peliculas = Movie::all();

    	return view('catalog.index')->with('peliculas',$peliculas);
	}

    public function getShow($id){
    	$peliculas = Movie::findOrFail($id);
    	return view('catalog.show')->with('peliculas',$peliculas);
	}

	public function getEdit($id){
		$peliculas = Movie::findOrFail($id);
    	return view('catalog.edit')->with('peliculas',$peliculas);
	}
	public function getCreate(){
    	return view('catalog.create');
	}

	public function putEdit(Request $request, $id){
		$pelicula = Movie::findOrFail($id);

		$title = $request->input('title');
		$year = $request->input('year');
		$director = $request->input('director');
		$poster = $request->input('poster');
		$synopsis = $request->input('synopsis');

		$pelicula->title = $title;
		$pelicula->year = $year;
		$pelicula->director = $director;
		$pelicula->poster =$poster;
		$pelicula->synopsis =$synopsis;
		$pelicula->save();
		
		Notification::success('La película '.$pelicula->title.' se ha modificado correctamente');
		return redirect()->action('CatalogController@getShow',[$pelicula->id]);
		// return view('catalog.show')->with('peliculas',$pelicula);

	}
	
	public function postCreate(Request $request){

		$pelicula = new Movie;
		// rellenamos variables con lo que nos llega del formulario
		$title = $request->input('title');
		$year = $request->input('year');
		$director = $request->input('director');
		$poster = $request->input('poster');
		$synopsis = $request->input('synopsis');

			// asociamos las variables definidas arriba
			$pelicula->title = $title;
			$pelicula->year = $year;
			$pelicula->director = $director;
			$pelicula->poster =$poster;
			$pelicula->synopsis =$synopsis;

		$pelicula->save();
		Notification::success('La película '.$pelicula->title.' se ha creado correctamente');
		$peliculas = Movie::all();
		return redirect()->action('CatalogController@getIndex');
		// return view('catalog.index')->with('peliculas', $peliculas);

	}

	public function putRent(Request $request,$id){
		$pelicula = Movie::findOrFail($id);
		$pelicula->rented = 1;
		$pelicula->save();
		Notification::success('La película '.$pelicula->title.' se ha alquilado correctamente');
		return redirect()->action('CatalogController@getShow',[$pelicula->id]);
		// return view('catalog.show')->with('peliculas',$pelicula);

	}

	public function putReturn(Request $request,$id){
		$pelicula = Movie::findOrFail($id);
		$pelicula->rented = 0;
		$pelicula->save();
		Notification::success('La película '.$pelicula->title.' se ha devuelto correctamente');
		return redirect()->action('CatalogController@getShow',[$pelicula->id]);
		// return view('catalog.show')->with('peliculas',$pelicula);
	}

	public function deleteMovie(Request $request,$id){
		$pelicula = Movie::findOrFail($id);
		$pelicula->delete();	
		$peliculas = Movie::all();
		Notification::success("La pelicula ".$pelicula->title." se ha borrado correctamente");
		return redirect()->action('CatalogController@getIndex');	
	}

}
