<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\entity;

class Classe {
    
	public string $clas;	
	public bool $blnActivo;
	public string $clase='';
	public string $columna='';
	public int $indice=0;
	
	function __construct(string $clas='NONE') {
		$this->clas=$clas;
		$this->blnActivo=true;
	}
	
	public static function NewClasse(string $clas):Classe {
		$classe = new self('NONE');
		
		$classe->clas=$clas;
		$classe->blnActivo=true;
		$classe->clase='';
		$classe->columna='';
		$classe->indice=0;
		
		return $classe;
	}
	
	public static function NewClasse1(string $clase) :Classe{
		$classe = new self('NONE');
		
		$classe->clase=$clase;
		$classe->clas='NONE';
		$classe->blnActivo=true;
		$classe->columna='';
		$classe->indice=0;
		
		return $classe;
	}
	
	public static function NewClasse2() {
		$classe = new self('NONE');
		
		$classe->clas='NONE';
		$classe->blnActivo=false;
		$classe->clase='';
		$classe->columna='';
		$classe->indice=0;
		
		return $classe;
	}
	
	public static function NewClasse3(string $columna_clase,string $clas,int $indice,bool $paraColumna):Classe {
		$classe = new self('NONE');
		
		if($paraColumna) {
			$classe->columna=$columna_clase;
			$classe->clase='';
			
		} else {		
			$classe->clase=$columna_clase;
			$classe->columna='';
		}
		
		$classe->clas=$clas;
		$classe->blnActivo=true;
		$classe->indice=$indice;
		
		return $classe;
	}

	public static function NewClasse4(string $columna_clase,string $clas,bool $paraColumna):Classe {
		$classe = new self('NONE');
		
		if($paraColumna) {
			$classe->columna=$columna_clase;
			$classe->clase='';
			
		} else {		
			$classe->clase=$columna_clase;
			$classe->columna='';
		}
		
		$classe->clas=$clas;
		$classe->blnActivo=true;
		$classe->indice=0;
		
		return $classe;
	}			
	
	public function getClas():string {
		return $this->clas;
	}

	public function setClas(string $clas) {
		$this->clas = $clas;
	}

	public function getBlnActivo():bool {
		return $this->blnActivo;
	}

	public function setBlnActivo(bool $blnActivo) {
		$this->blnActivo = $blnActivo;
	}

	public function getClase():string {
		return $this->clase;
	}

	public function setClase(string $clase) {
		$this->clase = $clase;
	}

	public function getColumna():string {
		return $this->columna;
	}

	public function setColumna(string $columna) {
		$this->columna = $columna;
	}

	public function getIndice():int {
		return $this->indice;
	}

	public function setIndice(int $indice) {
		$this->indice = $indice;
	}
	
	public static function InicializarRelaciones($classes){
		
		foreach($classes as $class) {
			$class->blnActivo=true;
		}
	}
}

?>