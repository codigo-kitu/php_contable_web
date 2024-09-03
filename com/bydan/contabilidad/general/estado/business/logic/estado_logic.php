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

namespace com\bydan\contabilidad\general\estado\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_param_return;


use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\ParameterDbType;



use com\bydan\framework\contabilidad\util\PaqueteTipo;
use com\bydan\framework\contabilidad\util\DeepLoadType;
use com\bydan\framework\contabilidad\util\EventoTipo;
use com\bydan\framework\contabilidad\util\EventoSubTipo;
use com\bydan\framework\contabilidad\util\ControlTipo;
use com\bydan\framework\contabilidad\util\EventoGlobalTipo;
use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMinimo;
use com\bydan\framework\contabilidad\business\logic\DatosCliente;
use com\bydan\framework\contabilidad\business\logic\DatosDeep;
use com\bydan\framework\contabilidad\business\logic\Pagination;
use com\bydan\framework\contabilidad\business\logic\QueryWhereSelectParameters;

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;
use com\bydan\contabilidad\seguridad\auditoria\business\entity\auditoria;

use com\bydan\contabilidad\general\estado\util\estado_util;
use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\data\estado_data;

//FK


//REL


use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\entity\cuenta_corriente_detalle;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\data\cuenta_corriente_detalle_data;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\logic\cuenta_corriente_detalle_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_util;

use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\business\entity\credito_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\business\data\credito_cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\business\logic\credito_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\util\credito_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\util\credito_cuenta_cobrar_util;

use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\business\entity\pago_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\business\data\pago_cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\business\logic\pago_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\util\pago_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\util\pago_cuenta_cobrar_util;

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\business\entity\cuenta_cobrar_detalle;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\business\data\cuenta_cobrar_detalle_data;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\business\logic\cuenta_cobrar_detalle_logic;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\util\cuenta_cobrar_detalle_carga;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\util\cuenta_cobrar_detalle_util;

use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;
use com\bydan\contabilidad\inventario\kardex\business\data\kardex_data;
use com\bydan\contabilidad\inventario\kardex\business\logic\kardex_logic;
use com\bydan\contabilidad\inventario\kardex\util\kardex_carga;
use com\bydan\contabilidad\inventario\kardex\util\kardex_util;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\business\entity\cuenta_pagar_detalle;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\business\data\cuenta_pagar_detalle_data;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\business\logic\cuenta_pagar_detalle_logic;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\util\cuenta_pagar_detalle_carga;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\util\cuenta_pagar_detalle_util;

use com\bydan\contabilidad\inventario\devolucion\business\entity\devolucion;
use com\bydan\contabilidad\inventario\devolucion\business\data\devolucion_data;
use com\bydan\contabilidad\inventario\devolucion\business\logic\devolucion_logic;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_carga;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_util;

use com\bydan\contabilidad\facturacion\devolucion_factura\business\entity\devolucion_factura;
use com\bydan\contabilidad\facturacion\devolucion_factura\business\data\devolucion_factura_data;
use com\bydan\contabilidad\facturacion\devolucion_factura\business\logic\devolucion_factura_logic;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;

use com\bydan\contabilidad\facturacion\factura\business\entity\factura;
use com\bydan\contabilidad\facturacion\factura\business\data\factura_data;
use com\bydan\contabilidad\facturacion\factura\business\logic\factura_logic;
use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;

use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\business\entity\debito_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\business\data\debito_cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\business\logic\debito_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util\debito_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util\debito_cuenta_cobrar_util;

use com\bydan\contabilidad\estimados\consignacion\business\entity\consignacion;
use com\bydan\contabilidad\estimados\consignacion\business\data\consignacion_data;
use com\bydan\contabilidad\estimados\consignacion\business\logic\consignacion_logic;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_carga;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;

use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\entity\pago_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\data\pago_cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\logic\pago_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_util;

use com\bydan\contabilidad\facturacion\factura_lote\business\entity\factura_lote;
use com\bydan\contabilidad\facturacion\factura_lote\business\data\factura_lote_data;
use com\bydan\contabilidad\facturacion\factura_lote\business\logic\factura_lote_logic;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_carga;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;

use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\business\entity\debito_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\business\data\debito_cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\business\logic\debito_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_util;

use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;
use com\bydan\contabilidad\inventario\orden_compra\business\data\orden_compra_data;
use com\bydan\contabilidad\inventario\orden_compra\business\logic\orden_compra_logic;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;

use com\bydan\contabilidad\estimados\estimado\business\entity\estimado;
use com\bydan\contabilidad\estimados\estimado\business\data\estimado_data;
use com\bydan\contabilidad\estimados\estimado\business\logic\estimado_logic;
use com\bydan\contabilidad\estimados\estimado\util\estimado_carga;
use com\bydan\contabilidad\estimados\estimado\util\estimado_util;

use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\business\entity\credito_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\business\data\credito_cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\business\logic\credito_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_util;

use com\bydan\contabilidad\inventario\cotizacion\business\entity\cotizacion;
use com\bydan\contabilidad\inventario\cotizacion\business\data\cotizacion_data;
use com\bydan\contabilidad\inventario\cotizacion\business\logic\cotizacion_logic;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_carga;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_util;

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\data\asiento_data;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

//REL DETALLES

use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\logic\clasificacion_cheque_logic;
use com\bydan\contabilidad\inventario\kardex_detalle\util\kardex_detalle_carga;
use com\bydan\contabilidad\inventario\kardex_detalle\business\logic\kardex_detalle_logic;
use com\bydan\contabilidad\inventario\devolucion_detalle\util\devolucion_detalle_carga;
use com\bydan\contabilidad\inventario\devolucion_detalle\business\logic\devolucion_detalle_logic;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\util\devolucion_factura_detalle_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\business\logic\devolucion_factura_detalle_logic;
use com\bydan\contabilidad\facturacion\factura_detalle\util\factura_detalle_carga;
use com\bydan\contabilidad\facturacion\factura_detalle\business\logic\factura_detalle_logic;



class estado_logic  extends GeneralEntityLogic implements estado_logicI {	
	/*GENERAL*/
	public estado_data $estadoDataAccess;
	public ?estado_logic_add $estadoLogicAdditional=null;
	public ?estado $estado;
	public array $estados;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->estadoDataAccess = new estado_data();			
			$this->estados = array();
			$this->estado = new estado();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->estadoLogicAdditional = new estado_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->estadoLogicAdditional==null) {
			$this->estadoLogicAdditional=new estado_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->estadoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
			$this->connexion->getConnection()->commit();
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function executeQuery(string $sQueryExecute) {
		try {			
			$this->estadoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->estadoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
			$this->connexion->getConnection()->commit();							
			return $valor;	
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();			
		}
	}
	
	public function executeQueryValor(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$valor=$this->estadoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->estados = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estados=$this->estadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_util::refrescarFKDescripciones($this->estados);
			}
			
			estado_logic_add::checkestadoToGets($this->estados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estados);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->estados = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estados=$this->estadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_util::refrescarFKDescripciones($this->estados);
			}
			
			estado_logic_add::checkestadoToGets($this->estados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estados);
			$this->connexion->getConnection()->commit();						
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();								
			Funciones::logShowExceptionMessages($e);
			throw $e;			      	
		} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*TRAER UN OBJETO*/
	public function getEntityWithConnection(?int $id)  {
		$this->estado = new estado();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->estado=$this->estadoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->estado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estado_util::refrescarFKDescripcion($this->estado);
			}
						
			estado_logic_add::checkestadoToGet($this->estado,$this->datosCliente);
			estado_logic_add::updateestadoToGet($this->estado);
			$this->connexion->getConnection()->commit();								
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function getEntity(?int $id)  {
		$this->estado = new  estado();
		  		  
        try {		
			$this->estado=$this->estadoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->estado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estado_util::refrescarFKDescripcion($this->estado);
			}
			
			estado_logic_add::checkestadoToGet($this->estado,$this->datosCliente);
			estado_logic_add::updateestadoToGet($this->estado);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?estado {
		$estadoLogic = new  estado_logic();
		  		  
        try {		
			$estadoLogic->setConnexion($connexion);			
			$estadoLogic->getEntity($id);			
			return $estadoLogic->getestado();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->estado = new  estado();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->estado=$this->estadoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->estado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estado_util::refrescarFKDescripcion($this->estado);
			}
			
			estado_logic_add::checkestadoToGet($this->estado,$this->datosCliente);
			estado_logic_add::updateestadoToGet($this->estado);
			$this->connexion->getConnection()->commit();								
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function getEntityWithFinalQuery(string $strFinalQuery='')  {
		$this->estado = new  estado();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estado=$this->estadoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->estado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estado_util::refrescarFKDescripcion($this->estado);
			}
			
			estado_logic_add::checkestadoToGet($this->estado,$this->datosCliente);
			estado_logic_add::updateestadoToGet($this->estado);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?estado {
		$estadoLogic = new  estado_logic();
		  		  
        try {		
			$estadoLogic->setConnexion($connexion);			
			$estadoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $estadoLogic->getestado();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->estados = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->estados=$this->estadoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_util::refrescarFKDescripciones($this->estados);
			}
			
			estado_logic_add::checkestadoToGets($this->estados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estados);			
			$this->connexion->getConnection()->commit();					
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function getEntities(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->estados = array();
		  		  
        try {			
			$this->estados=$this->estadoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_util::refrescarFKDescripciones($this->estados);
			}
			
			estado_logic_add::checkestadoToGets($this->estados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estados);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->estados = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estados=$this->estadoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_util::refrescarFKDescripciones($this->estados);
			}
			
			estado_logic_add::checkestadoToGets($this->estados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estados);
			$this->connexion->getConnection()->commit();						
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function getEntitiesWithFinalQuery(string $strFinalQuery) {	
		$this->estados = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estados=$this->estadoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_util::refrescarFKDescripciones($this->estados);
			}
			
			estado_logic_add::checkestadoToGets($this->estados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estados);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$estadoLogic = new  estado_logic();
		  		  
        try {		
			$estadoLogic->setConnexion($connexion);			
			$estadoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $estadoLogic->getestados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->estados = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->estados=$this->estadoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_util::refrescarFKDescripciones($this->estados);
			}
			
			estado_logic_add::checkestadoToGets($this->estados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estados);
			$this->connexion->getConnection()->commit();					
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();								
			Funciones::logShowExceptionMessages($e);
			throw $e;						
      	} finally{
			$this->connexion->getConnection()->close();
		}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQuery(string $strQuerySelect,string $strFinalQuery) {
		$this->estados = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estados=$this->estadoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_util::refrescarFKDescripciones($this->estados);
			}
			
			estado_logic_add::checkestadoToGets($this->estados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estados);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->estados = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estados=$this->estadoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_util::refrescarFKDescripciones($this->estados);
			}
			
			estado_logic_add::checkestadoToGets($this->estados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estados);
			$this->connexion->getConnection()->commit();						
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally{
			$this->connexion->getConnection()->close();
		}
	}
	
	public function getEntitiesWithQuerySelect(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->estados = array();
		  		  
        try {			
			$this->estados=$this->estadoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_util::refrescarFKDescripciones($this->estados);
			}	
			
			estado_logic_add::checkestadoToGets($this->estados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estados);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->estados = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->estados=$this->estadoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_util::refrescarFKDescripciones($this->estados);
			}
			
			estado_logic_add::checkestadoToGets($this->estados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estados);
			$this->connexion->getConnection()->commit();						
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function getEntitiesSimpleQueryBuild(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->estados = array();
		  		  
        try {		
			$this->estados=$this->estadoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_util::refrescarFKDescripciones($this->estados);
			}
			
			estado_logic_add::checkestadoToGets($this->estados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estados);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
				
	
	/*MANTENIMIENTO*/
	public function saveWithConnection() {	
		 try {	
			$this->connexion = Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
						
			//estado_logic_add::checkestadoToSave($this->estado,$this->datosCliente,$this->connexion);	       
			estado_logic_add::updateestadoToSave($this->estado);			
			estado_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->estado,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->estadoLogicAdditional->checkGeneralEntityToSave($this,$this->estado,$this->datosCliente,$this->connexion);
			
			
			estado_data::save($this->estado, $this->connexion);	    	       	 				
			//estado_logic_add::checkestadoToSaveAfter($this->estado,$this->datosCliente,$this->connexion);			
			$this->estadoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->estado,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->estado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->estado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				estado_util::refrescarFKDescripcion($this->estado);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->estado->getIsDeleted()) {
				$this->estado=null;
			}			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function save() {	
		 try {				
			$this->inicializarLogicAdditional();			
						
			/*estado_logic_add::checkestadoToSave($this->estado,$this->datosCliente,$this->connexion);*/	        
			estado_logic_add::updateestadoToSave($this->estado);			
			$this->estadoLogicAdditional->checkGeneralEntityToSave($this,$this->estado,$this->datosCliente,$this->connexion);			
			estado_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->estado,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			estado_data::save($this->estado, $this->connexion);	    	       	 						
			/*estado_logic_add::checkestadoToSaveAfter($this->estado,$this->datosCliente,$this->connexion);*/			
			$this->estadoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->estado,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->estado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->estado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				estado_util::refrescarFKDescripcion($this->estado);				
			}
			
			if($this->estado->getIsDeleted()) {
				$this->estado=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(estado $estado,Connexion $connexion)  {
		$estadoLogic = new  estado_logic();		  		  
        try {		
			$estadoLogic->setConnexion($connexion);			
			$estadoLogic->setestado($estado);			
			$estadoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*estado_logic_add::checkestadoToSaves($this->estados,$this->datosCliente,$this->connexion);*/	        	
			$this->estadoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->estados,$this->datosCliente,$this->connexion);
			
	   		foreach($this->estados as $estadoLocal) {				
								
				estado_logic_add::updateestadoToSave($estadoLocal);	        	
				estado_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$estadoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				estado_data::save($estadoLocal, $this->connexion);				
			}
			
			/*estado_logic_add::checkestadoToSavesAfter($this->estados,$this->datosCliente,$this->connexion);*/			
			$this->estadoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->estados,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_util::refrescarFKDescripciones($this->estados);
			}
			
			$this->connexion->getConnection()->commit();								
			$this->quitarEliminados();
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function saves() {			
		 try {			
			$this->inicializarLogicAdditional();			
			/*estado_logic_add::checkestadoToSaves($this->estados,$this->datosCliente,$this->connexion);*/			
			$this->estadoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->estados,$this->datosCliente,$this->connexion);
			
	   		foreach($this->estados as $estadoLocal) {				
								
				estado_logic_add::updateestadoToSave($estadoLocal);	        	
				estado_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$estadoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				estado_data::save($estadoLocal, $this->connexion);				
			}			
			
			/*estado_logic_add::checkestadoToSavesAfter($this->estados,$this->datosCliente,$this->connexion);*/			
			$this->estadoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->estados,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estado_util::refrescarFKDescripciones($this->estados);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $estados,Connexion $connexion)  {
		$estadoLogic = new  estado_logic();
		  		  
        try {		
			$estadoLogic->setConnexion($connexion);			
			$estadoLogic->setestados($estados);			
			$estadoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$estadosAux=array();
		
		foreach($this->estados as $estado) {
			if($estado->getIsDeleted()==false) {
				$estadosAux[]=$estado;
			}
		}
		
		$this->estados=$estadosAux;
	}
	
	public function updateToGetsAuxiliar(array &$estados) {
		if($this->estadoLogicAdditional==null) {
			$this->estadoLogicAdditional=new estado_logic_add();
		}
		
		
		$this->estadoLogicAdditional->updateToGets($estados,$this);					
		$this->estadoLogicAdditional->updateToGetsReferencia($estados,$this);			
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	
	
	
	public function saveRelacionesWithConnection($estado,$cuentacorrientedetalles,$creditocuentacobrars,$pagocuentacobrars,$cuentacobrardetalles,$kardexs,$cuentapagardetalles,$devolucions,$devolucionfacturas,$facturas,$debitocuentacobrars,$consignacions,$pagocuentapagars,$facturalotes,$debitocuentapagars,$ordencompras,$estimados,$creditocuentapagars,$cotizacions,$asientos) {
		$this->saveRelacionesBase($estado,$cuentacorrientedetalles,$creditocuentacobrars,$pagocuentacobrars,$cuentacobrardetalles,$kardexs,$cuentapagardetalles,$devolucions,$devolucionfacturas,$facturas,$debitocuentacobrars,$consignacions,$pagocuentapagars,$facturalotes,$debitocuentapagars,$ordencompras,$estimados,$creditocuentapagars,$cotizacions,$asientos,true);
	}

	public function saveRelaciones($estado,$cuentacorrientedetalles,$creditocuentacobrars,$pagocuentacobrars,$cuentacobrardetalles,$kardexs,$cuentapagardetalles,$devolucions,$devolucionfacturas,$facturas,$debitocuentacobrars,$consignacions,$pagocuentapagars,$facturalotes,$debitocuentapagars,$ordencompras,$estimados,$creditocuentapagars,$cotizacions,$asientos) {
		$this->saveRelacionesBase($estado,$cuentacorrientedetalles,$creditocuentacobrars,$pagocuentacobrars,$cuentacobrardetalles,$kardexs,$cuentapagardetalles,$devolucions,$devolucionfacturas,$facturas,$debitocuentacobrars,$consignacions,$pagocuentapagars,$facturalotes,$debitocuentapagars,$ordencompras,$estimados,$creditocuentapagars,$cotizacions,$asientos,false);
	}

	public function saveRelacionesBase($estado,$cuentacorrientedetalles=array(),$creditocuentacobrars=array(),$pagocuentacobrars=array(),$cuentacobrardetalles=array(),$kardexs=array(),$cuentapagardetalles=array(),$devolucions=array(),$devolucionfacturas=array(),$facturas=array(),$debitocuentacobrars=array(),$consignacions=array(),$pagocuentapagars=array(),$facturalotes=array(),$debitocuentapagars=array(),$ordencompras=array(),$estimados=array(),$creditocuentapagars=array(),$cotizacions=array(),$asientos=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$estado->setcuenta_corriente_detalles($cuentacorrientedetalles);
			$estado->setcredito_cuenta_cobrars($creditocuentacobrars);
			$estado->setpago_cuenta_cobrars($pagocuentacobrars);
			$estado->setcuenta_cobrar_detalles($cuentacobrardetalles);
			$estado->setkardexs($kardexs);
			$estado->setcuenta_pagar_detalles($cuentapagardetalles);
			$estado->setdevolucions($devolucions);
			$estado->setdevolucion_facturas($devolucionfacturas);
			$estado->setfacturas($facturas);
			$estado->setdebito_cuenta_cobrars($debitocuentacobrars);
			$estado->setconsignacions($consignacions);
			$estado->setpago_cuenta_pagars($pagocuentapagars);
			$estado->setfactura_lotes($facturalotes);
			$estado->setdebito_cuenta_pagars($debitocuentapagars);
			$estado->setorden_compras($ordencompras);
			$estado->setestimados($estimados);
			$estado->setcredito_cuenta_pagars($creditocuentapagars);
			$estado->setcotizacions($cotizacions);
			$estado->setasientos($asientos);
			$this->setestado($estado);

				if(($this->estado->getIsNew() || $this->estado->getIsChanged()) && !$this->estado->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($cuentacorrientedetalles,$creditocuentacobrars,$pagocuentacobrars,$cuentacobrardetalles,$kardexs,$cuentapagardetalles,$devolucions,$devolucionfacturas,$facturas,$debitocuentacobrars,$consignacions,$pagocuentapagars,$facturalotes,$debitocuentapagars,$ordencompras,$estimados,$creditocuentapagars,$cotizacions,$asientos);

				} else if($this->estado->getIsDeleted()) {
					$this->saveRelacionesDetalles($cuentacorrientedetalles,$creditocuentacobrars,$pagocuentacobrars,$cuentacobrardetalles,$kardexs,$cuentapagardetalles,$devolucions,$devolucionfacturas,$facturas,$debitocuentacobrars,$consignacions,$pagocuentapagars,$facturalotes,$debitocuentapagars,$ordencompras,$estimados,$creditocuentapagars,$cotizacions,$asientos);
					$this->save();
				}

			if($conWithConnection){
				$this->connexion->getConnection()->commit();
			}

		} catch(Exception $e) {
			if($conWithConnection){
				$this->connexion->getConnection()->rollback();
			}

			Funciones::logShowExceptionMessages($e);

			throw $e;
		} 
		finally {

			if($conWithConnection){
				$this->connexion->getConnection()->close();
			}
		}
	}
	
	
	public function saveRelacionesDetalles($cuentacorrientedetalles=array(),$creditocuentacobrars=array(),$pagocuentacobrars=array(),$cuentacobrardetalles=array(),$kardexs=array(),$cuentapagardetalles=array(),$devolucions=array(),$devolucionfacturas=array(),$facturas=array(),$debitocuentacobrars=array(),$consignacions=array(),$pagocuentapagars=array(),$facturalotes=array(),$debitocuentapagars=array(),$ordencompras=array(),$estimados=array(),$creditocuentapagars=array(),$cotizacions=array(),$asientos=array()) {
		try {
	

			$idestadoActual=$this->getestado()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/cuenta_corriente_detalle_carga.php');
			cuenta_corriente_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cuentacorrientedetalleLogic_Desde_estado=new cuenta_corriente_detalle_logic();
			$cuentacorrientedetalleLogic_Desde_estado->setcuenta_corriente_detalles($cuentacorrientedetalles);

			$cuentacorrientedetalleLogic_Desde_estado->setConnexion($this->getConnexion());
			$cuentacorrientedetalleLogic_Desde_estado->setDatosCliente($this->datosCliente);

			foreach($cuentacorrientedetalleLogic_Desde_estado->getcuenta_corriente_detalles() as $cuentacorrientedetalle_Desde_estado) {
				$cuentacorrientedetalle_Desde_estado->setid_estado($idestadoActual);

				$cuentacorrientedetalleLogic_Desde_estado->setcuenta_corriente_detalle($cuentacorrientedetalle_Desde_estado);
				$cuentacorrientedetalleLogic_Desde_estado->save();

				$idcuenta_corriente_detalleActual=$cuenta_corriente_detalle_Desde_estado->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/clasificacion_cheque_carga.php');
				clasificacion_cheque_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$clasificacionchequeLogic_Desde_cuenta_corriente_detalle=new clasificacion_cheque_logic();

				if($cuenta_corriente_detalle_Desde_estado->getclasificacion_cheques()==null){
					$cuenta_corriente_detalle_Desde_estado->setclasificacion_cheques(array());
				}

				$clasificacionchequeLogic_Desde_cuenta_corriente_detalle->setclasificacion_cheques($cuenta_corriente_detalle_Desde_estado->getclasificacion_cheques());

				$clasificacionchequeLogic_Desde_cuenta_corriente_detalle->setConnexion($this->getConnexion());
				$clasificacionchequeLogic_Desde_cuenta_corriente_detalle->setDatosCliente($this->datosCliente);

				foreach($clasificacionchequeLogic_Desde_cuenta_corriente_detalle->getclasificacion_cheques() as $clasificacioncheque_Desde_cuenta_corriente_detalle) {
					$clasificacioncheque_Desde_cuenta_corriente_detalle->setid_cuenta_corriente_detalle($idcuenta_corriente_detalleActual);
				}

				$clasificacionchequeLogic_Desde_cuenta_corriente_detalle->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/credito_cuenta_cobrar_carga.php');
			credito_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$creditocuentacobrarLogic_Desde_estado=new credito_cuenta_cobrar_logic();
			$creditocuentacobrarLogic_Desde_estado->setcredito_cuenta_cobrars($creditocuentacobrars);

			$creditocuentacobrarLogic_Desde_estado->setConnexion($this->getConnexion());
			$creditocuentacobrarLogic_Desde_estado->setDatosCliente($this->datosCliente);

			foreach($creditocuentacobrarLogic_Desde_estado->getcredito_cuenta_cobrars() as $creditocuentacobrar_Desde_estado) {
				$creditocuentacobrar_Desde_estado->setid_estado($idestadoActual);
			}

			$creditocuentacobrarLogic_Desde_estado->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/pago_cuenta_cobrar_carga.php');
			pago_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$pagocuentacobrarLogic_Desde_estado=new pago_cuenta_cobrar_logic();
			$pagocuentacobrarLogic_Desde_estado->setpago_cuenta_cobrars($pagocuentacobrars);

			$pagocuentacobrarLogic_Desde_estado->setConnexion($this->getConnexion());
			$pagocuentacobrarLogic_Desde_estado->setDatosCliente($this->datosCliente);

			foreach($pagocuentacobrarLogic_Desde_estado->getpago_cuenta_cobrars() as $pagocuentacobrar_Desde_estado) {
				$pagocuentacobrar_Desde_estado->setid_estado($idestadoActual);
			}

			$pagocuentacobrarLogic_Desde_estado->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cuenta_cobrar_detalle_carga.php');
			cuenta_cobrar_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cuentacobrardetalleLogic_Desde_estado=new cuenta_cobrar_detalle_logic();
			$cuentacobrardetalleLogic_Desde_estado->setcuenta_cobrar_detalles($cuentacobrardetalles);

			$cuentacobrardetalleLogic_Desde_estado->setConnexion($this->getConnexion());
			$cuentacobrardetalleLogic_Desde_estado->setDatosCliente($this->datosCliente);

			foreach($cuentacobrardetalleLogic_Desde_estado->getcuenta_cobrar_detalles() as $cuentacobrardetalle_Desde_estado) {
				$cuentacobrardetalle_Desde_estado->setid_estado($idestadoActual);
			}

			$cuentacobrardetalleLogic_Desde_estado->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/kardex_carga.php');
			kardex_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$kardexLogic_Desde_estado=new kardex_logic();
			$kardexLogic_Desde_estado->setkardexs($kardexs);

			$kardexLogic_Desde_estado->setConnexion($this->getConnexion());
			$kardexLogic_Desde_estado->setDatosCliente($this->datosCliente);

			foreach($kardexLogic_Desde_estado->getkardexs() as $kardex_Desde_estado) {
				$kardex_Desde_estado->setid_estado($idestadoActual);

				$kardexLogic_Desde_estado->setkardex($kardex_Desde_estado);
				$kardexLogic_Desde_estado->save();

				$idkardexActual=$kardex_Desde_estado->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/kardex_detalle_carga.php');
				kardex_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$kardexdetalleLogic_Desde_kardex=new kardex_detalle_logic();

				if($kardex_Desde_estado->getkardex_detalles()==null){
					$kardex_Desde_estado->setkardex_detalles(array());
				}

				$kardexdetalleLogic_Desde_kardex->setkardex_detalles($kardex_Desde_estado->getkardex_detalles());

				$kardexdetalleLogic_Desde_kardex->setConnexion($this->getConnexion());
				$kardexdetalleLogic_Desde_kardex->setDatosCliente($this->datosCliente);

				foreach($kardexdetalleLogic_Desde_kardex->getkardex_detalles() as $kardexdetalle_Desde_kardex) {
					$kardexdetalle_Desde_kardex->setid_kardex($idkardexActual);
				}

				$kardexdetalleLogic_Desde_kardex->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/cuenta_pagar_detalle_carga.php');
			cuenta_pagar_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cuentapagardetalleLogic_Desde_estado=new cuenta_pagar_detalle_logic();
			$cuentapagardetalleLogic_Desde_estado->setcuenta_pagar_detalles($cuentapagardetalles);

			$cuentapagardetalleLogic_Desde_estado->setConnexion($this->getConnexion());
			$cuentapagardetalleLogic_Desde_estado->setDatosCliente($this->datosCliente);

			foreach($cuentapagardetalleLogic_Desde_estado->getcuenta_pagar_detalles() as $cuentapagardetalle_Desde_estado) {
				$cuentapagardetalle_Desde_estado->setid_estado($idestadoActual);
			}

			$cuentapagardetalleLogic_Desde_estado->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/devolucion_carga.php');
			devolucion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$devolucionLogic_Desde_estado=new devolucion_logic();
			$devolucionLogic_Desde_estado->setdevolucions($devolucions);

			$devolucionLogic_Desde_estado->setConnexion($this->getConnexion());
			$devolucionLogic_Desde_estado->setDatosCliente($this->datosCliente);

			foreach($devolucionLogic_Desde_estado->getdevolucions() as $devolucion_Desde_estado) {
				$devolucion_Desde_estado->setid_estado($idestadoActual);

				$devolucionLogic_Desde_estado->setdevolucion($devolucion_Desde_estado);
				$devolucionLogic_Desde_estado->save();

				$iddevolucionActual=$devolucion_Desde_estado->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/devolucion_detalle_carga.php');
				devolucion_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$devoluciondetalleLogic_Desde_devolucion=new devolucion_detalle_logic();

				if($devolucion_Desde_estado->getdevolucion_detalles()==null){
					$devolucion_Desde_estado->setdevolucion_detalles(array());
				}

				$devoluciondetalleLogic_Desde_devolucion->setdevolucion_detalles($devolucion_Desde_estado->getdevolucion_detalles());

				$devoluciondetalleLogic_Desde_devolucion->setConnexion($this->getConnexion());
				$devoluciondetalleLogic_Desde_devolucion->setDatosCliente($this->datosCliente);

				foreach($devoluciondetalleLogic_Desde_devolucion->getdevolucion_detalles() as $devoluciondetalle_Desde_devolucion) {
					$devoluciondetalle_Desde_devolucion->setid_devolucion($iddevolucionActual);
				}

				$devoluciondetalleLogic_Desde_devolucion->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/devolucion_factura_carga.php');
			devolucion_factura_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$devolucionfacturaLogic_Desde_estado=new devolucion_factura_logic();
			$devolucionfacturaLogic_Desde_estado->setdevolucion_facturas($devolucionfacturas);

			$devolucionfacturaLogic_Desde_estado->setConnexion($this->getConnexion());
			$devolucionfacturaLogic_Desde_estado->setDatosCliente($this->datosCliente);

			foreach($devolucionfacturaLogic_Desde_estado->getdevolucion_facturas() as $devolucionfactura_Desde_estado) {
				$devolucionfactura_Desde_estado->setid_estado($idestadoActual);

				$devolucionfacturaLogic_Desde_estado->setdevolucion_factura($devolucionfactura_Desde_estado);
				$devolucionfacturaLogic_Desde_estado->save();

				$iddevolucion_facturaActual=$devolucion_factura_Desde_estado->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/devolucion_factura_detalle_carga.php');
				devolucion_factura_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$devolucionfacturadetalleLogic_Desde_devolucion_factura=new devolucion_factura_detalle_logic();

				if($devolucion_factura_Desde_estado->getdevolucion_factura_detalles()==null){
					$devolucion_factura_Desde_estado->setdevolucion_factura_detalles(array());
				}

				$devolucionfacturadetalleLogic_Desde_devolucion_factura->setdevolucion_factura_detalles($devolucion_factura_Desde_estado->getdevolucion_factura_detalles());

				$devolucionfacturadetalleLogic_Desde_devolucion_factura->setConnexion($this->getConnexion());
				$devolucionfacturadetalleLogic_Desde_devolucion_factura->setDatosCliente($this->datosCliente);

				foreach($devolucionfacturadetalleLogic_Desde_devolucion_factura->getdevolucion_factura_detalles() as $devolucionfacturadetalle_Desde_devolucion_factura) {
					$devolucionfacturadetalle_Desde_devolucion_factura->setid_devolucion_factura($iddevolucion_facturaActual);
				}

				$devolucionfacturadetalleLogic_Desde_devolucion_factura->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_carga.php');
			factura_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$facturaLogic_Desde_estado=new factura_logic();
			$facturaLogic_Desde_estado->setfacturas($facturas);

			$facturaLogic_Desde_estado->setConnexion($this->getConnexion());
			$facturaLogic_Desde_estado->setDatosCliente($this->datosCliente);

			foreach($facturaLogic_Desde_estado->getfacturas() as $factura_Desde_estado) {
				$factura_Desde_estado->setid_estado($idestadoActual);

				$facturaLogic_Desde_estado->setfactura($factura_Desde_estado);
				$facturaLogic_Desde_estado->save();

				$idfacturaActual=$factura_Desde_estado->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_detalle_carga.php');
				factura_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$facturadetalleLogic_Desde_factura=new factura_detalle_logic();

				if($factura_Desde_estado->getfactura_detalles()==null){
					$factura_Desde_estado->setfactura_detalles(array());
				}

				$facturadetalleLogic_Desde_factura->setfactura_detalles($factura_Desde_estado->getfactura_detalles());

				$facturadetalleLogic_Desde_factura->setConnexion($this->getConnexion());
				$facturadetalleLogic_Desde_factura->setDatosCliente($this->datosCliente);

				foreach($facturadetalleLogic_Desde_factura->getfactura_detalles() as $facturadetalle_Desde_factura) {
					$facturadetalle_Desde_factura->setid_factura($idfacturaActual);
				}

				$facturadetalleLogic_Desde_factura->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/debito_cuenta_cobrar_carga.php');
			debito_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$debitocuentacobrarLogic_Desde_estado=new debito_cuenta_cobrar_logic();
			$debitocuentacobrarLogic_Desde_estado->setdebito_cuenta_cobrars($debitocuentacobrars);

			$debitocuentacobrarLogic_Desde_estado->setConnexion($this->getConnexion());
			$debitocuentacobrarLogic_Desde_estado->setDatosCliente($this->datosCliente);

			foreach($debitocuentacobrarLogic_Desde_estado->getdebito_cuenta_cobrars() as $debitocuentacobrar_Desde_estado) {
				$debitocuentacobrar_Desde_estado->setid_estado($idestadoActual);
			}

			$debitocuentacobrarLogic_Desde_estado->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/consignacion_carga.php');
			consignacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$consignacionLogic_Desde_estado=new consignacion_logic();
			$consignacionLogic_Desde_estado->setconsignacions($consignacions);

			$consignacionLogic_Desde_estado->setConnexion($this->getConnexion());
			$consignacionLogic_Desde_estado->setDatosCliente($this->datosCliente);

			foreach($consignacionLogic_Desde_estado->getconsignacions() as $consignacion_Desde_estado) {
				$consignacion_Desde_estado->setid_estado($idestadoActual);

				$consignacionLogic_Desde_estado->setconsignacion($consignacion_Desde_estado);
				$consignacionLogic_Desde_estado->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/pago_cuenta_pagar_carga.php');
			pago_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$pagocuentapagarLogic_Desde_estado=new pago_cuenta_pagar_logic();
			$pagocuentapagarLogic_Desde_estado->setpago_cuenta_pagars($pagocuentapagars);

			$pagocuentapagarLogic_Desde_estado->setConnexion($this->getConnexion());
			$pagocuentapagarLogic_Desde_estado->setDatosCliente($this->datosCliente);

			foreach($pagocuentapagarLogic_Desde_estado->getpago_cuenta_pagars() as $pagocuentapagar_Desde_estado) {
				$pagocuentapagar_Desde_estado->setid_estado($idestadoActual);
			}

			$pagocuentapagarLogic_Desde_estado->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_lote_carga.php');
			factura_lote_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$facturaloteLogic_Desde_estado=new factura_lote_logic();
			$facturaloteLogic_Desde_estado->setfactura_lotes($facturalotes);

			$facturaloteLogic_Desde_estado->setConnexion($this->getConnexion());
			$facturaloteLogic_Desde_estado->setDatosCliente($this->datosCliente);

			foreach($facturaloteLogic_Desde_estado->getfactura_lotes() as $facturalote_Desde_estado) {
				$facturalote_Desde_estado->setid_estado($idestadoActual);

				$facturaloteLogic_Desde_estado->setfactura_lote($facturalote_Desde_estado);
				$facturaloteLogic_Desde_estado->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/debito_cuenta_pagar_carga.php');
			debito_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$debitocuentapagarLogic_Desde_estado=new debito_cuenta_pagar_logic();
			$debitocuentapagarLogic_Desde_estado->setdebito_cuenta_pagars($debitocuentapagars);

			$debitocuentapagarLogic_Desde_estado->setConnexion($this->getConnexion());
			$debitocuentapagarLogic_Desde_estado->setDatosCliente($this->datosCliente);

			foreach($debitocuentapagarLogic_Desde_estado->getdebito_cuenta_pagars() as $debitocuentapagar_Desde_estado) {
				$debitocuentapagar_Desde_estado->setid_estado($idestadoActual);
			}

			$debitocuentapagarLogic_Desde_estado->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/orden_compra_carga.php');
			orden_compra_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$ordencompraLogic_Desde_estado=new orden_compra_logic();
			$ordencompraLogic_Desde_estado->setorden_compras($ordencompras);

			$ordencompraLogic_Desde_estado->setConnexion($this->getConnexion());
			$ordencompraLogic_Desde_estado->setDatosCliente($this->datosCliente);

			foreach($ordencompraLogic_Desde_estado->getorden_compras() as $ordencompra_Desde_estado) {
				$ordencompra_Desde_estado->setid_estado($idestadoActual);

				$ordencompraLogic_Desde_estado->setorden_compra($ordencompra_Desde_estado);
				$ordencompraLogic_Desde_estado->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/estimado_carga.php');
			estimado_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$estimadoLogic_Desde_estado=new estimado_logic();
			$estimadoLogic_Desde_estado->setestimados($estimados);

			$estimadoLogic_Desde_estado->setConnexion($this->getConnexion());
			$estimadoLogic_Desde_estado->setDatosCliente($this->datosCliente);

			foreach($estimadoLogic_Desde_estado->getestimados() as $estimado_Desde_estado) {
				$estimado_Desde_estado->setid_estado($idestadoActual);

				$estimadoLogic_Desde_estado->setestimado($estimado_Desde_estado);
				$estimadoLogic_Desde_estado->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/credito_cuenta_pagar_carga.php');
			credito_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$creditocuentapagarLogic_Desde_estado=new credito_cuenta_pagar_logic();
			$creditocuentapagarLogic_Desde_estado->setcredito_cuenta_pagars($creditocuentapagars);

			$creditocuentapagarLogic_Desde_estado->setConnexion($this->getConnexion());
			$creditocuentapagarLogic_Desde_estado->setDatosCliente($this->datosCliente);

			foreach($creditocuentapagarLogic_Desde_estado->getcredito_cuenta_pagars() as $creditocuentapagar_Desde_estado) {
				$creditocuentapagar_Desde_estado->setid_estado($idestadoActual);
			}

			$creditocuentapagarLogic_Desde_estado->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/cotizacion_carga.php');
			cotizacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cotizacionLogic_Desde_estado=new cotizacion_logic();
			$cotizacionLogic_Desde_estado->setcotizacions($cotizacions);

			$cotizacionLogic_Desde_estado->setConnexion($this->getConnexion());
			$cotizacionLogic_Desde_estado->setDatosCliente($this->datosCliente);

			foreach($cotizacionLogic_Desde_estado->getcotizacions() as $cotizacion_Desde_estado) {
				$cotizacion_Desde_estado->setid_estado($idestadoActual);

				$cotizacionLogic_Desde_estado->setcotizacion($cotizacion_Desde_estado);
				$cotizacionLogic_Desde_estado->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_carga.php');
			asiento_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$asientoLogic_Desde_estado=new asiento_logic();
			$asientoLogic_Desde_estado->setasientos($asientos);

			$asientoLogic_Desde_estado->setConnexion($this->getConnexion());
			$asientoLogic_Desde_estado->setDatosCliente($this->datosCliente);

			foreach($asientoLogic_Desde_estado->getasientos() as $asiento_Desde_estado) {
				$asiento_Desde_estado->setid_estado($idestadoActual);

				$asientoLogic_Desde_estado->setasiento($asiento_Desde_estado);
				$asientoLogic_Desde_estado->save();
			}


		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
	public function deleteCascade()  {
		/*NO-GENERATED*/
	}
	
	public function deleteCascadeWithConnection()  {
		/*NO GENERATED*/
	}
	
	public function deleteCascades()  {	
		/*NO GENERATED*/
	}
	
	public function deleteCascadesWithConnection()  {
		/*NO GENERATED*/
	}
	
	/*PROCESAR ACCIONES*/
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $estados,estado_param_return $estadoParameterGeneral) : estado_param_return {
		$estadoReturnGeneral=new estado_param_return();
	
		 try {	
			
			if($this->estadoLogicAdditional==null) {
				$this->estadoLogicAdditional=new estado_logic_add();
			}
			
			$this->estadoLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$estados,$estadoParameterGeneral,$estadoReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $estadoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $estados,estado_param_return $estadoParameterGeneral) : estado_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$estadoReturnGeneral=new estado_param_return();
	
			
			if($this->estadoLogicAdditional==null) {
				$this->estadoLogicAdditional=new estado_logic_add();
			}
			
			$this->estadoLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$estados,$estadoParameterGeneral,$estadoReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $estadoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estados,estado $estado,estado_param_return $estadoParameterGeneral,bool $isEsNuevoestado,array $clases) : estado_param_return {
		 try {	
			$estadoReturnGeneral=new estado_param_return();
	
			$estadoReturnGeneral->setestado($estado);
			$estadoReturnGeneral->setestados($estados);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$estadoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->estadoLogicAdditional==null) {
				$this->estadoLogicAdditional=new estado_logic_add();
			}
			
			$estadoReturnGeneral=$this->estadoLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estados,$estado,$estadoParameterGeneral,$estadoReturnGeneral,$isEsNuevoestado,$clases);
			
			/*estadoLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estados,$estado,$estadoParameterGeneral,$estadoReturnGeneral,$isEsNuevoestado,$clases);*/
			
			return $estadoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estados,estado $estado,estado_param_return $estadoParameterGeneral,bool $isEsNuevoestado,array $clases) : estado_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$estadoReturnGeneral=new estado_param_return();
	
			$estadoReturnGeneral->setestado($estado);
			$estadoReturnGeneral->setestados($estados);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$estadoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->estadoLogicAdditional==null) {
				$this->estadoLogicAdditional=new estado_logic_add();
			}
			
			$estadoReturnGeneral=$this->estadoLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estados,$estado,$estadoParameterGeneral,$estadoReturnGeneral,$isEsNuevoestado,$clases);
			
			/*estadoLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estados,$estado,$estadoParameterGeneral,$estadoReturnGeneral,$isEsNuevoestado,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $estadoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estados,estado $estado,estado_param_return $estadoParameterGeneral,bool $isEsNuevoestado,array $clases) : estado_param_return {
		 try {	
			$estadoReturnGeneral=new estado_param_return();
	
			$estadoReturnGeneral->setestado($estado);
			$estadoReturnGeneral->setestados($estados);
			
			
			
			if($this->estadoLogicAdditional==null) {
				$this->estadoLogicAdditional=new estado_logic_add();
			}
			
			$estadoReturnGeneral=$this->estadoLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estados,$estado,$estadoParameterGeneral,$estadoReturnGeneral,$isEsNuevoestado,$clases);
			
			/*estadoLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estados,$estado,$estadoParameterGeneral,$estadoReturnGeneral,$isEsNuevoestado,$clases);*/
			
			return $estadoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estados,estado $estado,estado_param_return $estadoParameterGeneral,bool $isEsNuevoestado,array $clases) : estado_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$estadoReturnGeneral=new estado_param_return();
	
			$estadoReturnGeneral->setestado($estado);
			$estadoReturnGeneral->setestados($estados);
			
			
			if($this->estadoLogicAdditional==null) {
				$this->estadoLogicAdditional=new estado_logic_add();
			}
			
			$estadoReturnGeneral=$this->estadoLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estados,$estado,$estadoParameterGeneral,$estadoReturnGeneral,$isEsNuevoestado,$clases);
			
			/*estadoLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$estados,$estado,$estadoParameterGeneral,$estadoReturnGeneral,$isEsNuevoestado,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $estadoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,estado $estado,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,estado $estado,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		estado_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(estado $estado,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			estado_logic_add::updateestadoToGet($this->estado);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$estado->setcuenta_corriente_detalles($this->estadoDataAccess->getcuenta_corriente_detalles($this->connexion,$estado));
		$estado->setcredito_cuenta_cobrars($this->estadoDataAccess->getcredito_cuenta_cobrars($this->connexion,$estado));
		$estado->setpago_cuenta_cobrars($this->estadoDataAccess->getpago_cuenta_cobrars($this->connexion,$estado));
		$estado->setcuenta_cobrar_detalles($this->estadoDataAccess->getcuenta_cobrar_detalles($this->connexion,$estado));
		$estado->setkardexs($this->estadoDataAccess->getkardexs($this->connexion,$estado));
		$estado->setcuenta_pagar_detalles($this->estadoDataAccess->getcuenta_pagar_detalles($this->connexion,$estado));
		$estado->setdevolucions($this->estadoDataAccess->getdevolucions($this->connexion,$estado));
		$estado->setdevolucion_facturas($this->estadoDataAccess->getdevolucion_facturas($this->connexion,$estado));
		$estado->setfacturas($this->estadoDataAccess->getfacturas($this->connexion,$estado));
		$estado->setdebito_cuenta_cobrars($this->estadoDataAccess->getdebito_cuenta_cobrars($this->connexion,$estado));
		$estado->setconsignacions($this->estadoDataAccess->getconsignacions($this->connexion,$estado));
		$estado->setpago_cuenta_pagars($this->estadoDataAccess->getpago_cuenta_pagars($this->connexion,$estado));
		$estado->setfactura_lotes($this->estadoDataAccess->getfactura_lotes($this->connexion,$estado));
		$estado->setdebito_cuenta_pagars($this->estadoDataAccess->getdebito_cuenta_pagars($this->connexion,$estado));
		$estado->setorden_compras($this->estadoDataAccess->getorden_compras($this->connexion,$estado));
		$estado->setestimados($this->estadoDataAccess->getestimados($this->connexion,$estado));
		$estado->setcredito_cuenta_pagars($this->estadoDataAccess->getcredito_cuenta_pagars($this->connexion,$estado));
		$estado->setcotizacions($this->estadoDataAccess->getcotizacions($this->connexion,$estado));
		$estado->setasientos($this->estadoDataAccess->getasientos($this->connexion,$estado));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setcuenta_corriente_detalles($this->estadoDataAccess->getcuenta_corriente_detalles($this->connexion,$estado));

				if($this->isConDeep) {
					$cuentacorrientedetalleLogic= new cuenta_corriente_detalle_logic($this->connexion);
					$cuentacorrientedetalleLogic->setcuenta_corriente_detalles($estado->getcuenta_corriente_detalles());
					$classesLocal=cuenta_corriente_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cuentacorrientedetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cuenta_corriente_detalle_util::refrescarFKDescripciones($cuentacorrientedetalleLogic->getcuenta_corriente_detalles());
					$estado->setcuenta_corriente_detalles($cuentacorrientedetalleLogic->getcuenta_corriente_detalles());
				}

				continue;
			}

			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setcredito_cuenta_cobrars($this->estadoDataAccess->getcredito_cuenta_cobrars($this->connexion,$estado));

				if($this->isConDeep) {
					$creditocuentacobrarLogic= new credito_cuenta_cobrar_logic($this->connexion);
					$creditocuentacobrarLogic->setcredito_cuenta_cobrars($estado->getcredito_cuenta_cobrars());
					$classesLocal=credito_cuenta_cobrar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$creditocuentacobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					credito_cuenta_cobrar_util::refrescarFKDescripciones($creditocuentacobrarLogic->getcredito_cuenta_cobrars());
					$estado->setcredito_cuenta_cobrars($creditocuentacobrarLogic->getcredito_cuenta_cobrars());
				}

				continue;
			}

			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setpago_cuenta_cobrars($this->estadoDataAccess->getpago_cuenta_cobrars($this->connexion,$estado));

				if($this->isConDeep) {
					$pagocuentacobrarLogic= new pago_cuenta_cobrar_logic($this->connexion);
					$pagocuentacobrarLogic->setpago_cuenta_cobrars($estado->getpago_cuenta_cobrars());
					$classesLocal=pago_cuenta_cobrar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$pagocuentacobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					pago_cuenta_cobrar_util::refrescarFKDescripciones($pagocuentacobrarLogic->getpago_cuenta_cobrars());
					$estado->setpago_cuenta_cobrars($pagocuentacobrarLogic->getpago_cuenta_cobrars());
				}

				continue;
			}

			if($clas->clas==cuenta_cobrar_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setcuenta_cobrar_detalles($this->estadoDataAccess->getcuenta_cobrar_detalles($this->connexion,$estado));

				if($this->isConDeep) {
					$cuentacobrardetalleLogic= new cuenta_cobrar_detalle_logic($this->connexion);
					$cuentacobrardetalleLogic->setcuenta_cobrar_detalles($estado->getcuenta_cobrar_detalles());
					$classesLocal=cuenta_cobrar_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cuentacobrardetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cuenta_cobrar_detalle_util::refrescarFKDescripciones($cuentacobrardetalleLogic->getcuenta_cobrar_detalles());
					$estado->setcuenta_cobrar_detalles($cuentacobrardetalleLogic->getcuenta_cobrar_detalles());
				}

				continue;
			}

			if($clas->clas==kardex::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setkardexs($this->estadoDataAccess->getkardexs($this->connexion,$estado));

				if($this->isConDeep) {
					$kardexLogic= new kardex_logic($this->connexion);
					$kardexLogic->setkardexs($estado->getkardexs());
					$classesLocal=kardex_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$kardexLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					kardex_util::refrescarFKDescripciones($kardexLogic->getkardexs());
					$estado->setkardexs($kardexLogic->getkardexs());
				}

				continue;
			}

			if($clas->clas==cuenta_pagar_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setcuenta_pagar_detalles($this->estadoDataAccess->getcuenta_pagar_detalles($this->connexion,$estado));

				if($this->isConDeep) {
					$cuentapagardetalleLogic= new cuenta_pagar_detalle_logic($this->connexion);
					$cuentapagardetalleLogic->setcuenta_pagar_detalles($estado->getcuenta_pagar_detalles());
					$classesLocal=cuenta_pagar_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cuentapagardetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cuenta_pagar_detalle_util::refrescarFKDescripciones($cuentapagardetalleLogic->getcuenta_pagar_detalles());
					$estado->setcuenta_pagar_detalles($cuentapagardetalleLogic->getcuenta_pagar_detalles());
				}

				continue;
			}

			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setdevolucions($this->estadoDataAccess->getdevolucions($this->connexion,$estado));

				if($this->isConDeep) {
					$devolucionLogic= new devolucion_logic($this->connexion);
					$devolucionLogic->setdevolucions($estado->getdevolucions());
					$classesLocal=devolucion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$devolucionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					devolucion_util::refrescarFKDescripciones($devolucionLogic->getdevolucions());
					$estado->setdevolucions($devolucionLogic->getdevolucions());
				}

				continue;
			}

			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setdevolucion_facturas($this->estadoDataAccess->getdevolucion_facturas($this->connexion,$estado));

				if($this->isConDeep) {
					$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
					$devolucionfacturaLogic->setdevolucion_facturas($estado->getdevolucion_facturas());
					$classesLocal=devolucion_factura_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$devolucionfacturaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					devolucion_factura_util::refrescarFKDescripciones($devolucionfacturaLogic->getdevolucion_facturas());
					$estado->setdevolucion_facturas($devolucionfacturaLogic->getdevolucion_facturas());
				}

				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setfacturas($this->estadoDataAccess->getfacturas($this->connexion,$estado));

				if($this->isConDeep) {
					$facturaLogic= new factura_logic($this->connexion);
					$facturaLogic->setfacturas($estado->getfacturas());
					$classesLocal=factura_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$facturaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					factura_util::refrescarFKDescripciones($facturaLogic->getfacturas());
					$estado->setfacturas($facturaLogic->getfacturas());
				}

				continue;
			}

			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setdebito_cuenta_cobrars($this->estadoDataAccess->getdebito_cuenta_cobrars($this->connexion,$estado));

				if($this->isConDeep) {
					$debitocuentacobrarLogic= new debito_cuenta_cobrar_logic($this->connexion);
					$debitocuentacobrarLogic->setdebito_cuenta_cobrars($estado->getdebito_cuenta_cobrars());
					$classesLocal=debito_cuenta_cobrar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$debitocuentacobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					debito_cuenta_cobrar_util::refrescarFKDescripciones($debitocuentacobrarLogic->getdebito_cuenta_cobrars());
					$estado->setdebito_cuenta_cobrars($debitocuentacobrarLogic->getdebito_cuenta_cobrars());
				}

				continue;
			}

			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setconsignacions($this->estadoDataAccess->getconsignacions($this->connexion,$estado));

				if($this->isConDeep) {
					$consignacionLogic= new consignacion_logic($this->connexion);
					$consignacionLogic->setconsignacions($estado->getconsignacions());
					$classesLocal=consignacion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$consignacionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					consignacion_util::refrescarFKDescripciones($consignacionLogic->getconsignacions());
					$estado->setconsignacions($consignacionLogic->getconsignacions());
				}

				continue;
			}

			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setpago_cuenta_pagars($this->estadoDataAccess->getpago_cuenta_pagars($this->connexion,$estado));

				if($this->isConDeep) {
					$pagocuentapagarLogic= new pago_cuenta_pagar_logic($this->connexion);
					$pagocuentapagarLogic->setpago_cuenta_pagars($estado->getpago_cuenta_pagars());
					$classesLocal=pago_cuenta_pagar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$pagocuentapagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					pago_cuenta_pagar_util::refrescarFKDescripciones($pagocuentapagarLogic->getpago_cuenta_pagars());
					$estado->setpago_cuenta_pagars($pagocuentapagarLogic->getpago_cuenta_pagars());
				}

				continue;
			}

			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setfactura_lotes($this->estadoDataAccess->getfactura_lotes($this->connexion,$estado));

				if($this->isConDeep) {
					$facturaloteLogic= new factura_lote_logic($this->connexion);
					$facturaloteLogic->setfactura_lotes($estado->getfactura_lotes());
					$classesLocal=factura_lote_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$facturaloteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					factura_lote_util::refrescarFKDescripciones($facturaloteLogic->getfactura_lotes());
					$estado->setfactura_lotes($facturaloteLogic->getfactura_lotes());
				}

				continue;
			}

			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setdebito_cuenta_pagars($this->estadoDataAccess->getdebito_cuenta_pagars($this->connexion,$estado));

				if($this->isConDeep) {
					$debitocuentapagarLogic= new debito_cuenta_pagar_logic($this->connexion);
					$debitocuentapagarLogic->setdebito_cuenta_pagars($estado->getdebito_cuenta_pagars());
					$classesLocal=debito_cuenta_pagar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$debitocuentapagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					debito_cuenta_pagar_util::refrescarFKDescripciones($debitocuentapagarLogic->getdebito_cuenta_pagars());
					$estado->setdebito_cuenta_pagars($debitocuentapagarLogic->getdebito_cuenta_pagars());
				}

				continue;
			}

			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setorden_compras($this->estadoDataAccess->getorden_compras($this->connexion,$estado));

				if($this->isConDeep) {
					$ordencompraLogic= new orden_compra_logic($this->connexion);
					$ordencompraLogic->setorden_compras($estado->getorden_compras());
					$classesLocal=orden_compra_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$ordencompraLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					orden_compra_util::refrescarFKDescripciones($ordencompraLogic->getorden_compras());
					$estado->setorden_compras($ordencompraLogic->getorden_compras());
				}

				continue;
			}

			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setestimados($this->estadoDataAccess->getestimados($this->connexion,$estado));

				if($this->isConDeep) {
					$estimadoLogic= new estimado_logic($this->connexion);
					$estimadoLogic->setestimados($estado->getestimados());
					$classesLocal=estimado_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$estimadoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					estimado_util::refrescarFKDescripciones($estimadoLogic->getestimados());
					$estado->setestimados($estimadoLogic->getestimados());
				}

				continue;
			}

			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setcredito_cuenta_pagars($this->estadoDataAccess->getcredito_cuenta_pagars($this->connexion,$estado));

				if($this->isConDeep) {
					$creditocuentapagarLogic= new credito_cuenta_pagar_logic($this->connexion);
					$creditocuentapagarLogic->setcredito_cuenta_pagars($estado->getcredito_cuenta_pagars());
					$classesLocal=credito_cuenta_pagar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$creditocuentapagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					credito_cuenta_pagar_util::refrescarFKDescripciones($creditocuentapagarLogic->getcredito_cuenta_pagars());
					$estado->setcredito_cuenta_pagars($creditocuentapagarLogic->getcredito_cuenta_pagars());
				}

				continue;
			}

			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setcotizacions($this->estadoDataAccess->getcotizacions($this->connexion,$estado));

				if($this->isConDeep) {
					$cotizacionLogic= new cotizacion_logic($this->connexion);
					$cotizacionLogic->setcotizacions($estado->getcotizacions());
					$classesLocal=cotizacion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cotizacionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cotizacion_util::refrescarFKDescripciones($cotizacionLogic->getcotizacions());
					$estado->setcotizacions($cotizacionLogic->getcotizacions());
				}

				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setasientos($this->estadoDataAccess->getasientos($this->connexion,$estado));

				if($this->isConDeep) {
					$asientoLogic= new asiento_logic($this->connexion);
					$asientoLogic->setasientos($estado->getasientos());
					$classesLocal=asiento_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$asientoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					asiento_util::refrescarFKDescripciones($asientoLogic->getasientos());
					$estado->setasientos($asientoLogic->getasientos());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_corriente_detalle::$class);
			$estado->setcuenta_corriente_detalles($this->estadoDataAccess->getcuenta_corriente_detalles($this->connexion,$estado));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_cobrar::$class);
			$estado->setcredito_cuenta_cobrars($this->estadoDataAccess->getcredito_cuenta_cobrars($this->connexion,$estado));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_cobrar::$class);
			$estado->setpago_cuenta_cobrars($this->estadoDataAccess->getpago_cuenta_cobrars($this->connexion,$estado));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_cobrar_detalle::$class);
			$estado->setcuenta_cobrar_detalles($this->estadoDataAccess->getcuenta_cobrar_detalles($this->connexion,$estado));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(kardex::$class);
			$estado->setkardexs($this->estadoDataAccess->getkardexs($this->connexion,$estado));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_pagar_detalle::$class);
			$estado->setcuenta_pagar_detalles($this->estadoDataAccess->getcuenta_pagar_detalles($this->connexion,$estado));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion::$class);
			$estado->setdevolucions($this->estadoDataAccess->getdevolucions($this->connexion,$estado));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion_factura::$class);
			$estado->setdevolucion_facturas($this->estadoDataAccess->getdevolucion_facturas($this->connexion,$estado));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura::$class);
			$estado->setfacturas($this->estadoDataAccess->getfacturas($this->connexion,$estado));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_cobrar::$class);
			$estado->setdebito_cuenta_cobrars($this->estadoDataAccess->getdebito_cuenta_cobrars($this->connexion,$estado));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(consignacion::$class);
			$estado->setconsignacions($this->estadoDataAccess->getconsignacions($this->connexion,$estado));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_pagar::$class);
			$estado->setpago_cuenta_pagars($this->estadoDataAccess->getpago_cuenta_pagars($this->connexion,$estado));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura_lote::$class);
			$estado->setfactura_lotes($this->estadoDataAccess->getfactura_lotes($this->connexion,$estado));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_pagar::$class);
			$estado->setdebito_cuenta_pagars($this->estadoDataAccess->getdebito_cuenta_pagars($this->connexion,$estado));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(orden_compra::$class);
			$estado->setorden_compras($this->estadoDataAccess->getorden_compras($this->connexion,$estado));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(estimado::$class);
			$estado->setestimados($this->estadoDataAccess->getestimados($this->connexion,$estado));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_pagar::$class);
			$estado->setcredito_cuenta_pagars($this->estadoDataAccess->getcredito_cuenta_pagars($this->connexion,$estado));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cotizacion::$class);
			$estado->setcotizacions($this->estadoDataAccess->getcotizacions($this->connexion,$estado));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento::$class);
			$estado->setasientos($this->estadoDataAccess->getasientos($this->connexion,$estado));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$estado->setcuenta_corriente_detalles($this->estadoDataAccess->getcuenta_corriente_detalles($this->connexion,$estado));

		foreach($estado->getcuenta_corriente_detalles() as $cuentacorrientedetalle) {
			$cuentacorrientedetalleLogic= new cuenta_corriente_detalle_logic($this->connexion);
			$cuentacorrientedetalleLogic->deepLoad($cuentacorrientedetalle,$isDeep,$deepLoadType,$clases);
		}

		$estado->setcredito_cuenta_cobrars($this->estadoDataAccess->getcredito_cuenta_cobrars($this->connexion,$estado));

		foreach($estado->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
			$creditocuentacobrarLogic= new credito_cuenta_cobrar_logic($this->connexion);
			$creditocuentacobrarLogic->deepLoad($creditocuentacobrar,$isDeep,$deepLoadType,$clases);
		}

		$estado->setpago_cuenta_cobrars($this->estadoDataAccess->getpago_cuenta_cobrars($this->connexion,$estado));

		foreach($estado->getpago_cuenta_cobrars() as $pagocuentacobrar) {
			$pagocuentacobrarLogic= new pago_cuenta_cobrar_logic($this->connexion);
			$pagocuentacobrarLogic->deepLoad($pagocuentacobrar,$isDeep,$deepLoadType,$clases);
		}

		$estado->setcuenta_cobrar_detalles($this->estadoDataAccess->getcuenta_cobrar_detalles($this->connexion,$estado));

		foreach($estado->getcuenta_cobrar_detalles() as $cuentacobrardetalle) {
			$cuentacobrardetalleLogic= new cuenta_cobrar_detalle_logic($this->connexion);
			$cuentacobrardetalleLogic->deepLoad($cuentacobrardetalle,$isDeep,$deepLoadType,$clases);
		}

		$estado->setkardexs($this->estadoDataAccess->getkardexs($this->connexion,$estado));

		foreach($estado->getkardexs() as $kardex) {
			$kardexLogic= new kardex_logic($this->connexion);
			$kardexLogic->deepLoad($kardex,$isDeep,$deepLoadType,$clases);
		}

		$estado->setcuenta_pagar_detalles($this->estadoDataAccess->getcuenta_pagar_detalles($this->connexion,$estado));

		foreach($estado->getcuenta_pagar_detalles() as $cuentapagardetalle) {
			$cuentapagardetalleLogic= new cuenta_pagar_detalle_logic($this->connexion);
			$cuentapagardetalleLogic->deepLoad($cuentapagardetalle,$isDeep,$deepLoadType,$clases);
		}

		$estado->setdevolucions($this->estadoDataAccess->getdevolucions($this->connexion,$estado));

		foreach($estado->getdevolucions() as $devolucion) {
			$devolucionLogic= new devolucion_logic($this->connexion);
			$devolucionLogic->deepLoad($devolucion,$isDeep,$deepLoadType,$clases);
		}

		$estado->setdevolucion_facturas($this->estadoDataAccess->getdevolucion_facturas($this->connexion,$estado));

		foreach($estado->getdevolucion_facturas() as $devolucionfactura) {
			$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
			$devolucionfacturaLogic->deepLoad($devolucionfactura,$isDeep,$deepLoadType,$clases);
		}

		$estado->setfacturas($this->estadoDataAccess->getfacturas($this->connexion,$estado));

		foreach($estado->getfacturas() as $factura) {
			$facturaLogic= new factura_logic($this->connexion);
			$facturaLogic->deepLoad($factura,$isDeep,$deepLoadType,$clases);
		}

		$estado->setdebito_cuenta_cobrars($this->estadoDataAccess->getdebito_cuenta_cobrars($this->connexion,$estado));

		foreach($estado->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
			$debitocuentacobrarLogic= new debito_cuenta_cobrar_logic($this->connexion);
			$debitocuentacobrarLogic->deepLoad($debitocuentacobrar,$isDeep,$deepLoadType,$clases);
		}

		$estado->setconsignacions($this->estadoDataAccess->getconsignacions($this->connexion,$estado));

		foreach($estado->getconsignacions() as $consignacion) {
			$consignacionLogic= new consignacion_logic($this->connexion);
			$consignacionLogic->deepLoad($consignacion,$isDeep,$deepLoadType,$clases);
		}

		$estado->setpago_cuenta_pagars($this->estadoDataAccess->getpago_cuenta_pagars($this->connexion,$estado));

		foreach($estado->getpago_cuenta_pagars() as $pagocuentapagar) {
			$pagocuentapagarLogic= new pago_cuenta_pagar_logic($this->connexion);
			$pagocuentapagarLogic->deepLoad($pagocuentapagar,$isDeep,$deepLoadType,$clases);
		}

		$estado->setfactura_lotes($this->estadoDataAccess->getfactura_lotes($this->connexion,$estado));

		foreach($estado->getfactura_lotes() as $facturalote) {
			$facturaloteLogic= new factura_lote_logic($this->connexion);
			$facturaloteLogic->deepLoad($facturalote,$isDeep,$deepLoadType,$clases);
		}

		$estado->setdebito_cuenta_pagars($this->estadoDataAccess->getdebito_cuenta_pagars($this->connexion,$estado));

		foreach($estado->getdebito_cuenta_pagars() as $debitocuentapagar) {
			$debitocuentapagarLogic= new debito_cuenta_pagar_logic($this->connexion);
			$debitocuentapagarLogic->deepLoad($debitocuentapagar,$isDeep,$deepLoadType,$clases);
		}

		$estado->setorden_compras($this->estadoDataAccess->getorden_compras($this->connexion,$estado));

		foreach($estado->getorden_compras() as $ordencompra) {
			$ordencompraLogic= new orden_compra_logic($this->connexion);
			$ordencompraLogic->deepLoad($ordencompra,$isDeep,$deepLoadType,$clases);
		}

		$estado->setestimados($this->estadoDataAccess->getestimados($this->connexion,$estado));

		foreach($estado->getestimados() as $estimado) {
			$estimadoLogic= new estimado_logic($this->connexion);
			$estimadoLogic->deepLoad($estimado,$isDeep,$deepLoadType,$clases);
		}

		$estado->setcredito_cuenta_pagars($this->estadoDataAccess->getcredito_cuenta_pagars($this->connexion,$estado));

		foreach($estado->getcredito_cuenta_pagars() as $creditocuentapagar) {
			$creditocuentapagarLogic= new credito_cuenta_pagar_logic($this->connexion);
			$creditocuentapagarLogic->deepLoad($creditocuentapagar,$isDeep,$deepLoadType,$clases);
		}

		$estado->setcotizacions($this->estadoDataAccess->getcotizacions($this->connexion,$estado));

		foreach($estado->getcotizacions() as $cotizacion) {
			$cotizacionLogic= new cotizacion_logic($this->connexion);
			$cotizacionLogic->deepLoad($cotizacion,$isDeep,$deepLoadType,$clases);
		}

		$estado->setasientos($this->estadoDataAccess->getasientos($this->connexion,$estado));

		foreach($estado->getasientos() as $asiento) {
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepLoad($asiento,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setcuenta_corriente_detalles($this->estadoDataAccess->getcuenta_corriente_detalles($this->connexion,$estado));

				foreach($estado->getcuenta_corriente_detalles() as $cuentacorrientedetalle) {
					$cuentacorrientedetalleLogic= new cuenta_corriente_detalle_logic($this->connexion);
					$cuentacorrientedetalleLogic->deepLoad($cuentacorrientedetalle,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setcredito_cuenta_cobrars($this->estadoDataAccess->getcredito_cuenta_cobrars($this->connexion,$estado));

				foreach($estado->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
					$creditocuentacobrarLogic= new credito_cuenta_cobrar_logic($this->connexion);
					$creditocuentacobrarLogic->deepLoad($creditocuentacobrar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setpago_cuenta_cobrars($this->estadoDataAccess->getpago_cuenta_cobrars($this->connexion,$estado));

				foreach($estado->getpago_cuenta_cobrars() as $pagocuentacobrar) {
					$pagocuentacobrarLogic= new pago_cuenta_cobrar_logic($this->connexion);
					$pagocuentacobrarLogic->deepLoad($pagocuentacobrar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cuenta_cobrar_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setcuenta_cobrar_detalles($this->estadoDataAccess->getcuenta_cobrar_detalles($this->connexion,$estado));

				foreach($estado->getcuenta_cobrar_detalles() as $cuentacobrardetalle) {
					$cuentacobrardetalleLogic= new cuenta_cobrar_detalle_logic($this->connexion);
					$cuentacobrardetalleLogic->deepLoad($cuentacobrardetalle,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==kardex::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setkardexs($this->estadoDataAccess->getkardexs($this->connexion,$estado));

				foreach($estado->getkardexs() as $kardex) {
					$kardexLogic= new kardex_logic($this->connexion);
					$kardexLogic->deepLoad($kardex,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cuenta_pagar_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setcuenta_pagar_detalles($this->estadoDataAccess->getcuenta_pagar_detalles($this->connexion,$estado));

				foreach($estado->getcuenta_pagar_detalles() as $cuentapagardetalle) {
					$cuentapagardetalleLogic= new cuenta_pagar_detalle_logic($this->connexion);
					$cuentapagardetalleLogic->deepLoad($cuentapagardetalle,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setdevolucions($this->estadoDataAccess->getdevolucions($this->connexion,$estado));

				foreach($estado->getdevolucions() as $devolucion) {
					$devolucionLogic= new devolucion_logic($this->connexion);
					$devolucionLogic->deepLoad($devolucion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setdevolucion_facturas($this->estadoDataAccess->getdevolucion_facturas($this->connexion,$estado));

				foreach($estado->getdevolucion_facturas() as $devolucionfactura) {
					$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
					$devolucionfacturaLogic->deepLoad($devolucionfactura,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setfacturas($this->estadoDataAccess->getfacturas($this->connexion,$estado));

				foreach($estado->getfacturas() as $factura) {
					$facturaLogic= new factura_logic($this->connexion);
					$facturaLogic->deepLoad($factura,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setdebito_cuenta_cobrars($this->estadoDataAccess->getdebito_cuenta_cobrars($this->connexion,$estado));

				foreach($estado->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
					$debitocuentacobrarLogic= new debito_cuenta_cobrar_logic($this->connexion);
					$debitocuentacobrarLogic->deepLoad($debitocuentacobrar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setconsignacions($this->estadoDataAccess->getconsignacions($this->connexion,$estado));

				foreach($estado->getconsignacions() as $consignacion) {
					$consignacionLogic= new consignacion_logic($this->connexion);
					$consignacionLogic->deepLoad($consignacion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setpago_cuenta_pagars($this->estadoDataAccess->getpago_cuenta_pagars($this->connexion,$estado));

				foreach($estado->getpago_cuenta_pagars() as $pagocuentapagar) {
					$pagocuentapagarLogic= new pago_cuenta_pagar_logic($this->connexion);
					$pagocuentapagarLogic->deepLoad($pagocuentapagar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setfactura_lotes($this->estadoDataAccess->getfactura_lotes($this->connexion,$estado));

				foreach($estado->getfactura_lotes() as $facturalote) {
					$facturaloteLogic= new factura_lote_logic($this->connexion);
					$facturaloteLogic->deepLoad($facturalote,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setdebito_cuenta_pagars($this->estadoDataAccess->getdebito_cuenta_pagars($this->connexion,$estado));

				foreach($estado->getdebito_cuenta_pagars() as $debitocuentapagar) {
					$debitocuentapagarLogic= new debito_cuenta_pagar_logic($this->connexion);
					$debitocuentapagarLogic->deepLoad($debitocuentapagar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setorden_compras($this->estadoDataAccess->getorden_compras($this->connexion,$estado));

				foreach($estado->getorden_compras() as $ordencompra) {
					$ordencompraLogic= new orden_compra_logic($this->connexion);
					$ordencompraLogic->deepLoad($ordencompra,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setestimados($this->estadoDataAccess->getestimados($this->connexion,$estado));

				foreach($estado->getestimados() as $estimado) {
					$estimadoLogic= new estimado_logic($this->connexion);
					$estimadoLogic->deepLoad($estimado,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setcredito_cuenta_pagars($this->estadoDataAccess->getcredito_cuenta_pagars($this->connexion,$estado));

				foreach($estado->getcredito_cuenta_pagars() as $creditocuentapagar) {
					$creditocuentapagarLogic= new credito_cuenta_pagar_logic($this->connexion);
					$creditocuentapagarLogic->deepLoad($creditocuentapagar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setcotizacions($this->estadoDataAccess->getcotizacions($this->connexion,$estado));

				foreach($estado->getcotizacions() as $cotizacion) {
					$cotizacionLogic= new cotizacion_logic($this->connexion);
					$cotizacionLogic->deepLoad($cotizacion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estado->setasientos($this->estadoDataAccess->getasientos($this->connexion,$estado));

				foreach($estado->getasientos() as $asiento) {
					$asientoLogic= new asiento_logic($this->connexion);
					$asientoLogic->deepLoad($asiento,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_corriente_detalle::$class);
			$estado->setcuenta_corriente_detalles($this->estadoDataAccess->getcuenta_corriente_detalles($this->connexion,$estado));

			foreach($estado->getcuenta_corriente_detalles() as $cuentacorrientedetalle) {
				$cuentacorrientedetalleLogic= new cuenta_corriente_detalle_logic($this->connexion);
				$cuentacorrientedetalleLogic->deepLoad($cuentacorrientedetalle,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_cobrar::$class);
			$estado->setcredito_cuenta_cobrars($this->estadoDataAccess->getcredito_cuenta_cobrars($this->connexion,$estado));

			foreach($estado->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
				$creditocuentacobrarLogic= new credito_cuenta_cobrar_logic($this->connexion);
				$creditocuentacobrarLogic->deepLoad($creditocuentacobrar,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_cobrar::$class);
			$estado->setpago_cuenta_cobrars($this->estadoDataAccess->getpago_cuenta_cobrars($this->connexion,$estado));

			foreach($estado->getpago_cuenta_cobrars() as $pagocuentacobrar) {
				$pagocuentacobrarLogic= new pago_cuenta_cobrar_logic($this->connexion);
				$pagocuentacobrarLogic->deepLoad($pagocuentacobrar,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_cobrar_detalle::$class);
			$estado->setcuenta_cobrar_detalles($this->estadoDataAccess->getcuenta_cobrar_detalles($this->connexion,$estado));

			foreach($estado->getcuenta_cobrar_detalles() as $cuentacobrardetalle) {
				$cuentacobrardetalleLogic= new cuenta_cobrar_detalle_logic($this->connexion);
				$cuentacobrardetalleLogic->deepLoad($cuentacobrardetalle,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(kardex::$class);
			$estado->setkardexs($this->estadoDataAccess->getkardexs($this->connexion,$estado));

			foreach($estado->getkardexs() as $kardex) {
				$kardexLogic= new kardex_logic($this->connexion);
				$kardexLogic->deepLoad($kardex,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_pagar_detalle::$class);
			$estado->setcuenta_pagar_detalles($this->estadoDataAccess->getcuenta_pagar_detalles($this->connexion,$estado));

			foreach($estado->getcuenta_pagar_detalles() as $cuentapagardetalle) {
				$cuentapagardetalleLogic= new cuenta_pagar_detalle_logic($this->connexion);
				$cuentapagardetalleLogic->deepLoad($cuentapagardetalle,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion::$class);
			$estado->setdevolucions($this->estadoDataAccess->getdevolucions($this->connexion,$estado));

			foreach($estado->getdevolucions() as $devolucion) {
				$devolucionLogic= new devolucion_logic($this->connexion);
				$devolucionLogic->deepLoad($devolucion,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion_factura::$class);
			$estado->setdevolucion_facturas($this->estadoDataAccess->getdevolucion_facturas($this->connexion,$estado));

			foreach($estado->getdevolucion_facturas() as $devolucionfactura) {
				$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
				$devolucionfacturaLogic->deepLoad($devolucionfactura,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura::$class);
			$estado->setfacturas($this->estadoDataAccess->getfacturas($this->connexion,$estado));

			foreach($estado->getfacturas() as $factura) {
				$facturaLogic= new factura_logic($this->connexion);
				$facturaLogic->deepLoad($factura,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_cobrar::$class);
			$estado->setdebito_cuenta_cobrars($this->estadoDataAccess->getdebito_cuenta_cobrars($this->connexion,$estado));

			foreach($estado->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
				$debitocuentacobrarLogic= new debito_cuenta_cobrar_logic($this->connexion);
				$debitocuentacobrarLogic->deepLoad($debitocuentacobrar,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(consignacion::$class);
			$estado->setconsignacions($this->estadoDataAccess->getconsignacions($this->connexion,$estado));

			foreach($estado->getconsignacions() as $consignacion) {
				$consignacionLogic= new consignacion_logic($this->connexion);
				$consignacionLogic->deepLoad($consignacion,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_pagar::$class);
			$estado->setpago_cuenta_pagars($this->estadoDataAccess->getpago_cuenta_pagars($this->connexion,$estado));

			foreach($estado->getpago_cuenta_pagars() as $pagocuentapagar) {
				$pagocuentapagarLogic= new pago_cuenta_pagar_logic($this->connexion);
				$pagocuentapagarLogic->deepLoad($pagocuentapagar,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura_lote::$class);
			$estado->setfactura_lotes($this->estadoDataAccess->getfactura_lotes($this->connexion,$estado));

			foreach($estado->getfactura_lotes() as $facturalote) {
				$facturaloteLogic= new factura_lote_logic($this->connexion);
				$facturaloteLogic->deepLoad($facturalote,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_pagar::$class);
			$estado->setdebito_cuenta_pagars($this->estadoDataAccess->getdebito_cuenta_pagars($this->connexion,$estado));

			foreach($estado->getdebito_cuenta_pagars() as $debitocuentapagar) {
				$debitocuentapagarLogic= new debito_cuenta_pagar_logic($this->connexion);
				$debitocuentapagarLogic->deepLoad($debitocuentapagar,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(orden_compra::$class);
			$estado->setorden_compras($this->estadoDataAccess->getorden_compras($this->connexion,$estado));

			foreach($estado->getorden_compras() as $ordencompra) {
				$ordencompraLogic= new orden_compra_logic($this->connexion);
				$ordencompraLogic->deepLoad($ordencompra,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(estimado::$class);
			$estado->setestimados($this->estadoDataAccess->getestimados($this->connexion,$estado));

			foreach($estado->getestimados() as $estimado) {
				$estimadoLogic= new estimado_logic($this->connexion);
				$estimadoLogic->deepLoad($estimado,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_pagar::$class);
			$estado->setcredito_cuenta_pagars($this->estadoDataAccess->getcredito_cuenta_pagars($this->connexion,$estado));

			foreach($estado->getcredito_cuenta_pagars() as $creditocuentapagar) {
				$creditocuentapagarLogic= new credito_cuenta_pagar_logic($this->connexion);
				$creditocuentapagarLogic->deepLoad($creditocuentapagar,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cotizacion::$class);
			$estado->setcotizacions($this->estadoDataAccess->getcotizacions($this->connexion,$estado));

			foreach($estado->getcotizacions() as $cotizacion) {
				$cotizacionLogic= new cotizacion_logic($this->connexion);
				$cotizacionLogic->deepLoad($cotizacion,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento::$class);
			$estado->setasientos($this->estadoDataAccess->getasientos($this->connexion,$estado));

			foreach($estado->getasientos() as $asiento) {
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepLoad($asiento,$isDeep,$deepLoadType,$clases);
			}
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(estado $estado,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			estado_logic_add::updateestadoToSave($this->estado);			
			
			if(!$paraDeleteCascade) {				
				estado_data::save($estado, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($estado->getcuenta_corriente_detalles() as $cuentacorrientedetalle) {
			$cuentacorrientedetalle->setid_estado($estado->getId());
			cuenta_corriente_detalle_data::save($cuentacorrientedetalle,$this->connexion);
		}


		foreach($estado->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
			$creditocuentacobrar->setid_estado($estado->getId());
			credito_cuenta_cobrar_data::save($creditocuentacobrar,$this->connexion);
		}


		foreach($estado->getpago_cuenta_cobrars() as $pagocuentacobrar) {
			$pagocuentacobrar->setid_estado($estado->getId());
			pago_cuenta_cobrar_data::save($pagocuentacobrar,$this->connexion);
		}


		foreach($estado->getcuenta_cobrar_detalles() as $cuentacobrardetalle) {
			$cuentacobrardetalle->setid_estado($estado->getId());
			cuenta_cobrar_detalle_data::save($cuentacobrardetalle,$this->connexion);
		}


		foreach($estado->getkardexs() as $kardex) {
			$kardex->setid_estado($estado->getId());
			kardex_data::save($kardex,$this->connexion);
		}


		foreach($estado->getcuenta_pagar_detalles() as $cuentapagardetalle) {
			$cuentapagardetalle->setid_estado($estado->getId());
			cuenta_pagar_detalle_data::save($cuentapagardetalle,$this->connexion);
		}


		foreach($estado->getdevolucions() as $devolucion) {
			$devolucion->setid_estado($estado->getId());
			devolucion_data::save($devolucion,$this->connexion);
		}


		foreach($estado->getdevolucion_facturas() as $devolucionfactura) {
			$devolucionfactura->setid_estado($estado->getId());
			devolucion_factura_data::save($devolucionfactura,$this->connexion);
		}


		foreach($estado->getfacturas() as $factura) {
			$factura->setid_estado($estado->getId());
			factura_data::save($factura,$this->connexion);
		}


		foreach($estado->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
			$debitocuentacobrar->setid_estado($estado->getId());
			debito_cuenta_cobrar_data::save($debitocuentacobrar,$this->connexion);
		}


		foreach($estado->getconsignacions() as $consignacion) {
			$consignacion->setid_estado($estado->getId());
			consignacion_data::save($consignacion,$this->connexion);
		}


		foreach($estado->getpago_cuenta_pagars() as $pagocuentapagar) {
			$pagocuentapagar->setid_estado($estado->getId());
			pago_cuenta_pagar_data::save($pagocuentapagar,$this->connexion);
		}


		foreach($estado->getfactura_lotes() as $facturalote) {
			$facturalote->setid_estado($estado->getId());
			factura_lote_data::save($facturalote,$this->connexion);
		}


		foreach($estado->getdebito_cuenta_pagars() as $debitocuentapagar) {
			$debitocuentapagar->setid_estado($estado->getId());
			debito_cuenta_pagar_data::save($debitocuentapagar,$this->connexion);
		}


		foreach($estado->getorden_compras() as $ordencompra) {
			$ordencompra->setid_estado($estado->getId());
			orden_compra_data::save($ordencompra,$this->connexion);
		}


		foreach($estado->getestimados() as $estimado) {
			$estimado->setid_estado($estado->getId());
			estimado_data::save($estimado,$this->connexion);
		}


		foreach($estado->getcredito_cuenta_pagars() as $creditocuentapagar) {
			$creditocuentapagar->setid_estado($estado->getId());
			credito_cuenta_pagar_data::save($creditocuentapagar,$this->connexion);
		}


		foreach($estado->getcotizacions() as $cotizacion) {
			$cotizacion->setid_estado($estado->getId());
			cotizacion_data::save($cotizacion,$this->connexion);
		}


		foreach($estado->getasientos() as $asiento) {
			$asiento->setid_estado($estado->getId());
			asiento_data::save($asiento,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==cuenta_corriente_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getcuenta_corriente_detalles() as $cuentacorrientedetalle) {
					$cuentacorrientedetalle->setid_estado($estado->getId());
					cuenta_corriente_detalle_data::save($cuentacorrientedetalle,$this->connexion);
				}

				continue;
			}

			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
					$creditocuentacobrar->setid_estado($estado->getId());
					credito_cuenta_cobrar_data::save($creditocuentacobrar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getpago_cuenta_cobrars() as $pagocuentacobrar) {
					$pagocuentacobrar->setid_estado($estado->getId());
					pago_cuenta_cobrar_data::save($pagocuentacobrar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cuenta_cobrar_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getcuenta_cobrar_detalles() as $cuentacobrardetalle) {
					$cuentacobrardetalle->setid_estado($estado->getId());
					cuenta_cobrar_detalle_data::save($cuentacobrardetalle,$this->connexion);
				}

				continue;
			}

			if($clas->clas==kardex::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getkardexs() as $kardex) {
					$kardex->setid_estado($estado->getId());
					kardex_data::save($kardex,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cuenta_pagar_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getcuenta_pagar_detalles() as $cuentapagardetalle) {
					$cuentapagardetalle->setid_estado($estado->getId());
					cuenta_pagar_detalle_data::save($cuentapagardetalle,$this->connexion);
				}

				continue;
			}

			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getdevolucions() as $devolucion) {
					$devolucion->setid_estado($estado->getId());
					devolucion_data::save($devolucion,$this->connexion);
				}

				continue;
			}

			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getdevolucion_facturas() as $devolucionfactura) {
					$devolucionfactura->setid_estado($estado->getId());
					devolucion_factura_data::save($devolucionfactura,$this->connexion);
				}

				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getfacturas() as $factura) {
					$factura->setid_estado($estado->getId());
					factura_data::save($factura,$this->connexion);
				}

				continue;
			}

			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
					$debitocuentacobrar->setid_estado($estado->getId());
					debito_cuenta_cobrar_data::save($debitocuentacobrar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getconsignacions() as $consignacion) {
					$consignacion->setid_estado($estado->getId());
					consignacion_data::save($consignacion,$this->connexion);
				}

				continue;
			}

			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getpago_cuenta_pagars() as $pagocuentapagar) {
					$pagocuentapagar->setid_estado($estado->getId());
					pago_cuenta_pagar_data::save($pagocuentapagar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getfactura_lotes() as $facturalote) {
					$facturalote->setid_estado($estado->getId());
					factura_lote_data::save($facturalote,$this->connexion);
				}

				continue;
			}

			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getdebito_cuenta_pagars() as $debitocuentapagar) {
					$debitocuentapagar->setid_estado($estado->getId());
					debito_cuenta_pagar_data::save($debitocuentapagar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getorden_compras() as $ordencompra) {
					$ordencompra->setid_estado($estado->getId());
					orden_compra_data::save($ordencompra,$this->connexion);
				}

				continue;
			}

			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getestimados() as $estimado) {
					$estimado->setid_estado($estado->getId());
					estimado_data::save($estimado,$this->connexion);
				}

				continue;
			}

			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getcredito_cuenta_pagars() as $creditocuentapagar) {
					$creditocuentapagar->setid_estado($estado->getId());
					credito_cuenta_pagar_data::save($creditocuentapagar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getcotizacions() as $cotizacion) {
					$cotizacion->setid_estado($estado->getId());
					cotizacion_data::save($cotizacion,$this->connexion);
				}

				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getasientos() as $asiento) {
					$asiento->setid_estado($estado->getId());
					asiento_data::save($asiento,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_corriente_detalle::$class);

			foreach($estado->getcuenta_corriente_detalles() as $cuentacorrientedetalle) {
				$cuentacorrientedetalle->setid_estado($estado->getId());
				cuenta_corriente_detalle_data::save($cuentacorrientedetalle,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_cobrar::$class);

			foreach($estado->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
				$creditocuentacobrar->setid_estado($estado->getId());
				credito_cuenta_cobrar_data::save($creditocuentacobrar,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_cobrar::$class);

			foreach($estado->getpago_cuenta_cobrars() as $pagocuentacobrar) {
				$pagocuentacobrar->setid_estado($estado->getId());
				pago_cuenta_cobrar_data::save($pagocuentacobrar,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_cobrar_detalle::$class);

			foreach($estado->getcuenta_cobrar_detalles() as $cuentacobrardetalle) {
				$cuentacobrardetalle->setid_estado($estado->getId());
				cuenta_cobrar_detalle_data::save($cuentacobrardetalle,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(kardex::$class);

			foreach($estado->getkardexs() as $kardex) {
				$kardex->setid_estado($estado->getId());
				kardex_data::save($kardex,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_pagar_detalle::$class);

			foreach($estado->getcuenta_pagar_detalles() as $cuentapagardetalle) {
				$cuentapagardetalle->setid_estado($estado->getId());
				cuenta_pagar_detalle_data::save($cuentapagardetalle,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion::$class);

			foreach($estado->getdevolucions() as $devolucion) {
				$devolucion->setid_estado($estado->getId());
				devolucion_data::save($devolucion,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion_factura::$class);

			foreach($estado->getdevolucion_facturas() as $devolucionfactura) {
				$devolucionfactura->setid_estado($estado->getId());
				devolucion_factura_data::save($devolucionfactura,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura::$class);

			foreach($estado->getfacturas() as $factura) {
				$factura->setid_estado($estado->getId());
				factura_data::save($factura,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_cobrar::$class);

			foreach($estado->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
				$debitocuentacobrar->setid_estado($estado->getId());
				debito_cuenta_cobrar_data::save($debitocuentacobrar,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(consignacion::$class);

			foreach($estado->getconsignacions() as $consignacion) {
				$consignacion->setid_estado($estado->getId());
				consignacion_data::save($consignacion,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_pagar::$class);

			foreach($estado->getpago_cuenta_pagars() as $pagocuentapagar) {
				$pagocuentapagar->setid_estado($estado->getId());
				pago_cuenta_pagar_data::save($pagocuentapagar,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura_lote::$class);

			foreach($estado->getfactura_lotes() as $facturalote) {
				$facturalote->setid_estado($estado->getId());
				factura_lote_data::save($facturalote,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_pagar::$class);

			foreach($estado->getdebito_cuenta_pagars() as $debitocuentapagar) {
				$debitocuentapagar->setid_estado($estado->getId());
				debito_cuenta_pagar_data::save($debitocuentapagar,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(orden_compra::$class);

			foreach($estado->getorden_compras() as $ordencompra) {
				$ordencompra->setid_estado($estado->getId());
				orden_compra_data::save($ordencompra,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(estimado::$class);

			foreach($estado->getestimados() as $estimado) {
				$estimado->setid_estado($estado->getId());
				estimado_data::save($estimado,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_pagar::$class);

			foreach($estado->getcredito_cuenta_pagars() as $creditocuentapagar) {
				$creditocuentapagar->setid_estado($estado->getId());
				credito_cuenta_pagar_data::save($creditocuentapagar,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cotizacion::$class);

			foreach($estado->getcotizacions() as $cotizacion) {
				$cotizacion->setid_estado($estado->getId());
				cotizacion_data::save($cotizacion,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento::$class);

			foreach($estado->getasientos() as $asiento) {
				$asiento->setid_estado($estado->getId());
				asiento_data::save($asiento,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($estado->getcuenta_corriente_detalles() as $cuentacorrientedetalle) {
			$cuentacorrientedetalleLogic= new cuenta_corriente_detalle_logic($this->connexion);
			$cuentacorrientedetalle->setid_estado($estado->getId());
			cuenta_corriente_detalle_data::save($cuentacorrientedetalle,$this->connexion);
			$cuentacorrientedetalleLogic->deepSave($cuentacorrientedetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($estado->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
			$creditocuentacobrarLogic= new credito_cuenta_cobrar_logic($this->connexion);
			$creditocuentacobrar->setid_estado($estado->getId());
			credito_cuenta_cobrar_data::save($creditocuentacobrar,$this->connexion);
			$creditocuentacobrarLogic->deepSave($creditocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($estado->getpago_cuenta_cobrars() as $pagocuentacobrar) {
			$pagocuentacobrarLogic= new pago_cuenta_cobrar_logic($this->connexion);
			$pagocuentacobrar->setid_estado($estado->getId());
			pago_cuenta_cobrar_data::save($pagocuentacobrar,$this->connexion);
			$pagocuentacobrarLogic->deepSave($pagocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($estado->getcuenta_cobrar_detalles() as $cuentacobrardetalle) {
			$cuentacobrardetalleLogic= new cuenta_cobrar_detalle_logic($this->connexion);
			$cuentacobrardetalle->setid_estado($estado->getId());
			cuenta_cobrar_detalle_data::save($cuentacobrardetalle,$this->connexion);
			$cuentacobrardetalleLogic->deepSave($cuentacobrardetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($estado->getkardexs() as $kardex) {
			$kardexLogic= new kardex_logic($this->connexion);
			$kardex->setid_estado($estado->getId());
			kardex_data::save($kardex,$this->connexion);
			$kardexLogic->deepSave($kardex,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($estado->getcuenta_pagar_detalles() as $cuentapagardetalle) {
			$cuentapagardetalleLogic= new cuenta_pagar_detalle_logic($this->connexion);
			$cuentapagardetalle->setid_estado($estado->getId());
			cuenta_pagar_detalle_data::save($cuentapagardetalle,$this->connexion);
			$cuentapagardetalleLogic->deepSave($cuentapagardetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($estado->getdevolucions() as $devolucion) {
			$devolucionLogic= new devolucion_logic($this->connexion);
			$devolucion->setid_estado($estado->getId());
			devolucion_data::save($devolucion,$this->connexion);
			$devolucionLogic->deepSave($devolucion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($estado->getdevolucion_facturas() as $devolucionfactura) {
			$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
			$devolucionfactura->setid_estado($estado->getId());
			devolucion_factura_data::save($devolucionfactura,$this->connexion);
			$devolucionfacturaLogic->deepSave($devolucionfactura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($estado->getfacturas() as $factura) {
			$facturaLogic= new factura_logic($this->connexion);
			$factura->setid_estado($estado->getId());
			factura_data::save($factura,$this->connexion);
			$facturaLogic->deepSave($factura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($estado->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
			$debitocuentacobrarLogic= new debito_cuenta_cobrar_logic($this->connexion);
			$debitocuentacobrar->setid_estado($estado->getId());
			debito_cuenta_cobrar_data::save($debitocuentacobrar,$this->connexion);
			$debitocuentacobrarLogic->deepSave($debitocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($estado->getconsignacions() as $consignacion) {
			$consignacionLogic= new consignacion_logic($this->connexion);
			$consignacion->setid_estado($estado->getId());
			consignacion_data::save($consignacion,$this->connexion);
			$consignacionLogic->deepSave($consignacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($estado->getpago_cuenta_pagars() as $pagocuentapagar) {
			$pagocuentapagarLogic= new pago_cuenta_pagar_logic($this->connexion);
			$pagocuentapagar->setid_estado($estado->getId());
			pago_cuenta_pagar_data::save($pagocuentapagar,$this->connexion);
			$pagocuentapagarLogic->deepSave($pagocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($estado->getfactura_lotes() as $facturalote) {
			$facturaloteLogic= new factura_lote_logic($this->connexion);
			$facturalote->setid_estado($estado->getId());
			factura_lote_data::save($facturalote,$this->connexion);
			$facturaloteLogic->deepSave($facturalote,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($estado->getdebito_cuenta_pagars() as $debitocuentapagar) {
			$debitocuentapagarLogic= new debito_cuenta_pagar_logic($this->connexion);
			$debitocuentapagar->setid_estado($estado->getId());
			debito_cuenta_pagar_data::save($debitocuentapagar,$this->connexion);
			$debitocuentapagarLogic->deepSave($debitocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($estado->getorden_compras() as $ordencompra) {
			$ordencompraLogic= new orden_compra_logic($this->connexion);
			$ordencompra->setid_estado($estado->getId());
			orden_compra_data::save($ordencompra,$this->connexion);
			$ordencompraLogic->deepSave($ordencompra,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($estado->getestimados() as $estimado) {
			$estimadoLogic= new estimado_logic($this->connexion);
			$estimado->setid_estado($estado->getId());
			estimado_data::save($estimado,$this->connexion);
			$estimadoLogic->deepSave($estimado,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($estado->getcredito_cuenta_pagars() as $creditocuentapagar) {
			$creditocuentapagarLogic= new credito_cuenta_pagar_logic($this->connexion);
			$creditocuentapagar->setid_estado($estado->getId());
			credito_cuenta_pagar_data::save($creditocuentapagar,$this->connexion);
			$creditocuentapagarLogic->deepSave($creditocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($estado->getcotizacions() as $cotizacion) {
			$cotizacionLogic= new cotizacion_logic($this->connexion);
			$cotizacion->setid_estado($estado->getId());
			cotizacion_data::save($cotizacion,$this->connexion);
			$cotizacionLogic->deepSave($cotizacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($estado->getasientos() as $asiento) {
			$asientoLogic= new asiento_logic($this->connexion);
			$asiento->setid_estado($estado->getId());
			asiento_data::save($asiento,$this->connexion);
			$asientoLogic->deepSave($asiento,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==cuenta_corriente_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getcuenta_corriente_detalles() as $cuentacorrientedetalle) {
					$cuentacorrientedetalleLogic= new cuenta_corriente_detalle_logic($this->connexion);
					$cuentacorrientedetalle->setid_estado($estado->getId());
					cuenta_corriente_detalle_data::save($cuentacorrientedetalle,$this->connexion);
					$cuentacorrientedetalleLogic->deepSave($cuentacorrientedetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
					$creditocuentacobrarLogic= new credito_cuenta_cobrar_logic($this->connexion);
					$creditocuentacobrar->setid_estado($estado->getId());
					credito_cuenta_cobrar_data::save($creditocuentacobrar,$this->connexion);
					$creditocuentacobrarLogic->deepSave($creditocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getpago_cuenta_cobrars() as $pagocuentacobrar) {
					$pagocuentacobrarLogic= new pago_cuenta_cobrar_logic($this->connexion);
					$pagocuentacobrar->setid_estado($estado->getId());
					pago_cuenta_cobrar_data::save($pagocuentacobrar,$this->connexion);
					$pagocuentacobrarLogic->deepSave($pagocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cuenta_cobrar_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getcuenta_cobrar_detalles() as $cuentacobrardetalle) {
					$cuentacobrardetalleLogic= new cuenta_cobrar_detalle_logic($this->connexion);
					$cuentacobrardetalle->setid_estado($estado->getId());
					cuenta_cobrar_detalle_data::save($cuentacobrardetalle,$this->connexion);
					$cuentacobrardetalleLogic->deepSave($cuentacobrardetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==kardex::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getkardexs() as $kardex) {
					$kardexLogic= new kardex_logic($this->connexion);
					$kardex->setid_estado($estado->getId());
					kardex_data::save($kardex,$this->connexion);
					$kardexLogic->deepSave($kardex,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cuenta_pagar_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getcuenta_pagar_detalles() as $cuentapagardetalle) {
					$cuentapagardetalleLogic= new cuenta_pagar_detalle_logic($this->connexion);
					$cuentapagardetalle->setid_estado($estado->getId());
					cuenta_pagar_detalle_data::save($cuentapagardetalle,$this->connexion);
					$cuentapagardetalleLogic->deepSave($cuentapagardetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getdevolucions() as $devolucion) {
					$devolucionLogic= new devolucion_logic($this->connexion);
					$devolucion->setid_estado($estado->getId());
					devolucion_data::save($devolucion,$this->connexion);
					$devolucionLogic->deepSave($devolucion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getdevolucion_facturas() as $devolucionfactura) {
					$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
					$devolucionfactura->setid_estado($estado->getId());
					devolucion_factura_data::save($devolucionfactura,$this->connexion);
					$devolucionfacturaLogic->deepSave($devolucionfactura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getfacturas() as $factura) {
					$facturaLogic= new factura_logic($this->connexion);
					$factura->setid_estado($estado->getId());
					factura_data::save($factura,$this->connexion);
					$facturaLogic->deepSave($factura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
					$debitocuentacobrarLogic= new debito_cuenta_cobrar_logic($this->connexion);
					$debitocuentacobrar->setid_estado($estado->getId());
					debito_cuenta_cobrar_data::save($debitocuentacobrar,$this->connexion);
					$debitocuentacobrarLogic->deepSave($debitocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getconsignacions() as $consignacion) {
					$consignacionLogic= new consignacion_logic($this->connexion);
					$consignacion->setid_estado($estado->getId());
					consignacion_data::save($consignacion,$this->connexion);
					$consignacionLogic->deepSave($consignacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getpago_cuenta_pagars() as $pagocuentapagar) {
					$pagocuentapagarLogic= new pago_cuenta_pagar_logic($this->connexion);
					$pagocuentapagar->setid_estado($estado->getId());
					pago_cuenta_pagar_data::save($pagocuentapagar,$this->connexion);
					$pagocuentapagarLogic->deepSave($pagocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getfactura_lotes() as $facturalote) {
					$facturaloteLogic= new factura_lote_logic($this->connexion);
					$facturalote->setid_estado($estado->getId());
					factura_lote_data::save($facturalote,$this->connexion);
					$facturaloteLogic->deepSave($facturalote,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getdebito_cuenta_pagars() as $debitocuentapagar) {
					$debitocuentapagarLogic= new debito_cuenta_pagar_logic($this->connexion);
					$debitocuentapagar->setid_estado($estado->getId());
					debito_cuenta_pagar_data::save($debitocuentapagar,$this->connexion);
					$debitocuentapagarLogic->deepSave($debitocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getorden_compras() as $ordencompra) {
					$ordencompraLogic= new orden_compra_logic($this->connexion);
					$ordencompra->setid_estado($estado->getId());
					orden_compra_data::save($ordencompra,$this->connexion);
					$ordencompraLogic->deepSave($ordencompra,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getestimados() as $estimado) {
					$estimadoLogic= new estimado_logic($this->connexion);
					$estimado->setid_estado($estado->getId());
					estimado_data::save($estimado,$this->connexion);
					$estimadoLogic->deepSave($estimado,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getcredito_cuenta_pagars() as $creditocuentapagar) {
					$creditocuentapagarLogic= new credito_cuenta_pagar_logic($this->connexion);
					$creditocuentapagar->setid_estado($estado->getId());
					credito_cuenta_pagar_data::save($creditocuentapagar,$this->connexion);
					$creditocuentapagarLogic->deepSave($creditocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getcotizacions() as $cotizacion) {
					$cotizacionLogic= new cotizacion_logic($this->connexion);
					$cotizacion->setid_estado($estado->getId());
					cotizacion_data::save($cotizacion,$this->connexion);
					$cotizacionLogic->deepSave($cotizacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estado->getasientos() as $asiento) {
					$asientoLogic= new asiento_logic($this->connexion);
					$asiento->setid_estado($estado->getId());
					asiento_data::save($asiento,$this->connexion);
					$asientoLogic->deepSave($asiento,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {



		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_corriente_detalle::$class);

			foreach($estado->getcuenta_corriente_detalles() as $cuentacorrientedetalle) {
				$cuentacorrientedetalleLogic= new cuenta_corriente_detalle_logic($this->connexion);
				$cuentacorrientedetalle->setid_estado($estado->getId());
				cuenta_corriente_detalle_data::save($cuentacorrientedetalle,$this->connexion);
				$cuentacorrientedetalleLogic->deepSave($cuentacorrientedetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_cobrar::$class);

			foreach($estado->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
				$creditocuentacobrarLogic= new credito_cuenta_cobrar_logic($this->connexion);
				$creditocuentacobrar->setid_estado($estado->getId());
				credito_cuenta_cobrar_data::save($creditocuentacobrar,$this->connexion);
				$creditocuentacobrarLogic->deepSave($creditocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_cobrar::$class);

			foreach($estado->getpago_cuenta_cobrars() as $pagocuentacobrar) {
				$pagocuentacobrarLogic= new pago_cuenta_cobrar_logic($this->connexion);
				$pagocuentacobrar->setid_estado($estado->getId());
				pago_cuenta_cobrar_data::save($pagocuentacobrar,$this->connexion);
				$pagocuentacobrarLogic->deepSave($pagocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_cobrar_detalle::$class);

			foreach($estado->getcuenta_cobrar_detalles() as $cuentacobrardetalle) {
				$cuentacobrardetalleLogic= new cuenta_cobrar_detalle_logic($this->connexion);
				$cuentacobrardetalle->setid_estado($estado->getId());
				cuenta_cobrar_detalle_data::save($cuentacobrardetalle,$this->connexion);
				$cuentacobrardetalleLogic->deepSave($cuentacobrardetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(kardex::$class);

			foreach($estado->getkardexs() as $kardex) {
				$kardexLogic= new kardex_logic($this->connexion);
				$kardex->setid_estado($estado->getId());
				kardex_data::save($kardex,$this->connexion);
				$kardexLogic->deepSave($kardex,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_pagar_detalle::$class);

			foreach($estado->getcuenta_pagar_detalles() as $cuentapagardetalle) {
				$cuentapagardetalleLogic= new cuenta_pagar_detalle_logic($this->connexion);
				$cuentapagardetalle->setid_estado($estado->getId());
				cuenta_pagar_detalle_data::save($cuentapagardetalle,$this->connexion);
				$cuentapagardetalleLogic->deepSave($cuentapagardetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion::$class);

			foreach($estado->getdevolucions() as $devolucion) {
				$devolucionLogic= new devolucion_logic($this->connexion);
				$devolucion->setid_estado($estado->getId());
				devolucion_data::save($devolucion,$this->connexion);
				$devolucionLogic->deepSave($devolucion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion_factura::$class);

			foreach($estado->getdevolucion_facturas() as $devolucionfactura) {
				$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
				$devolucionfactura->setid_estado($estado->getId());
				devolucion_factura_data::save($devolucionfactura,$this->connexion);
				$devolucionfacturaLogic->deepSave($devolucionfactura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura::$class);

			foreach($estado->getfacturas() as $factura) {
				$facturaLogic= new factura_logic($this->connexion);
				$factura->setid_estado($estado->getId());
				factura_data::save($factura,$this->connexion);
				$facturaLogic->deepSave($factura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_cobrar::$class);

			foreach($estado->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
				$debitocuentacobrarLogic= new debito_cuenta_cobrar_logic($this->connexion);
				$debitocuentacobrar->setid_estado($estado->getId());
				debito_cuenta_cobrar_data::save($debitocuentacobrar,$this->connexion);
				$debitocuentacobrarLogic->deepSave($debitocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(consignacion::$class);

			foreach($estado->getconsignacions() as $consignacion) {
				$consignacionLogic= new consignacion_logic($this->connexion);
				$consignacion->setid_estado($estado->getId());
				consignacion_data::save($consignacion,$this->connexion);
				$consignacionLogic->deepSave($consignacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_pagar::$class);

			foreach($estado->getpago_cuenta_pagars() as $pagocuentapagar) {
				$pagocuentapagarLogic= new pago_cuenta_pagar_logic($this->connexion);
				$pagocuentapagar->setid_estado($estado->getId());
				pago_cuenta_pagar_data::save($pagocuentapagar,$this->connexion);
				$pagocuentapagarLogic->deepSave($pagocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura_lote::$class);

			foreach($estado->getfactura_lotes() as $facturalote) {
				$facturaloteLogic= new factura_lote_logic($this->connexion);
				$facturalote->setid_estado($estado->getId());
				factura_lote_data::save($facturalote,$this->connexion);
				$facturaloteLogic->deepSave($facturalote,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_pagar::$class);

			foreach($estado->getdebito_cuenta_pagars() as $debitocuentapagar) {
				$debitocuentapagarLogic= new debito_cuenta_pagar_logic($this->connexion);
				$debitocuentapagar->setid_estado($estado->getId());
				debito_cuenta_pagar_data::save($debitocuentapagar,$this->connexion);
				$debitocuentapagarLogic->deepSave($debitocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(orden_compra::$class);

			foreach($estado->getorden_compras() as $ordencompra) {
				$ordencompraLogic= new orden_compra_logic($this->connexion);
				$ordencompra->setid_estado($estado->getId());
				orden_compra_data::save($ordencompra,$this->connexion);
				$ordencompraLogic->deepSave($ordencompra,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(estimado::$class);

			foreach($estado->getestimados() as $estimado) {
				$estimadoLogic= new estimado_logic($this->connexion);
				$estimado->setid_estado($estado->getId());
				estimado_data::save($estimado,$this->connexion);
				$estimadoLogic->deepSave($estimado,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_pagar::$class);

			foreach($estado->getcredito_cuenta_pagars() as $creditocuentapagar) {
				$creditocuentapagarLogic= new credito_cuenta_pagar_logic($this->connexion);
				$creditocuentapagar->setid_estado($estado->getId());
				credito_cuenta_pagar_data::save($creditocuentapagar,$this->connexion);
				$creditocuentapagarLogic->deepSave($creditocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cotizacion::$class);

			foreach($estado->getcotizacions() as $cotizacion) {
				$cotizacionLogic= new cotizacion_logic($this->connexion);
				$cotizacion->setid_estado($estado->getId());
				cotizacion_data::save($cotizacion,$this->connexion);
				$cotizacionLogic->deepSave($cotizacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento::$class);

			foreach($estado->getasientos() as $asiento) {
				$asientoLogic= new asiento_logic($this->connexion);
				$asiento->setid_estado($estado->getId());
				asiento_data::save($asiento,$this->connexion);
				$asientoLogic->deepSave($asiento,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				estado_data::save($estado, $this->connexion);
			}
			
		}catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}	
		
		if($existe!=null);
	}
		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			$this->deepLoad($this->estado,$isDeep,$deepLoadType,$clases);		
			
			$this->connexion->getConnection()->commit();			
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		} finally {
			$this->closeNewConnexionToDeep();
  		}
	}
	
	public function deepLoadsWithConnection(bool $isDeep,string $deepLoadType, array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			foreach($this->estados as $estado) {
				$this->deepLoad($estado,$isDeep,$deepLoadType,$clases);
								
				estado_util::refrescarFKDescripciones($this->estados);
			}
			
			Funciones::resetearActivoClasses($clases);
								
			$this->connexion->getConnection()->commit();			
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		} finally{
			$this->closeNewConnexionToDeep();
  		}
	}
	
	public function deepLoads(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			
			foreach($this->estados as $estado) {
				$this->deepLoad($estado,$isDeep,$deepLoadType,$clases);
				
				Funciones::resetearActivoClasses($clases);
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
		
	public function deepSaveWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {	
			$this->getNewConnexionToDeep();
			
			$this->deepSave($this->estado,$isDeep,$deepLoadType,$clases,false);	
			
			$this->connexion->getConnection()->commit();			
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		} finally {
			$this->closeNewConnexionToDeep();
  		}
	}
	
	public function deepSavesWithConnection(bool $isDeep,string $deepLoadType, array $clases,string $strTituloMensaje) {		
		try {				
			$this->getNewConnexionToDeep();
			
			foreach($this->estados as $estado) {
				$this->deepSave($estado,$isDeep,$deepLoadType,$clases,false);
				Funciones::resetearActivoClasses($clases);
			}		
			
			$this->connexion->getConnection()->commit();
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		} finally {
			$this->closeNewConnexionToDeep();
  		}
	}
	
	public function deepSaves(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {				
			foreach($this->estados as $estado) {
				$this->deepSave($estado,$isDeep,$deepLoadType,$clases,false);
				Funciones::resetearActivoClasses($clases);
			}		
					
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function getClassesFKsOf(array $classesP,string $deepLoadType) : array {
		try {
			$classes=array();	
			
			if($deepLoadType==DeepLoadType::$NONE) {
				
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	public static function getClassesRelsOf(array $classesP,string $deepLoadType) : array {
		try {
			 $classes=array();			
			
			if($deepLoadType==DeepLoadType::$NONE) {
				
				$classes[]=new Classe(cuenta_corriente_detalle::$class);
				$classes[]=new Classe(credito_cuenta_cobrar::$class);
				$classes[]=new Classe(pago_cuenta_cobrar::$class);
				$classes[]=new Classe(cuenta_cobrar_detalle::$class);
				$classes[]=new Classe(kardex::$class);
				$classes[]=new Classe(cuenta_pagar_detalle::$class);
				$classes[]=new Classe(devolucion::$class);
				$classes[]=new Classe(devolucion_factura::$class);
				$classes[]=new Classe(factura::$class);
				$classes[]=new Classe(debito_cuenta_cobrar::$class);
				$classes[]=new Classe(consignacion::$class);
				$classes[]=new Classe(pago_cuenta_pagar::$class);
				$classes[]=new Classe(factura_lote::$class);
				$classes[]=new Classe(debito_cuenta_pagar::$class);
				$classes[]=new Classe(orden_compra::$class);
				$classes[]=new Classe(estimado::$class);
				$classes[]=new Classe(credito_cuenta_pagar::$class);
				$classes[]=new Classe(cotizacion::$class);
				$classes[]=new Classe(asiento::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==cuenta_corriente_detalle::$class) {
						$classes[]=new Classe(cuenta_corriente_detalle::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==credito_cuenta_cobrar::$class) {
						$classes[]=new Classe(credito_cuenta_cobrar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==pago_cuenta_cobrar::$class) {
						$classes[]=new Classe(pago_cuenta_cobrar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==cuenta_cobrar_detalle::$class) {
						$classes[]=new Classe(cuenta_cobrar_detalle::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==kardex::$class) {
						$classes[]=new Classe(kardex::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==cuenta_pagar_detalle::$class) {
						$classes[]=new Classe(cuenta_pagar_detalle::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==devolucion::$class) {
						$classes[]=new Classe(devolucion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==devolucion_factura::$class) {
						$classes[]=new Classe(devolucion_factura::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==factura::$class) {
						$classes[]=new Classe(factura::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==debito_cuenta_cobrar::$class) {
						$classes[]=new Classe(debito_cuenta_cobrar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==consignacion::$class) {
						$classes[]=new Classe(consignacion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==pago_cuenta_pagar::$class) {
						$classes[]=new Classe(pago_cuenta_pagar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==factura_lote::$class) {
						$classes[]=new Classe(factura_lote::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==debito_cuenta_pagar::$class) {
						$classes[]=new Classe(debito_cuenta_pagar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==orden_compra::$class) {
						$classes[]=new Classe(orden_compra::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==estimado::$class) {
						$classes[]=new Classe(estimado::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==credito_cuenta_pagar::$class) {
						$classes[]=new Classe(credito_cuenta_pagar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==cotizacion::$class) {
						$classes[]=new Classe(cotizacion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==asiento::$class) {
						$classes[]=new Classe(asiento::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==cuenta_corriente_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_corriente_detalle::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==credito_cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(credito_cuenta_cobrar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==pago_cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(pago_cuenta_cobrar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==cuenta_cobrar_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_cobrar_detalle::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==kardex::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(kardex::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==cuenta_pagar_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_pagar_detalle::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==devolucion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(devolucion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==devolucion_factura::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(devolucion_factura::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==factura::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(factura::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==debito_cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(debito_cuenta_cobrar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==consignacion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(consignacion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==pago_cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(pago_cuenta_pagar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==factura_lote::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(factura_lote::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==debito_cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(debito_cuenta_pagar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==orden_compra::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(orden_compra::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==estimado::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(estimado::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==credito_cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(credito_cuenta_pagar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==cotizacion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cotizacion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==asiento::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getestado() : ?estado {	
		/*
		estado_logic_add::checkestadoToGet($this->estado,$this->datosCliente);
		estado_logic_add::updateestadoToGet($this->estado);
		*/
			
		return $this->estado;
	}
		
	public function setestado(estado $newestado) {
		$this->estado = $newestado;
	}
	
	public function getestados() : array {		
		/*
		estado_logic_add::checkestadoToGets($this->estados,$this->datosCliente);
		
		foreach ($this->estados as $estadoLocal ) {
			estado_logic_add::updateestadoToGet($estadoLocal);
		}
		*/
		
		return $this->estados;
	}
	
	public function setestados(array $newestados) {
		$this->estados = $newestados;
	}
	
	public function getestadoDataAccess() : estado_data {
		return $this->estadoDataAccess;
	}
	
	public function setestadoDataAccess(estado_data $newestadoDataAccess) {
		$this->estadoDataAccess = $newestadoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        estado_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		clasificacion_cheque_logic::$logger;
		kardex_detalle_logic::$logger;
		devolucion_detalle_logic::$logger;
		devolucion_factura_detalle_logic::$logger;
		factura_detalle_logic::$logger;
    }
	
	
	/*
		executeQuery,executeQueryValor
		getTodos,getsFK_Idempresa
		getEntity,getEntityWithFinalQuery
		getEntities,getEntitiesWithFinalQuery
		getEntitiesWithQuerySelect,getEntitiesWithQuerySelect
		getEntitiesSimpleQueryBuild
		save,saves
		saveRelaciones,saveRelacionesDetalles
		quitarEliminados,deleteCascade
		loadFKsDescription
		cargarCombosLoteFK
		procesarAccions,procesarEventos,procesarPostAccions
		cargarArchivosPaquetesForeignKeys,cargarArchivosPaquetesRelaciones
		getClassesFKsOf,getClassesRelsOf
		getentity,getentities
		deepLoad,deepSave
	*/
}
?>
