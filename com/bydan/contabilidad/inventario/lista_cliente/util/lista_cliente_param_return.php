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

namespace com\bydan\contabilidad\inventario\lista_cliente\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\lista_cliente\business\entity\lista_cliente;

use com\bydan\contabilidad\inventario\lista_cliente\presentation\session\lista_cliente_session;

class lista_cliente_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?lista_cliente $lista_cliente = null;	
	public ?array $lista_clientes = array();
	
	/*SESSION*/
	public ?lista_cliente_session $lista_cliente_session = null;
	
	/*FKs*/
	

	public bool $con_clientesFK=false;
	public array $clientesFK=array();
	public int $idclienteDefaultFK=-1;

	public bool $con_productosFK=false;
	public array $productosFK=array();
	public int $idproductoDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->lista_clientes= array();
		$this->lista_cliente= new lista_cliente();
		
		/*SESSION*/
		$this->lista_cliente_session=$this->Session->unserialize(lista_cliente_util::$STR_SESSION_NAME);

		if($this->lista_cliente_session==null) {
			$this->lista_cliente_session=new lista_cliente_session();
		}
		
		/*FKs*/
		

		$this->con_clientesFK=false;
		$this->clientesFK=array();
		$this->idclienteDefaultFK=-1;

		$this->con_productosFK=false;
		$this->productosFK=array();
		$this->idproductoDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getlista_cliente() : lista_cliente {	
		return $this->lista_cliente;
	}
		
	public function setlista_cliente(lista_cliente $newlista_cliente) {
		$this->lista_cliente = $newlista_cliente;
	}
	
	public function getlista_clientes() : array {		
		return $this->lista_clientes;
	}
	
	public function setlista_clientes(array $newlista_clientes) {
		$this->lista_clientes = $newlista_clientes;
	}
	
	/*SESSION*/
	public function getlista_cliente_session() : lista_cliente_session {	
		return $this->lista_cliente_session;
	}
		
	public function setlista_cliente_session(lista_cliente_session $newlista_cliente_session) {
		$this->lista_cliente_session = $newlista_cliente_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
