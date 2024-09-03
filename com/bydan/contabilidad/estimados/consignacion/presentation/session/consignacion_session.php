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

namespace com\bydan\contabilidad\estimados\consignacion\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;

class consignacion_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $consignacion_sessionAdditional=null;
	
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
	public ?bool $bitBusquedaDesdeFKSesioncliente=null;
	public ?int $bigidclienteActual=null;
	public ?string $bigidclienteActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionvendedor=null;
	public ?int $bigidvendedorActual=null;
	public ?string $bigidvendedorActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesiontermino_pago_cliente=null;
	public ?int $bigidtermino_pago_clienteActual=null;
	public ?string $bigidtermino_pago_clienteActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionmoneda=null;
	public ?int $bigidmonedaActual=null;
	public ?string $bigidmonedaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionestado=null;
	public ?int $bigidestadoActual=null;
	public ?string $bigidestadoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionkardex=null;
	public ?int $bigidkardexActual=null;
	public ?string $bigidkardexActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionasiento=null;
	public ?int $bigidasientoActual=null;
	public ?string $bigidasientoActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_empresa=-1;
	public int $id_sucursal=-1;
	public int $id_ejercicio=-1;
	public int $id_periodo=-1;
	public int $id_usuario=-1;
	public int $id_cliente=-1;
	public int $id_vendedor=-1;
	public int $id_termino_pago_cliente=-1;
	public int $id_moneda=-1;
	public int $id_estado=-1;
	public ?int $id_kardex=null;
	public ?int $id_asiento=null;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = consignacion_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:table-row';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->consignacion_sessionAdditional=new consignacion_sessionAdditional();
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
		$this->bitBusquedaDesdeFKSesioncliente=false;
		$this->bigidclienteActual=0;
		$this->bigidclienteActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionvendedor=false;
		$this->bigidvendedorActual=0;
		$this->bigidvendedorActualDescripcion='';
		$this->bitBusquedaDesdeFKSesiontermino_pago_cliente=false;
		$this->bigidtermino_pago_clienteActual=0;
		$this->bigidtermino_pago_clienteActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionmoneda=false;
		$this->bigidmonedaActual=0;
		$this->bigidmonedaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionestado=false;
		$this->bigidestadoActual=0;
		$this->bigidestadoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionkardex=false;
		$this->bigidkardexActual=0;
		$this->bigidkardexActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionasiento=false;
		$this->bigidasientoActual=0;
		$this->bigidasientoActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_empresa=-1;
 		$this->id_sucursal=-1;
 		$this->id_ejercicio=-1;
 		$this->id_periodo=-1;
 		$this->id_usuario=-1;
 		$this->id_cliente=-1;
 		$this->id_vendedor=-1;
 		$this->id_termino_pago_cliente=-1;
 		$this->id_moneda=-1;
 		$this->id_estado=-1;
 		$this->id_kardex=null;
 		$this->id_asiento=null;
    }
}
?>
