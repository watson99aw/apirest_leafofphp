<?php 
namespace App\Controllers;
use App\Models\Contactos;

class ContactosController extends Controller {
    //con esto accedo a los registro de la tabla de la base de datos 
    public function index(){
        $datosEmpleados=Contactos::all();
        response()->json($datosEmpleados);
    }


    //con esto accedes a un registro en especifico para obtener sus valores
    public function consultar($id){
        $datosEmpleados=Contactos::find($id);
        response()->json($datosEmpleados);
    }
    
    
    //con creas un registro
    public function agregar(){
        $contacto= new Contactos;
        $contacto->nombre=app()->request()->get('nombre');
        $contacto->primerapellido=app()->request()->get('primerapellido');
        $contacto->segundoapellido=app()->request()->get('segundoapellido');
        $contacto->correo=app()->request()->get('correo');
        $contacto->save();
        response()->json(["message" => "Se ha registrado correctamente"]);
    }


    //con esto eliminas un registro
    public function borrar($id){
        Contactos::destroy($id);
        response()->json(["message" => "El registro se ha borrado ".$id]);
    }


    //con esto actualizas el registro
    public function actualizar($id){
        $nombre=app()->request()->get('nombre');
        $primerapellido=app()->request()->get('primerapellido');
        $segundoapellido=app()->request()->get('segundoapellido');
        $correo=app()->request()->get('correo');

        $contacto=Contactos::findOrFail($id);

        $contacto->nombre=($nombre!="")?$nombre:$contacto->nombre;
        $contacto->primerapellido=($primerapellido!="")?$primerapellido:$contacto->primerapellido;
        $contacto->segundoapellido=($segundoapellido!="")?$segundoapellido:$contacto->segundoapellido;
        $contacto->correo=($correo!="")?$correo:$contacto->correo;
        $contacto->update();

        response()->json(["message" => "El registro se ha actualizado ".$id]);
    }
}
?>