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

namespace com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\util\cuenta_cobrar_detalle_util;

class cuenta_cobrar_detalle_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $cuenta_cobrar_detalle_sessionAdditional=null;
	
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
	public ?bool $bitBusquedaDesdeFKSesioncuenta_cobrar=null;
	public ?int $bigidcuenta_cobrarActual=null;
	public ?string $bigidcuenta_cobrarActualDescripcion=null;
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
	public int $id_cuenta_cobrar=-1;
	public int $id_estado=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:none';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuenta_cobrar_detalle_sessionAdditional=new cuenta_cobrar_detalle_sessionAdditional();
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
		$this->bitBusquedaDesdeFKSesioncuenta_cobrar=false;
		$this->bigidcuenta_cobrarActual=0;
		$this->bigidcuenta_cobrarActualDescripcion='';
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
 		$this->id_cuenta_cobrar=-1;
 		$this->id_estado=-1;
    }
}
?>
