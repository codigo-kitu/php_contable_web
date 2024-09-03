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

namespace com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_param_return;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\presentation\session\cuenta_corriente_session;

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

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\data\cuenta_corriente_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\cuentascorrientes\banco\business\entity\banco;
use com\bydan\contabilidad\cuentascorrientes\banco\business\data\banco_data;
use com\bydan\contabilidad\cuentascorrientes\banco\business\logic\banco_logic;
use com\bydan\contabilidad\cuentascorrientes\banco\util\banco_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\business\entity\estado_cuentas_corrientes;
use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\business\data\estado_cuentas_corrientes_data;
use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\business\logic\estado_cuentas_corrientes_logic;
use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\util\estado_cuentas_corrientes_util;

//REL


use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\entity\cheque_cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\data\cheque_cuenta_corriente_data;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\logic\cheque_cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_util;

use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\business\entity\retiro_cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\business\data\retiro_cuenta_corriente_data;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\business\logic\retiro_cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\util\retiro_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\util\retiro_cuenta_corriente_util;

use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\business\entity\deposito_cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\business\data\deposito_cuenta_corriente_data;
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\business\logic\deposito_cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\util\deposito_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\util\deposito_cuenta_corriente_util;

//REL DETALLES




class cuenta_corriente_logic  extends GeneralEntityLogic implements cuenta_corriente_logicI {	
	/*GENERAL*/
	public cuenta_corriente_data $cuenta_corrienteDataAccess;
	public ?cuenta_corriente_logic_add $cuenta_corrienteLogicAdditional=null;
	public ?cuenta_corriente $cuenta_corriente;
	public array $cuenta_corrientes;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->cuenta_corrienteDataAccess = new cuenta_corriente_data();			
			$this->cuenta_corrientes = array();
			$this->cuenta_corriente = new cuenta_corriente();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->cuenta_corrienteLogicAdditional = new cuenta_corriente_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->cuenta_corrienteLogicAdditional==null) {
			$this->cuenta_corrienteLogicAdditional=new cuenta_corriente_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->cuenta_corrienteDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->cuenta_corrienteDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->cuenta_corrienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->cuenta_corrienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->cuenta_corrientes = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->cuenta_corrientes = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);
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
		$this->cuenta_corriente = new cuenta_corriente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->cuenta_corriente=$this->cuenta_corrienteDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_corriente_util::refrescarFKDescripcion($this->cuenta_corriente);
			}
						
			cuenta_corriente_logic_add::checkcuenta_corrienteToGet($this->cuenta_corriente,$this->datosCliente);
			cuenta_corriente_logic_add::updatecuenta_corrienteToGet($this->cuenta_corriente);
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
		$this->cuenta_corriente = new  cuenta_corriente();
		  		  
        try {		
			$this->cuenta_corriente=$this->cuenta_corrienteDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_corriente_util::refrescarFKDescripcion($this->cuenta_corriente);
			}
			
			cuenta_corriente_logic_add::checkcuenta_corrienteToGet($this->cuenta_corriente,$this->datosCliente);
			cuenta_corriente_logic_add::updatecuenta_corrienteToGet($this->cuenta_corriente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?cuenta_corriente {
		$cuenta_corrienteLogic = new  cuenta_corriente_logic();
		  		  
        try {		
			$cuenta_corrienteLogic->setConnexion($connexion);			
			$cuenta_corrienteLogic->getEntity($id);			
			return $cuenta_corrienteLogic->getcuenta_corriente();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->cuenta_corriente = new  cuenta_corriente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->cuenta_corriente=$this->cuenta_corrienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_corriente_util::refrescarFKDescripcion($this->cuenta_corriente);
			}
			
			cuenta_corriente_logic_add::checkcuenta_corrienteToGet($this->cuenta_corriente,$this->datosCliente);
			cuenta_corriente_logic_add::updatecuenta_corrienteToGet($this->cuenta_corriente);
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
		$this->cuenta_corriente = new  cuenta_corriente();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_corriente=$this->cuenta_corrienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_corriente_util::refrescarFKDescripcion($this->cuenta_corriente);
			}
			
			cuenta_corriente_logic_add::checkcuenta_corrienteToGet($this->cuenta_corriente,$this->datosCliente);
			cuenta_corriente_logic_add::updatecuenta_corrienteToGet($this->cuenta_corriente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?cuenta_corriente {
		$cuenta_corrienteLogic = new  cuenta_corriente_logic();
		  		  
        try {		
			$cuenta_corrienteLogic->setConnexion($connexion);			
			$cuenta_corrienteLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $cuenta_corrienteLogic->getcuenta_corriente();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cuenta_corrientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);			
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
		$this->cuenta_corrientes = array();
		  		  
        try {			
			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->cuenta_corrientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);
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
		$this->cuenta_corrientes = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$cuenta_corrienteLogic = new  cuenta_corriente_logic();
		  		  
        try {		
			$cuenta_corrienteLogic->setConnexion($connexion);			
			$cuenta_corrienteLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $cuenta_corrienteLogic->getcuenta_corrientes();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->cuenta_corrientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);
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
		$this->cuenta_corrientes = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->cuenta_corrientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);
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
		$this->cuenta_corrientes = array();
		  		  
        try {			
			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}	
			
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cuenta_corrientes = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);
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
		$this->cuenta_corrientes = array();
		  		  
        try {		
			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdbancoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_banco) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_banco= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_banco->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_banco,cuenta_corriente_util::$ID_BANCO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_banco);

			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idbanco(string $strFinalQuery,Pagination $pagination,int $id_banco) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_banco= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_banco->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_banco,cuenta_corriente_util::$ID_BANCO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_banco);

			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdcuentaWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_cuenta) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,cuenta_corriente_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta(string $strFinalQuery,Pagination $pagination,?int $id_cuenta) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,cuenta_corriente_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cuenta_corriente_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cuenta_corriente_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idestado_cuentas_corrientesWithConnection(string $strFinalQuery,Pagination $pagination,int $id_estado_cuentas_corrientes) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estado_cuentas_corrientes= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estado_cuentas_corrientes->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado_cuentas_corrientes,cuenta_corriente_util::$ID_ESTADO_CUENTAS_CORRIENTES,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado_cuentas_corrientes);

			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idestado_cuentas_corrientes(string $strFinalQuery,Pagination $pagination,int $id_estado_cuentas_corrientes) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estado_cuentas_corrientes= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estado_cuentas_corrientes->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado_cuentas_corrientes,cuenta_corriente_util::$ID_ESTADO_CUENTAS_CORRIENTES,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado_cuentas_corrientes);

			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,cuenta_corriente_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,cuenta_corriente_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->cuenta_corrientes=$this->cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_corrientes);
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
						
			//cuenta_corriente_logic_add::checkcuenta_corrienteToSave($this->cuenta_corriente,$this->datosCliente,$this->connexion);	       
			cuenta_corriente_logic_add::updatecuenta_corrienteToSave($this->cuenta_corriente);			
			cuenta_corriente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cuenta_corriente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->cuenta_corrienteLogicAdditional->checkGeneralEntityToSave($this,$this->cuenta_corriente,$this->datosCliente,$this->connexion);
			
			
			cuenta_corriente_data::save($this->cuenta_corriente, $this->connexion);	    	       	 				
			//cuenta_corriente_logic_add::checkcuenta_corrienteToSaveAfter($this->cuenta_corriente,$this->datosCliente,$this->connexion);			
			$this->cuenta_corrienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cuenta_corriente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cuenta_corriente_util::refrescarFKDescripcion($this->cuenta_corriente);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->cuenta_corriente->getIsDeleted()) {
				$this->cuenta_corriente=null;
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
						
			/*cuenta_corriente_logic_add::checkcuenta_corrienteToSave($this->cuenta_corriente,$this->datosCliente,$this->connexion);*/	        
			cuenta_corriente_logic_add::updatecuenta_corrienteToSave($this->cuenta_corriente);			
			$this->cuenta_corrienteLogicAdditional->checkGeneralEntityToSave($this,$this->cuenta_corriente,$this->datosCliente,$this->connexion);			
			cuenta_corriente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cuenta_corriente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			cuenta_corriente_data::save($this->cuenta_corriente, $this->connexion);	    	       	 						
			/*cuenta_corriente_logic_add::checkcuenta_corrienteToSaveAfter($this->cuenta_corriente,$this->datosCliente,$this->connexion);*/			
			$this->cuenta_corrienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cuenta_corriente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cuenta_corriente_util::refrescarFKDescripcion($this->cuenta_corriente);				
			}
			
			if($this->cuenta_corriente->getIsDeleted()) {
				$this->cuenta_corriente=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(cuenta_corriente $cuenta_corriente,Connexion $connexion)  {
		$cuenta_corrienteLogic = new  cuenta_corriente_logic();		  		  
        try {		
			$cuenta_corrienteLogic->setConnexion($connexion);			
			$cuenta_corrienteLogic->setcuenta_corriente($cuenta_corriente);			
			$cuenta_corrienteLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*cuenta_corriente_logic_add::checkcuenta_corrienteToSaves($this->cuenta_corrientes,$this->datosCliente,$this->connexion);*/	        	
			$this->cuenta_corrienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cuenta_corrientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cuenta_corrientes as $cuenta_corrienteLocal) {				
								
				cuenta_corriente_logic_add::updatecuenta_corrienteToSave($cuenta_corrienteLocal);	        	
				cuenta_corriente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cuenta_corrienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				cuenta_corriente_data::save($cuenta_corrienteLocal, $this->connexion);				
			}
			
			/*cuenta_corriente_logic_add::checkcuenta_corrienteToSavesAfter($this->cuenta_corrientes,$this->datosCliente,$this->connexion);*/			
			$this->cuenta_corrienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cuenta_corrientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
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
			/*cuenta_corriente_logic_add::checkcuenta_corrienteToSaves($this->cuenta_corrientes,$this->datosCliente,$this->connexion);*/			
			$this->cuenta_corrienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cuenta_corrientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cuenta_corrientes as $cuenta_corrienteLocal) {				
								
				cuenta_corriente_logic_add::updatecuenta_corrienteToSave($cuenta_corrienteLocal);	        	
				cuenta_corriente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cuenta_corrienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				cuenta_corriente_data::save($cuenta_corrienteLocal, $this->connexion);				
			}			
			
			/*cuenta_corriente_logic_add::checkcuenta_corrienteToSavesAfter($this->cuenta_corrientes,$this->datosCliente,$this->connexion);*/			
			$this->cuenta_corrienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cuenta_corrientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $cuenta_corrientes,Connexion $connexion)  {
		$cuenta_corrienteLogic = new  cuenta_corriente_logic();
		  		  
        try {		
			$cuenta_corrienteLogic->setConnexion($connexion);			
			$cuenta_corrienteLogic->setcuenta_corrientes($cuenta_corrientes);			
			$cuenta_corrienteLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$cuenta_corrientesAux=array();
		
		foreach($this->cuenta_corrientes as $cuenta_corriente) {
			if($cuenta_corriente->getIsDeleted()==false) {
				$cuenta_corrientesAux[]=$cuenta_corriente;
			}
		}
		
		$this->cuenta_corrientes=$cuenta_corrientesAux;
	}
	
	public function updateToGetsAuxiliar(array &$cuenta_corrientes) {
		if($this->cuenta_corrienteLogicAdditional==null) {
			$this->cuenta_corrienteLogicAdditional=new cuenta_corriente_logic_add();
		}
		
		
		$this->cuenta_corrienteLogicAdditional->updateToGets($cuenta_corrientes,$this);					
		$this->cuenta_corrienteLogicAdditional->updateToGetsReferencia($cuenta_corrientes,$this);			
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->cuenta_corrientes as $cuenta_corriente) {
				
				$cuenta_corriente->setid_empresa_Descripcion(cuenta_corriente_util::getempresaDescripcion($cuenta_corriente->getempresa()));
				$cuenta_corriente->setid_usuario_Descripcion(cuenta_corriente_util::getusuarioDescripcion($cuenta_corriente->getusuario()));
				$cuenta_corriente->setid_banco_Descripcion(cuenta_corriente_util::getbancoDescripcion($cuenta_corriente->getbanco()));
				$cuenta_corriente->setid_cuenta_Descripcion(cuenta_corriente_util::getcuentaDescripcion($cuenta_corriente->getcuenta()));
				$cuenta_corriente->setid_estado_cuentas_corrientes_Descripcion(cuenta_corriente_util::getestado_cuentas_corrientesDescripcion($cuenta_corriente->getestado_cuentas_corrientes()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cuenta_corriente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cuenta_corriente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cuenta_corriente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$cuenta_corrienteForeignKey=new cuenta_corriente_param_return();//cuenta_corrienteForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$cuenta_corrienteForeignKey,$cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$cuenta_corrienteForeignKey,$cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_banco',$strRecargarFkTipos,',')) {
				$this->cargarCombosbancosFK($this->connexion,$strRecargarFkQuery,$cuenta_corrienteForeignKey,$cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTipos,',')) {
				$this->cargarComboscuentasFK($this->connexion,$strRecargarFkQuery,$cuenta_corrienteForeignKey,$cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado_cuentas_corrientes',$strRecargarFkTipos,',')) {
				$this->cargarCombosestado_cuentas_corrientessFK($this->connexion,$strRecargarFkQuery,$cuenta_corrienteForeignKey,$cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$cuenta_corrienteForeignKey,$cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$cuenta_corrienteForeignKey,$cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_banco',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosbancosFK($this->connexion,' where id=-1 ',$cuenta_corrienteForeignKey,$cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuentasFK($this->connexion,' where id=-1 ',$cuenta_corrienteForeignKey,$cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_estado_cuentas_corrientes',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosestado_cuentas_corrientessFK($this->connexion,' where id=-1 ',$cuenta_corrienteForeignKey,$cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $cuenta_corrienteForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$cuenta_corrienteForeignKey,$cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$cuenta_corrienteForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_corriente_session==null) {
			$cuenta_corriente_session=new cuenta_corriente_session();
		}
		
		if($cuenta_corriente_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($cuenta_corrienteForeignKey->idempresaDefaultFK==0) {
					$cuenta_corrienteForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$cuenta_corrienteForeignKey->empresasFK[$empresaLocal->getId()]=cuenta_corriente_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($cuenta_corriente_session->bigidempresaActual!=null && $cuenta_corriente_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cuenta_corriente_session->bigidempresaActual);//WithConnection

				$cuenta_corrienteForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=cuenta_corriente_util::getempresaDescripcion($empresaLogic->getempresa());
				$cuenta_corrienteForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$cuenta_corrienteForeignKey,$cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$cuenta_corrienteForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_corriente_session==null) {
			$cuenta_corriente_session=new cuenta_corriente_session();
		}
		
		if($cuenta_corriente_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($cuenta_corrienteForeignKey->idusuarioDefaultFK==0) {
					$cuenta_corrienteForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$cuenta_corrienteForeignKey->usuariosFK[$usuarioLocal->getId()]=cuenta_corriente_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($cuenta_corriente_session->bigidusuarioActual!=null && $cuenta_corriente_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($cuenta_corriente_session->bigidusuarioActual);//WithConnection

				$cuenta_corrienteForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=cuenta_corriente_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$cuenta_corrienteForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosbancosFK($connexion=null,$strRecargarFkQuery='',$cuenta_corrienteForeignKey,$cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$bancoLogic= new banco_logic();
		$pagination= new Pagination();
		$cuenta_corrienteForeignKey->bancosFK=array();

		$bancoLogic->setConnexion($connexion);
		$bancoLogic->getbancoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_corriente_session==null) {
			$cuenta_corriente_session=new cuenta_corriente_session();
		}
		
		if($cuenta_corriente_session->bitBusquedaDesdeFKSesionbanco!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=banco_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalbanco=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalbanco=Funciones::GetFinalQueryAppend($finalQueryGlobalbanco, '');
				$finalQueryGlobalbanco.=banco_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalbanco.$strRecargarFkQuery;		

				$bancoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($bancoLogic->getbancos() as $bancoLocal ) {
				if($cuenta_corrienteForeignKey->idbancoDefaultFK==0) {
					$cuenta_corrienteForeignKey->idbancoDefaultFK=$bancoLocal->getId();
				}

				$cuenta_corrienteForeignKey->bancosFK[$bancoLocal->getId()]=cuenta_corriente_util::getbancoDescripcion($bancoLocal);
			}

		} else {

			if($cuenta_corriente_session->bigidbancoActual!=null && $cuenta_corriente_session->bigidbancoActual > 0) {
				$bancoLogic->getEntity($cuenta_corriente_session->bigidbancoActual);//WithConnection

				$cuenta_corrienteForeignKey->bancosFK[$bancoLogic->getbanco()->getId()]=cuenta_corriente_util::getbancoDescripcion($bancoLogic->getbanco());
				$cuenta_corrienteForeignKey->idbancoDefaultFK=$bancoLogic->getbanco()->getId();
			}
		}
	}

	public function cargarComboscuentasFK($connexion=null,$strRecargarFkQuery='',$cuenta_corrienteForeignKey,$cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$cuenta_corrienteForeignKey->cuentasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_corriente_session==null) {
			$cuenta_corriente_session=new cuenta_corriente_session();
		}
		
		if($cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta!=true) {
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
				if($cuenta_corrienteForeignKey->idcuentaDefaultFK==0) {
					$cuenta_corrienteForeignKey->idcuentaDefaultFK=$cuentaLocal->getId();
				}

				$cuenta_corrienteForeignKey->cuentasFK[$cuentaLocal->getId()]=cuenta_corriente_util::getcuentaDescripcion($cuentaLocal);
			}

		} else {

			if($cuenta_corriente_session->bigidcuentaActual!=null && $cuenta_corriente_session->bigidcuentaActual > 0) {
				$cuentaLogic->getEntity($cuenta_corriente_session->bigidcuentaActual);//WithConnection

				$cuenta_corrienteForeignKey->cuentasFK[$cuentaLogic->getcuenta()->getId()]=cuenta_corriente_util::getcuentaDescripcion($cuentaLogic->getcuenta());
				$cuenta_corrienteForeignKey->idcuentaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarCombosestado_cuentas_corrientessFK($connexion=null,$strRecargarFkQuery='',$cuenta_corrienteForeignKey,$cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$estado_cuentas_corrientesLogic= new estado_cuentas_corrientes_logic();
		$pagination= new Pagination();
		$cuenta_corrienteForeignKey->estado_cuentas_corrientessFK=array();

		$estado_cuentas_corrientesLogic->setConnexion($connexion);
		$estado_cuentas_corrientesLogic->getestado_cuentas_corrientesDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_corriente_session==null) {
			$cuenta_corriente_session=new cuenta_corriente_session();
		}
		
		if($cuenta_corriente_session->bitBusquedaDesdeFKSesionestado_cuentas_corrientes!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=estado_cuentas_corrientes_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalestado_cuentas_corrientes=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalestado_cuentas_corrientes=Funciones::GetFinalQueryAppend($finalQueryGlobalestado_cuentas_corrientes, '');
				$finalQueryGlobalestado_cuentas_corrientes.=estado_cuentas_corrientes_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalestado_cuentas_corrientes.$strRecargarFkQuery;		

				$estado_cuentas_corrientesLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($estado_cuentas_corrientesLogic->getestado_cuentas_corrientess() as $estado_cuentas_corrientesLocal ) {
				if($cuenta_corrienteForeignKey->idestado_cuentas_corrientesDefaultFK==0) {
					$cuenta_corrienteForeignKey->idestado_cuentas_corrientesDefaultFK=$estado_cuentas_corrientesLocal->getId();
				}

				$cuenta_corrienteForeignKey->estado_cuentas_corrientessFK[$estado_cuentas_corrientesLocal->getId()]=cuenta_corriente_util::getestado_cuentas_corrientesDescripcion($estado_cuentas_corrientesLocal);
			}

		} else {

			if($cuenta_corriente_session->bigidestado_cuentas_corrientesActual!=null && $cuenta_corriente_session->bigidestado_cuentas_corrientesActual > 0) {
				$estado_cuentas_corrientesLogic->getEntity($cuenta_corriente_session->bigidestado_cuentas_corrientesActual);//WithConnection

				$cuenta_corrienteForeignKey->estado_cuentas_corrientessFK[$estado_cuentas_corrientesLogic->getestado_cuentas_corrientes()->getId()]=cuenta_corriente_util::getestado_cuentas_corrientesDescripcion($estado_cuentas_corrientesLogic->getestado_cuentas_corrientes());
				$cuenta_corrienteForeignKey->idestado_cuentas_corrientesDefaultFK=$estado_cuentas_corrientesLogic->getestado_cuentas_corrientes()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($cuenta_corriente,$chequecuentacorrientes,$retirocuentacorrientes,$depositocuentacorrientes) {
		$this->saveRelacionesBase($cuenta_corriente,$chequecuentacorrientes,$retirocuentacorrientes,$depositocuentacorrientes,true);
	}

	public function saveRelaciones($cuenta_corriente,$chequecuentacorrientes,$retirocuentacorrientes,$depositocuentacorrientes) {
		$this->saveRelacionesBase($cuenta_corriente,$chequecuentacorrientes,$retirocuentacorrientes,$depositocuentacorrientes,false);
	}

	public function saveRelacionesBase($cuenta_corriente,$chequecuentacorrientes=array(),$retirocuentacorrientes=array(),$depositocuentacorrientes=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$cuenta_corriente->setcheque_cuenta_corrientes($chequecuentacorrientes);
			$cuenta_corriente->setretiro_cuenta_corrientes($retirocuentacorrientes);
			$cuenta_corriente->setdeposito_cuenta_corrientes($depositocuentacorrientes);
			$this->setcuenta_corriente($cuenta_corriente);

			if(cuenta_corriente_logic_add::validarSaveRelaciones($cuenta_corriente,$this)) {

				cuenta_corriente_logic_add::updateRelacionesToSave($cuenta_corriente,$this);

				if(($this->cuenta_corriente->getIsNew() || $this->cuenta_corriente->getIsChanged()) && !$this->cuenta_corriente->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($chequecuentacorrientes,$retirocuentacorrientes,$depositocuentacorrientes);

				} else if($this->cuenta_corriente->getIsDeleted()) {
					$this->saveRelacionesDetalles($chequecuentacorrientes,$retirocuentacorrientes,$depositocuentacorrientes);
					$this->save();
				}

				cuenta_corriente_logic_add::updateRelacionesToSaveAfter($cuenta_corriente,$this);

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
	
	
	public function saveRelacionesDetalles($chequecuentacorrientes=array(),$retirocuentacorrientes=array(),$depositocuentacorrientes=array()) {
		try {
	

			$idcuenta_corrienteActual=$this->getcuenta_corriente()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/cheque_cuenta_corriente_carga.php');
			cheque_cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$chequecuentacorrienteLogic_Desde_cuenta_corriente=new cheque_cuenta_corriente_logic();
			$chequecuentacorrienteLogic_Desde_cuenta_corriente->setcheque_cuenta_corrientes($chequecuentacorrientes);

			$chequecuentacorrienteLogic_Desde_cuenta_corriente->setConnexion($this->getConnexion());
			$chequecuentacorrienteLogic_Desde_cuenta_corriente->setDatosCliente($this->datosCliente);

			foreach($chequecuentacorrienteLogic_Desde_cuenta_corriente->getcheque_cuenta_corrientes() as $chequecuentacorriente_Desde_cuenta_corriente) {
				$chequecuentacorriente_Desde_cuenta_corriente->setid_cuenta_corriente($idcuenta_corrienteActual);
			}

			$chequecuentacorrienteLogic_Desde_cuenta_corriente->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/retiro_cuenta_corriente_carga.php');
			retiro_cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$retirocuentacorrienteLogic_Desde_cuenta_corriente=new retiro_cuenta_corriente_logic();
			$retirocuentacorrienteLogic_Desde_cuenta_corriente->setretiro_cuenta_corrientes($retirocuentacorrientes);

			$retirocuentacorrienteLogic_Desde_cuenta_corriente->setConnexion($this->getConnexion());
			$retirocuentacorrienteLogic_Desde_cuenta_corriente->setDatosCliente($this->datosCliente);

			foreach($retirocuentacorrienteLogic_Desde_cuenta_corriente->getretiro_cuenta_corrientes() as $retirocuentacorriente_Desde_cuenta_corriente) {
				$retirocuentacorriente_Desde_cuenta_corriente->setid_cuenta_corriente($idcuenta_corrienteActual);
			}

			$retirocuentacorrienteLogic_Desde_cuenta_corriente->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/deposito_cuenta_corriente_carga.php');
			deposito_cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$depositocuentacorrienteLogic_Desde_cuenta_corriente=new deposito_cuenta_corriente_logic();
			$depositocuentacorrienteLogic_Desde_cuenta_corriente->setdeposito_cuenta_corrientes($depositocuentacorrientes);

			$depositocuentacorrienteLogic_Desde_cuenta_corriente->setConnexion($this->getConnexion());
			$depositocuentacorrienteLogic_Desde_cuenta_corriente->setDatosCliente($this->datosCliente);

			foreach($depositocuentacorrienteLogic_Desde_cuenta_corriente->getdeposito_cuenta_corrientes() as $depositocuentacorriente_Desde_cuenta_corriente) {
				$depositocuentacorriente_Desde_cuenta_corriente->setid_cuenta_corriente($idcuenta_corrienteActual);
			}

			$depositocuentacorrienteLogic_Desde_cuenta_corriente->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $cuenta_corrientes,cuenta_corriente_param_return $cuenta_corrienteParameterGeneral) : cuenta_corriente_param_return {
		$cuenta_corrienteReturnGeneral=new cuenta_corriente_param_return();
	
		 try {	
			
			if($this->cuenta_corrienteLogicAdditional==null) {
				$this->cuenta_corrienteLogicAdditional=new cuenta_corriente_logic_add();
			}
			
			$this->cuenta_corrienteLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$cuenta_corrientes,$cuenta_corrienteParameterGeneral,$cuenta_corrienteReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $cuenta_corrienteReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $cuenta_corrientes,cuenta_corriente_param_return $cuenta_corrienteParameterGeneral) : cuenta_corriente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cuenta_corrienteReturnGeneral=new cuenta_corriente_param_return();
	
			
			if($this->cuenta_corrienteLogicAdditional==null) {
				$this->cuenta_corrienteLogicAdditional=new cuenta_corriente_logic_add();
			}
			
			$this->cuenta_corrienteLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$cuenta_corrientes,$cuenta_corrienteParameterGeneral,$cuenta_corrienteReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $cuenta_corrienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_corrientes,cuenta_corriente $cuenta_corriente,cuenta_corriente_param_return $cuenta_corrienteParameterGeneral,bool $isEsNuevocuenta_corriente,array $clases) : cuenta_corriente_param_return {
		 try {	
			$cuenta_corrienteReturnGeneral=new cuenta_corriente_param_return();
	
			$cuenta_corrienteReturnGeneral->setcuenta_corriente($cuenta_corriente);
			$cuenta_corrienteReturnGeneral->setcuenta_corrientes($cuenta_corrientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cuenta_corrienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->cuenta_corrienteLogicAdditional==null) {
				$this->cuenta_corrienteLogicAdditional=new cuenta_corriente_logic_add();
			}
			
			$cuenta_corrienteReturnGeneral=$this->cuenta_corrienteLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_corrientes,$cuenta_corriente,$cuenta_corrienteParameterGeneral,$cuenta_corrienteReturnGeneral,$isEsNuevocuenta_corriente,$clases);
			
			/*cuenta_corrienteLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_corrientes,$cuenta_corriente,$cuenta_corrienteParameterGeneral,$cuenta_corrienteReturnGeneral,$isEsNuevocuenta_corriente,$clases);*/
			
			return $cuenta_corrienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_corrientes,cuenta_corriente $cuenta_corriente,cuenta_corriente_param_return $cuenta_corrienteParameterGeneral,bool $isEsNuevocuenta_corriente,array $clases) : cuenta_corriente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cuenta_corrienteReturnGeneral=new cuenta_corriente_param_return();
	
			$cuenta_corrienteReturnGeneral->setcuenta_corriente($cuenta_corriente);
			$cuenta_corrienteReturnGeneral->setcuenta_corrientes($cuenta_corrientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cuenta_corrienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->cuenta_corrienteLogicAdditional==null) {
				$this->cuenta_corrienteLogicAdditional=new cuenta_corriente_logic_add();
			}
			
			$cuenta_corrienteReturnGeneral=$this->cuenta_corrienteLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_corrientes,$cuenta_corriente,$cuenta_corrienteParameterGeneral,$cuenta_corrienteReturnGeneral,$isEsNuevocuenta_corriente,$clases);
			
			/*cuenta_corrienteLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_corrientes,$cuenta_corriente,$cuenta_corrienteParameterGeneral,$cuenta_corrienteReturnGeneral,$isEsNuevocuenta_corriente,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $cuenta_corrienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_corrientes,cuenta_corriente $cuenta_corriente,cuenta_corriente_param_return $cuenta_corrienteParameterGeneral,bool $isEsNuevocuenta_corriente,array $clases) : cuenta_corriente_param_return {
		 try {	
			$cuenta_corrienteReturnGeneral=new cuenta_corriente_param_return();
	
			$cuenta_corrienteReturnGeneral->setcuenta_corriente($cuenta_corriente);
			$cuenta_corrienteReturnGeneral->setcuenta_corrientes($cuenta_corrientes);
			
			
			
			if($this->cuenta_corrienteLogicAdditional==null) {
				$this->cuenta_corrienteLogicAdditional=new cuenta_corriente_logic_add();
			}
			
			$cuenta_corrienteReturnGeneral=$this->cuenta_corrienteLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_corrientes,$cuenta_corriente,$cuenta_corrienteParameterGeneral,$cuenta_corrienteReturnGeneral,$isEsNuevocuenta_corriente,$clases);
			
			/*cuenta_corrienteLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_corrientes,$cuenta_corriente,$cuenta_corrienteParameterGeneral,$cuenta_corrienteReturnGeneral,$isEsNuevocuenta_corriente,$clases);*/
			
			return $cuenta_corrienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_corrientes,cuenta_corriente $cuenta_corriente,cuenta_corriente_param_return $cuenta_corrienteParameterGeneral,bool $isEsNuevocuenta_corriente,array $clases) : cuenta_corriente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cuenta_corrienteReturnGeneral=new cuenta_corriente_param_return();
	
			$cuenta_corrienteReturnGeneral->setcuenta_corriente($cuenta_corriente);
			$cuenta_corrienteReturnGeneral->setcuenta_corrientes($cuenta_corrientes);
			
			
			if($this->cuenta_corrienteLogicAdditional==null) {
				$this->cuenta_corrienteLogicAdditional=new cuenta_corriente_logic_add();
			}
			
			$cuenta_corrienteReturnGeneral=$this->cuenta_corrienteLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_corrientes,$cuenta_corriente,$cuenta_corrienteParameterGeneral,$cuenta_corrienteReturnGeneral,$isEsNuevocuenta_corriente,$clases);
			
			/*cuenta_corrienteLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_corrientes,$cuenta_corriente,$cuenta_corrienteParameterGeneral,$cuenta_corrienteReturnGeneral,$isEsNuevocuenta_corriente,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $cuenta_corrienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,cuenta_corriente $cuenta_corriente,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,cuenta_corriente $cuenta_corriente,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		cuenta_corriente_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(cuenta_corriente $cuenta_corriente,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			cuenta_corriente_logic_add::updatecuenta_corrienteToGet($this->cuenta_corriente);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cuenta_corriente->setempresa($this->cuenta_corrienteDataAccess->getempresa($this->connexion,$cuenta_corriente));
		$cuenta_corriente->setusuario($this->cuenta_corrienteDataAccess->getusuario($this->connexion,$cuenta_corriente));
		$cuenta_corriente->setbanco($this->cuenta_corrienteDataAccess->getbanco($this->connexion,$cuenta_corriente));
		$cuenta_corriente->setcuenta($this->cuenta_corrienteDataAccess->getcuenta($this->connexion,$cuenta_corriente));
		$cuenta_corriente->setestado_cuentas_corrientes($this->cuenta_corrienteDataAccess->getestado_cuentas_corrientes($this->connexion,$cuenta_corriente));
		$cuenta_corriente->setcheque_cuenta_corrientes($this->cuenta_corrienteDataAccess->getcheque_cuenta_corrientes($this->connexion,$cuenta_corriente));
		$cuenta_corriente->setretiro_cuenta_corrientes($this->cuenta_corrienteDataAccess->getretiro_cuenta_corrientes($this->connexion,$cuenta_corriente));
		$cuenta_corriente->setdeposito_cuenta_corrientes($this->cuenta_corrienteDataAccess->getdeposito_cuenta_corrientes($this->connexion,$cuenta_corriente));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cuenta_corriente->setempresa($this->cuenta_corrienteDataAccess->getempresa($this->connexion,$cuenta_corriente));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$cuenta_corriente->setusuario($this->cuenta_corrienteDataAccess->getusuario($this->connexion,$cuenta_corriente));
				continue;
			}

			if($clas->clas==banco::$class.'') {
				$cuenta_corriente->setbanco($this->cuenta_corrienteDataAccess->getbanco($this->connexion,$cuenta_corriente));
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$cuenta_corriente->setcuenta($this->cuenta_corrienteDataAccess->getcuenta($this->connexion,$cuenta_corriente));
				continue;
			}

			if($clas->clas==estado_cuentas_corrientes::$class.'') {
				$cuenta_corriente->setestado_cuentas_corrientes($this->cuenta_corrienteDataAccess->getestado_cuentas_corrientes($this->connexion,$cuenta_corriente));
				continue;
			}

			if($clas->clas==cheque_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta_corriente->setcheque_cuenta_corrientes($this->cuenta_corrienteDataAccess->getcheque_cuenta_corrientes($this->connexion,$cuenta_corriente));

				if($this->isConDeep) {
					$chequecuentacorrienteLogic= new cheque_cuenta_corriente_logic($this->connexion);
					$chequecuentacorrienteLogic->setcheque_cuenta_corrientes($cuenta_corriente->getcheque_cuenta_corrientes());
					$classesLocal=cheque_cuenta_corriente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$chequecuentacorrienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cheque_cuenta_corriente_util::refrescarFKDescripciones($chequecuentacorrienteLogic->getcheque_cuenta_corrientes());
					$cuenta_corriente->setcheque_cuenta_corrientes($chequecuentacorrienteLogic->getcheque_cuenta_corrientes());
				}

				continue;
			}

			if($clas->clas==retiro_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta_corriente->setretiro_cuenta_corrientes($this->cuenta_corrienteDataAccess->getretiro_cuenta_corrientes($this->connexion,$cuenta_corriente));

				if($this->isConDeep) {
					$retirocuentacorrienteLogic= new retiro_cuenta_corriente_logic($this->connexion);
					$retirocuentacorrienteLogic->setretiro_cuenta_corrientes($cuenta_corriente->getretiro_cuenta_corrientes());
					$classesLocal=retiro_cuenta_corriente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$retirocuentacorrienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					retiro_cuenta_corriente_util::refrescarFKDescripciones($retirocuentacorrienteLogic->getretiro_cuenta_corrientes());
					$cuenta_corriente->setretiro_cuenta_corrientes($retirocuentacorrienteLogic->getretiro_cuenta_corrientes());
				}

				continue;
			}

			if($clas->clas==deposito_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta_corriente->setdeposito_cuenta_corrientes($this->cuenta_corrienteDataAccess->getdeposito_cuenta_corrientes($this->connexion,$cuenta_corriente));

				if($this->isConDeep) {
					$depositocuentacorrienteLogic= new deposito_cuenta_corriente_logic($this->connexion);
					$depositocuentacorrienteLogic->setdeposito_cuenta_corrientes($cuenta_corriente->getdeposito_cuenta_corrientes());
					$classesLocal=deposito_cuenta_corriente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$depositocuentacorrienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					deposito_cuenta_corriente_util::refrescarFKDescripciones($depositocuentacorrienteLogic->getdeposito_cuenta_corrientes());
					$cuenta_corriente->setdeposito_cuenta_corrientes($depositocuentacorrienteLogic->getdeposito_cuenta_corrientes());
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
			$cuenta_corriente->setempresa($this->cuenta_corrienteDataAccess->getempresa($this->connexion,$cuenta_corriente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente->setusuario($this->cuenta_corrienteDataAccess->getusuario($this->connexion,$cuenta_corriente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==banco::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente->setbanco($this->cuenta_corrienteDataAccess->getbanco($this->connexion,$cuenta_corriente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente->setcuenta($this->cuenta_corrienteDataAccess->getcuenta($this->connexion,$cuenta_corriente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estado_cuentas_corrientes::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente->setestado_cuentas_corrientes($this->cuenta_corrienteDataAccess->getestado_cuentas_corrientes($this->connexion,$cuenta_corriente));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cheque_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cheque_cuenta_corriente::$class);
			$cuenta_corriente->setcheque_cuenta_corrientes($this->cuenta_corrienteDataAccess->getcheque_cuenta_corrientes($this->connexion,$cuenta_corriente));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retiro_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(retiro_cuenta_corriente::$class);
			$cuenta_corriente->setretiro_cuenta_corrientes($this->cuenta_corrienteDataAccess->getretiro_cuenta_corrientes($this->connexion,$cuenta_corriente));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==deposito_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(deposito_cuenta_corriente::$class);
			$cuenta_corriente->setdeposito_cuenta_corrientes($this->cuenta_corrienteDataAccess->getdeposito_cuenta_corrientes($this->connexion,$cuenta_corriente));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cuenta_corriente->setempresa($this->cuenta_corrienteDataAccess->getempresa($this->connexion,$cuenta_corriente));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($cuenta_corriente->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_corriente->setusuario($this->cuenta_corrienteDataAccess->getusuario($this->connexion,$cuenta_corriente));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($cuenta_corriente->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_corriente->setbanco($this->cuenta_corrienteDataAccess->getbanco($this->connexion,$cuenta_corriente));
		$bancoLogic= new banco_logic($this->connexion);
		$bancoLogic->deepLoad($cuenta_corriente->getbanco(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_corriente->setcuenta($this->cuenta_corrienteDataAccess->getcuenta($this->connexion,$cuenta_corriente));
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepLoad($cuenta_corriente->getcuenta(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_corriente->setestado_cuentas_corrientes($this->cuenta_corrienteDataAccess->getestado_cuentas_corrientes($this->connexion,$cuenta_corriente));
		$estado_cuentas_corrientesLogic= new estado_cuentas_corrientes_logic($this->connexion);
		$estado_cuentas_corrientesLogic->deepLoad($cuenta_corriente->getestado_cuentas_corrientes(),$isDeep,$deepLoadType,$clases);
				

		$cuenta_corriente->setcheque_cuenta_corrientes($this->cuenta_corrienteDataAccess->getcheque_cuenta_corrientes($this->connexion,$cuenta_corriente));

		foreach($cuenta_corriente->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
			$chequecuentacorrienteLogic= new cheque_cuenta_corriente_logic($this->connexion);
			$chequecuentacorrienteLogic->deepLoad($chequecuentacorriente,$isDeep,$deepLoadType,$clases);
		}

		$cuenta_corriente->setretiro_cuenta_corrientes($this->cuenta_corrienteDataAccess->getretiro_cuenta_corrientes($this->connexion,$cuenta_corriente));

		foreach($cuenta_corriente->getretiro_cuenta_corrientes() as $retirocuentacorriente) {
			$retirocuentacorrienteLogic= new retiro_cuenta_corriente_logic($this->connexion);
			$retirocuentacorrienteLogic->deepLoad($retirocuentacorriente,$isDeep,$deepLoadType,$clases);
		}

		$cuenta_corriente->setdeposito_cuenta_corrientes($this->cuenta_corrienteDataAccess->getdeposito_cuenta_corrientes($this->connexion,$cuenta_corriente));

		foreach($cuenta_corriente->getdeposito_cuenta_corrientes() as $depositocuentacorriente) {
			$depositocuentacorrienteLogic= new deposito_cuenta_corriente_logic($this->connexion);
			$depositocuentacorrienteLogic->deepLoad($depositocuentacorriente,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cuenta_corriente->setempresa($this->cuenta_corrienteDataAccess->getempresa($this->connexion,$cuenta_corriente));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($cuenta_corriente->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$cuenta_corriente->setusuario($this->cuenta_corrienteDataAccess->getusuario($this->connexion,$cuenta_corriente));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($cuenta_corriente->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==banco::$class.'') {
				$cuenta_corriente->setbanco($this->cuenta_corrienteDataAccess->getbanco($this->connexion,$cuenta_corriente));
				$bancoLogic= new banco_logic($this->connexion);
				$bancoLogic->deepLoad($cuenta_corriente->getbanco(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$cuenta_corriente->setcuenta($this->cuenta_corrienteDataAccess->getcuenta($this->connexion,$cuenta_corriente));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($cuenta_corriente->getcuenta(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==estado_cuentas_corrientes::$class.'') {
				$cuenta_corriente->setestado_cuentas_corrientes($this->cuenta_corrienteDataAccess->getestado_cuentas_corrientes($this->connexion,$cuenta_corriente));
				$estado_cuentas_corrientesLogic= new estado_cuentas_corrientes_logic($this->connexion);
				$estado_cuentas_corrientesLogic->deepLoad($cuenta_corriente->getestado_cuentas_corrientes(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cheque_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta_corriente->setcheque_cuenta_corrientes($this->cuenta_corrienteDataAccess->getcheque_cuenta_corrientes($this->connexion,$cuenta_corriente));

				foreach($cuenta_corriente->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
					$chequecuentacorrienteLogic= new cheque_cuenta_corriente_logic($this->connexion);
					$chequecuentacorrienteLogic->deepLoad($chequecuentacorriente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==retiro_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta_corriente->setretiro_cuenta_corrientes($this->cuenta_corrienteDataAccess->getretiro_cuenta_corrientes($this->connexion,$cuenta_corriente));

				foreach($cuenta_corriente->getretiro_cuenta_corrientes() as $retirocuentacorriente) {
					$retirocuentacorrienteLogic= new retiro_cuenta_corriente_logic($this->connexion);
					$retirocuentacorrienteLogic->deepLoad($retirocuentacorriente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==deposito_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta_corriente->setdeposito_cuenta_corrientes($this->cuenta_corrienteDataAccess->getdeposito_cuenta_corrientes($this->connexion,$cuenta_corriente));

				foreach($cuenta_corriente->getdeposito_cuenta_corrientes() as $depositocuentacorriente) {
					$depositocuentacorrienteLogic= new deposito_cuenta_corriente_logic($this->connexion);
					$depositocuentacorrienteLogic->deepLoad($depositocuentacorriente,$isDeep,$deepLoadType,$clases);
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
			$cuenta_corriente->setempresa($this->cuenta_corrienteDataAccess->getempresa($this->connexion,$cuenta_corriente));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($cuenta_corriente->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente->setusuario($this->cuenta_corrienteDataAccess->getusuario($this->connexion,$cuenta_corriente));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($cuenta_corriente->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==banco::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente->setbanco($this->cuenta_corrienteDataAccess->getbanco($this->connexion,$cuenta_corriente));
			$bancoLogic= new banco_logic($this->connexion);
			$bancoLogic->deepLoad($cuenta_corriente->getbanco(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente->setcuenta($this->cuenta_corrienteDataAccess->getcuenta($this->connexion,$cuenta_corriente));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($cuenta_corriente->getcuenta(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado_cuentas_corrientes::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_corriente->setestado_cuentas_corrientes($this->cuenta_corrienteDataAccess->getestado_cuentas_corrientes($this->connexion,$cuenta_corriente));
			$estado_cuentas_corrientesLogic= new estado_cuentas_corrientes_logic($this->connexion);
			$estado_cuentas_corrientesLogic->deepLoad($cuenta_corriente->getestado_cuentas_corrientes(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cheque_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cheque_cuenta_corriente::$class);
			$cuenta_corriente->setcheque_cuenta_corrientes($this->cuenta_corrienteDataAccess->getcheque_cuenta_corrientes($this->connexion,$cuenta_corriente));

			foreach($cuenta_corriente->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
				$chequecuentacorrienteLogic= new cheque_cuenta_corriente_logic($this->connexion);
				$chequecuentacorrienteLogic->deepLoad($chequecuentacorriente,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retiro_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(retiro_cuenta_corriente::$class);
			$cuenta_corriente->setretiro_cuenta_corrientes($this->cuenta_corrienteDataAccess->getretiro_cuenta_corrientes($this->connexion,$cuenta_corriente));

			foreach($cuenta_corriente->getretiro_cuenta_corrientes() as $retirocuentacorriente) {
				$retirocuentacorrienteLogic= new retiro_cuenta_corriente_logic($this->connexion);
				$retirocuentacorrienteLogic->deepLoad($retirocuentacorriente,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==deposito_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(deposito_cuenta_corriente::$class);
			$cuenta_corriente->setdeposito_cuenta_corrientes($this->cuenta_corrienteDataAccess->getdeposito_cuenta_corrientes($this->connexion,$cuenta_corriente));

			foreach($cuenta_corriente->getdeposito_cuenta_corrientes() as $depositocuentacorriente) {
				$depositocuentacorrienteLogic= new deposito_cuenta_corriente_logic($this->connexion);
				$depositocuentacorrienteLogic->deepLoad($depositocuentacorriente,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(cuenta_corriente $cuenta_corriente,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			cuenta_corriente_logic_add::updatecuenta_corrienteToSave($this->cuenta_corriente);			
			
			if(!$paraDeleteCascade) {				
				cuenta_corriente_data::save($cuenta_corriente, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($cuenta_corriente->getempresa(),$this->connexion);
		usuario_data::save($cuenta_corriente->getusuario(),$this->connexion);
		banco_data::save($cuenta_corriente->getbanco(),$this->connexion);
		cuenta_data::save($cuenta_corriente->getcuenta(),$this->connexion);
		estado_cuentas_corrientes_data::save($cuenta_corriente->getestado_cuentas_corrientes(),$this->connexion);

		foreach($cuenta_corriente->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
			$chequecuentacorriente->setid_cuenta_corriente($cuenta_corriente->getId());
			cheque_cuenta_corriente_data::save($chequecuentacorriente,$this->connexion);
		}


		foreach($cuenta_corriente->getretiro_cuenta_corrientes() as $retirocuentacorriente) {
			$retirocuentacorriente->setid_cuenta_corriente($cuenta_corriente->getId());
			retiro_cuenta_corriente_data::save($retirocuentacorriente,$this->connexion);
		}


		foreach($cuenta_corriente->getdeposito_cuenta_corrientes() as $depositocuentacorriente) {
			$depositocuentacorriente->setid_cuenta_corriente($cuenta_corriente->getId());
			deposito_cuenta_corriente_data::save($depositocuentacorriente,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cuenta_corriente->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($cuenta_corriente->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==banco::$class.'') {
				banco_data::save($cuenta_corriente->getbanco(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($cuenta_corriente->getcuenta(),$this->connexion);
				continue;
			}

			if($clas->clas==estado_cuentas_corrientes::$class.'') {
				estado_cuentas_corrientes_data::save($cuenta_corriente->getestado_cuentas_corrientes(),$this->connexion);
				continue;
			}


			if($clas->clas==cheque_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta_corriente->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
					$chequecuentacorriente->setid_cuenta_corriente($cuenta_corriente->getId());
					cheque_cuenta_corriente_data::save($chequecuentacorriente,$this->connexion);
				}

				continue;
			}

			if($clas->clas==retiro_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta_corriente->getretiro_cuenta_corrientes() as $retirocuentacorriente) {
					$retirocuentacorriente->setid_cuenta_corriente($cuenta_corriente->getId());
					retiro_cuenta_corriente_data::save($retirocuentacorriente,$this->connexion);
				}

				continue;
			}

			if($clas->clas==deposito_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta_corriente->getdeposito_cuenta_corrientes() as $depositocuentacorriente) {
					$depositocuentacorriente->setid_cuenta_corriente($cuenta_corriente->getId());
					deposito_cuenta_corriente_data::save($depositocuentacorriente,$this->connexion);
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
			empresa_data::save($cuenta_corriente->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($cuenta_corriente->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==banco::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			banco_data::save($cuenta_corriente->getbanco(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($cuenta_corriente->getcuenta(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado_cuentas_corrientes::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_cuentas_corrientes_data::save($cuenta_corriente->getestado_cuentas_corrientes(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cheque_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cheque_cuenta_corriente::$class);

			foreach($cuenta_corriente->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
				$chequecuentacorriente->setid_cuenta_corriente($cuenta_corriente->getId());
				cheque_cuenta_corriente_data::save($chequecuentacorriente,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retiro_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(retiro_cuenta_corriente::$class);

			foreach($cuenta_corriente->getretiro_cuenta_corrientes() as $retirocuentacorriente) {
				$retirocuentacorriente->setid_cuenta_corriente($cuenta_corriente->getId());
				retiro_cuenta_corriente_data::save($retirocuentacorriente,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==deposito_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(deposito_cuenta_corriente::$class);

			foreach($cuenta_corriente->getdeposito_cuenta_corrientes() as $depositocuentacorriente) {
				$depositocuentacorriente->setid_cuenta_corriente($cuenta_corriente->getId());
				deposito_cuenta_corriente_data::save($depositocuentacorriente,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($cuenta_corriente->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($cuenta_corriente->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($cuenta_corriente->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($cuenta_corriente->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		banco_data::save($cuenta_corriente->getbanco(),$this->connexion);
		$bancoLogic= new banco_logic($this->connexion);
		$bancoLogic->deepSave($cuenta_corriente->getbanco(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($cuenta_corriente->getcuenta(),$this->connexion);
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepSave($cuenta_corriente->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		estado_cuentas_corrientes_data::save($cuenta_corriente->getestado_cuentas_corrientes(),$this->connexion);
		$estado_cuentas_corrientesLogic= new estado_cuentas_corrientes_logic($this->connexion);
		$estado_cuentas_corrientesLogic->deepSave($cuenta_corriente->getestado_cuentas_corrientes(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($cuenta_corriente->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
			$chequecuentacorrienteLogic= new cheque_cuenta_corriente_logic($this->connexion);
			$chequecuentacorriente->setid_cuenta_corriente($cuenta_corriente->getId());
			cheque_cuenta_corriente_data::save($chequecuentacorriente,$this->connexion);
			$chequecuentacorrienteLogic->deepSave($chequecuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta_corriente->getretiro_cuenta_corrientes() as $retirocuentacorriente) {
			$retirocuentacorrienteLogic= new retiro_cuenta_corriente_logic($this->connexion);
			$retirocuentacorriente->setid_cuenta_corriente($cuenta_corriente->getId());
			retiro_cuenta_corriente_data::save($retirocuentacorriente,$this->connexion);
			$retirocuentacorrienteLogic->deepSave($retirocuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta_corriente->getdeposito_cuenta_corrientes() as $depositocuentacorriente) {
			$depositocuentacorrienteLogic= new deposito_cuenta_corriente_logic($this->connexion);
			$depositocuentacorriente->setid_cuenta_corriente($cuenta_corriente->getId());
			deposito_cuenta_corriente_data::save($depositocuentacorriente,$this->connexion);
			$depositocuentacorrienteLogic->deepSave($depositocuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cuenta_corriente->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($cuenta_corriente->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($cuenta_corriente->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($cuenta_corriente->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==banco::$class.'') {
				banco_data::save($cuenta_corriente->getbanco(),$this->connexion);
				$bancoLogic= new banco_logic($this->connexion);
				$bancoLogic->deepSave($cuenta_corriente->getbanco(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($cuenta_corriente->getcuenta(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($cuenta_corriente->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==estado_cuentas_corrientes::$class.'') {
				estado_cuentas_corrientes_data::save($cuenta_corriente->getestado_cuentas_corrientes(),$this->connexion);
				$estado_cuentas_corrientesLogic= new estado_cuentas_corrientes_logic($this->connexion);
				$estado_cuentas_corrientesLogic->deepSave($cuenta_corriente->getestado_cuentas_corrientes(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==cheque_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta_corriente->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
					$chequecuentacorrienteLogic= new cheque_cuenta_corriente_logic($this->connexion);
					$chequecuentacorriente->setid_cuenta_corriente($cuenta_corriente->getId());
					cheque_cuenta_corriente_data::save($chequecuentacorriente,$this->connexion);
					$chequecuentacorrienteLogic->deepSave($chequecuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==retiro_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta_corriente->getretiro_cuenta_corrientes() as $retirocuentacorriente) {
					$retirocuentacorrienteLogic= new retiro_cuenta_corriente_logic($this->connexion);
					$retirocuentacorriente->setid_cuenta_corriente($cuenta_corriente->getId());
					retiro_cuenta_corriente_data::save($retirocuentacorriente,$this->connexion);
					$retirocuentacorrienteLogic->deepSave($retirocuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==deposito_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta_corriente->getdeposito_cuenta_corrientes() as $depositocuentacorriente) {
					$depositocuentacorrienteLogic= new deposito_cuenta_corriente_logic($this->connexion);
					$depositocuentacorriente->setid_cuenta_corriente($cuenta_corriente->getId());
					deposito_cuenta_corriente_data::save($depositocuentacorriente,$this->connexion);
					$depositocuentacorrienteLogic->deepSave($depositocuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($cuenta_corriente->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($cuenta_corriente->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($cuenta_corriente->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($cuenta_corriente->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==banco::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			banco_data::save($cuenta_corriente->getbanco(),$this->connexion);
			$bancoLogic= new banco_logic($this->connexion);
			$bancoLogic->deepSave($cuenta_corriente->getbanco(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($cuenta_corriente->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($cuenta_corriente->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado_cuentas_corrientes::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_cuentas_corrientes_data::save($cuenta_corriente->getestado_cuentas_corrientes(),$this->connexion);
			$estado_cuentas_corrientesLogic= new estado_cuentas_corrientes_logic($this->connexion);
			$estado_cuentas_corrientesLogic->deepSave($cuenta_corriente->getestado_cuentas_corrientes(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cheque_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cheque_cuenta_corriente::$class);

			foreach($cuenta_corriente->getcheque_cuenta_corrientes() as $chequecuentacorriente) {
				$chequecuentacorrienteLogic= new cheque_cuenta_corriente_logic($this->connexion);
				$chequecuentacorriente->setid_cuenta_corriente($cuenta_corriente->getId());
				cheque_cuenta_corriente_data::save($chequecuentacorriente,$this->connexion);
				$chequecuentacorrienteLogic->deepSave($chequecuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retiro_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(retiro_cuenta_corriente::$class);

			foreach($cuenta_corriente->getretiro_cuenta_corrientes() as $retirocuentacorriente) {
				$retirocuentacorrienteLogic= new retiro_cuenta_corriente_logic($this->connexion);
				$retirocuentacorriente->setid_cuenta_corriente($cuenta_corriente->getId());
				retiro_cuenta_corriente_data::save($retirocuentacorriente,$this->connexion);
				$retirocuentacorrienteLogic->deepSave($retirocuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==deposito_cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(deposito_cuenta_corriente::$class);

			foreach($cuenta_corriente->getdeposito_cuenta_corrientes() as $depositocuentacorriente) {
				$depositocuentacorrienteLogic= new deposito_cuenta_corriente_logic($this->connexion);
				$depositocuentacorriente->setid_cuenta_corriente($cuenta_corriente->getId());
				deposito_cuenta_corriente_data::save($depositocuentacorriente,$this->connexion);
				$depositocuentacorrienteLogic->deepSave($depositocuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				cuenta_corriente_data::save($cuenta_corriente, $this->connexion);
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
			
			$this->deepLoad($this->cuenta_corriente,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->cuenta_corrientes as $cuenta_corriente) {
				$this->deepLoad($cuenta_corriente,$isDeep,$deepLoadType,$clases);
								
				cuenta_corriente_util::refrescarFKDescripciones($this->cuenta_corrientes);
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
			
			foreach($this->cuenta_corrientes as $cuenta_corriente) {
				$this->deepLoad($cuenta_corriente,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->cuenta_corriente,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->cuenta_corrientes as $cuenta_corriente) {
				$this->deepSave($cuenta_corriente,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->cuenta_corrientes as $cuenta_corriente) {
				$this->deepSave($cuenta_corriente,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(usuario::$class);
				$classes[]=new Classe(banco::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(estado_cuentas_corrientes::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
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
					if($clas->clas==banco::$class) {
						$classes[]=new Classe(banco::$class);
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
					if($clas->clas==estado_cuentas_corrientes::$class) {
						$classes[]=new Classe(estado_cuentas_corrientes::$class);
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
					if($clas->clas==banco::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(banco::$class);
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
					if($clas->clas==estado_cuentas_corrientes::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(estado_cuentas_corrientes::$class);
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
				
				$classes[]=new Classe(cheque_cuenta_corriente::$class);
				$classes[]=new Classe(retiro_cuenta_corriente::$class);
				$classes[]=new Classe(deposito_cuenta_corriente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==cheque_cuenta_corriente::$class) {
						$classes[]=new Classe(cheque_cuenta_corriente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==retiro_cuenta_corriente::$class) {
						$classes[]=new Classe(retiro_cuenta_corriente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==deposito_cuenta_corriente::$class) {
						$classes[]=new Classe(deposito_cuenta_corriente::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==cheque_cuenta_corriente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cheque_cuenta_corriente::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==retiro_cuenta_corriente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(retiro_cuenta_corriente::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==deposito_cuenta_corriente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(deposito_cuenta_corriente::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getcuenta_corriente() : ?cuenta_corriente {	
		/*
		cuenta_corriente_logic_add::checkcuenta_corrienteToGet($this->cuenta_corriente,$this->datosCliente);
		cuenta_corriente_logic_add::updatecuenta_corrienteToGet($this->cuenta_corriente);
		*/
			
		return $this->cuenta_corriente;
	}
		
	public function setcuenta_corriente(cuenta_corriente $newcuenta_corriente) {
		$this->cuenta_corriente = $newcuenta_corriente;
	}
	
	public function getcuenta_corrientes() : array {		
		/*
		cuenta_corriente_logic_add::checkcuenta_corrienteToGets($this->cuenta_corrientes,$this->datosCliente);
		
		foreach ($this->cuenta_corrientes as $cuenta_corrienteLocal ) {
			cuenta_corriente_logic_add::updatecuenta_corrienteToGet($cuenta_corrienteLocal);
		}
		*/
		
		return $this->cuenta_corrientes;
	}
	
	public function setcuenta_corrientes(array $newcuenta_corrientes) {
		$this->cuenta_corrientes = $newcuenta_corrientes;
	}
	
	public function getcuenta_corrienteDataAccess() : cuenta_corriente_data {
		return $this->cuenta_corrienteDataAccess;
	}
	
	public function setcuenta_corrienteDataAccess(cuenta_corriente_data $newcuenta_corrienteDataAccess) {
		$this->cuenta_corrienteDataAccess = $newcuenta_corrienteDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        cuenta_corriente_carga::$CONTROLLER;;        
		
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
