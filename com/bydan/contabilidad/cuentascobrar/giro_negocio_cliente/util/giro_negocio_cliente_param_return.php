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

namespace com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\business\entity\giro_negocio_cliente;

use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\presentation\session\giro_negocio_cliente_session;

class giro_negocio_cliente_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?giro_negocio_cliente $giro_negocio_cliente = null;	
	public ?array $giro_negocio_clientes = array();
	
	/*SESSION*/
	public ?giro_negocio_cliente_session $giro_negocio_cliente_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->giro_negocio_clientes= array();
		$this->giro_negocio_cliente= new giro_negocio_cliente();
		
		/*SESSION*/
		$this->giro_negocio_cliente_session=$this->Session->unserialize(giro_negocio_cliente_util::$STR_SESSION_NAME);

		if($this->giro_negocio_cliente_session==null) {
			$this->giro_negocio_cliente_session=new giro_negocio_cliente_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getgiro_negocio_cliente() : giro_negocio_cliente {	
		return $this->giro_negocio_cliente;
	}
		
	public function setgiro_negocio_cliente(giro_negocio_cliente $newgiro_negocio_cliente) {
		$this->giro_negocio_cliente = $newgiro_negocio_cliente;
	}
	
	public function getgiro_negocio_clientes() : array {		
		return $this->giro_negocio_clientes;
	}
	
	public function setgiro_negocio_clientes(array $newgiro_negocio_clientes) {
		$this->giro_negocio_clientes = $newgiro_negocio_clientes;
	}
	
	/*SESSION*/
	public function getgiro_negocio_cliente_session() : giro_negocio_cliente_session {	
		return $this->giro_negocio_cliente_session;
	}
		
	public function setgiro_negocio_cliente_session(giro_negocio_cliente_session $newgiro_negocio_cliente_session) {
		$this->giro_negocio_cliente_session = $newgiro_negocio_cliente_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
