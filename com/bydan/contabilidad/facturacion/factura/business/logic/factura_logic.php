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

namespace com\bydan\contabilidad\facturacion\factura\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
use com\bydan\contabilidad\facturacion\factura\util\factura_param_return;

use com\bydan\contabilidad\facturacion\factura\presentation\session\factura_session;

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

use com\bydan\contabilidad\facturacion\factura\util\factura_util;
use com\bydan\contabilidad\facturacion\factura\business\entity\factura;
use com\bydan\contabilidad\facturacion\factura\business\data\factura_data;

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

use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;
use com\bydan\contabilidad\contabilidad\moneda\business\data\moneda_data;
use com\bydan\contabilidad\contabilidad\moneda\business\logic\moneda_logic;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_util;

use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\business\data\vendedor_data;
use com\bydan\contabilidad\facturacion\vendedor\business\logic\vendedor_logic;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\data\termino_pago_cliente_data;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

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


use com\bydan\contabilidad\facturacion\factura_detalle\business\entity\factura_detalle;
use com\bydan\contabilidad\facturacion\factura_detalle\business\data\factura_detalle_data;
use com\bydan\contabilidad\facturacion\factura_detalle\business\logic\factura_detalle_logic;
use com\bydan\contabilidad\facturacion\factura_detalle\util\factura_detalle_carga;
use com\bydan\contabilidad\facturacion\factura_detalle\util\factura_detalle_util;

//REL DETALLES




class factura_logic  extends GeneralEntityLogic implements factura_logicI {	
	/*GENERAL*/
	public factura_data $facturaDataAccess;
	//public ?factura_logic_add $facturaLogicAdditional=null;
	public ?factura $factura;
	public array $facturas;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->facturaDataAccess = new factura_data();			
			$this->facturas = array();
			$this->factura = new factura();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->facturaLogicAdditional = new factura_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->facturaLogicAdditional==null) {
		//	$this->facturaLogicAdditional=new factura_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->facturaDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->facturaDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->facturaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->facturaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->facturas = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_util::refrescarFKDescripciones($this->facturas);
			}
			
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->facturas);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->facturas = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_util::refrescarFKDescripciones($this->facturas);
			}
			
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->facturas);
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
		$this->factura = new factura();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->factura=$this->facturaDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				factura_util::refrescarFKDescripcion($this->factura);
			}
						
			//factura_logic_add::checkfacturaToGet($this->factura,$this->datosCliente);
			//factura_logic_add::updatefacturaToGet($this->factura);
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
		$this->factura = new  factura();
		  		  
        try {		
			$this->factura=$this->facturaDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				factura_util::refrescarFKDescripcion($this->factura);
			}
			
			//factura_logic_add::checkfacturaToGet($this->factura,$this->datosCliente);
			//factura_logic_add::updatefacturaToGet($this->factura);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?factura {
		$facturaLogic = new  factura_logic();
		  		  
        try {		
			$facturaLogic->setConnexion($connexion);			
			$facturaLogic->getEntity($id);			
			return $facturaLogic->getfactura();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->factura = new  factura();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->factura=$this->facturaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				factura_util::refrescarFKDescripcion($this->factura);
			}
			
			//factura_logic_add::checkfacturaToGet($this->factura,$this->datosCliente);
			//factura_logic_add::updatefacturaToGet($this->factura);
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
		$this->factura = new  factura();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->factura=$this->facturaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				factura_util::refrescarFKDescripcion($this->factura);
			}
			
			//factura_logic_add::checkfacturaToGet($this->factura,$this->datosCliente);
			//factura_logic_add::updatefacturaToGet($this->factura);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?factura {
		$facturaLogic = new  factura_logic();
		  		  
        try {		
			$facturaLogic->setConnexion($connexion);			
			$facturaLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $facturaLogic->getfactura();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->facturas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_util::refrescarFKDescripciones($this->facturas);
			}
			
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->facturas);			
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
		$this->facturas = array();
		  		  
        try {			
			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_util::refrescarFKDescripciones($this->facturas);
			}
			
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->facturas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->facturas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_util::refrescarFKDescripciones($this->facturas);
			}
			
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->facturas);
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
		$this->facturas = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_util::refrescarFKDescripciones($this->facturas);
			}
			
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->facturas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$facturaLogic = new  factura_logic();
		  		  
        try {		
			$facturaLogic->setConnexion($connexion);			
			$facturaLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $facturaLogic->getfacturas();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->facturas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->facturas=$this->facturaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_util::refrescarFKDescripciones($this->facturas);
			}
			
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->facturas);
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
		$this->facturas = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->facturas=$this->facturaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_util::refrescarFKDescripciones($this->facturas);
			}
			
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->facturas);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->facturas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->facturas=$this->facturaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_util::refrescarFKDescripciones($this->facturas);
			}
			
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->facturas);
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
		$this->facturas = array();
		  		  
        try {			
			$this->facturas=$this->facturaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_util::refrescarFKDescripciones($this->facturas);
			}	
			
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->facturas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->facturas = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->facturas=$this->facturaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_util::refrescarFKDescripciones($this->facturas);
			}
			
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->facturas);
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
		$this->facturas = array();
		  		  
        try {		
			$this->facturas=$this->facturaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_util::refrescarFKDescripciones($this->facturas);
			}
			
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->facturas);

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
			$parameterSelectionGeneralid_asiento->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento,factura_util::$ID_ASIENTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);

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
			$parameterSelectionGeneralid_asiento->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento,factura_util::$ID_ASIENTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);
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
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,factura_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);

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
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,factura_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);
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
			$parameterSelectionGeneralid_documento_cuenta_cobrar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_cuenta_cobrar,factura_util::$ID_DOCUMENTO_CUENTA_COBRAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_cuenta_cobrar);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);

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
			$parameterSelectionGeneralid_documento_cuenta_cobrar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_cuenta_cobrar,factura_util::$ID_DOCUMENTO_CUENTA_COBRAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_cuenta_cobrar);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);
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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,factura_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,factura_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,factura_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,factura_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);
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
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,factura_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);

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
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,factura_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);
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
			$parameterSelectionGeneralid_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_kardex,factura_util::$ID_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_kardex);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);

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
			$parameterSelectionGeneralid_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_kardex,factura_util::$ID_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_kardex);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);
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
			$parameterSelectionGeneralid_moneda->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_moneda,factura_util::$ID_MONEDA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_moneda);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);

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
			$parameterSelectionGeneralid_moneda->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_moneda,factura_util::$ID_MONEDA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_moneda);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);
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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,factura_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);

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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,factura_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);
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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,factura_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);

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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,factura_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);
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
			$parameterSelectionGeneralid_termino_pago_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_cliente,factura_util::$ID_TERMINO_PAGO_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_cliente);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);

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
			$parameterSelectionGeneralid_termino_pago_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_cliente,factura_util::$ID_TERMINO_PAGO_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_cliente);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,factura_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,factura_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);
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
			$parameterSelectionGeneralid_vendedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_vendedor,factura_util::$ID_VENDEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_vendedor);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);

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
			$parameterSelectionGeneralid_vendedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_vendedor,factura_util::$ID_VENDEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_vendedor);

			$this->facturas=$this->facturaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				factura_util::refrescarFKDescripciones($this->facturas);
			}
			//factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->facturas);
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
						
			//factura_logic_add::checkfacturaToSave($this->factura,$this->datosCliente,$this->connexion);	       
			//factura_logic_add::updatefacturaToSave($this->factura);			
			factura_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->factura,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->facturaLogicAdditional->checkGeneralEntityToSave($this,$this->factura,$this->datosCliente,$this->connexion);
			
			
			factura_data::save($this->factura, $this->connexion);	    	       	 				
			//factura_logic_add::checkfacturaToSaveAfter($this->factura,$this->datosCliente,$this->connexion);			
			//$this->facturaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->factura,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				factura_util::refrescarFKDescripcion($this->factura);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->factura->getIsDeleted()) {
				$this->factura=null;
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
						
			/*factura_logic_add::checkfacturaToSave($this->factura,$this->datosCliente,$this->connexion);*/	        
			//factura_logic_add::updatefacturaToSave($this->factura);			
			//$this->facturaLogicAdditional->checkGeneralEntityToSave($this,$this->factura,$this->datosCliente,$this->connexion);			
			factura_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->factura,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			factura_data::save($this->factura, $this->connexion);	    	       	 						
			/*factura_logic_add::checkfacturaToSaveAfter($this->factura,$this->datosCliente,$this->connexion);*/			
			//$this->facturaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->factura,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->factura,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				factura_util::refrescarFKDescripcion($this->factura);				
			}
			
			if($this->factura->getIsDeleted()) {
				$this->factura=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(factura $factura,Connexion $connexion)  {
		$facturaLogic = new  factura_logic();		  		  
        try {		
			$facturaLogic->setConnexion($connexion);			
			$facturaLogic->setfactura($factura);			
			$facturaLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*factura_logic_add::checkfacturaToSaves($this->facturas,$this->datosCliente,$this->connexion);*/	        	
			//$this->facturaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->facturas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->facturas as $facturaLocal) {				
								
				//factura_logic_add::updatefacturaToSave($facturaLocal);	        	
				factura_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$facturaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				factura_data::save($facturaLocal, $this->connexion);				
			}
			
			/*factura_logic_add::checkfacturaToSavesAfter($this->facturas,$this->datosCliente,$this->connexion);*/			
			//$this->facturaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->facturas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_util::refrescarFKDescripciones($this->facturas);
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
			/*factura_logic_add::checkfacturaToSaves($this->facturas,$this->datosCliente,$this->connexion);*/			
			//$this->facturaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->facturas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->facturas as $facturaLocal) {				
								
				//factura_logic_add::updatefacturaToSave($facturaLocal);	        	
				factura_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$facturaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				factura_data::save($facturaLocal, $this->connexion);				
			}			
			
			/*factura_logic_add::checkfacturaToSavesAfter($this->facturas,$this->datosCliente,$this->connexion);*/			
			//$this->facturaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->facturas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				factura_util::refrescarFKDescripciones($this->facturas);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $facturas,Connexion $connexion)  {
		$facturaLogic = new  factura_logic();
		  		  
        try {		
			$facturaLogic->setConnexion($connexion);			
			$facturaLogic->setfacturas($facturas);			
			$facturaLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$facturasAux=array();
		
		foreach($this->facturas as $factura) {
			if($factura->getIsDeleted()==false) {
				$facturasAux[]=$factura;
			}
		}
		
		$this->facturas=$facturasAux;
	}
	
	public function updateToGetsAuxiliar(array &$facturas) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->facturas as $factura) {
				
				$factura->setid_empresa_Descripcion(factura_util::getempresaDescripcion($factura->getempresa()));
				$factura->setid_sucursal_Descripcion(factura_util::getsucursalDescripcion($factura->getsucursal()));
				$factura->setid_ejercicio_Descripcion(factura_util::getejercicioDescripcion($factura->getejercicio()));
				$factura->setid_periodo_Descripcion(factura_util::getperiodoDescripcion($factura->getperiodo()));
				$factura->setid_usuario_Descripcion(factura_util::getusuarioDescripcion($factura->getusuario()));
				$factura->setid_cliente_Descripcion(factura_util::getclienteDescripcion($factura->getcliente()));
				$factura->setid_moneda_Descripcion(factura_util::getmonedaDescripcion($factura->getmoneda()));
				$factura->setid_vendedor_Descripcion(factura_util::getvendedorDescripcion($factura->getvendedor()));
				$factura->setid_termino_pago_cliente_Descripcion(factura_util::gettermino_pago_clienteDescripcion($factura->gettermino_pago_cliente()));
				$factura->setid_estado_Descripcion(factura_util::getestadoDescripcion($factura->getestado()));
				$factura->setid_asiento_Descripcion(factura_util::getasientoDescripcion($factura->getasiento()));
				$factura->setid_documento_cuenta_cobrar_Descripcion(factura_util::getdocumento_cuenta_cobrarDescripcion($factura->getdocumento_cuenta_cobrar()));
				$factura->setid_kardex_Descripcion(factura_util::getkardexDescripcion($factura->getkardex()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$factura_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$factura_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$factura_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$facturaForeignKey=new factura_param_return();//facturaForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombosclientesFK($this->connexion,$strRecargarFkQuery,$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_moneda',$strRecargarFkTipos,',')) {
				$this->cargarCombosmonedasFK($this->connexion,$strRecargarFkQuery,$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_vendedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosvendedorsFK($this->connexion,$strRecargarFkQuery,$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_termino_pago_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombostermino_pago_clientesFK($this->connexion,$strRecargarFkQuery,$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado',$strRecargarFkTipos,',')) {
				$this->cargarCombosestadosFK($this->connexion,$strRecargarFkQuery,$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_asiento',$strRecargarFkTipos,',')) {
				$this->cargarCombosasientosFK($this->connexion,$strRecargarFkQuery,$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_documento_cuenta_cobrar',$strRecargarFkTipos,',')) {
				$this->cargarCombosdocumento_cuenta_cobrarsFK($this->connexion,$strRecargarFkQuery,$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_kardex',$strRecargarFkTipos,',')) {
				$this->cargarComboskardexsFK($this->connexion,$strRecargarFkQuery,$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosclientesFK($this->connexion,' where id=-1 ',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_moneda',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosmonedasFK($this->connexion,' where id=-1 ',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_vendedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosvendedorsFK($this->connexion,' where id=-1 ',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_termino_pago_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostermino_pago_clientesFK($this->connexion,' where id=-1 ',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_estado',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosestadosFK($this->connexion,' where id=-1 ',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_asiento',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosasientosFK($this->connexion,' where id=-1 ',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_documento_cuenta_cobrar',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosdocumento_cuenta_cobrarsFK($this->connexion,' where id=-1 ',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_kardex',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboskardexsFK($this->connexion,' where id=-1 ',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $facturaForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$facturaForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_session==null) {
			$factura_session=new factura_session();
		}
		
		if($factura_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($facturaForeignKey->idempresaDefaultFK==0) {
					$facturaForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$facturaForeignKey->empresasFK[$empresaLocal->getId()]=factura_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($factura_session->bigidempresaActual!=null && $factura_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($factura_session->bigidempresaActual);//WithConnection

				$facturaForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=factura_util::getempresaDescripcion($empresaLogic->getempresa());
				$facturaForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$facturaForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_session==null) {
			$factura_session=new factura_session();
		}
		
		if($factura_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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
				if($facturaForeignKey->idsucursalDefaultFK==0) {
					$facturaForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$facturaForeignKey->sucursalsFK[$sucursalLocal->getId()]=factura_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($factura_session->bigidsucursalActual!=null && $factura_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($factura_session->bigidsucursalActual);//WithConnection

				$facturaForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=factura_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$facturaForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$facturaForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_session==null) {
			$factura_session=new factura_session();
		}
		
		if($factura_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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
				if($facturaForeignKey->idejercicioDefaultFK==0) {
					$facturaForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$facturaForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=factura_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($factura_session->bigidejercicioActual!=null && $factura_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($factura_session->bigidejercicioActual);//WithConnection

				$facturaForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=factura_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$facturaForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$facturaForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_session==null) {
			$factura_session=new factura_session();
		}
		
		if($factura_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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
				if($facturaForeignKey->idperiodoDefaultFK==0) {
					$facturaForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$facturaForeignKey->periodosFK[$periodoLocal->getId()]=factura_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($factura_session->bigidperiodoActual!=null && $factura_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($factura_session->bigidperiodoActual);//WithConnection

				$facturaForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=factura_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$facturaForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$facturaForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_session==null) {
			$factura_session=new factura_session();
		}
		
		if($factura_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($facturaForeignKey->idusuarioDefaultFK==0) {
					$facturaForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$facturaForeignKey->usuariosFK[$usuarioLocal->getId()]=factura_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($factura_session->bigidusuarioActual!=null && $factura_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($factura_session->bigidusuarioActual);//WithConnection

				$facturaForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=factura_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$facturaForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosclientesFK($connexion=null,$strRecargarFkQuery='',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$clienteLogic= new cliente_logic();
		$pagination= new Pagination();
		$facturaForeignKey->clientesFK=array();

		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_session==null) {
			$factura_session=new factura_session();
		}
		
		if($factura_session->bitBusquedaDesdeFKSesioncliente!=true) {
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
				if($facturaForeignKey->idclienteDefaultFK==0) {
					$facturaForeignKey->idclienteDefaultFK=$clienteLocal->getId();
				}

				$facturaForeignKey->clientesFK[$clienteLocal->getId()]=factura_util::getclienteDescripcion($clienteLocal);
			}

		} else {

			if($factura_session->bigidclienteActual!=null && $factura_session->bigidclienteActual > 0) {
				$clienteLogic->getEntity($factura_session->bigidclienteActual);//WithConnection

				$facturaForeignKey->clientesFK[$clienteLogic->getcliente()->getId()]=factura_util::getclienteDescripcion($clienteLogic->getcliente());
				$facturaForeignKey->idclienteDefaultFK=$clienteLogic->getcliente()->getId();
			}
		}
	}

	public function cargarCombosmonedasFK($connexion=null,$strRecargarFkQuery='',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$monedaLogic= new moneda_logic();
		$pagination= new Pagination();
		$facturaForeignKey->monedasFK=array();

		$monedaLogic->setConnexion($connexion);
		$monedaLogic->getmonedaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_session==null) {
			$factura_session=new factura_session();
		}
		
		if($factura_session->bitBusquedaDesdeFKSesionmoneda!=true) {
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
				if($facturaForeignKey->idmonedaDefaultFK==0) {
					$facturaForeignKey->idmonedaDefaultFK=$monedaLocal->getId();
				}

				$facturaForeignKey->monedasFK[$monedaLocal->getId()]=factura_util::getmonedaDescripcion($monedaLocal);
			}

		} else {

			if($factura_session->bigidmonedaActual!=null && $factura_session->bigidmonedaActual > 0) {
				$monedaLogic->getEntity($factura_session->bigidmonedaActual);//WithConnection

				$facturaForeignKey->monedasFK[$monedaLogic->getmoneda()->getId()]=factura_util::getmonedaDescripcion($monedaLogic->getmoneda());
				$facturaForeignKey->idmonedaDefaultFK=$monedaLogic->getmoneda()->getId();
			}
		}
	}

	public function cargarCombosvendedorsFK($connexion=null,$strRecargarFkQuery='',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$vendedorLogic= new vendedor_logic();
		$pagination= new Pagination();
		$facturaForeignKey->vendedorsFK=array();

		$vendedorLogic->setConnexion($connexion);
		$vendedorLogic->getvendedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_session==null) {
			$factura_session=new factura_session();
		}
		
		if($factura_session->bitBusquedaDesdeFKSesionvendedor!=true) {
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
				if($facturaForeignKey->idvendedorDefaultFK==0) {
					$facturaForeignKey->idvendedorDefaultFK=$vendedorLocal->getId();
				}

				$facturaForeignKey->vendedorsFK[$vendedorLocal->getId()]=factura_util::getvendedorDescripcion($vendedorLocal);
			}

		} else {

			if($factura_session->bigidvendedorActual!=null && $factura_session->bigidvendedorActual > 0) {
				$vendedorLogic->getEntity($factura_session->bigidvendedorActual);//WithConnection

				$facturaForeignKey->vendedorsFK[$vendedorLogic->getvendedor()->getId()]=factura_util::getvendedorDescripcion($vendedorLogic->getvendedor());
				$facturaForeignKey->idvendedorDefaultFK=$vendedorLogic->getvendedor()->getId();
			}
		}
	}

	public function cargarCombostermino_pago_clientesFK($connexion=null,$strRecargarFkQuery='',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$termino_pago_clienteLogic= new termino_pago_cliente_logic();
		$pagination= new Pagination();
		$facturaForeignKey->termino_pago_clientesFK=array();

		$termino_pago_clienteLogic->setConnexion($connexion);
		$termino_pago_clienteLogic->gettermino_pago_clienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_session==null) {
			$factura_session=new factura_session();
		}
		
		if($factura_session->bitBusquedaDesdeFKSesiontermino_pago_cliente!=true) {
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
				if($facturaForeignKey->idtermino_pago_clienteDefaultFK==0) {
					$facturaForeignKey->idtermino_pago_clienteDefaultFK=$termino_pago_clienteLocal->getId();
				}

				$facturaForeignKey->termino_pago_clientesFK[$termino_pago_clienteLocal->getId()]=factura_util::gettermino_pago_clienteDescripcion($termino_pago_clienteLocal);
			}

		} else {

			if($factura_session->bigidtermino_pago_clienteActual!=null && $factura_session->bigidtermino_pago_clienteActual > 0) {
				$termino_pago_clienteLogic->getEntity($factura_session->bigidtermino_pago_clienteActual);//WithConnection

				$facturaForeignKey->termino_pago_clientesFK[$termino_pago_clienteLogic->gettermino_pago_cliente()->getId()]=factura_util::gettermino_pago_clienteDescripcion($termino_pago_clienteLogic->gettermino_pago_cliente());
				$facturaForeignKey->idtermino_pago_clienteDefaultFK=$termino_pago_clienteLogic->gettermino_pago_cliente()->getId();
			}
		}
	}

	public function cargarCombosestadosFK($connexion=null,$strRecargarFkQuery='',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$estadoLogic= new estado_logic();
		$pagination= new Pagination();
		$facturaForeignKey->estadosFK=array();

		$estadoLogic->setConnexion($connexion);
		$estadoLogic->getestadoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_session==null) {
			$factura_session=new factura_session();
		}
		
		if($factura_session->bitBusquedaDesdeFKSesionestado!=true) {
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
				if($facturaForeignKey->idestadoDefaultFK==0) {
					$facturaForeignKey->idestadoDefaultFK=$estadoLocal->getId();
				}

				$facturaForeignKey->estadosFK[$estadoLocal->getId()]=factura_util::getestadoDescripcion($estadoLocal);
			}

		} else {

			if($factura_session->bigidestadoActual!=null && $factura_session->bigidestadoActual > 0) {
				$estadoLogic->getEntity($factura_session->bigidestadoActual);//WithConnection

				$facturaForeignKey->estadosFK[$estadoLogic->getestado()->getId()]=factura_util::getestadoDescripcion($estadoLogic->getestado());
				$facturaForeignKey->idestadoDefaultFK=$estadoLogic->getestado()->getId();
			}
		}
	}

	public function cargarCombosasientosFK($connexion=null,$strRecargarFkQuery='',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$asientoLogic= new asiento_logic();
		$pagination= new Pagination();
		$facturaForeignKey->asientosFK=array();

		$asientoLogic->setConnexion($connexion);
		$asientoLogic->getasientoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_session==null) {
			$factura_session=new factura_session();
		}
		
		if($factura_session->bitBusquedaDesdeFKSesionasiento!=true) {
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
				if($facturaForeignKey->idasientoDefaultFK==0) {
					$facturaForeignKey->idasientoDefaultFK=$asientoLocal->getId();
				}

				$facturaForeignKey->asientosFK[$asientoLocal->getId()]=factura_util::getasientoDescripcion($asientoLocal);
			}

		} else {

			if($factura_session->bigidasientoActual!=null && $factura_session->bigidasientoActual > 0) {
				$asientoLogic->getEntity($factura_session->bigidasientoActual);//WithConnection

				$facturaForeignKey->asientosFK[$asientoLogic->getasiento()->getId()]=factura_util::getasientoDescripcion($asientoLogic->getasiento());
				$facturaForeignKey->idasientoDefaultFK=$asientoLogic->getasiento()->getId();
			}
		}
	}

	public function cargarCombosdocumento_cuenta_cobrarsFK($connexion=null,$strRecargarFkQuery='',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic();
		$pagination= new Pagination();
		$facturaForeignKey->documento_cuenta_cobrarsFK=array();

		$documento_cuenta_cobrarLogic->setConnexion($connexion);
		$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_session==null) {
			$factura_session=new factura_session();
		}
		
		if($factura_session->bitBusquedaDesdeFKSesiondocumento_cuenta_cobrar!=true) {
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
				if($facturaForeignKey->iddocumento_cuenta_cobrarDefaultFK==0) {
					$facturaForeignKey->iddocumento_cuenta_cobrarDefaultFK=$documento_cuenta_cobrarLocal->getId();
				}

				$facturaForeignKey->documento_cuenta_cobrarsFK[$documento_cuenta_cobrarLocal->getId()]=factura_util::getdocumento_cuenta_cobrarDescripcion($documento_cuenta_cobrarLocal);
			}

		} else {

			if($factura_session->bigiddocumento_cuenta_cobrarActual!=null && $factura_session->bigiddocumento_cuenta_cobrarActual > 0) {
				$documento_cuenta_cobrarLogic->getEntity($factura_session->bigiddocumento_cuenta_cobrarActual);//WithConnection

				$facturaForeignKey->documento_cuenta_cobrarsFK[$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getId()]=factura_util::getdocumento_cuenta_cobrarDescripcion($documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar());
				$facturaForeignKey->iddocumento_cuenta_cobrarDefaultFK=$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getId();
			}
		}
	}

	public function cargarComboskardexsFK($connexion=null,$strRecargarFkQuery='',$facturaForeignKey,$factura_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$kardexLogic= new kardex_logic();
		$pagination= new Pagination();
		$facturaForeignKey->kardexsFK=array();

		$kardexLogic->setConnexion($connexion);
		$kardexLogic->getkardexDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($factura_session==null) {
			$factura_session=new factura_session();
		}
		
		if($factura_session->bitBusquedaDesdeFKSesionkardex!=true) {
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
				if($facturaForeignKey->idkardexDefaultFK==0) {
					$facturaForeignKey->idkardexDefaultFK=$kardexLocal->getId();
				}

				$facturaForeignKey->kardexsFK[$kardexLocal->getId()]=factura_util::getkardexDescripcion($kardexLocal);
			}

		} else {

			if($factura_session->bigidkardexActual!=null && $factura_session->bigidkardexActual > 0) {
				$kardexLogic->getEntity($factura_session->bigidkardexActual);//WithConnection

				$facturaForeignKey->kardexsFK[$kardexLogic->getkardex()->getId()]=factura_util::getkardexDescripcion($kardexLogic->getkardex());
				$facturaForeignKey->idkardexDefaultFK=$kardexLogic->getkardex()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($factura,$facturadetalles) {
		$this->saveRelacionesBase($factura,$facturadetalles,true);
	}

	public function saveRelaciones($factura,$facturadetalles) {
		$this->saveRelacionesBase($factura,$facturadetalles,false);
	}

	public function saveRelacionesBase($factura,$facturadetalles=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$factura->setfactura_detalles($facturadetalles);
			$this->setfactura($factura);

			if(true) {

				//factura_logic_add::updateRelacionesToSave($factura,$this);

				if(($this->factura->getIsNew() || $this->factura->getIsChanged()) && !$this->factura->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($facturadetalles);

				} else if($this->factura->getIsDeleted()) {
					$this->saveRelacionesDetalles($facturadetalles);
					$this->save();
				}

				//factura_logic_add::updateRelacionesToSaveAfter($factura,$this);

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
	
	
	public function saveRelacionesDetalles($facturadetalles=array()) {
		try {
	

			$idfacturaActual=$this->getfactura()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_detalle_carga.php');
			factura_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$facturadetalleLogic_Desde_factura=new factura_detalle_logic();
			$facturadetalleLogic_Desde_factura->setfactura_detalles($facturadetalles);

			$facturadetalleLogic_Desde_factura->setConnexion($this->getConnexion());
			$facturadetalleLogic_Desde_factura->setDatosCliente($this->datosCliente);

			foreach($facturadetalleLogic_Desde_factura->getfactura_detalles() as $facturadetalle_Desde_factura) {
				$facturadetalle_Desde_factura->setid_factura($idfacturaActual);
			}

			$facturadetalleLogic_Desde_factura->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $facturas,factura_param_return $facturaParameterGeneral) : factura_param_return {
		$facturaReturnGeneral=new factura_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $facturaReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $facturas,factura_param_return $facturaParameterGeneral) : factura_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$facturaReturnGeneral=new factura_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $facturaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $facturas,factura $factura,factura_param_return $facturaParameterGeneral,bool $isEsNuevofactura,array $clases) : factura_param_return {
		 try {	
			$facturaReturnGeneral=new factura_param_return();
	
			$facturaReturnGeneral->setfactura($factura);
			$facturaReturnGeneral->setfacturas($facturas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$facturaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $facturaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $facturas,factura $factura,factura_param_return $facturaParameterGeneral,bool $isEsNuevofactura,array $clases) : factura_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$facturaReturnGeneral=new factura_param_return();
	
			$facturaReturnGeneral->setfactura($factura);
			$facturaReturnGeneral->setfacturas($facturas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$facturaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $facturaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $facturas,factura $factura,factura_param_return $facturaParameterGeneral,bool $isEsNuevofactura,array $clases) : factura_param_return {
		 try {	
			$facturaReturnGeneral=new factura_param_return();
	
			$facturaReturnGeneral->setfactura($factura);
			$facturaReturnGeneral->setfacturas($facturas);
			
			
			
			return $facturaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $facturas,factura $factura,factura_param_return $facturaParameterGeneral,bool $isEsNuevofactura,array $clases) : factura_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$facturaReturnGeneral=new factura_param_return();
	
			$facturaReturnGeneral->setfactura($factura);
			$facturaReturnGeneral->setfacturas($facturas);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $facturaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,factura $factura,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,factura $factura,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		factura_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		factura_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(factura $factura,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//factura_logic_add::updatefacturaToGet($this->factura);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$factura->setempresa($this->facturaDataAccess->getempresa($this->connexion,$factura));
		$factura->setsucursal($this->facturaDataAccess->getsucursal($this->connexion,$factura));
		$factura->setejercicio($this->facturaDataAccess->getejercicio($this->connexion,$factura));
		$factura->setperiodo($this->facturaDataAccess->getperiodo($this->connexion,$factura));
		$factura->setusuario($this->facturaDataAccess->getusuario($this->connexion,$factura));
		$factura->setcliente($this->facturaDataAccess->getcliente($this->connexion,$factura));
		$factura->setmoneda($this->facturaDataAccess->getmoneda($this->connexion,$factura));
		$factura->setvendedor($this->facturaDataAccess->getvendedor($this->connexion,$factura));
		$factura->settermino_pago_cliente($this->facturaDataAccess->gettermino_pago_cliente($this->connexion,$factura));
		$factura->setestado($this->facturaDataAccess->getestado($this->connexion,$factura));
		$factura->setasiento($this->facturaDataAccess->getasiento($this->connexion,$factura));
		$factura->setdocumento_cuenta_cobrar($this->facturaDataAccess->getdocumento_cuenta_cobrar($this->connexion,$factura));
		$factura->setkardex($this->facturaDataAccess->getkardex($this->connexion,$factura));
		$factura->setfactura_detalles($this->facturaDataAccess->getfactura_detalles($this->connexion,$factura));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$factura->setempresa($this->facturaDataAccess->getempresa($this->connexion,$factura));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$factura->setsucursal($this->facturaDataAccess->getsucursal($this->connexion,$factura));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$factura->setejercicio($this->facturaDataAccess->getejercicio($this->connexion,$factura));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$factura->setperiodo($this->facturaDataAccess->getperiodo($this->connexion,$factura));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$factura->setusuario($this->facturaDataAccess->getusuario($this->connexion,$factura));
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$factura->setcliente($this->facturaDataAccess->getcliente($this->connexion,$factura));
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				$factura->setmoneda($this->facturaDataAccess->getmoneda($this->connexion,$factura));
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				$factura->setvendedor($this->facturaDataAccess->getvendedor($this->connexion,$factura));
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				$factura->settermino_pago_cliente($this->facturaDataAccess->gettermino_pago_cliente($this->connexion,$factura));
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$factura->setestado($this->facturaDataAccess->getestado($this->connexion,$factura));
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				$factura->setasiento($this->facturaDataAccess->getasiento($this->connexion,$factura));
				continue;
			}

			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$factura->setdocumento_cuenta_cobrar($this->facturaDataAccess->getdocumento_cuenta_cobrar($this->connexion,$factura));
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				$factura->setkardex($this->facturaDataAccess->getkardex($this->connexion,$factura));
				continue;
			}

			if($clas->clas==factura_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$factura->setfactura_detalles($this->facturaDataAccess->getfactura_detalles($this->connexion,$factura));

				if($this->isConDeep) {
					$facturadetalleLogic= new factura_detalle_logic($this->connexion);
					$facturadetalleLogic->setfactura_detalles($factura->getfactura_detalles());
					$classesLocal=factura_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$facturadetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					factura_detalle_util::refrescarFKDescripciones($facturadetalleLogic->getfactura_detalles());
					$factura->setfactura_detalles($facturadetalleLogic->getfactura_detalles());
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
			$factura->setempresa($this->facturaDataAccess->getempresa($this->connexion,$factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setsucursal($this->facturaDataAccess->getsucursal($this->connexion,$factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setejercicio($this->facturaDataAccess->getejercicio($this->connexion,$factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setperiodo($this->facturaDataAccess->getperiodo($this->connexion,$factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setusuario($this->facturaDataAccess->getusuario($this->connexion,$factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setcliente($this->facturaDataAccess->getcliente($this->connexion,$factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setmoneda($this->facturaDataAccess->getmoneda($this->connexion,$factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setvendedor($this->facturaDataAccess->getvendedor($this->connexion,$factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->settermino_pago_cliente($this->facturaDataAccess->gettermino_pago_cliente($this->connexion,$factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setestado($this->facturaDataAccess->getestado($this->connexion,$factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setasiento($this->facturaDataAccess->getasiento($this->connexion,$factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setdocumento_cuenta_cobrar($this->facturaDataAccess->getdocumento_cuenta_cobrar($this->connexion,$factura));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setkardex($this->facturaDataAccess->getkardex($this->connexion,$factura));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura_detalle::$class);
			$factura->setfactura_detalles($this->facturaDataAccess->getfactura_detalles($this->connexion,$factura));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$factura->setempresa($this->facturaDataAccess->getempresa($this->connexion,$factura));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($factura->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$factura->setsucursal($this->facturaDataAccess->getsucursal($this->connexion,$factura));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($factura->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$factura->setejercicio($this->facturaDataAccess->getejercicio($this->connexion,$factura));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($factura->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$factura->setperiodo($this->facturaDataAccess->getperiodo($this->connexion,$factura));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($factura->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$factura->setusuario($this->facturaDataAccess->getusuario($this->connexion,$factura));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($factura->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$factura->setcliente($this->facturaDataAccess->getcliente($this->connexion,$factura));
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepLoad($factura->getcliente(),$isDeep,$deepLoadType,$clases);
				
		$factura->setmoneda($this->facturaDataAccess->getmoneda($this->connexion,$factura));
		$monedaLogic= new moneda_logic($this->connexion);
		$monedaLogic->deepLoad($factura->getmoneda(),$isDeep,$deepLoadType,$clases);
				
		$factura->setvendedor($this->facturaDataAccess->getvendedor($this->connexion,$factura));
		$vendedorLogic= new vendedor_logic($this->connexion);
		$vendedorLogic->deepLoad($factura->getvendedor(),$isDeep,$deepLoadType,$clases);
				
		$factura->settermino_pago_cliente($this->facturaDataAccess->gettermino_pago_cliente($this->connexion,$factura));
		$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
		$termino_pago_clienteLogic->deepLoad($factura->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases);
				
		$factura->setestado($this->facturaDataAccess->getestado($this->connexion,$factura));
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepLoad($factura->getestado(),$isDeep,$deepLoadType,$clases);
				
		$factura->setasiento($this->facturaDataAccess->getasiento($this->connexion,$factura));
		$asientoLogic= new asiento_logic($this->connexion);
		$asientoLogic->deepLoad($factura->getasiento(),$isDeep,$deepLoadType,$clases);
				
		$factura->setdocumento_cuenta_cobrar($this->facturaDataAccess->getdocumento_cuenta_cobrar($this->connexion,$factura));
		$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
		$documento_cuenta_cobrarLogic->deepLoad($factura->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases);
				
		$factura->setkardex($this->facturaDataAccess->getkardex($this->connexion,$factura));
		$kardexLogic= new kardex_logic($this->connexion);
		$kardexLogic->deepLoad($factura->getkardex(),$isDeep,$deepLoadType,$clases);
				

		$factura->setfactura_detalles($this->facturaDataAccess->getfactura_detalles($this->connexion,$factura));

		foreach($factura->getfactura_detalles() as $facturadetalle) {
			$facturadetalleLogic= new factura_detalle_logic($this->connexion);
			$facturadetalleLogic->deepLoad($facturadetalle,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$factura->setempresa($this->facturaDataAccess->getempresa($this->connexion,$factura));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($factura->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$factura->setsucursal($this->facturaDataAccess->getsucursal($this->connexion,$factura));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($factura->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$factura->setejercicio($this->facturaDataAccess->getejercicio($this->connexion,$factura));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($factura->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$factura->setperiodo($this->facturaDataAccess->getperiodo($this->connexion,$factura));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($factura->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$factura->setusuario($this->facturaDataAccess->getusuario($this->connexion,$factura));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($factura->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$factura->setcliente($this->facturaDataAccess->getcliente($this->connexion,$factura));
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($factura->getcliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				$factura->setmoneda($this->facturaDataAccess->getmoneda($this->connexion,$factura));
				$monedaLogic= new moneda_logic($this->connexion);
				$monedaLogic->deepLoad($factura->getmoneda(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				$factura->setvendedor($this->facturaDataAccess->getvendedor($this->connexion,$factura));
				$vendedorLogic= new vendedor_logic($this->connexion);
				$vendedorLogic->deepLoad($factura->getvendedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				$factura->settermino_pago_cliente($this->facturaDataAccess->gettermino_pago_cliente($this->connexion,$factura));
				$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
				$termino_pago_clienteLogic->deepLoad($factura->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$factura->setestado($this->facturaDataAccess->getestado($this->connexion,$factura));
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepLoad($factura->getestado(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				$factura->setasiento($this->facturaDataAccess->getasiento($this->connexion,$factura));
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepLoad($factura->getasiento(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$factura->setdocumento_cuenta_cobrar($this->facturaDataAccess->getdocumento_cuenta_cobrar($this->connexion,$factura));
				$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
				$documento_cuenta_cobrarLogic->deepLoad($factura->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				$factura->setkardex($this->facturaDataAccess->getkardex($this->connexion,$factura));
				$kardexLogic= new kardex_logic($this->connexion);
				$kardexLogic->deepLoad($factura->getkardex(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==factura_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$factura->setfactura_detalles($this->facturaDataAccess->getfactura_detalles($this->connexion,$factura));

				foreach($factura->getfactura_detalles() as $facturadetalle) {
					$facturadetalleLogic= new factura_detalle_logic($this->connexion);
					$facturadetalleLogic->deepLoad($facturadetalle,$isDeep,$deepLoadType,$clases);
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
			$factura->setempresa($this->facturaDataAccess->getempresa($this->connexion,$factura));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($factura->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setsucursal($this->facturaDataAccess->getsucursal($this->connexion,$factura));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($factura->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setejercicio($this->facturaDataAccess->getejercicio($this->connexion,$factura));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($factura->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setperiodo($this->facturaDataAccess->getperiodo($this->connexion,$factura));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($factura->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setusuario($this->facturaDataAccess->getusuario($this->connexion,$factura));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($factura->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setcliente($this->facturaDataAccess->getcliente($this->connexion,$factura));
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($factura->getcliente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setmoneda($this->facturaDataAccess->getmoneda($this->connexion,$factura));
			$monedaLogic= new moneda_logic($this->connexion);
			$monedaLogic->deepLoad($factura->getmoneda(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setvendedor($this->facturaDataAccess->getvendedor($this->connexion,$factura));
			$vendedorLogic= new vendedor_logic($this->connexion);
			$vendedorLogic->deepLoad($factura->getvendedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->settermino_pago_cliente($this->facturaDataAccess->gettermino_pago_cliente($this->connexion,$factura));
			$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
			$termino_pago_clienteLogic->deepLoad($factura->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setestado($this->facturaDataAccess->getestado($this->connexion,$factura));
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepLoad($factura->getestado(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setasiento($this->facturaDataAccess->getasiento($this->connexion,$factura));
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepLoad($factura->getasiento(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setdocumento_cuenta_cobrar($this->facturaDataAccess->getdocumento_cuenta_cobrar($this->connexion,$factura));
			$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
			$documento_cuenta_cobrarLogic->deepLoad($factura->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$factura->setkardex($this->facturaDataAccess->getkardex($this->connexion,$factura));
			$kardexLogic= new kardex_logic($this->connexion);
			$kardexLogic->deepLoad($factura->getkardex(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura_detalle::$class);
			$factura->setfactura_detalles($this->facturaDataAccess->getfactura_detalles($this->connexion,$factura));

			foreach($factura->getfactura_detalles() as $facturadetalle) {
				$facturadetalleLogic= new factura_detalle_logic($this->connexion);
				$facturadetalleLogic->deepLoad($facturadetalle,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(factura $factura,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//factura_logic_add::updatefacturaToSave($this->factura);			
			
			if(!$paraDeleteCascade) {				
				factura_data::save($factura, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($factura->getempresa(),$this->connexion);
		sucursal_data::save($factura->getsucursal(),$this->connexion);
		ejercicio_data::save($factura->getejercicio(),$this->connexion);
		periodo_data::save($factura->getperiodo(),$this->connexion);
		usuario_data::save($factura->getusuario(),$this->connexion);
		cliente_data::save($factura->getcliente(),$this->connexion);
		moneda_data::save($factura->getmoneda(),$this->connexion);
		vendedor_data::save($factura->getvendedor(),$this->connexion);
		termino_pago_cliente_data::save($factura->gettermino_pago_cliente(),$this->connexion);
		estado_data::save($factura->getestado(),$this->connexion);
		asiento_data::save($factura->getasiento(),$this->connexion);
		documento_cuenta_cobrar_data::save($factura->getdocumento_cuenta_cobrar(),$this->connexion);
		kardex_data::save($factura->getkardex(),$this->connexion);

		foreach($factura->getfactura_detalles() as $facturadetalle) {
			$facturadetalle->setid_factura($factura->getId());
			factura_detalle_data::save($facturadetalle,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($factura->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($factura->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($factura->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($factura->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($factura->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($factura->getcliente(),$this->connexion);
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				moneda_data::save($factura->getmoneda(),$this->connexion);
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				vendedor_data::save($factura->getvendedor(),$this->connexion);
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				termino_pago_cliente_data::save($factura->gettermino_pago_cliente(),$this->connexion);
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($factura->getestado(),$this->connexion);
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				asiento_data::save($factura->getasiento(),$this->connexion);
				continue;
			}

			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				documento_cuenta_cobrar_data::save($factura->getdocumento_cuenta_cobrar(),$this->connexion);
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				kardex_data::save($factura->getkardex(),$this->connexion);
				continue;
			}


			if($clas->clas==factura_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($factura->getfactura_detalles() as $facturadetalle) {
					$facturadetalle->setid_factura($factura->getId());
					factura_detalle_data::save($facturadetalle,$this->connexion);
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
			empresa_data::save($factura->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($factura->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($factura->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($factura->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($factura->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($factura->getcliente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			moneda_data::save($factura->getmoneda(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			vendedor_data::save($factura->getvendedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_cliente_data::save($factura->gettermino_pago_cliente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($factura->getestado(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_data::save($factura->getasiento(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_cuenta_cobrar_data::save($factura->getdocumento_cuenta_cobrar(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			kardex_data::save($factura->getkardex(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura_detalle::$class);

			foreach($factura->getfactura_detalles() as $facturadetalle) {
				$facturadetalle->setid_factura($factura->getId());
				factura_detalle_data::save($facturadetalle,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($factura->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($factura->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($factura->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($factura->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($factura->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($factura->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($factura->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($factura->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($factura->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($factura->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cliente_data::save($factura->getcliente(),$this->connexion);
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepSave($factura->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		moneda_data::save($factura->getmoneda(),$this->connexion);
		$monedaLogic= new moneda_logic($this->connexion);
		$monedaLogic->deepSave($factura->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		vendedor_data::save($factura->getvendedor(),$this->connexion);
		$vendedorLogic= new vendedor_logic($this->connexion);
		$vendedorLogic->deepSave($factura->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		termino_pago_cliente_data::save($factura->gettermino_pago_cliente(),$this->connexion);
		$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
		$termino_pago_clienteLogic->deepSave($factura->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		estado_data::save($factura->getestado(),$this->connexion);
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepSave($factura->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		asiento_data::save($factura->getasiento(),$this->connexion);
		$asientoLogic= new asiento_logic($this->connexion);
		$asientoLogic->deepSave($factura->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		documento_cuenta_cobrar_data::save($factura->getdocumento_cuenta_cobrar(),$this->connexion);
		$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
		$documento_cuenta_cobrarLogic->deepSave($factura->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		kardex_data::save($factura->getkardex(),$this->connexion);
		$kardexLogic= new kardex_logic($this->connexion);
		$kardexLogic->deepSave($factura->getkardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($factura->getfactura_detalles() as $facturadetalle) {
			$facturadetalleLogic= new factura_detalle_logic($this->connexion);
			$facturadetalle->setid_factura($factura->getId());
			factura_detalle_data::save($facturadetalle,$this->connexion);
			$facturadetalleLogic->deepSave($facturadetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($factura->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($factura->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($factura->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($factura->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($factura->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($factura->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($factura->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($factura->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($factura->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($factura->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($factura->getcliente(),$this->connexion);
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepSave($factura->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				moneda_data::save($factura->getmoneda(),$this->connexion);
				$monedaLogic= new moneda_logic($this->connexion);
				$monedaLogic->deepSave($factura->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				vendedor_data::save($factura->getvendedor(),$this->connexion);
				$vendedorLogic= new vendedor_logic($this->connexion);
				$vendedorLogic->deepSave($factura->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				termino_pago_cliente_data::save($factura->gettermino_pago_cliente(),$this->connexion);
				$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
				$termino_pago_clienteLogic->deepSave($factura->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($factura->getestado(),$this->connexion);
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepSave($factura->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				asiento_data::save($factura->getasiento(),$this->connexion);
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepSave($factura->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				documento_cuenta_cobrar_data::save($factura->getdocumento_cuenta_cobrar(),$this->connexion);
				$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
				$documento_cuenta_cobrarLogic->deepSave($factura->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				kardex_data::save($factura->getkardex(),$this->connexion);
				$kardexLogic= new kardex_logic($this->connexion);
				$kardexLogic->deepSave($factura->getkardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==factura_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($factura->getfactura_detalles() as $facturadetalle) {
					$facturadetalleLogic= new factura_detalle_logic($this->connexion);
					$facturadetalle->setid_factura($factura->getId());
					factura_detalle_data::save($facturadetalle,$this->connexion);
					$facturadetalleLogic->deepSave($facturadetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($factura->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($factura->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($factura->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($factura->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($factura->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($factura->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($factura->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($factura->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($factura->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($factura->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($factura->getcliente(),$this->connexion);
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepSave($factura->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			moneda_data::save($factura->getmoneda(),$this->connexion);
			$monedaLogic= new moneda_logic($this->connexion);
			$monedaLogic->deepSave($factura->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			vendedor_data::save($factura->getvendedor(),$this->connexion);
			$vendedorLogic= new vendedor_logic($this->connexion);
			$vendedorLogic->deepSave($factura->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_cliente_data::save($factura->gettermino_pago_cliente(),$this->connexion);
			$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
			$termino_pago_clienteLogic->deepSave($factura->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($factura->getestado(),$this->connexion);
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepSave($factura->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_data::save($factura->getasiento(),$this->connexion);
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepSave($factura->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_cuenta_cobrar_data::save($factura->getdocumento_cuenta_cobrar(),$this->connexion);
			$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
			$documento_cuenta_cobrarLogic->deepSave($factura->getdocumento_cuenta_cobrar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			kardex_data::save($factura->getkardex(),$this->connexion);
			$kardexLogic= new kardex_logic($this->connexion);
			$kardexLogic->deepSave($factura->getkardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==factura_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(factura_detalle::$class);

			foreach($factura->getfactura_detalles() as $facturadetalle) {
				$facturadetalleLogic= new factura_detalle_logic($this->connexion);
				$facturadetalle->setid_factura($factura->getId());
				factura_detalle_data::save($facturadetalle,$this->connexion);
				$facturadetalleLogic->deepSave($facturadetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				factura_data::save($factura, $this->connexion);
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
			
			$this->deepLoad($this->factura,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->facturas as $factura) {
				$this->deepLoad($factura,$isDeep,$deepLoadType,$clases);
								
				factura_util::refrescarFKDescripciones($this->facturas);
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
			
			foreach($this->facturas as $factura) {
				$this->deepLoad($factura,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->factura,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->facturas as $factura) {
				$this->deepSave($factura,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->facturas as $factura) {
				$this->deepSave($factura,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(moneda::$class);
				$classes[]=new Classe(vendedor::$class);
				$classes[]=new Classe(termino_pago_cliente::$class);
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
					if($clas->clas==moneda::$class) {
						$classes[]=new Classe(moneda::$class);
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
				
				$classes[]=new Classe(factura_detalle::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==factura_detalle::$class) {
						$classes[]=new Classe(factura_detalle::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==factura_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(factura_detalle::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getfactura() : ?factura {	
		/*
		factura_logic_add::checkfacturaToGet($this->factura,$this->datosCliente);
		factura_logic_add::updatefacturaToGet($this->factura);
		*/
			
		return $this->factura;
	}
		
	public function setfactura(factura $newfactura) {
		$this->factura = $newfactura;
	}
	
	public function getfacturas() : array {		
		/*
		factura_logic_add::checkfacturaToGets($this->facturas,$this->datosCliente);
		
		foreach ($this->facturas as $facturaLocal ) {
			factura_logic_add::updatefacturaToGet($facturaLocal);
		}
		*/
		
		return $this->facturas;
	}
	
	public function setfacturas(array $newfacturas) {
		$this->facturas = $newfacturas;
	}
	
	public function getfacturaDataAccess() : factura_data {
		return $this->facturaDataAccess;
	}
	
	public function setfacturaDataAccess(factura_data $newfacturaDataAccess) {
		$this->facturaDataAccess = $newfacturaDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        factura_carga::$CONTROLLER;;        
		
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
