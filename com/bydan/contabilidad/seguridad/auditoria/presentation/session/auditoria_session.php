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

namespace com\bydan\contabilidad\seguridad\auditoria\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_util;

class auditoria_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $auditoria_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesionusuario=null;
	public ?int $bigidusuarioActual=null;
	public ?string $bigidusuarioActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_usuario=-1;
	public string $nombre_tabla='';
	public string $proceso='';
	public string $nombre_pc='';
	public string $ip_pc='';
	public string $usuario_pc='';
	public string $fecha_hora='';
	public ?string $fecha_horaFinal=null;
	public string $observacion='';
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = auditoria_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:none';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->auditoria_sessionAdditional=new auditoria_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesionusuario=false;
		$this->bigidusuarioActual=0;
		$this->bigidusuarioActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_usuario=-1;
 		$this->nombre_tabla='';
 		$this->proceso='';
 		$this->nombre_pc='';
 		$this->ip_pc='';
 		$this->usuario_pc='';
 		$this->fecha_hora=date('Y-m-d');
		$this->fecha_horaFinal=date('Y-m-d');
 		$this->observacion='';
    }
}
?>
