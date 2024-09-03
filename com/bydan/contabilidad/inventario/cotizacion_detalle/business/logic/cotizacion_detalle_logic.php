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

namespace com\bydan\contabilidad\inventario\cotizacion_detalle\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_carga;
use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_param_return;

use com\bydan\contabilidad\inventario\cotizacion_detalle\presentation\session\cotizacion_detalle_session;

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

use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_util;
use com\bydan\contabilidad\inventario\cotizacion_detalle\business\entity\cotizacion_detalle;
use com\bydan\contabilidad\inventario\cotizacion_detalle\business\data\cotizacion_detalle_data;

//FK


use com\bydan\contabilidad\inventario\cotizacion\business\entity\cotizacion;
use com\bydan\contabilidad\inventario\cotizacion\business\data\cotizacion_data;
use com\bydan\contabilidad\inventario\cotizacion\business\logic\cotizacion_logic;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_util;

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

use com\bydan\contabilidad\inventario\otro_suplidor\business\entity\otro_suplidor;
use com\bydan\contabilidad\inventario\otro_suplidor\business\data\otro_suplidor_data;
use com\bydan\contabilidad\inventario\otro_suplidor\business\logic\otro_suplidor_logic;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_util;

//REL


//REL DETALLES




class cotizacion_detalle_logic  extends GeneralEntityLogic implements cotizacion_detalle_logicI {	
	/*GENERAL*/
	public cotizacion_detalle_data $cotizacion_detalleDataAccess;
	public ?cotizacion_detalle_logic_add $cotizacion_detalleLogicAdditional=null;
	public ?cotizacion_detalle $cotizacion_detalle;
	public array $cotizacion_detalles;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->cotizacion_detalleDataAccess = new cotizacion_detalle_data();			
			$this->cotizacion_detalles = array();
			$this->cotizacion_detalle = new cotizacion_detalle();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->cotizacion_detalleLogicAdditional = new cotizacion_detalle_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->cotizacion_detalleLogicAdditional==null) {
			$this->cotizacion_detalleLogicAdditional=new cotizacion_detalle_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->cotizacion_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->cotizacion_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->cotizacion_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->cotizacion_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->cotizacion_detalles = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->cotizacion_detalles = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);
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
		$this->cotizacion_detalle = new cotizacion_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->cotizacion_detalle=$this->cotizacion_detalleDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cotizacion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cotizacion_detalle_util::refrescarFKDescripcion($this->cotizacion_detalle);
			}
						
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGet($this->cotizacion_detalle,$this->datosCliente);
			cotizacion_detalle_logic_add::updatecotizacion_detalleToGet($this->cotizacion_detalle);
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
		$this->cotizacion_detalle = new  cotizacion_detalle();
		  		  
        try {		
			$this->cotizacion_detalle=$this->cotizacion_detalleDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cotizacion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cotizacion_detalle_util::refrescarFKDescripcion($this->cotizacion_detalle);
			}
			
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGet($this->cotizacion_detalle,$this->datosCliente);
			cotizacion_detalle_logic_add::updatecotizacion_detalleToGet($this->cotizacion_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?cotizacion_detalle {
		$cotizacion_detalleLogic = new  cotizacion_detalle_logic();
		  		  
        try {		
			$cotizacion_detalleLogic->setConnexion($connexion);			
			$cotizacion_detalleLogic->getEntity($id);			
			return $cotizacion_detalleLogic->getcotizacion_detalle();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->cotizacion_detalle = new  cotizacion_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->cotizacion_detalle=$this->cotizacion_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cotizacion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cotizacion_detalle_util::refrescarFKDescripcion($this->cotizacion_detalle);
			}
			
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGet($this->cotizacion_detalle,$this->datosCliente);
			cotizacion_detalle_logic_add::updatecotizacion_detalleToGet($this->cotizacion_detalle);
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
		$this->cotizacion_detalle = new  cotizacion_detalle();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cotizacion_detalle=$this->cotizacion_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cotizacion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cotizacion_detalle_util::refrescarFKDescripcion($this->cotizacion_detalle);
			}
			
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGet($this->cotizacion_detalle,$this->datosCliente);
			cotizacion_detalle_logic_add::updatecotizacion_detalleToGet($this->cotizacion_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?cotizacion_detalle {
		$cotizacion_detalleLogic = new  cotizacion_detalle_logic();
		  		  
        try {		
			$cotizacion_detalleLogic->setConnexion($connexion);			
			$cotizacion_detalleLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $cotizacion_detalleLogic->getcotizacion_detalle();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cotizacion_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);			
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
		$this->cotizacion_detalles = array();
		  		  
        try {			
			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->cotizacion_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);
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
		$this->cotizacion_detalles = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$cotizacion_detalleLogic = new  cotizacion_detalle_logic();
		  		  
        try {		
			$cotizacion_detalleLogic->setConnexion($connexion);			
			$cotizacion_detalleLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $cotizacion_detalleLogic->getcotizacion_detalles();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->cotizacion_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);
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
		$this->cotizacion_detalles = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->cotizacion_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);
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
		$this->cotizacion_detalles = array();
		  		  
        try {			
			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}	
			
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cotizacion_detalles = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);
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
		$this->cotizacion_detalles = array();
		  		  
        try {		
			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,cotizacion_detalle_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,cotizacion_detalle_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdcotizacionWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cotizacion) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cotizacion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cotizacion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cotizacion,cotizacion_detalle_util::$ID_COTIZACION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cotizacion);

			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcotizacion(string $strFinalQuery,Pagination $pagination,int $id_cotizacion) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cotizacion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cotizacion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cotizacion,cotizacion_detalle_util::$ID_COTIZACION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cotizacion);

			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idotro_suplidorWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_otro_suplidor) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_otro_suplidor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_otro_suplidor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_otro_suplidor,cotizacion_detalle_util::$ID_OTRO_SUPLIDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_otro_suplidor);

			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idotro_suplidor(string $strFinalQuery,Pagination $pagination,?int $id_otro_suplidor) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_otro_suplidor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_otro_suplidor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_otro_suplidor,cotizacion_detalle_util::$ID_OTRO_SUPLIDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_otro_suplidor);

			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);
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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,cotizacion_detalle_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);

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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,cotizacion_detalle_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);
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
			$parameterSelectionGeneralid_unidad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad,cotizacion_detalle_util::$ID_UNIDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad);

			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);

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
			$parameterSelectionGeneralid_unidad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad,cotizacion_detalle_util::$ID_UNIDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad);

			$this->cotizacion_detalles=$this->cotizacion_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacion_detalles);
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
						
			//cotizacion_detalle_logic_add::checkcotizacion_detalleToSave($this->cotizacion_detalle,$this->datosCliente,$this->connexion);	       
			cotizacion_detalle_logic_add::updatecotizacion_detalleToSave($this->cotizacion_detalle);			
			cotizacion_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cotizacion_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->cotizacion_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->cotizacion_detalle,$this->datosCliente,$this->connexion);
			
			
			cotizacion_detalle_data::save($this->cotizacion_detalle, $this->connexion);	    	       	 				
			//cotizacion_detalle_logic_add::checkcotizacion_detalleToSaveAfter($this->cotizacion_detalle,$this->datosCliente,$this->connexion);			
			$this->cotizacion_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cotizacion_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cotizacion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cotizacion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cotizacion_detalle_util::refrescarFKDescripcion($this->cotizacion_detalle);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->cotizacion_detalle->getIsDeleted()) {
				$this->cotizacion_detalle=null;
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
						
			/*cotizacion_detalle_logic_add::checkcotizacion_detalleToSave($this->cotizacion_detalle,$this->datosCliente,$this->connexion);*/	        
			cotizacion_detalle_logic_add::updatecotizacion_detalleToSave($this->cotizacion_detalle);			
			$this->cotizacion_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->cotizacion_detalle,$this->datosCliente,$this->connexion);			
			cotizacion_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cotizacion_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			cotizacion_detalle_data::save($this->cotizacion_detalle, $this->connexion);	    	       	 						
			/*cotizacion_detalle_logic_add::checkcotizacion_detalleToSaveAfter($this->cotizacion_detalle,$this->datosCliente,$this->connexion);*/			
			$this->cotizacion_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cotizacion_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cotizacion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cotizacion_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cotizacion_detalle_util::refrescarFKDescripcion($this->cotizacion_detalle);				
			}
			
			if($this->cotizacion_detalle->getIsDeleted()) {
				$this->cotizacion_detalle=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(cotizacion_detalle $cotizacion_detalle,Connexion $connexion)  {
		$cotizacion_detalleLogic = new  cotizacion_detalle_logic();		  		  
        try {		
			$cotizacion_detalleLogic->setConnexion($connexion);			
			$cotizacion_detalleLogic->setcotizacion_detalle($cotizacion_detalle);			
			$cotizacion_detalleLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*cotizacion_detalle_logic_add::checkcotizacion_detalleToSaves($this->cotizacion_detalles,$this->datosCliente,$this->connexion);*/	        	
			$this->cotizacion_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cotizacion_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cotizacion_detalles as $cotizacion_detalleLocal) {				
								
				cotizacion_detalle_logic_add::updatecotizacion_detalleToSave($cotizacion_detalleLocal);	        	
				cotizacion_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cotizacion_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				cotizacion_detalle_data::save($cotizacion_detalleLocal, $this->connexion);				
			}
			
			/*cotizacion_detalle_logic_add::checkcotizacion_detalleToSavesAfter($this->cotizacion_detalles,$this->datosCliente,$this->connexion);*/			
			$this->cotizacion_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cotizacion_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
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
			/*cotizacion_detalle_logic_add::checkcotizacion_detalleToSaves($this->cotizacion_detalles,$this->datosCliente,$this->connexion);*/			
			$this->cotizacion_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cotizacion_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cotizacion_detalles as $cotizacion_detalleLocal) {				
								
				cotizacion_detalle_logic_add::updatecotizacion_detalleToSave($cotizacion_detalleLocal);	        	
				cotizacion_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cotizacion_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				cotizacion_detalle_data::save($cotizacion_detalleLocal, $this->connexion);				
			}			
			
			/*cotizacion_detalle_logic_add::checkcotizacion_detalleToSavesAfter($this->cotizacion_detalles,$this->datosCliente,$this->connexion);*/			
			$this->cotizacion_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cotizacion_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $cotizacion_detalles,Connexion $connexion)  {
		$cotizacion_detalleLogic = new  cotizacion_detalle_logic();
		  		  
        try {		
			$cotizacion_detalleLogic->setConnexion($connexion);			
			$cotizacion_detalleLogic->setcotizacion_detalles($cotizacion_detalles);			
			$cotizacion_detalleLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$cotizacion_detallesAux=array();
		
		foreach($this->cotizacion_detalles as $cotizacion_detalle) {
			if($cotizacion_detalle->getIsDeleted()==false) {
				$cotizacion_detallesAux[]=$cotizacion_detalle;
			}
		}
		
		$this->cotizacion_detalles=$cotizacion_detallesAux;
	}
	
	public function updateToGetsAuxiliar(array &$cotizacion_detalles) {
		if($this->cotizacion_detalleLogicAdditional==null) {
			$this->cotizacion_detalleLogicAdditional=new cotizacion_detalle_logic_add();
		}
		
		
		$this->cotizacion_detalleLogicAdditional->updateToGets($cotizacion_detalles,$this);					
		$this->cotizacion_detalleLogicAdditional->updateToGetsReferencia($cotizacion_detalles,$this);			
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->cotizacion_detalles as $cotizacion_detalle) {
				
				$cotizacion_detalle->setid_cotizacion_Descripcion(cotizacion_detalle_util::getcotizacionDescripcion($cotizacion_detalle->getcotizacion()));
				$cotizacion_detalle->setid_bodega_Descripcion(cotizacion_detalle_util::getbodegaDescripcion($cotizacion_detalle->getbodega()));
				$cotizacion_detalle->setid_producto_Descripcion(cotizacion_detalle_util::getproductoDescripcion($cotizacion_detalle->getproducto()));
				$cotizacion_detalle->setid_unidad_Descripcion(cotizacion_detalle_util::getunidadDescripcion($cotizacion_detalle->getunidad()));
				$cotizacion_detalle->setid_otro_suplidor_Descripcion(cotizacion_detalle_util::getotro_suplidorDescripcion($cotizacion_detalle->getotro_suplidor()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cotizacion_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cotizacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cotizacion_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cotizacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cotizacion_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$cotizacion_detalleForeignKey=new cotizacion_detalle_param_return();//cotizacion_detalleForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cotizacion',$strRecargarFkTipos,',')) {
				$this->cargarComboscotizacionsFK($this->connexion,$strRecargarFkQuery,$cotizacion_detalleForeignKey,$cotizacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTipos,',')) {
				$this->cargarCombosbodegasFK($this->connexion,$strRecargarFkQuery,$cotizacion_detalleForeignKey,$cotizacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombosproductosFK($this->connexion,$strRecargarFkQuery,$cotizacion_detalleForeignKey,$cotizacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_unidad',$strRecargarFkTipos,',')) {
				$this->cargarCombosunidadsFK($this->connexion,$strRecargarFkQuery,$cotizacion_detalleForeignKey,$cotizacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_otro_suplidor',$strRecargarFkTipos,',')) {
				$this->cargarCombosotro_suplidorsFK($this->connexion,$strRecargarFkQuery,$cotizacion_detalleForeignKey,$cotizacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cotizacion',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscotizacionsFK($this->connexion,' where id=-1 ',$cotizacion_detalleForeignKey,$cotizacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosbodegasFK($this->connexion,' where id=-1 ',$cotizacion_detalleForeignKey,$cotizacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproductosFK($this->connexion,' where id=-1 ',$cotizacion_detalleForeignKey,$cotizacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_unidad',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosunidadsFK($this->connexion,' where id=-1 ',$cotizacion_detalleForeignKey,$cotizacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_otro_suplidor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosotro_suplidorsFK($this->connexion,' where id=-1 ',$cotizacion_detalleForeignKey,$cotizacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $cotizacion_detalleForeignKey;
			
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
	
	
	public function cargarComboscotizacionsFK($connexion=null,$strRecargarFkQuery='',$cotizacion_detalleForeignKey,$cotizacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cotizacionLogic= new cotizacion_logic();
		$pagination= new Pagination();
		$cotizacion_detalleForeignKey->cotizacionsFK=array();

		$cotizacionLogic->setConnexion($connexion);
		$cotizacionLogic->getcotizacionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cotizacion_detalle_session==null) {
			$cotizacion_detalle_session=new cotizacion_detalle_session();
		}
		
		if($cotizacion_detalle_session->bitBusquedaDesdeFKSesioncotizacion!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cotizacion_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcotizacion=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcotizacion=Funciones::GetFinalQueryAppend($finalQueryGlobalcotizacion, '');
				$finalQueryGlobalcotizacion.=cotizacion_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcotizacion.$strRecargarFkQuery;		

				$cotizacionLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($cotizacionLogic->getcotizacions() as $cotizacionLocal ) {
				if($cotizacion_detalleForeignKey->idcotizacionDefaultFK==0) {
					$cotizacion_detalleForeignKey->idcotizacionDefaultFK=$cotizacionLocal->getId();
				}

				$cotizacion_detalleForeignKey->cotizacionsFK[$cotizacionLocal->getId()]=cotizacion_detalle_util::getcotizacionDescripcion($cotizacionLocal);
			}

		} else {

			if($cotizacion_detalle_session->bigidcotizacionActual!=null && $cotizacion_detalle_session->bigidcotizacionActual > 0) {
				$cotizacionLogic->getEntity($cotizacion_detalle_session->bigidcotizacionActual);//WithConnection

				$cotizacion_detalleForeignKey->cotizacionsFK[$cotizacionLogic->getcotizacion()->getId()]=cotizacion_detalle_util::getcotizacionDescripcion($cotizacionLogic->getcotizacion());
				$cotizacion_detalleForeignKey->idcotizacionDefaultFK=$cotizacionLogic->getcotizacion()->getId();
			}
		}
	}

	public function cargarCombosbodegasFK($connexion=null,$strRecargarFkQuery='',$cotizacion_detalleForeignKey,$cotizacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$cotizacion_detalleForeignKey->bodegasFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cotizacion_detalle_session==null) {
			$cotizacion_detalle_session=new cotizacion_detalle_session();
		}
		
		if($cotizacion_detalle_session->bitBusquedaDesdeFKSesionbodega!=true) {
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
				if($cotizacion_detalleForeignKey->idbodegaDefaultFK==0) {
					$cotizacion_detalleForeignKey->idbodegaDefaultFK=$bodegaLocal->getId();
				}

				$cotizacion_detalleForeignKey->bodegasFK[$bodegaLocal->getId()]=cotizacion_detalle_util::getbodegaDescripcion($bodegaLocal);
			}

		} else {

			if($cotizacion_detalle_session->bigidbodegaActual!=null && $cotizacion_detalle_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($cotizacion_detalle_session->bigidbodegaActual);//WithConnection

				$cotizacion_detalleForeignKey->bodegasFK[$bodegaLogic->getbodega()->getId()]=cotizacion_detalle_util::getbodegaDescripcion($bodegaLogic->getbodega());
				$cotizacion_detalleForeignKey->idbodegaDefaultFK=$bodegaLogic->getbodega()->getId();
			}
		}
	}

	public function cargarCombosproductosFK($connexion=null,$strRecargarFkQuery='',$cotizacion_detalleForeignKey,$cotizacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$cotizacion_detalleForeignKey->productosFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cotizacion_detalle_session==null) {
			$cotizacion_detalle_session=new cotizacion_detalle_session();
		}
		
		if($cotizacion_detalle_session->bitBusquedaDesdeFKSesionproducto!=true) {
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
				if($cotizacion_detalleForeignKey->idproductoDefaultFK==0) {
					$cotizacion_detalleForeignKey->idproductoDefaultFK=$productoLocal->getId();
				}

				$cotizacion_detalleForeignKey->productosFK[$productoLocal->getId()]=cotizacion_detalle_util::getproductoDescripcion($productoLocal);
			}

		} else {

			if($cotizacion_detalle_session->bigidproductoActual!=null && $cotizacion_detalle_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($cotizacion_detalle_session->bigidproductoActual);//WithConnection

				$cotizacion_detalleForeignKey->productosFK[$productoLogic->getproducto()->getId()]=cotizacion_detalle_util::getproductoDescripcion($productoLogic->getproducto());
				$cotizacion_detalleForeignKey->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	public function cargarCombosunidadsFK($connexion=null,$strRecargarFkQuery='',$cotizacion_detalleForeignKey,$cotizacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$unidadLogic= new unidad_logic();
		$pagination= new Pagination();
		$cotizacion_detalleForeignKey->unidadsFK=array();

		$unidadLogic->setConnexion($connexion);
		$unidadLogic->getunidadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cotizacion_detalle_session==null) {
			$cotizacion_detalle_session=new cotizacion_detalle_session();
		}
		
		if($cotizacion_detalle_session->bitBusquedaDesdeFKSesionunidad!=true) {
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
				if($cotizacion_detalleForeignKey->idunidadDefaultFK==0) {
					$cotizacion_detalleForeignKey->idunidadDefaultFK=$unidadLocal->getId();
				}

				$cotizacion_detalleForeignKey->unidadsFK[$unidadLocal->getId()]=cotizacion_detalle_util::getunidadDescripcion($unidadLocal);
			}

		} else {

			if($cotizacion_detalle_session->bigidunidadActual!=null && $cotizacion_detalle_session->bigidunidadActual > 0) {
				$unidadLogic->getEntity($cotizacion_detalle_session->bigidunidadActual);//WithConnection

				$cotizacion_detalleForeignKey->unidadsFK[$unidadLogic->getunidad()->getId()]=cotizacion_detalle_util::getunidadDescripcion($unidadLogic->getunidad());
				$cotizacion_detalleForeignKey->idunidadDefaultFK=$unidadLogic->getunidad()->getId();
			}
		}
	}

	public function cargarCombosotro_suplidorsFK($connexion=null,$strRecargarFkQuery='',$cotizacion_detalleForeignKey,$cotizacion_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$otro_suplidorLogic= new otro_suplidor_logic();
		$pagination= new Pagination();
		$cotizacion_detalleForeignKey->otro_suplidorsFK=array();

		$otro_suplidorLogic->setConnexion($connexion);
		$otro_suplidorLogic->getotro_suplidorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cotizacion_detalle_session==null) {
			$cotizacion_detalle_session=new cotizacion_detalle_session();
		}
		
		if($cotizacion_detalle_session->bitBusquedaDesdeFKSesionotro_suplidor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=otro_suplidor_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalotro_suplidor=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalotro_suplidor=Funciones::GetFinalQueryAppend($finalQueryGlobalotro_suplidor, '');
				$finalQueryGlobalotro_suplidor.=otro_suplidor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalotro_suplidor.$strRecargarFkQuery;		

				$otro_suplidorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($otro_suplidorLogic->getotro_suplidors() as $otro_suplidorLocal ) {
				if($cotizacion_detalleForeignKey->idotro_suplidorDefaultFK==0) {
					$cotizacion_detalleForeignKey->idotro_suplidorDefaultFK=$otro_suplidorLocal->getId();
				}

				$cotizacion_detalleForeignKey->otro_suplidorsFK[$otro_suplidorLocal->getId()]=cotizacion_detalle_util::getotro_suplidorDescripcion($otro_suplidorLocal);
			}

		} else {

			if($cotizacion_detalle_session->bigidotro_suplidorActual!=null && $cotizacion_detalle_session->bigidotro_suplidorActual > 0) {
				$otro_suplidorLogic->getEntity($cotizacion_detalle_session->bigidotro_suplidorActual);//WithConnection

				$cotizacion_detalleForeignKey->otro_suplidorsFK[$otro_suplidorLogic->getotro_suplidor()->getId()]=cotizacion_detalle_util::getotro_suplidorDescripcion($otro_suplidorLogic->getotro_suplidor());
				$cotizacion_detalleForeignKey->idotro_suplidorDefaultFK=$otro_suplidorLogic->getotro_suplidor()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($cotizacion_detalle) {
		$this->saveRelacionesBase($cotizacion_detalle,true);
	}

	public function saveRelaciones($cotizacion_detalle) {
		$this->saveRelacionesBase($cotizacion_detalle,false);
	}

	public function saveRelacionesBase($cotizacion_detalle,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setcotizacion_detalle($cotizacion_detalle);

			if(cotizacion_detalle_logic_add::validarSaveRelaciones($cotizacion_detalle,$this)) {

				cotizacion_detalle_logic_add::updateRelacionesToSave($cotizacion_detalle,$this);

				if(($this->cotizacion_detalle->getIsNew() || $this->cotizacion_detalle->getIsChanged()) && !$this->cotizacion_detalle->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->cotizacion_detalle->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				cotizacion_detalle_logic_add::updateRelacionesToSaveAfter($cotizacion_detalle,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $cotizacion_detalles,cotizacion_detalle_param_return $cotizacion_detalleParameterGeneral) : cotizacion_detalle_param_return {
		$cotizacion_detalleReturnGeneral=new cotizacion_detalle_param_return();
	
		 try {	
			
			if($this->cotizacion_detalleLogicAdditional==null) {
				$this->cotizacion_detalleLogicAdditional=new cotizacion_detalle_logic_add();
			}
			
			$this->cotizacion_detalleLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$cotizacion_detalles,$cotizacion_detalleParameterGeneral,$cotizacion_detalleReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $cotizacion_detalleReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $cotizacion_detalles,cotizacion_detalle_param_return $cotizacion_detalleParameterGeneral) : cotizacion_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cotizacion_detalleReturnGeneral=new cotizacion_detalle_param_return();
	
			
			if($this->cotizacion_detalleLogicAdditional==null) {
				$this->cotizacion_detalleLogicAdditional=new cotizacion_detalle_logic_add();
			}
			
			$this->cotizacion_detalleLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$cotizacion_detalles,$cotizacion_detalleParameterGeneral,$cotizacion_detalleReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $cotizacion_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cotizacion_detalles,cotizacion_detalle $cotizacion_detalle,cotizacion_detalle_param_return $cotizacion_detalleParameterGeneral,bool $isEsNuevocotizacion_detalle,array $clases) : cotizacion_detalle_param_return {
		 try {	
			$cotizacion_detalleReturnGeneral=new cotizacion_detalle_param_return();
	
			$cotizacion_detalleReturnGeneral->setcotizacion_detalle($cotizacion_detalle);
			$cotizacion_detalleReturnGeneral->setcotizacion_detalles($cotizacion_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cotizacion_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->cotizacion_detalleLogicAdditional==null) {
				$this->cotizacion_detalleLogicAdditional=new cotizacion_detalle_logic_add();
			}
			
			$cotizacion_detalleReturnGeneral=$this->cotizacion_detalleLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cotizacion_detalles,$cotizacion_detalle,$cotizacion_detalleParameterGeneral,$cotizacion_detalleReturnGeneral,$isEsNuevocotizacion_detalle,$clases);
			
			/*cotizacion_detalleLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cotizacion_detalles,$cotizacion_detalle,$cotizacion_detalleParameterGeneral,$cotizacion_detalleReturnGeneral,$isEsNuevocotizacion_detalle,$clases);*/
			
			return $cotizacion_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cotizacion_detalles,cotizacion_detalle $cotizacion_detalle,cotizacion_detalle_param_return $cotizacion_detalleParameterGeneral,bool $isEsNuevocotizacion_detalle,array $clases) : cotizacion_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cotizacion_detalleReturnGeneral=new cotizacion_detalle_param_return();
	
			$cotizacion_detalleReturnGeneral->setcotizacion_detalle($cotizacion_detalle);
			$cotizacion_detalleReturnGeneral->setcotizacion_detalles($cotizacion_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cotizacion_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->cotizacion_detalleLogicAdditional==null) {
				$this->cotizacion_detalleLogicAdditional=new cotizacion_detalle_logic_add();
			}
			
			$cotizacion_detalleReturnGeneral=$this->cotizacion_detalleLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cotizacion_detalles,$cotizacion_detalle,$cotizacion_detalleParameterGeneral,$cotizacion_detalleReturnGeneral,$isEsNuevocotizacion_detalle,$clases);
			
			/*cotizacion_detalleLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cotizacion_detalles,$cotizacion_detalle,$cotizacion_detalleParameterGeneral,$cotizacion_detalleReturnGeneral,$isEsNuevocotizacion_detalle,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $cotizacion_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cotizacion_detalles,cotizacion_detalle $cotizacion_detalle,cotizacion_detalle_param_return $cotizacion_detalleParameterGeneral,bool $isEsNuevocotizacion_detalle,array $clases) : cotizacion_detalle_param_return {
		 try {	
			$cotizacion_detalleReturnGeneral=new cotizacion_detalle_param_return();
	
			$cotizacion_detalleReturnGeneral->setcotizacion_detalle($cotizacion_detalle);
			$cotizacion_detalleReturnGeneral->setcotizacion_detalles($cotizacion_detalles);
			
			
			
			if($this->cotizacion_detalleLogicAdditional==null) {
				$this->cotizacion_detalleLogicAdditional=new cotizacion_detalle_logic_add();
			}
			
			$cotizacion_detalleReturnGeneral=$this->cotizacion_detalleLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cotizacion_detalles,$cotizacion_detalle,$cotizacion_detalleParameterGeneral,$cotizacion_detalleReturnGeneral,$isEsNuevocotizacion_detalle,$clases);
			
			/*cotizacion_detalleLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cotizacion_detalles,$cotizacion_detalle,$cotizacion_detalleParameterGeneral,$cotizacion_detalleReturnGeneral,$isEsNuevocotizacion_detalle,$clases);*/
			
			return $cotizacion_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cotizacion_detalles,cotizacion_detalle $cotizacion_detalle,cotizacion_detalle_param_return $cotizacion_detalleParameterGeneral,bool $isEsNuevocotizacion_detalle,array $clases) : cotizacion_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cotizacion_detalleReturnGeneral=new cotizacion_detalle_param_return();
	
			$cotizacion_detalleReturnGeneral->setcotizacion_detalle($cotizacion_detalle);
			$cotizacion_detalleReturnGeneral->setcotizacion_detalles($cotizacion_detalles);
			
			
			if($this->cotizacion_detalleLogicAdditional==null) {
				$this->cotizacion_detalleLogicAdditional=new cotizacion_detalle_logic_add();
			}
			
			$cotizacion_detalleReturnGeneral=$this->cotizacion_detalleLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cotizacion_detalles,$cotizacion_detalle,$cotizacion_detalleParameterGeneral,$cotizacion_detalleReturnGeneral,$isEsNuevocotizacion_detalle,$clases);
			
			/*cotizacion_detalleLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cotizacion_detalles,$cotizacion_detalle,$cotizacion_detalleParameterGeneral,$cotizacion_detalleReturnGeneral,$isEsNuevocotizacion_detalle,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $cotizacion_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,cotizacion_detalle $cotizacion_detalle,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,cotizacion_detalle $cotizacion_detalle,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		cotizacion_detalle_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(cotizacion_detalle $cotizacion_detalle,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			cotizacion_detalle_logic_add::updatecotizacion_detalleToGet($this->cotizacion_detalle);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cotizacion_detalle->setcotizacion($this->cotizacion_detalleDataAccess->getcotizacion($this->connexion,$cotizacion_detalle));
		$cotizacion_detalle->setbodega($this->cotizacion_detalleDataAccess->getbodega($this->connexion,$cotizacion_detalle));
		$cotizacion_detalle->setproducto($this->cotizacion_detalleDataAccess->getproducto($this->connexion,$cotizacion_detalle));
		$cotizacion_detalle->setunidad($this->cotizacion_detalleDataAccess->getunidad($this->connexion,$cotizacion_detalle));
		$cotizacion_detalle->setotro_suplidor($this->cotizacion_detalleDataAccess->getotro_suplidor($this->connexion,$cotizacion_detalle));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cotizacion::$class.'') {
				$cotizacion_detalle->setcotizacion($this->cotizacion_detalleDataAccess->getcotizacion($this->connexion,$cotizacion_detalle));
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$cotizacion_detalle->setbodega($this->cotizacion_detalleDataAccess->getbodega($this->connexion,$cotizacion_detalle));
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$cotizacion_detalle->setproducto($this->cotizacion_detalleDataAccess->getproducto($this->connexion,$cotizacion_detalle));
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				$cotizacion_detalle->setunidad($this->cotizacion_detalleDataAccess->getunidad($this->connexion,$cotizacion_detalle));
				continue;
			}

			if($clas->clas==otro_suplidor::$class.'') {
				$cotizacion_detalle->setotro_suplidor($this->cotizacion_detalleDataAccess->getotro_suplidor($this->connexion,$cotizacion_detalle));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cotizacion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion_detalle->setcotizacion($this->cotizacion_detalleDataAccess->getcotizacion($this->connexion,$cotizacion_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion_detalle->setbodega($this->cotizacion_detalleDataAccess->getbodega($this->connexion,$cotizacion_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion_detalle->setproducto($this->cotizacion_detalleDataAccess->getproducto($this->connexion,$cotizacion_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion_detalle->setunidad($this->cotizacion_detalleDataAccess->getunidad($this->connexion,$cotizacion_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==otro_suplidor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion_detalle->setotro_suplidor($this->cotizacion_detalleDataAccess->getotro_suplidor($this->connexion,$cotizacion_detalle));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cotizacion_detalle->setcotizacion($this->cotizacion_detalleDataAccess->getcotizacion($this->connexion,$cotizacion_detalle));
		$cotizacionLogic= new cotizacion_logic($this->connexion);
		$cotizacionLogic->deepLoad($cotizacion_detalle->getcotizacion(),$isDeep,$deepLoadType,$clases);
				
		$cotizacion_detalle->setbodega($this->cotizacion_detalleDataAccess->getbodega($this->connexion,$cotizacion_detalle));
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepLoad($cotizacion_detalle->getbodega(),$isDeep,$deepLoadType,$clases);
				
		$cotizacion_detalle->setproducto($this->cotizacion_detalleDataAccess->getproducto($this->connexion,$cotizacion_detalle));
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepLoad($cotizacion_detalle->getproducto(),$isDeep,$deepLoadType,$clases);
				
		$cotizacion_detalle->setunidad($this->cotizacion_detalleDataAccess->getunidad($this->connexion,$cotizacion_detalle));
		$unidadLogic= new unidad_logic($this->connexion);
		$unidadLogic->deepLoad($cotizacion_detalle->getunidad(),$isDeep,$deepLoadType,$clases);
				
		$cotizacion_detalle->setotro_suplidor($this->cotizacion_detalleDataAccess->getotro_suplidor($this->connexion,$cotizacion_detalle));
		$otro_suplidorLogic= new otro_suplidor_logic($this->connexion);
		$otro_suplidorLogic->deepLoad($cotizacion_detalle->getotro_suplidor(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cotizacion::$class.'') {
				$cotizacion_detalle->setcotizacion($this->cotizacion_detalleDataAccess->getcotizacion($this->connexion,$cotizacion_detalle));
				$cotizacionLogic= new cotizacion_logic($this->connexion);
				$cotizacionLogic->deepLoad($cotizacion_detalle->getcotizacion(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$cotizacion_detalle->setbodega($this->cotizacion_detalleDataAccess->getbodega($this->connexion,$cotizacion_detalle));
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepLoad($cotizacion_detalle->getbodega(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$cotizacion_detalle->setproducto($this->cotizacion_detalleDataAccess->getproducto($this->connexion,$cotizacion_detalle));
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($cotizacion_detalle->getproducto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				$cotizacion_detalle->setunidad($this->cotizacion_detalleDataAccess->getunidad($this->connexion,$cotizacion_detalle));
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepLoad($cotizacion_detalle->getunidad(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==otro_suplidor::$class.'') {
				$cotizacion_detalle->setotro_suplidor($this->cotizacion_detalleDataAccess->getotro_suplidor($this->connexion,$cotizacion_detalle));
				$otro_suplidorLogic= new otro_suplidor_logic($this->connexion);
				$otro_suplidorLogic->deepLoad($cotizacion_detalle->getotro_suplidor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cotizacion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion_detalle->setcotizacion($this->cotizacion_detalleDataAccess->getcotizacion($this->connexion,$cotizacion_detalle));
			$cotizacionLogic= new cotizacion_logic($this->connexion);
			$cotizacionLogic->deepLoad($cotizacion_detalle->getcotizacion(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion_detalle->setbodega($this->cotizacion_detalleDataAccess->getbodega($this->connexion,$cotizacion_detalle));
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepLoad($cotizacion_detalle->getbodega(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion_detalle->setproducto($this->cotizacion_detalleDataAccess->getproducto($this->connexion,$cotizacion_detalle));
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($cotizacion_detalle->getproducto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion_detalle->setunidad($this->cotizacion_detalleDataAccess->getunidad($this->connexion,$cotizacion_detalle));
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepLoad($cotizacion_detalle->getunidad(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_suplidor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion_detalle->setotro_suplidor($this->cotizacion_detalleDataAccess->getotro_suplidor($this->connexion,$cotizacion_detalle));
			$otro_suplidorLogic= new otro_suplidor_logic($this->connexion);
			$otro_suplidorLogic->deepLoad($cotizacion_detalle->getotro_suplidor(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(cotizacion_detalle $cotizacion_detalle,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			cotizacion_detalle_logic_add::updatecotizacion_detalleToSave($this->cotizacion_detalle);			
			
			if(!$paraDeleteCascade) {				
				cotizacion_detalle_data::save($cotizacion_detalle, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		cotizacion_data::save($cotizacion_detalle->getcotizacion(),$this->connexion);
		bodega_data::save($cotizacion_detalle->getbodega(),$this->connexion);
		producto_data::save($cotizacion_detalle->getproducto(),$this->connexion);
		unidad_data::save($cotizacion_detalle->getunidad(),$this->connexion);
		otro_suplidor_data::save($cotizacion_detalle->getotro_suplidor(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cotizacion::$class.'') {
				cotizacion_data::save($cotizacion_detalle->getcotizacion(),$this->connexion);
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($cotizacion_detalle->getbodega(),$this->connexion);
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($cotizacion_detalle->getproducto(),$this->connexion);
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				unidad_data::save($cotizacion_detalle->getunidad(),$this->connexion);
				continue;
			}

			if($clas->clas==otro_suplidor::$class.'') {
				otro_suplidor_data::save($cotizacion_detalle->getotro_suplidor(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cotizacion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cotizacion_data::save($cotizacion_detalle->getcotizacion(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($cotizacion_detalle->getbodega(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($cotizacion_detalle->getproducto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($cotizacion_detalle->getunidad(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_suplidor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			otro_suplidor_data::save($cotizacion_detalle->getotro_suplidor(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		cotizacion_data::save($cotizacion_detalle->getcotizacion(),$this->connexion);
		$cotizacionLogic= new cotizacion_logic($this->connexion);
		$cotizacionLogic->deepSave($cotizacion_detalle->getcotizacion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		bodega_data::save($cotizacion_detalle->getbodega(),$this->connexion);
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepSave($cotizacion_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		producto_data::save($cotizacion_detalle->getproducto(),$this->connexion);
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepSave($cotizacion_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		unidad_data::save($cotizacion_detalle->getunidad(),$this->connexion);
		$unidadLogic= new unidad_logic($this->connexion);
		$unidadLogic->deepSave($cotizacion_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		otro_suplidor_data::save($cotizacion_detalle->getotro_suplidor(),$this->connexion);
		$otro_suplidorLogic= new otro_suplidor_logic($this->connexion);
		$otro_suplidorLogic->deepSave($cotizacion_detalle->getotro_suplidor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cotizacion::$class.'') {
				cotizacion_data::save($cotizacion_detalle->getcotizacion(),$this->connexion);
				$cotizacionLogic= new cotizacion_logic($this->connexion);
				$cotizacionLogic->deepSave($cotizacion_detalle->getcotizacion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($cotizacion_detalle->getbodega(),$this->connexion);
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepSave($cotizacion_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($cotizacion_detalle->getproducto(),$this->connexion);
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepSave($cotizacion_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				unidad_data::save($cotizacion_detalle->getunidad(),$this->connexion);
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepSave($cotizacion_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==otro_suplidor::$class.'') {
				otro_suplidor_data::save($cotizacion_detalle->getotro_suplidor(),$this->connexion);
				$otro_suplidorLogic= new otro_suplidor_logic($this->connexion);
				$otro_suplidorLogic->deepSave($cotizacion_detalle->getotro_suplidor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cotizacion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cotizacion_data::save($cotizacion_detalle->getcotizacion(),$this->connexion);
			$cotizacionLogic= new cotizacion_logic($this->connexion);
			$cotizacionLogic->deepSave($cotizacion_detalle->getcotizacion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($cotizacion_detalle->getbodega(),$this->connexion);
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepSave($cotizacion_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($cotizacion_detalle->getproducto(),$this->connexion);
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepSave($cotizacion_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($cotizacion_detalle->getunidad(),$this->connexion);
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepSave($cotizacion_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_suplidor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			otro_suplidor_data::save($cotizacion_detalle->getotro_suplidor(),$this->connexion);
			$otro_suplidorLogic= new otro_suplidor_logic($this->connexion);
			$otro_suplidorLogic->deepSave($cotizacion_detalle->getotro_suplidor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				cotizacion_detalle_data::save($cotizacion_detalle, $this->connexion);
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
			
			$this->deepLoad($this->cotizacion_detalle,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->cotizacion_detalles as $cotizacion_detalle) {
				$this->deepLoad($cotizacion_detalle,$isDeep,$deepLoadType,$clases);
								
				cotizacion_detalle_util::refrescarFKDescripciones($this->cotizacion_detalles);
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
			
			foreach($this->cotizacion_detalles as $cotizacion_detalle) {
				$this->deepLoad($cotizacion_detalle,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->cotizacion_detalle,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->cotizacion_detalles as $cotizacion_detalle) {
				$this->deepSave($cotizacion_detalle,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->cotizacion_detalles as $cotizacion_detalle) {
				$this->deepSave($cotizacion_detalle,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(cotizacion::$class);
				$classes[]=new Classe(bodega::$class);
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(unidad::$class);
				$classes[]=new Classe(otro_suplidor::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==cotizacion::$class) {
						$classes[]=new Classe(cotizacion::$class);
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
					if($clas->clas==otro_suplidor::$class) {
						$classes[]=new Classe(otro_suplidor::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==cotizacion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cotizacion::$class);
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
					if($clas->clas==otro_suplidor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(otro_suplidor::$class);
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
	
	
	
	
	
	
	
	public function getcotizacion_detalle() : ?cotizacion_detalle {	
		/*
		cotizacion_detalle_logic_add::checkcotizacion_detalleToGet($this->cotizacion_detalle,$this->datosCliente);
		cotizacion_detalle_logic_add::updatecotizacion_detalleToGet($this->cotizacion_detalle);
		*/
			
		return $this->cotizacion_detalle;
	}
		
	public function setcotizacion_detalle(cotizacion_detalle $newcotizacion_detalle) {
		$this->cotizacion_detalle = $newcotizacion_detalle;
	}
	
	public function getcotizacion_detalles() : array {		
		/*
		cotizacion_detalle_logic_add::checkcotizacion_detalleToGets($this->cotizacion_detalles,$this->datosCliente);
		
		foreach ($this->cotizacion_detalles as $cotizacion_detalleLocal ) {
			cotizacion_detalle_logic_add::updatecotizacion_detalleToGet($cotizacion_detalleLocal);
		}
		*/
		
		return $this->cotizacion_detalles;
	}
	
	public function setcotizacion_detalles(array $newcotizacion_detalles) {
		$this->cotizacion_detalles = $newcotizacion_detalles;
	}
	
	public function getcotizacion_detalleDataAccess() : cotizacion_detalle_data {
		return $this->cotizacion_detalleDataAccess;
	}
	
	public function setcotizacion_detalleDataAccess(cotizacion_detalle_data $newcotizacion_detalleDataAccess) {
		$this->cotizacion_detalleDataAccess = $newcotizacion_detalleDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        cotizacion_detalle_carga::$CONTROLLER;;        
		
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
