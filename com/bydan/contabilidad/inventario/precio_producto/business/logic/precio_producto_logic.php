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

namespace com\bydan\contabilidad\inventario\precio_producto\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\precio_producto\util\precio_producto_carga;
use com\bydan\contabilidad\inventario\precio_producto\util\precio_producto_param_return;

use com\bydan\contabilidad\inventario\precio_producto\presentation\session\precio_producto_session;

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

use com\bydan\contabilidad\inventario\precio_producto\util\precio_producto_util;
use com\bydan\contabilidad\inventario\precio_producto\business\entity\precio_producto;
use com\bydan\contabilidad\inventario\precio_producto\business\data\precio_producto_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\data\bodega_data;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\tipo_precio\business\entity\tipo_precio;
use com\bydan\contabilidad\inventario\tipo_precio\business\data\tipo_precio_data;
use com\bydan\contabilidad\inventario\tipo_precio\business\logic\tipo_precio_logic;
use com\bydan\contabilidad\inventario\tipo_precio\util\tipo_precio_util;

//REL


//REL DETALLES




class precio_producto_logic  extends GeneralEntityLogic implements precio_producto_logicI {	
	/*GENERAL*/
	public precio_producto_data $precio_productoDataAccess;
	//public ?precio_producto_logic_add $precio_productoLogicAdditional=null;
	public ?precio_producto $precio_producto;
	public array $precio_productos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->precio_productoDataAccess = new precio_producto_data();			
			$this->precio_productos = array();
			$this->precio_producto = new precio_producto();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->precio_productoLogicAdditional = new precio_producto_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->precio_productoLogicAdditional==null) {
		//	$this->precio_productoLogicAdditional=new precio_producto_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->precio_productoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->precio_productoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->precio_productoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->precio_productoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->precio_productos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->precio_productos=$this->precio_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
			}
			
			//precio_producto_logic_add::checkprecio_productoToGets($this->precio_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->precio_productos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->precio_productos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->precio_productos=$this->precio_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
			}
			
			//precio_producto_logic_add::checkprecio_productoToGets($this->precio_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->precio_productos);
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
		$this->precio_producto = new precio_producto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->precio_producto=$this->precio_productoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->precio_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				precio_producto_util::refrescarFKDescripcion($this->precio_producto);
			}
						
			//precio_producto_logic_add::checkprecio_productoToGet($this->precio_producto,$this->datosCliente);
			//precio_producto_logic_add::updateprecio_productoToGet($this->precio_producto);
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
		$this->precio_producto = new  precio_producto();
		  		  
        try {		
			$this->precio_producto=$this->precio_productoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->precio_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				precio_producto_util::refrescarFKDescripcion($this->precio_producto);
			}
			
			//precio_producto_logic_add::checkprecio_productoToGet($this->precio_producto,$this->datosCliente);
			//precio_producto_logic_add::updateprecio_productoToGet($this->precio_producto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?precio_producto {
		$precio_productoLogic = new  precio_producto_logic();
		  		  
        try {		
			$precio_productoLogic->setConnexion($connexion);			
			$precio_productoLogic->getEntity($id);			
			return $precio_productoLogic->getprecio_producto();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->precio_producto = new  precio_producto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->precio_producto=$this->precio_productoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->precio_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				precio_producto_util::refrescarFKDescripcion($this->precio_producto);
			}
			
			//precio_producto_logic_add::checkprecio_productoToGet($this->precio_producto,$this->datosCliente);
			//precio_producto_logic_add::updateprecio_productoToGet($this->precio_producto);
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
		$this->precio_producto = new  precio_producto();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->precio_producto=$this->precio_productoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->precio_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				precio_producto_util::refrescarFKDescripcion($this->precio_producto);
			}
			
			//precio_producto_logic_add::checkprecio_productoToGet($this->precio_producto,$this->datosCliente);
			//precio_producto_logic_add::updateprecio_productoToGet($this->precio_producto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?precio_producto {
		$precio_productoLogic = new  precio_producto_logic();
		  		  
        try {		
			$precio_productoLogic->setConnexion($connexion);			
			$precio_productoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $precio_productoLogic->getprecio_producto();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->precio_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->precio_productos=$this->precio_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
			}
			
			//precio_producto_logic_add::checkprecio_productoToGets($this->precio_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->precio_productos);			
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
		$this->precio_productos = array();
		  		  
        try {			
			$this->precio_productos=$this->precio_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
			}
			
			//precio_producto_logic_add::checkprecio_productoToGets($this->precio_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->precio_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->precio_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->precio_productos=$this->precio_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
			}
			
			//precio_producto_logic_add::checkprecio_productoToGets($this->precio_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->precio_productos);
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
		$this->precio_productos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->precio_productos=$this->precio_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
			}
			
			//precio_producto_logic_add::checkprecio_productoToGets($this->precio_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->precio_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$precio_productoLogic = new  precio_producto_logic();
		  		  
        try {		
			$precio_productoLogic->setConnexion($connexion);			
			$precio_productoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $precio_productoLogic->getprecio_productos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->precio_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->precio_productos=$this->precio_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
			}
			
			//precio_producto_logic_add::checkprecio_productoToGets($this->precio_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->precio_productos);
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
		$this->precio_productos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->precio_productos=$this->precio_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
			}
			
			//precio_producto_logic_add::checkprecio_productoToGets($this->precio_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->precio_productos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->precio_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->precio_productos=$this->precio_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
			}
			
			//precio_producto_logic_add::checkprecio_productoToGets($this->precio_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->precio_productos);
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
		$this->precio_productos = array();
		  		  
        try {			
			$this->precio_productos=$this->precio_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
			}	
			
			//precio_producto_logic_add::checkprecio_productoToGets($this->precio_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->precio_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->precio_productos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->precio_productos=$this->precio_productoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
			}
			
			//precio_producto_logic_add::checkprecio_productoToGets($this->precio_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->precio_productos);
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
		$this->precio_productos = array();
		  		  
        try {		
			$this->precio_productos=$this->precio_productoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
			}
			
			//precio_producto_logic_add::checkprecio_productoToGets($this->precio_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->precio_productos);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,precio_producto_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->precio_productos=$this->precio_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
			}
			//precio_producto_logic_add::checkprecio_productoToGets($this->precio_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->precio_productos);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,precio_producto_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->precio_productos=$this->precio_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
			}
			//precio_producto_logic_add::checkprecio_productoToGets($this->precio_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->precio_productos);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,precio_producto_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->precio_productos=$this->precio_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
			}
			//precio_producto_logic_add::checkprecio_productoToGets($this->precio_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->precio_productos);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,precio_producto_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->precio_productos=$this->precio_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
			}
			//precio_producto_logic_add::checkprecio_productoToGets($this->precio_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->precio_productos);
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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,precio_producto_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->precio_productos=$this->precio_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
			}
			//precio_producto_logic_add::checkprecio_productoToGets($this->precio_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->precio_productos);

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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,precio_producto_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->precio_productos=$this->precio_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
			}
			//precio_producto_logic_add::checkprecio_productoToGets($this->precio_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->precio_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtipo_precioWithConnection(string $strFinalQuery,Pagination $pagination,int $id_tipo_precio) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_precio= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_precio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_precio,precio_producto_util::$ID_TIPO_PRECIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_precio);

			$this->precio_productos=$this->precio_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
			}
			//precio_producto_logic_add::checkprecio_productoToGets($this->precio_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->precio_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtipo_precio(string $strFinalQuery,Pagination $pagination,int $id_tipo_precio) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_precio= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_precio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_precio,precio_producto_util::$ID_TIPO_PRECIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_precio);

			$this->precio_productos=$this->precio_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
			}
			//precio_producto_logic_add::checkprecio_productoToGets($this->precio_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->precio_productos);
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
						
			//precio_producto_logic_add::checkprecio_productoToSave($this->precio_producto,$this->datosCliente,$this->connexion);	       
			//precio_producto_logic_add::updateprecio_productoToSave($this->precio_producto);			
			precio_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->precio_producto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->precio_productoLogicAdditional->checkGeneralEntityToSave($this,$this->precio_producto,$this->datosCliente,$this->connexion);
			
			
			precio_producto_data::save($this->precio_producto, $this->connexion);	    	       	 				
			//precio_producto_logic_add::checkprecio_productoToSaveAfter($this->precio_producto,$this->datosCliente,$this->connexion);			
			//$this->precio_productoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->precio_producto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->precio_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->precio_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				precio_producto_util::refrescarFKDescripcion($this->precio_producto);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->precio_producto->getIsDeleted()) {
				$this->precio_producto=null;
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
						
			/*precio_producto_logic_add::checkprecio_productoToSave($this->precio_producto,$this->datosCliente,$this->connexion);*/	        
			//precio_producto_logic_add::updateprecio_productoToSave($this->precio_producto);			
			//$this->precio_productoLogicAdditional->checkGeneralEntityToSave($this,$this->precio_producto,$this->datosCliente,$this->connexion);			
			precio_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->precio_producto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			precio_producto_data::save($this->precio_producto, $this->connexion);	    	       	 						
			/*precio_producto_logic_add::checkprecio_productoToSaveAfter($this->precio_producto,$this->datosCliente,$this->connexion);*/			
			//$this->precio_productoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->precio_producto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->precio_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->precio_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				precio_producto_util::refrescarFKDescripcion($this->precio_producto);				
			}
			
			if($this->precio_producto->getIsDeleted()) {
				$this->precio_producto=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(precio_producto $precio_producto,Connexion $connexion)  {
		$precio_productoLogic = new  precio_producto_logic();		  		  
        try {		
			$precio_productoLogic->setConnexion($connexion);			
			$precio_productoLogic->setprecio_producto($precio_producto);			
			$precio_productoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*precio_producto_logic_add::checkprecio_productoToSaves($this->precio_productos,$this->datosCliente,$this->connexion);*/	        	
			//$this->precio_productoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->precio_productos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->precio_productos as $precio_productoLocal) {				
								
				//precio_producto_logic_add::updateprecio_productoToSave($precio_productoLocal);	        	
				precio_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$precio_productoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				precio_producto_data::save($precio_productoLocal, $this->connexion);				
			}
			
			/*precio_producto_logic_add::checkprecio_productoToSavesAfter($this->precio_productos,$this->datosCliente,$this->connexion);*/			
			//$this->precio_productoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->precio_productos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
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
			/*precio_producto_logic_add::checkprecio_productoToSaves($this->precio_productos,$this->datosCliente,$this->connexion);*/			
			//$this->precio_productoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->precio_productos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->precio_productos as $precio_productoLocal) {				
								
				//precio_producto_logic_add::updateprecio_productoToSave($precio_productoLocal);	        	
				precio_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$precio_productoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				precio_producto_data::save($precio_productoLocal, $this->connexion);				
			}			
			
			/*precio_producto_logic_add::checkprecio_productoToSavesAfter($this->precio_productos,$this->datosCliente,$this->connexion);*/			
			//$this->precio_productoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->precio_productos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $precio_productos,Connexion $connexion)  {
		$precio_productoLogic = new  precio_producto_logic();
		  		  
        try {		
			$precio_productoLogic->setConnexion($connexion);			
			$precio_productoLogic->setprecio_productos($precio_productos);			
			$precio_productoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$precio_productosAux=array();
		
		foreach($this->precio_productos as $precio_producto) {
			if($precio_producto->getIsDeleted()==false) {
				$precio_productosAux[]=$precio_producto;
			}
		}
		
		$this->precio_productos=$precio_productosAux;
	}
	
	public function updateToGetsAuxiliar(array &$precio_productos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->precio_productos as $precio_producto) {
				
				$precio_producto->setid_empresa_Descripcion(precio_producto_util::getempresaDescripcion($precio_producto->getempresa()));
				$precio_producto->setid_bodega_Descripcion(precio_producto_util::getbodegaDescripcion($precio_producto->getbodega()));
				$precio_producto->setid_producto_Descripcion(precio_producto_util::getproductoDescripcion($precio_producto->getproducto()));
				$precio_producto->setid_tipo_precio_Descripcion(precio_producto_util::gettipo_precioDescripcion($precio_producto->gettipo_precio()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$precio_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$precio_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$precio_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$precio_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$precio_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$precio_productoForeignKey=new precio_producto_param_return();//precio_productoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$precio_productoForeignKey,$precio_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTipos,',')) {
				$this->cargarCombosbodegasFK($this->connexion,$strRecargarFkQuery,$precio_productoForeignKey,$precio_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombosproductosFK($this->connexion,$strRecargarFkQuery,$precio_productoForeignKey,$precio_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_precio',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_preciosFK($this->connexion,$strRecargarFkQuery,$precio_productoForeignKey,$precio_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$precio_productoForeignKey,$precio_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosbodegasFK($this->connexion,' where id=-1 ',$precio_productoForeignKey,$precio_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproductosFK($this->connexion,' where id=-1 ',$precio_productoForeignKey,$precio_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_precio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_preciosFK($this->connexion,' where id=-1 ',$precio_productoForeignKey,$precio_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $precio_productoForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$precio_productoForeignKey,$precio_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$precio_productoForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($precio_producto_session==null) {
			$precio_producto_session=new precio_producto_session();
		}
		
		if($precio_producto_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($precio_productoForeignKey->idempresaDefaultFK==0) {
					$precio_productoForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$precio_productoForeignKey->empresasFK[$empresaLocal->getId()]=precio_producto_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($precio_producto_session->bigidempresaActual!=null && $precio_producto_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($precio_producto_session->bigidempresaActual);//WithConnection

				$precio_productoForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=precio_producto_util::getempresaDescripcion($empresaLogic->getempresa());
				$precio_productoForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombosbodegasFK($connexion=null,$strRecargarFkQuery='',$precio_productoForeignKey,$precio_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$precio_productoForeignKey->bodegasFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($precio_producto_session==null) {
			$precio_producto_session=new precio_producto_session();
		}
		
		if($precio_producto_session->bitBusquedaDesdeFKSesionbodega!=true) {
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
				if($precio_productoForeignKey->idbodegaDefaultFK==0) {
					$precio_productoForeignKey->idbodegaDefaultFK=$bodegaLocal->getId();
				}

				$precio_productoForeignKey->bodegasFK[$bodegaLocal->getId()]=precio_producto_util::getbodegaDescripcion($bodegaLocal);
			}

		} else {

			if($precio_producto_session->bigidbodegaActual!=null && $precio_producto_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($precio_producto_session->bigidbodegaActual);//WithConnection

				$precio_productoForeignKey->bodegasFK[$bodegaLogic->getbodega()->getId()]=precio_producto_util::getbodegaDescripcion($bodegaLogic->getbodega());
				$precio_productoForeignKey->idbodegaDefaultFK=$bodegaLogic->getbodega()->getId();
			}
		}
	}

	public function cargarCombosproductosFK($connexion=null,$strRecargarFkQuery='',$precio_productoForeignKey,$precio_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$precio_productoForeignKey->productosFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($precio_producto_session==null) {
			$precio_producto_session=new precio_producto_session();
		}
		
		if($precio_producto_session->bitBusquedaDesdeFKSesionproducto!=true) {
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
				if($precio_productoForeignKey->idproductoDefaultFK==0) {
					$precio_productoForeignKey->idproductoDefaultFK=$productoLocal->getId();
				}

				$precio_productoForeignKey->productosFK[$productoLocal->getId()]=precio_producto_util::getproductoDescripcion($productoLocal);
			}

		} else {

			if($precio_producto_session->bigidproductoActual!=null && $precio_producto_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($precio_producto_session->bigidproductoActual);//WithConnection

				$precio_productoForeignKey->productosFK[$productoLogic->getproducto()->getId()]=precio_producto_util::getproductoDescripcion($productoLogic->getproducto());
				$precio_productoForeignKey->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	public function cargarCombostipo_preciosFK($connexion=null,$strRecargarFkQuery='',$precio_productoForeignKey,$precio_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_precioLogic= new tipo_precio_logic();
		$pagination= new Pagination();
		$precio_productoForeignKey->tipo_preciosFK=array();

		$tipo_precioLogic->setConnexion($connexion);
		$tipo_precioLogic->gettipo_precioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($precio_producto_session==null) {
			$precio_producto_session=new precio_producto_session();
		}
		
		if($precio_producto_session->bitBusquedaDesdeFKSesiontipo_precio!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_precio_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltipo_precio=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_precio=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_precio, '');
				$finalQueryGlobaltipo_precio.=tipo_precio_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_precio.$strRecargarFkQuery;		

				$tipo_precioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($tipo_precioLogic->gettipo_precios() as $tipo_precioLocal ) {
				if($precio_productoForeignKey->idtipo_precioDefaultFK==0) {
					$precio_productoForeignKey->idtipo_precioDefaultFK=$tipo_precioLocal->getId();
				}

				$precio_productoForeignKey->tipo_preciosFK[$tipo_precioLocal->getId()]=precio_producto_util::gettipo_precioDescripcion($tipo_precioLocal);
			}

		} else {

			if($precio_producto_session->bigidtipo_precioActual!=null && $precio_producto_session->bigidtipo_precioActual > 0) {
				$tipo_precioLogic->getEntity($precio_producto_session->bigidtipo_precioActual);//WithConnection

				$precio_productoForeignKey->tipo_preciosFK[$tipo_precioLogic->gettipo_precio()->getId()]=precio_producto_util::gettipo_precioDescripcion($tipo_precioLogic->gettipo_precio());
				$precio_productoForeignKey->idtipo_precioDefaultFK=$tipo_precioLogic->gettipo_precio()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($precio_producto) {
		$this->saveRelacionesBase($precio_producto,true);
	}

	public function saveRelaciones($precio_producto) {
		$this->saveRelacionesBase($precio_producto,false);
	}

	public function saveRelacionesBase($precio_producto,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setprecio_producto($precio_producto);

			if(true) {

				//precio_producto_logic_add::updateRelacionesToSave($precio_producto,$this);

				if(($this->precio_producto->getIsNew() || $this->precio_producto->getIsChanged()) && !$this->precio_producto->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->precio_producto->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//precio_producto_logic_add::updateRelacionesToSaveAfter($precio_producto,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $precio_productos,precio_producto_param_return $precio_productoParameterGeneral) : precio_producto_param_return {
		$precio_productoReturnGeneral=new precio_producto_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $precio_productoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $precio_productos,precio_producto_param_return $precio_productoParameterGeneral) : precio_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$precio_productoReturnGeneral=new precio_producto_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $precio_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $precio_productos,precio_producto $precio_producto,precio_producto_param_return $precio_productoParameterGeneral,bool $isEsNuevoprecio_producto,array $clases) : precio_producto_param_return {
		 try {	
			$precio_productoReturnGeneral=new precio_producto_param_return();
	
			$precio_productoReturnGeneral->setprecio_producto($precio_producto);
			$precio_productoReturnGeneral->setprecio_productos($precio_productos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$precio_productoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $precio_productoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $precio_productos,precio_producto $precio_producto,precio_producto_param_return $precio_productoParameterGeneral,bool $isEsNuevoprecio_producto,array $clases) : precio_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$precio_productoReturnGeneral=new precio_producto_param_return();
	
			$precio_productoReturnGeneral->setprecio_producto($precio_producto);
			$precio_productoReturnGeneral->setprecio_productos($precio_productos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$precio_productoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $precio_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $precio_productos,precio_producto $precio_producto,precio_producto_param_return $precio_productoParameterGeneral,bool $isEsNuevoprecio_producto,array $clases) : precio_producto_param_return {
		 try {	
			$precio_productoReturnGeneral=new precio_producto_param_return();
	
			$precio_productoReturnGeneral->setprecio_producto($precio_producto);
			$precio_productoReturnGeneral->setprecio_productos($precio_productos);
			
			
			
			return $precio_productoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $precio_productos,precio_producto $precio_producto,precio_producto_param_return $precio_productoParameterGeneral,bool $isEsNuevoprecio_producto,array $clases) : precio_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$precio_productoReturnGeneral=new precio_producto_param_return();
	
			$precio_productoReturnGeneral->setprecio_producto($precio_producto);
			$precio_productoReturnGeneral->setprecio_productos($precio_productos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $precio_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,precio_producto $precio_producto,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,precio_producto $precio_producto,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		precio_producto_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(precio_producto $precio_producto,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//precio_producto_logic_add::updateprecio_productoToGet($this->precio_producto);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$precio_producto->setempresa($this->precio_productoDataAccess->getempresa($this->connexion,$precio_producto));
		$precio_producto->setbodega($this->precio_productoDataAccess->getbodega($this->connexion,$precio_producto));
		$precio_producto->setproducto($this->precio_productoDataAccess->getproducto($this->connexion,$precio_producto));
		$precio_producto->settipo_precio($this->precio_productoDataAccess->gettipo_precio($this->connexion,$precio_producto));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$precio_producto->setempresa($this->precio_productoDataAccess->getempresa($this->connexion,$precio_producto));
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$precio_producto->setbodega($this->precio_productoDataAccess->getbodega($this->connexion,$precio_producto));
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$precio_producto->setproducto($this->precio_productoDataAccess->getproducto($this->connexion,$precio_producto));
				continue;
			}

			if($clas->clas==tipo_precio::$class.'') {
				$precio_producto->settipo_precio($this->precio_productoDataAccess->gettipo_precio($this->connexion,$precio_producto));
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
			$precio_producto->setempresa($this->precio_productoDataAccess->getempresa($this->connexion,$precio_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$precio_producto->setbodega($this->precio_productoDataAccess->getbodega($this->connexion,$precio_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$precio_producto->setproducto($this->precio_productoDataAccess->getproducto($this->connexion,$precio_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_precio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$precio_producto->settipo_precio($this->precio_productoDataAccess->gettipo_precio($this->connexion,$precio_producto));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$precio_producto->setempresa($this->precio_productoDataAccess->getempresa($this->connexion,$precio_producto));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($precio_producto->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$precio_producto->setbodega($this->precio_productoDataAccess->getbodega($this->connexion,$precio_producto));
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepLoad($precio_producto->getbodega(),$isDeep,$deepLoadType,$clases);
				
		$precio_producto->setproducto($this->precio_productoDataAccess->getproducto($this->connexion,$precio_producto));
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepLoad($precio_producto->getproducto(),$isDeep,$deepLoadType,$clases);
				
		$precio_producto->settipo_precio($this->precio_productoDataAccess->gettipo_precio($this->connexion,$precio_producto));
		$tipo_precioLogic= new tipo_precio_logic($this->connexion);
		$tipo_precioLogic->deepLoad($precio_producto->gettipo_precio(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$precio_producto->setempresa($this->precio_productoDataAccess->getempresa($this->connexion,$precio_producto));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($precio_producto->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$precio_producto->setbodega($this->precio_productoDataAccess->getbodega($this->connexion,$precio_producto));
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepLoad($precio_producto->getbodega(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$precio_producto->setproducto($this->precio_productoDataAccess->getproducto($this->connexion,$precio_producto));
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($precio_producto->getproducto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_precio::$class.'') {
				$precio_producto->settipo_precio($this->precio_productoDataAccess->gettipo_precio($this->connexion,$precio_producto));
				$tipo_precioLogic= new tipo_precio_logic($this->connexion);
				$tipo_precioLogic->deepLoad($precio_producto->gettipo_precio(),$isDeep,$deepLoadType,$clases);				
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
			$precio_producto->setempresa($this->precio_productoDataAccess->getempresa($this->connexion,$precio_producto));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($precio_producto->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$precio_producto->setbodega($this->precio_productoDataAccess->getbodega($this->connexion,$precio_producto));
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepLoad($precio_producto->getbodega(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$precio_producto->setproducto($this->precio_productoDataAccess->getproducto($this->connexion,$precio_producto));
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($precio_producto->getproducto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_precio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$precio_producto->settipo_precio($this->precio_productoDataAccess->gettipo_precio($this->connexion,$precio_producto));
			$tipo_precioLogic= new tipo_precio_logic($this->connexion);
			$tipo_precioLogic->deepLoad($precio_producto->gettipo_precio(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(precio_producto $precio_producto,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//precio_producto_logic_add::updateprecio_productoToSave($this->precio_producto);			
			
			if(!$paraDeleteCascade) {				
				precio_producto_data::save($precio_producto, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($precio_producto->getempresa(),$this->connexion);
		bodega_data::save($precio_producto->getbodega(),$this->connexion);
		producto_data::save($precio_producto->getproducto(),$this->connexion);
		tipo_precio_data::save($precio_producto->gettipo_precio(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($precio_producto->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($precio_producto->getbodega(),$this->connexion);
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($precio_producto->getproducto(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_precio::$class.'') {
				tipo_precio_data::save($precio_producto->gettipo_precio(),$this->connexion);
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
			empresa_data::save($precio_producto->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($precio_producto->getbodega(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($precio_producto->getproducto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_precio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_precio_data::save($precio_producto->gettipo_precio(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($precio_producto->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($precio_producto->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		bodega_data::save($precio_producto->getbodega(),$this->connexion);
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepSave($precio_producto->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		producto_data::save($precio_producto->getproducto(),$this->connexion);
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepSave($precio_producto->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_precio_data::save($precio_producto->gettipo_precio(),$this->connexion);
		$tipo_precioLogic= new tipo_precio_logic($this->connexion);
		$tipo_precioLogic->deepSave($precio_producto->gettipo_precio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($precio_producto->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($precio_producto->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($precio_producto->getbodega(),$this->connexion);
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepSave($precio_producto->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($precio_producto->getproducto(),$this->connexion);
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepSave($precio_producto->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_precio::$class.'') {
				tipo_precio_data::save($precio_producto->gettipo_precio(),$this->connexion);
				$tipo_precioLogic= new tipo_precio_logic($this->connexion);
				$tipo_precioLogic->deepSave($precio_producto->gettipo_precio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			empresa_data::save($precio_producto->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($precio_producto->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($precio_producto->getbodega(),$this->connexion);
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepSave($precio_producto->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($precio_producto->getproducto(),$this->connexion);
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepSave($precio_producto->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_precio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_precio_data::save($precio_producto->gettipo_precio(),$this->connexion);
			$tipo_precioLogic= new tipo_precio_logic($this->connexion);
			$tipo_precioLogic->deepSave($precio_producto->gettipo_precio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				precio_producto_data::save($precio_producto, $this->connexion);
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
			
			$this->deepLoad($this->precio_producto,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->precio_productos as $precio_producto) {
				$this->deepLoad($precio_producto,$isDeep,$deepLoadType,$clases);
								
				precio_producto_util::refrescarFKDescripciones($this->precio_productos);
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
			
			foreach($this->precio_productos as $precio_producto) {
				$this->deepLoad($precio_producto,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->precio_producto,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->precio_productos as $precio_producto) {
				$this->deepSave($precio_producto,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->precio_productos as $precio_producto) {
				$this->deepSave($precio_producto,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(bodega::$class);
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(tipo_precio::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
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
					if($clas->clas==tipo_precio::$class) {
						$classes[]=new Classe(tipo_precio::$class);
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
					if($clas->clas==tipo_precio::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_precio::$class);
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
	
	
	
	
	
	
	
	public function getprecio_producto() : ?precio_producto {	
		/*
		precio_producto_logic_add::checkprecio_productoToGet($this->precio_producto,$this->datosCliente);
		precio_producto_logic_add::updateprecio_productoToGet($this->precio_producto);
		*/
			
		return $this->precio_producto;
	}
		
	public function setprecio_producto(precio_producto $newprecio_producto) {
		$this->precio_producto = $newprecio_producto;
	}
	
	public function getprecio_productos() : array {		
		/*
		precio_producto_logic_add::checkprecio_productoToGets($this->precio_productos,$this->datosCliente);
		
		foreach ($this->precio_productos as $precio_productoLocal ) {
			precio_producto_logic_add::updateprecio_productoToGet($precio_productoLocal);
		}
		*/
		
		return $this->precio_productos;
	}
	
	public function setprecio_productos(array $newprecio_productos) {
		$this->precio_productos = $newprecio_productos;
	}
	
	public function getprecio_productoDataAccess() : precio_producto_data {
		return $this->precio_productoDataAccess;
	}
	
	public function setprecio_productoDataAccess(precio_producto_data $newprecio_productoDataAccess) {
		$this->precio_productoDataAccess = $newprecio_productoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        precio_producto_carga::$CONTROLLER;;        
		
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
