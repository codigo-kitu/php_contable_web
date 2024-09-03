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

namespace com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_param_return;

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\presentation\session\cuenta_cobrar_session;

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

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\data\cuenta_cobrar_data;

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

use com\bydan\contabilidad\facturacion\factura\business\entity\factura;
use com\bydan\contabilidad\facturacion\factura\business\data\factura_data;
use com\bydan\contabilidad\facturacion\factura\business\logic\factura_logic;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\data\termino_pago_cliente_data;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

use com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\business\entity\estado_cuentas_cobrar;
use com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\business\data\estado_cuentas_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\business\logic\estado_cuentas_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\util\estado_cuentas_cobrar_util;

//REL


use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\business\entity\debito_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\business\data\debito_cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\business\logic\debito_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util\debito_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util\debito_cuenta_cobrar_util;

use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\business\entity\pago_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\business\data\pago_cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\business\logic\pago_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\util\pago_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\util\pago_cuenta_cobrar_util;

use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\business\entity\credito_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\business\data\credito_cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\business\logic\credito_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\util\credito_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\util\credito_cuenta_cobrar_util;

//REL DETALLES




class cuenta_cobrar_logic  extends GeneralEntityLogic implements cuenta_cobrar_logicI {	
	/*GENERAL*/
	public cuenta_cobrar_data $cuenta_cobrarDataAccess;
	public ?cuenta_cobrar_logic_add $cuenta_cobrarLogicAdditional=null;
	public ?cuenta_cobrar $cuenta_cobrar;
	public array $cuenta_cobrars;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->cuenta_cobrarDataAccess = new cuenta_cobrar_data();			
			$this->cuenta_cobrars = array();
			$this->cuenta_cobrar = new cuenta_cobrar();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->cuenta_cobrarLogicAdditional = new cuenta_cobrar_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->cuenta_cobrarLogicAdditional==null) {
			$this->cuenta_cobrarLogicAdditional=new cuenta_cobrar_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->cuenta_cobrarDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->cuenta_cobrarDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->cuenta_cobrarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->cuenta_cobrarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->cuenta_cobrars = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->cuenta_cobrars = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);
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
		$this->cuenta_cobrar = new cuenta_cobrar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->cuenta_cobrar=$this->cuenta_cobrarDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_cobrar_util::refrescarFKDescripcion($this->cuenta_cobrar);
			}
						
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGet($this->cuenta_cobrar,$this->datosCliente);
			cuenta_cobrar_logic_add::updatecuenta_cobrarToGet($this->cuenta_cobrar);
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
		$this->cuenta_cobrar = new  cuenta_cobrar();
		  		  
        try {		
			$this->cuenta_cobrar=$this->cuenta_cobrarDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_cobrar_util::refrescarFKDescripcion($this->cuenta_cobrar);
			}
			
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGet($this->cuenta_cobrar,$this->datosCliente);
			cuenta_cobrar_logic_add::updatecuenta_cobrarToGet($this->cuenta_cobrar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?cuenta_cobrar {
		$cuenta_cobrarLogic = new  cuenta_cobrar_logic();
		  		  
        try {		
			$cuenta_cobrarLogic->setConnexion($connexion);			
			$cuenta_cobrarLogic->getEntity($id);			
			return $cuenta_cobrarLogic->getcuenta_cobrar();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->cuenta_cobrar = new  cuenta_cobrar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->cuenta_cobrar=$this->cuenta_cobrarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_cobrar_util::refrescarFKDescripcion($this->cuenta_cobrar);
			}
			
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGet($this->cuenta_cobrar,$this->datosCliente);
			cuenta_cobrar_logic_add::updatecuenta_cobrarToGet($this->cuenta_cobrar);
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
		$this->cuenta_cobrar = new  cuenta_cobrar();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_cobrar=$this->cuenta_cobrarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_cobrar_util::refrescarFKDescripcion($this->cuenta_cobrar);
			}
			
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGet($this->cuenta_cobrar,$this->datosCliente);
			cuenta_cobrar_logic_add::updatecuenta_cobrarToGet($this->cuenta_cobrar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?cuenta_cobrar {
		$cuenta_cobrarLogic = new  cuenta_cobrar_logic();
		  		  
        try {		
			$cuenta_cobrarLogic->setConnexion($connexion);			
			$cuenta_cobrarLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $cuenta_cobrarLogic->getcuenta_cobrar();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cuenta_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);			
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
		$this->cuenta_cobrars = array();
		  		  
        try {			
			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->cuenta_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);
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
		$this->cuenta_cobrars = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$cuenta_cobrarLogic = new  cuenta_cobrar_logic();
		  		  
        try {		
			$cuenta_cobrarLogic->setConnexion($connexion);			
			$cuenta_cobrarLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $cuenta_cobrarLogic->getcuenta_cobrars();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->cuenta_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);
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
		$this->cuenta_cobrars = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->cuenta_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);
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
		$this->cuenta_cobrars = array();
		  		  
        try {			
			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}	
			
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cuenta_cobrars = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);
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
		$this->cuenta_cobrars = array();
		  		  
        try {		
			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,cuenta_cobrar_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,cuenta_cobrar_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cuenta_cobrar_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cuenta_cobrar_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idestado_cuentas_cobrarWithConnection(string $strFinalQuery,Pagination $pagination,int $id_estado_cuentas_cobrar) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estado_cuentas_cobrar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estado_cuentas_cobrar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado_cuentas_cobrar,cuenta_cobrar_util::$ID_ESTADO_CUENTAS_COBRAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado_cuentas_cobrar);

			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idestado_cuentas_cobrar(string $strFinalQuery,Pagination $pagination,int $id_estado_cuentas_cobrar) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estado_cuentas_cobrar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estado_cuentas_cobrar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado_cuentas_cobrar,cuenta_cobrar_util::$ID_ESTADO_CUENTAS_COBRAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado_cuentas_cobrar);

			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdfacturaWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_factura) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_factura= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_factura->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_factura,cuenta_cobrar_util::$ID_FACTURA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_factura);

			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idfactura(string $strFinalQuery,Pagination $pagination,?int $id_factura) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_factura= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_factura->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_factura,cuenta_cobrar_util::$ID_FACTURA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_factura);

			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);
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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,cuenta_cobrar_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);

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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,cuenta_cobrar_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdproveedorWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cliente) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,cuenta_cobrar_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idproveedor(string $strFinalQuery,Pagination $pagination,int $id_cliente) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,cuenta_cobrar_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);
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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,cuenta_cobrar_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);

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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,cuenta_cobrar_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtermino_pago_clienteWithConnection(string $strFinalQuery,Pagination $pagination,int $id_termino_pago_cliente) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_termino_pago_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_termino_pago_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_cliente,cuenta_cobrar_util::$ID_TERMINO_PAGO_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_cliente);

			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtermino_pago_cliente(string $strFinalQuery,Pagination $pagination,int $id_termino_pago_cliente) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_termino_pago_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_termino_pago_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_cliente,cuenta_cobrar_util::$ID_TERMINO_PAGO_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_cliente);

			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,cuenta_cobrar_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,cuenta_cobrar_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->cuenta_cobrars=$this->cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_cobrars);
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
						
			//cuenta_cobrar_logic_add::checkcuenta_cobrarToSave($this->cuenta_cobrar,$this->datosCliente,$this->connexion);	       
			cuenta_cobrar_logic_add::updatecuenta_cobrarToSave($this->cuenta_cobrar);			
			cuenta_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cuenta_cobrar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->cuenta_cobrarLogicAdditional->checkGeneralEntityToSave($this,$this->cuenta_cobrar,$this->datosCliente,$this->connexion);
			
			
			cuenta_cobrar_data::save($this->cuenta_cobrar, $this->connexion);	    	       	 				
			//cuenta_cobrar_logic_add::checkcuenta_cobrarToSaveAfter($this->cuenta_cobrar,$this->datosCliente,$this->connexion);			
			$this->cuenta_cobrarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cuenta_cobrar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cuenta_cobrar_util::refrescarFKDescripcion($this->cuenta_cobrar);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->cuenta_cobrar->getIsDeleted()) {
				$this->cuenta_cobrar=null;
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
						
			/*cuenta_cobrar_logic_add::checkcuenta_cobrarToSave($this->cuenta_cobrar,$this->datosCliente,$this->connexion);*/	        
			cuenta_cobrar_logic_add::updatecuenta_cobrarToSave($this->cuenta_cobrar);			
			$this->cuenta_cobrarLogicAdditional->checkGeneralEntityToSave($this,$this->cuenta_cobrar,$this->datosCliente,$this->connexion);			
			cuenta_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cuenta_cobrar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			cuenta_cobrar_data::save($this->cuenta_cobrar, $this->connexion);	    	       	 						
			/*cuenta_cobrar_logic_add::checkcuenta_cobrarToSaveAfter($this->cuenta_cobrar,$this->datosCliente,$this->connexion);*/			
			$this->cuenta_cobrarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cuenta_cobrar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cuenta_cobrar_util::refrescarFKDescripcion($this->cuenta_cobrar);				
			}
			
			if($this->cuenta_cobrar->getIsDeleted()) {
				$this->cuenta_cobrar=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(cuenta_cobrar $cuenta_cobrar,Connexion $connexion)  {
		$cuenta_cobrarLogic = new  cuenta_cobrar_logic();		  		  
        try {		
			$cuenta_cobrarLogic->setConnexion($connexion);			
			$cuenta_cobrarLogic->setcuenta_cobrar($cuenta_cobrar);			
			$cuenta_cobrarLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*cuenta_cobrar_logic_add::checkcuenta_cobrarToSaves($this->cuenta_cobrars,$this->datosCliente,$this->connexion);*/	        	
			$this->cuenta_cobrarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cuenta_cobrars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cuenta_cobrars as $cuenta_cobrarLocal) {				
								
				cuenta_cobrar_logic_add::updatecuenta_cobrarToSave($cuenta_cobrarLocal);	        	
				cuenta_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cuenta_cobrarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				cuenta_cobrar_data::save($cuenta_cobrarLocal, $this->connexion);				
			}
			
			/*cuenta_cobrar_logic_add::checkcuenta_cobrarToSavesAfter($this->cuenta_cobrars,$this->datosCliente,$this->connexion);*/			
			$this->cuenta_cobrarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cuenta_cobrars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
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
			/*cuenta_cobrar_logic_add::checkcuenta_cobrarToSaves($this->cuenta_cobrars,$this->datosCliente,$this->connexion);*/			
			$this->cuenta_cobrarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cuenta_cobrars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cuenta_cobrars as $cuenta_cobrarLocal) {				
								
				cuenta_cobrar_logic_add::updatecuenta_cobrarToSave($cuenta_cobrarLocal);	        	
				cuenta_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cuenta_cobrarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				cuenta_cobrar_data::save($cuenta_cobrarLocal, $this->connexion);				
			}			
			
			/*cuenta_cobrar_logic_add::checkcuenta_cobrarToSavesAfter($this->cuenta_cobrars,$this->datosCliente,$this->connexion);*/			
			$this->cuenta_cobrarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cuenta_cobrars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $cuenta_cobrars,Connexion $connexion)  {
		$cuenta_cobrarLogic = new  cuenta_cobrar_logic();
		  		  
        try {		
			$cuenta_cobrarLogic->setConnexion($connexion);			
			$cuenta_cobrarLogic->setcuenta_cobrars($cuenta_cobrars);			
			$cuenta_cobrarLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$cuenta_cobrarsAux=array();
		
		foreach($this->cuenta_cobrars as $cuenta_cobrar) {
			if($cuenta_cobrar->getIsDeleted()==false) {
				$cuenta_cobrarsAux[]=$cuenta_cobrar;
			}
		}
		
		$this->cuenta_cobrars=$cuenta_cobrarsAux;
	}
	
	public function updateToGetsAuxiliar(array &$cuenta_cobrars) {
		if($this->cuenta_cobrarLogicAdditional==null) {
			$this->cuenta_cobrarLogicAdditional=new cuenta_cobrar_logic_add();
		}
		
		
		$this->cuenta_cobrarLogicAdditional->updateToGets($cuenta_cobrars,$this);					
		$this->cuenta_cobrarLogicAdditional->updateToGetsReferencia($cuenta_cobrars,$this);			
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->cuenta_cobrars as $cuenta_cobrar) {
				
				$cuenta_cobrar->setid_empresa_Descripcion(cuenta_cobrar_util::getempresaDescripcion($cuenta_cobrar->getempresa()));
				$cuenta_cobrar->setid_sucursal_Descripcion(cuenta_cobrar_util::getsucursalDescripcion($cuenta_cobrar->getsucursal()));
				$cuenta_cobrar->setid_ejercicio_Descripcion(cuenta_cobrar_util::getejercicioDescripcion($cuenta_cobrar->getejercicio()));
				$cuenta_cobrar->setid_periodo_Descripcion(cuenta_cobrar_util::getperiodoDescripcion($cuenta_cobrar->getperiodo()));
				$cuenta_cobrar->setid_usuario_Descripcion(cuenta_cobrar_util::getusuarioDescripcion($cuenta_cobrar->getusuario()));
				$cuenta_cobrar->setid_factura_Descripcion(cuenta_cobrar_util::getfacturaDescripcion($cuenta_cobrar->getfactura()));
				$cuenta_cobrar->setid_cliente_Descripcion(cuenta_cobrar_util::getclienteDescripcion($cuenta_cobrar->getcliente()));
				$cuenta_cobrar->setid_termino_pago_cliente_Descripcion(cuenta_cobrar_util::gettermino_pago_clienteDescripcion($cuenta_cobrar->gettermino_pago_cliente()));
				$cuenta_cobrar->setid_estado_cuentas_cobrar_Descripcion(cuenta_cobrar_util::getestado_cuentas_cobrarDescripcion($cuenta_cobrar->getestado_cuentas_cobrar()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cuenta_cobrar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cuenta_cobrar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cuenta_cobrar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$cuenta_cobrarForeignKey=new cuenta_cobrar_param_return();//cuenta_cobrarForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_factura',$strRecargarFkTipos,',')) {
				$this->cargarCombosfacturasFK($this->connexion,$strRecargarFkQuery,$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombosclientesFK($this->connexion,$strRecargarFkQuery,$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_termino_pago_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombostermino_pago_clientesFK($this->connexion,$strRecargarFkQuery,$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado_cuentas_cobrar',$strRecargarFkTipos,',')) {
				$this->cargarCombosestado_cuentas_cobrarsFK($this->connexion,$strRecargarFkQuery,$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_factura',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosfacturasFK($this->connexion,' where id=-1 ',$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosclientesFK($this->connexion,' where id=-1 ',$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_termino_pago_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostermino_pago_clientesFK($this->connexion,' where id=-1 ',$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_estado_cuentas_cobrar',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosestado_cuentas_cobrarsFK($this->connexion,' where id=-1 ',$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $cuenta_cobrarForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$cuenta_cobrarForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($cuenta_cobrarForeignKey->idempresaDefaultFK==0) {
					$cuenta_cobrarForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$cuenta_cobrarForeignKey->empresasFK[$empresaLocal->getId()]=cuenta_cobrar_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($cuenta_cobrar_session->bigidempresaActual!=null && $cuenta_cobrar_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cuenta_cobrar_session->bigidempresaActual);//WithConnection

				$cuenta_cobrarForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=cuenta_cobrar_util::getempresaDescripcion($empresaLogic->getempresa());
				$cuenta_cobrarForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$cuenta_cobrarForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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
				if($cuenta_cobrarForeignKey->idsucursalDefaultFK==0) {
					$cuenta_cobrarForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$cuenta_cobrarForeignKey->sucursalsFK[$sucursalLocal->getId()]=cuenta_cobrar_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($cuenta_cobrar_session->bigidsucursalActual!=null && $cuenta_cobrar_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($cuenta_cobrar_session->bigidsucursalActual);//WithConnection

				$cuenta_cobrarForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=cuenta_cobrar_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$cuenta_cobrarForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$cuenta_cobrarForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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
				if($cuenta_cobrarForeignKey->idejercicioDefaultFK==0) {
					$cuenta_cobrarForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$cuenta_cobrarForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=cuenta_cobrar_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($cuenta_cobrar_session->bigidejercicioActual!=null && $cuenta_cobrar_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($cuenta_cobrar_session->bigidejercicioActual);//WithConnection

				$cuenta_cobrarForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=cuenta_cobrar_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$cuenta_cobrarForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$cuenta_cobrarForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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
				if($cuenta_cobrarForeignKey->idperiodoDefaultFK==0) {
					$cuenta_cobrarForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$cuenta_cobrarForeignKey->periodosFK[$periodoLocal->getId()]=cuenta_cobrar_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($cuenta_cobrar_session->bigidperiodoActual!=null && $cuenta_cobrar_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($cuenta_cobrar_session->bigidperiodoActual);//WithConnection

				$cuenta_cobrarForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=cuenta_cobrar_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$cuenta_cobrarForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$cuenta_cobrarForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($cuenta_cobrarForeignKey->idusuarioDefaultFK==0) {
					$cuenta_cobrarForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$cuenta_cobrarForeignKey->usuariosFK[$usuarioLocal->getId()]=cuenta_cobrar_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($cuenta_cobrar_session->bigidusuarioActual!=null && $cuenta_cobrar_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($cuenta_cobrar_session->bigidusuarioActual);//WithConnection

				$cuenta_cobrarForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=cuenta_cobrar_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$cuenta_cobrarForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosfacturasFK($connexion=null,$strRecargarFkQuery='',$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$facturaLogic= new factura_logic();
		$pagination= new Pagination();
		$cuenta_cobrarForeignKey->facturasFK=array();

		$facturaLogic->setConnexion($connexion);
		$facturaLogic->getfacturaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionfactura!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=factura_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalfactura=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalfactura=Funciones::GetFinalQueryAppend($finalQueryGlobalfactura, '');
				$finalQueryGlobalfactura.=factura_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalfactura.$strRecargarFkQuery;		

				$facturaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($facturaLogic->getfacturas() as $facturaLocal ) {
				if($cuenta_cobrarForeignKey->idfacturaDefaultFK==0) {
					$cuenta_cobrarForeignKey->idfacturaDefaultFK=$facturaLocal->getId();
				}

				$cuenta_cobrarForeignKey->facturasFK[$facturaLocal->getId()]=cuenta_cobrar_util::getfacturaDescripcion($facturaLocal);
			}

		} else {

			if($cuenta_cobrar_session->bigidfacturaActual!=null && $cuenta_cobrar_session->bigidfacturaActual > 0) {
				$facturaLogic->getEntity($cuenta_cobrar_session->bigidfacturaActual);//WithConnection

				$cuenta_cobrarForeignKey->facturasFK[$facturaLogic->getfactura()->getId()]=cuenta_cobrar_util::getfacturaDescripcion($facturaLogic->getfactura());
				$cuenta_cobrarForeignKey->idfacturaDefaultFK=$facturaLogic->getfactura()->getId();
			}
		}
	}

	public function cargarCombosclientesFK($connexion=null,$strRecargarFkQuery='',$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$clienteLogic= new cliente_logic();
		$pagination= new Pagination();
		$cuenta_cobrarForeignKey->clientesFK=array();

		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		if($cuenta_cobrar_session->bitBusquedaDesdeFKSesioncliente!=true) {
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
				if($cuenta_cobrarForeignKey->idclienteDefaultFK==0) {
					$cuenta_cobrarForeignKey->idclienteDefaultFK=$clienteLocal->getId();
				}

				$cuenta_cobrarForeignKey->clientesFK[$clienteLocal->getId()]=cuenta_cobrar_util::getclienteDescripcion($clienteLocal);
			}

		} else {

			if($cuenta_cobrar_session->bigidclienteActual!=null && $cuenta_cobrar_session->bigidclienteActual > 0) {
				$clienteLogic->getEntity($cuenta_cobrar_session->bigidclienteActual);//WithConnection

				$cuenta_cobrarForeignKey->clientesFK[$clienteLogic->getcliente()->getId()]=cuenta_cobrar_util::getclienteDescripcion($clienteLogic->getcliente());
				$cuenta_cobrarForeignKey->idclienteDefaultFK=$clienteLogic->getcliente()->getId();
			}
		}
	}

	public function cargarCombostermino_pago_clientesFK($connexion=null,$strRecargarFkQuery='',$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$termino_pago_clienteLogic= new termino_pago_cliente_logic();
		$pagination= new Pagination();
		$cuenta_cobrarForeignKey->termino_pago_clientesFK=array();

		$termino_pago_clienteLogic->setConnexion($connexion);
		$termino_pago_clienteLogic->gettermino_pago_clienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		if($cuenta_cobrar_session->bitBusquedaDesdeFKSesiontermino_pago_cliente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=termino_pago_cliente_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltermino_pago_cliente=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltermino_pago_cliente=Funciones::GetFinalQueryAppend($finalQueryGlobaltermino_pago_cliente, '');
				$finalQueryGlobaltermino_pago_cliente.=termino_pago_cliente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltermino_pago_cliente.$strRecargarFkQuery;		

				$termino_pago_clienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($termino_pago_clienteLogic->gettermino_pago_clientes() as $termino_pago_clienteLocal ) {
				if($cuenta_cobrarForeignKey->idtermino_pago_clienteDefaultFK==0) {
					$cuenta_cobrarForeignKey->idtermino_pago_clienteDefaultFK=$termino_pago_clienteLocal->getId();
				}

				$cuenta_cobrarForeignKey->termino_pago_clientesFK[$termino_pago_clienteLocal->getId()]=cuenta_cobrar_util::gettermino_pago_clienteDescripcion($termino_pago_clienteLocal);
			}

		} else {

			if($cuenta_cobrar_session->bigidtermino_pago_clienteActual!=null && $cuenta_cobrar_session->bigidtermino_pago_clienteActual > 0) {
				$termino_pago_clienteLogic->getEntity($cuenta_cobrar_session->bigidtermino_pago_clienteActual);//WithConnection

				$cuenta_cobrarForeignKey->termino_pago_clientesFK[$termino_pago_clienteLogic->gettermino_pago_cliente()->getId()]=cuenta_cobrar_util::gettermino_pago_clienteDescripcion($termino_pago_clienteLogic->gettermino_pago_cliente());
				$cuenta_cobrarForeignKey->idtermino_pago_clienteDefaultFK=$termino_pago_clienteLogic->gettermino_pago_cliente()->getId();
			}
		}
	}

	public function cargarCombosestado_cuentas_cobrarsFK($connexion=null,$strRecargarFkQuery='',$cuenta_cobrarForeignKey,$cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$estado_cuentas_cobrarLogic= new estado_cuentas_cobrar_logic();
		$pagination= new Pagination();
		$cuenta_cobrarForeignKey->estado_cuentas_cobrarsFK=array();

		$estado_cuentas_cobrarLogic->setConnexion($connexion);
		$estado_cuentas_cobrarLogic->getestado_cuentas_cobrarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionestado_cuentas_cobrar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=estado_cuentas_cobrar_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalestado_cuentas_cobrar=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalestado_cuentas_cobrar=Funciones::GetFinalQueryAppend($finalQueryGlobalestado_cuentas_cobrar, '');
				$finalQueryGlobalestado_cuentas_cobrar.=estado_cuentas_cobrar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalestado_cuentas_cobrar.$strRecargarFkQuery;		

				$estado_cuentas_cobrarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($estado_cuentas_cobrarLogic->getestado_cuentas_cobrars() as $estado_cuentas_cobrarLocal ) {
				if($cuenta_cobrarForeignKey->idestado_cuentas_cobrarDefaultFK==0) {
					$cuenta_cobrarForeignKey->idestado_cuentas_cobrarDefaultFK=$estado_cuentas_cobrarLocal->getId();
				}

				$cuenta_cobrarForeignKey->estado_cuentas_cobrarsFK[$estado_cuentas_cobrarLocal->getId()]=cuenta_cobrar_util::getestado_cuentas_cobrarDescripcion($estado_cuentas_cobrarLocal);
			}

		} else {

			if($cuenta_cobrar_session->bigidestado_cuentas_cobrarActual!=null && $cuenta_cobrar_session->bigidestado_cuentas_cobrarActual > 0) {
				$estado_cuentas_cobrarLogic->getEntity($cuenta_cobrar_session->bigidestado_cuentas_cobrarActual);//WithConnection

				$cuenta_cobrarForeignKey->estado_cuentas_cobrarsFK[$estado_cuentas_cobrarLogic->getestado_cuentas_cobrar()->getId()]=cuenta_cobrar_util::getestado_cuentas_cobrarDescripcion($estado_cuentas_cobrarLogic->getestado_cuentas_cobrar());
				$cuenta_cobrarForeignKey->idestado_cuentas_cobrarDefaultFK=$estado_cuentas_cobrarLogic->getestado_cuentas_cobrar()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($cuenta_cobrar,$debitocuentacobrars,$pagocuentacobrars,$creditocuentacobrars) {
		$this->saveRelacionesBase($cuenta_cobrar,$debitocuentacobrars,$pagocuentacobrars,$creditocuentacobrars,true);
	}

	public function saveRelaciones($cuenta_cobrar,$debitocuentacobrars,$pagocuentacobrars,$creditocuentacobrars) {
		$this->saveRelacionesBase($cuenta_cobrar,$debitocuentacobrars,$pagocuentacobrars,$creditocuentacobrars,false);
	}

	public function saveRelacionesBase($cuenta_cobrar,$debitocuentacobrars=array(),$pagocuentacobrars=array(),$creditocuentacobrars=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$cuenta_cobrar->setdebito_cuenta_cobrars($debitocuentacobrars);
			$cuenta_cobrar->setpago_cuenta_cobrars($pagocuentacobrars);
			$cuenta_cobrar->setcredito_cuenta_cobrars($creditocuentacobrars);
			$this->setcuenta_cobrar($cuenta_cobrar);

			if(cuenta_cobrar_logic_add::validarSaveRelaciones($cuenta_cobrar,$this)) {

				cuenta_cobrar_logic_add::updateRelacionesToSave($cuenta_cobrar,$this);

				if(($this->cuenta_cobrar->getIsNew() || $this->cuenta_cobrar->getIsChanged()) && !$this->cuenta_cobrar->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($debitocuentacobrars,$pagocuentacobrars,$creditocuentacobrars);

				} else if($this->cuenta_cobrar->getIsDeleted()) {
					$this->saveRelacionesDetalles($debitocuentacobrars,$pagocuentacobrars,$creditocuentacobrars);
					$this->save();
				}

				cuenta_cobrar_logic_add::updateRelacionesToSaveAfter($cuenta_cobrar,$this);

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
	
	
	public function saveRelacionesDetalles($debitocuentacobrars=array(),$pagocuentacobrars=array(),$creditocuentacobrars=array()) {
		try {
	

			$idcuenta_cobrarActual=$this->getcuenta_cobrar()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/debito_cuenta_cobrar_carga.php');
			debito_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$debitocuentacobrarLogic_Desde_cuenta_cobrar=new debito_cuenta_cobrar_logic();
			$debitocuentacobrarLogic_Desde_cuenta_cobrar->setdebito_cuenta_cobrars($debitocuentacobrars);

			$debitocuentacobrarLogic_Desde_cuenta_cobrar->setConnexion($this->getConnexion());
			$debitocuentacobrarLogic_Desde_cuenta_cobrar->setDatosCliente($this->datosCliente);

			foreach($debitocuentacobrarLogic_Desde_cuenta_cobrar->getdebito_cuenta_cobrars() as $debitocuentacobrar_Desde_cuenta_cobrar) {
				$debitocuentacobrar_Desde_cuenta_cobrar->setid_cuenta_cobrar($idcuenta_cobrarActual);
			}

			$debitocuentacobrarLogic_Desde_cuenta_cobrar->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/pago_cuenta_cobrar_carga.php');
			pago_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$pagocuentacobrarLogic_Desde_cuenta_cobrar=new pago_cuenta_cobrar_logic();
			$pagocuentacobrarLogic_Desde_cuenta_cobrar->setpago_cuenta_cobrars($pagocuentacobrars);

			$pagocuentacobrarLogic_Desde_cuenta_cobrar->setConnexion($this->getConnexion());
			$pagocuentacobrarLogic_Desde_cuenta_cobrar->setDatosCliente($this->datosCliente);

			foreach($pagocuentacobrarLogic_Desde_cuenta_cobrar->getpago_cuenta_cobrars() as $pagocuentacobrar_Desde_cuenta_cobrar) {
				$pagocuentacobrar_Desde_cuenta_cobrar->setid_cuenta_cobrar($idcuenta_cobrarActual);
			}

			$pagocuentacobrarLogic_Desde_cuenta_cobrar->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/credito_cuenta_cobrar_carga.php');
			credito_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$creditocuentacobrarLogic_Desde_cuenta_cobrar=new credito_cuenta_cobrar_logic();
			$creditocuentacobrarLogic_Desde_cuenta_cobrar->setcredito_cuenta_cobrars($creditocuentacobrars);

			$creditocuentacobrarLogic_Desde_cuenta_cobrar->setConnexion($this->getConnexion());
			$creditocuentacobrarLogic_Desde_cuenta_cobrar->setDatosCliente($this->datosCliente);

			foreach($creditocuentacobrarLogic_Desde_cuenta_cobrar->getcredito_cuenta_cobrars() as $creditocuentacobrar_Desde_cuenta_cobrar) {
				$creditocuentacobrar_Desde_cuenta_cobrar->setid_cuenta_cobrar($idcuenta_cobrarActual);
			}

			$creditocuentacobrarLogic_Desde_cuenta_cobrar->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $cuenta_cobrars,cuenta_cobrar_param_return $cuenta_cobrarParameterGeneral) : cuenta_cobrar_param_return {
		$cuenta_cobrarReturnGeneral=new cuenta_cobrar_param_return();
	
		 try {	
			
			if($this->cuenta_cobrarLogicAdditional==null) {
				$this->cuenta_cobrarLogicAdditional=new cuenta_cobrar_logic_add();
			}
			
			$this->cuenta_cobrarLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$cuenta_cobrars,$cuenta_cobrarParameterGeneral,$cuenta_cobrarReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $cuenta_cobrarReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $cuenta_cobrars,cuenta_cobrar_param_return $cuenta_cobrarParameterGeneral) : cuenta_cobrar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cuenta_cobrarReturnGeneral=new cuenta_cobrar_param_return();
	
			
			if($this->cuenta_cobrarLogicAdditional==null) {
				$this->cuenta_cobrarLogicAdditional=new cuenta_cobrar_logic_add();
			}
			
			$this->cuenta_cobrarLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$cuenta_cobrars,$cuenta_cobrarParameterGeneral,$cuenta_cobrarReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_cobrars,cuenta_cobrar $cuenta_cobrar,cuenta_cobrar_param_return $cuenta_cobrarParameterGeneral,bool $isEsNuevocuenta_cobrar,array $clases) : cuenta_cobrar_param_return {
		 try {	
			$cuenta_cobrarReturnGeneral=new cuenta_cobrar_param_return();
	
			$cuenta_cobrarReturnGeneral->setcuenta_cobrar($cuenta_cobrar);
			$cuenta_cobrarReturnGeneral->setcuenta_cobrars($cuenta_cobrars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cuenta_cobrarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->cuenta_cobrarLogicAdditional==null) {
				$this->cuenta_cobrarLogicAdditional=new cuenta_cobrar_logic_add();
			}
			
			$cuenta_cobrarReturnGeneral=$this->cuenta_cobrarLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_cobrars,$cuenta_cobrar,$cuenta_cobrarParameterGeneral,$cuenta_cobrarReturnGeneral,$isEsNuevocuenta_cobrar,$clases);
			
			/*cuenta_cobrarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_cobrars,$cuenta_cobrar,$cuenta_cobrarParameterGeneral,$cuenta_cobrarReturnGeneral,$isEsNuevocuenta_cobrar,$clases);*/
			
			return $cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_cobrars,cuenta_cobrar $cuenta_cobrar,cuenta_cobrar_param_return $cuenta_cobrarParameterGeneral,bool $isEsNuevocuenta_cobrar,array $clases) : cuenta_cobrar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cuenta_cobrarReturnGeneral=new cuenta_cobrar_param_return();
	
			$cuenta_cobrarReturnGeneral->setcuenta_cobrar($cuenta_cobrar);
			$cuenta_cobrarReturnGeneral->setcuenta_cobrars($cuenta_cobrars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cuenta_cobrarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->cuenta_cobrarLogicAdditional==null) {
				$this->cuenta_cobrarLogicAdditional=new cuenta_cobrar_logic_add();
			}
			
			$cuenta_cobrarReturnGeneral=$this->cuenta_cobrarLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_cobrars,$cuenta_cobrar,$cuenta_cobrarParameterGeneral,$cuenta_cobrarReturnGeneral,$isEsNuevocuenta_cobrar,$clases);
			
			/*cuenta_cobrarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_cobrars,$cuenta_cobrar,$cuenta_cobrarParameterGeneral,$cuenta_cobrarReturnGeneral,$isEsNuevocuenta_cobrar,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_cobrars,cuenta_cobrar $cuenta_cobrar,cuenta_cobrar_param_return $cuenta_cobrarParameterGeneral,bool $isEsNuevocuenta_cobrar,array $clases) : cuenta_cobrar_param_return {
		 try {	
			$cuenta_cobrarReturnGeneral=new cuenta_cobrar_param_return();
	
			$cuenta_cobrarReturnGeneral->setcuenta_cobrar($cuenta_cobrar);
			$cuenta_cobrarReturnGeneral->setcuenta_cobrars($cuenta_cobrars);
			
			
			
			if($this->cuenta_cobrarLogicAdditional==null) {
				$this->cuenta_cobrarLogicAdditional=new cuenta_cobrar_logic_add();
			}
			
			$cuenta_cobrarReturnGeneral=$this->cuenta_cobrarLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_cobrars,$cuenta_cobrar,$cuenta_cobrarParameterGeneral,$cuenta_cobrarReturnGeneral,$isEsNuevocuenta_cobrar,$clases);
			
			/*cuenta_cobrarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_cobrars,$cuenta_cobrar,$cuenta_cobrarParameterGeneral,$cuenta_cobrarReturnGeneral,$isEsNuevocuenta_cobrar,$clases);*/
			
			return $cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_cobrars,cuenta_cobrar $cuenta_cobrar,cuenta_cobrar_param_return $cuenta_cobrarParameterGeneral,bool $isEsNuevocuenta_cobrar,array $clases) : cuenta_cobrar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cuenta_cobrarReturnGeneral=new cuenta_cobrar_param_return();
	
			$cuenta_cobrarReturnGeneral->setcuenta_cobrar($cuenta_cobrar);
			$cuenta_cobrarReturnGeneral->setcuenta_cobrars($cuenta_cobrars);
			
			
			if($this->cuenta_cobrarLogicAdditional==null) {
				$this->cuenta_cobrarLogicAdditional=new cuenta_cobrar_logic_add();
			}
			
			$cuenta_cobrarReturnGeneral=$this->cuenta_cobrarLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_cobrars,$cuenta_cobrar,$cuenta_cobrarParameterGeneral,$cuenta_cobrarReturnGeneral,$isEsNuevocuenta_cobrar,$clases);
			
			/*cuenta_cobrarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_cobrars,$cuenta_cobrar,$cuenta_cobrarParameterGeneral,$cuenta_cobrarReturnGeneral,$isEsNuevocuenta_cobrar,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,cuenta_cobrar $cuenta_cobrar,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,cuenta_cobrar $cuenta_cobrar,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(cuenta_cobrar $cuenta_cobrar,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			cuenta_cobrar_logic_add::updatecuenta_cobrarToGet($this->cuenta_cobrar);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cuenta_cobrar->setempresa($this->cuenta_cobrarDataAccess->getempresa($this->connexion,$cuenta_cobrar));
		$cuenta_cobrar->setsucursal($this->cuenta_cobrarDataAccess->getsucursal($this->connexion,$cuenta_cobrar));
		$cuenta_cobrar->setejercicio($this->cuenta_cobrarDataAccess->getejercicio($this->connexion,$cuenta_cobrar));
		$cuenta_cobrar->setperiodo($this->cuenta_cobrarDataAccess->getperiodo($this->connexion,$cuenta_cobrar));
		$cuenta_cobrar->setusuario($this->cuenta_cobrarDataAccess->getusuario($this->connexion,$cuenta_cobrar));
		$cuenta_cobrar->setfactura($this->cuenta_cobrarDataAccess->getfactura($this->connexion,$cuenta_cobrar));
		$cuenta_cobrar->setcliente($this->cuenta_cobrarDataAccess->getcliente($this->connexion,$cuenta_cobrar));
		$cuenta_cobrar->settermino_pago_cliente($this->cuenta_cobrarDataAccess->gettermino_pago_cliente($this->connexion,$cuenta_cobrar));
		$cuenta_cobrar->setestado_cuentas_cobrar($this->cuenta_cobrarDataAccess->getestado_cuentas_cobrar($this->connexion,$cuenta_cobrar));
		$cuenta_cobrar->setdebito_cuenta_cobrars($this->cuenta_cobrarDataAccess->getdebito_cuenta_cobrars($this->connexion,$cuenta_cobrar));
		$cuenta_cobrar->setpago_cuenta_cobrars($this->cuenta_cobrarDataAccess->getpago_cuenta_cobrars($this->connexion,$cuenta_cobrar));
		$cuenta_cobrar->setcredito_cuenta_cobrars($this->cuenta_cobrarDataAccess->getcredito_cuenta_cobrars($this->connexion,$cuenta_cobrar));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cuenta_cobrar->setempresa($this->cuenta_cobrarDataAccess->getempresa($this->connexion,$cuenta_cobrar));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$cuenta_cobrar->setsucursal($this->cuenta_cobrarDataAccess->getsucursal($this->connexion,$cuenta_cobrar));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$cuenta_cobrar->setejercicio($this->cuenta_cobrarDataAccess->getejercicio($this->connexion,$cuenta_cobrar));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$cuenta_cobrar->setperiodo($this->cuenta_cobrarDataAccess->getperiodo($this->connexion,$cuenta_cobrar));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$cuenta_cobrar->setusuario($this->cuenta_cobrarDataAccess->getusuario($this->connexion,$cuenta_cobrar));
				continue;
			}

			if($clas->clas==factura::$class.'') {
				$cuenta_cobrar->setfactura($this->cuenta_cobrarDataAccess->getfactura($this->connexion,$cuenta_cobrar));
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$cuenta_cobrar->setcliente($this->cuenta_cobrarDataAccess->getcliente($this->connexion,$cuenta_cobrar));
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				$cuenta_cobrar->settermino_pago_cliente($this->cuenta_cobrarDataAccess->gettermino_pago_cliente($this->connexion,$cuenta_cobrar));
				continue;
			}

			if($clas->clas==estado_cuentas_cobrar::$class.'') {
				$cuenta_cobrar->setestado_cuentas_cobrar($this->cuenta_cobrarDataAccess->getestado_cuentas_cobrar($this->connexion,$cuenta_cobrar));
				continue;
			}

			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta_cobrar->setdebito_cuenta_cobrars($this->cuenta_cobrarDataAccess->getdebito_cuenta_cobrars($this->connexion,$cuenta_cobrar));

				if($this->isConDeep) {
					$debitocuentacobrarLogic= new debito_cuenta_cobrar_logic($this->connexion);
					$debitocuentacobrarLogic->setdebito_cuenta_cobrars($cuenta_cobrar->getdebito_cuenta_cobrars());
					$classesLocal=debito_cuenta_cobrar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$debitocuentacobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					debito_cuenta_cobrar_util::refrescarFKDescripciones($debitocuentacobrarLogic->getdebito_cuenta_cobrars());
					$cuenta_cobrar->setdebito_cuenta_cobrars($debitocuentacobrarLogic->getdebito_cuenta_cobrars());
				}

				continue;
			}

			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta_cobrar->setpago_cuenta_cobrars($this->cuenta_cobrarDataAccess->getpago_cuenta_cobrars($this->connexion,$cuenta_cobrar));

				if($this->isConDeep) {
					$pagocuentacobrarLogic= new pago_cuenta_cobrar_logic($this->connexion);
					$pagocuentacobrarLogic->setpago_cuenta_cobrars($cuenta_cobrar->getpago_cuenta_cobrars());
					$classesLocal=pago_cuenta_cobrar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$pagocuentacobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					pago_cuenta_cobrar_util::refrescarFKDescripciones($pagocuentacobrarLogic->getpago_cuenta_cobrars());
					$cuenta_cobrar->setpago_cuenta_cobrars($pagocuentacobrarLogic->getpago_cuenta_cobrars());
				}

				continue;
			}

			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta_cobrar->setcredito_cuenta_cobrars($this->cuenta_cobrarDataAccess->getcredito_cuenta_cobrars($this->connexion,$cuenta_cobrar));

				if($this->isConDeep) {
					$creditocuentacobrarLogic= new credito_cuenta_cobrar_logic($this->connexion);
					$creditocuentacobrarLogic->setcredito_cuenta_cobrars($cuenta_cobrar->getcredito_cuenta_cobrars());
					$classesLocal=credito_cuenta_cobrar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$creditocuentacobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					credito_cuenta_cobrar_util::refrescarFKDescripciones($creditocuentacobrarLogic->getcredito_cuenta_cobrars());
					$cuenta_cobrar->setcredito_cuenta_cobrars($creditocuentacobrarLogic->getcredito_cuenta_cobrars());
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
			$cuenta_cobrar->setempresa($this->cuenta_cobrarDataAccess->getempresa($this->connexion,$cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_cobrar->setsucursal($this->cuenta_cobrarDataAccess->getsucursal($this->connexion,$cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_cobrar->setejercicio($this->cuenta_cobrarDataAccess->getejercicio($this->connexion,$cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_cobrar->setperiodo($this->cuenta_cobrarDataAccess->getperiodo($this->connexion,$cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_cobrar->setusuario($this->cuenta_cobrarDataAccess->getusuario($this->connexion,$cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_cobrar->setfactura($this->cuenta_cobrarDataAccess->getfactura($this->connexion,$cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_cobrar->setcliente($this->cuenta_cobrarDataAccess->getcliente($this->connexion,$cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_cobrar->settermino_pago_cliente($this->cuenta_cobrarDataAccess->gettermino_pago_cliente($this->connexion,$cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estado_cuentas_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_cobrar->setestado_cuentas_cobrar($this->cuenta_cobrarDataAccess->getestado_cuentas_cobrar($this->connexion,$cuenta_cobrar));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_cobrar::$class);
			$cuenta_cobrar->setdebito_cuenta_cobrars($this->cuenta_cobrarDataAccess->getdebito_cuenta_cobrars($this->connexion,$cuenta_cobrar));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_cobrar::$class);
			$cuenta_cobrar->setpago_cuenta_cobrars($this->cuenta_cobrarDataAccess->getpago_cuenta_cobrars($this->connexion,$cuenta_cobrar));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_cobrar::$class);
			$cuenta_cobrar->setcredito_cuenta_cobrars($this->cuenta_cobrarDataAccess->getcredito_cuenta_cobrars($this->connexion,$cuenta_cobrar));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cuenta_cobrar->setempresa($this->cuenta_cobrarDataAccess->getempresa($this->connexion,$cuenta_cobrar));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_cobrar->setsucursal($this->cuenta_cobrarDataAccess->getsucursal($this->connexion,$cuenta_cobrar));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($cuenta_cobrar->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_cobrar->setejercicio($this->cuenta_cobrarDataAccess->getejercicio($this->connexion,$cuenta_cobrar));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($cuenta_cobrar->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_cobrar->setperiodo($this->cuenta_cobrarDataAccess->getperiodo($this->connexion,$cuenta_cobrar));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($cuenta_cobrar->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_cobrar->setusuario($this->cuenta_cobrarDataAccess->getusuario($this->connexion,$cuenta_cobrar));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($cuenta_cobrar->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_cobrar->setfactura($this->cuenta_cobrarDataAccess->getfactura($this->connexion,$cuenta_cobrar));
		$facturaLogic= new factura_logic($this->connexion);
		$facturaLogic->deepLoad($cuenta_cobrar->getfactura(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_cobrar->setcliente($this->cuenta_cobrarDataAccess->getcliente($this->connexion,$cuenta_cobrar));
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepLoad($cuenta_cobrar->getcliente(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_cobrar->settermino_pago_cliente($this->cuenta_cobrarDataAccess->gettermino_pago_cliente($this->connexion,$cuenta_cobrar));
		$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
		$termino_pago_clienteLogic->deepLoad($cuenta_cobrar->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_cobrar->setestado_cuentas_cobrar($this->cuenta_cobrarDataAccess->getestado_cuentas_cobrar($this->connexion,$cuenta_cobrar));
		$estado_cuentas_cobrarLogic= new estado_cuentas_cobrar_logic($this->connexion);
		$estado_cuentas_cobrarLogic->deepLoad($cuenta_cobrar->getestado_cuentas_cobrar(),$isDeep,$deepLoadType,$clases);
				

		$cuenta_cobrar->setdebito_cuenta_cobrars($this->cuenta_cobrarDataAccess->getdebito_cuenta_cobrars($this->connexion,$cuenta_cobrar));

		foreach($cuenta_cobrar->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
			$debitocuentacobrarLogic= new debito_cuenta_cobrar_logic($this->connexion);
			$debitocuentacobrarLogic->deepLoad($debitocuentacobrar,$isDeep,$deepLoadType,$clases);
		}

		$cuenta_cobrar->setpago_cuenta_cobrars($this->cuenta_cobrarDataAccess->getpago_cuenta_cobrars($this->connexion,$cuenta_cobrar));

		foreach($cuenta_cobrar->getpago_cuenta_cobrars() as $pagocuentacobrar) {
			$pagocuentacobrarLogic= new pago_cuenta_cobrar_logic($this->connexion);
			$pagocuentacobrarLogic->deepLoad($pagocuentacobrar,$isDeep,$deepLoadType,$clases);
		}

		$cuenta_cobrar->setcredito_cuenta_cobrars($this->cuenta_cobrarDataAccess->getcredito_cuenta_cobrars($this->connexion,$cuenta_cobrar));

		foreach($cuenta_cobrar->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
			$creditocuentacobrarLogic= new credito_cuenta_cobrar_logic($this->connexion);
			$creditocuentacobrarLogic->deepLoad($creditocuentacobrar,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cuenta_cobrar->setempresa($this->cuenta_cobrarDataAccess->getempresa($this->connexion,$cuenta_cobrar));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$cuenta_cobrar->setsucursal($this->cuenta_cobrarDataAccess->getsucursal($this->connexion,$cuenta_cobrar));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($cuenta_cobrar->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$cuenta_cobrar->setejercicio($this->cuenta_cobrarDataAccess->getejercicio($this->connexion,$cuenta_cobrar));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($cuenta_cobrar->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$cuenta_cobrar->setperiodo($this->cuenta_cobrarDataAccess->getperiodo($this->connexion,$cuenta_cobrar));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($cuenta_cobrar->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$cuenta_cobrar->setusuario($this->cuenta_cobrarDataAccess->getusuario($this->connexion,$cuenta_cobrar));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($cuenta_cobrar->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==factura::$class.'') {
				$cuenta_cobrar->setfactura($this->cuenta_cobrarDataAccess->getfactura($this->connexion,$cuenta_cobrar));
				$facturaLogic= new factura_logic($this->connexion);
				$facturaLogic->deepLoad($cuenta_cobrar->getfactura(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$cuenta_cobrar->setcliente($this->cuenta_cobrarDataAccess->getcliente($this->connexion,$cuenta_cobrar));
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($cuenta_cobrar->getcliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				$cuenta_cobrar->settermino_pago_cliente($this->cuenta_cobrarDataAccess->gettermino_pago_cliente($this->connexion,$cuenta_cobrar));
				$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
				$termino_pago_clienteLogic->deepLoad($cuenta_cobrar->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==estado_cuentas_cobrar::$class.'') {
				$cuenta_cobrar->setestado_cuentas_cobrar($this->cuenta_cobrarDataAccess->getestado_cuentas_cobrar($this->connexion,$cuenta_cobrar));
				$estado_cuentas_cobrarLogic= new estado_cuentas_cobrar_logic($this->connexion);
				$estado_cuentas_cobrarLogic->deepLoad($cuenta_cobrar->getestado_cuentas_cobrar(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta_cobrar->setdebito_cuenta_cobrars($this->cuenta_cobrarDataAccess->getdebito_cuenta_cobrars($this->connexion,$cuenta_cobrar));

				foreach($cuenta_cobrar->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
					$debitocuentacobrarLogic= new debito_cuenta_cobrar_logic($this->connexion);
					$debitocuentacobrarLogic->deepLoad($debitocuentacobrar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta_cobrar->setpago_cuenta_cobrars($this->cuenta_cobrarDataAccess->getpago_cuenta_cobrars($this->connexion,$cuenta_cobrar));

				foreach($cuenta_cobrar->getpago_cuenta_cobrars() as $pagocuentacobrar) {
					$pagocuentacobrarLogic= new pago_cuenta_cobrar_logic($this->connexion);
					$pagocuentacobrarLogic->deepLoad($pagocuentacobrar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta_cobrar->setcredito_cuenta_cobrars($this->cuenta_cobrarDataAccess->getcredito_cuenta_cobrars($this->connexion,$cuenta_cobrar));

				foreach($cuenta_cobrar->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
					$creditocuentacobrarLogic= new credito_cuenta_cobrar_logic($this->connexion);
					$creditocuentacobrarLogic->deepLoad($creditocuentacobrar,$isDeep,$deepLoadType,$clases);
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
			$cuenta_cobrar->setempresa($this->cuenta_cobrarDataAccess->getempresa($this->connexion,$cuenta_cobrar));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_cobrar->setsucursal($this->cuenta_cobrarDataAccess->getsucursal($this->connexion,$cuenta_cobrar));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($cuenta_cobrar->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_cobrar->setejercicio($this->cuenta_cobrarDataAccess->getejercicio($this->connexion,$cuenta_cobrar));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($cuenta_cobrar->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_cobrar->setperiodo($this->cuenta_cobrarDataAccess->getperiodo($this->connexion,$cuenta_cobrar));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($cuenta_cobrar->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_cobrar->setusuario($this->cuenta_cobrarDataAccess->getusuario($this->connexion,$cuenta_cobrar));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($cuenta_cobrar->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==factura::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_cobrar->setfactura($this->cuenta_cobrarDataAccess->getfactura($this->connexion,$cuenta_cobrar));
			$facturaLogic= new factura_logic($this->connexion);
			$facturaLogic->deepLoad($cuenta_cobrar->getfactura(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_cobrar->setcliente($this->cuenta_cobrarDataAccess->getcliente($this->connexion,$cuenta_cobrar));
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($cuenta_cobrar->getcliente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_cobrar->settermino_pago_cliente($this->cuenta_cobrarDataAccess->gettermino_pago_cliente($this->connexion,$cuenta_cobrar));
			$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
			$termino_pago_clienteLogic->deepLoad($cuenta_cobrar->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado_cuentas_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_cobrar->setestado_cuentas_cobrar($this->cuenta_cobrarDataAccess->getestado_cuentas_cobrar($this->connexion,$cuenta_cobrar));
			$estado_cuentas_cobrarLogic= new estado_cuentas_cobrar_logic($this->connexion);
			$estado_cuentas_cobrarLogic->deepLoad($cuenta_cobrar->getestado_cuentas_cobrar(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_cobrar::$class);
			$cuenta_cobrar->setdebito_cuenta_cobrars($this->cuenta_cobrarDataAccess->getdebito_cuenta_cobrars($this->connexion,$cuenta_cobrar));

			foreach($cuenta_cobrar->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
				$debitocuentacobrarLogic= new debito_cuenta_cobrar_logic($this->connexion);
				$debitocuentacobrarLogic->deepLoad($debitocuentacobrar,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_cobrar::$class);
			$cuenta_cobrar->setpago_cuenta_cobrars($this->cuenta_cobrarDataAccess->getpago_cuenta_cobrars($this->connexion,$cuenta_cobrar));

			foreach($cuenta_cobrar->getpago_cuenta_cobrars() as $pagocuentacobrar) {
				$pagocuentacobrarLogic= new pago_cuenta_cobrar_logic($this->connexion);
				$pagocuentacobrarLogic->deepLoad($pagocuentacobrar,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_cobrar::$class);
			$cuenta_cobrar->setcredito_cuenta_cobrars($this->cuenta_cobrarDataAccess->getcredito_cuenta_cobrars($this->connexion,$cuenta_cobrar));

			foreach($cuenta_cobrar->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
				$creditocuentacobrarLogic= new credito_cuenta_cobrar_logic($this->connexion);
				$creditocuentacobrarLogic->deepLoad($creditocuentacobrar,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(cuenta_cobrar $cuenta_cobrar,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			cuenta_cobrar_logic_add::updatecuenta_cobrarToSave($this->cuenta_cobrar);			
			
			if(!$paraDeleteCascade) {				
				cuenta_cobrar_data::save($cuenta_cobrar, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($cuenta_cobrar->getempresa(),$this->connexion);
		sucursal_data::save($cuenta_cobrar->getsucursal(),$this->connexion);
		ejercicio_data::save($cuenta_cobrar->getejercicio(),$this->connexion);
		periodo_data::save($cuenta_cobrar->getperiodo(),$this->connexion);
		usuario_data::save($cuenta_cobrar->getusuario(),$this->connexion);
		factura_data::save($cuenta_cobrar->getfactura(),$this->connexion);
		cliente_data::save($cuenta_cobrar->getcliente(),$this->connexion);
		termino_pago_cliente_data::save($cuenta_cobrar->gettermino_pago_cliente(),$this->connexion);
		estado_cuentas_cobrar_data::save($cuenta_cobrar->getestado_cuentas_cobrar(),$this->connexion);

		foreach($cuenta_cobrar->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
			$debitocuentacobrar->setid_cuenta_cobrar($cuenta_cobrar->getId());
			debito_cuenta_cobrar_data::save($debitocuentacobrar,$this->connexion);
		}


		foreach($cuenta_cobrar->getpago_cuenta_cobrars() as $pagocuentacobrar) {
			$pagocuentacobrar->setid_cuenta_cobrar($cuenta_cobrar->getId());
			pago_cuenta_cobrar_data::save($pagocuentacobrar,$this->connexion);
		}


		foreach($cuenta_cobrar->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
			$creditocuentacobrar->setid_cuenta_cobrar($cuenta_cobrar->getId());
			credito_cuenta_cobrar_data::save($creditocuentacobrar,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cuenta_cobrar->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($cuenta_cobrar->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($cuenta_cobrar->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($cuenta_cobrar->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($cuenta_cobrar->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==factura::$class.'') {
				factura_data::save($cuenta_cobrar->getfactura(),$this->connexion);
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($cuenta_cobrar->getcliente(),$this->connexion);
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				termino_pago_cliente_data::save($cuenta_cobrar->gettermino_pago_cliente(),$this->connexion);
				continue;
			}

			if($clas->clas==estado_cuentas_cobrar::$class.'') {
				estado_cuentas_cobrar_data::save($cuenta_cobrar->getestado_cuentas_cobrar(),$this->connexion);
				continue;
			}


			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta_cobrar->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
					$debitocuentacobrar->setid_cuenta_cobrar($cuenta_cobrar->getId());
					debito_cuenta_cobrar_data::save($debitocuentacobrar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta_cobrar->getpago_cuenta_cobrars() as $pagocuentacobrar) {
					$pagocuentacobrar->setid_cuenta_cobrar($cuenta_cobrar->getId());
					pago_cuenta_cobrar_data::save($pagocuentacobrar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta_cobrar->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
					$creditocuentacobrar->setid_cuenta_cobrar($cuenta_cobrar->getId());
					credito_cuenta_cobrar_data::save($creditocuentacobrar,$this->connexion);
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
			empresa_data::save($cuenta_cobrar->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($cuenta_cobrar->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($cuenta_cobrar->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($cuenta_cobrar->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($cuenta_cobrar->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==factura::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			factura_data::save($cuenta_cobrar->getfactura(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($cuenta_cobrar->getcliente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_cliente_data::save($cuenta_cobrar->gettermino_pago_cliente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado_cuentas_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_cuentas_cobrar_data::save($cuenta_cobrar->getestado_cuentas_cobrar(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_cobrar::$class);

			foreach($cuenta_cobrar->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
				$debitocuentacobrar->setid_cuenta_cobrar($cuenta_cobrar->getId());
				debito_cuenta_cobrar_data::save($debitocuentacobrar,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_cobrar::$class);

			foreach($cuenta_cobrar->getpago_cuenta_cobrars() as $pagocuentacobrar) {
				$pagocuentacobrar->setid_cuenta_cobrar($cuenta_cobrar->getId());
				pago_cuenta_cobrar_data::save($pagocuentacobrar,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_cobrar::$class);

			foreach($cuenta_cobrar->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
				$creditocuentacobrar->setid_cuenta_cobrar($cuenta_cobrar->getId());
				credito_cuenta_cobrar_data::save($creditocuentacobrar,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($cuenta_cobrar->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($cuenta_cobrar->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($cuenta_cobrar->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($cuenta_cobrar->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($cuenta_cobrar->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($cuenta_cobrar->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($cuenta_cobrar->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($cuenta_cobrar->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($cuenta_cobrar->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		factura_data::save($cuenta_cobrar->getfactura(),$this->connexion);
		$facturaLogic= new factura_logic($this->connexion);
		$facturaLogic->deepSave($cuenta_cobrar->getfactura(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cliente_data::save($cuenta_cobrar->getcliente(),$this->connexion);
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepSave($cuenta_cobrar->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		termino_pago_cliente_data::save($cuenta_cobrar->gettermino_pago_cliente(),$this->connexion);
		$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
		$termino_pago_clienteLogic->deepSave($cuenta_cobrar->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		estado_cuentas_cobrar_data::save($cuenta_cobrar->getestado_cuentas_cobrar(),$this->connexion);
		$estado_cuentas_cobrarLogic= new estado_cuentas_cobrar_logic($this->connexion);
		$estado_cuentas_cobrarLogic->deepSave($cuenta_cobrar->getestado_cuentas_cobrar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($cuenta_cobrar->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
			$debitocuentacobrarLogic= new debito_cuenta_cobrar_logic($this->connexion);
			$debitocuentacobrar->setid_cuenta_cobrar($cuenta_cobrar->getId());
			debito_cuenta_cobrar_data::save($debitocuentacobrar,$this->connexion);
			$debitocuentacobrarLogic->deepSave($debitocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta_cobrar->getpago_cuenta_cobrars() as $pagocuentacobrar) {
			$pagocuentacobrarLogic= new pago_cuenta_cobrar_logic($this->connexion);
			$pagocuentacobrar->setid_cuenta_cobrar($cuenta_cobrar->getId());
			pago_cuenta_cobrar_data::save($pagocuentacobrar,$this->connexion);
			$pagocuentacobrarLogic->deepSave($pagocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta_cobrar->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
			$creditocuentacobrarLogic= new credito_cuenta_cobrar_logic($this->connexion);
			$creditocuentacobrar->setid_cuenta_cobrar($cuenta_cobrar->getId());
			credito_cuenta_cobrar_data::save($creditocuentacobrar,$this->connexion);
			$creditocuentacobrarLogic->deepSave($creditocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cuenta_cobrar->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($cuenta_cobrar->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($cuenta_cobrar->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($cuenta_cobrar->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($cuenta_cobrar->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($cuenta_cobrar->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($cuenta_cobrar->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($cuenta_cobrar->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($cuenta_cobrar->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==factura::$class.'') {
				factura_data::save($cuenta_cobrar->getfactura(),$this->connexion);
				$facturaLogic= new factura_logic($this->connexion);
				$facturaLogic->deepSave($cuenta_cobrar->getfactura(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($cuenta_cobrar->getcliente(),$this->connexion);
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepSave($cuenta_cobrar->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				termino_pago_cliente_data::save($cuenta_cobrar->gettermino_pago_cliente(),$this->connexion);
				$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
				$termino_pago_clienteLogic->deepSave($cuenta_cobrar->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==estado_cuentas_cobrar::$class.'') {
				estado_cuentas_cobrar_data::save($cuenta_cobrar->getestado_cuentas_cobrar(),$this->connexion);
				$estado_cuentas_cobrarLogic= new estado_cuentas_cobrar_logic($this->connexion);
				$estado_cuentas_cobrarLogic->deepSave($cuenta_cobrar->getestado_cuentas_cobrar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta_cobrar->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
					$debitocuentacobrarLogic= new debito_cuenta_cobrar_logic($this->connexion);
					$debitocuentacobrar->setid_cuenta_cobrar($cuenta_cobrar->getId());
					debito_cuenta_cobrar_data::save($debitocuentacobrar,$this->connexion);
					$debitocuentacobrarLogic->deepSave($debitocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta_cobrar->getpago_cuenta_cobrars() as $pagocuentacobrar) {
					$pagocuentacobrarLogic= new pago_cuenta_cobrar_logic($this->connexion);
					$pagocuentacobrar->setid_cuenta_cobrar($cuenta_cobrar->getId());
					pago_cuenta_cobrar_data::save($pagocuentacobrar,$this->connexion);
					$pagocuentacobrarLogic->deepSave($pagocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta_cobrar->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
					$creditocuentacobrarLogic= new credito_cuenta_cobrar_logic($this->connexion);
					$creditocuentacobrar->setid_cuenta_cobrar($cuenta_cobrar->getId());
					credito_cuenta_cobrar_data::save($creditocuentacobrar,$this->connexion);
					$creditocuentacobrarLogic->deepSave($creditocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($cuenta_cobrar->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($cuenta_cobrar->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($cuenta_cobrar->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($cuenta_cobrar->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($cuenta_cobrar->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($cuenta_cobrar->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($cuenta_cobrar->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($cuenta_cobrar->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($cuenta_cobrar->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==factura::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			factura_data::save($cuenta_cobrar->getfactura(),$this->connexion);
			$facturaLogic= new factura_logic($this->connexion);
			$facturaLogic->deepSave($cuenta_cobrar->getfactura(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($cuenta_cobrar->getcliente(),$this->connexion);
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepSave($cuenta_cobrar->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_cliente_data::save($cuenta_cobrar->gettermino_pago_cliente(),$this->connexion);
			$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
			$termino_pago_clienteLogic->deepSave($cuenta_cobrar->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado_cuentas_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_cuentas_cobrar_data::save($cuenta_cobrar->getestado_cuentas_cobrar(),$this->connexion);
			$estado_cuentas_cobrarLogic= new estado_cuentas_cobrar_logic($this->connexion);
			$estado_cuentas_cobrarLogic->deepSave($cuenta_cobrar->getestado_cuentas_cobrar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_cobrar::$class);

			foreach($cuenta_cobrar->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
				$debitocuentacobrarLogic= new debito_cuenta_cobrar_logic($this->connexion);
				$debitocuentacobrar->setid_cuenta_cobrar($cuenta_cobrar->getId());
				debito_cuenta_cobrar_data::save($debitocuentacobrar,$this->connexion);
				$debitocuentacobrarLogic->deepSave($debitocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_cobrar::$class);

			foreach($cuenta_cobrar->getpago_cuenta_cobrars() as $pagocuentacobrar) {
				$pagocuentacobrarLogic= new pago_cuenta_cobrar_logic($this->connexion);
				$pagocuentacobrar->setid_cuenta_cobrar($cuenta_cobrar->getId());
				pago_cuenta_cobrar_data::save($pagocuentacobrar,$this->connexion);
				$pagocuentacobrarLogic->deepSave($pagocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_cobrar::$class);

			foreach($cuenta_cobrar->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
				$creditocuentacobrarLogic= new credito_cuenta_cobrar_logic($this->connexion);
				$creditocuentacobrar->setid_cuenta_cobrar($cuenta_cobrar->getId());
				credito_cuenta_cobrar_data::save($creditocuentacobrar,$this->connexion);
				$creditocuentacobrarLogic->deepSave($creditocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				cuenta_cobrar_data::save($cuenta_cobrar, $this->connexion);
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
			
			$this->deepLoad($this->cuenta_cobrar,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->cuenta_cobrars as $cuenta_cobrar) {
				$this->deepLoad($cuenta_cobrar,$isDeep,$deepLoadType,$clases);
								
				cuenta_cobrar_util::refrescarFKDescripciones($this->cuenta_cobrars);
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
			
			foreach($this->cuenta_cobrars as $cuenta_cobrar) {
				$this->deepLoad($cuenta_cobrar,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->cuenta_cobrar,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->cuenta_cobrars as $cuenta_cobrar) {
				$this->deepSave($cuenta_cobrar,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->cuenta_cobrars as $cuenta_cobrar) {
				$this->deepSave($cuenta_cobrar,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(factura::$class);
				$classes[]=new Classe(cliente::$class);
				$classes[]=new Classe(termino_pago_cliente::$class);
				$classes[]=new Classe(estado_cuentas_cobrar::$class);
				
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
					if($clas->clas==factura::$class) {
						$classes[]=new Classe(factura::$class);
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
					if($clas->clas==termino_pago_cliente::$class) {
						$classes[]=new Classe(termino_pago_cliente::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==estado_cuentas_cobrar::$class) {
						$classes[]=new Classe(estado_cuentas_cobrar::$class);
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
					if($clas->clas==factura::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(factura::$class);
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
					if($clas->clas==termino_pago_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(termino_pago_cliente::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==estado_cuentas_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(estado_cuentas_cobrar::$class);
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
				
				$classes[]=new Classe(debito_cuenta_cobrar::$class);
				$classes[]=new Classe(pago_cuenta_cobrar::$class);
				$classes[]=new Classe(credito_cuenta_cobrar::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==debito_cuenta_cobrar::$class) {
						$classes[]=new Classe(debito_cuenta_cobrar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==pago_cuenta_cobrar::$class) {
						$classes[]=new Classe(pago_cuenta_cobrar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==credito_cuenta_cobrar::$class) {
						$classes[]=new Classe(credito_cuenta_cobrar::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==debito_cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(debito_cuenta_cobrar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==pago_cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(pago_cuenta_cobrar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==credito_cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(credito_cuenta_cobrar::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getcuenta_cobrar() : ?cuenta_cobrar {	
		/*
		cuenta_cobrar_logic_add::checkcuenta_cobrarToGet($this->cuenta_cobrar,$this->datosCliente);
		cuenta_cobrar_logic_add::updatecuenta_cobrarToGet($this->cuenta_cobrar);
		*/
			
		return $this->cuenta_cobrar;
	}
		
	public function setcuenta_cobrar(cuenta_cobrar $newcuenta_cobrar) {
		$this->cuenta_cobrar = $newcuenta_cobrar;
	}
	
	public function getcuenta_cobrars() : array {		
		/*
		cuenta_cobrar_logic_add::checkcuenta_cobrarToGets($this->cuenta_cobrars,$this->datosCliente);
		
		foreach ($this->cuenta_cobrars as $cuenta_cobrarLocal ) {
			cuenta_cobrar_logic_add::updatecuenta_cobrarToGet($cuenta_cobrarLocal);
		}
		*/
		
		return $this->cuenta_cobrars;
	}
	
	public function setcuenta_cobrars(array $newcuenta_cobrars) {
		$this->cuenta_cobrars = $newcuenta_cobrars;
	}
	
	public function getcuenta_cobrarDataAccess() : cuenta_cobrar_data {
		return $this->cuenta_cobrarDataAccess;
	}
	
	public function setcuenta_cobrarDataAccess(cuenta_cobrar_data $newcuenta_cobrarDataAccess) {
		$this->cuenta_cobrarDataAccess = $newcuenta_cobrarDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        cuenta_cobrar_carga::$CONTROLLER;;        
		
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
