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

namespace com\bydan\contabilidad\inventario\producto\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_param_return;

use com\bydan\contabilidad\inventario\producto\presentation\session\producto_session;

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

use com\bydan\contabilidad\inventario\producto\util\producto_util;
use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\data\producto_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\inventario\tipo_producto\business\entity\tipo_producto;
use com\bydan\contabilidad\inventario\tipo_producto\business\data\tipo_producto_data;
use com\bydan\contabilidad\inventario\tipo_producto\business\logic\tipo_producto_logic;
use com\bydan\contabilidad\inventario\tipo_producto\util\tipo_producto_util;

use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;
use com\bydan\contabilidad\facturacion\impuesto\business\data\impuesto_data;
use com\bydan\contabilidad\facturacion\impuesto\business\logic\impuesto_logic;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_util;

use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\data\otro_impuesto_data;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\logic\otro_impuesto_logic;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_util;

use com\bydan\contabilidad\inventario\categoria_producto\business\entity\categoria_producto;
use com\bydan\contabilidad\inventario\categoria_producto\business\data\categoria_producto_data;
use com\bydan\contabilidad\inventario\categoria_producto\business\logic\categoria_producto_logic;
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_util;

use com\bydan\contabilidad\inventario\sub_categoria_producto\business\entity\sub_categoria_producto;
use com\bydan\contabilidad\inventario\sub_categoria_producto\business\data\sub_categoria_producto_data;
use com\bydan\contabilidad\inventario\sub_categoria_producto\business\logic\sub_categoria_producto_logic;
use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\data\bodega_data;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;
use com\bydan\contabilidad\inventario\unidad\business\data\unidad_data;
use com\bydan\contabilidad\inventario\unidad\business\logic\unidad_logic;
use com\bydan\contabilidad\inventario\unidad\util\unidad_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;
use com\bydan\contabilidad\facturacion\retencion\business\data\retencion_data;
use com\bydan\contabilidad\facturacion\retencion\business\logic\retencion_logic;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_util;

//REL


use com\bydan\contabilidad\inventario\lista_precio\business\entity\lista_precio;
use com\bydan\contabilidad\inventario\lista_precio\business\data\lista_precio_data;
use com\bydan\contabilidad\inventario\lista_precio\business\logic\lista_precio_logic;
use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_carga;
use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_util;

use com\bydan\contabilidad\inventario\producto_bodega\business\entity\producto_bodega;
use com\bydan\contabilidad\inventario\producto_bodega\business\data\producto_bodega_data;
use com\bydan\contabilidad\inventario\producto_bodega\business\logic\producto_bodega_logic;
use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_carga;
use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_util;

use com\bydan\contabilidad\inventario\otro_suplidor\business\entity\otro_suplidor;
use com\bydan\contabilidad\inventario\otro_suplidor\business\data\otro_suplidor_data;
use com\bydan\contabilidad\inventario\otro_suplidor\business\logic\otro_suplidor_logic;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_carga;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_util;

use com\bydan\contabilidad\inventario\lista_cliente\business\entity\lista_cliente;
use com\bydan\contabilidad\inventario\lista_cliente\business\data\lista_cliente_data;
use com\bydan\contabilidad\inventario\lista_cliente\business\logic\lista_cliente_logic;
use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_carga;
use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_util;

use com\bydan\contabilidad\inventario\imagen_producto\business\entity\imagen_producto;
use com\bydan\contabilidad\inventario\imagen_producto\business\data\imagen_producto_data;
use com\bydan\contabilidad\inventario\imagen_producto\business\logic\imagen_producto_logic;
use com\bydan\contabilidad\inventario\imagen_producto\util\imagen_producto_carga;
use com\bydan\contabilidad\inventario\imagen_producto\util\imagen_producto_util;

use com\bydan\contabilidad\inventario\lista_producto\business\entity\lista_producto;
use com\bydan\contabilidad\inventario\lista_producto\business\data\lista_producto_data;
use com\bydan\contabilidad\inventario\lista_producto\business\logic\lista_producto_logic;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;

//REL DETALLES

use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_carga;



class producto_logic  extends GeneralEntityLogic implements producto_logicI {	
	/*GENERAL*/
	public producto_data $productoDataAccess;
	public ?producto_logic_add $productoLogicAdditional=null;
	public ?producto $producto;
	public array $productos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->productoDataAccess = new producto_data();			
			$this->productos = array();
			$this->producto = new producto();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->productoLogicAdditional = new producto_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->productoLogicAdditional==null) {
			$this->productoLogicAdditional=new producto_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->productoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->productoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->productoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->productoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->productos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_util::refrescarFKDescripciones($this->productos);
			}
			
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->productos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->productos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_util::refrescarFKDescripciones($this->productos);
			}
			
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->productos);
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
		$this->producto = new producto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->producto=$this->productoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				producto_util::refrescarFKDescripcion($this->producto);
			}
						
			producto_logic_add::checkproductoToGet($this->producto,$this->datosCliente);
			producto_logic_add::updateproductoToGet($this->producto);
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
		$this->producto = new  producto();
		  		  
        try {		
			$this->producto=$this->productoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				producto_util::refrescarFKDescripcion($this->producto);
			}
			
			producto_logic_add::checkproductoToGet($this->producto,$this->datosCliente);
			producto_logic_add::updateproductoToGet($this->producto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?producto {
		$productoLogic = new  producto_logic();
		  		  
        try {		
			$productoLogic->setConnexion($connexion);			
			$productoLogic->getEntity($id);			
			return $productoLogic->getproducto();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->producto = new  producto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->producto=$this->productoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				producto_util::refrescarFKDescripcion($this->producto);
			}
			
			producto_logic_add::checkproductoToGet($this->producto,$this->datosCliente);
			producto_logic_add::updateproductoToGet($this->producto);
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
		$this->producto = new  producto();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->producto=$this->productoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				producto_util::refrescarFKDescripcion($this->producto);
			}
			
			producto_logic_add::checkproductoToGet($this->producto,$this->datosCliente);
			producto_logic_add::updateproductoToGet($this->producto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?producto {
		$productoLogic = new  producto_logic();
		  		  
        try {		
			$productoLogic->setConnexion($connexion);			
			$productoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $productoLogic->getproducto();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->productos=$this->productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_util::refrescarFKDescripciones($this->productos);
			}
			
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->productos);			
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
		$this->productos = array();
		  		  
        try {			
			$this->productos=$this->productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_util::refrescarFKDescripciones($this->productos);
			}
			
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->productos=$this->productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_util::refrescarFKDescripciones($this->productos);
			}
			
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->productos);
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
		$this->productos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->productos=$this->productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_util::refrescarFKDescripciones($this->productos);
			}
			
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$productoLogic = new  producto_logic();
		  		  
        try {		
			$productoLogic->setConnexion($connexion);			
			$productoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $productoLogic->getproductos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->productos=$this->productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_util::refrescarFKDescripciones($this->productos);
			}
			
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->productos);
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
		$this->productos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->productos=$this->productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_util::refrescarFKDescripciones($this->productos);
			}
			
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->productos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->productos=$this->productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_util::refrescarFKDescripciones($this->productos);
			}
			
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->productos);
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
		$this->productos = array();
		  		  
        try {			
			$this->productos=$this->productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_util::refrescarFKDescripciones($this->productos);
			}	
			
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->productos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->productos=$this->productoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_util::refrescarFKDescripciones($this->productos);
			}
			
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->productos);
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
		$this->productos = array();
		  		  
        try {		
			$this->productos=$this->productoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_util::refrescarFKDescripciones($this->productos);
			}
			
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->productos);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdbodegaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_bodega_defecto) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_bodega_defecto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_bodega_defecto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega_defecto,producto_util::$ID_BODEGA_DEFECTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega_defecto);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idbodega(string $strFinalQuery,Pagination $pagination,int $id_bodega_defecto) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_bodega_defecto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_bodega_defecto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega_defecto,producto_util::$ID_BODEGA_DEFECTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega_defecto);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);
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
			$parameterSelectionGeneralid_categoria_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_categoria_producto,producto_util::$ID_CATEGORIA_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_categoria_producto);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);

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
			$parameterSelectionGeneralid_categoria_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_categoria_producto,producto_util::$ID_CATEGORIA_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_categoria_producto);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idcuenta_compraWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_cuenta_compra) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_compra= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_compra->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_compra,producto_util::$ID_CUENTA_COMPRA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_compra);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta_compra(string $strFinalQuery,Pagination $pagination,?int $id_cuenta_compra) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_compra= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_compra->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_compra,producto_util::$ID_CUENTA_COMPRA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_compra);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idcuenta_inventarioWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_cuenta_costo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_costo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_costo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_costo,producto_util::$ID_CUENTA_COSTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_costo);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta_inventario(string $strFinalQuery,Pagination $pagination,?int $id_cuenta_costo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_costo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_costo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_costo,producto_util::$ID_CUENTA_COSTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_costo);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idcuenta_ventaWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_cuenta_venta) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_venta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_venta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_venta,producto_util::$ID_CUENTA_VENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_venta);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta_venta(string $strFinalQuery,Pagination $pagination,?int $id_cuenta_venta) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_venta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_venta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_venta,producto_util::$ID_CUENTA_VENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_venta);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,producto_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,producto_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);
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
			$parameterSelectionGeneralid_impuesto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_impuesto,producto_util::$ID_IMPUESTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_impuesto);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);

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
			$parameterSelectionGeneralid_impuesto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_impuesto,producto_util::$ID_IMPUESTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_impuesto);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idotro_impuestoWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_otro_impuesto) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_otro_impuesto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_otro_impuesto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_otro_impuesto,producto_util::$ID_OTRO_IMPUESTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_otro_impuesto);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idotro_impuesto(string $strFinalQuery,Pagination $pagination,?int $id_otro_impuesto) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_otro_impuesto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_otro_impuesto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_otro_impuesto,producto_util::$ID_OTRO_IMPUESTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_otro_impuesto);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);
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
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,producto_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);

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
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,producto_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdretencionWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_retencion) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_retencion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_retencion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_retencion,producto_util::$ID_RETENCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_retencion);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idretencion(string $strFinalQuery,Pagination $pagination,?int $id_retencion) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_retencion= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_retencion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_retencion,producto_util::$ID_RETENCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_retencion);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);
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
			$parameterSelectionGeneralid_sub_categoria_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sub_categoria_producto,producto_util::$ID_SUB_CATEGORIA_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sub_categoria_producto);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);

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
			$parameterSelectionGeneralid_sub_categoria_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sub_categoria_producto,producto_util::$ID_SUB_CATEGORIA_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sub_categoria_producto);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);
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
			$parameterSelectionGeneralid_tipo_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_producto,producto_util::$ID_TIPO_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_producto);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);

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
			$parameterSelectionGeneralid_tipo_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_producto,producto_util::$ID_TIPO_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_producto);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);
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
			$parameterSelectionGeneralid_unidad_compra->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad_compra,producto_util::$ID_UNIDAD_COMPRA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad_compra);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);

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
			$parameterSelectionGeneralid_unidad_compra->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad_compra,producto_util::$ID_UNIDAD_COMPRA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad_compra);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);
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
			$parameterSelectionGeneralid_unidad_venta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad_venta,producto_util::$ID_UNIDAD_VENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad_venta);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);

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
			$parameterSelectionGeneralid_unidad_venta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_unidad_venta,producto_util::$ID_UNIDAD_VENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_unidad_venta);

			$this->productos=$this->productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				producto_util::refrescarFKDescripciones($this->productos);
			}
			producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->productos);
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
						
			//producto_logic_add::checkproductoToSave($this->producto,$this->datosCliente,$this->connexion);	       
			producto_logic_add::updateproductoToSave($this->producto);			
			producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->producto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->productoLogicAdditional->checkGeneralEntityToSave($this,$this->producto,$this->datosCliente,$this->connexion);
			
			
			producto_data::save($this->producto, $this->connexion);	    	       	 				
			//producto_logic_add::checkproductoToSaveAfter($this->producto,$this->datosCliente,$this->connexion);			
			$this->productoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->producto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				producto_util::refrescarFKDescripcion($this->producto);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->producto->getIsDeleted()) {
				$this->producto=null;
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
						
			/*producto_logic_add::checkproductoToSave($this->producto,$this->datosCliente,$this->connexion);*/	        
			producto_logic_add::updateproductoToSave($this->producto);			
			$this->productoLogicAdditional->checkGeneralEntityToSave($this,$this->producto,$this->datosCliente,$this->connexion);			
			producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->producto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			producto_data::save($this->producto, $this->connexion);	    	       	 						
			/*producto_logic_add::checkproductoToSaveAfter($this->producto,$this->datosCliente,$this->connexion);*/			
			$this->productoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->producto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				producto_util::refrescarFKDescripcion($this->producto);				
			}
			
			if($this->producto->getIsDeleted()) {
				$this->producto=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(producto $producto,Connexion $connexion)  {
		$productoLogic = new  producto_logic();		  		  
        try {		
			$productoLogic->setConnexion($connexion);			
			$productoLogic->setproducto($producto);			
			$productoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*producto_logic_add::checkproductoToSaves($this->productos,$this->datosCliente,$this->connexion);*/	        	
			$this->productoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->productos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->productos as $productoLocal) {				
								
				producto_logic_add::updateproductoToSave($productoLocal);	        	
				producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$productoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				producto_data::save($productoLocal, $this->connexion);				
			}
			
			/*producto_logic_add::checkproductoToSavesAfter($this->productos,$this->datosCliente,$this->connexion);*/			
			$this->productoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->productos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_util::refrescarFKDescripciones($this->productos);
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
			/*producto_logic_add::checkproductoToSaves($this->productos,$this->datosCliente,$this->connexion);*/			
			$this->productoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->productos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->productos as $productoLocal) {				
								
				producto_logic_add::updateproductoToSave($productoLocal);	        	
				producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$productoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				producto_data::save($productoLocal, $this->connexion);				
			}			
			
			/*producto_logic_add::checkproductoToSavesAfter($this->productos,$this->datosCliente,$this->connexion);*/			
			$this->productoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->productos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				producto_util::refrescarFKDescripciones($this->productos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $productos,Connexion $connexion)  {
		$productoLogic = new  producto_logic();
		  		  
        try {		
			$productoLogic->setConnexion($connexion);			
			$productoLogic->setproductos($productos);			
			$productoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$productosAux=array();
		
		foreach($this->productos as $producto) {
			if($producto->getIsDeleted()==false) {
				$productosAux[]=$producto;
			}
		}
		
		$this->productos=$productosAux;
	}
	
	public function updateToGetsAuxiliar(array &$productos) {
		if($this->productoLogicAdditional==null) {
			$this->productoLogicAdditional=new producto_logic_add();
		}
		
		
		$this->productoLogicAdditional->updateToGets($productos,$this);					
		$this->productoLogicAdditional->updateToGetsReferencia($productos,$this);			
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->productos as $producto) {
				
				$producto->setid_empresa_Descripcion(producto_util::getempresaDescripcion($producto->getempresa()));
				$producto->setid_proveedor_Descripcion(producto_util::getproveedorDescripcion($producto->getproveedor()));
				$producto->setid_tipo_producto_Descripcion(producto_util::gettipo_productoDescripcion($producto->gettipo_producto()));
				$producto->setid_impuesto_Descripcion(producto_util::getimpuestoDescripcion($producto->getimpuesto()));
				$producto->setid_otro_impuesto_Descripcion(producto_util::getotro_impuestoDescripcion($producto->getotro_impuesto()));
				$producto->setid_categoria_producto_Descripcion(producto_util::getcategoria_productoDescripcion($producto->getcategoria_producto()));
				$producto->setid_sub_categoria_producto_Descripcion(producto_util::getsub_categoria_productoDescripcion($producto->getsub_categoria_producto()));
				$producto->setid_bodega_defecto_Descripcion(producto_util::getbodega_defectoDescripcion($producto->getbodega_defecto()));
				$producto->setid_unidad_compra_Descripcion(producto_util::getunidad_compraDescripcion($producto->getunidad_compra()));
				$producto->setid_unidad_venta_Descripcion(producto_util::getunidad_ventaDescripcion($producto->getunidad_venta()));
				$producto->setid_cuenta_venta_Descripcion(producto_util::getcuenta_ventaDescripcion($producto->getcuenta_venta()));
				$producto->setid_cuenta_compra_Descripcion(producto_util::getcuenta_compraDescripcion($producto->getcuenta_compra()));
				$producto->setid_cuenta_costo_Descripcion(producto_util::getcuenta_costoDescripcion($producto->getcuenta_costo()));
				$producto->setid_retencion_Descripcion(producto_util::getretencionDescripcion($producto->getretencion()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$productoForeignKey=new producto_param_return();//productoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosproveedorsFK($this->connexion,$strRecargarFkQuery,$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_productosFK($this->connexion,$strRecargarFkQuery,$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_impuesto',$strRecargarFkTipos,',')) {
				$this->cargarCombosimpuestosFK($this->connexion,$strRecargarFkQuery,$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_otro_impuesto',$strRecargarFkTipos,',')) {
				$this->cargarCombosotro_impuestosFK($this->connexion,$strRecargarFkQuery,$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_categoria_producto',$strRecargarFkTipos,',')) {
				$this->cargarComboscategoria_productosFK($this->connexion,$strRecargarFkQuery,$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sub_categoria_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombossub_categoria_productosFK($this->connexion,$strRecargarFkQuery,$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega_defecto',$strRecargarFkTipos,',')) {
				$this->cargarCombosbodega_defectosFK($this->connexion,$strRecargarFkQuery,$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_unidad_compra',$strRecargarFkTipos,',')) {
				$this->cargarCombosunidad_comprasFK($this->connexion,$strRecargarFkQuery,$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_unidad_venta',$strRecargarFkTipos,',')) {
				$this->cargarCombosunidad_ventasFK($this->connexion,$strRecargarFkQuery,$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_venta',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_ventasFK($this->connexion,$strRecargarFkQuery,$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_compra',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_comprasFK($this->connexion,$strRecargarFkQuery,$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_costo',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_costosFK($this->connexion,$strRecargarFkQuery,$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_retencion',$strRecargarFkTipos,',')) {
				$this->cargarCombosretencionsFK($this->connexion,$strRecargarFkQuery,$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproveedorsFK($this->connexion,' where id=-1 ',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_productosFK($this->connexion,' where id=-1 ',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_impuesto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosimpuestosFK($this->connexion,' where id=-1 ',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_otro_impuesto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosotro_impuestosFK($this->connexion,' where id=-1 ',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_categoria_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscategoria_productosFK($this->connexion,' where id=-1 ',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sub_categoria_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossub_categoria_productosFK($this->connexion,' where id=-1 ',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_bodega_defecto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosbodega_defectosFK($this->connexion,' where id=-1 ',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_unidad_compra',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosunidad_comprasFK($this->connexion,' where id=-1 ',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_unidad_venta',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosunidad_ventasFK($this->connexion,' where id=-1 ',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_venta',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_ventasFK($this->connexion,' where id=-1 ',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_compra',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_comprasFK($this->connexion,' where id=-1 ',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_costo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_costosFK($this->connexion,' where id=-1 ',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_retencion',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosretencionsFK($this->connexion,' where id=-1 ',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $productoForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$productoForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($productoForeignKey->idempresaDefaultFK==0) {
					$productoForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$productoForeignKey->empresasFK[$empresaLocal->getId()]=producto_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($producto_session->bigidempresaActual!=null && $producto_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($producto_session->bigidempresaActual);//WithConnection

				$productoForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=producto_util::getempresaDescripcion($empresaLogic->getempresa());
				$productoForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombosproveedorsFK($connexion=null,$strRecargarFkQuery='',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$proveedorLogic= new proveedor_logic();
		$pagination= new Pagination();
		$productoForeignKey->proveedorsFK=array();

		$proveedorLogic->setConnexion($connexion);
		$proveedorLogic->getproveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesionproveedor!=true) {
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
				if($productoForeignKey->idproveedorDefaultFK==0) {
					$productoForeignKey->idproveedorDefaultFK=$proveedorLocal->getId();
				}

				$productoForeignKey->proveedorsFK[$proveedorLocal->getId()]=producto_util::getproveedorDescripcion($proveedorLocal);
			}

		} else {

			if($producto_session->bigidproveedorActual!=null && $producto_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($producto_session->bigidproveedorActual);//WithConnection

				$productoForeignKey->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=producto_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$productoForeignKey->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	public function cargarCombostipo_productosFK($connexion=null,$strRecargarFkQuery='',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_productoLogic= new tipo_producto_logic();
		$pagination= new Pagination();
		$productoForeignKey->tipo_productosFK=array();

		$tipo_productoLogic->setConnexion($connexion);
		$tipo_productoLogic->gettipo_productoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesiontipo_producto!=true) {
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
				if($productoForeignKey->idtipo_productoDefaultFK==0) {
					$productoForeignKey->idtipo_productoDefaultFK=$tipo_productoLocal->getId();
				}

				$productoForeignKey->tipo_productosFK[$tipo_productoLocal->getId()]=producto_util::gettipo_productoDescripcion($tipo_productoLocal);
			}

		} else {

			if($producto_session->bigidtipo_productoActual!=null && $producto_session->bigidtipo_productoActual > 0) {
				$tipo_productoLogic->getEntity($producto_session->bigidtipo_productoActual);//WithConnection

				$productoForeignKey->tipo_productosFK[$tipo_productoLogic->gettipo_producto()->getId()]=producto_util::gettipo_productoDescripcion($tipo_productoLogic->gettipo_producto());
				$productoForeignKey->idtipo_productoDefaultFK=$tipo_productoLogic->gettipo_producto()->getId();
			}
		}
	}

	public function cargarCombosimpuestosFK($connexion=null,$strRecargarFkQuery='',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$impuestoLogic= new impuesto_logic();
		$pagination= new Pagination();
		$productoForeignKey->impuestosFK=array();

		$impuestoLogic->setConnexion($connexion);
		$impuestoLogic->getimpuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesionimpuesto!=true) {
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
				if($productoForeignKey->idimpuestoDefaultFK==0) {
					$productoForeignKey->idimpuestoDefaultFK=$impuestoLocal->getId();
				}

				$productoForeignKey->impuestosFK[$impuestoLocal->getId()]=producto_util::getimpuestoDescripcion($impuestoLocal);
			}

		} else {

			if($producto_session->bigidimpuestoActual!=null && $producto_session->bigidimpuestoActual > 0) {
				$impuestoLogic->getEntity($producto_session->bigidimpuestoActual);//WithConnection

				$productoForeignKey->impuestosFK[$impuestoLogic->getimpuesto()->getId()]=producto_util::getimpuestoDescripcion($impuestoLogic->getimpuesto());
				$productoForeignKey->idimpuestoDefaultFK=$impuestoLogic->getimpuesto()->getId();
			}
		}
	}

	public function cargarCombosotro_impuestosFK($connexion=null,$strRecargarFkQuery='',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$otro_impuestoLogic= new otro_impuesto_logic();
		$pagination= new Pagination();
		$productoForeignKey->otro_impuestosFK=array();

		$otro_impuestoLogic->setConnexion($connexion);
		$otro_impuestoLogic->getotro_impuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesionotro_impuesto!=true) {
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
				if($productoForeignKey->idotro_impuestoDefaultFK==0) {
					$productoForeignKey->idotro_impuestoDefaultFK=$otro_impuestoLocal->getId();
				}

				$productoForeignKey->otro_impuestosFK[$otro_impuestoLocal->getId()]=producto_util::getotro_impuestoDescripcion($otro_impuestoLocal);
			}

		} else {

			if($producto_session->bigidotro_impuestoActual!=null && $producto_session->bigidotro_impuestoActual > 0) {
				$otro_impuestoLogic->getEntity($producto_session->bigidotro_impuestoActual);//WithConnection

				$productoForeignKey->otro_impuestosFK[$otro_impuestoLogic->getotro_impuesto()->getId()]=producto_util::getotro_impuestoDescripcion($otro_impuestoLogic->getotro_impuesto());
				$productoForeignKey->idotro_impuestoDefaultFK=$otro_impuestoLogic->getotro_impuesto()->getId();
			}
		}
	}

	public function cargarComboscategoria_productosFK($connexion=null,$strRecargarFkQuery='',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$categoria_productoLogic= new categoria_producto_logic();
		$pagination= new Pagination();
		$productoForeignKey->categoria_productosFK=array();

		$categoria_productoLogic->setConnexion($connexion);
		$categoria_productoLogic->getcategoria_productoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesioncategoria_producto!=true) {
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
				if($productoForeignKey->idcategoria_productoDefaultFK==0) {
					$productoForeignKey->idcategoria_productoDefaultFK=$categoria_productoLocal->getId();
				}

				$productoForeignKey->categoria_productosFK[$categoria_productoLocal->getId()]=producto_util::getcategoria_productoDescripcion($categoria_productoLocal);
			}

		} else {

			if($producto_session->bigidcategoria_productoActual!=null && $producto_session->bigidcategoria_productoActual > 0) {
				$categoria_productoLogic->getEntity($producto_session->bigidcategoria_productoActual);//WithConnection

				$productoForeignKey->categoria_productosFK[$categoria_productoLogic->getcategoria_producto()->getId()]=producto_util::getcategoria_productoDescripcion($categoria_productoLogic->getcategoria_producto());
				$productoForeignKey->idcategoria_productoDefaultFK=$categoria_productoLogic->getcategoria_producto()->getId();
			}
		}
	}

	public function cargarCombossub_categoria_productosFK($connexion=null,$strRecargarFkQuery='',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sub_categoria_productoLogic= new sub_categoria_producto_logic();
		$pagination= new Pagination();
		$productoForeignKey->sub_categoria_productosFK=array();

		$sub_categoria_productoLogic->setConnexion($connexion);
		$sub_categoria_productoLogic->getsub_categoria_productoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesionsub_categoria_producto!=true) {
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
				if($productoForeignKey->idsub_categoria_productoDefaultFK==0) {
					$productoForeignKey->idsub_categoria_productoDefaultFK=$sub_categoria_productoLocal->getId();
				}

				$productoForeignKey->sub_categoria_productosFK[$sub_categoria_productoLocal->getId()]=producto_util::getsub_categoria_productoDescripcion($sub_categoria_productoLocal);
			}

		} else {

			if($producto_session->bigidsub_categoria_productoActual!=null && $producto_session->bigidsub_categoria_productoActual > 0) {
				$sub_categoria_productoLogic->getEntity($producto_session->bigidsub_categoria_productoActual);//WithConnection

				$productoForeignKey->sub_categoria_productosFK[$sub_categoria_productoLogic->getsub_categoria_producto()->getId()]=producto_util::getsub_categoria_productoDescripcion($sub_categoria_productoLogic->getsub_categoria_producto());
				$productoForeignKey->idsub_categoria_productoDefaultFK=$sub_categoria_productoLogic->getsub_categoria_producto()->getId();
			}
		}
	}

	public function cargarCombosbodega_defectosFK($connexion=null,$strRecargarFkQuery='',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$productoForeignKey->bodega_defectosFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesionbodega_defecto!=true) {
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
				if($productoForeignKey->idbodega_defectoDefaultFK==0) {
					$productoForeignKey->idbodega_defectoDefaultFK=$bodegaLocal->getId();
				}

				$productoForeignKey->bodega_defectosFK[$bodegaLocal->getId()]=producto_util::getbodega_defectoDescripcion($bodegaLocal);
			}

		} else {

			if($producto_session->bigidbodega_defectoActual!=null && $producto_session->bigidbodega_defectoActual > 0) {
				$bodegaLogic->getEntity($producto_session->bigidbodega_defectoActual);//WithConnection

				$productoForeignKey->bodega_defectosFK[$bodegaLogic->getbodega()->getId()]=producto_util::getbodega_defectoDescripcion($bodegaLogic->getbodega());
				$productoForeignKey->idbodega_defectoDefaultFK=$bodegaLogic->getbodega()->getId();
			}
		}
	}

	public function cargarCombosunidad_comprasFK($connexion=null,$strRecargarFkQuery='',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$unidadLogic= new unidad_logic();
		$pagination= new Pagination();
		$productoForeignKey->unidad_comprasFK=array();

		$unidadLogic->setConnexion($connexion);
		$unidadLogic->getunidadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesionunidad_compra!=true) {
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
				if($productoForeignKey->idunidad_compraDefaultFK==0) {
					$productoForeignKey->idunidad_compraDefaultFK=$unidadLocal->getId();
				}

				$productoForeignKey->unidad_comprasFK[$unidadLocal->getId()]=producto_util::getunidad_compraDescripcion($unidadLocal);
			}

		} else {

			if($producto_session->bigidunidad_compraActual!=null && $producto_session->bigidunidad_compraActual > 0) {
				$unidadLogic->getEntity($producto_session->bigidunidad_compraActual);//WithConnection

				$productoForeignKey->unidad_comprasFK[$unidadLogic->getunidad()->getId()]=producto_util::getunidad_compraDescripcion($unidadLogic->getunidad());
				$productoForeignKey->idunidad_compraDefaultFK=$unidadLogic->getunidad()->getId();
			}
		}
	}

	public function cargarCombosunidad_ventasFK($connexion=null,$strRecargarFkQuery='',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$unidadLogic= new unidad_logic();
		$pagination= new Pagination();
		$productoForeignKey->unidad_ventasFK=array();

		$unidadLogic->setConnexion($connexion);
		$unidadLogic->getunidadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesionunidad_venta!=true) {
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
				if($productoForeignKey->idunidad_ventaDefaultFK==0) {
					$productoForeignKey->idunidad_ventaDefaultFK=$unidadLocal->getId();
				}

				$productoForeignKey->unidad_ventasFK[$unidadLocal->getId()]=producto_util::getunidad_ventaDescripcion($unidadLocal);
			}

		} else {

			if($producto_session->bigidunidad_ventaActual!=null && $producto_session->bigidunidad_ventaActual > 0) {
				$unidadLogic->getEntity($producto_session->bigidunidad_ventaActual);//WithConnection

				$productoForeignKey->unidad_ventasFK[$unidadLogic->getunidad()->getId()]=producto_util::getunidad_ventaDescripcion($unidadLogic->getunidad());
				$productoForeignKey->idunidad_ventaDefaultFK=$unidadLogic->getunidad()->getId();
			}
		}
	}

	public function cargarComboscuenta_ventasFK($connexion=null,$strRecargarFkQuery='',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$productoForeignKey->cuenta_ventasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesioncuenta_venta!=true) {
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
				if($productoForeignKey->idcuenta_ventaDefaultFK==0) {
					$productoForeignKey->idcuenta_ventaDefaultFK=$cuentaLocal->getId();
				}

				$productoForeignKey->cuenta_ventasFK[$cuentaLocal->getId()]=producto_util::getcuenta_ventaDescripcion($cuentaLocal);
			}

		} else {

			if($producto_session->bigidcuenta_ventaActual!=null && $producto_session->bigidcuenta_ventaActual > 0) {
				$cuentaLogic->getEntity($producto_session->bigidcuenta_ventaActual);//WithConnection

				$productoForeignKey->cuenta_ventasFK[$cuentaLogic->getcuenta()->getId()]=producto_util::getcuenta_ventaDescripcion($cuentaLogic->getcuenta());
				$productoForeignKey->idcuenta_ventaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarComboscuenta_comprasFK($connexion=null,$strRecargarFkQuery='',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$productoForeignKey->cuenta_comprasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesioncuenta_compra!=true) {
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
				if($productoForeignKey->idcuenta_compraDefaultFK==0) {
					$productoForeignKey->idcuenta_compraDefaultFK=$cuentaLocal->getId();
				}

				$productoForeignKey->cuenta_comprasFK[$cuentaLocal->getId()]=producto_util::getcuenta_compraDescripcion($cuentaLocal);
			}

		} else {

			if($producto_session->bigidcuenta_compraActual!=null && $producto_session->bigidcuenta_compraActual > 0) {
				$cuentaLogic->getEntity($producto_session->bigidcuenta_compraActual);//WithConnection

				$productoForeignKey->cuenta_comprasFK[$cuentaLogic->getcuenta()->getId()]=producto_util::getcuenta_compraDescripcion($cuentaLogic->getcuenta());
				$productoForeignKey->idcuenta_compraDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarComboscuenta_costosFK($connexion=null,$strRecargarFkQuery='',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$productoForeignKey->cuenta_costosFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesioncuenta_costo!=true) {
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
				if($productoForeignKey->idcuenta_costoDefaultFK==0) {
					$productoForeignKey->idcuenta_costoDefaultFK=$cuentaLocal->getId();
				}

				$productoForeignKey->cuenta_costosFK[$cuentaLocal->getId()]=producto_util::getcuenta_costoDescripcion($cuentaLocal);
			}

		} else {

			if($producto_session->bigidcuenta_costoActual!=null && $producto_session->bigidcuenta_costoActual > 0) {
				$cuentaLogic->getEntity($producto_session->bigidcuenta_costoActual);//WithConnection

				$productoForeignKey->cuenta_costosFK[$cuentaLogic->getcuenta()->getId()]=producto_util::getcuenta_costoDescripcion($cuentaLogic->getcuenta());
				$productoForeignKey->idcuenta_costoDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarCombosretencionsFK($connexion=null,$strRecargarFkQuery='',$productoForeignKey,$producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$retencionLogic= new retencion_logic();
		$pagination= new Pagination();
		$productoForeignKey->retencionsFK=array();

		$retencionLogic->setConnexion($connexion);
		$retencionLogic->getretencionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesionretencion!=true) {
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
				if($productoForeignKey->idretencionDefaultFK==0) {
					$productoForeignKey->idretencionDefaultFK=$retencionLocal->getId();
				}

				$productoForeignKey->retencionsFK[$retencionLocal->getId()]=producto_util::getretencionDescripcion($retencionLocal);
			}

		} else {

			if($producto_session->bigidretencionActual!=null && $producto_session->bigidretencionActual > 0) {
				$retencionLogic->getEntity($producto_session->bigidretencionActual);//WithConnection

				$productoForeignKey->retencionsFK[$retencionLogic->getretencion()->getId()]=producto_util::getretencionDescripcion($retencionLogic->getretencion());
				$productoForeignKey->idretencionDefaultFK=$retencionLogic->getretencion()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($producto,$listaprecios,$productobodegas,$otrosuplidors,$listaclientes,$imagenproductos,$listaproductos) {
		$this->saveRelacionesBase($producto,$listaprecios,$productobodegas,$otrosuplidors,$listaclientes,$imagenproductos,$listaproductos,true);
	}

	public function saveRelaciones($producto,$listaprecios,$productobodegas,$otrosuplidors,$listaclientes,$imagenproductos,$listaproductos) {
		$this->saveRelacionesBase($producto,$listaprecios,$productobodegas,$otrosuplidors,$listaclientes,$imagenproductos,$listaproductos,false);
	}

	public function saveRelacionesBase($producto,$listaprecios=array(),$productobodegas=array(),$otrosuplidors=array(),$listaclientes=array(),$imagenproductos=array(),$listaproductos=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$producto->setlista_precios($listaprecios);
			$producto->setproducto_bodegas($productobodegas);
			$producto->setotro_suplidors($otrosuplidors);
			$producto->setlista_clientes($listaclientes);
			$producto->setimagen_productos($imagenproductos);
			$producto->setlista_productos($listaproductos);
			$this->setproducto($producto);

			if(producto_logic_add::validarSaveRelaciones($producto,$this)) {

				producto_logic_add::updateRelacionesToSave($producto,$this);

				if(($this->producto->getIsNew() || $this->producto->getIsChanged()) && !$this->producto->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($listaprecios,$productobodegas,$otrosuplidors,$listaclientes,$imagenproductos,$listaproductos);

				} else if($this->producto->getIsDeleted()) {
					$this->saveRelacionesDetalles($listaprecios,$productobodegas,$otrosuplidors,$listaclientes,$imagenproductos,$listaproductos);
					$this->save();
				}

				producto_logic_add::updateRelacionesToSaveAfter($producto,$this);

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
	
	
	public function saveRelacionesDetalles($listaprecios=array(),$productobodegas=array(),$otrosuplidors=array(),$listaclientes=array(),$imagenproductos=array(),$listaproductos=array()) {
		try {
	

			$idproductoActual=$this->getproducto()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/lista_precio_carga.php');
			lista_precio_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$listaprecioLogic_Desde_producto=new lista_precio_logic();
			$listaprecioLogic_Desde_producto->setlista_precios($listaprecios);

			$listaprecioLogic_Desde_producto->setConnexion($this->getConnexion());
			$listaprecioLogic_Desde_producto->setDatosCliente($this->datosCliente);

			foreach($listaprecioLogic_Desde_producto->getlista_precios() as $listaprecio_Desde_producto) {
				$listaprecio_Desde_producto->setid_producto($idproductoActual);
			}

			$listaprecioLogic_Desde_producto->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/producto_bodega_carga.php');
			producto_bodega_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$productobodegaLogic_Desde_producto=new producto_bodega_logic();
			$productobodegaLogic_Desde_producto->setproducto_bodegas($productobodegas);

			$productobodegaLogic_Desde_producto->setConnexion($this->getConnexion());
			$productobodegaLogic_Desde_producto->setDatosCliente($this->datosCliente);

			foreach($productobodegaLogic_Desde_producto->getproducto_bodegas() as $productobodega_Desde_producto) {
				$productobodega_Desde_producto->setid_producto($idproductoActual);
			}

			$productobodegaLogic_Desde_producto->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/otro_suplidor_carga.php');
			otro_suplidor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$otrosuplidorLogic_Desde_producto=new otro_suplidor_logic();
			$otrosuplidorLogic_Desde_producto->setotro_suplidors($otrosuplidors);

			$otrosuplidorLogic_Desde_producto->setConnexion($this->getConnexion());
			$otrosuplidorLogic_Desde_producto->setDatosCliente($this->datosCliente);

			foreach($otrosuplidorLogic_Desde_producto->getotro_suplidors() as $otrosuplidor_Desde_producto) {
				$otrosuplidor_Desde_producto->setid_producto($idproductoActual);

				$otrosuplidorLogic_Desde_producto->setotro_suplidor($otrosuplidor_Desde_producto);
				$otrosuplidorLogic_Desde_producto->save();

				$idotro_suplidorActual=$otro_suplidor_Desde_producto->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/cotizacion_detalle_carga.php');
				cotizacion_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$cotizaciondetalleLogic_Desde_otro_suplidor=new cotizacion_detalle_logic();

				if($otro_suplidor_Desde_producto->getcotizacion_detalles()==null){
					$otro_suplidor_Desde_producto->setcotizacion_detalles(array());
				}

				$cotizaciondetalleLogic_Desde_otro_suplidor->setcotizacion_detalles($otro_suplidor_Desde_producto->getcotizacion_detalles());

				$cotizaciondetalleLogic_Desde_otro_suplidor->setConnexion($this->getConnexion());
				$cotizaciondetalleLogic_Desde_otro_suplidor->setDatosCliente($this->datosCliente);

				foreach($cotizaciondetalleLogic_Desde_otro_suplidor->getcotizacion_detalles() as $cotizaciondetalle_Desde_otro_suplidor) {
					$cotizaciondetalle_Desde_otro_suplidor->setid_otro_suplidor($idotro_suplidorActual);
				}

				$cotizaciondetalleLogic_Desde_otro_suplidor->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/lista_producto_carga.php');
				lista_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$listaproductoLogic_Desde_otro_suplidor=new lista_producto_logic();

				if($otro_suplidor_Desde_producto->getlista_productos()==null){
					$otro_suplidor_Desde_producto->setlista_productos(array());
				}

				$listaproductoLogic_Desde_otro_suplidor->setlista_productos($otro_suplidor_Desde_producto->getlista_productos());

				$listaproductoLogic_Desde_otro_suplidor->setConnexion($this->getConnexion());
				$listaproductoLogic_Desde_otro_suplidor->setDatosCliente($this->datosCliente);

				foreach($listaproductoLogic_Desde_otro_suplidor->getlista_productos() as $listaproducto_Desde_otro_suplidor) {
					$listaproducto_Desde_otro_suplidor->setid_otro_suplidor($idotro_suplidorActual);
				}

				$listaproductoLogic_Desde_otro_suplidor->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/lista_cliente_carga.php');
			lista_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$listaclienteLogic_Desde_producto=new lista_cliente_logic();
			$listaclienteLogic_Desde_producto->setlista_clientes($listaclientes);

			$listaclienteLogic_Desde_producto->setConnexion($this->getConnexion());
			$listaclienteLogic_Desde_producto->setDatosCliente($this->datosCliente);

			foreach($listaclienteLogic_Desde_producto->getlista_clientes() as $listacliente_Desde_producto) {
				$listacliente_Desde_producto->setid_producto($idproductoActual);
			}

			$listaclienteLogic_Desde_producto->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/imagen_producto_carga.php');
			imagen_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$imagenproductoLogic_Desde_producto=new imagen_producto_logic();
			$imagenproductoLogic_Desde_producto->setimagen_productos($imagenproductos);

			$imagenproductoLogic_Desde_producto->setConnexion($this->getConnexion());
			$imagenproductoLogic_Desde_producto->setDatosCliente($this->datosCliente);

			foreach($imagenproductoLogic_Desde_producto->getimagen_productos() as $imagenproducto_Desde_producto) {
				$imagenproducto_Desde_producto->setid_producto($idproductoActual);
			}

			$imagenproductoLogic_Desde_producto->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/lista_producto_carga.php');
			lista_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$listaproductoLogic_Desde_producto=new lista_producto_logic();
			$listaproductoLogic_Desde_producto->setlista_productos($listaproductos);

			$listaproductoLogic_Desde_producto->setConnexion($this->getConnexion());
			$listaproductoLogic_Desde_producto->setDatosCliente($this->datosCliente);

			foreach($listaproductoLogic_Desde_producto->getlista_productos() as $listaproducto_Desde_producto) {
				$listaproducto_Desde_producto->setid_producto($idproductoActual);
			}

			$listaproductoLogic_Desde_producto->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $productos,producto_param_return $productoParameterGeneral) : producto_param_return {
		$productoReturnGeneral=new producto_param_return();
	
		 try {	
			
			if($this->productoLogicAdditional==null) {
				$this->productoLogicAdditional=new producto_logic_add();
			}
			
			$this->productoLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$productos,$productoParameterGeneral,$productoReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $productoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $productos,producto_param_return $productoParameterGeneral) : producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$productoReturnGeneral=new producto_param_return();
	
			
			if($this->productoLogicAdditional==null) {
				$this->productoLogicAdditional=new producto_logic_add();
			}
			
			$this->productoLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$productos,$productoParameterGeneral,$productoReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $productos,producto $producto,producto_param_return $productoParameterGeneral,bool $isEsNuevoproducto,array $clases) : producto_param_return {
		 try {	
			$productoReturnGeneral=new producto_param_return();
	
			$productoReturnGeneral->setproducto($producto);
			$productoReturnGeneral->setproductos($productos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$productoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->productoLogicAdditional==null) {
				$this->productoLogicAdditional=new producto_logic_add();
			}
			
			$productoReturnGeneral=$this->productoLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$productos,$producto,$productoParameterGeneral,$productoReturnGeneral,$isEsNuevoproducto,$clases);
			
			/*productoLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$productos,$producto,$productoParameterGeneral,$productoReturnGeneral,$isEsNuevoproducto,$clases);*/
			
			return $productoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $productos,producto $producto,producto_param_return $productoParameterGeneral,bool $isEsNuevoproducto,array $clases) : producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$productoReturnGeneral=new producto_param_return();
	
			$productoReturnGeneral->setproducto($producto);
			$productoReturnGeneral->setproductos($productos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$productoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->productoLogicAdditional==null) {
				$this->productoLogicAdditional=new producto_logic_add();
			}
			
			$productoReturnGeneral=$this->productoLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$productos,$producto,$productoParameterGeneral,$productoReturnGeneral,$isEsNuevoproducto,$clases);
			
			/*productoLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$productos,$producto,$productoParameterGeneral,$productoReturnGeneral,$isEsNuevoproducto,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $productos,producto $producto,producto_param_return $productoParameterGeneral,bool $isEsNuevoproducto,array $clases) : producto_param_return {
		 try {	
			$productoReturnGeneral=new producto_param_return();
	
			$productoReturnGeneral->setproducto($producto);
			$productoReturnGeneral->setproductos($productos);
			
			
			
			if($this->productoLogicAdditional==null) {
				$this->productoLogicAdditional=new producto_logic_add();
			}
			
			$productoReturnGeneral=$this->productoLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$productos,$producto,$productoParameterGeneral,$productoReturnGeneral,$isEsNuevoproducto,$clases);
			
			/*productoLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$productos,$producto,$productoParameterGeneral,$productoReturnGeneral,$isEsNuevoproducto,$clases);*/
			
			return $productoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $productos,producto $producto,producto_param_return $productoParameterGeneral,bool $isEsNuevoproducto,array $clases) : producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$productoReturnGeneral=new producto_param_return();
	
			$productoReturnGeneral->setproducto($producto);
			$productoReturnGeneral->setproductos($productos);
			
			
			if($this->productoLogicAdditional==null) {
				$this->productoLogicAdditional=new producto_logic_add();
			}
			
			$productoReturnGeneral=$this->productoLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$productos,$producto,$productoParameterGeneral,$productoReturnGeneral,$isEsNuevoproducto,$clases);
			
			/*productoLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$productos,$producto,$productoParameterGeneral,$productoReturnGeneral,$isEsNuevoproducto,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,producto $producto,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,producto $producto,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		producto_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		producto_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(producto $producto,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			producto_logic_add::updateproductoToGet($this->producto);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$producto->setempresa($this->productoDataAccess->getempresa($this->connexion,$producto));
		$producto->setproveedor($this->productoDataAccess->getproveedor($this->connexion,$producto));
		$producto->settipo_producto($this->productoDataAccess->gettipo_producto($this->connexion,$producto));
		$producto->setimpuesto($this->productoDataAccess->getimpuesto($this->connexion,$producto));
		$producto->setotro_impuesto($this->productoDataAccess->getotro_impuesto($this->connexion,$producto));
		$producto->setcategoria_producto($this->productoDataAccess->getcategoria_producto($this->connexion,$producto));
		$producto->setsub_categoria_producto($this->productoDataAccess->getsub_categoria_producto($this->connexion,$producto));
		$producto->setbodega_defecto($this->productoDataAccess->getbodega_defecto($this->connexion,$producto));
		$producto->setunidad_compra($this->productoDataAccess->getunidad_compra($this->connexion,$producto));
		$producto->setunidad_venta($this->productoDataAccess->getunidad_venta($this->connexion,$producto));
		$producto->setcuenta_venta($this->productoDataAccess->getcuenta_venta($this->connexion,$producto));
		$producto->setcuenta_compra($this->productoDataAccess->getcuenta_compra($this->connexion,$producto));
		$producto->setcuenta_costo($this->productoDataAccess->getcuenta_costo($this->connexion,$producto));
		$producto->setretencion($this->productoDataAccess->getretencion($this->connexion,$producto));
		$producto->setlista_precios($this->productoDataAccess->getlista_precios($this->connexion,$producto));
		$producto->setproducto_bodegas($this->productoDataAccess->getproducto_bodegas($this->connexion,$producto));
		$producto->setotro_suplidors($this->productoDataAccess->getotro_suplidors($this->connexion,$producto));
		$producto->setlista_clientes($this->productoDataAccess->getlista_clientes($this->connexion,$producto));
		$producto->setbodegas($this->productoDataAccess->getbodegas($this->connexion,$producto));
		$producto->setimagen_productos($this->productoDataAccess->getimagen_productos($this->connexion,$producto));
		$producto->setlista_productos($this->productoDataAccess->getlista_productos($this->connexion,$producto));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$producto->setempresa($this->productoDataAccess->getempresa($this->connexion,$producto));
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$producto->setproveedor($this->productoDataAccess->getproveedor($this->connexion,$producto));
				continue;
			}

			if($clas->clas==tipo_producto::$class.'') {
				$producto->settipo_producto($this->productoDataAccess->gettipo_producto($this->connexion,$producto));
				continue;
			}

			if($clas->clas==impuesto::$class.'') {
				$producto->setimpuesto($this->productoDataAccess->getimpuesto($this->connexion,$producto));
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'') {
				$producto->setotro_impuesto($this->productoDataAccess->getotro_impuesto($this->connexion,$producto));
				continue;
			}

			if($clas->clas==categoria_producto::$class.'') {
				$producto->setcategoria_producto($this->productoDataAccess->getcategoria_producto($this->connexion,$producto));
				continue;
			}

			if($clas->clas==sub_categoria_producto::$class.'') {
				$producto->setsub_categoria_producto($this->productoDataAccess->getsub_categoria_producto($this->connexion,$producto));
				continue;
			}

			if($clas->clas==bodega::$class.'_defecto') {
				$producto->setbodega_defecto($this->productoDataAccess->getbodega_defecto($this->connexion,$producto));
				continue;
			}

			if($clas->clas==unidad::$class.'_compra') {
				$producto->setunidad_compra($this->productoDataAccess->getunidad_compra($this->connexion,$producto));
				continue;
			}

			if($clas->clas==unidad::$class.'_venta') {
				$producto->setunidad_venta($this->productoDataAccess->getunidad_venta($this->connexion,$producto));
				continue;
			}

			if($clas->clas==cuenta::$class.'_venta') {
				$producto->setcuenta_venta($this->productoDataAccess->getcuenta_venta($this->connexion,$producto));
				continue;
			}

			if($clas->clas==cuenta::$class.'_compra') {
				$producto->setcuenta_compra($this->productoDataAccess->getcuenta_compra($this->connexion,$producto));
				continue;
			}

			if($clas->clas==cuenta::$class.'_costo') {
				$producto->setcuenta_costo($this->productoDataAccess->getcuenta_costo($this->connexion,$producto));
				continue;
			}

			if($clas->clas==retencion::$class.'') {
				$producto->setretencion($this->productoDataAccess->getretencion($this->connexion,$producto));
				continue;
			}

			if($clas->clas==lista_precio::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$producto->setlista_precios($this->productoDataAccess->getlista_precios($this->connexion,$producto));

				if($this->isConDeep) {
					$listaprecioLogic= new lista_precio_logic($this->connexion);
					$listaprecioLogic->setlista_precios($producto->getlista_precios());
					$classesLocal=lista_precio_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$listaprecioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					lista_precio_util::refrescarFKDescripciones($listaprecioLogic->getlista_precios());
					$producto->setlista_precios($listaprecioLogic->getlista_precios());
				}

				continue;
			}

			if($clas->clas==producto_bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$producto->setproducto_bodegas($this->productoDataAccess->getproducto_bodegas($this->connexion,$producto));

				if($this->isConDeep) {
					$productobodegaLogic= new producto_bodega_logic($this->connexion);
					$productobodegaLogic->setproducto_bodegas($producto->getproducto_bodegas());
					$classesLocal=producto_bodega_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$productobodegaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					producto_bodega_util::refrescarFKDescripciones($productobodegaLogic->getproducto_bodegas());
					$producto->setproducto_bodegas($productobodegaLogic->getproducto_bodegas());
				}

				continue;
			}

			if($clas->clas==otro_suplidor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$producto->setotro_suplidors($this->productoDataAccess->getotro_suplidors($this->connexion,$producto));

				if($this->isConDeep) {
					$otrosuplidorLogic= new otro_suplidor_logic($this->connexion);
					$otrosuplidorLogic->setotro_suplidors($producto->getotro_suplidors());
					$classesLocal=otro_suplidor_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$otrosuplidorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					otro_suplidor_util::refrescarFKDescripciones($otrosuplidorLogic->getotro_suplidors());
					$producto->setotro_suplidors($otrosuplidorLogic->getotro_suplidors());
				}

				continue;
			}

			if($clas->clas==lista_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$producto->setlista_clientes($this->productoDataAccess->getlista_clientes($this->connexion,$producto));

				if($this->isConDeep) {
					$listaclienteLogic= new lista_cliente_logic($this->connexion);
					$listaclienteLogic->setlista_clientes($producto->getlista_clientes());
					$classesLocal=lista_cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$listaclienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					lista_cliente_util::refrescarFKDescripciones($listaclienteLogic->getlista_clientes());
					$producto->setlista_clientes($listaclienteLogic->getlista_clientes());
				}

				continue;
			}

			if($clas->clas==bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$producto->setbodegas($this->productoDataAccess->getbodegas($this->connexion,$producto));

				if($this->isConDeep) {
					$bodegaLogic= new bodega_logic($this->connexion);
					$bodegaLogic->setbodegas($producto->getbodegas());
					$classesLocal=bodega_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$bodegaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					bodega_util::refrescarFKDescripciones($bodegaLogic->getbodegas());
					$producto->setbodegas($bodegaLogic->getbodegas());
				}

				continue;
			}

			if($clas->clas==imagen_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$producto->setimagen_productos($this->productoDataAccess->getimagen_productos($this->connexion,$producto));

				if($this->isConDeep) {
					$imagenproductoLogic= new imagen_producto_logic($this->connexion);
					$imagenproductoLogic->setimagen_productos($producto->getimagen_productos());
					$classesLocal=imagen_producto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$imagenproductoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					imagen_producto_util::refrescarFKDescripciones($imagenproductoLogic->getimagen_productos());
					$producto->setimagen_productos($imagenproductoLogic->getimagen_productos());
				}

				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$producto->setlista_productos($this->productoDataAccess->getlista_productos($this->connexion,$producto));

				if($this->isConDeep) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproductoLogic->setlista_productos($producto->getlista_productos());
					$classesLocal=lista_producto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$listaproductoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					lista_producto_util::refrescarFKDescripciones($listaproductoLogic->getlista_productos());
					$producto->setlista_productos($listaproductoLogic->getlista_productos());
				}

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
			$producto->setempresa($this->productoDataAccess->getempresa($this->connexion,$producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setproveedor($this->productoDataAccess->getproveedor($this->connexion,$producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->settipo_producto($this->productoDataAccess->gettipo_producto($this->connexion,$producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setimpuesto($this->productoDataAccess->getimpuesto($this->connexion,$producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setotro_impuesto($this->productoDataAccess->getotro_impuesto($this->connexion,$producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==categoria_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setcategoria_producto($this->productoDataAccess->getcategoria_producto($this->connexion,$producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sub_categoria_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setsub_categoria_producto($this->productoDataAccess->getsub_categoria_producto($this->connexion,$producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'_defecto') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setbodega_defecto($this->productoDataAccess->getbodega_defecto($this->connexion,$producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'_compra') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setunidad_compra($this->productoDataAccess->getunidad_compra($this->connexion,$producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'_venta') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setunidad_venta($this->productoDataAccess->getunidad_venta($this->connexion,$producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_venta') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setcuenta_venta($this->productoDataAccess->getcuenta_venta($this->connexion,$producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compra') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setcuenta_compra($this->productoDataAccess->getcuenta_compra($this->connexion,$producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_costo') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setcuenta_costo($this->productoDataAccess->getcuenta_costo($this->connexion,$producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setretencion($this->productoDataAccess->getretencion($this->connexion,$producto));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_precio::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_precio::$class);
			$producto->setlista_precios($this->productoDataAccess->getlista_precios($this->connexion,$producto));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto_bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto_bodega::$class);
			$producto->setproducto_bodegas($this->productoDataAccess->getproducto_bodegas($this->connexion,$producto));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==otro_suplidor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(otro_suplidor::$class);
			$producto->setotro_suplidors($this->productoDataAccess->getotro_suplidors($this->connexion,$producto));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_cliente::$class);
			$producto->setlista_clientes($this->productoDataAccess->getlista_clientes($this->connexion,$producto));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(bodega::$class);
			$producto->setbodegas($this->productoDataAccess->getbodegas($this->connexion,$producto));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_producto::$class);
			$producto->setimagen_productos($this->productoDataAccess->getimagen_productos($this->connexion,$producto));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_producto::$class);
			$producto->setlista_productos($this->productoDataAccess->getlista_productos($this->connexion,$producto));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$producto->setempresa($this->productoDataAccess->getempresa($this->connexion,$producto));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($producto->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$producto->setproveedor($this->productoDataAccess->getproveedor($this->connexion,$producto));
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepLoad($producto->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		$producto->settipo_producto($this->productoDataAccess->gettipo_producto($this->connexion,$producto));
		$tipo_productoLogic= new tipo_producto_logic($this->connexion);
		$tipo_productoLogic->deepLoad($producto->gettipo_producto(),$isDeep,$deepLoadType,$clases);
				
		$producto->setimpuesto($this->productoDataAccess->getimpuesto($this->connexion,$producto));
		$impuestoLogic= new impuesto_logic($this->connexion);
		$impuestoLogic->deepLoad($producto->getimpuesto(),$isDeep,$deepLoadType,$clases);
				
		$producto->setotro_impuesto($this->productoDataAccess->getotro_impuesto($this->connexion,$producto));
		$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
		$otro_impuestoLogic->deepLoad($producto->getotro_impuesto(),$isDeep,$deepLoadType,$clases);
				
		$producto->setcategoria_producto($this->productoDataAccess->getcategoria_producto($this->connexion,$producto));
		$categoria_productoLogic= new categoria_producto_logic($this->connexion);
		$categoria_productoLogic->deepLoad($producto->getcategoria_producto(),$isDeep,$deepLoadType,$clases);
				
		$producto->setsub_categoria_producto($this->productoDataAccess->getsub_categoria_producto($this->connexion,$producto));
		$sub_categoria_productoLogic= new sub_categoria_producto_logic($this->connexion);
		$sub_categoria_productoLogic->deepLoad($producto->getsub_categoria_producto(),$isDeep,$deepLoadType,$clases);
				
		$producto->setbodega_defecto($this->productoDataAccess->getbodega_defecto($this->connexion,$producto));
		$bodega_defectoLogic= new bodega_logic($this->connexion);
		$bodega_defectoLogic->deepLoad($producto->getbodega_defecto(),$isDeep,$deepLoadType,$clases);
				
		$producto->setunidad_compra($this->productoDataAccess->getunidad_compra($this->connexion,$producto));
		$unidad_compraLogic= new unidad_logic($this->connexion);
		$unidad_compraLogic->deepLoad($producto->getunidad_compra(),$isDeep,$deepLoadType,$clases);
				
		$producto->setunidad_venta($this->productoDataAccess->getunidad_venta($this->connexion,$producto));
		$unidad_ventaLogic= new unidad_logic($this->connexion);
		$unidad_ventaLogic->deepLoad($producto->getunidad_venta(),$isDeep,$deepLoadType,$clases);
				
		$producto->setcuenta_venta($this->productoDataAccess->getcuenta_venta($this->connexion,$producto));
		$cuenta_ventaLogic= new cuenta_logic($this->connexion);
		$cuenta_ventaLogic->deepLoad($producto->getcuenta_venta(),$isDeep,$deepLoadType,$clases);
				
		$producto->setcuenta_compra($this->productoDataAccess->getcuenta_compra($this->connexion,$producto));
		$cuenta_compraLogic= new cuenta_logic($this->connexion);
		$cuenta_compraLogic->deepLoad($producto->getcuenta_compra(),$isDeep,$deepLoadType,$clases);
				
		$producto->setcuenta_costo($this->productoDataAccess->getcuenta_costo($this->connexion,$producto));
		$cuenta_costoLogic= new cuenta_logic($this->connexion);
		$cuenta_costoLogic->deepLoad($producto->getcuenta_costo(),$isDeep,$deepLoadType,$clases);
				
		$producto->setretencion($this->productoDataAccess->getretencion($this->connexion,$producto));
		$retencionLogic= new retencion_logic($this->connexion);
		$retencionLogic->deepLoad($producto->getretencion(),$isDeep,$deepLoadType,$clases);
				

		$producto->setlista_precios($this->productoDataAccess->getlista_precios($this->connexion,$producto));

		foreach($producto->getlista_precios() as $listaprecio) {
			$listaprecioLogic= new lista_precio_logic($this->connexion);
			$listaprecioLogic->deepLoad($listaprecio,$isDeep,$deepLoadType,$clases);
		}

		$producto->setproducto_bodegas($this->productoDataAccess->getproducto_bodegas($this->connexion,$producto));

		foreach($producto->getproducto_bodegas() as $productobodega) {
			$productobodegaLogic= new producto_bodega_logic($this->connexion);
			$productobodegaLogic->deepLoad($productobodega,$isDeep,$deepLoadType,$clases);
		}

		$producto->setotro_suplidors($this->productoDataAccess->getotro_suplidors($this->connexion,$producto));

		foreach($producto->getotro_suplidors() as $otrosuplidor) {
			$otrosuplidorLogic= new otro_suplidor_logic($this->connexion);
			$otrosuplidorLogic->deepLoad($otrosuplidor,$isDeep,$deepLoadType,$clases);
		}

		$producto->setlista_clientes($this->productoDataAccess->getlista_clientes($this->connexion,$producto));

		foreach($producto->getlista_clientes() as $listacliente) {
			$listaclienteLogic= new lista_cliente_logic($this->connexion);
			$listaclienteLogic->deepLoad($listacliente,$isDeep,$deepLoadType,$clases);
		}

		$producto->setbodegas($this->productoDataAccess->getbodegas($this->connexion,$producto));

		foreach($producto->getbodegas() as $bodega) {
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepLoad($bodega,$isDeep,$deepLoadType,$clases);
		}

		$producto->setimagen_productos($this->productoDataAccess->getimagen_productos($this->connexion,$producto));

		foreach($producto->getimagen_productos() as $imagenproducto) {
			$imagenproductoLogic= new imagen_producto_logic($this->connexion);
			$imagenproductoLogic->deepLoad($imagenproducto,$isDeep,$deepLoadType,$clases);
		}

		$producto->setlista_productos($this->productoDataAccess->getlista_productos($this->connexion,$producto));

		foreach($producto->getlista_productos() as $listaproducto) {
			$listaproductoLogic= new lista_producto_logic($this->connexion);
			$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$producto->setempresa($this->productoDataAccess->getempresa($this->connexion,$producto));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($producto->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$producto->setproveedor($this->productoDataAccess->getproveedor($this->connexion,$producto));
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($producto->getproveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_producto::$class.'') {
				$producto->settipo_producto($this->productoDataAccess->gettipo_producto($this->connexion,$producto));
				$tipo_productoLogic= new tipo_producto_logic($this->connexion);
				$tipo_productoLogic->deepLoad($producto->gettipo_producto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==impuesto::$class.'') {
				$producto->setimpuesto($this->productoDataAccess->getimpuesto($this->connexion,$producto));
				$impuestoLogic= new impuesto_logic($this->connexion);
				$impuestoLogic->deepLoad($producto->getimpuesto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'') {
				$producto->setotro_impuesto($this->productoDataAccess->getotro_impuesto($this->connexion,$producto));
				$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
				$otro_impuestoLogic->deepLoad($producto->getotro_impuesto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==categoria_producto::$class.'') {
				$producto->setcategoria_producto($this->productoDataAccess->getcategoria_producto($this->connexion,$producto));
				$categoria_productoLogic= new categoria_producto_logic($this->connexion);
				$categoria_productoLogic->deepLoad($producto->getcategoria_producto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sub_categoria_producto::$class.'') {
				$producto->setsub_categoria_producto($this->productoDataAccess->getsub_categoria_producto($this->connexion,$producto));
				$sub_categoria_productoLogic= new sub_categoria_producto_logic($this->connexion);
				$sub_categoria_productoLogic->deepLoad($producto->getsub_categoria_producto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==bodega::$class.'_defecto') {
				$producto->setbodega_defecto($this->productoDataAccess->getbodega_defecto($this->connexion,$producto));
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepLoad($producto->getbodega_defecto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==unidad::$class.'_compra') {
				$producto->setunidad_compra($this->productoDataAccess->getunidad_compra($this->connexion,$producto));
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepLoad($producto->getunidad_compra(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==unidad::$class.'_venta') {
				$producto->setunidad_venta($this->productoDataAccess->getunidad_venta($this->connexion,$producto));
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepLoad($producto->getunidad_venta(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_venta') {
				$producto->setcuenta_venta($this->productoDataAccess->getcuenta_venta($this->connexion,$producto));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($producto->getcuenta_venta(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_compra') {
				$producto->setcuenta_compra($this->productoDataAccess->getcuenta_compra($this->connexion,$producto));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($producto->getcuenta_compra(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_costo') {
				$producto->setcuenta_costo($this->productoDataAccess->getcuenta_costo($this->connexion,$producto));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($producto->getcuenta_costo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==retencion::$class.'') {
				$producto->setretencion($this->productoDataAccess->getretencion($this->connexion,$producto));
				$retencionLogic= new retencion_logic($this->connexion);
				$retencionLogic->deepLoad($producto->getretencion(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==lista_precio::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$producto->setlista_precios($this->productoDataAccess->getlista_precios($this->connexion,$producto));

				foreach($producto->getlista_precios() as $listaprecio) {
					$listaprecioLogic= new lista_precio_logic($this->connexion);
					$listaprecioLogic->deepLoad($listaprecio,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==producto_bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$producto->setproducto_bodegas($this->productoDataAccess->getproducto_bodegas($this->connexion,$producto));

				foreach($producto->getproducto_bodegas() as $productobodega) {
					$productobodegaLogic= new producto_bodega_logic($this->connexion);
					$productobodegaLogic->deepLoad($productobodega,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==otro_suplidor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$producto->setotro_suplidors($this->productoDataAccess->getotro_suplidors($this->connexion,$producto));

				foreach($producto->getotro_suplidors() as $otrosuplidor) {
					$otrosuplidorLogic= new otro_suplidor_logic($this->connexion);
					$otrosuplidorLogic->deepLoad($otrosuplidor,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==lista_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$producto->setlista_clientes($this->productoDataAccess->getlista_clientes($this->connexion,$producto));

				foreach($producto->getlista_clientes() as $listacliente) {
					$listaclienteLogic= new lista_cliente_logic($this->connexion);
					$listaclienteLogic->deepLoad($listacliente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$producto->setbodegas($this->productoDataAccess->getbodegas($this->connexion,$producto));

				foreach($producto->getbodegas() as $bodega) {
					$bodegaLogic= new bodega_logic($this->connexion);
					$bodegaLogic->deepLoad($bodega,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==imagen_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$producto->setimagen_productos($this->productoDataAccess->getimagen_productos($this->connexion,$producto));

				foreach($producto->getimagen_productos() as $imagenproducto) {
					$imagenproductoLogic= new imagen_producto_logic($this->connexion);
					$imagenproductoLogic->deepLoad($imagenproducto,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$producto->setlista_productos($this->productoDataAccess->getlista_productos($this->connexion,$producto));

				foreach($producto->getlista_productos() as $listaproducto) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
				}
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
			$producto->setempresa($this->productoDataAccess->getempresa($this->connexion,$producto));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($producto->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setproveedor($this->productoDataAccess->getproveedor($this->connexion,$producto));
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($producto->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->settipo_producto($this->productoDataAccess->gettipo_producto($this->connexion,$producto));
			$tipo_productoLogic= new tipo_producto_logic($this->connexion);
			$tipo_productoLogic->deepLoad($producto->gettipo_producto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setimpuesto($this->productoDataAccess->getimpuesto($this->connexion,$producto));
			$impuestoLogic= new impuesto_logic($this->connexion);
			$impuestoLogic->deepLoad($producto->getimpuesto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setotro_impuesto($this->productoDataAccess->getotro_impuesto($this->connexion,$producto));
			$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
			$otro_impuestoLogic->deepLoad($producto->getotro_impuesto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==categoria_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setcategoria_producto($this->productoDataAccess->getcategoria_producto($this->connexion,$producto));
			$categoria_productoLogic= new categoria_producto_logic($this->connexion);
			$categoria_productoLogic->deepLoad($producto->getcategoria_producto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sub_categoria_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setsub_categoria_producto($this->productoDataAccess->getsub_categoria_producto($this->connexion,$producto));
			$sub_categoria_productoLogic= new sub_categoria_producto_logic($this->connexion);
			$sub_categoria_productoLogic->deepLoad($producto->getsub_categoria_producto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'_defecto') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setbodega_defecto($this->productoDataAccess->getbodega_defecto($this->connexion,$producto));
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepLoad($producto->getbodega_defecto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'_compra') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setunidad_compra($this->productoDataAccess->getunidad_compra($this->connexion,$producto));
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepLoad($producto->getunidad_compra(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'_venta') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setunidad_venta($this->productoDataAccess->getunidad_venta($this->connexion,$producto));
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepLoad($producto->getunidad_venta(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_venta') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setcuenta_venta($this->productoDataAccess->getcuenta_venta($this->connexion,$producto));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($producto->getcuenta_venta(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compra') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setcuenta_compra($this->productoDataAccess->getcuenta_compra($this->connexion,$producto));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($producto->getcuenta_compra(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_costo') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setcuenta_costo($this->productoDataAccess->getcuenta_costo($this->connexion,$producto));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($producto->getcuenta_costo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$producto->setretencion($this->productoDataAccess->getretencion($this->connexion,$producto));
			$retencionLogic= new retencion_logic($this->connexion);
			$retencionLogic->deepLoad($producto->getretencion(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_precio::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_precio::$class);
			$producto->setlista_precios($this->productoDataAccess->getlista_precios($this->connexion,$producto));

			foreach($producto->getlista_precios() as $listaprecio) {
				$listaprecioLogic= new lista_precio_logic($this->connexion);
				$listaprecioLogic->deepLoad($listaprecio,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto_bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto_bodega::$class);
			$producto->setproducto_bodegas($this->productoDataAccess->getproducto_bodegas($this->connexion,$producto));

			foreach($producto->getproducto_bodegas() as $productobodega) {
				$productobodegaLogic= new producto_bodega_logic($this->connexion);
				$productobodegaLogic->deepLoad($productobodega,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==otro_suplidor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(otro_suplidor::$class);
			$producto->setotro_suplidors($this->productoDataAccess->getotro_suplidors($this->connexion,$producto));

			foreach($producto->getotro_suplidors() as $otrosuplidor) {
				$otrosuplidorLogic= new otro_suplidor_logic($this->connexion);
				$otrosuplidorLogic->deepLoad($otrosuplidor,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_cliente::$class);
			$producto->setlista_clientes($this->productoDataAccess->getlista_clientes($this->connexion,$producto));

			foreach($producto->getlista_clientes() as $listacliente) {
				$listaclienteLogic= new lista_cliente_logic($this->connexion);
				$listaclienteLogic->deepLoad($listacliente,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(bodega::$class);
			$producto->setbodegas($this->productoDataAccess->getbodegas($this->connexion,$producto));

			foreach($producto->getbodegas() as $bodega) {
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepLoad($bodega,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_producto::$class);
			$producto->setimagen_productos($this->productoDataAccess->getimagen_productos($this->connexion,$producto));

			foreach($producto->getimagen_productos() as $imagenproducto) {
				$imagenproductoLogic= new imagen_producto_logic($this->connexion);
				$imagenproductoLogic->deepLoad($imagenproducto,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_producto::$class);
			$producto->setlista_productos($this->productoDataAccess->getlista_productos($this->connexion,$producto));

			foreach($producto->getlista_productos() as $listaproducto) {
				$listaproductoLogic= new lista_producto_logic($this->connexion);
				$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(producto $producto,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			producto_logic_add::updateproductoToSave($this->producto);			
			
			if(!$paraDeleteCascade) {				
				producto_data::save($producto, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($producto->getempresa(),$this->connexion);
		proveedor_data::save($producto->getproveedor(),$this->connexion);
		tipo_producto_data::save($producto->gettipo_producto(),$this->connexion);
		impuesto_data::save($producto->getimpuesto(),$this->connexion);
		otro_impuesto_data::save($producto->getotro_impuesto(),$this->connexion);
		categoria_producto_data::save($producto->getcategoria_producto(),$this->connexion);
		sub_categoria_producto_data::save($producto->getsub_categoria_producto(),$this->connexion);
		bodega_data::save($producto->getbodega_defecto(),$this->connexion);
		unidad_data::save($producto->getunidad_compra(),$this->connexion);
		unidad_data::save($producto->getunidad_venta(),$this->connexion);
		cuenta_data::save($producto->getcuenta_venta(),$this->connexion);
		cuenta_data::save($producto->getcuenta_compra(),$this->connexion);
		cuenta_data::save($producto->getcuenta_costo(),$this->connexion);
		retencion_data::save($producto->getretencion(),$this->connexion);

		foreach($producto->getlista_precios() as $listaprecio) {
			$listaprecio->setid_producto($producto->getId());
			lista_precio_data::save($listaprecio,$this->connexion);
		}


		foreach($producto->getproducto_bodegas() as $productobodega) {
			$productobodega->setid_producto($producto->getId());
			producto_bodega_data::save($productobodega,$this->connexion);
		}


		foreach($producto->getotro_suplidors() as $otrosuplidor) {
			$otrosuplidor->setid_producto($producto->getId());
			otro_suplidor_data::save($otrosuplidor,$this->connexion);
		}


		foreach($producto->getlista_clientes() as $listacliente) {
			$listacliente->setid_producto($producto->getId());
			lista_cliente_data::save($listacliente,$this->connexion);
		}

		foreach($producto->getbodegas() as $bodega) {
			bodega_data::save($bodega,$this->connexion);
		}


		foreach($producto->getimagen_productos() as $imagenproducto) {
			$imagenproducto->setid_producto($producto->getId());
			imagen_producto_data::save($imagenproducto,$this->connexion);
		}


		foreach($producto->getlista_productos() as $listaproducto) {
			$listaproducto->setid_producto($producto->getId());
			lista_producto_data::save($listaproducto,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($producto->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($producto->getproveedor(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_producto::$class.'') {
				tipo_producto_data::save($producto->gettipo_producto(),$this->connexion);
				continue;
			}

			if($clas->clas==impuesto::$class.'') {
				impuesto_data::save($producto->getimpuesto(),$this->connexion);
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'') {
				otro_impuesto_data::save($producto->getotro_impuesto(),$this->connexion);
				continue;
			}

			if($clas->clas==categoria_producto::$class.'') {
				categoria_producto_data::save($producto->getcategoria_producto(),$this->connexion);
				continue;
			}

			if($clas->clas==sub_categoria_producto::$class.'') {
				sub_categoria_producto_data::save($producto->getsub_categoria_producto(),$this->connexion);
				continue;
			}

			if($clas->clas==bodega::$class.'_defecto') {
				bodega_data::save($producto->getbodega_defecto(),$this->connexion);
				continue;
			}

			if($clas->clas==unidad::$class.'_compra') {
				unidad_data::save($producto->getunidad_compra(),$this->connexion);
				continue;
			}

			if($clas->clas==unidad::$class.'_venta') {
				unidad_data::save($producto->getunidad_venta(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'_venta') {
				cuenta_data::save($producto->getcuenta_venta(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'_compra') {
				cuenta_data::save($producto->getcuenta_compra(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'_costo') {
				cuenta_data::save($producto->getcuenta_costo(),$this->connexion);
				continue;
			}

			if($clas->clas==retencion::$class.'') {
				retencion_data::save($producto->getretencion(),$this->connexion);
				continue;
			}


			if($clas->clas==lista_precio::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($producto->getlista_precios() as $listaprecio) {
					$listaprecio->setid_producto($producto->getId());
					lista_precio_data::save($listaprecio,$this->connexion);
				}

				continue;
			}

			if($clas->clas==producto_bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($producto->getproducto_bodegas() as $productobodega) {
					$productobodega->setid_producto($producto->getId());
					producto_bodega_data::save($productobodega,$this->connexion);
				}

				continue;
			}

			if($clas->clas==otro_suplidor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($producto->getotro_suplidors() as $otrosuplidor) {
					$otrosuplidor->setid_producto($producto->getId());
					otro_suplidor_data::save($otrosuplidor,$this->connexion);
				}

				continue;
			}

			if($clas->clas==lista_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($producto->getlista_clientes() as $listacliente) {
					$listacliente->setid_producto($producto->getId());
					lista_cliente_data::save($listacliente,$this->connexion);
				}

				continue;
			}

			if($clas->clas==bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($producto->getbodegas() as $bodega) {
					bodega_data::save($bodega,$this->connexion);
				}

				continue;
			}

			if($clas->clas==imagen_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($producto->getimagen_productos() as $imagenproducto) {
					$imagenproducto->setid_producto($producto->getId());
					imagen_producto_data::save($imagenproducto,$this->connexion);
				}

				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($producto->getlista_productos() as $listaproducto) {
					$listaproducto->setid_producto($producto->getId());
					lista_producto_data::save($listaproducto,$this->connexion);
				}

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
			empresa_data::save($producto->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($producto->getproveedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_producto_data::save($producto->gettipo_producto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			impuesto_data::save($producto->getimpuesto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			otro_impuesto_data::save($producto->getotro_impuesto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==categoria_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			categoria_producto_data::save($producto->getcategoria_producto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sub_categoria_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sub_categoria_producto_data::save($producto->getsub_categoria_producto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'_defecto') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($producto->getbodega_defecto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'_compra') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($producto->getunidad_compra(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'_venta') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($producto->getunidad_venta(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_venta') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($producto->getcuenta_venta(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compra') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($producto->getcuenta_compra(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_costo') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($producto->getcuenta_costo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			retencion_data::save($producto->getretencion(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_precio::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_precio::$class);

			foreach($producto->getlista_precios() as $listaprecio) {
				$listaprecio->setid_producto($producto->getId());
				lista_precio_data::save($listaprecio,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto_bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto_bodega::$class);

			foreach($producto->getproducto_bodegas() as $productobodega) {
				$productobodega->setid_producto($producto->getId());
				producto_bodega_data::save($productobodega,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==otro_suplidor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(otro_suplidor::$class);

			foreach($producto->getotro_suplidors() as $otrosuplidor) {
				$otrosuplidor->setid_producto($producto->getId());
				otro_suplidor_data::save($otrosuplidor,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_cliente::$class);

			foreach($producto->getlista_clientes() as $listacliente) {
				$listacliente->setid_producto($producto->getId());
				lista_cliente_data::save($listacliente,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(bodega::$class);

			foreach($producto->getbodegas() as $bodega) {
				bodega_data::save($bodega,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_producto::$class);

			foreach($producto->getimagen_productos() as $imagenproducto) {
				$imagenproducto->setid_producto($producto->getId());
				imagen_producto_data::save($imagenproducto,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_producto::$class);

			foreach($producto->getlista_productos() as $listaproducto) {
				$listaproducto->setid_producto($producto->getId());
				lista_producto_data::save($listaproducto,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($producto->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($producto->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		proveedor_data::save($producto->getproveedor(),$this->connexion);
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepSave($producto->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_producto_data::save($producto->gettipo_producto(),$this->connexion);
		$tipo_productoLogic= new tipo_producto_logic($this->connexion);
		$tipo_productoLogic->deepSave($producto->gettipo_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		impuesto_data::save($producto->getimpuesto(),$this->connexion);
		$impuestoLogic= new impuesto_logic($this->connexion);
		$impuestoLogic->deepSave($producto->getimpuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		otro_impuesto_data::save($producto->getotro_impuesto(),$this->connexion);
		$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
		$otro_impuestoLogic->deepSave($producto->getotro_impuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		categoria_producto_data::save($producto->getcategoria_producto(),$this->connexion);
		$categoria_productoLogic= new categoria_producto_logic($this->connexion);
		$categoria_productoLogic->deepSave($producto->getcategoria_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sub_categoria_producto_data::save($producto->getsub_categoria_producto(),$this->connexion);
		$sub_categoria_productoLogic= new sub_categoria_producto_logic($this->connexion);
		$sub_categoria_productoLogic->deepSave($producto->getsub_categoria_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		bodega_data::save($producto->getbodega_defecto(),$this->connexion);
		$bodega_defectoLogic= new bodega_logic($this->connexion);
		$bodega_defectoLogic->deepSave($producto->getbodega_defecto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		unidad_data::save($producto->getunidad_compra(),$this->connexion);
		$unidad_compraLogic= new unidad_logic($this->connexion);
		$unidad_compraLogic->deepSave($producto->getunidad_compra(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		unidad_data::save($producto->getunidad_venta(),$this->connexion);
		$unidad_ventaLogic= new unidad_logic($this->connexion);
		$unidad_ventaLogic->deepSave($producto->getunidad_venta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($producto->getcuenta_venta(),$this->connexion);
		$cuenta_ventaLogic= new cuenta_logic($this->connexion);
		$cuenta_ventaLogic->deepSave($producto->getcuenta_venta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($producto->getcuenta_compra(),$this->connexion);
		$cuenta_compraLogic= new cuenta_logic($this->connexion);
		$cuenta_compraLogic->deepSave($producto->getcuenta_compra(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($producto->getcuenta_costo(),$this->connexion);
		$cuenta_costoLogic= new cuenta_logic($this->connexion);
		$cuenta_costoLogic->deepSave($producto->getcuenta_costo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		retencion_data::save($producto->getretencion(),$this->connexion);
		$retencionLogic= new retencion_logic($this->connexion);
		$retencionLogic->deepSave($producto->getretencion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($producto->getlista_precios() as $listaprecio) {
			$listaprecioLogic= new lista_precio_logic($this->connexion);
			$listaprecio->setid_producto($producto->getId());
			lista_precio_data::save($listaprecio,$this->connexion);
			$listaprecioLogic->deepSave($listaprecio,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($producto->getproducto_bodegas() as $productobodega) {
			$productobodegaLogic= new producto_bodega_logic($this->connexion);
			$productobodega->setid_producto($producto->getId());
			producto_bodega_data::save($productobodega,$this->connexion);
			$productobodegaLogic->deepSave($productobodega,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($producto->getotro_suplidors() as $otrosuplidor) {
			$otrosuplidorLogic= new otro_suplidor_logic($this->connexion);
			$otrosuplidor->setid_producto($producto->getId());
			otro_suplidor_data::save($otrosuplidor,$this->connexion);
			$otrosuplidorLogic->deepSave($otrosuplidor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($producto->getlista_clientes() as $listacliente) {
			$listaclienteLogic= new lista_cliente_logic($this->connexion);
			$listacliente->setid_producto($producto->getId());
			lista_cliente_data::save($listacliente,$this->connexion);
			$listaclienteLogic->deepSave($listacliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($producto->getbodegas() as $bodega) {
			$bodegaLogic= new bodega_logic($this->connexion);
			bodega_data::save($bodega,$this->connexion);
			$bodegaLogic->deepSave($bodega,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($producto->getimagen_productos() as $imagenproducto) {
			$imagenproductoLogic= new imagen_producto_logic($this->connexion);
			$imagenproducto->setid_producto($producto->getId());
			imagen_producto_data::save($imagenproducto,$this->connexion);
			$imagenproductoLogic->deepSave($imagenproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($producto->getlista_productos() as $listaproducto) {
			$listaproductoLogic= new lista_producto_logic($this->connexion);
			$listaproducto->setid_producto($producto->getId());
			lista_producto_data::save($listaproducto,$this->connexion);
			$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($producto->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($producto->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($producto->getproveedor(),$this->connexion);
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepSave($producto->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_producto::$class.'') {
				tipo_producto_data::save($producto->gettipo_producto(),$this->connexion);
				$tipo_productoLogic= new tipo_producto_logic($this->connexion);
				$tipo_productoLogic->deepSave($producto->gettipo_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==impuesto::$class.'') {
				impuesto_data::save($producto->getimpuesto(),$this->connexion);
				$impuestoLogic= new impuesto_logic($this->connexion);
				$impuestoLogic->deepSave($producto->getimpuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'') {
				otro_impuesto_data::save($producto->getotro_impuesto(),$this->connexion);
				$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
				$otro_impuestoLogic->deepSave($producto->getotro_impuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==categoria_producto::$class.'') {
				categoria_producto_data::save($producto->getcategoria_producto(),$this->connexion);
				$categoria_productoLogic= new categoria_producto_logic($this->connexion);
				$categoria_productoLogic->deepSave($producto->getcategoria_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sub_categoria_producto::$class.'') {
				sub_categoria_producto_data::save($producto->getsub_categoria_producto(),$this->connexion);
				$sub_categoria_productoLogic= new sub_categoria_producto_logic($this->connexion);
				$sub_categoria_productoLogic->deepSave($producto->getsub_categoria_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==bodega::$class.'_defecto') {
				bodega_data::save($producto->getbodega_defecto(),$this->connexion);
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepSave($producto->getbodega_defecto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==unidad::$class.'_compra') {
				unidad_data::save($producto->getunidad_compra(),$this->connexion);
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepSave($producto->getunidad_compra(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==unidad::$class.'_venta') {
				unidad_data::save($producto->getunidad_venta(),$this->connexion);
				$unidadLogic= new unidad_logic($this->connexion);
				$unidadLogic->deepSave($producto->getunidad_venta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_venta') {
				cuenta_data::save($producto->getcuenta_venta(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($producto->getcuenta_venta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_compra') {
				cuenta_data::save($producto->getcuenta_compra(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($producto->getcuenta_compra(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_costo') {
				cuenta_data::save($producto->getcuenta_costo(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($producto->getcuenta_costo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==retencion::$class.'') {
				retencion_data::save($producto->getretencion(),$this->connexion);
				$retencionLogic= new retencion_logic($this->connexion);
				$retencionLogic->deepSave($producto->getretencion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==lista_precio::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($producto->getlista_precios() as $listaprecio) {
					$listaprecioLogic= new lista_precio_logic($this->connexion);
					$listaprecio->setid_producto($producto->getId());
					lista_precio_data::save($listaprecio,$this->connexion);
					$listaprecioLogic->deepSave($listaprecio,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==producto_bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($producto->getproducto_bodegas() as $productobodega) {
					$productobodegaLogic= new producto_bodega_logic($this->connexion);
					$productobodega->setid_producto($producto->getId());
					producto_bodega_data::save($productobodega,$this->connexion);
					$productobodegaLogic->deepSave($productobodega,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==otro_suplidor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($producto->getotro_suplidors() as $otrosuplidor) {
					$otrosuplidorLogic= new otro_suplidor_logic($this->connexion);
					$otrosuplidor->setid_producto($producto->getId());
					otro_suplidor_data::save($otrosuplidor,$this->connexion);
					$otrosuplidorLogic->deepSave($otrosuplidor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==lista_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($producto->getlista_clientes() as $listacliente) {
					$listaclienteLogic= new lista_cliente_logic($this->connexion);
					$listacliente->setid_producto($producto->getId());
					lista_cliente_data::save($listacliente,$this->connexion);
					$listaclienteLogic->deepSave($listacliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($producto->getbodegas() as $bodega) {
					$bodegaLogic= new bodega_logic($this->connexion);
					bodega_data::save($bodega,$this->connexion);
					$bodegaLogic->deepSave($bodega,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==imagen_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($producto->getimagen_productos() as $imagenproducto) {
					$imagenproductoLogic= new imagen_producto_logic($this->connexion);
					$imagenproducto->setid_producto($producto->getId());
					imagen_producto_data::save($imagenproducto,$this->connexion);
					$imagenproductoLogic->deepSave($imagenproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($producto->getlista_productos() as $listaproducto) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproducto->setid_producto($producto->getId());
					lista_producto_data::save($listaproducto,$this->connexion);
					$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

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
			empresa_data::save($producto->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($producto->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($producto->getproveedor(),$this->connexion);
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepSave($producto->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_producto_data::save($producto->gettipo_producto(),$this->connexion);
			$tipo_productoLogic= new tipo_producto_logic($this->connexion);
			$tipo_productoLogic->deepSave($producto->gettipo_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			impuesto_data::save($producto->getimpuesto(),$this->connexion);
			$impuestoLogic= new impuesto_logic($this->connexion);
			$impuestoLogic->deepSave($producto->getimpuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			otro_impuesto_data::save($producto->getotro_impuesto(),$this->connexion);
			$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
			$otro_impuestoLogic->deepSave($producto->getotro_impuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==categoria_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			categoria_producto_data::save($producto->getcategoria_producto(),$this->connexion);
			$categoria_productoLogic= new categoria_producto_logic($this->connexion);
			$categoria_productoLogic->deepSave($producto->getcategoria_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sub_categoria_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sub_categoria_producto_data::save($producto->getsub_categoria_producto(),$this->connexion);
			$sub_categoria_productoLogic= new sub_categoria_producto_logic($this->connexion);
			$sub_categoria_productoLogic->deepSave($producto->getsub_categoria_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'_defecto') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($producto->getbodega(),$this->connexion);
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepSave($producto->getbodega_defecto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'_compra') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($producto->getunidad(),$this->connexion);
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepSave($producto->getunidad_compra(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==unidad::$class.'_venta') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			unidad_data::save($producto->getunidad(),$this->connexion);
			$unidadLogic= new unidad_logic($this->connexion);
			$unidadLogic->deepSave($producto->getunidad_venta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_venta') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($producto->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($producto->getcuenta_venta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compra') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($producto->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($producto->getcuenta_compra(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_costo') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($producto->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($producto->getcuenta_costo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			retencion_data::save($producto->getretencion(),$this->connexion);
			$retencionLogic= new retencion_logic($this->connexion);
			$retencionLogic->deepSave($producto->getretencion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_precio::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_precio::$class);

			foreach($producto->getlista_precios() as $listaprecio) {
				$listaprecioLogic= new lista_precio_logic($this->connexion);
				$listaprecio->setid_producto($producto->getId());
				lista_precio_data::save($listaprecio,$this->connexion);
				$listaprecioLogic->deepSave($listaprecio,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto_bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto_bodega::$class);

			foreach($producto->getproducto_bodegas() as $productobodega) {
				$productobodegaLogic= new producto_bodega_logic($this->connexion);
				$productobodega->setid_producto($producto->getId());
				producto_bodega_data::save($productobodega,$this->connexion);
				$productobodegaLogic->deepSave($productobodega,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==otro_suplidor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(otro_suplidor::$class);

			foreach($producto->getotro_suplidors() as $otrosuplidor) {
				$otrosuplidorLogic= new otro_suplidor_logic($this->connexion);
				$otrosuplidor->setid_producto($producto->getId());
				otro_suplidor_data::save($otrosuplidor,$this->connexion);
				$otrosuplidorLogic->deepSave($otrosuplidor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_cliente::$class);

			foreach($producto->getlista_clientes() as $listacliente) {
				$listaclienteLogic= new lista_cliente_logic($this->connexion);
				$listacliente->setid_producto($producto->getId());
				lista_cliente_data::save($listacliente,$this->connexion);
				$listaclienteLogic->deepSave($listacliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(bodega::$class);

			foreach($producto->getbodegas() as $bodega) {
				$bodegaLogic= new bodega_logic($this->connexion);
				bodega_data::save($bodega,$this->connexion);
				$bodegaLogic->deepSave($bodega,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_producto::$class);

			foreach($producto->getimagen_productos() as $imagenproducto) {
				$imagenproductoLogic= new imagen_producto_logic($this->connexion);
				$imagenproducto->setid_producto($producto->getId());
				imagen_producto_data::save($imagenproducto,$this->connexion);
				$imagenproductoLogic->deepSave($imagenproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_producto::$class);

			foreach($producto->getlista_productos() as $listaproducto) {
				$listaproductoLogic= new lista_producto_logic($this->connexion);
				$listaproducto->setid_producto($producto->getId());
				lista_producto_data::save($listaproducto,$this->connexion);
				$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				producto_data::save($producto, $this->connexion);
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
			
			$this->deepLoad($this->producto,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->productos as $producto) {
				$this->deepLoad($producto,$isDeep,$deepLoadType,$clases);
								
				producto_util::refrescarFKDescripciones($this->productos);
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
			
			foreach($this->productos as $producto) {
				$this->deepLoad($producto,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->producto,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->productos as $producto) {
				$this->deepSave($producto,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->productos as $producto) {
				$this->deepSave($producto,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(proveedor::$class);
				$classes[]=new Classe(tipo_producto::$class);
				$classes[]=new Classe(impuesto::$class);
				$classes[]=new Classe(otro_impuesto::$class);
				$classes[]=new Classe(categoria_producto::$class);
				$classes[]=new Classe(sub_categoria_producto::$class);
				$classes[]=new Classe(bodega::$class);
				$classes[]=new Classe(unidad::$class);
				$classes[]=new Classe(unidad::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(retencion::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class);
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
					if($clas->clas==bodega::$class) {
						$classes[]=new Classe(bodega::$class);
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
					if($clas->clas==retencion::$class) {
						$classes[]=new Classe(retencion::$class);
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
					if($clas->clas==proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(proveedor::$class);
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
				
				$classes[]=new Classe(lista_precio::$class);
				$classes[]=new Classe(producto_bodega::$class);
				$classes[]=new Classe(otro_suplidor::$class);
				$classes[]=new Classe(lista_cliente::$class);
				$classes[]=new Classe(bodega::$class);
				$classes[]=new Classe(imagen_producto::$class);
				$classes[]=new Classe(lista_producto::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==lista_precio::$class) {
						$classes[]=new Classe(lista_precio::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==producto_bodega::$class) {
						$classes[]=new Classe(producto_bodega::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==otro_suplidor::$class) {
						$classes[]=new Classe(otro_suplidor::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==lista_cliente::$class) {
						$classes[]=new Classe(lista_cliente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==bodega::$class) {
						$classes[]=new Classe(bodega::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==imagen_producto::$class) {
						$classes[]=new Classe(imagen_producto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==lista_producto::$class) {
						$classes[]=new Classe(lista_producto::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==lista_precio::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(lista_precio::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==producto_bodega::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(producto_bodega::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==otro_suplidor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(otro_suplidor::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==lista_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(lista_cliente::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==bodega::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(bodega::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==imagen_producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(imagen_producto::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==lista_producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(lista_producto::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getproducto() : ?producto {	
		/*
		producto_logic_add::checkproductoToGet($this->producto,$this->datosCliente);
		producto_logic_add::updateproductoToGet($this->producto);
		*/
			
		return $this->producto;
	}
		
	public function setproducto(producto $newproducto) {
		$this->producto = $newproducto;
	}
	
	public function getproductos() : array {		
		/*
		producto_logic_add::checkproductoToGets($this->productos,$this->datosCliente);
		
		foreach ($this->productos as $productoLocal ) {
			producto_logic_add::updateproductoToGet($productoLocal);
		}
		*/
		
		return $this->productos;
	}
	
	public function setproductos(array $newproductos) {
		$this->productos = $newproductos;
	}
	
	public function getproductoDataAccess() : producto_data {
		return $this->productoDataAccess;
	}
	
	public function setproductoDataAccess(producto_data $newproductoDataAccess) {
		$this->productoDataAccess = $newproductoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        producto_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		cotizacion_detalle_logic::$logger;
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
