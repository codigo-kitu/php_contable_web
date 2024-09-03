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

namespace com\bydan\contabilidad\contabilidad\asiento_automatico\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_param_return;

use com\bydan\contabilidad\contabilidad\asiento_automatico\presentation\session\asiento_automatico_session;

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

use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_util;
use com\bydan\contabilidad\contabilidad\asiento_automatico\business\entity\asiento_automatico;
use com\bydan\contabilidad\contabilidad\asiento_automatico\business\data\asiento_automatico_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\seguridad\modulo\business\data\modulo_data;
use com\bydan\contabilidad\seguridad\modulo\business\logic\modulo_logic;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;

use com\bydan\contabilidad\contabilidad\fuente\business\entity\fuente;
use com\bydan\contabilidad\contabilidad\fuente\business\data\fuente_data;
use com\bydan\contabilidad\contabilidad\fuente\business\logic\fuente_logic;
use com\bydan\contabilidad\contabilidad\fuente\util\fuente_util;

use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\data\libro_auxiliar_data;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\logic\libro_auxiliar_logic;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_util;

use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;
use com\bydan\contabilidad\contabilidad\centro_costo\business\data\centro_costo_data;
use com\bydan\contabilidad\contabilidad\centro_costo\business\logic\centro_costo_logic;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_util;

//REL


use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\business\entity\asiento_automatico_detalle;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\business\data\asiento_automatico_detalle_data;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\business\logic\asiento_automatico_detalle_logic;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_util;

//REL DETALLES




class asiento_automatico_logic  extends GeneralEntityLogic implements asiento_automatico_logicI {	
	/*GENERAL*/
	public asiento_automatico_data $asiento_automaticoDataAccess;
	//public ?asiento_automatico_logic_add $asiento_automaticoLogicAdditional=null;
	public ?asiento_automatico $asiento_automatico;
	public array $asiento_automaticos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->asiento_automaticoDataAccess = new asiento_automatico_data();			
			$this->asiento_automaticos = array();
			$this->asiento_automatico = new asiento_automatico();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->asiento_automaticoLogicAdditional = new asiento_automatico_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->asiento_automaticoLogicAdditional==null) {
		//	$this->asiento_automaticoLogicAdditional=new asiento_automatico_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->asiento_automaticoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->asiento_automaticoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->asiento_automaticoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->asiento_automaticoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->asiento_automaticos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_automaticos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->asiento_automaticos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_automaticos);
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
		$this->asiento_automatico = new asiento_automatico();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->asiento_automatico=$this->asiento_automaticoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->asiento_automatico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				asiento_automatico_util::refrescarFKDescripcion($this->asiento_automatico);
			}
						
			//asiento_automatico_logic_add::checkasiento_automaticoToGet($this->asiento_automatico,$this->datosCliente);
			//asiento_automatico_logic_add::updateasiento_automaticoToGet($this->asiento_automatico);
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
		$this->asiento_automatico = new  asiento_automatico();
		  		  
        try {		
			$this->asiento_automatico=$this->asiento_automaticoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->asiento_automatico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				asiento_automatico_util::refrescarFKDescripcion($this->asiento_automatico);
			}
			
			//asiento_automatico_logic_add::checkasiento_automaticoToGet($this->asiento_automatico,$this->datosCliente);
			//asiento_automatico_logic_add::updateasiento_automaticoToGet($this->asiento_automatico);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?asiento_automatico {
		$asiento_automaticoLogic = new  asiento_automatico_logic();
		  		  
        try {		
			$asiento_automaticoLogic->setConnexion($connexion);			
			$asiento_automaticoLogic->getEntity($id);			
			return $asiento_automaticoLogic->getasiento_automatico();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->asiento_automatico = new  asiento_automatico();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->asiento_automatico=$this->asiento_automaticoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->asiento_automatico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				asiento_automatico_util::refrescarFKDescripcion($this->asiento_automatico);
			}
			
			//asiento_automatico_logic_add::checkasiento_automaticoToGet($this->asiento_automatico,$this->datosCliente);
			//asiento_automatico_logic_add::updateasiento_automaticoToGet($this->asiento_automatico);
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
		$this->asiento_automatico = new  asiento_automatico();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_automatico=$this->asiento_automaticoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->asiento_automatico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				asiento_automatico_util::refrescarFKDescripcion($this->asiento_automatico);
			}
			
			//asiento_automatico_logic_add::checkasiento_automaticoToGet($this->asiento_automatico,$this->datosCliente);
			//asiento_automatico_logic_add::updateasiento_automaticoToGet($this->asiento_automatico);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?asiento_automatico {
		$asiento_automaticoLogic = new  asiento_automatico_logic();
		  		  
        try {		
			$asiento_automaticoLogic->setConnexion($connexion);			
			$asiento_automaticoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $asiento_automaticoLogic->getasiento_automatico();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->asiento_automaticos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_automaticos);			
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
		$this->asiento_automaticos = array();
		  		  
        try {			
			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_automaticos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->asiento_automaticos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_automaticos);
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
		$this->asiento_automaticos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_automaticos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$asiento_automaticoLogic = new  asiento_automatico_logic();
		  		  
        try {		
			$asiento_automaticoLogic->setConnexion($connexion);			
			$asiento_automaticoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $asiento_automaticoLogic->getasiento_automaticos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->asiento_automaticos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_automaticos);
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
		$this->asiento_automaticos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_automaticos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->asiento_automaticos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_automaticos);
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
		$this->asiento_automaticos = array();
		  		  
        try {			
			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}	
			
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_automaticos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->asiento_automaticos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_automaticos);
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
		$this->asiento_automaticos = array();
		  		  
        try {		
			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_automaticos);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_Idcentro_costoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_centro_costo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_centro_costo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_centro_costo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_centro_costo,asiento_automatico_util::$ID_CENTRO_COSTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_centro_costo);

			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_automaticos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcentro_costo(string $strFinalQuery,Pagination $pagination,int $id_centro_costo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_centro_costo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_centro_costo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_centro_costo,asiento_automatico_util::$ID_CENTRO_COSTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_centro_costo);

			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_automaticos);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,asiento_automatico_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_automaticos);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,asiento_automatico_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_automaticos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdfuenteWithConnection(string $strFinalQuery,Pagination $pagination,int $id_fuente) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_fuente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_fuente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_fuente,asiento_automatico_util::$ID_FUENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_fuente);

			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_automaticos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idfuente(string $strFinalQuery,Pagination $pagination,int $id_fuente) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_fuente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_fuente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_fuente,asiento_automatico_util::$ID_FUENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_fuente);

			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_automaticos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idlibro_auxiliarWithConnection(string $strFinalQuery,Pagination $pagination,int $id_libro_auxiliar) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_libro_auxiliar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_libro_auxiliar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_libro_auxiliar,asiento_automatico_util::$ID_LIBRO_AUXILIAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_libro_auxiliar);

			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_automaticos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idlibro_auxiliar(string $strFinalQuery,Pagination $pagination,int $id_libro_auxiliar) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_libro_auxiliar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_libro_auxiliar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_libro_auxiliar,asiento_automatico_util::$ID_LIBRO_AUXILIAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_libro_auxiliar);

			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_automaticos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdmoduloWithConnection(string $strFinalQuery,Pagination $pagination,int $id_modulo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_modulo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_modulo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_modulo,asiento_automatico_util::$ID_MODULO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_modulo);

			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_automaticos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idmodulo(string $strFinalQuery,Pagination $pagination,int $id_modulo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_modulo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_modulo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_modulo,asiento_automatico_util::$ID_MODULO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_modulo);

			$this->asiento_automaticos=$this->asiento_automaticoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			//asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_automaticos);
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
						
			//asiento_automatico_logic_add::checkasiento_automaticoToSave($this->asiento_automatico,$this->datosCliente,$this->connexion);	       
			//asiento_automatico_logic_add::updateasiento_automaticoToSave($this->asiento_automatico);			
			asiento_automatico_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->asiento_automatico,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->asiento_automaticoLogicAdditional->checkGeneralEntityToSave($this,$this->asiento_automatico,$this->datosCliente,$this->connexion);
			
			
			asiento_automatico_data::save($this->asiento_automatico, $this->connexion);	    	       	 				
			//asiento_automatico_logic_add::checkasiento_automaticoToSaveAfter($this->asiento_automatico,$this->datosCliente,$this->connexion);			
			//$this->asiento_automaticoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->asiento_automatico,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->asiento_automatico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->asiento_automatico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				asiento_automatico_util::refrescarFKDescripcion($this->asiento_automatico);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->asiento_automatico->getIsDeleted()) {
				$this->asiento_automatico=null;
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
						
			/*asiento_automatico_logic_add::checkasiento_automaticoToSave($this->asiento_automatico,$this->datosCliente,$this->connexion);*/	        
			//asiento_automatico_logic_add::updateasiento_automaticoToSave($this->asiento_automatico);			
			//$this->asiento_automaticoLogicAdditional->checkGeneralEntityToSave($this,$this->asiento_automatico,$this->datosCliente,$this->connexion);			
			asiento_automatico_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->asiento_automatico,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			asiento_automatico_data::save($this->asiento_automatico, $this->connexion);	    	       	 						
			/*asiento_automatico_logic_add::checkasiento_automaticoToSaveAfter($this->asiento_automatico,$this->datosCliente,$this->connexion);*/			
			//$this->asiento_automaticoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->asiento_automatico,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->asiento_automatico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->asiento_automatico,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				asiento_automatico_util::refrescarFKDescripcion($this->asiento_automatico);				
			}
			
			if($this->asiento_automatico->getIsDeleted()) {
				$this->asiento_automatico=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(asiento_automatico $asiento_automatico,Connexion $connexion)  {
		$asiento_automaticoLogic = new  asiento_automatico_logic();		  		  
        try {		
			$asiento_automaticoLogic->setConnexion($connexion);			
			$asiento_automaticoLogic->setasiento_automatico($asiento_automatico);			
			$asiento_automaticoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*asiento_automatico_logic_add::checkasiento_automaticoToSaves($this->asiento_automaticos,$this->datosCliente,$this->connexion);*/	        	
			//$this->asiento_automaticoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->asiento_automaticos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->asiento_automaticos as $asiento_automaticoLocal) {				
								
				//asiento_automatico_logic_add::updateasiento_automaticoToSave($asiento_automaticoLocal);	        	
				asiento_automatico_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$asiento_automaticoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				asiento_automatico_data::save($asiento_automaticoLocal, $this->connexion);				
			}
			
			/*asiento_automatico_logic_add::checkasiento_automaticoToSavesAfter($this->asiento_automaticos,$this->datosCliente,$this->connexion);*/			
			//$this->asiento_automaticoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->asiento_automaticos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
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
			/*asiento_automatico_logic_add::checkasiento_automaticoToSaves($this->asiento_automaticos,$this->datosCliente,$this->connexion);*/			
			//$this->asiento_automaticoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->asiento_automaticos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->asiento_automaticos as $asiento_automaticoLocal) {				
								
				//asiento_automatico_logic_add::updateasiento_automaticoToSave($asiento_automaticoLocal);	        	
				asiento_automatico_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$asiento_automaticoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				asiento_automatico_data::save($asiento_automaticoLocal, $this->connexion);				
			}			
			
			/*asiento_automatico_logic_add::checkasiento_automaticoToSavesAfter($this->asiento_automaticos,$this->datosCliente,$this->connexion);*/			
			//$this->asiento_automaticoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->asiento_automaticos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $asiento_automaticos,Connexion $connexion)  {
		$asiento_automaticoLogic = new  asiento_automatico_logic();
		  		  
        try {		
			$asiento_automaticoLogic->setConnexion($connexion);			
			$asiento_automaticoLogic->setasiento_automaticos($asiento_automaticos);			
			$asiento_automaticoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$asiento_automaticosAux=array();
		
		foreach($this->asiento_automaticos as $asiento_automatico) {
			if($asiento_automatico->getIsDeleted()==false) {
				$asiento_automaticosAux[]=$asiento_automatico;
			}
		}
		
		$this->asiento_automaticos=$asiento_automaticosAux;
	}
	
	public function updateToGetsAuxiliar(array &$asiento_automaticos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->asiento_automaticos as $asiento_automatico) {
				
				$asiento_automatico->setid_empresa_Descripcion(asiento_automatico_util::getempresaDescripcion($asiento_automatico->getempresa()));
				$asiento_automatico->setid_modulo_Descripcion(asiento_automatico_util::getmoduloDescripcion($asiento_automatico->getmodulo()));
				$asiento_automatico->setid_fuente_Descripcion(asiento_automatico_util::getfuenteDescripcion($asiento_automatico->getfuente()));
				$asiento_automatico->setid_libro_auxiliar_Descripcion(asiento_automatico_util::getlibro_auxiliarDescripcion($asiento_automatico->getlibro_auxiliar()));
				$asiento_automatico->setid_centro_costo_Descripcion(asiento_automatico_util::getcentro_costoDescripcion($asiento_automatico->getcentro_costo()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$asiento_automatico_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$asiento_automatico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$asiento_automatico_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$asiento_automatico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$asiento_automatico_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$asiento_automaticoForeignKey=new asiento_automatico_param_return();//asiento_automaticoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$asiento_automaticoForeignKey,$asiento_automatico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_modulo',$strRecargarFkTipos,',')) {
				$this->cargarCombosmodulosFK($this->connexion,$strRecargarFkQuery,$asiento_automaticoForeignKey,$asiento_automatico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_fuente',$strRecargarFkTipos,',')) {
				$this->cargarCombosfuentesFK($this->connexion,$strRecargarFkQuery,$asiento_automaticoForeignKey,$asiento_automatico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_libro_auxiliar',$strRecargarFkTipos,',')) {
				$this->cargarComboslibro_auxiliarsFK($this->connexion,$strRecargarFkQuery,$asiento_automaticoForeignKey,$asiento_automatico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_centro_costo',$strRecargarFkTipos,',')) {
				$this->cargarComboscentro_costosFK($this->connexion,$strRecargarFkQuery,$asiento_automaticoForeignKey,$asiento_automatico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$asiento_automaticoForeignKey,$asiento_automatico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_modulo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosmodulosFK($this->connexion,' where id=-1 ',$asiento_automaticoForeignKey,$asiento_automatico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_fuente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosfuentesFK($this->connexion,' where id=-1 ',$asiento_automaticoForeignKey,$asiento_automatico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_libro_auxiliar',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboslibro_auxiliarsFK($this->connexion,' where id=-1 ',$asiento_automaticoForeignKey,$asiento_automatico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_centro_costo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscentro_costosFK($this->connexion,' where id=-1 ',$asiento_automaticoForeignKey,$asiento_automatico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $asiento_automaticoForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$asiento_automaticoForeignKey,$asiento_automatico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$asiento_automaticoForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_automatico_session==null) {
			$asiento_automatico_session=new asiento_automatico_session();
		}
		
		if($asiento_automatico_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($asiento_automaticoForeignKey->idempresaDefaultFK==0) {
					$asiento_automaticoForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$asiento_automaticoForeignKey->empresasFK[$empresaLocal->getId()]=asiento_automatico_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($asiento_automatico_session->bigidempresaActual!=null && $asiento_automatico_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($asiento_automatico_session->bigidempresaActual);//WithConnection

				$asiento_automaticoForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=asiento_automatico_util::getempresaDescripcion($empresaLogic->getempresa());
				$asiento_automaticoForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombosmodulosFK($connexion=null,$strRecargarFkQuery='',$asiento_automaticoForeignKey,$asiento_automatico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$moduloLogic= new modulo_logic();
		$pagination= new Pagination();
		$asiento_automaticoForeignKey->modulosFK=array();

		$moduloLogic->setConnexion($connexion);
		$moduloLogic->getmoduloDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_automatico_session==null) {
			$asiento_automatico_session=new asiento_automatico_session();
		}
		
		if($asiento_automatico_session->bitBusquedaDesdeFKSesionmodulo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=modulo_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalmodulo=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalmodulo=Funciones::GetFinalQueryAppend($finalQueryGlobalmodulo, '');
				$finalQueryGlobalmodulo.=modulo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalmodulo.$strRecargarFkQuery;		

				$moduloLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($moduloLogic->getmodulos() as $moduloLocal ) {
				if($asiento_automaticoForeignKey->idmoduloDefaultFK==0) {
					$asiento_automaticoForeignKey->idmoduloDefaultFK=$moduloLocal->getId();
				}

				$asiento_automaticoForeignKey->modulosFK[$moduloLocal->getId()]=asiento_automatico_util::getmoduloDescripcion($moduloLocal);
			}

		} else {

			if($asiento_automatico_session->bigidmoduloActual!=null && $asiento_automatico_session->bigidmoduloActual > 0) {
				$moduloLogic->getEntity($asiento_automatico_session->bigidmoduloActual);//WithConnection

				$asiento_automaticoForeignKey->modulosFK[$moduloLogic->getmodulo()->getId()]=asiento_automatico_util::getmoduloDescripcion($moduloLogic->getmodulo());
				$asiento_automaticoForeignKey->idmoduloDefaultFK=$moduloLogic->getmodulo()->getId();
			}
		}
	}

	public function cargarCombosfuentesFK($connexion=null,$strRecargarFkQuery='',$asiento_automaticoForeignKey,$asiento_automatico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$fuenteLogic= new fuente_logic();
		$pagination= new Pagination();
		$asiento_automaticoForeignKey->fuentesFK=array();

		$fuenteLogic->setConnexion($connexion);
		$fuenteLogic->getfuenteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_automatico_session==null) {
			$asiento_automatico_session=new asiento_automatico_session();
		}
		
		if($asiento_automatico_session->bitBusquedaDesdeFKSesionfuente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=fuente_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalfuente=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalfuente=Funciones::GetFinalQueryAppend($finalQueryGlobalfuente, '');
				$finalQueryGlobalfuente.=fuente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalfuente.$strRecargarFkQuery;		

				$fuenteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($fuenteLogic->getfuentes() as $fuenteLocal ) {
				if($asiento_automaticoForeignKey->idfuenteDefaultFK==0) {
					$asiento_automaticoForeignKey->idfuenteDefaultFK=$fuenteLocal->getId();
				}

				$asiento_automaticoForeignKey->fuentesFK[$fuenteLocal->getId()]=asiento_automatico_util::getfuenteDescripcion($fuenteLocal);
			}

		} else {

			if($asiento_automatico_session->bigidfuenteActual!=null && $asiento_automatico_session->bigidfuenteActual > 0) {
				$fuenteLogic->getEntity($asiento_automatico_session->bigidfuenteActual);//WithConnection

				$asiento_automaticoForeignKey->fuentesFK[$fuenteLogic->getfuente()->getId()]=asiento_automatico_util::getfuenteDescripcion($fuenteLogic->getfuente());
				$asiento_automaticoForeignKey->idfuenteDefaultFK=$fuenteLogic->getfuente()->getId();
			}
		}
	}

	public function cargarComboslibro_auxiliarsFK($connexion=null,$strRecargarFkQuery='',$asiento_automaticoForeignKey,$asiento_automatico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$libro_auxiliarLogic= new libro_auxiliar_logic();
		$pagination= new Pagination();
		$asiento_automaticoForeignKey->libro_auxiliarsFK=array();

		$libro_auxiliarLogic->setConnexion($connexion);
		$libro_auxiliarLogic->getlibro_auxiliarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_automatico_session==null) {
			$asiento_automatico_session=new asiento_automatico_session();
		}
		
		if($asiento_automatico_session->bitBusquedaDesdeFKSesionlibro_auxiliar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=libro_auxiliar_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGloballibro_auxiliar=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGloballibro_auxiliar=Funciones::GetFinalQueryAppend($finalQueryGloballibro_auxiliar, '');
				$finalQueryGloballibro_auxiliar.=libro_auxiliar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGloballibro_auxiliar.$strRecargarFkQuery;		

				$libro_auxiliarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($libro_auxiliarLogic->getlibro_auxiliars() as $libro_auxiliarLocal ) {
				if($asiento_automaticoForeignKey->idlibro_auxiliarDefaultFK==0) {
					$asiento_automaticoForeignKey->idlibro_auxiliarDefaultFK=$libro_auxiliarLocal->getId();
				}

				$asiento_automaticoForeignKey->libro_auxiliarsFK[$libro_auxiliarLocal->getId()]=asiento_automatico_util::getlibro_auxiliarDescripcion($libro_auxiliarLocal);
			}

		} else {

			if($asiento_automatico_session->bigidlibro_auxiliarActual!=null && $asiento_automatico_session->bigidlibro_auxiliarActual > 0) {
				$libro_auxiliarLogic->getEntity($asiento_automatico_session->bigidlibro_auxiliarActual);//WithConnection

				$asiento_automaticoForeignKey->libro_auxiliarsFK[$libro_auxiliarLogic->getlibro_auxiliar()->getId()]=asiento_automatico_util::getlibro_auxiliarDescripcion($libro_auxiliarLogic->getlibro_auxiliar());
				$asiento_automaticoForeignKey->idlibro_auxiliarDefaultFK=$libro_auxiliarLogic->getlibro_auxiliar()->getId();
			}
		}
	}

	public function cargarComboscentro_costosFK($connexion=null,$strRecargarFkQuery='',$asiento_automaticoForeignKey,$asiento_automatico_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$centro_costoLogic= new centro_costo_logic();
		$pagination= new Pagination();
		$asiento_automaticoForeignKey->centro_costosFK=array();

		$centro_costoLogic->setConnexion($connexion);
		$centro_costoLogic->getcentro_costoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_automatico_session==null) {
			$asiento_automatico_session=new asiento_automatico_session();
		}
		
		if($asiento_automatico_session->bitBusquedaDesdeFKSesioncentro_costo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=centro_costo_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcentro_costo=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcentro_costo=Funciones::GetFinalQueryAppend($finalQueryGlobalcentro_costo, '');
				$finalQueryGlobalcentro_costo.=centro_costo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcentro_costo.$strRecargarFkQuery;		

				$centro_costoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($centro_costoLogic->getcentro_costos() as $centro_costoLocal ) {
				if($asiento_automaticoForeignKey->idcentro_costoDefaultFK==0) {
					$asiento_automaticoForeignKey->idcentro_costoDefaultFK=$centro_costoLocal->getId();
				}

				$asiento_automaticoForeignKey->centro_costosFK[$centro_costoLocal->getId()]=asiento_automatico_util::getcentro_costoDescripcion($centro_costoLocal);
			}

		} else {

			if($asiento_automatico_session->bigidcentro_costoActual!=null && $asiento_automatico_session->bigidcentro_costoActual > 0) {
				$centro_costoLogic->getEntity($asiento_automatico_session->bigidcentro_costoActual);//WithConnection

				$asiento_automaticoForeignKey->centro_costosFK[$centro_costoLogic->getcentro_costo()->getId()]=asiento_automatico_util::getcentro_costoDescripcion($centro_costoLogic->getcentro_costo());
				$asiento_automaticoForeignKey->idcentro_costoDefaultFK=$centro_costoLogic->getcentro_costo()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($asiento_automatico,$asientoautomaticodetalles) {
		$this->saveRelacionesBase($asiento_automatico,$asientoautomaticodetalles,true);
	}

	public function saveRelaciones($asiento_automatico,$asientoautomaticodetalles) {
		$this->saveRelacionesBase($asiento_automatico,$asientoautomaticodetalles,false);
	}

	public function saveRelacionesBase($asiento_automatico,$asientoautomaticodetalles=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$asiento_automatico->setasiento_automatico_detalles($asientoautomaticodetalles);
			$this->setasiento_automatico($asiento_automatico);

			if(true) {

				//asiento_automatico_logic_add::updateRelacionesToSave($asiento_automatico,$this);

				if(($this->asiento_automatico->getIsNew() || $this->asiento_automatico->getIsChanged()) && !$this->asiento_automatico->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($asientoautomaticodetalles);

				} else if($this->asiento_automatico->getIsDeleted()) {
					$this->saveRelacionesDetalles($asientoautomaticodetalles);
					$this->save();
				}

				//asiento_automatico_logic_add::updateRelacionesToSaveAfter($asiento_automatico,$this);

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
	
	
	public function saveRelacionesDetalles($asientoautomaticodetalles=array()) {
		try {
	

			$idasiento_automaticoActual=$this->getasiento_automatico()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_automatico_detalle_carga.php');
			asiento_automatico_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$asientoautomaticodetalleLogic_Desde_asiento_automatico=new asiento_automatico_detalle_logic();
			$asientoautomaticodetalleLogic_Desde_asiento_automatico->setasiento_automatico_detalles($asientoautomaticodetalles);

			$asientoautomaticodetalleLogic_Desde_asiento_automatico->setConnexion($this->getConnexion());
			$asientoautomaticodetalleLogic_Desde_asiento_automatico->setDatosCliente($this->datosCliente);

			foreach($asientoautomaticodetalleLogic_Desde_asiento_automatico->getasiento_automatico_detalles() as $asientoautomaticodetalle_Desde_asiento_automatico) {
				$asientoautomaticodetalle_Desde_asiento_automatico->setid_asiento_automatico($idasiento_automaticoActual);
			}

			$asientoautomaticodetalleLogic_Desde_asiento_automatico->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $asiento_automaticos,asiento_automatico_param_return $asiento_automaticoParameterGeneral) : asiento_automatico_param_return {
		$asiento_automaticoReturnGeneral=new asiento_automatico_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $asiento_automaticoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $asiento_automaticos,asiento_automatico_param_return $asiento_automaticoParameterGeneral) : asiento_automatico_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$asiento_automaticoReturnGeneral=new asiento_automatico_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $asiento_automaticoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $asiento_automaticos,asiento_automatico $asiento_automatico,asiento_automatico_param_return $asiento_automaticoParameterGeneral,bool $isEsNuevoasiento_automatico,array $clases) : asiento_automatico_param_return {
		 try {	
			$asiento_automaticoReturnGeneral=new asiento_automatico_param_return();
	
			$asiento_automaticoReturnGeneral->setasiento_automatico($asiento_automatico);
			$asiento_automaticoReturnGeneral->setasiento_automaticos($asiento_automaticos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$asiento_automaticoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $asiento_automaticoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $asiento_automaticos,asiento_automatico $asiento_automatico,asiento_automatico_param_return $asiento_automaticoParameterGeneral,bool $isEsNuevoasiento_automatico,array $clases) : asiento_automatico_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$asiento_automaticoReturnGeneral=new asiento_automatico_param_return();
	
			$asiento_automaticoReturnGeneral->setasiento_automatico($asiento_automatico);
			$asiento_automaticoReturnGeneral->setasiento_automaticos($asiento_automaticos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$asiento_automaticoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $asiento_automaticoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $asiento_automaticos,asiento_automatico $asiento_automatico,asiento_automatico_param_return $asiento_automaticoParameterGeneral,bool $isEsNuevoasiento_automatico,array $clases) : asiento_automatico_param_return {
		 try {	
			$asiento_automaticoReturnGeneral=new asiento_automatico_param_return();
	
			$asiento_automaticoReturnGeneral->setasiento_automatico($asiento_automatico);
			$asiento_automaticoReturnGeneral->setasiento_automaticos($asiento_automaticos);
			
			
			
			return $asiento_automaticoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $asiento_automaticos,asiento_automatico $asiento_automatico,asiento_automatico_param_return $asiento_automaticoParameterGeneral,bool $isEsNuevoasiento_automatico,array $clases) : asiento_automatico_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$asiento_automaticoReturnGeneral=new asiento_automatico_param_return();
	
			$asiento_automaticoReturnGeneral->setasiento_automatico($asiento_automatico);
			$asiento_automaticoReturnGeneral->setasiento_automaticos($asiento_automaticos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $asiento_automaticoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,asiento_automatico $asiento_automatico,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,asiento_automatico $asiento_automatico,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		asiento_automatico_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		asiento_automatico_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(asiento_automatico $asiento_automatico,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//asiento_automatico_logic_add::updateasiento_automaticoToGet($this->asiento_automatico);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$asiento_automatico->setempresa($this->asiento_automaticoDataAccess->getempresa($this->connexion,$asiento_automatico));
		$asiento_automatico->setmodulo($this->asiento_automaticoDataAccess->getmodulo($this->connexion,$asiento_automatico));
		$asiento_automatico->setfuente($this->asiento_automaticoDataAccess->getfuente($this->connexion,$asiento_automatico));
		$asiento_automatico->setlibro_auxiliar($this->asiento_automaticoDataAccess->getlibro_auxiliar($this->connexion,$asiento_automatico));
		$asiento_automatico->setcentro_costo($this->asiento_automaticoDataAccess->getcentro_costo($this->connexion,$asiento_automatico));
		$asiento_automatico->setasiento_automatico_detalles($this->asiento_automaticoDataAccess->getasiento_automatico_detalles($this->connexion,$asiento_automatico));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$asiento_automatico->setempresa($this->asiento_automaticoDataAccess->getempresa($this->connexion,$asiento_automatico));
				continue;
			}

			if($clas->clas==modulo::$class.'') {
				$asiento_automatico->setmodulo($this->asiento_automaticoDataAccess->getmodulo($this->connexion,$asiento_automatico));
				continue;
			}

			if($clas->clas==fuente::$class.'') {
				$asiento_automatico->setfuente($this->asiento_automaticoDataAccess->getfuente($this->connexion,$asiento_automatico));
				continue;
			}

			if($clas->clas==libro_auxiliar::$class.'') {
				$asiento_automatico->setlibro_auxiliar($this->asiento_automaticoDataAccess->getlibro_auxiliar($this->connexion,$asiento_automatico));
				continue;
			}

			if($clas->clas==centro_costo::$class.'') {
				$asiento_automatico->setcentro_costo($this->asiento_automaticoDataAccess->getcentro_costo($this->connexion,$asiento_automatico));
				continue;
			}

			if($clas->clas==asiento_automatico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$asiento_automatico->setasiento_automatico_detalles($this->asiento_automaticoDataAccess->getasiento_automatico_detalles($this->connexion,$asiento_automatico));

				if($this->isConDeep) {
					$asientoautomaticodetalleLogic= new asiento_automatico_detalle_logic($this->connexion);
					$asientoautomaticodetalleLogic->setasiento_automatico_detalles($asiento_automatico->getasiento_automatico_detalles());
					$classesLocal=asiento_automatico_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$asientoautomaticodetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					asiento_automatico_detalle_util::refrescarFKDescripciones($asientoautomaticodetalleLogic->getasiento_automatico_detalles());
					$asiento_automatico->setasiento_automatico_detalles($asientoautomaticodetalleLogic->getasiento_automatico_detalles());
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
			$asiento_automatico->setempresa($this->asiento_automaticoDataAccess->getempresa($this->connexion,$asiento_automatico));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_automatico->setmodulo($this->asiento_automaticoDataAccess->getmodulo($this->connexion,$asiento_automatico));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==fuente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_automatico->setfuente($this->asiento_automaticoDataAccess->getfuente($this->connexion,$asiento_automatico));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==libro_auxiliar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_automatico->setlibro_auxiliar($this->asiento_automaticoDataAccess->getlibro_auxiliar($this->connexion,$asiento_automatico));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==centro_costo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_automatico->setcentro_costo($this->asiento_automaticoDataAccess->getcentro_costo($this->connexion,$asiento_automatico));
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
			$asiento_automatico->setasiento_automatico_detalles($this->asiento_automaticoDataAccess->getasiento_automatico_detalles($this->connexion,$asiento_automatico));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$asiento_automatico->setempresa($this->asiento_automaticoDataAccess->getempresa($this->connexion,$asiento_automatico));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($asiento_automatico->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$asiento_automatico->setmodulo($this->asiento_automaticoDataAccess->getmodulo($this->connexion,$asiento_automatico));
		$moduloLogic= new modulo_logic($this->connexion);
		$moduloLogic->deepLoad($asiento_automatico->getmodulo(),$isDeep,$deepLoadType,$clases);
				
		$asiento_automatico->setfuente($this->asiento_automaticoDataAccess->getfuente($this->connexion,$asiento_automatico));
		$fuenteLogic= new fuente_logic($this->connexion);
		$fuenteLogic->deepLoad($asiento_automatico->getfuente(),$isDeep,$deepLoadType,$clases);
				
		$asiento_automatico->setlibro_auxiliar($this->asiento_automaticoDataAccess->getlibro_auxiliar($this->connexion,$asiento_automatico));
		$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
		$libro_auxiliarLogic->deepLoad($asiento_automatico->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases);
				
		$asiento_automatico->setcentro_costo($this->asiento_automaticoDataAccess->getcentro_costo($this->connexion,$asiento_automatico));
		$centro_costoLogic= new centro_costo_logic($this->connexion);
		$centro_costoLogic->deepLoad($asiento_automatico->getcentro_costo(),$isDeep,$deepLoadType,$clases);
				

		$asiento_automatico->setasiento_automatico_detalles($this->asiento_automaticoDataAccess->getasiento_automatico_detalles($this->connexion,$asiento_automatico));

		foreach($asiento_automatico->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
			$asientoautomaticodetalleLogic= new asiento_automatico_detalle_logic($this->connexion);
			$asientoautomaticodetalleLogic->deepLoad($asientoautomaticodetalle,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$asiento_automatico->setempresa($this->asiento_automaticoDataAccess->getempresa($this->connexion,$asiento_automatico));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($asiento_automatico->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==modulo::$class.'') {
				$asiento_automatico->setmodulo($this->asiento_automaticoDataAccess->getmodulo($this->connexion,$asiento_automatico));
				$moduloLogic= new modulo_logic($this->connexion);
				$moduloLogic->deepLoad($asiento_automatico->getmodulo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==fuente::$class.'') {
				$asiento_automatico->setfuente($this->asiento_automaticoDataAccess->getfuente($this->connexion,$asiento_automatico));
				$fuenteLogic= new fuente_logic($this->connexion);
				$fuenteLogic->deepLoad($asiento_automatico->getfuente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==libro_auxiliar::$class.'') {
				$asiento_automatico->setlibro_auxiliar($this->asiento_automaticoDataAccess->getlibro_auxiliar($this->connexion,$asiento_automatico));
				$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
				$libro_auxiliarLogic->deepLoad($asiento_automatico->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==centro_costo::$class.'') {
				$asiento_automatico->setcentro_costo($this->asiento_automaticoDataAccess->getcentro_costo($this->connexion,$asiento_automatico));
				$centro_costoLogic= new centro_costo_logic($this->connexion);
				$centro_costoLogic->deepLoad($asiento_automatico->getcentro_costo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==asiento_automatico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$asiento_automatico->setasiento_automatico_detalles($this->asiento_automaticoDataAccess->getasiento_automatico_detalles($this->connexion,$asiento_automatico));

				foreach($asiento_automatico->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
					$asientoautomaticodetalleLogic= new asiento_automatico_detalle_logic($this->connexion);
					$asientoautomaticodetalleLogic->deepLoad($asientoautomaticodetalle,$isDeep,$deepLoadType,$clases);
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
			$asiento_automatico->setempresa($this->asiento_automaticoDataAccess->getempresa($this->connexion,$asiento_automatico));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($asiento_automatico->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_automatico->setmodulo($this->asiento_automaticoDataAccess->getmodulo($this->connexion,$asiento_automatico));
			$moduloLogic= new modulo_logic($this->connexion);
			$moduloLogic->deepLoad($asiento_automatico->getmodulo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==fuente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_automatico->setfuente($this->asiento_automaticoDataAccess->getfuente($this->connexion,$asiento_automatico));
			$fuenteLogic= new fuente_logic($this->connexion);
			$fuenteLogic->deepLoad($asiento_automatico->getfuente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==libro_auxiliar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_automatico->setlibro_auxiliar($this->asiento_automaticoDataAccess->getlibro_auxiliar($this->connexion,$asiento_automatico));
			$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
			$libro_auxiliarLogic->deepLoad($asiento_automatico->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==centro_costo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_automatico->setcentro_costo($this->asiento_automaticoDataAccess->getcentro_costo($this->connexion,$asiento_automatico));
			$centro_costoLogic= new centro_costo_logic($this->connexion);
			$centro_costoLogic->deepLoad($asiento_automatico->getcentro_costo(),$isDeep,$deepLoadType,$clases);
				
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
			$asiento_automatico->setasiento_automatico_detalles($this->asiento_automaticoDataAccess->getasiento_automatico_detalles($this->connexion,$asiento_automatico));

			foreach($asiento_automatico->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
				$asientoautomaticodetalleLogic= new asiento_automatico_detalle_logic($this->connexion);
				$asientoautomaticodetalleLogic->deepLoad($asientoautomaticodetalle,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(asiento_automatico $asiento_automatico,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//asiento_automatico_logic_add::updateasiento_automaticoToSave($this->asiento_automatico);			
			
			if(!$paraDeleteCascade) {				
				asiento_automatico_data::save($asiento_automatico, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($asiento_automatico->getempresa(),$this->connexion);
		modulo_data::save($asiento_automatico->getmodulo(),$this->connexion);
		fuente_data::save($asiento_automatico->getfuente(),$this->connexion);
		libro_auxiliar_data::save($asiento_automatico->getlibro_auxiliar(),$this->connexion);
		centro_costo_data::save($asiento_automatico->getcentro_costo(),$this->connexion);

		foreach($asiento_automatico->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
			$asientoautomaticodetalle->setid_asiento_automatico($asiento_automatico->getId());
			asiento_automatico_detalle_data::save($asientoautomaticodetalle,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($asiento_automatico->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==modulo::$class.'') {
				modulo_data::save($asiento_automatico->getmodulo(),$this->connexion);
				continue;
			}

			if($clas->clas==fuente::$class.'') {
				fuente_data::save($asiento_automatico->getfuente(),$this->connexion);
				continue;
			}

			if($clas->clas==libro_auxiliar::$class.'') {
				libro_auxiliar_data::save($asiento_automatico->getlibro_auxiliar(),$this->connexion);
				continue;
			}

			if($clas->clas==centro_costo::$class.'') {
				centro_costo_data::save($asiento_automatico->getcentro_costo(),$this->connexion);
				continue;
			}


			if($clas->clas==asiento_automatico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($asiento_automatico->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
					$asientoautomaticodetalle->setid_asiento_automatico($asiento_automatico->getId());
					asiento_automatico_detalle_data::save($asientoautomaticodetalle,$this->connexion);
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
			empresa_data::save($asiento_automatico->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			modulo_data::save($asiento_automatico->getmodulo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==fuente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			fuente_data::save($asiento_automatico->getfuente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==libro_auxiliar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			libro_auxiliar_data::save($asiento_automatico->getlibro_auxiliar(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==centro_costo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			centro_costo_data::save($asiento_automatico->getcentro_costo(),$this->connexion);
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

			foreach($asiento_automatico->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
				$asientoautomaticodetalle->setid_asiento_automatico($asiento_automatico->getId());
				asiento_automatico_detalle_data::save($asientoautomaticodetalle,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($asiento_automatico->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($asiento_automatico->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		modulo_data::save($asiento_automatico->getmodulo(),$this->connexion);
		$moduloLogic= new modulo_logic($this->connexion);
		$moduloLogic->deepSave($asiento_automatico->getmodulo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		fuente_data::save($asiento_automatico->getfuente(),$this->connexion);
		$fuenteLogic= new fuente_logic($this->connexion);
		$fuenteLogic->deepSave($asiento_automatico->getfuente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		libro_auxiliar_data::save($asiento_automatico->getlibro_auxiliar(),$this->connexion);
		$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
		$libro_auxiliarLogic->deepSave($asiento_automatico->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		centro_costo_data::save($asiento_automatico->getcentro_costo(),$this->connexion);
		$centro_costoLogic= new centro_costo_logic($this->connexion);
		$centro_costoLogic->deepSave($asiento_automatico->getcentro_costo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($asiento_automatico->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
			$asientoautomaticodetalleLogic= new asiento_automatico_detalle_logic($this->connexion);
			$asientoautomaticodetalle->setid_asiento_automatico($asiento_automatico->getId());
			asiento_automatico_detalle_data::save($asientoautomaticodetalle,$this->connexion);
			$asientoautomaticodetalleLogic->deepSave($asientoautomaticodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($asiento_automatico->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($asiento_automatico->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==modulo::$class.'') {
				modulo_data::save($asiento_automatico->getmodulo(),$this->connexion);
				$moduloLogic= new modulo_logic($this->connexion);
				$moduloLogic->deepSave($asiento_automatico->getmodulo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==fuente::$class.'') {
				fuente_data::save($asiento_automatico->getfuente(),$this->connexion);
				$fuenteLogic= new fuente_logic($this->connexion);
				$fuenteLogic->deepSave($asiento_automatico->getfuente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==libro_auxiliar::$class.'') {
				libro_auxiliar_data::save($asiento_automatico->getlibro_auxiliar(),$this->connexion);
				$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
				$libro_auxiliarLogic->deepSave($asiento_automatico->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==centro_costo::$class.'') {
				centro_costo_data::save($asiento_automatico->getcentro_costo(),$this->connexion);
				$centro_costoLogic= new centro_costo_logic($this->connexion);
				$centro_costoLogic->deepSave($asiento_automatico->getcentro_costo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==asiento_automatico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($asiento_automatico->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
					$asientoautomaticodetalleLogic= new asiento_automatico_detalle_logic($this->connexion);
					$asientoautomaticodetalle->setid_asiento_automatico($asiento_automatico->getId());
					asiento_automatico_detalle_data::save($asientoautomaticodetalle,$this->connexion);
					$asientoautomaticodetalleLogic->deepSave($asientoautomaticodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($asiento_automatico->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($asiento_automatico->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			modulo_data::save($asiento_automatico->getmodulo(),$this->connexion);
			$moduloLogic= new modulo_logic($this->connexion);
			$moduloLogic->deepSave($asiento_automatico->getmodulo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==fuente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			fuente_data::save($asiento_automatico->getfuente(),$this->connexion);
			$fuenteLogic= new fuente_logic($this->connexion);
			$fuenteLogic->deepSave($asiento_automatico->getfuente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==libro_auxiliar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			libro_auxiliar_data::save($asiento_automatico->getlibro_auxiliar(),$this->connexion);
			$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
			$libro_auxiliarLogic->deepSave($asiento_automatico->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==centro_costo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			centro_costo_data::save($asiento_automatico->getcentro_costo(),$this->connexion);
			$centro_costoLogic= new centro_costo_logic($this->connexion);
			$centro_costoLogic->deepSave($asiento_automatico->getcentro_costo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
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

			foreach($asiento_automatico->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
				$asientoautomaticodetalleLogic= new asiento_automatico_detalle_logic($this->connexion);
				$asientoautomaticodetalle->setid_asiento_automatico($asiento_automatico->getId());
				asiento_automatico_detalle_data::save($asientoautomaticodetalle,$this->connexion);
				$asientoautomaticodetalleLogic->deepSave($asientoautomaticodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				asiento_automatico_data::save($asiento_automatico, $this->connexion);
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
			
			$this->deepLoad($this->asiento_automatico,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->asiento_automaticos as $asiento_automatico) {
				$this->deepLoad($asiento_automatico,$isDeep,$deepLoadType,$clases);
								
				asiento_automatico_util::refrescarFKDescripciones($this->asiento_automaticos);
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
			
			foreach($this->asiento_automaticos as $asiento_automatico) {
				$this->deepLoad($asiento_automatico,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->asiento_automatico,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->asiento_automaticos as $asiento_automatico) {
				$this->deepSave($asiento_automatico,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->asiento_automaticos as $asiento_automatico) {
				$this->deepSave($asiento_automatico,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(modulo::$class);
				$classes[]=new Classe(fuente::$class);
				$classes[]=new Classe(libro_auxiliar::$class);
				$classes[]=new Classe(centro_costo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==modulo::$class) {
						$classes[]=new Classe(modulo::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==fuente::$class) {
						$classes[]=new Classe(fuente::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==libro_auxiliar::$class) {
						$classes[]=new Classe(libro_auxiliar::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==centro_costo::$class) {
						$classes[]=new Classe(centro_costo::$class);
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
					if($clas->clas==modulo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(modulo::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==fuente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(fuente::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==libro_auxiliar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(libro_auxiliar::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==centro_costo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(centro_costo::$class);
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
				
				$classes[]=new Classe(asiento_automatico_detalle::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==asiento_automatico_detalle::$class) {
						$classes[]=new Classe(asiento_automatico_detalle::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

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

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getasiento_automatico() : ?asiento_automatico {	
		/*
		asiento_automatico_logic_add::checkasiento_automaticoToGet($this->asiento_automatico,$this->datosCliente);
		asiento_automatico_logic_add::updateasiento_automaticoToGet($this->asiento_automatico);
		*/
			
		return $this->asiento_automatico;
	}
		
	public function setasiento_automatico(asiento_automatico $newasiento_automatico) {
		$this->asiento_automatico = $newasiento_automatico;
	}
	
	public function getasiento_automaticos() : array {		
		/*
		asiento_automatico_logic_add::checkasiento_automaticoToGets($this->asiento_automaticos,$this->datosCliente);
		
		foreach ($this->asiento_automaticos as $asiento_automaticoLocal ) {
			asiento_automatico_logic_add::updateasiento_automaticoToGet($asiento_automaticoLocal);
		}
		*/
		
		return $this->asiento_automaticos;
	}
	
	public function setasiento_automaticos(array $newasiento_automaticos) {
		$this->asiento_automaticos = $newasiento_automaticos;
	}
	
	public function getasiento_automaticoDataAccess() : asiento_automatico_data {
		return $this->asiento_automaticoDataAccess;
	}
	
	public function setasiento_automaticoDataAccess(asiento_automatico_data $newasiento_automaticoDataAccess) {
		$this->asiento_automaticoDataAccess = $newasiento_automaticoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        asiento_automatico_carga::$CONTROLLER;;        
		
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
