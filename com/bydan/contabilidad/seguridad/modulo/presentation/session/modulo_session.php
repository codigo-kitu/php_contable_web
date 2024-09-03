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

namespace com\bydan\contabilidad\seguridad\modulo\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;

class modulo_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $modulo_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesionsistema=null;
	public ?int $bigidsistemaActual=null;
	public ?string $bigidsistemaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionpaquete=null;
	public ?int $bigidpaqueteActual=null;
	public ?string $bigidpaqueteActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesiontipo_tecla_mascara=null;
	public ?int $bigidtipo_tecla_mascaraActual=null;
	public ?string $bigidtipo_tecla_mascaraActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_sistema=-1;
	public int $id_paquete=-1;
	public int $id_tipo_tecla_mascara=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = modulo_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:none';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->modulo_sessionAdditional=new modulo_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesionsistema=false;
		$this->bigidsistemaActual=0;
		$this->bigidsistemaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionpaquete=false;
		$this->bigidpaqueteActual=0;
		$this->bigidpaqueteActualDescripcion='';
		$this->bitBusquedaDesdeFKSesiontipo_tecla_mascara=false;
		$this->bigidtipo_tecla_mascaraActual=0;
		$this->bigidtipo_tecla_mascaraActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_sistema=-1;
 		$this->id_paquete=-1;
 		$this->id_tipo_tecla_mascara=-1;
    }
}
?>
