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

namespace com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_util;

class clasificacion_cheque_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $clasificacion_cheque_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesioncuenta_corriente_detalle=null;
	public ?int $bigidcuenta_corriente_detalleActual=null;
	public ?string $bigidcuenta_corriente_detalleActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncategoria_cheque=null;
	public ?int $bigidcategoria_chequeActual=null;
	public ?string $bigidcategoria_chequeActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_cuenta_corriente_detalle=-1;
	public int $id_categoria_cheque=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = clasificacion_cheque_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:none';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->clasificacion_cheque_sessionAdditional=new clasificacion_cheque_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesioncuenta_corriente_detalle=false;
		$this->bigidcuenta_corriente_detalleActual=0;
		$this->bigidcuenta_corriente_detalleActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncategoria_cheque=false;
		$this->bigidcategoria_chequeActual=0;
		$this->bigidcategoria_chequeActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_cuenta_corriente_detalle=-1;
 		$this->id_categoria_cheque=-1;
    }
}
?>
