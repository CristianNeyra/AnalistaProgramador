<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Endpoint extends CI_Model {

    public $title;
    public $content;
    public $date;

    public function usuarios_get(){
        //utilizar este direccionamiento en ambiente de produccion
        $apiurl ="https://".$_SERVER['SERVER_NAME']."/api/usuarios";

        //obtiene todos los usuarios consumiendo la api asociada a la URL
        //$apiurl ="http://localhost/rest/api/usuarios";
        $responsejson = file_get_contents($apiurl);
        $rs= json_decode($responsejson, true);
        return $rs;
    }

    public function nuevousuario($datos){
        //utilizar este direccionamiento en ambiente de produccion
        $apiurl ="https://".$_SERVER['SERVER_NAME']."/api/usuarios:";
        
        //obtiene todos los usuarios consumiendo la api asociada a la URL
        //$apiurl ="http://localhost/rest/api/usuarios:";
        //$responsejson = file_get_contents($apiurl);
        
        $curl = curl_init($apiurl);
        //$data=[
        //    'nombre'=>$datos['nombre'],
        //    'email'=>$datos['email'],
        //    'genero'=>$datos['genero'],
        //    'activo'=>$datos['activo']
        //];
        curl_setopt($curl, CURLOPT_POSTFIELDS, $datos);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        //$responsejson = file_get_contents($apiurl);
        //$rs= json_decode($responsejson, true);
        curl_close($curl);
        //*/
        return $result;
    }

    
    
}