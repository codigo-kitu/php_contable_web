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

namespace com\bydan\contabilidad\contabilidad\libro_auxiliar\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_carga;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_param_return;

use com\bydan\contabilidad\contabilidad\libro_auxiliar\presentation\session\libro_auxiliar_session;

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

use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_util;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\data\libro_auxiliar_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


use com\bydan\contabilidad\contabilidad\contador_auxiliar\business\entity\contador_auxiliar;
use com\bydan\contabilidad\contabilidad\contador_auxiliar\business\data\contador_auxiliar_data;
use com\bydan\contabilidad\contabilidad\contador_auxiliar\business\logic\contador_auxiliar_logic;
use com\bydan\contabilidad\contabilidad\contador_auxiliar\util\contador_auxiliar_carga;
use com\bydan\contabilidad\contabilidad\contador_auxiliar\util\contador_auxiliar_util;

use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\entity\asiento_predefinido;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\data\asiento_predefinido_data;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\logic\asiento_predefinido_logic;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;

use com\bydan\contabilidad\contabilidad\asiento_automatico\business\entity\asiento_automatico;
use com\bydan\contabilidad\contabilidad\asiento_automatico\business\data\asiento_automatico_data;
use com\bydan\contabilidad\contabilidad\asiento_automatico\business\logic\asiento_automatico_logic;
use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_util;

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\data\asiento_data;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

//REL DETALLES

use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_carga;



class libro_auxiliar_logic  extends GeneralEntityLogic implements libro_auxiliar_logicI {	
	/*GENERAL*/
	public libro_auxiliar_data $libro_auxiliarDataAccess;
	//public ?libro_auxiliar_logic_add $libro_auxiliarLogicAdditional=null;
	public ?libro_auxiliar $libro_auxiliar;
	public array $libro_auxiliars;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->libro_auxiliarDataAccess = new libro_auxiliar_data();			
			$this->libro_auxiliars = array();
			$this->libro_auxiliar = new libro_auxiliar();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->libro_auxiliarLogicAdditional = new libro_auxiliar_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->libro_auxiliarLogicAdditional==null) {
		//	$this->libro_auxiliarLogicAdditional=new libro_auxiliar_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->libro_auxiliarDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->libro_auxiliarDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->libro_auxiliarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->libro_auxiliarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->libro_auxiliars = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->libro_auxiliars=$this->libro_auxiliarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				libro_auxiliar_util::refrescarFKDescripciones($this->libro_auxiliars);
			}
			
			//libro_auxiliar_logic_add::checklibro_auxiliarToGets($this->libro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->libro_auxiliars);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->libro_auxiliars = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->libro_auxiliars=$this->libro_auxiliarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				libro_auxiliar_util::refrescarFKDescripciones($this->libro_auxiliars);
			}
			
			//libro_auxiliar_logic_add::checklibro_auxiliarToGets($this->libro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->libro_auxiliars);
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
		$this->libro_auxiliar = new libro_auxiliar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->libro_auxiliar=$this->libro_auxiliarDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->libro_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				libro_auxiliar_util::refrescarFKDescripcion($this->libro_auxiliar);
			}
						
			//libro_auxiliar_logic_add::checklibro_auxiliarToGet($this->libro_auxiliar,$this->datosCliente);
			//libro_auxiliar_logic_add::updatelibro_auxiliarToGet($this->libro_auxiliar);
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
		$this->libro_auxiliar = new  libro_auxiliar();
		  		  
        try {		
			$this->libro_auxiliar=$this->libro_auxiliarDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->libro_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				libro_auxiliar_util::refrescarFKDescripcion($this->libro_auxiliar);
			}
			
			//libro_auxiliar_logic_add::checklibro_auxiliarToGet($this->libro_auxiliar,$this->datosCliente);
			//libro_auxiliar_logic_add::updatelibro_auxiliarToGet($this->libro_auxiliar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?libro_auxiliar {
		$libro_auxiliarLogic = new  libro_auxiliar_logic();
		  		  
        try {		
			$libro_auxiliarLogic->setConnexion($connexion);			
			$libro_auxiliarLogic->getEntity($id);			
			return $libro_auxiliarLogic->getlibro_auxiliar();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->libro_auxiliar = new  libro_auxiliar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->libro_auxiliar=$this->libro_auxiliarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->libro_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				libro_auxiliar_util::refrescarFKDescripcion($this->libro_auxiliar);
			}
			
			//libro_auxiliar_logic_add::checklibro_auxiliarToGet($this->libro_auxiliar,$this->datosCliente);
			//libro_auxiliar_logic_add::updatelibro_auxiliarToGet($this->libro_auxiliar);
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
		$this->libro_auxiliar = new  libro_auxiliar();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->libro_auxiliar=$this->libro_auxiliarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->libro_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				libro_auxiliar_util::refrescarFKDescripcion($this->libro_auxiliar);
			}
			
			//libro_auxiliar_logic_add::checklibro_auxiliarToGet($this->libro_auxiliar,$this->datosCliente);
			//libro_auxiliar_logic_add::updatelibro_auxiliarToGet($this->libro_auxiliar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?libro_auxiliar {
		$libro_auxiliarLogic = new  libro_auxiliar_logic();
		  		  
        try {		
			$libro_auxiliarLogic->setConnexion($connexion);			
			$libro_auxiliarLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $libro_auxiliarLogic->getlibro_auxiliar();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->libro_auxiliars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->libro_auxiliars=$this->libro_auxiliarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				libro_auxiliar_util::refrescarFKDescripciones($this->libro_auxiliars);
			}
			
			//libro_auxiliar_logic_add::checklibro_auxiliarToGets($this->libro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->libro_auxiliars);			
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
		$this->libro_auxiliars = array();
		  		  
        try {			
			$this->libro_auxiliars=$this->libro_auxiliarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				libro_auxiliar_util::refrescarFKDescripciones($this->libro_auxiliars);
			}
			
			//libro_auxiliar_logic_add::checklibro_auxiliarToGets($this->libro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->libro_auxiliars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->libro_auxiliars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->libro_auxiliars=$this->libro_auxiliarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				libro_auxiliar_util::refrescarFKDescripciones($this->libro_auxiliars);
			}
			
			//libro_auxiliar_logic_add::checklibro_auxiliarToGets($this->libro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->libro_auxiliars);
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
		$this->libro_auxiliars = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->libro_auxiliars=$this->libro_auxiliarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				libro_auxiliar_util::refrescarFKDescripciones($this->libro_auxiliars);
			}
			
			//libro_auxiliar_logic_add::checklibro_auxiliarToGets($this->libro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->libro_auxiliars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$libro_auxiliarLogic = new  libro_auxiliar_logic();
		  		  
        try {		
			$libro_auxiliarLogic->setConnexion($connexion);			
			$libro_auxiliarLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $libro_auxiliarLogic->getlibro_auxiliars();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->libro_auxiliars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->libro_auxiliars=$this->libro_auxiliarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				libro_auxiliar_util::refrescarFKDescripciones($this->libro_auxiliars);
			}
			
			//libro_auxiliar_logic_add::checklibro_auxiliarToGets($this->libro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->libro_auxiliars);
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
		$this->libro_auxiliars = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->libro_auxiliars=$this->libro_auxiliarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				libro_auxiliar_util::refrescarFKDescripciones($this->libro_auxiliars);
			}
			
			//libro_auxiliar_logic_add::checklibro_auxiliarToGets($this->libro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->libro_auxiliars);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->libro_auxiliars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->libro_auxiliars=$this->libro_auxiliarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				libro_auxiliar_util::refrescarFKDescripciones($this->libro_auxiliars);
			}
			
			//libro_auxiliar_logic_add::checklibro_auxiliarToGets($this->libro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->libro_auxiliars);
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
		$this->libro_auxiliars = array();
		  		  
        try {			
			$this->libro_auxiliars=$this->libro_auxiliarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				libro_auxiliar_util::refrescarFKDescripciones($this->libro_auxiliars);
			}	
			
			//libro_auxiliar_logic_add::checklibro_auxiliarToGets($this->libro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->libro_auxiliars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->libro_auxiliars = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->libro_auxiliars=$this->libro_auxiliarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				libro_auxiliar_util::refrescarFKDescripciones($this->libro_auxiliars);
			}
			
			//libro_auxiliar_logic_add::checklibro_auxiliarToGets($this->libro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->libro_auxiliars);
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
		$this->libro_auxiliars = array();
		  		  
        try {		
			$this->libro_auxiliars=$this->libro_auxiliarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				libro_auxiliar_util::refrescarFKDescripciones($this->libro_auxiliars);
			}
			
			//libro_auxiliar_logic_add::checklibro_auxiliarToGets($this->libro_auxiliars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->libro_auxiliars);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,libro_auxiliar_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->libro_auxiliars=$this->libro_auxiliarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				libro_auxiliar_util::refrescarFKDescripciones($this->libro_auxiliars);
			}
			//libro_auxiliar_logic_add::checklibro_auxiliarToGets($this->libro_auxiliars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->libro_auxiliars);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,libro_auxiliar_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->libro_auxiliars=$this->libro_auxiliarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				libro_auxiliar_util::refrescarFKDescripciones($this->libro_auxiliars);
			}
			//libro_auxiliar_logic_add::checklibro_auxiliarToGets($this->libro_auxiliars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->libro_auxiliars);
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
						
			//libro_auxiliar_logic_add::checklibro_auxiliarToSave($this->libro_auxiliar,$this->datosCliente,$this->connexion);	       
			//libro_auxiliar_logic_add::updatelibro_auxiliarToSave($this->libro_auxiliar);			
			libro_auxiliar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->libro_auxiliar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->libro_auxiliarLogicAdditional->checkGeneralEntityToSave($this,$this->libro_auxiliar,$this->datosCliente,$this->connexion);
			
			
			libro_auxiliar_data::save($this->libro_auxiliar, $this->connexion);	    	       	 				
			//libro_auxiliar_logic_add::checklibro_auxiliarToSaveAfter($this->libro_auxiliar,$this->datosCliente,$this->connexion);			
			//$this->libro_auxiliarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->libro_auxiliar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->libro_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->libro_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				libro_auxiliar_util::refrescarFKDescripcion($this->libro_auxiliar);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->libro_auxiliar->getIsDeleted()) {
				$this->libro_auxiliar=null;
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
						
			/*libro_auxiliar_logic_add::checklibro_auxiliarToSave($this->libro_auxiliar,$this->datosCliente,$this->connexion);*/	        
			//libro_auxiliar_logic_add::updatelibro_auxiliarToSave($this->libro_auxiliar);			
			//$this->libro_auxiliarLogicAdditional->checkGeneralEntityToSave($this,$this->libro_auxiliar,$this->datosCliente,$this->connexion);			
			libro_auxiliar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->libro_auxiliar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			libro_auxiliar_data::save($this->libro_auxiliar, $this->connexion);	    	       	 						
			/*libro_auxiliar_logic_add::checklibro_auxiliarToSaveAfter($this->libro_auxiliar,$this->datosCliente,$this->connexion);*/			
			//$this->libro_auxiliarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->libro_auxiliar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->libro_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->libro_auxiliar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				libro_auxiliar_util::refrescarFKDescripcion($this->libro_auxiliar);				
			}
			
			if($this->libro_auxiliar->getIsDeleted()) {
				$this->libro_auxiliar=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(libro_auxiliar $libro_auxiliar,Connexion $connexion)  {
		$libro_auxiliarLogic = new  libro_auxiliar_logic();		  		  
        try {		
			$libro_auxiliarLogic->setConnexion($connexion);			
			$libro_auxiliarLogic->setlibro_auxiliar($libro_auxiliar);			
			$libro_auxiliarLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*libro_auxiliar_logic_add::checklibro_auxiliarToSaves($this->libro_auxiliars,$this->datosCliente,$this->connexion);*/	        	
			//$this->libro_auxiliarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->libro_auxiliars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->libro_auxiliars as $libro_auxiliarLocal) {				
								
				//libro_auxiliar_logic_add::updatelibro_auxiliarToSave($libro_auxiliarLocal);	        	
				libro_auxiliar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$libro_auxiliarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				libro_auxiliar_data::save($libro_auxiliarLocal, $this->connexion);				
			}
			
			/*libro_auxiliar_logic_add::checklibro_auxiliarToSavesAfter($this->libro_auxiliars,$this->datosCliente,$this->connexion);*/			
			//$this->libro_auxiliarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->libro_auxiliars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				libro_auxiliar_util::refrescarFKDescripciones($this->libro_auxiliars);
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
			/*libro_auxiliar_logic_add::checklibro_auxiliarToSaves($this->libro_auxiliars,$this->datosCliente,$this->connexion);*/			
			//$this->libro_auxiliarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->libro_auxiliars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->libro_auxiliars as $libro_auxiliarLocal) {				
								
				//libro_auxiliar_logic_add::updatelibro_auxiliarToSave($libro_auxiliarLocal);	        	
				libro_auxiliar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$libro_auxiliarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				libro_auxiliar_data::save($libro_auxiliarLocal, $this->connexion);				
			}			
			
			/*libro_auxiliar_logic_add::checklibro_auxiliarToSavesAfter($this->libro_auxiliars,$this->datosCliente,$this->connexion);*/			
			//$this->libro_auxiliarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->libro_auxiliars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				libro_auxiliar_util::refrescarFKDescripciones($this->libro_auxiliars);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $libro_auxiliars,Connexion $connexion)  {
		$libro_auxiliarLogic = new  libro_auxiliar_logic();
		  		  
        try {		
			$libro_auxiliarLogic->setConnexion($connexion);			
			$libro_auxiliarLogic->setlibro_auxiliars($libro_auxiliars);			
			$libro_auxiliarLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$libro_auxiliarsAux=array();
		
		foreach($this->libro_auxiliars as $libro_auxiliar) {
			if($libro_auxiliar->getIsDeleted()==false) {
				$libro_auxiliarsAux[]=$libro_auxiliar;
			}
		}
		
		$this->libro_auxiliars=$libro_auxiliarsAux;
	}
	
	public function updateToGetsAuxiliar(array &$libro_auxiliars) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->libro_auxiliars as $libro_auxiliar) {
				
				$libro_auxiliar->setid_empresa_Descripcion(libro_auxiliar_util::getempresaDescripcion($libro_auxiliar->getempresa()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$libro_auxiliar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$libro_auxiliar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$libro_auxiliar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$libro_auxiliar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$libro_auxiliar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$libro_auxiliarForeignKey=new libro_auxiliar_param_return();//libro_auxiliarForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$libro_auxiliarForeignKey,$libro_auxiliar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$libro_auxiliarForeignKey,$libro_auxiliar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $libro_auxiliarForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$libro_auxiliarForeignKey,$libro_auxiliar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$libro_auxiliarForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($libro_auxiliar_session==null) {
			$libro_auxiliar_session=new libro_auxiliar_session();
		}
		
		if($libro_auxiliar_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($libro_auxiliarForeignKey->idempresaDefaultFK==0) {
					$libro_auxiliarForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$libro_auxiliarForeignKey->empresasFK[$empresaLocal->getId()]=libro_auxiliar_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($libro_auxiliar_session->bigidempresaActual!=null && $libro_auxiliar_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($libro_auxiliar_session->bigidempresaActual);//WithConnection

				$libro_auxiliarForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=libro_auxiliar_util::getempresaDescripcion($empresaLogic->getempresa());
				$libro_auxiliarForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($libro_auxiliar,$contadorauxiliars,$asientopredefinidos,$asientoautomaticos,$asientos) {
		$this->saveRelacionesBase($libro_auxiliar,$contadorauxiliars,$asientopredefinidos,$asientoautomaticos,$asientos,true);
	}

	public function saveRelaciones($libro_auxiliar,$contadorauxiliars,$asientopredefinidos,$asientoautomaticos,$asientos) {
		$this->saveRelacionesBase($libro_auxiliar,$contadorauxiliars,$asientopredefinidos,$asientoautomaticos,$asientos,false);
	}

	public function saveRelacionesBase($libro_auxiliar,$contadorauxiliars=array(),$asientopredefinidos=array(),$asientoautomaticos=array(),$asientos=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$libro_auxiliar->setcontador_auxiliars($contadorauxiliars);
			$libro_auxiliar->setasiento_predefinidos($asientopredefinidos);
			$libro_auxiliar->setasiento_automaticos($asientoautomaticos);
			$libro_auxiliar->setasientos($asientos);
			$this->setlibro_auxiliar($libro_auxiliar);

				if(($this->libro_auxiliar->getIsNew() || $this->libro_auxiliar->getIsChanged()) && !$this->libro_auxiliar->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($contadorauxiliars,$asientopredefinidos,$asientoautomaticos,$asientos);

				} else if($this->libro_auxiliar->getIsDeleted()) {
					$this->saveRelacionesDetalles($contadorauxiliars,$asientopredefinidos,$asientoautomaticos,$asientos);
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
	
	
	public function saveRelacionesDetalles($contadorauxiliars=array(),$asientopredefinidos=array(),$asientoautomaticos=array(),$asientos=array()) {
		try {
	

			$idlibro_auxiliarActual=$this->getlibro_auxiliar()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/contador_auxiliar_carga.php');
			contador_auxiliar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$contadorauxiliarLogic_Desde_libro_auxiliar=new contador_auxiliar_logic();
			$contadorauxiliarLogic_Desde_libro_auxiliar->setcontador_auxiliars($contadorauxiliars);

			$contadorauxiliarLogic_Desde_libro_auxiliar->setConnexion($this->getConnexion());
			$contadorauxiliarLogic_Desde_libro_auxiliar->setDatosCliente($this->datosCliente);

			foreach($contadorauxiliarLogic_Desde_libro_auxiliar->getcontador_auxiliars() as $contadorauxiliar_Desde_libro_auxiliar) {
				$contadorauxiliar_Desde_libro_auxiliar->setid_libro_auxiliar($idlibro_auxiliarActual);
			}

			$contadorauxiliarLogic_Desde_libro_auxiliar->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_predefinido_carga.php');
			asiento_predefinido_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$asientopredefinidoLogic_Desde_libro_auxiliar=new asiento_predefinido_logic();
			$asientopredefinidoLogic_Desde_libro_auxiliar->setasiento_predefinidos($asientopredefinidos);

			$asientopredefinidoLogic_Desde_libro_auxiliar->setConnexion($this->getConnexion());
			$asientopredefinidoLogic_Desde_libro_auxiliar->setDatosCliente($this->datosCliente);

			foreach($asientopredefinidoLogic_Desde_libro_auxiliar->getasiento_predefinidos() as $asientopredefinido_Desde_libro_auxiliar) {
				$asientopredefinido_Desde_libro_auxiliar->setid_libro_auxiliar($idlibro_auxiliarActual);

				$asientopredefinidoLogic_Desde_libro_auxiliar->setasiento_predefinido($asientopredefinido_Desde_libro_auxiliar);
				$asientopredefinidoLogic_Desde_libro_auxiliar->save();

				$idasiento_predefinidoActual=$asiento_predefinido_Desde_libro_auxiliar->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_predefinido_detalle_carga.php');
				asiento_predefinido_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$asientopredefinidodetalleLogic_Desde_asiento_predefinido=new asiento_predefinido_detalle_logic();

				if($asiento_predefinido_Desde_libro_auxiliar->getasiento_predefinido_detalles()==null){
					$asiento_predefinido_Desde_libro_auxiliar->setasiento_predefinido_detalles(array());
				}

				$asientopredefinidodetalleLogic_Desde_asiento_predefinido->setasiento_predefinido_detalles($asiento_predefinido_Desde_libro_auxiliar->getasiento_predefinido_detalles());

				$asientopredefinidodetalleLogic_Desde_asiento_predefinido->setConnexion($this->getConnexion());
				$asientopredefinidodetalleLogic_Desde_asiento_predefinido->setDatosCliente($this->datosCliente);

				foreach($asientopredefinidodetalleLogic_Desde_asiento_predefinido->getasiento_predefinido_detalles() as $asientopredefinidodetalle_Desde_asiento_predefinido) {
					$asientopredefinidodetalle_Desde_asiento_predefinido->setid_asiento_predefinido($idasiento_predefinidoActual);
				}

				$asientopredefinidodetalleLogic_Desde_asiento_predefinido->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_carga.php');
				asiento_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$asientoLogic_Desde_asiento_predefinido=new asiento_logic();

				if($asiento_predefinido_Desde_libro_auxiliar->getasientos()==null){
					$asiento_predefinido_Desde_libro_auxiliar->setasientos(array());
				}

				$asientoLogic_Desde_asiento_predefinido->setasientos($asiento_predefinido_Desde_libro_auxiliar->getasientos());

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


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_automatico_carga.php');
			asiento_automatico_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$asientoautomaticoLogic_Desde_libro_auxiliar=new asiento_automatico_logic();
			$asientoautomaticoLogic_Desde_libro_auxiliar->setasiento_automaticos($asientoautomaticos);

			$asientoautomaticoLogic_Desde_libro_auxiliar->setConnexion($this->getConnexion());
			$asientoautomaticoLogic_Desde_libro_auxiliar->setDatosCliente($this->datosCliente);

			foreach($asientoautomaticoLogic_Desde_libro_auxiliar->getasiento_automaticos() as $asientoautomatico_Desde_libro_auxiliar) {
				$asientoautomatico_Desde_libro_auxiliar->setid_libro_auxiliar($idlibro_auxiliarActual);

				$asientoautomaticoLogic_Desde_libro_auxiliar->setasiento_automatico($asientoautomatico_Desde_libro_auxiliar);
				$asientoautomaticoLogic_Desde_libro_auxiliar->save();

				$idasiento_automaticoActual=$asiento_automatico_Desde_libro_auxiliar->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_automatico_detalle_carga.php');
				asiento_automatico_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$asientoautomaticodetalleLogic_Desde_asiento_automatico=new asiento_automatico_detalle_logic();

				if($asiento_automatico_Desde_libro_auxiliar->getasiento_automatico_detalles()==null){
					$asiento_automatico_Desde_libro_auxiliar->setasiento_automatico_detalles(array());
				}

				$asientoautomaticodetalleLogic_Desde_asiento_automatico->setasiento_automatico_detalles($asiento_automatico_Desde_libro_auxiliar->getasiento_automatico_detalles());

				$asientoautomaticodetalleLogic_Desde_asiento_automatico->setConnexion($this->getConnexion());
				$asientoautomaticodetalleLogic_Desde_asiento_automatico->setDatosCliente($this->datosCliente);

				foreach($asientoautomaticodetalleLogic_Desde_asiento_automatico->getasiento_automatico_detalles() as $asientoautomaticodetalle_Desde_asiento_automatico) {
					$asientoautomaticodetalle_Desde_asiento_automatico->setid_asiento_automatico($idasiento_automaticoActual);
				}

				$asientoautomaticodetalleLogic_Desde_asiento_automatico->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_carga.php');
			asiento_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$asientoLogic_Desde_libro_auxiliar=new asiento_logic();
			$asientoLogic_Desde_libro_auxiliar->setasientos($asientos);

			$asientoLogic_Desde_libro_auxiliar->setConnexion($this->getConnexion());
			$asientoLogic_Desde_libro_auxiliar->setDatosCliente($this->datosCliente);

			foreach($asientoLogic_Desde_libro_auxiliar->getasientos() as $asiento_Desde_libro_auxiliar) {
				$asiento_Desde_libro_auxiliar->setid_libro_auxiliar($idlibro_auxiliarActual);

				$asientoLogic_Desde_libro_auxiliar->setasiento($asiento_Desde_libro_auxiliar);
				$asientoLogic_Desde_libro_auxiliar->save();

				$idasientoActual=$asiento_Desde_libro_auxiliar->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_detalle_carga.php');
				asiento_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$asientodetalleLogic_Desde_asiento=new asiento_detalle_logic();

				if($asiento_Desde_libro_auxiliar->getasiento_detalles()==null){
					$asiento_Desde_libro_auxiliar->setasiento_detalles(array());
				}

				$asientodetalleLogic_Desde_asiento->setasiento_detalles($asiento_Desde_libro_auxiliar->getasiento_detalles());

				$asientodetalleLogic_Desde_asiento->setConnexion($this->getConnexion());
				$asientodetalleLogic_Desde_asiento->setDatosCliente($this->datosCliente);

				foreach($asientodetalleLogic_Desde_asiento->getasiento_detalles() as $asientodetalle_Desde_asiento) {
					$asientodetalle_Desde_asiento->setid_asiento($idasientoActual);
				}

				$asientodetalleLogic_Desde_asiento->saves();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $libro_auxiliars,libro_auxiliar_param_return $libro_auxiliarParameterGeneral) : libro_auxiliar_param_return {
		$libro_auxiliarReturnGeneral=new libro_auxiliar_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $libro_auxiliarReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $libro_auxiliars,libro_auxiliar_param_return $libro_auxiliarParameterGeneral) : libro_auxiliar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$libro_auxiliarReturnGeneral=new libro_auxiliar_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $libro_auxiliarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $libro_auxiliars,libro_auxiliar $libro_auxiliar,libro_auxiliar_param_return $libro_auxiliarParameterGeneral,bool $isEsNuevolibro_auxiliar,array $clases) : libro_auxiliar_param_return {
		 try {	
			$libro_auxiliarReturnGeneral=new libro_auxiliar_param_return();
	
			$libro_auxiliarReturnGeneral->setlibro_auxiliar($libro_auxiliar);
			$libro_auxiliarReturnGeneral->setlibro_auxiliars($libro_auxiliars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$libro_auxiliarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $libro_auxiliarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $libro_auxiliars,libro_auxiliar $libro_auxiliar,libro_auxiliar_param_return $libro_auxiliarParameterGeneral,bool $isEsNuevolibro_auxiliar,array $clases) : libro_auxiliar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$libro_auxiliarReturnGeneral=new libro_auxiliar_param_return();
	
			$libro_auxiliarReturnGeneral->setlibro_auxiliar($libro_auxiliar);
			$libro_auxiliarReturnGeneral->setlibro_auxiliars($libro_auxiliars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$libro_auxiliarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $libro_auxiliarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $libro_auxiliars,libro_auxiliar $libro_auxiliar,libro_auxiliar_param_return $libro_auxiliarParameterGeneral,bool $isEsNuevolibro_auxiliar,array $clases) : libro_auxiliar_param_return {
		 try {	
			$libro_auxiliarReturnGeneral=new libro_auxiliar_param_return();
	
			$libro_auxiliarReturnGeneral->setlibro_auxiliar($libro_auxiliar);
			$libro_auxiliarReturnGeneral->setlibro_auxiliars($libro_auxiliars);
			
			
			
			return $libro_auxiliarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $libro_auxiliars,libro_auxiliar $libro_auxiliar,libro_auxiliar_param_return $libro_auxiliarParameterGeneral,bool $isEsNuevolibro_auxiliar,array $clases) : libro_auxiliar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$libro_auxiliarReturnGeneral=new libro_auxiliar_param_return();
	
			$libro_auxiliarReturnGeneral->setlibro_auxiliar($libro_auxiliar);
			$libro_auxiliarReturnGeneral->setlibro_auxiliars($libro_auxiliars);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $libro_auxiliarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,libro_auxiliar $libro_auxiliar,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,libro_auxiliar $libro_auxiliar,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		libro_auxiliar_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		libro_auxiliar_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(libro_auxiliar $libro_auxiliar,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//libro_auxiliar_logic_add::updatelibro_auxiliarToGet($this->libro_auxiliar);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$libro_auxiliar->setempresa($this->libro_auxiliarDataAccess->getempresa($this->connexion,$libro_auxiliar));
		$libro_auxiliar->setcontador_auxiliars($this->libro_auxiliarDataAccess->getcontador_auxiliars($this->connexion,$libro_auxiliar));
		$libro_auxiliar->setasiento_predefinidos($this->libro_auxiliarDataAccess->getasiento_predefinidos($this->connexion,$libro_auxiliar));
		$libro_auxiliar->setasiento_automaticos($this->libro_auxiliarDataAccess->getasiento_automaticos($this->connexion,$libro_auxiliar));
		$libro_auxiliar->setasientos($this->libro_auxiliarDataAccess->getasientos($this->connexion,$libro_auxiliar));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$libro_auxiliar->setempresa($this->libro_auxiliarDataAccess->getempresa($this->connexion,$libro_auxiliar));
				continue;
			}

			if($clas->clas==contador_auxiliar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$libro_auxiliar->setcontador_auxiliars($this->libro_auxiliarDataAccess->getcontador_auxiliars($this->connexion,$libro_auxiliar));

				if($this->isConDeep) {
					$contadorauxiliarLogic= new contador_auxiliar_logic($this->connexion);
					$contadorauxiliarLogic->setcontador_auxiliars($libro_auxiliar->getcontador_auxiliars());
					$classesLocal=contador_auxiliar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$contadorauxiliarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					contador_auxiliar_util::refrescarFKDescripciones($contadorauxiliarLogic->getcontador_auxiliars());
					$libro_auxiliar->setcontador_auxiliars($contadorauxiliarLogic->getcontador_auxiliars());
				}

				continue;
			}

			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$libro_auxiliar->setasiento_predefinidos($this->libro_auxiliarDataAccess->getasiento_predefinidos($this->connexion,$libro_auxiliar));

				if($this->isConDeep) {
					$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
					$asientopredefinidoLogic->setasiento_predefinidos($libro_auxiliar->getasiento_predefinidos());
					$classesLocal=asiento_predefinido_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$asientopredefinidoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					asiento_predefinido_util::refrescarFKDescripciones($asientopredefinidoLogic->getasiento_predefinidos());
					$libro_auxiliar->setasiento_predefinidos($asientopredefinidoLogic->getasiento_predefinidos());
				}

				continue;
			}

			if($clas->clas==asiento_automatico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$libro_auxiliar->setasiento_automaticos($this->libro_auxiliarDataAccess->getasiento_automaticos($this->connexion,$libro_auxiliar));

				if($this->isConDeep) {
					$asientoautomaticoLogic= new asiento_automatico_logic($this->connexion);
					$asientoautomaticoLogic->setasiento_automaticos($libro_auxiliar->getasiento_automaticos());
					$classesLocal=asiento_automatico_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$asientoautomaticoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					asiento_automatico_util::refrescarFKDescripciones($asientoautomaticoLogic->getasiento_automaticos());
					$libro_auxiliar->setasiento_automaticos($asientoautomaticoLogic->getasiento_automaticos());
				}

				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$libro_auxiliar->setasientos($this->libro_auxiliarDataAccess->getasientos($this->connexion,$libro_auxiliar));

				if($this->isConDeep) {
					$asientoLogic= new asiento_logic($this->connexion);
					$asientoLogic->setasientos($libro_auxiliar->getasientos());
					$classesLocal=asiento_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$asientoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					asiento_util::refrescarFKDescripciones($asientoLogic->getasientos());
					$libro_auxiliar->setasientos($asientoLogic->getasientos());
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
			$libro_auxiliar->setempresa($this->libro_auxiliarDataAccess->getempresa($this->connexion,$libro_auxiliar));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==contador_auxiliar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(contador_auxiliar::$class);
			$libro_auxiliar->setcontador_auxiliars($this->libro_auxiliarDataAccess->getcontador_auxiliars($this->connexion,$libro_auxiliar));
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
			$libro_auxiliar->setasiento_predefinidos($this->libro_auxiliarDataAccess->getasiento_predefinidos($this->connexion,$libro_auxiliar));
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
			$libro_auxiliar->setasiento_automaticos($this->libro_auxiliarDataAccess->getasiento_automaticos($this->connexion,$libro_auxiliar));
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
			$libro_auxiliar->setasientos($this->libro_auxiliarDataAccess->getasientos($this->connexion,$libro_auxiliar));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$libro_auxiliar->setempresa($this->libro_auxiliarDataAccess->getempresa($this->connexion,$libro_auxiliar));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($libro_auxiliar->getempresa(),$isDeep,$deepLoadType,$clases);
				

		$libro_auxiliar->setcontador_auxiliars($this->libro_auxiliarDataAccess->getcontador_auxiliars($this->connexion,$libro_auxiliar));

		foreach($libro_auxiliar->getcontador_auxiliars() as $contadorauxiliar) {
			$contadorauxiliarLogic= new contador_auxiliar_logic($this->connexion);
			$contadorauxiliarLogic->deepLoad($contadorauxiliar,$isDeep,$deepLoadType,$clases);
		}

		$libro_auxiliar->setasiento_predefinidos($this->libro_auxiliarDataAccess->getasiento_predefinidos($this->connexion,$libro_auxiliar));

		foreach($libro_auxiliar->getasiento_predefinidos() as $asientopredefinido) {
			$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
			$asientopredefinidoLogic->deepLoad($asientopredefinido,$isDeep,$deepLoadType,$clases);
		}

		$libro_auxiliar->setasiento_automaticos($this->libro_auxiliarDataAccess->getasiento_automaticos($this->connexion,$libro_auxiliar));

		foreach($libro_auxiliar->getasiento_automaticos() as $asientoautomatico) {
			$asientoautomaticoLogic= new asiento_automatico_logic($this->connexion);
			$asientoautomaticoLogic->deepLoad($asientoautomatico,$isDeep,$deepLoadType,$clases);
		}

		$libro_auxiliar->setasientos($this->libro_auxiliarDataAccess->getasientos($this->connexion,$libro_auxiliar));

		foreach($libro_auxiliar->getasientos() as $asiento) {
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepLoad($asiento,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$libro_auxiliar->setempresa($this->libro_auxiliarDataAccess->getempresa($this->connexion,$libro_auxiliar));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($libro_auxiliar->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==contador_auxiliar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$libro_auxiliar->setcontador_auxiliars($this->libro_auxiliarDataAccess->getcontador_auxiliars($this->connexion,$libro_auxiliar));

				foreach($libro_auxiliar->getcontador_auxiliars() as $contadorauxiliar) {
					$contadorauxiliarLogic= new contador_auxiliar_logic($this->connexion);
					$contadorauxiliarLogic->deepLoad($contadorauxiliar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$libro_auxiliar->setasiento_predefinidos($this->libro_auxiliarDataAccess->getasiento_predefinidos($this->connexion,$libro_auxiliar));

				foreach($libro_auxiliar->getasiento_predefinidos() as $asientopredefinido) {
					$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
					$asientopredefinidoLogic->deepLoad($asientopredefinido,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==asiento_automatico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$libro_auxiliar->setasiento_automaticos($this->libro_auxiliarDataAccess->getasiento_automaticos($this->connexion,$libro_auxiliar));

				foreach($libro_auxiliar->getasiento_automaticos() as $asientoautomatico) {
					$asientoautomaticoLogic= new asiento_automatico_logic($this->connexion);
					$asientoautomaticoLogic->deepLoad($asientoautomatico,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$libro_auxiliar->setasientos($this->libro_auxiliarDataAccess->getasientos($this->connexion,$libro_auxiliar));

				foreach($libro_auxiliar->getasientos() as $asiento) {
					$asientoLogic= new asiento_logic($this->connexion);
					$asientoLogic->deepLoad($asiento,$isDeep,$deepLoadType,$clases);
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
			$libro_auxiliar->setempresa($this->libro_auxiliarDataAccess->getempresa($this->connexion,$libro_auxiliar));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($libro_auxiliar->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==contador_auxiliar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(contador_auxiliar::$class);
			$libro_auxiliar->setcontador_auxiliars($this->libro_auxiliarDataAccess->getcontador_auxiliars($this->connexion,$libro_auxiliar));

			foreach($libro_auxiliar->getcontador_auxiliars() as $contadorauxiliar) {
				$contadorauxiliarLogic= new contador_auxiliar_logic($this->connexion);
				$contadorauxiliarLogic->deepLoad($contadorauxiliar,$isDeep,$deepLoadType,$clases);
			}
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
			$libro_auxiliar->setasiento_predefinidos($this->libro_auxiliarDataAccess->getasiento_predefinidos($this->connexion,$libro_auxiliar));

			foreach($libro_auxiliar->getasiento_predefinidos() as $asientopredefinido) {
				$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
				$asientopredefinidoLogic->deepLoad($asientopredefinido,$isDeep,$deepLoadType,$clases);
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
			$libro_auxiliar->setasiento_automaticos($this->libro_auxiliarDataAccess->getasiento_automaticos($this->connexion,$libro_auxiliar));

			foreach($libro_auxiliar->getasiento_automaticos() as $asientoautomatico) {
				$asientoautomaticoLogic= new asiento_automatico_logic($this->connexion);
				$asientoautomaticoLogic->deepLoad($asientoautomatico,$isDeep,$deepLoadType,$clases);
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
			$libro_auxiliar->setasientos($this->libro_auxiliarDataAccess->getasientos($this->connexion,$libro_auxiliar));

			foreach($libro_auxiliar->getasientos() as $asiento) {
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepLoad($asiento,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(libro_auxiliar $libro_auxiliar,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//libro_auxiliar_logic_add::updatelibro_auxiliarToSave($this->libro_auxiliar);			
			
			if(!$paraDeleteCascade) {				
				libro_auxiliar_data::save($libro_auxiliar, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($libro_auxiliar->getempresa(),$this->connexion);

		foreach($libro_auxiliar->getcontador_auxiliars() as $contadorauxiliar) {
			$contadorauxiliar->setid_libro_auxiliar($libro_auxiliar->getId());
			contador_auxiliar_data::save($contadorauxiliar,$this->connexion);
		}


		foreach($libro_auxiliar->getasiento_predefinidos() as $asientopredefinido) {
			$asientopredefinido->setid_libro_auxiliar($libro_auxiliar->getId());
			asiento_predefinido_data::save($asientopredefinido,$this->connexion);
		}


		foreach($libro_auxiliar->getasiento_automaticos() as $asientoautomatico) {
			$asientoautomatico->setid_libro_auxiliar($libro_auxiliar->getId());
			asiento_automatico_data::save($asientoautomatico,$this->connexion);
		}


		foreach($libro_auxiliar->getasientos() as $asiento) {
			$asiento->setid_libro_auxiliar($libro_auxiliar->getId());
			asiento_data::save($asiento,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($libro_auxiliar->getempresa(),$this->connexion);
				continue;
			}


			if($clas->clas==contador_auxiliar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($libro_auxiliar->getcontador_auxiliars() as $contadorauxiliar) {
					$contadorauxiliar->setid_libro_auxiliar($libro_auxiliar->getId());
					contador_auxiliar_data::save($contadorauxiliar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($libro_auxiliar->getasiento_predefinidos() as $asientopredefinido) {
					$asientopredefinido->setid_libro_auxiliar($libro_auxiliar->getId());
					asiento_predefinido_data::save($asientopredefinido,$this->connexion);
				}

				continue;
			}

			if($clas->clas==asiento_automatico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($libro_auxiliar->getasiento_automaticos() as $asientoautomatico) {
					$asientoautomatico->setid_libro_auxiliar($libro_auxiliar->getId());
					asiento_automatico_data::save($asientoautomatico,$this->connexion);
				}

				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($libro_auxiliar->getasientos() as $asiento) {
					$asiento->setid_libro_auxiliar($libro_auxiliar->getId());
					asiento_data::save($asiento,$this->connexion);
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
			empresa_data::save($libro_auxiliar->getempresa(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==contador_auxiliar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(contador_auxiliar::$class);

			foreach($libro_auxiliar->getcontador_auxiliars() as $contadorauxiliar) {
				$contadorauxiliar->setid_libro_auxiliar($libro_auxiliar->getId());
				contador_auxiliar_data::save($contadorauxiliar,$this->connexion);
			}

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

			foreach($libro_auxiliar->getasiento_predefinidos() as $asientopredefinido) {
				$asientopredefinido->setid_libro_auxiliar($libro_auxiliar->getId());
				asiento_predefinido_data::save($asientopredefinido,$this->connexion);
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

			foreach($libro_auxiliar->getasiento_automaticos() as $asientoautomatico) {
				$asientoautomatico->setid_libro_auxiliar($libro_auxiliar->getId());
				asiento_automatico_data::save($asientoautomatico,$this->connexion);
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

			foreach($libro_auxiliar->getasientos() as $asiento) {
				$asiento->setid_libro_auxiliar($libro_auxiliar->getId());
				asiento_data::save($asiento,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($libro_auxiliar->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($libro_auxiliar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($libro_auxiliar->getcontador_auxiliars() as $contadorauxiliar) {
			$contadorauxiliarLogic= new contador_auxiliar_logic($this->connexion);
			$contadorauxiliar->setid_libro_auxiliar($libro_auxiliar->getId());
			contador_auxiliar_data::save($contadorauxiliar,$this->connexion);
			$contadorauxiliarLogic->deepSave($contadorauxiliar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($libro_auxiliar->getasiento_predefinidos() as $asientopredefinido) {
			$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
			$asientopredefinido->setid_libro_auxiliar($libro_auxiliar->getId());
			asiento_predefinido_data::save($asientopredefinido,$this->connexion);
			$asientopredefinidoLogic->deepSave($asientopredefinido,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($libro_auxiliar->getasiento_automaticos() as $asientoautomatico) {
			$asientoautomaticoLogic= new asiento_automatico_logic($this->connexion);
			$asientoautomatico->setid_libro_auxiliar($libro_auxiliar->getId());
			asiento_automatico_data::save($asientoautomatico,$this->connexion);
			$asientoautomaticoLogic->deepSave($asientoautomatico,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($libro_auxiliar->getasientos() as $asiento) {
			$asientoLogic= new asiento_logic($this->connexion);
			$asiento->setid_libro_auxiliar($libro_auxiliar->getId());
			asiento_data::save($asiento,$this->connexion);
			$asientoLogic->deepSave($asiento,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($libro_auxiliar->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($libro_auxiliar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==contador_auxiliar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($libro_auxiliar->getcontador_auxiliars() as $contadorauxiliar) {
					$contadorauxiliarLogic= new contador_auxiliar_logic($this->connexion);
					$contadorauxiliar->setid_libro_auxiliar($libro_auxiliar->getId());
					contador_auxiliar_data::save($contadorauxiliar,$this->connexion);
					$contadorauxiliarLogic->deepSave($contadorauxiliar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($libro_auxiliar->getasiento_predefinidos() as $asientopredefinido) {
					$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
					$asientopredefinido->setid_libro_auxiliar($libro_auxiliar->getId());
					asiento_predefinido_data::save($asientopredefinido,$this->connexion);
					$asientopredefinidoLogic->deepSave($asientopredefinido,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==asiento_automatico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($libro_auxiliar->getasiento_automaticos() as $asientoautomatico) {
					$asientoautomaticoLogic= new asiento_automatico_logic($this->connexion);
					$asientoautomatico->setid_libro_auxiliar($libro_auxiliar->getId());
					asiento_automatico_data::save($asientoautomatico,$this->connexion);
					$asientoautomaticoLogic->deepSave($asientoautomatico,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($libro_auxiliar->getasientos() as $asiento) {
					$asientoLogic= new asiento_logic($this->connexion);
					$asiento->setid_libro_auxiliar($libro_auxiliar->getId());
					asiento_data::save($asiento,$this->connexion);
					$asientoLogic->deepSave($asiento,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($libro_auxiliar->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($libro_auxiliar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==contador_auxiliar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(contador_auxiliar::$class);

			foreach($libro_auxiliar->getcontador_auxiliars() as $contadorauxiliar) {
				$contadorauxiliarLogic= new contador_auxiliar_logic($this->connexion);
				$contadorauxiliar->setid_libro_auxiliar($libro_auxiliar->getId());
				contador_auxiliar_data::save($contadorauxiliar,$this->connexion);
				$contadorauxiliarLogic->deepSave($contadorauxiliar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
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

			foreach($libro_auxiliar->getasiento_predefinidos() as $asientopredefinido) {
				$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
				$asientopredefinido->setid_libro_auxiliar($libro_auxiliar->getId());
				asiento_predefinido_data::save($asientopredefinido,$this->connexion);
				$asientopredefinidoLogic->deepSave($asientopredefinido,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($libro_auxiliar->getasiento_automaticos() as $asientoautomatico) {
				$asientoautomaticoLogic= new asiento_automatico_logic($this->connexion);
				$asientoautomatico->setid_libro_auxiliar($libro_auxiliar->getId());
				asiento_automatico_data::save($asientoautomatico,$this->connexion);
				$asientoautomaticoLogic->deepSave($asientoautomatico,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($libro_auxiliar->getasientos() as $asiento) {
				$asientoLogic= new asiento_logic($this->connexion);
				$asiento->setid_libro_auxiliar($libro_auxiliar->getId());
				asiento_data::save($asiento,$this->connexion);
				$asientoLogic->deepSave($asiento,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				libro_auxiliar_data::save($libro_auxiliar, $this->connexion);
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
			
			$this->deepLoad($this->libro_auxiliar,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->libro_auxiliars as $libro_auxiliar) {
				$this->deepLoad($libro_auxiliar,$isDeep,$deepLoadType,$clases);
								
				libro_auxiliar_util::refrescarFKDescripciones($this->libro_auxiliars);
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
			
			foreach($this->libro_auxiliars as $libro_auxiliar) {
				$this->deepLoad($libro_auxiliar,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->libro_auxiliar,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->libro_auxiliars as $libro_auxiliar) {
				$this->deepSave($libro_auxiliar,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->libro_auxiliars as $libro_auxiliar) {
				$this->deepSave($libro_auxiliar,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(contador_auxiliar::$class);
				$classes[]=new Classe(asiento_predefinido::$class);
				$classes[]=new Classe(asiento_automatico::$class);
				$classes[]=new Classe(asiento::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==contador_auxiliar::$class) {
						$classes[]=new Classe(contador_auxiliar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==asiento_predefinido::$class) {
						$classes[]=new Classe(asiento_predefinido::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==asiento_automatico::$class) {
						$classes[]=new Classe(asiento_automatico::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==asiento::$class) {
						$classes[]=new Classe(asiento::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==contador_auxiliar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(contador_auxiliar::$class);
				}

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
					if($clas->clas==asiento_automatico::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento_automatico::$class);
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

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getlibro_auxiliar() : ?libro_auxiliar {	
		/*
		libro_auxiliar_logic_add::checklibro_auxiliarToGet($this->libro_auxiliar,$this->datosCliente);
		libro_auxiliar_logic_add::updatelibro_auxiliarToGet($this->libro_auxiliar);
		*/
			
		return $this->libro_auxiliar;
	}
		
	public function setlibro_auxiliar(libro_auxiliar $newlibro_auxiliar) {
		$this->libro_auxiliar = $newlibro_auxiliar;
	}
	
	public function getlibro_auxiliars() : array {		
		/*
		libro_auxiliar_logic_add::checklibro_auxiliarToGets($this->libro_auxiliars,$this->datosCliente);
		
		foreach ($this->libro_auxiliars as $libro_auxiliarLocal ) {
			libro_auxiliar_logic_add::updatelibro_auxiliarToGet($libro_auxiliarLocal);
		}
		*/
		
		return $this->libro_auxiliars;
	}
	
	public function setlibro_auxiliars(array $newlibro_auxiliars) {
		$this->libro_auxiliars = $newlibro_auxiliars;
	}
	
	public function getlibro_auxiliarDataAccess() : libro_auxiliar_data {
		return $this->libro_auxiliarDataAccess;
	}
	
	public function setlibro_auxiliarDataAccess(libro_auxiliar_data $newlibro_auxiliarDataAccess) {
		$this->libro_auxiliarDataAccess = $newlibro_auxiliarDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        libro_auxiliar_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		asiento_predefinido_detalle_logic::$logger;
		asiento_detalle_logic::$logger;
		asiento_automatico_detalle_logic::$logger;
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
