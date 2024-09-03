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

namespace com\bydan\contabilidad\inventario\kardex_detalle\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\kardex_detalle\util\kardex_detalle_carga;
use com\bydan\contabilidad\inventario\kardex_detalle\util\kardex_detalle_param_return;

use com\bydan\contabilidad\inventario\kardex_detalle\presentation\session\kardex_detalle_session;

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

use com\bydan\contabilidad\inventario\kardex_detalle\util\kardex_detalle_util;
use com\bydan\contabilidad\inventario\kardex_detalle\business\entity\kardex_detalle;
use com\bydan\contabilidad\inventario\kardex_detalle\business\data\kardex_detalle_data;

//FK


use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;
use com\bydan\contabilidad\inventario\kardex\business\data\kardex_data;
use com\bydan\contabilidad\inventario\kardex\business\logic\kardex_logic;
use com\bydan\contabilidad\inventario\kardex\util\kardex_util;

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

use com\bydan\contabilidad\inventario\lote_producto\business\entity\lote_producto;
use com\bydan\contabilidad\inventario\lote_producto\business\data\lote_producto_data;
use com\bydan\contabilidad\inventario\lote_producto\business\logic\lote_producto_logic;
use com\bydan\contabilidad\inventario\lote_producto\util\lote_producto_util;

//REL


//REL DETALLES




class kardex_detalle_logic  extends GeneralEntityLogic implements kardex_detalle_logicI {	
	/*GENERAL*/
	public kardex_detalle_data $kardex_detalleDataAccess;
	public ?kardex_detalle_logic_add $kardex_detalleLogicAdditional=null;
	public ?kardex_detalle $kardex_detalle;
	public array $kardex_detalles;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->kardex_detalleDataAccess = new kardex_detalle_data();			
			$this->kardex_detalles = array();
			$this->kardex_detalle = new kardex_detalle();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->kardex_detalleLogicAdditional = new kardex_detalle_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->kardex_detalleLogicAdditional==null) {
			$this->kardex_detalleLogicAdditional=new kardex_detalle_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->kardex_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->kardex_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->kardex_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->kardex_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->kardex_detalles = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardex_detalles);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->kardex_detalles = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardex_detalles);
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
		$this->kardex_detalle = new kardex_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->kardex_detalle=$this->kardex_detalleDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->kardex_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				kardex_detalle_util::refrescarFKDescripcion($this->kardex_detalle);
			}
						
			kardex_detalle_logic_add::checkkardex_detalleToGet($this->kardex_detalle,$this->datosCliente);
			kardex_detalle_logic_add::updatekardex_detalleToGet($this->kardex_detalle);
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
		$this->kardex_detalle = new  kardex_detalle();
		  		  
        try {		
			$this->kardex_detalle=$this->kardex_detalleDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->kardex_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				kardex_detalle_util::refrescarFKDescripcion($this->kardex_detalle);
			}
			
			kardex_detalle_logic_add::checkkardex_detalleToGet($this->kardex_detalle,$this->datosCliente);
			kardex_detalle_logic_add::updatekardex_detalleToGet($this->kardex_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?kardex_detalle {
		$kardex_detalleLogic = new  kardex_detalle_logic();
		  		  
        try {		
			$kardex_detalleLogic->setConnexion($connexion);			
			$kardex_detalleLogic->getEntity($id);			
			return $kardex_detalleLogic->getkardex_detalle();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->kardex_detalle = new  kardex_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->kardex_detalle=$this->kardex_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->kardex_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				kardex_detalle_util::refrescarFKDescripcion($this->kardex_detalle);
			}
			
			kardex_detalle_logic_add::checkkardex_detalleToGet($this->kardex_detalle,$this->datosCliente);
			kardex_detalle_logic_add::updatekardex_detalleToGet($this->kardex_detalle);
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
		$this->kardex_detalle = new  kardex_detalle();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->kardex_detalle=$this->kardex_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->kardex_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				kardex_detalle_util::refrescarFKDescripcion($this->kardex_detalle);
			}
			
			kardex_detalle_logic_add::checkkardex_detalleToGet($this->kardex_detalle,$this->datosCliente);
			kardex_detalle_logic_add::updatekardex_detalleToGet($this->kardex_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?kardex_detalle {
		$kardex_detalleLogic = new  kardex_detalle_logic();
		  		  
        try {		
			$kardex_detalleLogic->setConnexion($connexion);			
			$kardex_detalleLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $kardex_detalleLogic->getkardex_detalle();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->kardex_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardex_detalles);			
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
		$this->kardex_detalles = array();
		  		  
        try {			
			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardex_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->kardex_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardex_detalles);
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
		$this->kardex_detalles = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardex_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$kardex_detalleLogic = new  kardex_detalle_logic();
		  		  
        try {		
			$kardex_detalleLogic->setConnexion($connexion);			
			$kardex_detalleLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $kardex_detalleLogic->getkardex_detalles();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->kardex_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardex_detalles);
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
		$this->kardex_detalles = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardex_detalles);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->kardex_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardex_detalles);
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
		$this->kardex_detalles = array();
		  		  
        try {			
			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}	
			
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardex_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->kardex_detalles = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardex_detalles);
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
		$this->kardex_detalles = array();
		  		  
        try {		
			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kardex_detalles);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,kardex_detalle_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardex_detalles);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,kardex_detalle_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardex_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdkardexWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_kardex) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_kardex= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_kardex,kardex_detalle_util::$ID_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_kardex);

			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardex_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idkardex(string $strFinalQuery,Pagination $pagination,?int $id_kardex) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_kardex= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_kardex,kardex_detalle_util::$ID_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_kardex);

			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardex_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdloteWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_lote_producto) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_lote_producto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_lote_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_lote_producto,kardex_detalle_util::$ID_LOTE_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_lote_producto);

			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardex_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idlote(string $strFinalQuery,Pagination $pagination,?int $id_lote_producto) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_lote_producto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_lote_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_lote_producto,kardex_detalle_util::$ID_LOTE_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_lote_producto);

			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardex_detalles);
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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,kardex_detalle_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardex_detalles);

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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,kardex_detalle_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardex_detalles);
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
			$parameterSelectionGeneralid_unidad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad,kardex_detalle_util::$ID_UNIDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad);

			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardex_detalles);

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
			$parameterSelectionGeneralid_unidad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad,kardex_detalle_util::$ID_UNIDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad);

			$this->kardex_detalles=$this->kardex_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->kardex_detalles);
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
						
			//kardex_detalle_logic_add::checkkardex_detalleToSave($this->kardex_detalle,$this->datosCliente,$this->connexion);	       
			kardex_detalle_logic_add::updatekardex_detalleToSave($this->kardex_detalle);			
			kardex_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->kardex_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->kardex_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->kardex_detalle,$this->datosCliente,$this->connexion);
			
			
			kardex_detalle_data::save($this->kardex_detalle, $this->connexion);	    	       	 				
			//kardex_detalle_logic_add::checkkardex_detalleToSaveAfter($this->kardex_detalle,$this->datosCliente,$this->connexion);			
			$this->kardex_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->kardex_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->kardex_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->kardex_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				kardex_detalle_util::refrescarFKDescripcion($this->kardex_detalle);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->kardex_detalle->getIsDeleted()) {
				$this->kardex_detalle=null;
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
						
			/*kardex_detalle_logic_add::checkkardex_detalleToSave($this->kardex_detalle,$this->datosCliente,$this->connexion);*/	        
			kardex_detalle_logic_add::updatekardex_detalleToSave($this->kardex_detalle);			
			$this->kardex_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->kardex_detalle,$this->datosCliente,$this->connexion);			
			kardex_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->kardex_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			kardex_detalle_data::save($this->kardex_detalle, $this->connexion);	    	       	 						
			/*kardex_detalle_logic_add::checkkardex_detalleToSaveAfter($this->kardex_detalle,$this->datosCliente,$this->connexion);*/			
			$this->kardex_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->kardex_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->kardex_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->kardex_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				kardex_detalle_util::refrescarFKDescripcion($this->kardex_detalle);				
			}
			
			if($this->kardex_detalle->getIsDeleted()) {
				$this->kardex_detalle=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(kardex_detalle $kardex_detalle,Connexion $connexion)  {
		$kardex_detalleLogic = new  kardex_detalle_logic();		  		  
        try {		
			$kardex_detalleLogic->setConnexion($connexion);			
			$kardex_detalleLogic->setkardex_detalle($kardex_detalle);			
			$kardex_detalleLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*kardex_detalle_logic_add::checkkardex_detalleToSaves($this->kardex_detalles,$this->datosCliente,$this->connexion);*/	        	
			$this->kardex_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->kardex_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->kardex_detalles as $kardex_detalleLocal) {				
								
				kardex_detalle_logic_add::updatekardex_detalleToSave($kardex_detalleLocal);	        	
				kardex_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$kardex_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				kardex_detalle_data::save($kardex_detalleLocal, $this->connexion);				
			}
			
			/*kardex_detalle_logic_add::checkkardex_detalleToSavesAfter($this->kardex_detalles,$this->datosCliente,$this->connexion);*/			
			$this->kardex_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->kardex_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
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
			/*kardex_detalle_logic_add::checkkardex_detalleToSaves($this->kardex_detalles,$this->datosCliente,$this->connexion);*/			
			$this->kardex_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->kardex_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->kardex_detalles as $kardex_detalleLocal) {				
								
				kardex_detalle_logic_add::updatekardex_detalleToSave($kardex_detalleLocal);	        	
				kardex_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$kardex_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				kardex_detalle_data::save($kardex_detalleLocal, $this->connexion);				
			}			
			
			/*kardex_detalle_logic_add::checkkardex_detalleToSavesAfter($this->kardex_detalles,$this->datosCliente,$this->connexion);*/			
			$this->kardex_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->kardex_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $kardex_detalles,Connexion $connexion)  {
		$kardex_detalleLogic = new  kardex_detalle_logic();
		  		  
        try {		
			$kardex_detalleLogic->setConnexion($connexion);			
			$kardex_detalleLogic->setkardex_detalles($kardex_detalles);			
			$kardex_detalleLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$kardex_detallesAux=array();
		
		foreach($this->kardex_detalles as $kardex_detalle) {
			if($kardex_detalle->getIsDeleted()==false) {
				$kardex_detallesAux[]=$kardex_detalle;
			}
		}
		
		$this->kardex_detalles=$kardex_detallesAux;
	}
	
	public function updateToGetsAuxiliar(array &$kardex_detalles) {
		if($this->kardex_detalleLogicAdditional==null) {
			$this->kardex_detalleLogicAdditional=new kardex_detalle_logic_add();
		}
		
		
		$this->kardex_detalleLogicAdditional->updateToGets($kardex_detalles,$this);					
		$this->kardex_detalleLogicAdditional->updateToGetsReferencia($kardex_detalles,$this);			
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->kardex_detalles as $kardex_detalle) {
				
				$kardex_detalle->setid_kardex_Descripcion(kardex_detalle_util::getkardexDescripcion($kardex_detalle->getkardex()));
				$kardex_detalle->setid_bodega_Descripcion(kardex_detalle_util::getbodegaDescripcion($kardex_detalle->getbodega()));
				$kardex_detalle->setid_producto_Descripcion(kardex_detalle_util::getproductoDescripcion($kardex_detalle->getproducto()));
				$kardex_detalle->setid_unidad_Descripcion(kardex_detalle_util::getunidadDescripcion($kardex_detalle->getunidad()));
				$kardex_detalle->setid_lote_producto_Descripcion(kardex_detalle_util::getlote_productoDescripcion($kardex_detalle->getlote_producto()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$kardex_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$kardex_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$kardex_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$kardex_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$kardex_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$kardex_detalleForeignKey=new kardex_detalle_param_return();//kardex_detalleForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_kardex',$strRecargarFkTipos,',')) {
				$this->cargarComboskardexsFK($this->connexion,$strRecargarFkQuery,$kardex_detalleForeignKey,$kardex_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTipos,',')) {
				$this->cargarCombosbodegasFK($this->connexion,$strRecargarFkQuery,$kardex_detalleForeignKey,$kardex_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombosproductosFK($this->connexion,$strRecargarFkQuery,$kardex_detalleForeignKey,$kardex_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_unidad',$strRecargarFkTipos,',')) {
				$this->cargarCombosunidadsFK($this->connexion,$strRecargarFkQuery,$kardex_detalleForeignKey,$kardex_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_lote_producto',$strRecargarFkTipos,',')) {
				$this->cargarComboslote_productosFK($this->connexion,$strRecargarFkQuery,$kardex_detalleForeignKey,$kardex_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_kardex',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboskardexsFK($this->connexion,' where id=-1 ',$kardex_detalleForeignKey,$kardex_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosbodegasFK($this->connexion,' where id=-1 ',$kardex_detalleForeignKey,$kardex_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproductosFK($this->connexion,' where id=-1 ',$kardex_detalleForeignKey,$kardex_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_unidad',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosunidadsFK($this->connexion,' where id=-1 ',$kardex_detalleForeignKey,$kardex_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_lote_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboslote_productosFK($this->connexion,' where id=-1 ',$kardex_detalleForeignKey,$kardex_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $kardex_detalleForeignKey;
			
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
	
	
	public function cargarComboskardexsFK($connexion=null,$strRecargarFkQuery='',$kardex_detalleForeignKey,$kardex_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$kardexLogic= new kardex_logic();
		$pagination= new Pagination();
		$kardex_detalleForeignKey->kardexsFK=array();

		$kardexLogic->setConnexion($connexion);
		$kardexLogic->getkardexDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($kardex_detalle_session==null) {
			$kardex_detalle_session=new kardex_detalle_session();
		}
		
		if($kardex_detalle_session->bitBusquedaDesdeFKSesionkardex!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=kardex_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalkardex=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalkardex=Funciones::GetFinalQueryAppend($finalQueryGlobalkardex, '');
				$finalQueryGlobalkardex.=kardex_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalkardex.$strRecargarFkQuery;		

				$kardexLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($kardexLogic->getkardexs() as $kardexLocal ) {
				if($kardex_detalleForeignKey->idkardexDefaultFK==0) {
					$kardex_detalleForeignKey->idkardexDefaultFK=$kardexLocal->getId();
				}

				$kardex_detalleForeignKey->kardexsFK[$kardexLocal->getId()]=kardex_detalle_util::getkardexDescripcion($kardexLocal);
			}

		} else {

			if($kardex_detalle_session->bigidkardexActual!=null && $kardex_detalle_session->bigidkardexActual > 0) {
				$kardexLogic->getEntity($kardex_detalle_session->bigidkardexActual);//WithConnection

				$kardex_detalleForeignKey->kardexsFK[$kardexLogic->getkardex()->getId()]=kardex_detalle_util::getkardexDescripcion($kardexLogic->getkardex());
				$kardex_detalleForeignKey->idkardexDefaultFK=$kardexLogic->getkardex()->getId();
			}
		}
	}

	public function cargarCombosbodegasFK($connexion=null,$strRecargarFkQuery='',$kardex_detalleForeignKey,$kardex_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$kardex_detalleForeignKey->bodegasFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($kardex_detalle_session==null) {
			$kardex_detalle_session=new kardex_detalle_session();
		}
		
		if($kardex_detalle_session->bitBusquedaDesdeFKSesionbodega!=true) {
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
				if($kardex_detalleForeignKey->idbodegaDefaultFK==0) {
					$kardex_detalleForeignKey->idbodegaDefaultFK=$bodegaLocal->getId();
				}

				$kardex_detalleForeignKey->bodegasFK[$bodegaLocal->getId()]=kardex_detalle_util::getbodegaDescripcion($bodegaLocal);
			}

		} else {

			if($kardex_detalle_session->bigidbodegaActual!=null && $kardex_detalle_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($kardex_detalle_session->bigidbodegaActual);//WithConnection

				$kardex_detalleForeignKey->bodegasFK[$bodegaLogic->getbodega()->getId()]=kardex_detalle_util::getbodegaDescripcion($bodegaLogic->getbodega());
				$kardex_detalleForeignKey->idbodegaDefaultFK=$bodegaLogic->getbodega()->getId();
			}
		}
	}

	public function cargarCombosproductosFK($connexion=null,$strRecargarFkQuery='',$kardex_detalleForeignKey,$kardex_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$kardex_detalleForeignKey->productosFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($kardex_detalle_session==null) {
			$kardex_detalle_session=new kardex_detalle_session();
		}
		
		if($kardex_detalle_session->bitBusquedaDesdeFKSesionproducto!=true) {
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
				if($kardex_detalleForeignKey->idproductoDefaultFK==0) {
					$kardex_detalleForeignKey->idproductoDefaultFK=$productoLocal->getId();
				}

				$kardex_detalleForeignKey->productosFK[$productoLocal->getId()]=kardex_detalle_util::getproductoDescripcion($productoLocal);
			}

		} else {

			if($kardex_detalle_session->bigidproductoActual!=null && $kardex_detalle_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($kardex_detalle_session->bigidproductoActual);//WithConnection

				$kardex_detalleForeignKey->productosFK[$productoLogic->getproducto()->getId()]=kardex_detalle_util::getproductoDescripcion($productoLogic->getproducto());
				$kardex_detalleForeignKey->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	public function cargarCombosunidadsFK($connexion=null,$strRecargarFkQuery='',$kardex_detalleForeignKey,$kardex_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$unidadLogic= new unidad_logic();
		$pagination= new Pagination();
		$kardex_detalleForeignKey->unidadsFK=array();

		$unidadLogic->setConnexion($connexion);
		$unidadLogic->getunidadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($kardex_detalle_session==null) {
			$kardex_detalle_session=new kardex_detalle_session();
		}
		
		if($kardex_detalle_session->bitBusquedaDesdeFKSesionunidad!=true) {
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
				if($kardex_detalleForeignKey->idunidadDefaultFK==0) {
					$kardex_detalleForeignKey->idunidadDefaultFK=$unidadLocal->getId();
				}

				$kardex_detalleForeignKey->unidadsFK[$unidadLocal->getId()]=kardex_detalle_util::getunidadDescripcion($unidadLocal);
			}

		} else {

			if($kardex_detalle_session->bigidunidadActual!=null && $kardex_detalle_session->bigidunidadActual > 0) {
				$unidadLogic->getEntity($kardex_detalle_session->bigidunidadActual);//WithConnection

				$kardex_detalleForeignKey->unidadsFK[$unidadLogic->getunidad()->getId()]=kardex_detalle_util::getunidadDescripcion($unidadLogic->getunidad());
				$kardex_detalleForeignKey->idunidadDefaultFK=$unidadLogic->getunidad()->getId();
			}
		}
	}

	public function cargarComboslote_productosFK($connexion=null,$strRecargarFkQuery='',$kardex_detalleForeignKey,$kardex_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$lote_productoLogic= new lote_producto_logic();
		$pagination= new Pagination();
		$kardex_detalleForeignKey->lote_productosFK=array();

		$lote_productoLogic->setConnexion($connexion);
		$lote_productoLogic->getlote_productoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($kardex_detalle_session==null) {
			$kardex_detalle_session=new kardex_detalle_session();
		}
		
		if($kardex_detalle_session->bitBusquedaDesdeFKSesionlote_producto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=lote_producto_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGloballote_producto=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGloballote_producto=Funciones::GetFinalQueryAppend($finalQueryGloballote_producto, '');
				$finalQueryGloballote_producto.=lote_producto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGloballote_producto.$strRecargarFkQuery;		

				$lote_productoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($lote_productoLogic->getlote_productos() as $lote_productoLocal ) {
				if($kardex_detalleForeignKey->idlote_productoDefaultFK==0) {
					$kardex_detalleForeignKey->idlote_productoDefaultFK=$lote_productoLocal->getId();
				}

				$kardex_detalleForeignKey->lote_productosFK[$lote_productoLocal->getId()]=kardex_detalle_util::getlote_productoDescripcion($lote_productoLocal);
			}

		} else {

			if($kardex_detalle_session->bigidlote_productoActual!=null && $kardex_detalle_session->bigidlote_productoActual > 0) {
				$lote_productoLogic->getEntity($kardex_detalle_session->bigidlote_productoActual);//WithConnection

				$kardex_detalleForeignKey->lote_productosFK[$lote_productoLogic->getlote_producto()->getId()]=kardex_detalle_util::getlote_productoDescripcion($lote_productoLogic->getlote_producto());
				$kardex_detalleForeignKey->idlote_productoDefaultFK=$lote_productoLogic->getlote_producto()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($kardex_detalle) {
		$this->saveRelacionesBase($kardex_detalle,true);
	}

	public function saveRelaciones($kardex_detalle) {
		$this->saveRelacionesBase($kardex_detalle,false);
	}

	public function saveRelacionesBase($kardex_detalle,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setkardex_detalle($kardex_detalle);

			if(kardex_detalle_logic_add::validarSaveRelaciones($kardex_detalle,$this)) {

				kardex_detalle_logic_add::updateRelacionesToSave($kardex_detalle,$this);

				if(($this->kardex_detalle->getIsNew() || $this->kardex_detalle->getIsChanged()) && !$this->kardex_detalle->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->kardex_detalle->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				kardex_detalle_logic_add::updateRelacionesToSaveAfter($kardex_detalle,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $kardex_detalles,kardex_detalle_param_return $kardex_detalleParameterGeneral) : kardex_detalle_param_return {
		$kardex_detalleReturnGeneral=new kardex_detalle_param_return();
	
		 try {	
			
			if($this->kardex_detalleLogicAdditional==null) {
				$this->kardex_detalleLogicAdditional=new kardex_detalle_logic_add();
			}
			
			$this->kardex_detalleLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$kardex_detalles,$kardex_detalleParameterGeneral,$kardex_detalleReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $kardex_detalleReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $kardex_detalles,kardex_detalle_param_return $kardex_detalleParameterGeneral) : kardex_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$kardex_detalleReturnGeneral=new kardex_detalle_param_return();
	
			
			if($this->kardex_detalleLogicAdditional==null) {
				$this->kardex_detalleLogicAdditional=new kardex_detalle_logic_add();
			}
			
			$this->kardex_detalleLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$kardex_detalles,$kardex_detalleParameterGeneral,$kardex_detalleReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $kardex_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $kardex_detalles,kardex_detalle $kardex_detalle,kardex_detalle_param_return $kardex_detalleParameterGeneral,bool $isEsNuevokardex_detalle,array $clases) : kardex_detalle_param_return {
		 try {	
			$kardex_detalleReturnGeneral=new kardex_detalle_param_return();
	
			$kardex_detalleReturnGeneral->setkardex_detalle($kardex_detalle);
			$kardex_detalleReturnGeneral->setkardex_detalles($kardex_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$kardex_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->kardex_detalleLogicAdditional==null) {
				$this->kardex_detalleLogicAdditional=new kardex_detalle_logic_add();
			}
			
			$kardex_detalleReturnGeneral=$this->kardex_detalleLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$kardex_detalles,$kardex_detalle,$kardex_detalleParameterGeneral,$kardex_detalleReturnGeneral,$isEsNuevokardex_detalle,$clases);
			
			/*kardex_detalleLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$kardex_detalles,$kardex_detalle,$kardex_detalleParameterGeneral,$kardex_detalleReturnGeneral,$isEsNuevokardex_detalle,$clases);*/
			
			return $kardex_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $kardex_detalles,kardex_detalle $kardex_detalle,kardex_detalle_param_return $kardex_detalleParameterGeneral,bool $isEsNuevokardex_detalle,array $clases) : kardex_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$kardex_detalleReturnGeneral=new kardex_detalle_param_return();
	
			$kardex_detalleReturnGeneral->setkardex_detalle($kardex_detalle);
			$kardex_detalleReturnGeneral->setkardex_detalles($kardex_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$kardex_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->kardex_detalleLogicAdditional==null) {
				$this->kardex_detalleLogicAdditional=new kardex_detalle_logic_add();
			}
			
			$kardex_detalleReturnGeneral=$this->kardex_detalleLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$kardex_detalles,$kardex_detalle,$kardex_detalleParameterGeneral,$kardex_detalleReturnGeneral,$isEsNuevokardex_detalle,$clases);
			
			/*kardex_detalleLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$kardex_detalles,$kardex_detalle,$kardex_detalleParameterGeneral,$kardex_detalleReturnGeneral,$isEsNuevokardex_detalle,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $kardex_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $kardex_detalles,kardex_detalle $kardex_detalle,kardex_detalle_param_return $kardex_detalleParameterGeneral,bool $isEsNuevokardex_detalle,array $clases) : kardex_detalle_param_return {
		 try {	
			$kardex_detalleReturnGeneral=new kardex_detalle_param_return();
	
			$kardex_detalleReturnGeneral->setkardex_detalle($kardex_detalle);
			$kardex_detalleReturnGeneral->setkardex_detalles($kardex_detalles);
			
			
			
			if($this->kardex_detalleLogicAdditional==null) {
				$this->kardex_detalleLogicAdditional=new kardex_detalle_logic_add();
			}
			
			$kardex_detalleReturnGeneral=$this->kardex_detalleLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$kardex_detalles,$kardex_detalle,$kardex_detalleParameterGeneral,$kardex_detalleReturnGeneral,$isEsNuevokardex_detalle,$clases);
			
			/*kardex_detalleLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$kardex_detalles,$kardex_detalle,$kardex_detalleParameterGeneral,$kardex_detalleReturnGeneral,$isEsNuevokardex_detalle,$clases);*/
			
			return $kardex_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $kardex_detalles,kardex_detalle $kardex_detalle,kardex_detalle_param_return $kardex_detalleParameterGeneral,bool $isEsNuevokardex_detalle,array $clases) : kardex_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$kardex_detalleReturnGeneral=new kardex_detalle_param_return();
	
			$kardex_detalleReturnGeneral->setkardex_detalle($kardex_detalle);
			$kardex_detalleReturnGeneral->setkardex_detalles($kardex_detalles);
			
			
			if($this->kardex_detalleLogicAdditional==null) {
				$this->kardex_detalleLogicAdditional=new kardex_detalle_logic_add();
			}
			
			$kardex_detalleReturnGeneral=$this->kardex_detalleLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$kardex_detalles,$kardex_detalle,$kardex_detalleParameterGeneral,$kardex_detalleReturnGeneral,$isEsNuevokardex_detalle,$clases);
			
			/*kardex_detalleLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$kardex_detalles,$kardex_detalle,$kardex_detalleParameterGeneral,$kardex_detalleReturnGeneral,$isEsNuevokardex_detalle,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $kardex_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,kardex_detalle $kardex_detalle,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,kardex_detalle $kardex_detalle,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		kardex_detalle_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(kardex_detalle $kardex_detalle,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			kardex_detalle_logic_add::updatekardex_detalleToGet($this->kardex_detalle);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$kardex_detalle->setkardex($this->kardex_detalleDataAccess->getkardex($this->connexion,$kardex_detalle));
		$kardex_detalle->setbodega($this->kardex_detalleDataAccess->getbodega($this->connexion,$kardex_detalle));
		$kardex_detalle->setproducto($this->kardex_detalleDataAccess->getproducto($this->connexion,$kardex_detalle));
		$kardex_detalle->setunidad($this->kardex_detalleDataAccess->getunidad($this->connexion,$kardex_detalle));
		$kardex_detalle->setlote_producto($this->kardex_detalleDataAccess->getlote_producto($this->connexion,$kardex_detalle));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$kardex_detalle->setkardex($this->kardex_detalleDataAccess->getkardex($this->connexion,$kardex_detalle));
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$kardex_detalle->setbodega($this->kardex_detalleDataAccess->getbodega($this->connexion,$kardex_detalle));
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$kardex_detalle->setproducto($this->kardex_detalleDataAccess->getproducto($this->connexion,$kardex_detalle));
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				$kardex_detalle->setunidad($this->kardex_detalleDataAccess->getunidad($this->connexion,$kardex_detalle));
				continue;
			}

			if($clas->clas==lote_producto::$class.'') {
				$kardex_detalle->setlote_producto($this->kardex_detalleDataAccess->getlote_producto($this->connexion,$kardex_detalle));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex_detalle->setkardex($this->kardex_detalleDataAccess->getkardex($this->connexion,$kardex_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex_detalle->setbodega($this->kardex_detalleDataAccess->getbodega($this->connexion,$kardex_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex_detalle->setproducto($this->kardex_detalleDataAccess->getproducto($this->connexion,$kardex_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex_detalle->setunidad($this->kardex_detalleDataAccess->getunidad($this->connexion,$kardex_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lote_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex_detalle->setlote_producto($this->kardex_detalleDataAccess->getlote_producto($this->connexion,$kardex_detalle));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$kardex_detalle->setkardex($this->kardex_detalleDataAccess->getkardex($this->connexion,$kardex_detalle));
		$kardexLogic= new kardex_logic($this->connexion);
		$kardexLogic->deepLoad($kardex_detalle->getkardex(),$isDeep,$deepLoadType,$clases);
				
		$kardex_detalle->setbodega($this->kardex_detalleDataAccess->getbodega($this->connexion,$kardex_detalle));
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepLoad($kardex_detalle->getbodega(),$isDeep,$deepLoadType,$clases);
				
		$kardex_detalle->setproducto($this->kardex_detalleDataAccess->getproducto($this->connexion,$kardex_detalle));
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepLoad($kardex_detalle->getproducto(),$isDeep,$deepLoadType,$clases);
				
		$kardex_detalle->setunidad($this->kardex_detalleDataAccess->getunidad($this->connexion,$kardex_detalle));
		$unidadLogic= new unidad_logic($this->connexion);
		$unidadLogic->deepLoad($kardex_detalle->getunidad(),$isDeep,$deepLoadType,$clases);
				
		$kardex_detalle->setlote_producto($this->kardex_detalleDataAccess->getlote_producto($this->connexion,$kardex_detalle));
		$lote_productoLogic= new lote_producto_logic($this->connexion);
		$lote_productoLogic->deepLoad($kardex_detalle->getlote_producto(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$kardex_detalle->setkardex($this->kardex_detalleDataAccess->getkardex($this->connexion,$kardex_detalle));
				$kardexLogic= new kardex_logic($this->connexion);
				$kardexLogic->deepLoad($kardex_detalle->getkardex(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$kardex_detalle->setbodega($this->kardex_detalleDataAccess->getbodega($this->connexion,$kardex_detalle));
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepLoad($kardex_detalle->getbodega(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$kardex_detalle->setproducto($this->kardex_detalleDataAccess->getproducto($this->connexion,$kardex_detalle));
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($kardex_detalle->getproducto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				$kardex_detalle->setunidad($this->kardex_detalleDataAccess->getunidad($this->connexion,$kardex_detalle));
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepLoad($kardex_detalle->getunidad(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==lote_producto::$class.'') {
				$kardex_detalle->setlote_producto($this->kardex_detalleDataAccess->getlote_producto($this->connexion,$kardex_detalle));
				$lote_productoLogic= new lote_producto_logic($this->connexion);
				$lote_productoLogic->deepLoad($kardex_detalle->getlote_producto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex_detalle->setkardex($this->kardex_detalleDataAccess->getkardex($this->connexion,$kardex_detalle));
			$kardexLogic= new kardex_logic($this->connexion);
			$kardexLogic->deepLoad($kardex_detalle->getkardex(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex_detalle->setbodega($this->kardex_detalleDataAccess->getbodega($this->connexion,$kardex_detalle));
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepLoad($kardex_detalle->getbodega(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex_detalle->setproducto($this->kardex_detalleDataAccess->getproducto($this->connexion,$kardex_detalle));
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($kardex_detalle->getproducto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex_detalle->setunidad($this->kardex_detalleDataAccess->getunidad($this->connexion,$kardex_detalle));
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepLoad($kardex_detalle->getunidad(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==lote_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$kardex_detalle->setlote_producto($this->kardex_detalleDataAccess->getlote_producto($this->connexion,$kardex_detalle));
			$lote_productoLogic= new lote_producto_logic($this->connexion);
			$lote_productoLogic->deepLoad($kardex_detalle->getlote_producto(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(kardex_detalle $kardex_detalle,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			kardex_detalle_logic_add::updatekardex_detalleToSave($this->kardex_detalle);			
			
			if(!$paraDeleteCascade) {				
				kardex_detalle_data::save($kardex_detalle, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		kardex_data::save($kardex_detalle->getkardex(),$this->connexion);
		bodega_data::save($kardex_detalle->getbodega(),$this->connexion);
		producto_data::save($kardex_detalle->getproducto(),$this->connexion);
		unidad_data::save($kardex_detalle->getunidad(),$this->connexion);
		lote_producto_data::save($kardex_detalle->getlote_producto(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				kardex_data::save($kardex_detalle->getkardex(),$this->connexion);
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($kardex_detalle->getbodega(),$this->connexion);
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($kardex_detalle->getproducto(),$this->connexion);
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				unidad_data::save($kardex_detalle->getunidad(),$this->connexion);
				continue;
			}

			if($clas->clas==lote_producto::$class.'') {
				lote_producto_data::save($kardex_detalle->getlote_producto(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			kardex_data::save($kardex_detalle->getkardex(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($kardex_detalle->getbodega(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($kardex_detalle->getproducto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($kardex_detalle->getunidad(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==lote_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			lote_producto_data::save($kardex_detalle->getlote_producto(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		kardex_data::save($kardex_detalle->getkardex(),$this->connexion);
		$kardexLogic= new kardex_logic($this->connexion);
		$kardexLogic->deepSave($kardex_detalle->getkardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		bodega_data::save($kardex_detalle->getbodega(),$this->connexion);
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepSave($kardex_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		producto_data::save($kardex_detalle->getproducto(),$this->connexion);
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepSave($kardex_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		unidad_data::save($kardex_detalle->getunidad(),$this->connexion);
		$unidadLogic= new unidad_logic($this->connexion);
		$unidadLogic->deepSave($kardex_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		lote_producto_data::save($kardex_detalle->getlote_producto(),$this->connexion);
		$lote_productoLogic= new lote_producto_logic($this->connexion);
		$lote_productoLogic->deepSave($kardex_detalle->getlote_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				kardex_data::save($kardex_detalle->getkardex(),$this->connexion);
				$kardexLogic= new kardex_logic($this->connexion);
				$kardexLogic->deepSave($kardex_detalle->getkardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($kardex_detalle->getbodega(),$this->connexion);
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepSave($kardex_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($kardex_detalle->getproducto(),$this->connexion);
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepSave($kardex_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				unidad_data::save($kardex_detalle->getunidad(),$this->connexion);
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepSave($kardex_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==lote_producto::$class.'') {
				lote_producto_data::save($kardex_detalle->getlote_producto(),$this->connexion);
				$lote_productoLogic= new lote_producto_logic($this->connexion);
				$lote_productoLogic->deepSave($kardex_detalle->getlote_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			kardex_data::save($kardex_detalle->getkardex(),$this->connexion);
			$kardexLogic= new kardex_logic($this->connexion);
			$kardexLogic->deepSave($kardex_detalle->getkardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($kardex_detalle->getbodega(),$this->connexion);
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepSave($kardex_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($kardex_detalle->getproducto(),$this->connexion);
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepSave($kardex_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($kardex_detalle->getunidad(),$this->connexion);
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepSave($kardex_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==lote_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			lote_producto_data::save($kardex_detalle->getlote_producto(),$this->connexion);
			$lote_productoLogic= new lote_producto_logic($this->connexion);
			$lote_productoLogic->deepSave($kardex_detalle->getlote_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				kardex_detalle_data::save($kardex_detalle, $this->connexion);
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
			
			$this->deepLoad($this->kardex_detalle,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->kardex_detalles as $kardex_detalle) {
				$this->deepLoad($kardex_detalle,$isDeep,$deepLoadType,$clases);
								
				kardex_detalle_util::refrescarFKDescripciones($this->kardex_detalles);
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
			
			foreach($this->kardex_detalles as $kardex_detalle) {
				$this->deepLoad($kardex_detalle,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->kardex_detalle,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->kardex_detalles as $kardex_detalle) {
				$this->deepSave($kardex_detalle,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->kardex_detalles as $kardex_detalle) {
				$this->deepSave($kardex_detalle,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(kardex::$class);
				$classes[]=new Classe(bodega::$class);
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(unidad::$class);
				$classes[]=new Classe(lote_producto::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==kardex::$class) {
						$classes[]=new Classe(kardex::$class);
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

				foreach($classesP as $clas)
				{
					if($clas->clas==lote_producto::$class) {
						$classes[]=new Classe(lote_producto::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==kardex::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(kardex::$class);
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

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==lote_producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(lote_producto::$class);
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
	
	
	
	
	
	
	
	public function getkardex_detalle() : ?kardex_detalle {	
		/*
		kardex_detalle_logic_add::checkkardex_detalleToGet($this->kardex_detalle,$this->datosCliente);
		kardex_detalle_logic_add::updatekardex_detalleToGet($this->kardex_detalle);
		*/
			
		return $this->kardex_detalle;
	}
		
	public function setkardex_detalle(kardex_detalle $newkardex_detalle) {
		$this->kardex_detalle = $newkardex_detalle;
	}
	
	public function getkardex_detalles() : array {		
		/*
		kardex_detalle_logic_add::checkkardex_detalleToGets($this->kardex_detalles,$this->datosCliente);
		
		foreach ($this->kardex_detalles as $kardex_detalleLocal ) {
			kardex_detalle_logic_add::updatekardex_detalleToGet($kardex_detalleLocal);
		}
		*/
		
		return $this->kardex_detalles;
	}
	
	public function setkardex_detalles(array $newkardex_detalles) {
		$this->kardex_detalles = $newkardex_detalles;
	}
	
	public function getkardex_detalleDataAccess() : kardex_detalle_data {
		return $this->kardex_detalleDataAccess;
	}
	
	public function setkardex_detalleDataAccess(kardex_detalle_data $newkardex_detalleDataAccess) {
		$this->kardex_detalleDataAccess = $newkardex_detalleDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        kardex_detalle_carga::$CONTROLLER;;        
		
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
