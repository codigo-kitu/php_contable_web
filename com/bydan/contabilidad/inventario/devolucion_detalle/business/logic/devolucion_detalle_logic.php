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

namespace com\bydan\contabilidad\inventario\devolucion_detalle\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\devolucion_detalle\util\devolucion_detalle_carga;
use com\bydan\contabilidad\inventario\devolucion_detalle\util\devolucion_detalle_param_return;

use com\bydan\contabilidad\inventario\devolucion_detalle\presentation\session\devolucion_detalle_session;

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

use com\bydan\contabilidad\inventario\devolucion_detalle\util\devolucion_detalle_util;
use com\bydan\contabilidad\inventario\devolucion_detalle\business\entity\devolucion_detalle;
use com\bydan\contabilidad\inventario\devolucion_detalle\business\data\devolucion_detalle_data;

//FK


use com\bydan\contabilidad\inventario\devolucion\business\entity\devolucion;
use com\bydan\contabilidad\inventario\devolucion\business\data\devolucion_data;
use com\bydan\contabilidad\inventario\devolucion\business\logic\devolucion_logic;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_util;

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




class devolucion_detalle_logic  extends GeneralEntityLogic implements devolucion_detalle_logicI {	
	/*GENERAL*/
	public devolucion_detalle_data $devolucion_detalleDataAccess;
	public ?devolucion_detalle_logic_add $devolucion_detalleLogicAdditional=null;
	public ?devolucion_detalle $devolucion_detalle;
	public array $devolucion_detalles;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->devolucion_detalleDataAccess = new devolucion_detalle_data();			
			$this->devolucion_detalles = array();
			$this->devolucion_detalle = new devolucion_detalle();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->devolucion_detalleLogicAdditional = new devolucion_detalle_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->devolucion_detalleLogicAdditional==null) {
			$this->devolucion_detalleLogicAdditional=new devolucion_detalle_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->devolucion_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->devolucion_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->devolucion_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->devolucion_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->devolucion_detalles = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion_detalles=$this->devolucion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
			}
			
			devolucion_detalle_logic_add::checkdevolucion_detalleToGets($this->devolucion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_detalles);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->devolucion_detalles = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion_detalles=$this->devolucion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
			}
			
			devolucion_detalle_logic_add::checkdevolucion_detalleToGets($this->devolucion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_detalles);
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
		$this->devolucion_detalle = new devolucion_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->devolucion_detalle=$this->devolucion_detalleDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->devolucion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				devolucion_detalle_util::refrescarFKDescripcion($this->devolucion_detalle);
			}
						
			devolucion_detalle_logic_add::checkdevolucion_detalleToGet($this->devolucion_detalle,$this->datosCliente);
			devolucion_detalle_logic_add::updatedevolucion_detalleToGet($this->devolucion_detalle);
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
		$this->devolucion_detalle = new  devolucion_detalle();
		  		  
        try {		
			$this->devolucion_detalle=$this->devolucion_detalleDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->devolucion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				devolucion_detalle_util::refrescarFKDescripcion($this->devolucion_detalle);
			}
			
			devolucion_detalle_logic_add::checkdevolucion_detalleToGet($this->devolucion_detalle,$this->datosCliente);
			devolucion_detalle_logic_add::updatedevolucion_detalleToGet($this->devolucion_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?devolucion_detalle {
		$devolucion_detalleLogic = new  devolucion_detalle_logic();
		  		  
        try {		
			$devolucion_detalleLogic->setConnexion($connexion);			
			$devolucion_detalleLogic->getEntity($id);			
			return $devolucion_detalleLogic->getdevolucion_detalle();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->devolucion_detalle = new  devolucion_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->devolucion_detalle=$this->devolucion_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->devolucion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				devolucion_detalle_util::refrescarFKDescripcion($this->devolucion_detalle);
			}
			
			devolucion_detalle_logic_add::checkdevolucion_detalleToGet($this->devolucion_detalle,$this->datosCliente);
			devolucion_detalle_logic_add::updatedevolucion_detalleToGet($this->devolucion_detalle);
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
		$this->devolucion_detalle = new  devolucion_detalle();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion_detalle=$this->devolucion_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->devolucion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				devolucion_detalle_util::refrescarFKDescripcion($this->devolucion_detalle);
			}
			
			devolucion_detalle_logic_add::checkdevolucion_detalleToGet($this->devolucion_detalle,$this->datosCliente);
			devolucion_detalle_logic_add::updatedevolucion_detalleToGet($this->devolucion_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?devolucion_detalle {
		$devolucion_detalleLogic = new  devolucion_detalle_logic();
		  		  
        try {		
			$devolucion_detalleLogic->setConnexion($connexion);			
			$devolucion_detalleLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $devolucion_detalleLogic->getdevolucion_detalle();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->devolucion_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->devolucion_detalles=$this->devolucion_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
			}
			
			devolucion_detalle_logic_add::checkdevolucion_detalleToGets($this->devolucion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_detalles);			
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
		$this->devolucion_detalles = array();
		  		  
        try {			
			$this->devolucion_detalles=$this->devolucion_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
			}
			
			devolucion_detalle_logic_add::checkdevolucion_detalleToGets($this->devolucion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->devolucion_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion_detalles=$this->devolucion_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
			}
			
			devolucion_detalle_logic_add::checkdevolucion_detalleToGets($this->devolucion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_detalles);
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
		$this->devolucion_detalles = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion_detalles=$this->devolucion_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
			}
			
			devolucion_detalle_logic_add::checkdevolucion_detalleToGets($this->devolucion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$devolucion_detalleLogic = new  devolucion_detalle_logic();
		  		  
        try {		
			$devolucion_detalleLogic->setConnexion($connexion);			
			$devolucion_detalleLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $devolucion_detalleLogic->getdevolucion_detalles();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->devolucion_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->devolucion_detalles=$this->devolucion_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
			}
			
			devolucion_detalle_logic_add::checkdevolucion_detalleToGets($this->devolucion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_detalles);
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
		$this->devolucion_detalles = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion_detalles=$this->devolucion_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
			}
			
			devolucion_detalle_logic_add::checkdevolucion_detalleToGets($this->devolucion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_detalles);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->devolucion_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion_detalles=$this->devolucion_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
			}
			
			devolucion_detalle_logic_add::checkdevolucion_detalleToGets($this->devolucion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_detalles);
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
		$this->devolucion_detalles = array();
		  		  
        try {			
			$this->devolucion_detalles=$this->devolucion_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
			}	
			
			devolucion_detalle_logic_add::checkdevolucion_detalleToGets($this->devolucion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->devolucion_detalles = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->devolucion_detalles=$this->devolucion_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
			}
			
			devolucion_detalle_logic_add::checkdevolucion_detalleToGets($this->devolucion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_detalles);
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
		$this->devolucion_detalles = array();
		  		  
        try {		
			$this->devolucion_detalles=$this->devolucion_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
			}
			
			devolucion_detalle_logic_add::checkdevolucion_detalleToGets($this->devolucion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_detalles);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,devolucion_detalle_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->devolucion_detalles=$this->devolucion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
			}
			devolucion_detalle_logic_add::checkdevolucion_detalleToGets($this->devolucion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_detalles);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,devolucion_detalle_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->devolucion_detalles=$this->devolucion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
			}
			devolucion_detalle_logic_add::checkdevolucion_detalleToGets($this->devolucion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IddevolucionWithConnection(string $strFinalQuery,Pagination $pagination,int $id_devolucion) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_devolucion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_devolucion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_devolucion,devolucion_detalle_util::$ID_DEVOLUCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_devolucion);

			$this->devolucion_detalles=$this->devolucion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
			}
			devolucion_detalle_logic_add::checkdevolucion_detalleToGets($this->devolucion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Iddevolucion(string $strFinalQuery,Pagination $pagination,int $id_devolucion) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_devolucion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_devolucion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_devolucion,devolucion_detalle_util::$ID_DEVOLUCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_devolucion);

			$this->devolucion_detalles=$this->devolucion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
			}
			devolucion_detalle_logic_add::checkdevolucion_detalleToGets($this->devolucion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_detalles);
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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,devolucion_detalle_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->devolucion_detalles=$this->devolucion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
			}
			devolucion_detalle_logic_add::checkdevolucion_detalleToGets($this->devolucion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_detalles);

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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,devolucion_detalle_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->devolucion_detalles=$this->devolucion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
			}
			devolucion_detalle_logic_add::checkdevolucion_detalleToGets($this->devolucion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_detalles);
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
			$parameterSelectionGeneralid_unidad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad,devolucion_detalle_util::$ID_UNIDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad);

			$this->devolucion_detalles=$this->devolucion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
			}
			devolucion_detalle_logic_add::checkdevolucion_detalleToGets($this->devolucion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_detalles);

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
			$parameterSelectionGeneralid_unidad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad,devolucion_detalle_util::$ID_UNIDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad);

			$this->devolucion_detalles=$this->devolucion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
			}
			devolucion_detalle_logic_add::checkdevolucion_detalleToGets($this->devolucion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_detalles);
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
						
			//devolucion_detalle_logic_add::checkdevolucion_detalleToSave($this->devolucion_detalle,$this->datosCliente,$this->connexion);	       
			devolucion_detalle_logic_add::updatedevolucion_detalleToSave($this->devolucion_detalle);			
			devolucion_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->devolucion_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->devolucion_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->devolucion_detalle,$this->datosCliente,$this->connexion);
			
			
			devolucion_detalle_data::save($this->devolucion_detalle, $this->connexion);	    	       	 				
			//devolucion_detalle_logic_add::checkdevolucion_detalleToSaveAfter($this->devolucion_detalle,$this->datosCliente,$this->connexion);			
			$this->devolucion_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->devolucion_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->devolucion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->devolucion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				devolucion_detalle_util::refrescarFKDescripcion($this->devolucion_detalle);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->devolucion_detalle->getIsDeleted()) {
				$this->devolucion_detalle=null;
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
						
			/*devolucion_detalle_logic_add::checkdevolucion_detalleToSave($this->devolucion_detalle,$this->datosCliente,$this->connexion);*/	        
			devolucion_detalle_logic_add::updatedevolucion_detalleToSave($this->devolucion_detalle);			
			$this->devolucion_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->devolucion_detalle,$this->datosCliente,$this->connexion);			
			devolucion_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->devolucion_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			devolucion_detalle_data::save($this->devolucion_detalle, $this->connexion);	    	       	 						
			/*devolucion_detalle_logic_add::checkdevolucion_detalleToSaveAfter($this->devolucion_detalle,$this->datosCliente,$this->connexion);*/			
			$this->devolucion_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->devolucion_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->devolucion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->devolucion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				devolucion_detalle_util::refrescarFKDescripcion($this->devolucion_detalle);				
			}
			
			if($this->devolucion_detalle->getIsDeleted()) {
				$this->devolucion_detalle=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(devolucion_detalle $devolucion_detalle,Connexion $connexion)  {
		$devolucion_detalleLogic = new  devolucion_detalle_logic();		  		  
        try {		
			$devolucion_detalleLogic->setConnexion($connexion);			
			$devolucion_detalleLogic->setdevolucion_detalle($devolucion_detalle);			
			$devolucion_detalleLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*devolucion_detalle_logic_add::checkdevolucion_detalleToSaves($this->devolucion_detalles,$this->datosCliente,$this->connexion);*/	        	
			$this->devolucion_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->devolucion_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->devolucion_detalles as $devolucion_detalleLocal) {				
								
				devolucion_detalle_logic_add::updatedevolucion_detalleToSave($devolucion_detalleLocal);	        	
				devolucion_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$devolucion_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				devolucion_detalle_data::save($devolucion_detalleLocal, $this->connexion);				
			}
			
			/*devolucion_detalle_logic_add::checkdevolucion_detalleToSavesAfter($this->devolucion_detalles,$this->datosCliente,$this->connexion);*/			
			$this->devolucion_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->devolucion_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
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
			/*devolucion_detalle_logic_add::checkdevolucion_detalleToSaves($this->devolucion_detalles,$this->datosCliente,$this->connexion);*/			
			$this->devolucion_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->devolucion_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->devolucion_detalles as $devolucion_detalleLocal) {				
								
				devolucion_detalle_logic_add::updatedevolucion_detalleToSave($devolucion_detalleLocal);	        	
				devolucion_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$devolucion_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				devolucion_detalle_data::save($devolucion_detalleLocal, $this->connexion);				
			}			
			
			/*devolucion_detalle_logic_add::checkdevolucion_detalleToSavesAfter($this->devolucion_detalles,$this->datosCliente,$this->connexion);*/			
			$this->devolucion_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->devolucion_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $devolucion_detalles,Connexion $connexion)  {
		$devolucion_detalleLogic = new  devolucion_detalle_logic();
		  		  
        try {		
			$devolucion_detalleLogic->setConnexion($connexion);			
			$devolucion_detalleLogic->setdevolucion_detalles($devolucion_detalles);			
			$devolucion_detalleLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$devolucion_detallesAux=array();
		
		foreach($this->devolucion_detalles as $devolucion_detalle) {
			if($devolucion_detalle->getIsDeleted()==false) {
				$devolucion_detallesAux[]=$devolucion_detalle;
			}
		}
		
		$this->devolucion_detalles=$devolucion_detallesAux;
	}
	
	public function updateToGetsAuxiliar(array &$devolucion_detalles) {
		if($this->devolucion_detalleLogicAdditional==null) {
			$this->devolucion_detalleLogicAdditional=new devolucion_detalle_logic_add();
		}
		
		
		$this->devolucion_detalleLogicAdditional->updateToGets($devolucion_detalles,$this);					
		$this->devolucion_detalleLogicAdditional->updateToGetsReferencia($devolucion_detalles,$this);			
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->devolucion_detalles as $devolucion_detalle) {
				
				$devolucion_detalle->setid_devolucion_Descripcion(devolucion_detalle_util::getdevolucionDescripcion($devolucion_detalle->getdevolucion()));
				$devolucion_detalle->setid_bodega_Descripcion(devolucion_detalle_util::getbodegaDescripcion($devolucion_detalle->getbodega()));
				$devolucion_detalle->setid_producto_Descripcion(devolucion_detalle_util::getproductoDescripcion($devolucion_detalle->getproducto()));
				$devolucion_detalle->setid_unidad_Descripcion(devolucion_detalle_util::getunidadDescripcion($devolucion_detalle->getunidad()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$devolucion_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$devolucion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$devolucion_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$devolucion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$devolucion_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$devolucion_detalleForeignKey=new devolucion_detalle_param_return();//devolucion_detalleForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_devolucion',$strRecargarFkTipos,',')) {
				$this->cargarCombosdevolucionsFK($this->connexion,$strRecargarFkQuery,$devolucion_detalleForeignKey,$devolucion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTipos,',')) {
				$this->cargarCombosbodegasFK($this->connexion,$strRecargarFkQuery,$devolucion_detalleForeignKey,$devolucion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombosproductosFK($this->connexion,$strRecargarFkQuery,$devolucion_detalleForeignKey,$devolucion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_unidad',$strRecargarFkTipos,',')) {
				$this->cargarCombosunidadsFK($this->connexion,$strRecargarFkQuery,$devolucion_detalleForeignKey,$devolucion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_devolucion',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosdevolucionsFK($this->connexion,' where id=-1 ',$devolucion_detalleForeignKey,$devolucion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosbodegasFK($this->connexion,' where id=-1 ',$devolucion_detalleForeignKey,$devolucion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproductosFK($this->connexion,' where id=-1 ',$devolucion_detalleForeignKey,$devolucion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_unidad',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosunidadsFK($this->connexion,' where id=-1 ',$devolucion_detalleForeignKey,$devolucion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $devolucion_detalleForeignKey;
			
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
	
	
	public function cargarCombosdevolucionsFK($connexion=null,$strRecargarFkQuery='',$devolucion_detalleForeignKey,$devolucion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$devolucionLogic= new devolucion_logic();
		$pagination= new Pagination();
		$devolucion_detalleForeignKey->devolucionsFK=array();

		$devolucionLogic->setConnexion($connexion);
		$devolucionLogic->getdevolucionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_detalle_session==null) {
			$devolucion_detalle_session=new devolucion_detalle_session();
		}
		
		if($devolucion_detalle_session->bitBusquedaDesdeFKSesiondevolucion!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=devolucion_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaldevolucion=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaldevolucion=Funciones::GetFinalQueryAppend($finalQueryGlobaldevolucion, '');
				$finalQueryGlobaldevolucion.=devolucion_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaldevolucion.$strRecargarFkQuery;		

				$devolucionLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($devolucionLogic->getdevolucions() as $devolucionLocal ) {
				if($devolucion_detalleForeignKey->iddevolucionDefaultFK==0) {
					$devolucion_detalleForeignKey->iddevolucionDefaultFK=$devolucionLocal->getId();
				}

				$devolucion_detalleForeignKey->devolucionsFK[$devolucionLocal->getId()]=devolucion_detalle_util::getdevolucionDescripcion($devolucionLocal);
			}

		} else {

			if($devolucion_detalle_session->bigiddevolucionActual!=null && $devolucion_detalle_session->bigiddevolucionActual > 0) {
				$devolucionLogic->getEntity($devolucion_detalle_session->bigiddevolucionActual);//WithConnection

				$devolucion_detalleForeignKey->devolucionsFK[$devolucionLogic->getdevolucion()->getId()]=devolucion_detalle_util::getdevolucionDescripcion($devolucionLogic->getdevolucion());
				$devolucion_detalleForeignKey->iddevolucionDefaultFK=$devolucionLogic->getdevolucion()->getId();
			}
		}
	}

	public function cargarCombosbodegasFK($connexion=null,$strRecargarFkQuery='',$devolucion_detalleForeignKey,$devolucion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$devolucion_detalleForeignKey->bodegasFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_detalle_session==null) {
			$devolucion_detalle_session=new devolucion_detalle_session();
		}
		
		if($devolucion_detalle_session->bitBusquedaDesdeFKSesionbodega!=true) {
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
				if($devolucion_detalleForeignKey->idbodegaDefaultFK==0) {
					$devolucion_detalleForeignKey->idbodegaDefaultFK=$bodegaLocal->getId();
				}

				$devolucion_detalleForeignKey->bodegasFK[$bodegaLocal->getId()]=devolucion_detalle_util::getbodegaDescripcion($bodegaLocal);
			}

		} else {

			if($devolucion_detalle_session->bigidbodegaActual!=null && $devolucion_detalle_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($devolucion_detalle_session->bigidbodegaActual);//WithConnection

				$devolucion_detalleForeignKey->bodegasFK[$bodegaLogic->getbodega()->getId()]=devolucion_detalle_util::getbodegaDescripcion($bodegaLogic->getbodega());
				$devolucion_detalleForeignKey->idbodegaDefaultFK=$bodegaLogic->getbodega()->getId();
			}
		}
	}

	public function cargarCombosproductosFK($connexion=null,$strRecargarFkQuery='',$devolucion_detalleForeignKey,$devolucion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$devolucion_detalleForeignKey->productosFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_detalle_session==null) {
			$devolucion_detalle_session=new devolucion_detalle_session();
		}
		
		if($devolucion_detalle_session->bitBusquedaDesdeFKSesionproducto!=true) {
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
				if($devolucion_detalleForeignKey->idproductoDefaultFK==0) {
					$devolucion_detalleForeignKey->idproductoDefaultFK=$productoLocal->getId();
				}

				$devolucion_detalleForeignKey->productosFK[$productoLocal->getId()]=devolucion_detalle_util::getproductoDescripcion($productoLocal);
			}

		} else {

			if($devolucion_detalle_session->bigidproductoActual!=null && $devolucion_detalle_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($devolucion_detalle_session->bigidproductoActual);//WithConnection

				$devolucion_detalleForeignKey->productosFK[$productoLogic->getproducto()->getId()]=devolucion_detalle_util::getproductoDescripcion($productoLogic->getproducto());
				$devolucion_detalleForeignKey->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	public function cargarCombosunidadsFK($connexion=null,$strRecargarFkQuery='',$devolucion_detalleForeignKey,$devolucion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$unidadLogic= new unidad_logic();
		$pagination= new Pagination();
		$devolucion_detalleForeignKey->unidadsFK=array();

		$unidadLogic->setConnexion($connexion);
		$unidadLogic->getunidadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_detalle_session==null) {
			$devolucion_detalle_session=new devolucion_detalle_session();
		}
		
		if($devolucion_detalle_session->bitBusquedaDesdeFKSesionunidad!=true) {
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
				if($devolucion_detalleForeignKey->idunidadDefaultFK==0) {
					$devolucion_detalleForeignKey->idunidadDefaultFK=$unidadLocal->getId();
				}

				$devolucion_detalleForeignKey->unidadsFK[$unidadLocal->getId()]=devolucion_detalle_util::getunidadDescripcion($unidadLocal);
			}

		} else {

			if($devolucion_detalle_session->bigidunidadActual!=null && $devolucion_detalle_session->bigidunidadActual > 0) {
				$unidadLogic->getEntity($devolucion_detalle_session->bigidunidadActual);//WithConnection

				$devolucion_detalleForeignKey->unidadsFK[$unidadLogic->getunidad()->getId()]=devolucion_detalle_util::getunidadDescripcion($unidadLogic->getunidad());
				$devolucion_detalleForeignKey->idunidadDefaultFK=$unidadLogic->getunidad()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($devolucion_detalle) {
		$this->saveRelacionesBase($devolucion_detalle,true);
	}

	public function saveRelaciones($devolucion_detalle) {
		$this->saveRelacionesBase($devolucion_detalle,false);
	}

	public function saveRelacionesBase($devolucion_detalle,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setdevolucion_detalle($devolucion_detalle);

			if(devolucion_detalle_logic_add::validarSaveRelaciones($devolucion_detalle,$this)) {

				devolucion_detalle_logic_add::updateRelacionesToSave($devolucion_detalle,$this);

				if(($this->devolucion_detalle->getIsNew() || $this->devolucion_detalle->getIsChanged()) && !$this->devolucion_detalle->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->devolucion_detalle->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				devolucion_detalle_logic_add::updateRelacionesToSaveAfter($devolucion_detalle,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $devolucion_detalles,devolucion_detalle_param_return $devolucion_detalleParameterGeneral) : devolucion_detalle_param_return {
		$devolucion_detalleReturnGeneral=new devolucion_detalle_param_return();
	
		 try {	
			
			if($this->devolucion_detalleLogicAdditional==null) {
				$this->devolucion_detalleLogicAdditional=new devolucion_detalle_logic_add();
			}
			
			$this->devolucion_detalleLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$devolucion_detalles,$devolucion_detalleParameterGeneral,$devolucion_detalleReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $devolucion_detalleReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $devolucion_detalles,devolucion_detalle_param_return $devolucion_detalleParameterGeneral) : devolucion_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$devolucion_detalleReturnGeneral=new devolucion_detalle_param_return();
	
			
			if($this->devolucion_detalleLogicAdditional==null) {
				$this->devolucion_detalleLogicAdditional=new devolucion_detalle_logic_add();
			}
			
			$this->devolucion_detalleLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$devolucion_detalles,$devolucion_detalleParameterGeneral,$devolucion_detalleReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $devolucion_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $devolucion_detalles,devolucion_detalle $devolucion_detalle,devolucion_detalle_param_return $devolucion_detalleParameterGeneral,bool $isEsNuevodevolucion_detalle,array $clases) : devolucion_detalle_param_return {
		 try {	
			$devolucion_detalleReturnGeneral=new devolucion_detalle_param_return();
	
			$devolucion_detalleReturnGeneral->setdevolucion_detalle($devolucion_detalle);
			$devolucion_detalleReturnGeneral->setdevolucion_detalles($devolucion_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$devolucion_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->devolucion_detalleLogicAdditional==null) {
				$this->devolucion_detalleLogicAdditional=new devolucion_detalle_logic_add();
			}
			
			$devolucion_detalleReturnGeneral=$this->devolucion_detalleLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$devolucion_detalles,$devolucion_detalle,$devolucion_detalleParameterGeneral,$devolucion_detalleReturnGeneral,$isEsNuevodevolucion_detalle,$clases);
			
			/*devolucion_detalleLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$devolucion_detalles,$devolucion_detalle,$devolucion_detalleParameterGeneral,$devolucion_detalleReturnGeneral,$isEsNuevodevolucion_detalle,$clases);*/
			
			return $devolucion_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $devolucion_detalles,devolucion_detalle $devolucion_detalle,devolucion_detalle_param_return $devolucion_detalleParameterGeneral,bool $isEsNuevodevolucion_detalle,array $clases) : devolucion_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$devolucion_detalleReturnGeneral=new devolucion_detalle_param_return();
	
			$devolucion_detalleReturnGeneral->setdevolucion_detalle($devolucion_detalle);
			$devolucion_detalleReturnGeneral->setdevolucion_detalles($devolucion_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$devolucion_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->devolucion_detalleLogicAdditional==null) {
				$this->devolucion_detalleLogicAdditional=new devolucion_detalle_logic_add();
			}
			
			$devolucion_detalleReturnGeneral=$this->devolucion_detalleLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$devolucion_detalles,$devolucion_detalle,$devolucion_detalleParameterGeneral,$devolucion_detalleReturnGeneral,$isEsNuevodevolucion_detalle,$clases);
			
			/*devolucion_detalleLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$devolucion_detalles,$devolucion_detalle,$devolucion_detalleParameterGeneral,$devolucion_detalleReturnGeneral,$isEsNuevodevolucion_detalle,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $devolucion_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $devolucion_detalles,devolucion_detalle $devolucion_detalle,devolucion_detalle_param_return $devolucion_detalleParameterGeneral,bool $isEsNuevodevolucion_detalle,array $clases) : devolucion_detalle_param_return {
		 try {	
			$devolucion_detalleReturnGeneral=new devolucion_detalle_param_return();
	
			$devolucion_detalleReturnGeneral->setdevolucion_detalle($devolucion_detalle);
			$devolucion_detalleReturnGeneral->setdevolucion_detalles($devolucion_detalles);
			
			
			
			if($this->devolucion_detalleLogicAdditional==null) {
				$this->devolucion_detalleLogicAdditional=new devolucion_detalle_logic_add();
			}
			
			$devolucion_detalleReturnGeneral=$this->devolucion_detalleLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$devolucion_detalles,$devolucion_detalle,$devolucion_detalleParameterGeneral,$devolucion_detalleReturnGeneral,$isEsNuevodevolucion_detalle,$clases);
			
			/*devolucion_detalleLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$devolucion_detalles,$devolucion_detalle,$devolucion_detalleParameterGeneral,$devolucion_detalleReturnGeneral,$isEsNuevodevolucion_detalle,$clases);*/
			
			return $devolucion_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $devolucion_detalles,devolucion_detalle $devolucion_detalle,devolucion_detalle_param_return $devolucion_detalleParameterGeneral,bool $isEsNuevodevolucion_detalle,array $clases) : devolucion_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$devolucion_detalleReturnGeneral=new devolucion_detalle_param_return();
	
			$devolucion_detalleReturnGeneral->setdevolucion_detalle($devolucion_detalle);
			$devolucion_detalleReturnGeneral->setdevolucion_detalles($devolucion_detalles);
			
			
			if($this->devolucion_detalleLogicAdditional==null) {
				$this->devolucion_detalleLogicAdditional=new devolucion_detalle_logic_add();
			}
			
			$devolucion_detalleReturnGeneral=$this->devolucion_detalleLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$devolucion_detalles,$devolucion_detalle,$devolucion_detalleParameterGeneral,$devolucion_detalleReturnGeneral,$isEsNuevodevolucion_detalle,$clases);
			
			/*devolucion_detalleLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$devolucion_detalles,$devolucion_detalle,$devolucion_detalleParameterGeneral,$devolucion_detalleReturnGeneral,$isEsNuevodevolucion_detalle,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $devolucion_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,devolucion_detalle $devolucion_detalle,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,devolucion_detalle $devolucion_detalle,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		devolucion_detalle_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(devolucion_detalle $devolucion_detalle,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			devolucion_detalle_logic_add::updatedevolucion_detalleToGet($this->devolucion_detalle);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$devolucion_detalle->setdevolucion($this->devolucion_detalleDataAccess->getdevolucion($this->connexion,$devolucion_detalle));
		$devolucion_detalle->setbodega($this->devolucion_detalleDataAccess->getbodega($this->connexion,$devolucion_detalle));
		$devolucion_detalle->setproducto($this->devolucion_detalleDataAccess->getproducto($this->connexion,$devolucion_detalle));
		$devolucion_detalle->setunidad($this->devolucion_detalleDataAccess->getunidad($this->connexion,$devolucion_detalle));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==devolucion::$class.'') {
				$devolucion_detalle->setdevolucion($this->devolucion_detalleDataAccess->getdevolucion($this->connexion,$devolucion_detalle));
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$devolucion_detalle->setbodega($this->devolucion_detalleDataAccess->getbodega($this->connexion,$devolucion_detalle));
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$devolucion_detalle->setproducto($this->devolucion_detalleDataAccess->getproducto($this->connexion,$devolucion_detalle));
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				$devolucion_detalle->setunidad($this->devolucion_detalleDataAccess->getunidad($this->connexion,$devolucion_detalle));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_detalle->setdevolucion($this->devolucion_detalleDataAccess->getdevolucion($this->connexion,$devolucion_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_detalle->setbodega($this->devolucion_detalleDataAccess->getbodega($this->connexion,$devolucion_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_detalle->setproducto($this->devolucion_detalleDataAccess->getproducto($this->connexion,$devolucion_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_detalle->setunidad($this->devolucion_detalleDataAccess->getunidad($this->connexion,$devolucion_detalle));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$devolucion_detalle->setdevolucion($this->devolucion_detalleDataAccess->getdevolucion($this->connexion,$devolucion_detalle));
		$devolucionLogic= new devolucion_logic($this->connexion);
		$devolucionLogic->deepLoad($devolucion_detalle->getdevolucion(),$isDeep,$deepLoadType,$clases);
				
		$devolucion_detalle->setbodega($this->devolucion_detalleDataAccess->getbodega($this->connexion,$devolucion_detalle));
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepLoad($devolucion_detalle->getbodega(),$isDeep,$deepLoadType,$clases);
				
		$devolucion_detalle->setproducto($this->devolucion_detalleDataAccess->getproducto($this->connexion,$devolucion_detalle));
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepLoad($devolucion_detalle->getproducto(),$isDeep,$deepLoadType,$clases);
				
		$devolucion_detalle->setunidad($this->devolucion_detalleDataAccess->getunidad($this->connexion,$devolucion_detalle));
		$unidadLogic= new unidad_logic($this->connexion);
		$unidadLogic->deepLoad($devolucion_detalle->getunidad(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==devolucion::$class.'') {
				$devolucion_detalle->setdevolucion($this->devolucion_detalleDataAccess->getdevolucion($this->connexion,$devolucion_detalle));
				$devolucionLogic= new devolucion_logic($this->connexion);
				$devolucionLogic->deepLoad($devolucion_detalle->getdevolucion(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$devolucion_detalle->setbodega($this->devolucion_detalleDataAccess->getbodega($this->connexion,$devolucion_detalle));
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepLoad($devolucion_detalle->getbodega(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$devolucion_detalle->setproducto($this->devolucion_detalleDataAccess->getproducto($this->connexion,$devolucion_detalle));
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($devolucion_detalle->getproducto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				$devolucion_detalle->setunidad($this->devolucion_detalleDataAccess->getunidad($this->connexion,$devolucion_detalle));
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepLoad($devolucion_detalle->getunidad(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==devolucion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_detalle->setdevolucion($this->devolucion_detalleDataAccess->getdevolucion($this->connexion,$devolucion_detalle));
			$devolucionLogic= new devolucion_logic($this->connexion);
			$devolucionLogic->deepLoad($devolucion_detalle->getdevolucion(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_detalle->setbodega($this->devolucion_detalleDataAccess->getbodega($this->connexion,$devolucion_detalle));
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepLoad($devolucion_detalle->getbodega(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_detalle->setproducto($this->devolucion_detalleDataAccess->getproducto($this->connexion,$devolucion_detalle));
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($devolucion_detalle->getproducto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_detalle->setunidad($this->devolucion_detalleDataAccess->getunidad($this->connexion,$devolucion_detalle));
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepLoad($devolucion_detalle->getunidad(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(devolucion_detalle $devolucion_detalle,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			devolucion_detalle_logic_add::updatedevolucion_detalleToSave($this->devolucion_detalle);			
			
			if(!$paraDeleteCascade) {				
				devolucion_detalle_data::save($devolucion_detalle, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		devolucion_data::save($devolucion_detalle->getdevolucion(),$this->connexion);
		bodega_data::save($devolucion_detalle->getbodega(),$this->connexion);
		producto_data::save($devolucion_detalle->getproducto(),$this->connexion);
		unidad_data::save($devolucion_detalle->getunidad(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==devolucion::$class.'') {
				devolucion_data::save($devolucion_detalle->getdevolucion(),$this->connexion);
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($devolucion_detalle->getbodega(),$this->connexion);
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($devolucion_detalle->getproducto(),$this->connexion);
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				unidad_data::save($devolucion_detalle->getunidad(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==devolucion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			devolucion_data::save($devolucion_detalle->getdevolucion(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($devolucion_detalle->getbodega(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($devolucion_detalle->getproducto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($devolucion_detalle->getunidad(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		devolucion_data::save($devolucion_detalle->getdevolucion(),$this->connexion);
		$devolucionLogic= new devolucion_logic($this->connexion);
		$devolucionLogic->deepSave($devolucion_detalle->getdevolucion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		bodega_data::save($devolucion_detalle->getbodega(),$this->connexion);
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepSave($devolucion_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		producto_data::save($devolucion_detalle->getproducto(),$this->connexion);
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepSave($devolucion_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		unidad_data::save($devolucion_detalle->getunidad(),$this->connexion);
		$unidadLogic= new unidad_logic($this->connexion);
		$unidadLogic->deepSave($devolucion_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==devolucion::$class.'') {
				devolucion_data::save($devolucion_detalle->getdevolucion(),$this->connexion);
				$devolucionLogic= new devolucion_logic($this->connexion);
				$devolucionLogic->deepSave($devolucion_detalle->getdevolucion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($devolucion_detalle->getbodega(),$this->connexion);
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepSave($devolucion_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($devolucion_detalle->getproducto(),$this->connexion);
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepSave($devolucion_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				unidad_data::save($devolucion_detalle->getunidad(),$this->connexion);
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepSave($devolucion_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==devolucion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			devolucion_data::save($devolucion_detalle->getdevolucion(),$this->connexion);
			$devolucionLogic= new devolucion_logic($this->connexion);
			$devolucionLogic->deepSave($devolucion_detalle->getdevolucion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($devolucion_detalle->getbodega(),$this->connexion);
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepSave($devolucion_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($devolucion_detalle->getproducto(),$this->connexion);
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepSave($devolucion_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($devolucion_detalle->getunidad(),$this->connexion);
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepSave($devolucion_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				devolucion_detalle_data::save($devolucion_detalle, $this->connexion);
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
			
			$this->deepLoad($this->devolucion_detalle,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->devolucion_detalles as $devolucion_detalle) {
				$this->deepLoad($devolucion_detalle,$isDeep,$deepLoadType,$clases);
								
				devolucion_detalle_util::refrescarFKDescripciones($this->devolucion_detalles);
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
			
			foreach($this->devolucion_detalles as $devolucion_detalle) {
				$this->deepLoad($devolucion_detalle,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->devolucion_detalle,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->devolucion_detalles as $devolucion_detalle) {
				$this->deepSave($devolucion_detalle,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->devolucion_detalles as $devolucion_detalle) {
				$this->deepSave($devolucion_detalle,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(devolucion::$class);
				$classes[]=new Classe(bodega::$class);
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(unidad::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==devolucion::$class) {
						$classes[]=new Classe(devolucion::$class);
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
					if($clas->clas==devolucion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(devolucion::$class);
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
	
	
	
	
	
	
	
	public function getdevolucion_detalle() : ?devolucion_detalle {	
		/*
		devolucion_detalle_logic_add::checkdevolucion_detalleToGet($this->devolucion_detalle,$this->datosCliente);
		devolucion_detalle_logic_add::updatedevolucion_detalleToGet($this->devolucion_detalle);
		*/
			
		return $this->devolucion_detalle;
	}
		
	public function setdevolucion_detalle(devolucion_detalle $newdevolucion_detalle) {
		$this->devolucion_detalle = $newdevolucion_detalle;
	}
	
	public function getdevolucion_detalles() : array {		
		/*
		devolucion_detalle_logic_add::checkdevolucion_detalleToGets($this->devolucion_detalles,$this->datosCliente);
		
		foreach ($this->devolucion_detalles as $devolucion_detalleLocal ) {
			devolucion_detalle_logic_add::updatedevolucion_detalleToGet($devolucion_detalleLocal);
		}
		*/
		
		return $this->devolucion_detalles;
	}
	
	public function setdevolucion_detalles(array $newdevolucion_detalles) {
		$this->devolucion_detalles = $newdevolucion_detalles;
	}
	
	public function getdevolucion_detalleDataAccess() : devolucion_detalle_data {
		return $this->devolucion_detalleDataAccess;
	}
	
	public function setdevolucion_detalleDataAccess(devolucion_detalle_data $newdevolucion_detalleDataAccess) {
		$this->devolucion_detalleDataAccess = $newdevolucion_detalleDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        devolucion_detalle_carga::$CONTROLLER;;        
		
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
