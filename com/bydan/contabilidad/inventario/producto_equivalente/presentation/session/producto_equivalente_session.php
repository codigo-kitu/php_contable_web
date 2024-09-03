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

namespace com\bydan\contabilidad\inventario\producto_equivalente\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\inventario\producto_equivalente\util\producto_equivalente_util;

class producto_equivalente_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $producto_equivalente_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesionproducto_principal=null;
	public ?int $bigidproducto_principalActual=null;
	public ?string $bigidproducto_principalActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionproducto_equivalente=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_producto_principal=-1;
	public int $id_producto_equivalente=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = producto_equivalente_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:table-row';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->producto_equivalente_sessionAdditional=new producto_equivalente_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesionproducto_principal=false;
		$this->bigidproducto_principalActual=0;
		$this->bigidproducto_principalActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionproducto_equivalente=false;
		$this->bigidproducto_equivalenteActual=0;
		$this->bigidproducto_equivalenteActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_producto_principal=-1;
 		$this->id_producto_equivalente=-1;
    }
}
?>
