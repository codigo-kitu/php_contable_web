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

namespace com\bydan\contabilidad\cuentascobrar\imagen_cliente\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascobrar\imagen_cliente\business\entity\imagen_cliente;

use com\bydan\contabilidad\cuentascobrar\imagen_cliente\presentation\session\imagen_cliente_session;

class imagen_cliente_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?imagen_cliente $imagen_cliente = null;	
	public ?array $imagen_clientes = array();
	
	/*SESSION*/
	public ?imagen_cliente_session $imagen_cliente_session = null;
	
	/*FKs*/
	

	public bool $con_clientesFK=false;
	public array $clientesFK=array();
	public int $idclienteDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->imagen_clientes= array();
		$this->imagen_cliente= new imagen_cliente();
		
		/*SESSION*/
		$this->imagen_cliente_session=$this->Session->unserialize(imagen_cliente_util::$STR_SESSION_NAME);

		if($this->imagen_cliente_session==null) {
			$this->imagen_cliente_session=new imagen_cliente_session();
		}
		
		/*FKs*/
		

		$this->con_clientesFK=false;
		$this->clientesFK=array();
		$this->idclienteDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getimagen_cliente() : imagen_cliente {	
		return $this->imagen_cliente;
	}
		
	public function setimagen_cliente(imagen_cliente $newimagen_cliente) {
		$this->imagen_cliente = $newimagen_cliente;
	}
	
	public function getimagen_clientes() : array {		
		return $this->imagen_clientes;
	}
	
	public function setimagen_clientes(array $newimagen_clientes) {
		$this->imagen_clientes = $newimagen_clientes;
	}
	
	/*SESSION*/
	public function getimagen_cliente_session() : imagen_cliente_session {	
		return $this->imagen_cliente_session;
	}
		
	public function setimagen_cliente_session(imagen_cliente_session $newimagen_cliente_session) {
		$this->imagen_cliente_session = $newimagen_cliente_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
