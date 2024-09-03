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

namespace com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\util\credito_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\util\credito_cuenta_cobrar_param_return;

use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\presentation\session\credito_cuenta_cobrar_session;

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

use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\util\credito_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\business\entity\credito_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\business\data\credito_cuenta_cobrar_data;

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

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\data\cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\logic\cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_util;

use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\entity\forma_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\data\forma_pago_cliente_data;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\logic\forma_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\data\estado_data;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL


//REL DETALLES




class credito_cuenta_cobrar_logic  extends GeneralEntityLogic implements credito_cuenta_cobrar_logicI {	
	/*GENERAL*/
	public credito_cuenta_cobrar_data $credito_cuenta_cobrarDataAccess;
	public ?credito_cuenta_cobrar_logic_add $credito_cuenta_cobrarLogicAdditional=null;
	public ?credito_cuenta_cobrar $credito_cuenta_cobrar;
	public array $credito_cuenta_cobrars;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->credito_cuenta_cobrarDataAccess = new credito_cuenta_cobrar_data();			
			$this->credito_cuenta_cobrars = array();
			$this->credito_cuenta_cobrar = new credito_cuenta_cobrar();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->credito_cuenta_cobrarLogicAdditional = new credito_cuenta_cobrar_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->credito_cuenta_cobrarLogicAdditional==null) {
			$this->credito_cuenta_cobrarLogicAdditional=new credito_cuenta_cobrar_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->credito_cuenta_cobrarDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->credito_cuenta_cobrarDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->credito_cuenta_cobrarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->credito_cuenta_cobrarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->credito_cuenta_cobrars = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->credito_cuenta_cobrars = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);
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
		$this->credito_cuenta_cobrar = new credito_cuenta_cobrar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->credito_cuenta_cobrar=$this->credito_cuenta_cobrarDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->credito_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				credito_cuenta_cobrar_util::refrescarFKDescripcion($this->credito_cuenta_cobrar);
			}
						
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGet($this->credito_cuenta_cobrar,$this->datosCliente);
			credito_cuenta_cobrar_logic_add::updatecredito_cuenta_cobrarToGet($this->credito_cuenta_cobrar);
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
		$this->credito_cuenta_cobrar = new  credito_cuenta_cobrar();
		  		  
        try {		
			$this->credito_cuenta_cobrar=$this->credito_cuenta_cobrarDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->credito_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				credito_cuenta_cobrar_util::refrescarFKDescripcion($this->credito_cuenta_cobrar);
			}
			
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGet($this->credito_cuenta_cobrar,$this->datosCliente);
			credito_cuenta_cobrar_logic_add::updatecredito_cuenta_cobrarToGet($this->credito_cuenta_cobrar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?credito_cuenta_cobrar {
		$credito_cuenta_cobrarLogic = new  credito_cuenta_cobrar_logic();
		  		  
        try {		
			$credito_cuenta_cobrarLogic->setConnexion($connexion);			
			$credito_cuenta_cobrarLogic->getEntity($id);			
			return $credito_cuenta_cobrarLogic->getcredito_cuenta_cobrar();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->credito_cuenta_cobrar = new  credito_cuenta_cobrar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->credito_cuenta_cobrar=$this->credito_cuenta_cobrarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->credito_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				credito_cuenta_cobrar_util::refrescarFKDescripcion($this->credito_cuenta_cobrar);
			}
			
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGet($this->credito_cuenta_cobrar,$this->datosCliente);
			credito_cuenta_cobrar_logic_add::updatecredito_cuenta_cobrarToGet($this->credito_cuenta_cobrar);
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
		$this->credito_cuenta_cobrar = new  credito_cuenta_cobrar();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->credito_cuenta_cobrar=$this->credito_cuenta_cobrarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->credito_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				credito_cuenta_cobrar_util::refrescarFKDescripcion($this->credito_cuenta_cobrar);
			}
			
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGet($this->credito_cuenta_cobrar,$this->datosCliente);
			credito_cuenta_cobrar_logic_add::updatecredito_cuenta_cobrarToGet($this->credito_cuenta_cobrar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?credito_cuenta_cobrar {
		$credito_cuenta_cobrarLogic = new  credito_cuenta_cobrar_logic();
		  		  
        try {		
			$credito_cuenta_cobrarLogic->setConnexion($connexion);			
			$credito_cuenta_cobrarLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $credito_cuenta_cobrarLogic->getcredito_cuenta_cobrar();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->credito_cuenta_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);			
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
		$this->credito_cuenta_cobrars = array();
		  		  
        try {			
			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->credito_cuenta_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);
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
		$this->credito_cuenta_cobrars = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$credito_cuenta_cobrarLogic = new  credito_cuenta_cobrar_logic();
		  		  
        try {		
			$credito_cuenta_cobrarLogic->setConnexion($connexion);			
			$credito_cuenta_cobrarLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $credito_cuenta_cobrarLogic->getcredito_cuenta_cobrars();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->credito_cuenta_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);
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
		$this->credito_cuenta_cobrars = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->credito_cuenta_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);
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
		$this->credito_cuenta_cobrars = array();
		  		  
        try {			
			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}	
			
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->credito_cuenta_cobrars = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);
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
		$this->credito_cuenta_cobrars = array();
		  		  
        try {		
			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_Idcuenta_cobrarWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cuenta_cobrar) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_cobrar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_cobrar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_cobrar,credito_cuenta_cobrar_util::$ID_CUENTA_COBRAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_cobrar);

			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta_cobrar(string $strFinalQuery,Pagination $pagination,int $id_cuenta_cobrar) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_cobrar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_cobrar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_cobrar,credito_cuenta_cobrar_util::$ID_CUENTA_COBRAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_cobrar);

			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);
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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,credito_cuenta_cobrar_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,credito_cuenta_cobrar_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,credito_cuenta_cobrar_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,credito_cuenta_cobrar_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);
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
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,credito_cuenta_cobrar_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);

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
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,credito_cuenta_cobrar_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idforma_pago_clienteWithConnection(string $strFinalQuery,Pagination $pagination,int $id_forma_pago_cliente) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_forma_pago_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_forma_pago_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_forma_pago_cliente,credito_cuenta_cobrar_util::$ID_FORMA_PAGO_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_forma_pago_cliente);

			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idforma_pago_cliente(string $strFinalQuery,Pagination $pagination,int $id_forma_pago_cliente) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_forma_pago_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_forma_pago_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_forma_pago_cliente,credito_cuenta_cobrar_util::$ID_FORMA_PAGO_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_forma_pago_cliente);

			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);
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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,credito_cuenta_cobrar_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);

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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,credito_cuenta_cobrar_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);
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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,credito_cuenta_cobrar_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);

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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,credito_cuenta_cobrar_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,credito_cuenta_cobrar_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,credito_cuenta_cobrar_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->credito_cuenta_cobrars=$this->credito_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->credito_cuenta_cobrars);
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
						
			//credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToSave($this->credito_cuenta_cobrar,$this->datosCliente,$this->connexion);	       
			credito_cuenta_cobrar_logic_add::updatecredito_cuenta_cobrarToSave($this->credito_cuenta_cobrar);			
			credito_cuenta_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->credito_cuenta_cobrar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->credito_cuenta_cobrarLogicAdditional->checkGeneralEntityToSave($this,$this->credito_cuenta_cobrar,$this->datosCliente,$this->connexion);
			
			
			credito_cuenta_cobrar_data::save($this->credito_cuenta_cobrar, $this->connexion);	    	       	 				
			//credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToSaveAfter($this->credito_cuenta_cobrar,$this->datosCliente,$this->connexion);			
			$this->credito_cuenta_cobrarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->credito_cuenta_cobrar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->credito_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->credito_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				credito_cuenta_cobrar_util::refrescarFKDescripcion($this->credito_cuenta_cobrar);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->credito_cuenta_cobrar->getIsDeleted()) {
				$this->credito_cuenta_cobrar=null;
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
						
			/*credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToSave($this->credito_cuenta_cobrar,$this->datosCliente,$this->connexion);*/	        
			credito_cuenta_cobrar_logic_add::updatecredito_cuenta_cobrarToSave($this->credito_cuenta_cobrar);			
			$this->credito_cuenta_cobrarLogicAdditional->checkGeneralEntityToSave($this,$this->credito_cuenta_cobrar,$this->datosCliente,$this->connexion);			
			credito_cuenta_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->credito_cuenta_cobrar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			credito_cuenta_cobrar_data::save($this->credito_cuenta_cobrar, $this->connexion);	    	       	 						
			/*credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToSaveAfter($this->credito_cuenta_cobrar,$this->datosCliente,$this->connexion);*/			
			$this->credito_cuenta_cobrarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->credito_cuenta_cobrar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->credito_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->credito_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				credito_cuenta_cobrar_util::refrescarFKDescripcion($this->credito_cuenta_cobrar);				
			}
			
			if($this->credito_cuenta_cobrar->getIsDeleted()) {
				$this->credito_cuenta_cobrar=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(credito_cuenta_cobrar $credito_cuenta_cobrar,Connexion $connexion)  {
		$credito_cuenta_cobrarLogic = new  credito_cuenta_cobrar_logic();		  		  
        try {		
			$credito_cuenta_cobrarLogic->setConnexion($connexion);			
			$credito_cuenta_cobrarLogic->setcredito_cuenta_cobrar($credito_cuenta_cobrar);			
			$credito_cuenta_cobrarLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToSaves($this->credito_cuenta_cobrars,$this->datosCliente,$this->connexion);*/	        	
			$this->credito_cuenta_cobrarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->credito_cuenta_cobrars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->credito_cuenta_cobrars as $credito_cuenta_cobrarLocal) {				
								
				credito_cuenta_cobrar_logic_add::updatecredito_cuenta_cobrarToSave($credito_cuenta_cobrarLocal);	        	
				credito_cuenta_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$credito_cuenta_cobrarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				credito_cuenta_cobrar_data::save($credito_cuenta_cobrarLocal, $this->connexion);				
			}
			
			/*credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToSavesAfter($this->credito_cuenta_cobrars,$this->datosCliente,$this->connexion);*/			
			$this->credito_cuenta_cobrarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->credito_cuenta_cobrars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
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
			/*credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToSaves($this->credito_cuenta_cobrars,$this->datosCliente,$this->connexion);*/			
			$this->credito_cuenta_cobrarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->credito_cuenta_cobrars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->credito_cuenta_cobrars as $credito_cuenta_cobrarLocal) {				
								
				credito_cuenta_cobrar_logic_add::updatecredito_cuenta_cobrarToSave($credito_cuenta_cobrarLocal);	        	
				credito_cuenta_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$credito_cuenta_cobrarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				credito_cuenta_cobrar_data::save($credito_cuenta_cobrarLocal, $this->connexion);				
			}			
			
			/*credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToSavesAfter($this->credito_cuenta_cobrars,$this->datosCliente,$this->connexion);*/			
			$this->credito_cuenta_cobrarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->credito_cuenta_cobrars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $credito_cuenta_cobrars,Connexion $connexion)  {
		$credito_cuenta_cobrarLogic = new  credito_cuenta_cobrar_logic();
		  		  
        try {		
			$credito_cuenta_cobrarLogic->setConnexion($connexion);			
			$credito_cuenta_cobrarLogic->setcredito_cuenta_cobrars($credito_cuenta_cobrars);			
			$credito_cuenta_cobrarLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$credito_cuenta_cobrarsAux=array();
		
		foreach($this->credito_cuenta_cobrars as $credito_cuenta_cobrar) {
			if($credito_cuenta_cobrar->getIsDeleted()==false) {
				$credito_cuenta_cobrarsAux[]=$credito_cuenta_cobrar;
			}
		}
		
		$this->credito_cuenta_cobrars=$credito_cuenta_cobrarsAux;
	}
	
	public function updateToGetsAuxiliar(array &$credito_cuenta_cobrars) {
		if($this->credito_cuenta_cobrarLogicAdditional==null) {
			$this->credito_cuenta_cobrarLogicAdditional=new credito_cuenta_cobrar_logic_add();
		}
		
		
		$this->credito_cuenta_cobrarLogicAdditional->updateToGets($credito_cuenta_cobrars,$this);					
		$this->credito_cuenta_cobrarLogicAdditional->updateToGetsReferencia($credito_cuenta_cobrars,$this);			
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->credito_cuenta_cobrars as $credito_cuenta_cobrar) {
				
				$credito_cuenta_cobrar->setid_empresa_Descripcion(credito_cuenta_cobrar_util::getempresaDescripcion($credito_cuenta_cobrar->getempresa()));
				$credito_cuenta_cobrar->setid_sucursal_Descripcion(credito_cuenta_cobrar_util::getsucursalDescripcion($credito_cuenta_cobrar->getsucursal()));
				$credito_cuenta_cobrar->setid_ejercicio_Descripcion(credito_cuenta_cobrar_util::getejercicioDescripcion($credito_cuenta_cobrar->getejercicio()));
				$credito_cuenta_cobrar->setid_periodo_Descripcion(credito_cuenta_cobrar_util::getperiodoDescripcion($credito_cuenta_cobrar->getperiodo()));
				$credito_cuenta_cobrar->setid_usuario_Descripcion(credito_cuenta_cobrar_util::getusuarioDescripcion($credito_cuenta_cobrar->getusuario()));
				$credito_cuenta_cobrar->setid_cuenta_cobrar_Descripcion(credito_cuenta_cobrar_util::getcuenta_cobrarDescripcion($credito_cuenta_cobrar->getcuenta_cobrar()));
				$credito_cuenta_cobrar->setid_forma_pago_cliente_Descripcion(credito_cuenta_cobrar_util::getforma_pago_clienteDescripcion($credito_cuenta_cobrar->getforma_pago_cliente()));
				$credito_cuenta_cobrar->setid_estado_Descripcion(credito_cuenta_cobrar_util::getestadoDescripcion($credito_cuenta_cobrar->getestado()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$credito_cuenta_cobrar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$credito_cuenta_cobrar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$credito_cuenta_cobrar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$credito_cuenta_cobrarForeignKey=new credito_cuenta_cobrar_param_return();//credito_cuenta_cobrarForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_cobrar',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_cobrarsFK($this->connexion,$strRecargarFkQuery,$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_forma_pago_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombosforma_pago_clientesFK($this->connexion,$strRecargarFkQuery,$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado',$strRecargarFkTipos,',')) {
				$this->cargarCombosestadosFK($this->connexion,$strRecargarFkQuery,$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_cobrar',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_cobrarsFK($this->connexion,' where id=-1 ',$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_forma_pago_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosforma_pago_clientesFK($this->connexion,' where id=-1 ',$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_estado',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosestadosFK($this->connexion,' where id=-1 ',$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $credito_cuenta_cobrarForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$credito_cuenta_cobrarForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($credito_cuenta_cobrar_session==null) {
			$credito_cuenta_cobrar_session=new credito_cuenta_cobrar_session();
		}
		
		if($credito_cuenta_cobrar_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($credito_cuenta_cobrarForeignKey->idempresaDefaultFK==0) {
					$credito_cuenta_cobrarForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$credito_cuenta_cobrarForeignKey->empresasFK[$empresaLocal->getId()]=credito_cuenta_cobrar_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($credito_cuenta_cobrar_session->bigidempresaActual!=null && $credito_cuenta_cobrar_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($credito_cuenta_cobrar_session->bigidempresaActual);//WithConnection

				$credito_cuenta_cobrarForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=credito_cuenta_cobrar_util::getempresaDescripcion($empresaLogic->getempresa());
				$credito_cuenta_cobrarForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$credito_cuenta_cobrarForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($credito_cuenta_cobrar_session==null) {
			$credito_cuenta_cobrar_session=new credito_cuenta_cobrar_session();
		}
		
		if($credito_cuenta_cobrar_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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
				if($credito_cuenta_cobrarForeignKey->idsucursalDefaultFK==0) {
					$credito_cuenta_cobrarForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$credito_cuenta_cobrarForeignKey->sucursalsFK[$sucursalLocal->getId()]=credito_cuenta_cobrar_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($credito_cuenta_cobrar_session->bigidsucursalActual!=null && $credito_cuenta_cobrar_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($credito_cuenta_cobrar_session->bigidsucursalActual);//WithConnection

				$credito_cuenta_cobrarForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=credito_cuenta_cobrar_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$credito_cuenta_cobrarForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$credito_cuenta_cobrarForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($credito_cuenta_cobrar_session==null) {
			$credito_cuenta_cobrar_session=new credito_cuenta_cobrar_session();
		}
		
		if($credito_cuenta_cobrar_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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
				if($credito_cuenta_cobrarForeignKey->idejercicioDefaultFK==0) {
					$credito_cuenta_cobrarForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$credito_cuenta_cobrarForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=credito_cuenta_cobrar_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($credito_cuenta_cobrar_session->bigidejercicioActual!=null && $credito_cuenta_cobrar_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($credito_cuenta_cobrar_session->bigidejercicioActual);//WithConnection

				$credito_cuenta_cobrarForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=credito_cuenta_cobrar_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$credito_cuenta_cobrarForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$credito_cuenta_cobrarForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($credito_cuenta_cobrar_session==null) {
			$credito_cuenta_cobrar_session=new credito_cuenta_cobrar_session();
		}
		
		if($credito_cuenta_cobrar_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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
				if($credito_cuenta_cobrarForeignKey->idperiodoDefaultFK==0) {
					$credito_cuenta_cobrarForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$credito_cuenta_cobrarForeignKey->periodosFK[$periodoLocal->getId()]=credito_cuenta_cobrar_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($credito_cuenta_cobrar_session->bigidperiodoActual!=null && $credito_cuenta_cobrar_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($credito_cuenta_cobrar_session->bigidperiodoActual);//WithConnection

				$credito_cuenta_cobrarForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=credito_cuenta_cobrar_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$credito_cuenta_cobrarForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$credito_cuenta_cobrarForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($credito_cuenta_cobrar_session==null) {
			$credito_cuenta_cobrar_session=new credito_cuenta_cobrar_session();
		}
		
		if($credito_cuenta_cobrar_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($credito_cuenta_cobrarForeignKey->idusuarioDefaultFK==0) {
					$credito_cuenta_cobrarForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$credito_cuenta_cobrarForeignKey->usuariosFK[$usuarioLocal->getId()]=credito_cuenta_cobrar_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($credito_cuenta_cobrar_session->bigidusuarioActual!=null && $credito_cuenta_cobrar_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($credito_cuenta_cobrar_session->bigidusuarioActual);//WithConnection

				$credito_cuenta_cobrarForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=credito_cuenta_cobrar_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$credito_cuenta_cobrarForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarComboscuenta_cobrarsFK($connexion=null,$strRecargarFkQuery='',$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuenta_cobrarLogic= new cuenta_cobrar_logic();
		$pagination= new Pagination();
		$credito_cuenta_cobrarForeignKey->cuenta_cobrarsFK=array();

		$cuenta_cobrarLogic->setConnexion($connexion);
		$cuenta_cobrarLogic->getcuenta_cobrarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($credito_cuenta_cobrar_session==null) {
			$credito_cuenta_cobrar_session=new credito_cuenta_cobrar_session();
		}
		
		if($credito_cuenta_cobrar_session->bitBusquedaDesdeFKSesioncuenta_cobrar!=true) {
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
				if($credito_cuenta_cobrarForeignKey->idcuenta_cobrarDefaultFK==0) {
					$credito_cuenta_cobrarForeignKey->idcuenta_cobrarDefaultFK=$cuenta_cobrarLocal->getId();
				}

				$credito_cuenta_cobrarForeignKey->cuenta_cobrarsFK[$cuenta_cobrarLocal->getId()]=credito_cuenta_cobrar_util::getcuenta_cobrarDescripcion($cuenta_cobrarLocal);
			}

		} else {

			if($credito_cuenta_cobrar_session->bigidcuenta_cobrarActual!=null && $credito_cuenta_cobrar_session->bigidcuenta_cobrarActual > 0) {
				$cuenta_cobrarLogic->getEntity($credito_cuenta_cobrar_session->bigidcuenta_cobrarActual);//WithConnection

				$credito_cuenta_cobrarForeignKey->cuenta_cobrarsFK[$cuenta_cobrarLogic->getcuenta_cobrar()->getId()]=credito_cuenta_cobrar_util::getcuenta_cobrarDescripcion($cuenta_cobrarLogic->getcuenta_cobrar());
				$credito_cuenta_cobrarForeignKey->idcuenta_cobrarDefaultFK=$cuenta_cobrarLogic->getcuenta_cobrar()->getId();
			}
		}
	}

	public function cargarCombosforma_pago_clientesFK($connexion=null,$strRecargarFkQuery='',$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$forma_pago_clienteLogic= new forma_pago_cliente_logic();
		$pagination= new Pagination();
		$credito_cuenta_cobrarForeignKey->forma_pago_clientesFK=array();

		$forma_pago_clienteLogic->setConnexion($connexion);
		$forma_pago_clienteLogic->getforma_pago_clienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($credito_cuenta_cobrar_session==null) {
			$credito_cuenta_cobrar_session=new credito_cuenta_cobrar_session();
		}
		
		if($credito_cuenta_cobrar_session->bitBusquedaDesdeFKSesionforma_pago_cliente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=forma_pago_cliente_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalforma_pago_cliente=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalforma_pago_cliente=Funciones::GetFinalQueryAppend($finalQueryGlobalforma_pago_cliente, '');
				$finalQueryGlobalforma_pago_cliente.=forma_pago_cliente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalforma_pago_cliente.$strRecargarFkQuery;		

				$forma_pago_clienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($forma_pago_clienteLogic->getforma_pago_clientes() as $forma_pago_clienteLocal ) {
				if($credito_cuenta_cobrarForeignKey->idforma_pago_clienteDefaultFK==0) {
					$credito_cuenta_cobrarForeignKey->idforma_pago_clienteDefaultFK=$forma_pago_clienteLocal->getId();
				}

				$credito_cuenta_cobrarForeignKey->forma_pago_clientesFK[$forma_pago_clienteLocal->getId()]=credito_cuenta_cobrar_util::getforma_pago_clienteDescripcion($forma_pago_clienteLocal);
			}

		} else {

			if($credito_cuenta_cobrar_session->bigidforma_pago_clienteActual!=null && $credito_cuenta_cobrar_session->bigidforma_pago_clienteActual > 0) {
				$forma_pago_clienteLogic->getEntity($credito_cuenta_cobrar_session->bigidforma_pago_clienteActual);//WithConnection

				$credito_cuenta_cobrarForeignKey->forma_pago_clientesFK[$forma_pago_clienteLogic->getforma_pago_cliente()->getId()]=credito_cuenta_cobrar_util::getforma_pago_clienteDescripcion($forma_pago_clienteLogic->getforma_pago_cliente());
				$credito_cuenta_cobrarForeignKey->idforma_pago_clienteDefaultFK=$forma_pago_clienteLogic->getforma_pago_cliente()->getId();
			}
		}
	}

	public function cargarCombosestadosFK($connexion=null,$strRecargarFkQuery='',$credito_cuenta_cobrarForeignKey,$credito_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$estadoLogic= new estado_logic();
		$pagination= new Pagination();
		$credito_cuenta_cobrarForeignKey->estadosFK=array();

		$estadoLogic->setConnexion($connexion);
		$estadoLogic->getestadoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($credito_cuenta_cobrar_session==null) {
			$credito_cuenta_cobrar_session=new credito_cuenta_cobrar_session();
		}
		
		if($credito_cuenta_cobrar_session->bitBusquedaDesdeFKSesionestado!=true) {
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
				if($credito_cuenta_cobrarForeignKey->idestadoDefaultFK==0) {
					$credito_cuenta_cobrarForeignKey->idestadoDefaultFK=$estadoLocal->getId();
				}

				$credito_cuenta_cobrarForeignKey->estadosFK[$estadoLocal->getId()]=credito_cuenta_cobrar_util::getestadoDescripcion($estadoLocal);
			}

		} else {

			if($credito_cuenta_cobrar_session->bigidestadoActual!=null && $credito_cuenta_cobrar_session->bigidestadoActual > 0) {
				$estadoLogic->getEntity($credito_cuenta_cobrar_session->bigidestadoActual);//WithConnection

				$credito_cuenta_cobrarForeignKey->estadosFK[$estadoLogic->getestado()->getId()]=credito_cuenta_cobrar_util::getestadoDescripcion($estadoLogic->getestado());
				$credito_cuenta_cobrarForeignKey->idestadoDefaultFK=$estadoLogic->getestado()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($credito_cuenta_cobrar) {
		$this->saveRelacionesBase($credito_cuenta_cobrar,true);
	}

	public function saveRelaciones($credito_cuenta_cobrar) {
		$this->saveRelacionesBase($credito_cuenta_cobrar,false);
	}

	public function saveRelacionesBase($credito_cuenta_cobrar,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setcredito_cuenta_cobrar($credito_cuenta_cobrar);

			if(credito_cuenta_cobrar_logic_add::validarSaveRelaciones($credito_cuenta_cobrar,$this)) {

				credito_cuenta_cobrar_logic_add::updateRelacionesToSave($credito_cuenta_cobrar,$this);

				if(($this->credito_cuenta_cobrar->getIsNew() || $this->credito_cuenta_cobrar->getIsChanged()) && !$this->credito_cuenta_cobrar->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->credito_cuenta_cobrar->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				credito_cuenta_cobrar_logic_add::updateRelacionesToSaveAfter($credito_cuenta_cobrar,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $credito_cuenta_cobrars,credito_cuenta_cobrar_param_return $credito_cuenta_cobrarParameterGeneral) : credito_cuenta_cobrar_param_return {
		$credito_cuenta_cobrarReturnGeneral=new credito_cuenta_cobrar_param_return();
	
		 try {	
			
			if($this->credito_cuenta_cobrarLogicAdditional==null) {
				$this->credito_cuenta_cobrarLogicAdditional=new credito_cuenta_cobrar_logic_add();
			}
			
			$this->credito_cuenta_cobrarLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$credito_cuenta_cobrars,$credito_cuenta_cobrarParameterGeneral,$credito_cuenta_cobrarReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $credito_cuenta_cobrarReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $credito_cuenta_cobrars,credito_cuenta_cobrar_param_return $credito_cuenta_cobrarParameterGeneral) : credito_cuenta_cobrar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$credito_cuenta_cobrarReturnGeneral=new credito_cuenta_cobrar_param_return();
	
			
			if($this->credito_cuenta_cobrarLogicAdditional==null) {
				$this->credito_cuenta_cobrarLogicAdditional=new credito_cuenta_cobrar_logic_add();
			}
			
			$this->credito_cuenta_cobrarLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$credito_cuenta_cobrars,$credito_cuenta_cobrarParameterGeneral,$credito_cuenta_cobrarReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $credito_cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $credito_cuenta_cobrars,credito_cuenta_cobrar $credito_cuenta_cobrar,credito_cuenta_cobrar_param_return $credito_cuenta_cobrarParameterGeneral,bool $isEsNuevocredito_cuenta_cobrar,array $clases) : credito_cuenta_cobrar_param_return {
		 try {	
			$credito_cuenta_cobrarReturnGeneral=new credito_cuenta_cobrar_param_return();
	
			$credito_cuenta_cobrarReturnGeneral->setcredito_cuenta_cobrar($credito_cuenta_cobrar);
			$credito_cuenta_cobrarReturnGeneral->setcredito_cuenta_cobrars($credito_cuenta_cobrars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$credito_cuenta_cobrarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->credito_cuenta_cobrarLogicAdditional==null) {
				$this->credito_cuenta_cobrarLogicAdditional=new credito_cuenta_cobrar_logic_add();
			}
			
			$credito_cuenta_cobrarReturnGeneral=$this->credito_cuenta_cobrarLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$credito_cuenta_cobrars,$credito_cuenta_cobrar,$credito_cuenta_cobrarParameterGeneral,$credito_cuenta_cobrarReturnGeneral,$isEsNuevocredito_cuenta_cobrar,$clases);
			
			/*credito_cuenta_cobrarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$credito_cuenta_cobrars,$credito_cuenta_cobrar,$credito_cuenta_cobrarParameterGeneral,$credito_cuenta_cobrarReturnGeneral,$isEsNuevocredito_cuenta_cobrar,$clases);*/
			
			return $credito_cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $credito_cuenta_cobrars,credito_cuenta_cobrar $credito_cuenta_cobrar,credito_cuenta_cobrar_param_return $credito_cuenta_cobrarParameterGeneral,bool $isEsNuevocredito_cuenta_cobrar,array $clases) : credito_cuenta_cobrar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$credito_cuenta_cobrarReturnGeneral=new credito_cuenta_cobrar_param_return();
	
			$credito_cuenta_cobrarReturnGeneral->setcredito_cuenta_cobrar($credito_cuenta_cobrar);
			$credito_cuenta_cobrarReturnGeneral->setcredito_cuenta_cobrars($credito_cuenta_cobrars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$credito_cuenta_cobrarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->credito_cuenta_cobrarLogicAdditional==null) {
				$this->credito_cuenta_cobrarLogicAdditional=new credito_cuenta_cobrar_logic_add();
			}
			
			$credito_cuenta_cobrarReturnGeneral=$this->credito_cuenta_cobrarLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$credito_cuenta_cobrars,$credito_cuenta_cobrar,$credito_cuenta_cobrarParameterGeneral,$credito_cuenta_cobrarReturnGeneral,$isEsNuevocredito_cuenta_cobrar,$clases);
			
			/*credito_cuenta_cobrarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$credito_cuenta_cobrars,$credito_cuenta_cobrar,$credito_cuenta_cobrarParameterGeneral,$credito_cuenta_cobrarReturnGeneral,$isEsNuevocredito_cuenta_cobrar,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $credito_cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $credito_cuenta_cobrars,credito_cuenta_cobrar $credito_cuenta_cobrar,credito_cuenta_cobrar_param_return $credito_cuenta_cobrarParameterGeneral,bool $isEsNuevocredito_cuenta_cobrar,array $clases) : credito_cuenta_cobrar_param_return {
		 try {	
			$credito_cuenta_cobrarReturnGeneral=new credito_cuenta_cobrar_param_return();
	
			$credito_cuenta_cobrarReturnGeneral->setcredito_cuenta_cobrar($credito_cuenta_cobrar);
			$credito_cuenta_cobrarReturnGeneral->setcredito_cuenta_cobrars($credito_cuenta_cobrars);
			
			
			
			if($this->credito_cuenta_cobrarLogicAdditional==null) {
				$this->credito_cuenta_cobrarLogicAdditional=new credito_cuenta_cobrar_logic_add();
			}
			
			$credito_cuenta_cobrarReturnGeneral=$this->credito_cuenta_cobrarLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$credito_cuenta_cobrars,$credito_cuenta_cobrar,$credito_cuenta_cobrarParameterGeneral,$credito_cuenta_cobrarReturnGeneral,$isEsNuevocredito_cuenta_cobrar,$clases);
			
			/*credito_cuenta_cobrarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$credito_cuenta_cobrars,$credito_cuenta_cobrar,$credito_cuenta_cobrarParameterGeneral,$credito_cuenta_cobrarReturnGeneral,$isEsNuevocredito_cuenta_cobrar,$clases);*/
			
			return $credito_cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $credito_cuenta_cobrars,credito_cuenta_cobrar $credito_cuenta_cobrar,credito_cuenta_cobrar_param_return $credito_cuenta_cobrarParameterGeneral,bool $isEsNuevocredito_cuenta_cobrar,array $clases) : credito_cuenta_cobrar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$credito_cuenta_cobrarReturnGeneral=new credito_cuenta_cobrar_param_return();
	
			$credito_cuenta_cobrarReturnGeneral->setcredito_cuenta_cobrar($credito_cuenta_cobrar);
			$credito_cuenta_cobrarReturnGeneral->setcredito_cuenta_cobrars($credito_cuenta_cobrars);
			
			
			if($this->credito_cuenta_cobrarLogicAdditional==null) {
				$this->credito_cuenta_cobrarLogicAdditional=new credito_cuenta_cobrar_logic_add();
			}
			
			$credito_cuenta_cobrarReturnGeneral=$this->credito_cuenta_cobrarLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$credito_cuenta_cobrars,$credito_cuenta_cobrar,$credito_cuenta_cobrarParameterGeneral,$credito_cuenta_cobrarReturnGeneral,$isEsNuevocredito_cuenta_cobrar,$clases);
			
			/*credito_cuenta_cobrarLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$credito_cuenta_cobrars,$credito_cuenta_cobrar,$credito_cuenta_cobrarParameterGeneral,$credito_cuenta_cobrarReturnGeneral,$isEsNuevocredito_cuenta_cobrar,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $credito_cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,credito_cuenta_cobrar $credito_cuenta_cobrar,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,credito_cuenta_cobrar $credito_cuenta_cobrar,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		credito_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(credito_cuenta_cobrar $credito_cuenta_cobrar,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			credito_cuenta_cobrar_logic_add::updatecredito_cuenta_cobrarToGet($this->credito_cuenta_cobrar);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$credito_cuenta_cobrar->setempresa($this->credito_cuenta_cobrarDataAccess->getempresa($this->connexion,$credito_cuenta_cobrar));
		$credito_cuenta_cobrar->setsucursal($this->credito_cuenta_cobrarDataAccess->getsucursal($this->connexion,$credito_cuenta_cobrar));
		$credito_cuenta_cobrar->setejercicio($this->credito_cuenta_cobrarDataAccess->getejercicio($this->connexion,$credito_cuenta_cobrar));
		$credito_cuenta_cobrar->setperiodo($this->credito_cuenta_cobrarDataAccess->getperiodo($this->connexion,$credito_cuenta_cobrar));
		$credito_cuenta_cobrar->setusuario($this->credito_cuenta_cobrarDataAccess->getusuario($this->connexion,$credito_cuenta_cobrar));
		$credito_cuenta_cobrar->setcuenta_cobrar($this->credito_cuenta_cobrarDataAccess->getcuenta_cobrar($this->connexion,$credito_cuenta_cobrar));
		$credito_cuenta_cobrar->setforma_pago_cliente($this->credito_cuenta_cobrarDataAccess->getforma_pago_cliente($this->connexion,$credito_cuenta_cobrar));
		$credito_cuenta_cobrar->setestado($this->credito_cuenta_cobrarDataAccess->getestado($this->connexion,$credito_cuenta_cobrar));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$credito_cuenta_cobrar->setempresa($this->credito_cuenta_cobrarDataAccess->getempresa($this->connexion,$credito_cuenta_cobrar));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$credito_cuenta_cobrar->setsucursal($this->credito_cuenta_cobrarDataAccess->getsucursal($this->connexion,$credito_cuenta_cobrar));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$credito_cuenta_cobrar->setejercicio($this->credito_cuenta_cobrarDataAccess->getejercicio($this->connexion,$credito_cuenta_cobrar));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$credito_cuenta_cobrar->setperiodo($this->credito_cuenta_cobrarDataAccess->getperiodo($this->connexion,$credito_cuenta_cobrar));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$credito_cuenta_cobrar->setusuario($this->credito_cuenta_cobrarDataAccess->getusuario($this->connexion,$credito_cuenta_cobrar));
				continue;
			}

			if($clas->clas==cuenta_cobrar::$class.'') {
				$credito_cuenta_cobrar->setcuenta_cobrar($this->credito_cuenta_cobrarDataAccess->getcuenta_cobrar($this->connexion,$credito_cuenta_cobrar));
				continue;
			}

			if($clas->clas==forma_pago_cliente::$class.'') {
				$credito_cuenta_cobrar->setforma_pago_cliente($this->credito_cuenta_cobrarDataAccess->getforma_pago_cliente($this->connexion,$credito_cuenta_cobrar));
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$credito_cuenta_cobrar->setestado($this->credito_cuenta_cobrarDataAccess->getestado($this->connexion,$credito_cuenta_cobrar));
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
			$credito_cuenta_cobrar->setempresa($this->credito_cuenta_cobrarDataAccess->getempresa($this->connexion,$credito_cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$credito_cuenta_cobrar->setsucursal($this->credito_cuenta_cobrarDataAccess->getsucursal($this->connexion,$credito_cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$credito_cuenta_cobrar->setejercicio($this->credito_cuenta_cobrarDataAccess->getejercicio($this->connexion,$credito_cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$credito_cuenta_cobrar->setperiodo($this->credito_cuenta_cobrarDataAccess->getperiodo($this->connexion,$credito_cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$credito_cuenta_cobrar->setusuario($this->credito_cuenta_cobrarDataAccess->getusuario($this->connexion,$credito_cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$credito_cuenta_cobrar->setcuenta_cobrar($this->credito_cuenta_cobrarDataAccess->getcuenta_cobrar($this->connexion,$credito_cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==forma_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$credito_cuenta_cobrar->setforma_pago_cliente($this->credito_cuenta_cobrarDataAccess->getforma_pago_cliente($this->connexion,$credito_cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$credito_cuenta_cobrar->setestado($this->credito_cuenta_cobrarDataAccess->getestado($this->connexion,$credito_cuenta_cobrar));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$credito_cuenta_cobrar->setempresa($this->credito_cuenta_cobrarDataAccess->getempresa($this->connexion,$credito_cuenta_cobrar));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($credito_cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$credito_cuenta_cobrar->setsucursal($this->credito_cuenta_cobrarDataAccess->getsucursal($this->connexion,$credito_cuenta_cobrar));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($credito_cuenta_cobrar->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$credito_cuenta_cobrar->setejercicio($this->credito_cuenta_cobrarDataAccess->getejercicio($this->connexion,$credito_cuenta_cobrar));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($credito_cuenta_cobrar->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$credito_cuenta_cobrar->setperiodo($this->credito_cuenta_cobrarDataAccess->getperiodo($this->connexion,$credito_cuenta_cobrar));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($credito_cuenta_cobrar->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$credito_cuenta_cobrar->setusuario($this->credito_cuenta_cobrarDataAccess->getusuario($this->connexion,$credito_cuenta_cobrar));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($credito_cuenta_cobrar->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$credito_cuenta_cobrar->setcuenta_cobrar($this->credito_cuenta_cobrarDataAccess->getcuenta_cobrar($this->connexion,$credito_cuenta_cobrar));
		$cuenta_cobrarLogic= new cuenta_cobrar_logic($this->connexion);
		$cuenta_cobrarLogic->deepLoad($credito_cuenta_cobrar->getcuenta_cobrar(),$isDeep,$deepLoadType,$clases);
				
		$credito_cuenta_cobrar->setforma_pago_cliente($this->credito_cuenta_cobrarDataAccess->getforma_pago_cliente($this->connexion,$credito_cuenta_cobrar));
		$forma_pago_clienteLogic= new forma_pago_cliente_logic($this->connexion);
		$forma_pago_clienteLogic->deepLoad($credito_cuenta_cobrar->getforma_pago_cliente(),$isDeep,$deepLoadType,$clases);
				
		$credito_cuenta_cobrar->setestado($this->credito_cuenta_cobrarDataAccess->getestado($this->connexion,$credito_cuenta_cobrar));
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepLoad($credito_cuenta_cobrar->getestado(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$credito_cuenta_cobrar->setempresa($this->credito_cuenta_cobrarDataAccess->getempresa($this->connexion,$credito_cuenta_cobrar));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($credito_cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$credito_cuenta_cobrar->setsucursal($this->credito_cuenta_cobrarDataAccess->getsucursal($this->connexion,$credito_cuenta_cobrar));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($credito_cuenta_cobrar->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$credito_cuenta_cobrar->setejercicio($this->credito_cuenta_cobrarDataAccess->getejercicio($this->connexion,$credito_cuenta_cobrar));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($credito_cuenta_cobrar->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$credito_cuenta_cobrar->setperiodo($this->credito_cuenta_cobrarDataAccess->getperiodo($this->connexion,$credito_cuenta_cobrar));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($credito_cuenta_cobrar->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$credito_cuenta_cobrar->setusuario($this->credito_cuenta_cobrarDataAccess->getusuario($this->connexion,$credito_cuenta_cobrar));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($credito_cuenta_cobrar->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta_cobrar::$class.'') {
				$credito_cuenta_cobrar->setcuenta_cobrar($this->credito_cuenta_cobrarDataAccess->getcuenta_cobrar($this->connexion,$credito_cuenta_cobrar));
				$cuenta_cobrarLogic= new cuenta_cobrar_logic($this->connexion);
				$cuenta_cobrarLogic->deepLoad($credito_cuenta_cobrar->getcuenta_cobrar(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==forma_pago_cliente::$class.'') {
				$credito_cuenta_cobrar->setforma_pago_cliente($this->credito_cuenta_cobrarDataAccess->getforma_pago_cliente($this->connexion,$credito_cuenta_cobrar));
				$forma_pago_clienteLogic= new forma_pago_cliente_logic($this->connexion);
				$forma_pago_clienteLogic->deepLoad($credito_cuenta_cobrar->getforma_pago_cliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$credito_cuenta_cobrar->setestado($this->credito_cuenta_cobrarDataAccess->getestado($this->connexion,$credito_cuenta_cobrar));
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepLoad($credito_cuenta_cobrar->getestado(),$isDeep,$deepLoadType,$clases);				
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
			$credito_cuenta_cobrar->setempresa($this->credito_cuenta_cobrarDataAccess->getempresa($this->connexion,$credito_cuenta_cobrar));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($credito_cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$credito_cuenta_cobrar->setsucursal($this->credito_cuenta_cobrarDataAccess->getsucursal($this->connexion,$credito_cuenta_cobrar));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($credito_cuenta_cobrar->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$credito_cuenta_cobrar->setejercicio($this->credito_cuenta_cobrarDataAccess->getejercicio($this->connexion,$credito_cuenta_cobrar));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($credito_cuenta_cobrar->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$credito_cuenta_cobrar->setperiodo($this->credito_cuenta_cobrarDataAccess->getperiodo($this->connexion,$credito_cuenta_cobrar));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($credito_cuenta_cobrar->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$credito_cuenta_cobrar->setusuario($this->credito_cuenta_cobrarDataAccess->getusuario($this->connexion,$credito_cuenta_cobrar));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($credito_cuenta_cobrar->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$credito_cuenta_cobrar->setcuenta_cobrar($this->credito_cuenta_cobrarDataAccess->getcuenta_cobrar($this->connexion,$credito_cuenta_cobrar));
			$cuenta_cobrarLogic= new cuenta_cobrar_logic($this->connexion);
			$cuenta_cobrarLogic->deepLoad($credito_cuenta_cobrar->getcuenta_cobrar(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==forma_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$credito_cuenta_cobrar->setforma_pago_cliente($this->credito_cuenta_cobrarDataAccess->getforma_pago_cliente($this->connexion,$credito_cuenta_cobrar));
			$forma_pago_clienteLogic= new forma_pago_cliente_logic($this->connexion);
			$forma_pago_clienteLogic->deepLoad($credito_cuenta_cobrar->getforma_pago_cliente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$credito_cuenta_cobrar->setestado($this->credito_cuenta_cobrarDataAccess->getestado($this->connexion,$credito_cuenta_cobrar));
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepLoad($credito_cuenta_cobrar->getestado(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(credito_cuenta_cobrar $credito_cuenta_cobrar,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			credito_cuenta_cobrar_logic_add::updatecredito_cuenta_cobrarToSave($this->credito_cuenta_cobrar);			
			
			if(!$paraDeleteCascade) {				
				credito_cuenta_cobrar_data::save($credito_cuenta_cobrar, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($credito_cuenta_cobrar->getempresa(),$this->connexion);
		sucursal_data::save($credito_cuenta_cobrar->getsucursal(),$this->connexion);
		ejercicio_data::save($credito_cuenta_cobrar->getejercicio(),$this->connexion);
		periodo_data::save($credito_cuenta_cobrar->getperiodo(),$this->connexion);
		usuario_data::save($credito_cuenta_cobrar->getusuario(),$this->connexion);
		cuenta_cobrar_data::save($credito_cuenta_cobrar->getcuenta_cobrar(),$this->connexion);
		forma_pago_cliente_data::save($credito_cuenta_cobrar->getforma_pago_cliente(),$this->connexion);
		estado_data::save($credito_cuenta_cobrar->getestado(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($credito_cuenta_cobrar->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($credito_cuenta_cobrar->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($credito_cuenta_cobrar->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($credito_cuenta_cobrar->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($credito_cuenta_cobrar->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta_cobrar::$class.'') {
				cuenta_cobrar_data::save($credito_cuenta_cobrar->getcuenta_cobrar(),$this->connexion);
				continue;
			}

			if($clas->clas==forma_pago_cliente::$class.'') {
				forma_pago_cliente_data::save($credito_cuenta_cobrar->getforma_pago_cliente(),$this->connexion);
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($credito_cuenta_cobrar->getestado(),$this->connexion);
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
			empresa_data::save($credito_cuenta_cobrar->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($credito_cuenta_cobrar->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($credito_cuenta_cobrar->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($credito_cuenta_cobrar->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($credito_cuenta_cobrar->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_cobrar_data::save($credito_cuenta_cobrar->getcuenta_cobrar(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==forma_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			forma_pago_cliente_data::save($credito_cuenta_cobrar->getforma_pago_cliente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($credito_cuenta_cobrar->getestado(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($credito_cuenta_cobrar->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($credito_cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($credito_cuenta_cobrar->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($credito_cuenta_cobrar->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($credito_cuenta_cobrar->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($credito_cuenta_cobrar->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($credito_cuenta_cobrar->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($credito_cuenta_cobrar->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($credito_cuenta_cobrar->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($credito_cuenta_cobrar->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_cobrar_data::save($credito_cuenta_cobrar->getcuenta_cobrar(),$this->connexion);
		$cuenta_cobrarLogic= new cuenta_cobrar_logic($this->connexion);
		$cuenta_cobrarLogic->deepSave($credito_cuenta_cobrar->getcuenta_cobrar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		forma_pago_cliente_data::save($credito_cuenta_cobrar->getforma_pago_cliente(),$this->connexion);
		$forma_pago_clienteLogic= new forma_pago_cliente_logic($this->connexion);
		$forma_pago_clienteLogic->deepSave($credito_cuenta_cobrar->getforma_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		estado_data::save($credito_cuenta_cobrar->getestado(),$this->connexion);
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepSave($credito_cuenta_cobrar->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($credito_cuenta_cobrar->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($credito_cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($credito_cuenta_cobrar->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($credito_cuenta_cobrar->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($credito_cuenta_cobrar->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($credito_cuenta_cobrar->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($credito_cuenta_cobrar->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($credito_cuenta_cobrar->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($credito_cuenta_cobrar->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($credito_cuenta_cobrar->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta_cobrar::$class.'') {
				cuenta_cobrar_data::save($credito_cuenta_cobrar->getcuenta_cobrar(),$this->connexion);
				$cuenta_cobrarLogic= new cuenta_cobrar_logic($this->connexion);
				$cuenta_cobrarLogic->deepSave($credito_cuenta_cobrar->getcuenta_cobrar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==forma_pago_cliente::$class.'') {
				forma_pago_cliente_data::save($credito_cuenta_cobrar->getforma_pago_cliente(),$this->connexion);
				$forma_pago_clienteLogic= new forma_pago_cliente_logic($this->connexion);
				$forma_pago_clienteLogic->deepSave($credito_cuenta_cobrar->getforma_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($credito_cuenta_cobrar->getestado(),$this->connexion);
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepSave($credito_cuenta_cobrar->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			empresa_data::save($credito_cuenta_cobrar->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($credito_cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($credito_cuenta_cobrar->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($credito_cuenta_cobrar->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($credito_cuenta_cobrar->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($credito_cuenta_cobrar->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($credito_cuenta_cobrar->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($credito_cuenta_cobrar->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($credito_cuenta_cobrar->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($credito_cuenta_cobrar->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_cobrar_data::save($credito_cuenta_cobrar->getcuenta_cobrar(),$this->connexion);
			$cuenta_cobrarLogic= new cuenta_cobrar_logic($this->connexion);
			$cuenta_cobrarLogic->deepSave($credito_cuenta_cobrar->getcuenta_cobrar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==forma_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			forma_pago_cliente_data::save($credito_cuenta_cobrar->getforma_pago_cliente(),$this->connexion);
			$forma_pago_clienteLogic= new forma_pago_cliente_logic($this->connexion);
			$forma_pago_clienteLogic->deepSave($credito_cuenta_cobrar->getforma_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($credito_cuenta_cobrar->getestado(),$this->connexion);
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepSave($credito_cuenta_cobrar->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				credito_cuenta_cobrar_data::save($credito_cuenta_cobrar, $this->connexion);
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
			
			$this->deepLoad($this->credito_cuenta_cobrar,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->credito_cuenta_cobrars as $credito_cuenta_cobrar) {
				$this->deepLoad($credito_cuenta_cobrar,$isDeep,$deepLoadType,$clases);
								
				credito_cuenta_cobrar_util::refrescarFKDescripciones($this->credito_cuenta_cobrars);
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
			
			foreach($this->credito_cuenta_cobrars as $credito_cuenta_cobrar) {
				$this->deepLoad($credito_cuenta_cobrar,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->credito_cuenta_cobrar,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->credito_cuenta_cobrars as $credito_cuenta_cobrar) {
				$this->deepSave($credito_cuenta_cobrar,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->credito_cuenta_cobrars as $credito_cuenta_cobrar) {
				$this->deepSave($credito_cuenta_cobrar,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(cuenta_cobrar::$class);
				$classes[]=new Classe(forma_pago_cliente::$class);
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
					if($clas->clas==cuenta_cobrar::$class) {
						$classes[]=new Classe(cuenta_cobrar::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==forma_pago_cliente::$class) {
						$classes[]=new Classe(forma_pago_cliente::$class);
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
					if($clas->clas==cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_cobrar::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==forma_pago_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(forma_pago_cliente::$class);
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
	
	
	
	
	
	
	
	public function getcredito_cuenta_cobrar() : ?credito_cuenta_cobrar {	
		/*
		credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGet($this->credito_cuenta_cobrar,$this->datosCliente);
		credito_cuenta_cobrar_logic_add::updatecredito_cuenta_cobrarToGet($this->credito_cuenta_cobrar);
		*/
			
		return $this->credito_cuenta_cobrar;
	}
		
	public function setcredito_cuenta_cobrar(credito_cuenta_cobrar $newcredito_cuenta_cobrar) {
		$this->credito_cuenta_cobrar = $newcredito_cuenta_cobrar;
	}
	
	public function getcredito_cuenta_cobrars() : array {		
		/*
		credito_cuenta_cobrar_logic_add::checkcredito_cuenta_cobrarToGets($this->credito_cuenta_cobrars,$this->datosCliente);
		
		foreach ($this->credito_cuenta_cobrars as $credito_cuenta_cobrarLocal ) {
			credito_cuenta_cobrar_logic_add::updatecredito_cuenta_cobrarToGet($credito_cuenta_cobrarLocal);
		}
		*/
		
		return $this->credito_cuenta_cobrars;
	}
	
	public function setcredito_cuenta_cobrars(array $newcredito_cuenta_cobrars) {
		$this->credito_cuenta_cobrars = $newcredito_cuenta_cobrars;
	}
	
	public function getcredito_cuenta_cobrarDataAccess() : credito_cuenta_cobrar_data {
		return $this->credito_cuenta_cobrarDataAccess;
	}
	
	public function setcredito_cuenta_cobrarDataAccess(credito_cuenta_cobrar_data $newcredito_cuenta_cobrarDataAccess) {
		$this->credito_cuenta_cobrarDataAccess = $newcredito_cuenta_cobrarDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        credito_cuenta_cobrar_carga::$CONTROLLER;;        
		
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
