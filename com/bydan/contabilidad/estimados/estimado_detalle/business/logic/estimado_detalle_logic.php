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

namespace com\bydan\contabilidad\estimados\estimado_detalle\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\estimados\estimado_detalle\util\estimado_detalle_carga;
use com\bydan\contabilidad\estimados\estimado_detalle\util\estimado_detalle_param_return;

use com\bydan\contabilidad\estimados\estimado_detalle\presentation\session\estimado_detalle_session;

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

use com\bydan\contabilidad\estimados\estimado_detalle\util\estimado_detalle_util;
use com\bydan\contabilidad\estimados\estimado_detalle\business\entity\estimado_detalle;
use com\bydan\contabilidad\estimados\estimado_detalle\business\data\estimado_detalle_data;

//FK


use com\bydan\contabilidad\estimados\estimado\business\entity\estimado;
use com\bydan\contabilidad\estimados\estimado\business\data\estimado_data;
use com\bydan\contabilidad\estimados\estimado\business\logic\estimado_logic;
use com\bydan\contabilidad\estimados\estimado\util\estimado_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\data\bodega_data;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;
use com\bydan\contabilidad\inventario\unidad\business\data\unidad_data;
use com\bydan\contabilidad\inventario\unidad\business\logic\unidad_logic;
use com\bydan\contabilidad\inventario\unidad\util\unidad_util;

//REL


//REL DETALLES




class estimado_detalle_logic  extends GeneralEntityLogic implements estimado_detalle_logicI {	
	/*GENERAL*/
	public estimado_detalle_data $estimado_detalleDataAccess;
	//public ?estimado_detalle_logic_add $estimado_detalleLogicAdditional=null;
	public ?estimado_detalle $estimado_detalle;
	public array $estimado_detalles;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->estimado_detalleDataAccess = new estimado_detalle_data();			
			$this->estimado_detalles = array();
			$this->estimado_detalle = new estimado_detalle();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->estimado_detalleLogicAdditional = new estimado_detalle_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->estimado_detalleLogicAdditional==null) {
		//	$this->estimado_detalleLogicAdditional=new estimado_detalle_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->estimado_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->estimado_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->estimado_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->estimado_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->estimado_detalles = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estimado_detalles=$this->estimado_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
			}
			
			//estimado_detalle_logic_add::checkestimado_detalleToGets($this->estimado_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimado_detalles);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->estimado_detalles = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estimado_detalles=$this->estimado_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
			}
			
			//estimado_detalle_logic_add::checkestimado_detalleToGets($this->estimado_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimado_detalles);
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
		$this->estimado_detalle = new estimado_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->estimado_detalle=$this->estimado_detalleDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->estimado_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estimado_detalle_util::refrescarFKDescripcion($this->estimado_detalle);
			}
						
			//estimado_detalle_logic_add::checkestimado_detalleToGet($this->estimado_detalle,$this->datosCliente);
			//estimado_detalle_logic_add::updateestimado_detalleToGet($this->estimado_detalle);
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
		$this->estimado_detalle = new  estimado_detalle();
		  		  
        try {		
			$this->estimado_detalle=$this->estimado_detalleDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->estimado_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estimado_detalle_util::refrescarFKDescripcion($this->estimado_detalle);
			}
			
			//estimado_detalle_logic_add::checkestimado_detalleToGet($this->estimado_detalle,$this->datosCliente);
			//estimado_detalle_logic_add::updateestimado_detalleToGet($this->estimado_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?estimado_detalle {
		$estimado_detalleLogic = new  estimado_detalle_logic();
		  		  
        try {		
			$estimado_detalleLogic->setConnexion($connexion);			
			$estimado_detalleLogic->getEntity($id);			
			return $estimado_detalleLogic->getestimado_detalle();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->estimado_detalle = new  estimado_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->estimado_detalle=$this->estimado_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->estimado_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estimado_detalle_util::refrescarFKDescripcion($this->estimado_detalle);
			}
			
			//estimado_detalle_logic_add::checkestimado_detalleToGet($this->estimado_detalle,$this->datosCliente);
			//estimado_detalle_logic_add::updateestimado_detalleToGet($this->estimado_detalle);
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
		$this->estimado_detalle = new  estimado_detalle();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estimado_detalle=$this->estimado_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->estimado_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estimado_detalle_util::refrescarFKDescripcion($this->estimado_detalle);
			}
			
			//estimado_detalle_logic_add::checkestimado_detalleToGet($this->estimado_detalle,$this->datosCliente);
			//estimado_detalle_logic_add::updateestimado_detalleToGet($this->estimado_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?estimado_detalle {
		$estimado_detalleLogic = new  estimado_detalle_logic();
		  		  
        try {		
			$estimado_detalleLogic->setConnexion($connexion);			
			$estimado_detalleLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $estimado_detalleLogic->getestimado_detalle();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->estimado_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->estimado_detalles=$this->estimado_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
			}
			
			//estimado_detalle_logic_add::checkestimado_detalleToGets($this->estimado_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimado_detalles);			
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
		$this->estimado_detalles = array();
		  		  
        try {			
			$this->estimado_detalles=$this->estimado_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
			}
			
			//estimado_detalle_logic_add::checkestimado_detalleToGets($this->estimado_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimado_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->estimado_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estimado_detalles=$this->estimado_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
			}
			
			//estimado_detalle_logic_add::checkestimado_detalleToGets($this->estimado_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimado_detalles);
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
		$this->estimado_detalles = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estimado_detalles=$this->estimado_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
			}
			
			//estimado_detalle_logic_add::checkestimado_detalleToGets($this->estimado_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimado_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$estimado_detalleLogic = new  estimado_detalle_logic();
		  		  
        try {		
			$estimado_detalleLogic->setConnexion($connexion);			
			$estimado_detalleLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $estimado_detalleLogic->getestimado_detalles();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->estimado_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->estimado_detalles=$this->estimado_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
			}
			
			//estimado_detalle_logic_add::checkestimado_detalleToGets($this->estimado_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimado_detalles);
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
		$this->estimado_detalles = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estimado_detalles=$this->estimado_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
			}
			
			//estimado_detalle_logic_add::checkestimado_detalleToGets($this->estimado_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimado_detalles);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->estimado_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estimado_detalles=$this->estimado_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
			}
			
			//estimado_detalle_logic_add::checkestimado_detalleToGets($this->estimado_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimado_detalles);
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
		$this->estimado_detalles = array();
		  		  
        try {			
			$this->estimado_detalles=$this->estimado_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
			}	
			
			//estimado_detalle_logic_add::checkestimado_detalleToGets($this->estimado_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimado_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->estimado_detalles = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->estimado_detalles=$this->estimado_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
			}
			
			//estimado_detalle_logic_add::checkestimado_detalleToGets($this->estimado_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimado_detalles);
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
		$this->estimado_detalles = array();
		  		  
        try {		
			$this->estimado_detalles=$this->estimado_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
			}
			
			//estimado_detalle_logic_add::checkestimado_detalleToGets($this->estimado_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimado_detalles);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdbodegaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_bodega) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_bodega= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,estimado_detalle_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->estimado_detalles=$this->estimado_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
			}
			//estimado_detalle_logic_add::checkestimado_detalleToGets($this->estimado_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimado_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idbodega(string $strFinalQuery,Pagination $pagination,int $id_bodega) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_bodega= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,estimado_detalle_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->estimado_detalles=$this->estimado_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
			}
			//estimado_detalle_logic_add::checkestimado_detalleToGets($this->estimado_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimado_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdestimadoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_estimado) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estimado= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estimado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estimado,estimado_detalle_util::$ID_ESTIMADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estimado);

			$this->estimado_detalles=$this->estimado_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
			}
			//estimado_detalle_logic_add::checkestimado_detalleToGets($this->estimado_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimado_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idestimado(string $strFinalQuery,Pagination $pagination,int $id_estimado) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estimado= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estimado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estimado,estimado_detalle_util::$ID_ESTIMADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estimado);

			$this->estimado_detalles=$this->estimado_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
			}
			//estimado_detalle_logic_add::checkestimado_detalleToGets($this->estimado_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimado_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdproductoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_producto) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_producto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,estimado_detalle_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->estimado_detalles=$this->estimado_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
			}
			//estimado_detalle_logic_add::checkestimado_detalleToGets($this->estimado_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimado_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idproducto(string $strFinalQuery,Pagination $pagination,int $id_producto) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_producto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,estimado_detalle_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->estimado_detalles=$this->estimado_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
			}
			//estimado_detalle_logic_add::checkestimado_detalleToGets($this->estimado_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimado_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdunidadWithConnection(string $strFinalQuery,Pagination $pagination,int $id_unidad) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_unidad= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_unidad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad,estimado_detalle_util::$ID_UNIDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad);

			$this->estimado_detalles=$this->estimado_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
			}
			//estimado_detalle_logic_add::checkestimado_detalleToGets($this->estimado_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimado_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idunidad(string $strFinalQuery,Pagination $pagination,int $id_unidad) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_unidad= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_unidad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad,estimado_detalle_util::$ID_UNIDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad);

			$this->estimado_detalles=$this->estimado_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
			}
			//estimado_detalle_logic_add::checkestimado_detalleToGets($this->estimado_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimado_detalles);
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
						
			//estimado_detalle_logic_add::checkestimado_detalleToSave($this->estimado_detalle,$this->datosCliente,$this->connexion);	       
			//estimado_detalle_logic_add::updateestimado_detalleToSave($this->estimado_detalle);			
			estimado_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->estimado_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->estimado_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->estimado_detalle,$this->datosCliente,$this->connexion);
			
			
			estimado_detalle_data::save($this->estimado_detalle, $this->connexion);	    	       	 				
			//estimado_detalle_logic_add::checkestimado_detalleToSaveAfter($this->estimado_detalle,$this->datosCliente,$this->connexion);			
			//$this->estimado_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->estimado_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->estimado_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->estimado_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				estimado_detalle_util::refrescarFKDescripcion($this->estimado_detalle);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->estimado_detalle->getIsDeleted()) {
				$this->estimado_detalle=null;
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
						
			/*estimado_detalle_logic_add::checkestimado_detalleToSave($this->estimado_detalle,$this->datosCliente,$this->connexion);*/	        
			//estimado_detalle_logic_add::updateestimado_detalleToSave($this->estimado_detalle);			
			//$this->estimado_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->estimado_detalle,$this->datosCliente,$this->connexion);			
			estimado_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->estimado_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			estimado_detalle_data::save($this->estimado_detalle, $this->connexion);	    	       	 						
			/*estimado_detalle_logic_add::checkestimado_detalleToSaveAfter($this->estimado_detalle,$this->datosCliente,$this->connexion);*/			
			//$this->estimado_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->estimado_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->estimado_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->estimado_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				estimado_detalle_util::refrescarFKDescripcion($this->estimado_detalle);				
			}
			
			if($this->estimado_detalle->getIsDeleted()) {
				$this->estimado_detalle=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(estimado_detalle $estimado_detalle,Connexion $connexion)  {
		$estimado_detalleLogic = new  estimado_detalle_logic();		  		  
        try {		
			$estimado_detalleLogic->setConnexion($connexion);			
			$estimado_detalleLogic->setestimado_detalle($estimado_detalle);			
			$estimado_detalleLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*estimado_detalle_logic_add::checkestimado_detalleToSaves($this->estimado_detalles,$this->datosCliente,$this->connexion);*/	        	
			//$this->estimado_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->estimado_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->estimado_detalles as $estimado_detalleLocal) {				
								
				//estimado_detalle_logic_add::updateestimado_detalleToSave($estimado_detalleLocal);	        	
				estimado_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$estimado_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				estimado_detalle_data::save($estimado_detalleLocal, $this->connexion);				
			}
			
			/*estimado_detalle_logic_add::checkestimado_detalleToSavesAfter($this->estimado_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->estimado_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->estimado_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
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
			/*estimado_detalle_logic_add::checkestimado_detalleToSaves($this->estimado_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->estimado_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->estimado_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->estimado_detalles as $estimado_detalleLocal) {				
								
				//estimado_detalle_logic_add::updateestimado_detalleToSave($estimado_detalleLocal);	        	
				estimado_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$estimado_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				estimado_detalle_data::save($estimado_detalleLocal, $this->connexion);				
			}			
			
			/*estimado_detalle_logic_add::checkestimado_detalleToSavesAfter($this->estimado_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->estimado_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->estimado_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $estimado_detalles,Connexion $connexion)  {
		$estimado_detalleLogic = new  estimado_detalle_logic();
		  		  
        try {		
			$estimado_detalleLogic->setConnexion($connexion);			
			$estimado_detalleLogic->setestimado_detalles($estimado_detalles);			
			$estimado_detalleLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$estimado_detallesAux=array();
		
		foreach($this->estimado_detalles as $estimado_detalle) {
			if($estimado_detalle->getIsDeleted()==false) {
				$estimado_detallesAux[]=$estimado_detalle;
			}
		}
		
		$this->estimado_detalles=$estimado_detallesAux;
	}
	
	public function updateToGetsAuxiliar(array &$estimado_detalles) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->estimado_detalles as $estimado_detalle) {
				
				$estimado_detalle->setid_estimado_Descripcion(estimado_detalle_util::getestimadoDescripcion($estimado_detalle->getestimado()));
				$estimado_detalle->setid_bodega_Descripcion(estimado_detalle_util::getbodegaDescripcion($estimado_detalle->getbodega()));
				$estimado_detalle->setid_producto_Descripcion(estimado_detalle_util::getproductoDescripcion($estimado_detalle->getproducto()));
				$estimado_detalle->setid_unidad_Descripcion(estimado_detalle_util::getunidadDescripcion($estimado_detalle->getunidad()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$estimado_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$estimado_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$estimado_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$estimado_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$estimado_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$estimado_detalleForeignKey=new estimado_detalle_param_return();//estimado_detalleForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estimado',$strRecargarFkTipos,',')) {
				$this->cargarCombosestimadosFK($this->connexion,$strRecargarFkQuery,$estimado_detalleForeignKey,$estimado_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTipos,',')) {
				$this->cargarCombosbodegasFK($this->connexion,$strRecargarFkQuery,$estimado_detalleForeignKey,$estimado_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombosproductosFK($this->connexion,$strRecargarFkQuery,$estimado_detalleForeignKey,$estimado_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_unidad',$strRecargarFkTipos,',')) {
				$this->cargarCombosunidadsFK($this->connexion,$strRecargarFkQuery,$estimado_detalleForeignKey,$estimado_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_estimado',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosestimadosFK($this->connexion,' where id=-1 ',$estimado_detalleForeignKey,$estimado_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosbodegasFK($this->connexion,' where id=-1 ',$estimado_detalleForeignKey,$estimado_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproductosFK($this->connexion,' where id=-1 ',$estimado_detalleForeignKey,$estimado_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_unidad',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosunidadsFK($this->connexion,' where id=-1 ',$estimado_detalleForeignKey,$estimado_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $estimado_detalleForeignKey;
			
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
	
	
	public function cargarCombosestimadosFK($connexion=null,$strRecargarFkQuery='',$estimado_detalleForeignKey,$estimado_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$estimadoLogic= new estimado_logic();
		$pagination= new Pagination();
		$estimado_detalleForeignKey->estimadosFK=array();

		$estimadoLogic->setConnexion($connexion);
		$estimadoLogic->getestimadoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($estimado_detalle_session==null) {
			$estimado_detalle_session=new estimado_detalle_session();
		}
		
		if($estimado_detalle_session->bitBusquedaDesdeFKSesionestimado!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=estimado_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalestimado=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalestimado=Funciones::GetFinalQueryAppend($finalQueryGlobalestimado, '');
				$finalQueryGlobalestimado.=estimado_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalestimado.$strRecargarFkQuery;		

				$estimadoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($estimadoLogic->getestimados() as $estimadoLocal ) {
				if($estimado_detalleForeignKey->idestimadoDefaultFK==0) {
					$estimado_detalleForeignKey->idestimadoDefaultFK=$estimadoLocal->getId();
				}

				$estimado_detalleForeignKey->estimadosFK[$estimadoLocal->getId()]=estimado_detalle_util::getestimadoDescripcion($estimadoLocal);
			}

		} else {

			if($estimado_detalle_session->bigidestimadoActual!=null && $estimado_detalle_session->bigidestimadoActual > 0) {
				$estimadoLogic->getEntity($estimado_detalle_session->bigidestimadoActual);//WithConnection

				$estimado_detalleForeignKey->estimadosFK[$estimadoLogic->getestimado()->getId()]=estimado_detalle_util::getestimadoDescripcion($estimadoLogic->getestimado());
				$estimado_detalleForeignKey->idestimadoDefaultFK=$estimadoLogic->getestimado()->getId();
			}
		}
	}

	public function cargarCombosbodegasFK($connexion=null,$strRecargarFkQuery='',$estimado_detalleForeignKey,$estimado_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$estimado_detalleForeignKey->bodegasFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($estimado_detalle_session==null) {
			$estimado_detalle_session=new estimado_detalle_session();
		}
		
		if($estimado_detalle_session->bitBusquedaDesdeFKSesionbodega!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=bodega_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalbodega=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalbodega=Funciones::GetFinalQueryAppend($finalQueryGlobalbodega, '');
				$finalQueryGlobalbodega.=bodega_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalbodega.$strRecargarFkQuery;		

				$bodegaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($bodegaLogic->getbodegas() as $bodegaLocal ) {
				if($estimado_detalleForeignKey->idbodegaDefaultFK==0) {
					$estimado_detalleForeignKey->idbodegaDefaultFK=$bodegaLocal->getId();
				}

				$estimado_detalleForeignKey->bodegasFK[$bodegaLocal->getId()]=estimado_detalle_util::getbodegaDescripcion($bodegaLocal);
			}

		} else {

			if($estimado_detalle_session->bigidbodegaActual!=null && $estimado_detalle_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($estimado_detalle_session->bigidbodegaActual);//WithConnection

				$estimado_detalleForeignKey->bodegasFK[$bodegaLogic->getbodega()->getId()]=estimado_detalle_util::getbodegaDescripcion($bodegaLogic->getbodega());
				$estimado_detalleForeignKey->idbodegaDefaultFK=$bodegaLogic->getbodega()->getId();
			}
		}
	}

	public function cargarCombosproductosFK($connexion=null,$strRecargarFkQuery='',$estimado_detalleForeignKey,$estimado_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$estimado_detalleForeignKey->productosFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($estimado_detalle_session==null) {
			$estimado_detalle_session=new estimado_detalle_session();
		}
		
		if($estimado_detalle_session->bitBusquedaDesdeFKSesionproducto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=producto_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalproducto=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalproducto=Funciones::GetFinalQueryAppend($finalQueryGlobalproducto, '');
				$finalQueryGlobalproducto.=producto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalproducto.$strRecargarFkQuery;		

				$productoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($productoLogic->getproductos() as $productoLocal ) {
				if($estimado_detalleForeignKey->idproductoDefaultFK==0) {
					$estimado_detalleForeignKey->idproductoDefaultFK=$productoLocal->getId();
				}

				$estimado_detalleForeignKey->productosFK[$productoLocal->getId()]=estimado_detalle_util::getproductoDescripcion($productoLocal);
			}

		} else {

			if($estimado_detalle_session->bigidproductoActual!=null && $estimado_detalle_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($estimado_detalle_session->bigidproductoActual);//WithConnection

				$estimado_detalleForeignKey->productosFK[$productoLogic->getproducto()->getId()]=estimado_detalle_util::getproductoDescripcion($productoLogic->getproducto());
				$estimado_detalleForeignKey->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	public function cargarCombosunidadsFK($connexion=null,$strRecargarFkQuery='',$estimado_detalleForeignKey,$estimado_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$unidadLogic= new unidad_logic();
		$pagination= new Pagination();
		$estimado_detalleForeignKey->unidadsFK=array();

		$unidadLogic->setConnexion($connexion);
		$unidadLogic->getunidadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($estimado_detalle_session==null) {
			$estimado_detalle_session=new estimado_detalle_session();
		}
		
		if($estimado_detalle_session->bitBusquedaDesdeFKSesionunidad!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=unidad_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalunidad=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalunidad=Funciones::GetFinalQueryAppend($finalQueryGlobalunidad, '');
				$finalQueryGlobalunidad.=unidad_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalunidad.$strRecargarFkQuery;		

				$unidadLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($unidadLogic->getunidads() as $unidadLocal ) {
				if($estimado_detalleForeignKey->idunidadDefaultFK==0) {
					$estimado_detalleForeignKey->idunidadDefaultFK=$unidadLocal->getId();
				}

				$estimado_detalleForeignKey->unidadsFK[$unidadLocal->getId()]=estimado_detalle_util::getunidadDescripcion($unidadLocal);
			}

		} else {

			if($estimado_detalle_session->bigidunidadActual!=null && $estimado_detalle_session->bigidunidadActual > 0) {
				$unidadLogic->getEntity($estimado_detalle_session->bigidunidadActual);//WithConnection

				$estimado_detalleForeignKey->unidadsFK[$unidadLogic->getunidad()->getId()]=estimado_detalle_util::getunidadDescripcion($unidadLogic->getunidad());
				$estimado_detalleForeignKey->idunidadDefaultFK=$unidadLogic->getunidad()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($estimado_detalle) {
		$this->saveRelacionesBase($estimado_detalle,true);
	}

	public function saveRelaciones($estimado_detalle) {
		$this->saveRelacionesBase($estimado_detalle,false);
	}

	public function saveRelacionesBase($estimado_detalle,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setestimado_detalle($estimado_detalle);

			if(true) {

				//estimado_detalle_logic_add::updateRelacionesToSave($estimado_detalle,$this);

				if(($this->estimado_detalle->getIsNew() || $this->estimado_detalle->getIsChanged()) && !$this->estimado_detalle->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->estimado_detalle->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//estimado_detalle_logic_add::updateRelacionesToSaveAfter($estimado_detalle,$this);

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
	
	
	public function saveRelacionesDetalles() {
		try {
	

		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
	
	/*PROCESAR ACCIONES*/
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $estimado_detalles,estimado_detalle_param_return $estimado_detalleParameterGeneral) : estimado_detalle_param_return {
		$estimado_detalleReturnGeneral=new estimado_detalle_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $estimado_detalleReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $estimado_detalles,estimado_detalle_param_return $estimado_detalleParameterGeneral) : estimado_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$estimado_detalleReturnGeneral=new estimado_detalle_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $estimado_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estimado_detalles,estimado_detalle $estimado_detalle,estimado_detalle_param_return $estimado_detalleParameterGeneral,bool $isEsNuevoestimado_detalle,array $clases) : estimado_detalle_param_return {
		 try {	
			$estimado_detalleReturnGeneral=new estimado_detalle_param_return();
	
			$estimado_detalleReturnGeneral->setestimado_detalle($estimado_detalle);
			$estimado_detalleReturnGeneral->setestimado_detalles($estimado_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$estimado_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $estimado_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estimado_detalles,estimado_detalle $estimado_detalle,estimado_detalle_param_return $estimado_detalleParameterGeneral,bool $isEsNuevoestimado_detalle,array $clases) : estimado_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$estimado_detalleReturnGeneral=new estimado_detalle_param_return();
	
			$estimado_detalleReturnGeneral->setestimado_detalle($estimado_detalle);
			$estimado_detalleReturnGeneral->setestimado_detalles($estimado_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$estimado_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $estimado_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estimado_detalles,estimado_detalle $estimado_detalle,estimado_detalle_param_return $estimado_detalleParameterGeneral,bool $isEsNuevoestimado_detalle,array $clases) : estimado_detalle_param_return {
		 try {	
			$estimado_detalleReturnGeneral=new estimado_detalle_param_return();
	
			$estimado_detalleReturnGeneral->setestimado_detalle($estimado_detalle);
			$estimado_detalleReturnGeneral->setestimado_detalles($estimado_detalles);
			
			
			
			return $estimado_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estimado_detalles,estimado_detalle $estimado_detalle,estimado_detalle_param_return $estimado_detalleParameterGeneral,bool $isEsNuevoestimado_detalle,array $clases) : estimado_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$estimado_detalleReturnGeneral=new estimado_detalle_param_return();
	
			$estimado_detalleReturnGeneral->setestimado_detalle($estimado_detalle);
			$estimado_detalleReturnGeneral->setestimado_detalles($estimado_detalles);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $estimado_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,estimado_detalle $estimado_detalle,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,estimado_detalle $estimado_detalle,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		estimado_detalle_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(estimado_detalle $estimado_detalle,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//estimado_detalle_logic_add::updateestimado_detalleToGet($this->estimado_detalle);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$estimado_detalle->setestimado($this->estimado_detalleDataAccess->getestimado($this->connexion,$estimado_detalle));
		$estimado_detalle->setbodega($this->estimado_detalleDataAccess->getbodega($this->connexion,$estimado_detalle));
		$estimado_detalle->setproducto($this->estimado_detalleDataAccess->getproducto($this->connexion,$estimado_detalle));
		$estimado_detalle->setunidad($this->estimado_detalleDataAccess->getunidad($this->connexion,$estimado_detalle));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==estimado::$class.'') {
				$estimado_detalle->setestimado($this->estimado_detalleDataAccess->getestimado($this->connexion,$estimado_detalle));
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$estimado_detalle->setbodega($this->estimado_detalleDataAccess->getbodega($this->connexion,$estimado_detalle));
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$estimado_detalle->setproducto($this->estimado_detalleDataAccess->getproducto($this->connexion,$estimado_detalle));
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				$estimado_detalle->setunidad($this->estimado_detalleDataAccess->getunidad($this->connexion,$estimado_detalle));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estimado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado_detalle->setestimado($this->estimado_detalleDataAccess->getestimado($this->connexion,$estimado_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado_detalle->setbodega($this->estimado_detalleDataAccess->getbodega($this->connexion,$estimado_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado_detalle->setproducto($this->estimado_detalleDataAccess->getproducto($this->connexion,$estimado_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado_detalle->setunidad($this->estimado_detalleDataAccess->getunidad($this->connexion,$estimado_detalle));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$estimado_detalle->setestimado($this->estimado_detalleDataAccess->getestimado($this->connexion,$estimado_detalle));
		$estimadoLogic= new estimado_logic($this->connexion);
		$estimadoLogic->deepLoad($estimado_detalle->getestimado(),$isDeep,$deepLoadType,$clases);
				
		$estimado_detalle->setbodega($this->estimado_detalleDataAccess->getbodega($this->connexion,$estimado_detalle));
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepLoad($estimado_detalle->getbodega(),$isDeep,$deepLoadType,$clases);
				
		$estimado_detalle->setproducto($this->estimado_detalleDataAccess->getproducto($this->connexion,$estimado_detalle));
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepLoad($estimado_detalle->getproducto(),$isDeep,$deepLoadType,$clases);
				
		$estimado_detalle->setunidad($this->estimado_detalleDataAccess->getunidad($this->connexion,$estimado_detalle));
		$unidadLogic= new unidad_logic($this->connexion);
		$unidadLogic->deepLoad($estimado_detalle->getunidad(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==estimado::$class.'') {
				$estimado_detalle->setestimado($this->estimado_detalleDataAccess->getestimado($this->connexion,$estimado_detalle));
				$estimadoLogic= new estimado_logic($this->connexion);
				$estimadoLogic->deepLoad($estimado_detalle->getestimado(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$estimado_detalle->setbodega($this->estimado_detalleDataAccess->getbodega($this->connexion,$estimado_detalle));
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepLoad($estimado_detalle->getbodega(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$estimado_detalle->setproducto($this->estimado_detalleDataAccess->getproducto($this->connexion,$estimado_detalle));
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($estimado_detalle->getproducto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				$estimado_detalle->setunidad($this->estimado_detalleDataAccess->getunidad($this->connexion,$estimado_detalle));
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepLoad($estimado_detalle->getunidad(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estimado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado_detalle->setestimado($this->estimado_detalleDataAccess->getestimado($this->connexion,$estimado_detalle));
			$estimadoLogic= new estimado_logic($this->connexion);
			$estimadoLogic->deepLoad($estimado_detalle->getestimado(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado_detalle->setbodega($this->estimado_detalleDataAccess->getbodega($this->connexion,$estimado_detalle));
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepLoad($estimado_detalle->getbodega(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado_detalle->setproducto($this->estimado_detalleDataAccess->getproducto($this->connexion,$estimado_detalle));
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($estimado_detalle->getproducto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado_detalle->setunidad($this->estimado_detalleDataAccess->getunidad($this->connexion,$estimado_detalle));
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepLoad($estimado_detalle->getunidad(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(estimado_detalle $estimado_detalle,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//estimado_detalle_logic_add::updateestimado_detalleToSave($this->estimado_detalle);			
			
			if(!$paraDeleteCascade) {				
				estimado_detalle_data::save($estimado_detalle, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		estimado_data::save($estimado_detalle->getestimado(),$this->connexion);
		bodega_data::save($estimado_detalle->getbodega(),$this->connexion);
		producto_data::save($estimado_detalle->getproducto(),$this->connexion);
		unidad_data::save($estimado_detalle->getunidad(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==estimado::$class.'') {
				estimado_data::save($estimado_detalle->getestimado(),$this->connexion);
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($estimado_detalle->getbodega(),$this->connexion);
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($estimado_detalle->getproducto(),$this->connexion);
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				unidad_data::save($estimado_detalle->getunidad(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estimado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estimado_data::save($estimado_detalle->getestimado(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($estimado_detalle->getbodega(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($estimado_detalle->getproducto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($estimado_detalle->getunidad(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		estimado_data::save($estimado_detalle->getestimado(),$this->connexion);
		$estimadoLogic= new estimado_logic($this->connexion);
		$estimadoLogic->deepSave($estimado_detalle->getestimado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		bodega_data::save($estimado_detalle->getbodega(),$this->connexion);
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepSave($estimado_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		producto_data::save($estimado_detalle->getproducto(),$this->connexion);
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepSave($estimado_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		unidad_data::save($estimado_detalle->getunidad(),$this->connexion);
		$unidadLogic= new unidad_logic($this->connexion);
		$unidadLogic->deepSave($estimado_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==estimado::$class.'') {
				estimado_data::save($estimado_detalle->getestimado(),$this->connexion);
				$estimadoLogic= new estimado_logic($this->connexion);
				$estimadoLogic->deepSave($estimado_detalle->getestimado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($estimado_detalle->getbodega(),$this->connexion);
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepSave($estimado_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($estimado_detalle->getproducto(),$this->connexion);
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepSave($estimado_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				unidad_data::save($estimado_detalle->getunidad(),$this->connexion);
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepSave($estimado_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estimado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estimado_data::save($estimado_detalle->getestimado(),$this->connexion);
			$estimadoLogic= new estimado_logic($this->connexion);
			$estimadoLogic->deepSave($estimado_detalle->getestimado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($estimado_detalle->getbodega(),$this->connexion);
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepSave($estimado_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($estimado_detalle->getproducto(),$this->connexion);
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepSave($estimado_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($estimado_detalle->getunidad(),$this->connexion);
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepSave($estimado_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				estimado_detalle_data::save($estimado_detalle, $this->connexion);
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
			
			$this->deepLoad($this->estimado_detalle,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->estimado_detalles as $estimado_detalle) {
				$this->deepLoad($estimado_detalle,$isDeep,$deepLoadType,$clases);
								
				estimado_detalle_util::refrescarFKDescripciones($this->estimado_detalles);
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
			
			foreach($this->estimado_detalles as $estimado_detalle) {
				$this->deepLoad($estimado_detalle,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->estimado_detalle,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->estimado_detalles as $estimado_detalle) {
				$this->deepSave($estimado_detalle,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->estimado_detalles as $estimado_detalle) {
				$this->deepSave($estimado_detalle,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(estimado::$class);
				$classes[]=new Classe(bodega::$class);
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(unidad::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==estimado::$class) {
						$classes[]=new Classe(estimado::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==bodega::$class) {
						$classes[]=new Classe(bodega::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==producto::$class) {
						$classes[]=new Classe(producto::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==unidad::$class) {
						$classes[]=new Classe(unidad::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==estimado::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(estimado::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==bodega::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(bodega::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(producto::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==unidad::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(unidad::$class);
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
				
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getestimado_detalle() : ?estimado_detalle {	
		/*
		estimado_detalle_logic_add::checkestimado_detalleToGet($this->estimado_detalle,$this->datosCliente);
		estimado_detalle_logic_add::updateestimado_detalleToGet($this->estimado_detalle);
		*/
			
		return $this->estimado_detalle;
	}
		
	public function setestimado_detalle(estimado_detalle $newestimado_detalle) {
		$this->estimado_detalle = $newestimado_detalle;
	}
	
	public function getestimado_detalles() : array {		
		/*
		estimado_detalle_logic_add::checkestimado_detalleToGets($this->estimado_detalles,$this->datosCliente);
		
		foreach ($this->estimado_detalles as $estimado_detalleLocal ) {
			estimado_detalle_logic_add::updateestimado_detalleToGet($estimado_detalleLocal);
		}
		*/
		
		return $this->estimado_detalles;
	}
	
	public function setestimado_detalles(array $newestimado_detalles) {
		$this->estimado_detalles = $newestimado_detalles;
	}
	
	public function getestimado_detalleDataAccess() : estimado_detalle_data {
		return $this->estimado_detalleDataAccess;
	}
	
	public function setestimado_detalleDataAccess(estimado_detalle_data $newestimado_detalleDataAccess) {
		$this->estimado_detalleDataAccess = $newestimado_detalleDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        estimado_detalle_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
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
