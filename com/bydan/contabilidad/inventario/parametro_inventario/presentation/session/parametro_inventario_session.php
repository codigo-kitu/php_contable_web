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

namespace com\bydan\contabilidad\inventario\parametro_inventario\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_util;

class parametro_inventario_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $parametro_inventario_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesionempresa=null;
	public ?int $bigidempresaActual=null;
	public ?string $bigidempresaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesiontermino_pago_proveedor=null;
	public ?int $bigidtermino_pago_proveedorActual=null;
	public ?string $bigidtermino_pago_proveedorActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesiontipo_costeo_kardex=null;
	public ?int $bigidtipo_costeo_kardexActual=null;
	public ?string $bigidtipo_costeo_kardexActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesiontipo_kardex=null;
	public ?int $bigidtipo_kardexActual=null;
	public ?string $bigidtipo_kardexActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_empresa=-1;
	public int $id_termino_pago_proveedor=-1;
	public int $id_tipo_costeo_kardex=-1;
	public int $id_tipo_kardex=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = parametro_inventario_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:table-row';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_inventario_sessionAdditional=new parametro_inventario_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesionempresa=false;
		$this->bigidempresaActual=0;
		$this->bigidempresaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesiontermino_pago_proveedor=false;
		$this->bigidtermino_pago_proveedorActual=0;
		$this->bigidtermino_pago_proveedorActualDescripcion='';
		$this->bitBusquedaDesdeFKSesiontipo_costeo_kardex=false;
		$this->bigidtipo_costeo_kardexActual=0;
		$this->bigidtipo_costeo_kardexActualDescripcion='';
		$this->bitBusquedaDesdeFKSesiontipo_kardex=false;
		$this->bigidtipo_kardexActual=0;
		$this->bigidtipo_kardexActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_empresa=-1;
 		$this->id_termino_pago_proveedor=-1;
 		$this->id_tipo_costeo_kardex=-1;
 		$this->id_tipo_kardex=-1;
    }
}
?>
