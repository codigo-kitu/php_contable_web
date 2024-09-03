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

namespace com\bydan\contabilidad\contabilidad\asiento\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

class asiento_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $asiento_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesionempresa=null;
	public ?int $bigidempresaActual=null;
	public ?string $bigidempresaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionsucursal=null;
	public ?int $bigidsucursalActual=null;
	public ?string $bigidsucursalActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionejercicio=null;
	public ?int $bigidejercicioActual=null;
	public ?string $bigidejercicioActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionperiodo=null;
	public ?int $bigidperiodoActual=null;
	public ?string $bigidperiodoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionusuario=null;
	public ?int $bigidusuarioActual=null;
	public ?string $bigidusuarioActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionasiento_predefinido=null;
	public ?int $bigidasiento_predefinidoActual=null;
	public ?string $bigidasiento_predefinidoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesiondocumento_contable=null;
	public ?int $bigiddocumento_contableActual=null;
	public ?string $bigiddocumento_contableActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionlibro_auxiliar=null;
	public ?int $bigidlibro_auxiliarActual=null;
	public ?string $bigidlibro_auxiliarActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionfuente=null;
	public ?int $bigidfuenteActual=null;
	public ?string $bigidfuenteActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncentro_costo=null;
	public ?int $bigidcentro_costoActual=null;
	public ?string $bigidcentro_costoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionestado=null;
	public ?int $bigidestadoActual=null;
	public ?string $bigidestadoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesiondocumento_contable_origen=null;
	public ?int $bigiddocumento_contable_origenActual=null;
	public ?string $bigiddocumento_contable_origenActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_empresa=-1;
	public int $id_sucursal=-1;
	public int $id_ejercicio=-1;
	public int $id_periodo=-1;
	public int $id_usuario=-1;
	public ?int $id_asiento_predefinido=null;
	public int $id_documento_contable=-1;
	public int $id_libro_auxiliar=-1;
	public int $id_fuente=-1;
	public int $id_centro_costo=-1;
	public int $id_estado=-1;
	public ?int $id_documento_contable_origen=null;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = asiento_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:none';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->asiento_sessionAdditional=new asiento_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesionempresa=false;
		$this->bigidempresaActual=0;
		$this->bigidempresaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionsucursal=false;
		$this->bigidsucursalActual=0;
		$this->bigidsucursalActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionejercicio=false;
		$this->bigidejercicioActual=0;
		$this->bigidejercicioActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionperiodo=false;
		$this->bigidperiodoActual=0;
		$this->bigidperiodoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionusuario=false;
		$this->bigidusuarioActual=0;
		$this->bigidusuarioActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionasiento_predefinido=false;
		$this->bigidasiento_predefinidoActual=0;
		$this->bigidasiento_predefinidoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesiondocumento_contable=false;
		$this->bigiddocumento_contableActual=0;
		$this->bigiddocumento_contableActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionlibro_auxiliar=false;
		$this->bigidlibro_auxiliarActual=0;
		$this->bigidlibro_auxiliarActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionfuente=false;
		$this->bigidfuenteActual=0;
		$this->bigidfuenteActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncentro_costo=false;
		$this->bigidcentro_costoActual=0;
		$this->bigidcentro_costoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionestado=false;
		$this->bigidestadoActual=0;
		$this->bigidestadoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesiondocumento_contable_origen=false;
		$this->bigiddocumento_contable_origenActual=0;
		$this->bigiddocumento_contable_origenActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_empresa=-1;
 		$this->id_sucursal=-1;
 		$this->id_ejercicio=-1;
 		$this->id_periodo=-1;
 		$this->id_usuario=-1;
 		$this->id_asiento_predefinido=null;
 		$this->id_documento_contable=-1;
 		$this->id_libro_auxiliar=-1;
 		$this->id_fuente=-1;
 		$this->id_centro_costo=-1;
 		$this->id_estado=-1;
 		$this->id_documento_contable_origen=null;
    }
}
?>
