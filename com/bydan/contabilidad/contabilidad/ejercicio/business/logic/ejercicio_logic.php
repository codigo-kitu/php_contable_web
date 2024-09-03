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

namespace com\bydan\contabilidad\contabilidad\ejercicio\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_carga;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_param_return;


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

use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\data\ejercicio_data;

//FK


//REL


//REL DETALLES




class ejercicio_logic  extends GeneralEntityLogic implements ejercicio_logicI {	
	/*GENERAL*/
	public ejercicio_data $ejercicioDataAccess;
	//public ?ejercicio_logic_add $ejercicioLogicAdditional=null;
	public ?ejercicio $ejercicio;
	public array $ejercicios;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->ejercicioDataAccess = new ejercicio_data();			
			$this->ejercicios = array();
			$this->ejercicio = new ejercicio();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->ejercicioLogicAdditional = new ejercicio_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->ejercicioLogicAdditional==null) {
		//	$this->ejercicioLogicAdditional=new ejercicio_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->ejercicioDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->ejercicioDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->ejercicioDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->ejercicioDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->ejercicios = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->ejercicios=$this->ejercicioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ejercicio_util::refrescarFKDescripciones($this->ejercicios);
			}
			
			//ejercicio_logic_add::checkejercicioToGets($this->ejercicios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ejercicios);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->ejercicios = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->ejercicios=$this->ejercicioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ejercicio_util::refrescarFKDescripciones($this->ejercicios);
			}
			
			//ejercicio_logic_add::checkejercicioToGets($this->ejercicios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ejercicios);
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
		$this->ejercicio = new ejercicio();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->ejercicio=$this->ejercicioDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->ejercicio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				ejercicio_util::refrescarFKDescripcion($this->ejercicio);
			}
						
			//ejercicio_logic_add::checkejercicioToGet($this->ejercicio,$this->datosCliente);
			//ejercicio_logic_add::updateejercicioToGet($this->ejercicio);
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
		$this->ejercicio = new  ejercicio();
		  		  
        try {		
			$this->ejercicio=$this->ejercicioDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->ejercicio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				ejercicio_util::refrescarFKDescripcion($this->ejercicio);
			}
			
			//ejercicio_logic_add::checkejercicioToGet($this->ejercicio,$this->datosCliente);
			//ejercicio_logic_add::updateejercicioToGet($this->ejercicio);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?ejercicio {
		$ejercicioLogic = new  ejercicio_logic();
		  		  
        try {		
			$ejercicioLogic->setConnexion($connexion);			
			$ejercicioLogic->getEntity($id);			
			return $ejercicioLogic->getejercicio();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->ejercicio = new  ejercicio();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->ejercicio=$this->ejercicioDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->ejercicio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				ejercicio_util::refrescarFKDescripcion($this->ejercicio);
			}
			
			//ejercicio_logic_add::checkejercicioToGet($this->ejercicio,$this->datosCliente);
			//ejercicio_logic_add::updateejercicioToGet($this->ejercicio);
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
		$this->ejercicio = new  ejercicio();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->ejercicio=$this->ejercicioDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->ejercicio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				ejercicio_util::refrescarFKDescripcion($this->ejercicio);
			}
			
			//ejercicio_logic_add::checkejercicioToGet($this->ejercicio,$this->datosCliente);
			//ejercicio_logic_add::updateejercicioToGet($this->ejercicio);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?ejercicio {
		$ejercicioLogic = new  ejercicio_logic();
		  		  
        try {		
			$ejercicioLogic->setConnexion($connexion);			
			$ejercicioLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $ejercicioLogic->getejercicio();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->ejercicios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->ejercicios=$this->ejercicioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ejercicio_util::refrescarFKDescripciones($this->ejercicios);
			}
			
			//ejercicio_logic_add::checkejercicioToGets($this->ejercicios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ejercicios);			
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
		$this->ejercicios = array();
		  		  
        try {			
			$this->ejercicios=$this->ejercicioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ejercicio_util::refrescarFKDescripciones($this->ejercicios);
			}
			
			//ejercicio_logic_add::checkejercicioToGets($this->ejercicios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ejercicios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->ejercicios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->ejercicios=$this->ejercicioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ejercicio_util::refrescarFKDescripciones($this->ejercicios);
			}
			
			//ejercicio_logic_add::checkejercicioToGets($this->ejercicios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ejercicios);
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
		$this->ejercicios = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->ejercicios=$this->ejercicioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ejercicio_util::refrescarFKDescripciones($this->ejercicios);
			}
			
			//ejercicio_logic_add::checkejercicioToGets($this->ejercicios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ejercicios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$ejercicioLogic = new  ejercicio_logic();
		  		  
        try {		
			$ejercicioLogic->setConnexion($connexion);			
			$ejercicioLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $ejercicioLogic->getejercicios();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->ejercicios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->ejercicios=$this->ejercicioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ejercicio_util::refrescarFKDescripciones($this->ejercicios);
			}
			
			//ejercicio_logic_add::checkejercicioToGets($this->ejercicios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ejercicios);
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
		$this->ejercicios = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->ejercicios=$this->ejercicioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ejercicio_util::refrescarFKDescripciones($this->ejercicios);
			}
			
			//ejercicio_logic_add::checkejercicioToGets($this->ejercicios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ejercicios);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->ejercicios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->ejercicios=$this->ejercicioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ejercicio_util::refrescarFKDescripciones($this->ejercicios);
			}
			
			//ejercicio_logic_add::checkejercicioToGets($this->ejercicios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ejercicios);
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
		$this->ejercicios = array();
		  		  
        try {			
			$this->ejercicios=$this->ejercicioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ejercicio_util::refrescarFKDescripciones($this->ejercicios);
			}	
			
			//ejercicio_logic_add::checkejercicioToGets($this->ejercicios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ejercicios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->ejercicios = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->ejercicios=$this->ejercicioDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ejercicio_util::refrescarFKDescripciones($this->ejercicios);
			}
			
			//ejercicio_logic_add::checkejercicioToGets($this->ejercicios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ejercicios);
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
		$this->ejercicios = array();
		  		  
        try {		
			$this->ejercicios=$this->ejercicioDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ejercicio_util::refrescarFKDescripciones($this->ejercicios);
			}
			
			//ejercicio_logic_add::checkejercicioToGets($this->ejercicios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ejercicios);

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
						
			//ejercicio_logic_add::checkejercicioToSave($this->ejercicio,$this->datosCliente,$this->connexion);	       
			//ejercicio_logic_add::updateejercicioToSave($this->ejercicio);			
			ejercicio_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->ejercicio,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->ejercicioLogicAdditional->checkGeneralEntityToSave($this,$this->ejercicio,$this->datosCliente,$this->connexion);
			
			
			ejercicio_data::save($this->ejercicio, $this->connexion);	    	       	 				
			//ejercicio_logic_add::checkejercicioToSaveAfter($this->ejercicio,$this->datosCliente,$this->connexion);			
			//$this->ejercicioLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->ejercicio,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->ejercicio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->ejercicio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				ejercicio_util::refrescarFKDescripcion($this->ejercicio);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->ejercicio->getIsDeleted()) {
				$this->ejercicio=null;
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
						
			/*ejercicio_logic_add::checkejercicioToSave($this->ejercicio,$this->datosCliente,$this->connexion);*/	        
			//ejercicio_logic_add::updateejercicioToSave($this->ejercicio);			
			//$this->ejercicioLogicAdditional->checkGeneralEntityToSave($this,$this->ejercicio,$this->datosCliente,$this->connexion);			
			ejercicio_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->ejercicio,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			ejercicio_data::save($this->ejercicio, $this->connexion);	    	       	 						
			/*ejercicio_logic_add::checkejercicioToSaveAfter($this->ejercicio,$this->datosCliente,$this->connexion);*/			
			//$this->ejercicioLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->ejercicio,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->ejercicio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->ejercicio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				ejercicio_util::refrescarFKDescripcion($this->ejercicio);				
			}
			
			if($this->ejercicio->getIsDeleted()) {
				$this->ejercicio=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(ejercicio $ejercicio,Connexion $connexion)  {
		$ejercicioLogic = new  ejercicio_logic();		  		  
        try {		
			$ejercicioLogic->setConnexion($connexion);			
			$ejercicioLogic->setejercicio($ejercicio);			
			$ejercicioLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*ejercicio_logic_add::checkejercicioToSaves($this->ejercicios,$this->datosCliente,$this->connexion);*/	        	
			//$this->ejercicioLogicAdditional->checkGeneralEntitiesToSaves($this,$this->ejercicios,$this->datosCliente,$this->connexion);
			
	   		foreach($this->ejercicios as $ejercicioLocal) {				
								
				//ejercicio_logic_add::updateejercicioToSave($ejercicioLocal);	        	
				ejercicio_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$ejercicioLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				ejercicio_data::save($ejercicioLocal, $this->connexion);				
			}
			
			/*ejercicio_logic_add::checkejercicioToSavesAfter($this->ejercicios,$this->datosCliente,$this->connexion);*/			
			//$this->ejercicioLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->ejercicios,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ejercicio_util::refrescarFKDescripciones($this->ejercicios);
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
			/*ejercicio_logic_add::checkejercicioToSaves($this->ejercicios,$this->datosCliente,$this->connexion);*/			
			//$this->ejercicioLogicAdditional->checkGeneralEntitiesToSaves($this,$this->ejercicios,$this->datosCliente,$this->connexion);
			
	   		foreach($this->ejercicios as $ejercicioLocal) {				
								
				//ejercicio_logic_add::updateejercicioToSave($ejercicioLocal);	        	
				ejercicio_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$ejercicioLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				ejercicio_data::save($ejercicioLocal, $this->connexion);				
			}			
			
			/*ejercicio_logic_add::checkejercicioToSavesAfter($this->ejercicios,$this->datosCliente,$this->connexion);*/			
			//$this->ejercicioLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->ejercicios,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ejercicio_util::refrescarFKDescripciones($this->ejercicios);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $ejercicios,Connexion $connexion)  {
		$ejercicioLogic = new  ejercicio_logic();
		  		  
        try {		
			$ejercicioLogic->setConnexion($connexion);			
			$ejercicioLogic->setejercicios($ejercicios);			
			$ejercicioLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$ejerciciosAux=array();
		
		foreach($this->ejercicios as $ejercicio) {
			if($ejercicio->getIsDeleted()==false) {
				$ejerciciosAux[]=$ejercicio;
			}
		}
		
		$this->ejercicios=$ejerciciosAux;
	}
	
	public function updateToGetsAuxiliar(array &$ejercicios) {
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
	
	
	
	public function saveRelacionesWithConnection($ejercicio) {
		$this->saveRelacionesBase($ejercicio,true);
	}

	public function saveRelaciones($ejercicio) {
		$this->saveRelacionesBase($ejercicio,false);
	}

	public function saveRelacionesBase($ejercicio,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setejercicio($ejercicio);

				if(($this->ejercicio->getIsNew() || $this->ejercicio->getIsChanged()) && !$this->ejercicio->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->ejercicio->getIsDeleted()) {
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $ejercicios,ejercicio_param_return $ejercicioParameterGeneral) : ejercicio_param_return {
		$ejercicioReturnGeneral=new ejercicio_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $ejercicioReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $ejercicios,ejercicio_param_return $ejercicioParameterGeneral) : ejercicio_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$ejercicioReturnGeneral=new ejercicio_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $ejercicioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $ejercicios,ejercicio $ejercicio,ejercicio_param_return $ejercicioParameterGeneral,bool $isEsNuevoejercicio,array $clases) : ejercicio_param_return {
		 try {	
			$ejercicioReturnGeneral=new ejercicio_param_return();
	
			$ejercicioReturnGeneral->setejercicio($ejercicio);
			$ejercicioReturnGeneral->setejercicios($ejercicios);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$ejercicioReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $ejercicioReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $ejercicios,ejercicio $ejercicio,ejercicio_param_return $ejercicioParameterGeneral,bool $isEsNuevoejercicio,array $clases) : ejercicio_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$ejercicioReturnGeneral=new ejercicio_param_return();
	
			$ejercicioReturnGeneral->setejercicio($ejercicio);
			$ejercicioReturnGeneral->setejercicios($ejercicios);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$ejercicioReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $ejercicioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $ejercicios,ejercicio $ejercicio,ejercicio_param_return $ejercicioParameterGeneral,bool $isEsNuevoejercicio,array $clases) : ejercicio_param_return {
		 try {	
			$ejercicioReturnGeneral=new ejercicio_param_return();
	
			$ejercicioReturnGeneral->setejercicio($ejercicio);
			$ejercicioReturnGeneral->setejercicios($ejercicios);
			
			
			
			return $ejercicioReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $ejercicios,ejercicio $ejercicio,ejercicio_param_return $ejercicioParameterGeneral,bool $isEsNuevoejercicio,array $clases) : ejercicio_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$ejercicioReturnGeneral=new ejercicio_param_return();
	
			$ejercicioReturnGeneral->setejercicio($ejercicio);
			$ejercicioReturnGeneral->setejercicios($ejercicios);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $ejercicioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,ejercicio $ejercicio,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,ejercicio $ejercicio,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	
	
	public function deepLoad(ejercicio $ejercicio,bool $isDeep,string $deepLoadType,array $clases) {
		
		
		try {
			
			
			
			//ejercicio_logic_add::updateejercicioToGet($this->ejercicio);
			
			
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		
	}
	
	public function deepSave(ejercicio $ejercicio,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		
		
		try {
			
			
			//ejercicio_logic_add::updateejercicioToSave($this->ejercicio);			
			
			if(!$paraDeleteCascade) {				
				ejercicio_data::save($ejercicio, $this->connexion);
			}
			
			
			
			if($paraDeleteCascade) {				
				ejercicio_data::save($ejercicio, $this->connexion);
			}
			
		}catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}	
		
		
	}
		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			$this->deepLoad($this->ejercicio,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->ejercicios as $ejercicio) {
				$this->deepLoad($ejercicio,$isDeep,$deepLoadType,$clases);
								
				ejercicio_util::refrescarFKDescripciones($this->ejercicios);
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
			
			foreach($this->ejercicios as $ejercicio) {
				$this->deepLoad($ejercicio,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->ejercicio,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->ejercicios as $ejercicio) {
				$this->deepSave($ejercicio,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->ejercicios as $ejercicio) {
				$this->deepSave($ejercicio,$isDeep,$deepLoadType,$clases,false);
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
	
	
	
	
	
	
	
	public function getejercicio() : ?ejercicio {	
		/*
		ejercicio_logic_add::checkejercicioToGet($this->ejercicio,$this->datosCliente);
		ejercicio_logic_add::updateejercicioToGet($this->ejercicio);
		*/
			
		return $this->ejercicio;
	}
		
	public function setejercicio(ejercicio $newejercicio) {
		$this->ejercicio = $newejercicio;
	}
	
	public function getejercicios() : array {		
		/*
		ejercicio_logic_add::checkejercicioToGets($this->ejercicios,$this->datosCliente);
		
		foreach ($this->ejercicios as $ejercicioLocal ) {
			ejercicio_logic_add::updateejercicioToGet($ejercicioLocal);
		}
		*/
		
		return $this->ejercicios;
	}
	
	public function setejercicios(array $newejercicios) {
		$this->ejercicios = $newejercicios;
	}
	
	public function getejercicioDataAccess() : ejercicio_data {
		return $this->ejercicioDataAccess;
	}
	
	public function setejercicioDataAccess(ejercicio_data $newejercicioDataAccess) {
		$this->ejercicioDataAccess = $newejercicioDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        ejercicio_carga::$CONTROLLER;;        
		
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
