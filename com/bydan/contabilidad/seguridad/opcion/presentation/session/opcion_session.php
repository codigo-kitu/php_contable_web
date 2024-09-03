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

namespace com\bydan\contabilidad\seguridad\opcion\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_util;

class opcion_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $opcion_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesionsistema=null;
	public ?int $bigidsistemaActual=null;
	public ?string $bigidsistemaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionopcion=null;
	public ?bool $bitBusquedaDesdeFKSesiongrupo_opcion=null;
	public ?int $bigidgrupo_opcionActual=null;
	public ?string $bigidgrupo_opcionActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionmodulo=null;
	public ?int $bigidmoduloActual=null;
	public ?string $bigidmoduloActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_sistema=-1;
	public ?int $id_opcion=null;
	public int $id_grupo_opcion=-1;
	public int $id_modulo=-1;
	public string $nombre='';
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = opcion_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:none';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->opcion_sessionAdditional=new opcion_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesionsistema=false;
		$this->bigidsistemaActual=0;
		$this->bigidsistemaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionopcion=false;
		$this->bigidopcionActual=0;
		$this->bigidopcionActualDescripcion='';
		$this->bitBusquedaDesdeFKSesiongrupo_opcion=false;
		$this->bigidgrupo_opcionActual=0;
		$this->bigidgrupo_opcionActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionmodulo=false;
		$this->bigidmoduloActual=0;
		$this->bigidmoduloActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_sistema=-1;
 		$this->id_opcion=null;
 		$this->id_grupo_opcion=-1;
 		$this->id_modulo=-1;
 		$this->nombre='';
    }
}
?>
