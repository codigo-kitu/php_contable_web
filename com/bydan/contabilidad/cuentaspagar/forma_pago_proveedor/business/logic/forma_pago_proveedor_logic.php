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

namespace com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_param_return;

use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\presentation\session\forma_pago_proveedor_session;

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

use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\entity\forma_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\data\forma_pago_proveedor_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\tipo_forma_pago\business\entity\tipo_forma_pago;
use com\bydan\contabilidad\general\tipo_forma_pago\business\data\tipo_forma_pago_data;
use com\bydan\contabilidad\general\tipo_forma_pago\business\logic\tipo_forma_pago_logic;
use com\bydan\contabilidad\general\tipo_forma_pago\util\tipo_forma_pago_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL


use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\business\entity\debito_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\business\data\debito_cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\business\logic\debito_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_util;

use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\entity\documento_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\data\documento_cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\logic\documento_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_util;

use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\entity\pago_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\data\pago_cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\logic\pago_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_util;

//REL DETALLES

use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\business\logic\orden_compra_logic;
use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_carga;
use com\bydan\contabilidad\inventario\orden_compra_detalle\business\logic\orden_compra_detalle_logic;
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\util\imagen_documento_cuenta_pagar_carga;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_carga;
use com\bydan\contabilidad\inventario\devolucion\business\logic\devolucion_logic;
use com\bydan\contabilidad\inventario\devolucion_detalle\util\devolucion_detalle_carga;
use com\bydan\contabilidad\inventario\devolucion_detalle\business\logic\devolucion_detalle_logic;



class forma_pago_proveedor_logic  extends GeneralEntityLogic implements forma_pago_proveedor_logicI {	
	/*GENERAL*/
	public forma_pago_proveedor_data $forma_pago_proveedorDataAccess;
	//public ?forma_pago_proveedor_logic_add $forma_pago_proveedorLogicAdditional=null;
	public ?forma_pago_proveedor $forma_pago_proveedor;
	public array $forma_pago_proveedors;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->forma_pago_proveedorDataAccess = new forma_pago_proveedor_data();			
			$this->forma_pago_proveedors = array();
			$this->forma_pago_proveedor = new forma_pago_proveedor();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->forma_pago_proveedorLogicAdditional = new forma_pago_proveedor_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->forma_pago_proveedorLogicAdditional==null) {
		//	$this->forma_pago_proveedorLogicAdditional=new forma_pago_proveedor_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->forma_pago_proveedorDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->forma_pago_proveedorDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->forma_pago_proveedorDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->forma_pago_proveedorDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->forma_pago_proveedors = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->forma_pago_proveedors=$this->forma_pago_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_proveedor_util::refrescarFKDescripciones($this->forma_pago_proveedors);
			}
			
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGets($this->forma_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_proveedors);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->forma_pago_proveedors = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->forma_pago_proveedors=$this->forma_pago_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_proveedor_util::refrescarFKDescripciones($this->forma_pago_proveedors);
			}
			
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGets($this->forma_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_proveedors);
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
		$this->forma_pago_proveedor = new forma_pago_proveedor();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->forma_pago_proveedor=$this->forma_pago_proveedorDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->forma_pago_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				forma_pago_proveedor_util::refrescarFKDescripcion($this->forma_pago_proveedor);
			}
						
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGet($this->forma_pago_proveedor,$this->datosCliente);
			//forma_pago_proveedor_logic_add::updateforma_pago_proveedorToGet($this->forma_pago_proveedor);
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
		$this->forma_pago_proveedor = new  forma_pago_proveedor();
		  		  
        try {		
			$this->forma_pago_proveedor=$this->forma_pago_proveedorDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->forma_pago_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				forma_pago_proveedor_util::refrescarFKDescripcion($this->forma_pago_proveedor);
			}
			
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGet($this->forma_pago_proveedor,$this->datosCliente);
			//forma_pago_proveedor_logic_add::updateforma_pago_proveedorToGet($this->forma_pago_proveedor);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?forma_pago_proveedor {
		$forma_pago_proveedorLogic = new  forma_pago_proveedor_logic();
		  		  
        try {		
			$forma_pago_proveedorLogic->setConnexion($connexion);			
			$forma_pago_proveedorLogic->getEntity($id);			
			return $forma_pago_proveedorLogic->getforma_pago_proveedor();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->forma_pago_proveedor = new  forma_pago_proveedor();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->forma_pago_proveedor=$this->forma_pago_proveedorDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->forma_pago_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				forma_pago_proveedor_util::refrescarFKDescripcion($this->forma_pago_proveedor);
			}
			
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGet($this->forma_pago_proveedor,$this->datosCliente);
			//forma_pago_proveedor_logic_add::updateforma_pago_proveedorToGet($this->forma_pago_proveedor);
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
		$this->forma_pago_proveedor = new  forma_pago_proveedor();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->forma_pago_proveedor=$this->forma_pago_proveedorDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->forma_pago_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				forma_pago_proveedor_util::refrescarFKDescripcion($this->forma_pago_proveedor);
			}
			
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGet($this->forma_pago_proveedor,$this->datosCliente);
			//forma_pago_proveedor_logic_add::updateforma_pago_proveedorToGet($this->forma_pago_proveedor);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?forma_pago_proveedor {
		$forma_pago_proveedorLogic = new  forma_pago_proveedor_logic();
		  		  
        try {		
			$forma_pago_proveedorLogic->setConnexion($connexion);			
			$forma_pago_proveedorLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $forma_pago_proveedorLogic->getforma_pago_proveedor();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->forma_pago_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->forma_pago_proveedors=$this->forma_pago_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_proveedor_util::refrescarFKDescripciones($this->forma_pago_proveedors);
			}
			
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGets($this->forma_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_proveedors);			
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
		$this->forma_pago_proveedors = array();
		  		  
        try {			
			$this->forma_pago_proveedors=$this->forma_pago_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_proveedor_util::refrescarFKDescripciones($this->forma_pago_proveedors);
			}
			
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGets($this->forma_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_proveedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->forma_pago_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->forma_pago_proveedors=$this->forma_pago_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_proveedor_util::refrescarFKDescripciones($this->forma_pago_proveedors);
			}
			
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGets($this->forma_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_proveedors);
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
		$this->forma_pago_proveedors = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->forma_pago_proveedors=$this->forma_pago_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_proveedor_util::refrescarFKDescripciones($this->forma_pago_proveedors);
			}
			
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGets($this->forma_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_proveedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$forma_pago_proveedorLogic = new  forma_pago_proveedor_logic();
		  		  
        try {		
			$forma_pago_proveedorLogic->setConnexion($connexion);			
			$forma_pago_proveedorLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $forma_pago_proveedorLogic->getforma_pago_proveedors();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->forma_pago_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->forma_pago_proveedors=$this->forma_pago_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_proveedor_util::refrescarFKDescripciones($this->forma_pago_proveedors);
			}
			
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGets($this->forma_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_proveedors);
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
		$this->forma_pago_proveedors = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->forma_pago_proveedors=$this->forma_pago_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_proveedor_util::refrescarFKDescripciones($this->forma_pago_proveedors);
			}
			
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGets($this->forma_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_proveedors);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->forma_pago_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->forma_pago_proveedors=$this->forma_pago_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_proveedor_util::refrescarFKDescripciones($this->forma_pago_proveedors);
			}
			
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGets($this->forma_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_proveedors);
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
		$this->forma_pago_proveedors = array();
		  		  
        try {			
			$this->forma_pago_proveedors=$this->forma_pago_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_proveedor_util::refrescarFKDescripciones($this->forma_pago_proveedors);
			}	
			
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGets($this->forma_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_proveedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->forma_pago_proveedors = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->forma_pago_proveedors=$this->forma_pago_proveedorDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_proveedor_util::refrescarFKDescripciones($this->forma_pago_proveedors);
			}
			
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGets($this->forma_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_proveedors);
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
		$this->forma_pago_proveedors = array();
		  		  
        try {		
			$this->forma_pago_proveedors=$this->forma_pago_proveedorDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_proveedor_util::refrescarFKDescripciones($this->forma_pago_proveedors);
			}
			
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGets($this->forma_pago_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_proveedors);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdcuentaWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_cuenta) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,forma_pago_proveedor_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->forma_pago_proveedors=$this->forma_pago_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				forma_pago_proveedor_util::refrescarFKDescripciones($this->forma_pago_proveedors);
			}
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGets($this->forma_pago_proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->forma_pago_proveedors);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta(string $strFinalQuery,Pagination $pagination,?int $id_cuenta) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,forma_pago_proveedor_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->forma_pago_proveedors=$this->forma_pago_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				forma_pago_proveedor_util::refrescarFKDescripciones($this->forma_pago_proveedors);
			}
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGets($this->forma_pago_proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->forma_pago_proveedors);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,forma_pago_proveedor_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->forma_pago_proveedors=$this->forma_pago_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				forma_pago_proveedor_util::refrescarFKDescripciones($this->forma_pago_proveedors);
			}
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGets($this->forma_pago_proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->forma_pago_proveedors);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,forma_pago_proveedor_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->forma_pago_proveedors=$this->forma_pago_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				forma_pago_proveedor_util::refrescarFKDescripciones($this->forma_pago_proveedors);
			}
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGets($this->forma_pago_proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->forma_pago_proveedors);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtipo_forma_pagoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_tipo_forma_pago) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_forma_pago= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_forma_pago->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_forma_pago,forma_pago_proveedor_util::$ID_TIPO_FORMA_PAGO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_forma_pago);

			$this->forma_pago_proveedors=$this->forma_pago_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				forma_pago_proveedor_util::refrescarFKDescripciones($this->forma_pago_proveedors);
			}
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGets($this->forma_pago_proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->forma_pago_proveedors);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtipo_forma_pago(string $strFinalQuery,Pagination $pagination,int $id_tipo_forma_pago) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_forma_pago= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_forma_pago->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_forma_pago,forma_pago_proveedor_util::$ID_TIPO_FORMA_PAGO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_forma_pago);

			$this->forma_pago_proveedors=$this->forma_pago_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				forma_pago_proveedor_util::refrescarFKDescripciones($this->forma_pago_proveedors);
			}
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGets($this->forma_pago_proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->forma_pago_proveedors);
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
						
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToSave($this->forma_pago_proveedor,$this->datosCliente,$this->connexion);	       
			//forma_pago_proveedor_logic_add::updateforma_pago_proveedorToSave($this->forma_pago_proveedor);			
			forma_pago_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->forma_pago_proveedor,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->forma_pago_proveedorLogicAdditional->checkGeneralEntityToSave($this,$this->forma_pago_proveedor,$this->datosCliente,$this->connexion);
			
			
			forma_pago_proveedor_data::save($this->forma_pago_proveedor, $this->connexion);	    	       	 				
			//forma_pago_proveedor_logic_add::checkforma_pago_proveedorToSaveAfter($this->forma_pago_proveedor,$this->datosCliente,$this->connexion);			
			//$this->forma_pago_proveedorLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->forma_pago_proveedor,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->forma_pago_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->forma_pago_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				forma_pago_proveedor_util::refrescarFKDescripcion($this->forma_pago_proveedor);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->forma_pago_proveedor->getIsDeleted()) {
				$this->forma_pago_proveedor=null;
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
						
			/*forma_pago_proveedor_logic_add::checkforma_pago_proveedorToSave($this->forma_pago_proveedor,$this->datosCliente,$this->connexion);*/	        
			//forma_pago_proveedor_logic_add::updateforma_pago_proveedorToSave($this->forma_pago_proveedor);			
			//$this->forma_pago_proveedorLogicAdditional->checkGeneralEntityToSave($this,$this->forma_pago_proveedor,$this->datosCliente,$this->connexion);			
			forma_pago_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->forma_pago_proveedor,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			forma_pago_proveedor_data::save($this->forma_pago_proveedor, $this->connexion);	    	       	 						
			/*forma_pago_proveedor_logic_add::checkforma_pago_proveedorToSaveAfter($this->forma_pago_proveedor,$this->datosCliente,$this->connexion);*/			
			//$this->forma_pago_proveedorLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->forma_pago_proveedor,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->forma_pago_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->forma_pago_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				forma_pago_proveedor_util::refrescarFKDescripcion($this->forma_pago_proveedor);				
			}
			
			if($this->forma_pago_proveedor->getIsDeleted()) {
				$this->forma_pago_proveedor=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(forma_pago_proveedor $forma_pago_proveedor,Connexion $connexion)  {
		$forma_pago_proveedorLogic = new  forma_pago_proveedor_logic();		  		  
        try {		
			$forma_pago_proveedorLogic->setConnexion($connexion);			
			$forma_pago_proveedorLogic->setforma_pago_proveedor($forma_pago_proveedor);			
			$forma_pago_proveedorLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*forma_pago_proveedor_logic_add::checkforma_pago_proveedorToSaves($this->forma_pago_proveedors,$this->datosCliente,$this->connexion);*/	        	
			//$this->forma_pago_proveedorLogicAdditional->checkGeneralEntitiesToSaves($this,$this->forma_pago_proveedors,$this->datosCliente,$this->connexion);
			
	   		foreach($this->forma_pago_proveedors as $forma_pago_proveedorLocal) {				
								
				//forma_pago_proveedor_logic_add::updateforma_pago_proveedorToSave($forma_pago_proveedorLocal);	        	
				forma_pago_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$forma_pago_proveedorLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				forma_pago_proveedor_data::save($forma_pago_proveedorLocal, $this->connexion);				
			}
			
			/*forma_pago_proveedor_logic_add::checkforma_pago_proveedorToSavesAfter($this->forma_pago_proveedors,$this->datosCliente,$this->connexion);*/			
			//$this->forma_pago_proveedorLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->forma_pago_proveedors,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_proveedor_util::refrescarFKDescripciones($this->forma_pago_proveedors);
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
			/*forma_pago_proveedor_logic_add::checkforma_pago_proveedorToSaves($this->forma_pago_proveedors,$this->datosCliente,$this->connexion);*/			
			//$this->forma_pago_proveedorLogicAdditional->checkGeneralEntitiesToSaves($this,$this->forma_pago_proveedors,$this->datosCliente,$this->connexion);
			
	   		foreach($this->forma_pago_proveedors as $forma_pago_proveedorLocal) {				
								
				//forma_pago_proveedor_logic_add::updateforma_pago_proveedorToSave($forma_pago_proveedorLocal);	        	
				forma_pago_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$forma_pago_proveedorLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				forma_pago_proveedor_data::save($forma_pago_proveedorLocal, $this->connexion);				
			}			
			
			/*forma_pago_proveedor_logic_add::checkforma_pago_proveedorToSavesAfter($this->forma_pago_proveedors,$this->datosCliente,$this->connexion);*/			
			//$this->forma_pago_proveedorLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->forma_pago_proveedors,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_proveedor_util::refrescarFKDescripciones($this->forma_pago_proveedors);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $forma_pago_proveedors,Connexion $connexion)  {
		$forma_pago_proveedorLogic = new  forma_pago_proveedor_logic();
		  		  
        try {		
			$forma_pago_proveedorLogic->setConnexion($connexion);			
			$forma_pago_proveedorLogic->setforma_pago_proveedors($forma_pago_proveedors);			
			$forma_pago_proveedorLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$forma_pago_proveedorsAux=array();
		
		foreach($this->forma_pago_proveedors as $forma_pago_proveedor) {
			if($forma_pago_proveedor->getIsDeleted()==false) {
				$forma_pago_proveedorsAux[]=$forma_pago_proveedor;
			}
		}
		
		$this->forma_pago_proveedors=$forma_pago_proveedorsAux;
	}
	
	public function updateToGetsAuxiliar(array &$forma_pago_proveedors) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->forma_pago_proveedors as $forma_pago_proveedor) {
				
				$forma_pago_proveedor->setid_empresa_Descripcion(forma_pago_proveedor_util::getempresaDescripcion($forma_pago_proveedor->getempresa()));
				$forma_pago_proveedor->setid_tipo_forma_pago_Descripcion(forma_pago_proveedor_util::gettipo_forma_pagoDescripcion($forma_pago_proveedor->gettipo_forma_pago()));
				$forma_pago_proveedor->setid_cuenta_Descripcion(forma_pago_proveedor_util::getcuentaDescripcion($forma_pago_proveedor->getcuenta()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$forma_pago_proveedor_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$forma_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$forma_pago_proveedor_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$forma_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$forma_pago_proveedor_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$forma_pago_proveedorForeignKey=new forma_pago_proveedor_param_return();//forma_pago_proveedorForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$forma_pago_proveedorForeignKey,$forma_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_forma_pago',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_forma_pagosFK($this->connexion,$strRecargarFkQuery,$forma_pago_proveedorForeignKey,$forma_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTipos,',')) {
				$this->cargarComboscuentasFK($this->connexion,$strRecargarFkQuery,$forma_pago_proveedorForeignKey,$forma_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$forma_pago_proveedorForeignKey,$forma_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_forma_pago',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_forma_pagosFK($this->connexion,' where id=-1 ',$forma_pago_proveedorForeignKey,$forma_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuentasFK($this->connexion,' where id=-1 ',$forma_pago_proveedorForeignKey,$forma_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $forma_pago_proveedorForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$forma_pago_proveedorForeignKey,$forma_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$forma_pago_proveedorForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($forma_pago_proveedor_session==null) {
			$forma_pago_proveedor_session=new forma_pago_proveedor_session();
		}
		
		if($forma_pago_proveedor_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($forma_pago_proveedorForeignKey->idempresaDefaultFK==0) {
					$forma_pago_proveedorForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$forma_pago_proveedorForeignKey->empresasFK[$empresaLocal->getId()]=forma_pago_proveedor_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($forma_pago_proveedor_session->bigidempresaActual!=null && $forma_pago_proveedor_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($forma_pago_proveedor_session->bigidempresaActual);//WithConnection

				$forma_pago_proveedorForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=forma_pago_proveedor_util::getempresaDescripcion($empresaLogic->getempresa());
				$forma_pago_proveedorForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombostipo_forma_pagosFK($connexion=null,$strRecargarFkQuery='',$forma_pago_proveedorForeignKey,$forma_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_forma_pagoLogic= new tipo_forma_pago_logic();
		$pagination= new Pagination();
		$forma_pago_proveedorForeignKey->tipo_forma_pagosFK=array();

		$tipo_forma_pagoLogic->setConnexion($connexion);
		$tipo_forma_pagoLogic->gettipo_forma_pagoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($forma_pago_proveedor_session==null) {
			$forma_pago_proveedor_session=new forma_pago_proveedor_session();
		}
		
		if($forma_pago_proveedor_session->bitBusquedaDesdeFKSesiontipo_forma_pago!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_forma_pago_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltipo_forma_pago=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_forma_pago=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_forma_pago, '');
				$finalQueryGlobaltipo_forma_pago.=tipo_forma_pago_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_forma_pago.$strRecargarFkQuery;		

				$tipo_forma_pagoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($tipo_forma_pagoLogic->gettipo_forma_pagos() as $tipo_forma_pagoLocal ) {
				if($forma_pago_proveedorForeignKey->idtipo_forma_pagoDefaultFK==0) {
					$forma_pago_proveedorForeignKey->idtipo_forma_pagoDefaultFK=$tipo_forma_pagoLocal->getId();
				}

				$forma_pago_proveedorForeignKey->tipo_forma_pagosFK[$tipo_forma_pagoLocal->getId()]=forma_pago_proveedor_util::gettipo_forma_pagoDescripcion($tipo_forma_pagoLocal);
			}

		} else {

			if($forma_pago_proveedor_session->bigidtipo_forma_pagoActual!=null && $forma_pago_proveedor_session->bigidtipo_forma_pagoActual > 0) {
				$tipo_forma_pagoLogic->getEntity($forma_pago_proveedor_session->bigidtipo_forma_pagoActual);//WithConnection

				$forma_pago_proveedorForeignKey->tipo_forma_pagosFK[$tipo_forma_pagoLogic->gettipo_forma_pago()->getId()]=forma_pago_proveedor_util::gettipo_forma_pagoDescripcion($tipo_forma_pagoLogic->gettipo_forma_pago());
				$forma_pago_proveedorForeignKey->idtipo_forma_pagoDefaultFK=$tipo_forma_pagoLogic->gettipo_forma_pago()->getId();
			}
		}
	}

	public function cargarComboscuentasFK($connexion=null,$strRecargarFkQuery='',$forma_pago_proveedorForeignKey,$forma_pago_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$forma_pago_proveedorForeignKey->cuentasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($forma_pago_proveedor_session==null) {
			$forma_pago_proveedor_session=new forma_pago_proveedor_session();
		}
		
		if($forma_pago_proveedor_session->bitBusquedaDesdeFKSesioncuenta!=true) {
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
				if($forma_pago_proveedorForeignKey->idcuentaDefaultFK==0) {
					$forma_pago_proveedorForeignKey->idcuentaDefaultFK=$cuentaLocal->getId();
				}

				$forma_pago_proveedorForeignKey->cuentasFK[$cuentaLocal->getId()]=forma_pago_proveedor_util::getcuentaDescripcion($cuentaLocal);
			}

		} else {

			if($forma_pago_proveedor_session->bigidcuentaActual!=null && $forma_pago_proveedor_session->bigidcuentaActual > 0) {
				$cuentaLogic->getEntity($forma_pago_proveedor_session->bigidcuentaActual);//WithConnection

				$forma_pago_proveedorForeignKey->cuentasFK[$cuentaLogic->getcuenta()->getId()]=forma_pago_proveedor_util::getcuentaDescripcion($cuentaLogic->getcuenta());
				$forma_pago_proveedorForeignKey->idcuentaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($forma_pago_proveedor,$debitocuentapagars,$documentocuentapagars,$pagocuentapagars) {
		$this->saveRelacionesBase($forma_pago_proveedor,$debitocuentapagars,$documentocuentapagars,$pagocuentapagars,true);
	}

	public function saveRelaciones($forma_pago_proveedor,$debitocuentapagars,$documentocuentapagars,$pagocuentapagars) {
		$this->saveRelacionesBase($forma_pago_proveedor,$debitocuentapagars,$documentocuentapagars,$pagocuentapagars,false);
	}

	public function saveRelacionesBase($forma_pago_proveedor,$debitocuentapagars=array(),$documentocuentapagars=array(),$pagocuentapagars=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$forma_pago_proveedor->setdebito_cuenta_pagars($debitocuentapagars);
			$forma_pago_proveedor->setdocumento_cuenta_pagars($documentocuentapagars);
			$forma_pago_proveedor->setpago_cuenta_pagars($pagocuentapagars);
			$this->setforma_pago_proveedor($forma_pago_proveedor);

			if(true) {

				//forma_pago_proveedor_logic_add::updateRelacionesToSave($forma_pago_proveedor,$this);

				if(($this->forma_pago_proveedor->getIsNew() || $this->forma_pago_proveedor->getIsChanged()) && !$this->forma_pago_proveedor->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($debitocuentapagars,$documentocuentapagars,$pagocuentapagars);

				} else if($this->forma_pago_proveedor->getIsDeleted()) {
					$this->saveRelacionesDetalles($debitocuentapagars,$documentocuentapagars,$pagocuentapagars);
					$this->save();
				}

				//forma_pago_proveedor_logic_add::updateRelacionesToSaveAfter($forma_pago_proveedor,$this);

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
	
	
	public function saveRelacionesDetalles($debitocuentapagars=array(),$documentocuentapagars=array(),$pagocuentapagars=array()) {
		try {
	

			$idforma_pago_proveedorActual=$this->getforma_pago_proveedor()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/debito_cuenta_pagar_carga.php');
			debito_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$debitocuentapagarLogic_Desde_forma_pago_proveedor=new debito_cuenta_pagar_logic();
			$debitocuentapagarLogic_Desde_forma_pago_proveedor->setdebito_cuenta_pagars($debitocuentapagars);

			$debitocuentapagarLogic_Desde_forma_pago_proveedor->setConnexion($this->getConnexion());
			$debitocuentapagarLogic_Desde_forma_pago_proveedor->setDatosCliente($this->datosCliente);

			foreach($debitocuentapagarLogic_Desde_forma_pago_proveedor->getdebito_cuenta_pagars() as $debitocuentapagar_Desde_forma_pago_proveedor) {
				$debitocuentapagar_Desde_forma_pago_proveedor->setid_forma_pago_proveedor($idforma_pago_proveedorActual);
			}

			$debitocuentapagarLogic_Desde_forma_pago_proveedor->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/documento_cuenta_pagar_carga.php');
			documento_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$documentocuentapagarLogic_Desde_forma_pago_proveedor=new documento_cuenta_pagar_logic();
			$documentocuentapagarLogic_Desde_forma_pago_proveedor->setdocumento_cuenta_pagars($documentocuentapagars);

			$documentocuentapagarLogic_Desde_forma_pago_proveedor->setConnexion($this->getConnexion());
			$documentocuentapagarLogic_Desde_forma_pago_proveedor->setDatosCliente($this->datosCliente);

			foreach($documentocuentapagarLogic_Desde_forma_pago_proveedor->getdocumento_cuenta_pagars() as $documentocuentapagar_Desde_forma_pago_proveedor) {
				$documentocuentapagar_Desde_forma_pago_proveedor->setid_forma_pago_proveedor($idforma_pago_proveedorActual);

				$documentocuentapagarLogic_Desde_forma_pago_proveedor->setdocumento_cuenta_pagar($documentocuentapagar_Desde_forma_pago_proveedor);
				$documentocuentapagarLogic_Desde_forma_pago_proveedor->save();

				$iddocumento_cuenta_pagarActual=$documento_cuenta_pagar_Desde_forma_pago_proveedor->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/orden_compra_carga.php');
				orden_compra_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$ordencompraLogic_Desde_documento_cuenta_pagar=new orden_compra_logic();

				if($documento_cuenta_pagar_Desde_forma_pago_proveedor->getorden_compras()==null){
					$documento_cuenta_pagar_Desde_forma_pago_proveedor->setorden_compras(array());
				}

				$ordencompraLogic_Desde_documento_cuenta_pagar->setorden_compras($documento_cuenta_pagar_Desde_forma_pago_proveedor->getorden_compras());

				$ordencompraLogic_Desde_documento_cuenta_pagar->setConnexion($this->getConnexion());
				$ordencompraLogic_Desde_documento_cuenta_pagar->setDatosCliente($this->datosCliente);

				foreach($ordencompraLogic_Desde_documento_cuenta_pagar->getorden_compras() as $ordencompra_Desde_documento_cuenta_pagar) {
					$ordencompra_Desde_documento_cuenta_pagar->setid_documento_cuenta_pagar($iddocumento_cuenta_pagarActual);

					$ordencompraLogic_Desde_documento_cuenta_pagar->setorden_compra($ordencompra_Desde_documento_cuenta_pagar);
					$ordencompraLogic_Desde_documento_cuenta_pagar->save();

					$idorden_compraActual=$orden_compra_Desde_documento_cuenta_pagar->getId();

					include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/orden_compra_detalle_carga.php');
					orden_compra_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

					$ordencompradetalleLogic_Desde_orden_compra=new orden_compra_detalle_logic();

					if($orden_compra_Desde_documento_cuenta_pagar->getorden_compra_detalles()==null){
						$orden_compra_Desde_documento_cuenta_pagar->setorden_compra_detalles(array());
					}

					$ordencompradetalleLogic_Desde_orden_compra->setorden_compra_detalles($orden_compra_Desde_documento_cuenta_pagar->getorden_compra_detalles());

					$ordencompradetalleLogic_Desde_orden_compra->setConnexion($this->getConnexion());
					$ordencompradetalleLogic_Desde_orden_compra->setDatosCliente($this->datosCliente);

					foreach($ordencompradetalleLogic_Desde_orden_compra->getorden_compra_detalles() as $ordencompradetalle_Desde_orden_compra) {
						$ordencompradetalle_Desde_orden_compra->setid_orden_compra($idorden_compraActual);
					}

					$ordencompradetalleLogic_Desde_orden_compra->saves();
				}


				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/imagen_documento_cuenta_pagar_carga.php');
				imagen_documento_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$imagendocumentocuentapagarLogic_Desde_documento_cuenta_pagar=new imagen_documento_cuenta_pagar_logic();

				if($documento_cuenta_pagar_Desde_forma_pago_proveedor->getimagen_documento_cuenta_pagars()==null){
					$documento_cuenta_pagar_Desde_forma_pago_proveedor->setimagen_documento_cuenta_pagars(array());
				}

				$imagendocumentocuentapagarLogic_Desde_documento_cuenta_pagar->setimagen_documento_cuenta_pagars($documento_cuenta_pagar_Desde_forma_pago_proveedor->getimagen_documento_cuenta_pagars());

				$imagendocumentocuentapagarLogic_Desde_documento_cuenta_pagar->setConnexion($this->getConnexion());
				$imagendocumentocuentapagarLogic_Desde_documento_cuenta_pagar->setDatosCliente($this->datosCliente);

				foreach($imagendocumentocuentapagarLogic_Desde_documento_cuenta_pagar->getimagen_documento_cuenta_pagars() as $imagendocumentocuentapagar_Desde_documento_cuenta_pagar) {
					$imagendocumentocuentapagar_Desde_documento_cuenta_pagar->setid_documento_cuenta_pagar($iddocumento_cuenta_pagarActual);
				}

				$imagendocumentocuentapagarLogic_Desde_documento_cuenta_pagar->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/devolucion_carga.php');
				devolucion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$devolucionLogic_Desde_documento_cuenta_pagar=new devolucion_logic();

				if($documento_cuenta_pagar_Desde_forma_pago_proveedor->getdevolucions()==null){
					$documento_cuenta_pagar_Desde_forma_pago_proveedor->setdevolucions(array());
				}

				$devolucionLogic_Desde_documento_cuenta_pagar->setdevolucions($documento_cuenta_pagar_Desde_forma_pago_proveedor->getdevolucions());

				$devolucionLogic_Desde_documento_cuenta_pagar->setConnexion($this->getConnexion());
				$devolucionLogic_Desde_documento_cuenta_pagar->setDatosCliente($this->datosCliente);

				foreach($devolucionLogic_Desde_documento_cuenta_pagar->getdevolucions() as $devolucion_Desde_documento_cuenta_pagar) {
					$devolucion_Desde_documento_cuenta_pagar->setid_documento_cuenta_pagar($iddocumento_cuenta_pagarActual);

					$devolucionLogic_Desde_documento_cuenta_pagar->setdevolucion($devolucion_Desde_documento_cuenta_pagar);
					$devolucionLogic_Desde_documento_cuenta_pagar->save();

					$iddevolucionActual=$devolucion_Desde_documento_cuenta_pagar->getId();

					include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/devolucion_detalle_carga.php');
					devolucion_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

					$devoluciondetalleLogic_Desde_devolucion=new devolucion_detalle_logic();

					if($devolucion_Desde_documento_cuenta_pagar->getdevolucion_detalles()==null){
						$devolucion_Desde_documento_cuenta_pagar->setdevolucion_detalles(array());
					}

					$devoluciondetalleLogic_Desde_devolucion->setdevolucion_detalles($devolucion_Desde_documento_cuenta_pagar->getdevolucion_detalles());

					$devoluciondetalleLogic_Desde_devolucion->setConnexion($this->getConnexion());
					$devoluciondetalleLogic_Desde_devolucion->setDatosCliente($this->datosCliente);

					foreach($devoluciondetalleLogic_Desde_devolucion->getdevolucion_detalles() as $devoluciondetalle_Desde_devolucion) {
						$devoluciondetalle_Desde_devolucion->setid_devolucion($iddevolucionActual);
					}

					$devoluciondetalleLogic_Desde_devolucion->saves();
				}

			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/pago_cuenta_pagar_carga.php');
			pago_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$pagocuentapagarLogic_Desde_forma_pago_proveedor=new pago_cuenta_pagar_logic();
			$pagocuentapagarLogic_Desde_forma_pago_proveedor->setpago_cuenta_pagars($pagocuentapagars);

			$pagocuentapagarLogic_Desde_forma_pago_proveedor->setConnexion($this->getConnexion());
			$pagocuentapagarLogic_Desde_forma_pago_proveedor->setDatosCliente($this->datosCliente);

			foreach($pagocuentapagarLogic_Desde_forma_pago_proveedor->getpago_cuenta_pagars() as $pagocuentapagar_Desde_forma_pago_proveedor) {
				$pagocuentapagar_Desde_forma_pago_proveedor->setid_forma_pago_proveedor($idforma_pago_proveedorActual);
			}

			$pagocuentapagarLogic_Desde_forma_pago_proveedor->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $forma_pago_proveedors,forma_pago_proveedor_param_return $forma_pago_proveedorParameterGeneral) : forma_pago_proveedor_param_return {
		$forma_pago_proveedorReturnGeneral=new forma_pago_proveedor_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $forma_pago_proveedorReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $forma_pago_proveedors,forma_pago_proveedor_param_return $forma_pago_proveedorParameterGeneral) : forma_pago_proveedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$forma_pago_proveedorReturnGeneral=new forma_pago_proveedor_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $forma_pago_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $forma_pago_proveedors,forma_pago_proveedor $forma_pago_proveedor,forma_pago_proveedor_param_return $forma_pago_proveedorParameterGeneral,bool $isEsNuevoforma_pago_proveedor,array $clases) : forma_pago_proveedor_param_return {
		 try {	
			$forma_pago_proveedorReturnGeneral=new forma_pago_proveedor_param_return();
	
			$forma_pago_proveedorReturnGeneral->setforma_pago_proveedor($forma_pago_proveedor);
			$forma_pago_proveedorReturnGeneral->setforma_pago_proveedors($forma_pago_proveedors);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$forma_pago_proveedorReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $forma_pago_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $forma_pago_proveedors,forma_pago_proveedor $forma_pago_proveedor,forma_pago_proveedor_param_return $forma_pago_proveedorParameterGeneral,bool $isEsNuevoforma_pago_proveedor,array $clases) : forma_pago_proveedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$forma_pago_proveedorReturnGeneral=new forma_pago_proveedor_param_return();
	
			$forma_pago_proveedorReturnGeneral->setforma_pago_proveedor($forma_pago_proveedor);
			$forma_pago_proveedorReturnGeneral->setforma_pago_proveedors($forma_pago_proveedors);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$forma_pago_proveedorReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $forma_pago_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $forma_pago_proveedors,forma_pago_proveedor $forma_pago_proveedor,forma_pago_proveedor_param_return $forma_pago_proveedorParameterGeneral,bool $isEsNuevoforma_pago_proveedor,array $clases) : forma_pago_proveedor_param_return {
		 try {	
			$forma_pago_proveedorReturnGeneral=new forma_pago_proveedor_param_return();
	
			$forma_pago_proveedorReturnGeneral->setforma_pago_proveedor($forma_pago_proveedor);
			$forma_pago_proveedorReturnGeneral->setforma_pago_proveedors($forma_pago_proveedors);
			
			
			
			return $forma_pago_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $forma_pago_proveedors,forma_pago_proveedor $forma_pago_proveedor,forma_pago_proveedor_param_return $forma_pago_proveedorParameterGeneral,bool $isEsNuevoforma_pago_proveedor,array $clases) : forma_pago_proveedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$forma_pago_proveedorReturnGeneral=new forma_pago_proveedor_param_return();
	
			$forma_pago_proveedorReturnGeneral->setforma_pago_proveedor($forma_pago_proveedor);
			$forma_pago_proveedorReturnGeneral->setforma_pago_proveedors($forma_pago_proveedors);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $forma_pago_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,forma_pago_proveedor $forma_pago_proveedor,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,forma_pago_proveedor $forma_pago_proveedor,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		forma_pago_proveedor_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		forma_pago_proveedor_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(forma_pago_proveedor $forma_pago_proveedor,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//forma_pago_proveedor_logic_add::updateforma_pago_proveedorToGet($this->forma_pago_proveedor);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$forma_pago_proveedor->setempresa($this->forma_pago_proveedorDataAccess->getempresa($this->connexion,$forma_pago_proveedor));
		$forma_pago_proveedor->settipo_forma_pago($this->forma_pago_proveedorDataAccess->gettipo_forma_pago($this->connexion,$forma_pago_proveedor));
		$forma_pago_proveedor->setcuenta($this->forma_pago_proveedorDataAccess->getcuenta($this->connexion,$forma_pago_proveedor));
		$forma_pago_proveedor->setdebito_cuenta_pagars($this->forma_pago_proveedorDataAccess->getdebito_cuenta_pagars($this->connexion,$forma_pago_proveedor));
		$forma_pago_proveedor->setdocumento_cuenta_pagars($this->forma_pago_proveedorDataAccess->getdocumento_cuenta_pagars($this->connexion,$forma_pago_proveedor));
		$forma_pago_proveedor->setpago_cuenta_pagars($this->forma_pago_proveedorDataAccess->getpago_cuenta_pagars($this->connexion,$forma_pago_proveedor));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$forma_pago_proveedor->setempresa($this->forma_pago_proveedorDataAccess->getempresa($this->connexion,$forma_pago_proveedor));
				continue;
			}

			if($clas->clas==tipo_forma_pago::$class.'') {
				$forma_pago_proveedor->settipo_forma_pago($this->forma_pago_proveedorDataAccess->gettipo_forma_pago($this->connexion,$forma_pago_proveedor));
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$forma_pago_proveedor->setcuenta($this->forma_pago_proveedorDataAccess->getcuenta($this->connexion,$forma_pago_proveedor));
				continue;
			}

			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$forma_pago_proveedor->setdebito_cuenta_pagars($this->forma_pago_proveedorDataAccess->getdebito_cuenta_pagars($this->connexion,$forma_pago_proveedor));

				if($this->isConDeep) {
					$debitocuentapagarLogic= new debito_cuenta_pagar_logic($this->connexion);
					$debitocuentapagarLogic->setdebito_cuenta_pagars($forma_pago_proveedor->getdebito_cuenta_pagars());
					$classesLocal=debito_cuenta_pagar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$debitocuentapagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					debito_cuenta_pagar_util::refrescarFKDescripciones($debitocuentapagarLogic->getdebito_cuenta_pagars());
					$forma_pago_proveedor->setdebito_cuenta_pagars($debitocuentapagarLogic->getdebito_cuenta_pagars());
				}

				continue;
			}

			if($clas->clas==documento_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$forma_pago_proveedor->setdocumento_cuenta_pagars($this->forma_pago_proveedorDataAccess->getdocumento_cuenta_pagars($this->connexion,$forma_pago_proveedor));

				if($this->isConDeep) {
					$documentocuentapagarLogic= new documento_cuenta_pagar_logic($this->connexion);
					$documentocuentapagarLogic->setdocumento_cuenta_pagars($forma_pago_proveedor->getdocumento_cuenta_pagars());
					$classesLocal=documento_cuenta_pagar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$documentocuentapagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					documento_cuenta_pagar_util::refrescarFKDescripciones($documentocuentapagarLogic->getdocumento_cuenta_pagars());
					$forma_pago_proveedor->setdocumento_cuenta_pagars($documentocuentapagarLogic->getdocumento_cuenta_pagars());
				}

				continue;
			}

			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$forma_pago_proveedor->setpago_cuenta_pagars($this->forma_pago_proveedorDataAccess->getpago_cuenta_pagars($this->connexion,$forma_pago_proveedor));

				if($this->isConDeep) {
					$pagocuentapagarLogic= new pago_cuenta_pagar_logic($this->connexion);
					$pagocuentapagarLogic->setpago_cuenta_pagars($forma_pago_proveedor->getpago_cuenta_pagars());
					$classesLocal=pago_cuenta_pagar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$pagocuentapagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					pago_cuenta_pagar_util::refrescarFKDescripciones($pagocuentapagarLogic->getpago_cuenta_pagars());
					$forma_pago_proveedor->setpago_cuenta_pagars($pagocuentapagarLogic->getpago_cuenta_pagars());
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
			$forma_pago_proveedor->setempresa($this->forma_pago_proveedorDataAccess->getempresa($this->connexion,$forma_pago_proveedor));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_forma_pago::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$forma_pago_proveedor->settipo_forma_pago($this->forma_pago_proveedorDataAccess->gettipo_forma_pago($this->connexion,$forma_pago_proveedor));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$forma_pago_proveedor->setcuenta($this->forma_pago_proveedorDataAccess->getcuenta($this->connexion,$forma_pago_proveedor));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_pagar::$class);
			$forma_pago_proveedor->setdebito_cuenta_pagars($this->forma_pago_proveedorDataAccess->getdebito_cuenta_pagars($this->connexion,$forma_pago_proveedor));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(documento_cuenta_pagar::$class);
			$forma_pago_proveedor->setdocumento_cuenta_pagars($this->forma_pago_proveedorDataAccess->getdocumento_cuenta_pagars($this->connexion,$forma_pago_proveedor));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_pagar::$class);
			$forma_pago_proveedor->setpago_cuenta_pagars($this->forma_pago_proveedorDataAccess->getpago_cuenta_pagars($this->connexion,$forma_pago_proveedor));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$forma_pago_proveedor->setempresa($this->forma_pago_proveedorDataAccess->getempresa($this->connexion,$forma_pago_proveedor));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($forma_pago_proveedor->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$forma_pago_proveedor->settipo_forma_pago($this->forma_pago_proveedorDataAccess->gettipo_forma_pago($this->connexion,$forma_pago_proveedor));
		$tipo_forma_pagoLogic= new tipo_forma_pago_logic($this->connexion);
		$tipo_forma_pagoLogic->deepLoad($forma_pago_proveedor->gettipo_forma_pago(),$isDeep,$deepLoadType,$clases);
				
		$forma_pago_proveedor->setcuenta($this->forma_pago_proveedorDataAccess->getcuenta($this->connexion,$forma_pago_proveedor));
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepLoad($forma_pago_proveedor->getcuenta(),$isDeep,$deepLoadType,$clases);
				

		$forma_pago_proveedor->setdebito_cuenta_pagars($this->forma_pago_proveedorDataAccess->getdebito_cuenta_pagars($this->connexion,$forma_pago_proveedor));

		foreach($forma_pago_proveedor->getdebito_cuenta_pagars() as $debitocuentapagar) {
			$debitocuentapagarLogic= new debito_cuenta_pagar_logic($this->connexion);
			$debitocuentapagarLogic->deepLoad($debitocuentapagar,$isDeep,$deepLoadType,$clases);
		}

		$forma_pago_proveedor->setdocumento_cuenta_pagars($this->forma_pago_proveedorDataAccess->getdocumento_cuenta_pagars($this->connexion,$forma_pago_proveedor));

		foreach($forma_pago_proveedor->getdocumento_cuenta_pagars() as $documentocuentapagar) {
			$documentocuentapagarLogic= new documento_cuenta_pagar_logic($this->connexion);
			$documentocuentapagarLogic->deepLoad($documentocuentapagar,$isDeep,$deepLoadType,$clases);
		}

		$forma_pago_proveedor->setpago_cuenta_pagars($this->forma_pago_proveedorDataAccess->getpago_cuenta_pagars($this->connexion,$forma_pago_proveedor));

		foreach($forma_pago_proveedor->getpago_cuenta_pagars() as $pagocuentapagar) {
			$pagocuentapagarLogic= new pago_cuenta_pagar_logic($this->connexion);
			$pagocuentapagarLogic->deepLoad($pagocuentapagar,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$forma_pago_proveedor->setempresa($this->forma_pago_proveedorDataAccess->getempresa($this->connexion,$forma_pago_proveedor));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($forma_pago_proveedor->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_forma_pago::$class.'') {
				$forma_pago_proveedor->settipo_forma_pago($this->forma_pago_proveedorDataAccess->gettipo_forma_pago($this->connexion,$forma_pago_proveedor));
				$tipo_forma_pagoLogic= new tipo_forma_pago_logic($this->connexion);
				$tipo_forma_pagoLogic->deepLoad($forma_pago_proveedor->gettipo_forma_pago(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$forma_pago_proveedor->setcuenta($this->forma_pago_proveedorDataAccess->getcuenta($this->connexion,$forma_pago_proveedor));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($forma_pago_proveedor->getcuenta(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$forma_pago_proveedor->setdebito_cuenta_pagars($this->forma_pago_proveedorDataAccess->getdebito_cuenta_pagars($this->connexion,$forma_pago_proveedor));

				foreach($forma_pago_proveedor->getdebito_cuenta_pagars() as $debitocuentapagar) {
					$debitocuentapagarLogic= new debito_cuenta_pagar_logic($this->connexion);
					$debitocuentapagarLogic->deepLoad($debitocuentapagar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==documento_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$forma_pago_proveedor->setdocumento_cuenta_pagars($this->forma_pago_proveedorDataAccess->getdocumento_cuenta_pagars($this->connexion,$forma_pago_proveedor));

				foreach($forma_pago_proveedor->getdocumento_cuenta_pagars() as $documentocuentapagar) {
					$documentocuentapagarLogic= new documento_cuenta_pagar_logic($this->connexion);
					$documentocuentapagarLogic->deepLoad($documentocuentapagar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$forma_pago_proveedor->setpago_cuenta_pagars($this->forma_pago_proveedorDataAccess->getpago_cuenta_pagars($this->connexion,$forma_pago_proveedor));

				foreach($forma_pago_proveedor->getpago_cuenta_pagars() as $pagocuentapagar) {
					$pagocuentapagarLogic= new pago_cuenta_pagar_logic($this->connexion);
					$pagocuentapagarLogic->deepLoad($pagocuentapagar,$isDeep,$deepLoadType,$clases);
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
			$forma_pago_proveedor->setempresa($this->forma_pago_proveedorDataAccess->getempresa($this->connexion,$forma_pago_proveedor));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($forma_pago_proveedor->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_forma_pago::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$forma_pago_proveedor->settipo_forma_pago($this->forma_pago_proveedorDataAccess->gettipo_forma_pago($this->connexion,$forma_pago_proveedor));
			$tipo_forma_pagoLogic= new tipo_forma_pago_logic($this->connexion);
			$tipo_forma_pagoLogic->deepLoad($forma_pago_proveedor->gettipo_forma_pago(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$forma_pago_proveedor->setcuenta($this->forma_pago_proveedorDataAccess->getcuenta($this->connexion,$forma_pago_proveedor));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($forma_pago_proveedor->getcuenta(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_pagar::$class);
			$forma_pago_proveedor->setdebito_cuenta_pagars($this->forma_pago_proveedorDataAccess->getdebito_cuenta_pagars($this->connexion,$forma_pago_proveedor));

			foreach($forma_pago_proveedor->getdebito_cuenta_pagars() as $debitocuentapagar) {
				$debitocuentapagarLogic= new debito_cuenta_pagar_logic($this->connexion);
				$debitocuentapagarLogic->deepLoad($debitocuentapagar,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(documento_cuenta_pagar::$class);
			$forma_pago_proveedor->setdocumento_cuenta_pagars($this->forma_pago_proveedorDataAccess->getdocumento_cuenta_pagars($this->connexion,$forma_pago_proveedor));

			foreach($forma_pago_proveedor->getdocumento_cuenta_pagars() as $documentocuentapagar) {
				$documentocuentapagarLogic= new documento_cuenta_pagar_logic($this->connexion);
				$documentocuentapagarLogic->deepLoad($documentocuentapagar,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_pagar::$class);
			$forma_pago_proveedor->setpago_cuenta_pagars($this->forma_pago_proveedorDataAccess->getpago_cuenta_pagars($this->connexion,$forma_pago_proveedor));

			foreach($forma_pago_proveedor->getpago_cuenta_pagars() as $pagocuentapagar) {
				$pagocuentapagarLogic= new pago_cuenta_pagar_logic($this->connexion);
				$pagocuentapagarLogic->deepLoad($pagocuentapagar,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(forma_pago_proveedor $forma_pago_proveedor,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//forma_pago_proveedor_logic_add::updateforma_pago_proveedorToSave($this->forma_pago_proveedor);			
			
			if(!$paraDeleteCascade) {				
				forma_pago_proveedor_data::save($forma_pago_proveedor, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($forma_pago_proveedor->getempresa(),$this->connexion);
		tipo_forma_pago_data::save($forma_pago_proveedor->gettipo_forma_pago(),$this->connexion);
		cuenta_data::save($forma_pago_proveedor->getcuenta(),$this->connexion);

		foreach($forma_pago_proveedor->getdebito_cuenta_pagars() as $debitocuentapagar) {
			$debitocuentapagar->setid_forma_pago_proveedor($forma_pago_proveedor->getId());
			debito_cuenta_pagar_data::save($debitocuentapagar,$this->connexion);
		}


		foreach($forma_pago_proveedor->getdocumento_cuenta_pagars() as $documentocuentapagar) {
			$documentocuentapagar->setid_forma_pago_proveedor($forma_pago_proveedor->getId());
			documento_cuenta_pagar_data::save($documentocuentapagar,$this->connexion);
		}


		foreach($forma_pago_proveedor->getpago_cuenta_pagars() as $pagocuentapagar) {
			$pagocuentapagar->setid_forma_pago_proveedor($forma_pago_proveedor->getId());
			pago_cuenta_pagar_data::save($pagocuentapagar,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($forma_pago_proveedor->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_forma_pago::$class.'') {
				tipo_forma_pago_data::save($forma_pago_proveedor->gettipo_forma_pago(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($forma_pago_proveedor->getcuenta(),$this->connexion);
				continue;
			}


			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($forma_pago_proveedor->getdebito_cuenta_pagars() as $debitocuentapagar) {
					$debitocuentapagar->setid_forma_pago_proveedor($forma_pago_proveedor->getId());
					debito_cuenta_pagar_data::save($debitocuentapagar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==documento_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($forma_pago_proveedor->getdocumento_cuenta_pagars() as $documentocuentapagar) {
					$documentocuentapagar->setid_forma_pago_proveedor($forma_pago_proveedor->getId());
					documento_cuenta_pagar_data::save($documentocuentapagar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($forma_pago_proveedor->getpago_cuenta_pagars() as $pagocuentapagar) {
					$pagocuentapagar->setid_forma_pago_proveedor($forma_pago_proveedor->getId());
					pago_cuenta_pagar_data::save($pagocuentapagar,$this->connexion);
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
			empresa_data::save($forma_pago_proveedor->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_forma_pago::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_forma_pago_data::save($forma_pago_proveedor->gettipo_forma_pago(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($forma_pago_proveedor->getcuenta(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_pagar::$class);

			foreach($forma_pago_proveedor->getdebito_cuenta_pagars() as $debitocuentapagar) {
				$debitocuentapagar->setid_forma_pago_proveedor($forma_pago_proveedor->getId());
				debito_cuenta_pagar_data::save($debitocuentapagar,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(documento_cuenta_pagar::$class);

			foreach($forma_pago_proveedor->getdocumento_cuenta_pagars() as $documentocuentapagar) {
				$documentocuentapagar->setid_forma_pago_proveedor($forma_pago_proveedor->getId());
				documento_cuenta_pagar_data::save($documentocuentapagar,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_pagar::$class);

			foreach($forma_pago_proveedor->getpago_cuenta_pagars() as $pagocuentapagar) {
				$pagocuentapagar->setid_forma_pago_proveedor($forma_pago_proveedor->getId());
				pago_cuenta_pagar_data::save($pagocuentapagar,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($forma_pago_proveedor->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($forma_pago_proveedor->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_forma_pago_data::save($forma_pago_proveedor->gettipo_forma_pago(),$this->connexion);
		$tipo_forma_pagoLogic= new tipo_forma_pago_logic($this->connexion);
		$tipo_forma_pagoLogic->deepSave($forma_pago_proveedor->gettipo_forma_pago(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($forma_pago_proveedor->getcuenta(),$this->connexion);
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepSave($forma_pago_proveedor->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($forma_pago_proveedor->getdebito_cuenta_pagars() as $debitocuentapagar) {
			$debitocuentapagarLogic= new debito_cuenta_pagar_logic($this->connexion);
			$debitocuentapagar->setid_forma_pago_proveedor($forma_pago_proveedor->getId());
			debito_cuenta_pagar_data::save($debitocuentapagar,$this->connexion);
			$debitocuentapagarLogic->deepSave($debitocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($forma_pago_proveedor->getdocumento_cuenta_pagars() as $documentocuentapagar) {
			$documentocuentapagarLogic= new documento_cuenta_pagar_logic($this->connexion);
			$documentocuentapagar->setid_forma_pago_proveedor($forma_pago_proveedor->getId());
			documento_cuenta_pagar_data::save($documentocuentapagar,$this->connexion);
			$documentocuentapagarLogic->deepSave($documentocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($forma_pago_proveedor->getpago_cuenta_pagars() as $pagocuentapagar) {
			$pagocuentapagarLogic= new pago_cuenta_pagar_logic($this->connexion);
			$pagocuentapagar->setid_forma_pago_proveedor($forma_pago_proveedor->getId());
			pago_cuenta_pagar_data::save($pagocuentapagar,$this->connexion);
			$pagocuentapagarLogic->deepSave($pagocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($forma_pago_proveedor->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($forma_pago_proveedor->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_forma_pago::$class.'') {
				tipo_forma_pago_data::save($forma_pago_proveedor->gettipo_forma_pago(),$this->connexion);
				$tipo_forma_pagoLogic= new tipo_forma_pago_logic($this->connexion);
				$tipo_forma_pagoLogic->deepSave($forma_pago_proveedor->gettipo_forma_pago(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($forma_pago_proveedor->getcuenta(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($forma_pago_proveedor->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($forma_pago_proveedor->getdebito_cuenta_pagars() as $debitocuentapagar) {
					$debitocuentapagarLogic= new debito_cuenta_pagar_logic($this->connexion);
					$debitocuentapagar->setid_forma_pago_proveedor($forma_pago_proveedor->getId());
					debito_cuenta_pagar_data::save($debitocuentapagar,$this->connexion);
					$debitocuentapagarLogic->deepSave($debitocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==documento_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($forma_pago_proveedor->getdocumento_cuenta_pagars() as $documentocuentapagar) {
					$documentocuentapagarLogic= new documento_cuenta_pagar_logic($this->connexion);
					$documentocuentapagar->setid_forma_pago_proveedor($forma_pago_proveedor->getId());
					documento_cuenta_pagar_data::save($documentocuentapagar,$this->connexion);
					$documentocuentapagarLogic->deepSave($documentocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($forma_pago_proveedor->getpago_cuenta_pagars() as $pagocuentapagar) {
					$pagocuentapagarLogic= new pago_cuenta_pagar_logic($this->connexion);
					$pagocuentapagar->setid_forma_pago_proveedor($forma_pago_proveedor->getId());
					pago_cuenta_pagar_data::save($pagocuentapagar,$this->connexion);
					$pagocuentapagarLogic->deepSave($pagocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($forma_pago_proveedor->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($forma_pago_proveedor->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_forma_pago::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_forma_pago_data::save($forma_pago_proveedor->gettipo_forma_pago(),$this->connexion);
			$tipo_forma_pagoLogic= new tipo_forma_pago_logic($this->connexion);
			$tipo_forma_pagoLogic->deepSave($forma_pago_proveedor->gettipo_forma_pago(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($forma_pago_proveedor->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($forma_pago_proveedor->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_pagar::$class);

			foreach($forma_pago_proveedor->getdebito_cuenta_pagars() as $debitocuentapagar) {
				$debitocuentapagarLogic= new debito_cuenta_pagar_logic($this->connexion);
				$debitocuentapagar->setid_forma_pago_proveedor($forma_pago_proveedor->getId());
				debito_cuenta_pagar_data::save($debitocuentapagar,$this->connexion);
				$debitocuentapagarLogic->deepSave($debitocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(documento_cuenta_pagar::$class);

			foreach($forma_pago_proveedor->getdocumento_cuenta_pagars() as $documentocuentapagar) {
				$documentocuentapagarLogic= new documento_cuenta_pagar_logic($this->connexion);
				$documentocuentapagar->setid_forma_pago_proveedor($forma_pago_proveedor->getId());
				documento_cuenta_pagar_data::save($documentocuentapagar,$this->connexion);
				$documentocuentapagarLogic->deepSave($documentocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_pagar::$class);

			foreach($forma_pago_proveedor->getpago_cuenta_pagars() as $pagocuentapagar) {
				$pagocuentapagarLogic= new pago_cuenta_pagar_logic($this->connexion);
				$pagocuentapagar->setid_forma_pago_proveedor($forma_pago_proveedor->getId());
				pago_cuenta_pagar_data::save($pagocuentapagar,$this->connexion);
				$pagocuentapagarLogic->deepSave($pagocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				forma_pago_proveedor_data::save($forma_pago_proveedor, $this->connexion);
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
			
			$this->deepLoad($this->forma_pago_proveedor,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->forma_pago_proveedors as $forma_pago_proveedor) {
				$this->deepLoad($forma_pago_proveedor,$isDeep,$deepLoadType,$clases);
								
				forma_pago_proveedor_util::refrescarFKDescripciones($this->forma_pago_proveedors);
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
			
			foreach($this->forma_pago_proveedors as $forma_pago_proveedor) {
				$this->deepLoad($forma_pago_proveedor,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->forma_pago_proveedor,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->forma_pago_proveedors as $forma_pago_proveedor) {
				$this->deepSave($forma_pago_proveedor,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->forma_pago_proveedors as $forma_pago_proveedor) {
				$this->deepSave($forma_pago_proveedor,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(tipo_forma_pago::$class);
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
					if($clas->clas==tipo_forma_pago::$class) {
						$classes[]=new Classe(tipo_forma_pago::$class);
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
					if($clas->clas==tipo_forma_pago::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_forma_pago::$class);
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
				
				$classes[]=new Classe(debito_cuenta_pagar::$class);
				$classes[]=new Classe(documento_cuenta_pagar::$class);
				$classes[]=new Classe(pago_cuenta_pagar::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==debito_cuenta_pagar::$class) {
						$classes[]=new Classe(debito_cuenta_pagar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==documento_cuenta_pagar::$class) {
						$classes[]=new Classe(documento_cuenta_pagar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==pago_cuenta_pagar::$class) {
						$classes[]=new Classe(pago_cuenta_pagar::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==debito_cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(debito_cuenta_pagar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==documento_cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(documento_cuenta_pagar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==pago_cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(pago_cuenta_pagar::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getforma_pago_proveedor() : ?forma_pago_proveedor {	
		/*
		forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGet($this->forma_pago_proveedor,$this->datosCliente);
		forma_pago_proveedor_logic_add::updateforma_pago_proveedorToGet($this->forma_pago_proveedor);
		*/
			
		return $this->forma_pago_proveedor;
	}
		
	public function setforma_pago_proveedor(forma_pago_proveedor $newforma_pago_proveedor) {
		$this->forma_pago_proveedor = $newforma_pago_proveedor;
	}
	
	public function getforma_pago_proveedors() : array {		
		/*
		forma_pago_proveedor_logic_add::checkforma_pago_proveedorToGets($this->forma_pago_proveedors,$this->datosCliente);
		
		foreach ($this->forma_pago_proveedors as $forma_pago_proveedorLocal ) {
			forma_pago_proveedor_logic_add::updateforma_pago_proveedorToGet($forma_pago_proveedorLocal);
		}
		*/
		
		return $this->forma_pago_proveedors;
	}
	
	public function setforma_pago_proveedors(array $newforma_pago_proveedors) {
		$this->forma_pago_proveedors = $newforma_pago_proveedors;
	}
	
	public function getforma_pago_proveedorDataAccess() : forma_pago_proveedor_data {
		return $this->forma_pago_proveedorDataAccess;
	}
	
	public function setforma_pago_proveedorDataAccess(forma_pago_proveedor_data $newforma_pago_proveedorDataAccess) {
		$this->forma_pago_proveedorDataAccess = $newforma_pago_proveedorDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        forma_pago_proveedor_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		orden_compra_logic::$logger;
		orden_compra_detalle_logic::$logger;
		imagen_documento_cuenta_pagar_logic::$logger;
		devolucion_logic::$logger;
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
