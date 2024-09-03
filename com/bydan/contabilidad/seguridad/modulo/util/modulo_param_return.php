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

namespace com\bydan\contabilidad\seguridad\modulo\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;

use com\bydan\contabilidad\seguridad\modulo\presentation\session\modulo_session;

class modulo_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?modulo $modulo = null;	
	public ?array $modulos = array();
	
	/*SESSION*/
	public ?modulo_session $modulo_session = null;
	
	/*FKs*/
	

	public bool $con_sistemasFK=false;
	public array $sistemasFK=array();
	public int $idsistemaDefaultFK=-1;

	public bool $con_paquetesFK=false;
	public array $paquetesFK=array();
	public int $idpaqueteDefaultFK=-1;

	public bool $con_tipo_tecla_mascarasFK=false;
	public array $tipo_tecla_mascarasFK=array();
	public int $idtipo_tecla_mascaraDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->modulos= array();
		$this->modulo= new modulo();
		
		/*SESSION*/
		$this->modulo_session=$this->Session->unserialize(modulo_util::$STR_SESSION_NAME);

		if($this->modulo_session==null) {
			$this->modulo_session=new modulo_session();
		}
		
		/*FKs*/
		

		$this->con_sistemasFK=false;
		$this->sistemasFK=array();
		$this->idsistemaDefaultFK=-1;

		$this->con_paquetesFK=false;
		$this->paquetesFK=array();
		$this->idpaqueteDefaultFK=-1;

		$this->con_tipo_tecla_mascarasFK=false;
		$this->tipo_tecla_mascarasFK=array();
		$this->idtipo_tecla_mascaraDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getmodulo() : modulo {	
		return $this->modulo;
	}
		
	public function setmodulo(modulo $newmodulo) {
		$this->modulo = $newmodulo;
	}
	
	public function getmodulos() : array {		
		return $this->modulos;
	}
	
	public function setmodulos(array $newmodulos) {
		$this->modulos = $newmodulos;
	}
	
	/*SESSION*/
	public function getmodulo_session() : modulo_session {	
		return $this->modulo_session;
	}
		
	public function setmodulo_session(modulo_session $newmodulo_session) {
		$this->modulo_session = $newmodulo_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
