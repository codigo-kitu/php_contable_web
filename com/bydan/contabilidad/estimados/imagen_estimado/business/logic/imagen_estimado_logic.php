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

namespace com\bydan\contabilidad\estimados\imagen_estimado\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\estimados\imagen_estimado\util\imagen_estimado_carga;
use com\bydan\contabilidad\estimados\imagen_estimado\util\imagen_estimado_param_return;

use com\bydan\contabilidad\estimados\imagen_estimado\presentation\session\imagen_estimado_session;

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

use com\bydan\contabilidad\estimados\imagen_estimado\util\imagen_estimado_util;
use com\bydan\contabilidad\estimados\imagen_estimado\business\entity\imagen_estimado;
use com\bydan\contabilidad\estimados\imagen_estimado\business\data\imagen_estimado_data;

//FK


use com\bydan\contabilidad\estimados\estimado\business\entity\estimado;
use com\bydan\contabilidad\estimados\estimado\business\data\estimado_data;
use com\bydan\contabilidad\estimados\estimado\business\logic\estimado_logic;
use com\bydan\contabilidad\estimados\estimado\util\estimado_util;

//REL


//REL DETALLES




class imagen_estimado_logic  extends GeneralEntityLogic implements imagen_estimado_logicI {	
	/*GENERAL*/
	public imagen_estimado_data $imagen_estimadoDataAccess;
	//public ?imagen_estimado_logic_add $imagen_estimadoLogicAdditional=null;
	public ?imagen_estimado $imagen_estimado;
	public array $imagen_estimados;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->imagen_estimadoDataAccess = new imagen_estimado_data();			
			$this->imagen_estimados = array();
			$this->imagen_estimado = new imagen_estimado();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->imagen_estimadoLogicAdditional = new imagen_estimado_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->imagen_estimadoLogicAdditional==null) {
		//	$this->imagen_estimadoLogicAdditional=new imagen_estimado_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->imagen_estimadoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->imagen_estimadoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->imagen_estimadoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->imagen_estimadoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_estimados = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_estimados=$this->imagen_estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_estimado_util::refrescarFKDescripciones($this->imagen_estimados);
			}
			
			//imagen_estimado_logic_add::checkimagen_estimadoToGets($this->imagen_estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_estimados);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_estimados = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_estimados=$this->imagen_estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_estimado_util::refrescarFKDescripciones($this->imagen_estimados);
			}
			
			//imagen_estimado_logic_add::checkimagen_estimadoToGets($this->imagen_estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_estimados);
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
		$this->imagen_estimado = new imagen_estimado();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->imagen_estimado=$this->imagen_estimadoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_estimado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_estimado_util::refrescarFKDescripcion($this->imagen_estimado);
			}
						
			//imagen_estimado_logic_add::checkimagen_estimadoToGet($this->imagen_estimado,$this->datosCliente);
			//imagen_estimado_logic_add::updateimagen_estimadoToGet($this->imagen_estimado);
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
		$this->imagen_estimado = new  imagen_estimado();
		  		  
        try {		
			$this->imagen_estimado=$this->imagen_estimadoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_estimado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_estimado_util::refrescarFKDescripcion($this->imagen_estimado);
			}
			
			//imagen_estimado_logic_add::checkimagen_estimadoToGet($this->imagen_estimado,$this->datosCliente);
			//imagen_estimado_logic_add::updateimagen_estimadoToGet($this->imagen_estimado);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?imagen_estimado {
		$imagen_estimadoLogic = new  imagen_estimado_logic();
		  		  
        try {		
			$imagen_estimadoLogic->setConnexion($connexion);			
			$imagen_estimadoLogic->getEntity($id);			
			return $imagen_estimadoLogic->getimagen_estimado();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->imagen_estimado = new  imagen_estimado();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->imagen_estimado=$this->imagen_estimadoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_estimado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_estimado_util::refrescarFKDescripcion($this->imagen_estimado);
			}
			
			//imagen_estimado_logic_add::checkimagen_estimadoToGet($this->imagen_estimado,$this->datosCliente);
			//imagen_estimado_logic_add::updateimagen_estimadoToGet($this->imagen_estimado);
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
		$this->imagen_estimado = new  imagen_estimado();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_estimado=$this->imagen_estimadoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_estimado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_estimado_util::refrescarFKDescripcion($this->imagen_estimado);
			}
			
			//imagen_estimado_logic_add::checkimagen_estimadoToGet($this->imagen_estimado,$this->datosCliente);
			//imagen_estimado_logic_add::updateimagen_estimadoToGet($this->imagen_estimado);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?imagen_estimado {
		$imagen_estimadoLogic = new  imagen_estimado_logic();
		  		  
        try {		
			$imagen_estimadoLogic->setConnexion($connexion);			
			$imagen_estimadoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $imagen_estimadoLogic->getimagen_estimado();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_estimados = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_estimados=$this->imagen_estimadoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_estimado_util::refrescarFKDescripciones($this->imagen_estimados);
			}
			
			//imagen_estimado_logic_add::checkimagen_estimadoToGets($this->imagen_estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_estimados);			
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
		$this->imagen_estimados = array();
		  		  
        try {			
			$this->imagen_estimados=$this->imagen_estimadoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_estimado_util::refrescarFKDescripciones($this->imagen_estimados);
			}
			
			//imagen_estimado_logic_add::checkimagen_estimadoToGets($this->imagen_estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_estimados);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->imagen_estimados = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_estimados=$this->imagen_estimadoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_estimado_util::refrescarFKDescripciones($this->imagen_estimados);
			}
			
			//imagen_estimado_logic_add::checkimagen_estimadoToGets($this->imagen_estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_estimados);
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
		$this->imagen_estimados = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_estimados=$this->imagen_estimadoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_estimado_util::refrescarFKDescripciones($this->imagen_estimados);
			}
			
			//imagen_estimado_logic_add::checkimagen_estimadoToGets($this->imagen_estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_estimados);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$imagen_estimadoLogic = new  imagen_estimado_logic();
		  		  
        try {		
			$imagen_estimadoLogic->setConnexion($connexion);			
			$imagen_estimadoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $imagen_estimadoLogic->getimagen_estimados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->imagen_estimados = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_estimados=$this->imagen_estimadoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_estimado_util::refrescarFKDescripciones($this->imagen_estimados);
			}
			
			//imagen_estimado_logic_add::checkimagen_estimadoToGets($this->imagen_estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_estimados);
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
		$this->imagen_estimados = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_estimados=$this->imagen_estimadoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_estimado_util::refrescarFKDescripciones($this->imagen_estimados);
			}
			
			//imagen_estimado_logic_add::checkimagen_estimadoToGets($this->imagen_estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_estimados);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->imagen_estimados = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_estimados=$this->imagen_estimadoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_estimado_util::refrescarFKDescripciones($this->imagen_estimados);
			}
			
			//imagen_estimado_logic_add::checkimagen_estimadoToGets($this->imagen_estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_estimados);
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
		$this->imagen_estimados = array();
		  		  
        try {			
			$this->imagen_estimados=$this->imagen_estimadoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_estimado_util::refrescarFKDescripciones($this->imagen_estimados);
			}	
			
			//imagen_estimado_logic_add::checkimagen_estimadoToGets($this->imagen_estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_estimados);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_estimados = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_estimados=$this->imagen_estimadoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_estimado_util::refrescarFKDescripciones($this->imagen_estimados);
			}
			
			//imagen_estimado_logic_add::checkimagen_estimadoToGets($this->imagen_estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_estimados);
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
		$this->imagen_estimados = array();
		  		  
        try {		
			$this->imagen_estimados=$this->imagen_estimadoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_estimado_util::refrescarFKDescripciones($this->imagen_estimados);
			}
			
			//imagen_estimado_logic_add::checkimagen_estimadoToGets($this->imagen_estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_estimados);

		}  catch(Exception $e) {						
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
			$parameterSelectionGeneralid_estimado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estimado,imagen_estimado_util::$ID_ESTIMADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estimado);

			$this->imagen_estimados=$this->imagen_estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				imagen_estimado_util::refrescarFKDescripciones($this->imagen_estimados);
			}
			//imagen_estimado_logic_add::checkimagen_estimadoToGets($this->imagen_estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->imagen_estimados);

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
			$parameterSelectionGeneralid_estimado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estimado,imagen_estimado_util::$ID_ESTIMADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estimado);

			$this->imagen_estimados=$this->imagen_estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				imagen_estimado_util::refrescarFKDescripciones($this->imagen_estimados);
			}
			//imagen_estimado_logic_add::checkimagen_estimadoToGets($this->imagen_estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->imagen_estimados);
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
						
			//imagen_estimado_logic_add::checkimagen_estimadoToSave($this->imagen_estimado,$this->datosCliente,$this->connexion);	       
			//imagen_estimado_logic_add::updateimagen_estimadoToSave($this->imagen_estimado);			
			imagen_estimado_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_estimado,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->imagen_estimadoLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_estimado,$this->datosCliente,$this->connexion);
			
			
			imagen_estimado_data::save($this->imagen_estimado, $this->connexion);	    	       	 				
			//imagen_estimado_logic_add::checkimagen_estimadoToSaveAfter($this->imagen_estimado,$this->datosCliente,$this->connexion);			
			//$this->imagen_estimadoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_estimado,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_estimado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_estimado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_estimado_util::refrescarFKDescripcion($this->imagen_estimado);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->imagen_estimado->getIsDeleted()) {
				$this->imagen_estimado=null;
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
						
			/*imagen_estimado_logic_add::checkimagen_estimadoToSave($this->imagen_estimado,$this->datosCliente,$this->connexion);*/	        
			//imagen_estimado_logic_add::updateimagen_estimadoToSave($this->imagen_estimado);			
			//$this->imagen_estimadoLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_estimado,$this->datosCliente,$this->connexion);			
			imagen_estimado_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_estimado,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			imagen_estimado_data::save($this->imagen_estimado, $this->connexion);	    	       	 						
			/*imagen_estimado_logic_add::checkimagen_estimadoToSaveAfter($this->imagen_estimado,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_estimadoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_estimado,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_estimado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_estimado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_estimado_util::refrescarFKDescripcion($this->imagen_estimado);				
			}
			
			if($this->imagen_estimado->getIsDeleted()) {
				$this->imagen_estimado=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(imagen_estimado $imagen_estimado,Connexion $connexion)  {
		$imagen_estimadoLogic = new  imagen_estimado_logic();		  		  
        try {		
			$imagen_estimadoLogic->setConnexion($connexion);			
			$imagen_estimadoLogic->setimagen_estimado($imagen_estimado);			
			$imagen_estimadoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*imagen_estimado_logic_add::checkimagen_estimadoToSaves($this->imagen_estimados,$this->datosCliente,$this->connexion);*/	        	
			//$this->imagen_estimadoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_estimados,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_estimados as $imagen_estimadoLocal) {				
								
				//imagen_estimado_logic_add::updateimagen_estimadoToSave($imagen_estimadoLocal);	        	
				imagen_estimado_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_estimadoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				imagen_estimado_data::save($imagen_estimadoLocal, $this->connexion);				
			}
			
			/*imagen_estimado_logic_add::checkimagen_estimadoToSavesAfter($this->imagen_estimados,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_estimadoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_estimados,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_estimado_util::refrescarFKDescripciones($this->imagen_estimados);
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
			/*imagen_estimado_logic_add::checkimagen_estimadoToSaves($this->imagen_estimados,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_estimadoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_estimados,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_estimados as $imagen_estimadoLocal) {				
								
				//imagen_estimado_logic_add::updateimagen_estimadoToSave($imagen_estimadoLocal);	        	
				imagen_estimado_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_estimadoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				imagen_estimado_data::save($imagen_estimadoLocal, $this->connexion);				
			}			
			
			/*imagen_estimado_logic_add::checkimagen_estimadoToSavesAfter($this->imagen_estimados,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_estimadoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_estimados,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_estimado_util::refrescarFKDescripciones($this->imagen_estimados);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $imagen_estimados,Connexion $connexion)  {
		$imagen_estimadoLogic = new  imagen_estimado_logic();
		  		  
        try {		
			$imagen_estimadoLogic->setConnexion($connexion);			
			$imagen_estimadoLogic->setimagen_estimados($imagen_estimados);			
			$imagen_estimadoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$imagen_estimadosAux=array();
		
		foreach($this->imagen_estimados as $imagen_estimado) {
			if($imagen_estimado->getIsDeleted()==false) {
				$imagen_estimadosAux[]=$imagen_estimado;
			}
		}
		
		$this->imagen_estimados=$imagen_estimadosAux;
	}
	
	public function updateToGetsAuxiliar(array &$imagen_estimados) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->imagen_estimados as $imagen_estimado) {
				
				$imagen_estimado->setid_estimado_Descripcion(imagen_estimado_util::getestimadoDescripcion($imagen_estimado->getestimado()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_estimado_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$imagen_estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_estimado_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$imagen_estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_estimado_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$imagen_estimadoForeignKey=new imagen_estimado_param_return();//imagen_estimadoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estimado',$strRecargarFkTipos,',')) {
				$this->cargarCombosestimadosFK($this->connexion,$strRecargarFkQuery,$imagen_estimadoForeignKey,$imagen_estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_estimado',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosestimadosFK($this->connexion,' where id=-1 ',$imagen_estimadoForeignKey,$imagen_estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $imagen_estimadoForeignKey;
			
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
	
	
	public function cargarCombosestimadosFK($connexion=null,$strRecargarFkQuery='',$imagen_estimadoForeignKey,$imagen_estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$estimadoLogic= new estimado_logic();
		$pagination= new Pagination();
		$imagen_estimadoForeignKey->estimadosFK=array();

		$estimadoLogic->setConnexion($connexion);
		$estimadoLogic->getestimadoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($imagen_estimado_session==null) {
			$imagen_estimado_session=new imagen_estimado_session();
		}
		
		if($imagen_estimado_session->bitBusquedaDesdeFKSesionestimado!=true) {
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
				if($imagen_estimadoForeignKey->idestimadoDefaultFK==0) {
					$imagen_estimadoForeignKey->idestimadoDefaultFK=$estimadoLocal->getId();
				}

				$imagen_estimadoForeignKey->estimadosFK[$estimadoLocal->getId()]=imagen_estimado_util::getestimadoDescripcion($estimadoLocal);
			}

		} else {

			if($imagen_estimado_session->bigidestimadoActual!=null && $imagen_estimado_session->bigidestimadoActual > 0) {
				$estimadoLogic->getEntity($imagen_estimado_session->bigidestimadoActual);//WithConnection

				$imagen_estimadoForeignKey->estimadosFK[$estimadoLogic->getestimado()->getId()]=imagen_estimado_util::getestimadoDescripcion($estimadoLogic->getestimado());
				$imagen_estimadoForeignKey->idestimadoDefaultFK=$estimadoLogic->getestimado()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($imagen_estimado) {
		$this->saveRelacionesBase($imagen_estimado,true);
	}

	public function saveRelaciones($imagen_estimado) {
		$this->saveRelacionesBase($imagen_estimado,false);
	}

	public function saveRelacionesBase($imagen_estimado,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setimagen_estimado($imagen_estimado);

			if(true) {

				//imagen_estimado_logic_add::updateRelacionesToSave($imagen_estimado,$this);

				if(($this->imagen_estimado->getIsNew() || $this->imagen_estimado->getIsChanged()) && !$this->imagen_estimado->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->imagen_estimado->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//imagen_estimado_logic_add::updateRelacionesToSaveAfter($imagen_estimado,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $imagen_estimados,imagen_estimado_param_return $imagen_estimadoParameterGeneral) : imagen_estimado_param_return {
		$imagen_estimadoReturnGeneral=new imagen_estimado_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $imagen_estimadoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $imagen_estimados,imagen_estimado_param_return $imagen_estimadoParameterGeneral) : imagen_estimado_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_estimadoReturnGeneral=new imagen_estimado_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_estimadoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_estimados,imagen_estimado $imagen_estimado,imagen_estimado_param_return $imagen_estimadoParameterGeneral,bool $isEsNuevoimagen_estimado,array $clases) : imagen_estimado_param_return {
		 try {	
			$imagen_estimadoReturnGeneral=new imagen_estimado_param_return();
	
			$imagen_estimadoReturnGeneral->setimagen_estimado($imagen_estimado);
			$imagen_estimadoReturnGeneral->setimagen_estimados($imagen_estimados);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_estimadoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $imagen_estimadoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_estimados,imagen_estimado $imagen_estimado,imagen_estimado_param_return $imagen_estimadoParameterGeneral,bool $isEsNuevoimagen_estimado,array $clases) : imagen_estimado_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_estimadoReturnGeneral=new imagen_estimado_param_return();
	
			$imagen_estimadoReturnGeneral->setimagen_estimado($imagen_estimado);
			$imagen_estimadoReturnGeneral->setimagen_estimados($imagen_estimados);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_estimadoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_estimadoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_estimados,imagen_estimado $imagen_estimado,imagen_estimado_param_return $imagen_estimadoParameterGeneral,bool $isEsNuevoimagen_estimado,array $clases) : imagen_estimado_param_return {
		 try {	
			$imagen_estimadoReturnGeneral=new imagen_estimado_param_return();
	
			$imagen_estimadoReturnGeneral->setimagen_estimado($imagen_estimado);
			$imagen_estimadoReturnGeneral->setimagen_estimados($imagen_estimados);
			
			
			
			return $imagen_estimadoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_estimados,imagen_estimado $imagen_estimado,imagen_estimado_param_return $imagen_estimadoParameterGeneral,bool $isEsNuevoimagen_estimado,array $clases) : imagen_estimado_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_estimadoReturnGeneral=new imagen_estimado_param_return();
	
			$imagen_estimadoReturnGeneral->setimagen_estimado($imagen_estimado);
			$imagen_estimadoReturnGeneral->setimagen_estimados($imagen_estimados);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_estimadoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,imagen_estimado $imagen_estimado,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,imagen_estimado $imagen_estimado,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		imagen_estimado_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(imagen_estimado $imagen_estimado,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//imagen_estimado_logic_add::updateimagen_estimadoToGet($this->imagen_estimado);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$imagen_estimado->setestimado($this->imagen_estimadoDataAccess->getestimado($this->connexion,$imagen_estimado));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==estimado::$class.'') {
				$imagen_estimado->setestimado($this->imagen_estimadoDataAccess->getestimado($this->connexion,$imagen_estimado));
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
			$imagen_estimado->setestimado($this->imagen_estimadoDataAccess->getestimado($this->connexion,$imagen_estimado));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$imagen_estimado->setestimado($this->imagen_estimadoDataAccess->getestimado($this->connexion,$imagen_estimado));
		$estimadoLogic= new estimado_logic($this->connexion);
		$estimadoLogic->deepLoad($imagen_estimado->getestimado(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==estimado::$class.'') {
				$imagen_estimado->setestimado($this->imagen_estimadoDataAccess->getestimado($this->connexion,$imagen_estimado));
				$estimadoLogic= new estimado_logic($this->connexion);
				$estimadoLogic->deepLoad($imagen_estimado->getestimado(),$isDeep,$deepLoadType,$clases);				
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
			$imagen_estimado->setestimado($this->imagen_estimadoDataAccess->getestimado($this->connexion,$imagen_estimado));
			$estimadoLogic= new estimado_logic($this->connexion);
			$estimadoLogic->deepLoad($imagen_estimado->getestimado(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(imagen_estimado $imagen_estimado,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//imagen_estimado_logic_add::updateimagen_estimadoToSave($this->imagen_estimado);			
			
			if(!$paraDeleteCascade) {				
				imagen_estimado_data::save($imagen_estimado, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		estimado_data::save($imagen_estimado->getestimado(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==estimado::$class.'') {
				estimado_data::save($imagen_estimado->getestimado(),$this->connexion);
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
			estimado_data::save($imagen_estimado->getestimado(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		estimado_data::save($imagen_estimado->getestimado(),$this->connexion);
		$estimadoLogic= new estimado_logic($this->connexion);
		$estimadoLogic->deepSave($imagen_estimado->getestimado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==estimado::$class.'') {
				estimado_data::save($imagen_estimado->getestimado(),$this->connexion);
				$estimadoLogic= new estimado_logic($this->connexion);
				$estimadoLogic->deepSave($imagen_estimado->getestimado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			estimado_data::save($imagen_estimado->getestimado(),$this->connexion);
			$estimadoLogic= new estimado_logic($this->connexion);
			$estimadoLogic->deepSave($imagen_estimado->getestimado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				imagen_estimado_data::save($imagen_estimado, $this->connexion);
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
			
			$this->deepLoad($this->imagen_estimado,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->imagen_estimados as $imagen_estimado) {
				$this->deepLoad($imagen_estimado,$isDeep,$deepLoadType,$clases);
								
				imagen_estimado_util::refrescarFKDescripciones($this->imagen_estimados);
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
			
			foreach($this->imagen_estimados as $imagen_estimado) {
				$this->deepLoad($imagen_estimado,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->imagen_estimado,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->imagen_estimados as $imagen_estimado) {
				$this->deepSave($imagen_estimado,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->imagen_estimados as $imagen_estimado) {
				$this->deepSave($imagen_estimado,$isDeep,$deepLoadType,$clases,false);
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
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==estimado::$class) {
						$classes[]=new Classe(estimado::$class);
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
	
	
	
	
	
	
	
	public function getimagen_estimado() : ?imagen_estimado {	
		/*
		imagen_estimado_logic_add::checkimagen_estimadoToGet($this->imagen_estimado,$this->datosCliente);
		imagen_estimado_logic_add::updateimagen_estimadoToGet($this->imagen_estimado);
		*/
			
		return $this->imagen_estimado;
	}
		
	public function setimagen_estimado(imagen_estimado $newimagen_estimado) {
		$this->imagen_estimado = $newimagen_estimado;
	}
	
	public function getimagen_estimados() : array {		
		/*
		imagen_estimado_logic_add::checkimagen_estimadoToGets($this->imagen_estimados,$this->datosCliente);
		
		foreach ($this->imagen_estimados as $imagen_estimadoLocal ) {
			imagen_estimado_logic_add::updateimagen_estimadoToGet($imagen_estimadoLocal);
		}
		*/
		
		return $this->imagen_estimados;
	}
	
	public function setimagen_estimados(array $newimagen_estimados) {
		$this->imagen_estimados = $newimagen_estimados;
	}
	
	public function getimagen_estimadoDataAccess() : imagen_estimado_data {
		return $this->imagen_estimadoDataAccess;
	}
	
	public function setimagen_estimadoDataAccess(imagen_estimado_data $newimagen_estimadoDataAccess) {
		$this->imagen_estimadoDataAccess = $newimagen_estimadoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        imagen_estimado_carga::$CONTROLLER;;        
		
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
