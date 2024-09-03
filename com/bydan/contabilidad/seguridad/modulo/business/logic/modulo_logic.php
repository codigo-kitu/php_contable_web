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

namespace com\bydan\contabilidad\seguridad\modulo\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_param_return;

use com\bydan\contabilidad\seguridad\modulo\presentation\session\modulo_session;

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

use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;
use com\bydan\contabilidad\seguridad\auditoria\business\entity\auditoria;

use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\modulo\business\data\modulo_data;

//FK


use com\bydan\contabilidad\seguridad\sistema\business\entity\sistema;
use com\bydan\contabilidad\seguridad\sistema\business\data\sistema_data;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_util;

use com\bydan\contabilidad\seguridad\paquete\business\entity\paquete;
use com\bydan\contabilidad\seguridad\paquete\business\data\paquete_data;
use com\bydan\contabilidad\seguridad\paquete\business\logic\paquete_logic;
use com\bydan\contabilidad\seguridad\paquete\util\paquete_util;

use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\business\entity\tipo_tecla_mascara;
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\business\data\tipo_tecla_mascara_data;
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\business\logic\tipo_tecla_mascara_logic;
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\util\tipo_tecla_mascara_util;

//REL


//REL DETALLES




class modulo_logic  extends GeneralEntityLogic implements modulo_logicI {	
	/*GENERAL*/
	public modulo_data $moduloDataAccess;
	//public ?modulo_logic_add $moduloLogicAdditional=null;
	public ?modulo $modulo;
	public array $modulos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->moduloDataAccess = new modulo_data();			
			$this->modulos = array();
			$this->modulo = new modulo();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->moduloLogicAdditional = new modulo_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->moduloLogicAdditional==null) {
		//	$this->moduloLogicAdditional=new modulo_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->moduloDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->moduloDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->moduloDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->moduloDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->modulos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->modulos=$this->moduloDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				modulo_util::refrescarFKDescripciones($this->modulos);
			}
			
			//modulo_logic_add::checkmoduloToGets($this->modulos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->modulos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->modulos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->modulos=$this->moduloDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				modulo_util::refrescarFKDescripciones($this->modulos);
			}
			
			//modulo_logic_add::checkmoduloToGets($this->modulos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->modulos);
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
		$this->modulo = new modulo();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->modulo=$this->moduloDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->modulo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				modulo_util::refrescarFKDescripcion($this->modulo);
			}
						
			//modulo_logic_add::checkmoduloToGet($this->modulo,$this->datosCliente);
			//modulo_logic_add::updatemoduloToGet($this->modulo);
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
		$this->modulo = new  modulo();
		  		  
        try {		
			$this->modulo=$this->moduloDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->modulo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				modulo_util::refrescarFKDescripcion($this->modulo);
			}
			
			//modulo_logic_add::checkmoduloToGet($this->modulo,$this->datosCliente);
			//modulo_logic_add::updatemoduloToGet($this->modulo);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?modulo {
		$moduloLogic = new  modulo_logic();
		  		  
        try {		
			$moduloLogic->setConnexion($connexion);			
			$moduloLogic->getEntity($id);			
			return $moduloLogic->getmodulo();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->modulo = new  modulo();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->modulo=$this->moduloDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->modulo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				modulo_util::refrescarFKDescripcion($this->modulo);
			}
			
			//modulo_logic_add::checkmoduloToGet($this->modulo,$this->datosCliente);
			//modulo_logic_add::updatemoduloToGet($this->modulo);
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
		$this->modulo = new  modulo();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->modulo=$this->moduloDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->modulo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				modulo_util::refrescarFKDescripcion($this->modulo);
			}
			
			//modulo_logic_add::checkmoduloToGet($this->modulo,$this->datosCliente);
			//modulo_logic_add::updatemoduloToGet($this->modulo);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?modulo {
		$moduloLogic = new  modulo_logic();
		  		  
        try {		
			$moduloLogic->setConnexion($connexion);			
			$moduloLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $moduloLogic->getmodulo();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->modulos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->modulos=$this->moduloDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				modulo_util::refrescarFKDescripciones($this->modulos);
			}
			
			//modulo_logic_add::checkmoduloToGets($this->modulos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->modulos);			
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
		$this->modulos = array();
		  		  
        try {			
			$this->modulos=$this->moduloDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				modulo_util::refrescarFKDescripciones($this->modulos);
			}
			
			//modulo_logic_add::checkmoduloToGets($this->modulos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->modulos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->modulos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->modulos=$this->moduloDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				modulo_util::refrescarFKDescripciones($this->modulos);
			}
			
			//modulo_logic_add::checkmoduloToGets($this->modulos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->modulos);
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
		$this->modulos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->modulos=$this->moduloDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				modulo_util::refrescarFKDescripciones($this->modulos);
			}
			
			//modulo_logic_add::checkmoduloToGets($this->modulos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->modulos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$moduloLogic = new  modulo_logic();
		  		  
        try {		
			$moduloLogic->setConnexion($connexion);			
			$moduloLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $moduloLogic->getmodulos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->modulos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->modulos=$this->moduloDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				modulo_util::refrescarFKDescripciones($this->modulos);
			}
			
			//modulo_logic_add::checkmoduloToGets($this->modulos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->modulos);
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
		$this->modulos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->modulos=$this->moduloDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				modulo_util::refrescarFKDescripciones($this->modulos);
			}
			
			//modulo_logic_add::checkmoduloToGets($this->modulos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->modulos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->modulos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->modulos=$this->moduloDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				modulo_util::refrescarFKDescripciones($this->modulos);
			}
			
			//modulo_logic_add::checkmoduloToGets($this->modulos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->modulos);
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
		$this->modulos = array();
		  		  
        try {			
			$this->modulos=$this->moduloDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				modulo_util::refrescarFKDescripciones($this->modulos);
			}	
			
			//modulo_logic_add::checkmoduloToGets($this->modulos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->modulos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->modulos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->modulos=$this->moduloDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				modulo_util::refrescarFKDescripciones($this->modulos);
			}
			
			//modulo_logic_add::checkmoduloToGets($this->modulos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->modulos);
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
		$this->modulos = array();
		  		  
        try {		
			$this->modulos=$this->moduloDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				modulo_util::refrescarFKDescripciones($this->modulos);
			}
			
			//modulo_logic_add::checkmoduloToGets($this->modulos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->modulos);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdpaqueteWithConnection(string $strFinalQuery,Pagination $pagination,int $id_paquete) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_paquete= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_paquete->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_paquete,modulo_util::$ID_PAQUETE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_paquete);

			$this->modulos=$this->moduloDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				modulo_util::refrescarFKDescripciones($this->modulos);
			}
			//modulo_logic_add::checkmoduloToGets($this->modulos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->modulos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idpaquete(string $strFinalQuery,Pagination $pagination,int $id_paquete) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_paquete= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_paquete->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_paquete,modulo_util::$ID_PAQUETE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_paquete);

			$this->modulos=$this->moduloDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				modulo_util::refrescarFKDescripciones($this->modulos);
			}
			//modulo_logic_add::checkmoduloToGets($this->modulos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->modulos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdsistemaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_sistema) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sistema= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sistema->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sistema,modulo_util::$ID_SISTEMA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sistema);

			$this->modulos=$this->moduloDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				modulo_util::refrescarFKDescripciones($this->modulos);
			}
			//modulo_logic_add::checkmoduloToGets($this->modulos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->modulos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idsistema(string $strFinalQuery,Pagination $pagination,int $id_sistema) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sistema= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sistema->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sistema,modulo_util::$ID_SISTEMA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sistema);

			$this->modulos=$this->moduloDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				modulo_util::refrescarFKDescripciones($this->modulos);
			}
			//modulo_logic_add::checkmoduloToGets($this->modulos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->modulos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtipo_tecla_mascaraWithConnection(string $strFinalQuery,Pagination $pagination,int $id_tipo_tecla_mascara) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_tecla_mascara= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_tecla_mascara->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_tecla_mascara,modulo_util::$ID_TIPO_TECLA_MASCARA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_tecla_mascara);

			$this->modulos=$this->moduloDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				modulo_util::refrescarFKDescripciones($this->modulos);
			}
			//modulo_logic_add::checkmoduloToGets($this->modulos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->modulos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtipo_tecla_mascara(string $strFinalQuery,Pagination $pagination,int $id_tipo_tecla_mascara) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_tecla_mascara= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_tecla_mascara->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_tecla_mascara,modulo_util::$ID_TIPO_TECLA_MASCARA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_tecla_mascara);

			$this->modulos=$this->moduloDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				modulo_util::refrescarFKDescripciones($this->modulos);
			}
			//modulo_logic_add::checkmoduloToGets($this->modulos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->modulos);
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
						
			//modulo_logic_add::checkmoduloToSave($this->modulo,$this->datosCliente,$this->connexion);	       
			//modulo_logic_add::updatemoduloToSave($this->modulo);			
			modulo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->modulo,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->moduloLogicAdditional->checkGeneralEntityToSave($this,$this->modulo,$this->datosCliente,$this->connexion);
			
			
			modulo_data::save($this->modulo, $this->connexion);	    	       	 				
			//modulo_logic_add::checkmoduloToSaveAfter($this->modulo,$this->datosCliente,$this->connexion);			
			//$this->moduloLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->modulo,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->modulo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->modulo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				modulo_util::refrescarFKDescripcion($this->modulo);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->modulo->getIsDeleted()) {
				$this->modulo=null;
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
						
			/*modulo_logic_add::checkmoduloToSave($this->modulo,$this->datosCliente,$this->connexion);*/	        
			//modulo_logic_add::updatemoduloToSave($this->modulo);			
			//$this->moduloLogicAdditional->checkGeneralEntityToSave($this,$this->modulo,$this->datosCliente,$this->connexion);			
			modulo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->modulo,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			modulo_data::save($this->modulo, $this->connexion);	    	       	 						
			/*modulo_logic_add::checkmoduloToSaveAfter($this->modulo,$this->datosCliente,$this->connexion);*/			
			//$this->moduloLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->modulo,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->modulo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->modulo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				modulo_util::refrescarFKDescripcion($this->modulo);				
			}
			
			if($this->modulo->getIsDeleted()) {
				$this->modulo=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(modulo $modulo,Connexion $connexion)  {
		$moduloLogic = new  modulo_logic();		  		  
        try {		
			$moduloLogic->setConnexion($connexion);			
			$moduloLogic->setmodulo($modulo);			
			$moduloLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*modulo_logic_add::checkmoduloToSaves($this->modulos,$this->datosCliente,$this->connexion);*/	        	
			//$this->moduloLogicAdditional->checkGeneralEntitiesToSaves($this,$this->modulos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->modulos as $moduloLocal) {				
								
				//modulo_logic_add::updatemoduloToSave($moduloLocal);	        	
				modulo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$moduloLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				modulo_data::save($moduloLocal, $this->connexion);				
			}
			
			/*modulo_logic_add::checkmoduloToSavesAfter($this->modulos,$this->datosCliente,$this->connexion);*/			
			//$this->moduloLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->modulos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				modulo_util::refrescarFKDescripciones($this->modulos);
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
			/*modulo_logic_add::checkmoduloToSaves($this->modulos,$this->datosCliente,$this->connexion);*/			
			//$this->moduloLogicAdditional->checkGeneralEntitiesToSaves($this,$this->modulos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->modulos as $moduloLocal) {				
								
				//modulo_logic_add::updatemoduloToSave($moduloLocal);	        	
				modulo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$moduloLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				modulo_data::save($moduloLocal, $this->connexion);				
			}			
			
			/*modulo_logic_add::checkmoduloToSavesAfter($this->modulos,$this->datosCliente,$this->connexion);*/			
			//$this->moduloLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->modulos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				modulo_util::refrescarFKDescripciones($this->modulos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $modulos,Connexion $connexion)  {
		$moduloLogic = new  modulo_logic();
		  		  
        try {		
			$moduloLogic->setConnexion($connexion);			
			$moduloLogic->setmodulos($modulos);			
			$moduloLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$modulosAux=array();
		
		foreach($this->modulos as $modulo) {
			if($modulo->getIsDeleted()==false) {
				$modulosAux[]=$modulo;
			}
		}
		
		$this->modulos=$modulosAux;
	}
	
	public function updateToGetsAuxiliar(array &$modulos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->modulos as $modulo) {
				
				$modulo->setid_sistema_Descripcion(modulo_util::getsistemaDescripcion($modulo->getsistema()));
				$modulo->setid_paquete_Descripcion(modulo_util::getpaqueteDescripcion($modulo->getpaquete()));
				$modulo->setid_tipo_tecla_mascara_Descripcion(modulo_util::gettipo_tecla_mascaraDescripcion($modulo->gettipo_tecla_mascara()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$modulo_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$modulo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$modulo_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$modulo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$modulo_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$moduloForeignKey=new modulo_param_return();//moduloForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sistema',$strRecargarFkTipos,',')) {
				$this->cargarCombossistemasFK($this->connexion,$strRecargarFkQuery,$moduloForeignKey,$modulo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_paquete',$strRecargarFkTipos,',')) {
				$this->cargarCombospaquetesFK($this->connexion,$strRecargarFkQuery,$moduloForeignKey,$modulo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_tecla_mascara',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_tecla_mascarasFK($this->connexion,$strRecargarFkQuery,$moduloForeignKey,$modulo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sistema',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossistemasFK($this->connexion,' where id=-1 ',$moduloForeignKey,$modulo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_paquete',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombospaquetesFK($this->connexion,' where id=-1 ',$moduloForeignKey,$modulo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_tecla_mascara',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_tecla_mascarasFK($this->connexion,' where id=-1 ',$moduloForeignKey,$modulo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $moduloForeignKey;
			
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
	
	
	public function cargarCombossistemasFK($connexion=null,$strRecargarFkQuery='',$moduloForeignKey,$modulo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sistemaLogic= new sistema_logic();
		$pagination= new Pagination();
		$moduloForeignKey->sistemasFK=array();

		$sistemaLogic->setConnexion($connexion);
		$sistemaLogic->getsistemaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($modulo_session==null) {
			$modulo_session=new modulo_session();
		}
		
		if($modulo_session->bitBusquedaDesdeFKSesionsistema!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=sistema_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalsistema=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalsistema=Funciones::GetFinalQueryAppend($finalQueryGlobalsistema, '');
				$finalQueryGlobalsistema.=sistema_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalsistema.$strRecargarFkQuery;		

				$sistemaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($sistemaLogic->getsistemas() as $sistemaLocal ) {
				if($moduloForeignKey->idsistemaDefaultFK==0) {
					$moduloForeignKey->idsistemaDefaultFK=$sistemaLocal->getId();
				}

				$moduloForeignKey->sistemasFK[$sistemaLocal->getId()]=modulo_util::getsistemaDescripcion($sistemaLocal);
			}

		} else {

			if($modulo_session->bigidsistemaActual!=null && $modulo_session->bigidsistemaActual > 0) {
				$sistemaLogic->getEntity($modulo_session->bigidsistemaActual);//WithConnection

				$moduloForeignKey->sistemasFK[$sistemaLogic->getsistema()->getId()]=modulo_util::getsistemaDescripcion($sistemaLogic->getsistema());
				$moduloForeignKey->idsistemaDefaultFK=$sistemaLogic->getsistema()->getId();
			}
		}
	}

	public function cargarCombospaquetesFK($connexion=null,$strRecargarFkQuery='',$moduloForeignKey,$modulo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$paqueteLogic= new paquete_logic();
		$pagination= new Pagination();
		$moduloForeignKey->paquetesFK=array();

		$paqueteLogic->setConnexion($connexion);
		$paqueteLogic->getpaqueteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($modulo_session==null) {
			$modulo_session=new modulo_session();
		}
		
		if($modulo_session->bitBusquedaDesdeFKSesionpaquete!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=paquete_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalpaquete=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalpaquete=Funciones::GetFinalQueryAppend($finalQueryGlobalpaquete, '');
				$finalQueryGlobalpaquete.=paquete_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalpaquete.$strRecargarFkQuery;		

				$paqueteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($paqueteLogic->getpaquetes() as $paqueteLocal ) {
				if($moduloForeignKey->idpaqueteDefaultFK==0) {
					$moduloForeignKey->idpaqueteDefaultFK=$paqueteLocal->getId();
				}

				$moduloForeignKey->paquetesFK[$paqueteLocal->getId()]=modulo_util::getpaqueteDescripcion($paqueteLocal);
			}

		} else {

			if($modulo_session->bigidpaqueteActual!=null && $modulo_session->bigidpaqueteActual > 0) {
				$paqueteLogic->getEntity($modulo_session->bigidpaqueteActual);//WithConnection

				$moduloForeignKey->paquetesFK[$paqueteLogic->getpaquete()->getId()]=modulo_util::getpaqueteDescripcion($paqueteLogic->getpaquete());
				$moduloForeignKey->idpaqueteDefaultFK=$paqueteLogic->getpaquete()->getId();
			}
		}
	}

	public function cargarCombostipo_tecla_mascarasFK($connexion=null,$strRecargarFkQuery='',$moduloForeignKey,$modulo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_tecla_mascaraLogic= new tipo_tecla_mascara_logic();
		$pagination= new Pagination();
		$moduloForeignKey->tipo_tecla_mascarasFK=array();

		$tipo_tecla_mascaraLogic->setConnexion($connexion);
		$tipo_tecla_mascaraLogic->gettipo_tecla_mascaraDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($modulo_session==null) {
			$modulo_session=new modulo_session();
		}
		
		if($modulo_session->bitBusquedaDesdeFKSesiontipo_tecla_mascara!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_tecla_mascara_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltipo_tecla_mascara=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_tecla_mascara=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_tecla_mascara, '');
				$finalQueryGlobaltipo_tecla_mascara.=tipo_tecla_mascara_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_tecla_mascara.$strRecargarFkQuery;		

				$tipo_tecla_mascaraLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($tipo_tecla_mascaraLogic->gettipo_tecla_mascaras() as $tipo_tecla_mascaraLocal ) {
				if($moduloForeignKey->idtipo_tecla_mascaraDefaultFK==0) {
					$moduloForeignKey->idtipo_tecla_mascaraDefaultFK=$tipo_tecla_mascaraLocal->getId();
				}

				$moduloForeignKey->tipo_tecla_mascarasFK[$tipo_tecla_mascaraLocal->getId()]=modulo_util::gettipo_tecla_mascaraDescripcion($tipo_tecla_mascaraLocal);
			}

		} else {

			if($modulo_session->bigidtipo_tecla_mascaraActual!=null && $modulo_session->bigidtipo_tecla_mascaraActual > 0) {
				$tipo_tecla_mascaraLogic->getEntity($modulo_session->bigidtipo_tecla_mascaraActual);//WithConnection

				$moduloForeignKey->tipo_tecla_mascarasFK[$tipo_tecla_mascaraLogic->gettipo_tecla_mascara()->getId()]=modulo_util::gettipo_tecla_mascaraDescripcion($tipo_tecla_mascaraLogic->gettipo_tecla_mascara());
				$moduloForeignKey->idtipo_tecla_mascaraDefaultFK=$tipo_tecla_mascaraLogic->gettipo_tecla_mascara()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($modulo) {
		$this->saveRelacionesBase($modulo,true);
	}

	public function saveRelaciones($modulo) {
		$this->saveRelacionesBase($modulo,false);
	}

	public function saveRelacionesBase($modulo,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setmodulo($modulo);

				if(($this->modulo->getIsNew() || $this->modulo->getIsChanged()) && !$this->modulo->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->modulo->getIsDeleted()) {
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
	
	
	
	
	/*PROCESAR ACCIONES*/
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $modulos,modulo_param_return $moduloParameterGeneral) : modulo_param_return {
		$moduloReturnGeneral=new modulo_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $moduloReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $modulos,modulo_param_return $moduloParameterGeneral) : modulo_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$moduloReturnGeneral=new modulo_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $moduloReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $modulos,modulo $modulo,modulo_param_return $moduloParameterGeneral,bool $isEsNuevomodulo,array $clases) : modulo_param_return {
		 try {	
			$moduloReturnGeneral=new modulo_param_return();
	
			$moduloReturnGeneral->setmodulo($modulo);
			$moduloReturnGeneral->setmodulos($modulos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$moduloReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $moduloReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $modulos,modulo $modulo,modulo_param_return $moduloParameterGeneral,bool $isEsNuevomodulo,array $clases) : modulo_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$moduloReturnGeneral=new modulo_param_return();
	
			$moduloReturnGeneral->setmodulo($modulo);
			$moduloReturnGeneral->setmodulos($modulos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$moduloReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $moduloReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $modulos,modulo $modulo,modulo_param_return $moduloParameterGeneral,bool $isEsNuevomodulo,array $clases) : modulo_param_return {
		 try {	
			$moduloReturnGeneral=new modulo_param_return();
	
			$moduloReturnGeneral->setmodulo($modulo);
			$moduloReturnGeneral->setmodulos($modulos);
			
			
			
			return $moduloReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $modulos,modulo $modulo,modulo_param_return $moduloParameterGeneral,bool $isEsNuevomodulo,array $clases) : modulo_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$moduloReturnGeneral=new modulo_param_return();
	
			$moduloReturnGeneral->setmodulo($modulo);
			$moduloReturnGeneral->setmodulos($modulos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $moduloReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,modulo $modulo,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,modulo $modulo,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		modulo_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(modulo $modulo,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//modulo_logic_add::updatemoduloToGet($this->modulo);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$modulo->setsistema($this->moduloDataAccess->getsistema($this->connexion,$modulo));
		$modulo->setpaquete($this->moduloDataAccess->getpaquete($this->connexion,$modulo));
		$modulo->settipo_tecla_mascara($this->moduloDataAccess->gettipo_tecla_mascara($this->connexion,$modulo));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				$modulo->setsistema($this->moduloDataAccess->getsistema($this->connexion,$modulo));
				continue;
			}

			if($clas->clas==paquete::$class.'') {
				$modulo->setpaquete($this->moduloDataAccess->getpaquete($this->connexion,$modulo));
				continue;
			}

			if($clas->clas==tipo_tecla_mascara::$class.'') {
				$modulo->settipo_tecla_mascara($this->moduloDataAccess->gettipo_tecla_mascara($this->connexion,$modulo));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$modulo->setsistema($this->moduloDataAccess->getsistema($this->connexion,$modulo));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==paquete::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$modulo->setpaquete($this->moduloDataAccess->getpaquete($this->connexion,$modulo));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_tecla_mascara::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$modulo->settipo_tecla_mascara($this->moduloDataAccess->gettipo_tecla_mascara($this->connexion,$modulo));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$modulo->setsistema($this->moduloDataAccess->getsistema($this->connexion,$modulo));
		$sistemaLogic= new sistema_logic($this->connexion);
		$sistemaLogic->deepLoad($modulo->getsistema(),$isDeep,$deepLoadType,$clases);
				
		$modulo->setpaquete($this->moduloDataAccess->getpaquete($this->connexion,$modulo));
		$paqueteLogic= new paquete_logic($this->connexion);
		$paqueteLogic->deepLoad($modulo->getpaquete(),$isDeep,$deepLoadType,$clases);
				
		$modulo->settipo_tecla_mascara($this->moduloDataAccess->gettipo_tecla_mascara($this->connexion,$modulo));
		$tipo_tecla_mascaraLogic= new tipo_tecla_mascara_logic($this->connexion);
		$tipo_tecla_mascaraLogic->deepLoad($modulo->gettipo_tecla_mascara(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				$modulo->setsistema($this->moduloDataAccess->getsistema($this->connexion,$modulo));
				$sistemaLogic= new sistema_logic($this->connexion);
				$sistemaLogic->deepLoad($modulo->getsistema(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==paquete::$class.'') {
				$modulo->setpaquete($this->moduloDataAccess->getpaquete($this->connexion,$modulo));
				$paqueteLogic= new paquete_logic($this->connexion);
				$paqueteLogic->deepLoad($modulo->getpaquete(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_tecla_mascara::$class.'') {
				$modulo->settipo_tecla_mascara($this->moduloDataAccess->gettipo_tecla_mascara($this->connexion,$modulo));
				$tipo_tecla_mascaraLogic= new tipo_tecla_mascara_logic($this->connexion);
				$tipo_tecla_mascaraLogic->deepLoad($modulo->gettipo_tecla_mascara(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$modulo->setsistema($this->moduloDataAccess->getsistema($this->connexion,$modulo));
			$sistemaLogic= new sistema_logic($this->connexion);
			$sistemaLogic->deepLoad($modulo->getsistema(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==paquete::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$modulo->setpaquete($this->moduloDataAccess->getpaquete($this->connexion,$modulo));
			$paqueteLogic= new paquete_logic($this->connexion);
			$paqueteLogic->deepLoad($modulo->getpaquete(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_tecla_mascara::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$modulo->settipo_tecla_mascara($this->moduloDataAccess->gettipo_tecla_mascara($this->connexion,$modulo));
			$tipo_tecla_mascaraLogic= new tipo_tecla_mascara_logic($this->connexion);
			$tipo_tecla_mascaraLogic->deepLoad($modulo->gettipo_tecla_mascara(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(modulo $modulo,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//modulo_logic_add::updatemoduloToSave($this->modulo);			
			
			if(!$paraDeleteCascade) {				
				modulo_data::save($modulo, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		sistema_data::save($modulo->getsistema(),$this->connexion);
		paquete_data::save($modulo->getpaquete(),$this->connexion);
		tipo_tecla_mascara_data::save($modulo->gettipo_tecla_mascara(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				sistema_data::save($modulo->getsistema(),$this->connexion);
				continue;
			}

			if($clas->clas==paquete::$class.'') {
				paquete_data::save($modulo->getpaquete(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_tecla_mascara::$class.'') {
				tipo_tecla_mascara_data::save($modulo->gettipo_tecla_mascara(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sistema_data::save($modulo->getsistema(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==paquete::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			paquete_data::save($modulo->getpaquete(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_tecla_mascara::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_tecla_mascara_data::save($modulo->gettipo_tecla_mascara(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		sistema_data::save($modulo->getsistema(),$this->connexion);
		$sistemaLogic= new sistema_logic($this->connexion);
		$sistemaLogic->deepSave($modulo->getsistema(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		paquete_data::save($modulo->getpaquete(),$this->connexion);
		$paqueteLogic= new paquete_logic($this->connexion);
		$paqueteLogic->deepSave($modulo->getpaquete(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_tecla_mascara_data::save($modulo->gettipo_tecla_mascara(),$this->connexion);
		$tipo_tecla_mascaraLogic= new tipo_tecla_mascara_logic($this->connexion);
		$tipo_tecla_mascaraLogic->deepSave($modulo->gettipo_tecla_mascara(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				sistema_data::save($modulo->getsistema(),$this->connexion);
				$sistemaLogic= new sistema_logic($this->connexion);
				$sistemaLogic->deepSave($modulo->getsistema(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==paquete::$class.'') {
				paquete_data::save($modulo->getpaquete(),$this->connexion);
				$paqueteLogic= new paquete_logic($this->connexion);
				$paqueteLogic->deepSave($modulo->getpaquete(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_tecla_mascara::$class.'') {
				tipo_tecla_mascara_data::save($modulo->gettipo_tecla_mascara(),$this->connexion);
				$tipo_tecla_mascaraLogic= new tipo_tecla_mascara_logic($this->connexion);
				$tipo_tecla_mascaraLogic->deepSave($modulo->gettipo_tecla_mascara(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sistema_data::save($modulo->getsistema(),$this->connexion);
			$sistemaLogic= new sistema_logic($this->connexion);
			$sistemaLogic->deepSave($modulo->getsistema(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==paquete::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			paquete_data::save($modulo->getpaquete(),$this->connexion);
			$paqueteLogic= new paquete_logic($this->connexion);
			$paqueteLogic->deepSave($modulo->getpaquete(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_tecla_mascara::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_tecla_mascara_data::save($modulo->gettipo_tecla_mascara(),$this->connexion);
			$tipo_tecla_mascaraLogic= new tipo_tecla_mascara_logic($this->connexion);
			$tipo_tecla_mascaraLogic->deepSave($modulo->gettipo_tecla_mascara(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				modulo_data::save($modulo, $this->connexion);
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
			
			$this->deepLoad($this->modulo,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->modulos as $modulo) {
				$this->deepLoad($modulo,$isDeep,$deepLoadType,$clases);
								
				modulo_util::refrescarFKDescripciones($this->modulos);
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
			
			foreach($this->modulos as $modulo) {
				$this->deepLoad($modulo,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->modulo,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->modulos as $modulo) {
				$this->deepSave($modulo,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->modulos as $modulo) {
				$this->deepSave($modulo,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(sistema::$class);
				$classes[]=new Classe(paquete::$class);
				$classes[]=new Classe(tipo_tecla_mascara::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==sistema::$class) {
						$classes[]=new Classe(sistema::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==paquete::$class) {
						$classes[]=new Classe(paquete::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==tipo_tecla_mascara::$class) {
						$classes[]=new Classe(tipo_tecla_mascara::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==sistema::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(sistema::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==paquete::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(paquete::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==tipo_tecla_mascara::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_tecla_mascara::$class);
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
	
	
	
	
	
	
	
	public function getmodulo() : ?modulo {	
		/*
		modulo_logic_add::checkmoduloToGet($this->modulo,$this->datosCliente);
		modulo_logic_add::updatemoduloToGet($this->modulo);
		*/
			
		return $this->modulo;
	}
		
	public function setmodulo(modulo $newmodulo) {
		$this->modulo = $newmodulo;
	}
	
	public function getmodulos() : array {		
		/*
		modulo_logic_add::checkmoduloToGets($this->modulos,$this->datosCliente);
		
		foreach ($this->modulos as $moduloLocal ) {
			modulo_logic_add::updatemoduloToGet($moduloLocal);
		}
		*/
		
		return $this->modulos;
	}
	
	public function setmodulos(array $newmodulos) {
		$this->modulos = $newmodulos;
	}
	
	public function getmoduloDataAccess() : modulo_data {
		return $this->moduloDataAccess;
	}
	
	public function setmoduloDataAccess(modulo_data $newmoduloDataAccess) {
		$this->moduloDataAccess = $newmoduloDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        modulo_carga::$CONTROLLER;;        
		
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
