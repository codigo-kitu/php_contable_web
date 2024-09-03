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

namespace com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

class cuenta_corriente_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $cuenta_corriente_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesionempresa=null;
	public ?int $bigidempresaActual=null;
	public ?string $bigidempresaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionusuario=null;
	public ?int $bigidusuarioActual=null;
	public ?string $bigidusuarioActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionbanco=null;
	public ?int $bigidbancoActual=null;
	public ?string $bigidbancoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncuenta=null;
	public ?int $bigidcuentaActual=null;
	public ?string $bigidcuentaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionestado_cuentas_corrientes=null;
	public ?int $bigidestado_cuentas_corrientesActual=null;
	public ?string $bigidestado_cuentas_corrientesActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_empresa=-1;
	public int $id_usuario=-1;
	public int $id_banco=-1;
	public ?int $id_cuenta=null;
	public int $id_estado_cuentas_corrientes=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = cuenta_corriente_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:table-row';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuenta_corriente_sessionAdditional=new cuenta_corriente_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesionempresa=false;
		$this->bigidempresaActual=0;
		$this->bigidempresaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionusuario=false;
		$this->bigidusuarioActual=0;
		$this->bigidusuarioActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionbanco=false;
		$this->bigidbancoActual=0;
		$this->bigidbancoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncuenta=false;
		$this->bigidcuentaActual=0;
		$this->bigidcuentaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionestado_cuentas_corrientes=false;
		$this->bigidestado_cuentas_corrientesActual=0;
		$this->bigidestado_cuentas_corrientesActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_empresa=-1;
 		$this->id_usuario=-1;
 		$this->id_banco=-1;
 		$this->id_cuenta=null;
 		$this->id_estado_cuentas_corrientes=-1;
    }
}
?>
