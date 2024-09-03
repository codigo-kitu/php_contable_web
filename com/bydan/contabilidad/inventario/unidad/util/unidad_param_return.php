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

namespace com\bydan\contabilidad\inventario\unidad\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;

use com\bydan\contabilidad\inventario\unidad\presentation\session\unidad_session;

class unidad_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?unidad $unidad = null;	
	public ?array $unidads = array();
	
	/*SESSION*/
	public ?unidad_session $unidad_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->unidads= array();
		$this->unidad= new unidad();
		
		/*SESSION*/
		$this->unidad_session=$this->Session->unserialize(unidad_util::$STR_SESSION_NAME);

		if($this->unidad_session==null) {
			$this->unidad_session=new unidad_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getunidad() : unidad {	
		return $this->unidad;
	}
		
	public function setunidad(unidad $newunidad) {
		$this->unidad = $newunidad;
	}
	
	public function getunidads() : array {		
		return $this->unidads;
	}
	
	public function setunidads(array $newunidads) {
		$this->unidads = $newunidads;
	}
	
	/*SESSION*/
	public function getunidad_session() : unidad_session {	
		return $this->unidad_session;
	}
		
	public function setunidad_session(unidad_session $newunidad_session) {
		$this->unidad_session = $newunidad_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
