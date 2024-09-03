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

namespace com\bydan\contabilidad\seguridad\auditoria_detalle\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\auditoria_detalle\util\auditoria_detalle_carga;
use com\bydan\contabilidad\seguridad\auditoria_detalle\util\auditoria_detalle_param_return;

use com\bydan\contabilidad\seguridad\auditoria_detalle\presentation\session\auditoria_detalle_session;

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

use com\bydan\contabilidad\seguridad\auditoria_detalle\util\auditoria_detalle_util;
use com\bydan\contabilidad\seguridad\auditoria_detalle\business\entity\auditoria_detalle;
use com\bydan\contabilidad\seguridad\auditoria_detalle\business\data\auditoria_detalle_data;

//FK


use com\bydan\contabilidad\seguridad\auditoria\business\data\auditoria_data;
use com\bydan\contabilidad\seguridad\auditoria\business\logic\auditoria_logic;
use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_util;

//REL


//REL DETALLES




class auditoria_detalle_logic  extends GeneralEntityLogic implements auditoria_detalle_logicI {	
	/*GENERAL*/
	public auditoria_detalle_data $auditoria_detalleDataAccess;
	//public ?auditoria_detalle_logic_add $auditoria_detalleLogicAdditional=null;
	public ?auditoria_detalle $auditoria_detalle;
	public array $auditoria_detalles;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->auditoria_detalleDataAccess = new auditoria_detalle_data();			
			$this->auditoria_detalles = array();
			$this->auditoria_detalle = new auditoria_detalle();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->auditoria_detalleLogicAdditional = new auditoria_detalle_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->auditoria_detalleLogicAdditional==null) {
		//	$this->auditoria_detalleLogicAdditional=new auditoria_detalle_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->auditoria_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->auditoria_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->auditoria_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->auditoria_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->auditoria_detalles = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->auditoria_detalles=$this->auditoria_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_detalle_util::refrescarFKDescripciones($this->auditoria_detalles);
			}
			
			//auditoria_detalle_logic_add::checkauditoria_detalleToGets($this->auditoria_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditoria_detalles);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->auditoria_detalles = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->auditoria_detalles=$this->auditoria_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_detalle_util::refrescarFKDescripciones($this->auditoria_detalles);
			}
			
			//auditoria_detalle_logic_add::checkauditoria_detalleToGets($this->auditoria_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditoria_detalles);
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
		$this->auditoria_detalle = new auditoria_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->auditoria_detalle=$this->auditoria_detalleDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->auditoria_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				auditoria_detalle_util::refrescarFKDescripcion($this->auditoria_detalle);
			}
						
			//auditoria_detalle_logic_add::checkauditoria_detalleToGet($this->auditoria_detalle,$this->datosCliente);
			//auditoria_detalle_logic_add::updateauditoria_detalleToGet($this->auditoria_detalle);
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
		$this->auditoria_detalle = new  auditoria_detalle();
		  		  
        try {		
			$this->auditoria_detalle=$this->auditoria_detalleDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->auditoria_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				auditoria_detalle_util::refrescarFKDescripcion($this->auditoria_detalle);
			}
			
			//auditoria_detalle_logic_add::checkauditoria_detalleToGet($this->auditoria_detalle,$this->datosCliente);
			//auditoria_detalle_logic_add::updateauditoria_detalleToGet($this->auditoria_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?auditoria_detalle {
		$auditoria_detalleLogic = new  auditoria_detalle_logic();
		  		  
        try {		
			$auditoria_detalleLogic->setConnexion($connexion);			
			$auditoria_detalleLogic->getEntity($id);			
			return $auditoria_detalleLogic->getauditoria_detalle();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->auditoria_detalle = new  auditoria_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->auditoria_detalle=$this->auditoria_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->auditoria_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				auditoria_detalle_util::refrescarFKDescripcion($this->auditoria_detalle);
			}
			
			//auditoria_detalle_logic_add::checkauditoria_detalleToGet($this->auditoria_detalle,$this->datosCliente);
			//auditoria_detalle_logic_add::updateauditoria_detalleToGet($this->auditoria_detalle);
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
		$this->auditoria_detalle = new  auditoria_detalle();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->auditoria_detalle=$this->auditoria_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->auditoria_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				auditoria_detalle_util::refrescarFKDescripcion($this->auditoria_detalle);
			}
			
			//auditoria_detalle_logic_add::checkauditoria_detalleToGet($this->auditoria_detalle,$this->datosCliente);
			//auditoria_detalle_logic_add::updateauditoria_detalleToGet($this->auditoria_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?auditoria_detalle {
		$auditoria_detalleLogic = new  auditoria_detalle_logic();
		  		  
        try {		
			$auditoria_detalleLogic->setConnexion($connexion);			
			$auditoria_detalleLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $auditoria_detalleLogic->getauditoria_detalle();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->auditoria_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->auditoria_detalles=$this->auditoria_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_detalle_util::refrescarFKDescripciones($this->auditoria_detalles);
			}
			
			//auditoria_detalle_logic_add::checkauditoria_detalleToGets($this->auditoria_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditoria_detalles);			
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
		$this->auditoria_detalles = array();
		  		  
        try {			
			$this->auditoria_detalles=$this->auditoria_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_detalle_util::refrescarFKDescripciones($this->auditoria_detalles);
			}
			
			//auditoria_detalle_logic_add::checkauditoria_detalleToGets($this->auditoria_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditoria_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->auditoria_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->auditoria_detalles=$this->auditoria_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_detalle_util::refrescarFKDescripciones($this->auditoria_detalles);
			}
			
			//auditoria_detalle_logic_add::checkauditoria_detalleToGets($this->auditoria_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditoria_detalles);
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
		$this->auditoria_detalles = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->auditoria_detalles=$this->auditoria_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_detalle_util::refrescarFKDescripciones($this->auditoria_detalles);
			}
			
			//auditoria_detalle_logic_add::checkauditoria_detalleToGets($this->auditoria_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditoria_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$auditoria_detalleLogic = new  auditoria_detalle_logic();
		  		  
        try {		
			$auditoria_detalleLogic->setConnexion($connexion);			
			$auditoria_detalleLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $auditoria_detalleLogic->getauditoria_detalles();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->auditoria_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->auditoria_detalles=$this->auditoria_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_detalle_util::refrescarFKDescripciones($this->auditoria_detalles);
			}
			
			//auditoria_detalle_logic_add::checkauditoria_detalleToGets($this->auditoria_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditoria_detalles);
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
		$this->auditoria_detalles = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->auditoria_detalles=$this->auditoria_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_detalle_util::refrescarFKDescripciones($this->auditoria_detalles);
			}
			
			//auditoria_detalle_logic_add::checkauditoria_detalleToGets($this->auditoria_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditoria_detalles);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->auditoria_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->auditoria_detalles=$this->auditoria_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_detalle_util::refrescarFKDescripciones($this->auditoria_detalles);
			}
			
			//auditoria_detalle_logic_add::checkauditoria_detalleToGets($this->auditoria_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditoria_detalles);
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
		$this->auditoria_detalles = array();
		  		  
        try {			
			$this->auditoria_detalles=$this->auditoria_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_detalle_util::refrescarFKDescripciones($this->auditoria_detalles);
			}	
			
			//auditoria_detalle_logic_add::checkauditoria_detalleToGets($this->auditoria_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditoria_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->auditoria_detalles = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->auditoria_detalles=$this->auditoria_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_detalle_util::refrescarFKDescripciones($this->auditoria_detalles);
			}
			
			//auditoria_detalle_logic_add::checkauditoria_detalleToGets($this->auditoria_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditoria_detalles);
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
		$this->auditoria_detalles = array();
		  		  
        try {		
			$this->auditoria_detalles=$this->auditoria_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_detalle_util::refrescarFKDescripciones($this->auditoria_detalles);
			}
			
			//auditoria_detalle_logic_add::checkauditoria_detalleToGets($this->auditoria_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->auditoria_detalles);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsBusquedaPorIdAuditoriaPorNombreCampoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_auditoria,string $nombre_campo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_auditoria= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_auditoria->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_auditoria,auditoria_detalle_util::$ID_AUDITORIA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_auditoria);

			$parameterSelectionGeneralnombre_campo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre_campo->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre_campo."%",auditoria_detalle_util::$NOMBRE_CAMPO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre_campo);

			$this->auditoria_detalles=$this->auditoria_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				auditoria_detalle_util::refrescarFKDescripciones($this->auditoria_detalles);
			}
			//auditoria_detalle_logic_add::checkauditoria_detalleToGets($this->auditoria_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->auditoria_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorIdAuditoriaPorNombreCampo(string $strFinalQuery,Pagination $pagination,int $id_auditoria,string $nombre_campo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_auditoria= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_auditoria->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_auditoria,auditoria_detalle_util::$ID_AUDITORIA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_auditoria);

			$parameterSelectionGeneralnombre_campo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre_campo->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre_campo."%",auditoria_detalle_util::$NOMBRE_CAMPO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre_campo);

			$this->auditoria_detalles=$this->auditoria_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				auditoria_detalle_util::refrescarFKDescripciones($this->auditoria_detalles);
			}
			//auditoria_detalle_logic_add::checkauditoria_detalleToGets($this->auditoria_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->auditoria_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdauditoriaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_auditoria) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_auditoria= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_auditoria->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_auditoria,auditoria_detalle_util::$ID_AUDITORIA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_auditoria);

			$this->auditoria_detalles=$this->auditoria_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				auditoria_detalle_util::refrescarFKDescripciones($this->auditoria_detalles);
			}
			//auditoria_detalle_logic_add::checkauditoria_detalleToGets($this->auditoria_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->auditoria_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idauditoria(string $strFinalQuery,Pagination $pagination,int $id_auditoria) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_auditoria= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_auditoria->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_auditoria,auditoria_detalle_util::$ID_AUDITORIA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_auditoria);

			$this->auditoria_detalles=$this->auditoria_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				auditoria_detalle_util::refrescarFKDescripciones($this->auditoria_detalles);
			}
			//auditoria_detalle_logic_add::checkauditoria_detalleToGets($this->auditoria_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->auditoria_detalles);
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
						
			//auditoria_detalle_logic_add::checkauditoria_detalleToSave($this->auditoria_detalle,$this->datosCliente,$this->connexion);	       
			//auditoria_detalle_logic_add::updateauditoria_detalleToSave($this->auditoria_detalle);			
			auditoria_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->auditoria_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->auditoria_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->auditoria_detalle,$this->datosCliente,$this->connexion);
			
			
			auditoria_detalle_data::save($this->auditoria_detalle, $this->connexion);	    	       	 				
			//auditoria_detalle_logic_add::checkauditoria_detalleToSaveAfter($this->auditoria_detalle,$this->datosCliente,$this->connexion);			
			//$this->auditoria_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->auditoria_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->auditoria_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->auditoria_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				auditoria_detalle_util::refrescarFKDescripcion($this->auditoria_detalle);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->auditoria_detalle->getIsDeleted()) {
				$this->auditoria_detalle=null;
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
						
			/*auditoria_detalle_logic_add::checkauditoria_detalleToSave($this->auditoria_detalle,$this->datosCliente,$this->connexion);*/	        
			//auditoria_detalle_logic_add::updateauditoria_detalleToSave($this->auditoria_detalle);			
			//$this->auditoria_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->auditoria_detalle,$this->datosCliente,$this->connexion);			
			auditoria_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->auditoria_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			auditoria_detalle_data::save($this->auditoria_detalle, $this->connexion);	    	       	 						
			/*auditoria_detalle_logic_add::checkauditoria_detalleToSaveAfter($this->auditoria_detalle,$this->datosCliente,$this->connexion);*/			
			//$this->auditoria_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->auditoria_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->auditoria_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->auditoria_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				auditoria_detalle_util::refrescarFKDescripcion($this->auditoria_detalle);				
			}
			
			if($this->auditoria_detalle->getIsDeleted()) {
				$this->auditoria_detalle=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(auditoria_detalle $auditoria_detalle,Connexion $connexion)  {
		$auditoria_detalleLogic = new  auditoria_detalle_logic();		  		  
        try {		
			$auditoria_detalleLogic->setConnexion($connexion);			
			$auditoria_detalleLogic->setauditoria_detalle($auditoria_detalle);			
			$auditoria_detalleLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*auditoria_detalle_logic_add::checkauditoria_detalleToSaves($this->auditoria_detalles,$this->datosCliente,$this->connexion);*/	        	
			//$this->auditoria_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->auditoria_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->auditoria_detalles as $auditoria_detalleLocal) {				
								
				//auditoria_detalle_logic_add::updateauditoria_detalleToSave($auditoria_detalleLocal);	        	
				auditoria_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$auditoria_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				auditoria_detalle_data::save($auditoria_detalleLocal, $this->connexion);				
			}
			
			/*auditoria_detalle_logic_add::checkauditoria_detalleToSavesAfter($this->auditoria_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->auditoria_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->auditoria_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_detalle_util::refrescarFKDescripciones($this->auditoria_detalles);
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
			/*auditoria_detalle_logic_add::checkauditoria_detalleToSaves($this->auditoria_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->auditoria_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->auditoria_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->auditoria_detalles as $auditoria_detalleLocal) {				
								
				//auditoria_detalle_logic_add::updateauditoria_detalleToSave($auditoria_detalleLocal);	        	
				auditoria_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$auditoria_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				auditoria_detalle_data::save($auditoria_detalleLocal, $this->connexion);				
			}			
			
			/*auditoria_detalle_logic_add::checkauditoria_detalleToSavesAfter($this->auditoria_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->auditoria_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->auditoria_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				auditoria_detalle_util::refrescarFKDescripciones($this->auditoria_detalles);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $auditoria_detalles,Connexion $connexion)  {
		$auditoria_detalleLogic = new  auditoria_detalle_logic();
		  		  
        try {		
			$auditoria_detalleLogic->setConnexion($connexion);			
			$auditoria_detalleLogic->setauditoria_detalles($auditoria_detalles);			
			$auditoria_detalleLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$auditoria_detallesAux=array();
		
		foreach($this->auditoria_detalles as $auditoria_detalle) {
			if($auditoria_detalle->getIsDeleted()==false) {
				$auditoria_detallesAux[]=$auditoria_detalle;
			}
		}
		
		$this->auditoria_detalles=$auditoria_detallesAux;
	}
	
	public function updateToGetsAuxiliar(array &$auditoria_detalles) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->auditoria_detalles as $auditoria_detalle) {
				
				$auditoria_detalle->setid_auditoria_Descripcion(auditoria_detalle_util::getauditoriaDescripcion($auditoria_detalle->getauditoria()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$auditoria_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$auditoria_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$auditoria_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$auditoria_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$auditoria_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$auditoria_detalleForeignKey=new auditoria_detalle_param_return();//auditoria_detalleForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_auditoria',$strRecargarFkTipos,',')) {
				$this->cargarCombosauditoriasFK($this->connexion,$strRecargarFkQuery,$auditoria_detalleForeignKey,$auditoria_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_auditoria',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosauditoriasFK($this->connexion,' where id=-1 ',$auditoria_detalleForeignKey,$auditoria_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $auditoria_detalleForeignKey;
			
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
	
	
	public function cargarCombosauditoriasFK($connexion=null,$strRecargarFkQuery='',$auditoria_detalleForeignKey,$auditoria_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$auditoriaLogic= new auditoria_logic();
		$pagination= new Pagination();
		$auditoria_detalleForeignKey->auditoriasFK=array();

		$auditoriaLogic->setConnexion($connexion);
		$auditoriaLogic->getauditoriaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($auditoria_detalle_session==null) {
			$auditoria_detalle_session=new auditoria_detalle_session();
		}
		
		if($auditoria_detalle_session->bitBusquedaDesdeFKSesionauditoria!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=auditoria_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalauditoria=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalauditoria=Funciones::GetFinalQueryAppend($finalQueryGlobalauditoria, '');
				$finalQueryGlobalauditoria.=auditoria_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalauditoria.$strRecargarFkQuery;		

				$auditoriaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($auditoriaLogic->getauditorias() as $auditoriaLocal ) {
				if($auditoria_detalleForeignKey->idauditoriaDefaultFK==0) {
					$auditoria_detalleForeignKey->idauditoriaDefaultFK=$auditoriaLocal->getId();
				}

				$auditoria_detalleForeignKey->auditoriasFK[$auditoriaLocal->getId()]=auditoria_detalle_util::getauditoriaDescripcion($auditoriaLocal);
			}

		} else {

			if($auditoria_detalle_session->bigidauditoriaActual!=null && $auditoria_detalle_session->bigidauditoriaActual > 0) {
				$auditoriaLogic->getEntity($auditoria_detalle_session->bigidauditoriaActual);//WithConnection

				$auditoria_detalleForeignKey->auditoriasFK[$auditoriaLogic->getauditoria()->getId()]=auditoria_detalle_util::getauditoriaDescripcion($auditoriaLogic->getauditoria());
				$auditoria_detalleForeignKey->idauditoriaDefaultFK=$auditoriaLogic->getauditoria()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($auditoria_detalle) {
		$this->saveRelacionesBase($auditoria_detalle,true);
	}

	public function saveRelaciones($auditoria_detalle) {
		$this->saveRelacionesBase($auditoria_detalle,false);
	}

	public function saveRelacionesBase($auditoria_detalle,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setauditoria_detalle($auditoria_detalle);

			if(true) {

				//auditoria_detalle_logic_add::updateRelacionesToSave($auditoria_detalle,$this);

				if(($this->auditoria_detalle->getIsNew() || $this->auditoria_detalle->getIsChanged()) && !$this->auditoria_detalle->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->auditoria_detalle->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//auditoria_detalle_logic_add::updateRelacionesToSaveAfter($auditoria_detalle,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $auditoria_detalles,auditoria_detalle_param_return $auditoria_detalleParameterGeneral) : auditoria_detalle_param_return {
		$auditoria_detalleReturnGeneral=new auditoria_detalle_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $auditoria_detalleReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $auditoria_detalles,auditoria_detalle_param_return $auditoria_detalleParameterGeneral) : auditoria_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$auditoria_detalleReturnGeneral=new auditoria_detalle_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $auditoria_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $auditoria_detalles,auditoria_detalle $auditoria_detalle,auditoria_detalle_param_return $auditoria_detalleParameterGeneral,bool $isEsNuevoauditoria_detalle,array $clases) : auditoria_detalle_param_return {
		 try {	
			$auditoria_detalleReturnGeneral=new auditoria_detalle_param_return();
	
			$auditoria_detalleReturnGeneral->setauditoria_detalle($auditoria_detalle);
			$auditoria_detalleReturnGeneral->setauditoria_detalles($auditoria_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$auditoria_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $auditoria_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $auditoria_detalles,auditoria_detalle $auditoria_detalle,auditoria_detalle_param_return $auditoria_detalleParameterGeneral,bool $isEsNuevoauditoria_detalle,array $clases) : auditoria_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$auditoria_detalleReturnGeneral=new auditoria_detalle_param_return();
	
			$auditoria_detalleReturnGeneral->setauditoria_detalle($auditoria_detalle);
			$auditoria_detalleReturnGeneral->setauditoria_detalles($auditoria_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$auditoria_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $auditoria_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $auditoria_detalles,auditoria_detalle $auditoria_detalle,auditoria_detalle_param_return $auditoria_detalleParameterGeneral,bool $isEsNuevoauditoria_detalle,array $clases) : auditoria_detalle_param_return {
		 try {	
			$auditoria_detalleReturnGeneral=new auditoria_detalle_param_return();
	
			$auditoria_detalleReturnGeneral->setauditoria_detalle($auditoria_detalle);
			$auditoria_detalleReturnGeneral->setauditoria_detalles($auditoria_detalles);
			
			
			
			return $auditoria_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $auditoria_detalles,auditoria_detalle $auditoria_detalle,auditoria_detalle_param_return $auditoria_detalleParameterGeneral,bool $isEsNuevoauditoria_detalle,array $clases) : auditoria_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$auditoria_detalleReturnGeneral=new auditoria_detalle_param_return();
	
			$auditoria_detalleReturnGeneral->setauditoria_detalle($auditoria_detalle);
			$auditoria_detalleReturnGeneral->setauditoria_detalles($auditoria_detalles);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $auditoria_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,auditoria_detalle $auditoria_detalle,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,auditoria_detalle $auditoria_detalle,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		auditoria_detalle_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(auditoria_detalle $auditoria_detalle,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//auditoria_detalle_logic_add::updateauditoria_detalleToGet($this->auditoria_detalle);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$auditoria_detalle->setauditoria($this->auditoria_detalleDataAccess->getauditoria($this->connexion,$auditoria_detalle));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==auditoria::$class.'') {
				$auditoria_detalle->setauditoria($this->auditoria_detalleDataAccess->getauditoria($this->connexion,$auditoria_detalle));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==auditoria::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$auditoria_detalle->setauditoria($this->auditoria_detalleDataAccess->getauditoria($this->connexion,$auditoria_detalle));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$auditoria_detalle->setauditoria($this->auditoria_detalleDataAccess->getauditoria($this->connexion,$auditoria_detalle));
		$auditoriaLogic= new auditoria_logic($this->connexion);
		$auditoriaLogic->deepLoad($auditoria_detalle->getauditoria(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==auditoria::$class.'') {
				$auditoria_detalle->setauditoria($this->auditoria_detalleDataAccess->getauditoria($this->connexion,$auditoria_detalle));
				$auditoriaLogic= new auditoria_logic($this->connexion);
				$auditoriaLogic->deepLoad($auditoria_detalle->getauditoria(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==auditoria::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$auditoria_detalle->setauditoria($this->auditoria_detalleDataAccess->getauditoria($this->connexion,$auditoria_detalle));
			$auditoriaLogic= new auditoria_logic($this->connexion);
			$auditoriaLogic->deepLoad($auditoria_detalle->getauditoria(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(auditoria_detalle $auditoria_detalle,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//auditoria_detalle_logic_add::updateauditoria_detalleToSave($this->auditoria_detalle);			
			
			if(!$paraDeleteCascade) {				
				auditoria_detalle_data::save($auditoria_detalle, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		auditoria_data::save($auditoria_detalle->getauditoria(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==auditoria::$class.'') {
				auditoria_data::save($auditoria_detalle->getauditoria(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==auditoria::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			auditoria_data::save($auditoria_detalle->getauditoria(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		auditoria_data::save($auditoria_detalle->getauditoria(),$this->connexion);
		$auditoriaLogic= new auditoria_logic($this->connexion);
		$auditoriaLogic->deepSave($auditoria_detalle->getauditoria(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==auditoria::$class.'') {
				auditoria_data::save($auditoria_detalle->getauditoria(),$this->connexion);
				$auditoriaLogic= new auditoria_logic($this->connexion);
				$auditoriaLogic->deepSave($auditoria_detalle->getauditoria(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==auditoria::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			auditoria_data::save($auditoria_detalle->getauditoria(),$this->connexion);
			$auditoriaLogic= new auditoria_logic($this->connexion);
			$auditoriaLogic->deepSave($auditoria_detalle->getauditoria(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				auditoria_detalle_data::save($auditoria_detalle, $this->connexion);
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
			
			$this->deepLoad($this->auditoria_detalle,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->auditoria_detalles as $auditoria_detalle) {
				$this->deepLoad($auditoria_detalle,$isDeep,$deepLoadType,$clases);
								
				auditoria_detalle_util::refrescarFKDescripciones($this->auditoria_detalles);
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
			
			foreach($this->auditoria_detalles as $auditoria_detalle) {
				$this->deepLoad($auditoria_detalle,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->auditoria_detalle,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->auditoria_detalles as $auditoria_detalle) {
				$this->deepSave($auditoria_detalle,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->auditoria_detalles as $auditoria_detalle) {
				$this->deepSave($auditoria_detalle,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(auditoria::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==auditoria::$class) {
						$classes[]=new Classe(auditoria::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==auditoria::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(auditoria::$class);
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
	
	
	
	
	
	
	
	public function getauditoria_detalle() : ?auditoria_detalle {	
		/*
		auditoria_detalle_logic_add::checkauditoria_detalleToGet($this->auditoria_detalle,$this->datosCliente);
		auditoria_detalle_logic_add::updateauditoria_detalleToGet($this->auditoria_detalle);
		*/
			
		return $this->auditoria_detalle;
	}
		
	public function setauditoria_detalle(auditoria_detalle $newauditoria_detalle) {
		$this->auditoria_detalle = $newauditoria_detalle;
	}
	
	public function getauditoria_detalles() : array {		
		/*
		auditoria_detalle_logic_add::checkauditoria_detalleToGets($this->auditoria_detalles,$this->datosCliente);
		
		foreach ($this->auditoria_detalles as $auditoria_detalleLocal ) {
			auditoria_detalle_logic_add::updateauditoria_detalleToGet($auditoria_detalleLocal);
		}
		*/
		
		return $this->auditoria_detalles;
	}
	
	public function setauditoria_detalles(array $newauditoria_detalles) {
		$this->auditoria_detalles = $newauditoria_detalles;
	}
	
	public function getauditoria_detalleDataAccess() : auditoria_detalle_data {
		return $this->auditoria_detalleDataAccess;
	}
	
	public function setauditoria_detalleDataAccess(auditoria_detalle_data $newauditoria_detalleDataAccess) {
		$this->auditoria_detalleDataAccess = $newauditoria_detalleDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        auditoria_detalle_carga::$CONTROLLER;;        
		
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
