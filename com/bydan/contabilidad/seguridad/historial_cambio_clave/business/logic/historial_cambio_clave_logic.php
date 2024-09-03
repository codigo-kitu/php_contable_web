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

namespace com\bydan\contabilidad\seguridad\historial_cambio_clave\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\historial_cambio_clave\util\historial_cambio_clave_carga;
use com\bydan\contabilidad\seguridad\historial_cambio_clave\util\historial_cambio_clave_param_return;

use com\bydan\contabilidad\seguridad\historial_cambio_clave\presentation\session\historial_cambio_clave_session;

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

use com\bydan\contabilidad\seguridad\historial_cambio_clave\util\historial_cambio_clave_util;
use com\bydan\contabilidad\seguridad\historial_cambio_clave\business\entity\historial_cambio_clave;
use com\bydan\contabilidad\seguridad\historial_cambio_clave\business\data\historial_cambio_clave_data;

//FK


use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

//REL


//REL DETALLES




class historial_cambio_clave_logic  extends GeneralEntityLogic implements historial_cambio_clave_logicI {	
	/*GENERAL*/
	public historial_cambio_clave_data $historial_cambio_claveDataAccess;
	//public ?historial_cambio_clave_logic_add $historial_cambio_claveLogicAdditional=null;
	public ?historial_cambio_clave $historial_cambio_clave;
	public array $historial_cambio_claves;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->historial_cambio_claveDataAccess = new historial_cambio_clave_data();			
			$this->historial_cambio_claves = array();
			$this->historial_cambio_clave = new historial_cambio_clave();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->historial_cambio_claveLogicAdditional = new historial_cambio_clave_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->historial_cambio_claveLogicAdditional==null) {
		//	$this->historial_cambio_claveLogicAdditional=new historial_cambio_clave_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->historial_cambio_claveDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->historial_cambio_claveDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->historial_cambio_claveDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->historial_cambio_claveDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->historial_cambio_claves = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->historial_cambio_claves=$this->historial_cambio_claveDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				historial_cambio_clave_util::refrescarFKDescripciones($this->historial_cambio_claves);
			}
			
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGets($this->historial_cambio_claves,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->historial_cambio_claves);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->historial_cambio_claves = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->historial_cambio_claves=$this->historial_cambio_claveDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				historial_cambio_clave_util::refrescarFKDescripciones($this->historial_cambio_claves);
			}
			
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGets($this->historial_cambio_claves,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->historial_cambio_claves);
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
		$this->historial_cambio_clave = new historial_cambio_clave();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->historial_cambio_clave=$this->historial_cambio_claveDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->historial_cambio_clave,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				historial_cambio_clave_util::refrescarFKDescripcion($this->historial_cambio_clave);
			}
						
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGet($this->historial_cambio_clave,$this->datosCliente);
			//historial_cambio_clave_logic_add::updatehistorial_cambio_claveToGet($this->historial_cambio_clave);
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
		$this->historial_cambio_clave = new  historial_cambio_clave();
		  		  
        try {		
			$this->historial_cambio_clave=$this->historial_cambio_claveDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->historial_cambio_clave,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				historial_cambio_clave_util::refrescarFKDescripcion($this->historial_cambio_clave);
			}
			
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGet($this->historial_cambio_clave,$this->datosCliente);
			//historial_cambio_clave_logic_add::updatehistorial_cambio_claveToGet($this->historial_cambio_clave);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?historial_cambio_clave {
		$historial_cambio_claveLogic = new  historial_cambio_clave_logic();
		  		  
        try {		
			$historial_cambio_claveLogic->setConnexion($connexion);			
			$historial_cambio_claveLogic->getEntity($id);			
			return $historial_cambio_claveLogic->gethistorial_cambio_clave();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->historial_cambio_clave = new  historial_cambio_clave();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->historial_cambio_clave=$this->historial_cambio_claveDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->historial_cambio_clave,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				historial_cambio_clave_util::refrescarFKDescripcion($this->historial_cambio_clave);
			}
			
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGet($this->historial_cambio_clave,$this->datosCliente);
			//historial_cambio_clave_logic_add::updatehistorial_cambio_claveToGet($this->historial_cambio_clave);
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
		$this->historial_cambio_clave = new  historial_cambio_clave();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->historial_cambio_clave=$this->historial_cambio_claveDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->historial_cambio_clave,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				historial_cambio_clave_util::refrescarFKDescripcion($this->historial_cambio_clave);
			}
			
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGet($this->historial_cambio_clave,$this->datosCliente);
			//historial_cambio_clave_logic_add::updatehistorial_cambio_claveToGet($this->historial_cambio_clave);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?historial_cambio_clave {
		$historial_cambio_claveLogic = new  historial_cambio_clave_logic();
		  		  
        try {		
			$historial_cambio_claveLogic->setConnexion($connexion);			
			$historial_cambio_claveLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $historial_cambio_claveLogic->gethistorial_cambio_clave();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->historial_cambio_claves = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->historial_cambio_claves=$this->historial_cambio_claveDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				historial_cambio_clave_util::refrescarFKDescripciones($this->historial_cambio_claves);
			}
			
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGets($this->historial_cambio_claves,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->historial_cambio_claves);			
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
		$this->historial_cambio_claves = array();
		  		  
        try {			
			$this->historial_cambio_claves=$this->historial_cambio_claveDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				historial_cambio_clave_util::refrescarFKDescripciones($this->historial_cambio_claves);
			}
			
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGets($this->historial_cambio_claves,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->historial_cambio_claves);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->historial_cambio_claves = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->historial_cambio_claves=$this->historial_cambio_claveDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				historial_cambio_clave_util::refrescarFKDescripciones($this->historial_cambio_claves);
			}
			
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGets($this->historial_cambio_claves,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->historial_cambio_claves);
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
		$this->historial_cambio_claves = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->historial_cambio_claves=$this->historial_cambio_claveDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				historial_cambio_clave_util::refrescarFKDescripciones($this->historial_cambio_claves);
			}
			
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGets($this->historial_cambio_claves,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->historial_cambio_claves);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$historial_cambio_claveLogic = new  historial_cambio_clave_logic();
		  		  
        try {		
			$historial_cambio_claveLogic->setConnexion($connexion);			
			$historial_cambio_claveLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $historial_cambio_claveLogic->gethistorial_cambio_claves();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->historial_cambio_claves = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->historial_cambio_claves=$this->historial_cambio_claveDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				historial_cambio_clave_util::refrescarFKDescripciones($this->historial_cambio_claves);
			}
			
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGets($this->historial_cambio_claves,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->historial_cambio_claves);
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
		$this->historial_cambio_claves = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->historial_cambio_claves=$this->historial_cambio_claveDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				historial_cambio_clave_util::refrescarFKDescripciones($this->historial_cambio_claves);
			}
			
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGets($this->historial_cambio_claves,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->historial_cambio_claves);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->historial_cambio_claves = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->historial_cambio_claves=$this->historial_cambio_claveDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				historial_cambio_clave_util::refrescarFKDescripciones($this->historial_cambio_claves);
			}
			
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGets($this->historial_cambio_claves,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->historial_cambio_claves);
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
		$this->historial_cambio_claves = array();
		  		  
        try {			
			$this->historial_cambio_claves=$this->historial_cambio_claveDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				historial_cambio_clave_util::refrescarFKDescripciones($this->historial_cambio_claves);
			}	
			
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGets($this->historial_cambio_claves,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->historial_cambio_claves);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->historial_cambio_claves = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->historial_cambio_claves=$this->historial_cambio_claveDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				historial_cambio_clave_util::refrescarFKDescripciones($this->historial_cambio_claves);
			}
			
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGets($this->historial_cambio_claves,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->historial_cambio_claves);
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
		$this->historial_cambio_claves = array();
		  		  
        try {		
			$this->historial_cambio_claves=$this->historial_cambio_claveDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				historial_cambio_clave_util::refrescarFKDescripciones($this->historial_cambio_claves);
			}
			
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGets($this->historial_cambio_claves,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->historial_cambio_claves);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsBusquedaPorIdUsuarioPorFechaHoraWithConnection(string $strFinalQuery,Pagination $pagination,int $id_usuario,string $fecha_hora) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_usuario= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,historial_cambio_clave_util::$ID_USUARIO,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$parameterSelectionGeneralfecha_hora= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_hora->setParameterSelectionGeneralEqual(ParameterType::$DATE,'\''.$fecha_hora.'\'',historial_cambio_clave_util::$FECHA_HORA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_hora);

			$this->historial_cambio_claves=$this->historial_cambio_claveDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				historial_cambio_clave_util::refrescarFKDescripciones($this->historial_cambio_claves);
			}
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGets($this->historial_cambio_claves,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->historial_cambio_claves);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorIdUsuarioPorFechaHora(string $strFinalQuery,Pagination $pagination,int $id_usuario,string $fecha_hora) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_usuario= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,historial_cambio_clave_util::$ID_USUARIO,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$parameterSelectionGeneralfecha_hora= new ParameterSelectionGeneral();
			$parameterSelectionGeneralfecha_hora->setParameterSelectionGeneralEqual(ParameterType::$DATE,'\''.$fecha_hora.'\'',historial_cambio_clave_util::$FECHA_HORA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralfecha_hora);

			$this->historial_cambio_claves=$this->historial_cambio_claveDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				historial_cambio_clave_util::refrescarFKDescripciones($this->historial_cambio_claves);
			}
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGets($this->historial_cambio_claves,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->historial_cambio_claves);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdusuarioWithConnection(string $strFinalQuery,Pagination $pagination,int $id_usuario) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_usuario= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,historial_cambio_clave_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->historial_cambio_claves=$this->historial_cambio_claveDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				historial_cambio_clave_util::refrescarFKDescripciones($this->historial_cambio_claves);
			}
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGets($this->historial_cambio_claves,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->historial_cambio_claves);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idusuario(string $strFinalQuery,Pagination $pagination,int $id_usuario) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_usuario= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,historial_cambio_clave_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->historial_cambio_claves=$this->historial_cambio_claveDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				historial_cambio_clave_util::refrescarFKDescripciones($this->historial_cambio_claves);
			}
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGets($this->historial_cambio_claves,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->historial_cambio_claves);
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
						
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToSave($this->historial_cambio_clave,$this->datosCliente,$this->connexion);	       
			//historial_cambio_clave_logic_add::updatehistorial_cambio_claveToSave($this->historial_cambio_clave);			
			historial_cambio_clave_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->historial_cambio_clave,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->historial_cambio_claveLogicAdditional->checkGeneralEntityToSave($this,$this->historial_cambio_clave,$this->datosCliente,$this->connexion);
			
			
			historial_cambio_clave_data::save($this->historial_cambio_clave, $this->connexion);	    	       	 				
			//historial_cambio_clave_logic_add::checkhistorial_cambio_claveToSaveAfter($this->historial_cambio_clave,$this->datosCliente,$this->connexion);			
			//$this->historial_cambio_claveLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->historial_cambio_clave,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->historial_cambio_clave,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->historial_cambio_clave,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				historial_cambio_clave_util::refrescarFKDescripcion($this->historial_cambio_clave);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->historial_cambio_clave->getIsDeleted()) {
				$this->historial_cambio_clave=null;
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
						
			/*historial_cambio_clave_logic_add::checkhistorial_cambio_claveToSave($this->historial_cambio_clave,$this->datosCliente,$this->connexion);*/	        
			//historial_cambio_clave_logic_add::updatehistorial_cambio_claveToSave($this->historial_cambio_clave);			
			//$this->historial_cambio_claveLogicAdditional->checkGeneralEntityToSave($this,$this->historial_cambio_clave,$this->datosCliente,$this->connexion);			
			historial_cambio_clave_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->historial_cambio_clave,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			historial_cambio_clave_data::save($this->historial_cambio_clave, $this->connexion);	    	       	 						
			/*historial_cambio_clave_logic_add::checkhistorial_cambio_claveToSaveAfter($this->historial_cambio_clave,$this->datosCliente,$this->connexion);*/			
			//$this->historial_cambio_claveLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->historial_cambio_clave,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->historial_cambio_clave,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->historial_cambio_clave,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				historial_cambio_clave_util::refrescarFKDescripcion($this->historial_cambio_clave);				
			}
			
			if($this->historial_cambio_clave->getIsDeleted()) {
				$this->historial_cambio_clave=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(historial_cambio_clave $historial_cambio_clave,Connexion $connexion)  {
		$historial_cambio_claveLogic = new  historial_cambio_clave_logic();		  		  
        try {		
			$historial_cambio_claveLogic->setConnexion($connexion);			
			$historial_cambio_claveLogic->sethistorial_cambio_clave($historial_cambio_clave);			
			$historial_cambio_claveLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*historial_cambio_clave_logic_add::checkhistorial_cambio_claveToSaves($this->historial_cambio_claves,$this->datosCliente,$this->connexion);*/	        	
			//$this->historial_cambio_claveLogicAdditional->checkGeneralEntitiesToSaves($this,$this->historial_cambio_claves,$this->datosCliente,$this->connexion);
			
	   		foreach($this->historial_cambio_claves as $historial_cambio_claveLocal) {				
								
				//historial_cambio_clave_logic_add::updatehistorial_cambio_claveToSave($historial_cambio_claveLocal);	        	
				historial_cambio_clave_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$historial_cambio_claveLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				historial_cambio_clave_data::save($historial_cambio_claveLocal, $this->connexion);				
			}
			
			/*historial_cambio_clave_logic_add::checkhistorial_cambio_claveToSavesAfter($this->historial_cambio_claves,$this->datosCliente,$this->connexion);*/			
			//$this->historial_cambio_claveLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->historial_cambio_claves,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				historial_cambio_clave_util::refrescarFKDescripciones($this->historial_cambio_claves);
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
			/*historial_cambio_clave_logic_add::checkhistorial_cambio_claveToSaves($this->historial_cambio_claves,$this->datosCliente,$this->connexion);*/			
			//$this->historial_cambio_claveLogicAdditional->checkGeneralEntitiesToSaves($this,$this->historial_cambio_claves,$this->datosCliente,$this->connexion);
			
	   		foreach($this->historial_cambio_claves as $historial_cambio_claveLocal) {				
								
				//historial_cambio_clave_logic_add::updatehistorial_cambio_claveToSave($historial_cambio_claveLocal);	        	
				historial_cambio_clave_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$historial_cambio_claveLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				historial_cambio_clave_data::save($historial_cambio_claveLocal, $this->connexion);				
			}			
			
			/*historial_cambio_clave_logic_add::checkhistorial_cambio_claveToSavesAfter($this->historial_cambio_claves,$this->datosCliente,$this->connexion);*/			
			//$this->historial_cambio_claveLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->historial_cambio_claves,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				historial_cambio_clave_util::refrescarFKDescripciones($this->historial_cambio_claves);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $historial_cambio_claves,Connexion $connexion)  {
		$historial_cambio_claveLogic = new  historial_cambio_clave_logic();
		  		  
        try {		
			$historial_cambio_claveLogic->setConnexion($connexion);			
			$historial_cambio_claveLogic->sethistorial_cambio_claves($historial_cambio_claves);			
			$historial_cambio_claveLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$historial_cambio_clavesAux=array();
		
		foreach($this->historial_cambio_claves as $historial_cambio_clave) {
			if($historial_cambio_clave->getIsDeleted()==false) {
				$historial_cambio_clavesAux[]=$historial_cambio_clave;
			}
		}
		
		$this->historial_cambio_claves=$historial_cambio_clavesAux;
	}
	
	public function updateToGetsAuxiliar(array &$historial_cambio_claves) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->historial_cambio_claves as $historial_cambio_clave) {
				
				$historial_cambio_clave->setid_usuario_Descripcion(historial_cambio_clave_util::getusuarioDescripcion($historial_cambio_clave->getusuario()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$historial_cambio_clave_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$historial_cambio_clave_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$historial_cambio_clave_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$historial_cambio_clave_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$historial_cambio_clave_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$historial_cambio_claveForeignKey=new historial_cambio_clave_param_return();//historial_cambio_claveForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$historial_cambio_claveForeignKey,$historial_cambio_clave_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$historial_cambio_claveForeignKey,$historial_cambio_clave_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $historial_cambio_claveForeignKey;
			
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
	
	
	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$historial_cambio_claveForeignKey,$historial_cambio_clave_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$historial_cambio_claveForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($historial_cambio_clave_session==null) {
			$historial_cambio_clave_session=new historial_cambio_clave_session();
		}
		
		if($historial_cambio_clave_session->bitBusquedaDesdeFKSesionusuario!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=usuario_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalusuario=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalusuario=Funciones::GetFinalQueryAppend($finalQueryGlobalusuario, '');
				$finalQueryGlobalusuario.=usuario_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalusuario.$strRecargarFkQuery;		

				$usuarioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($usuarioLogic->getusuarios() as $usuarioLocal ) {
				if($historial_cambio_claveForeignKey->idusuarioDefaultFK==0) {
					$historial_cambio_claveForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$historial_cambio_claveForeignKey->usuariosFK[$usuarioLocal->getId()]=historial_cambio_clave_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($historial_cambio_clave_session->bigidusuarioActual!=null && $historial_cambio_clave_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($historial_cambio_clave_session->bigidusuarioActual);//WithConnection

				$historial_cambio_claveForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=historial_cambio_clave_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$historial_cambio_claveForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($historial_cambio_clave) {
		$this->saveRelacionesBase($historial_cambio_clave,true);
	}

	public function saveRelaciones($historial_cambio_clave) {
		$this->saveRelacionesBase($historial_cambio_clave,false);
	}

	public function saveRelacionesBase($historial_cambio_clave,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->sethistorial_cambio_clave($historial_cambio_clave);

			if(true) {

				//historial_cambio_clave_logic_add::updateRelacionesToSave($historial_cambio_clave,$this);

				if(($this->historial_cambio_clave->getIsNew() || $this->historial_cambio_clave->getIsChanged()) && !$this->historial_cambio_clave->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->historial_cambio_clave->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//historial_cambio_clave_logic_add::updateRelacionesToSaveAfter($historial_cambio_clave,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $historial_cambio_claves,historial_cambio_clave_param_return $historial_cambio_claveParameterGeneral) : historial_cambio_clave_param_return {
		$historial_cambio_claveReturnGeneral=new historial_cambio_clave_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $historial_cambio_claveReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $historial_cambio_claves,historial_cambio_clave_param_return $historial_cambio_claveParameterGeneral) : historial_cambio_clave_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$historial_cambio_claveReturnGeneral=new historial_cambio_clave_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $historial_cambio_claveReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $historial_cambio_claves,historial_cambio_clave $historial_cambio_clave,historial_cambio_clave_param_return $historial_cambio_claveParameterGeneral,bool $isEsNuevohistorial_cambio_clave,array $clases) : historial_cambio_clave_param_return {
		 try {	
			$historial_cambio_claveReturnGeneral=new historial_cambio_clave_param_return();
	
			$historial_cambio_claveReturnGeneral->sethistorial_cambio_clave($historial_cambio_clave);
			$historial_cambio_claveReturnGeneral->sethistorial_cambio_claves($historial_cambio_claves);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$historial_cambio_claveReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $historial_cambio_claveReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $historial_cambio_claves,historial_cambio_clave $historial_cambio_clave,historial_cambio_clave_param_return $historial_cambio_claveParameterGeneral,bool $isEsNuevohistorial_cambio_clave,array $clases) : historial_cambio_clave_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$historial_cambio_claveReturnGeneral=new historial_cambio_clave_param_return();
	
			$historial_cambio_claveReturnGeneral->sethistorial_cambio_clave($historial_cambio_clave);
			$historial_cambio_claveReturnGeneral->sethistorial_cambio_claves($historial_cambio_claves);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$historial_cambio_claveReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $historial_cambio_claveReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $historial_cambio_claves,historial_cambio_clave $historial_cambio_clave,historial_cambio_clave_param_return $historial_cambio_claveParameterGeneral,bool $isEsNuevohistorial_cambio_clave,array $clases) : historial_cambio_clave_param_return {
		 try {	
			$historial_cambio_claveReturnGeneral=new historial_cambio_clave_param_return();
	
			$historial_cambio_claveReturnGeneral->sethistorial_cambio_clave($historial_cambio_clave);
			$historial_cambio_claveReturnGeneral->sethistorial_cambio_claves($historial_cambio_claves);
			
			
			
			return $historial_cambio_claveReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $historial_cambio_claves,historial_cambio_clave $historial_cambio_clave,historial_cambio_clave_param_return $historial_cambio_claveParameterGeneral,bool $isEsNuevohistorial_cambio_clave,array $clases) : historial_cambio_clave_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$historial_cambio_claveReturnGeneral=new historial_cambio_clave_param_return();
	
			$historial_cambio_claveReturnGeneral->sethistorial_cambio_clave($historial_cambio_clave);
			$historial_cambio_claveReturnGeneral->sethistorial_cambio_claves($historial_cambio_claves);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $historial_cambio_claveReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,historial_cambio_clave $historial_cambio_clave,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,historial_cambio_clave $historial_cambio_clave,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		historial_cambio_clave_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(historial_cambio_clave $historial_cambio_clave,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//historial_cambio_clave_logic_add::updatehistorial_cambio_claveToGet($this->historial_cambio_clave);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$historial_cambio_clave->setusuario($this->historial_cambio_claveDataAccess->getusuario($this->connexion,$historial_cambio_clave));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$historial_cambio_clave->setusuario($this->historial_cambio_claveDataAccess->getusuario($this->connexion,$historial_cambio_clave));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$historial_cambio_clave->setusuario($this->historial_cambio_claveDataAccess->getusuario($this->connexion,$historial_cambio_clave));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$historial_cambio_clave->setusuario($this->historial_cambio_claveDataAccess->getusuario($this->connexion,$historial_cambio_clave));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($historial_cambio_clave->getusuario(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$historial_cambio_clave->setusuario($this->historial_cambio_claveDataAccess->getusuario($this->connexion,$historial_cambio_clave));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($historial_cambio_clave->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$historial_cambio_clave->setusuario($this->historial_cambio_claveDataAccess->getusuario($this->connexion,$historial_cambio_clave));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($historial_cambio_clave->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(historial_cambio_clave $historial_cambio_clave,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//historial_cambio_clave_logic_add::updatehistorial_cambio_claveToSave($this->historial_cambio_clave);			
			
			if(!$paraDeleteCascade) {				
				historial_cambio_clave_data::save($historial_cambio_clave, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		usuario_data::save($historial_cambio_clave->getusuario(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				usuario_data::save($historial_cambio_clave->getusuario(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($historial_cambio_clave->getusuario(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		usuario_data::save($historial_cambio_clave->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($historial_cambio_clave->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				usuario_data::save($historial_cambio_clave->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($historial_cambio_clave->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($historial_cambio_clave->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($historial_cambio_clave->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				historial_cambio_clave_data::save($historial_cambio_clave, $this->connexion);
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
			
			$this->deepLoad($this->historial_cambio_clave,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->historial_cambio_claves as $historial_cambio_clave) {
				$this->deepLoad($historial_cambio_clave,$isDeep,$deepLoadType,$clases);
								
				historial_cambio_clave_util::refrescarFKDescripciones($this->historial_cambio_claves);
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
			
			foreach($this->historial_cambio_claves as $historial_cambio_clave) {
				$this->deepLoad($historial_cambio_clave,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->historial_cambio_clave,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->historial_cambio_claves as $historial_cambio_clave) {
				$this->deepSave($historial_cambio_clave,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->historial_cambio_claves as $historial_cambio_clave) {
				$this->deepSave($historial_cambio_clave,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(usuario::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==usuario::$class) {
						$classes[]=new Classe(usuario::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(usuario::$class);
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
	
	
	
	
	
	
	
	public function gethistorial_cambio_clave() : ?historial_cambio_clave {	
		/*
		historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGet($this->historial_cambio_clave,$this->datosCliente);
		historial_cambio_clave_logic_add::updatehistorial_cambio_claveToGet($this->historial_cambio_clave);
		*/
			
		return $this->historial_cambio_clave;
	}
		
	public function sethistorial_cambio_clave(historial_cambio_clave $newhistorial_cambio_clave) {
		$this->historial_cambio_clave = $newhistorial_cambio_clave;
	}
	
	public function gethistorial_cambio_claves() : array {		
		/*
		historial_cambio_clave_logic_add::checkhistorial_cambio_claveToGets($this->historial_cambio_claves,$this->datosCliente);
		
		foreach ($this->historial_cambio_claves as $historial_cambio_claveLocal ) {
			historial_cambio_clave_logic_add::updatehistorial_cambio_claveToGet($historial_cambio_claveLocal);
		}
		*/
		
		return $this->historial_cambio_claves;
	}
	
	public function sethistorial_cambio_claves(array $newhistorial_cambio_claves) {
		$this->historial_cambio_claves = $newhistorial_cambio_claves;
	}
	
	public function gethistorial_cambio_claveDataAccess() : historial_cambio_clave_data {
		return $this->historial_cambio_claveDataAccess;
	}
	
	public function sethistorial_cambio_claveDataAccess(historial_cambio_clave_data $newhistorial_cambio_claveDataAccess) {
		$this->historial_cambio_claveDataAccess = $newhistorial_cambio_claveDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        historial_cambio_clave_carga::$CONTROLLER;;        
		
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
