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

namespace com\bydan\contabilidad\seguridad\dato_general_usuario\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_carga;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_param_return;

use com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\session\dato_general_usuario_session;

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

use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_util;
use com\bydan\contabilidad\seguridad\dato_general_usuario\business\entity\dato_general_usuario;
use com\bydan\contabilidad\seguridad\dato_general_usuario\business\data\dato_general_usuario_data;

//FK


use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\business\data\pais_data;
use com\bydan\contabilidad\seguridad\pais\business\logic\pais_logic;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;

use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;
use com\bydan\contabilidad\seguridad\provincia\business\data\provincia_data;
use com\bydan\contabilidad\seguridad\provincia\business\logic\provincia_logic;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_util;

use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;
use com\bydan\contabilidad\seguridad\ciudad\business\data\ciudad_data;
use com\bydan\contabilidad\seguridad\ciudad\business\logic\ciudad_logic;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;

//REL


//REL DETALLES




class dato_general_usuario_logic  extends GeneralEntityLogic implements dato_general_usuario_logicI {	
	/*GENERAL*/
	public dato_general_usuario_data $dato_general_usuarioDataAccess;
	//public ?dato_general_usuario_logic_add $dato_general_usuarioLogicAdditional=null;
	public ?dato_general_usuario $dato_general_usuario;
	public array $dato_general_usuarios;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->dato_general_usuarioDataAccess = new dato_general_usuario_data();			
			$this->dato_general_usuarios = array();
			$this->dato_general_usuario = new dato_general_usuario();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->dato_general_usuarioLogicAdditional = new dato_general_usuario_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->dato_general_usuarioLogicAdditional==null) {
		//	$this->dato_general_usuarioLogicAdditional=new dato_general_usuario_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->dato_general_usuarioDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->dato_general_usuarioDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->dato_general_usuarioDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->dato_general_usuarioDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->dato_general_usuarios = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->dato_general_usuarios=$this->dato_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
			}
			
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGets($this->dato_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->dato_general_usuarios);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->dato_general_usuarios = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->dato_general_usuarios=$this->dato_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
			}
			
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGets($this->dato_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->dato_general_usuarios);
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
		$this->dato_general_usuario = new dato_general_usuario();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->dato_general_usuario=$this->dato_general_usuarioDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->dato_general_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				dato_general_usuario_util::refrescarFKDescripcion($this->dato_general_usuario);
			}
						
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGet($this->dato_general_usuario,$this->datosCliente);
			//dato_general_usuario_logic_add::updatedato_general_usuarioToGet($this->dato_general_usuario);
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
		$this->dato_general_usuario = new  dato_general_usuario();
		  		  
        try {		
			$this->dato_general_usuario=$this->dato_general_usuarioDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->dato_general_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				dato_general_usuario_util::refrescarFKDescripcion($this->dato_general_usuario);
			}
			
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGet($this->dato_general_usuario,$this->datosCliente);
			//dato_general_usuario_logic_add::updatedato_general_usuarioToGet($this->dato_general_usuario);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?dato_general_usuario {
		$dato_general_usuarioLogic = new  dato_general_usuario_logic();
		  		  
        try {		
			$dato_general_usuarioLogic->setConnexion($connexion);			
			$dato_general_usuarioLogic->getEntity($id);			
			return $dato_general_usuarioLogic->getdato_general_usuario();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->dato_general_usuario = new  dato_general_usuario();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->dato_general_usuario=$this->dato_general_usuarioDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->dato_general_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				dato_general_usuario_util::refrescarFKDescripcion($this->dato_general_usuario);
			}
			
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGet($this->dato_general_usuario,$this->datosCliente);
			//dato_general_usuario_logic_add::updatedato_general_usuarioToGet($this->dato_general_usuario);
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
		$this->dato_general_usuario = new  dato_general_usuario();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->dato_general_usuario=$this->dato_general_usuarioDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->dato_general_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				dato_general_usuario_util::refrescarFKDescripcion($this->dato_general_usuario);
			}
			
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGet($this->dato_general_usuario,$this->datosCliente);
			//dato_general_usuario_logic_add::updatedato_general_usuarioToGet($this->dato_general_usuario);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?dato_general_usuario {
		$dato_general_usuarioLogic = new  dato_general_usuario_logic();
		  		  
        try {		
			$dato_general_usuarioLogic->setConnexion($connexion);			
			$dato_general_usuarioLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $dato_general_usuarioLogic->getdato_general_usuario();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->dato_general_usuarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->dato_general_usuarios=$this->dato_general_usuarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
			}
			
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGets($this->dato_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->dato_general_usuarios);			
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
		$this->dato_general_usuarios = array();
		  		  
        try {			
			$this->dato_general_usuarios=$this->dato_general_usuarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
			}
			
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGets($this->dato_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->dato_general_usuarios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->dato_general_usuarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->dato_general_usuarios=$this->dato_general_usuarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
			}
			
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGets($this->dato_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->dato_general_usuarios);
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
		$this->dato_general_usuarios = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->dato_general_usuarios=$this->dato_general_usuarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
			}
			
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGets($this->dato_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->dato_general_usuarios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$dato_general_usuarioLogic = new  dato_general_usuario_logic();
		  		  
        try {		
			$dato_general_usuarioLogic->setConnexion($connexion);			
			$dato_general_usuarioLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $dato_general_usuarioLogic->getdato_general_usuarios();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->dato_general_usuarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->dato_general_usuarios=$this->dato_general_usuarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
			}
			
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGets($this->dato_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->dato_general_usuarios);
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
		$this->dato_general_usuarios = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->dato_general_usuarios=$this->dato_general_usuarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
			}
			
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGets($this->dato_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->dato_general_usuarios);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->dato_general_usuarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->dato_general_usuarios=$this->dato_general_usuarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
			}
			
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGets($this->dato_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->dato_general_usuarios);
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
		$this->dato_general_usuarios = array();
		  		  
        try {			
			$this->dato_general_usuarios=$this->dato_general_usuarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
			}	
			
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGets($this->dato_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->dato_general_usuarios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->dato_general_usuarios = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->dato_general_usuarios=$this->dato_general_usuarioDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
			}
			
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGets($this->dato_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->dato_general_usuarios);
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
		$this->dato_general_usuarios = array();
		  		  
        try {		
			$this->dato_general_usuarios=$this->dato_general_usuarioDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
			}
			
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGets($this->dato_general_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->dato_general_usuarios);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdciudadWithConnection(string $strFinalQuery,Pagination $pagination,int $id_ciudad) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ciudad= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ciudad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ciudad,dato_general_usuario_util::$ID_CIUDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ciudad);

			$this->dato_general_usuarios=$this->dato_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
			}
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGets($this->dato_general_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->dato_general_usuarios);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idciudad(string $strFinalQuery,Pagination $pagination,int $id_ciudad) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ciudad= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ciudad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ciudad,dato_general_usuario_util::$ID_CIUDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ciudad);

			$this->dato_general_usuarios=$this->dato_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
			}
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGets($this->dato_general_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->dato_general_usuarios);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdpaisWithConnection(string $strFinalQuery,Pagination $pagination,int $id_pais) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_pais= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_pais->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_pais,dato_general_usuario_util::$ID_PAIS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_pais);

			$this->dato_general_usuarios=$this->dato_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
			}
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGets($this->dato_general_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->dato_general_usuarios);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idpais(string $strFinalQuery,Pagination $pagination,int $id_pais) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_pais= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_pais->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_pais,dato_general_usuario_util::$ID_PAIS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_pais);

			$this->dato_general_usuarios=$this->dato_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
			}
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGets($this->dato_general_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->dato_general_usuarios);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdprovinciaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_provincia) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_provincia= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_provincia->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_provincia,dato_general_usuario_util::$ID_PROVINCIA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_provincia);

			$this->dato_general_usuarios=$this->dato_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
			}
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGets($this->dato_general_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->dato_general_usuarios);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idprovincia(string $strFinalQuery,Pagination $pagination,int $id_provincia) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_provincia= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_provincia->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_provincia,dato_general_usuario_util::$ID_PROVINCIA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_provincia);

			$this->dato_general_usuarios=$this->dato_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
			}
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGets($this->dato_general_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->dato_general_usuarios);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdusuarioidWithConnection(string $strFinalQuery,Pagination $pagination,int $id) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id,dato_general_usuario_util::$ID,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid);

			$this->dato_general_usuarios=$this->dato_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
			}
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGets($this->dato_general_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->dato_general_usuarios);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idusuarioid(string $strFinalQuery,Pagination $pagination,int $id) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id,dato_general_usuario_util::$ID,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid);

			$this->dato_general_usuarios=$this->dato_general_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
			}
			//dato_general_usuario_logic_add::checkdato_general_usuarioToGets($this->dato_general_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->dato_general_usuarios);
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
						
			//dato_general_usuario_logic_add::checkdato_general_usuarioToSave($this->dato_general_usuario,$this->datosCliente,$this->connexion);	       
			//dato_general_usuario_logic_add::updatedato_general_usuarioToSave($this->dato_general_usuario);			
			dato_general_usuario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->dato_general_usuario,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->dato_general_usuarioLogicAdditional->checkGeneralEntityToSave($this,$this->dato_general_usuario,$this->datosCliente,$this->connexion);
			
			
			dato_general_usuario_data::save($this->dato_general_usuario, $this->connexion);	    	       	 				
			//dato_general_usuario_logic_add::checkdato_general_usuarioToSaveAfter($this->dato_general_usuario,$this->datosCliente,$this->connexion);			
			//$this->dato_general_usuarioLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->dato_general_usuario,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->dato_general_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->dato_general_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				dato_general_usuario_util::refrescarFKDescripcion($this->dato_general_usuario);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->dato_general_usuario->getIsDeleted()) {
				$this->dato_general_usuario=null;
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
						
			/*dato_general_usuario_logic_add::checkdato_general_usuarioToSave($this->dato_general_usuario,$this->datosCliente,$this->connexion);*/	        
			//dato_general_usuario_logic_add::updatedato_general_usuarioToSave($this->dato_general_usuario);			
			//$this->dato_general_usuarioLogicAdditional->checkGeneralEntityToSave($this,$this->dato_general_usuario,$this->datosCliente,$this->connexion);			
			dato_general_usuario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->dato_general_usuario,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			dato_general_usuario_data::save($this->dato_general_usuario, $this->connexion);	    	       	 						
			/*dato_general_usuario_logic_add::checkdato_general_usuarioToSaveAfter($this->dato_general_usuario,$this->datosCliente,$this->connexion);*/			
			//$this->dato_general_usuarioLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->dato_general_usuario,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->dato_general_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->dato_general_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				dato_general_usuario_util::refrescarFKDescripcion($this->dato_general_usuario);				
			}
			
			if($this->dato_general_usuario->getIsDeleted()) {
				$this->dato_general_usuario=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(dato_general_usuario $dato_general_usuario,Connexion $connexion)  {
		$dato_general_usuarioLogic = new  dato_general_usuario_logic();		  		  
        try {		
			$dato_general_usuarioLogic->setConnexion($connexion);			
			$dato_general_usuarioLogic->setdato_general_usuario($dato_general_usuario);			
			$dato_general_usuarioLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*dato_general_usuario_logic_add::checkdato_general_usuarioToSaves($this->dato_general_usuarios,$this->datosCliente,$this->connexion);*/	        	
			//$this->dato_general_usuarioLogicAdditional->checkGeneralEntitiesToSaves($this,$this->dato_general_usuarios,$this->datosCliente,$this->connexion);
			
	   		foreach($this->dato_general_usuarios as $dato_general_usuarioLocal) {				
								
				//dato_general_usuario_logic_add::updatedato_general_usuarioToSave($dato_general_usuarioLocal);	        	
				dato_general_usuario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$dato_general_usuarioLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				dato_general_usuario_data::save($dato_general_usuarioLocal, $this->connexion);				
			}
			
			/*dato_general_usuario_logic_add::checkdato_general_usuarioToSavesAfter($this->dato_general_usuarios,$this->datosCliente,$this->connexion);*/			
			//$this->dato_general_usuarioLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->dato_general_usuarios,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
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
			/*dato_general_usuario_logic_add::checkdato_general_usuarioToSaves($this->dato_general_usuarios,$this->datosCliente,$this->connexion);*/			
			//$this->dato_general_usuarioLogicAdditional->checkGeneralEntitiesToSaves($this,$this->dato_general_usuarios,$this->datosCliente,$this->connexion);
			
	   		foreach($this->dato_general_usuarios as $dato_general_usuarioLocal) {				
								
				//dato_general_usuario_logic_add::updatedato_general_usuarioToSave($dato_general_usuarioLocal);	        	
				dato_general_usuario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$dato_general_usuarioLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				dato_general_usuario_data::save($dato_general_usuarioLocal, $this->connexion);				
			}			
			
			/*dato_general_usuario_logic_add::checkdato_general_usuarioToSavesAfter($this->dato_general_usuarios,$this->datosCliente,$this->connexion);*/			
			//$this->dato_general_usuarioLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->dato_general_usuarios,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $dato_general_usuarios,Connexion $connexion)  {
		$dato_general_usuarioLogic = new  dato_general_usuario_logic();
		  		  
        try {		
			$dato_general_usuarioLogic->setConnexion($connexion);			
			$dato_general_usuarioLogic->setdato_general_usuarios($dato_general_usuarios);			
			$dato_general_usuarioLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$dato_general_usuariosAux=array();
		
		foreach($this->dato_general_usuarios as $dato_general_usuario) {
			if($dato_general_usuario->getIsDeleted()==false) {
				$dato_general_usuariosAux[]=$dato_general_usuario;
			}
		}
		
		$this->dato_general_usuarios=$dato_general_usuariosAux;
	}
	
	public function updateToGetsAuxiliar(array &$dato_general_usuarios) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->dato_general_usuarios as $dato_general_usuario) {
				
				$dato_general_usuario->setid_pais_Descripcion(dato_general_usuario_util::getpaisDescripcion($dato_general_usuario->getpais()));
				$dato_general_usuario->setid_provincia_Descripcion(dato_general_usuario_util::getprovinciaDescripcion($dato_general_usuario->getprovincia()));
				$dato_general_usuario->setid_ciudad_Descripcion(dato_general_usuario_util::getciudadDescripcion($dato_general_usuario->getciudad()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$dato_general_usuario_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$dato_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$dato_general_usuario_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$dato_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$dato_general_usuario_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$dato_general_usuarioForeignKey=new dato_general_usuario_param_return();//dato_general_usuarioForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$dato_general_usuarioForeignKey,$dato_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_pais',$strRecargarFkTipos,',')) {
				$this->cargarCombospaissFK($this->connexion,$strRecargarFkQuery,$dato_general_usuarioForeignKey,$dato_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_provincia',$strRecargarFkTipos,',')) {
				$this->cargarCombosprovinciasFK($this->connexion,$strRecargarFkQuery,$dato_general_usuarioForeignKey,$dato_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ciudad',$strRecargarFkTipos,',')) {
				$this->cargarCombosciudadsFK($this->connexion,$strRecargarFkQuery,$dato_general_usuarioForeignKey,$dato_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$dato_general_usuarioForeignKey,$dato_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_pais',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombospaissFK($this->connexion,' where id=-1 ',$dato_general_usuarioForeignKey,$dato_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_provincia',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosprovinciasFK($this->connexion,' where id=-1 ',$dato_general_usuarioForeignKey,$dato_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ciudad',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosciudadsFK($this->connexion,' where id=-1 ',$dato_general_usuarioForeignKey,$dato_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $dato_general_usuarioForeignKey;
			
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
	
	
	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$dato_general_usuarioForeignKey,$dato_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$dato_general_usuarioForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($dato_general_usuario_session==null) {
			$dato_general_usuario_session=new dato_general_usuario_session();
		}
		
		if($dato_general_usuario_session->bitBusquedaDesdeFKSesionusuario!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=usuario_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalusuario=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalusuario=Funciones::GetFinalQueryAppend($finalQueryGlobalusuario, '');
				$finalQueryGlobalusuario.=usuario_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalusuario.$strRecargarFkQuery;		

				$usuarioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($usuarioLogic->getusuarios() as $usuarioLocal ) {
				if($dato_general_usuarioForeignKey->idusuarioDefaultFK==0) {
					$dato_general_usuarioForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$dato_general_usuarioForeignKey->usuariosFK[$usuarioLocal->getId()]=dato_general_usuario_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($dato_general_usuario_session->bigidusuarioActual!=null && $dato_general_usuario_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($dato_general_usuario_session->bigidusuarioActual);//WithConnection

				$dato_general_usuarioForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=dato_general_usuario_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$dato_general_usuarioForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombospaissFK($connexion=null,$strRecargarFkQuery='',$dato_general_usuarioForeignKey,$dato_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$paisLogic= new pais_logic();
		$pagination= new Pagination();
		$dato_general_usuarioForeignKey->paissFK=array();

		$paisLogic->setConnexion($connexion);
		$paisLogic->getpaisDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($dato_general_usuario_session==null) {
			$dato_general_usuario_session=new dato_general_usuario_session();
		}
		
		if($dato_general_usuario_session->bitBusquedaDesdeFKSesionpais!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=pais_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalpais=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalpais=Funciones::GetFinalQueryAppend($finalQueryGlobalpais, '');
				$finalQueryGlobalpais.=pais_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalpais.$strRecargarFkQuery;		

				$paisLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($paisLogic->getpaiss() as $paisLocal ) {
				if($dato_general_usuarioForeignKey->idpaisDefaultFK==0) {
					$dato_general_usuarioForeignKey->idpaisDefaultFK=$paisLocal->getId();
				}

				$dato_general_usuarioForeignKey->paissFK[$paisLocal->getId()]=dato_general_usuario_util::getpaisDescripcion($paisLocal);
			}

		} else {

			if($dato_general_usuario_session->bigidpaisActual!=null && $dato_general_usuario_session->bigidpaisActual > 0) {
				$paisLogic->getEntity($dato_general_usuario_session->bigidpaisActual);//WithConnection

				$dato_general_usuarioForeignKey->paissFK[$paisLogic->getpais()->getId()]=dato_general_usuario_util::getpaisDescripcion($paisLogic->getpais());
				$dato_general_usuarioForeignKey->idpaisDefaultFK=$paisLogic->getpais()->getId();
			}
		}
	}

	public function cargarCombosprovinciasFK($connexion=null,$strRecargarFkQuery='',$dato_general_usuarioForeignKey,$dato_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$provinciaLogic= new provincia_logic();
		$pagination= new Pagination();
		$dato_general_usuarioForeignKey->provinciasFK=array();

		$provinciaLogic->setConnexion($connexion);
		$provinciaLogic->getprovinciaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($dato_general_usuario_session==null) {
			$dato_general_usuario_session=new dato_general_usuario_session();
		}
		
		if($dato_general_usuario_session->bitBusquedaDesdeFKSesionprovincia!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=provincia_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalprovincia=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalprovincia=Funciones::GetFinalQueryAppend($finalQueryGlobalprovincia, '');
				$finalQueryGlobalprovincia.=provincia_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalprovincia.$strRecargarFkQuery;		

				$provinciaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($provinciaLogic->getprovincias() as $provinciaLocal ) {
				if($dato_general_usuarioForeignKey->idprovinciaDefaultFK==0) {
					$dato_general_usuarioForeignKey->idprovinciaDefaultFK=$provinciaLocal->getId();
				}

				$dato_general_usuarioForeignKey->provinciasFK[$provinciaLocal->getId()]=dato_general_usuario_util::getprovinciaDescripcion($provinciaLocal);
			}

		} else {

			if($dato_general_usuario_session->bigidprovinciaActual!=null && $dato_general_usuario_session->bigidprovinciaActual > 0) {
				$provinciaLogic->getEntity($dato_general_usuario_session->bigidprovinciaActual);//WithConnection

				$dato_general_usuarioForeignKey->provinciasFK[$provinciaLogic->getprovincia()->getId()]=dato_general_usuario_util::getprovinciaDescripcion($provinciaLogic->getprovincia());
				$dato_general_usuarioForeignKey->idprovinciaDefaultFK=$provinciaLogic->getprovincia()->getId();
			}
		}
	}

	public function cargarCombosciudadsFK($connexion=null,$strRecargarFkQuery='',$dato_general_usuarioForeignKey,$dato_general_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ciudadLogic= new ciudad_logic();
		$pagination= new Pagination();
		$dato_general_usuarioForeignKey->ciudadsFK=array();

		$ciudadLogic->setConnexion($connexion);
		$ciudadLogic->getciudadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($dato_general_usuario_session==null) {
			$dato_general_usuario_session=new dato_general_usuario_session();
		}
		
		if($dato_general_usuario_session->bitBusquedaDesdeFKSesionciudad!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=ciudad_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalciudad=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalciudad=Funciones::GetFinalQueryAppend($finalQueryGlobalciudad, '');
				$finalQueryGlobalciudad.=ciudad_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalciudad.$strRecargarFkQuery;		

				$ciudadLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($ciudadLogic->getciudads() as $ciudadLocal ) {
				if($dato_general_usuarioForeignKey->idciudadDefaultFK==0) {
					$dato_general_usuarioForeignKey->idciudadDefaultFK=$ciudadLocal->getId();
				}

				$dato_general_usuarioForeignKey->ciudadsFK[$ciudadLocal->getId()]=dato_general_usuario_util::getciudadDescripcion($ciudadLocal);
			}

		} else {

			if($dato_general_usuario_session->bigidciudadActual!=null && $dato_general_usuario_session->bigidciudadActual > 0) {
				$ciudadLogic->getEntity($dato_general_usuario_session->bigidciudadActual);//WithConnection

				$dato_general_usuarioForeignKey->ciudadsFK[$ciudadLogic->getciudad()->getId()]=dato_general_usuario_util::getciudadDescripcion($ciudadLogic->getciudad());
				$dato_general_usuarioForeignKey->idciudadDefaultFK=$ciudadLogic->getciudad()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($dato_general_usuario) {
		$this->saveRelacionesBase($dato_general_usuario,true);
	}

	public function saveRelaciones($dato_general_usuario) {
		$this->saveRelacionesBase($dato_general_usuario,false);
	}

	public function saveRelacionesBase($dato_general_usuario,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setdato_general_usuario($dato_general_usuario);

				if(($this->dato_general_usuario->getIsNew() || $this->dato_general_usuario->getIsChanged()) && !$this->dato_general_usuario->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->dato_general_usuario->getIsDeleted()) {
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $dato_general_usuarios,dato_general_usuario_param_return $dato_general_usuarioParameterGeneral) : dato_general_usuario_param_return {
		$dato_general_usuarioReturnGeneral=new dato_general_usuario_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $dato_general_usuarioReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $dato_general_usuarios,dato_general_usuario_param_return $dato_general_usuarioParameterGeneral) : dato_general_usuario_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$dato_general_usuarioReturnGeneral=new dato_general_usuario_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $dato_general_usuarioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $dato_general_usuarios,dato_general_usuario $dato_general_usuario,dato_general_usuario_param_return $dato_general_usuarioParameterGeneral,bool $isEsNuevodato_general_usuario,array $clases) : dato_general_usuario_param_return {
		 try {	
			$dato_general_usuarioReturnGeneral=new dato_general_usuario_param_return();
	
			$dato_general_usuarioReturnGeneral->setdato_general_usuario($dato_general_usuario);
			$dato_general_usuarioReturnGeneral->setdato_general_usuarios($dato_general_usuarios);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$dato_general_usuarioReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $dato_general_usuarioReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $dato_general_usuarios,dato_general_usuario $dato_general_usuario,dato_general_usuario_param_return $dato_general_usuarioParameterGeneral,bool $isEsNuevodato_general_usuario,array $clases) : dato_general_usuario_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$dato_general_usuarioReturnGeneral=new dato_general_usuario_param_return();
	
			$dato_general_usuarioReturnGeneral->setdato_general_usuario($dato_general_usuario);
			$dato_general_usuarioReturnGeneral->setdato_general_usuarios($dato_general_usuarios);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$dato_general_usuarioReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $dato_general_usuarioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $dato_general_usuarios,dato_general_usuario $dato_general_usuario,dato_general_usuario_param_return $dato_general_usuarioParameterGeneral,bool $isEsNuevodato_general_usuario,array $clases) : dato_general_usuario_param_return {
		 try {	
			$dato_general_usuarioReturnGeneral=new dato_general_usuario_param_return();
	
			$dato_general_usuarioReturnGeneral->setdato_general_usuario($dato_general_usuario);
			$dato_general_usuarioReturnGeneral->setdato_general_usuarios($dato_general_usuarios);
			
			
			
			return $dato_general_usuarioReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $dato_general_usuarios,dato_general_usuario $dato_general_usuario,dato_general_usuario_param_return $dato_general_usuarioParameterGeneral,bool $isEsNuevodato_general_usuario,array $clases) : dato_general_usuario_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$dato_general_usuarioReturnGeneral=new dato_general_usuario_param_return();
	
			$dato_general_usuarioReturnGeneral->setdato_general_usuario($dato_general_usuario);
			$dato_general_usuarioReturnGeneral->setdato_general_usuarios($dato_general_usuarios);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $dato_general_usuarioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,dato_general_usuario $dato_general_usuario,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,dato_general_usuario $dato_general_usuario,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		dato_general_usuario_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(dato_general_usuario $dato_general_usuario,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//dato_general_usuario_logic_add::updatedato_general_usuarioToGet($this->dato_general_usuario);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$dato_general_usuario->setusuario($this->dato_general_usuarioDataAccess->getusuario($this->connexion,$dato_general_usuario));
		$dato_general_usuario->setpais($this->dato_general_usuarioDataAccess->getpais($this->connexion,$dato_general_usuario));
		$dato_general_usuario->setprovincia($this->dato_general_usuarioDataAccess->getprovincia($this->connexion,$dato_general_usuario));
		$dato_general_usuario->setciudad($this->dato_general_usuarioDataAccess->getciudad($this->connexion,$dato_general_usuario));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$dato_general_usuario->setusuario($this->dato_general_usuarioDataAccess->getusuario($this->connexion,$dato_general_usuario));
				continue;
			}

			if($clas->clas==pais::$class.'') {
				$dato_general_usuario->setpais($this->dato_general_usuarioDataAccess->getpais($this->connexion,$dato_general_usuario));
				continue;
			}

			if($clas->clas==provincia::$class.'') {
				$dato_general_usuario->setprovincia($this->dato_general_usuarioDataAccess->getprovincia($this->connexion,$dato_general_usuario));
				continue;
			}

			if($clas->clas==ciudad::$class.'') {
				$dato_general_usuario->setciudad($this->dato_general_usuarioDataAccess->getciudad($this->connexion,$dato_general_usuario));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$dato_general_usuario->setusuario($this->dato_general_usuarioDataAccess->getusuario($this->connexion,$dato_general_usuario));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$dato_general_usuario->setpais($this->dato_general_usuarioDataAccess->getpais($this->connexion,$dato_general_usuario));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==provincia::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$dato_general_usuario->setprovincia($this->dato_general_usuarioDataAccess->getprovincia($this->connexion,$dato_general_usuario));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$dato_general_usuario->setciudad($this->dato_general_usuarioDataAccess->getciudad($this->connexion,$dato_general_usuario));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$dato_general_usuario->setusuario($this->dato_general_usuarioDataAccess->getusuario($this->connexion,$dato_general_usuario));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($dato_general_usuario->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$dato_general_usuario->setpais($this->dato_general_usuarioDataAccess->getpais($this->connexion,$dato_general_usuario));
		$paisLogic= new pais_logic($this->connexion);
		$paisLogic->deepLoad($dato_general_usuario->getpais(),$isDeep,$deepLoadType,$clases);
				
		$dato_general_usuario->setprovincia($this->dato_general_usuarioDataAccess->getprovincia($this->connexion,$dato_general_usuario));
		$provinciaLogic= new provincia_logic($this->connexion);
		$provinciaLogic->deepLoad($dato_general_usuario->getprovincia(),$isDeep,$deepLoadType,$clases);
				
		$dato_general_usuario->setciudad($this->dato_general_usuarioDataAccess->getciudad($this->connexion,$dato_general_usuario));
		$ciudadLogic= new ciudad_logic($this->connexion);
		$ciudadLogic->deepLoad($dato_general_usuario->getciudad(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$dato_general_usuario->setusuario($this->dato_general_usuarioDataAccess->getusuario($this->connexion,$dato_general_usuario));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($dato_general_usuario->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==pais::$class.'') {
				$dato_general_usuario->setpais($this->dato_general_usuarioDataAccess->getpais($this->connexion,$dato_general_usuario));
				$paisLogic= new pais_logic($this->connexion);
				$paisLogic->deepLoad($dato_general_usuario->getpais(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==provincia::$class.'') {
				$dato_general_usuario->setprovincia($this->dato_general_usuarioDataAccess->getprovincia($this->connexion,$dato_general_usuario));
				$provinciaLogic= new provincia_logic($this->connexion);
				$provinciaLogic->deepLoad($dato_general_usuario->getprovincia(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ciudad::$class.'') {
				$dato_general_usuario->setciudad($this->dato_general_usuarioDataAccess->getciudad($this->connexion,$dato_general_usuario));
				$ciudadLogic= new ciudad_logic($this->connexion);
				$ciudadLogic->deepLoad($dato_general_usuario->getciudad(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$dato_general_usuario->setusuario($this->dato_general_usuarioDataAccess->getusuario($this->connexion,$dato_general_usuario));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($dato_general_usuario->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$dato_general_usuario->setpais($this->dato_general_usuarioDataAccess->getpais($this->connexion,$dato_general_usuario));
			$paisLogic= new pais_logic($this->connexion);
			$paisLogic->deepLoad($dato_general_usuario->getpais(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==provincia::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$dato_general_usuario->setprovincia($this->dato_general_usuarioDataAccess->getprovincia($this->connexion,$dato_general_usuario));
			$provinciaLogic= new provincia_logic($this->connexion);
			$provinciaLogic->deepLoad($dato_general_usuario->getprovincia(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$dato_general_usuario->setciudad($this->dato_general_usuarioDataAccess->getciudad($this->connexion,$dato_general_usuario));
			$ciudadLogic= new ciudad_logic($this->connexion);
			$ciudadLogic->deepLoad($dato_general_usuario->getciudad(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(dato_general_usuario $dato_general_usuario,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//dato_general_usuario_logic_add::updatedato_general_usuarioToSave($this->dato_general_usuario);			
			
			if(!$paraDeleteCascade) {				
				dato_general_usuario_data::save($dato_general_usuario, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		usuario_data::save($dato_general_usuario->getusuario(),$this->connexion);
		pais_data::save($dato_general_usuario->getpais(),$this->connexion);
		provincia_data::save($dato_general_usuario->getprovincia(),$this->connexion);
		ciudad_data::save($dato_general_usuario->getciudad(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				usuario_data::save($dato_general_usuario->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==pais::$class.'') {
				pais_data::save($dato_general_usuario->getpais(),$this->connexion);
				continue;
			}

			if($clas->clas==provincia::$class.'') {
				provincia_data::save($dato_general_usuario->getprovincia(),$this->connexion);
				continue;
			}

			if($clas->clas==ciudad::$class.'') {
				ciudad_data::save($dato_general_usuario->getciudad(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($dato_general_usuario->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			pais_data::save($dato_general_usuario->getpais(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==provincia::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			provincia_data::save($dato_general_usuario->getprovincia(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ciudad_data::save($dato_general_usuario->getciudad(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		usuario_data::save($dato_general_usuario->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($dato_general_usuario->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		pais_data::save($dato_general_usuario->getpais(),$this->connexion);
		$paisLogic= new pais_logic($this->connexion);
		$paisLogic->deepSave($dato_general_usuario->getpais(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		provincia_data::save($dato_general_usuario->getprovincia(),$this->connexion);
		$provinciaLogic= new provincia_logic($this->connexion);
		$provinciaLogic->deepSave($dato_general_usuario->getprovincia(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ciudad_data::save($dato_general_usuario->getciudad(),$this->connexion);
		$ciudadLogic= new ciudad_logic($this->connexion);
		$ciudadLogic->deepSave($dato_general_usuario->getciudad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				usuario_data::save($dato_general_usuario->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($dato_general_usuario->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==pais::$class.'') {
				pais_data::save($dato_general_usuario->getpais(),$this->connexion);
				$paisLogic= new pais_logic($this->connexion);
				$paisLogic->deepSave($dato_general_usuario->getpais(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==provincia::$class.'') {
				provincia_data::save($dato_general_usuario->getprovincia(),$this->connexion);
				$provinciaLogic= new provincia_logic($this->connexion);
				$provinciaLogic->deepSave($dato_general_usuario->getprovincia(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ciudad::$class.'') {
				ciudad_data::save($dato_general_usuario->getciudad(),$this->connexion);
				$ciudadLogic= new ciudad_logic($this->connexion);
				$ciudadLogic->deepSave($dato_general_usuario->getciudad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($dato_general_usuario->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($dato_general_usuario->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			pais_data::save($dato_general_usuario->getpais(),$this->connexion);
			$paisLogic= new pais_logic($this->connexion);
			$paisLogic->deepSave($dato_general_usuario->getpais(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==provincia::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			provincia_data::save($dato_general_usuario->getprovincia(),$this->connexion);
			$provinciaLogic= new provincia_logic($this->connexion);
			$provinciaLogic->deepSave($dato_general_usuario->getprovincia(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ciudad_data::save($dato_general_usuario->getciudad(),$this->connexion);
			$ciudadLogic= new ciudad_logic($this->connexion);
			$ciudadLogic->deepSave($dato_general_usuario->getciudad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				dato_general_usuario_data::save($dato_general_usuario, $this->connexion);
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
			
			$this->deepLoad($this->dato_general_usuario,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->dato_general_usuarios as $dato_general_usuario) {
				$this->deepLoad($dato_general_usuario,$isDeep,$deepLoadType,$clases);
								
				dato_general_usuario_util::refrescarFKDescripciones($this->dato_general_usuarios);
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
			
			foreach($this->dato_general_usuarios as $dato_general_usuario) {
				$this->deepLoad($dato_general_usuario,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->dato_general_usuario,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->dato_general_usuarios as $dato_general_usuario) {
				$this->deepSave($dato_general_usuario,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->dato_general_usuarios as $dato_general_usuario) {
				$this->deepSave($dato_general_usuario,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(usuario::$class);
				$classes[]=new Classe(pais::$class);
				$classes[]=new Classe(provincia::$class);
				$classes[]=new Classe(ciudad::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==usuario::$class) {
						$classes[]=new Classe(usuario::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==pais::$class) {
						$classes[]=new Classe(pais::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==provincia::$class) {
						$classes[]=new Classe(provincia::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==ciudad::$class) {
						$classes[]=new Classe(ciudad::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(usuario::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==pais::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(pais::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==provincia::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(provincia::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==ciudad::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(ciudad::$class);
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
	
	
	
	
	
	
	
	public function getdato_general_usuario() : ?dato_general_usuario {	
		/*
		dato_general_usuario_logic_add::checkdato_general_usuarioToGet($this->dato_general_usuario,$this->datosCliente);
		dato_general_usuario_logic_add::updatedato_general_usuarioToGet($this->dato_general_usuario);
		*/
			
		return $this->dato_general_usuario;
	}
		
	public function setdato_general_usuario(dato_general_usuario $newdato_general_usuario) {
		$this->dato_general_usuario = $newdato_general_usuario;
	}
	
	public function getdato_general_usuarios() : array {		
		/*
		dato_general_usuario_logic_add::checkdato_general_usuarioToGets($this->dato_general_usuarios,$this->datosCliente);
		
		foreach ($this->dato_general_usuarios as $dato_general_usuarioLocal ) {
			dato_general_usuario_logic_add::updatedato_general_usuarioToGet($dato_general_usuarioLocal);
		}
		*/
		
		return $this->dato_general_usuarios;
	}
	
	public function setdato_general_usuarios(array $newdato_general_usuarios) {
		$this->dato_general_usuarios = $newdato_general_usuarios;
	}
	
	public function getdato_general_usuarioDataAccess() : dato_general_usuario_data {
		return $this->dato_general_usuarioDataAccess;
	}
	
	public function setdato_general_usuarioDataAccess(dato_general_usuario_data $newdato_general_usuarioDataAccess) {
		$this->dato_general_usuarioDataAccess = $newdato_general_usuarioDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        dato_general_usuario_carga::$CONTROLLER;;        
		
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
