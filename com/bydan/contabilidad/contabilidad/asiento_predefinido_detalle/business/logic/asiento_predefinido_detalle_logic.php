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

namespace com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_param_return;

use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\presentation\session\asiento_predefinido_detalle_session;

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

use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_util;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\business\entity\asiento_predefinido_detalle;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\business\data\asiento_predefinido_detalle_data;

//FK


use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\entity\asiento_predefinido;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\data\asiento_predefinido_data;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\logic\asiento_predefinido_logic;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;
use com\bydan\contabilidad\contabilidad\centro_costo\business\data\centro_costo_data;
use com\bydan\contabilidad\contabilidad\centro_costo\business\logic\centro_costo_logic;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_util;

//REL


//REL DETALLES




class asiento_predefinido_detalle_logic  extends GeneralEntityLogic implements asiento_predefinido_detalle_logicI {	
	/*GENERAL*/
	public asiento_predefinido_detalle_data $asiento_predefinido_detalleDataAccess;
	//public ?asiento_predefinido_detalle_logic_add $asiento_predefinido_detalleLogicAdditional=null;
	public ?asiento_predefinido_detalle $asiento_predefinido_detalle;
	public array $asiento_predefinido_detalles;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->asiento_predefinido_detalleDataAccess = new asiento_predefinido_detalle_data();			
			$this->asiento_predefinido_detalles = array();
			$this->asiento_predefinido_detalle = new asiento_predefinido_detalle();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->asiento_predefinido_detalleLogicAdditional = new asiento_predefinido_detalle_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->asiento_predefinido_detalleLogicAdditional==null) {
		//	$this->asiento_predefinido_detalleLogicAdditional=new asiento_predefinido_detalle_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->asiento_predefinido_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->asiento_predefinido_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->asiento_predefinido_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->asiento_predefinido_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->asiento_predefinido_detalles = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_predefinido_detalles=$this->asiento_predefinido_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_detalle_util::refrescarFKDescripciones($this->asiento_predefinido_detalles);
			}
			
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGets($this->asiento_predefinido_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinido_detalles);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->asiento_predefinido_detalles = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_predefinido_detalles=$this->asiento_predefinido_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_detalle_util::refrescarFKDescripciones($this->asiento_predefinido_detalles);
			}
			
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGets($this->asiento_predefinido_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinido_detalles);
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
		$this->asiento_predefinido_detalle = new asiento_predefinido_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->asiento_predefinido_detalle=$this->asiento_predefinido_detalleDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->asiento_predefinido_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				asiento_predefinido_detalle_util::refrescarFKDescripcion($this->asiento_predefinido_detalle);
			}
						
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGet($this->asiento_predefinido_detalle,$this->datosCliente);
			//asiento_predefinido_detalle_logic_add::updateasiento_predefinido_detalleToGet($this->asiento_predefinido_detalle);
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
		$this->asiento_predefinido_detalle = new  asiento_predefinido_detalle();
		  		  
        try {		
			$this->asiento_predefinido_detalle=$this->asiento_predefinido_detalleDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->asiento_predefinido_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				asiento_predefinido_detalle_util::refrescarFKDescripcion($this->asiento_predefinido_detalle);
			}
			
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGet($this->asiento_predefinido_detalle,$this->datosCliente);
			//asiento_predefinido_detalle_logic_add::updateasiento_predefinido_detalleToGet($this->asiento_predefinido_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?asiento_predefinido_detalle {
		$asiento_predefinido_detalleLogic = new  asiento_predefinido_detalle_logic();
		  		  
        try {		
			$asiento_predefinido_detalleLogic->setConnexion($connexion);			
			$asiento_predefinido_detalleLogic->getEntity($id);			
			return $asiento_predefinido_detalleLogic->getasiento_predefinido_detalle();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->asiento_predefinido_detalle = new  asiento_predefinido_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->asiento_predefinido_detalle=$this->asiento_predefinido_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->asiento_predefinido_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				asiento_predefinido_detalle_util::refrescarFKDescripcion($this->asiento_predefinido_detalle);
			}
			
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGet($this->asiento_predefinido_detalle,$this->datosCliente);
			//asiento_predefinido_detalle_logic_add::updateasiento_predefinido_detalleToGet($this->asiento_predefinido_detalle);
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
		$this->asiento_predefinido_detalle = new  asiento_predefinido_detalle();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_predefinido_detalle=$this->asiento_predefinido_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->asiento_predefinido_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				asiento_predefinido_detalle_util::refrescarFKDescripcion($this->asiento_predefinido_detalle);
			}
			
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGet($this->asiento_predefinido_detalle,$this->datosCliente);
			//asiento_predefinido_detalle_logic_add::updateasiento_predefinido_detalleToGet($this->asiento_predefinido_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?asiento_predefinido_detalle {
		$asiento_predefinido_detalleLogic = new  asiento_predefinido_detalle_logic();
		  		  
        try {		
			$asiento_predefinido_detalleLogic->setConnexion($connexion);			
			$asiento_predefinido_detalleLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $asiento_predefinido_detalleLogic->getasiento_predefinido_detalle();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->asiento_predefinido_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->asiento_predefinido_detalles=$this->asiento_predefinido_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_detalle_util::refrescarFKDescripciones($this->asiento_predefinido_detalles);
			}
			
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGets($this->asiento_predefinido_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinido_detalles);			
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
		$this->asiento_predefinido_detalles = array();
		  		  
        try {			
			$this->asiento_predefinido_detalles=$this->asiento_predefinido_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_detalle_util::refrescarFKDescripciones($this->asiento_predefinido_detalles);
			}
			
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGets($this->asiento_predefinido_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinido_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->asiento_predefinido_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_predefinido_detalles=$this->asiento_predefinido_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_detalle_util::refrescarFKDescripciones($this->asiento_predefinido_detalles);
			}
			
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGets($this->asiento_predefinido_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinido_detalles);
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
		$this->asiento_predefinido_detalles = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_predefinido_detalles=$this->asiento_predefinido_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_detalle_util::refrescarFKDescripciones($this->asiento_predefinido_detalles);
			}
			
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGets($this->asiento_predefinido_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinido_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$asiento_predefinido_detalleLogic = new  asiento_predefinido_detalle_logic();
		  		  
        try {		
			$asiento_predefinido_detalleLogic->setConnexion($connexion);			
			$asiento_predefinido_detalleLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $asiento_predefinido_detalleLogic->getasiento_predefinido_detalles();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->asiento_predefinido_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->asiento_predefinido_detalles=$this->asiento_predefinido_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_detalle_util::refrescarFKDescripciones($this->asiento_predefinido_detalles);
			}
			
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGets($this->asiento_predefinido_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinido_detalles);
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
		$this->asiento_predefinido_detalles = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_predefinido_detalles=$this->asiento_predefinido_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_detalle_util::refrescarFKDescripciones($this->asiento_predefinido_detalles);
			}
			
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGets($this->asiento_predefinido_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinido_detalles);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->asiento_predefinido_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_predefinido_detalles=$this->asiento_predefinido_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_detalle_util::refrescarFKDescripciones($this->asiento_predefinido_detalles);
			}
			
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGets($this->asiento_predefinido_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinido_detalles);
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
		$this->asiento_predefinido_detalles = array();
		  		  
        try {			
			$this->asiento_predefinido_detalles=$this->asiento_predefinido_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_detalle_util::refrescarFKDescripciones($this->asiento_predefinido_detalles);
			}	
			
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGets($this->asiento_predefinido_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinido_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->asiento_predefinido_detalles = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->asiento_predefinido_detalles=$this->asiento_predefinido_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_detalle_util::refrescarFKDescripciones($this->asiento_predefinido_detalles);
			}
			
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGets($this->asiento_predefinido_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinido_detalles);
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
		$this->asiento_predefinido_detalles = array();
		  		  
        try {		
			$this->asiento_predefinido_detalles=$this->asiento_predefinido_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_detalle_util::refrescarFKDescripciones($this->asiento_predefinido_detalles);
			}
			
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGets($this->asiento_predefinido_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinido_detalles);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_Idasiento_predefinidoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_asiento_predefinido) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_asiento_predefinido= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_asiento_predefinido->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento_predefinido,asiento_predefinido_detalle_util::$ID_ASIENTO_PREDEFINIDO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento_predefinido);

			$this->asiento_predefinido_detalles=$this->asiento_predefinido_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_detalle_util::refrescarFKDescripciones($this->asiento_predefinido_detalles);
			}
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGets($this->asiento_predefinido_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinido_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idasiento_predefinido(string $strFinalQuery,Pagination $pagination,int $id_asiento_predefinido) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_asiento_predefinido= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_asiento_predefinido->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento_predefinido,asiento_predefinido_detalle_util::$ID_ASIENTO_PREDEFINIDO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento_predefinido);

			$this->asiento_predefinido_detalles=$this->asiento_predefinido_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_detalle_util::refrescarFKDescripciones($this->asiento_predefinido_detalles);
			}
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGets($this->asiento_predefinido_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinido_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idcentro_costoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_centro_costo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_centro_costo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_centro_costo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_centro_costo,asiento_predefinido_detalle_util::$ID_CENTRO_COSTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_centro_costo);

			$this->asiento_predefinido_detalles=$this->asiento_predefinido_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_detalle_util::refrescarFKDescripciones($this->asiento_predefinido_detalles);
			}
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGets($this->asiento_predefinido_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinido_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcentro_costo(string $strFinalQuery,Pagination $pagination,int $id_centro_costo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_centro_costo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_centro_costo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_centro_costo,asiento_predefinido_detalle_util::$ID_CENTRO_COSTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_centro_costo);

			$this->asiento_predefinido_detalles=$this->asiento_predefinido_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_detalle_util::refrescarFKDescripciones($this->asiento_predefinido_detalles);
			}
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGets($this->asiento_predefinido_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinido_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdcuentaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cuenta) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,asiento_predefinido_detalle_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->asiento_predefinido_detalles=$this->asiento_predefinido_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_detalle_util::refrescarFKDescripciones($this->asiento_predefinido_detalles);
			}
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGets($this->asiento_predefinido_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinido_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta(string $strFinalQuery,Pagination $pagination,int $id_cuenta) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,asiento_predefinido_detalle_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->asiento_predefinido_detalles=$this->asiento_predefinido_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_detalle_util::refrescarFKDescripciones($this->asiento_predefinido_detalles);
			}
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGets($this->asiento_predefinido_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinido_detalles);
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
						
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToSave($this->asiento_predefinido_detalle,$this->datosCliente,$this->connexion);	       
			//asiento_predefinido_detalle_logic_add::updateasiento_predefinido_detalleToSave($this->asiento_predefinido_detalle);			
			asiento_predefinido_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->asiento_predefinido_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->asiento_predefinido_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->asiento_predefinido_detalle,$this->datosCliente,$this->connexion);
			
			
			asiento_predefinido_detalle_data::save($this->asiento_predefinido_detalle, $this->connexion);	    	       	 				
			//asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToSaveAfter($this->asiento_predefinido_detalle,$this->datosCliente,$this->connexion);			
			//$this->asiento_predefinido_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->asiento_predefinido_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->asiento_predefinido_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->asiento_predefinido_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				asiento_predefinido_detalle_util::refrescarFKDescripcion($this->asiento_predefinido_detalle);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->asiento_predefinido_detalle->getIsDeleted()) {
				$this->asiento_predefinido_detalle=null;
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
						
			/*asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToSave($this->asiento_predefinido_detalle,$this->datosCliente,$this->connexion);*/	        
			//asiento_predefinido_detalle_logic_add::updateasiento_predefinido_detalleToSave($this->asiento_predefinido_detalle);			
			//$this->asiento_predefinido_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->asiento_predefinido_detalle,$this->datosCliente,$this->connexion);			
			asiento_predefinido_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->asiento_predefinido_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			asiento_predefinido_detalle_data::save($this->asiento_predefinido_detalle, $this->connexion);	    	       	 						
			/*asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToSaveAfter($this->asiento_predefinido_detalle,$this->datosCliente,$this->connexion);*/			
			//$this->asiento_predefinido_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->asiento_predefinido_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->asiento_predefinido_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->asiento_predefinido_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				asiento_predefinido_detalle_util::refrescarFKDescripcion($this->asiento_predefinido_detalle);				
			}
			
			if($this->asiento_predefinido_detalle->getIsDeleted()) {
				$this->asiento_predefinido_detalle=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(asiento_predefinido_detalle $asiento_predefinido_detalle,Connexion $connexion)  {
		$asiento_predefinido_detalleLogic = new  asiento_predefinido_detalle_logic();		  		  
        try {		
			$asiento_predefinido_detalleLogic->setConnexion($connexion);			
			$asiento_predefinido_detalleLogic->setasiento_predefinido_detalle($asiento_predefinido_detalle);			
			$asiento_predefinido_detalleLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToSaves($this->asiento_predefinido_detalles,$this->datosCliente,$this->connexion);*/	        	
			//$this->asiento_predefinido_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->asiento_predefinido_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->asiento_predefinido_detalles as $asiento_predefinido_detalleLocal) {				
								
				//asiento_predefinido_detalle_logic_add::updateasiento_predefinido_detalleToSave($asiento_predefinido_detalleLocal);	        	
				asiento_predefinido_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$asiento_predefinido_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				asiento_predefinido_detalle_data::save($asiento_predefinido_detalleLocal, $this->connexion);				
			}
			
			/*asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToSavesAfter($this->asiento_predefinido_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->asiento_predefinido_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->asiento_predefinido_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_detalle_util::refrescarFKDescripciones($this->asiento_predefinido_detalles);
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
			/*asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToSaves($this->asiento_predefinido_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->asiento_predefinido_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->asiento_predefinido_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->asiento_predefinido_detalles as $asiento_predefinido_detalleLocal) {				
								
				//asiento_predefinido_detalle_logic_add::updateasiento_predefinido_detalleToSave($asiento_predefinido_detalleLocal);	        	
				asiento_predefinido_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$asiento_predefinido_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				asiento_predefinido_detalle_data::save($asiento_predefinido_detalleLocal, $this->connexion);				
			}			
			
			/*asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToSavesAfter($this->asiento_predefinido_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->asiento_predefinido_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->asiento_predefinido_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_detalle_util::refrescarFKDescripciones($this->asiento_predefinido_detalles);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $asiento_predefinido_detalles,Connexion $connexion)  {
		$asiento_predefinido_detalleLogic = new  asiento_predefinido_detalle_logic();
		  		  
        try {		
			$asiento_predefinido_detalleLogic->setConnexion($connexion);			
			$asiento_predefinido_detalleLogic->setasiento_predefinido_detalles($asiento_predefinido_detalles);			
			$asiento_predefinido_detalleLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$asiento_predefinido_detallesAux=array();
		
		foreach($this->asiento_predefinido_detalles as $asiento_predefinido_detalle) {
			if($asiento_predefinido_detalle->getIsDeleted()==false) {
				$asiento_predefinido_detallesAux[]=$asiento_predefinido_detalle;
			}
		}
		
		$this->asiento_predefinido_detalles=$asiento_predefinido_detallesAux;
	}
	
	public function updateToGetsAuxiliar(array &$asiento_predefinido_detalles) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->asiento_predefinido_detalles as $asiento_predefinido_detalle) {
				
				$asiento_predefinido_detalle->setid_asiento_predefinido_Descripcion(asiento_predefinido_detalle_util::getasiento_predefinidoDescripcion($asiento_predefinido_detalle->getasiento_predefinido()));
				$asiento_predefinido_detalle->setid_cuenta_Descripcion(asiento_predefinido_detalle_util::getcuentaDescripcion($asiento_predefinido_detalle->getcuenta()));
				$asiento_predefinido_detalle->setid_centro_costo_Descripcion(asiento_predefinido_detalle_util::getcentro_costoDescripcion($asiento_predefinido_detalle->getcentro_costo()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$asiento_predefinido_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$asiento_predefinido_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$asiento_predefinido_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$asiento_predefinido_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$asiento_predefinido_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$asiento_predefinido_detalleForeignKey=new asiento_predefinido_detalle_param_return();//asiento_predefinido_detalleForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_asiento_predefinido',$strRecargarFkTipos,',')) {
				$this->cargarCombosasiento_predefinidosFK($this->connexion,$strRecargarFkQuery,$asiento_predefinido_detalleForeignKey,$asiento_predefinido_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTipos,',')) {
				$this->cargarComboscuentasFK($this->connexion,$strRecargarFkQuery,$asiento_predefinido_detalleForeignKey,$asiento_predefinido_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_centro_costo',$strRecargarFkTipos,',')) {
				$this->cargarComboscentro_costosFK($this->connexion,$strRecargarFkQuery,$asiento_predefinido_detalleForeignKey,$asiento_predefinido_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_asiento_predefinido',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosasiento_predefinidosFK($this->connexion,' where id=-1 ',$asiento_predefinido_detalleForeignKey,$asiento_predefinido_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuentasFK($this->connexion,' where id=-1 ',$asiento_predefinido_detalleForeignKey,$asiento_predefinido_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_centro_costo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscentro_costosFK($this->connexion,' where id=-1 ',$asiento_predefinido_detalleForeignKey,$asiento_predefinido_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $asiento_predefinido_detalleForeignKey;
			
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
	
	
	public function cargarCombosasiento_predefinidosFK($connexion=null,$strRecargarFkQuery='',$asiento_predefinido_detalleForeignKey,$asiento_predefinido_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$asiento_predefinidoLogic= new asiento_predefinido_logic();
		$pagination= new Pagination();
		$asiento_predefinido_detalleForeignKey->asiento_predefinidosFK=array();

		$asiento_predefinidoLogic->setConnexion($connexion);
		$asiento_predefinidoLogic->getasiento_predefinidoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_predefinido_detalle_session==null) {
			$asiento_predefinido_detalle_session=new asiento_predefinido_detalle_session();
		}
		
		if($asiento_predefinido_detalle_session->bitBusquedaDesdeFKSesionasiento_predefinido!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=asiento_predefinido_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalasiento_predefinido=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalasiento_predefinido=Funciones::GetFinalQueryAppend($finalQueryGlobalasiento_predefinido, '');
				$finalQueryGlobalasiento_predefinido.=asiento_predefinido_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalasiento_predefinido.$strRecargarFkQuery;		

				$asiento_predefinidoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($asiento_predefinidoLogic->getasiento_predefinidos() as $asiento_predefinidoLocal ) {
				if($asiento_predefinido_detalleForeignKey->idasiento_predefinidoDefaultFK==0) {
					$asiento_predefinido_detalleForeignKey->idasiento_predefinidoDefaultFK=$asiento_predefinidoLocal->getId();
				}

				$asiento_predefinido_detalleForeignKey->asiento_predefinidosFK[$asiento_predefinidoLocal->getId()]=asiento_predefinido_detalle_util::getasiento_predefinidoDescripcion($asiento_predefinidoLocal);
			}

		} else {

			if($asiento_predefinido_detalle_session->bigidasiento_predefinidoActual!=null && $asiento_predefinido_detalle_session->bigidasiento_predefinidoActual > 0) {
				$asiento_predefinidoLogic->getEntity($asiento_predefinido_detalle_session->bigidasiento_predefinidoActual);//WithConnection

				$asiento_predefinido_detalleForeignKey->asiento_predefinidosFK[$asiento_predefinidoLogic->getasiento_predefinido()->getId()]=asiento_predefinido_detalle_util::getasiento_predefinidoDescripcion($asiento_predefinidoLogic->getasiento_predefinido());
				$asiento_predefinido_detalleForeignKey->idasiento_predefinidoDefaultFK=$asiento_predefinidoLogic->getasiento_predefinido()->getId();
			}
		}
	}

	public function cargarComboscuentasFK($connexion=null,$strRecargarFkQuery='',$asiento_predefinido_detalleForeignKey,$asiento_predefinido_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$asiento_predefinido_detalleForeignKey->cuentasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_predefinido_detalle_session==null) {
			$asiento_predefinido_detalle_session=new asiento_predefinido_detalle_session();
		}
		
		if($asiento_predefinido_detalle_session->bitBusquedaDesdeFKSesioncuenta!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcuenta=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta, '');
				$finalQueryGlobalcuenta.=cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta.$strRecargarFkQuery;		

				$cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($cuentaLogic->getcuentas() as $cuentaLocal ) {
				if($asiento_predefinido_detalleForeignKey->idcuentaDefaultFK==0) {
					$asiento_predefinido_detalleForeignKey->idcuentaDefaultFK=$cuentaLocal->getId();
				}

				$asiento_predefinido_detalleForeignKey->cuentasFK[$cuentaLocal->getId()]=asiento_predefinido_detalle_util::getcuentaDescripcion($cuentaLocal);
			}

		} else {

			if($asiento_predefinido_detalle_session->bigidcuentaActual!=null && $asiento_predefinido_detalle_session->bigidcuentaActual > 0) {
				$cuentaLogic->getEntity($asiento_predefinido_detalle_session->bigidcuentaActual);//WithConnection

				$asiento_predefinido_detalleForeignKey->cuentasFK[$cuentaLogic->getcuenta()->getId()]=asiento_predefinido_detalle_util::getcuentaDescripcion($cuentaLogic->getcuenta());
				$asiento_predefinido_detalleForeignKey->idcuentaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarComboscentro_costosFK($connexion=null,$strRecargarFkQuery='',$asiento_predefinido_detalleForeignKey,$asiento_predefinido_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$centro_costoLogic= new centro_costo_logic();
		$pagination= new Pagination();
		$asiento_predefinido_detalleForeignKey->centro_costosFK=array();

		$centro_costoLogic->setConnexion($connexion);
		$centro_costoLogic->getcentro_costoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_predefinido_detalle_session==null) {
			$asiento_predefinido_detalle_session=new asiento_predefinido_detalle_session();
		}
		
		if($asiento_predefinido_detalle_session->bitBusquedaDesdeFKSesioncentro_costo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=centro_costo_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcentro_costo=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcentro_costo=Funciones::GetFinalQueryAppend($finalQueryGlobalcentro_costo, '');
				$finalQueryGlobalcentro_costo.=centro_costo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcentro_costo.$strRecargarFkQuery;		

				$centro_costoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($centro_costoLogic->getcentro_costos() as $centro_costoLocal ) {
				if($asiento_predefinido_detalleForeignKey->idcentro_costoDefaultFK==0) {
					$asiento_predefinido_detalleForeignKey->idcentro_costoDefaultFK=$centro_costoLocal->getId();
				}

				$asiento_predefinido_detalleForeignKey->centro_costosFK[$centro_costoLocal->getId()]=asiento_predefinido_detalle_util::getcentro_costoDescripcion($centro_costoLocal);
			}

		} else {

			if($asiento_predefinido_detalle_session->bigidcentro_costoActual!=null && $asiento_predefinido_detalle_session->bigidcentro_costoActual > 0) {
				$centro_costoLogic->getEntity($asiento_predefinido_detalle_session->bigidcentro_costoActual);//WithConnection

				$asiento_predefinido_detalleForeignKey->centro_costosFK[$centro_costoLogic->getcentro_costo()->getId()]=asiento_predefinido_detalle_util::getcentro_costoDescripcion($centro_costoLogic->getcentro_costo());
				$asiento_predefinido_detalleForeignKey->idcentro_costoDefaultFK=$centro_costoLogic->getcentro_costo()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($asiento_predefinido_detalle) {
		$this->saveRelacionesBase($asiento_predefinido_detalle,true);
	}

	public function saveRelaciones($asiento_predefinido_detalle) {
		$this->saveRelacionesBase($asiento_predefinido_detalle,false);
	}

	public function saveRelacionesBase($asiento_predefinido_detalle,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setasiento_predefinido_detalle($asiento_predefinido_detalle);

			if(true) {

				//asiento_predefinido_detalle_logic_add::updateRelacionesToSave($asiento_predefinido_detalle,$this);

				if(($this->asiento_predefinido_detalle->getIsNew() || $this->asiento_predefinido_detalle->getIsChanged()) && !$this->asiento_predefinido_detalle->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->asiento_predefinido_detalle->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//asiento_predefinido_detalle_logic_add::updateRelacionesToSaveAfter($asiento_predefinido_detalle,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $asiento_predefinido_detalles,asiento_predefinido_detalle_param_return $asiento_predefinido_detalleParameterGeneral) : asiento_predefinido_detalle_param_return {
		$asiento_predefinido_detalleReturnGeneral=new asiento_predefinido_detalle_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $asiento_predefinido_detalleReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $asiento_predefinido_detalles,asiento_predefinido_detalle_param_return $asiento_predefinido_detalleParameterGeneral) : asiento_predefinido_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$asiento_predefinido_detalleReturnGeneral=new asiento_predefinido_detalle_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $asiento_predefinido_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $asiento_predefinido_detalles,asiento_predefinido_detalle $asiento_predefinido_detalle,asiento_predefinido_detalle_param_return $asiento_predefinido_detalleParameterGeneral,bool $isEsNuevoasiento_predefinido_detalle,array $clases) : asiento_predefinido_detalle_param_return {
		 try {	
			$asiento_predefinido_detalleReturnGeneral=new asiento_predefinido_detalle_param_return();
	
			$asiento_predefinido_detalleReturnGeneral->setasiento_predefinido_detalle($asiento_predefinido_detalle);
			$asiento_predefinido_detalleReturnGeneral->setasiento_predefinido_detalles($asiento_predefinido_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$asiento_predefinido_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $asiento_predefinido_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $asiento_predefinido_detalles,asiento_predefinido_detalle $asiento_predefinido_detalle,asiento_predefinido_detalle_param_return $asiento_predefinido_detalleParameterGeneral,bool $isEsNuevoasiento_predefinido_detalle,array $clases) : asiento_predefinido_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$asiento_predefinido_detalleReturnGeneral=new asiento_predefinido_detalle_param_return();
	
			$asiento_predefinido_detalleReturnGeneral->setasiento_predefinido_detalle($asiento_predefinido_detalle);
			$asiento_predefinido_detalleReturnGeneral->setasiento_predefinido_detalles($asiento_predefinido_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$asiento_predefinido_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $asiento_predefinido_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $asiento_predefinido_detalles,asiento_predefinido_detalle $asiento_predefinido_detalle,asiento_predefinido_detalle_param_return $asiento_predefinido_detalleParameterGeneral,bool $isEsNuevoasiento_predefinido_detalle,array $clases) : asiento_predefinido_detalle_param_return {
		 try {	
			$asiento_predefinido_detalleReturnGeneral=new asiento_predefinido_detalle_param_return();
	
			$asiento_predefinido_detalleReturnGeneral->setasiento_predefinido_detalle($asiento_predefinido_detalle);
			$asiento_predefinido_detalleReturnGeneral->setasiento_predefinido_detalles($asiento_predefinido_detalles);
			
			
			
			return $asiento_predefinido_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $asiento_predefinido_detalles,asiento_predefinido_detalle $asiento_predefinido_detalle,asiento_predefinido_detalle_param_return $asiento_predefinido_detalleParameterGeneral,bool $isEsNuevoasiento_predefinido_detalle,array $clases) : asiento_predefinido_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$asiento_predefinido_detalleReturnGeneral=new asiento_predefinido_detalle_param_return();
	
			$asiento_predefinido_detalleReturnGeneral->setasiento_predefinido_detalle($asiento_predefinido_detalle);
			$asiento_predefinido_detalleReturnGeneral->setasiento_predefinido_detalles($asiento_predefinido_detalles);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $asiento_predefinido_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,asiento_predefinido_detalle $asiento_predefinido_detalle,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,asiento_predefinido_detalle $asiento_predefinido_detalle,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		asiento_predefinido_detalle_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(asiento_predefinido_detalle $asiento_predefinido_detalle,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//asiento_predefinido_detalle_logic_add::updateasiento_predefinido_detalleToGet($this->asiento_predefinido_detalle);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$asiento_predefinido_detalle->setasiento_predefinido($this->asiento_predefinido_detalleDataAccess->getasiento_predefinido($this->connexion,$asiento_predefinido_detalle));
		$asiento_predefinido_detalle->setcuenta($this->asiento_predefinido_detalleDataAccess->getcuenta($this->connexion,$asiento_predefinido_detalle));
		$asiento_predefinido_detalle->setcentro_costo($this->asiento_predefinido_detalleDataAccess->getcentro_costo($this->connexion,$asiento_predefinido_detalle));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class.'') {
				$asiento_predefinido_detalle->setasiento_predefinido($this->asiento_predefinido_detalleDataAccess->getasiento_predefinido($this->connexion,$asiento_predefinido_detalle));
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$asiento_predefinido_detalle->setcuenta($this->asiento_predefinido_detalleDataAccess->getcuenta($this->connexion,$asiento_predefinido_detalle));
				continue;
			}

			if($clas->clas==centro_costo::$class.'') {
				$asiento_predefinido_detalle->setcentro_costo($this->asiento_predefinido_detalleDataAccess->getcentro_costo($this->connexion,$asiento_predefinido_detalle));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido_detalle->setasiento_predefinido($this->asiento_predefinido_detalleDataAccess->getasiento_predefinido($this->connexion,$asiento_predefinido_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido_detalle->setcuenta($this->asiento_predefinido_detalleDataAccess->getcuenta($this->connexion,$asiento_predefinido_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==centro_costo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido_detalle->setcentro_costo($this->asiento_predefinido_detalleDataAccess->getcentro_costo($this->connexion,$asiento_predefinido_detalle));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$asiento_predefinido_detalle->setasiento_predefinido($this->asiento_predefinido_detalleDataAccess->getasiento_predefinido($this->connexion,$asiento_predefinido_detalle));
		$asiento_predefinidoLogic= new asiento_predefinido_logic($this->connexion);
		$asiento_predefinidoLogic->deepLoad($asiento_predefinido_detalle->getasiento_predefinido(),$isDeep,$deepLoadType,$clases);
				
		$asiento_predefinido_detalle->setcuenta($this->asiento_predefinido_detalleDataAccess->getcuenta($this->connexion,$asiento_predefinido_detalle));
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepLoad($asiento_predefinido_detalle->getcuenta(),$isDeep,$deepLoadType,$clases);
				
		$asiento_predefinido_detalle->setcentro_costo($this->asiento_predefinido_detalleDataAccess->getcentro_costo($this->connexion,$asiento_predefinido_detalle));
		$centro_costoLogic= new centro_costo_logic($this->connexion);
		$centro_costoLogic->deepLoad($asiento_predefinido_detalle->getcentro_costo(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class.'') {
				$asiento_predefinido_detalle->setasiento_predefinido($this->asiento_predefinido_detalleDataAccess->getasiento_predefinido($this->connexion,$asiento_predefinido_detalle));
				$asiento_predefinidoLogic= new asiento_predefinido_logic($this->connexion);
				$asiento_predefinidoLogic->deepLoad($asiento_predefinido_detalle->getasiento_predefinido(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$asiento_predefinido_detalle->setcuenta($this->asiento_predefinido_detalleDataAccess->getcuenta($this->connexion,$asiento_predefinido_detalle));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($asiento_predefinido_detalle->getcuenta(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==centro_costo::$class.'') {
				$asiento_predefinido_detalle->setcentro_costo($this->asiento_predefinido_detalleDataAccess->getcentro_costo($this->connexion,$asiento_predefinido_detalle));
				$centro_costoLogic= new centro_costo_logic($this->connexion);
				$centro_costoLogic->deepLoad($asiento_predefinido_detalle->getcentro_costo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido_detalle->setasiento_predefinido($this->asiento_predefinido_detalleDataAccess->getasiento_predefinido($this->connexion,$asiento_predefinido_detalle));
			$asiento_predefinidoLogic= new asiento_predefinido_logic($this->connexion);
			$asiento_predefinidoLogic->deepLoad($asiento_predefinido_detalle->getasiento_predefinido(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido_detalle->setcuenta($this->asiento_predefinido_detalleDataAccess->getcuenta($this->connexion,$asiento_predefinido_detalle));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($asiento_predefinido_detalle->getcuenta(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==centro_costo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido_detalle->setcentro_costo($this->asiento_predefinido_detalleDataAccess->getcentro_costo($this->connexion,$asiento_predefinido_detalle));
			$centro_costoLogic= new centro_costo_logic($this->connexion);
			$centro_costoLogic->deepLoad($asiento_predefinido_detalle->getcentro_costo(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(asiento_predefinido_detalle $asiento_predefinido_detalle,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//asiento_predefinido_detalle_logic_add::updateasiento_predefinido_detalleToSave($this->asiento_predefinido_detalle);			
			
			if(!$paraDeleteCascade) {				
				asiento_predefinido_detalle_data::save($asiento_predefinido_detalle, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		asiento_predefinido_data::save($asiento_predefinido_detalle->getasiento_predefinido(),$this->connexion);
		cuenta_data::save($asiento_predefinido_detalle->getcuenta(),$this->connexion);
		centro_costo_data::save($asiento_predefinido_detalle->getcentro_costo(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class.'') {
				asiento_predefinido_data::save($asiento_predefinido_detalle->getasiento_predefinido(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($asiento_predefinido_detalle->getcuenta(),$this->connexion);
				continue;
			}

			if($clas->clas==centro_costo::$class.'') {
				centro_costo_data::save($asiento_predefinido_detalle->getcentro_costo(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_predefinido_data::save($asiento_predefinido_detalle->getasiento_predefinido(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($asiento_predefinido_detalle->getcuenta(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==centro_costo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			centro_costo_data::save($asiento_predefinido_detalle->getcentro_costo(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		asiento_predefinido_data::save($asiento_predefinido_detalle->getasiento_predefinido(),$this->connexion);
		$asiento_predefinidoLogic= new asiento_predefinido_logic($this->connexion);
		$asiento_predefinidoLogic->deepSave($asiento_predefinido_detalle->getasiento_predefinido(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($asiento_predefinido_detalle->getcuenta(),$this->connexion);
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepSave($asiento_predefinido_detalle->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		centro_costo_data::save($asiento_predefinido_detalle->getcentro_costo(),$this->connexion);
		$centro_costoLogic= new centro_costo_logic($this->connexion);
		$centro_costoLogic->deepSave($asiento_predefinido_detalle->getcentro_costo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class.'') {
				asiento_predefinido_data::save($asiento_predefinido_detalle->getasiento_predefinido(),$this->connexion);
				$asiento_predefinidoLogic= new asiento_predefinido_logic($this->connexion);
				$asiento_predefinidoLogic->deepSave($asiento_predefinido_detalle->getasiento_predefinido(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($asiento_predefinido_detalle->getcuenta(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($asiento_predefinido_detalle->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==centro_costo::$class.'') {
				centro_costo_data::save($asiento_predefinido_detalle->getcentro_costo(),$this->connexion);
				$centro_costoLogic= new centro_costo_logic($this->connexion);
				$centro_costoLogic->deepSave($asiento_predefinido_detalle->getcentro_costo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_predefinido_data::save($asiento_predefinido_detalle->getasiento_predefinido(),$this->connexion);
			$asiento_predefinidoLogic= new asiento_predefinido_logic($this->connexion);
			$asiento_predefinidoLogic->deepSave($asiento_predefinido_detalle->getasiento_predefinido(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($asiento_predefinido_detalle->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($asiento_predefinido_detalle->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==centro_costo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			centro_costo_data::save($asiento_predefinido_detalle->getcentro_costo(),$this->connexion);
			$centro_costoLogic= new centro_costo_logic($this->connexion);
			$centro_costoLogic->deepSave($asiento_predefinido_detalle->getcentro_costo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				asiento_predefinido_detalle_data::save($asiento_predefinido_detalle, $this->connexion);
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
			
			$this->deepLoad($this->asiento_predefinido_detalle,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->asiento_predefinido_detalles as $asiento_predefinido_detalle) {
				$this->deepLoad($asiento_predefinido_detalle,$isDeep,$deepLoadType,$clases);
								
				asiento_predefinido_detalle_util::refrescarFKDescripciones($this->asiento_predefinido_detalles);
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
			
			foreach($this->asiento_predefinido_detalles as $asiento_predefinido_detalle) {
				$this->deepLoad($asiento_predefinido_detalle,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->asiento_predefinido_detalle,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->asiento_predefinido_detalles as $asiento_predefinido_detalle) {
				$this->deepSave($asiento_predefinido_detalle,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->asiento_predefinido_detalles as $asiento_predefinido_detalle) {
				$this->deepSave($asiento_predefinido_detalle,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(asiento_predefinido::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(centro_costo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==asiento_predefinido::$class) {
						$classes[]=new Classe(asiento_predefinido::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==centro_costo::$class) {
						$classes[]=new Classe(centro_costo::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==asiento_predefinido::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento_predefinido::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==centro_costo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(centro_costo::$class);
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
	
	
	
	
	
	
	
	public function getasiento_predefinido_detalle() : ?asiento_predefinido_detalle {	
		/*
		asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGet($this->asiento_predefinido_detalle,$this->datosCliente);
		asiento_predefinido_detalle_logic_add::updateasiento_predefinido_detalleToGet($this->asiento_predefinido_detalle);
		*/
			
		return $this->asiento_predefinido_detalle;
	}
		
	public function setasiento_predefinido_detalle(asiento_predefinido_detalle $newasiento_predefinido_detalle) {
		$this->asiento_predefinido_detalle = $newasiento_predefinido_detalle;
	}
	
	public function getasiento_predefinido_detalles() : array {		
		/*
		asiento_predefinido_detalle_logic_add::checkasiento_predefinido_detalleToGets($this->asiento_predefinido_detalles,$this->datosCliente);
		
		foreach ($this->asiento_predefinido_detalles as $asiento_predefinido_detalleLocal ) {
			asiento_predefinido_detalle_logic_add::updateasiento_predefinido_detalleToGet($asiento_predefinido_detalleLocal);
		}
		*/
		
		return $this->asiento_predefinido_detalles;
	}
	
	public function setasiento_predefinido_detalles(array $newasiento_predefinido_detalles) {
		$this->asiento_predefinido_detalles = $newasiento_predefinido_detalles;
	}
	
	public function getasiento_predefinido_detalleDataAccess() : asiento_predefinido_detalle_data {
		return $this->asiento_predefinido_detalleDataAccess;
	}
	
	public function setasiento_predefinido_detalleDataAccess(asiento_predefinido_detalle_data $newasiento_predefinido_detalleDataAccess) {
		$this->asiento_predefinido_detalleDataAccess = $newasiento_predefinido_detalleDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        asiento_predefinido_detalle_carga::$CONTROLLER;;        
		
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
