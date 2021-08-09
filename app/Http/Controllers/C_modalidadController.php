<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\C_modalidad;

class C_modalidadController extends Controller
{

  public function __construct(){
      $this->middleware('auth');
      $this->middleware(['permission:admin.modalidad.index'],['only'=>'index']);
      $this->middleware(['permission:admin.modalidad.create'],['only'=>'create']);
      $this->middleware(['permission:admin.modalidad.edit'],['only'=>['create','store']]);
      $this->middleware(['permission:admin.modalidad.destroy'],['only'=>'destroy']);
  }

  function cmp($a, $b){
    return strcmp($a->name, $b->name);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $offset=0)
    {
        $this->seccionTitulo = 'Modalidades';
        $resultSet = C_modalidad::getForPagination($offset, $limit=10);
        $modalidades = $resultSet['data'];
        $totalData = $resultSet['countData'];

        if($request->ajax())
        {
          return [
            'modalidades' => $modalidades,
            'totalData' => $totalData
          ];
        }
        $data = [
          'seccion_titulo' => $this->seccionTitulo,
          'modalidades' => $modalidades,
          'totalData' => $totalData
        ];

        return view('c_modalidad.index',$data);


        // $c_modalidads = C_modalidad::all();
        // return view('c_modalidad.index')->with('c_modalidads',$c_modalidads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "create function";
        // return view('c_modalidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this -> validate($request, [
        'nombre' => 'required|unique:c_modalidads,nombre',
      ]);

      try {
        $modalidad = new C_modalidad;
        $modalidad->nombre = $request->all()['nombre'];
        $result = $modalidad->save();

        return response()->json([
          'result'=>$result,
          'message'=>'',
        ]);
      } catch(\Illuminate\Database\QueryException $exception){
        $errorCode = $exception->errorInfo[1];
        if($errorCode == 1062){
          //We have a duplicate entry problem
        }
        return response()->json([
          'result'=>FALSE,
          'message'=>$exception->getMessage(),
        ]);
      }
      // $c_modalidads = new C_modalidad();

      // $c_modalidads->nombre = $request->get('nombre');
      // $c_modalidads->fcreacion = $request->get('fcreacion');
      // $c_modalidads->fmodificacion = $request->get('fmodificacion');

      // $c_modalidads->save();

      // return redirect('/modalidad');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(C_modalidad $C_modalidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(C_modalidad $C_modalidad)
    {
      // $c_modalidad = C_modalidad::find($id);
      // return view('c_modalidad.edit')->with('c_modalidad',$c_modalidad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, C_modalidad $modalidade)
    {
      $result = TRUE;
      $message = "";

      try{
        $id = $request->all()['id'];
        $this->validate($request, [
          'nombre'=>'required|unique:c_modalidads,nombre'.$id,
        ]);
        $result = $modalidade->update($request->all());
        $message = ($result)?"":"Reintente por favor";

      }catch (\Illuminate\Database\QueryException $exception){
        $result = FALSE;
        $message = $exception->getMessage();
      }
      return response()->json([
        'result'=>$result,
        "message" => $message
      ]);


      // $c_modalidad = C_modalidad::find($id);

      // $c_modalidad->nombre = $request->get('nombre');
      // $c_modalidad->fcreacion = $request->get('fcreacion');
      // $c_modalidad->fmodificacion = $request->get('fmodificacion');

      // $c_modalidad->save();

      // return redirect('/modalidad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(C_modalidad $C_modalidad)
    {
      // $c_modalidad = C_modalidad::find($id);

      // $c_modalidad->delete();

      // return redirect('/modalidad');
    }
}
