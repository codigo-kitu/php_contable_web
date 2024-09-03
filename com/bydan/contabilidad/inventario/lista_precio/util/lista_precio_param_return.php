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

namespace com\bydan\contabilidad\inventario\lista_precio\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\lista_precio\business\entity\lista_precio;

use com\bydan\contabilidad\inventario\lista_precio\presentation\session\lista_precio_session;

class lista_precio_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?lista_precio $lista_precio = null;	
	public ?array $lista_precios = array();
	
	/*SESSION*/
	public ?lista_precio_session $lista_precio_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_bodegasFK=false;
	public array $bodegasFK=array();
	public int $idbodegaDefaultFK=-1;

	public bool $con_productosFK=false;
	public array $productosFK=array();
	public int $idproductoDefaultFK=-1;

	public bool $con_proveedorsFK=false;
	public array $proveedorsFK=array();
	public int $idproveedorDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->lista_precios= array();
		$this->lista_precio= new lista_precio();
		
		/*SESSION*/
		$this->lista_precio_session=$this->Session->unserialize(lista_precio_util::$STR_SESSION_NAME);

		if($this->lista_precio_session==null) {
			$this->lista_precio_session=new lista_precio_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_bodegasFK=false;
		$this->bodegasFK=array();
		$this->idbodegaDefaultFK=-1;

		$this->con_productosFK=false;
		$this->productosFK=array();
		$this->idproductoDefaultFK=-1;

		$this->con_proveedorsFK=false;
		$this->proveedorsFK=array();
		$this->idproveedorDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getlista_precio() : lista_precio {	
		return $this->lista_precio;
	}
		
	public function setlista_precio(lista_precio $newlista_precio) {
		$this->lista_precio = $newlista_precio;
	}
	
	public function getlista_precios() : array {		
		return $this->lista_precios;
	}
	
	public function setlista_precios(array $newlista_precios) {
		$this->lista_precios = $newlista_precios;
	}
	
	/*SESSION*/
	public function getlista_precio_session() : lista_precio_session {	
		return $this->lista_precio_session;
	}
		
	public function setlista_precio_session(lista_precio_session $newlista_precio_session) {
		$this->lista_precio_session = $newlista_precio_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
