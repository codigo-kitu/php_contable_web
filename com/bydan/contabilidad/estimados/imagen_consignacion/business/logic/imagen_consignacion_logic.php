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

namespace com\bydan\contabilidad\estimados\imagen_consignacion\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\estimados\imagen_consignacion\util\imagen_consignacion_carga;
use com\bydan\contabilidad\estimados\imagen_consignacion\util\imagen_consignacion_param_return;

use com\bydan\contabilidad\estimados\imagen_consignacion\presentation\session\imagen_consignacion_session;

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

use com\bydan\contabilidad\estimados\imagen_consignacion\util\imagen_consignacion_util;
use com\bydan\contabilidad\estimados\imagen_consignacion\business\entity\imagen_consignacion;
use com\bydan\contabilidad\estimados\imagen_consignacion\business\data\imagen_consignacion_data;

//FK


use com\bydan\contabilidad\estimados\consignacion\business\entity\consignacion;
use com\bydan\contabilidad\estimados\consignacion\business\data\consignacion_data;
use com\bydan\contabilidad\estimados\consignacion\business\logic\consignacion_logic;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;

//REL


//REL DETALLES




class imagen_consignacion_logic  extends GeneralEntityLogic implements imagen_consignacion_logicI {	
	/*GENERAL*/
	public imagen_consignacion_data $imagen_consignacionDataAccess;
	//public ?imagen_consignacion_logic_add $imagen_consignacionLogicAdditional=null;
	public ?imagen_consignacion $imagen_consignacion;
	public array $imagen_consignacions;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->imagen_consignacionDataAccess = new imagen_consignacion_data();			
			$this->imagen_consignacions = array();
			$this->imagen_consignacion = new imagen_consignacion();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->imagen_consignacionLogicAdditional = new imagen_consignacion_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->imagen_consignacionLogicAdditional==null) {
		//	$this->imagen_consignacionLogicAdditional=new imagen_consignacion_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->imagen_consignacionDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->imagen_consignacionDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->imagen_consignacionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->imagen_consignacionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_consignacions = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_consignacions=$this->imagen_consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_consignacion_util::refrescarFKDescripciones($this->imagen_consignacions);
			}
			
			//imagen_consignacion_logic_add::checkimagen_consignacionToGets($this->imagen_consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_consignacions);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_consignacions = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_consignacions=$this->imagen_consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_consignacion_util::refrescarFKDescripciones($this->imagen_consignacions);
			}
			
			//imagen_consignacion_logic_add::checkimagen_consignacionToGets($this->imagen_consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_consignacions);
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
		$this->imagen_consignacion = new imagen_consignacion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->imagen_consignacion=$this->imagen_consignacionDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_consignacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_consignacion_util::refrescarFKDescripcion($this->imagen_consignacion);
			}
						
			//imagen_consignacion_logic_add::checkimagen_consignacionToGet($this->imagen_consignacion,$this->datosCliente);
			//imagen_consignacion_logic_add::updateimagen_consignacionToGet($this->imagen_consignacion);
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
		$this->imagen_consignacion = new  imagen_consignacion();
		  		  
        try {		
			$this->imagen_consignacion=$this->imagen_consignacionDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_consignacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_consignacion_util::refrescarFKDescripcion($this->imagen_consignacion);
			}
			
			//imagen_consignacion_logic_add::checkimagen_consignacionToGet($this->imagen_consignacion,$this->datosCliente);
			//imagen_consignacion_logic_add::updateimagen_consignacionToGet($this->imagen_consignacion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?imagen_consignacion {
		$imagen_consignacionLogic = new  imagen_consignacion_logic();
		  		  
        try {		
			$imagen_consignacionLogic->setConnexion($connexion);			
			$imagen_consignacionLogic->getEntity($id);			
			return $imagen_consignacionLogic->getimagen_consignacion();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->imagen_consignacion = new  imagen_consignacion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->imagen_consignacion=$this->imagen_consignacionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_consignacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_consignacion_util::refrescarFKDescripcion($this->imagen_consignacion);
			}
			
			//imagen_consignacion_logic_add::checkimagen_consignacionToGet($this->imagen_consignacion,$this->datosCliente);
			//imagen_consignacion_logic_add::updateimagen_consignacionToGet($this->imagen_consignacion);
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
		$this->imagen_consignacion = new  imagen_consignacion();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_consignacion=$this->imagen_consignacionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_consignacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_consignacion_util::refrescarFKDescripcion($this->imagen_consignacion);
			}
			
			//imagen_consignacion_logic_add::checkimagen_consignacionToGet($this->imagen_consignacion,$this->datosCliente);
			//imagen_consignacion_logic_add::updateimagen_consignacionToGet($this->imagen_consignacion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?imagen_consignacion {
		$imagen_consignacionLogic = new  imagen_consignacion_logic();
		  		  
        try {		
			$imagen_consignacionLogic->setConnexion($connexion);			
			$imagen_consignacionLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $imagen_consignacionLogic->getimagen_consignacion();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_consignacions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_consignacions=$this->imagen_consignacionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_consignacion_util::refrescarFKDescripciones($this->imagen_consignacions);
			}
			
			//imagen_consignacion_logic_add::checkimagen_consignacionToGets($this->imagen_consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_consignacions);			
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
		$this->imagen_consignacions = array();
		  		  
        try {			
			$this->imagen_consignacions=$this->imagen_consignacionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_consignacion_util::refrescarFKDescripciones($this->imagen_consignacions);
			}
			
			//imagen_consignacion_logic_add::checkimagen_consignacionToGets($this->imagen_consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_consignacions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->imagen_consignacions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_consignacions=$this->imagen_consignacionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_consignacion_util::refrescarFKDescripciones($this->imagen_consignacions);
			}
			
			//imagen_consignacion_logic_add::checkimagen_consignacionToGets($this->imagen_consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_consignacions);
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
		$this->imagen_consignacions = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_consignacions=$this->imagen_consignacionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_consignacion_util::refrescarFKDescripciones($this->imagen_consignacions);
			}
			
			//imagen_consignacion_logic_add::checkimagen_consignacionToGets($this->imagen_consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_consignacions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$imagen_consignacionLogic = new  imagen_consignacion_logic();
		  		  
        try {		
			$imagen_consignacionLogic->setConnexion($connexion);			
			$imagen_consignacionLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $imagen_consignacionLogic->getimagen_consignacions();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->imagen_consignacions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_consignacions=$this->imagen_consignacionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_consignacion_util::refrescarFKDescripciones($this->imagen_consignacions);
			}
			
			//imagen_consignacion_logic_add::checkimagen_consignacionToGets($this->imagen_consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_consignacions);
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
		$this->imagen_consignacions = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_consignacions=$this->imagen_consignacionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_consignacion_util::refrescarFKDescripciones($this->imagen_consignacions);
			}
			
			//imagen_consignacion_logic_add::checkimagen_consignacionToGets($this->imagen_consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_consignacions);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->imagen_consignacions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_consignacions=$this->imagen_consignacionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_consignacion_util::refrescarFKDescripciones($this->imagen_consignacions);
			}
			
			//imagen_consignacion_logic_add::checkimagen_consignacionToGets($this->imagen_consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_consignacions);
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
		$this->imagen_consignacions = array();
		  		  
        try {			
			$this->imagen_consignacions=$this->imagen_consignacionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_consignacion_util::refrescarFKDescripciones($this->imagen_consignacions);
			}	
			
			//imagen_consignacion_logic_add::checkimagen_consignacionToGets($this->imagen_consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_consignacions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_consignacions = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_consignacions=$this->imagen_consignacionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_consignacion_util::refrescarFKDescripciones($this->imagen_consignacions);
			}
			
			//imagen_consignacion_logic_add::checkimagen_consignacionToGets($this->imagen_consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_consignacions);
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
		$this->imagen_consignacions = array();
		  		  
        try {		
			$this->imagen_consignacions=$this->imagen_consignacionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_consignacion_util::refrescarFKDescripciones($this->imagen_consignacions);
			}
			
			//imagen_consignacion_logic_add::checkimagen_consignacionToGets($this->imagen_consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_consignacions);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdconsignacionWithConnection(string $strFinalQuery,Pagination $pagination,int $id_consignacion) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_consignacion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_consignacion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_consignacion,imagen_consignacion_util::$ID_CONSIGNACION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_consignacion);

			$this->imagen_consignacions=$this->imagen_consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				imagen_consignacion_util::refrescarFKDescripciones($this->imagen_consignacions);
			}
			//imagen_consignacion_logic_add::checkimagen_consignacionToGets($this->imagen_consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->imagen_consignacions);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idconsignacion(string $strFinalQuery,Pagination $pagination,int $id_consignacion) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_consignacion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_consignacion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_consignacion,imagen_consignacion_util::$ID_CONSIGNACION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_consignacion);

			$this->imagen_consignacions=$this->imagen_consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				imagen_consignacion_util::refrescarFKDescripciones($this->imagen_consignacions);
			}
			//imagen_consignacion_logic_add::checkimagen_consignacionToGets($this->imagen_consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->imagen_consignacions);
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
						
			//imagen_consignacion_logic_add::checkimagen_consignacionToSave($this->imagen_consignacion,$this->datosCliente,$this->connexion);	       
			//imagen_consignacion_logic_add::updateimagen_consignacionToSave($this->imagen_consignacion);			
			imagen_consignacion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_consignacion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->imagen_consignacionLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_consignacion,$this->datosCliente,$this->connexion);
			
			
			imagen_consignacion_data::save($this->imagen_consignacion, $this->connexion);	    	       	 				
			//imagen_consignacion_logic_add::checkimagen_consignacionToSaveAfter($this->imagen_consignacion,$this->datosCliente,$this->connexion);			
			//$this->imagen_consignacionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_consignacion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_consignacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_consignacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_consignacion_util::refrescarFKDescripcion($this->imagen_consignacion);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->imagen_consignacion->getIsDeleted()) {
				$this->imagen_consignacion=null;
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
						
			/*imagen_consignacion_logic_add::checkimagen_consignacionToSave($this->imagen_consignacion,$this->datosCliente,$this->connexion);*/	        
			//imagen_consignacion_logic_add::updateimagen_consignacionToSave($this->imagen_consignacion);			
			//$this->imagen_consignacionLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_consignacion,$this->datosCliente,$this->connexion);			
			imagen_consignacion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_consignacion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			imagen_consignacion_data::save($this->imagen_consignacion, $this->connexion);	    	       	 						
			/*imagen_consignacion_logic_add::checkimagen_consignacionToSaveAfter($this->imagen_consignacion,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_consignacionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_consignacion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_consignacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_consignacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_consignacion_util::refrescarFKDescripcion($this->imagen_consignacion);				
			}
			
			if($this->imagen_consignacion->getIsDeleted()) {
				$this->imagen_consignacion=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(imagen_consignacion $imagen_consignacion,Connexion $connexion)  {
		$imagen_consignacionLogic = new  imagen_consignacion_logic();		  		  
        try {		
			$imagen_consignacionLogic->setConnexion($connexion);			
			$imagen_consignacionLogic->setimagen_consignacion($imagen_consignacion);			
			$imagen_consignacionLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*imagen_consignacion_logic_add::checkimagen_consignacionToSaves($this->imagen_consignacions,$this->datosCliente,$this->connexion);*/	        	
			//$this->imagen_consignacionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_consignacions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_consignacions as $imagen_consignacionLocal) {				
								
				//imagen_consignacion_logic_add::updateimagen_consignacionToSave($imagen_consignacionLocal);	        	
				imagen_consignacion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_consignacionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				imagen_consignacion_data::save($imagen_consignacionLocal, $this->connexion);				
			}
			
			/*imagen_consignacion_logic_add::checkimagen_consignacionToSavesAfter($this->imagen_consignacions,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_consignacionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_consignacions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_consignacion_util::refrescarFKDescripciones($this->imagen_consignacions);
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
			/*imagen_consignacion_logic_add::checkimagen_consignacionToSaves($this->imagen_consignacions,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_consignacionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_consignacions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_consignacions as $imagen_consignacionLocal) {				
								
				//imagen_consignacion_logic_add::updateimagen_consignacionToSave($imagen_consignacionLocal);	        	
				imagen_consignacion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_consignacionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				imagen_consignacion_data::save($imagen_consignacionLocal, $this->connexion);				
			}			
			
			/*imagen_consignacion_logic_add::checkimagen_consignacionToSavesAfter($this->imagen_consignacions,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_consignacionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_consignacions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_consignacion_util::refrescarFKDescripciones($this->imagen_consignacions);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $imagen_consignacions,Connexion $connexion)  {
		$imagen_consignacionLogic = new  imagen_consignacion_logic();
		  		  
        try {		
			$imagen_consignacionLogic->setConnexion($connexion);			
			$imagen_consignacionLogic->setimagen_consignacions($imagen_consignacions);			
			$imagen_consignacionLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$imagen_consignacionsAux=array();
		
		foreach($this->imagen_consignacions as $imagen_consignacion) {
			if($imagen_consignacion->getIsDeleted()==false) {
				$imagen_consignacionsAux[]=$imagen_consignacion;
			}
		}
		
		$this->imagen_consignacions=$imagen_consignacionsAux;
	}
	
	public function updateToGetsAuxiliar(array &$imagen_consignacions) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->imagen_consignacions as $imagen_consignacion) {
				
				$imagen_consignacion->setid_consignacion_Descripcion(imagen_consignacion_util::getconsignacionDescripcion($imagen_consignacion->getconsignacion()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_consignacion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$imagen_consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_consignacion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$imagen_consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_consignacion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$imagen_consignacionForeignKey=new imagen_consignacion_param_return();//imagen_consignacionForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_consignacion',$strRecargarFkTipos,',')) {
				$this->cargarCombosconsignacionsFK($this->connexion,$strRecargarFkQuery,$imagen_consignacionForeignKey,$imagen_consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_consignacion',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosconsignacionsFK($this->connexion,' where id=-1 ',$imagen_consignacionForeignKey,$imagen_consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $imagen_consignacionForeignKey;
			
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
	
	
	public function cargarCombosconsignacionsFK($connexion=null,$strRecargarFkQuery='',$imagen_consignacionForeignKey,$imagen_consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$consignacionLogic= new consignacion_logic();
		$pagination= new Pagination();
		$imagen_consignacionForeignKey->consignacionsFK=array();

		$consignacionLogic->setConnexion($connexion);
		$consignacionLogic->getconsignacionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($imagen_consignacion_session==null) {
			$imagen_consignacion_session=new imagen_consignacion_session();
		}
		
		if($imagen_consignacion_session->bitBusquedaDesdeFKSesionconsignacion!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=consignacion_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalconsignacion=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalconsignacion=Funciones::GetFinalQueryAppend($finalQueryGlobalconsignacion, '');
				$finalQueryGlobalconsignacion.=consignacion_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalconsignacion.$strRecargarFkQuery;		

				$consignacionLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($consignacionLogic->getconsignacions() as $consignacionLocal ) {
				if($imagen_consignacionForeignKey->idconsignacionDefaultFK==0) {
					$imagen_consignacionForeignKey->idconsignacionDefaultFK=$consignacionLocal->getId();
				}

				$imagen_consignacionForeignKey->consignacionsFK[$consignacionLocal->getId()]=imagen_consignacion_util::getconsignacionDescripcion($consignacionLocal);
			}

		} else {

			if($imagen_consignacion_session->bigidconsignacionActual!=null && $imagen_consignacion_session->bigidconsignacionActual > 0) {
				$consignacionLogic->getEntity($imagen_consignacion_session->bigidconsignacionActual);//WithConnection

				$imagen_consignacionForeignKey->consignacionsFK[$consignacionLogic->getconsignacion()->getId()]=imagen_consignacion_util::getconsignacionDescripcion($consignacionLogic->getconsignacion());
				$imagen_consignacionForeignKey->idconsignacionDefaultFK=$consignacionLogic->getconsignacion()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($imagen_consignacion) {
		$this->saveRelacionesBase($imagen_consignacion,true);
	}

	public function saveRelaciones($imagen_consignacion) {
		$this->saveRelacionesBase($imagen_consignacion,false);
	}

	public function saveRelacionesBase($imagen_consignacion,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setimagen_consignacion($imagen_consignacion);

			if(true) {

				//imagen_consignacion_logic_add::updateRelacionesToSave($imagen_consignacion,$this);

				if(($this->imagen_consignacion->getIsNew() || $this->imagen_consignacion->getIsChanged()) && !$this->imagen_consignacion->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->imagen_consignacion->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//imagen_consignacion_logic_add::updateRelacionesToSaveAfter($imagen_consignacion,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $imagen_consignacions,imagen_consignacion_param_return $imagen_consignacionParameterGeneral) : imagen_consignacion_param_return {
		$imagen_consignacionReturnGeneral=new imagen_consignacion_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $imagen_consignacionReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $imagen_consignacions,imagen_consignacion_param_return $imagen_consignacionParameterGeneral) : imagen_consignacion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_consignacionReturnGeneral=new imagen_consignacion_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_consignacionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_consignacions,imagen_consignacion $imagen_consignacion,imagen_consignacion_param_return $imagen_consignacionParameterGeneral,bool $isEsNuevoimagen_consignacion,array $clases) : imagen_consignacion_param_return {
		 try {	
			$imagen_consignacionReturnGeneral=new imagen_consignacion_param_return();
	
			$imagen_consignacionReturnGeneral->setimagen_consignacion($imagen_consignacion);
			$imagen_consignacionReturnGeneral->setimagen_consignacions($imagen_consignacions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_consignacionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $imagen_consignacionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_consignacions,imagen_consignacion $imagen_consignacion,imagen_consignacion_param_return $imagen_consignacionParameterGeneral,bool $isEsNuevoimagen_consignacion,array $clases) : imagen_consignacion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_consignacionReturnGeneral=new imagen_consignacion_param_return();
	
			$imagen_consignacionReturnGeneral->setimagen_consignacion($imagen_consignacion);
			$imagen_consignacionReturnGeneral->setimagen_consignacions($imagen_consignacions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_consignacionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_consignacionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_consignacions,imagen_consignacion $imagen_consignacion,imagen_consignacion_param_return $imagen_consignacionParameterGeneral,bool $isEsNuevoimagen_consignacion,array $clases) : imagen_consignacion_param_return {
		 try {	
			$imagen_consignacionReturnGeneral=new imagen_consignacion_param_return();
	
			$imagen_consignacionReturnGeneral->setimagen_consignacion($imagen_consignacion);
			$imagen_consignacionReturnGeneral->setimagen_consignacions($imagen_consignacions);
			
			
			
			return $imagen_consignacionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_consignacions,imagen_consignacion $imagen_consignacion,imagen_consignacion_param_return $imagen_consignacionParameterGeneral,bool $isEsNuevoimagen_consignacion,array $clases) : imagen_consignacion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_consignacionReturnGeneral=new imagen_consignacion_param_return();
	
			$imagen_consignacionReturnGeneral->setimagen_consignacion($imagen_consignacion);
			$imagen_consignacionReturnGeneral->setimagen_consignacions($imagen_consignacions);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_consignacionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,imagen_consignacion $imagen_consignacion,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,imagen_consignacion $imagen_consignacion,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		imagen_consignacion_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(imagen_consignacion $imagen_consignacion,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//imagen_consignacion_logic_add::updateimagen_consignacionToGet($this->imagen_consignacion);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$imagen_consignacion->setconsignacion($this->imagen_consignacionDataAccess->getconsignacion($this->connexion,$imagen_consignacion));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class.'') {
				$imagen_consignacion->setconsignacion($this->imagen_consignacionDataAccess->getconsignacion($this->connexion,$imagen_consignacion));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$imagen_consignacion->setconsignacion($this->imagen_consignacionDataAccess->getconsignacion($this->connexion,$imagen_consignacion));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$imagen_consignacion->setconsignacion($this->imagen_consignacionDataAccess->getconsignacion($this->connexion,$imagen_consignacion));
		$consignacionLogic= new consignacion_logic($this->connexion);
		$consignacionLogic->deepLoad($imagen_consignacion->getconsignacion(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class.'') {
				$imagen_consignacion->setconsignacion($this->imagen_consignacionDataAccess->getconsignacion($this->connexion,$imagen_consignacion));
				$consignacionLogic= new consignacion_logic($this->connexion);
				$consignacionLogic->deepLoad($imagen_consignacion->getconsignacion(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$imagen_consignacion->setconsignacion($this->imagen_consignacionDataAccess->getconsignacion($this->connexion,$imagen_consignacion));
			$consignacionLogic= new consignacion_logic($this->connexion);
			$consignacionLogic->deepLoad($imagen_consignacion->getconsignacion(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(imagen_consignacion $imagen_consignacion,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//imagen_consignacion_logic_add::updateimagen_consignacionToSave($this->imagen_consignacion);			
			
			if(!$paraDeleteCascade) {				
				imagen_consignacion_data::save($imagen_consignacion, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		consignacion_data::save($imagen_consignacion->getconsignacion(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class.'') {
				consignacion_data::save($imagen_consignacion->getconsignacion(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			consignacion_data::save($imagen_consignacion->getconsignacion(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		consignacion_data::save($imagen_consignacion->getconsignacion(),$this->connexion);
		$consignacionLogic= new consignacion_logic($this->connexion);
		$consignacionLogic->deepSave($imagen_consignacion->getconsignacion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class.'') {
				consignacion_data::save($imagen_consignacion->getconsignacion(),$this->connexion);
				$consignacionLogic= new consignacion_logic($this->connexion);
				$consignacionLogic->deepSave($imagen_consignacion->getconsignacion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			consignacion_data::save($imagen_consignacion->getconsignacion(),$this->connexion);
			$consignacionLogic= new consignacion_logic($this->connexion);
			$consignacionLogic->deepSave($imagen_consignacion->getconsignacion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				imagen_consignacion_data::save($imagen_consignacion, $this->connexion);
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
			
			$this->deepLoad($this->imagen_consignacion,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->imagen_consignacions as $imagen_consignacion) {
				$this->deepLoad($imagen_consignacion,$isDeep,$deepLoadType,$clases);
								
				imagen_consignacion_util::refrescarFKDescripciones($this->imagen_consignacions);
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
			
			foreach($this->imagen_consignacions as $imagen_consignacion) {
				$this->deepLoad($imagen_consignacion,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->imagen_consignacion,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->imagen_consignacions as $imagen_consignacion) {
				$this->deepSave($imagen_consignacion,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->imagen_consignacions as $imagen_consignacion) {
				$this->deepSave($imagen_consignacion,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(consignacion::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==consignacion::$class) {
						$classes[]=new Classe(consignacion::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
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
	
	
	
	
	
	
	
	public function getimagen_consignacion() : ?imagen_consignacion {	
		/*
		imagen_consignacion_logic_add::checkimagen_consignacionToGet($this->imagen_consignacion,$this->datosCliente);
		imagen_consignacion_logic_add::updateimagen_consignacionToGet($this->imagen_consignacion);
		*/
			
		return $this->imagen_consignacion;
	}
		
	public function setimagen_consignacion(imagen_consignacion $newimagen_consignacion) {
		$this->imagen_consignacion = $newimagen_consignacion;
	}
	
	public function getimagen_consignacions() : array {		
		/*
		imagen_consignacion_logic_add::checkimagen_consignacionToGets($this->imagen_consignacions,$this->datosCliente);
		
		foreach ($this->imagen_consignacions as $imagen_consignacionLocal ) {
			imagen_consignacion_logic_add::updateimagen_consignacionToGet($imagen_consignacionLocal);
		}
		*/
		
		return $this->imagen_consignacions;
	}
	
	public function setimagen_consignacions(array $newimagen_consignacions) {
		$this->imagen_consignacions = $newimagen_consignacions;
	}
	
	public function getimagen_consignacionDataAccess() : imagen_consignacion_data {
		return $this->imagen_consignacionDataAccess;
	}
	
	public function setimagen_consignacionDataAccess(imagen_consignacion_data $newimagen_consignacionDataAccess) {
		$this->imagen_consignacionDataAccess = $newimagen_consignacionDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        imagen_consignacion_carga::$CONTROLLER;;        
		
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
