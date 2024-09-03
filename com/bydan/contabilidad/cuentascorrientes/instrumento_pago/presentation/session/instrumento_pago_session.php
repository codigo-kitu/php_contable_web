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

namespace com\bydan\contabilidad\cuentascorrientes\instrumento_pago\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\util\instrumento_pago_util;

class instrumento_pago_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $instrumento_pago_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesioncuenta_compras=null;
	public ?int $bigidcuenta_comprasActual=null;
	public ?string $bigidcuenta_comprasActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncuenta_ventas=null;
	public ?int $bigidcuenta_ventasActual=null;
	public ?string $bigidcuenta_ventasActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncuenta_corriente=null;
	public ?int $bigidcuenta_corrienteActual=null;
	public ?string $bigidcuenta_corrienteActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_cuenta_compras=-1;
	public int $id_cuenta_ventas=-1;
	public int $id_cuenta_corriente=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = instrumento_pago_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:none';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->instrumento_pago_sessionAdditional=new instrumento_pago_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesioncuenta_compras=false;
		$this->bigidcuenta_comprasActual=0;
		$this->bigidcuenta_comprasActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncuenta_ventas=false;
		$this->bigidcuenta_ventasActual=0;
		$this->bigidcuenta_ventasActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncuenta_corriente=false;
		$this->bigidcuenta_corrienteActual=0;
		$this->bigidcuenta_corrienteActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_cuenta_compras=-1;
 		$this->id_cuenta_ventas=-1;
 		$this->id_cuenta_corriente=-1;
    }
}
?>
