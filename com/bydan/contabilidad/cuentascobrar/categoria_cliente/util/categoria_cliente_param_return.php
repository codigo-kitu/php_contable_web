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

namespace com\bydan\contabilidad\cuentascobrar\categoria_cliente\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascobrar\categoria_cliente\business\entity\categoria_cliente;

use com\bydan\contabilidad\cuentascobrar\categoria_cliente\presentation\session\categoria_cliente_session;

class categoria_cliente_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?categoria_cliente $categoria_cliente = null;	
	public ?array $categoria_clientes = array();
	
	/*SESSION*/
	public ?categoria_cliente_session $categoria_cliente_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->categoria_clientes= array();
		$this->categoria_cliente= new categoria_cliente();
		
		/*SESSION*/
		$this->categoria_cliente_session=$this->Session->unserialize(categoria_cliente_util::$STR_SESSION_NAME);

		if($this->categoria_cliente_session==null) {
			$this->categoria_cliente_session=new categoria_cliente_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getcategoria_cliente() : categoria_cliente {	
		return $this->categoria_cliente;
	}
		
	public function setcategoria_cliente(categoria_cliente $newcategoria_cliente) {
		$this->categoria_cliente = $newcategoria_cliente;
	}
	
	public function getcategoria_clientes() : array {		
		return $this->categoria_clientes;
	}
	
	public function setcategoria_clientes(array $newcategoria_clientes) {
		$this->categoria_clientes = $newcategoria_clientes;
	}
	
	/*SESSION*/
	public function getcategoria_cliente_session() : categoria_cliente_session {	
		return $this->categoria_cliente_session;
	}
		
	public function setcategoria_cliente_session(categoria_cliente_session $newcategoria_cliente_session) {
		$this->categoria_cliente_session = $newcategoria_cliente_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
