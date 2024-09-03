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

namespace com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_param_return;

use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\presentation\session\cheque_cuenta_corriente_session;

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

use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\entity\cheque_cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\data\cheque_cuenta_corriente_data;

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

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\data\cuenta_corriente_data;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\entity\categoria_cheque;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\data\categoria_cheque_data;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\logic\categoria_cheque_logic;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\entity\beneficiario_ocacional_cheque;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\data\beneficiario_ocacional_cheque_data;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\logic\beneficiario_ocacional_cheque_logic;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_util;

use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\entity\estado_deposito_retiro;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\data\estado_deposito_retiro_data;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\logic\estado_deposito_retiro_logic;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\util\estado_deposito_retiro_util;

//REL


//REL DETALLES




class cheque_cuenta_corriente_logic  extends GeneralEntityLogic implements cheque_cuenta_corriente_logicI {	
	/*GENERAL*/
	public cheque_cuenta_corriente_data $cheque_cuenta_corrienteDataAccess;
	public ?cheque_cuenta_corriente_logic_add $cheque_cuenta_corrienteLogicAdditional=null;
	public ?cheque_cuenta_corriente $cheque_cuenta_corriente;
	public array $cheque_cuenta_corrientes;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->cheque_cuenta_corrienteDataAccess = new cheque_cuenta_corriente_data();			
			$this->cheque_cuenta_corrientes = array();
			$this->cheque_cuenta_corriente = new cheque_cuenta_corriente();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->cheque_cuenta_corrienteLogicAdditional = new cheque_cuenta_corriente_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->cheque_cuenta_corrienteLogicAdditional==null) {
			$this->cheque_cuenta_corrienteLogicAdditional=new cheque_cuenta_corriente_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->cheque_cuenta_corrienteDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->cheque_cuenta_corrienteDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->cheque_cuenta_corrienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->cheque_cuenta_corrienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->cheque_cuenta_corrientes = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->cheque_cuenta_corrientes = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);
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
		$this->cheque_cuenta_corriente = new cheque_cuenta_corriente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->cheque_cuenta_corriente=$this->cheque_cuenta_corrienteDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cheque_cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cheque_cuenta_corriente_util::refrescarFKDescripcion($this->cheque_cuenta_corriente);
			}
						
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGet($this->cheque_cuenta_corriente,$this->datosCliente);
			cheque_cuenta_corriente_logic_add::updatecheque_cuenta_corrienteToGet($this->cheque_cuenta_corriente);
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
		$this->cheque_cuenta_corriente = new  cheque_cuenta_corriente();
		  		  
        try {		
			$this->cheque_cuenta_corriente=$this->cheque_cuenta_corrienteDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cheque_cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cheque_cuenta_corriente_util::refrescarFKDescripcion($this->cheque_cuenta_corriente);
			}
			
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGet($this->cheque_cuenta_corriente,$this->datosCliente);
			cheque_cuenta_corriente_logic_add::updatecheque_cuenta_corrienteToGet($this->cheque_cuenta_corriente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?cheque_cuenta_corriente {
		$cheque_cuenta_corrienteLogic = new  cheque_cuenta_corriente_logic();
		  		  
        try {		
			$cheque_cuenta_corrienteLogic->setConnexion($connexion);			
			$cheque_cuenta_corrienteLogic->getEntity($id);			
			return $cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->cheque_cuenta_corriente = new  cheque_cuenta_corriente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->cheque_cuenta_corriente=$this->cheque_cuenta_corrienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cheque_cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cheque_cuenta_corriente_util::refrescarFKDescripcion($this->cheque_cuenta_corriente);
			}
			
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGet($this->cheque_cuenta_corriente,$this->datosCliente);
			cheque_cuenta_corriente_logic_add::updatecheque_cuenta_corrienteToGet($this->cheque_cuenta_corriente);
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
		$this->cheque_cuenta_corriente = new  cheque_cuenta_corriente();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cheque_cuenta_corriente=$this->cheque_cuenta_corrienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cheque_cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cheque_cuenta_corriente_util::refrescarFKDescripcion($this->cheque_cuenta_corriente);
			}
			
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGet($this->cheque_cuenta_corriente,$this->datosCliente);
			cheque_cuenta_corriente_logic_add::updatecheque_cuenta_corrienteToGet($this->cheque_cuenta_corriente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?cheque_cuenta_corriente {
		$cheque_cuenta_corrienteLogic = new  cheque_cuenta_corriente_logic();
		  		  
        try {		
			$cheque_cuenta_corrienteLogic->setConnexion($connexion);			
			$cheque_cuenta_corrienteLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cheque_cuenta_corrientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);			
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
		$this->cheque_cuenta_corrientes = array();
		  		  
        try {			
			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->cheque_cuenta_corrientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);
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
		$this->cheque_cuenta_corrientes = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$cheque_cuenta_corrienteLogic = new  cheque_cuenta_corriente_logic();
		  		  
        try {		
			$cheque_cuenta_corrienteLogic->setConnexion($connexion);			
			$cheque_cuenta_corrienteLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->cheque_cuenta_corrientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);
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
		$this->cheque_cuenta_corrientes = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->cheque_cuenta_corrientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);
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
		$this->cheque_cuenta_corrientes = array();
		  		  
        try {			
			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}	
			
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cheque_cuenta_corrientes = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);
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
		$this->cheque_cuenta_corrientes = array();
		  		  
        try {		
			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_Idbeneficiario_ocacionalWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_beneficiario_ocacional_cheque) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_beneficiario_ocacional_cheque= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_beneficiario_ocacional_cheque->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_beneficiario_ocacional_cheque,cheque_cuenta_corriente_util::$ID_BENEFICIARIO_OCACIONAL_CHEQUE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_beneficiario_ocacional_cheque);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idbeneficiario_ocacional(string $strFinalQuery,Pagination $pagination,?int $id_beneficiario_ocacional_cheque) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_beneficiario_ocacional_cheque= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_beneficiario_ocacional_cheque->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_beneficiario_ocacional_cheque,cheque_cuenta_corriente_util::$ID_BENEFICIARIO_OCACIONAL_CHEQUE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_beneficiario_ocacional_cheque);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idcategoria_chequeWithConnection(string $strFinalQuery,Pagination $pagination,int $id_categoria_cheque) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_categoria_cheque= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_categoria_cheque->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_categoria_cheque,cheque_cuenta_corriente_util::$ID_CATEGORIA_CHEQUE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_categoria_cheque);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcategoria_cheque(string $strFinalQuery,Pagination $pagination,int $id_categoria_cheque) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_categoria_cheque= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_categoria_cheque->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_categoria_cheque,cheque_cuenta_corriente_util::$ID_CATEGORIA_CHEQUE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_categoria_cheque);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);
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
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,cheque_cuenta_corriente_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);

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
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,cheque_cuenta_corriente_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);
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
			$parameterSelectionGeneralid_cuenta_corriente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_corriente,cheque_cuenta_corriente_util::$ID_CUENTA_CORRIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_corriente);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);

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
			$parameterSelectionGeneralid_cuenta_corriente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_corriente,cheque_cuenta_corriente_util::$ID_CUENTA_CORRIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_corriente);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);
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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,cheque_cuenta_corriente_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,cheque_cuenta_corriente_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cheque_cuenta_corriente_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cheque_cuenta_corriente_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idestado_deposito_retiroWithConnection(string $strFinalQuery,Pagination $pagination,int $id_estado_deposito_retiro) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estado_deposito_retiro= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estado_deposito_retiro->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado_deposito_retiro,cheque_cuenta_corriente_util::$ID_ESTADO_DEPOSITO_RETIRO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado_deposito_retiro);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idestado_deposito_retiro(string $strFinalQuery,Pagination $pagination,int $id_estado_deposito_retiro) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estado_deposito_retiro= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estado_deposito_retiro->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado_deposito_retiro,cheque_cuenta_corriente_util::$ID_ESTADO_DEPOSITO_RETIRO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado_deposito_retiro);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);
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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,cheque_cuenta_corriente_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);

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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,cheque_cuenta_corriente_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);
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
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,cheque_cuenta_corriente_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);

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
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,cheque_cuenta_corriente_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);
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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,cheque_cuenta_corriente_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);

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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,cheque_cuenta_corriente_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,cheque_cuenta_corriente_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,cheque_cuenta_corriente_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cheque_cuenta_corrientes);
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
						
			//cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToSave($this->cheque_cuenta_corriente,$this->datosCliente,$this->connexion);	       
			cheque_cuenta_corriente_logic_add::updatecheque_cuenta_corrienteToSave($this->cheque_cuenta_corriente);			
			cheque_cuenta_corriente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cheque_cuenta_corriente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->cheque_cuenta_corrienteLogicAdditional->checkGeneralEntityToSave($this,$this->cheque_cuenta_corriente,$this->datosCliente,$this->connexion);
			
			
			cheque_cuenta_corriente_data::save($this->cheque_cuenta_corriente, $this->connexion);	    	       	 				
			//cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToSaveAfter($this->cheque_cuenta_corriente,$this->datosCliente,$this->connexion);			
			$this->cheque_cuenta_corrienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cheque_cuenta_corriente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cheque_cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cheque_cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cheque_cuenta_corriente_util::refrescarFKDescripcion($this->cheque_cuenta_corriente);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->cheque_cuenta_corriente->getIsDeleted()) {
				$this->cheque_cuenta_corriente=null;
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
						
			/*cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToSave($this->cheque_cuenta_corriente,$this->datosCliente,$this->connexion);*/	        
			cheque_cuenta_corriente_logic_add::updatecheque_cuenta_corrienteToSave($this->cheque_cuenta_corriente);			
			$this->cheque_cuenta_corrienteLogicAdditional->checkGeneralEntityToSave($this,$this->cheque_cuenta_corriente,$this->datosCliente,$this->connexion);			
			cheque_cuenta_corriente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cheque_cuenta_corriente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			cheque_cuenta_corriente_data::save($this->cheque_cuenta_corriente, $this->connexion);	    	       	 						
			/*cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToSaveAfter($this->cheque_cuenta_corriente,$this->datosCliente,$this->connexion);*/			
			$this->cheque_cuenta_corrienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cheque_cuenta_corriente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cheque_cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cheque_cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cheque_cuenta_corriente_util::refrescarFKDescripcion($this->cheque_cuenta_corriente);				
			}
			
			if($this->cheque_cuenta_corriente->getIsDeleted()) {
				$this->cheque_cuenta_corriente=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(cheque_cuenta_corriente $cheque_cuenta_corriente,Connexion $connexion)  {
		$cheque_cuenta_corrienteLogic = new  cheque_cuenta_corriente_logic();		  		  
        try {		
			$cheque_cuenta_corrienteLogic->setConnexion($connexion);			
			$cheque_cuenta_corrienteLogic->setcheque_cuenta_corriente($cheque_cuenta_corriente);			
			$cheque_cuenta_corrienteLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToSaves($this->cheque_cuenta_corrientes,$this->datosCliente,$this->connexion);*/	        	
			$this->cheque_cuenta_corrienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cheque_cuenta_corrientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cheque_cuenta_corrientes as $cheque_cuenta_corrienteLocal) {				
								
				cheque_cuenta_corriente_logic_add::updatecheque_cuenta_corrienteToSave($cheque_cuenta_corrienteLocal);	        	
				cheque_cuenta_corriente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cheque_cuenta_corrienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				cheque_cuenta_corriente_data::save($cheque_cuenta_corrienteLocal, $this->connexion);				
			}
			
			/*cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToSavesAfter($this->cheque_cuenta_corrientes,$this->datosCliente,$this->connexion);*/			
			$this->cheque_cuenta_corrienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cheque_cuenta_corrientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
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
			/*cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToSaves($this->cheque_cuenta_corrientes,$this->datosCliente,$this->connexion);*/			
			$this->cheque_cuenta_corrienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cheque_cuenta_corrientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cheque_cuenta_corrientes as $cheque_cuenta_corrienteLocal) {				
								
				cheque_cuenta_corriente_logic_add::updatecheque_cuenta_corrienteToSave($cheque_cuenta_corrienteLocal);	        	
				cheque_cuenta_corriente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cheque_cuenta_corrienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				cheque_cuenta_corriente_data::save($cheque_cuenta_corrienteLocal, $this->connexion);				
			}			
			
			/*cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToSavesAfter($this->cheque_cuenta_corrientes,$this->datosCliente,$this->connexion);*/			
			$this->cheque_cuenta_corrienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cheque_cuenta_corrientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $cheque_cuenta_corrientes,Connexion $connexion)  {
		$cheque_cuenta_corrienteLogic = new  cheque_cuenta_corriente_logic();
		  		  
        try {		
			$cheque_cuenta_corrienteLogic->setConnexion($connexion);			
			$cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($cheque_cuenta_corrientes);			
			$cheque_cuenta_corrienteLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$cheque_cuenta_corrientesAux=array();
		
		foreach($this->cheque_cuenta_corrientes as $cheque_cuenta_corriente) {
			if($cheque_cuenta_corriente->getIsDeleted()==false) {
				$cheque_cuenta_corrientesAux[]=$cheque_cuenta_corriente;
			}
		}
		
		$this->cheque_cuenta_corrientes=$cheque_cuenta_corrientesAux;
	}
	
	public function updateToGetsAuxiliar(array &$cheque_cuenta_corrientes) {
		if($this->cheque_cuenta_corrienteLogicAdditional==null) {
			$this->cheque_cuenta_corrienteLogicAdditional=new cheque_cuenta_corriente_logic_add();
		}
		
		
		$this->cheque_cuenta_corrienteLogicAdditional->updateToGets($cheque_cuenta_corrientes,$this);					
		$this->cheque_cuenta_corrienteLogicAdditional->updateToGetsReferencia($cheque_cuenta_corrientes,$this);			
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->cheque_cuenta_corrientes as $cheque_cuenta_corriente) {
				
				$cheque_cuenta_corriente->setid_empresa_Descripcion(cheque_cuenta_corriente_util::getempresaDescripcion($cheque_cuenta_corriente->getempresa()));
				$cheque_cuenta_corriente->setid_sucursal_Descripcion(cheque_cuenta_corriente_util::getsucursalDescripcion($cheque_cuenta_corriente->getsucursal()));
				$cheque_cuenta_corriente->setid_ejercicio_Descripcion(cheque_cuenta_corriente_util::getejercicioDescripcion($cheque_cuenta_corriente->getejercicio()));
				$cheque_cuenta_corriente->setid_periodo_Descripcion(cheque_cuenta_corriente_util::getperiodoDescripcion($cheque_cuenta_corriente->getperiodo()));
				$cheque_cuenta_corriente->setid_usuario_Descripcion(cheque_cuenta_corriente_util::getusuarioDescripcion($cheque_cuenta_corriente->getusuario()));
				$cheque_cuenta_corriente->setid_cuenta_corriente_Descripcion(cheque_cuenta_corriente_util::getcuenta_corrienteDescripcion($cheque_cuenta_corriente->getcuenta_corriente()));
				$cheque_cuenta_corriente->setid_categoria_cheque_Descripcion(cheque_cuenta_corriente_util::getcategoria_chequeDescripcion($cheque_cuenta_corriente->getcategoria_cheque()));
				$cheque_cuenta_corriente->setid_cliente_Descripcion(cheque_cuenta_corriente_util::getclienteDescripcion($cheque_cuenta_corriente->getcliente()));
				$cheque_cuenta_corriente->setid_proveedor_Descripcion(cheque_cuenta_corriente_util::getproveedorDescripcion($cheque_cuenta_corriente->getproveedor()));
				$cheque_cuenta_corriente->setid_beneficiario_ocacional_cheque_Descripcion(cheque_cuenta_corriente_util::getbeneficiario_ocacional_chequeDescripcion($cheque_cuenta_corriente->getbeneficiario_ocacional_cheque()));
				$cheque_cuenta_corriente->setid_estado_deposito_retiro_Descripcion(cheque_cuenta_corriente_util::getestado_deposito_retiroDescripcion($cheque_cuenta_corriente->getestado_deposito_retiro()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cheque_cuenta_corriente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cheque_cuenta_corriente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cheque_cuenta_corriente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$cheque_cuenta_corrienteForeignKey=new cheque_cuenta_corriente_param_return();//cheque_cuenta_corrienteForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_corriente',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_corrientesFK($this->connexion,$strRecargarFkQuery,$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_categoria_cheque',$strRecargarFkTipos,',')) {
				$this->cargarComboscategoria_chequesFK($this->connexion,$strRecargarFkQuery,$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombosclientesFK($this->connexion,$strRecargarFkQuery,$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosproveedorsFK($this->connexion,$strRecargarFkQuery,$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_beneficiario_ocacional_cheque',$strRecargarFkTipos,',')) {
				$this->cargarCombosbeneficiario_ocacional_chequesFK($this->connexion,$strRecargarFkQuery,$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado_deposito_retiro',$strRecargarFkTipos,',')) {
				$this->cargarCombosestado_deposito_retirosFK($this->connexion,$strRecargarFkQuery,$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_corriente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_corrientesFK($this->connexion,' where id=-1 ',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_categoria_cheque',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscategoria_chequesFK($this->connexion,' where id=-1 ',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosclientesFK($this->connexion,' where id=-1 ',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproveedorsFK($this->connexion,' where id=-1 ',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_beneficiario_ocacional_cheque',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosbeneficiario_ocacional_chequesFK($this->connexion,' where id=-1 ',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_estado_deposito_retiro',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosestado_deposito_retirosFK($this->connexion,' where id=-1 ',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $cheque_cuenta_corrienteForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$cheque_cuenta_corrienteForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($cheque_cuenta_corrienteForeignKey->idempresaDefaultFK==0) {
					$cheque_cuenta_corrienteForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$cheque_cuenta_corrienteForeignKey->empresasFK[$empresaLocal->getId()]=cheque_cuenta_corriente_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($cheque_cuenta_corriente_session->bigidempresaActual!=null && $cheque_cuenta_corriente_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cheque_cuenta_corriente_session->bigidempresaActual);//WithConnection

				$cheque_cuenta_corrienteForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=cheque_cuenta_corriente_util::getempresaDescripcion($empresaLogic->getempresa());
				$cheque_cuenta_corrienteForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$cheque_cuenta_corrienteForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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
				if($cheque_cuenta_corrienteForeignKey->idsucursalDefaultFK==0) {
					$cheque_cuenta_corrienteForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$cheque_cuenta_corrienteForeignKey->sucursalsFK[$sucursalLocal->getId()]=cheque_cuenta_corriente_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($cheque_cuenta_corriente_session->bigidsucursalActual!=null && $cheque_cuenta_corriente_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($cheque_cuenta_corriente_session->bigidsucursalActual);//WithConnection

				$cheque_cuenta_corrienteForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=cheque_cuenta_corriente_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$cheque_cuenta_corrienteForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$cheque_cuenta_corrienteForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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
				if($cheque_cuenta_corrienteForeignKey->idejercicioDefaultFK==0) {
					$cheque_cuenta_corrienteForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$cheque_cuenta_corrienteForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=cheque_cuenta_corriente_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($cheque_cuenta_corriente_session->bigidejercicioActual!=null && $cheque_cuenta_corriente_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($cheque_cuenta_corriente_session->bigidejercicioActual);//WithConnection

				$cheque_cuenta_corrienteForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=cheque_cuenta_corriente_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$cheque_cuenta_corrienteForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$cheque_cuenta_corrienteForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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
				if($cheque_cuenta_corrienteForeignKey->idperiodoDefaultFK==0) {
					$cheque_cuenta_corrienteForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$cheque_cuenta_corrienteForeignKey->periodosFK[$periodoLocal->getId()]=cheque_cuenta_corriente_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($cheque_cuenta_corriente_session->bigidperiodoActual!=null && $cheque_cuenta_corriente_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($cheque_cuenta_corriente_session->bigidperiodoActual);//WithConnection

				$cheque_cuenta_corrienteForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=cheque_cuenta_corriente_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$cheque_cuenta_corrienteForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$cheque_cuenta_corrienteForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($cheque_cuenta_corrienteForeignKey->idusuarioDefaultFK==0) {
					$cheque_cuenta_corrienteForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$cheque_cuenta_corrienteForeignKey->usuariosFK[$usuarioLocal->getId()]=cheque_cuenta_corriente_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($cheque_cuenta_corriente_session->bigidusuarioActual!=null && $cheque_cuenta_corriente_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($cheque_cuenta_corriente_session->bigidusuarioActual);//WithConnection

				$cheque_cuenta_corrienteForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=cheque_cuenta_corriente_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$cheque_cuenta_corrienteForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarComboscuenta_corrientesFK($connexion=null,$strRecargarFkQuery='',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuenta_corrienteLogic= new cuenta_corriente_logic();
		$pagination= new Pagination();
		$cheque_cuenta_corrienteForeignKey->cuenta_corrientesFK=array();

		$cuenta_corrienteLogic->setConnexion($connexion);
		$cuenta_corrienteLogic->getcuenta_corrienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta_corriente!=true) {
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
				if($cheque_cuenta_corrienteForeignKey->idcuenta_corrienteDefaultFK==0) {
					$cheque_cuenta_corrienteForeignKey->idcuenta_corrienteDefaultFK=$cuenta_corrienteLocal->getId();
				}

				$cheque_cuenta_corrienteForeignKey->cuenta_corrientesFK[$cuenta_corrienteLocal->getId()]=cheque_cuenta_corriente_util::getcuenta_corrienteDescripcion($cuenta_corrienteLocal);
			}

		} else {

			if($cheque_cuenta_corriente_session->bigidcuenta_corrienteActual!=null && $cheque_cuenta_corriente_session->bigidcuenta_corrienteActual > 0) {
				$cuenta_corrienteLogic->getEntity($cheque_cuenta_corriente_session->bigidcuenta_corrienteActual);//WithConnection

				$cheque_cuenta_corrienteForeignKey->cuenta_corrientesFK[$cuenta_corrienteLogic->getcuenta_corriente()->getId()]=cheque_cuenta_corriente_util::getcuenta_corrienteDescripcion($cuenta_corrienteLogic->getcuenta_corriente());
				$cheque_cuenta_corrienteForeignKey->idcuenta_corrienteDefaultFK=$cuenta_corrienteLogic->getcuenta_corriente()->getId();
			}
		}
	}

	public function cargarComboscategoria_chequesFK($connexion=null,$strRecargarFkQuery='',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$categoria_chequeLogic= new categoria_cheque_logic();
		$pagination= new Pagination();
		$cheque_cuenta_corrienteForeignKey->categoria_chequesFK=array();

		$categoria_chequeLogic->setConnexion($connexion);
		$categoria_chequeLogic->getcategoria_chequeDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesioncategoria_cheque!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=categoria_cheque_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcategoria_cheque=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcategoria_cheque=Funciones::GetFinalQueryAppend($finalQueryGlobalcategoria_cheque, '');
				$finalQueryGlobalcategoria_cheque.=categoria_cheque_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcategoria_cheque.$strRecargarFkQuery;		

				$categoria_chequeLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($categoria_chequeLogic->getcategoria_cheques() as $categoria_chequeLocal ) {
				if($cheque_cuenta_corrienteForeignKey->idcategoria_chequeDefaultFK==0) {
					$cheque_cuenta_corrienteForeignKey->idcategoria_chequeDefaultFK=$categoria_chequeLocal->getId();
				}

				$cheque_cuenta_corrienteForeignKey->categoria_chequesFK[$categoria_chequeLocal->getId()]=cheque_cuenta_corriente_util::getcategoria_chequeDescripcion($categoria_chequeLocal);
			}

		} else {

			if($cheque_cuenta_corriente_session->bigidcategoria_chequeActual!=null && $cheque_cuenta_corriente_session->bigidcategoria_chequeActual > 0) {
				$categoria_chequeLogic->getEntity($cheque_cuenta_corriente_session->bigidcategoria_chequeActual);//WithConnection

				$cheque_cuenta_corrienteForeignKey->categoria_chequesFK[$categoria_chequeLogic->getcategoria_cheque()->getId()]=cheque_cuenta_corriente_util::getcategoria_chequeDescripcion($categoria_chequeLogic->getcategoria_cheque());
				$cheque_cuenta_corrienteForeignKey->idcategoria_chequeDefaultFK=$categoria_chequeLogic->getcategoria_cheque()->getId();
			}
		}
	}

	public function cargarCombosclientesFK($connexion=null,$strRecargarFkQuery='',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$clienteLogic= new cliente_logic();
		$pagination= new Pagination();
		$cheque_cuenta_corrienteForeignKey->clientesFK=array();

		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesioncliente!=true) {
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
				if($cheque_cuenta_corrienteForeignKey->idclienteDefaultFK==0) {
					$cheque_cuenta_corrienteForeignKey->idclienteDefaultFK=$clienteLocal->getId();
				}

				$cheque_cuenta_corrienteForeignKey->clientesFK[$clienteLocal->getId()]=cheque_cuenta_corriente_util::getclienteDescripcion($clienteLocal);
			}

		} else {

			if($cheque_cuenta_corriente_session->bigidclienteActual!=null && $cheque_cuenta_corriente_session->bigidclienteActual > 0) {
				$clienteLogic->getEntity($cheque_cuenta_corriente_session->bigidclienteActual);//WithConnection

				$cheque_cuenta_corrienteForeignKey->clientesFK[$clienteLogic->getcliente()->getId()]=cheque_cuenta_corriente_util::getclienteDescripcion($clienteLogic->getcliente());
				$cheque_cuenta_corrienteForeignKey->idclienteDefaultFK=$clienteLogic->getcliente()->getId();
			}
		}
	}

	public function cargarCombosproveedorsFK($connexion=null,$strRecargarFkQuery='',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$proveedorLogic= new proveedor_logic();
		$pagination= new Pagination();
		$cheque_cuenta_corrienteForeignKey->proveedorsFK=array();

		$proveedorLogic->setConnexion($connexion);
		$proveedorLogic->getproveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionproveedor!=true) {
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
				if($cheque_cuenta_corrienteForeignKey->idproveedorDefaultFK==0) {
					$cheque_cuenta_corrienteForeignKey->idproveedorDefaultFK=$proveedorLocal->getId();
				}

				$cheque_cuenta_corrienteForeignKey->proveedorsFK[$proveedorLocal->getId()]=cheque_cuenta_corriente_util::getproveedorDescripcion($proveedorLocal);
			}

		} else {

			if($cheque_cuenta_corriente_session->bigidproveedorActual!=null && $cheque_cuenta_corriente_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($cheque_cuenta_corriente_session->bigidproveedorActual);//WithConnection

				$cheque_cuenta_corrienteForeignKey->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=cheque_cuenta_corriente_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$cheque_cuenta_corrienteForeignKey->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	public function cargarCombosbeneficiario_ocacional_chequesFK($connexion=null,$strRecargarFkQuery='',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$beneficiario_ocacional_chequeLogic= new beneficiario_ocacional_cheque_logic();
		$pagination= new Pagination();
		$cheque_cuenta_corrienteForeignKey->beneficiario_ocacional_chequesFK=array();

		$beneficiario_ocacional_chequeLogic->setConnexion($connexion);
		$beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_chequeDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionbeneficiario_ocacional_cheque!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=beneficiario_ocacional_cheque_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalbeneficiario_ocacional_cheque=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalbeneficiario_ocacional_cheque=Funciones::GetFinalQueryAppend($finalQueryGlobalbeneficiario_ocacional_cheque, '');
				$finalQueryGlobalbeneficiario_ocacional_cheque.=beneficiario_ocacional_cheque_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalbeneficiario_ocacional_cheque.$strRecargarFkQuery;		

				$beneficiario_ocacional_chequeLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques() as $beneficiario_ocacional_chequeLocal ) {
				if($cheque_cuenta_corrienteForeignKey->idbeneficiario_ocacional_chequeDefaultFK==0) {
					$cheque_cuenta_corrienteForeignKey->idbeneficiario_ocacional_chequeDefaultFK=$beneficiario_ocacional_chequeLocal->getId();
				}

				$cheque_cuenta_corrienteForeignKey->beneficiario_ocacional_chequesFK[$beneficiario_ocacional_chequeLocal->getId()]=cheque_cuenta_corriente_util::getbeneficiario_ocacional_chequeDescripcion($beneficiario_ocacional_chequeLocal);
			}

		} else {

			if($cheque_cuenta_corriente_session->bigidbeneficiario_ocacional_chequeActual!=null && $cheque_cuenta_corriente_session->bigidbeneficiario_ocacional_chequeActual > 0) {
				$beneficiario_ocacional_chequeLogic->getEntity($cheque_cuenta_corriente_session->bigidbeneficiario_ocacional_chequeActual);//WithConnection

				$cheque_cuenta_corrienteForeignKey->beneficiario_ocacional_chequesFK[$beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->getId()]=cheque_cuenta_corriente_util::getbeneficiario_ocacional_chequeDescripcion($beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque());
				$cheque_cuenta_corrienteForeignKey->idbeneficiario_ocacional_chequeDefaultFK=$beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->getId();
			}
		}
	}

	public function cargarCombosestado_deposito_retirosFK($connexion=null,$strRecargarFkQuery='',$cheque_cuenta_corrienteForeignKey,$cheque_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$estado_deposito_retiroLogic= new estado_deposito_retiro_logic();
		$pagination= new Pagination();
		$cheque_cuenta_corrienteForeignKey->estado_deposito_retirosFK=array();

		$estado_deposito_retiroLogic->setConnexion($connexion);
		$estado_deposito_retiroLogic->getestado_deposito_retiroDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionestado_deposito_retiro!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=estado_deposito_retiro_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalestado_deposito_retiro=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalestado_deposito_retiro=Funciones::GetFinalQueryAppend($finalQueryGlobalestado_deposito_retiro, '');
				$finalQueryGlobalestado_deposito_retiro.=estado_deposito_retiro_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalestado_deposito_retiro.$strRecargarFkQuery;		

				$estado_deposito_retiroLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($estado_deposito_retiroLogic->getestado_deposito_retiros() as $estado_deposito_retiroLocal ) {
				if($cheque_cuenta_corrienteForeignKey->idestado_deposito_retiroDefaultFK==0) {
					$cheque_cuenta_corrienteForeignKey->idestado_deposito_retiroDefaultFK=$estado_deposito_retiroLocal->getId();
				}

				$cheque_cuenta_corrienteForeignKey->estado_deposito_retirosFK[$estado_deposito_retiroLocal->getId()]=cheque_cuenta_corriente_util::getestado_deposito_retiroDescripcion($estado_deposito_retiroLocal);
			}

		} else {

			if($cheque_cuenta_corriente_session->bigidestado_deposito_retiroActual!=null && $cheque_cuenta_corriente_session->bigidestado_deposito_retiroActual > 0) {
				$estado_deposito_retiroLogic->getEntity($cheque_cuenta_corriente_session->bigidestado_deposito_retiroActual);//WithConnection

				$cheque_cuenta_corrienteForeignKey->estado_deposito_retirosFK[$estado_deposito_retiroLogic->getestado_deposito_retiro()->getId()]=cheque_cuenta_corriente_util::getestado_deposito_retiroDescripcion($estado_deposito_retiroLogic->getestado_deposito_retiro());
				$cheque_cuenta_corrienteForeignKey->idestado_deposito_retiroDefaultFK=$estado_deposito_retiroLogic->getestado_deposito_retiro()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($cheque_cuenta_corriente) {
		$this->saveRelacionesBase($cheque_cuenta_corriente,true);
	}

	public function saveRelaciones($cheque_cuenta_corriente) {
		$this->saveRelacionesBase($cheque_cuenta_corriente,false);
	}

	public function saveRelacionesBase($cheque_cuenta_corriente,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setcheque_cuenta_corriente($cheque_cuenta_corriente);

			if(cheque_cuenta_corriente_logic_add::validarSaveRelaciones($cheque_cuenta_corriente,$this)) {

				cheque_cuenta_corriente_logic_add::updateRelacionesToSave($cheque_cuenta_corriente,$this);

				if(($this->cheque_cuenta_corriente->getIsNew() || $this->cheque_cuenta_corriente->getIsChanged()) && !$this->cheque_cuenta_corriente->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->cheque_cuenta_corriente->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				cheque_cuenta_corriente_logic_add::updateRelacionesToSaveAfter($cheque_cuenta_corriente,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $cheque_cuenta_corrientes,cheque_cuenta_corriente_param_return $cheque_cuenta_corrienteParameterGeneral) : cheque_cuenta_corriente_param_return {
		$cheque_cuenta_corrienteReturnGeneral=new cheque_cuenta_corriente_param_return();
	
		 try {	
			
			if($this->cheque_cuenta_corrienteLogicAdditional==null) {
				$this->cheque_cuenta_corrienteLogicAdditional=new cheque_cuenta_corriente_logic_add();
			}
			
			$this->cheque_cuenta_corrienteLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$cheque_cuenta_corrientes,$cheque_cuenta_corrienteParameterGeneral,$cheque_cuenta_corrienteReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $cheque_cuenta_corrienteReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $cheque_cuenta_corrientes,cheque_cuenta_corriente_param_return $cheque_cuenta_corrienteParameterGeneral) : cheque_cuenta_corriente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cheque_cuenta_corrienteReturnGeneral=new cheque_cuenta_corriente_param_return();
	
			
			if($this->cheque_cuenta_corrienteLogicAdditional==null) {
				$this->cheque_cuenta_corrienteLogicAdditional=new cheque_cuenta_corriente_logic_add();
			}
			
			$this->cheque_cuenta_corrienteLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$cheque_cuenta_corrientes,$cheque_cuenta_corrienteParameterGeneral,$cheque_cuenta_corrienteReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $cheque_cuenta_corrienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cheque_cuenta_corrientes,cheque_cuenta_corriente $cheque_cuenta_corriente,cheque_cuenta_corriente_param_return $cheque_cuenta_corrienteParameterGeneral,bool $isEsNuevocheque_cuenta_corriente,array $clases) : cheque_cuenta_corriente_param_return {
		 try {	
			$cheque_cuenta_corrienteReturnGeneral=new cheque_cuenta_corriente_param_return();
	
			$cheque_cuenta_corrienteReturnGeneral->setcheque_cuenta_corriente($cheque_cuenta_corriente);
			$cheque_cuenta_corrienteReturnGeneral->setcheque_cuenta_corrientes($cheque_cuenta_corrientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cheque_cuenta_corrienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->cheque_cuenta_corrienteLogicAdditional==null) {
				$this->cheque_cuenta_corrienteLogicAdditional=new cheque_cuenta_corriente_logic_add();
			}
			
			$cheque_cuenta_corrienteReturnGeneral=$this->cheque_cuenta_corrienteLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cheque_cuenta_corrientes,$cheque_cuenta_corriente,$cheque_cuenta_corrienteParameterGeneral,$cheque_cuenta_corrienteReturnGeneral,$isEsNuevocheque_cuenta_corriente,$clases);
			
			/*cheque_cuenta_corrienteLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cheque_cuenta_corrientes,$cheque_cuenta_corriente,$cheque_cuenta_corrienteParameterGeneral,$cheque_cuenta_corrienteReturnGeneral,$isEsNuevocheque_cuenta_corriente,$clases);*/
			
			return $cheque_cuenta_corrienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cheque_cuenta_corrientes,cheque_cuenta_corriente $cheque_cuenta_corriente,cheque_cuenta_corriente_param_return $cheque_cuenta_corrienteParameterGeneral,bool $isEsNuevocheque_cuenta_corriente,array $clases) : cheque_cuenta_corriente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cheque_cuenta_corrienteReturnGeneral=new cheque_cuenta_corriente_param_return();
	
			$cheque_cuenta_corrienteReturnGeneral->setcheque_cuenta_corriente($cheque_cuenta_corriente);
			$cheque_cuenta_corrienteReturnGeneral->setcheque_cuenta_corrientes($cheque_cuenta_corrientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cheque_cuenta_corrienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->cheque_cuenta_corrienteLogicAdditional==null) {
				$this->cheque_cuenta_corrienteLogicAdditional=new cheque_cuenta_corriente_logic_add();
			}
			
			$cheque_cuenta_corrienteReturnGeneral=$this->cheque_cuenta_corrienteLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cheque_cuenta_corrientes,$cheque_cuenta_corriente,$cheque_cuenta_corrienteParameterGeneral,$cheque_cuenta_corrienteReturnGeneral,$isEsNuevocheque_cuenta_corriente,$clases);
			
			/*cheque_cuenta_corrienteLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cheque_cuenta_corrientes,$cheque_cuenta_corriente,$cheque_cuenta_corrienteParameterGeneral,$cheque_cuenta_corrienteReturnGeneral,$isEsNuevocheque_cuenta_corriente,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $cheque_cuenta_corrienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cheque_cuenta_corrientes,cheque_cuenta_corriente $cheque_cuenta_corriente,cheque_cuenta_corriente_param_return $cheque_cuenta_corrienteParameterGeneral,bool $isEsNuevocheque_cuenta_corriente,array $clases) : cheque_cuenta_corriente_param_return {
		 try {	
			$cheque_cuenta_corrienteReturnGeneral=new cheque_cuenta_corriente_param_return();
	
			$cheque_cuenta_corrienteReturnGeneral->setcheque_cuenta_corriente($cheque_cuenta_corriente);
			$cheque_cuenta_corrienteReturnGeneral->setcheque_cuenta_corrientes($cheque_cuenta_corrientes);
			
			
			
			if($this->cheque_cuenta_corrienteLogicAdditional==null) {
				$this->cheque_cuenta_corrienteLogicAdditional=new cheque_cuenta_corriente_logic_add();
			}
			
			$cheque_cuenta_corrienteReturnGeneral=$this->cheque_cuenta_corrienteLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cheque_cuenta_corrientes,$cheque_cuenta_corriente,$cheque_cuenta_corrienteParameterGeneral,$cheque_cuenta_corrienteReturnGeneral,$isEsNuevocheque_cuenta_corriente,$clases);
			
			/*cheque_cuenta_corrienteLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cheque_cuenta_corrientes,$cheque_cuenta_corriente,$cheque_cuenta_corrienteParameterGeneral,$cheque_cuenta_corrienteReturnGeneral,$isEsNuevocheque_cuenta_corriente,$clases);*/
			
			return $cheque_cuenta_corrienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cheque_cuenta_corrientes,cheque_cuenta_corriente $cheque_cuenta_corriente,cheque_cuenta_corriente_param_return $cheque_cuenta_corrienteParameterGeneral,bool $isEsNuevocheque_cuenta_corriente,array $clases) : cheque_cuenta_corriente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cheque_cuenta_corrienteReturnGeneral=new cheque_cuenta_corriente_param_return();
	
			$cheque_cuenta_corrienteReturnGeneral->setcheque_cuenta_corriente($cheque_cuenta_corriente);
			$cheque_cuenta_corrienteReturnGeneral->setcheque_cuenta_corrientes($cheque_cuenta_corrientes);
			
			
			if($this->cheque_cuenta_corrienteLogicAdditional==null) {
				$this->cheque_cuenta_corrienteLogicAdditional=new cheque_cuenta_corriente_logic_add();
			}
			
			$cheque_cuenta_corrienteReturnGeneral=$this->cheque_cuenta_corrienteLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cheque_cuenta_corrientes,$cheque_cuenta_corriente,$cheque_cuenta_corrienteParameterGeneral,$cheque_cuenta_corrienteReturnGeneral,$isEsNuevocheque_cuenta_corriente,$clases);
			
			/*cheque_cuenta_corrienteLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cheque_cuenta_corrientes,$cheque_cuenta_corriente,$cheque_cuenta_corrienteParameterGeneral,$cheque_cuenta_corrienteReturnGeneral,$isEsNuevocheque_cuenta_corriente,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $cheque_cuenta_corrienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,cheque_cuenta_corriente $cheque_cuenta_corriente,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,cheque_cuenta_corriente $cheque_cuenta_corriente,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		cheque_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(cheque_cuenta_corriente $cheque_cuenta_corriente,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			cheque_cuenta_corriente_logic_add::updatecheque_cuenta_corrienteToGet($this->cheque_cuenta_corriente);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cheque_cuenta_corriente->setempresa($this->cheque_cuenta_corrienteDataAccess->getempresa($this->connexion,$cheque_cuenta_corriente));
		$cheque_cuenta_corriente->setsucursal($this->cheque_cuenta_corrienteDataAccess->getsucursal($this->connexion,$cheque_cuenta_corriente));
		$cheque_cuenta_corriente->setejercicio($this->cheque_cuenta_corrienteDataAccess->getejercicio($this->connexion,$cheque_cuenta_corriente));
		$cheque_cuenta_corriente->setperiodo($this->cheque_cuenta_corrienteDataAccess->getperiodo($this->connexion,$cheque_cuenta_corriente));
		$cheque_cuenta_corriente->setusuario($this->cheque_cuenta_corrienteDataAccess->getusuario($this->connexion,$cheque_cuenta_corriente));
		$cheque_cuenta_corriente->setcuenta_corriente($this->cheque_cuenta_corrienteDataAccess->getcuenta_corriente($this->connexion,$cheque_cuenta_corriente));
		$cheque_cuenta_corriente->setcategoria_cheque($this->cheque_cuenta_corrienteDataAccess->getcategoria_cheque($this->connexion,$cheque_cuenta_corriente));
		$cheque_cuenta_corriente->setcliente($this->cheque_cuenta_corrienteDataAccess->getcliente($this->connexion,$cheque_cuenta_corriente));
		$cheque_cuenta_corriente->setproveedor($this->cheque_cuenta_corrienteDataAccess->getproveedor($this->connexion,$cheque_cuenta_corriente));
		$cheque_cuenta_corriente->setbeneficiario_ocacional_cheque($this->cheque_cuenta_corrienteDataAccess->getbeneficiario_ocacional_cheque($this->connexion,$cheque_cuenta_corriente));
		$cheque_cuenta_corriente->setestado_deposito_retiro($this->cheque_cuenta_corrienteDataAccess->getestado_deposito_retiro($this->connexion,$cheque_cuenta_corriente));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cheque_cuenta_corriente->setempresa($this->cheque_cuenta_corrienteDataAccess->getempresa($this->connexion,$cheque_cuenta_corriente));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$cheque_cuenta_corriente->setsucursal($this->cheque_cuenta_corrienteDataAccess->getsucursal($this->connexion,$cheque_cuenta_corriente));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$cheque_cuenta_corriente->setejercicio($this->cheque_cuenta_corrienteDataAccess->getejercicio($this->connexion,$cheque_cuenta_corriente));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$cheque_cuenta_corriente->setperiodo($this->cheque_cuenta_corrienteDataAccess->getperiodo($this->connexion,$cheque_cuenta_corriente));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$cheque_cuenta_corriente->setusuario($this->cheque_cuenta_corrienteDataAccess->getusuario($this->connexion,$cheque_cuenta_corriente));
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				$cheque_cuenta_corriente->setcuenta_corriente($this->cheque_cuenta_corrienteDataAccess->getcuenta_corriente($this->connexion,$cheque_cuenta_corriente));
				continue;
			}

			if($clas->clas==categoria_cheque::$class.'') {
				$cheque_cuenta_corriente->setcategoria_cheque($this->cheque_cuenta_corrienteDataAccess->getcategoria_cheque($this->connexion,$cheque_cuenta_corriente));
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$cheque_cuenta_corriente->setcliente($this->cheque_cuenta_corrienteDataAccess->getcliente($this->connexion,$cheque_cuenta_corriente));
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$cheque_cuenta_corriente->setproveedor($this->cheque_cuenta_corrienteDataAccess->getproveedor($this->connexion,$cheque_cuenta_corriente));
				continue;
			}

			if($clas->clas==beneficiario_ocacional_cheque::$class.'') {
				$cheque_cuenta_corriente->setbeneficiario_ocacional_cheque($this->cheque_cuenta_corrienteDataAccess->getbeneficiario_ocacional_cheque($this->connexion,$cheque_cuenta_corriente));
				continue;
			}

			if($clas->clas==estado_deposito_retiro::$class.'') {
				$cheque_cuenta_corriente->setestado_deposito_retiro($this->cheque_cuenta_corrienteDataAccess->getestado_deposito_retiro($this->connexion,$cheque_cuenta_corriente));
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
			$cheque_cuenta_corriente->setempresa($this->cheque_cuenta_corrienteDataAccess->getempresa($this->connexion,$cheque_cuenta_corriente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cheque_cuenta_corriente->setsucursal($this->cheque_cuenta_corrienteDataAccess->getsucursal($this->connexion,$cheque_cuenta_corriente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cheque_cuenta_corriente->setejercicio($this->cheque_cuenta_corrienteDataAccess->getejercicio($this->connexion,$cheque_cuenta_corriente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cheque_cuenta_corriente->setperiodo($this->cheque_cuenta_corrienteDataAccess->getperiodo($this->connexion,$cheque_cuenta_corriente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cheque_cuenta_corriente->setusuario($this->cheque_cuenta_corrienteDataAccess->getusuario($this->connexion,$cheque_cuenta_corriente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cheque_cuenta_corriente->setcuenta_corriente($this->cheque_cuenta_corrienteDataAccess->getcuenta_corriente($this->connexion,$cheque_cuenta_corriente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==categoria_cheque::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cheque_cuenta_corriente->setcategoria_cheque($this->cheque_cuenta_corrienteDataAccess->getcategoria_cheque($this->connexion,$cheque_cuenta_corriente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cheque_cuenta_corriente->setcliente($this->cheque_cuenta_corrienteDataAccess->getcliente($this->connexion,$cheque_cuenta_corriente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cheque_cuenta_corriente->setproveedor($this->cheque_cuenta_corrienteDataAccess->getproveedor($this->connexion,$cheque_cuenta_corriente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==beneficiario_ocacional_cheque::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cheque_cuenta_corriente->setbeneficiario_ocacional_cheque($this->cheque_cuenta_corrienteDataAccess->getbeneficiario_ocacional_cheque($this->connexion,$cheque_cuenta_corriente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estado_deposito_retiro::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cheque_cuenta_corriente->setestado_deposito_retiro($this->cheque_cuenta_corrienteDataAccess->getestado_deposito_retiro($this->connexion,$cheque_cuenta_corriente));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cheque_cuenta_corriente->setempresa($this->cheque_cuenta_corrienteDataAccess->getempresa($this->connexion,$cheque_cuenta_corriente));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($cheque_cuenta_corriente->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$cheque_cuenta_corriente->setsucursal($this->cheque_cuenta_corrienteDataAccess->getsucursal($this->connexion,$cheque_cuenta_corriente));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($cheque_cuenta_corriente->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$cheque_cuenta_corriente->setejercicio($this->cheque_cuenta_corrienteDataAccess->getejercicio($this->connexion,$cheque_cuenta_corriente));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($cheque_cuenta_corriente->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$cheque_cuenta_corriente->setperiodo($this->cheque_cuenta_corrienteDataAccess->getperiodo($this->connexion,$cheque_cuenta_corriente));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($cheque_cuenta_corriente->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$cheque_cuenta_corriente->setusuario($this->cheque_cuenta_corrienteDataAccess->getusuario($this->connexion,$cheque_cuenta_corriente));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($cheque_cuenta_corriente->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$cheque_cuenta_corriente->setcuenta_corriente($this->cheque_cuenta_corrienteDataAccess->getcuenta_corriente($this->connexion,$cheque_cuenta_corriente));
		$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
		$cuenta_corrienteLogic->deepLoad($cheque_cuenta_corriente->getcuenta_corriente(),$isDeep,$deepLoadType,$clases);
				
		$cheque_cuenta_corriente->setcategoria_cheque($this->cheque_cuenta_corrienteDataAccess->getcategoria_cheque($this->connexion,$cheque_cuenta_corriente));
		$categoria_chequeLogic= new categoria_cheque_logic($this->connexion);
		$categoria_chequeLogic->deepLoad($cheque_cuenta_corriente->getcategoria_cheque(),$isDeep,$deepLoadType,$clases);
				
		$cheque_cuenta_corriente->setcliente($this->cheque_cuenta_corrienteDataAccess->getcliente($this->connexion,$cheque_cuenta_corriente));
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepLoad($cheque_cuenta_corriente->getcliente(),$isDeep,$deepLoadType,$clases);
				
		$cheque_cuenta_corriente->setproveedor($this->cheque_cuenta_corrienteDataAccess->getproveedor($this->connexion,$cheque_cuenta_corriente));
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepLoad($cheque_cuenta_corriente->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		$cheque_cuenta_corriente->setbeneficiario_ocacional_cheque($this->cheque_cuenta_corrienteDataAccess->getbeneficiario_ocacional_cheque($this->connexion,$cheque_cuenta_corriente));
		$beneficiario_ocacional_chequeLogic= new beneficiario_ocacional_cheque_logic($this->connexion);
		$beneficiario_ocacional_chequeLogic->deepLoad($cheque_cuenta_corriente->getbeneficiario_ocacional_cheque(),$isDeep,$deepLoadType,$clases);
				
		$cheque_cuenta_corriente->setestado_deposito_retiro($this->cheque_cuenta_corrienteDataAccess->getestado_deposito_retiro($this->connexion,$cheque_cuenta_corriente));
		$estado_deposito_retiroLogic= new estado_deposito_retiro_logic($this->connexion);
		$estado_deposito_retiroLogic->deepLoad($cheque_cuenta_corriente->getestado_deposito_retiro(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cheque_cuenta_corriente->setempresa($this->cheque_cuenta_corrienteDataAccess->getempresa($this->connexion,$cheque_cuenta_corriente));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($cheque_cuenta_corriente->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$cheque_cuenta_corriente->setsucursal($this->cheque_cuenta_corrienteDataAccess->getsucursal($this->connexion,$cheque_cuenta_corriente));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($cheque_cuenta_corriente->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$cheque_cuenta_corriente->setejercicio($this->cheque_cuenta_corrienteDataAccess->getejercicio($this->connexion,$cheque_cuenta_corriente));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($cheque_cuenta_corriente->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$cheque_cuenta_corriente->setperiodo($this->cheque_cuenta_corrienteDataAccess->getperiodo($this->connexion,$cheque_cuenta_corriente));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($cheque_cuenta_corriente->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$cheque_cuenta_corriente->setusuario($this->cheque_cuenta_corrienteDataAccess->getusuario($this->connexion,$cheque_cuenta_corriente));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($cheque_cuenta_corriente->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				$cheque_cuenta_corriente->setcuenta_corriente($this->cheque_cuenta_corrienteDataAccess->getcuenta_corriente($this->connexion,$cheque_cuenta_corriente));
				$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
				$cuenta_corrienteLogic->deepLoad($cheque_cuenta_corriente->getcuenta_corriente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==categoria_cheque::$class.'') {
				$cheque_cuenta_corriente->setcategoria_cheque($this->cheque_cuenta_corrienteDataAccess->getcategoria_cheque($this->connexion,$cheque_cuenta_corriente));
				$categoria_chequeLogic= new categoria_cheque_logic($this->connexion);
				$categoria_chequeLogic->deepLoad($cheque_cuenta_corriente->getcategoria_cheque(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$cheque_cuenta_corriente->setcliente($this->cheque_cuenta_corrienteDataAccess->getcliente($this->connexion,$cheque_cuenta_corriente));
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($cheque_cuenta_corriente->getcliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$cheque_cuenta_corriente->setproveedor($this->cheque_cuenta_corrienteDataAccess->getproveedor($this->connexion,$cheque_cuenta_corriente));
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($cheque_cuenta_corriente->getproveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==beneficiario_ocacional_cheque::$class.'') {
				$cheque_cuenta_corriente->setbeneficiario_ocacional_cheque($this->cheque_cuenta_corrienteDataAccess->getbeneficiario_ocacional_cheque($this->connexion,$cheque_cuenta_corriente));
				$beneficiario_ocacional_chequeLogic= new beneficiario_ocacional_cheque_logic($this->connexion);
				$beneficiario_ocacional_chequeLogic->deepLoad($cheque_cuenta_corriente->getbeneficiario_ocacional_cheque(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==estado_deposito_retiro::$class.'') {
				$cheque_cuenta_corriente->setestado_deposito_retiro($this->cheque_cuenta_corrienteDataAccess->getestado_deposito_retiro($this->connexion,$cheque_cuenta_corriente));
				$estado_deposito_retiroLogic= new estado_deposito_retiro_logic($this->connexion);
				$estado_deposito_retiroLogic->deepLoad($cheque_cuenta_corriente->getestado_deposito_retiro(),$isDeep,$deepLoadType,$clases);				
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
			$cheque_cuenta_corriente->setempresa($this->cheque_cuenta_corrienteDataAccess->getempresa($this->connexion,$cheque_cuenta_corriente));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($cheque_cuenta_corriente->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cheque_cuenta_corriente->setsucursal($this->cheque_cuenta_corrienteDataAccess->getsucursal($this->connexion,$cheque_cuenta_corriente));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($cheque_cuenta_corriente->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cheque_cuenta_corriente->setejercicio($this->cheque_cuenta_corrienteDataAccess->getejercicio($this->connexion,$cheque_cuenta_corriente));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($cheque_cuenta_corriente->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cheque_cuenta_corriente->setperiodo($this->cheque_cuenta_corrienteDataAccess->getperiodo($this->connexion,$cheque_cuenta_corriente));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($cheque_cuenta_corriente->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cheque_cuenta_corriente->setusuario($this->cheque_cuenta_corrienteDataAccess->getusuario($this->connexion,$cheque_cuenta_corriente));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($cheque_cuenta_corriente->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cheque_cuenta_corriente->setcuenta_corriente($this->cheque_cuenta_corrienteDataAccess->getcuenta_corriente($this->connexion,$cheque_cuenta_corriente));
			$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
			$cuenta_corrienteLogic->deepLoad($cheque_cuenta_corriente->getcuenta_corriente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==categoria_cheque::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cheque_cuenta_corriente->setcategoria_cheque($this->cheque_cuenta_corrienteDataAccess->getcategoria_cheque($this->connexion,$cheque_cuenta_corriente));
			$categoria_chequeLogic= new categoria_cheque_logic($this->connexion);
			$categoria_chequeLogic->deepLoad($cheque_cuenta_corriente->getcategoria_cheque(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cheque_cuenta_corriente->setcliente($this->cheque_cuenta_corrienteDataAccess->getcliente($this->connexion,$cheque_cuenta_corriente));
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($cheque_cuenta_corriente->getcliente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cheque_cuenta_corriente->setproveedor($this->cheque_cuenta_corrienteDataAccess->getproveedor($this->connexion,$cheque_cuenta_corriente));
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($cheque_cuenta_corriente->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==beneficiario_ocacional_cheque::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cheque_cuenta_corriente->setbeneficiario_ocacional_cheque($this->cheque_cuenta_corrienteDataAccess->getbeneficiario_ocacional_cheque($this->connexion,$cheque_cuenta_corriente));
			$beneficiario_ocacional_chequeLogic= new beneficiario_ocacional_cheque_logic($this->connexion);
			$beneficiario_ocacional_chequeLogic->deepLoad($cheque_cuenta_corriente->getbeneficiario_ocacional_cheque(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado_deposito_retiro::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cheque_cuenta_corriente->setestado_deposito_retiro($this->cheque_cuenta_corrienteDataAccess->getestado_deposito_retiro($this->connexion,$cheque_cuenta_corriente));
			$estado_deposito_retiroLogic= new estado_deposito_retiro_logic($this->connexion);
			$estado_deposito_retiroLogic->deepLoad($cheque_cuenta_corriente->getestado_deposito_retiro(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(cheque_cuenta_corriente $cheque_cuenta_corriente,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			cheque_cuenta_corriente_logic_add::updatecheque_cuenta_corrienteToSave($this->cheque_cuenta_corriente);			
			
			if(!$paraDeleteCascade) {				
				cheque_cuenta_corriente_data::save($cheque_cuenta_corriente, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($cheque_cuenta_corriente->getempresa(),$this->connexion);
		sucursal_data::save($cheque_cuenta_corriente->getsucursal(),$this->connexion);
		ejercicio_data::save($cheque_cuenta_corriente->getejercicio(),$this->connexion);
		periodo_data::save($cheque_cuenta_corriente->getperiodo(),$this->connexion);
		usuario_data::save($cheque_cuenta_corriente->getusuario(),$this->connexion);
		cuenta_corriente_data::save($cheque_cuenta_corriente->getcuenta_corriente(),$this->connexion);
		categoria_cheque_data::save($cheque_cuenta_corriente->getcategoria_cheque(),$this->connexion);
		cliente_data::save($cheque_cuenta_corriente->getcliente(),$this->connexion);
		proveedor_data::save($cheque_cuenta_corriente->getproveedor(),$this->connexion);
		beneficiario_ocacional_cheque_data::save($cheque_cuenta_corriente->getbeneficiario_ocacional_cheque(),$this->connexion);
		estado_deposito_retiro_data::save($cheque_cuenta_corriente->getestado_deposito_retiro(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cheque_cuenta_corriente->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($cheque_cuenta_corriente->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($cheque_cuenta_corriente->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($cheque_cuenta_corriente->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($cheque_cuenta_corriente->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				cuenta_corriente_data::save($cheque_cuenta_corriente->getcuenta_corriente(),$this->connexion);
				continue;
			}

			if($clas->clas==categoria_cheque::$class.'') {
				categoria_cheque_data::save($cheque_cuenta_corriente->getcategoria_cheque(),$this->connexion);
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($cheque_cuenta_corriente->getcliente(),$this->connexion);
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($cheque_cuenta_corriente->getproveedor(),$this->connexion);
				continue;
			}

			if($clas->clas==beneficiario_ocacional_cheque::$class.'') {
				beneficiario_ocacional_cheque_data::save($cheque_cuenta_corriente->getbeneficiario_ocacional_cheque(),$this->connexion);
				continue;
			}

			if($clas->clas==estado_deposito_retiro::$class.'') {
				estado_deposito_retiro_data::save($cheque_cuenta_corriente->getestado_deposito_retiro(),$this->connexion);
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
			empresa_data::save($cheque_cuenta_corriente->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($cheque_cuenta_corriente->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($cheque_cuenta_corriente->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($cheque_cuenta_corriente->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($cheque_cuenta_corriente->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_corriente_data::save($cheque_cuenta_corriente->getcuenta_corriente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==categoria_cheque::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			categoria_cheque_data::save($cheque_cuenta_corriente->getcategoria_cheque(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($cheque_cuenta_corriente->getcliente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($cheque_cuenta_corriente->getproveedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==beneficiario_ocacional_cheque::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			beneficiario_ocacional_cheque_data::save($cheque_cuenta_corriente->getbeneficiario_ocacional_cheque(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado_deposito_retiro::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_deposito_retiro_data::save($cheque_cuenta_corriente->getestado_deposito_retiro(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($cheque_cuenta_corriente->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($cheque_cuenta_corriente->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($cheque_cuenta_corriente->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($cheque_cuenta_corriente->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($cheque_cuenta_corriente->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($cheque_cuenta_corriente->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($cheque_cuenta_corriente->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($cheque_cuenta_corriente->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($cheque_cuenta_corriente->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($cheque_cuenta_corriente->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_corriente_data::save($cheque_cuenta_corriente->getcuenta_corriente(),$this->connexion);
		$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
		$cuenta_corrienteLogic->deepSave($cheque_cuenta_corriente->getcuenta_corriente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		categoria_cheque_data::save($cheque_cuenta_corriente->getcategoria_cheque(),$this->connexion);
		$categoria_chequeLogic= new categoria_cheque_logic($this->connexion);
		$categoria_chequeLogic->deepSave($cheque_cuenta_corriente->getcategoria_cheque(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cliente_data::save($cheque_cuenta_corriente->getcliente(),$this->connexion);
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepSave($cheque_cuenta_corriente->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		proveedor_data::save($cheque_cuenta_corriente->getproveedor(),$this->connexion);
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepSave($cheque_cuenta_corriente->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		beneficiario_ocacional_cheque_data::save($cheque_cuenta_corriente->getbeneficiario_ocacional_cheque(),$this->connexion);
		$beneficiario_ocacional_chequeLogic= new beneficiario_ocacional_cheque_logic($this->connexion);
		$beneficiario_ocacional_chequeLogic->deepSave($cheque_cuenta_corriente->getbeneficiario_ocacional_cheque(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		estado_deposito_retiro_data::save($cheque_cuenta_corriente->getestado_deposito_retiro(),$this->connexion);
		$estado_deposito_retiroLogic= new estado_deposito_retiro_logic($this->connexion);
		$estado_deposito_retiroLogic->deepSave($cheque_cuenta_corriente->getestado_deposito_retiro(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cheque_cuenta_corriente->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($cheque_cuenta_corriente->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($cheque_cuenta_corriente->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($cheque_cuenta_corriente->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($cheque_cuenta_corriente->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($cheque_cuenta_corriente->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($cheque_cuenta_corriente->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($cheque_cuenta_corriente->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($cheque_cuenta_corriente->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($cheque_cuenta_corriente->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				cuenta_corriente_data::save($cheque_cuenta_corriente->getcuenta_corriente(),$this->connexion);
				$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
				$cuenta_corrienteLogic->deepSave($cheque_cuenta_corriente->getcuenta_corriente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==categoria_cheque::$class.'') {
				categoria_cheque_data::save($cheque_cuenta_corriente->getcategoria_cheque(),$this->connexion);
				$categoria_chequeLogic= new categoria_cheque_logic($this->connexion);
				$categoria_chequeLogic->deepSave($cheque_cuenta_corriente->getcategoria_cheque(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($cheque_cuenta_corriente->getcliente(),$this->connexion);
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepSave($cheque_cuenta_corriente->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($cheque_cuenta_corriente->getproveedor(),$this->connexion);
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepSave($cheque_cuenta_corriente->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==beneficiario_ocacional_cheque::$class.'') {
				beneficiario_ocacional_cheque_data::save($cheque_cuenta_corriente->getbeneficiario_ocacional_cheque(),$this->connexion);
				$beneficiario_ocacional_chequeLogic= new beneficiario_ocacional_cheque_logic($this->connexion);
				$beneficiario_ocacional_chequeLogic->deepSave($cheque_cuenta_corriente->getbeneficiario_ocacional_cheque(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==estado_deposito_retiro::$class.'') {
				estado_deposito_retiro_data::save($cheque_cuenta_corriente->getestado_deposito_retiro(),$this->connexion);
				$estado_deposito_retiroLogic= new estado_deposito_retiro_logic($this->connexion);
				$estado_deposito_retiroLogic->deepSave($cheque_cuenta_corriente->getestado_deposito_retiro(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			empresa_data::save($cheque_cuenta_corriente->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($cheque_cuenta_corriente->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($cheque_cuenta_corriente->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($cheque_cuenta_corriente->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($cheque_cuenta_corriente->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($cheque_cuenta_corriente->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($cheque_cuenta_corriente->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($cheque_cuenta_corriente->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($cheque_cuenta_corriente->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($cheque_cuenta_corriente->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_corriente_data::save($cheque_cuenta_corriente->getcuenta_corriente(),$this->connexion);
			$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
			$cuenta_corrienteLogic->deepSave($cheque_cuenta_corriente->getcuenta_corriente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==categoria_cheque::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			categoria_cheque_data::save($cheque_cuenta_corriente->getcategoria_cheque(),$this->connexion);
			$categoria_chequeLogic= new categoria_cheque_logic($this->connexion);
			$categoria_chequeLogic->deepSave($cheque_cuenta_corriente->getcategoria_cheque(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($cheque_cuenta_corriente->getcliente(),$this->connexion);
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepSave($cheque_cuenta_corriente->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($cheque_cuenta_corriente->getproveedor(),$this->connexion);
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepSave($cheque_cuenta_corriente->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==beneficiario_ocacional_cheque::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			beneficiario_ocacional_cheque_data::save($cheque_cuenta_corriente->getbeneficiario_ocacional_cheque(),$this->connexion);
			$beneficiario_ocacional_chequeLogic= new beneficiario_ocacional_cheque_logic($this->connexion);
			$beneficiario_ocacional_chequeLogic->deepSave($cheque_cuenta_corriente->getbeneficiario_ocacional_cheque(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado_deposito_retiro::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_deposito_retiro_data::save($cheque_cuenta_corriente->getestado_deposito_retiro(),$this->connexion);
			$estado_deposito_retiroLogic= new estado_deposito_retiro_logic($this->connexion);
			$estado_deposito_retiroLogic->deepSave($cheque_cuenta_corriente->getestado_deposito_retiro(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				cheque_cuenta_corriente_data::save($cheque_cuenta_corriente, $this->connexion);
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
			
			$this->deepLoad($this->cheque_cuenta_corriente,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->cheque_cuenta_corrientes as $cheque_cuenta_corriente) {
				$this->deepLoad($cheque_cuenta_corriente,$isDeep,$deepLoadType,$clases);
								
				cheque_cuenta_corriente_util::refrescarFKDescripciones($this->cheque_cuenta_corrientes);
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
			
			foreach($this->cheque_cuenta_corrientes as $cheque_cuenta_corriente) {
				$this->deepLoad($cheque_cuenta_corriente,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->cheque_cuenta_corriente,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->cheque_cuenta_corrientes as $cheque_cuenta_corriente) {
				$this->deepSave($cheque_cuenta_corriente,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->cheque_cuenta_corrientes as $cheque_cuenta_corriente) {
				$this->deepSave($cheque_cuenta_corriente,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(cuenta_corriente::$class);
				$classes[]=new Classe(categoria_cheque::$class);
				$classes[]=new Classe(cliente::$class);
				$classes[]=new Classe(proveedor::$class);
				$classes[]=new Classe(beneficiario_ocacional_cheque::$class);
				$classes[]=new Classe(estado_deposito_retiro::$class);
				
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
					if($clas->clas==cuenta_corriente::$class) {
						$classes[]=new Classe(cuenta_corriente::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==categoria_cheque::$class) {
						$classes[]=new Classe(categoria_cheque::$class);
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
					if($clas->clas==beneficiario_ocacional_cheque::$class) {
						$classes[]=new Classe(beneficiario_ocacional_cheque::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==estado_deposito_retiro::$class) {
						$classes[]=new Classe(estado_deposito_retiro::$class);
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
					if($clas->clas==categoria_cheque::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(categoria_cheque::$class);
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
					if($clas->clas==beneficiario_ocacional_cheque::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(beneficiario_ocacional_cheque::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==estado_deposito_retiro::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(estado_deposito_retiro::$class);
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
	
	
	
	
	
	
	
	public function getcheque_cuenta_corriente() : ?cheque_cuenta_corriente {	
		/*
		cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGet($this->cheque_cuenta_corriente,$this->datosCliente);
		cheque_cuenta_corriente_logic_add::updatecheque_cuenta_corrienteToGet($this->cheque_cuenta_corriente);
		*/
			
		return $this->cheque_cuenta_corriente;
	}
		
	public function setcheque_cuenta_corriente(cheque_cuenta_corriente $newcheque_cuenta_corriente) {
		$this->cheque_cuenta_corriente = $newcheque_cuenta_corriente;
	}
	
	public function getcheque_cuenta_corrientes() : array {		
		/*
		cheque_cuenta_corriente_logic_add::checkcheque_cuenta_corrienteToGets($this->cheque_cuenta_corrientes,$this->datosCliente);
		
		foreach ($this->cheque_cuenta_corrientes as $cheque_cuenta_corrienteLocal ) {
			cheque_cuenta_corriente_logic_add::updatecheque_cuenta_corrienteToGet($cheque_cuenta_corrienteLocal);
		}
		*/
		
		return $this->cheque_cuenta_corrientes;
	}
	
	public function setcheque_cuenta_corrientes(array $newcheque_cuenta_corrientes) {
		$this->cheque_cuenta_corrientes = $newcheque_cuenta_corrientes;
	}
	
	public function getcheque_cuenta_corrienteDataAccess() : cheque_cuenta_corriente_data {
		return $this->cheque_cuenta_corrienteDataAccess;
	}
	
	public function setcheque_cuenta_corrienteDataAccess(cheque_cuenta_corriente_data $newcheque_cuenta_corrienteDataAccess) {
		$this->cheque_cuenta_corrienteDataAccess = $newcheque_cuenta_corrienteDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        cheque_cuenta_corriente_carga::$CONTROLLER;;        
		
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
