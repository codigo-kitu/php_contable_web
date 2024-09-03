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

namespace com\bydan\contabilidad\contabilidad\asiento_detalle\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_param_return;

use com\bydan\contabilidad\contabilidad\asiento_detalle\presentation\session\asiento_detalle_session;

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

use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_util;
use com\bydan\contabilidad\contabilidad\asiento_detalle\business\entity\asiento_detalle;
use com\bydan\contabilidad\contabilidad\asiento_detalle\business\data\asiento_detalle_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\business\data\sucursal_data;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\data\ejercicio_data;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\data\periodo_data;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\data\asiento_data;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;
use com\bydan\contabilidad\contabilidad\centro_costo\business\data\centro_costo_data;
use com\bydan\contabilidad\contabilidad\centro_costo\business\logic\centro_costo_logic;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_util;

//REL


//REL DETALLES




class asiento_detalle_logic  extends GeneralEntityLogic implements asiento_detalle_logicI {	
	/*GENERAL*/
	public asiento_detalle_data $asiento_detalleDataAccess;
	//public ?asiento_detalle_logic_add $asiento_detalleLogicAdditional=null;
	public ?asiento_detalle $asiento_detalle;
	public array $asiento_detalles;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->asiento_detalleDataAccess = new asiento_detalle_data();			
			$this->asiento_detalles = array();
			$this->asiento_detalle = new asiento_detalle();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->asiento_detalleLogicAdditional = new asiento_detalle_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->asiento_detalleLogicAdditional==null) {
		//	$this->asiento_detalleLogicAdditional=new asiento_detalle_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->asiento_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->asiento_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->asiento_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->asiento_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->asiento_detalles = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_detalles);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->asiento_detalles = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_detalles);
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
		$this->asiento_detalle = new asiento_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->asiento_detalle=$this->asiento_detalleDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->asiento_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				asiento_detalle_util::refrescarFKDescripcion($this->asiento_detalle);
			}
						
			//asiento_detalle_logic_add::checkasiento_detalleToGet($this->asiento_detalle,$this->datosCliente);
			//asiento_detalle_logic_add::updateasiento_detalleToGet($this->asiento_detalle);
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
		$this->asiento_detalle = new  asiento_detalle();
		  		  
        try {		
			$this->asiento_detalle=$this->asiento_detalleDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->asiento_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				asiento_detalle_util::refrescarFKDescripcion($this->asiento_detalle);
			}
			
			//asiento_detalle_logic_add::checkasiento_detalleToGet($this->asiento_detalle,$this->datosCliente);
			//asiento_detalle_logic_add::updateasiento_detalleToGet($this->asiento_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?asiento_detalle {
		$asiento_detalleLogic = new  asiento_detalle_logic();
		  		  
        try {		
			$asiento_detalleLogic->setConnexion($connexion);			
			$asiento_detalleLogic->getEntity($id);			
			return $asiento_detalleLogic->getasiento_detalle();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->asiento_detalle = new  asiento_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->asiento_detalle=$this->asiento_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->asiento_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				asiento_detalle_util::refrescarFKDescripcion($this->asiento_detalle);
			}
			
			//asiento_detalle_logic_add::checkasiento_detalleToGet($this->asiento_detalle,$this->datosCliente);
			//asiento_detalle_logic_add::updateasiento_detalleToGet($this->asiento_detalle);
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
		$this->asiento_detalle = new  asiento_detalle();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_detalle=$this->asiento_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->asiento_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				asiento_detalle_util::refrescarFKDescripcion($this->asiento_detalle);
			}
			
			//asiento_detalle_logic_add::checkasiento_detalleToGet($this->asiento_detalle,$this->datosCliente);
			//asiento_detalle_logic_add::updateasiento_detalleToGet($this->asiento_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?asiento_detalle {
		$asiento_detalleLogic = new  asiento_detalle_logic();
		  		  
        try {		
			$asiento_detalleLogic->setConnexion($connexion);			
			$asiento_detalleLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $asiento_detalleLogic->getasiento_detalle();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->asiento_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_detalles);			
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
		$this->asiento_detalles = array();
		  		  
        try {			
			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->asiento_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_detalles);
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
		$this->asiento_detalles = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$asiento_detalleLogic = new  asiento_detalle_logic();
		  		  
        try {		
			$asiento_detalleLogic->setConnexion($connexion);			
			$asiento_detalleLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $asiento_detalleLogic->getasiento_detalles();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->asiento_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_detalles);
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
		$this->asiento_detalles = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_detalles);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->asiento_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_detalles);
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
		$this->asiento_detalles = array();
		  		  
        try {			
			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}	
			
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->asiento_detalles = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_detalles);
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
		$this->asiento_detalles = array();
		  		  
        try {		
			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_detalles);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdasientoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_asiento) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_asiento= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_asiento->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento,asiento_detalle_util::$ID_ASIENTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento);

			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idasiento(string $strFinalQuery,Pagination $pagination,int $id_asiento) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_asiento= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_asiento->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento,asiento_detalle_util::$ID_ASIENTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento);

			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idcentro_costoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_centro_costo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_centro_costo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_centro_costo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_centro_costo,asiento_detalle_util::$ID_CENTRO_COSTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_centro_costo);

			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcentro_costo(string $strFinalQuery,Pagination $pagination,int $id_centro_costo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_centro_costo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_centro_costo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_centro_costo,asiento_detalle_util::$ID_CENTRO_COSTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_centro_costo);

			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdcuentaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cuenta) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,asiento_detalle_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta(string $strFinalQuery,Pagination $pagination,int $id_cuenta) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,asiento_detalle_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_detalles);
		} catch(Exception $e) {
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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,asiento_detalle_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_detalles);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,asiento_detalle_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_detalles);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,asiento_detalle_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_detalles);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,asiento_detalle_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_detalles);
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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,asiento_detalle_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_detalles);

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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,asiento_detalle_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdsucursalWithConnection(string $strFinalQuery,Pagination $pagination,int $id_sucursal) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sucursal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,asiento_detalle_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idsucursal(string $strFinalQuery,Pagination $pagination,int $id_sucursal) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sucursal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,asiento_detalle_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_detalles);
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,asiento_detalle_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_detalles);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,asiento_detalle_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->asiento_detalles=$this->asiento_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			//asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_detalles);
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
						
			//asiento_detalle_logic_add::checkasiento_detalleToSave($this->asiento_detalle,$this->datosCliente,$this->connexion);	       
			//asiento_detalle_logic_add::updateasiento_detalleToSave($this->asiento_detalle);			
			asiento_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->asiento_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->asiento_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->asiento_detalle,$this->datosCliente,$this->connexion);
			
			
			asiento_detalle_data::save($this->asiento_detalle, $this->connexion);	    	       	 				
			//asiento_detalle_logic_add::checkasiento_detalleToSaveAfter($this->asiento_detalle,$this->datosCliente,$this->connexion);			
			//$this->asiento_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->asiento_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->asiento_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->asiento_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				asiento_detalle_util::refrescarFKDescripcion($this->asiento_detalle);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->asiento_detalle->getIsDeleted()) {
				$this->asiento_detalle=null;
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
						
			/*asiento_detalle_logic_add::checkasiento_detalleToSave($this->asiento_detalle,$this->datosCliente,$this->connexion);*/	        
			//asiento_detalle_logic_add::updateasiento_detalleToSave($this->asiento_detalle);			
			//$this->asiento_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->asiento_detalle,$this->datosCliente,$this->connexion);			
			asiento_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->asiento_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			asiento_detalle_data::save($this->asiento_detalle, $this->connexion);	    	       	 						
			/*asiento_detalle_logic_add::checkasiento_detalleToSaveAfter($this->asiento_detalle,$this->datosCliente,$this->connexion);*/			
			//$this->asiento_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->asiento_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->asiento_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->asiento_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				asiento_detalle_util::refrescarFKDescripcion($this->asiento_detalle);				
			}
			
			if($this->asiento_detalle->getIsDeleted()) {
				$this->asiento_detalle=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(asiento_detalle $asiento_detalle,Connexion $connexion)  {
		$asiento_detalleLogic = new  asiento_detalle_logic();		  		  
        try {		
			$asiento_detalleLogic->setConnexion($connexion);			
			$asiento_detalleLogic->setasiento_detalle($asiento_detalle);			
			$asiento_detalleLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*asiento_detalle_logic_add::checkasiento_detalleToSaves($this->asiento_detalles,$this->datosCliente,$this->connexion);*/	        	
			//$this->asiento_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->asiento_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->asiento_detalles as $asiento_detalleLocal) {				
								
				//asiento_detalle_logic_add::updateasiento_detalleToSave($asiento_detalleLocal);	        	
				asiento_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$asiento_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				asiento_detalle_data::save($asiento_detalleLocal, $this->connexion);				
			}
			
			/*asiento_detalle_logic_add::checkasiento_detalleToSavesAfter($this->asiento_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->asiento_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->asiento_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
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
			/*asiento_detalle_logic_add::checkasiento_detalleToSaves($this->asiento_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->asiento_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->asiento_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->asiento_detalles as $asiento_detalleLocal) {				
								
				//asiento_detalle_logic_add::updateasiento_detalleToSave($asiento_detalleLocal);	        	
				asiento_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$asiento_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				asiento_detalle_data::save($asiento_detalleLocal, $this->connexion);				
			}			
			
			/*asiento_detalle_logic_add::checkasiento_detalleToSavesAfter($this->asiento_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->asiento_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->asiento_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $asiento_detalles,Connexion $connexion)  {
		$asiento_detalleLogic = new  asiento_detalle_logic();
		  		  
        try {		
			$asiento_detalleLogic->setConnexion($connexion);			
			$asiento_detalleLogic->setasiento_detalles($asiento_detalles);			
			$asiento_detalleLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$asiento_detallesAux=array();
		
		foreach($this->asiento_detalles as $asiento_detalle) {
			if($asiento_detalle->getIsDeleted()==false) {
				$asiento_detallesAux[]=$asiento_detalle;
			}
		}
		
		$this->asiento_detalles=$asiento_detallesAux;
	}
	
	public function updateToGetsAuxiliar(array &$asiento_detalles) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->asiento_detalles as $asiento_detalle) {
				
				$asiento_detalle->setid_empresa_Descripcion(asiento_detalle_util::getempresaDescripcion($asiento_detalle->getempresa()));
				$asiento_detalle->setid_sucursal_Descripcion(asiento_detalle_util::getsucursalDescripcion($asiento_detalle->getsucursal()));
				$asiento_detalle->setid_ejercicio_Descripcion(asiento_detalle_util::getejercicioDescripcion($asiento_detalle->getejercicio()));
				$asiento_detalle->setid_periodo_Descripcion(asiento_detalle_util::getperiodoDescripcion($asiento_detalle->getperiodo()));
				$asiento_detalle->setid_usuario_Descripcion(asiento_detalle_util::getusuarioDescripcion($asiento_detalle->getusuario()));
				$asiento_detalle->setid_asiento_Descripcion(asiento_detalle_util::getasientoDescripcion($asiento_detalle->getasiento()));
				$asiento_detalle->setid_cuenta_Descripcion(asiento_detalle_util::getcuentaDescripcion($asiento_detalle->getcuenta()));
				$asiento_detalle->setid_centro_costo_Descripcion(asiento_detalle_util::getcentro_costoDescripcion($asiento_detalle->getcentro_costo()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$asiento_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$asiento_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$asiento_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$asiento_detalleForeignKey=new asiento_detalle_param_return();//asiento_detalleForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_asiento',$strRecargarFkTipos,',')) {
				$this->cargarCombosasientosFK($this->connexion,$strRecargarFkQuery,$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTipos,',')) {
				$this->cargarComboscuentasFK($this->connexion,$strRecargarFkQuery,$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_centro_costo',$strRecargarFkTipos,',')) {
				$this->cargarComboscentro_costosFK($this->connexion,$strRecargarFkQuery,$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_asiento',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosasientosFK($this->connexion,' where id=-1 ',$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuentasFK($this->connexion,' where id=-1 ',$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_centro_costo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscentro_costosFK($this->connexion,' where id=-1 ',$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $asiento_detalleForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$asiento_detalleForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_detalle_session==null) {
			$asiento_detalle_session=new asiento_detalle_session();
		}
		
		if($asiento_detalle_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($asiento_detalleForeignKey->idempresaDefaultFK==0) {
					$asiento_detalleForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$asiento_detalleForeignKey->empresasFK[$empresaLocal->getId()]=asiento_detalle_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($asiento_detalle_session->bigidempresaActual!=null && $asiento_detalle_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($asiento_detalle_session->bigidempresaActual);//WithConnection

				$asiento_detalleForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=asiento_detalle_util::getempresaDescripcion($empresaLogic->getempresa());
				$asiento_detalleForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$asiento_detalleForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_detalle_session==null) {
			$asiento_detalle_session=new asiento_detalle_session();
		}
		
		if($asiento_detalle_session->bitBusquedaDesdeFKSesionsucursal!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=sucursal_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalsucursal=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalsucursal=Funciones::GetFinalQueryAppend($finalQueryGlobalsucursal, '');
				$finalQueryGlobalsucursal.=sucursal_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalsucursal.$strRecargarFkQuery;		

				$sucursalLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($sucursalLogic->getsucursals() as $sucursalLocal ) {
				if($asiento_detalleForeignKey->idsucursalDefaultFK==0) {
					$asiento_detalleForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$asiento_detalleForeignKey->sucursalsFK[$sucursalLocal->getId()]=asiento_detalle_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($asiento_detalle_session->bigidsucursalActual!=null && $asiento_detalle_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($asiento_detalle_session->bigidsucursalActual);//WithConnection

				$asiento_detalleForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=asiento_detalle_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$asiento_detalleForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$asiento_detalleForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_detalle_session==null) {
			$asiento_detalle_session=new asiento_detalle_session();
		}
		
		if($asiento_detalle_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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
				if($asiento_detalleForeignKey->idejercicioDefaultFK==0) {
					$asiento_detalleForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$asiento_detalleForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=asiento_detalle_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($asiento_detalle_session->bigidejercicioActual!=null && $asiento_detalle_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($asiento_detalle_session->bigidejercicioActual);//WithConnection

				$asiento_detalleForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=asiento_detalle_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$asiento_detalleForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$asiento_detalleForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_detalle_session==null) {
			$asiento_detalle_session=new asiento_detalle_session();
		}
		
		if($asiento_detalle_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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
				if($asiento_detalleForeignKey->idperiodoDefaultFK==0) {
					$asiento_detalleForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$asiento_detalleForeignKey->periodosFK[$periodoLocal->getId()]=asiento_detalle_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($asiento_detalle_session->bigidperiodoActual!=null && $asiento_detalle_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($asiento_detalle_session->bigidperiodoActual);//WithConnection

				$asiento_detalleForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=asiento_detalle_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$asiento_detalleForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$asiento_detalleForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_detalle_session==null) {
			$asiento_detalle_session=new asiento_detalle_session();
		}
		
		if($asiento_detalle_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($asiento_detalleForeignKey->idusuarioDefaultFK==0) {
					$asiento_detalleForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$asiento_detalleForeignKey->usuariosFK[$usuarioLocal->getId()]=asiento_detalle_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($asiento_detalle_session->bigidusuarioActual!=null && $asiento_detalle_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($asiento_detalle_session->bigidusuarioActual);//WithConnection

				$asiento_detalleForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=asiento_detalle_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$asiento_detalleForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosasientosFK($connexion=null,$strRecargarFkQuery='',$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$asientoLogic= new asiento_logic();
		$pagination= new Pagination();
		$asiento_detalleForeignKey->asientosFK=array();

		$asientoLogic->setConnexion($connexion);
		$asientoLogic->getasientoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_detalle_session==null) {
			$asiento_detalle_session=new asiento_detalle_session();
		}
		
		if($asiento_detalle_session->bitBusquedaDesdeFKSesionasiento!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=asiento_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalasiento=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalasiento=Funciones::GetFinalQueryAppend($finalQueryGlobalasiento, '');
				$finalQueryGlobalasiento.=asiento_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalasiento.$strRecargarFkQuery;		

				$asientoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($asientoLogic->getasientos() as $asientoLocal ) {
				if($asiento_detalleForeignKey->idasientoDefaultFK==0) {
					$asiento_detalleForeignKey->idasientoDefaultFK=$asientoLocal->getId();
				}

				$asiento_detalleForeignKey->asientosFK[$asientoLocal->getId()]=asiento_detalle_util::getasientoDescripcion($asientoLocal);
			}

		} else {

			if($asiento_detalle_session->bigidasientoActual!=null && $asiento_detalle_session->bigidasientoActual > 0) {
				$asientoLogic->getEntity($asiento_detalle_session->bigidasientoActual);//WithConnection

				$asiento_detalleForeignKey->asientosFK[$asientoLogic->getasiento()->getId()]=asiento_detalle_util::getasientoDescripcion($asientoLogic->getasiento());
				$asiento_detalleForeignKey->idasientoDefaultFK=$asientoLogic->getasiento()->getId();
			}
		}
	}

	public function cargarComboscuentasFK($connexion=null,$strRecargarFkQuery='',$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$asiento_detalleForeignKey->cuentasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_detalle_session==null) {
			$asiento_detalle_session=new asiento_detalle_session();
		}
		
		if($asiento_detalle_session->bitBusquedaDesdeFKSesioncuenta!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcuenta=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta, '');
				$finalQueryGlobalcuenta.=cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta.$strRecargarFkQuery;		

				$cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($cuentaLogic->getcuentas() as $cuentaLocal ) {
				if($asiento_detalleForeignKey->idcuentaDefaultFK==0) {
					$asiento_detalleForeignKey->idcuentaDefaultFK=$cuentaLocal->getId();
				}

				$asiento_detalleForeignKey->cuentasFK[$cuentaLocal->getId()]=asiento_detalle_util::getcuentaDescripcion($cuentaLocal);
			}

		} else {

			if($asiento_detalle_session->bigidcuentaActual!=null && $asiento_detalle_session->bigidcuentaActual > 0) {
				$cuentaLogic->getEntity($asiento_detalle_session->bigidcuentaActual);//WithConnection

				$asiento_detalleForeignKey->cuentasFK[$cuentaLogic->getcuenta()->getId()]=asiento_detalle_util::getcuentaDescripcion($cuentaLogic->getcuenta());
				$asiento_detalleForeignKey->idcuentaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarComboscentro_costosFK($connexion=null,$strRecargarFkQuery='',$asiento_detalleForeignKey,$asiento_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$centro_costoLogic= new centro_costo_logic();
		$pagination= new Pagination();
		$asiento_detalleForeignKey->centro_costosFK=array();

		$centro_costoLogic->setConnexion($connexion);
		$centro_costoLogic->getcentro_costoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_detalle_session==null) {
			$asiento_detalle_session=new asiento_detalle_session();
		}
		
		if($asiento_detalle_session->bitBusquedaDesdeFKSesioncentro_costo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=centro_costo_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcentro_costo=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcentro_costo=Funciones::GetFinalQueryAppend($finalQueryGlobalcentro_costo, '');
				$finalQueryGlobalcentro_costo.=centro_costo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcentro_costo.$strRecargarFkQuery;		

				$centro_costoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($centro_costoLogic->getcentro_costos() as $centro_costoLocal ) {
				if($asiento_detalleForeignKey->idcentro_costoDefaultFK==0) {
					$asiento_detalleForeignKey->idcentro_costoDefaultFK=$centro_costoLocal->getId();
				}

				$asiento_detalleForeignKey->centro_costosFK[$centro_costoLocal->getId()]=asiento_detalle_util::getcentro_costoDescripcion($centro_costoLocal);
			}

		} else {

			if($asiento_detalle_session->bigidcentro_costoActual!=null && $asiento_detalle_session->bigidcentro_costoActual > 0) {
				$centro_costoLogic->getEntity($asiento_detalle_session->bigidcentro_costoActual);//WithConnection

				$asiento_detalleForeignKey->centro_costosFK[$centro_costoLogic->getcentro_costo()->getId()]=asiento_detalle_util::getcentro_costoDescripcion($centro_costoLogic->getcentro_costo());
				$asiento_detalleForeignKey->idcentro_costoDefaultFK=$centro_costoLogic->getcentro_costo()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($asiento_detalle) {
		$this->saveRelacionesBase($asiento_detalle,true);
	}

	public function saveRelaciones($asiento_detalle) {
		$this->saveRelacionesBase($asiento_detalle,false);
	}

	public function saveRelacionesBase($asiento_detalle,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setasiento_detalle($asiento_detalle);

			if(true) {

				//asiento_detalle_logic_add::updateRelacionesToSave($asiento_detalle,$this);

				if(($this->asiento_detalle->getIsNew() || $this->asiento_detalle->getIsChanged()) && !$this->asiento_detalle->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->asiento_detalle->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//asiento_detalle_logic_add::updateRelacionesToSaveAfter($asiento_detalle,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $asiento_detalles,asiento_detalle_param_return $asiento_detalleParameterGeneral) : asiento_detalle_param_return {
		$asiento_detalleReturnGeneral=new asiento_detalle_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $asiento_detalleReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $asiento_detalles,asiento_detalle_param_return $asiento_detalleParameterGeneral) : asiento_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$asiento_detalleReturnGeneral=new asiento_detalle_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $asiento_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $asiento_detalles,asiento_detalle $asiento_detalle,asiento_detalle_param_return $asiento_detalleParameterGeneral,bool $isEsNuevoasiento_detalle,array $clases) : asiento_detalle_param_return {
		 try {	
			$asiento_detalleReturnGeneral=new asiento_detalle_param_return();
	
			$asiento_detalleReturnGeneral->setasiento_detalle($asiento_detalle);
			$asiento_detalleReturnGeneral->setasiento_detalles($asiento_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$asiento_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $asiento_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $asiento_detalles,asiento_detalle $asiento_detalle,asiento_detalle_param_return $asiento_detalleParameterGeneral,bool $isEsNuevoasiento_detalle,array $clases) : asiento_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$asiento_detalleReturnGeneral=new asiento_detalle_param_return();
	
			$asiento_detalleReturnGeneral->setasiento_detalle($asiento_detalle);
			$asiento_detalleReturnGeneral->setasiento_detalles($asiento_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$asiento_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $asiento_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $asiento_detalles,asiento_detalle $asiento_detalle,asiento_detalle_param_return $asiento_detalleParameterGeneral,bool $isEsNuevoasiento_detalle,array $clases) : asiento_detalle_param_return {
		 try {	
			$asiento_detalleReturnGeneral=new asiento_detalle_param_return();
	
			$asiento_detalleReturnGeneral->setasiento_detalle($asiento_detalle);
			$asiento_detalleReturnGeneral->setasiento_detalles($asiento_detalles);
			
			
			
			return $asiento_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $asiento_detalles,asiento_detalle $asiento_detalle,asiento_detalle_param_return $asiento_detalleParameterGeneral,bool $isEsNuevoasiento_detalle,array $clases) : asiento_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$asiento_detalleReturnGeneral=new asiento_detalle_param_return();
	
			$asiento_detalleReturnGeneral->setasiento_detalle($asiento_detalle);
			$asiento_detalleReturnGeneral->setasiento_detalles($asiento_detalles);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $asiento_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,asiento_detalle $asiento_detalle,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,asiento_detalle $asiento_detalle,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		asiento_detalle_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(asiento_detalle $asiento_detalle,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//asiento_detalle_logic_add::updateasiento_detalleToGet($this->asiento_detalle);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$asiento_detalle->setempresa($this->asiento_detalleDataAccess->getempresa($this->connexion,$asiento_detalle));
		$asiento_detalle->setsucursal($this->asiento_detalleDataAccess->getsucursal($this->connexion,$asiento_detalle));
		$asiento_detalle->setejercicio($this->asiento_detalleDataAccess->getejercicio($this->connexion,$asiento_detalle));
		$asiento_detalle->setperiodo($this->asiento_detalleDataAccess->getperiodo($this->connexion,$asiento_detalle));
		$asiento_detalle->setusuario($this->asiento_detalleDataAccess->getusuario($this->connexion,$asiento_detalle));
		$asiento_detalle->setasiento($this->asiento_detalleDataAccess->getasiento($this->connexion,$asiento_detalle));
		$asiento_detalle->setcuenta($this->asiento_detalleDataAccess->getcuenta($this->connexion,$asiento_detalle));
		$asiento_detalle->setcentro_costo($this->asiento_detalleDataAccess->getcentro_costo($this->connexion,$asiento_detalle));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$asiento_detalle->setempresa($this->asiento_detalleDataAccess->getempresa($this->connexion,$asiento_detalle));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$asiento_detalle->setsucursal($this->asiento_detalleDataAccess->getsucursal($this->connexion,$asiento_detalle));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$asiento_detalle->setejercicio($this->asiento_detalleDataAccess->getejercicio($this->connexion,$asiento_detalle));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$asiento_detalle->setperiodo($this->asiento_detalleDataAccess->getperiodo($this->connexion,$asiento_detalle));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$asiento_detalle->setusuario($this->asiento_detalleDataAccess->getusuario($this->connexion,$asiento_detalle));
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				$asiento_detalle->setasiento($this->asiento_detalleDataAccess->getasiento($this->connexion,$asiento_detalle));
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$asiento_detalle->setcuenta($this->asiento_detalleDataAccess->getcuenta($this->connexion,$asiento_detalle));
				continue;
			}

			if($clas->clas==centro_costo::$class.'') {
				$asiento_detalle->setcentro_costo($this->asiento_detalleDataAccess->getcentro_costo($this->connexion,$asiento_detalle));
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
			$asiento_detalle->setempresa($this->asiento_detalleDataAccess->getempresa($this->connexion,$asiento_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_detalle->setsucursal($this->asiento_detalleDataAccess->getsucursal($this->connexion,$asiento_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_detalle->setejercicio($this->asiento_detalleDataAccess->getejercicio($this->connexion,$asiento_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_detalle->setperiodo($this->asiento_detalleDataAccess->getperiodo($this->connexion,$asiento_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_detalle->setusuario($this->asiento_detalleDataAccess->getusuario($this->connexion,$asiento_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_detalle->setasiento($this->asiento_detalleDataAccess->getasiento($this->connexion,$asiento_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_detalle->setcuenta($this->asiento_detalleDataAccess->getcuenta($this->connexion,$asiento_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==centro_costo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_detalle->setcentro_costo($this->asiento_detalleDataAccess->getcentro_costo($this->connexion,$asiento_detalle));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$asiento_detalle->setempresa($this->asiento_detalleDataAccess->getempresa($this->connexion,$asiento_detalle));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($asiento_detalle->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$asiento_detalle->setsucursal($this->asiento_detalleDataAccess->getsucursal($this->connexion,$asiento_detalle));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($asiento_detalle->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$asiento_detalle->setejercicio($this->asiento_detalleDataAccess->getejercicio($this->connexion,$asiento_detalle));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($asiento_detalle->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$asiento_detalle->setperiodo($this->asiento_detalleDataAccess->getperiodo($this->connexion,$asiento_detalle));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($asiento_detalle->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$asiento_detalle->setusuario($this->asiento_detalleDataAccess->getusuario($this->connexion,$asiento_detalle));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($asiento_detalle->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$asiento_detalle->setasiento($this->asiento_detalleDataAccess->getasiento($this->connexion,$asiento_detalle));
		$asientoLogic= new asiento_logic($this->connexion);
		$asientoLogic->deepLoad($asiento_detalle->getasiento(),$isDeep,$deepLoadType,$clases);
				
		$asiento_detalle->setcuenta($this->asiento_detalleDataAccess->getcuenta($this->connexion,$asiento_detalle));
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepLoad($asiento_detalle->getcuenta(),$isDeep,$deepLoadType,$clases);
				
		$asiento_detalle->setcentro_costo($this->asiento_detalleDataAccess->getcentro_costo($this->connexion,$asiento_detalle));
		$centro_costoLogic= new centro_costo_logic($this->connexion);
		$centro_costoLogic->deepLoad($asiento_detalle->getcentro_costo(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$asiento_detalle->setempresa($this->asiento_detalleDataAccess->getempresa($this->connexion,$asiento_detalle));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($asiento_detalle->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$asiento_detalle->setsucursal($this->asiento_detalleDataAccess->getsucursal($this->connexion,$asiento_detalle));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($asiento_detalle->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$asiento_detalle->setejercicio($this->asiento_detalleDataAccess->getejercicio($this->connexion,$asiento_detalle));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($asiento_detalle->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$asiento_detalle->setperiodo($this->asiento_detalleDataAccess->getperiodo($this->connexion,$asiento_detalle));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($asiento_detalle->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$asiento_detalle->setusuario($this->asiento_detalleDataAccess->getusuario($this->connexion,$asiento_detalle));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($asiento_detalle->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				$asiento_detalle->setasiento($this->asiento_detalleDataAccess->getasiento($this->connexion,$asiento_detalle));
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepLoad($asiento_detalle->getasiento(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$asiento_detalle->setcuenta($this->asiento_detalleDataAccess->getcuenta($this->connexion,$asiento_detalle));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($asiento_detalle->getcuenta(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==centro_costo::$class.'') {
				$asiento_detalle->setcentro_costo($this->asiento_detalleDataAccess->getcentro_costo($this->connexion,$asiento_detalle));
				$centro_costoLogic= new centro_costo_logic($this->connexion);
				$centro_costoLogic->deepLoad($asiento_detalle->getcentro_costo(),$isDeep,$deepLoadType,$clases);				
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
			$asiento_detalle->setempresa($this->asiento_detalleDataAccess->getempresa($this->connexion,$asiento_detalle));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($asiento_detalle->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_detalle->setsucursal($this->asiento_detalleDataAccess->getsucursal($this->connexion,$asiento_detalle));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($asiento_detalle->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_detalle->setejercicio($this->asiento_detalleDataAccess->getejercicio($this->connexion,$asiento_detalle));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($asiento_detalle->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_detalle->setperiodo($this->asiento_detalleDataAccess->getperiodo($this->connexion,$asiento_detalle));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($asiento_detalle->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_detalle->setusuario($this->asiento_detalleDataAccess->getusuario($this->connexion,$asiento_detalle));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($asiento_detalle->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_detalle->setasiento($this->asiento_detalleDataAccess->getasiento($this->connexion,$asiento_detalle));
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepLoad($asiento_detalle->getasiento(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_detalle->setcuenta($this->asiento_detalleDataAccess->getcuenta($this->connexion,$asiento_detalle));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($asiento_detalle->getcuenta(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==centro_costo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_detalle->setcentro_costo($this->asiento_detalleDataAccess->getcentro_costo($this->connexion,$asiento_detalle));
			$centro_costoLogic= new centro_costo_logic($this->connexion);
			$centro_costoLogic->deepLoad($asiento_detalle->getcentro_costo(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(asiento_detalle $asiento_detalle,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//asiento_detalle_logic_add::updateasiento_detalleToSave($this->asiento_detalle);			
			
			if(!$paraDeleteCascade) {				
				asiento_detalle_data::save($asiento_detalle, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($asiento_detalle->getempresa(),$this->connexion);
		sucursal_data::save($asiento_detalle->getsucursal(),$this->connexion);
		ejercicio_data::save($asiento_detalle->getejercicio(),$this->connexion);
		periodo_data::save($asiento_detalle->getperiodo(),$this->connexion);
		usuario_data::save($asiento_detalle->getusuario(),$this->connexion);
		asiento_data::save($asiento_detalle->getasiento(),$this->connexion);
		cuenta_data::save($asiento_detalle->getcuenta(),$this->connexion);
		centro_costo_data::save($asiento_detalle->getcentro_costo(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($asiento_detalle->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($asiento_detalle->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($asiento_detalle->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($asiento_detalle->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($asiento_detalle->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				asiento_data::save($asiento_detalle->getasiento(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($asiento_detalle->getcuenta(),$this->connexion);
				continue;
			}

			if($clas->clas==centro_costo::$class.'') {
				centro_costo_data::save($asiento_detalle->getcentro_costo(),$this->connexion);
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
			empresa_data::save($asiento_detalle->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($asiento_detalle->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($asiento_detalle->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($asiento_detalle->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($asiento_detalle->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_data::save($asiento_detalle->getasiento(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($asiento_detalle->getcuenta(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==centro_costo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			centro_costo_data::save($asiento_detalle->getcentro_costo(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($asiento_detalle->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($asiento_detalle->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($asiento_detalle->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($asiento_detalle->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($asiento_detalle->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($asiento_detalle->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($asiento_detalle->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($asiento_detalle->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($asiento_detalle->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($asiento_detalle->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		asiento_data::save($asiento_detalle->getasiento(),$this->connexion);
		$asientoLogic= new asiento_logic($this->connexion);
		$asientoLogic->deepSave($asiento_detalle->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($asiento_detalle->getcuenta(),$this->connexion);
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepSave($asiento_detalle->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		centro_costo_data::save($asiento_detalle->getcentro_costo(),$this->connexion);
		$centro_costoLogic= new centro_costo_logic($this->connexion);
		$centro_costoLogic->deepSave($asiento_detalle->getcentro_costo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($asiento_detalle->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($asiento_detalle->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($asiento_detalle->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($asiento_detalle->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($asiento_detalle->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($asiento_detalle->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($asiento_detalle->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($asiento_detalle->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($asiento_detalle->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($asiento_detalle->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				asiento_data::save($asiento_detalle->getasiento(),$this->connexion);
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepSave($asiento_detalle->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($asiento_detalle->getcuenta(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($asiento_detalle->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==centro_costo::$class.'') {
				centro_costo_data::save($asiento_detalle->getcentro_costo(),$this->connexion);
				$centro_costoLogic= new centro_costo_logic($this->connexion);
				$centro_costoLogic->deepSave($asiento_detalle->getcentro_costo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			empresa_data::save($asiento_detalle->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($asiento_detalle->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($asiento_detalle->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($asiento_detalle->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($asiento_detalle->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($asiento_detalle->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($asiento_detalle->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($asiento_detalle->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($asiento_detalle->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($asiento_detalle->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_data::save($asiento_detalle->getasiento(),$this->connexion);
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepSave($asiento_detalle->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($asiento_detalle->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($asiento_detalle->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==centro_costo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			centro_costo_data::save($asiento_detalle->getcentro_costo(),$this->connexion);
			$centro_costoLogic= new centro_costo_logic($this->connexion);
			$centro_costoLogic->deepSave($asiento_detalle->getcentro_costo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				asiento_detalle_data::save($asiento_detalle, $this->connexion);
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
			
			$this->deepLoad($this->asiento_detalle,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->asiento_detalles as $asiento_detalle) {
				$this->deepLoad($asiento_detalle,$isDeep,$deepLoadType,$clases);
								
				asiento_detalle_util::refrescarFKDescripciones($this->asiento_detalles);
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
			
			foreach($this->asiento_detalles as $asiento_detalle) {
				$this->deepLoad($asiento_detalle,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->asiento_detalle,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->asiento_detalles as $asiento_detalle) {
				$this->deepSave($asiento_detalle,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->asiento_detalles as $asiento_detalle) {
				$this->deepSave($asiento_detalle,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(sucursal::$class);
				$classes[]=new Classe(ejercicio::$class);
				$classes[]=new Classe(periodo::$class);
				$classes[]=new Classe(usuario::$class);
				$classes[]=new Classe(asiento::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(centro_costo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==sucursal::$class) {
						$classes[]=new Classe(sucursal::$class);
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

				foreach($classesP as $clas)
				{
					if($clas->clas==usuario::$class) {
						$classes[]=new Classe(usuario::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==asiento::$class) {
						$classes[]=new Classe(asiento::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==centro_costo::$class) {
						$classes[]=new Classe(centro_costo::$class);
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
					if($clas->clas==sucursal::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(sucursal::$class);
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
					if($clas->clas==asiento::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==centro_costo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(centro_costo::$class);
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
	
	
	
	
	
	
	
	public function getasiento_detalle() : ?asiento_detalle {	
		/*
		asiento_detalle_logic_add::checkasiento_detalleToGet($this->asiento_detalle,$this->datosCliente);
		asiento_detalle_logic_add::updateasiento_detalleToGet($this->asiento_detalle);
		*/
			
		return $this->asiento_detalle;
	}
		
	public function setasiento_detalle(asiento_detalle $newasiento_detalle) {
		$this->asiento_detalle = $newasiento_detalle;
	}
	
	public function getasiento_detalles() : array {		
		/*
		asiento_detalle_logic_add::checkasiento_detalleToGets($this->asiento_detalles,$this->datosCliente);
		
		foreach ($this->asiento_detalles as $asiento_detalleLocal ) {
			asiento_detalle_logic_add::updateasiento_detalleToGet($asiento_detalleLocal);
		}
		*/
		
		return $this->asiento_detalles;
	}
	
	public function setasiento_detalles(array $newasiento_detalles) {
		$this->asiento_detalles = $newasiento_detalles;
	}
	
	public function getasiento_detalleDataAccess() : asiento_detalle_data {
		return $this->asiento_detalleDataAccess;
	}
	
	public function setasiento_detalleDataAccess(asiento_detalle_data $newasiento_detalleDataAccess) {
		$this->asiento_detalleDataAccess = $newasiento_detalleDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        asiento_detalle_carga::$CONTROLLER;;        
		
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
