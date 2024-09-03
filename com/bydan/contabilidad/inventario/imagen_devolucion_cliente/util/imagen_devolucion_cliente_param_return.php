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

namespace com\bydan\contabilidad\inventario\imagen_devolucion_cliente\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\imagen_devolucion_cliente\business\entity\imagen_devolucion_cliente;

use com\bydan\contabilidad\inventario\imagen_devolucion_cliente\presentation\session\imagen_devolucion_cliente_session;

class imagen_devolucion_cliente_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?imagen_devolucion_cliente $imagen_devolucion_cliente = null;	
	public ?array $imagen_devolucion_clientes = array();
	
	/*SESSION*/
	public ?imagen_devolucion_cliente_session $imagen_devolucion_cliente_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->imagen_devolucion_clientes= array();
		$this->imagen_devolucion_cliente= new imagen_devolucion_cliente();
		
		/*SESSION*/
		$this->imagen_devolucion_cliente_session=$this->Session->unserialize(imagen_devolucion_cliente_util::$STR_SESSION_NAME);

		if($this->imagen_devolucion_cliente_session==null) {
			$this->imagen_devolucion_cliente_session=new imagen_devolucion_cliente_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getimagen_devolucion_cliente() : imagen_devolucion_cliente {	
		return $this->imagen_devolucion_cliente;
	}
		
	public function setimagen_devolucion_cliente(imagen_devolucion_cliente $newimagen_devolucion_cliente) {
		$this->imagen_devolucion_cliente = $newimagen_devolucion_cliente;
	}
	
	public function getimagen_devolucion_clientes() : array {		
		return $this->imagen_devolucion_clientes;
	}
	
	public function setimagen_devolucion_clientes(array $newimagen_devolucion_clientes) {
		$this->imagen_devolucion_clientes = $newimagen_devolucion_clientes;
	}
	
	/*SESSION*/
	public function getimagen_devolucion_cliente_session() : imagen_devolucion_cliente_session {	
		return $this->imagen_devolucion_cliente_session;
	}
		
	public function setimagen_devolucion_cliente_session(imagen_devolucion_cliente_session $newimagen_devolucion_cliente_session) {
		$this->imagen_devolucion_cliente_session = $newimagen_devolucion_cliente_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
