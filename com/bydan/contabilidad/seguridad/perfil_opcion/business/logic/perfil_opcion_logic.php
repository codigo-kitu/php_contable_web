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

namespace com\bydan\contabilidad\seguridad\perfil_opcion\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_carga;
use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_param_return;

use com\bydan\contabilidad\seguridad\perfil_opcion\presentation\session\perfil_opcion_session;

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

use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_util;
use com\bydan\contabilidad\seguridad\perfil_opcion\business\entity\perfil_opcion;
use com\bydan\contabilidad\seguridad\perfil_opcion\business\data\perfil_opcion_data;

//FK


use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\business\data\perfil_data;
use com\bydan\contabilidad\seguridad\perfil\business\logic\perfil_logic;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;

use com\bydan\contabilidad\seguridad\opcion\business\data\opcion_data;
use com\bydan\contabilidad\seguridad\opcion\business\logic\opcion_logic;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_util;

//REL


//REL DETALLES




class perfil_opcion_logic  extends GeneralEntityLogic implements perfil_opcion_logicI {	
	/*GENERAL*/
	public perfil_opcion_data $perfil_opcionDataAccess;
	//public ?perfil_opcion_logic_add $perfil_opcionLogicAdditional=null;
	public ?perfil_opcion $perfil_opcion;
	public array $perfil_opcions;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->perfil_opcionDataAccess = new perfil_opcion_data();			
			$this->perfil_opcions = array();
			$this->perfil_opcion = new perfil_opcion();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->perfil_opcionLogicAdditional = new perfil_opcion_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->perfil_opcionLogicAdditional==null) {
		//	$this->perfil_opcionLogicAdditional=new perfil_opcion_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->perfil_opcionDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->perfil_opcionDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->perfil_opcionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->perfil_opcionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->perfil_opcions = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_opcions=$this->perfil_opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_opcion_util::refrescarFKDescripciones($this->perfil_opcions);
			}
			
			//perfil_opcion_logic_add::checkperfil_opcionToGets($this->perfil_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_opcions);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->perfil_opcions = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_opcions=$this->perfil_opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_opcion_util::refrescarFKDescripciones($this->perfil_opcions);
			}
			
			//perfil_opcion_logic_add::checkperfil_opcionToGets($this->perfil_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_opcions);
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
		$this->perfil_opcion = new perfil_opcion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->perfil_opcion=$this->perfil_opcionDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->perfil_opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				perfil_opcion_util::refrescarFKDescripcion($this->perfil_opcion);
			}
						
			//perfil_opcion_logic_add::checkperfil_opcionToGet($this->perfil_opcion,$this->datosCliente);
			//perfil_opcion_logic_add::updateperfil_opcionToGet($this->perfil_opcion);
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
		$this->perfil_opcion = new  perfil_opcion();
		  		  
        try {		
			$this->perfil_opcion=$this->perfil_opcionDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->perfil_opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				perfil_opcion_util::refrescarFKDescripcion($this->perfil_opcion);
			}
			
			//perfil_opcion_logic_add::checkperfil_opcionToGet($this->perfil_opcion,$this->datosCliente);
			//perfil_opcion_logic_add::updateperfil_opcionToGet($this->perfil_opcion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?perfil_opcion {
		$perfil_opcionLogic = new  perfil_opcion_logic();
		  		  
        try {		
			$perfil_opcionLogic->setConnexion($connexion);			
			$perfil_opcionLogic->getEntity($id);			
			return $perfil_opcionLogic->getperfil_opcion();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->perfil_opcion = new  perfil_opcion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->perfil_opcion=$this->perfil_opcionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->perfil_opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				perfil_opcion_util::refrescarFKDescripcion($this->perfil_opcion);
			}
			
			//perfil_opcion_logic_add::checkperfil_opcionToGet($this->perfil_opcion,$this->datosCliente);
			//perfil_opcion_logic_add::updateperfil_opcionToGet($this->perfil_opcion);
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
		$this->perfil_opcion = new  perfil_opcion();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_opcion=$this->perfil_opcionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->perfil_opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				perfil_opcion_util::refrescarFKDescripcion($this->perfil_opcion);
			}
			
			//perfil_opcion_logic_add::checkperfil_opcionToGet($this->perfil_opcion,$this->datosCliente);
			//perfil_opcion_logic_add::updateperfil_opcionToGet($this->perfil_opcion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?perfil_opcion {
		$perfil_opcionLogic = new  perfil_opcion_logic();
		  		  
        try {		
			$perfil_opcionLogic->setConnexion($connexion);			
			$perfil_opcionLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $perfil_opcionLogic->getperfil_opcion();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->perfil_opcions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->perfil_opcions=$this->perfil_opcionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_opcion_util::refrescarFKDescripciones($this->perfil_opcions);
			}
			
			//perfil_opcion_logic_add::checkperfil_opcionToGets($this->perfil_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_opcions);			
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
		$this->perfil_opcions = array();
		  		  
        try {			
			$this->perfil_opcions=$this->perfil_opcionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_opcion_util::refrescarFKDescripciones($this->perfil_opcions);
			}
			
			//perfil_opcion_logic_add::checkperfil_opcionToGets($this->perfil_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_opcions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->perfil_opcions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_opcions=$this->perfil_opcionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_opcion_util::refrescarFKDescripciones($this->perfil_opcions);
			}
			
			//perfil_opcion_logic_add::checkperfil_opcionToGets($this->perfil_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_opcions);
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
		$this->perfil_opcions = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_opcions=$this->perfil_opcionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_opcion_util::refrescarFKDescripciones($this->perfil_opcions);
			}
			
			//perfil_opcion_logic_add::checkperfil_opcionToGets($this->perfil_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_opcions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$perfil_opcionLogic = new  perfil_opcion_logic();
		  		  
        try {		
			$perfil_opcionLogic->setConnexion($connexion);			
			$perfil_opcionLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $perfil_opcionLogic->getperfil_opcions();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->perfil_opcions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->perfil_opcions=$this->perfil_opcionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_opcion_util::refrescarFKDescripciones($this->perfil_opcions);
			}
			
			//perfil_opcion_logic_add::checkperfil_opcionToGets($this->perfil_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_opcions);
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
		$this->perfil_opcions = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_opcions=$this->perfil_opcionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_opcion_util::refrescarFKDescripciones($this->perfil_opcions);
			}
			
			//perfil_opcion_logic_add::checkperfil_opcionToGets($this->perfil_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_opcions);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->perfil_opcions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_opcions=$this->perfil_opcionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_opcion_util::refrescarFKDescripciones($this->perfil_opcions);
			}
			
			//perfil_opcion_logic_add::checkperfil_opcionToGets($this->perfil_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_opcions);
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
		$this->perfil_opcions = array();
		  		  
        try {			
			$this->perfil_opcions=$this->perfil_opcionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_opcion_util::refrescarFKDescripciones($this->perfil_opcions);
			}	
			
			//perfil_opcion_logic_add::checkperfil_opcionToGets($this->perfil_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_opcions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->perfil_opcions = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->perfil_opcions=$this->perfil_opcionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_opcion_util::refrescarFKDescripciones($this->perfil_opcions);
			}
			
			//perfil_opcion_logic_add::checkperfil_opcionToGets($this->perfil_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_opcions);
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
		$this->perfil_opcions = array();
		  		  
        try {		
			$this->perfil_opcions=$this->perfil_opcionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_opcion_util::refrescarFKDescripciones($this->perfil_opcions);
			}
			
			//perfil_opcion_logic_add::checkperfil_opcionToGets($this->perfil_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_opcions);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsBusquedaPorIdPerfilPorIdOpcionWithConnection(string $strFinalQuery,Pagination $pagination,int $id_perfil,int $id_opcion) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_perfil= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_perfil->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_perfil,perfil_opcion_util::$ID_PERFIL,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_perfil);

			$parameterSelectionGeneralid_opcion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_opcion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_opcion,perfil_opcion_util::$ID_OPCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_opcion);

			$this->perfil_opcions=$this->perfil_opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_opcion_util::refrescarFKDescripciones($this->perfil_opcions);
			}
			//perfil_opcion_logic_add::checkperfil_opcionToGets($this->perfil_opcions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfil_opcions);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorIdPerfilPorIdOpcion(string $strFinalQuery,Pagination $pagination,int $id_perfil,int $id_opcion) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_perfil= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_perfil->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_perfil,perfil_opcion_util::$ID_PERFIL,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_perfil);

			$parameterSelectionGeneralid_opcion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_opcion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_opcion,perfil_opcion_util::$ID_OPCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_opcion);

			$this->perfil_opcions=$this->perfil_opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_opcion_util::refrescarFKDescripciones($this->perfil_opcions);
			}
			//perfil_opcion_logic_add::checkperfil_opcionToGets($this->perfil_opcions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfil_opcions);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdopcionWithConnection(string $strFinalQuery,Pagination $pagination,int $id_opcion) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_opcion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_opcion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_opcion,perfil_opcion_util::$ID_OPCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_opcion);

			$this->perfil_opcions=$this->perfil_opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_opcion_util::refrescarFKDescripciones($this->perfil_opcions);
			}
			//perfil_opcion_logic_add::checkperfil_opcionToGets($this->perfil_opcions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfil_opcions);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idopcion(string $strFinalQuery,Pagination $pagination,int $id_opcion) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_opcion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_opcion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_opcion,perfil_opcion_util::$ID_OPCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_opcion);

			$this->perfil_opcions=$this->perfil_opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_opcion_util::refrescarFKDescripciones($this->perfil_opcions);
			}
			//perfil_opcion_logic_add::checkperfil_opcionToGets($this->perfil_opcions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfil_opcions);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdperfilWithConnection(string $strFinalQuery,Pagination $pagination,int $id_perfil) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_perfil= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_perfil->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_perfil,perfil_opcion_util::$ID_PERFIL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_perfil);

			$this->perfil_opcions=$this->perfil_opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_opcion_util::refrescarFKDescripciones($this->perfil_opcions);
			}
			//perfil_opcion_logic_add::checkperfil_opcionToGets($this->perfil_opcions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfil_opcions);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idperfil(string $strFinalQuery,Pagination $pagination,int $id_perfil) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_perfil= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_perfil->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_perfil,perfil_opcion_util::$ID_PERFIL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_perfil);

			$this->perfil_opcions=$this->perfil_opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_opcion_util::refrescarFKDescripciones($this->perfil_opcions);
			}
			//perfil_opcion_logic_add::checkperfil_opcionToGets($this->perfil_opcions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfil_opcions);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getPorIdPerfilPorIdOpcionWithConnection(int $id_perfil,int $id_opcion) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$parameterSelectionGeneralid_perfil= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_perfil->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_perfil,perfil_opcion_util::$ID_PERFIL,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_perfil);

			$parameterSelectionGeneralid_opcion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_opcion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_opcion,perfil_opcion_util::$ID_OPCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_opcion);

			$this->perfil_opcion=$this->perfil_opcionDataAccess->getEntityConnexionWhereSelect($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoad($this->perfil_opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());

				perfil_opcion_util::refrescarFKDescripcion($this->perfil_opcion);
			}

			//perfil_opcion_logic_add::checkperfil_opcionToGet($this->perfil_opcion,$this->datosCliente);
			//perfil_opcion_logic_add::updateperfil_opcionToGet($this->perfil_opcion);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();
		}
	}

	public function getPorIdPerfilPorIdOpcion(int $id_perfil,int $id_opcion) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$parameterSelectionGeneralid_perfil= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_perfil->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_perfil,perfil_opcion_util::$ID_PERFIL,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_perfil);

			$parameterSelectionGeneralid_opcion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_opcion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_opcion,perfil_opcion_util::$ID_OPCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_opcion);

			$this->perfil_opcion=$this->perfil_opcionDataAccess->getEntityConnexionWhereSelect($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoad($this->perfil_opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());

				perfil_opcion_util::refrescarFKDescripcion($this->perfil_opcion);
			}

			//perfil_opcion_logic_add::checkperfil_opcionToGet($this->perfil_opcion,$this->datosCliente);
			//perfil_opcion_logic_add::updateperfil_opcionToGet($this->perfil_opcion);
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
						
			//perfil_opcion_logic_add::checkperfil_opcionToSave($this->perfil_opcion,$this->datosCliente,$this->connexion);	       
			//perfil_opcion_logic_add::updateperfil_opcionToSave($this->perfil_opcion);			
			perfil_opcion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->perfil_opcion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->perfil_opcionLogicAdditional->checkGeneralEntityToSave($this,$this->perfil_opcion,$this->datosCliente,$this->connexion);
			
			
			perfil_opcion_data::save($this->perfil_opcion, $this->connexion);	    	       	 				
			//perfil_opcion_logic_add::checkperfil_opcionToSaveAfter($this->perfil_opcion,$this->datosCliente,$this->connexion);			
			//$this->perfil_opcionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->perfil_opcion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->perfil_opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->perfil_opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				perfil_opcion_util::refrescarFKDescripcion($this->perfil_opcion);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->perfil_opcion->getIsDeleted()) {
				$this->perfil_opcion=null;
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
						
			/*perfil_opcion_logic_add::checkperfil_opcionToSave($this->perfil_opcion,$this->datosCliente,$this->connexion);*/	        
			//perfil_opcion_logic_add::updateperfil_opcionToSave($this->perfil_opcion);			
			//$this->perfil_opcionLogicAdditional->checkGeneralEntityToSave($this,$this->perfil_opcion,$this->datosCliente,$this->connexion);			
			perfil_opcion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->perfil_opcion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			perfil_opcion_data::save($this->perfil_opcion, $this->connexion);	    	       	 						
			/*perfil_opcion_logic_add::checkperfil_opcionToSaveAfter($this->perfil_opcion,$this->datosCliente,$this->connexion);*/			
			//$this->perfil_opcionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->perfil_opcion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->perfil_opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->perfil_opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				perfil_opcion_util::refrescarFKDescripcion($this->perfil_opcion);				
			}
			
			if($this->perfil_opcion->getIsDeleted()) {
				$this->perfil_opcion=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(perfil_opcion $perfil_opcion,Connexion $connexion)  {
		$perfil_opcionLogic = new  perfil_opcion_logic();		  		  
        try {		
			$perfil_opcionLogic->setConnexion($connexion);			
			$perfil_opcionLogic->setperfil_opcion($perfil_opcion);			
			$perfil_opcionLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*perfil_opcion_logic_add::checkperfil_opcionToSaves($this->perfil_opcions,$this->datosCliente,$this->connexion);*/	        	
			//$this->perfil_opcionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->perfil_opcions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->perfil_opcions as $perfil_opcionLocal) {				
								
				//perfil_opcion_logic_add::updateperfil_opcionToSave($perfil_opcionLocal);	        	
				perfil_opcion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$perfil_opcionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				perfil_opcion_data::save($perfil_opcionLocal, $this->connexion);				
			}
			
			/*perfil_opcion_logic_add::checkperfil_opcionToSavesAfter($this->perfil_opcions,$this->datosCliente,$this->connexion);*/			
			//$this->perfil_opcionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->perfil_opcions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_opcion_util::refrescarFKDescripciones($this->perfil_opcions);
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
			/*perfil_opcion_logic_add::checkperfil_opcionToSaves($this->perfil_opcions,$this->datosCliente,$this->connexion);*/			
			//$this->perfil_opcionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->perfil_opcions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->perfil_opcions as $perfil_opcionLocal) {				
								
				//perfil_opcion_logic_add::updateperfil_opcionToSave($perfil_opcionLocal);	        	
				perfil_opcion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$perfil_opcionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				perfil_opcion_data::save($perfil_opcionLocal, $this->connexion);				
			}			
			
			/*perfil_opcion_logic_add::checkperfil_opcionToSavesAfter($this->perfil_opcions,$this->datosCliente,$this->connexion);*/			
			//$this->perfil_opcionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->perfil_opcions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_opcion_util::refrescarFKDescripciones($this->perfil_opcions);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $perfil_opcions,Connexion $connexion)  {
		$perfil_opcionLogic = new  perfil_opcion_logic();
		  		  
        try {		
			$perfil_opcionLogic->setConnexion($connexion);			
			$perfil_opcionLogic->setperfil_opcions($perfil_opcions);			
			$perfil_opcionLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$perfil_opcionsAux=array();
		
		foreach($this->perfil_opcions as $perfil_opcion) {
			if($perfil_opcion->getIsDeleted()==false) {
				$perfil_opcionsAux[]=$perfil_opcion;
			}
		}
		
		$this->perfil_opcions=$perfil_opcionsAux;
	}
	
	public function updateToGetsAuxiliar(array &$perfil_opcions) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->perfil_opcions as $perfil_opcion) {
				
				$perfil_opcion->setid_perfil_Descripcion(perfil_opcion_util::getperfilDescripcion($perfil_opcion->getperfil()));
				$perfil_opcion->setid_opcion_Descripcion(perfil_opcion_util::getopcionDescripcion($perfil_opcion->getopcion()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$perfil_opcion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$perfil_opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$perfil_opcion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$perfil_opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$perfil_opcion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$perfil_opcionForeignKey=new perfil_opcion_param_return();//perfil_opcionForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_perfil',$strRecargarFkTipos,',')) {
				$this->cargarCombosperfilsFK($this->connexion,$strRecargarFkQuery,$perfil_opcionForeignKey,$perfil_opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_opcion',$strRecargarFkTipos,',')) {
				$this->cargarCombosopcionsFK($this->connexion,$strRecargarFkQuery,$perfil_opcionForeignKey,$perfil_opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_perfil',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperfilsFK($this->connexion,' where id=-1 ',$perfil_opcionForeignKey,$perfil_opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_opcion',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosopcionsFK($this->connexion,' where id=-1 ',$perfil_opcionForeignKey,$perfil_opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $perfil_opcionForeignKey;
			
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
	
	
	public function cargarCombosperfilsFK($connexion=null,$strRecargarFkQuery='',$perfil_opcionForeignKey,$perfil_opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$perfilLogic= new perfil_logic();
		$pagination= new Pagination();
		$perfil_opcionForeignKey->perfilsFK=array();

		$perfilLogic->setConnexion($connexion);
		$perfilLogic->getperfilDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($perfil_opcion_session==null) {
			$perfil_opcion_session=new perfil_opcion_session();
		}
		
		if($perfil_opcion_session->bitBusquedaDesdeFKSesionperfil!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=perfil_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalperfil=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalperfil=Funciones::GetFinalQueryAppend($finalQueryGlobalperfil, '');
				$finalQueryGlobalperfil.=perfil_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalperfil.$strRecargarFkQuery;		

				$perfilLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($perfilLogic->getperfils() as $perfilLocal ) {
				if($perfil_opcionForeignKey->idperfilDefaultFK==0) {
					$perfil_opcionForeignKey->idperfilDefaultFK=$perfilLocal->getId();
				}

				$perfil_opcionForeignKey->perfilsFK[$perfilLocal->getId()]=perfil_opcion_util::getperfilDescripcion($perfilLocal);
			}

		} else {

			if($perfil_opcion_session->bigidperfilActual!=null && $perfil_opcion_session->bigidperfilActual > 0) {
				$perfilLogic->getEntity($perfil_opcion_session->bigidperfilActual);//WithConnection

				$perfil_opcionForeignKey->perfilsFK[$perfilLogic->getperfil()->getId()]=perfil_opcion_util::getperfilDescripcion($perfilLogic->getperfil());
				$perfil_opcionForeignKey->idperfilDefaultFK=$perfilLogic->getperfil()->getId();
			}
		}
	}

	public function cargarCombosopcionsFK($connexion=null,$strRecargarFkQuery='',$perfil_opcionForeignKey,$perfil_opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$opcionLogic= new opcion_logic();
		$pagination= new Pagination();
		$perfil_opcionForeignKey->opcionsFK=array();

		$opcionLogic->setConnexion($connexion);
		$opcionLogic->getopcionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($perfil_opcion_session==null) {
			$perfil_opcion_session=new perfil_opcion_session();
		}
		
		if($perfil_opcion_session->bitBusquedaDesdeFKSesionopcion!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=opcion_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalopcion=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalopcion=Funciones::GetFinalQueryAppend($finalQueryGlobalopcion, '');
				$finalQueryGlobalopcion.=opcion_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalopcion.$strRecargarFkQuery;		

				$opcionLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($opcionLogic->getopcions() as $opcionLocal ) {
				if($perfil_opcionForeignKey->idopcionDefaultFK==0) {
					$perfil_opcionForeignKey->idopcionDefaultFK=$opcionLocal->getId();
				}

				$perfil_opcionForeignKey->opcionsFK[$opcionLocal->getId()]=perfil_opcion_util::getopcionDescripcion($opcionLocal);
			}

		} else {

			if($perfil_opcion_session->bigidopcionActual!=null && $perfil_opcion_session->bigidopcionActual > 0) {
				$opcionLogic->getEntity($perfil_opcion_session->bigidopcionActual);//WithConnection

				$perfil_opcionForeignKey->opcionsFK[$opcionLogic->getopcion()->getId()]=perfil_opcion_util::getopcionDescripcion($opcionLogic->getopcion());
				$perfil_opcionForeignKey->idopcionDefaultFK=$opcionLogic->getopcion()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($perfil_opcion) {
		$this->saveRelacionesBase($perfil_opcion,true);
	}

	public function saveRelaciones($perfil_opcion) {
		$this->saveRelacionesBase($perfil_opcion,false);
	}

	public function saveRelacionesBase($perfil_opcion,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setperfil_opcion($perfil_opcion);

			if(true) {

				//perfil_opcion_logic_add::updateRelacionesToSave($perfil_opcion,$this);

				if(($this->perfil_opcion->getIsNew() || $this->perfil_opcion->getIsChanged()) && !$this->perfil_opcion->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->perfil_opcion->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//perfil_opcion_logic_add::updateRelacionesToSaveAfter($perfil_opcion,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $perfil_opcions,perfil_opcion_param_return $perfil_opcionParameterGeneral) : perfil_opcion_param_return {
		$perfil_opcionReturnGeneral=new perfil_opcion_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $perfil_opcionReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $perfil_opcions,perfil_opcion_param_return $perfil_opcionParameterGeneral) : perfil_opcion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$perfil_opcionReturnGeneral=new perfil_opcion_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $perfil_opcionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $perfil_opcions,perfil_opcion $perfil_opcion,perfil_opcion_param_return $perfil_opcionParameterGeneral,bool $isEsNuevoperfil_opcion,array $clases) : perfil_opcion_param_return {
		 try {	
			$perfil_opcionReturnGeneral=new perfil_opcion_param_return();
	
			$perfil_opcionReturnGeneral->setperfil_opcion($perfil_opcion);
			$perfil_opcionReturnGeneral->setperfil_opcions($perfil_opcions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$perfil_opcionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $perfil_opcionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $perfil_opcions,perfil_opcion $perfil_opcion,perfil_opcion_param_return $perfil_opcionParameterGeneral,bool $isEsNuevoperfil_opcion,array $clases) : perfil_opcion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$perfil_opcionReturnGeneral=new perfil_opcion_param_return();
	
			$perfil_opcionReturnGeneral->setperfil_opcion($perfil_opcion);
			$perfil_opcionReturnGeneral->setperfil_opcions($perfil_opcions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$perfil_opcionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $perfil_opcionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $perfil_opcions,perfil_opcion $perfil_opcion,perfil_opcion_param_return $perfil_opcionParameterGeneral,bool $isEsNuevoperfil_opcion,array $clases) : perfil_opcion_param_return {
		 try {	
			$perfil_opcionReturnGeneral=new perfil_opcion_param_return();
	
			$perfil_opcionReturnGeneral->setperfil_opcion($perfil_opcion);
			$perfil_opcionReturnGeneral->setperfil_opcions($perfil_opcions);
			
			
			
			return $perfil_opcionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $perfil_opcions,perfil_opcion $perfil_opcion,perfil_opcion_param_return $perfil_opcionParameterGeneral,bool $isEsNuevoperfil_opcion,array $clases) : perfil_opcion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$perfil_opcionReturnGeneral=new perfil_opcion_param_return();
	
			$perfil_opcionReturnGeneral->setperfil_opcion($perfil_opcion);
			$perfil_opcionReturnGeneral->setperfil_opcions($perfil_opcions);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $perfil_opcionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,perfil_opcion $perfil_opcion,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,perfil_opcion $perfil_opcion,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		perfil_opcion_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(perfil_opcion $perfil_opcion,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//perfil_opcion_logic_add::updateperfil_opcionToGet($this->perfil_opcion);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$perfil_opcion->setperfil($this->perfil_opcionDataAccess->getperfil($this->connexion,$perfil_opcion));
		$perfil_opcion->setopcion($this->perfil_opcionDataAccess->getopcion($this->connexion,$perfil_opcion));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class.'') {
				$perfil_opcion->setperfil($this->perfil_opcionDataAccess->getperfil($this->connexion,$perfil_opcion));
				continue;
			}

			if($clas->clas==opcion::$class.'') {
				$perfil_opcion->setopcion($this->perfil_opcionDataAccess->getopcion($this->connexion,$perfil_opcion));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$perfil_opcion->setperfil($this->perfil_opcionDataAccess->getperfil($this->connexion,$perfil_opcion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$perfil_opcion->setopcion($this->perfil_opcionDataAccess->getopcion($this->connexion,$perfil_opcion));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$perfil_opcion->setperfil($this->perfil_opcionDataAccess->getperfil($this->connexion,$perfil_opcion));
		$perfilLogic= new perfil_logic($this->connexion);
		$perfilLogic->deepLoad($perfil_opcion->getperfil(),$isDeep,$deepLoadType,$clases);
				
		$perfil_opcion->setopcion($this->perfil_opcionDataAccess->getopcion($this->connexion,$perfil_opcion));
		$opcionLogic= new opcion_logic($this->connexion);
		$opcionLogic->deepLoad($perfil_opcion->getopcion(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class.'') {
				$perfil_opcion->setperfil($this->perfil_opcionDataAccess->getperfil($this->connexion,$perfil_opcion));
				$perfilLogic= new perfil_logic($this->connexion);
				$perfilLogic->deepLoad($perfil_opcion->getperfil(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==opcion::$class.'') {
				$perfil_opcion->setopcion($this->perfil_opcionDataAccess->getopcion($this->connexion,$perfil_opcion));
				$opcionLogic= new opcion_logic($this->connexion);
				$opcionLogic->deepLoad($perfil_opcion->getopcion(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==perfil::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$perfil_opcion->setperfil($this->perfil_opcionDataAccess->getperfil($this->connexion,$perfil_opcion));
			$perfilLogic= new perfil_logic($this->connexion);
			$perfilLogic->deepLoad($perfil_opcion->getperfil(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$perfil_opcion->setopcion($this->perfil_opcionDataAccess->getopcion($this->connexion,$perfil_opcion));
			$opcionLogic= new opcion_logic($this->connexion);
			$opcionLogic->deepLoad($perfil_opcion->getopcion(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(perfil_opcion $perfil_opcion,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//perfil_opcion_logic_add::updateperfil_opcionToSave($this->perfil_opcion);			
			
			if(!$paraDeleteCascade) {				
				perfil_opcion_data::save($perfil_opcion, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		perfil_data::save($perfil_opcion->getperfil(),$this->connexion);
		opcion_data::save($perfil_opcion->getopcion(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class.'') {
				perfil_data::save($perfil_opcion->getperfil(),$this->connexion);
				continue;
			}

			if($clas->clas==opcion::$class.'') {
				opcion_data::save($perfil_opcion->getopcion(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==perfil::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			perfil_data::save($perfil_opcion->getperfil(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			opcion_data::save($perfil_opcion->getopcion(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		perfil_data::save($perfil_opcion->getperfil(),$this->connexion);
		$perfilLogic= new perfil_logic($this->connexion);
		$perfilLogic->deepSave($perfil_opcion->getperfil(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		opcion_data::save($perfil_opcion->getopcion(),$this->connexion);
		$opcionLogic= new opcion_logic($this->connexion);
		$opcionLogic->deepSave($perfil_opcion->getopcion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class.'') {
				perfil_data::save($perfil_opcion->getperfil(),$this->connexion);
				$perfilLogic= new perfil_logic($this->connexion);
				$perfilLogic->deepSave($perfil_opcion->getperfil(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==opcion::$class.'') {
				opcion_data::save($perfil_opcion->getopcion(),$this->connexion);
				$opcionLogic= new opcion_logic($this->connexion);
				$opcionLogic->deepSave($perfil_opcion->getopcion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==perfil::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			perfil_data::save($perfil_opcion->getperfil(),$this->connexion);
			$perfilLogic= new perfil_logic($this->connexion);
			$perfilLogic->deepSave($perfil_opcion->getperfil(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			opcion_data::save($perfil_opcion->getopcion(),$this->connexion);
			$opcionLogic= new opcion_logic($this->connexion);
			$opcionLogic->deepSave($perfil_opcion->getopcion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				perfil_opcion_data::save($perfil_opcion, $this->connexion);
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
			
			$this->deepLoad($this->perfil_opcion,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->perfil_opcions as $perfil_opcion) {
				$this->deepLoad($perfil_opcion,$isDeep,$deepLoadType,$clases);
								
				perfil_opcion_util::refrescarFKDescripciones($this->perfil_opcions);
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
			
			foreach($this->perfil_opcions as $perfil_opcion) {
				$this->deepLoad($perfil_opcion,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->perfil_opcion,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->perfil_opcions as $perfil_opcion) {
				$this->deepSave($perfil_opcion,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->perfil_opcions as $perfil_opcion) {
				$this->deepSave($perfil_opcion,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(perfil::$class);
				$classes[]=new Classe(opcion::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==perfil::$class) {
						$classes[]=new Classe(perfil::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==opcion::$class) {
						$classes[]=new Classe(opcion::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==perfil::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(perfil::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==opcion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(opcion::$class);
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
	
	
	
	
	
	
	
	public function getperfil_opcion() : ?perfil_opcion {	
		/*
		perfil_opcion_logic_add::checkperfil_opcionToGet($this->perfil_opcion,$this->datosCliente);
		perfil_opcion_logic_add::updateperfil_opcionToGet($this->perfil_opcion);
		*/
			
		return $this->perfil_opcion;
	}
		
	public function setperfil_opcion(perfil_opcion $newperfil_opcion) {
		$this->perfil_opcion = $newperfil_opcion;
	}
	
	public function getperfil_opcions() : array {		
		/*
		perfil_opcion_logic_add::checkperfil_opcionToGets($this->perfil_opcions,$this->datosCliente);
		
		foreach ($this->perfil_opcions as $perfil_opcionLocal ) {
			perfil_opcion_logic_add::updateperfil_opcionToGet($perfil_opcionLocal);
		}
		*/
		
		return $this->perfil_opcions;
	}
	
	public function setperfil_opcions(array $newperfil_opcions) {
		$this->perfil_opcions = $newperfil_opcions;
	}
	
	public function getperfil_opcionDataAccess() : perfil_opcion_data {
		return $this->perfil_opcionDataAccess;
	}
	
	public function setperfil_opcionDataAccess(perfil_opcion_data $newperfil_opcionDataAccess) {
		$this->perfil_opcionDataAccess = $newperfil_opcionDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        perfil_opcion_carga::$CONTROLLER;;        
		
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
