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

namespace com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_util;

class asiento_predefinido_detalle_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $asiento_predefinido_detalle_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesionasiento_predefinido=null;
	public ?int $bigidasiento_predefinidoActual=null;
	public ?string $bigidasiento_predefinidoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncuenta=null;
	public ?int $bigidcuentaActual=null;
	public ?string $bigidcuentaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncentro_costo=null;
	public ?int $bigidcentro_costoActual=null;
	public ?string $bigidcentro_costoActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_asiento_predefinido=-1;
	public int $id_cuenta=-1;
	public int $id_centro_costo=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = asiento_predefinido_detalle_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:none';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->asiento_predefinido_detalle_sessionAdditional=new asiento_predefinido_detalle_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesionasiento_predefinido=false;
		$this->bigidasiento_predefinidoActual=0;
		$this->bigidasiento_predefinidoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncuenta=false;
		$this->bigidcuentaActual=0;
		$this->bigidcuentaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncentro_costo=false;
		$this->bigidcentro_costoActual=0;
		$this->bigidcentro_costoActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_asiento_predefinido=-1;
 		$this->id_cuenta=-1;
 		$this->id_centro_costo=-1;
    }
}
?>
