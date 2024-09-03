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

namespace com\bydan\contabilidad\contabilidad\documento_contable\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\documento_contable\util\documento_contable_carga;
use com\bydan\contabilidad\contabilidad\documento_contable\util\documento_contable_param_return;

use com\bydan\contabilidad\contabilidad\documento_contable\presentation\session\documento_contable_session;

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

use com\bydan\contabilidad\contabilidad\documento_contable\util\documento_contable_util;
use com\bydan\contabilidad\contabilidad\documento_contable\business\entity\documento_contable;
use com\bydan\contabilidad\contabilidad\documento_contable\business\data\documento_contable_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\data\asiento_data;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\entity\asiento_predefinido;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\data\asiento_predefinido_data;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\logic\asiento_predefinido_logic;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;

//REL DETALLES

use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_carga;



class documento_contable_logic  extends GeneralEntityLogic implements documento_contable_logicI {	
	/*GENERAL*/
	public documento_contable_data $documento_contableDataAccess;
	//public ?documento_contable_logic_add $documento_contableLogicAdditional=null;
	public ?documento_contable $documento_contable;
	public array $documento_contables;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->documento_contableDataAccess = new documento_contable_data();			
			$this->documento_contables = array();
			$this->documento_contable = new documento_contable();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->documento_contableLogicAdditional = new documento_contable_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->documento_contableLogicAdditional==null) {
		//	$this->documento_contableLogicAdditional=new documento_contable_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->documento_contableDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->documento_contableDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->documento_contableDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->documento_contableDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->documento_contables = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_contables=$this->documento_contableDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_contable_util::refrescarFKDescripciones($this->documento_contables);
			}
			
			//documento_contable_logic_add::checkdocumento_contableToGets($this->documento_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_contables);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->documento_contables = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_contables=$this->documento_contableDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_contable_util::refrescarFKDescripciones($this->documento_contables);
			}
			
			//documento_contable_logic_add::checkdocumento_contableToGets($this->documento_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_contables);
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
		$this->documento_contable = new documento_contable();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->documento_contable=$this->documento_contableDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->documento_contable,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				documento_contable_util::refrescarFKDescripcion($this->documento_contable);
			}
						
			//documento_contable_logic_add::checkdocumento_contableToGet($this->documento_contable,$this->datosCliente);
			//documento_contable_logic_add::updatedocumento_contableToGet($this->documento_contable);
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
		$this->documento_contable = new  documento_contable();
		  		  
        try {		
			$this->documento_contable=$this->documento_contableDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->documento_contable,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				documento_contable_util::refrescarFKDescripcion($this->documento_contable);
			}
			
			//documento_contable_logic_add::checkdocumento_contableToGet($this->documento_contable,$this->datosCliente);
			//documento_contable_logic_add::updatedocumento_contableToGet($this->documento_contable);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?documento_contable {
		$documento_contableLogic = new  documento_contable_logic();
		  		  
        try {		
			$documento_contableLogic->setConnexion($connexion);			
			$documento_contableLogic->getEntity($id);			
			return $documento_contableLogic->getdocumento_contable();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->documento_contable = new  documento_contable();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->documento_contable=$this->documento_contableDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->documento_contable,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				documento_contable_util::refrescarFKDescripcion($this->documento_contable);
			}
			
			//documento_contable_logic_add::checkdocumento_contableToGet($this->documento_contable,$this->datosCliente);
			//documento_contable_logic_add::updatedocumento_contableToGet($this->documento_contable);
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
		$this->documento_contable = new  documento_contable();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_contable=$this->documento_contableDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->documento_contable,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				documento_contable_util::refrescarFKDescripcion($this->documento_contable);
			}
			
			//documento_contable_logic_add::checkdocumento_contableToGet($this->documento_contable,$this->datosCliente);
			//documento_contable_logic_add::updatedocumento_contableToGet($this->documento_contable);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?documento_contable {
		$documento_contableLogic = new  documento_contable_logic();
		  		  
        try {		
			$documento_contableLogic->setConnexion($connexion);			
			$documento_contableLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $documento_contableLogic->getdocumento_contable();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->documento_contables = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->documento_contables=$this->documento_contableDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_contable_util::refrescarFKDescripciones($this->documento_contables);
			}
			
			//documento_contable_logic_add::checkdocumento_contableToGets($this->documento_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_contables);			
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
		$this->documento_contables = array();
		  		  
        try {			
			$this->documento_contables=$this->documento_contableDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_contable_util::refrescarFKDescripciones($this->documento_contables);
			}
			
			//documento_contable_logic_add::checkdocumento_contableToGets($this->documento_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_contables);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->documento_contables = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_contables=$this->documento_contableDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_contable_util::refrescarFKDescripciones($this->documento_contables);
			}
			
			//documento_contable_logic_add::checkdocumento_contableToGets($this->documento_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_contables);
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
		$this->documento_contables = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_contables=$this->documento_contableDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_contable_util::refrescarFKDescripciones($this->documento_contables);
			}
			
			//documento_contable_logic_add::checkdocumento_contableToGets($this->documento_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_contables);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$documento_contableLogic = new  documento_contable_logic();
		  		  
        try {		
			$documento_contableLogic->setConnexion($connexion);			
			$documento_contableLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $documento_contableLogic->getdocumento_contables();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->documento_contables = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->documento_contables=$this->documento_contableDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_contable_util::refrescarFKDescripciones($this->documento_contables);
			}
			
			//documento_contable_logic_add::checkdocumento_contableToGets($this->documento_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_contables);
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
		$this->documento_contables = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_contables=$this->documento_contableDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_contable_util::refrescarFKDescripciones($this->documento_contables);
			}
			
			//documento_contable_logic_add::checkdocumento_contableToGets($this->documento_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_contables);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->documento_contables = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_contables=$this->documento_contableDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_contable_util::refrescarFKDescripciones($this->documento_contables);
			}
			
			//documento_contable_logic_add::checkdocumento_contableToGets($this->documento_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_contables);
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
		$this->documento_contables = array();
		  		  
        try {			
			$this->documento_contables=$this->documento_contableDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_contable_util::refrescarFKDescripciones($this->documento_contables);
			}	
			
			//documento_contable_logic_add::checkdocumento_contableToGets($this->documento_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_contables);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->documento_contables = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->documento_contables=$this->documento_contableDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_contable_util::refrescarFKDescripciones($this->documento_contables);
			}
			
			//documento_contable_logic_add::checkdocumento_contableToGets($this->documento_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_contables);
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
		$this->documento_contables = array();
		  		  
        try {		
			$this->documento_contables=$this->documento_contableDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_contable_util::refrescarFKDescripciones($this->documento_contables);
			}
			
			//documento_contable_logic_add::checkdocumento_contableToGets($this->documento_contables,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_contables);

		}  catch(Exception $e) {						
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,documento_contable_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->documento_contables=$this->documento_contableDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_contable_util::refrescarFKDescripciones($this->documento_contables);
			}
			//documento_contable_logic_add::checkdocumento_contableToGets($this->documento_contables,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_contables);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,documento_contable_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->documento_contables=$this->documento_contableDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_contable_util::refrescarFKDescripciones($this->documento_contables);
			}
			//documento_contable_logic_add::checkdocumento_contableToGets($this->documento_contables,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_contables);
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
						
			//documento_contable_logic_add::checkdocumento_contableToSave($this->documento_contable,$this->datosCliente,$this->connexion);	       
			//documento_contable_logic_add::updatedocumento_contableToSave($this->documento_contable);			
			documento_contable_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->documento_contable,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->documento_contableLogicAdditional->checkGeneralEntityToSave($this,$this->documento_contable,$this->datosCliente,$this->connexion);
			
			
			documento_contable_data::save($this->documento_contable, $this->connexion);	    	       	 				
			//documento_contable_logic_add::checkdocumento_contableToSaveAfter($this->documento_contable,$this->datosCliente,$this->connexion);			
			//$this->documento_contableLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->documento_contable,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->documento_contable,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->documento_contable,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				documento_contable_util::refrescarFKDescripcion($this->documento_contable);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->documento_contable->getIsDeleted()) {
				$this->documento_contable=null;
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
						
			/*documento_contable_logic_add::checkdocumento_contableToSave($this->documento_contable,$this->datosCliente,$this->connexion);*/	        
			//documento_contable_logic_add::updatedocumento_contableToSave($this->documento_contable);			
			//$this->documento_contableLogicAdditional->checkGeneralEntityToSave($this,$this->documento_contable,$this->datosCliente,$this->connexion);			
			documento_contable_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->documento_contable,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			documento_contable_data::save($this->documento_contable, $this->connexion);	    	       	 						
			/*documento_contable_logic_add::checkdocumento_contableToSaveAfter($this->documento_contable,$this->datosCliente,$this->connexion);*/			
			//$this->documento_contableLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->documento_contable,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->documento_contable,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->documento_contable,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				documento_contable_util::refrescarFKDescripcion($this->documento_contable);				
			}
			
			if($this->documento_contable->getIsDeleted()) {
				$this->documento_contable=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(documento_contable $documento_contable,Connexion $connexion)  {
		$documento_contableLogic = new  documento_contable_logic();		  		  
        try {		
			$documento_contableLogic->setConnexion($connexion);			
			$documento_contableLogic->setdocumento_contable($documento_contable);			
			$documento_contableLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*documento_contable_logic_add::checkdocumento_contableToSaves($this->documento_contables,$this->datosCliente,$this->connexion);*/	        	
			//$this->documento_contableLogicAdditional->checkGeneralEntitiesToSaves($this,$this->documento_contables,$this->datosCliente,$this->connexion);
			
	   		foreach($this->documento_contables as $documento_contableLocal) {				
								
				//documento_contable_logic_add::updatedocumento_contableToSave($documento_contableLocal);	        	
				documento_contable_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$documento_contableLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				documento_contable_data::save($documento_contableLocal, $this->connexion);				
			}
			
			/*documento_contable_logic_add::checkdocumento_contableToSavesAfter($this->documento_contables,$this->datosCliente,$this->connexion);*/			
			//$this->documento_contableLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->documento_contables,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_contable_util::refrescarFKDescripciones($this->documento_contables);
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
			/*documento_contable_logic_add::checkdocumento_contableToSaves($this->documento_contables,$this->datosCliente,$this->connexion);*/			
			//$this->documento_contableLogicAdditional->checkGeneralEntitiesToSaves($this,$this->documento_contables,$this->datosCliente,$this->connexion);
			
	   		foreach($this->documento_contables as $documento_contableLocal) {				
								
				//documento_contable_logic_add::updatedocumento_contableToSave($documento_contableLocal);	        	
				documento_contable_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$documento_contableLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				documento_contable_data::save($documento_contableLocal, $this->connexion);				
			}			
			
			/*documento_contable_logic_add::checkdocumento_contableToSavesAfter($this->documento_contables,$this->datosCliente,$this->connexion);*/			
			//$this->documento_contableLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->documento_contables,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_contable_util::refrescarFKDescripciones($this->documento_contables);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $documento_contables,Connexion $connexion)  {
		$documento_contableLogic = new  documento_contable_logic();
		  		  
        try {		
			$documento_contableLogic->setConnexion($connexion);			
			$documento_contableLogic->setdocumento_contables($documento_contables);			
			$documento_contableLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$documento_contablesAux=array();
		
		foreach($this->documento_contables as $documento_contable) {
			if($documento_contable->getIsDeleted()==false) {
				$documento_contablesAux[]=$documento_contable;
			}
		}
		
		$this->documento_contables=$documento_contablesAux;
	}
	
	public function updateToGetsAuxiliar(array &$documento_contables) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->documento_contables as $documento_contable) {
				
				$documento_contable->setid_empresa_Descripcion(documento_contable_util::getempresaDescripcion($documento_contable->getempresa()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$documento_contable_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$documento_contable_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$documento_contable_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$documento_contable_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$documento_contable_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$documento_contableForeignKey=new documento_contable_param_return();//documento_contableForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$documento_contableForeignKey,$documento_contable_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$documento_contableForeignKey,$documento_contable_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $documento_contableForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$documento_contableForeignKey,$documento_contable_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$documento_contableForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($documento_contable_session==null) {
			$documento_contable_session=new documento_contable_session();
		}
		
		if($documento_contable_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($documento_contableForeignKey->idempresaDefaultFK==0) {
					$documento_contableForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$documento_contableForeignKey->empresasFK[$empresaLocal->getId()]=documento_contable_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($documento_contable_session->bigidempresaActual!=null && $documento_contable_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($documento_contable_session->bigidempresaActual);//WithConnection

				$documento_contableForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=documento_contable_util::getempresaDescripcion($empresaLogic->getempresa());
				$documento_contableForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($documento_contable,$asiento_origens,$asientopredefinidos) {
		$this->saveRelacionesBase($documento_contable,$asiento_origens,$asientopredefinidos,true);
	}

	public function saveRelaciones($documento_contable,$asiento_origens,$asientopredefinidos) {
		$this->saveRelacionesBase($documento_contable,$asiento_origens,$asientopredefinidos,false);
	}

	public function saveRelacionesBase($documento_contable,$asiento_origens=array(),$asientopredefinidos=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$documento_contable->setasiento_origens($asiento_origens);
			$documento_contable->setasiento_predefinidos($asientopredefinidos);
			$this->setdocumento_contable($documento_contable);

			if(true) {

				//documento_contable_logic_add::updateRelacionesToSave($documento_contable,$this);

				if(($this->documento_contable->getIsNew() || $this->documento_contable->getIsChanged()) && !$this->documento_contable->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($asiento_origens,$asientopredefinidos);

				} else if($this->documento_contable->getIsDeleted()) {
					$this->saveRelacionesDetalles($asiento_origens,$asientopredefinidos);
					$this->save();
				}

				//documento_contable_logic_add::updateRelacionesToSaveAfter($documento_contable,$this);

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
	
	
	public function saveRelacionesDetalles($asiento_origens=array(),$asientopredefinidos=array()) {
		try {
	

			$iddocumento_contableActual=$this->getdocumento_contable()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_carga.php');
			asiento_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$asiento_origenLogic_Desde_documento_contable=new asiento_logic();
			$asiento_origenLogic_Desde_documento_contable->setasientos($asiento_origens);

			$asiento_origenLogic_Desde_documento_contable->setConnexion($this->getConnexion());
			$asiento_origenLogic_Desde_documento_contable->setDatosCliente($this->datosCliente);

			foreach($asiento_origenLogic_Desde_documento_contable->getasientos() as $asiento_Desde_documento_contable) {
				$asiento_Desde_documento_contable->setid_documento_contable_origen($iddocumento_contableActual);

				$asiento_origenLogic_Desde_documento_contable->setasiento($asiento_Desde_documento_contable);
				$asiento_origenLogic_Desde_documento_contable->save();

				$idasientoActual=$asiento_Desde_documento_contable->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_detalle_carga.php');
				asiento_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$asientodetalleLogic_Desde_asiento=new asiento_detalle_logic();

				if($asiento_Desde_documento_contable->getasiento_detalles()==null){
					$asiento_Desde_documento_contable->setasiento_detalles(array());
				}

				$asientodetalleLogic_Desde_asiento->setasiento_detalles($asiento_Desde_documento_contable->getasiento_detalles());

				$asientodetalleLogic_Desde_asiento->setConnexion($this->getConnexion());
				$asientodetalleLogic_Desde_asiento->setDatosCliente($this->datosCliente);

				foreach($asientodetalleLogic_Desde_asiento->getasiento_detalles() as $asientodetalle_Desde_asiento) {
					$asientodetalle_Desde_asiento->setid_asiento($idasientoActual);
				}

				$asientodetalleLogic_Desde_asiento->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_predefinido_carga.php');
			asiento_predefinido_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$asientopredefinidoLogic_Desde_documento_contable=new asiento_predefinido_logic();
			$asientopredefinidoLogic_Desde_documento_contable->setasiento_predefinidos($asientopredefinidos);

			$asientopredefinidoLogic_Desde_documento_contable->setConnexion($this->getConnexion());
			$asientopredefinidoLogic_Desde_documento_contable->setDatosCliente($this->datosCliente);

			foreach($asientopredefinidoLogic_Desde_documento_contable->getasiento_predefinidos() as $asientopredefinido_Desde_documento_contable) {
				$asientopredefinido_Desde_documento_contable->setid_documento_contable($iddocumento_contableActual);

				$asientopredefinidoLogic_Desde_documento_contable->setasiento_predefinido($asientopredefinido_Desde_documento_contable);
				$asientopredefinidoLogic_Desde_documento_contable->save();

				$idasiento_predefinidoActual=$asiento_predefinido_Desde_documento_contable->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_predefinido_detalle_carga.php');
				asiento_predefinido_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$asientopredefinidodetalleLogic_Desde_asiento_predefinido=new asiento_predefinido_detalle_logic();

				if($asiento_predefinido_Desde_documento_contable->getasiento_predefinido_detalles()==null){
					$asiento_predefinido_Desde_documento_contable->setasiento_predefinido_detalles(array());
				}

				$asientopredefinidodetalleLogic_Desde_asiento_predefinido->setasiento_predefinido_detalles($asiento_predefinido_Desde_documento_contable->getasiento_predefinido_detalles());

				$asientopredefinidodetalleLogic_Desde_asiento_predefinido->setConnexion($this->getConnexion());
				$asientopredefinidodetalleLogic_Desde_asiento_predefinido->setDatosCliente($this->datosCliente);

				foreach($asientopredefinidodetalleLogic_Desde_asiento_predefinido->getasiento_predefinido_detalles() as $asientopredefinidodetalle_Desde_asiento_predefinido) {
					$asientopredefinidodetalle_Desde_asiento_predefinido->setid_asiento_predefinido($idasiento_predefinidoActual);
				}

				$asientopredefinidodetalleLogic_Desde_asiento_predefinido->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_carga.php');
				asiento_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$asientoLogic_Desde_asiento_predefinido=new asiento_logic();

				if($asiento_predefinido_Desde_documento_contable->getasientos()==null){
					$asiento_predefinido_Desde_documento_contable->setasientos(array());
				}

				$asientoLogic_Desde_asiento_predefinido->setasientos($asiento_predefinido_Desde_documento_contable->getasientos());

				$asientoLogic_Desde_asiento_predefinido->setConnexion($this->getConnexion());
				$asientoLogic_Desde_asiento_predefinido->setDatosCliente($this->datosCliente);

				foreach($asientoLogic_Desde_asiento_predefinido->getasientos() as $asiento_Desde_asiento_predefinido) {
					$asiento_Desde_asiento_predefinido->setid_asiento_predefinido($idasiento_predefinidoActual);

					$asientoLogic_Desde_asiento_predefinido->setasiento($asiento_Desde_asiento_predefinido);
					$asientoLogic_Desde_asiento_predefinido->save();

					$idasientoActual=$asiento_Desde_asiento_predefinido->getId();

					include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_detalle_carga.php');
					asiento_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

					$asientodetalleLogic_Desde_asiento=new asiento_detalle_logic();

					if($asiento_Desde_asiento_predefinido->getasiento_detalles()==null){
						$asiento_Desde_asiento_predefinido->setasiento_detalles(array());
					}

					$asientodetalleLogic_Desde_asiento->setasiento_detalles($asiento_Desde_asiento_predefinido->getasiento_detalles());

					$asientodetalleLogic_Desde_asiento->setConnexion($this->getConnexion());
					$asientodetalleLogic_Desde_asiento->setDatosCliente($this->datosCliente);

					foreach($asientodetalleLogic_Desde_asiento->getasiento_detalles() as $asientodetalle_Desde_asiento) {
						$asientodetalle_Desde_asiento->setid_asiento($idasientoActual);
					}

					$asientodetalleLogic_Desde_asiento->saves();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $documento_contables,documento_contable_param_return $documento_contableParameterGeneral) : documento_contable_param_return {
		$documento_contableReturnGeneral=new documento_contable_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $documento_contableReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $documento_contables,documento_contable_param_return $documento_contableParameterGeneral) : documento_contable_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$documento_contableReturnGeneral=new documento_contable_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $documento_contableReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $documento_contables,documento_contable $documento_contable,documento_contable_param_return $documento_contableParameterGeneral,bool $isEsNuevodocumento_contable,array $clases) : documento_contable_param_return {
		 try {	
			$documento_contableReturnGeneral=new documento_contable_param_return();
	
			$documento_contableReturnGeneral->setdocumento_contable($documento_contable);
			$documento_contableReturnGeneral->setdocumento_contables($documento_contables);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$documento_contableReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $documento_contableReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $documento_contables,documento_contable $documento_contable,documento_contable_param_return $documento_contableParameterGeneral,bool $isEsNuevodocumento_contable,array $clases) : documento_contable_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$documento_contableReturnGeneral=new documento_contable_param_return();
	
			$documento_contableReturnGeneral->setdocumento_contable($documento_contable);
			$documento_contableReturnGeneral->setdocumento_contables($documento_contables);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$documento_contableReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $documento_contableReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $documento_contables,documento_contable $documento_contable,documento_contable_param_return $documento_contableParameterGeneral,bool $isEsNuevodocumento_contable,array $clases) : documento_contable_param_return {
		 try {	
			$documento_contableReturnGeneral=new documento_contable_param_return();
	
			$documento_contableReturnGeneral->setdocumento_contable($documento_contable);
			$documento_contableReturnGeneral->setdocumento_contables($documento_contables);
			
			
			
			return $documento_contableReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $documento_contables,documento_contable $documento_contable,documento_contable_param_return $documento_contableParameterGeneral,bool $isEsNuevodocumento_contable,array $clases) : documento_contable_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$documento_contableReturnGeneral=new documento_contable_param_return();
	
			$documento_contableReturnGeneral->setdocumento_contable($documento_contable);
			$documento_contableReturnGeneral->setdocumento_contables($documento_contables);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $documento_contableReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,documento_contable $documento_contable,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,documento_contable $documento_contable,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		documento_contable_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		documento_contable_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(documento_contable $documento_contable,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//documento_contable_logic_add::updatedocumento_contableToGet($this->documento_contable);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$documento_contable->setempresa($this->documento_contableDataAccess->getempresa($this->connexion,$documento_contable));
		$documento_contable->setasiento_origens($this->documento_contableDataAccess->getasiento_origens($this->connexion,$documento_contable));
		$documento_contable->setasiento_predefinidos($this->documento_contableDataAccess->getasiento_predefinidos($this->connexion,$documento_contable));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$documento_contable->setempresa($this->documento_contableDataAccess->getempresa($this->connexion,$documento_contable));
				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$documento_contable->setasiento_origens($this->documento_contableDataAccess->getasiento_origens($this->connexion,$documento_contable));

				if($this->isConDeep) {
					$asientoLogic= new asiento_logic($this->connexion);
					$asientoLogic->setasientos($documento_contable->getasiento_origens());
					$classesLocal=asiento_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$asientoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					asiento_util::refrescarFKDescripciones($asientoLogic->getasientos());
					$documento_contable->setasiento_origens($asientoLogic->getasientos());
				}

				continue;
			}

			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$documento_contable->setasiento_predefinidos($this->documento_contableDataAccess->getasiento_predefinidos($this->connexion,$documento_contable));

				if($this->isConDeep) {
					$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
					$asientopredefinidoLogic->setasiento_predefinidos($documento_contable->getasiento_predefinidos());
					$classesLocal=asiento_predefinido_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$asientopredefinidoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					asiento_predefinido_util::refrescarFKDescripciones($asientopredefinidoLogic->getasiento_predefinidos());
					$documento_contable->setasiento_predefinidos($asientopredefinidoLogic->getasiento_predefinidos());
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
			$documento_contable->setempresa($this->documento_contableDataAccess->getempresa($this->connexion,$documento_contable));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento::$class);
			$documento_contable->setasiento_origens($this->documento_contableDataAccess->getasiento_origens($this->connexion,$documento_contable));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_predefinido::$class);
			$documento_contable->setasiento_predefinidos($this->documento_contableDataAccess->getasiento_predefinidos($this->connexion,$documento_contable));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$documento_contable->setempresa($this->documento_contableDataAccess->getempresa($this->connexion,$documento_contable));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($documento_contable->getempresa(),$isDeep,$deepLoadType,$clases);
				

		$documento_contable->setasiento_origens($this->documento_contableDataAccess->getasiento_origens($this->connexion,$documento_contable));

		foreach($documento_contable->getasiento_origens() as $asiento) {
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepLoad($asiento,$isDeep,$deepLoadType,$clases);
		}

		$documento_contable->setasiento_predefinidos($this->documento_contableDataAccess->getasiento_predefinidos($this->connexion,$documento_contable));

		foreach($documento_contable->getasiento_predefinidos() as $asientopredefinido) {
			$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
			$asientopredefinidoLogic->deepLoad($asientopredefinido,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$documento_contable->setempresa($this->documento_contableDataAccess->getempresa($this->connexion,$documento_contable));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($documento_contable->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$documento_contable->setasiento_origens($this->documento_contableDataAccess->getasiento_origens($this->connexion,$documento_contable));

				foreach($documento_contable->getasiento_origens() as $asiento) {
					$asientoLogic= new asiento_logic($this->connexion);
					$asientoLogic->deepLoad($asiento,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$documento_contable->setasiento_predefinidos($this->documento_contableDataAccess->getasiento_predefinidos($this->connexion,$documento_contable));

				foreach($documento_contable->getasiento_predefinidos() as $asientopredefinido) {
					$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
					$asientopredefinidoLogic->deepLoad($asientopredefinido,$isDeep,$deepLoadType,$clases);
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
			$documento_contable->setempresa($this->documento_contableDataAccess->getempresa($this->connexion,$documento_contable));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($documento_contable->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento::$class);
			$documento_contable->setasiento_origens($this->documento_contableDataAccess->getasiento_origens($this->connexion,$documento_contable));

			foreach($documento_contable->getasiento_origens() as $asiento) {
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepLoad($asiento,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_predefinido::$class);
			$documento_contable->setasiento_predefinidos($this->documento_contableDataAccess->getasiento_predefinidos($this->connexion,$documento_contable));

			foreach($documento_contable->getasiento_predefinidos() as $asientopredefinido) {
				$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
				$asientopredefinidoLogic->deepLoad($asientopredefinido,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(documento_contable $documento_contable,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//documento_contable_logic_add::updatedocumento_contableToSave($this->documento_contable);			
			
			if(!$paraDeleteCascade) {				
				documento_contable_data::save($documento_contable, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($documento_contable->getempresa(),$this->connexion);

		foreach($documento_contable->getasiento_origens() as $asiento) {
			$asiento->setid_documento_contable($documento_contable->getId());
			asiento_data::save($asiento,$this->connexion);
		}


		foreach($documento_contable->getasiento_predefinidos() as $asientopredefinido) {
			$asientopredefinido->setid_documento_contable($documento_contable->getId());
			asiento_predefinido_data::save($asientopredefinido,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($documento_contable->getempresa(),$this->connexion);
				continue;
			}


			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($documento_contable->getasiento_origens() as $asiento) {
					$asiento->setid_documento_contable($documento_contable->getId());
					asiento_data::save($asiento,$this->connexion);
				}

				continue;
			}

			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($documento_contable->getasiento_predefinidos() as $asientopredefinido) {
					$asientopredefinido->setid_documento_contable($documento_contable->getId());
					asiento_predefinido_data::save($asientopredefinido,$this->connexion);
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
			empresa_data::save($documento_contable->getempresa(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento::$class);

			foreach($documento_contable->getasiento_origens() as $asiento) {
				$asiento->setid_documento_contable($documento_contable->getId());
				asiento_data::save($asiento,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_predefinido::$class);

			foreach($documento_contable->getasiento_predefinidos() as $asientopredefinido) {
				$asientopredefinido->setid_documento_contable($documento_contable->getId());
				asiento_predefinido_data::save($asientopredefinido,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($documento_contable->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($documento_contable->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($documento_contable->getasiento_origens() as $asiento) {
			$asientoLogic= new asiento_logic($this->connexion);
			$asiento->setid_documento_contable($documento_contable->getId());
			asiento_data::save($asiento,$this->connexion);
			$asientoLogic->deepSave($asiento,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($documento_contable->getasiento_predefinidos() as $asientopredefinido) {
			$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
			$asientopredefinido->setid_documento_contable($documento_contable->getId());
			asiento_predefinido_data::save($asientopredefinido,$this->connexion);
			$asientopredefinidoLogic->deepSave($asientopredefinido,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($documento_contable->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($documento_contable->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($documento_contable->getasiento_origens() as $asiento) {
					$asientoLogic= new asiento_logic($this->connexion);
					$asiento->setid_documento_contable($documento_contable->getId());
					asiento_data::save($asiento,$this->connexion);
					$asientoLogic->deepSave($asiento,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($documento_contable->getasiento_predefinidos() as $asientopredefinido) {
					$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
					$asientopredefinido->setid_documento_contable($documento_contable->getId());
					asiento_predefinido_data::save($asientopredefinido,$this->connexion);
					$asientopredefinidoLogic->deepSave($asientopredefinido,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($documento_contable->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($documento_contable->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento::$class);

			foreach($documento_contable->getasiento_origens() as $asiento) {
				$asientoLogic= new asiento_logic($this->connexion);
				$asiento->setid_documento_contable($documento_contable->getId());
				asiento_data::save($asiento,$this->connexion);
				$asientoLogic->deepSave($asiento,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_predefinido::$class);

			foreach($documento_contable->getasiento_predefinidos() as $asientopredefinido) {
				$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
				$asientopredefinido->setid_documento_contable($documento_contable->getId());
				asiento_predefinido_data::save($asientopredefinido,$this->connexion);
				$asientopredefinidoLogic->deepSave($asientopredefinido,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				documento_contable_data::save($documento_contable, $this->connexion);
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
			
			$this->deepLoad($this->documento_contable,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->documento_contables as $documento_contable) {
				$this->deepLoad($documento_contable,$isDeep,$deepLoadType,$clases);
								
				documento_contable_util::refrescarFKDescripciones($this->documento_contables);
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
			
			foreach($this->documento_contables as $documento_contable) {
				$this->deepLoad($documento_contable,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->documento_contable,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->documento_contables as $documento_contable) {
				$this->deepSave($documento_contable,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->documento_contables as $documento_contable) {
				$this->deepSave($documento_contable,$isDeep,$deepLoadType,$clases,false);
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
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
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
				
				$classes[]=new Classe(asiento::$class);
				$classes[]=new Classe(asiento_predefinido::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==asiento::$class) {
						$classes[]=new Classe(asiento::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==asiento_predefinido::$class) {
						$classes[]=new Classe(asiento_predefinido::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==asiento::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==asiento_predefinido::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento_predefinido::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getdocumento_contable() : ?documento_contable {	
		/*
		documento_contable_logic_add::checkdocumento_contableToGet($this->documento_contable,$this->datosCliente);
		documento_contable_logic_add::updatedocumento_contableToGet($this->documento_contable);
		*/
			
		return $this->documento_contable;
	}
		
	public function setdocumento_contable(documento_contable $newdocumento_contable) {
		$this->documento_contable = $newdocumento_contable;
	}
	
	public function getdocumento_contables() : array {		
		/*
		documento_contable_logic_add::checkdocumento_contableToGets($this->documento_contables,$this->datosCliente);
		
		foreach ($this->documento_contables as $documento_contableLocal ) {
			documento_contable_logic_add::updatedocumento_contableToGet($documento_contableLocal);
		}
		*/
		
		return $this->documento_contables;
	}
	
	public function setdocumento_contables(array $newdocumento_contables) {
		$this->documento_contables = $newdocumento_contables;
	}
	
	public function getdocumento_contableDataAccess() : documento_contable_data {
		return $this->documento_contableDataAccess;
	}
	
	public function setdocumento_contableDataAccess(documento_contable_data $newdocumento_contableDataAccess) {
		$this->documento_contableDataAccess = $newdocumento_contableDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        documento_contable_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		asiento_detalle_logic::$logger;
		asiento_predefinido_detalle_logic::$logger;
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
