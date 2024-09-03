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

namespace com\bydan\contabilidad\contabilidad\asiento\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_param_return;

use com\bydan\contabilidad\contabilidad\asiento\presentation\session\asiento_session;

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

use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;
use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\data\asiento_data;

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

use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\entity\asiento_predefinido;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\data\asiento_predefinido_data;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\logic\asiento_predefinido_logic;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;

use com\bydan\contabilidad\contabilidad\documento_contable\business\entity\documento_contable;
use com\bydan\contabilidad\contabilidad\documento_contable\business\data\documento_contable_data;
use com\bydan\contabilidad\contabilidad\documento_contable\business\logic\documento_contable_logic;
use com\bydan\contabilidad\contabilidad\documento_contable\util\documento_contable_util;

use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\data\libro_auxiliar_data;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\logic\libro_auxiliar_logic;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_util;

use com\bydan\contabilidad\contabilidad\fuente\business\entity\fuente;
use com\bydan\contabilidad\contabilidad\fuente\business\data\fuente_data;
use com\bydan\contabilidad\contabilidad\fuente\business\logic\fuente_logic;
use com\bydan\contabilidad\contabilidad\fuente\util\fuente_util;

use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;
use com\bydan\contabilidad\contabilidad\centro_costo\business\data\centro_costo_data;
use com\bydan\contabilidad\contabilidad\centro_costo\business\logic\centro_costo_logic;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\data\estado_data;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL


use com\bydan\contabilidad\contabilidad\asiento_detalle\business\entity\asiento_detalle;
use com\bydan\contabilidad\contabilidad\asiento_detalle\business\data\asiento_detalle_data;
use com\bydan\contabilidad\contabilidad\asiento_detalle\business\logic\asiento_detalle_logic;
use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_util;

//REL DETALLES




class asiento_logic  extends GeneralEntityLogic implements asiento_logicI {	
	/*GENERAL*/
	public asiento_data $asientoDataAccess;
	//public ?asiento_logic_add $asientoLogicAdditional=null;
	public ?asiento $asiento;
	public array $asientos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->asientoDataAccess = new asiento_data();			
			$this->asientos = array();
			$this->asiento = new asiento();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->asientoLogicAdditional = new asiento_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->asientoLogicAdditional==null) {
		//	$this->asientoLogicAdditional=new asiento_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->asientoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->asientoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->asientoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->asientoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->asientos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asientos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->asientos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asientos);
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
		$this->asiento = new asiento();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->asiento=$this->asientoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->asiento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				asiento_util::refrescarFKDescripcion($this->asiento);
			}
						
			//asiento_logic_add::checkasientoToGet($this->asiento,$this->datosCliente);
			//asiento_logic_add::updateasientoToGet($this->asiento);
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
		$this->asiento = new  asiento();
		  		  
        try {		
			$this->asiento=$this->asientoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->asiento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				asiento_util::refrescarFKDescripcion($this->asiento);
			}
			
			//asiento_logic_add::checkasientoToGet($this->asiento,$this->datosCliente);
			//asiento_logic_add::updateasientoToGet($this->asiento);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?asiento {
		$asientoLogic = new  asiento_logic();
		  		  
        try {		
			$asientoLogic->setConnexion($connexion);			
			$asientoLogic->getEntity($id);			
			return $asientoLogic->getasiento();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->asiento = new  asiento();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->asiento=$this->asientoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->asiento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				asiento_util::refrescarFKDescripcion($this->asiento);
			}
			
			//asiento_logic_add::checkasientoToGet($this->asiento,$this->datosCliente);
			//asiento_logic_add::updateasientoToGet($this->asiento);
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
		$this->asiento = new  asiento();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento=$this->asientoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->asiento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				asiento_util::refrescarFKDescripcion($this->asiento);
			}
			
			//asiento_logic_add::checkasientoToGet($this->asiento,$this->datosCliente);
			//asiento_logic_add::updateasientoToGet($this->asiento);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?asiento {
		$asientoLogic = new  asiento_logic();
		  		  
        try {		
			$asientoLogic->setConnexion($connexion);			
			$asientoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $asientoLogic->getasiento();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->asientos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asientos);			
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
		$this->asientos = array();
		  		  
        try {			
			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asientos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->asientos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asientos);
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
		$this->asientos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asientos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$asientoLogic = new  asiento_logic();
		  		  
        try {		
			$asientoLogic->setConnexion($connexion);			
			$asientoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $asientoLogic->getasientos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->asientos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->asientos=$this->asientoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asientos);
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
		$this->asientos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asientos=$this->asientoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asientos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->asientos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asientos=$this->asientoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asientos);
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
		$this->asientos = array();
		  		  
        try {			
			$this->asientos=$this->asientoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_util::refrescarFKDescripciones($this->asientos);
			}	
			
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asientos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->asientos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->asientos=$this->asientoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asientos);
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
		$this->asientos = array();
		  		  
        try {		
			$this->asientos=$this->asientoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asientos);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_Idasiento_predefinidoWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_asiento_predefinido) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_asiento_predefinido= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_asiento_predefinido->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento_predefinido,asiento_util::$ID_ASIENTO_PREDEFINIDO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento_predefinido);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idasiento_predefinido(string $strFinalQuery,Pagination $pagination,?int $id_asiento_predefinido) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_asiento_predefinido= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_asiento_predefinido->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento_predefinido,asiento_util::$ID_ASIENTO_PREDEFINIDO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento_predefinido);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);
		} catch(Exception $e) {
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
			$parameterSelectionGeneralid_centro_costo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_centro_costo,asiento_util::$ID_CENTRO_COSTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_centro_costo);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);

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
			$parameterSelectionGeneralid_centro_costo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_centro_costo,asiento_util::$ID_CENTRO_COSTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_centro_costo);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Iddocumento_contableWithConnection(string $strFinalQuery,Pagination $pagination,int $id_documento_contable) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_documento_contable= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_documento_contable->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_contable,asiento_util::$ID_DOCUMENTO_CONTABLE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_contable);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Iddocumento_contable(string $strFinalQuery,Pagination $pagination,int $id_documento_contable) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_documento_contable= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_documento_contable->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_contable,asiento_util::$ID_DOCUMENTO_CONTABLE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_contable);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Iddocumento_contable_origenWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_documento_contable_origen) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_documento_contable_origen= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_documento_contable_origen->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_contable_origen,asiento_util::$ID_DOCUMENTO_CONTABLE_ORIGEN,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_contable_origen);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Iddocumento_contable_origen(string $strFinalQuery,Pagination $pagination,?int $id_documento_contable_origen) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_documento_contable_origen= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_documento_contable_origen->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_contable_origen,asiento_util::$ID_DOCUMENTO_CONTABLE_ORIGEN,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_contable_origen);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);
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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,asiento_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,asiento_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,asiento_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,asiento_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);
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
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,asiento_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);

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
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,asiento_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);
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
			$parameterSelectionGeneralid_fuente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_fuente,asiento_util::$ID_FUENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_fuente);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);

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
			$parameterSelectionGeneralid_fuente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_fuente,asiento_util::$ID_FUENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_fuente);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);
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
			$parameterSelectionGeneralid_libro_auxiliar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_libro_auxiliar,asiento_util::$ID_LIBRO_AUXILIAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_libro_auxiliar);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);

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
			$parameterSelectionGeneralid_libro_auxiliar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_libro_auxiliar,asiento_util::$ID_LIBRO_AUXILIAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_libro_auxiliar);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);
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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,asiento_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);

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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,asiento_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);
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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,asiento_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);

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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,asiento_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,asiento_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,asiento_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->asientos=$this->asientoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			//asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asientos);
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
						
			//asiento_logic_add::checkasientoToSave($this->asiento,$this->datosCliente,$this->connexion);	       
			//asiento_logic_add::updateasientoToSave($this->asiento);			
			asiento_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->asiento,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->asientoLogicAdditional->checkGeneralEntityToSave($this,$this->asiento,$this->datosCliente,$this->connexion);
			
			
			asiento_data::save($this->asiento, $this->connexion);	    	       	 				
			//asiento_logic_add::checkasientoToSaveAfter($this->asiento,$this->datosCliente,$this->connexion);			
			//$this->asientoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->asiento,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->asiento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->asiento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				asiento_util::refrescarFKDescripcion($this->asiento);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->asiento->getIsDeleted()) {
				$this->asiento=null;
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
						
			/*asiento_logic_add::checkasientoToSave($this->asiento,$this->datosCliente,$this->connexion);*/	        
			//asiento_logic_add::updateasientoToSave($this->asiento);			
			//$this->asientoLogicAdditional->checkGeneralEntityToSave($this,$this->asiento,$this->datosCliente,$this->connexion);			
			asiento_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->asiento,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			asiento_data::save($this->asiento, $this->connexion);	    	       	 						
			/*asiento_logic_add::checkasientoToSaveAfter($this->asiento,$this->datosCliente,$this->connexion);*/			
			//$this->asientoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->asiento,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->asiento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->asiento,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				asiento_util::refrescarFKDescripcion($this->asiento);				
			}
			
			if($this->asiento->getIsDeleted()) {
				$this->asiento=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(asiento $asiento,Connexion $connexion)  {
		$asientoLogic = new  asiento_logic();		  		  
        try {		
			$asientoLogic->setConnexion($connexion);			
			$asientoLogic->setasiento($asiento);			
			$asientoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*asiento_logic_add::checkasientoToSaves($this->asientos,$this->datosCliente,$this->connexion);*/	        	
			//$this->asientoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->asientos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->asientos as $asientoLocal) {				
								
				//asiento_logic_add::updateasientoToSave($asientoLocal);	        	
				asiento_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$asientoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				asiento_data::save($asientoLocal, $this->connexion);				
			}
			
			/*asiento_logic_add::checkasientoToSavesAfter($this->asientos,$this->datosCliente,$this->connexion);*/			
			//$this->asientoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->asientos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_util::refrescarFKDescripciones($this->asientos);
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
			/*asiento_logic_add::checkasientoToSaves($this->asientos,$this->datosCliente,$this->connexion);*/			
			//$this->asientoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->asientos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->asientos as $asientoLocal) {				
								
				//asiento_logic_add::updateasientoToSave($asientoLocal);	        	
				asiento_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$asientoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				asiento_data::save($asientoLocal, $this->connexion);				
			}			
			
			/*asiento_logic_add::checkasientoToSavesAfter($this->asientos,$this->datosCliente,$this->connexion);*/			
			//$this->asientoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->asientos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_util::refrescarFKDescripciones($this->asientos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $asientos,Connexion $connexion)  {
		$asientoLogic = new  asiento_logic();
		  		  
        try {		
			$asientoLogic->setConnexion($connexion);			
			$asientoLogic->setasientos($asientos);			
			$asientoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$asientosAux=array();
		
		foreach($this->asientos as $asiento) {
			if($asiento->getIsDeleted()==false) {
				$asientosAux[]=$asiento;
			}
		}
		
		$this->asientos=$asientosAux;
	}
	
	public function updateToGetsAuxiliar(array &$asientos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->asientos as $asiento) {
				
				$asiento->setid_empresa_Descripcion(asiento_util::getempresaDescripcion($asiento->getempresa()));
				$asiento->setid_sucursal_Descripcion(asiento_util::getsucursalDescripcion($asiento->getsucursal()));
				$asiento->setid_ejercicio_Descripcion(asiento_util::getejercicioDescripcion($asiento->getejercicio()));
				$asiento->setid_periodo_Descripcion(asiento_util::getperiodoDescripcion($asiento->getperiodo()));
				$asiento->setid_usuario_Descripcion(asiento_util::getusuarioDescripcion($asiento->getusuario()));
				$asiento->setid_asiento_predefinido_Descripcion(asiento_util::getasiento_predefinidoDescripcion($asiento->getasiento_predefinido()));
				$asiento->setid_documento_contable_Descripcion(asiento_util::getdocumento_contableDescripcion($asiento->getdocumento_contable()));
				$asiento->setid_libro_auxiliar_Descripcion(asiento_util::getlibro_auxiliarDescripcion($asiento->getlibro_auxiliar()));
				$asiento->setid_fuente_Descripcion(asiento_util::getfuenteDescripcion($asiento->getfuente()));
				$asiento->setid_centro_costo_Descripcion(asiento_util::getcentro_costoDescripcion($asiento->getcentro_costo()));
				$asiento->setid_estado_Descripcion(asiento_util::getestadoDescripcion($asiento->getestado()));
				$asiento->setid_documento_contable_origen_Descripcion(asiento_util::getdocumento_contable_origenDescripcion($asiento->getdocumento_contable_origen()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$asiento_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$asiento_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$asiento_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$asientoForeignKey=new asiento_param_return();//asientoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_asiento_predefinido',$strRecargarFkTipos,',')) {
				$this->cargarCombosasiento_predefinidosFK($this->connexion,$strRecargarFkQuery,$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_documento_contable',$strRecargarFkTipos,',')) {
				$this->cargarCombosdocumento_contablesFK($this->connexion,$strRecargarFkQuery,$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_libro_auxiliar',$strRecargarFkTipos,',')) {
				$this->cargarComboslibro_auxiliarsFK($this->connexion,$strRecargarFkQuery,$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_fuente',$strRecargarFkTipos,',')) {
				$this->cargarCombosfuentesFK($this->connexion,$strRecargarFkQuery,$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_centro_costo',$strRecargarFkTipos,',')) {
				$this->cargarComboscentro_costosFK($this->connexion,$strRecargarFkQuery,$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado',$strRecargarFkTipos,',')) {
				$this->cargarCombosestadosFK($this->connexion,$strRecargarFkQuery,$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_documento_contable_origen',$strRecargarFkTipos,',')) {
				$this->cargarCombosdocumento_contable_origensFK($this->connexion,$strRecargarFkQuery,$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_asiento_predefinido',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosasiento_predefinidosFK($this->connexion,' where id=-1 ',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_documento_contable',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosdocumento_contablesFK($this->connexion,' where id=-1 ',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_libro_auxiliar',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboslibro_auxiliarsFK($this->connexion,' where id=-1 ',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_fuente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosfuentesFK($this->connexion,' where id=-1 ',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_centro_costo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscentro_costosFK($this->connexion,' where id=-1 ',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_estado',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosestadosFK($this->connexion,' where id=-1 ',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_documento_contable_origen',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosdocumento_contable_origensFK($this->connexion,' where id=-1 ',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $asientoForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$asientoForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_session==null) {
			$asiento_session=new asiento_session();
		}
		
		if($asiento_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($asientoForeignKey->idempresaDefaultFK==0) {
					$asientoForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$asientoForeignKey->empresasFK[$empresaLocal->getId()]=asiento_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($asiento_session->bigidempresaActual!=null && $asiento_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($asiento_session->bigidempresaActual);//WithConnection

				$asientoForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=asiento_util::getempresaDescripcion($empresaLogic->getempresa());
				$asientoForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$asientoForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_session==null) {
			$asiento_session=new asiento_session();
		}
		
		if($asiento_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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
				if($asientoForeignKey->idsucursalDefaultFK==0) {
					$asientoForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$asientoForeignKey->sucursalsFK[$sucursalLocal->getId()]=asiento_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($asiento_session->bigidsucursalActual!=null && $asiento_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($asiento_session->bigidsucursalActual);//WithConnection

				$asientoForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=asiento_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$asientoForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$asientoForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_session==null) {
			$asiento_session=new asiento_session();
		}
		
		if($asiento_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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
				if($asientoForeignKey->idejercicioDefaultFK==0) {
					$asientoForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$asientoForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=asiento_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($asiento_session->bigidejercicioActual!=null && $asiento_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($asiento_session->bigidejercicioActual);//WithConnection

				$asientoForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=asiento_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$asientoForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$asientoForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_session==null) {
			$asiento_session=new asiento_session();
		}
		
		if($asiento_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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
				if($asientoForeignKey->idperiodoDefaultFK==0) {
					$asientoForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$asientoForeignKey->periodosFK[$periodoLocal->getId()]=asiento_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($asiento_session->bigidperiodoActual!=null && $asiento_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($asiento_session->bigidperiodoActual);//WithConnection

				$asientoForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=asiento_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$asientoForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$asientoForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_session==null) {
			$asiento_session=new asiento_session();
		}
		
		if($asiento_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($asientoForeignKey->idusuarioDefaultFK==0) {
					$asientoForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$asientoForeignKey->usuariosFK[$usuarioLocal->getId()]=asiento_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($asiento_session->bigidusuarioActual!=null && $asiento_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($asiento_session->bigidusuarioActual);//WithConnection

				$asientoForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=asiento_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$asientoForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosasiento_predefinidosFK($connexion=null,$strRecargarFkQuery='',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$asiento_predefinidoLogic= new asiento_predefinido_logic();
		$pagination= new Pagination();
		$asientoForeignKey->asiento_predefinidosFK=array();

		$asiento_predefinidoLogic->setConnexion($connexion);
		$asiento_predefinidoLogic->getasiento_predefinidoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_session==null) {
			$asiento_session=new asiento_session();
		}
		
		if($asiento_session->bitBusquedaDesdeFKSesionasiento_predefinido!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=asiento_predefinido_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalasiento_predefinido=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalasiento_predefinido=Funciones::GetFinalQueryAppend($finalQueryGlobalasiento_predefinido, '');
				$finalQueryGlobalasiento_predefinido.=asiento_predefinido_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalasiento_predefinido.$strRecargarFkQuery;		

				$asiento_predefinidoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($asiento_predefinidoLogic->getasiento_predefinidos() as $asiento_predefinidoLocal ) {
				if($asientoForeignKey->idasiento_predefinidoDefaultFK==0) {
					$asientoForeignKey->idasiento_predefinidoDefaultFK=$asiento_predefinidoLocal->getId();
				}

				$asientoForeignKey->asiento_predefinidosFK[$asiento_predefinidoLocal->getId()]=asiento_util::getasiento_predefinidoDescripcion($asiento_predefinidoLocal);
			}

		} else {

			if($asiento_session->bigidasiento_predefinidoActual!=null && $asiento_session->bigidasiento_predefinidoActual > 0) {
				$asiento_predefinidoLogic->getEntity($asiento_session->bigidasiento_predefinidoActual);//WithConnection

				$asientoForeignKey->asiento_predefinidosFK[$asiento_predefinidoLogic->getasiento_predefinido()->getId()]=asiento_util::getasiento_predefinidoDescripcion($asiento_predefinidoLogic->getasiento_predefinido());
				$asientoForeignKey->idasiento_predefinidoDefaultFK=$asiento_predefinidoLogic->getasiento_predefinido()->getId();
			}
		}
	}

	public function cargarCombosdocumento_contablesFK($connexion=null,$strRecargarFkQuery='',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$documento_contableLogic= new documento_contable_logic();
		$pagination= new Pagination();
		$asientoForeignKey->documento_contablesFK=array();

		$documento_contableLogic->setConnexion($connexion);
		$documento_contableLogic->getdocumento_contableDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_session==null) {
			$asiento_session=new asiento_session();
		}
		
		if($asiento_session->bitBusquedaDesdeFKSesiondocumento_contable!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=documento_contable_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaldocumento_contable=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaldocumento_contable=Funciones::GetFinalQueryAppend($finalQueryGlobaldocumento_contable, '');
				$finalQueryGlobaldocumento_contable.=documento_contable_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaldocumento_contable.$strRecargarFkQuery;		

				$documento_contableLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($documento_contableLogic->getdocumento_contables() as $documento_contableLocal ) {
				if($asientoForeignKey->iddocumento_contableDefaultFK==0) {
					$asientoForeignKey->iddocumento_contableDefaultFK=$documento_contableLocal->getId();
				}

				$asientoForeignKey->documento_contablesFK[$documento_contableLocal->getId()]=asiento_util::getdocumento_contableDescripcion($documento_contableLocal);
			}

		} else {

			if($asiento_session->bigiddocumento_contableActual!=null && $asiento_session->bigiddocumento_contableActual > 0) {
				$documento_contableLogic->getEntity($asiento_session->bigiddocumento_contableActual);//WithConnection

				$asientoForeignKey->documento_contablesFK[$documento_contableLogic->getdocumento_contable()->getId()]=asiento_util::getdocumento_contableDescripcion($documento_contableLogic->getdocumento_contable());
				$asientoForeignKey->iddocumento_contableDefaultFK=$documento_contableLogic->getdocumento_contable()->getId();
			}
		}
	}

	public function cargarComboslibro_auxiliarsFK($connexion=null,$strRecargarFkQuery='',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$libro_auxiliarLogic= new libro_auxiliar_logic();
		$pagination= new Pagination();
		$asientoForeignKey->libro_auxiliarsFK=array();

		$libro_auxiliarLogic->setConnexion($connexion);
		$libro_auxiliarLogic->getlibro_auxiliarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_session==null) {
			$asiento_session=new asiento_session();
		}
		
		if($asiento_session->bitBusquedaDesdeFKSesionlibro_auxiliar!=true) {
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
				if($asientoForeignKey->idlibro_auxiliarDefaultFK==0) {
					$asientoForeignKey->idlibro_auxiliarDefaultFK=$libro_auxiliarLocal->getId();
				}

				$asientoForeignKey->libro_auxiliarsFK[$libro_auxiliarLocal->getId()]=asiento_util::getlibro_auxiliarDescripcion($libro_auxiliarLocal);
			}

		} else {

			if($asiento_session->bigidlibro_auxiliarActual!=null && $asiento_session->bigidlibro_auxiliarActual > 0) {
				$libro_auxiliarLogic->getEntity($asiento_session->bigidlibro_auxiliarActual);//WithConnection

				$asientoForeignKey->libro_auxiliarsFK[$libro_auxiliarLogic->getlibro_auxiliar()->getId()]=asiento_util::getlibro_auxiliarDescripcion($libro_auxiliarLogic->getlibro_auxiliar());
				$asientoForeignKey->idlibro_auxiliarDefaultFK=$libro_auxiliarLogic->getlibro_auxiliar()->getId();
			}
		}
	}

	public function cargarCombosfuentesFK($connexion=null,$strRecargarFkQuery='',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$fuenteLogic= new fuente_logic();
		$pagination= new Pagination();
		$asientoForeignKey->fuentesFK=array();

		$fuenteLogic->setConnexion($connexion);
		$fuenteLogic->getfuenteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_session==null) {
			$asiento_session=new asiento_session();
		}
		
		if($asiento_session->bitBusquedaDesdeFKSesionfuente!=true) {
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
				if($asientoForeignKey->idfuenteDefaultFK==0) {
					$asientoForeignKey->idfuenteDefaultFK=$fuenteLocal->getId();
				}

				$asientoForeignKey->fuentesFK[$fuenteLocal->getId()]=asiento_util::getfuenteDescripcion($fuenteLocal);
			}

		} else {

			if($asiento_session->bigidfuenteActual!=null && $asiento_session->bigidfuenteActual > 0) {
				$fuenteLogic->getEntity($asiento_session->bigidfuenteActual);//WithConnection

				$asientoForeignKey->fuentesFK[$fuenteLogic->getfuente()->getId()]=asiento_util::getfuenteDescripcion($fuenteLogic->getfuente());
				$asientoForeignKey->idfuenteDefaultFK=$fuenteLogic->getfuente()->getId();
			}
		}
	}

	public function cargarComboscentro_costosFK($connexion=null,$strRecargarFkQuery='',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$centro_costoLogic= new centro_costo_logic();
		$pagination= new Pagination();
		$asientoForeignKey->centro_costosFK=array();

		$centro_costoLogic->setConnexion($connexion);
		$centro_costoLogic->getcentro_costoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_session==null) {
			$asiento_session=new asiento_session();
		}
		
		if($asiento_session->bitBusquedaDesdeFKSesioncentro_costo!=true) {
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
				if($asientoForeignKey->idcentro_costoDefaultFK==0) {
					$asientoForeignKey->idcentro_costoDefaultFK=$centro_costoLocal->getId();
				}

				$asientoForeignKey->centro_costosFK[$centro_costoLocal->getId()]=asiento_util::getcentro_costoDescripcion($centro_costoLocal);
			}

		} else {

			if($asiento_session->bigidcentro_costoActual!=null && $asiento_session->bigidcentro_costoActual > 0) {
				$centro_costoLogic->getEntity($asiento_session->bigidcentro_costoActual);//WithConnection

				$asientoForeignKey->centro_costosFK[$centro_costoLogic->getcentro_costo()->getId()]=asiento_util::getcentro_costoDescripcion($centro_costoLogic->getcentro_costo());
				$asientoForeignKey->idcentro_costoDefaultFK=$centro_costoLogic->getcentro_costo()->getId();
			}
		}
	}

	public function cargarCombosestadosFK($connexion=null,$strRecargarFkQuery='',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$estadoLogic= new estado_logic();
		$pagination= new Pagination();
		$asientoForeignKey->estadosFK=array();

		$estadoLogic->setConnexion($connexion);
		$estadoLogic->getestadoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_session==null) {
			$asiento_session=new asiento_session();
		}
		
		if($asiento_session->bitBusquedaDesdeFKSesionestado!=true) {
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
				if($asientoForeignKey->idestadoDefaultFK==0) {
					$asientoForeignKey->idestadoDefaultFK=$estadoLocal->getId();
				}

				$asientoForeignKey->estadosFK[$estadoLocal->getId()]=asiento_util::getestadoDescripcion($estadoLocal);
			}

		} else {

			if($asiento_session->bigidestadoActual!=null && $asiento_session->bigidestadoActual > 0) {
				$estadoLogic->getEntity($asiento_session->bigidestadoActual);//WithConnection

				$asientoForeignKey->estadosFK[$estadoLogic->getestado()->getId()]=asiento_util::getestadoDescripcion($estadoLogic->getestado());
				$asientoForeignKey->idestadoDefaultFK=$estadoLogic->getestado()->getId();
			}
		}
	}

	public function cargarCombosdocumento_contable_origensFK($connexion=null,$strRecargarFkQuery='',$asientoForeignKey,$asiento_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$documento_contableLogic= new documento_contable_logic();
		$pagination= new Pagination();
		$asientoForeignKey->documento_contable_origensFK=array();

		$documento_contableLogic->setConnexion($connexion);
		$documento_contableLogic->getdocumento_contableDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_session==null) {
			$asiento_session=new asiento_session();
		}
		
		if($asiento_session->bitBusquedaDesdeFKSesiondocumento_contable_origen!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=documento_contable_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaldocumento_contable=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaldocumento_contable=Funciones::GetFinalQueryAppend($finalQueryGlobaldocumento_contable, '');
				$finalQueryGlobaldocumento_contable.=documento_contable_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaldocumento_contable.$strRecargarFkQuery;		

				$documento_contableLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($documento_contableLogic->getdocumento_contables() as $documento_contableLocal ) {
				if($asientoForeignKey->iddocumento_contable_origenDefaultFK==0) {
					$asientoForeignKey->iddocumento_contable_origenDefaultFK=$documento_contableLocal->getId();
				}

				$asientoForeignKey->documento_contable_origensFK[$documento_contableLocal->getId()]=asiento_util::getdocumento_contable_origenDescripcion($documento_contableLocal);
			}

		} else {

			if($asiento_session->bigiddocumento_contable_origenActual!=null && $asiento_session->bigiddocumento_contable_origenActual > 0) {
				$documento_contableLogic->getEntity($asiento_session->bigiddocumento_contable_origenActual);//WithConnection

				$asientoForeignKey->documento_contable_origensFK[$documento_contableLogic->getdocumento_contable()->getId()]=asiento_util::getdocumento_contable_origenDescripcion($documento_contableLogic->getdocumento_contable());
				$asientoForeignKey->iddocumento_contable_origenDefaultFK=$documento_contableLogic->getdocumento_contable()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($asiento,$asientodetalles) {
		$this->saveRelacionesBase($asiento,$asientodetalles,true);
	}

	public function saveRelaciones($asiento,$asientodetalles) {
		$this->saveRelacionesBase($asiento,$asientodetalles,false);
	}

	public function saveRelacionesBase($asiento,$asientodetalles=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$asiento->setasiento_detalles($asientodetalles);
			$this->setasiento($asiento);

			if(true) {

				//asiento_logic_add::updateRelacionesToSave($asiento,$this);

				if(($this->asiento->getIsNew() || $this->asiento->getIsChanged()) && !$this->asiento->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($asientodetalles);

				} else if($this->asiento->getIsDeleted()) {
					$this->saveRelacionesDetalles($asientodetalles);
					$this->save();
				}

				//asiento_logic_add::updateRelacionesToSaveAfter($asiento,$this);

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
	
	
	public function saveRelacionesDetalles($asientodetalles=array()) {
		try {
	

			$idasientoActual=$this->getasiento()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_detalle_carga.php');
			asiento_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$asientodetalleLogic_Desde_asiento=new asiento_detalle_logic();
			$asientodetalleLogic_Desde_asiento->setasiento_detalles($asientodetalles);

			$asientodetalleLogic_Desde_asiento->setConnexion($this->getConnexion());
			$asientodetalleLogic_Desde_asiento->setDatosCliente($this->datosCliente);

			foreach($asientodetalleLogic_Desde_asiento->getasiento_detalles() as $asientodetalle_Desde_asiento) {
				$asientodetalle_Desde_asiento->setid_asiento($idasientoActual);
			}

			$asientodetalleLogic_Desde_asiento->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $asientos,asiento_param_return $asientoParameterGeneral) : asiento_param_return {
		$asientoReturnGeneral=new asiento_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $asientoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $asientos,asiento_param_return $asientoParameterGeneral) : asiento_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$asientoReturnGeneral=new asiento_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $asientoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $asientos,asiento $asiento,asiento_param_return $asientoParameterGeneral,bool $isEsNuevoasiento,array $clases) : asiento_param_return {
		 try {	
			$asientoReturnGeneral=new asiento_param_return();
	
			$asientoReturnGeneral->setasiento($asiento);
			$asientoReturnGeneral->setasientos($asientos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$asientoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $asientoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $asientos,asiento $asiento,asiento_param_return $asientoParameterGeneral,bool $isEsNuevoasiento,array $clases) : asiento_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$asientoReturnGeneral=new asiento_param_return();
	
			$asientoReturnGeneral->setasiento($asiento);
			$asientoReturnGeneral->setasientos($asientos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$asientoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $asientoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $asientos,asiento $asiento,asiento_param_return $asientoParameterGeneral,bool $isEsNuevoasiento,array $clases) : asiento_param_return {
		 try {	
			$asientoReturnGeneral=new asiento_param_return();
	
			$asientoReturnGeneral->setasiento($asiento);
			$asientoReturnGeneral->setasientos($asientos);
			
			
			
			return $asientoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $asientos,asiento $asiento,asiento_param_return $asientoParameterGeneral,bool $isEsNuevoasiento,array $clases) : asiento_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$asientoReturnGeneral=new asiento_param_return();
	
			$asientoReturnGeneral->setasiento($asiento);
			$asientoReturnGeneral->setasientos($asientos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $asientoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,asiento $asiento,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,asiento $asiento,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		asiento_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		asiento_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(asiento $asiento,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//asiento_logic_add::updateasientoToGet($this->asiento);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$asiento->setempresa($this->asientoDataAccess->getempresa($this->connexion,$asiento));
		$asiento->setsucursal($this->asientoDataAccess->getsucursal($this->connexion,$asiento));
		$asiento->setejercicio($this->asientoDataAccess->getejercicio($this->connexion,$asiento));
		$asiento->setperiodo($this->asientoDataAccess->getperiodo($this->connexion,$asiento));
		$asiento->setusuario($this->asientoDataAccess->getusuario($this->connexion,$asiento));
		$asiento->setasiento_predefinido($this->asientoDataAccess->getasiento_predefinido($this->connexion,$asiento));
		$asiento->setdocumento_contable($this->asientoDataAccess->getdocumento_contable($this->connexion,$asiento));
		$asiento->setlibro_auxiliar($this->asientoDataAccess->getlibro_auxiliar($this->connexion,$asiento));
		$asiento->setfuente($this->asientoDataAccess->getfuente($this->connexion,$asiento));
		$asiento->setcentro_costo($this->asientoDataAccess->getcentro_costo($this->connexion,$asiento));
		$asiento->setestado($this->asientoDataAccess->getestado($this->connexion,$asiento));
		$asiento->setdocumento_contable_origen($this->asientoDataAccess->getdocumento_contable_origen($this->connexion,$asiento));
		$asiento->setasiento_detalles($this->asientoDataAccess->getasiento_detalles($this->connexion,$asiento));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$asiento->setempresa($this->asientoDataAccess->getempresa($this->connexion,$asiento));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$asiento->setsucursal($this->asientoDataAccess->getsucursal($this->connexion,$asiento));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$asiento->setejercicio($this->asientoDataAccess->getejercicio($this->connexion,$asiento));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$asiento->setperiodo($this->asientoDataAccess->getperiodo($this->connexion,$asiento));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$asiento->setusuario($this->asientoDataAccess->getusuario($this->connexion,$asiento));
				continue;
			}

			if($clas->clas==asiento_predefinido::$class.'') {
				$asiento->setasiento_predefinido($this->asientoDataAccess->getasiento_predefinido($this->connexion,$asiento));
				continue;
			}

			if($clas->clas==documento_contable::$class.'') {
				$asiento->setdocumento_contable($this->asientoDataAccess->getdocumento_contable($this->connexion,$asiento));
				continue;
			}

			if($clas->clas==libro_auxiliar::$class.'') {
				$asiento->setlibro_auxiliar($this->asientoDataAccess->getlibro_auxiliar($this->connexion,$asiento));
				continue;
			}

			if($clas->clas==fuente::$class.'') {
				$asiento->setfuente($this->asientoDataAccess->getfuente($this->connexion,$asiento));
				continue;
			}

			if($clas->clas==centro_costo::$class.'') {
				$asiento->setcentro_costo($this->asientoDataAccess->getcentro_costo($this->connexion,$asiento));
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$asiento->setestado($this->asientoDataAccess->getestado($this->connexion,$asiento));
				continue;
			}

			if($clas->clas==documento_contable::$class.'_origen') {
				$asiento->setdocumento_contable_origen($this->asientoDataAccess->getdocumento_contable_origen($this->connexion,$asiento));
				continue;
			}

			if($clas->clas==asiento_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$asiento->setasiento_detalles($this->asientoDataAccess->getasiento_detalles($this->connexion,$asiento));

				if($this->isConDeep) {
					$asientodetalleLogic= new asiento_detalle_logic($this->connexion);
					$asientodetalleLogic->setasiento_detalles($asiento->getasiento_detalles());
					$classesLocal=asiento_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$asientodetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					asiento_detalle_util::refrescarFKDescripciones($asientodetalleLogic->getasiento_detalles());
					$asiento->setasiento_detalles($asientodetalleLogic->getasiento_detalles());
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
			$asiento->setempresa($this->asientoDataAccess->getempresa($this->connexion,$asiento));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setsucursal($this->asientoDataAccess->getsucursal($this->connexion,$asiento));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setejercicio($this->asientoDataAccess->getejercicio($this->connexion,$asiento));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setperiodo($this->asientoDataAccess->getperiodo($this->connexion,$asiento));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setusuario($this->asientoDataAccess->getusuario($this->connexion,$asiento));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setasiento_predefinido($this->asientoDataAccess->getasiento_predefinido($this->connexion,$asiento));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_contable::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setdocumento_contable($this->asientoDataAccess->getdocumento_contable($this->connexion,$asiento));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==libro_auxiliar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setlibro_auxiliar($this->asientoDataAccess->getlibro_auxiliar($this->connexion,$asiento));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==fuente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setfuente($this->asientoDataAccess->getfuente($this->connexion,$asiento));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==centro_costo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setcentro_costo($this->asientoDataAccess->getcentro_costo($this->connexion,$asiento));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setestado($this->asientoDataAccess->getestado($this->connexion,$asiento));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_contable::$class.'_origen') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setdocumento_contable_origen($this->asientoDataAccess->getdocumento_contable_origen($this->connexion,$asiento));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_detalle::$class);
			$asiento->setasiento_detalles($this->asientoDataAccess->getasiento_detalles($this->connexion,$asiento));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$asiento->setempresa($this->asientoDataAccess->getempresa($this->connexion,$asiento));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($asiento->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$asiento->setsucursal($this->asientoDataAccess->getsucursal($this->connexion,$asiento));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($asiento->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$asiento->setejercicio($this->asientoDataAccess->getejercicio($this->connexion,$asiento));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($asiento->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$asiento->setperiodo($this->asientoDataAccess->getperiodo($this->connexion,$asiento));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($asiento->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$asiento->setusuario($this->asientoDataAccess->getusuario($this->connexion,$asiento));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($asiento->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$asiento->setasiento_predefinido($this->asientoDataAccess->getasiento_predefinido($this->connexion,$asiento));
		$asiento_predefinidoLogic= new asiento_predefinido_logic($this->connexion);
		$asiento_predefinidoLogic->deepLoad($asiento->getasiento_predefinido(),$isDeep,$deepLoadType,$clases);
				
		$asiento->setdocumento_contable($this->asientoDataAccess->getdocumento_contable($this->connexion,$asiento));
		$documento_contableLogic= new documento_contable_logic($this->connexion);
		$documento_contableLogic->deepLoad($asiento->getdocumento_contable(),$isDeep,$deepLoadType,$clases);
				
		$asiento->setlibro_auxiliar($this->asientoDataAccess->getlibro_auxiliar($this->connexion,$asiento));
		$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
		$libro_auxiliarLogic->deepLoad($asiento->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases);
				
		$asiento->setfuente($this->asientoDataAccess->getfuente($this->connexion,$asiento));
		$fuenteLogic= new fuente_logic($this->connexion);
		$fuenteLogic->deepLoad($asiento->getfuente(),$isDeep,$deepLoadType,$clases);
				
		$asiento->setcentro_costo($this->asientoDataAccess->getcentro_costo($this->connexion,$asiento));
		$centro_costoLogic= new centro_costo_logic($this->connexion);
		$centro_costoLogic->deepLoad($asiento->getcentro_costo(),$isDeep,$deepLoadType,$clases);
				
		$asiento->setestado($this->asientoDataAccess->getestado($this->connexion,$asiento));
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepLoad($asiento->getestado(),$isDeep,$deepLoadType,$clases);
				
		$asiento->setdocumento_contable_origen($this->asientoDataAccess->getdocumento_contable_origen($this->connexion,$asiento));
		$documento_contable_origenLogic= new documento_contable_logic($this->connexion);
		$documento_contable_origenLogic->deepLoad($asiento->getdocumento_contable_origen(),$isDeep,$deepLoadType,$clases);
				

		$asiento->setasiento_detalles($this->asientoDataAccess->getasiento_detalles($this->connexion,$asiento));

		foreach($asiento->getasiento_detalles() as $asientodetalle) {
			$asientodetalleLogic= new asiento_detalle_logic($this->connexion);
			$asientodetalleLogic->deepLoad($asientodetalle,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$asiento->setempresa($this->asientoDataAccess->getempresa($this->connexion,$asiento));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($asiento->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$asiento->setsucursal($this->asientoDataAccess->getsucursal($this->connexion,$asiento));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($asiento->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$asiento->setejercicio($this->asientoDataAccess->getejercicio($this->connexion,$asiento));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($asiento->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$asiento->setperiodo($this->asientoDataAccess->getperiodo($this->connexion,$asiento));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($asiento->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$asiento->setusuario($this->asientoDataAccess->getusuario($this->connexion,$asiento));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($asiento->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==asiento_predefinido::$class.'') {
				$asiento->setasiento_predefinido($this->asientoDataAccess->getasiento_predefinido($this->connexion,$asiento));
				$asiento_predefinidoLogic= new asiento_predefinido_logic($this->connexion);
				$asiento_predefinidoLogic->deepLoad($asiento->getasiento_predefinido(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==documento_contable::$class.'') {
				$asiento->setdocumento_contable($this->asientoDataAccess->getdocumento_contable($this->connexion,$asiento));
				$documento_contableLogic= new documento_contable_logic($this->connexion);
				$documento_contableLogic->deepLoad($asiento->getdocumento_contable(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==libro_auxiliar::$class.'') {
				$asiento->setlibro_auxiliar($this->asientoDataAccess->getlibro_auxiliar($this->connexion,$asiento));
				$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
				$libro_auxiliarLogic->deepLoad($asiento->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==fuente::$class.'') {
				$asiento->setfuente($this->asientoDataAccess->getfuente($this->connexion,$asiento));
				$fuenteLogic= new fuente_logic($this->connexion);
				$fuenteLogic->deepLoad($asiento->getfuente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==centro_costo::$class.'') {
				$asiento->setcentro_costo($this->asientoDataAccess->getcentro_costo($this->connexion,$asiento));
				$centro_costoLogic= new centro_costo_logic($this->connexion);
				$centro_costoLogic->deepLoad($asiento->getcentro_costo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$asiento->setestado($this->asientoDataAccess->getestado($this->connexion,$asiento));
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepLoad($asiento->getestado(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==documento_contable::$class.'_origen') {
				$asiento->setdocumento_contable_origen($this->asientoDataAccess->getdocumento_contable_origen($this->connexion,$asiento));
				$documento_contableLogic= new documento_contable_logic($this->connexion);
				$documento_contableLogic->deepLoad($asiento->getdocumento_contable_origen(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==asiento_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$asiento->setasiento_detalles($this->asientoDataAccess->getasiento_detalles($this->connexion,$asiento));

				foreach($asiento->getasiento_detalles() as $asientodetalle) {
					$asientodetalleLogic= new asiento_detalle_logic($this->connexion);
					$asientodetalleLogic->deepLoad($asientodetalle,$isDeep,$deepLoadType,$clases);
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
			$asiento->setempresa($this->asientoDataAccess->getempresa($this->connexion,$asiento));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($asiento->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setsucursal($this->asientoDataAccess->getsucursal($this->connexion,$asiento));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($asiento->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setejercicio($this->asientoDataAccess->getejercicio($this->connexion,$asiento));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($asiento->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setperiodo($this->asientoDataAccess->getperiodo($this->connexion,$asiento));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($asiento->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setusuario($this->asientoDataAccess->getusuario($this->connexion,$asiento));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($asiento->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setasiento_predefinido($this->asientoDataAccess->getasiento_predefinido($this->connexion,$asiento));
			$asiento_predefinidoLogic= new asiento_predefinido_logic($this->connexion);
			$asiento_predefinidoLogic->deepLoad($asiento->getasiento_predefinido(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_contable::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setdocumento_contable($this->asientoDataAccess->getdocumento_contable($this->connexion,$asiento));
			$documento_contableLogic= new documento_contable_logic($this->connexion);
			$documento_contableLogic->deepLoad($asiento->getdocumento_contable(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==libro_auxiliar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setlibro_auxiliar($this->asientoDataAccess->getlibro_auxiliar($this->connexion,$asiento));
			$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
			$libro_auxiliarLogic->deepLoad($asiento->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==fuente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setfuente($this->asientoDataAccess->getfuente($this->connexion,$asiento));
			$fuenteLogic= new fuente_logic($this->connexion);
			$fuenteLogic->deepLoad($asiento->getfuente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==centro_costo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setcentro_costo($this->asientoDataAccess->getcentro_costo($this->connexion,$asiento));
			$centro_costoLogic= new centro_costo_logic($this->connexion);
			$centro_costoLogic->deepLoad($asiento->getcentro_costo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setestado($this->asientoDataAccess->getestado($this->connexion,$asiento));
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepLoad($asiento->getestado(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_contable::$class.'_origen') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento->setdocumento_contable_origen($this->asientoDataAccess->getdocumento_contable_origen($this->connexion,$asiento));
			$documento_contableLogic= new documento_contable_logic($this->connexion);
			$documento_contableLogic->deepLoad($asiento->getdocumento_contable_origen(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_detalle::$class);
			$asiento->setasiento_detalles($this->asientoDataAccess->getasiento_detalles($this->connexion,$asiento));

			foreach($asiento->getasiento_detalles() as $asientodetalle) {
				$asientodetalleLogic= new asiento_detalle_logic($this->connexion);
				$asientodetalleLogic->deepLoad($asientodetalle,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(asiento $asiento,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//asiento_logic_add::updateasientoToSave($this->asiento);			
			
			if(!$paraDeleteCascade) {				
				asiento_data::save($asiento, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($asiento->getempresa(),$this->connexion);
		sucursal_data::save($asiento->getsucursal(),$this->connexion);
		ejercicio_data::save($asiento->getejercicio(),$this->connexion);
		periodo_data::save($asiento->getperiodo(),$this->connexion);
		usuario_data::save($asiento->getusuario(),$this->connexion);
		asiento_predefinido_data::save($asiento->getasiento_predefinido(),$this->connexion);
		documento_contable_data::save($asiento->getdocumento_contable(),$this->connexion);
		libro_auxiliar_data::save($asiento->getlibro_auxiliar(),$this->connexion);
		fuente_data::save($asiento->getfuente(),$this->connexion);
		centro_costo_data::save($asiento->getcentro_costo(),$this->connexion);
		estado_data::save($asiento->getestado(),$this->connexion);
		documento_contable_data::save($asiento->getdocumento_contable_origen(),$this->connexion);

		foreach($asiento->getasiento_detalles() as $asientodetalle) {
			$asientodetalle->setid_asiento($asiento->getId());
			asiento_detalle_data::save($asientodetalle,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($asiento->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($asiento->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($asiento->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($asiento->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($asiento->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==asiento_predefinido::$class.'') {
				asiento_predefinido_data::save($asiento->getasiento_predefinido(),$this->connexion);
				continue;
			}

			if($clas->clas==documento_contable::$class.'') {
				documento_contable_data::save($asiento->getdocumento_contable(),$this->connexion);
				continue;
			}

			if($clas->clas==libro_auxiliar::$class.'') {
				libro_auxiliar_data::save($asiento->getlibro_auxiliar(),$this->connexion);
				continue;
			}

			if($clas->clas==fuente::$class.'') {
				fuente_data::save($asiento->getfuente(),$this->connexion);
				continue;
			}

			if($clas->clas==centro_costo::$class.'') {
				centro_costo_data::save($asiento->getcentro_costo(),$this->connexion);
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($asiento->getestado(),$this->connexion);
				continue;
			}

			if($clas->clas==documento_contable::$class.'_origen') {
				documento_contable_data::save($asiento->getdocumento_contable_origen(),$this->connexion);
				continue;
			}


			if($clas->clas==asiento_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($asiento->getasiento_detalles() as $asientodetalle) {
					$asientodetalle->setid_asiento($asiento->getId());
					asiento_detalle_data::save($asientodetalle,$this->connexion);
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
			empresa_data::save($asiento->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($asiento->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($asiento->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($asiento->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($asiento->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_predefinido_data::save($asiento->getasiento_predefinido(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_contable::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_contable_data::save($asiento->getdocumento_contable(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==libro_auxiliar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			libro_auxiliar_data::save($asiento->getlibro_auxiliar(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==fuente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			fuente_data::save($asiento->getfuente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==centro_costo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			centro_costo_data::save($asiento->getcentro_costo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($asiento->getestado(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_contable::$class.'_origen') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_contable_data::save($asiento->getdocumento_contable_origen(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_detalle::$class);

			foreach($asiento->getasiento_detalles() as $asientodetalle) {
				$asientodetalle->setid_asiento($asiento->getId());
				asiento_detalle_data::save($asientodetalle,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($asiento->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($asiento->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($asiento->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($asiento->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($asiento->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($asiento->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($asiento->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($asiento->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($asiento->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($asiento->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		asiento_predefinido_data::save($asiento->getasiento_predefinido(),$this->connexion);
		$asiento_predefinidoLogic= new asiento_predefinido_logic($this->connexion);
		$asiento_predefinidoLogic->deepSave($asiento->getasiento_predefinido(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		documento_contable_data::save($asiento->getdocumento_contable(),$this->connexion);
		$documento_contableLogic= new documento_contable_logic($this->connexion);
		$documento_contableLogic->deepSave($asiento->getdocumento_contable(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		libro_auxiliar_data::save($asiento->getlibro_auxiliar(),$this->connexion);
		$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
		$libro_auxiliarLogic->deepSave($asiento->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		fuente_data::save($asiento->getfuente(),$this->connexion);
		$fuenteLogic= new fuente_logic($this->connexion);
		$fuenteLogic->deepSave($asiento->getfuente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		centro_costo_data::save($asiento->getcentro_costo(),$this->connexion);
		$centro_costoLogic= new centro_costo_logic($this->connexion);
		$centro_costoLogic->deepSave($asiento->getcentro_costo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		estado_data::save($asiento->getestado(),$this->connexion);
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepSave($asiento->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		documento_contable_data::save($asiento->getdocumento_contable_origen(),$this->connexion);
		$documento_contable_origenLogic= new documento_contable_logic($this->connexion);
		$documento_contable_origenLogic->deepSave($asiento->getdocumento_contable_origen(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($asiento->getasiento_detalles() as $asientodetalle) {
			$asientodetalleLogic= new asiento_detalle_logic($this->connexion);
			$asientodetalle->setid_asiento($asiento->getId());
			asiento_detalle_data::save($asientodetalle,$this->connexion);
			$asientodetalleLogic->deepSave($asientodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($asiento->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($asiento->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($asiento->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($asiento->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($asiento->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($asiento->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($asiento->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($asiento->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($asiento->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($asiento->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==asiento_predefinido::$class.'') {
				asiento_predefinido_data::save($asiento->getasiento_predefinido(),$this->connexion);
				$asiento_predefinidoLogic= new asiento_predefinido_logic($this->connexion);
				$asiento_predefinidoLogic->deepSave($asiento->getasiento_predefinido(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==documento_contable::$class.'') {
				documento_contable_data::save($asiento->getdocumento_contable(),$this->connexion);
				$documento_contableLogic= new documento_contable_logic($this->connexion);
				$documento_contableLogic->deepSave($asiento->getdocumento_contable(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==libro_auxiliar::$class.'') {
				libro_auxiliar_data::save($asiento->getlibro_auxiliar(),$this->connexion);
				$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
				$libro_auxiliarLogic->deepSave($asiento->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==fuente::$class.'') {
				fuente_data::save($asiento->getfuente(),$this->connexion);
				$fuenteLogic= new fuente_logic($this->connexion);
				$fuenteLogic->deepSave($asiento->getfuente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==centro_costo::$class.'') {
				centro_costo_data::save($asiento->getcentro_costo(),$this->connexion);
				$centro_costoLogic= new centro_costo_logic($this->connexion);
				$centro_costoLogic->deepSave($asiento->getcentro_costo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($asiento->getestado(),$this->connexion);
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepSave($asiento->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==documento_contable::$class.'_origen') {
				documento_contable_data::save($asiento->getdocumento_contable_origen(),$this->connexion);
				$documento_contableLogic= new documento_contable_logic($this->connexion);
				$documento_contableLogic->deepSave($asiento->getdocumento_contable_origen(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==asiento_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($asiento->getasiento_detalles() as $asientodetalle) {
					$asientodetalleLogic= new asiento_detalle_logic($this->connexion);
					$asientodetalle->setid_asiento($asiento->getId());
					asiento_detalle_data::save($asientodetalle,$this->connexion);
					$asientodetalleLogic->deepSave($asientodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($asiento->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($asiento->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($asiento->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($asiento->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($asiento->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($asiento->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($asiento->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($asiento->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($asiento->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($asiento->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_predefinido_data::save($asiento->getasiento_predefinido(),$this->connexion);
			$asiento_predefinidoLogic= new asiento_predefinido_logic($this->connexion);
			$asiento_predefinidoLogic->deepSave($asiento->getasiento_predefinido(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_contable::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_contable_data::save($asiento->getdocumento_contable(),$this->connexion);
			$documento_contableLogic= new documento_contable_logic($this->connexion);
			$documento_contableLogic->deepSave($asiento->getdocumento_contable(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==libro_auxiliar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			libro_auxiliar_data::save($asiento->getlibro_auxiliar(),$this->connexion);
			$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
			$libro_auxiliarLogic->deepSave($asiento->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==fuente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			fuente_data::save($asiento->getfuente(),$this->connexion);
			$fuenteLogic= new fuente_logic($this->connexion);
			$fuenteLogic->deepSave($asiento->getfuente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==centro_costo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			centro_costo_data::save($asiento->getcentro_costo(),$this->connexion);
			$centro_costoLogic= new centro_costo_logic($this->connexion);
			$centro_costoLogic->deepSave($asiento->getcentro_costo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($asiento->getestado(),$this->connexion);
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepSave($asiento->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_contable::$class.'_origen') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_contable_data::save($asiento->getdocumento_contable(),$this->connexion);
			$documento_contableLogic= new documento_contable_logic($this->connexion);
			$documento_contableLogic->deepSave($asiento->getdocumento_contable_origen(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_detalle::$class);

			foreach($asiento->getasiento_detalles() as $asientodetalle) {
				$asientodetalleLogic= new asiento_detalle_logic($this->connexion);
				$asientodetalle->setid_asiento($asiento->getId());
				asiento_detalle_data::save($asientodetalle,$this->connexion);
				$asientodetalleLogic->deepSave($asientodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				asiento_data::save($asiento, $this->connexion);
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
			
			$this->deepLoad($this->asiento,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->asientos as $asiento) {
				$this->deepLoad($asiento,$isDeep,$deepLoadType,$clases);
								
				asiento_util::refrescarFKDescripciones($this->asientos);
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
			
			foreach($this->asientos as $asiento) {
				$this->deepLoad($asiento,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->asiento,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->asientos as $asiento) {
				$this->deepSave($asiento,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->asientos as $asiento) {
				$this->deepSave($asiento,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(asiento_predefinido::$class);
				$classes[]=new Classe(documento_contable::$class);
				$classes[]=new Classe(libro_auxiliar::$class);
				$classes[]=new Classe(fuente::$class);
				$classes[]=new Classe(centro_costo::$class);
				$classes[]=new Classe(estado::$class);
				$classes[]=new Classe(documento_contable::$class);
				
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
					if($clas->clas==asiento_predefinido::$class) {
						$classes[]=new Classe(asiento_predefinido::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==documento_contable::$class) {
						$classes[]=new Classe(documento_contable::$class);
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
					if($clas->clas==fuente::$class) {
						$classes[]=new Classe(fuente::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==centro_costo::$class) {
						$classes[]=new Classe(centro_costo::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==estado::$class) {
						$classes[]=new Classe(estado::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==documento_contable::$class) {
						$classes[]=new Classe(documento_contable::$class);
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
					if($clas->clas==asiento_predefinido::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento_predefinido::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==documento_contable::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(documento_contable::$class);
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
					if($clas->clas==centro_costo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(centro_costo::$class);
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

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==documento_contable::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(documento_contable::$class);
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
				
				$classes[]=new Classe(asiento_detalle::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==asiento_detalle::$class) {
						$classes[]=new Classe(asiento_detalle::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==asiento_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento_detalle::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getasiento() : ?asiento {	
		/*
		asiento_logic_add::checkasientoToGet($this->asiento,$this->datosCliente);
		asiento_logic_add::updateasientoToGet($this->asiento);
		*/
			
		return $this->asiento;
	}
		
	public function setasiento(asiento $newasiento) {
		$this->asiento = $newasiento;
	}
	
	public function getasientos() : array {		
		/*
		asiento_logic_add::checkasientoToGets($this->asientos,$this->datosCliente);
		
		foreach ($this->asientos as $asientoLocal ) {
			asiento_logic_add::updateasientoToGet($asientoLocal);
		}
		*/
		
		return $this->asientos;
	}
	
	public function setasientos(array $newasientos) {
		$this->asientos = $newasientos;
	}
	
	public function getasientoDataAccess() : asiento_data {
		return $this->asientoDataAccess;
	}
	
	public function setasientoDataAccess(asiento_data $newasientoDataAccess) {
		$this->asientoDataAccess = $newasientoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        asiento_carga::$CONTROLLER;;        
		
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
