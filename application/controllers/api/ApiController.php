<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';


class ApiController extends RestController{
    public function index_get(){
        //Funcion utilizada solo para conceptos de prueba
        
        // Users from a data store e.g. database
        $users = [
            ['id' => 0, 'name' => 'John', 'email' => 'john@example.com'],
            ['id' => 1, 'name' => 'Jim', 'email' => 'jim@example.com'],
        ];

        $id = $this->get( 'id' );

        if ( $id === null )
        {
            // Check if the users data store contains users
            if ( $users )
            {
                // Set the response and exit
                $this->response( $users, 200 );
            }
            else
            {
                // Set the response and exit
                $this->response( [
                    'status' => false,
                    'message' => 'No users were found'
                ], 404 );
            }
        }
        else
        {
            if ( array_key_exists( $id, $users ) )
            {
                $this->response( $users[$id], 200 );
            }
            else
            {
                $this->response( [
                    'status' => false,
                    'message' => 'No such user found'
                ], 404 );
            }
        }
    }

    public function usuarios_get(){
        //obtiene todos los usuarios consumiendo la api asociada a la URL
        $apiurl ="https://gorest.co.in/public/v2/users";
        $requestjson = file_get_contents($apiurl);
        $rs= json_decode($requestjson, true);
        $largo = count($rs);
        //Se formatean los datos para coincidir con la estructura solicitada
        for($i=0; $i<$largo; $i++){
            $response[$i]["id"]=$rs[$i]["id"];
            $response[$i]["nombre"]=$rs[$i]["name"];
            $response[$i]["email"]=$rs[$i]["email"];
            $response[$i]["genero"]=$rs[$i]["gender"];
            if ($rs[$i]["status"]=="active"){
                $response[$i]["activo"]="true";
            }else{
                $response[$i]["activo"]="false";
            }
        }
        
        if(empty($_GET)){
            //Endpoint /usuarios
            //si el endpoint no contiene parametros de consulta, retorna todos los usuarios
            if (isset($requestjson)){
                // Setea el response y finaliza
                $this->response( $response, 200 );
                die();
            }else{
                $this->response( [
                    'status' => false,
                    'message' => 'Recurso no encontrado'
                ], 404 );
                die();
            }
        }else{

            //Endpoint /usuarios?nomre=""
            //Valida si existe el parametro de consulta adecuado en el endpoint
            if(isset($_GET['nombre'])){
                $nombre=$_GET['nombre'];
                for($i=0; $i<$largo; $i++){
                    if ($response[$i]["nombre"]==$nombre){
                        $usuario[0]["id"]=$response[$i]["id"];
                        $usuario[0]["nombre"]=$response[$i]["nombre"];
                        $usuario[0]["email"]=$response[$i]["email"];
                        $usuario[0]["genero"]=$response[$i]["genero"];
                        $usuario[0]["activo"]=$response[$i]["activo"];

                        // Setea el response y finaliza
                        $this->response( $usuario, 200 );
                        die();
                    }
                }

                $this->response( [
                    'status' => false,
                    'message' => 'Recurso no encontrado'
                ], 404 );
                die();

            }

            //Endpoint /usuarios?email=""
            //Valida si existe el parametro de consulta adecuado en el endpoint
            if(isset($_GET['email'])){
                $mailusuario=$_GET['email'];
                for($i=0; $i<$largo; $i++){
                    if ($response[$i]["email"]==$mailusuario){
                        $email[0]["id"]=$response[$i]["id"];
                        $email[0]["nombre"]=$response[$i]["nombre"];
                        $email[0]["email"]=$response[$i]["email"];
                        $email[0]["genero"]=$response[$i]["genero"];
                        $email[0]["activo"]=$response[$i]["activo"];

                        // Setea el response y finaliza
                        $this->response( $email, 200 );
                        die();
                    }
                }

                $this->response( [
                    'status' => false,
                    'message' => 'Recurso no encontrado'
                ], 404 );
                die();
            }

            //Endpoint /usuaruis?activos=true/false
            //Valida si existe el parametro de consulta adecuado en el endpoint
            if(isset($_GET['activos'])){
                $activos=$_GET['activos'];
                if($activos=="true" || $activos=="false"){
                    
                    $nuevoindex=0;
                    $limite=$largo-1;
                    for($i=0; $i<$largo;$i++){
                        if ($response[$i]["activo"]==$activos){
                            $usuarios[$nuevoindex]["id"]=$response[$i]["id"];
                            $usuarios[$nuevoindex]["nombre"]=$response[$i]["nombre"];
                            $usuarios[$nuevoindex]["email"]=$response[$i]["email"];
                            $usuarios[$nuevoindex]["genero"]=$response[$i]["genero"];
                            $usuarios[$nuevoindex]["activo"]=$response[$i]["activo"];
                            $nuevoindex++;
                        }
                        if($i==$limite){
                            // Setea el response y finaliza
                            $this->response( $usuarios, 200 );
                            die();
                        }
                    }
                }else{
                    $this->response( [
                        'status' => false,
                        'message' => 'Validacion de datos incorrecta.'
                    ], 422);
                    die();
                }
            }
   
        }
          
    }
}

?>