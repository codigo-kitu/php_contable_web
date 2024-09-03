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

namespace com\bydan\contabilidad\inventario\imagen_cotizacion\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\imagen_cotizacion\business\entity\imagen_cotizacion;

use com\bydan\contabilidad\inventario\imagen_cotizacion\presentation\session\imagen_cotizacion_session;

class imagen_cotizacion_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?imagen_cotizacion $imagen_cotizacion = null;	
	public ?array $imagen_cotizacions = array();
	
	/*SESSION*/
	public ?imagen_cotizacion_session $imagen_cotizacion_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->imagen_cotizacions= array();
		$this->imagen_cotizacion= new imagen_cotizacion();
		
		/*SESSION*/
		$this->imagen_cotizacion_session=$this->Session->unserialize(imagen_cotizacion_util::$STR_SESSION_NAME);

		if($this->imagen_cotizacion_session==null) {
			$this->imagen_cotizacion_session=new imagen_cotizacion_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getimagen_cotizacion() : imagen_cotizacion {	
		return $this->imagen_cotizacion;
	}
		
	public function setimagen_cotizacion(imagen_cotizacion $newimagen_cotizacion) {
		$this->imagen_cotizacion = $newimagen_cotizacion;
	}
	
	public function getimagen_cotizacions() : array {		
		return $this->imagen_cotizacions;
	}
	
	public function setimagen_cotizacions(array $newimagen_cotizacions) {
		$this->imagen_cotizacions = $newimagen_cotizacions;
	}
	
	/*SESSION*/
	public function getimagen_cotizacion_session() : imagen_cotizacion_session {	
		return $this->imagen_cotizacion_session;
	}
		
	public function setimagen_cotizacion_session(imagen_cotizacion_session $newimagen_cotizacion_session) {
		$this->imagen_cotizacion_session = $newimagen_cotizacion_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
