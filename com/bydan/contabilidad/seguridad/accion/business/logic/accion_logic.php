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

namespace com\bydan\contabilidad\seguridad\accion\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\accion\util\accion_carga;
use com\bydan\contabilidad\seguridad\accion\util\accion_param_return;

use com\bydan\contabilidad\seguridad\accion\presentation\session\accion_session;

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

use com\bydan\contabilidad\seguridad\accion\util\accion_util;
use com\bydan\contabilidad\seguridad\accion\business\entity\accion;
use com\bydan\contabilidad\seguridad\accion\business\data\accion_data;

//FK


use com\bydan\contabilidad\seguridad\opcion\business\data\opcion_data;
use com\bydan\contabilidad\seguridad\opcion\business\logic\opcion_logic;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_util;

//REL


use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\business\data\perfil_data;
use com\bydan\contabilidad\seguridad\perfil\business\logic\perfil_logic;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;

use com\bydan\contabilidad\seguridad\perfil_accion\business\entity\perfil_accion;
use com\bydan\contabilidad\seguridad\perfil_accion\business\data\perfil_accion_data;
use com\bydan\contabilidad\seguridad\perfil_accion\business\logic\perfil_accion_logic;
use com\bydan\contabilidad\seguridad\perfil_accion\util\perfil_accion_carga;
use com\bydan\contabilidad\seguridad\perfil_accion\util\perfil_accion_util;

//REL DETALLES




class accion_logic  extends GeneralEntityLogic implements accion_logicI {	
	/*GENERAL*/
	public accion_data $accionDataAccess;
	//public ?accion_logic_add $accionLogicAdditional=null;
	public ?accion $accion;
	public array $accions;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->accionDataAccess = new accion_data();			
			$this->accions = array();
			$this->accion = new accion();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->accionLogicAdditional = new accion_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->accionLogicAdditional==null) {
		//	$this->accionLogicAdditional=new accion_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->accionDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->accionDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->accionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->accionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->accions = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->accions=$this->accionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				accion_util::refrescarFKDescripciones($this->accions);
			}
			
			//accion_logic_add::checkaccionToGets($this->accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->accions);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->accions = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->accions=$this->accionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				accion_util::refrescarFKDescripciones($this->accions);
			}
			
			//accion_logic_add::checkaccionToGets($this->accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->accions);
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
		$this->accion = new accion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->accion=$this->accionDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->accion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				accion_util::refrescarFKDescripcion($this->accion);
			}
						
			//accion_logic_add::checkaccionToGet($this->accion,$this->datosCliente);
			//accion_logic_add::updateaccionToGet($this->accion);
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
		$this->accion = new  accion();
		  		  
        try {		
			$this->accion=$this->accionDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->accion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				accion_util::refrescarFKDescripcion($this->accion);
			}
			
			//accion_logic_add::checkaccionToGet($this->accion,$this->datosCliente);
			//accion_logic_add::updateaccionToGet($this->accion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?accion {
		$accionLogic = new  accion_logic();
		  		  
        try {		
			$accionLogic->setConnexion($connexion);			
			$accionLogic->getEntity($id);			
			return $accionLogic->getaccion();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->accion = new  accion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->accion=$this->accionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->accion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				accion_util::refrescarFKDescripcion($this->accion);
			}
			
			//accion_logic_add::checkaccionToGet($this->accion,$this->datosCliente);
			//accion_logic_add::updateaccionToGet($this->accion);
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
		$this->accion = new  accion();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->accion=$this->accionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->accion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				accion_util::refrescarFKDescripcion($this->accion);
			}
			
			//accion_logic_add::checkaccionToGet($this->accion,$this->datosCliente);
			//accion_logic_add::updateaccionToGet($this->accion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?accion {
		$accionLogic = new  accion_logic();
		  		  
        try {		
			$accionLogic->setConnexion($connexion);			
			$accionLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $accionLogic->getaccion();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->accions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->accions=$this->accionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				accion_util::refrescarFKDescripciones($this->accions);
			}
			
			//accion_logic_add::checkaccionToGets($this->accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->accions);			
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
		$this->accions = array();
		  		  
        try {			
			$this->accions=$this->accionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				accion_util::refrescarFKDescripciones($this->accions);
			}
			
			//accion_logic_add::checkaccionToGets($this->accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->accions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->accions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->accions=$this->accionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				accion_util::refrescarFKDescripciones($this->accions);
			}
			
			//accion_logic_add::checkaccionToGets($this->accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->accions);
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
		$this->accions = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->accions=$this->accionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				accion_util::refrescarFKDescripciones($this->accions);
			}
			
			//accion_logic_add::checkaccionToGets($this->accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->accions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$accionLogic = new  accion_logic();
		  		  
        try {		
			$accionLogic->setConnexion($connexion);			
			$accionLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $accionLogic->getaccions();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->accions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->accions=$this->accionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				accion_util::refrescarFKDescripciones($this->accions);
			}
			
			//accion_logic_add::checkaccionToGets($this->accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->accions);
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
		$this->accions = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->accions=$this->accionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				accion_util::refrescarFKDescripciones($this->accions);
			}
			
			//accion_logic_add::checkaccionToGets($this->accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->accions);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->accions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->accions=$this->accionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				accion_util::refrescarFKDescripciones($this->accions);
			}
			
			//accion_logic_add::checkaccionToGets($this->accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->accions);
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
		$this->accions = array();
		  		  
        try {			
			$this->accions=$this->accionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				accion_util::refrescarFKDescripciones($this->accions);
			}	
			
			//accion_logic_add::checkaccionToGets($this->accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->accions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->accions = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->accions=$this->accionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				accion_util::refrescarFKDescripciones($this->accions);
			}
			
			//accion_logic_add::checkaccionToGets($this->accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->accions);
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
		$this->accions = array();
		  		  
        try {		
			$this->accions=$this->accionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				accion_util::refrescarFKDescripciones($this->accions);
			}
			
			//accion_logic_add::checkaccionToGets($this->accions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->accions);

		}  catch(Exception $e) {						
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
			$parameterSelectionGeneralid_opcion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_opcion,accion_util::$ID_OPCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_opcion);

			$this->accions=$this->accionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				accion_util::refrescarFKDescripciones($this->accions);
			}
			//accion_logic_add::checkaccionToGets($this->accions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->accions);

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
			$parameterSelectionGeneralid_opcion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_opcion,accion_util::$ID_OPCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_opcion);

			$this->accions=$this->accionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				accion_util::refrescarFKDescripciones($this->accions);
			}
			//accion_logic_add::checkaccionToGets($this->accions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->accions);
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
						
			//accion_logic_add::checkaccionToSave($this->accion,$this->datosCliente,$this->connexion);	       
			//accion_logic_add::updateaccionToSave($this->accion);			
			accion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->accion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->accionLogicAdditional->checkGeneralEntityToSave($this,$this->accion,$this->datosCliente,$this->connexion);
			
			
			accion_data::save($this->accion, $this->connexion);	    	       	 				
			//accion_logic_add::checkaccionToSaveAfter($this->accion,$this->datosCliente,$this->connexion);			
			//$this->accionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->accion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->accion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->accion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				accion_util::refrescarFKDescripcion($this->accion);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->accion->getIsDeleted()) {
				$this->accion=null;
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
						
			/*accion_logic_add::checkaccionToSave($this->accion,$this->datosCliente,$this->connexion);*/	        
			//accion_logic_add::updateaccionToSave($this->accion);			
			//$this->accionLogicAdditional->checkGeneralEntityToSave($this,$this->accion,$this->datosCliente,$this->connexion);			
			accion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->accion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			accion_data::save($this->accion, $this->connexion);	    	       	 						
			/*accion_logic_add::checkaccionToSaveAfter($this->accion,$this->datosCliente,$this->connexion);*/			
			//$this->accionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->accion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->accion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->accion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				accion_util::refrescarFKDescripcion($this->accion);				
			}
			
			if($this->accion->getIsDeleted()) {
				$this->accion=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(accion $accion,Connexion $connexion)  {
		$accionLogic = new  accion_logic();		  		  
        try {		
			$accionLogic->setConnexion($connexion);			
			$accionLogic->setaccion($accion);			
			$accionLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*accion_logic_add::checkaccionToSaves($this->accions,$this->datosCliente,$this->connexion);*/	        	
			//$this->accionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->accions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->accions as $accionLocal) {				
								
				//accion_logic_add::updateaccionToSave($accionLocal);	        	
				accion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$accionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				accion_data::save($accionLocal, $this->connexion);				
			}
			
			/*accion_logic_add::checkaccionToSavesAfter($this->accions,$this->datosCliente,$this->connexion);*/			
			//$this->accionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->accions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				accion_util::refrescarFKDescripciones($this->accions);
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
			/*accion_logic_add::checkaccionToSaves($this->accions,$this->datosCliente,$this->connexion);*/			
			//$this->accionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->accions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->accions as $accionLocal) {				
								
				//accion_logic_add::updateaccionToSave($accionLocal);	        	
				accion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$accionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				accion_data::save($accionLocal, $this->connexion);				
			}			
			
			/*accion_logic_add::checkaccionToSavesAfter($this->accions,$this->datosCliente,$this->connexion);*/			
			//$this->accionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->accions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				accion_util::refrescarFKDescripciones($this->accions);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $accions,Connexion $connexion)  {
		$accionLogic = new  accion_logic();
		  		  
        try {		
			$accionLogic->setConnexion($connexion);			
			$accionLogic->setaccions($accions);			
			$accionLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$accionsAux=array();
		
		foreach($this->accions as $accion) {
			if($accion->getIsDeleted()==false) {
				$accionsAux[]=$accion;
			}
		}
		
		$this->accions=$accionsAux;
	}
	
	public function updateToGetsAuxiliar(array &$accions) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->accions as $accion) {
				
				$accion->setid_opcion_Descripcion(accion_util::getopcionDescripcion($accion->getopcion()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$accion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$accion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$accion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$accion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$accion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$accionForeignKey=new accion_param_return();//accionForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_opcion',$strRecargarFkTipos,',')) {
				$this->cargarCombosopcionsFK($this->connexion,$strRecargarFkQuery,$accionForeignKey,$accion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_opcion',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosopcionsFK($this->connexion,' where id=-1 ',$accionForeignKey,$accion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $accionForeignKey;
			
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
	
	
	public function cargarCombosopcionsFK($connexion=null,$strRecargarFkQuery='',$accionForeignKey,$accion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$opcionLogic= new opcion_logic();
		$pagination= new Pagination();
		$accionForeignKey->opcionsFK=array();

		$opcionLogic->setConnexion($connexion);
		$opcionLogic->getopcionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($accion_session==null) {
			$accion_session=new accion_session();
		}
		
		if($accion_session->bitBusquedaDesdeFKSesionopcion!=true) {
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
				if($accionForeignKey->idopcionDefaultFK==0) {
					$accionForeignKey->idopcionDefaultFK=$opcionLocal->getId();
				}

				$accionForeignKey->opcionsFK[$opcionLocal->getId()]=accion_util::getopcionDescripcion($opcionLocal);
			}

		} else {

			if($accion_session->bigidopcionActual!=null && $accion_session->bigidopcionActual > 0) {
				$opcionLogic->getEntity($accion_session->bigidopcionActual);//WithConnection

				$accionForeignKey->opcionsFK[$opcionLogic->getopcion()->getId()]=accion_util::getopcionDescripcion($opcionLogic->getopcion());
				$accionForeignKey->idopcionDefaultFK=$opcionLogic->getopcion()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($accion,$perfilaccions) {
		$this->saveRelacionesBase($accion,$perfilaccions,true);
	}

	public function saveRelaciones($accion,$perfilaccions) {
		$this->saveRelacionesBase($accion,$perfilaccions,false);
	}

	public function saveRelacionesBase($accion,$perfilaccions=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$accion->setperfil_accions($perfilaccions);
			$this->setaccion($accion);

			if(true) {

				//accion_logic_add::updateRelacionesToSave($accion,$this);

				if(($this->accion->getIsNew() || $this->accion->getIsChanged()) && !$this->accion->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($perfilaccions);

				} else if($this->accion->getIsDeleted()) {
					$this->saveRelacionesDetalles($perfilaccions);
					$this->save();
				}

				//accion_logic_add::updateRelacionesToSaveAfter($accion,$this);

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
	
	
	public function saveRelacionesDetalles($perfilaccions=array()) {
		try {
	

			$idaccionActual=$this->getaccion()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/perfil_accion_carga.php');
			perfil_accion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$perfilaccionLogic_Desde_accion=new perfil_accion_logic();
			$perfilaccionLogic_Desde_accion->setperfil_accions($perfilaccions);

			$perfilaccionLogic_Desde_accion->setConnexion($this->getConnexion());
			$perfilaccionLogic_Desde_accion->setDatosCliente($this->datosCliente);

			foreach($perfilaccionLogic_Desde_accion->getperfil_accions() as $perfilaccion_Desde_accion) {
				$perfilaccion_Desde_accion->setid_accion($idaccionActual);
			}

			$perfilaccionLogic_Desde_accion->saves();

		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
	public function deleteCascade()  {
		/*NO-GENERATED*/
	}
	
	public function deleteCascadeWithConnection()  {
		/*NO GENERATED*/
	}
	
	public function deleteCascades()  {	
		/*NO GENERATED*/
	}
	
	public function deleteCascadesWithConnection()  {
		/*NO GENERATED*/
	}
	
	/*PROCESAR ACCIONES*/
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $accions,accion_param_return $accionParameterGeneral) : accion_param_return {
		$accionReturnGeneral=new accion_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $accionReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $accions,accion_param_return $accionParameterGeneral) : accion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$accionReturnGeneral=new accion_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $accionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $accions,accion $accion,accion_param_return $accionParameterGeneral,bool $isEsNuevoaccion,array $clases) : accion_param_return {
		 try {	
			$accionReturnGeneral=new accion_param_return();
	
			$accionReturnGeneral->setaccion($accion);
			$accionReturnGeneral->setaccions($accions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$accionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $accionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $accions,accion $accion,accion_param_return $accionParameterGeneral,bool $isEsNuevoaccion,array $clases) : accion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$accionReturnGeneral=new accion_param_return();
	
			$accionReturnGeneral->setaccion($accion);
			$accionReturnGeneral->setaccions($accions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$accionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $accionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $accions,accion $accion,accion_param_return $accionParameterGeneral,bool $isEsNuevoaccion,array $clases) : accion_param_return {
		 try {	
			$accionReturnGeneral=new accion_param_return();
	
			$accionReturnGeneral->setaccion($accion);
			$accionReturnGeneral->setaccions($accions);
			
			
			
			return $accionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $accions,accion $accion,accion_param_return $accionParameterGeneral,bool $isEsNuevoaccion,array $clases) : accion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$accionReturnGeneral=new accion_param_return();
	
			$accionReturnGeneral->setaccion($accion);
			$accionReturnGeneral->setaccions($accions);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $accionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,accion $accion,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,accion $accion,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		accion_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		accion_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(accion $accion,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//accion_logic_add::updateaccionToGet($this->accion);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$accion->setopcion($this->accionDataAccess->getopcion($this->connexion,$accion));
		$accion->setperfils($this->accionDataAccess->getperfils($this->connexion,$accion));
		$accion->setperfil_accions($this->accionDataAccess->getperfil_accions($this->connexion,$accion));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				$accion->setopcion($this->accionDataAccess->getopcion($this->connexion,$accion));
				continue;
			}

			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$accion->setperfils($this->accionDataAccess->getperfils($this->connexion,$accion));

				if($this->isConDeep) {
					$perfilLogic= new perfil_logic($this->connexion);
					$perfilLogic->setperfils($accion->getperfils());
					$classesLocal=perfil_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$perfilLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					perfil_util::refrescarFKDescripciones($perfilLogic->getperfils());
					$accion->setperfils($perfilLogic->getperfils());
				}

				continue;
			}

			if($clas->clas==perfil_accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$accion->setperfil_accions($this->accionDataAccess->getperfil_accions($this->connexion,$accion));

				if($this->isConDeep) {
					$perfilaccionLogic= new perfil_accion_logic($this->connexion);
					$perfilaccionLogic->setperfil_accions($accion->getperfil_accions());
					$classesLocal=perfil_accion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$perfilaccionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					perfil_accion_util::refrescarFKDescripciones($perfilaccionLogic->getperfil_accions());
					$accion->setperfil_accions($perfilaccionLogic->getperfil_accions());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$accion->setopcion($this->accionDataAccess->getopcion($this->connexion,$accion));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil::$class);
			$accion->setperfils($this->accionDataAccess->getperfils($this->connexion,$accion));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_accion::$class);
			$accion->setperfil_accions($this->accionDataAccess->getperfil_accions($this->connexion,$accion));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$accion->setopcion($this->accionDataAccess->getopcion($this->connexion,$accion));
		$opcionLogic= new opcion_logic($this->connexion);
		$opcionLogic->deepLoad($accion->getopcion(),$isDeep,$deepLoadType,$clases);
				

		$accion->setperfils($this->accionDataAccess->getperfils($this->connexion,$accion));

		foreach($accion->getperfils() as $perfil) {
			$perfilLogic= new perfil_logic($this->connexion);
			$perfilLogic->deepLoad($perfil,$isDeep,$deepLoadType,$clases);
		}

		$accion->setperfil_accions($this->accionDataAccess->getperfil_accions($this->connexion,$accion));

		foreach($accion->getperfil_accions() as $perfilaccion) {
			$perfilaccionLogic= new perfil_accion_logic($this->connexion);
			$perfilaccionLogic->deepLoad($perfilaccion,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				$accion->setopcion($this->accionDataAccess->getopcion($this->connexion,$accion));
				$opcionLogic= new opcion_logic($this->connexion);
				$opcionLogic->deepLoad($accion->getopcion(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$accion->setperfils($this->accionDataAccess->getperfils($this->connexion,$accion));

				foreach($accion->getperfils() as $perfil) {
					$perfilLogic= new perfil_logic($this->connexion);
					$perfilLogic->deepLoad($perfil,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==perfil_accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$accion->setperfil_accions($this->accionDataAccess->getperfil_accions($this->connexion,$accion));

				foreach($accion->getperfil_accions() as $perfilaccion) {
					$perfilaccionLogic= new perfil_accion_logic($this->connexion);
					$perfilaccionLogic->deepLoad($perfilaccion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$accion->setopcion($this->accionDataAccess->getopcion($this->connexion,$accion));
			$opcionLogic= new opcion_logic($this->connexion);
			$opcionLogic->deepLoad($accion->getopcion(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil::$class);
			$accion->setperfils($this->accionDataAccess->getperfils($this->connexion,$accion));

			foreach($accion->getperfils() as $perfil) {
				$perfilLogic= new perfil_logic($this->connexion);
				$perfilLogic->deepLoad($perfil,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_accion::$class);
			$accion->setperfil_accions($this->accionDataAccess->getperfil_accions($this->connexion,$accion));

			foreach($accion->getperfil_accions() as $perfilaccion) {
				$perfilaccionLogic= new perfil_accion_logic($this->connexion);
				$perfilaccionLogic->deepLoad($perfilaccion,$isDeep,$deepLoadType,$clases);
			}
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(accion $accion,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//accion_logic_add::updateaccionToSave($this->accion);			
			
			if(!$paraDeleteCascade) {				
				accion_data::save($accion, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		opcion_data::save($accion->getopcion(),$this->connexion);
		foreach($accion->getperfils() as $perfil) {
			perfil_data::save($perfil,$this->connexion);
		}


		foreach($accion->getperfil_accions() as $perfilaccion) {
			$perfilaccion->setid_accion($accion->getId());
			perfil_accion_data::save($perfilaccion,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				opcion_data::save($accion->getopcion(),$this->connexion);
				continue;
			}


			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($accion->getperfils() as $perfil) {
					perfil_data::save($perfil,$this->connexion);
				}

				continue;
			}

			if($clas->clas==perfil_accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($accion->getperfil_accions() as $perfilaccion) {
					$perfilaccion->setid_accion($accion->getId());
					perfil_accion_data::save($perfilaccion,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			opcion_data::save($accion->getopcion(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil::$class);

			foreach($accion->getperfils() as $perfil) {
				perfil_data::save($perfil,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_accion::$class);

			foreach($accion->getperfil_accions() as $perfilaccion) {
				$perfilaccion->setid_accion($accion->getId());
				perfil_accion_data::save($perfilaccion,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		opcion_data::save($accion->getopcion(),$this->connexion);
		$opcionLogic= new opcion_logic($this->connexion);
		$opcionLogic->deepSave($accion->getopcion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($accion->getperfils() as $perfil) {
			$perfilLogic= new perfil_logic($this->connexion);
			perfil_data::save($perfil,$this->connexion);
			$perfilLogic->deepSave($perfil,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($accion->getperfil_accions() as $perfilaccion) {
			$perfilaccionLogic= new perfil_accion_logic($this->connexion);
			$perfilaccion->setid_accion($accion->getId());
			perfil_accion_data::save($perfilaccion,$this->connexion);
			$perfilaccionLogic->deepSave($perfilaccion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				opcion_data::save($accion->getopcion(),$this->connexion);
				$opcionLogic= new opcion_logic($this->connexion);
				$opcionLogic->deepSave($accion->getopcion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($accion->getperfils() as $perfil) {
					$perfilLogic= new perfil_logic($this->connexion);
					perfil_data::save($perfil,$this->connexion);
					$perfilLogic->deepSave($perfil,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==perfil_accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($accion->getperfil_accions() as $perfilaccion) {
					$perfilaccionLogic= new perfil_accion_logic($this->connexion);
					$perfilaccion->setid_accion($accion->getId());
					perfil_accion_data::save($perfilaccion,$this->connexion);
					$perfilaccionLogic->deepSave($perfilaccion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==opcion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			opcion_data::save($accion->getopcion(),$this->connexion);
			$opcionLogic= new opcion_logic($this->connexion);
			$opcionLogic->deepSave($accion->getopcion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil::$class);

			foreach($accion->getperfils() as $perfil) {
				$perfilLogic= new perfil_logic($this->connexion);
				perfil_data::save($perfil,$this->connexion);
				$perfilLogic->deepSave($perfil,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_accion::$class);

			foreach($accion->getperfil_accions() as $perfilaccion) {
				$perfilaccionLogic= new perfil_accion_logic($this->connexion);
				$perfilaccion->setid_accion($accion->getId());
				perfil_accion_data::save($perfilaccion,$this->connexion);
				$perfilaccionLogic->deepSave($perfilaccion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				accion_data::save($accion, $this->connexion);
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
			
			$this->deepLoad($this->accion,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->accions as $accion) {
				$this->deepLoad($accion,$isDeep,$deepLoadType,$clases);
								
				accion_util::refrescarFKDescripciones($this->accions);
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
			
			foreach($this->accions as $accion) {
				$this->deepLoad($accion,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->accion,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->accions as $accion) {
				$this->deepSave($accion,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->accions as $accion) {
				$this->deepSave($accion,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(opcion::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
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
				
				$classes[]=new Classe(perfil::$class);
				$classes[]=new Classe(perfil_accion::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==perfil::$class) {
						$classes[]=new Classe(perfil::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==perfil_accion::$class) {
						$classes[]=new Classe(perfil_accion::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==perfil::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(perfil::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==perfil_accion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(perfil_accion::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getaccion() : ?accion {	
		/*
		accion_logic_add::checkaccionToGet($this->accion,$this->datosCliente);
		accion_logic_add::updateaccionToGet($this->accion);
		*/
			
		return $this->accion;
	}
		
	public function setaccion(accion $newaccion) {
		$this->accion = $newaccion;
	}
	
	public function getaccions() : array {		
		/*
		accion_logic_add::checkaccionToGets($this->accions,$this->datosCliente);
		
		foreach ($this->accions as $accionLocal ) {
			accion_logic_add::updateaccionToGet($accionLocal);
		}
		*/
		
		return $this->accions;
	}
	
	public function setaccions(array $newaccions) {
		$this->accions = $newaccions;
	}
	
	public function getaccionDataAccess() : accion_data {
		return $this->accionDataAccess;
	}
	
	public function setaccionDataAccess(accion_data $newaccionDataAccess) {
		$this->accionDataAccess = $newaccionDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        accion_carga::$CONTROLLER;;        
		
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
