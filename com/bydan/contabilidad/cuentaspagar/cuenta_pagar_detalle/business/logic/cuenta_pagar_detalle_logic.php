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

namespace com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\util\cuenta_pagar_detalle_carga;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\util\cuenta_pagar_detalle_param_return;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\presentation\session\cuenta_pagar_detalle_session;

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

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\util\cuenta_pagar_detalle_util;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\business\entity\cuenta_pagar_detalle;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\business\data\cuenta_pagar_detalle_data;

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

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\data\cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\logic\cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\data\estado_data;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL


//REL DETALLES




class cuenta_pagar_detalle_logic  extends GeneralEntityLogic implements cuenta_pagar_detalle_logicI {	
	/*GENERAL*/
	public cuenta_pagar_detalle_data $cuenta_pagar_detalleDataAccess;
	//public ?cuenta_pagar_detalle_logic_add $cuenta_pagar_detalleLogicAdditional=null;
	public ?cuenta_pagar_detalle $cuenta_pagar_detalle;
	public array $cuenta_pagar_detalles;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->cuenta_pagar_detalleDataAccess = new cuenta_pagar_detalle_data();			
			$this->cuenta_pagar_detalles = array();
			$this->cuenta_pagar_detalle = new cuenta_pagar_detalle();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->cuenta_pagar_detalleLogicAdditional = new cuenta_pagar_detalle_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->cuenta_pagar_detalleLogicAdditional==null) {
		//	$this->cuenta_pagar_detalleLogicAdditional=new cuenta_pagar_detalle_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->cuenta_pagar_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->cuenta_pagar_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->cuenta_pagar_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->cuenta_pagar_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->cuenta_pagar_detalles = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->cuenta_pagar_detalles = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);
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
		$this->cuenta_pagar_detalle = new cuenta_pagar_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->cuenta_pagar_detalle=$this->cuenta_pagar_detalleDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_pagar_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_pagar_detalle_util::refrescarFKDescripcion($this->cuenta_pagar_detalle);
			}
						
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGet($this->cuenta_pagar_detalle,$this->datosCliente);
			//cuenta_pagar_detalle_logic_add::updatecuenta_pagar_detalleToGet($this->cuenta_pagar_detalle);
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
		$this->cuenta_pagar_detalle = new  cuenta_pagar_detalle();
		  		  
        try {		
			$this->cuenta_pagar_detalle=$this->cuenta_pagar_detalleDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_pagar_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_pagar_detalle_util::refrescarFKDescripcion($this->cuenta_pagar_detalle);
			}
			
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGet($this->cuenta_pagar_detalle,$this->datosCliente);
			//cuenta_pagar_detalle_logic_add::updatecuenta_pagar_detalleToGet($this->cuenta_pagar_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?cuenta_pagar_detalle {
		$cuenta_pagar_detalleLogic = new  cuenta_pagar_detalle_logic();
		  		  
        try {		
			$cuenta_pagar_detalleLogic->setConnexion($connexion);			
			$cuenta_pagar_detalleLogic->getEntity($id);			
			return $cuenta_pagar_detalleLogic->getcuenta_pagar_detalle();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->cuenta_pagar_detalle = new  cuenta_pagar_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->cuenta_pagar_detalle=$this->cuenta_pagar_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_pagar_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_pagar_detalle_util::refrescarFKDescripcion($this->cuenta_pagar_detalle);
			}
			
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGet($this->cuenta_pagar_detalle,$this->datosCliente);
			//cuenta_pagar_detalle_logic_add::updatecuenta_pagar_detalleToGet($this->cuenta_pagar_detalle);
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
		$this->cuenta_pagar_detalle = new  cuenta_pagar_detalle();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_pagar_detalle=$this->cuenta_pagar_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_pagar_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_pagar_detalle_util::refrescarFKDescripcion($this->cuenta_pagar_detalle);
			}
			
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGet($this->cuenta_pagar_detalle,$this->datosCliente);
			//cuenta_pagar_detalle_logic_add::updatecuenta_pagar_detalleToGet($this->cuenta_pagar_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?cuenta_pagar_detalle {
		$cuenta_pagar_detalleLogic = new  cuenta_pagar_detalle_logic();
		  		  
        try {		
			$cuenta_pagar_detalleLogic->setConnexion($connexion);			
			$cuenta_pagar_detalleLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $cuenta_pagar_detalleLogic->getcuenta_pagar_detalle();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cuenta_pagar_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);			
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
		$this->cuenta_pagar_detalles = array();
		  		  
        try {			
			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->cuenta_pagar_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);
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
		$this->cuenta_pagar_detalles = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$cuenta_pagar_detalleLogic = new  cuenta_pagar_detalle_logic();
		  		  
        try {		
			$cuenta_pagar_detalleLogic->setConnexion($connexion);			
			$cuenta_pagar_detalleLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $cuenta_pagar_detalleLogic->getcuenta_pagar_detalles();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->cuenta_pagar_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);
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
		$this->cuenta_pagar_detalles = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->cuenta_pagar_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);
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
		$this->cuenta_pagar_detalles = array();
		  		  
        try {			
			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}	
			
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cuenta_pagar_detalles = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);
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
		$this->cuenta_pagar_detalles = array();
		  		  
        try {		
			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_Idcuenta_pagarWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cuenta_pagar) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_pagar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_pagar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_pagar,cuenta_pagar_detalle_util::$ID_CUENTA_PAGAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_pagar);

			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta_pagar(string $strFinalQuery,Pagination $pagination,int $id_cuenta_pagar) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_pagar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_pagar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_pagar,cuenta_pagar_detalle_util::$ID_CUENTA_PAGAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_pagar);

			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);
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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,cuenta_pagar_detalle_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,cuenta_pagar_detalle_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cuenta_pagar_detalle_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cuenta_pagar_detalle_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdestadoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_estado) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estado= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,cuenta_pagar_detalle_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idestado(string $strFinalQuery,Pagination $pagination,int $id_estado) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estado= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,cuenta_pagar_detalle_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);
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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,cuenta_pagar_detalle_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);

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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,cuenta_pagar_detalle_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);
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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,cuenta_pagar_detalle_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);

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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,cuenta_pagar_detalle_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,cuenta_pagar_detalle_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,cuenta_pagar_detalle_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->cuenta_pagar_detalles=$this->cuenta_pagar_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagar_detalles);
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
						
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToSave($this->cuenta_pagar_detalle,$this->datosCliente,$this->connexion);	       
			//cuenta_pagar_detalle_logic_add::updatecuenta_pagar_detalleToSave($this->cuenta_pagar_detalle);			
			cuenta_pagar_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cuenta_pagar_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->cuenta_pagar_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->cuenta_pagar_detalle,$this->datosCliente,$this->connexion);
			
			
			cuenta_pagar_detalle_data::save($this->cuenta_pagar_detalle, $this->connexion);	    	       	 				
			//cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToSaveAfter($this->cuenta_pagar_detalle,$this->datosCliente,$this->connexion);			
			//$this->cuenta_pagar_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cuenta_pagar_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cuenta_pagar_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cuenta_pagar_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cuenta_pagar_detalle_util::refrescarFKDescripcion($this->cuenta_pagar_detalle);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->cuenta_pagar_detalle->getIsDeleted()) {
				$this->cuenta_pagar_detalle=null;
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
						
			/*cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToSave($this->cuenta_pagar_detalle,$this->datosCliente,$this->connexion);*/	        
			//cuenta_pagar_detalle_logic_add::updatecuenta_pagar_detalleToSave($this->cuenta_pagar_detalle);			
			//$this->cuenta_pagar_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->cuenta_pagar_detalle,$this->datosCliente,$this->connexion);			
			cuenta_pagar_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cuenta_pagar_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			cuenta_pagar_detalle_data::save($this->cuenta_pagar_detalle, $this->connexion);	    	       	 						
			/*cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToSaveAfter($this->cuenta_pagar_detalle,$this->datosCliente,$this->connexion);*/			
			//$this->cuenta_pagar_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cuenta_pagar_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cuenta_pagar_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cuenta_pagar_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cuenta_pagar_detalle_util::refrescarFKDescripcion($this->cuenta_pagar_detalle);				
			}
			
			if($this->cuenta_pagar_detalle->getIsDeleted()) {
				$this->cuenta_pagar_detalle=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(cuenta_pagar_detalle $cuenta_pagar_detalle,Connexion $connexion)  {
		$cuenta_pagar_detalleLogic = new  cuenta_pagar_detalle_logic();		  		  
        try {		
			$cuenta_pagar_detalleLogic->setConnexion($connexion);			
			$cuenta_pagar_detalleLogic->setcuenta_pagar_detalle($cuenta_pagar_detalle);			
			$cuenta_pagar_detalleLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToSaves($this->cuenta_pagar_detalles,$this->datosCliente,$this->connexion);*/	        	
			//$this->cuenta_pagar_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cuenta_pagar_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cuenta_pagar_detalles as $cuenta_pagar_detalleLocal) {				
								
				//cuenta_pagar_detalle_logic_add::updatecuenta_pagar_detalleToSave($cuenta_pagar_detalleLocal);	        	
				cuenta_pagar_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cuenta_pagar_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				cuenta_pagar_detalle_data::save($cuenta_pagar_detalleLocal, $this->connexion);				
			}
			
			/*cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToSavesAfter($this->cuenta_pagar_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->cuenta_pagar_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cuenta_pagar_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
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
			/*cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToSaves($this->cuenta_pagar_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->cuenta_pagar_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cuenta_pagar_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cuenta_pagar_detalles as $cuenta_pagar_detalleLocal) {				
								
				//cuenta_pagar_detalle_logic_add::updatecuenta_pagar_detalleToSave($cuenta_pagar_detalleLocal);	        	
				cuenta_pagar_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cuenta_pagar_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				cuenta_pagar_detalle_data::save($cuenta_pagar_detalleLocal, $this->connexion);				
			}			
			
			/*cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToSavesAfter($this->cuenta_pagar_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->cuenta_pagar_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cuenta_pagar_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $cuenta_pagar_detalles,Connexion $connexion)  {
		$cuenta_pagar_detalleLogic = new  cuenta_pagar_detalle_logic();
		  		  
        try {		
			$cuenta_pagar_detalleLogic->setConnexion($connexion);			
			$cuenta_pagar_detalleLogic->setcuenta_pagar_detalles($cuenta_pagar_detalles);			
			$cuenta_pagar_detalleLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$cuenta_pagar_detallesAux=array();
		
		foreach($this->cuenta_pagar_detalles as $cuenta_pagar_detalle) {
			if($cuenta_pagar_detalle->getIsDeleted()==false) {
				$cuenta_pagar_detallesAux[]=$cuenta_pagar_detalle;
			}
		}
		
		$this->cuenta_pagar_detalles=$cuenta_pagar_detallesAux;
	}
	
	public function updateToGetsAuxiliar(array &$cuenta_pagar_detalles) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->cuenta_pagar_detalles as $cuenta_pagar_detalle) {
				
				$cuenta_pagar_detalle->setid_empresa_Descripcion(cuenta_pagar_detalle_util::getempresaDescripcion($cuenta_pagar_detalle->getempresa()));
				$cuenta_pagar_detalle->setid_sucursal_Descripcion(cuenta_pagar_detalle_util::getsucursalDescripcion($cuenta_pagar_detalle->getsucursal()));
				$cuenta_pagar_detalle->setid_ejercicio_Descripcion(cuenta_pagar_detalle_util::getejercicioDescripcion($cuenta_pagar_detalle->getejercicio()));
				$cuenta_pagar_detalle->setid_periodo_Descripcion(cuenta_pagar_detalle_util::getperiodoDescripcion($cuenta_pagar_detalle->getperiodo()));
				$cuenta_pagar_detalle->setid_usuario_Descripcion(cuenta_pagar_detalle_util::getusuarioDescripcion($cuenta_pagar_detalle->getusuario()));
				$cuenta_pagar_detalle->setid_cuenta_pagar_Descripcion(cuenta_pagar_detalle_util::getcuenta_pagarDescripcion($cuenta_pagar_detalle->getcuenta_pagar()));
				$cuenta_pagar_detalle->setid_estado_Descripcion(cuenta_pagar_detalle_util::getestadoDescripcion($cuenta_pagar_detalle->getestado()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cuenta_pagar_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cuenta_pagar_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cuenta_pagar_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$cuenta_pagar_detalleForeignKey=new cuenta_pagar_detalle_param_return();//cuenta_pagar_detalleForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$cuenta_pagar_detalleForeignKey,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$cuenta_pagar_detalleForeignKey,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$cuenta_pagar_detalleForeignKey,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$cuenta_pagar_detalleForeignKey,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$cuenta_pagar_detalleForeignKey,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_pagar',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_pagarsFK($this->connexion,$strRecargarFkQuery,$cuenta_pagar_detalleForeignKey,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado',$strRecargarFkTipos,',')) {
				$this->cargarCombosestadosFK($this->connexion,$strRecargarFkQuery,$cuenta_pagar_detalleForeignKey,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$cuenta_pagar_detalleForeignKey,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$cuenta_pagar_detalleForeignKey,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$cuenta_pagar_detalleForeignKey,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$cuenta_pagar_detalleForeignKey,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$cuenta_pagar_detalleForeignKey,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_pagar',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_pagarsFK($this->connexion,' where id=-1 ',$cuenta_pagar_detalleForeignKey,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_estado',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosestadosFK($this->connexion,' where id=-1 ',$cuenta_pagar_detalleForeignKey,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $cuenta_pagar_detalleForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$cuenta_pagar_detalleForeignKey,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$cuenta_pagar_detalleForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_pagar_detalle_session==null) {
			$cuenta_pagar_detalle_session=new cuenta_pagar_detalle_session();
		}
		
		if($cuenta_pagar_detalle_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($cuenta_pagar_detalleForeignKey->idempresaDefaultFK==0) {
					$cuenta_pagar_detalleForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$cuenta_pagar_detalleForeignKey->empresasFK[$empresaLocal->getId()]=cuenta_pagar_detalle_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($cuenta_pagar_detalle_session->bigidempresaActual!=null && $cuenta_pagar_detalle_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cuenta_pagar_detalle_session->bigidempresaActual);//WithConnection

				$cuenta_pagar_detalleForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=cuenta_pagar_detalle_util::getempresaDescripcion($empresaLogic->getempresa());
				$cuenta_pagar_detalleForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$cuenta_pagar_detalleForeignKey,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$cuenta_pagar_detalleForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_pagar_detalle_session==null) {
			$cuenta_pagar_detalle_session=new cuenta_pagar_detalle_session();
		}
		
		if($cuenta_pagar_detalle_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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
				if($cuenta_pagar_detalleForeignKey->idsucursalDefaultFK==0) {
					$cuenta_pagar_detalleForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$cuenta_pagar_detalleForeignKey->sucursalsFK[$sucursalLocal->getId()]=cuenta_pagar_detalle_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($cuenta_pagar_detalle_session->bigidsucursalActual!=null && $cuenta_pagar_detalle_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($cuenta_pagar_detalle_session->bigidsucursalActual);//WithConnection

				$cuenta_pagar_detalleForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=cuenta_pagar_detalle_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$cuenta_pagar_detalleForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$cuenta_pagar_detalleForeignKey,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$cuenta_pagar_detalleForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_pagar_detalle_session==null) {
			$cuenta_pagar_detalle_session=new cuenta_pagar_detalle_session();
		}
		
		if($cuenta_pagar_detalle_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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
				if($cuenta_pagar_detalleForeignKey->idejercicioDefaultFK==0) {
					$cuenta_pagar_detalleForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$cuenta_pagar_detalleForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=cuenta_pagar_detalle_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($cuenta_pagar_detalle_session->bigidejercicioActual!=null && $cuenta_pagar_detalle_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($cuenta_pagar_detalle_session->bigidejercicioActual);//WithConnection

				$cuenta_pagar_detalleForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=cuenta_pagar_detalle_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$cuenta_pagar_detalleForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$cuenta_pagar_detalleForeignKey,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$cuenta_pagar_detalleForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_pagar_detalle_session==null) {
			$cuenta_pagar_detalle_session=new cuenta_pagar_detalle_session();
		}
		
		if($cuenta_pagar_detalle_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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
				if($cuenta_pagar_detalleForeignKey->idperiodoDefaultFK==0) {
					$cuenta_pagar_detalleForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$cuenta_pagar_detalleForeignKey->periodosFK[$periodoLocal->getId()]=cuenta_pagar_detalle_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($cuenta_pagar_detalle_session->bigidperiodoActual!=null && $cuenta_pagar_detalle_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($cuenta_pagar_detalle_session->bigidperiodoActual);//WithConnection

				$cuenta_pagar_detalleForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=cuenta_pagar_detalle_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$cuenta_pagar_detalleForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$cuenta_pagar_detalleForeignKey,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$cuenta_pagar_detalleForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_pagar_detalle_session==null) {
			$cuenta_pagar_detalle_session=new cuenta_pagar_detalle_session();
		}
		
		if($cuenta_pagar_detalle_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($cuenta_pagar_detalleForeignKey->idusuarioDefaultFK==0) {
					$cuenta_pagar_detalleForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$cuenta_pagar_detalleForeignKey->usuariosFK[$usuarioLocal->getId()]=cuenta_pagar_detalle_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($cuenta_pagar_detalle_session->bigidusuarioActual!=null && $cuenta_pagar_detalle_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($cuenta_pagar_detalle_session->bigidusuarioActual);//WithConnection

				$cuenta_pagar_detalleForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=cuenta_pagar_detalle_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$cuenta_pagar_detalleForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarComboscuenta_pagarsFK($connexion=null,$strRecargarFkQuery='',$cuenta_pagar_detalleForeignKey,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuenta_pagarLogic= new cuenta_pagar_logic();
		$pagination= new Pagination();
		$cuenta_pagar_detalleForeignKey->cuenta_pagarsFK=array();

		$cuenta_pagarLogic->setConnexion($connexion);
		$cuenta_pagarLogic->getcuenta_pagarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_pagar_detalle_session==null) {
			$cuenta_pagar_detalle_session=new cuenta_pagar_detalle_session();
		}
		
		if($cuenta_pagar_detalle_session->bitBusquedaDesdeFKSesioncuenta_pagar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_pagar_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcuenta_pagar=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta_pagar=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta_pagar, '');
				$finalQueryGlobalcuenta_pagar.=cuenta_pagar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta_pagar.$strRecargarFkQuery;		

				$cuenta_pagarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($cuenta_pagarLogic->getcuenta_pagars() as $cuenta_pagarLocal ) {
				if($cuenta_pagar_detalleForeignKey->idcuenta_pagarDefaultFK==0) {
					$cuenta_pagar_detalleForeignKey->idcuenta_pagarDefaultFK=$cuenta_pagarLocal->getId();
				}

				$cuenta_pagar_detalleForeignKey->cuenta_pagarsFK[$cuenta_pagarLocal->getId()]=cuenta_pagar_detalle_util::getcuenta_pagarDescripcion($cuenta_pagarLocal);
			}

		} else {

			if($cuenta_pagar_detalle_session->bigidcuenta_pagarActual!=null && $cuenta_pagar_detalle_session->bigidcuenta_pagarActual > 0) {
				$cuenta_pagarLogic->getEntity($cuenta_pagar_detalle_session->bigidcuenta_pagarActual);//WithConnection

				$cuenta_pagar_detalleForeignKey->cuenta_pagarsFK[$cuenta_pagarLogic->getcuenta_pagar()->getId()]=cuenta_pagar_detalle_util::getcuenta_pagarDescripcion($cuenta_pagarLogic->getcuenta_pagar());
				$cuenta_pagar_detalleForeignKey->idcuenta_pagarDefaultFK=$cuenta_pagarLogic->getcuenta_pagar()->getId();
			}
		}
	}

	public function cargarCombosestadosFK($connexion=null,$strRecargarFkQuery='',$cuenta_pagar_detalleForeignKey,$cuenta_pagar_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$estadoLogic= new estado_logic();
		$pagination= new Pagination();
		$cuenta_pagar_detalleForeignKey->estadosFK=array();

		$estadoLogic->setConnexion($connexion);
		$estadoLogic->getestadoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_pagar_detalle_session==null) {
			$cuenta_pagar_detalle_session=new cuenta_pagar_detalle_session();
		}
		
		if($cuenta_pagar_detalle_session->bitBusquedaDesdeFKSesionestado!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=estado_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalestado=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalestado=Funciones::GetFinalQueryAppend($finalQueryGlobalestado, '');
				$finalQueryGlobalestado.=estado_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalestado.$strRecargarFkQuery;		

				$estadoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($estadoLogic->getestados() as $estadoLocal ) {
				if($cuenta_pagar_detalleForeignKey->idestadoDefaultFK==0) {
					$cuenta_pagar_detalleForeignKey->idestadoDefaultFK=$estadoLocal->getId();
				}

				$cuenta_pagar_detalleForeignKey->estadosFK[$estadoLocal->getId()]=cuenta_pagar_detalle_util::getestadoDescripcion($estadoLocal);
			}

		} else {

			if($cuenta_pagar_detalle_session->bigidestadoActual!=null && $cuenta_pagar_detalle_session->bigidestadoActual > 0) {
				$estadoLogic->getEntity($cuenta_pagar_detalle_session->bigidestadoActual);//WithConnection

				$cuenta_pagar_detalleForeignKey->estadosFK[$estadoLogic->getestado()->getId()]=cuenta_pagar_detalle_util::getestadoDescripcion($estadoLogic->getestado());
				$cuenta_pagar_detalleForeignKey->idestadoDefaultFK=$estadoLogic->getestado()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($cuenta_pagar_detalle) {
		$this->saveRelacionesBase($cuenta_pagar_detalle,true);
	}

	public function saveRelaciones($cuenta_pagar_detalle) {
		$this->saveRelacionesBase($cuenta_pagar_detalle,false);
	}

	public function saveRelacionesBase($cuenta_pagar_detalle,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setcuenta_pagar_detalle($cuenta_pagar_detalle);

			if(true) {

				//cuenta_pagar_detalle_logic_add::updateRelacionesToSave($cuenta_pagar_detalle,$this);

				if(($this->cuenta_pagar_detalle->getIsNew() || $this->cuenta_pagar_detalle->getIsChanged()) && !$this->cuenta_pagar_detalle->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->cuenta_pagar_detalle->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//cuenta_pagar_detalle_logic_add::updateRelacionesToSaveAfter($cuenta_pagar_detalle,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $cuenta_pagar_detalles,cuenta_pagar_detalle_param_return $cuenta_pagar_detalleParameterGeneral) : cuenta_pagar_detalle_param_return {
		$cuenta_pagar_detalleReturnGeneral=new cuenta_pagar_detalle_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $cuenta_pagar_detalleReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $cuenta_pagar_detalles,cuenta_pagar_detalle_param_return $cuenta_pagar_detalleParameterGeneral) : cuenta_pagar_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cuenta_pagar_detalleReturnGeneral=new cuenta_pagar_detalle_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $cuenta_pagar_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_pagar_detalles,cuenta_pagar_detalle $cuenta_pagar_detalle,cuenta_pagar_detalle_param_return $cuenta_pagar_detalleParameterGeneral,bool $isEsNuevocuenta_pagar_detalle,array $clases) : cuenta_pagar_detalle_param_return {
		 try {	
			$cuenta_pagar_detalleReturnGeneral=new cuenta_pagar_detalle_param_return();
	
			$cuenta_pagar_detalleReturnGeneral->setcuenta_pagar_detalle($cuenta_pagar_detalle);
			$cuenta_pagar_detalleReturnGeneral->setcuenta_pagar_detalles($cuenta_pagar_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cuenta_pagar_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $cuenta_pagar_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_pagar_detalles,cuenta_pagar_detalle $cuenta_pagar_detalle,cuenta_pagar_detalle_param_return $cuenta_pagar_detalleParameterGeneral,bool $isEsNuevocuenta_pagar_detalle,array $clases) : cuenta_pagar_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cuenta_pagar_detalleReturnGeneral=new cuenta_pagar_detalle_param_return();
	
			$cuenta_pagar_detalleReturnGeneral->setcuenta_pagar_detalle($cuenta_pagar_detalle);
			$cuenta_pagar_detalleReturnGeneral->setcuenta_pagar_detalles($cuenta_pagar_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cuenta_pagar_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $cuenta_pagar_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_pagar_detalles,cuenta_pagar_detalle $cuenta_pagar_detalle,cuenta_pagar_detalle_param_return $cuenta_pagar_detalleParameterGeneral,bool $isEsNuevocuenta_pagar_detalle,array $clases) : cuenta_pagar_detalle_param_return {
		 try {	
			$cuenta_pagar_detalleReturnGeneral=new cuenta_pagar_detalle_param_return();
	
			$cuenta_pagar_detalleReturnGeneral->setcuenta_pagar_detalle($cuenta_pagar_detalle);
			$cuenta_pagar_detalleReturnGeneral->setcuenta_pagar_detalles($cuenta_pagar_detalles);
			
			
			
			return $cuenta_pagar_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_pagar_detalles,cuenta_pagar_detalle $cuenta_pagar_detalle,cuenta_pagar_detalle_param_return $cuenta_pagar_detalleParameterGeneral,bool $isEsNuevocuenta_pagar_detalle,array $clases) : cuenta_pagar_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cuenta_pagar_detalleReturnGeneral=new cuenta_pagar_detalle_param_return();
	
			$cuenta_pagar_detalleReturnGeneral->setcuenta_pagar_detalle($cuenta_pagar_detalle);
			$cuenta_pagar_detalleReturnGeneral->setcuenta_pagar_detalles($cuenta_pagar_detalles);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $cuenta_pagar_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,cuenta_pagar_detalle $cuenta_pagar_detalle,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,cuenta_pagar_detalle $cuenta_pagar_detalle,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		cuenta_pagar_detalle_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(cuenta_pagar_detalle $cuenta_pagar_detalle,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//cuenta_pagar_detalle_logic_add::updatecuenta_pagar_detalleToGet($this->cuenta_pagar_detalle);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cuenta_pagar_detalle->setempresa($this->cuenta_pagar_detalleDataAccess->getempresa($this->connexion,$cuenta_pagar_detalle));
		$cuenta_pagar_detalle->setsucursal($this->cuenta_pagar_detalleDataAccess->getsucursal($this->connexion,$cuenta_pagar_detalle));
		$cuenta_pagar_detalle->setejercicio($this->cuenta_pagar_detalleDataAccess->getejercicio($this->connexion,$cuenta_pagar_detalle));
		$cuenta_pagar_detalle->setperiodo($this->cuenta_pagar_detalleDataAccess->getperiodo($this->connexion,$cuenta_pagar_detalle));
		$cuenta_pagar_detalle->setusuario($this->cuenta_pagar_detalleDataAccess->getusuario($this->connexion,$cuenta_pagar_detalle));
		$cuenta_pagar_detalle->setcuenta_pagar($this->cuenta_pagar_detalleDataAccess->getcuenta_pagar($this->connexion,$cuenta_pagar_detalle));
		$cuenta_pagar_detalle->setestado($this->cuenta_pagar_detalleDataAccess->getestado($this->connexion,$cuenta_pagar_detalle));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cuenta_pagar_detalle->setempresa($this->cuenta_pagar_detalleDataAccess->getempresa($this->connexion,$cuenta_pagar_detalle));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$cuenta_pagar_detalle->setsucursal($this->cuenta_pagar_detalleDataAccess->getsucursal($this->connexion,$cuenta_pagar_detalle));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$cuenta_pagar_detalle->setejercicio($this->cuenta_pagar_detalleDataAccess->getejercicio($this->connexion,$cuenta_pagar_detalle));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$cuenta_pagar_detalle->setperiodo($this->cuenta_pagar_detalleDataAccess->getperiodo($this->connexion,$cuenta_pagar_detalle));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$cuenta_pagar_detalle->setusuario($this->cuenta_pagar_detalleDataAccess->getusuario($this->connexion,$cuenta_pagar_detalle));
				continue;
			}

			if($clas->clas==cuenta_pagar::$class.'') {
				$cuenta_pagar_detalle->setcuenta_pagar($this->cuenta_pagar_detalleDataAccess->getcuenta_pagar($this->connexion,$cuenta_pagar_detalle));
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$cuenta_pagar_detalle->setestado($this->cuenta_pagar_detalleDataAccess->getestado($this->connexion,$cuenta_pagar_detalle));
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
			$cuenta_pagar_detalle->setempresa($this->cuenta_pagar_detalleDataAccess->getempresa($this->connexion,$cuenta_pagar_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar_detalle->setsucursal($this->cuenta_pagar_detalleDataAccess->getsucursal($this->connexion,$cuenta_pagar_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar_detalle->setejercicio($this->cuenta_pagar_detalleDataAccess->getejercicio($this->connexion,$cuenta_pagar_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar_detalle->setperiodo($this->cuenta_pagar_detalleDataAccess->getperiodo($this->connexion,$cuenta_pagar_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar_detalle->setusuario($this->cuenta_pagar_detalleDataAccess->getusuario($this->connexion,$cuenta_pagar_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar_detalle->setcuenta_pagar($this->cuenta_pagar_detalleDataAccess->getcuenta_pagar($this->connexion,$cuenta_pagar_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar_detalle->setestado($this->cuenta_pagar_detalleDataAccess->getestado($this->connexion,$cuenta_pagar_detalle));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cuenta_pagar_detalle->setempresa($this->cuenta_pagar_detalleDataAccess->getempresa($this->connexion,$cuenta_pagar_detalle));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($cuenta_pagar_detalle->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_pagar_detalle->setsucursal($this->cuenta_pagar_detalleDataAccess->getsucursal($this->connexion,$cuenta_pagar_detalle));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($cuenta_pagar_detalle->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_pagar_detalle->setejercicio($this->cuenta_pagar_detalleDataAccess->getejercicio($this->connexion,$cuenta_pagar_detalle));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($cuenta_pagar_detalle->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_pagar_detalle->setperiodo($this->cuenta_pagar_detalleDataAccess->getperiodo($this->connexion,$cuenta_pagar_detalle));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($cuenta_pagar_detalle->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_pagar_detalle->setusuario($this->cuenta_pagar_detalleDataAccess->getusuario($this->connexion,$cuenta_pagar_detalle));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($cuenta_pagar_detalle->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_pagar_detalle->setcuenta_pagar($this->cuenta_pagar_detalleDataAccess->getcuenta_pagar($this->connexion,$cuenta_pagar_detalle));
		$cuenta_pagarLogic= new cuenta_pagar_logic($this->connexion);
		$cuenta_pagarLogic->deepLoad($cuenta_pagar_detalle->getcuenta_pagar(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_pagar_detalle->setestado($this->cuenta_pagar_detalleDataAccess->getestado($this->connexion,$cuenta_pagar_detalle));
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepLoad($cuenta_pagar_detalle->getestado(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cuenta_pagar_detalle->setempresa($this->cuenta_pagar_detalleDataAccess->getempresa($this->connexion,$cuenta_pagar_detalle));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($cuenta_pagar_detalle->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$cuenta_pagar_detalle->setsucursal($this->cuenta_pagar_detalleDataAccess->getsucursal($this->connexion,$cuenta_pagar_detalle));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($cuenta_pagar_detalle->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$cuenta_pagar_detalle->setejercicio($this->cuenta_pagar_detalleDataAccess->getejercicio($this->connexion,$cuenta_pagar_detalle));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($cuenta_pagar_detalle->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$cuenta_pagar_detalle->setperiodo($this->cuenta_pagar_detalleDataAccess->getperiodo($this->connexion,$cuenta_pagar_detalle));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($cuenta_pagar_detalle->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$cuenta_pagar_detalle->setusuario($this->cuenta_pagar_detalleDataAccess->getusuario($this->connexion,$cuenta_pagar_detalle));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($cuenta_pagar_detalle->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta_pagar::$class.'') {
				$cuenta_pagar_detalle->setcuenta_pagar($this->cuenta_pagar_detalleDataAccess->getcuenta_pagar($this->connexion,$cuenta_pagar_detalle));
				$cuenta_pagarLogic= new cuenta_pagar_logic($this->connexion);
				$cuenta_pagarLogic->deepLoad($cuenta_pagar_detalle->getcuenta_pagar(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$cuenta_pagar_detalle->setestado($this->cuenta_pagar_detalleDataAccess->getestado($this->connexion,$cuenta_pagar_detalle));
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepLoad($cuenta_pagar_detalle->getestado(),$isDeep,$deepLoadType,$clases);				
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
			$cuenta_pagar_detalle->setempresa($this->cuenta_pagar_detalleDataAccess->getempresa($this->connexion,$cuenta_pagar_detalle));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($cuenta_pagar_detalle->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar_detalle->setsucursal($this->cuenta_pagar_detalleDataAccess->getsucursal($this->connexion,$cuenta_pagar_detalle));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($cuenta_pagar_detalle->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar_detalle->setejercicio($this->cuenta_pagar_detalleDataAccess->getejercicio($this->connexion,$cuenta_pagar_detalle));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($cuenta_pagar_detalle->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar_detalle->setperiodo($this->cuenta_pagar_detalleDataAccess->getperiodo($this->connexion,$cuenta_pagar_detalle));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($cuenta_pagar_detalle->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar_detalle->setusuario($this->cuenta_pagar_detalleDataAccess->getusuario($this->connexion,$cuenta_pagar_detalle));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($cuenta_pagar_detalle->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar_detalle->setcuenta_pagar($this->cuenta_pagar_detalleDataAccess->getcuenta_pagar($this->connexion,$cuenta_pagar_detalle));
			$cuenta_pagarLogic= new cuenta_pagar_logic($this->connexion);
			$cuenta_pagarLogic->deepLoad($cuenta_pagar_detalle->getcuenta_pagar(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar_detalle->setestado($this->cuenta_pagar_detalleDataAccess->getestado($this->connexion,$cuenta_pagar_detalle));
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepLoad($cuenta_pagar_detalle->getestado(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(cuenta_pagar_detalle $cuenta_pagar_detalle,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//cuenta_pagar_detalle_logic_add::updatecuenta_pagar_detalleToSave($this->cuenta_pagar_detalle);			
			
			if(!$paraDeleteCascade) {				
				cuenta_pagar_detalle_data::save($cuenta_pagar_detalle, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($cuenta_pagar_detalle->getempresa(),$this->connexion);
		sucursal_data::save($cuenta_pagar_detalle->getsucursal(),$this->connexion);
		ejercicio_data::save($cuenta_pagar_detalle->getejercicio(),$this->connexion);
		periodo_data::save($cuenta_pagar_detalle->getperiodo(),$this->connexion);
		usuario_data::save($cuenta_pagar_detalle->getusuario(),$this->connexion);
		cuenta_pagar_data::save($cuenta_pagar_detalle->getcuenta_pagar(),$this->connexion);
		estado_data::save($cuenta_pagar_detalle->getestado(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cuenta_pagar_detalle->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($cuenta_pagar_detalle->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($cuenta_pagar_detalle->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($cuenta_pagar_detalle->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($cuenta_pagar_detalle->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta_pagar::$class.'') {
				cuenta_pagar_data::save($cuenta_pagar_detalle->getcuenta_pagar(),$this->connexion);
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($cuenta_pagar_detalle->getestado(),$this->connexion);
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
			empresa_data::save($cuenta_pagar_detalle->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($cuenta_pagar_detalle->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($cuenta_pagar_detalle->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($cuenta_pagar_detalle->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($cuenta_pagar_detalle->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_pagar_data::save($cuenta_pagar_detalle->getcuenta_pagar(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($cuenta_pagar_detalle->getestado(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($cuenta_pagar_detalle->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($cuenta_pagar_detalle->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($cuenta_pagar_detalle->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($cuenta_pagar_detalle->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($cuenta_pagar_detalle->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($cuenta_pagar_detalle->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($cuenta_pagar_detalle->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($cuenta_pagar_detalle->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($cuenta_pagar_detalle->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($cuenta_pagar_detalle->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_pagar_data::save($cuenta_pagar_detalle->getcuenta_pagar(),$this->connexion);
		$cuenta_pagarLogic= new cuenta_pagar_logic($this->connexion);
		$cuenta_pagarLogic->deepSave($cuenta_pagar_detalle->getcuenta_pagar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		estado_data::save($cuenta_pagar_detalle->getestado(),$this->connexion);
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepSave($cuenta_pagar_detalle->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cuenta_pagar_detalle->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($cuenta_pagar_detalle->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($cuenta_pagar_detalle->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($cuenta_pagar_detalle->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($cuenta_pagar_detalle->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($cuenta_pagar_detalle->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($cuenta_pagar_detalle->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($cuenta_pagar_detalle->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($cuenta_pagar_detalle->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($cuenta_pagar_detalle->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta_pagar::$class.'') {
				cuenta_pagar_data::save($cuenta_pagar_detalle->getcuenta_pagar(),$this->connexion);
				$cuenta_pagarLogic= new cuenta_pagar_logic($this->connexion);
				$cuenta_pagarLogic->deepSave($cuenta_pagar_detalle->getcuenta_pagar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($cuenta_pagar_detalle->getestado(),$this->connexion);
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepSave($cuenta_pagar_detalle->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			empresa_data::save($cuenta_pagar_detalle->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($cuenta_pagar_detalle->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($cuenta_pagar_detalle->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($cuenta_pagar_detalle->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($cuenta_pagar_detalle->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($cuenta_pagar_detalle->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($cuenta_pagar_detalle->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($cuenta_pagar_detalle->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($cuenta_pagar_detalle->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($cuenta_pagar_detalle->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_pagar_data::save($cuenta_pagar_detalle->getcuenta_pagar(),$this->connexion);
			$cuenta_pagarLogic= new cuenta_pagar_logic($this->connexion);
			$cuenta_pagarLogic->deepSave($cuenta_pagar_detalle->getcuenta_pagar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($cuenta_pagar_detalle->getestado(),$this->connexion);
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepSave($cuenta_pagar_detalle->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				cuenta_pagar_detalle_data::save($cuenta_pagar_detalle, $this->connexion);
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
			
			$this->deepLoad($this->cuenta_pagar_detalle,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->cuenta_pagar_detalles as $cuenta_pagar_detalle) {
				$this->deepLoad($cuenta_pagar_detalle,$isDeep,$deepLoadType,$clases);
								
				cuenta_pagar_detalle_util::refrescarFKDescripciones($this->cuenta_pagar_detalles);
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
			
			foreach($this->cuenta_pagar_detalles as $cuenta_pagar_detalle) {
				$this->deepLoad($cuenta_pagar_detalle,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->cuenta_pagar_detalle,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->cuenta_pagar_detalles as $cuenta_pagar_detalle) {
				$this->deepSave($cuenta_pagar_detalle,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->cuenta_pagar_detalles as $cuenta_pagar_detalle) {
				$this->deepSave($cuenta_pagar_detalle,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(cuenta_pagar::$class);
				$classes[]=new Classe(estado::$class);
				
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
					if($clas->clas==cuenta_pagar::$class) {
						$classes[]=new Classe(cuenta_pagar::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==estado::$class) {
						$classes[]=new Classe(estado::$class);
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
					if($clas->clas==cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_pagar::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==estado::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(estado::$class);
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
	
	
	
	
	
	
	
	public function getcuenta_pagar_detalle() : ?cuenta_pagar_detalle {	
		/*
		cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGet($this->cuenta_pagar_detalle,$this->datosCliente);
		cuenta_pagar_detalle_logic_add::updatecuenta_pagar_detalleToGet($this->cuenta_pagar_detalle);
		*/
			
		return $this->cuenta_pagar_detalle;
	}
		
	public function setcuenta_pagar_detalle(cuenta_pagar_detalle $newcuenta_pagar_detalle) {
		$this->cuenta_pagar_detalle = $newcuenta_pagar_detalle;
	}
	
	public function getcuenta_pagar_detalles() : array {		
		/*
		cuenta_pagar_detalle_logic_add::checkcuenta_pagar_detalleToGets($this->cuenta_pagar_detalles,$this->datosCliente);
		
		foreach ($this->cuenta_pagar_detalles as $cuenta_pagar_detalleLocal ) {
			cuenta_pagar_detalle_logic_add::updatecuenta_pagar_detalleToGet($cuenta_pagar_detalleLocal);
		}
		*/
		
		return $this->cuenta_pagar_detalles;
	}
	
	public function setcuenta_pagar_detalles(array $newcuenta_pagar_detalles) {
		$this->cuenta_pagar_detalles = $newcuenta_pagar_detalles;
	}
	
	public function getcuenta_pagar_detalleDataAccess() : cuenta_pagar_detalle_data {
		return $this->cuenta_pagar_detalleDataAccess;
	}
	
	public function setcuenta_pagar_detalleDataAccess(cuenta_pagar_detalle_data $newcuenta_pagar_detalleDataAccess) {
		$this->cuenta_pagar_detalleDataAccess = $newcuenta_pagar_detalleDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        cuenta_pagar_detalle_carga::$CONTROLLER;;        
		
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
