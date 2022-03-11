<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartamentoRequest;
use App\Http\Requests\UpdateDepartamentoRequest;
use App\Models\Departamento;
use Illuminate\Support\Facades\Auth;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Departamento::all(); */
        return view('departamentos.departamentos',[
           'departamentos' => Departamento::paginate(2),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamento = new Departamento();
        return view('departamentos.formcreate',
        ['departamento' => $departamento]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDepartamentoRequest  $request
     * @return \Illuminate\Http\Response
     * Validamos la request con validated accediendo a la función rules de app/http/request/store...Request que es la encargada de validar.
     * Poner la authorizacion a true
     * En el modelo el fillable protected $fillable = ['denominacion', 'localidad'];
     */
    public function store(StoreDepartamentoRequest $request)
    {
        /* $validados = $this->validar(); */
        $validados = $request->validated();
        $departExistente = Departamento::get()->where('denominacion',$validados['denominacion'])->where('localidad',$validados['localidad']);
        //Compruebo que no existe un departamento igual
        if($departExistente->isEmpty()){
            //Le paso el array validado.
            //Para pasarle un array con varios datos antes hay que crear el fillable en el modelo
        $nuevoDepart = new Departamento($validados);
        $nuevoDepart->save();
        return redirect('/departamentos')->with('succes','Departamento creado');
        }else {
            return redirect('/departamentos')->with('fault','Departamento no creado');
        }
        /* $departExistente = Depart::all()->where('localidad',$validados['localidad'])->where('denominacion',$validados['denominacion'])->first();

        if ($departExistente != null) { */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamento $departamento)
    {
        //Si no está logado, abortar.
        /* if (!Auth::check()) { abort(403);}; */
        return view('departamentos.formedit',[
            'departamento' => $departamento,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepartamentoRequest  $request
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     *poner a true el authorice de \App\Http\Requests\UpdateDepartamentoRequest y poner en rule la validacion y el fillable en el modelo.
     */
    public function update(UpdateDepartamentoRequest $request,Departamento $departamento)
    {
        //Recogo el id del departamento para comprobar que si existe y cambio las propiedades de ese objeto
        Departamento::findOrfail($departamento->id);
       $validados = $request->validated();
        $departamento->localidad = $validados['localidad'];
        $departamento->denominacion = $validados['denominacion'];
        $departamento->save();
        return redirect('/departamentos')->with('succes','Departamento actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {
          /* ***** ojo borrar también los campos de las otras tablas que hacen refenrencia al compo borrado las foreing key******* */
        //Si no está logado, abortar.
        /* if (!Auth::check()) { abort(403);}; */
        $departamento->delete();
        return redirect('/departamentos')->with('succes','Departamento borrado con exito');;
    }

  /*   private function validar()
    {
        $validados = request()->validate([
            'denominacion' => 'required|max:255',
            'localidad' => 'required|max:255',
        ]);

        return $validados;
    } */
}
 /*  $vuelo = DB::table('vuelos', 'v')
        ->join('aeropuertos AS a', 'origen_id', '=', 'a.id')
        ->join('aeropuertos AS ae', 'destino_id', '=', 'ae.id')
        ->join('companias AS c', 'compania_id', '=', 'c.id')
        ->select('v.*', 'a.denominacion as origen', 'ae.denominacion as destino', 'c.denominacion as compania' )->paginate(1); */

      /*   $res = DB::select('select c.ce, max(notas.nota) nota from ccee c join notas on (c.id = notas.ccee_id) where notas.alumno_id = ? group by c.ce;
        ', [$alumno->id]);
        return view('alumnos.alumnoscriterios',['res' => $res]);
        Se convierte en un objeto stclass recorrerlo con foreach y acceder {{$res->nota}} */

       /* EL isempty solo se usa con get no con first con el first utilizamos el null
        $citaUsuario = DB::table('citas')->where('id_usuario',session('usuario'))->get();
        if($citaUsuario->isEmpty() ){
            return redirect('/citas/index')->with('fault','No tienes citas reservadas'); */
            /* gettype para saber el tipo */

        /* $alumnos = DB::table('v_alumnos')
        ->select('id', 'nombre', DB::raw('ROUND(AVG(nota), 1) AS nota'))
        ->groupBy('id', 'nombre'); */

        /* (new DateTime($emple->fecha_alt))->setTimeZone(new DateTimeZone('Europe/Madrid'))->format('d-m-Y H:i:s')
        number_format($emple->salario, 2, ',', ' ') . ' €'

           session(['usuario' => $validados['email']]);
           //Pregunta si existe la variable de sesión y la borra
        if(request()->session()->has('usuario')){
            request()->session()->forget('usuario');
            return redirect('/depart/index')->with('succes', 'Sesión cerrada');
        }
        //Devuelve las citas donde la fecha y hora es posterior > a la fecha de hoy
        $citas = Cita::where('fecha_hora', '>', now())

           $id = Auth::id();
            if((Auth::user()->citas)->isEmpty()){

        abort_unless($cita->especialista->companias->contains($compania), 404);
        use App\Models\{Alumno,Depart}; para usar los modelos en tinker
        return redirect()->route('albumes.index');

         DB::table('notas')->where('alumno_id',$alumno->id)->delete();
        */
