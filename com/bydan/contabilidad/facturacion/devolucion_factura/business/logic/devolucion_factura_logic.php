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

namespace com\bydan\contabilidad\facturacion\devolucion_factura\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_param_return;

use com\bydan\contabilidad\facturacion\devolucion_factura\presentation\session\devolucion_factura_session;

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

use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;
use com\bydan\contabilidad\facturacion\devolucion_factura\business\entity\devolucion_factura;
use com\bydan\contabilidad\facturacion\devolucion_factura\business\data\devolucion_factura_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\business\data\sucursal_data;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\data\ejercicio_data;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\data\periodo_data;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\business\data\vendedor_data;
use com\bydan\contabilidad\facturacion\vendedor\business\logic\vendedor_logic;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\data\termino_pago_cliente_data;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;
use com\bydan\contabilidad\contabilidad\moneda\business\data\moneda_data;
use com\bydan\contabilidad\contabilidad\moneda\business\logic\moneda_logic;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\data\estado_data;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_util;

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\data\asiento_data;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\entity\documento_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\data\documento_cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\logic\documento_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_util;

use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;
use com\bydan\contabilidad\inventario\kardex\business\data\kardex_data;
use com\bydan\contabilidad\inventario\kardex\business\logic\kardex_logic;
use com\bydan\contabilidad\inventario\kardex\util\kardex_util;

//REL


use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\business\entity\devolucion_factura_detalle;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\business\data\devolucion_factura_detalle_data;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\business\logic\devolucion_factura_detalle_logic;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\util\devolucion_factura_detalle_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\util\devolucion_factura_detalle_util;

//REL DETALLES




class devolucion_factura_logic  extends GeneralEntityLogic implements devolucion_factura_logicI {	
	/*GENERAL*/
	public devolucion_factura_data $devolucion_facturaDataAccess;
	//public ?devolucion_factura_logic_add $devolucion_facturaLogicAdditional=null;
	public ?devolucion_factura $devolucion_factura;
	public array $devolucion_facturas;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->devolucion_facturaDataAccess = new devolucion_factura_data();			
			$this->devolucion_facturas = array();
			$this->devolucion_factura = new devolucion_factura();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->devolucion_facturaLogicAdditional = new devolucion_factura_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->devolucion_facturaLogicAdditional==null) {
		//	$this->devolucion_facturaLogicAdditional=new devolucion_factura_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->devolucion_facturaDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->devolucion_facturaDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->devolucion_facturaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->devolucion_facturaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->devolucion_facturas = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_facturas);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->devolucion_facturas = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_facturas);
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
		$this->devolucion_factura = new devolucion_factura();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->devolucion_factura=$this->devolucion_facturaDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->devolucion_factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				devolucion_factura_util::refrescarFKDescripcion($this->devolucion_factura);
			}
						
			//devolucion_factura_logic_add::checkdevolucion_facturaToGet($this->devolucion_factura,$this->datosCliente);
			//devolucion_factura_logic_add::updatedevolucion_facturaToGet($this->devolucion_factura);
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
		$this->devolucion_factura = new  devolucion_factura();
		  		  
        try {		
			$this->devolucion_factura=$this->devolucion_facturaDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->devolucion_factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				devolucion_factura_util::refrescarFKDescripcion($this->devolucion_factura);
			}
			
			//devolucion_factura_logic_add::checkdevolucion_facturaToGet($this->devolucion_factura,$this->datosCliente);
			//devolucion_factura_logic_add::updatedevolucion_facturaToGet($this->devolucion_factura);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?devolucion_factura {
		$devolucion_facturaLogic = new  devolucion_factura_logic();
		  		  
        try {		
			$devolucion_facturaLogic->setConnexion($connexion);			
			$devolucion_facturaLogic->getEntity($id);			
			return $devolucion_facturaLogic->getdevolucion_factura();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->devolucion_factura = new  devolucion_factura();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->devolucion_factura=$this->devolucion_facturaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->devolucion_factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				devolucion_factura_util::refrescarFKDescripcion($this->devolucion_factura);
			}
			
			//devolucion_factura_logic_add::checkdevolucion_facturaToGet($this->devolucion_factura,$this->datosCliente);
			//devolucion_factura_logic_add::updatedevolucion_facturaToGet($this->devolucion_factura);
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
		$this->devolucion_factura = new  devolucion_factura();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion_factura=$this->devolucion_facturaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->devolucion_factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				devolucion_factura_util::refrescarFKDescripcion($this->devolucion_factura);
			}
			
			//devolucion_factura_logic_add::checkdevolucion_facturaToGet($this->devolucion_factura,$this->datosCliente);
			//devolucion_factura_logic_add::updatedevolucion_facturaToGet($this->devolucion_factura);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?devolucion_factura {
		$devolucion_facturaLogic = new  devolucion_factura_logic();
		  		  
        try {		
			$devolucion_facturaLogic->setConnexion($connexion);			
			$devolucion_facturaLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $devolucion_facturaLogic->getdevolucion_factura();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->devolucion_facturas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_facturas);			
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
		$this->devolucion_facturas = array();
		  		  
        try {			
			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_facturas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->devolucion_facturas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_facturas);
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
		$this->devolucion_facturas = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_facturas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$devolucion_facturaLogic = new  devolucion_factura_logic();
		  		  
        try {		
			$devolucion_facturaLogic->setConnexion($connexion);			
			$devolucion_facturaLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $devolucion_facturaLogic->getdevolucion_facturas();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->devolucion_facturas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_facturas);
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
		$this->devolucion_facturas = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_facturas);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->devolucion_facturas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_facturas);
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
		$this->devolucion_facturas = array();
		  		  
        try {			
			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}	
			
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_facturas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->devolucion_facturas = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_facturas);
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
		$this->devolucion_facturas = array();
		  		  
        try {		
			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucion_facturas);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdasientoWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_asiento) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_asiento= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_asiento->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento,devolucion_factura_util::$ID_ASIENTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idasiento(string $strFinalQuery,Pagination $pagination,?int $id_asiento) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_asiento= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_asiento->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento,devolucion_factura_util::$ID_ASIENTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdclienteWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cliente) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,devolucion_factura_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcliente(string $strFinalQuery,Pagination $pagination,int $id_cliente) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,devolucion_factura_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Iddocumento_cuenta_cobrarWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_documento_cuenta_cobrar) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_documento_cuenta_cobrar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_documento_cuenta_cobrar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_cuenta_cobrar,devolucion_factura_util::$ID_DOCUMENTO_CUENTA_COBRAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_cuenta_cobrar);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Iddocumento_cuenta_cobrar(string $strFinalQuery,Pagination $pagination,?int $id_documento_cuenta_cobrar) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_documento_cuenta_cobrar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_documento_cuenta_cobrar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_cuenta_cobrar,devolucion_factura_util::$ID_DOCUMENTO_CUENTA_COBRAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_cuenta_cobrar);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdejercicioWithConnection(string $strFinalQuery,Pagination $pagination,int $id_ejercicio) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ejercicio= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,devolucion_factura_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idejercicio(string $strFinalQuery,Pagination $pagination,int $id_ejercicio) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ejercicio= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,devolucion_factura_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,devolucion_factura_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,devolucion_factura_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdestadoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_estado) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estado= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,devolucion_factura_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idestado(string $strFinalQuery,Pagination $pagination,int $id_estado) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estado= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,devolucion_factura_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);
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
			$parameterSelectionGeneralid_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_kardex,devolucion_factura_util::$ID_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_kardex);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);

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
			$parameterSelectionGeneralid_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_kardex,devolucion_factura_util::$ID_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_kardex);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdmonedaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_moneda) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_moneda= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_moneda->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_moneda,devolucion_factura_util::$ID_MONEDA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_moneda);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idmoneda(string $strFinalQuery,Pagination $pagination,int $id_moneda) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_moneda= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_moneda->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_moneda,devolucion_factura_util::$ID_MONEDA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_moneda);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdperiodoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_periodo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_periodo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,devolucion_factura_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idperiodo(string $strFinalQuery,Pagination $pagination,int $id_periodo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_periodo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,devolucion_factura_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdsucursalWithConnection(string $strFinalQuery,Pagination $pagination,int $id_sucursal) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sucursal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,devolucion_factura_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idsucursal(string $strFinalQuery,Pagination $pagination,int $id_sucursal) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sucursal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,devolucion_factura_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtermino_pagoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_termino_pago_cliente) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_termino_pago_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_termino_pago_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_cliente,devolucion_factura_util::$ID_TERMINO_PAGO_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_cliente);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtermino_pago(string $strFinalQuery,Pagination $pagination,int $id_termino_pago_cliente) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_termino_pago_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_termino_pago_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_cliente,devolucion_factura_util::$ID_TERMINO_PAGO_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_cliente);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdusuarioWithConnection(string $strFinalQuery,Pagination $pagination,int $id_usuario) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_usuario= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,devolucion_factura_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idusuario(string $strFinalQuery,Pagination $pagination,int $id_usuario) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_usuario= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,devolucion_factura_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdvendedorWithConnection(string $strFinalQuery,Pagination $pagination,int $id_vendedor) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_vendedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_vendedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_vendedor,devolucion_factura_util::$ID_VENDEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_vendedor);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idvendedor(string $strFinalQuery,Pagination $pagination,int $id_vendedor) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_vendedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_vendedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_vendedor,devolucion_factura_util::$ID_VENDEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_vendedor);

			$this->devolucion_facturas=$this->devolucion_facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			//devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucion_facturas);
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
						
			//devolucion_factura_logic_add::checkdevolucion_facturaToSave($this->devolucion_factura,$this->datosCliente,$this->connexion);	       
			//devolucion_factura_logic_add::updatedevolucion_facturaToSave($this->devolucion_factura);			
			devolucion_factura_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->devolucion_factura,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->devolucion_facturaLogicAdditional->checkGeneralEntityToSave($this,$this->devolucion_factura,$this->datosCliente,$this->connexion);
			
			
			devolucion_factura_data::save($this->devolucion_factura, $this->connexion);	    	       	 				
			//devolucion_factura_logic_add::checkdevolucion_facturaToSaveAfter($this->devolucion_factura,$this->datosCliente,$this->connexion);			
			//$this->devolucion_facturaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->devolucion_factura,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->devolucion_factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->devolucion_factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				devolucion_factura_util::refrescarFKDescripcion($this->devolucion_factura);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->devolucion_factura->getIsDeleted()) {
				$this->devolucion_factura=null;
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
						
			/*devolucion_factura_logic_add::checkdevolucion_facturaToSave($this->devolucion_factura,$this->datosCliente,$this->connexion);*/	        
			//devolucion_factura_logic_add::updatedevolucion_facturaToSave($this->devolucion_factura);			
			//$this->devolucion_facturaLogicAdditional->checkGeneralEntityToSave($this,$this->devolucion_factura,$this->datosCliente,$this->connexion);			
			devolucion_factura_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->devolucion_factura,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			devolucion_factura_data::save($this->devolucion_factura, $this->connexion);	    	       	 						
			/*devolucion_factura_logic_add::checkdevolucion_facturaToSaveAfter($this->devolucion_factura,$this->datosCliente,$this->connexion);*/			
			//$this->devolucion_facturaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->devolucion_factura,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->devolucion_factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->devolucion_factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				devolucion_factura_util::refrescarFKDescripcion($this->devolucion_factura);				
			}
			
			if($this->devolucion_factura->getIsDeleted()) {
				$this->devolucion_factura=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(devolucion_factura $devolucion_factura,Connexion $connexion)  {
		$devolucion_facturaLogic = new  devolucion_factura_logic();		  		  
        try {		
			$devolucion_facturaLogic->setConnexion($connexion);			
			$devolucion_facturaLogic->setdevolucion_factura($devolucion_factura);			
			$devolucion_facturaLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*devolucion_factura_logic_add::checkdevolucion_facturaToSaves($this->devolucion_facturas,$this->datosCliente,$this->connexion);*/	        	
			//$this->devolucion_facturaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->devolucion_facturas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->devolucion_facturas as $devolucion_facturaLocal) {				
								
				//devolucion_factura_logic_add::updatedevolucion_facturaToSave($devolucion_facturaLocal);	        	
				devolucion_factura_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$devolucion_facturaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				devolucion_factura_data::save($devolucion_facturaLocal, $this->connexion);				
			}
			
			/*devolucion_factura_logic_add::checkdevolucion_facturaToSavesAfter($this->devolucion_facturas,$this->datosCliente,$this->connexion);*/			
			//$this->devolucion_facturaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->devolucion_facturas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
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
			/*devolucion_factura_logic_add::checkdevolucion_facturaToSaves($this->devolucion_facturas,$this->datosCliente,$this->connexion);*/			
			//$this->devolucion_facturaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->devolucion_facturas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->devolucion_facturas as $devolucion_facturaLocal) {				
								
				//devolucion_factura_logic_add::updatedevolucion_facturaToSave($devolucion_facturaLocal);	        	
				devolucion_factura_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$devolucion_facturaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				devolucion_factura_data::save($devolucion_facturaLocal, $this->connexion);				
			}			
			
			/*devolucion_factura_logic_add::checkdevolucion_facturaToSavesAfter($this->devolucion_facturas,$this->datosCliente,$this->connexion);*/			
			//$this->devolucion_facturaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->devolucion_facturas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $devolucion_facturas,Connexion $connexion)  {
		$devolucion_facturaLogic = new  devolucion_factura_logic();
		  		  
        try {		
			$devolucion_facturaLogic->setConnexion($connexion);			
			$devolucion_facturaLogic->setdevolucion_facturas($devolucion_facturas);			
			$devolucion_facturaLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$devolucion_facturasAux=array();
		
		foreach($this->devolucion_facturas as $devolucion_factura) {
			if($devolucion_factura->getIsDeleted()==false) {
				$devolucion_facturasAux[]=$devolucion_factura;
			}
		}
		
		$this->devolucion_facturas=$devolucion_facturasAux;
	}
	
	public function updateToGetsAuxiliar(array &$devolucion_facturas) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->devolucion_facturas as $devolucion_factura) {
				
				$devolucion_factura->setid_empresa_Descripcion(devolucion_factura_util::getempresaDescripcion($devolucion_factura->getempresa()));
				$devolucion_factura->setid_sucursal_Descripcion(devolucion_factura_util::getsucursalDescripcion($devolucion_factura->getsucursal()));
				$devolucion_factura->setid_ejercicio_Descripcion(devolucion_factura_util::getejercicioDescripcion($devolucion_factura->getejercicio()));
				$devolucion_factura->setid_periodo_Descripcion(devolucion_factura_util::getperiodoDescripcion($devolucion_factura->getperiodo()));
				$devolucion_factura->setid_usuario_Descripcion(devolucion_factura_util::getusuarioDescripcion($devolucion_factura->getusuario()));
				$devolucion_factura->setid_cliente_Descripcion(devolucion_factura_util::getclienteDescripcion($devolucion_factura->getcliente()));
				$devolucion_factura->setid_vendedor_Descripcion(devolucion_factura_util::getvendedorDescripcion($devolucion_factura->getvendedor()));
				$devolucion_factura->setid_termino_pago_cliente_Descripcion(devolucion_factura_util::gettermino_pago_clienteDescripcion($devolucion_factura->gettermino_pago_cliente()));
				$devolucion_factura->setid_moneda_Descripcion(devolucion_factura_util::getmonedaDescripcion($devolucion_factura->getmoneda()));
				$devolucion_factura->setid_estado_Descripcion(devolucion_factura_util::getestadoDescripcion($devolucion_factura->getestado()));
				$devolucion_factura->setid_asiento_Descripcion(devolucion_factura_util::getasientoDescripcion($devolucion_factura->getasiento()));
				$devolucion_factura->setid_documento_cuenta_cobrar_Descripcion(devolucion_factura_util::getdocumento_cuenta_cobrarDescripcion($devolucion_factura->getdocumento_cuenta_cobrar()));
				$devolucion_factura->setid_kardex_Descripcion(devolucion_factura_util::getkardexDescripcion($devolucion_factura->getkardex()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$devolucion_factura_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$devolucion_factura_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$devolucion_factura_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$devolucion_facturaForeignKey=new devolucion_factura_param_return();//devolucion_facturaForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombosclientesFK($this->connexion,$strRecargarFkQuery,$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_vendedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosvendedorsFK($this->connexion,$strRecargarFkQuery,$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_termino_pago_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombostermino_pago_clientesFK($this->connexion,$strRecargarFkQuery,$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_moneda',$strRecargarFkTipos,',')) {
				$this->cargarCombosmonedasFK($this->connexion,$strRecargarFkQuery,$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado',$strRecargarFkTipos,',')) {
				$this->cargarCombosestadosFK($this->connexion,$strRecargarFkQuery,$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_asiento',$strRecargarFkTipos,',')) {
				$this->cargarCombosasientosFK($this->connexion,$strRecargarFkQuery,$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_documento_cuenta_cobrar',$strRecargarFkTipos,',')) {
				$this->cargarCombosdocumento_cuenta_cobrarsFK($this->connexion,$strRecargarFkQuery,$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_kardex',$strRecargarFkTipos,',')) {
				$this->cargarComboskardexsFK($this->connexion,$strRecargarFkQuery,$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosclientesFK($this->connexion,' where id=-1 ',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_vendedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosvendedorsFK($this->connexion,' where id=-1 ',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_termino_pago_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostermino_pago_clientesFK($this->connexion,' where id=-1 ',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_moneda',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosmonedasFK($this->connexion,' where id=-1 ',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_estado',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosestadosFK($this->connexion,' where id=-1 ',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_asiento',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosasientosFK($this->connexion,' where id=-1 ',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_documento_cuenta_cobrar',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosdocumento_cuenta_cobrarsFK($this->connexion,' where id=-1 ',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_kardex',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboskardexsFK($this->connexion,' where id=-1 ',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $devolucion_facturaForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$devolucion_facturaForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		}
		
		if($devolucion_factura_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($devolucion_facturaForeignKey->idempresaDefaultFK==0) {
					$devolucion_facturaForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$devolucion_facturaForeignKey->empresasFK[$empresaLocal->getId()]=devolucion_factura_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($devolucion_factura_session->bigidempresaActual!=null && $devolucion_factura_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($devolucion_factura_session->bigidempresaActual);//WithConnection

				$devolucion_facturaForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=devolucion_factura_util::getempresaDescripcion($empresaLogic->getempresa());
				$devolucion_facturaForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$devolucion_facturaForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		}
		
		if($devolucion_factura_session->bitBusquedaDesdeFKSesionsucursal!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=sucursal_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalsucursal=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalsucursal=Funciones::GetFinalQueryAppend($finalQueryGlobalsucursal, '');
				$finalQueryGlobalsucursal.=sucursal_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalsucursal.$strRecargarFkQuery;		

				$sucursalLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($sucursalLogic->getsucursals() as $sucursalLocal ) {
				if($devolucion_facturaForeignKey->idsucursalDefaultFK==0) {
					$devolucion_facturaForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$devolucion_facturaForeignKey->sucursalsFK[$sucursalLocal->getId()]=devolucion_factura_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($devolucion_factura_session->bigidsucursalActual!=null && $devolucion_factura_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($devolucion_factura_session->bigidsucursalActual);//WithConnection

				$devolucion_facturaForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=devolucion_factura_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$devolucion_facturaForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$devolucion_facturaForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		}
		
		if($devolucion_factura_session->bitBusquedaDesdeFKSesionejercicio!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=ejercicio_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalejercicio=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalejercicio=Funciones::GetFinalQueryAppend($finalQueryGlobalejercicio, '');
				$finalQueryGlobalejercicio.=ejercicio_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalejercicio.$strRecargarFkQuery;		

				$ejercicioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($ejercicioLogic->getejercicios() as $ejercicioLocal ) {
				if($devolucion_facturaForeignKey->idejercicioDefaultFK==0) {
					$devolucion_facturaForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$devolucion_facturaForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=devolucion_factura_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($devolucion_factura_session->bigidejercicioActual!=null && $devolucion_factura_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($devolucion_factura_session->bigidejercicioActual);//WithConnection

				$devolucion_facturaForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=devolucion_factura_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$devolucion_facturaForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$devolucion_facturaForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		}
		
		if($devolucion_factura_session->bitBusquedaDesdeFKSesionperiodo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=periodo_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalperiodo=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalperiodo=Funciones::GetFinalQueryAppend($finalQueryGlobalperiodo, '');
				$finalQueryGlobalperiodo.=periodo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalperiodo.$strRecargarFkQuery;		

				$periodoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($periodoLogic->getperiodos() as $periodoLocal ) {
				if($devolucion_facturaForeignKey->idperiodoDefaultFK==0) {
					$devolucion_facturaForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$devolucion_facturaForeignKey->periodosFK[$periodoLocal->getId()]=devolucion_factura_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($devolucion_factura_session->bigidperiodoActual!=null && $devolucion_factura_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($devolucion_factura_session->bigidperiodoActual);//WithConnection

				$devolucion_facturaForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=devolucion_factura_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$devolucion_facturaForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$devolucion_facturaForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		}
		
		if($devolucion_factura_session->bitBusquedaDesdeFKSesionusuario!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=usuario_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalusuario=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalusuario=Funciones::GetFinalQueryAppend($finalQueryGlobalusuario, '');
				$finalQueryGlobalusuario.=usuario_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalusuario.$strRecargarFkQuery;		

				$usuarioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($usuarioLogic->getusuarios() as $usuarioLocal ) {
				if($devolucion_facturaForeignKey->idusuarioDefaultFK==0) {
					$devolucion_facturaForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$devolucion_facturaForeignKey->usuariosFK[$usuarioLocal->getId()]=devolucion_factura_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($devolucion_factura_session->bigidusuarioActual!=null && $devolucion_factura_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($devolucion_factura_session->bigidusuarioActual);//WithConnection

				$devolucion_facturaForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=devolucion_factura_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$devolucion_facturaForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosclientesFK($connexion=null,$strRecargarFkQuery='',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$clienteLogic= new cliente_logic();
		$pagination= new Pagination();
		$devolucion_facturaForeignKey->clientesFK=array();

		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		}
		
		if($devolucion_factura_session->bitBusquedaDesdeFKSesioncliente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cliente_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcliente=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcliente=Funciones::GetFinalQueryAppend($finalQueryGlobalcliente, '');
				$finalQueryGlobalcliente.=cliente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcliente.$strRecargarFkQuery;		

				$clienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($clienteLogic->getclientes() as $clienteLocal ) {
				if($devolucion_facturaForeignKey->idclienteDefaultFK==0) {
					$devolucion_facturaForeignKey->idclienteDefaultFK=$clienteLocal->getId();
				}

				$devolucion_facturaForeignKey->clientesFK[$clienteLocal->getId()]=devolucion_factura_util::getclienteDescripcion($clienteLocal);
			}

		} else {

			if($devolucion_factura_session->bigidclienteActual!=null && $devolucion_factura_session->bigidclienteActual > 0) {
				$clienteLogic->getEntity($devolucion_factura_session->bigidclienteActual);//WithConnection

				$devolucion_facturaForeignKey->clientesFK[$clienteLogic->getcliente()->getId()]=devolucion_factura_util::getclienteDescripcion($clienteLogic->getcliente());
				$devolucion_facturaForeignKey->idclienteDefaultFK=$clienteLogic->getcliente()->getId();
			}
		}
	}

	public function cargarCombosvendedorsFK($connexion=null,$strRecargarFkQuery='',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$vendedorLogic= new vendedor_logic();
		$pagination= new Pagination();
		$devolucion_facturaForeignKey->vendedorsFK=array();

		$vendedorLogic->setConnexion($connexion);
		$vendedorLogic->getvendedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		}
		
		if($devolucion_factura_session->bitBusquedaDesdeFKSesionvendedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=vendedor_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalvendedor=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalvendedor=Funciones::GetFinalQueryAppend($finalQueryGlobalvendedor, '');
				$finalQueryGlobalvendedor.=vendedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalvendedor.$strRecargarFkQuery;		

				$vendedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($vendedorLogic->getvendedors() as $vendedorLocal ) {
				if($devolucion_facturaForeignKey->idvendedorDefaultFK==0) {
					$devolucion_facturaForeignKey->idvendedorDefaultFK=$vendedorLocal->getId();
				}

				$devolucion_facturaForeignKey->vendedorsFK[$vendedorLocal->getId()]=devolucion_factura_util::getvendedorDescripcion($vendedorLocal);
			}

		} else {

			if($devolucion_factura_session->bigidvendedorActual!=null && $devolucion_factura_session->bigidvendedorActual > 0) {
				$vendedorLogic->getEntity($devolucion_factura_session->bigidvendedorActual);//WithConnection

				$devolucion_facturaForeignKey->vendedorsFK[$vendedorLogic->getvendedor()->getId()]=devolucion_factura_util::getvendedorDescripcion($vendedorLogic->getvendedor());
				$devolucion_facturaForeignKey->idvendedorDefaultFK=$vendedorLogic->getvendedor()->getId();
			}
		}
	}

	public function cargarCombostermino_pago_clientesFK($connexion=null,$strRecargarFkQuery='',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$termino_pago_clienteLogic= new termino_pago_cliente_logic();
		$pagination= new Pagination();
		$devolucion_facturaForeignKey->termino_pago_clientesFK=array();

		$termino_pago_clienteLogic->setConnexion($connexion);
		$termino_pago_clienteLogic->gettermino_pago_clienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		}
		
		if($devolucion_factura_session->bitBusquedaDesdeFKSesiontermino_pago_cliente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=termino_pago_cliente_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltermino_pago_cliente=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltermino_pago_cliente=Funciones::GetFinalQueryAppend($finalQueryGlobaltermino_pago_cliente, '');
				$finalQueryGlobaltermino_pago_cliente.=termino_pago_cliente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltermino_pago_cliente.$strRecargarFkQuery;		

				$termino_pago_clienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($termino_pago_clienteLogic->gettermino_pago_clientes() as $termino_pago_clienteLocal ) {
				if($devolucion_facturaForeignKey->idtermino_pago_clienteDefaultFK==0) {
					$devolucion_facturaForeignKey->idtermino_pago_clienteDefaultFK=$termino_pago_clienteLocal->getId();
				}

				$devolucion_facturaForeignKey->termino_pago_clientesFK[$termino_pago_clienteLocal->getId()]=devolucion_factura_util::gettermino_pago_clienteDescripcion($termino_pago_clienteLocal);
			}

		} else {

			if($devolucion_factura_session->bigidtermino_pago_clienteActual!=null && $devolucion_factura_session->bigidtermino_pago_clienteActual > 0) {
				$termino_pago_clienteLogic->getEntity($devolucion_factura_session->bigidtermino_pago_clienteActual);//WithConnection

				$devolucion_facturaForeignKey->termino_pago_clientesFK[$termino_pago_clienteLogic->gettermino_pago_cliente()->getId()]=devolucion_factura_util::gettermino_pago_clienteDescripcion($termino_pago_clienteLogic->gettermino_pago_cliente());
				$devolucion_facturaForeignKey->idtermino_pago_clienteDefaultFK=$termino_pago_clienteLogic->gettermino_pago_cliente()->getId();
			}
		}
	}

	public function cargarCombosmonedasFK($connexion=null,$strRecargarFkQuery='',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$monedaLogic= new moneda_logic();
		$pagination= new Pagination();
		$devolucion_facturaForeignKey->monedasFK=array();

		$monedaLogic->setConnexion($connexion);
		$monedaLogic->getmonedaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		}
		
		if($devolucion_factura_session->bitBusquedaDesdeFKSesionmoneda!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=moneda_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalmoneda=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalmoneda=Funciones::GetFinalQueryAppend($finalQueryGlobalmoneda, '');
				$finalQueryGlobalmoneda.=moneda_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalmoneda.$strRecargarFkQuery;		

				$monedaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($monedaLogic->getmonedas() as $monedaLocal ) {
				if($devolucion_facturaForeignKey->idmonedaDefaultFK==0) {
					$devolucion_facturaForeignKey->idmonedaDefaultFK=$monedaLocal->getId();
				}

				$devolucion_facturaForeignKey->monedasFK[$monedaLocal->getId()]=devolucion_factura_util::getmonedaDescripcion($monedaLocal);
			}

		} else {

			if($devolucion_factura_session->bigidmonedaActual!=null && $devolucion_factura_session->bigidmonedaActual > 0) {
				$monedaLogic->getEntity($devolucion_factura_session->bigidmonedaActual);//WithConnection

				$devolucion_facturaForeignKey->monedasFK[$monedaLogic->getmoneda()->getId()]=devolucion_factura_util::getmonedaDescripcion($monedaLogic->getmoneda());
				$devolucion_facturaForeignKey->idmonedaDefaultFK=$monedaLogic->getmoneda()->getId();
			}
		}
	}

	public function cargarCombosestadosFK($connexion=null,$strRecargarFkQuery='',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$estadoLogic= new estado_logic();
		$pagination= new Pagination();
		$devolucion_facturaForeignKey->estadosFK=array();

		$estadoLogic->setConnexion($connexion);
		$estadoLogic->getestadoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		}
		
		if($devolucion_factura_session->bitBusquedaDesdeFKSesionestado!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=estado_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalestado=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalestado=Funciones::GetFinalQueryAppend($finalQueryGlobalestado, '');
				$finalQueryGlobalestado.=estado_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalestado.$strRecargarFkQuery;		

				$estadoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($estadoLogic->getestados() as $estadoLocal ) {
				if($devolucion_facturaForeignKey->idestadoDefaultFK==0) {
					$devolucion_facturaForeignKey->idestadoDefaultFK=$estadoLocal->getId();
				}

				$devolucion_facturaForeignKey->estadosFK[$estadoLocal->getId()]=devolucion_factura_util::getestadoDescripcion($estadoLocal);
			}

		} else {

			if($devolucion_factura_session->bigidestadoActual!=null && $devolucion_factura_session->bigidestadoActual > 0) {
				$estadoLogic->getEntity($devolucion_factura_session->bigidestadoActual);//WithConnection

				$devolucion_facturaForeignKey->estadosFK[$estadoLogic->getestado()->getId()]=devolucion_factura_util::getestadoDescripcion($estadoLogic->getestado());
				$devolucion_facturaForeignKey->idestadoDefaultFK=$estadoLogic->getestado()->getId();
			}
		}
	}

	public function cargarCombosasientosFK($connexion=null,$strRecargarFkQuery='',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$asientoLogic= new asiento_logic();
		$pagination= new Pagination();
		$devolucion_facturaForeignKey->asientosFK=array();

		$asientoLogic->setConnexion($connexion);
		$asientoLogic->getasientoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		}
		
		if($devolucion_factura_session->bitBusquedaDesdeFKSesionasiento!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=asiento_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalasiento=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalasiento=Funciones::GetFinalQueryAppend($finalQueryGlobalasiento, '');
				$finalQueryGlobalasiento.=asiento_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalasiento.$strRecargarFkQuery;		

				$asientoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($asientoLogic->getasientos() as $asientoLocal ) {
				if($devolucion_facturaForeignKey->idasientoDefaultFK==0) {
					$devolucion_facturaForeignKey->idasientoDefaultFK=$asientoLocal->getId();
				}

				$devolucion_facturaForeignKey->asientosFK[$asientoLocal->getId()]=devolucion_factura_util::getasientoDescripcion($asientoLocal);
			}

		} else {

			if($devolucion_factura_session->bigidasientoActual!=null && $devolucion_factura_session->bigidasientoActual > 0) {
				$asientoLogic->getEntity($devolucion_factura_session->bigidasientoActual);//WithConnection

				$devolucion_facturaForeignKey->asientosFK[$asientoLogic->getasiento()->getId()]=devolucion_factura_util::getasientoDescripcion($asientoLogic->getasiento());
				$devolucion_facturaForeignKey->idasientoDefaultFK=$asientoLogic->getasiento()->getId();
			}
		}
	}

	public function cargarCombosdocumento_cuenta_cobrarsFK($connexion=null,$strRecargarFkQuery='',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic();
		$pagination= new Pagination();
		$devolucion_facturaForeignKey->documento_cuenta_cobrarsFK=array();

		$documento_cuenta_cobrarLogic->setConnexion($connexion);
		$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		}
		
		if($devolucion_factura_session->bitBusquedaDesdeFKSesiondocumento_cuenta_cobrar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=documento_cuenta_cobrar_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaldocumento_cuenta_cobrar=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaldocumento_cuenta_cobrar=Funciones::GetFinalQueryAppend($finalQueryGlobaldocumento_cuenta_cobrar, '');
				$finalQueryGlobaldocumento_cuenta_cobrar.=documento_cuenta_cobrar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaldocumento_cuenta_cobrar.$strRecargarFkQuery;		

				$documento_cuenta_cobrarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars() as $documento_cuenta_cobrarLocal ) {
				if($devolucion_facturaForeignKey->iddocumento_cuenta_cobrarDefaultFK==0) {
					$devolucion_facturaForeignKey->iddocumento_cuenta_cobrarDefaultFK=$documento_cuenta_cobrarLocal->getId();
				}

				$devolucion_facturaForeignKey->documento_cuenta_cobrarsFK[$documento_cuenta_cobrarLocal->getId()]=devolucion_factura_util::getdocumento_cuenta_cobrarDescripcion($documento_cuenta_cobrarLocal);
			}

		} else {

			if($devolucion_factura_session->bigiddocumento_cuenta_cobrarActual!=null && $devolucion_factura_session->bigiddocumento_cuenta_cobrarActual > 0) {
				$documento_cuenta_cobrarLogic->getEntity($devolucion_factura_session->bigiddocumento_cuenta_cobrarActual);//WithConnection

				$devolucion_facturaForeignKey->documento_cuenta_cobrarsFK[$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getId()]=devolucion_factura_util::getdocumento_cuenta_cobrarDescripcion($documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar());
				$devolucion_facturaForeignKey->iddocumento_cuenta_cobrarDefaultFK=$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getId();
			}
		}
	}

	public function cargarComboskardexsFK($connexion=null,$strRecargarFkQuery='',$devolucion_facturaForeignKey,$devolucion_factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$kardexLogic= new kardex_logic();
		$pagination= new Pagination();
		$devolucion_facturaForeignKey->kardexsFK=array();

		$kardexLogic->setConnexion($connexion);
		$kardexLogic->getkardexDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		}
		
		if($devolucion_factura_session->bitBusquedaDesdeFKSesionkardex!=true) {
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
				if($devolucion_facturaForeignKey->idkardexDefaultFK==0) {
					$devolucion_facturaForeignKey->idkardexDefaultFK=$kardexLocal->getId();
				}

				$devolucion_facturaForeignKey->kardexsFK[$kardexLocal->getId()]=devolucion_factura_util::getkardexDescripcion($kardexLocal);
			}

		} else {

			if($devolucion_factura_session->bigidkardexActual!=null && $devolucion_factura_session->bigidkardexActual > 0) {
				$kardexLogic->getEntity($devolucion_factura_session->bigidkardexActual);//WithConnection

				$devolucion_facturaForeignKey->kardexsFK[$kardexLogic->getkardex()->getId()]=devolucion_factura_util::getkardexDescripcion($kardexLogic->getkardex());
				$devolucion_facturaForeignKey->idkardexDefaultFK=$kardexLogic->getkardex()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($devolucion_factura,$devolucionfacturadetalles) {
		$this->saveRelacionesBase($devolucion_factura,$devolucionfacturadetalles,true);
	}

	public function saveRelaciones($devolucion_factura,$devolucionfacturadetalles) {
		$this->saveRelacionesBase($devolucion_factura,$devolucionfacturadetalles,false);
	}

	public function saveRelacionesBase($devolucion_factura,$devolucionfacturadetalles=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$devolucion_factura->setdevolucion_factura_detalles($devolucionfacturadetalles);
			$this->setdevolucion_factura($devolucion_factura);

			if(true) {

				//devolucion_factura_logic_add::updateRelacionesToSave($devolucion_factura,$this);

				if(($this->devolucion_factura->getIsNew() || $this->devolucion_factura->getIsChanged()) && !$this->devolucion_factura->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($devolucionfacturadetalles);

				} else if($this->devolucion_factura->getIsDeleted()) {
					$this->saveRelacionesDetalles($devolucionfacturadetalles);
					$this->save();
				}

				//devolucion_factura_logic_add::updateRelacionesToSaveAfter($devolucion_factura,$this);

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
	
	
	public function saveRelacionesDetalles($devolucionfacturadetalles=array()) {
		try {
	

			$iddevolucion_facturaActual=$this->getdevolucion_factura()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/devolucion_factura_detalle_carga.php');
			devolucion_factura_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$devolucionfacturadetalleLogic_Desde_devolucion_factura=new devolucion_factura_detalle_logic();
			$devolucionfacturadetalleLogic_Desde_devolucion_factura->setdevolucion_factura_detalles($devolucionfacturadetalles);

			$devolucionfacturadetalleLogic_Desde_devolucion_factura->setConnexion($this->getConnexion());
			$devolucionfacturadetalleLogic_Desde_devolucion_factura->setDatosCliente($this->datosCliente);

			foreach($devolucionfacturadetalleLogic_Desde_devolucion_factura->getdevolucion_factura_detalles() as $devolucionfacturadetalle_Desde_devolucion_factura) {
				$devolucionfacturadetalle_Desde_devolucion_factura->setid_devolucion_factura($iddevolucion_facturaActual);
			}

			$devolucionfacturadetalleLogic_Desde_devolucion_factura->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $devolucion_facturas,devolucion_factura_param_return $devolucion_facturaParameterGeneral) : devolucion_factura_param_return {
		$devolucion_facturaReturnGeneral=new devolucion_factura_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $devolucion_facturaReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $devolucion_facturas,devolucion_factura_param_return $devolucion_facturaParameterGeneral) : devolucion_factura_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$devolucion_facturaReturnGeneral=new devolucion_factura_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $devolucion_facturaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $devolucion_facturas,devolucion_factura $devolucion_factura,devolucion_factura_param_return $devolucion_facturaParameterGeneral,bool $isEsNuevodevolucion_factura,array $clases) : devolucion_factura_param_return {
		 try {	
			$devolucion_facturaReturnGeneral=new devolucion_factura_param_return();
	
			$devolucion_facturaReturnGeneral->setdevolucion_factura($devolucion_factura);
			$devolucion_facturaReturnGeneral->setdevolucion_facturas($devolucion_facturas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$devolucion_facturaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $devolucion_facturaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $devolucion_facturas,devolucion_factura $devolucion_factura,devolucion_factura_param_return $devolucion_facturaParameterGeneral,bool $isEsNuevodevolucion_factura,array $clases) : devolucion_factura_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$devolucion_facturaReturnGeneral=new devolucion_factura_param_return();
	
			$devolucion_facturaReturnGeneral->setdevolucion_factura($devolucion_factura);
			$devolucion_facturaReturnGeneral->setdevolucion_facturas($devolucion_facturas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$devolucion_facturaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $devolucion_facturaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $devolucion_facturas,devolucion_factura $devolucion_factura,devolucion_factura_param_return $devolucion_facturaParameterGeneral,bool $isEsNuevodevolucion_factura,array $clases) : devolucion_factura_param_return {
		 try {	
			$devolucion_facturaReturnGeneral=new devolucion_factura_param_return();
	
			$devolucion_facturaReturnGeneral->setdevolucion_factura($devolucion_factura);
			$devolucion_facturaReturnGeneral->setdevolucion_facturas($devolucion_facturas);
			
			
			
			return $devolucion_facturaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $devolucion_facturas,devolucion_factura $devolucion_factura,devolucion_factura_param_return $devolucion_facturaParameterGeneral,bool $isEsNuevodevolucion_factura,array $clases) : devolucion_factura_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$devolucion_facturaReturnGeneral=new devolucion_factura_param_return();
	
			$devolucion_facturaReturnGeneral->setdevolucion_factura($devolucion_factura);
			$devolucion_facturaReturnGeneral->setdevolucion_facturas($devolucion_facturas);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $devolucion_facturaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,devolucion_factura $devolucion_factura,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,devolucion_factura $devolucion_factura,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		devolucion_factura_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		devolucion_factura_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(devolucion_factura $devolucion_factura,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//devolucion_factura_logic_add::updatedevolucion_facturaToGet($this->devolucion_factura);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$devolucion_factura->setempresa($this->devolucion_facturaDataAccess->getempresa($this->connexion,$devolucion_factura));
		$devolucion_factura->setsucursal($this->devolucion_facturaDataAccess->getsucursal($this->connexion,$devolucion_factura));
		$devolucion_factura->setejercicio($this->devolucion_facturaDataAccess->getejercicio($this->connexion,$devolucion_factura));
		$devolucion_factura->setperiodo($this->devolucion_facturaDataAccess->getperiodo($this->connexion,$devolucion_factura));
		$devolucion_factura->setusuario($this->devolucion_facturaDataAccess->getusuario($this->connexion,$devolucion_factura));
		$devolucion_factura->setcliente($this->devolucion_facturaDataAccess->getcliente($this->connexion,$devolucion_factura));
		$devolucion_factura->setvendedor($this->devolucion_facturaDataAccess->getvendedor($this->connexion,$devolucion_factura));
		$devolucion_factura->settermino_pago_cliente($this->devolucion_facturaDataAccess->gettermino_pago_cliente($this->connexion,$devolucion_factura));
		$devolucion_factura->setmoneda($this->devolucion_facturaDataAccess->getmoneda($this->connexion,$devolucion_factura));
		$devolucion_factura->setestado($this->devolucion_facturaDataAccess->getestado($this->connexion,$devolucion_factura));
		$devolucion_factura->setasiento($this->devolucion_facturaDataAccess->getasiento($this->connexion,$devolucion_factura));
		$devolucion_factura->setdocumento_cuenta_cobrar($this->devolucion_facturaDataAccess->getdocumento_cuenta_cobrar($this->connexion,$devolucion_factura));
		$devolucion_factura->setkardex($this->devolucion_facturaDataAccess->getkardex($this->connexion,$devolucion_factura));
		$devolucion_factura->setdevolucion_factura_detalles($this->devolucion_facturaDataAccess->getdevolucion_factura_detalles($this->connexion,$devolucion_factura));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$devolucion_factura->setempresa($this->devolucion_facturaDataAccess->getempresa($this->connexion,$devolucion_factura));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$devolucion_factura->setsucursal($this->devolucion_facturaDataAccess->getsucursal($this->connexion,$devolucion_factura));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$devolucion_factura->setejercicio($this->devolucion_facturaDataAccess->getejercicio($this->connexion,$devolucion_factura));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$devolucion_factura->setperiodo($this->devolucion_facturaDataAccess->getperiodo($this->connexion,$devolucion_factura));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$devolucion_factura->setusuario($this->devolucion_facturaDataAccess->getusuario($this->connexion,$devolucion_factura));
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$devolucion_factura->setcliente($this->devolucion_facturaDataAccess->getcliente($this->connexion,$devolucion_factura));
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				$devolucion_factura->setvendedor($this->devolucion_facturaDataAccess->getvendedor($this->connexion,$devolucion_factura));
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				$devolucion_factura->settermino_pago_cliente($this->devolucion_facturaDataAccess->gettermino_pago_cliente($this->connexion,$devolucion_factura));
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				$devolucion_factura->setmoneda($this->devolucion_facturaDataAccess->getmoneda($this->connexion,$devolucion_factura));
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$devolucion_factura->setestado($this->devolucion_facturaDataAccess->getestado($this->connexion,$devolucion_factura));
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				$devolucion_factura->setasiento($this->devolucion_facturaDataAccess->getasiento($this->connexion,$devolucion_factura));
				continue;
			}

			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$devolucion_factura->setdocumento_cuenta_cobrar($this->devolucion_facturaDataAccess->getdocumento_cuenta_cobrar($this->connexion,$devolucion_factura));
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				$devolucion_factura->setkardex($this->devolucion_facturaDataAccess->getkardex($this->connexion,$devolucion_factura));
				continue;
			}

			if($clas->clas==devolucion_factura_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$devolucion_factura->setdevolucion_factura_detalles($this->devolucion_facturaDataAccess->getdevolucion_factura_detalles($this->connexion,$devolucion_factura));

				if($this->isConDeep) {
					$devolucionfacturadetalleLogic= new devolucion_factura_detalle_logic($this->connexion);
					$devolucionfacturadetalleLogic->setdevolucion_factura_detalles($devolucion_factura->getdevolucion_factura_detalles());
					$classesLocal=devolucion_factura_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$devolucionfacturadetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					devolucion_factura_detalle_util::refrescarFKDescripciones($devolucionfacturadetalleLogic->getdevolucion_factura_detalles());
					$devolucion_factura->setdevolucion_factura_detalles($devolucionfacturadetalleLogic->getdevolucion_factura_detalles());
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
			$devolucion_factura->setempresa($this->devolucion_facturaDataAccess->getempresa($this->connexion,$devolucion_factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setsucursal($this->devolucion_facturaDataAccess->getsucursal($this->connexion,$devolucion_factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setejercicio($this->devolucion_facturaDataAccess->getejercicio($this->connexion,$devolucion_factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setperiodo($this->devolucion_facturaDataAccess->getperiodo($this->connexion,$devolucion_factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setusuario($this->devolucion_facturaDataAccess->getusuario($this->connexion,$devolucion_factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setcliente($this->devolucion_facturaDataAccess->getcliente($this->connexion,$devolucion_factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setvendedor($this->devolucion_facturaDataAccess->getvendedor($this->connexion,$devolucion_factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->settermino_pago_cliente($this->devolucion_facturaDataAccess->gettermino_pago_cliente($this->connexion,$devolucion_factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setmoneda($this->devolucion_facturaDataAccess->getmoneda($this->connexion,$devolucion_factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setestado($this->devolucion_facturaDataAccess->getestado($this->connexion,$devolucion_factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setasiento($this->devolucion_facturaDataAccess->getasiento($this->connexion,$devolucion_factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setdocumento_cuenta_cobrar($this->devolucion_facturaDataAccess->getdocumento_cuenta_cobrar($this->connexion,$devolucion_factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setkardex($this->devolucion_facturaDataAccess->getkardex($this->connexion,$devolucion_factura));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion_factura_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion_factura_detalle::$class);
			$devolucion_factura->setdevolucion_factura_detalles($this->devolucion_facturaDataAccess->getdevolucion_factura_detalles($this->connexion,$devolucion_factura));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$devolucion_factura->setempresa($this->devolucion_facturaDataAccess->getempresa($this->connexion,$devolucion_factura));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($devolucion_factura->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$devolucion_factura->setsucursal($this->devolucion_facturaDataAccess->getsucursal($this->connexion,$devolucion_factura));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($devolucion_factura->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$devolucion_factura->setejercicio($this->devolucion_facturaDataAccess->getejercicio($this->connexion,$devolucion_factura));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($devolucion_factura->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$devolucion_factura->setperiodo($this->devolucion_facturaDataAccess->getperiodo($this->connexion,$devolucion_factura));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($devolucion_factura->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$devolucion_factura->setusuario($this->devolucion_facturaDataAccess->getusuario($this->connexion,$devolucion_factura));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($devolucion_factura->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$devolucion_factura->setcliente($this->devolucion_facturaDataAccess->getcliente($this->connexion,$devolucion_factura));
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepLoad($devolucion_factura->getcliente(),$isDeep,$deepLoadType,$clases);
				
		$devolucion_factura->setvendedor($this->devolucion_facturaDataAccess->getvendedor($this->connexion,$devolucion_factura));
		$vendedorLogic= new vendedor_logic($this->connexion);
		$vendedorLogic->deepLoad($devolucion_factura->getvendedor(),$isDeep,$deepLoadType,$clases);
				
		$devolucion_factura->settermino_pago_cliente($this->devolucion_facturaDataAccess->gettermino_pago_cliente($this->connexion,$devolucion_factura));
		$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
		$termino_pago_clienteLogic->deepLoad($devolucion_factura->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases);
				
		$devolucion_factura->setmoneda($this->devolucion_facturaDataAccess->getmoneda($this->connexion,$devolucion_factura));
		$monedaLogic= new moneda_logic($this->connexion);
		$monedaLogic->deepLoad($devolucion_factura->getmoneda(),$isDeep,$deepLoadType,$clases);
				
		$devolucion_factura->setestado($this->devolucion_facturaDataAccess->getestado($this->connexion,$devolucion_factura));
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepLoad($devolucion_factura->getestado(),$isDeep,$deepLoadType,$clases);
				
		$devolucion_factura->setasiento($this->devolucion_facturaDataAccess->getasiento($this->connexion,$devolucion_factura));
		$asientoLogic= new asiento_logic($this->connexion);
		$asientoLogic->deepLoad($devolucion_factura->getasiento(),$isDeep,$deepLoadType,$clases);
				
		$devolucion_factura->setdocumento_cuenta_cobrar($this->devolucion_facturaDataAccess->getdocumento_cuenta_cobrar($this->connexion,$devolucion_factura));
		$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
		$documento_cuenta_cobrarLogic->deepLoad($devolucion_factura->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases);
				
		$devolucion_factura->setkardex($this->devolucion_facturaDataAccess->getkardex($this->connexion,$devolucion_factura));
		$kardexLogic= new kardex_logic($this->connexion);
		$kardexLogic->deepLoad($devolucion_factura->getkardex(),$isDeep,$deepLoadType,$clases);
				

		$devolucion_factura->setdevolucion_factura_detalles($this->devolucion_facturaDataAccess->getdevolucion_factura_detalles($this->connexion,$devolucion_factura));

		foreach($devolucion_factura->getdevolucion_factura_detalles() as $devolucionfacturadetalle) {
			$devolucionfacturadetalleLogic= new devolucion_factura_detalle_logic($this->connexion);
			$devolucionfacturadetalleLogic->deepLoad($devolucionfacturadetalle,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$devolucion_factura->setempresa($this->devolucion_facturaDataAccess->getempresa($this->connexion,$devolucion_factura));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($devolucion_factura->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$devolucion_factura->setsucursal($this->devolucion_facturaDataAccess->getsucursal($this->connexion,$devolucion_factura));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($devolucion_factura->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$devolucion_factura->setejercicio($this->devolucion_facturaDataAccess->getejercicio($this->connexion,$devolucion_factura));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($devolucion_factura->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$devolucion_factura->setperiodo($this->devolucion_facturaDataAccess->getperiodo($this->connexion,$devolucion_factura));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($devolucion_factura->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$devolucion_factura->setusuario($this->devolucion_facturaDataAccess->getusuario($this->connexion,$devolucion_factura));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($devolucion_factura->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$devolucion_factura->setcliente($this->devolucion_facturaDataAccess->getcliente($this->connexion,$devolucion_factura));
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($devolucion_factura->getcliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				$devolucion_factura->setvendedor($this->devolucion_facturaDataAccess->getvendedor($this->connexion,$devolucion_factura));
				$vendedorLogic= new vendedor_logic($this->connexion);
				$vendedorLogic->deepLoad($devolucion_factura->getvendedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				$devolucion_factura->settermino_pago_cliente($this->devolucion_facturaDataAccess->gettermino_pago_cliente($this->connexion,$devolucion_factura));
				$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
				$termino_pago_clienteLogic->deepLoad($devolucion_factura->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				$devolucion_factura->setmoneda($this->devolucion_facturaDataAccess->getmoneda($this->connexion,$devolucion_factura));
				$monedaLogic= new moneda_logic($this->connexion);
				$monedaLogic->deepLoad($devolucion_factura->getmoneda(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$devolucion_factura->setestado($this->devolucion_facturaDataAccess->getestado($this->connexion,$devolucion_factura));
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepLoad($devolucion_factura->getestado(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				$devolucion_factura->setasiento($this->devolucion_facturaDataAccess->getasiento($this->connexion,$devolucion_factura));
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepLoad($devolucion_factura->getasiento(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$devolucion_factura->setdocumento_cuenta_cobrar($this->devolucion_facturaDataAccess->getdocumento_cuenta_cobrar($this->connexion,$devolucion_factura));
				$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
				$documento_cuenta_cobrarLogic->deepLoad($devolucion_factura->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				$devolucion_factura->setkardex($this->devolucion_facturaDataAccess->getkardex($this->connexion,$devolucion_factura));
				$kardexLogic= new kardex_logic($this->connexion);
				$kardexLogic->deepLoad($devolucion_factura->getkardex(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==devolucion_factura_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$devolucion_factura->setdevolucion_factura_detalles($this->devolucion_facturaDataAccess->getdevolucion_factura_detalles($this->connexion,$devolucion_factura));

				foreach($devolucion_factura->getdevolucion_factura_detalles() as $devolucionfacturadetalle) {
					$devolucionfacturadetalleLogic= new devolucion_factura_detalle_logic($this->connexion);
					$devolucionfacturadetalleLogic->deepLoad($devolucionfacturadetalle,$isDeep,$deepLoadType,$clases);
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
			$devolucion_factura->setempresa($this->devolucion_facturaDataAccess->getempresa($this->connexion,$devolucion_factura));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($devolucion_factura->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setsucursal($this->devolucion_facturaDataAccess->getsucursal($this->connexion,$devolucion_factura));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($devolucion_factura->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setejercicio($this->devolucion_facturaDataAccess->getejercicio($this->connexion,$devolucion_factura));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($devolucion_factura->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setperiodo($this->devolucion_facturaDataAccess->getperiodo($this->connexion,$devolucion_factura));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($devolucion_factura->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setusuario($this->devolucion_facturaDataAccess->getusuario($this->connexion,$devolucion_factura));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($devolucion_factura->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setcliente($this->devolucion_facturaDataAccess->getcliente($this->connexion,$devolucion_factura));
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($devolucion_factura->getcliente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setvendedor($this->devolucion_facturaDataAccess->getvendedor($this->connexion,$devolucion_factura));
			$vendedorLogic= new vendedor_logic($this->connexion);
			$vendedorLogic->deepLoad($devolucion_factura->getvendedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->settermino_pago_cliente($this->devolucion_facturaDataAccess->gettermino_pago_cliente($this->connexion,$devolucion_factura));
			$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
			$termino_pago_clienteLogic->deepLoad($devolucion_factura->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setmoneda($this->devolucion_facturaDataAccess->getmoneda($this->connexion,$devolucion_factura));
			$monedaLogic= new moneda_logic($this->connexion);
			$monedaLogic->deepLoad($devolucion_factura->getmoneda(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setestado($this->devolucion_facturaDataAccess->getestado($this->connexion,$devolucion_factura));
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepLoad($devolucion_factura->getestado(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setasiento($this->devolucion_facturaDataAccess->getasiento($this->connexion,$devolucion_factura));
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepLoad($devolucion_factura->getasiento(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setdocumento_cuenta_cobrar($this->devolucion_facturaDataAccess->getdocumento_cuenta_cobrar($this->connexion,$devolucion_factura));
			$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
			$documento_cuenta_cobrarLogic->deepLoad($devolucion_factura->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion_factura->setkardex($this->devolucion_facturaDataAccess->getkardex($this->connexion,$devolucion_factura));
			$kardexLogic= new kardex_logic($this->connexion);
			$kardexLogic->deepLoad($devolucion_factura->getkardex(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion_factura_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion_factura_detalle::$class);
			$devolucion_factura->setdevolucion_factura_detalles($this->devolucion_facturaDataAccess->getdevolucion_factura_detalles($this->connexion,$devolucion_factura));

			foreach($devolucion_factura->getdevolucion_factura_detalles() as $devolucionfacturadetalle) {
				$devolucionfacturadetalleLogic= new devolucion_factura_detalle_logic($this->connexion);
				$devolucionfacturadetalleLogic->deepLoad($devolucionfacturadetalle,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(devolucion_factura $devolucion_factura,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//devolucion_factura_logic_add::updatedevolucion_facturaToSave($this->devolucion_factura);			
			
			if(!$paraDeleteCascade) {				
				devolucion_factura_data::save($devolucion_factura, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($devolucion_factura->getempresa(),$this->connexion);
		sucursal_data::save($devolucion_factura->getsucursal(),$this->connexion);
		ejercicio_data::save($devolucion_factura->getejercicio(),$this->connexion);
		periodo_data::save($devolucion_factura->getperiodo(),$this->connexion);
		usuario_data::save($devolucion_factura->getusuario(),$this->connexion);
		cliente_data::save($devolucion_factura->getcliente(),$this->connexion);
		vendedor_data::save($devolucion_factura->getvendedor(),$this->connexion);
		termino_pago_cliente_data::save($devolucion_factura->gettermino_pago_cliente(),$this->connexion);
		moneda_data::save($devolucion_factura->getmoneda(),$this->connexion);
		estado_data::save($devolucion_factura->getestado(),$this->connexion);
		asiento_data::save($devolucion_factura->getasiento(),$this->connexion);
		documento_cuenta_cobrar_data::save($devolucion_factura->getdocumento_cuenta_cobrar(),$this->connexion);
		kardex_data::save($devolucion_factura->getkardex(),$this->connexion);

		foreach($devolucion_factura->getdevolucion_factura_detalles() as $devolucionfacturadetalle) {
			$devolucionfacturadetalle->setid_devolucion_factura($devolucion_factura->getId());
			devolucion_factura_detalle_data::save($devolucionfacturadetalle,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($devolucion_factura->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($devolucion_factura->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($devolucion_factura->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($devolucion_factura->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($devolucion_factura->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($devolucion_factura->getcliente(),$this->connexion);
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				vendedor_data::save($devolucion_factura->getvendedor(),$this->connexion);
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				termino_pago_cliente_data::save($devolucion_factura->gettermino_pago_cliente(),$this->connexion);
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				moneda_data::save($devolucion_factura->getmoneda(),$this->connexion);
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($devolucion_factura->getestado(),$this->connexion);
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				asiento_data::save($devolucion_factura->getasiento(),$this->connexion);
				continue;
			}

			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				documento_cuenta_cobrar_data::save($devolucion_factura->getdocumento_cuenta_cobrar(),$this->connexion);
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				kardex_data::save($devolucion_factura->getkardex(),$this->connexion);
				continue;
			}


			if($clas->clas==devolucion_factura_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($devolucion_factura->getdevolucion_factura_detalles() as $devolucionfacturadetalle) {
					$devolucionfacturadetalle->setid_devolucion_factura($devolucion_factura->getId());
					devolucion_factura_detalle_data::save($devolucionfacturadetalle,$this->connexion);
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
			empresa_data::save($devolucion_factura->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($devolucion_factura->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($devolucion_factura->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($devolucion_factura->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($devolucion_factura->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($devolucion_factura->getcliente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			vendedor_data::save($devolucion_factura->getvendedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_cliente_data::save($devolucion_factura->gettermino_pago_cliente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			moneda_data::save($devolucion_factura->getmoneda(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($devolucion_factura->getestado(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_data::save($devolucion_factura->getasiento(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_cuenta_cobrar_data::save($devolucion_factura->getdocumento_cuenta_cobrar(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			kardex_data::save($devolucion_factura->getkardex(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion_factura_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion_factura_detalle::$class);

			foreach($devolucion_factura->getdevolucion_factura_detalles() as $devolucionfacturadetalle) {
				$devolucionfacturadetalle->setid_devolucion_factura($devolucion_factura->getId());
				devolucion_factura_detalle_data::save($devolucionfacturadetalle,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($devolucion_factura->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($devolucion_factura->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($devolucion_factura->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($devolucion_factura->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($devolucion_factura->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($devolucion_factura->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($devolucion_factura->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($devolucion_factura->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($devolucion_factura->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($devolucion_factura->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cliente_data::save($devolucion_factura->getcliente(),$this->connexion);
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepSave($devolucion_factura->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		vendedor_data::save($devolucion_factura->getvendedor(),$this->connexion);
		$vendedorLogic= new vendedor_logic($this->connexion);
		$vendedorLogic->deepSave($devolucion_factura->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		termino_pago_cliente_data::save($devolucion_factura->gettermino_pago_cliente(),$this->connexion);
		$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
		$termino_pago_clienteLogic->deepSave($devolucion_factura->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		moneda_data::save($devolucion_factura->getmoneda(),$this->connexion);
		$monedaLogic= new moneda_logic($this->connexion);
		$monedaLogic->deepSave($devolucion_factura->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		estado_data::save($devolucion_factura->getestado(),$this->connexion);
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepSave($devolucion_factura->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		asiento_data::save($devolucion_factura->getasiento(),$this->connexion);
		$asientoLogic= new asiento_logic($this->connexion);
		$asientoLogic->deepSave($devolucion_factura->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		documento_cuenta_cobrar_data::save($devolucion_factura->getdocumento_cuenta_cobrar(),$this->connexion);
		$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
		$documento_cuenta_cobrarLogic->deepSave($devolucion_factura->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		kardex_data::save($devolucion_factura->getkardex(),$this->connexion);
		$kardexLogic= new kardex_logic($this->connexion);
		$kardexLogic->deepSave($devolucion_factura->getkardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($devolucion_factura->getdevolucion_factura_detalles() as $devolucionfacturadetalle) {
			$devolucionfacturadetalleLogic= new devolucion_factura_detalle_logic($this->connexion);
			$devolucionfacturadetalle->setid_devolucion_factura($devolucion_factura->getId());
			devolucion_factura_detalle_data::save($devolucionfacturadetalle,$this->connexion);
			$devolucionfacturadetalleLogic->deepSave($devolucionfacturadetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($devolucion_factura->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($devolucion_factura->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($devolucion_factura->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($devolucion_factura->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($devolucion_factura->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($devolucion_factura->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($devolucion_factura->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($devolucion_factura->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($devolucion_factura->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($devolucion_factura->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($devolucion_factura->getcliente(),$this->connexion);
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepSave($devolucion_factura->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				vendedor_data::save($devolucion_factura->getvendedor(),$this->connexion);
				$vendedorLogic= new vendedor_logic($this->connexion);
				$vendedorLogic->deepSave($devolucion_factura->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				termino_pago_cliente_data::save($devolucion_factura->gettermino_pago_cliente(),$this->connexion);
				$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
				$termino_pago_clienteLogic->deepSave($devolucion_factura->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				moneda_data::save($devolucion_factura->getmoneda(),$this->connexion);
				$monedaLogic= new moneda_logic($this->connexion);
				$monedaLogic->deepSave($devolucion_factura->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($devolucion_factura->getestado(),$this->connexion);
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepSave($devolucion_factura->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				asiento_data::save($devolucion_factura->getasiento(),$this->connexion);
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepSave($devolucion_factura->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				documento_cuenta_cobrar_data::save($devolucion_factura->getdocumento_cuenta_cobrar(),$this->connexion);
				$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
				$documento_cuenta_cobrarLogic->deepSave($devolucion_factura->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				kardex_data::save($devolucion_factura->getkardex(),$this->connexion);
				$kardexLogic= new kardex_logic($this->connexion);
				$kardexLogic->deepSave($devolucion_factura->getkardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==devolucion_factura_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($devolucion_factura->getdevolucion_factura_detalles() as $devolucionfacturadetalle) {
					$devolucionfacturadetalleLogic= new devolucion_factura_detalle_logic($this->connexion);
					$devolucionfacturadetalle->setid_devolucion_factura($devolucion_factura->getId());
					devolucion_factura_detalle_data::save($devolucionfacturadetalle,$this->connexion);
					$devolucionfacturadetalleLogic->deepSave($devolucionfacturadetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($devolucion_factura->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($devolucion_factura->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($devolucion_factura->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($devolucion_factura->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($devolucion_factura->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($devolucion_factura->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($devolucion_factura->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($devolucion_factura->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($devolucion_factura->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($devolucion_factura->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($devolucion_factura->getcliente(),$this->connexion);
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepSave($devolucion_factura->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			vendedor_data::save($devolucion_factura->getvendedor(),$this->connexion);
			$vendedorLogic= new vendedor_logic($this->connexion);
			$vendedorLogic->deepSave($devolucion_factura->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_cliente_data::save($devolucion_factura->gettermino_pago_cliente(),$this->connexion);
			$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
			$termino_pago_clienteLogic->deepSave($devolucion_factura->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			moneda_data::save($devolucion_factura->getmoneda(),$this->connexion);
			$monedaLogic= new moneda_logic($this->connexion);
			$monedaLogic->deepSave($devolucion_factura->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($devolucion_factura->getestado(),$this->connexion);
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepSave($devolucion_factura->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_data::save($devolucion_factura->getasiento(),$this->connexion);
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepSave($devolucion_factura->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_cuenta_cobrar_data::save($devolucion_factura->getdocumento_cuenta_cobrar(),$this->connexion);
			$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
			$documento_cuenta_cobrarLogic->deepSave($devolucion_factura->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			kardex_data::save($devolucion_factura->getkardex(),$this->connexion);
			$kardexLogic= new kardex_logic($this->connexion);
			$kardexLogic->deepSave($devolucion_factura->getkardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion_factura_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion_factura_detalle::$class);

			foreach($devolucion_factura->getdevolucion_factura_detalles() as $devolucionfacturadetalle) {
				$devolucionfacturadetalleLogic= new devolucion_factura_detalle_logic($this->connexion);
				$devolucionfacturadetalle->setid_devolucion_factura($devolucion_factura->getId());
				devolucion_factura_detalle_data::save($devolucionfacturadetalle,$this->connexion);
				$devolucionfacturadetalleLogic->deepSave($devolucionfacturadetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				devolucion_factura_data::save($devolucion_factura, $this->connexion);
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
			
			$this->deepLoad($this->devolucion_factura,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->devolucion_facturas as $devolucion_factura) {
				$this->deepLoad($devolucion_factura,$isDeep,$deepLoadType,$clases);
								
				devolucion_factura_util::refrescarFKDescripciones($this->devolucion_facturas);
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
			
			foreach($this->devolucion_facturas as $devolucion_factura) {
				$this->deepLoad($devolucion_factura,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->devolucion_factura,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->devolucion_facturas as $devolucion_factura) {
				$this->deepSave($devolucion_factura,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->devolucion_facturas as $devolucion_factura) {
				$this->deepSave($devolucion_factura,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(sucursal::$class);
				$classes[]=new Classe(ejercicio::$class);
				$classes[]=new Classe(periodo::$class);
				$classes[]=new Classe(usuario::$class);
				$classes[]=new Classe(cliente::$class);
				$classes[]=new Classe(vendedor::$class);
				$classes[]=new Classe(termino_pago_cliente::$class);
				$classes[]=new Classe(moneda::$class);
				$classes[]=new Classe(estado::$class);
				$classes[]=new Classe(asiento::$class);
				$classes[]=new Classe(documento_cuenta_cobrar::$class);
				$classes[]=new Classe(kardex::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==sucursal::$class) {
						$classes[]=new Classe(sucursal::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==ejercicio::$class) {
						$classes[]=new Classe(ejercicio::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==periodo::$class) {
						$classes[]=new Classe(periodo::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==usuario::$class) {
						$classes[]=new Classe(usuario::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==vendedor::$class) {
						$classes[]=new Classe(vendedor::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==termino_pago_cliente::$class) {
						$classes[]=new Classe(termino_pago_cliente::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==moneda::$class) {
						$classes[]=new Classe(moneda::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==estado::$class) {
						$classes[]=new Classe(estado::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==asiento::$class) {
						$classes[]=new Classe(asiento::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==documento_cuenta_cobrar::$class) {
						$classes[]=new Classe(documento_cuenta_cobrar::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==kardex::$class) {
						$classes[]=new Classe(kardex::$class);
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
					if($clas->clas==sucursal::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(sucursal::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==ejercicio::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(ejercicio::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==periodo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(periodo::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(usuario::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cliente::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==vendedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(vendedor::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==termino_pago_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(termino_pago_cliente::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==moneda::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(moneda::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==estado::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(estado::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==asiento::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==documento_cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(documento_cuenta_cobrar::$class);
				}

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
				
				$classes[]=new Classe(devolucion_factura_detalle::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==devolucion_factura_detalle::$class) {
						$classes[]=new Classe(devolucion_factura_detalle::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==devolucion_factura_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(devolucion_factura_detalle::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getdevolucion_factura() : ?devolucion_factura {	
		/*
		devolucion_factura_logic_add::checkdevolucion_facturaToGet($this->devolucion_factura,$this->datosCliente);
		devolucion_factura_logic_add::updatedevolucion_facturaToGet($this->devolucion_factura);
		*/
			
		return $this->devolucion_factura;
	}
		
	public function setdevolucion_factura(devolucion_factura $newdevolucion_factura) {
		$this->devolucion_factura = $newdevolucion_factura;
	}
	
	public function getdevolucion_facturas() : array {		
		/*
		devolucion_factura_logic_add::checkdevolucion_facturaToGets($this->devolucion_facturas,$this->datosCliente);
		
		foreach ($this->devolucion_facturas as $devolucion_facturaLocal ) {
			devolucion_factura_logic_add::updatedevolucion_facturaToGet($devolucion_facturaLocal);
		}
		*/
		
		return $this->devolucion_facturas;
	}
	
	public function setdevolucion_facturas(array $newdevolucion_facturas) {
		$this->devolucion_facturas = $newdevolucion_facturas;
	}
	
	public function getdevolucion_facturaDataAccess() : devolucion_factura_data {
		return $this->devolucion_facturaDataAccess;
	}
	
	public function setdevolucion_facturaDataAccess(devolucion_factura_data $newdevolucion_facturaDataAccess) {
		$this->devolucion_facturaDataAccess = $newdevolucion_facturaDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        devolucion_factura_carga::$CONTROLLER;;        
		
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
