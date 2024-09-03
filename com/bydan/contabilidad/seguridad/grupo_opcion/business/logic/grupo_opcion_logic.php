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

namespace com\bydan\contabilidad\seguridad\grupo_opcion\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\grupo_opcion\util\grupo_opcion_carga;
use com\bydan\contabilidad\seguridad\grupo_opcion\util\grupo_opcion_param_return;

use com\bydan\contabilidad\seguridad\grupo_opcion\presentation\session\grupo_opcion_session;

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

use com\bydan\contabilidad\seguridad\grupo_opcion\util\grupo_opcion_util;
use com\bydan\contabilidad\seguridad\grupo_opcion\business\entity\grupo_opcion;
use com\bydan\contabilidad\seguridad\grupo_opcion\business\data\grupo_opcion_data;

//FK


use com\bydan\contabilidad\seguridad\modulo\business\data\modulo_data;
use com\bydan\contabilidad\seguridad\modulo\business\logic\modulo_logic;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;

//REL


use com\bydan\contabilidad\seguridad\opcion\business\data\opcion_data;
use com\bydan\contabilidad\seguridad\opcion\business\logic\opcion_logic;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_carga;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_util;

//REL DETALLES

use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_carga;
use com\bydan\contabilidad\seguridad\accion\util\accion_carga;
use com\bydan\contabilidad\seguridad\perfil_accion\util\perfil_accion_carga;
use com\bydan\contabilidad\seguridad\campo\util\campo_carga;
use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_carga;



class grupo_opcion_logic  extends GeneralEntityLogic implements grupo_opcion_logicI {	
	/*GENERAL*/
	public grupo_opcion_data $grupo_opcionDataAccess;
	//public ?grupo_opcion_logic_add $grupo_opcionLogicAdditional=null;
	public ?grupo_opcion $grupo_opcion;
	public array $grupo_opcions;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->grupo_opcionDataAccess = new grupo_opcion_data();			
			$this->grupo_opcions = array();
			$this->grupo_opcion = new grupo_opcion();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->grupo_opcionLogicAdditional = new grupo_opcion_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->grupo_opcionLogicAdditional==null) {
		//	$this->grupo_opcionLogicAdditional=new grupo_opcion_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->grupo_opcionDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->grupo_opcionDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->grupo_opcionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->grupo_opcionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->grupo_opcions = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->grupo_opcions=$this->grupo_opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				grupo_opcion_util::refrescarFKDescripciones($this->grupo_opcions);
			}
			
			//grupo_opcion_logic_add::checkgrupo_opcionToGets($this->grupo_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->grupo_opcions);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->grupo_opcions = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->grupo_opcions=$this->grupo_opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				grupo_opcion_util::refrescarFKDescripciones($this->grupo_opcions);
			}
			
			//grupo_opcion_logic_add::checkgrupo_opcionToGets($this->grupo_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->grupo_opcions);
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
		$this->grupo_opcion = new grupo_opcion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->grupo_opcion=$this->grupo_opcionDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->grupo_opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				grupo_opcion_util::refrescarFKDescripcion($this->grupo_opcion);
			}
						
			//grupo_opcion_logic_add::checkgrupo_opcionToGet($this->grupo_opcion,$this->datosCliente);
			//grupo_opcion_logic_add::updategrupo_opcionToGet($this->grupo_opcion);
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
		$this->grupo_opcion = new  grupo_opcion();
		  		  
        try {		
			$this->grupo_opcion=$this->grupo_opcionDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->grupo_opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				grupo_opcion_util::refrescarFKDescripcion($this->grupo_opcion);
			}
			
			//grupo_opcion_logic_add::checkgrupo_opcionToGet($this->grupo_opcion,$this->datosCliente);
			//grupo_opcion_logic_add::updategrupo_opcionToGet($this->grupo_opcion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?grupo_opcion {
		$grupo_opcionLogic = new  grupo_opcion_logic();
		  		  
        try {		
			$grupo_opcionLogic->setConnexion($connexion);			
			$grupo_opcionLogic->getEntity($id);			
			return $grupo_opcionLogic->getgrupo_opcion();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->grupo_opcion = new  grupo_opcion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->grupo_opcion=$this->grupo_opcionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->grupo_opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				grupo_opcion_util::refrescarFKDescripcion($this->grupo_opcion);
			}
			
			//grupo_opcion_logic_add::checkgrupo_opcionToGet($this->grupo_opcion,$this->datosCliente);
			//grupo_opcion_logic_add::updategrupo_opcionToGet($this->grupo_opcion);
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
		$this->grupo_opcion = new  grupo_opcion();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->grupo_opcion=$this->grupo_opcionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->grupo_opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				grupo_opcion_util::refrescarFKDescripcion($this->grupo_opcion);
			}
			
			//grupo_opcion_logic_add::checkgrupo_opcionToGet($this->grupo_opcion,$this->datosCliente);
			//grupo_opcion_logic_add::updategrupo_opcionToGet($this->grupo_opcion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?grupo_opcion {
		$grupo_opcionLogic = new  grupo_opcion_logic();
		  		  
        try {		
			$grupo_opcionLogic->setConnexion($connexion);			
			$grupo_opcionLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $grupo_opcionLogic->getgrupo_opcion();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->grupo_opcions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->grupo_opcions=$this->grupo_opcionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				grupo_opcion_util::refrescarFKDescripciones($this->grupo_opcions);
			}
			
			//grupo_opcion_logic_add::checkgrupo_opcionToGets($this->grupo_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->grupo_opcions);			
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
		$this->grupo_opcions = array();
		  		  
        try {			
			$this->grupo_opcions=$this->grupo_opcionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				grupo_opcion_util::refrescarFKDescripciones($this->grupo_opcions);
			}
			
			//grupo_opcion_logic_add::checkgrupo_opcionToGets($this->grupo_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->grupo_opcions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->grupo_opcions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->grupo_opcions=$this->grupo_opcionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				grupo_opcion_util::refrescarFKDescripciones($this->grupo_opcions);
			}
			
			//grupo_opcion_logic_add::checkgrupo_opcionToGets($this->grupo_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->grupo_opcions);
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
		$this->grupo_opcions = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->grupo_opcions=$this->grupo_opcionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				grupo_opcion_util::refrescarFKDescripciones($this->grupo_opcions);
			}
			
			//grupo_opcion_logic_add::checkgrupo_opcionToGets($this->grupo_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->grupo_opcions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$grupo_opcionLogic = new  grupo_opcion_logic();
		  		  
        try {		
			$grupo_opcionLogic->setConnexion($connexion);			
			$grupo_opcionLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $grupo_opcionLogic->getgrupo_opcions();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->grupo_opcions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->grupo_opcions=$this->grupo_opcionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				grupo_opcion_util::refrescarFKDescripciones($this->grupo_opcions);
			}
			
			//grupo_opcion_logic_add::checkgrupo_opcionToGets($this->grupo_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->grupo_opcions);
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
		$this->grupo_opcions = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->grupo_opcions=$this->grupo_opcionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				grupo_opcion_util::refrescarFKDescripciones($this->grupo_opcions);
			}
			
			//grupo_opcion_logic_add::checkgrupo_opcionToGets($this->grupo_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->grupo_opcions);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->grupo_opcions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->grupo_opcions=$this->grupo_opcionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				grupo_opcion_util::refrescarFKDescripciones($this->grupo_opcions);
			}
			
			//grupo_opcion_logic_add::checkgrupo_opcionToGets($this->grupo_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->grupo_opcions);
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
		$this->grupo_opcions = array();
		  		  
        try {			
			$this->grupo_opcions=$this->grupo_opcionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				grupo_opcion_util::refrescarFKDescripciones($this->grupo_opcions);
			}	
			
			//grupo_opcion_logic_add::checkgrupo_opcionToGets($this->grupo_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->grupo_opcions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->grupo_opcions = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->grupo_opcions=$this->grupo_opcionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				grupo_opcion_util::refrescarFKDescripciones($this->grupo_opcions);
			}
			
			//grupo_opcion_logic_add::checkgrupo_opcionToGets($this->grupo_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->grupo_opcions);
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
		$this->grupo_opcions = array();
		  		  
        try {		
			$this->grupo_opcions=$this->grupo_opcionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				grupo_opcion_util::refrescarFKDescripciones($this->grupo_opcions);
			}
			
			//grupo_opcion_logic_add::checkgrupo_opcionToGets($this->grupo_opcions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->grupo_opcions);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdmoduloWithConnection(string $strFinalQuery,Pagination $pagination,int $id_modulo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_modulo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_modulo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_modulo,grupo_opcion_util::$ID_MODULO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_modulo);

			$this->grupo_opcions=$this->grupo_opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				grupo_opcion_util::refrescarFKDescripciones($this->grupo_opcions);
			}
			//grupo_opcion_logic_add::checkgrupo_opcionToGets($this->grupo_opcions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->grupo_opcions);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idmodulo(string $strFinalQuery,Pagination $pagination,int $id_modulo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_modulo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_modulo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_modulo,grupo_opcion_util::$ID_MODULO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_modulo);

			$this->grupo_opcions=$this->grupo_opcionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				grupo_opcion_util::refrescarFKDescripciones($this->grupo_opcions);
			}
			//grupo_opcion_logic_add::checkgrupo_opcionToGets($this->grupo_opcions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->grupo_opcions);
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
						
			//grupo_opcion_logic_add::checkgrupo_opcionToSave($this->grupo_opcion,$this->datosCliente,$this->connexion);	       
			//grupo_opcion_logic_add::updategrupo_opcionToSave($this->grupo_opcion);			
			grupo_opcion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->grupo_opcion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->grupo_opcionLogicAdditional->checkGeneralEntityToSave($this,$this->grupo_opcion,$this->datosCliente,$this->connexion);
			
			
			grupo_opcion_data::save($this->grupo_opcion, $this->connexion);	    	       	 				
			//grupo_opcion_logic_add::checkgrupo_opcionToSaveAfter($this->grupo_opcion,$this->datosCliente,$this->connexion);			
			//$this->grupo_opcionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->grupo_opcion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->grupo_opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->grupo_opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				grupo_opcion_util::refrescarFKDescripcion($this->grupo_opcion);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->grupo_opcion->getIsDeleted()) {
				$this->grupo_opcion=null;
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
						
			/*grupo_opcion_logic_add::checkgrupo_opcionToSave($this->grupo_opcion,$this->datosCliente,$this->connexion);*/	        
			//grupo_opcion_logic_add::updategrupo_opcionToSave($this->grupo_opcion);			
			//$this->grupo_opcionLogicAdditional->checkGeneralEntityToSave($this,$this->grupo_opcion,$this->datosCliente,$this->connexion);			
			grupo_opcion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->grupo_opcion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			grupo_opcion_data::save($this->grupo_opcion, $this->connexion);	    	       	 						
			/*grupo_opcion_logic_add::checkgrupo_opcionToSaveAfter($this->grupo_opcion,$this->datosCliente,$this->connexion);*/			
			//$this->grupo_opcionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->grupo_opcion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->grupo_opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->grupo_opcion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				grupo_opcion_util::refrescarFKDescripcion($this->grupo_opcion);				
			}
			
			if($this->grupo_opcion->getIsDeleted()) {
				$this->grupo_opcion=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(grupo_opcion $grupo_opcion,Connexion $connexion)  {
		$grupo_opcionLogic = new  grupo_opcion_logic();		  		  
        try {		
			$grupo_opcionLogic->setConnexion($connexion);			
			$grupo_opcionLogic->setgrupo_opcion($grupo_opcion);			
			$grupo_opcionLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*grupo_opcion_logic_add::checkgrupo_opcionToSaves($this->grupo_opcions,$this->datosCliente,$this->connexion);*/	        	
			//$this->grupo_opcionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->grupo_opcions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->grupo_opcions as $grupo_opcionLocal) {				
								
				//grupo_opcion_logic_add::updategrupo_opcionToSave($grupo_opcionLocal);	        	
				grupo_opcion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$grupo_opcionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				grupo_opcion_data::save($grupo_opcionLocal, $this->connexion);				
			}
			
			/*grupo_opcion_logic_add::checkgrupo_opcionToSavesAfter($this->grupo_opcions,$this->datosCliente,$this->connexion);*/			
			//$this->grupo_opcionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->grupo_opcions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				grupo_opcion_util::refrescarFKDescripciones($this->grupo_opcions);
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
			/*grupo_opcion_logic_add::checkgrupo_opcionToSaves($this->grupo_opcions,$this->datosCliente,$this->connexion);*/			
			//$this->grupo_opcionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->grupo_opcions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->grupo_opcions as $grupo_opcionLocal) {				
								
				//grupo_opcion_logic_add::updategrupo_opcionToSave($grupo_opcionLocal);	        	
				grupo_opcion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$grupo_opcionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				grupo_opcion_data::save($grupo_opcionLocal, $this->connexion);				
			}			
			
			/*grupo_opcion_logic_add::checkgrupo_opcionToSavesAfter($this->grupo_opcions,$this->datosCliente,$this->connexion);*/			
			//$this->grupo_opcionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->grupo_opcions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				grupo_opcion_util::refrescarFKDescripciones($this->grupo_opcions);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $grupo_opcions,Connexion $connexion)  {
		$grupo_opcionLogic = new  grupo_opcion_logic();
		  		  
        try {		
			$grupo_opcionLogic->setConnexion($connexion);			
			$grupo_opcionLogic->setgrupo_opcions($grupo_opcions);			
			$grupo_opcionLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$grupo_opcionsAux=array();
		
		foreach($this->grupo_opcions as $grupo_opcion) {
			if($grupo_opcion->getIsDeleted()==false) {
				$grupo_opcionsAux[]=$grupo_opcion;
			}
		}
		
		$this->grupo_opcions=$grupo_opcionsAux;
	}
	
	public function updateToGetsAuxiliar(array &$grupo_opcions) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->grupo_opcions as $grupo_opcion) {
				
				$grupo_opcion->setid_modulo_Descripcion(grupo_opcion_util::getmoduloDescripcion($grupo_opcion->getmodulo()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$grupo_opcion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$grupo_opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$grupo_opcion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$grupo_opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$grupo_opcion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$grupo_opcionForeignKey=new grupo_opcion_param_return();//grupo_opcionForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_modulo',$strRecargarFkTipos,',')) {
				$this->cargarCombosmodulosFK($this->connexion,$strRecargarFkQuery,$grupo_opcionForeignKey,$grupo_opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_modulo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosmodulosFK($this->connexion,' where id=-1 ',$grupo_opcionForeignKey,$grupo_opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $grupo_opcionForeignKey;
			
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
	
	
	public function cargarCombosmodulosFK($connexion=null,$strRecargarFkQuery='',$grupo_opcionForeignKey,$grupo_opcion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$moduloLogic= new modulo_logic();
		$pagination= new Pagination();
		$grupo_opcionForeignKey->modulosFK=array();

		$moduloLogic->setConnexion($connexion);
		$moduloLogic->getmoduloDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($grupo_opcion_session==null) {
			$grupo_opcion_session=new grupo_opcion_session();
		}
		
		if($grupo_opcion_session->bitBusquedaDesdeFKSesionmodulo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=modulo_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalmodulo=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalmodulo=Funciones::GetFinalQueryAppend($finalQueryGlobalmodulo, '');
				$finalQueryGlobalmodulo.=modulo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalmodulo.$strRecargarFkQuery;		

				$moduloLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($moduloLogic->getmodulos() as $moduloLocal ) {
				if($grupo_opcionForeignKey->idmoduloDefaultFK==0) {
					$grupo_opcionForeignKey->idmoduloDefaultFK=$moduloLocal->getId();
				}

				$grupo_opcionForeignKey->modulosFK[$moduloLocal->getId()]=grupo_opcion_util::getmoduloDescripcion($moduloLocal);
			}

		} else {

			if($grupo_opcion_session->bigidmoduloActual!=null && $grupo_opcion_session->bigidmoduloActual > 0) {
				$moduloLogic->getEntity($grupo_opcion_session->bigidmoduloActual);//WithConnection

				$grupo_opcionForeignKey->modulosFK[$moduloLogic->getmodulo()->getId()]=grupo_opcion_util::getmoduloDescripcion($moduloLogic->getmodulo());
				$grupo_opcionForeignKey->idmoduloDefaultFK=$moduloLogic->getmodulo()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($grupo_opcion,$opcions) {
		$this->saveRelacionesBase($grupo_opcion,$opcions,true);
	}

	public function saveRelaciones($grupo_opcion,$opcions) {
		$this->saveRelacionesBase($grupo_opcion,$opcions,false);
	}

	public function saveRelacionesBase($grupo_opcion,$opcions=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$grupo_opcion->setopcions($opcions);
			$this->setgrupo_opcion($grupo_opcion);

			if(true) {

				//grupo_opcion_logic_add::updateRelacionesToSave($grupo_opcion,$this);

				if(($this->grupo_opcion->getIsNew() || $this->grupo_opcion->getIsChanged()) && !$this->grupo_opcion->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($opcions);

				} else if($this->grupo_opcion->getIsDeleted()) {
					$this->saveRelacionesDetalles($opcions);
					$this->save();
				}

				//grupo_opcion_logic_add::updateRelacionesToSaveAfter($grupo_opcion,$this);

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
	
	
	public function saveRelacionesDetalles($opcions=array()) {
		try {
	

			$idgrupo_opcionActual=$this->getgrupo_opcion()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/opcion_carga.php');
			opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$opcionLogic_Desde_grupo_opcion=new opcion_logic();
			$opcionLogic_Desde_grupo_opcion->setopcions($opcions);

			$opcionLogic_Desde_grupo_opcion->setConnexion($this->getConnexion());
			$opcionLogic_Desde_grupo_opcion->setDatosCliente($this->datosCliente);

			foreach($opcionLogic_Desde_grupo_opcion->getopcions() as $opcion_Desde_grupo_opcion) {
				$opcion_Desde_grupo_opcion->setid_grupo_opcion($idgrupo_opcionActual);

				$opcionLogic_Desde_grupo_opcion->setopcion($opcion_Desde_grupo_opcion);
				$opcionLogic_Desde_grupo_opcion->save();

				$idopcionActual=$opcion_Desde_grupo_opcion->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/opcion_carga.php');
				opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$opcionLogicHijos_Desde_opcion=new opcion_logic();

				if($opcion_Desde_grupo_opcion->getopcions()==null){
					$opcion_Desde_grupo_opcion->setopcions(array());
				}

				$opcionLogicHijos_Desde_opcion->setopcions($opcion_Desde_grupo_opcion->getopcions());

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

				if($opcion_Desde_grupo_opcion->getaccions()==null){
					$opcion_Desde_grupo_opcion->setaccions(array());
				}

				$accionLogic_Desde_opcion->setaccions($opcion_Desde_grupo_opcion->getaccions());

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

				if($opcion_Desde_grupo_opcion->getperfil_opcions()==null){
					$opcion_Desde_grupo_opcion->setperfil_opcions(array());
				}

				$perfilopcionLogic_Desde_opcion->setperfil_opcions($opcion_Desde_grupo_opcion->getperfil_opcions());

				$perfilopcionLogic_Desde_opcion->setConnexion($this->getConnexion());
				$perfilopcionLogic_Desde_opcion->setDatosCliente($this->datosCliente);

				foreach($perfilopcionLogic_Desde_opcion->getperfil_opcions() as $perfilopcion_Desde_opcion) {
					$perfilopcion_Desde_opcion->setid_opcion($idopcionActual);
				}

				$perfilopcionLogic_Desde_opcion->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/campo_carga.php');
				campo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$campoLogic_Desde_opcion=new campo_logic();

				if($opcion_Desde_grupo_opcion->getcampos()==null){
					$opcion_Desde_grupo_opcion->setcampos(array());
				}

				$campoLogic_Desde_opcion->setcampos($opcion_Desde_grupo_opcion->getcampos());

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $grupo_opcions,grupo_opcion_param_return $grupo_opcionParameterGeneral) : grupo_opcion_param_return {
		$grupo_opcionReturnGeneral=new grupo_opcion_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $grupo_opcionReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $grupo_opcions,grupo_opcion_param_return $grupo_opcionParameterGeneral) : grupo_opcion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$grupo_opcionReturnGeneral=new grupo_opcion_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $grupo_opcionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $grupo_opcions,grupo_opcion $grupo_opcion,grupo_opcion_param_return $grupo_opcionParameterGeneral,bool $isEsNuevogrupo_opcion,array $clases) : grupo_opcion_param_return {
		 try {	
			$grupo_opcionReturnGeneral=new grupo_opcion_param_return();
	
			$grupo_opcionReturnGeneral->setgrupo_opcion($grupo_opcion);
			$grupo_opcionReturnGeneral->setgrupo_opcions($grupo_opcions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$grupo_opcionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $grupo_opcionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $grupo_opcions,grupo_opcion $grupo_opcion,grupo_opcion_param_return $grupo_opcionParameterGeneral,bool $isEsNuevogrupo_opcion,array $clases) : grupo_opcion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$grupo_opcionReturnGeneral=new grupo_opcion_param_return();
	
			$grupo_opcionReturnGeneral->setgrupo_opcion($grupo_opcion);
			$grupo_opcionReturnGeneral->setgrupo_opcions($grupo_opcions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$grupo_opcionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $grupo_opcionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $grupo_opcions,grupo_opcion $grupo_opcion,grupo_opcion_param_return $grupo_opcionParameterGeneral,bool $isEsNuevogrupo_opcion,array $clases) : grupo_opcion_param_return {
		 try {	
			$grupo_opcionReturnGeneral=new grupo_opcion_param_return();
	
			$grupo_opcionReturnGeneral->setgrupo_opcion($grupo_opcion);
			$grupo_opcionReturnGeneral->setgrupo_opcions($grupo_opcions);
			
			
			
			return $grupo_opcionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $grupo_opcions,grupo_opcion $grupo_opcion,grupo_opcion_param_return $grupo_opcionParameterGeneral,bool $isEsNuevogrupo_opcion,array $clases) : grupo_opcion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$grupo_opcionReturnGeneral=new grupo_opcion_param_return();
	
			$grupo_opcionReturnGeneral->setgrupo_opcion($grupo_opcion);
			$grupo_opcionReturnGeneral->setgrupo_opcions($grupo_opcions);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $grupo_opcionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,grupo_opcion $grupo_opcion,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,grupo_opcion $grupo_opcion,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		grupo_opcion_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		grupo_opcion_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(grupo_opcion $grupo_opcion,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//grupo_opcion_logic_add::updategrupo_opcionToGet($this->grupo_opcion);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$grupo_opcion->setmodulo($this->grupo_opcionDataAccess->getmodulo($this->connexion,$grupo_opcion));
		$grupo_opcion->setopcions($this->grupo_opcionDataAccess->getopcions($this->connexion,$grupo_opcion));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$grupo_opcion->setmodulo($this->grupo_opcionDataAccess->getmodulo($this->connexion,$grupo_opcion));
				continue;
			}

			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$grupo_opcion->setopcions($this->grupo_opcionDataAccess->getopcions($this->connexion,$grupo_opcion));

				if($this->isConDeep) {
					$opcionLogic= new opcion_logic($this->connexion);
					$opcionLogic->setopcions($grupo_opcion->getopcions());
					$classesLocal=opcion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$opcionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					opcion_util::refrescarFKDescripciones($opcionLogic->getopcions());
					$grupo_opcion->setopcions($opcionLogic->getopcions());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$grupo_opcion->setmodulo($this->grupo_opcionDataAccess->getmodulo($this->connexion,$grupo_opcion));
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
			$grupo_opcion->setopcions($this->grupo_opcionDataAccess->getopcions($this->connexion,$grupo_opcion));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$grupo_opcion->setmodulo($this->grupo_opcionDataAccess->getmodulo($this->connexion,$grupo_opcion));
		$moduloLogic= new modulo_logic($this->connexion);
		$moduloLogic->deepLoad($grupo_opcion->getmodulo(),$isDeep,$deepLoadType,$clases);
				

		$grupo_opcion->setopcions($this->grupo_opcionDataAccess->getopcions($this->connexion,$grupo_opcion));

		foreach($grupo_opcion->getopcions() as $opcion) {
			$opcionLogic= new opcion_logic($this->connexion);
			$opcionLogic->deepLoad($opcion,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$grupo_opcion->setmodulo($this->grupo_opcionDataAccess->getmodulo($this->connexion,$grupo_opcion));
				$moduloLogic= new modulo_logic($this->connexion);
				$moduloLogic->deepLoad($grupo_opcion->getmodulo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$grupo_opcion->setopcions($this->grupo_opcionDataAccess->getopcions($this->connexion,$grupo_opcion));

				foreach($grupo_opcion->getopcions() as $opcion) {
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
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$grupo_opcion->setmodulo($this->grupo_opcionDataAccess->getmodulo($this->connexion,$grupo_opcion));
			$moduloLogic= new modulo_logic($this->connexion);
			$moduloLogic->deepLoad($grupo_opcion->getmodulo(),$isDeep,$deepLoadType,$clases);
				
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
			$grupo_opcion->setopcions($this->grupo_opcionDataAccess->getopcions($this->connexion,$grupo_opcion));

			foreach($grupo_opcion->getopcions() as $opcion) {
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
	
	public function deepSave(grupo_opcion $grupo_opcion,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//grupo_opcion_logic_add::updategrupo_opcionToSave($this->grupo_opcion);			
			
			if(!$paraDeleteCascade) {				
				grupo_opcion_data::save($grupo_opcion, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		modulo_data::save($grupo_opcion->getmodulo(),$this->connexion);

		foreach($grupo_opcion->getopcions() as $opcion) {
			$opcion->setid_grupo_opcion($grupo_opcion->getId());
			opcion_data::save($opcion,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				modulo_data::save($grupo_opcion->getmodulo(),$this->connexion);
				continue;
			}


			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($grupo_opcion->getopcions() as $opcion) {
					$opcion->setid_grupo_opcion($grupo_opcion->getId());
					opcion_data::save($opcion,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			modulo_data::save($grupo_opcion->getmodulo(),$this->connexion);
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

			foreach($grupo_opcion->getopcions() as $opcion) {
				$opcion->setid_grupo_opcion($grupo_opcion->getId());
				opcion_data::save($opcion,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		modulo_data::save($grupo_opcion->getmodulo(),$this->connexion);
		$moduloLogic= new modulo_logic($this->connexion);
		$moduloLogic->deepSave($grupo_opcion->getmodulo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($grupo_opcion->getopcions() as $opcion) {
			$opcionLogic= new opcion_logic($this->connexion);
			$opcion->setid_grupo_opcion($grupo_opcion->getId());
			opcion_data::save($opcion,$this->connexion);
			$opcionLogic->deepSave($opcion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				modulo_data::save($grupo_opcion->getmodulo(),$this->connexion);
				$moduloLogic= new modulo_logic($this->connexion);
				$moduloLogic->deepSave($grupo_opcion->getmodulo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==opcion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($grupo_opcion->getopcions() as $opcion) {
					$opcionLogic= new opcion_logic($this->connexion);
					$opcion->setid_grupo_opcion($grupo_opcion->getId());
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
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			modulo_data::save($grupo_opcion->getmodulo(),$this->connexion);
			$moduloLogic= new modulo_logic($this->connexion);
			$moduloLogic->deepSave($grupo_opcion->getmodulo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
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

			foreach($grupo_opcion->getopcions() as $opcion) {
				$opcionLogic= new opcion_logic($this->connexion);
				$opcion->setid_grupo_opcion($grupo_opcion->getId());
				opcion_data::save($opcion,$this->connexion);
				$opcionLogic->deepSave($opcion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				grupo_opcion_data::save($grupo_opcion, $this->connexion);
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
			
			$this->deepLoad($this->grupo_opcion,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->grupo_opcions as $grupo_opcion) {
				$this->deepLoad($grupo_opcion,$isDeep,$deepLoadType,$clases);
								
				grupo_opcion_util::refrescarFKDescripciones($this->grupo_opcions);
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
			
			foreach($this->grupo_opcions as $grupo_opcion) {
				$this->deepLoad($grupo_opcion,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->grupo_opcion,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->grupo_opcions as $grupo_opcion) {
				$this->deepSave($grupo_opcion,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->grupo_opcions as $grupo_opcion) {
				$this->deepSave($grupo_opcion,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(modulo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==modulo::$class) {
						$classes[]=new Classe(modulo::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
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
	
	public static function getClassesRelsOf(array $classesP,string $deepLoadType) : array {
		try {
			 $classes=array();			
			
			if($deepLoadType==DeepLoadType::$NONE) {
				
				$classes[]=new Classe(opcion::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==opcion::$class) {
						$classes[]=new Classe(opcion::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

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
	
	
	
	
	
	
	
	public function getgrupo_opcion() : ?grupo_opcion {	
		/*
		grupo_opcion_logic_add::checkgrupo_opcionToGet($this->grupo_opcion,$this->datosCliente);
		grupo_opcion_logic_add::updategrupo_opcionToGet($this->grupo_opcion);
		*/
			
		return $this->grupo_opcion;
	}
		
	public function setgrupo_opcion(grupo_opcion $newgrupo_opcion) {
		$this->grupo_opcion = $newgrupo_opcion;
	}
	
	public function getgrupo_opcions() : array {		
		/*
		grupo_opcion_logic_add::checkgrupo_opcionToGets($this->grupo_opcions,$this->datosCliente);
		
		foreach ($this->grupo_opcions as $grupo_opcionLocal ) {
			grupo_opcion_logic_add::updategrupo_opcionToGet($grupo_opcionLocal);
		}
		*/
		
		return $this->grupo_opcions;
	}
	
	public function setgrupo_opcions(array $newgrupo_opcions) {
		$this->grupo_opcions = $newgrupo_opcions;
	}
	
	public function getgrupo_opcionDataAccess() : grupo_opcion_data {
		return $this->grupo_opcionDataAccess;
	}
	
	public function setgrupo_opcionDataAccess(grupo_opcion_data $newgrupo_opcionDataAccess) {
		$this->grupo_opcionDataAccess = $newgrupo_opcionDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        grupo_opcion_carga::$CONTROLLER;;        
		
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
