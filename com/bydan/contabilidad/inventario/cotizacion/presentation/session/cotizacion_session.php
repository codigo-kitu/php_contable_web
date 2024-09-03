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

namespace com\bydan\contabilidad\inventario\cotizacion\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_util;

class cotizacion_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $cotizacion_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesionempresa=null;
	public ?int $bigidempresaActual=null;
	public ?string $bigidempresaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionsucursal=null;
	public ?int $bigidsucursalActual=null;
	public ?string $bigidsucursalActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionejercicio=null;
	public ?int $bigidejercicioActual=null;
	public ?string $bigidejercicioActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionperiodo=null;
	public ?int $bigidperiodoActual=null;
	public ?string $bigidperiodoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionusuario=null;
	public ?int $bigidusuarioActual=null;
	public ?string $bigidusuarioActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionproveedor=null;
	public ?int $bigidproveedorActual=null;
	public ?string $bigidproveedorActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionvendedor=null;
	public ?int $bigidvendedorActual=null;
	public ?string $bigidvendedorActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesiontermino_pago_proveedor=null;
	public ?int $bigidtermino_pago_proveedorActual=null;
	public ?string $bigidtermino_pago_proveedorActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionmoneda=null;
	public ?int $bigidmonedaActual=null;
	public ?string $bigidmonedaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionestado=null;
	public ?int $bigidestadoActual=null;
	public ?string $bigidestadoActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_empresa=-1;
	public int $id_sucursal=-1;
	public int $id_ejercicio=-1;
	public int $id_periodo=-1;
	public int $id_usuario=-1;
	public int $id_proveedor=-1;
	public int $id_vendedor=-1;
	public int $id_termino_pago_proveedor=-1;
	public int $id_moneda=-1;
	public int $id_estado=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = cotizacion_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:table-row';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cotizacion_sessionAdditional=new cotizacion_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesionempresa=false;
		$this->bigidempresaActual=0;
		$this->bigidempresaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionsucursal=false;
		$this->bigidsucursalActual=0;
		$this->bigidsucursalActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionejercicio=false;
		$this->bigidejercicioActual=0;
		$this->bigidejercicioActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionperiodo=false;
		$this->bigidperiodoActual=0;
		$this->bigidperiodoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionusuario=false;
		$this->bigidusuarioActual=0;
		$this->bigidusuarioActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionproveedor=false;
		$this->bigidproveedorActual=0;
		$this->bigidproveedorActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionvendedor=false;
		$this->bigidvendedorActual=0;
		$this->bigidvendedorActualDescripcion='';
		$this->bitBusquedaDesdeFKSesiontermino_pago_proveedor=false;
		$this->bigidtermino_pago_proveedorActual=0;
		$this->bigidtermino_pago_proveedorActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionmoneda=false;
		$this->bigidmonedaActual=0;
		$this->bigidmonedaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionestado=false;
		$this->bigidestadoActual=0;
		$this->bigidestadoActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_empresa=-1;
 		$this->id_sucursal=-1;
 		$this->id_ejercicio=-1;
 		$this->id_periodo=-1;
 		$this->id_usuario=-1;
 		$this->id_proveedor=-1;
 		$this->id_vendedor=-1;
 		$this->id_termino_pago_proveedor=-1;
 		$this->id_moneda=-1;
 		$this->id_estado=-1;
    }
}
?>
