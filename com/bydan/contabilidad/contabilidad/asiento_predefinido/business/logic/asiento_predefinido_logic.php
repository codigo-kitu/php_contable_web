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

namespace com\bydan\contabilidad\contabilidad\asiento_predefinido\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_param_return;

use com\bydan\contabilidad\contabilidad\asiento_predefinido\presentation\session\asiento_predefinido_session;

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

use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\entity\asiento_predefinido;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\data\asiento_predefinido_data;

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

use com\bydan\contabilidad\contabilidad\documento_contable\business\entity\documento_contable;
use com\bydan\contabilidad\contabilidad\documento_contable\business\data\documento_contable_data;
use com\bydan\contabilidad\contabilidad\documento_contable\business\logic\documento_contable_logic;
use com\bydan\contabilidad\contabilidad\documento_contable\util\documento_contable_util;

//REL


use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\business\entity\asiento_predefinido_detalle;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\business\data\asiento_predefinido_detalle_data;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\business\logic\asiento_predefinido_detalle_logic;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_util;

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\data\asiento_data;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

//REL DETALLES

use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_carga;



class asiento_predefinido_logic  extends GeneralEntityLogic implements asiento_predefinido_logicI {	
	/*GENERAL*/
	public asiento_predefinido_data $asiento_predefinidoDataAccess;
	//public ?asiento_predefinido_logic_add $asiento_predefinidoLogicAdditional=null;
	public ?asiento_predefinido $asiento_predefinido;
	public array $asiento_predefinidos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->asiento_predefinidoDataAccess = new asiento_predefinido_data();			
			$this->asiento_predefinidos = array();
			$this->asiento_predefinido = new asiento_predefinido();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->asiento_predefinidoLogicAdditional = new asiento_predefinido_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->asiento_predefinidoLogicAdditional==null) {
		//	$this->asiento_predefinidoLogicAdditional=new asiento_predefinido_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->asiento_predefinidoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->asiento_predefinidoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->asiento_predefinidoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->asiento_predefinidoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->asiento_predefinidos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->asiento_predefinidos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);
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
		$this->asiento_predefinido = new asiento_predefinido();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->asiento_predefinido=$this->asiento_predefinidoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->asiento_predefinido,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				asiento_predefinido_util::refrescarFKDescripcion($this->asiento_predefinido);
			}
						
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGet($this->asiento_predefinido,$this->datosCliente);
			//asiento_predefinido_logic_add::updateasiento_predefinidoToGet($this->asiento_predefinido);
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
		$this->asiento_predefinido = new  asiento_predefinido();
		  		  
        try {		
			$this->asiento_predefinido=$this->asiento_predefinidoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->asiento_predefinido,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				asiento_predefinido_util::refrescarFKDescripcion($this->asiento_predefinido);
			}
			
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGet($this->asiento_predefinido,$this->datosCliente);
			//asiento_predefinido_logic_add::updateasiento_predefinidoToGet($this->asiento_predefinido);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?asiento_predefinido {
		$asiento_predefinidoLogic = new  asiento_predefinido_logic();
		  		  
        try {		
			$asiento_predefinidoLogic->setConnexion($connexion);			
			$asiento_predefinidoLogic->getEntity($id);			
			return $asiento_predefinidoLogic->getasiento_predefinido();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->asiento_predefinido = new  asiento_predefinido();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->asiento_predefinido=$this->asiento_predefinidoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->asiento_predefinido,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				asiento_predefinido_util::refrescarFKDescripcion($this->asiento_predefinido);
			}
			
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGet($this->asiento_predefinido,$this->datosCliente);
			//asiento_predefinido_logic_add::updateasiento_predefinidoToGet($this->asiento_predefinido);
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
		$this->asiento_predefinido = new  asiento_predefinido();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_predefinido=$this->asiento_predefinidoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->asiento_predefinido,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				asiento_predefinido_util::refrescarFKDescripcion($this->asiento_predefinido);
			}
			
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGet($this->asiento_predefinido,$this->datosCliente);
			//asiento_predefinido_logic_add::updateasiento_predefinidoToGet($this->asiento_predefinido);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?asiento_predefinido {
		$asiento_predefinidoLogic = new  asiento_predefinido_logic();
		  		  
        try {		
			$asiento_predefinidoLogic->setConnexion($connexion);			
			$asiento_predefinidoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $asiento_predefinidoLogic->getasiento_predefinido();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->asiento_predefinidos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);			
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
		$this->asiento_predefinidos = array();
		  		  
        try {			
			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->asiento_predefinidos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);
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
		$this->asiento_predefinidos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$asiento_predefinidoLogic = new  asiento_predefinido_logic();
		  		  
        try {		
			$asiento_predefinidoLogic->setConnexion($connexion);			
			$asiento_predefinidoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $asiento_predefinidoLogic->getasiento_predefinidos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->asiento_predefinidos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);
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
		$this->asiento_predefinidos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->asiento_predefinidos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);
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
		$this->asiento_predefinidos = array();
		  		  
        try {			
			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}	
			
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->asiento_predefinidos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);
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
		$this->asiento_predefinidos = array();
		  		  
        try {		
			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);

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
			$parameterSelectionGeneralid_centro_costo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_centro_costo,asiento_predefinido_util::$ID_CENTRO_COSTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_centro_costo);

			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);

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
			$parameterSelectionGeneralid_centro_costo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_centro_costo,asiento_predefinido_util::$ID_CENTRO_COSTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_centro_costo);

			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);
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
			$parameterSelectionGeneralid_documento_contable->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_contable,asiento_predefinido_util::$ID_DOCUMENTO_CONTABLE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_contable);

			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);

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
			$parameterSelectionGeneralid_documento_contable->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_contable,asiento_predefinido_util::$ID_DOCUMENTO_CONTABLE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_contable);

			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);
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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,asiento_predefinido_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,asiento_predefinido_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,asiento_predefinido_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,asiento_predefinido_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);
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
			$parameterSelectionGeneralid_fuente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_fuente,asiento_predefinido_util::$ID_FUENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_fuente);

			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);

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
			$parameterSelectionGeneralid_fuente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_fuente,asiento_predefinido_util::$ID_FUENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_fuente);

			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);
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
			$parameterSelectionGeneralid_libro_auxiliar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_libro_auxiliar,asiento_predefinido_util::$ID_LIBRO_AUXILIAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_libro_auxiliar);

			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);

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
			$parameterSelectionGeneralid_libro_auxiliar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_libro_auxiliar,asiento_predefinido_util::$ID_LIBRO_AUXILIAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_libro_auxiliar);

			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);
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
			$parameterSelectionGeneralid_modulo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_modulo,asiento_predefinido_util::$ID_MODULO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_modulo);

			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);

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
			$parameterSelectionGeneralid_modulo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_modulo,asiento_predefinido_util::$ID_MODULO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_modulo);

			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);
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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,asiento_predefinido_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);

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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,asiento_predefinido_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);
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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,asiento_predefinido_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);

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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,asiento_predefinido_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,asiento_predefinido_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,asiento_predefinido_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->asiento_predefinidos=$this->asiento_predefinidoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			//asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->asiento_predefinidos);
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
						
			//asiento_predefinido_logic_add::checkasiento_predefinidoToSave($this->asiento_predefinido,$this->datosCliente,$this->connexion);	       
			//asiento_predefinido_logic_add::updateasiento_predefinidoToSave($this->asiento_predefinido);			
			asiento_predefinido_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->asiento_predefinido,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->asiento_predefinidoLogicAdditional->checkGeneralEntityToSave($this,$this->asiento_predefinido,$this->datosCliente,$this->connexion);
			
			
			asiento_predefinido_data::save($this->asiento_predefinido, $this->connexion);	    	       	 				
			//asiento_predefinido_logic_add::checkasiento_predefinidoToSaveAfter($this->asiento_predefinido,$this->datosCliente,$this->connexion);			
			//$this->asiento_predefinidoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->asiento_predefinido,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->asiento_predefinido,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->asiento_predefinido,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				asiento_predefinido_util::refrescarFKDescripcion($this->asiento_predefinido);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->asiento_predefinido->getIsDeleted()) {
				$this->asiento_predefinido=null;
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
						
			/*asiento_predefinido_logic_add::checkasiento_predefinidoToSave($this->asiento_predefinido,$this->datosCliente,$this->connexion);*/	        
			//asiento_predefinido_logic_add::updateasiento_predefinidoToSave($this->asiento_predefinido);			
			//$this->asiento_predefinidoLogicAdditional->checkGeneralEntityToSave($this,$this->asiento_predefinido,$this->datosCliente,$this->connexion);			
			asiento_predefinido_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->asiento_predefinido,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			asiento_predefinido_data::save($this->asiento_predefinido, $this->connexion);	    	       	 						
			/*asiento_predefinido_logic_add::checkasiento_predefinidoToSaveAfter($this->asiento_predefinido,$this->datosCliente,$this->connexion);*/			
			//$this->asiento_predefinidoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->asiento_predefinido,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->asiento_predefinido,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->asiento_predefinido,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				asiento_predefinido_util::refrescarFKDescripcion($this->asiento_predefinido);				
			}
			
			if($this->asiento_predefinido->getIsDeleted()) {
				$this->asiento_predefinido=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(asiento_predefinido $asiento_predefinido,Connexion $connexion)  {
		$asiento_predefinidoLogic = new  asiento_predefinido_logic();		  		  
        try {		
			$asiento_predefinidoLogic->setConnexion($connexion);			
			$asiento_predefinidoLogic->setasiento_predefinido($asiento_predefinido);			
			$asiento_predefinidoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*asiento_predefinido_logic_add::checkasiento_predefinidoToSaves($this->asiento_predefinidos,$this->datosCliente,$this->connexion);*/	        	
			//$this->asiento_predefinidoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->asiento_predefinidos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->asiento_predefinidos as $asiento_predefinidoLocal) {				
								
				//asiento_predefinido_logic_add::updateasiento_predefinidoToSave($asiento_predefinidoLocal);	        	
				asiento_predefinido_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$asiento_predefinidoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				asiento_predefinido_data::save($asiento_predefinidoLocal, $this->connexion);				
			}
			
			/*asiento_predefinido_logic_add::checkasiento_predefinidoToSavesAfter($this->asiento_predefinidos,$this->datosCliente,$this->connexion);*/			
			//$this->asiento_predefinidoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->asiento_predefinidos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
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
			/*asiento_predefinido_logic_add::checkasiento_predefinidoToSaves($this->asiento_predefinidos,$this->datosCliente,$this->connexion);*/			
			//$this->asiento_predefinidoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->asiento_predefinidos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->asiento_predefinidos as $asiento_predefinidoLocal) {				
								
				//asiento_predefinido_logic_add::updateasiento_predefinidoToSave($asiento_predefinidoLocal);	        	
				asiento_predefinido_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$asiento_predefinidoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				asiento_predefinido_data::save($asiento_predefinidoLocal, $this->connexion);				
			}			
			
			/*asiento_predefinido_logic_add::checkasiento_predefinidoToSavesAfter($this->asiento_predefinidos,$this->datosCliente,$this->connexion);*/			
			//$this->asiento_predefinidoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->asiento_predefinidos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $asiento_predefinidos,Connexion $connexion)  {
		$asiento_predefinidoLogic = new  asiento_predefinido_logic();
		  		  
        try {		
			$asiento_predefinidoLogic->setConnexion($connexion);			
			$asiento_predefinidoLogic->setasiento_predefinidos($asiento_predefinidos);			
			$asiento_predefinidoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$asiento_predefinidosAux=array();
		
		foreach($this->asiento_predefinidos as $asiento_predefinido) {
			if($asiento_predefinido->getIsDeleted()==false) {
				$asiento_predefinidosAux[]=$asiento_predefinido;
			}
		}
		
		$this->asiento_predefinidos=$asiento_predefinidosAux;
	}
	
	public function updateToGetsAuxiliar(array &$asiento_predefinidos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->asiento_predefinidos as $asiento_predefinido) {
				
				$asiento_predefinido->setid_empresa_Descripcion(asiento_predefinido_util::getempresaDescripcion($asiento_predefinido->getempresa()));
				$asiento_predefinido->setid_sucursal_Descripcion(asiento_predefinido_util::getsucursalDescripcion($asiento_predefinido->getsucursal()));
				$asiento_predefinido->setid_ejercicio_Descripcion(asiento_predefinido_util::getejercicioDescripcion($asiento_predefinido->getejercicio()));
				$asiento_predefinido->setid_periodo_Descripcion(asiento_predefinido_util::getperiodoDescripcion($asiento_predefinido->getperiodo()));
				$asiento_predefinido->setid_usuario_Descripcion(asiento_predefinido_util::getusuarioDescripcion($asiento_predefinido->getusuario()));
				$asiento_predefinido->setid_modulo_Descripcion(asiento_predefinido_util::getmoduloDescripcion($asiento_predefinido->getmodulo()));
				$asiento_predefinido->setid_fuente_Descripcion(asiento_predefinido_util::getfuenteDescripcion($asiento_predefinido->getfuente()));
				$asiento_predefinido->setid_libro_auxiliar_Descripcion(asiento_predefinido_util::getlibro_auxiliarDescripcion($asiento_predefinido->getlibro_auxiliar()));
				$asiento_predefinido->setid_centro_costo_Descripcion(asiento_predefinido_util::getcentro_costoDescripcion($asiento_predefinido->getcentro_costo()));
				$asiento_predefinido->setid_documento_contable_Descripcion(asiento_predefinido_util::getdocumento_contableDescripcion($asiento_predefinido->getdocumento_contable()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$asiento_predefinido_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$asiento_predefinido_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$asiento_predefinido_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$asiento_predefinidoForeignKey=new asiento_predefinido_param_return();//asiento_predefinidoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_modulo',$strRecargarFkTipos,',')) {
				$this->cargarCombosmodulosFK($this->connexion,$strRecargarFkQuery,$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_fuente',$strRecargarFkTipos,',')) {
				$this->cargarCombosfuentesFK($this->connexion,$strRecargarFkQuery,$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_libro_auxiliar',$strRecargarFkTipos,',')) {
				$this->cargarComboslibro_auxiliarsFK($this->connexion,$strRecargarFkQuery,$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_centro_costo',$strRecargarFkTipos,',')) {
				$this->cargarComboscentro_costosFK($this->connexion,$strRecargarFkQuery,$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_documento_contable',$strRecargarFkTipos,',')) {
				$this->cargarCombosdocumento_contablesFK($this->connexion,$strRecargarFkQuery,$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_modulo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosmodulosFK($this->connexion,' where id=-1 ',$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_fuente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosfuentesFK($this->connexion,' where id=-1 ',$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_libro_auxiliar',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboslibro_auxiliarsFK($this->connexion,' where id=-1 ',$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_centro_costo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscentro_costosFK($this->connexion,' where id=-1 ',$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_documento_contable',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosdocumento_contablesFK($this->connexion,' where id=-1 ',$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $asiento_predefinidoForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$asiento_predefinidoForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		if($asiento_predefinido_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($asiento_predefinidoForeignKey->idempresaDefaultFK==0) {
					$asiento_predefinidoForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$asiento_predefinidoForeignKey->empresasFK[$empresaLocal->getId()]=asiento_predefinido_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($asiento_predefinido_session->bigidempresaActual!=null && $asiento_predefinido_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($asiento_predefinido_session->bigidempresaActual);//WithConnection

				$asiento_predefinidoForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=asiento_predefinido_util::getempresaDescripcion($empresaLogic->getempresa());
				$asiento_predefinidoForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$asiento_predefinidoForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		if($asiento_predefinido_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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
				if($asiento_predefinidoForeignKey->idsucursalDefaultFK==0) {
					$asiento_predefinidoForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$asiento_predefinidoForeignKey->sucursalsFK[$sucursalLocal->getId()]=asiento_predefinido_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($asiento_predefinido_session->bigidsucursalActual!=null && $asiento_predefinido_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($asiento_predefinido_session->bigidsucursalActual);//WithConnection

				$asiento_predefinidoForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=asiento_predefinido_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$asiento_predefinidoForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$asiento_predefinidoForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		if($asiento_predefinido_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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
				if($asiento_predefinidoForeignKey->idejercicioDefaultFK==0) {
					$asiento_predefinidoForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$asiento_predefinidoForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=asiento_predefinido_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($asiento_predefinido_session->bigidejercicioActual!=null && $asiento_predefinido_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($asiento_predefinido_session->bigidejercicioActual);//WithConnection

				$asiento_predefinidoForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=asiento_predefinido_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$asiento_predefinidoForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$asiento_predefinidoForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		if($asiento_predefinido_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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
				if($asiento_predefinidoForeignKey->idperiodoDefaultFK==0) {
					$asiento_predefinidoForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$asiento_predefinidoForeignKey->periodosFK[$periodoLocal->getId()]=asiento_predefinido_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($asiento_predefinido_session->bigidperiodoActual!=null && $asiento_predefinido_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($asiento_predefinido_session->bigidperiodoActual);//WithConnection

				$asiento_predefinidoForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=asiento_predefinido_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$asiento_predefinidoForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$asiento_predefinidoForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		if($asiento_predefinido_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($asiento_predefinidoForeignKey->idusuarioDefaultFK==0) {
					$asiento_predefinidoForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$asiento_predefinidoForeignKey->usuariosFK[$usuarioLocal->getId()]=asiento_predefinido_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($asiento_predefinido_session->bigidusuarioActual!=null && $asiento_predefinido_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($asiento_predefinido_session->bigidusuarioActual);//WithConnection

				$asiento_predefinidoForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=asiento_predefinido_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$asiento_predefinidoForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosmodulosFK($connexion=null,$strRecargarFkQuery='',$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$moduloLogic= new modulo_logic();
		$pagination= new Pagination();
		$asiento_predefinidoForeignKey->modulosFK=array();

		$moduloLogic->setConnexion($connexion);
		$moduloLogic->getmoduloDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		if($asiento_predefinido_session->bitBusquedaDesdeFKSesionmodulo!=true) {
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
				if($asiento_predefinidoForeignKey->idmoduloDefaultFK==0) {
					$asiento_predefinidoForeignKey->idmoduloDefaultFK=$moduloLocal->getId();
				}

				$asiento_predefinidoForeignKey->modulosFK[$moduloLocal->getId()]=asiento_predefinido_util::getmoduloDescripcion($moduloLocal);
			}

		} else {

			if($asiento_predefinido_session->bigidmoduloActual!=null && $asiento_predefinido_session->bigidmoduloActual > 0) {
				$moduloLogic->getEntity($asiento_predefinido_session->bigidmoduloActual);//WithConnection

				$asiento_predefinidoForeignKey->modulosFK[$moduloLogic->getmodulo()->getId()]=asiento_predefinido_util::getmoduloDescripcion($moduloLogic->getmodulo());
				$asiento_predefinidoForeignKey->idmoduloDefaultFK=$moduloLogic->getmodulo()->getId();
			}
		}
	}

	public function cargarCombosfuentesFK($connexion=null,$strRecargarFkQuery='',$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$fuenteLogic= new fuente_logic();
		$pagination= new Pagination();
		$asiento_predefinidoForeignKey->fuentesFK=array();

		$fuenteLogic->setConnexion($connexion);
		$fuenteLogic->getfuenteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		if($asiento_predefinido_session->bitBusquedaDesdeFKSesionfuente!=true) {
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
				if($asiento_predefinidoForeignKey->idfuenteDefaultFK==0) {
					$asiento_predefinidoForeignKey->idfuenteDefaultFK=$fuenteLocal->getId();
				}

				$asiento_predefinidoForeignKey->fuentesFK[$fuenteLocal->getId()]=asiento_predefinido_util::getfuenteDescripcion($fuenteLocal);
			}

		} else {

			if($asiento_predefinido_session->bigidfuenteActual!=null && $asiento_predefinido_session->bigidfuenteActual > 0) {
				$fuenteLogic->getEntity($asiento_predefinido_session->bigidfuenteActual);//WithConnection

				$asiento_predefinidoForeignKey->fuentesFK[$fuenteLogic->getfuente()->getId()]=asiento_predefinido_util::getfuenteDescripcion($fuenteLogic->getfuente());
				$asiento_predefinidoForeignKey->idfuenteDefaultFK=$fuenteLogic->getfuente()->getId();
			}
		}
	}

	public function cargarComboslibro_auxiliarsFK($connexion=null,$strRecargarFkQuery='',$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$libro_auxiliarLogic= new libro_auxiliar_logic();
		$pagination= new Pagination();
		$asiento_predefinidoForeignKey->libro_auxiliarsFK=array();

		$libro_auxiliarLogic->setConnexion($connexion);
		$libro_auxiliarLogic->getlibro_auxiliarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		if($asiento_predefinido_session->bitBusquedaDesdeFKSesionlibro_auxiliar!=true) {
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
				if($asiento_predefinidoForeignKey->idlibro_auxiliarDefaultFK==0) {
					$asiento_predefinidoForeignKey->idlibro_auxiliarDefaultFK=$libro_auxiliarLocal->getId();
				}

				$asiento_predefinidoForeignKey->libro_auxiliarsFK[$libro_auxiliarLocal->getId()]=asiento_predefinido_util::getlibro_auxiliarDescripcion($libro_auxiliarLocal);
			}

		} else {

			if($asiento_predefinido_session->bigidlibro_auxiliarActual!=null && $asiento_predefinido_session->bigidlibro_auxiliarActual > 0) {
				$libro_auxiliarLogic->getEntity($asiento_predefinido_session->bigidlibro_auxiliarActual);//WithConnection

				$asiento_predefinidoForeignKey->libro_auxiliarsFK[$libro_auxiliarLogic->getlibro_auxiliar()->getId()]=asiento_predefinido_util::getlibro_auxiliarDescripcion($libro_auxiliarLogic->getlibro_auxiliar());
				$asiento_predefinidoForeignKey->idlibro_auxiliarDefaultFK=$libro_auxiliarLogic->getlibro_auxiliar()->getId();
			}
		}
	}

	public function cargarComboscentro_costosFK($connexion=null,$strRecargarFkQuery='',$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$centro_costoLogic= new centro_costo_logic();
		$pagination= new Pagination();
		$asiento_predefinidoForeignKey->centro_costosFK=array();

		$centro_costoLogic->setConnexion($connexion);
		$centro_costoLogic->getcentro_costoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		if($asiento_predefinido_session->bitBusquedaDesdeFKSesioncentro_costo!=true) {
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
				if($asiento_predefinidoForeignKey->idcentro_costoDefaultFK==0) {
					$asiento_predefinidoForeignKey->idcentro_costoDefaultFK=$centro_costoLocal->getId();
				}

				$asiento_predefinidoForeignKey->centro_costosFK[$centro_costoLocal->getId()]=asiento_predefinido_util::getcentro_costoDescripcion($centro_costoLocal);
			}

		} else {

			if($asiento_predefinido_session->bigidcentro_costoActual!=null && $asiento_predefinido_session->bigidcentro_costoActual > 0) {
				$centro_costoLogic->getEntity($asiento_predefinido_session->bigidcentro_costoActual);//WithConnection

				$asiento_predefinidoForeignKey->centro_costosFK[$centro_costoLogic->getcentro_costo()->getId()]=asiento_predefinido_util::getcentro_costoDescripcion($centro_costoLogic->getcentro_costo());
				$asiento_predefinidoForeignKey->idcentro_costoDefaultFK=$centro_costoLogic->getcentro_costo()->getId();
			}
		}
	}

	public function cargarCombosdocumento_contablesFK($connexion=null,$strRecargarFkQuery='',$asiento_predefinidoForeignKey,$asiento_predefinido_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$documento_contableLogic= new documento_contable_logic();
		$pagination= new Pagination();
		$asiento_predefinidoForeignKey->documento_contablesFK=array();

		$documento_contableLogic->setConnexion($connexion);
		$documento_contableLogic->getdocumento_contableDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		if($asiento_predefinido_session->bitBusquedaDesdeFKSesiondocumento_contable!=true) {
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
				if($asiento_predefinidoForeignKey->iddocumento_contableDefaultFK==0) {
					$asiento_predefinidoForeignKey->iddocumento_contableDefaultFK=$documento_contableLocal->getId();
				}

				$asiento_predefinidoForeignKey->documento_contablesFK[$documento_contableLocal->getId()]=asiento_predefinido_util::getdocumento_contableDescripcion($documento_contableLocal);
			}

		} else {

			if($asiento_predefinido_session->bigiddocumento_contableActual!=null && $asiento_predefinido_session->bigiddocumento_contableActual > 0) {
				$documento_contableLogic->getEntity($asiento_predefinido_session->bigiddocumento_contableActual);//WithConnection

				$asiento_predefinidoForeignKey->documento_contablesFK[$documento_contableLogic->getdocumento_contable()->getId()]=asiento_predefinido_util::getdocumento_contableDescripcion($documento_contableLogic->getdocumento_contable());
				$asiento_predefinidoForeignKey->iddocumento_contableDefaultFK=$documento_contableLogic->getdocumento_contable()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($asiento_predefinido,$asientopredefinidodetalles,$asientos) {
		$this->saveRelacionesBase($asiento_predefinido,$asientopredefinidodetalles,$asientos,true);
	}

	public function saveRelaciones($asiento_predefinido,$asientopredefinidodetalles,$asientos) {
		$this->saveRelacionesBase($asiento_predefinido,$asientopredefinidodetalles,$asientos,false);
	}

	public function saveRelacionesBase($asiento_predefinido,$asientopredefinidodetalles=array(),$asientos=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$asiento_predefinido->setasiento_predefinido_detalles($asientopredefinidodetalles);
			$asiento_predefinido->setasientos($asientos);
			$this->setasiento_predefinido($asiento_predefinido);

			if(true) {

				//asiento_predefinido_logic_add::updateRelacionesToSave($asiento_predefinido,$this);

				if(($this->asiento_predefinido->getIsNew() || $this->asiento_predefinido->getIsChanged()) && !$this->asiento_predefinido->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($asientopredefinidodetalles,$asientos);

				} else if($this->asiento_predefinido->getIsDeleted()) {
					$this->saveRelacionesDetalles($asientopredefinidodetalles,$asientos);
					$this->save();
				}

				//asiento_predefinido_logic_add::updateRelacionesToSaveAfter($asiento_predefinido,$this);

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
	
	
	public function saveRelacionesDetalles($asientopredefinidodetalles=array(),$asientos=array()) {
		try {
	

			$idasiento_predefinidoActual=$this->getasiento_predefinido()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_predefinido_detalle_carga.php');
			asiento_predefinido_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$asientopredefinidodetalleLogic_Desde_asiento_predefinido=new asiento_predefinido_detalle_logic();
			$asientopredefinidodetalleLogic_Desde_asiento_predefinido->setasiento_predefinido_detalles($asientopredefinidodetalles);

			$asientopredefinidodetalleLogic_Desde_asiento_predefinido->setConnexion($this->getConnexion());
			$asientopredefinidodetalleLogic_Desde_asiento_predefinido->setDatosCliente($this->datosCliente);

			foreach($asientopredefinidodetalleLogic_Desde_asiento_predefinido->getasiento_predefinido_detalles() as $asientopredefinidodetalle_Desde_asiento_predefinido) {
				$asientopredefinidodetalle_Desde_asiento_predefinido->setid_asiento_predefinido($idasiento_predefinidoActual);
			}

			$asientopredefinidodetalleLogic_Desde_asiento_predefinido->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_carga.php');
			asiento_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$asientoLogic_Desde_asiento_predefinido=new asiento_logic();
			$asientoLogic_Desde_asiento_predefinido->setasientos($asientos);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $asiento_predefinidos,asiento_predefinido_param_return $asiento_predefinidoParameterGeneral) : asiento_predefinido_param_return {
		$asiento_predefinidoReturnGeneral=new asiento_predefinido_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $asiento_predefinidoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $asiento_predefinidos,asiento_predefinido_param_return $asiento_predefinidoParameterGeneral) : asiento_predefinido_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$asiento_predefinidoReturnGeneral=new asiento_predefinido_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $asiento_predefinidoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $asiento_predefinidos,asiento_predefinido $asiento_predefinido,asiento_predefinido_param_return $asiento_predefinidoParameterGeneral,bool $isEsNuevoasiento_predefinido,array $clases) : asiento_predefinido_param_return {
		 try {	
			$asiento_predefinidoReturnGeneral=new asiento_predefinido_param_return();
	
			$asiento_predefinidoReturnGeneral->setasiento_predefinido($asiento_predefinido);
			$asiento_predefinidoReturnGeneral->setasiento_predefinidos($asiento_predefinidos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$asiento_predefinidoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $asiento_predefinidoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $asiento_predefinidos,asiento_predefinido $asiento_predefinido,asiento_predefinido_param_return $asiento_predefinidoParameterGeneral,bool $isEsNuevoasiento_predefinido,array $clases) : asiento_predefinido_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$asiento_predefinidoReturnGeneral=new asiento_predefinido_param_return();
	
			$asiento_predefinidoReturnGeneral->setasiento_predefinido($asiento_predefinido);
			$asiento_predefinidoReturnGeneral->setasiento_predefinidos($asiento_predefinidos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$asiento_predefinidoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $asiento_predefinidoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $asiento_predefinidos,asiento_predefinido $asiento_predefinido,asiento_predefinido_param_return $asiento_predefinidoParameterGeneral,bool $isEsNuevoasiento_predefinido,array $clases) : asiento_predefinido_param_return {
		 try {	
			$asiento_predefinidoReturnGeneral=new asiento_predefinido_param_return();
	
			$asiento_predefinidoReturnGeneral->setasiento_predefinido($asiento_predefinido);
			$asiento_predefinidoReturnGeneral->setasiento_predefinidos($asiento_predefinidos);
			
			
			
			return $asiento_predefinidoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $asiento_predefinidos,asiento_predefinido $asiento_predefinido,asiento_predefinido_param_return $asiento_predefinidoParameterGeneral,bool $isEsNuevoasiento_predefinido,array $clases) : asiento_predefinido_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$asiento_predefinidoReturnGeneral=new asiento_predefinido_param_return();
	
			$asiento_predefinidoReturnGeneral->setasiento_predefinido($asiento_predefinido);
			$asiento_predefinidoReturnGeneral->setasiento_predefinidos($asiento_predefinidos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $asiento_predefinidoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,asiento_predefinido $asiento_predefinido,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,asiento_predefinido $asiento_predefinido,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		asiento_predefinido_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		asiento_predefinido_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(asiento_predefinido $asiento_predefinido,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//asiento_predefinido_logic_add::updateasiento_predefinidoToGet($this->asiento_predefinido);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$asiento_predefinido->setempresa($this->asiento_predefinidoDataAccess->getempresa($this->connexion,$asiento_predefinido));
		$asiento_predefinido->setsucursal($this->asiento_predefinidoDataAccess->getsucursal($this->connexion,$asiento_predefinido));
		$asiento_predefinido->setejercicio($this->asiento_predefinidoDataAccess->getejercicio($this->connexion,$asiento_predefinido));
		$asiento_predefinido->setperiodo($this->asiento_predefinidoDataAccess->getperiodo($this->connexion,$asiento_predefinido));
		$asiento_predefinido->setusuario($this->asiento_predefinidoDataAccess->getusuario($this->connexion,$asiento_predefinido));
		$asiento_predefinido->setmodulo($this->asiento_predefinidoDataAccess->getmodulo($this->connexion,$asiento_predefinido));
		$asiento_predefinido->setfuente($this->asiento_predefinidoDataAccess->getfuente($this->connexion,$asiento_predefinido));
		$asiento_predefinido->setlibro_auxiliar($this->asiento_predefinidoDataAccess->getlibro_auxiliar($this->connexion,$asiento_predefinido));
		$asiento_predefinido->setcentro_costo($this->asiento_predefinidoDataAccess->getcentro_costo($this->connexion,$asiento_predefinido));
		$asiento_predefinido->setdocumento_contable($this->asiento_predefinidoDataAccess->getdocumento_contable($this->connexion,$asiento_predefinido));
		$asiento_predefinido->setasiento_predefinido_detalles($this->asiento_predefinidoDataAccess->getasiento_predefinido_detalles($this->connexion,$asiento_predefinido));
		$asiento_predefinido->setasientos($this->asiento_predefinidoDataAccess->getasientos($this->connexion,$asiento_predefinido));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$asiento_predefinido->setempresa($this->asiento_predefinidoDataAccess->getempresa($this->connexion,$asiento_predefinido));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$asiento_predefinido->setsucursal($this->asiento_predefinidoDataAccess->getsucursal($this->connexion,$asiento_predefinido));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$asiento_predefinido->setejercicio($this->asiento_predefinidoDataAccess->getejercicio($this->connexion,$asiento_predefinido));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$asiento_predefinido->setperiodo($this->asiento_predefinidoDataAccess->getperiodo($this->connexion,$asiento_predefinido));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$asiento_predefinido->setusuario($this->asiento_predefinidoDataAccess->getusuario($this->connexion,$asiento_predefinido));
				continue;
			}

			if($clas->clas==modulo::$class.'') {
				$asiento_predefinido->setmodulo($this->asiento_predefinidoDataAccess->getmodulo($this->connexion,$asiento_predefinido));
				continue;
			}

			if($clas->clas==fuente::$class.'') {
				$asiento_predefinido->setfuente($this->asiento_predefinidoDataAccess->getfuente($this->connexion,$asiento_predefinido));
				continue;
			}

			if($clas->clas==libro_auxiliar::$class.'') {
				$asiento_predefinido->setlibro_auxiliar($this->asiento_predefinidoDataAccess->getlibro_auxiliar($this->connexion,$asiento_predefinido));
				continue;
			}

			if($clas->clas==centro_costo::$class.'') {
				$asiento_predefinido->setcentro_costo($this->asiento_predefinidoDataAccess->getcentro_costo($this->connexion,$asiento_predefinido));
				continue;
			}

			if($clas->clas==documento_contable::$class.'') {
				$asiento_predefinido->setdocumento_contable($this->asiento_predefinidoDataAccess->getdocumento_contable($this->connexion,$asiento_predefinido));
				continue;
			}

			if($clas->clas==asiento_predefinido_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$asiento_predefinido->setasiento_predefinido_detalles($this->asiento_predefinidoDataAccess->getasiento_predefinido_detalles($this->connexion,$asiento_predefinido));

				if($this->isConDeep) {
					$asientopredefinidodetalleLogic= new asiento_predefinido_detalle_logic($this->connexion);
					$asientopredefinidodetalleLogic->setasiento_predefinido_detalles($asiento_predefinido->getasiento_predefinido_detalles());
					$classesLocal=asiento_predefinido_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$asientopredefinidodetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					asiento_predefinido_detalle_util::refrescarFKDescripciones($asientopredefinidodetalleLogic->getasiento_predefinido_detalles());
					$asiento_predefinido->setasiento_predefinido_detalles($asientopredefinidodetalleLogic->getasiento_predefinido_detalles());
				}

				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$asiento_predefinido->setasientos($this->asiento_predefinidoDataAccess->getasientos($this->connexion,$asiento_predefinido));

				if($this->isConDeep) {
					$asientoLogic= new asiento_logic($this->connexion);
					$asientoLogic->setasientos($asiento_predefinido->getasientos());
					$classesLocal=asiento_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$asientoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					asiento_util::refrescarFKDescripciones($asientoLogic->getasientos());
					$asiento_predefinido->setasientos($asientoLogic->getasientos());
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
			$asiento_predefinido->setempresa($this->asiento_predefinidoDataAccess->getempresa($this->connexion,$asiento_predefinido));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido->setsucursal($this->asiento_predefinidoDataAccess->getsucursal($this->connexion,$asiento_predefinido));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido->setejercicio($this->asiento_predefinidoDataAccess->getejercicio($this->connexion,$asiento_predefinido));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido->setperiodo($this->asiento_predefinidoDataAccess->getperiodo($this->connexion,$asiento_predefinido));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido->setusuario($this->asiento_predefinidoDataAccess->getusuario($this->connexion,$asiento_predefinido));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido->setmodulo($this->asiento_predefinidoDataAccess->getmodulo($this->connexion,$asiento_predefinido));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==fuente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido->setfuente($this->asiento_predefinidoDataAccess->getfuente($this->connexion,$asiento_predefinido));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==libro_auxiliar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido->setlibro_auxiliar($this->asiento_predefinidoDataAccess->getlibro_auxiliar($this->connexion,$asiento_predefinido));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==centro_costo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido->setcentro_costo($this->asiento_predefinidoDataAccess->getcentro_costo($this->connexion,$asiento_predefinido));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_contable::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido->setdocumento_contable($this->asiento_predefinidoDataAccess->getdocumento_contable($this->connexion,$asiento_predefinido));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_predefinido_detalle::$class);
			$asiento_predefinido->setasiento_predefinido_detalles($this->asiento_predefinidoDataAccess->getasiento_predefinido_detalles($this->connexion,$asiento_predefinido));
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
			$asiento_predefinido->setasientos($this->asiento_predefinidoDataAccess->getasientos($this->connexion,$asiento_predefinido));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$asiento_predefinido->setempresa($this->asiento_predefinidoDataAccess->getempresa($this->connexion,$asiento_predefinido));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($asiento_predefinido->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$asiento_predefinido->setsucursal($this->asiento_predefinidoDataAccess->getsucursal($this->connexion,$asiento_predefinido));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($asiento_predefinido->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$asiento_predefinido->setejercicio($this->asiento_predefinidoDataAccess->getejercicio($this->connexion,$asiento_predefinido));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($asiento_predefinido->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$asiento_predefinido->setperiodo($this->asiento_predefinidoDataAccess->getperiodo($this->connexion,$asiento_predefinido));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($asiento_predefinido->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$asiento_predefinido->setusuario($this->asiento_predefinidoDataAccess->getusuario($this->connexion,$asiento_predefinido));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($asiento_predefinido->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$asiento_predefinido->setmodulo($this->asiento_predefinidoDataAccess->getmodulo($this->connexion,$asiento_predefinido));
		$moduloLogic= new modulo_logic($this->connexion);
		$moduloLogic->deepLoad($asiento_predefinido->getmodulo(),$isDeep,$deepLoadType,$clases);
				
		$asiento_predefinido->setfuente($this->asiento_predefinidoDataAccess->getfuente($this->connexion,$asiento_predefinido));
		$fuenteLogic= new fuente_logic($this->connexion);
		$fuenteLogic->deepLoad($asiento_predefinido->getfuente(),$isDeep,$deepLoadType,$clases);
				
		$asiento_predefinido->setlibro_auxiliar($this->asiento_predefinidoDataAccess->getlibro_auxiliar($this->connexion,$asiento_predefinido));
		$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
		$libro_auxiliarLogic->deepLoad($asiento_predefinido->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases);
				
		$asiento_predefinido->setcentro_costo($this->asiento_predefinidoDataAccess->getcentro_costo($this->connexion,$asiento_predefinido));
		$centro_costoLogic= new centro_costo_logic($this->connexion);
		$centro_costoLogic->deepLoad($asiento_predefinido->getcentro_costo(),$isDeep,$deepLoadType,$clases);
				
		$asiento_predefinido->setdocumento_contable($this->asiento_predefinidoDataAccess->getdocumento_contable($this->connexion,$asiento_predefinido));
		$documento_contableLogic= new documento_contable_logic($this->connexion);
		$documento_contableLogic->deepLoad($asiento_predefinido->getdocumento_contable(),$isDeep,$deepLoadType,$clases);
				

		$asiento_predefinido->setasiento_predefinido_detalles($this->asiento_predefinidoDataAccess->getasiento_predefinido_detalles($this->connexion,$asiento_predefinido));

		foreach($asiento_predefinido->getasiento_predefinido_detalles() as $asientopredefinidodetalle) {
			$asientopredefinidodetalleLogic= new asiento_predefinido_detalle_logic($this->connexion);
			$asientopredefinidodetalleLogic->deepLoad($asientopredefinidodetalle,$isDeep,$deepLoadType,$clases);
		}

		$asiento_predefinido->setasientos($this->asiento_predefinidoDataAccess->getasientos($this->connexion,$asiento_predefinido));

		foreach($asiento_predefinido->getasientos() as $asiento) {
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepLoad($asiento,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$asiento_predefinido->setempresa($this->asiento_predefinidoDataAccess->getempresa($this->connexion,$asiento_predefinido));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($asiento_predefinido->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$asiento_predefinido->setsucursal($this->asiento_predefinidoDataAccess->getsucursal($this->connexion,$asiento_predefinido));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($asiento_predefinido->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$asiento_predefinido->setejercicio($this->asiento_predefinidoDataAccess->getejercicio($this->connexion,$asiento_predefinido));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($asiento_predefinido->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$asiento_predefinido->setperiodo($this->asiento_predefinidoDataAccess->getperiodo($this->connexion,$asiento_predefinido));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($asiento_predefinido->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$asiento_predefinido->setusuario($this->asiento_predefinidoDataAccess->getusuario($this->connexion,$asiento_predefinido));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($asiento_predefinido->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==modulo::$class.'') {
				$asiento_predefinido->setmodulo($this->asiento_predefinidoDataAccess->getmodulo($this->connexion,$asiento_predefinido));
				$moduloLogic= new modulo_logic($this->connexion);
				$moduloLogic->deepLoad($asiento_predefinido->getmodulo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==fuente::$class.'') {
				$asiento_predefinido->setfuente($this->asiento_predefinidoDataAccess->getfuente($this->connexion,$asiento_predefinido));
				$fuenteLogic= new fuente_logic($this->connexion);
				$fuenteLogic->deepLoad($asiento_predefinido->getfuente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==libro_auxiliar::$class.'') {
				$asiento_predefinido->setlibro_auxiliar($this->asiento_predefinidoDataAccess->getlibro_auxiliar($this->connexion,$asiento_predefinido));
				$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
				$libro_auxiliarLogic->deepLoad($asiento_predefinido->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==centro_costo::$class.'') {
				$asiento_predefinido->setcentro_costo($this->asiento_predefinidoDataAccess->getcentro_costo($this->connexion,$asiento_predefinido));
				$centro_costoLogic= new centro_costo_logic($this->connexion);
				$centro_costoLogic->deepLoad($asiento_predefinido->getcentro_costo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==documento_contable::$class.'') {
				$asiento_predefinido->setdocumento_contable($this->asiento_predefinidoDataAccess->getdocumento_contable($this->connexion,$asiento_predefinido));
				$documento_contableLogic= new documento_contable_logic($this->connexion);
				$documento_contableLogic->deepLoad($asiento_predefinido->getdocumento_contable(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==asiento_predefinido_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$asiento_predefinido->setasiento_predefinido_detalles($this->asiento_predefinidoDataAccess->getasiento_predefinido_detalles($this->connexion,$asiento_predefinido));

				foreach($asiento_predefinido->getasiento_predefinido_detalles() as $asientopredefinidodetalle) {
					$asientopredefinidodetalleLogic= new asiento_predefinido_detalle_logic($this->connexion);
					$asientopredefinidodetalleLogic->deepLoad($asientopredefinidodetalle,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$asiento_predefinido->setasientos($this->asiento_predefinidoDataAccess->getasientos($this->connexion,$asiento_predefinido));

				foreach($asiento_predefinido->getasientos() as $asiento) {
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
			$asiento_predefinido->setempresa($this->asiento_predefinidoDataAccess->getempresa($this->connexion,$asiento_predefinido));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($asiento_predefinido->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido->setsucursal($this->asiento_predefinidoDataAccess->getsucursal($this->connexion,$asiento_predefinido));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($asiento_predefinido->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido->setejercicio($this->asiento_predefinidoDataAccess->getejercicio($this->connexion,$asiento_predefinido));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($asiento_predefinido->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido->setperiodo($this->asiento_predefinidoDataAccess->getperiodo($this->connexion,$asiento_predefinido));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($asiento_predefinido->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido->setusuario($this->asiento_predefinidoDataAccess->getusuario($this->connexion,$asiento_predefinido));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($asiento_predefinido->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido->setmodulo($this->asiento_predefinidoDataAccess->getmodulo($this->connexion,$asiento_predefinido));
			$moduloLogic= new modulo_logic($this->connexion);
			$moduloLogic->deepLoad($asiento_predefinido->getmodulo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==fuente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido->setfuente($this->asiento_predefinidoDataAccess->getfuente($this->connexion,$asiento_predefinido));
			$fuenteLogic= new fuente_logic($this->connexion);
			$fuenteLogic->deepLoad($asiento_predefinido->getfuente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==libro_auxiliar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido->setlibro_auxiliar($this->asiento_predefinidoDataAccess->getlibro_auxiliar($this->connexion,$asiento_predefinido));
			$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
			$libro_auxiliarLogic->deepLoad($asiento_predefinido->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==centro_costo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido->setcentro_costo($this->asiento_predefinidoDataAccess->getcentro_costo($this->connexion,$asiento_predefinido));
			$centro_costoLogic= new centro_costo_logic($this->connexion);
			$centro_costoLogic->deepLoad($asiento_predefinido->getcentro_costo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_contable::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$asiento_predefinido->setdocumento_contable($this->asiento_predefinidoDataAccess->getdocumento_contable($this->connexion,$asiento_predefinido));
			$documento_contableLogic= new documento_contable_logic($this->connexion);
			$documento_contableLogic->deepLoad($asiento_predefinido->getdocumento_contable(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_predefinido_detalle::$class);
			$asiento_predefinido->setasiento_predefinido_detalles($this->asiento_predefinidoDataAccess->getasiento_predefinido_detalles($this->connexion,$asiento_predefinido));

			foreach($asiento_predefinido->getasiento_predefinido_detalles() as $asientopredefinidodetalle) {
				$asientopredefinidodetalleLogic= new asiento_predefinido_detalle_logic($this->connexion);
				$asientopredefinidodetalleLogic->deepLoad($asientopredefinidodetalle,$isDeep,$deepLoadType,$clases);
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
			$asiento_predefinido->setasientos($this->asiento_predefinidoDataAccess->getasientos($this->connexion,$asiento_predefinido));

			foreach($asiento_predefinido->getasientos() as $asiento) {
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
	
	public function deepSave(asiento_predefinido $asiento_predefinido,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//asiento_predefinido_logic_add::updateasiento_predefinidoToSave($this->asiento_predefinido);			
			
			if(!$paraDeleteCascade) {				
				asiento_predefinido_data::save($asiento_predefinido, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($asiento_predefinido->getempresa(),$this->connexion);
		sucursal_data::save($asiento_predefinido->getsucursal(),$this->connexion);
		ejercicio_data::save($asiento_predefinido->getejercicio(),$this->connexion);
		periodo_data::save($asiento_predefinido->getperiodo(),$this->connexion);
		usuario_data::save($asiento_predefinido->getusuario(),$this->connexion);
		modulo_data::save($asiento_predefinido->getmodulo(),$this->connexion);
		fuente_data::save($asiento_predefinido->getfuente(),$this->connexion);
		libro_auxiliar_data::save($asiento_predefinido->getlibro_auxiliar(),$this->connexion);
		centro_costo_data::save($asiento_predefinido->getcentro_costo(),$this->connexion);
		documento_contable_data::save($asiento_predefinido->getdocumento_contable(),$this->connexion);

		foreach($asiento_predefinido->getasiento_predefinido_detalles() as $asientopredefinidodetalle) {
			$asientopredefinidodetalle->setid_asiento_predefinido($asiento_predefinido->getId());
			asiento_predefinido_detalle_data::save($asientopredefinidodetalle,$this->connexion);
		}


		foreach($asiento_predefinido->getasientos() as $asiento) {
			$asiento->setid_asiento_predefinido($asiento_predefinido->getId());
			asiento_data::save($asiento,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($asiento_predefinido->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($asiento_predefinido->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($asiento_predefinido->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($asiento_predefinido->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($asiento_predefinido->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==modulo::$class.'') {
				modulo_data::save($asiento_predefinido->getmodulo(),$this->connexion);
				continue;
			}

			if($clas->clas==fuente::$class.'') {
				fuente_data::save($asiento_predefinido->getfuente(),$this->connexion);
				continue;
			}

			if($clas->clas==libro_auxiliar::$class.'') {
				libro_auxiliar_data::save($asiento_predefinido->getlibro_auxiliar(),$this->connexion);
				continue;
			}

			if($clas->clas==centro_costo::$class.'') {
				centro_costo_data::save($asiento_predefinido->getcentro_costo(),$this->connexion);
				continue;
			}

			if($clas->clas==documento_contable::$class.'') {
				documento_contable_data::save($asiento_predefinido->getdocumento_contable(),$this->connexion);
				continue;
			}


			if($clas->clas==asiento_predefinido_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($asiento_predefinido->getasiento_predefinido_detalles() as $asientopredefinidodetalle) {
					$asientopredefinidodetalle->setid_asiento_predefinido($asiento_predefinido->getId());
					asiento_predefinido_detalle_data::save($asientopredefinidodetalle,$this->connexion);
				}

				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($asiento_predefinido->getasientos() as $asiento) {
					$asiento->setid_asiento_predefinido($asiento_predefinido->getId());
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
			empresa_data::save($asiento_predefinido->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($asiento_predefinido->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($asiento_predefinido->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($asiento_predefinido->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($asiento_predefinido->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			modulo_data::save($asiento_predefinido->getmodulo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==fuente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			fuente_data::save($asiento_predefinido->getfuente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==libro_auxiliar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			libro_auxiliar_data::save($asiento_predefinido->getlibro_auxiliar(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==centro_costo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			centro_costo_data::save($asiento_predefinido->getcentro_costo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_contable::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_contable_data::save($asiento_predefinido->getdocumento_contable(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_predefinido_detalle::$class);

			foreach($asiento_predefinido->getasiento_predefinido_detalles() as $asientopredefinidodetalle) {
				$asientopredefinidodetalle->setid_asiento_predefinido($asiento_predefinido->getId());
				asiento_predefinido_detalle_data::save($asientopredefinidodetalle,$this->connexion);
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

			foreach($asiento_predefinido->getasientos() as $asiento) {
				$asiento->setid_asiento_predefinido($asiento_predefinido->getId());
				asiento_data::save($asiento,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($asiento_predefinido->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($asiento_predefinido->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($asiento_predefinido->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($asiento_predefinido->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($asiento_predefinido->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($asiento_predefinido->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($asiento_predefinido->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($asiento_predefinido->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($asiento_predefinido->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($asiento_predefinido->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		modulo_data::save($asiento_predefinido->getmodulo(),$this->connexion);
		$moduloLogic= new modulo_logic($this->connexion);
		$moduloLogic->deepSave($asiento_predefinido->getmodulo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		fuente_data::save($asiento_predefinido->getfuente(),$this->connexion);
		$fuenteLogic= new fuente_logic($this->connexion);
		$fuenteLogic->deepSave($asiento_predefinido->getfuente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		libro_auxiliar_data::save($asiento_predefinido->getlibro_auxiliar(),$this->connexion);
		$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
		$libro_auxiliarLogic->deepSave($asiento_predefinido->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		centro_costo_data::save($asiento_predefinido->getcentro_costo(),$this->connexion);
		$centro_costoLogic= new centro_costo_logic($this->connexion);
		$centro_costoLogic->deepSave($asiento_predefinido->getcentro_costo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		documento_contable_data::save($asiento_predefinido->getdocumento_contable(),$this->connexion);
		$documento_contableLogic= new documento_contable_logic($this->connexion);
		$documento_contableLogic->deepSave($asiento_predefinido->getdocumento_contable(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($asiento_predefinido->getasiento_predefinido_detalles() as $asientopredefinidodetalle) {
			$asientopredefinidodetalleLogic= new asiento_predefinido_detalle_logic($this->connexion);
			$asientopredefinidodetalle->setid_asiento_predefinido($asiento_predefinido->getId());
			asiento_predefinido_detalle_data::save($asientopredefinidodetalle,$this->connexion);
			$asientopredefinidodetalleLogic->deepSave($asientopredefinidodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($asiento_predefinido->getasientos() as $asiento) {
			$asientoLogic= new asiento_logic($this->connexion);
			$asiento->setid_asiento_predefinido($asiento_predefinido->getId());
			asiento_data::save($asiento,$this->connexion);
			$asientoLogic->deepSave($asiento,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($asiento_predefinido->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($asiento_predefinido->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($asiento_predefinido->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($asiento_predefinido->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($asiento_predefinido->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($asiento_predefinido->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($asiento_predefinido->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($asiento_predefinido->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($asiento_predefinido->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($asiento_predefinido->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==modulo::$class.'') {
				modulo_data::save($asiento_predefinido->getmodulo(),$this->connexion);
				$moduloLogic= new modulo_logic($this->connexion);
				$moduloLogic->deepSave($asiento_predefinido->getmodulo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==fuente::$class.'') {
				fuente_data::save($asiento_predefinido->getfuente(),$this->connexion);
				$fuenteLogic= new fuente_logic($this->connexion);
				$fuenteLogic->deepSave($asiento_predefinido->getfuente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==libro_auxiliar::$class.'') {
				libro_auxiliar_data::save($asiento_predefinido->getlibro_auxiliar(),$this->connexion);
				$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
				$libro_auxiliarLogic->deepSave($asiento_predefinido->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==centro_costo::$class.'') {
				centro_costo_data::save($asiento_predefinido->getcentro_costo(),$this->connexion);
				$centro_costoLogic= new centro_costo_logic($this->connexion);
				$centro_costoLogic->deepSave($asiento_predefinido->getcentro_costo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==documento_contable::$class.'') {
				documento_contable_data::save($asiento_predefinido->getdocumento_contable(),$this->connexion);
				$documento_contableLogic= new documento_contable_logic($this->connexion);
				$documento_contableLogic->deepSave($asiento_predefinido->getdocumento_contable(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==asiento_predefinido_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($asiento_predefinido->getasiento_predefinido_detalles() as $asientopredefinidodetalle) {
					$asientopredefinidodetalleLogic= new asiento_predefinido_detalle_logic($this->connexion);
					$asientopredefinidodetalle->setid_asiento_predefinido($asiento_predefinido->getId());
					asiento_predefinido_detalle_data::save($asientopredefinidodetalle,$this->connexion);
					$asientopredefinidodetalleLogic->deepSave($asientopredefinidodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($asiento_predefinido->getasientos() as $asiento) {
					$asientoLogic= new asiento_logic($this->connexion);
					$asiento->setid_asiento_predefinido($asiento_predefinido->getId());
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
			empresa_data::save($asiento_predefinido->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($asiento_predefinido->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($asiento_predefinido->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($asiento_predefinido->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($asiento_predefinido->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($asiento_predefinido->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($asiento_predefinido->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($asiento_predefinido->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($asiento_predefinido->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($asiento_predefinido->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==modulo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			modulo_data::save($asiento_predefinido->getmodulo(),$this->connexion);
			$moduloLogic= new modulo_logic($this->connexion);
			$moduloLogic->deepSave($asiento_predefinido->getmodulo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==fuente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			fuente_data::save($asiento_predefinido->getfuente(),$this->connexion);
			$fuenteLogic= new fuente_logic($this->connexion);
			$fuenteLogic->deepSave($asiento_predefinido->getfuente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==libro_auxiliar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			libro_auxiliar_data::save($asiento_predefinido->getlibro_auxiliar(),$this->connexion);
			$libro_auxiliarLogic= new libro_auxiliar_logic($this->connexion);
			$libro_auxiliarLogic->deepSave($asiento_predefinido->getlibro_auxiliar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==centro_costo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			centro_costo_data::save($asiento_predefinido->getcentro_costo(),$this->connexion);
			$centro_costoLogic= new centro_costo_logic($this->connexion);
			$centro_costoLogic->deepSave($asiento_predefinido->getcentro_costo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_contable::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_contable_data::save($asiento_predefinido->getdocumento_contable(),$this->connexion);
			$documento_contableLogic= new documento_contable_logic($this->connexion);
			$documento_contableLogic->deepSave($asiento_predefinido->getdocumento_contable(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_predefinido_detalle::$class);

			foreach($asiento_predefinido->getasiento_predefinido_detalles() as $asientopredefinidodetalle) {
				$asientopredefinidodetalleLogic= new asiento_predefinido_detalle_logic($this->connexion);
				$asientopredefinidodetalle->setid_asiento_predefinido($asiento_predefinido->getId());
				asiento_predefinido_detalle_data::save($asientopredefinidodetalle,$this->connexion);
				$asientopredefinidodetalleLogic->deepSave($asientopredefinidodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($asiento_predefinido->getasientos() as $asiento) {
				$asientoLogic= new asiento_logic($this->connexion);
				$asiento->setid_asiento_predefinido($asiento_predefinido->getId());
				asiento_data::save($asiento,$this->connexion);
				$asientoLogic->deepSave($asiento,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				asiento_predefinido_data::save($asiento_predefinido, $this->connexion);
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
			
			$this->deepLoad($this->asiento_predefinido,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->asiento_predefinidos as $asiento_predefinido) {
				$this->deepLoad($asiento_predefinido,$isDeep,$deepLoadType,$clases);
								
				asiento_predefinido_util::refrescarFKDescripciones($this->asiento_predefinidos);
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
			
			foreach($this->asiento_predefinidos as $asiento_predefinido) {
				$this->deepLoad($asiento_predefinido,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->asiento_predefinido,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->asiento_predefinidos as $asiento_predefinido) {
				$this->deepSave($asiento_predefinido,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->asiento_predefinidos as $asiento_predefinido) {
				$this->deepSave($asiento_predefinido,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(modulo::$class);
				$classes[]=new Classe(fuente::$class);
				$classes[]=new Classe(libro_auxiliar::$class);
				$classes[]=new Classe(centro_costo::$class);
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
				
				$classes[]=new Classe(asiento_predefinido_detalle::$class);
				$classes[]=new Classe(asiento::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==asiento_predefinido_detalle::$class) {
						$classes[]=new Classe(asiento_predefinido_detalle::$class);
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
					if($clas->clas==asiento_predefinido_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento_predefinido_detalle::$class);
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
	
	
	
	
	
	
	
	public function getasiento_predefinido() : ?asiento_predefinido {	
		/*
		asiento_predefinido_logic_add::checkasiento_predefinidoToGet($this->asiento_predefinido,$this->datosCliente);
		asiento_predefinido_logic_add::updateasiento_predefinidoToGet($this->asiento_predefinido);
		*/
			
		return $this->asiento_predefinido;
	}
		
	public function setasiento_predefinido(asiento_predefinido $newasiento_predefinido) {
		$this->asiento_predefinido = $newasiento_predefinido;
	}
	
	public function getasiento_predefinidos() : array {		
		/*
		asiento_predefinido_logic_add::checkasiento_predefinidoToGets($this->asiento_predefinidos,$this->datosCliente);
		
		foreach ($this->asiento_predefinidos as $asiento_predefinidoLocal ) {
			asiento_predefinido_logic_add::updateasiento_predefinidoToGet($asiento_predefinidoLocal);
		}
		*/
		
		return $this->asiento_predefinidos;
	}
	
	public function setasiento_predefinidos(array $newasiento_predefinidos) {
		$this->asiento_predefinidos = $newasiento_predefinidos;
	}
	
	public function getasiento_predefinidoDataAccess() : asiento_predefinido_data {
		return $this->asiento_predefinidoDataAccess;
	}
	
	public function setasiento_predefinidoDataAccess(asiento_predefinido_data $newasiento_predefinidoDataAccess) {
		$this->asiento_predefinidoDataAccess = $newasiento_predefinidoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        asiento_predefinido_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
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
