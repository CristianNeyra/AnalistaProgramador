<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Controler extends CI_Controller {

	
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('index');
		$this->load->view('templates/footer');
	}

    public function usuarios()
    {
        //solicita lainformacion de models/Endpoint.php
        $request = $this->Endpoint->usuarios_get();
        
        $this->load->view('templates/header');
		$this->load->view('usuarios', $request);
		$this->load->view('templates/footer');
    }

	public function nuevousuario(){
		$this->load->view('templates/header');
		$this->load->view('nuevo');
		$this->load->view('templates/footer');
	}

	public function nuevo(){
		
		//$jsonData = json_encode($arreglo);
		$rs = $this->Endpoint->nuevousuario($_POST);
		echo $rs;
		
		
	}


}