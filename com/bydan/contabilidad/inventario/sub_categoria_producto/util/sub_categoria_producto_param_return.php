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

namespace com\bydan\contabilidad\inventario\sub_categoria_producto\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\sub_categoria_producto\business\entity\sub_categoria_producto;

use com\bydan\contabilidad\inventario\sub_categoria_producto\presentation\session\sub_categoria_producto_session;

class sub_categoria_producto_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?sub_categoria_producto $sub_categoria_producto = null;	
	public ?array $sub_categoria_productos = array();
	
	/*SESSION*/
	public ?sub_categoria_producto_session $sub_categoria_producto_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_categoria_productosFK=false;
	public array $categoria_productosFK=array();
	public int $idcategoria_productoDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->sub_categoria_productos= array();
		$this->sub_categoria_producto= new sub_categoria_producto();
		
		/*SESSION*/
		$this->sub_categoria_producto_session=$this->Session->unserialize(sub_categoria_producto_util::$STR_SESSION_NAME);

		if($this->sub_categoria_producto_session==null) {
			$this->sub_categoria_producto_session=new sub_categoria_producto_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_categoria_productosFK=false;
		$this->categoria_productosFK=array();
		$this->idcategoria_productoDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getsub_categoria_producto() : sub_categoria_producto {	
		return $this->sub_categoria_producto;
	}
		
	public function setsub_categoria_producto(sub_categoria_producto $newsub_categoria_producto) {
		$this->sub_categoria_producto = $newsub_categoria_producto;
	}
	
	public function getsub_categoria_productos() : array {		
		return $this->sub_categoria_productos;
	}
	
	public function setsub_categoria_productos(array $newsub_categoria_productos) {
		$this->sub_categoria_productos = $newsub_categoria_productos;
	}
	
	/*SESSION*/
	public function getsub_categoria_producto_session() : sub_categoria_producto_session {	
		return $this->sub_categoria_producto_session;
	}
		
	public function setsub_categoria_producto_session(sub_categoria_producto_session $newsub_categoria_producto_session) {
		$this->sub_categoria_producto_session = $newsub_categoria_producto_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
