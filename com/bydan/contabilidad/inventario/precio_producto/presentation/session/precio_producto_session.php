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

namespace com\bydan\contabilidad\inventario\precio_producto\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\inventario\precio_producto\util\precio_producto_util;

class precio_producto_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $precio_producto_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesionempresa=null;
	public ?int $bigidempresaActual=null;
	public ?string $bigidempresaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionbodega=null;
	public ?int $bigidbodegaActual=null;
	public ?string $bigidbodegaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionproducto=null;
	public ?int $bigidproductoActual=null;
	public ?string $bigidproductoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesiontipo_precio=null;
	public ?int $bigidtipo_precioActual=null;
	public ?string $bigidtipo_precioActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_empresa=-1;
	public int $id_bodega=-1;
	public int $id_producto=-1;
	public int $id_tipo_precio=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = precio_producto_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:table-row';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->precio_producto_sessionAdditional=new precio_producto_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesionempresa=false;
		$this->bigidempresaActual=0;
		$this->bigidempresaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionbodega=false;
		$this->bigidbodegaActual=0;
		$this->bigidbodegaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionproducto=false;
		$this->bigidproductoActual=0;
		$this->bigidproductoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesiontipo_precio=false;
		$this->bigidtipo_precioActual=0;
		$this->bigidtipo_precioActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_empresa=-1;
 		$this->id_bodega=-1;
 		$this->id_producto=-1;
 		$this->id_tipo_precio=-1;
    }
}
?>
