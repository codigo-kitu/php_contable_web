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

namespace com\bydan\contabilidad\contabilidad\imagen_asiento\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\imagen_asiento\util\imagen_asiento_carga;
use com\bydan\contabilidad\contabilidad\imagen_asiento\util\imagen_asiento_param_return;

use com\bydan\contabilidad\contabilidad\imagen_asiento\presentation\session\imagen_asiento_session;

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

use com\bydan\contabilidad\contabilidad\imagen_asiento\util\imagen_asiento_util;
use com\bydan\contabilidad\contabilidad\imagen_asiento\business\entity\imagen_asiento;
use com\bydan\contabilidad\contabilidad\imagen_asiento\business\data\imagen_asiento_data;

//FK


use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\data\asiento_data;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

//REL


//REL DETALLES




class imagen_asiento_logic  extends GeneralEntityLogic implements imagen_asiento_logicI {	
	/*GENERAL*/
	public imagen_asiento_data $imagen_asientoDataAccess;
	//public ?imagen_asiento_logic_add $imagen_asientoLogicAdditional=null;
	public ?imagen_asiento $imagen_asiento;
	public array $imagen_asientos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->imagen_asientoDataAccess = new imagen_asiento_data();			
			$this->imagen_asientos = array();
			$this->imagen_asiento = new imagen_asiento();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->imagen_asientoLogicAdditional = new imagen_asiento_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->imagen_asientoLogicAdditional==null) {
		//	$this->imagen_asientoLogicAdditional=new imagen_asiento_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->imagen_asientoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->imagen_asientoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->imagen_asientoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->imagen_asientoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_asientos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_asientos=$this->imagen_asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_asiento_util::refrescarFKDescripciones($this->imagen_asientos);
			}
			
			//imagen_asiento_logic_add::checkimagen_asientoToGets($this->imagen_asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_asientos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_asientos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_asientos=$this->imagen_asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_asiento_util::refrescarFKDescripciones($this->imagen_asientos);
			}
			
			//imagen_asiento_logic_add::checkimagen_asientoToGets($this->imagen_asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_asientos);
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
		$this->imagen_asiento = new imagen_asiento();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->imagen_asiento=$this->imagen_asientoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_asiento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_asiento_util::refrescarFKDescripcion($this->imagen_asiento);
			}
						
			//imagen_asiento_logic_add::checkimagen_asientoToGet($this->imagen_asiento,$this->datosCliente);
			//imagen_asiento_logic_add::updateimagen_asientoToGet($this->imagen_asiento);
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
		$this->imagen_asiento = new  imagen_asiento();
		  		  
        try {		
			$this->imagen_asiento=$this->imagen_asientoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_asiento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_asiento_util::refrescarFKDescripcion($this->imagen_asiento);
			}
			
			//imagen_asiento_logic_add::checkimagen_asientoToGet($this->imagen_asiento,$this->datosCliente);
			//imagen_asiento_logic_add::updateimagen_asientoToGet($this->imagen_asiento);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?imagen_asiento {
		$imagen_asientoLogic = new  imagen_asiento_logic();
		  		  
        try {		
			$imagen_asientoLogic->setConnexion($connexion);			
			$imagen_asientoLogic->getEntity($id);			
			return $imagen_asientoLogic->getimagen_asiento();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->imagen_asiento = new  imagen_asiento();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->imagen_asiento=$this->imagen_asientoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_asiento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_asiento_util::refrescarFKDescripcion($this->imagen_asiento);
			}
			
			//imagen_asiento_logic_add::checkimagen_asientoToGet($this->imagen_asiento,$this->datosCliente);
			//imagen_asiento_logic_add::updateimagen_asientoToGet($this->imagen_asiento);
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
		$this->imagen_asiento = new  imagen_asiento();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_asiento=$this->imagen_asientoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_asiento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_asiento_util::refrescarFKDescripcion($this->imagen_asiento);
			}
			
			//imagen_asiento_logic_add::checkimagen_asientoToGet($this->imagen_asiento,$this->datosCliente);
			//imagen_asiento_logic_add::updateimagen_asientoToGet($this->imagen_asiento);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?imagen_asiento {
		$imagen_asientoLogic = new  imagen_asiento_logic();
		  		  
        try {		
			$imagen_asientoLogic->setConnexion($connexion);			
			$imagen_asientoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $imagen_asientoLogic->getimagen_asiento();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_asientos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_asientos=$this->imagen_asientoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_asiento_util::refrescarFKDescripciones($this->imagen_asientos);
			}
			
			//imagen_asiento_logic_add::checkimagen_asientoToGets($this->imagen_asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_asientos);			
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
		$this->imagen_asientos = array();
		  		  
        try {			
			$this->imagen_asientos=$this->imagen_asientoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_asiento_util::refrescarFKDescripciones($this->imagen_asientos);
			}
			
			//imagen_asiento_logic_add::checkimagen_asientoToGets($this->imagen_asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_asientos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->imagen_asientos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_asientos=$this->imagen_asientoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_asiento_util::refrescarFKDescripciones($this->imagen_asientos);
			}
			
			//imagen_asiento_logic_add::checkimagen_asientoToGets($this->imagen_asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_asientos);
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
		$this->imagen_asientos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_asientos=$this->imagen_asientoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_asiento_util::refrescarFKDescripciones($this->imagen_asientos);
			}
			
			//imagen_asiento_logic_add::checkimagen_asientoToGets($this->imagen_asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_asientos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$imagen_asientoLogic = new  imagen_asiento_logic();
		  		  
        try {		
			$imagen_asientoLogic->setConnexion($connexion);			
			$imagen_asientoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $imagen_asientoLogic->getimagen_asientos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->imagen_asientos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_asientos=$this->imagen_asientoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_asiento_util::refrescarFKDescripciones($this->imagen_asientos);
			}
			
			//imagen_asiento_logic_add::checkimagen_asientoToGets($this->imagen_asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_asientos);
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
		$this->imagen_asientos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_asientos=$this->imagen_asientoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_asiento_util::refrescarFKDescripciones($this->imagen_asientos);
			}
			
			//imagen_asiento_logic_add::checkimagen_asientoToGets($this->imagen_asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_asientos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->imagen_asientos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_asientos=$this->imagen_asientoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_asiento_util::refrescarFKDescripciones($this->imagen_asientos);
			}
			
			//imagen_asiento_logic_add::checkimagen_asientoToGets($this->imagen_asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_asientos);
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
		$this->imagen_asientos = array();
		  		  
        try {			
			$this->imagen_asientos=$this->imagen_asientoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_asiento_util::refrescarFKDescripciones($this->imagen_asientos);
			}	
			
			//imagen_asiento_logic_add::checkimagen_asientoToGets($this->imagen_asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_asientos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_asientos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_asientos=$this->imagen_asientoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_asiento_util::refrescarFKDescripciones($this->imagen_asientos);
			}
			
			//imagen_asiento_logic_add::checkimagen_asientoToGets($this->imagen_asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_asientos);
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
		$this->imagen_asientos = array();
		  		  
        try {		
			$this->imagen_asientos=$this->imagen_asientoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_asiento_util::refrescarFKDescripciones($this->imagen_asientos);
			}
			
			//imagen_asiento_logic_add::checkimagen_asientoToGets($this->imagen_asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_asientos);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdasientoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_asiento) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_asiento= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_asiento->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento,imagen_asiento_util::$ID_ASIENTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento);

			$this->imagen_asientos=$this->imagen_asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				imagen_asiento_util::refrescarFKDescripciones($this->imagen_asientos);
			}
			//imagen_asiento_logic_add::checkimagen_asientoToGets($this->imagen_asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->imagen_asientos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idasiento(string $strFinalQuery,Pagination $pagination,int $id_asiento) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_asiento= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_asiento->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento,imagen_asiento_util::$ID_ASIENTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento);

			$this->imagen_asientos=$this->imagen_asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				imagen_asiento_util::refrescarFKDescripciones($this->imagen_asientos);
			}
			//imagen_asiento_logic_add::checkimagen_asientoToGets($this->imagen_asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->imagen_asientos);
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
						
			//imagen_asiento_logic_add::checkimagen_asientoToSave($this->imagen_asiento,$this->datosCliente,$this->connexion);	       
			//imagen_asiento_logic_add::updateimagen_asientoToSave($this->imagen_asiento);			
			imagen_asiento_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_asiento,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->imagen_asientoLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_asiento,$this->datosCliente,$this->connexion);
			
			
			imagen_asiento_data::save($this->imagen_asiento, $this->connexion);	    	       	 				
			//imagen_asiento_logic_add::checkimagen_asientoToSaveAfter($this->imagen_asiento,$this->datosCliente,$this->connexion);			
			//$this->imagen_asientoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_asiento,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_asiento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_asiento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_asiento_util::refrescarFKDescripcion($this->imagen_asiento);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->imagen_asiento->getIsDeleted()) {
				$this->imagen_asiento=null;
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
						
			/*imagen_asiento_logic_add::checkimagen_asientoToSave($this->imagen_asiento,$this->datosCliente,$this->connexion);*/	        
			//imagen_asiento_logic_add::updateimagen_asientoToSave($this->imagen_asiento);			
			//$this->imagen_asientoLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_asiento,$this->datosCliente,$this->connexion);			
			imagen_asiento_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_asiento,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			imagen_asiento_data::save($this->imagen_asiento, $this->connexion);	    	       	 						
			/*imagen_asiento_logic_add::checkimagen_asientoToSaveAfter($this->imagen_asiento,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_asientoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_asiento,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_asiento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_asiento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_asiento_util::refrescarFKDescripcion($this->imagen_asiento);				
			}
			
			if($this->imagen_asiento->getIsDeleted()) {
				$this->imagen_asiento=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(imagen_asiento $imagen_asiento,Connexion $connexion)  {
		$imagen_asientoLogic = new  imagen_asiento_logic();		  		  
        try {		
			$imagen_asientoLogic->setConnexion($connexion);			
			$imagen_asientoLogic->setimagen_asiento($imagen_asiento);			
			$imagen_asientoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*imagen_asiento_logic_add::checkimagen_asientoToSaves($this->imagen_asientos,$this->datosCliente,$this->connexion);*/	        	
			//$this->imagen_asientoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_asientos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_asientos as $imagen_asientoLocal) {				
								
				//imagen_asiento_logic_add::updateimagen_asientoToSave($imagen_asientoLocal);	        	
				imagen_asiento_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_asientoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				imagen_asiento_data::save($imagen_asientoLocal, $this->connexion);				
			}
			
			/*imagen_asiento_logic_add::checkimagen_asientoToSavesAfter($this->imagen_asientos,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_asientoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_asientos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_asiento_util::refrescarFKDescripciones($this->imagen_asientos);
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
			/*imagen_asiento_logic_add::checkimagen_asientoToSaves($this->imagen_asientos,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_asientoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_asientos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_asientos as $imagen_asientoLocal) {				
								
				//imagen_asiento_logic_add::updateimagen_asientoToSave($imagen_asientoLocal);	        	
				imagen_asiento_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_asientoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				imagen_asiento_data::save($imagen_asientoLocal, $this->connexion);				
			}			
			
			/*imagen_asiento_logic_add::checkimagen_asientoToSavesAfter($this->imagen_asientos,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_asientoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_asientos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_asiento_util::refrescarFKDescripciones($this->imagen_asientos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $imagen_asientos,Connexion $connexion)  {
		$imagen_asientoLogic = new  imagen_asiento_logic();
		  		  
        try {		
			$imagen_asientoLogic->setConnexion($connexion);			
			$imagen_asientoLogic->setimagen_asientos($imagen_asientos);			
			$imagen_asientoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$imagen_asientosAux=array();
		
		foreach($this->imagen_asientos as $imagen_asiento) {
			if($imagen_asiento->getIsDeleted()==false) {
				$imagen_asientosAux[]=$imagen_asiento;
			}
		}
		
		$this->imagen_asientos=$imagen_asientosAux;
	}
	
	public function updateToGetsAuxiliar(array &$imagen_asientos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->imagen_asientos as $imagen_asiento) {
				
				$imagen_asiento->setid_asiento_Descripcion(imagen_asiento_util::getasientoDescripcion($imagen_asiento->getasiento()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_asiento_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$imagen_asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_asiento_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$imagen_asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_asiento_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$imagen_asientoForeignKey=new imagen_asiento_param_return();//imagen_asientoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_asiento',$strRecargarFkTipos,',')) {
				$this->cargarCombosasientosFK($this->connexion,$strRecargarFkQuery,$imagen_asientoForeignKey,$imagen_asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_asiento',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosasientosFK($this->connexion,' where id=-1 ',$imagen_asientoForeignKey,$imagen_asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $imagen_asientoForeignKey;
			
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
	
	
	public function cargarCombosasientosFK($connexion=null,$strRecargarFkQuery='',$imagen_asientoForeignKey,$imagen_asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$asientoLogic= new asiento_logic();
		$pagination= new Pagination();
		$imagen_asientoForeignKey->asientosFK=array();

		$asientoLogic->setConnexion($connexion);
		$asientoLogic->getasientoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($imagen_asiento_session==null) {
			$imagen_asiento_session=new imagen_asiento_session();
		}
		
		if($imagen_asiento_session->bitBusquedaDesdeFKSesionasiento!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=asiento_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalasiento=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalasiento=Funciones::GetFinalQueryAppend($finalQueryGlobalasiento, '');
				$finalQueryGlobalasiento.=asiento_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalasiento.$strRecargarFkQuery;		

				$asientoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($asientoLogic->getasientos() as $asientoLocal ) {
				if($imagen_asientoForeignKey->idasientoDefaultFK==0) {
					$imagen_asientoForeignKey->idasientoDefaultFK=$asientoLocal->getId();
				}

				$imagen_asientoForeignKey->asientosFK[$asientoLocal->getId()]=imagen_asiento_util::getasientoDescripcion($asientoLocal);
			}

		} else {

			if($imagen_asiento_session->bigidasientoActual!=null && $imagen_asiento_session->bigidasientoActual > 0) {
				$asientoLogic->getEntity($imagen_asiento_session->bigidasientoActual);//WithConnection

				$imagen_asientoForeignKey->asientosFK[$asientoLogic->getasiento()->getId()]=imagen_asiento_util::getasientoDescripcion($asientoLogic->getasiento());
				$imagen_asientoForeignKey->idasientoDefaultFK=$asientoLogic->getasiento()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($imagen_asiento) {
		$this->saveRelacionesBase($imagen_asiento,true);
	}

	public function saveRelaciones($imagen_asiento) {
		$this->saveRelacionesBase($imagen_asiento,false);
	}

	public function saveRelacionesBase($imagen_asiento,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setimagen_asiento($imagen_asiento);

			if(true) {

				//imagen_asiento_logic_add::updateRelacionesToSave($imagen_asiento,$this);

				if(($this->imagen_asiento->getIsNew() || $this->imagen_asiento->getIsChanged()) && !$this->imagen_asiento->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->imagen_asiento->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//imagen_asiento_logic_add::updateRelacionesToSaveAfter($imagen_asiento,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $imagen_asientos,imagen_asiento_param_return $imagen_asientoParameterGeneral) : imagen_asiento_param_return {
		$imagen_asientoReturnGeneral=new imagen_asiento_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $imagen_asientoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $imagen_asientos,imagen_asiento_param_return $imagen_asientoParameterGeneral) : imagen_asiento_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_asientoReturnGeneral=new imagen_asiento_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_asientoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_asientos,imagen_asiento $imagen_asiento,imagen_asiento_param_return $imagen_asientoParameterGeneral,bool $isEsNuevoimagen_asiento,array $clases) : imagen_asiento_param_return {
		 try {	
			$imagen_asientoReturnGeneral=new imagen_asiento_param_return();
	
			$imagen_asientoReturnGeneral->setimagen_asiento($imagen_asiento);
			$imagen_asientoReturnGeneral->setimagen_asientos($imagen_asientos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_asientoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $imagen_asientoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_asientos,imagen_asiento $imagen_asiento,imagen_asiento_param_return $imagen_asientoParameterGeneral,bool $isEsNuevoimagen_asiento,array $clases) : imagen_asiento_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_asientoReturnGeneral=new imagen_asiento_param_return();
	
			$imagen_asientoReturnGeneral->setimagen_asiento($imagen_asiento);
			$imagen_asientoReturnGeneral->setimagen_asientos($imagen_asientos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_asientoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_asientoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_asientos,imagen_asiento $imagen_asiento,imagen_asiento_param_return $imagen_asientoParameterGeneral,bool $isEsNuevoimagen_asiento,array $clases) : imagen_asiento_param_return {
		 try {	
			$imagen_asientoReturnGeneral=new imagen_asiento_param_return();
	
			$imagen_asientoReturnGeneral->setimagen_asiento($imagen_asiento);
			$imagen_asientoReturnGeneral->setimagen_asientos($imagen_asientos);
			
			
			
			return $imagen_asientoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_asientos,imagen_asiento $imagen_asiento,imagen_asiento_param_return $imagen_asientoParameterGeneral,bool $isEsNuevoimagen_asiento,array $clases) : imagen_asiento_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_asientoReturnGeneral=new imagen_asiento_param_return();
	
			$imagen_asientoReturnGeneral->setimagen_asiento($imagen_asiento);
			$imagen_asientoReturnGeneral->setimagen_asientos($imagen_asientos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_asientoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,imagen_asiento $imagen_asiento,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,imagen_asiento $imagen_asiento,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		imagen_asiento_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(imagen_asiento $imagen_asiento,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//imagen_asiento_logic_add::updateimagen_asientoToGet($this->imagen_asiento);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$imagen_asiento->setasiento($this->imagen_asientoDataAccess->getasiento($this->connexion,$imagen_asiento));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$imagen_asiento->setasiento($this->imagen_asientoDataAccess->getasiento($this->connexion,$imagen_asiento));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$imagen_asiento->setasiento($this->imagen_asientoDataAccess->getasiento($this->connexion,$imagen_asiento));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$imagen_asiento->setasiento($this->imagen_asientoDataAccess->getasiento($this->connexion,$imagen_asiento));
		$asientoLogic= new asiento_logic($this->connexion);
		$asientoLogic->deepLoad($imagen_asiento->getasiento(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$imagen_asiento->setasiento($this->imagen_asientoDataAccess->getasiento($this->connexion,$imagen_asiento));
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepLoad($imagen_asiento->getasiento(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$imagen_asiento->setasiento($this->imagen_asientoDataAccess->getasiento($this->connexion,$imagen_asiento));
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepLoad($imagen_asiento->getasiento(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(imagen_asiento $imagen_asiento,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//imagen_asiento_logic_add::updateimagen_asientoToSave($this->imagen_asiento);			
			
			if(!$paraDeleteCascade) {				
				imagen_asiento_data::save($imagen_asiento, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		asiento_data::save($imagen_asiento->getasiento(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				asiento_data::save($imagen_asiento->getasiento(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_data::save($imagen_asiento->getasiento(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		asiento_data::save($imagen_asiento->getasiento(),$this->connexion);
		$asientoLogic= new asiento_logic($this->connexion);
		$asientoLogic->deepSave($imagen_asiento->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				asiento_data::save($imagen_asiento->getasiento(),$this->connexion);
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepSave($imagen_asiento->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_data::save($imagen_asiento->getasiento(),$this->connexion);
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepSave($imagen_asiento->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				imagen_asiento_data::save($imagen_asiento, $this->connexion);
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
			
			$this->deepLoad($this->imagen_asiento,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->imagen_asientos as $imagen_asiento) {
				$this->deepLoad($imagen_asiento,$isDeep,$deepLoadType,$clases);
								
				imagen_asiento_util::refrescarFKDescripciones($this->imagen_asientos);
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
			
			foreach($this->imagen_asientos as $imagen_asiento) {
				$this->deepLoad($imagen_asiento,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->imagen_asiento,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->imagen_asientos as $imagen_asiento) {
				$this->deepSave($imagen_asiento,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->imagen_asientos as $imagen_asiento) {
				$this->deepSave($imagen_asiento,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(asiento::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==asiento::$class) {
						$classes[]=new Classe(asiento::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
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
	
	
	
	
	
	
	
	public function getimagen_asiento() : ?imagen_asiento {	
		/*
		imagen_asiento_logic_add::checkimagen_asientoToGet($this->imagen_asiento,$this->datosCliente);
		imagen_asiento_logic_add::updateimagen_asientoToGet($this->imagen_asiento);
		*/
			
		return $this->imagen_asiento;
	}
		
	public function setimagen_asiento(imagen_asiento $newimagen_asiento) {
		$this->imagen_asiento = $newimagen_asiento;
	}
	
	public function getimagen_asientos() : array {		
		/*
		imagen_asiento_logic_add::checkimagen_asientoToGets($this->imagen_asientos,$this->datosCliente);
		
		foreach ($this->imagen_asientos as $imagen_asientoLocal ) {
			imagen_asiento_logic_add::updateimagen_asientoToGet($imagen_asientoLocal);
		}
		*/
		
		return $this->imagen_asientos;
	}
	
	public function setimagen_asientos(array $newimagen_asientos) {
		$this->imagen_asientos = $newimagen_asientos;
	}
	
	public function getimagen_asientoDataAccess() : imagen_asiento_data {
		return $this->imagen_asientoDataAccess;
	}
	
	public function setimagen_asientoDataAccess(imagen_asiento_data $newimagen_asientoDataAccess) {
		$this->imagen_asientoDataAccess = $newimagen_asientoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        imagen_asiento_carga::$CONTROLLER;;        
		
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
