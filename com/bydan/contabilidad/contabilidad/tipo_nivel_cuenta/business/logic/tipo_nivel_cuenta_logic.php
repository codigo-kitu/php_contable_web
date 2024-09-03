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

namespace com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\util\tipo_nivel_cuenta_carga;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\util\tipo_nivel_cuenta_param_return;


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

use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\util\tipo_nivel_cuenta_util;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\entity\tipo_nivel_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\data\tipo_nivel_cuenta_data;

//FK


//REL


use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\entity\cuenta_predefinida;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\data\cuenta_predefinida_data;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\logic\cuenta_predefinida_logic;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_carga;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_util;

//REL DETALLES




class tipo_nivel_cuenta_logic  extends GeneralEntityLogic implements tipo_nivel_cuenta_logicI {	
	/*GENERAL*/
	public tipo_nivel_cuenta_data $tipo_nivel_cuentaDataAccess;
	//public ?tipo_nivel_cuenta_logic_add $tipo_nivel_cuentaLogicAdditional=null;
	public ?tipo_nivel_cuenta $tipo_nivel_cuenta;
	public array $tipo_nivel_cuentas;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->tipo_nivel_cuentaDataAccess = new tipo_nivel_cuenta_data();			
			$this->tipo_nivel_cuentas = array();
			$this->tipo_nivel_cuenta = new tipo_nivel_cuenta();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->tipo_nivel_cuentaLogicAdditional = new tipo_nivel_cuenta_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->tipo_nivel_cuentaLogicAdditional==null) {
		//	$this->tipo_nivel_cuentaLogicAdditional=new tipo_nivel_cuenta_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->tipo_nivel_cuentaDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->tipo_nivel_cuentaDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->tipo_nivel_cuentaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->tipo_nivel_cuentaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_nivel_cuentas = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_nivel_cuentas=$this->tipo_nivel_cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_nivel_cuenta_util::refrescarFKDescripciones($this->tipo_nivel_cuentas);
			}
			
			//tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToGets($this->tipo_nivel_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_nivel_cuentas);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_nivel_cuentas = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_nivel_cuentas=$this->tipo_nivel_cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_nivel_cuenta_util::refrescarFKDescripciones($this->tipo_nivel_cuentas);
			}
			
			//tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToGets($this->tipo_nivel_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_nivel_cuentas);
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
		$this->tipo_nivel_cuenta = new tipo_nivel_cuenta();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->tipo_nivel_cuenta=$this->tipo_nivel_cuentaDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_nivel_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_nivel_cuenta_util::refrescarFKDescripcion($this->tipo_nivel_cuenta);
			}
						
			//tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToGet($this->tipo_nivel_cuenta,$this->datosCliente);
			//tipo_nivel_cuenta_logic_add::updatetipo_nivel_cuentaToGet($this->tipo_nivel_cuenta);
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
		$this->tipo_nivel_cuenta = new  tipo_nivel_cuenta();
		  		  
        try {		
			$this->tipo_nivel_cuenta=$this->tipo_nivel_cuentaDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_nivel_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_nivel_cuenta_util::refrescarFKDescripcion($this->tipo_nivel_cuenta);
			}
			
			//tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToGet($this->tipo_nivel_cuenta,$this->datosCliente);
			//tipo_nivel_cuenta_logic_add::updatetipo_nivel_cuentaToGet($this->tipo_nivel_cuenta);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?tipo_nivel_cuenta {
		$tipo_nivel_cuentaLogic = new  tipo_nivel_cuenta_logic();
		  		  
        try {		
			$tipo_nivel_cuentaLogic->setConnexion($connexion);			
			$tipo_nivel_cuentaLogic->getEntity($id);			
			return $tipo_nivel_cuentaLogic->gettipo_nivel_cuenta();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->tipo_nivel_cuenta = new  tipo_nivel_cuenta();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->tipo_nivel_cuenta=$this->tipo_nivel_cuentaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_nivel_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_nivel_cuenta_util::refrescarFKDescripcion($this->tipo_nivel_cuenta);
			}
			
			//tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToGet($this->tipo_nivel_cuenta,$this->datosCliente);
			//tipo_nivel_cuenta_logic_add::updatetipo_nivel_cuentaToGet($this->tipo_nivel_cuenta);
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
		$this->tipo_nivel_cuenta = new  tipo_nivel_cuenta();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_nivel_cuenta=$this->tipo_nivel_cuentaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_nivel_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_nivel_cuenta_util::refrescarFKDescripcion($this->tipo_nivel_cuenta);
			}
			
			//tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToGet($this->tipo_nivel_cuenta,$this->datosCliente);
			//tipo_nivel_cuenta_logic_add::updatetipo_nivel_cuentaToGet($this->tipo_nivel_cuenta);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?tipo_nivel_cuenta {
		$tipo_nivel_cuentaLogic = new  tipo_nivel_cuenta_logic();
		  		  
        try {		
			$tipo_nivel_cuentaLogic->setConnexion($connexion);			
			$tipo_nivel_cuentaLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $tipo_nivel_cuentaLogic->gettipo_nivel_cuenta();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_nivel_cuentas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_nivel_cuentas=$this->tipo_nivel_cuentaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_nivel_cuenta_util::refrescarFKDescripciones($this->tipo_nivel_cuentas);
			}
			
			//tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToGets($this->tipo_nivel_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_nivel_cuentas);			
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
		$this->tipo_nivel_cuentas = array();
		  		  
        try {			
			$this->tipo_nivel_cuentas=$this->tipo_nivel_cuentaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_nivel_cuenta_util::refrescarFKDescripciones($this->tipo_nivel_cuentas);
			}
			
			//tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToGets($this->tipo_nivel_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_nivel_cuentas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->tipo_nivel_cuentas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_nivel_cuentas=$this->tipo_nivel_cuentaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_nivel_cuenta_util::refrescarFKDescripciones($this->tipo_nivel_cuentas);
			}
			
			//tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToGets($this->tipo_nivel_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_nivel_cuentas);
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
		$this->tipo_nivel_cuentas = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_nivel_cuentas=$this->tipo_nivel_cuentaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_nivel_cuenta_util::refrescarFKDescripciones($this->tipo_nivel_cuentas);
			}
			
			//tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToGets($this->tipo_nivel_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_nivel_cuentas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$tipo_nivel_cuentaLogic = new  tipo_nivel_cuenta_logic();
		  		  
        try {		
			$tipo_nivel_cuentaLogic->setConnexion($connexion);			
			$tipo_nivel_cuentaLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $tipo_nivel_cuentaLogic->gettipo_nivel_cuentas();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->tipo_nivel_cuentas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_nivel_cuentas=$this->tipo_nivel_cuentaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_nivel_cuenta_util::refrescarFKDescripciones($this->tipo_nivel_cuentas);
			}
			
			//tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToGets($this->tipo_nivel_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_nivel_cuentas);
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
		$this->tipo_nivel_cuentas = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_nivel_cuentas=$this->tipo_nivel_cuentaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_nivel_cuenta_util::refrescarFKDescripciones($this->tipo_nivel_cuentas);
			}
			
			//tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToGets($this->tipo_nivel_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_nivel_cuentas);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->tipo_nivel_cuentas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_nivel_cuentas=$this->tipo_nivel_cuentaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_nivel_cuenta_util::refrescarFKDescripciones($this->tipo_nivel_cuentas);
			}
			
			//tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToGets($this->tipo_nivel_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_nivel_cuentas);
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
		$this->tipo_nivel_cuentas = array();
		  		  
        try {			
			$this->tipo_nivel_cuentas=$this->tipo_nivel_cuentaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_nivel_cuenta_util::refrescarFKDescripciones($this->tipo_nivel_cuentas);
			}	
			
			//tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToGets($this->tipo_nivel_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_nivel_cuentas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_nivel_cuentas = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_nivel_cuentas=$this->tipo_nivel_cuentaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_nivel_cuenta_util::refrescarFKDescripciones($this->tipo_nivel_cuentas);
			}
			
			//tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToGets($this->tipo_nivel_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_nivel_cuentas);
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
		$this->tipo_nivel_cuentas = array();
		  		  
        try {		
			$this->tipo_nivel_cuentas=$this->tipo_nivel_cuentaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_nivel_cuenta_util::refrescarFKDescripciones($this->tipo_nivel_cuentas);
			}
			
			//tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToGets($this->tipo_nivel_cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_nivel_cuentas);

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
						
			//tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToSave($this->tipo_nivel_cuenta,$this->datosCliente,$this->connexion);	       
			//tipo_nivel_cuenta_logic_add::updatetipo_nivel_cuentaToSave($this->tipo_nivel_cuenta);			
			tipo_nivel_cuenta_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_nivel_cuenta,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->tipo_nivel_cuentaLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_nivel_cuenta,$this->datosCliente,$this->connexion);
			
			
			tipo_nivel_cuenta_data::save($this->tipo_nivel_cuenta, $this->connexion);	    	       	 				
			//tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToSaveAfter($this->tipo_nivel_cuenta,$this->datosCliente,$this->connexion);			
			//$this->tipo_nivel_cuentaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_nivel_cuenta,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_nivel_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_nivel_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_nivel_cuenta_util::refrescarFKDescripcion($this->tipo_nivel_cuenta);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->tipo_nivel_cuenta->getIsDeleted()) {
				$this->tipo_nivel_cuenta=null;
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
						
			/*tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToSave($this->tipo_nivel_cuenta,$this->datosCliente,$this->connexion);*/	        
			//tipo_nivel_cuenta_logic_add::updatetipo_nivel_cuentaToSave($this->tipo_nivel_cuenta);			
			//$this->tipo_nivel_cuentaLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_nivel_cuenta,$this->datosCliente,$this->connexion);			
			tipo_nivel_cuenta_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_nivel_cuenta,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			tipo_nivel_cuenta_data::save($this->tipo_nivel_cuenta, $this->connexion);	    	       	 						
			/*tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToSaveAfter($this->tipo_nivel_cuenta,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_nivel_cuentaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_nivel_cuenta,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_nivel_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_nivel_cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_nivel_cuenta_util::refrescarFKDescripcion($this->tipo_nivel_cuenta);				
			}
			
			if($this->tipo_nivel_cuenta->getIsDeleted()) {
				$this->tipo_nivel_cuenta=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(tipo_nivel_cuenta $tipo_nivel_cuenta,Connexion $connexion)  {
		$tipo_nivel_cuentaLogic = new  tipo_nivel_cuenta_logic();		  		  
        try {		
			$tipo_nivel_cuentaLogic->setConnexion($connexion);			
			$tipo_nivel_cuentaLogic->settipo_nivel_cuenta($tipo_nivel_cuenta);			
			$tipo_nivel_cuentaLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToSaves($this->tipo_nivel_cuentas,$this->datosCliente,$this->connexion);*/	        	
			//$this->tipo_nivel_cuentaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_nivel_cuentas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_nivel_cuentas as $tipo_nivel_cuentaLocal) {				
								
				//tipo_nivel_cuenta_logic_add::updatetipo_nivel_cuentaToSave($tipo_nivel_cuentaLocal);	        	
				tipo_nivel_cuenta_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_nivel_cuentaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				tipo_nivel_cuenta_data::save($tipo_nivel_cuentaLocal, $this->connexion);				
			}
			
			/*tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToSavesAfter($this->tipo_nivel_cuentas,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_nivel_cuentaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_nivel_cuentas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_nivel_cuenta_util::refrescarFKDescripciones($this->tipo_nivel_cuentas);
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
			/*tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToSaves($this->tipo_nivel_cuentas,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_nivel_cuentaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_nivel_cuentas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_nivel_cuentas as $tipo_nivel_cuentaLocal) {				
								
				//tipo_nivel_cuenta_logic_add::updatetipo_nivel_cuentaToSave($tipo_nivel_cuentaLocal);	        	
				tipo_nivel_cuenta_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_nivel_cuentaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				tipo_nivel_cuenta_data::save($tipo_nivel_cuentaLocal, $this->connexion);				
			}			
			
			/*tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToSavesAfter($this->tipo_nivel_cuentas,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_nivel_cuentaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_nivel_cuentas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_nivel_cuenta_util::refrescarFKDescripciones($this->tipo_nivel_cuentas);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $tipo_nivel_cuentas,Connexion $connexion)  {
		$tipo_nivel_cuentaLogic = new  tipo_nivel_cuenta_logic();
		  		  
        try {		
			$tipo_nivel_cuentaLogic->setConnexion($connexion);			
			$tipo_nivel_cuentaLogic->settipo_nivel_cuentas($tipo_nivel_cuentas);			
			$tipo_nivel_cuentaLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$tipo_nivel_cuentasAux=array();
		
		foreach($this->tipo_nivel_cuentas as $tipo_nivel_cuenta) {
			if($tipo_nivel_cuenta->getIsDeleted()==false) {
				$tipo_nivel_cuentasAux[]=$tipo_nivel_cuenta;
			}
		}
		
		$this->tipo_nivel_cuentas=$tipo_nivel_cuentasAux;
	}
	
	public function updateToGetsAuxiliar(array &$tipo_nivel_cuentas) {
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
	
	
	
	public function saveRelacionesWithConnection($tipo_nivel_cuenta,$cuentas,$cuentapredefinidas) {
		$this->saveRelacionesBase($tipo_nivel_cuenta,$cuentas,$cuentapredefinidas,true);
	}

	public function saveRelaciones($tipo_nivel_cuenta,$cuentas,$cuentapredefinidas) {
		$this->saveRelacionesBase($tipo_nivel_cuenta,$cuentas,$cuentapredefinidas,false);
	}

	public function saveRelacionesBase($tipo_nivel_cuenta,$cuentas=array(),$cuentapredefinidas=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$tipo_nivel_cuenta->setcuentas($cuentas);
			$tipo_nivel_cuenta->setcuenta_predefinidas($cuentapredefinidas);
			$this->settipo_nivel_cuenta($tipo_nivel_cuenta);

				if(($this->tipo_nivel_cuenta->getIsNew() || $this->tipo_nivel_cuenta->getIsChanged()) && !$this->tipo_nivel_cuenta->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($cuentas,$cuentapredefinidas);

				} else if($this->tipo_nivel_cuenta->getIsDeleted()) {
					$this->saveRelacionesDetalles($cuentas,$cuentapredefinidas);
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
	
	
	public function saveRelacionesDetalles($cuentas=array(),$cuentapredefinidas=array()) {
		try {
	

			$idtipo_nivel_cuentaActual=$this->gettipo_nivel_cuenta()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/cuenta_carga.php');
			cuenta_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cuentaLogic_Desde_tipo_nivel_cuenta=new cuenta_logic();
			$cuentaLogic_Desde_tipo_nivel_cuenta->setcuentas($cuentas);

			$cuentaLogic_Desde_tipo_nivel_cuenta->setConnexion($this->getConnexion());
			$cuentaLogic_Desde_tipo_nivel_cuenta->setDatosCliente($this->datosCliente);

			foreach($cuentaLogic_Desde_tipo_nivel_cuenta->getcuentas() as $cuenta_Desde_tipo_nivel_cuenta) {
				$cuenta_Desde_tipo_nivel_cuenta->setid_tipo_nivel_cuenta($idtipo_nivel_cuentaActual);

				$cuentaLogic_Desde_tipo_nivel_cuenta->setcuenta($cuenta_Desde_tipo_nivel_cuenta);
				$cuentaLogic_Desde_tipo_nivel_cuenta->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/cuenta_predefinida_carga.php');
			cuenta_predefinida_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cuentapredefinidaLogic_Desde_tipo_nivel_cuenta=new cuenta_predefinida_logic();
			$cuentapredefinidaLogic_Desde_tipo_nivel_cuenta->setcuenta_predefinidas($cuentapredefinidas);

			$cuentapredefinidaLogic_Desde_tipo_nivel_cuenta->setConnexion($this->getConnexion());
			$cuentapredefinidaLogic_Desde_tipo_nivel_cuenta->setDatosCliente($this->datosCliente);

			foreach($cuentapredefinidaLogic_Desde_tipo_nivel_cuenta->getcuenta_predefinidas() as $cuentapredefinida_Desde_tipo_nivel_cuenta) {
				$cuentapredefinida_Desde_tipo_nivel_cuenta->setid_tipo_nivel_cuenta($idtipo_nivel_cuentaActual);
			}

			$cuentapredefinidaLogic_Desde_tipo_nivel_cuenta->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $tipo_nivel_cuentas,tipo_nivel_cuenta_param_return $tipo_nivel_cuentaParameterGeneral) : tipo_nivel_cuenta_param_return {
		$tipo_nivel_cuentaReturnGeneral=new tipo_nivel_cuenta_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $tipo_nivel_cuentaReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $tipo_nivel_cuentas,tipo_nivel_cuenta_param_return $tipo_nivel_cuentaParameterGeneral) : tipo_nivel_cuenta_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_nivel_cuentaReturnGeneral=new tipo_nivel_cuenta_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_nivel_cuentaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_nivel_cuentas,tipo_nivel_cuenta $tipo_nivel_cuenta,tipo_nivel_cuenta_param_return $tipo_nivel_cuentaParameterGeneral,bool $isEsNuevotipo_nivel_cuenta,array $clases) : tipo_nivel_cuenta_param_return {
		 try {	
			$tipo_nivel_cuentaReturnGeneral=new tipo_nivel_cuenta_param_return();
	
			$tipo_nivel_cuentaReturnGeneral->settipo_nivel_cuenta($tipo_nivel_cuenta);
			$tipo_nivel_cuentaReturnGeneral->settipo_nivel_cuentas($tipo_nivel_cuentas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_nivel_cuentaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $tipo_nivel_cuentaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_nivel_cuentas,tipo_nivel_cuenta $tipo_nivel_cuenta,tipo_nivel_cuenta_param_return $tipo_nivel_cuentaParameterGeneral,bool $isEsNuevotipo_nivel_cuenta,array $clases) : tipo_nivel_cuenta_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_nivel_cuentaReturnGeneral=new tipo_nivel_cuenta_param_return();
	
			$tipo_nivel_cuentaReturnGeneral->settipo_nivel_cuenta($tipo_nivel_cuenta);
			$tipo_nivel_cuentaReturnGeneral->settipo_nivel_cuentas($tipo_nivel_cuentas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_nivel_cuentaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_nivel_cuentaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_nivel_cuentas,tipo_nivel_cuenta $tipo_nivel_cuenta,tipo_nivel_cuenta_param_return $tipo_nivel_cuentaParameterGeneral,bool $isEsNuevotipo_nivel_cuenta,array $clases) : tipo_nivel_cuenta_param_return {
		 try {	
			$tipo_nivel_cuentaReturnGeneral=new tipo_nivel_cuenta_param_return();
	
			$tipo_nivel_cuentaReturnGeneral->settipo_nivel_cuenta($tipo_nivel_cuenta);
			$tipo_nivel_cuentaReturnGeneral->settipo_nivel_cuentas($tipo_nivel_cuentas);
			
			
			
			return $tipo_nivel_cuentaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_nivel_cuentas,tipo_nivel_cuenta $tipo_nivel_cuenta,tipo_nivel_cuenta_param_return $tipo_nivel_cuentaParameterGeneral,bool $isEsNuevotipo_nivel_cuenta,array $clases) : tipo_nivel_cuenta_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_nivel_cuentaReturnGeneral=new tipo_nivel_cuenta_param_return();
	
			$tipo_nivel_cuentaReturnGeneral->settipo_nivel_cuenta($tipo_nivel_cuenta);
			$tipo_nivel_cuentaReturnGeneral->settipo_nivel_cuentas($tipo_nivel_cuentas);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_nivel_cuentaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,tipo_nivel_cuenta $tipo_nivel_cuenta,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,tipo_nivel_cuenta $tipo_nivel_cuenta,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		tipo_nivel_cuenta_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(tipo_nivel_cuenta $tipo_nivel_cuenta,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_nivel_cuenta_logic_add::updatetipo_nivel_cuentaToGet($this->tipo_nivel_cuenta);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$tipo_nivel_cuenta->setcuentas($this->tipo_nivel_cuentaDataAccess->getcuentas($this->connexion,$tipo_nivel_cuenta));
		$tipo_nivel_cuenta->setcuenta_predefinidas($this->tipo_nivel_cuentaDataAccess->getcuenta_predefinidas($this->connexion,$tipo_nivel_cuenta));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_nivel_cuenta->setcuentas($this->tipo_nivel_cuentaDataAccess->getcuentas($this->connexion,$tipo_nivel_cuenta));

				if($this->isConDeep) {
					$cuentaLogic= new cuenta_logic($this->connexion);
					$cuentaLogic->setcuentas($tipo_nivel_cuenta->getcuentas());
					$classesLocal=cuenta_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cuentaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cuenta_util::refrescarFKDescripciones($cuentaLogic->getcuentas());
					$tipo_nivel_cuenta->setcuentas($cuentaLogic->getcuentas());
				}

				continue;
			}

			if($clas->clas==cuenta_predefinida::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_nivel_cuenta->setcuenta_predefinidas($this->tipo_nivel_cuentaDataAccess->getcuenta_predefinidas($this->connexion,$tipo_nivel_cuenta));

				if($this->isConDeep) {
					$cuentapredefinidaLogic= new cuenta_predefinida_logic($this->connexion);
					$cuentapredefinidaLogic->setcuenta_predefinidas($tipo_nivel_cuenta->getcuenta_predefinidas());
					$classesLocal=cuenta_predefinida_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cuentapredefinidaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cuenta_predefinida_util::refrescarFKDescripciones($cuentapredefinidaLogic->getcuenta_predefinidas());
					$tipo_nivel_cuenta->setcuenta_predefinidas($cuentapredefinidaLogic->getcuenta_predefinidas());
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
			$tipo_nivel_cuenta->setcuentas($this->tipo_nivel_cuentaDataAccess->getcuentas($this->connexion,$tipo_nivel_cuenta));
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
			$tipo_nivel_cuenta->setcuenta_predefinidas($this->tipo_nivel_cuentaDataAccess->getcuenta_predefinidas($this->connexion,$tipo_nivel_cuenta));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$tipo_nivel_cuenta->setcuentas($this->tipo_nivel_cuentaDataAccess->getcuentas($this->connexion,$tipo_nivel_cuenta));

		foreach($tipo_nivel_cuenta->getcuentas() as $cuenta) {
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($cuenta,$isDeep,$deepLoadType,$clases);
		}

		$tipo_nivel_cuenta->setcuenta_predefinidas($this->tipo_nivel_cuentaDataAccess->getcuenta_predefinidas($this->connexion,$tipo_nivel_cuenta));

		foreach($tipo_nivel_cuenta->getcuenta_predefinidas() as $cuentapredefinida) {
			$cuentapredefinidaLogic= new cuenta_predefinida_logic($this->connexion);
			$cuentapredefinidaLogic->deepLoad($cuentapredefinida,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_nivel_cuenta->setcuentas($this->tipo_nivel_cuentaDataAccess->getcuentas($this->connexion,$tipo_nivel_cuenta));

				foreach($tipo_nivel_cuenta->getcuentas() as $cuenta) {
					$cuentaLogic= new cuenta_logic($this->connexion);
					$cuentaLogic->deepLoad($cuenta,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cuenta_predefinida::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_nivel_cuenta->setcuenta_predefinidas($this->tipo_nivel_cuentaDataAccess->getcuenta_predefinidas($this->connexion,$tipo_nivel_cuenta));

				foreach($tipo_nivel_cuenta->getcuenta_predefinidas() as $cuentapredefinida) {
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
			$tipo_nivel_cuenta->setcuentas($this->tipo_nivel_cuentaDataAccess->getcuentas($this->connexion,$tipo_nivel_cuenta));

			foreach($tipo_nivel_cuenta->getcuentas() as $cuenta) {
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($cuenta,$isDeep,$deepLoadType,$clases);
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
			$tipo_nivel_cuenta->setcuenta_predefinidas($this->tipo_nivel_cuentaDataAccess->getcuenta_predefinidas($this->connexion,$tipo_nivel_cuenta));

			foreach($tipo_nivel_cuenta->getcuenta_predefinidas() as $cuentapredefinida) {
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
	
	public function deepSave(tipo_nivel_cuenta $tipo_nivel_cuenta,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_nivel_cuenta_logic_add::updatetipo_nivel_cuentaToSave($this->tipo_nivel_cuenta);			
			
			if(!$paraDeleteCascade) {				
				tipo_nivel_cuenta_data::save($tipo_nivel_cuenta, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($tipo_nivel_cuenta->getcuentas() as $cuenta) {
			$cuenta->setid_tipo_nivel_cuenta($tipo_nivel_cuenta->getId());
			cuenta_data::save($cuenta,$this->connexion);
		}


		foreach($tipo_nivel_cuenta->getcuenta_predefinidas() as $cuentapredefinida) {
			$cuentapredefinida->setid_tipo_nivel_cuenta($tipo_nivel_cuenta->getId());
			cuenta_predefinida_data::save($cuentapredefinida,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_nivel_cuenta->getcuentas() as $cuenta) {
					$cuenta->setid_tipo_nivel_cuenta($tipo_nivel_cuenta->getId());
					cuenta_data::save($cuenta,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cuenta_predefinida::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_nivel_cuenta->getcuenta_predefinidas() as $cuentapredefinida) {
					$cuentapredefinida->setid_tipo_nivel_cuenta($tipo_nivel_cuenta->getId());
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

			foreach($tipo_nivel_cuenta->getcuentas() as $cuenta) {
				$cuenta->setid_tipo_nivel_cuenta($tipo_nivel_cuenta->getId());
				cuenta_data::save($cuenta,$this->connexion);
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

			foreach($tipo_nivel_cuenta->getcuenta_predefinidas() as $cuentapredefinida) {
				$cuentapredefinida->setid_tipo_nivel_cuenta($tipo_nivel_cuenta->getId());
				cuenta_predefinida_data::save($cuentapredefinida,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($tipo_nivel_cuenta->getcuentas() as $cuenta) {
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuenta->setid_tipo_nivel_cuenta($tipo_nivel_cuenta->getId());
			cuenta_data::save($cuenta,$this->connexion);
			$cuentaLogic->deepSave($cuenta,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($tipo_nivel_cuenta->getcuenta_predefinidas() as $cuentapredefinida) {
			$cuentapredefinidaLogic= new cuenta_predefinida_logic($this->connexion);
			$cuentapredefinida->setid_tipo_nivel_cuenta($tipo_nivel_cuenta->getId());
			cuenta_predefinida_data::save($cuentapredefinida,$this->connexion);
			$cuentapredefinidaLogic->deepSave($cuentapredefinida,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_nivel_cuenta->getcuentas() as $cuenta) {
					$cuentaLogic= new cuenta_logic($this->connexion);
					$cuenta->setid_tipo_nivel_cuenta($tipo_nivel_cuenta->getId());
					cuenta_data::save($cuenta,$this->connexion);
					$cuentaLogic->deepSave($cuenta,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cuenta_predefinida::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_nivel_cuenta->getcuenta_predefinidas() as $cuentapredefinida) {
					$cuentapredefinidaLogic= new cuenta_predefinida_logic($this->connexion);
					$cuentapredefinida->setid_tipo_nivel_cuenta($tipo_nivel_cuenta->getId());
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

			foreach($tipo_nivel_cuenta->getcuentas() as $cuenta) {
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuenta->setid_tipo_nivel_cuenta($tipo_nivel_cuenta->getId());
				cuenta_data::save($cuenta,$this->connexion);
				$cuentaLogic->deepSave($cuenta,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($tipo_nivel_cuenta->getcuenta_predefinidas() as $cuentapredefinida) {
				$cuentapredefinidaLogic= new cuenta_predefinida_logic($this->connexion);
				$cuentapredefinida->setid_tipo_nivel_cuenta($tipo_nivel_cuenta->getId());
				cuenta_predefinida_data::save($cuentapredefinida,$this->connexion);
				$cuentapredefinidaLogic->deepSave($cuentapredefinida,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				tipo_nivel_cuenta_data::save($tipo_nivel_cuenta, $this->connexion);
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
			
			$this->deepLoad($this->tipo_nivel_cuenta,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->tipo_nivel_cuentas as $tipo_nivel_cuenta) {
				$this->deepLoad($tipo_nivel_cuenta,$isDeep,$deepLoadType,$clases);
								
				tipo_nivel_cuenta_util::refrescarFKDescripciones($this->tipo_nivel_cuentas);
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
			
			foreach($this->tipo_nivel_cuentas as $tipo_nivel_cuenta) {
				$this->deepLoad($tipo_nivel_cuenta,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->tipo_nivel_cuenta,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->tipo_nivel_cuentas as $tipo_nivel_cuenta) {
				$this->deepSave($tipo_nivel_cuenta,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->tipo_nivel_cuentas as $tipo_nivel_cuenta) {
				$this->deepSave($tipo_nivel_cuenta,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(cuenta_predefinida::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
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
	
	
	
	
	
	
	
	public function gettipo_nivel_cuenta() : ?tipo_nivel_cuenta {	
		/*
		tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToGet($this->tipo_nivel_cuenta,$this->datosCliente);
		tipo_nivel_cuenta_logic_add::updatetipo_nivel_cuentaToGet($this->tipo_nivel_cuenta);
		*/
			
		return $this->tipo_nivel_cuenta;
	}
		
	public function settipo_nivel_cuenta(tipo_nivel_cuenta $newtipo_nivel_cuenta) {
		$this->tipo_nivel_cuenta = $newtipo_nivel_cuenta;
	}
	
	public function gettipo_nivel_cuentas() : array {		
		/*
		tipo_nivel_cuenta_logic_add::checktipo_nivel_cuentaToGets($this->tipo_nivel_cuentas,$this->datosCliente);
		
		foreach ($this->tipo_nivel_cuentas as $tipo_nivel_cuentaLocal ) {
			tipo_nivel_cuenta_logic_add::updatetipo_nivel_cuentaToGet($tipo_nivel_cuentaLocal);
		}
		*/
		
		return $this->tipo_nivel_cuentas;
	}
	
	public function settipo_nivel_cuentas(array $newtipo_nivel_cuentas) {
		$this->tipo_nivel_cuentas = $newtipo_nivel_cuentas;
	}
	
	public function gettipo_nivel_cuentaDataAccess() : tipo_nivel_cuenta_data {
		return $this->tipo_nivel_cuentaDataAccess;
	}
	
	public function settipo_nivel_cuentaDataAccess(tipo_nivel_cuenta_data $newtipo_nivel_cuentaDataAccess) {
		$this->tipo_nivel_cuentaDataAccess = $newtipo_nivel_cuentaDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        tipo_nivel_cuenta_carga::$CONTROLLER;;        
		
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
