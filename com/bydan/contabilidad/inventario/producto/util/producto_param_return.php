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

namespace com\bydan\contabilidad\inventario\producto\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;

use com\bydan\contabilidad\inventario\producto\presentation\session\producto_session;

class producto_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?producto $producto = null;	
	public ?array $productos = array();
	
	/*SESSION*/
	public ?producto_session $producto_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_proveedorsFK=false;
	public array $proveedorsFK=array();
	public int $idproveedorDefaultFK=-1;

	public bool $con_tipo_productosFK=false;
	public array $tipo_productosFK=array();
	public int $idtipo_productoDefaultFK=-1;

	public bool $con_impuestosFK=false;
	public array $impuestosFK=array();
	public int $idimpuestoDefaultFK=-1;

	public bool $con_otro_impuestosFK=false;
	public array $otro_impuestosFK=array();
	public int $idotro_impuestoDefaultFK=-1;

	public bool $con_categoria_productosFK=false;
	public array $categoria_productosFK=array();
	public int $idcategoria_productoDefaultFK=-1;

	public bool $con_sub_categoria_productosFK=false;
	public array $sub_categoria_productosFK=array();
	public int $idsub_categoria_productoDefaultFK=-1;

	public bool $con_bodega_defectosFK=false;
	public array $bodega_defectosFK=array();
	public int $idbodega_defectoDefaultFK=-1;

	public bool $con_unidad_comprasFK=false;
	public array $unidad_comprasFK=array();
	public int $idunidad_compraDefaultFK=-1;

	public bool $con_unidad_ventasFK=false;
	public array $unidad_ventasFK=array();
	public int $idunidad_ventaDefaultFK=-1;

	public bool $con_cuenta_ventasFK=false;
	public array $cuenta_ventasFK=array();
	public int $idcuenta_ventaDefaultFK=-1;

	public bool $con_cuenta_comprasFK=false;
	public array $cuenta_comprasFK=array();
	public int $idcuenta_compraDefaultFK=-1;

	public bool $con_cuenta_costosFK=false;
	public array $cuenta_costosFK=array();
	public int $idcuenta_costoDefaultFK=-1;

	public bool $con_retencionsFK=false;
	public array $retencionsFK=array();
	public int $idretencionDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->productos= array();
		$this->producto= new producto();
		
		/*SESSION*/
		$this->producto_session=$this->Session->unserialize(producto_util::$STR_SESSION_NAME);

		if($this->producto_session==null) {
			$this->producto_session=new producto_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_proveedorsFK=false;
		$this->proveedorsFK=array();
		$this->idproveedorDefaultFK=-1;

		$this->con_tipo_productosFK=false;
		$this->tipo_productosFK=array();
		$this->idtipo_productoDefaultFK=-1;

		$this->con_impuestosFK=false;
		$this->impuestosFK=array();
		$this->idimpuestoDefaultFK=-1;

		$this->con_otro_impuestosFK=false;
		$this->otro_impuestosFK=array();
		$this->idotro_impuestoDefaultFK=-1;

		$this->con_categoria_productosFK=false;
		$this->categoria_productosFK=array();
		$this->idcategoria_productoDefaultFK=-1;

		$this->con_sub_categoria_productosFK=false;
		$this->sub_categoria_productosFK=array();
		$this->idsub_categoria_productoDefaultFK=-1;

		$this->con_bodega_defectosFK=false;
		$this->bodega_defectosFK=array();
		$this->idbodega_defectoDefaultFK=-1;

		$this->con_unidad_comprasFK=false;
		$this->unidad_comprasFK=array();
		$this->idunidad_compraDefaultFK=-1;

		$this->con_unidad_ventasFK=false;
		$this->unidad_ventasFK=array();
		$this->idunidad_ventaDefaultFK=-1;

		$this->con_cuenta_ventasFK=false;
		$this->cuenta_ventasFK=array();
		$this->idcuenta_ventaDefaultFK=-1;

		$this->con_cuenta_comprasFK=false;
		$this->cuenta_comprasFK=array();
		$this->idcuenta_compraDefaultFK=-1;

		$this->con_cuenta_costosFK=false;
		$this->cuenta_costosFK=array();
		$this->idcuenta_costoDefaultFK=-1;

		$this->con_retencionsFK=false;
		$this->retencionsFK=array();
		$this->idretencionDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getproducto() : producto {	
		return $this->producto;
	}
		
	public function setproducto(producto $newproducto) {
		$this->producto = $newproducto;
	}
	
	public function getproductos() : array {		
		return $this->productos;
	}
	
	public function setproductos(array $newproductos) {
		$this->productos = $newproductos;
	}
	
	/*SESSION*/
	public function getproducto_session() : producto_session {	
		return $this->producto_session;
	}
		
	public function setproducto_session(producto_session $newproducto_session) {
		$this->producto_session = $newproducto_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
