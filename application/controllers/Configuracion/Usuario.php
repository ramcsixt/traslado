<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(0);
class Usuario extends CI_Controller
{

	public function Index()
	{
		$this->load->view('Configuracion/Usuario/Index');
	}

	//Carga la lista de usuarios a la interface principal
	public function List_view()
	{
		$this->load->model(array(
			'General/Usuario_model'
		));
		$dato=array(
			'list_usuario'=>$this->Usuario_model->list_view()
		);
		$this->load->view("Configuracion/Usuario/List_view",$dato);
	}

	public function Create()
	{
		$this->load->model(array(
			'General/Modulo_model',
			'General/Sexo_model'
		));

		$dato=array(
			'modulo'=>$this->Modulo_model->list_view(),
			'sexo'=>$this->Sexo_model->list_view()
		);

		$this->load->view("Configuracion/Usuario/Create",$dato);
	}

	public function Store()
	{
		$this->load->model(array(
			'General/Usuario_model',
			'General/Rol_model'
		));

		$usuario=array(
			'nombre'=>$_POST["nombre"],
			'apellido'=>$_POST["apellido"],
			'password'=>$_POST["pwd"],
			'idestado'=>1,
			'f_nacimiento'=>$_POST["f_nacimiento"],
			'correo'=>$_POST["correo"],
			'idsexo'=>$_POST["sexo"]
		);
		$idusuario=$this->Usuario_model->store($usuario);

		$cont = 0;
		while ($cont < count($_POST["modulos"])) {
			$rol=array(
				'idusuario'=>$idusuario,
				'idmodulo'=>$_POST["modulos"][$cont]
			);
			if($idusuario!=""){
				$resultado=$this->Rol_model->store($rol);
			}
		$cont = $cont + 1;
		}
		redirect("Configuracion/Usuario");
	}

	public function Edit()
	{
		$this->load->model(array(
			'General/Usuario_model',
			'General/Sexo_model'
		));
		$idusuario=$_POST["idusuario"];

		$dato=array(
			'usuario'=>$this->Usuario_model->view($idusuario),
			'sexo'=>$this->Sexo_model->list_view()
		);

		$this->load->view("Configuracion/Usuario/Edit",$dato);
	}

	public function Update()
	{
		$this->load->model(array(
			'General/Usuario_model',
			'General/Rol_model'
		));
		$idusuario=$_POST["idusuario"];
		$usuario=array(
			'nombre'=>$_POST["nombre"],
			'apellido'=>$_POST["apellido"],
			'correo'=>$_POST["correo"],
			'idsexo'=>$_POST["sexo"]
		);
		$this->Usuario_model->update($idusuario,$usuario);

		redirect("Configuracion/Usuario");
	}

	public function Destroy()
	{
		$this->load->model(array(
			'General/Usuario_model'
		));
		$idusuario=$_POST["idusuario"];
		$dato=array(
			'usuario'=>$this->Usuario_model->view($idusuario)
		);

		$this->load->view("Configuracion/Usuario/Delete",$dato);
	}

	public function Delete()
	{
		$this->load->model(array(
			'General/Usuario_model'
		));
		$idusuario=$_POST["idusuario"];

		$usuario=array(
			'idestado'=>2
		);

		$this->Usuario_model->update($idusuario,$usuario);

		redirect("Configuracion/Usuario");
	}


	///Adicionales de Verificacion
	/// Verifica si el correo que se esta escribiendo ya se encuentra en la BD
	public function Duplicate_correo()
	{
		$this->load->model(array(
			'General/Usuario_model'
		));
		$campo="correo";
		$correo=$_POST["correo"];
		$conteo=$this->Usuario_model->duplicate($campo,$correo);
		echo $conteo->contador;
	}
	///CAmbio de Contraseña
	public function Change_pw()
	{
		$this->load->model(array(
			'General/Usuario_model'
		));
		$idusuario=$_POST["idusuario"];

		$dato=array(
			'usuario'=>$this->Usuario_model->view($idusuario),
		);

		$this->load->view("Configuracion/Usuario/Change_pw",$dato);
	}

	public function Update_pw()
	{
		$this->load->model(array(
			'General/Usuario_model'
		));
		$idusuario=$_POST["idusuario"];
		$usuario=array(
			'password'=>$_POST["pwd"]
		);
		$this->Usuario_model->update($idusuario,$usuario);

		redirect("Configuracion/Usuario");
	}

	public function Asignar_modulo()
	{
		$this->load->model(array(
			'General/Rol_model'
		));
		$idusuario=$_POST["idusuario"];
		$dato=array(
			'rol'=>$this->Rol_model->list_view($idusuario),
			'modulo'=>$this->Rol_model->modulos_disponibles($idusuario),
			'idusuario'=>$_POST["idusuario"]
		);

		$this->load->view("Configuracion/Usuario/Asignar_modulo",$dato);
	}

	public function Store_rol()
	{
		$this->load->model(array(
			'General/Rol_model'
		));
		$idusuario=$_POST["idusuario"];
		$validator=$_POST["validator"];

		if($validator==1){
			$cont = 0;
			while ($cont < count($_POST["modulos"])) {
				$rol=array(
					'idusuario'=>$idusuario,
					'idmodulo'=>$_POST["modulos"][$cont]
				);
				if($idusuario!=""){
					$resultado=$this->Rol_model->store($rol);
				}
				$cont = $cont + 1;
			}
			redirect("Configuracion/Usuario");
		}else{
			$cont = 0;
			while ($cont < count($_POST["modulos"])) {
				$idrol=$_POST["modulos"][$cont];
				$resultado=$this->Rol_model->delete($idrol);
				$cont = $cont + 1;
			}
			redirect("Configuracion/Usuario");
		}

	}

	//Funciones Masivas

	public function Delete_massive()
	{
		$this->load->view("Configuracion/Usuario/Delet_massive");
	}

	public function Destroy_massive()
	{
		$this->load->model(array(
			'General/Usuario_model'
		));
		$cont = 0;
		while ($cont < count($_POST["masivo"])) {
			$idusuario=$_POST["masivo"][$cont];
			$usuario=array(
				'idestado'=>2
			);

			$cont = $cont + 1;
			$respuesta=$this->Usuario_model->update($idusuario,$usuario);
		}
		if($respuesta){
			echo 1;
		}else{
			echo 0;
		}
	}
}
