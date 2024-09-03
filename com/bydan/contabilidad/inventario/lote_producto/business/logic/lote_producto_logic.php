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

namespace com\bydan\contabilidad\inventario\lote_producto\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\lote_producto\util\lote_producto_carga;
use com\bydan\contabilidad\inventario\lote_producto\util\lote_producto_param_return;

use com\bydan\contabilidad\inventario\lote_producto\presentation\session\lote_producto_session;

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

use com\bydan\contabilidad\inventario\lote_producto\util\lote_producto_util;
use com\bydan\contabilidad\inventario\lote_producto\business\entity\lote_producto;
use com\bydan\contabilidad\inventario\lote_producto\business\data\lote_producto_data;

//FK


use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\data\bodega_data;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

//REL


use com\bydan\contabilidad\inventario\kardex_detalle\business\entity\kardex_detalle;
use com\bydan\contabilidad\inventario\kardex_detalle\business\data\kardex_detalle_data;
use com\bydan\contabilidad\inventario\kardex_detalle\business\logic\kardex_detalle_logic;
use com\bydan\contabilidad\inventario\kardex_detalle\util\kardex_detalle_carga;
use com\bydan\contabilidad\inventario\kardex_detalle\util\kardex_detalle_util;

//REL DETALLES




class lote_producto_logic  extends GeneralEntityLogic implements lote_producto_logicI {	
	/*GENERAL*/
	public lote_producto_data $lote_productoDataAccess;
	//public ?lote_producto_logic_add $lote_productoLogicAdditional=null;
	public ?lote_producto $lote_producto;
	public array $lote_productos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->lote_productoDataAccess = new lote_producto_data();			
			$this->lote_productos = array();
			$this->lote_producto = new lote_producto();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->lote_productoLogicAdditional = new lote_producto_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->lote_productoLogicAdditional==null) {
		//	$this->lote_productoLogicAdditional=new lote_producto_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->lote_productoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->lote_productoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->lote_productoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->lote_productoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->lote_productos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lote_productos=$this->lote_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lote_producto_util::refrescarFKDescripciones($this->lote_productos);
			}
			
			//lote_producto_logic_add::checklote_productoToGets($this->lote_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lote_productos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->lote_productos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lote_productos=$this->lote_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lote_producto_util::refrescarFKDescripciones($this->lote_productos);
			}
			
			//lote_producto_logic_add::checklote_productoToGets($this->lote_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lote_productos);
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
		$this->lote_producto = new lote_producto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->lote_producto=$this->lote_productoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->lote_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				lote_producto_util::refrescarFKDescripcion($this->lote_producto);
			}
						
			//lote_producto_logic_add::checklote_productoToGet($this->lote_producto,$this->datosCliente);
			//lote_producto_logic_add::updatelote_productoToGet($this->lote_producto);
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
		$this->lote_producto = new  lote_producto();
		  		  
        try {		
			$this->lote_producto=$this->lote_productoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->lote_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				lote_producto_util::refrescarFKDescripcion($this->lote_producto);
			}
			
			//lote_producto_logic_add::checklote_productoToGet($this->lote_producto,$this->datosCliente);
			//lote_producto_logic_add::updatelote_productoToGet($this->lote_producto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?lote_producto {
		$lote_productoLogic = new  lote_producto_logic();
		  		  
        try {		
			$lote_productoLogic->setConnexion($connexion);			
			$lote_productoLogic->getEntity($id);			
			return $lote_productoLogic->getlote_producto();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->lote_producto = new  lote_producto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->lote_producto=$this->lote_productoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->lote_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				lote_producto_util::refrescarFKDescripcion($this->lote_producto);
			}
			
			//lote_producto_logic_add::checklote_productoToGet($this->lote_producto,$this->datosCliente);
			//lote_producto_logic_add::updatelote_productoToGet($this->lote_producto);
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
		$this->lote_producto = new  lote_producto();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lote_producto=$this->lote_productoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->lote_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				lote_producto_util::refrescarFKDescripcion($this->lote_producto);
			}
			
			//lote_producto_logic_add::checklote_productoToGet($this->lote_producto,$this->datosCliente);
			//lote_producto_logic_add::updatelote_productoToGet($this->lote_producto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?lote_producto {
		$lote_productoLogic = new  lote_producto_logic();
		  		  
        try {		
			$lote_productoLogic->setConnexion($connexion);			
			$lote_productoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $lote_productoLogic->getlote_producto();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->lote_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->lote_productos=$this->lote_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lote_producto_util::refrescarFKDescripciones($this->lote_productos);
			}
			
			//lote_producto_logic_add::checklote_productoToGets($this->lote_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lote_productos);			
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
		$this->lote_productos = array();
		  		  
        try {			
			$this->lote_productos=$this->lote_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lote_producto_util::refrescarFKDescripciones($this->lote_productos);
			}
			
			//lote_producto_logic_add::checklote_productoToGets($this->lote_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lote_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->lote_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lote_productos=$this->lote_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lote_producto_util::refrescarFKDescripciones($this->lote_productos);
			}
			
			//lote_producto_logic_add::checklote_productoToGets($this->lote_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lote_productos);
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
		$this->lote_productos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lote_productos=$this->lote_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lote_producto_util::refrescarFKDescripciones($this->lote_productos);
			}
			
			//lote_producto_logic_add::checklote_productoToGets($this->lote_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lote_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$lote_productoLogic = new  lote_producto_logic();
		  		  
        try {		
			$lote_productoLogic->setConnexion($connexion);			
			$lote_productoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $lote_productoLogic->getlote_productos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->lote_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->lote_productos=$this->lote_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lote_producto_util::refrescarFKDescripciones($this->lote_productos);
			}
			
			//lote_producto_logic_add::checklote_productoToGets($this->lote_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lote_productos);
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
		$this->lote_productos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lote_productos=$this->lote_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lote_producto_util::refrescarFKDescripciones($this->lote_productos);
			}
			
			//lote_producto_logic_add::checklote_productoToGets($this->lote_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lote_productos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->lote_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lote_productos=$this->lote_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lote_producto_util::refrescarFKDescripciones($this->lote_productos);
			}
			
			//lote_producto_logic_add::checklote_productoToGets($this->lote_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lote_productos);
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
		$this->lote_productos = array();
		  		  
        try {			
			$this->lote_productos=$this->lote_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lote_producto_util::refrescarFKDescripciones($this->lote_productos);
			}	
			
			//lote_producto_logic_add::checklote_productoToGets($this->lote_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lote_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->lote_productos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->lote_productos=$this->lote_productoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lote_producto_util::refrescarFKDescripciones($this->lote_productos);
			}
			
			//lote_producto_logic_add::checklote_productoToGets($this->lote_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lote_productos);
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
		$this->lote_productos = array();
		  		  
        try {		
			$this->lote_productos=$this->lote_productoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lote_producto_util::refrescarFKDescripciones($this->lote_productos);
			}
			
			//lote_producto_logic_add::checklote_productoToGets($this->lote_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lote_productos);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,lote_producto_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->lote_productos=$this->lote_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lote_producto_util::refrescarFKDescripciones($this->lote_productos);
			}
			//lote_producto_logic_add::checklote_productoToGets($this->lote_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lote_productos);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,lote_producto_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->lote_productos=$this->lote_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lote_producto_util::refrescarFKDescripciones($this->lote_productos);
			}
			//lote_producto_logic_add::checklote_productoToGets($this->lote_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lote_productos);
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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,lote_producto_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->lote_productos=$this->lote_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lote_producto_util::refrescarFKDescripciones($this->lote_productos);
			}
			//lote_producto_logic_add::checklote_productoToGets($this->lote_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lote_productos);

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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,lote_producto_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->lote_productos=$this->lote_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lote_producto_util::refrescarFKDescripciones($this->lote_productos);
			}
			//lote_producto_logic_add::checklote_productoToGets($this->lote_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lote_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdproveedorWithConnection(string $strFinalQuery,Pagination $pagination,int $id_proveedor) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,lote_producto_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->lote_productos=$this->lote_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lote_producto_util::refrescarFKDescripciones($this->lote_productos);
			}
			//lote_producto_logic_add::checklote_productoToGets($this->lote_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lote_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idproveedor(string $strFinalQuery,Pagination $pagination,int $id_proveedor) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,lote_producto_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->lote_productos=$this->lote_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lote_producto_util::refrescarFKDescripciones($this->lote_productos);
			}
			//lote_producto_logic_add::checklote_productoToGets($this->lote_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lote_productos);
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
						
			//lote_producto_logic_add::checklote_productoToSave($this->lote_producto,$this->datosCliente,$this->connexion);	       
			//lote_producto_logic_add::updatelote_productoToSave($this->lote_producto);			
			lote_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->lote_producto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->lote_productoLogicAdditional->checkGeneralEntityToSave($this,$this->lote_producto,$this->datosCliente,$this->connexion);
			
			
			lote_producto_data::save($this->lote_producto, $this->connexion);	    	       	 				
			//lote_producto_logic_add::checklote_productoToSaveAfter($this->lote_producto,$this->datosCliente,$this->connexion);			
			//$this->lote_productoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->lote_producto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->lote_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->lote_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				lote_producto_util::refrescarFKDescripcion($this->lote_producto);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->lote_producto->getIsDeleted()) {
				$this->lote_producto=null;
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
						
			/*lote_producto_logic_add::checklote_productoToSave($this->lote_producto,$this->datosCliente,$this->connexion);*/	        
			//lote_producto_logic_add::updatelote_productoToSave($this->lote_producto);			
			//$this->lote_productoLogicAdditional->checkGeneralEntityToSave($this,$this->lote_producto,$this->datosCliente,$this->connexion);			
			lote_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->lote_producto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			lote_producto_data::save($this->lote_producto, $this->connexion);	    	       	 						
			/*lote_producto_logic_add::checklote_productoToSaveAfter($this->lote_producto,$this->datosCliente,$this->connexion);*/			
			//$this->lote_productoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->lote_producto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->lote_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->lote_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				lote_producto_util::refrescarFKDescripcion($this->lote_producto);				
			}
			
			if($this->lote_producto->getIsDeleted()) {
				$this->lote_producto=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(lote_producto $lote_producto,Connexion $connexion)  {
		$lote_productoLogic = new  lote_producto_logic();		  		  
        try {		
			$lote_productoLogic->setConnexion($connexion);			
			$lote_productoLogic->setlote_producto($lote_producto);			
			$lote_productoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*lote_producto_logic_add::checklote_productoToSaves($this->lote_productos,$this->datosCliente,$this->connexion);*/	        	
			//$this->lote_productoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->lote_productos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->lote_productos as $lote_productoLocal) {				
								
				//lote_producto_logic_add::updatelote_productoToSave($lote_productoLocal);	        	
				lote_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$lote_productoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				lote_producto_data::save($lote_productoLocal, $this->connexion);				
			}
			
			/*lote_producto_logic_add::checklote_productoToSavesAfter($this->lote_productos,$this->datosCliente,$this->connexion);*/			
			//$this->lote_productoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->lote_productos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lote_producto_util::refrescarFKDescripciones($this->lote_productos);
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
			/*lote_producto_logic_add::checklote_productoToSaves($this->lote_productos,$this->datosCliente,$this->connexion);*/			
			//$this->lote_productoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->lote_productos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->lote_productos as $lote_productoLocal) {				
								
				//lote_producto_logic_add::updatelote_productoToSave($lote_productoLocal);	        	
				lote_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$lote_productoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				lote_producto_data::save($lote_productoLocal, $this->connexion);				
			}			
			
			/*lote_producto_logic_add::checklote_productoToSavesAfter($this->lote_productos,$this->datosCliente,$this->connexion);*/			
			//$this->lote_productoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->lote_productos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lote_producto_util::refrescarFKDescripciones($this->lote_productos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $lote_productos,Connexion $connexion)  {
		$lote_productoLogic = new  lote_producto_logic();
		  		  
        try {		
			$lote_productoLogic->setConnexion($connexion);			
			$lote_productoLogic->setlote_productos($lote_productos);			
			$lote_productoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$lote_productosAux=array();
		
		foreach($this->lote_productos as $lote_producto) {
			if($lote_producto->getIsDeleted()==false) {
				$lote_productosAux[]=$lote_producto;
			}
		}
		
		$this->lote_productos=$lote_productosAux;
	}
	
	public function updateToGetsAuxiliar(array &$lote_productos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->lote_productos as $lote_producto) {
				
				$lote_producto->setid_producto_Descripcion(lote_producto_util::getproductoDescripcion($lote_producto->getproducto()));
				$lote_producto->setid_bodega_Descripcion(lote_producto_util::getbodegaDescripcion($lote_producto->getbodega()));
				$lote_producto->setid_proveedor_Descripcion(lote_producto_util::getproveedorDescripcion($lote_producto->getproveedor()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$lote_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$lote_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$lote_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$lote_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$lote_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$lote_productoForeignKey=new lote_producto_param_return();//lote_productoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombosproductosFK($this->connexion,$strRecargarFkQuery,$lote_productoForeignKey,$lote_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTipos,',')) {
				$this->cargarCombosbodegasFK($this->connexion,$strRecargarFkQuery,$lote_productoForeignKey,$lote_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosproveedorsFK($this->connexion,$strRecargarFkQuery,$lote_productoForeignKey,$lote_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproductosFK($this->connexion,' where id=-1 ',$lote_productoForeignKey,$lote_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosbodegasFK($this->connexion,' where id=-1 ',$lote_productoForeignKey,$lote_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproveedorsFK($this->connexion,' where id=-1 ',$lote_productoForeignKey,$lote_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $lote_productoForeignKey;
			
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
	
	
	public function cargarCombosproductosFK($connexion=null,$strRecargarFkQuery='',$lote_productoForeignKey,$lote_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$lote_productoForeignKey->productosFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lote_producto_session==null) {
			$lote_producto_session=new lote_producto_session();
		}
		
		if($lote_producto_session->bitBusquedaDesdeFKSesionproducto!=true) {
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
				if($lote_productoForeignKey->idproductoDefaultFK==0) {
					$lote_productoForeignKey->idproductoDefaultFK=$productoLocal->getId();
				}

				$lote_productoForeignKey->productosFK[$productoLocal->getId()]=lote_producto_util::getproductoDescripcion($productoLocal);
			}

		} else {

			if($lote_producto_session->bigidproductoActual!=null && $lote_producto_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($lote_producto_session->bigidproductoActual);//WithConnection

				$lote_productoForeignKey->productosFK[$productoLogic->getproducto()->getId()]=lote_producto_util::getproductoDescripcion($productoLogic->getproducto());
				$lote_productoForeignKey->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	public function cargarCombosbodegasFK($connexion=null,$strRecargarFkQuery='',$lote_productoForeignKey,$lote_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$lote_productoForeignKey->bodegasFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lote_producto_session==null) {
			$lote_producto_session=new lote_producto_session();
		}
		
		if($lote_producto_session->bitBusquedaDesdeFKSesionbodega!=true) {
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
				if($lote_productoForeignKey->idbodegaDefaultFK==0) {
					$lote_productoForeignKey->idbodegaDefaultFK=$bodegaLocal->getId();
				}

				$lote_productoForeignKey->bodegasFK[$bodegaLocal->getId()]=lote_producto_util::getbodegaDescripcion($bodegaLocal);
			}

		} else {

			if($lote_producto_session->bigidbodegaActual!=null && $lote_producto_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($lote_producto_session->bigidbodegaActual);//WithConnection

				$lote_productoForeignKey->bodegasFK[$bodegaLogic->getbodega()->getId()]=lote_producto_util::getbodegaDescripcion($bodegaLogic->getbodega());
				$lote_productoForeignKey->idbodegaDefaultFK=$bodegaLogic->getbodega()->getId();
			}
		}
	}

	public function cargarCombosproveedorsFK($connexion=null,$strRecargarFkQuery='',$lote_productoForeignKey,$lote_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$proveedorLogic= new proveedor_logic();
		$pagination= new Pagination();
		$lote_productoForeignKey->proveedorsFK=array();

		$proveedorLogic->setConnexion($connexion);
		$proveedorLogic->getproveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lote_producto_session==null) {
			$lote_producto_session=new lote_producto_session();
		}
		
		if($lote_producto_session->bitBusquedaDesdeFKSesionproveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=proveedor_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalproveedor=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalproveedor=Funciones::GetFinalQueryAppend($finalQueryGlobalproveedor, '');
				$finalQueryGlobalproveedor.=proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalproveedor.$strRecargarFkQuery;		

				$proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($proveedorLogic->getproveedors() as $proveedorLocal ) {
				if($lote_productoForeignKey->idproveedorDefaultFK==0) {
					$lote_productoForeignKey->idproveedorDefaultFK=$proveedorLocal->getId();
				}

				$lote_productoForeignKey->proveedorsFK[$proveedorLocal->getId()]=lote_producto_util::getproveedorDescripcion($proveedorLocal);
			}

		} else {

			if($lote_producto_session->bigidproveedorActual!=null && $lote_producto_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($lote_producto_session->bigidproveedorActual);//WithConnection

				$lote_productoForeignKey->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=lote_producto_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$lote_productoForeignKey->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($lote_producto,$kardexdetalles) {
		$this->saveRelacionesBase($lote_producto,$kardexdetalles,true);
	}

	public function saveRelaciones($lote_producto,$kardexdetalles) {
		$this->saveRelacionesBase($lote_producto,$kardexdetalles,false);
	}

	public function saveRelacionesBase($lote_producto,$kardexdetalles=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$lote_producto->setkardex_detalles($kardexdetalles);
			$this->setlote_producto($lote_producto);

			if(true) {

				//lote_producto_logic_add::updateRelacionesToSave($lote_producto,$this);

				if(($this->lote_producto->getIsNew() || $this->lote_producto->getIsChanged()) && !$this->lote_producto->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($kardexdetalles);

				} else if($this->lote_producto->getIsDeleted()) {
					$this->saveRelacionesDetalles($kardexdetalles);
					$this->save();
				}

				//lote_producto_logic_add::updateRelacionesToSaveAfter($lote_producto,$this);

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
	
	
	public function saveRelacionesDetalles($kardexdetalles=array()) {
		try {
	

			$idlote_productoActual=$this->getlote_producto()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/kardex_detalle_carga.php');
			kardex_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$kardexdetalleLogic_Desde_lote_producto=new kardex_detalle_logic();
			$kardexdetalleLogic_Desde_lote_producto->setkardex_detalles($kardexdetalles);

			$kardexdetalleLogic_Desde_lote_producto->setConnexion($this->getConnexion());
			$kardexdetalleLogic_Desde_lote_producto->setDatosCliente($this->datosCliente);

			foreach($kardexdetalleLogic_Desde_lote_producto->getkardex_detalles() as $kardexdetalle_Desde_lote_producto) {
				$kardexdetalle_Desde_lote_producto->setid_lote_producto($idlote_productoActual);
			}

			$kardexdetalleLogic_Desde_lote_producto->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $lote_productos,lote_producto_param_return $lote_productoParameterGeneral) : lote_producto_param_return {
		$lote_productoReturnGeneral=new lote_producto_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $lote_productoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $lote_productos,lote_producto_param_return $lote_productoParameterGeneral) : lote_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$lote_productoReturnGeneral=new lote_producto_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $lote_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $lote_productos,lote_producto $lote_producto,lote_producto_param_return $lote_productoParameterGeneral,bool $isEsNuevolote_producto,array $clases) : lote_producto_param_return {
		 try {	
			$lote_productoReturnGeneral=new lote_producto_param_return();
	
			$lote_productoReturnGeneral->setlote_producto($lote_producto);
			$lote_productoReturnGeneral->setlote_productos($lote_productos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$lote_productoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $lote_productoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $lote_productos,lote_producto $lote_producto,lote_producto_param_return $lote_productoParameterGeneral,bool $isEsNuevolote_producto,array $clases) : lote_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$lote_productoReturnGeneral=new lote_producto_param_return();
	
			$lote_productoReturnGeneral->setlote_producto($lote_producto);
			$lote_productoReturnGeneral->setlote_productos($lote_productos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$lote_productoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $lote_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $lote_productos,lote_producto $lote_producto,lote_producto_param_return $lote_productoParameterGeneral,bool $isEsNuevolote_producto,array $clases) : lote_producto_param_return {
		 try {	
			$lote_productoReturnGeneral=new lote_producto_param_return();
	
			$lote_productoReturnGeneral->setlote_producto($lote_producto);
			$lote_productoReturnGeneral->setlote_productos($lote_productos);
			
			
			
			return $lote_productoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $lote_productos,lote_producto $lote_producto,lote_producto_param_return $lote_productoParameterGeneral,bool $isEsNuevolote_producto,array $clases) : lote_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$lote_productoReturnGeneral=new lote_producto_param_return();
	
			$lote_productoReturnGeneral->setlote_producto($lote_producto);
			$lote_productoReturnGeneral->setlote_productos($lote_productos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $lote_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,lote_producto $lote_producto,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,lote_producto $lote_producto,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		lote_producto_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		lote_producto_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(lote_producto $lote_producto,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//lote_producto_logic_add::updatelote_productoToGet($this->lote_producto);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$lote_producto->setproducto($this->lote_productoDataAccess->getproducto($this->connexion,$lote_producto));
		$lote_producto->setbodega($this->lote_productoDataAccess->getbodega($this->connexion,$lote_producto));
		$lote_producto->setproveedor($this->lote_productoDataAccess->getproveedor($this->connexion,$lote_producto));
		$lote_producto->setkardex_detalles($this->lote_productoDataAccess->getkardex_detalles($this->connexion,$lote_producto));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$lote_producto->setproducto($this->lote_productoDataAccess->getproducto($this->connexion,$lote_producto));
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$lote_producto->setbodega($this->lote_productoDataAccess->getbodega($this->connexion,$lote_producto));
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$lote_producto->setproveedor($this->lote_productoDataAccess->getproveedor($this->connexion,$lote_producto));
				continue;
			}

			if($clas->clas==kardex_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$lote_producto->setkardex_detalles($this->lote_productoDataAccess->getkardex_detalles($this->connexion,$lote_producto));

				if($this->isConDeep) {
					$kardexdetalleLogic= new kardex_detalle_logic($this->connexion);
					$kardexdetalleLogic->setkardex_detalles($lote_producto->getkardex_detalles());
					$classesLocal=kardex_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$kardexdetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					kardex_detalle_util::refrescarFKDescripciones($kardexdetalleLogic->getkardex_detalles());
					$lote_producto->setkardex_detalles($kardexdetalleLogic->getkardex_detalles());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lote_producto->setproducto($this->lote_productoDataAccess->getproducto($this->connexion,$lote_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lote_producto->setbodega($this->lote_productoDataAccess->getbodega($this->connexion,$lote_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lote_producto->setproveedor($this->lote_productoDataAccess->getproveedor($this->connexion,$lote_producto));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(kardex_detalle::$class);
			$lote_producto->setkardex_detalles($this->lote_productoDataAccess->getkardex_detalles($this->connexion,$lote_producto));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$lote_producto->setproducto($this->lote_productoDataAccess->getproducto($this->connexion,$lote_producto));
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepLoad($lote_producto->getproducto(),$isDeep,$deepLoadType,$clases);
				
		$lote_producto->setbodega($this->lote_productoDataAccess->getbodega($this->connexion,$lote_producto));
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepLoad($lote_producto->getbodega(),$isDeep,$deepLoadType,$clases);
				
		$lote_producto->setproveedor($this->lote_productoDataAccess->getproveedor($this->connexion,$lote_producto));
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepLoad($lote_producto->getproveedor(),$isDeep,$deepLoadType,$clases);
				

		$lote_producto->setkardex_detalles($this->lote_productoDataAccess->getkardex_detalles($this->connexion,$lote_producto));

		foreach($lote_producto->getkardex_detalles() as $kardexdetalle) {
			$kardexdetalleLogic= new kardex_detalle_logic($this->connexion);
			$kardexdetalleLogic->deepLoad($kardexdetalle,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$lote_producto->setproducto($this->lote_productoDataAccess->getproducto($this->connexion,$lote_producto));
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($lote_producto->getproducto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$lote_producto->setbodega($this->lote_productoDataAccess->getbodega($this->connexion,$lote_producto));
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepLoad($lote_producto->getbodega(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$lote_producto->setproveedor($this->lote_productoDataAccess->getproveedor($this->connexion,$lote_producto));
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($lote_producto->getproveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==kardex_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$lote_producto->setkardex_detalles($this->lote_productoDataAccess->getkardex_detalles($this->connexion,$lote_producto));

				foreach($lote_producto->getkardex_detalles() as $kardexdetalle) {
					$kardexdetalleLogic= new kardex_detalle_logic($this->connexion);
					$kardexdetalleLogic->deepLoad($kardexdetalle,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lote_producto->setproducto($this->lote_productoDataAccess->getproducto($this->connexion,$lote_producto));
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($lote_producto->getproducto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lote_producto->setbodega($this->lote_productoDataAccess->getbodega($this->connexion,$lote_producto));
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepLoad($lote_producto->getbodega(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lote_producto->setproveedor($this->lote_productoDataAccess->getproveedor($this->connexion,$lote_producto));
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($lote_producto->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(kardex_detalle::$class);
			$lote_producto->setkardex_detalles($this->lote_productoDataAccess->getkardex_detalles($this->connexion,$lote_producto));

			foreach($lote_producto->getkardex_detalles() as $kardexdetalle) {
				$kardexdetalleLogic= new kardex_detalle_logic($this->connexion);
				$kardexdetalleLogic->deepLoad($kardexdetalle,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(lote_producto $lote_producto,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//lote_producto_logic_add::updatelote_productoToSave($this->lote_producto);			
			
			if(!$paraDeleteCascade) {				
				lote_producto_data::save($lote_producto, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		producto_data::save($lote_producto->getproducto(),$this->connexion);
		bodega_data::save($lote_producto->getbodega(),$this->connexion);
		proveedor_data::save($lote_producto->getproveedor(),$this->connexion);

		foreach($lote_producto->getkardex_detalles() as $kardexdetalle) {
			$kardexdetalle->setid_lote_producto($lote_producto->getId());
			kardex_detalle_data::save($kardexdetalle,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				producto_data::save($lote_producto->getproducto(),$this->connexion);
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($lote_producto->getbodega(),$this->connexion);
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($lote_producto->getproveedor(),$this->connexion);
				continue;
			}


			if($clas->clas==kardex_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($lote_producto->getkardex_detalles() as $kardexdetalle) {
					$kardexdetalle->setid_lote_producto($lote_producto->getId());
					kardex_detalle_data::save($kardexdetalle,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($lote_producto->getproducto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($lote_producto->getbodega(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($lote_producto->getproveedor(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(kardex_detalle::$class);

			foreach($lote_producto->getkardex_detalles() as $kardexdetalle) {
				$kardexdetalle->setid_lote_producto($lote_producto->getId());
				kardex_detalle_data::save($kardexdetalle,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		producto_data::save($lote_producto->getproducto(),$this->connexion);
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepSave($lote_producto->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		bodega_data::save($lote_producto->getbodega(),$this->connexion);
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepSave($lote_producto->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		proveedor_data::save($lote_producto->getproveedor(),$this->connexion);
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepSave($lote_producto->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($lote_producto->getkardex_detalles() as $kardexdetalle) {
			$kardexdetalleLogic= new kardex_detalle_logic($this->connexion);
			$kardexdetalle->setid_lote_producto($lote_producto->getId());
			kardex_detalle_data::save($kardexdetalle,$this->connexion);
			$kardexdetalleLogic->deepSave($kardexdetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				producto_data::save($lote_producto->getproducto(),$this->connexion);
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepSave($lote_producto->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($lote_producto->getbodega(),$this->connexion);
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepSave($lote_producto->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($lote_producto->getproveedor(),$this->connexion);
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepSave($lote_producto->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==kardex_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($lote_producto->getkardex_detalles() as $kardexdetalle) {
					$kardexdetalleLogic= new kardex_detalle_logic($this->connexion);
					$kardexdetalle->setid_lote_producto($lote_producto->getId());
					kardex_detalle_data::save($kardexdetalle,$this->connexion);
					$kardexdetalleLogic->deepSave($kardexdetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($lote_producto->getproducto(),$this->connexion);
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepSave($lote_producto->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($lote_producto->getbodega(),$this->connexion);
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepSave($lote_producto->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($lote_producto->getproveedor(),$this->connexion);
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepSave($lote_producto->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(kardex_detalle::$class);

			foreach($lote_producto->getkardex_detalles() as $kardexdetalle) {
				$kardexdetalleLogic= new kardex_detalle_logic($this->connexion);
				$kardexdetalle->setid_lote_producto($lote_producto->getId());
				kardex_detalle_data::save($kardexdetalle,$this->connexion);
				$kardexdetalleLogic->deepSave($kardexdetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				lote_producto_data::save($lote_producto, $this->connexion);
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
			
			$this->deepLoad($this->lote_producto,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->lote_productos as $lote_producto) {
				$this->deepLoad($lote_producto,$isDeep,$deepLoadType,$clases);
								
				lote_producto_util::refrescarFKDescripciones($this->lote_productos);
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
			
			foreach($this->lote_productos as $lote_producto) {
				$this->deepLoad($lote_producto,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->lote_producto,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->lote_productos as $lote_producto) {
				$this->deepSave($lote_producto,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->lote_productos as $lote_producto) {
				$this->deepSave($lote_producto,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(bodega::$class);
				$classes[]=new Classe(proveedor::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
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

				foreach($classesP as $clas)
				{
					if($clas->clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

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

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(proveedor::$class);
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
				
				$classes[]=new Classe(kardex_detalle::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==kardex_detalle::$class) {
						$classes[]=new Classe(kardex_detalle::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==kardex_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(kardex_detalle::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getlote_producto() : ?lote_producto {	
		/*
		lote_producto_logic_add::checklote_productoToGet($this->lote_producto,$this->datosCliente);
		lote_producto_logic_add::updatelote_productoToGet($this->lote_producto);
		*/
			
		return $this->lote_producto;
	}
		
	public function setlote_producto(lote_producto $newlote_producto) {
		$this->lote_producto = $newlote_producto;
	}
	
	public function getlote_productos() : array {		
		/*
		lote_producto_logic_add::checklote_productoToGets($this->lote_productos,$this->datosCliente);
		
		foreach ($this->lote_productos as $lote_productoLocal ) {
			lote_producto_logic_add::updatelote_productoToGet($lote_productoLocal);
		}
		*/
		
		return $this->lote_productos;
	}
	
	public function setlote_productos(array $newlote_productos) {
		$this->lote_productos = $newlote_productos;
	}
	
	public function getlote_productoDataAccess() : lote_producto_data {
		return $this->lote_productoDataAccess;
	}
	
	public function setlote_productoDataAccess(lote_producto_data $newlote_productoDataAccess) {
		$this->lote_productoDataAccess = $newlote_productoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        lote_producto_carga::$CONTROLLER;;        
		
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
