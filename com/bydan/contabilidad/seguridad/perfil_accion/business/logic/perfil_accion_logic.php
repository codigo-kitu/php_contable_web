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

namespace com\bydan\contabilidad\seguridad\perfil_accion\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\perfil_accion\util\perfil_accion_carga;
use com\bydan\contabilidad\seguridad\perfil_accion\util\perfil_accion_param_return;

use com\bydan\contabilidad\seguridad\perfil_accion\presentation\session\perfil_accion_session;

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

use com\bydan\contabilidad\seguridad\perfil_accion\util\perfil_accion_util;
use com\bydan\contabilidad\seguridad\perfil_accion\business\entity\perfil_accion;
use com\bydan\contabilidad\seguridad\perfil_accion\business\data\perfil_accion_data;

//FK


use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\business\data\perfil_data;
use com\bydan\contabilidad\seguridad\perfil\business\logic\perfil_logic;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;

use com\bydan\contabilidad\seguridad\accion\business\entity\accion;
use com\bydan\contabilidad\seguridad\accion\business\data\accion_data;
use com\bydan\contabilidad\seguridad\accion\business\logic\accion_logic;
use com\bydan\contabilidad\seguridad\accion\util\accion_util;

//REL


//REL DETALLES




class perfil_accion_logic  extends GeneralEntityLogic implements perfil_accion_logicI {	
	/*GENERAL*/
	public perfil_accion_data $perfil_accionDataAccess;
	//public ?perfil_accion_logic_add $perfil_accionLogicAdditional=null;
	public ?perfil_accion $perfil_accion;
	public array $perfil_accions;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->perfil_accionDataAccess = new perfil_accion_data();			
			$this->perfil_accions = array();
			$this->perfil_accion = new perfil_accion();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->perfil_accionLogicAdditional = new perfil_accion_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->perfil_accionLogicAdditional==null) {
		//	$this->perfil_accionLogicAdditional=new perfil_accion_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->perfil_accionDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->perfil_accionDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->perfil_accionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->perfil_accionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->perfil_accions = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_accions=$this->perfil_accionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_accion_util::refrescarFKDescripciones($this->perfil_accions);
			}
			
			//perfil_accion_logic_add::checkperfil_accionToGets($this->perfil_accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_accions);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->perfil_accions = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_accions=$this->perfil_accionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_accion_util::refrescarFKDescripciones($this->perfil_accions);
			}
			
			//perfil_accion_logic_add::checkperfil_accionToGets($this->perfil_accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_accions);
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
		$this->perfil_accion = new perfil_accion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->perfil_accion=$this->perfil_accionDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->perfil_accion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				perfil_accion_util::refrescarFKDescripcion($this->perfil_accion);
			}
						
			//perfil_accion_logic_add::checkperfil_accionToGet($this->perfil_accion,$this->datosCliente);
			//perfil_accion_logic_add::updateperfil_accionToGet($this->perfil_accion);
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
		$this->perfil_accion = new  perfil_accion();
		  		  
        try {		
			$this->perfil_accion=$this->perfil_accionDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->perfil_accion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				perfil_accion_util::refrescarFKDescripcion($this->perfil_accion);
			}
			
			//perfil_accion_logic_add::checkperfil_accionToGet($this->perfil_accion,$this->datosCliente);
			//perfil_accion_logic_add::updateperfil_accionToGet($this->perfil_accion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?perfil_accion {
		$perfil_accionLogic = new  perfil_accion_logic();
		  		  
        try {		
			$perfil_accionLogic->setConnexion($connexion);			
			$perfil_accionLogic->getEntity($id);			
			return $perfil_accionLogic->getperfil_accion();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->perfil_accion = new  perfil_accion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->perfil_accion=$this->perfil_accionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->perfil_accion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				perfil_accion_util::refrescarFKDescripcion($this->perfil_accion);
			}
			
			//perfil_accion_logic_add::checkperfil_accionToGet($this->perfil_accion,$this->datosCliente);
			//perfil_accion_logic_add::updateperfil_accionToGet($this->perfil_accion);
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
		$this->perfil_accion = new  perfil_accion();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_accion=$this->perfil_accionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->perfil_accion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				perfil_accion_util::refrescarFKDescripcion($this->perfil_accion);
			}
			
			//perfil_accion_logic_add::checkperfil_accionToGet($this->perfil_accion,$this->datosCliente);
			//perfil_accion_logic_add::updateperfil_accionToGet($this->perfil_accion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?perfil_accion {
		$perfil_accionLogic = new  perfil_accion_logic();
		  		  
        try {		
			$perfil_accionLogic->setConnexion($connexion);			
			$perfil_accionLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $perfil_accionLogic->getperfil_accion();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->perfil_accions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->perfil_accions=$this->perfil_accionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_accion_util::refrescarFKDescripciones($this->perfil_accions);
			}
			
			//perfil_accion_logic_add::checkperfil_accionToGets($this->perfil_accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_accions);			
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
		$this->perfil_accions = array();
		  		  
        try {			
			$this->perfil_accions=$this->perfil_accionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_accion_util::refrescarFKDescripciones($this->perfil_accions);
			}
			
			//perfil_accion_logic_add::checkperfil_accionToGets($this->perfil_accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_accions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->perfil_accions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_accions=$this->perfil_accionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_accion_util::refrescarFKDescripciones($this->perfil_accions);
			}
			
			//perfil_accion_logic_add::checkperfil_accionToGets($this->perfil_accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_accions);
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
		$this->perfil_accions = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_accions=$this->perfil_accionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_accion_util::refrescarFKDescripciones($this->perfil_accions);
			}
			
			//perfil_accion_logic_add::checkperfil_accionToGets($this->perfil_accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_accions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$perfil_accionLogic = new  perfil_accion_logic();
		  		  
        try {		
			$perfil_accionLogic->setConnexion($connexion);			
			$perfil_accionLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $perfil_accionLogic->getperfil_accions();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->perfil_accions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->perfil_accions=$this->perfil_accionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_accion_util::refrescarFKDescripciones($this->perfil_accions);
			}
			
			//perfil_accion_logic_add::checkperfil_accionToGets($this->perfil_accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_accions);
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
		$this->perfil_accions = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_accions=$this->perfil_accionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_accion_util::refrescarFKDescripciones($this->perfil_accions);
			}
			
			//perfil_accion_logic_add::checkperfil_accionToGets($this->perfil_accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_accions);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->perfil_accions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_accions=$this->perfil_accionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_accion_util::refrescarFKDescripciones($this->perfil_accions);
			}
			
			//perfil_accion_logic_add::checkperfil_accionToGets($this->perfil_accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_accions);
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
		$this->perfil_accions = array();
		  		  
        try {			
			$this->perfil_accions=$this->perfil_accionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_accion_util::refrescarFKDescripciones($this->perfil_accions);
			}	
			
			//perfil_accion_logic_add::checkperfil_accionToGets($this->perfil_accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_accions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->perfil_accions = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->perfil_accions=$this->perfil_accionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_accion_util::refrescarFKDescripciones($this->perfil_accions);
			}
			
			//perfil_accion_logic_add::checkperfil_accionToGets($this->perfil_accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_accions);
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
		$this->perfil_accions = array();
		  		  
        try {		
			$this->perfil_accions=$this->perfil_accionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_accion_util::refrescarFKDescripciones($this->perfil_accions);
			}
			
			//perfil_accion_logic_add::checkperfil_accionToGets($this->perfil_accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_accions);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdaccionWithConnection(string $strFinalQuery,Pagination $pagination,int $id_accion) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_accion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_accion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_accion,perfil_accion_util::$ID_ACCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_accion);

			$this->perfil_accions=$this->perfil_accionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_accion_util::refrescarFKDescripciones($this->perfil_accions);
			}
			//perfil_accion_logic_add::checkperfil_accionToGets($this->perfil_accions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfil_accions);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idaccion(string $strFinalQuery,Pagination $pagination,int $id_accion) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_accion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_accion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_accion,perfil_accion_util::$ID_ACCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_accion);

			$this->perfil_accions=$this->perfil_accionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_accion_util::refrescarFKDescripciones($this->perfil_accions);
			}
			//perfil_accion_logic_add::checkperfil_accionToGets($this->perfil_accions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfil_accions);
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
			$parameterSelectionGeneralid_perfil->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_perfil,perfil_accion_util::$ID_PERFIL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_perfil);

			$this->perfil_accions=$this->perfil_accionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_accion_util::refrescarFKDescripciones($this->perfil_accions);
			}
			//perfil_accion_logic_add::checkperfil_accionToGets($this->perfil_accions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfil_accions);

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
			$parameterSelectionGeneralid_perfil->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_perfil,perfil_accion_util::$ID_PERFIL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_perfil);

			$this->perfil_accions=$this->perfil_accionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_accion_util::refrescarFKDescripciones($this->perfil_accions);
			}
			//perfil_accion_logic_add::checkperfil_accionToGets($this->perfil_accions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfil_accions);
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
						
			//perfil_accion_logic_add::checkperfil_accionToSave($this->perfil_accion,$this->datosCliente,$this->connexion);	       
			//perfil_accion_logic_add::updateperfil_accionToSave($this->perfil_accion);			
			perfil_accion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->perfil_accion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->perfil_accionLogicAdditional->checkGeneralEntityToSave($this,$this->perfil_accion,$this->datosCliente,$this->connexion);
			
			
			perfil_accion_data::save($this->perfil_accion, $this->connexion);	    	       	 				
			//perfil_accion_logic_add::checkperfil_accionToSaveAfter($this->perfil_accion,$this->datosCliente,$this->connexion);			
			//$this->perfil_accionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->perfil_accion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->perfil_accion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->perfil_accion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				perfil_accion_util::refrescarFKDescripcion($this->perfil_accion);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->perfil_accion->getIsDeleted()) {
				$this->perfil_accion=null;
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
						
			/*perfil_accion_logic_add::checkperfil_accionToSave($this->perfil_accion,$this->datosCliente,$this->connexion);*/	        
			//perfil_accion_logic_add::updateperfil_accionToSave($this->perfil_accion);			
			//$this->perfil_accionLogicAdditional->checkGeneralEntityToSave($this,$this->perfil_accion,$this->datosCliente,$this->connexion);			
			perfil_accion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->perfil_accion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			perfil_accion_data::save($this->perfil_accion, $this->connexion);	    	       	 						
			/*perfil_accion_logic_add::checkperfil_accionToSaveAfter($this->perfil_accion,$this->datosCliente,$this->connexion);*/			
			//$this->perfil_accionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->perfil_accion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->perfil_accion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->perfil_accion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				perfil_accion_util::refrescarFKDescripcion($this->perfil_accion);				
			}
			
			if($this->perfil_accion->getIsDeleted()) {
				$this->perfil_accion=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(perfil_accion $perfil_accion,Connexion $connexion)  {
		$perfil_accionLogic = new  perfil_accion_logic();		  		  
        try {		
			$perfil_accionLogic->setConnexion($connexion);			
			$perfil_accionLogic->setperfil_accion($perfil_accion);			
			$perfil_accionLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*perfil_accion_logic_add::checkperfil_accionToSaves($this->perfil_accions,$this->datosCliente,$this->connexion);*/	        	
			//$this->perfil_accionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->perfil_accions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->perfil_accions as $perfil_accionLocal) {				
								
				//perfil_accion_logic_add::updateperfil_accionToSave($perfil_accionLocal);	        	
				perfil_accion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$perfil_accionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				perfil_accion_data::save($perfil_accionLocal, $this->connexion);				
			}
			
			/*perfil_accion_logic_add::checkperfil_accionToSavesAfter($this->perfil_accions,$this->datosCliente,$this->connexion);*/			
			//$this->perfil_accionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->perfil_accions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_accion_util::refrescarFKDescripciones($this->perfil_accions);
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
			/*perfil_accion_logic_add::checkperfil_accionToSaves($this->perfil_accions,$this->datosCliente,$this->connexion);*/			
			//$this->perfil_accionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->perfil_accions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->perfil_accions as $perfil_accionLocal) {				
								
				//perfil_accion_logic_add::updateperfil_accionToSave($perfil_accionLocal);	        	
				perfil_accion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$perfil_accionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				perfil_accion_data::save($perfil_accionLocal, $this->connexion);				
			}			
			
			/*perfil_accion_logic_add::checkperfil_accionToSavesAfter($this->perfil_accions,$this->datosCliente,$this->connexion);*/			
			//$this->perfil_accionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->perfil_accions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_accion_util::refrescarFKDescripciones($this->perfil_accions);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $perfil_accions,Connexion $connexion)  {
		$perfil_accionLogic = new  perfil_accion_logic();
		  		  
        try {		
			$perfil_accionLogic->setConnexion($connexion);			
			$perfil_accionLogic->setperfil_accions($perfil_accions);			
			$perfil_accionLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$perfil_accionsAux=array();
		
		foreach($this->perfil_accions as $perfil_accion) {
			if($perfil_accion->getIsDeleted()==false) {
				$perfil_accionsAux[]=$perfil_accion;
			}
		}
		
		$this->perfil_accions=$perfil_accionsAux;
	}
	
	public function updateToGetsAuxiliar(array &$perfil_accions) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->perfil_accions as $perfil_accion) {
				
				$perfil_accion->setid_perfil_Descripcion(perfil_accion_util::getperfilDescripcion($perfil_accion->getperfil()));
				$perfil_accion->setid_accion_Descripcion(perfil_accion_util::getaccionDescripcion($perfil_accion->getaccion()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$perfil_accion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$perfil_accion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$perfil_accion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$perfil_accion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$perfil_accion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$perfil_accionForeignKey=new perfil_accion_param_return();//perfil_accionForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_perfil',$strRecargarFkTipos,',')) {
				$this->cargarCombosperfilsFK($this->connexion,$strRecargarFkQuery,$perfil_accionForeignKey,$perfil_accion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_accion',$strRecargarFkTipos,',')) {
				$this->cargarCombosaccionsFK($this->connexion,$strRecargarFkQuery,$perfil_accionForeignKey,$perfil_accion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_perfil',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperfilsFK($this->connexion,' where id=-1 ',$perfil_accionForeignKey,$perfil_accion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_accion',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosaccionsFK($this->connexion,' where id=-1 ',$perfil_accionForeignKey,$perfil_accion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $perfil_accionForeignKey;
			
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
	
	
	public function cargarCombosperfilsFK($connexion=null,$strRecargarFkQuery='',$perfil_accionForeignKey,$perfil_accion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$perfilLogic= new perfil_logic();
		$pagination= new Pagination();
		$perfil_accionForeignKey->perfilsFK=array();

		$perfilLogic->setConnexion($connexion);
		$perfilLogic->getperfilDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($perfil_accion_session==null) {
			$perfil_accion_session=new perfil_accion_session();
		}
		
		if($perfil_accion_session->bitBusquedaDesdeFKSesionperfil!=true) {
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
				if($perfil_accionForeignKey->idperfilDefaultFK==0) {
					$perfil_accionForeignKey->idperfilDefaultFK=$perfilLocal->getId();
				}

				$perfil_accionForeignKey->perfilsFK[$perfilLocal->getId()]=perfil_accion_util::getperfilDescripcion($perfilLocal);
			}

		} else {

			if($perfil_accion_session->bigidperfilActual!=null && $perfil_accion_session->bigidperfilActual > 0) {
				$perfilLogic->getEntity($perfil_accion_session->bigidperfilActual);//WithConnection

				$perfil_accionForeignKey->perfilsFK[$perfilLogic->getperfil()->getId()]=perfil_accion_util::getperfilDescripcion($perfilLogic->getperfil());
				$perfil_accionForeignKey->idperfilDefaultFK=$perfilLogic->getperfil()->getId();
			}
		}
	}

	public function cargarCombosaccionsFK($connexion=null,$strRecargarFkQuery='',$perfil_accionForeignKey,$perfil_accion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$accionLogic= new accion_logic();
		$pagination= new Pagination();
		$perfil_accionForeignKey->accionsFK=array();

		$accionLogic->setConnexion($connexion);
		$accionLogic->getaccionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($perfil_accion_session==null) {
			$perfil_accion_session=new perfil_accion_session();
		}
		
		if($perfil_accion_session->bitBusquedaDesdeFKSesionaccion!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=accion_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalaccion=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalaccion=Funciones::GetFinalQueryAppend($finalQueryGlobalaccion, '');
				$finalQueryGlobalaccion.=accion_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalaccion.$strRecargarFkQuery;		

				$accionLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($accionLogic->getaccions() as $accionLocal ) {
				if($perfil_accionForeignKey->idaccionDefaultFK==0) {
					$perfil_accionForeignKey->idaccionDefaultFK=$accionLocal->getId();
				}

				$perfil_accionForeignKey->accionsFK[$accionLocal->getId()]=perfil_accion_util::getaccionDescripcion($accionLocal);
			}

		} else {

			if($perfil_accion_session->bigidaccionActual!=null && $perfil_accion_session->bigidaccionActual > 0) {
				$accionLogic->getEntity($perfil_accion_session->bigidaccionActual);//WithConnection

				$perfil_accionForeignKey->accionsFK[$accionLogic->getaccion()->getId()]=perfil_accion_util::getaccionDescripcion($accionLogic->getaccion());
				$perfil_accionForeignKey->idaccionDefaultFK=$accionLogic->getaccion()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($perfil_accion) {
		$this->saveRelacionesBase($perfil_accion,true);
	}

	public function saveRelaciones($perfil_accion) {
		$this->saveRelacionesBase($perfil_accion,false);
	}

	public function saveRelacionesBase($perfil_accion,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setperfil_accion($perfil_accion);

			if(true) {

				//perfil_accion_logic_add::updateRelacionesToSave($perfil_accion,$this);

				if(($this->perfil_accion->getIsNew() || $this->perfil_accion->getIsChanged()) && !$this->perfil_accion->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->perfil_accion->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//perfil_accion_logic_add::updateRelacionesToSaveAfter($perfil_accion,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $perfil_accions,perfil_accion_param_return $perfil_accionParameterGeneral) : perfil_accion_param_return {
		$perfil_accionReturnGeneral=new perfil_accion_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $perfil_accionReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $perfil_accions,perfil_accion_param_return $perfil_accionParameterGeneral) : perfil_accion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$perfil_accionReturnGeneral=new perfil_accion_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $perfil_accionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $perfil_accions,perfil_accion $perfil_accion,perfil_accion_param_return $perfil_accionParameterGeneral,bool $isEsNuevoperfil_accion,array $clases) : perfil_accion_param_return {
		 try {	
			$perfil_accionReturnGeneral=new perfil_accion_param_return();
	
			$perfil_accionReturnGeneral->setperfil_accion($perfil_accion);
			$perfil_accionReturnGeneral->setperfil_accions($perfil_accions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$perfil_accionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $perfil_accionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $perfil_accions,perfil_accion $perfil_accion,perfil_accion_param_return $perfil_accionParameterGeneral,bool $isEsNuevoperfil_accion,array $clases) : perfil_accion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$perfil_accionReturnGeneral=new perfil_accion_param_return();
	
			$perfil_accionReturnGeneral->setperfil_accion($perfil_accion);
			$perfil_accionReturnGeneral->setperfil_accions($perfil_accions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$perfil_accionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $perfil_accionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $perfil_accions,perfil_accion $perfil_accion,perfil_accion_param_return $perfil_accionParameterGeneral,bool $isEsNuevoperfil_accion,array $clases) : perfil_accion_param_return {
		 try {	
			$perfil_accionReturnGeneral=new perfil_accion_param_return();
	
			$perfil_accionReturnGeneral->setperfil_accion($perfil_accion);
			$perfil_accionReturnGeneral->setperfil_accions($perfil_accions);
			
			
			
			return $perfil_accionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $perfil_accions,perfil_accion $perfil_accion,perfil_accion_param_return $perfil_accionParameterGeneral,bool $isEsNuevoperfil_accion,array $clases) : perfil_accion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$perfil_accionReturnGeneral=new perfil_accion_param_return();
	
			$perfil_accionReturnGeneral->setperfil_accion($perfil_accion);
			$perfil_accionReturnGeneral->setperfil_accions($perfil_accions);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $perfil_accionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,perfil_accion $perfil_accion,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,perfil_accion $perfil_accion,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		perfil_accion_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(perfil_accion $perfil_accion,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//perfil_accion_logic_add::updateperfil_accionToGet($this->perfil_accion);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$perfil_accion->setperfil($this->perfil_accionDataAccess->getperfil($this->connexion,$perfil_accion));
		$perfil_accion->setaccion($this->perfil_accionDataAccess->getaccion($this->connexion,$perfil_accion));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class.'') {
				$perfil_accion->setperfil($this->perfil_accionDataAccess->getperfil($this->connexion,$perfil_accion));
				continue;
			}

			if($clas->clas==accion::$class.'') {
				$perfil_accion->setaccion($this->perfil_accionDataAccess->getaccion($this->connexion,$perfil_accion));
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
			$perfil_accion->setperfil($this->perfil_accionDataAccess->getperfil($this->connexion,$perfil_accion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==accion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$perfil_accion->setaccion($this->perfil_accionDataAccess->getaccion($this->connexion,$perfil_accion));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$perfil_accion->setperfil($this->perfil_accionDataAccess->getperfil($this->connexion,$perfil_accion));
		$perfilLogic= new perfil_logic($this->connexion);
		$perfilLogic->deepLoad($perfil_accion->getperfil(),$isDeep,$deepLoadType,$clases);
				
		$perfil_accion->setaccion($this->perfil_accionDataAccess->getaccion($this->connexion,$perfil_accion));
		$accionLogic= new accion_logic($this->connexion);
		$accionLogic->deepLoad($perfil_accion->getaccion(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class.'') {
				$perfil_accion->setperfil($this->perfil_accionDataAccess->getperfil($this->connexion,$perfil_accion));
				$perfilLogic= new perfil_logic($this->connexion);
				$perfilLogic->deepLoad($perfil_accion->getperfil(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==accion::$class.'') {
				$perfil_accion->setaccion($this->perfil_accionDataAccess->getaccion($this->connexion,$perfil_accion));
				$accionLogic= new accion_logic($this->connexion);
				$accionLogic->deepLoad($perfil_accion->getaccion(),$isDeep,$deepLoadType,$clases);				
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
			$perfil_accion->setperfil($this->perfil_accionDataAccess->getperfil($this->connexion,$perfil_accion));
			$perfilLogic= new perfil_logic($this->connexion);
			$perfilLogic->deepLoad($perfil_accion->getperfil(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==accion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$perfil_accion->setaccion($this->perfil_accionDataAccess->getaccion($this->connexion,$perfil_accion));
			$accionLogic= new accion_logic($this->connexion);
			$accionLogic->deepLoad($perfil_accion->getaccion(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(perfil_accion $perfil_accion,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//perfil_accion_logic_add::updateperfil_accionToSave($this->perfil_accion);			
			
			if(!$paraDeleteCascade) {				
				perfil_accion_data::save($perfil_accion, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		perfil_data::save($perfil_accion->getperfil(),$this->connexion);
		accion_data::save($perfil_accion->getaccion(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class.'') {
				perfil_data::save($perfil_accion->getperfil(),$this->connexion);
				continue;
			}

			if($clas->clas==accion::$class.'') {
				accion_data::save($perfil_accion->getaccion(),$this->connexion);
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
			perfil_data::save($perfil_accion->getperfil(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==accion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			accion_data::save($perfil_accion->getaccion(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		perfil_data::save($perfil_accion->getperfil(),$this->connexion);
		$perfilLogic= new perfil_logic($this->connexion);
		$perfilLogic->deepSave($perfil_accion->getperfil(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		accion_data::save($perfil_accion->getaccion(),$this->connexion);
		$accionLogic= new accion_logic($this->connexion);
		$accionLogic->deepSave($perfil_accion->getaccion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class.'') {
				perfil_data::save($perfil_accion->getperfil(),$this->connexion);
				$perfilLogic= new perfil_logic($this->connexion);
				$perfilLogic->deepSave($perfil_accion->getperfil(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==accion::$class.'') {
				accion_data::save($perfil_accion->getaccion(),$this->connexion);
				$accionLogic= new accion_logic($this->connexion);
				$accionLogic->deepSave($perfil_accion->getaccion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			perfil_data::save($perfil_accion->getperfil(),$this->connexion);
			$perfilLogic= new perfil_logic($this->connexion);
			$perfilLogic->deepSave($perfil_accion->getperfil(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==accion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			accion_data::save($perfil_accion->getaccion(),$this->connexion);
			$accionLogic= new accion_logic($this->connexion);
			$accionLogic->deepSave($perfil_accion->getaccion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				perfil_accion_data::save($perfil_accion, $this->connexion);
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
			
			$this->deepLoad($this->perfil_accion,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->perfil_accions as $perfil_accion) {
				$this->deepLoad($perfil_accion,$isDeep,$deepLoadType,$clases);
								
				perfil_accion_util::refrescarFKDescripciones($this->perfil_accions);
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
			
			foreach($this->perfil_accions as $perfil_accion) {
				$this->deepLoad($perfil_accion,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->perfil_accion,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->perfil_accions as $perfil_accion) {
				$this->deepSave($perfil_accion,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->perfil_accions as $perfil_accion) {
				$this->deepSave($perfil_accion,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(accion::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==perfil::$class) {
						$classes[]=new Classe(perfil::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==accion::$class) {
						$classes[]=new Classe(accion::$class);
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
					if($clas->clas==accion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(accion::$class);
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
	
	
	
	
	
	
	
	public function getperfil_accion() : ?perfil_accion {	
		/*
		perfil_accion_logic_add::checkperfil_accionToGet($this->perfil_accion,$this->datosCliente);
		perfil_accion_logic_add::updateperfil_accionToGet($this->perfil_accion);
		*/
			
		return $this->perfil_accion;
	}
		
	public function setperfil_accion(perfil_accion $newperfil_accion) {
		$this->perfil_accion = $newperfil_accion;
	}
	
	public function getperfil_accions() : array {		
		/*
		perfil_accion_logic_add::checkperfil_accionToGets($this->perfil_accions,$this->datosCliente);
		
		foreach ($this->perfil_accions as $perfil_accionLocal ) {
			perfil_accion_logic_add::updateperfil_accionToGet($perfil_accionLocal);
		}
		*/
		
		return $this->perfil_accions;
	}
	
	public function setperfil_accions(array $newperfil_accions) {
		$this->perfil_accions = $newperfil_accions;
	}
	
	public function getperfil_accionDataAccess() : perfil_accion_data {
		return $this->perfil_accionDataAccess;
	}
	
	public function setperfil_accionDataAccess(perfil_accion_data $newperfil_accionDataAccess) {
		$this->perfil_accionDataAccess = $newperfil_accionDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        perfil_accion_carga::$CONTROLLER;;        
		
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
