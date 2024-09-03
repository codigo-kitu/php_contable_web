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

namespace com\bydan\contabilidad\seguridad\tipo_fondo\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\tipo_fondo\util\tipo_fondo_carga;
use com\bydan\contabilidad\seguridad\tipo_fondo\util\tipo_fondo_param_return;


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

use com\bydan\contabilidad\seguridad\tipo_fondo\util\tipo_fondo_util;
use com\bydan\contabilidad\seguridad\tipo_fondo\business\entity\tipo_fondo;
use com\bydan\contabilidad\seguridad\tipo_fondo\business\data\tipo_fondo_data;

//FK


//REL


//REL DETALLES




class tipo_fondo_logic  extends GeneralEntityLogic implements tipo_fondo_logicI {	
	/*GENERAL*/
	public tipo_fondo_data $tipo_fondoDataAccess;
	//public ?tipo_fondo_logic_add $tipo_fondoLogicAdditional=null;
	public ?tipo_fondo $tipo_fondo;
	public array $tipo_fondos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->tipo_fondoDataAccess = new tipo_fondo_data();			
			$this->tipo_fondos = array();
			$this->tipo_fondo = new tipo_fondo();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->tipo_fondoLogicAdditional = new tipo_fondo_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->tipo_fondoLogicAdditional==null) {
		//	$this->tipo_fondoLogicAdditional=new tipo_fondo_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->tipo_fondoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->tipo_fondoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->tipo_fondoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->tipo_fondoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_fondos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_fondos=$this->tipo_fondoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_fondo_util::refrescarFKDescripciones($this->tipo_fondos);
			}
			
			//tipo_fondo_logic_add::checktipo_fondoToGets($this->tipo_fondos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_fondos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_fondos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_fondos=$this->tipo_fondoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_fondo_util::refrescarFKDescripciones($this->tipo_fondos);
			}
			
			//tipo_fondo_logic_add::checktipo_fondoToGets($this->tipo_fondos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_fondos);
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
		$this->tipo_fondo = new tipo_fondo();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->tipo_fondo=$this->tipo_fondoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_fondo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_fondo_util::refrescarFKDescripcion($this->tipo_fondo);
			}
						
			//tipo_fondo_logic_add::checktipo_fondoToGet($this->tipo_fondo,$this->datosCliente);
			//tipo_fondo_logic_add::updatetipo_fondoToGet($this->tipo_fondo);
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
		$this->tipo_fondo = new  tipo_fondo();
		  		  
        try {		
			$this->tipo_fondo=$this->tipo_fondoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_fondo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_fondo_util::refrescarFKDescripcion($this->tipo_fondo);
			}
			
			//tipo_fondo_logic_add::checktipo_fondoToGet($this->tipo_fondo,$this->datosCliente);
			//tipo_fondo_logic_add::updatetipo_fondoToGet($this->tipo_fondo);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?tipo_fondo {
		$tipo_fondoLogic = new  tipo_fondo_logic();
		  		  
        try {		
			$tipo_fondoLogic->setConnexion($connexion);			
			$tipo_fondoLogic->getEntity($id);			
			return $tipo_fondoLogic->gettipo_fondo();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->tipo_fondo = new  tipo_fondo();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->tipo_fondo=$this->tipo_fondoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_fondo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_fondo_util::refrescarFKDescripcion($this->tipo_fondo);
			}
			
			//tipo_fondo_logic_add::checktipo_fondoToGet($this->tipo_fondo,$this->datosCliente);
			//tipo_fondo_logic_add::updatetipo_fondoToGet($this->tipo_fondo);
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
		$this->tipo_fondo = new  tipo_fondo();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_fondo=$this->tipo_fondoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_fondo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_fondo_util::refrescarFKDescripcion($this->tipo_fondo);
			}
			
			//tipo_fondo_logic_add::checktipo_fondoToGet($this->tipo_fondo,$this->datosCliente);
			//tipo_fondo_logic_add::updatetipo_fondoToGet($this->tipo_fondo);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?tipo_fondo {
		$tipo_fondoLogic = new  tipo_fondo_logic();
		  		  
        try {		
			$tipo_fondoLogic->setConnexion($connexion);			
			$tipo_fondoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $tipo_fondoLogic->gettipo_fondo();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_fondos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_fondos=$this->tipo_fondoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_fondo_util::refrescarFKDescripciones($this->tipo_fondos);
			}
			
			//tipo_fondo_logic_add::checktipo_fondoToGets($this->tipo_fondos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_fondos);			
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
		$this->tipo_fondos = array();
		  		  
        try {			
			$this->tipo_fondos=$this->tipo_fondoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_fondo_util::refrescarFKDescripciones($this->tipo_fondos);
			}
			
			//tipo_fondo_logic_add::checktipo_fondoToGets($this->tipo_fondos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_fondos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->tipo_fondos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_fondos=$this->tipo_fondoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_fondo_util::refrescarFKDescripciones($this->tipo_fondos);
			}
			
			//tipo_fondo_logic_add::checktipo_fondoToGets($this->tipo_fondos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_fondos);
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
		$this->tipo_fondos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_fondos=$this->tipo_fondoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_fondo_util::refrescarFKDescripciones($this->tipo_fondos);
			}
			
			//tipo_fondo_logic_add::checktipo_fondoToGets($this->tipo_fondos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_fondos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$tipo_fondoLogic = new  tipo_fondo_logic();
		  		  
        try {		
			$tipo_fondoLogic->setConnexion($connexion);			
			$tipo_fondoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $tipo_fondoLogic->gettipo_fondos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->tipo_fondos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_fondos=$this->tipo_fondoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_fondo_util::refrescarFKDescripciones($this->tipo_fondos);
			}
			
			//tipo_fondo_logic_add::checktipo_fondoToGets($this->tipo_fondos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_fondos);
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
		$this->tipo_fondos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_fondos=$this->tipo_fondoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_fondo_util::refrescarFKDescripciones($this->tipo_fondos);
			}
			
			//tipo_fondo_logic_add::checktipo_fondoToGets($this->tipo_fondos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_fondos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->tipo_fondos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_fondos=$this->tipo_fondoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_fondo_util::refrescarFKDescripciones($this->tipo_fondos);
			}
			
			//tipo_fondo_logic_add::checktipo_fondoToGets($this->tipo_fondos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_fondos);
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
		$this->tipo_fondos = array();
		  		  
        try {			
			$this->tipo_fondos=$this->tipo_fondoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_fondo_util::refrescarFKDescripciones($this->tipo_fondos);
			}	
			
			//tipo_fondo_logic_add::checktipo_fondoToGets($this->tipo_fondos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_fondos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_fondos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_fondos=$this->tipo_fondoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_fondo_util::refrescarFKDescripciones($this->tipo_fondos);
			}
			
			//tipo_fondo_logic_add::checktipo_fondoToGets($this->tipo_fondos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_fondos);
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
		$this->tipo_fondos = array();
		  		  
        try {		
			$this->tipo_fondos=$this->tipo_fondoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_fondo_util::refrescarFKDescripciones($this->tipo_fondos);
			}
			
			//tipo_fondo_logic_add::checktipo_fondoToGets($this->tipo_fondos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_fondos);

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
						
			//tipo_fondo_logic_add::checktipo_fondoToSave($this->tipo_fondo,$this->datosCliente,$this->connexion);	       
			//tipo_fondo_logic_add::updatetipo_fondoToSave($this->tipo_fondo);			
			tipo_fondo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_fondo,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->tipo_fondoLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_fondo,$this->datosCliente,$this->connexion);
			
			
			tipo_fondo_data::save($this->tipo_fondo, $this->connexion);	    	       	 				
			//tipo_fondo_logic_add::checktipo_fondoToSaveAfter($this->tipo_fondo,$this->datosCliente,$this->connexion);			
			//$this->tipo_fondoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_fondo,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_fondo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_fondo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_fondo_util::refrescarFKDescripcion($this->tipo_fondo);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->tipo_fondo->getIsDeleted()) {
				$this->tipo_fondo=null;
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
						
			/*tipo_fondo_logic_add::checktipo_fondoToSave($this->tipo_fondo,$this->datosCliente,$this->connexion);*/	        
			//tipo_fondo_logic_add::updatetipo_fondoToSave($this->tipo_fondo);			
			//$this->tipo_fondoLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_fondo,$this->datosCliente,$this->connexion);			
			tipo_fondo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_fondo,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			tipo_fondo_data::save($this->tipo_fondo, $this->connexion);	    	       	 						
			/*tipo_fondo_logic_add::checktipo_fondoToSaveAfter($this->tipo_fondo,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_fondoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_fondo,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_fondo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_fondo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_fondo_util::refrescarFKDescripcion($this->tipo_fondo);				
			}
			
			if($this->tipo_fondo->getIsDeleted()) {
				$this->tipo_fondo=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(tipo_fondo $tipo_fondo,Connexion $connexion)  {
		$tipo_fondoLogic = new  tipo_fondo_logic();		  		  
        try {		
			$tipo_fondoLogic->setConnexion($connexion);			
			$tipo_fondoLogic->settipo_fondo($tipo_fondo);			
			$tipo_fondoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*tipo_fondo_logic_add::checktipo_fondoToSaves($this->tipo_fondos,$this->datosCliente,$this->connexion);*/	        	
			//$this->tipo_fondoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_fondos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_fondos as $tipo_fondoLocal) {				
								
				//tipo_fondo_logic_add::updatetipo_fondoToSave($tipo_fondoLocal);	        	
				tipo_fondo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_fondoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				tipo_fondo_data::save($tipo_fondoLocal, $this->connexion);				
			}
			
			/*tipo_fondo_logic_add::checktipo_fondoToSavesAfter($this->tipo_fondos,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_fondoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_fondos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_fondo_util::refrescarFKDescripciones($this->tipo_fondos);
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
			/*tipo_fondo_logic_add::checktipo_fondoToSaves($this->tipo_fondos,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_fondoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_fondos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_fondos as $tipo_fondoLocal) {				
								
				//tipo_fondo_logic_add::updatetipo_fondoToSave($tipo_fondoLocal);	        	
				tipo_fondo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_fondoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				tipo_fondo_data::save($tipo_fondoLocal, $this->connexion);				
			}			
			
			/*tipo_fondo_logic_add::checktipo_fondoToSavesAfter($this->tipo_fondos,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_fondoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_fondos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_fondo_util::refrescarFKDescripciones($this->tipo_fondos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $tipo_fondos,Connexion $connexion)  {
		$tipo_fondoLogic = new  tipo_fondo_logic();
		  		  
        try {		
			$tipo_fondoLogic->setConnexion($connexion);			
			$tipo_fondoLogic->settipo_fondos($tipo_fondos);			
			$tipo_fondoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$tipo_fondosAux=array();
		
		foreach($this->tipo_fondos as $tipo_fondo) {
			if($tipo_fondo->getIsDeleted()==false) {
				$tipo_fondosAux[]=$tipo_fondo;
			}
		}
		
		$this->tipo_fondos=$tipo_fondosAux;
	}
	
	public function updateToGetsAuxiliar(array &$tipo_fondos) {
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
	
	
	
	public function saveRelacionesWithConnection($tipo_fondo) {
		$this->saveRelacionesBase($tipo_fondo,true);
	}

	public function saveRelaciones($tipo_fondo) {
		$this->saveRelacionesBase($tipo_fondo,false);
	}

	public function saveRelacionesBase($tipo_fondo,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->settipo_fondo($tipo_fondo);

				if(($this->tipo_fondo->getIsNew() || $this->tipo_fondo->getIsChanged()) && !$this->tipo_fondo->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->tipo_fondo->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $tipo_fondos,tipo_fondo_param_return $tipo_fondoParameterGeneral) : tipo_fondo_param_return {
		$tipo_fondoReturnGeneral=new tipo_fondo_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $tipo_fondoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $tipo_fondos,tipo_fondo_param_return $tipo_fondoParameterGeneral) : tipo_fondo_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_fondoReturnGeneral=new tipo_fondo_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_fondoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_fondos,tipo_fondo $tipo_fondo,tipo_fondo_param_return $tipo_fondoParameterGeneral,bool $isEsNuevotipo_fondo,array $clases) : tipo_fondo_param_return {
		 try {	
			$tipo_fondoReturnGeneral=new tipo_fondo_param_return();
	
			$tipo_fondoReturnGeneral->settipo_fondo($tipo_fondo);
			$tipo_fondoReturnGeneral->settipo_fondos($tipo_fondos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_fondoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $tipo_fondoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_fondos,tipo_fondo $tipo_fondo,tipo_fondo_param_return $tipo_fondoParameterGeneral,bool $isEsNuevotipo_fondo,array $clases) : tipo_fondo_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_fondoReturnGeneral=new tipo_fondo_param_return();
	
			$tipo_fondoReturnGeneral->settipo_fondo($tipo_fondo);
			$tipo_fondoReturnGeneral->settipo_fondos($tipo_fondos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_fondoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_fondoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_fondos,tipo_fondo $tipo_fondo,tipo_fondo_param_return $tipo_fondoParameterGeneral,bool $isEsNuevotipo_fondo,array $clases) : tipo_fondo_param_return {
		 try {	
			$tipo_fondoReturnGeneral=new tipo_fondo_param_return();
	
			$tipo_fondoReturnGeneral->settipo_fondo($tipo_fondo);
			$tipo_fondoReturnGeneral->settipo_fondos($tipo_fondos);
			
			
			
			return $tipo_fondoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_fondos,tipo_fondo $tipo_fondo,tipo_fondo_param_return $tipo_fondoParameterGeneral,bool $isEsNuevotipo_fondo,array $clases) : tipo_fondo_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_fondoReturnGeneral=new tipo_fondo_param_return();
	
			$tipo_fondoReturnGeneral->settipo_fondo($tipo_fondo);
			$tipo_fondoReturnGeneral->settipo_fondos($tipo_fondos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_fondoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,tipo_fondo $tipo_fondo,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,tipo_fondo $tipo_fondo,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		tipo_fondo_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(tipo_fondo $tipo_fondo,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_fondo_logic_add::updatetipo_fondoToGet($this->tipo_fondo);
			
			
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(tipo_fondo $tipo_fondo,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_fondo_logic_add::updatetipo_fondoToSave($this->tipo_fondo);			
			
			if(!$paraDeleteCascade) {				
				tipo_fondo_data::save($tipo_fondo, $this->connexion);
			}
			
			
			
			if($paraDeleteCascade) {				
				tipo_fondo_data::save($tipo_fondo, $this->connexion);
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
			
			$this->deepLoad($this->tipo_fondo,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->tipo_fondos as $tipo_fondo) {
				$this->deepLoad($tipo_fondo,$isDeep,$deepLoadType,$clases);
								
				tipo_fondo_util::refrescarFKDescripciones($this->tipo_fondos);
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
			
			foreach($this->tipo_fondos as $tipo_fondo) {
				$this->deepLoad($tipo_fondo,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->tipo_fondo,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->tipo_fondos as $tipo_fondo) {
				$this->deepSave($tipo_fondo,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->tipo_fondos as $tipo_fondo) {
				$this->deepSave($tipo_fondo,$isDeep,$deepLoadType,$clases,false);
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
	
	
	
	
	
	
	
	public function gettipo_fondo() : ?tipo_fondo {	
		/*
		tipo_fondo_logic_add::checktipo_fondoToGet($this->tipo_fondo,$this->datosCliente);
		tipo_fondo_logic_add::updatetipo_fondoToGet($this->tipo_fondo);
		*/
			
		return $this->tipo_fondo;
	}
		
	public function settipo_fondo(tipo_fondo $newtipo_fondo) {
		$this->tipo_fondo = $newtipo_fondo;
	}
	
	public function gettipo_fondos() : array {		
		/*
		tipo_fondo_logic_add::checktipo_fondoToGets($this->tipo_fondos,$this->datosCliente);
		
		foreach ($this->tipo_fondos as $tipo_fondoLocal ) {
			tipo_fondo_logic_add::updatetipo_fondoToGet($tipo_fondoLocal);
		}
		*/
		
		return $this->tipo_fondos;
	}
	
	public function settipo_fondos(array $newtipo_fondos) {
		$this->tipo_fondos = $newtipo_fondos;
	}
	
	public function gettipo_fondoDataAccess() : tipo_fondo_data {
		return $this->tipo_fondoDataAccess;
	}
	
	public function settipo_fondoDataAccess(tipo_fondo_data $newtipo_fondoDataAccess) {
		$this->tipo_fondoDataAccess = $newtipo_fondoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        tipo_fondo_carga::$CONTROLLER;;        
		
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
