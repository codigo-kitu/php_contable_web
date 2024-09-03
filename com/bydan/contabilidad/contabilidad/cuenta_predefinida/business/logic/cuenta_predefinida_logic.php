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

namespace com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_carga;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_param_return;

use com\bydan\contabilidad\contabilidad\cuenta_predefinida\presentation\session\cuenta_predefinida_session;

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

use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_util;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\entity\cuenta_predefinida;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\data\cuenta_predefinida_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\entity\tipo_cuenta_predefinida;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\data\tipo_cuenta_predefinida_data;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\logic\tipo_cuenta_predefinida_logic;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util\tipo_cuenta_predefinida_util;

use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\entity\tipo_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\data\tipo_cuenta_data;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\logic\tipo_cuenta_logic;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_util;

use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\entity\tipo_nivel_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\data\tipo_nivel_cuenta_data;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\logic\tipo_nivel_cuenta_logic;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\util\tipo_nivel_cuenta_util;

//REL


//REL DETALLES




class cuenta_predefinida_logic  extends GeneralEntityLogic implements cuenta_predefinida_logicI {	
	/*GENERAL*/
	public cuenta_predefinida_data $cuenta_predefinidaDataAccess;
	//public ?cuenta_predefinida_logic_add $cuenta_predefinidaLogicAdditional=null;
	public ?cuenta_predefinida $cuenta_predefinida;
	public array $cuenta_predefinidas;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->cuenta_predefinidaDataAccess = new cuenta_predefinida_data();			
			$this->cuenta_predefinidas = array();
			$this->cuenta_predefinida = new cuenta_predefinida();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->cuenta_predefinidaLogicAdditional = new cuenta_predefinida_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->cuenta_predefinidaLogicAdditional==null) {
		//	$this->cuenta_predefinidaLogicAdditional=new cuenta_predefinida_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->cuenta_predefinidaDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->cuenta_predefinidaDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->cuenta_predefinidaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->cuenta_predefinidaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->cuenta_predefinidas = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_predefinidas=$this->cuenta_predefinidaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
			}
			
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGets($this->cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_predefinidas);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->cuenta_predefinidas = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_predefinidas=$this->cuenta_predefinidaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
			}
			
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGets($this->cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_predefinidas);
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
		$this->cuenta_predefinida = new cuenta_predefinida();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->cuenta_predefinida=$this->cuenta_predefinidaDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_predefinida,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_predefinida_util::refrescarFKDescripcion($this->cuenta_predefinida);
			}
						
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGet($this->cuenta_predefinida,$this->datosCliente);
			//cuenta_predefinida_logic_add::updatecuenta_predefinidaToGet($this->cuenta_predefinida);
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
		$this->cuenta_predefinida = new  cuenta_predefinida();
		  		  
        try {		
			$this->cuenta_predefinida=$this->cuenta_predefinidaDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_predefinida,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_predefinida_util::refrescarFKDescripcion($this->cuenta_predefinida);
			}
			
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGet($this->cuenta_predefinida,$this->datosCliente);
			//cuenta_predefinida_logic_add::updatecuenta_predefinidaToGet($this->cuenta_predefinida);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?cuenta_predefinida {
		$cuenta_predefinidaLogic = new  cuenta_predefinida_logic();
		  		  
        try {		
			$cuenta_predefinidaLogic->setConnexion($connexion);			
			$cuenta_predefinidaLogic->getEntity($id);			
			return $cuenta_predefinidaLogic->getcuenta_predefinida();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->cuenta_predefinida = new  cuenta_predefinida();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->cuenta_predefinida=$this->cuenta_predefinidaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_predefinida,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_predefinida_util::refrescarFKDescripcion($this->cuenta_predefinida);
			}
			
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGet($this->cuenta_predefinida,$this->datosCliente);
			//cuenta_predefinida_logic_add::updatecuenta_predefinidaToGet($this->cuenta_predefinida);
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
		$this->cuenta_predefinida = new  cuenta_predefinida();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_predefinida=$this->cuenta_predefinidaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta_predefinida,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_predefinida_util::refrescarFKDescripcion($this->cuenta_predefinida);
			}
			
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGet($this->cuenta_predefinida,$this->datosCliente);
			//cuenta_predefinida_logic_add::updatecuenta_predefinidaToGet($this->cuenta_predefinida);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?cuenta_predefinida {
		$cuenta_predefinidaLogic = new  cuenta_predefinida_logic();
		  		  
        try {		
			$cuenta_predefinidaLogic->setConnexion($connexion);			
			$cuenta_predefinidaLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $cuenta_predefinidaLogic->getcuenta_predefinida();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cuenta_predefinidas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cuenta_predefinidas=$this->cuenta_predefinidaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
			}
			
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGets($this->cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_predefinidas);			
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
		$this->cuenta_predefinidas = array();
		  		  
        try {			
			$this->cuenta_predefinidas=$this->cuenta_predefinidaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
			}
			
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGets($this->cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_predefinidas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->cuenta_predefinidas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_predefinidas=$this->cuenta_predefinidaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
			}
			
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGets($this->cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_predefinidas);
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
		$this->cuenta_predefinidas = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_predefinidas=$this->cuenta_predefinidaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
			}
			
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGets($this->cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_predefinidas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$cuenta_predefinidaLogic = new  cuenta_predefinida_logic();
		  		  
        try {		
			$cuenta_predefinidaLogic->setConnexion($connexion);			
			$cuenta_predefinidaLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $cuenta_predefinidaLogic->getcuenta_predefinidas();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->cuenta_predefinidas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cuenta_predefinidas=$this->cuenta_predefinidaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
			}
			
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGets($this->cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_predefinidas);
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
		$this->cuenta_predefinidas = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_predefinidas=$this->cuenta_predefinidaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
			}
			
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGets($this->cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_predefinidas);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->cuenta_predefinidas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta_predefinidas=$this->cuenta_predefinidaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
			}
			
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGets($this->cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_predefinidas);
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
		$this->cuenta_predefinidas = array();
		  		  
        try {			
			$this->cuenta_predefinidas=$this->cuenta_predefinidaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
			}	
			
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGets($this->cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_predefinidas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cuenta_predefinidas = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->cuenta_predefinidas=$this->cuenta_predefinidaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
			}
			
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGets($this->cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_predefinidas);
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
		$this->cuenta_predefinidas = array();
		  		  
        try {		
			$this->cuenta_predefinidas=$this->cuenta_predefinidaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
			}
			
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGets($this->cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuenta_predefinidas);

		}  catch(Exception $e) {						
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cuenta_predefinida_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->cuenta_predefinidas=$this->cuenta_predefinidaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
			}
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGets($this->cuenta_predefinidas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_predefinidas);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cuenta_predefinida_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->cuenta_predefinidas=$this->cuenta_predefinidaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
			}
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGets($this->cuenta_predefinidas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_predefinidas);
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
			$parameterSelectionGeneralid_tipo_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_cuenta,cuenta_predefinida_util::$ID_TIPO_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_cuenta);

			$this->cuenta_predefinidas=$this->cuenta_predefinidaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
			}
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGets($this->cuenta_predefinidas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_predefinidas);

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
			$parameterSelectionGeneralid_tipo_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_cuenta,cuenta_predefinida_util::$ID_TIPO_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_cuenta);

			$this->cuenta_predefinidas=$this->cuenta_predefinidaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
			}
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGets($this->cuenta_predefinidas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_predefinidas);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtipo_cuenta_predefinidaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_tipo_cuenta_predefinida) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_cuenta_predefinida= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_cuenta_predefinida->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_cuenta_predefinida,cuenta_predefinida_util::$ID_TIPO_CUENTA_PREDEFINIDA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_cuenta_predefinida);

			$this->cuenta_predefinidas=$this->cuenta_predefinidaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
			}
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGets($this->cuenta_predefinidas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_predefinidas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtipo_cuenta_predefinida(string $strFinalQuery,Pagination $pagination,int $id_tipo_cuenta_predefinida) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_cuenta_predefinida= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_cuenta_predefinida->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_cuenta_predefinida,cuenta_predefinida_util::$ID_TIPO_CUENTA_PREDEFINIDA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_cuenta_predefinida);

			$this->cuenta_predefinidas=$this->cuenta_predefinidaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
			}
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGets($this->cuenta_predefinidas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_predefinidas);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtipo_nivel_cuentaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_tipo_nivel_cuenta) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_nivel_cuenta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_nivel_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_nivel_cuenta,cuenta_predefinida_util::$ID_TIPO_NIVEL_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_nivel_cuenta);

			$this->cuenta_predefinidas=$this->cuenta_predefinidaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
			}
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGets($this->cuenta_predefinidas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_predefinidas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtipo_nivel_cuenta(string $strFinalQuery,Pagination $pagination,int $id_tipo_nivel_cuenta) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_nivel_cuenta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_nivel_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_nivel_cuenta,cuenta_predefinida_util::$ID_TIPO_NIVEL_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_nivel_cuenta);

			$this->cuenta_predefinidas=$this->cuenta_predefinidaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
			}
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToGets($this->cuenta_predefinidas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuenta_predefinidas);
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
						
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToSave($this->cuenta_predefinida,$this->datosCliente,$this->connexion);	       
			//cuenta_predefinida_logic_add::updatecuenta_predefinidaToSave($this->cuenta_predefinida);			
			cuenta_predefinida_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cuenta_predefinida,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->cuenta_predefinidaLogicAdditional->checkGeneralEntityToSave($this,$this->cuenta_predefinida,$this->datosCliente,$this->connexion);
			
			
			cuenta_predefinida_data::save($this->cuenta_predefinida, $this->connexion);	    	       	 				
			//cuenta_predefinida_logic_add::checkcuenta_predefinidaToSaveAfter($this->cuenta_predefinida,$this->datosCliente,$this->connexion);			
			//$this->cuenta_predefinidaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cuenta_predefinida,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cuenta_predefinida,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cuenta_predefinida,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cuenta_predefinida_util::refrescarFKDescripcion($this->cuenta_predefinida);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->cuenta_predefinida->getIsDeleted()) {
				$this->cuenta_predefinida=null;
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
						
			/*cuenta_predefinida_logic_add::checkcuenta_predefinidaToSave($this->cuenta_predefinida,$this->datosCliente,$this->connexion);*/	        
			//cuenta_predefinida_logic_add::updatecuenta_predefinidaToSave($this->cuenta_predefinida);			
			//$this->cuenta_predefinidaLogicAdditional->checkGeneralEntityToSave($this,$this->cuenta_predefinida,$this->datosCliente,$this->connexion);			
			cuenta_predefinida_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cuenta_predefinida,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			cuenta_predefinida_data::save($this->cuenta_predefinida, $this->connexion);	    	       	 						
			/*cuenta_predefinida_logic_add::checkcuenta_predefinidaToSaveAfter($this->cuenta_predefinida,$this->datosCliente,$this->connexion);*/			
			//$this->cuenta_predefinidaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cuenta_predefinida,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cuenta_predefinida,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cuenta_predefinida,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cuenta_predefinida_util::refrescarFKDescripcion($this->cuenta_predefinida);				
			}
			
			if($this->cuenta_predefinida->getIsDeleted()) {
				$this->cuenta_predefinida=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(cuenta_predefinida $cuenta_predefinida,Connexion $connexion)  {
		$cuenta_predefinidaLogic = new  cuenta_predefinida_logic();		  		  
        try {		
			$cuenta_predefinidaLogic->setConnexion($connexion);			
			$cuenta_predefinidaLogic->setcuenta_predefinida($cuenta_predefinida);			
			$cuenta_predefinidaLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*cuenta_predefinida_logic_add::checkcuenta_predefinidaToSaves($this->cuenta_predefinidas,$this->datosCliente,$this->connexion);*/	        	
			//$this->cuenta_predefinidaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cuenta_predefinidas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cuenta_predefinidas as $cuenta_predefinidaLocal) {				
								
				//cuenta_predefinida_logic_add::updatecuenta_predefinidaToSave($cuenta_predefinidaLocal);	        	
				cuenta_predefinida_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cuenta_predefinidaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				cuenta_predefinida_data::save($cuenta_predefinidaLocal, $this->connexion);				
			}
			
			/*cuenta_predefinida_logic_add::checkcuenta_predefinidaToSavesAfter($this->cuenta_predefinidas,$this->datosCliente,$this->connexion);*/			
			//$this->cuenta_predefinidaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cuenta_predefinidas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
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
			/*cuenta_predefinida_logic_add::checkcuenta_predefinidaToSaves($this->cuenta_predefinidas,$this->datosCliente,$this->connexion);*/			
			//$this->cuenta_predefinidaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cuenta_predefinidas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cuenta_predefinidas as $cuenta_predefinidaLocal) {				
								
				//cuenta_predefinida_logic_add::updatecuenta_predefinidaToSave($cuenta_predefinidaLocal);	        	
				cuenta_predefinida_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cuenta_predefinidaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				cuenta_predefinida_data::save($cuenta_predefinidaLocal, $this->connexion);				
			}			
			
			/*cuenta_predefinida_logic_add::checkcuenta_predefinidaToSavesAfter($this->cuenta_predefinidas,$this->datosCliente,$this->connexion);*/			
			//$this->cuenta_predefinidaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cuenta_predefinidas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $cuenta_predefinidas,Connexion $connexion)  {
		$cuenta_predefinidaLogic = new  cuenta_predefinida_logic();
		  		  
        try {		
			$cuenta_predefinidaLogic->setConnexion($connexion);			
			$cuenta_predefinidaLogic->setcuenta_predefinidas($cuenta_predefinidas);			
			$cuenta_predefinidaLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$cuenta_predefinidasAux=array();
		
		foreach($this->cuenta_predefinidas as $cuenta_predefinida) {
			if($cuenta_predefinida->getIsDeleted()==false) {
				$cuenta_predefinidasAux[]=$cuenta_predefinida;
			}
		}
		
		$this->cuenta_predefinidas=$cuenta_predefinidasAux;
	}
	
	public function updateToGetsAuxiliar(array &$cuenta_predefinidas) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->cuenta_predefinidas as $cuenta_predefinida) {
				
				$cuenta_predefinida->setid_empresa_Descripcion(cuenta_predefinida_util::getempresaDescripcion($cuenta_predefinida->getempresa()));
				$cuenta_predefinida->setid_tipo_cuenta_predefinida_Descripcion(cuenta_predefinida_util::gettipo_cuenta_predefinidaDescripcion($cuenta_predefinida->gettipo_cuenta_predefinida()));
				$cuenta_predefinida->setid_tipo_cuenta_Descripcion(cuenta_predefinida_util::gettipo_cuentaDescripcion($cuenta_predefinida->gettipo_cuenta()));
				$cuenta_predefinida->setid_tipo_nivel_cuenta_Descripcion(cuenta_predefinida_util::gettipo_nivel_cuentaDescripcion($cuenta_predefinida->gettipo_nivel_cuenta()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cuenta_predefinida_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cuenta_predefinida_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cuenta_predefinida_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cuenta_predefinida_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cuenta_predefinida_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$cuenta_predefinidaForeignKey=new cuenta_predefinida_param_return();//cuenta_predefinidaForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$cuenta_predefinidaForeignKey,$cuenta_predefinida_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_cuenta_predefinida',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_cuenta_predefinidasFK($this->connexion,$strRecargarFkQuery,$cuenta_predefinidaForeignKey,$cuenta_predefinida_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_cuenta',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_cuentasFK($this->connexion,$strRecargarFkQuery,$cuenta_predefinidaForeignKey,$cuenta_predefinida_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_nivel_cuenta',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_nivel_cuentasFK($this->connexion,$strRecargarFkQuery,$cuenta_predefinidaForeignKey,$cuenta_predefinida_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$cuenta_predefinidaForeignKey,$cuenta_predefinida_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_cuenta_predefinida',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_cuenta_predefinidasFK($this->connexion,' where id=-1 ',$cuenta_predefinidaForeignKey,$cuenta_predefinida_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_cuenta',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_cuentasFK($this->connexion,' where id=-1 ',$cuenta_predefinidaForeignKey,$cuenta_predefinida_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_nivel_cuenta',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_nivel_cuentasFK($this->connexion,' where id=-1 ',$cuenta_predefinidaForeignKey,$cuenta_predefinida_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $cuenta_predefinidaForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$cuenta_predefinidaForeignKey,$cuenta_predefinida_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$cuenta_predefinidaForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_predefinida_session==null) {
			$cuenta_predefinida_session=new cuenta_predefinida_session();
		}
		
		if($cuenta_predefinida_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($cuenta_predefinidaForeignKey->idempresaDefaultFK==0) {
					$cuenta_predefinidaForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$cuenta_predefinidaForeignKey->empresasFK[$empresaLocal->getId()]=cuenta_predefinida_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($cuenta_predefinida_session->bigidempresaActual!=null && $cuenta_predefinida_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cuenta_predefinida_session->bigidempresaActual);//WithConnection

				$cuenta_predefinidaForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=cuenta_predefinida_util::getempresaDescripcion($empresaLogic->getempresa());
				$cuenta_predefinidaForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombostipo_cuenta_predefinidasFK($connexion=null,$strRecargarFkQuery='',$cuenta_predefinidaForeignKey,$cuenta_predefinida_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_cuenta_predefinidaLogic= new tipo_cuenta_predefinida_logic();
		$pagination= new Pagination();
		$cuenta_predefinidaForeignKey->tipo_cuenta_predefinidasFK=array();

		$tipo_cuenta_predefinidaLogic->setConnexion($connexion);
		$tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_predefinida_session==null) {
			$cuenta_predefinida_session=new cuenta_predefinida_session();
		}
		
		if($cuenta_predefinida_session->bitBusquedaDesdeFKSesiontipo_cuenta_predefinida!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_cuenta_predefinida_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltipo_cuenta_predefinida=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_cuenta_predefinida=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_cuenta_predefinida, '');
				$finalQueryGlobaltipo_cuenta_predefinida.=tipo_cuenta_predefinida_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_cuenta_predefinida.$strRecargarFkQuery;		

				$tipo_cuenta_predefinidaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas() as $tipo_cuenta_predefinidaLocal ) {
				if($cuenta_predefinidaForeignKey->idtipo_cuenta_predefinidaDefaultFK==0) {
					$cuenta_predefinidaForeignKey->idtipo_cuenta_predefinidaDefaultFK=$tipo_cuenta_predefinidaLocal->getId();
				}

				$cuenta_predefinidaForeignKey->tipo_cuenta_predefinidasFK[$tipo_cuenta_predefinidaLocal->getId()]=cuenta_predefinida_util::gettipo_cuenta_predefinidaDescripcion($tipo_cuenta_predefinidaLocal);
			}

		} else {

			if($cuenta_predefinida_session->bigidtipo_cuenta_predefinidaActual!=null && $cuenta_predefinida_session->bigidtipo_cuenta_predefinidaActual > 0) {
				$tipo_cuenta_predefinidaLogic->getEntity($cuenta_predefinida_session->bigidtipo_cuenta_predefinidaActual);//WithConnection

				$cuenta_predefinidaForeignKey->tipo_cuenta_predefinidasFK[$tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->getId()]=cuenta_predefinida_util::gettipo_cuenta_predefinidaDescripcion($tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida());
				$cuenta_predefinidaForeignKey->idtipo_cuenta_predefinidaDefaultFK=$tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->getId();
			}
		}
	}

	public function cargarCombostipo_cuentasFK($connexion=null,$strRecargarFkQuery='',$cuenta_predefinidaForeignKey,$cuenta_predefinida_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_cuentaLogic= new tipo_cuenta_logic();
		$pagination= new Pagination();
		$cuenta_predefinidaForeignKey->tipo_cuentasFK=array();

		$tipo_cuentaLogic->setConnexion($connexion);
		$tipo_cuentaLogic->gettipo_cuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_predefinida_session==null) {
			$cuenta_predefinida_session=new cuenta_predefinida_session();
		}
		
		if($cuenta_predefinida_session->bitBusquedaDesdeFKSesiontipo_cuenta!=true) {
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
				if($cuenta_predefinidaForeignKey->idtipo_cuentaDefaultFK==0) {
					$cuenta_predefinidaForeignKey->idtipo_cuentaDefaultFK=$tipo_cuentaLocal->getId();
				}

				$cuenta_predefinidaForeignKey->tipo_cuentasFK[$tipo_cuentaLocal->getId()]=cuenta_predefinida_util::gettipo_cuentaDescripcion($tipo_cuentaLocal);
			}

		} else {

			if($cuenta_predefinida_session->bigidtipo_cuentaActual!=null && $cuenta_predefinida_session->bigidtipo_cuentaActual > 0) {
				$tipo_cuentaLogic->getEntity($cuenta_predefinida_session->bigidtipo_cuentaActual);//WithConnection

				$cuenta_predefinidaForeignKey->tipo_cuentasFK[$tipo_cuentaLogic->gettipo_cuenta()->getId()]=cuenta_predefinida_util::gettipo_cuentaDescripcion($tipo_cuentaLogic->gettipo_cuenta());
				$cuenta_predefinidaForeignKey->idtipo_cuentaDefaultFK=$tipo_cuentaLogic->gettipo_cuenta()->getId();
			}
		}
	}

	public function cargarCombostipo_nivel_cuentasFK($connexion=null,$strRecargarFkQuery='',$cuenta_predefinidaForeignKey,$cuenta_predefinida_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_nivel_cuentaLogic= new tipo_nivel_cuenta_logic();
		$pagination= new Pagination();
		$cuenta_predefinidaForeignKey->tipo_nivel_cuentasFK=array();

		$tipo_nivel_cuentaLogic->setConnexion($connexion);
		$tipo_nivel_cuentaLogic->gettipo_nivel_cuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_predefinida_session==null) {
			$cuenta_predefinida_session=new cuenta_predefinida_session();
		}
		
		if($cuenta_predefinida_session->bitBusquedaDesdeFKSesiontipo_nivel_cuenta!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_nivel_cuenta_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltipo_nivel_cuenta=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_nivel_cuenta=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_nivel_cuenta, '');
				$finalQueryGlobaltipo_nivel_cuenta.=tipo_nivel_cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_nivel_cuenta.$strRecargarFkQuery;		

				$tipo_nivel_cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($tipo_nivel_cuentaLogic->gettipo_nivel_cuentas() as $tipo_nivel_cuentaLocal ) {
				if($cuenta_predefinidaForeignKey->idtipo_nivel_cuentaDefaultFK==0) {
					$cuenta_predefinidaForeignKey->idtipo_nivel_cuentaDefaultFK=$tipo_nivel_cuentaLocal->getId();
				}

				$cuenta_predefinidaForeignKey->tipo_nivel_cuentasFK[$tipo_nivel_cuentaLocal->getId()]=cuenta_predefinida_util::gettipo_nivel_cuentaDescripcion($tipo_nivel_cuentaLocal);
			}

		} else {

			if($cuenta_predefinida_session->bigidtipo_nivel_cuentaActual!=null && $cuenta_predefinida_session->bigidtipo_nivel_cuentaActual > 0) {
				$tipo_nivel_cuentaLogic->getEntity($cuenta_predefinida_session->bigidtipo_nivel_cuentaActual);//WithConnection

				$cuenta_predefinidaForeignKey->tipo_nivel_cuentasFK[$tipo_nivel_cuentaLogic->gettipo_nivel_cuenta()->getId()]=cuenta_predefinida_util::gettipo_nivel_cuentaDescripcion($tipo_nivel_cuentaLogic->gettipo_nivel_cuenta());
				$cuenta_predefinidaForeignKey->idtipo_nivel_cuentaDefaultFK=$tipo_nivel_cuentaLogic->gettipo_nivel_cuenta()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($cuenta_predefinida) {
		$this->saveRelacionesBase($cuenta_predefinida,true);
	}

	public function saveRelaciones($cuenta_predefinida) {
		$this->saveRelacionesBase($cuenta_predefinida,false);
	}

	public function saveRelacionesBase($cuenta_predefinida,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setcuenta_predefinida($cuenta_predefinida);

			if(true) {

				//cuenta_predefinida_logic_add::updateRelacionesToSave($cuenta_predefinida,$this);

				if(($this->cuenta_predefinida->getIsNew() || $this->cuenta_predefinida->getIsChanged()) && !$this->cuenta_predefinida->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->cuenta_predefinida->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//cuenta_predefinida_logic_add::updateRelacionesToSaveAfter($cuenta_predefinida,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $cuenta_predefinidas,cuenta_predefinida_param_return $cuenta_predefinidaParameterGeneral) : cuenta_predefinida_param_return {
		$cuenta_predefinidaReturnGeneral=new cuenta_predefinida_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $cuenta_predefinidaReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $cuenta_predefinidas,cuenta_predefinida_param_return $cuenta_predefinidaParameterGeneral) : cuenta_predefinida_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cuenta_predefinidaReturnGeneral=new cuenta_predefinida_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $cuenta_predefinidaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_predefinidas,cuenta_predefinida $cuenta_predefinida,cuenta_predefinida_param_return $cuenta_predefinidaParameterGeneral,bool $isEsNuevocuenta_predefinida,array $clases) : cuenta_predefinida_param_return {
		 try {	
			$cuenta_predefinidaReturnGeneral=new cuenta_predefinida_param_return();
	
			$cuenta_predefinidaReturnGeneral->setcuenta_predefinida($cuenta_predefinida);
			$cuenta_predefinidaReturnGeneral->setcuenta_predefinidas($cuenta_predefinidas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cuenta_predefinidaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $cuenta_predefinidaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_predefinidas,cuenta_predefinida $cuenta_predefinida,cuenta_predefinida_param_return $cuenta_predefinidaParameterGeneral,bool $isEsNuevocuenta_predefinida,array $clases) : cuenta_predefinida_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cuenta_predefinidaReturnGeneral=new cuenta_predefinida_param_return();
	
			$cuenta_predefinidaReturnGeneral->setcuenta_predefinida($cuenta_predefinida);
			$cuenta_predefinidaReturnGeneral->setcuenta_predefinidas($cuenta_predefinidas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cuenta_predefinidaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $cuenta_predefinidaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_predefinidas,cuenta_predefinida $cuenta_predefinida,cuenta_predefinida_param_return $cuenta_predefinidaParameterGeneral,bool $isEsNuevocuenta_predefinida,array $clases) : cuenta_predefinida_param_return {
		 try {	
			$cuenta_predefinidaReturnGeneral=new cuenta_predefinida_param_return();
	
			$cuenta_predefinidaReturnGeneral->setcuenta_predefinida($cuenta_predefinida);
			$cuenta_predefinidaReturnGeneral->setcuenta_predefinidas($cuenta_predefinidas);
			
			
			
			return $cuenta_predefinidaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuenta_predefinidas,cuenta_predefinida $cuenta_predefinida,cuenta_predefinida_param_return $cuenta_predefinidaParameterGeneral,bool $isEsNuevocuenta_predefinida,array $clases) : cuenta_predefinida_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cuenta_predefinidaReturnGeneral=new cuenta_predefinida_param_return();
	
			$cuenta_predefinidaReturnGeneral->setcuenta_predefinida($cuenta_predefinida);
			$cuenta_predefinidaReturnGeneral->setcuenta_predefinidas($cuenta_predefinidas);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $cuenta_predefinidaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,cuenta_predefinida $cuenta_predefinida,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,cuenta_predefinida $cuenta_predefinida,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		cuenta_predefinida_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(cuenta_predefinida $cuenta_predefinida,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//cuenta_predefinida_logic_add::updatecuenta_predefinidaToGet($this->cuenta_predefinida);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cuenta_predefinida->setempresa($this->cuenta_predefinidaDataAccess->getempresa($this->connexion,$cuenta_predefinida));
		$cuenta_predefinida->settipo_cuenta_predefinida($this->cuenta_predefinidaDataAccess->gettipo_cuenta_predefinida($this->connexion,$cuenta_predefinida));
		$cuenta_predefinida->settipo_cuenta($this->cuenta_predefinidaDataAccess->gettipo_cuenta($this->connexion,$cuenta_predefinida));
		$cuenta_predefinida->settipo_nivel_cuenta($this->cuenta_predefinidaDataAccess->gettipo_nivel_cuenta($this->connexion,$cuenta_predefinida));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cuenta_predefinida->setempresa($this->cuenta_predefinidaDataAccess->getempresa($this->connexion,$cuenta_predefinida));
				continue;
			}

			if($clas->clas==tipo_cuenta_predefinida::$class.'') {
				$cuenta_predefinida->settipo_cuenta_predefinida($this->cuenta_predefinidaDataAccess->gettipo_cuenta_predefinida($this->connexion,$cuenta_predefinida));
				continue;
			}

			if($clas->clas==tipo_cuenta::$class.'') {
				$cuenta_predefinida->settipo_cuenta($this->cuenta_predefinidaDataAccess->gettipo_cuenta($this->connexion,$cuenta_predefinida));
				continue;
			}

			if($clas->clas==tipo_nivel_cuenta::$class.'') {
				$cuenta_predefinida->settipo_nivel_cuenta($this->cuenta_predefinidaDataAccess->gettipo_nivel_cuenta($this->connexion,$cuenta_predefinida));
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
			$cuenta_predefinida->setempresa($this->cuenta_predefinidaDataAccess->getempresa($this->connexion,$cuenta_predefinida));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_cuenta_predefinida::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_predefinida->settipo_cuenta_predefinida($this->cuenta_predefinidaDataAccess->gettipo_cuenta_predefinida($this->connexion,$cuenta_predefinida));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_predefinida->settipo_cuenta($this->cuenta_predefinidaDataAccess->gettipo_cuenta($this->connexion,$cuenta_predefinida));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_nivel_cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_predefinida->settipo_nivel_cuenta($this->cuenta_predefinidaDataAccess->gettipo_nivel_cuenta($this->connexion,$cuenta_predefinida));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cuenta_predefinida->setempresa($this->cuenta_predefinidaDataAccess->getempresa($this->connexion,$cuenta_predefinida));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($cuenta_predefinida->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_predefinida->settipo_cuenta_predefinida($this->cuenta_predefinidaDataAccess->gettipo_cuenta_predefinida($this->connexion,$cuenta_predefinida));
		$tipo_cuenta_predefinidaLogic= new tipo_cuenta_predefinida_logic($this->connexion);
		$tipo_cuenta_predefinidaLogic->deepLoad($cuenta_predefinida->gettipo_cuenta_predefinida(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_predefinida->settipo_cuenta($this->cuenta_predefinidaDataAccess->gettipo_cuenta($this->connexion,$cuenta_predefinida));
		$tipo_cuentaLogic= new tipo_cuenta_logic($this->connexion);
		$tipo_cuentaLogic->deepLoad($cuenta_predefinida->gettipo_cuenta(),$isDeep,$deepLoadType,$clases);
				
		$cuenta_predefinida->settipo_nivel_cuenta($this->cuenta_predefinidaDataAccess->gettipo_nivel_cuenta($this->connexion,$cuenta_predefinida));
		$tipo_nivel_cuentaLogic= new tipo_nivel_cuenta_logic($this->connexion);
		$tipo_nivel_cuentaLogic->deepLoad($cuenta_predefinida->gettipo_nivel_cuenta(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cuenta_predefinida->setempresa($this->cuenta_predefinidaDataAccess->getempresa($this->connexion,$cuenta_predefinida));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($cuenta_predefinida->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_cuenta_predefinida::$class.'') {
				$cuenta_predefinida->settipo_cuenta_predefinida($this->cuenta_predefinidaDataAccess->gettipo_cuenta_predefinida($this->connexion,$cuenta_predefinida));
				$tipo_cuenta_predefinidaLogic= new tipo_cuenta_predefinida_logic($this->connexion);
				$tipo_cuenta_predefinidaLogic->deepLoad($cuenta_predefinida->gettipo_cuenta_predefinida(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_cuenta::$class.'') {
				$cuenta_predefinida->settipo_cuenta($this->cuenta_predefinidaDataAccess->gettipo_cuenta($this->connexion,$cuenta_predefinida));
				$tipo_cuentaLogic= new tipo_cuenta_logic($this->connexion);
				$tipo_cuentaLogic->deepLoad($cuenta_predefinida->gettipo_cuenta(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_nivel_cuenta::$class.'') {
				$cuenta_predefinida->settipo_nivel_cuenta($this->cuenta_predefinidaDataAccess->gettipo_nivel_cuenta($this->connexion,$cuenta_predefinida));
				$tipo_nivel_cuentaLogic= new tipo_nivel_cuenta_logic($this->connexion);
				$tipo_nivel_cuentaLogic->deepLoad($cuenta_predefinida->gettipo_nivel_cuenta(),$isDeep,$deepLoadType,$clases);				
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
			$cuenta_predefinida->setempresa($this->cuenta_predefinidaDataAccess->getempresa($this->connexion,$cuenta_predefinida));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($cuenta_predefinida->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_cuenta_predefinida::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_predefinida->settipo_cuenta_predefinida($this->cuenta_predefinidaDataAccess->gettipo_cuenta_predefinida($this->connexion,$cuenta_predefinida));
			$tipo_cuenta_predefinidaLogic= new tipo_cuenta_predefinida_logic($this->connexion);
			$tipo_cuenta_predefinidaLogic->deepLoad($cuenta_predefinida->gettipo_cuenta_predefinida(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_predefinida->settipo_cuenta($this->cuenta_predefinidaDataAccess->gettipo_cuenta($this->connexion,$cuenta_predefinida));
			$tipo_cuentaLogic= new tipo_cuenta_logic($this->connexion);
			$tipo_cuentaLogic->deepLoad($cuenta_predefinida->gettipo_cuenta(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_nivel_cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta_predefinida->settipo_nivel_cuenta($this->cuenta_predefinidaDataAccess->gettipo_nivel_cuenta($this->connexion,$cuenta_predefinida));
			$tipo_nivel_cuentaLogic= new tipo_nivel_cuenta_logic($this->connexion);
			$tipo_nivel_cuentaLogic->deepLoad($cuenta_predefinida->gettipo_nivel_cuenta(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(cuenta_predefinida $cuenta_predefinida,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//cuenta_predefinida_logic_add::updatecuenta_predefinidaToSave($this->cuenta_predefinida);			
			
			if(!$paraDeleteCascade) {				
				cuenta_predefinida_data::save($cuenta_predefinida, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($cuenta_predefinida->getempresa(),$this->connexion);
		tipo_cuenta_predefinida_data::save($cuenta_predefinida->gettipo_cuenta_predefinida(),$this->connexion);
		tipo_cuenta_data::save($cuenta_predefinida->gettipo_cuenta(),$this->connexion);
		tipo_nivel_cuenta_data::save($cuenta_predefinida->gettipo_nivel_cuenta(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cuenta_predefinida->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_cuenta_predefinida::$class.'') {
				tipo_cuenta_predefinida_data::save($cuenta_predefinida->gettipo_cuenta_predefinida(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_cuenta::$class.'') {
				tipo_cuenta_data::save($cuenta_predefinida->gettipo_cuenta(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_nivel_cuenta::$class.'') {
				tipo_nivel_cuenta_data::save($cuenta_predefinida->gettipo_nivel_cuenta(),$this->connexion);
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
			empresa_data::save($cuenta_predefinida->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_cuenta_predefinida::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_cuenta_predefinida_data::save($cuenta_predefinida->gettipo_cuenta_predefinida(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_cuenta_data::save($cuenta_predefinida->gettipo_cuenta(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_nivel_cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_nivel_cuenta_data::save($cuenta_predefinida->gettipo_nivel_cuenta(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($cuenta_predefinida->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($cuenta_predefinida->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_cuenta_predefinida_data::save($cuenta_predefinida->gettipo_cuenta_predefinida(),$this->connexion);
		$tipo_cuenta_predefinidaLogic= new tipo_cuenta_predefinida_logic($this->connexion);
		$tipo_cuenta_predefinidaLogic->deepSave($cuenta_predefinida->gettipo_cuenta_predefinida(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_cuenta_data::save($cuenta_predefinida->gettipo_cuenta(),$this->connexion);
		$tipo_cuentaLogic= new tipo_cuenta_logic($this->connexion);
		$tipo_cuentaLogic->deepSave($cuenta_predefinida->gettipo_cuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_nivel_cuenta_data::save($cuenta_predefinida->gettipo_nivel_cuenta(),$this->connexion);
		$tipo_nivel_cuentaLogic= new tipo_nivel_cuenta_logic($this->connexion);
		$tipo_nivel_cuentaLogic->deepSave($cuenta_predefinida->gettipo_nivel_cuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cuenta_predefinida->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($cuenta_predefinida->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_cuenta_predefinida::$class.'') {
				tipo_cuenta_predefinida_data::save($cuenta_predefinida->gettipo_cuenta_predefinida(),$this->connexion);
				$tipo_cuenta_predefinidaLogic= new tipo_cuenta_predefinida_logic($this->connexion);
				$tipo_cuenta_predefinidaLogic->deepSave($cuenta_predefinida->gettipo_cuenta_predefinida(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_cuenta::$class.'') {
				tipo_cuenta_data::save($cuenta_predefinida->gettipo_cuenta(),$this->connexion);
				$tipo_cuentaLogic= new tipo_cuenta_logic($this->connexion);
				$tipo_cuentaLogic->deepSave($cuenta_predefinida->gettipo_cuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_nivel_cuenta::$class.'') {
				tipo_nivel_cuenta_data::save($cuenta_predefinida->gettipo_nivel_cuenta(),$this->connexion);
				$tipo_nivel_cuentaLogic= new tipo_nivel_cuenta_logic($this->connexion);
				$tipo_nivel_cuentaLogic->deepSave($cuenta_predefinida->gettipo_nivel_cuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			empresa_data::save($cuenta_predefinida->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($cuenta_predefinida->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_cuenta_predefinida::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_cuenta_predefinida_data::save($cuenta_predefinida->gettipo_cuenta_predefinida(),$this->connexion);
			$tipo_cuenta_predefinidaLogic= new tipo_cuenta_predefinida_logic($this->connexion);
			$tipo_cuenta_predefinidaLogic->deepSave($cuenta_predefinida->gettipo_cuenta_predefinida(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_cuenta_data::save($cuenta_predefinida->gettipo_cuenta(),$this->connexion);
			$tipo_cuentaLogic= new tipo_cuenta_logic($this->connexion);
			$tipo_cuentaLogic->deepSave($cuenta_predefinida->gettipo_cuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_nivel_cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_nivel_cuenta_data::save($cuenta_predefinida->gettipo_nivel_cuenta(),$this->connexion);
			$tipo_nivel_cuentaLogic= new tipo_nivel_cuenta_logic($this->connexion);
			$tipo_nivel_cuentaLogic->deepSave($cuenta_predefinida->gettipo_nivel_cuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				cuenta_predefinida_data::save($cuenta_predefinida, $this->connexion);
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
			
			$this->deepLoad($this->cuenta_predefinida,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->cuenta_predefinidas as $cuenta_predefinida) {
				$this->deepLoad($cuenta_predefinida,$isDeep,$deepLoadType,$clases);
								
				cuenta_predefinida_util::refrescarFKDescripciones($this->cuenta_predefinidas);
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
			
			foreach($this->cuenta_predefinidas as $cuenta_predefinida) {
				$this->deepLoad($cuenta_predefinida,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->cuenta_predefinida,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->cuenta_predefinidas as $cuenta_predefinida) {
				$this->deepSave($cuenta_predefinida,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->cuenta_predefinidas as $cuenta_predefinida) {
				$this->deepSave($cuenta_predefinida,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(tipo_cuenta_predefinida::$class);
				$classes[]=new Classe(tipo_cuenta::$class);
				$classes[]=new Classe(tipo_nivel_cuenta::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==tipo_cuenta_predefinida::$class) {
						$classes[]=new Classe(tipo_cuenta_predefinida::$class);
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
					if($clas->clas==tipo_nivel_cuenta::$class) {
						$classes[]=new Classe(tipo_nivel_cuenta::$class);
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
					if($clas->clas==tipo_cuenta_predefinida::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_cuenta_predefinida::$class);
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
					if($clas->clas==tipo_nivel_cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_nivel_cuenta::$class);
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
	
	
	
	
	
	
	
	public function getcuenta_predefinida() : ?cuenta_predefinida {	
		/*
		cuenta_predefinida_logic_add::checkcuenta_predefinidaToGet($this->cuenta_predefinida,$this->datosCliente);
		cuenta_predefinida_logic_add::updatecuenta_predefinidaToGet($this->cuenta_predefinida);
		*/
			
		return $this->cuenta_predefinida;
	}
		
	public function setcuenta_predefinida(cuenta_predefinida $newcuenta_predefinida) {
		$this->cuenta_predefinida = $newcuenta_predefinida;
	}
	
	public function getcuenta_predefinidas() : array {		
		/*
		cuenta_predefinida_logic_add::checkcuenta_predefinidaToGets($this->cuenta_predefinidas,$this->datosCliente);
		
		foreach ($this->cuenta_predefinidas as $cuenta_predefinidaLocal ) {
			cuenta_predefinida_logic_add::updatecuenta_predefinidaToGet($cuenta_predefinidaLocal);
		}
		*/
		
		return $this->cuenta_predefinidas;
	}
	
	public function setcuenta_predefinidas(array $newcuenta_predefinidas) {
		$this->cuenta_predefinidas = $newcuenta_predefinidas;
	}
	
	public function getcuenta_predefinidaDataAccess() : cuenta_predefinida_data {
		return $this->cuenta_predefinidaDataAccess;
	}
	
	public function setcuenta_predefinidaDataAccess(cuenta_predefinida_data $newcuenta_predefinidaDataAccess) {
		$this->cuenta_predefinidaDataAccess = $newcuenta_predefinidaDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        cuenta_predefinida_carga::$CONTROLLER;;        
		
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
