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

namespace com\bydan\contabilidad\inventario\categoria_producto\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\categoria_producto\business\entity\categoria_producto;

use com\bydan\contabilidad\inventario\categoria_producto\presentation\session\categoria_producto_session;

class categoria_producto_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?categoria_producto $categoria_producto = null;	
	public ?array $categoria_productos = array();
	
	/*SESSION*/
	public ?categoria_producto_session $categoria_producto_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->categoria_productos= array();
		$this->categoria_producto= new categoria_producto();
		
		/*SESSION*/
		$this->categoria_producto_session=$this->Session->unserialize(categoria_producto_util::$STR_SESSION_NAME);

		if($this->categoria_producto_session==null) {
			$this->categoria_producto_session=new categoria_producto_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getcategoria_producto() : categoria_producto {	
		return $this->categoria_producto;
	}
		
	public function setcategoria_producto(categoria_producto $newcategoria_producto) {
		$this->categoria_producto = $newcategoria_producto;
	}
	
	public function getcategoria_productos() : array {		
		return $this->categoria_productos;
	}
	
	public function setcategoria_productos(array $newcategoria_productos) {
		$this->categoria_productos = $newcategoria_productos;
	}
	
	/*SESSION*/
	public function getcategoria_producto_session() : categoria_producto_session {	
		return $this->categoria_producto_session;
	}
		
	public function setcategoria_producto_session(categoria_producto_session $newcategoria_producto_session) {
		$this->categoria_producto_session = $newcategoria_producto_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
