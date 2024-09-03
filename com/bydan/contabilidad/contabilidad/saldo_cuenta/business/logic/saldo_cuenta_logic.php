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

namespace com\bydan\contabilidad\contabilidad\saldo_cuenta\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_carga;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_param_return;

use com\bydan\contabilidad\contabilidad\saldo_cuenta\presentation\session\saldo_cuenta_session;

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

use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_util;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\business\entity\saldo_cuenta;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\business\data\saldo_cuenta_data;

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

use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\entity\tipo_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\data\tipo_cuenta_data;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\logic\tipo_cuenta_logic;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL


//REL DETALLES




class saldo_cuenta_logic  extends GeneralEntityLogic implements saldo_cuenta_logicI {	
	/*GENERAL*/
	public saldo_cuenta_data $saldo_cuentaDataAccess;
	//public ?saldo_cuenta_logic_add $saldo_cuentaLogicAdditional=null;
	public ?saldo_cuenta $saldo_cuenta;
	public array $saldo_cuentas;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->saldo_cuentaDataAccess = new saldo_cuenta_data();			
			$this->saldo_cuentas = array();
			$this->saldo_cuenta = new saldo_cuenta();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->saldo_cuentaLogicAdditional = new saldo_cuenta_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->saldo_cuentaLogicAdditional==null) {
		//	$this->saldo_cuentaLogicAdditional=new saldo_cuenta_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->saldo_cuentaDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->saldo_cuentaDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->saldo_cuentaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->saldo_cuentaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->saldo_cuentas = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->saldo_cuentas);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->saldo_cuentas = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->saldo_cuentas);
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
		$this->saldo_cuenta = new saldo_cuenta();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->saldo_cuenta=$this->saldo_cuentaDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->saldo_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				saldo_cuenta_util::refrescarFKDescripcion($this->saldo_cuenta);
			}
						
			//saldo_cuenta_logic_add::checksaldo_cuentaToGet($this->saldo_cuenta,$this->datosCliente);
			//saldo_cuenta_logic_add::updatesaldo_cuentaToGet($this->saldo_cuenta);
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
		$this->saldo_cuenta = new  saldo_cuenta();
		  		  
        try {		
			$this->saldo_cuenta=$this->saldo_cuentaDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->saldo_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				saldo_cuenta_util::refrescarFKDescripcion($this->saldo_cuenta);
			}
			
			//saldo_cuenta_logic_add::checksaldo_cuentaToGet($this->saldo_cuenta,$this->datosCliente);
			//saldo_cuenta_logic_add::updatesaldo_cuentaToGet($this->saldo_cuenta);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?saldo_cuenta {
		$saldo_cuentaLogic = new  saldo_cuenta_logic();
		  		  
        try {		
			$saldo_cuentaLogic->setConnexion($connexion);			
			$saldo_cuentaLogic->getEntity($id);			
			return $saldo_cuentaLogic->getsaldo_cuenta();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->saldo_cuenta = new  saldo_cuenta();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->saldo_cuenta=$this->saldo_cuentaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->saldo_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				saldo_cuenta_util::refrescarFKDescripcion($this->saldo_cuenta);
			}
			
			//saldo_cuenta_logic_add::checksaldo_cuentaToGet($this->saldo_cuenta,$this->datosCliente);
			//saldo_cuenta_logic_add::updatesaldo_cuentaToGet($this->saldo_cuenta);
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
		$this->saldo_cuenta = new  saldo_cuenta();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->saldo_cuenta=$this->saldo_cuentaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->saldo_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				saldo_cuenta_util::refrescarFKDescripcion($this->saldo_cuenta);
			}
			
			//saldo_cuenta_logic_add::checksaldo_cuentaToGet($this->saldo_cuenta,$this->datosCliente);
			//saldo_cuenta_logic_add::updatesaldo_cuentaToGet($this->saldo_cuenta);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?saldo_cuenta {
		$saldo_cuentaLogic = new  saldo_cuenta_logic();
		  		  
        try {		
			$saldo_cuentaLogic->setConnexion($connexion);			
			$saldo_cuentaLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $saldo_cuentaLogic->getsaldo_cuenta();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->saldo_cuentas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->saldo_cuentas);			
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
		$this->saldo_cuentas = array();
		  		  
        try {			
			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->saldo_cuentas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->saldo_cuentas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->saldo_cuentas);
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
		$this->saldo_cuentas = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->saldo_cuentas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$saldo_cuentaLogic = new  saldo_cuenta_logic();
		  		  
        try {		
			$saldo_cuentaLogic->setConnexion($connexion);			
			$saldo_cuentaLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $saldo_cuentaLogic->getsaldo_cuentas();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->saldo_cuentas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->saldo_cuentas);
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
		$this->saldo_cuentas = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->saldo_cuentas);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->saldo_cuentas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->saldo_cuentas);
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
		$this->saldo_cuentas = array();
		  		  
        try {			
			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}	
			
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->saldo_cuentas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->saldo_cuentas = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->saldo_cuentas);
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
		$this->saldo_cuentas = array();
		  		  
        try {		
			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->saldo_cuentas);

		}  catch(Exception $e) {						
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
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,saldo_cuenta_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->saldo_cuentas);

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
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,saldo_cuenta_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->saldo_cuentas);
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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,saldo_cuenta_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->saldo_cuentas);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,saldo_cuenta_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->saldo_cuentas);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,saldo_cuenta_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->saldo_cuentas);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,saldo_cuenta_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->saldo_cuentas);
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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,saldo_cuenta_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->saldo_cuentas);

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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,saldo_cuenta_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->saldo_cuentas);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtipo_cuentaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_tipo_cuenta) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_cuenta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_cuenta,saldo_cuenta_util::$ID_TIPO_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_cuenta);

			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->saldo_cuentas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtipo_cuenta(string $strFinalQuery,Pagination $pagination,int $id_tipo_cuenta) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_cuenta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_cuenta,saldo_cuenta_util::$ID_TIPO_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_cuenta);

			$this->saldo_cuentas=$this->saldo_cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			//saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->saldo_cuentas);
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
						
			//saldo_cuenta_logic_add::checksaldo_cuentaToSave($this->saldo_cuenta,$this->datosCliente,$this->connexion);	       
			//saldo_cuenta_logic_add::updatesaldo_cuentaToSave($this->saldo_cuenta);			
			saldo_cuenta_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->saldo_cuenta,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->saldo_cuentaLogicAdditional->checkGeneralEntityToSave($this,$this->saldo_cuenta,$this->datosCliente,$this->connexion);
			
			
			saldo_cuenta_data::save($this->saldo_cuenta, $this->connexion);	    	       	 				
			//saldo_cuenta_logic_add::checksaldo_cuentaToSaveAfter($this->saldo_cuenta,$this->datosCliente,$this->connexion);			
			//$this->saldo_cuentaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->saldo_cuenta,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->saldo_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->saldo_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				saldo_cuenta_util::refrescarFKDescripcion($this->saldo_cuenta);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->saldo_cuenta->getIsDeleted()) {
				$this->saldo_cuenta=null;
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
						
			/*saldo_cuenta_logic_add::checksaldo_cuentaToSave($this->saldo_cuenta,$this->datosCliente,$this->connexion);*/	        
			//saldo_cuenta_logic_add::updatesaldo_cuentaToSave($this->saldo_cuenta);			
			//$this->saldo_cuentaLogicAdditional->checkGeneralEntityToSave($this,$this->saldo_cuenta,$this->datosCliente,$this->connexion);			
			saldo_cuenta_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->saldo_cuenta,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			saldo_cuenta_data::save($this->saldo_cuenta, $this->connexion);	    	       	 						
			/*saldo_cuenta_logic_add::checksaldo_cuentaToSaveAfter($this->saldo_cuenta,$this->datosCliente,$this->connexion);*/			
			//$this->saldo_cuentaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->saldo_cuenta,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->saldo_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->saldo_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				saldo_cuenta_util::refrescarFKDescripcion($this->saldo_cuenta);				
			}
			
			if($this->saldo_cuenta->getIsDeleted()) {
				$this->saldo_cuenta=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(saldo_cuenta $saldo_cuenta,Connexion $connexion)  {
		$saldo_cuentaLogic = new  saldo_cuenta_logic();		  		  
        try {		
			$saldo_cuentaLogic->setConnexion($connexion);			
			$saldo_cuentaLogic->setsaldo_cuenta($saldo_cuenta);			
			$saldo_cuentaLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*saldo_cuenta_logic_add::checksaldo_cuentaToSaves($this->saldo_cuentas,$this->datosCliente,$this->connexion);*/	        	
			//$this->saldo_cuentaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->saldo_cuentas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->saldo_cuentas as $saldo_cuentaLocal) {				
								
				//saldo_cuenta_logic_add::updatesaldo_cuentaToSave($saldo_cuentaLocal);	        	
				saldo_cuenta_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$saldo_cuentaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				saldo_cuenta_data::save($saldo_cuentaLocal, $this->connexion);				
			}
			
			/*saldo_cuenta_logic_add::checksaldo_cuentaToSavesAfter($this->saldo_cuentas,$this->datosCliente,$this->connexion);*/			
			//$this->saldo_cuentaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->saldo_cuentas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
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
			/*saldo_cuenta_logic_add::checksaldo_cuentaToSaves($this->saldo_cuentas,$this->datosCliente,$this->connexion);*/			
			//$this->saldo_cuentaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->saldo_cuentas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->saldo_cuentas as $saldo_cuentaLocal) {				
								
				//saldo_cuenta_logic_add::updatesaldo_cuentaToSave($saldo_cuentaLocal);	        	
				saldo_cuenta_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$saldo_cuentaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				saldo_cuenta_data::save($saldo_cuentaLocal, $this->connexion);				
			}			
			
			/*saldo_cuenta_logic_add::checksaldo_cuentaToSavesAfter($this->saldo_cuentas,$this->datosCliente,$this->connexion);*/			
			//$this->saldo_cuentaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->saldo_cuentas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $saldo_cuentas,Connexion $connexion)  {
		$saldo_cuentaLogic = new  saldo_cuenta_logic();
		  		  
        try {		
			$saldo_cuentaLogic->setConnexion($connexion);			
			$saldo_cuentaLogic->setsaldo_cuentas($saldo_cuentas);			
			$saldo_cuentaLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$saldo_cuentasAux=array();
		
		foreach($this->saldo_cuentas as $saldo_cuenta) {
			if($saldo_cuenta->getIsDeleted()==false) {
				$saldo_cuentasAux[]=$saldo_cuenta;
			}
		}
		
		$this->saldo_cuentas=$saldo_cuentasAux;
	}
	
	public function updateToGetsAuxiliar(array &$saldo_cuentas) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->saldo_cuentas as $saldo_cuenta) {
				
				$saldo_cuenta->setid_empresa_Descripcion(saldo_cuenta_util::getempresaDescripcion($saldo_cuenta->getempresa()));
				$saldo_cuenta->setid_ejercicio_Descripcion(saldo_cuenta_util::getejercicioDescripcion($saldo_cuenta->getejercicio()));
				$saldo_cuenta->setid_periodo_Descripcion(saldo_cuenta_util::getperiodoDescripcion($saldo_cuenta->getperiodo()));
				$saldo_cuenta->setid_tipo_cuenta_Descripcion(saldo_cuenta_util::gettipo_cuentaDescripcion($saldo_cuenta->gettipo_cuenta()));
				$saldo_cuenta->setid_cuenta_Descripcion(saldo_cuenta_util::getcuentaDescripcion($saldo_cuenta->getcuenta()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$saldo_cuenta_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$saldo_cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$saldo_cuenta_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$saldo_cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$saldo_cuenta_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$saldo_cuentaForeignKey=new saldo_cuenta_param_return();//saldo_cuentaForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$saldo_cuentaForeignKey,$saldo_cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$saldo_cuentaForeignKey,$saldo_cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$saldo_cuentaForeignKey,$saldo_cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_cuenta',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_cuentasFK($this->connexion,$strRecargarFkQuery,$saldo_cuentaForeignKey,$saldo_cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTipos,',')) {
				$this->cargarComboscuentasFK($this->connexion,$strRecargarFkQuery,$saldo_cuentaForeignKey,$saldo_cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$saldo_cuentaForeignKey,$saldo_cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$saldo_cuentaForeignKey,$saldo_cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$saldo_cuentaForeignKey,$saldo_cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_cuenta',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_cuentasFK($this->connexion,' where id=-1 ',$saldo_cuentaForeignKey,$saldo_cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuentasFK($this->connexion,' where id=-1 ',$saldo_cuentaForeignKey,$saldo_cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $saldo_cuentaForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$saldo_cuentaForeignKey,$saldo_cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$saldo_cuentaForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($saldo_cuenta_session==null) {
			$saldo_cuenta_session=new saldo_cuenta_session();
		}
		
		if($saldo_cuenta_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($saldo_cuentaForeignKey->idempresaDefaultFK==0) {
					$saldo_cuentaForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$saldo_cuentaForeignKey->empresasFK[$empresaLocal->getId()]=saldo_cuenta_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($saldo_cuenta_session->bigidempresaActual!=null && $saldo_cuenta_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($saldo_cuenta_session->bigidempresaActual);//WithConnection

				$saldo_cuentaForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=saldo_cuenta_util::getempresaDescripcion($empresaLogic->getempresa());
				$saldo_cuentaForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$saldo_cuentaForeignKey,$saldo_cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$saldo_cuentaForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($saldo_cuenta_session==null) {
			$saldo_cuenta_session=new saldo_cuenta_session();
		}
		
		if($saldo_cuenta_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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
				if($saldo_cuentaForeignKey->idejercicioDefaultFK==0) {
					$saldo_cuentaForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$saldo_cuentaForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=saldo_cuenta_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($saldo_cuenta_session->bigidejercicioActual!=null && $saldo_cuenta_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($saldo_cuenta_session->bigidejercicioActual);//WithConnection

				$saldo_cuentaForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=saldo_cuenta_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$saldo_cuentaForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$saldo_cuentaForeignKey,$saldo_cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$saldo_cuentaForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($saldo_cuenta_session==null) {
			$saldo_cuenta_session=new saldo_cuenta_session();
		}
		
		if($saldo_cuenta_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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
				if($saldo_cuentaForeignKey->idperiodoDefaultFK==0) {
					$saldo_cuentaForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$saldo_cuentaForeignKey->periodosFK[$periodoLocal->getId()]=saldo_cuenta_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($saldo_cuenta_session->bigidperiodoActual!=null && $saldo_cuenta_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($saldo_cuenta_session->bigidperiodoActual);//WithConnection

				$saldo_cuentaForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=saldo_cuenta_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$saldo_cuentaForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombostipo_cuentasFK($connexion=null,$strRecargarFkQuery='',$saldo_cuentaForeignKey,$saldo_cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_cuentaLogic= new tipo_cuenta_logic();
		$pagination= new Pagination();
		$saldo_cuentaForeignKey->tipo_cuentasFK=array();

		$tipo_cuentaLogic->setConnexion($connexion);
		$tipo_cuentaLogic->gettipo_cuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($saldo_cuenta_session==null) {
			$saldo_cuenta_session=new saldo_cuenta_session();
		}
		
		if($saldo_cuenta_session->bitBusquedaDesdeFKSesiontipo_cuenta!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_cuenta_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltipo_cuenta=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_cuenta=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_cuenta, '');
				$finalQueryGlobaltipo_cuenta.=tipo_cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_cuenta.$strRecargarFkQuery;		

				$tipo_cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($tipo_cuentaLogic->gettipo_cuentas() as $tipo_cuentaLocal ) {
				if($saldo_cuentaForeignKey->idtipo_cuentaDefaultFK==0) {
					$saldo_cuentaForeignKey->idtipo_cuentaDefaultFK=$tipo_cuentaLocal->getId();
				}

				$saldo_cuentaForeignKey->tipo_cuentasFK[$tipo_cuentaLocal->getId()]=saldo_cuenta_util::gettipo_cuentaDescripcion($tipo_cuentaLocal);
			}

		} else {

			if($saldo_cuenta_session->bigidtipo_cuentaActual!=null && $saldo_cuenta_session->bigidtipo_cuentaActual > 0) {
				$tipo_cuentaLogic->getEntity($saldo_cuenta_session->bigidtipo_cuentaActual);//WithConnection

				$saldo_cuentaForeignKey->tipo_cuentasFK[$tipo_cuentaLogic->gettipo_cuenta()->getId()]=saldo_cuenta_util::gettipo_cuentaDescripcion($tipo_cuentaLogic->gettipo_cuenta());
				$saldo_cuentaForeignKey->idtipo_cuentaDefaultFK=$tipo_cuentaLogic->gettipo_cuenta()->getId();
			}
		}
	}

	public function cargarComboscuentasFK($connexion=null,$strRecargarFkQuery='',$saldo_cuentaForeignKey,$saldo_cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$saldo_cuentaForeignKey->cuentasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($saldo_cuenta_session==null) {
			$saldo_cuenta_session=new saldo_cuenta_session();
		}
		
		if($saldo_cuenta_session->bitBusquedaDesdeFKSesioncuenta!=true) {
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
				if($saldo_cuentaForeignKey->idcuentaDefaultFK==0) {
					$saldo_cuentaForeignKey->idcuentaDefaultFK=$cuentaLocal->getId();
				}

				$saldo_cuentaForeignKey->cuentasFK[$cuentaLocal->getId()]=saldo_cuenta_util::getcuentaDescripcion($cuentaLocal);
			}

		} else {

			if($saldo_cuenta_session->bigidcuentaActual!=null && $saldo_cuenta_session->bigidcuentaActual > 0) {
				$cuentaLogic->getEntity($saldo_cuenta_session->bigidcuentaActual);//WithConnection

				$saldo_cuentaForeignKey->cuentasFK[$cuentaLogic->getcuenta()->getId()]=saldo_cuenta_util::getcuentaDescripcion($cuentaLogic->getcuenta());
				$saldo_cuentaForeignKey->idcuentaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($saldo_cuenta) {
		$this->saveRelacionesBase($saldo_cuenta,true);
	}

	public function saveRelaciones($saldo_cuenta) {
		$this->saveRelacionesBase($saldo_cuenta,false);
	}

	public function saveRelacionesBase($saldo_cuenta,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setsaldo_cuenta($saldo_cuenta);

			if(true) {

				//saldo_cuenta_logic_add::updateRelacionesToSave($saldo_cuenta,$this);

				if(($this->saldo_cuenta->getIsNew() || $this->saldo_cuenta->getIsChanged()) && !$this->saldo_cuenta->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->saldo_cuenta->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//saldo_cuenta_logic_add::updateRelacionesToSaveAfter($saldo_cuenta,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $saldo_cuentas,saldo_cuenta_param_return $saldo_cuentaParameterGeneral) : saldo_cuenta_param_return {
		$saldo_cuentaReturnGeneral=new saldo_cuenta_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $saldo_cuentaReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $saldo_cuentas,saldo_cuenta_param_return $saldo_cuentaParameterGeneral) : saldo_cuenta_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$saldo_cuentaReturnGeneral=new saldo_cuenta_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $saldo_cuentaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $saldo_cuentas,saldo_cuenta $saldo_cuenta,saldo_cuenta_param_return $saldo_cuentaParameterGeneral,bool $isEsNuevosaldo_cuenta,array $clases) : saldo_cuenta_param_return {
		 try {	
			$saldo_cuentaReturnGeneral=new saldo_cuenta_param_return();
	
			$saldo_cuentaReturnGeneral->setsaldo_cuenta($saldo_cuenta);
			$saldo_cuentaReturnGeneral->setsaldo_cuentas($saldo_cuentas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$saldo_cuentaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $saldo_cuentaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $saldo_cuentas,saldo_cuenta $saldo_cuenta,saldo_cuenta_param_return $saldo_cuentaParameterGeneral,bool $isEsNuevosaldo_cuenta,array $clases) : saldo_cuenta_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$saldo_cuentaReturnGeneral=new saldo_cuenta_param_return();
	
			$saldo_cuentaReturnGeneral->setsaldo_cuenta($saldo_cuenta);
			$saldo_cuentaReturnGeneral->setsaldo_cuentas($saldo_cuentas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$saldo_cuentaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $saldo_cuentaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $saldo_cuentas,saldo_cuenta $saldo_cuenta,saldo_cuenta_param_return $saldo_cuentaParameterGeneral,bool $isEsNuevosaldo_cuenta,array $clases) : saldo_cuenta_param_return {
		 try {	
			$saldo_cuentaReturnGeneral=new saldo_cuenta_param_return();
	
			$saldo_cuentaReturnGeneral->setsaldo_cuenta($saldo_cuenta);
			$saldo_cuentaReturnGeneral->setsaldo_cuentas($saldo_cuentas);
			
			
			
			return $saldo_cuentaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $saldo_cuentas,saldo_cuenta $saldo_cuenta,saldo_cuenta_param_return $saldo_cuentaParameterGeneral,bool $isEsNuevosaldo_cuenta,array $clases) : saldo_cuenta_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$saldo_cuentaReturnGeneral=new saldo_cuenta_param_return();
	
			$saldo_cuentaReturnGeneral->setsaldo_cuenta($saldo_cuenta);
			$saldo_cuentaReturnGeneral->setsaldo_cuentas($saldo_cuentas);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $saldo_cuentaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,saldo_cuenta $saldo_cuenta,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,saldo_cuenta $saldo_cuenta,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		saldo_cuenta_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(saldo_cuenta $saldo_cuenta,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//saldo_cuenta_logic_add::updatesaldo_cuentaToGet($this->saldo_cuenta);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$saldo_cuenta->setempresa($this->saldo_cuentaDataAccess->getempresa($this->connexion,$saldo_cuenta));
		$saldo_cuenta->setejercicio($this->saldo_cuentaDataAccess->getejercicio($this->connexion,$saldo_cuenta));
		$saldo_cuenta->setperiodo($this->saldo_cuentaDataAccess->getperiodo($this->connexion,$saldo_cuenta));
		$saldo_cuenta->settipo_cuenta($this->saldo_cuentaDataAccess->gettipo_cuenta($this->connexion,$saldo_cuenta));
		$saldo_cuenta->setcuenta($this->saldo_cuentaDataAccess->getcuenta($this->connexion,$saldo_cuenta));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$saldo_cuenta->setempresa($this->saldo_cuentaDataAccess->getempresa($this->connexion,$saldo_cuenta));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$saldo_cuenta->setejercicio($this->saldo_cuentaDataAccess->getejercicio($this->connexion,$saldo_cuenta));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$saldo_cuenta->setperiodo($this->saldo_cuentaDataAccess->getperiodo($this->connexion,$saldo_cuenta));
				continue;
			}

			if($clas->clas==tipo_cuenta::$class.'') {
				$saldo_cuenta->settipo_cuenta($this->saldo_cuentaDataAccess->gettipo_cuenta($this->connexion,$saldo_cuenta));
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$saldo_cuenta->setcuenta($this->saldo_cuentaDataAccess->getcuenta($this->connexion,$saldo_cuenta));
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
			$saldo_cuenta->setempresa($this->saldo_cuentaDataAccess->getempresa($this->connexion,$saldo_cuenta));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$saldo_cuenta->setejercicio($this->saldo_cuentaDataAccess->getejercicio($this->connexion,$saldo_cuenta));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$saldo_cuenta->setperiodo($this->saldo_cuentaDataAccess->getperiodo($this->connexion,$saldo_cuenta));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$saldo_cuenta->settipo_cuenta($this->saldo_cuentaDataAccess->gettipo_cuenta($this->connexion,$saldo_cuenta));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$saldo_cuenta->setcuenta($this->saldo_cuentaDataAccess->getcuenta($this->connexion,$saldo_cuenta));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$saldo_cuenta->setempresa($this->saldo_cuentaDataAccess->getempresa($this->connexion,$saldo_cuenta));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($saldo_cuenta->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$saldo_cuenta->setejercicio($this->saldo_cuentaDataAccess->getejercicio($this->connexion,$saldo_cuenta));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($saldo_cuenta->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$saldo_cuenta->setperiodo($this->saldo_cuentaDataAccess->getperiodo($this->connexion,$saldo_cuenta));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($saldo_cuenta->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$saldo_cuenta->settipo_cuenta($this->saldo_cuentaDataAccess->gettipo_cuenta($this->connexion,$saldo_cuenta));
		$tipo_cuentaLogic= new tipo_cuenta_logic($this->connexion);
		$tipo_cuentaLogic->deepLoad($saldo_cuenta->gettipo_cuenta(),$isDeep,$deepLoadType,$clases);
				
		$saldo_cuenta->setcuenta($this->saldo_cuentaDataAccess->getcuenta($this->connexion,$saldo_cuenta));
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepLoad($saldo_cuenta->getcuenta(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$saldo_cuenta->setempresa($this->saldo_cuentaDataAccess->getempresa($this->connexion,$saldo_cuenta));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($saldo_cuenta->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$saldo_cuenta->setejercicio($this->saldo_cuentaDataAccess->getejercicio($this->connexion,$saldo_cuenta));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($saldo_cuenta->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$saldo_cuenta->setperiodo($this->saldo_cuentaDataAccess->getperiodo($this->connexion,$saldo_cuenta));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($saldo_cuenta->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_cuenta::$class.'') {
				$saldo_cuenta->settipo_cuenta($this->saldo_cuentaDataAccess->gettipo_cuenta($this->connexion,$saldo_cuenta));
				$tipo_cuentaLogic= new tipo_cuenta_logic($this->connexion);
				$tipo_cuentaLogic->deepLoad($saldo_cuenta->gettipo_cuenta(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$saldo_cuenta->setcuenta($this->saldo_cuentaDataAccess->getcuenta($this->connexion,$saldo_cuenta));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($saldo_cuenta->getcuenta(),$isDeep,$deepLoadType,$clases);				
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
			$saldo_cuenta->setempresa($this->saldo_cuentaDataAccess->getempresa($this->connexion,$saldo_cuenta));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($saldo_cuenta->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$saldo_cuenta->setejercicio($this->saldo_cuentaDataAccess->getejercicio($this->connexion,$saldo_cuenta));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($saldo_cuenta->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$saldo_cuenta->setperiodo($this->saldo_cuentaDataAccess->getperiodo($this->connexion,$saldo_cuenta));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($saldo_cuenta->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$saldo_cuenta->settipo_cuenta($this->saldo_cuentaDataAccess->gettipo_cuenta($this->connexion,$saldo_cuenta));
			$tipo_cuentaLogic= new tipo_cuenta_logic($this->connexion);
			$tipo_cuentaLogic->deepLoad($saldo_cuenta->gettipo_cuenta(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$saldo_cuenta->setcuenta($this->saldo_cuentaDataAccess->getcuenta($this->connexion,$saldo_cuenta));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($saldo_cuenta->getcuenta(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(saldo_cuenta $saldo_cuenta,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//saldo_cuenta_logic_add::updatesaldo_cuentaToSave($this->saldo_cuenta);			
			
			if(!$paraDeleteCascade) {				
				saldo_cuenta_data::save($saldo_cuenta, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($saldo_cuenta->getempresa(),$this->connexion);
		ejercicio_data::save($saldo_cuenta->getejercicio(),$this->connexion);
		periodo_data::save($saldo_cuenta->getperiodo(),$this->connexion);
		tipo_cuenta_data::save($saldo_cuenta->gettipo_cuenta(),$this->connexion);
		cuenta_data::save($saldo_cuenta->getcuenta(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($saldo_cuenta->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($saldo_cuenta->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($saldo_cuenta->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_cuenta::$class.'') {
				tipo_cuenta_data::save($saldo_cuenta->gettipo_cuenta(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($saldo_cuenta->getcuenta(),$this->connexion);
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
			empresa_data::save($saldo_cuenta->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($saldo_cuenta->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($saldo_cuenta->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_cuenta_data::save($saldo_cuenta->gettipo_cuenta(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($saldo_cuenta->getcuenta(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($saldo_cuenta->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($saldo_cuenta->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($saldo_cuenta->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($saldo_cuenta->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($saldo_cuenta->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($saldo_cuenta->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_cuenta_data::save($saldo_cuenta->gettipo_cuenta(),$this->connexion);
		$tipo_cuentaLogic= new tipo_cuenta_logic($this->connexion);
		$tipo_cuentaLogic->deepSave($saldo_cuenta->gettipo_cuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($saldo_cuenta->getcuenta(),$this->connexion);
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepSave($saldo_cuenta->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($saldo_cuenta->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($saldo_cuenta->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($saldo_cuenta->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($saldo_cuenta->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($saldo_cuenta->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($saldo_cuenta->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_cuenta::$class.'') {
				tipo_cuenta_data::save($saldo_cuenta->gettipo_cuenta(),$this->connexion);
				$tipo_cuentaLogic= new tipo_cuenta_logic($this->connexion);
				$tipo_cuentaLogic->deepSave($saldo_cuenta->gettipo_cuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($saldo_cuenta->getcuenta(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($saldo_cuenta->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			empresa_data::save($saldo_cuenta->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($saldo_cuenta->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($saldo_cuenta->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($saldo_cuenta->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($saldo_cuenta->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($saldo_cuenta->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_cuenta_data::save($saldo_cuenta->gettipo_cuenta(),$this->connexion);
			$tipo_cuentaLogic= new tipo_cuenta_logic($this->connexion);
			$tipo_cuentaLogic->deepSave($saldo_cuenta->gettipo_cuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($saldo_cuenta->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($saldo_cuenta->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				saldo_cuenta_data::save($saldo_cuenta, $this->connexion);
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
			
			$this->deepLoad($this->saldo_cuenta,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->saldo_cuentas as $saldo_cuenta) {
				$this->deepLoad($saldo_cuenta,$isDeep,$deepLoadType,$clases);
								
				saldo_cuenta_util::refrescarFKDescripciones($this->saldo_cuentas);
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
			
			foreach($this->saldo_cuentas as $saldo_cuenta) {
				$this->deepLoad($saldo_cuenta,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->saldo_cuenta,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->saldo_cuentas as $saldo_cuenta) {
				$this->deepSave($saldo_cuenta,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->saldo_cuentas as $saldo_cuenta) {
				$this->deepSave($saldo_cuenta,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(tipo_cuenta::$class);
				$classes[]=new Classe(cuenta::$class);
				
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
					if($clas->clas==tipo_cuenta::$class) {
						$classes[]=new Classe(tipo_cuenta::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
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
					if($clas->clas==tipo_cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_cuenta::$class);
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
	
	
	
	
	
	
	
	public function getsaldo_cuenta() : ?saldo_cuenta {	
		/*
		saldo_cuenta_logic_add::checksaldo_cuentaToGet($this->saldo_cuenta,$this->datosCliente);
		saldo_cuenta_logic_add::updatesaldo_cuentaToGet($this->saldo_cuenta);
		*/
			
		return $this->saldo_cuenta;
	}
		
	public function setsaldo_cuenta(saldo_cuenta $newsaldo_cuenta) {
		$this->saldo_cuenta = $newsaldo_cuenta;
	}
	
	public function getsaldo_cuentas() : array {		
		/*
		saldo_cuenta_logic_add::checksaldo_cuentaToGets($this->saldo_cuentas,$this->datosCliente);
		
		foreach ($this->saldo_cuentas as $saldo_cuentaLocal ) {
			saldo_cuenta_logic_add::updatesaldo_cuentaToGet($saldo_cuentaLocal);
		}
		*/
		
		return $this->saldo_cuentas;
	}
	
	public function setsaldo_cuentas(array $newsaldo_cuentas) {
		$this->saldo_cuentas = $newsaldo_cuentas;
	}
	
	public function getsaldo_cuentaDataAccess() : saldo_cuenta_data {
		return $this->saldo_cuentaDataAccess;
	}
	
	public function setsaldo_cuentaDataAccess(saldo_cuenta_data $newsaldo_cuentaDataAccess) {
		$this->saldo_cuentaDataAccess = $newsaldo_cuentaDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        saldo_cuenta_carga::$CONTROLLER;;        
		
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
