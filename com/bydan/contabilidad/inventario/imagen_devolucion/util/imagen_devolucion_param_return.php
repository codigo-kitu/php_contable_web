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

namespace com\bydan\contabilidad\inventario\imagen_devolucion\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\imagen_devolucion\business\entity\imagen_devolucion;

use com\bydan\contabilidad\inventario\imagen_devolucion\presentation\session\imagen_devolucion_session;

class imagen_devolucion_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?imagen_devolucion $imagen_devolucion = null;	
	public ?array $imagen_devolucions = array();
	
	/*SESSION*/
	public ?imagen_devolucion_session $imagen_devolucion_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->imagen_devolucions= array();
		$this->imagen_devolucion= new imagen_devolucion();
		
		/*SESSION*/
		$this->imagen_devolucion_session=$this->Session->unserialize(imagen_devolucion_util::$STR_SESSION_NAME);

		if($this->imagen_devolucion_session==null) {
			$this->imagen_devolucion_session=new imagen_devolucion_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getimagen_devolucion() : imagen_devolucion {	
		return $this->imagen_devolucion;
	}
		
	public function setimagen_devolucion(imagen_devolucion $newimagen_devolucion) {
		$this->imagen_devolucion = $newimagen_devolucion;
	}
	
	public function getimagen_devolucions() : array {		
		return $this->imagen_devolucions;
	}
	
	public function setimagen_devolucions(array $newimagen_devolucions) {
		$this->imagen_devolucions = $newimagen_devolucions;
	}
	
	/*SESSION*/
	public function getimagen_devolucion_session() : imagen_devolucion_session {	
		return $this->imagen_devolucion_session;
	}
		
	public function setimagen_devolucion_session(imagen_devolucion_session $newimagen_devolucion_session) {
		$this->imagen_devolucion_session = $newimagen_devolucion_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
