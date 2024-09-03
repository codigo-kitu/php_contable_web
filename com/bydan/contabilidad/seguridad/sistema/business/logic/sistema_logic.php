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

namespace com\bydan\contabilidad\seguridad\sistema\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\sistema\util\sistema_carga;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_param_return;


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

use com\bydan\contabilidad\seguridad\sistema\util\sistema_util;
use com\bydan\contabilidad\seguridad\sistema\business\entity\sistema;
use com\bydan\contabilidad\seguridad\sistema\business\data\sistema_data;

//FK


//REL


use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\business\data\perfil_data;
use com\bydan\contabilidad\seguridad\perfil\business\logic\perfil_logic;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;

use com\bydan\contabilidad\seguridad\opcion\business\data\opcion_data;
use com\bydan\contabilidad\seguridad\opcion\business\logic\opcion_logic;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_carga;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_util;

use com\bydan\contabilidad\seguridad\paquete\business\entity\paquete;
use com\bydan\contabilidad\seguridad\paquete\business\data\paquete_data;
use com\bydan\contabilidad\seguridad\paquete\business\logic\paquete_logic;
use com\bydan\contabilidad\seguridad\paquete\util\paquete_carga;
use com\bydan\contabilidad\seguridad\paquete\util\paquete_util;

use com\bydan\contabilidad\seguridad\modulo\business\data\modulo_data;
use com\bydan\contabilidad\seguridad\modulo\business\logic\modulo_logic;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;

//REL DETALLES

use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_carga;
use com\bydan\contabilidad\seguridad\accion\util\accion_carga;
use com\bydan\contabilidad\seguridad\perfil_accion\util\perfil_accion_carga;
use com\bydan\contabilidad\seguridad\campo\util\campo_carga;
use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_carga;



class sistema_logic  extends GeneralEntityLogic implements sistema_logicI {	
	/*GENERAL*/
	public sistema_data $sistemaDataAccess;
	public ?sistema_logic_add $sistemaLogicAdditional=null;
	public ?sistema $sistema;
	public array $sistemas;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->sistemaDataAccess = new sistema_data();			
			$this->sistemas = array();
			$this->sistema = new sistema();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->sistemaLogicAdditional = new sistema_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->sistemaLogicAdditional==null) {
			$this->sistemaLogicAdditional=new sistema_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->sistemaDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->sistemaDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->sistemaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->sistemaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->sistemas = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->sistemas=$this->sistemaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sistema_util::refrescarFKDescripciones($this->sistemas);
			}
			
			sistema_logic_add::checksistemaToGets($this->sistemas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sistemas);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->sistemas = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->sistemas=$this->sistemaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sistema_util::refrescarFKDescripciones($this->sistemas);
			}
			
			sistema_logic_add::checksistemaToGets($this->sistemas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sistemas);
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
		$this->sistema = new sistema();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->sistema=$this->sistemaDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->sistema,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				sistema_util::refrescarFKDescripcion($this->sistema);
			}
						
			sistema_logic_add::checksistemaToGet($this->sistema,$this->datosCliente);
			sistema_logic_add::updatesistemaToGet($this->sistema);
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
		$this->sistema = new  sistema();
		  		  
        try {		
			$this->sistema=$this->sistemaDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->sistema,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				sistema_util::refrescarFKDescripcion($this->sistema);
			}
			
			sistema_logic_add::checksistemaToGet($this->sistema,$this->datosCliente);
			sistema_logic_add::updatesistemaToGet($this->sistema);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?sistema {
		$sistemaLogic = new  sistema_logic();
		  		  
        try {		
			$sistemaLogic->setConnexion($connexion);			
			$sistemaLogic->getEntity($id);			
			return $sistemaLogic->getsistema();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->sistema = new  sistema();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->sistema=$this->sistemaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->sistema,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				sistema_util::refrescarFKDescripcion($this->sistema);
			}
			
			sistema_logic_add::checksistemaToGet($this->sistema,$this->datosCliente);
			sistema_logic_add::updatesistemaToGet($this->sistema);
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
		$this->sistema = new  sistema();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->sistema=$this->sistemaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->sistema,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				sistema_util::refrescarFKDescripcion($this->sistema);
			}
			
			sistema_logic_add::checksistemaToGet($this->sistema,$this->datosCliente);
			sistema_logic_add::updatesistemaToGet($this->sistema);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?sistema {
		$sistemaLogic = new  sistema_logic();
		  		  
        try {		
			$sistemaLogic->setConnexion($connexion);			
			$sistemaLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $sistemaLogic->getsistema();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->sistemas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->sistemas=$this->sistemaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sistema_util::refrescarFKDescripciones($this->sistemas);
			}
			
			sistema_logic_add::checksistemaToGets($this->sistemas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sistemas);			
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
		$this->sistemas = array();
		  		  
        try {			
			$this->sistemas=$this->sistemaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sistema_util::refrescarFKDescripciones($this->sistemas);
			}
			
			sistema_logic_add::checksistemaToGets($this->sistemas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sistemas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->sistemas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->sistemas=$this->sistemaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sistema_util::refrescarFKDescripciones($this->sistemas);
			}
			
			sistema_logic_add::checksistemaToGets($this->sistemas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sistemas);
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
		$this->sistemas = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->sistemas=$this->sistemaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sistema_util::refrescarFKDescripciones($this->sistemas);
			}
			
			sistema_logic_add::checksistemaToGets($this->sistemas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sistemas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$sistemaLogic = new  sistema_logic();
		  		  
        try {		
			$sistemaLogic->setConnexion($connexion);			
			$sistemaLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $sistemaLogic->getsistemas();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->sistemas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->sistemas=$this->sistemaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sistema_util::refrescarFKDescripciones($this->sistemas);
			}
			
			sistema_logic_add::checksistemaToGets($this->sistemas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sistemas);
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
		$this->sistemas = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->sistemas=$this->sistemaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sistema_util::refrescarFKDescripciones($this->sistemas);
			}
			
			sistema_logic_add::checksistemaToGets($this->sistemas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sistemas);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->sistemas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->sistemas=$this->sistemaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sistema_util::refrescarFKDescripciones($this->sistemas);
			}
			
			sistema_logic_add::checksistemaToGets($this->sistemas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sistemas);
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
		$this->sistemas = array();
		  		  
        try {			
			$this->sistemas=$this->sistemaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sistema_util::refrescarFKDescripciones($this->sistemas);
			}	
			
			sistema_logic_add::checksistemaToGets($this->sistemas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sistemas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->sistemas = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->sistemas=$this->sistemaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sistema_util::refrescarFKDescripciones($this->sistemas);
			}
			
			sistema_logic_add::checksistemaToGets($this->sistemas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sistemas);
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
		$this->sistemas = array();
		  		  
        try {		
			$this->sistemas=$this->sistemaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sistema_util::refrescarFKDescripciones($this->sistemas);
			}
			
			sistema_logic_add::checksistemaToGets($this->sistemas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sistemas);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsBusquedaPorNombrePrincipalWithConnection(string $strFinalQuery,Pagination $pagination,string $nombre_principal) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralnombre_principal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre_principal->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre_principal."%",sistema_util::$NOMBRE_PRINCIPAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre_principal);

			$this->sistemas=$this->sistemaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				sistema_util::refrescarFKDescripciones($this->sistemas);
			}
			sistema_logic_add::checksistemaToGets($this->sistemas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->sistemas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorNombrePrincipal(string $strFinalQuery,Pagination $pagination,string $nombre_principal) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralnombre_principal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre_principal->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre_principal."%",sistema_util::$NOMBRE_PRINCIPAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre_principal);

			$this->sistemas=$this->sistemaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				sistema_util::refrescarFKDescripciones($this->sistemas);
			}
			sistema_logic_add::checksistemaToGets($this->sistemas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->sistemas);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getPorCodigoWithConnection(string $codigo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$parameterSelectionGeneralcodigo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralcodigo->setParameterSelectionGeneralEqual(ParameterType::$STRING,$codigo,sistema_util::$CODIGO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralcodigo);

			$this->sistema=$this->sistemaDataAccess->getEntityConnexionWhereSelect($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoad($this->sistema,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());

				sistema_util::refrescarFKDescripcion($this->sistema);
			}

			sistema_logic_add::checksistemaToGet($this->sistema,$this->datosCliente);
			sistema_logic_add::updatesistemaToGet($this->sistema);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();
		}
	}

	public function getPorCodigo(string $codigo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$parameterSelectionGeneralcodigo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralcodigo->setParameterSelectionGeneralEqual(ParameterType::$STRING,$codigo,sistema_util::$CODIGO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralcodigo);

			$this->sistema=$this->sistemaDataAccess->getEntityConnexionWhereSelect($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoad($this->sistema,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());

				sistema_util::refrescarFKDescripcion($this->sistema);
			}

			sistema_logic_add::checksistemaToGet($this->sistema,$this->datosCliente);
			sistema_logic_add::updatesistemaToGet($this->sistema);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getPorNombrePrincipalWithConnection(string $nombre_principal) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$parameterSelectionGeneralnombre_principal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre_principal->setParameterSelectionGeneralEqual(ParameterType::$STRING,$nombre_principal,sistema_util::$NOMBRE_PRINCIPAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre_principal);

			$this->sistema=$this->sistemaDataAccess->getEntityConnexionWhereSelect($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoad($this->sistema,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());

				sistema_util::refrescarFKDescripcion($this->sistema);
			}

			sistema_logic_add::checksistemaToGet($this->sistema,$this->datosCliente);
			sistema_logic_add::updatesistemaToGet($this->sistema);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();
		}
	}

	public function getPorNombrePrincipal(string $nombre_principal) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$parameterSelectionGeneralnombre_principal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre_principal->setParameterSelectionGeneralEqual(ParameterType::$STRING,$nombre_principal,sistema_util::$NOMBRE_PRINCIPAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre_principal);

			$this->sistema=$this->sistemaDataAccess->getEntityConnexionWhereSelect($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoad($this->sistema,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());

				sistema_util::refrescarFKDescripcion($this->sistema);
			}

			sistema_logic_add::checksistemaToGet($this->sistema,$this->datosCliente);
			sistema_logic_add::updatesistemaToGet($this->sistema);
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
						
			//sistema_logic_add::checksistemaToSave($this->sistema,$this->datosCliente,$this->connexion);	       
			sistema_logic_add::updatesistemaToSave($this->sistema);			
			sistema_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->sistema,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->sistemaLogicAdditional->checkGeneralEntityToSave($this,$this->sistema,$this->datosCliente,$this->connexion);
			
			
			sistema_data::save($this->sistema, $this->connexion);	    	       	 				
			//sistema_logic_add::checksistemaToSaveAfter($this->sistema,$this->datosCliente,$this->connexion);			
			$this->sistemaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->sistema,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->sistema,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->sistema,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				sistema_util::refrescarFKDescripcion($this->sistema);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->sistema->getIsDeleted()) {
				$this->sistema=null;
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
						
			/*sistema_logic_add::checksistemaToSave($this->sistema,$this->datosCliente,$this->connexion);*/	        
			sistema_logic_add::updatesistemaToSave($this->sistema);			
			$this->sistemaLogicAdditional->checkGeneralEntityToSave($this,$this->sistema,$this->datosCliente,$this->connexion);			
			sistema_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->sistema,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			sistema_data::save($this->sistema, $this->connexion);	    	       	 						
			/*sistema_logic_add::checksistemaToSaveAfter($this->sistema,$this->datosCliente,$this->connexion);*/			
			$this->sistemaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->sistema,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->sistema,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->sistema,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				sistema_util::refrescarFKDescripcion($this->sistema);				
			}
			
			if($this->sistema->getIsDeleted()) {
				$this->sistema=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(sistema $sistema,Connexion $connexion)  {
		$sistemaLogic = new  sistema_logic();		  		  
        try {		
			$sistemaLogic->setConnexion($connexion);			
			$sistemaLogic->setsistema($sistema);			
			$sistemaLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*sistema_logic_add::checksistemaToSaves($this->sistemas,$this->datosCliente,$this->connexion);*/	        	
			$this->sistemaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->sistemas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->sistemas as $sistemaLocal) {				
								
				sistema_logic_add::updatesistemaToSave($sistemaLocal);	        	
				sistema_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$sistemaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				sistema_data::save($sistemaLocal, $this->connexion);				
			}
			
			/*sistema_logic_add::checksistemaToSavesAfter($this->sistemas,$this->datosCliente,$this->connexion);*/			
			$this->sistemaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->sistemas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sistema_util::refrescarFKDescripciones($this->sistemas);
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
			/*sistema_logic_add::checksistemaToSaves($this->sistemas,$this->datosCliente,$this->connexion);*/			
			$this->sistemaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->sistemas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->sistemas as $sistemaLocal) {				
								
				sistema_logic_add::updatesistemaToSave($sistemaLocal);	        	
				sistema_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$sistemaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				sistema_data::save($sistemaLocal, $this->connexion);				
			}			
			
			/*sistema_logic_add::checksistemaToSavesAfter($this->sistemas,$this->datosCliente,$this->connexion);*/			
			$this->sistemaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->sistemas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sistema_util::refrescarFKDescripciones($this->sistemas);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $sistemas,Connexion $connexion)  {
		$sistemaLogic = new  sistema_logic();
		  		  
        try {		
			$sistemaLogic->setConnexion($connexion);			
			$sistemaLogic->setsistemas($sistemas);			
			$sistemaLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$sistemasAux=array();
		
		foreach($this->sistemas as $sistema) {
			if($sistema->getIsDeleted()==false) {
				$sistemasAux[]=$sistema;
			}
		}
		
		$this->sistemas=$sistemasAux;
	}
	
	public function updateToGetsAuxiliar(array &$sistemas) {
		if($this->sistemaLogicAdditional==null) {
			$this->sistemaLogicAdditional=new sistema_logic_add();
		}
		
		
		$this->sistemaLogicAdditional->updateToGets($sistemas,$this);					
		$this->sistemaLogicAdditional->updateToGetsReferencia($sistemas,$this);			
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
	
	
	
	public function saveRelacionesWithConnection($sistema,$perfils,$opcions,$paquetes,$modulos) {
		$this->saveRelacionesBase($sistema,$perfils,$opcions,$paquetes,$modulos,true);
	}

	public function saveRelaciones($sistema,$perfils,$opcions,$paquetes,$modulos) {
		$this->saveRelacionesBase($sistema,$perfils,$opcions,$paquetes,$modulos,false);
	}

	public function saveRelacionesBase($sistema,$perfils=array(),$opcions=array(),$paquetes=array(),$modulos=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$sistema->setperfils($perfils);
			$sistema->setopcions($opcions);
			$sistema->setpaquetes($paquetes);
			$sistema->setmodulos($modulos);
			$this->setsistema($sistema);

			if(sistema_logic_add::validarSaveRelaciones($sistema,$this)) {

				sistema_logic_add::updateRelacionesToSave($sistema,$this);

				if(($this->sistema->getIsNew() || $this->sistema->getIsChanged()) && !$this->sistema->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($perfils,$opcions,$paquetes,$modulos);

				} else if($this->sistema->getIsDeleted()) {
					$this->saveRelacionesDetalles($perfils,$opcions,$paquetes,$modulos);
					$this->save();
				}

				sistema_logic_add::updateRelacionesToSaveAfter($sistema,$this);

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
	
	
	public function saveRelacionesDetalles($perfils=array(),$opcions=array(),$paquetes=array(),$modulos=array()) {
		try {
	

			$idsistemaActual=$this->getsistema()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/perfil_carga.php');
			perfil_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$perfilLogic_Desde_sistema=new perfil_logic();
			$perfilLogic_Desde_sistema->setperfils($perfils);

			$perfilLogic_Desde_sistema->setConnexion($this->getConnexion());
			$perfilLogic_Desde_sistema->setDatosCliente($this->datosCliente);

			foreach($perfilLogic_Desde_sistema->getperfils() as $perfil_Desde_sistema) {
				$perfil_Desde_sistema->setid_sistema($idsistemaActual);

				$perfilLogic_Desde_sistema->setperfil($perfil_Desde_sistema);
				$perfilLogic_Desde_sistema->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/opcion_carga.php');
			opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$opcionLogic_Desde_sistema=new opcion_logic();
			$opcionLogic_Desde_sistema->setopcions($opcions);

			$opcionLogic_Desde_sistema->setConnexion($this->getConnexion());
			$opcionLogic_Desde_sistema->setDatosCliente($this->datosCliente);

			foreach($opcionLogic_Desde_sistema->getopcions() as $opcion_Desde_sistema) {
				$opcion_Desde_sistema->setid_sistema($idsistemaActual);

				$opcionLogic_Desde_sistema->setopcion($opcion_Desde_sistema);
				$opcionLogic_Desde_sistema->save();

				$idopcionActual=$opcion_Desde_sistema->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/opcion_carga.php');
				opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$opcionLogicHijos_Desde_opcion=new opcion_logic();

				if($opcion_Desde_sistema->getopcions()==null){
					$opcion_Desde_sistema->setopcions(array());
				}

				$opcionLogicHijos_Desde_opcion->setopcions($opcion_Desde_sistema->getopcions());

				$opcionLogicHijos_Desde_opcion->setConnexion($this->getConnexion());
				$opcionLogicHijos_Desde_opcion->setDatosCliente($this->datosCliente);

				foreach($opcionLogicHijos_Desde_opcion->getopcions() as $opcionHijos_Desde_opcion) {
					$opcionHijos_Desde_opcion->setid_opcion($idopcionActual);

					$opcionLogicHijos_Desde_opcion->setopcion($opcionHijos_Desde_opcion);
					$opcionLogicHijos_Desde_opcion->save();
				}


				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/accion_carga.php');
				accion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$accionLogic_Desde_opcion=new accion_logic();

				if($opcion_Desde_sistema->getaccions()==null){
					$opcion_Desde_sistema->setaccions(array());
				}

				$accionLogic_Desde_opcion->setaccions($opcion_Desde_sistema->getaccions());

				$accionLogic_Desde_opcion->setConnexion($this->getConnexion());
				$accionLogic_Desde_opcion->setDatosCliente($this->datosCliente);

				foreach($accionLogic_Desde_opcion->getaccions() as $accion_Desde_opcion) {
					$accion_Desde_opcion->setid_opcion($idopcionActual);

					$accionLogic_Desde_opcion->setaccion($accion_Desde_opcion);
					$accionLogic_Desde_opcion->save();

					$idaccionActual=$accion_Desde_opcion->getId();

					include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/perfil_accion_carga.php');
					perfil_accion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

					$perfilaccionLogic_Desde_accion=new perfil_accion_logic();

					if($accion_Desde_opcion->getperfil_accions()==null){
						$accion_Desde_opcion->setperfil_accions(array());
					}

					$perfilaccionLogic_Desde_accion->setperfil_accions($accion_Desde_opcion->getperfil_accions());

					$perfilaccionLogic_Desde_accion->setConnexion($this->getConnexion());
					$perfilaccionLogic_Desde_accion->setDatosCliente($this->datosCliente);

					foreach($perfilaccionLogic_Desde_accion->getperfil_accions() as $perfilaccion_Desde_accion) {
						$perfilaccion_Desde_accion->setid_accion($idaccionActual);
					}

					$perfilaccionLogic_Desde_accion->saves();
				}


				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/perfil_opcion_carga.php');
				perfil_opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$perfilopcionLogic_Desde_opcion=new perfil_opcion_logic();

				if($opcion_Desde_sistema->getperfil_opcions()==null){
					$opcion_Desde_sistema->setperfil_opcions(array());
				}

				$perfilopcionLogic_Desde_opcion->setperfil_opcions($opcion_Desde_sistema->getperfil_opcions());

				$perfilopcionLogic_Desde_opcion->setConnexion($this->getConnexion());
				$perfilopcionLogic_Desde_opcion->setDatosCliente($this->datosCliente);

				foreach($perfilopcionLogic_Desde_opcion->getperfil_opcions() as $perfilopcion_Desde_opcion) {
					$perfilopcion_Desde_opcion->setid_opcion($idopcionActual);
				}

				$perfilopcionLogic_Desde_opcion->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/campo_carga.php');
				campo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$campoLogic_Desde_opcion=new campo_logic();

				if($opcion_Desde_sistema->getcampos()==null){
					$opcion_Desde_sistema->setcampos(array());
				}

				$campoLogic_Desde_opcion->setcampos($opcion_Desde_sistema->getcampos());

				$campoLogic_Desde_opcion->setConnexion($this->getConnexion());
				$campoLogic_Desde_opcion->setDatosCliente($this->datosCliente);

				foreach($campoLogic_Desde_opcion->getcampos() as $campo_Desde_opcion) {
					$campo_Desde_opcion->setid_opcion($idopcionActual);

					$campoLogic_Desde_opcion->setcampo($campo_Desde_opcion);
					$campoLogic_Desde_opcion->save();

					$idcampoActual=$campo_Desde_opcion->getId();

					include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/perfil_campo_carga.php');
					perfil_campo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

					$perfilcampoLogic_Desde_campo=new perfil_campo_logic();

					if($campo_Desde_opcion->getperfil_campos()==null){
						$campo_Desde_opcion->setperfil_campos(array());
					}

					$perfilcampoLogic_Desde_campo->setperfil_campos($campo_Desde_opcion->getperfil_campos());

					$perfilcampoLogic_Desde_campo->setConnexion($this->getConnexion());
					$perfilcampoLogic_Desde_campo->setDatosCliente($this->datosCliente);

					foreach($perfilcampoLogic_Desde_campo->getperfil_campos() as $perfilcampo_Desde_campo) {
						$perfilcampo_Desde_campo->setid_campo($idcampoActual);
					}

					$perfilcampoLogic_Desde_campo->saves();
				}

			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/paquete_carga.php');
			paquete_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$paqueteLogic_Desde_sistema=new paquete_logic();
			$paqueteLogic_Desde_sistema->setpaquetes($paquetes);

			$paqueteLogic_Desde_sistema->setConnexion($this->getConnexion());
			$paqueteLogic_Desde_sistema->setDatosCliente($this->datosCliente);

			foreach($paqueteLogic_Desde_sistema->getpaquetes() as $paquete_Desde_sistema) {
				$paquete_Desde_sistema->setid_sistema($idsistemaActual);

				$paqueteLogic_Desde_sistema->setpaquete($paquete_Desde_sistema);
				$paqueteLogic_Desde_sistema->save();

				$idpaqueteActual=$paquete_Desde_sistema->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/modulo_carga.php');
				modulo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$moduloLogic_Desde_paquete=new modulo_logic();

				if($paquete_Desde_sistema->getmodulos()==null){
					$paquete_Desde_sistema->setmodulos(array());
				}

				$moduloLogic_Desde_paquete->setmodulos($paquete_Desde_sistema->getmodulos());

				$moduloLogic_Desde_paquete->setConnexion($this->getConnexion());
				$moduloLogic_Desde_paquete->setDatosCliente($this->datosCliente);

				foreach($moduloLogic_Desde_paquete->getmodulos() as $modulo_Desde_paquete) {
					$modulo_Desde_paquete->setid_paquete($idpaqueteActual);
				}

				$moduloLogic_Desde_paquete->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/modulo_carga.php');
			modulo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$moduloLogic_Desde_sistema=new modulo_logic();
			$moduloLogic_Desde_sistema->setmodulos($modulos);

			$moduloLogic_Desde_sistema->setConnexion($this->getConnexion());
			$moduloLogic_Desde_sistema->setDatosCliente($this->datosCliente);

			foreach($moduloLogic_Desde_sistema->getmodulos() as $modulo_Desde_sistema) {
				$modulo_Desde_sistema->setid_sistema($idsistemaActual);
			}

			$moduloLogic_Desde_sistema->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $sistemas,sistema_param_return $sistemaParameterGeneral) : sistema_param_return {
		$sistemaReturnGeneral=new sistema_param_return();
	
		 try {	
			
			if($this->sistemaLogicAdditional==null) {
				$this->sistemaLogicAdditional=new sistema_logic_add();
			}
			
			$this->sistemaLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$sistemas,$sistemaParameterGeneral,$sistemaReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $sistemaReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $sistemas,sistema_param_return $sistemaParameterGeneral) : sistema_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$sistemaReturnGeneral=new sistema_param_return();
	
			
			if($this->sistemaLogicAdditional==null) {
				$this->sistemaLogicAdditional=new sistema_logic_add();
			}
			
			$this->sistemaLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$sistemas,$sistemaParameterGeneral,$sistemaReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $sistemaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $sistemas,sistema $sistema,sistema_param_return $sistemaParameterGeneral,bool $isEsNuevosistema,array $clases) : sistema_param_return {
		 try {	
			$sistemaReturnGeneral=new sistema_param_return();
	
			$sistemaReturnGeneral->setsistema($sistema);
			$sistemaReturnGeneral->setsistemas($sistemas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$sistemaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->sistemaLogicAdditional==null) {
				$this->sistemaLogicAdditional=new sistema_logic_add();
			}
			
			$sistemaReturnGeneral=$this->sistemaLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$sistemas,$sistema,$sistemaParameterGeneral,$sistemaReturnGeneral,$isEsNuevosistema,$clases);
			
			/*sistemaLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$sistemas,$sistema,$sistemaParameterGeneral,$sistemaReturnGeneral,$isEsNuevosistema,$clases);*/
			
			return $sistemaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $sistemas,sistema $sistema,sistema_param_return $sistemaParameterGeneral,bool $isEsNuevosistema,array $clases) : sistema_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$sistemaReturnGeneral=new sistema_param_return();
	
			$sistemaReturnGeneral->setsistema($sistema);
			$sistemaReturnGeneral->setsistemas($sistemas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$sistemaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->sistemaLogicAdditional==null) {
				$this->sistemaLogicAdditional=new sistema_logic_add();
			}
			
			$sistemaReturnGeneral=$this->sistemaLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$sistemas,$sistema,$sistemaParameterGeneral,$sistemaReturnGeneral,$isEsNuevosistema,$clases);
			
			/*sistemaLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$sistemas,$sistema,$sistemaParameterGeneral,$sistemaReturnGeneral,$isEsNuevosistema,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $sistemaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $sistemas,sistema $sistema,sistema_param_return $sistemaParameterGeneral,bool $isEsNuevosistema,array $clases) : sistema_param_return {
		 try {	
			$sistemaReturnGeneral=new sistema_param_return();
	
			$sistemaReturnGeneral->setsistema($sistema);
			$sistemaReturnGeneral->setsistemas($sistemas);
			
			
			
			if($this->sistemaLogicAdditional==null) {
				$this->sistemaLogicAdditional=new sistema_logic_add();
			}
			
			$sistemaReturnGeneral=$this->sistemaLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$sistemas,$sistema,$sistemaParameterGeneral,$sistemaReturnGeneral,$isEsNuevosistema,$clases);
			
			/*sistemaLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$sistemas,$sistema,$sistemaParameterGeneral,$sistemaReturnGeneral,$isEsNuevosistema,$clases);*/
			
			return $sistemaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $sistemas,sistema $sistema,sistema_param_return $sistemaParameterGeneral,bool $isEsNuevosistema,array $clases) : sistema_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$sistemaReturnGeneral=new sistema_param_return();
	
			$sistemaReturnGeneral->setsistema($sistema);
			$sistemaReturnGeneral->setsistemas($sistemas);
			
			
			if($this->sistemaLogicAdditional==null) {
				$this->sistemaLogicAdditional=new sistema_logic_add();
			}
			
			$sistemaReturnGeneral=$this->sistemaLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$sistemas,$sistema,$sistemaParameterGeneral,$sistemaReturnGeneral,$isEsNuevosistema,$clases);
			
			/*sistemaLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$sistemas,$sistema,$sistemaParameterGeneral,$sistemaReturnGeneral,$isEsNuevosistema,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $sistemaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,sistema $sistema,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,sistema $sistema,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		sistema_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(sistema $sistema,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			sistema_logic_add::updatesistemaToGet($this->sistema);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$sistema->setperfils($this->sistemaDataAccess->getperfils($this->connexion,$sistema));
		$sistema->setopcions($this->sistemaDataAccess->getopcions($this->connexion,$sistema));
		$sistema->setpaquetes($this->sistemaDataAccess->getpaquetes($this->connexion,$sistema));
		$sistema->setmodulos($this->sistemaDataAccess->getmodulos($this->connexion,$sistema));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$sistema->setperfils($this->sistemaDataAccess->getperfils($this->connexion,$sistema));

				if($this->isConDeep) {
					$perfilLogic= new perfil_logic($this->connexion);
					$perfilLogic->setperfils($sistema->getperfils());
					$classesLocal=perfil_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$perfilLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					perfil_util::refrescarFKDescripciones($perfilLogic->getperfils());
					$sistema->setperfils($perfilLogic->getperfils());
				}

				continue;
			}

			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$sistema->setopcions($this->sistemaDataAccess->getopcions($this->connexion,$sistema));

				if($this->isConDeep) {
					$opcionLogic= new opcion_logic($this->connexion);
					$opcionLogic->setopcions($sistema->getopcions());
					$classesLocal=opcion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$opcionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					opcion_util::refrescarFKDescripciones($opcionLogic->getopcions());
					$sistema->setopcions($opcionLogic->getopcions());
				}

				continue;
			}

			if($clas->clas==paquete::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$sistema->setpaquetes($this->sistemaDataAccess->getpaquetes($this->connexion,$sistema));

				if($this->isConDeep) {
					$paqueteLogic= new paquete_logic($this->connexion);
					$paqueteLogic->setpaquetes($sistema->getpaquetes());
					$classesLocal=paquete_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$paqueteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					paquete_util::refrescarFKDescripciones($paqueteLogic->getpaquetes());
					$sistema->setpaquetes($paqueteLogic->getpaquetes());
				}

				continue;
			}

			if($clas->clas==modulo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$sistema->setmodulos($this->sistemaDataAccess->getmodulos($this->connexion,$sistema));

				if($this->isConDeep) {
					$moduloLogic= new modulo_logic($this->connexion);
					$moduloLogic->setmodulos($sistema->getmodulos());
					$classesLocal=modulo_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$moduloLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					modulo_util::refrescarFKDescripciones($moduloLogic->getmodulos());
					$sistema->setmodulos($moduloLogic->getmodulos());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


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
			$sistema->setperfils($this->sistemaDataAccess->getperfils($this->connexion,$sistema));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(opcion::$class);
			$sistema->setopcions($this->sistemaDataAccess->getopcions($this->connexion,$sistema));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==paquete::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(paquete::$class);
			$sistema->setpaquetes($this->sistemaDataAccess->getpaquetes($this->connexion,$sistema));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(modulo::$class);
			$sistema->setmodulos($this->sistemaDataAccess->getmodulos($this->connexion,$sistema));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$sistema->setperfils($this->sistemaDataAccess->getperfils($this->connexion,$sistema));

		foreach($sistema->getperfils() as $perfil) {
			$perfilLogic= new perfil_logic($this->connexion);
			$perfilLogic->deepLoad($perfil,$isDeep,$deepLoadType,$clases);
		}

		$sistema->setopcions($this->sistemaDataAccess->getopcions($this->connexion,$sistema));

		foreach($sistema->getopcions() as $opcion) {
			$opcionLogic= new opcion_logic($this->connexion);
			$opcionLogic->deepLoad($opcion,$isDeep,$deepLoadType,$clases);
		}

		$sistema->setpaquetes($this->sistemaDataAccess->getpaquetes($this->connexion,$sistema));

		foreach($sistema->getpaquetes() as $paquete) {
			$paqueteLogic= new paquete_logic($this->connexion);
			$paqueteLogic->deepLoad($paquete,$isDeep,$deepLoadType,$clases);
		}

		$sistema->setmodulos($this->sistemaDataAccess->getmodulos($this->connexion,$sistema));

		foreach($sistema->getmodulos() as $modulo) {
			$moduloLogic= new modulo_logic($this->connexion);
			$moduloLogic->deepLoad($modulo,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$sistema->setperfils($this->sistemaDataAccess->getperfils($this->connexion,$sistema));

				foreach($sistema->getperfils() as $perfil) {
					$perfilLogic= new perfil_logic($this->connexion);
					$perfilLogic->deepLoad($perfil,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$sistema->setopcions($this->sistemaDataAccess->getopcions($this->connexion,$sistema));

				foreach($sistema->getopcions() as $opcion) {
					$opcionLogic= new opcion_logic($this->connexion);
					$opcionLogic->deepLoad($opcion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==paquete::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$sistema->setpaquetes($this->sistemaDataAccess->getpaquetes($this->connexion,$sistema));

				foreach($sistema->getpaquetes() as $paquete) {
					$paqueteLogic= new paquete_logic($this->connexion);
					$paqueteLogic->deepLoad($paquete,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==modulo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$sistema->setmodulos($this->sistemaDataAccess->getmodulos($this->connexion,$sistema));

				foreach($sistema->getmodulos() as $modulo) {
					$moduloLogic= new modulo_logic($this->connexion);
					$moduloLogic->deepLoad($modulo,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


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
			$sistema->setperfils($this->sistemaDataAccess->getperfils($this->connexion,$sistema));

			foreach($sistema->getperfils() as $perfil) {
				$perfilLogic= new perfil_logic($this->connexion);
				$perfilLogic->deepLoad($perfil,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(opcion::$class);
			$sistema->setopcions($this->sistemaDataAccess->getopcions($this->connexion,$sistema));

			foreach($sistema->getopcions() as $opcion) {
				$opcionLogic= new opcion_logic($this->connexion);
				$opcionLogic->deepLoad($opcion,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==paquete::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(paquete::$class);
			$sistema->setpaquetes($this->sistemaDataAccess->getpaquetes($this->connexion,$sistema));

			foreach($sistema->getpaquetes() as $paquete) {
				$paqueteLogic= new paquete_logic($this->connexion);
				$paqueteLogic->deepLoad($paquete,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(modulo::$class);
			$sistema->setmodulos($this->sistemaDataAccess->getmodulos($this->connexion,$sistema));

			foreach($sistema->getmodulos() as $modulo) {
				$moduloLogic= new modulo_logic($this->connexion);
				$moduloLogic->deepLoad($modulo,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(sistema $sistema,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			sistema_logic_add::updatesistemaToSave($this->sistema);			
			
			if(!$paraDeleteCascade) {				
				sistema_data::save($sistema, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($sistema->getperfils() as $perfil) {
			$perfil->setid_sistema($sistema->getId());
			perfil_data::save($perfil,$this->connexion);
		}


		foreach($sistema->getopcions() as $opcion) {
			$opcion->setid_sistema($sistema->getId());
			opcion_data::save($opcion,$this->connexion);
		}


		foreach($sistema->getpaquetes() as $paquete) {
			$paquete->setid_sistema($sistema->getId());
			paquete_data::save($paquete,$this->connexion);
		}


		foreach($sistema->getmodulos() as $modulo) {
			$modulo->setid_sistema($sistema->getId());
			modulo_data::save($modulo,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($sistema->getperfils() as $perfil) {
					$perfil->setid_sistema($sistema->getId());
					perfil_data::save($perfil,$this->connexion);
				}

				continue;
			}

			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($sistema->getopcions() as $opcion) {
					$opcion->setid_sistema($sistema->getId());
					opcion_data::save($opcion,$this->connexion);
				}

				continue;
			}

			if($clas->clas==paquete::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($sistema->getpaquetes() as $paquete) {
					$paquete->setid_sistema($sistema->getId());
					paquete_data::save($paquete,$this->connexion);
				}

				continue;
			}

			if($clas->clas==modulo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($sistema->getmodulos() as $modulo) {
					$modulo->setid_sistema($sistema->getId());
					modulo_data::save($modulo,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


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

			foreach($sistema->getperfils() as $perfil) {
				$perfil->setid_sistema($sistema->getId());
				perfil_data::save($perfil,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(opcion::$class);

			foreach($sistema->getopcions() as $opcion) {
				$opcion->setid_sistema($sistema->getId());
				opcion_data::save($opcion,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==paquete::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(paquete::$class);

			foreach($sistema->getpaquetes() as $paquete) {
				$paquete->setid_sistema($sistema->getId());
				paquete_data::save($paquete,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(modulo::$class);

			foreach($sistema->getmodulos() as $modulo) {
				$modulo->setid_sistema($sistema->getId());
				modulo_data::save($modulo,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($sistema->getperfils() as $perfil) {
			$perfilLogic= new perfil_logic($this->connexion);
			$perfil->setid_sistema($sistema->getId());
			perfil_data::save($perfil,$this->connexion);
			$perfilLogic->deepSave($perfil,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($sistema->getopcions() as $opcion) {
			$opcionLogic= new opcion_logic($this->connexion);
			$opcion->setid_sistema($sistema->getId());
			opcion_data::save($opcion,$this->connexion);
			$opcionLogic->deepSave($opcion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($sistema->getpaquetes() as $paquete) {
			$paqueteLogic= new paquete_logic($this->connexion);
			$paquete->setid_sistema($sistema->getId());
			paquete_data::save($paquete,$this->connexion);
			$paqueteLogic->deepSave($paquete,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($sistema->getmodulos() as $modulo) {
			$moduloLogic= new modulo_logic($this->connexion);
			$modulo->setid_sistema($sistema->getId());
			modulo_data::save($modulo,$this->connexion);
			$moduloLogic->deepSave($modulo,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==perfil::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($sistema->getperfils() as $perfil) {
					$perfilLogic= new perfil_logic($this->connexion);
					$perfil->setid_sistema($sistema->getId());
					perfil_data::save($perfil,$this->connexion);
					$perfilLogic->deepSave($perfil,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($sistema->getopcions() as $opcion) {
					$opcionLogic= new opcion_logic($this->connexion);
					$opcion->setid_sistema($sistema->getId());
					opcion_data::save($opcion,$this->connexion);
					$opcionLogic->deepSave($opcion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==paquete::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($sistema->getpaquetes() as $paquete) {
					$paqueteLogic= new paquete_logic($this->connexion);
					$paquete->setid_sistema($sistema->getId());
					paquete_data::save($paquete,$this->connexion);
					$paqueteLogic->deepSave($paquete,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==modulo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($sistema->getmodulos() as $modulo) {
					$moduloLogic= new modulo_logic($this->connexion);
					$modulo->setid_sistema($sistema->getId());
					modulo_data::save($modulo,$this->connexion);
					$moduloLogic->deepSave($modulo,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {



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

			foreach($sistema->getperfils() as $perfil) {
				$perfilLogic= new perfil_logic($this->connexion);
				$perfil->setid_sistema($sistema->getId());
				perfil_data::save($perfil,$this->connexion);
				$perfilLogic->deepSave($perfil,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(opcion::$class);

			foreach($sistema->getopcions() as $opcion) {
				$opcionLogic= new opcion_logic($this->connexion);
				$opcion->setid_sistema($sistema->getId());
				opcion_data::save($opcion,$this->connexion);
				$opcionLogic->deepSave($opcion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==paquete::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(paquete::$class);

			foreach($sistema->getpaquetes() as $paquete) {
				$paqueteLogic= new paquete_logic($this->connexion);
				$paquete->setid_sistema($sistema->getId());
				paquete_data::save($paquete,$this->connexion);
				$paqueteLogic->deepSave($paquete,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(modulo::$class);

			foreach($sistema->getmodulos() as $modulo) {
				$moduloLogic= new modulo_logic($this->connexion);
				$modulo->setid_sistema($sistema->getId());
				modulo_data::save($modulo,$this->connexion);
				$moduloLogic->deepSave($modulo,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				sistema_data::save($sistema, $this->connexion);
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
			
			$this->deepLoad($this->sistema,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->sistemas as $sistema) {
				$this->deepLoad($sistema,$isDeep,$deepLoadType,$clases);
								
				sistema_util::refrescarFKDescripciones($this->sistemas);
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
			
			foreach($this->sistemas as $sistema) {
				$this->deepLoad($sistema,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->sistema,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->sistemas as $sistema) {
				$this->deepSave($sistema,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->sistemas as $sistema) {
				$this->deepSave($sistema,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(perfil::$class);
				$classes[]=new Classe(opcion::$class);
				$classes[]=new Classe(paquete::$class);
				$classes[]=new Classe(modulo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==perfil::$class) {
						$classes[]=new Classe(perfil::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==opcion::$class) {
						$classes[]=new Classe(opcion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==paquete::$class) {
						$classes[]=new Classe(paquete::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==modulo::$class) {
						$classes[]=new Classe(modulo::$class);
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
					if($clas->clas==opcion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(opcion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==paquete::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(paquete::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==modulo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(modulo::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getsistema() : ?sistema {	
		/*
		sistema_logic_add::checksistemaToGet($this->sistema,$this->datosCliente);
		sistema_logic_add::updatesistemaToGet($this->sistema);
		*/
			
		return $this->sistema;
	}
		
	public function setsistema(sistema $newsistema) {
		$this->sistema = $newsistema;
	}
	
	public function getsistemas() : array {		
		/*
		sistema_logic_add::checksistemaToGets($this->sistemas,$this->datosCliente);
		
		foreach ($this->sistemas as $sistemaLocal ) {
			sistema_logic_add::updatesistemaToGet($sistemaLocal);
		}
		*/
		
		return $this->sistemas;
	}
	
	public function setsistemas(array $newsistemas) {
		$this->sistemas = $newsistemas;
	}
	
	public function getsistemaDataAccess() : sistema_data {
		return $this->sistemaDataAccess;
	}
	
	public function setsistemaDataAccess(sistema_data $newsistemaDataAccess) {
		$this->sistemaDataAccess = $newsistemaDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        sistema_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		perfil_opcion_logic::$logger;
		accion_logic::$logger;
		perfil_accion_logic::$logger;
		campo_logic::$logger;
		perfil_campo_logic::$logger;
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
