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

namespace com\bydan\contabilidad\seguridad\resumen_usuario\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_carga;
use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_param_return;

use com\bydan\contabilidad\seguridad\resumen_usuario\presentation\session\resumen_usuario_session;

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

use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_util;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\entity\resumen_usuario;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\data\resumen_usuario_data;

//FK


use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

//REL


//REL DETALLES




class resumen_usuario_logic  extends GeneralEntityLogic implements resumen_usuario_logicI {	
	/*GENERAL*/
	public resumen_usuario_data $resumen_usuarioDataAccess;
	public ?resumen_usuario_logic_add $resumen_usuarioLogicAdditional=null;
	public ?resumen_usuario $resumen_usuario;
	public array $resumen_usuarios;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->resumen_usuarioDataAccess = new resumen_usuario_data();			
			$this->resumen_usuarios = array();
			$this->resumen_usuario = new resumen_usuario();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->resumen_usuarioLogicAdditional = new resumen_usuario_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->resumen_usuarioLogicAdditional==null) {
			$this->resumen_usuarioLogicAdditional=new resumen_usuario_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->resumen_usuarioDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->resumen_usuarioDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->resumen_usuarioDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->resumen_usuarioDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->resumen_usuarios = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->resumen_usuarios=$this->resumen_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				resumen_usuario_util::refrescarFKDescripciones($this->resumen_usuarios);
			}
			
			resumen_usuario_logic_add::checkresumen_usuarioToGets($this->resumen_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->resumen_usuarios);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->resumen_usuarios = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->resumen_usuarios=$this->resumen_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				resumen_usuario_util::refrescarFKDescripciones($this->resumen_usuarios);
			}
			
			resumen_usuario_logic_add::checkresumen_usuarioToGets($this->resumen_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->resumen_usuarios);
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
		$this->resumen_usuario = new resumen_usuario();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->resumen_usuario=$this->resumen_usuarioDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->resumen_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				resumen_usuario_util::refrescarFKDescripcion($this->resumen_usuario);
			}
						
			resumen_usuario_logic_add::checkresumen_usuarioToGet($this->resumen_usuario,$this->datosCliente);
			resumen_usuario_logic_add::updateresumen_usuarioToGet($this->resumen_usuario);
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
		$this->resumen_usuario = new  resumen_usuario();
		  		  
        try {		
			$this->resumen_usuario=$this->resumen_usuarioDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->resumen_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				resumen_usuario_util::refrescarFKDescripcion($this->resumen_usuario);
			}
			
			resumen_usuario_logic_add::checkresumen_usuarioToGet($this->resumen_usuario,$this->datosCliente);
			resumen_usuario_logic_add::updateresumen_usuarioToGet($this->resumen_usuario);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?resumen_usuario {
		$resumen_usuarioLogic = new  resumen_usuario_logic();
		  		  
        try {		
			$resumen_usuarioLogic->setConnexion($connexion);			
			$resumen_usuarioLogic->getEntity($id);			
			return $resumen_usuarioLogic->getresumen_usuario();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->resumen_usuario = new  resumen_usuario();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->resumen_usuario=$this->resumen_usuarioDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->resumen_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				resumen_usuario_util::refrescarFKDescripcion($this->resumen_usuario);
			}
			
			resumen_usuario_logic_add::checkresumen_usuarioToGet($this->resumen_usuario,$this->datosCliente);
			resumen_usuario_logic_add::updateresumen_usuarioToGet($this->resumen_usuario);
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
		$this->resumen_usuario = new  resumen_usuario();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->resumen_usuario=$this->resumen_usuarioDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->resumen_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				resumen_usuario_util::refrescarFKDescripcion($this->resumen_usuario);
			}
			
			resumen_usuario_logic_add::checkresumen_usuarioToGet($this->resumen_usuario,$this->datosCliente);
			resumen_usuario_logic_add::updateresumen_usuarioToGet($this->resumen_usuario);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?resumen_usuario {
		$resumen_usuarioLogic = new  resumen_usuario_logic();
		  		  
        try {		
			$resumen_usuarioLogic->setConnexion($connexion);			
			$resumen_usuarioLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $resumen_usuarioLogic->getresumen_usuario();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->resumen_usuarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->resumen_usuarios=$this->resumen_usuarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				resumen_usuario_util::refrescarFKDescripciones($this->resumen_usuarios);
			}
			
			resumen_usuario_logic_add::checkresumen_usuarioToGets($this->resumen_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->resumen_usuarios);			
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
		$this->resumen_usuarios = array();
		  		  
        try {			
			$this->resumen_usuarios=$this->resumen_usuarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				resumen_usuario_util::refrescarFKDescripciones($this->resumen_usuarios);
			}
			
			resumen_usuario_logic_add::checkresumen_usuarioToGets($this->resumen_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->resumen_usuarios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->resumen_usuarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->resumen_usuarios=$this->resumen_usuarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				resumen_usuario_util::refrescarFKDescripciones($this->resumen_usuarios);
			}
			
			resumen_usuario_logic_add::checkresumen_usuarioToGets($this->resumen_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->resumen_usuarios);
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
		$this->resumen_usuarios = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->resumen_usuarios=$this->resumen_usuarioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				resumen_usuario_util::refrescarFKDescripciones($this->resumen_usuarios);
			}
			
			resumen_usuario_logic_add::checkresumen_usuarioToGets($this->resumen_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->resumen_usuarios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$resumen_usuarioLogic = new  resumen_usuario_logic();
		  		  
        try {		
			$resumen_usuarioLogic->setConnexion($connexion);			
			$resumen_usuarioLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $resumen_usuarioLogic->getresumen_usuarios();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->resumen_usuarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->resumen_usuarios=$this->resumen_usuarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				resumen_usuario_util::refrescarFKDescripciones($this->resumen_usuarios);
			}
			
			resumen_usuario_logic_add::checkresumen_usuarioToGets($this->resumen_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->resumen_usuarios);
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
		$this->resumen_usuarios = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->resumen_usuarios=$this->resumen_usuarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				resumen_usuario_util::refrescarFKDescripciones($this->resumen_usuarios);
			}
			
			resumen_usuario_logic_add::checkresumen_usuarioToGets($this->resumen_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->resumen_usuarios);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->resumen_usuarios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->resumen_usuarios=$this->resumen_usuarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				resumen_usuario_util::refrescarFKDescripciones($this->resumen_usuarios);
			}
			
			resumen_usuario_logic_add::checkresumen_usuarioToGets($this->resumen_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->resumen_usuarios);
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
		$this->resumen_usuarios = array();
		  		  
        try {			
			$this->resumen_usuarios=$this->resumen_usuarioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				resumen_usuario_util::refrescarFKDescripciones($this->resumen_usuarios);
			}	
			
			resumen_usuario_logic_add::checkresumen_usuarioToGets($this->resumen_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->resumen_usuarios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->resumen_usuarios = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->resumen_usuarios=$this->resumen_usuarioDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				resumen_usuario_util::refrescarFKDescripciones($this->resumen_usuarios);
			}
			
			resumen_usuario_logic_add::checkresumen_usuarioToGets($this->resumen_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->resumen_usuarios);
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
		$this->resumen_usuarios = array();
		  		  
        try {		
			$this->resumen_usuarios=$this->resumen_usuarioDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				resumen_usuario_util::refrescarFKDescripciones($this->resumen_usuarios);
			}
			
			resumen_usuario_logic_add::checkresumen_usuarioToGets($this->resumen_usuarios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->resumen_usuarios);

		}  catch(Exception $e) {						
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,resumen_usuario_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->resumen_usuarios=$this->resumen_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				resumen_usuario_util::refrescarFKDescripciones($this->resumen_usuarios);
			}
			resumen_usuario_logic_add::checkresumen_usuarioToGets($this->resumen_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->resumen_usuarios);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,resumen_usuario_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->resumen_usuarios=$this->resumen_usuarioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				resumen_usuario_util::refrescarFKDescripciones($this->resumen_usuarios);
			}
			resumen_usuario_logic_add::checkresumen_usuarioToGets($this->resumen_usuarios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->resumen_usuarios);
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
						
			//resumen_usuario_logic_add::checkresumen_usuarioToSave($this->resumen_usuario,$this->datosCliente,$this->connexion);	       
			resumen_usuario_logic_add::updateresumen_usuarioToSave($this->resumen_usuario);			
			resumen_usuario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->resumen_usuario,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->resumen_usuarioLogicAdditional->checkGeneralEntityToSave($this,$this->resumen_usuario,$this->datosCliente,$this->connexion);
			
			
			resumen_usuario_data::save($this->resumen_usuario, $this->connexion);	    	       	 				
			//resumen_usuario_logic_add::checkresumen_usuarioToSaveAfter($this->resumen_usuario,$this->datosCliente,$this->connexion);			
			$this->resumen_usuarioLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->resumen_usuario,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->resumen_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->resumen_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				resumen_usuario_util::refrescarFKDescripcion($this->resumen_usuario);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->resumen_usuario->getIsDeleted()) {
				$this->resumen_usuario=null;
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
						
			/*resumen_usuario_logic_add::checkresumen_usuarioToSave($this->resumen_usuario,$this->datosCliente,$this->connexion);*/	        
			resumen_usuario_logic_add::updateresumen_usuarioToSave($this->resumen_usuario);			
			$this->resumen_usuarioLogicAdditional->checkGeneralEntityToSave($this,$this->resumen_usuario,$this->datosCliente,$this->connexion);			
			resumen_usuario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->resumen_usuario,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			resumen_usuario_data::save($this->resumen_usuario, $this->connexion);	    	       	 						
			/*resumen_usuario_logic_add::checkresumen_usuarioToSaveAfter($this->resumen_usuario,$this->datosCliente,$this->connexion);*/			
			$this->resumen_usuarioLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->resumen_usuario,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->resumen_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->resumen_usuario,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				resumen_usuario_util::refrescarFKDescripcion($this->resumen_usuario);				
			}
			
			if($this->resumen_usuario->getIsDeleted()) {
				$this->resumen_usuario=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(resumen_usuario $resumen_usuario,Connexion $connexion)  {
		$resumen_usuarioLogic = new  resumen_usuario_logic();		  		  
        try {		
			$resumen_usuarioLogic->setConnexion($connexion);			
			$resumen_usuarioLogic->setresumen_usuario($resumen_usuario);			
			$resumen_usuarioLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*resumen_usuario_logic_add::checkresumen_usuarioToSaves($this->resumen_usuarios,$this->datosCliente,$this->connexion);*/	        	
			$this->resumen_usuarioLogicAdditional->checkGeneralEntitiesToSaves($this,$this->resumen_usuarios,$this->datosCliente,$this->connexion);
			
	   		foreach($this->resumen_usuarios as $resumen_usuarioLocal) {				
								
				resumen_usuario_logic_add::updateresumen_usuarioToSave($resumen_usuarioLocal);	        	
				resumen_usuario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$resumen_usuarioLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				resumen_usuario_data::save($resumen_usuarioLocal, $this->connexion);				
			}
			
			/*resumen_usuario_logic_add::checkresumen_usuarioToSavesAfter($this->resumen_usuarios,$this->datosCliente,$this->connexion);*/			
			$this->resumen_usuarioLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->resumen_usuarios,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				resumen_usuario_util::refrescarFKDescripciones($this->resumen_usuarios);
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
			/*resumen_usuario_logic_add::checkresumen_usuarioToSaves($this->resumen_usuarios,$this->datosCliente,$this->connexion);*/			
			$this->resumen_usuarioLogicAdditional->checkGeneralEntitiesToSaves($this,$this->resumen_usuarios,$this->datosCliente,$this->connexion);
			
	   		foreach($this->resumen_usuarios as $resumen_usuarioLocal) {				
								
				resumen_usuario_logic_add::updateresumen_usuarioToSave($resumen_usuarioLocal);	        	
				resumen_usuario_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$resumen_usuarioLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				resumen_usuario_data::save($resumen_usuarioLocal, $this->connexion);				
			}			
			
			/*resumen_usuario_logic_add::checkresumen_usuarioToSavesAfter($this->resumen_usuarios,$this->datosCliente,$this->connexion);*/			
			$this->resumen_usuarioLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->resumen_usuarios,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				resumen_usuario_util::refrescarFKDescripciones($this->resumen_usuarios);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $resumen_usuarios,Connexion $connexion)  {
		$resumen_usuarioLogic = new  resumen_usuario_logic();
		  		  
        try {		
			$resumen_usuarioLogic->setConnexion($connexion);			
			$resumen_usuarioLogic->setresumen_usuarios($resumen_usuarios);			
			$resumen_usuarioLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$resumen_usuariosAux=array();
		
		foreach($this->resumen_usuarios as $resumen_usuario) {
			if($resumen_usuario->getIsDeleted()==false) {
				$resumen_usuariosAux[]=$resumen_usuario;
			}
		}
		
		$this->resumen_usuarios=$resumen_usuariosAux;
	}
	
	public function updateToGetsAuxiliar(array &$resumen_usuarios) {
		if($this->resumen_usuarioLogicAdditional==null) {
			$this->resumen_usuarioLogicAdditional=new resumen_usuario_logic_add();
		}
		
		
		$this->resumen_usuarioLogicAdditional->updateToGets($resumen_usuarios,$this);					
		$this->resumen_usuarioLogicAdditional->updateToGetsReferencia($resumen_usuarios,$this);			
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->resumen_usuarios as $resumen_usuario) {
				
				$resumen_usuario->setid_usuario_Descripcion(resumen_usuario_util::getusuarioDescripcion($resumen_usuario->getusuario()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$resumen_usuario_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$resumen_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$resumen_usuario_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$resumen_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$resumen_usuario_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$resumen_usuarioForeignKey=new resumen_usuario_param_return();//resumen_usuarioForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$resumen_usuarioForeignKey,$resumen_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$resumen_usuarioForeignKey,$resumen_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $resumen_usuarioForeignKey;
			
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
	
	
	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$resumen_usuarioForeignKey,$resumen_usuario_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$resumen_usuarioForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($resumen_usuario_session==null) {
			$resumen_usuario_session=new resumen_usuario_session();
		}
		
		if($resumen_usuario_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($resumen_usuarioForeignKey->idusuarioDefaultFK==0) {
					$resumen_usuarioForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$resumen_usuarioForeignKey->usuariosFK[$usuarioLocal->getId()]=resumen_usuario_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($resumen_usuario_session->bigidusuarioActual!=null && $resumen_usuario_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($resumen_usuario_session->bigidusuarioActual);//WithConnection

				$resumen_usuarioForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=resumen_usuario_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$resumen_usuarioForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($resumen_usuario) {
		$this->saveRelacionesBase($resumen_usuario,true);
	}

	public function saveRelaciones($resumen_usuario) {
		$this->saveRelacionesBase($resumen_usuario,false);
	}

	public function saveRelacionesBase($resumen_usuario,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setresumen_usuario($resumen_usuario);

			if(resumen_usuario_logic_add::validarSaveRelaciones($resumen_usuario,$this)) {

				resumen_usuario_logic_add::updateRelacionesToSave($resumen_usuario,$this);

				if(($this->resumen_usuario->getIsNew() || $this->resumen_usuario->getIsChanged()) && !$this->resumen_usuario->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->resumen_usuario->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				resumen_usuario_logic_add::updateRelacionesToSaveAfter($resumen_usuario,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $resumen_usuarios,resumen_usuario_param_return $resumen_usuarioParameterGeneral) : resumen_usuario_param_return {
		$resumen_usuarioReturnGeneral=new resumen_usuario_param_return();
	
		 try {	
			
			if($this->resumen_usuarioLogicAdditional==null) {
				$this->resumen_usuarioLogicAdditional=new resumen_usuario_logic_add();
			}
			
			$this->resumen_usuarioLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$resumen_usuarios,$resumen_usuarioParameterGeneral,$resumen_usuarioReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $resumen_usuarioReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $resumen_usuarios,resumen_usuario_param_return $resumen_usuarioParameterGeneral) : resumen_usuario_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$resumen_usuarioReturnGeneral=new resumen_usuario_param_return();
	
			
			if($this->resumen_usuarioLogicAdditional==null) {
				$this->resumen_usuarioLogicAdditional=new resumen_usuario_logic_add();
			}
			
			$this->resumen_usuarioLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$resumen_usuarios,$resumen_usuarioParameterGeneral,$resumen_usuarioReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $resumen_usuarioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $resumen_usuarios,resumen_usuario $resumen_usuario,resumen_usuario_param_return $resumen_usuarioParameterGeneral,bool $isEsNuevoresumen_usuario,array $clases) : resumen_usuario_param_return {
		 try {	
			$resumen_usuarioReturnGeneral=new resumen_usuario_param_return();
	
			$resumen_usuarioReturnGeneral->setresumen_usuario($resumen_usuario);
			$resumen_usuarioReturnGeneral->setresumen_usuarios($resumen_usuarios);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$resumen_usuarioReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->resumen_usuarioLogicAdditional==null) {
				$this->resumen_usuarioLogicAdditional=new resumen_usuario_logic_add();
			}
			
			$resumen_usuarioReturnGeneral=$this->resumen_usuarioLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$resumen_usuarios,$resumen_usuario,$resumen_usuarioParameterGeneral,$resumen_usuarioReturnGeneral,$isEsNuevoresumen_usuario,$clases);
			
			/*resumen_usuarioLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$resumen_usuarios,$resumen_usuario,$resumen_usuarioParameterGeneral,$resumen_usuarioReturnGeneral,$isEsNuevoresumen_usuario,$clases);*/
			
			return $resumen_usuarioReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $resumen_usuarios,resumen_usuario $resumen_usuario,resumen_usuario_param_return $resumen_usuarioParameterGeneral,bool $isEsNuevoresumen_usuario,array $clases) : resumen_usuario_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$resumen_usuarioReturnGeneral=new resumen_usuario_param_return();
	
			$resumen_usuarioReturnGeneral->setresumen_usuario($resumen_usuario);
			$resumen_usuarioReturnGeneral->setresumen_usuarios($resumen_usuarios);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$resumen_usuarioReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->resumen_usuarioLogicAdditional==null) {
				$this->resumen_usuarioLogicAdditional=new resumen_usuario_logic_add();
			}
			
			$resumen_usuarioReturnGeneral=$this->resumen_usuarioLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$resumen_usuarios,$resumen_usuario,$resumen_usuarioParameterGeneral,$resumen_usuarioReturnGeneral,$isEsNuevoresumen_usuario,$clases);
			
			/*resumen_usuarioLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$resumen_usuarios,$resumen_usuario,$resumen_usuarioParameterGeneral,$resumen_usuarioReturnGeneral,$isEsNuevoresumen_usuario,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $resumen_usuarioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $resumen_usuarios,resumen_usuario $resumen_usuario,resumen_usuario_param_return $resumen_usuarioParameterGeneral,bool $isEsNuevoresumen_usuario,array $clases) : resumen_usuario_param_return {
		 try {	
			$resumen_usuarioReturnGeneral=new resumen_usuario_param_return();
	
			$resumen_usuarioReturnGeneral->setresumen_usuario($resumen_usuario);
			$resumen_usuarioReturnGeneral->setresumen_usuarios($resumen_usuarios);
			
			
			
			if($this->resumen_usuarioLogicAdditional==null) {
				$this->resumen_usuarioLogicAdditional=new resumen_usuario_logic_add();
			}
			
			$resumen_usuarioReturnGeneral=$this->resumen_usuarioLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$resumen_usuarios,$resumen_usuario,$resumen_usuarioParameterGeneral,$resumen_usuarioReturnGeneral,$isEsNuevoresumen_usuario,$clases);
			
			/*resumen_usuarioLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$resumen_usuarios,$resumen_usuario,$resumen_usuarioParameterGeneral,$resumen_usuarioReturnGeneral,$isEsNuevoresumen_usuario,$clases);*/
			
			return $resumen_usuarioReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $resumen_usuarios,resumen_usuario $resumen_usuario,resumen_usuario_param_return $resumen_usuarioParameterGeneral,bool $isEsNuevoresumen_usuario,array $clases) : resumen_usuario_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$resumen_usuarioReturnGeneral=new resumen_usuario_param_return();
	
			$resumen_usuarioReturnGeneral->setresumen_usuario($resumen_usuario);
			$resumen_usuarioReturnGeneral->setresumen_usuarios($resumen_usuarios);
			
			
			if($this->resumen_usuarioLogicAdditional==null) {
				$this->resumen_usuarioLogicAdditional=new resumen_usuario_logic_add();
			}
			
			$resumen_usuarioReturnGeneral=$this->resumen_usuarioLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$resumen_usuarios,$resumen_usuario,$resumen_usuarioParameterGeneral,$resumen_usuarioReturnGeneral,$isEsNuevoresumen_usuario,$clases);
			
			/*resumen_usuarioLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$resumen_usuarios,$resumen_usuario,$resumen_usuarioParameterGeneral,$resumen_usuarioReturnGeneral,$isEsNuevoresumen_usuario,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $resumen_usuarioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,resumen_usuario $resumen_usuario,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,resumen_usuario $resumen_usuario,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		resumen_usuario_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(resumen_usuario $resumen_usuario,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			resumen_usuario_logic_add::updateresumen_usuarioToGet($this->resumen_usuario);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$resumen_usuario->setusuario($this->resumen_usuarioDataAccess->getusuario($this->connexion,$resumen_usuario));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$resumen_usuario->setusuario($this->resumen_usuarioDataAccess->getusuario($this->connexion,$resumen_usuario));
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
			$resumen_usuario->setusuario($this->resumen_usuarioDataAccess->getusuario($this->connexion,$resumen_usuario));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$resumen_usuario->setusuario($this->resumen_usuarioDataAccess->getusuario($this->connexion,$resumen_usuario));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($resumen_usuario->getusuario(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$resumen_usuario->setusuario($this->resumen_usuarioDataAccess->getusuario($this->connexion,$resumen_usuario));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($resumen_usuario->getusuario(),$isDeep,$deepLoadType,$clases);				
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
			$resumen_usuario->setusuario($this->resumen_usuarioDataAccess->getusuario($this->connexion,$resumen_usuario));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($resumen_usuario->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(resumen_usuario $resumen_usuario,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			resumen_usuario_logic_add::updateresumen_usuarioToSave($this->resumen_usuario);			
			
			if(!$paraDeleteCascade) {				
				resumen_usuario_data::save($resumen_usuario, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		usuario_data::save($resumen_usuario->getusuario(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				usuario_data::save($resumen_usuario->getusuario(),$this->connexion);
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
			usuario_data::save($resumen_usuario->getusuario(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		usuario_data::save($resumen_usuario->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($resumen_usuario->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				usuario_data::save($resumen_usuario->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($resumen_usuario->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			usuario_data::save($resumen_usuario->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($resumen_usuario->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				resumen_usuario_data::save($resumen_usuario, $this->connexion);
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
			
			$this->deepLoad($this->resumen_usuario,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->resumen_usuarios as $resumen_usuario) {
				$this->deepLoad($resumen_usuario,$isDeep,$deepLoadType,$clases);
								
				resumen_usuario_util::refrescarFKDescripciones($this->resumen_usuarios);
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
			
			foreach($this->resumen_usuarios as $resumen_usuario) {
				$this->deepLoad($resumen_usuario,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->resumen_usuario,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->resumen_usuarios as $resumen_usuario) {
				$this->deepSave($resumen_usuario,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->resumen_usuarios as $resumen_usuario) {
				$this->deepSave($resumen_usuario,$isDeep,$deepLoadType,$clases,false);
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
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
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
	
	
	
	
	
	
	
	public function getresumen_usuario() : ?resumen_usuario {	
		/*
		resumen_usuario_logic_add::checkresumen_usuarioToGet($this->resumen_usuario,$this->datosCliente);
		resumen_usuario_logic_add::updateresumen_usuarioToGet($this->resumen_usuario);
		*/
			
		return $this->resumen_usuario;
	}
		
	public function setresumen_usuario(resumen_usuario $newresumen_usuario) {
		$this->resumen_usuario = $newresumen_usuario;
	}
	
	public function getresumen_usuarios() : array {		
		/*
		resumen_usuario_logic_add::checkresumen_usuarioToGets($this->resumen_usuarios,$this->datosCliente);
		
		foreach ($this->resumen_usuarios as $resumen_usuarioLocal ) {
			resumen_usuario_logic_add::updateresumen_usuarioToGet($resumen_usuarioLocal);
		}
		*/
		
		return $this->resumen_usuarios;
	}
	
	public function setresumen_usuarios(array $newresumen_usuarios) {
		$this->resumen_usuarios = $newresumen_usuarios;
	}
	
	public function getresumen_usuarioDataAccess() : resumen_usuario_data {
		return $this->resumen_usuarioDataAccess;
	}
	
	public function setresumen_usuarioDataAccess(resumen_usuario_data $newresumen_usuarioDataAccess) {
		$this->resumen_usuarioDataAccess = $newresumen_usuarioDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        resumen_usuario_carga::$CONTROLLER;;        
		
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
