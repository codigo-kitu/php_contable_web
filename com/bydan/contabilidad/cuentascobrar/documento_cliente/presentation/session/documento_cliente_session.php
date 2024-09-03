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

namespace com\bydan\contabilidad\cuentascobrar\documento_cliente\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_util;

class documento_cliente_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $documento_cliente_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesiondocumento_proveedor=null;
	public ?int $bigiddocumento_proveedorActual=null;
	public ?string $bigiddocumento_proveedorActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncliente=null;
	public ?int $bigidclienteActual=null;
	public ?string $bigidclienteActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_documento_proveedor=-1;
	public int $id_cliente=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = documento_cliente_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:none';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->documento_cliente_sessionAdditional=new documento_cliente_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesiondocumento_proveedor=false;
		$this->bigiddocumento_proveedorActual=0;
		$this->bigiddocumento_proveedorActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncliente=false;
		$this->bigidclienteActual=0;
		$this->bigidclienteActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_documento_proveedor=-1;
 		$this->id_cliente=-1;
    }
}
?>
