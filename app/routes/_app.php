<?php

app()->get("/", function () {
    response()->json(["message" => "Hola Raul Rojas de Asociados Bega"]);
});

app()->get("/superapi", function () {
    response()->json(["message" => "Hola soy una super api"]);
});

//consultas todos los registros con get
app()->get("/contactos",'ContactosController@index');
//consultas solo un registro con get
app()->get("/contactos/{id}",'ContactosController@consultar');
//consultas para agregar con post
app()->post("/contactos",'ContactosController@agregar');
//consultas para borrar con delete
app()->delete("/contactos/{id}",'ContactosController@borrar');
//consultas para actualizar con put
app()->put("/contactos/{id}",'ContactosController@actualizar');


app()->get("/app", function () {
    // app() returns $app
    response()->json(app()->routes());
});
