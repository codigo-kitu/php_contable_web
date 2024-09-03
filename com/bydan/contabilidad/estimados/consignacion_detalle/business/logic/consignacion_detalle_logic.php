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

namespace com\bydan\contabilidad\estimados\consignacion_detalle\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\estimados\consignacion_detalle\util\consignacion_detalle_carga;
use com\bydan\contabilidad\estimados\consignacion_detalle\util\consignacion_detalle_param_return;

use com\bydan\contabilidad\estimados\consignacion_detalle\presentation\session\consignacion_detalle_session;

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

use com\bydan\contabilidad\estimados\consignacion_detalle\util\consignacion_detalle_util;
use com\bydan\contabilidad\estimados\consignacion_detalle\business\entity\consignacion_detalle;
use com\bydan\contabilidad\estimados\consignacion_detalle\business\data\consignacion_detalle_data;

//FK


use com\bydan\contabilidad\estimados\consignacion\business\entity\consignacion;
use com\bydan\contabilidad\estimados\consignacion\business\data\consignacion_data;
use com\bydan\contabilidad\estimados\consignacion\business\logic\consignacion_logic;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\data\bodega_data;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;
use com\bydan\contabilidad\inventario\unidad\business\data\unidad_data;
use com\bydan\contabilidad\inventario\unidad\business\logic\unidad_logic;
use com\bydan\contabilidad\inventario\unidad\util\unidad_util;

//REL


//REL DETALLES




class consignacion_detalle_logic  extends GeneralEntityLogic implements consignacion_detalle_logicI {	
	/*GENERAL*/
	public consignacion_detalle_data $consignacion_detalleDataAccess;
	//public ?consignacion_detalle_logic_add $consignacion_detalleLogicAdditional=null;
	public ?consignacion_detalle $consignacion_detalle;
	public array $consignacion_detalles;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->consignacion_detalleDataAccess = new consignacion_detalle_data();			
			$this->consignacion_detalles = array();
			$this->consignacion_detalle = new consignacion_detalle();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->consignacion_detalleLogicAdditional = new consignacion_detalle_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->consignacion_detalleLogicAdditional==null) {
		//	$this->consignacion_detalleLogicAdditional=new consignacion_detalle_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->consignacion_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->consignacion_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->consignacion_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->consignacion_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->consignacion_detalles = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->consignacion_detalles=$this->consignacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
			}
			
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGets($this->consignacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacion_detalles);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->consignacion_detalles = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->consignacion_detalles=$this->consignacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
			}
			
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGets($this->consignacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacion_detalles);
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
		$this->consignacion_detalle = new consignacion_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->consignacion_detalle=$this->consignacion_detalleDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->consignacion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				consignacion_detalle_util::refrescarFKDescripcion($this->consignacion_detalle);
			}
						
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGet($this->consignacion_detalle,$this->datosCliente);
			//consignacion_detalle_logic_add::updateconsignacion_detalleToGet($this->consignacion_detalle);
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
		$this->consignacion_detalle = new  consignacion_detalle();
		  		  
        try {		
			$this->consignacion_detalle=$this->consignacion_detalleDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->consignacion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				consignacion_detalle_util::refrescarFKDescripcion($this->consignacion_detalle);
			}
			
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGet($this->consignacion_detalle,$this->datosCliente);
			//consignacion_detalle_logic_add::updateconsignacion_detalleToGet($this->consignacion_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?consignacion_detalle {
		$consignacion_detalleLogic = new  consignacion_detalle_logic();
		  		  
        try {		
			$consignacion_detalleLogic->setConnexion($connexion);			
			$consignacion_detalleLogic->getEntity($id);			
			return $consignacion_detalleLogic->getconsignacion_detalle();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->consignacion_detalle = new  consignacion_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->consignacion_detalle=$this->consignacion_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->consignacion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				consignacion_detalle_util::refrescarFKDescripcion($this->consignacion_detalle);
			}
			
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGet($this->consignacion_detalle,$this->datosCliente);
			//consignacion_detalle_logic_add::updateconsignacion_detalleToGet($this->consignacion_detalle);
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
		$this->consignacion_detalle = new  consignacion_detalle();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->consignacion_detalle=$this->consignacion_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->consignacion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				consignacion_detalle_util::refrescarFKDescripcion($this->consignacion_detalle);
			}
			
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGet($this->consignacion_detalle,$this->datosCliente);
			//consignacion_detalle_logic_add::updateconsignacion_detalleToGet($this->consignacion_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?consignacion_detalle {
		$consignacion_detalleLogic = new  consignacion_detalle_logic();
		  		  
        try {		
			$consignacion_detalleLogic->setConnexion($connexion);			
			$consignacion_detalleLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $consignacion_detalleLogic->getconsignacion_detalle();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->consignacion_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->consignacion_detalles=$this->consignacion_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
			}
			
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGets($this->consignacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacion_detalles);			
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
		$this->consignacion_detalles = array();
		  		  
        try {			
			$this->consignacion_detalles=$this->consignacion_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
			}
			
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGets($this->consignacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacion_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->consignacion_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->consignacion_detalles=$this->consignacion_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
			}
			
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGets($this->consignacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacion_detalles);
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
		$this->consignacion_detalles = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->consignacion_detalles=$this->consignacion_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
			}
			
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGets($this->consignacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacion_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$consignacion_detalleLogic = new  consignacion_detalle_logic();
		  		  
        try {		
			$consignacion_detalleLogic->setConnexion($connexion);			
			$consignacion_detalleLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $consignacion_detalleLogic->getconsignacion_detalles();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->consignacion_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->consignacion_detalles=$this->consignacion_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
			}
			
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGets($this->consignacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacion_detalles);
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
		$this->consignacion_detalles = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->consignacion_detalles=$this->consignacion_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
			}
			
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGets($this->consignacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacion_detalles);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->consignacion_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->consignacion_detalles=$this->consignacion_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
			}
			
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGets($this->consignacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacion_detalles);
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
		$this->consignacion_detalles = array();
		  		  
        try {			
			$this->consignacion_detalles=$this->consignacion_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
			}	
			
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGets($this->consignacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacion_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->consignacion_detalles = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->consignacion_detalles=$this->consignacion_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
			}
			
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGets($this->consignacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacion_detalles);
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
		$this->consignacion_detalles = array();
		  		  
        try {		
			$this->consignacion_detalles=$this->consignacion_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
			}
			
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGets($this->consignacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacion_detalles);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdbodegaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_bodega) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_bodega= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,consignacion_detalle_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->consignacion_detalles=$this->consignacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
			}
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGets($this->consignacion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacion_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idbodega(string $strFinalQuery,Pagination $pagination,int $id_bodega) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_bodega= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,consignacion_detalle_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->consignacion_detalles=$this->consignacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
			}
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGets($this->consignacion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacion_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdconsignacionWithConnection(string $strFinalQuery,Pagination $pagination,int $id_consignacion) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_consignacion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_consignacion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_consignacion,consignacion_detalle_util::$ID_CONSIGNACION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_consignacion);

			$this->consignacion_detalles=$this->consignacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
			}
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGets($this->consignacion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacion_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idconsignacion(string $strFinalQuery,Pagination $pagination,int $id_consignacion) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_consignacion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_consignacion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_consignacion,consignacion_detalle_util::$ID_CONSIGNACION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_consignacion);

			$this->consignacion_detalles=$this->consignacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
			}
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGets($this->consignacion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacion_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdproductoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_producto) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_producto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,consignacion_detalle_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->consignacion_detalles=$this->consignacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
			}
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGets($this->consignacion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacion_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idproducto(string $strFinalQuery,Pagination $pagination,int $id_producto) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_producto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,consignacion_detalle_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->consignacion_detalles=$this->consignacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
			}
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGets($this->consignacion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacion_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdunidadWithConnection(string $strFinalQuery,Pagination $pagination,int $id_unidad) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_unidad= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_unidad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad,consignacion_detalle_util::$ID_UNIDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad);

			$this->consignacion_detalles=$this->consignacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
			}
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGets($this->consignacion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacion_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idunidad(string $strFinalQuery,Pagination $pagination,int $id_unidad) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_unidad= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_unidad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad,consignacion_detalle_util::$ID_UNIDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad);

			$this->consignacion_detalles=$this->consignacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
			}
			//consignacion_detalle_logic_add::checkconsignacion_detalleToGets($this->consignacion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacion_detalles);
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
						
			//consignacion_detalle_logic_add::checkconsignacion_detalleToSave($this->consignacion_detalle,$this->datosCliente,$this->connexion);	       
			//consignacion_detalle_logic_add::updateconsignacion_detalleToSave($this->consignacion_detalle);			
			consignacion_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->consignacion_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->consignacion_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->consignacion_detalle,$this->datosCliente,$this->connexion);
			
			
			consignacion_detalle_data::save($this->consignacion_detalle, $this->connexion);	    	       	 				
			//consignacion_detalle_logic_add::checkconsignacion_detalleToSaveAfter($this->consignacion_detalle,$this->datosCliente,$this->connexion);			
			//$this->consignacion_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->consignacion_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->consignacion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->consignacion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				consignacion_detalle_util::refrescarFKDescripcion($this->consignacion_detalle);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->consignacion_detalle->getIsDeleted()) {
				$this->consignacion_detalle=null;
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
						
			/*consignacion_detalle_logic_add::checkconsignacion_detalleToSave($this->consignacion_detalle,$this->datosCliente,$this->connexion);*/	        
			//consignacion_detalle_logic_add::updateconsignacion_detalleToSave($this->consignacion_detalle);			
			//$this->consignacion_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->consignacion_detalle,$this->datosCliente,$this->connexion);			
			consignacion_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->consignacion_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			consignacion_detalle_data::save($this->consignacion_detalle, $this->connexion);	    	       	 						
			/*consignacion_detalle_logic_add::checkconsignacion_detalleToSaveAfter($this->consignacion_detalle,$this->datosCliente,$this->connexion);*/			
			//$this->consignacion_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->consignacion_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->consignacion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->consignacion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				consignacion_detalle_util::refrescarFKDescripcion($this->consignacion_detalle);				
			}
			
			if($this->consignacion_detalle->getIsDeleted()) {
				$this->consignacion_detalle=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(consignacion_detalle $consignacion_detalle,Connexion $connexion)  {
		$consignacion_detalleLogic = new  consignacion_detalle_logic();		  		  
        try {		
			$consignacion_detalleLogic->setConnexion($connexion);			
			$consignacion_detalleLogic->setconsignacion_detalle($consignacion_detalle);			
			$consignacion_detalleLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*consignacion_detalle_logic_add::checkconsignacion_detalleToSaves($this->consignacion_detalles,$this->datosCliente,$this->connexion);*/	        	
			//$this->consignacion_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->consignacion_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->consignacion_detalles as $consignacion_detalleLocal) {				
								
				//consignacion_detalle_logic_add::updateconsignacion_detalleToSave($consignacion_detalleLocal);	        	
				consignacion_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$consignacion_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				consignacion_detalle_data::save($consignacion_detalleLocal, $this->connexion);				
			}
			
			/*consignacion_detalle_logic_add::checkconsignacion_detalleToSavesAfter($this->consignacion_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->consignacion_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->consignacion_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
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
			/*consignacion_detalle_logic_add::checkconsignacion_detalleToSaves($this->consignacion_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->consignacion_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->consignacion_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->consignacion_detalles as $consignacion_detalleLocal) {				
								
				//consignacion_detalle_logic_add::updateconsignacion_detalleToSave($consignacion_detalleLocal);	        	
				consignacion_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$consignacion_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				consignacion_detalle_data::save($consignacion_detalleLocal, $this->connexion);				
			}			
			
			/*consignacion_detalle_logic_add::checkconsignacion_detalleToSavesAfter($this->consignacion_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->consignacion_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->consignacion_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $consignacion_detalles,Connexion $connexion)  {
		$consignacion_detalleLogic = new  consignacion_detalle_logic();
		  		  
        try {		
			$consignacion_detalleLogic->setConnexion($connexion);			
			$consignacion_detalleLogic->setconsignacion_detalles($consignacion_detalles);			
			$consignacion_detalleLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$consignacion_detallesAux=array();
		
		foreach($this->consignacion_detalles as $consignacion_detalle) {
			if($consignacion_detalle->getIsDeleted()==false) {
				$consignacion_detallesAux[]=$consignacion_detalle;
			}
		}
		
		$this->consignacion_detalles=$consignacion_detallesAux;
	}
	
	public function updateToGetsAuxiliar(array &$consignacion_detalles) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->consignacion_detalles as $consignacion_detalle) {
				
				$consignacion_detalle->setid_consignacion_Descripcion(consignacion_detalle_util::getconsignacionDescripcion($consignacion_detalle->getconsignacion()));
				$consignacion_detalle->setid_bodega_Descripcion(consignacion_detalle_util::getbodegaDescripcion($consignacion_detalle->getbodega()));
				$consignacion_detalle->setid_producto_Descripcion(consignacion_detalle_util::getproductoDescripcion($consignacion_detalle->getproducto()));
				$consignacion_detalle->setid_unidad_Descripcion(consignacion_detalle_util::getunidadDescripcion($consignacion_detalle->getunidad()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$consignacion_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$consignacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$consignacion_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$consignacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$consignacion_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$consignacion_detalleForeignKey=new consignacion_detalle_param_return();//consignacion_detalleForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_consignacion',$strRecargarFkTipos,',')) {
				$this->cargarCombosconsignacionsFK($this->connexion,$strRecargarFkQuery,$consignacion_detalleForeignKey,$consignacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTipos,',')) {
				$this->cargarCombosbodegasFK($this->connexion,$strRecargarFkQuery,$consignacion_detalleForeignKey,$consignacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombosproductosFK($this->connexion,$strRecargarFkQuery,$consignacion_detalleForeignKey,$consignacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_unidad',$strRecargarFkTipos,',')) {
				$this->cargarCombosunidadsFK($this->connexion,$strRecargarFkQuery,$consignacion_detalleForeignKey,$consignacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_consignacion',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosconsignacionsFK($this->connexion,' where id=-1 ',$consignacion_detalleForeignKey,$consignacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosbodegasFK($this->connexion,' where id=-1 ',$consignacion_detalleForeignKey,$consignacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproductosFK($this->connexion,' where id=-1 ',$consignacion_detalleForeignKey,$consignacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_unidad',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosunidadsFK($this->connexion,' where id=-1 ',$consignacion_detalleForeignKey,$consignacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $consignacion_detalleForeignKey;
			
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
	
	
	public function cargarCombosconsignacionsFK($connexion=null,$strRecargarFkQuery='',$consignacion_detalleForeignKey,$consignacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$consignacionLogic= new consignacion_logic();
		$pagination= new Pagination();
		$consignacion_detalleForeignKey->consignacionsFK=array();

		$consignacionLogic->setConnexion($connexion);
		$consignacionLogic->getconsignacionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($consignacion_detalle_session==null) {
			$consignacion_detalle_session=new consignacion_detalle_session();
		}
		
		if($consignacion_detalle_session->bitBusquedaDesdeFKSesionconsignacion!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=consignacion_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalconsignacion=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalconsignacion=Funciones::GetFinalQueryAppend($finalQueryGlobalconsignacion, '');
				$finalQueryGlobalconsignacion.=consignacion_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalconsignacion.$strRecargarFkQuery;		

				$consignacionLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($consignacionLogic->getconsignacions() as $consignacionLocal ) {
				if($consignacion_detalleForeignKey->idconsignacionDefaultFK==0) {
					$consignacion_detalleForeignKey->idconsignacionDefaultFK=$consignacionLocal->getId();
				}

				$consignacion_detalleForeignKey->consignacionsFK[$consignacionLocal->getId()]=consignacion_detalle_util::getconsignacionDescripcion($consignacionLocal);
			}

		} else {

			if($consignacion_detalle_session->bigidconsignacionActual!=null && $consignacion_detalle_session->bigidconsignacionActual > 0) {
				$consignacionLogic->getEntity($consignacion_detalle_session->bigidconsignacionActual);//WithConnection

				$consignacion_detalleForeignKey->consignacionsFK[$consignacionLogic->getconsignacion()->getId()]=consignacion_detalle_util::getconsignacionDescripcion($consignacionLogic->getconsignacion());
				$consignacion_detalleForeignKey->idconsignacionDefaultFK=$consignacionLogic->getconsignacion()->getId();
			}
		}
	}

	public function cargarCombosbodegasFK($connexion=null,$strRecargarFkQuery='',$consignacion_detalleForeignKey,$consignacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$consignacion_detalleForeignKey->bodegasFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($consignacion_detalle_session==null) {
			$consignacion_detalle_session=new consignacion_detalle_session();
		}
		
		if($consignacion_detalle_session->bitBusquedaDesdeFKSesionbodega!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=bodega_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalbodega=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalbodega=Funciones::GetFinalQueryAppend($finalQueryGlobalbodega, '');
				$finalQueryGlobalbodega.=bodega_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalbodega.$strRecargarFkQuery;		

				$bodegaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($bodegaLogic->getbodegas() as $bodegaLocal ) {
				if($consignacion_detalleForeignKey->idbodegaDefaultFK==0) {
					$consignacion_detalleForeignKey->idbodegaDefaultFK=$bodegaLocal->getId();
				}

				$consignacion_detalleForeignKey->bodegasFK[$bodegaLocal->getId()]=consignacion_detalle_util::getbodegaDescripcion($bodegaLocal);
			}

		} else {

			if($consignacion_detalle_session->bigidbodegaActual!=null && $consignacion_detalle_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($consignacion_detalle_session->bigidbodegaActual);//WithConnection

				$consignacion_detalleForeignKey->bodegasFK[$bodegaLogic->getbodega()->getId()]=consignacion_detalle_util::getbodegaDescripcion($bodegaLogic->getbodega());
				$consignacion_detalleForeignKey->idbodegaDefaultFK=$bodegaLogic->getbodega()->getId();
			}
		}
	}

	public function cargarCombosproductosFK($connexion=null,$strRecargarFkQuery='',$consignacion_detalleForeignKey,$consignacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$consignacion_detalleForeignKey->productosFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($consignacion_detalle_session==null) {
			$consignacion_detalle_session=new consignacion_detalle_session();
		}
		
		if($consignacion_detalle_session->bitBusquedaDesdeFKSesionproducto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=producto_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalproducto=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalproducto=Funciones::GetFinalQueryAppend($finalQueryGlobalproducto, '');
				$finalQueryGlobalproducto.=producto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalproducto.$strRecargarFkQuery;		

				$productoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($productoLogic->getproductos() as $productoLocal ) {
				if($consignacion_detalleForeignKey->idproductoDefaultFK==0) {
					$consignacion_detalleForeignKey->idproductoDefaultFK=$productoLocal->getId();
				}

				$consignacion_detalleForeignKey->productosFK[$productoLocal->getId()]=consignacion_detalle_util::getproductoDescripcion($productoLocal);
			}

		} else {

			if($consignacion_detalle_session->bigidproductoActual!=null && $consignacion_detalle_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($consignacion_detalle_session->bigidproductoActual);//WithConnection

				$consignacion_detalleForeignKey->productosFK[$productoLogic->getproducto()->getId()]=consignacion_detalle_util::getproductoDescripcion($productoLogic->getproducto());
				$consignacion_detalleForeignKey->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	public function cargarCombosunidadsFK($connexion=null,$strRecargarFkQuery='',$consignacion_detalleForeignKey,$consignacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$unidadLogic= new unidad_logic();
		$pagination= new Pagination();
		$consignacion_detalleForeignKey->unidadsFK=array();

		$unidadLogic->setConnexion($connexion);
		$unidadLogic->getunidadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($consignacion_detalle_session==null) {
			$consignacion_detalle_session=new consignacion_detalle_session();
		}
		
		if($consignacion_detalle_session->bitBusquedaDesdeFKSesionunidad!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=unidad_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalunidad=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalunidad=Funciones::GetFinalQueryAppend($finalQueryGlobalunidad, '');
				$finalQueryGlobalunidad.=unidad_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalunidad.$strRecargarFkQuery;		

				$unidadLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($unidadLogic->getunidads() as $unidadLocal ) {
				if($consignacion_detalleForeignKey->idunidadDefaultFK==0) {
					$consignacion_detalleForeignKey->idunidadDefaultFK=$unidadLocal->getId();
				}

				$consignacion_detalleForeignKey->unidadsFK[$unidadLocal->getId()]=consignacion_detalle_util::getunidadDescripcion($unidadLocal);
			}

		} else {

			if($consignacion_detalle_session->bigidunidadActual!=null && $consignacion_detalle_session->bigidunidadActual > 0) {
				$unidadLogic->getEntity($consignacion_detalle_session->bigidunidadActual);//WithConnection

				$consignacion_detalleForeignKey->unidadsFK[$unidadLogic->getunidad()->getId()]=consignacion_detalle_util::getunidadDescripcion($unidadLogic->getunidad());
				$consignacion_detalleForeignKey->idunidadDefaultFK=$unidadLogic->getunidad()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($consignacion_detalle) {
		$this->saveRelacionesBase($consignacion_detalle,true);
	}

	public function saveRelaciones($consignacion_detalle) {
		$this->saveRelacionesBase($consignacion_detalle,false);
	}

	public function saveRelacionesBase($consignacion_detalle,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setconsignacion_detalle($consignacion_detalle);

			if(true) {

				//consignacion_detalle_logic_add::updateRelacionesToSave($consignacion_detalle,$this);

				if(($this->consignacion_detalle->getIsNew() || $this->consignacion_detalle->getIsChanged()) && !$this->consignacion_detalle->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->consignacion_detalle->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//consignacion_detalle_logic_add::updateRelacionesToSaveAfter($consignacion_detalle,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $consignacion_detalles,consignacion_detalle_param_return $consignacion_detalleParameterGeneral) : consignacion_detalle_param_return {
		$consignacion_detalleReturnGeneral=new consignacion_detalle_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $consignacion_detalleReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $consignacion_detalles,consignacion_detalle_param_return $consignacion_detalleParameterGeneral) : consignacion_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$consignacion_detalleReturnGeneral=new consignacion_detalle_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $consignacion_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $consignacion_detalles,consignacion_detalle $consignacion_detalle,consignacion_detalle_param_return $consignacion_detalleParameterGeneral,bool $isEsNuevoconsignacion_detalle,array $clases) : consignacion_detalle_param_return {
		 try {	
			$consignacion_detalleReturnGeneral=new consignacion_detalle_param_return();
	
			$consignacion_detalleReturnGeneral->setconsignacion_detalle($consignacion_detalle);
			$consignacion_detalleReturnGeneral->setconsignacion_detalles($consignacion_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$consignacion_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $consignacion_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $consignacion_detalles,consignacion_detalle $consignacion_detalle,consignacion_detalle_param_return $consignacion_detalleParameterGeneral,bool $isEsNuevoconsignacion_detalle,array $clases) : consignacion_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$consignacion_detalleReturnGeneral=new consignacion_detalle_param_return();
	
			$consignacion_detalleReturnGeneral->setconsignacion_detalle($consignacion_detalle);
			$consignacion_detalleReturnGeneral->setconsignacion_detalles($consignacion_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$consignacion_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $consignacion_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $consignacion_detalles,consignacion_detalle $consignacion_detalle,consignacion_detalle_param_return $consignacion_detalleParameterGeneral,bool $isEsNuevoconsignacion_detalle,array $clases) : consignacion_detalle_param_return {
		 try {	
			$consignacion_detalleReturnGeneral=new consignacion_detalle_param_return();
	
			$consignacion_detalleReturnGeneral->setconsignacion_detalle($consignacion_detalle);
			$consignacion_detalleReturnGeneral->setconsignacion_detalles($consignacion_detalles);
			
			
			
			return $consignacion_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $consignacion_detalles,consignacion_detalle $consignacion_detalle,consignacion_detalle_param_return $consignacion_detalleParameterGeneral,bool $isEsNuevoconsignacion_detalle,array $clases) : consignacion_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$consignacion_detalleReturnGeneral=new consignacion_detalle_param_return();
	
			$consignacion_detalleReturnGeneral->setconsignacion_detalle($consignacion_detalle);
			$consignacion_detalleReturnGeneral->setconsignacion_detalles($consignacion_detalles);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $consignacion_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,consignacion_detalle $consignacion_detalle,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,consignacion_detalle $consignacion_detalle,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		consignacion_detalle_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(consignacion_detalle $consignacion_detalle,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//consignacion_detalle_logic_add::updateconsignacion_detalleToGet($this->consignacion_detalle);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$consignacion_detalle->setconsignacion($this->consignacion_detalleDataAccess->getconsignacion($this->connexion,$consignacion_detalle));
		$consignacion_detalle->setbodega($this->consignacion_detalleDataAccess->getbodega($this->connexion,$consignacion_detalle));
		$consignacion_detalle->setproducto($this->consignacion_detalleDataAccess->getproducto($this->connexion,$consignacion_detalle));
		$consignacion_detalle->setunidad($this->consignacion_detalleDataAccess->getunidad($this->connexion,$consignacion_detalle));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class.'') {
				$consignacion_detalle->setconsignacion($this->consignacion_detalleDataAccess->getconsignacion($this->connexion,$consignacion_detalle));
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$consignacion_detalle->setbodega($this->consignacion_detalleDataAccess->getbodega($this->connexion,$consignacion_detalle));
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$consignacion_detalle->setproducto($this->consignacion_detalleDataAccess->getproducto($this->connexion,$consignacion_detalle));
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				$consignacion_detalle->setunidad($this->consignacion_detalleDataAccess->getunidad($this->connexion,$consignacion_detalle));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion_detalle->setconsignacion($this->consignacion_detalleDataAccess->getconsignacion($this->connexion,$consignacion_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion_detalle->setbodega($this->consignacion_detalleDataAccess->getbodega($this->connexion,$consignacion_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion_detalle->setproducto($this->consignacion_detalleDataAccess->getproducto($this->connexion,$consignacion_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion_detalle->setunidad($this->consignacion_detalleDataAccess->getunidad($this->connexion,$consignacion_detalle));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$consignacion_detalle->setconsignacion($this->consignacion_detalleDataAccess->getconsignacion($this->connexion,$consignacion_detalle));
		$consignacionLogic= new consignacion_logic($this->connexion);
		$consignacionLogic->deepLoad($consignacion_detalle->getconsignacion(),$isDeep,$deepLoadType,$clases);
				
		$consignacion_detalle->setbodega($this->consignacion_detalleDataAccess->getbodega($this->connexion,$consignacion_detalle));
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepLoad($consignacion_detalle->getbodega(),$isDeep,$deepLoadType,$clases);
				
		$consignacion_detalle->setproducto($this->consignacion_detalleDataAccess->getproducto($this->connexion,$consignacion_detalle));
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepLoad($consignacion_detalle->getproducto(),$isDeep,$deepLoadType,$clases);
				
		$consignacion_detalle->setunidad($this->consignacion_detalleDataAccess->getunidad($this->connexion,$consignacion_detalle));
		$unidadLogic= new unidad_logic($this->connexion);
		$unidadLogic->deepLoad($consignacion_detalle->getunidad(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class.'') {
				$consignacion_detalle->setconsignacion($this->consignacion_detalleDataAccess->getconsignacion($this->connexion,$consignacion_detalle));
				$consignacionLogic= new consignacion_logic($this->connexion);
				$consignacionLogic->deepLoad($consignacion_detalle->getconsignacion(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$consignacion_detalle->setbodega($this->consignacion_detalleDataAccess->getbodega($this->connexion,$consignacion_detalle));
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepLoad($consignacion_detalle->getbodega(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$consignacion_detalle->setproducto($this->consignacion_detalleDataAccess->getproducto($this->connexion,$consignacion_detalle));
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($consignacion_detalle->getproducto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				$consignacion_detalle->setunidad($this->consignacion_detalleDataAccess->getunidad($this->connexion,$consignacion_detalle));
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepLoad($consignacion_detalle->getunidad(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion_detalle->setconsignacion($this->consignacion_detalleDataAccess->getconsignacion($this->connexion,$consignacion_detalle));
			$consignacionLogic= new consignacion_logic($this->connexion);
			$consignacionLogic->deepLoad($consignacion_detalle->getconsignacion(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion_detalle->setbodega($this->consignacion_detalleDataAccess->getbodega($this->connexion,$consignacion_detalle));
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepLoad($consignacion_detalle->getbodega(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion_detalle->setproducto($this->consignacion_detalleDataAccess->getproducto($this->connexion,$consignacion_detalle));
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($consignacion_detalle->getproducto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion_detalle->setunidad($this->consignacion_detalleDataAccess->getunidad($this->connexion,$consignacion_detalle));
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepLoad($consignacion_detalle->getunidad(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(consignacion_detalle $consignacion_detalle,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//consignacion_detalle_logic_add::updateconsignacion_detalleToSave($this->consignacion_detalle);			
			
			if(!$paraDeleteCascade) {				
				consignacion_detalle_data::save($consignacion_detalle, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		consignacion_data::save($consignacion_detalle->getconsignacion(),$this->connexion);
		bodega_data::save($consignacion_detalle->getbodega(),$this->connexion);
		producto_data::save($consignacion_detalle->getproducto(),$this->connexion);
		unidad_data::save($consignacion_detalle->getunidad(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class.'') {
				consignacion_data::save($consignacion_detalle->getconsignacion(),$this->connexion);
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($consignacion_detalle->getbodega(),$this->connexion);
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($consignacion_detalle->getproducto(),$this->connexion);
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				unidad_data::save($consignacion_detalle->getunidad(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			consignacion_data::save($consignacion_detalle->getconsignacion(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($consignacion_detalle->getbodega(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($consignacion_detalle->getproducto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($consignacion_detalle->getunidad(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		consignacion_data::save($consignacion_detalle->getconsignacion(),$this->connexion);
		$consignacionLogic= new consignacion_logic($this->connexion);
		$consignacionLogic->deepSave($consignacion_detalle->getconsignacion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		bodega_data::save($consignacion_detalle->getbodega(),$this->connexion);
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepSave($consignacion_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		producto_data::save($consignacion_detalle->getproducto(),$this->connexion);
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepSave($consignacion_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		unidad_data::save($consignacion_detalle->getunidad(),$this->connexion);
		$unidadLogic= new unidad_logic($this->connexion);
		$unidadLogic->deepSave($consignacion_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class.'') {
				consignacion_data::save($consignacion_detalle->getconsignacion(),$this->connexion);
				$consignacionLogic= new consignacion_logic($this->connexion);
				$consignacionLogic->deepSave($consignacion_detalle->getconsignacion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($consignacion_detalle->getbodega(),$this->connexion);
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepSave($consignacion_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($consignacion_detalle->getproducto(),$this->connexion);
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepSave($consignacion_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				unidad_data::save($consignacion_detalle->getunidad(),$this->connexion);
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepSave($consignacion_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			consignacion_data::save($consignacion_detalle->getconsignacion(),$this->connexion);
			$consignacionLogic= new consignacion_logic($this->connexion);
			$consignacionLogic->deepSave($consignacion_detalle->getconsignacion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($consignacion_detalle->getbodega(),$this->connexion);
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepSave($consignacion_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($consignacion_detalle->getproducto(),$this->connexion);
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepSave($consignacion_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($consignacion_detalle->getunidad(),$this->connexion);
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepSave($consignacion_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				consignacion_detalle_data::save($consignacion_detalle, $this->connexion);
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
			
			$this->deepLoad($this->consignacion_detalle,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->consignacion_detalles as $consignacion_detalle) {
				$this->deepLoad($consignacion_detalle,$isDeep,$deepLoadType,$clases);
								
				consignacion_detalle_util::refrescarFKDescripciones($this->consignacion_detalles);
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
			
			foreach($this->consignacion_detalles as $consignacion_detalle) {
				$this->deepLoad($consignacion_detalle,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->consignacion_detalle,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->consignacion_detalles as $consignacion_detalle) {
				$this->deepSave($consignacion_detalle,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->consignacion_detalles as $consignacion_detalle) {
				$this->deepSave($consignacion_detalle,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(consignacion::$class);
				$classes[]=new Classe(bodega::$class);
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(unidad::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==consignacion::$class) {
						$classes[]=new Classe(consignacion::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==bodega::$class) {
						$classes[]=new Classe(bodega::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==producto::$class) {
						$classes[]=new Classe(producto::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==unidad::$class) {
						$classes[]=new Classe(unidad::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==consignacion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(consignacion::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==bodega::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(bodega::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(producto::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==unidad::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(unidad::$class);
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
	
	
	
	
	
	
	
	public function getconsignacion_detalle() : ?consignacion_detalle {	
		/*
		consignacion_detalle_logic_add::checkconsignacion_detalleToGet($this->consignacion_detalle,$this->datosCliente);
		consignacion_detalle_logic_add::updateconsignacion_detalleToGet($this->consignacion_detalle);
		*/
			
		return $this->consignacion_detalle;
	}
		
	public function setconsignacion_detalle(consignacion_detalle $newconsignacion_detalle) {
		$this->consignacion_detalle = $newconsignacion_detalle;
	}
	
	public function getconsignacion_detalles() : array {		
		/*
		consignacion_detalle_logic_add::checkconsignacion_detalleToGets($this->consignacion_detalles,$this->datosCliente);
		
		foreach ($this->consignacion_detalles as $consignacion_detalleLocal ) {
			consignacion_detalle_logic_add::updateconsignacion_detalleToGet($consignacion_detalleLocal);
		}
		*/
		
		return $this->consignacion_detalles;
	}
	
	public function setconsignacion_detalles(array $newconsignacion_detalles) {
		$this->consignacion_detalles = $newconsignacion_detalles;
	}
	
	public function getconsignacion_detalleDataAccess() : consignacion_detalle_data {
		return $this->consignacion_detalleDataAccess;
	}
	
	public function setconsignacion_detalleDataAccess(consignacion_detalle_data $newconsignacion_detalleDataAccess) {
		$this->consignacion_detalleDataAccess = $newconsignacion_detalleDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        consignacion_detalle_carga::$CONTROLLER;;        
		
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
