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

namespace com\bydan\contabilidad\contabilidad\cierre_contable\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\cierre_contable\util\cierre_contable_carga;
use com\bydan\contabilidad\contabilidad\cierre_contable\util\cierre_contable_param_return;

use com\bydan\contabilidad\contabilidad\cierre_contable\presentation\session\cierre_contable_session;

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

use com\bydan\contabilidad\contabilidad\cierre_contable\util\cierre_contable_util;
use com\bydan\contabilidad\contabilidad\cierre_contable\business\entity\cierre_contable;
use com\bydan\contabilidad\contabilidad\cierre_contable\business\data\cierre_contable_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\data\ejercicio_data;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\data\periodo_data;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

//REL


use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\business\entity\cierre_contable_detalle;
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\business\data\cierre_contable_detalle_data;
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\business\logic\cierre_contable_detalle_logic;
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\util\cierre_contable_detalle_carga;
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\util\cierre_contable_detalle_util;

//REL DETALLES




class cierre_contable_logic  extends GeneralEntityLogic implements cierre_contable_logicI {	
	/*GENERAL*/
	public cierre_contable_data $cierre_contableDataAccess;
	//public ?cierre_contable_logic_add $cierre_contableLogicAdditional=null;
	public ?cierre_contable $cierre_contable;
	public array $cierre_contables;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->cierre_contableDataAccess = new cierre_contable_data();			
			$this->cierre_contables = array();
			$this->cierre_contable = new cierre_contable();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->cierre_contableLogicAdditional = new cierre_contable_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->cierre_contableLogicAdditional==null) {
		//	$this->cierre_contableLogicAdditional=new cierre_contable_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->cierre_contableDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->cierre_contableDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->cierre_contableDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->cierre_contableDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->cierre_contables = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cierre_contables=$this->cierre_contableDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_util::refrescarFKDescripciones($this->cierre_contables);
			}
			
			//cierre_contable_logic_add::checkcierre_contableToGets($this->cierre_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contables);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->cierre_contables = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cierre_contables=$this->cierre_contableDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_util::refrescarFKDescripciones($this->cierre_contables);
			}
			
			//cierre_contable_logic_add::checkcierre_contableToGets($this->cierre_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contables);
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
		$this->cierre_contable = new cierre_contable();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->cierre_contable=$this->cierre_contableDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cierre_contable,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cierre_contable_util::refrescarFKDescripcion($this->cierre_contable);
			}
						
			//cierre_contable_logic_add::checkcierre_contableToGet($this->cierre_contable,$this->datosCliente);
			//cierre_contable_logic_add::updatecierre_contableToGet($this->cierre_contable);
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
		$this->cierre_contable = new  cierre_contable();
		  		  
        try {		
			$this->cierre_contable=$this->cierre_contableDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cierre_contable,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cierre_contable_util::refrescarFKDescripcion($this->cierre_contable);
			}
			
			//cierre_contable_logic_add::checkcierre_contableToGet($this->cierre_contable,$this->datosCliente);
			//cierre_contable_logic_add::updatecierre_contableToGet($this->cierre_contable);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?cierre_contable {
		$cierre_contableLogic = new  cierre_contable_logic();
		  		  
        try {		
			$cierre_contableLogic->setConnexion($connexion);			
			$cierre_contableLogic->getEntity($id);			
			return $cierre_contableLogic->getcierre_contable();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->cierre_contable = new  cierre_contable();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->cierre_contable=$this->cierre_contableDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cierre_contable,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cierre_contable_util::refrescarFKDescripcion($this->cierre_contable);
			}
			
			//cierre_contable_logic_add::checkcierre_contableToGet($this->cierre_contable,$this->datosCliente);
			//cierre_contable_logic_add::updatecierre_contableToGet($this->cierre_contable);
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
		$this->cierre_contable = new  cierre_contable();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cierre_contable=$this->cierre_contableDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cierre_contable,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cierre_contable_util::refrescarFKDescripcion($this->cierre_contable);
			}
			
			//cierre_contable_logic_add::checkcierre_contableToGet($this->cierre_contable,$this->datosCliente);
			//cierre_contable_logic_add::updatecierre_contableToGet($this->cierre_contable);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?cierre_contable {
		$cierre_contableLogic = new  cierre_contable_logic();
		  		  
        try {		
			$cierre_contableLogic->setConnexion($connexion);			
			$cierre_contableLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $cierre_contableLogic->getcierre_contable();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cierre_contables = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cierre_contables=$this->cierre_contableDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_util::refrescarFKDescripciones($this->cierre_contables);
			}
			
			//cierre_contable_logic_add::checkcierre_contableToGets($this->cierre_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contables);			
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
		$this->cierre_contables = array();
		  		  
        try {			
			$this->cierre_contables=$this->cierre_contableDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_util::refrescarFKDescripciones($this->cierre_contables);
			}
			
			//cierre_contable_logic_add::checkcierre_contableToGets($this->cierre_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contables);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->cierre_contables = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cierre_contables=$this->cierre_contableDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_util::refrescarFKDescripciones($this->cierre_contables);
			}
			
			//cierre_contable_logic_add::checkcierre_contableToGets($this->cierre_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contables);
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
		$this->cierre_contables = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cierre_contables=$this->cierre_contableDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_util::refrescarFKDescripciones($this->cierre_contables);
			}
			
			//cierre_contable_logic_add::checkcierre_contableToGets($this->cierre_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contables);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$cierre_contableLogic = new  cierre_contable_logic();
		  		  
        try {		
			$cierre_contableLogic->setConnexion($connexion);			
			$cierre_contableLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $cierre_contableLogic->getcierre_contables();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->cierre_contables = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cierre_contables=$this->cierre_contableDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_util::refrescarFKDescripciones($this->cierre_contables);
			}
			
			//cierre_contable_logic_add::checkcierre_contableToGets($this->cierre_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contables);
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
		$this->cierre_contables = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cierre_contables=$this->cierre_contableDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_util::refrescarFKDescripciones($this->cierre_contables);
			}
			
			//cierre_contable_logic_add::checkcierre_contableToGets($this->cierre_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contables);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->cierre_contables = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cierre_contables=$this->cierre_contableDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_util::refrescarFKDescripciones($this->cierre_contables);
			}
			
			//cierre_contable_logic_add::checkcierre_contableToGets($this->cierre_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contables);
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
		$this->cierre_contables = array();
		  		  
        try {			
			$this->cierre_contables=$this->cierre_contableDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_util::refrescarFKDescripciones($this->cierre_contables);
			}	
			
			//cierre_contable_logic_add::checkcierre_contableToGets($this->cierre_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contables);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cierre_contables = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->cierre_contables=$this->cierre_contableDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_util::refrescarFKDescripciones($this->cierre_contables);
			}
			
			//cierre_contable_logic_add::checkcierre_contableToGets($this->cierre_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contables);
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
		$this->cierre_contables = array();
		  		  
        try {		
			$this->cierre_contables=$this->cierre_contableDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_util::refrescarFKDescripciones($this->cierre_contables);
			}
			
			//cierre_contable_logic_add::checkcierre_contableToGets($this->cierre_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contables);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdejercicioWithConnection(string $strFinalQuery,Pagination $pagination,int $id_ejercicio) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ejercicio= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,cierre_contable_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->cierre_contables=$this->cierre_contableDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cierre_contable_util::refrescarFKDescripciones($this->cierre_contables);
			}
			//cierre_contable_logic_add::checkcierre_contableToGets($this->cierre_contables,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cierre_contables);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idejercicio(string $strFinalQuery,Pagination $pagination,int $id_ejercicio) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ejercicio= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,cierre_contable_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->cierre_contables=$this->cierre_contableDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cierre_contable_util::refrescarFKDescripciones($this->cierre_contables);
			}
			//cierre_contable_logic_add::checkcierre_contableToGets($this->cierre_contables,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cierre_contables);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdempresaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_empresa) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_empresa= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cierre_contable_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->cierre_contables=$this->cierre_contableDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cierre_contable_util::refrescarFKDescripciones($this->cierre_contables);
			}
			//cierre_contable_logic_add::checkcierre_contableToGets($this->cierre_contables,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cierre_contables);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idempresa(string $strFinalQuery,Pagination $pagination,int $id_empresa) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_empresa= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cierre_contable_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->cierre_contables=$this->cierre_contableDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cierre_contable_util::refrescarFKDescripciones($this->cierre_contables);
			}
			//cierre_contable_logic_add::checkcierre_contableToGets($this->cierre_contables,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cierre_contables);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdperiodoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_periodo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_periodo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,cierre_contable_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->cierre_contables=$this->cierre_contableDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cierre_contable_util::refrescarFKDescripciones($this->cierre_contables);
			}
			//cierre_contable_logic_add::checkcierre_contableToGets($this->cierre_contables,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cierre_contables);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idperiodo(string $strFinalQuery,Pagination $pagination,int $id_periodo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_periodo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,cierre_contable_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->cierre_contables=$this->cierre_contableDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cierre_contable_util::refrescarFKDescripciones($this->cierre_contables);
			}
			//cierre_contable_logic_add::checkcierre_contableToGets($this->cierre_contables,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cierre_contables);
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
						
			//cierre_contable_logic_add::checkcierre_contableToSave($this->cierre_contable,$this->datosCliente,$this->connexion);	       
			//cierre_contable_logic_add::updatecierre_contableToSave($this->cierre_contable);			
			cierre_contable_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cierre_contable,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->cierre_contableLogicAdditional->checkGeneralEntityToSave($this,$this->cierre_contable,$this->datosCliente,$this->connexion);
			
			
			cierre_contable_data::save($this->cierre_contable, $this->connexion);	    	       	 				
			//cierre_contable_logic_add::checkcierre_contableToSaveAfter($this->cierre_contable,$this->datosCliente,$this->connexion);			
			//$this->cierre_contableLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cierre_contable,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cierre_contable,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cierre_contable,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cierre_contable_util::refrescarFKDescripcion($this->cierre_contable);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->cierre_contable->getIsDeleted()) {
				$this->cierre_contable=null;
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
						
			/*cierre_contable_logic_add::checkcierre_contableToSave($this->cierre_contable,$this->datosCliente,$this->connexion);*/	        
			//cierre_contable_logic_add::updatecierre_contableToSave($this->cierre_contable);			
			//$this->cierre_contableLogicAdditional->checkGeneralEntityToSave($this,$this->cierre_contable,$this->datosCliente,$this->connexion);			
			cierre_contable_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cierre_contable,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			cierre_contable_data::save($this->cierre_contable, $this->connexion);	    	       	 						
			/*cierre_contable_logic_add::checkcierre_contableToSaveAfter($this->cierre_contable,$this->datosCliente,$this->connexion);*/			
			//$this->cierre_contableLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cierre_contable,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cierre_contable,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cierre_contable,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cierre_contable_util::refrescarFKDescripcion($this->cierre_contable);				
			}
			
			if($this->cierre_contable->getIsDeleted()) {
				$this->cierre_contable=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(cierre_contable $cierre_contable,Connexion $connexion)  {
		$cierre_contableLogic = new  cierre_contable_logic();		  		  
        try {		
			$cierre_contableLogic->setConnexion($connexion);			
			$cierre_contableLogic->setcierre_contable($cierre_contable);			
			$cierre_contableLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*cierre_contable_logic_add::checkcierre_contableToSaves($this->cierre_contables,$this->datosCliente,$this->connexion);*/	        	
			//$this->cierre_contableLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cierre_contables,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cierre_contables as $cierre_contableLocal) {				
								
				//cierre_contable_logic_add::updatecierre_contableToSave($cierre_contableLocal);	        	
				cierre_contable_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cierre_contableLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				cierre_contable_data::save($cierre_contableLocal, $this->connexion);				
			}
			
			/*cierre_contable_logic_add::checkcierre_contableToSavesAfter($this->cierre_contables,$this->datosCliente,$this->connexion);*/			
			//$this->cierre_contableLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cierre_contables,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_util::refrescarFKDescripciones($this->cierre_contables);
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
			/*cierre_contable_logic_add::checkcierre_contableToSaves($this->cierre_contables,$this->datosCliente,$this->connexion);*/			
			//$this->cierre_contableLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cierre_contables,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cierre_contables as $cierre_contableLocal) {				
								
				//cierre_contable_logic_add::updatecierre_contableToSave($cierre_contableLocal);	        	
				cierre_contable_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cierre_contableLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				cierre_contable_data::save($cierre_contableLocal, $this->connexion);				
			}			
			
			/*cierre_contable_logic_add::checkcierre_contableToSavesAfter($this->cierre_contables,$this->datosCliente,$this->connexion);*/			
			//$this->cierre_contableLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cierre_contables,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_util::refrescarFKDescripciones($this->cierre_contables);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $cierre_contables,Connexion $connexion)  {
		$cierre_contableLogic = new  cierre_contable_logic();
		  		  
        try {		
			$cierre_contableLogic->setConnexion($connexion);			
			$cierre_contableLogic->setcierre_contables($cierre_contables);			
			$cierre_contableLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$cierre_contablesAux=array();
		
		foreach($this->cierre_contables as $cierre_contable) {
			if($cierre_contable->getIsDeleted()==false) {
				$cierre_contablesAux[]=$cierre_contable;
			}
		}
		
		$this->cierre_contables=$cierre_contablesAux;
	}
	
	public function updateToGetsAuxiliar(array &$cierre_contables) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->cierre_contables as $cierre_contable) {
				
				$cierre_contable->setid_empresa_Descripcion(cierre_contable_util::getempresaDescripcion($cierre_contable->getempresa()));
				$cierre_contable->setid_ejercicio_Descripcion(cierre_contable_util::getejercicioDescripcion($cierre_contable->getejercicio()));
				$cierre_contable->setid_periodo_Descripcion(cierre_contable_util::getperiodoDescripcion($cierre_contable->getperiodo()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cierre_contable_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cierre_contable_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cierre_contable_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cierre_contable_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cierre_contable_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$cierre_contableForeignKey=new cierre_contable_param_return();//cierre_contableForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$cierre_contableForeignKey,$cierre_contable_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$cierre_contableForeignKey,$cierre_contable_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$cierre_contableForeignKey,$cierre_contable_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$cierre_contableForeignKey,$cierre_contable_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$cierre_contableForeignKey,$cierre_contable_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$cierre_contableForeignKey,$cierre_contable_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $cierre_contableForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$cierre_contableForeignKey,$cierre_contable_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$cierre_contableForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cierre_contable_session==null) {
			$cierre_contable_session=new cierre_contable_session();
		}
		
		if($cierre_contable_session->bitBusquedaDesdeFKSesionempresa!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=empresa_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalempresa=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalempresa=Funciones::GetFinalQueryAppend($finalQueryGlobalempresa, '');
				$finalQueryGlobalempresa.=empresa_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalempresa.$strRecargarFkQuery;		

				$empresaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($empresaLogic->getempresas() as $empresaLocal ) {
				if($cierre_contableForeignKey->idempresaDefaultFK==0) {
					$cierre_contableForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$cierre_contableForeignKey->empresasFK[$empresaLocal->getId()]=cierre_contable_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($cierre_contable_session->bigidempresaActual!=null && $cierre_contable_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cierre_contable_session->bigidempresaActual);//WithConnection

				$cierre_contableForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=cierre_contable_util::getempresaDescripcion($empresaLogic->getempresa());
				$cierre_contableForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$cierre_contableForeignKey,$cierre_contable_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$cierre_contableForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cierre_contable_session==null) {
			$cierre_contable_session=new cierre_contable_session();
		}
		
		if($cierre_contable_session->bitBusquedaDesdeFKSesionejercicio!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=ejercicio_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalejercicio=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalejercicio=Funciones::GetFinalQueryAppend($finalQueryGlobalejercicio, '');
				$finalQueryGlobalejercicio.=ejercicio_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalejercicio.$strRecargarFkQuery;		

				$ejercicioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($ejercicioLogic->getejercicios() as $ejercicioLocal ) {
				if($cierre_contableForeignKey->idejercicioDefaultFK==0) {
					$cierre_contableForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$cierre_contableForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=cierre_contable_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($cierre_contable_session->bigidejercicioActual!=null && $cierre_contable_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($cierre_contable_session->bigidejercicioActual);//WithConnection

				$cierre_contableForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=cierre_contable_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$cierre_contableForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$cierre_contableForeignKey,$cierre_contable_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$cierre_contableForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cierre_contable_session==null) {
			$cierre_contable_session=new cierre_contable_session();
		}
		
		if($cierre_contable_session->bitBusquedaDesdeFKSesionperiodo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=periodo_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalperiodo=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalperiodo=Funciones::GetFinalQueryAppend($finalQueryGlobalperiodo, '');
				$finalQueryGlobalperiodo.=periodo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalperiodo.$strRecargarFkQuery;		

				$periodoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($periodoLogic->getperiodos() as $periodoLocal ) {
				if($cierre_contableForeignKey->idperiodoDefaultFK==0) {
					$cierre_contableForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$cierre_contableForeignKey->periodosFK[$periodoLocal->getId()]=cierre_contable_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($cierre_contable_session->bigidperiodoActual!=null && $cierre_contable_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($cierre_contable_session->bigidperiodoActual);//WithConnection

				$cierre_contableForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=cierre_contable_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$cierre_contableForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($cierre_contable,$cierrecontabledetalles) {
		$this->saveRelacionesBase($cierre_contable,$cierrecontabledetalles,true);
	}

	public function saveRelaciones($cierre_contable,$cierrecontabledetalles) {
		$this->saveRelacionesBase($cierre_contable,$cierrecontabledetalles,false);
	}

	public function saveRelacionesBase($cierre_contable,$cierrecontabledetalles=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$cierre_contable->setcierre_contable_detalles($cierrecontabledetalles);
			$this->setcierre_contable($cierre_contable);

			if(true) {

				//cierre_contable_logic_add::updateRelacionesToSave($cierre_contable,$this);

				if(($this->cierre_contable->getIsNew() || $this->cierre_contable->getIsChanged()) && !$this->cierre_contable->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($cierrecontabledetalles);

				} else if($this->cierre_contable->getIsDeleted()) {
					$this->saveRelacionesDetalles($cierrecontabledetalles);
					$this->save();
				}

				//cierre_contable_logic_add::updateRelacionesToSaveAfter($cierre_contable,$this);

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
	
	
	public function saveRelacionesDetalles($cierrecontabledetalles=array()) {
		try {
	

			$idcierre_contableActual=$this->getcierre_contable()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/cierre_contable_detalle_carga.php');
			cierre_contable_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cierrecontabledetalleLogic_Desde_cierre_contable=new cierre_contable_detalle_logic();
			$cierrecontabledetalleLogic_Desde_cierre_contable->setcierre_contable_detalles($cierrecontabledetalles);

			$cierrecontabledetalleLogic_Desde_cierre_contable->setConnexion($this->getConnexion());
			$cierrecontabledetalleLogic_Desde_cierre_contable->setDatosCliente($this->datosCliente);

			foreach($cierrecontabledetalleLogic_Desde_cierre_contable->getcierre_contable_detalles() as $cierrecontabledetalle_Desde_cierre_contable) {
				$cierrecontabledetalle_Desde_cierre_contable->setid_cierre_contable($idcierre_contableActual);
			}

			$cierrecontabledetalleLogic_Desde_cierre_contable->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $cierre_contables,cierre_contable_param_return $cierre_contableParameterGeneral) : cierre_contable_param_return {
		$cierre_contableReturnGeneral=new cierre_contable_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $cierre_contableReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $cierre_contables,cierre_contable_param_return $cierre_contableParameterGeneral) : cierre_contable_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cierre_contableReturnGeneral=new cierre_contable_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $cierre_contableReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cierre_contables,cierre_contable $cierre_contable,cierre_contable_param_return $cierre_contableParameterGeneral,bool $isEsNuevocierre_contable,array $clases) : cierre_contable_param_return {
		 try {	
			$cierre_contableReturnGeneral=new cierre_contable_param_return();
	
			$cierre_contableReturnGeneral->setcierre_contable($cierre_contable);
			$cierre_contableReturnGeneral->setcierre_contables($cierre_contables);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cierre_contableReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $cierre_contableReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cierre_contables,cierre_contable $cierre_contable,cierre_contable_param_return $cierre_contableParameterGeneral,bool $isEsNuevocierre_contable,array $clases) : cierre_contable_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cierre_contableReturnGeneral=new cierre_contable_param_return();
	
			$cierre_contableReturnGeneral->setcierre_contable($cierre_contable);
			$cierre_contableReturnGeneral->setcierre_contables($cierre_contables);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cierre_contableReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $cierre_contableReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cierre_contables,cierre_contable $cierre_contable,cierre_contable_param_return $cierre_contableParameterGeneral,bool $isEsNuevocierre_contable,array $clases) : cierre_contable_param_return {
		 try {	
			$cierre_contableReturnGeneral=new cierre_contable_param_return();
	
			$cierre_contableReturnGeneral->setcierre_contable($cierre_contable);
			$cierre_contableReturnGeneral->setcierre_contables($cierre_contables);
			
			
			
			return $cierre_contableReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cierre_contables,cierre_contable $cierre_contable,cierre_contable_param_return $cierre_contableParameterGeneral,bool $isEsNuevocierre_contable,array $clases) : cierre_contable_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cierre_contableReturnGeneral=new cierre_contable_param_return();
	
			$cierre_contableReturnGeneral->setcierre_contable($cierre_contable);
			$cierre_contableReturnGeneral->setcierre_contables($cierre_contables);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $cierre_contableReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,cierre_contable $cierre_contable,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,cierre_contable $cierre_contable,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		cierre_contable_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		cierre_contable_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(cierre_contable $cierre_contable,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//cierre_contable_logic_add::updatecierre_contableToGet($this->cierre_contable);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cierre_contable->setempresa($this->cierre_contableDataAccess->getempresa($this->connexion,$cierre_contable));
		$cierre_contable->setejercicio($this->cierre_contableDataAccess->getejercicio($this->connexion,$cierre_contable));
		$cierre_contable->setperiodo($this->cierre_contableDataAccess->getperiodo($this->connexion,$cierre_contable));
		$cierre_contable->setcierre_contable_detalles($this->cierre_contableDataAccess->getcierre_contable_detalles($this->connexion,$cierre_contable));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cierre_contable->setempresa($this->cierre_contableDataAccess->getempresa($this->connexion,$cierre_contable));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$cierre_contable->setejercicio($this->cierre_contableDataAccess->getejercicio($this->connexion,$cierre_contable));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$cierre_contable->setperiodo($this->cierre_contableDataAccess->getperiodo($this->connexion,$cierre_contable));
				continue;
			}

			if($clas->clas==cierre_contable_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cierre_contable->setcierre_contable_detalles($this->cierre_contableDataAccess->getcierre_contable_detalles($this->connexion,$cierre_contable));

				if($this->isConDeep) {
					$cierrecontabledetalleLogic= new cierre_contable_detalle_logic($this->connexion);
					$cierrecontabledetalleLogic->setcierre_contable_detalles($cierre_contable->getcierre_contable_detalles());
					$classesLocal=cierre_contable_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cierrecontabledetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cierre_contable_detalle_util::refrescarFKDescripciones($cierrecontabledetalleLogic->getcierre_contable_detalles());
					$cierre_contable->setcierre_contable_detalles($cierrecontabledetalleLogic->getcierre_contable_detalles());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cierre_contable->setempresa($this->cierre_contableDataAccess->getempresa($this->connexion,$cierre_contable));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cierre_contable->setejercicio($this->cierre_contableDataAccess->getejercicio($this->connexion,$cierre_contable));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cierre_contable->setperiodo($this->cierre_contableDataAccess->getperiodo($this->connexion,$cierre_contable));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cierre_contable_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cierre_contable_detalle::$class);
			$cierre_contable->setcierre_contable_detalles($this->cierre_contableDataAccess->getcierre_contable_detalles($this->connexion,$cierre_contable));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cierre_contable->setempresa($this->cierre_contableDataAccess->getempresa($this->connexion,$cierre_contable));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($cierre_contable->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$cierre_contable->setejercicio($this->cierre_contableDataAccess->getejercicio($this->connexion,$cierre_contable));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($cierre_contable->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$cierre_contable->setperiodo($this->cierre_contableDataAccess->getperiodo($this->connexion,$cierre_contable));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($cierre_contable->getperiodo(),$isDeep,$deepLoadType,$clases);
				

		$cierre_contable->setcierre_contable_detalles($this->cierre_contableDataAccess->getcierre_contable_detalles($this->connexion,$cierre_contable));

		foreach($cierre_contable->getcierre_contable_detalles() as $cierrecontabledetalle) {
			$cierrecontabledetalleLogic= new cierre_contable_detalle_logic($this->connexion);
			$cierrecontabledetalleLogic->deepLoad($cierrecontabledetalle,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cierre_contable->setempresa($this->cierre_contableDataAccess->getempresa($this->connexion,$cierre_contable));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($cierre_contable->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$cierre_contable->setejercicio($this->cierre_contableDataAccess->getejercicio($this->connexion,$cierre_contable));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($cierre_contable->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$cierre_contable->setperiodo($this->cierre_contableDataAccess->getperiodo($this->connexion,$cierre_contable));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($cierre_contable->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cierre_contable_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cierre_contable->setcierre_contable_detalles($this->cierre_contableDataAccess->getcierre_contable_detalles($this->connexion,$cierre_contable));

				foreach($cierre_contable->getcierre_contable_detalles() as $cierrecontabledetalle) {
					$cierrecontabledetalleLogic= new cierre_contable_detalle_logic($this->connexion);
					$cierrecontabledetalleLogic->deepLoad($cierrecontabledetalle,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cierre_contable->setempresa($this->cierre_contableDataAccess->getempresa($this->connexion,$cierre_contable));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($cierre_contable->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cierre_contable->setejercicio($this->cierre_contableDataAccess->getejercicio($this->connexion,$cierre_contable));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($cierre_contable->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cierre_contable->setperiodo($this->cierre_contableDataAccess->getperiodo($this->connexion,$cierre_contable));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($cierre_contable->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cierre_contable_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cierre_contable_detalle::$class);
			$cierre_contable->setcierre_contable_detalles($this->cierre_contableDataAccess->getcierre_contable_detalles($this->connexion,$cierre_contable));

			foreach($cierre_contable->getcierre_contable_detalles() as $cierrecontabledetalle) {
				$cierrecontabledetalleLogic= new cierre_contable_detalle_logic($this->connexion);
				$cierrecontabledetalleLogic->deepLoad($cierrecontabledetalle,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(cierre_contable $cierre_contable,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//cierre_contable_logic_add::updatecierre_contableToSave($this->cierre_contable);			
			
			if(!$paraDeleteCascade) {				
				cierre_contable_data::save($cierre_contable, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($cierre_contable->getempresa(),$this->connexion);
		ejercicio_data::save($cierre_contable->getejercicio(),$this->connexion);
		periodo_data::save($cierre_contable->getperiodo(),$this->connexion);

		foreach($cierre_contable->getcierre_contable_detalles() as $cierrecontabledetalle) {
			$cierrecontabledetalle->setid_cierre_contable($cierre_contable->getId());
			cierre_contable_detalle_data::save($cierrecontabledetalle,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cierre_contable->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($cierre_contable->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($cierre_contable->getperiodo(),$this->connexion);
				continue;
			}


			if($clas->clas==cierre_contable_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cierre_contable->getcierre_contable_detalles() as $cierrecontabledetalle) {
					$cierrecontabledetalle->setid_cierre_contable($cierre_contable->getId());
					cierre_contable_detalle_data::save($cierrecontabledetalle,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			empresa_data::save($cierre_contable->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($cierre_contable->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($cierre_contable->getperiodo(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cierre_contable_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cierre_contable_detalle::$class);

			foreach($cierre_contable->getcierre_contable_detalles() as $cierrecontabledetalle) {
				$cierrecontabledetalle->setid_cierre_contable($cierre_contable->getId());
				cierre_contable_detalle_data::save($cierrecontabledetalle,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($cierre_contable->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($cierre_contable->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($cierre_contable->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($cierre_contable->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($cierre_contable->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($cierre_contable->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($cierre_contable->getcierre_contable_detalles() as $cierrecontabledetalle) {
			$cierrecontabledetalleLogic= new cierre_contable_detalle_logic($this->connexion);
			$cierrecontabledetalle->setid_cierre_contable($cierre_contable->getId());
			cierre_contable_detalle_data::save($cierrecontabledetalle,$this->connexion);
			$cierrecontabledetalleLogic->deepSave($cierrecontabledetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cierre_contable->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($cierre_contable->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($cierre_contable->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($cierre_contable->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($cierre_contable->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($cierre_contable->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==cierre_contable_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cierre_contable->getcierre_contable_detalles() as $cierrecontabledetalle) {
					$cierrecontabledetalleLogic= new cierre_contable_detalle_logic($this->connexion);
					$cierrecontabledetalle->setid_cierre_contable($cierre_contable->getId());
					cierre_contable_detalle_data::save($cierrecontabledetalle,$this->connexion);
					$cierrecontabledetalleLogic->deepSave($cierrecontabledetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			empresa_data::save($cierre_contable->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($cierre_contable->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($cierre_contable->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($cierre_contable->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($cierre_contable->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($cierre_contable->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cierre_contable_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cierre_contable_detalle::$class);

			foreach($cierre_contable->getcierre_contable_detalles() as $cierrecontabledetalle) {
				$cierrecontabledetalleLogic= new cierre_contable_detalle_logic($this->connexion);
				$cierrecontabledetalle->setid_cierre_contable($cierre_contable->getId());
				cierre_contable_detalle_data::save($cierrecontabledetalle,$this->connexion);
				$cierrecontabledetalleLogic->deepSave($cierrecontabledetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				cierre_contable_data::save($cierre_contable, $this->connexion);
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
			
			$this->deepLoad($this->cierre_contable,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->cierre_contables as $cierre_contable) {
				$this->deepLoad($cierre_contable,$isDeep,$deepLoadType,$clases);
								
				cierre_contable_util::refrescarFKDescripciones($this->cierre_contables);
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
			
			foreach($this->cierre_contables as $cierre_contable) {
				$this->deepLoad($cierre_contable,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->cierre_contable,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->cierre_contables as $cierre_contable) {
				$this->deepSave($cierre_contable,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->cierre_contables as $cierre_contable) {
				$this->deepSave($cierre_contable,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(empresa::$class);
				$classes[]=new Classe(ejercicio::$class);
				$classes[]=new Classe(periodo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==ejercicio::$class) {
						$classes[]=new Classe(ejercicio::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==periodo::$class) {
						$classes[]=new Classe(periodo::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(empresa::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==ejercicio::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(ejercicio::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==periodo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(periodo::$class);
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
				
				$classes[]=new Classe(cierre_contable_detalle::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==cierre_contable_detalle::$class) {
						$classes[]=new Classe(cierre_contable_detalle::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==cierre_contable_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cierre_contable_detalle::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getcierre_contable() : ?cierre_contable {	
		/*
		cierre_contable_logic_add::checkcierre_contableToGet($this->cierre_contable,$this->datosCliente);
		cierre_contable_logic_add::updatecierre_contableToGet($this->cierre_contable);
		*/
			
		return $this->cierre_contable;
	}
		
	public function setcierre_contable(cierre_contable $newcierre_contable) {
		$this->cierre_contable = $newcierre_contable;
	}
	
	public function getcierre_contables() : array {		
		/*
		cierre_contable_logic_add::checkcierre_contableToGets($this->cierre_contables,$this->datosCliente);
		
		foreach ($this->cierre_contables as $cierre_contableLocal ) {
			cierre_contable_logic_add::updatecierre_contableToGet($cierre_contableLocal);
		}
		*/
		
		return $this->cierre_contables;
	}
	
	public function setcierre_contables(array $newcierre_contables) {
		$this->cierre_contables = $newcierre_contables;
	}
	
	public function getcierre_contableDataAccess() : cierre_contable_data {
		return $this->cierre_contableDataAccess;
	}
	
	public function setcierre_contableDataAccess(cierre_contable_data $newcierre_contableDataAccess) {
		$this->cierre_contableDataAccess = $newcierre_contableDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        cierre_contable_carga::$CONTROLLER;;        
		
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
