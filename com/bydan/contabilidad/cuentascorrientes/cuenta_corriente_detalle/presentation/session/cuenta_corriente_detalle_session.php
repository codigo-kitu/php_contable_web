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

namespace com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_util;

class cuenta_corriente_detalle_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $cuenta_corriente_detalle_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesionempresa=null;
	public ?int $bigidempresaActual=null;
	public ?string $bigidempresaActualDescripcion=null;
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
	public ?bool $bitBusquedaDesdeFKSesioncliente=null;
	public ?int $bigidclienteActual=null;
	public ?string $bigidclienteActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionproveedor=null;
	public ?int $bigidproveedorActual=null;
	public ?string $bigidproveedorActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesiontabla=null;
	public ?int $bigidtablaActual=null;
	public ?string $bigidtablaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionestado=null;
	public ?int $bigidestadoActual=null;
	public ?string $bigidestadoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionasiento=null;
	public ?int $bigidasientoActual=null;
	public ?string $bigidasientoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncuenta_pagar=null;
	public ?int $bigidcuenta_pagarActual=null;
	public ?string $bigidcuenta_pagarActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncuenta_cobrar=null;
	public ?int $bigidcuenta_cobrarActual=null;
	public ?string $bigidcuenta_cobrarActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_empresa=-1;
	public int $id_ejercicio=-1;
	public int $id_periodo=-1;
	public int $id_usuario=-1;
	public int $id_cuenta_corriente=-1;
	public ?int $id_cliente=null;
	public ?int $id_proveedor=null;
	public int $id_tabla=-1;
	public int $id_estado=-1;
	public ?int $id_asiento=null;
	public ?int $id_cuenta_pagar=null;
	public ?int $id_cuenta_cobrar=null;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:none';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuenta_corriente_detalle_sessionAdditional=new cuenta_corriente_detalle_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesionempresa=false;
		$this->bigidempresaActual=0;
		$this->bigidempresaActualDescripcion='';
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
		$this->bitBusquedaDesdeFKSesioncliente=false;
		$this->bigidclienteActual=0;
		$this->bigidclienteActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionproveedor=false;
		$this->bigidproveedorActual=0;
		$this->bigidproveedorActualDescripcion='';
		$this->bitBusquedaDesdeFKSesiontabla=false;
		$this->bigidtablaActual=0;
		$this->bigidtablaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionestado=false;
		$this->bigidestadoActual=0;
		$this->bigidestadoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionasiento=false;
		$this->bigidasientoActual=0;
		$this->bigidasientoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncuenta_pagar=false;
		$this->bigidcuenta_pagarActual=0;
		$this->bigidcuenta_pagarActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncuenta_cobrar=false;
		$this->bigidcuenta_cobrarActual=0;
		$this->bigidcuenta_cobrarActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_empresa=-1;
 		$this->id_ejercicio=-1;
 		$this->id_periodo=-1;
 		$this->id_usuario=-1;
 		$this->id_cuenta_corriente=-1;
 		$this->id_cliente=null;
 		$this->id_proveedor=null;
 		$this->id_tabla=-1;
 		$this->id_estado=-1;
 		$this->id_asiento=null;
 		$this->id_cuenta_pagar=null;
 		$this->id_cuenta_cobrar=null;
    }
}
?>
