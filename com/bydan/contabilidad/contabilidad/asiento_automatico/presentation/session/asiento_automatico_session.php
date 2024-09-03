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

namespace com\bydan\contabilidad\contabilidad\asiento_automatico\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_util;

class asiento_automatico_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $asiento_automatico_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesionempresa=null;
	public ?int $bigidempresaActual=null;
	public ?string $bigidempresaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionmodulo=null;
	public ?int $bigidmoduloActual=null;
	public ?string $bigidmoduloActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionfuente=null;
	public ?int $bigidfuenteActual=null;
	public ?string $bigidfuenteActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionlibro_auxiliar=null;
	public ?int $bigidlibro_auxiliarActual=null;
	public ?string $bigidlibro_auxiliarActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncentro_costo=null;
	public ?int $bigidcentro_costoActual=null;
	public ?string $bigidcentro_costoActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_empresa=-1;
	public int $id_modulo=-1;
	public int $id_fuente=-1;
	public int $id_libro_auxiliar=-1;
	public int $id_centro_costo=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = asiento_automatico_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:none';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->asiento_automatico_sessionAdditional=new asiento_automatico_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesionempresa=false;
		$this->bigidempresaActual=0;
		$this->bigidempresaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionmodulo=false;
		$this->bigidmoduloActual=0;
		$this->bigidmoduloActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionfuente=false;
		$this->bigidfuenteActual=0;
		$this->bigidfuenteActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionlibro_auxiliar=false;
		$this->bigidlibro_auxiliarActual=0;
		$this->bigidlibro_auxiliarActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncentro_costo=false;
		$this->bigidcentro_costoActual=0;
		$this->bigidcentro_costoActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_empresa=-1;
 		$this->id_modulo=-1;
 		$this->id_fuente=-1;
 		$this->id_libro_auxiliar=-1;
 		$this->id_centro_costo=-1;
    }
}
?>
