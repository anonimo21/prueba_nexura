<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Empleado;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        // $empleados = DB::table('empleados')
        //     ->select('nombre', 'email', 'sexo', 'boletin', 'descripcion', 'area_id')
        //     ->where('nombre','LIKE','%'.$texto.'%')
        //     ->paginate(5);

        $areas = Area::all();
        $roles = Rol::all();
        $empleados = Empleado::with('area')->where('nombre','LIKE','%'.$texto.'%')->paginate(5);
        //dd($empleados);
        return view('empleados', ['empleados' => $empleados, 'texto' => $texto, 'areas' => $areas, 'roles' => $roles]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'sexo' => 'required',
            'area_id' => 'required',
            'descripcion' => 'required',
        ]);
        $empleado = Empleado::create($request->all());
        $empleado->roles()->attach($request->rol_id);
        return redirect()->route('empleados.index')->with('info', 'Empleado creado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::with('roles')->where('id', $id)->first();
        // dd($empleado);
        $areas = Area::all();
        $roles = Rol::all();
        return view('empleados-edit', ['empleado' => $empleado, 'areas' => $areas, 'roles' => $roles]);
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
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'sexo' => 'required',
            'area_id' => 'required',
            'descripcion' => 'required',
        ]);
        $empleado = Empleado::findOrFail($id);
        $empleado->nombre = $request->nombre;
        $empleado->email = $request->email;
        $empleado->sexo = $request->sexo;
        $empleado->area_id = $request->area_id;
        if ($request->boletin) {
            $empleado->boletin = $request->boletin;
        } else {
            $empleado->boletin = 0;
        }
        $empleado->descripcion = $request->descripcion;
        $empleado->save();
        $empleado->roles()->sync($request->rol_id);
        return redirect()->route('empleados.index')->with('info', 'Empleado actualizado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        //$empleado->roles()->sync($request->rol_id);
        return redirect()->route('empleados.index')->with('info', 'Empleado eliminado con exito!');
    }
}
