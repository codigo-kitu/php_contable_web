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

namespace com\bydan\contabilidad\seguridad\perfil_usuario\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_carga;
use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_param_return;

use com\bydan\contabilidad\seguridad\perfil_usuario\presentation\session\perfil_usuario_session;

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

use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_util;
use com\bydan\contabilidad\seguridad\perfil_usuario\business\entity\perfil_usuario;
use com\bydan\contabilidad\seguridad\perfil_usuario\business\data\perfil_usuario_data;

//FK


use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\business\data\perfil_data;
use com\bydan\contabilidad\seguridad\perfil\business\logic\perfil_logic;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;

use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

//REL


//REL DETALLES




class perfil_usuario_logic  extends GeneralEntityLogic implements perfil_usuario_logicI {	
	/*GENERAL*/
	public perfil_usuario_data $perfil_usuarioDataAccess;
	//public ?perfil_usuario_logic_add $perfil_usuarioLogicAdditional=null;
	public ?perfil_usuario $perfil_usuario;
	public array $perfil_usuarios;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->perfil_usuarioDataAccess = new perfil_usuario_data();			
			$this->perfil_usuarios = array();
			$this->perfil_usuario = new perfil_usuario();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->perfil_usuarioLogicAdditional = new perfil_usuario_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->perfil_usuarioLogicAdditional==null) {
		//	$this->perfil_usuarioLogicAdditional=new perfil_usuario_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->perfil_usuarioDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->perfil_usuarioDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->perfil_usuarioDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->perfil_usuarioDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->perfil_usuarios = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_usuarios=$this->perfil_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_usuario_util::refrescarFKDescripciones($this->perfil_usuarios);
			}
			
			//perfil_usuario_logic_add::checkperfil_usuarioToGets($this->perfil_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_usuarios);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->perfil_usuarios = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_usuarios=$this->perfil_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_usuario_util::refrescarFKDescripciones($this->perfil_usuarios);
			}
			
			//perfil_usuario_logic_add::checkperfil_usuarioToGets($this->perfil_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_usuarios);
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
		$this->perfil_usuario = new perfil_usuario();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->perfil_usuario=$this->perfil_usuarioDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->perfil_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				perfil_usuario_util::refrescarFKDescripcion($this->perfil_usuario);
			}
						
			//perfil_usuario_logic_add::checkperfil_usuarioToGet($this->perfil_usuario,$this->datosCliente);
			//perfil_usuario_logic_add::updateperfil_usuarioToGet($this->perfil_usuario);
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
		$this->perfil_usuario = new  perfil_usuario();
		  		  
        try {		
			$this->perfil_usuario=$this->perfil_usuarioDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->perfil_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				perfil_usuario_util::refrescarFKDescripcion($this->perfil_usuario);
			}
			
			//perfil_usuario_logic_add::checkperfil_usuarioToGet($this->perfil_usuario,$this->datosCliente);
			//perfil_usuario_logic_add::updateperfil_usuarioToGet($this->perfil_usuario);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?perfil_usuario {
		$perfil_usuarioLogic = new  perfil_usuario_logic();
		  		  
        try {		
			$perfil_usuarioLogic->setConnexion($connexion);			
			$perfil_usuarioLogic->getEntity($id);			
			return $perfil_usuarioLogic->getperfil_usuario();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->perfil_usuario = new  perfil_usuario();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->perfil_usuario=$this->perfil_usuarioDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->perfil_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				perfil_usuario_util::refrescarFKDescripcion($this->perfil_usuario);
			}
			
			//perfil_usuario_logic_add::checkperfil_usuarioToGet($this->perfil_usuario,$this->datosCliente);
			//perfil_usuario_logic_add::updateperfil_usuarioToGet($this->perfil_usuario);
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
		$this->perfil_usuario = new  perfil_usuario();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_usuario=$this->perfil_usuarioDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->perfil_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				perfil_usuario_util::refrescarFKDescripcion($this->perfil_usuario);
			}
			
			//perfil_usuario_logic_add::checkperfil_usuarioToGet($this->perfil_usuario,$this->datosCliente);
			//perfil_usuario_logic_add::updateperfil_usuarioToGet($this->perfil_usuario);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?perfil_usuario {
		$perfil_usuarioLogic = new  perfil_usuario_logic();
		  		  
        try {		
			$perfil_usuarioLogic->setConnexion($connexion);			
			$perfil_usuarioLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $perfil_usuarioLogic->getperfil_usuario();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->perfil_usuarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->perfil_usuarios=$this->perfil_usuarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_usuario_util::refrescarFKDescripciones($this->perfil_usuarios);
			}
			
			//perfil_usuario_logic_add::checkperfil_usuarioToGets($this->perfil_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_usuarios);			
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
		$this->perfil_usuarios = array();
		  		  
        try {			
			$this->perfil_usuarios=$this->perfil_usuarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_usuario_util::refrescarFKDescripciones($this->perfil_usuarios);
			}
			
			//perfil_usuario_logic_add::checkperfil_usuarioToGets($this->perfil_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_usuarios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->perfil_usuarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_usuarios=$this->perfil_usuarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_usuario_util::refrescarFKDescripciones($this->perfil_usuarios);
			}
			
			//perfil_usuario_logic_add::checkperfil_usuarioToGets($this->perfil_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_usuarios);
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
		$this->perfil_usuarios = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_usuarios=$this->perfil_usuarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_usuario_util::refrescarFKDescripciones($this->perfil_usuarios);
			}
			
			//perfil_usuario_logic_add::checkperfil_usuarioToGets($this->perfil_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_usuarios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$perfil_usuarioLogic = new  perfil_usuario_logic();
		  		  
        try {		
			$perfil_usuarioLogic->setConnexion($connexion);			
			$perfil_usuarioLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $perfil_usuarioLogic->getperfil_usuarios();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->perfil_usuarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->perfil_usuarios=$this->perfil_usuarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_usuario_util::refrescarFKDescripciones($this->perfil_usuarios);
			}
			
			//perfil_usuario_logic_add::checkperfil_usuarioToGets($this->perfil_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_usuarios);
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
		$this->perfil_usuarios = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_usuarios=$this->perfil_usuarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_usuario_util::refrescarFKDescripciones($this->perfil_usuarios);
			}
			
			//perfil_usuario_logic_add::checkperfil_usuarioToGets($this->perfil_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_usuarios);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->perfil_usuarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_usuarios=$this->perfil_usuarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_usuario_util::refrescarFKDescripciones($this->perfil_usuarios);
			}
			
			//perfil_usuario_logic_add::checkperfil_usuarioToGets($this->perfil_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_usuarios);
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
		$this->perfil_usuarios = array();
		  		  
        try {			
			$this->perfil_usuarios=$this->perfil_usuarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_usuario_util::refrescarFKDescripciones($this->perfil_usuarios);
			}	
			
			//perfil_usuario_logic_add::checkperfil_usuarioToGets($this->perfil_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_usuarios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->perfil_usuarios = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->perfil_usuarios=$this->perfil_usuarioDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_usuario_util::refrescarFKDescripciones($this->perfil_usuarios);
			}
			
			//perfil_usuario_logic_add::checkperfil_usuarioToGets($this->perfil_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_usuarios);
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
		$this->perfil_usuarios = array();
		  		  
        try {		
			$this->perfil_usuarios=$this->perfil_usuarioDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_usuario_util::refrescarFKDescripciones($this->perfil_usuarios);
			}
			
			//perfil_usuario_logic_add::checkperfil_usuarioToGets($this->perfil_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_usuarios);

		}  catch(Exception $e) {						
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
			$parameterSelectionGeneralid_perfil->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_perfil,perfil_usuario_util::$ID_PERFIL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_perfil);

			$this->perfil_usuarios=$this->perfil_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_usuario_util::refrescarFKDescripciones($this->perfil_usuarios);
			}
			//perfil_usuario_logic_add::checkperfil_usuarioToGets($this->perfil_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfil_usuarios);

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
			$parameterSelectionGeneralid_perfil->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_perfil,perfil_usuario_util::$ID_PERFIL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_perfil);

			$this->perfil_usuarios=$this->perfil_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_usuario_util::refrescarFKDescripciones($this->perfil_usuarios);
			}
			//perfil_usuario_logic_add::checkperfil_usuarioToGets($this->perfil_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfil_usuarios);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdusuarioWithConnection(string $strFinalQuery,Pagination $pagination,int $id_usuario) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_usuario= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,perfil_usuario_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->perfil_usuarios=$this->perfil_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_usuario_util::refrescarFKDescripciones($this->perfil_usuarios);
			}
			//perfil_usuario_logic_add::checkperfil_usuarioToGets($this->perfil_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfil_usuarios);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idusuario(string $strFinalQuery,Pagination $pagination,int $id_usuario) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_usuario= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,perfil_usuario_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->perfil_usuarios=$this->perfil_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_usuario_util::refrescarFKDescripciones($this->perfil_usuarios);
			}
			//perfil_usuario_logic_add::checkperfil_usuarioToGets($this->perfil_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfil_usuarios);
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
						
			//perfil_usuario_logic_add::checkperfil_usuarioToSave($this->perfil_usuario,$this->datosCliente,$this->connexion);	       
			//perfil_usuario_logic_add::updateperfil_usuarioToSave($this->perfil_usuario);			
			perfil_usuario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->perfil_usuario,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->perfil_usuarioLogicAdditional->checkGeneralEntityToSave($this,$this->perfil_usuario,$this->datosCliente,$this->connexion);
			
			
			perfil_usuario_data::save($this->perfil_usuario, $this->connexion);	    	       	 				
			//perfil_usuario_logic_add::checkperfil_usuarioToSaveAfter($this->perfil_usuario,$this->datosCliente,$this->connexion);			
			//$this->perfil_usuarioLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->perfil_usuario,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->perfil_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->perfil_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				perfil_usuario_util::refrescarFKDescripcion($this->perfil_usuario);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->perfil_usuario->getIsDeleted()) {
				$this->perfil_usuario=null;
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
						
			/*perfil_usuario_logic_add::checkperfil_usuarioToSave($this->perfil_usuario,$this->datosCliente,$this->connexion);*/	        
			//perfil_usuario_logic_add::updateperfil_usuarioToSave($this->perfil_usuario);			
			//$this->perfil_usuarioLogicAdditional->checkGeneralEntityToSave($this,$this->perfil_usuario,$this->datosCliente,$this->connexion);			
			perfil_usuario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->perfil_usuario,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			perfil_usuario_data::save($this->perfil_usuario, $this->connexion);	    	       	 						
			/*perfil_usuario_logic_add::checkperfil_usuarioToSaveAfter($this->perfil_usuario,$this->datosCliente,$this->connexion);*/			
			//$this->perfil_usuarioLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->perfil_usuario,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->perfil_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->perfil_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				perfil_usuario_util::refrescarFKDescripcion($this->perfil_usuario);				
			}
			
			if($this->perfil_usuario->getIsDeleted()) {
				$this->perfil_usuario=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(perfil_usuario $perfil_usuario,Connexion $connexion)  {
		$perfil_usuarioLogic = new  perfil_usuario_logic();		  		  
        try {		
			$perfil_usuarioLogic->setConnexion($connexion);			
			$perfil_usuarioLogic->setperfil_usuario($perfil_usuario);			
			$perfil_usuarioLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*perfil_usuario_logic_add::checkperfil_usuarioToSaves($this->perfil_usuarios,$this->datosCliente,$this->connexion);*/	        	
			//$this->perfil_usuarioLogicAdditional->checkGeneralEntitiesToSaves($this,$this->perfil_usuarios,$this->datosCliente,$this->connexion);
			
	   		foreach($this->perfil_usuarios as $perfil_usuarioLocal) {				
								
				//perfil_usuario_logic_add::updateperfil_usuarioToSave($perfil_usuarioLocal);	        	
				perfil_usuario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$perfil_usuarioLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				perfil_usuario_data::save($perfil_usuarioLocal, $this->connexion);				
			}
			
			/*perfil_usuario_logic_add::checkperfil_usuarioToSavesAfter($this->perfil_usuarios,$this->datosCliente,$this->connexion);*/			
			//$this->perfil_usuarioLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->perfil_usuarios,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_usuario_util::refrescarFKDescripciones($this->perfil_usuarios);
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
			/*perfil_usuario_logic_add::checkperfil_usuarioToSaves($this->perfil_usuarios,$this->datosCliente,$this->connexion);*/			
			//$this->perfil_usuarioLogicAdditional->checkGeneralEntitiesToSaves($this,$this->perfil_usuarios,$this->datosCliente,$this->connexion);
			
	   		foreach($this->perfil_usuarios as $perfil_usuarioLocal) {				
								
				//perfil_usuario_logic_add::updateperfil_usuarioToSave($perfil_usuarioLocal);	        	
				perfil_usuario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$perfil_usuarioLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				perfil_usuario_data::save($perfil_usuarioLocal, $this->connexion);				
			}			
			
			/*perfil_usuario_logic_add::checkperfil_usuarioToSavesAfter($this->perfil_usuarios,$this->datosCliente,$this->connexion);*/			
			//$this->perfil_usuarioLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->perfil_usuarios,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_usuario_util::refrescarFKDescripciones($this->perfil_usuarios);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $perfil_usuarios,Connexion $connexion)  {
		$perfil_usuarioLogic = new  perfil_usuario_logic();
		  		  
        try {		
			$perfil_usuarioLogic->setConnexion($connexion);			
			$perfil_usuarioLogic->setperfil_usuarios($perfil_usuarios);			
			$perfil_usuarioLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$perfil_usuariosAux=array();
		
		foreach($this->perfil_usuarios as $perfil_usuario) {
			if($perfil_usuario->getIsDeleted()==false) {
				$perfil_usuariosAux[]=$perfil_usuario;
			}
		}
		
		$this->perfil_usuarios=$perfil_usuariosAux;
	}
	
	public function updateToGetsAuxiliar(array &$perfil_usuarios) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->perfil_usuarios as $perfil_usuario) {
				
				$perfil_usuario->setid_perfil_Descripcion(perfil_usuario_util::getperfilDescripcion($perfil_usuario->getperfil()));
				$perfil_usuario->setid_usuario_Descripcion(perfil_usuario_util::getusuarioDescripcion($perfil_usuario->getusuario()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$perfil_usuario_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$perfil_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$perfil_usuario_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$perfil_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$perfil_usuario_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$perfil_usuarioForeignKey=new perfil_usuario_param_return();//perfil_usuarioForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_perfil',$strRecargarFkTipos,',')) {
				$this->cargarCombosperfilsFK($this->connexion,$strRecargarFkQuery,$perfil_usuarioForeignKey,$perfil_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$perfil_usuarioForeignKey,$perfil_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_perfil',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperfilsFK($this->connexion,' where id=-1 ',$perfil_usuarioForeignKey,$perfil_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$perfil_usuarioForeignKey,$perfil_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $perfil_usuarioForeignKey;
			
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
	
	
	public function cargarCombosperfilsFK($connexion=null,$strRecargarFkQuery='',$perfil_usuarioForeignKey,$perfil_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$perfilLogic= new perfil_logic();
		$pagination= new Pagination();
		$perfil_usuarioForeignKey->perfilsFK=array();

		$perfilLogic->setConnexion($connexion);
		$perfilLogic->getperfilDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($perfil_usuario_session==null) {
			$perfil_usuario_session=new perfil_usuario_session();
		}
		
		if($perfil_usuario_session->bitBusquedaDesdeFKSesionperfil!=true) {
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
				if($perfil_usuarioForeignKey->idperfilDefaultFK==0) {
					$perfil_usuarioForeignKey->idperfilDefaultFK=$perfilLocal->getId();
				}

				$perfil_usuarioForeignKey->perfilsFK[$perfilLocal->getId()]=perfil_usuario_util::getperfilDescripcion($perfilLocal);
			}

		} else {

			if($perfil_usuario_session->bigidperfilActual!=null && $perfil_usuario_session->bigidperfilActual > 0) {
				$perfilLogic->getEntity($perfil_usuario_session->bigidperfilActual);//WithConnection

				$perfil_usuarioForeignKey->perfilsFK[$perfilLogic->getperfil()->getId()]=perfil_usuario_util::getperfilDescripcion($perfilLogic->getperfil());
				$perfil_usuarioForeignKey->idperfilDefaultFK=$perfilLogic->getperfil()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$perfil_usuarioForeignKey,$perfil_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$perfil_usuarioForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($perfil_usuario_session==null) {
			$perfil_usuario_session=new perfil_usuario_session();
		}
		
		if($perfil_usuario_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($perfil_usuarioForeignKey->idusuarioDefaultFK==0) {
					$perfil_usuarioForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$perfil_usuarioForeignKey->usuariosFK[$usuarioLocal->getId()]=perfil_usuario_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($perfil_usuario_session->bigidusuarioActual!=null && $perfil_usuario_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($perfil_usuario_session->bigidusuarioActual);//WithConnection

				$perfil_usuarioForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=perfil_usuario_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$perfil_usuarioForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($perfil_usuario) {
		$this->saveRelacionesBase($perfil_usuario,true);
	}

	public function saveRelaciones($perfil_usuario) {
		$this->saveRelacionesBase($perfil_usuario,false);
	}

	public function saveRelacionesBase($perfil_usuario,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setperfil_usuario($perfil_usuario);

			if(true) {

				//perfil_usuario_logic_add::updateRelacionesToSave($perfil_usuario,$this);

				if(($this->perfil_usuario->getIsNew() || $this->perfil_usuario->getIsChanged()) && !$this->perfil_usuario->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->perfil_usuario->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//perfil_usuario_logic_add::updateRelacionesToSaveAfter($perfil_usuario,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $perfil_usuarios,perfil_usuario_param_return $perfil_usuarioParameterGeneral) : perfil_usuario_param_return {
		$perfil_usuarioReturnGeneral=new perfil_usuario_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $perfil_usuarioReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $perfil_usuarios,perfil_usuario_param_return $perfil_usuarioParameterGeneral) : perfil_usuario_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$perfil_usuarioReturnGeneral=new perfil_usuario_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $perfil_usuarioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $perfil_usuarios,perfil_usuario $perfil_usuario,perfil_usuario_param_return $perfil_usuarioParameterGeneral,bool $isEsNuevoperfil_usuario,array $clases) : perfil_usuario_param_return {
		 try {	
			$perfil_usuarioReturnGeneral=new perfil_usuario_param_return();
	
			$perfil_usuarioReturnGeneral->setperfil_usuario($perfil_usuario);
			$perfil_usuarioReturnGeneral->setperfil_usuarios($perfil_usuarios);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$perfil_usuarioReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $perfil_usuarioReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $perfil_usuarios,perfil_usuario $perfil_usuario,perfil_usuario_param_return $perfil_usuarioParameterGeneral,bool $isEsNuevoperfil_usuario,array $clases) : perfil_usuario_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$perfil_usuarioReturnGeneral=new perfil_usuario_param_return();
	
			$perfil_usuarioReturnGeneral->setperfil_usuario($perfil_usuario);
			$perfil_usuarioReturnGeneral->setperfil_usuarios($perfil_usuarios);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$perfil_usuarioReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $perfil_usuarioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $perfil_usuarios,perfil_usuario $perfil_usuario,perfil_usuario_param_return $perfil_usuarioParameterGeneral,bool $isEsNuevoperfil_usuario,array $clases) : perfil_usuario_param_return {
		 try {	
			$perfil_usuarioReturnGeneral=new perfil_usuario_param_return();
	
			$perfil_usuarioReturnGeneral->setperfil_usuario($perfil_usuario);
			$perfil_usuarioReturnGeneral->setperfil_usuarios($perfil_usuarios);
			
			
			
			return $perfil_usuarioReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $perfil_usuarios,perfil_usuario $perfil_usuario,perfil_usuario_param_return $perfil_usuarioParameterGeneral,bool $isEsNuevoperfil_usuario,array $clases) : perfil_usuario_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$perfil_usuarioReturnGeneral=new perfil_usuario_param_return();
	
			$perfil_usuarioReturnGeneral->setperfil_usuario($perfil_usuario);
			$perfil_usuarioReturnGeneral->setperfil_usuarios($perfil_usuarios);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $perfil_usuarioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,perfil_usuario $perfil_usuario,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,perfil_usuario $perfil_usuario,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		perfil_usuario_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(perfil_usuario $perfil_usuario,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//perfil_usuario_logic_add::updateperfil_usuarioToGet($this->perfil_usuario);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$perfil_usuario->setperfil($this->perfil_usuarioDataAccess->getperfil($this->connexion,$perfil_usuario));
		$perfil_usuario->setusuario($this->perfil_usuarioDataAccess->getusuario($this->connexion,$perfil_usuario));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class.'') {
				$perfil_usuario->setperfil($this->perfil_usuarioDataAccess->getperfil($this->connexion,$perfil_usuario));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$perfil_usuario->setusuario($this->perfil_usuarioDataAccess->getusuario($this->connexion,$perfil_usuario));
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
			$perfil_usuario->setperfil($this->perfil_usuarioDataAccess->getperfil($this->connexion,$perfil_usuario));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$perfil_usuario->setusuario($this->perfil_usuarioDataAccess->getusuario($this->connexion,$perfil_usuario));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$perfil_usuario->setperfil($this->perfil_usuarioDataAccess->getperfil($this->connexion,$perfil_usuario));
		$perfilLogic= new perfil_logic($this->connexion);
		$perfilLogic->deepLoad($perfil_usuario->getperfil(),$isDeep,$deepLoadType,$clases);
				
		$perfil_usuario->setusuario($this->perfil_usuarioDataAccess->getusuario($this->connexion,$perfil_usuario));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($perfil_usuario->getusuario(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class.'') {
				$perfil_usuario->setperfil($this->perfil_usuarioDataAccess->getperfil($this->connexion,$perfil_usuario));
				$perfilLogic= new perfil_logic($this->connexion);
				$perfilLogic->deepLoad($perfil_usuario->getperfil(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$perfil_usuario->setusuario($this->perfil_usuarioDataAccess->getusuario($this->connexion,$perfil_usuario));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($perfil_usuario->getusuario(),$isDeep,$deepLoadType,$clases);				
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
			$perfil_usuario->setperfil($this->perfil_usuarioDataAccess->getperfil($this->connexion,$perfil_usuario));
			$perfilLogic= new perfil_logic($this->connexion);
			$perfilLogic->deepLoad($perfil_usuario->getperfil(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$perfil_usuario->setusuario($this->perfil_usuarioDataAccess->getusuario($this->connexion,$perfil_usuario));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($perfil_usuario->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(perfil_usuario $perfil_usuario,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//perfil_usuario_logic_add::updateperfil_usuarioToSave($this->perfil_usuario);			
			
			if(!$paraDeleteCascade) {				
				perfil_usuario_data::save($perfil_usuario, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		perfil_data::save($perfil_usuario->getperfil(),$this->connexion);
		usuario_data::save($perfil_usuario->getusuario(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class.'') {
				perfil_data::save($perfil_usuario->getperfil(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($perfil_usuario->getusuario(),$this->connexion);
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
			perfil_data::save($perfil_usuario->getperfil(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($perfil_usuario->getusuario(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		perfil_data::save($perfil_usuario->getperfil(),$this->connexion);
		$perfilLogic= new perfil_logic($this->connexion);
		$perfilLogic->deepSave($perfil_usuario->getperfil(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($perfil_usuario->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($perfil_usuario->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class.'') {
				perfil_data::save($perfil_usuario->getperfil(),$this->connexion);
				$perfilLogic= new perfil_logic($this->connexion);
				$perfilLogic->deepSave($perfil_usuario->getperfil(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($perfil_usuario->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($perfil_usuario->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			perfil_data::save($perfil_usuario->getperfil(),$this->connexion);
			$perfilLogic= new perfil_logic($this->connexion);
			$perfilLogic->deepSave($perfil_usuario->getperfil(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($perfil_usuario->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($perfil_usuario->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				perfil_usuario_data::save($perfil_usuario, $this->connexion);
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
			
			$this->deepLoad($this->perfil_usuario,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->perfil_usuarios as $perfil_usuario) {
				$this->deepLoad($perfil_usuario,$isDeep,$deepLoadType,$clases);
								
				perfil_usuario_util::refrescarFKDescripciones($this->perfil_usuarios);
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
			
			foreach($this->perfil_usuarios as $perfil_usuario) {
				$this->deepLoad($perfil_usuario,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->perfil_usuario,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->perfil_usuarios as $perfil_usuario) {
				$this->deepSave($perfil_usuario,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->perfil_usuarios as $perfil_usuario) {
				$this->deepSave($perfil_usuario,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(usuario::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==perfil::$class) {
						$classes[]=new Classe(perfil::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==usuario::$class) {
						$classes[]=new Classe(usuario::$class);
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
					if($clas->clas==usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(usuario::$class);
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
	
	
	
	
	
	
	
	public function getperfil_usuario() : ?perfil_usuario {	
		/*
		perfil_usuario_logic_add::checkperfil_usuarioToGet($this->perfil_usuario,$this->datosCliente);
		perfil_usuario_logic_add::updateperfil_usuarioToGet($this->perfil_usuario);
		*/
			
		return $this->perfil_usuario;
	}
		
	public function setperfil_usuario(perfil_usuario $newperfil_usuario) {
		$this->perfil_usuario = $newperfil_usuario;
	}
	
	public function getperfil_usuarios() : array {		
		/*
		perfil_usuario_logic_add::checkperfil_usuarioToGets($this->perfil_usuarios,$this->datosCliente);
		
		foreach ($this->perfil_usuarios as $perfil_usuarioLocal ) {
			perfil_usuario_logic_add::updateperfil_usuarioToGet($perfil_usuarioLocal);
		}
		*/
		
		return $this->perfil_usuarios;
	}
	
	public function setperfil_usuarios(array $newperfil_usuarios) {
		$this->perfil_usuarios = $newperfil_usuarios;
	}
	
	public function getperfil_usuarioDataAccess() : perfil_usuario_data {
		return $this->perfil_usuarioDataAccess;
	}
	
	public function setperfil_usuarioDataAccess(perfil_usuario_data $newperfil_usuarioDataAccess) {
		$this->perfil_usuarioDataAccess = $newperfil_usuarioDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        perfil_usuario_carga::$CONTROLLER;;        
		
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
