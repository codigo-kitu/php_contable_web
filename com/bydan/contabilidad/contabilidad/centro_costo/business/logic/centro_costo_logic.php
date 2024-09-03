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

namespace com\bydan\contabilidad\contabilidad\centro_costo\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_carga;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_param_return;

use com\bydan\contabilidad\contabilidad\centro_costo\presentation\session\centro_costo_session;

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

use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_util;
use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;
use com\bydan\contabilidad\contabilidad\centro_costo\business\data\centro_costo_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\entity\asiento_predefinido;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\data\asiento_predefinido_data;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\logic\asiento_predefinido_logic;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\data\asiento_data;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\business\entity\asiento_automatico_detalle;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\business\data\asiento_automatico_detalle_data;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\business\logic\asiento_automatico_detalle_logic;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_util;

use com\bydan\contabilidad\contabilidad\asiento_automatico\business\entity\asiento_automatico;
use com\bydan\contabilidad\contabilidad\asiento_automatico\business\data\asiento_automatico_data;
use com\bydan\contabilidad\contabilidad\asiento_automatico\business\logic\asiento_automatico_logic;
use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_util;

//REL DETALLES

use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_carga;



class centro_costo_logic  extends GeneralEntityLogic implements centro_costo_logicI {	
	/*GENERAL*/
	public centro_costo_data $centro_costoDataAccess;
	//public ?centro_costo_logic_add $centro_costoLogicAdditional=null;
	public ?centro_costo $centro_costo;
	public array $centro_costos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->centro_costoDataAccess = new centro_costo_data();			
			$this->centro_costos = array();
			$this->centro_costo = new centro_costo();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->centro_costoLogicAdditional = new centro_costo_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->centro_costoLogicAdditional==null) {
		//	$this->centro_costoLogicAdditional=new centro_costo_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->centro_costoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->centro_costoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->centro_costoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->centro_costoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->centro_costos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->centro_costos=$this->centro_costoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				centro_costo_util::refrescarFKDescripciones($this->centro_costos);
			}
			
			//centro_costo_logic_add::checkcentro_costoToGets($this->centro_costos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->centro_costos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->centro_costos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->centro_costos=$this->centro_costoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				centro_costo_util::refrescarFKDescripciones($this->centro_costos);
			}
			
			//centro_costo_logic_add::checkcentro_costoToGets($this->centro_costos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->centro_costos);
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
		$this->centro_costo = new centro_costo();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->centro_costo=$this->centro_costoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->centro_costo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				centro_costo_util::refrescarFKDescripcion($this->centro_costo);
			}
						
			//centro_costo_logic_add::checkcentro_costoToGet($this->centro_costo,$this->datosCliente);
			//centro_costo_logic_add::updatecentro_costoToGet($this->centro_costo);
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
		$this->centro_costo = new  centro_costo();
		  		  
        try {		
			$this->centro_costo=$this->centro_costoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->centro_costo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				centro_costo_util::refrescarFKDescripcion($this->centro_costo);
			}
			
			//centro_costo_logic_add::checkcentro_costoToGet($this->centro_costo,$this->datosCliente);
			//centro_costo_logic_add::updatecentro_costoToGet($this->centro_costo);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?centro_costo {
		$centro_costoLogic = new  centro_costo_logic();
		  		  
        try {		
			$centro_costoLogic->setConnexion($connexion);			
			$centro_costoLogic->getEntity($id);			
			return $centro_costoLogic->getcentro_costo();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->centro_costo = new  centro_costo();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->centro_costo=$this->centro_costoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->centro_costo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				centro_costo_util::refrescarFKDescripcion($this->centro_costo);
			}
			
			//centro_costo_logic_add::checkcentro_costoToGet($this->centro_costo,$this->datosCliente);
			//centro_costo_logic_add::updatecentro_costoToGet($this->centro_costo);
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
		$this->centro_costo = new  centro_costo();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->centro_costo=$this->centro_costoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->centro_costo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				centro_costo_util::refrescarFKDescripcion($this->centro_costo);
			}
			
			//centro_costo_logic_add::checkcentro_costoToGet($this->centro_costo,$this->datosCliente);
			//centro_costo_logic_add::updatecentro_costoToGet($this->centro_costo);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?centro_costo {
		$centro_costoLogic = new  centro_costo_logic();
		  		  
        try {		
			$centro_costoLogic->setConnexion($connexion);			
			$centro_costoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $centro_costoLogic->getcentro_costo();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->centro_costos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->centro_costos=$this->centro_costoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				centro_costo_util::refrescarFKDescripciones($this->centro_costos);
			}
			
			//centro_costo_logic_add::checkcentro_costoToGets($this->centro_costos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->centro_costos);			
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
		$this->centro_costos = array();
		  		  
        try {			
			$this->centro_costos=$this->centro_costoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				centro_costo_util::refrescarFKDescripciones($this->centro_costos);
			}
			
			//centro_costo_logic_add::checkcentro_costoToGets($this->centro_costos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->centro_costos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->centro_costos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->centro_costos=$this->centro_costoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				centro_costo_util::refrescarFKDescripciones($this->centro_costos);
			}
			
			//centro_costo_logic_add::checkcentro_costoToGets($this->centro_costos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->centro_costos);
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
		$this->centro_costos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->centro_costos=$this->centro_costoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				centro_costo_util::refrescarFKDescripciones($this->centro_costos);
			}
			
			//centro_costo_logic_add::checkcentro_costoToGets($this->centro_costos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->centro_costos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$centro_costoLogic = new  centro_costo_logic();
		  		  
        try {		
			$centro_costoLogic->setConnexion($connexion);			
			$centro_costoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $centro_costoLogic->getcentro_costos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->centro_costos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->centro_costos=$this->centro_costoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				centro_costo_util::refrescarFKDescripciones($this->centro_costos);
			}
			
			//centro_costo_logic_add::checkcentro_costoToGets($this->centro_costos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->centro_costos);
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
		$this->centro_costos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->centro_costos=$this->centro_costoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				centro_costo_util::refrescarFKDescripciones($this->centro_costos);
			}
			
			//centro_costo_logic_add::checkcentro_costoToGets($this->centro_costos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->centro_costos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->centro_costos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->centro_costos=$this->centro_costoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				centro_costo_util::refrescarFKDescripciones($this->centro_costos);
			}
			
			//centro_costo_logic_add::checkcentro_costoToGets($this->centro_costos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->centro_costos);
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
		$this->centro_costos = array();
		  		  
        try {			
			$this->centro_costos=$this->centro_costoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				centro_costo_util::refrescarFKDescripciones($this->centro_costos);
			}	
			
			//centro_costo_logic_add::checkcentro_costoToGets($this->centro_costos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->centro_costos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->centro_costos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->centro_costos=$this->centro_costoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				centro_costo_util::refrescarFKDescripciones($this->centro_costos);
			}
			
			//centro_costo_logic_add::checkcentro_costoToGets($this->centro_costos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->centro_costos);
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
		$this->centro_costos = array();
		  		  
        try {		
			$this->centro_costos=$this->centro_costoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				centro_costo_util::refrescarFKDescripciones($this->centro_costos);
			}
			
			//centro_costo_logic_add::checkcentro_costoToGets($this->centro_costos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->centro_costos);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,centro_costo_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->centro_costos=$this->centro_costoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				centro_costo_util::refrescarFKDescripciones($this->centro_costos);
			}
			//centro_costo_logic_add::checkcentro_costoToGets($this->centro_costos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->centro_costos);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,centro_costo_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->centro_costos=$this->centro_costoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				centro_costo_util::refrescarFKDescripciones($this->centro_costos);
			}
			//centro_costo_logic_add::checkcentro_costoToGets($this->centro_costos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->centro_costos);
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
						
			//centro_costo_logic_add::checkcentro_costoToSave($this->centro_costo,$this->datosCliente,$this->connexion);	       
			//centro_costo_logic_add::updatecentro_costoToSave($this->centro_costo);			
			centro_costo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->centro_costo,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->centro_costoLogicAdditional->checkGeneralEntityToSave($this,$this->centro_costo,$this->datosCliente,$this->connexion);
			
			
			centro_costo_data::save($this->centro_costo, $this->connexion);	    	       	 				
			//centro_costo_logic_add::checkcentro_costoToSaveAfter($this->centro_costo,$this->datosCliente,$this->connexion);			
			//$this->centro_costoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->centro_costo,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->centro_costo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->centro_costo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				centro_costo_util::refrescarFKDescripcion($this->centro_costo);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->centro_costo->getIsDeleted()) {
				$this->centro_costo=null;
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
						
			/*centro_costo_logic_add::checkcentro_costoToSave($this->centro_costo,$this->datosCliente,$this->connexion);*/	        
			//centro_costo_logic_add::updatecentro_costoToSave($this->centro_costo);			
			//$this->centro_costoLogicAdditional->checkGeneralEntityToSave($this,$this->centro_costo,$this->datosCliente,$this->connexion);			
			centro_costo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->centro_costo,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			centro_costo_data::save($this->centro_costo, $this->connexion);	    	       	 						
			/*centro_costo_logic_add::checkcentro_costoToSaveAfter($this->centro_costo,$this->datosCliente,$this->connexion);*/			
			//$this->centro_costoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->centro_costo,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->centro_costo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->centro_costo,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				centro_costo_util::refrescarFKDescripcion($this->centro_costo);				
			}
			
			if($this->centro_costo->getIsDeleted()) {
				$this->centro_costo=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(centro_costo $centro_costo,Connexion $connexion)  {
		$centro_costoLogic = new  centro_costo_logic();		  		  
        try {		
			$centro_costoLogic->setConnexion($connexion);			
			$centro_costoLogic->setcentro_costo($centro_costo);			
			$centro_costoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*centro_costo_logic_add::checkcentro_costoToSaves($this->centro_costos,$this->datosCliente,$this->connexion);*/	        	
			//$this->centro_costoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->centro_costos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->centro_costos as $centro_costoLocal) {				
								
				//centro_costo_logic_add::updatecentro_costoToSave($centro_costoLocal);	        	
				centro_costo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$centro_costoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				centro_costo_data::save($centro_costoLocal, $this->connexion);				
			}
			
			/*centro_costo_logic_add::checkcentro_costoToSavesAfter($this->centro_costos,$this->datosCliente,$this->connexion);*/			
			//$this->centro_costoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->centro_costos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				centro_costo_util::refrescarFKDescripciones($this->centro_costos);
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
			/*centro_costo_logic_add::checkcentro_costoToSaves($this->centro_costos,$this->datosCliente,$this->connexion);*/			
			//$this->centro_costoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->centro_costos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->centro_costos as $centro_costoLocal) {				
								
				//centro_costo_logic_add::updatecentro_costoToSave($centro_costoLocal);	        	
				centro_costo_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$centro_costoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				centro_costo_data::save($centro_costoLocal, $this->connexion);				
			}			
			
			/*centro_costo_logic_add::checkcentro_costoToSavesAfter($this->centro_costos,$this->datosCliente,$this->connexion);*/			
			//$this->centro_costoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->centro_costos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				centro_costo_util::refrescarFKDescripciones($this->centro_costos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $centro_costos,Connexion $connexion)  {
		$centro_costoLogic = new  centro_costo_logic();
		  		  
        try {		
			$centro_costoLogic->setConnexion($connexion);			
			$centro_costoLogic->setcentro_costos($centro_costos);			
			$centro_costoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$centro_costosAux=array();
		
		foreach($this->centro_costos as $centro_costo) {
			if($centro_costo->getIsDeleted()==false) {
				$centro_costosAux[]=$centro_costo;
			}
		}
		
		$this->centro_costos=$centro_costosAux;
	}
	
	public function updateToGetsAuxiliar(array &$centro_costos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->centro_costos as $centro_costo) {
				
				$centro_costo->setid_empresa_Descripcion(centro_costo_util::getempresaDescripcion($centro_costo->getempresa()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$centro_costo_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$centro_costo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$centro_costo_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$centro_costo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$centro_costo_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$centro_costoForeignKey=new centro_costo_param_return();//centro_costoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$centro_costoForeignKey,$centro_costo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$centro_costoForeignKey,$centro_costo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $centro_costoForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$centro_costoForeignKey,$centro_costo_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$centro_costoForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($centro_costo_session==null) {
			$centro_costo_session=new centro_costo_session();
		}
		
		if($centro_costo_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($centro_costoForeignKey->idempresaDefaultFK==0) {
					$centro_costoForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$centro_costoForeignKey->empresasFK[$empresaLocal->getId()]=centro_costo_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($centro_costo_session->bigidempresaActual!=null && $centro_costo_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($centro_costo_session->bigidempresaActual);//WithConnection

				$centro_costoForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=centro_costo_util::getempresaDescripcion($empresaLogic->getempresa());
				$centro_costoForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($centro_costo,$asientopredefinidos,$asientos,$asientoautomaticodetalles,$asientoautomaticos) {
		$this->saveRelacionesBase($centro_costo,$asientopredefinidos,$asientos,$asientoautomaticodetalles,$asientoautomaticos,true);
	}

	public function saveRelaciones($centro_costo,$asientopredefinidos,$asientos,$asientoautomaticodetalles,$asientoautomaticos) {
		$this->saveRelacionesBase($centro_costo,$asientopredefinidos,$asientos,$asientoautomaticodetalles,$asientoautomaticos,false);
	}

	public function saveRelacionesBase($centro_costo,$asientopredefinidos=array(),$asientos=array(),$asientoautomaticodetalles=array(),$asientoautomaticos=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$centro_costo->setasiento_predefinidos($asientopredefinidos);
			$centro_costo->setasientos($asientos);
			$centro_costo->setasiento_automatico_detalles($asientoautomaticodetalles);
			$centro_costo->setasiento_automaticos($asientoautomaticos);
			$this->setcentro_costo($centro_costo);

			if(true) {

				//centro_costo_logic_add::updateRelacionesToSave($centro_costo,$this);

				if(($this->centro_costo->getIsNew() || $this->centro_costo->getIsChanged()) && !$this->centro_costo->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($asientopredefinidos,$asientos,$asientoautomaticodetalles,$asientoautomaticos);

				} else if($this->centro_costo->getIsDeleted()) {
					$this->saveRelacionesDetalles($asientopredefinidos,$asientos,$asientoautomaticodetalles,$asientoautomaticos);
					$this->save();
				}

				//centro_costo_logic_add::updateRelacionesToSaveAfter($centro_costo,$this);

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
	
	
	public function saveRelacionesDetalles($asientopredefinidos=array(),$asientos=array(),$asientoautomaticodetalles=array(),$asientoautomaticos=array()) {
		try {
	

			$idcentro_costoActual=$this->getcentro_costo()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_predefinido_carga.php');
			asiento_predefinido_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$asientopredefinidoLogic_Desde_centro_costo=new asiento_predefinido_logic();
			$asientopredefinidoLogic_Desde_centro_costo->setasiento_predefinidos($asientopredefinidos);

			$asientopredefinidoLogic_Desde_centro_costo->setConnexion($this->getConnexion());
			$asientopredefinidoLogic_Desde_centro_costo->setDatosCliente($this->datosCliente);

			foreach($asientopredefinidoLogic_Desde_centro_costo->getasiento_predefinidos() as $asientopredefinido_Desde_centro_costo) {
				$asientopredefinido_Desde_centro_costo->setid_centro_costo($idcentro_costoActual);

				$asientopredefinidoLogic_Desde_centro_costo->setasiento_predefinido($asientopredefinido_Desde_centro_costo);
				$asientopredefinidoLogic_Desde_centro_costo->save();

				$idasiento_predefinidoActual=$asiento_predefinido_Desde_centro_costo->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_predefinido_detalle_carga.php');
				asiento_predefinido_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$asientopredefinidodetalleLogic_Desde_asiento_predefinido=new asiento_predefinido_detalle_logic();

				if($asiento_predefinido_Desde_centro_costo->getasiento_predefinido_detalles()==null){
					$asiento_predefinido_Desde_centro_costo->setasiento_predefinido_detalles(array());
				}

				$asientopredefinidodetalleLogic_Desde_asiento_predefinido->setasiento_predefinido_detalles($asiento_predefinido_Desde_centro_costo->getasiento_predefinido_detalles());

				$asientopredefinidodetalleLogic_Desde_asiento_predefinido->setConnexion($this->getConnexion());
				$asientopredefinidodetalleLogic_Desde_asiento_predefinido->setDatosCliente($this->datosCliente);

				foreach($asientopredefinidodetalleLogic_Desde_asiento_predefinido->getasiento_predefinido_detalles() as $asientopredefinidodetalle_Desde_asiento_predefinido) {
					$asientopredefinidodetalle_Desde_asiento_predefinido->setid_asiento_predefinido($idasiento_predefinidoActual);
				}

				$asientopredefinidodetalleLogic_Desde_asiento_predefinido->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_carga.php');
				asiento_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$asientoLogic_Desde_asiento_predefinido=new asiento_logic();

				if($asiento_predefinido_Desde_centro_costo->getasientos()==null){
					$asiento_predefinido_Desde_centro_costo->setasientos(array());
				}

				$asientoLogic_Desde_asiento_predefinido->setasientos($asiento_predefinido_Desde_centro_costo->getasientos());

				$asientoLogic_Desde_asiento_predefinido->setConnexion($this->getConnexion());
				$asientoLogic_Desde_asiento_predefinido->setDatosCliente($this->datosCliente);

				foreach($asientoLogic_Desde_asiento_predefinido->getasientos() as $asiento_Desde_asiento_predefinido) {
					$asiento_Desde_asiento_predefinido->setid_asiento_predefinido($idasiento_predefinidoActual);

					$asientoLogic_Desde_asiento_predefinido->setasiento($asiento_Desde_asiento_predefinido);
					$asientoLogic_Desde_asiento_predefinido->save();

					$idasientoActual=$asiento_Desde_asiento_predefinido->getId();

					include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_detalle_carga.php');
					asiento_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

					$asientodetalleLogic_Desde_asiento=new asiento_detalle_logic();

					if($asiento_Desde_asiento_predefinido->getasiento_detalles()==null){
						$asiento_Desde_asiento_predefinido->setasiento_detalles(array());
					}

					$asientodetalleLogic_Desde_asiento->setasiento_detalles($asiento_Desde_asiento_predefinido->getasiento_detalles());

					$asientodetalleLogic_Desde_asiento->setConnexion($this->getConnexion());
					$asientodetalleLogic_Desde_asiento->setDatosCliente($this->datosCliente);

					foreach($asientodetalleLogic_Desde_asiento->getasiento_detalles() as $asientodetalle_Desde_asiento) {
						$asientodetalle_Desde_asiento->setid_asiento($idasientoActual);
					}

					$asientodetalleLogic_Desde_asiento->saves();
				}

			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_carga.php');
			asiento_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$asientoLogic_Desde_centro_costo=new asiento_logic();
			$asientoLogic_Desde_centro_costo->setasientos($asientos);

			$asientoLogic_Desde_centro_costo->setConnexion($this->getConnexion());
			$asientoLogic_Desde_centro_costo->setDatosCliente($this->datosCliente);

			foreach($asientoLogic_Desde_centro_costo->getasientos() as $asiento_Desde_centro_costo) {
				$asiento_Desde_centro_costo->setid_centro_costo($idcentro_costoActual);

				$asientoLogic_Desde_centro_costo->setasiento($asiento_Desde_centro_costo);
				$asientoLogic_Desde_centro_costo->save();

				$idasientoActual=$asiento_Desde_centro_costo->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_detalle_carga.php');
				asiento_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$asientodetalleLogic_Desde_asiento=new asiento_detalle_logic();

				if($asiento_Desde_centro_costo->getasiento_detalles()==null){
					$asiento_Desde_centro_costo->setasiento_detalles(array());
				}

				$asientodetalleLogic_Desde_asiento->setasiento_detalles($asiento_Desde_centro_costo->getasiento_detalles());

				$asientodetalleLogic_Desde_asiento->setConnexion($this->getConnexion());
				$asientodetalleLogic_Desde_asiento->setDatosCliente($this->datosCliente);

				foreach($asientodetalleLogic_Desde_asiento->getasiento_detalles() as $asientodetalle_Desde_asiento) {
					$asientodetalle_Desde_asiento->setid_asiento($idasientoActual);
				}

				$asientodetalleLogic_Desde_asiento->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_automatico_detalle_carga.php');
			asiento_automatico_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$asientoautomaticodetalleLogic_Desde_centro_costo=new asiento_automatico_detalle_logic();
			$asientoautomaticodetalleLogic_Desde_centro_costo->setasiento_automatico_detalles($asientoautomaticodetalles);

			$asientoautomaticodetalleLogic_Desde_centro_costo->setConnexion($this->getConnexion());
			$asientoautomaticodetalleLogic_Desde_centro_costo->setDatosCliente($this->datosCliente);

			foreach($asientoautomaticodetalleLogic_Desde_centro_costo->getasiento_automatico_detalles() as $asientoautomaticodetalle_Desde_centro_costo) {
				$asientoautomaticodetalle_Desde_centro_costo->setid_centro_costo($idcentro_costoActual);
			}

			$asientoautomaticodetalleLogic_Desde_centro_costo->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_automatico_carga.php');
			asiento_automatico_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$asientoautomaticoLogic_Desde_centro_costo=new asiento_automatico_logic();
			$asientoautomaticoLogic_Desde_centro_costo->setasiento_automaticos($asientoautomaticos);

			$asientoautomaticoLogic_Desde_centro_costo->setConnexion($this->getConnexion());
			$asientoautomaticoLogic_Desde_centro_costo->setDatosCliente($this->datosCliente);

			foreach($asientoautomaticoLogic_Desde_centro_costo->getasiento_automaticos() as $asientoautomatico_Desde_centro_costo) {
				$asientoautomatico_Desde_centro_costo->setid_centro_costo($idcentro_costoActual);

				$asientoautomaticoLogic_Desde_centro_costo->setasiento_automatico($asientoautomatico_Desde_centro_costo);
				$asientoautomaticoLogic_Desde_centro_costo->save();

				$idasiento_automaticoActual=$asiento_automatico_Desde_centro_costo->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_automatico_detalle_carga.php');
				asiento_automatico_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$asientoautomaticodetalleLogic_Desde_asiento_automatico=new asiento_automatico_detalle_logic();

				if($asiento_automatico_Desde_centro_costo->getasiento_automatico_detalles()==null){
					$asiento_automatico_Desde_centro_costo->setasiento_automatico_detalles(array());
				}

				$asientoautomaticodetalleLogic_Desde_asiento_automatico->setasiento_automatico_detalles($asiento_automatico_Desde_centro_costo->getasiento_automatico_detalles());

				$asientoautomaticodetalleLogic_Desde_asiento_automatico->setConnexion($this->getConnexion());
				$asientoautomaticodetalleLogic_Desde_asiento_automatico->setDatosCliente($this->datosCliente);

				foreach($asientoautomaticodetalleLogic_Desde_asiento_automatico->getasiento_automatico_detalles() as $asientoautomaticodetalle_Desde_asiento_automatico) {
					$asientoautomaticodetalle_Desde_asiento_automatico->setid_asiento_automatico($idasiento_automaticoActual);
				}

				$asientoautomaticodetalleLogic_Desde_asiento_automatico->saves();
			}


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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $centro_costos,centro_costo_param_return $centro_costoParameterGeneral) : centro_costo_param_return {
		$centro_costoReturnGeneral=new centro_costo_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $centro_costoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $centro_costos,centro_costo_param_return $centro_costoParameterGeneral) : centro_costo_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$centro_costoReturnGeneral=new centro_costo_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $centro_costoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $centro_costos,centro_costo $centro_costo,centro_costo_param_return $centro_costoParameterGeneral,bool $isEsNuevocentro_costo,array $clases) : centro_costo_param_return {
		 try {	
			$centro_costoReturnGeneral=new centro_costo_param_return();
	
			$centro_costoReturnGeneral->setcentro_costo($centro_costo);
			$centro_costoReturnGeneral->setcentro_costos($centro_costos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$centro_costoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $centro_costoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $centro_costos,centro_costo $centro_costo,centro_costo_param_return $centro_costoParameterGeneral,bool $isEsNuevocentro_costo,array $clases) : centro_costo_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$centro_costoReturnGeneral=new centro_costo_param_return();
	
			$centro_costoReturnGeneral->setcentro_costo($centro_costo);
			$centro_costoReturnGeneral->setcentro_costos($centro_costos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$centro_costoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $centro_costoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $centro_costos,centro_costo $centro_costo,centro_costo_param_return $centro_costoParameterGeneral,bool $isEsNuevocentro_costo,array $clases) : centro_costo_param_return {
		 try {	
			$centro_costoReturnGeneral=new centro_costo_param_return();
	
			$centro_costoReturnGeneral->setcentro_costo($centro_costo);
			$centro_costoReturnGeneral->setcentro_costos($centro_costos);
			
			
			
			return $centro_costoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $centro_costos,centro_costo $centro_costo,centro_costo_param_return $centro_costoParameterGeneral,bool $isEsNuevocentro_costo,array $clases) : centro_costo_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$centro_costoReturnGeneral=new centro_costo_param_return();
	
			$centro_costoReturnGeneral->setcentro_costo($centro_costo);
			$centro_costoReturnGeneral->setcentro_costos($centro_costos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $centro_costoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,centro_costo $centro_costo,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,centro_costo $centro_costo,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		centro_costo_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		centro_costo_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(centro_costo $centro_costo,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//centro_costo_logic_add::updatecentro_costoToGet($this->centro_costo);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$centro_costo->setempresa($this->centro_costoDataAccess->getempresa($this->connexion,$centro_costo));
		$centro_costo->setasiento_predefinidos($this->centro_costoDataAccess->getasiento_predefinidos($this->connexion,$centro_costo));
		$centro_costo->setasientos($this->centro_costoDataAccess->getasientos($this->connexion,$centro_costo));
		$centro_costo->setasiento_automatico_detalles($this->centro_costoDataAccess->getasiento_automatico_detalles($this->connexion,$centro_costo));
		$centro_costo->setasiento_automaticos($this->centro_costoDataAccess->getasiento_automaticos($this->connexion,$centro_costo));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$centro_costo->setempresa($this->centro_costoDataAccess->getempresa($this->connexion,$centro_costo));
				continue;
			}

			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$centro_costo->setasiento_predefinidos($this->centro_costoDataAccess->getasiento_predefinidos($this->connexion,$centro_costo));

				if($this->isConDeep) {
					$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
					$asientopredefinidoLogic->setasiento_predefinidos($centro_costo->getasiento_predefinidos());
					$classesLocal=asiento_predefinido_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$asientopredefinidoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					asiento_predefinido_util::refrescarFKDescripciones($asientopredefinidoLogic->getasiento_predefinidos());
					$centro_costo->setasiento_predefinidos($asientopredefinidoLogic->getasiento_predefinidos());
				}

				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$centro_costo->setasientos($this->centro_costoDataAccess->getasientos($this->connexion,$centro_costo));

				if($this->isConDeep) {
					$asientoLogic= new asiento_logic($this->connexion);
					$asientoLogic->setasientos($centro_costo->getasientos());
					$classesLocal=asiento_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$asientoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					asiento_util::refrescarFKDescripciones($asientoLogic->getasientos());
					$centro_costo->setasientos($asientoLogic->getasientos());
				}

				continue;
			}

			if($clas->clas==asiento_automatico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$centro_costo->setasiento_automatico_detalles($this->centro_costoDataAccess->getasiento_automatico_detalles($this->connexion,$centro_costo));

				if($this->isConDeep) {
					$asientoautomaticodetalleLogic= new asiento_automatico_detalle_logic($this->connexion);
					$asientoautomaticodetalleLogic->setasiento_automatico_detalles($centro_costo->getasiento_automatico_detalles());
					$classesLocal=asiento_automatico_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$asientoautomaticodetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					asiento_automatico_detalle_util::refrescarFKDescripciones($asientoautomaticodetalleLogic->getasiento_automatico_detalles());
					$centro_costo->setasiento_automatico_detalles($asientoautomaticodetalleLogic->getasiento_automatico_detalles());
				}

				continue;
			}

			if($clas->clas==asiento_automatico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$centro_costo->setasiento_automaticos($this->centro_costoDataAccess->getasiento_automaticos($this->connexion,$centro_costo));

				if($this->isConDeep) {
					$asientoautomaticoLogic= new asiento_automatico_logic($this->connexion);
					$asientoautomaticoLogic->setasiento_automaticos($centro_costo->getasiento_automaticos());
					$classesLocal=asiento_automatico_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$asientoautomaticoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					asiento_automatico_util::refrescarFKDescripciones($asientoautomaticoLogic->getasiento_automaticos());
					$centro_costo->setasiento_automaticos($asientoautomaticoLogic->getasiento_automaticos());
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
			$centro_costo->setempresa($this->centro_costoDataAccess->getempresa($this->connexion,$centro_costo));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_predefinido::$class);
			$centro_costo->setasiento_predefinidos($this->centro_costoDataAccess->getasiento_predefinidos($this->connexion,$centro_costo));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento::$class);
			$centro_costo->setasientos($this->centro_costoDataAccess->getasientos($this->connexion,$centro_costo));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_automatico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_automatico_detalle::$class);
			$centro_costo->setasiento_automatico_detalles($this->centro_costoDataAccess->getasiento_automatico_detalles($this->connexion,$centro_costo));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_automatico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_automatico::$class);
			$centro_costo->setasiento_automaticos($this->centro_costoDataAccess->getasiento_automaticos($this->connexion,$centro_costo));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$centro_costo->setempresa($this->centro_costoDataAccess->getempresa($this->connexion,$centro_costo));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($centro_costo->getempresa(),$isDeep,$deepLoadType,$clases);
				

		$centro_costo->setasiento_predefinidos($this->centro_costoDataAccess->getasiento_predefinidos($this->connexion,$centro_costo));

		foreach($centro_costo->getasiento_predefinidos() as $asientopredefinido) {
			$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
			$asientopredefinidoLogic->deepLoad($asientopredefinido,$isDeep,$deepLoadType,$clases);
		}

		$centro_costo->setasientos($this->centro_costoDataAccess->getasientos($this->connexion,$centro_costo));

		foreach($centro_costo->getasientos() as $asiento) {
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepLoad($asiento,$isDeep,$deepLoadType,$clases);
		}

		$centro_costo->setasiento_automatico_detalles($this->centro_costoDataAccess->getasiento_automatico_detalles($this->connexion,$centro_costo));

		foreach($centro_costo->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
			$asientoautomaticodetalleLogic= new asiento_automatico_detalle_logic($this->connexion);
			$asientoautomaticodetalleLogic->deepLoad($asientoautomaticodetalle,$isDeep,$deepLoadType,$clases);
		}

		$centro_costo->setasiento_automaticos($this->centro_costoDataAccess->getasiento_automaticos($this->connexion,$centro_costo));

		foreach($centro_costo->getasiento_automaticos() as $asientoautomatico) {
			$asientoautomaticoLogic= new asiento_automatico_logic($this->connexion);
			$asientoautomaticoLogic->deepLoad($asientoautomatico,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$centro_costo->setempresa($this->centro_costoDataAccess->getempresa($this->connexion,$centro_costo));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($centro_costo->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$centro_costo->setasiento_predefinidos($this->centro_costoDataAccess->getasiento_predefinidos($this->connexion,$centro_costo));

				foreach($centro_costo->getasiento_predefinidos() as $asientopredefinido) {
					$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
					$asientopredefinidoLogic->deepLoad($asientopredefinido,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$centro_costo->setasientos($this->centro_costoDataAccess->getasientos($this->connexion,$centro_costo));

				foreach($centro_costo->getasientos() as $asiento) {
					$asientoLogic= new asiento_logic($this->connexion);
					$asientoLogic->deepLoad($asiento,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==asiento_automatico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$centro_costo->setasiento_automatico_detalles($this->centro_costoDataAccess->getasiento_automatico_detalles($this->connexion,$centro_costo));

				foreach($centro_costo->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
					$asientoautomaticodetalleLogic= new asiento_automatico_detalle_logic($this->connexion);
					$asientoautomaticodetalleLogic->deepLoad($asientoautomaticodetalle,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==asiento_automatico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$centro_costo->setasiento_automaticos($this->centro_costoDataAccess->getasiento_automaticos($this->connexion,$centro_costo));

				foreach($centro_costo->getasiento_automaticos() as $asientoautomatico) {
					$asientoautomaticoLogic= new asiento_automatico_logic($this->connexion);
					$asientoautomaticoLogic->deepLoad($asientoautomatico,$isDeep,$deepLoadType,$clases);
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
			$centro_costo->setempresa($this->centro_costoDataAccess->getempresa($this->connexion,$centro_costo));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($centro_costo->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_predefinido::$class);
			$centro_costo->setasiento_predefinidos($this->centro_costoDataAccess->getasiento_predefinidos($this->connexion,$centro_costo));

			foreach($centro_costo->getasiento_predefinidos() as $asientopredefinido) {
				$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
				$asientopredefinidoLogic->deepLoad($asientopredefinido,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento::$class);
			$centro_costo->setasientos($this->centro_costoDataAccess->getasientos($this->connexion,$centro_costo));

			foreach($centro_costo->getasientos() as $asiento) {
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepLoad($asiento,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_automatico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_automatico_detalle::$class);
			$centro_costo->setasiento_automatico_detalles($this->centro_costoDataAccess->getasiento_automatico_detalles($this->connexion,$centro_costo));

			foreach($centro_costo->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
				$asientoautomaticodetalleLogic= new asiento_automatico_detalle_logic($this->connexion);
				$asientoautomaticodetalleLogic->deepLoad($asientoautomaticodetalle,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_automatico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_automatico::$class);
			$centro_costo->setasiento_automaticos($this->centro_costoDataAccess->getasiento_automaticos($this->connexion,$centro_costo));

			foreach($centro_costo->getasiento_automaticos() as $asientoautomatico) {
				$asientoautomaticoLogic= new asiento_automatico_logic($this->connexion);
				$asientoautomaticoLogic->deepLoad($asientoautomatico,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(centro_costo $centro_costo,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//centro_costo_logic_add::updatecentro_costoToSave($this->centro_costo);			
			
			if(!$paraDeleteCascade) {				
				centro_costo_data::save($centro_costo, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($centro_costo->getempresa(),$this->connexion);

		foreach($centro_costo->getasiento_predefinidos() as $asientopredefinido) {
			$asientopredefinido->setid_centro_costo($centro_costo->getId());
			asiento_predefinido_data::save($asientopredefinido,$this->connexion);
		}


		foreach($centro_costo->getasientos() as $asiento) {
			$asiento->setid_centro_costo($centro_costo->getId());
			asiento_data::save($asiento,$this->connexion);
		}


		foreach($centro_costo->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
			$asientoautomaticodetalle->setid_centro_costo($centro_costo->getId());
			asiento_automatico_detalle_data::save($asientoautomaticodetalle,$this->connexion);
		}


		foreach($centro_costo->getasiento_automaticos() as $asientoautomatico) {
			$asientoautomatico->setid_centro_costo($centro_costo->getId());
			asiento_automatico_data::save($asientoautomatico,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($centro_costo->getempresa(),$this->connexion);
				continue;
			}


			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($centro_costo->getasiento_predefinidos() as $asientopredefinido) {
					$asientopredefinido->setid_centro_costo($centro_costo->getId());
					asiento_predefinido_data::save($asientopredefinido,$this->connexion);
				}

				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($centro_costo->getasientos() as $asiento) {
					$asiento->setid_centro_costo($centro_costo->getId());
					asiento_data::save($asiento,$this->connexion);
				}

				continue;
			}

			if($clas->clas==asiento_automatico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($centro_costo->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
					$asientoautomaticodetalle->setid_centro_costo($centro_costo->getId());
					asiento_automatico_detalle_data::save($asientoautomaticodetalle,$this->connexion);
				}

				continue;
			}

			if($clas->clas==asiento_automatico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($centro_costo->getasiento_automaticos() as $asientoautomatico) {
					$asientoautomatico->setid_centro_costo($centro_costo->getId());
					asiento_automatico_data::save($asientoautomatico,$this->connexion);
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
			empresa_data::save($centro_costo->getempresa(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_predefinido::$class);

			foreach($centro_costo->getasiento_predefinidos() as $asientopredefinido) {
				$asientopredefinido->setid_centro_costo($centro_costo->getId());
				asiento_predefinido_data::save($asientopredefinido,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento::$class);

			foreach($centro_costo->getasientos() as $asiento) {
				$asiento->setid_centro_costo($centro_costo->getId());
				asiento_data::save($asiento,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_automatico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_automatico_detalle::$class);

			foreach($centro_costo->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
				$asientoautomaticodetalle->setid_centro_costo($centro_costo->getId());
				asiento_automatico_detalle_data::save($asientoautomaticodetalle,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_automatico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_automatico::$class);

			foreach($centro_costo->getasiento_automaticos() as $asientoautomatico) {
				$asientoautomatico->setid_centro_costo($centro_costo->getId());
				asiento_automatico_data::save($asientoautomatico,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($centro_costo->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($centro_costo->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($centro_costo->getasiento_predefinidos() as $asientopredefinido) {
			$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
			$asientopredefinido->setid_centro_costo($centro_costo->getId());
			asiento_predefinido_data::save($asientopredefinido,$this->connexion);
			$asientopredefinidoLogic->deepSave($asientopredefinido,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($centro_costo->getasientos() as $asiento) {
			$asientoLogic= new asiento_logic($this->connexion);
			$asiento->setid_centro_costo($centro_costo->getId());
			asiento_data::save($asiento,$this->connexion);
			$asientoLogic->deepSave($asiento,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($centro_costo->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
			$asientoautomaticodetalleLogic= new asiento_automatico_detalle_logic($this->connexion);
			$asientoautomaticodetalle->setid_centro_costo($centro_costo->getId());
			asiento_automatico_detalle_data::save($asientoautomaticodetalle,$this->connexion);
			$asientoautomaticodetalleLogic->deepSave($asientoautomaticodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($centro_costo->getasiento_automaticos() as $asientoautomatico) {
			$asientoautomaticoLogic= new asiento_automatico_logic($this->connexion);
			$asientoautomatico->setid_centro_costo($centro_costo->getId());
			asiento_automatico_data::save($asientoautomatico,$this->connexion);
			$asientoautomaticoLogic->deepSave($asientoautomatico,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($centro_costo->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($centro_costo->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($centro_costo->getasiento_predefinidos() as $asientopredefinido) {
					$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
					$asientopredefinido->setid_centro_costo($centro_costo->getId());
					asiento_predefinido_data::save($asientopredefinido,$this->connexion);
					$asientopredefinidoLogic->deepSave($asientopredefinido,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($centro_costo->getasientos() as $asiento) {
					$asientoLogic= new asiento_logic($this->connexion);
					$asiento->setid_centro_costo($centro_costo->getId());
					asiento_data::save($asiento,$this->connexion);
					$asientoLogic->deepSave($asiento,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==asiento_automatico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($centro_costo->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
					$asientoautomaticodetalleLogic= new asiento_automatico_detalle_logic($this->connexion);
					$asientoautomaticodetalle->setid_centro_costo($centro_costo->getId());
					asiento_automatico_detalle_data::save($asientoautomaticodetalle,$this->connexion);
					$asientoautomaticodetalleLogic->deepSave($asientoautomaticodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==asiento_automatico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($centro_costo->getasiento_automaticos() as $asientoautomatico) {
					$asientoautomaticoLogic= new asiento_automatico_logic($this->connexion);
					$asientoautomatico->setid_centro_costo($centro_costo->getId());
					asiento_automatico_data::save($asientoautomatico,$this->connexion);
					$asientoautomaticoLogic->deepSave($asientoautomatico,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($centro_costo->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($centro_costo->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_predefinido::$class);

			foreach($centro_costo->getasiento_predefinidos() as $asientopredefinido) {
				$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
				$asientopredefinido->setid_centro_costo($centro_costo->getId());
				asiento_predefinido_data::save($asientopredefinido,$this->connexion);
				$asientopredefinidoLogic->deepSave($asientopredefinido,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento::$class);

			foreach($centro_costo->getasientos() as $asiento) {
				$asientoLogic= new asiento_logic($this->connexion);
				$asiento->setid_centro_costo($centro_costo->getId());
				asiento_data::save($asiento,$this->connexion);
				$asientoLogic->deepSave($asiento,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_automatico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_automatico_detalle::$class);

			foreach($centro_costo->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
				$asientoautomaticodetalleLogic= new asiento_automatico_detalle_logic($this->connexion);
				$asientoautomaticodetalle->setid_centro_costo($centro_costo->getId());
				asiento_automatico_detalle_data::save($asientoautomaticodetalle,$this->connexion);
				$asientoautomaticodetalleLogic->deepSave($asientoautomaticodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_automatico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_automatico::$class);

			foreach($centro_costo->getasiento_automaticos() as $asientoautomatico) {
				$asientoautomaticoLogic= new asiento_automatico_logic($this->connexion);
				$asientoautomatico->setid_centro_costo($centro_costo->getId());
				asiento_automatico_data::save($asientoautomatico,$this->connexion);
				$asientoautomaticoLogic->deepSave($asientoautomatico,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				centro_costo_data::save($centro_costo, $this->connexion);
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
			
			$this->deepLoad($this->centro_costo,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->centro_costos as $centro_costo) {
				$this->deepLoad($centro_costo,$isDeep,$deepLoadType,$clases);
								
				centro_costo_util::refrescarFKDescripciones($this->centro_costos);
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
			
			foreach($this->centro_costos as $centro_costo) {
				$this->deepLoad($centro_costo,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->centro_costo,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->centro_costos as $centro_costo) {
				$this->deepSave($centro_costo,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->centro_costos as $centro_costo) {
				$this->deepSave($centro_costo,$isDeep,$deepLoadType,$clases,false);
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
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
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
				
				$classes[]=new Classe(asiento_predefinido::$class);
				$classes[]=new Classe(asiento::$class);
				$classes[]=new Classe(asiento_automatico_detalle::$class);
				$classes[]=new Classe(asiento_automatico::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==asiento_predefinido::$class) {
						$classes[]=new Classe(asiento_predefinido::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==asiento::$class) {
						$classes[]=new Classe(asiento::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==asiento_automatico_detalle::$class) {
						$classes[]=new Classe(asiento_automatico_detalle::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==asiento_automatico::$class) {
						$classes[]=new Classe(asiento_automatico::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==asiento_predefinido::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento_predefinido::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==asiento::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==asiento_automatico_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento_automatico_detalle::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==asiento_automatico::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento_automatico::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getcentro_costo() : ?centro_costo {	
		/*
		centro_costo_logic_add::checkcentro_costoToGet($this->centro_costo,$this->datosCliente);
		centro_costo_logic_add::updatecentro_costoToGet($this->centro_costo);
		*/
			
		return $this->centro_costo;
	}
		
	public function setcentro_costo(centro_costo $newcentro_costo) {
		$this->centro_costo = $newcentro_costo;
	}
	
	public function getcentro_costos() : array {		
		/*
		centro_costo_logic_add::checkcentro_costoToGets($this->centro_costos,$this->datosCliente);
		
		foreach ($this->centro_costos as $centro_costoLocal ) {
			centro_costo_logic_add::updatecentro_costoToGet($centro_costoLocal);
		}
		*/
		
		return $this->centro_costos;
	}
	
	public function setcentro_costos(array $newcentro_costos) {
		$this->centro_costos = $newcentro_costos;
	}
	
	public function getcentro_costoDataAccess() : centro_costo_data {
		return $this->centro_costoDataAccess;
	}
	
	public function setcentro_costoDataAccess(centro_costo_data $newcentro_costoDataAccess) {
		$this->centro_costoDataAccess = $newcentro_costoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        centro_costo_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		asiento_predefinido_detalle_logic::$logger;
		asiento_detalle_logic::$logger;
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
