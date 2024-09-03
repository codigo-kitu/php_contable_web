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

namespace com\bydan\contabilidad\contabilidad\cierre_contable_detalle\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\util\cierre_contable_detalle_carga;
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\util\cierre_contable_detalle_param_return;

use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\presentation\session\cierre_contable_detalle_session;

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

use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\util\cierre_contable_detalle_util;
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\business\entity\cierre_contable_detalle;
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\business\data\cierre_contable_detalle_data;

//FK


use com\bydan\contabilidad\contabilidad\cierre_contable\business\entity\cierre_contable;
use com\bydan\contabilidad\contabilidad\cierre_contable\business\data\cierre_contable_data;
use com\bydan\contabilidad\contabilidad\cierre_contable\business\logic\cierre_contable_logic;
use com\bydan\contabilidad\contabilidad\cierre_contable\util\cierre_contable_util;

//REL


//REL DETALLES




class cierre_contable_detalle_logic  extends GeneralEntityLogic implements cierre_contable_detalle_logicI {	
	/*GENERAL*/
	public cierre_contable_detalle_data $cierre_contable_detalleDataAccess;
	//public ?cierre_contable_detalle_logic_add $cierre_contable_detalleLogicAdditional=null;
	public ?cierre_contable_detalle $cierre_contable_detalle;
	public array $cierre_contable_detalles;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->cierre_contable_detalleDataAccess = new cierre_contable_detalle_data();			
			$this->cierre_contable_detalles = array();
			$this->cierre_contable_detalle = new cierre_contable_detalle();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->cierre_contable_detalleLogicAdditional = new cierre_contable_detalle_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->cierre_contable_detalleLogicAdditional==null) {
		//	$this->cierre_contable_detalleLogicAdditional=new cierre_contable_detalle_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->cierre_contable_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->cierre_contable_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->cierre_contable_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->cierre_contable_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->cierre_contable_detalles = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cierre_contable_detalles=$this->cierre_contable_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_detalle_util::refrescarFKDescripciones($this->cierre_contable_detalles);
			}
			
			//cierre_contable_detalle_logic_add::checkcierre_contable_detalleToGets($this->cierre_contable_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contable_detalles);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->cierre_contable_detalles = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cierre_contable_detalles=$this->cierre_contable_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_detalle_util::refrescarFKDescripciones($this->cierre_contable_detalles);
			}
			
			//cierre_contable_detalle_logic_add::checkcierre_contable_detalleToGets($this->cierre_contable_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contable_detalles);
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
		$this->cierre_contable_detalle = new cierre_contable_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->cierre_contable_detalle=$this->cierre_contable_detalleDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cierre_contable_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cierre_contable_detalle_util::refrescarFKDescripcion($this->cierre_contable_detalle);
			}
						
			//cierre_contable_detalle_logic_add::checkcierre_contable_detalleToGet($this->cierre_contable_detalle,$this->datosCliente);
			//cierre_contable_detalle_logic_add::updatecierre_contable_detalleToGet($this->cierre_contable_detalle);
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
		$this->cierre_contable_detalle = new  cierre_contable_detalle();
		  		  
        try {		
			$this->cierre_contable_detalle=$this->cierre_contable_detalleDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cierre_contable_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cierre_contable_detalle_util::refrescarFKDescripcion($this->cierre_contable_detalle);
			}
			
			//cierre_contable_detalle_logic_add::checkcierre_contable_detalleToGet($this->cierre_contable_detalle,$this->datosCliente);
			//cierre_contable_detalle_logic_add::updatecierre_contable_detalleToGet($this->cierre_contable_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?cierre_contable_detalle {
		$cierre_contable_detalleLogic = new  cierre_contable_detalle_logic();
		  		  
        try {		
			$cierre_contable_detalleLogic->setConnexion($connexion);			
			$cierre_contable_detalleLogic->getEntity($id);			
			return $cierre_contable_detalleLogic->getcierre_contable_detalle();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->cierre_contable_detalle = new  cierre_contable_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->cierre_contable_detalle=$this->cierre_contable_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cierre_contable_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cierre_contable_detalle_util::refrescarFKDescripcion($this->cierre_contable_detalle);
			}
			
			//cierre_contable_detalle_logic_add::checkcierre_contable_detalleToGet($this->cierre_contable_detalle,$this->datosCliente);
			//cierre_contable_detalle_logic_add::updatecierre_contable_detalleToGet($this->cierre_contable_detalle);
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
		$this->cierre_contable_detalle = new  cierre_contable_detalle();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cierre_contable_detalle=$this->cierre_contable_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cierre_contable_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cierre_contable_detalle_util::refrescarFKDescripcion($this->cierre_contable_detalle);
			}
			
			//cierre_contable_detalle_logic_add::checkcierre_contable_detalleToGet($this->cierre_contable_detalle,$this->datosCliente);
			//cierre_contable_detalle_logic_add::updatecierre_contable_detalleToGet($this->cierre_contable_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?cierre_contable_detalle {
		$cierre_contable_detalleLogic = new  cierre_contable_detalle_logic();
		  		  
        try {		
			$cierre_contable_detalleLogic->setConnexion($connexion);			
			$cierre_contable_detalleLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $cierre_contable_detalleLogic->getcierre_contable_detalle();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cierre_contable_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cierre_contable_detalles=$this->cierre_contable_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_detalle_util::refrescarFKDescripciones($this->cierre_contable_detalles);
			}
			
			//cierre_contable_detalle_logic_add::checkcierre_contable_detalleToGets($this->cierre_contable_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contable_detalles);			
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
		$this->cierre_contable_detalles = array();
		  		  
        try {			
			$this->cierre_contable_detalles=$this->cierre_contable_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_detalle_util::refrescarFKDescripciones($this->cierre_contable_detalles);
			}
			
			//cierre_contable_detalle_logic_add::checkcierre_contable_detalleToGets($this->cierre_contable_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contable_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->cierre_contable_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cierre_contable_detalles=$this->cierre_contable_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_detalle_util::refrescarFKDescripciones($this->cierre_contable_detalles);
			}
			
			//cierre_contable_detalle_logic_add::checkcierre_contable_detalleToGets($this->cierre_contable_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contable_detalles);
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
		$this->cierre_contable_detalles = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cierre_contable_detalles=$this->cierre_contable_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_detalle_util::refrescarFKDescripciones($this->cierre_contable_detalles);
			}
			
			//cierre_contable_detalle_logic_add::checkcierre_contable_detalleToGets($this->cierre_contable_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contable_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$cierre_contable_detalleLogic = new  cierre_contable_detalle_logic();
		  		  
        try {		
			$cierre_contable_detalleLogic->setConnexion($connexion);			
			$cierre_contable_detalleLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $cierre_contable_detalleLogic->getcierre_contable_detalles();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->cierre_contable_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cierre_contable_detalles=$this->cierre_contable_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_detalle_util::refrescarFKDescripciones($this->cierre_contable_detalles);
			}
			
			//cierre_contable_detalle_logic_add::checkcierre_contable_detalleToGets($this->cierre_contable_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contable_detalles);
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
		$this->cierre_contable_detalles = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cierre_contable_detalles=$this->cierre_contable_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_detalle_util::refrescarFKDescripciones($this->cierre_contable_detalles);
			}
			
			//cierre_contable_detalle_logic_add::checkcierre_contable_detalleToGets($this->cierre_contable_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contable_detalles);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->cierre_contable_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cierre_contable_detalles=$this->cierre_contable_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_detalle_util::refrescarFKDescripciones($this->cierre_contable_detalles);
			}
			
			//cierre_contable_detalle_logic_add::checkcierre_contable_detalleToGets($this->cierre_contable_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contable_detalles);
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
		$this->cierre_contable_detalles = array();
		  		  
        try {			
			$this->cierre_contable_detalles=$this->cierre_contable_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_detalle_util::refrescarFKDescripciones($this->cierre_contable_detalles);
			}	
			
			//cierre_contable_detalle_logic_add::checkcierre_contable_detalleToGets($this->cierre_contable_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contable_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cierre_contable_detalles = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->cierre_contable_detalles=$this->cierre_contable_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_detalle_util::refrescarFKDescripciones($this->cierre_contable_detalles);
			}
			
			//cierre_contable_detalle_logic_add::checkcierre_contable_detalleToGets($this->cierre_contable_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contable_detalles);
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
		$this->cierre_contable_detalles = array();
		  		  
        try {		
			$this->cierre_contable_detalles=$this->cierre_contable_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_detalle_util::refrescarFKDescripciones($this->cierre_contable_detalles);
			}
			
			//cierre_contable_detalle_logic_add::checkcierre_contable_detalleToGets($this->cierre_contable_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cierre_contable_detalles);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_Idcierre_contableWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cierre_contable) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cierre_contable= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cierre_contable->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cierre_contable,cierre_contable_detalle_util::$ID_CIERRE_CONTABLE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cierre_contable);

			$this->cierre_contable_detalles=$this->cierre_contable_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cierre_contable_detalle_util::refrescarFKDescripciones($this->cierre_contable_detalles);
			}
			//cierre_contable_detalle_logic_add::checkcierre_contable_detalleToGets($this->cierre_contable_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cierre_contable_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcierre_contable(string $strFinalQuery,Pagination $pagination,int $id_cierre_contable) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cierre_contable= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cierre_contable->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cierre_contable,cierre_contable_detalle_util::$ID_CIERRE_CONTABLE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cierre_contable);

			$this->cierre_contable_detalles=$this->cierre_contable_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cierre_contable_detalle_util::refrescarFKDescripciones($this->cierre_contable_detalles);
			}
			//cierre_contable_detalle_logic_add::checkcierre_contable_detalleToGets($this->cierre_contable_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cierre_contable_detalles);
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
						
			//cierre_contable_detalle_logic_add::checkcierre_contable_detalleToSave($this->cierre_contable_detalle,$this->datosCliente,$this->connexion);	       
			//cierre_contable_detalle_logic_add::updatecierre_contable_detalleToSave($this->cierre_contable_detalle);			
			cierre_contable_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cierre_contable_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->cierre_contable_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->cierre_contable_detalle,$this->datosCliente,$this->connexion);
			
			
			cierre_contable_detalle_data::save($this->cierre_contable_detalle, $this->connexion);	    	       	 				
			//cierre_contable_detalle_logic_add::checkcierre_contable_detalleToSaveAfter($this->cierre_contable_detalle,$this->datosCliente,$this->connexion);			
			//$this->cierre_contable_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cierre_contable_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cierre_contable_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cierre_contable_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cierre_contable_detalle_util::refrescarFKDescripcion($this->cierre_contable_detalle);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->cierre_contable_detalle->getIsDeleted()) {
				$this->cierre_contable_detalle=null;
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
						
			/*cierre_contable_detalle_logic_add::checkcierre_contable_detalleToSave($this->cierre_contable_detalle,$this->datosCliente,$this->connexion);*/	        
			//cierre_contable_detalle_logic_add::updatecierre_contable_detalleToSave($this->cierre_contable_detalle);			
			//$this->cierre_contable_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->cierre_contable_detalle,$this->datosCliente,$this->connexion);			
			cierre_contable_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cierre_contable_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			cierre_contable_detalle_data::save($this->cierre_contable_detalle, $this->connexion);	    	       	 						
			/*cierre_contable_detalle_logic_add::checkcierre_contable_detalleToSaveAfter($this->cierre_contable_detalle,$this->datosCliente,$this->connexion);*/			
			//$this->cierre_contable_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cierre_contable_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cierre_contable_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cierre_contable_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cierre_contable_detalle_util::refrescarFKDescripcion($this->cierre_contable_detalle);				
			}
			
			if($this->cierre_contable_detalle->getIsDeleted()) {
				$this->cierre_contable_detalle=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(cierre_contable_detalle $cierre_contable_detalle,Connexion $connexion)  {
		$cierre_contable_detalleLogic = new  cierre_contable_detalle_logic();		  		  
        try {		
			$cierre_contable_detalleLogic->setConnexion($connexion);			
			$cierre_contable_detalleLogic->setcierre_contable_detalle($cierre_contable_detalle);			
			$cierre_contable_detalleLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*cierre_contable_detalle_logic_add::checkcierre_contable_detalleToSaves($this->cierre_contable_detalles,$this->datosCliente,$this->connexion);*/	        	
			//$this->cierre_contable_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cierre_contable_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cierre_contable_detalles as $cierre_contable_detalleLocal) {				
								
				//cierre_contable_detalle_logic_add::updatecierre_contable_detalleToSave($cierre_contable_detalleLocal);	        	
				cierre_contable_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cierre_contable_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				cierre_contable_detalle_data::save($cierre_contable_detalleLocal, $this->connexion);				
			}
			
			/*cierre_contable_detalle_logic_add::checkcierre_contable_detalleToSavesAfter($this->cierre_contable_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->cierre_contable_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cierre_contable_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_detalle_util::refrescarFKDescripciones($this->cierre_contable_detalles);
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
			/*cierre_contable_detalle_logic_add::checkcierre_contable_detalleToSaves($this->cierre_contable_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->cierre_contable_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cierre_contable_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cierre_contable_detalles as $cierre_contable_detalleLocal) {				
								
				//cierre_contable_detalle_logic_add::updatecierre_contable_detalleToSave($cierre_contable_detalleLocal);	        	
				cierre_contable_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cierre_contable_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				cierre_contable_detalle_data::save($cierre_contable_detalleLocal, $this->connexion);				
			}			
			
			/*cierre_contable_detalle_logic_add::checkcierre_contable_detalleToSavesAfter($this->cierre_contable_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->cierre_contable_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cierre_contable_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cierre_contable_detalle_util::refrescarFKDescripciones($this->cierre_contable_detalles);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $cierre_contable_detalles,Connexion $connexion)  {
		$cierre_contable_detalleLogic = new  cierre_contable_detalle_logic();
		  		  
        try {		
			$cierre_contable_detalleLogic->setConnexion($connexion);			
			$cierre_contable_detalleLogic->setcierre_contable_detalles($cierre_contable_detalles);			
			$cierre_contable_detalleLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$cierre_contable_detallesAux=array();
		
		foreach($this->cierre_contable_detalles as $cierre_contable_detalle) {
			if($cierre_contable_detalle->getIsDeleted()==false) {
				$cierre_contable_detallesAux[]=$cierre_contable_detalle;
			}
		}
		
		$this->cierre_contable_detalles=$cierre_contable_detallesAux;
	}
	
	public function updateToGetsAuxiliar(array &$cierre_contable_detalles) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->cierre_contable_detalles as $cierre_contable_detalle) {
				
				$cierre_contable_detalle->setid_cierre_contable_Descripcion(cierre_contable_detalle_util::getcierre_contableDescripcion($cierre_contable_detalle->getcierre_contable()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cierre_contable_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cierre_contable_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cierre_contable_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cierre_contable_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cierre_contable_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$cierre_contable_detalleForeignKey=new cierre_contable_detalle_param_return();//cierre_contable_detalleForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cierre_contable',$strRecargarFkTipos,',')) {
				$this->cargarComboscierre_contablesFK($this->connexion,$strRecargarFkQuery,$cierre_contable_detalleForeignKey,$cierre_contable_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cierre_contable',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscierre_contablesFK($this->connexion,' where id=-1 ',$cierre_contable_detalleForeignKey,$cierre_contable_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $cierre_contable_detalleForeignKey;
			
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
	
	
	public function cargarComboscierre_contablesFK($connexion=null,$strRecargarFkQuery='',$cierre_contable_detalleForeignKey,$cierre_contable_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cierre_contableLogic= new cierre_contable_logic();
		$pagination= new Pagination();
		$cierre_contable_detalleForeignKey->cierre_contablesFK=array();

		$cierre_contableLogic->setConnexion($connexion);
		$cierre_contableLogic->getcierre_contableDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cierre_contable_detalle_session==null) {
			$cierre_contable_detalle_session=new cierre_contable_detalle_session();
		}
		
		if($cierre_contable_detalle_session->bitBusquedaDesdeFKSesioncierre_contable!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cierre_contable_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcierre_contable=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcierre_contable=Funciones::GetFinalQueryAppend($finalQueryGlobalcierre_contable, '');
				$finalQueryGlobalcierre_contable.=cierre_contable_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcierre_contable.$strRecargarFkQuery;		

				$cierre_contableLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($cierre_contableLogic->getcierre_contables() as $cierre_contableLocal ) {
				if($cierre_contable_detalleForeignKey->idcierre_contableDefaultFK==0) {
					$cierre_contable_detalleForeignKey->idcierre_contableDefaultFK=$cierre_contableLocal->getId();
				}

				$cierre_contable_detalleForeignKey->cierre_contablesFK[$cierre_contableLocal->getId()]=cierre_contable_detalle_util::getcierre_contableDescripcion($cierre_contableLocal);
			}

		} else {

			if($cierre_contable_detalle_session->bigidcierre_contableActual!=null && $cierre_contable_detalle_session->bigidcierre_contableActual > 0) {
				$cierre_contableLogic->getEntity($cierre_contable_detalle_session->bigidcierre_contableActual);//WithConnection

				$cierre_contable_detalleForeignKey->cierre_contablesFK[$cierre_contableLogic->getcierre_contable()->getId()]=cierre_contable_detalle_util::getcierre_contableDescripcion($cierre_contableLogic->getcierre_contable());
				$cierre_contable_detalleForeignKey->idcierre_contableDefaultFK=$cierre_contableLogic->getcierre_contable()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($cierre_contable_detalle) {
		$this->saveRelacionesBase($cierre_contable_detalle,true);
	}

	public function saveRelaciones($cierre_contable_detalle) {
		$this->saveRelacionesBase($cierre_contable_detalle,false);
	}

	public function saveRelacionesBase($cierre_contable_detalle,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setcierre_contable_detalle($cierre_contable_detalle);

			if(true) {

				//cierre_contable_detalle_logic_add::updateRelacionesToSave($cierre_contable_detalle,$this);

				if(($this->cierre_contable_detalle->getIsNew() || $this->cierre_contable_detalle->getIsChanged()) && !$this->cierre_contable_detalle->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->cierre_contable_detalle->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//cierre_contable_detalle_logic_add::updateRelacionesToSaveAfter($cierre_contable_detalle,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $cierre_contable_detalles,cierre_contable_detalle_param_return $cierre_contable_detalleParameterGeneral) : cierre_contable_detalle_param_return {
		$cierre_contable_detalleReturnGeneral=new cierre_contable_detalle_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $cierre_contable_detalleReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $cierre_contable_detalles,cierre_contable_detalle_param_return $cierre_contable_detalleParameterGeneral) : cierre_contable_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cierre_contable_detalleReturnGeneral=new cierre_contable_detalle_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $cierre_contable_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cierre_contable_detalles,cierre_contable_detalle $cierre_contable_detalle,cierre_contable_detalle_param_return $cierre_contable_detalleParameterGeneral,bool $isEsNuevocierre_contable_detalle,array $clases) : cierre_contable_detalle_param_return {
		 try {	
			$cierre_contable_detalleReturnGeneral=new cierre_contable_detalle_param_return();
	
			$cierre_contable_detalleReturnGeneral->setcierre_contable_detalle($cierre_contable_detalle);
			$cierre_contable_detalleReturnGeneral->setcierre_contable_detalles($cierre_contable_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cierre_contable_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $cierre_contable_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cierre_contable_detalles,cierre_contable_detalle $cierre_contable_detalle,cierre_contable_detalle_param_return $cierre_contable_detalleParameterGeneral,bool $isEsNuevocierre_contable_detalle,array $clases) : cierre_contable_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cierre_contable_detalleReturnGeneral=new cierre_contable_detalle_param_return();
	
			$cierre_contable_detalleReturnGeneral->setcierre_contable_detalle($cierre_contable_detalle);
			$cierre_contable_detalleReturnGeneral->setcierre_contable_detalles($cierre_contable_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cierre_contable_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $cierre_contable_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cierre_contable_detalles,cierre_contable_detalle $cierre_contable_detalle,cierre_contable_detalle_param_return $cierre_contable_detalleParameterGeneral,bool $isEsNuevocierre_contable_detalle,array $clases) : cierre_contable_detalle_param_return {
		 try {	
			$cierre_contable_detalleReturnGeneral=new cierre_contable_detalle_param_return();
	
			$cierre_contable_detalleReturnGeneral->setcierre_contable_detalle($cierre_contable_detalle);
			$cierre_contable_detalleReturnGeneral->setcierre_contable_detalles($cierre_contable_detalles);
			
			
			
			return $cierre_contable_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cierre_contable_detalles,cierre_contable_detalle $cierre_contable_detalle,cierre_contable_detalle_param_return $cierre_contable_detalleParameterGeneral,bool $isEsNuevocierre_contable_detalle,array $clases) : cierre_contable_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cierre_contable_detalleReturnGeneral=new cierre_contable_detalle_param_return();
	
			$cierre_contable_detalleReturnGeneral->setcierre_contable_detalle($cierre_contable_detalle);
			$cierre_contable_detalleReturnGeneral->setcierre_contable_detalles($cierre_contable_detalles);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $cierre_contable_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,cierre_contable_detalle $cierre_contable_detalle,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,cierre_contable_detalle $cierre_contable_detalle,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		cierre_contable_detalle_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(cierre_contable_detalle $cierre_contable_detalle,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//cierre_contable_detalle_logic_add::updatecierre_contable_detalleToGet($this->cierre_contable_detalle);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cierre_contable_detalle->setcierre_contable($this->cierre_contable_detalleDataAccess->getcierre_contable($this->connexion,$cierre_contable_detalle));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cierre_contable::$class.'') {
				$cierre_contable_detalle->setcierre_contable($this->cierre_contable_detalleDataAccess->getcierre_contable($this->connexion,$cierre_contable_detalle));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cierre_contable::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cierre_contable_detalle->setcierre_contable($this->cierre_contable_detalleDataAccess->getcierre_contable($this->connexion,$cierre_contable_detalle));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cierre_contable_detalle->setcierre_contable($this->cierre_contable_detalleDataAccess->getcierre_contable($this->connexion,$cierre_contable_detalle));
		$cierre_contableLogic= new cierre_contable_logic($this->connexion);
		$cierre_contableLogic->deepLoad($cierre_contable_detalle->getcierre_contable(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cierre_contable::$class.'') {
				$cierre_contable_detalle->setcierre_contable($this->cierre_contable_detalleDataAccess->getcierre_contable($this->connexion,$cierre_contable_detalle));
				$cierre_contableLogic= new cierre_contable_logic($this->connexion);
				$cierre_contableLogic->deepLoad($cierre_contable_detalle->getcierre_contable(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cierre_contable::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cierre_contable_detalle->setcierre_contable($this->cierre_contable_detalleDataAccess->getcierre_contable($this->connexion,$cierre_contable_detalle));
			$cierre_contableLogic= new cierre_contable_logic($this->connexion);
			$cierre_contableLogic->deepLoad($cierre_contable_detalle->getcierre_contable(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(cierre_contable_detalle $cierre_contable_detalle,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//cierre_contable_detalle_logic_add::updatecierre_contable_detalleToSave($this->cierre_contable_detalle);			
			
			if(!$paraDeleteCascade) {				
				cierre_contable_detalle_data::save($cierre_contable_detalle, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		cierre_contable_data::save($cierre_contable_detalle->getcierre_contable(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cierre_contable::$class.'') {
				cierre_contable_data::save($cierre_contable_detalle->getcierre_contable(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cierre_contable::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cierre_contable_data::save($cierre_contable_detalle->getcierre_contable(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		cierre_contable_data::save($cierre_contable_detalle->getcierre_contable(),$this->connexion);
		$cierre_contableLogic= new cierre_contable_logic($this->connexion);
		$cierre_contableLogic->deepSave($cierre_contable_detalle->getcierre_contable(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cierre_contable::$class.'') {
				cierre_contable_data::save($cierre_contable_detalle->getcierre_contable(),$this->connexion);
				$cierre_contableLogic= new cierre_contable_logic($this->connexion);
				$cierre_contableLogic->deepSave($cierre_contable_detalle->getcierre_contable(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cierre_contable::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cierre_contable_data::save($cierre_contable_detalle->getcierre_contable(),$this->connexion);
			$cierre_contableLogic= new cierre_contable_logic($this->connexion);
			$cierre_contableLogic->deepSave($cierre_contable_detalle->getcierre_contable(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				cierre_contable_detalle_data::save($cierre_contable_detalle, $this->connexion);
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
			
			$this->deepLoad($this->cierre_contable_detalle,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->cierre_contable_detalles as $cierre_contable_detalle) {
				$this->deepLoad($cierre_contable_detalle,$isDeep,$deepLoadType,$clases);
								
				cierre_contable_detalle_util::refrescarFKDescripciones($this->cierre_contable_detalles);
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
			
			foreach($this->cierre_contable_detalles as $cierre_contable_detalle) {
				$this->deepLoad($cierre_contable_detalle,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->cierre_contable_detalle,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->cierre_contable_detalles as $cierre_contable_detalle) {
				$this->deepSave($cierre_contable_detalle,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->cierre_contable_detalles as $cierre_contable_detalle) {
				$this->deepSave($cierre_contable_detalle,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(cierre_contable::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==cierre_contable::$class) {
						$classes[]=new Classe(cierre_contable::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==cierre_contable::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cierre_contable::$class);
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
	
	
	
	
	
	
	
	public function getcierre_contable_detalle() : ?cierre_contable_detalle {	
		/*
		cierre_contable_detalle_logic_add::checkcierre_contable_detalleToGet($this->cierre_contable_detalle,$this->datosCliente);
		cierre_contable_detalle_logic_add::updatecierre_contable_detalleToGet($this->cierre_contable_detalle);
		*/
			
		return $this->cierre_contable_detalle;
	}
		
	public function setcierre_contable_detalle(cierre_contable_detalle $newcierre_contable_detalle) {
		$this->cierre_contable_detalle = $newcierre_contable_detalle;
	}
	
	public function getcierre_contable_detalles() : array {		
		/*
		cierre_contable_detalle_logic_add::checkcierre_contable_detalleToGets($this->cierre_contable_detalles,$this->datosCliente);
		
		foreach ($this->cierre_contable_detalles as $cierre_contable_detalleLocal ) {
			cierre_contable_detalle_logic_add::updatecierre_contable_detalleToGet($cierre_contable_detalleLocal);
		}
		*/
		
		return $this->cierre_contable_detalles;
	}
	
	public function setcierre_contable_detalles(array $newcierre_contable_detalles) {
		$this->cierre_contable_detalles = $newcierre_contable_detalles;
	}
	
	public function getcierre_contable_detalleDataAccess() : cierre_contable_detalle_data {
		return $this->cierre_contable_detalleDataAccess;
	}
	
	public function setcierre_contable_detalleDataAccess(cierre_contable_detalle_data $newcierre_contable_detalleDataAccess) {
		$this->cierre_contable_detalleDataAccess = $newcierre_contable_detalleDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        cierre_contable_detalle_carga::$CONTROLLER;;        
		
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
