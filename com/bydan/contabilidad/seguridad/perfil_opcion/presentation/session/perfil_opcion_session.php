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

namespace com\bydan\contabilidad\seguridad\perfil_opcion\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_util;

class perfil_opcion_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $perfil_opcion_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesionperfil=null;
	public ?int $bigidperfilActual=null;
	public ?string $bigidperfilActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionopcion=null;
	public ?int $bigidopcionActual=null;
	public ?string $bigidopcionActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_perfil=-1;
	public int $id_opcion=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = perfil_opcion_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:none';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->perfil_opcion_sessionAdditional=new perfil_opcion_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesionperfil=false;
		$this->bigidperfilActual=0;
		$this->bigidperfilActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionopcion=false;
		$this->bigidopcionActual=0;
		$this->bigidopcionActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_perfil=-1;
 		$this->id_opcion=-1;
    }
}
?>
