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

namespace com\bydan\contabilidad\inventario\tipo_producto\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\tipo_producto\business\entity\tipo_producto;


class tipo_producto_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?tipo_producto $tipo_producto = null;	
	public ?array $tipo_productos = array();
	
	/*SESSION*/
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->tipo_productos= array();
		$this->tipo_producto= new tipo_producto();
		
		/*SESSION*/
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function gettipo_producto() : tipo_producto {	
		return $this->tipo_producto;
	}
		
	public function settipo_producto(tipo_producto $newtipo_producto) {
		$this->tipo_producto = $newtipo_producto;
	}
	
	public function gettipo_productos() : array {		
		return $this->tipo_productos;
	}
	
	public function settipo_productos(array $newtipo_productos) {
		$this->tipo_productos = $newtipo_productos;
	}
	

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
