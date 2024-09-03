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

namespace com\bydan\contabilidad\contabilidad\saldo_cuenta\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_util;

class saldo_cuenta_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $saldo_cuenta_sessionAdditional=null;
	
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
	public ?bool $bitBusquedaDesdeFKSesiontipo_cuenta=null;
	public ?int $bigidtipo_cuentaActual=null;
	public ?string $bigidtipo_cuentaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncuenta=null;
	public ?int $bigidcuentaActual=null;
	public ?string $bigidcuentaActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_empresa=-1;
	public int $id_ejercicio=-1;
	public int $id_periodo=-1;
	public int $id_tipo_cuenta=-1;
	public int $id_cuenta=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = saldo_cuenta_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:table-row';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->saldo_cuenta_sessionAdditional=new saldo_cuenta_sessionAdditional();
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
		$this->bitBusquedaDesdeFKSesiontipo_cuenta=false;
		$this->bigidtipo_cuentaActual=0;
		$this->bigidtipo_cuentaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncuenta=false;
		$this->bigidcuentaActual=0;
		$this->bigidcuentaActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_empresa=-1;
 		$this->id_ejercicio=-1;
 		$this->id_periodo=-1;
 		$this->id_tipo_cuenta=-1;
 		$this->id_cuenta=-1;
    }
}
?>
