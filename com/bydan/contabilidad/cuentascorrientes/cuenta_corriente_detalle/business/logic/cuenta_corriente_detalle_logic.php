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

namespace com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_param_return;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\presentation\session\cuenta_corriente_detalle_session;

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

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_util;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\entity\cuenta_corriente_detalle;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\data\cuenta_corriente_detalle_data;

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

use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\data\cuenta_corriente_data;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\general\tabla\business\entity\tabla;
use com\bydan\contabilidad\general\tabla\business\data\tabla_data;
use com\bydan\contabilidad\general\tabla\business\logic\tabla_logic;
use com\bydan\contabilidad\general\tabla\util\tabla_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\data\estado_data;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_util;

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\data\asiento_data;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\data\cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\logic\cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\data\cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\logic\cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_util;

//REL


use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\entity\clasificacion_cheque;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\data\clasificacion_cheque_data;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\logic\clasificacion_cheque_logic;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_util;

//REL DETALLES




class cuenta_corriente_detalle_logic  extends GeneralEntityLogic implements cuenta_corriente_detalle_logicI {	
	/*GENERAL*/
	public cuenta_corriente_detalle_data $cuenta_corriente_detalleDataAccess;
	//public ?cuenta_corriente_detalle_logic_add $cuenta_corriente_detalleLogicAdditional=null;
	public ?cuenta_corriente_detalle $cuenta_corriente_detalle;
	public array $cuenta_corriente_detalles;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->cuenta_corriente_detalleDataAccess = new cuenta_corriente_detalle_data();			
			$this->cuenta_corriente_detalles = array();
			$this->cuenta_corriente_detalle = new cuenta_corriente_detalle();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->cuenta_corriente_detalleLogicAdditional = new cuenta_corriente_detalle_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->cuenta_corriente_detalleLogicAdditional==null) {
		//	$this->cuenta_corriente_detalleLogicAdditional=new cuenta_corriente_detalle_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->cuenta_corriente_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->cuenta_corriente_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->cuenta_corriente_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->cuenta_corriente_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->cuenta_corriente_detalles = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->cuenta_corriente_detalles = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);
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
		$this->cuenta_corriente_detalle = new cuenta_corriente_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->cuenta_corriente_detalle=$this->cuenta_corriente_detalleDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_corriente_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_corriente_detalle_util::refrescarFKDescripcion($this->cuenta_corriente_detalle);
			}
						
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGet($this->cuenta_corriente_detalle,$this->datosCliente);
			//cuenta_corriente_detalle_logic_add::updatecuenta_corriente_detalleToGet($this->cuenta_corriente_detalle);
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
		$this->cuenta_corriente_detalle = new  cuenta_corriente_detalle();
		  		  
        try {		
			$this->cuenta_corriente_detalle=$this->cuenta_corriente_detalleDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_corriente_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_corriente_detalle_util::refrescarFKDescripcion($this->cuenta_corriente_detalle);
			}
			
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGet($this->cuenta_corriente_detalle,$this->datosCliente);
			//cuenta_corriente_detalle_logic_add::updatecuenta_corriente_detalleToGet($this->cuenta_corriente_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?cuenta_corriente_detalle {
		$cuenta_corriente_detalleLogic = new  cuenta_corriente_detalle_logic();
		  		  
        try {		
			$cuenta_corriente_detalleLogic->setConnexion($connexion);			
			$cuenta_corriente_detalleLogic->getEntity($id);			
			return $cuenta_corriente_detalleLogic->getcuenta_corriente_detalle();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->cuenta_corriente_detalle = new  cuenta_corriente_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->cuenta_corriente_detalle=$this->cuenta_corriente_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_corriente_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_corriente_detalle_util::refrescarFKDescripcion($this->cuenta_corriente_detalle);
			}
			
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGet($this->cuenta_corriente_detalle,$this->datosCliente);
			//cuenta_corriente_detalle_logic_add::updatecuenta_corriente_detalleToGet($this->cuenta_corriente_detalle);
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
		$this->cuenta_corriente_detalle = new  cuenta_corriente_detalle();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_corriente_detalle=$this->cuenta_corriente_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_corriente_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_corriente_detalle_util::refrescarFKDescripcion($this->cuenta_corriente_detalle);
			}
			
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGet($this->cuenta_corriente_detalle,$this->datosCliente);
			//cuenta_corriente_detalle_logic_add::updatecuenta_corriente_detalleToGet($this->cuenta_corriente_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?cuenta_corriente_detalle {
		$cuenta_corriente_detalleLogic = new  cuenta_corriente_detalle_logic();
		  		  
        try {		
			$cuenta_corriente_detalleLogic->setConnexion($connexion);			
			$cuenta_corriente_detalleLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $cuenta_corriente_detalleLogic->getcuenta_corriente_detalle();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cuenta_corriente_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);			
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
		$this->cuenta_corriente_detalles = array();
		  		  
        try {			
			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->cuenta_corriente_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);
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
		$this->cuenta_corriente_detalles = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$cuenta_corriente_detalleLogic = new  cuenta_corriente_detalle_logic();
		  		  
        try {		
			$cuenta_corriente_detalleLogic->setConnexion($connexion);			
			$cuenta_corriente_detalleLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->cuenta_corriente_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);
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
		$this->cuenta_corriente_detalles = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->cuenta_corriente_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);
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
		$this->cuenta_corriente_detalles = array();
		  		  
        try {			
			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}	
			
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cuenta_corriente_detalles = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);
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
		$this->cuenta_corriente_detalles = array();
		  		  
        try {		
			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdasientoWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_asiento) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_asiento= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_asiento->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento,cuenta_corriente_detalle_util::$ID_ASIENTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idasiento(string $strFinalQuery,Pagination $pagination,?int $id_asiento) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_asiento= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_asiento->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento,cuenta_corriente_detalle_util::$ID_ASIENTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdclienteWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_cliente) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,cuenta_corriente_detalle_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcliente(string $strFinalQuery,Pagination $pagination,?int $id_cliente) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,cuenta_corriente_detalle_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idcuenta_corrienteWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cuenta_corriente) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_corriente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_corriente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_corriente,cuenta_corriente_detalle_util::$ID_CUENTA_CORRIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_corriente);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta_corriente(string $strFinalQuery,Pagination $pagination,int $id_cuenta_corriente) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_corriente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_corriente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_corriente,cuenta_corriente_detalle_util::$ID_CUENTA_CORRIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_corriente);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Iddocumento_cuenta_cobrarWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_cuenta_cobrar) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_cobrar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_cobrar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_cobrar,cuenta_corriente_detalle_util::$ID_CUENTA_COBRAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_cobrar);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Iddocumento_cuenta_cobrar(string $strFinalQuery,Pagination $pagination,?int $id_cuenta_cobrar) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_cobrar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_cobrar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_cobrar,cuenta_corriente_detalle_util::$ID_CUENTA_COBRAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_cobrar);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Iddocumento_cuenta_pagarWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_cuenta_pagar) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_pagar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_pagar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_pagar,cuenta_corriente_detalle_util::$ID_CUENTA_PAGAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_pagar);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Iddocumento_cuenta_pagar(string $strFinalQuery,Pagination $pagination,?int $id_cuenta_pagar) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_pagar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_pagar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_pagar,cuenta_corriente_detalle_util::$ID_CUENTA_PAGAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_pagar);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);
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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,cuenta_corriente_detalle_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,cuenta_corriente_detalle_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cuenta_corriente_detalle_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cuenta_corriente_detalle_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);
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
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,cuenta_corriente_detalle_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);

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
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,cuenta_corriente_detalle_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);
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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,cuenta_corriente_detalle_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);

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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,cuenta_corriente_detalle_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdproveedorWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_proveedor) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,cuenta_corriente_detalle_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idproveedor(string $strFinalQuery,Pagination $pagination,?int $id_proveedor) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,cuenta_corriente_detalle_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdtablaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_tabla) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tabla= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tabla->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tabla,cuenta_corriente_detalle_util::$ID_TABLA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tabla);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtabla(string $strFinalQuery,Pagination $pagination,int $id_tabla) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tabla= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tabla->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tabla,cuenta_corriente_detalle_util::$ID_TABLA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tabla);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,cuenta_corriente_detalle_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,cuenta_corriente_detalle_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corriente_detalles);
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
						
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToSave($this->cuenta_corriente_detalle,$this->datosCliente,$this->connexion);	       
			//cuenta_corriente_detalle_logic_add::updatecuenta_corriente_detalleToSave($this->cuenta_corriente_detalle);			
			cuenta_corriente_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cuenta_corriente_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->cuenta_corriente_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->cuenta_corriente_detalle,$this->datosCliente,$this->connexion);
			
			
			cuenta_corriente_detalle_data::save($this->cuenta_corriente_detalle, $this->connexion);	    	       	 				
			//cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToSaveAfter($this->cuenta_corriente_detalle,$this->datosCliente,$this->connexion);			
			//$this->cuenta_corriente_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cuenta_corriente_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cuenta_corriente_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cuenta_corriente_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cuenta_corriente_detalle_util::refrescarFKDescripcion($this->cuenta_corriente_detalle);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->cuenta_corriente_detalle->getIsDeleted()) {
				$this->cuenta_corriente_detalle=null;
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
						
			/*cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToSave($this->cuenta_corriente_detalle,$this->datosCliente,$this->connexion);*/	        
			//cuenta_corriente_detalle_logic_add::updatecuenta_corriente_detalleToSave($this->cuenta_corriente_detalle);			
			//$this->cuenta_corriente_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->cuenta_corriente_detalle,$this->datosCliente,$this->connexion);			
			cuenta_corriente_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cuenta_corriente_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			cuenta_corriente_detalle_data::save($this->cuenta_corriente_detalle, $this->connexion);	    	       	 						
			/*cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToSaveAfter($this->cuenta_corriente_detalle,$this->datosCliente,$this->connexion);*/			
			//$this->cuenta_corriente_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cuenta_corriente_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cuenta_corriente_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cuenta_corriente_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cuenta_corriente_detalle_util::refrescarFKDescripcion($this->cuenta_corriente_detalle);				
			}
			
			if($this->cuenta_corriente_detalle->getIsDeleted()) {
				$this->cuenta_corriente_detalle=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(cuenta_corriente_detalle $cuenta_corriente_detalle,Connexion $connexion)  {
		$cuenta_corriente_detalleLogic = new  cuenta_corriente_detalle_logic();		  		  
        try {		
			$cuenta_corriente_detalleLogic->setConnexion($connexion);			
			$cuenta_corriente_detalleLogic->setcuenta_corriente_detalle($cuenta_corriente_detalle);			
			$cuenta_corriente_detalleLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToSaves($this->cuenta_corriente_detalles,$this->datosCliente,$this->connexion);*/	        	
			//$this->cuenta_corriente_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cuenta_corriente_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cuenta_corriente_detalles as $cuenta_corriente_detalleLocal) {				
								
				//cuenta_corriente_detalle_logic_add::updatecuenta_corriente_detalleToSave($cuenta_corriente_detalleLocal);	        	
				cuenta_corriente_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cuenta_corriente_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				cuenta_corriente_detalle_data::save($cuenta_corriente_detalleLocal, $this->connexion);				
			}
			
			/*cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToSavesAfter($this->cuenta_corriente_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->cuenta_corriente_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cuenta_corriente_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
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
			/*cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToSaves($this->cuenta_corriente_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->cuenta_corriente_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cuenta_corriente_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cuenta_corriente_detalles as $cuenta_corriente_detalleLocal) {				
								
				//cuenta_corriente_detalle_logic_add::updatecuenta_corriente_detalleToSave($cuenta_corriente_detalleLocal);	        	
				cuenta_corriente_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cuenta_corriente_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				cuenta_corriente_detalle_data::save($cuenta_corriente_detalleLocal, $this->connexion);				
			}			
			
			/*cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToSavesAfter($this->cuenta_corriente_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->cuenta_corriente_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cuenta_corriente_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $cuenta_corriente_detalles,Connexion $connexion)  {
		$cuenta_corriente_detalleLogic = new  cuenta_corriente_detalle_logic();
		  		  
        try {		
			$cuenta_corriente_detalleLogic->setConnexion($connexion);			
			$cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($cuenta_corriente_detalles);			
			$cuenta_corriente_detalleLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$cuenta_corriente_detallesAux=array();
		
		foreach($this->cuenta_corriente_detalles as $cuenta_corriente_detalle) {
			if($cuenta_corriente_detalle->getIsDeleted()==false) {
				$cuenta_corriente_detallesAux[]=$cuenta_corriente_detalle;
			}
		}
		
		$this->cuenta_corriente_detalles=$cuenta_corriente_detallesAux;
	}
	
	public function updateToGetsAuxiliar(array &$cuenta_corriente_detalles) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->cuenta_corriente_detalles as $cuenta_corriente_detalle) {
				
				$cuenta_corriente_detalle->setid_empresa_Descripcion(cuenta_corriente_detalle_util::getempresaDescripcion($cuenta_corriente_detalle->getempresa()));
				$cuenta_corriente_detalle->setid_ejercicio_Descripcion(cuenta_corriente_detalle_util::getejercicioDescripcion($cuenta_corriente_detalle->getejercicio()));
				$cuenta_corriente_detalle->setid_periodo_Descripcion(cuenta_corriente_detalle_util::getperiodoDescripcion($cuenta_corriente_detalle->getperiodo()));
				$cuenta_corriente_detalle->setid_usuario_Descripcion(cuenta_corriente_detalle_util::getusuarioDescripcion($cuenta_corriente_detalle->getusuario()));
				$cuenta_corriente_detalle->setid_cuenta_corriente_Descripcion(cuenta_corriente_detalle_util::getcuenta_corrienteDescripcion($cuenta_corriente_detalle->getcuenta_corriente()));
				$cuenta_corriente_detalle->setid_cliente_Descripcion(cuenta_corriente_detalle_util::getclienteDescripcion($cuenta_corriente_detalle->getcliente()));
				$cuenta_corriente_detalle->setid_proveedor_Descripcion(cuenta_corriente_detalle_util::getproveedorDescripcion($cuenta_corriente_detalle->getproveedor()));
				$cuenta_corriente_detalle->setid_tabla_Descripcion(cuenta_corriente_detalle_util::gettablaDescripcion($cuenta_corriente_detalle->gettabla()));
				$cuenta_corriente_detalle->setid_estado_Descripcion(cuenta_corriente_detalle_util::getestadoDescripcion($cuenta_corriente_detalle->getestado()));
				$cuenta_corriente_detalle->setid_asiento_Descripcion(cuenta_corriente_detalle_util::getasientoDescripcion($cuenta_corriente_detalle->getasiento()));
				$cuenta_corriente_detalle->setid_cuenta_pagar_Descripcion(cuenta_corriente_detalle_util::getcuenta_pagarDescripcion($cuenta_corriente_detalle->getcuenta_pagar()));
				$cuenta_corriente_detalle->setid_cuenta_cobrar_Descripcion(cuenta_corriente_detalle_util::getcuenta_cobrarDescripcion($cuenta_corriente_detalle->getcuenta_cobrar()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cuenta_corriente_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cuenta_corriente_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cuenta_corriente_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$cuenta_corriente_detalleForeignKey=new cuenta_corriente_detalle_param_return();//cuenta_corriente_detalleForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_corriente',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_corrientesFK($this->connexion,$strRecargarFkQuery,$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombosclientesFK($this->connexion,$strRecargarFkQuery,$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosproveedorsFK($this->connexion,$strRecargarFkQuery,$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tabla',$strRecargarFkTipos,',')) {
				$this->cargarCombostablasFK($this->connexion,$strRecargarFkQuery,$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado',$strRecargarFkTipos,',')) {
				$this->cargarCombosestadosFK($this->connexion,$strRecargarFkQuery,$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_asiento',$strRecargarFkTipos,',')) {
				$this->cargarCombosasientosFK($this->connexion,$strRecargarFkQuery,$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_pagar',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_pagarsFK($this->connexion,$strRecargarFkQuery,$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_cobrar',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_cobrarsFK($this->connexion,$strRecargarFkQuery,$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_corriente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_corrientesFK($this->connexion,' where id=-1 ',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosclientesFK($this->connexion,' where id=-1 ',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproveedorsFK($this->connexion,' where id=-1 ',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tabla',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostablasFK($this->connexion,' where id=-1 ',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_estado',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosestadosFK($this->connexion,' where id=-1 ',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_asiento',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosasientosFK($this->connexion,' where id=-1 ',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_pagar',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_pagarsFK($this->connexion,' where id=-1 ',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_cobrar',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_cobrarsFK($this->connexion,' where id=-1 ',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $cuenta_corriente_detalleForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$cuenta_corriente_detalleForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($cuenta_corriente_detalleForeignKey->idempresaDefaultFK==0) {
					$cuenta_corriente_detalleForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$cuenta_corriente_detalleForeignKey->empresasFK[$empresaLocal->getId()]=cuenta_corriente_detalle_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($cuenta_corriente_detalle_session->bigidempresaActual!=null && $cuenta_corriente_detalle_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cuenta_corriente_detalle_session->bigidempresaActual);//WithConnection

				$cuenta_corriente_detalleForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=cuenta_corriente_detalle_util::getempresaDescripcion($empresaLogic->getempresa());
				$cuenta_corriente_detalleForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$cuenta_corriente_detalleForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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
				if($cuenta_corriente_detalleForeignKey->idejercicioDefaultFK==0) {
					$cuenta_corriente_detalleForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$cuenta_corriente_detalleForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=cuenta_corriente_detalle_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($cuenta_corriente_detalle_session->bigidejercicioActual!=null && $cuenta_corriente_detalle_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($cuenta_corriente_detalle_session->bigidejercicioActual);//WithConnection

				$cuenta_corriente_detalleForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=cuenta_corriente_detalle_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$cuenta_corriente_detalleForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$cuenta_corriente_detalleForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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
				if($cuenta_corriente_detalleForeignKey->idperiodoDefaultFK==0) {
					$cuenta_corriente_detalleForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$cuenta_corriente_detalleForeignKey->periodosFK[$periodoLocal->getId()]=cuenta_corriente_detalle_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($cuenta_corriente_detalle_session->bigidperiodoActual!=null && $cuenta_corriente_detalle_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($cuenta_corriente_detalle_session->bigidperiodoActual);//WithConnection

				$cuenta_corriente_detalleForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=cuenta_corriente_detalle_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$cuenta_corriente_detalleForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$cuenta_corriente_detalleForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($cuenta_corriente_detalleForeignKey->idusuarioDefaultFK==0) {
					$cuenta_corriente_detalleForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$cuenta_corriente_detalleForeignKey->usuariosFK[$usuarioLocal->getId()]=cuenta_corriente_detalle_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($cuenta_corriente_detalle_session->bigidusuarioActual!=null && $cuenta_corriente_detalle_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($cuenta_corriente_detalle_session->bigidusuarioActual);//WithConnection

				$cuenta_corriente_detalleForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=cuenta_corriente_detalle_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$cuenta_corriente_detalleForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarComboscuenta_corrientesFK($connexion=null,$strRecargarFkQuery='',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuenta_corrienteLogic= new cuenta_corriente_logic();
		$pagination= new Pagination();
		$cuenta_corriente_detalleForeignKey->cuenta_corrientesFK=array();

		$cuenta_corrienteLogic->setConnexion($connexion);
		$cuenta_corrienteLogic->getcuenta_corrienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncuenta_corriente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_corriente_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcuenta_corriente=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta_corriente=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta_corriente, '');
				$finalQueryGlobalcuenta_corriente.=cuenta_corriente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta_corriente.$strRecargarFkQuery;		

				$cuenta_corrienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($cuenta_corrienteLogic->getcuenta_corrientes() as $cuenta_corrienteLocal ) {
				if($cuenta_corriente_detalleForeignKey->idcuenta_corrienteDefaultFK==0) {
					$cuenta_corriente_detalleForeignKey->idcuenta_corrienteDefaultFK=$cuenta_corrienteLocal->getId();
				}

				$cuenta_corriente_detalleForeignKey->cuenta_corrientesFK[$cuenta_corrienteLocal->getId()]=cuenta_corriente_detalle_util::getcuenta_corrienteDescripcion($cuenta_corrienteLocal);
			}

		} else {

			if($cuenta_corriente_detalle_session->bigidcuenta_corrienteActual!=null && $cuenta_corriente_detalle_session->bigidcuenta_corrienteActual > 0) {
				$cuenta_corrienteLogic->getEntity($cuenta_corriente_detalle_session->bigidcuenta_corrienteActual);//WithConnection

				$cuenta_corriente_detalleForeignKey->cuenta_corrientesFK[$cuenta_corrienteLogic->getcuenta_corriente()->getId()]=cuenta_corriente_detalle_util::getcuenta_corrienteDescripcion($cuenta_corrienteLogic->getcuenta_corriente());
				$cuenta_corriente_detalleForeignKey->idcuenta_corrienteDefaultFK=$cuenta_corrienteLogic->getcuenta_corriente()->getId();
			}
		}
	}

	public function cargarCombosclientesFK($connexion=null,$strRecargarFkQuery='',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$clienteLogic= new cliente_logic();
		$pagination= new Pagination();
		$cuenta_corriente_detalleForeignKey->clientesFK=array();

		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncliente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cliente_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcliente=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcliente=Funciones::GetFinalQueryAppend($finalQueryGlobalcliente, '');
				$finalQueryGlobalcliente.=cliente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcliente.$strRecargarFkQuery;		

				$clienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($clienteLogic->getclientes() as $clienteLocal ) {
				if($cuenta_corriente_detalleForeignKey->idclienteDefaultFK==0) {
					$cuenta_corriente_detalleForeignKey->idclienteDefaultFK=$clienteLocal->getId();
				}

				$cuenta_corriente_detalleForeignKey->clientesFK[$clienteLocal->getId()]=cuenta_corriente_detalle_util::getclienteDescripcion($clienteLocal);
			}

		} else {

			if($cuenta_corriente_detalle_session->bigidclienteActual!=null && $cuenta_corriente_detalle_session->bigidclienteActual > 0) {
				$clienteLogic->getEntity($cuenta_corriente_detalle_session->bigidclienteActual);//WithConnection

				$cuenta_corriente_detalleForeignKey->clientesFK[$clienteLogic->getcliente()->getId()]=cuenta_corriente_detalle_util::getclienteDescripcion($clienteLogic->getcliente());
				$cuenta_corriente_detalleForeignKey->idclienteDefaultFK=$clienteLogic->getcliente()->getId();
			}
		}
	}

	public function cargarCombosproveedorsFK($connexion=null,$strRecargarFkQuery='',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$proveedorLogic= new proveedor_logic();
		$pagination= new Pagination();
		$cuenta_corriente_detalleForeignKey->proveedorsFK=array();

		$proveedorLogic->setConnexion($connexion);
		$proveedorLogic->getproveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionproveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=proveedor_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalproveedor=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalproveedor=Funciones::GetFinalQueryAppend($finalQueryGlobalproveedor, '');
				$finalQueryGlobalproveedor.=proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalproveedor.$strRecargarFkQuery;		

				$proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($proveedorLogic->getproveedors() as $proveedorLocal ) {
				if($cuenta_corriente_detalleForeignKey->idproveedorDefaultFK==0) {
					$cuenta_corriente_detalleForeignKey->idproveedorDefaultFK=$proveedorLocal->getId();
				}

				$cuenta_corriente_detalleForeignKey->proveedorsFK[$proveedorLocal->getId()]=cuenta_corriente_detalle_util::getproveedorDescripcion($proveedorLocal);
			}

		} else {

			if($cuenta_corriente_detalle_session->bigidproveedorActual!=null && $cuenta_corriente_detalle_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($cuenta_corriente_detalle_session->bigidproveedorActual);//WithConnection

				$cuenta_corriente_detalleForeignKey->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=cuenta_corriente_detalle_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$cuenta_corriente_detalleForeignKey->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	public function cargarCombostablasFK($connexion=null,$strRecargarFkQuery='',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tablaLogic= new tabla_logic();
		$pagination= new Pagination();
		$cuenta_corriente_detalleForeignKey->tablasFK=array();

		$tablaLogic->setConnexion($connexion);
		$tablaLogic->gettablaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesiontabla!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=tabla_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltabla=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltabla=Funciones::GetFinalQueryAppend($finalQueryGlobaltabla, '');
				$finalQueryGlobaltabla.=tabla_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltabla.$strRecargarFkQuery;		

				$tablaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($tablaLogic->gettablas() as $tablaLocal ) {
				if($cuenta_corriente_detalleForeignKey->idtablaDefaultFK==0) {
					$cuenta_corriente_detalleForeignKey->idtablaDefaultFK=$tablaLocal->getId();
				}

				$cuenta_corriente_detalleForeignKey->tablasFK[$tablaLocal->getId()]=cuenta_corriente_detalle_util::gettablaDescripcion($tablaLocal);
			}

		} else {

			if($cuenta_corriente_detalle_session->bigidtablaActual!=null && $cuenta_corriente_detalle_session->bigidtablaActual > 0) {
				$tablaLogic->getEntity($cuenta_corriente_detalle_session->bigidtablaActual);//WithConnection

				$cuenta_corriente_detalleForeignKey->tablasFK[$tablaLogic->gettabla()->getId()]=cuenta_corriente_detalle_util::gettablaDescripcion($tablaLogic->gettabla());
				$cuenta_corriente_detalleForeignKey->idtablaDefaultFK=$tablaLogic->gettabla()->getId();
			}
		}
	}

	public function cargarCombosestadosFK($connexion=null,$strRecargarFkQuery='',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$estadoLogic= new estado_logic();
		$pagination= new Pagination();
		$cuenta_corriente_detalleForeignKey->estadosFK=array();

		$estadoLogic->setConnexion($connexion);
		$estadoLogic->getestadoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionestado!=true) {
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
				if($cuenta_corriente_detalleForeignKey->idestadoDefaultFK==0) {
					$cuenta_corriente_detalleForeignKey->idestadoDefaultFK=$estadoLocal->getId();
				}

				$cuenta_corriente_detalleForeignKey->estadosFK[$estadoLocal->getId()]=cuenta_corriente_detalle_util::getestadoDescripcion($estadoLocal);
			}

		} else {

			if($cuenta_corriente_detalle_session->bigidestadoActual!=null && $cuenta_corriente_detalle_session->bigidestadoActual > 0) {
				$estadoLogic->getEntity($cuenta_corriente_detalle_session->bigidestadoActual);//WithConnection

				$cuenta_corriente_detalleForeignKey->estadosFK[$estadoLogic->getestado()->getId()]=cuenta_corriente_detalle_util::getestadoDescripcion($estadoLogic->getestado());
				$cuenta_corriente_detalleForeignKey->idestadoDefaultFK=$estadoLogic->getestado()->getId();
			}
		}
	}

	public function cargarCombosasientosFK($connexion=null,$strRecargarFkQuery='',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$asientoLogic= new asiento_logic();
		$pagination= new Pagination();
		$cuenta_corriente_detalleForeignKey->asientosFK=array();

		$asientoLogic->setConnexion($connexion);
		$asientoLogic->getasientoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionasiento!=true) {
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
				if($cuenta_corriente_detalleForeignKey->idasientoDefaultFK==0) {
					$cuenta_corriente_detalleForeignKey->idasientoDefaultFK=$asientoLocal->getId();
				}

				$cuenta_corriente_detalleForeignKey->asientosFK[$asientoLocal->getId()]=cuenta_corriente_detalle_util::getasientoDescripcion($asientoLocal);
			}

		} else {

			if($cuenta_corriente_detalle_session->bigidasientoActual!=null && $cuenta_corriente_detalle_session->bigidasientoActual > 0) {
				$asientoLogic->getEntity($cuenta_corriente_detalle_session->bigidasientoActual);//WithConnection

				$cuenta_corriente_detalleForeignKey->asientosFK[$asientoLogic->getasiento()->getId()]=cuenta_corriente_detalle_util::getasientoDescripcion($asientoLogic->getasiento());
				$cuenta_corriente_detalleForeignKey->idasientoDefaultFK=$asientoLogic->getasiento()->getId();
			}
		}
	}

	public function cargarComboscuenta_pagarsFK($connexion=null,$strRecargarFkQuery='',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuenta_pagarLogic= new cuenta_pagar_logic();
		$pagination= new Pagination();
		$cuenta_corriente_detalleForeignKey->cuenta_pagarsFK=array();

		$cuenta_pagarLogic->setConnexion($connexion);
		$cuenta_pagarLogic->getcuenta_pagarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncuenta_pagar!=true) {
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
				if($cuenta_corriente_detalleForeignKey->idcuenta_pagarDefaultFK==0) {
					$cuenta_corriente_detalleForeignKey->idcuenta_pagarDefaultFK=$cuenta_pagarLocal->getId();
				}

				$cuenta_corriente_detalleForeignKey->cuenta_pagarsFK[$cuenta_pagarLocal->getId()]=cuenta_corriente_detalle_util::getcuenta_pagarDescripcion($cuenta_pagarLocal);
			}

		} else {

			if($cuenta_corriente_detalle_session->bigidcuenta_pagarActual!=null && $cuenta_corriente_detalle_session->bigidcuenta_pagarActual > 0) {
				$cuenta_pagarLogic->getEntity($cuenta_corriente_detalle_session->bigidcuenta_pagarActual);//WithConnection

				$cuenta_corriente_detalleForeignKey->cuenta_pagarsFK[$cuenta_pagarLogic->getcuenta_pagar()->getId()]=cuenta_corriente_detalle_util::getcuenta_pagarDescripcion($cuenta_pagarLogic->getcuenta_pagar());
				$cuenta_corriente_detalleForeignKey->idcuenta_pagarDefaultFK=$cuenta_pagarLogic->getcuenta_pagar()->getId();
			}
		}
	}

	public function cargarComboscuenta_cobrarsFK($connexion=null,$strRecargarFkQuery='',$cuenta_corriente_detalleForeignKey,$cuenta_corriente_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuenta_cobrarLogic= new cuenta_cobrar_logic();
		$pagination= new Pagination();
		$cuenta_corriente_detalleForeignKey->cuenta_cobrarsFK=array();

		$cuenta_cobrarLogic->setConnexion($connexion);
		$cuenta_cobrarLogic->getcuenta_cobrarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncuenta_cobrar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_cobrar_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcuenta_cobrar=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta_cobrar=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta_cobrar, '');
				$finalQueryGlobalcuenta_cobrar.=cuenta_cobrar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta_cobrar.$strRecargarFkQuery;		

				$cuenta_cobrarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($cuenta_cobrarLogic->getcuenta_cobrars() as $cuenta_cobrarLocal ) {
				if($cuenta_corriente_detalleForeignKey->idcuenta_cobrarDefaultFK==0) {
					$cuenta_corriente_detalleForeignKey->idcuenta_cobrarDefaultFK=$cuenta_cobrarLocal->getId();
				}

				$cuenta_corriente_detalleForeignKey->cuenta_cobrarsFK[$cuenta_cobrarLocal->getId()]=cuenta_corriente_detalle_util::getcuenta_cobrarDescripcion($cuenta_cobrarLocal);
			}

		} else {

			if($cuenta_corriente_detalle_session->bigidcuenta_cobrarActual!=null && $cuenta_corriente_detalle_session->bigidcuenta_cobrarActual > 0) {
				$cuenta_cobrarLogic->getEntity($cuenta_corriente_detalle_session->bigidcuenta_cobrarActual);//WithConnection

				$cuenta_corriente_detalleForeignKey->cuenta_cobrarsFK[$cuenta_cobrarLogic->getcuenta_cobrar()->getId()]=cuenta_corriente_detalle_util::getcuenta_cobrarDescripcion($cuenta_cobrarLogic->getcuenta_cobrar());
				$cuenta_corriente_detalleForeignKey->idcuenta_cobrarDefaultFK=$cuenta_cobrarLogic->getcuenta_cobrar()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($cuenta_corriente_detalle,$clasificacioncheques) {
		$this->saveRelacionesBase($cuenta_corriente_detalle,$clasificacioncheques,true);
	}

	public function saveRelaciones($cuenta_corriente_detalle,$clasificacioncheques) {
		$this->saveRelacionesBase($cuenta_corriente_detalle,$clasificacioncheques,false);
	}

	public function saveRelacionesBase($cuenta_corriente_detalle,$clasificacioncheques=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$cuenta_corriente_detalle->setclasificacion_cheques($clasificacioncheques);
			$this->setcuenta_corriente_detalle($cuenta_corriente_detalle);

			if(true) {

				//cuenta_corriente_detalle_logic_add::updateRelacionesToSave($cuenta_corriente_detalle,$this);

				if(($this->cuenta_corriente_detalle->getIsNew() || $this->cuenta_corriente_detalle->getIsChanged()) && !$this->cuenta_corriente_detalle->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($clasificacioncheques);

				} else if($this->cuenta_corriente_detalle->getIsDeleted()) {
					$this->saveRelacionesDetalles($clasificacioncheques);
					$this->save();
				}

				//cuenta_corriente_detalle_logic_add::updateRelacionesToSaveAfter($cuenta_corriente_detalle,$this);

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
	
	
	public function saveRelacionesDetalles($clasificacioncheques=array()) {
		try {
	

			$idcuenta_corriente_detalleActual=$this->getcuenta_corriente_detalle()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/clasificacion_cheque_carga.php');
			clasificacion_cheque_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$clasificacionchequeLogic_Desde_cuenta_corriente_detalle=new clasificacion_cheque_logic();
			$clasificacionchequeLogic_Desde_cuenta_corriente_detalle->setclasificacion_cheques($clasificacioncheques);

			$clasificacionchequeLogic_Desde_cuenta_corriente_detalle->setConnexion($this->getConnexion());
			$clasificacionchequeLogic_Desde_cuenta_corriente_detalle->setDatosCliente($this->datosCliente);

			foreach($clasificacionchequeLogic_Desde_cuenta_corriente_detalle->getclasificacion_cheques() as $clasificacioncheque_Desde_cuenta_corriente_detalle) {
				$clasificacioncheque_Desde_cuenta_corriente_detalle->setid_cuenta_corriente_detalle($idcuenta_corriente_detalleActual);
			}

			$clasificacionchequeLogic_Desde_cuenta_corriente_detalle->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $cuenta_corriente_detalles,cuenta_corriente_detalle_param_return $cuenta_corriente_detalleParameterGeneral) : cuenta_corriente_detalle_param_return {
		$cuenta_corriente_detalleReturnGeneral=new cuenta_corriente_detalle_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $cuenta_corriente_detalleReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $cuenta_corriente_detalles,cuenta_corriente_detalle_param_return $cuenta_corriente_detalleParameterGeneral) : cuenta_corriente_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cuenta_corriente_detalleReturnGeneral=new cuenta_corriente_detalle_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $cuenta_corriente_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_corriente_detalles,cuenta_corriente_detalle $cuenta_corriente_detalle,cuenta_corriente_detalle_param_return $cuenta_corriente_detalleParameterGeneral,bool $isEsNuevocuenta_corriente_detalle,array $clases) : cuenta_corriente_detalle_param_return {
		 try {	
			$cuenta_corriente_detalleReturnGeneral=new cuenta_corriente_detalle_param_return();
	
			$cuenta_corriente_detalleReturnGeneral->setcuenta_corriente_detalle($cuenta_corriente_detalle);
			$cuenta_corriente_detalleReturnGeneral->setcuenta_corriente_detalles($cuenta_corriente_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cuenta_corriente_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $cuenta_corriente_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_corriente_detalles,cuenta_corriente_detalle $cuenta_corriente_detalle,cuenta_corriente_detalle_param_return $cuenta_corriente_detalleParameterGeneral,bool $isEsNuevocuenta_corriente_detalle,array $clases) : cuenta_corriente_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cuenta_corriente_detalleReturnGeneral=new cuenta_corriente_detalle_param_return();
	
			$cuenta_corriente_detalleReturnGeneral->setcuenta_corriente_detalle($cuenta_corriente_detalle);
			$cuenta_corriente_detalleReturnGeneral->setcuenta_corriente_detalles($cuenta_corriente_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cuenta_corriente_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $cuenta_corriente_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_corriente_detalles,cuenta_corriente_detalle $cuenta_corriente_detalle,cuenta_corriente_detalle_param_return $cuenta_corriente_detalleParameterGeneral,bool $isEsNuevocuenta_corriente_detalle,array $clases) : cuenta_corriente_detalle_param_return {
		 try {	
			$cuenta_corriente_detalleReturnGeneral=new cuenta_corriente_detalle_param_return();
	
			$cuenta_corriente_detalleReturnGeneral->setcuenta_corriente_detalle($cuenta_corriente_detalle);
			$cuenta_corriente_detalleReturnGeneral->setcuenta_corriente_detalles($cuenta_corriente_detalles);
			
			
			
			return $cuenta_corriente_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_corriente_detalles,cuenta_corriente_detalle $cuenta_corriente_detalle,cuenta_corriente_detalle_param_return $cuenta_corriente_detalleParameterGeneral,bool $isEsNuevocuenta_corriente_detalle,array $clases) : cuenta_corriente_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cuenta_corriente_detalleReturnGeneral=new cuenta_corriente_detalle_param_return();
	
			$cuenta_corriente_detalleReturnGeneral->setcuenta_corriente_detalle($cuenta_corriente_detalle);
			$cuenta_corriente_detalleReturnGeneral->setcuenta_corriente_detalles($cuenta_corriente_detalles);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $cuenta_corriente_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,cuenta_corriente_detalle $cuenta_corriente_detalle,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,cuenta_corriente_detalle $cuenta_corriente_detalle,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		cuenta_corriente_detalle_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		cuenta_corriente_detalle_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(cuenta_corriente_detalle $cuenta_corriente_detalle,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//cuenta_corriente_detalle_logic_add::updatecuenta_corriente_detalleToGet($this->cuenta_corriente_detalle);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cuenta_corriente_detalle->setempresa($this->cuenta_corriente_detalleDataAccess->getempresa($this->connexion,$cuenta_corriente_detalle));
		$cuenta_corriente_detalle->setejercicio($this->cuenta_corriente_detalleDataAccess->getejercicio($this->connexion,$cuenta_corriente_detalle));
		$cuenta_corriente_detalle->setperiodo($this->cuenta_corriente_detalleDataAccess->getperiodo($this->connexion,$cuenta_corriente_detalle));
		$cuenta_corriente_detalle->setusuario($this->cuenta_corriente_detalleDataAccess->getusuario($this->connexion,$cuenta_corriente_detalle));
		$cuenta_corriente_detalle->setcuenta_corriente($this->cuenta_corriente_detalleDataAccess->getcuenta_corriente($this->connexion,$cuenta_corriente_detalle));
		$cuenta_corriente_detalle->setcliente($this->cuenta_corriente_detalleDataAccess->getcliente($this->connexion,$cuenta_corriente_detalle));
		$cuenta_corriente_detalle->setproveedor($this->cuenta_corriente_detalleDataAccess->getproveedor($this->connexion,$cuenta_corriente_detalle));
		$cuenta_corriente_detalle->settabla($this->cuenta_corriente_detalleDataAccess->gettabla($this->connexion,$cuenta_corriente_detalle));
		$cuenta_corriente_detalle->setestado($this->cuenta_corriente_detalleDataAccess->getestado($this->connexion,$cuenta_corriente_detalle));
		$cuenta_corriente_detalle->setasiento($this->cuenta_corriente_detalleDataAccess->getasiento($this->connexion,$cuenta_corriente_detalle));
		$cuenta_corriente_detalle->setcuenta_pagar($this->cuenta_corriente_detalleDataAccess->getcuenta_pagar($this->connexion,$cuenta_corriente_detalle));
		$cuenta_corriente_detalle->setcuenta_cobrar($this->cuenta_corriente_detalleDataAccess->getcuenta_cobrar($this->connexion,$cuenta_corriente_detalle));
		$cuenta_corriente_detalle->setclasificacion_cheques($this->cuenta_corriente_detalleDataAccess->getclasificacion_cheques($this->connexion,$cuenta_corriente_detalle));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cuenta_corriente_detalle->setempresa($this->cuenta_corriente_detalleDataAccess->getempresa($this->connexion,$cuenta_corriente_detalle));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$cuenta_corriente_detalle->setejercicio($this->cuenta_corriente_detalleDataAccess->getejercicio($this->connexion,$cuenta_corriente_detalle));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$cuenta_corriente_detalle->setperiodo($this->cuenta_corriente_detalleDataAccess->getperiodo($this->connexion,$cuenta_corriente_detalle));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$cuenta_corriente_detalle->setusuario($this->cuenta_corriente_detalleDataAccess->getusuario($this->connexion,$cuenta_corriente_detalle));
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				$cuenta_corriente_detalle->setcuenta_corriente($this->cuenta_corriente_detalleDataAccess->getcuenta_corriente($this->connexion,$cuenta_corriente_detalle));
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$cuenta_corriente_detalle->setcliente($this->cuenta_corriente_detalleDataAccess->getcliente($this->connexion,$cuenta_corriente_detalle));
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$cuenta_corriente_detalle->setproveedor($this->cuenta_corriente_detalleDataAccess->getproveedor($this->connexion,$cuenta_corriente_detalle));
				continue;
			}

			if($clas->clas==tabla::$class.'') {
				$cuenta_corriente_detalle->settabla($this->cuenta_corriente_detalleDataAccess->gettabla($this->connexion,$cuenta_corriente_detalle));
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$cuenta_corriente_detalle->setestado($this->cuenta_corriente_detalleDataAccess->getestado($this->connexion,$cuenta_corriente_detalle));
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				$cuenta_corriente_detalle->setasiento($this->cuenta_corriente_detalleDataAccess->getasiento($this->connexion,$cuenta_corriente_detalle));
				continue;
			}

			if($clas->clas==cuenta_pagar::$class.'') {
				$cuenta_corriente_detalle->setcuenta_pagar($this->cuenta_corriente_detalleDataAccess->getcuenta_pagar($this->connexion,$cuenta_corriente_detalle));
				continue;
			}

			if($clas->clas==cuenta_cobrar::$class.'') {
				$cuenta_corriente_detalle->setcuenta_cobrar($this->cuenta_corriente_detalleDataAccess->getcuenta_cobrar($this->connexion,$cuenta_corriente_detalle));
				continue;
			}

			if($clas->clas==clasificacion_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta_corriente_detalle->setclasificacion_cheques($this->cuenta_corriente_detalleDataAccess->getclasificacion_cheques($this->connexion,$cuenta_corriente_detalle));

				if($this->isConDeep) {
					$clasificacionchequeLogic= new clasificacion_cheque_logic($this->connexion);
					$clasificacionchequeLogic->setclasificacion_cheques($cuenta_corriente_detalle->getclasificacion_cheques());
					$classesLocal=clasificacion_cheque_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$clasificacionchequeLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					clasificacion_cheque_util::refrescarFKDescripciones($clasificacionchequeLogic->getclasificacion_cheques());
					$cuenta_corriente_detalle->setclasificacion_cheques($clasificacionchequeLogic->getclasificacion_cheques());
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
			$cuenta_corriente_detalle->setempresa($this->cuenta_corriente_detalleDataAccess->getempresa($this->connexion,$cuenta_corriente_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->setejercicio($this->cuenta_corriente_detalleDataAccess->getejercicio($this->connexion,$cuenta_corriente_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->setperiodo($this->cuenta_corriente_detalleDataAccess->getperiodo($this->connexion,$cuenta_corriente_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->setusuario($this->cuenta_corriente_detalleDataAccess->getusuario($this->connexion,$cuenta_corriente_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->setcuenta_corriente($this->cuenta_corriente_detalleDataAccess->getcuenta_corriente($this->connexion,$cuenta_corriente_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->setcliente($this->cuenta_corriente_detalleDataAccess->getcliente($this->connexion,$cuenta_corriente_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->setproveedor($this->cuenta_corriente_detalleDataAccess->getproveedor($this->connexion,$cuenta_corriente_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tabla::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->settabla($this->cuenta_corriente_detalleDataAccess->gettabla($this->connexion,$cuenta_corriente_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->setestado($this->cuenta_corriente_detalleDataAccess->getestado($this->connexion,$cuenta_corriente_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->setasiento($this->cuenta_corriente_detalleDataAccess->getasiento($this->connexion,$cuenta_corriente_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->setcuenta_pagar($this->cuenta_corriente_detalleDataAccess->getcuenta_pagar($this->connexion,$cuenta_corriente_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->setcuenta_cobrar($this->cuenta_corriente_detalleDataAccess->getcuenta_cobrar($this->connexion,$cuenta_corriente_detalle));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==clasificacion_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(clasificacion_cheque::$class);
			$cuenta_corriente_detalle->setclasificacion_cheques($this->cuenta_corriente_detalleDataAccess->getclasificacion_cheques($this->connexion,$cuenta_corriente_detalle));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cuenta_corriente_detalle->setempresa($this->cuenta_corriente_detalleDataAccess->getempresa($this->connexion,$cuenta_corriente_detalle));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($cuenta_corriente_detalle->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_corriente_detalle->setejercicio($this->cuenta_corriente_detalleDataAccess->getejercicio($this->connexion,$cuenta_corriente_detalle));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($cuenta_corriente_detalle->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_corriente_detalle->setperiodo($this->cuenta_corriente_detalleDataAccess->getperiodo($this->connexion,$cuenta_corriente_detalle));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($cuenta_corriente_detalle->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_corriente_detalle->setusuario($this->cuenta_corriente_detalleDataAccess->getusuario($this->connexion,$cuenta_corriente_detalle));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($cuenta_corriente_detalle->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_corriente_detalle->setcuenta_corriente($this->cuenta_corriente_detalleDataAccess->getcuenta_corriente($this->connexion,$cuenta_corriente_detalle));
		$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
		$cuenta_corrienteLogic->deepLoad($cuenta_corriente_detalle->getcuenta_corriente(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_corriente_detalle->setcliente($this->cuenta_corriente_detalleDataAccess->getcliente($this->connexion,$cuenta_corriente_detalle));
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepLoad($cuenta_corriente_detalle->getcliente(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_corriente_detalle->setproveedor($this->cuenta_corriente_detalleDataAccess->getproveedor($this->connexion,$cuenta_corriente_detalle));
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepLoad($cuenta_corriente_detalle->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_corriente_detalle->settabla($this->cuenta_corriente_detalleDataAccess->gettabla($this->connexion,$cuenta_corriente_detalle));
		$tablaLogic= new tabla_logic($this->connexion);
		$tablaLogic->deepLoad($cuenta_corriente_detalle->gettabla(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_corriente_detalle->setestado($this->cuenta_corriente_detalleDataAccess->getestado($this->connexion,$cuenta_corriente_detalle));
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepLoad($cuenta_corriente_detalle->getestado(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_corriente_detalle->setasiento($this->cuenta_corriente_detalleDataAccess->getasiento($this->connexion,$cuenta_corriente_detalle));
		$asientoLogic= new asiento_logic($this->connexion);
		$asientoLogic->deepLoad($cuenta_corriente_detalle->getasiento(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_corriente_detalle->setcuenta_pagar($this->cuenta_corriente_detalleDataAccess->getcuenta_pagar($this->connexion,$cuenta_corriente_detalle));
		$cuenta_pagarLogic= new cuenta_pagar_logic($this->connexion);
		$cuenta_pagarLogic->deepLoad($cuenta_corriente_detalle->getcuenta_pagar(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_corriente_detalle->setcuenta_cobrar($this->cuenta_corriente_detalleDataAccess->getcuenta_cobrar($this->connexion,$cuenta_corriente_detalle));
		$cuenta_cobrarLogic= new cuenta_cobrar_logic($this->connexion);
		$cuenta_cobrarLogic->deepLoad($cuenta_corriente_detalle->getcuenta_cobrar(),$isDeep,$deepLoadType,$clases);
				

		$cuenta_corriente_detalle->setclasificacion_cheques($this->cuenta_corriente_detalleDataAccess->getclasificacion_cheques($this->connexion,$cuenta_corriente_detalle));

		foreach($cuenta_corriente_detalle->getclasificacion_cheques() as $clasificacioncheque) {
			$clasificacionchequeLogic= new clasificacion_cheque_logic($this->connexion);
			$clasificacionchequeLogic->deepLoad($clasificacioncheque,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cuenta_corriente_detalle->setempresa($this->cuenta_corriente_detalleDataAccess->getempresa($this->connexion,$cuenta_corriente_detalle));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($cuenta_corriente_detalle->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$cuenta_corriente_detalle->setejercicio($this->cuenta_corriente_detalleDataAccess->getejercicio($this->connexion,$cuenta_corriente_detalle));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($cuenta_corriente_detalle->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$cuenta_corriente_detalle->setperiodo($this->cuenta_corriente_detalleDataAccess->getperiodo($this->connexion,$cuenta_corriente_detalle));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($cuenta_corriente_detalle->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$cuenta_corriente_detalle->setusuario($this->cuenta_corriente_detalleDataAccess->getusuario($this->connexion,$cuenta_corriente_detalle));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($cuenta_corriente_detalle->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				$cuenta_corriente_detalle->setcuenta_corriente($this->cuenta_corriente_detalleDataAccess->getcuenta_corriente($this->connexion,$cuenta_corriente_detalle));
				$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
				$cuenta_corrienteLogic->deepLoad($cuenta_corriente_detalle->getcuenta_corriente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$cuenta_corriente_detalle->setcliente($this->cuenta_corriente_detalleDataAccess->getcliente($this->connexion,$cuenta_corriente_detalle));
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($cuenta_corriente_detalle->getcliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$cuenta_corriente_detalle->setproveedor($this->cuenta_corriente_detalleDataAccess->getproveedor($this->connexion,$cuenta_corriente_detalle));
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($cuenta_corriente_detalle->getproveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tabla::$class.'') {
				$cuenta_corriente_detalle->settabla($this->cuenta_corriente_detalleDataAccess->gettabla($this->connexion,$cuenta_corriente_detalle));
				$tablaLogic= new tabla_logic($this->connexion);
				$tablaLogic->deepLoad($cuenta_corriente_detalle->gettabla(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$cuenta_corriente_detalle->setestado($this->cuenta_corriente_detalleDataAccess->getestado($this->connexion,$cuenta_corriente_detalle));
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepLoad($cuenta_corriente_detalle->getestado(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				$cuenta_corriente_detalle->setasiento($this->cuenta_corriente_detalleDataAccess->getasiento($this->connexion,$cuenta_corriente_detalle));
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepLoad($cuenta_corriente_detalle->getasiento(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta_pagar::$class.'') {
				$cuenta_corriente_detalle->setcuenta_pagar($this->cuenta_corriente_detalleDataAccess->getcuenta_pagar($this->connexion,$cuenta_corriente_detalle));
				$cuenta_pagarLogic= new cuenta_pagar_logic($this->connexion);
				$cuenta_pagarLogic->deepLoad($cuenta_corriente_detalle->getcuenta_pagar(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta_cobrar::$class.'') {
				$cuenta_corriente_detalle->setcuenta_cobrar($this->cuenta_corriente_detalleDataAccess->getcuenta_cobrar($this->connexion,$cuenta_corriente_detalle));
				$cuenta_cobrarLogic= new cuenta_cobrar_logic($this->connexion);
				$cuenta_cobrarLogic->deepLoad($cuenta_corriente_detalle->getcuenta_cobrar(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==clasificacion_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta_corriente_detalle->setclasificacion_cheques($this->cuenta_corriente_detalleDataAccess->getclasificacion_cheques($this->connexion,$cuenta_corriente_detalle));

				foreach($cuenta_corriente_detalle->getclasificacion_cheques() as $clasificacioncheque) {
					$clasificacionchequeLogic= new clasificacion_cheque_logic($this->connexion);
					$clasificacionchequeLogic->deepLoad($clasificacioncheque,$isDeep,$deepLoadType,$clases);
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
			$cuenta_corriente_detalle->setempresa($this->cuenta_corriente_detalleDataAccess->getempresa($this->connexion,$cuenta_corriente_detalle));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($cuenta_corriente_detalle->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->setejercicio($this->cuenta_corriente_detalleDataAccess->getejercicio($this->connexion,$cuenta_corriente_detalle));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($cuenta_corriente_detalle->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->setperiodo($this->cuenta_corriente_detalleDataAccess->getperiodo($this->connexion,$cuenta_corriente_detalle));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($cuenta_corriente_detalle->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->setusuario($this->cuenta_corriente_detalleDataAccess->getusuario($this->connexion,$cuenta_corriente_detalle));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($cuenta_corriente_detalle->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->setcuenta_corriente($this->cuenta_corriente_detalleDataAccess->getcuenta_corriente($this->connexion,$cuenta_corriente_detalle));
			$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
			$cuenta_corrienteLogic->deepLoad($cuenta_corriente_detalle->getcuenta_corriente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->setcliente($this->cuenta_corriente_detalleDataAccess->getcliente($this->connexion,$cuenta_corriente_detalle));
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($cuenta_corriente_detalle->getcliente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->setproveedor($this->cuenta_corriente_detalleDataAccess->getproveedor($this->connexion,$cuenta_corriente_detalle));
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($cuenta_corriente_detalle->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tabla::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->settabla($this->cuenta_corriente_detalleDataAccess->gettabla($this->connexion,$cuenta_corriente_detalle));
			$tablaLogic= new tabla_logic($this->connexion);
			$tablaLogic->deepLoad($cuenta_corriente_detalle->gettabla(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->setestado($this->cuenta_corriente_detalleDataAccess->getestado($this->connexion,$cuenta_corriente_detalle));
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepLoad($cuenta_corriente_detalle->getestado(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->setasiento($this->cuenta_corriente_detalleDataAccess->getasiento($this->connexion,$cuenta_corriente_detalle));
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepLoad($cuenta_corriente_detalle->getasiento(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->setcuenta_pagar($this->cuenta_corriente_detalleDataAccess->getcuenta_pagar($this->connexion,$cuenta_corriente_detalle));
			$cuenta_pagarLogic= new cuenta_pagar_logic($this->connexion);
			$cuenta_pagarLogic->deepLoad($cuenta_corriente_detalle->getcuenta_pagar(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente_detalle->setcuenta_cobrar($this->cuenta_corriente_detalleDataAccess->getcuenta_cobrar($this->connexion,$cuenta_corriente_detalle));
			$cuenta_cobrarLogic= new cuenta_cobrar_logic($this->connexion);
			$cuenta_cobrarLogic->deepLoad($cuenta_corriente_detalle->getcuenta_cobrar(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==clasificacion_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(clasificacion_cheque::$class);
			$cuenta_corriente_detalle->setclasificacion_cheques($this->cuenta_corriente_detalleDataAccess->getclasificacion_cheques($this->connexion,$cuenta_corriente_detalle));

			foreach($cuenta_corriente_detalle->getclasificacion_cheques() as $clasificacioncheque) {
				$clasificacionchequeLogic= new clasificacion_cheque_logic($this->connexion);
				$clasificacionchequeLogic->deepLoad($clasificacioncheque,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(cuenta_corriente_detalle $cuenta_corriente_detalle,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//cuenta_corriente_detalle_logic_add::updatecuenta_corriente_detalleToSave($this->cuenta_corriente_detalle);			
			
			if(!$paraDeleteCascade) {				
				cuenta_corriente_detalle_data::save($cuenta_corriente_detalle, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($cuenta_corriente_detalle->getempresa(),$this->connexion);
		ejercicio_data::save($cuenta_corriente_detalle->getejercicio(),$this->connexion);
		periodo_data::save($cuenta_corriente_detalle->getperiodo(),$this->connexion);
		usuario_data::save($cuenta_corriente_detalle->getusuario(),$this->connexion);
		cuenta_corriente_data::save($cuenta_corriente_detalle->getcuenta_corriente(),$this->connexion);
		cliente_data::save($cuenta_corriente_detalle->getcliente(),$this->connexion);
		proveedor_data::save($cuenta_corriente_detalle->getproveedor(),$this->connexion);
		tabla_data::save($cuenta_corriente_detalle->gettabla(),$this->connexion);
		estado_data::save($cuenta_corriente_detalle->getestado(),$this->connexion);
		asiento_data::save($cuenta_corriente_detalle->getasiento(),$this->connexion);
		cuenta_pagar_data::save($cuenta_corriente_detalle->getcuenta_pagar(),$this->connexion);
		cuenta_cobrar_data::save($cuenta_corriente_detalle->getcuenta_cobrar(),$this->connexion);

		foreach($cuenta_corriente_detalle->getclasificacion_cheques() as $clasificacioncheque) {
			$clasificacioncheque->setid_cuenta_corriente_detalle($cuenta_corriente_detalle->getId());
			clasificacion_cheque_data::save($clasificacioncheque,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cuenta_corriente_detalle->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($cuenta_corriente_detalle->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($cuenta_corriente_detalle->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($cuenta_corriente_detalle->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				cuenta_corriente_data::save($cuenta_corriente_detalle->getcuenta_corriente(),$this->connexion);
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($cuenta_corriente_detalle->getcliente(),$this->connexion);
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($cuenta_corriente_detalle->getproveedor(),$this->connexion);
				continue;
			}

			if($clas->clas==tabla::$class.'') {
				tabla_data::save($cuenta_corriente_detalle->gettabla(),$this->connexion);
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($cuenta_corriente_detalle->getestado(),$this->connexion);
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				asiento_data::save($cuenta_corriente_detalle->getasiento(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta_pagar::$class.'') {
				cuenta_pagar_data::save($cuenta_corriente_detalle->getcuenta_pagar(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta_cobrar::$class.'') {
				cuenta_cobrar_data::save($cuenta_corriente_detalle->getcuenta_cobrar(),$this->connexion);
				continue;
			}


			if($clas->clas==clasificacion_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta_corriente_detalle->getclasificacion_cheques() as $clasificacioncheque) {
					$clasificacioncheque->setid_cuenta_corriente_detalle($cuenta_corriente_detalle->getId());
					clasificacion_cheque_data::save($clasificacioncheque,$this->connexion);
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
			empresa_data::save($cuenta_corriente_detalle->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($cuenta_corriente_detalle->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($cuenta_corriente_detalle->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($cuenta_corriente_detalle->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_corriente_data::save($cuenta_corriente_detalle->getcuenta_corriente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($cuenta_corriente_detalle->getcliente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($cuenta_corriente_detalle->getproveedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tabla::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tabla_data::save($cuenta_corriente_detalle->gettabla(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($cuenta_corriente_detalle->getestado(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_data::save($cuenta_corriente_detalle->getasiento(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_pagar_data::save($cuenta_corriente_detalle->getcuenta_pagar(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_cobrar_data::save($cuenta_corriente_detalle->getcuenta_cobrar(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==clasificacion_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(clasificacion_cheque::$class);

			foreach($cuenta_corriente_detalle->getclasificacion_cheques() as $clasificacioncheque) {
				$clasificacioncheque->setid_cuenta_corriente_detalle($cuenta_corriente_detalle->getId());
				clasificacion_cheque_data::save($clasificacioncheque,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($cuenta_corriente_detalle->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($cuenta_corriente_detalle->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($cuenta_corriente_detalle->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($cuenta_corriente_detalle->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($cuenta_corriente_detalle->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($cuenta_corriente_detalle->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($cuenta_corriente_detalle->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($cuenta_corriente_detalle->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_corriente_data::save($cuenta_corriente_detalle->getcuenta_corriente(),$this->connexion);
		$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
		$cuenta_corrienteLogic->deepSave($cuenta_corriente_detalle->getcuenta_corriente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cliente_data::save($cuenta_corriente_detalle->getcliente(),$this->connexion);
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepSave($cuenta_corriente_detalle->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		proveedor_data::save($cuenta_corriente_detalle->getproveedor(),$this->connexion);
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepSave($cuenta_corriente_detalle->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tabla_data::save($cuenta_corriente_detalle->gettabla(),$this->connexion);
		$tablaLogic= new tabla_logic($this->connexion);
		$tablaLogic->deepSave($cuenta_corriente_detalle->gettabla(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		estado_data::save($cuenta_corriente_detalle->getestado(),$this->connexion);
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepSave($cuenta_corriente_detalle->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		asiento_data::save($cuenta_corriente_detalle->getasiento(),$this->connexion);
		$asientoLogic= new asiento_logic($this->connexion);
		$asientoLogic->deepSave($cuenta_corriente_detalle->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_pagar_data::save($cuenta_corriente_detalle->getcuenta_pagar(),$this->connexion);
		$cuenta_pagarLogic= new cuenta_pagar_logic($this->connexion);
		$cuenta_pagarLogic->deepSave($cuenta_corriente_detalle->getcuenta_pagar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_cobrar_data::save($cuenta_corriente_detalle->getcuenta_cobrar(),$this->connexion);
		$cuenta_cobrarLogic= new cuenta_cobrar_logic($this->connexion);
		$cuenta_cobrarLogic->deepSave($cuenta_corriente_detalle->getcuenta_cobrar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($cuenta_corriente_detalle->getclasificacion_cheques() as $clasificacioncheque) {
			$clasificacionchequeLogic= new clasificacion_cheque_logic($this->connexion);
			$clasificacioncheque->setid_cuenta_corriente_detalle($cuenta_corriente_detalle->getId());
			clasificacion_cheque_data::save($clasificacioncheque,$this->connexion);
			$clasificacionchequeLogic->deepSave($clasificacioncheque,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cuenta_corriente_detalle->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($cuenta_corriente_detalle->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($cuenta_corriente_detalle->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($cuenta_corriente_detalle->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($cuenta_corriente_detalle->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($cuenta_corriente_detalle->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($cuenta_corriente_detalle->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($cuenta_corriente_detalle->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				cuenta_corriente_data::save($cuenta_corriente_detalle->getcuenta_corriente(),$this->connexion);
				$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
				$cuenta_corrienteLogic->deepSave($cuenta_corriente_detalle->getcuenta_corriente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($cuenta_corriente_detalle->getcliente(),$this->connexion);
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepSave($cuenta_corriente_detalle->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($cuenta_corriente_detalle->getproveedor(),$this->connexion);
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepSave($cuenta_corriente_detalle->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tabla::$class.'') {
				tabla_data::save($cuenta_corriente_detalle->gettabla(),$this->connexion);
				$tablaLogic= new tabla_logic($this->connexion);
				$tablaLogic->deepSave($cuenta_corriente_detalle->gettabla(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($cuenta_corriente_detalle->getestado(),$this->connexion);
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepSave($cuenta_corriente_detalle->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				asiento_data::save($cuenta_corriente_detalle->getasiento(),$this->connexion);
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepSave($cuenta_corriente_detalle->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta_pagar::$class.'') {
				cuenta_pagar_data::save($cuenta_corriente_detalle->getcuenta_pagar(),$this->connexion);
				$cuenta_pagarLogic= new cuenta_pagar_logic($this->connexion);
				$cuenta_pagarLogic->deepSave($cuenta_corriente_detalle->getcuenta_pagar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta_cobrar::$class.'') {
				cuenta_cobrar_data::save($cuenta_corriente_detalle->getcuenta_cobrar(),$this->connexion);
				$cuenta_cobrarLogic= new cuenta_cobrar_logic($this->connexion);
				$cuenta_cobrarLogic->deepSave($cuenta_corriente_detalle->getcuenta_cobrar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==clasificacion_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta_corriente_detalle->getclasificacion_cheques() as $clasificacioncheque) {
					$clasificacionchequeLogic= new clasificacion_cheque_logic($this->connexion);
					$clasificacioncheque->setid_cuenta_corriente_detalle($cuenta_corriente_detalle->getId());
					clasificacion_cheque_data::save($clasificacioncheque,$this->connexion);
					$clasificacionchequeLogic->deepSave($clasificacioncheque,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($cuenta_corriente_detalle->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($cuenta_corriente_detalle->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($cuenta_corriente_detalle->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($cuenta_corriente_detalle->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($cuenta_corriente_detalle->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($cuenta_corriente_detalle->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($cuenta_corriente_detalle->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($cuenta_corriente_detalle->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_corriente_data::save($cuenta_corriente_detalle->getcuenta_corriente(),$this->connexion);
			$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
			$cuenta_corrienteLogic->deepSave($cuenta_corriente_detalle->getcuenta_corriente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($cuenta_corriente_detalle->getcliente(),$this->connexion);
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepSave($cuenta_corriente_detalle->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($cuenta_corriente_detalle->getproveedor(),$this->connexion);
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepSave($cuenta_corriente_detalle->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tabla::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tabla_data::save($cuenta_corriente_detalle->gettabla(),$this->connexion);
			$tablaLogic= new tabla_logic($this->connexion);
			$tablaLogic->deepSave($cuenta_corriente_detalle->gettabla(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($cuenta_corriente_detalle->getestado(),$this->connexion);
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepSave($cuenta_corriente_detalle->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_data::save($cuenta_corriente_detalle->getasiento(),$this->connexion);
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepSave($cuenta_corriente_detalle->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_pagar_data::save($cuenta_corriente_detalle->getcuenta_pagar(),$this->connexion);
			$cuenta_pagarLogic= new cuenta_pagar_logic($this->connexion);
			$cuenta_pagarLogic->deepSave($cuenta_corriente_detalle->getcuenta_pagar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_cobrar_data::save($cuenta_corriente_detalle->getcuenta_cobrar(),$this->connexion);
			$cuenta_cobrarLogic= new cuenta_cobrar_logic($this->connexion);
			$cuenta_cobrarLogic->deepSave($cuenta_corriente_detalle->getcuenta_cobrar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==clasificacion_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(clasificacion_cheque::$class);

			foreach($cuenta_corriente_detalle->getclasificacion_cheques() as $clasificacioncheque) {
				$clasificacionchequeLogic= new clasificacion_cheque_logic($this->connexion);
				$clasificacioncheque->setid_cuenta_corriente_detalle($cuenta_corriente_detalle->getId());
				clasificacion_cheque_data::save($clasificacioncheque,$this->connexion);
				$clasificacionchequeLogic->deepSave($clasificacioncheque,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				cuenta_corriente_detalle_data::save($cuenta_corriente_detalle, $this->connexion);
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
			
			$this->deepLoad($this->cuenta_corriente_detalle,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->cuenta_corriente_detalles as $cuenta_corriente_detalle) {
				$this->deepLoad($cuenta_corriente_detalle,$isDeep,$deepLoadType,$clases);
								
				cuenta_corriente_detalle_util::refrescarFKDescripciones($this->cuenta_corriente_detalles);
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
			
			foreach($this->cuenta_corriente_detalles as $cuenta_corriente_detalle) {
				$this->deepLoad($cuenta_corriente_detalle,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->cuenta_corriente_detalle,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->cuenta_corriente_detalles as $cuenta_corriente_detalle) {
				$this->deepSave($cuenta_corriente_detalle,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->cuenta_corriente_detalles as $cuenta_corriente_detalle) {
				$this->deepSave($cuenta_corriente_detalle,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(usuario::$class);
				$classes[]=new Classe(cuenta_corriente::$class);
				$classes[]=new Classe(cliente::$class);
				$classes[]=new Classe(proveedor::$class);
				$classes[]=new Classe(tabla::$class);
				$classes[]=new Classe(estado::$class);
				$classes[]=new Classe(asiento::$class);
				$classes[]=new Classe(cuenta_pagar::$class);
				$classes[]=new Classe(cuenta_cobrar::$class);
				
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

				foreach($classesP as $clas)
				{
					if($clas->clas==usuario::$class) {
						$classes[]=new Classe(usuario::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta_corriente::$class) {
						$classes[]=new Classe(cuenta_corriente::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==tabla::$class) {
						$classes[]=new Classe(tabla::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==estado::$class) {
						$classes[]=new Classe(estado::$class);
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
					if($clas->clas==cuenta_pagar::$class) {
						$classes[]=new Classe(cuenta_pagar::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta_cobrar::$class) {
						$classes[]=new Classe(cuenta_cobrar::$class);
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
					if($clas->clas==cuenta_corriente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_corriente::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cliente::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(proveedor::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==tabla::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tabla::$class);
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
					if($clas->clas==cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_cobrar::$class);
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
				
				$classes[]=new Classe(clasificacion_cheque::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==clasificacion_cheque::$class) {
						$classes[]=new Classe(clasificacion_cheque::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==clasificacion_cheque::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(clasificacion_cheque::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getcuenta_corriente_detalle() : ?cuenta_corriente_detalle {	
		/*
		cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGet($this->cuenta_corriente_detalle,$this->datosCliente);
		cuenta_corriente_detalle_logic_add::updatecuenta_corriente_detalleToGet($this->cuenta_corriente_detalle);
		*/
			
		return $this->cuenta_corriente_detalle;
	}
		
	public function setcuenta_corriente_detalle(cuenta_corriente_detalle $newcuenta_corriente_detalle) {
		$this->cuenta_corriente_detalle = $newcuenta_corriente_detalle;
	}
	
	public function getcuenta_corriente_detalles() : array {		
		/*
		cuenta_corriente_detalle_logic_add::checkcuenta_corriente_detalleToGets($this->cuenta_corriente_detalles,$this->datosCliente);
		
		foreach ($this->cuenta_corriente_detalles as $cuenta_corriente_detalleLocal ) {
			cuenta_corriente_detalle_logic_add::updatecuenta_corriente_detalleToGet($cuenta_corriente_detalleLocal);
		}
		*/
		
		return $this->cuenta_corriente_detalles;
	}
	
	public function setcuenta_corriente_detalles(array $newcuenta_corriente_detalles) {
		$this->cuenta_corriente_detalles = $newcuenta_corriente_detalles;
	}
	
	public function getcuenta_corriente_detalleDataAccess() : cuenta_corriente_detalle_data {
		return $this->cuenta_corriente_detalleDataAccess;
	}
	
	public function setcuenta_corriente_detalleDataAccess(cuenta_corriente_detalle_data $newcuenta_corriente_detalleDataAccess) {
		$this->cuenta_corriente_detalleDataAccess = $newcuenta_corriente_detalleDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        cuenta_corriente_detalle_carga::$CONTROLLER;;        
		
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
