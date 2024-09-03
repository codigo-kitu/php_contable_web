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

namespace com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

class termino_pago_cliente_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $termino_pago_cliente_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesionempresa=null;
	public ?int $bigidempresaActual=null;
	public ?string $bigidempresaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesiontipo_termino_pago=null;
	public ?int $bigidtipo_termino_pagoActual=null;
	public ?string $bigidtipo_termino_pagoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncuenta=null;
	public ?int $bigidcuentaActual=null;
	public ?string $bigidcuentaActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_empresa=-1;
	public int $id_tipo_termino_pago=-1;
	public int $id_cuenta=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = termino_pago_cliente_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:table-row';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->termino_pago_cliente_sessionAdditional=new termino_pago_cliente_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesionempresa=false;
		$this->bigidempresaActual=0;
		$this->bigidempresaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesiontipo_termino_pago=false;
		$this->bigidtipo_termino_pagoActual=0;
		$this->bigidtipo_termino_pagoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncuenta=false;
		$this->bigidcuentaActual=0;
		$this->bigidcuentaActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_empresa=-1;
 		$this->id_tipo_termino_pago=-1;
 		$this->id_cuenta=-1;
    }
}
?>
