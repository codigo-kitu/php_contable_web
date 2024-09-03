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

namespace com\bydan\contabilidad\seguridad\ciudad\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_carga;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_param_return;

use com\bydan\contabilidad\seguridad\ciudad\presentation\session\ciudad_session;

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

use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;
use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;
use com\bydan\contabilidad\seguridad\ciudad\business\data\ciudad_data;

//FK


use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;
use com\bydan\contabilidad\seguridad\provincia\business\data\provincia_data;
use com\bydan\contabilidad\seguridad\provincia\business\logic\provincia_logic;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_util;

//REL


use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\seguridad\dato_general_usuario\business\entity\dato_general_usuario;
use com\bydan\contabilidad\seguridad\dato_general_usuario\business\data\dato_general_usuario_data;
use com\bydan\contabilidad\seguridad\dato_general_usuario\business\logic\dato_general_usuario_logic;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_carga;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_util;

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\business\data\sucursal_data;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\sucursal\util\sucursal_carga;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL DETALLES




class ciudad_logic  extends GeneralEntityLogic implements ciudad_logicI {	
	/*GENERAL*/
	public ciudad_data $ciudadDataAccess;
	//public ?ciudad_logic_add $ciudadLogicAdditional=null;
	public ?ciudad $ciudad;
	public array $ciudads;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->ciudadDataAccess = new ciudad_data();			
			$this->ciudads = array();
			$this->ciudad = new ciudad();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->ciudadLogicAdditional = new ciudad_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->ciudadLogicAdditional==null) {
		//	$this->ciudadLogicAdditional=new ciudad_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->ciudadDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->ciudadDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->ciudadDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->ciudadDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->ciudads = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->ciudads=$this->ciudadDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ciudad_util::refrescarFKDescripciones($this->ciudads);
			}
			
			//ciudad_logic_add::checkciudadToGets($this->ciudads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ciudads);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->ciudads = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->ciudads=$this->ciudadDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ciudad_util::refrescarFKDescripciones($this->ciudads);
			}
			
			//ciudad_logic_add::checkciudadToGets($this->ciudads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ciudads);
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
		$this->ciudad = new ciudad();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->ciudad=$this->ciudadDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->ciudad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				ciudad_util::refrescarFKDescripcion($this->ciudad);
			}
						
			//ciudad_logic_add::checkciudadToGet($this->ciudad,$this->datosCliente);
			//ciudad_logic_add::updateciudadToGet($this->ciudad);
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
		$this->ciudad = new  ciudad();
		  		  
        try {		
			$this->ciudad=$this->ciudadDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->ciudad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				ciudad_util::refrescarFKDescripcion($this->ciudad);
			}
			
			//ciudad_logic_add::checkciudadToGet($this->ciudad,$this->datosCliente);
			//ciudad_logic_add::updateciudadToGet($this->ciudad);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?ciudad {
		$ciudadLogic = new  ciudad_logic();
		  		  
        try {		
			$ciudadLogic->setConnexion($connexion);			
			$ciudadLogic->getEntity($id);			
			return $ciudadLogic->getciudad();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->ciudad = new  ciudad();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->ciudad=$this->ciudadDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->ciudad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				ciudad_util::refrescarFKDescripcion($this->ciudad);
			}
			
			//ciudad_logic_add::checkciudadToGet($this->ciudad,$this->datosCliente);
			//ciudad_logic_add::updateciudadToGet($this->ciudad);
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
		$this->ciudad = new  ciudad();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->ciudad=$this->ciudadDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->ciudad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				ciudad_util::refrescarFKDescripcion($this->ciudad);
			}
			
			//ciudad_logic_add::checkciudadToGet($this->ciudad,$this->datosCliente);
			//ciudad_logic_add::updateciudadToGet($this->ciudad);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?ciudad {
		$ciudadLogic = new  ciudad_logic();
		  		  
        try {		
			$ciudadLogic->setConnexion($connexion);			
			$ciudadLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $ciudadLogic->getciudad();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->ciudads = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->ciudads=$this->ciudadDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ciudad_util::refrescarFKDescripciones($this->ciudads);
			}
			
			//ciudad_logic_add::checkciudadToGets($this->ciudads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ciudads);			
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
		$this->ciudads = array();
		  		  
        try {			
			$this->ciudads=$this->ciudadDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ciudad_util::refrescarFKDescripciones($this->ciudads);
			}
			
			//ciudad_logic_add::checkciudadToGets($this->ciudads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ciudads);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->ciudads = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->ciudads=$this->ciudadDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ciudad_util::refrescarFKDescripciones($this->ciudads);
			}
			
			//ciudad_logic_add::checkciudadToGets($this->ciudads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ciudads);
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
		$this->ciudads = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->ciudads=$this->ciudadDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ciudad_util::refrescarFKDescripciones($this->ciudads);
			}
			
			//ciudad_logic_add::checkciudadToGets($this->ciudads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ciudads);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$ciudadLogic = new  ciudad_logic();
		  		  
        try {		
			$ciudadLogic->setConnexion($connexion);			
			$ciudadLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $ciudadLogic->getciudads();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->ciudads = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->ciudads=$this->ciudadDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ciudad_util::refrescarFKDescripciones($this->ciudads);
			}
			
			//ciudad_logic_add::checkciudadToGets($this->ciudads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ciudads);
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
		$this->ciudads = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->ciudads=$this->ciudadDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ciudad_util::refrescarFKDescripciones($this->ciudads);
			}
			
			//ciudad_logic_add::checkciudadToGets($this->ciudads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ciudads);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->ciudads = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->ciudads=$this->ciudadDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ciudad_util::refrescarFKDescripciones($this->ciudads);
			}
			
			//ciudad_logic_add::checkciudadToGets($this->ciudads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ciudads);
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
		$this->ciudads = array();
		  		  
        try {			
			$this->ciudads=$this->ciudadDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ciudad_util::refrescarFKDescripciones($this->ciudads);
			}	
			
			//ciudad_logic_add::checkciudadToGets($this->ciudads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ciudads);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->ciudads = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->ciudads=$this->ciudadDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ciudad_util::refrescarFKDescripciones($this->ciudads);
			}
			
			//ciudad_logic_add::checkciudadToGets($this->ciudads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ciudads);
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
		$this->ciudads = array();
		  		  
        try {		
			$this->ciudads=$this->ciudadDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ciudad_util::refrescarFKDescripciones($this->ciudads);
			}
			
			//ciudad_logic_add::checkciudadToGets($this->ciudads,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->ciudads);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsBusquedaPorCodigoWithConnection(string $strFinalQuery,Pagination $pagination,string $codigo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralcodigo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralcodigo->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$codigo."%",ciudad_util::$CODIGO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralcodigo);

			$this->ciudads=$this->ciudadDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				ciudad_util::refrescarFKDescripciones($this->ciudads);
			}
			//ciudad_logic_add::checkciudadToGets($this->ciudads,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->ciudads);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorCodigo(string $strFinalQuery,Pagination $pagination,string $codigo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralcodigo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralcodigo->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$codigo."%",ciudad_util::$CODIGO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralcodigo);

			$this->ciudads=$this->ciudadDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				ciudad_util::refrescarFKDescripciones($this->ciudads);
			}
			//ciudad_logic_add::checkciudadToGets($this->ciudads,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->ciudads);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsBusquedaPorNombreWithConnection(string $strFinalQuery,Pagination $pagination,string $nombre) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralnombre= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre."%",ciudad_util::$NOMBRE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre);

			$this->ciudads=$this->ciudadDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				ciudad_util::refrescarFKDescripciones($this->ciudads);
			}
			//ciudad_logic_add::checkciudadToGets($this->ciudads,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->ciudads);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorNombre(string $strFinalQuery,Pagination $pagination,string $nombre) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralnombre= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre."%",ciudad_util::$NOMBRE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre);

			$this->ciudads=$this->ciudadDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				ciudad_util::refrescarFKDescripciones($this->ciudads);
			}
			//ciudad_logic_add::checkciudadToGets($this->ciudads,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->ciudads);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdprovinciaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_provincia) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_provincia= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_provincia->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_provincia,ciudad_util::$ID_PROVINCIA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_provincia);

			$this->ciudads=$this->ciudadDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				ciudad_util::refrescarFKDescripciones($this->ciudads);
			}
			//ciudad_logic_add::checkciudadToGets($this->ciudads,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->ciudads);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idprovincia(string $strFinalQuery,Pagination $pagination,int $id_provincia) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_provincia= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_provincia->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_provincia,ciudad_util::$ID_PROVINCIA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_provincia);

			$this->ciudads=$this->ciudadDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				ciudad_util::refrescarFKDescripciones($this->ciudads);
			}
			//ciudad_logic_add::checkciudadToGets($this->ciudads,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->ciudads);
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
						
			//ciudad_logic_add::checkciudadToSave($this->ciudad,$this->datosCliente,$this->connexion);	       
			//ciudad_logic_add::updateciudadToSave($this->ciudad);			
			ciudad_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->ciudad,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->ciudadLogicAdditional->checkGeneralEntityToSave($this,$this->ciudad,$this->datosCliente,$this->connexion);
			
			
			ciudad_data::save($this->ciudad, $this->connexion);	    	       	 				
			//ciudad_logic_add::checkciudadToSaveAfter($this->ciudad,$this->datosCliente,$this->connexion);			
			//$this->ciudadLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->ciudad,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->ciudad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->ciudad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				ciudad_util::refrescarFKDescripcion($this->ciudad);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->ciudad->getIsDeleted()) {
				$this->ciudad=null;
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
						
			/*ciudad_logic_add::checkciudadToSave($this->ciudad,$this->datosCliente,$this->connexion);*/	        
			//ciudad_logic_add::updateciudadToSave($this->ciudad);			
			//$this->ciudadLogicAdditional->checkGeneralEntityToSave($this,$this->ciudad,$this->datosCliente,$this->connexion);			
			ciudad_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->ciudad,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			ciudad_data::save($this->ciudad, $this->connexion);	    	       	 						
			/*ciudad_logic_add::checkciudadToSaveAfter($this->ciudad,$this->datosCliente,$this->connexion);*/			
			//$this->ciudadLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->ciudad,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->ciudad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->ciudad,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				ciudad_util::refrescarFKDescripcion($this->ciudad);				
			}
			
			if($this->ciudad->getIsDeleted()) {
				$this->ciudad=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(ciudad $ciudad,Connexion $connexion)  {
		$ciudadLogic = new  ciudad_logic();		  		  
        try {		
			$ciudadLogic->setConnexion($connexion);			
			$ciudadLogic->setciudad($ciudad);			
			$ciudadLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*ciudad_logic_add::checkciudadToSaves($this->ciudads,$this->datosCliente,$this->connexion);*/	        	
			//$this->ciudadLogicAdditional->checkGeneralEntitiesToSaves($this,$this->ciudads,$this->datosCliente,$this->connexion);
			
	   		foreach($this->ciudads as $ciudadLocal) {				
								
				//ciudad_logic_add::updateciudadToSave($ciudadLocal);	        	
				ciudad_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$ciudadLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				ciudad_data::save($ciudadLocal, $this->connexion);				
			}
			
			/*ciudad_logic_add::checkciudadToSavesAfter($this->ciudads,$this->datosCliente,$this->connexion);*/			
			//$this->ciudadLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->ciudads,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ciudad_util::refrescarFKDescripciones($this->ciudads);
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
			/*ciudad_logic_add::checkciudadToSaves($this->ciudads,$this->datosCliente,$this->connexion);*/			
			//$this->ciudadLogicAdditional->checkGeneralEntitiesToSaves($this,$this->ciudads,$this->datosCliente,$this->connexion);
			
	   		foreach($this->ciudads as $ciudadLocal) {				
								
				//ciudad_logic_add::updateciudadToSave($ciudadLocal);	        	
				ciudad_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$ciudadLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				ciudad_data::save($ciudadLocal, $this->connexion);				
			}			
			
			/*ciudad_logic_add::checkciudadToSavesAfter($this->ciudads,$this->datosCliente,$this->connexion);*/			
			//$this->ciudadLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->ciudads,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				ciudad_util::refrescarFKDescripciones($this->ciudads);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $ciudads,Connexion $connexion)  {
		$ciudadLogic = new  ciudad_logic();
		  		  
        try {		
			$ciudadLogic->setConnexion($connexion);			
			$ciudadLogic->setciudads($ciudads);			
			$ciudadLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$ciudadsAux=array();
		
		foreach($this->ciudads as $ciudad) {
			if($ciudad->getIsDeleted()==false) {
				$ciudadsAux[]=$ciudad;
			}
		}
		
		$this->ciudads=$ciudadsAux;
	}
	
	public function updateToGetsAuxiliar(array &$ciudads) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->ciudads as $ciudad) {
				
				$ciudad->setid_provincia_Descripcion(ciudad_util::getprovinciaDescripcion($ciudad->getprovincia()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$ciudad_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$ciudad_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$ciudad_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$ciudad_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$ciudad_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$ciudadForeignKey=new ciudad_param_return();//ciudadForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_provincia',$strRecargarFkTipos,',')) {
				$this->cargarCombosprovinciasFK($this->connexion,$strRecargarFkQuery,$ciudadForeignKey,$ciudad_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_provincia',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosprovinciasFK($this->connexion,' where id=-1 ',$ciudadForeignKey,$ciudad_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $ciudadForeignKey;
			
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
	
	
	public function cargarCombosprovinciasFK($connexion=null,$strRecargarFkQuery='',$ciudadForeignKey,$ciudad_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$provinciaLogic= new provincia_logic();
		$pagination= new Pagination();
		$ciudadForeignKey->provinciasFK=array();

		$provinciaLogic->setConnexion($connexion);
		$provinciaLogic->getprovinciaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($ciudad_session==null) {
			$ciudad_session=new ciudad_session();
		}
		
		if($ciudad_session->bitBusquedaDesdeFKSesionprovincia!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=provincia_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalprovincia=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalprovincia=Funciones::GetFinalQueryAppend($finalQueryGlobalprovincia, '');
				$finalQueryGlobalprovincia.=provincia_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalprovincia.$strRecargarFkQuery;		

				$provinciaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($provinciaLogic->getprovincias() as $provinciaLocal ) {
				if($ciudadForeignKey->idprovinciaDefaultFK==0) {
					$ciudadForeignKey->idprovinciaDefaultFK=$provinciaLocal->getId();
				}

				$ciudadForeignKey->provinciasFK[$provinciaLocal->getId()]=ciudad_util::getprovinciaDescripcion($provinciaLocal);
			}

		} else {

			if($ciudad_session->bigidprovinciaActual!=null && $ciudad_session->bigidprovinciaActual > 0) {
				$provinciaLogic->getEntity($ciudad_session->bigidprovinciaActual);//WithConnection

				$ciudadForeignKey->provinciasFK[$provinciaLogic->getprovincia()->getId()]=ciudad_util::getprovinciaDescripcion($provinciaLogic->getprovincia());
				$ciudadForeignKey->idprovinciaDefaultFK=$provinciaLogic->getprovincia()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($ciudad,$proveedors,$clientes,$datogeneralusuarios,$sucursals,$empresas) {
		$this->saveRelacionesBase($ciudad,$proveedors,$clientes,$datogeneralusuarios,$sucursals,$empresas,true);
	}

	public function saveRelaciones($ciudad,$proveedors,$clientes,$datogeneralusuarios,$sucursals,$empresas) {
		$this->saveRelacionesBase($ciudad,$proveedors,$clientes,$datogeneralusuarios,$sucursals,$empresas,false);
	}

	public function saveRelacionesBase($ciudad,$proveedors=array(),$clientes=array(),$datogeneralusuarios=array(),$sucursals=array(),$empresas=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$ciudad->setproveedors($proveedors);
			$ciudad->setclientes($clientes);
			$ciudad->setdato_general_usuarios($datogeneralusuarios);
			$ciudad->setsucursals($sucursals);
			$ciudad->setempresas($empresas);
			$this->setciudad($ciudad);

			if(true) {

				//ciudad_logic_add::updateRelacionesToSave($ciudad,$this);

				if(($this->ciudad->getIsNew() || $this->ciudad->getIsChanged()) && !$this->ciudad->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($proveedors,$clientes,$datogeneralusuarios,$sucursals,$empresas);

				} else if($this->ciudad->getIsDeleted()) {
					$this->saveRelacionesDetalles($proveedors,$clientes,$datogeneralusuarios,$sucursals,$empresas);
					$this->save();
				}

				//ciudad_logic_add::updateRelacionesToSaveAfter($ciudad,$this);

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
	
	
	public function saveRelacionesDetalles($proveedors=array(),$clientes=array(),$datogeneralusuarios=array(),$sucursals=array(),$empresas=array()) {
		try {
	

			$idciudadActual=$this->getciudad()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/proveedor_carga.php');
			proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$proveedorLogic_Desde_ciudad=new proveedor_logic();
			$proveedorLogic_Desde_ciudad->setproveedors($proveedors);

			$proveedorLogic_Desde_ciudad->setConnexion($this->getConnexion());
			$proveedorLogic_Desde_ciudad->setDatosCliente($this->datosCliente);

			foreach($proveedorLogic_Desde_ciudad->getproveedors() as $proveedor_Desde_ciudad) {
				$proveedor_Desde_ciudad->setid_ciudad($idciudadActual);

				$proveedorLogic_Desde_ciudad->setproveedor($proveedor_Desde_ciudad);
				$proveedorLogic_Desde_ciudad->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cliente_carga.php');
			cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$clienteLogic_Desde_ciudad=new cliente_logic();
			$clienteLogic_Desde_ciudad->setclientes($clientes);

			$clienteLogic_Desde_ciudad->setConnexion($this->getConnexion());
			$clienteLogic_Desde_ciudad->setDatosCliente($this->datosCliente);

			foreach($clienteLogic_Desde_ciudad->getclientes() as $cliente_Desde_ciudad) {
				$cliente_Desde_ciudad->setid_ciudad($idciudadActual);

				$clienteLogic_Desde_ciudad->setcliente($cliente_Desde_ciudad);
				$clienteLogic_Desde_ciudad->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/dato_general_usuario_carga.php');
			dato_general_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$datogeneralusuarioLogic_Desde_ciudad=new dato_general_usuario_logic();
			$datogeneralusuarioLogic_Desde_ciudad->setdato_general_usuarios($datogeneralusuarios);

			$datogeneralusuarioLogic_Desde_ciudad->setConnexion($this->getConnexion());
			$datogeneralusuarioLogic_Desde_ciudad->setDatosCliente($this->datosCliente);

			foreach($datogeneralusuarioLogic_Desde_ciudad->getdato_general_usuarios() as $datogeneralusuario_Desde_ciudad) {
				$datogeneralusuario_Desde_ciudad->setid_ciudad($idciudadActual);
			}

			$datogeneralusuarioLogic_Desde_ciudad->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/util/sucursal_carga.php');
			sucursal_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$sucursalLogic_Desde_ciudad=new sucursal_logic();
			$sucursalLogic_Desde_ciudad->setsucursals($sucursals);

			$sucursalLogic_Desde_ciudad->setConnexion($this->getConnexion());
			$sucursalLogic_Desde_ciudad->setDatosCliente($this->datosCliente);

			foreach($sucursalLogic_Desde_ciudad->getsucursals() as $sucursal_Desde_ciudad) {
				$sucursal_Desde_ciudad->setid_ciudad($idciudadActual);
			}

			$sucursalLogic_Desde_ciudad->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/util/empresa_carga.php');
			empresa_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$empresaLogic_Desde_ciudad=new empresa_logic();
			$empresaLogic_Desde_ciudad->setempresas($empresas);

			$empresaLogic_Desde_ciudad->setConnexion($this->getConnexion());
			$empresaLogic_Desde_ciudad->setDatosCliente($this->datosCliente);

			foreach($empresaLogic_Desde_ciudad->getempresas() as $empresa_Desde_ciudad) {
				$empresa_Desde_ciudad->setid_ciudad($idciudadActual);
			}

			$empresaLogic_Desde_ciudad->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $ciudads,ciudad_param_return $ciudadParameterGeneral) : ciudad_param_return {
		$ciudadReturnGeneral=new ciudad_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $ciudadReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $ciudads,ciudad_param_return $ciudadParameterGeneral) : ciudad_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$ciudadReturnGeneral=new ciudad_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $ciudadReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $ciudads,ciudad $ciudad,ciudad_param_return $ciudadParameterGeneral,bool $isEsNuevociudad,array $clases) : ciudad_param_return {
		 try {	
			$ciudadReturnGeneral=new ciudad_param_return();
	
			$ciudadReturnGeneral->setciudad($ciudad);
			$ciudadReturnGeneral->setciudads($ciudads);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$ciudadReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $ciudadReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $ciudads,ciudad $ciudad,ciudad_param_return $ciudadParameterGeneral,bool $isEsNuevociudad,array $clases) : ciudad_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$ciudadReturnGeneral=new ciudad_param_return();
	
			$ciudadReturnGeneral->setciudad($ciudad);
			$ciudadReturnGeneral->setciudads($ciudads);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$ciudadReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $ciudadReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $ciudads,ciudad $ciudad,ciudad_param_return $ciudadParameterGeneral,bool $isEsNuevociudad,array $clases) : ciudad_param_return {
		 try {	
			$ciudadReturnGeneral=new ciudad_param_return();
	
			$ciudadReturnGeneral->setciudad($ciudad);
			$ciudadReturnGeneral->setciudads($ciudads);
			
			
			
			return $ciudadReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $ciudads,ciudad $ciudad,ciudad_param_return $ciudadParameterGeneral,bool $isEsNuevociudad,array $clases) : ciudad_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$ciudadReturnGeneral=new ciudad_param_return();
	
			$ciudadReturnGeneral->setciudad($ciudad);
			$ciudadReturnGeneral->setciudads($ciudads);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $ciudadReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,ciudad $ciudad,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,ciudad $ciudad,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		ciudad_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		ciudad_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(ciudad $ciudad,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//ciudad_logic_add::updateciudadToGet($this->ciudad);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$ciudad->setprovincia($this->ciudadDataAccess->getprovincia($this->connexion,$ciudad));
		$ciudad->setproveedors($this->ciudadDataAccess->getproveedors($this->connexion,$ciudad));
		$ciudad->setclientes($this->ciudadDataAccess->getclientes($this->connexion,$ciudad));
		$ciudad->setdato_general_usuarios($this->ciudadDataAccess->getdato_general_usuarios($this->connexion,$ciudad));
		$ciudad->setsucursals($this->ciudadDataAccess->getsucursals($this->connexion,$ciudad));
		$ciudad->setempresas($this->ciudadDataAccess->getempresas($this->connexion,$ciudad));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==provincia::$class.'') {
				$ciudad->setprovincia($this->ciudadDataAccess->getprovincia($this->connexion,$ciudad));
				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$ciudad->setproveedors($this->ciudadDataAccess->getproveedors($this->connexion,$ciudad));

				if($this->isConDeep) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->setproveedors($ciudad->getproveedors());
					$classesLocal=proveedor_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					proveedor_util::refrescarFKDescripciones($proveedorLogic->getproveedors());
					$ciudad->setproveedors($proveedorLogic->getproveedors());
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$ciudad->setclientes($this->ciudadDataAccess->getclientes($this->connexion,$ciudad));

				if($this->isConDeep) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->setclientes($ciudad->getclientes());
					$classesLocal=cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$clienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cliente_util::refrescarFKDescripciones($clienteLogic->getclientes());
					$ciudad->setclientes($clienteLogic->getclientes());
				}

				continue;
			}

			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$ciudad->setdato_general_usuarios($this->ciudadDataAccess->getdato_general_usuarios($this->connexion,$ciudad));

				if($this->isConDeep) {
					$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
					$datogeneralusuarioLogic->setdato_general_usuarios($ciudad->getdato_general_usuarios());
					$classesLocal=dato_general_usuario_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$datogeneralusuarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					dato_general_usuario_util::refrescarFKDescripciones($datogeneralusuarioLogic->getdato_general_usuarios());
					$ciudad->setdato_general_usuarios($datogeneralusuarioLogic->getdato_general_usuarios());
				}

				continue;
			}

			if($clas->clas==sucursal::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$ciudad->setsucursals($this->ciudadDataAccess->getsucursals($this->connexion,$ciudad));

				if($this->isConDeep) {
					$sucursalLogic= new sucursal_logic($this->connexion);
					$sucursalLogic->setsucursals($ciudad->getsucursals());
					$classesLocal=sucursal_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$sucursalLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					sucursal_util::refrescarFKDescripciones($sucursalLogic->getsucursals());
					$ciudad->setsucursals($sucursalLogic->getsucursals());
				}

				continue;
			}

			if($clas->clas==empresa::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$ciudad->setempresas($this->ciudadDataAccess->getempresas($this->connexion,$ciudad));

				if($this->isConDeep) {
					$empresaLogic= new empresa_logic($this->connexion);
					$empresaLogic->setempresas($ciudad->getempresas());
					$classesLocal=empresa_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$empresaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					empresa_util::refrescarFKDescripciones($empresaLogic->getempresas());
					$ciudad->setempresas($empresaLogic->getempresas());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==provincia::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$ciudad->setprovincia($this->ciudadDataAccess->getprovincia($this->connexion,$ciudad));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);
			$ciudad->setproveedors($this->ciudadDataAccess->getproveedors($this->connexion,$ciudad));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cliente::$class);
			$ciudad->setclientes($this->ciudadDataAccess->getclientes($this->connexion,$ciudad));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(dato_general_usuario::$class);
			$ciudad->setdato_general_usuarios($this->ciudadDataAccess->getdato_general_usuarios($this->connexion,$ciudad));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(sucursal::$class);
			$ciudad->setsucursals($this->ciudadDataAccess->getsucursals($this->connexion,$ciudad));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(empresa::$class);
			$ciudad->setempresas($this->ciudadDataAccess->getempresas($this->connexion,$ciudad));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$ciudad->setprovincia($this->ciudadDataAccess->getprovincia($this->connexion,$ciudad));
		$provinciaLogic= new provincia_logic($this->connexion);
		$provinciaLogic->deepLoad($ciudad->getprovincia(),$isDeep,$deepLoadType,$clases);
				

		$ciudad->setproveedors($this->ciudadDataAccess->getproveedors($this->connexion,$ciudad));

		foreach($ciudad->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
		}

		$ciudad->setclientes($this->ciudadDataAccess->getclientes($this->connexion,$ciudad));

		foreach($ciudad->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
		}

		$ciudad->setdato_general_usuarios($this->ciudadDataAccess->getdato_general_usuarios($this->connexion,$ciudad));

		foreach($ciudad->getdato_general_usuarios() as $datogeneralusuario) {
			$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
			$datogeneralusuarioLogic->deepLoad($datogeneralusuario,$isDeep,$deepLoadType,$clases);
		}

		$ciudad->setsucursals($this->ciudadDataAccess->getsucursals($this->connexion,$ciudad));

		foreach($ciudad->getsucursals() as $sucursal) {
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($sucursal,$isDeep,$deepLoadType,$clases);
		}

		$ciudad->setempresas($this->ciudadDataAccess->getempresas($this->connexion,$ciudad));

		foreach($ciudad->getempresas() as $empresa) {
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($empresa,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==provincia::$class.'') {
				$ciudad->setprovincia($this->ciudadDataAccess->getprovincia($this->connexion,$ciudad));
				$provinciaLogic= new provincia_logic($this->connexion);
				$provinciaLogic->deepLoad($ciudad->getprovincia(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$ciudad->setproveedors($this->ciudadDataAccess->getproveedors($this->connexion,$ciudad));

				foreach($ciudad->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$ciudad->setclientes($this->ciudadDataAccess->getclientes($this->connexion,$ciudad));

				foreach($ciudad->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$ciudad->setdato_general_usuarios($this->ciudadDataAccess->getdato_general_usuarios($this->connexion,$ciudad));

				foreach($ciudad->getdato_general_usuarios() as $datogeneralusuario) {
					$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
					$datogeneralusuarioLogic->deepLoad($datogeneralusuario,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==sucursal::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$ciudad->setsucursals($this->ciudadDataAccess->getsucursals($this->connexion,$ciudad));

				foreach($ciudad->getsucursals() as $sucursal) {
					$sucursalLogic= new sucursal_logic($this->connexion);
					$sucursalLogic->deepLoad($sucursal,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==empresa::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$ciudad->setempresas($this->ciudadDataAccess->getempresas($this->connexion,$ciudad));

				foreach($ciudad->getempresas() as $empresa) {
					$empresaLogic= new empresa_logic($this->connexion);
					$empresaLogic->deepLoad($empresa,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==provincia::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$ciudad->setprovincia($this->ciudadDataAccess->getprovincia($this->connexion,$ciudad));
			$provinciaLogic= new provincia_logic($this->connexion);
			$provinciaLogic->deepLoad($ciudad->getprovincia(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);
			$ciudad->setproveedors($this->ciudadDataAccess->getproveedors($this->connexion,$ciudad));

			foreach($ciudad->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cliente::$class);
			$ciudad->setclientes($this->ciudadDataAccess->getclientes($this->connexion,$ciudad));

			foreach($ciudad->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(dato_general_usuario::$class);
			$ciudad->setdato_general_usuarios($this->ciudadDataAccess->getdato_general_usuarios($this->connexion,$ciudad));

			foreach($ciudad->getdato_general_usuarios() as $datogeneralusuario) {
				$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
				$datogeneralusuarioLogic->deepLoad($datogeneralusuario,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(sucursal::$class);
			$ciudad->setsucursals($this->ciudadDataAccess->getsucursals($this->connexion,$ciudad));

			foreach($ciudad->getsucursals() as $sucursal) {
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($sucursal,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(empresa::$class);
			$ciudad->setempresas($this->ciudadDataAccess->getempresas($this->connexion,$ciudad));

			foreach($ciudad->getempresas() as $empresa) {
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($empresa,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(ciudad $ciudad,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//ciudad_logic_add::updateciudadToSave($this->ciudad);			
			
			if(!$paraDeleteCascade) {				
				ciudad_data::save($ciudad, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		provincia_data::save($ciudad->getprovincia(),$this->connexion);

		foreach($ciudad->getproveedors() as $proveedor) {
			$proveedor->setid_ciudad($ciudad->getId());
			proveedor_data::save($proveedor,$this->connexion);
		}


		foreach($ciudad->getclientes() as $cliente) {
			$cliente->setid_ciudad($ciudad->getId());
			cliente_data::save($cliente,$this->connexion);
		}


		foreach($ciudad->getdato_general_usuarios() as $datogeneralusuario) {
			$datogeneralusuario->setid_ciudad($ciudad->getId());
			dato_general_usuario_data::save($datogeneralusuario,$this->connexion);
		}


		foreach($ciudad->getsucursals() as $sucursal) {
			$sucursal->setid_ciudad($ciudad->getId());
			sucursal_data::save($sucursal,$this->connexion);
		}


		foreach($ciudad->getempresas() as $empresa) {
			$empresa->setid_ciudad($ciudad->getId());
			empresa_data::save($empresa,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==provincia::$class.'') {
				provincia_data::save($ciudad->getprovincia(),$this->connexion);
				continue;
			}


			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($ciudad->getproveedors() as $proveedor) {
					$proveedor->setid_ciudad($ciudad->getId());
					proveedor_data::save($proveedor,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($ciudad->getclientes() as $cliente) {
					$cliente->setid_ciudad($ciudad->getId());
					cliente_data::save($cliente,$this->connexion);
				}

				continue;
			}

			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($ciudad->getdato_general_usuarios() as $datogeneralusuario) {
					$datogeneralusuario->setid_ciudad($ciudad->getId());
					dato_general_usuario_data::save($datogeneralusuario,$this->connexion);
				}

				continue;
			}

			if($clas->clas==sucursal::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($ciudad->getsucursals() as $sucursal) {
					$sucursal->setid_ciudad($ciudad->getId());
					sucursal_data::save($sucursal,$this->connexion);
				}

				continue;
			}

			if($clas->clas==empresa::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($ciudad->getempresas() as $empresa) {
					$empresa->setid_ciudad($ciudad->getId());
					empresa_data::save($empresa,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==provincia::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			provincia_data::save($ciudad->getprovincia(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);

			foreach($ciudad->getproveedors() as $proveedor) {
				$proveedor->setid_ciudad($ciudad->getId());
				proveedor_data::save($proveedor,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cliente::$class);

			foreach($ciudad->getclientes() as $cliente) {
				$cliente->setid_ciudad($ciudad->getId());
				cliente_data::save($cliente,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(dato_general_usuario::$class);

			foreach($ciudad->getdato_general_usuarios() as $datogeneralusuario) {
				$datogeneralusuario->setid_ciudad($ciudad->getId());
				dato_general_usuario_data::save($datogeneralusuario,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(sucursal::$class);

			foreach($ciudad->getsucursals() as $sucursal) {
				$sucursal->setid_ciudad($ciudad->getId());
				sucursal_data::save($sucursal,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(empresa::$class);

			foreach($ciudad->getempresas() as $empresa) {
				$empresa->setid_ciudad($ciudad->getId());
				empresa_data::save($empresa,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		provincia_data::save($ciudad->getprovincia(),$this->connexion);
		$provinciaLogic= new provincia_logic($this->connexion);
		$provinciaLogic->deepSave($ciudad->getprovincia(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($ciudad->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedor->setid_ciudad($ciudad->getId());
			proveedor_data::save($proveedor,$this->connexion);
			$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($ciudad->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$cliente->setid_ciudad($ciudad->getId());
			cliente_data::save($cliente,$this->connexion);
			$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($ciudad->getdato_general_usuarios() as $datogeneralusuario) {
			$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
			$datogeneralusuario->setid_ciudad($ciudad->getId());
			dato_general_usuario_data::save($datogeneralusuario,$this->connexion);
			$datogeneralusuarioLogic->deepSave($datogeneralusuario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($ciudad->getsucursals() as $sucursal) {
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursal->setid_ciudad($ciudad->getId());
			sucursal_data::save($sucursal,$this->connexion);
			$sucursalLogic->deepSave($sucursal,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($ciudad->getempresas() as $empresa) {
			$empresaLogic= new empresa_logic($this->connexion);
			$empresa->setid_ciudad($ciudad->getId());
			empresa_data::save($empresa,$this->connexion);
			$empresaLogic->deepSave($empresa,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==provincia::$class.'') {
				provincia_data::save($ciudad->getprovincia(),$this->connexion);
				$provinciaLogic= new provincia_logic($this->connexion);
				$provinciaLogic->deepSave($ciudad->getprovincia(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($ciudad->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedor->setid_ciudad($ciudad->getId());
					proveedor_data::save($proveedor,$this->connexion);
					$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($ciudad->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$cliente->setid_ciudad($ciudad->getId());
					cliente_data::save($cliente,$this->connexion);
					$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($ciudad->getdato_general_usuarios() as $datogeneralusuario) {
					$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
					$datogeneralusuario->setid_ciudad($ciudad->getId());
					dato_general_usuario_data::save($datogeneralusuario,$this->connexion);
					$datogeneralusuarioLogic->deepSave($datogeneralusuario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==sucursal::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($ciudad->getsucursals() as $sucursal) {
					$sucursalLogic= new sucursal_logic($this->connexion);
					$sucursal->setid_ciudad($ciudad->getId());
					sucursal_data::save($sucursal,$this->connexion);
					$sucursalLogic->deepSave($sucursal,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==empresa::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($ciudad->getempresas() as $empresa) {
					$empresaLogic= new empresa_logic($this->connexion);
					$empresa->setid_ciudad($ciudad->getId());
					empresa_data::save($empresa,$this->connexion);
					$empresaLogic->deepSave($empresa,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==provincia::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			provincia_data::save($ciudad->getprovincia(),$this->connexion);
			$provinciaLogic= new provincia_logic($this->connexion);
			$provinciaLogic->deepSave($ciudad->getprovincia(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);

			foreach($ciudad->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedor->setid_ciudad($ciudad->getId());
				proveedor_data::save($proveedor,$this->connexion);
				$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cliente::$class);

			foreach($ciudad->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$cliente->setid_ciudad($ciudad->getId());
				cliente_data::save($cliente,$this->connexion);
				$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(dato_general_usuario::$class);

			foreach($ciudad->getdato_general_usuarios() as $datogeneralusuario) {
				$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
				$datogeneralusuario->setid_ciudad($ciudad->getId());
				dato_general_usuario_data::save($datogeneralusuario,$this->connexion);
				$datogeneralusuarioLogic->deepSave($datogeneralusuario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(sucursal::$class);

			foreach($ciudad->getsucursals() as $sucursal) {
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursal->setid_ciudad($ciudad->getId());
				sucursal_data::save($sucursal,$this->connexion);
				$sucursalLogic->deepSave($sucursal,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(empresa::$class);

			foreach($ciudad->getempresas() as $empresa) {
				$empresaLogic= new empresa_logic($this->connexion);
				$empresa->setid_ciudad($ciudad->getId());
				empresa_data::save($empresa,$this->connexion);
				$empresaLogic->deepSave($empresa,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				ciudad_data::save($ciudad, $this->connexion);
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
			
			$this->deepLoad($this->ciudad,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->ciudads as $ciudad) {
				$this->deepLoad($ciudad,$isDeep,$deepLoadType,$clases);
								
				ciudad_util::refrescarFKDescripciones($this->ciudads);
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
			
			foreach($this->ciudads as $ciudad) {
				$this->deepLoad($ciudad,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->ciudad,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->ciudads as $ciudad) {
				$this->deepSave($ciudad,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->ciudads as $ciudad) {
				$this->deepSave($ciudad,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(provincia::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==provincia::$class) {
						$classes[]=new Classe(provincia::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==provincia::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(provincia::$class);
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
				
				$classes[]=new Classe(proveedor::$class);
				$classes[]=new Classe(cliente::$class);
				$classes[]=new Classe(dato_general_usuario::$class);
				$classes[]=new Classe(sucursal::$class);
				$classes[]=new Classe(empresa::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==dato_general_usuario::$class) {
						$classes[]=new Classe(dato_general_usuario::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==sucursal::$class) {
						$classes[]=new Classe(sucursal::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(proveedor::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cliente::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==dato_general_usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(dato_general_usuario::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==sucursal::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(sucursal::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==empresa::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(empresa::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getciudad() : ?ciudad {	
		/*
		ciudad_logic_add::checkciudadToGet($this->ciudad,$this->datosCliente);
		ciudad_logic_add::updateciudadToGet($this->ciudad);
		*/
			
		return $this->ciudad;
	}
		
	public function setciudad(ciudad $newciudad) {
		$this->ciudad = $newciudad;
	}
	
	public function getciudads() : array {		
		/*
		ciudad_logic_add::checkciudadToGets($this->ciudads,$this->datosCliente);
		
		foreach ($this->ciudads as $ciudadLocal ) {
			ciudad_logic_add::updateciudadToGet($ciudadLocal);
		}
		*/
		
		return $this->ciudads;
	}
	
	public function setciudads(array $newciudads) {
		$this->ciudads = $newciudads;
	}
	
	public function getciudadDataAccess() : ciudad_data {
		return $this->ciudadDataAccess;
	}
	
	public function setciudadDataAccess(ciudad_data $newciudadDataAccess) {
		$this->ciudadDataAccess = $newciudadDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        ciudad_carga::$CONTROLLER;;        
		
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
