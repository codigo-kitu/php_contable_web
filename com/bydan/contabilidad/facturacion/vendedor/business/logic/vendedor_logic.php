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

namespace com\bydan\contabilidad\facturacion\vendedor\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_carga;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_param_return;

use com\bydan\contabilidad\facturacion\vendedor\presentation\session\vendedor_session;

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

use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;
use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\business\data\vendedor_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\facturacion\factura_lote\business\entity\factura_lote;
use com\bydan\contabilidad\facturacion\factura_lote\business\data\factura_lote_data;
use com\bydan\contabilidad\facturacion\factura_lote\business\logic\factura_lote_logic;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_carga;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;

use com\bydan\contabilidad\facturacion\devolucion_factura\business\entity\devolucion_factura;
use com\bydan\contabilidad\facturacion\devolucion_factura\business\data\devolucion_factura_data;
use com\bydan\contabilidad\facturacion\devolucion_factura\business\logic\devolucion_factura_logic;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;

use com\bydan\contabilidad\estimados\estimado\business\entity\estimado;
use com\bydan\contabilidad\estimados\estimado\business\data\estimado_data;
use com\bydan\contabilidad\estimados\estimado\business\logic\estimado_logic;
use com\bydan\contabilidad\estimados\estimado\util\estimado_carga;
use com\bydan\contabilidad\estimados\estimado\util\estimado_util;

use com\bydan\contabilidad\inventario\devolucion\business\entity\devolucion;
use com\bydan\contabilidad\inventario\devolucion\business\data\devolucion_data;
use com\bydan\contabilidad\inventario\devolucion\business\logic\devolucion_logic;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_carga;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_util;

use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;
use com\bydan\contabilidad\inventario\orden_compra\business\data\orden_compra_data;
use com\bydan\contabilidad\inventario\orden_compra\business\logic\orden_compra_logic;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;

use com\bydan\contabilidad\facturacion\factura\business\entity\factura;
use com\bydan\contabilidad\facturacion\factura\business\data\factura_data;
use com\bydan\contabilidad\facturacion\factura\business\logic\factura_logic;
use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;

use com\bydan\contabilidad\inventario\cotizacion\business\entity\cotizacion;
use com\bydan\contabilidad\inventario\cotizacion\business\data\cotizacion_data;
use com\bydan\contabilidad\inventario\cotizacion\business\logic\cotizacion_logic;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_carga;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_util;

use com\bydan\contabilidad\estimados\consignacion\business\entity\consignacion;
use com\bydan\contabilidad\estimados\consignacion\business\data\consignacion_data;
use com\bydan\contabilidad\estimados\consignacion\business\logic\consignacion_logic;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_carga;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

//REL DETALLES

use com\bydan\contabilidad\facturacion\factura_lote_detalle\util\factura_lote_detalle_carga;
use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\util\devolucion_factura_detalle_carga;
use com\bydan\contabilidad\estimados\imagen_estimado\util\imagen_estimado_carga;
use com\bydan\contabilidad\estimados\imagen_estimado\business\logic\imagen_estimado_logic;
use com\bydan\contabilidad\estimados\estimado_detalle\util\estimado_detalle_carga;
use com\bydan\contabilidad\estimados\estimado_detalle\business\logic\estimado_detalle_logic;
use com\bydan\contabilidad\inventario\devolucion_detalle\util\devolucion_detalle_carga;
use com\bydan\contabilidad\inventario\devolucion_detalle\business\logic\devolucion_detalle_logic;



class vendedor_logic  extends GeneralEntityLogic implements vendedor_logicI {	
	/*GENERAL*/
	public vendedor_data $vendedorDataAccess;
	//public ?vendedor_logic_add $vendedorLogicAdditional=null;
	public ?vendedor $vendedor;
	public array $vendedors;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->vendedorDataAccess = new vendedor_data();			
			$this->vendedors = array();
			$this->vendedor = new vendedor();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->vendedorLogicAdditional = new vendedor_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->vendedorLogicAdditional==null) {
		//	$this->vendedorLogicAdditional=new vendedor_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->vendedorDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->vendedorDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->vendedorDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->vendedorDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->vendedors = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->vendedors=$this->vendedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				vendedor_util::refrescarFKDescripciones($this->vendedors);
			}
			
			//vendedor_logic_add::checkvendedorToGets($this->vendedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->vendedors);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->vendedors = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->vendedors=$this->vendedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				vendedor_util::refrescarFKDescripciones($this->vendedors);
			}
			
			//vendedor_logic_add::checkvendedorToGets($this->vendedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->vendedors);
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
		$this->vendedor = new vendedor();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->vendedor=$this->vendedorDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->vendedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				vendedor_util::refrescarFKDescripcion($this->vendedor);
			}
						
			//vendedor_logic_add::checkvendedorToGet($this->vendedor,$this->datosCliente);
			//vendedor_logic_add::updatevendedorToGet($this->vendedor);
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
		$this->vendedor = new  vendedor();
		  		  
        try {		
			$this->vendedor=$this->vendedorDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->vendedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				vendedor_util::refrescarFKDescripcion($this->vendedor);
			}
			
			//vendedor_logic_add::checkvendedorToGet($this->vendedor,$this->datosCliente);
			//vendedor_logic_add::updatevendedorToGet($this->vendedor);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?vendedor {
		$vendedorLogic = new  vendedor_logic();
		  		  
        try {		
			$vendedorLogic->setConnexion($connexion);			
			$vendedorLogic->getEntity($id);			
			return $vendedorLogic->getvendedor();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->vendedor = new  vendedor();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->vendedor=$this->vendedorDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->vendedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				vendedor_util::refrescarFKDescripcion($this->vendedor);
			}
			
			//vendedor_logic_add::checkvendedorToGet($this->vendedor,$this->datosCliente);
			//vendedor_logic_add::updatevendedorToGet($this->vendedor);
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
		$this->vendedor = new  vendedor();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->vendedor=$this->vendedorDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->vendedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				vendedor_util::refrescarFKDescripcion($this->vendedor);
			}
			
			//vendedor_logic_add::checkvendedorToGet($this->vendedor,$this->datosCliente);
			//vendedor_logic_add::updatevendedorToGet($this->vendedor);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?vendedor {
		$vendedorLogic = new  vendedor_logic();
		  		  
        try {		
			$vendedorLogic->setConnexion($connexion);			
			$vendedorLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $vendedorLogic->getvendedor();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->vendedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->vendedors=$this->vendedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				vendedor_util::refrescarFKDescripciones($this->vendedors);
			}
			
			//vendedor_logic_add::checkvendedorToGets($this->vendedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->vendedors);			
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
		$this->vendedors = array();
		  		  
        try {			
			$this->vendedors=$this->vendedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				vendedor_util::refrescarFKDescripciones($this->vendedors);
			}
			
			//vendedor_logic_add::checkvendedorToGets($this->vendedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->vendedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->vendedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->vendedors=$this->vendedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				vendedor_util::refrescarFKDescripciones($this->vendedors);
			}
			
			//vendedor_logic_add::checkvendedorToGets($this->vendedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->vendedors);
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
		$this->vendedors = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->vendedors=$this->vendedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				vendedor_util::refrescarFKDescripciones($this->vendedors);
			}
			
			//vendedor_logic_add::checkvendedorToGets($this->vendedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->vendedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$vendedorLogic = new  vendedor_logic();
		  		  
        try {		
			$vendedorLogic->setConnexion($connexion);			
			$vendedorLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $vendedorLogic->getvendedors();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->vendedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->vendedors=$this->vendedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				vendedor_util::refrescarFKDescripciones($this->vendedors);
			}
			
			//vendedor_logic_add::checkvendedorToGets($this->vendedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->vendedors);
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
		$this->vendedors = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->vendedors=$this->vendedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				vendedor_util::refrescarFKDescripciones($this->vendedors);
			}
			
			//vendedor_logic_add::checkvendedorToGets($this->vendedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->vendedors);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->vendedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->vendedors=$this->vendedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				vendedor_util::refrescarFKDescripciones($this->vendedors);
			}
			
			//vendedor_logic_add::checkvendedorToGets($this->vendedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->vendedors);
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
		$this->vendedors = array();
		  		  
        try {			
			$this->vendedors=$this->vendedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				vendedor_util::refrescarFKDescripciones($this->vendedors);
			}	
			
			//vendedor_logic_add::checkvendedorToGets($this->vendedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->vendedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->vendedors = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->vendedors=$this->vendedorDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				vendedor_util::refrescarFKDescripciones($this->vendedors);
			}
			
			//vendedor_logic_add::checkvendedorToGets($this->vendedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->vendedors);
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
		$this->vendedors = array();
		  		  
        try {		
			$this->vendedors=$this->vendedorDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				vendedor_util::refrescarFKDescripciones($this->vendedors);
			}
			
			//vendedor_logic_add::checkvendedorToGets($this->vendedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->vendedors);

		}  catch(Exception $e) {						
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,vendedor_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->vendedors=$this->vendedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				vendedor_util::refrescarFKDescripciones($this->vendedors);
			}
			//vendedor_logic_add::checkvendedorToGets($this->vendedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->vendedors);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,vendedor_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->vendedors=$this->vendedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				vendedor_util::refrescarFKDescripciones($this->vendedors);
			}
			//vendedor_logic_add::checkvendedorToGets($this->vendedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->vendedors);
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
						
			//vendedor_logic_add::checkvendedorToSave($this->vendedor,$this->datosCliente,$this->connexion);	       
			//vendedor_logic_add::updatevendedorToSave($this->vendedor);			
			vendedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->vendedor,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->vendedorLogicAdditional->checkGeneralEntityToSave($this,$this->vendedor,$this->datosCliente,$this->connexion);
			
			
			vendedor_data::save($this->vendedor, $this->connexion);	    	       	 				
			//vendedor_logic_add::checkvendedorToSaveAfter($this->vendedor,$this->datosCliente,$this->connexion);			
			//$this->vendedorLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->vendedor,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->vendedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->vendedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				vendedor_util::refrescarFKDescripcion($this->vendedor);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->vendedor->getIsDeleted()) {
				$this->vendedor=null;
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
						
			/*vendedor_logic_add::checkvendedorToSave($this->vendedor,$this->datosCliente,$this->connexion);*/	        
			//vendedor_logic_add::updatevendedorToSave($this->vendedor);			
			//$this->vendedorLogicAdditional->checkGeneralEntityToSave($this,$this->vendedor,$this->datosCliente,$this->connexion);			
			vendedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->vendedor,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			vendedor_data::save($this->vendedor, $this->connexion);	    	       	 						
			/*vendedor_logic_add::checkvendedorToSaveAfter($this->vendedor,$this->datosCliente,$this->connexion);*/			
			//$this->vendedorLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->vendedor,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->vendedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->vendedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				vendedor_util::refrescarFKDescripcion($this->vendedor);				
			}
			
			if($this->vendedor->getIsDeleted()) {
				$this->vendedor=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(vendedor $vendedor,Connexion $connexion)  {
		$vendedorLogic = new  vendedor_logic();		  		  
        try {		
			$vendedorLogic->setConnexion($connexion);			
			$vendedorLogic->setvendedor($vendedor);			
			$vendedorLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*vendedor_logic_add::checkvendedorToSaves($this->vendedors,$this->datosCliente,$this->connexion);*/	        	
			//$this->vendedorLogicAdditional->checkGeneralEntitiesToSaves($this,$this->vendedors,$this->datosCliente,$this->connexion);
			
	   		foreach($this->vendedors as $vendedorLocal) {				
								
				//vendedor_logic_add::updatevendedorToSave($vendedorLocal);	        	
				vendedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$vendedorLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				vendedor_data::save($vendedorLocal, $this->connexion);				
			}
			
			/*vendedor_logic_add::checkvendedorToSavesAfter($this->vendedors,$this->datosCliente,$this->connexion);*/			
			//$this->vendedorLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->vendedors,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				vendedor_util::refrescarFKDescripciones($this->vendedors);
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
			/*vendedor_logic_add::checkvendedorToSaves($this->vendedors,$this->datosCliente,$this->connexion);*/			
			//$this->vendedorLogicAdditional->checkGeneralEntitiesToSaves($this,$this->vendedors,$this->datosCliente,$this->connexion);
			
	   		foreach($this->vendedors as $vendedorLocal) {				
								
				//vendedor_logic_add::updatevendedorToSave($vendedorLocal);	        	
				vendedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$vendedorLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				vendedor_data::save($vendedorLocal, $this->connexion);				
			}			
			
			/*vendedor_logic_add::checkvendedorToSavesAfter($this->vendedors,$this->datosCliente,$this->connexion);*/			
			//$this->vendedorLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->vendedors,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				vendedor_util::refrescarFKDescripciones($this->vendedors);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $vendedors,Connexion $connexion)  {
		$vendedorLogic = new  vendedor_logic();
		  		  
        try {		
			$vendedorLogic->setConnexion($connexion);			
			$vendedorLogic->setvendedors($vendedors);			
			$vendedorLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$vendedorsAux=array();
		
		foreach($this->vendedors as $vendedor) {
			if($vendedor->getIsDeleted()==false) {
				$vendedorsAux[]=$vendedor;
			}
		}
		
		$this->vendedors=$vendedorsAux;
	}
	
	public function updateToGetsAuxiliar(array &$vendedors) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->vendedors as $vendedor) {
				
				$vendedor->setid_empresa_Descripcion(vendedor_util::getempresaDescripcion($vendedor->getempresa()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$vendedor_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$vendedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$vendedor_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$vendedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$vendedor_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$vendedorForeignKey=new vendedor_param_return();//vendedorForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$vendedorForeignKey,$vendedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$vendedorForeignKey,$vendedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $vendedorForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$vendedorForeignKey,$vendedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$vendedorForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($vendedor_session==null) {
			$vendedor_session=new vendedor_session();
		}
		
		if($vendedor_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($vendedorForeignKey->idempresaDefaultFK==0) {
					$vendedorForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$vendedorForeignKey->empresasFK[$empresaLocal->getId()]=vendedor_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($vendedor_session->bigidempresaActual!=null && $vendedor_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($vendedor_session->bigidempresaActual);//WithConnection

				$vendedorForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=vendedor_util::getempresaDescripcion($empresaLogic->getempresa());
				$vendedorForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($vendedor,$clientes,$facturalotes,$devolucionfacturas,$estimados,$devolucions,$ordencompras,$facturas,$cotizacions,$consignacions,$proveedors) {
		$this->saveRelacionesBase($vendedor,$clientes,$facturalotes,$devolucionfacturas,$estimados,$devolucions,$ordencompras,$facturas,$cotizacions,$consignacions,$proveedors,true);
	}

	public function saveRelaciones($vendedor,$clientes,$facturalotes,$devolucionfacturas,$estimados,$devolucions,$ordencompras,$facturas,$cotizacions,$consignacions,$proveedors) {
		$this->saveRelacionesBase($vendedor,$clientes,$facturalotes,$devolucionfacturas,$estimados,$devolucions,$ordencompras,$facturas,$cotizacions,$consignacions,$proveedors,false);
	}

	public function saveRelacionesBase($vendedor,$clientes=array(),$facturalotes=array(),$devolucionfacturas=array(),$estimados=array(),$devolucions=array(),$ordencompras=array(),$facturas=array(),$cotizacions=array(),$consignacions=array(),$proveedors=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$vendedor->setclientes($clientes);
			$vendedor->setfactura_lotes($facturalotes);
			$vendedor->setdevolucion_facturas($devolucionfacturas);
			$vendedor->setestimados($estimados);
			$vendedor->setdevolucions($devolucions);
			$vendedor->setorden_compras($ordencompras);
			$vendedor->setfacturas($facturas);
			$vendedor->setcotizacions($cotizacions);
			$vendedor->setconsignacions($consignacions);
			$vendedor->setproveedors($proveedors);
			$this->setvendedor($vendedor);

			if(true) {

				//vendedor_logic_add::updateRelacionesToSave($vendedor,$this);

				if(($this->vendedor->getIsNew() || $this->vendedor->getIsChanged()) && !$this->vendedor->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($clientes,$facturalotes,$devolucionfacturas,$estimados,$devolucions,$ordencompras,$facturas,$cotizacions,$consignacions,$proveedors);

				} else if($this->vendedor->getIsDeleted()) {
					$this->saveRelacionesDetalles($clientes,$facturalotes,$devolucionfacturas,$estimados,$devolucions,$ordencompras,$facturas,$cotizacions,$consignacions,$proveedors);
					$this->save();
				}

				//vendedor_logic_add::updateRelacionesToSaveAfter($vendedor,$this);

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
	
	
	public function saveRelacionesDetalles($clientes=array(),$facturalotes=array(),$devolucionfacturas=array(),$estimados=array(),$devolucions=array(),$ordencompras=array(),$facturas=array(),$cotizacions=array(),$consignacions=array(),$proveedors=array()) {
		try {
	

			$idvendedorActual=$this->getvendedor()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cliente_carga.php');
			cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$clienteLogic_Desde_vendedor=new cliente_logic();
			$clienteLogic_Desde_vendedor->setclientes($clientes);

			$clienteLogic_Desde_vendedor->setConnexion($this->getConnexion());
			$clienteLogic_Desde_vendedor->setDatosCliente($this->datosCliente);

			foreach($clienteLogic_Desde_vendedor->getclientes() as $cliente_Desde_vendedor) {
				$cliente_Desde_vendedor->setid_vendedor($idvendedorActual);

				$clienteLogic_Desde_vendedor->setcliente($cliente_Desde_vendedor);
				$clienteLogic_Desde_vendedor->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_lote_carga.php');
			factura_lote_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$facturaloteLogic_Desde_vendedor=new factura_lote_logic();
			$facturaloteLogic_Desde_vendedor->setfactura_lotes($facturalotes);

			$facturaloteLogic_Desde_vendedor->setConnexion($this->getConnexion());
			$facturaloteLogic_Desde_vendedor->setDatosCliente($this->datosCliente);

			foreach($facturaloteLogic_Desde_vendedor->getfactura_lotes() as $facturalote_Desde_vendedor) {
				$facturalote_Desde_vendedor->setid_vendedor($idvendedorActual);

				$facturaloteLogic_Desde_vendedor->setfactura_lote($facturalote_Desde_vendedor);
				$facturaloteLogic_Desde_vendedor->save();

				$idfactura_loteActual=$factura_lote_Desde_vendedor->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_lote_detalle_carga.php');
				factura_lote_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$facturalotedetalleLogic_Desde_factura_lote=new factura_lote_detalle_logic();

				if($factura_lote_Desde_vendedor->getfactura_lote_detalles()==null){
					$factura_lote_Desde_vendedor->setfactura_lote_detalles(array());
				}

				$facturalotedetalleLogic_Desde_factura_lote->setfactura_lote_detalles($factura_lote_Desde_vendedor->getfactura_lote_detalles());

				$facturalotedetalleLogic_Desde_factura_lote->setConnexion($this->getConnexion());
				$facturalotedetalleLogic_Desde_factura_lote->setDatosCliente($this->datosCliente);

				foreach($facturalotedetalleLogic_Desde_factura_lote->getfactura_lote_detalles() as $facturalotedetalle_Desde_factura_lote) {
					$facturalotedetalle_Desde_factura_lote->setid_factura_lote($idfactura_loteActual);
				}

				$facturalotedetalleLogic_Desde_factura_lote->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_modelo_carga.php');
				factura_modelo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$facturamodeloLogic_Desde_factura_lote=new factura_modelo_logic();

				if($factura_lote_Desde_vendedor->getfactura_modelos()==null){
					$factura_lote_Desde_vendedor->setfactura_modelos(array());
				}

				$facturamodeloLogic_Desde_factura_lote->setfactura_modelos($factura_lote_Desde_vendedor->getfactura_modelos());

				$facturamodeloLogic_Desde_factura_lote->setConnexion($this->getConnexion());
				$facturamodeloLogic_Desde_factura_lote->setDatosCliente($this->datosCliente);

				foreach($facturamodeloLogic_Desde_factura_lote->getfactura_modelos() as $facturamodelo_Desde_factura_lote) {
					$facturamodelo_Desde_factura_lote->setid_factura_lote($idfactura_loteActual);
				}

				$facturamodeloLogic_Desde_factura_lote->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/devolucion_factura_carga.php');
			devolucion_factura_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$devolucionfacturaLogic_Desde_vendedor=new devolucion_factura_logic();
			$devolucionfacturaLogic_Desde_vendedor->setdevolucion_facturas($devolucionfacturas);

			$devolucionfacturaLogic_Desde_vendedor->setConnexion($this->getConnexion());
			$devolucionfacturaLogic_Desde_vendedor->setDatosCliente($this->datosCliente);

			foreach($devolucionfacturaLogic_Desde_vendedor->getdevolucion_facturas() as $devolucionfactura_Desde_vendedor) {
				$devolucionfactura_Desde_vendedor->setid_vendedor($idvendedorActual);

				$devolucionfacturaLogic_Desde_vendedor->setdevolucion_factura($devolucionfactura_Desde_vendedor);
				$devolucionfacturaLogic_Desde_vendedor->save();

				$iddevolucion_facturaActual=$devolucion_factura_Desde_vendedor->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/devolucion_factura_detalle_carga.php');
				devolucion_factura_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$devolucionfacturadetalleLogic_Desde_devolucion_factura=new devolucion_factura_detalle_logic();

				if($devolucion_factura_Desde_vendedor->getdevolucion_factura_detalles()==null){
					$devolucion_factura_Desde_vendedor->setdevolucion_factura_detalles(array());
				}

				$devolucionfacturadetalleLogic_Desde_devolucion_factura->setdevolucion_factura_detalles($devolucion_factura_Desde_vendedor->getdevolucion_factura_detalles());

				$devolucionfacturadetalleLogic_Desde_devolucion_factura->setConnexion($this->getConnexion());
				$devolucionfacturadetalleLogic_Desde_devolucion_factura->setDatosCliente($this->datosCliente);

				foreach($devolucionfacturadetalleLogic_Desde_devolucion_factura->getdevolucion_factura_detalles() as $devolucionfacturadetalle_Desde_devolucion_factura) {
					$devolucionfacturadetalle_Desde_devolucion_factura->setid_devolucion_factura($iddevolucion_facturaActual);
				}

				$devolucionfacturadetalleLogic_Desde_devolucion_factura->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/estimado_carga.php');
			estimado_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$estimadoLogic_Desde_vendedor=new estimado_logic();
			$estimadoLogic_Desde_vendedor->setestimados($estimados);

			$estimadoLogic_Desde_vendedor->setConnexion($this->getConnexion());
			$estimadoLogic_Desde_vendedor->setDatosCliente($this->datosCliente);

			foreach($estimadoLogic_Desde_vendedor->getestimados() as $estimado_Desde_vendedor) {
				$estimado_Desde_vendedor->setid_vendedor($idvendedorActual);

				$estimadoLogic_Desde_vendedor->setestimado($estimado_Desde_vendedor);
				$estimadoLogic_Desde_vendedor->save();

				$idestimadoActual=$estimado_Desde_vendedor->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/imagen_estimado_carga.php');
				imagen_estimado_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$imagenestimadoLogic_Desde_estimado=new imagen_estimado_logic();

				if($estimado_Desde_vendedor->getimagen_estimados()==null){
					$estimado_Desde_vendedor->setimagen_estimados(array());
				}

				$imagenestimadoLogic_Desde_estimado->setimagen_estimados($estimado_Desde_vendedor->getimagen_estimados());

				$imagenestimadoLogic_Desde_estimado->setConnexion($this->getConnexion());
				$imagenestimadoLogic_Desde_estimado->setDatosCliente($this->datosCliente);

				foreach($imagenestimadoLogic_Desde_estimado->getimagen_estimados() as $imagenestimado_Desde_estimado) {
					$imagenestimado_Desde_estimado->setid_estimado($idestimadoActual);
				}

				$imagenestimadoLogic_Desde_estimado->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/estimado_detalle_carga.php');
				estimado_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$estimadodetalleLogic_Desde_estimado=new estimado_detalle_logic();

				if($estimado_Desde_vendedor->getestimado_detalles()==null){
					$estimado_Desde_vendedor->setestimado_detalles(array());
				}

				$estimadodetalleLogic_Desde_estimado->setestimado_detalles($estimado_Desde_vendedor->getestimado_detalles());

				$estimadodetalleLogic_Desde_estimado->setConnexion($this->getConnexion());
				$estimadodetalleLogic_Desde_estimado->setDatosCliente($this->datosCliente);

				foreach($estimadodetalleLogic_Desde_estimado->getestimado_detalles() as $estimadodetalle_Desde_estimado) {
					$estimadodetalle_Desde_estimado->setid_estimado($idestimadoActual);
				}

				$estimadodetalleLogic_Desde_estimado->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/devolucion_carga.php');
			devolucion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$devolucionLogic_Desde_vendedor=new devolucion_logic();
			$devolucionLogic_Desde_vendedor->setdevolucions($devolucions);

			$devolucionLogic_Desde_vendedor->setConnexion($this->getConnexion());
			$devolucionLogic_Desde_vendedor->setDatosCliente($this->datosCliente);

			foreach($devolucionLogic_Desde_vendedor->getdevolucions() as $devolucion_Desde_vendedor) {
				$devolucion_Desde_vendedor->setid_vendedor($idvendedorActual);

				$devolucionLogic_Desde_vendedor->setdevolucion($devolucion_Desde_vendedor);
				$devolucionLogic_Desde_vendedor->save();

				$iddevolucionActual=$devolucion_Desde_vendedor->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/devolucion_detalle_carga.php');
				devolucion_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$devoluciondetalleLogic_Desde_devolucion=new devolucion_detalle_logic();

				if($devolucion_Desde_vendedor->getdevolucion_detalles()==null){
					$devolucion_Desde_vendedor->setdevolucion_detalles(array());
				}

				$devoluciondetalleLogic_Desde_devolucion->setdevolucion_detalles($devolucion_Desde_vendedor->getdevolucion_detalles());

				$devoluciondetalleLogic_Desde_devolucion->setConnexion($this->getConnexion());
				$devoluciondetalleLogic_Desde_devolucion->setDatosCliente($this->datosCliente);

				foreach($devoluciondetalleLogic_Desde_devolucion->getdevolucion_detalles() as $devoluciondetalle_Desde_devolucion) {
					$devoluciondetalle_Desde_devolucion->setid_devolucion($iddevolucionActual);
				}

				$devoluciondetalleLogic_Desde_devolucion->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/orden_compra_carga.php');
			orden_compra_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$ordencompraLogic_Desde_vendedor=new orden_compra_logic();
			$ordencompraLogic_Desde_vendedor->setorden_compras($ordencompras);

			$ordencompraLogic_Desde_vendedor->setConnexion($this->getConnexion());
			$ordencompraLogic_Desde_vendedor->setDatosCliente($this->datosCliente);

			foreach($ordencompraLogic_Desde_vendedor->getorden_compras() as $ordencompra_Desde_vendedor) {
				$ordencompra_Desde_vendedor->setid_vendedor($idvendedorActual);

				$ordencompraLogic_Desde_vendedor->setorden_compra($ordencompra_Desde_vendedor);
				$ordencompraLogic_Desde_vendedor->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_carga.php');
			factura_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$facturaLogic_Desde_vendedor=new factura_logic();
			$facturaLogic_Desde_vendedor->setfacturas($facturas);

			$facturaLogic_Desde_vendedor->setConnexion($this->getConnexion());
			$facturaLogic_Desde_vendedor->setDatosCliente($this->datosCliente);

			foreach($facturaLogic_Desde_vendedor->getfacturas() as $factura_Desde_vendedor) {
				$factura_Desde_vendedor->setid_vendedor($idvendedorActual);

				$facturaLogic_Desde_vendedor->setfactura($factura_Desde_vendedor);
				$facturaLogic_Desde_vendedor->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/cotizacion_carga.php');
			cotizacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cotizacionLogic_Desde_vendedor=new cotizacion_logic();
			$cotizacionLogic_Desde_vendedor->setcotizacions($cotizacions);

			$cotizacionLogic_Desde_vendedor->setConnexion($this->getConnexion());
			$cotizacionLogic_Desde_vendedor->setDatosCliente($this->datosCliente);

			foreach($cotizacionLogic_Desde_vendedor->getcotizacions() as $cotizacion_Desde_vendedor) {
				$cotizacion_Desde_vendedor->setid_vendedor($idvendedorActual);

				$cotizacionLogic_Desde_vendedor->setcotizacion($cotizacion_Desde_vendedor);
				$cotizacionLogic_Desde_vendedor->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/consignacion_carga.php');
			consignacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$consignacionLogic_Desde_vendedor=new consignacion_logic();
			$consignacionLogic_Desde_vendedor->setconsignacions($consignacions);

			$consignacionLogic_Desde_vendedor->setConnexion($this->getConnexion());
			$consignacionLogic_Desde_vendedor->setDatosCliente($this->datosCliente);

			foreach($consignacionLogic_Desde_vendedor->getconsignacions() as $consignacion_Desde_vendedor) {
				$consignacion_Desde_vendedor->setid_vendedor($idvendedorActual);

				$consignacionLogic_Desde_vendedor->setconsignacion($consignacion_Desde_vendedor);
				$consignacionLogic_Desde_vendedor->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/proveedor_carga.php');
			proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$proveedorLogic_Desde_vendedor=new proveedor_logic();
			$proveedorLogic_Desde_vendedor->setproveedors($proveedors);

			$proveedorLogic_Desde_vendedor->setConnexion($this->getConnexion());
			$proveedorLogic_Desde_vendedor->setDatosCliente($this->datosCliente);

			foreach($proveedorLogic_Desde_vendedor->getproveedors() as $proveedor_Desde_vendedor) {
				$proveedor_Desde_vendedor->setid_vendedor($idvendedorActual);

				$proveedorLogic_Desde_vendedor->setproveedor($proveedor_Desde_vendedor);
				$proveedorLogic_Desde_vendedor->save();
			}


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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $vendedors,vendedor_param_return $vendedorParameterGeneral) : vendedor_param_return {
		$vendedorReturnGeneral=new vendedor_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $vendedorReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $vendedors,vendedor_param_return $vendedorParameterGeneral) : vendedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$vendedorReturnGeneral=new vendedor_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $vendedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $vendedors,vendedor $vendedor,vendedor_param_return $vendedorParameterGeneral,bool $isEsNuevovendedor,array $clases) : vendedor_param_return {
		 try {	
			$vendedorReturnGeneral=new vendedor_param_return();
	
			$vendedorReturnGeneral->setvendedor($vendedor);
			$vendedorReturnGeneral->setvendedors($vendedors);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$vendedorReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $vendedorReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $vendedors,vendedor $vendedor,vendedor_param_return $vendedorParameterGeneral,bool $isEsNuevovendedor,array $clases) : vendedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$vendedorReturnGeneral=new vendedor_param_return();
	
			$vendedorReturnGeneral->setvendedor($vendedor);
			$vendedorReturnGeneral->setvendedors($vendedors);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$vendedorReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $vendedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $vendedors,vendedor $vendedor,vendedor_param_return $vendedorParameterGeneral,bool $isEsNuevovendedor,array $clases) : vendedor_param_return {
		 try {	
			$vendedorReturnGeneral=new vendedor_param_return();
	
			$vendedorReturnGeneral->setvendedor($vendedor);
			$vendedorReturnGeneral->setvendedors($vendedors);
			
			
			
			return $vendedorReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $vendedors,vendedor $vendedor,vendedor_param_return $vendedorParameterGeneral,bool $isEsNuevovendedor,array $clases) : vendedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$vendedorReturnGeneral=new vendedor_param_return();
	
			$vendedorReturnGeneral->setvendedor($vendedor);
			$vendedorReturnGeneral->setvendedors($vendedors);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $vendedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,vendedor $vendedor,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,vendedor $vendedor,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		vendedor_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		vendedor_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(vendedor $vendedor,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//vendedor_logic_add::updatevendedorToGet($this->vendedor);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$vendedor->setempresa($this->vendedorDataAccess->getempresa($this->connexion,$vendedor));
		$vendedor->setclientes($this->vendedorDataAccess->getclientes($this->connexion,$vendedor));
		$vendedor->setfactura_lotes($this->vendedorDataAccess->getfactura_lotes($this->connexion,$vendedor));
		$vendedor->setdevolucion_facturas($this->vendedorDataAccess->getdevolucion_facturas($this->connexion,$vendedor));
		$vendedor->setestimados($this->vendedorDataAccess->getestimados($this->connexion,$vendedor));
		$vendedor->setdevolucions($this->vendedorDataAccess->getdevolucions($this->connexion,$vendedor));
		$vendedor->setorden_compras($this->vendedorDataAccess->getorden_compras($this->connexion,$vendedor));
		$vendedor->setfacturas($this->vendedorDataAccess->getfacturas($this->connexion,$vendedor));
		$vendedor->setcotizacions($this->vendedorDataAccess->getcotizacions($this->connexion,$vendedor));
		$vendedor->setconsignacions($this->vendedorDataAccess->getconsignacions($this->connexion,$vendedor));
		$vendedor->setproveedors($this->vendedorDataAccess->getproveedors($this->connexion,$vendedor));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$vendedor->setempresa($this->vendedorDataAccess->getempresa($this->connexion,$vendedor));
				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$vendedor->setclientes($this->vendedorDataAccess->getclientes($this->connexion,$vendedor));

				if($this->isConDeep) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->setclientes($vendedor->getclientes());
					$classesLocal=cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$clienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cliente_util::refrescarFKDescripciones($clienteLogic->getclientes());
					$vendedor->setclientes($clienteLogic->getclientes());
				}

				continue;
			}

			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$vendedor->setfactura_lotes($this->vendedorDataAccess->getfactura_lotes($this->connexion,$vendedor));

				if($this->isConDeep) {
					$facturaloteLogic= new factura_lote_logic($this->connexion);
					$facturaloteLogic->setfactura_lotes($vendedor->getfactura_lotes());
					$classesLocal=factura_lote_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$facturaloteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					factura_lote_util::refrescarFKDescripciones($facturaloteLogic->getfactura_lotes());
					$vendedor->setfactura_lotes($facturaloteLogic->getfactura_lotes());
				}

				continue;
			}

			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$vendedor->setdevolucion_facturas($this->vendedorDataAccess->getdevolucion_facturas($this->connexion,$vendedor));

				if($this->isConDeep) {
					$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
					$devolucionfacturaLogic->setdevolucion_facturas($vendedor->getdevolucion_facturas());
					$classesLocal=devolucion_factura_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$devolucionfacturaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					devolucion_factura_util::refrescarFKDescripciones($devolucionfacturaLogic->getdevolucion_facturas());
					$vendedor->setdevolucion_facturas($devolucionfacturaLogic->getdevolucion_facturas());
				}

				continue;
			}

			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$vendedor->setestimados($this->vendedorDataAccess->getestimados($this->connexion,$vendedor));

				if($this->isConDeep) {
					$estimadoLogic= new estimado_logic($this->connexion);
					$estimadoLogic->setestimados($vendedor->getestimados());
					$classesLocal=estimado_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$estimadoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					estimado_util::refrescarFKDescripciones($estimadoLogic->getestimados());
					$vendedor->setestimados($estimadoLogic->getestimados());
				}

				continue;
			}

			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$vendedor->setdevolucions($this->vendedorDataAccess->getdevolucions($this->connexion,$vendedor));

				if($this->isConDeep) {
					$devolucionLogic= new devolucion_logic($this->connexion);
					$devolucionLogic->setdevolucions($vendedor->getdevolucions());
					$classesLocal=devolucion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$devolucionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					devolucion_util::refrescarFKDescripciones($devolucionLogic->getdevolucions());
					$vendedor->setdevolucions($devolucionLogic->getdevolucions());
				}

				continue;
			}

			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$vendedor->setorden_compras($this->vendedorDataAccess->getorden_compras($this->connexion,$vendedor));

				if($this->isConDeep) {
					$ordencompraLogic= new orden_compra_logic($this->connexion);
					$ordencompraLogic->setorden_compras($vendedor->getorden_compras());
					$classesLocal=orden_compra_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$ordencompraLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					orden_compra_util::refrescarFKDescripciones($ordencompraLogic->getorden_compras());
					$vendedor->setorden_compras($ordencompraLogic->getorden_compras());
				}

				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$vendedor->setfacturas($this->vendedorDataAccess->getfacturas($this->connexion,$vendedor));

				if($this->isConDeep) {
					$facturaLogic= new factura_logic($this->connexion);
					$facturaLogic->setfacturas($vendedor->getfacturas());
					$classesLocal=factura_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$facturaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					factura_util::refrescarFKDescripciones($facturaLogic->getfacturas());
					$vendedor->setfacturas($facturaLogic->getfacturas());
				}

				continue;
			}

			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$vendedor->setcotizacions($this->vendedorDataAccess->getcotizacions($this->connexion,$vendedor));

				if($this->isConDeep) {
					$cotizacionLogic= new cotizacion_logic($this->connexion);
					$cotizacionLogic->setcotizacions($vendedor->getcotizacions());
					$classesLocal=cotizacion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cotizacionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cotizacion_util::refrescarFKDescripciones($cotizacionLogic->getcotizacions());
					$vendedor->setcotizacions($cotizacionLogic->getcotizacions());
				}

				continue;
			}

			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$vendedor->setconsignacions($this->vendedorDataAccess->getconsignacions($this->connexion,$vendedor));

				if($this->isConDeep) {
					$consignacionLogic= new consignacion_logic($this->connexion);
					$consignacionLogic->setconsignacions($vendedor->getconsignacions());
					$classesLocal=consignacion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$consignacionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					consignacion_util::refrescarFKDescripciones($consignacionLogic->getconsignacions());
					$vendedor->setconsignacions($consignacionLogic->getconsignacions());
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$vendedor->setproveedors($this->vendedorDataAccess->getproveedors($this->connexion,$vendedor));

				if($this->isConDeep) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->setproveedors($vendedor->getproveedors());
					$classesLocal=proveedor_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					proveedor_util::refrescarFKDescripciones($proveedorLogic->getproveedors());
					$vendedor->setproveedors($proveedorLogic->getproveedors());
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
			$vendedor->setempresa($this->vendedorDataAccess->getempresa($this->connexion,$vendedor));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cliente::$class);
			$vendedor->setclientes($this->vendedorDataAccess->getclientes($this->connexion,$vendedor));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura_lote::$class);
			$vendedor->setfactura_lotes($this->vendedorDataAccess->getfactura_lotes($this->connexion,$vendedor));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion_factura::$class);
			$vendedor->setdevolucion_facturas($this->vendedorDataAccess->getdevolucion_facturas($this->connexion,$vendedor));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(estimado::$class);
			$vendedor->setestimados($this->vendedorDataAccess->getestimados($this->connexion,$vendedor));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion::$class);
			$vendedor->setdevolucions($this->vendedorDataAccess->getdevolucions($this->connexion,$vendedor));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(orden_compra::$class);
			$vendedor->setorden_compras($this->vendedorDataAccess->getorden_compras($this->connexion,$vendedor));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura::$class);
			$vendedor->setfacturas($this->vendedorDataAccess->getfacturas($this->connexion,$vendedor));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cotizacion::$class);
			$vendedor->setcotizacions($this->vendedorDataAccess->getcotizacions($this->connexion,$vendedor));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(consignacion::$class);
			$vendedor->setconsignacions($this->vendedorDataAccess->getconsignacions($this->connexion,$vendedor));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);
			$vendedor->setproveedors($this->vendedorDataAccess->getproveedors($this->connexion,$vendedor));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$vendedor->setempresa($this->vendedorDataAccess->getempresa($this->connexion,$vendedor));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($vendedor->getempresa(),$isDeep,$deepLoadType,$clases);
				

		$vendedor->setclientes($this->vendedorDataAccess->getclientes($this->connexion,$vendedor));

		foreach($vendedor->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
		}

		$vendedor->setfactura_lotes($this->vendedorDataAccess->getfactura_lotes($this->connexion,$vendedor));

		foreach($vendedor->getfactura_lotes() as $facturalote) {
			$facturaloteLogic= new factura_lote_logic($this->connexion);
			$facturaloteLogic->deepLoad($facturalote,$isDeep,$deepLoadType,$clases);
		}

		$vendedor->setdevolucion_facturas($this->vendedorDataAccess->getdevolucion_facturas($this->connexion,$vendedor));

		foreach($vendedor->getdevolucion_facturas() as $devolucionfactura) {
			$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
			$devolucionfacturaLogic->deepLoad($devolucionfactura,$isDeep,$deepLoadType,$clases);
		}

		$vendedor->setestimados($this->vendedorDataAccess->getestimados($this->connexion,$vendedor));

		foreach($vendedor->getestimados() as $estimado) {
			$estimadoLogic= new estimado_logic($this->connexion);
			$estimadoLogic->deepLoad($estimado,$isDeep,$deepLoadType,$clases);
		}

		$vendedor->setdevolucions($this->vendedorDataAccess->getdevolucions($this->connexion,$vendedor));

		foreach($vendedor->getdevolucions() as $devolucion) {
			$devolucionLogic= new devolucion_logic($this->connexion);
			$devolucionLogic->deepLoad($devolucion,$isDeep,$deepLoadType,$clases);
		}

		$vendedor->setorden_compras($this->vendedorDataAccess->getorden_compras($this->connexion,$vendedor));

		foreach($vendedor->getorden_compras() as $ordencompra) {
			$ordencompraLogic= new orden_compra_logic($this->connexion);
			$ordencompraLogic->deepLoad($ordencompra,$isDeep,$deepLoadType,$clases);
		}

		$vendedor->setfacturas($this->vendedorDataAccess->getfacturas($this->connexion,$vendedor));

		foreach($vendedor->getfacturas() as $factura) {
			$facturaLogic= new factura_logic($this->connexion);
			$facturaLogic->deepLoad($factura,$isDeep,$deepLoadType,$clases);
		}

		$vendedor->setcotizacions($this->vendedorDataAccess->getcotizacions($this->connexion,$vendedor));

		foreach($vendedor->getcotizacions() as $cotizacion) {
			$cotizacionLogic= new cotizacion_logic($this->connexion);
			$cotizacionLogic->deepLoad($cotizacion,$isDeep,$deepLoadType,$clases);
		}

		$vendedor->setconsignacions($this->vendedorDataAccess->getconsignacions($this->connexion,$vendedor));

		foreach($vendedor->getconsignacions() as $consignacion) {
			$consignacionLogic= new consignacion_logic($this->connexion);
			$consignacionLogic->deepLoad($consignacion,$isDeep,$deepLoadType,$clases);
		}

		$vendedor->setproveedors($this->vendedorDataAccess->getproveedors($this->connexion,$vendedor));

		foreach($vendedor->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$vendedor->setempresa($this->vendedorDataAccess->getempresa($this->connexion,$vendedor));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($vendedor->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$vendedor->setclientes($this->vendedorDataAccess->getclientes($this->connexion,$vendedor));

				foreach($vendedor->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$vendedor->setfactura_lotes($this->vendedorDataAccess->getfactura_lotes($this->connexion,$vendedor));

				foreach($vendedor->getfactura_lotes() as $facturalote) {
					$facturaloteLogic= new factura_lote_logic($this->connexion);
					$facturaloteLogic->deepLoad($facturalote,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$vendedor->setdevolucion_facturas($this->vendedorDataAccess->getdevolucion_facturas($this->connexion,$vendedor));

				foreach($vendedor->getdevolucion_facturas() as $devolucionfactura) {
					$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
					$devolucionfacturaLogic->deepLoad($devolucionfactura,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$vendedor->setestimados($this->vendedorDataAccess->getestimados($this->connexion,$vendedor));

				foreach($vendedor->getestimados() as $estimado) {
					$estimadoLogic= new estimado_logic($this->connexion);
					$estimadoLogic->deepLoad($estimado,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$vendedor->setdevolucions($this->vendedorDataAccess->getdevolucions($this->connexion,$vendedor));

				foreach($vendedor->getdevolucions() as $devolucion) {
					$devolucionLogic= new devolucion_logic($this->connexion);
					$devolucionLogic->deepLoad($devolucion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$vendedor->setorden_compras($this->vendedorDataAccess->getorden_compras($this->connexion,$vendedor));

				foreach($vendedor->getorden_compras() as $ordencompra) {
					$ordencompraLogic= new orden_compra_logic($this->connexion);
					$ordencompraLogic->deepLoad($ordencompra,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$vendedor->setfacturas($this->vendedorDataAccess->getfacturas($this->connexion,$vendedor));

				foreach($vendedor->getfacturas() as $factura) {
					$facturaLogic= new factura_logic($this->connexion);
					$facturaLogic->deepLoad($factura,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$vendedor->setcotizacions($this->vendedorDataAccess->getcotizacions($this->connexion,$vendedor));

				foreach($vendedor->getcotizacions() as $cotizacion) {
					$cotizacionLogic= new cotizacion_logic($this->connexion);
					$cotizacionLogic->deepLoad($cotizacion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$vendedor->setconsignacions($this->vendedorDataAccess->getconsignacions($this->connexion,$vendedor));

				foreach($vendedor->getconsignacions() as $consignacion) {
					$consignacionLogic= new consignacion_logic($this->connexion);
					$consignacionLogic->deepLoad($consignacion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$vendedor->setproveedors($this->vendedorDataAccess->getproveedors($this->connexion,$vendedor));

				foreach($vendedor->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
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
			$vendedor->setempresa($this->vendedorDataAccess->getempresa($this->connexion,$vendedor));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($vendedor->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cliente::$class);
			$vendedor->setclientes($this->vendedorDataAccess->getclientes($this->connexion,$vendedor));

			foreach($vendedor->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura_lote::$class);
			$vendedor->setfactura_lotes($this->vendedorDataAccess->getfactura_lotes($this->connexion,$vendedor));

			foreach($vendedor->getfactura_lotes() as $facturalote) {
				$facturaloteLogic= new factura_lote_logic($this->connexion);
				$facturaloteLogic->deepLoad($facturalote,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion_factura::$class);
			$vendedor->setdevolucion_facturas($this->vendedorDataAccess->getdevolucion_facturas($this->connexion,$vendedor));

			foreach($vendedor->getdevolucion_facturas() as $devolucionfactura) {
				$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
				$devolucionfacturaLogic->deepLoad($devolucionfactura,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(estimado::$class);
			$vendedor->setestimados($this->vendedorDataAccess->getestimados($this->connexion,$vendedor));

			foreach($vendedor->getestimados() as $estimado) {
				$estimadoLogic= new estimado_logic($this->connexion);
				$estimadoLogic->deepLoad($estimado,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion::$class);
			$vendedor->setdevolucions($this->vendedorDataAccess->getdevolucions($this->connexion,$vendedor));

			foreach($vendedor->getdevolucions() as $devolucion) {
				$devolucionLogic= new devolucion_logic($this->connexion);
				$devolucionLogic->deepLoad($devolucion,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(orden_compra::$class);
			$vendedor->setorden_compras($this->vendedorDataAccess->getorden_compras($this->connexion,$vendedor));

			foreach($vendedor->getorden_compras() as $ordencompra) {
				$ordencompraLogic= new orden_compra_logic($this->connexion);
				$ordencompraLogic->deepLoad($ordencompra,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura::$class);
			$vendedor->setfacturas($this->vendedorDataAccess->getfacturas($this->connexion,$vendedor));

			foreach($vendedor->getfacturas() as $factura) {
				$facturaLogic= new factura_logic($this->connexion);
				$facturaLogic->deepLoad($factura,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cotizacion::$class);
			$vendedor->setcotizacions($this->vendedorDataAccess->getcotizacions($this->connexion,$vendedor));

			foreach($vendedor->getcotizacions() as $cotizacion) {
				$cotizacionLogic= new cotizacion_logic($this->connexion);
				$cotizacionLogic->deepLoad($cotizacion,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(consignacion::$class);
			$vendedor->setconsignacions($this->vendedorDataAccess->getconsignacions($this->connexion,$vendedor));

			foreach($vendedor->getconsignacions() as $consignacion) {
				$consignacionLogic= new consignacion_logic($this->connexion);
				$consignacionLogic->deepLoad($consignacion,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);
			$vendedor->setproveedors($this->vendedorDataAccess->getproveedors($this->connexion,$vendedor));

			foreach($vendedor->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(vendedor $vendedor,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//vendedor_logic_add::updatevendedorToSave($this->vendedor);			
			
			if(!$paraDeleteCascade) {				
				vendedor_data::save($vendedor, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($vendedor->getempresa(),$this->connexion);

		foreach($vendedor->getclientes() as $cliente) {
			$cliente->setid_vendedor($vendedor->getId());
			cliente_data::save($cliente,$this->connexion);
		}


		foreach($vendedor->getfactura_lotes() as $facturalote) {
			$facturalote->setid_vendedor($vendedor->getId());
			factura_lote_data::save($facturalote,$this->connexion);
		}


		foreach($vendedor->getdevolucion_facturas() as $devolucionfactura) {
			$devolucionfactura->setid_vendedor($vendedor->getId());
			devolucion_factura_data::save($devolucionfactura,$this->connexion);
		}


		foreach($vendedor->getestimados() as $estimado) {
			$estimado->setid_vendedor($vendedor->getId());
			estimado_data::save($estimado,$this->connexion);
		}


		foreach($vendedor->getdevolucions() as $devolucion) {
			$devolucion->setid_vendedor($vendedor->getId());
			devolucion_data::save($devolucion,$this->connexion);
		}


		foreach($vendedor->getorden_compras() as $ordencompra) {
			$ordencompra->setid_vendedor($vendedor->getId());
			orden_compra_data::save($ordencompra,$this->connexion);
		}


		foreach($vendedor->getfacturas() as $factura) {
			$factura->setid_vendedor($vendedor->getId());
			factura_data::save($factura,$this->connexion);
		}


		foreach($vendedor->getcotizacions() as $cotizacion) {
			$cotizacion->setid_vendedor($vendedor->getId());
			cotizacion_data::save($cotizacion,$this->connexion);
		}


		foreach($vendedor->getconsignacions() as $consignacion) {
			$consignacion->setid_vendedor($vendedor->getId());
			consignacion_data::save($consignacion,$this->connexion);
		}


		foreach($vendedor->getproveedors() as $proveedor) {
			$proveedor->setid_vendedor($vendedor->getId());
			proveedor_data::save($proveedor,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($vendedor->getempresa(),$this->connexion);
				continue;
			}


			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($vendedor->getclientes() as $cliente) {
					$cliente->setid_vendedor($vendedor->getId());
					cliente_data::save($cliente,$this->connexion);
				}

				continue;
			}

			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($vendedor->getfactura_lotes() as $facturalote) {
					$facturalote->setid_vendedor($vendedor->getId());
					factura_lote_data::save($facturalote,$this->connexion);
				}

				continue;
			}

			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($vendedor->getdevolucion_facturas() as $devolucionfactura) {
					$devolucionfactura->setid_vendedor($vendedor->getId());
					devolucion_factura_data::save($devolucionfactura,$this->connexion);
				}

				continue;
			}

			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($vendedor->getestimados() as $estimado) {
					$estimado->setid_vendedor($vendedor->getId());
					estimado_data::save($estimado,$this->connexion);
				}

				continue;
			}

			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($vendedor->getdevolucions() as $devolucion) {
					$devolucion->setid_vendedor($vendedor->getId());
					devolucion_data::save($devolucion,$this->connexion);
				}

				continue;
			}

			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($vendedor->getorden_compras() as $ordencompra) {
					$ordencompra->setid_vendedor($vendedor->getId());
					orden_compra_data::save($ordencompra,$this->connexion);
				}

				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($vendedor->getfacturas() as $factura) {
					$factura->setid_vendedor($vendedor->getId());
					factura_data::save($factura,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($vendedor->getcotizacions() as $cotizacion) {
					$cotizacion->setid_vendedor($vendedor->getId());
					cotizacion_data::save($cotizacion,$this->connexion);
				}

				continue;
			}

			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($vendedor->getconsignacions() as $consignacion) {
					$consignacion->setid_vendedor($vendedor->getId());
					consignacion_data::save($consignacion,$this->connexion);
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($vendedor->getproveedors() as $proveedor) {
					$proveedor->setid_vendedor($vendedor->getId());
					proveedor_data::save($proveedor,$this->connexion);
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
			empresa_data::save($vendedor->getempresa(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cliente::$class);

			foreach($vendedor->getclientes() as $cliente) {
				$cliente->setid_vendedor($vendedor->getId());
				cliente_data::save($cliente,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura_lote::$class);

			foreach($vendedor->getfactura_lotes() as $facturalote) {
				$facturalote->setid_vendedor($vendedor->getId());
				factura_lote_data::save($facturalote,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion_factura::$class);

			foreach($vendedor->getdevolucion_facturas() as $devolucionfactura) {
				$devolucionfactura->setid_vendedor($vendedor->getId());
				devolucion_factura_data::save($devolucionfactura,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(estimado::$class);

			foreach($vendedor->getestimados() as $estimado) {
				$estimado->setid_vendedor($vendedor->getId());
				estimado_data::save($estimado,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion::$class);

			foreach($vendedor->getdevolucions() as $devolucion) {
				$devolucion->setid_vendedor($vendedor->getId());
				devolucion_data::save($devolucion,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(orden_compra::$class);

			foreach($vendedor->getorden_compras() as $ordencompra) {
				$ordencompra->setid_vendedor($vendedor->getId());
				orden_compra_data::save($ordencompra,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura::$class);

			foreach($vendedor->getfacturas() as $factura) {
				$factura->setid_vendedor($vendedor->getId());
				factura_data::save($factura,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cotizacion::$class);

			foreach($vendedor->getcotizacions() as $cotizacion) {
				$cotizacion->setid_vendedor($vendedor->getId());
				cotizacion_data::save($cotizacion,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(consignacion::$class);

			foreach($vendedor->getconsignacions() as $consignacion) {
				$consignacion->setid_vendedor($vendedor->getId());
				consignacion_data::save($consignacion,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);

			foreach($vendedor->getproveedors() as $proveedor) {
				$proveedor->setid_vendedor($vendedor->getId());
				proveedor_data::save($proveedor,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($vendedor->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($vendedor->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($vendedor->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$cliente->setid_vendedor($vendedor->getId());
			cliente_data::save($cliente,$this->connexion);
			$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($vendedor->getfactura_lotes() as $facturalote) {
			$facturaloteLogic= new factura_lote_logic($this->connexion);
			$facturalote->setid_vendedor($vendedor->getId());
			factura_lote_data::save($facturalote,$this->connexion);
			$facturaloteLogic->deepSave($facturalote,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($vendedor->getdevolucion_facturas() as $devolucionfactura) {
			$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
			$devolucionfactura->setid_vendedor($vendedor->getId());
			devolucion_factura_data::save($devolucionfactura,$this->connexion);
			$devolucionfacturaLogic->deepSave($devolucionfactura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($vendedor->getestimados() as $estimado) {
			$estimadoLogic= new estimado_logic($this->connexion);
			$estimado->setid_vendedor($vendedor->getId());
			estimado_data::save($estimado,$this->connexion);
			$estimadoLogic->deepSave($estimado,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($vendedor->getdevolucions() as $devolucion) {
			$devolucionLogic= new devolucion_logic($this->connexion);
			$devolucion->setid_vendedor($vendedor->getId());
			devolucion_data::save($devolucion,$this->connexion);
			$devolucionLogic->deepSave($devolucion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($vendedor->getorden_compras() as $ordencompra) {
			$ordencompraLogic= new orden_compra_logic($this->connexion);
			$ordencompra->setid_vendedor($vendedor->getId());
			orden_compra_data::save($ordencompra,$this->connexion);
			$ordencompraLogic->deepSave($ordencompra,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($vendedor->getfacturas() as $factura) {
			$facturaLogic= new factura_logic($this->connexion);
			$factura->setid_vendedor($vendedor->getId());
			factura_data::save($factura,$this->connexion);
			$facturaLogic->deepSave($factura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($vendedor->getcotizacions() as $cotizacion) {
			$cotizacionLogic= new cotizacion_logic($this->connexion);
			$cotizacion->setid_vendedor($vendedor->getId());
			cotizacion_data::save($cotizacion,$this->connexion);
			$cotizacionLogic->deepSave($cotizacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($vendedor->getconsignacions() as $consignacion) {
			$consignacionLogic= new consignacion_logic($this->connexion);
			$consignacion->setid_vendedor($vendedor->getId());
			consignacion_data::save($consignacion,$this->connexion);
			$consignacionLogic->deepSave($consignacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($vendedor->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedor->setid_vendedor($vendedor->getId());
			proveedor_data::save($proveedor,$this->connexion);
			$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($vendedor->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($vendedor->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($vendedor->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$cliente->setid_vendedor($vendedor->getId());
					cliente_data::save($cliente,$this->connexion);
					$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($vendedor->getfactura_lotes() as $facturalote) {
					$facturaloteLogic= new factura_lote_logic($this->connexion);
					$facturalote->setid_vendedor($vendedor->getId());
					factura_lote_data::save($facturalote,$this->connexion);
					$facturaloteLogic->deepSave($facturalote,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($vendedor->getdevolucion_facturas() as $devolucionfactura) {
					$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
					$devolucionfactura->setid_vendedor($vendedor->getId());
					devolucion_factura_data::save($devolucionfactura,$this->connexion);
					$devolucionfacturaLogic->deepSave($devolucionfactura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($vendedor->getestimados() as $estimado) {
					$estimadoLogic= new estimado_logic($this->connexion);
					$estimado->setid_vendedor($vendedor->getId());
					estimado_data::save($estimado,$this->connexion);
					$estimadoLogic->deepSave($estimado,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($vendedor->getdevolucions() as $devolucion) {
					$devolucionLogic= new devolucion_logic($this->connexion);
					$devolucion->setid_vendedor($vendedor->getId());
					devolucion_data::save($devolucion,$this->connexion);
					$devolucionLogic->deepSave($devolucion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($vendedor->getorden_compras() as $ordencompra) {
					$ordencompraLogic= new orden_compra_logic($this->connexion);
					$ordencompra->setid_vendedor($vendedor->getId());
					orden_compra_data::save($ordencompra,$this->connexion);
					$ordencompraLogic->deepSave($ordencompra,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($vendedor->getfacturas() as $factura) {
					$facturaLogic= new factura_logic($this->connexion);
					$factura->setid_vendedor($vendedor->getId());
					factura_data::save($factura,$this->connexion);
					$facturaLogic->deepSave($factura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($vendedor->getcotizacions() as $cotizacion) {
					$cotizacionLogic= new cotizacion_logic($this->connexion);
					$cotizacion->setid_vendedor($vendedor->getId());
					cotizacion_data::save($cotizacion,$this->connexion);
					$cotizacionLogic->deepSave($cotizacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($vendedor->getconsignacions() as $consignacion) {
					$consignacionLogic= new consignacion_logic($this->connexion);
					$consignacion->setid_vendedor($vendedor->getId());
					consignacion_data::save($consignacion,$this->connexion);
					$consignacionLogic->deepSave($consignacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($vendedor->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedor->setid_vendedor($vendedor->getId());
					proveedor_data::save($proveedor,$this->connexion);
					$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($vendedor->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($vendedor->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cliente::$class);

			foreach($vendedor->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$cliente->setid_vendedor($vendedor->getId());
				cliente_data::save($cliente,$this->connexion);
				$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura_lote::$class);

			foreach($vendedor->getfactura_lotes() as $facturalote) {
				$facturaloteLogic= new factura_lote_logic($this->connexion);
				$facturalote->setid_vendedor($vendedor->getId());
				factura_lote_data::save($facturalote,$this->connexion);
				$facturaloteLogic->deepSave($facturalote,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion_factura::$class);

			foreach($vendedor->getdevolucion_facturas() as $devolucionfactura) {
				$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
				$devolucionfactura->setid_vendedor($vendedor->getId());
				devolucion_factura_data::save($devolucionfactura,$this->connexion);
				$devolucionfacturaLogic->deepSave($devolucionfactura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(estimado::$class);

			foreach($vendedor->getestimados() as $estimado) {
				$estimadoLogic= new estimado_logic($this->connexion);
				$estimado->setid_vendedor($vendedor->getId());
				estimado_data::save($estimado,$this->connexion);
				$estimadoLogic->deepSave($estimado,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion::$class);

			foreach($vendedor->getdevolucions() as $devolucion) {
				$devolucionLogic= new devolucion_logic($this->connexion);
				$devolucion->setid_vendedor($vendedor->getId());
				devolucion_data::save($devolucion,$this->connexion);
				$devolucionLogic->deepSave($devolucion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(orden_compra::$class);

			foreach($vendedor->getorden_compras() as $ordencompra) {
				$ordencompraLogic= new orden_compra_logic($this->connexion);
				$ordencompra->setid_vendedor($vendedor->getId());
				orden_compra_data::save($ordencompra,$this->connexion);
				$ordencompraLogic->deepSave($ordencompra,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura::$class);

			foreach($vendedor->getfacturas() as $factura) {
				$facturaLogic= new factura_logic($this->connexion);
				$factura->setid_vendedor($vendedor->getId());
				factura_data::save($factura,$this->connexion);
				$facturaLogic->deepSave($factura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cotizacion::$class);

			foreach($vendedor->getcotizacions() as $cotizacion) {
				$cotizacionLogic= new cotizacion_logic($this->connexion);
				$cotizacion->setid_vendedor($vendedor->getId());
				cotizacion_data::save($cotizacion,$this->connexion);
				$cotizacionLogic->deepSave($cotizacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(consignacion::$class);

			foreach($vendedor->getconsignacions() as $consignacion) {
				$consignacionLogic= new consignacion_logic($this->connexion);
				$consignacion->setid_vendedor($vendedor->getId());
				consignacion_data::save($consignacion,$this->connexion);
				$consignacionLogic->deepSave($consignacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);

			foreach($vendedor->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedor->setid_vendedor($vendedor->getId());
				proveedor_data::save($proveedor,$this->connexion);
				$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				vendedor_data::save($vendedor, $this->connexion);
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
			
			$this->deepLoad($this->vendedor,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->vendedors as $vendedor) {
				$this->deepLoad($vendedor,$isDeep,$deepLoadType,$clases);
								
				vendedor_util::refrescarFKDescripciones($this->vendedors);
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
			
			foreach($this->vendedors as $vendedor) {
				$this->deepLoad($vendedor,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->vendedor,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->vendedors as $vendedor) {
				$this->deepSave($vendedor,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->vendedors as $vendedor) {
				$this->deepSave($vendedor,$isDeep,$deepLoadType,$clases,false);
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
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
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
				
				$classes[]=new Classe(cliente::$class);
				$classes[]=new Classe(factura_lote::$class);
				$classes[]=new Classe(devolucion_factura::$class);
				$classes[]=new Classe(estimado::$class);
				$classes[]=new Classe(devolucion::$class);
				$classes[]=new Classe(orden_compra::$class);
				$classes[]=new Classe(factura::$class);
				$classes[]=new Classe(cotizacion::$class);
				$classes[]=new Classe(consignacion::$class);
				$classes[]=new Classe(proveedor::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==factura_lote::$class) {
						$classes[]=new Classe(factura_lote::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==devolucion_factura::$class) {
						$classes[]=new Classe(devolucion_factura::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==estimado::$class) {
						$classes[]=new Classe(estimado::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==devolucion::$class) {
						$classes[]=new Classe(devolucion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==orden_compra::$class) {
						$classes[]=new Classe(orden_compra::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==factura::$class) {
						$classes[]=new Classe(factura::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==cotizacion::$class) {
						$classes[]=new Classe(cotizacion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==consignacion::$class) {
						$classes[]=new Classe(consignacion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cliente::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==factura_lote::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(factura_lote::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==devolucion_factura::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(devolucion_factura::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==estimado::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(estimado::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==devolucion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(devolucion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==orden_compra::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(orden_compra::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==factura::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(factura::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==cotizacion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cotizacion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==consignacion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(consignacion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
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
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getvendedor() : ?vendedor {	
		/*
		vendedor_logic_add::checkvendedorToGet($this->vendedor,$this->datosCliente);
		vendedor_logic_add::updatevendedorToGet($this->vendedor);
		*/
			
		return $this->vendedor;
	}
		
	public function setvendedor(vendedor $newvendedor) {
		$this->vendedor = $newvendedor;
	}
	
	public function getvendedors() : array {		
		/*
		vendedor_logic_add::checkvendedorToGets($this->vendedors,$this->datosCliente);
		
		foreach ($this->vendedors as $vendedorLocal ) {
			vendedor_logic_add::updatevendedorToGet($vendedorLocal);
		}
		*/
		
		return $this->vendedors;
	}
	
	public function setvendedors(array $newvendedors) {
		$this->vendedors = $newvendedors;
	}
	
	public function getvendedorDataAccess() : vendedor_data {
		return $this->vendedorDataAccess;
	}
	
	public function setvendedorDataAccess(vendedor_data $newvendedorDataAccess) {
		$this->vendedorDataAccess = $newvendedorDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        vendedor_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		factura_lote_detalle_logic::$logger;
		factura_modelo_logic::$logger;
		devolucion_factura_detalle_logic::$logger;
		imagen_estimado_logic::$logger;
		estimado_detalle_logic::$logger;
		devolucion_detalle_logic::$logger;
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
