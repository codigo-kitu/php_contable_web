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

namespace com\bydan\contabilidad\general\log_actividad\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\general\log_actividad\util\log_actividad_carga;
use com\bydan\contabilidad\general\log_actividad\util\log_actividad_param_return;


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

use com\bydan\contabilidad\general\log_actividad\util\log_actividad_util;
use com\bydan\contabilidad\general\log_actividad\business\entity\log_actividad;
use com\bydan\contabilidad\general\log_actividad\business\data\log_actividad_data;

//FK


//REL


//REL DETALLES




class log_actividad_logic  extends GeneralEntityLogic implements log_actividad_logicI {	
	/*GENERAL*/
	public log_actividad_data $log_actividadDataAccess;
	//public ?log_actividad_logic_add $log_actividadLogicAdditional=null;
	public ?log_actividad $log_actividad;
	public array $log_actividads;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->log_actividadDataAccess = new log_actividad_data();			
			$this->log_actividads = array();
			$this->log_actividad = new log_actividad();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->log_actividadLogicAdditional = new log_actividad_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->log_actividadLogicAdditional==null) {
		//	$this->log_actividadLogicAdditional=new log_actividad_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->log_actividadDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->log_actividadDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->log_actividadDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->log_actividadDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->log_actividads = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->log_actividads=$this->log_actividadDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				log_actividad_util::refrescarFKDescripciones($this->log_actividads);
			}
			
			//log_actividad_logic_add::checklog_actividadToGets($this->log_actividads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->log_actividads);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->log_actividads = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->log_actividads=$this->log_actividadDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				log_actividad_util::refrescarFKDescripciones($this->log_actividads);
			}
			
			//log_actividad_logic_add::checklog_actividadToGets($this->log_actividads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->log_actividads);
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
		$this->log_actividad = new log_actividad();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->log_actividad=$this->log_actividadDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->log_actividad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				log_actividad_util::refrescarFKDescripcion($this->log_actividad);
			}
						
			//log_actividad_logic_add::checklog_actividadToGet($this->log_actividad,$this->datosCliente);
			//log_actividad_logic_add::updatelog_actividadToGet($this->log_actividad);
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
		$this->log_actividad = new  log_actividad();
		  		  
        try {		
			$this->log_actividad=$this->log_actividadDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->log_actividad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				log_actividad_util::refrescarFKDescripcion($this->log_actividad);
			}
			
			//log_actividad_logic_add::checklog_actividadToGet($this->log_actividad,$this->datosCliente);
			//log_actividad_logic_add::updatelog_actividadToGet($this->log_actividad);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?log_actividad {
		$log_actividadLogic = new  log_actividad_logic();
		  		  
        try {		
			$log_actividadLogic->setConnexion($connexion);			
			$log_actividadLogic->getEntity($id);			
			return $log_actividadLogic->getlog_actividad();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->log_actividad = new  log_actividad();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->log_actividad=$this->log_actividadDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->log_actividad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				log_actividad_util::refrescarFKDescripcion($this->log_actividad);
			}
			
			//log_actividad_logic_add::checklog_actividadToGet($this->log_actividad,$this->datosCliente);
			//log_actividad_logic_add::updatelog_actividadToGet($this->log_actividad);
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
		$this->log_actividad = new  log_actividad();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->log_actividad=$this->log_actividadDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->log_actividad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				log_actividad_util::refrescarFKDescripcion($this->log_actividad);
			}
			
			//log_actividad_logic_add::checklog_actividadToGet($this->log_actividad,$this->datosCliente);
			//log_actividad_logic_add::updatelog_actividadToGet($this->log_actividad);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?log_actividad {
		$log_actividadLogic = new  log_actividad_logic();
		  		  
        try {		
			$log_actividadLogic->setConnexion($connexion);			
			$log_actividadLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $log_actividadLogic->getlog_actividad();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->log_actividads = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->log_actividads=$this->log_actividadDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				log_actividad_util::refrescarFKDescripciones($this->log_actividads);
			}
			
			//log_actividad_logic_add::checklog_actividadToGets($this->log_actividads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->log_actividads);			
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
		$this->log_actividads = array();
		  		  
        try {			
			$this->log_actividads=$this->log_actividadDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				log_actividad_util::refrescarFKDescripciones($this->log_actividads);
			}
			
			//log_actividad_logic_add::checklog_actividadToGets($this->log_actividads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->log_actividads);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->log_actividads = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->log_actividads=$this->log_actividadDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				log_actividad_util::refrescarFKDescripciones($this->log_actividads);
			}
			
			//log_actividad_logic_add::checklog_actividadToGets($this->log_actividads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->log_actividads);
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
		$this->log_actividads = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->log_actividads=$this->log_actividadDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				log_actividad_util::refrescarFKDescripciones($this->log_actividads);
			}
			
			//log_actividad_logic_add::checklog_actividadToGets($this->log_actividads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->log_actividads);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$log_actividadLogic = new  log_actividad_logic();
		  		  
        try {		
			$log_actividadLogic->setConnexion($connexion);			
			$log_actividadLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $log_actividadLogic->getlog_actividads();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->log_actividads = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->log_actividads=$this->log_actividadDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				log_actividad_util::refrescarFKDescripciones($this->log_actividads);
			}
			
			//log_actividad_logic_add::checklog_actividadToGets($this->log_actividads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->log_actividads);
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
		$this->log_actividads = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->log_actividads=$this->log_actividadDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				log_actividad_util::refrescarFKDescripciones($this->log_actividads);
			}
			
			//log_actividad_logic_add::checklog_actividadToGets($this->log_actividads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->log_actividads);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->log_actividads = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->log_actividads=$this->log_actividadDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				log_actividad_util::refrescarFKDescripciones($this->log_actividads);
			}
			
			//log_actividad_logic_add::checklog_actividadToGets($this->log_actividads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->log_actividads);
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
		$this->log_actividads = array();
		  		  
        try {			
			$this->log_actividads=$this->log_actividadDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				log_actividad_util::refrescarFKDescripciones($this->log_actividads);
			}	
			
			//log_actividad_logic_add::checklog_actividadToGets($this->log_actividads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->log_actividads);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->log_actividads = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->log_actividads=$this->log_actividadDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				log_actividad_util::refrescarFKDescripciones($this->log_actividads);
			}
			
			//log_actividad_logic_add::checklog_actividadToGets($this->log_actividads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->log_actividads);
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
		$this->log_actividads = array();
		  		  
        try {		
			$this->log_actividads=$this->log_actividadDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				log_actividad_util::refrescarFKDescripciones($this->log_actividads);
			}
			
			//log_actividad_logic_add::checklog_actividadToGets($this->log_actividads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->log_actividads);

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
						
			//log_actividad_logic_add::checklog_actividadToSave($this->log_actividad,$this->datosCliente,$this->connexion);	       
			//log_actividad_logic_add::updatelog_actividadToSave($this->log_actividad);			
			log_actividad_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->log_actividad,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->log_actividadLogicAdditional->checkGeneralEntityToSave($this,$this->log_actividad,$this->datosCliente,$this->connexion);
			
			
			log_actividad_data::save($this->log_actividad, $this->connexion);	    	       	 				
			//log_actividad_logic_add::checklog_actividadToSaveAfter($this->log_actividad,$this->datosCliente,$this->connexion);			
			//$this->log_actividadLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->log_actividad,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->log_actividad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->log_actividad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				log_actividad_util::refrescarFKDescripcion($this->log_actividad);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->log_actividad->getIsDeleted()) {
				$this->log_actividad=null;
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
						
			/*log_actividad_logic_add::checklog_actividadToSave($this->log_actividad,$this->datosCliente,$this->connexion);*/	        
			//log_actividad_logic_add::updatelog_actividadToSave($this->log_actividad);			
			//$this->log_actividadLogicAdditional->checkGeneralEntityToSave($this,$this->log_actividad,$this->datosCliente,$this->connexion);			
			log_actividad_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->log_actividad,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			log_actividad_data::save($this->log_actividad, $this->connexion);	    	       	 						
			/*log_actividad_logic_add::checklog_actividadToSaveAfter($this->log_actividad,$this->datosCliente,$this->connexion);*/			
			//$this->log_actividadLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->log_actividad,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->log_actividad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->log_actividad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				log_actividad_util::refrescarFKDescripcion($this->log_actividad);				
			}
			
			if($this->log_actividad->getIsDeleted()) {
				$this->log_actividad=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(log_actividad $log_actividad,Connexion $connexion)  {
		$log_actividadLogic = new  log_actividad_logic();		  		  
        try {		
			$log_actividadLogic->setConnexion($connexion);			
			$log_actividadLogic->setlog_actividad($log_actividad);			
			$log_actividadLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*log_actividad_logic_add::checklog_actividadToSaves($this->log_actividads,$this->datosCliente,$this->connexion);*/	        	
			//$this->log_actividadLogicAdditional->checkGeneralEntitiesToSaves($this,$this->log_actividads,$this->datosCliente,$this->connexion);
			
	   		foreach($this->log_actividads as $log_actividadLocal) {				
								
				//log_actividad_logic_add::updatelog_actividadToSave($log_actividadLocal);	        	
				log_actividad_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$log_actividadLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				log_actividad_data::save($log_actividadLocal, $this->connexion);				
			}
			
			/*log_actividad_logic_add::checklog_actividadToSavesAfter($this->log_actividads,$this->datosCliente,$this->connexion);*/			
			//$this->log_actividadLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->log_actividads,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				log_actividad_util::refrescarFKDescripciones($this->log_actividads);
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
			/*log_actividad_logic_add::checklog_actividadToSaves($this->log_actividads,$this->datosCliente,$this->connexion);*/			
			//$this->log_actividadLogicAdditional->checkGeneralEntitiesToSaves($this,$this->log_actividads,$this->datosCliente,$this->connexion);
			
	   		foreach($this->log_actividads as $log_actividadLocal) {				
								
				//log_actividad_logic_add::updatelog_actividadToSave($log_actividadLocal);	        	
				log_actividad_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$log_actividadLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				log_actividad_data::save($log_actividadLocal, $this->connexion);				
			}			
			
			/*log_actividad_logic_add::checklog_actividadToSavesAfter($this->log_actividads,$this->datosCliente,$this->connexion);*/			
			//$this->log_actividadLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->log_actividads,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				log_actividad_util::refrescarFKDescripciones($this->log_actividads);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $log_actividads,Connexion $connexion)  {
		$log_actividadLogic = new  log_actividad_logic();
		  		  
        try {		
			$log_actividadLogic->setConnexion($connexion);			
			$log_actividadLogic->setlog_actividads($log_actividads);			
			$log_actividadLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$log_actividadsAux=array();
		
		foreach($this->log_actividads as $log_actividad) {
			if($log_actividad->getIsDeleted()==false) {
				$log_actividadsAux[]=$log_actividad;
			}
		}
		
		$this->log_actividads=$log_actividadsAux;
	}
	
	public function updateToGetsAuxiliar(array &$log_actividads) {
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
	
	
	
	public function saveRelacionesWithConnection($log_actividad) {
		$this->saveRelacionesBase($log_actividad,true);
	}

	public function saveRelaciones($log_actividad) {
		$this->saveRelacionesBase($log_actividad,false);
	}

	public function saveRelacionesBase($log_actividad,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setlog_actividad($log_actividad);

			if(true) {

				//log_actividad_logic_add::updateRelacionesToSave($log_actividad,$this);

				if(($this->log_actividad->getIsNew() || $this->log_actividad->getIsChanged()) && !$this->log_actividad->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->log_actividad->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//log_actividad_logic_add::updateRelacionesToSaveAfter($log_actividad,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $log_actividads,log_actividad_param_return $log_actividadParameterGeneral) : log_actividad_param_return {
		$log_actividadReturnGeneral=new log_actividad_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $log_actividadReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $log_actividads,log_actividad_param_return $log_actividadParameterGeneral) : log_actividad_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$log_actividadReturnGeneral=new log_actividad_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $log_actividadReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $log_actividads,log_actividad $log_actividad,log_actividad_param_return $log_actividadParameterGeneral,bool $isEsNuevolog_actividad,array $clases) : log_actividad_param_return {
		 try {	
			$log_actividadReturnGeneral=new log_actividad_param_return();
	
			$log_actividadReturnGeneral->setlog_actividad($log_actividad);
			$log_actividadReturnGeneral->setlog_actividads($log_actividads);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$log_actividadReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $log_actividadReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $log_actividads,log_actividad $log_actividad,log_actividad_param_return $log_actividadParameterGeneral,bool $isEsNuevolog_actividad,array $clases) : log_actividad_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$log_actividadReturnGeneral=new log_actividad_param_return();
	
			$log_actividadReturnGeneral->setlog_actividad($log_actividad);
			$log_actividadReturnGeneral->setlog_actividads($log_actividads);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$log_actividadReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $log_actividadReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $log_actividads,log_actividad $log_actividad,log_actividad_param_return $log_actividadParameterGeneral,bool $isEsNuevolog_actividad,array $clases) : log_actividad_param_return {
		 try {	
			$log_actividadReturnGeneral=new log_actividad_param_return();
	
			$log_actividadReturnGeneral->setlog_actividad($log_actividad);
			$log_actividadReturnGeneral->setlog_actividads($log_actividads);
			
			
			
			return $log_actividadReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $log_actividads,log_actividad $log_actividad,log_actividad_param_return $log_actividadParameterGeneral,bool $isEsNuevolog_actividad,array $clases) : log_actividad_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$log_actividadReturnGeneral=new log_actividad_param_return();
	
			$log_actividadReturnGeneral->setlog_actividad($log_actividad);
			$log_actividadReturnGeneral->setlog_actividads($log_actividads);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $log_actividadReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,log_actividad $log_actividad,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,log_actividad $log_actividad,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	
	
	public function deepLoad(log_actividad $log_actividad,bool $isDeep,string $deepLoadType,array $clases) {
		
		
		try {
			
			
			
			//log_actividad_logic_add::updatelog_actividadToGet($this->log_actividad);
			
			
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		
	}
	
	public function deepSave(log_actividad $log_actividad,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		
		
		try {
			
			
			//log_actividad_logic_add::updatelog_actividadToSave($this->log_actividad);			
			
			if(!$paraDeleteCascade) {				
				log_actividad_data::save($log_actividad, $this->connexion);
			}
			
			
			
			if($paraDeleteCascade) {				
				log_actividad_data::save($log_actividad, $this->connexion);
			}
			
		}catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}	
		
		
	}
		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			$this->deepLoad($this->log_actividad,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->log_actividads as $log_actividad) {
				$this->deepLoad($log_actividad,$isDeep,$deepLoadType,$clases);
								
				log_actividad_util::refrescarFKDescripciones($this->log_actividads);
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
			
			foreach($this->log_actividads as $log_actividad) {
				$this->deepLoad($log_actividad,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->log_actividad,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->log_actividads as $log_actividad) {
				$this->deepSave($log_actividad,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->log_actividads as $log_actividad) {
				$this->deepSave($log_actividad,$isDeep,$deepLoadType,$clases,false);
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
	
	
	
	
	
	
	
	public function getlog_actividad() : ?log_actividad {	
		/*
		log_actividad_logic_add::checklog_actividadToGet($this->log_actividad,$this->datosCliente);
		log_actividad_logic_add::updatelog_actividadToGet($this->log_actividad);
		*/
			
		return $this->log_actividad;
	}
		
	public function setlog_actividad(log_actividad $newlog_actividad) {
		$this->log_actividad = $newlog_actividad;
	}
	
	public function getlog_actividads() : array {		
		/*
		log_actividad_logic_add::checklog_actividadToGets($this->log_actividads,$this->datosCliente);
		
		foreach ($this->log_actividads as $log_actividadLocal ) {
			log_actividad_logic_add::updatelog_actividadToGet($log_actividadLocal);
		}
		*/
		
		return $this->log_actividads;
	}
	
	public function setlog_actividads(array $newlog_actividads) {
		$this->log_actividads = $newlog_actividads;
	}
	
	public function getlog_actividadDataAccess() : log_actividad_data {
		return $this->log_actividadDataAccess;
	}
	
	public function setlog_actividadDataAccess(log_actividad_data $newlog_actividadDataAccess) {
		$this->log_actividadDataAccess = $newlog_actividadDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        log_actividad_carga::$CONTROLLER;;        
		
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
