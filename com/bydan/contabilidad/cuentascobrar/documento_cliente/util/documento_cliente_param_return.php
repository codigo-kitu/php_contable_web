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

namespace com\bydan\contabilidad\cuentascobrar\documento_cliente\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascobrar\documento_cliente\business\entity\documento_cliente;

use com\bydan\contabilidad\cuentascobrar\documento_cliente\presentation\session\documento_cliente_session;

class documento_cliente_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?documento_cliente $documento_cliente = null;	
	public ?array $documento_clientes = array();
	
	/*SESSION*/
	public ?documento_cliente_session $documento_cliente_session = null;
	
	/*FKs*/
	

	public bool $con_documento_proveedorsFK=false;
	public array $documento_proveedorsFK=array();
	public int $iddocumento_proveedorDefaultFK=-1;

	public bool $con_clientesFK=false;
	public array $clientesFK=array();
	public int $idclienteDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->documento_clientes= array();
		$this->documento_cliente= new documento_cliente();
		
		/*SESSION*/
		$this->documento_cliente_session=$this->Session->unserialize(documento_cliente_util::$STR_SESSION_NAME);

		if($this->documento_cliente_session==null) {
			$this->documento_cliente_session=new documento_cliente_session();
		}
		
		/*FKs*/
		

		$this->con_documento_proveedorsFK=false;
		$this->documento_proveedorsFK=array();
		$this->iddocumento_proveedorDefaultFK=-1;

		$this->con_clientesFK=false;
		$this->clientesFK=array();
		$this->idclienteDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getdocumento_cliente() : documento_cliente {	
		return $this->documento_cliente;
	}
		
	public function setdocumento_cliente(documento_cliente $newdocumento_cliente) {
		$this->documento_cliente = $newdocumento_cliente;
	}
	
	public function getdocumento_clientes() : array {		
		return $this->documento_clientes;
	}
	
	public function setdocumento_clientes(array $newdocumento_clientes) {
		$this->documento_clientes = $newdocumento_clientes;
	}
	
	/*SESSION*/
	public function getdocumento_cliente_session() : documento_cliente_session {	
		return $this->documento_cliente_session;
	}
		
	public function setdocumento_cliente_session(documento_cliente_session $newdocumento_cliente_session) {
		$this->documento_cliente_session = $newdocumento_cliente_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
