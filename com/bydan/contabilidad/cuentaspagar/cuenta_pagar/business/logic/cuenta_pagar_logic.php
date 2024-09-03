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

namespace com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_param_return;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\presentation\session\cuenta_pagar_session;

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

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\data\cuenta_pagar_data;

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

use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;
use com\bydan\contabilidad\inventario\orden_compra\business\data\orden_compra_data;
use com\bydan\contabilidad\inventario\orden_compra\business\logic\orden_compra_logic;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\data\termino_pago_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;

use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\business\entity\estado_cuentas_pagar;
use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\business\data\estado_cuentas_pagar_data;
use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\business\logic\estado_cuentas_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\util\estado_cuentas_pagar_util;

//REL


use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\business\entity\debito_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\business\data\debito_cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\business\logic\debito_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_util;

use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\business\entity\credito_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\business\data\credito_cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\business\logic\credito_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_util;

use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\entity\pago_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\data\pago_cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\logic\pago_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_util;

//REL DETALLES




class cuenta_pagar_logic  extends GeneralEntityLogic implements cuenta_pagar_logicI {	
	/*GENERAL*/
	public cuenta_pagar_data $cuenta_pagarDataAccess;
	public ?cuenta_pagar_logic_add $cuenta_pagarLogicAdditional=null;
	public ?cuenta_pagar $cuenta_pagar;
	public array $cuenta_pagars;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->cuenta_pagarDataAccess = new cuenta_pagar_data();			
			$this->cuenta_pagars = array();
			$this->cuenta_pagar = new cuenta_pagar();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->cuenta_pagarLogicAdditional = new cuenta_pagar_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->cuenta_pagarLogicAdditional==null) {
			$this->cuenta_pagarLogicAdditional=new cuenta_pagar_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->cuenta_pagarDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->cuenta_pagarDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->cuenta_pagarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->cuenta_pagarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->cuenta_pagars = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagars);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->cuenta_pagars = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagars);
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
		$this->cuenta_pagar = new cuenta_pagar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->cuenta_pagar=$this->cuenta_pagarDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_pagar_util::refrescarFKDescripcion($this->cuenta_pagar);
			}
						
			cuenta_pagar_logic_add::checkcuenta_pagarToGet($this->cuenta_pagar,$this->datosCliente);
			cuenta_pagar_logic_add::updatecuenta_pagarToGet($this->cuenta_pagar);
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
		$this->cuenta_pagar = new  cuenta_pagar();
		  		  
        try {		
			$this->cuenta_pagar=$this->cuenta_pagarDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_pagar_util::refrescarFKDescripcion($this->cuenta_pagar);
			}
			
			cuenta_pagar_logic_add::checkcuenta_pagarToGet($this->cuenta_pagar,$this->datosCliente);
			cuenta_pagar_logic_add::updatecuenta_pagarToGet($this->cuenta_pagar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?cuenta_pagar {
		$cuenta_pagarLogic = new  cuenta_pagar_logic();
		  		  
        try {		
			$cuenta_pagarLogic->setConnexion($connexion);			
			$cuenta_pagarLogic->getEntity($id);			
			return $cuenta_pagarLogic->getcuenta_pagar();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->cuenta_pagar = new  cuenta_pagar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->cuenta_pagar=$this->cuenta_pagarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_pagar_util::refrescarFKDescripcion($this->cuenta_pagar);
			}
			
			cuenta_pagar_logic_add::checkcuenta_pagarToGet($this->cuenta_pagar,$this->datosCliente);
			cuenta_pagar_logic_add::updatecuenta_pagarToGet($this->cuenta_pagar);
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
		$this->cuenta_pagar = new  cuenta_pagar();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_pagar=$this->cuenta_pagarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_pagar_util::refrescarFKDescripcion($this->cuenta_pagar);
			}
			
			cuenta_pagar_logic_add::checkcuenta_pagarToGet($this->cuenta_pagar,$this->datosCliente);
			cuenta_pagar_logic_add::updatecuenta_pagarToGet($this->cuenta_pagar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?cuenta_pagar {
		$cuenta_pagarLogic = new  cuenta_pagar_logic();
		  		  
        try {		
			$cuenta_pagarLogic->setConnexion($connexion);			
			$cuenta_pagarLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $cuenta_pagarLogic->getcuenta_pagar();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cuenta_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagars);			
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
		$this->cuenta_pagars = array();
		  		  
        try {			
			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->cuenta_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagars);
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
		$this->cuenta_pagars = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$cuenta_pagarLogic = new  cuenta_pagar_logic();
		  		  
        try {		
			$cuenta_pagarLogic->setConnexion($connexion);			
			$cuenta_pagarLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $cuenta_pagarLogic->getcuenta_pagars();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->cuenta_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagars);
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
		$this->cuenta_pagars = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagars);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->cuenta_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagars);
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
		$this->cuenta_pagars = array();
		  		  
        try {			
			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}	
			
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cuenta_pagars = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagars);
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
		$this->cuenta_pagars = array();
		  		  
        try {		
			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_pagars);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,cuenta_pagar_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagars);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,cuenta_pagar_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagars);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cuenta_pagar_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagars);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cuenta_pagar_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagars);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idestado_cuentas_pagarWithConnection(string $strFinalQuery,Pagination $pagination,int $id_estado_cuentas_pagar) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estado_cuentas_pagar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estado_cuentas_pagar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado_cuentas_pagar,cuenta_pagar_util::$ID_ESTADO_CUENTAS_PAGAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado_cuentas_pagar);

			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idestado_cuentas_pagar(string $strFinalQuery,Pagination $pagination,int $id_estado_cuentas_pagar) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estado_cuentas_pagar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estado_cuentas_pagar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado_cuentas_pagar,cuenta_pagar_util::$ID_ESTADO_CUENTAS_PAGAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado_cuentas_pagar);

			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagars);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idorden_compraWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_orden_compra) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_orden_compra= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_orden_compra->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_orden_compra,cuenta_pagar_util::$ID_ORDEN_COMPRA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_orden_compra);

			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idorden_compra(string $strFinalQuery,Pagination $pagination,?int $id_orden_compra) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_orden_compra= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_orden_compra->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_orden_compra,cuenta_pagar_util::$ID_ORDEN_COMPRA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_orden_compra);

			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagars);
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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,cuenta_pagar_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagars);

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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,cuenta_pagar_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagars);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdproveedorWithConnection(string $strFinalQuery,Pagination $pagination,int $id_proveedor) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,cuenta_pagar_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idproveedor(string $strFinalQuery,Pagination $pagination,int $id_proveedor) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,cuenta_pagar_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagars);
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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,cuenta_pagar_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagars);

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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,cuenta_pagar_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagars);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtermino_pago_proveedorWithConnection(string $strFinalQuery,Pagination $pagination,int $id_termino_pago_proveedor) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_termino_pago_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_termino_pago_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_proveedor,cuenta_pagar_util::$ID_TERMINO_PAGO_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_proveedor);

			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtermino_pago_proveedor(string $strFinalQuery,Pagination $pagination,int $id_termino_pago_proveedor) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_termino_pago_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_termino_pago_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_proveedor,cuenta_pagar_util::$ID_TERMINO_PAGO_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_proveedor);

			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagars);
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,cuenta_pagar_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagars);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,cuenta_pagar_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->cuenta_pagars=$this->cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_pagars);
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
						
			//cuenta_pagar_logic_add::checkcuenta_pagarToSave($this->cuenta_pagar,$this->datosCliente,$this->connexion);	       
			cuenta_pagar_logic_add::updatecuenta_pagarToSave($this->cuenta_pagar);			
			cuenta_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cuenta_pagar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->cuenta_pagarLogicAdditional->checkGeneralEntityToSave($this,$this->cuenta_pagar,$this->datosCliente,$this->connexion);
			
			
			cuenta_pagar_data::save($this->cuenta_pagar, $this->connexion);	    	       	 				
			//cuenta_pagar_logic_add::checkcuenta_pagarToSaveAfter($this->cuenta_pagar,$this->datosCliente,$this->connexion);			
			$this->cuenta_pagarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cuenta_pagar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cuenta_pagar_util::refrescarFKDescripcion($this->cuenta_pagar);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->cuenta_pagar->getIsDeleted()) {
				$this->cuenta_pagar=null;
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
						
			/*cuenta_pagar_logic_add::checkcuenta_pagarToSave($this->cuenta_pagar,$this->datosCliente,$this->connexion);*/	        
			cuenta_pagar_logic_add::updatecuenta_pagarToSave($this->cuenta_pagar);			
			$this->cuenta_pagarLogicAdditional->checkGeneralEntityToSave($this,$this->cuenta_pagar,$this->datosCliente,$this->connexion);			
			cuenta_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cuenta_pagar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			cuenta_pagar_data::save($this->cuenta_pagar, $this->connexion);	    	       	 						
			/*cuenta_pagar_logic_add::checkcuenta_pagarToSaveAfter($this->cuenta_pagar,$this->datosCliente,$this->connexion);*/			
			$this->cuenta_pagarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cuenta_pagar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cuenta_pagar_util::refrescarFKDescripcion($this->cuenta_pagar);				
			}
			
			if($this->cuenta_pagar->getIsDeleted()) {
				$this->cuenta_pagar=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(cuenta_pagar $cuenta_pagar,Connexion $connexion)  {
		$cuenta_pagarLogic = new  cuenta_pagar_logic();		  		  
        try {		
			$cuenta_pagarLogic->setConnexion($connexion);			
			$cuenta_pagarLogic->setcuenta_pagar($cuenta_pagar);			
			$cuenta_pagarLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*cuenta_pagar_logic_add::checkcuenta_pagarToSaves($this->cuenta_pagars,$this->datosCliente,$this->connexion);*/	        	
			$this->cuenta_pagarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cuenta_pagars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cuenta_pagars as $cuenta_pagarLocal) {				
								
				cuenta_pagar_logic_add::updatecuenta_pagarToSave($cuenta_pagarLocal);	        	
				cuenta_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cuenta_pagarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				cuenta_pagar_data::save($cuenta_pagarLocal, $this->connexion);				
			}
			
			/*cuenta_pagar_logic_add::checkcuenta_pagarToSavesAfter($this->cuenta_pagars,$this->datosCliente,$this->connexion);*/			
			$this->cuenta_pagarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cuenta_pagars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
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
			/*cuenta_pagar_logic_add::checkcuenta_pagarToSaves($this->cuenta_pagars,$this->datosCliente,$this->connexion);*/			
			$this->cuenta_pagarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cuenta_pagars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cuenta_pagars as $cuenta_pagarLocal) {				
								
				cuenta_pagar_logic_add::updatecuenta_pagarToSave($cuenta_pagarLocal);	        	
				cuenta_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cuenta_pagarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				cuenta_pagar_data::save($cuenta_pagarLocal, $this->connexion);				
			}			
			
			/*cuenta_pagar_logic_add::checkcuenta_pagarToSavesAfter($this->cuenta_pagars,$this->datosCliente,$this->connexion);*/			
			$this->cuenta_pagarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cuenta_pagars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $cuenta_pagars,Connexion $connexion)  {
		$cuenta_pagarLogic = new  cuenta_pagar_logic();
		  		  
        try {		
			$cuenta_pagarLogic->setConnexion($connexion);			
			$cuenta_pagarLogic->setcuenta_pagars($cuenta_pagars);			
			$cuenta_pagarLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$cuenta_pagarsAux=array();
		
		foreach($this->cuenta_pagars as $cuenta_pagar) {
			if($cuenta_pagar->getIsDeleted()==false) {
				$cuenta_pagarsAux[]=$cuenta_pagar;
			}
		}
		
		$this->cuenta_pagars=$cuenta_pagarsAux;
	}
	
	public function updateToGetsAuxiliar(array &$cuenta_pagars) {
		if($this->cuenta_pagarLogicAdditional==null) {
			$this->cuenta_pagarLogicAdditional=new cuenta_pagar_logic_add();
		}
		
		
		$this->cuenta_pagarLogicAdditional->updateToGets($cuenta_pagars,$this);					
		$this->cuenta_pagarLogicAdditional->updateToGetsReferencia($cuenta_pagars,$this);			
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->cuenta_pagars as $cuenta_pagar) {
				
				$cuenta_pagar->setid_empresa_Descripcion(cuenta_pagar_util::getempresaDescripcion($cuenta_pagar->getempresa()));
				$cuenta_pagar->setid_sucursal_Descripcion(cuenta_pagar_util::getsucursalDescripcion($cuenta_pagar->getsucursal()));
				$cuenta_pagar->setid_ejercicio_Descripcion(cuenta_pagar_util::getejercicioDescripcion($cuenta_pagar->getejercicio()));
				$cuenta_pagar->setid_periodo_Descripcion(cuenta_pagar_util::getperiodoDescripcion($cuenta_pagar->getperiodo()));
				$cuenta_pagar->setid_usuario_Descripcion(cuenta_pagar_util::getusuarioDescripcion($cuenta_pagar->getusuario()));
				$cuenta_pagar->setid_orden_compra_Descripcion(cuenta_pagar_util::getorden_compraDescripcion($cuenta_pagar->getorden_compra()));
				$cuenta_pagar->setid_proveedor_Descripcion(cuenta_pagar_util::getproveedorDescripcion($cuenta_pagar->getproveedor()));
				$cuenta_pagar->setid_termino_pago_proveedor_Descripcion(cuenta_pagar_util::gettermino_pago_proveedorDescripcion($cuenta_pagar->gettermino_pago_proveedor()));
				$cuenta_pagar->setid_estado_cuentas_pagar_Descripcion(cuenta_pagar_util::getestado_cuentas_pagarDescripcion($cuenta_pagar->getestado_cuentas_pagar()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cuenta_pagar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cuenta_pagar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cuenta_pagar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$cuenta_pagarForeignKey=new cuenta_pagar_param_return();//cuenta_pagarForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_orden_compra',$strRecargarFkTipos,',')) {
				$this->cargarCombosorden_comprasFK($this->connexion,$strRecargarFkQuery,$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosproveedorsFK($this->connexion,$strRecargarFkQuery,$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_termino_pago_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombostermino_pago_proveedorsFK($this->connexion,$strRecargarFkQuery,$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado_cuentas_pagar',$strRecargarFkTipos,',')) {
				$this->cargarCombosestado_cuentas_pagarsFK($this->connexion,$strRecargarFkQuery,$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_orden_compra',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosorden_comprasFK($this->connexion,' where id=-1 ',$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproveedorsFK($this->connexion,' where id=-1 ',$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_termino_pago_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostermino_pago_proveedorsFK($this->connexion,' where id=-1 ',$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_estado_cuentas_pagar',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosestado_cuentas_pagarsFK($this->connexion,' where id=-1 ',$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $cuenta_pagarForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$cuenta_pagarForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		if($cuenta_pagar_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($cuenta_pagarForeignKey->idempresaDefaultFK==0) {
					$cuenta_pagarForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$cuenta_pagarForeignKey->empresasFK[$empresaLocal->getId()]=cuenta_pagar_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($cuenta_pagar_session->bigidempresaActual!=null && $cuenta_pagar_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cuenta_pagar_session->bigidempresaActual);//WithConnection

				$cuenta_pagarForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=cuenta_pagar_util::getempresaDescripcion($empresaLogic->getempresa());
				$cuenta_pagarForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$cuenta_pagarForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		if($cuenta_pagar_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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
				if($cuenta_pagarForeignKey->idsucursalDefaultFK==0) {
					$cuenta_pagarForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$cuenta_pagarForeignKey->sucursalsFK[$sucursalLocal->getId()]=cuenta_pagar_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($cuenta_pagar_session->bigidsucursalActual!=null && $cuenta_pagar_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($cuenta_pagar_session->bigidsucursalActual);//WithConnection

				$cuenta_pagarForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=cuenta_pagar_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$cuenta_pagarForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$cuenta_pagarForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		if($cuenta_pagar_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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
				if($cuenta_pagarForeignKey->idejercicioDefaultFK==0) {
					$cuenta_pagarForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$cuenta_pagarForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=cuenta_pagar_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($cuenta_pagar_session->bigidejercicioActual!=null && $cuenta_pagar_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($cuenta_pagar_session->bigidejercicioActual);//WithConnection

				$cuenta_pagarForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=cuenta_pagar_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$cuenta_pagarForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$cuenta_pagarForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		if($cuenta_pagar_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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
				if($cuenta_pagarForeignKey->idperiodoDefaultFK==0) {
					$cuenta_pagarForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$cuenta_pagarForeignKey->periodosFK[$periodoLocal->getId()]=cuenta_pagar_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($cuenta_pagar_session->bigidperiodoActual!=null && $cuenta_pagar_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($cuenta_pagar_session->bigidperiodoActual);//WithConnection

				$cuenta_pagarForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=cuenta_pagar_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$cuenta_pagarForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$cuenta_pagarForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		if($cuenta_pagar_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($cuenta_pagarForeignKey->idusuarioDefaultFK==0) {
					$cuenta_pagarForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$cuenta_pagarForeignKey->usuariosFK[$usuarioLocal->getId()]=cuenta_pagar_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($cuenta_pagar_session->bigidusuarioActual!=null && $cuenta_pagar_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($cuenta_pagar_session->bigidusuarioActual);//WithConnection

				$cuenta_pagarForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=cuenta_pagar_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$cuenta_pagarForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosorden_comprasFK($connexion=null,$strRecargarFkQuery='',$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$orden_compraLogic= new orden_compra_logic();
		$pagination= new Pagination();
		$cuenta_pagarForeignKey->orden_comprasFK=array();

		$orden_compraLogic->setConnexion($connexion);
		$orden_compraLogic->getorden_compraDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		if($cuenta_pagar_session->bitBusquedaDesdeFKSesionorden_compra!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=orden_compra_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalorden_compra=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalorden_compra=Funciones::GetFinalQueryAppend($finalQueryGlobalorden_compra, '');
				$finalQueryGlobalorden_compra.=orden_compra_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalorden_compra.$strRecargarFkQuery;		

				$orden_compraLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($orden_compraLogic->getorden_compras() as $orden_compraLocal ) {
				if($cuenta_pagarForeignKey->idorden_compraDefaultFK==0) {
					$cuenta_pagarForeignKey->idorden_compraDefaultFK=$orden_compraLocal->getId();
				}

				$cuenta_pagarForeignKey->orden_comprasFK[$orden_compraLocal->getId()]=cuenta_pagar_util::getorden_compraDescripcion($orden_compraLocal);
			}

		} else {

			if($cuenta_pagar_session->bigidorden_compraActual!=null && $cuenta_pagar_session->bigidorden_compraActual > 0) {
				$orden_compraLogic->getEntity($cuenta_pagar_session->bigidorden_compraActual);//WithConnection

				$cuenta_pagarForeignKey->orden_comprasFK[$orden_compraLogic->getorden_compra()->getId()]=cuenta_pagar_util::getorden_compraDescripcion($orden_compraLogic->getorden_compra());
				$cuenta_pagarForeignKey->idorden_compraDefaultFK=$orden_compraLogic->getorden_compra()->getId();
			}
		}
	}

	public function cargarCombosproveedorsFK($connexion=null,$strRecargarFkQuery='',$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$proveedorLogic= new proveedor_logic();
		$pagination= new Pagination();
		$cuenta_pagarForeignKey->proveedorsFK=array();

		$proveedorLogic->setConnexion($connexion);
		$proveedorLogic->getproveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		if($cuenta_pagar_session->bitBusquedaDesdeFKSesionproveedor!=true) {
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
				if($cuenta_pagarForeignKey->idproveedorDefaultFK==0) {
					$cuenta_pagarForeignKey->idproveedorDefaultFK=$proveedorLocal->getId();
				}

				$cuenta_pagarForeignKey->proveedorsFK[$proveedorLocal->getId()]=cuenta_pagar_util::getproveedorDescripcion($proveedorLocal);
			}

		} else {

			if($cuenta_pagar_session->bigidproveedorActual!=null && $cuenta_pagar_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($cuenta_pagar_session->bigidproveedorActual);//WithConnection

				$cuenta_pagarForeignKey->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=cuenta_pagar_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$cuenta_pagarForeignKey->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	public function cargarCombostermino_pago_proveedorsFK($connexion=null,$strRecargarFkQuery='',$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic();
		$pagination= new Pagination();
		$cuenta_pagarForeignKey->termino_pago_proveedorsFK=array();

		$termino_pago_proveedorLogic->setConnexion($connexion);
		$termino_pago_proveedorLogic->gettermino_pago_proveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		if($cuenta_pagar_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=termino_pago_proveedor_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltermino_pago_proveedor=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltermino_pago_proveedor=Funciones::GetFinalQueryAppend($finalQueryGlobaltermino_pago_proveedor, '');
				$finalQueryGlobaltermino_pago_proveedor.=termino_pago_proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltermino_pago_proveedor.$strRecargarFkQuery;		

				$termino_pago_proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($termino_pago_proveedorLogic->gettermino_pago_proveedors() as $termino_pago_proveedorLocal ) {
				if($cuenta_pagarForeignKey->idtermino_pago_proveedorDefaultFK==0) {
					$cuenta_pagarForeignKey->idtermino_pago_proveedorDefaultFK=$termino_pago_proveedorLocal->getId();
				}

				$cuenta_pagarForeignKey->termino_pago_proveedorsFK[$termino_pago_proveedorLocal->getId()]=cuenta_pagar_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLocal);
			}

		} else {

			if($cuenta_pagar_session->bigidtermino_pago_proveedorActual!=null && $cuenta_pagar_session->bigidtermino_pago_proveedorActual > 0) {
				$termino_pago_proveedorLogic->getEntity($cuenta_pagar_session->bigidtermino_pago_proveedorActual);//WithConnection

				$cuenta_pagarForeignKey->termino_pago_proveedorsFK[$termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId()]=cuenta_pagar_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLogic->gettermino_pago_proveedor());
				$cuenta_pagarForeignKey->idtermino_pago_proveedorDefaultFK=$termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId();
			}
		}
	}

	public function cargarCombosestado_cuentas_pagarsFK($connexion=null,$strRecargarFkQuery='',$cuenta_pagarForeignKey,$cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$estado_cuentas_pagarLogic= new estado_cuentas_pagar_logic();
		$pagination= new Pagination();
		$cuenta_pagarForeignKey->estado_cuentas_pagarsFK=array();

		$estado_cuentas_pagarLogic->setConnexion($connexion);
		$estado_cuentas_pagarLogic->getestado_cuentas_pagarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		if($cuenta_pagar_session->bitBusquedaDesdeFKSesionestado_cuentas_pagar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=estado_cuentas_pagar_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalestado_cuentas_pagar=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalestado_cuentas_pagar=Funciones::GetFinalQueryAppend($finalQueryGlobalestado_cuentas_pagar, '');
				$finalQueryGlobalestado_cuentas_pagar.=estado_cuentas_pagar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalestado_cuentas_pagar.$strRecargarFkQuery;		

				$estado_cuentas_pagarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($estado_cuentas_pagarLogic->getestado_cuentas_pagars() as $estado_cuentas_pagarLocal ) {
				if($cuenta_pagarForeignKey->idestado_cuentas_pagarDefaultFK==0) {
					$cuenta_pagarForeignKey->idestado_cuentas_pagarDefaultFK=$estado_cuentas_pagarLocal->getId();
				}

				$cuenta_pagarForeignKey->estado_cuentas_pagarsFK[$estado_cuentas_pagarLocal->getId()]=cuenta_pagar_util::getestado_cuentas_pagarDescripcion($estado_cuentas_pagarLocal);
			}

		} else {

			if($cuenta_pagar_session->bigidestado_cuentas_pagarActual!=null && $cuenta_pagar_session->bigidestado_cuentas_pagarActual > 0) {
				$estado_cuentas_pagarLogic->getEntity($cuenta_pagar_session->bigidestado_cuentas_pagarActual);//WithConnection

				$cuenta_pagarForeignKey->estado_cuentas_pagarsFK[$estado_cuentas_pagarLogic->getestado_cuentas_pagar()->getId()]=cuenta_pagar_util::getestado_cuentas_pagarDescripcion($estado_cuentas_pagarLogic->getestado_cuentas_pagar());
				$cuenta_pagarForeignKey->idestado_cuentas_pagarDefaultFK=$estado_cuentas_pagarLogic->getestado_cuentas_pagar()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($cuenta_pagar,$debitocuentapagars,$creditocuentapagars,$pagocuentapagars) {
		$this->saveRelacionesBase($cuenta_pagar,$debitocuentapagars,$creditocuentapagars,$pagocuentapagars,true);
	}

	public function saveRelaciones($cuenta_pagar,$debitocuentapagars,$creditocuentapagars,$pagocuentapagars) {
		$this->saveRelacionesBase($cuenta_pagar,$debitocuentapagars,$creditocuentapagars,$pagocuentapagars,false);
	}

	public function saveRelacionesBase($cuenta_pagar,$debitocuentapagars=array(),$creditocuentapagars=array(),$pagocuentapagars=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$cuenta_pagar->setdebito_cuenta_pagars($debitocuentapagars);
			$cuenta_pagar->setcredito_cuenta_pagars($creditocuentapagars);
			$cuenta_pagar->setpago_cuenta_pagars($pagocuentapagars);
			$this->setcuenta_pagar($cuenta_pagar);

			if(cuenta_pagar_logic_add::validarSaveRelaciones($cuenta_pagar,$this)) {

				cuenta_pagar_logic_add::updateRelacionesToSave($cuenta_pagar,$this);

				if(($this->cuenta_pagar->getIsNew() || $this->cuenta_pagar->getIsChanged()) && !$this->cuenta_pagar->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($debitocuentapagars,$creditocuentapagars,$pagocuentapagars);

				} else if($this->cuenta_pagar->getIsDeleted()) {
					$this->saveRelacionesDetalles($debitocuentapagars,$creditocuentapagars,$pagocuentapagars);
					$this->save();
				}

				cuenta_pagar_logic_add::updateRelacionesToSaveAfter($cuenta_pagar,$this);

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
	
	
	public function saveRelacionesDetalles($debitocuentapagars=array(),$creditocuentapagars=array(),$pagocuentapagars=array()) {
		try {
	

			$idcuenta_pagarActual=$this->getcuenta_pagar()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/debito_cuenta_pagar_carga.php');
			debito_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$debitocuentapagarLogic_Desde_cuenta_pagar=new debito_cuenta_pagar_logic();
			$debitocuentapagarLogic_Desde_cuenta_pagar->setdebito_cuenta_pagars($debitocuentapagars);

			$debitocuentapagarLogic_Desde_cuenta_pagar->setConnexion($this->getConnexion());
			$debitocuentapagarLogic_Desde_cuenta_pagar->setDatosCliente($this->datosCliente);

			foreach($debitocuentapagarLogic_Desde_cuenta_pagar->getdebito_cuenta_pagars() as $debitocuentapagar_Desde_cuenta_pagar) {
				$debitocuentapagar_Desde_cuenta_pagar->setid_cuenta_pagar($idcuenta_pagarActual);
			}

			$debitocuentapagarLogic_Desde_cuenta_pagar->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/credito_cuenta_pagar_carga.php');
			credito_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$creditocuentapagarLogic_Desde_cuenta_pagar=new credito_cuenta_pagar_logic();
			$creditocuentapagarLogic_Desde_cuenta_pagar->setcredito_cuenta_pagars($creditocuentapagars);

			$creditocuentapagarLogic_Desde_cuenta_pagar->setConnexion($this->getConnexion());
			$creditocuentapagarLogic_Desde_cuenta_pagar->setDatosCliente($this->datosCliente);

			foreach($creditocuentapagarLogic_Desde_cuenta_pagar->getcredito_cuenta_pagars() as $creditocuentapagar_Desde_cuenta_pagar) {
				$creditocuentapagar_Desde_cuenta_pagar->setid_cuenta_pagar($idcuenta_pagarActual);
			}

			$creditocuentapagarLogic_Desde_cuenta_pagar->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/pago_cuenta_pagar_carga.php');
			pago_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$pagocuentapagarLogic_Desde_cuenta_pagar=new pago_cuenta_pagar_logic();
			$pagocuentapagarLogic_Desde_cuenta_pagar->setpago_cuenta_pagars($pagocuentapagars);

			$pagocuentapagarLogic_Desde_cuenta_pagar->setConnexion($this->getConnexion());
			$pagocuentapagarLogic_Desde_cuenta_pagar->setDatosCliente($this->datosCliente);

			foreach($pagocuentapagarLogic_Desde_cuenta_pagar->getpago_cuenta_pagars() as $pagocuentapagar_Desde_cuenta_pagar) {
				$pagocuentapagar_Desde_cuenta_pagar->setid_cuenta_pagar($idcuenta_pagarActual);
			}

			$pagocuentapagarLogic_Desde_cuenta_pagar->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $cuenta_pagars,cuenta_pagar_param_return $cuenta_pagarParameterGeneral) : cuenta_pagar_param_return {
		$cuenta_pagarReturnGeneral=new cuenta_pagar_param_return();
	
		 try {	
			
			if($this->cuenta_pagarLogicAdditional==null) {
				$this->cuenta_pagarLogicAdditional=new cuenta_pagar_logic_add();
			}
			
			$this->cuenta_pagarLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$cuenta_pagars,$cuenta_pagarParameterGeneral,$cuenta_pagarReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $cuenta_pagarReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $cuenta_pagars,cuenta_pagar_param_return $cuenta_pagarParameterGeneral) : cuenta_pagar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cuenta_pagarReturnGeneral=new cuenta_pagar_param_return();
	
			
			if($this->cuenta_pagarLogicAdditional==null) {
				$this->cuenta_pagarLogicAdditional=new cuenta_pagar_logic_add();
			}
			
			$this->cuenta_pagarLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$cuenta_pagars,$cuenta_pagarParameterGeneral,$cuenta_pagarReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_pagars,cuenta_pagar $cuenta_pagar,cuenta_pagar_param_return $cuenta_pagarParameterGeneral,bool $isEsNuevocuenta_pagar,array $clases) : cuenta_pagar_param_return {
		 try {	
			$cuenta_pagarReturnGeneral=new cuenta_pagar_param_return();
	
			$cuenta_pagarReturnGeneral->setcuenta_pagar($cuenta_pagar);
			$cuenta_pagarReturnGeneral->setcuenta_pagars($cuenta_pagars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cuenta_pagarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->cuenta_pagarLogicAdditional==null) {
				$this->cuenta_pagarLogicAdditional=new cuenta_pagar_logic_add();
			}
			
			$cuenta_pagarReturnGeneral=$this->cuenta_pagarLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_pagars,$cuenta_pagar,$cuenta_pagarParameterGeneral,$cuenta_pagarReturnGeneral,$isEsNuevocuenta_pagar,$clases);
			
			/*cuenta_pagarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_pagars,$cuenta_pagar,$cuenta_pagarParameterGeneral,$cuenta_pagarReturnGeneral,$isEsNuevocuenta_pagar,$clases);*/
			
			return $cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_pagars,cuenta_pagar $cuenta_pagar,cuenta_pagar_param_return $cuenta_pagarParameterGeneral,bool $isEsNuevocuenta_pagar,array $clases) : cuenta_pagar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cuenta_pagarReturnGeneral=new cuenta_pagar_param_return();
	
			$cuenta_pagarReturnGeneral->setcuenta_pagar($cuenta_pagar);
			$cuenta_pagarReturnGeneral->setcuenta_pagars($cuenta_pagars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cuenta_pagarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->cuenta_pagarLogicAdditional==null) {
				$this->cuenta_pagarLogicAdditional=new cuenta_pagar_logic_add();
			}
			
			$cuenta_pagarReturnGeneral=$this->cuenta_pagarLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_pagars,$cuenta_pagar,$cuenta_pagarParameterGeneral,$cuenta_pagarReturnGeneral,$isEsNuevocuenta_pagar,$clases);
			
			/*cuenta_pagarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_pagars,$cuenta_pagar,$cuenta_pagarParameterGeneral,$cuenta_pagarReturnGeneral,$isEsNuevocuenta_pagar,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_pagars,cuenta_pagar $cuenta_pagar,cuenta_pagar_param_return $cuenta_pagarParameterGeneral,bool $isEsNuevocuenta_pagar,array $clases) : cuenta_pagar_param_return {
		 try {	
			$cuenta_pagarReturnGeneral=new cuenta_pagar_param_return();
	
			$cuenta_pagarReturnGeneral->setcuenta_pagar($cuenta_pagar);
			$cuenta_pagarReturnGeneral->setcuenta_pagars($cuenta_pagars);
			
			
			
			if($this->cuenta_pagarLogicAdditional==null) {
				$this->cuenta_pagarLogicAdditional=new cuenta_pagar_logic_add();
			}
			
			$cuenta_pagarReturnGeneral=$this->cuenta_pagarLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_pagars,$cuenta_pagar,$cuenta_pagarParameterGeneral,$cuenta_pagarReturnGeneral,$isEsNuevocuenta_pagar,$clases);
			
			/*cuenta_pagarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_pagars,$cuenta_pagar,$cuenta_pagarParameterGeneral,$cuenta_pagarReturnGeneral,$isEsNuevocuenta_pagar,$clases);*/
			
			return $cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_pagars,cuenta_pagar $cuenta_pagar,cuenta_pagar_param_return $cuenta_pagarParameterGeneral,bool $isEsNuevocuenta_pagar,array $clases) : cuenta_pagar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cuenta_pagarReturnGeneral=new cuenta_pagar_param_return();
	
			$cuenta_pagarReturnGeneral->setcuenta_pagar($cuenta_pagar);
			$cuenta_pagarReturnGeneral->setcuenta_pagars($cuenta_pagars);
			
			
			if($this->cuenta_pagarLogicAdditional==null) {
				$this->cuenta_pagarLogicAdditional=new cuenta_pagar_logic_add();
			}
			
			$cuenta_pagarReturnGeneral=$this->cuenta_pagarLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_pagars,$cuenta_pagar,$cuenta_pagarParameterGeneral,$cuenta_pagarReturnGeneral,$isEsNuevocuenta_pagar,$clases);
			
			/*cuenta_pagarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cuenta_pagars,$cuenta_pagar,$cuenta_pagarParameterGeneral,$cuenta_pagarReturnGeneral,$isEsNuevocuenta_pagar,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,cuenta_pagar $cuenta_pagar,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,cuenta_pagar $cuenta_pagar,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		cuenta_pagar_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(cuenta_pagar $cuenta_pagar,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			cuenta_pagar_logic_add::updatecuenta_pagarToGet($this->cuenta_pagar);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cuenta_pagar->setempresa($this->cuenta_pagarDataAccess->getempresa($this->connexion,$cuenta_pagar));
		$cuenta_pagar->setsucursal($this->cuenta_pagarDataAccess->getsucursal($this->connexion,$cuenta_pagar));
		$cuenta_pagar->setejercicio($this->cuenta_pagarDataAccess->getejercicio($this->connexion,$cuenta_pagar));
		$cuenta_pagar->setperiodo($this->cuenta_pagarDataAccess->getperiodo($this->connexion,$cuenta_pagar));
		$cuenta_pagar->setusuario($this->cuenta_pagarDataAccess->getusuario($this->connexion,$cuenta_pagar));
		$cuenta_pagar->setorden_compra($this->cuenta_pagarDataAccess->getorden_compra($this->connexion,$cuenta_pagar));
		$cuenta_pagar->setproveedor($this->cuenta_pagarDataAccess->getproveedor($this->connexion,$cuenta_pagar));
		$cuenta_pagar->settermino_pago_proveedor($this->cuenta_pagarDataAccess->gettermino_pago_proveedor($this->connexion,$cuenta_pagar));
		$cuenta_pagar->setestado_cuentas_pagar($this->cuenta_pagarDataAccess->getestado_cuentas_pagar($this->connexion,$cuenta_pagar));
		$cuenta_pagar->setdebito_cuenta_pagars($this->cuenta_pagarDataAccess->getdebito_cuenta_pagars($this->connexion,$cuenta_pagar));
		$cuenta_pagar->setcredito_cuenta_pagars($this->cuenta_pagarDataAccess->getcredito_cuenta_pagars($this->connexion,$cuenta_pagar));
		$cuenta_pagar->setpago_cuenta_pagars($this->cuenta_pagarDataAccess->getpago_cuenta_pagars($this->connexion,$cuenta_pagar));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cuenta_pagar->setempresa($this->cuenta_pagarDataAccess->getempresa($this->connexion,$cuenta_pagar));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$cuenta_pagar->setsucursal($this->cuenta_pagarDataAccess->getsucursal($this->connexion,$cuenta_pagar));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$cuenta_pagar->setejercicio($this->cuenta_pagarDataAccess->getejercicio($this->connexion,$cuenta_pagar));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$cuenta_pagar->setperiodo($this->cuenta_pagarDataAccess->getperiodo($this->connexion,$cuenta_pagar));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$cuenta_pagar->setusuario($this->cuenta_pagarDataAccess->getusuario($this->connexion,$cuenta_pagar));
				continue;
			}

			if($clas->clas==orden_compra::$class.'') {
				$cuenta_pagar->setorden_compra($this->cuenta_pagarDataAccess->getorden_compra($this->connexion,$cuenta_pagar));
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$cuenta_pagar->setproveedor($this->cuenta_pagarDataAccess->getproveedor($this->connexion,$cuenta_pagar));
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				$cuenta_pagar->settermino_pago_proveedor($this->cuenta_pagarDataAccess->gettermino_pago_proveedor($this->connexion,$cuenta_pagar));
				continue;
			}

			if($clas->clas==estado_cuentas_pagar::$class.'') {
				$cuenta_pagar->setestado_cuentas_pagar($this->cuenta_pagarDataAccess->getestado_cuentas_pagar($this->connexion,$cuenta_pagar));
				continue;
			}

			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta_pagar->setdebito_cuenta_pagars($this->cuenta_pagarDataAccess->getdebito_cuenta_pagars($this->connexion,$cuenta_pagar));

				if($this->isConDeep) {
					$debitocuentapagarLogic= new debito_cuenta_pagar_logic($this->connexion);
					$debitocuentapagarLogic->setdebito_cuenta_pagars($cuenta_pagar->getdebito_cuenta_pagars());
					$classesLocal=debito_cuenta_pagar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$debitocuentapagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					debito_cuenta_pagar_util::refrescarFKDescripciones($debitocuentapagarLogic->getdebito_cuenta_pagars());
					$cuenta_pagar->setdebito_cuenta_pagars($debitocuentapagarLogic->getdebito_cuenta_pagars());
				}

				continue;
			}

			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta_pagar->setcredito_cuenta_pagars($this->cuenta_pagarDataAccess->getcredito_cuenta_pagars($this->connexion,$cuenta_pagar));

				if($this->isConDeep) {
					$creditocuentapagarLogic= new credito_cuenta_pagar_logic($this->connexion);
					$creditocuentapagarLogic->setcredito_cuenta_pagars($cuenta_pagar->getcredito_cuenta_pagars());
					$classesLocal=credito_cuenta_pagar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$creditocuentapagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					credito_cuenta_pagar_util::refrescarFKDescripciones($creditocuentapagarLogic->getcredito_cuenta_pagars());
					$cuenta_pagar->setcredito_cuenta_pagars($creditocuentapagarLogic->getcredito_cuenta_pagars());
				}

				continue;
			}

			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta_pagar->setpago_cuenta_pagars($this->cuenta_pagarDataAccess->getpago_cuenta_pagars($this->connexion,$cuenta_pagar));

				if($this->isConDeep) {
					$pagocuentapagarLogic= new pago_cuenta_pagar_logic($this->connexion);
					$pagocuentapagarLogic->setpago_cuenta_pagars($cuenta_pagar->getpago_cuenta_pagars());
					$classesLocal=pago_cuenta_pagar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$pagocuentapagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					pago_cuenta_pagar_util::refrescarFKDescripciones($pagocuentapagarLogic->getpago_cuenta_pagars());
					$cuenta_pagar->setpago_cuenta_pagars($pagocuentapagarLogic->getpago_cuenta_pagars());
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
			$cuenta_pagar->setempresa($this->cuenta_pagarDataAccess->getempresa($this->connexion,$cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar->setsucursal($this->cuenta_pagarDataAccess->getsucursal($this->connexion,$cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar->setejercicio($this->cuenta_pagarDataAccess->getejercicio($this->connexion,$cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar->setperiodo($this->cuenta_pagarDataAccess->getperiodo($this->connexion,$cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar->setusuario($this->cuenta_pagarDataAccess->getusuario($this->connexion,$cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==orden_compra::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar->setorden_compra($this->cuenta_pagarDataAccess->getorden_compra($this->connexion,$cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar->setproveedor($this->cuenta_pagarDataAccess->getproveedor($this->connexion,$cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar->settermino_pago_proveedor($this->cuenta_pagarDataAccess->gettermino_pago_proveedor($this->connexion,$cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estado_cuentas_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar->setestado_cuentas_pagar($this->cuenta_pagarDataAccess->getestado_cuentas_pagar($this->connexion,$cuenta_pagar));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_pagar::$class);
			$cuenta_pagar->setdebito_cuenta_pagars($this->cuenta_pagarDataAccess->getdebito_cuenta_pagars($this->connexion,$cuenta_pagar));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_pagar::$class);
			$cuenta_pagar->setcredito_cuenta_pagars($this->cuenta_pagarDataAccess->getcredito_cuenta_pagars($this->connexion,$cuenta_pagar));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_pagar::$class);
			$cuenta_pagar->setpago_cuenta_pagars($this->cuenta_pagarDataAccess->getpago_cuenta_pagars($this->connexion,$cuenta_pagar));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cuenta_pagar->setempresa($this->cuenta_pagarDataAccess->getempresa($this->connexion,$cuenta_pagar));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_pagar->setsucursal($this->cuenta_pagarDataAccess->getsucursal($this->connexion,$cuenta_pagar));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($cuenta_pagar->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_pagar->setejercicio($this->cuenta_pagarDataAccess->getejercicio($this->connexion,$cuenta_pagar));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($cuenta_pagar->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_pagar->setperiodo($this->cuenta_pagarDataAccess->getperiodo($this->connexion,$cuenta_pagar));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($cuenta_pagar->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_pagar->setusuario($this->cuenta_pagarDataAccess->getusuario($this->connexion,$cuenta_pagar));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($cuenta_pagar->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_pagar->setorden_compra($this->cuenta_pagarDataAccess->getorden_compra($this->connexion,$cuenta_pagar));
		$orden_compraLogic= new orden_compra_logic($this->connexion);
		$orden_compraLogic->deepLoad($cuenta_pagar->getorden_compra(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_pagar->setproveedor($this->cuenta_pagarDataAccess->getproveedor($this->connexion,$cuenta_pagar));
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepLoad($cuenta_pagar->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_pagar->settermino_pago_proveedor($this->cuenta_pagarDataAccess->gettermino_pago_proveedor($this->connexion,$cuenta_pagar));
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
		$termino_pago_proveedorLogic->deepLoad($cuenta_pagar->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_pagar->setestado_cuentas_pagar($this->cuenta_pagarDataAccess->getestado_cuentas_pagar($this->connexion,$cuenta_pagar));
		$estado_cuentas_pagarLogic= new estado_cuentas_pagar_logic($this->connexion);
		$estado_cuentas_pagarLogic->deepLoad($cuenta_pagar->getestado_cuentas_pagar(),$isDeep,$deepLoadType,$clases);
				

		$cuenta_pagar->setdebito_cuenta_pagars($this->cuenta_pagarDataAccess->getdebito_cuenta_pagars($this->connexion,$cuenta_pagar));

		foreach($cuenta_pagar->getdebito_cuenta_pagars() as $debitocuentapagar) {
			$debitocuentapagarLogic= new debito_cuenta_pagar_logic($this->connexion);
			$debitocuentapagarLogic->deepLoad($debitocuentapagar,$isDeep,$deepLoadType,$clases);
		}

		$cuenta_pagar->setcredito_cuenta_pagars($this->cuenta_pagarDataAccess->getcredito_cuenta_pagars($this->connexion,$cuenta_pagar));

		foreach($cuenta_pagar->getcredito_cuenta_pagars() as $creditocuentapagar) {
			$creditocuentapagarLogic= new credito_cuenta_pagar_logic($this->connexion);
			$creditocuentapagarLogic->deepLoad($creditocuentapagar,$isDeep,$deepLoadType,$clases);
		}

		$cuenta_pagar->setpago_cuenta_pagars($this->cuenta_pagarDataAccess->getpago_cuenta_pagars($this->connexion,$cuenta_pagar));

		foreach($cuenta_pagar->getpago_cuenta_pagars() as $pagocuentapagar) {
			$pagocuentapagarLogic= new pago_cuenta_pagar_logic($this->connexion);
			$pagocuentapagarLogic->deepLoad($pagocuentapagar,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cuenta_pagar->setempresa($this->cuenta_pagarDataAccess->getempresa($this->connexion,$cuenta_pagar));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$cuenta_pagar->setsucursal($this->cuenta_pagarDataAccess->getsucursal($this->connexion,$cuenta_pagar));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($cuenta_pagar->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$cuenta_pagar->setejercicio($this->cuenta_pagarDataAccess->getejercicio($this->connexion,$cuenta_pagar));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($cuenta_pagar->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$cuenta_pagar->setperiodo($this->cuenta_pagarDataAccess->getperiodo($this->connexion,$cuenta_pagar));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($cuenta_pagar->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$cuenta_pagar->setusuario($this->cuenta_pagarDataAccess->getusuario($this->connexion,$cuenta_pagar));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($cuenta_pagar->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==orden_compra::$class.'') {
				$cuenta_pagar->setorden_compra($this->cuenta_pagarDataAccess->getorden_compra($this->connexion,$cuenta_pagar));
				$orden_compraLogic= new orden_compra_logic($this->connexion);
				$orden_compraLogic->deepLoad($cuenta_pagar->getorden_compra(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$cuenta_pagar->setproveedor($this->cuenta_pagarDataAccess->getproveedor($this->connexion,$cuenta_pagar));
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($cuenta_pagar->getproveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				$cuenta_pagar->settermino_pago_proveedor($this->cuenta_pagarDataAccess->gettermino_pago_proveedor($this->connexion,$cuenta_pagar));
				$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
				$termino_pago_proveedorLogic->deepLoad($cuenta_pagar->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==estado_cuentas_pagar::$class.'') {
				$cuenta_pagar->setestado_cuentas_pagar($this->cuenta_pagarDataAccess->getestado_cuentas_pagar($this->connexion,$cuenta_pagar));
				$estado_cuentas_pagarLogic= new estado_cuentas_pagar_logic($this->connexion);
				$estado_cuentas_pagarLogic->deepLoad($cuenta_pagar->getestado_cuentas_pagar(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta_pagar->setdebito_cuenta_pagars($this->cuenta_pagarDataAccess->getdebito_cuenta_pagars($this->connexion,$cuenta_pagar));

				foreach($cuenta_pagar->getdebito_cuenta_pagars() as $debitocuentapagar) {
					$debitocuentapagarLogic= new debito_cuenta_pagar_logic($this->connexion);
					$debitocuentapagarLogic->deepLoad($debitocuentapagar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta_pagar->setcredito_cuenta_pagars($this->cuenta_pagarDataAccess->getcredito_cuenta_pagars($this->connexion,$cuenta_pagar));

				foreach($cuenta_pagar->getcredito_cuenta_pagars() as $creditocuentapagar) {
					$creditocuentapagarLogic= new credito_cuenta_pagar_logic($this->connexion);
					$creditocuentapagarLogic->deepLoad($creditocuentapagar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta_pagar->setpago_cuenta_pagars($this->cuenta_pagarDataAccess->getpago_cuenta_pagars($this->connexion,$cuenta_pagar));

				foreach($cuenta_pagar->getpago_cuenta_pagars() as $pagocuentapagar) {
					$pagocuentapagarLogic= new pago_cuenta_pagar_logic($this->connexion);
					$pagocuentapagarLogic->deepLoad($pagocuentapagar,$isDeep,$deepLoadType,$clases);
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
			$cuenta_pagar->setempresa($this->cuenta_pagarDataAccess->getempresa($this->connexion,$cuenta_pagar));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar->setsucursal($this->cuenta_pagarDataAccess->getsucursal($this->connexion,$cuenta_pagar));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($cuenta_pagar->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar->setejercicio($this->cuenta_pagarDataAccess->getejercicio($this->connexion,$cuenta_pagar));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($cuenta_pagar->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar->setperiodo($this->cuenta_pagarDataAccess->getperiodo($this->connexion,$cuenta_pagar));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($cuenta_pagar->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar->setusuario($this->cuenta_pagarDataAccess->getusuario($this->connexion,$cuenta_pagar));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($cuenta_pagar->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==orden_compra::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar->setorden_compra($this->cuenta_pagarDataAccess->getorden_compra($this->connexion,$cuenta_pagar));
			$orden_compraLogic= new orden_compra_logic($this->connexion);
			$orden_compraLogic->deepLoad($cuenta_pagar->getorden_compra(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar->setproveedor($this->cuenta_pagarDataAccess->getproveedor($this->connexion,$cuenta_pagar));
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($cuenta_pagar->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar->settermino_pago_proveedor($this->cuenta_pagarDataAccess->gettermino_pago_proveedor($this->connexion,$cuenta_pagar));
			$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
			$termino_pago_proveedorLogic->deepLoad($cuenta_pagar->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado_cuentas_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_pagar->setestado_cuentas_pagar($this->cuenta_pagarDataAccess->getestado_cuentas_pagar($this->connexion,$cuenta_pagar));
			$estado_cuentas_pagarLogic= new estado_cuentas_pagar_logic($this->connexion);
			$estado_cuentas_pagarLogic->deepLoad($cuenta_pagar->getestado_cuentas_pagar(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_pagar::$class);
			$cuenta_pagar->setdebito_cuenta_pagars($this->cuenta_pagarDataAccess->getdebito_cuenta_pagars($this->connexion,$cuenta_pagar));

			foreach($cuenta_pagar->getdebito_cuenta_pagars() as $debitocuentapagar) {
				$debitocuentapagarLogic= new debito_cuenta_pagar_logic($this->connexion);
				$debitocuentapagarLogic->deepLoad($debitocuentapagar,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_pagar::$class);
			$cuenta_pagar->setcredito_cuenta_pagars($this->cuenta_pagarDataAccess->getcredito_cuenta_pagars($this->connexion,$cuenta_pagar));

			foreach($cuenta_pagar->getcredito_cuenta_pagars() as $creditocuentapagar) {
				$creditocuentapagarLogic= new credito_cuenta_pagar_logic($this->connexion);
				$creditocuentapagarLogic->deepLoad($creditocuentapagar,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_pagar::$class);
			$cuenta_pagar->setpago_cuenta_pagars($this->cuenta_pagarDataAccess->getpago_cuenta_pagars($this->connexion,$cuenta_pagar));

			foreach($cuenta_pagar->getpago_cuenta_pagars() as $pagocuentapagar) {
				$pagocuentapagarLogic= new pago_cuenta_pagar_logic($this->connexion);
				$pagocuentapagarLogic->deepLoad($pagocuentapagar,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(cuenta_pagar $cuenta_pagar,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			cuenta_pagar_logic_add::updatecuenta_pagarToSave($this->cuenta_pagar);			
			
			if(!$paraDeleteCascade) {				
				cuenta_pagar_data::save($cuenta_pagar, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($cuenta_pagar->getempresa(),$this->connexion);
		sucursal_data::save($cuenta_pagar->getsucursal(),$this->connexion);
		ejercicio_data::save($cuenta_pagar->getejercicio(),$this->connexion);
		periodo_data::save($cuenta_pagar->getperiodo(),$this->connexion);
		usuario_data::save($cuenta_pagar->getusuario(),$this->connexion);
		orden_compra_data::save($cuenta_pagar->getorden_compra(),$this->connexion);
		proveedor_data::save($cuenta_pagar->getproveedor(),$this->connexion);
		termino_pago_proveedor_data::save($cuenta_pagar->gettermino_pago_proveedor(),$this->connexion);
		estado_cuentas_pagar_data::save($cuenta_pagar->getestado_cuentas_pagar(),$this->connexion);

		foreach($cuenta_pagar->getdebito_cuenta_pagars() as $debitocuentapagar) {
			$debitocuentapagar->setid_cuenta_pagar($cuenta_pagar->getId());
			debito_cuenta_pagar_data::save($debitocuentapagar,$this->connexion);
		}


		foreach($cuenta_pagar->getcredito_cuenta_pagars() as $creditocuentapagar) {
			$creditocuentapagar->setid_cuenta_pagar($cuenta_pagar->getId());
			credito_cuenta_pagar_data::save($creditocuentapagar,$this->connexion);
		}


		foreach($cuenta_pagar->getpago_cuenta_pagars() as $pagocuentapagar) {
			$pagocuentapagar->setid_cuenta_pagar($cuenta_pagar->getId());
			pago_cuenta_pagar_data::save($pagocuentapagar,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cuenta_pagar->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($cuenta_pagar->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($cuenta_pagar->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($cuenta_pagar->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($cuenta_pagar->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==orden_compra::$class.'') {
				orden_compra_data::save($cuenta_pagar->getorden_compra(),$this->connexion);
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($cuenta_pagar->getproveedor(),$this->connexion);
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				termino_pago_proveedor_data::save($cuenta_pagar->gettermino_pago_proveedor(),$this->connexion);
				continue;
			}

			if($clas->clas==estado_cuentas_pagar::$class.'') {
				estado_cuentas_pagar_data::save($cuenta_pagar->getestado_cuentas_pagar(),$this->connexion);
				continue;
			}


			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta_pagar->getdebito_cuenta_pagars() as $debitocuentapagar) {
					$debitocuentapagar->setid_cuenta_pagar($cuenta_pagar->getId());
					debito_cuenta_pagar_data::save($debitocuentapagar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta_pagar->getcredito_cuenta_pagars() as $creditocuentapagar) {
					$creditocuentapagar->setid_cuenta_pagar($cuenta_pagar->getId());
					credito_cuenta_pagar_data::save($creditocuentapagar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta_pagar->getpago_cuenta_pagars() as $pagocuentapagar) {
					$pagocuentapagar->setid_cuenta_pagar($cuenta_pagar->getId());
					pago_cuenta_pagar_data::save($pagocuentapagar,$this->connexion);
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
			empresa_data::save($cuenta_pagar->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($cuenta_pagar->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($cuenta_pagar->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($cuenta_pagar->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($cuenta_pagar->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==orden_compra::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			orden_compra_data::save($cuenta_pagar->getorden_compra(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($cuenta_pagar->getproveedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_proveedor_data::save($cuenta_pagar->gettermino_pago_proveedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado_cuentas_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_cuentas_pagar_data::save($cuenta_pagar->getestado_cuentas_pagar(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_pagar::$class);

			foreach($cuenta_pagar->getdebito_cuenta_pagars() as $debitocuentapagar) {
				$debitocuentapagar->setid_cuenta_pagar($cuenta_pagar->getId());
				debito_cuenta_pagar_data::save($debitocuentapagar,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_pagar::$class);

			foreach($cuenta_pagar->getcredito_cuenta_pagars() as $creditocuentapagar) {
				$creditocuentapagar->setid_cuenta_pagar($cuenta_pagar->getId());
				credito_cuenta_pagar_data::save($creditocuentapagar,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_pagar::$class);

			foreach($cuenta_pagar->getpago_cuenta_pagars() as $pagocuentapagar) {
				$pagocuentapagar->setid_cuenta_pagar($cuenta_pagar->getId());
				pago_cuenta_pagar_data::save($pagocuentapagar,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($cuenta_pagar->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($cuenta_pagar->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($cuenta_pagar->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($cuenta_pagar->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($cuenta_pagar->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($cuenta_pagar->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($cuenta_pagar->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($cuenta_pagar->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($cuenta_pagar->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		orden_compra_data::save($cuenta_pagar->getorden_compra(),$this->connexion);
		$orden_compraLogic= new orden_compra_logic($this->connexion);
		$orden_compraLogic->deepSave($cuenta_pagar->getorden_compra(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		proveedor_data::save($cuenta_pagar->getproveedor(),$this->connexion);
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepSave($cuenta_pagar->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		termino_pago_proveedor_data::save($cuenta_pagar->gettermino_pago_proveedor(),$this->connexion);
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
		$termino_pago_proveedorLogic->deepSave($cuenta_pagar->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		estado_cuentas_pagar_data::save($cuenta_pagar->getestado_cuentas_pagar(),$this->connexion);
		$estado_cuentas_pagarLogic= new estado_cuentas_pagar_logic($this->connexion);
		$estado_cuentas_pagarLogic->deepSave($cuenta_pagar->getestado_cuentas_pagar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($cuenta_pagar->getdebito_cuenta_pagars() as $debitocuentapagar) {
			$debitocuentapagarLogic= new debito_cuenta_pagar_logic($this->connexion);
			$debitocuentapagar->setid_cuenta_pagar($cuenta_pagar->getId());
			debito_cuenta_pagar_data::save($debitocuentapagar,$this->connexion);
			$debitocuentapagarLogic->deepSave($debitocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta_pagar->getcredito_cuenta_pagars() as $creditocuentapagar) {
			$creditocuentapagarLogic= new credito_cuenta_pagar_logic($this->connexion);
			$creditocuentapagar->setid_cuenta_pagar($cuenta_pagar->getId());
			credito_cuenta_pagar_data::save($creditocuentapagar,$this->connexion);
			$creditocuentapagarLogic->deepSave($creditocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta_pagar->getpago_cuenta_pagars() as $pagocuentapagar) {
			$pagocuentapagarLogic= new pago_cuenta_pagar_logic($this->connexion);
			$pagocuentapagar->setid_cuenta_pagar($cuenta_pagar->getId());
			pago_cuenta_pagar_data::save($pagocuentapagar,$this->connexion);
			$pagocuentapagarLogic->deepSave($pagocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cuenta_pagar->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($cuenta_pagar->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($cuenta_pagar->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($cuenta_pagar->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($cuenta_pagar->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($cuenta_pagar->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($cuenta_pagar->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($cuenta_pagar->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($cuenta_pagar->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==orden_compra::$class.'') {
				orden_compra_data::save($cuenta_pagar->getorden_compra(),$this->connexion);
				$orden_compraLogic= new orden_compra_logic($this->connexion);
				$orden_compraLogic->deepSave($cuenta_pagar->getorden_compra(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($cuenta_pagar->getproveedor(),$this->connexion);
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepSave($cuenta_pagar->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				termino_pago_proveedor_data::save($cuenta_pagar->gettermino_pago_proveedor(),$this->connexion);
				$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
				$termino_pago_proveedorLogic->deepSave($cuenta_pagar->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==estado_cuentas_pagar::$class.'') {
				estado_cuentas_pagar_data::save($cuenta_pagar->getestado_cuentas_pagar(),$this->connexion);
				$estado_cuentas_pagarLogic= new estado_cuentas_pagar_logic($this->connexion);
				$estado_cuentas_pagarLogic->deepSave($cuenta_pagar->getestado_cuentas_pagar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta_pagar->getdebito_cuenta_pagars() as $debitocuentapagar) {
					$debitocuentapagarLogic= new debito_cuenta_pagar_logic($this->connexion);
					$debitocuentapagar->setid_cuenta_pagar($cuenta_pagar->getId());
					debito_cuenta_pagar_data::save($debitocuentapagar,$this->connexion);
					$debitocuentapagarLogic->deepSave($debitocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta_pagar->getcredito_cuenta_pagars() as $creditocuentapagar) {
					$creditocuentapagarLogic= new credito_cuenta_pagar_logic($this->connexion);
					$creditocuentapagar->setid_cuenta_pagar($cuenta_pagar->getId());
					credito_cuenta_pagar_data::save($creditocuentapagar,$this->connexion);
					$creditocuentapagarLogic->deepSave($creditocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta_pagar->getpago_cuenta_pagars() as $pagocuentapagar) {
					$pagocuentapagarLogic= new pago_cuenta_pagar_logic($this->connexion);
					$pagocuentapagar->setid_cuenta_pagar($cuenta_pagar->getId());
					pago_cuenta_pagar_data::save($pagocuentapagar,$this->connexion);
					$pagocuentapagarLogic->deepSave($pagocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($cuenta_pagar->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($cuenta_pagar->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($cuenta_pagar->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($cuenta_pagar->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($cuenta_pagar->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($cuenta_pagar->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($cuenta_pagar->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($cuenta_pagar->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($cuenta_pagar->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==orden_compra::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			orden_compra_data::save($cuenta_pagar->getorden_compra(),$this->connexion);
			$orden_compraLogic= new orden_compra_logic($this->connexion);
			$orden_compraLogic->deepSave($cuenta_pagar->getorden_compra(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($cuenta_pagar->getproveedor(),$this->connexion);
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepSave($cuenta_pagar->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_proveedor_data::save($cuenta_pagar->gettermino_pago_proveedor(),$this->connexion);
			$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
			$termino_pago_proveedorLogic->deepSave($cuenta_pagar->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado_cuentas_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_cuentas_pagar_data::save($cuenta_pagar->getestado_cuentas_pagar(),$this->connexion);
			$estado_cuentas_pagarLogic= new estado_cuentas_pagar_logic($this->connexion);
			$estado_cuentas_pagarLogic->deepSave($cuenta_pagar->getestado_cuentas_pagar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_pagar::$class);

			foreach($cuenta_pagar->getdebito_cuenta_pagars() as $debitocuentapagar) {
				$debitocuentapagarLogic= new debito_cuenta_pagar_logic($this->connexion);
				$debitocuentapagar->setid_cuenta_pagar($cuenta_pagar->getId());
				debito_cuenta_pagar_data::save($debitocuentapagar,$this->connexion);
				$debitocuentapagarLogic->deepSave($debitocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_pagar::$class);

			foreach($cuenta_pagar->getcredito_cuenta_pagars() as $creditocuentapagar) {
				$creditocuentapagarLogic= new credito_cuenta_pagar_logic($this->connexion);
				$creditocuentapagar->setid_cuenta_pagar($cuenta_pagar->getId());
				credito_cuenta_pagar_data::save($creditocuentapagar,$this->connexion);
				$creditocuentapagarLogic->deepSave($creditocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_pagar::$class);

			foreach($cuenta_pagar->getpago_cuenta_pagars() as $pagocuentapagar) {
				$pagocuentapagarLogic= new pago_cuenta_pagar_logic($this->connexion);
				$pagocuentapagar->setid_cuenta_pagar($cuenta_pagar->getId());
				pago_cuenta_pagar_data::save($pagocuentapagar,$this->connexion);
				$pagocuentapagarLogic->deepSave($pagocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				cuenta_pagar_data::save($cuenta_pagar, $this->connexion);
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
			
			$this->deepLoad($this->cuenta_pagar,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->cuenta_pagars as $cuenta_pagar) {
				$this->deepLoad($cuenta_pagar,$isDeep,$deepLoadType,$clases);
								
				cuenta_pagar_util::refrescarFKDescripciones($this->cuenta_pagars);
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
			
			foreach($this->cuenta_pagars as $cuenta_pagar) {
				$this->deepLoad($cuenta_pagar,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->cuenta_pagar,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->cuenta_pagars as $cuenta_pagar) {
				$this->deepSave($cuenta_pagar,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->cuenta_pagars as $cuenta_pagar) {
				$this->deepSave($cuenta_pagar,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(orden_compra::$class);
				$classes[]=new Classe(proveedor::$class);
				$classes[]=new Classe(termino_pago_proveedor::$class);
				$classes[]=new Classe(estado_cuentas_pagar::$class);
				
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
					if($clas->clas==orden_compra::$class) {
						$classes[]=new Classe(orden_compra::$class);
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
					if($clas->clas==termino_pago_proveedor::$class) {
						$classes[]=new Classe(termino_pago_proveedor::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==estado_cuentas_pagar::$class) {
						$classes[]=new Classe(estado_cuentas_pagar::$class);
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
					if($clas->clas==orden_compra::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(orden_compra::$class);
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
					if($clas->clas==termino_pago_proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(termino_pago_proveedor::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==estado_cuentas_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(estado_cuentas_pagar::$class);
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
				
				$classes[]=new Classe(debito_cuenta_pagar::$class);
				$classes[]=new Classe(credito_cuenta_pagar::$class);
				$classes[]=new Classe(pago_cuenta_pagar::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==debito_cuenta_pagar::$class) {
						$classes[]=new Classe(debito_cuenta_pagar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==credito_cuenta_pagar::$class) {
						$classes[]=new Classe(credito_cuenta_pagar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==pago_cuenta_pagar::$class) {
						$classes[]=new Classe(pago_cuenta_pagar::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==debito_cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(debito_cuenta_pagar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==credito_cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(credito_cuenta_pagar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==pago_cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(pago_cuenta_pagar::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getcuenta_pagar() : ?cuenta_pagar {	
		/*
		cuenta_pagar_logic_add::checkcuenta_pagarToGet($this->cuenta_pagar,$this->datosCliente);
		cuenta_pagar_logic_add::updatecuenta_pagarToGet($this->cuenta_pagar);
		*/
			
		return $this->cuenta_pagar;
	}
		
	public function setcuenta_pagar(cuenta_pagar $newcuenta_pagar) {
		$this->cuenta_pagar = $newcuenta_pagar;
	}
	
	public function getcuenta_pagars() : array {		
		/*
		cuenta_pagar_logic_add::checkcuenta_pagarToGets($this->cuenta_pagars,$this->datosCliente);
		
		foreach ($this->cuenta_pagars as $cuenta_pagarLocal ) {
			cuenta_pagar_logic_add::updatecuenta_pagarToGet($cuenta_pagarLocal);
		}
		*/
		
		return $this->cuenta_pagars;
	}
	
	public function setcuenta_pagars(array $newcuenta_pagars) {
		$this->cuenta_pagars = $newcuenta_pagars;
	}
	
	public function getcuenta_pagarDataAccess() : cuenta_pagar_data {
		return $this->cuenta_pagarDataAccess;
	}
	
	public function setcuenta_pagarDataAccess(cuenta_pagar_data $newcuenta_pagarDataAccess) {
		$this->cuenta_pagarDataAccess = $newcuenta_pagarDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        cuenta_pagar_carga::$CONTROLLER;;        
		
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
