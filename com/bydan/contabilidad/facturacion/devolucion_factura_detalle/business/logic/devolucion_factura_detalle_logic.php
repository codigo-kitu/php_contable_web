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

namespace com\bydan\contabilidad\facturacion\devolucion_factura_detalle\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\util\devolucion_factura_detalle_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\util\devolucion_factura_detalle_param_return;

use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\presentation\session\devolucion_factura_detalle_session;

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

use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\util\devolucion_factura_detalle_util;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\business\entity\devolucion_factura_detalle;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\business\data\devolucion_factura_detalle_data;

//FK


use com\bydan\contabilidad\facturacion\devolucion_factura\business\entity\devolucion_factura;
use com\bydan\contabilidad\facturacion\devolucion_factura\business\data\devolucion_factura_data;
use com\bydan\contabilidad\facturacion\devolucion_factura\business\logic\devolucion_factura_logic;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;

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




class devolucion_factura_detalle_logic  extends GeneralEntityLogic implements devolucion_factura_detalle_logicI {	
	/*GENERAL*/
	public devolucion_factura_detalle_data $devolucion_factura_detalleDataAccess;
	//public ?devolucion_factura_detalle_logic_add $devolucion_factura_detalleLogicAdditional=null;
	public ?devolucion_factura_detalle $devolucion_factura_detalle;
	public array $devolucion_factura_detalles;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->devolucion_factura_detalleDataAccess = new devolucion_factura_detalle_data();			
			$this->devolucion_factura_detalles = array();
			$this->devolucion_factura_detalle = new devolucion_factura_detalle();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->devolucion_factura_detalleLogicAdditional = new devolucion_factura_detalle_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->devolucion_factura_detalleLogicAdditional==null) {
		//	$this->devolucion_factura_detalleLogicAdditional=new devolucion_factura_detalle_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->devolucion_factura_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->devolucion_factura_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->devolucion_factura_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->devolucion_factura_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->devolucion_factura_detalles = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion_factura_detalles=$this->devolucion_factura_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
			}
			
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGets($this->devolucion_factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_factura_detalles);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->devolucion_factura_detalles = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion_factura_detalles=$this->devolucion_factura_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
			}
			
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGets($this->devolucion_factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_factura_detalles);
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
		$this->devolucion_factura_detalle = new devolucion_factura_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->devolucion_factura_detalle=$this->devolucion_factura_detalleDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->devolucion_factura_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				devolucion_factura_detalle_util::refrescarFKDescripcion($this->devolucion_factura_detalle);
			}
						
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGet($this->devolucion_factura_detalle,$this->datosCliente);
			//devolucion_factura_detalle_logic_add::updatedevolucion_factura_detalleToGet($this->devolucion_factura_detalle);
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
		$this->devolucion_factura_detalle = new  devolucion_factura_detalle();
		  		  
        try {		
			$this->devolucion_factura_detalle=$this->devolucion_factura_detalleDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->devolucion_factura_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				devolucion_factura_detalle_util::refrescarFKDescripcion($this->devolucion_factura_detalle);
			}
			
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGet($this->devolucion_factura_detalle,$this->datosCliente);
			//devolucion_factura_detalle_logic_add::updatedevolucion_factura_detalleToGet($this->devolucion_factura_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?devolucion_factura_detalle {
		$devolucion_factura_detalleLogic = new  devolucion_factura_detalle_logic();
		  		  
        try {		
			$devolucion_factura_detalleLogic->setConnexion($connexion);			
			$devolucion_factura_detalleLogic->getEntity($id);			
			return $devolucion_factura_detalleLogic->getdevolucion_factura_detalle();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->devolucion_factura_detalle = new  devolucion_factura_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->devolucion_factura_detalle=$this->devolucion_factura_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->devolucion_factura_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				devolucion_factura_detalle_util::refrescarFKDescripcion($this->devolucion_factura_detalle);
			}
			
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGet($this->devolucion_factura_detalle,$this->datosCliente);
			//devolucion_factura_detalle_logic_add::updatedevolucion_factura_detalleToGet($this->devolucion_factura_detalle);
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
		$this->devolucion_factura_detalle = new  devolucion_factura_detalle();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion_factura_detalle=$this->devolucion_factura_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->devolucion_factura_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				devolucion_factura_detalle_util::refrescarFKDescripcion($this->devolucion_factura_detalle);
			}
			
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGet($this->devolucion_factura_detalle,$this->datosCliente);
			//devolucion_factura_detalle_logic_add::updatedevolucion_factura_detalleToGet($this->devolucion_factura_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?devolucion_factura_detalle {
		$devolucion_factura_detalleLogic = new  devolucion_factura_detalle_logic();
		  		  
        try {		
			$devolucion_factura_detalleLogic->setConnexion($connexion);			
			$devolucion_factura_detalleLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $devolucion_factura_detalleLogic->getdevolucion_factura_detalle();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->devolucion_factura_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->devolucion_factura_detalles=$this->devolucion_factura_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
			}
			
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGets($this->devolucion_factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_factura_detalles);			
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
		$this->devolucion_factura_detalles = array();
		  		  
        try {			
			$this->devolucion_factura_detalles=$this->devolucion_factura_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
			}
			
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGets($this->devolucion_factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_factura_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->devolucion_factura_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion_factura_detalles=$this->devolucion_factura_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
			}
			
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGets($this->devolucion_factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_factura_detalles);
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
		$this->devolucion_factura_detalles = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion_factura_detalles=$this->devolucion_factura_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
			}
			
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGets($this->devolucion_factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_factura_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$devolucion_factura_detalleLogic = new  devolucion_factura_detalle_logic();
		  		  
        try {		
			$devolucion_factura_detalleLogic->setConnexion($connexion);			
			$devolucion_factura_detalleLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $devolucion_factura_detalleLogic->getdevolucion_factura_detalles();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->devolucion_factura_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->devolucion_factura_detalles=$this->devolucion_factura_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
			}
			
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGets($this->devolucion_factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_factura_detalles);
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
		$this->devolucion_factura_detalles = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion_factura_detalles=$this->devolucion_factura_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
			}
			
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGets($this->devolucion_factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_factura_detalles);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->devolucion_factura_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion_factura_detalles=$this->devolucion_factura_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
			}
			
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGets($this->devolucion_factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_factura_detalles);
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
		$this->devolucion_factura_detalles = array();
		  		  
        try {			
			$this->devolucion_factura_detalles=$this->devolucion_factura_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
			}	
			
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGets($this->devolucion_factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_factura_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->devolucion_factura_detalles = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->devolucion_factura_detalles=$this->devolucion_factura_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
			}
			
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGets($this->devolucion_factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_factura_detalles);
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
		$this->devolucion_factura_detalles = array();
		  		  
        try {		
			$this->devolucion_factura_detalles=$this->devolucion_factura_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
			}
			
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGets($this->devolucion_factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_factura_detalles);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,devolucion_factura_detalle_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->devolucion_factura_detalles=$this->devolucion_factura_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
			}
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGets($this->devolucion_factura_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_factura_detalles);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,devolucion_factura_detalle_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->devolucion_factura_detalles=$this->devolucion_factura_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
			}
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGets($this->devolucion_factura_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_factura_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Iddevolucion_facturaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_devolucion_factura) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_devolucion_factura= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_devolucion_factura->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_devolucion_factura,devolucion_factura_detalle_util::$ID_DEVOLUCION_FACTURA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_devolucion_factura);

			$this->devolucion_factura_detalles=$this->devolucion_factura_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
			}
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGets($this->devolucion_factura_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_factura_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Iddevolucion_factura(string $strFinalQuery,Pagination $pagination,int $id_devolucion_factura) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_devolucion_factura= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_devolucion_factura->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_devolucion_factura,devolucion_factura_detalle_util::$ID_DEVOLUCION_FACTURA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_devolucion_factura);

			$this->devolucion_factura_detalles=$this->devolucion_factura_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
			}
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGets($this->devolucion_factura_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_factura_detalles);
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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,devolucion_factura_detalle_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->devolucion_factura_detalles=$this->devolucion_factura_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
			}
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGets($this->devolucion_factura_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_factura_detalles);

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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,devolucion_factura_detalle_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->devolucion_factura_detalles=$this->devolucion_factura_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
			}
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGets($this->devolucion_factura_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_factura_detalles);
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
			$parameterSelectionGeneralid_unidad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad,devolucion_factura_detalle_util::$ID_UNIDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad);

			$this->devolucion_factura_detalles=$this->devolucion_factura_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
			}
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGets($this->devolucion_factura_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_factura_detalles);

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
			$parameterSelectionGeneralid_unidad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad,devolucion_factura_detalle_util::$ID_UNIDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad);

			$this->devolucion_factura_detalles=$this->devolucion_factura_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
			}
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGets($this->devolucion_factura_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_factura_detalles);
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
						
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToSave($this->devolucion_factura_detalle,$this->datosCliente,$this->connexion);	       
			//devolucion_factura_detalle_logic_add::updatedevolucion_factura_detalleToSave($this->devolucion_factura_detalle);			
			devolucion_factura_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->devolucion_factura_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->devolucion_factura_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->devolucion_factura_detalle,$this->datosCliente,$this->connexion);
			
			
			devolucion_factura_detalle_data::save($this->devolucion_factura_detalle, $this->connexion);	    	       	 				
			//devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToSaveAfter($this->devolucion_factura_detalle,$this->datosCliente,$this->connexion);			
			//$this->devolucion_factura_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->devolucion_factura_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->devolucion_factura_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->devolucion_factura_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				devolucion_factura_detalle_util::refrescarFKDescripcion($this->devolucion_factura_detalle);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->devolucion_factura_detalle->getIsDeleted()) {
				$this->devolucion_factura_detalle=null;
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
						
			/*devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToSave($this->devolucion_factura_detalle,$this->datosCliente,$this->connexion);*/	        
			//devolucion_factura_detalle_logic_add::updatedevolucion_factura_detalleToSave($this->devolucion_factura_detalle);			
			//$this->devolucion_factura_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->devolucion_factura_detalle,$this->datosCliente,$this->connexion);			
			devolucion_factura_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->devolucion_factura_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			devolucion_factura_detalle_data::save($this->devolucion_factura_detalle, $this->connexion);	    	       	 						
			/*devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToSaveAfter($this->devolucion_factura_detalle,$this->datosCliente,$this->connexion);*/			
			//$this->devolucion_factura_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->devolucion_factura_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->devolucion_factura_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->devolucion_factura_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				devolucion_factura_detalle_util::refrescarFKDescripcion($this->devolucion_factura_detalle);				
			}
			
			if($this->devolucion_factura_detalle->getIsDeleted()) {
				$this->devolucion_factura_detalle=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(devolucion_factura_detalle $devolucion_factura_detalle,Connexion $connexion)  {
		$devolucion_factura_detalleLogic = new  devolucion_factura_detalle_logic();		  		  
        try {		
			$devolucion_factura_detalleLogic->setConnexion($connexion);			
			$devolucion_factura_detalleLogic->setdevolucion_factura_detalle($devolucion_factura_detalle);			
			$devolucion_factura_detalleLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToSaves($this->devolucion_factura_detalles,$this->datosCliente,$this->connexion);*/	        	
			//$this->devolucion_factura_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->devolucion_factura_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->devolucion_factura_detalles as $devolucion_factura_detalleLocal) {				
								
				//devolucion_factura_detalle_logic_add::updatedevolucion_factura_detalleToSave($devolucion_factura_detalleLocal);	        	
				devolucion_factura_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$devolucion_factura_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				devolucion_factura_detalle_data::save($devolucion_factura_detalleLocal, $this->connexion);				
			}
			
			/*devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToSavesAfter($this->devolucion_factura_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->devolucion_factura_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->devolucion_factura_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
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
			/*devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToSaves($this->devolucion_factura_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->devolucion_factura_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->devolucion_factura_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->devolucion_factura_detalles as $devolucion_factura_detalleLocal) {				
								
				//devolucion_factura_detalle_logic_add::updatedevolucion_factura_detalleToSave($devolucion_factura_detalleLocal);	        	
				devolucion_factura_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$devolucion_factura_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				devolucion_factura_detalle_data::save($devolucion_factura_detalleLocal, $this->connexion);				
			}			
			
			/*devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToSavesAfter($this->devolucion_factura_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->devolucion_factura_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->devolucion_factura_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $devolucion_factura_detalles,Connexion $connexion)  {
		$devolucion_factura_detalleLogic = new  devolucion_factura_detalle_logic();
		  		  
        try {		
			$devolucion_factura_detalleLogic->setConnexion($connexion);			
			$devolucion_factura_detalleLogic->setdevolucion_factura_detalles($devolucion_factura_detalles);			
			$devolucion_factura_detalleLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$devolucion_factura_detallesAux=array();
		
		foreach($this->devolucion_factura_detalles as $devolucion_factura_detalle) {
			if($devolucion_factura_detalle->getIsDeleted()==false) {
				$devolucion_factura_detallesAux[]=$devolucion_factura_detalle;
			}
		}
		
		$this->devolucion_factura_detalles=$devolucion_factura_detallesAux;
	}
	
	public function updateToGetsAuxiliar(array &$devolucion_factura_detalles) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->devolucion_factura_detalles as $devolucion_factura_detalle) {
				
				$devolucion_factura_detalle->setid_devolucion_factura_Descripcion(devolucion_factura_detalle_util::getdevolucion_facturaDescripcion($devolucion_factura_detalle->getdevolucion_factura()));
				$devolucion_factura_detalle->setid_bodega_Descripcion(devolucion_factura_detalle_util::getbodegaDescripcion($devolucion_factura_detalle->getbodega()));
				$devolucion_factura_detalle->setid_producto_Descripcion(devolucion_factura_detalle_util::getproductoDescripcion($devolucion_factura_detalle->getproducto()));
				$devolucion_factura_detalle->setid_unidad_Descripcion(devolucion_factura_detalle_util::getunidadDescripcion($devolucion_factura_detalle->getunidad()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$devolucion_factura_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$devolucion_factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$devolucion_factura_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$devolucion_factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$devolucion_factura_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$devolucion_factura_detalleForeignKey=new devolucion_factura_detalle_param_return();//devolucion_factura_detalleForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_devolucion_factura',$strRecargarFkTipos,',')) {
				$this->cargarCombosdevolucion_facturasFK($this->connexion,$strRecargarFkQuery,$devolucion_factura_detalleForeignKey,$devolucion_factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTipos,',')) {
				$this->cargarCombosbodegasFK($this->connexion,$strRecargarFkQuery,$devolucion_factura_detalleForeignKey,$devolucion_factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombosproductosFK($this->connexion,$strRecargarFkQuery,$devolucion_factura_detalleForeignKey,$devolucion_factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_unidad',$strRecargarFkTipos,',')) {
				$this->cargarCombosunidadsFK($this->connexion,$strRecargarFkQuery,$devolucion_factura_detalleForeignKey,$devolucion_factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_devolucion_factura',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosdevolucion_facturasFK($this->connexion,' where id=-1 ',$devolucion_factura_detalleForeignKey,$devolucion_factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosbodegasFK($this->connexion,' where id=-1 ',$devolucion_factura_detalleForeignKey,$devolucion_factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproductosFK($this->connexion,' where id=-1 ',$devolucion_factura_detalleForeignKey,$devolucion_factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_unidad',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosunidadsFK($this->connexion,' where id=-1 ',$devolucion_factura_detalleForeignKey,$devolucion_factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $devolucion_factura_detalleForeignKey;
			
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
	
	
	public function cargarCombosdevolucion_facturasFK($connexion=null,$strRecargarFkQuery='',$devolucion_factura_detalleForeignKey,$devolucion_factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$devolucion_facturaLogic= new devolucion_factura_logic();
		$pagination= new Pagination();
		$devolucion_factura_detalleForeignKey->devolucion_facturasFK=array();

		$devolucion_facturaLogic->setConnexion($connexion);
		$devolucion_facturaLogic->getdevolucion_facturaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_factura_detalle_session==null) {
			$devolucion_factura_detalle_session=new devolucion_factura_detalle_session();
		}
		
		if($devolucion_factura_detalle_session->bitBusquedaDesdeFKSesiondevolucion_factura!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=devolucion_factura_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaldevolucion_factura=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaldevolucion_factura=Funciones::GetFinalQueryAppend($finalQueryGlobaldevolucion_factura, '');
				$finalQueryGlobaldevolucion_factura.=devolucion_factura_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaldevolucion_factura.$strRecargarFkQuery;		

				$devolucion_facturaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($devolucion_facturaLogic->getdevolucion_facturas() as $devolucion_facturaLocal ) {
				if($devolucion_factura_detalleForeignKey->iddevolucion_facturaDefaultFK==0) {
					$devolucion_factura_detalleForeignKey->iddevolucion_facturaDefaultFK=$devolucion_facturaLocal->getId();
				}

				$devolucion_factura_detalleForeignKey->devolucion_facturasFK[$devolucion_facturaLocal->getId()]=devolucion_factura_detalle_util::getdevolucion_facturaDescripcion($devolucion_facturaLocal);
			}

		} else {

			if($devolucion_factura_detalle_session->bigiddevolucion_facturaActual!=null && $devolucion_factura_detalle_session->bigiddevolucion_facturaActual > 0) {
				$devolucion_facturaLogic->getEntity($devolucion_factura_detalle_session->bigiddevolucion_facturaActual);//WithConnection

				$devolucion_factura_detalleForeignKey->devolucion_facturasFK[$devolucion_facturaLogic->getdevolucion_factura()->getId()]=devolucion_factura_detalle_util::getdevolucion_facturaDescripcion($devolucion_facturaLogic->getdevolucion_factura());
				$devolucion_factura_detalleForeignKey->iddevolucion_facturaDefaultFK=$devolucion_facturaLogic->getdevolucion_factura()->getId();
			}
		}
	}

	public function cargarCombosbodegasFK($connexion=null,$strRecargarFkQuery='',$devolucion_factura_detalleForeignKey,$devolucion_factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$devolucion_factura_detalleForeignKey->bodegasFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_factura_detalle_session==null) {
			$devolucion_factura_detalle_session=new devolucion_factura_detalle_session();
		}
		
		if($devolucion_factura_detalle_session->bitBusquedaDesdeFKSesionbodega!=true) {
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
				if($devolucion_factura_detalleForeignKey->idbodegaDefaultFK==0) {
					$devolucion_factura_detalleForeignKey->idbodegaDefaultFK=$bodegaLocal->getId();
				}

				$devolucion_factura_detalleForeignKey->bodegasFK[$bodegaLocal->getId()]=devolucion_factura_detalle_util::getbodegaDescripcion($bodegaLocal);
			}

		} else {

			if($devolucion_factura_detalle_session->bigidbodegaActual!=null && $devolucion_factura_detalle_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($devolucion_factura_detalle_session->bigidbodegaActual);//WithConnection

				$devolucion_factura_detalleForeignKey->bodegasFK[$bodegaLogic->getbodega()->getId()]=devolucion_factura_detalle_util::getbodegaDescripcion($bodegaLogic->getbodega());
				$devolucion_factura_detalleForeignKey->idbodegaDefaultFK=$bodegaLogic->getbodega()->getId();
			}
		}
	}

	public function cargarCombosproductosFK($connexion=null,$strRecargarFkQuery='',$devolucion_factura_detalleForeignKey,$devolucion_factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$devolucion_factura_detalleForeignKey->productosFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_factura_detalle_session==null) {
			$devolucion_factura_detalle_session=new devolucion_factura_detalle_session();
		}
		
		if($devolucion_factura_detalle_session->bitBusquedaDesdeFKSesionproducto!=true) {
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
				if($devolucion_factura_detalleForeignKey->idproductoDefaultFK==0) {
					$devolucion_factura_detalleForeignKey->idproductoDefaultFK=$productoLocal->getId();
				}

				$devolucion_factura_detalleForeignKey->productosFK[$productoLocal->getId()]=devolucion_factura_detalle_util::getproductoDescripcion($productoLocal);
			}

		} else {

			if($devolucion_factura_detalle_session->bigidproductoActual!=null && $devolucion_factura_detalle_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($devolucion_factura_detalle_session->bigidproductoActual);//WithConnection

				$devolucion_factura_detalleForeignKey->productosFK[$productoLogic->getproducto()->getId()]=devolucion_factura_detalle_util::getproductoDescripcion($productoLogic->getproducto());
				$devolucion_factura_detalleForeignKey->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	public function cargarCombosunidadsFK($connexion=null,$strRecargarFkQuery='',$devolucion_factura_detalleForeignKey,$devolucion_factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$unidadLogic= new unidad_logic();
		$pagination= new Pagination();
		$devolucion_factura_detalleForeignKey->unidadsFK=array();

		$unidadLogic->setConnexion($connexion);
		$unidadLogic->getunidadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_factura_detalle_session==null) {
			$devolucion_factura_detalle_session=new devolucion_factura_detalle_session();
		}
		
		if($devolucion_factura_detalle_session->bitBusquedaDesdeFKSesionunidad!=true) {
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
				if($devolucion_factura_detalleForeignKey->idunidadDefaultFK==0) {
					$devolucion_factura_detalleForeignKey->idunidadDefaultFK=$unidadLocal->getId();
				}

				$devolucion_factura_detalleForeignKey->unidadsFK[$unidadLocal->getId()]=devolucion_factura_detalle_util::getunidadDescripcion($unidadLocal);
			}

		} else {

			if($devolucion_factura_detalle_session->bigidunidadActual!=null && $devolucion_factura_detalle_session->bigidunidadActual > 0) {
				$unidadLogic->getEntity($devolucion_factura_detalle_session->bigidunidadActual);//WithConnection

				$devolucion_factura_detalleForeignKey->unidadsFK[$unidadLogic->getunidad()->getId()]=devolucion_factura_detalle_util::getunidadDescripcion($unidadLogic->getunidad());
				$devolucion_factura_detalleForeignKey->idunidadDefaultFK=$unidadLogic->getunidad()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($devolucion_factura_detalle) {
		$this->saveRelacionesBase($devolucion_factura_detalle,true);
	}

	public function saveRelaciones($devolucion_factura_detalle) {
		$this->saveRelacionesBase($devolucion_factura_detalle,false);
	}

	public function saveRelacionesBase($devolucion_factura_detalle,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setdevolucion_factura_detalle($devolucion_factura_detalle);

			if(true) {

				//devolucion_factura_detalle_logic_add::updateRelacionesToSave($devolucion_factura_detalle,$this);

				if(($this->devolucion_factura_detalle->getIsNew() || $this->devolucion_factura_detalle->getIsChanged()) && !$this->devolucion_factura_detalle->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->devolucion_factura_detalle->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//devolucion_factura_detalle_logic_add::updateRelacionesToSaveAfter($devolucion_factura_detalle,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $devolucion_factura_detalles,devolucion_factura_detalle_param_return $devolucion_factura_detalleParameterGeneral) : devolucion_factura_detalle_param_return {
		$devolucion_factura_detalleReturnGeneral=new devolucion_factura_detalle_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $devolucion_factura_detalleReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $devolucion_factura_detalles,devolucion_factura_detalle_param_return $devolucion_factura_detalleParameterGeneral) : devolucion_factura_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$devolucion_factura_detalleReturnGeneral=new devolucion_factura_detalle_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $devolucion_factura_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $devolucion_factura_detalles,devolucion_factura_detalle $devolucion_factura_detalle,devolucion_factura_detalle_param_return $devolucion_factura_detalleParameterGeneral,bool $isEsNuevodevolucion_factura_detalle,array $clases) : devolucion_factura_detalle_param_return {
		 try {	
			$devolucion_factura_detalleReturnGeneral=new devolucion_factura_detalle_param_return();
	
			$devolucion_factura_detalleReturnGeneral->setdevolucion_factura_detalle($devolucion_factura_detalle);
			$devolucion_factura_detalleReturnGeneral->setdevolucion_factura_detalles($devolucion_factura_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$devolucion_factura_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $devolucion_factura_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $devolucion_factura_detalles,devolucion_factura_detalle $devolucion_factura_detalle,devolucion_factura_detalle_param_return $devolucion_factura_detalleParameterGeneral,bool $isEsNuevodevolucion_factura_detalle,array $clases) : devolucion_factura_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$devolucion_factura_detalleReturnGeneral=new devolucion_factura_detalle_param_return();
	
			$devolucion_factura_detalleReturnGeneral->setdevolucion_factura_detalle($devolucion_factura_detalle);
			$devolucion_factura_detalleReturnGeneral->setdevolucion_factura_detalles($devolucion_factura_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$devolucion_factura_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $devolucion_factura_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $devolucion_factura_detalles,devolucion_factura_detalle $devolucion_factura_detalle,devolucion_factura_detalle_param_return $devolucion_factura_detalleParameterGeneral,bool $isEsNuevodevolucion_factura_detalle,array $clases) : devolucion_factura_detalle_param_return {
		 try {	
			$devolucion_factura_detalleReturnGeneral=new devolucion_factura_detalle_param_return();
	
			$devolucion_factura_detalleReturnGeneral->setdevolucion_factura_detalle($devolucion_factura_detalle);
			$devolucion_factura_detalleReturnGeneral->setdevolucion_factura_detalles($devolucion_factura_detalles);
			
			
			
			return $devolucion_factura_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $devolucion_factura_detalles,devolucion_factura_detalle $devolucion_factura_detalle,devolucion_factura_detalle_param_return $devolucion_factura_detalleParameterGeneral,bool $isEsNuevodevolucion_factura_detalle,array $clases) : devolucion_factura_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$devolucion_factura_detalleReturnGeneral=new devolucion_factura_detalle_param_return();
	
			$devolucion_factura_detalleReturnGeneral->setdevolucion_factura_detalle($devolucion_factura_detalle);
			$devolucion_factura_detalleReturnGeneral->setdevolucion_factura_detalles($devolucion_factura_detalles);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $devolucion_factura_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,devolucion_factura_detalle $devolucion_factura_detalle,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,devolucion_factura_detalle $devolucion_factura_detalle,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		devolucion_factura_detalle_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(devolucion_factura_detalle $devolucion_factura_detalle,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//devolucion_factura_detalle_logic_add::updatedevolucion_factura_detalleToGet($this->devolucion_factura_detalle);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$devolucion_factura_detalle->setdevolucion_factura($this->devolucion_factura_detalleDataAccess->getdevolucion_factura($this->connexion,$devolucion_factura_detalle));
		$devolucion_factura_detalle->setbodega($this->devolucion_factura_detalleDataAccess->getbodega($this->connexion,$devolucion_factura_detalle));
		$devolucion_factura_detalle->setproducto($this->devolucion_factura_detalleDataAccess->getproducto($this->connexion,$devolucion_factura_detalle));
		$devolucion_factura_detalle->setunidad($this->devolucion_factura_detalleDataAccess->getunidad($this->connexion,$devolucion_factura_detalle));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==devolucion_factura::$class.'') {
				$devolucion_factura_detalle->setdevolucion_factura($this->devolucion_factura_detalleDataAccess->getdevolucion_factura($this->connexion,$devolucion_factura_detalle));
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$devolucion_factura_detalle->setbodega($this->devolucion_factura_detalleDataAccess->getbodega($this->connexion,$devolucion_factura_detalle));
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$devolucion_factura_detalle->setproducto($this->devolucion_factura_detalleDataAccess->getproducto($this->connexion,$devolucion_factura_detalle));
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				$devolucion_factura_detalle->setunidad($this->devolucion_factura_detalleDataAccess->getunidad($this->connexion,$devolucion_factura_detalle));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion_factura::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura_detalle->setdevolucion_factura($this->devolucion_factura_detalleDataAccess->getdevolucion_factura($this->connexion,$devolucion_factura_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura_detalle->setbodega($this->devolucion_factura_detalleDataAccess->getbodega($this->connexion,$devolucion_factura_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura_detalle->setproducto($this->devolucion_factura_detalleDataAccess->getproducto($this->connexion,$devolucion_factura_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura_detalle->setunidad($this->devolucion_factura_detalleDataAccess->getunidad($this->connexion,$devolucion_factura_detalle));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$devolucion_factura_detalle->setdevolucion_factura($this->devolucion_factura_detalleDataAccess->getdevolucion_factura($this->connexion,$devolucion_factura_detalle));
		$devolucion_facturaLogic= new devolucion_factura_logic($this->connexion);
		$devolucion_facturaLogic->deepLoad($devolucion_factura_detalle->getdevolucion_factura(),$isDeep,$deepLoadType,$clases);
				
		$devolucion_factura_detalle->setbodega($this->devolucion_factura_detalleDataAccess->getbodega($this->connexion,$devolucion_factura_detalle));
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepLoad($devolucion_factura_detalle->getbodega(),$isDeep,$deepLoadType,$clases);
				
		$devolucion_factura_detalle->setproducto($this->devolucion_factura_detalleDataAccess->getproducto($this->connexion,$devolucion_factura_detalle));
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepLoad($devolucion_factura_detalle->getproducto(),$isDeep,$deepLoadType,$clases);
				
		$devolucion_factura_detalle->setunidad($this->devolucion_factura_detalleDataAccess->getunidad($this->connexion,$devolucion_factura_detalle));
		$unidadLogic= new unidad_logic($this->connexion);
		$unidadLogic->deepLoad($devolucion_factura_detalle->getunidad(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==devolucion_factura::$class.'') {
				$devolucion_factura_detalle->setdevolucion_factura($this->devolucion_factura_detalleDataAccess->getdevolucion_factura($this->connexion,$devolucion_factura_detalle));
				$devolucion_facturaLogic= new devolucion_factura_logic($this->connexion);
				$devolucion_facturaLogic->deepLoad($devolucion_factura_detalle->getdevolucion_factura(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$devolucion_factura_detalle->setbodega($this->devolucion_factura_detalleDataAccess->getbodega($this->connexion,$devolucion_factura_detalle));
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepLoad($devolucion_factura_detalle->getbodega(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$devolucion_factura_detalle->setproducto($this->devolucion_factura_detalleDataAccess->getproducto($this->connexion,$devolucion_factura_detalle));
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($devolucion_factura_detalle->getproducto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				$devolucion_factura_detalle->setunidad($this->devolucion_factura_detalleDataAccess->getunidad($this->connexion,$devolucion_factura_detalle));
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepLoad($devolucion_factura_detalle->getunidad(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==devolucion_factura::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura_detalle->setdevolucion_factura($this->devolucion_factura_detalleDataAccess->getdevolucion_factura($this->connexion,$devolucion_factura_detalle));
			$devolucion_facturaLogic= new devolucion_factura_logic($this->connexion);
			$devolucion_facturaLogic->deepLoad($devolucion_factura_detalle->getdevolucion_factura(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura_detalle->setbodega($this->devolucion_factura_detalleDataAccess->getbodega($this->connexion,$devolucion_factura_detalle));
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepLoad($devolucion_factura_detalle->getbodega(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura_detalle->setproducto($this->devolucion_factura_detalleDataAccess->getproducto($this->connexion,$devolucion_factura_detalle));
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($devolucion_factura_detalle->getproducto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura_detalle->setunidad($this->devolucion_factura_detalleDataAccess->getunidad($this->connexion,$devolucion_factura_detalle));
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepLoad($devolucion_factura_detalle->getunidad(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(devolucion_factura_detalle $devolucion_factura_detalle,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//devolucion_factura_detalle_logic_add::updatedevolucion_factura_detalleToSave($this->devolucion_factura_detalle);			
			
			if(!$paraDeleteCascade) {				
				devolucion_factura_detalle_data::save($devolucion_factura_detalle, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		devolucion_factura_data::save($devolucion_factura_detalle->getdevolucion_factura(),$this->connexion);
		bodega_data::save($devolucion_factura_detalle->getbodega(),$this->connexion);
		producto_data::save($devolucion_factura_detalle->getproducto(),$this->connexion);
		unidad_data::save($devolucion_factura_detalle->getunidad(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==devolucion_factura::$class.'') {
				devolucion_factura_data::save($devolucion_factura_detalle->getdevolucion_factura(),$this->connexion);
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($devolucion_factura_detalle->getbodega(),$this->connexion);
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($devolucion_factura_detalle->getproducto(),$this->connexion);
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				unidad_data::save($devolucion_factura_detalle->getunidad(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==devolucion_factura::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			devolucion_factura_data::save($devolucion_factura_detalle->getdevolucion_factura(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($devolucion_factura_detalle->getbodega(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($devolucion_factura_detalle->getproducto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($devolucion_factura_detalle->getunidad(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		devolucion_factura_data::save($devolucion_factura_detalle->getdevolucion_factura(),$this->connexion);
		$devolucion_facturaLogic= new devolucion_factura_logic($this->connexion);
		$devolucion_facturaLogic->deepSave($devolucion_factura_detalle->getdevolucion_factura(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		bodega_data::save($devolucion_factura_detalle->getbodega(),$this->connexion);
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepSave($devolucion_factura_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		producto_data::save($devolucion_factura_detalle->getproducto(),$this->connexion);
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepSave($devolucion_factura_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		unidad_data::save($devolucion_factura_detalle->getunidad(),$this->connexion);
		$unidadLogic= new unidad_logic($this->connexion);
		$unidadLogic->deepSave($devolucion_factura_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==devolucion_factura::$class.'') {
				devolucion_factura_data::save($devolucion_factura_detalle->getdevolucion_factura(),$this->connexion);
				$devolucion_facturaLogic= new devolucion_factura_logic($this->connexion);
				$devolucion_facturaLogic->deepSave($devolucion_factura_detalle->getdevolucion_factura(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($devolucion_factura_detalle->getbodega(),$this->connexion);
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepSave($devolucion_factura_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($devolucion_factura_detalle->getproducto(),$this->connexion);
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepSave($devolucion_factura_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				unidad_data::save($devolucion_factura_detalle->getunidad(),$this->connexion);
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepSave($devolucion_factura_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==devolucion_factura::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			devolucion_factura_data::save($devolucion_factura_detalle->getdevolucion_factura(),$this->connexion);
			$devolucion_facturaLogic= new devolucion_factura_logic($this->connexion);
			$devolucion_facturaLogic->deepSave($devolucion_factura_detalle->getdevolucion_factura(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($devolucion_factura_detalle->getbodega(),$this->connexion);
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepSave($devolucion_factura_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($devolucion_factura_detalle->getproducto(),$this->connexion);
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepSave($devolucion_factura_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($devolucion_factura_detalle->getunidad(),$this->connexion);
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepSave($devolucion_factura_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				devolucion_factura_detalle_data::save($devolucion_factura_detalle, $this->connexion);
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
			
			$this->deepLoad($this->devolucion_factura_detalle,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->devolucion_factura_detalles as $devolucion_factura_detalle) {
				$this->deepLoad($devolucion_factura_detalle,$isDeep,$deepLoadType,$clases);
								
				devolucion_factura_detalle_util::refrescarFKDescripciones($this->devolucion_factura_detalles);
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
			
			foreach($this->devolucion_factura_detalles as $devolucion_factura_detalle) {
				$this->deepLoad($devolucion_factura_detalle,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->devolucion_factura_detalle,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->devolucion_factura_detalles as $devolucion_factura_detalle) {
				$this->deepSave($devolucion_factura_detalle,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->devolucion_factura_detalles as $devolucion_factura_detalle) {
				$this->deepSave($devolucion_factura_detalle,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(devolucion_factura::$class);
				$classes[]=new Classe(bodega::$class);
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(unidad::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==devolucion_factura::$class) {
						$classes[]=new Classe(devolucion_factura::$class);
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
					if($clas->clas==devolucion_factura::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(devolucion_factura::$class);
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
	
	
	
	
	
	
	
	public function getdevolucion_factura_detalle() : ?devolucion_factura_detalle {	
		/*
		devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGet($this->devolucion_factura_detalle,$this->datosCliente);
		devolucion_factura_detalle_logic_add::updatedevolucion_factura_detalleToGet($this->devolucion_factura_detalle);
		*/
			
		return $this->devolucion_factura_detalle;
	}
		
	public function setdevolucion_factura_detalle(devolucion_factura_detalle $newdevolucion_factura_detalle) {
		$this->devolucion_factura_detalle = $newdevolucion_factura_detalle;
	}
	
	public function getdevolucion_factura_detalles() : array {		
		/*
		devolucion_factura_detalle_logic_add::checkdevolucion_factura_detalleToGets($this->devolucion_factura_detalles,$this->datosCliente);
		
		foreach ($this->devolucion_factura_detalles as $devolucion_factura_detalleLocal ) {
			devolucion_factura_detalle_logic_add::updatedevolucion_factura_detalleToGet($devolucion_factura_detalleLocal);
		}
		*/
		
		return $this->devolucion_factura_detalles;
	}
	
	public function setdevolucion_factura_detalles(array $newdevolucion_factura_detalles) {
		$this->devolucion_factura_detalles = $newdevolucion_factura_detalles;
	}
	
	public function getdevolucion_factura_detalleDataAccess() : devolucion_factura_detalle_data {
		return $this->devolucion_factura_detalleDataAccess;
	}
	
	public function setdevolucion_factura_detalleDataAccess(devolucion_factura_detalle_data $newdevolucion_factura_detalleDataAccess) {
		$this->devolucion_factura_detalleDataAccess = $newdevolucion_factura_detalleDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        devolucion_factura_detalle_carga::$CONTROLLER;;        
		
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
