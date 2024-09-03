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

namespace com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_param_return;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\presentation\session\termino_pago_proveedor_session;

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

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\data\termino_pago_proveedor_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\tipo_termino_pago\business\entity\tipo_termino_pago;
use com\bydan\contabilidad\general\tipo_termino_pago\business\data\tipo_termino_pago_data;
use com\bydan\contabilidad\general\tipo_termino_pago\business\logic\tipo_termino_pago_logic;
use com\bydan\contabilidad\general\tipo_termino_pago\util\tipo_termino_pago_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL


use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;
use com\bydan\contabilidad\inventario\orden_compra\business\data\orden_compra_data;
use com\bydan\contabilidad\inventario\orden_compra\business\logic\orden_compra_logic;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\business\entity\credito_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\business\data\credito_cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\business\logic\credito_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_util;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\data\cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\logic\cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;

use com\bydan\contabilidad\inventario\cotizacion\business\entity\cotizacion;
use com\bydan\contabilidad\inventario\cotizacion\business\data\cotizacion_data;
use com\bydan\contabilidad\inventario\cotizacion\business\logic\cotizacion_logic;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_carga;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_util;

use com\bydan\contabilidad\inventario\parametro_inventario\business\entity\parametro_inventario;
use com\bydan\contabilidad\inventario\parametro_inventario\business\data\parametro_inventario_data;
use com\bydan\contabilidad\inventario\parametro_inventario\business\logic\parametro_inventario_logic;
use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_carga;
use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_util;

use com\bydan\contabilidad\inventario\devolucion\business\entity\devolucion;
use com\bydan\contabilidad\inventario\devolucion\business\data\devolucion_data;
use com\bydan\contabilidad\inventario\devolucion\business\logic\devolucion_logic;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_carga;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_util;

//REL DETALLES

use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_carga;
use com\bydan\contabilidad\inventario\orden_compra_detalle\business\logic\orden_compra_detalle_logic;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_carga;
use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_carga;
use com\bydan\contabilidad\inventario\cotizacion_detalle\business\logic\cotizacion_detalle_logic;
use com\bydan\contabilidad\inventario\devolucion_detalle\util\devolucion_detalle_carga;
use com\bydan\contabilidad\inventario\devolucion_detalle\business\logic\devolucion_detalle_logic;



class termino_pago_proveedor_logic  extends GeneralEntityLogic implements termino_pago_proveedor_logicI {	
	/*GENERAL*/
	public termino_pago_proveedor_data $termino_pago_proveedorDataAccess;
	//public ?termino_pago_proveedor_logic_add $termino_pago_proveedorLogicAdditional=null;
	public ?termino_pago_proveedor $termino_pago_proveedor;
	public array $termino_pago_proveedors;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->termino_pago_proveedorDataAccess = new termino_pago_proveedor_data();			
			$this->termino_pago_proveedors = array();
			$this->termino_pago_proveedor = new termino_pago_proveedor();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->termino_pago_proveedorLogicAdditional = new termino_pago_proveedor_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->termino_pago_proveedorLogicAdditional==null) {
		//	$this->termino_pago_proveedorLogicAdditional=new termino_pago_proveedor_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->termino_pago_proveedorDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->termino_pago_proveedorDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->termino_pago_proveedorDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->termino_pago_proveedorDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->termino_pago_proveedors = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->termino_pago_proveedors=$this->termino_pago_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_proveedor_util::refrescarFKDescripciones($this->termino_pago_proveedors);
			}
			
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGets($this->termino_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_proveedors);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->termino_pago_proveedors = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->termino_pago_proveedors=$this->termino_pago_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_proveedor_util::refrescarFKDescripciones($this->termino_pago_proveedors);
			}
			
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGets($this->termino_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_proveedors);
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
		$this->termino_pago_proveedor = new termino_pago_proveedor();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->termino_pago_proveedor=$this->termino_pago_proveedorDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->termino_pago_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				termino_pago_proveedor_util::refrescarFKDescripcion($this->termino_pago_proveedor);
			}
						
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGet($this->termino_pago_proveedor,$this->datosCliente);
			//termino_pago_proveedor_logic_add::updatetermino_pago_proveedorToGet($this->termino_pago_proveedor);
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
		$this->termino_pago_proveedor = new  termino_pago_proveedor();
		  		  
        try {		
			$this->termino_pago_proveedor=$this->termino_pago_proveedorDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->termino_pago_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				termino_pago_proveedor_util::refrescarFKDescripcion($this->termino_pago_proveedor);
			}
			
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGet($this->termino_pago_proveedor,$this->datosCliente);
			//termino_pago_proveedor_logic_add::updatetermino_pago_proveedorToGet($this->termino_pago_proveedor);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?termino_pago_proveedor {
		$termino_pago_proveedorLogic = new  termino_pago_proveedor_logic();
		  		  
        try {		
			$termino_pago_proveedorLogic->setConnexion($connexion);			
			$termino_pago_proveedorLogic->getEntity($id);			
			return $termino_pago_proveedorLogic->gettermino_pago_proveedor();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->termino_pago_proveedor = new  termino_pago_proveedor();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->termino_pago_proveedor=$this->termino_pago_proveedorDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->termino_pago_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				termino_pago_proveedor_util::refrescarFKDescripcion($this->termino_pago_proveedor);
			}
			
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGet($this->termino_pago_proveedor,$this->datosCliente);
			//termino_pago_proveedor_logic_add::updatetermino_pago_proveedorToGet($this->termino_pago_proveedor);
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
		$this->termino_pago_proveedor = new  termino_pago_proveedor();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->termino_pago_proveedor=$this->termino_pago_proveedorDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->termino_pago_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				termino_pago_proveedor_util::refrescarFKDescripcion($this->termino_pago_proveedor);
			}
			
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGet($this->termino_pago_proveedor,$this->datosCliente);
			//termino_pago_proveedor_logic_add::updatetermino_pago_proveedorToGet($this->termino_pago_proveedor);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?termino_pago_proveedor {
		$termino_pago_proveedorLogic = new  termino_pago_proveedor_logic();
		  		  
        try {		
			$termino_pago_proveedorLogic->setConnexion($connexion);			
			$termino_pago_proveedorLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $termino_pago_proveedorLogic->gettermino_pago_proveedor();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->termino_pago_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->termino_pago_proveedors=$this->termino_pago_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_proveedor_util::refrescarFKDescripciones($this->termino_pago_proveedors);
			}
			
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGets($this->termino_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_proveedors);			
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
		$this->termino_pago_proveedors = array();
		  		  
        try {			
			$this->termino_pago_proveedors=$this->termino_pago_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_proveedor_util::refrescarFKDescripciones($this->termino_pago_proveedors);
			}
			
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGets($this->termino_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_proveedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->termino_pago_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->termino_pago_proveedors=$this->termino_pago_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_proveedor_util::refrescarFKDescripciones($this->termino_pago_proveedors);
			}
			
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGets($this->termino_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_proveedors);
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
		$this->termino_pago_proveedors = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->termino_pago_proveedors=$this->termino_pago_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_proveedor_util::refrescarFKDescripciones($this->termino_pago_proveedors);
			}
			
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGets($this->termino_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_proveedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$termino_pago_proveedorLogic = new  termino_pago_proveedor_logic();
		  		  
        try {		
			$termino_pago_proveedorLogic->setConnexion($connexion);			
			$termino_pago_proveedorLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $termino_pago_proveedorLogic->gettermino_pago_proveedors();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->termino_pago_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->termino_pago_proveedors=$this->termino_pago_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_proveedor_util::refrescarFKDescripciones($this->termino_pago_proveedors);
			}
			
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGets($this->termino_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_proveedors);
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
		$this->termino_pago_proveedors = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->termino_pago_proveedors=$this->termino_pago_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_proveedor_util::refrescarFKDescripciones($this->termino_pago_proveedors);
			}
			
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGets($this->termino_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_proveedors);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->termino_pago_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->termino_pago_proveedors=$this->termino_pago_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_proveedor_util::refrescarFKDescripciones($this->termino_pago_proveedors);
			}
			
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGets($this->termino_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_proveedors);
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
		$this->termino_pago_proveedors = array();
		  		  
        try {			
			$this->termino_pago_proveedors=$this->termino_pago_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_proveedor_util::refrescarFKDescripciones($this->termino_pago_proveedors);
			}	
			
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGets($this->termino_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_proveedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->termino_pago_proveedors = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->termino_pago_proveedors=$this->termino_pago_proveedorDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_proveedor_util::refrescarFKDescripciones($this->termino_pago_proveedors);
			}
			
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGets($this->termino_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_proveedors);
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
		$this->termino_pago_proveedors = array();
		  		  
        try {		
			$this->termino_pago_proveedors=$this->termino_pago_proveedorDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_proveedor_util::refrescarFKDescripciones($this->termino_pago_proveedors);
			}
			
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGets($this->termino_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_proveedors);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdcuentaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cuenta) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,termino_pago_proveedor_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->termino_pago_proveedors=$this->termino_pago_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				termino_pago_proveedor_util::refrescarFKDescripciones($this->termino_pago_proveedors);
			}
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGets($this->termino_pago_proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->termino_pago_proveedors);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta(string $strFinalQuery,Pagination $pagination,int $id_cuenta) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,termino_pago_proveedor_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->termino_pago_proveedors=$this->termino_pago_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				termino_pago_proveedor_util::refrescarFKDescripciones($this->termino_pago_proveedors);
			}
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGets($this->termino_pago_proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->termino_pago_proveedors);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,termino_pago_proveedor_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->termino_pago_proveedors=$this->termino_pago_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				termino_pago_proveedor_util::refrescarFKDescripciones($this->termino_pago_proveedors);
			}
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGets($this->termino_pago_proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->termino_pago_proveedors);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,termino_pago_proveedor_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->termino_pago_proveedors=$this->termino_pago_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				termino_pago_proveedor_util::refrescarFKDescripciones($this->termino_pago_proveedors);
			}
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGets($this->termino_pago_proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->termino_pago_proveedors);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtipo_termino_pagoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_tipo_termino_pago) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_termino_pago= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_termino_pago->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_termino_pago,termino_pago_proveedor_util::$ID_TIPO_TERMINO_PAGO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_termino_pago);

			$this->termino_pago_proveedors=$this->termino_pago_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				termino_pago_proveedor_util::refrescarFKDescripciones($this->termino_pago_proveedors);
			}
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGets($this->termino_pago_proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->termino_pago_proveedors);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtipo_termino_pago(string $strFinalQuery,Pagination $pagination,int $id_tipo_termino_pago) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_termino_pago= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_termino_pago->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_termino_pago,termino_pago_proveedor_util::$ID_TIPO_TERMINO_PAGO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_termino_pago);

			$this->termino_pago_proveedors=$this->termino_pago_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				termino_pago_proveedor_util::refrescarFKDescripciones($this->termino_pago_proveedors);
			}
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGets($this->termino_pago_proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->termino_pago_proveedors);
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
						
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToSave($this->termino_pago_proveedor,$this->datosCliente,$this->connexion);	       
			//termino_pago_proveedor_logic_add::updatetermino_pago_proveedorToSave($this->termino_pago_proveedor);			
			termino_pago_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->termino_pago_proveedor,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->termino_pago_proveedorLogicAdditional->checkGeneralEntityToSave($this,$this->termino_pago_proveedor,$this->datosCliente,$this->connexion);
			
			
			termino_pago_proveedor_data::save($this->termino_pago_proveedor, $this->connexion);	    	       	 				
			//termino_pago_proveedor_logic_add::checktermino_pago_proveedorToSaveAfter($this->termino_pago_proveedor,$this->datosCliente,$this->connexion);			
			//$this->termino_pago_proveedorLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->termino_pago_proveedor,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->termino_pago_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->termino_pago_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				termino_pago_proveedor_util::refrescarFKDescripcion($this->termino_pago_proveedor);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->termino_pago_proveedor->getIsDeleted()) {
				$this->termino_pago_proveedor=null;
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
						
			/*termino_pago_proveedor_logic_add::checktermino_pago_proveedorToSave($this->termino_pago_proveedor,$this->datosCliente,$this->connexion);*/	        
			//termino_pago_proveedor_logic_add::updatetermino_pago_proveedorToSave($this->termino_pago_proveedor);			
			//$this->termino_pago_proveedorLogicAdditional->checkGeneralEntityToSave($this,$this->termino_pago_proveedor,$this->datosCliente,$this->connexion);			
			termino_pago_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->termino_pago_proveedor,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			termino_pago_proveedor_data::save($this->termino_pago_proveedor, $this->connexion);	    	       	 						
			/*termino_pago_proveedor_logic_add::checktermino_pago_proveedorToSaveAfter($this->termino_pago_proveedor,$this->datosCliente,$this->connexion);*/			
			//$this->termino_pago_proveedorLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->termino_pago_proveedor,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->termino_pago_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->termino_pago_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				termino_pago_proveedor_util::refrescarFKDescripcion($this->termino_pago_proveedor);				
			}
			
			if($this->termino_pago_proveedor->getIsDeleted()) {
				$this->termino_pago_proveedor=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(termino_pago_proveedor $termino_pago_proveedor,Connexion $connexion)  {
		$termino_pago_proveedorLogic = new  termino_pago_proveedor_logic();		  		  
        try {		
			$termino_pago_proveedorLogic->setConnexion($connexion);			
			$termino_pago_proveedorLogic->settermino_pago_proveedor($termino_pago_proveedor);			
			$termino_pago_proveedorLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*termino_pago_proveedor_logic_add::checktermino_pago_proveedorToSaves($this->termino_pago_proveedors,$this->datosCliente,$this->connexion);*/	        	
			//$this->termino_pago_proveedorLogicAdditional->checkGeneralEntitiesToSaves($this,$this->termino_pago_proveedors,$this->datosCliente,$this->connexion);
			
	   		foreach($this->termino_pago_proveedors as $termino_pago_proveedorLocal) {				
								
				//termino_pago_proveedor_logic_add::updatetermino_pago_proveedorToSave($termino_pago_proveedorLocal);	        	
				termino_pago_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$termino_pago_proveedorLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				termino_pago_proveedor_data::save($termino_pago_proveedorLocal, $this->connexion);				
			}
			
			/*termino_pago_proveedor_logic_add::checktermino_pago_proveedorToSavesAfter($this->termino_pago_proveedors,$this->datosCliente,$this->connexion);*/			
			//$this->termino_pago_proveedorLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->termino_pago_proveedors,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_proveedor_util::refrescarFKDescripciones($this->termino_pago_proveedors);
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
			/*termino_pago_proveedor_logic_add::checktermino_pago_proveedorToSaves($this->termino_pago_proveedors,$this->datosCliente,$this->connexion);*/			
			//$this->termino_pago_proveedorLogicAdditional->checkGeneralEntitiesToSaves($this,$this->termino_pago_proveedors,$this->datosCliente,$this->connexion);
			
	   		foreach($this->termino_pago_proveedors as $termino_pago_proveedorLocal) {				
								
				//termino_pago_proveedor_logic_add::updatetermino_pago_proveedorToSave($termino_pago_proveedorLocal);	        	
				termino_pago_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$termino_pago_proveedorLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				termino_pago_proveedor_data::save($termino_pago_proveedorLocal, $this->connexion);				
			}			
			
			/*termino_pago_proveedor_logic_add::checktermino_pago_proveedorToSavesAfter($this->termino_pago_proveedors,$this->datosCliente,$this->connexion);*/			
			//$this->termino_pago_proveedorLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->termino_pago_proveedors,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_proveedor_util::refrescarFKDescripciones($this->termino_pago_proveedors);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $termino_pago_proveedors,Connexion $connexion)  {
		$termino_pago_proveedorLogic = new  termino_pago_proveedor_logic();
		  		  
        try {		
			$termino_pago_proveedorLogic->setConnexion($connexion);			
			$termino_pago_proveedorLogic->settermino_pago_proveedors($termino_pago_proveedors);			
			$termino_pago_proveedorLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$termino_pago_proveedorsAux=array();
		
		foreach($this->termino_pago_proveedors as $termino_pago_proveedor) {
			if($termino_pago_proveedor->getIsDeleted()==false) {
				$termino_pago_proveedorsAux[]=$termino_pago_proveedor;
			}
		}
		
		$this->termino_pago_proveedors=$termino_pago_proveedorsAux;
	}
	
	public function updateToGetsAuxiliar(array &$termino_pago_proveedors) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->termino_pago_proveedors as $termino_pago_proveedor) {
				
				$termino_pago_proveedor->setid_empresa_Descripcion(termino_pago_proveedor_util::getempresaDescripcion($termino_pago_proveedor->getempresa()));
				$termino_pago_proveedor->setid_tipo_termino_pago_Descripcion(termino_pago_proveedor_util::gettipo_termino_pagoDescripcion($termino_pago_proveedor->gettipo_termino_pago()));
				$termino_pago_proveedor->setid_cuenta_Descripcion(termino_pago_proveedor_util::getcuentaDescripcion($termino_pago_proveedor->getcuenta()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$termino_pago_proveedor_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$termino_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$termino_pago_proveedor_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$termino_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$termino_pago_proveedor_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$termino_pago_proveedorForeignKey=new termino_pago_proveedor_param_return();//termino_pago_proveedorForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$termino_pago_proveedorForeignKey,$termino_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_termino_pago',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_termino_pagosFK($this->connexion,$strRecargarFkQuery,$termino_pago_proveedorForeignKey,$termino_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTipos,',')) {
				$this->cargarComboscuentasFK($this->connexion,$strRecargarFkQuery,$termino_pago_proveedorForeignKey,$termino_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$termino_pago_proveedorForeignKey,$termino_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_termino_pago',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_termino_pagosFK($this->connexion,' where id=-1 ',$termino_pago_proveedorForeignKey,$termino_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuentasFK($this->connexion,' where id=-1 ',$termino_pago_proveedorForeignKey,$termino_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $termino_pago_proveedorForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$termino_pago_proveedorForeignKey,$termino_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$termino_pago_proveedorForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($termino_pago_proveedor_session==null) {
			$termino_pago_proveedor_session=new termino_pago_proveedor_session();
		}
		
		if($termino_pago_proveedor_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($termino_pago_proveedorForeignKey->idempresaDefaultFK==0) {
					$termino_pago_proveedorForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$termino_pago_proveedorForeignKey->empresasFK[$empresaLocal->getId()]=termino_pago_proveedor_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($termino_pago_proveedor_session->bigidempresaActual!=null && $termino_pago_proveedor_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($termino_pago_proveedor_session->bigidempresaActual);//WithConnection

				$termino_pago_proveedorForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=termino_pago_proveedor_util::getempresaDescripcion($empresaLogic->getempresa());
				$termino_pago_proveedorForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombostipo_termino_pagosFK($connexion=null,$strRecargarFkQuery='',$termino_pago_proveedorForeignKey,$termino_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_termino_pagoLogic= new tipo_termino_pago_logic();
		$pagination= new Pagination();
		$termino_pago_proveedorForeignKey->tipo_termino_pagosFK=array();

		$tipo_termino_pagoLogic->setConnexion($connexion);
		$tipo_termino_pagoLogic->gettipo_termino_pagoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($termino_pago_proveedor_session==null) {
			$termino_pago_proveedor_session=new termino_pago_proveedor_session();
		}
		
		if($termino_pago_proveedor_session->bitBusquedaDesdeFKSesiontipo_termino_pago!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_termino_pago_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltipo_termino_pago=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_termino_pago=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_termino_pago, '');
				$finalQueryGlobaltipo_termino_pago.=tipo_termino_pago_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_termino_pago.$strRecargarFkQuery;		

				$tipo_termino_pagoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($tipo_termino_pagoLogic->gettipo_termino_pagos() as $tipo_termino_pagoLocal ) {
				if($termino_pago_proveedorForeignKey->idtipo_termino_pagoDefaultFK==0) {
					$termino_pago_proveedorForeignKey->idtipo_termino_pagoDefaultFK=$tipo_termino_pagoLocal->getId();
				}

				$termino_pago_proveedorForeignKey->tipo_termino_pagosFK[$tipo_termino_pagoLocal->getId()]=termino_pago_proveedor_util::gettipo_termino_pagoDescripcion($tipo_termino_pagoLocal);
			}

		} else {

			if($termino_pago_proveedor_session->bigidtipo_termino_pagoActual!=null && $termino_pago_proveedor_session->bigidtipo_termino_pagoActual > 0) {
				$tipo_termino_pagoLogic->getEntity($termino_pago_proveedor_session->bigidtipo_termino_pagoActual);//WithConnection

				$termino_pago_proveedorForeignKey->tipo_termino_pagosFK[$tipo_termino_pagoLogic->gettipo_termino_pago()->getId()]=termino_pago_proveedor_util::gettipo_termino_pagoDescripcion($tipo_termino_pagoLogic->gettipo_termino_pago());
				$termino_pago_proveedorForeignKey->idtipo_termino_pagoDefaultFK=$tipo_termino_pagoLogic->gettipo_termino_pago()->getId();
			}
		}
	}

	public function cargarComboscuentasFK($connexion=null,$strRecargarFkQuery='',$termino_pago_proveedorForeignKey,$termino_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$termino_pago_proveedorForeignKey->cuentasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($termino_pago_proveedor_session==null) {
			$termino_pago_proveedor_session=new termino_pago_proveedor_session();
		}
		
		if($termino_pago_proveedor_session->bitBusquedaDesdeFKSesioncuenta!=true) {
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
				if($termino_pago_proveedorForeignKey->idcuentaDefaultFK==0) {
					$termino_pago_proveedorForeignKey->idcuentaDefaultFK=$cuentaLocal->getId();
				}

				$termino_pago_proveedorForeignKey->cuentasFK[$cuentaLocal->getId()]=termino_pago_proveedor_util::getcuentaDescripcion($cuentaLocal);
			}

		} else {

			if($termino_pago_proveedor_session->bigidcuentaActual!=null && $termino_pago_proveedor_session->bigidcuentaActual > 0) {
				$cuentaLogic->getEntity($termino_pago_proveedor_session->bigidcuentaActual);//WithConnection

				$termino_pago_proveedorForeignKey->cuentasFK[$cuentaLogic->getcuenta()->getId()]=termino_pago_proveedor_util::getcuentaDescripcion($cuentaLogic->getcuenta());
				$termino_pago_proveedorForeignKey->idcuentaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($termino_pago_proveedor,$ordencompras,$proveedors,$creditocuentapagars,$cuentapagars,$cotizacions,$parametroinventarios,$devolucions) {
		$this->saveRelacionesBase($termino_pago_proveedor,$ordencompras,$proveedors,$creditocuentapagars,$cuentapagars,$cotizacions,$parametroinventarios,$devolucions,true);
	}

	public function saveRelaciones($termino_pago_proveedor,$ordencompras,$proveedors,$creditocuentapagars,$cuentapagars,$cotizacions,$parametroinventarios,$devolucions) {
		$this->saveRelacionesBase($termino_pago_proveedor,$ordencompras,$proveedors,$creditocuentapagars,$cuentapagars,$cotizacions,$parametroinventarios,$devolucions,false);
	}

	public function saveRelacionesBase($termino_pago_proveedor,$ordencompras=array(),$proveedors=array(),$creditocuentapagars=array(),$cuentapagars=array(),$cotizacions=array(),$parametroinventarios=array(),$devolucions=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$termino_pago_proveedor->setorden_compras($ordencompras);
			$termino_pago_proveedor->setproveedors($proveedors);
			$termino_pago_proveedor->setcredito_cuenta_pagars($creditocuentapagars);
			$termino_pago_proveedor->setcuenta_pagars($cuentapagars);
			$termino_pago_proveedor->setcotizacions($cotizacions);
			$termino_pago_proveedor->setparametro_inventarios($parametroinventarios);
			$termino_pago_proveedor->setdevolucions($devolucions);
			$this->settermino_pago_proveedor($termino_pago_proveedor);

			if(true) {

				//termino_pago_proveedor_logic_add::updateRelacionesToSave($termino_pago_proveedor,$this);

				if(($this->termino_pago_proveedor->getIsNew() || $this->termino_pago_proveedor->getIsChanged()) && !$this->termino_pago_proveedor->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($ordencompras,$proveedors,$creditocuentapagars,$cuentapagars,$cotizacions,$parametroinventarios,$devolucions);

				} else if($this->termino_pago_proveedor->getIsDeleted()) {
					$this->saveRelacionesDetalles($ordencompras,$proveedors,$creditocuentapagars,$cuentapagars,$cotizacions,$parametroinventarios,$devolucions);
					$this->save();
				}

				//termino_pago_proveedor_logic_add::updateRelacionesToSaveAfter($termino_pago_proveedor,$this);

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
	
	
	public function saveRelacionesDetalles($ordencompras=array(),$proveedors=array(),$creditocuentapagars=array(),$cuentapagars=array(),$cotizacions=array(),$parametroinventarios=array(),$devolucions=array()) {
		try {
	

			$idtermino_pago_proveedorActual=$this->gettermino_pago_proveedor()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/orden_compra_carga.php');
			orden_compra_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$ordencompraLogic_Desde_termino_pago_proveedor=new orden_compra_logic();
			$ordencompraLogic_Desde_termino_pago_proveedor->setorden_compras($ordencompras);

			$ordencompraLogic_Desde_termino_pago_proveedor->setConnexion($this->getConnexion());
			$ordencompraLogic_Desde_termino_pago_proveedor->setDatosCliente($this->datosCliente);

			foreach($ordencompraLogic_Desde_termino_pago_proveedor->getorden_compras() as $ordencompra_Desde_termino_pago_proveedor) {
				$ordencompra_Desde_termino_pago_proveedor->setid_termino_pago_proveedor($idtermino_pago_proveedorActual);

				$ordencompraLogic_Desde_termino_pago_proveedor->setorden_compra($ordencompra_Desde_termino_pago_proveedor);
				$ordencompraLogic_Desde_termino_pago_proveedor->save();

				$idorden_compraActual=$orden_compra_Desde_termino_pago_proveedor->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/orden_compra_detalle_carga.php');
				orden_compra_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$ordencompradetalleLogic_Desde_orden_compra=new orden_compra_detalle_logic();

				if($orden_compra_Desde_termino_pago_proveedor->getorden_compra_detalles()==null){
					$orden_compra_Desde_termino_pago_proveedor->setorden_compra_detalles(array());
				}

				$ordencompradetalleLogic_Desde_orden_compra->setorden_compra_detalles($orden_compra_Desde_termino_pago_proveedor->getorden_compra_detalles());

				$ordencompradetalleLogic_Desde_orden_compra->setConnexion($this->getConnexion());
				$ordencompradetalleLogic_Desde_orden_compra->setDatosCliente($this->datosCliente);

				foreach($ordencompradetalleLogic_Desde_orden_compra->getorden_compra_detalles() as $ordencompradetalle_Desde_orden_compra) {
					$ordencompradetalle_Desde_orden_compra->setid_orden_compra($idorden_compraActual);
				}

				$ordencompradetalleLogic_Desde_orden_compra->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/proveedor_carga.php');
			proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$proveedorLogic_Desde_termino_pago_proveedor=new proveedor_logic();
			$proveedorLogic_Desde_termino_pago_proveedor->setproveedors($proveedors);

			$proveedorLogic_Desde_termino_pago_proveedor->setConnexion($this->getConnexion());
			$proveedorLogic_Desde_termino_pago_proveedor->setDatosCliente($this->datosCliente);

			foreach($proveedorLogic_Desde_termino_pago_proveedor->getproveedors() as $proveedor_Desde_termino_pago_proveedor) {
				$proveedor_Desde_termino_pago_proveedor->setid_termino_pago_proveedor($idtermino_pago_proveedorActual);

				$proveedorLogic_Desde_termino_pago_proveedor->setproveedor($proveedor_Desde_termino_pago_proveedor);
				$proveedorLogic_Desde_termino_pago_proveedor->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/credito_cuenta_pagar_carga.php');
			credito_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$creditocuentapagarLogic_Desde_termino_pago_proveedor=new credito_cuenta_pagar_logic();
			$creditocuentapagarLogic_Desde_termino_pago_proveedor->setcredito_cuenta_pagars($creditocuentapagars);

			$creditocuentapagarLogic_Desde_termino_pago_proveedor->setConnexion($this->getConnexion());
			$creditocuentapagarLogic_Desde_termino_pago_proveedor->setDatosCliente($this->datosCliente);

			foreach($creditocuentapagarLogic_Desde_termino_pago_proveedor->getcredito_cuenta_pagars() as $creditocuentapagar_Desde_termino_pago_proveedor) {
				$creditocuentapagar_Desde_termino_pago_proveedor->setid_termino_pago_proveedor($idtermino_pago_proveedorActual);
			}

			$creditocuentapagarLogic_Desde_termino_pago_proveedor->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/cuenta_pagar_carga.php');
			cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cuentapagarLogic_Desde_termino_pago_proveedor=new cuenta_pagar_logic();
			$cuentapagarLogic_Desde_termino_pago_proveedor->setcuenta_pagars($cuentapagars);

			$cuentapagarLogic_Desde_termino_pago_proveedor->setConnexion($this->getConnexion());
			$cuentapagarLogic_Desde_termino_pago_proveedor->setDatosCliente($this->datosCliente);

			foreach($cuentapagarLogic_Desde_termino_pago_proveedor->getcuenta_pagars() as $cuentapagar_Desde_termino_pago_proveedor) {
				$cuentapagar_Desde_termino_pago_proveedor->setid_termino_pago_proveedor($idtermino_pago_proveedorActual);

				$cuentapagarLogic_Desde_termino_pago_proveedor->setcuenta_pagar($cuentapagar_Desde_termino_pago_proveedor);
				$cuentapagarLogic_Desde_termino_pago_proveedor->save();

				$idcuenta_pagarActual=$cuenta_pagar_Desde_termino_pago_proveedor->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/debito_cuenta_pagar_carga.php');
				debito_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$debitocuentapagarLogic_Desde_cuenta_pagar=new debito_cuenta_pagar_logic();

				if($cuenta_pagar_Desde_termino_pago_proveedor->getdebito_cuenta_pagars()==null){
					$cuenta_pagar_Desde_termino_pago_proveedor->setdebito_cuenta_pagars(array());
				}

				$debitocuentapagarLogic_Desde_cuenta_pagar->setdebito_cuenta_pagars($cuenta_pagar_Desde_termino_pago_proveedor->getdebito_cuenta_pagars());

				$debitocuentapagarLogic_Desde_cuenta_pagar->setConnexion($this->getConnexion());
				$debitocuentapagarLogic_Desde_cuenta_pagar->setDatosCliente($this->datosCliente);

				foreach($debitocuentapagarLogic_Desde_cuenta_pagar->getdebito_cuenta_pagars() as $debitocuentapagar_Desde_cuenta_pagar) {
					$debitocuentapagar_Desde_cuenta_pagar->setid_cuenta_pagar($idcuenta_pagarActual);
				}

				$debitocuentapagarLogic_Desde_cuenta_pagar->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/credito_cuenta_pagar_carga.php');
				credito_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$creditocuentapagarLogic_Desde_cuenta_pagar=new credito_cuenta_pagar_logic();

				if($cuenta_pagar_Desde_termino_pago_proveedor->getcredito_cuenta_pagars()==null){
					$cuenta_pagar_Desde_termino_pago_proveedor->setcredito_cuenta_pagars(array());
				}

				$creditocuentapagarLogic_Desde_cuenta_pagar->setcredito_cuenta_pagars($cuenta_pagar_Desde_termino_pago_proveedor->getcredito_cuenta_pagars());

				$creditocuentapagarLogic_Desde_cuenta_pagar->setConnexion($this->getConnexion());
				$creditocuentapagarLogic_Desde_cuenta_pagar->setDatosCliente($this->datosCliente);

				foreach($creditocuentapagarLogic_Desde_cuenta_pagar->getcredito_cuenta_pagars() as $creditocuentapagar_Desde_cuenta_pagar) {
					$creditocuentapagar_Desde_cuenta_pagar->setid_cuenta_pagar($idcuenta_pagarActual);
				}

				$creditocuentapagarLogic_Desde_cuenta_pagar->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/pago_cuenta_pagar_carga.php');
				pago_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$pagocuentapagarLogic_Desde_cuenta_pagar=new pago_cuenta_pagar_logic();

				if($cuenta_pagar_Desde_termino_pago_proveedor->getpago_cuenta_pagars()==null){
					$cuenta_pagar_Desde_termino_pago_proveedor->setpago_cuenta_pagars(array());
				}

				$pagocuentapagarLogic_Desde_cuenta_pagar->setpago_cuenta_pagars($cuenta_pagar_Desde_termino_pago_proveedor->getpago_cuenta_pagars());

				$pagocuentapagarLogic_Desde_cuenta_pagar->setConnexion($this->getConnexion());
				$pagocuentapagarLogic_Desde_cuenta_pagar->setDatosCliente($this->datosCliente);

				foreach($pagocuentapagarLogic_Desde_cuenta_pagar->getpago_cuenta_pagars() as $pagocuentapagar_Desde_cuenta_pagar) {
					$pagocuentapagar_Desde_cuenta_pagar->setid_cuenta_pagar($idcuenta_pagarActual);
				}

				$pagocuentapagarLogic_Desde_cuenta_pagar->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/cotizacion_carga.php');
			cotizacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cotizacionLogic_Desde_termino_pago_proveedor=new cotizacion_logic();
			$cotizacionLogic_Desde_termino_pago_proveedor->setcotizacions($cotizacions);

			$cotizacionLogic_Desde_termino_pago_proveedor->setConnexion($this->getConnexion());
			$cotizacionLogic_Desde_termino_pago_proveedor->setDatosCliente($this->datosCliente);

			foreach($cotizacionLogic_Desde_termino_pago_proveedor->getcotizacions() as $cotizacion_Desde_termino_pago_proveedor) {
				$cotizacion_Desde_termino_pago_proveedor->setid_termino_pago_proveedor($idtermino_pago_proveedorActual);

				$cotizacionLogic_Desde_termino_pago_proveedor->setcotizacion($cotizacion_Desde_termino_pago_proveedor);
				$cotizacionLogic_Desde_termino_pago_proveedor->save();

				$idcotizacionActual=$cotizacion_Desde_termino_pago_proveedor->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/cotizacion_detalle_carga.php');
				cotizacion_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$cotizaciondetalleLogic_Desde_cotizacion=new cotizacion_detalle_logic();

				if($cotizacion_Desde_termino_pago_proveedor->getcotizacion_detalles()==null){
					$cotizacion_Desde_termino_pago_proveedor->setcotizacion_detalles(array());
				}

				$cotizaciondetalleLogic_Desde_cotizacion->setcotizacion_detalles($cotizacion_Desde_termino_pago_proveedor->getcotizacion_detalles());

				$cotizaciondetalleLogic_Desde_cotizacion->setConnexion($this->getConnexion());
				$cotizaciondetalleLogic_Desde_cotizacion->setDatosCliente($this->datosCliente);

				foreach($cotizaciondetalleLogic_Desde_cotizacion->getcotizacion_detalles() as $cotizaciondetalle_Desde_cotizacion) {
					$cotizaciondetalle_Desde_cotizacion->setid_cotizacion($idcotizacionActual);
				}

				$cotizaciondetalleLogic_Desde_cotizacion->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/parametro_inventario_carga.php');
			parametro_inventario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$parametroinventarioLogic_Desde_termino_pago_proveedor=new parametro_inventario_logic();
			$parametroinventarioLogic_Desde_termino_pago_proveedor->setparametro_inventarios($parametroinventarios);

			$parametroinventarioLogic_Desde_termino_pago_proveedor->setConnexion($this->getConnexion());
			$parametroinventarioLogic_Desde_termino_pago_proveedor->setDatosCliente($this->datosCliente);

			foreach($parametroinventarioLogic_Desde_termino_pago_proveedor->getparametro_inventarios() as $parametroinventario_Desde_termino_pago_proveedor) {
				$parametroinventario_Desde_termino_pago_proveedor->setid_termino_pago_proveedor($idtermino_pago_proveedorActual);
			}

			$parametroinventarioLogic_Desde_termino_pago_proveedor->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/devolucion_carga.php');
			devolucion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$devolucionLogic_Desde_termino_pago_proveedor=new devolucion_logic();
			$devolucionLogic_Desde_termino_pago_proveedor->setdevolucions($devolucions);

			$devolucionLogic_Desde_termino_pago_proveedor->setConnexion($this->getConnexion());
			$devolucionLogic_Desde_termino_pago_proveedor->setDatosCliente($this->datosCliente);

			foreach($devolucionLogic_Desde_termino_pago_proveedor->getdevolucions() as $devolucion_Desde_termino_pago_proveedor) {
				$devolucion_Desde_termino_pago_proveedor->setid_termino_pago_proveedor($idtermino_pago_proveedorActual);

				$devolucionLogic_Desde_termino_pago_proveedor->setdevolucion($devolucion_Desde_termino_pago_proveedor);
				$devolucionLogic_Desde_termino_pago_proveedor->save();

				$iddevolucionActual=$devolucion_Desde_termino_pago_proveedor->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/devolucion_detalle_carga.php');
				devolucion_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$devoluciondetalleLogic_Desde_devolucion=new devolucion_detalle_logic();

				if($devolucion_Desde_termino_pago_proveedor->getdevolucion_detalles()==null){
					$devolucion_Desde_termino_pago_proveedor->setdevolucion_detalles(array());
				}

				$devoluciondetalleLogic_Desde_devolucion->setdevolucion_detalles($devolucion_Desde_termino_pago_proveedor->getdevolucion_detalles());

				$devoluciondetalleLogic_Desde_devolucion->setConnexion($this->getConnexion());
				$devoluciondetalleLogic_Desde_devolucion->setDatosCliente($this->datosCliente);

				foreach($devoluciondetalleLogic_Desde_devolucion->getdevolucion_detalles() as $devoluciondetalle_Desde_devolucion) {
					$devoluciondetalle_Desde_devolucion->setid_devolucion($iddevolucionActual);
				}

				$devoluciondetalleLogic_Desde_devolucion->saves();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $termino_pago_proveedors,termino_pago_proveedor_param_return $termino_pago_proveedorParameterGeneral) : termino_pago_proveedor_param_return {
		$termino_pago_proveedorReturnGeneral=new termino_pago_proveedor_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $termino_pago_proveedorReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $termino_pago_proveedors,termino_pago_proveedor_param_return $termino_pago_proveedorParameterGeneral) : termino_pago_proveedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$termino_pago_proveedorReturnGeneral=new termino_pago_proveedor_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $termino_pago_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $termino_pago_proveedors,termino_pago_proveedor $termino_pago_proveedor,termino_pago_proveedor_param_return $termino_pago_proveedorParameterGeneral,bool $isEsNuevotermino_pago_proveedor,array $clases) : termino_pago_proveedor_param_return {
		 try {	
			$termino_pago_proveedorReturnGeneral=new termino_pago_proveedor_param_return();
	
			$termino_pago_proveedorReturnGeneral->settermino_pago_proveedor($termino_pago_proveedor);
			$termino_pago_proveedorReturnGeneral->settermino_pago_proveedors($termino_pago_proveedors);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$termino_pago_proveedorReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $termino_pago_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $termino_pago_proveedors,termino_pago_proveedor $termino_pago_proveedor,termino_pago_proveedor_param_return $termino_pago_proveedorParameterGeneral,bool $isEsNuevotermino_pago_proveedor,array $clases) : termino_pago_proveedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$termino_pago_proveedorReturnGeneral=new termino_pago_proveedor_param_return();
	
			$termino_pago_proveedorReturnGeneral->settermino_pago_proveedor($termino_pago_proveedor);
			$termino_pago_proveedorReturnGeneral->settermino_pago_proveedors($termino_pago_proveedors);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$termino_pago_proveedorReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $termino_pago_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $termino_pago_proveedors,termino_pago_proveedor $termino_pago_proveedor,termino_pago_proveedor_param_return $termino_pago_proveedorParameterGeneral,bool $isEsNuevotermino_pago_proveedor,array $clases) : termino_pago_proveedor_param_return {
		 try {	
			$termino_pago_proveedorReturnGeneral=new termino_pago_proveedor_param_return();
	
			$termino_pago_proveedorReturnGeneral->settermino_pago_proveedor($termino_pago_proveedor);
			$termino_pago_proveedorReturnGeneral->settermino_pago_proveedors($termino_pago_proveedors);
			
			
			
			return $termino_pago_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $termino_pago_proveedors,termino_pago_proveedor $termino_pago_proveedor,termino_pago_proveedor_param_return $termino_pago_proveedorParameterGeneral,bool $isEsNuevotermino_pago_proveedor,array $clases) : termino_pago_proveedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$termino_pago_proveedorReturnGeneral=new termino_pago_proveedor_param_return();
	
			$termino_pago_proveedorReturnGeneral->settermino_pago_proveedor($termino_pago_proveedor);
			$termino_pago_proveedorReturnGeneral->settermino_pago_proveedors($termino_pago_proveedors);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $termino_pago_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,termino_pago_proveedor $termino_pago_proveedor,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,termino_pago_proveedor $termino_pago_proveedor,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		termino_pago_proveedor_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(termino_pago_proveedor $termino_pago_proveedor,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//termino_pago_proveedor_logic_add::updatetermino_pago_proveedorToGet($this->termino_pago_proveedor);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$termino_pago_proveedor->setempresa($this->termino_pago_proveedorDataAccess->getempresa($this->connexion,$termino_pago_proveedor));
		$termino_pago_proveedor->settipo_termino_pago($this->termino_pago_proveedorDataAccess->gettipo_termino_pago($this->connexion,$termino_pago_proveedor));
		$termino_pago_proveedor->setcuenta($this->termino_pago_proveedorDataAccess->getcuenta($this->connexion,$termino_pago_proveedor));
		$termino_pago_proveedor->setorden_compras($this->termino_pago_proveedorDataAccess->getorden_compras($this->connexion,$termino_pago_proveedor));
		$termino_pago_proveedor->setproveedors($this->termino_pago_proveedorDataAccess->getproveedors($this->connexion,$termino_pago_proveedor));
		$termino_pago_proveedor->setcredito_cuenta_pagars($this->termino_pago_proveedorDataAccess->getcredito_cuenta_pagars($this->connexion,$termino_pago_proveedor));
		$termino_pago_proveedor->setcuenta_pagars($this->termino_pago_proveedorDataAccess->getcuenta_pagars($this->connexion,$termino_pago_proveedor));
		$termino_pago_proveedor->setcotizacions($this->termino_pago_proveedorDataAccess->getcotizacions($this->connexion,$termino_pago_proveedor));
		$termino_pago_proveedor->setparametro_inventarios($this->termino_pago_proveedorDataAccess->getparametro_inventarios($this->connexion,$termino_pago_proveedor));
		$termino_pago_proveedor->setdevolucions($this->termino_pago_proveedorDataAccess->getdevolucions($this->connexion,$termino_pago_proveedor));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$termino_pago_proveedor->setempresa($this->termino_pago_proveedorDataAccess->getempresa($this->connexion,$termino_pago_proveedor));
				continue;
			}

			if($clas->clas==tipo_termino_pago::$class.'') {
				$termino_pago_proveedor->settipo_termino_pago($this->termino_pago_proveedorDataAccess->gettipo_termino_pago($this->connexion,$termino_pago_proveedor));
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$termino_pago_proveedor->setcuenta($this->termino_pago_proveedorDataAccess->getcuenta($this->connexion,$termino_pago_proveedor));
				continue;
			}

			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_proveedor->setorden_compras($this->termino_pago_proveedorDataAccess->getorden_compras($this->connexion,$termino_pago_proveedor));

				if($this->isConDeep) {
					$ordencompraLogic= new orden_compra_logic($this->connexion);
					$ordencompraLogic->setorden_compras($termino_pago_proveedor->getorden_compras());
					$classesLocal=orden_compra_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$ordencompraLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					orden_compra_util::refrescarFKDescripciones($ordencompraLogic->getorden_compras());
					$termino_pago_proveedor->setorden_compras($ordencompraLogic->getorden_compras());
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_proveedor->setproveedors($this->termino_pago_proveedorDataAccess->getproveedors($this->connexion,$termino_pago_proveedor));

				if($this->isConDeep) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->setproveedors($termino_pago_proveedor->getproveedors());
					$classesLocal=proveedor_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					proveedor_util::refrescarFKDescripciones($proveedorLogic->getproveedors());
					$termino_pago_proveedor->setproveedors($proveedorLogic->getproveedors());
				}

				continue;
			}

			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_proveedor->setcredito_cuenta_pagars($this->termino_pago_proveedorDataAccess->getcredito_cuenta_pagars($this->connexion,$termino_pago_proveedor));

				if($this->isConDeep) {
					$creditocuentapagarLogic= new credito_cuenta_pagar_logic($this->connexion);
					$creditocuentapagarLogic->setcredito_cuenta_pagars($termino_pago_proveedor->getcredito_cuenta_pagars());
					$classesLocal=credito_cuenta_pagar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$creditocuentapagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					credito_cuenta_pagar_util::refrescarFKDescripciones($creditocuentapagarLogic->getcredito_cuenta_pagars());
					$termino_pago_proveedor->setcredito_cuenta_pagars($creditocuentapagarLogic->getcredito_cuenta_pagars());
				}

				continue;
			}

			if($clas->clas==cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_proveedor->setcuenta_pagars($this->termino_pago_proveedorDataAccess->getcuenta_pagars($this->connexion,$termino_pago_proveedor));

				if($this->isConDeep) {
					$cuentapagarLogic= new cuenta_pagar_logic($this->connexion);
					$cuentapagarLogic->setcuenta_pagars($termino_pago_proveedor->getcuenta_pagars());
					$classesLocal=cuenta_pagar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cuentapagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cuenta_pagar_util::refrescarFKDescripciones($cuentapagarLogic->getcuenta_pagars());
					$termino_pago_proveedor->setcuenta_pagars($cuentapagarLogic->getcuenta_pagars());
				}

				continue;
			}

			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_proveedor->setcotizacions($this->termino_pago_proveedorDataAccess->getcotizacions($this->connexion,$termino_pago_proveedor));

				if($this->isConDeep) {
					$cotizacionLogic= new cotizacion_logic($this->connexion);
					$cotizacionLogic->setcotizacions($termino_pago_proveedor->getcotizacions());
					$classesLocal=cotizacion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cotizacionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cotizacion_util::refrescarFKDescripciones($cotizacionLogic->getcotizacions());
					$termino_pago_proveedor->setcotizacions($cotizacionLogic->getcotizacions());
				}

				continue;
			}

			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_proveedor->setparametro_inventarios($this->termino_pago_proveedorDataAccess->getparametro_inventarios($this->connexion,$termino_pago_proveedor));

				if($this->isConDeep) {
					$parametroinventarioLogic= new parametro_inventario_logic($this->connexion);
					$parametroinventarioLogic->setparametro_inventarios($termino_pago_proveedor->getparametro_inventarios());
					$classesLocal=parametro_inventario_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$parametroinventarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					parametro_inventario_util::refrescarFKDescripciones($parametroinventarioLogic->getparametro_inventarios());
					$termino_pago_proveedor->setparametro_inventarios($parametroinventarioLogic->getparametro_inventarios());
				}

				continue;
			}

			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_proveedor->setdevolucions($this->termino_pago_proveedorDataAccess->getdevolucions($this->connexion,$termino_pago_proveedor));

				if($this->isConDeep) {
					$devolucionLogic= new devolucion_logic($this->connexion);
					$devolucionLogic->setdevolucions($termino_pago_proveedor->getdevolucions());
					$classesLocal=devolucion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$devolucionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					devolucion_util::refrescarFKDescripciones($devolucionLogic->getdevolucions());
					$termino_pago_proveedor->setdevolucions($devolucionLogic->getdevolucions());
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
			$termino_pago_proveedor->setempresa($this->termino_pago_proveedorDataAccess->getempresa($this->connexion,$termino_pago_proveedor));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_termino_pago::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$termino_pago_proveedor->settipo_termino_pago($this->termino_pago_proveedorDataAccess->gettipo_termino_pago($this->connexion,$termino_pago_proveedor));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$termino_pago_proveedor->setcuenta($this->termino_pago_proveedorDataAccess->getcuenta($this->connexion,$termino_pago_proveedor));
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
			$termino_pago_proveedor->setorden_compras($this->termino_pago_proveedorDataAccess->getorden_compras($this->connexion,$termino_pago_proveedor));
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
			$termino_pago_proveedor->setproveedors($this->termino_pago_proveedorDataAccess->getproveedors($this->connexion,$termino_pago_proveedor));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_pagar::$class);
			$termino_pago_proveedor->setcredito_cuenta_pagars($this->termino_pago_proveedorDataAccess->getcredito_cuenta_pagars($this->connexion,$termino_pago_proveedor));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_pagar::$class);
			$termino_pago_proveedor->setcuenta_pagars($this->termino_pago_proveedorDataAccess->getcuenta_pagars($this->connexion,$termino_pago_proveedor));
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
			$termino_pago_proveedor->setcotizacions($this->termino_pago_proveedorDataAccess->getcotizacions($this->connexion,$termino_pago_proveedor));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_inventario::$class);
			$termino_pago_proveedor->setparametro_inventarios($this->termino_pago_proveedorDataAccess->getparametro_inventarios($this->connexion,$termino_pago_proveedor));
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
			$termino_pago_proveedor->setdevolucions($this->termino_pago_proveedorDataAccess->getdevolucions($this->connexion,$termino_pago_proveedor));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$termino_pago_proveedor->setempresa($this->termino_pago_proveedorDataAccess->getempresa($this->connexion,$termino_pago_proveedor));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($termino_pago_proveedor->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$termino_pago_proveedor->settipo_termino_pago($this->termino_pago_proveedorDataAccess->gettipo_termino_pago($this->connexion,$termino_pago_proveedor));
		$tipo_termino_pagoLogic= new tipo_termino_pago_logic($this->connexion);
		$tipo_termino_pagoLogic->deepLoad($termino_pago_proveedor->gettipo_termino_pago(),$isDeep,$deepLoadType,$clases);
				
		$termino_pago_proveedor->setcuenta($this->termino_pago_proveedorDataAccess->getcuenta($this->connexion,$termino_pago_proveedor));
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepLoad($termino_pago_proveedor->getcuenta(),$isDeep,$deepLoadType,$clases);
				

		$termino_pago_proveedor->setorden_compras($this->termino_pago_proveedorDataAccess->getorden_compras($this->connexion,$termino_pago_proveedor));

		foreach($termino_pago_proveedor->getorden_compras() as $ordencompra) {
			$ordencompraLogic= new orden_compra_logic($this->connexion);
			$ordencompraLogic->deepLoad($ordencompra,$isDeep,$deepLoadType,$clases);
		}

		$termino_pago_proveedor->setproveedors($this->termino_pago_proveedorDataAccess->getproveedors($this->connexion,$termino_pago_proveedor));

		foreach($termino_pago_proveedor->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
		}

		$termino_pago_proveedor->setcredito_cuenta_pagars($this->termino_pago_proveedorDataAccess->getcredito_cuenta_pagars($this->connexion,$termino_pago_proveedor));

		foreach($termino_pago_proveedor->getcredito_cuenta_pagars() as $creditocuentapagar) {
			$creditocuentapagarLogic= new credito_cuenta_pagar_logic($this->connexion);
			$creditocuentapagarLogic->deepLoad($creditocuentapagar,$isDeep,$deepLoadType,$clases);
		}

		$termino_pago_proveedor->setcuenta_pagars($this->termino_pago_proveedorDataAccess->getcuenta_pagars($this->connexion,$termino_pago_proveedor));

		foreach($termino_pago_proveedor->getcuenta_pagars() as $cuentapagar) {
			$cuentapagarLogic= new cuenta_pagar_logic($this->connexion);
			$cuentapagarLogic->deepLoad($cuentapagar,$isDeep,$deepLoadType,$clases);
		}

		$termino_pago_proveedor->setcotizacions($this->termino_pago_proveedorDataAccess->getcotizacions($this->connexion,$termino_pago_proveedor));

		foreach($termino_pago_proveedor->getcotizacions() as $cotizacion) {
			$cotizacionLogic= new cotizacion_logic($this->connexion);
			$cotizacionLogic->deepLoad($cotizacion,$isDeep,$deepLoadType,$clases);
		}

		$termino_pago_proveedor->setparametro_inventarios($this->termino_pago_proveedorDataAccess->getparametro_inventarios($this->connexion,$termino_pago_proveedor));

		foreach($termino_pago_proveedor->getparametro_inventarios() as $parametroinventario) {
			$parametroinventarioLogic= new parametro_inventario_logic($this->connexion);
			$parametroinventarioLogic->deepLoad($parametroinventario,$isDeep,$deepLoadType,$clases);
		}

		$termino_pago_proveedor->setdevolucions($this->termino_pago_proveedorDataAccess->getdevolucions($this->connexion,$termino_pago_proveedor));

		foreach($termino_pago_proveedor->getdevolucions() as $devolucion) {
			$devolucionLogic= new devolucion_logic($this->connexion);
			$devolucionLogic->deepLoad($devolucion,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$termino_pago_proveedor->setempresa($this->termino_pago_proveedorDataAccess->getempresa($this->connexion,$termino_pago_proveedor));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($termino_pago_proveedor->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_termino_pago::$class.'') {
				$termino_pago_proveedor->settipo_termino_pago($this->termino_pago_proveedorDataAccess->gettipo_termino_pago($this->connexion,$termino_pago_proveedor));
				$tipo_termino_pagoLogic= new tipo_termino_pago_logic($this->connexion);
				$tipo_termino_pagoLogic->deepLoad($termino_pago_proveedor->gettipo_termino_pago(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$termino_pago_proveedor->setcuenta($this->termino_pago_proveedorDataAccess->getcuenta($this->connexion,$termino_pago_proveedor));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($termino_pago_proveedor->getcuenta(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_proveedor->setorden_compras($this->termino_pago_proveedorDataAccess->getorden_compras($this->connexion,$termino_pago_proveedor));

				foreach($termino_pago_proveedor->getorden_compras() as $ordencompra) {
					$ordencompraLogic= new orden_compra_logic($this->connexion);
					$ordencompraLogic->deepLoad($ordencompra,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_proveedor->setproveedors($this->termino_pago_proveedorDataAccess->getproveedors($this->connexion,$termino_pago_proveedor));

				foreach($termino_pago_proveedor->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_proveedor->setcredito_cuenta_pagars($this->termino_pago_proveedorDataAccess->getcredito_cuenta_pagars($this->connexion,$termino_pago_proveedor));

				foreach($termino_pago_proveedor->getcredito_cuenta_pagars() as $creditocuentapagar) {
					$creditocuentapagarLogic= new credito_cuenta_pagar_logic($this->connexion);
					$creditocuentapagarLogic->deepLoad($creditocuentapagar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_proveedor->setcuenta_pagars($this->termino_pago_proveedorDataAccess->getcuenta_pagars($this->connexion,$termino_pago_proveedor));

				foreach($termino_pago_proveedor->getcuenta_pagars() as $cuentapagar) {
					$cuentapagarLogic= new cuenta_pagar_logic($this->connexion);
					$cuentapagarLogic->deepLoad($cuentapagar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_proveedor->setcotizacions($this->termino_pago_proveedorDataAccess->getcotizacions($this->connexion,$termino_pago_proveedor));

				foreach($termino_pago_proveedor->getcotizacions() as $cotizacion) {
					$cotizacionLogic= new cotizacion_logic($this->connexion);
					$cotizacionLogic->deepLoad($cotizacion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_proveedor->setparametro_inventarios($this->termino_pago_proveedorDataAccess->getparametro_inventarios($this->connexion,$termino_pago_proveedor));

				foreach($termino_pago_proveedor->getparametro_inventarios() as $parametroinventario) {
					$parametroinventarioLogic= new parametro_inventario_logic($this->connexion);
					$parametroinventarioLogic->deepLoad($parametroinventario,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_proveedor->setdevolucions($this->termino_pago_proveedorDataAccess->getdevolucions($this->connexion,$termino_pago_proveedor));

				foreach($termino_pago_proveedor->getdevolucions() as $devolucion) {
					$devolucionLogic= new devolucion_logic($this->connexion);
					$devolucionLogic->deepLoad($devolucion,$isDeep,$deepLoadType,$clases);
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
			$termino_pago_proveedor->setempresa($this->termino_pago_proveedorDataAccess->getempresa($this->connexion,$termino_pago_proveedor));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($termino_pago_proveedor->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_termino_pago::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$termino_pago_proveedor->settipo_termino_pago($this->termino_pago_proveedorDataAccess->gettipo_termino_pago($this->connexion,$termino_pago_proveedor));
			$tipo_termino_pagoLogic= new tipo_termino_pago_logic($this->connexion);
			$tipo_termino_pagoLogic->deepLoad($termino_pago_proveedor->gettipo_termino_pago(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$termino_pago_proveedor->setcuenta($this->termino_pago_proveedorDataAccess->getcuenta($this->connexion,$termino_pago_proveedor));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($termino_pago_proveedor->getcuenta(),$isDeep,$deepLoadType,$clases);
				
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
			$termino_pago_proveedor->setorden_compras($this->termino_pago_proveedorDataAccess->getorden_compras($this->connexion,$termino_pago_proveedor));

			foreach($termino_pago_proveedor->getorden_compras() as $ordencompra) {
				$ordencompraLogic= new orden_compra_logic($this->connexion);
				$ordencompraLogic->deepLoad($ordencompra,$isDeep,$deepLoadType,$clases);
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
			$termino_pago_proveedor->setproveedors($this->termino_pago_proveedorDataAccess->getproveedors($this->connexion,$termino_pago_proveedor));

			foreach($termino_pago_proveedor->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_pagar::$class);
			$termino_pago_proveedor->setcredito_cuenta_pagars($this->termino_pago_proveedorDataAccess->getcredito_cuenta_pagars($this->connexion,$termino_pago_proveedor));

			foreach($termino_pago_proveedor->getcredito_cuenta_pagars() as $creditocuentapagar) {
				$creditocuentapagarLogic= new credito_cuenta_pagar_logic($this->connexion);
				$creditocuentapagarLogic->deepLoad($creditocuentapagar,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_pagar::$class);
			$termino_pago_proveedor->setcuenta_pagars($this->termino_pago_proveedorDataAccess->getcuenta_pagars($this->connexion,$termino_pago_proveedor));

			foreach($termino_pago_proveedor->getcuenta_pagars() as $cuentapagar) {
				$cuentapagarLogic= new cuenta_pagar_logic($this->connexion);
				$cuentapagarLogic->deepLoad($cuentapagar,$isDeep,$deepLoadType,$clases);
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
			$termino_pago_proveedor->setcotizacions($this->termino_pago_proveedorDataAccess->getcotizacions($this->connexion,$termino_pago_proveedor));

			foreach($termino_pago_proveedor->getcotizacions() as $cotizacion) {
				$cotizacionLogic= new cotizacion_logic($this->connexion);
				$cotizacionLogic->deepLoad($cotizacion,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_inventario::$class);
			$termino_pago_proveedor->setparametro_inventarios($this->termino_pago_proveedorDataAccess->getparametro_inventarios($this->connexion,$termino_pago_proveedor));

			foreach($termino_pago_proveedor->getparametro_inventarios() as $parametroinventario) {
				$parametroinventarioLogic= new parametro_inventario_logic($this->connexion);
				$parametroinventarioLogic->deepLoad($parametroinventario,$isDeep,$deepLoadType,$clases);
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
			$termino_pago_proveedor->setdevolucions($this->termino_pago_proveedorDataAccess->getdevolucions($this->connexion,$termino_pago_proveedor));

			foreach($termino_pago_proveedor->getdevolucions() as $devolucion) {
				$devolucionLogic= new devolucion_logic($this->connexion);
				$devolucionLogic->deepLoad($devolucion,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(termino_pago_proveedor $termino_pago_proveedor,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//termino_pago_proveedor_logic_add::updatetermino_pago_proveedorToSave($this->termino_pago_proveedor);			
			
			if(!$paraDeleteCascade) {				
				termino_pago_proveedor_data::save($termino_pago_proveedor, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($termino_pago_proveedor->getempresa(),$this->connexion);
		tipo_termino_pago_data::save($termino_pago_proveedor->gettipo_termino_pago(),$this->connexion);
		cuenta_data::save($termino_pago_proveedor->getcuenta(),$this->connexion);

		foreach($termino_pago_proveedor->getorden_compras() as $ordencompra) {
			$ordencompra->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
			orden_compra_data::save($ordencompra,$this->connexion);
		}


		foreach($termino_pago_proveedor->getproveedors() as $proveedor) {
			$proveedor->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
			proveedor_data::save($proveedor,$this->connexion);
		}


		foreach($termino_pago_proveedor->getcredito_cuenta_pagars() as $creditocuentapagar) {
			$creditocuentapagar->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
			credito_cuenta_pagar_data::save($creditocuentapagar,$this->connexion);
		}


		foreach($termino_pago_proveedor->getcuenta_pagars() as $cuentapagar) {
			$cuentapagar->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
			cuenta_pagar_data::save($cuentapagar,$this->connexion);
		}


		foreach($termino_pago_proveedor->getcotizacions() as $cotizacion) {
			$cotizacion->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
			cotizacion_data::save($cotizacion,$this->connexion);
		}


		foreach($termino_pago_proveedor->getparametro_inventarios() as $parametroinventario) {
			$parametroinventario->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
			parametro_inventario_data::save($parametroinventario,$this->connexion);
		}


		foreach($termino_pago_proveedor->getdevolucions() as $devolucion) {
			$devolucion->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
			devolucion_data::save($devolucion,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($termino_pago_proveedor->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_termino_pago::$class.'') {
				tipo_termino_pago_data::save($termino_pago_proveedor->gettipo_termino_pago(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($termino_pago_proveedor->getcuenta(),$this->connexion);
				continue;
			}


			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_proveedor->getorden_compras() as $ordencompra) {
					$ordencompra->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
					orden_compra_data::save($ordencompra,$this->connexion);
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_proveedor->getproveedors() as $proveedor) {
					$proveedor->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
					proveedor_data::save($proveedor,$this->connexion);
				}

				continue;
			}

			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_proveedor->getcredito_cuenta_pagars() as $creditocuentapagar) {
					$creditocuentapagar->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
					credito_cuenta_pagar_data::save($creditocuentapagar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_proveedor->getcuenta_pagars() as $cuentapagar) {
					$cuentapagar->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
					cuenta_pagar_data::save($cuentapagar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_proveedor->getcotizacions() as $cotizacion) {
					$cotizacion->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
					cotizacion_data::save($cotizacion,$this->connexion);
				}

				continue;
			}

			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_proveedor->getparametro_inventarios() as $parametroinventario) {
					$parametroinventario->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
					parametro_inventario_data::save($parametroinventario,$this->connexion);
				}

				continue;
			}

			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_proveedor->getdevolucions() as $devolucion) {
					$devolucion->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
					devolucion_data::save($devolucion,$this->connexion);
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
			empresa_data::save($termino_pago_proveedor->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_termino_pago::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_termino_pago_data::save($termino_pago_proveedor->gettipo_termino_pago(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($termino_pago_proveedor->getcuenta(),$this->connexion);
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

			foreach($termino_pago_proveedor->getorden_compras() as $ordencompra) {
				$ordencompra->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
				orden_compra_data::save($ordencompra,$this->connexion);
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

			foreach($termino_pago_proveedor->getproveedors() as $proveedor) {
				$proveedor->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
				proveedor_data::save($proveedor,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_pagar::$class);

			foreach($termino_pago_proveedor->getcredito_cuenta_pagars() as $creditocuentapagar) {
				$creditocuentapagar->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
				credito_cuenta_pagar_data::save($creditocuentapagar,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_pagar::$class);

			foreach($termino_pago_proveedor->getcuenta_pagars() as $cuentapagar) {
				$cuentapagar->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
				cuenta_pagar_data::save($cuentapagar,$this->connexion);
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

			foreach($termino_pago_proveedor->getcotizacions() as $cotizacion) {
				$cotizacion->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
				cotizacion_data::save($cotizacion,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_inventario::$class);

			foreach($termino_pago_proveedor->getparametro_inventarios() as $parametroinventario) {
				$parametroinventario->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
				parametro_inventario_data::save($parametroinventario,$this->connexion);
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

			foreach($termino_pago_proveedor->getdevolucions() as $devolucion) {
				$devolucion->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
				devolucion_data::save($devolucion,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($termino_pago_proveedor->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($termino_pago_proveedor->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_termino_pago_data::save($termino_pago_proveedor->gettipo_termino_pago(),$this->connexion);
		$tipo_termino_pagoLogic= new tipo_termino_pago_logic($this->connexion);
		$tipo_termino_pagoLogic->deepSave($termino_pago_proveedor->gettipo_termino_pago(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($termino_pago_proveedor->getcuenta(),$this->connexion);
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepSave($termino_pago_proveedor->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($termino_pago_proveedor->getorden_compras() as $ordencompra) {
			$ordencompraLogic= new orden_compra_logic($this->connexion);
			$ordencompra->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
			orden_compra_data::save($ordencompra,$this->connexion);
			$ordencompraLogic->deepSave($ordencompra,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($termino_pago_proveedor->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedor->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
			proveedor_data::save($proveedor,$this->connexion);
			$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($termino_pago_proveedor->getcredito_cuenta_pagars() as $creditocuentapagar) {
			$creditocuentapagarLogic= new credito_cuenta_pagar_logic($this->connexion);
			$creditocuentapagar->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
			credito_cuenta_pagar_data::save($creditocuentapagar,$this->connexion);
			$creditocuentapagarLogic->deepSave($creditocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($termino_pago_proveedor->getcuenta_pagars() as $cuentapagar) {
			$cuentapagarLogic= new cuenta_pagar_logic($this->connexion);
			$cuentapagar->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
			cuenta_pagar_data::save($cuentapagar,$this->connexion);
			$cuentapagarLogic->deepSave($cuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($termino_pago_proveedor->getcotizacions() as $cotizacion) {
			$cotizacionLogic= new cotizacion_logic($this->connexion);
			$cotizacion->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
			cotizacion_data::save($cotizacion,$this->connexion);
			$cotizacionLogic->deepSave($cotizacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($termino_pago_proveedor->getparametro_inventarios() as $parametroinventario) {
			$parametroinventarioLogic= new parametro_inventario_logic($this->connexion);
			$parametroinventario->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
			parametro_inventario_data::save($parametroinventario,$this->connexion);
			$parametroinventarioLogic->deepSave($parametroinventario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($termino_pago_proveedor->getdevolucions() as $devolucion) {
			$devolucionLogic= new devolucion_logic($this->connexion);
			$devolucion->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
			devolucion_data::save($devolucion,$this->connexion);
			$devolucionLogic->deepSave($devolucion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($termino_pago_proveedor->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($termino_pago_proveedor->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_termino_pago::$class.'') {
				tipo_termino_pago_data::save($termino_pago_proveedor->gettipo_termino_pago(),$this->connexion);
				$tipo_termino_pagoLogic= new tipo_termino_pago_logic($this->connexion);
				$tipo_termino_pagoLogic->deepSave($termino_pago_proveedor->gettipo_termino_pago(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($termino_pago_proveedor->getcuenta(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($termino_pago_proveedor->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_proveedor->getorden_compras() as $ordencompra) {
					$ordencompraLogic= new orden_compra_logic($this->connexion);
					$ordencompra->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
					orden_compra_data::save($ordencompra,$this->connexion);
					$ordencompraLogic->deepSave($ordencompra,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_proveedor->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedor->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
					proveedor_data::save($proveedor,$this->connexion);
					$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_proveedor->getcredito_cuenta_pagars() as $creditocuentapagar) {
					$creditocuentapagarLogic= new credito_cuenta_pagar_logic($this->connexion);
					$creditocuentapagar->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
					credito_cuenta_pagar_data::save($creditocuentapagar,$this->connexion);
					$creditocuentapagarLogic->deepSave($creditocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_proveedor->getcuenta_pagars() as $cuentapagar) {
					$cuentapagarLogic= new cuenta_pagar_logic($this->connexion);
					$cuentapagar->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
					cuenta_pagar_data::save($cuentapagar,$this->connexion);
					$cuentapagarLogic->deepSave($cuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cotizacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_proveedor->getcotizacions() as $cotizacion) {
					$cotizacionLogic= new cotizacion_logic($this->connexion);
					$cotizacion->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
					cotizacion_data::save($cotizacion,$this->connexion);
					$cotizacionLogic->deepSave($cotizacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_proveedor->getparametro_inventarios() as $parametroinventario) {
					$parametroinventarioLogic= new parametro_inventario_logic($this->connexion);
					$parametroinventario->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
					parametro_inventario_data::save($parametroinventario,$this->connexion);
					$parametroinventarioLogic->deepSave($parametroinventario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_proveedor->getdevolucions() as $devolucion) {
					$devolucionLogic= new devolucion_logic($this->connexion);
					$devolucion->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
					devolucion_data::save($devolucion,$this->connexion);
					$devolucionLogic->deepSave($devolucion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($termino_pago_proveedor->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($termino_pago_proveedor->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_termino_pago::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_termino_pago_data::save($termino_pago_proveedor->gettipo_termino_pago(),$this->connexion);
			$tipo_termino_pagoLogic= new tipo_termino_pago_logic($this->connexion);
			$tipo_termino_pagoLogic->deepSave($termino_pago_proveedor->gettipo_termino_pago(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($termino_pago_proveedor->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($termino_pago_proveedor->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
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

			foreach($termino_pago_proveedor->getorden_compras() as $ordencompra) {
				$ordencompraLogic= new orden_compra_logic($this->connexion);
				$ordencompra->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
				orden_compra_data::save($ordencompra,$this->connexion);
				$ordencompraLogic->deepSave($ordencompra,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($termino_pago_proveedor->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedor->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
				proveedor_data::save($proveedor,$this->connexion);
				$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_pagar::$class);

			foreach($termino_pago_proveedor->getcredito_cuenta_pagars() as $creditocuentapagar) {
				$creditocuentapagarLogic= new credito_cuenta_pagar_logic($this->connexion);
				$creditocuentapagar->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
				credito_cuenta_pagar_data::save($creditocuentapagar,$this->connexion);
				$creditocuentapagarLogic->deepSave($creditocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_pagar::$class);

			foreach($termino_pago_proveedor->getcuenta_pagars() as $cuentapagar) {
				$cuentapagarLogic= new cuenta_pagar_logic($this->connexion);
				$cuentapagar->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
				cuenta_pagar_data::save($cuentapagar,$this->connexion);
				$cuentapagarLogic->deepSave($cuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($termino_pago_proveedor->getcotizacions() as $cotizacion) {
				$cotizacionLogic= new cotizacion_logic($this->connexion);
				$cotizacion->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
				cotizacion_data::save($cotizacion,$this->connexion);
				$cotizacionLogic->deepSave($cotizacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_inventario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_inventario::$class);

			foreach($termino_pago_proveedor->getparametro_inventarios() as $parametroinventario) {
				$parametroinventarioLogic= new parametro_inventario_logic($this->connexion);
				$parametroinventario->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
				parametro_inventario_data::save($parametroinventario,$this->connexion);
				$parametroinventarioLogic->deepSave($parametroinventario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($termino_pago_proveedor->getdevolucions() as $devolucion) {
				$devolucionLogic= new devolucion_logic($this->connexion);
				$devolucion->setid_termino_pago_proveedor($termino_pago_proveedor->getId());
				devolucion_data::save($devolucion,$this->connexion);
				$devolucionLogic->deepSave($devolucion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				termino_pago_proveedor_data::save($termino_pago_proveedor, $this->connexion);
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
			
			$this->deepLoad($this->termino_pago_proveedor,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->termino_pago_proveedors as $termino_pago_proveedor) {
				$this->deepLoad($termino_pago_proveedor,$isDeep,$deepLoadType,$clases);
								
				termino_pago_proveedor_util::refrescarFKDescripciones($this->termino_pago_proveedors);
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
			
			foreach($this->termino_pago_proveedors as $termino_pago_proveedor) {
				$this->deepLoad($termino_pago_proveedor,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->termino_pago_proveedor,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->termino_pago_proveedors as $termino_pago_proveedor) {
				$this->deepSave($termino_pago_proveedor,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->termino_pago_proveedors as $termino_pago_proveedor) {
				$this->deepSave($termino_pago_proveedor,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(tipo_termino_pago::$class);
				$classes[]=new Classe(cuenta::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==tipo_termino_pago::$class) {
						$classes[]=new Classe(tipo_termino_pago::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
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
					if($clas->clas==tipo_termino_pago::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_termino_pago::$class);
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
				
				$classes[]=new Classe(orden_compra::$class);
				$classes[]=new Classe(proveedor::$class);
				$classes[]=new Classe(credito_cuenta_pagar::$class);
				$classes[]=new Classe(cuenta_pagar::$class);
				$classes[]=new Classe(cotizacion::$class);
				$classes[]=new Classe(parametro_inventario::$class);
				$classes[]=new Classe(devolucion::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==orden_compra::$class) {
						$classes[]=new Classe(orden_compra::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==credito_cuenta_pagar::$class) {
						$classes[]=new Classe(credito_cuenta_pagar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==cuenta_pagar::$class) {
						$classes[]=new Classe(cuenta_pagar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==cotizacion::$class) {
						$classes[]=new Classe(cotizacion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==parametro_inventario::$class) {
						$classes[]=new Classe(parametro_inventario::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==devolucion::$class) {
						$classes[]=new Classe(devolucion::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

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
					if($clas->clas==proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(proveedor::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==credito_cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(credito_cuenta_pagar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_pagar::$class);
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
					if($clas->clas==parametro_inventario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(parametro_inventario::$class);
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

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function gettermino_pago_proveedor() : ?termino_pago_proveedor {	
		/*
		termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGet($this->termino_pago_proveedor,$this->datosCliente);
		termino_pago_proveedor_logic_add::updatetermino_pago_proveedorToGet($this->termino_pago_proveedor);
		*/
			
		return $this->termino_pago_proveedor;
	}
		
	public function settermino_pago_proveedor(termino_pago_proveedor $newtermino_pago_proveedor) {
		$this->termino_pago_proveedor = $newtermino_pago_proveedor;
	}
	
	public function gettermino_pago_proveedors() : array {		
		/*
		termino_pago_proveedor_logic_add::checktermino_pago_proveedorToGets($this->termino_pago_proveedors,$this->datosCliente);
		
		foreach ($this->termino_pago_proveedors as $termino_pago_proveedorLocal ) {
			termino_pago_proveedor_logic_add::updatetermino_pago_proveedorToGet($termino_pago_proveedorLocal);
		}
		*/
		
		return $this->termino_pago_proveedors;
	}
	
	public function settermino_pago_proveedors(array $newtermino_pago_proveedors) {
		$this->termino_pago_proveedors = $newtermino_pago_proveedors;
	}
	
	public function gettermino_pago_proveedorDataAccess() : termino_pago_proveedor_data {
		return $this->termino_pago_proveedorDataAccess;
	}
	
	public function settermino_pago_proveedorDataAccess(termino_pago_proveedor_data $newtermino_pago_proveedorDataAccess) {
		$this->termino_pago_proveedorDataAccess = $newtermino_pago_proveedorDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        termino_pago_proveedor_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		orden_compra_detalle_logic::$logger;
		debito_cuenta_pagar_logic::$logger;
		pago_cuenta_pagar_logic::$logger;
		cotizacion_detalle_logic::$logger;
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
