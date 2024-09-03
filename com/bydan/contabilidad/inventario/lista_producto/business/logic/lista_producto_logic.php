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

namespace com\bydan\contabilidad\inventario\lista_producto\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_param_return;

use com\bydan\contabilidad\inventario\lista_producto\presentation\session\lista_producto_session;

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

use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;
use com\bydan\contabilidad\inventario\lista_producto\business\entity\lista_producto;
use com\bydan\contabilidad\inventario\lista_producto\business\data\lista_producto_data;

//FK


use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;
use com\bydan\contabilidad\inventario\unidad\business\data\unidad_data;
use com\bydan\contabilidad\inventario\unidad\business\logic\unidad_logic;
use com\bydan\contabilidad\inventario\unidad\util\unidad_util;

use com\bydan\contabilidad\inventario\categoria_producto\business\entity\categoria_producto;
use com\bydan\contabilidad\inventario\categoria_producto\business\data\categoria_producto_data;
use com\bydan\contabilidad\inventario\categoria_producto\business\logic\categoria_producto_logic;
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_util;

use com\bydan\contabilidad\inventario\sub_categoria_producto\business\entity\sub_categoria_producto;
use com\bydan\contabilidad\inventario\sub_categoria_producto\business\data\sub_categoria_producto_data;
use com\bydan\contabilidad\inventario\sub_categoria_producto\business\logic\sub_categoria_producto_logic;
use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_util;

use com\bydan\contabilidad\inventario\tipo_producto\business\entity\tipo_producto;
use com\bydan\contabilidad\inventario\tipo_producto\business\data\tipo_producto_data;
use com\bydan\contabilidad\inventario\tipo_producto\business\logic\tipo_producto_logic;
use com\bydan\contabilidad\inventario\tipo_producto\util\tipo_producto_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\data\bodega_data;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\inventario\otro_suplidor\business\entity\otro_suplidor;
use com\bydan\contabilidad\inventario\otro_suplidor\business\data\otro_suplidor_data;
use com\bydan\contabilidad\inventario\otro_suplidor\business\logic\otro_suplidor_logic;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_util;

use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;
use com\bydan\contabilidad\facturacion\impuesto\business\data\impuesto_data;
use com\bydan\contabilidad\facturacion\impuesto\business\logic\impuesto_logic;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_util;

use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\data\otro_impuesto_data;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\logic\otro_impuesto_logic;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_util;

use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;
use com\bydan\contabilidad\facturacion\retencion\business\data\retencion_data;
use com\bydan\contabilidad\facturacion\retencion\business\logic\retencion_logic;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_util;

//REL


//REL DETALLES




class lista_producto_logic  extends GeneralEntityLogic implements lista_producto_logicI {	
	/*GENERAL*/
	public lista_producto_data $lista_productoDataAccess;
	//public ?lista_producto_logic_add $lista_productoLogicAdditional=null;
	public ?lista_producto $lista_producto;
	public array $lista_productos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->lista_productoDataAccess = new lista_producto_data();			
			$this->lista_productos = array();
			$this->lista_producto = new lista_producto();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->lista_productoLogicAdditional = new lista_producto_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->lista_productoLogicAdditional==null) {
		//	$this->lista_productoLogicAdditional=new lista_producto_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->lista_productoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->lista_productoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->lista_productoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->lista_productoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->lista_productos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_productos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->lista_productos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_productos);
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
		$this->lista_producto = new lista_producto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->lista_producto=$this->lista_productoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->lista_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				lista_producto_util::refrescarFKDescripcion($this->lista_producto);
			}
						
			//lista_producto_logic_add::checklista_productoToGet($this->lista_producto,$this->datosCliente);
			//lista_producto_logic_add::updatelista_productoToGet($this->lista_producto);
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
		$this->lista_producto = new  lista_producto();
		  		  
        try {		
			$this->lista_producto=$this->lista_productoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->lista_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				lista_producto_util::refrescarFKDescripcion($this->lista_producto);
			}
			
			//lista_producto_logic_add::checklista_productoToGet($this->lista_producto,$this->datosCliente);
			//lista_producto_logic_add::updatelista_productoToGet($this->lista_producto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?lista_producto {
		$lista_productoLogic = new  lista_producto_logic();
		  		  
        try {		
			$lista_productoLogic->setConnexion($connexion);			
			$lista_productoLogic->getEntity($id);			
			return $lista_productoLogic->getlista_producto();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->lista_producto = new  lista_producto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->lista_producto=$this->lista_productoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->lista_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				lista_producto_util::refrescarFKDescripcion($this->lista_producto);
			}
			
			//lista_producto_logic_add::checklista_productoToGet($this->lista_producto,$this->datosCliente);
			//lista_producto_logic_add::updatelista_productoToGet($this->lista_producto);
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
		$this->lista_producto = new  lista_producto();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lista_producto=$this->lista_productoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->lista_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				lista_producto_util::refrescarFKDescripcion($this->lista_producto);
			}
			
			//lista_producto_logic_add::checklista_productoToGet($this->lista_producto,$this->datosCliente);
			//lista_producto_logic_add::updatelista_productoToGet($this->lista_producto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?lista_producto {
		$lista_productoLogic = new  lista_producto_logic();
		  		  
        try {		
			$lista_productoLogic->setConnexion($connexion);			
			$lista_productoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $lista_productoLogic->getlista_producto();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->lista_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_productos);			
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
		$this->lista_productos = array();
		  		  
        try {			
			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->lista_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_productos);
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
		$this->lista_productos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$lista_productoLogic = new  lista_producto_logic();
		  		  
        try {		
			$lista_productoLogic->setConnexion($connexion);			
			$lista_productoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $lista_productoLogic->getlista_productos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->lista_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->lista_productos=$this->lista_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_productos);
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
		$this->lista_productos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lista_productos=$this->lista_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_productos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->lista_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lista_productos=$this->lista_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_productos);
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
		$this->lista_productos = array();
		  		  
        try {			
			$this->lista_productos=$this->lista_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}	
			
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->lista_productos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->lista_productos=$this->lista_productoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_productos);
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
		$this->lista_productos = array();
		  		  
        try {		
			$this->lista_productos=$this->lista_productoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_productos);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,lista_producto_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,lista_producto_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idcategoria_productoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_categoria_producto) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_categoria_producto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_categoria_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_categoria_producto,lista_producto_util::$ID_CATEGORIA_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_categoria_producto);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcategoria_producto(string $strFinalQuery,Pagination $pagination,int $id_categoria_producto) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_categoria_producto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_categoria_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_categoria_producto,lista_producto_util::$ID_CATEGORIA_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_categoria_producto);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idcuenta_compraWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cuenta_compra) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_compra= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_compra->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_compra,lista_producto_util::$ID_CUENTA_COMPRA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_compra);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta_compra(string $strFinalQuery,Pagination $pagination,int $id_cuenta_compra) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_compra= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_compra->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_compra,lista_producto_util::$ID_CUENTA_COMPRA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_compra);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idcuenta_inventarioWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cuenta_inventario) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_inventario= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_inventario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_inventario,lista_producto_util::$ID_CUENTA_INVENTARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_inventario);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta_inventario(string $strFinalQuery,Pagination $pagination,int $id_cuenta_inventario) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_inventario= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_inventario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_inventario,lista_producto_util::$ID_CUENTA_INVENTARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_inventario);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idcuenta_ventaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cuenta_venta) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_venta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_venta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_venta,lista_producto_util::$ID_CUENTA_VENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_venta);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta_venta(string $strFinalQuery,Pagination $pagination,int $id_cuenta_venta) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_venta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_venta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_venta,lista_producto_util::$ID_CUENTA_VENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_venta);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdimpuestoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_impuesto) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_impuesto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_impuesto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_impuesto,lista_producto_util::$ID_IMPUESTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_impuesto);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idimpuesto(string $strFinalQuery,Pagination $pagination,int $id_impuesto) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_impuesto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_impuesto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_impuesto,lista_producto_util::$ID_IMPUESTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_impuesto);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idimpuesto_comprasWithConnection(string $strFinalQuery,Pagination $pagination,int $id_impuesto_compras) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_impuesto_compras= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_impuesto_compras->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_impuesto_compras,lista_producto_util::$ID_IMPUESTO_COMPRAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_impuesto_compras);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idimpuesto_compras(string $strFinalQuery,Pagination $pagination,int $id_impuesto_compras) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_impuesto_compras= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_impuesto_compras->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_impuesto_compras,lista_producto_util::$ID_IMPUESTO_COMPRAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_impuesto_compras);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idimpuesto_ventasWithConnection(string $strFinalQuery,Pagination $pagination,int $id_impuesto_ventas) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_impuesto_ventas= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_impuesto_ventas->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_impuesto_ventas,lista_producto_util::$ID_IMPUESTO_VENTAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_impuesto_ventas);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idimpuesto_ventas(string $strFinalQuery,Pagination $pagination,int $id_impuesto_ventas) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_impuesto_ventas= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_impuesto_ventas->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_impuesto_ventas,lista_producto_util::$ID_IMPUESTO_VENTAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_impuesto_ventas);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idotro_impuestoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_otro_impuesto) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_otro_impuesto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_otro_impuesto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_otro_impuesto,lista_producto_util::$ID_OTRO_IMPUESTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_otro_impuesto);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idotro_impuesto(string $strFinalQuery,Pagination $pagination,int $id_otro_impuesto) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_otro_impuesto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_otro_impuesto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_otro_impuesto,lista_producto_util::$ID_OTRO_IMPUESTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_otro_impuesto);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idotro_impuesto_comprasWithConnection(string $strFinalQuery,Pagination $pagination,int $id_otro_impuesto_compras) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_otro_impuesto_compras= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_otro_impuesto_compras->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_otro_impuesto_compras,lista_producto_util::$ID_OTRO_IMPUESTO_COMPRAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_otro_impuesto_compras);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idotro_impuesto_compras(string $strFinalQuery,Pagination $pagination,int $id_otro_impuesto_compras) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_otro_impuesto_compras= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_otro_impuesto_compras->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_otro_impuesto_compras,lista_producto_util::$ID_OTRO_IMPUESTO_COMPRAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_otro_impuesto_compras);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idotro_impuesto_ventasWithConnection(string $strFinalQuery,Pagination $pagination,int $id_otro_impuesto_ventas) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_otro_impuesto_ventas= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_otro_impuesto_ventas->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_otro_impuesto_ventas,lista_producto_util::$ID_OTRO_IMPUESTO_VENTAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_otro_impuesto_ventas);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idotro_impuesto_ventas(string $strFinalQuery,Pagination $pagination,int $id_otro_impuesto_ventas) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_otro_impuesto_ventas= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_otro_impuesto_ventas->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_otro_impuesto_ventas,lista_producto_util::$ID_OTRO_IMPUESTO_VENTAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_otro_impuesto_ventas);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idotro_suplidorWithConnection(string $strFinalQuery,Pagination $pagination,int $id_otro_suplidor) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_otro_suplidor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_otro_suplidor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_otro_suplidor,lista_producto_util::$ID_OTRO_SUPLIDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_otro_suplidor);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idotro_suplidor(string $strFinalQuery,Pagination $pagination,int $id_otro_suplidor) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_otro_suplidor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_otro_suplidor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_otro_suplidor,lista_producto_util::$ID_OTRO_SUPLIDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_otro_suplidor);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);
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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,lista_producto_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);

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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,lista_producto_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdretencionWithConnection(string $strFinalQuery,Pagination $pagination,int $id_retencion) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_retencion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_retencion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_retencion,lista_producto_util::$ID_RETENCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_retencion);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idretencion(string $strFinalQuery,Pagination $pagination,int $id_retencion) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_retencion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_retencion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_retencion,lista_producto_util::$ID_RETENCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_retencion);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idretencion_comprasWithConnection(string $strFinalQuery,Pagination $pagination,int $id_retencion_compras) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_retencion_compras= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_retencion_compras->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_retencion_compras,lista_producto_util::$ID_RETENCION_COMPRAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_retencion_compras);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idretencion_compras(string $strFinalQuery,Pagination $pagination,int $id_retencion_compras) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_retencion_compras= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_retencion_compras->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_retencion_compras,lista_producto_util::$ID_RETENCION_COMPRAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_retencion_compras);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idretencion_ventasWithConnection(string $strFinalQuery,Pagination $pagination,int $id_retencion_ventas) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_retencion_ventas= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_retencion_ventas->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_retencion_ventas,lista_producto_util::$ID_RETENCION_VENTAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_retencion_ventas);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idretencion_ventas(string $strFinalQuery,Pagination $pagination,int $id_retencion_ventas) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_retencion_ventas= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_retencion_ventas->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_retencion_ventas,lista_producto_util::$ID_RETENCION_VENTAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_retencion_ventas);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idsub_categoria_productoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_sub_categoria_producto) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sub_categoria_producto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sub_categoria_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sub_categoria_producto,lista_producto_util::$ID_SUB_CATEGORIA_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sub_categoria_producto);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idsub_categoria_producto(string $strFinalQuery,Pagination $pagination,int $id_sub_categoria_producto) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sub_categoria_producto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sub_categoria_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sub_categoria_producto,lista_producto_util::$ID_SUB_CATEGORIA_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sub_categoria_producto);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtipo_productoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_tipo_producto) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_producto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_producto,lista_producto_util::$ID_TIPO_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_producto);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtipo_producto(string $strFinalQuery,Pagination $pagination,int $id_tipo_producto) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_producto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_producto,lista_producto_util::$ID_TIPO_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_producto);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idunidad_compraWithConnection(string $strFinalQuery,Pagination $pagination,int $id_unidad_compra) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_unidad_compra= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_unidad_compra->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad_compra,lista_producto_util::$ID_UNIDAD_COMPRA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad_compra);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idunidad_compra(string $strFinalQuery,Pagination $pagination,int $id_unidad_compra) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_unidad_compra= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_unidad_compra->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad_compra,lista_producto_util::$ID_UNIDAD_COMPRA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad_compra);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idunidad_ventaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_unidad_venta) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_unidad_venta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_unidad_venta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad_venta,lista_producto_util::$ID_UNIDAD_VENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad_venta);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idunidad_venta(string $strFinalQuery,Pagination $pagination,int $id_unidad_venta) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_unidad_venta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_unidad_venta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad_venta,lista_producto_util::$ID_UNIDAD_VENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad_venta);

			$this->lista_productos=$this->lista_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			//lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_productos);
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
						
			//lista_producto_logic_add::checklista_productoToSave($this->lista_producto,$this->datosCliente,$this->connexion);	       
			//lista_producto_logic_add::updatelista_productoToSave($this->lista_producto);			
			lista_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->lista_producto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->lista_productoLogicAdditional->checkGeneralEntityToSave($this,$this->lista_producto,$this->datosCliente,$this->connexion);
			
			
			lista_producto_data::save($this->lista_producto, $this->connexion);	    	       	 				
			//lista_producto_logic_add::checklista_productoToSaveAfter($this->lista_producto,$this->datosCliente,$this->connexion);			
			//$this->lista_productoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->lista_producto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->lista_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->lista_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				lista_producto_util::refrescarFKDescripcion($this->lista_producto);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->lista_producto->getIsDeleted()) {
				$this->lista_producto=null;
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
						
			/*lista_producto_logic_add::checklista_productoToSave($this->lista_producto,$this->datosCliente,$this->connexion);*/	        
			//lista_producto_logic_add::updatelista_productoToSave($this->lista_producto);			
			//$this->lista_productoLogicAdditional->checkGeneralEntityToSave($this,$this->lista_producto,$this->datosCliente,$this->connexion);			
			lista_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->lista_producto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			lista_producto_data::save($this->lista_producto, $this->connexion);	    	       	 						
			/*lista_producto_logic_add::checklista_productoToSaveAfter($this->lista_producto,$this->datosCliente,$this->connexion);*/			
			//$this->lista_productoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->lista_producto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->lista_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->lista_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				lista_producto_util::refrescarFKDescripcion($this->lista_producto);				
			}
			
			if($this->lista_producto->getIsDeleted()) {
				$this->lista_producto=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(lista_producto $lista_producto,Connexion $connexion)  {
		$lista_productoLogic = new  lista_producto_logic();		  		  
        try {		
			$lista_productoLogic->setConnexion($connexion);			
			$lista_productoLogic->setlista_producto($lista_producto);			
			$lista_productoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*lista_producto_logic_add::checklista_productoToSaves($this->lista_productos,$this->datosCliente,$this->connexion);*/	        	
			//$this->lista_productoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->lista_productos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->lista_productos as $lista_productoLocal) {				
								
				//lista_producto_logic_add::updatelista_productoToSave($lista_productoLocal);	        	
				lista_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$lista_productoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				lista_producto_data::save($lista_productoLocal, $this->connexion);				
			}
			
			/*lista_producto_logic_add::checklista_productoToSavesAfter($this->lista_productos,$this->datosCliente,$this->connexion);*/			
			//$this->lista_productoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->lista_productos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
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
			/*lista_producto_logic_add::checklista_productoToSaves($this->lista_productos,$this->datosCliente,$this->connexion);*/			
			//$this->lista_productoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->lista_productos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->lista_productos as $lista_productoLocal) {				
								
				//lista_producto_logic_add::updatelista_productoToSave($lista_productoLocal);	        	
				lista_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$lista_productoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				lista_producto_data::save($lista_productoLocal, $this->connexion);				
			}			
			
			/*lista_producto_logic_add::checklista_productoToSavesAfter($this->lista_productos,$this->datosCliente,$this->connexion);*/			
			//$this->lista_productoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->lista_productos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $lista_productos,Connexion $connexion)  {
		$lista_productoLogic = new  lista_producto_logic();
		  		  
        try {		
			$lista_productoLogic->setConnexion($connexion);			
			$lista_productoLogic->setlista_productos($lista_productos);			
			$lista_productoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$lista_productosAux=array();
		
		foreach($this->lista_productos as $lista_producto) {
			if($lista_producto->getIsDeleted()==false) {
				$lista_productosAux[]=$lista_producto;
			}
		}
		
		$this->lista_productos=$lista_productosAux;
	}
	
	public function updateToGetsAuxiliar(array &$lista_productos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->lista_productos as $lista_producto) {
				
				$lista_producto->setid_producto_Descripcion(lista_producto_util::getproductoDescripcion($lista_producto->getproducto()));
				$lista_producto->setid_unidad_compra_Descripcion(lista_producto_util::getunidad_compraDescripcion($lista_producto->getunidad_compra()));
				$lista_producto->setid_unidad_venta_Descripcion(lista_producto_util::getunidad_ventaDescripcion($lista_producto->getunidad_venta()));
				$lista_producto->setid_categoria_producto_Descripcion(lista_producto_util::getcategoria_productoDescripcion($lista_producto->getcategoria_producto()));
				$lista_producto->setid_sub_categoria_producto_Descripcion(lista_producto_util::getsub_categoria_productoDescripcion($lista_producto->getsub_categoria_producto()));
				$lista_producto->setid_tipo_producto_Descripcion(lista_producto_util::gettipo_productoDescripcion($lista_producto->gettipo_producto()));
				$lista_producto->setid_bodega_Descripcion(lista_producto_util::getbodegaDescripcion($lista_producto->getbodega()));
				$lista_producto->setid_cuenta_compra_Descripcion(lista_producto_util::getcuenta_compraDescripcion($lista_producto->getcuenta_compra()));
				$lista_producto->setid_cuenta_venta_Descripcion(lista_producto_util::getcuenta_ventaDescripcion($lista_producto->getcuenta_venta()));
				$lista_producto->setid_cuenta_inventario_Descripcion(lista_producto_util::getcuenta_inventarioDescripcion($lista_producto->getcuenta_inventario()));
				$lista_producto->setid_otro_suplidor_Descripcion(lista_producto_util::getotro_suplidorDescripcion($lista_producto->getotro_suplidor()));
				$lista_producto->setid_impuesto_Descripcion(lista_producto_util::getimpuestoDescripcion($lista_producto->getimpuesto()));
				$lista_producto->setid_impuesto_ventas_Descripcion(lista_producto_util::getimpuesto_ventasDescripcion($lista_producto->getimpuesto_ventas()));
				$lista_producto->setid_impuesto_compras_Descripcion(lista_producto_util::getimpuesto_comprasDescripcion($lista_producto->getimpuesto_compras()));
				$lista_producto->setid_otro_impuesto_Descripcion(lista_producto_util::getotro_impuestoDescripcion($lista_producto->getotro_impuesto()));
				$lista_producto->setid_otro_impuesto_ventas_Descripcion(lista_producto_util::getotro_impuesto_ventasDescripcion($lista_producto->getotro_impuesto_ventas()));
				$lista_producto->setid_otro_impuesto_compras_Descripcion(lista_producto_util::getotro_impuesto_comprasDescripcion($lista_producto->getotro_impuesto_compras()));
				$lista_producto->setid_retencion_Descripcion(lista_producto_util::getretencionDescripcion($lista_producto->getretencion()));
				$lista_producto->setid_retencion_ventas_Descripcion(lista_producto_util::getretencion_ventasDescripcion($lista_producto->getretencion_ventas()));
				$lista_producto->setid_retencion_compras_Descripcion(lista_producto_util::getretencion_comprasDescripcion($lista_producto->getretencion_compras()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$lista_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$lista_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$lista_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$lista_productoForeignKey=new lista_producto_param_return();//lista_productoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombosproductosFK($this->connexion,$strRecargarFkQuery,$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_unidad_compra',$strRecargarFkTipos,',')) {
				$this->cargarCombosunidad_comprasFK($this->connexion,$strRecargarFkQuery,$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_unidad_venta',$strRecargarFkTipos,',')) {
				$this->cargarCombosunidad_ventasFK($this->connexion,$strRecargarFkQuery,$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_categoria_producto',$strRecargarFkTipos,',')) {
				$this->cargarComboscategoria_productosFK($this->connexion,$strRecargarFkQuery,$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sub_categoria_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombossub_categoria_productosFK($this->connexion,$strRecargarFkQuery,$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_productosFK($this->connexion,$strRecargarFkQuery,$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTipos,',')) {
				$this->cargarCombosbodegasFK($this->connexion,$strRecargarFkQuery,$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_compra',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_comprasFK($this->connexion,$strRecargarFkQuery,$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_venta',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_ventasFK($this->connexion,$strRecargarFkQuery,$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_inventario',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_inventariosFK($this->connexion,$strRecargarFkQuery,$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_otro_suplidor',$strRecargarFkTipos,',')) {
				$this->cargarCombosotro_suplidorsFK($this->connexion,$strRecargarFkQuery,$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_impuesto',$strRecargarFkTipos,',')) {
				$this->cargarCombosimpuestosFK($this->connexion,$strRecargarFkQuery,$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_impuesto_ventas',$strRecargarFkTipos,',')) {
				$this->cargarCombosimpuesto_ventassFK($this->connexion,$strRecargarFkQuery,$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_impuesto_compras',$strRecargarFkTipos,',')) {
				$this->cargarCombosimpuesto_comprassFK($this->connexion,$strRecargarFkQuery,$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_otro_impuesto',$strRecargarFkTipos,',')) {
				$this->cargarCombosotro_impuestosFK($this->connexion,$strRecargarFkQuery,$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_otro_impuesto_ventas',$strRecargarFkTipos,',')) {
				$this->cargarCombosotro_impuesto_ventassFK($this->connexion,$strRecargarFkQuery,$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_otro_impuesto_compras',$strRecargarFkTipos,',')) {
				$this->cargarCombosotro_impuesto_comprassFK($this->connexion,$strRecargarFkQuery,$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_retencion',$strRecargarFkTipos,',')) {
				$this->cargarCombosretencionsFK($this->connexion,$strRecargarFkQuery,$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_retencion_ventas',$strRecargarFkTipos,',')) {
				$this->cargarCombosretencion_ventassFK($this->connexion,$strRecargarFkQuery,$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_retencion_compras',$strRecargarFkTipos,',')) {
				$this->cargarCombosretencion_comprassFK($this->connexion,$strRecargarFkQuery,$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproductosFK($this->connexion,' where id=-1 ',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_unidad_compra',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosunidad_comprasFK($this->connexion,' where id=-1 ',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_unidad_venta',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosunidad_ventasFK($this->connexion,' where id=-1 ',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_categoria_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscategoria_productosFK($this->connexion,' where id=-1 ',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sub_categoria_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossub_categoria_productosFK($this->connexion,' where id=-1 ',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_productosFK($this->connexion,' where id=-1 ',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosbodegasFK($this->connexion,' where id=-1 ',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_compra',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_comprasFK($this->connexion,' where id=-1 ',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_venta',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_ventasFK($this->connexion,' where id=-1 ',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_inventario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_inventariosFK($this->connexion,' where id=-1 ',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_otro_suplidor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosotro_suplidorsFK($this->connexion,' where id=-1 ',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_impuesto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosimpuestosFK($this->connexion,' where id=-1 ',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_impuesto_ventas',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosimpuesto_ventassFK($this->connexion,' where id=-1 ',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_impuesto_compras',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosimpuesto_comprassFK($this->connexion,' where id=-1 ',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_otro_impuesto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosotro_impuestosFK($this->connexion,' where id=-1 ',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_otro_impuesto_ventas',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosotro_impuesto_ventassFK($this->connexion,' where id=-1 ',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_otro_impuesto_compras',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosotro_impuesto_comprassFK($this->connexion,' where id=-1 ',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_retencion',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosretencionsFK($this->connexion,' where id=-1 ',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_retencion_ventas',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosretencion_ventassFK($this->connexion,' where id=-1 ',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_retencion_compras',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosretencion_comprassFK($this->connexion,' where id=-1 ',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $lista_productoForeignKey;
			
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
	
	
	public function cargarCombosproductosFK($connexion=null,$strRecargarFkQuery='',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$lista_productoForeignKey->productosFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionproducto!=true) {
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
				if($lista_productoForeignKey->idproductoDefaultFK==0) {
					$lista_productoForeignKey->idproductoDefaultFK=$productoLocal->getId();
				}

				$lista_productoForeignKey->productosFK[$productoLocal->getId()]=lista_producto_util::getproductoDescripcion($productoLocal);
			}

		} else {

			if($lista_producto_session->bigidproductoActual!=null && $lista_producto_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($lista_producto_session->bigidproductoActual);//WithConnection

				$lista_productoForeignKey->productosFK[$productoLogic->getproducto()->getId()]=lista_producto_util::getproductoDescripcion($productoLogic->getproducto());
				$lista_productoForeignKey->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	public function cargarCombosunidad_comprasFK($connexion=null,$strRecargarFkQuery='',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$unidadLogic= new unidad_logic();
		$pagination= new Pagination();
		$lista_productoForeignKey->unidad_comprasFK=array();

		$unidadLogic->setConnexion($connexion);
		$unidadLogic->getunidadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionunidad_compra!=true) {
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
				if($lista_productoForeignKey->idunidad_compraDefaultFK==0) {
					$lista_productoForeignKey->idunidad_compraDefaultFK=$unidadLocal->getId();
				}

				$lista_productoForeignKey->unidad_comprasFK[$unidadLocal->getId()]=lista_producto_util::getunidad_compraDescripcion($unidadLocal);
			}

		} else {

			if($lista_producto_session->bigidunidad_compraActual!=null && $lista_producto_session->bigidunidad_compraActual > 0) {
				$unidadLogic->getEntity($lista_producto_session->bigidunidad_compraActual);//WithConnection

				$lista_productoForeignKey->unidad_comprasFK[$unidadLogic->getunidad()->getId()]=lista_producto_util::getunidad_compraDescripcion($unidadLogic->getunidad());
				$lista_productoForeignKey->idunidad_compraDefaultFK=$unidadLogic->getunidad()->getId();
			}
		}
	}

	public function cargarCombosunidad_ventasFK($connexion=null,$strRecargarFkQuery='',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$unidadLogic= new unidad_logic();
		$pagination= new Pagination();
		$lista_productoForeignKey->unidad_ventasFK=array();

		$unidadLogic->setConnexion($connexion);
		$unidadLogic->getunidadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionunidad_venta!=true) {
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
				if($lista_productoForeignKey->idunidad_ventaDefaultFK==0) {
					$lista_productoForeignKey->idunidad_ventaDefaultFK=$unidadLocal->getId();
				}

				$lista_productoForeignKey->unidad_ventasFK[$unidadLocal->getId()]=lista_producto_util::getunidad_ventaDescripcion($unidadLocal);
			}

		} else {

			if($lista_producto_session->bigidunidad_ventaActual!=null && $lista_producto_session->bigidunidad_ventaActual > 0) {
				$unidadLogic->getEntity($lista_producto_session->bigidunidad_ventaActual);//WithConnection

				$lista_productoForeignKey->unidad_ventasFK[$unidadLogic->getunidad()->getId()]=lista_producto_util::getunidad_ventaDescripcion($unidadLogic->getunidad());
				$lista_productoForeignKey->idunidad_ventaDefaultFK=$unidadLogic->getunidad()->getId();
			}
		}
	}

	public function cargarComboscategoria_productosFK($connexion=null,$strRecargarFkQuery='',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$categoria_productoLogic= new categoria_producto_logic();
		$pagination= new Pagination();
		$lista_productoForeignKey->categoria_productosFK=array();

		$categoria_productoLogic->setConnexion($connexion);
		$categoria_productoLogic->getcategoria_productoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesioncategoria_producto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=categoria_producto_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcategoria_producto=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcategoria_producto=Funciones::GetFinalQueryAppend($finalQueryGlobalcategoria_producto, '');
				$finalQueryGlobalcategoria_producto.=categoria_producto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcategoria_producto.$strRecargarFkQuery;		

				$categoria_productoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($categoria_productoLogic->getcategoria_productos() as $categoria_productoLocal ) {
				if($lista_productoForeignKey->idcategoria_productoDefaultFK==0) {
					$lista_productoForeignKey->idcategoria_productoDefaultFK=$categoria_productoLocal->getId();
				}

				$lista_productoForeignKey->categoria_productosFK[$categoria_productoLocal->getId()]=lista_producto_util::getcategoria_productoDescripcion($categoria_productoLocal);
			}

		} else {

			if($lista_producto_session->bigidcategoria_productoActual!=null && $lista_producto_session->bigidcategoria_productoActual > 0) {
				$categoria_productoLogic->getEntity($lista_producto_session->bigidcategoria_productoActual);//WithConnection

				$lista_productoForeignKey->categoria_productosFK[$categoria_productoLogic->getcategoria_producto()->getId()]=lista_producto_util::getcategoria_productoDescripcion($categoria_productoLogic->getcategoria_producto());
				$lista_productoForeignKey->idcategoria_productoDefaultFK=$categoria_productoLogic->getcategoria_producto()->getId();
			}
		}
	}

	public function cargarCombossub_categoria_productosFK($connexion=null,$strRecargarFkQuery='',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sub_categoria_productoLogic= new sub_categoria_producto_logic();
		$pagination= new Pagination();
		$lista_productoForeignKey->sub_categoria_productosFK=array();

		$sub_categoria_productoLogic->setConnexion($connexion);
		$sub_categoria_productoLogic->getsub_categoria_productoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionsub_categoria_producto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=sub_categoria_producto_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalsub_categoria_producto=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalsub_categoria_producto=Funciones::GetFinalQueryAppend($finalQueryGlobalsub_categoria_producto, '');
				$finalQueryGlobalsub_categoria_producto.=sub_categoria_producto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalsub_categoria_producto.$strRecargarFkQuery;		

				$sub_categoria_productoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($sub_categoria_productoLogic->getsub_categoria_productos() as $sub_categoria_productoLocal ) {
				if($lista_productoForeignKey->idsub_categoria_productoDefaultFK==0) {
					$lista_productoForeignKey->idsub_categoria_productoDefaultFK=$sub_categoria_productoLocal->getId();
				}

				$lista_productoForeignKey->sub_categoria_productosFK[$sub_categoria_productoLocal->getId()]=lista_producto_util::getsub_categoria_productoDescripcion($sub_categoria_productoLocal);
			}

		} else {

			if($lista_producto_session->bigidsub_categoria_productoActual!=null && $lista_producto_session->bigidsub_categoria_productoActual > 0) {
				$sub_categoria_productoLogic->getEntity($lista_producto_session->bigidsub_categoria_productoActual);//WithConnection

				$lista_productoForeignKey->sub_categoria_productosFK[$sub_categoria_productoLogic->getsub_categoria_producto()->getId()]=lista_producto_util::getsub_categoria_productoDescripcion($sub_categoria_productoLogic->getsub_categoria_producto());
				$lista_productoForeignKey->idsub_categoria_productoDefaultFK=$sub_categoria_productoLogic->getsub_categoria_producto()->getId();
			}
		}
	}

	public function cargarCombostipo_productosFK($connexion=null,$strRecargarFkQuery='',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_productoLogic= new tipo_producto_logic();
		$pagination= new Pagination();
		$lista_productoForeignKey->tipo_productosFK=array();

		$tipo_productoLogic->setConnexion($connexion);
		$tipo_productoLogic->gettipo_productoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesiontipo_producto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_producto_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltipo_producto=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_producto=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_producto, '');
				$finalQueryGlobaltipo_producto.=tipo_producto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_producto.$strRecargarFkQuery;		

				$tipo_productoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($tipo_productoLogic->gettipo_productos() as $tipo_productoLocal ) {
				if($lista_productoForeignKey->idtipo_productoDefaultFK==0) {
					$lista_productoForeignKey->idtipo_productoDefaultFK=$tipo_productoLocal->getId();
				}

				$lista_productoForeignKey->tipo_productosFK[$tipo_productoLocal->getId()]=lista_producto_util::gettipo_productoDescripcion($tipo_productoLocal);
			}

		} else {

			if($lista_producto_session->bigidtipo_productoActual!=null && $lista_producto_session->bigidtipo_productoActual > 0) {
				$tipo_productoLogic->getEntity($lista_producto_session->bigidtipo_productoActual);//WithConnection

				$lista_productoForeignKey->tipo_productosFK[$tipo_productoLogic->gettipo_producto()->getId()]=lista_producto_util::gettipo_productoDescripcion($tipo_productoLogic->gettipo_producto());
				$lista_productoForeignKey->idtipo_productoDefaultFK=$tipo_productoLogic->gettipo_producto()->getId();
			}
		}
	}

	public function cargarCombosbodegasFK($connexion=null,$strRecargarFkQuery='',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$lista_productoForeignKey->bodegasFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionbodega!=true) {
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
				if($lista_productoForeignKey->idbodegaDefaultFK==0) {
					$lista_productoForeignKey->idbodegaDefaultFK=$bodegaLocal->getId();
				}

				$lista_productoForeignKey->bodegasFK[$bodegaLocal->getId()]=lista_producto_util::getbodegaDescripcion($bodegaLocal);
			}

		} else {

			if($lista_producto_session->bigidbodegaActual!=null && $lista_producto_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($lista_producto_session->bigidbodegaActual);//WithConnection

				$lista_productoForeignKey->bodegasFK[$bodegaLogic->getbodega()->getId()]=lista_producto_util::getbodegaDescripcion($bodegaLogic->getbodega());
				$lista_productoForeignKey->idbodegaDefaultFK=$bodegaLogic->getbodega()->getId();
			}
		}
	}

	public function cargarComboscuenta_comprasFK($connexion=null,$strRecargarFkQuery='',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$lista_productoForeignKey->cuenta_comprasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesioncuenta_compra!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcuenta=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta, '');
				$finalQueryGlobalcuenta.=cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta.$strRecargarFkQuery;		

				$cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($cuentaLogic->getcuentas() as $cuentaLocal ) {
				if($lista_productoForeignKey->idcuenta_compraDefaultFK==0) {
					$lista_productoForeignKey->idcuenta_compraDefaultFK=$cuentaLocal->getId();
				}

				$lista_productoForeignKey->cuenta_comprasFK[$cuentaLocal->getId()]=lista_producto_util::getcuenta_compraDescripcion($cuentaLocal);
			}

		} else {

			if($lista_producto_session->bigidcuenta_compraActual!=null && $lista_producto_session->bigidcuenta_compraActual > 0) {
				$cuentaLogic->getEntity($lista_producto_session->bigidcuenta_compraActual);//WithConnection

				$lista_productoForeignKey->cuenta_comprasFK[$cuentaLogic->getcuenta()->getId()]=lista_producto_util::getcuenta_compraDescripcion($cuentaLogic->getcuenta());
				$lista_productoForeignKey->idcuenta_compraDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarComboscuenta_ventasFK($connexion=null,$strRecargarFkQuery='',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$lista_productoForeignKey->cuenta_ventasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesioncuenta_venta!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcuenta=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta, '');
				$finalQueryGlobalcuenta.=cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta.$strRecargarFkQuery;		

				$cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($cuentaLogic->getcuentas() as $cuentaLocal ) {
				if($lista_productoForeignKey->idcuenta_ventaDefaultFK==0) {
					$lista_productoForeignKey->idcuenta_ventaDefaultFK=$cuentaLocal->getId();
				}

				$lista_productoForeignKey->cuenta_ventasFK[$cuentaLocal->getId()]=lista_producto_util::getcuenta_ventaDescripcion($cuentaLocal);
			}

		} else {

			if($lista_producto_session->bigidcuenta_ventaActual!=null && $lista_producto_session->bigidcuenta_ventaActual > 0) {
				$cuentaLogic->getEntity($lista_producto_session->bigidcuenta_ventaActual);//WithConnection

				$lista_productoForeignKey->cuenta_ventasFK[$cuentaLogic->getcuenta()->getId()]=lista_producto_util::getcuenta_ventaDescripcion($cuentaLogic->getcuenta());
				$lista_productoForeignKey->idcuenta_ventaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarComboscuenta_inventariosFK($connexion=null,$strRecargarFkQuery='',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$lista_productoForeignKey->cuenta_inventariosFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesioncuenta_inventario!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcuenta=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta, '');
				$finalQueryGlobalcuenta.=cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta.$strRecargarFkQuery;		

				$cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($cuentaLogic->getcuentas() as $cuentaLocal ) {
				if($lista_productoForeignKey->idcuenta_inventarioDefaultFK==0) {
					$lista_productoForeignKey->idcuenta_inventarioDefaultFK=$cuentaLocal->getId();
				}

				$lista_productoForeignKey->cuenta_inventariosFK[$cuentaLocal->getId()]=lista_producto_util::getcuenta_inventarioDescripcion($cuentaLocal);
			}

		} else {

			if($lista_producto_session->bigidcuenta_inventarioActual!=null && $lista_producto_session->bigidcuenta_inventarioActual > 0) {
				$cuentaLogic->getEntity($lista_producto_session->bigidcuenta_inventarioActual);//WithConnection

				$lista_productoForeignKey->cuenta_inventariosFK[$cuentaLogic->getcuenta()->getId()]=lista_producto_util::getcuenta_inventarioDescripcion($cuentaLogic->getcuenta());
				$lista_productoForeignKey->idcuenta_inventarioDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarCombosotro_suplidorsFK($connexion=null,$strRecargarFkQuery='',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$otro_suplidorLogic= new otro_suplidor_logic();
		$pagination= new Pagination();
		$lista_productoForeignKey->otro_suplidorsFK=array();

		$otro_suplidorLogic->setConnexion($connexion);
		$otro_suplidorLogic->getotro_suplidorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionotro_suplidor!=true) {
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
				if($lista_productoForeignKey->idotro_suplidorDefaultFK==0) {
					$lista_productoForeignKey->idotro_suplidorDefaultFK=$otro_suplidorLocal->getId();
				}

				$lista_productoForeignKey->otro_suplidorsFK[$otro_suplidorLocal->getId()]=lista_producto_util::getotro_suplidorDescripcion($otro_suplidorLocal);
			}

		} else {

			if($lista_producto_session->bigidotro_suplidorActual!=null && $lista_producto_session->bigidotro_suplidorActual > 0) {
				$otro_suplidorLogic->getEntity($lista_producto_session->bigidotro_suplidorActual);//WithConnection

				$lista_productoForeignKey->otro_suplidorsFK[$otro_suplidorLogic->getotro_suplidor()->getId()]=lista_producto_util::getotro_suplidorDescripcion($otro_suplidorLogic->getotro_suplidor());
				$lista_productoForeignKey->idotro_suplidorDefaultFK=$otro_suplidorLogic->getotro_suplidor()->getId();
			}
		}
	}

	public function cargarCombosimpuestosFK($connexion=null,$strRecargarFkQuery='',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$impuestoLogic= new impuesto_logic();
		$pagination= new Pagination();
		$lista_productoForeignKey->impuestosFK=array();

		$impuestoLogic->setConnexion($connexion);
		$impuestoLogic->getimpuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionimpuesto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=impuesto_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalimpuesto=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalimpuesto=Funciones::GetFinalQueryAppend($finalQueryGlobalimpuesto, '');
				$finalQueryGlobalimpuesto.=impuesto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalimpuesto.$strRecargarFkQuery;		

				$impuestoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($impuestoLogic->getimpuestos() as $impuestoLocal ) {
				if($lista_productoForeignKey->idimpuestoDefaultFK==0) {
					$lista_productoForeignKey->idimpuestoDefaultFK=$impuestoLocal->getId();
				}

				$lista_productoForeignKey->impuestosFK[$impuestoLocal->getId()]=lista_producto_util::getimpuestoDescripcion($impuestoLocal);
			}

		} else {

			if($lista_producto_session->bigidimpuestoActual!=null && $lista_producto_session->bigidimpuestoActual > 0) {
				$impuestoLogic->getEntity($lista_producto_session->bigidimpuestoActual);//WithConnection

				$lista_productoForeignKey->impuestosFK[$impuestoLogic->getimpuesto()->getId()]=lista_producto_util::getimpuestoDescripcion($impuestoLogic->getimpuesto());
				$lista_productoForeignKey->idimpuestoDefaultFK=$impuestoLogic->getimpuesto()->getId();
			}
		}
	}

	public function cargarCombosimpuesto_ventassFK($connexion=null,$strRecargarFkQuery='',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$impuestoLogic= new impuesto_logic();
		$pagination= new Pagination();
		$lista_productoForeignKey->impuesto_ventassFK=array();

		$impuestoLogic->setConnexion($connexion);
		$impuestoLogic->getimpuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionimpuesto_ventas!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=impuesto_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalimpuesto=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalimpuesto=Funciones::GetFinalQueryAppend($finalQueryGlobalimpuesto, '');
				$finalQueryGlobalimpuesto.=impuesto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalimpuesto.$strRecargarFkQuery;		

				$impuestoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($impuestoLogic->getimpuestos() as $impuestoLocal ) {
				if($lista_productoForeignKey->idimpuesto_ventasDefaultFK==0) {
					$lista_productoForeignKey->idimpuesto_ventasDefaultFK=$impuestoLocal->getId();
				}

				$lista_productoForeignKey->impuesto_ventassFK[$impuestoLocal->getId()]=lista_producto_util::getimpuesto_ventasDescripcion($impuestoLocal);
			}

		} else {

			if($lista_producto_session->bigidimpuesto_ventasActual!=null && $lista_producto_session->bigidimpuesto_ventasActual > 0) {
				$impuestoLogic->getEntity($lista_producto_session->bigidimpuesto_ventasActual);//WithConnection

				$lista_productoForeignKey->impuesto_ventassFK[$impuestoLogic->getimpuesto()->getId()]=lista_producto_util::getimpuesto_ventasDescripcion($impuestoLogic->getimpuesto());
				$lista_productoForeignKey->idimpuesto_ventasDefaultFK=$impuestoLogic->getimpuesto()->getId();
			}
		}
	}

	public function cargarCombosimpuesto_comprassFK($connexion=null,$strRecargarFkQuery='',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$impuestoLogic= new impuesto_logic();
		$pagination= new Pagination();
		$lista_productoForeignKey->impuesto_comprassFK=array();

		$impuestoLogic->setConnexion($connexion);
		$impuestoLogic->getimpuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionimpuesto_compras!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=impuesto_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalimpuesto=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalimpuesto=Funciones::GetFinalQueryAppend($finalQueryGlobalimpuesto, '');
				$finalQueryGlobalimpuesto.=impuesto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalimpuesto.$strRecargarFkQuery;		

				$impuestoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($impuestoLogic->getimpuestos() as $impuestoLocal ) {
				if($lista_productoForeignKey->idimpuesto_comprasDefaultFK==0) {
					$lista_productoForeignKey->idimpuesto_comprasDefaultFK=$impuestoLocal->getId();
				}

				$lista_productoForeignKey->impuesto_comprassFK[$impuestoLocal->getId()]=lista_producto_util::getimpuesto_comprasDescripcion($impuestoLocal);
			}

		} else {

			if($lista_producto_session->bigidimpuesto_comprasActual!=null && $lista_producto_session->bigidimpuesto_comprasActual > 0) {
				$impuestoLogic->getEntity($lista_producto_session->bigidimpuesto_comprasActual);//WithConnection

				$lista_productoForeignKey->impuesto_comprassFK[$impuestoLogic->getimpuesto()->getId()]=lista_producto_util::getimpuesto_comprasDescripcion($impuestoLogic->getimpuesto());
				$lista_productoForeignKey->idimpuesto_comprasDefaultFK=$impuestoLogic->getimpuesto()->getId();
			}
		}
	}

	public function cargarCombosotro_impuestosFK($connexion=null,$strRecargarFkQuery='',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$otro_impuestoLogic= new otro_impuesto_logic();
		$pagination= new Pagination();
		$lista_productoForeignKey->otro_impuestosFK=array();

		$otro_impuestoLogic->setConnexion($connexion);
		$otro_impuestoLogic->getotro_impuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionotro_impuesto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=otro_impuesto_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalotro_impuesto=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalotro_impuesto=Funciones::GetFinalQueryAppend($finalQueryGlobalotro_impuesto, '');
				$finalQueryGlobalotro_impuesto.=otro_impuesto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalotro_impuesto.$strRecargarFkQuery;		

				$otro_impuestoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($otro_impuestoLogic->getotro_impuestos() as $otro_impuestoLocal ) {
				if($lista_productoForeignKey->idotro_impuestoDefaultFK==0) {
					$lista_productoForeignKey->idotro_impuestoDefaultFK=$otro_impuestoLocal->getId();
				}

				$lista_productoForeignKey->otro_impuestosFK[$otro_impuestoLocal->getId()]=lista_producto_util::getotro_impuestoDescripcion($otro_impuestoLocal);
			}

		} else {

			if($lista_producto_session->bigidotro_impuestoActual!=null && $lista_producto_session->bigidotro_impuestoActual > 0) {
				$otro_impuestoLogic->getEntity($lista_producto_session->bigidotro_impuestoActual);//WithConnection

				$lista_productoForeignKey->otro_impuestosFK[$otro_impuestoLogic->getotro_impuesto()->getId()]=lista_producto_util::getotro_impuestoDescripcion($otro_impuestoLogic->getotro_impuesto());
				$lista_productoForeignKey->idotro_impuestoDefaultFK=$otro_impuestoLogic->getotro_impuesto()->getId();
			}
		}
	}

	public function cargarCombosotro_impuesto_ventassFK($connexion=null,$strRecargarFkQuery='',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$otro_impuestoLogic= new otro_impuesto_logic();
		$pagination= new Pagination();
		$lista_productoForeignKey->otro_impuesto_ventassFK=array();

		$otro_impuestoLogic->setConnexion($connexion);
		$otro_impuestoLogic->getotro_impuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionotro_impuesto_ventas!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=otro_impuesto_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalotro_impuesto=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalotro_impuesto=Funciones::GetFinalQueryAppend($finalQueryGlobalotro_impuesto, '');
				$finalQueryGlobalotro_impuesto.=otro_impuesto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalotro_impuesto.$strRecargarFkQuery;		

				$otro_impuestoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($otro_impuestoLogic->getotro_impuestos() as $otro_impuestoLocal ) {
				if($lista_productoForeignKey->idotro_impuesto_ventasDefaultFK==0) {
					$lista_productoForeignKey->idotro_impuesto_ventasDefaultFK=$otro_impuestoLocal->getId();
				}

				$lista_productoForeignKey->otro_impuesto_ventassFK[$otro_impuestoLocal->getId()]=lista_producto_util::getotro_impuesto_ventasDescripcion($otro_impuestoLocal);
			}

		} else {

			if($lista_producto_session->bigidotro_impuesto_ventasActual!=null && $lista_producto_session->bigidotro_impuesto_ventasActual > 0) {
				$otro_impuestoLogic->getEntity($lista_producto_session->bigidotro_impuesto_ventasActual);//WithConnection

				$lista_productoForeignKey->otro_impuesto_ventassFK[$otro_impuestoLogic->getotro_impuesto()->getId()]=lista_producto_util::getotro_impuesto_ventasDescripcion($otro_impuestoLogic->getotro_impuesto());
				$lista_productoForeignKey->idotro_impuesto_ventasDefaultFK=$otro_impuestoLogic->getotro_impuesto()->getId();
			}
		}
	}

	public function cargarCombosotro_impuesto_comprassFK($connexion=null,$strRecargarFkQuery='',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$otro_impuestoLogic= new otro_impuesto_logic();
		$pagination= new Pagination();
		$lista_productoForeignKey->otro_impuesto_comprassFK=array();

		$otro_impuestoLogic->setConnexion($connexion);
		$otro_impuestoLogic->getotro_impuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionotro_impuesto_compras!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=otro_impuesto_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalotro_impuesto=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalotro_impuesto=Funciones::GetFinalQueryAppend($finalQueryGlobalotro_impuesto, '');
				$finalQueryGlobalotro_impuesto.=otro_impuesto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalotro_impuesto.$strRecargarFkQuery;		

				$otro_impuestoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($otro_impuestoLogic->getotro_impuestos() as $otro_impuestoLocal ) {
				if($lista_productoForeignKey->idotro_impuesto_comprasDefaultFK==0) {
					$lista_productoForeignKey->idotro_impuesto_comprasDefaultFK=$otro_impuestoLocal->getId();
				}

				$lista_productoForeignKey->otro_impuesto_comprassFK[$otro_impuestoLocal->getId()]=lista_producto_util::getotro_impuesto_comprasDescripcion($otro_impuestoLocal);
			}

		} else {

			if($lista_producto_session->bigidotro_impuesto_comprasActual!=null && $lista_producto_session->bigidotro_impuesto_comprasActual > 0) {
				$otro_impuestoLogic->getEntity($lista_producto_session->bigidotro_impuesto_comprasActual);//WithConnection

				$lista_productoForeignKey->otro_impuesto_comprassFK[$otro_impuestoLogic->getotro_impuesto()->getId()]=lista_producto_util::getotro_impuesto_comprasDescripcion($otro_impuestoLogic->getotro_impuesto());
				$lista_productoForeignKey->idotro_impuesto_comprasDefaultFK=$otro_impuestoLogic->getotro_impuesto()->getId();
			}
		}
	}

	public function cargarCombosretencionsFK($connexion=null,$strRecargarFkQuery='',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$retencionLogic= new retencion_logic();
		$pagination= new Pagination();
		$lista_productoForeignKey->retencionsFK=array();

		$retencionLogic->setConnexion($connexion);
		$retencionLogic->getretencionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionretencion!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=retencion_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalretencion=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalretencion=Funciones::GetFinalQueryAppend($finalQueryGlobalretencion, '');
				$finalQueryGlobalretencion.=retencion_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalretencion.$strRecargarFkQuery;		

				$retencionLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($retencionLogic->getretencions() as $retencionLocal ) {
				if($lista_productoForeignKey->idretencionDefaultFK==0) {
					$lista_productoForeignKey->idretencionDefaultFK=$retencionLocal->getId();
				}

				$lista_productoForeignKey->retencionsFK[$retencionLocal->getId()]=lista_producto_util::getretencionDescripcion($retencionLocal);
			}

		} else {

			if($lista_producto_session->bigidretencionActual!=null && $lista_producto_session->bigidretencionActual > 0) {
				$retencionLogic->getEntity($lista_producto_session->bigidretencionActual);//WithConnection

				$lista_productoForeignKey->retencionsFK[$retencionLogic->getretencion()->getId()]=lista_producto_util::getretencionDescripcion($retencionLogic->getretencion());
				$lista_productoForeignKey->idretencionDefaultFK=$retencionLogic->getretencion()->getId();
			}
		}
	}

	public function cargarCombosretencion_ventassFK($connexion=null,$strRecargarFkQuery='',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$retencionLogic= new retencion_logic();
		$pagination= new Pagination();
		$lista_productoForeignKey->retencion_ventassFK=array();

		$retencionLogic->setConnexion($connexion);
		$retencionLogic->getretencionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionretencion_ventas!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=retencion_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalretencion=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalretencion=Funciones::GetFinalQueryAppend($finalQueryGlobalretencion, '');
				$finalQueryGlobalretencion.=retencion_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalretencion.$strRecargarFkQuery;		

				$retencionLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($retencionLogic->getretencions() as $retencionLocal ) {
				if($lista_productoForeignKey->idretencion_ventasDefaultFK==0) {
					$lista_productoForeignKey->idretencion_ventasDefaultFK=$retencionLocal->getId();
				}

				$lista_productoForeignKey->retencion_ventassFK[$retencionLocal->getId()]=lista_producto_util::getretencion_ventasDescripcion($retencionLocal);
			}

		} else {

			if($lista_producto_session->bigidretencion_ventasActual!=null && $lista_producto_session->bigidretencion_ventasActual > 0) {
				$retencionLogic->getEntity($lista_producto_session->bigidretencion_ventasActual);//WithConnection

				$lista_productoForeignKey->retencion_ventassFK[$retencionLogic->getretencion()->getId()]=lista_producto_util::getretencion_ventasDescripcion($retencionLogic->getretencion());
				$lista_productoForeignKey->idretencion_ventasDefaultFK=$retencionLogic->getretencion()->getId();
			}
		}
	}

	public function cargarCombosretencion_comprassFK($connexion=null,$strRecargarFkQuery='',$lista_productoForeignKey,$lista_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$retencionLogic= new retencion_logic();
		$pagination= new Pagination();
		$lista_productoForeignKey->retencion_comprassFK=array();

		$retencionLogic->setConnexion($connexion);
		$retencionLogic->getretencionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionretencion_compras!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=retencion_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalretencion=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalretencion=Funciones::GetFinalQueryAppend($finalQueryGlobalretencion, '');
				$finalQueryGlobalretencion.=retencion_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalretencion.$strRecargarFkQuery;		

				$retencionLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($retencionLogic->getretencions() as $retencionLocal ) {
				if($lista_productoForeignKey->idretencion_comprasDefaultFK==0) {
					$lista_productoForeignKey->idretencion_comprasDefaultFK=$retencionLocal->getId();
				}

				$lista_productoForeignKey->retencion_comprassFK[$retencionLocal->getId()]=lista_producto_util::getretencion_comprasDescripcion($retencionLocal);
			}

		} else {

			if($lista_producto_session->bigidretencion_comprasActual!=null && $lista_producto_session->bigidretencion_comprasActual > 0) {
				$retencionLogic->getEntity($lista_producto_session->bigidretencion_comprasActual);//WithConnection

				$lista_productoForeignKey->retencion_comprassFK[$retencionLogic->getretencion()->getId()]=lista_producto_util::getretencion_comprasDescripcion($retencionLogic->getretencion());
				$lista_productoForeignKey->idretencion_comprasDefaultFK=$retencionLogic->getretencion()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($lista_producto) {
		$this->saveRelacionesBase($lista_producto,true);
	}

	public function saveRelaciones($lista_producto) {
		$this->saveRelacionesBase($lista_producto,false);
	}

	public function saveRelacionesBase($lista_producto,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setlista_producto($lista_producto);

			if(true) {

				//lista_producto_logic_add::updateRelacionesToSave($lista_producto,$this);

				if(($this->lista_producto->getIsNew() || $this->lista_producto->getIsChanged()) && !$this->lista_producto->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->lista_producto->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//lista_producto_logic_add::updateRelacionesToSaveAfter($lista_producto,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $lista_productos,lista_producto_param_return $lista_productoParameterGeneral) : lista_producto_param_return {
		$lista_productoReturnGeneral=new lista_producto_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $lista_productoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $lista_productos,lista_producto_param_return $lista_productoParameterGeneral) : lista_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$lista_productoReturnGeneral=new lista_producto_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $lista_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $lista_productos,lista_producto $lista_producto,lista_producto_param_return $lista_productoParameterGeneral,bool $isEsNuevolista_producto,array $clases) : lista_producto_param_return {
		 try {	
			$lista_productoReturnGeneral=new lista_producto_param_return();
	
			$lista_productoReturnGeneral->setlista_producto($lista_producto);
			$lista_productoReturnGeneral->setlista_productos($lista_productos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$lista_productoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $lista_productoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $lista_productos,lista_producto $lista_producto,lista_producto_param_return $lista_productoParameterGeneral,bool $isEsNuevolista_producto,array $clases) : lista_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$lista_productoReturnGeneral=new lista_producto_param_return();
	
			$lista_productoReturnGeneral->setlista_producto($lista_producto);
			$lista_productoReturnGeneral->setlista_productos($lista_productos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$lista_productoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $lista_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $lista_productos,lista_producto $lista_producto,lista_producto_param_return $lista_productoParameterGeneral,bool $isEsNuevolista_producto,array $clases) : lista_producto_param_return {
		 try {	
			$lista_productoReturnGeneral=new lista_producto_param_return();
	
			$lista_productoReturnGeneral->setlista_producto($lista_producto);
			$lista_productoReturnGeneral->setlista_productos($lista_productos);
			
			
			
			return $lista_productoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $lista_productos,lista_producto $lista_producto,lista_producto_param_return $lista_productoParameterGeneral,bool $isEsNuevolista_producto,array $clases) : lista_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$lista_productoReturnGeneral=new lista_producto_param_return();
	
			$lista_productoReturnGeneral->setlista_producto($lista_producto);
			$lista_productoReturnGeneral->setlista_productos($lista_productos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $lista_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,lista_producto $lista_producto,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,lista_producto $lista_producto,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		lista_producto_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(lista_producto $lista_producto,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//lista_producto_logic_add::updatelista_productoToGet($this->lista_producto);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$lista_producto->setproducto($this->lista_productoDataAccess->getproducto($this->connexion,$lista_producto));
		$lista_producto->setunidad_compra($this->lista_productoDataAccess->getunidad_compra($this->connexion,$lista_producto));
		$lista_producto->setunidad_venta($this->lista_productoDataAccess->getunidad_venta($this->connexion,$lista_producto));
		$lista_producto->setcategoria_producto($this->lista_productoDataAccess->getcategoria_producto($this->connexion,$lista_producto));
		$lista_producto->setsub_categoria_producto($this->lista_productoDataAccess->getsub_categoria_producto($this->connexion,$lista_producto));
		$lista_producto->settipo_producto($this->lista_productoDataAccess->gettipo_producto($this->connexion,$lista_producto));
		$lista_producto->setbodega($this->lista_productoDataAccess->getbodega($this->connexion,$lista_producto));
		$lista_producto->setcuenta_compra($this->lista_productoDataAccess->getcuenta_compra($this->connexion,$lista_producto));
		$lista_producto->setcuenta_venta($this->lista_productoDataAccess->getcuenta_venta($this->connexion,$lista_producto));
		$lista_producto->setcuenta_inventario($this->lista_productoDataAccess->getcuenta_inventario($this->connexion,$lista_producto));
		$lista_producto->setotro_suplidor($this->lista_productoDataAccess->getotro_suplidor($this->connexion,$lista_producto));
		$lista_producto->setimpuesto($this->lista_productoDataAccess->getimpuesto($this->connexion,$lista_producto));
		$lista_producto->setimpuesto_ventas($this->lista_productoDataAccess->getimpuesto_ventas($this->connexion,$lista_producto));
		$lista_producto->setimpuesto_compras($this->lista_productoDataAccess->getimpuesto_compras($this->connexion,$lista_producto));
		$lista_producto->setotro_impuesto($this->lista_productoDataAccess->getotro_impuesto($this->connexion,$lista_producto));
		$lista_producto->setotro_impuesto_ventas($this->lista_productoDataAccess->getotro_impuesto_ventas($this->connexion,$lista_producto));
		$lista_producto->setotro_impuesto_compras($this->lista_productoDataAccess->getotro_impuesto_compras($this->connexion,$lista_producto));
		$lista_producto->setretencion($this->lista_productoDataAccess->getretencion($this->connexion,$lista_producto));
		$lista_producto->setretencion_ventas($this->lista_productoDataAccess->getretencion_ventas($this->connexion,$lista_producto));
		$lista_producto->setretencion_compras($this->lista_productoDataAccess->getretencion_compras($this->connexion,$lista_producto));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$lista_producto->setproducto($this->lista_productoDataAccess->getproducto($this->connexion,$lista_producto));
				continue;
			}

			if($clas->clas==unidad::$class.'_compra') {
				$lista_producto->setunidad_compra($this->lista_productoDataAccess->getunidad_compra($this->connexion,$lista_producto));
				continue;
			}

			if($clas->clas==unidad::$class.'_venta') {
				$lista_producto->setunidad_venta($this->lista_productoDataAccess->getunidad_venta($this->connexion,$lista_producto));
				continue;
			}

			if($clas->clas==categoria_producto::$class.'') {
				$lista_producto->setcategoria_producto($this->lista_productoDataAccess->getcategoria_producto($this->connexion,$lista_producto));
				continue;
			}

			if($clas->clas==sub_categoria_producto::$class.'') {
				$lista_producto->setsub_categoria_producto($this->lista_productoDataAccess->getsub_categoria_producto($this->connexion,$lista_producto));
				continue;
			}

			if($clas->clas==tipo_producto::$class.'') {
				$lista_producto->settipo_producto($this->lista_productoDataAccess->gettipo_producto($this->connexion,$lista_producto));
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$lista_producto->setbodega($this->lista_productoDataAccess->getbodega($this->connexion,$lista_producto));
				continue;
			}

			if($clas->clas==cuenta::$class.'_compra') {
				$lista_producto->setcuenta_compra($this->lista_productoDataAccess->getcuenta_compra($this->connexion,$lista_producto));
				continue;
			}

			if($clas->clas==cuenta::$class.'_venta') {
				$lista_producto->setcuenta_venta($this->lista_productoDataAccess->getcuenta_venta($this->connexion,$lista_producto));
				continue;
			}

			if($clas->clas==cuenta::$class.'_inventario') {
				$lista_producto->setcuenta_inventario($this->lista_productoDataAccess->getcuenta_inventario($this->connexion,$lista_producto));
				continue;
			}

			if($clas->clas==otro_suplidor::$class.'') {
				$lista_producto->setotro_suplidor($this->lista_productoDataAccess->getotro_suplidor($this->connexion,$lista_producto));
				continue;
			}

			if($clas->clas==impuesto::$class.'') {
				$lista_producto->setimpuesto($this->lista_productoDataAccess->getimpuesto($this->connexion,$lista_producto));
				continue;
			}

			if($clas->clas==impuesto::$class.'_ventas') {
				$lista_producto->setimpuesto_ventas($this->lista_productoDataAccess->getimpuesto_ventas($this->connexion,$lista_producto));
				continue;
			}

			if($clas->clas==impuesto::$class.'_compras') {
				$lista_producto->setimpuesto_compras($this->lista_productoDataAccess->getimpuesto_compras($this->connexion,$lista_producto));
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'') {
				$lista_producto->setotro_impuesto($this->lista_productoDataAccess->getotro_impuesto($this->connexion,$lista_producto));
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'_ventas') {
				$lista_producto->setotro_impuesto_ventas($this->lista_productoDataAccess->getotro_impuesto_ventas($this->connexion,$lista_producto));
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'_compras') {
				$lista_producto->setotro_impuesto_compras($this->lista_productoDataAccess->getotro_impuesto_compras($this->connexion,$lista_producto));
				continue;
			}

			if($clas->clas==retencion::$class.'') {
				$lista_producto->setretencion($this->lista_productoDataAccess->getretencion($this->connexion,$lista_producto));
				continue;
			}

			if($clas->clas==retencion::$class.'_ventas') {
				$lista_producto->setretencion_ventas($this->lista_productoDataAccess->getretencion_ventas($this->connexion,$lista_producto));
				continue;
			}

			if($clas->clas==retencion::$class.'_compras') {
				$lista_producto->setretencion_compras($this->lista_productoDataAccess->getretencion_compras($this->connexion,$lista_producto));
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
			$lista_producto->setproducto($this->lista_productoDataAccess->getproducto($this->connexion,$lista_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'_compra') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setunidad_compra($this->lista_productoDataAccess->getunidad_compra($this->connexion,$lista_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'_venta') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setunidad_venta($this->lista_productoDataAccess->getunidad_venta($this->connexion,$lista_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==categoria_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setcategoria_producto($this->lista_productoDataAccess->getcategoria_producto($this->connexion,$lista_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sub_categoria_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setsub_categoria_producto($this->lista_productoDataAccess->getsub_categoria_producto($this->connexion,$lista_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->settipo_producto($this->lista_productoDataAccess->gettipo_producto($this->connexion,$lista_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setbodega($this->lista_productoDataAccess->getbodega($this->connexion,$lista_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compra') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setcuenta_compra($this->lista_productoDataAccess->getcuenta_compra($this->connexion,$lista_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_venta') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setcuenta_venta($this->lista_productoDataAccess->getcuenta_venta($this->connexion,$lista_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_inventario') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setcuenta_inventario($this->lista_productoDataAccess->getcuenta_inventario($this->connexion,$lista_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==otro_suplidor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setotro_suplidor($this->lista_productoDataAccess->getotro_suplidor($this->connexion,$lista_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setimpuesto($this->lista_productoDataAccess->getimpuesto($this->connexion,$lista_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setimpuesto_ventas($this->lista_productoDataAccess->getimpuesto_ventas($this->connexion,$lista_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setimpuesto_compras($this->lista_productoDataAccess->getimpuesto_compras($this->connexion,$lista_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setotro_impuesto($this->lista_productoDataAccess->getotro_impuesto($this->connexion,$lista_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setotro_impuesto_ventas($this->lista_productoDataAccess->getotro_impuesto_ventas($this->connexion,$lista_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setotro_impuesto_compras($this->lista_productoDataAccess->getotro_impuesto_compras($this->connexion,$lista_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setretencion($this->lista_productoDataAccess->getretencion($this->connexion,$lista_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setretencion_ventas($this->lista_productoDataAccess->getretencion_ventas($this->connexion,$lista_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setretencion_compras($this->lista_productoDataAccess->getretencion_compras($this->connexion,$lista_producto));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$lista_producto->setproducto($this->lista_productoDataAccess->getproducto($this->connexion,$lista_producto));
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepLoad($lista_producto->getproducto(),$isDeep,$deepLoadType,$clases);
				
		$lista_producto->setunidad_compra($this->lista_productoDataAccess->getunidad_compra($this->connexion,$lista_producto));
		$unidad_compraLogic= new unidad_logic($this->connexion);
		$unidad_compraLogic->deepLoad($lista_producto->getunidad_compra(),$isDeep,$deepLoadType,$clases);
				
		$lista_producto->setunidad_venta($this->lista_productoDataAccess->getunidad_venta($this->connexion,$lista_producto));
		$unidad_ventaLogic= new unidad_logic($this->connexion);
		$unidad_ventaLogic->deepLoad($lista_producto->getunidad_venta(),$isDeep,$deepLoadType,$clases);
				
		$lista_producto->setcategoria_producto($this->lista_productoDataAccess->getcategoria_producto($this->connexion,$lista_producto));
		$categoria_productoLogic= new categoria_producto_logic($this->connexion);
		$categoria_productoLogic->deepLoad($lista_producto->getcategoria_producto(),$isDeep,$deepLoadType,$clases);
				
		$lista_producto->setsub_categoria_producto($this->lista_productoDataAccess->getsub_categoria_producto($this->connexion,$lista_producto));
		$sub_categoria_productoLogic= new sub_categoria_producto_logic($this->connexion);
		$sub_categoria_productoLogic->deepLoad($lista_producto->getsub_categoria_producto(),$isDeep,$deepLoadType,$clases);
				
		$lista_producto->settipo_producto($this->lista_productoDataAccess->gettipo_producto($this->connexion,$lista_producto));
		$tipo_productoLogic= new tipo_producto_logic($this->connexion);
		$tipo_productoLogic->deepLoad($lista_producto->gettipo_producto(),$isDeep,$deepLoadType,$clases);
				
		$lista_producto->setbodega($this->lista_productoDataAccess->getbodega($this->connexion,$lista_producto));
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepLoad($lista_producto->getbodega(),$isDeep,$deepLoadType,$clases);
				
		$lista_producto->setcuenta_compra($this->lista_productoDataAccess->getcuenta_compra($this->connexion,$lista_producto));
		$cuenta_compraLogic= new cuenta_logic($this->connexion);
		$cuenta_compraLogic->deepLoad($lista_producto->getcuenta_compra(),$isDeep,$deepLoadType,$clases);
				
		$lista_producto->setcuenta_venta($this->lista_productoDataAccess->getcuenta_venta($this->connexion,$lista_producto));
		$cuenta_ventaLogic= new cuenta_logic($this->connexion);
		$cuenta_ventaLogic->deepLoad($lista_producto->getcuenta_venta(),$isDeep,$deepLoadType,$clases);
				
		$lista_producto->setcuenta_inventario($this->lista_productoDataAccess->getcuenta_inventario($this->connexion,$lista_producto));
		$cuenta_inventarioLogic= new cuenta_logic($this->connexion);
		$cuenta_inventarioLogic->deepLoad($lista_producto->getcuenta_inventario(),$isDeep,$deepLoadType,$clases);
				
		$lista_producto->setotro_suplidor($this->lista_productoDataAccess->getotro_suplidor($this->connexion,$lista_producto));
		$otro_suplidorLogic= new otro_suplidor_logic($this->connexion);
		$otro_suplidorLogic->deepLoad($lista_producto->getotro_suplidor(),$isDeep,$deepLoadType,$clases);
				
		$lista_producto->setimpuesto($this->lista_productoDataAccess->getimpuesto($this->connexion,$lista_producto));
		$impuestoLogic= new impuesto_logic($this->connexion);
		$impuestoLogic->deepLoad($lista_producto->getimpuesto(),$isDeep,$deepLoadType,$clases);
				
		$lista_producto->setimpuesto_ventas($this->lista_productoDataAccess->getimpuesto_ventas($this->connexion,$lista_producto));
		$impuesto_ventasLogic= new impuesto_logic($this->connexion);
		$impuesto_ventasLogic->deepLoad($lista_producto->getimpuesto_ventas(),$isDeep,$deepLoadType,$clases);
				
		$lista_producto->setimpuesto_compras($this->lista_productoDataAccess->getimpuesto_compras($this->connexion,$lista_producto));
		$impuesto_comprasLogic= new impuesto_logic($this->connexion);
		$impuesto_comprasLogic->deepLoad($lista_producto->getimpuesto_compras(),$isDeep,$deepLoadType,$clases);
				
		$lista_producto->setotro_impuesto($this->lista_productoDataAccess->getotro_impuesto($this->connexion,$lista_producto));
		$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
		$otro_impuestoLogic->deepLoad($lista_producto->getotro_impuesto(),$isDeep,$deepLoadType,$clases);
				
		$lista_producto->setotro_impuesto_ventas($this->lista_productoDataAccess->getotro_impuesto_ventas($this->connexion,$lista_producto));
		$otro_impuesto_ventasLogic= new otro_impuesto_logic($this->connexion);
		$otro_impuesto_ventasLogic->deepLoad($lista_producto->getotro_impuesto_ventas(),$isDeep,$deepLoadType,$clases);
				
		$lista_producto->setotro_impuesto_compras($this->lista_productoDataAccess->getotro_impuesto_compras($this->connexion,$lista_producto));
		$otro_impuesto_comprasLogic= new otro_impuesto_logic($this->connexion);
		$otro_impuesto_comprasLogic->deepLoad($lista_producto->getotro_impuesto_compras(),$isDeep,$deepLoadType,$clases);
				
		$lista_producto->setretencion($this->lista_productoDataAccess->getretencion($this->connexion,$lista_producto));
		$retencionLogic= new retencion_logic($this->connexion);
		$retencionLogic->deepLoad($lista_producto->getretencion(),$isDeep,$deepLoadType,$clases);
				
		$lista_producto->setretencion_ventas($this->lista_productoDataAccess->getretencion_ventas($this->connexion,$lista_producto));
		$retencion_ventasLogic= new retencion_logic($this->connexion);
		$retencion_ventasLogic->deepLoad($lista_producto->getretencion_ventas(),$isDeep,$deepLoadType,$clases);
				
		$lista_producto->setretencion_compras($this->lista_productoDataAccess->getretencion_compras($this->connexion,$lista_producto));
		$retencion_comprasLogic= new retencion_logic($this->connexion);
		$retencion_comprasLogic->deepLoad($lista_producto->getretencion_compras(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$lista_producto->setproducto($this->lista_productoDataAccess->getproducto($this->connexion,$lista_producto));
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($lista_producto->getproducto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==unidad::$class.'_compra') {
				$lista_producto->setunidad_compra($this->lista_productoDataAccess->getunidad_compra($this->connexion,$lista_producto));
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepLoad($lista_producto->getunidad_compra(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==unidad::$class.'_venta') {
				$lista_producto->setunidad_venta($this->lista_productoDataAccess->getunidad_venta($this->connexion,$lista_producto));
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepLoad($lista_producto->getunidad_venta(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==categoria_producto::$class.'') {
				$lista_producto->setcategoria_producto($this->lista_productoDataAccess->getcategoria_producto($this->connexion,$lista_producto));
				$categoria_productoLogic= new categoria_producto_logic($this->connexion);
				$categoria_productoLogic->deepLoad($lista_producto->getcategoria_producto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sub_categoria_producto::$class.'') {
				$lista_producto->setsub_categoria_producto($this->lista_productoDataAccess->getsub_categoria_producto($this->connexion,$lista_producto));
				$sub_categoria_productoLogic= new sub_categoria_producto_logic($this->connexion);
				$sub_categoria_productoLogic->deepLoad($lista_producto->getsub_categoria_producto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_producto::$class.'') {
				$lista_producto->settipo_producto($this->lista_productoDataAccess->gettipo_producto($this->connexion,$lista_producto));
				$tipo_productoLogic= new tipo_producto_logic($this->connexion);
				$tipo_productoLogic->deepLoad($lista_producto->gettipo_producto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$lista_producto->setbodega($this->lista_productoDataAccess->getbodega($this->connexion,$lista_producto));
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepLoad($lista_producto->getbodega(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_compra') {
				$lista_producto->setcuenta_compra($this->lista_productoDataAccess->getcuenta_compra($this->connexion,$lista_producto));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($lista_producto->getcuenta_compra(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_venta') {
				$lista_producto->setcuenta_venta($this->lista_productoDataAccess->getcuenta_venta($this->connexion,$lista_producto));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($lista_producto->getcuenta_venta(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_inventario') {
				$lista_producto->setcuenta_inventario($this->lista_productoDataAccess->getcuenta_inventario($this->connexion,$lista_producto));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($lista_producto->getcuenta_inventario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==otro_suplidor::$class.'') {
				$lista_producto->setotro_suplidor($this->lista_productoDataAccess->getotro_suplidor($this->connexion,$lista_producto));
				$otro_suplidorLogic= new otro_suplidor_logic($this->connexion);
				$otro_suplidorLogic->deepLoad($lista_producto->getotro_suplidor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==impuesto::$class.'') {
				$lista_producto->setimpuesto($this->lista_productoDataAccess->getimpuesto($this->connexion,$lista_producto));
				$impuestoLogic= new impuesto_logic($this->connexion);
				$impuestoLogic->deepLoad($lista_producto->getimpuesto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==impuesto::$class.'_ventas') {
				$lista_producto->setimpuesto_ventas($this->lista_productoDataAccess->getimpuesto_ventas($this->connexion,$lista_producto));
				$impuestoLogic= new impuesto_logic($this->connexion);
				$impuestoLogic->deepLoad($lista_producto->getimpuesto_ventas(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==impuesto::$class.'_compras') {
				$lista_producto->setimpuesto_compras($this->lista_productoDataAccess->getimpuesto_compras($this->connexion,$lista_producto));
				$impuestoLogic= new impuesto_logic($this->connexion);
				$impuestoLogic->deepLoad($lista_producto->getimpuesto_compras(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'') {
				$lista_producto->setotro_impuesto($this->lista_productoDataAccess->getotro_impuesto($this->connexion,$lista_producto));
				$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
				$otro_impuestoLogic->deepLoad($lista_producto->getotro_impuesto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'_ventas') {
				$lista_producto->setotro_impuesto_ventas($this->lista_productoDataAccess->getotro_impuesto_ventas($this->connexion,$lista_producto));
				$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
				$otro_impuestoLogic->deepLoad($lista_producto->getotro_impuesto_ventas(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'_compras') {
				$lista_producto->setotro_impuesto_compras($this->lista_productoDataAccess->getotro_impuesto_compras($this->connexion,$lista_producto));
				$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
				$otro_impuestoLogic->deepLoad($lista_producto->getotro_impuesto_compras(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==retencion::$class.'') {
				$lista_producto->setretencion($this->lista_productoDataAccess->getretencion($this->connexion,$lista_producto));
				$retencionLogic= new retencion_logic($this->connexion);
				$retencionLogic->deepLoad($lista_producto->getretencion(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==retencion::$class.'_ventas') {
				$lista_producto->setretencion_ventas($this->lista_productoDataAccess->getretencion_ventas($this->connexion,$lista_producto));
				$retencionLogic= new retencion_logic($this->connexion);
				$retencionLogic->deepLoad($lista_producto->getretencion_ventas(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==retencion::$class.'_compras') {
				$lista_producto->setretencion_compras($this->lista_productoDataAccess->getretencion_compras($this->connexion,$lista_producto));
				$retencionLogic= new retencion_logic($this->connexion);
				$retencionLogic->deepLoad($lista_producto->getretencion_compras(),$isDeep,$deepLoadType,$clases);				
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
			$lista_producto->setproducto($this->lista_productoDataAccess->getproducto($this->connexion,$lista_producto));
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($lista_producto->getproducto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'_compra') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setunidad_compra($this->lista_productoDataAccess->getunidad_compra($this->connexion,$lista_producto));
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepLoad($lista_producto->getunidad_compra(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'_venta') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setunidad_venta($this->lista_productoDataAccess->getunidad_venta($this->connexion,$lista_producto));
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepLoad($lista_producto->getunidad_venta(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==categoria_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setcategoria_producto($this->lista_productoDataAccess->getcategoria_producto($this->connexion,$lista_producto));
			$categoria_productoLogic= new categoria_producto_logic($this->connexion);
			$categoria_productoLogic->deepLoad($lista_producto->getcategoria_producto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sub_categoria_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setsub_categoria_producto($this->lista_productoDataAccess->getsub_categoria_producto($this->connexion,$lista_producto));
			$sub_categoria_productoLogic= new sub_categoria_producto_logic($this->connexion);
			$sub_categoria_productoLogic->deepLoad($lista_producto->getsub_categoria_producto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->settipo_producto($this->lista_productoDataAccess->gettipo_producto($this->connexion,$lista_producto));
			$tipo_productoLogic= new tipo_producto_logic($this->connexion);
			$tipo_productoLogic->deepLoad($lista_producto->gettipo_producto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setbodega($this->lista_productoDataAccess->getbodega($this->connexion,$lista_producto));
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepLoad($lista_producto->getbodega(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compra') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setcuenta_compra($this->lista_productoDataAccess->getcuenta_compra($this->connexion,$lista_producto));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($lista_producto->getcuenta_compra(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_venta') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setcuenta_venta($this->lista_productoDataAccess->getcuenta_venta($this->connexion,$lista_producto));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($lista_producto->getcuenta_venta(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_inventario') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setcuenta_inventario($this->lista_productoDataAccess->getcuenta_inventario($this->connexion,$lista_producto));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($lista_producto->getcuenta_inventario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_suplidor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setotro_suplidor($this->lista_productoDataAccess->getotro_suplidor($this->connexion,$lista_producto));
			$otro_suplidorLogic= new otro_suplidor_logic($this->connexion);
			$otro_suplidorLogic->deepLoad($lista_producto->getotro_suplidor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setimpuesto($this->lista_productoDataAccess->getimpuesto($this->connexion,$lista_producto));
			$impuestoLogic= new impuesto_logic($this->connexion);
			$impuestoLogic->deepLoad($lista_producto->getimpuesto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setimpuesto_ventas($this->lista_productoDataAccess->getimpuesto_ventas($this->connexion,$lista_producto));
			$impuestoLogic= new impuesto_logic($this->connexion);
			$impuestoLogic->deepLoad($lista_producto->getimpuesto_ventas(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setimpuesto_compras($this->lista_productoDataAccess->getimpuesto_compras($this->connexion,$lista_producto));
			$impuestoLogic= new impuesto_logic($this->connexion);
			$impuestoLogic->deepLoad($lista_producto->getimpuesto_compras(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setotro_impuesto($this->lista_productoDataAccess->getotro_impuesto($this->connexion,$lista_producto));
			$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
			$otro_impuestoLogic->deepLoad($lista_producto->getotro_impuesto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setotro_impuesto_ventas($this->lista_productoDataAccess->getotro_impuesto_ventas($this->connexion,$lista_producto));
			$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
			$otro_impuestoLogic->deepLoad($lista_producto->getotro_impuesto_ventas(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setotro_impuesto_compras($this->lista_productoDataAccess->getotro_impuesto_compras($this->connexion,$lista_producto));
			$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
			$otro_impuestoLogic->deepLoad($lista_producto->getotro_impuesto_compras(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setretencion($this->lista_productoDataAccess->getretencion($this->connexion,$lista_producto));
			$retencionLogic= new retencion_logic($this->connexion);
			$retencionLogic->deepLoad($lista_producto->getretencion(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setretencion_ventas($this->lista_productoDataAccess->getretencion_ventas($this->connexion,$lista_producto));
			$retencionLogic= new retencion_logic($this->connexion);
			$retencionLogic->deepLoad($lista_producto->getretencion_ventas(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_producto->setretencion_compras($this->lista_productoDataAccess->getretencion_compras($this->connexion,$lista_producto));
			$retencionLogic= new retencion_logic($this->connexion);
			$retencionLogic->deepLoad($lista_producto->getretencion_compras(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(lista_producto $lista_producto,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//lista_producto_logic_add::updatelista_productoToSave($this->lista_producto);			
			
			if(!$paraDeleteCascade) {				
				lista_producto_data::save($lista_producto, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		producto_data::save($lista_producto->getproducto(),$this->connexion);
		unidad_data::save($lista_producto->getunidad_compra(),$this->connexion);
		unidad_data::save($lista_producto->getunidad_venta(),$this->connexion);
		categoria_producto_data::save($lista_producto->getcategoria_producto(),$this->connexion);
		sub_categoria_producto_data::save($lista_producto->getsub_categoria_producto(),$this->connexion);
		tipo_producto_data::save($lista_producto->gettipo_producto(),$this->connexion);
		bodega_data::save($lista_producto->getbodega(),$this->connexion);
		cuenta_data::save($lista_producto->getcuenta_compra(),$this->connexion);
		cuenta_data::save($lista_producto->getcuenta_venta(),$this->connexion);
		cuenta_data::save($lista_producto->getcuenta_inventario(),$this->connexion);
		otro_suplidor_data::save($lista_producto->getotro_suplidor(),$this->connexion);
		impuesto_data::save($lista_producto->getimpuesto(),$this->connexion);
		impuesto_data::save($lista_producto->getimpuesto_ventas(),$this->connexion);
		impuesto_data::save($lista_producto->getimpuesto_compras(),$this->connexion);
		otro_impuesto_data::save($lista_producto->getotro_impuesto(),$this->connexion);
		otro_impuesto_data::save($lista_producto->getotro_impuesto_ventas(),$this->connexion);
		otro_impuesto_data::save($lista_producto->getotro_impuesto_compras(),$this->connexion);
		retencion_data::save($lista_producto->getretencion(),$this->connexion);
		retencion_data::save($lista_producto->getretencion_ventas(),$this->connexion);
		retencion_data::save($lista_producto->getretencion_compras(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				producto_data::save($lista_producto->getproducto(),$this->connexion);
				continue;
			}

			if($clas->clas==unidad::$class.'_compra') {
				unidad_data::save($lista_producto->getunidad_compra(),$this->connexion);
				continue;
			}

			if($clas->clas==unidad::$class.'_venta') {
				unidad_data::save($lista_producto->getunidad_venta(),$this->connexion);
				continue;
			}

			if($clas->clas==categoria_producto::$class.'') {
				categoria_producto_data::save($lista_producto->getcategoria_producto(),$this->connexion);
				continue;
			}

			if($clas->clas==sub_categoria_producto::$class.'') {
				sub_categoria_producto_data::save($lista_producto->getsub_categoria_producto(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_producto::$class.'') {
				tipo_producto_data::save($lista_producto->gettipo_producto(),$this->connexion);
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($lista_producto->getbodega(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'_compra') {
				cuenta_data::save($lista_producto->getcuenta_compra(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'_venta') {
				cuenta_data::save($lista_producto->getcuenta_venta(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'_inventario') {
				cuenta_data::save($lista_producto->getcuenta_inventario(),$this->connexion);
				continue;
			}

			if($clas->clas==otro_suplidor::$class.'') {
				otro_suplidor_data::save($lista_producto->getotro_suplidor(),$this->connexion);
				continue;
			}

			if($clas->clas==impuesto::$class.'') {
				impuesto_data::save($lista_producto->getimpuesto(),$this->connexion);
				continue;
			}

			if($clas->clas==impuesto::$class.'_ventas') {
				impuesto_data::save($lista_producto->getimpuesto_ventas(),$this->connexion);
				continue;
			}

			if($clas->clas==impuesto::$class.'_compras') {
				impuesto_data::save($lista_producto->getimpuesto_compras(),$this->connexion);
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'') {
				otro_impuesto_data::save($lista_producto->getotro_impuesto(),$this->connexion);
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'_ventas') {
				otro_impuesto_data::save($lista_producto->getotro_impuesto_ventas(),$this->connexion);
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'_compras') {
				otro_impuesto_data::save($lista_producto->getotro_impuesto_compras(),$this->connexion);
				continue;
			}

			if($clas->clas==retencion::$class.'') {
				retencion_data::save($lista_producto->getretencion(),$this->connexion);
				continue;
			}

			if($clas->clas==retencion::$class.'_ventas') {
				retencion_data::save($lista_producto->getretencion_ventas(),$this->connexion);
				continue;
			}

			if($clas->clas==retencion::$class.'_compras') {
				retencion_data::save($lista_producto->getretencion_compras(),$this->connexion);
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
			producto_data::save($lista_producto->getproducto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'_compra') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($lista_producto->getunidad_compra(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'_venta') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($lista_producto->getunidad_venta(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==categoria_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			categoria_producto_data::save($lista_producto->getcategoria_producto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sub_categoria_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sub_categoria_producto_data::save($lista_producto->getsub_categoria_producto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_producto_data::save($lista_producto->gettipo_producto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($lista_producto->getbodega(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compra') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($lista_producto->getcuenta_compra(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_venta') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($lista_producto->getcuenta_venta(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_inventario') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($lista_producto->getcuenta_inventario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_suplidor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			otro_suplidor_data::save($lista_producto->getotro_suplidor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			impuesto_data::save($lista_producto->getimpuesto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			impuesto_data::save($lista_producto->getimpuesto_ventas(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			impuesto_data::save($lista_producto->getimpuesto_compras(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			otro_impuesto_data::save($lista_producto->getotro_impuesto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			otro_impuesto_data::save($lista_producto->getotro_impuesto_ventas(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			otro_impuesto_data::save($lista_producto->getotro_impuesto_compras(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			retencion_data::save($lista_producto->getretencion(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			retencion_data::save($lista_producto->getretencion_ventas(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			retencion_data::save($lista_producto->getretencion_compras(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		producto_data::save($lista_producto->getproducto(),$this->connexion);
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepSave($lista_producto->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		unidad_data::save($lista_producto->getunidad_compra(),$this->connexion);
		$unidad_compraLogic= new unidad_logic($this->connexion);
		$unidad_compraLogic->deepSave($lista_producto->getunidad_compra(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		unidad_data::save($lista_producto->getunidad_venta(),$this->connexion);
		$unidad_ventaLogic= new unidad_logic($this->connexion);
		$unidad_ventaLogic->deepSave($lista_producto->getunidad_venta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		categoria_producto_data::save($lista_producto->getcategoria_producto(),$this->connexion);
		$categoria_productoLogic= new categoria_producto_logic($this->connexion);
		$categoria_productoLogic->deepSave($lista_producto->getcategoria_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sub_categoria_producto_data::save($lista_producto->getsub_categoria_producto(),$this->connexion);
		$sub_categoria_productoLogic= new sub_categoria_producto_logic($this->connexion);
		$sub_categoria_productoLogic->deepSave($lista_producto->getsub_categoria_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_producto_data::save($lista_producto->gettipo_producto(),$this->connexion);
		$tipo_productoLogic= new tipo_producto_logic($this->connexion);
		$tipo_productoLogic->deepSave($lista_producto->gettipo_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		bodega_data::save($lista_producto->getbodega(),$this->connexion);
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepSave($lista_producto->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($lista_producto->getcuenta_compra(),$this->connexion);
		$cuenta_compraLogic= new cuenta_logic($this->connexion);
		$cuenta_compraLogic->deepSave($lista_producto->getcuenta_compra(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($lista_producto->getcuenta_venta(),$this->connexion);
		$cuenta_ventaLogic= new cuenta_logic($this->connexion);
		$cuenta_ventaLogic->deepSave($lista_producto->getcuenta_venta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($lista_producto->getcuenta_inventario(),$this->connexion);
		$cuenta_inventarioLogic= new cuenta_logic($this->connexion);
		$cuenta_inventarioLogic->deepSave($lista_producto->getcuenta_inventario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		otro_suplidor_data::save($lista_producto->getotro_suplidor(),$this->connexion);
		$otro_suplidorLogic= new otro_suplidor_logic($this->connexion);
		$otro_suplidorLogic->deepSave($lista_producto->getotro_suplidor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		impuesto_data::save($lista_producto->getimpuesto(),$this->connexion);
		$impuestoLogic= new impuesto_logic($this->connexion);
		$impuestoLogic->deepSave($lista_producto->getimpuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		impuesto_data::save($lista_producto->getimpuesto_ventas(),$this->connexion);
		$impuesto_ventasLogic= new impuesto_logic($this->connexion);
		$impuesto_ventasLogic->deepSave($lista_producto->getimpuesto_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		impuesto_data::save($lista_producto->getimpuesto_compras(),$this->connexion);
		$impuesto_comprasLogic= new impuesto_logic($this->connexion);
		$impuesto_comprasLogic->deepSave($lista_producto->getimpuesto_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		otro_impuesto_data::save($lista_producto->getotro_impuesto(),$this->connexion);
		$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
		$otro_impuestoLogic->deepSave($lista_producto->getotro_impuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		otro_impuesto_data::save($lista_producto->getotro_impuesto_ventas(),$this->connexion);
		$otro_impuesto_ventasLogic= new otro_impuesto_logic($this->connexion);
		$otro_impuesto_ventasLogic->deepSave($lista_producto->getotro_impuesto_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		otro_impuesto_data::save($lista_producto->getotro_impuesto_compras(),$this->connexion);
		$otro_impuesto_comprasLogic= new otro_impuesto_logic($this->connexion);
		$otro_impuesto_comprasLogic->deepSave($lista_producto->getotro_impuesto_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		retencion_data::save($lista_producto->getretencion(),$this->connexion);
		$retencionLogic= new retencion_logic($this->connexion);
		$retencionLogic->deepSave($lista_producto->getretencion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		retencion_data::save($lista_producto->getretencion_ventas(),$this->connexion);
		$retencion_ventasLogic= new retencion_logic($this->connexion);
		$retencion_ventasLogic->deepSave($lista_producto->getretencion_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		retencion_data::save($lista_producto->getretencion_compras(),$this->connexion);
		$retencion_comprasLogic= new retencion_logic($this->connexion);
		$retencion_comprasLogic->deepSave($lista_producto->getretencion_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				producto_data::save($lista_producto->getproducto(),$this->connexion);
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepSave($lista_producto->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==unidad::$class.'_compra') {
				unidad_data::save($lista_producto->getunidad_compra(),$this->connexion);
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepSave($lista_producto->getunidad_compra(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==unidad::$class.'_venta') {
				unidad_data::save($lista_producto->getunidad_venta(),$this->connexion);
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepSave($lista_producto->getunidad_venta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==categoria_producto::$class.'') {
				categoria_producto_data::save($lista_producto->getcategoria_producto(),$this->connexion);
				$categoria_productoLogic= new categoria_producto_logic($this->connexion);
				$categoria_productoLogic->deepSave($lista_producto->getcategoria_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sub_categoria_producto::$class.'') {
				sub_categoria_producto_data::save($lista_producto->getsub_categoria_producto(),$this->connexion);
				$sub_categoria_productoLogic= new sub_categoria_producto_logic($this->connexion);
				$sub_categoria_productoLogic->deepSave($lista_producto->getsub_categoria_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_producto::$class.'') {
				tipo_producto_data::save($lista_producto->gettipo_producto(),$this->connexion);
				$tipo_productoLogic= new tipo_producto_logic($this->connexion);
				$tipo_productoLogic->deepSave($lista_producto->gettipo_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($lista_producto->getbodega(),$this->connexion);
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepSave($lista_producto->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_compra') {
				cuenta_data::save($lista_producto->getcuenta_compra(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($lista_producto->getcuenta_compra(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_venta') {
				cuenta_data::save($lista_producto->getcuenta_venta(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($lista_producto->getcuenta_venta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_inventario') {
				cuenta_data::save($lista_producto->getcuenta_inventario(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($lista_producto->getcuenta_inventario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==otro_suplidor::$class.'') {
				otro_suplidor_data::save($lista_producto->getotro_suplidor(),$this->connexion);
				$otro_suplidorLogic= new otro_suplidor_logic($this->connexion);
				$otro_suplidorLogic->deepSave($lista_producto->getotro_suplidor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==impuesto::$class.'') {
				impuesto_data::save($lista_producto->getimpuesto(),$this->connexion);
				$impuestoLogic= new impuesto_logic($this->connexion);
				$impuestoLogic->deepSave($lista_producto->getimpuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==impuesto::$class.'_ventas') {
				impuesto_data::save($lista_producto->getimpuesto_ventas(),$this->connexion);
				$impuestoLogic= new impuesto_logic($this->connexion);
				$impuestoLogic->deepSave($lista_producto->getimpuesto_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==impuesto::$class.'_compras') {
				impuesto_data::save($lista_producto->getimpuesto_compras(),$this->connexion);
				$impuestoLogic= new impuesto_logic($this->connexion);
				$impuestoLogic->deepSave($lista_producto->getimpuesto_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'') {
				otro_impuesto_data::save($lista_producto->getotro_impuesto(),$this->connexion);
				$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
				$otro_impuestoLogic->deepSave($lista_producto->getotro_impuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'_ventas') {
				otro_impuesto_data::save($lista_producto->getotro_impuesto_ventas(),$this->connexion);
				$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
				$otro_impuestoLogic->deepSave($lista_producto->getotro_impuesto_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'_compras') {
				otro_impuesto_data::save($lista_producto->getotro_impuesto_compras(),$this->connexion);
				$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
				$otro_impuestoLogic->deepSave($lista_producto->getotro_impuesto_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==retencion::$class.'') {
				retencion_data::save($lista_producto->getretencion(),$this->connexion);
				$retencionLogic= new retencion_logic($this->connexion);
				$retencionLogic->deepSave($lista_producto->getretencion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==retencion::$class.'_ventas') {
				retencion_data::save($lista_producto->getretencion_ventas(),$this->connexion);
				$retencionLogic= new retencion_logic($this->connexion);
				$retencionLogic->deepSave($lista_producto->getretencion_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==retencion::$class.'_compras') {
				retencion_data::save($lista_producto->getretencion_compras(),$this->connexion);
				$retencionLogic= new retencion_logic($this->connexion);
				$retencionLogic->deepSave($lista_producto->getretencion_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			producto_data::save($lista_producto->getproducto(),$this->connexion);
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepSave($lista_producto->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'_compra') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($lista_producto->getunidad(),$this->connexion);
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepSave($lista_producto->getunidad_compra(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'_venta') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($lista_producto->getunidad(),$this->connexion);
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepSave($lista_producto->getunidad_venta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==categoria_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			categoria_producto_data::save($lista_producto->getcategoria_producto(),$this->connexion);
			$categoria_productoLogic= new categoria_producto_logic($this->connexion);
			$categoria_productoLogic->deepSave($lista_producto->getcategoria_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sub_categoria_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sub_categoria_producto_data::save($lista_producto->getsub_categoria_producto(),$this->connexion);
			$sub_categoria_productoLogic= new sub_categoria_producto_logic($this->connexion);
			$sub_categoria_productoLogic->deepSave($lista_producto->getsub_categoria_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_producto_data::save($lista_producto->gettipo_producto(),$this->connexion);
			$tipo_productoLogic= new tipo_producto_logic($this->connexion);
			$tipo_productoLogic->deepSave($lista_producto->gettipo_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($lista_producto->getbodega(),$this->connexion);
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepSave($lista_producto->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compra') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($lista_producto->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($lista_producto->getcuenta_compra(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_venta') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($lista_producto->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($lista_producto->getcuenta_venta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_inventario') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($lista_producto->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($lista_producto->getcuenta_inventario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_suplidor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			otro_suplidor_data::save($lista_producto->getotro_suplidor(),$this->connexion);
			$otro_suplidorLogic= new otro_suplidor_logic($this->connexion);
			$otro_suplidorLogic->deepSave($lista_producto->getotro_suplidor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			impuesto_data::save($lista_producto->getimpuesto(),$this->connexion);
			$impuestoLogic= new impuesto_logic($this->connexion);
			$impuestoLogic->deepSave($lista_producto->getimpuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			impuesto_data::save($lista_producto->getimpuesto(),$this->connexion);
			$impuestoLogic= new impuesto_logic($this->connexion);
			$impuestoLogic->deepSave($lista_producto->getimpuesto_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			impuesto_data::save($lista_producto->getimpuesto(),$this->connexion);
			$impuestoLogic= new impuesto_logic($this->connexion);
			$impuestoLogic->deepSave($lista_producto->getimpuesto_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			otro_impuesto_data::save($lista_producto->getotro_impuesto(),$this->connexion);
			$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
			$otro_impuestoLogic->deepSave($lista_producto->getotro_impuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			otro_impuesto_data::save($lista_producto->getotro_impuesto(),$this->connexion);
			$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
			$otro_impuestoLogic->deepSave($lista_producto->getotro_impuesto_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			otro_impuesto_data::save($lista_producto->getotro_impuesto(),$this->connexion);
			$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
			$otro_impuestoLogic->deepSave($lista_producto->getotro_impuesto_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			retencion_data::save($lista_producto->getretencion(),$this->connexion);
			$retencionLogic= new retencion_logic($this->connexion);
			$retencionLogic->deepSave($lista_producto->getretencion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			retencion_data::save($lista_producto->getretencion(),$this->connexion);
			$retencionLogic= new retencion_logic($this->connexion);
			$retencionLogic->deepSave($lista_producto->getretencion_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			retencion_data::save($lista_producto->getretencion(),$this->connexion);
			$retencionLogic= new retencion_logic($this->connexion);
			$retencionLogic->deepSave($lista_producto->getretencion_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				lista_producto_data::save($lista_producto, $this->connexion);
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
			
			$this->deepLoad($this->lista_producto,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->lista_productos as $lista_producto) {
				$this->deepLoad($lista_producto,$isDeep,$deepLoadType,$clases);
								
				lista_producto_util::refrescarFKDescripciones($this->lista_productos);
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
			
			foreach($this->lista_productos as $lista_producto) {
				$this->deepLoad($lista_producto,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->lista_producto,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->lista_productos as $lista_producto) {
				$this->deepSave($lista_producto,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->lista_productos as $lista_producto) {
				$this->deepSave($lista_producto,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(unidad::$class);
				$classes[]=new Classe(unidad::$class);
				$classes[]=new Classe(categoria_producto::$class);
				$classes[]=new Classe(sub_categoria_producto::$class);
				$classes[]=new Classe(tipo_producto::$class);
				$classes[]=new Classe(bodega::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(otro_suplidor::$class);
				$classes[]=new Classe(impuesto::$class);
				$classes[]=new Classe(impuesto::$class);
				$classes[]=new Classe(impuesto::$class);
				$classes[]=new Classe(otro_impuesto::$class);
				$classes[]=new Classe(otro_impuesto::$class);
				$classes[]=new Classe(otro_impuesto::$class);
				$classes[]=new Classe(retencion::$class);
				$classes[]=new Classe(retencion::$class);
				$classes[]=new Classe(retencion::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
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
					if($clas->clas==unidad::$class) {
						$classes[]=new Classe(unidad::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==categoria_producto::$class) {
						$classes[]=new Classe(categoria_producto::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==sub_categoria_producto::$class) {
						$classes[]=new Classe(sub_categoria_producto::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==tipo_producto::$class) {
						$classes[]=new Classe(tipo_producto::$class);
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
					if($clas->clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==otro_suplidor::$class) {
						$classes[]=new Classe(otro_suplidor::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==impuesto::$class) {
						$classes[]=new Classe(impuesto::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==impuesto::$class) {
						$classes[]=new Classe(impuesto::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==impuesto::$class) {
						$classes[]=new Classe(impuesto::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==otro_impuesto::$class) {
						$classes[]=new Classe(otro_impuesto::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==otro_impuesto::$class) {
						$classes[]=new Classe(otro_impuesto::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==otro_impuesto::$class) {
						$classes[]=new Classe(otro_impuesto::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==retencion::$class) {
						$classes[]=new Classe(retencion::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==retencion::$class) {
						$classes[]=new Classe(retencion::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==retencion::$class) {
						$classes[]=new Classe(retencion::$class);
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
					if($clas->clas==categoria_producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(categoria_producto::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==sub_categoria_producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(sub_categoria_producto::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==tipo_producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_producto::$class);
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
					if($clas->clas==cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta::$class);
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

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==impuesto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(impuesto::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==impuesto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(impuesto::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==impuesto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(impuesto::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==otro_impuesto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(otro_impuesto::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==otro_impuesto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(otro_impuesto::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==otro_impuesto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(otro_impuesto::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==retencion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(retencion::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==retencion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(retencion::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==retencion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(retencion::$class);
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
	
	
	
	
	
	
	
	public function getlista_producto() : ?lista_producto {	
		/*
		lista_producto_logic_add::checklista_productoToGet($this->lista_producto,$this->datosCliente);
		lista_producto_logic_add::updatelista_productoToGet($this->lista_producto);
		*/
			
		return $this->lista_producto;
	}
		
	public function setlista_producto(lista_producto $newlista_producto) {
		$this->lista_producto = $newlista_producto;
	}
	
	public function getlista_productos() : array {		
		/*
		lista_producto_logic_add::checklista_productoToGets($this->lista_productos,$this->datosCliente);
		
		foreach ($this->lista_productos as $lista_productoLocal ) {
			lista_producto_logic_add::updatelista_productoToGet($lista_productoLocal);
		}
		*/
		
		return $this->lista_productos;
	}
	
	public function setlista_productos(array $newlista_productos) {
		$this->lista_productos = $newlista_productos;
	}
	
	public function getlista_productoDataAccess() : lista_producto_data {
		return $this->lista_productoDataAccess;
	}
	
	public function setlista_productoDataAccess(lista_producto_data $newlista_productoDataAccess) {
		$this->lista_productoDataAccess = $newlista_productoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        lista_producto_carga::$CONTROLLER;;        
		
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
