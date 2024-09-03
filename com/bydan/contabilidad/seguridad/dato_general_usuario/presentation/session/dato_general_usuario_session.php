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

namespace com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_util;

class dato_general_usuario_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $dato_general_usuario_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesionusuario=null;
	public ?int $bigidusuarioActual=null;
	public ?string $bigidusuarioActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionpais=null;
	public ?int $bigidpaisActual=null;
	public ?string $bigidpaisActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionprovincia=null;
	public ?int $bigidprovinciaActual=null;
	public ?string $bigidprovinciaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionciudad=null;
	public ?int $bigidciudadActual=null;
	public ?string $bigidciudadActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=-1;
	public int $id_pais=-1;
	public int $id_provincia=-1;
	public int $id_ciudad=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = dato_general_usuario_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:none';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->dato_general_usuario_sessionAdditional=new dato_general_usuario_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesionusuario=false;
		$this->bigidusuarioActual=0;
		$this->bigidusuarioActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionpais=false;
		$this->bigidpaisActual=0;
		$this->bigidpaisActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionprovincia=false;
		$this->bigidprovinciaActual=0;
		$this->bigidprovinciaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionciudad=false;
		$this->bigidciudadActual=0;
		$this->bigidciudadActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_pais=-1;
 		$this->id_provincia=-1;
 		$this->id_ciudad=-1;
    }
}
?>
