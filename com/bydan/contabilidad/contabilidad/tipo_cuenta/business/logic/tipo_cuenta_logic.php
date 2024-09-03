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

namespace com\bydan\contabilidad\contabilidad\tipo_cuenta\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_carga;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_param_return;


use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\ParameterDbType;



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

use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_util;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\entity\tipo_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\data\tipo_cuenta_data;

//FK


//REL


use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\contabilidad\saldo_cuenta\business\entity\saldo_cuenta;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\business\data\saldo_cuenta_data;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\business\logic\saldo_cuenta_logic;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_carga;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_util;

use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\entity\cuenta_predefinida;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\data\cuenta_predefinida_data;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\logic\cuenta_predefinida_logic;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_carga;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_util;

//REL DETALLES




class tipo_cuenta_logic  extends GeneralEntityLogic implements tipo_cuenta_logicI {	
	/*GENERAL*/
	public tipo_cuenta_data $tipo_cuentaDataAccess;
	//public ?tipo_cuenta_logic_add $tipo_cuentaLogicAdditional=null;
	public ?tipo_cuenta $tipo_cuenta;
	public array $tipo_cuentas;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->tipo_cuentaDataAccess = new tipo_cuenta_data();			
			$this->tipo_cuentas = array();
			$this->tipo_cuenta = new tipo_cuenta();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->tipo_cuentaLogicAdditional = new tipo_cuenta_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->tipo_cuentaLogicAdditional==null) {
		//	$this->tipo_cuentaLogicAdditional=new tipo_cuenta_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->tipo_cuentaDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->tipo_cuentaDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->tipo_cuentaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->tipo_cuentaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_cuentas = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_cuentas=$this->tipo_cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_util::refrescarFKDescripciones($this->tipo_cuentas);
			}
			
			//tipo_cuenta_logic_add::checktipo_cuentaToGets($this->tipo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuentas);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_cuentas = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_cuentas=$this->tipo_cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_util::refrescarFKDescripciones($this->tipo_cuentas);
			}
			
			//tipo_cuenta_logic_add::checktipo_cuentaToGets($this->tipo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuentas);
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
		$this->tipo_cuenta = new tipo_cuenta();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->tipo_cuenta=$this->tipo_cuentaDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_cuenta_util::refrescarFKDescripcion($this->tipo_cuenta);
			}
						
			//tipo_cuenta_logic_add::checktipo_cuentaToGet($this->tipo_cuenta,$this->datosCliente);
			//tipo_cuenta_logic_add::updatetipo_cuentaToGet($this->tipo_cuenta);
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
		$this->tipo_cuenta = new  tipo_cuenta();
		  		  
        try {		
			$this->tipo_cuenta=$this->tipo_cuentaDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_cuenta_util::refrescarFKDescripcion($this->tipo_cuenta);
			}
			
			//tipo_cuenta_logic_add::checktipo_cuentaToGet($this->tipo_cuenta,$this->datosCliente);
			//tipo_cuenta_logic_add::updatetipo_cuentaToGet($this->tipo_cuenta);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?tipo_cuenta {
		$tipo_cuentaLogic = new  tipo_cuenta_logic();
		  		  
        try {		
			$tipo_cuentaLogic->setConnexion($connexion);			
			$tipo_cuentaLogic->getEntity($id);			
			return $tipo_cuentaLogic->gettipo_cuenta();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->tipo_cuenta = new  tipo_cuenta();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->tipo_cuenta=$this->tipo_cuentaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_cuenta_util::refrescarFKDescripcion($this->tipo_cuenta);
			}
			
			//tipo_cuenta_logic_add::checktipo_cuentaToGet($this->tipo_cuenta,$this->datosCliente);
			//tipo_cuenta_logic_add::updatetipo_cuentaToGet($this->tipo_cuenta);
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
		$this->tipo_cuenta = new  tipo_cuenta();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_cuenta=$this->tipo_cuentaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_cuenta_util::refrescarFKDescripcion($this->tipo_cuenta);
			}
			
			//tipo_cuenta_logic_add::checktipo_cuentaToGet($this->tipo_cuenta,$this->datosCliente);
			//tipo_cuenta_logic_add::updatetipo_cuentaToGet($this->tipo_cuenta);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?tipo_cuenta {
		$tipo_cuentaLogic = new  tipo_cuenta_logic();
		  		  
        try {		
			$tipo_cuentaLogic->setConnexion($connexion);			
			$tipo_cuentaLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $tipo_cuentaLogic->gettipo_cuenta();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_cuentas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_cuentas=$this->tipo_cuentaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_util::refrescarFKDescripciones($this->tipo_cuentas);
			}
			
			//tipo_cuenta_logic_add::checktipo_cuentaToGets($this->tipo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuentas);			
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
		$this->tipo_cuentas = array();
		  		  
        try {			
			$this->tipo_cuentas=$this->tipo_cuentaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_util::refrescarFKDescripciones($this->tipo_cuentas);
			}
			
			//tipo_cuenta_logic_add::checktipo_cuentaToGets($this->tipo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuentas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->tipo_cuentas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_cuentas=$this->tipo_cuentaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_util::refrescarFKDescripciones($this->tipo_cuentas);
			}
			
			//tipo_cuenta_logic_add::checktipo_cuentaToGets($this->tipo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuentas);
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
		$this->tipo_cuentas = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_cuentas=$this->tipo_cuentaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_util::refrescarFKDescripciones($this->tipo_cuentas);
			}
			
			//tipo_cuenta_logic_add::checktipo_cuentaToGets($this->tipo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuentas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$tipo_cuentaLogic = new  tipo_cuenta_logic();
		  		  
        try {		
			$tipo_cuentaLogic->setConnexion($connexion);			
			$tipo_cuentaLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $tipo_cuentaLogic->gettipo_cuentas();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->tipo_cuentas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_cuentas=$this->tipo_cuentaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_util::refrescarFKDescripciones($this->tipo_cuentas);
			}
			
			//tipo_cuenta_logic_add::checktipo_cuentaToGets($this->tipo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuentas);
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
		$this->tipo_cuentas = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_cuentas=$this->tipo_cuentaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_util::refrescarFKDescripciones($this->tipo_cuentas);
			}
			
			//tipo_cuenta_logic_add::checktipo_cuentaToGets($this->tipo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuentas);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->tipo_cuentas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_cuentas=$this->tipo_cuentaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_util::refrescarFKDescripciones($this->tipo_cuentas);
			}
			
			//tipo_cuenta_logic_add::checktipo_cuentaToGets($this->tipo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuentas);
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
		$this->tipo_cuentas = array();
		  		  
        try {			
			$this->tipo_cuentas=$this->tipo_cuentaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_util::refrescarFKDescripciones($this->tipo_cuentas);
			}	
			
			//tipo_cuenta_logic_add::checktipo_cuentaToGets($this->tipo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuentas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_cuentas = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_cuentas=$this->tipo_cuentaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_util::refrescarFKDescripciones($this->tipo_cuentas);
			}
			
			//tipo_cuenta_logic_add::checktipo_cuentaToGets($this->tipo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuentas);
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
		$this->tipo_cuentas = array();
		  		  
        try {		
			$this->tipo_cuentas=$this->tipo_cuentaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_util::refrescarFKDescripciones($this->tipo_cuentas);
			}
			
			//tipo_cuenta_logic_add::checktipo_cuentaToGets($this->tipo_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuentas);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
				
	
	/*MANTENIMIENTO*/
	public function saveWithConnection() {	
		 try {	
			$this->connexion = Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
						
			//tipo_cuenta_logic_add::checktipo_cuentaToSave($this->tipo_cuenta,$this->datosCliente,$this->connexion);	       
			//tipo_cuenta_logic_add::updatetipo_cuentaToSave($this->tipo_cuenta);			
			tipo_cuenta_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_cuenta,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->tipo_cuentaLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_cuenta,$this->datosCliente,$this->connexion);
			
			
			tipo_cuenta_data::save($this->tipo_cuenta, $this->connexion);	    	       	 				
			//tipo_cuenta_logic_add::checktipo_cuentaToSaveAfter($this->tipo_cuenta,$this->datosCliente,$this->connexion);			
			//$this->tipo_cuentaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_cuenta,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_cuenta_util::refrescarFKDescripcion($this->tipo_cuenta);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->tipo_cuenta->getIsDeleted()) {
				$this->tipo_cuenta=null;
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
						
			/*tipo_cuenta_logic_add::checktipo_cuentaToSave($this->tipo_cuenta,$this->datosCliente,$this->connexion);*/	        
			//tipo_cuenta_logic_add::updatetipo_cuentaToSave($this->tipo_cuenta);			
			//$this->tipo_cuentaLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_cuenta,$this->datosCliente,$this->connexion);			
			tipo_cuenta_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_cuenta,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			tipo_cuenta_data::save($this->tipo_cuenta, $this->connexion);	    	       	 						
			/*tipo_cuenta_logic_add::checktipo_cuentaToSaveAfter($this->tipo_cuenta,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_cuentaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_cuenta,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_cuenta_util::refrescarFKDescripcion($this->tipo_cuenta);				
			}
			
			if($this->tipo_cuenta->getIsDeleted()) {
				$this->tipo_cuenta=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(tipo_cuenta $tipo_cuenta,Connexion $connexion)  {
		$tipo_cuentaLogic = new  tipo_cuenta_logic();		  		  
        try {		
			$tipo_cuentaLogic->setConnexion($connexion);			
			$tipo_cuentaLogic->settipo_cuenta($tipo_cuenta);			
			$tipo_cuentaLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*tipo_cuenta_logic_add::checktipo_cuentaToSaves($this->tipo_cuentas,$this->datosCliente,$this->connexion);*/	        	
			//$this->tipo_cuentaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_cuentas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_cuentas as $tipo_cuentaLocal) {				
								
				//tipo_cuenta_logic_add::updatetipo_cuentaToSave($tipo_cuentaLocal);	        	
				tipo_cuenta_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_cuentaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				tipo_cuenta_data::save($tipo_cuentaLocal, $this->connexion);				
			}
			
			/*tipo_cuenta_logic_add::checktipo_cuentaToSavesAfter($this->tipo_cuentas,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_cuentaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_cuentas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_util::refrescarFKDescripciones($this->tipo_cuentas);
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
			/*tipo_cuenta_logic_add::checktipo_cuentaToSaves($this->tipo_cuentas,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_cuentaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_cuentas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_cuentas as $tipo_cuentaLocal) {				
								
				//tipo_cuenta_logic_add::updatetipo_cuentaToSave($tipo_cuentaLocal);	        	
				tipo_cuenta_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_cuentaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				tipo_cuenta_data::save($tipo_cuentaLocal, $this->connexion);				
			}			
			
			/*tipo_cuenta_logic_add::checktipo_cuentaToSavesAfter($this->tipo_cuentas,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_cuentaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_cuentas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_util::refrescarFKDescripciones($this->tipo_cuentas);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $tipo_cuentas,Connexion $connexion)  {
		$tipo_cuentaLogic = new  tipo_cuenta_logic();
		  		  
        try {		
			$tipo_cuentaLogic->setConnexion($connexion);			
			$tipo_cuentaLogic->settipo_cuentas($tipo_cuentas);			
			$tipo_cuentaLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$tipo_cuentasAux=array();
		
		foreach($this->tipo_cuentas as $tipo_cuenta) {
			if($tipo_cuenta->getIsDeleted()==false) {
				$tipo_cuentasAux[]=$tipo_cuenta;
			}
		}
		
		$this->tipo_cuentas=$tipo_cuentasAux;
	}
	
	public function updateToGetsAuxiliar(array &$tipo_cuentas) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	
	
	
	public function saveRelacionesWithConnection($tipo_cuenta,$cuentas,$saldocuentas,$cuentapredefinidas) {
		$this->saveRelacionesBase($tipo_cuenta,$cuentas,$saldocuentas,$cuentapredefinidas,true);
	}

	public function saveRelaciones($tipo_cuenta,$cuentas,$saldocuentas,$cuentapredefinidas) {
		$this->saveRelacionesBase($tipo_cuenta,$cuentas,$saldocuentas,$cuentapredefinidas,false);
	}

	public function saveRelacionesBase($tipo_cuenta,$cuentas=array(),$saldocuentas=array(),$cuentapredefinidas=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$tipo_cuenta->setcuentas($cuentas);
			$tipo_cuenta->setsaldo_cuentas($saldocuentas);
			$tipo_cuenta->setcuenta_predefinidas($cuentapredefinidas);
			$this->settipo_cuenta($tipo_cuenta);

				if(($this->tipo_cuenta->getIsNew() || $this->tipo_cuenta->getIsChanged()) && !$this->tipo_cuenta->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($cuentas,$saldocuentas,$cuentapredefinidas);

				} else if($this->tipo_cuenta->getIsDeleted()) {
					$this->saveRelacionesDetalles($cuentas,$saldocuentas,$cuentapredefinidas);
					$this->save();
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
	
	
	public function saveRelacionesDetalles($cuentas=array(),$saldocuentas=array(),$cuentapredefinidas=array()) {
		try {
	

			$idtipo_cuentaActual=$this->gettipo_cuenta()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/cuenta_carga.php');
			cuenta_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cuentaLogic_Desde_tipo_cuenta=new cuenta_logic();
			$cuentaLogic_Desde_tipo_cuenta->setcuentas($cuentas);

			$cuentaLogic_Desde_tipo_cuenta->setConnexion($this->getConnexion());
			$cuentaLogic_Desde_tipo_cuenta->setDatosCliente($this->datosCliente);

			foreach($cuentaLogic_Desde_tipo_cuenta->getcuentas() as $cuenta_Desde_tipo_cuenta) {
				$cuenta_Desde_tipo_cuenta->setid_tipo_cuenta($idtipo_cuentaActual);

				$cuentaLogic_Desde_tipo_cuenta->setcuenta($cuenta_Desde_tipo_cuenta);
				$cuentaLogic_Desde_tipo_cuenta->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/saldo_cuenta_carga.php');
			saldo_cuenta_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$saldocuentaLogic_Desde_tipo_cuenta=new saldo_cuenta_logic();
			$saldocuentaLogic_Desde_tipo_cuenta->setsaldo_cuentas($saldocuentas);

			$saldocuentaLogic_Desde_tipo_cuenta->setConnexion($this->getConnexion());
			$saldocuentaLogic_Desde_tipo_cuenta->setDatosCliente($this->datosCliente);

			foreach($saldocuentaLogic_Desde_tipo_cuenta->getsaldo_cuentas() as $saldocuenta_Desde_tipo_cuenta) {
				$saldocuenta_Desde_tipo_cuenta->setid_tipo_cuenta($idtipo_cuentaActual);
			}

			$saldocuentaLogic_Desde_tipo_cuenta->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/cuenta_predefinida_carga.php');
			cuenta_predefinida_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cuentapredefinidaLogic_Desde_tipo_cuenta=new cuenta_predefinida_logic();
			$cuentapredefinidaLogic_Desde_tipo_cuenta->setcuenta_predefinidas($cuentapredefinidas);

			$cuentapredefinidaLogic_Desde_tipo_cuenta->setConnexion($this->getConnexion());
			$cuentapredefinidaLogic_Desde_tipo_cuenta->setDatosCliente($this->datosCliente);

			foreach($cuentapredefinidaLogic_Desde_tipo_cuenta->getcuenta_predefinidas() as $cuentapredefinida_Desde_tipo_cuenta) {
				$cuentapredefinida_Desde_tipo_cuenta->setid_tipo_cuenta($idtipo_cuentaActual);
			}

			$cuentapredefinidaLogic_Desde_tipo_cuenta->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $tipo_cuentas,tipo_cuenta_param_return $tipo_cuentaParameterGeneral) : tipo_cuenta_param_return {
		$tipo_cuentaReturnGeneral=new tipo_cuenta_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $tipo_cuentaReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $tipo_cuentas,tipo_cuenta_param_return $tipo_cuentaParameterGeneral) : tipo_cuenta_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_cuentaReturnGeneral=new tipo_cuenta_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_cuentaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_cuentas,tipo_cuenta $tipo_cuenta,tipo_cuenta_param_return $tipo_cuentaParameterGeneral,bool $isEsNuevotipo_cuenta,array $clases) : tipo_cuenta_param_return {
		 try {	
			$tipo_cuentaReturnGeneral=new tipo_cuenta_param_return();
	
			$tipo_cuentaReturnGeneral->settipo_cuenta($tipo_cuenta);
			$tipo_cuentaReturnGeneral->settipo_cuentas($tipo_cuentas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_cuentaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $tipo_cuentaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_cuentas,tipo_cuenta $tipo_cuenta,tipo_cuenta_param_return $tipo_cuentaParameterGeneral,bool $isEsNuevotipo_cuenta,array $clases) : tipo_cuenta_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_cuentaReturnGeneral=new tipo_cuenta_param_return();
	
			$tipo_cuentaReturnGeneral->settipo_cuenta($tipo_cuenta);
			$tipo_cuentaReturnGeneral->settipo_cuentas($tipo_cuentas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_cuentaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_cuentaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_cuentas,tipo_cuenta $tipo_cuenta,tipo_cuenta_param_return $tipo_cuentaParameterGeneral,bool $isEsNuevotipo_cuenta,array $clases) : tipo_cuenta_param_return {
		 try {	
			$tipo_cuentaReturnGeneral=new tipo_cuenta_param_return();
	
			$tipo_cuentaReturnGeneral->settipo_cuenta($tipo_cuenta);
			$tipo_cuentaReturnGeneral->settipo_cuentas($tipo_cuentas);
			
			
			
			return $tipo_cuentaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_cuentas,tipo_cuenta $tipo_cuenta,tipo_cuenta_param_return $tipo_cuentaParameterGeneral,bool $isEsNuevotipo_cuenta,array $clases) : tipo_cuenta_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_cuentaReturnGeneral=new tipo_cuenta_param_return();
	
			$tipo_cuentaReturnGeneral->settipo_cuenta($tipo_cuenta);
			$tipo_cuentaReturnGeneral->settipo_cuentas($tipo_cuentas);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_cuentaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,tipo_cuenta $tipo_cuenta,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,tipo_cuenta $tipo_cuenta,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		tipo_cuenta_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(tipo_cuenta $tipo_cuenta,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_cuenta_logic_add::updatetipo_cuentaToGet($this->tipo_cuenta);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$tipo_cuenta->setcuentas($this->tipo_cuentaDataAccess->getcuentas($this->connexion,$tipo_cuenta));
		$tipo_cuenta->setsaldo_cuentas($this->tipo_cuentaDataAccess->getsaldo_cuentas($this->connexion,$tipo_cuenta));
		$tipo_cuenta->setcuenta_predefinidas($this->tipo_cuentaDataAccess->getcuenta_predefinidas($this->connexion,$tipo_cuenta));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_cuenta->setcuentas($this->tipo_cuentaDataAccess->getcuentas($this->connexion,$tipo_cuenta));

				if($this->isConDeep) {
					$cuentaLogic= new cuenta_logic($this->connexion);
					$cuentaLogic->setcuentas($tipo_cuenta->getcuentas());
					$classesLocal=cuenta_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cuentaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cuenta_util::refrescarFKDescripciones($cuentaLogic->getcuentas());
					$tipo_cuenta->setcuentas($cuentaLogic->getcuentas());
				}

				continue;
			}

			if($clas->clas==saldo_cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_cuenta->setsaldo_cuentas($this->tipo_cuentaDataAccess->getsaldo_cuentas($this->connexion,$tipo_cuenta));

				if($this->isConDeep) {
					$saldocuentaLogic= new saldo_cuenta_logic($this->connexion);
					$saldocuentaLogic->setsaldo_cuentas($tipo_cuenta->getsaldo_cuentas());
					$classesLocal=saldo_cuenta_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$saldocuentaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					saldo_cuenta_util::refrescarFKDescripciones($saldocuentaLogic->getsaldo_cuentas());
					$tipo_cuenta->setsaldo_cuentas($saldocuentaLogic->getsaldo_cuentas());
				}

				continue;
			}

			if($clas->clas==cuenta_predefinida::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_cuenta->setcuenta_predefinidas($this->tipo_cuentaDataAccess->getcuenta_predefinidas($this->connexion,$tipo_cuenta));

				if($this->isConDeep) {
					$cuentapredefinidaLogic= new cuenta_predefinida_logic($this->connexion);
					$cuentapredefinidaLogic->setcuenta_predefinidas($tipo_cuenta->getcuenta_predefinidas());
					$classesLocal=cuenta_predefinida_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cuentapredefinidaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cuenta_predefinida_util::refrescarFKDescripciones($cuentapredefinidaLogic->getcuenta_predefinidas());
					$tipo_cuenta->setcuenta_predefinidas($cuentapredefinidaLogic->getcuenta_predefinidas());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta::$class);
			$tipo_cuenta->setcuentas($this->tipo_cuentaDataAccess->getcuentas($this->connexion,$tipo_cuenta));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==saldo_cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(saldo_cuenta::$class);
			$tipo_cuenta->setsaldo_cuentas($this->tipo_cuentaDataAccess->getsaldo_cuentas($this->connexion,$tipo_cuenta));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_predefinida::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_predefinida::$class);
			$tipo_cuenta->setcuenta_predefinidas($this->tipo_cuentaDataAccess->getcuenta_predefinidas($this->connexion,$tipo_cuenta));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$tipo_cuenta->setcuentas($this->tipo_cuentaDataAccess->getcuentas($this->connexion,$tipo_cuenta));

		foreach($tipo_cuenta->getcuentas() as $cuenta) {
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($cuenta,$isDeep,$deepLoadType,$clases);
		}

		$tipo_cuenta->setsaldo_cuentas($this->tipo_cuentaDataAccess->getsaldo_cuentas($this->connexion,$tipo_cuenta));

		foreach($tipo_cuenta->getsaldo_cuentas() as $saldocuenta) {
			$saldocuentaLogic= new saldo_cuenta_logic($this->connexion);
			$saldocuentaLogic->deepLoad($saldocuenta,$isDeep,$deepLoadType,$clases);
		}

		$tipo_cuenta->setcuenta_predefinidas($this->tipo_cuentaDataAccess->getcuenta_predefinidas($this->connexion,$tipo_cuenta));

		foreach($tipo_cuenta->getcuenta_predefinidas() as $cuentapredefinida) {
			$cuentapredefinidaLogic= new cuenta_predefinida_logic($this->connexion);
			$cuentapredefinidaLogic->deepLoad($cuentapredefinida,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_cuenta->setcuentas($this->tipo_cuentaDataAccess->getcuentas($this->connexion,$tipo_cuenta));

				foreach($tipo_cuenta->getcuentas() as $cuenta) {
					$cuentaLogic= new cuenta_logic($this->connexion);
					$cuentaLogic->deepLoad($cuenta,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==saldo_cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_cuenta->setsaldo_cuentas($this->tipo_cuentaDataAccess->getsaldo_cuentas($this->connexion,$tipo_cuenta));

				foreach($tipo_cuenta->getsaldo_cuentas() as $saldocuenta) {
					$saldocuentaLogic= new saldo_cuenta_logic($this->connexion);
					$saldocuentaLogic->deepLoad($saldocuenta,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cuenta_predefinida::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_cuenta->setcuenta_predefinidas($this->tipo_cuentaDataAccess->getcuenta_predefinidas($this->connexion,$tipo_cuenta));

				foreach($tipo_cuenta->getcuenta_predefinidas() as $cuentapredefinida) {
					$cuentapredefinidaLogic= new cuenta_predefinida_logic($this->connexion);
					$cuentapredefinidaLogic->deepLoad($cuentapredefinida,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta::$class);
			$tipo_cuenta->setcuentas($this->tipo_cuentaDataAccess->getcuentas($this->connexion,$tipo_cuenta));

			foreach($tipo_cuenta->getcuentas() as $cuenta) {
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($cuenta,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==saldo_cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(saldo_cuenta::$class);
			$tipo_cuenta->setsaldo_cuentas($this->tipo_cuentaDataAccess->getsaldo_cuentas($this->connexion,$tipo_cuenta));

			foreach($tipo_cuenta->getsaldo_cuentas() as $saldocuenta) {
				$saldocuentaLogic= new saldo_cuenta_logic($this->connexion);
				$saldocuentaLogic->deepLoad($saldocuenta,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_predefinida::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_predefinida::$class);
			$tipo_cuenta->setcuenta_predefinidas($this->tipo_cuentaDataAccess->getcuenta_predefinidas($this->connexion,$tipo_cuenta));

			foreach($tipo_cuenta->getcuenta_predefinidas() as $cuentapredefinida) {
				$cuentapredefinidaLogic= new cuenta_predefinida_logic($this->connexion);
				$cuentapredefinidaLogic->deepLoad($cuentapredefinida,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(tipo_cuenta $tipo_cuenta,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_cuenta_logic_add::updatetipo_cuentaToSave($this->tipo_cuenta);			
			
			if(!$paraDeleteCascade) {				
				tipo_cuenta_data::save($tipo_cuenta, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($tipo_cuenta->getcuentas() as $cuenta) {
			$cuenta->setid_tipo_cuenta($tipo_cuenta->getId());
			cuenta_data::save($cuenta,$this->connexion);
		}


		foreach($tipo_cuenta->getsaldo_cuentas() as $saldocuenta) {
			$saldocuenta->setid_tipo_cuenta($tipo_cuenta->getId());
			saldo_cuenta_data::save($saldocuenta,$this->connexion);
		}


		foreach($tipo_cuenta->getcuenta_predefinidas() as $cuentapredefinida) {
			$cuentapredefinida->setid_tipo_cuenta($tipo_cuenta->getId());
			cuenta_predefinida_data::save($cuentapredefinida,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_cuenta->getcuentas() as $cuenta) {
					$cuenta->setid_tipo_cuenta($tipo_cuenta->getId());
					cuenta_data::save($cuenta,$this->connexion);
				}

				continue;
			}

			if($clas->clas==saldo_cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_cuenta->getsaldo_cuentas() as $saldocuenta) {
					$saldocuenta->setid_tipo_cuenta($tipo_cuenta->getId());
					saldo_cuenta_data::save($saldocuenta,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cuenta_predefinida::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_cuenta->getcuenta_predefinidas() as $cuentapredefinida) {
					$cuentapredefinida->setid_tipo_cuenta($tipo_cuenta->getId());
					cuenta_predefinida_data::save($cuentapredefinida,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta::$class);

			foreach($tipo_cuenta->getcuentas() as $cuenta) {
				$cuenta->setid_tipo_cuenta($tipo_cuenta->getId());
				cuenta_data::save($cuenta,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==saldo_cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(saldo_cuenta::$class);

			foreach($tipo_cuenta->getsaldo_cuentas() as $saldocuenta) {
				$saldocuenta->setid_tipo_cuenta($tipo_cuenta->getId());
				saldo_cuenta_data::save($saldocuenta,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_predefinida::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_predefinida::$class);

			foreach($tipo_cuenta->getcuenta_predefinidas() as $cuentapredefinida) {
				$cuentapredefinida->setid_tipo_cuenta($tipo_cuenta->getId());
				cuenta_predefinida_data::save($cuentapredefinida,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($tipo_cuenta->getcuentas() as $cuenta) {
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuenta->setid_tipo_cuenta($tipo_cuenta->getId());
			cuenta_data::save($cuenta,$this->connexion);
			$cuentaLogic->deepSave($cuenta,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($tipo_cuenta->getsaldo_cuentas() as $saldocuenta) {
			$saldocuentaLogic= new saldo_cuenta_logic($this->connexion);
			$saldocuenta->setid_tipo_cuenta($tipo_cuenta->getId());
			saldo_cuenta_data::save($saldocuenta,$this->connexion);
			$saldocuentaLogic->deepSave($saldocuenta,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($tipo_cuenta->getcuenta_predefinidas() as $cuentapredefinida) {
			$cuentapredefinidaLogic= new cuenta_predefinida_logic($this->connexion);
			$cuentapredefinida->setid_tipo_cuenta($tipo_cuenta->getId());
			cuenta_predefinida_data::save($cuentapredefinida,$this->connexion);
			$cuentapredefinidaLogic->deepSave($cuentapredefinida,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_cuenta->getcuentas() as $cuenta) {
					$cuentaLogic= new cuenta_logic($this->connexion);
					$cuenta->setid_tipo_cuenta($tipo_cuenta->getId());
					cuenta_data::save($cuenta,$this->connexion);
					$cuentaLogic->deepSave($cuenta,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==saldo_cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_cuenta->getsaldo_cuentas() as $saldocuenta) {
					$saldocuentaLogic= new saldo_cuenta_logic($this->connexion);
					$saldocuenta->setid_tipo_cuenta($tipo_cuenta->getId());
					saldo_cuenta_data::save($saldocuenta,$this->connexion);
					$saldocuentaLogic->deepSave($saldocuenta,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cuenta_predefinida::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_cuenta->getcuenta_predefinidas() as $cuentapredefinida) {
					$cuentapredefinidaLogic= new cuenta_predefinida_logic($this->connexion);
					$cuentapredefinida->setid_tipo_cuenta($tipo_cuenta->getId());
					cuenta_predefinida_data::save($cuentapredefinida,$this->connexion);
					$cuentapredefinidaLogic->deepSave($cuentapredefinida,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {



		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta::$class);

			foreach($tipo_cuenta->getcuentas() as $cuenta) {
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuenta->setid_tipo_cuenta($tipo_cuenta->getId());
				cuenta_data::save($cuenta,$this->connexion);
				$cuentaLogic->deepSave($cuenta,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==saldo_cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(saldo_cuenta::$class);

			foreach($tipo_cuenta->getsaldo_cuentas() as $saldocuenta) {
				$saldocuentaLogic= new saldo_cuenta_logic($this->connexion);
				$saldocuenta->setid_tipo_cuenta($tipo_cuenta->getId());
				saldo_cuenta_data::save($saldocuenta,$this->connexion);
				$saldocuentaLogic->deepSave($saldocuenta,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_predefinida::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_predefinida::$class);

			foreach($tipo_cuenta->getcuenta_predefinidas() as $cuentapredefinida) {
				$cuentapredefinidaLogic= new cuenta_predefinida_logic($this->connexion);
				$cuentapredefinida->setid_tipo_cuenta($tipo_cuenta->getId());
				cuenta_predefinida_data::save($cuentapredefinida,$this->connexion);
				$cuentapredefinidaLogic->deepSave($cuentapredefinida,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				tipo_cuenta_data::save($tipo_cuenta, $this->connexion);
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
			
			$this->deepLoad($this->tipo_cuenta,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->tipo_cuentas as $tipo_cuenta) {
				$this->deepLoad($tipo_cuenta,$isDeep,$deepLoadType,$clases);
								
				tipo_cuenta_util::refrescarFKDescripciones($this->tipo_cuentas);
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
			
			foreach($this->tipo_cuentas as $tipo_cuenta) {
				$this->deepLoad($tipo_cuenta,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->tipo_cuenta,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->tipo_cuentas as $tipo_cuenta) {
				$this->deepSave($tipo_cuenta,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->tipo_cuentas as $tipo_cuenta) {
				$this->deepSave($tipo_cuenta,$isDeep,$deepLoadType,$clases,false);
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
				
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
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
				
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(saldo_cuenta::$class);
				$classes[]=new Classe(cuenta_predefinida::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==saldo_cuenta::$class) {
						$classes[]=new Classe(saldo_cuenta::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==cuenta_predefinida::$class) {
						$classes[]=new Classe(cuenta_predefinida::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==saldo_cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(saldo_cuenta::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==cuenta_predefinida::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_predefinida::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function gettipo_cuenta() : ?tipo_cuenta {	
		/*
		tipo_cuenta_logic_add::checktipo_cuentaToGet($this->tipo_cuenta,$this->datosCliente);
		tipo_cuenta_logic_add::updatetipo_cuentaToGet($this->tipo_cuenta);
		*/
			
		return $this->tipo_cuenta;
	}
		
	public function settipo_cuenta(tipo_cuenta $newtipo_cuenta) {
		$this->tipo_cuenta = $newtipo_cuenta;
	}
	
	public function gettipo_cuentas() : array {		
		/*
		tipo_cuenta_logic_add::checktipo_cuentaToGets($this->tipo_cuentas,$this->datosCliente);
		
		foreach ($this->tipo_cuentas as $tipo_cuentaLocal ) {
			tipo_cuenta_logic_add::updatetipo_cuentaToGet($tipo_cuentaLocal);
		}
		*/
		
		return $this->tipo_cuentas;
	}
	
	public function settipo_cuentas(array $newtipo_cuentas) {
		$this->tipo_cuentas = $newtipo_cuentas;
	}
	
	public function gettipo_cuentaDataAccess() : tipo_cuenta_data {
		return $this->tipo_cuentaDataAccess;
	}
	
	public function settipo_cuentaDataAccess(tipo_cuenta_data $newtipo_cuentaDataAccess) {
		$this->tipo_cuentaDataAccess = $newtipo_cuentaDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        tipo_cuenta_carga::$CONTROLLER;;        
		
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
