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

namespace com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_util;

class cheque_cuenta_corriente_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $cheque_cuenta_corriente_sessionAdditional=null;
	
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
	public ?bool $bitBusquedaDesdeFKSesioncuenta_corriente=null;
	public ?int $bigidcuenta_corrienteActual=null;
	public ?string $bigidcuenta_corrienteActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncategoria_cheque=null;
	public ?int $bigidcategoria_chequeActual=null;
	public ?string $bigidcategoria_chequeActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncliente=null;
	public ?int $bigidclienteActual=null;
	public ?string $bigidclienteActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionproveedor=null;
	public ?int $bigidproveedorActual=null;
	public ?string $bigidproveedorActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionbeneficiario_ocacional_cheque=null;
	public ?int $bigidbeneficiario_ocacional_chequeActual=null;
	public ?string $bigidbeneficiario_ocacional_chequeActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionestado_deposito_retiro=null;
	public ?int $bigidestado_deposito_retiroActual=null;
	public ?string $bigidestado_deposito_retiroActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_empresa=-1;
	public int $id_sucursal=-1;
	public int $id_ejercicio=-1;
	public int $id_periodo=-1;
	public int $id_usuario=-1;
	public int $id_cuenta_corriente=-1;
	public int $id_categoria_cheque=-1;
	public ?int $id_cliente=null;
	public ?int $id_proveedor=null;
	public ?int $id_beneficiario_ocacional_cheque=null;
	public int $id_estado_deposito_retiro=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:none';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cheque_cuenta_corriente_sessionAdditional=new cheque_cuenta_corriente_sessionAdditional();
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
		$this->bitBusquedaDesdeFKSesioncuenta_corriente=false;
		$this->bigidcuenta_corrienteActual=0;
		$this->bigidcuenta_corrienteActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncategoria_cheque=false;
		$this->bigidcategoria_chequeActual=0;
		$this->bigidcategoria_chequeActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncliente=false;
		$this->bigidclienteActual=0;
		$this->bigidclienteActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionproveedor=false;
		$this->bigidproveedorActual=0;
		$this->bigidproveedorActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionbeneficiario_ocacional_cheque=false;
		$this->bigidbeneficiario_ocacional_chequeActual=0;
		$this->bigidbeneficiario_ocacional_chequeActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionestado_deposito_retiro=false;
		$this->bigidestado_deposito_retiroActual=0;
		$this->bigidestado_deposito_retiroActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_empresa=-1;
 		$this->id_sucursal=-1;
 		$this->id_ejercicio=-1;
 		$this->id_periodo=-1;
 		$this->id_usuario=-1;
 		$this->id_cuenta_corriente=-1;
 		$this->id_categoria_cheque=-1;
 		$this->id_cliente=null;
 		$this->id_proveedor=null;
 		$this->id_beneficiario_ocacional_cheque=null;
 		$this->id_estado_deposito_retiro=-1;
    }
}
?>
