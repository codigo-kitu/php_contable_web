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

namespace com\bydan\contabilidad\inventario\orden_compra_detalle\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_carga;
use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_param_return;

use com\bydan\contabilidad\inventario\orden_compra_detalle\presentation\session\orden_compra_detalle_session;

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

use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_util;
use com\bydan\contabilidad\inventario\orden_compra_detalle\business\entity\orden_compra_detalle;
use com\bydan\contabilidad\inventario\orden_compra_detalle\business\data\orden_compra_detalle_data;

//FK


use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;
use com\bydan\contabilidad\inventario\orden_compra\business\data\orden_compra_data;
use com\bydan\contabilidad\inventario\orden_compra\business\logic\orden_compra_logic;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;

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




class orden_compra_detalle_logic  extends GeneralEntityLogic implements orden_compra_detalle_logicI {	
	/*GENERAL*/
	public orden_compra_detalle_data $orden_compra_detalleDataAccess;
	public ?orden_compra_detalle_logic_add $orden_compra_detalleLogicAdditional=null;
	public ?orden_compra_detalle $orden_compra_detalle;
	public array $orden_compra_detalles;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->orden_compra_detalleDataAccess = new orden_compra_detalle_data();			
			$this->orden_compra_detalles = array();
			$this->orden_compra_detalle = new orden_compra_detalle();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->orden_compra_detalleLogicAdditional = new orden_compra_detalle_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->orden_compra_detalleLogicAdditional==null) {
			$this->orden_compra_detalleLogicAdditional=new orden_compra_detalle_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->orden_compra_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->orden_compra_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->orden_compra_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->orden_compra_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->orden_compra_detalles = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->orden_compra_detalles=$this->orden_compra_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
			}
			
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGets($this->orden_compra_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compra_detalles);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->orden_compra_detalles = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->orden_compra_detalles=$this->orden_compra_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
			}
			
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGets($this->orden_compra_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compra_detalles);
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
		$this->orden_compra_detalle = new orden_compra_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->orden_compra_detalle=$this->orden_compra_detalleDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->orden_compra_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				orden_compra_detalle_util::refrescarFKDescripcion($this->orden_compra_detalle);
			}
						
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGet($this->orden_compra_detalle,$this->datosCliente);
			orden_compra_detalle_logic_add::updateorden_compra_detalleToGet($this->orden_compra_detalle);
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
		$this->orden_compra_detalle = new  orden_compra_detalle();
		  		  
        try {		
			$this->orden_compra_detalle=$this->orden_compra_detalleDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->orden_compra_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				orden_compra_detalle_util::refrescarFKDescripcion($this->orden_compra_detalle);
			}
			
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGet($this->orden_compra_detalle,$this->datosCliente);
			orden_compra_detalle_logic_add::updateorden_compra_detalleToGet($this->orden_compra_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?orden_compra_detalle {
		$orden_compra_detalleLogic = new  orden_compra_detalle_logic();
		  		  
        try {		
			$orden_compra_detalleLogic->setConnexion($connexion);			
			$orden_compra_detalleLogic->getEntity($id);			
			return $orden_compra_detalleLogic->getorden_compra_detalle();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->orden_compra_detalle = new  orden_compra_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->orden_compra_detalle=$this->orden_compra_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->orden_compra_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				orden_compra_detalle_util::refrescarFKDescripcion($this->orden_compra_detalle);
			}
			
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGet($this->orden_compra_detalle,$this->datosCliente);
			orden_compra_detalle_logic_add::updateorden_compra_detalleToGet($this->orden_compra_detalle);
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
		$this->orden_compra_detalle = new  orden_compra_detalle();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->orden_compra_detalle=$this->orden_compra_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->orden_compra_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				orden_compra_detalle_util::refrescarFKDescripcion($this->orden_compra_detalle);
			}
			
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGet($this->orden_compra_detalle,$this->datosCliente);
			orden_compra_detalle_logic_add::updateorden_compra_detalleToGet($this->orden_compra_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?orden_compra_detalle {
		$orden_compra_detalleLogic = new  orden_compra_detalle_logic();
		  		  
        try {		
			$orden_compra_detalleLogic->setConnexion($connexion);			
			$orden_compra_detalleLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $orden_compra_detalleLogic->getorden_compra_detalle();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->orden_compra_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->orden_compra_detalles=$this->orden_compra_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
			}
			
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGets($this->orden_compra_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compra_detalles);			
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
		$this->orden_compra_detalles = array();
		  		  
        try {			
			$this->orden_compra_detalles=$this->orden_compra_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
			}
			
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGets($this->orden_compra_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compra_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->orden_compra_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->orden_compra_detalles=$this->orden_compra_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
			}
			
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGets($this->orden_compra_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compra_detalles);
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
		$this->orden_compra_detalles = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->orden_compra_detalles=$this->orden_compra_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
			}
			
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGets($this->orden_compra_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compra_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$orden_compra_detalleLogic = new  orden_compra_detalle_logic();
		  		  
        try {		
			$orden_compra_detalleLogic->setConnexion($connexion);			
			$orden_compra_detalleLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $orden_compra_detalleLogic->getorden_compra_detalles();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->orden_compra_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->orden_compra_detalles=$this->orden_compra_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
			}
			
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGets($this->orden_compra_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compra_detalles);
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
		$this->orden_compra_detalles = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->orden_compra_detalles=$this->orden_compra_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
			}
			
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGets($this->orden_compra_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compra_detalles);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->orden_compra_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->orden_compra_detalles=$this->orden_compra_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
			}
			
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGets($this->orden_compra_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compra_detalles);
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
		$this->orden_compra_detalles = array();
		  		  
        try {			
			$this->orden_compra_detalles=$this->orden_compra_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
			}	
			
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGets($this->orden_compra_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compra_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->orden_compra_detalles = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->orden_compra_detalles=$this->orden_compra_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
			}
			
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGets($this->orden_compra_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compra_detalles);
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
		$this->orden_compra_detalles = array();
		  		  
        try {		
			$this->orden_compra_detalles=$this->orden_compra_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
			}
			
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGets($this->orden_compra_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compra_detalles);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,orden_compra_detalle_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->orden_compra_detalles=$this->orden_compra_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
			}
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGets($this->orden_compra_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compra_detalles);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,orden_compra_detalle_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->orden_compra_detalles=$this->orden_compra_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
			}
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGets($this->orden_compra_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compra_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idorden_compraWithConnection(string $strFinalQuery,Pagination $pagination,int $id_orden_compra) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_orden_compra= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_orden_compra->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_orden_compra,orden_compra_detalle_util::$ID_ORDEN_COMPRA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_orden_compra);

			$this->orden_compra_detalles=$this->orden_compra_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
			}
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGets($this->orden_compra_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compra_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idorden_compra(string $strFinalQuery,Pagination $pagination,int $id_orden_compra) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_orden_compra= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_orden_compra->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_orden_compra,orden_compra_detalle_util::$ID_ORDEN_COMPRA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_orden_compra);

			$this->orden_compra_detalles=$this->orden_compra_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
			}
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGets($this->orden_compra_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compra_detalles);
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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,orden_compra_detalle_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->orden_compra_detalles=$this->orden_compra_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
			}
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGets($this->orden_compra_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compra_detalles);

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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,orden_compra_detalle_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->orden_compra_detalles=$this->orden_compra_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
			}
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGets($this->orden_compra_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compra_detalles);
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
			$parameterSelectionGeneralid_unidad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad,orden_compra_detalle_util::$ID_UNIDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad);

			$this->orden_compra_detalles=$this->orden_compra_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
			}
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGets($this->orden_compra_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compra_detalles);

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
			$parameterSelectionGeneralid_unidad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad,orden_compra_detalle_util::$ID_UNIDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad);

			$this->orden_compra_detalles=$this->orden_compra_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
			}
			orden_compra_detalle_logic_add::checkorden_compra_detalleToGets($this->orden_compra_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compra_detalles);
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
						
			//orden_compra_detalle_logic_add::checkorden_compra_detalleToSave($this->orden_compra_detalle,$this->datosCliente,$this->connexion);	       
			orden_compra_detalle_logic_add::updateorden_compra_detalleToSave($this->orden_compra_detalle);			
			orden_compra_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->orden_compra_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->orden_compra_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->orden_compra_detalle,$this->datosCliente,$this->connexion);
			
			
			orden_compra_detalle_data::save($this->orden_compra_detalle, $this->connexion);	    	       	 				
			//orden_compra_detalle_logic_add::checkorden_compra_detalleToSaveAfter($this->orden_compra_detalle,$this->datosCliente,$this->connexion);			
			$this->orden_compra_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->orden_compra_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->orden_compra_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->orden_compra_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				orden_compra_detalle_util::refrescarFKDescripcion($this->orden_compra_detalle);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->orden_compra_detalle->getIsDeleted()) {
				$this->orden_compra_detalle=null;
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
						
			/*orden_compra_detalle_logic_add::checkorden_compra_detalleToSave($this->orden_compra_detalle,$this->datosCliente,$this->connexion);*/	        
			orden_compra_detalle_logic_add::updateorden_compra_detalleToSave($this->orden_compra_detalle);			
			$this->orden_compra_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->orden_compra_detalle,$this->datosCliente,$this->connexion);			
			orden_compra_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->orden_compra_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			orden_compra_detalle_data::save($this->orden_compra_detalle, $this->connexion);	    	       	 						
			/*orden_compra_detalle_logic_add::checkorden_compra_detalleToSaveAfter($this->orden_compra_detalle,$this->datosCliente,$this->connexion);*/			
			$this->orden_compra_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->orden_compra_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->orden_compra_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->orden_compra_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				orden_compra_detalle_util::refrescarFKDescripcion($this->orden_compra_detalle);				
			}
			
			if($this->orden_compra_detalle->getIsDeleted()) {
				$this->orden_compra_detalle=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(orden_compra_detalle $orden_compra_detalle,Connexion $connexion)  {
		$orden_compra_detalleLogic = new  orden_compra_detalle_logic();		  		  
        try {		
			$orden_compra_detalleLogic->setConnexion($connexion);			
			$orden_compra_detalleLogic->setorden_compra_detalle($orden_compra_detalle);			
			$orden_compra_detalleLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*orden_compra_detalle_logic_add::checkorden_compra_detalleToSaves($this->orden_compra_detalles,$this->datosCliente,$this->connexion);*/	        	
			$this->orden_compra_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->orden_compra_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->orden_compra_detalles as $orden_compra_detalleLocal) {				
								
				orden_compra_detalle_logic_add::updateorden_compra_detalleToSave($orden_compra_detalleLocal);	        	
				orden_compra_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$orden_compra_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				orden_compra_detalle_data::save($orden_compra_detalleLocal, $this->connexion);				
			}
			
			/*orden_compra_detalle_logic_add::checkorden_compra_detalleToSavesAfter($this->orden_compra_detalles,$this->datosCliente,$this->connexion);*/			
			$this->orden_compra_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->orden_compra_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
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
			/*orden_compra_detalle_logic_add::checkorden_compra_detalleToSaves($this->orden_compra_detalles,$this->datosCliente,$this->connexion);*/			
			$this->orden_compra_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->orden_compra_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->orden_compra_detalles as $orden_compra_detalleLocal) {				
								
				orden_compra_detalle_logic_add::updateorden_compra_detalleToSave($orden_compra_detalleLocal);	        	
				orden_compra_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$orden_compra_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				orden_compra_detalle_data::save($orden_compra_detalleLocal, $this->connexion);				
			}			
			
			/*orden_compra_detalle_logic_add::checkorden_compra_detalleToSavesAfter($this->orden_compra_detalles,$this->datosCliente,$this->connexion);*/			
			$this->orden_compra_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->orden_compra_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $orden_compra_detalles,Connexion $connexion)  {
		$orden_compra_detalleLogic = new  orden_compra_detalle_logic();
		  		  
        try {		
			$orden_compra_detalleLogic->setConnexion($connexion);			
			$orden_compra_detalleLogic->setorden_compra_detalles($orden_compra_detalles);			
			$orden_compra_detalleLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$orden_compra_detallesAux=array();
		
		foreach($this->orden_compra_detalles as $orden_compra_detalle) {
			if($orden_compra_detalle->getIsDeleted()==false) {
				$orden_compra_detallesAux[]=$orden_compra_detalle;
			}
		}
		
		$this->orden_compra_detalles=$orden_compra_detallesAux;
	}
	
	public function updateToGetsAuxiliar(array &$orden_compra_detalles) {
		if($this->orden_compra_detalleLogicAdditional==null) {
			$this->orden_compra_detalleLogicAdditional=new orden_compra_detalle_logic_add();
		}
		
		
		$this->orden_compra_detalleLogicAdditional->updateToGets($orden_compra_detalles,$this);					
		$this->orden_compra_detalleLogicAdditional->updateToGetsReferencia($orden_compra_detalles,$this);			
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->orden_compra_detalles as $orden_compra_detalle) {
				
				$orden_compra_detalle->setid_orden_compra_Descripcion(orden_compra_detalle_util::getorden_compraDescripcion($orden_compra_detalle->getorden_compra()));
				$orden_compra_detalle->setid_bodega_Descripcion(orden_compra_detalle_util::getbodegaDescripcion($orden_compra_detalle->getbodega()));
				$orden_compra_detalle->setid_producto_Descripcion(orden_compra_detalle_util::getproductoDescripcion($orden_compra_detalle->getproducto()));
				$orden_compra_detalle->setid_unidad_Descripcion(orden_compra_detalle_util::getunidadDescripcion($orden_compra_detalle->getunidad()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$orden_compra_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$orden_compra_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$orden_compra_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$orden_compra_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$orden_compra_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$orden_compra_detalleForeignKey=new orden_compra_detalle_param_return();//orden_compra_detalleForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_orden_compra',$strRecargarFkTipos,',')) {
				$this->cargarCombosorden_comprasFK($this->connexion,$strRecargarFkQuery,$orden_compra_detalleForeignKey,$orden_compra_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTipos,',')) {
				$this->cargarCombosbodegasFK($this->connexion,$strRecargarFkQuery,$orden_compra_detalleForeignKey,$orden_compra_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombosproductosFK($this->connexion,$strRecargarFkQuery,$orden_compra_detalleForeignKey,$orden_compra_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_unidad',$strRecargarFkTipos,',')) {
				$this->cargarCombosunidadsFK($this->connexion,$strRecargarFkQuery,$orden_compra_detalleForeignKey,$orden_compra_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_orden_compra',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosorden_comprasFK($this->connexion,' where id=-1 ',$orden_compra_detalleForeignKey,$orden_compra_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosbodegasFK($this->connexion,' where id=-1 ',$orden_compra_detalleForeignKey,$orden_compra_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproductosFK($this->connexion,' where id=-1 ',$orden_compra_detalleForeignKey,$orden_compra_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_unidad',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosunidadsFK($this->connexion,' where id=-1 ',$orden_compra_detalleForeignKey,$orden_compra_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $orden_compra_detalleForeignKey;
			
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
	
	
	public function cargarCombosorden_comprasFK($connexion=null,$strRecargarFkQuery='',$orden_compra_detalleForeignKey,$orden_compra_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$orden_compraLogic= new orden_compra_logic();
		$pagination= new Pagination();
		$orden_compra_detalleForeignKey->orden_comprasFK=array();

		$orden_compraLogic->setConnexion($connexion);
		$orden_compraLogic->getorden_compraDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($orden_compra_detalle_session==null) {
			$orden_compra_detalle_session=new orden_compra_detalle_session();
		}
		
		if($orden_compra_detalle_session->bitBusquedaDesdeFKSesionorden_compra!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=orden_compra_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalorden_compra=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalorden_compra=Funciones::GetFinalQueryAppend($finalQueryGlobalorden_compra, '');
				$finalQueryGlobalorden_compra.=orden_compra_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalorden_compra.$strRecargarFkQuery;		

				$orden_compraLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($orden_compraLogic->getorden_compras() as $orden_compraLocal ) {
				if($orden_compra_detalleForeignKey->idorden_compraDefaultFK==0) {
					$orden_compra_detalleForeignKey->idorden_compraDefaultFK=$orden_compraLocal->getId();
				}

				$orden_compra_detalleForeignKey->orden_comprasFK[$orden_compraLocal->getId()]=orden_compra_detalle_util::getorden_compraDescripcion($orden_compraLocal);
			}

		} else {

			if($orden_compra_detalle_session->bigidorden_compraActual!=null && $orden_compra_detalle_session->bigidorden_compraActual > 0) {
				$orden_compraLogic->getEntity($orden_compra_detalle_session->bigidorden_compraActual);//WithConnection

				$orden_compra_detalleForeignKey->orden_comprasFK[$orden_compraLogic->getorden_compra()->getId()]=orden_compra_detalle_util::getorden_compraDescripcion($orden_compraLogic->getorden_compra());
				$orden_compra_detalleForeignKey->idorden_compraDefaultFK=$orden_compraLogic->getorden_compra()->getId();
			}
		}
	}

	public function cargarCombosbodegasFK($connexion=null,$strRecargarFkQuery='',$orden_compra_detalleForeignKey,$orden_compra_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$orden_compra_detalleForeignKey->bodegasFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($orden_compra_detalle_session==null) {
			$orden_compra_detalle_session=new orden_compra_detalle_session();
		}
		
		if($orden_compra_detalle_session->bitBusquedaDesdeFKSesionbodega!=true) {
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
				if($orden_compra_detalleForeignKey->idbodegaDefaultFK==0) {
					$orden_compra_detalleForeignKey->idbodegaDefaultFK=$bodegaLocal->getId();
				}

				$orden_compra_detalleForeignKey->bodegasFK[$bodegaLocal->getId()]=orden_compra_detalle_util::getbodegaDescripcion($bodegaLocal);
			}

		} else {

			if($orden_compra_detalle_session->bigidbodegaActual!=null && $orden_compra_detalle_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($orden_compra_detalle_session->bigidbodegaActual);//WithConnection

				$orden_compra_detalleForeignKey->bodegasFK[$bodegaLogic->getbodega()->getId()]=orden_compra_detalle_util::getbodegaDescripcion($bodegaLogic->getbodega());
				$orden_compra_detalleForeignKey->idbodegaDefaultFK=$bodegaLogic->getbodega()->getId();
			}
		}
	}

	public function cargarCombosproductosFK($connexion=null,$strRecargarFkQuery='',$orden_compra_detalleForeignKey,$orden_compra_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$orden_compra_detalleForeignKey->productosFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($orden_compra_detalle_session==null) {
			$orden_compra_detalle_session=new orden_compra_detalle_session();
		}
		
		if($orden_compra_detalle_session->bitBusquedaDesdeFKSesionproducto!=true) {
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
				if($orden_compra_detalleForeignKey->idproductoDefaultFK==0) {
					$orden_compra_detalleForeignKey->idproductoDefaultFK=$productoLocal->getId();
				}

				$orden_compra_detalleForeignKey->productosFK[$productoLocal->getId()]=orden_compra_detalle_util::getproductoDescripcion($productoLocal);
			}

		} else {

			if($orden_compra_detalle_session->bigidproductoActual!=null && $orden_compra_detalle_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($orden_compra_detalle_session->bigidproductoActual);//WithConnection

				$orden_compra_detalleForeignKey->productosFK[$productoLogic->getproducto()->getId()]=orden_compra_detalle_util::getproductoDescripcion($productoLogic->getproducto());
				$orden_compra_detalleForeignKey->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	public function cargarCombosunidadsFK($connexion=null,$strRecargarFkQuery='',$orden_compra_detalleForeignKey,$orden_compra_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$unidadLogic= new unidad_logic();
		$pagination= new Pagination();
		$orden_compra_detalleForeignKey->unidadsFK=array();

		$unidadLogic->setConnexion($connexion);
		$unidadLogic->getunidadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($orden_compra_detalle_session==null) {
			$orden_compra_detalle_session=new orden_compra_detalle_session();
		}
		
		if($orden_compra_detalle_session->bitBusquedaDesdeFKSesionunidad!=true) {
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
				if($orden_compra_detalleForeignKey->idunidadDefaultFK==0) {
					$orden_compra_detalleForeignKey->idunidadDefaultFK=$unidadLocal->getId();
				}

				$orden_compra_detalleForeignKey->unidadsFK[$unidadLocal->getId()]=orden_compra_detalle_util::getunidadDescripcion($unidadLocal);
			}

		} else {

			if($orden_compra_detalle_session->bigidunidadActual!=null && $orden_compra_detalle_session->bigidunidadActual > 0) {
				$unidadLogic->getEntity($orden_compra_detalle_session->bigidunidadActual);//WithConnection

				$orden_compra_detalleForeignKey->unidadsFK[$unidadLogic->getunidad()->getId()]=orden_compra_detalle_util::getunidadDescripcion($unidadLogic->getunidad());
				$orden_compra_detalleForeignKey->idunidadDefaultFK=$unidadLogic->getunidad()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($orden_compra_detalle) {
		$this->saveRelacionesBase($orden_compra_detalle,true);
	}

	public function saveRelaciones($orden_compra_detalle) {
		$this->saveRelacionesBase($orden_compra_detalle,false);
	}

	public function saveRelacionesBase($orden_compra_detalle,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setorden_compra_detalle($orden_compra_detalle);

			if(orden_compra_detalle_logic_add::validarSaveRelaciones($orden_compra_detalle,$this)) {

				orden_compra_detalle_logic_add::updateRelacionesToSave($orden_compra_detalle,$this);

				if(($this->orden_compra_detalle->getIsNew() || $this->orden_compra_detalle->getIsChanged()) && !$this->orden_compra_detalle->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->orden_compra_detalle->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				orden_compra_detalle_logic_add::updateRelacionesToSaveAfter($orden_compra_detalle,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $orden_compra_detalles,orden_compra_detalle_param_return $orden_compra_detalleParameterGeneral) : orden_compra_detalle_param_return {
		$orden_compra_detalleReturnGeneral=new orden_compra_detalle_param_return();
	
		 try {	
			
			if($this->orden_compra_detalleLogicAdditional==null) {
				$this->orden_compra_detalleLogicAdditional=new orden_compra_detalle_logic_add();
			}
			
			$this->orden_compra_detalleLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$orden_compra_detalles,$orden_compra_detalleParameterGeneral,$orden_compra_detalleReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $orden_compra_detalleReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $orden_compra_detalles,orden_compra_detalle_param_return $orden_compra_detalleParameterGeneral) : orden_compra_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$orden_compra_detalleReturnGeneral=new orden_compra_detalle_param_return();
	
			
			if($this->orden_compra_detalleLogicAdditional==null) {
				$this->orden_compra_detalleLogicAdditional=new orden_compra_detalle_logic_add();
			}
			
			$this->orden_compra_detalleLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$orden_compra_detalles,$orden_compra_detalleParameterGeneral,$orden_compra_detalleReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $orden_compra_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $orden_compra_detalles,orden_compra_detalle $orden_compra_detalle,orden_compra_detalle_param_return $orden_compra_detalleParameterGeneral,bool $isEsNuevoorden_compra_detalle,array $clases) : orden_compra_detalle_param_return {
		 try {	
			$orden_compra_detalleReturnGeneral=new orden_compra_detalle_param_return();
	
			$orden_compra_detalleReturnGeneral->setorden_compra_detalle($orden_compra_detalle);
			$orden_compra_detalleReturnGeneral->setorden_compra_detalles($orden_compra_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$orden_compra_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->orden_compra_detalleLogicAdditional==null) {
				$this->orden_compra_detalleLogicAdditional=new orden_compra_detalle_logic_add();
			}
			
			$orden_compra_detalleReturnGeneral=$this->orden_compra_detalleLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$orden_compra_detalles,$orden_compra_detalle,$orden_compra_detalleParameterGeneral,$orden_compra_detalleReturnGeneral,$isEsNuevoorden_compra_detalle,$clases);
			
			/*orden_compra_detalleLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$orden_compra_detalles,$orden_compra_detalle,$orden_compra_detalleParameterGeneral,$orden_compra_detalleReturnGeneral,$isEsNuevoorden_compra_detalle,$clases);*/
			
			return $orden_compra_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $orden_compra_detalles,orden_compra_detalle $orden_compra_detalle,orden_compra_detalle_param_return $orden_compra_detalleParameterGeneral,bool $isEsNuevoorden_compra_detalle,array $clases) : orden_compra_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$orden_compra_detalleReturnGeneral=new orden_compra_detalle_param_return();
	
			$orden_compra_detalleReturnGeneral->setorden_compra_detalle($orden_compra_detalle);
			$orden_compra_detalleReturnGeneral->setorden_compra_detalles($orden_compra_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$orden_compra_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->orden_compra_detalleLogicAdditional==null) {
				$this->orden_compra_detalleLogicAdditional=new orden_compra_detalle_logic_add();
			}
			
			$orden_compra_detalleReturnGeneral=$this->orden_compra_detalleLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$orden_compra_detalles,$orden_compra_detalle,$orden_compra_detalleParameterGeneral,$orden_compra_detalleReturnGeneral,$isEsNuevoorden_compra_detalle,$clases);
			
			/*orden_compra_detalleLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$orden_compra_detalles,$orden_compra_detalle,$orden_compra_detalleParameterGeneral,$orden_compra_detalleReturnGeneral,$isEsNuevoorden_compra_detalle,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $orden_compra_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $orden_compra_detalles,orden_compra_detalle $orden_compra_detalle,orden_compra_detalle_param_return $orden_compra_detalleParameterGeneral,bool $isEsNuevoorden_compra_detalle,array $clases) : orden_compra_detalle_param_return {
		 try {	
			$orden_compra_detalleReturnGeneral=new orden_compra_detalle_param_return();
	
			$orden_compra_detalleReturnGeneral->setorden_compra_detalle($orden_compra_detalle);
			$orden_compra_detalleReturnGeneral->setorden_compra_detalles($orden_compra_detalles);
			
			
			
			if($this->orden_compra_detalleLogicAdditional==null) {
				$this->orden_compra_detalleLogicAdditional=new orden_compra_detalle_logic_add();
			}
			
			$orden_compra_detalleReturnGeneral=$this->orden_compra_detalleLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$orden_compra_detalles,$orden_compra_detalle,$orden_compra_detalleParameterGeneral,$orden_compra_detalleReturnGeneral,$isEsNuevoorden_compra_detalle,$clases);
			
			/*orden_compra_detalleLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$orden_compra_detalles,$orden_compra_detalle,$orden_compra_detalleParameterGeneral,$orden_compra_detalleReturnGeneral,$isEsNuevoorden_compra_detalle,$clases);*/
			
			return $orden_compra_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $orden_compra_detalles,orden_compra_detalle $orden_compra_detalle,orden_compra_detalle_param_return $orden_compra_detalleParameterGeneral,bool $isEsNuevoorden_compra_detalle,array $clases) : orden_compra_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$orden_compra_detalleReturnGeneral=new orden_compra_detalle_param_return();
	
			$orden_compra_detalleReturnGeneral->setorden_compra_detalle($orden_compra_detalle);
			$orden_compra_detalleReturnGeneral->setorden_compra_detalles($orden_compra_detalles);
			
			
			if($this->orden_compra_detalleLogicAdditional==null) {
				$this->orden_compra_detalleLogicAdditional=new orden_compra_detalle_logic_add();
			}
			
			$orden_compra_detalleReturnGeneral=$this->orden_compra_detalleLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$orden_compra_detalles,$orden_compra_detalle,$orden_compra_detalleParameterGeneral,$orden_compra_detalleReturnGeneral,$isEsNuevoorden_compra_detalle,$clases);
			
			/*orden_compra_detalleLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$orden_compra_detalles,$orden_compra_detalle,$orden_compra_detalleParameterGeneral,$orden_compra_detalleReturnGeneral,$isEsNuevoorden_compra_detalle,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $orden_compra_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,orden_compra_detalle $orden_compra_detalle,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,orden_compra_detalle $orden_compra_detalle,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		orden_compra_detalle_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(orden_compra_detalle $orden_compra_detalle,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			orden_compra_detalle_logic_add::updateorden_compra_detalleToGet($this->orden_compra_detalle);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$orden_compra_detalle->setorden_compra($this->orden_compra_detalleDataAccess->getorden_compra($this->connexion,$orden_compra_detalle));
		$orden_compra_detalle->setbodega($this->orden_compra_detalleDataAccess->getbodega($this->connexion,$orden_compra_detalle));
		$orden_compra_detalle->setproducto($this->orden_compra_detalleDataAccess->getproducto($this->connexion,$orden_compra_detalle));
		$orden_compra_detalle->setunidad($this->orden_compra_detalleDataAccess->getunidad($this->connexion,$orden_compra_detalle));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==orden_compra::$class.'') {
				$orden_compra_detalle->setorden_compra($this->orden_compra_detalleDataAccess->getorden_compra($this->connexion,$orden_compra_detalle));
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$orden_compra_detalle->setbodega($this->orden_compra_detalleDataAccess->getbodega($this->connexion,$orden_compra_detalle));
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$orden_compra_detalle->setproducto($this->orden_compra_detalleDataAccess->getproducto($this->connexion,$orden_compra_detalle));
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				$orden_compra_detalle->setunidad($this->orden_compra_detalleDataAccess->getunidad($this->connexion,$orden_compra_detalle));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==orden_compra::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra_detalle->setorden_compra($this->orden_compra_detalleDataAccess->getorden_compra($this->connexion,$orden_compra_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra_detalle->setbodega($this->orden_compra_detalleDataAccess->getbodega($this->connexion,$orden_compra_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra_detalle->setproducto($this->orden_compra_detalleDataAccess->getproducto($this->connexion,$orden_compra_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra_detalle->setunidad($this->orden_compra_detalleDataAccess->getunidad($this->connexion,$orden_compra_detalle));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$orden_compra_detalle->setorden_compra($this->orden_compra_detalleDataAccess->getorden_compra($this->connexion,$orden_compra_detalle));
		$orden_compraLogic= new orden_compra_logic($this->connexion);
		$orden_compraLogic->deepLoad($orden_compra_detalle->getorden_compra(),$isDeep,$deepLoadType,$clases);
				
		$orden_compra_detalle->setbodega($this->orden_compra_detalleDataAccess->getbodega($this->connexion,$orden_compra_detalle));
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepLoad($orden_compra_detalle->getbodega(),$isDeep,$deepLoadType,$clases);
				
		$orden_compra_detalle->setproducto($this->orden_compra_detalleDataAccess->getproducto($this->connexion,$orden_compra_detalle));
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepLoad($orden_compra_detalle->getproducto(),$isDeep,$deepLoadType,$clases);
				
		$orden_compra_detalle->setunidad($this->orden_compra_detalleDataAccess->getunidad($this->connexion,$orden_compra_detalle));
		$unidadLogic= new unidad_logic($this->connexion);
		$unidadLogic->deepLoad($orden_compra_detalle->getunidad(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==orden_compra::$class.'') {
				$orden_compra_detalle->setorden_compra($this->orden_compra_detalleDataAccess->getorden_compra($this->connexion,$orden_compra_detalle));
				$orden_compraLogic= new orden_compra_logic($this->connexion);
				$orden_compraLogic->deepLoad($orden_compra_detalle->getorden_compra(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$orden_compra_detalle->setbodega($this->orden_compra_detalleDataAccess->getbodega($this->connexion,$orden_compra_detalle));
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepLoad($orden_compra_detalle->getbodega(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$orden_compra_detalle->setproducto($this->orden_compra_detalleDataAccess->getproducto($this->connexion,$orden_compra_detalle));
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($orden_compra_detalle->getproducto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				$orden_compra_detalle->setunidad($this->orden_compra_detalleDataAccess->getunidad($this->connexion,$orden_compra_detalle));
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepLoad($orden_compra_detalle->getunidad(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==orden_compra::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra_detalle->setorden_compra($this->orden_compra_detalleDataAccess->getorden_compra($this->connexion,$orden_compra_detalle));
			$orden_compraLogic= new orden_compra_logic($this->connexion);
			$orden_compraLogic->deepLoad($orden_compra_detalle->getorden_compra(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra_detalle->setbodega($this->orden_compra_detalleDataAccess->getbodega($this->connexion,$orden_compra_detalle));
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepLoad($orden_compra_detalle->getbodega(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra_detalle->setproducto($this->orden_compra_detalleDataAccess->getproducto($this->connexion,$orden_compra_detalle));
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($orden_compra_detalle->getproducto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra_detalle->setunidad($this->orden_compra_detalleDataAccess->getunidad($this->connexion,$orden_compra_detalle));
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepLoad($orden_compra_detalle->getunidad(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(orden_compra_detalle $orden_compra_detalle,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			orden_compra_detalle_logic_add::updateorden_compra_detalleToSave($this->orden_compra_detalle);			
			
			if(!$paraDeleteCascade) {				
				orden_compra_detalle_data::save($orden_compra_detalle, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		orden_compra_data::save($orden_compra_detalle->getorden_compra(),$this->connexion);
		bodega_data::save($orden_compra_detalle->getbodega(),$this->connexion);
		producto_data::save($orden_compra_detalle->getproducto(),$this->connexion);
		unidad_data::save($orden_compra_detalle->getunidad(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==orden_compra::$class.'') {
				orden_compra_data::save($orden_compra_detalle->getorden_compra(),$this->connexion);
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($orden_compra_detalle->getbodega(),$this->connexion);
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($orden_compra_detalle->getproducto(),$this->connexion);
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				unidad_data::save($orden_compra_detalle->getunidad(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==orden_compra::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			orden_compra_data::save($orden_compra_detalle->getorden_compra(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($orden_compra_detalle->getbodega(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($orden_compra_detalle->getproducto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($orden_compra_detalle->getunidad(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		orden_compra_data::save($orden_compra_detalle->getorden_compra(),$this->connexion);
		$orden_compraLogic= new orden_compra_logic($this->connexion);
		$orden_compraLogic->deepSave($orden_compra_detalle->getorden_compra(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		bodega_data::save($orden_compra_detalle->getbodega(),$this->connexion);
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepSave($orden_compra_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		producto_data::save($orden_compra_detalle->getproducto(),$this->connexion);
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepSave($orden_compra_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		unidad_data::save($orden_compra_detalle->getunidad(),$this->connexion);
		$unidadLogic= new unidad_logic($this->connexion);
		$unidadLogic->deepSave($orden_compra_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==orden_compra::$class.'') {
				orden_compra_data::save($orden_compra_detalle->getorden_compra(),$this->connexion);
				$orden_compraLogic= new orden_compra_logic($this->connexion);
				$orden_compraLogic->deepSave($orden_compra_detalle->getorden_compra(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($orden_compra_detalle->getbodega(),$this->connexion);
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepSave($orden_compra_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($orden_compra_detalle->getproducto(),$this->connexion);
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepSave($orden_compra_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				unidad_data::save($orden_compra_detalle->getunidad(),$this->connexion);
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepSave($orden_compra_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==orden_compra::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			orden_compra_data::save($orden_compra_detalle->getorden_compra(),$this->connexion);
			$orden_compraLogic= new orden_compra_logic($this->connexion);
			$orden_compraLogic->deepSave($orden_compra_detalle->getorden_compra(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($orden_compra_detalle->getbodega(),$this->connexion);
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepSave($orden_compra_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($orden_compra_detalle->getproducto(),$this->connexion);
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepSave($orden_compra_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($orden_compra_detalle->getunidad(),$this->connexion);
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepSave($orden_compra_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				orden_compra_detalle_data::save($orden_compra_detalle, $this->connexion);
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
			
			$this->deepLoad($this->orden_compra_detalle,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->orden_compra_detalles as $orden_compra_detalle) {
				$this->deepLoad($orden_compra_detalle,$isDeep,$deepLoadType,$clases);
								
				orden_compra_detalle_util::refrescarFKDescripciones($this->orden_compra_detalles);
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
			
			foreach($this->orden_compra_detalles as $orden_compra_detalle) {
				$this->deepLoad($orden_compra_detalle,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->orden_compra_detalle,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->orden_compra_detalles as $orden_compra_detalle) {
				$this->deepSave($orden_compra_detalle,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->orden_compra_detalles as $orden_compra_detalle) {
				$this->deepSave($orden_compra_detalle,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(orden_compra::$class);
				$classes[]=new Classe(bodega::$class);
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(unidad::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==orden_compra::$class) {
						$classes[]=new Classe(orden_compra::$class);
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
					if($clas->clas==orden_compra::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(orden_compra::$class);
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
	
	
	
	
	
	
	
	public function getorden_compra_detalle() : ?orden_compra_detalle {	
		/*
		orden_compra_detalle_logic_add::checkorden_compra_detalleToGet($this->orden_compra_detalle,$this->datosCliente);
		orden_compra_detalle_logic_add::updateorden_compra_detalleToGet($this->orden_compra_detalle);
		*/
			
		return $this->orden_compra_detalle;
	}
		
	public function setorden_compra_detalle(orden_compra_detalle $neworden_compra_detalle) {
		$this->orden_compra_detalle = $neworden_compra_detalle;
	}
	
	public function getorden_compra_detalles() : array {		
		/*
		orden_compra_detalle_logic_add::checkorden_compra_detalleToGets($this->orden_compra_detalles,$this->datosCliente);
		
		foreach ($this->orden_compra_detalles as $orden_compra_detalleLocal ) {
			orden_compra_detalle_logic_add::updateorden_compra_detalleToGet($orden_compra_detalleLocal);
		}
		*/
		
		return $this->orden_compra_detalles;
	}
	
	public function setorden_compra_detalles(array $neworden_compra_detalles) {
		$this->orden_compra_detalles = $neworden_compra_detalles;
	}
	
	public function getorden_compra_detalleDataAccess() : orden_compra_detalle_data {
		return $this->orden_compra_detalleDataAccess;
	}
	
	public function setorden_compra_detalleDataAccess(orden_compra_detalle_data $neworden_compra_detalleDataAccess) {
		$this->orden_compra_detalleDataAccess = $neworden_compra_detalleDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        orden_compra_detalle_carga::$CONTROLLER;;        
		
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
