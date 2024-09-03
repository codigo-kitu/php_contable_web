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

namespace com\bydan\contabilidad\facturacion\factura_detalle\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\facturacion\factura_detalle\util\factura_detalle_carga;
use com\bydan\contabilidad\facturacion\factura_detalle\util\factura_detalle_param_return;

use com\bydan\contabilidad\facturacion\factura_detalle\presentation\session\factura_detalle_session;

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

use com\bydan\contabilidad\facturacion\factura_detalle\util\factura_detalle_util;
use com\bydan\contabilidad\facturacion\factura_detalle\business\entity\factura_detalle;
use com\bydan\contabilidad\facturacion\factura_detalle\business\data\factura_detalle_data;

//FK


use com\bydan\contabilidad\facturacion\factura\business\entity\factura;
use com\bydan\contabilidad\facturacion\factura\business\data\factura_data;
use com\bydan\contabilidad\facturacion\factura\business\logic\factura_logic;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;

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




class factura_detalle_logic  extends GeneralEntityLogic implements factura_detalle_logicI {	
	/*GENERAL*/
	public factura_detalle_data $factura_detalleDataAccess;
	//public ?factura_detalle_logic_add $factura_detalleLogicAdditional=null;
	public ?factura_detalle $factura_detalle;
	public array $factura_detalles;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->factura_detalleDataAccess = new factura_detalle_data();			
			$this->factura_detalles = array();
			$this->factura_detalle = new factura_detalle();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->factura_detalleLogicAdditional = new factura_detalle_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->factura_detalleLogicAdditional==null) {
		//	$this->factura_detalleLogicAdditional=new factura_detalle_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->factura_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->factura_detalleDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->factura_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->factura_detalleDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->factura_detalles = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura_detalles=$this->factura_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
			}
			
			//factura_detalle_logic_add::checkfactura_detalleToGets($this->factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_detalles);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->factura_detalles = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura_detalles=$this->factura_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
			}
			
			//factura_detalle_logic_add::checkfactura_detalleToGets($this->factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_detalles);
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
		$this->factura_detalle = new factura_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->factura_detalle=$this->factura_detalleDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->factura_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				factura_detalle_util::refrescarFKDescripcion($this->factura_detalle);
			}
						
			//factura_detalle_logic_add::checkfactura_detalleToGet($this->factura_detalle,$this->datosCliente);
			//factura_detalle_logic_add::updatefactura_detalleToGet($this->factura_detalle);
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
		$this->factura_detalle = new  factura_detalle();
		  		  
        try {		
			$this->factura_detalle=$this->factura_detalleDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->factura_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				factura_detalle_util::refrescarFKDescripcion($this->factura_detalle);
			}
			
			//factura_detalle_logic_add::checkfactura_detalleToGet($this->factura_detalle,$this->datosCliente);
			//factura_detalle_logic_add::updatefactura_detalleToGet($this->factura_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?factura_detalle {
		$factura_detalleLogic = new  factura_detalle_logic();
		  		  
        try {		
			$factura_detalleLogic->setConnexion($connexion);			
			$factura_detalleLogic->getEntity($id);			
			return $factura_detalleLogic->getfactura_detalle();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->factura_detalle = new  factura_detalle();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->factura_detalle=$this->factura_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->factura_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				factura_detalle_util::refrescarFKDescripcion($this->factura_detalle);
			}
			
			//factura_detalle_logic_add::checkfactura_detalleToGet($this->factura_detalle,$this->datosCliente);
			//factura_detalle_logic_add::updatefactura_detalleToGet($this->factura_detalle);
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
		$this->factura_detalle = new  factura_detalle();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura_detalle=$this->factura_detalleDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->factura_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				factura_detalle_util::refrescarFKDescripcion($this->factura_detalle);
			}
			
			//factura_detalle_logic_add::checkfactura_detalleToGet($this->factura_detalle,$this->datosCliente);
			//factura_detalle_logic_add::updatefactura_detalleToGet($this->factura_detalle);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?factura_detalle {
		$factura_detalleLogic = new  factura_detalle_logic();
		  		  
        try {		
			$factura_detalleLogic->setConnexion($connexion);			
			$factura_detalleLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $factura_detalleLogic->getfactura_detalle();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->factura_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->factura_detalles=$this->factura_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
			}
			
			//factura_detalle_logic_add::checkfactura_detalleToGets($this->factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_detalles);			
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
		$this->factura_detalles = array();
		  		  
        try {			
			$this->factura_detalles=$this->factura_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
			}
			
			//factura_detalle_logic_add::checkfactura_detalleToGets($this->factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->factura_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura_detalles=$this->factura_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
			}
			
			//factura_detalle_logic_add::checkfactura_detalleToGets($this->factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_detalles);
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
		$this->factura_detalles = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura_detalles=$this->factura_detalleDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
			}
			
			//factura_detalle_logic_add::checkfactura_detalleToGets($this->factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$factura_detalleLogic = new  factura_detalle_logic();
		  		  
        try {		
			$factura_detalleLogic->setConnexion($connexion);			
			$factura_detalleLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $factura_detalleLogic->getfactura_detalles();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->factura_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->factura_detalles=$this->factura_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
			}
			
			//factura_detalle_logic_add::checkfactura_detalleToGets($this->factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_detalles);
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
		$this->factura_detalles = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura_detalles=$this->factura_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
			}
			
			//factura_detalle_logic_add::checkfactura_detalleToGets($this->factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_detalles);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->factura_detalles = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura_detalles=$this->factura_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
			}
			
			//factura_detalle_logic_add::checkfactura_detalleToGets($this->factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_detalles);
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
		$this->factura_detalles = array();
		  		  
        try {			
			$this->factura_detalles=$this->factura_detalleDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
			}	
			
			//factura_detalle_logic_add::checkfactura_detalleToGets($this->factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_detalles);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->factura_detalles = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->factura_detalles=$this->factura_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
			}
			
			//factura_detalle_logic_add::checkfactura_detalleToGets($this->factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_detalles);
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
		$this->factura_detalles = array();
		  		  
        try {		
			$this->factura_detalles=$this->factura_detalleDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
			}
			
			//factura_detalle_logic_add::checkfactura_detalleToGets($this->factura_detalles,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->factura_detalles);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,factura_detalle_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->factura_detalles=$this->factura_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
			}
			//factura_detalle_logic_add::checkfactura_detalleToGets($this->factura_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_detalles);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,factura_detalle_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->factura_detalles=$this->factura_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
			}
			//factura_detalle_logic_add::checkfactura_detalleToGets($this->factura_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_detalles);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdfacturaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_factura) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_factura= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_factura->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_factura,factura_detalle_util::$ID_FACTURA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_factura);

			$this->factura_detalles=$this->factura_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
			}
			//factura_detalle_logic_add::checkfactura_detalleToGets($this->factura_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_detalles);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idfactura(string $strFinalQuery,Pagination $pagination,int $id_factura) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_factura= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_factura->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_factura,factura_detalle_util::$ID_FACTURA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_factura);

			$this->factura_detalles=$this->factura_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
			}
			//factura_detalle_logic_add::checkfactura_detalleToGets($this->factura_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_detalles);
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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,factura_detalle_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->factura_detalles=$this->factura_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
			}
			//factura_detalle_logic_add::checkfactura_detalleToGets($this->factura_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_detalles);

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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,factura_detalle_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->factura_detalles=$this->factura_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
			}
			//factura_detalle_logic_add::checkfactura_detalleToGets($this->factura_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_detalles);
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
			$parameterSelectionGeneralid_unidad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad,factura_detalle_util::$ID_UNIDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad);

			$this->factura_detalles=$this->factura_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
			}
			//factura_detalle_logic_add::checkfactura_detalleToGets($this->factura_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_detalles);

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
			$parameterSelectionGeneralid_unidad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad,factura_detalle_util::$ID_UNIDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad);

			$this->factura_detalles=$this->factura_detalleDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
			}
			//factura_detalle_logic_add::checkfactura_detalleToGets($this->factura_detalles,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->factura_detalles);
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
						
			//factura_detalle_logic_add::checkfactura_detalleToSave($this->factura_detalle,$this->datosCliente,$this->connexion);	       
			//factura_detalle_logic_add::updatefactura_detalleToSave($this->factura_detalle);			
			factura_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->factura_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->factura_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->factura_detalle,$this->datosCliente,$this->connexion);
			
			
			factura_detalle_data::save($this->factura_detalle, $this->connexion);	    	       	 				
			//factura_detalle_logic_add::checkfactura_detalleToSaveAfter($this->factura_detalle,$this->datosCliente,$this->connexion);			
			//$this->factura_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->factura_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->factura_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->factura_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				factura_detalle_util::refrescarFKDescripcion($this->factura_detalle);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->factura_detalle->getIsDeleted()) {
				$this->factura_detalle=null;
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
						
			/*factura_detalle_logic_add::checkfactura_detalleToSave($this->factura_detalle,$this->datosCliente,$this->connexion);*/	        
			//factura_detalle_logic_add::updatefactura_detalleToSave($this->factura_detalle);			
			//$this->factura_detalleLogicAdditional->checkGeneralEntityToSave($this,$this->factura_detalle,$this->datosCliente,$this->connexion);			
			factura_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->factura_detalle,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			factura_detalle_data::save($this->factura_detalle, $this->connexion);	    	       	 						
			/*factura_detalle_logic_add::checkfactura_detalleToSaveAfter($this->factura_detalle,$this->datosCliente,$this->connexion);*/			
			//$this->factura_detalleLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->factura_detalle,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->factura_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->factura_detalle,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				factura_detalle_util::refrescarFKDescripcion($this->factura_detalle);				
			}
			
			if($this->factura_detalle->getIsDeleted()) {
				$this->factura_detalle=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(factura_detalle $factura_detalle,Connexion $connexion)  {
		$factura_detalleLogic = new  factura_detalle_logic();		  		  
        try {		
			$factura_detalleLogic->setConnexion($connexion);			
			$factura_detalleLogic->setfactura_detalle($factura_detalle);			
			$factura_detalleLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*factura_detalle_logic_add::checkfactura_detalleToSaves($this->factura_detalles,$this->datosCliente,$this->connexion);*/	        	
			//$this->factura_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->factura_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->factura_detalles as $factura_detalleLocal) {				
								
				//factura_detalle_logic_add::updatefactura_detalleToSave($factura_detalleLocal);	        	
				factura_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$factura_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				factura_detalle_data::save($factura_detalleLocal, $this->connexion);				
			}
			
			/*factura_detalle_logic_add::checkfactura_detalleToSavesAfter($this->factura_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->factura_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->factura_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
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
			/*factura_detalle_logic_add::checkfactura_detalleToSaves($this->factura_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->factura_detalleLogicAdditional->checkGeneralEntitiesToSaves($this,$this->factura_detalles,$this->datosCliente,$this->connexion);
			
	   		foreach($this->factura_detalles as $factura_detalleLocal) {				
								
				//factura_detalle_logic_add::updatefactura_detalleToSave($factura_detalleLocal);	        	
				factura_detalle_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$factura_detalleLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				factura_detalle_data::save($factura_detalleLocal, $this->connexion);				
			}			
			
			/*factura_detalle_logic_add::checkfactura_detalleToSavesAfter($this->factura_detalles,$this->datosCliente,$this->connexion);*/			
			//$this->factura_detalleLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->factura_detalles,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $factura_detalles,Connexion $connexion)  {
		$factura_detalleLogic = new  factura_detalle_logic();
		  		  
        try {		
			$factura_detalleLogic->setConnexion($connexion);			
			$factura_detalleLogic->setfactura_detalles($factura_detalles);			
			$factura_detalleLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$factura_detallesAux=array();
		
		foreach($this->factura_detalles as $factura_detalle) {
			if($factura_detalle->getIsDeleted()==false) {
				$factura_detallesAux[]=$factura_detalle;
			}
		}
		
		$this->factura_detalles=$factura_detallesAux;
	}
	
	public function updateToGetsAuxiliar(array &$factura_detalles) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->factura_detalles as $factura_detalle) {
				
				$factura_detalle->setid_factura_Descripcion(factura_detalle_util::getfacturaDescripcion($factura_detalle->getfactura()));
				$factura_detalle->setid_bodega_Descripcion(factura_detalle_util::getbodegaDescripcion($factura_detalle->getbodega()));
				$factura_detalle->setid_producto_Descripcion(factura_detalle_util::getproductoDescripcion($factura_detalle->getproducto()));
				$factura_detalle->setid_unidad_Descripcion(factura_detalle_util::getunidadDescripcion($factura_detalle->getunidad()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$factura_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$factura_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$factura_detalle_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$factura_detalleForeignKey=new factura_detalle_param_return();//factura_detalleForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_factura',$strRecargarFkTipos,',')) {
				$this->cargarCombosfacturasFK($this->connexion,$strRecargarFkQuery,$factura_detalleForeignKey,$factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTipos,',')) {
				$this->cargarCombosbodegasFK($this->connexion,$strRecargarFkQuery,$factura_detalleForeignKey,$factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombosproductosFK($this->connexion,$strRecargarFkQuery,$factura_detalleForeignKey,$factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_unidad',$strRecargarFkTipos,',')) {
				$this->cargarCombosunidadsFK($this->connexion,$strRecargarFkQuery,$factura_detalleForeignKey,$factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_factura',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosfacturasFK($this->connexion,' where id=-1 ',$factura_detalleForeignKey,$factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosbodegasFK($this->connexion,' where id=-1 ',$factura_detalleForeignKey,$factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproductosFK($this->connexion,' where id=-1 ',$factura_detalleForeignKey,$factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_unidad',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosunidadsFK($this->connexion,' where id=-1 ',$factura_detalleForeignKey,$factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $factura_detalleForeignKey;
			
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
	
	
	public function cargarCombosfacturasFK($connexion=null,$strRecargarFkQuery='',$factura_detalleForeignKey,$factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$facturaLogic= new factura_logic();
		$pagination= new Pagination();
		$factura_detalleForeignKey->facturasFK=array();

		$facturaLogic->setConnexion($connexion);
		$facturaLogic->getfacturaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_detalle_session==null) {
			$factura_detalle_session=new factura_detalle_session();
		}
		
		if($factura_detalle_session->bitBusquedaDesdeFKSesionfactura!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=factura_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalfactura=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalfactura=Funciones::GetFinalQueryAppend($finalQueryGlobalfactura, '');
				$finalQueryGlobalfactura.=factura_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalfactura.$strRecargarFkQuery;		

				$facturaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($facturaLogic->getfacturas() as $facturaLocal ) {
				if($factura_detalleForeignKey->idfacturaDefaultFK==0) {
					$factura_detalleForeignKey->idfacturaDefaultFK=$facturaLocal->getId();
				}

				$factura_detalleForeignKey->facturasFK[$facturaLocal->getId()]=factura_detalle_util::getfacturaDescripcion($facturaLocal);
			}

		} else {

			if($factura_detalle_session->bigidfacturaActual!=null && $factura_detalle_session->bigidfacturaActual > 0) {
				$facturaLogic->getEntity($factura_detalle_session->bigidfacturaActual);//WithConnection

				$factura_detalleForeignKey->facturasFK[$facturaLogic->getfactura()->getId()]=factura_detalle_util::getfacturaDescripcion($facturaLogic->getfactura());
				$factura_detalleForeignKey->idfacturaDefaultFK=$facturaLogic->getfactura()->getId();
			}
		}
	}

	public function cargarCombosbodegasFK($connexion=null,$strRecargarFkQuery='',$factura_detalleForeignKey,$factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$factura_detalleForeignKey->bodegasFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_detalle_session==null) {
			$factura_detalle_session=new factura_detalle_session();
		}
		
		if($factura_detalle_session->bitBusquedaDesdeFKSesionbodega!=true) {
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
				if($factura_detalleForeignKey->idbodegaDefaultFK==0) {
					$factura_detalleForeignKey->idbodegaDefaultFK=$bodegaLocal->getId();
				}

				$factura_detalleForeignKey->bodegasFK[$bodegaLocal->getId()]=factura_detalle_util::getbodegaDescripcion($bodegaLocal);
			}

		} else {

			if($factura_detalle_session->bigidbodegaActual!=null && $factura_detalle_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($factura_detalle_session->bigidbodegaActual);//WithConnection

				$factura_detalleForeignKey->bodegasFK[$bodegaLogic->getbodega()->getId()]=factura_detalle_util::getbodegaDescripcion($bodegaLogic->getbodega());
				$factura_detalleForeignKey->idbodegaDefaultFK=$bodegaLogic->getbodega()->getId();
			}
		}
	}

	public function cargarCombosproductosFK($connexion=null,$strRecargarFkQuery='',$factura_detalleForeignKey,$factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$factura_detalleForeignKey->productosFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_detalle_session==null) {
			$factura_detalle_session=new factura_detalle_session();
		}
		
		if($factura_detalle_session->bitBusquedaDesdeFKSesionproducto!=true) {
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
				if($factura_detalleForeignKey->idproductoDefaultFK==0) {
					$factura_detalleForeignKey->idproductoDefaultFK=$productoLocal->getId();
				}

				$factura_detalleForeignKey->productosFK[$productoLocal->getId()]=factura_detalle_util::getproductoDescripcion($productoLocal);
			}

		} else {

			if($factura_detalle_session->bigidproductoActual!=null && $factura_detalle_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($factura_detalle_session->bigidproductoActual);//WithConnection

				$factura_detalleForeignKey->productosFK[$productoLogic->getproducto()->getId()]=factura_detalle_util::getproductoDescripcion($productoLogic->getproducto());
				$factura_detalleForeignKey->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	public function cargarCombosunidadsFK($connexion=null,$strRecargarFkQuery='',$factura_detalleForeignKey,$factura_detalle_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$unidadLogic= new unidad_logic();
		$pagination= new Pagination();
		$factura_detalleForeignKey->unidadsFK=array();

		$unidadLogic->setConnexion($connexion);
		$unidadLogic->getunidadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_detalle_session==null) {
			$factura_detalle_session=new factura_detalle_session();
		}
		
		if($factura_detalle_session->bitBusquedaDesdeFKSesionunidad!=true) {
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
				if($factura_detalleForeignKey->idunidadDefaultFK==0) {
					$factura_detalleForeignKey->idunidadDefaultFK=$unidadLocal->getId();
				}

				$factura_detalleForeignKey->unidadsFK[$unidadLocal->getId()]=factura_detalle_util::getunidadDescripcion($unidadLocal);
			}

		} else {

			if($factura_detalle_session->bigidunidadActual!=null && $factura_detalle_session->bigidunidadActual > 0) {
				$unidadLogic->getEntity($factura_detalle_session->bigidunidadActual);//WithConnection

				$factura_detalleForeignKey->unidadsFK[$unidadLogic->getunidad()->getId()]=factura_detalle_util::getunidadDescripcion($unidadLogic->getunidad());
				$factura_detalleForeignKey->idunidadDefaultFK=$unidadLogic->getunidad()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($factura_detalle) {
		$this->saveRelacionesBase($factura_detalle,true);
	}

	public function saveRelaciones($factura_detalle) {
		$this->saveRelacionesBase($factura_detalle,false);
	}

	public function saveRelacionesBase($factura_detalle,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setfactura_detalle($factura_detalle);

			if(true) {

				//factura_detalle_logic_add::updateRelacionesToSave($factura_detalle,$this);

				if(($this->factura_detalle->getIsNew() || $this->factura_detalle->getIsChanged()) && !$this->factura_detalle->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->factura_detalle->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//factura_detalle_logic_add::updateRelacionesToSaveAfter($factura_detalle,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $factura_detalles,factura_detalle_param_return $factura_detalleParameterGeneral) : factura_detalle_param_return {
		$factura_detalleReturnGeneral=new factura_detalle_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $factura_detalleReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $factura_detalles,factura_detalle_param_return $factura_detalleParameterGeneral) : factura_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$factura_detalleReturnGeneral=new factura_detalle_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $factura_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $factura_detalles,factura_detalle $factura_detalle,factura_detalle_param_return $factura_detalleParameterGeneral,bool $isEsNuevofactura_detalle,array $clases) : factura_detalle_param_return {
		 try {	
			$factura_detalleReturnGeneral=new factura_detalle_param_return();
	
			$factura_detalleReturnGeneral->setfactura_detalle($factura_detalle);
			$factura_detalleReturnGeneral->setfactura_detalles($factura_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$factura_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $factura_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $factura_detalles,factura_detalle $factura_detalle,factura_detalle_param_return $factura_detalleParameterGeneral,bool $isEsNuevofactura_detalle,array $clases) : factura_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$factura_detalleReturnGeneral=new factura_detalle_param_return();
	
			$factura_detalleReturnGeneral->setfactura_detalle($factura_detalle);
			$factura_detalleReturnGeneral->setfactura_detalles($factura_detalles);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$factura_detalleReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $factura_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $factura_detalles,factura_detalle $factura_detalle,factura_detalle_param_return $factura_detalleParameterGeneral,bool $isEsNuevofactura_detalle,array $clases) : factura_detalle_param_return {
		 try {	
			$factura_detalleReturnGeneral=new factura_detalle_param_return();
	
			$factura_detalleReturnGeneral->setfactura_detalle($factura_detalle);
			$factura_detalleReturnGeneral->setfactura_detalles($factura_detalles);
			
			
			
			return $factura_detalleReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $factura_detalles,factura_detalle $factura_detalle,factura_detalle_param_return $factura_detalleParameterGeneral,bool $isEsNuevofactura_detalle,array $clases) : factura_detalle_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$factura_detalleReturnGeneral=new factura_detalle_param_return();
	
			$factura_detalleReturnGeneral->setfactura_detalle($factura_detalle);
			$factura_detalleReturnGeneral->setfactura_detalles($factura_detalles);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $factura_detalleReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,factura_detalle $factura_detalle,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,factura_detalle $factura_detalle,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		factura_detalle_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(factura_detalle $factura_detalle,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//factura_detalle_logic_add::updatefactura_detalleToGet($this->factura_detalle);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$factura_detalle->setfactura($this->factura_detalleDataAccess->getfactura($this->connexion,$factura_detalle));
		$factura_detalle->setbodega($this->factura_detalleDataAccess->getbodega($this->connexion,$factura_detalle));
		$factura_detalle->setproducto($this->factura_detalleDataAccess->getproducto($this->connexion,$factura_detalle));
		$factura_detalle->setunidad($this->factura_detalleDataAccess->getunidad($this->connexion,$factura_detalle));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==factura::$class.'') {
				$factura_detalle->setfactura($this->factura_detalleDataAccess->getfactura($this->connexion,$factura_detalle));
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$factura_detalle->setbodega($this->factura_detalleDataAccess->getbodega($this->connexion,$factura_detalle));
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$factura_detalle->setproducto($this->factura_detalleDataAccess->getproducto($this->connexion,$factura_detalle));
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				$factura_detalle->setunidad($this->factura_detalleDataAccess->getunidad($this->connexion,$factura_detalle));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_detalle->setfactura($this->factura_detalleDataAccess->getfactura($this->connexion,$factura_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_detalle->setbodega($this->factura_detalleDataAccess->getbodega($this->connexion,$factura_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_detalle->setproducto($this->factura_detalleDataAccess->getproducto($this->connexion,$factura_detalle));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_detalle->setunidad($this->factura_detalleDataAccess->getunidad($this->connexion,$factura_detalle));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$factura_detalle->setfactura($this->factura_detalleDataAccess->getfactura($this->connexion,$factura_detalle));
		$facturaLogic= new factura_logic($this->connexion);
		$facturaLogic->deepLoad($factura_detalle->getfactura(),$isDeep,$deepLoadType,$clases);
				
		$factura_detalle->setbodega($this->factura_detalleDataAccess->getbodega($this->connexion,$factura_detalle));
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepLoad($factura_detalle->getbodega(),$isDeep,$deepLoadType,$clases);
				
		$factura_detalle->setproducto($this->factura_detalleDataAccess->getproducto($this->connexion,$factura_detalle));
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepLoad($factura_detalle->getproducto(),$isDeep,$deepLoadType,$clases);
				
		$factura_detalle->setunidad($this->factura_detalleDataAccess->getunidad($this->connexion,$factura_detalle));
		$unidadLogic= new unidad_logic($this->connexion);
		$unidadLogic->deepLoad($factura_detalle->getunidad(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==factura::$class.'') {
				$factura_detalle->setfactura($this->factura_detalleDataAccess->getfactura($this->connexion,$factura_detalle));
				$facturaLogic= new factura_logic($this->connexion);
				$facturaLogic->deepLoad($factura_detalle->getfactura(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$factura_detalle->setbodega($this->factura_detalleDataAccess->getbodega($this->connexion,$factura_detalle));
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepLoad($factura_detalle->getbodega(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$factura_detalle->setproducto($this->factura_detalleDataAccess->getproducto($this->connexion,$factura_detalle));
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($factura_detalle->getproducto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				$factura_detalle->setunidad($this->factura_detalleDataAccess->getunidad($this->connexion,$factura_detalle));
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepLoad($factura_detalle->getunidad(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==factura::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_detalle->setfactura($this->factura_detalleDataAccess->getfactura($this->connexion,$factura_detalle));
			$facturaLogic= new factura_logic($this->connexion);
			$facturaLogic->deepLoad($factura_detalle->getfactura(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_detalle->setbodega($this->factura_detalleDataAccess->getbodega($this->connexion,$factura_detalle));
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepLoad($factura_detalle->getbodega(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_detalle->setproducto($this->factura_detalleDataAccess->getproducto($this->connexion,$factura_detalle));
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($factura_detalle->getproducto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura_detalle->setunidad($this->factura_detalleDataAccess->getunidad($this->connexion,$factura_detalle));
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepLoad($factura_detalle->getunidad(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(factura_detalle $factura_detalle,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//factura_detalle_logic_add::updatefactura_detalleToSave($this->factura_detalle);			
			
			if(!$paraDeleteCascade) {				
				factura_detalle_data::save($factura_detalle, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		factura_data::save($factura_detalle->getfactura(),$this->connexion);
		bodega_data::save($factura_detalle->getbodega(),$this->connexion);
		producto_data::save($factura_detalle->getproducto(),$this->connexion);
		unidad_data::save($factura_detalle->getunidad(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==factura::$class.'') {
				factura_data::save($factura_detalle->getfactura(),$this->connexion);
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($factura_detalle->getbodega(),$this->connexion);
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($factura_detalle->getproducto(),$this->connexion);
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				unidad_data::save($factura_detalle->getunidad(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==factura::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			factura_data::save($factura_detalle->getfactura(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($factura_detalle->getbodega(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($factura_detalle->getproducto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($factura_detalle->getunidad(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		factura_data::save($factura_detalle->getfactura(),$this->connexion);
		$facturaLogic= new factura_logic($this->connexion);
		$facturaLogic->deepSave($factura_detalle->getfactura(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		bodega_data::save($factura_detalle->getbodega(),$this->connexion);
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepSave($factura_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		producto_data::save($factura_detalle->getproducto(),$this->connexion);
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepSave($factura_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		unidad_data::save($factura_detalle->getunidad(),$this->connexion);
		$unidadLogic= new unidad_logic($this->connexion);
		$unidadLogic->deepSave($factura_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==factura::$class.'') {
				factura_data::save($factura_detalle->getfactura(),$this->connexion);
				$facturaLogic= new factura_logic($this->connexion);
				$facturaLogic->deepSave($factura_detalle->getfactura(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($factura_detalle->getbodega(),$this->connexion);
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepSave($factura_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($factura_detalle->getproducto(),$this->connexion);
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepSave($factura_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==unidad::$class.'') {
				unidad_data::save($factura_detalle->getunidad(),$this->connexion);
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepSave($factura_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==factura::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			factura_data::save($factura_detalle->getfactura(),$this->connexion);
			$facturaLogic= new factura_logic($this->connexion);
			$facturaLogic->deepSave($factura_detalle->getfactura(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($factura_detalle->getbodega(),$this->connexion);
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepSave($factura_detalle->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($factura_detalle->getproducto(),$this->connexion);
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepSave($factura_detalle->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($factura_detalle->getunidad(),$this->connexion);
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepSave($factura_detalle->getunidad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				factura_detalle_data::save($factura_detalle, $this->connexion);
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
			
			$this->deepLoad($this->factura_detalle,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->factura_detalles as $factura_detalle) {
				$this->deepLoad($factura_detalle,$isDeep,$deepLoadType,$clases);
								
				factura_detalle_util::refrescarFKDescripciones($this->factura_detalles);
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
			
			foreach($this->factura_detalles as $factura_detalle) {
				$this->deepLoad($factura_detalle,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->factura_detalle,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->factura_detalles as $factura_detalle) {
				$this->deepSave($factura_detalle,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->factura_detalles as $factura_detalle) {
				$this->deepSave($factura_detalle,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(factura::$class);
				$classes[]=new Classe(bodega::$class);
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(unidad::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==factura::$class) {
						$classes[]=new Classe(factura::$class);
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
					if($clas->clas==factura::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(factura::$class);
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
	
	
	
	
	
	
	
	public function getfactura_detalle() : ?factura_detalle {	
		/*
		factura_detalle_logic_add::checkfactura_detalleToGet($this->factura_detalle,$this->datosCliente);
		factura_detalle_logic_add::updatefactura_detalleToGet($this->factura_detalle);
		*/
			
		return $this->factura_detalle;
	}
		
	public function setfactura_detalle(factura_detalle $newfactura_detalle) {
		$this->factura_detalle = $newfactura_detalle;
	}
	
	public function getfactura_detalles() : array {		
		/*
		factura_detalle_logic_add::checkfactura_detalleToGets($this->factura_detalles,$this->datosCliente);
		
		foreach ($this->factura_detalles as $factura_detalleLocal ) {
			factura_detalle_logic_add::updatefactura_detalleToGet($factura_detalleLocal);
		}
		*/
		
		return $this->factura_detalles;
	}
	
	public function setfactura_detalles(array $newfactura_detalles) {
		$this->factura_detalles = $newfactura_detalles;
	}
	
	public function getfactura_detalleDataAccess() : factura_detalle_data {
		return $this->factura_detalleDataAccess;
	}
	
	public function setfactura_detalleDataAccess(factura_detalle_data $newfactura_detalleDataAccess) {
		$this->factura_detalleDataAccess = $newfactura_detalleDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        factura_detalle_carga::$CONTROLLER;;        
		
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
