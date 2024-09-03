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

namespace com\bydan\contabilidad\facturacion\retencion\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_util;

class retencion_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $retencion_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesionempresa=null;
	public ?int $bigidempresaActual=null;
	public ?string $bigidempresaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncuenta_ventas=null;
	public ?int $bigidcuenta_ventasActual=null;
	public ?string $bigidcuenta_ventasActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncuenta_compras=null;
	public ?int $bigidcuenta_comprasActual=null;
	public ?string $bigidcuenta_comprasActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_empresa=-1;
	public ?int $id_cuenta_ventas=null;
	public ?int $id_cuenta_compras=null;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = retencion_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:table-row';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->retencion_sessionAdditional=new retencion_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesionempresa=false;
		$this->bigidempresaActual=0;
		$this->bigidempresaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncuenta_ventas=false;
		$this->bigidcuenta_ventasActual=0;
		$this->bigidcuenta_ventasActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncuenta_compras=false;
		$this->bigidcuenta_comprasActual=0;
		$this->bigidcuenta_comprasActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_empresa=-1;
 		$this->id_cuenta_ventas=null;
 		$this->id_cuenta_compras=null;
    }
}
?>
