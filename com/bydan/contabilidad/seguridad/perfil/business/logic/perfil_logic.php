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

namespace com\bydan\contabilidad\seguridad\perfil\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_param_return;

use com\bydan\contabilidad\seguridad\perfil\presentation\session\perfil_session;

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

use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;
use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\business\data\perfil_data;

//FK


use com\bydan\contabilidad\seguridad\sistema\business\entity\sistema;
use com\bydan\contabilidad\seguridad\sistema\business\data\sistema_data;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_util;

//REL


use com\bydan\contabilidad\seguridad\perfil_accion\business\entity\perfil_accion;
use com\bydan\contabilidad\seguridad\perfil_accion\business\data\perfil_accion_data;
use com\bydan\contabilidad\seguridad\perfil_accion\business\logic\perfil_accion_logic;
use com\bydan\contabilidad\seguridad\perfil_accion\util\perfil_accion_carga;
use com\bydan\contabilidad\seguridad\perfil_accion\util\perfil_accion_util;

use com\bydan\contabilidad\seguridad\perfil_campo\business\entity\perfil_campo;
use com\bydan\contabilidad\seguridad\perfil_campo\business\data\perfil_campo_data;
use com\bydan\contabilidad\seguridad\perfil_campo\business\logic\perfil_campo_logic;
use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_carga;
use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_util;

use com\bydan\contabilidad\seguridad\accion\business\entity\accion;
use com\bydan\contabilidad\seguridad\accion\business\data\accion_data;
use com\bydan\contabilidad\seguridad\accion\business\logic\accion_logic;
use com\bydan\contabilidad\seguridad\accion\util\accion_carga;
use com\bydan\contabilidad\seguridad\accion\util\accion_util;

use com\bydan\contabilidad\seguridad\perfil_opcion\business\entity\perfil_opcion;
use com\bydan\contabilidad\seguridad\perfil_opcion\business\data\perfil_opcion_data;
use com\bydan\contabilidad\seguridad\perfil_opcion\business\logic\perfil_opcion_logic;
use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_carga;
use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_util;

use com\bydan\contabilidad\seguridad\perfil_usuario\business\entity\perfil_usuario;
use com\bydan\contabilidad\seguridad\perfil_usuario\business\data\perfil_usuario_data;
use com\bydan\contabilidad\seguridad\perfil_usuario\business\logic\perfil_usuario_logic;
use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_carga;
use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_util;

use com\bydan\contabilidad\seguridad\campo\business\entity\campo;
use com\bydan\contabilidad\seguridad\campo\business\data\campo_data;
use com\bydan\contabilidad\seguridad\campo\business\logic\campo_logic;
use com\bydan\contabilidad\seguridad\campo\util\campo_carga;
use com\bydan\contabilidad\seguridad\campo\util\campo_util;

use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\seguridad\opcion\business\data\opcion_data;
use com\bydan\contabilidad\seguridad\opcion\business\logic\opcion_logic;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_carga;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_util;

//REL DETALLES




class perfil_logic  extends GeneralEntityLogic implements perfil_logicI {	
	/*GENERAL*/
	public perfil_data $perfilDataAccess;
	//public ?perfil_logic_add $perfilLogicAdditional=null;
	public ?perfil $perfil;
	public array $perfils;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->perfilDataAccess = new perfil_data();			
			$this->perfils = array();
			$this->perfil = new perfil();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->perfilLogicAdditional = new perfil_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->perfilLogicAdditional==null) {
		//	$this->perfilLogicAdditional=new perfil_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->perfilDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->perfilDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->perfilDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->perfilDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->perfils = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfils=$this->perfilDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_util::refrescarFKDescripciones($this->perfils);
			}
			
			//perfil_logic_add::checkperfilToGets($this->perfils,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfils);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->perfils = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfils=$this->perfilDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_util::refrescarFKDescripciones($this->perfils);
			}
			
			//perfil_logic_add::checkperfilToGets($this->perfils,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfils);
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
		$this->perfil = new perfil();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->perfil=$this->perfilDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->perfil,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				perfil_util::refrescarFKDescripcion($this->perfil);
			}
						
			//perfil_logic_add::checkperfilToGet($this->perfil,$this->datosCliente);
			//perfil_logic_add::updateperfilToGet($this->perfil);
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
		$this->perfil = new  perfil();
		  		  
        try {		
			$this->perfil=$this->perfilDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->perfil,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				perfil_util::refrescarFKDescripcion($this->perfil);
			}
			
			//perfil_logic_add::checkperfilToGet($this->perfil,$this->datosCliente);
			//perfil_logic_add::updateperfilToGet($this->perfil);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?perfil {
		$perfilLogic = new  perfil_logic();
		  		  
        try {		
			$perfilLogic->setConnexion($connexion);			
			$perfilLogic->getEntity($id);			
			return $perfilLogic->getperfil();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->perfil = new  perfil();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->perfil=$this->perfilDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->perfil,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				perfil_util::refrescarFKDescripcion($this->perfil);
			}
			
			//perfil_logic_add::checkperfilToGet($this->perfil,$this->datosCliente);
			//perfil_logic_add::updateperfilToGet($this->perfil);
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
		$this->perfil = new  perfil();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil=$this->perfilDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->perfil,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				perfil_util::refrescarFKDescripcion($this->perfil);
			}
			
			//perfil_logic_add::checkperfilToGet($this->perfil,$this->datosCliente);
			//perfil_logic_add::updateperfilToGet($this->perfil);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?perfil {
		$perfilLogic = new  perfil_logic();
		  		  
        try {		
			$perfilLogic->setConnexion($connexion);			
			$perfilLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $perfilLogic->getperfil();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->perfils = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->perfils=$this->perfilDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_util::refrescarFKDescripciones($this->perfils);
			}
			
			//perfil_logic_add::checkperfilToGets($this->perfils,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfils);			
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
		$this->perfils = array();
		  		  
        try {			
			$this->perfils=$this->perfilDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_util::refrescarFKDescripciones($this->perfils);
			}
			
			//perfil_logic_add::checkperfilToGets($this->perfils,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfils);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->perfils = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfils=$this->perfilDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_util::refrescarFKDescripciones($this->perfils);
			}
			
			//perfil_logic_add::checkperfilToGets($this->perfils,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfils);
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
		$this->perfils = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfils=$this->perfilDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_util::refrescarFKDescripciones($this->perfils);
			}
			
			//perfil_logic_add::checkperfilToGets($this->perfils,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfils);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$perfilLogic = new  perfil_logic();
		  		  
        try {		
			$perfilLogic->setConnexion($connexion);			
			$perfilLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $perfilLogic->getperfils();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->perfils = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->perfils=$this->perfilDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_util::refrescarFKDescripciones($this->perfils);
			}
			
			//perfil_logic_add::checkperfilToGets($this->perfils,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfils);
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
		$this->perfils = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfils=$this->perfilDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_util::refrescarFKDescripciones($this->perfils);
			}
			
			//perfil_logic_add::checkperfilToGets($this->perfils,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfils);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->perfils = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfils=$this->perfilDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_util::refrescarFKDescripciones($this->perfils);
			}
			
			//perfil_logic_add::checkperfilToGets($this->perfils,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfils);
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
		$this->perfils = array();
		  		  
        try {			
			$this->perfils=$this->perfilDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_util::refrescarFKDescripciones($this->perfils);
			}	
			
			//perfil_logic_add::checkperfilToGets($this->perfils,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfils);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->perfils = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->perfils=$this->perfilDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_util::refrescarFKDescripciones($this->perfils);
			}
			
			//perfil_logic_add::checkperfilToGets($this->perfils,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfils);
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
		$this->perfils = array();
		  		  
        try {		
			$this->perfils=$this->perfilDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_util::refrescarFKDescripciones($this->perfils);
			}
			
			//perfil_logic_add::checkperfilToGets($this->perfils,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfils);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsBusquedaPorNombreWithConnection(string $strFinalQuery,Pagination $pagination,string $nombre) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralnombre= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre."%",perfil_util::$NOMBRE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre);

			$this->perfils=$this->perfilDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_util::refrescarFKDescripciones($this->perfils);
			}
			//perfil_logic_add::checkperfilToGets($this->perfils,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfils);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorNombre(string $strFinalQuery,Pagination $pagination,string $nombre) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralnombre= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre."%",perfil_util::$NOMBRE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre);

			$this->perfils=$this->perfilDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_util::refrescarFKDescripciones($this->perfils);
			}
			//perfil_logic_add::checkperfilToGets($this->perfils,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfils);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsBusquedaPorNombre2WithConnection(string $strFinalQuery,Pagination $pagination,string $nombre2) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralnombre2= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre2->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre2."%",perfil_util::$NOMBRE2,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre2);

			$this->perfils=$this->perfilDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_util::refrescarFKDescripciones($this->perfils);
			}
			//perfil_logic_add::checkperfilToGets($this->perfils,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfils);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorNombre2(string $strFinalQuery,Pagination $pagination,string $nombre2) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralnombre2= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre2->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre2."%",perfil_util::$NOMBRE2,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre2);

			$this->perfils=$this->perfilDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_util::refrescarFKDescripciones($this->perfils);
			}
			//perfil_logic_add::checkperfilToGets($this->perfils,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfils);
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
			$parameterSelectionGeneralid_sistema->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sistema,perfil_util::$ID_SISTEMA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sistema);

			$this->perfils=$this->perfilDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_util::refrescarFKDescripciones($this->perfils);
			}
			//perfil_logic_add::checkperfilToGets($this->perfils,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfils);

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
			$parameterSelectionGeneralid_sistema->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sistema,perfil_util::$ID_SISTEMA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sistema);

			$this->perfils=$this->perfilDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_util::refrescarFKDescripciones($this->perfils);
			}
			//perfil_logic_add::checkperfilToGets($this->perfils,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfils);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getPorIdSistemaPorNombreWithConnection(int $id_sistema,string $nombre) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$parameterSelectionGeneralid_sistema= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sistema->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sistema,perfil_util::$ID_SISTEMA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sistema);

			$parameterSelectionGeneralnombre= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre->setParameterSelectionGeneralEqual(ParameterType::$STRING,$nombre,perfil_util::$NOMBRE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre);

			$this->perfil=$this->perfilDataAccess->getEntityConnexionWhereSelect($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoad($this->perfil,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());

				perfil_util::refrescarFKDescripcion($this->perfil);
			}

			//perfil_logic_add::checkperfilToGet($this->perfil,$this->datosCliente);
			//perfil_logic_add::updateperfilToGet($this->perfil);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();
		}
	}

	public function getPorIdSistemaPorNombre(int $id_sistema,string $nombre) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$parameterSelectionGeneralid_sistema= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sistema->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sistema,perfil_util::$ID_SISTEMA,ParameterTypeOperator::$AND);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sistema);

			$parameterSelectionGeneralnombre= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre->setParameterSelectionGeneralEqual(ParameterType::$STRING,$nombre,perfil_util::$NOMBRE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre);

			$this->perfil=$this->perfilDataAccess->getEntityConnexionWhereSelect($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoad($this->perfil,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());

				perfil_util::refrescarFKDescripcion($this->perfil);
			}

			//perfil_logic_add::checkperfilToGet($this->perfil,$this->datosCliente);
			//perfil_logic_add::updateperfilToGet($this->perfil);
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
						
			//perfil_logic_add::checkperfilToSave($this->perfil,$this->datosCliente,$this->connexion);	       
			//perfil_logic_add::updateperfilToSave($this->perfil);			
			perfil_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->perfil,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->perfilLogicAdditional->checkGeneralEntityToSave($this,$this->perfil,$this->datosCliente,$this->connexion);
			
			
			perfil_data::save($this->perfil, $this->connexion);	    	       	 				
			//perfil_logic_add::checkperfilToSaveAfter($this->perfil,$this->datosCliente,$this->connexion);			
			//$this->perfilLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->perfil,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->perfil,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->perfil,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				perfil_util::refrescarFKDescripcion($this->perfil);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->perfil->getIsDeleted()) {
				$this->perfil=null;
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
						
			/*perfil_logic_add::checkperfilToSave($this->perfil,$this->datosCliente,$this->connexion);*/	        
			//perfil_logic_add::updateperfilToSave($this->perfil);			
			//$this->perfilLogicAdditional->checkGeneralEntityToSave($this,$this->perfil,$this->datosCliente,$this->connexion);			
			perfil_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->perfil,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			perfil_data::save($this->perfil, $this->connexion);	    	       	 						
			/*perfil_logic_add::checkperfilToSaveAfter($this->perfil,$this->datosCliente,$this->connexion);*/			
			//$this->perfilLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->perfil,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->perfil,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->perfil,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				perfil_util::refrescarFKDescripcion($this->perfil);				
			}
			
			if($this->perfil->getIsDeleted()) {
				$this->perfil=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(perfil $perfil,Connexion $connexion)  {
		$perfilLogic = new  perfil_logic();		  		  
        try {		
			$perfilLogic->setConnexion($connexion);			
			$perfilLogic->setperfil($perfil);			
			$perfilLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*perfil_logic_add::checkperfilToSaves($this->perfils,$this->datosCliente,$this->connexion);*/	        	
			//$this->perfilLogicAdditional->checkGeneralEntitiesToSaves($this,$this->perfils,$this->datosCliente,$this->connexion);
			
	   		foreach($this->perfils as $perfilLocal) {				
								
				//perfil_logic_add::updateperfilToSave($perfilLocal);	        	
				perfil_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$perfilLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				perfil_data::save($perfilLocal, $this->connexion);				
			}
			
			/*perfil_logic_add::checkperfilToSavesAfter($this->perfils,$this->datosCliente,$this->connexion);*/			
			//$this->perfilLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->perfils,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_util::refrescarFKDescripciones($this->perfils);
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
			/*perfil_logic_add::checkperfilToSaves($this->perfils,$this->datosCliente,$this->connexion);*/			
			//$this->perfilLogicAdditional->checkGeneralEntitiesToSaves($this,$this->perfils,$this->datosCliente,$this->connexion);
			
	   		foreach($this->perfils as $perfilLocal) {				
								
				//perfil_logic_add::updateperfilToSave($perfilLocal);	        	
				perfil_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$perfilLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				perfil_data::save($perfilLocal, $this->connexion);				
			}			
			
			/*perfil_logic_add::checkperfilToSavesAfter($this->perfils,$this->datosCliente,$this->connexion);*/			
			//$this->perfilLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->perfils,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_util::refrescarFKDescripciones($this->perfils);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $perfils,Connexion $connexion)  {
		$perfilLogic = new  perfil_logic();
		  		  
        try {		
			$perfilLogic->setConnexion($connexion);			
			$perfilLogic->setperfils($perfils);			
			$perfilLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$perfilsAux=array();
		
		foreach($this->perfils as $perfil) {
			if($perfil->getIsDeleted()==false) {
				$perfilsAux[]=$perfil;
			}
		}
		
		$this->perfils=$perfilsAux;
	}
	
	public function updateToGetsAuxiliar(array &$perfils) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->perfils as $perfil) {
				
				$perfil->setid_sistema_Descripcion(perfil_util::getsistemaDescripcion($perfil->getsistema()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$perfil_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$perfil_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$perfil_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$perfil_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$perfil_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$perfilForeignKey=new perfil_param_return();//perfilForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sistema',$strRecargarFkTipos,',')) {
				$this->cargarCombossistemasFK($this->connexion,$strRecargarFkQuery,$perfilForeignKey,$perfil_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sistema',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossistemasFK($this->connexion,' where id=-1 ',$perfilForeignKey,$perfil_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $perfilForeignKey;
			
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
	
	
	public function cargarCombossistemasFK($connexion=null,$strRecargarFkQuery='',$perfilForeignKey,$perfil_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sistemaLogic= new sistema_logic();
		$pagination= new Pagination();
		$perfilForeignKey->sistemasFK=array();

		$sistemaLogic->setConnexion($connexion);
		$sistemaLogic->getsistemaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($perfil_session==null) {
			$perfil_session=new perfil_session();
		}
		
		if($perfil_session->bitBusquedaDesdeFKSesionsistema!=true) {
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
				if($perfilForeignKey->idsistemaDefaultFK==0) {
					$perfilForeignKey->idsistemaDefaultFK=$sistemaLocal->getId();
				}

				$perfilForeignKey->sistemasFK[$sistemaLocal->getId()]=perfil_util::getsistemaDescripcion($sistemaLocal);
			}

		} else {

			if($perfil_session->bigidsistemaActual!=null && $perfil_session->bigidsistemaActual > 0) {
				$sistemaLogic->getEntity($perfil_session->bigidsistemaActual);//WithConnection

				$perfilForeignKey->sistemasFK[$sistemaLogic->getsistema()->getId()]=perfil_util::getsistemaDescripcion($sistemaLogic->getsistema());
				$perfilForeignKey->idsistemaDefaultFK=$sistemaLogic->getsistema()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($perfil,$perfilaccions,$perfilcampos,$perfilopcions,$perfilusuarios) {
		$this->saveRelacionesBase($perfil,$perfilaccions,$perfilcampos,$perfilopcions,$perfilusuarios,true);
	}

	public function saveRelaciones($perfil,$perfilaccions,$perfilcampos,$perfilopcions,$perfilusuarios) {
		$this->saveRelacionesBase($perfil,$perfilaccions,$perfilcampos,$perfilopcions,$perfilusuarios,false);
	}

	public function saveRelacionesBase($perfil,$perfilaccions=array(),$perfilcampos=array(),$perfilopcions=array(),$perfilusuarios=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$perfil->setperfil_accions($perfilaccions);
			$perfil->setperfil_campos($perfilcampos);
			$perfil->setperfil_opcions($perfilopcions);
			$perfil->setperfil_usuarios($perfilusuarios);
			$this->setperfil($perfil);

			if(true) {

				//perfil_logic_add::updateRelacionesToSave($perfil,$this);

				if(($this->perfil->getIsNew() || $this->perfil->getIsChanged()) && !$this->perfil->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($perfilaccions,$perfilcampos,$perfilopcions,$perfilusuarios);

				} else if($this->perfil->getIsDeleted()) {
					$this->saveRelacionesDetalles($perfilaccions,$perfilcampos,$perfilopcions,$perfilusuarios);
					$this->save();
				}

				//perfil_logic_add::updateRelacionesToSaveAfter($perfil,$this);

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
	
	
	public function saveRelacionesDetalles($perfilaccions=array(),$perfilcampos=array(),$perfilopcions=array(),$perfilusuarios=array()) {
		try {
	

			$idperfilActual=$this->getperfil()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/perfil_accion_carga.php');
			perfil_accion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$perfilaccionLogic_Desde_perfil=new perfil_accion_logic();
			$perfilaccionLogic_Desde_perfil->setperfil_accions($perfilaccions);

			$perfilaccionLogic_Desde_perfil->setConnexion($this->getConnexion());
			$perfilaccionLogic_Desde_perfil->setDatosCliente($this->datosCliente);

			foreach($perfilaccionLogic_Desde_perfil->getperfil_accions() as $perfilaccion_Desde_perfil) {
				$perfilaccion_Desde_perfil->setid_perfil($idperfilActual);
			}

			$perfilaccionLogic_Desde_perfil->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/perfil_campo_carga.php');
			perfil_campo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$perfilcampoLogic_Desde_perfil=new perfil_campo_logic();
			$perfilcampoLogic_Desde_perfil->setperfil_campos($perfilcampos);

			$perfilcampoLogic_Desde_perfil->setConnexion($this->getConnexion());
			$perfilcampoLogic_Desde_perfil->setDatosCliente($this->datosCliente);

			foreach($perfilcampoLogic_Desde_perfil->getperfil_campos() as $perfilcampo_Desde_perfil) {
				$perfilcampo_Desde_perfil->setid_perfil($idperfilActual);
			}

			$perfilcampoLogic_Desde_perfil->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/perfil_opcion_carga.php');
			perfil_opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$perfilopcionLogic_Desde_perfil=new perfil_opcion_logic();
			$perfilopcionLogic_Desde_perfil->setperfil_opcions($perfilopcions);

			$perfilopcionLogic_Desde_perfil->setConnexion($this->getConnexion());
			$perfilopcionLogic_Desde_perfil->setDatosCliente($this->datosCliente);

			foreach($perfilopcionLogic_Desde_perfil->getperfil_opcions() as $perfilopcion_Desde_perfil) {
				$perfilopcion_Desde_perfil->setid_perfil($idperfilActual);
			}

			$perfilopcionLogic_Desde_perfil->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/perfil_usuario_carga.php');
			perfil_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$perfilusuarioLogic_Desde_perfil=new perfil_usuario_logic();
			$perfilusuarioLogic_Desde_perfil->setperfil_usuarios($perfilusuarios);

			$perfilusuarioLogic_Desde_perfil->setConnexion($this->getConnexion());
			$perfilusuarioLogic_Desde_perfil->setDatosCliente($this->datosCliente);

			foreach($perfilusuarioLogic_Desde_perfil->getperfil_usuarios() as $perfilusuario_Desde_perfil) {
				$perfilusuario_Desde_perfil->setid_perfil($idperfilActual);
			}

			$perfilusuarioLogic_Desde_perfil->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $perfils,perfil_param_return $perfilParameterGeneral) : perfil_param_return {
		$perfilReturnGeneral=new perfil_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $perfilReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $perfils,perfil_param_return $perfilParameterGeneral) : perfil_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$perfilReturnGeneral=new perfil_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $perfilReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $perfils,perfil $perfil,perfil_param_return $perfilParameterGeneral,bool $isEsNuevoperfil,array $clases) : perfil_param_return {
		 try {	
			$perfilReturnGeneral=new perfil_param_return();
	
			$perfilReturnGeneral->setperfil($perfil);
			$perfilReturnGeneral->setperfils($perfils);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$perfilReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $perfilReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $perfils,perfil $perfil,perfil_param_return $perfilParameterGeneral,bool $isEsNuevoperfil,array $clases) : perfil_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$perfilReturnGeneral=new perfil_param_return();
	
			$perfilReturnGeneral->setperfil($perfil);
			$perfilReturnGeneral->setperfils($perfils);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$perfilReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $perfilReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $perfils,perfil $perfil,perfil_param_return $perfilParameterGeneral,bool $isEsNuevoperfil,array $clases) : perfil_param_return {
		 try {	
			$perfilReturnGeneral=new perfil_param_return();
	
			$perfilReturnGeneral->setperfil($perfil);
			$perfilReturnGeneral->setperfils($perfils);
			
			
			
			return $perfilReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $perfils,perfil $perfil,perfil_param_return $perfilParameterGeneral,bool $isEsNuevoperfil,array $clases) : perfil_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$perfilReturnGeneral=new perfil_param_return();
	
			$perfilReturnGeneral->setperfil($perfil);
			$perfilReturnGeneral->setperfils($perfils);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $perfilReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,perfil $perfil,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,perfil $perfil,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		perfil_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		perfil_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(perfil $perfil,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//perfil_logic_add::updateperfilToGet($this->perfil);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$perfil->setsistema($this->perfilDataAccess->getsistema($this->connexion,$perfil));
		$perfil->setperfil_accions($this->perfilDataAccess->getperfil_accions($this->connexion,$perfil));
		$perfil->setperfil_campos($this->perfilDataAccess->getperfil_campos($this->connexion,$perfil));
		$perfil->setaccions($this->perfilDataAccess->getaccions($this->connexion,$perfil));
		$perfil->setperfil_opcions($this->perfilDataAccess->getperfil_opcions($this->connexion,$perfil));
		$perfil->setperfil_usuarios($this->perfilDataAccess->getperfil_usuarios($this->connexion,$perfil));
		$perfil->setcampos($this->perfilDataAccess->getcampos($this->connexion,$perfil));
		$perfil->setusuarios($this->perfilDataAccess->getusuarios($this->connexion,$perfil));
		$perfil->setopcions($this->perfilDataAccess->getopcions($this->connexion,$perfil));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				$perfil->setsistema($this->perfilDataAccess->getsistema($this->connexion,$perfil));
				continue;
			}

			if($clas->clas==perfil_accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$perfil->setperfil_accions($this->perfilDataAccess->getperfil_accions($this->connexion,$perfil));

				if($this->isConDeep) {
					$perfilaccionLogic= new perfil_accion_logic($this->connexion);
					$perfilaccionLogic->setperfil_accions($perfil->getperfil_accions());
					$classesLocal=perfil_accion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$perfilaccionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					perfil_accion_util::refrescarFKDescripciones($perfilaccionLogic->getperfil_accions());
					$perfil->setperfil_accions($perfilaccionLogic->getperfil_accions());
				}

				continue;
			}

			if($clas->clas==perfil_campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$perfil->setperfil_campos($this->perfilDataAccess->getperfil_campos($this->connexion,$perfil));

				if($this->isConDeep) {
					$perfilcampoLogic= new perfil_campo_logic($this->connexion);
					$perfilcampoLogic->setperfil_campos($perfil->getperfil_campos());
					$classesLocal=perfil_campo_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$perfilcampoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					perfil_campo_util::refrescarFKDescripciones($perfilcampoLogic->getperfil_campos());
					$perfil->setperfil_campos($perfilcampoLogic->getperfil_campos());
				}

				continue;
			}

			if($clas->clas==accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$perfil->setaccions($this->perfilDataAccess->getaccions($this->connexion,$perfil));

				if($this->isConDeep) {
					$accionLogic= new accion_logic($this->connexion);
					$accionLogic->setaccions($perfil->getaccions());
					$classesLocal=accion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$accionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					accion_util::refrescarFKDescripciones($accionLogic->getaccions());
					$perfil->setaccions($accionLogic->getaccions());
				}

				continue;
			}

			if($clas->clas==perfil_opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$perfil->setperfil_opcions($this->perfilDataAccess->getperfil_opcions($this->connexion,$perfil));

				if($this->isConDeep) {
					$perfilopcionLogic= new perfil_opcion_logic($this->connexion);
					$perfilopcionLogic->setperfil_opcions($perfil->getperfil_opcions());
					$classesLocal=perfil_opcion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$perfilopcionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					perfil_opcion_util::refrescarFKDescripciones($perfilopcionLogic->getperfil_opcions());
					$perfil->setperfil_opcions($perfilopcionLogic->getperfil_opcions());
				}

				continue;
			}

			if($clas->clas==perfil_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$perfil->setperfil_usuarios($this->perfilDataAccess->getperfil_usuarios($this->connexion,$perfil));

				if($this->isConDeep) {
					$perfilusuarioLogic= new perfil_usuario_logic($this->connexion);
					$perfilusuarioLogic->setperfil_usuarios($perfil->getperfil_usuarios());
					$classesLocal=perfil_usuario_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$perfilusuarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					perfil_usuario_util::refrescarFKDescripciones($perfilusuarioLogic->getperfil_usuarios());
					$perfil->setperfil_usuarios($perfilusuarioLogic->getperfil_usuarios());
				}

				continue;
			}

			if($clas->clas==campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$perfil->setcampos($this->perfilDataAccess->getcampos($this->connexion,$perfil));

				if($this->isConDeep) {
					$campoLogic= new campo_logic($this->connexion);
					$campoLogic->setcampos($perfil->getcampos());
					$classesLocal=campo_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$campoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					campo_util::refrescarFKDescripciones($campoLogic->getcampos());
					$perfil->setcampos($campoLogic->getcampos());
				}

				continue;
			}

			if($clas->clas==usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$perfil->setusuarios($this->perfilDataAccess->getusuarios($this->connexion,$perfil));

				if($this->isConDeep) {
					$usuarioLogic= new usuario_logic($this->connexion);
					$usuarioLogic->setusuarios($perfil->getusuarios());
					$classesLocal=usuario_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$usuarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					usuario_util::refrescarFKDescripciones($usuarioLogic->getusuarios());
					$perfil->setusuarios($usuarioLogic->getusuarios());
				}

				continue;
			}

			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$perfil->setopcions($this->perfilDataAccess->getopcions($this->connexion,$perfil));

				if($this->isConDeep) {
					$opcionLogic= new opcion_logic($this->connexion);
					$opcionLogic->setopcions($perfil->getopcions());
					$classesLocal=opcion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$opcionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					opcion_util::refrescarFKDescripciones($opcionLogic->getopcions());
					$perfil->setopcions($opcionLogic->getopcions());
				}

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
			$perfil->setsistema($this->perfilDataAccess->getsistema($this->connexion,$perfil));
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
			$perfil->setperfil_accions($this->perfilDataAccess->getperfil_accions($this->connexion,$perfil));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_campo::$class);
			$perfil->setperfil_campos($this->perfilDataAccess->getperfil_campos($this->connexion,$perfil));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(accion::$class);
			$perfil->setaccions($this->perfilDataAccess->getaccions($this->connexion,$perfil));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_opcion::$class);
			$perfil->setperfil_opcions($this->perfilDataAccess->getperfil_opcions($this->connexion,$perfil));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_usuario::$class);
			$perfil->setperfil_usuarios($this->perfilDataAccess->getperfil_usuarios($this->connexion,$perfil));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(campo::$class);
			$perfil->setcampos($this->perfilDataAccess->getcampos($this->connexion,$perfil));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(usuario::$class);
			$perfil->setusuarios($this->perfilDataAccess->getusuarios($this->connexion,$perfil));
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
			$perfil->setopcions($this->perfilDataAccess->getopcions($this->connexion,$perfil));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$perfil->setsistema($this->perfilDataAccess->getsistema($this->connexion,$perfil));
		$sistemaLogic= new sistema_logic($this->connexion);
		$sistemaLogic->deepLoad($perfil->getsistema(),$isDeep,$deepLoadType,$clases);
				

		$perfil->setperfil_accions($this->perfilDataAccess->getperfil_accions($this->connexion,$perfil));

		foreach($perfil->getperfil_accions() as $perfilaccion) {
			$perfilaccionLogic= new perfil_accion_logic($this->connexion);
			$perfilaccionLogic->deepLoad($perfilaccion,$isDeep,$deepLoadType,$clases);
		}

		$perfil->setperfil_campos($this->perfilDataAccess->getperfil_campos($this->connexion,$perfil));

		foreach($perfil->getperfil_campos() as $perfilcampo) {
			$perfilcampoLogic= new perfil_campo_logic($this->connexion);
			$perfilcampoLogic->deepLoad($perfilcampo,$isDeep,$deepLoadType,$clases);
		}

		$perfil->setaccions($this->perfilDataAccess->getaccions($this->connexion,$perfil));

		foreach($perfil->getaccions() as $accion) {
			$accionLogic= new accion_logic($this->connexion);
			$accionLogic->deepLoad($accion,$isDeep,$deepLoadType,$clases);
		}

		$perfil->setperfil_opcions($this->perfilDataAccess->getperfil_opcions($this->connexion,$perfil));

		foreach($perfil->getperfil_opcions() as $perfilopcion) {
			$perfilopcionLogic= new perfil_opcion_logic($this->connexion);
			$perfilopcionLogic->deepLoad($perfilopcion,$isDeep,$deepLoadType,$clases);
		}

		$perfil->setperfil_usuarios($this->perfilDataAccess->getperfil_usuarios($this->connexion,$perfil));

		foreach($perfil->getperfil_usuarios() as $perfilusuario) {
			$perfilusuarioLogic= new perfil_usuario_logic($this->connexion);
			$perfilusuarioLogic->deepLoad($perfilusuario,$isDeep,$deepLoadType,$clases);
		}

		$perfil->setcampos($this->perfilDataAccess->getcampos($this->connexion,$perfil));

		foreach($perfil->getcampos() as $campo) {
			$campoLogic= new campo_logic($this->connexion);
			$campoLogic->deepLoad($campo,$isDeep,$deepLoadType,$clases);
		}

		$perfil->setusuarios($this->perfilDataAccess->getusuarios($this->connexion,$perfil));

		foreach($perfil->getusuarios() as $usuario) {
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($usuario,$isDeep,$deepLoadType,$clases);
		}

		$perfil->setopcions($this->perfilDataAccess->getopcions($this->connexion,$perfil));

		foreach($perfil->getopcions() as $opcion) {
			$opcionLogic= new opcion_logic($this->connexion);
			$opcionLogic->deepLoad($opcion,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				$perfil->setsistema($this->perfilDataAccess->getsistema($this->connexion,$perfil));
				$sistemaLogic= new sistema_logic($this->connexion);
				$sistemaLogic->deepLoad($perfil->getsistema(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==perfil_accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$perfil->setperfil_accions($this->perfilDataAccess->getperfil_accions($this->connexion,$perfil));

				foreach($perfil->getperfil_accions() as $perfilaccion) {
					$perfilaccionLogic= new perfil_accion_logic($this->connexion);
					$perfilaccionLogic->deepLoad($perfilaccion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==perfil_campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$perfil->setperfil_campos($this->perfilDataAccess->getperfil_campos($this->connexion,$perfil));

				foreach($perfil->getperfil_campos() as $perfilcampo) {
					$perfilcampoLogic= new perfil_campo_logic($this->connexion);
					$perfilcampoLogic->deepLoad($perfilcampo,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$perfil->setaccions($this->perfilDataAccess->getaccions($this->connexion,$perfil));

				foreach($perfil->getaccions() as $accion) {
					$accionLogic= new accion_logic($this->connexion);
					$accionLogic->deepLoad($accion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==perfil_opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$perfil->setperfil_opcions($this->perfilDataAccess->getperfil_opcions($this->connexion,$perfil));

				foreach($perfil->getperfil_opcions() as $perfilopcion) {
					$perfilopcionLogic= new perfil_opcion_logic($this->connexion);
					$perfilopcionLogic->deepLoad($perfilopcion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==perfil_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$perfil->setperfil_usuarios($this->perfilDataAccess->getperfil_usuarios($this->connexion,$perfil));

				foreach($perfil->getperfil_usuarios() as $perfilusuario) {
					$perfilusuarioLogic= new perfil_usuario_logic($this->connexion);
					$perfilusuarioLogic->deepLoad($perfilusuario,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$perfil->setcampos($this->perfilDataAccess->getcampos($this->connexion,$perfil));

				foreach($perfil->getcampos() as $campo) {
					$campoLogic= new campo_logic($this->connexion);
					$campoLogic->deepLoad($campo,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$perfil->setusuarios($this->perfilDataAccess->getusuarios($this->connexion,$perfil));

				foreach($perfil->getusuarios() as $usuario) {
					$usuarioLogic= new usuario_logic($this->connexion);
					$usuarioLogic->deepLoad($usuario,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$perfil->setopcions($this->perfilDataAccess->getopcions($this->connexion,$perfil));

				foreach($perfil->getopcions() as $opcion) {
					$opcionLogic= new opcion_logic($this->connexion);
					$opcionLogic->deepLoad($opcion,$isDeep,$deepLoadType,$clases);
				}
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
			$perfil->setsistema($this->perfilDataAccess->getsistema($this->connexion,$perfil));
			$sistemaLogic= new sistema_logic($this->connexion);
			$sistemaLogic->deepLoad($perfil->getsistema(),$isDeep,$deepLoadType,$clases);
				
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
			$perfil->setperfil_accions($this->perfilDataAccess->getperfil_accions($this->connexion,$perfil));

			foreach($perfil->getperfil_accions() as $perfilaccion) {
				$perfilaccionLogic= new perfil_accion_logic($this->connexion);
				$perfilaccionLogic->deepLoad($perfilaccion,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_campo::$class);
			$perfil->setperfil_campos($this->perfilDataAccess->getperfil_campos($this->connexion,$perfil));

			foreach($perfil->getperfil_campos() as $perfilcampo) {
				$perfilcampoLogic= new perfil_campo_logic($this->connexion);
				$perfilcampoLogic->deepLoad($perfilcampo,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(accion::$class);
			$perfil->setaccions($this->perfilDataAccess->getaccions($this->connexion,$perfil));

			foreach($perfil->getaccions() as $accion) {
				$accionLogic= new accion_logic($this->connexion);
				$accionLogic->deepLoad($accion,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_opcion::$class);
			$perfil->setperfil_opcions($this->perfilDataAccess->getperfil_opcions($this->connexion,$perfil));

			foreach($perfil->getperfil_opcions() as $perfilopcion) {
				$perfilopcionLogic= new perfil_opcion_logic($this->connexion);
				$perfilopcionLogic->deepLoad($perfilopcion,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_usuario::$class);
			$perfil->setperfil_usuarios($this->perfilDataAccess->getperfil_usuarios($this->connexion,$perfil));

			foreach($perfil->getperfil_usuarios() as $perfilusuario) {
				$perfilusuarioLogic= new perfil_usuario_logic($this->connexion);
				$perfilusuarioLogic->deepLoad($perfilusuario,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(campo::$class);
			$perfil->setcampos($this->perfilDataAccess->getcampos($this->connexion,$perfil));

			foreach($perfil->getcampos() as $campo) {
				$campoLogic= new campo_logic($this->connexion);
				$campoLogic->deepLoad($campo,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(usuario::$class);
			$perfil->setusuarios($this->perfilDataAccess->getusuarios($this->connexion,$perfil));

			foreach($perfil->getusuarios() as $usuario) {
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($usuario,$isDeep,$deepLoadType,$clases);
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
			$perfil->setopcions($this->perfilDataAccess->getopcions($this->connexion,$perfil));

			foreach($perfil->getopcions() as $opcion) {
				$opcionLogic= new opcion_logic($this->connexion);
				$opcionLogic->deepLoad($opcion,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(perfil $perfil,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//perfil_logic_add::updateperfilToSave($this->perfil);			
			
			if(!$paraDeleteCascade) {				
				perfil_data::save($perfil, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		sistema_data::save($perfil->getsistema(),$this->connexion);

		foreach($perfil->getperfil_accions() as $perfilaccion) {
			$perfilaccion->setid_perfil($perfil->getId());
			perfil_accion_data::save($perfilaccion,$this->connexion);
		}


		foreach($perfil->getperfil_campos() as $perfilcampo) {
			$perfilcampo->setid_perfil($perfil->getId());
			perfil_campo_data::save($perfilcampo,$this->connexion);
		}

		foreach($perfil->getaccions() as $accion) {
			accion_data::save($accion,$this->connexion);
		}


		foreach($perfil->getperfil_opcions() as $perfilopcion) {
			$perfilopcion->setid_perfil($perfil->getId());
			perfil_opcion_data::save($perfilopcion,$this->connexion);
		}


		foreach($perfil->getperfil_usuarios() as $perfilusuario) {
			$perfilusuario->setid_perfil($perfil->getId());
			perfil_usuario_data::save($perfilusuario,$this->connexion);
		}

		foreach($perfil->getcampos() as $campo) {
			campo_data::save($campo,$this->connexion);
		}

		foreach($perfil->getusuarios() as $usuario) {
			usuario_data::save($usuario,$this->connexion);
		}

		foreach($perfil->getopcions() as $opcion) {
			opcion_data::save($opcion,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				sistema_data::save($perfil->getsistema(),$this->connexion);
				continue;
			}


			if($clas->clas==perfil_accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($perfil->getperfil_accions() as $perfilaccion) {
					$perfilaccion->setid_perfil($perfil->getId());
					perfil_accion_data::save($perfilaccion,$this->connexion);
				}

				continue;
			}

			if($clas->clas==perfil_campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($perfil->getperfil_campos() as $perfilcampo) {
					$perfilcampo->setid_perfil($perfil->getId());
					perfil_campo_data::save($perfilcampo,$this->connexion);
				}

				continue;
			}

			if($clas->clas==accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($perfil->getaccions() as $accion) {
					accion_data::save($accion,$this->connexion);
				}

				continue;
			}

			if($clas->clas==perfil_opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($perfil->getperfil_opcions() as $perfilopcion) {
					$perfilopcion->setid_perfil($perfil->getId());
					perfil_opcion_data::save($perfilopcion,$this->connexion);
				}

				continue;
			}

			if($clas->clas==perfil_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($perfil->getperfil_usuarios() as $perfilusuario) {
					$perfilusuario->setid_perfil($perfil->getId());
					perfil_usuario_data::save($perfilusuario,$this->connexion);
				}

				continue;
			}

			if($clas->clas==campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($perfil->getcampos() as $campo) {
					campo_data::save($campo,$this->connexion);
				}

				continue;
			}

			if($clas->clas==usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($perfil->getusuarios() as $usuario) {
					usuario_data::save($usuario,$this->connexion);
				}

				continue;
			}

			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($perfil->getopcions() as $opcion) {
					opcion_data::save($opcion,$this->connexion);
				}

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
			sistema_data::save($perfil->getsistema(),$this->connexion);
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

			foreach($perfil->getperfil_accions() as $perfilaccion) {
				$perfilaccion->setid_perfil($perfil->getId());
				perfil_accion_data::save($perfilaccion,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_campo::$class);

			foreach($perfil->getperfil_campos() as $perfilcampo) {
				$perfilcampo->setid_perfil($perfil->getId());
				perfil_campo_data::save($perfilcampo,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(accion::$class);

			foreach($perfil->getaccions() as $accion) {
				accion_data::save($accion,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_opcion::$class);

			foreach($perfil->getperfil_opcions() as $perfilopcion) {
				$perfilopcion->setid_perfil($perfil->getId());
				perfil_opcion_data::save($perfilopcion,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_usuario::$class);

			foreach($perfil->getperfil_usuarios() as $perfilusuario) {
				$perfilusuario->setid_perfil($perfil->getId());
				perfil_usuario_data::save($perfilusuario,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(campo::$class);

			foreach($perfil->getcampos() as $campo) {
				campo_data::save($campo,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(usuario::$class);

			foreach($perfil->getusuarios() as $usuario) {
				usuario_data::save($usuario,$this->connexion);
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

			foreach($perfil->getopcions() as $opcion) {
				opcion_data::save($opcion,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		sistema_data::save($perfil->getsistema(),$this->connexion);
		$sistemaLogic= new sistema_logic($this->connexion);
		$sistemaLogic->deepSave($perfil->getsistema(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($perfil->getperfil_accions() as $perfilaccion) {
			$perfilaccionLogic= new perfil_accion_logic($this->connexion);
			$perfilaccion->setid_perfil($perfil->getId());
			perfil_accion_data::save($perfilaccion,$this->connexion);
			$perfilaccionLogic->deepSave($perfilaccion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($perfil->getperfil_campos() as $perfilcampo) {
			$perfilcampoLogic= new perfil_campo_logic($this->connexion);
			$perfilcampo->setid_perfil($perfil->getId());
			perfil_campo_data::save($perfilcampo,$this->connexion);
			$perfilcampoLogic->deepSave($perfilcampo,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($perfil->getaccions() as $accion) {
			$accionLogic= new accion_logic($this->connexion);
			accion_data::save($accion,$this->connexion);
			$accionLogic->deepSave($accion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($perfil->getperfil_opcions() as $perfilopcion) {
			$perfilopcionLogic= new perfil_opcion_logic($this->connexion);
			$perfilopcion->setid_perfil($perfil->getId());
			perfil_opcion_data::save($perfilopcion,$this->connexion);
			$perfilopcionLogic->deepSave($perfilopcion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($perfil->getperfil_usuarios() as $perfilusuario) {
			$perfilusuarioLogic= new perfil_usuario_logic($this->connexion);
			$perfilusuario->setid_perfil($perfil->getId());
			perfil_usuario_data::save($perfilusuario,$this->connexion);
			$perfilusuarioLogic->deepSave($perfilusuario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($perfil->getcampos() as $campo) {
			$campoLogic= new campo_logic($this->connexion);
			campo_data::save($campo,$this->connexion);
			$campoLogic->deepSave($campo,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($perfil->getusuarios() as $usuario) {
			$usuarioLogic= new usuario_logic($this->connexion);
			usuario_data::save($usuario,$this->connexion);
			$usuarioLogic->deepSave($usuario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($perfil->getopcions() as $opcion) {
			$opcionLogic= new opcion_logic($this->connexion);
			opcion_data::save($opcion,$this->connexion);
			$opcionLogic->deepSave($opcion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				sistema_data::save($perfil->getsistema(),$this->connexion);
				$sistemaLogic= new sistema_logic($this->connexion);
				$sistemaLogic->deepSave($perfil->getsistema(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==perfil_accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($perfil->getperfil_accions() as $perfilaccion) {
					$perfilaccionLogic= new perfil_accion_logic($this->connexion);
					$perfilaccion->setid_perfil($perfil->getId());
					perfil_accion_data::save($perfilaccion,$this->connexion);
					$perfilaccionLogic->deepSave($perfilaccion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==perfil_campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($perfil->getperfil_campos() as $perfilcampo) {
					$perfilcampoLogic= new perfil_campo_logic($this->connexion);
					$perfilcampo->setid_perfil($perfil->getId());
					perfil_campo_data::save($perfilcampo,$this->connexion);
					$perfilcampoLogic->deepSave($perfilcampo,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($perfil->getaccions() as $accion) {
					$accionLogic= new accion_logic($this->connexion);
					accion_data::save($accion,$this->connexion);
					$accionLogic->deepSave($accion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==perfil_opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($perfil->getperfil_opcions() as $perfilopcion) {
					$perfilopcionLogic= new perfil_opcion_logic($this->connexion);
					$perfilopcion->setid_perfil($perfil->getId());
					perfil_opcion_data::save($perfilopcion,$this->connexion);
					$perfilopcionLogic->deepSave($perfilopcion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==perfil_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($perfil->getperfil_usuarios() as $perfilusuario) {
					$perfilusuarioLogic= new perfil_usuario_logic($this->connexion);
					$perfilusuario->setid_perfil($perfil->getId());
					perfil_usuario_data::save($perfilusuario,$this->connexion);
					$perfilusuarioLogic->deepSave($perfilusuario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($perfil->getcampos() as $campo) {
					$campoLogic= new campo_logic($this->connexion);
					campo_data::save($campo,$this->connexion);
					$campoLogic->deepSave($campo,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($perfil->getusuarios() as $usuario) {
					$usuarioLogic= new usuario_logic($this->connexion);
					usuario_data::save($usuario,$this->connexion);
					$usuarioLogic->deepSave($usuario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($perfil->getopcions() as $opcion) {
					$opcionLogic= new opcion_logic($this->connexion);
					opcion_data::save($opcion,$this->connexion);
					$opcionLogic->deepSave($opcion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

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
			sistema_data::save($perfil->getsistema(),$this->connexion);
			$sistemaLogic= new sistema_logic($this->connexion);
			$sistemaLogic->deepSave($perfil->getsistema(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
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

			foreach($perfil->getperfil_accions() as $perfilaccion) {
				$perfilaccionLogic= new perfil_accion_logic($this->connexion);
				$perfilaccion->setid_perfil($perfil->getId());
				perfil_accion_data::save($perfilaccion,$this->connexion);
				$perfilaccionLogic->deepSave($perfilaccion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_campo::$class);

			foreach($perfil->getperfil_campos() as $perfilcampo) {
				$perfilcampoLogic= new perfil_campo_logic($this->connexion);
				$perfilcampo->setid_perfil($perfil->getId());
				perfil_campo_data::save($perfilcampo,$this->connexion);
				$perfilcampoLogic->deepSave($perfilcampo,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==accion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(accion::$class);

			foreach($perfil->getaccions() as $accion) {
				$accionLogic= new accion_logic($this->connexion);
				accion_data::save($accion,$this->connexion);
				$accionLogic->deepSave($accion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_opcion::$class);

			foreach($perfil->getperfil_opcions() as $perfilopcion) {
				$perfilopcionLogic= new perfil_opcion_logic($this->connexion);
				$perfilopcion->setid_perfil($perfil->getId());
				perfil_opcion_data::save($perfilopcion,$this->connexion);
				$perfilopcionLogic->deepSave($perfilopcion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==perfil_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(perfil_usuario::$class);

			foreach($perfil->getperfil_usuarios() as $perfilusuario) {
				$perfilusuarioLogic= new perfil_usuario_logic($this->connexion);
				$perfilusuario->setid_perfil($perfil->getId());
				perfil_usuario_data::save($perfilusuario,$this->connexion);
				$perfilusuarioLogic->deepSave($perfilusuario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==campo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(campo::$class);

			foreach($perfil->getcampos() as $campo) {
				$campoLogic= new campo_logic($this->connexion);
				campo_data::save($campo,$this->connexion);
				$campoLogic->deepSave($campo,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(usuario::$class);

			foreach($perfil->getusuarios() as $usuario) {
				$usuarioLogic= new usuario_logic($this->connexion);
				usuario_data::save($usuario,$this->connexion);
				$usuarioLogic->deepSave($usuario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($perfil->getopcions() as $opcion) {
				$opcionLogic= new opcion_logic($this->connexion);
				opcion_data::save($opcion,$this->connexion);
				$opcionLogic->deepSave($opcion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				perfil_data::save($perfil, $this->connexion);
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
			
			$this->deepLoad($this->perfil,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->perfils as $perfil) {
				$this->deepLoad($perfil,$isDeep,$deepLoadType,$clases);
								
				perfil_util::refrescarFKDescripciones($this->perfils);
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
			
			foreach($this->perfils as $perfil) {
				$this->deepLoad($perfil,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->perfil,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->perfils as $perfil) {
				$this->deepSave($perfil,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->perfils as $perfil) {
				$this->deepSave($perfil,$isDeep,$deepLoadType,$clases,false);
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
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==sistema::$class) {
						$classes[]=new Classe(sistema::$class);
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
				
				$classes[]=new Classe(perfil_accion::$class);
				$classes[]=new Classe(perfil_campo::$class);
				$classes[]=new Classe(accion::$class);
				$classes[]=new Classe(perfil_opcion::$class);
				$classes[]=new Classe(perfil_usuario::$class);
				$classes[]=new Classe(campo::$class);
				$classes[]=new Classe(usuario::$class);
				$classes[]=new Classe(opcion::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==perfil_accion::$class) {
						$classes[]=new Classe(perfil_accion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==perfil_campo::$class) {
						$classes[]=new Classe(perfil_campo::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==accion::$class) {
						$classes[]=new Classe(accion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==perfil_opcion::$class) {
						$classes[]=new Classe(perfil_opcion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==perfil_usuario::$class) {
						$classes[]=new Classe(perfil_usuario::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==campo::$class) {
						$classes[]=new Classe(campo::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==usuario::$class) {
						$classes[]=new Classe(usuario::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==opcion::$class) {
						$classes[]=new Classe(opcion::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

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

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==perfil_campo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(perfil_campo::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==accion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(accion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==perfil_opcion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(perfil_opcion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==perfil_usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(perfil_usuario::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==campo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(campo::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(usuario::$class);
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

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getperfil() : ?perfil {	
		/*
		perfil_logic_add::checkperfilToGet($this->perfil,$this->datosCliente);
		perfil_logic_add::updateperfilToGet($this->perfil);
		*/
			
		return $this->perfil;
	}
		
	public function setperfil(perfil $newperfil) {
		$this->perfil = $newperfil;
	}
	
	public function getperfils() : array {		
		/*
		perfil_logic_add::checkperfilToGets($this->perfils,$this->datosCliente);
		
		foreach ($this->perfils as $perfilLocal ) {
			perfil_logic_add::updateperfilToGet($perfilLocal);
		}
		*/
		
		return $this->perfils;
	}
	
	public function setperfils(array $newperfils) {
		$this->perfils = $newperfils;
	}
	
	public function getperfilDataAccess() : perfil_data {
		return $this->perfilDataAccess;
	}
	
	public function setperfilDataAccess(perfil_data $newperfilDataAccess) {
		$this->perfilDataAccess = $newperfilDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        perfil_carga::$CONTROLLER;;        
		
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
