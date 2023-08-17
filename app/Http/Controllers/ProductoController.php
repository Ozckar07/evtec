<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;


/*Tarea 2: CRUD de Productos
Crea un controlador llamado "ProductoController" para manejar las operaciones CRUD a través de una API los métodos*/

class ProductoController extends Controller
{

    ///////////Mostrar una lista de productos. /////////////
    public function productos(Request $request)
    {
        $productos = Producto::all();
        return response()->json($productos);
    }

    //////////// Mostrar el detalle de un producto específico. ////////////
    public function show($id)
    {
        $producto = Producto::find($id);
        return response()->json($producto);
    }

    //////////// Crear un nuevo producto. /////////////
    public function store(Request $request)
    {

        //Utiliza validación de datos en las solicitudes de creación y actualización de productos en la API. (Nombre y precio son obligatorios)
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
        ]);

        $producto = new Producto([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
        ]);

        $producto->save();
        return response()->json($producto, 201);
    }


    ////////////////////Actualizar la información de un producto existente./////////////////
    public function update(Request $request)
    {
        //Utiliza validación de datos en las solicitudes de creación y actualización de productos en la API. (Nombre y precio son obligatorios)
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
        ]);
        $id = $request->id;
        $producto = Producto::find($id);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->save();
        return response()->json($producto);
    }
    //////////////////////// Eliminar un producto. ////////////////////////////////
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return response()->json(null, 204);
    }
}
