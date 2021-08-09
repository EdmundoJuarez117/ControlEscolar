<?php

namespace App\Http\Controllers;
use App\Models\C_carrera;
use Illuminate\Http\Request;

class C_carreraController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware(['permission:admin.carrera.index'],['only'=>'index']);
        $this->middleware(['permission:admin.carrera.create'],['only'=>'create']);
        $this->middleware(['permission:admin.carrera.edit'],['only'=>['create','store']]);
        $this->middleware(['permission:admin.carrera.destroy'],['only'=>'destroy']);
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
        $this->seccionTitulo = 'Carreras';
        $resultSet = C_carrera::getForPagination($offset, $limit=10);
        $carreras = $resultSet['data'];
        $totalData = $resultSet['countData'];

        if($request->ajax())
        {
          return [
            'carreras' => $carreras,
            'totalData' => $totalData
          ];
        }
        $data = [
          'seccion_titulo' => $this->seccionTitulo,
          'carreras' => $carreras,
          'totalData' => $totalData
        ];

        return view('c_carrera.index',$data);


        //c_carreras = C_carrera::all();
        // return view('c_carrera.index')->with('c_carreras',$c_carreras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "create function";
        
        return view('c_carrera.create');
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
            'nombre' => 'required|unique:c_carreras,nombre',
            'nombre_corto' => 'required|unique:c_carreras,nombre_corto',
            'estatus' => 'required|unique:c_carreras,estatus',
            'fcreacion' => 'required|unique:c_carreras,fcreacion',
            'fmodificacion' => 'required|unique:c_carreras,fmodificacion',
            'idmodalidad' => 'required|unique:c_carreras,idmodalidad',

          ]);
    
          try {
            $carrera = new C_carrera;
            $carrera->nombre = $request->all()['nombre'];
            $carrera->nombre_corto = $request->all()['nombre_corto'];
            $carrera->estatus = $request->all()['estatus'];
            $carrera->fcreacion = $request->all()['fcreacion'];
            $carrera->fmodificacion = $request->all()['fmodificacion'];
            $carrera->idmodalidad = $request->all()['idmodalidad'];
            $result = $carrera->save();
    
            return response()->json([
              'result'=>$result,
              'message'=>'',
            ]);
          }catch(\Illuminate\Database\QueryException $exception){
            $errorCode = $exception->erroInfo[1];
            if($errorCode == 1062){
              //We have a duplicate entry problem
            }
            return response()->json([
              'result'=>FALSE,
              'message'=>$exception->getMessage(),
            ]);
          }

    //   $c_carreras = new C_carrera();

    //   $c_carreras->nombre = $request->get('nombre');
    //   $c_carreras->nombre_corto = $request->get('nombre_corto');
    //   $c_carreras->estatus = $request->get('estatus');
    //   $c_carreras->fcreacion = $request->get('fcreacion');
    //   $c_carreras->fmodificacion = $request->get('fmodificacion');
    //   $c_carreras->idmodalidad = $request->get('idmodalidad');

    //   $c_carreras->save();

    //   return redirect('/carrera');
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
        $c_carrera = C_carrera::find($id);
        return view('c_carrera.edit')->with('c_carrera',$c_carrera);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id ,C_carrera $carrer)
    {
        $result = TRUE;
        $message = "";
  
        try{
          $id = $request->all()['id'];
          $this->validate($request,[
            'nombre'=>'required|unique:c_carreras,nombre'.$id,
            'nombre_corto'=>'required|unique:c_carreras,nombre_corto'.$nombre_corto,
            'estatus'=>'required|unique:c_carreras,estatus'.$estatus,
            'fcreacion'=>'required|unique:c_carreras,fcreacion'.$fcreacion,
            'fmodificacion'=>'required|unique:c_carreras,fmodificacion'.$fmodificacion,
            'idmodalidad'=>'required|unique:c_carreras,idmodalidad'.$idmodalidad,
          ]);
          $result = $carrer -> update($request->all());
          $message = ($result)?"":"Reintente por favor";
  
        }catch (\Illuminate\Database\QueryException $exception){
          $result = FALSE;
          $message = $exception->getMessage();
        }
        return response()->json([
          'result'=>$result,
          "message" => $message
        ]);


    //     $c_carrera = C_carrera::find($id);

    //   $c_carrera->nombre = $request->get('nombre');
    //   $c_carrera->nombre_corto = $request->get('nombre_corto');
    //   $c_carrera->estatus = $request->get('estatus');
    //   $c_carrera->fcreacion = $request->get('fcreacion');
    //   $c_carrera->fmodificacion = $request->get('fmodificacion');
    //   $c_carrera->idmodalidad = $request->get('idmodalidad');

    //   $c_carrera->save();

    //   return redirect('/carrera');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c_carrera = C_carrera::find($id);

        $c_carrera->delete();
  
        return redirect('/carrera');
    }
}
