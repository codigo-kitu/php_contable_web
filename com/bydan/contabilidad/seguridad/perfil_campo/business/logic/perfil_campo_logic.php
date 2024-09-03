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

namespace com\bydan\contabilidad\seguridad\perfil_campo\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_carga;
use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_param_return;

use com\bydan\contabilidad\seguridad\perfil_campo\presentation\session\perfil_campo_session;

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

use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_util;
use com\bydan\contabilidad\seguridad\perfil_campo\business\entity\perfil_campo;
use com\bydan\contabilidad\seguridad\perfil_campo\business\data\perfil_campo_data;

//FK


use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\business\data\perfil_data;
use com\bydan\contabilidad\seguridad\perfil\business\logic\perfil_logic;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;

use com\bydan\contabilidad\seguridad\campo\business\entity\campo;
use com\bydan\contabilidad\seguridad\campo\business\data\campo_data;
use com\bydan\contabilidad\seguridad\campo\business\logic\campo_logic;
use com\bydan\contabilidad\seguridad\campo\util\campo_util;

//REL


//REL DETALLES




class perfil_campo_logic  extends GeneralEntityLogic implements perfil_campo_logicI {	
	/*GENERAL*/
	public perfil_campo_data $perfil_campoDataAccess;
	//public ?perfil_campo_logic_add $perfil_campoLogicAdditional=null;
	public ?perfil_campo $perfil_campo;
	public array $perfil_campos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->perfil_campoDataAccess = new perfil_campo_data();			
			$this->perfil_campos = array();
			$this->perfil_campo = new perfil_campo();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->perfil_campoLogicAdditional = new perfil_campo_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->perfil_campoLogicAdditional==null) {
		//	$this->perfil_campoLogicAdditional=new perfil_campo_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->perfil_campoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->perfil_campoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->perfil_campoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->perfil_campoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->perfil_campos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_campos=$this->perfil_campoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_campo_util::refrescarFKDescripciones($this->perfil_campos);
			}
			
			//perfil_campo_logic_add::checkperfil_campoToGets($this->perfil_campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_campos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->perfil_campos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_campos=$this->perfil_campoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_campo_util::refrescarFKDescripciones($this->perfil_campos);
			}
			
			//perfil_campo_logic_add::checkperfil_campoToGets($this->perfil_campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_campos);
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
		$this->perfil_campo = new perfil_campo();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->perfil_campo=$this->perfil_campoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->perfil_campo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				perfil_campo_util::refrescarFKDescripcion($this->perfil_campo);
			}
						
			//perfil_campo_logic_add::checkperfil_campoToGet($this->perfil_campo,$this->datosCliente);
			//perfil_campo_logic_add::updateperfil_campoToGet($this->perfil_campo);
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
		$this->perfil_campo = new  perfil_campo();
		  		  
        try {		
			$this->perfil_campo=$this->perfil_campoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->perfil_campo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				perfil_campo_util::refrescarFKDescripcion($this->perfil_campo);
			}
			
			//perfil_campo_logic_add::checkperfil_campoToGet($this->perfil_campo,$this->datosCliente);
			//perfil_campo_logic_add::updateperfil_campoToGet($this->perfil_campo);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?perfil_campo {
		$perfil_campoLogic = new  perfil_campo_logic();
		  		  
        try {		
			$perfil_campoLogic->setConnexion($connexion);			
			$perfil_campoLogic->getEntity($id);			
			return $perfil_campoLogic->getperfil_campo();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->perfil_campo = new  perfil_campo();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->perfil_campo=$this->perfil_campoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->perfil_campo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				perfil_campo_util::refrescarFKDescripcion($this->perfil_campo);
			}
			
			//perfil_campo_logic_add::checkperfil_campoToGet($this->perfil_campo,$this->datosCliente);
			//perfil_campo_logic_add::updateperfil_campoToGet($this->perfil_campo);
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
		$this->perfil_campo = new  perfil_campo();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_campo=$this->perfil_campoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->perfil_campo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				perfil_campo_util::refrescarFKDescripcion($this->perfil_campo);
			}
			
			//perfil_campo_logic_add::checkperfil_campoToGet($this->perfil_campo,$this->datosCliente);
			//perfil_campo_logic_add::updateperfil_campoToGet($this->perfil_campo);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?perfil_campo {
		$perfil_campoLogic = new  perfil_campo_logic();
		  		  
        try {		
			$perfil_campoLogic->setConnexion($connexion);			
			$perfil_campoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $perfil_campoLogic->getperfil_campo();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->perfil_campos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->perfil_campos=$this->perfil_campoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_campo_util::refrescarFKDescripciones($this->perfil_campos);
			}
			
			//perfil_campo_logic_add::checkperfil_campoToGets($this->perfil_campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_campos);			
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
		$this->perfil_campos = array();
		  		  
        try {			
			$this->perfil_campos=$this->perfil_campoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_campo_util::refrescarFKDescripciones($this->perfil_campos);
			}
			
			//perfil_campo_logic_add::checkperfil_campoToGets($this->perfil_campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_campos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->perfil_campos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_campos=$this->perfil_campoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_campo_util::refrescarFKDescripciones($this->perfil_campos);
			}
			
			//perfil_campo_logic_add::checkperfil_campoToGets($this->perfil_campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_campos);
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
		$this->perfil_campos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_campos=$this->perfil_campoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_campo_util::refrescarFKDescripciones($this->perfil_campos);
			}
			
			//perfil_campo_logic_add::checkperfil_campoToGets($this->perfil_campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_campos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$perfil_campoLogic = new  perfil_campo_logic();
		  		  
        try {		
			$perfil_campoLogic->setConnexion($connexion);			
			$perfil_campoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $perfil_campoLogic->getperfil_campos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->perfil_campos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->perfil_campos=$this->perfil_campoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_campo_util::refrescarFKDescripciones($this->perfil_campos);
			}
			
			//perfil_campo_logic_add::checkperfil_campoToGets($this->perfil_campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_campos);
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
		$this->perfil_campos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_campos=$this->perfil_campoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_campo_util::refrescarFKDescripciones($this->perfil_campos);
			}
			
			//perfil_campo_logic_add::checkperfil_campoToGets($this->perfil_campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_campos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->perfil_campos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->perfil_campos=$this->perfil_campoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_campo_util::refrescarFKDescripciones($this->perfil_campos);
			}
			
			//perfil_campo_logic_add::checkperfil_campoToGets($this->perfil_campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_campos);
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
		$this->perfil_campos = array();
		  		  
        try {			
			$this->perfil_campos=$this->perfil_campoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_campo_util::refrescarFKDescripciones($this->perfil_campos);
			}	
			
			//perfil_campo_logic_add::checkperfil_campoToGets($this->perfil_campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_campos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->perfil_campos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->perfil_campos=$this->perfil_campoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_campo_util::refrescarFKDescripciones($this->perfil_campos);
			}
			
			//perfil_campo_logic_add::checkperfil_campoToGets($this->perfil_campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_campos);
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
		$this->perfil_campos = array();
		  		  
        try {		
			$this->perfil_campos=$this->perfil_campoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_campo_util::refrescarFKDescripciones($this->perfil_campos);
			}
			
			//perfil_campo_logic_add::checkperfil_campoToGets($this->perfil_campos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->perfil_campos);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdcampoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_campo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_campo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_campo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_campo,perfil_campo_util::$ID_CAMPO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_campo);

			$this->perfil_campos=$this->perfil_campoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_campo_util::refrescarFKDescripciones($this->perfil_campos);
			}
			//perfil_campo_logic_add::checkperfil_campoToGets($this->perfil_campos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfil_campos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcampo(string $strFinalQuery,Pagination $pagination,int $id_campo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_campo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_campo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_campo,perfil_campo_util::$ID_CAMPO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_campo);

			$this->perfil_campos=$this->perfil_campoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_campo_util::refrescarFKDescripciones($this->perfil_campos);
			}
			//perfil_campo_logic_add::checkperfil_campoToGets($this->perfil_campos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfil_campos);
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
			$parameterSelectionGeneralid_perfil->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_perfil,perfil_campo_util::$ID_PERFIL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_perfil);

			$this->perfil_campos=$this->perfil_campoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_campo_util::refrescarFKDescripciones($this->perfil_campos);
			}
			//perfil_campo_logic_add::checkperfil_campoToGets($this->perfil_campos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfil_campos);

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
			$parameterSelectionGeneralid_perfil->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_perfil,perfil_campo_util::$ID_PERFIL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_perfil);

			$this->perfil_campos=$this->perfil_campoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				perfil_campo_util::refrescarFKDescripciones($this->perfil_campos);
			}
			//perfil_campo_logic_add::checkperfil_campoToGets($this->perfil_campos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->perfil_campos);
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
						
			//perfil_campo_logic_add::checkperfil_campoToSave($this->perfil_campo,$this->datosCliente,$this->connexion);	       
			//perfil_campo_logic_add::updateperfil_campoToSave($this->perfil_campo);			
			perfil_campo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->perfil_campo,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->perfil_campoLogicAdditional->checkGeneralEntityToSave($this,$this->perfil_campo,$this->datosCliente,$this->connexion);
			
			
			perfil_campo_data::save($this->perfil_campo, $this->connexion);	    	       	 				
			//perfil_campo_logic_add::checkperfil_campoToSaveAfter($this->perfil_campo,$this->datosCliente,$this->connexion);			
			//$this->perfil_campoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->perfil_campo,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->perfil_campo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->perfil_campo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				perfil_campo_util::refrescarFKDescripcion($this->perfil_campo);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->perfil_campo->getIsDeleted()) {
				$this->perfil_campo=null;
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
						
			/*perfil_campo_logic_add::checkperfil_campoToSave($this->perfil_campo,$this->datosCliente,$this->connexion);*/	        
			//perfil_campo_logic_add::updateperfil_campoToSave($this->perfil_campo);			
			//$this->perfil_campoLogicAdditional->checkGeneralEntityToSave($this,$this->perfil_campo,$this->datosCliente,$this->connexion);			
			perfil_campo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->perfil_campo,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			perfil_campo_data::save($this->perfil_campo, $this->connexion);	    	       	 						
			/*perfil_campo_logic_add::checkperfil_campoToSaveAfter($this->perfil_campo,$this->datosCliente,$this->connexion);*/			
			//$this->perfil_campoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->perfil_campo,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->perfil_campo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->perfil_campo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				perfil_campo_util::refrescarFKDescripcion($this->perfil_campo);				
			}
			
			if($this->perfil_campo->getIsDeleted()) {
				$this->perfil_campo=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(perfil_campo $perfil_campo,Connexion $connexion)  {
		$perfil_campoLogic = new  perfil_campo_logic();		  		  
        try {		
			$perfil_campoLogic->setConnexion($connexion);			
			$perfil_campoLogic->setperfil_campo($perfil_campo);			
			$perfil_campoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*perfil_campo_logic_add::checkperfil_campoToSaves($this->perfil_campos,$this->datosCliente,$this->connexion);*/	        	
			//$this->perfil_campoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->perfil_campos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->perfil_campos as $perfil_campoLocal) {				
								
				//perfil_campo_logic_add::updateperfil_campoToSave($perfil_campoLocal);	        	
				perfil_campo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$perfil_campoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				perfil_campo_data::save($perfil_campoLocal, $this->connexion);				
			}
			
			/*perfil_campo_logic_add::checkperfil_campoToSavesAfter($this->perfil_campos,$this->datosCliente,$this->connexion);*/			
			//$this->perfil_campoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->perfil_campos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_campo_util::refrescarFKDescripciones($this->perfil_campos);
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
			/*perfil_campo_logic_add::checkperfil_campoToSaves($this->perfil_campos,$this->datosCliente,$this->connexion);*/			
			//$this->perfil_campoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->perfil_campos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->perfil_campos as $perfil_campoLocal) {				
								
				//perfil_campo_logic_add::updateperfil_campoToSave($perfil_campoLocal);	        	
				perfil_campo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$perfil_campoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				perfil_campo_data::save($perfil_campoLocal, $this->connexion);				
			}			
			
			/*perfil_campo_logic_add::checkperfil_campoToSavesAfter($this->perfil_campos,$this->datosCliente,$this->connexion);*/			
			//$this->perfil_campoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->perfil_campos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				perfil_campo_util::refrescarFKDescripciones($this->perfil_campos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $perfil_campos,Connexion $connexion)  {
		$perfil_campoLogic = new  perfil_campo_logic();
		  		  
        try {		
			$perfil_campoLogic->setConnexion($connexion);			
			$perfil_campoLogic->setperfil_campos($perfil_campos);			
			$perfil_campoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$perfil_camposAux=array();
		
		foreach($this->perfil_campos as $perfil_campo) {
			if($perfil_campo->getIsDeleted()==false) {
				$perfil_camposAux[]=$perfil_campo;
			}
		}
		
		$this->perfil_campos=$perfil_camposAux;
	}
	
	public function updateToGetsAuxiliar(array &$perfil_campos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->perfil_campos as $perfil_campo) {
				
				$perfil_campo->setid_perfil_Descripcion(perfil_campo_util::getperfilDescripcion($perfil_campo->getperfil()));
				$perfil_campo->setid_campo_Descripcion(perfil_campo_util::getcampoDescripcion($perfil_campo->getcampo()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$perfil_campo_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$perfil_campo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$perfil_campo_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$perfil_campo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$perfil_campo_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$perfil_campoForeignKey=new perfil_campo_param_return();//perfil_campoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_perfil',$strRecargarFkTipos,',')) {
				$this->cargarCombosperfilsFK($this->connexion,$strRecargarFkQuery,$perfil_campoForeignKey,$perfil_campo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_campo',$strRecargarFkTipos,',')) {
				$this->cargarComboscamposFK($this->connexion,$strRecargarFkQuery,$perfil_campoForeignKey,$perfil_campo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_perfil',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperfilsFK($this->connexion,' where id=-1 ',$perfil_campoForeignKey,$perfil_campo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_campo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscamposFK($this->connexion,' where id=-1 ',$perfil_campoForeignKey,$perfil_campo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $perfil_campoForeignKey;
			
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
	
	
	public function cargarCombosperfilsFK($connexion=null,$strRecargarFkQuery='',$perfil_campoForeignKey,$perfil_campo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$perfilLogic= new perfil_logic();
		$pagination= new Pagination();
		$perfil_campoForeignKey->perfilsFK=array();

		$perfilLogic->setConnexion($connexion);
		$perfilLogic->getperfilDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($perfil_campo_session==null) {
			$perfil_campo_session=new perfil_campo_session();
		}
		
		if($perfil_campo_session->bitBusquedaDesdeFKSesionperfil!=true) {
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
				if($perfil_campoForeignKey->idperfilDefaultFK==0) {
					$perfil_campoForeignKey->idperfilDefaultFK=$perfilLocal->getId();
				}

				$perfil_campoForeignKey->perfilsFK[$perfilLocal->getId()]=perfil_campo_util::getperfilDescripcion($perfilLocal);
			}

		} else {

			if($perfil_campo_session->bigidperfilActual!=null && $perfil_campo_session->bigidperfilActual > 0) {
				$perfilLogic->getEntity($perfil_campo_session->bigidperfilActual);//WithConnection

				$perfil_campoForeignKey->perfilsFK[$perfilLogic->getperfil()->getId()]=perfil_campo_util::getperfilDescripcion($perfilLogic->getperfil());
				$perfil_campoForeignKey->idperfilDefaultFK=$perfilLogic->getperfil()->getId();
			}
		}
	}

	public function cargarComboscamposFK($connexion=null,$strRecargarFkQuery='',$perfil_campoForeignKey,$perfil_campo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$campoLogic= new campo_logic();
		$pagination= new Pagination();
		$perfil_campoForeignKey->camposFK=array();

		$campoLogic->setConnexion($connexion);
		$campoLogic->getcampoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($perfil_campo_session==null) {
			$perfil_campo_session=new perfil_campo_session();
		}
		
		if($perfil_campo_session->bitBusquedaDesdeFKSesioncampo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=campo_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcampo=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcampo=Funciones::GetFinalQueryAppend($finalQueryGlobalcampo, '');
				$finalQueryGlobalcampo.=campo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcampo.$strRecargarFkQuery;		

				$campoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($campoLogic->getcampos() as $campoLocal ) {
				if($perfil_campoForeignKey->idcampoDefaultFK==0) {
					$perfil_campoForeignKey->idcampoDefaultFK=$campoLocal->getId();
				}

				$perfil_campoForeignKey->camposFK[$campoLocal->getId()]=perfil_campo_util::getcampoDescripcion($campoLocal);
			}

		} else {

			if($perfil_campo_session->bigidcampoActual!=null && $perfil_campo_session->bigidcampoActual > 0) {
				$campoLogic->getEntity($perfil_campo_session->bigidcampoActual);//WithConnection

				$perfil_campoForeignKey->camposFK[$campoLogic->getcampo()->getId()]=perfil_campo_util::getcampoDescripcion($campoLogic->getcampo());
				$perfil_campoForeignKey->idcampoDefaultFK=$campoLogic->getcampo()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($perfil_campo) {
		$this->saveRelacionesBase($perfil_campo,true);
	}

	public function saveRelaciones($perfil_campo) {
		$this->saveRelacionesBase($perfil_campo,false);
	}

	public function saveRelacionesBase($perfil_campo,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setperfil_campo($perfil_campo);

			if(true) {

				//perfil_campo_logic_add::updateRelacionesToSave($perfil_campo,$this);

				if(($this->perfil_campo->getIsNew() || $this->perfil_campo->getIsChanged()) && !$this->perfil_campo->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->perfil_campo->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//perfil_campo_logic_add::updateRelacionesToSaveAfter($perfil_campo,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $perfil_campos,perfil_campo_param_return $perfil_campoParameterGeneral) : perfil_campo_param_return {
		$perfil_campoReturnGeneral=new perfil_campo_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $perfil_campoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $perfil_campos,perfil_campo_param_return $perfil_campoParameterGeneral) : perfil_campo_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$perfil_campoReturnGeneral=new perfil_campo_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $perfil_campoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $perfil_campos,perfil_campo $perfil_campo,perfil_campo_param_return $perfil_campoParameterGeneral,bool $isEsNuevoperfil_campo,array $clases) : perfil_campo_param_return {
		 try {	
			$perfil_campoReturnGeneral=new perfil_campo_param_return();
	
			$perfil_campoReturnGeneral->setperfil_campo($perfil_campo);
			$perfil_campoReturnGeneral->setperfil_campos($perfil_campos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$perfil_campoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $perfil_campoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $perfil_campos,perfil_campo $perfil_campo,perfil_campo_param_return $perfil_campoParameterGeneral,bool $isEsNuevoperfil_campo,array $clases) : perfil_campo_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$perfil_campoReturnGeneral=new perfil_campo_param_return();
	
			$perfil_campoReturnGeneral->setperfil_campo($perfil_campo);
			$perfil_campoReturnGeneral->setperfil_campos($perfil_campos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$perfil_campoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $perfil_campoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $perfil_campos,perfil_campo $perfil_campo,perfil_campo_param_return $perfil_campoParameterGeneral,bool $isEsNuevoperfil_campo,array $clases) : perfil_campo_param_return {
		 try {	
			$perfil_campoReturnGeneral=new perfil_campo_param_return();
	
			$perfil_campoReturnGeneral->setperfil_campo($perfil_campo);
			$perfil_campoReturnGeneral->setperfil_campos($perfil_campos);
			
			
			
			return $perfil_campoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $perfil_campos,perfil_campo $perfil_campo,perfil_campo_param_return $perfil_campoParameterGeneral,bool $isEsNuevoperfil_campo,array $clases) : perfil_campo_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$perfil_campoReturnGeneral=new perfil_campo_param_return();
	
			$perfil_campoReturnGeneral->setperfil_campo($perfil_campo);
			$perfil_campoReturnGeneral->setperfil_campos($perfil_campos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $perfil_campoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,perfil_campo $perfil_campo,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,perfil_campo $perfil_campo,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		perfil_campo_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(perfil_campo $perfil_campo,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//perfil_campo_logic_add::updateperfil_campoToGet($this->perfil_campo);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$perfil_campo->setperfil($this->perfil_campoDataAccess->getperfil($this->connexion,$perfil_campo));
		$perfil_campo->setcampo($this->perfil_campoDataAccess->getcampo($this->connexion,$perfil_campo));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class.'') {
				$perfil_campo->setperfil($this->perfil_campoDataAccess->getperfil($this->connexion,$perfil_campo));
				continue;
			}

			if($clas->clas==campo::$class.'') {
				$perfil_campo->setcampo($this->perfil_campoDataAccess->getcampo($this->connexion,$perfil_campo));
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
			$perfil_campo->setperfil($this->perfil_campoDataAccess->getperfil($this->connexion,$perfil_campo));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==campo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$perfil_campo->setcampo($this->perfil_campoDataAccess->getcampo($this->connexion,$perfil_campo));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$perfil_campo->setperfil($this->perfil_campoDataAccess->getperfil($this->connexion,$perfil_campo));
		$perfilLogic= new perfil_logic($this->connexion);
		$perfilLogic->deepLoad($perfil_campo->getperfil(),$isDeep,$deepLoadType,$clases);
				
		$perfil_campo->setcampo($this->perfil_campoDataAccess->getcampo($this->connexion,$perfil_campo));
		$campoLogic= new campo_logic($this->connexion);
		$campoLogic->deepLoad($perfil_campo->getcampo(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class.'') {
				$perfil_campo->setperfil($this->perfil_campoDataAccess->getperfil($this->connexion,$perfil_campo));
				$perfilLogic= new perfil_logic($this->connexion);
				$perfilLogic->deepLoad($perfil_campo->getperfil(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==campo::$class.'') {
				$perfil_campo->setcampo($this->perfil_campoDataAccess->getcampo($this->connexion,$perfil_campo));
				$campoLogic= new campo_logic($this->connexion);
				$campoLogic->deepLoad($perfil_campo->getcampo(),$isDeep,$deepLoadType,$clases);				
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
			$perfil_campo->setperfil($this->perfil_campoDataAccess->getperfil($this->connexion,$perfil_campo));
			$perfilLogic= new perfil_logic($this->connexion);
			$perfilLogic->deepLoad($perfil_campo->getperfil(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==campo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$perfil_campo->setcampo($this->perfil_campoDataAccess->getcampo($this->connexion,$perfil_campo));
			$campoLogic= new campo_logic($this->connexion);
			$campoLogic->deepLoad($perfil_campo->getcampo(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(perfil_campo $perfil_campo,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//perfil_campo_logic_add::updateperfil_campoToSave($this->perfil_campo);			
			
			if(!$paraDeleteCascade) {				
				perfil_campo_data::save($perfil_campo, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		perfil_data::save($perfil_campo->getperfil(),$this->connexion);
		campo_data::save($perfil_campo->getcampo(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class.'') {
				perfil_data::save($perfil_campo->getperfil(),$this->connexion);
				continue;
			}

			if($clas->clas==campo::$class.'') {
				campo_data::save($perfil_campo->getcampo(),$this->connexion);
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
			perfil_data::save($perfil_campo->getperfil(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==campo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			campo_data::save($perfil_campo->getcampo(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		perfil_data::save($perfil_campo->getperfil(),$this->connexion);
		$perfilLogic= new perfil_logic($this->connexion);
		$perfilLogic->deepSave($perfil_campo->getperfil(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		campo_data::save($perfil_campo->getcampo(),$this->connexion);
		$campoLogic= new campo_logic($this->connexion);
		$campoLogic->deepSave($perfil_campo->getcampo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==perfil::$class.'') {
				perfil_data::save($perfil_campo->getperfil(),$this->connexion);
				$perfilLogic= new perfil_logic($this->connexion);
				$perfilLogic->deepSave($perfil_campo->getperfil(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==campo::$class.'') {
				campo_data::save($perfil_campo->getcampo(),$this->connexion);
				$campoLogic= new campo_logic($this->connexion);
				$campoLogic->deepSave($perfil_campo->getcampo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			perfil_data::save($perfil_campo->getperfil(),$this->connexion);
			$perfilLogic= new perfil_logic($this->connexion);
			$perfilLogic->deepSave($perfil_campo->getperfil(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==campo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			campo_data::save($perfil_campo->getcampo(),$this->connexion);
			$campoLogic= new campo_logic($this->connexion);
			$campoLogic->deepSave($perfil_campo->getcampo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				perfil_campo_data::save($perfil_campo, $this->connexion);
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
			
			$this->deepLoad($this->perfil_campo,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->perfil_campos as $perfil_campo) {
				$this->deepLoad($perfil_campo,$isDeep,$deepLoadType,$clases);
								
				perfil_campo_util::refrescarFKDescripciones($this->perfil_campos);
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
			
			foreach($this->perfil_campos as $perfil_campo) {
				$this->deepLoad($perfil_campo,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->perfil_campo,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->perfil_campos as $perfil_campo) {
				$this->deepSave($perfil_campo,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->perfil_campos as $perfil_campo) {
				$this->deepSave($perfil_campo,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(campo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==perfil::$class) {
						$classes[]=new Classe(perfil::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==campo::$class) {
						$classes[]=new Classe(campo::$class);
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
					if($clas->clas==campo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(campo::$class);
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
	
	
	
	
	
	
	
	public function getperfil_campo() : ?perfil_campo {	
		/*
		perfil_campo_logic_add::checkperfil_campoToGet($this->perfil_campo,$this->datosCliente);
		perfil_campo_logic_add::updateperfil_campoToGet($this->perfil_campo);
		*/
			
		return $this->perfil_campo;
	}
		
	public function setperfil_campo(perfil_campo $newperfil_campo) {
		$this->perfil_campo = $newperfil_campo;
	}
	
	public function getperfil_campos() : array {		
		/*
		perfil_campo_logic_add::checkperfil_campoToGets($this->perfil_campos,$this->datosCliente);
		
		foreach ($this->perfil_campos as $perfil_campoLocal ) {
			perfil_campo_logic_add::updateperfil_campoToGet($perfil_campoLocal);
		}
		*/
		
		return $this->perfil_campos;
	}
	
	public function setperfil_campos(array $newperfil_campos) {
		$this->perfil_campos = $newperfil_campos;
	}
	
	public function getperfil_campoDataAccess() : perfil_campo_data {
		return $this->perfil_campoDataAccess;
	}
	
	public function setperfil_campoDataAccess(perfil_campo_data $newperfil_campoDataAccess) {
		$this->perfil_campoDataAccess = $newperfil_campoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        perfil_campo_carga::$CONTROLLER;;        
		
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
