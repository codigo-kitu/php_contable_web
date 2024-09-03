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

namespace com\bydan\contabilidad\cuentascobrar\cliente\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

class cliente_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $cliente_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesionempresa=null;
	public ?int $bigidempresaActual=null;
	public ?string $bigidempresaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesiontipo_persona=null;
	public ?int $bigidtipo_personaActual=null;
	public ?string $bigidtipo_personaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncategoria_cliente=null;
	public ?int $bigidcategoria_clienteActual=null;
	public ?string $bigidcategoria_clienteActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesiontipo_precio=null;
	public ?int $bigidtipo_precioActual=null;
	public ?string $bigidtipo_precioActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesiongiro_negocio_cliente=null;
	public ?int $bigidgiro_negocio_clienteActual=null;
	public ?string $bigidgiro_negocio_clienteActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionpais=null;
	public ?int $bigidpaisActual=null;
	public ?string $bigidpaisActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionprovincia=null;
	public ?int $bigidprovinciaActual=null;
	public ?string $bigidprovinciaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionciudad=null;
	public ?int $bigidciudadActual=null;
	public ?string $bigidciudadActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionvendedor=null;
	public ?int $bigidvendedorActual=null;
	public ?string $bigidvendedorActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesiontermino_pago_cliente=null;
	public ?int $bigidtermino_pago_clienteActual=null;
	public ?string $bigidtermino_pago_clienteActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncuenta=null;
	public ?int $bigidcuentaActual=null;
	public ?string $bigidcuentaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionimpuesto=null;
	public ?int $bigidimpuestoActual=null;
	public ?string $bigidimpuestoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionretencion=null;
	public ?int $bigidretencionActual=null;
	public ?string $bigidretencionActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionretencion_fuente=null;
	public ?int $bigidretencion_fuenteActual=null;
	public ?string $bigidretencion_fuenteActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionretencion_ica=null;
	public ?int $bigidretencion_icaActual=null;
	public ?string $bigidretencion_icaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionotro_impuesto=null;
	public ?int $bigidotro_impuestoActual=null;
	public ?string $bigidotro_impuestoActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_empresa=-1;
	public int $id_tipo_persona=-1;
	public int $id_categoria_cliente=-1;
	public int $id_tipo_precio=-1;
	public int $id_giro_negocio_cliente=-1;
	public int $id_pais=-1;
	public int $id_provincia=-1;
	public int $id_ciudad=-1;
	public int $id_vendedor=-1;
	public int $id_termino_pago_cliente=-1;
	public ?int $id_cuenta=null;
	public int $id_impuesto=-1;
	public ?int $id_retencion=null;
	public ?int $id_retencion_fuente=null;
	public ?int $id_retencion_ica=null;
	public ?int $id_otro_impuesto=null;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = cliente_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:none';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cliente_sessionAdditional=new cliente_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesionempresa=false;
		$this->bigidempresaActual=0;
		$this->bigidempresaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesiontipo_persona=false;
		$this->bigidtipo_personaActual=0;
		$this->bigidtipo_personaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncategoria_cliente=false;
		$this->bigidcategoria_clienteActual=0;
		$this->bigidcategoria_clienteActualDescripcion='';
		$this->bitBusquedaDesdeFKSesiontipo_precio=false;
		$this->bigidtipo_precioActual=0;
		$this->bigidtipo_precioActualDescripcion='';
		$this->bitBusquedaDesdeFKSesiongiro_negocio_cliente=false;
		$this->bigidgiro_negocio_clienteActual=0;
		$this->bigidgiro_negocio_clienteActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionpais=false;
		$this->bigidpaisActual=0;
		$this->bigidpaisActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionprovincia=false;
		$this->bigidprovinciaActual=0;
		$this->bigidprovinciaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionciudad=false;
		$this->bigidciudadActual=0;
		$this->bigidciudadActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionvendedor=false;
		$this->bigidvendedorActual=0;
		$this->bigidvendedorActualDescripcion='';
		$this->bitBusquedaDesdeFKSesiontermino_pago_cliente=false;
		$this->bigidtermino_pago_clienteActual=0;
		$this->bigidtermino_pago_clienteActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncuenta=false;
		$this->bigidcuentaActual=0;
		$this->bigidcuentaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionimpuesto=false;
		$this->bigidimpuestoActual=0;
		$this->bigidimpuestoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionretencion=false;
		$this->bigidretencionActual=0;
		$this->bigidretencionActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionretencion_fuente=false;
		$this->bigidretencion_fuenteActual=0;
		$this->bigidretencion_fuenteActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionretencion_ica=false;
		$this->bigidretencion_icaActual=0;
		$this->bigidretencion_icaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionotro_impuesto=false;
		$this->bigidotro_impuestoActual=0;
		$this->bigidotro_impuestoActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_empresa=-1;
 		$this->id_tipo_persona=-1;
 		$this->id_categoria_cliente=-1;
 		$this->id_tipo_precio=-1;
 		$this->id_giro_negocio_cliente=-1;
 		$this->id_pais=-1;
 		$this->id_provincia=-1;
 		$this->id_ciudad=-1;
 		$this->id_vendedor=-1;
 		$this->id_termino_pago_cliente=-1;
 		$this->id_cuenta=null;
 		$this->id_impuesto=-1;
 		$this->id_retencion=null;
 		$this->id_retencion_fuente=null;
 		$this->id_retencion_ica=null;
 		$this->id_otro_impuesto=null;
    }
}
?>
