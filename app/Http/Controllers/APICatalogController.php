<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class APICatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( Movie::all() );
    }  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        return response()->json (['error'=>false, 'msg'=> 'La pelicula se ha creado en el videoclub']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json ( Movie::findOrFail($id) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $pelicula = Movie::findOrFail($id);

        $title = $request->'title';
        // $year = $request->input('year');
        // $director = $request->input('director');
        // $poster = $request->input('poster');
        // $synopsis = $request->input('synopsis');

         $pelicula->title = $title;
        // $pelicula->year = $year;
        // $pelicula->director = $director;
        // $pelicula->poster =$poster;
        // $pelicula->synopsis =$synopsis;
          $pelicula->save();

         return response()->json (['error'=>false, 'msg'=> 'La pelicula se ha modificado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $pelicula = Movie::findOrFail($id);
        $pelicula->delete();    
        $peliculas = Movie::all();
        return response()->json (['error'=>false, 'msg'=> 'La pelicula se ha borrado del videoclub']);
    }

    public function putRent(Request $request,$id){
        $pelicula = Movie::findOrFail($id);
        $pelicula->rented = 1;
        $pelicula->save();
        return response()->json (['error'=>false, 'msg'=> 'La pelicula se ha marcado como alquilada']);
        

    }

    public function putReturn(Request $request,$id){
        $pelicula = Movie::findOrFail($id);
        $pelicula->rented = 0;
        $pelicula->save();
        return response()->json (['error'=>false, 'msg'=> 'La pelicula se ha devuelto correctamente']);
       
    }
}
