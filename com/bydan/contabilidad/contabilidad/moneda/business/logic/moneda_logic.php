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

namespace com\bydan\contabilidad\contabilidad\moneda\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\moneda\util\moneda_carga;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_param_return;

use com\bydan\contabilidad\contabilidad\moneda\presentation\session\moneda_session;

use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\ParameterDbType;


use com\bydan\framework\contabilidad\util\ParameterType;
use com\bydan\framework\contabilidad\util\ParameterTypeOperator;
use com\bydan\framework\contabilidad\business\logic\ParameterSelectionGeneral;

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

use com\bydan\contabilidad\contabilidad\moneda\util\moneda_util;
use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;
use com\bydan\contabilidad\contabilidad\moneda\business\data\moneda_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


use com\bydan\contabilidad\facturacion\devolucion_factura\business\entity\devolucion_factura;
use com\bydan\contabilidad\facturacion\devolucion_factura\business\data\devolucion_factura_data;
use com\bydan\contabilidad\facturacion\devolucion_factura\business\logic\devolucion_factura_logic;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;

use com\bydan\contabilidad\facturacion\factura_lote\business\entity\factura_lote;
use com\bydan\contabilidad\facturacion\factura_lote\business\data\factura_lote_data;
use com\bydan\contabilidad\facturacion\factura_lote\business\logic\factura_lote_logic;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_carga;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;

use com\bydan\contabilidad\estimados\estimado\business\entity\estimado;
use com\bydan\contabilidad\estimados\estimado\business\data\estimado_data;
use com\bydan\contabilidad\estimados\estimado\business\logic\estimado_logic;
use com\bydan\contabilidad\estimados\estimado\util\estimado_carga;
use com\bydan\contabilidad\estimados\estimado\util\estimado_util;

use com\bydan\contabilidad\inventario\devolucion\business\entity\devolucion;
use com\bydan\contabilidad\inventario\devolucion\business\data\devolucion_data;
use com\bydan\contabilidad\inventario\devolucion\business\logic\devolucion_logic;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_carga;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_util;

use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;
use com\bydan\contabilidad\inventario\orden_compra\business\data\orden_compra_data;
use com\bydan\contabilidad\inventario\orden_compra\business\logic\orden_compra_logic;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;

use com\bydan\contabilidad\facturacion\factura\business\entity\factura;
use com\bydan\contabilidad\facturacion\factura\business\data\factura_data;
use com\bydan\contabilidad\facturacion\factura\business\logic\factura_logic;
use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;

use com\bydan\contabilidad\inventario\cotizacion\business\entity\cotizacion;
use com\bydan\contabilidad\inventario\cotizacion\business\data\cotizacion_data;
use com\bydan\contabilidad\inventario\cotizacion\business\logic\cotizacion_logic;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_carga;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_util;

use com\bydan\contabilidad\general\parametro_general\business\entity\parametro_general;
use com\bydan\contabilidad\general\parametro_general\business\data\parametro_general_data;
use com\bydan\contabilidad\general\parametro_general\business\logic\parametro_general_logic;
use com\bydan\contabilidad\general\parametro_general\util\parametro_general_carga;
use com\bydan\contabilidad\general\parametro_general\util\parametro_general_util;

use com\bydan\contabilidad\estimados\consignacion\business\entity\consignacion;
use com\bydan\contabilidad\estimados\consignacion\business\data\consignacion_data;
use com\bydan\contabilidad\estimados\consignacion\business\logic\consignacion_logic;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_carga;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;

//REL DETALLES

use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\util\devolucion_factura_detalle_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\business\logic\devolucion_factura_detalle_logic;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\util\factura_lote_detalle_carga;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\business\logic\factura_lote_detalle_logic;
use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_carga;
use com\bydan\contabilidad\facturacion\factura_modelo\business\logic\factura_modelo_logic;
use com\bydan\contabilidad\estimados\imagen_estimado\util\imagen_estimado_carga;
use com\bydan\contabilidad\estimados\imagen_estimado\business\logic\imagen_estimado_logic;
use com\bydan\contabilidad\estimados\estimado_detalle\util\estimado_detalle_carga;
use com\bydan\contabilidad\estimados\estimado_detalle\business\logic\estimado_detalle_logic;
use com\bydan\contabilidad\inventario\devolucion_detalle\util\devolucion_detalle_carga;
use com\bydan\contabilidad\inventario\devolucion_detalle\business\logic\devolucion_detalle_logic;
use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_carga;
use com\bydan\contabilidad\inventario\orden_compra_detalle\business\logic\orden_compra_detalle_logic;



class moneda_logic  extends GeneralEntityLogic implements moneda_logicI {	
	/*GENERAL*/
	public moneda_data $monedaDataAccess;
	//public ?moneda_logic_add $monedaLogicAdditional=null;
	public ?moneda $moneda;
	public array $monedas;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->monedaDataAccess = new moneda_data();			
			$this->monedas = array();
			$this->moneda = new moneda();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->monedaLogicAdditional = new moneda_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->monedaLogicAdditional==null) {
		//	$this->monedaLogicAdditional=new moneda_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->monedaDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->monedaDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->monedaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->monedaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->monedas = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->monedas=$this->monedaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				moneda_util::refrescarFKDescripciones($this->monedas);
			}
			
			//moneda_logic_add::checkmonedaToGets($this->monedas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->monedas);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->monedas = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->monedas=$this->monedaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				moneda_util::refrescarFKDescripciones($this->monedas);
			}
			
			//moneda_logic_add::checkmonedaToGets($this->monedas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->monedas);
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
		$this->moneda = new moneda();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->moneda=$this->monedaDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->moneda,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				moneda_util::refrescarFKDescripcion($this->moneda);
			}
						
			//moneda_logic_add::checkmonedaToGet($this->moneda,$this->datosCliente);
			//moneda_logic_add::updatemonedaToGet($this->moneda);
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
		$this->moneda = new  moneda();
		  		  
        try {		
			$this->moneda=$this->monedaDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->moneda,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				moneda_util::refrescarFKDescripcion($this->moneda);
			}
			
			//moneda_logic_add::checkmonedaToGet($this->moneda,$this->datosCliente);
			//moneda_logic_add::updatemonedaToGet($this->moneda);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?moneda {
		$monedaLogic = new  moneda_logic();
		  		  
        try {		
			$monedaLogic->setConnexion($connexion);			
			$monedaLogic->getEntity($id);			
			return $monedaLogic->getmoneda();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->moneda = new  moneda();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->moneda=$this->monedaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->moneda,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				moneda_util::refrescarFKDescripcion($this->moneda);
			}
			
			//moneda_logic_add::checkmonedaToGet($this->moneda,$this->datosCliente);
			//moneda_logic_add::updatemonedaToGet($this->moneda);
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
		$this->moneda = new  moneda();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->moneda=$this->monedaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->moneda,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				moneda_util::refrescarFKDescripcion($this->moneda);
			}
			
			//moneda_logic_add::checkmonedaToGet($this->moneda,$this->datosCliente);
			//moneda_logic_add::updatemonedaToGet($this->moneda);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?moneda {
		$monedaLogic = new  moneda_logic();
		  		  
        try {		
			$monedaLogic->setConnexion($connexion);			
			$monedaLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $monedaLogic->getmoneda();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->monedas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->monedas=$this->monedaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				moneda_util::refrescarFKDescripciones($this->monedas);
			}
			
			//moneda_logic_add::checkmonedaToGets($this->monedas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->monedas);			
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
		$this->monedas = array();
		  		  
        try {			
			$this->monedas=$this->monedaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				moneda_util::refrescarFKDescripciones($this->monedas);
			}
			
			//moneda_logic_add::checkmonedaToGets($this->monedas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->monedas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->monedas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->monedas=$this->monedaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				moneda_util::refrescarFKDescripciones($this->monedas);
			}
			
			//moneda_logic_add::checkmonedaToGets($this->monedas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->monedas);
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
		$this->monedas = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->monedas=$this->monedaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				moneda_util::refrescarFKDescripciones($this->monedas);
			}
			
			//moneda_logic_add::checkmonedaToGets($this->monedas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->monedas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$monedaLogic = new  moneda_logic();
		  		  
        try {		
			$monedaLogic->setConnexion($connexion);			
			$monedaLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $monedaLogic->getmonedas();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->monedas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->monedas=$this->monedaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				moneda_util::refrescarFKDescripciones($this->monedas);
			}
			
			//moneda_logic_add::checkmonedaToGets($this->monedas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->monedas);
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
		$this->monedas = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->monedas=$this->monedaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				moneda_util::refrescarFKDescripciones($this->monedas);
			}
			
			//moneda_logic_add::checkmonedaToGets($this->monedas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->monedas);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->monedas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->monedas=$this->monedaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				moneda_util::refrescarFKDescripciones($this->monedas);
			}
			
			//moneda_logic_add::checkmonedaToGets($this->monedas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->monedas);
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
		$this->monedas = array();
		  		  
        try {			
			$this->monedas=$this->monedaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				moneda_util::refrescarFKDescripciones($this->monedas);
			}	
			
			//moneda_logic_add::checkmonedaToGets($this->monedas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->monedas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->monedas = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->monedas=$this->monedaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				moneda_util::refrescarFKDescripciones($this->monedas);
			}
			
			//moneda_logic_add::checkmonedaToGets($this->monedas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->monedas);
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
		$this->monedas = array();
		  		  
        try {		
			$this->monedas=$this->monedaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				moneda_util::refrescarFKDescripciones($this->monedas);
			}
			
			//moneda_logic_add::checkmonedaToGets($this->monedas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->monedas);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdempresaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_empresa) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_empresa= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,moneda_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->monedas=$this->monedaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				moneda_util::refrescarFKDescripciones($this->monedas);
			}
			//moneda_logic_add::checkmonedaToGets($this->monedas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->monedas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idempresa(string $strFinalQuery,Pagination $pagination,int $id_empresa) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_empresa= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,moneda_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->monedas=$this->monedaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				moneda_util::refrescarFKDescripciones($this->monedas);
			}
			//moneda_logic_add::checkmonedaToGets($this->monedas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->monedas);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
		
	
	/*MANTENIMIENTO*/
	public function saveWithConnection() {	
		 try {	
			$this->connexion = Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
						
			//moneda_logic_add::checkmonedaToSave($this->moneda,$this->datosCliente,$this->connexion);	       
			//moneda_logic_add::updatemonedaToSave($this->moneda);			
			moneda_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->moneda,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->monedaLogicAdditional->checkGeneralEntityToSave($this,$this->moneda,$this->datosCliente,$this->connexion);
			
			
			moneda_data::save($this->moneda, $this->connexion);	    	       	 				
			//moneda_logic_add::checkmonedaToSaveAfter($this->moneda,$this->datosCliente,$this->connexion);			
			//$this->monedaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->moneda,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->moneda,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->moneda,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				moneda_util::refrescarFKDescripcion($this->moneda);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->moneda->getIsDeleted()) {
				$this->moneda=null;
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
						
			/*moneda_logic_add::checkmonedaToSave($this->moneda,$this->datosCliente,$this->connexion);*/	        
			//moneda_logic_add::updatemonedaToSave($this->moneda);			
			//$this->monedaLogicAdditional->checkGeneralEntityToSave($this,$this->moneda,$this->datosCliente,$this->connexion);			
			moneda_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->moneda,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			moneda_data::save($this->moneda, $this->connexion);	    	       	 						
			/*moneda_logic_add::checkmonedaToSaveAfter($this->moneda,$this->datosCliente,$this->connexion);*/			
			//$this->monedaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->moneda,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->moneda,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->moneda,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				moneda_util::refrescarFKDescripcion($this->moneda);				
			}
			
			if($this->moneda->getIsDeleted()) {
				$this->moneda=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(moneda $moneda,Connexion $connexion)  {
		$monedaLogic = new  moneda_logic();		  		  
        try {		
			$monedaLogic->setConnexion($connexion);			
			$monedaLogic->setmoneda($moneda);			
			$monedaLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*moneda_logic_add::checkmonedaToSaves($this->monedas,$this->datosCliente,$this->connexion);*/	        	
			//$this->monedaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->monedas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->monedas as $monedaLocal) {				
								
				//moneda_logic_add::updatemonedaToSave($monedaLocal);	        	
				moneda_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$monedaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				moneda_data::save($monedaLocal, $this->connexion);				
			}
			
			/*moneda_logic_add::checkmonedaToSavesAfter($this->monedas,$this->datosCliente,$this->connexion);*/			
			//$this->monedaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->monedas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				moneda_util::refrescarFKDescripciones($this->monedas);
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
			/*moneda_logic_add::checkmonedaToSaves($this->monedas,$this->datosCliente,$this->connexion);*/			
			//$this->monedaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->monedas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->monedas as $monedaLocal) {				
								
				//moneda_logic_add::updatemonedaToSave($monedaLocal);	        	
				moneda_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$monedaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				moneda_data::save($monedaLocal, $this->connexion);				
			}			
			
			/*moneda_logic_add::checkmonedaToSavesAfter($this->monedas,$this->datosCliente,$this->connexion);*/			
			//$this->monedaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->monedas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				moneda_util::refrescarFKDescripciones($this->monedas);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $monedas,Connexion $connexion)  {
		$monedaLogic = new  moneda_logic();
		  		  
        try {		
			$monedaLogic->setConnexion($connexion);			
			$monedaLogic->setmonedas($monedas);			
			$monedaLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$monedasAux=array();
		
		foreach($this->monedas as $moneda) {
			if($moneda->getIsDeleted()==false) {
				$monedasAux[]=$moneda;
			}
		}
		
		$this->monedas=$monedasAux;
	}
	
	public function updateToGetsAuxiliar(array &$monedas) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->monedas as $moneda) {
				
				$moneda->setid_empresa_Descripcion(moneda_util::getempresaDescripcion($moneda->getempresa()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$moneda_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$moneda_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$moneda_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$moneda_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$moneda_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$monedaForeignKey=new moneda_param_return();//monedaForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$monedaForeignKey,$moneda_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$monedaForeignKey,$moneda_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $monedaForeignKey;
			
		} catch(Exception $e) {
			
			if($conWithConnection) {
				$this->connexion->getConnection()->rollback();						
			}
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
		} finally {
			if($conWithConnection) {
				$this->connexion->getConnection()->close();	
			}
		}
	}
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$monedaForeignKey,$moneda_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$monedaForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($moneda_session==null) {
			$moneda_session=new moneda_session();
		}
		
		if($moneda_session->bitBusquedaDesdeFKSesionempresa!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=empresa_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalempresa=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalempresa=Funciones::GetFinalQueryAppend($finalQueryGlobalempresa, '');
				$finalQueryGlobalempresa.=empresa_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalempresa.$strRecargarFkQuery;		

				$empresaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($empresaLogic->getempresas() as $empresaLocal ) {
				if($monedaForeignKey->idempresaDefaultFK==0) {
					$monedaForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$monedaForeignKey->empresasFK[$empresaLocal->getId()]=moneda_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($moneda_session->bigidempresaActual!=null && $moneda_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($moneda_session->bigidempresaActual);//WithConnection

				$monedaForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=moneda_util::getempresaDescripcion($empresaLogic->getempresa());
				$monedaForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($moneda,$devolucionfacturas,$facturalotes,$estimados,$devolucions,$ordencompras,$facturas,$cotizacions,$parametrogenerals,$consignacions) {
		$this->saveRelacionesBase($moneda,$devolucionfacturas,$facturalotes,$estimados,$devolucions,$ordencompras,$facturas,$cotizacions,$parametrogenerals,$consignacions,true);
	}

	public function saveRelaciones($moneda,$devolucionfacturas,$facturalotes,$estimados,$devolucions,$ordencompras,$facturas,$cotizacions,$parametrogenerals,$consignacions) {
		$this->saveRelacionesBase($moneda,$devolucionfacturas,$facturalotes,$estimados,$devolucions,$ordencompras,$facturas,$cotizacions,$parametrogenerals,$consignacions,false);
	}

	public function saveRelacionesBase($moneda,$devolucionfacturas=array(),$facturalotes=array(),$estimados=array(),$devolucions=array(),$ordencompras=array(),$facturas=array(),$cotizacions=array(),$parametrogenerals=array(),$consignacions=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$moneda->setdevolucion_facturas($devolucionfacturas);
			$moneda->setfactura_lotes($facturalotes);
			$moneda->setestimados($estimados);
			$moneda->setdevolucions($devolucions);
			$moneda->setorden_compras($ordencompras);
			$moneda->setfacturas($facturas);
			$moneda->setcotizacions($cotizacions);
			$moneda->setparametro_generals($parametrogenerals);
			$moneda->setconsignacions($consignacions);
			$this->setmoneda($moneda);

			if(true) {

				//moneda_logic_add::updateRelacionesToSave($moneda,$this);

				if(($this->moneda->getIsNew() || $this->moneda->getIsChanged()) && !$this->moneda->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($devolucionfacturas,$facturalotes,$estimados,$devolucions,$ordencompras,$facturas,$cotizacions,$parametrogenerals,$consignacions);

				} else if($this->moneda->getIsDeleted()) {
					$this->saveRelacionesDetalles($devolucionfacturas,$facturalotes,$estimados,$devolucions,$ordencompras,$facturas,$cotizacions,$parametrogenerals,$consignacions);
					$this->save();
				}

				//moneda_logic_add::updateRelacionesToSaveAfter($moneda,$this);

			} else {
				throw new Exception('LOS DATOS SON INVALIDOS');
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
	
	
	public function saveRelacionesDetalles($devolucionfacturas=array(),$facturalotes=array(),$estimados=array(),$devolucions=array(),$ordencompras=array(),$facturas=array(),$cotizacions=array(),$parametrogenerals=array(),$consignacions=array()) {
		try {
	

			$idmonedaActual=$this->getmoneda()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/devolucion_factura_carga.php');
			devolucion_factura_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$devolucionfacturaLogic_Desde_moneda=new devolucion_factura_logic();
			$devolucionfacturaLogic_Desde_moneda->setdevolucion_facturas($devolucionfacturas);

			$devolucionfacturaLogic_Desde_moneda->setConnexion($this->getConnexion());
			$devolucionfacturaLogic_Desde_moneda->setDatosCliente($this->datosCliente);

			foreach($devolucionfacturaLogic_Desde_moneda->getdevolucion_facturas() as $devolucionfactura_Desde_moneda) {
				$devolucionfactura_Desde_moneda->setid_moneda($idmonedaActual);

				$devolucionfacturaLogic_Desde_moneda->setdevolucion_factura($devolucionfactura_Desde_moneda);
				$devolucionfacturaLogic_Desde_moneda->save();

				$iddevolucion_facturaActual=$devolucion_factura_Desde_moneda->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/devolucion_factura_detalle_carga.php');
				devolucion_factura_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$devolucionfacturadetalleLogic_Desde_devolucion_factura=new devolucion_factura_detalle_logic();

				if($devolucion_factura_Desde_moneda->getdevolucion_factura_detalles()==null){
					$devolucion_factura_Desde_moneda->setdevolucion_factura_detalles(array());
				}

				$devolucionfacturadetalleLogic_Desde_devolucion_factura->setdevolucion_factura_detalles($devolucion_factura_Desde_moneda->getdevolucion_factura_detalles());

				$devolucionfacturadetalleLogic_Desde_devolucion_factura->setConnexion($this->getConnexion());
				$devolucionfacturadetalleLogic_Desde_devolucion_factura->setDatosCliente($this->datosCliente);

				foreach($devolucionfacturadetalleLogic_Desde_devolucion_factura->getdevolucion_factura_detalles() as $devolucionfacturadetalle_Desde_devolucion_factura) {
					$devolucionfacturadetalle_Desde_devolucion_factura->setid_devolucion_factura($iddevolucion_facturaActual);
				}

				$devolucionfacturadetalleLogic_Desde_devolucion_factura->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_lote_carga.php');
			factura_lote_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$facturaloteLogic_Desde_moneda=new factura_lote_logic();
			$facturaloteLogic_Desde_moneda->setfactura_lotes($facturalotes);

			$facturaloteLogic_Desde_moneda->setConnexion($this->getConnexion());
			$facturaloteLogic_Desde_moneda->setDatosCliente($this->datosCliente);

			foreach($facturaloteLogic_Desde_moneda->getfactura_lotes() as $facturalote_Desde_moneda) {
				$facturalote_Desde_moneda->setid_moneda($idmonedaActual);

				$facturaloteLogic_Desde_moneda->setfactura_lote($facturalote_Desde_moneda);
				$facturaloteLogic_Desde_moneda->save();

				$idfactura_loteActual=$factura_lote_Desde_moneda->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_lote_detalle_carga.php');
				factura_lote_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$facturalotedetalleLogic_Desde_factura_lote=new factura_lote_detalle_logic();

				if($factura_lote_Desde_moneda->getfactura_lote_detalles()==null){
					$factura_lote_Desde_moneda->setfactura_lote_detalles(array());
				}

				$facturalotedetalleLogic_Desde_factura_lote->setfactura_lote_detalles($factura_lote_Desde_moneda->getfactura_lote_detalles());

				$facturalotedetalleLogic_Desde_factura_lote->setConnexion($this->getConnexion());
				$facturalotedetalleLogic_Desde_factura_lote->setDatosCliente($this->datosCliente);

				foreach($facturalotedetalleLogic_Desde_factura_lote->getfactura_lote_detalles() as $facturalotedetalle_Desde_factura_lote) {
					$facturalotedetalle_Desde_factura_lote->setid_factura_lote($idfactura_loteActual);
				}

				$facturalotedetalleLogic_Desde_factura_lote->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_modelo_carga.php');
				factura_modelo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$facturamodeloLogic_Desde_factura_lote=new factura_modelo_logic();

				if($factura_lote_Desde_moneda->getfactura_modelos()==null){
					$factura_lote_Desde_moneda->setfactura_modelos(array());
				}

				$facturamodeloLogic_Desde_factura_lote->setfactura_modelos($factura_lote_Desde_moneda->getfactura_modelos());

				$facturamodeloLogic_Desde_factura_lote->setConnexion($this->getConnexion());
				$facturamodeloLogic_Desde_factura_lote->setDatosCliente($this->datosCliente);

				foreach($facturamodeloLogic_Desde_factura_lote->getfactura_modelos() as $facturamodelo_Desde_factura_lote) {
					$facturamodelo_Desde_factura_lote->setid_factura_lote($idfactura_loteActual);
				}

				$facturamodeloLogic_Desde_factura_lote->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/estimado_carga.php');
			estimado_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$estimadoLogic_Desde_moneda=new estimado_logic();
			$estimadoLogic_Desde_moneda->setestimados($estimados);

			$estimadoLogic_Desde_moneda->setConnexion($this->getConnexion());
			$estimadoLogic_Desde_moneda->setDatosCliente($this->datosCliente);

			foreach($estimadoLogic_Desde_moneda->getestimados() as $estimado_Desde_moneda) {
				$estimado_Desde_moneda->setid_moneda($idmonedaActual);

				$estimadoLogic_Desde_moneda->setestimado($estimado_Desde_moneda);
				$estimadoLogic_Desde_moneda->save();

				$idestimadoActual=$estimado_Desde_moneda->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/imagen_estimado_carga.php');
				imagen_estimado_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$imagenestimadoLogic_Desde_estimado=new imagen_estimado_logic();

				if($estimado_Desde_moneda->getimagen_estimados()==null){
					$estimado_Desde_moneda->setimagen_estimados(array());
				}

				$imagenestimadoLogic_Desde_estimado->setimagen_estimados($estimado_Desde_moneda->getimagen_estimados());

				$imagenestimadoLogic_Desde_estimado->setConnexion($this->getConnexion());
				$imagenestimadoLogic_Desde_estimado->setDatosCliente($this->datosCliente);

				foreach($imagenestimadoLogic_Desde_estimado->getimagen_estimados() as $imagenestimado_Desde_estimado) {
					$imagenestimado_Desde_estimado->setid_estimado($idestimadoActual);
				}

				$imagenestimadoLogic_Desde_estimado->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/estimado_detalle_carga.php');
				estimado_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$estimadodetalleLogic_Desde_estimado=new estimado_detalle_logic();

				if($estimado_Desde_moneda->getestimado_detalles()==null){
					$estimado_Desde_moneda->setestimado_detalles(array());
				}

				$estimadodetalleLogic_Desde_estimado->setestimado_detalles($estimado_Desde_moneda->getestimado_detalles());

				$estimadodetalleLogic_Desde_estimado->setConnexion($this->getConnexion());
				$estimadodetalleLogic_Desde_estimado->setDatosCliente($this->datosCliente);

				foreach($estimadodetalleLogic_Desde_estimado->getestimado_detalles() as $estimadodetalle_Desde_estimado) {
					$estimadodetalle_Desde_estimado->setid_estimado($idestimadoActual);
				}

				$estimadodetalleLogic_Desde_estimado->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/devolucion_carga.php');
			devolucion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$devolucionLogic_Desde_moneda=new devolucion_logic();
			$devolucionLogic_Desde_moneda->setdevolucions($devolucions);

			$devolucionLogic_Desde_moneda->setConnexion($this->getConnexion());
			$devolucionLogic_Desde_moneda->setDatosCliente($this->datosCliente);

			foreach($devolucionLogic_Desde_moneda->getdevolucions() as $devolucion_Desde_moneda) {
				$devolucion_Desde_moneda->setid_moneda($idmonedaActual);

				$devolucionLogic_Desde_moneda->setdevolucion($devolucion_Desde_moneda);
				$devolucionLogic_Desde_moneda->save();

				$iddevolucionActual=$devolucion_Desde_moneda->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/devolucion_detalle_carga.php');
				devolucion_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$devoluciondetalleLogic_Desde_devolucion=new devolucion_detalle_logic();

				if($devolucion_Desde_moneda->getdevolucion_detalles()==null){
					$devolucion_Desde_moneda->setdevolucion_detalles(array());
				}

				$devoluciondetalleLogic_Desde_devolucion->setdevolucion_detalles($devolucion_Desde_moneda->getdevolucion_detalles());

				$devoluciondetalleLogic_Desde_devolucion->setConnexion($this->getConnexion());
				$devoluciondetalleLogic_Desde_devolucion->setDatosCliente($this->datosCliente);

				foreach($devoluciondetalleLogic_Desde_devolucion->getdevolucion_detalles() as $devoluciondetalle_Desde_devolucion) {
					$devoluciondetalle_Desde_devolucion->setid_devolucion($iddevolucionActual);
				}

				$devoluciondetalleLogic_Desde_devolucion->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/orden_compra_carga.php');
			orden_compra_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$ordencompraLogic_Desde_moneda=new orden_compra_logic();
			$ordencompraLogic_Desde_moneda->setorden_compras($ordencompras);

			$ordencompraLogic_Desde_moneda->setConnexion($this->getConnexion());
			$ordencompraLogic_Desde_moneda->setDatosCliente($this->datosCliente);

			foreach($ordencompraLogic_Desde_moneda->getorden_compras() as $ordencompra_Desde_moneda) {
				$ordencompra_Desde_moneda->setid_moneda($idmonedaActual);

				$ordencompraLogic_Desde_moneda->setorden_compra($ordencompra_Desde_moneda);
				$ordencompraLogic_Desde_moneda->save();

				$idorden_compraActual=$orden_compra_Desde_moneda->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/orden_compra_detalle_carga.php');
				orden_compra_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$ordencompradetalleLogic_Desde_orden_compra=new orden_compra_detalle_logic();

				if($orden_compra_Desde_moneda->getorden_compra_detalles()==null){
					$orden_compra_Desde_moneda->setorden_compra_detalles(array());
				}

				$ordencompradetalleLogic_Desde_orden_compra->setorden_compra_detalles($orden_compra_Desde_moneda->getorden_compra_detalles());

				$ordencompradetalleLogic_Desde_orden_compra->setConnexion($this->getConnexion());
				$ordencompradetalleLogic_Desde_orden_compra->setDatosCliente($this->datosCliente);

				foreach($ordencompradetalleLogic_Desde_orden_compra->getorden_compra_detalles() as $ordencompradetalle_Desde_orden_compra) {
					$ordencompradetalle_Desde_orden_compra->setid_orden_compra($idorden_compraActual);
				}

				$ordencompradetalleLogic_Desde_orden_compra->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_carga.php');
			factura_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$facturaLogic_Desde_moneda=new factura_logic();
			$facturaLogic_Desde_moneda->setfacturas($facturas);

			$facturaLogic_Desde_moneda->setConnexion($this->getConnexion());
			$facturaLogic_Desde_moneda->setDatosCliente($this->datosCliente);

			foreach($facturaLogic_Desde_moneda->getfacturas() as $factura_Desde_moneda) {
				$factura_Desde_moneda->setid_moneda($idmonedaActual);

				$facturaLogic_Desde_moneda->setfactura($factura_Desde_moneda);
				$facturaLogic_Desde_moneda->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/cotizacion_carga.php');
			cotizacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cotizacionLogic_Desde_moneda=new cotizacion_logic();
			$cotizacionLogic_Desde_moneda->setcotizacions($cotizacions);

			$cotizacionLogic_Desde_moneda->setConnexion($this->getConnexion());
			$cotizacionLogic_Desde_moneda->setDatosCliente($this->datosCliente);

			foreach($cotizacionLogic_Desde_moneda->getcotizacions() as $cotizacion_Desde_moneda) {
				$cotizacion_Desde_moneda->setid_moneda($idmonedaActual);

				$cotizacionLogic_Desde_moneda->setcotizacion($cotizacion_Desde_moneda);
				$cotizacionLogic_Desde_moneda->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/util/parametro_general_carga.php');
			parametro_general_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$parametrogeneralLogic_Desde_moneda=new parametro_general_logic();
			$parametrogeneralLogic_Desde_moneda->setparametro_generals($parametrogenerals);

			$parametrogeneralLogic_Desde_moneda->setConnexion($this->getConnexion());
			$parametrogeneralLogic_Desde_moneda->setDatosCliente($this->datosCliente);

			foreach($parametrogeneralLogic_Desde_moneda->getparametro_generals() as $parametrogeneral_Desde_moneda) {
				$parametrogeneral_Desde_moneda->setid_modena($idmonedaActual);
			}

			$parametrogeneralLogic_Desde_moneda->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/consignacion_carga.php');
			consignacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$consignacionLogic_Desde_moneda=new consignacion_logic();
			$consignacionLogic_Desde_moneda->setconsignacions($consignacions);

			$consignacionLogic_Desde_moneda->setConnexion($this->getConnexion());
			$consignacionLogic_Desde_moneda->setDatosCliente($this->datosCliente);

			foreach($consignacionLogic_Desde_moneda->getconsignacions() as $consignacion_Desde_moneda) {
				$consignacion_Desde_moneda->setid_moneda($idmonedaActual);

				$consignacionLogic_Desde_moneda->setconsignacion($consignacion_Desde_moneda);
				$consignacionLogic_Desde_moneda->save();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $monedas,moneda_param_return $monedaParameterGeneral) : moneda_param_return {
		$monedaReturnGeneral=new moneda_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $monedaReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $monedas,moneda_param_return $monedaParameterGeneral) : moneda_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$monedaReturnGeneral=new moneda_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $monedaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $monedas,moneda $moneda,moneda_param_return $monedaParameterGeneral,bool $isEsNuevomoneda,array $clases) : moneda_param_return {
		 try {	
			$monedaReturnGeneral=new moneda_param_return();
	
			$monedaReturnGeneral->setmoneda($moneda);
			$monedaReturnGeneral->setmonedas($monedas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$monedaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $monedaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $monedas,moneda $moneda,moneda_param_return $monedaParameterGeneral,bool $isEsNuevomoneda,array $clases) : moneda_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$monedaReturnGeneral=new moneda_param_return();
	
			$monedaReturnGeneral->setmoneda($moneda);
			$monedaReturnGeneral->setmonedas($monedas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$monedaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $monedaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $monedas,moneda $moneda,moneda_param_return $monedaParameterGeneral,bool $isEsNuevomoneda,array $clases) : moneda_param_return {
		 try {	
			$monedaReturnGeneral=new moneda_param_return();
	
			$monedaReturnGeneral->setmoneda($moneda);
			$monedaReturnGeneral->setmonedas($monedas);
			
			
			
			return $monedaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $monedas,moneda $moneda,moneda_param_return $monedaParameterGeneral,bool $isEsNuevomoneda,array $clases) : moneda_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$monedaReturnGeneral=new moneda_param_return();
	
			$monedaReturnGeneral->setmoneda($moneda);
			$monedaReturnGeneral->setmonedas($monedas);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $monedaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,moneda $moneda,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,moneda $moneda,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		moneda_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		moneda_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(moneda $moneda,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//moneda_logic_add::updatemonedaToGet($this->moneda);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$moneda->setempresa($this->monedaDataAccess->getempresa($this->connexion,$moneda));
		$moneda->setdevolucion_facturas($this->monedaDataAccess->getdevolucion_facturas($this->connexion,$moneda));
		$moneda->setfactura_lotes($this->monedaDataAccess->getfactura_lotes($this->connexion,$moneda));
		$moneda->setestimados($this->monedaDataAccess->getestimados($this->connexion,$moneda));
		$moneda->setdevolucions($this->monedaDataAccess->getdevolucions($this->connexion,$moneda));
		$moneda->setorden_compras($this->monedaDataAccess->getorden_compras($this->connexion,$moneda));
		$moneda->setfacturas($this->monedaDataAccess->getfacturas($this->connexion,$moneda));
		$moneda->setcotizacions($this->monedaDataAccess->getcotizacions($this->connexion,$moneda));
		$moneda->setparametro_generals($this->monedaDataAccess->getparametro_generals($this->connexion,$moneda));
		$moneda->setconsignacions($this->monedaDataAccess->getconsignacions($this->connexion,$moneda));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$moneda->setempresa($this->monedaDataAccess->getempresa($this->connexion,$moneda));
				continue;
			}

			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$moneda->setdevolucion_facturas($this->monedaDataAccess->getdevolucion_facturas($this->connexion,$moneda));

				if($this->isConDeep) {
					$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
					$devolucionfacturaLogic->setdevolucion_facturas($moneda->getdevolucion_facturas());
					$classesLocal=devolucion_factura_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$devolucionfacturaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					devolucion_factura_util::refrescarFKDescripciones($devolucionfacturaLogic->getdevolucion_facturas());
					$moneda->setdevolucion_facturas($devolucionfacturaLogic->getdevolucion_facturas());
				}

				continue;
			}

			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$moneda->setfactura_lotes($this->monedaDataAccess->getfactura_lotes($this->connexion,$moneda));

				if($this->isConDeep) {
					$facturaloteLogic= new factura_lote_logic($this->connexion);
					$facturaloteLogic->setfactura_lotes($moneda->getfactura_lotes());
					$classesLocal=factura_lote_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$facturaloteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					factura_lote_util::refrescarFKDescripciones($facturaloteLogic->getfactura_lotes());
					$moneda->setfactura_lotes($facturaloteLogic->getfactura_lotes());
				}

				continue;
			}

			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$moneda->setestimados($this->monedaDataAccess->getestimados($this->connexion,$moneda));

				if($this->isConDeep) {
					$estimadoLogic= new estimado_logic($this->connexion);
					$estimadoLogic->setestimados($moneda->getestimados());
					$classesLocal=estimado_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$estimadoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					estimado_util::refrescarFKDescripciones($estimadoLogic->getestimados());
					$moneda->setestimados($estimadoLogic->getestimados());
				}

				continue;
			}

			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$moneda->setdevolucions($this->monedaDataAccess->getdevolucions($this->connexion,$moneda));

				if($this->isConDeep) {
					$devolucionLogic= new devolucion_logic($this->connexion);
					$devolucionLogic->setdevolucions($moneda->getdevolucions());
					$classesLocal=devolucion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$devolucionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					devolucion_util::refrescarFKDescripciones($devolucionLogic->getdevolucions());
					$moneda->setdevolucions($devolucionLogic->getdevolucions());
				}

				continue;
			}

			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$moneda->setorden_compras($this->monedaDataAccess->getorden_compras($this->connexion,$moneda));

				if($this->isConDeep) {
					$ordencompraLogic= new orden_compra_logic($this->connexion);
					$ordencompraLogic->setorden_compras($moneda->getorden_compras());
					$classesLocal=orden_compra_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$ordencompraLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					orden_compra_util::refrescarFKDescripciones($ordencompraLogic->getorden_compras());
					$moneda->setorden_compras($ordencompraLogic->getorden_compras());
				}

				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$moneda->setfacturas($this->monedaDataAccess->getfacturas($this->connexion,$moneda));

				if($this->isConDeep) {
					$facturaLogic= new factura_logic($this->connexion);
					$facturaLogic->setfacturas($moneda->getfacturas());
					$classesLocal=factura_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$facturaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					factura_util::refrescarFKDescripciones($facturaLogic->getfacturas());
					$moneda->setfacturas($facturaLogic->getfacturas());
				}

				continue;
			}

			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$moneda->setcotizacions($this->monedaDataAccess->getcotizacions($this->connexion,$moneda));

				if($this->isConDeep) {
					$cotizacionLogic= new cotizacion_logic($this->connexion);
					$cotizacionLogic->setcotizacions($moneda->getcotizacions());
					$classesLocal=cotizacion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cotizacionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cotizacion_util::refrescarFKDescripciones($cotizacionLogic->getcotizacions());
					$moneda->setcotizacions($cotizacionLogic->getcotizacions());
				}

				continue;
			}

			if($clas->clas==parametro_general::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$moneda->setparametro_generals($this->monedaDataAccess->getparametro_generals($this->connexion,$moneda));

				if($this->isConDeep) {
					$parametrogeneralLogic= new parametro_general_logic($this->connexion);
					$parametrogeneralLogic->setparametro_generals($moneda->getparametro_generals());
					$classesLocal=parametro_general_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$parametrogeneralLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					parametro_general_util::refrescarFKDescripciones($parametrogeneralLogic->getparametro_generals());
					$moneda->setparametro_generals($parametrogeneralLogic->getparametro_generals());
				}

				continue;
			}

			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$moneda->setconsignacions($this->monedaDataAccess->getconsignacions($this->connexion,$moneda));

				if($this->isConDeep) {
					$consignacionLogic= new consignacion_logic($this->connexion);
					$consignacionLogic->setconsignacions($moneda->getconsignacions());
					$classesLocal=consignacion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$consignacionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					consignacion_util::refrescarFKDescripciones($consignacionLogic->getconsignacions());
					$moneda->setconsignacions($consignacionLogic->getconsignacions());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$moneda->setempresa($this->monedaDataAccess->getempresa($this->connexion,$moneda));
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
			$moneda->setdevolucion_facturas($this->monedaDataAccess->getdevolucion_facturas($this->connexion,$moneda));
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
			$moneda->setfactura_lotes($this->monedaDataAccess->getfactura_lotes($this->connexion,$moneda));
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
			$moneda->setestimados($this->monedaDataAccess->getestimados($this->connexion,$moneda));
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
			$moneda->setdevolucions($this->monedaDataAccess->getdevolucions($this->connexion,$moneda));
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
			$moneda->setorden_compras($this->monedaDataAccess->getorden_compras($this->connexion,$moneda));
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
			$moneda->setfacturas($this->monedaDataAccess->getfacturas($this->connexion,$moneda));
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
			$moneda->setcotizacions($this->monedaDataAccess->getcotizacions($this->connexion,$moneda));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_general::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_general::$class);
			$moneda->setparametro_generals($this->monedaDataAccess->getparametro_generals($this->connexion,$moneda));
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
			$moneda->setconsignacions($this->monedaDataAccess->getconsignacions($this->connexion,$moneda));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$moneda->setempresa($this->monedaDataAccess->getempresa($this->connexion,$moneda));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($moneda->getempresa(),$isDeep,$deepLoadType,$clases);
				

		$moneda->setdevolucion_facturas($this->monedaDataAccess->getdevolucion_facturas($this->connexion,$moneda));

		foreach($moneda->getdevolucion_facturas() as $devolucionfactura) {
			$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
			$devolucionfacturaLogic->deepLoad($devolucionfactura,$isDeep,$deepLoadType,$clases);
		}

		$moneda->setfactura_lotes($this->monedaDataAccess->getfactura_lotes($this->connexion,$moneda));

		foreach($moneda->getfactura_lotes() as $facturalote) {
			$facturaloteLogic= new factura_lote_logic($this->connexion);
			$facturaloteLogic->deepLoad($facturalote,$isDeep,$deepLoadType,$clases);
		}

		$moneda->setestimados($this->monedaDataAccess->getestimados($this->connexion,$moneda));

		foreach($moneda->getestimados() as $estimado) {
			$estimadoLogic= new estimado_logic($this->connexion);
			$estimadoLogic->deepLoad($estimado,$isDeep,$deepLoadType,$clases);
		}

		$moneda->setdevolucions($this->monedaDataAccess->getdevolucions($this->connexion,$moneda));

		foreach($moneda->getdevolucions() as $devolucion) {
			$devolucionLogic= new devolucion_logic($this->connexion);
			$devolucionLogic->deepLoad($devolucion,$isDeep,$deepLoadType,$clases);
		}

		$moneda->setorden_compras($this->monedaDataAccess->getorden_compras($this->connexion,$moneda));

		foreach($moneda->getorden_compras() as $ordencompra) {
			$ordencompraLogic= new orden_compra_logic($this->connexion);
			$ordencompraLogic->deepLoad($ordencompra,$isDeep,$deepLoadType,$clases);
		}

		$moneda->setfacturas($this->monedaDataAccess->getfacturas($this->connexion,$moneda));

		foreach($moneda->getfacturas() as $factura) {
			$facturaLogic= new factura_logic($this->connexion);
			$facturaLogic->deepLoad($factura,$isDeep,$deepLoadType,$clases);
		}

		$moneda->setcotizacions($this->monedaDataAccess->getcotizacions($this->connexion,$moneda));

		foreach($moneda->getcotizacions() as $cotizacion) {
			$cotizacionLogic= new cotizacion_logic($this->connexion);
			$cotizacionLogic->deepLoad($cotizacion,$isDeep,$deepLoadType,$clases);
		}

		$moneda->setparametro_generals($this->monedaDataAccess->getparametro_generals($this->connexion,$moneda));

		foreach($moneda->getparametro_generals() as $parametrogeneral) {
			$parametrogeneralLogic= new parametro_general_logic($this->connexion);
			$parametrogeneralLogic->deepLoad($parametrogeneral,$isDeep,$deepLoadType,$clases);
		}

		$moneda->setconsignacions($this->monedaDataAccess->getconsignacions($this->connexion,$moneda));

		foreach($moneda->getconsignacions() as $consignacion) {
			$consignacionLogic= new consignacion_logic($this->connexion);
			$consignacionLogic->deepLoad($consignacion,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$moneda->setempresa($this->monedaDataAccess->getempresa($this->connexion,$moneda));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($moneda->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$moneda->setdevolucion_facturas($this->monedaDataAccess->getdevolucion_facturas($this->connexion,$moneda));

				foreach($moneda->getdevolucion_facturas() as $devolucionfactura) {
					$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
					$devolucionfacturaLogic->deepLoad($devolucionfactura,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$moneda->setfactura_lotes($this->monedaDataAccess->getfactura_lotes($this->connexion,$moneda));

				foreach($moneda->getfactura_lotes() as $facturalote) {
					$facturaloteLogic= new factura_lote_logic($this->connexion);
					$facturaloteLogic->deepLoad($facturalote,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$moneda->setestimados($this->monedaDataAccess->getestimados($this->connexion,$moneda));

				foreach($moneda->getestimados() as $estimado) {
					$estimadoLogic= new estimado_logic($this->connexion);
					$estimadoLogic->deepLoad($estimado,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$moneda->setdevolucions($this->monedaDataAccess->getdevolucions($this->connexion,$moneda));

				foreach($moneda->getdevolucions() as $devolucion) {
					$devolucionLogic= new devolucion_logic($this->connexion);
					$devolucionLogic->deepLoad($devolucion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$moneda->setorden_compras($this->monedaDataAccess->getorden_compras($this->connexion,$moneda));

				foreach($moneda->getorden_compras() as $ordencompra) {
					$ordencompraLogic= new orden_compra_logic($this->connexion);
					$ordencompraLogic->deepLoad($ordencompra,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$moneda->setfacturas($this->monedaDataAccess->getfacturas($this->connexion,$moneda));

				foreach($moneda->getfacturas() as $factura) {
					$facturaLogic= new factura_logic($this->connexion);
					$facturaLogic->deepLoad($factura,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$moneda->setcotizacions($this->monedaDataAccess->getcotizacions($this->connexion,$moneda));

				foreach($moneda->getcotizacions() as $cotizacion) {
					$cotizacionLogic= new cotizacion_logic($this->connexion);
					$cotizacionLogic->deepLoad($cotizacion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==parametro_general::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$moneda->setparametro_generals($this->monedaDataAccess->getparametro_generals($this->connexion,$moneda));

				foreach($moneda->getparametro_generals() as $parametrogeneral) {
					$parametrogeneralLogic= new parametro_general_logic($this->connexion);
					$parametrogeneralLogic->deepLoad($parametrogeneral,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$moneda->setconsignacions($this->monedaDataAccess->getconsignacions($this->connexion,$moneda));

				foreach($moneda->getconsignacions() as $consignacion) {
					$consignacionLogic= new consignacion_logic($this->connexion);
					$consignacionLogic->deepLoad($consignacion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$moneda->setempresa($this->monedaDataAccess->getempresa($this->connexion,$moneda));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($moneda->getempresa(),$isDeep,$deepLoadType,$clases);
				
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
			$moneda->setdevolucion_facturas($this->monedaDataAccess->getdevolucion_facturas($this->connexion,$moneda));

			foreach($moneda->getdevolucion_facturas() as $devolucionfactura) {
				$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
				$devolucionfacturaLogic->deepLoad($devolucionfactura,$isDeep,$deepLoadType,$clases);
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
			$moneda->setfactura_lotes($this->monedaDataAccess->getfactura_lotes($this->connexion,$moneda));

			foreach($moneda->getfactura_lotes() as $facturalote) {
				$facturaloteLogic= new factura_lote_logic($this->connexion);
				$facturaloteLogic->deepLoad($facturalote,$isDeep,$deepLoadType,$clases);
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
			$moneda->setestimados($this->monedaDataAccess->getestimados($this->connexion,$moneda));

			foreach($moneda->getestimados() as $estimado) {
				$estimadoLogic= new estimado_logic($this->connexion);
				$estimadoLogic->deepLoad($estimado,$isDeep,$deepLoadType,$clases);
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
			$moneda->setdevolucions($this->monedaDataAccess->getdevolucions($this->connexion,$moneda));

			foreach($moneda->getdevolucions() as $devolucion) {
				$devolucionLogic= new devolucion_logic($this->connexion);
				$devolucionLogic->deepLoad($devolucion,$isDeep,$deepLoadType,$clases);
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
			$moneda->setorden_compras($this->monedaDataAccess->getorden_compras($this->connexion,$moneda));

			foreach($moneda->getorden_compras() as $ordencompra) {
				$ordencompraLogic= new orden_compra_logic($this->connexion);
				$ordencompraLogic->deepLoad($ordencompra,$isDeep,$deepLoadType,$clases);
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
			$moneda->setfacturas($this->monedaDataAccess->getfacturas($this->connexion,$moneda));

			foreach($moneda->getfacturas() as $factura) {
				$facturaLogic= new factura_logic($this->connexion);
				$facturaLogic->deepLoad($factura,$isDeep,$deepLoadType,$clases);
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
			$moneda->setcotizacions($this->monedaDataAccess->getcotizacions($this->connexion,$moneda));

			foreach($moneda->getcotizacions() as $cotizacion) {
				$cotizacionLogic= new cotizacion_logic($this->connexion);
				$cotizacionLogic->deepLoad($cotizacion,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_general::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_general::$class);
			$moneda->setparametro_generals($this->monedaDataAccess->getparametro_generals($this->connexion,$moneda));

			foreach($moneda->getparametro_generals() as $parametrogeneral) {
				$parametrogeneralLogic= new parametro_general_logic($this->connexion);
				$parametrogeneralLogic->deepLoad($parametrogeneral,$isDeep,$deepLoadType,$clases);
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
			$moneda->setconsignacions($this->monedaDataAccess->getconsignacions($this->connexion,$moneda));

			foreach($moneda->getconsignacions() as $consignacion) {
				$consignacionLogic= new consignacion_logic($this->connexion);
				$consignacionLogic->deepLoad($consignacion,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(moneda $moneda,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//moneda_logic_add::updatemonedaToSave($this->moneda);			
			
			if(!$paraDeleteCascade) {				
				moneda_data::save($moneda, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($moneda->getempresa(),$this->connexion);

		foreach($moneda->getdevolucion_facturas() as $devolucionfactura) {
			$devolucionfactura->setid_moneda($moneda->getId());
			devolucion_factura_data::save($devolucionfactura,$this->connexion);
		}


		foreach($moneda->getfactura_lotes() as $facturalote) {
			$facturalote->setid_moneda($moneda->getId());
			factura_lote_data::save($facturalote,$this->connexion);
		}


		foreach($moneda->getestimados() as $estimado) {
			$estimado->setid_moneda($moneda->getId());
			estimado_data::save($estimado,$this->connexion);
		}


		foreach($moneda->getdevolucions() as $devolucion) {
			$devolucion->setid_moneda($moneda->getId());
			devolucion_data::save($devolucion,$this->connexion);
		}


		foreach($moneda->getorden_compras() as $ordencompra) {
			$ordencompra->setid_moneda($moneda->getId());
			orden_compra_data::save($ordencompra,$this->connexion);
		}


		foreach($moneda->getfacturas() as $factura) {
			$factura->setid_moneda($moneda->getId());
			factura_data::save($factura,$this->connexion);
		}


		foreach($moneda->getcotizacions() as $cotizacion) {
			$cotizacion->setid_moneda($moneda->getId());
			cotizacion_data::save($cotizacion,$this->connexion);
		}


		foreach($moneda->getparametro_generals() as $parametrogeneral) {
			$parametrogeneral->setid_moneda($moneda->getId());
			parametro_general_data::save($parametrogeneral,$this->connexion);
		}


		foreach($moneda->getconsignacions() as $consignacion) {
			$consignacion->setid_moneda($moneda->getId());
			consignacion_data::save($consignacion,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($moneda->getempresa(),$this->connexion);
				continue;
			}


			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($moneda->getdevolucion_facturas() as $devolucionfactura) {
					$devolucionfactura->setid_moneda($moneda->getId());
					devolucion_factura_data::save($devolucionfactura,$this->connexion);
				}

				continue;
			}

			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($moneda->getfactura_lotes() as $facturalote) {
					$facturalote->setid_moneda($moneda->getId());
					factura_lote_data::save($facturalote,$this->connexion);
				}

				continue;
			}

			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($moneda->getestimados() as $estimado) {
					$estimado->setid_moneda($moneda->getId());
					estimado_data::save($estimado,$this->connexion);
				}

				continue;
			}

			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($moneda->getdevolucions() as $devolucion) {
					$devolucion->setid_moneda($moneda->getId());
					devolucion_data::save($devolucion,$this->connexion);
				}

				continue;
			}

			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($moneda->getorden_compras() as $ordencompra) {
					$ordencompra->setid_moneda($moneda->getId());
					orden_compra_data::save($ordencompra,$this->connexion);
				}

				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($moneda->getfacturas() as $factura) {
					$factura->setid_moneda($moneda->getId());
					factura_data::save($factura,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($moneda->getcotizacions() as $cotizacion) {
					$cotizacion->setid_moneda($moneda->getId());
					cotizacion_data::save($cotizacion,$this->connexion);
				}

				continue;
			}

			if($clas->clas==parametro_general::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($moneda->getparametro_generals() as $parametrogeneral) {
					$parametrogeneral->setid_moneda($moneda->getId());
					parametro_general_data::save($parametrogeneral,$this->connexion);
				}

				continue;
			}

			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($moneda->getconsignacions() as $consignacion) {
					$consignacion->setid_moneda($moneda->getId());
					consignacion_data::save($consignacion,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			empresa_data::save($moneda->getempresa(),$this->connexion);
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

			foreach($moneda->getdevolucion_facturas() as $devolucionfactura) {
				$devolucionfactura->setid_moneda($moneda->getId());
				devolucion_factura_data::save($devolucionfactura,$this->connexion);
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

			foreach($moneda->getfactura_lotes() as $facturalote) {
				$facturalote->setid_moneda($moneda->getId());
				factura_lote_data::save($facturalote,$this->connexion);
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

			foreach($moneda->getestimados() as $estimado) {
				$estimado->setid_moneda($moneda->getId());
				estimado_data::save($estimado,$this->connexion);
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

			foreach($moneda->getdevolucions() as $devolucion) {
				$devolucion->setid_moneda($moneda->getId());
				devolucion_data::save($devolucion,$this->connexion);
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

			foreach($moneda->getorden_compras() as $ordencompra) {
				$ordencompra->setid_moneda($moneda->getId());
				orden_compra_data::save($ordencompra,$this->connexion);
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

			foreach($moneda->getfacturas() as $factura) {
				$factura->setid_moneda($moneda->getId());
				factura_data::save($factura,$this->connexion);
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

			foreach($moneda->getcotizacions() as $cotizacion) {
				$cotizacion->setid_moneda($moneda->getId());
				cotizacion_data::save($cotizacion,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_general::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_general::$class);

			foreach($moneda->getparametro_generals() as $parametrogeneral) {
				$parametrogeneral->setid_moneda($moneda->getId());
				parametro_general_data::save($parametrogeneral,$this->connexion);
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

			foreach($moneda->getconsignacions() as $consignacion) {
				$consignacion->setid_moneda($moneda->getId());
				consignacion_data::save($consignacion,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($moneda->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($moneda->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($moneda->getdevolucion_facturas() as $devolucionfactura) {
			$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
			$devolucionfactura->setid_moneda($moneda->getId());
			devolucion_factura_data::save($devolucionfactura,$this->connexion);
			$devolucionfacturaLogic->deepSave($devolucionfactura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($moneda->getfactura_lotes() as $facturalote) {
			$facturaloteLogic= new factura_lote_logic($this->connexion);
			$facturalote->setid_moneda($moneda->getId());
			factura_lote_data::save($facturalote,$this->connexion);
			$facturaloteLogic->deepSave($facturalote,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($moneda->getestimados() as $estimado) {
			$estimadoLogic= new estimado_logic($this->connexion);
			$estimado->setid_moneda($moneda->getId());
			estimado_data::save($estimado,$this->connexion);
			$estimadoLogic->deepSave($estimado,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($moneda->getdevolucions() as $devolucion) {
			$devolucionLogic= new devolucion_logic($this->connexion);
			$devolucion->setid_moneda($moneda->getId());
			devolucion_data::save($devolucion,$this->connexion);
			$devolucionLogic->deepSave($devolucion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($moneda->getorden_compras() as $ordencompra) {
			$ordencompraLogic= new orden_compra_logic($this->connexion);
			$ordencompra->setid_moneda($moneda->getId());
			orden_compra_data::save($ordencompra,$this->connexion);
			$ordencompraLogic->deepSave($ordencompra,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($moneda->getfacturas() as $factura) {
			$facturaLogic= new factura_logic($this->connexion);
			$factura->setid_moneda($moneda->getId());
			factura_data::save($factura,$this->connexion);
			$facturaLogic->deepSave($factura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($moneda->getcotizacions() as $cotizacion) {
			$cotizacionLogic= new cotizacion_logic($this->connexion);
			$cotizacion->setid_moneda($moneda->getId());
			cotizacion_data::save($cotizacion,$this->connexion);
			$cotizacionLogic->deepSave($cotizacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($moneda->getparametro_generals() as $parametrogeneral) {
			$parametrogeneralLogic= new parametro_general_logic($this->connexion);
			$parametrogeneral->setid_moneda($moneda->getId());
			parametro_general_data::save($parametrogeneral,$this->connexion);
			$parametrogeneralLogic->deepSave($parametrogeneral,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($moneda->getconsignacions() as $consignacion) {
			$consignacionLogic= new consignacion_logic($this->connexion);
			$consignacion->setid_moneda($moneda->getId());
			consignacion_data::save($consignacion,$this->connexion);
			$consignacionLogic->deepSave($consignacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($moneda->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($moneda->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($moneda->getdevolucion_facturas() as $devolucionfactura) {
					$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
					$devolucionfactura->setid_moneda($moneda->getId());
					devolucion_factura_data::save($devolucionfactura,$this->connexion);
					$devolucionfacturaLogic->deepSave($devolucionfactura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($moneda->getfactura_lotes() as $facturalote) {
					$facturaloteLogic= new factura_lote_logic($this->connexion);
					$facturalote->setid_moneda($moneda->getId());
					factura_lote_data::save($facturalote,$this->connexion);
					$facturaloteLogic->deepSave($facturalote,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($moneda->getestimados() as $estimado) {
					$estimadoLogic= new estimado_logic($this->connexion);
					$estimado->setid_moneda($moneda->getId());
					estimado_data::save($estimado,$this->connexion);
					$estimadoLogic->deepSave($estimado,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($moneda->getdevolucions() as $devolucion) {
					$devolucionLogic= new devolucion_logic($this->connexion);
					$devolucion->setid_moneda($moneda->getId());
					devolucion_data::save($devolucion,$this->connexion);
					$devolucionLogic->deepSave($devolucion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($moneda->getorden_compras() as $ordencompra) {
					$ordencompraLogic= new orden_compra_logic($this->connexion);
					$ordencompra->setid_moneda($moneda->getId());
					orden_compra_data::save($ordencompra,$this->connexion);
					$ordencompraLogic->deepSave($ordencompra,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($moneda->getfacturas() as $factura) {
					$facturaLogic= new factura_logic($this->connexion);
					$factura->setid_moneda($moneda->getId());
					factura_data::save($factura,$this->connexion);
					$facturaLogic->deepSave($factura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($moneda->getcotizacions() as $cotizacion) {
					$cotizacionLogic= new cotizacion_logic($this->connexion);
					$cotizacion->setid_moneda($moneda->getId());
					cotizacion_data::save($cotizacion,$this->connexion);
					$cotizacionLogic->deepSave($cotizacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==parametro_general::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($moneda->getparametro_generals() as $parametrogeneral) {
					$parametrogeneralLogic= new parametro_general_logic($this->connexion);
					$parametrogeneral->setid_moneda($moneda->getId());
					parametro_general_data::save($parametrogeneral,$this->connexion);
					$parametrogeneralLogic->deepSave($parametrogeneral,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($moneda->getconsignacions() as $consignacion) {
					$consignacionLogic= new consignacion_logic($this->connexion);
					$consignacion->setid_moneda($moneda->getId());
					consignacion_data::save($consignacion,$this->connexion);
					$consignacionLogic->deepSave($consignacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			empresa_data::save($moneda->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($moneda->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
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

			foreach($moneda->getdevolucion_facturas() as $devolucionfactura) {
				$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
				$devolucionfactura->setid_moneda($moneda->getId());
				devolucion_factura_data::save($devolucionfactura,$this->connexion);
				$devolucionfacturaLogic->deepSave($devolucionfactura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($moneda->getfactura_lotes() as $facturalote) {
				$facturaloteLogic= new factura_lote_logic($this->connexion);
				$facturalote->setid_moneda($moneda->getId());
				factura_lote_data::save($facturalote,$this->connexion);
				$facturaloteLogic->deepSave($facturalote,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($moneda->getestimados() as $estimado) {
				$estimadoLogic= new estimado_logic($this->connexion);
				$estimado->setid_moneda($moneda->getId());
				estimado_data::save($estimado,$this->connexion);
				$estimadoLogic->deepSave($estimado,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($moneda->getdevolucions() as $devolucion) {
				$devolucionLogic= new devolucion_logic($this->connexion);
				$devolucion->setid_moneda($moneda->getId());
				devolucion_data::save($devolucion,$this->connexion);
				$devolucionLogic->deepSave($devolucion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($moneda->getorden_compras() as $ordencompra) {
				$ordencompraLogic= new orden_compra_logic($this->connexion);
				$ordencompra->setid_moneda($moneda->getId());
				orden_compra_data::save($ordencompra,$this->connexion);
				$ordencompraLogic->deepSave($ordencompra,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($moneda->getfacturas() as $factura) {
				$facturaLogic= new factura_logic($this->connexion);
				$factura->setid_moneda($moneda->getId());
				factura_data::save($factura,$this->connexion);
				$facturaLogic->deepSave($factura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($moneda->getcotizacions() as $cotizacion) {
				$cotizacionLogic= new cotizacion_logic($this->connexion);
				$cotizacion->setid_moneda($moneda->getId());
				cotizacion_data::save($cotizacion,$this->connexion);
				$cotizacionLogic->deepSave($cotizacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_general::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_general::$class);

			foreach($moneda->getparametro_generals() as $parametrogeneral) {
				$parametrogeneralLogic= new parametro_general_logic($this->connexion);
				$parametrogeneral->setid_moneda($moneda->getId());
				parametro_general_data::save($parametrogeneral,$this->connexion);
				$parametrogeneralLogic->deepSave($parametrogeneral,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($moneda->getconsignacions() as $consignacion) {
				$consignacionLogic= new consignacion_logic($this->connexion);
				$consignacion->setid_moneda($moneda->getId());
				consignacion_data::save($consignacion,$this->connexion);
				$consignacionLogic->deepSave($consignacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				moneda_data::save($moneda, $this->connexion);
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
			
			$this->deepLoad($this->moneda,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->monedas as $moneda) {
				$this->deepLoad($moneda,$isDeep,$deepLoadType,$clases);
								
				moneda_util::refrescarFKDescripciones($this->monedas);
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
			
			foreach($this->monedas as $moneda) {
				$this->deepLoad($moneda,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->moneda,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->monedas as $moneda) {
				$this->deepSave($moneda,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->monedas as $moneda) {
				$this->deepSave($moneda,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(empresa::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(empresa::$class);
				}

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
				
				$classes[]=new Classe(devolucion_factura::$class);
				$classes[]=new Classe(factura_lote::$class);
				$classes[]=new Classe(estimado::$class);
				$classes[]=new Classe(devolucion::$class);
				$classes[]=new Classe(orden_compra::$class);
				$classes[]=new Classe(factura::$class);
				$classes[]=new Classe(cotizacion::$class);
				$classes[]=new Classe(parametro_general::$class);
				$classes[]=new Classe(consignacion::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==devolucion_factura::$class) {
						$classes[]=new Classe(devolucion_factura::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==factura_lote::$class) {
						$classes[]=new Classe(factura_lote::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==estimado::$class) {
						$classes[]=new Classe(estimado::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==devolucion::$class) {
						$classes[]=new Classe(devolucion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==orden_compra::$class) {
						$classes[]=new Classe(orden_compra::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==factura::$class) {
						$classes[]=new Classe(factura::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==cotizacion::$class) {
						$classes[]=new Classe(cotizacion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==parametro_general::$class) {
						$classes[]=new Classe(parametro_general::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==consignacion::$class) {
						$classes[]=new Classe(consignacion::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

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
					if($clas->clas==parametro_general::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(parametro_general::$class);
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

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getmoneda() : ?moneda {	
		/*
		moneda_logic_add::checkmonedaToGet($this->moneda,$this->datosCliente);
		moneda_logic_add::updatemonedaToGet($this->moneda);
		*/
			
		return $this->moneda;
	}
		
	public function setmoneda(moneda $newmoneda) {
		$this->moneda = $newmoneda;
	}
	
	public function getmonedas() : array {		
		/*
		moneda_logic_add::checkmonedaToGets($this->monedas,$this->datosCliente);
		
		foreach ($this->monedas as $monedaLocal ) {
			moneda_logic_add::updatemonedaToGet($monedaLocal);
		}
		*/
		
		return $this->monedas;
	}
	
	public function setmonedas(array $newmonedas) {
		$this->monedas = $newmonedas;
	}
	
	public function getmonedaDataAccess() : moneda_data {
		return $this->monedaDataAccess;
	}
	
	public function setmonedaDataAccess(moneda_data $newmonedaDataAccess) {
		$this->monedaDataAccess = $newmonedaDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        moneda_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		devolucion_factura_detalle_logic::$logger;
		factura_lote_detalle_logic::$logger;
		factura_modelo_logic::$logger;
		imagen_estimado_logic::$logger;
		estimado_detalle_logic::$logger;
		devolucion_detalle_logic::$logger;
		orden_compra_detalle_logic::$logger;
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
