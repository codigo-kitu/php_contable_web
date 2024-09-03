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

namespace com\bydan\contabilidad\inventario\costo_producto\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\costo_producto\business\entity\costo_producto;

use com\bydan\contabilidad\inventario\costo_producto\presentation\session\costo_producto_session;

class costo_producto_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?costo_producto $costo_producto = null;	
	public ?array $costo_productos = array();
	
	/*SESSION*/
	public ?costo_producto_session $costo_producto_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_sucursalsFK=false;
	public array $sucursalsFK=array();
	public int $idsucursalDefaultFK=-1;

	public bool $con_ejerciciosFK=false;
	public array $ejerciciosFK=array();
	public int $idejercicioDefaultFK=-1;

	public bool $con_periodosFK=false;
	public array $periodosFK=array();
	public int $idperiodoDefaultFK=-1;

	public bool $con_usuariosFK=false;
	public array $usuariosFK=array();
	public int $idusuarioDefaultFK=-1;

	public bool $con_productosFK=false;
	public array $productosFK=array();
	public int $idproductoDefaultFK=-1;

	public bool $con_tablasFK=false;
	public array $tablasFK=array();
	public int $idtablaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->costo_productos= array();
		$this->costo_producto= new costo_producto();
		
		/*SESSION*/
		$this->costo_producto_session=$this->Session->unserialize(costo_producto_util::$STR_SESSION_NAME);

		if($this->costo_producto_session==null) {
			$this->costo_producto_session=new costo_producto_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_sucursalsFK=false;
		$this->sucursalsFK=array();
		$this->idsucursalDefaultFK=-1;

		$this->con_ejerciciosFK=false;
		$this->ejerciciosFK=array();
		$this->idejercicioDefaultFK=-1;

		$this->con_periodosFK=false;
		$this->periodosFK=array();
		$this->idperiodoDefaultFK=-1;

		$this->con_usuariosFK=false;
		$this->usuariosFK=array();
		$this->idusuarioDefaultFK=-1;

		$this->con_productosFK=false;
		$this->productosFK=array();
		$this->idproductoDefaultFK=-1;

		$this->con_tablasFK=false;
		$this->tablasFK=array();
		$this->idtablaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getcosto_producto() : costo_producto {	
		return $this->costo_producto;
	}
		
	public function setcosto_producto(costo_producto $newcosto_producto) {
		$this->costo_producto = $newcosto_producto;
	}
	
	public function getcosto_productos() : array {		
		return $this->costo_productos;
	}
	
	public function setcosto_productos(array $newcosto_productos) {
		$this->costo_productos = $newcosto_productos;
	}
	
	/*SESSION*/
	public function getcosto_producto_session() : costo_producto_session {	
		return $this->costo_producto_session;
	}
		
	public function setcosto_producto_session(costo_producto_session $newcosto_producto_session) {
		$this->costo_producto_session = $newcosto_producto_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
