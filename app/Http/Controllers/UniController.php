<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Http\Requests\UniRequest;
class UniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();
        return view('lista', compact('cursos'));
    }
    public function inscribir()
    {
        return view('inscribir');
    }
    public function aviso2()
    {
        return view('aviso2');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function prueba()
    {
        return view('prueba');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UniRequest $request)
    {
        $slug=uniqid();
        $curso= new Curso(array(
        'nombre' =>$request->get('nombre'),
        'maestro'=>$request->get('maestro'),
        'slug'=>$slug

        ));
        $curso->save();

        return redirect('aviso2')->with('status', 'todo con éxito  ' . $slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso=Curso::whereid($id)->firstOrFail();

        return view('curso', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso=Curso::whereid($id)->firstOrFail();

        return view('edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UniRequest $request)
    {
        $curso = Curso::whereid($id)->firstOrFail();
      $curso->nombre = $request->get('nombre');
      $curso->maestro = $request->get('maestro');
      
     $curso->save();
     return redirect(action('UniController@edit', $curso->id))->with('status', 'Â¡El curso '.$id.' ha sido actualizado!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso=Curso::whereid($id)->firstOrFail();

        $curso->delete();

        return redirect('inscripcion')->with('status','El curso '.$id.' ha sido borrado');
    }
}
