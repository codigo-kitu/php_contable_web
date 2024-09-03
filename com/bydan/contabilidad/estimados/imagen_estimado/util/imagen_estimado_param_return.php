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

namespace com\bydan\contabilidad\estimados\imagen_estimado\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\estimados\imagen_estimado\business\entity\imagen_estimado;

use com\bydan\contabilidad\estimados\imagen_estimado\presentation\session\imagen_estimado_session;

class imagen_estimado_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?imagen_estimado $imagen_estimado = null;	
	public ?array $imagen_estimados = array();
	
	/*SESSION*/
	public ?imagen_estimado_session $imagen_estimado_session = null;
	
	/*FKs*/
	

	public bool $con_estimadosFK=false;
	public array $estimadosFK=array();
	public int $idestimadoDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->imagen_estimados= array();
		$this->imagen_estimado= new imagen_estimado();
		
		/*SESSION*/
		$this->imagen_estimado_session=$this->Session->unserialize(imagen_estimado_util::$STR_SESSION_NAME);

		if($this->imagen_estimado_session==null) {
			$this->imagen_estimado_session=new imagen_estimado_session();
		}
		
		/*FKs*/
		

		$this->con_estimadosFK=false;
		$this->estimadosFK=array();
		$this->idestimadoDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getimagen_estimado() : imagen_estimado {	
		return $this->imagen_estimado;
	}
		
	public function setimagen_estimado(imagen_estimado $newimagen_estimado) {
		$this->imagen_estimado = $newimagen_estimado;
	}
	
	public function getimagen_estimados() : array {		
		return $this->imagen_estimados;
	}
	
	public function setimagen_estimados(array $newimagen_estimados) {
		$this->imagen_estimados = $newimagen_estimados;
	}
	
	/*SESSION*/
	public function getimagen_estimado_session() : imagen_estimado_session {	
		return $this->imagen_estimado_session;
	}
		
	public function setimagen_estimado_session(imagen_estimado_session $newimagen_estimado_session) {
		$this->imagen_estimado_session = $newimagen_estimado_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
