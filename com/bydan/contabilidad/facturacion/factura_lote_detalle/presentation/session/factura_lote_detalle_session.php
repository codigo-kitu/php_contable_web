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

namespace com\bydan\contabilidad\facturacion\factura_lote_detalle\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\util\factura_lote_detalle_util;

class factura_lote_detalle_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $factura_lote_detalle_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesionfactura_lote=null;
	public ?int $bigidfactura_loteActual=null;
	public ?string $bigidfactura_loteActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionbodega=null;
	public ?int $bigidbodegaActual=null;
	public ?string $bigidbodegaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionproducto=null;
	public ?int $bigidproductoActual=null;
	public ?string $bigidproductoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionunidad=null;
	public ?int $bigidunidadActual=null;
	public ?string $bigidunidadActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_factura_lote=-1;
	public int $id_bodega=-1;
	public int $id_producto=-1;
	public int $id_unidad=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = factura_lote_detalle_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:none';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->factura_lote_detalle_sessionAdditional=new factura_lote_detalle_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesionfactura_lote=false;
		$this->bigidfactura_loteActual=0;
		$this->bigidfactura_loteActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionbodega=false;
		$this->bigidbodegaActual=0;
		$this->bigidbodegaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionproducto=false;
		$this->bigidproductoActual=0;
		$this->bigidproductoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionunidad=false;
		$this->bigidunidadActual=0;
		$this->bigidunidadActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_factura_lote=-1;
 		$this->id_bodega=-1;
 		$this->id_producto=-1;
 		$this->id_unidad=-1;
    }
}
?>
