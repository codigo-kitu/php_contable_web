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

namespace com\bydan\contabilidad\inventario\inventario_fisico_detalle\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\inventario_fisico_detalle\util\inventario_fisico_detalle_carga;
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\util\inventario_fisico_detalle_param_return;

use com\bydan\contabilidad\inventario\inventario_fisico_detalle\presentation\session\inventario_fisico_detalle_session;

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

use com\bydan\contabilidad\inventario\inventario_fisico_detalle\util\inventario_fisico_detalle_util;
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\business\entity\inventario_fisico_detalle;
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\business\data\inventario_fisico_detalle_data;

//FK


use com\bydan\contabilidad\inventario\inventario_fisico\business\entity\inventario_fisico;
use com\bydan\contabilidad\inventario\inventario_fisico\business\data\inventario_fisico_data;
use com\bydan\contabilidad\inventario\inventario_fisico\business\logic\inventario_fisico_logic;
use com\bydan\contabilidad\inventario\inventario_fisico\util\inventario_fisico_util;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\data\bodega_data;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

//REL


//REL DETALLES




class inventario_fisico_detalle_logic  extends GeneralEntityLogic implements inventario_fisico_detalle_logicI {	
	/*GENERAL*/
	public inventario_fisico_detalle_data $inventario_fisico_detalleDataAccess;
	//public ?inventario_fisico_detalle_logic_add $inventario_fisico_detalleLogicAdditional=null;
	public ?inventario_fisico_detalle $inventario_fisico_detalle;
	public array $inventario_fisico_detalles;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->inventario_fisico_detalleDataAccess = new inventario_fisico_detalle_data();			
			$this->inventario_fisico_detalles = array();
			$this->inventario_fisico_detalle = new inventario_fisico_detalle();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->inventario_fisico_detalleLogicAdditional = new inventario_fisico_detalle_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->inventario_fisico_detalleLogicAdditional==null) {
		//	$this->inventario_fisico_detalleLogicAdditional=new inventario_fisico_detalle_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->inventario_fisico_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->inventario_fisico_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->inventario_fisico_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->inventario_fisico_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->inventario_fisico_detalles = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->inventario_fisico_detalles=$this->inventario_fisico_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_detalle_util::refrescarFKDescripciones($this->inventario_fisico_detalles);
			}
			
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGets($this->inventario_fisico_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisico_detalles);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->inventario_fisico_detalles = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->inventario_fisico_detalles=$this->inventario_fisico_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_detalle_util::refrescarFKDescripciones($this->inventario_fisico_detalles);
			}
			
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGets($this->inventario_fisico_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisico_detalles);
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
		$this->inventario_fisico_detalle = new inventario_fisico_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->inventario_fisico_detalle=$this->inventario_fisico_detalleDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->inventario_fisico_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				inventario_fisico_detalle_util::refrescarFKDescripcion($this->inventario_fisico_detalle);
			}
						
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGet($this->inventario_fisico_detalle,$this->datosCliente);
			//inventario_fisico_detalle_logic_add::updateinventario_fisico_detalleToGet($this->inventario_fisico_detalle);
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
		$this->inventario_fisico_detalle = new  inventario_fisico_detalle();
		  		  
        try {		
			$this->inventario_fisico_detalle=$this->inventario_fisico_detalleDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->inventario_fisico_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				inventario_fisico_detalle_util::refrescarFKDescripcion($this->inventario_fisico_detalle);
			}
			
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGet($this->inventario_fisico_detalle,$this->datosCliente);
			//inventario_fisico_detalle_logic_add::updateinventario_fisico_detalleToGet($this->inventario_fisico_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?inventario_fisico_detalle {
		$inventario_fisico_detalleLogic = new  inventario_fisico_detalle_logic();
		  		  
        try {		
			$inventario_fisico_detalleLogic->setConnexion($connexion);			
			$inventario_fisico_detalleLogic->getEntity($id);			
			return $inventario_fisico_detalleLogic->getinventario_fisico_detalle();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->inventario_fisico_detalle = new  inventario_fisico_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->inventario_fisico_detalle=$this->inventario_fisico_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->inventario_fisico_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				inventario_fisico_detalle_util::refrescarFKDescripcion($this->inventario_fisico_detalle);
			}
			
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGet($this->inventario_fisico_detalle,$this->datosCliente);
			//inventario_fisico_detalle_logic_add::updateinventario_fisico_detalleToGet($this->inventario_fisico_detalle);
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
		$this->inventario_fisico_detalle = new  inventario_fisico_detalle();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->inventario_fisico_detalle=$this->inventario_fisico_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->inventario_fisico_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				inventario_fisico_detalle_util::refrescarFKDescripcion($this->inventario_fisico_detalle);
			}
			
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGet($this->inventario_fisico_detalle,$this->datosCliente);
			//inventario_fisico_detalle_logic_add::updateinventario_fisico_detalleToGet($this->inventario_fisico_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?inventario_fisico_detalle {
		$inventario_fisico_detalleLogic = new  inventario_fisico_detalle_logic();
		  		  
        try {		
			$inventario_fisico_detalleLogic->setConnexion($connexion);			
			$inventario_fisico_detalleLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $inventario_fisico_detalleLogic->getinventario_fisico_detalle();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->inventario_fisico_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->inventario_fisico_detalles=$this->inventario_fisico_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_detalle_util::refrescarFKDescripciones($this->inventario_fisico_detalles);
			}
			
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGets($this->inventario_fisico_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisico_detalles);			
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
		$this->inventario_fisico_detalles = array();
		  		  
        try {			
			$this->inventario_fisico_detalles=$this->inventario_fisico_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_detalle_util::refrescarFKDescripciones($this->inventario_fisico_detalles);
			}
			
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGets($this->inventario_fisico_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisico_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->inventario_fisico_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->inventario_fisico_detalles=$this->inventario_fisico_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_detalle_util::refrescarFKDescripciones($this->inventario_fisico_detalles);
			}
			
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGets($this->inventario_fisico_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisico_detalles);
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
		$this->inventario_fisico_detalles = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->inventario_fisico_detalles=$this->inventario_fisico_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_detalle_util::refrescarFKDescripciones($this->inventario_fisico_detalles);
			}
			
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGets($this->inventario_fisico_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisico_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$inventario_fisico_detalleLogic = new  inventario_fisico_detalle_logic();
		  		  
        try {		
			$inventario_fisico_detalleLogic->setConnexion($connexion);			
			$inventario_fisico_detalleLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $inventario_fisico_detalleLogic->getinventario_fisico_detalles();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->inventario_fisico_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->inventario_fisico_detalles=$this->inventario_fisico_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_detalle_util::refrescarFKDescripciones($this->inventario_fisico_detalles);
			}
			
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGets($this->inventario_fisico_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisico_detalles);
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
		$this->inventario_fisico_detalles = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->inventario_fisico_detalles=$this->inventario_fisico_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_detalle_util::refrescarFKDescripciones($this->inventario_fisico_detalles);
			}
			
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGets($this->inventario_fisico_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisico_detalles);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->inventario_fisico_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->inventario_fisico_detalles=$this->inventario_fisico_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_detalle_util::refrescarFKDescripciones($this->inventario_fisico_detalles);
			}
			
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGets($this->inventario_fisico_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisico_detalles);
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
		$this->inventario_fisico_detalles = array();
		  		  
        try {			
			$this->inventario_fisico_detalles=$this->inventario_fisico_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_detalle_util::refrescarFKDescripciones($this->inventario_fisico_detalles);
			}	
			
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGets($this->inventario_fisico_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisico_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->inventario_fisico_detalles = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->inventario_fisico_detalles=$this->inventario_fisico_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_detalle_util::refrescarFKDescripciones($this->inventario_fisico_detalles);
			}
			
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGets($this->inventario_fisico_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisico_detalles);
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
		$this->inventario_fisico_detalles = array();
		  		  
        try {		
			$this->inventario_fisico_detalles=$this->inventario_fisico_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_detalle_util::refrescarFKDescripciones($this->inventario_fisico_detalles);
			}
			
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGets($this->inventario_fisico_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->inventario_fisico_detalles);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,inventario_fisico_detalle_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->inventario_fisico_detalles=$this->inventario_fisico_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				inventario_fisico_detalle_util::refrescarFKDescripciones($this->inventario_fisico_detalles);
			}
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGets($this->inventario_fisico_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->inventario_fisico_detalles);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,inventario_fisico_detalle_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->inventario_fisico_detalles=$this->inventario_fisico_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				inventario_fisico_detalle_util::refrescarFKDescripciones($this->inventario_fisico_detalles);
			}
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGets($this->inventario_fisico_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->inventario_fisico_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idinventario_fisicoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_inventario_fisico) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_inventario_fisico= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_inventario_fisico->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_inventario_fisico,inventario_fisico_detalle_util::$ID_INVENTARIO_FISICO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_inventario_fisico);

			$this->inventario_fisico_detalles=$this->inventario_fisico_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				inventario_fisico_detalle_util::refrescarFKDescripciones($this->inventario_fisico_detalles);
			}
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGets($this->inventario_fisico_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->inventario_fisico_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idinventario_fisico(string $strFinalQuery,Pagination $pagination,int $id_inventario_fisico) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_inventario_fisico= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_inventario_fisico->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_inventario_fisico,inventario_fisico_detalle_util::$ID_INVENTARIO_FISICO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_inventario_fisico);

			$this->inventario_fisico_detalles=$this->inventario_fisico_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				inventario_fisico_detalle_util::refrescarFKDescripciones($this->inventario_fisico_detalles);
			}
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGets($this->inventario_fisico_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->inventario_fisico_detalles);
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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,inventario_fisico_detalle_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->inventario_fisico_detalles=$this->inventario_fisico_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				inventario_fisico_detalle_util::refrescarFKDescripciones($this->inventario_fisico_detalles);
			}
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGets($this->inventario_fisico_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->inventario_fisico_detalles);

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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,inventario_fisico_detalle_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->inventario_fisico_detalles=$this->inventario_fisico_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				inventario_fisico_detalle_util::refrescarFKDescripciones($this->inventario_fisico_detalles);
			}
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGets($this->inventario_fisico_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->inventario_fisico_detalles);
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
						
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToSave($this->inventario_fisico_detalle,$this->datosCliente,$this->connexion);	       
			//inventario_fisico_detalle_logic_add::updateinventario_fisico_detalleToSave($this->inventario_fisico_detalle);			
			inventario_fisico_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->inventario_fisico_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->inventario_fisico_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->inventario_fisico_detalle,$this->datosCliente,$this->connexion);
			
			
			inventario_fisico_detalle_data::save($this->inventario_fisico_detalle, $this->connexion);	    	       	 				
			//inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToSaveAfter($this->inventario_fisico_detalle,$this->datosCliente,$this->connexion);			
			//$this->inventario_fisico_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->inventario_fisico_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->inventario_fisico_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->inventario_fisico_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				inventario_fisico_detalle_util::refrescarFKDescripcion($this->inventario_fisico_detalle);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->inventario_fisico_detalle->getIsDeleted()) {
				$this->inventario_fisico_detalle=null;
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
						
			/*inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToSave($this->inventario_fisico_detalle,$this->datosCliente,$this->connexion);*/	        
			//inventario_fisico_detalle_logic_add::updateinventario_fisico_detalleToSave($this->inventario_fisico_detalle);			
			//$this->inventario_fisico_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->inventario_fisico_detalle,$this->datosCliente,$this->connexion);			
			inventario_fisico_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->inventario_fisico_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			inventario_fisico_detalle_data::save($this->inventario_fisico_detalle, $this->connexion);	    	       	 						
			/*inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToSaveAfter($this->inventario_fisico_detalle,$this->datosCliente,$this->connexion);*/			
			//$this->inventario_fisico_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->inventario_fisico_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->inventario_fisico_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->inventario_fisico_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				inventario_fisico_detalle_util::refrescarFKDescripcion($this->inventario_fisico_detalle);				
			}
			
			if($this->inventario_fisico_detalle->getIsDeleted()) {
				$this->inventario_fisico_detalle=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(inventario_fisico_detalle $inventario_fisico_detalle,Connexion $connexion)  {
		$inventario_fisico_detalleLogic = new  inventario_fisico_detalle_logic();		  		  
        try {		
			$inventario_fisico_detalleLogic->setConnexion($connexion);			
			$inventario_fisico_detalleLogic->setinventario_fisico_detalle($inventario_fisico_detalle);			
			$inventario_fisico_detalleLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToSaves($this->inventario_fisico_detalles,$this->datosCliente,$this->connexion);*/	        	
			//$this->inventario_fisico_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->inventario_fisico_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->inventario_fisico_detalles as $inventario_fisico_detalleLocal) {				
								
				//inventario_fisico_detalle_logic_add::updateinventario_fisico_detalleToSave($inventario_fisico_detalleLocal);	        	
				inventario_fisico_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$inventario_fisico_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				inventario_fisico_detalle_data::save($inventario_fisico_detalleLocal, $this->connexion);				
			}
			
			/*inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToSavesAfter($this->inventario_fisico_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->inventario_fisico_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->inventario_fisico_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_detalle_util::refrescarFKDescripciones($this->inventario_fisico_detalles);
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
			/*inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToSaves($this->inventario_fisico_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->inventario_fisico_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->inventario_fisico_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->inventario_fisico_detalles as $inventario_fisico_detalleLocal) {				
								
				//inventario_fisico_detalle_logic_add::updateinventario_fisico_detalleToSave($inventario_fisico_detalleLocal);	        	
				inventario_fisico_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$inventario_fisico_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				inventario_fisico_detalle_data::save($inventario_fisico_detalleLocal, $this->connexion);				
			}			
			
			/*inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToSavesAfter($this->inventario_fisico_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->inventario_fisico_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->inventario_fisico_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				inventario_fisico_detalle_util::refrescarFKDescripciones($this->inventario_fisico_detalles);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $inventario_fisico_detalles,Connexion $connexion)  {
		$inventario_fisico_detalleLogic = new  inventario_fisico_detalle_logic();
		  		  
        try {		
			$inventario_fisico_detalleLogic->setConnexion($connexion);			
			$inventario_fisico_detalleLogic->setinventario_fisico_detalles($inventario_fisico_detalles);			
			$inventario_fisico_detalleLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$inventario_fisico_detallesAux=array();
		
		foreach($this->inventario_fisico_detalles as $inventario_fisico_detalle) {
			if($inventario_fisico_detalle->getIsDeleted()==false) {
				$inventario_fisico_detallesAux[]=$inventario_fisico_detalle;
			}
		}
		
		$this->inventario_fisico_detalles=$inventario_fisico_detallesAux;
	}
	
	public function updateToGetsAuxiliar(array &$inventario_fisico_detalles) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->inventario_fisico_detalles as $inventario_fisico_detalle) {
				
				$inventario_fisico_detalle->setid_inventario_fisico_Descripcion(inventario_fisico_detalle_util::getinventario_fisicoDescripcion($inventario_fisico_detalle->getinventario_fisico()));
				$inventario_fisico_detalle->setid_producto_Descripcion(inventario_fisico_detalle_util::getproductoDescripcion($inventario_fisico_detalle->getproducto()));
				$inventario_fisico_detalle->setid_bodega_Descripcion(inventario_fisico_detalle_util::getbodegaDescripcion($inventario_fisico_detalle->getbodega()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$inventario_fisico_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$inventario_fisico_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$inventario_fisico_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$inventario_fisico_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$inventario_fisico_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$inventario_fisico_detalleForeignKey=new inventario_fisico_detalle_param_return();//inventario_fisico_detalleForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_inventario_fisico',$strRecargarFkTipos,',')) {
				$this->cargarCombosinventario_fisicosFK($this->connexion,$strRecargarFkQuery,$inventario_fisico_detalleForeignKey,$inventario_fisico_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombosproductosFK($this->connexion,$strRecargarFkQuery,$inventario_fisico_detalleForeignKey,$inventario_fisico_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTipos,',')) {
				$this->cargarCombosbodegasFK($this->connexion,$strRecargarFkQuery,$inventario_fisico_detalleForeignKey,$inventario_fisico_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_inventario_fisico',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosinventario_fisicosFK($this->connexion,' where id=-1 ',$inventario_fisico_detalleForeignKey,$inventario_fisico_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproductosFK($this->connexion,' where id=-1 ',$inventario_fisico_detalleForeignKey,$inventario_fisico_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosbodegasFK($this->connexion,' where id=-1 ',$inventario_fisico_detalleForeignKey,$inventario_fisico_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $inventario_fisico_detalleForeignKey;
			
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
	
	
	public function cargarCombosinventario_fisicosFK($connexion=null,$strRecargarFkQuery='',$inventario_fisico_detalleForeignKey,$inventario_fisico_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$inventario_fisicoLogic= new inventario_fisico_logic();
		$pagination= new Pagination();
		$inventario_fisico_detalleForeignKey->inventario_fisicosFK=array();

		$inventario_fisicoLogic->setConnexion($connexion);
		$inventario_fisicoLogic->getinventario_fisicoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($inventario_fisico_detalle_session==null) {
			$inventario_fisico_detalle_session=new inventario_fisico_detalle_session();
		}
		
		if($inventario_fisico_detalle_session->bitBusquedaDesdeFKSesioninventario_fisico!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=inventario_fisico_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalinventario_fisico=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalinventario_fisico=Funciones::GetFinalQueryAppend($finalQueryGlobalinventario_fisico, '');
				$finalQueryGlobalinventario_fisico.=inventario_fisico_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalinventario_fisico.$strRecargarFkQuery;		

				$inventario_fisicoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($inventario_fisicoLogic->getinventario_fisicos() as $inventario_fisicoLocal ) {
				if($inventario_fisico_detalleForeignKey->idinventario_fisicoDefaultFK==0) {
					$inventario_fisico_detalleForeignKey->idinventario_fisicoDefaultFK=$inventario_fisicoLocal->getId();
				}

				$inventario_fisico_detalleForeignKey->inventario_fisicosFK[$inventario_fisicoLocal->getId()]=inventario_fisico_detalle_util::getinventario_fisicoDescripcion($inventario_fisicoLocal);
			}

		} else {

			if($inventario_fisico_detalle_session->bigidinventario_fisicoActual!=null && $inventario_fisico_detalle_session->bigidinventario_fisicoActual > 0) {
				$inventario_fisicoLogic->getEntity($inventario_fisico_detalle_session->bigidinventario_fisicoActual);//WithConnection

				$inventario_fisico_detalleForeignKey->inventario_fisicosFK[$inventario_fisicoLogic->getinventario_fisico()->getId()]=inventario_fisico_detalle_util::getinventario_fisicoDescripcion($inventario_fisicoLogic->getinventario_fisico());
				$inventario_fisico_detalleForeignKey->idinventario_fisicoDefaultFK=$inventario_fisicoLogic->getinventario_fisico()->getId();
			}
		}
	}

	public function cargarCombosproductosFK($connexion=null,$strRecargarFkQuery='',$inventario_fisico_detalleForeignKey,$inventario_fisico_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$inventario_fisico_detalleForeignKey->productosFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($inventario_fisico_detalle_session==null) {
			$inventario_fisico_detalle_session=new inventario_fisico_detalle_session();
		}
		
		if($inventario_fisico_detalle_session->bitBusquedaDesdeFKSesionproducto!=true) {
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
				if($inventario_fisico_detalleForeignKey->idproductoDefaultFK==0) {
					$inventario_fisico_detalleForeignKey->idproductoDefaultFK=$productoLocal->getId();
				}

				$inventario_fisico_detalleForeignKey->productosFK[$productoLocal->getId()]=inventario_fisico_detalle_util::getproductoDescripcion($productoLocal);
			}

		} else {

			if($inventario_fisico_detalle_session->bigidproductoActual!=null && $inventario_fisico_detalle_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($inventario_fisico_detalle_session->bigidproductoActual);//WithConnection

				$inventario_fisico_detalleForeignKey->productosFK[$productoLogic->getproducto()->getId()]=inventario_fisico_detalle_util::getproductoDescripcion($productoLogic->getproducto());
				$inventario_fisico_detalleForeignKey->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	public function cargarCombosbodegasFK($connexion=null,$strRecargarFkQuery='',$inventario_fisico_detalleForeignKey,$inventario_fisico_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$inventario_fisico_detalleForeignKey->bodegasFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($inventario_fisico_detalle_session==null) {
			$inventario_fisico_detalle_session=new inventario_fisico_detalle_session();
		}
		
		if($inventario_fisico_detalle_session->bitBusquedaDesdeFKSesionbodega!=true) {
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
				if($inventario_fisico_detalleForeignKey->idbodegaDefaultFK==0) {
					$inventario_fisico_detalleForeignKey->idbodegaDefaultFK=$bodegaLocal->getId();
				}

				$inventario_fisico_detalleForeignKey->bodegasFK[$bodegaLocal->getId()]=inventario_fisico_detalle_util::getbodegaDescripcion($bodegaLocal);
			}

		} else {

			if($inventario_fisico_detalle_session->bigidbodegaActual!=null && $inventario_fisico_detalle_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($inventario_fisico_detalle_session->bigidbodegaActual);//WithConnection

				$inventario_fisico_detalleForeignKey->bodegasFK[$bodegaLogic->getbodega()->getId()]=inventario_fisico_detalle_util::getbodegaDescripcion($bodegaLogic->getbodega());
				$inventario_fisico_detalleForeignKey->idbodegaDefaultFK=$bodegaLogic->getbodega()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($inventario_fisico_detalle) {
		$this->saveRelacionesBase($inventario_fisico_detalle,true);
	}

	public function saveRelaciones($inventario_fisico_detalle) {
		$this->saveRelacionesBase($inventario_fisico_detalle,false);
	}

	public function saveRelacionesBase($inventario_fisico_detalle,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setinventario_fisico_detalle($inventario_fisico_detalle);

			if(true) {

				//inventario_fisico_detalle_logic_add::updateRelacionesToSave($inventario_fisico_detalle,$this);

				if(($this->inventario_fisico_detalle->getIsNew() || $this->inventario_fisico_detalle->getIsChanged()) && !$this->inventario_fisico_detalle->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->inventario_fisico_detalle->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//inventario_fisico_detalle_logic_add::updateRelacionesToSaveAfter($inventario_fisico_detalle,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $inventario_fisico_detalles,inventario_fisico_detalle_param_return $inventario_fisico_detalleParameterGeneral) : inventario_fisico_detalle_param_return {
		$inventario_fisico_detalleReturnGeneral=new inventario_fisico_detalle_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $inventario_fisico_detalleReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $inventario_fisico_detalles,inventario_fisico_detalle_param_return $inventario_fisico_detalleParameterGeneral) : inventario_fisico_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$inventario_fisico_detalleReturnGeneral=new inventario_fisico_detalle_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $inventario_fisico_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $inventario_fisico_detalles,inventario_fisico_detalle $inventario_fisico_detalle,inventario_fisico_detalle_param_return $inventario_fisico_detalleParameterGeneral,bool $isEsNuevoinventario_fisico_detalle,array $clases) : inventario_fisico_detalle_param_return {
		 try {	
			$inventario_fisico_detalleReturnGeneral=new inventario_fisico_detalle_param_return();
	
			$inventario_fisico_detalleReturnGeneral->setinventario_fisico_detalle($inventario_fisico_detalle);
			$inventario_fisico_detalleReturnGeneral->setinventario_fisico_detalles($inventario_fisico_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$inventario_fisico_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $inventario_fisico_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $inventario_fisico_detalles,inventario_fisico_detalle $inventario_fisico_detalle,inventario_fisico_detalle_param_return $inventario_fisico_detalleParameterGeneral,bool $isEsNuevoinventario_fisico_detalle,array $clases) : inventario_fisico_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$inventario_fisico_detalleReturnGeneral=new inventario_fisico_detalle_param_return();
	
			$inventario_fisico_detalleReturnGeneral->setinventario_fisico_detalle($inventario_fisico_detalle);
			$inventario_fisico_detalleReturnGeneral->setinventario_fisico_detalles($inventario_fisico_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$inventario_fisico_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $inventario_fisico_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $inventario_fisico_detalles,inventario_fisico_detalle $inventario_fisico_detalle,inventario_fisico_detalle_param_return $inventario_fisico_detalleParameterGeneral,bool $isEsNuevoinventario_fisico_detalle,array $clases) : inventario_fisico_detalle_param_return {
		 try {	
			$inventario_fisico_detalleReturnGeneral=new inventario_fisico_detalle_param_return();
	
			$inventario_fisico_detalleReturnGeneral->setinventario_fisico_detalle($inventario_fisico_detalle);
			$inventario_fisico_detalleReturnGeneral->setinventario_fisico_detalles($inventario_fisico_detalles);
			
			
			
			return $inventario_fisico_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $inventario_fisico_detalles,inventario_fisico_detalle $inventario_fisico_detalle,inventario_fisico_detalle_param_return $inventario_fisico_detalleParameterGeneral,bool $isEsNuevoinventario_fisico_detalle,array $clases) : inventario_fisico_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$inventario_fisico_detalleReturnGeneral=new inventario_fisico_detalle_param_return();
	
			$inventario_fisico_detalleReturnGeneral->setinventario_fisico_detalle($inventario_fisico_detalle);
			$inventario_fisico_detalleReturnGeneral->setinventario_fisico_detalles($inventario_fisico_detalles);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $inventario_fisico_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,inventario_fisico_detalle $inventario_fisico_detalle,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,inventario_fisico_detalle $inventario_fisico_detalle,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		inventario_fisico_detalle_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(inventario_fisico_detalle $inventario_fisico_detalle,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//inventario_fisico_detalle_logic_add::updateinventario_fisico_detalleToGet($this->inventario_fisico_detalle);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$inventario_fisico_detalle->setinventario_fisico($this->inventario_fisico_detalleDataAccess->getinventario_fisico($this->connexion,$inventario_fisico_detalle));
		$inventario_fisico_detalle->setproducto($this->inventario_fisico_detalleDataAccess->getproducto($this->connexion,$inventario_fisico_detalle));
		$inventario_fisico_detalle->setbodega($this->inventario_fisico_detalleDataAccess->getbodega($this->connexion,$inventario_fisico_detalle));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico::$class.'') {
				$inventario_fisico_detalle->setinventario_fisico($this->inventario_fisico_detalleDataAccess->getinventario_fisico($this->connexion,$inventario_fisico_detalle));
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$inventario_fisico_detalle->setproducto($this->inventario_fisico_detalleDataAccess->getproducto($this->connexion,$inventario_fisico_detalle));
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$inventario_fisico_detalle->setbodega($this->inventario_fisico_detalleDataAccess->getbodega($this->connexion,$inventario_fisico_detalle));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$inventario_fisico_detalle->setinventario_fisico($this->inventario_fisico_detalleDataAccess->getinventario_fisico($this->connexion,$inventario_fisico_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$inventario_fisico_detalle->setproducto($this->inventario_fisico_detalleDataAccess->getproducto($this->connexion,$inventario_fisico_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$inventario_fisico_detalle->setbodega($this->inventario_fisico_detalleDataAccess->getbodega($this->connexion,$inventario_fisico_detalle));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$inventario_fisico_detalle->setinventario_fisico($this->inventario_fisico_detalleDataAccess->getinventario_fisico($this->connexion,$inventario_fisico_detalle));
		$inventario_fisicoLogic= new inventario_fisico_logic($this->connexion);
		$inventario_fisicoLogic->deepLoad($inventario_fisico_detalle->getinventario_fisico(),$isDeep,$deepLoadType,$clases);
				
		$inventario_fisico_detalle->setproducto($this->inventario_fisico_detalleDataAccess->getproducto($this->connexion,$inventario_fisico_detalle));
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepLoad($inventario_fisico_detalle->getproducto(),$isDeep,$deepLoadType,$clases);
				
		$inventario_fisico_detalle->setbodega($this->inventario_fisico_detalleDataAccess->getbodega($this->connexion,$inventario_fisico_detalle));
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepLoad($inventario_fisico_detalle->getbodega(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico::$class.'') {
				$inventario_fisico_detalle->setinventario_fisico($this->inventario_fisico_detalleDataAccess->getinventario_fisico($this->connexion,$inventario_fisico_detalle));
				$inventario_fisicoLogic= new inventario_fisico_logic($this->connexion);
				$inventario_fisicoLogic->deepLoad($inventario_fisico_detalle->getinventario_fisico(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$inventario_fisico_detalle->setproducto($this->inventario_fisico_detalleDataAccess->getproducto($this->connexion,$inventario_fisico_detalle));
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($inventario_fisico_detalle->getproducto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$inventario_fisico_detalle->setbodega($this->inventario_fisico_detalleDataAccess->getbodega($this->connexion,$inventario_fisico_detalle));
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepLoad($inventario_fisico_detalle->getbodega(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$inventario_fisico_detalle->setinventario_fisico($this->inventario_fisico_detalleDataAccess->getinventario_fisico($this->connexion,$inventario_fisico_detalle));
			$inventario_fisicoLogic= new inventario_fisico_logic($this->connexion);
			$inventario_fisicoLogic->deepLoad($inventario_fisico_detalle->getinventario_fisico(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$inventario_fisico_detalle->setproducto($this->inventario_fisico_detalleDataAccess->getproducto($this->connexion,$inventario_fisico_detalle));
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($inventario_fisico_detalle->getproducto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$inventario_fisico_detalle->setbodega($this->inventario_fisico_detalleDataAccess->getbodega($this->connexion,$inventario_fisico_detalle));
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepLoad($inventario_fisico_detalle->getbodega(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(inventario_fisico_detalle $inventario_fisico_detalle,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//inventario_fisico_detalle_logic_add::updateinventario_fisico_detalleToSave($this->inventario_fisico_detalle);			
			
			if(!$paraDeleteCascade) {				
				inventario_fisico_detalle_data::save($inventario_fisico_detalle, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		inventario_fisico_data::save($inventario_fisico_detalle->getinventario_fisico(),$this->connexion);
		producto_data::save($inventario_fisico_detalle->getproducto(),$this->connexion);
		bodega_data::save($inventario_fisico_detalle->getbodega(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico::$class.'') {
				inventario_fisico_data::save($inventario_fisico_detalle->getinventario_fisico(),$this->connexion);
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($inventario_fisico_detalle->getproducto(),$this->connexion);
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($inventario_fisico_detalle->getbodega(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			inventario_fisico_data::save($inventario_fisico_detalle->getinventario_fisico(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($inventario_fisico_detalle->getproducto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($inventario_fisico_detalle->getbodega(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		inventario_fisico_data::save($inventario_fisico_detalle->getinventario_fisico(),$this->connexion);
		$inventario_fisicoLogic= new inventario_fisico_logic($this->connexion);
		$inventario_fisicoLogic->deepSave($inventario_fisico_detalle->getinventario_fisico(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		producto_data::save($inventario_fisico_detalle->getproducto(),$this->connexion);
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepSave($inventario_fisico_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		bodega_data::save($inventario_fisico_detalle->getbodega(),$this->connexion);
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepSave($inventario_fisico_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico::$class.'') {
				inventario_fisico_data::save($inventario_fisico_detalle->getinventario_fisico(),$this->connexion);
				$inventario_fisicoLogic= new inventario_fisico_logic($this->connexion);
				$inventario_fisicoLogic->deepSave($inventario_fisico_detalle->getinventario_fisico(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($inventario_fisico_detalle->getproducto(),$this->connexion);
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepSave($inventario_fisico_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($inventario_fisico_detalle->getbodega(),$this->connexion);
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepSave($inventario_fisico_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==inventario_fisico::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			inventario_fisico_data::save($inventario_fisico_detalle->getinventario_fisico(),$this->connexion);
			$inventario_fisicoLogic= new inventario_fisico_logic($this->connexion);
			$inventario_fisicoLogic->deepSave($inventario_fisico_detalle->getinventario_fisico(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($inventario_fisico_detalle->getproducto(),$this->connexion);
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepSave($inventario_fisico_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($inventario_fisico_detalle->getbodega(),$this->connexion);
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepSave($inventario_fisico_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				inventario_fisico_detalle_data::save($inventario_fisico_detalle, $this->connexion);
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
			
			$this->deepLoad($this->inventario_fisico_detalle,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->inventario_fisico_detalles as $inventario_fisico_detalle) {
				$this->deepLoad($inventario_fisico_detalle,$isDeep,$deepLoadType,$clases);
								
				inventario_fisico_detalle_util::refrescarFKDescripciones($this->inventario_fisico_detalles);
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
			
			foreach($this->inventario_fisico_detalles as $inventario_fisico_detalle) {
				$this->deepLoad($inventario_fisico_detalle,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->inventario_fisico_detalle,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->inventario_fisico_detalles as $inventario_fisico_detalle) {
				$this->deepSave($inventario_fisico_detalle,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->inventario_fisico_detalles as $inventario_fisico_detalle) {
				$this->deepSave($inventario_fisico_detalle,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(inventario_fisico::$class);
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(bodega::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==inventario_fisico::$class) {
						$classes[]=new Classe(inventario_fisico::$class);
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
					if($clas->clas==bodega::$class) {
						$classes[]=new Classe(bodega::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==inventario_fisico::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(inventario_fisico::$class);
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
					if($clas->clas==bodega::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(bodega::$class);
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
	
	
	
	
	
	
	
	public function getinventario_fisico_detalle() : ?inventario_fisico_detalle {	
		/*
		inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGet($this->inventario_fisico_detalle,$this->datosCliente);
		inventario_fisico_detalle_logic_add::updateinventario_fisico_detalleToGet($this->inventario_fisico_detalle);
		*/
			
		return $this->inventario_fisico_detalle;
	}
		
	public function setinventario_fisico_detalle(inventario_fisico_detalle $newinventario_fisico_detalle) {
		$this->inventario_fisico_detalle = $newinventario_fisico_detalle;
	}
	
	public function getinventario_fisico_detalles() : array {		
		/*
		inventario_fisico_detalle_logic_add::checkinventario_fisico_detalleToGets($this->inventario_fisico_detalles,$this->datosCliente);
		
		foreach ($this->inventario_fisico_detalles as $inventario_fisico_detalleLocal ) {
			inventario_fisico_detalle_logic_add::updateinventario_fisico_detalleToGet($inventario_fisico_detalleLocal);
		}
		*/
		
		return $this->inventario_fisico_detalles;
	}
	
	public function setinventario_fisico_detalles(array $newinventario_fisico_detalles) {
		$this->inventario_fisico_detalles = $newinventario_fisico_detalles;
	}
	
	public function getinventario_fisico_detalleDataAccess() : inventario_fisico_detalle_data {
		return $this->inventario_fisico_detalleDataAccess;
	}
	
	public function setinventario_fisico_detalleDataAccess(inventario_fisico_detalle_data $newinventario_fisico_detalleDataAccess) {
		$this->inventario_fisico_detalleDataAccess = $newinventario_fisico_detalleDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        inventario_fisico_detalle_carga::$CONTROLLER;;        
		
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
