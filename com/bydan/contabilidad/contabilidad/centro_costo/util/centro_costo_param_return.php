<?php declare(strict_types = 1);
 /*
*AVISO LEGAL
(C) Copyright
*Este programa esta protegido por la ley de derechos de autor.
*La reproduccion o distribucion ilicita de este programa o de cualquiera de
*sus partes esta penado por la ley con severas sanciones civiles y penales,
*y seran objeto de todas las sanciones legales que correspondan.

*Su contenido no puede copiarse para fines comerciales o de otras,
*ni puede mostrarse, incluso en una version modificada, en otros sitios Web.
Solo esta permitido colocar hipervinculos al sitio web.
*/

namespace com\bydan\contabilidad\contabilidad\centro_costo\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;

use com\bydan\contabilidad\contabilidad\centro_costo\presentation\session\centro_costo_session;

class centro_costo_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?centro_costo $centro_costo = null;	
	public ?array $centro_costos = array();
	
	/*SESSION*/
	public ?centro_costo_session $centro_costo_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->centro_costos= array();
		$this->centro_costo= new centro_costo();
		
		/*SESSION*/
		$this->centro_costo_session=$this->Session->unserialize(centro_costo_util::$STR_SESSION_NAME);

		if($this->centro_costo_session==null) {
			$this->centro_costo_session=new centro_costo_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getcentro_costo() : centro_costo {	
		return $this->centro_costo;
	}
		
	public function setcentro_costo(centro_costo $newcentro_costo) {
		$this->centro_costo = $newcentro_costo;
	}
	
	public function getcentro_costos() : array {		
		return $this->centro_costos;
	}
	
	public function setcentro_costos(array $newcentro_costos) {
		$this->centro_costos = $newcentro_costos;
	}
	
	/*SESSION*/
	public function getcentro_costo_session() : centro_costo_session {	
		return $this->centro_costo_session;
	}
		
	public function setcentro_costo_session(centro_costo_session $newcentro_costo_session) {
		$this->centro_costo_session = $newcentro_costo_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
