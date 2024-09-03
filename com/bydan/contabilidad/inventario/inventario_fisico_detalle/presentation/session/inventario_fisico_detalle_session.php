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

namespace com\bydan\contabilidad\inventario\inventario_fisico_detalle\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\util\inventario_fisico_detalle_util;

class inventario_fisico_detalle_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $inventario_fisico_detalle_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesioninventario_fisico=null;
	public ?int $bigidinventario_fisicoActual=null;
	public ?string $bigidinventario_fisicoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionproducto=null;
	public ?int $bigidproductoActual=null;
	public ?string $bigidproductoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionbodega=null;
	public ?int $bigidbodegaActual=null;
	public ?string $bigidbodegaActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_inventario_fisico=-1;
	public int $id_producto=-1;
	public int $id_bodega=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:none';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->inventario_fisico_detalle_sessionAdditional=new inventario_fisico_detalle_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesioninventario_fisico=false;
		$this->bigidinventario_fisicoActual=0;
		$this->bigidinventario_fisicoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionproducto=false;
		$this->bigidproductoActual=0;
		$this->bigidproductoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionbodega=false;
		$this->bigidbodegaActual=0;
		$this->bigidbodegaActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_inventario_fisico=-1;
 		$this->id_producto=-1;
 		$this->id_bodega=-1;
    }
}
?>
