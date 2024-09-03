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

namespace com\bydan\contabilidad\estimados\imagen_estimado\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\estimados\imagen_estimado\util\imagen_estimado_util;

class imagen_estimado_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $imagen_estimado_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesionestimado=null;
	public ?int $bigidestimadoActual=null;
	public ?string $bigidestimadoActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_estimado=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = imagen_estimado_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:table-row';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->imagen_estimado_sessionAdditional=new imagen_estimado_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesionestimado=false;
		$this->bigidestimadoActual=0;
		$this->bigidestimadoActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_estimado=-1;
    }
}
?>
