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

namespace com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_param_return;

use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\presentation\session\forma_pago_cliente_session;

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

use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_util;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\entity\forma_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\data\forma_pago_cliente_data;

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


use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\entity\documento_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\data\documento_cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\logic\documento_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_util;

use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\business\entity\pago_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\business\data\pago_cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\business\logic\pago_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\util\pago_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\util\pago_cuenta_cobrar_util;

use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\business\entity\credito_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\business\data\credito_cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\business\logic\credito_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\util\credito_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\util\credito_cuenta_cobrar_util;

//REL DETALLES

use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
use com\bydan\contabilidad\facturacion\factura\business\logic\factura_logic;
use com\bydan\contabilidad\facturacion\factura_detalle\util\factura_detalle_carga;
use com\bydan\contabilidad\facturacion\factura_detalle\business\logic\factura_detalle_logic;
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\util\imagen_documento_cuenta_cobrar_carga;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_carga;
use com\bydan\contabilidad\facturacion\factura_lote\business\logic\factura_lote_logic;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\util\factura_lote_detalle_carga;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\business\logic\factura_lote_detalle_logic;
use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_carga;
use com\bydan\contabilidad\facturacion\factura_modelo\business\logic\factura_modelo_logic;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura\business\logic\devolucion_factura_logic;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\util\devolucion_factura_detalle_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\business\logic\devolucion_factura_detalle_logic;



class forma_pago_cliente_logic  extends GeneralEntityLogic implements forma_pago_cliente_logicI {	
	/*GENERAL*/
	public forma_pago_cliente_data $forma_pago_clienteDataAccess;
	//public ?forma_pago_cliente_logic_add $forma_pago_clienteLogicAdditional=null;
	public ?forma_pago_cliente $forma_pago_cliente;
	public array $forma_pago_clientes;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->forma_pago_clienteDataAccess = new forma_pago_cliente_data();			
			$this->forma_pago_clientes = array();
			$this->forma_pago_cliente = new forma_pago_cliente();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->forma_pago_clienteLogicAdditional = new forma_pago_cliente_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->forma_pago_clienteLogicAdditional==null) {
		//	$this->forma_pago_clienteLogicAdditional=new forma_pago_cliente_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->forma_pago_clienteDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->forma_pago_clienteDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->forma_pago_clienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->forma_pago_clienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->forma_pago_clientes = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->forma_pago_clientes=$this->forma_pago_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_cliente_util::refrescarFKDescripciones($this->forma_pago_clientes);
			}
			
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGets($this->forma_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_clientes);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->forma_pago_clientes = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->forma_pago_clientes=$this->forma_pago_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_cliente_util::refrescarFKDescripciones($this->forma_pago_clientes);
			}
			
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGets($this->forma_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_clientes);
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
		$this->forma_pago_cliente = new forma_pago_cliente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->forma_pago_cliente=$this->forma_pago_clienteDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->forma_pago_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				forma_pago_cliente_util::refrescarFKDescripcion($this->forma_pago_cliente);
			}
						
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGet($this->forma_pago_cliente,$this->datosCliente);
			//forma_pago_cliente_logic_add::updateforma_pago_clienteToGet($this->forma_pago_cliente);
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
		$this->forma_pago_cliente = new  forma_pago_cliente();
		  		  
        try {		
			$this->forma_pago_cliente=$this->forma_pago_clienteDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->forma_pago_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				forma_pago_cliente_util::refrescarFKDescripcion($this->forma_pago_cliente);
			}
			
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGet($this->forma_pago_cliente,$this->datosCliente);
			//forma_pago_cliente_logic_add::updateforma_pago_clienteToGet($this->forma_pago_cliente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?forma_pago_cliente {
		$forma_pago_clienteLogic = new  forma_pago_cliente_logic();
		  		  
        try {		
			$forma_pago_clienteLogic->setConnexion($connexion);			
			$forma_pago_clienteLogic->getEntity($id);			
			return $forma_pago_clienteLogic->getforma_pago_cliente();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->forma_pago_cliente = new  forma_pago_cliente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->forma_pago_cliente=$this->forma_pago_clienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->forma_pago_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				forma_pago_cliente_util::refrescarFKDescripcion($this->forma_pago_cliente);
			}
			
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGet($this->forma_pago_cliente,$this->datosCliente);
			//forma_pago_cliente_logic_add::updateforma_pago_clienteToGet($this->forma_pago_cliente);
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
		$this->forma_pago_cliente = new  forma_pago_cliente();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->forma_pago_cliente=$this->forma_pago_clienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->forma_pago_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				forma_pago_cliente_util::refrescarFKDescripcion($this->forma_pago_cliente);
			}
			
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGet($this->forma_pago_cliente,$this->datosCliente);
			//forma_pago_cliente_logic_add::updateforma_pago_clienteToGet($this->forma_pago_cliente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?forma_pago_cliente {
		$forma_pago_clienteLogic = new  forma_pago_cliente_logic();
		  		  
        try {		
			$forma_pago_clienteLogic->setConnexion($connexion);			
			$forma_pago_clienteLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $forma_pago_clienteLogic->getforma_pago_cliente();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->forma_pago_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->forma_pago_clientes=$this->forma_pago_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_cliente_util::refrescarFKDescripciones($this->forma_pago_clientes);
			}
			
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGets($this->forma_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_clientes);			
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
		$this->forma_pago_clientes = array();
		  		  
        try {			
			$this->forma_pago_clientes=$this->forma_pago_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_cliente_util::refrescarFKDescripciones($this->forma_pago_clientes);
			}
			
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGets($this->forma_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->forma_pago_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->forma_pago_clientes=$this->forma_pago_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_cliente_util::refrescarFKDescripciones($this->forma_pago_clientes);
			}
			
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGets($this->forma_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_clientes);
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
		$this->forma_pago_clientes = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->forma_pago_clientes=$this->forma_pago_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_cliente_util::refrescarFKDescripciones($this->forma_pago_clientes);
			}
			
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGets($this->forma_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$forma_pago_clienteLogic = new  forma_pago_cliente_logic();
		  		  
        try {		
			$forma_pago_clienteLogic->setConnexion($connexion);			
			$forma_pago_clienteLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $forma_pago_clienteLogic->getforma_pago_clientes();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->forma_pago_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->forma_pago_clientes=$this->forma_pago_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_cliente_util::refrescarFKDescripciones($this->forma_pago_clientes);
			}
			
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGets($this->forma_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_clientes);
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
		$this->forma_pago_clientes = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->forma_pago_clientes=$this->forma_pago_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_cliente_util::refrescarFKDescripciones($this->forma_pago_clientes);
			}
			
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGets($this->forma_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_clientes);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->forma_pago_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->forma_pago_clientes=$this->forma_pago_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_cliente_util::refrescarFKDescripciones($this->forma_pago_clientes);
			}
			
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGets($this->forma_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_clientes);
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
		$this->forma_pago_clientes = array();
		  		  
        try {			
			$this->forma_pago_clientes=$this->forma_pago_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_cliente_util::refrescarFKDescripciones($this->forma_pago_clientes);
			}	
			
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGets($this->forma_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->forma_pago_clientes = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->forma_pago_clientes=$this->forma_pago_clienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_cliente_util::refrescarFKDescripciones($this->forma_pago_clientes);
			}
			
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGets($this->forma_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_clientes);
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
		$this->forma_pago_clientes = array();
		  		  
        try {		
			$this->forma_pago_clientes=$this->forma_pago_clienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_cliente_util::refrescarFKDescripciones($this->forma_pago_clientes);
			}
			
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGets($this->forma_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->forma_pago_clientes);

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
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,forma_pago_cliente_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->forma_pago_clientes=$this->forma_pago_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				forma_pago_cliente_util::refrescarFKDescripciones($this->forma_pago_clientes);
			}
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGets($this->forma_pago_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->forma_pago_clientes);

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
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,forma_pago_cliente_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->forma_pago_clientes=$this->forma_pago_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				forma_pago_cliente_util::refrescarFKDescripciones($this->forma_pago_clientes);
			}
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGets($this->forma_pago_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->forma_pago_clientes);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,forma_pago_cliente_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->forma_pago_clientes=$this->forma_pago_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				forma_pago_cliente_util::refrescarFKDescripciones($this->forma_pago_clientes);
			}
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGets($this->forma_pago_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->forma_pago_clientes);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,forma_pago_cliente_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->forma_pago_clientes=$this->forma_pago_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				forma_pago_cliente_util::refrescarFKDescripciones($this->forma_pago_clientes);
			}
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGets($this->forma_pago_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->forma_pago_clientes);
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
			$parameterSelectionGeneralid_tipo_forma_pago->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_forma_pago,forma_pago_cliente_util::$ID_TIPO_FORMA_PAGO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_forma_pago);

			$this->forma_pago_clientes=$this->forma_pago_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				forma_pago_cliente_util::refrescarFKDescripciones($this->forma_pago_clientes);
			}
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGets($this->forma_pago_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->forma_pago_clientes);

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
			$parameterSelectionGeneralid_tipo_forma_pago->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_forma_pago,forma_pago_cliente_util::$ID_TIPO_FORMA_PAGO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_forma_pago);

			$this->forma_pago_clientes=$this->forma_pago_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				forma_pago_cliente_util::refrescarFKDescripciones($this->forma_pago_clientes);
			}
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToGets($this->forma_pago_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->forma_pago_clientes);
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
						
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToSave($this->forma_pago_cliente,$this->datosCliente,$this->connexion);	       
			//forma_pago_cliente_logic_add::updateforma_pago_clienteToSave($this->forma_pago_cliente);			
			forma_pago_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->forma_pago_cliente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->forma_pago_clienteLogicAdditional->checkGeneralEntityToSave($this,$this->forma_pago_cliente,$this->datosCliente,$this->connexion);
			
			
			forma_pago_cliente_data::save($this->forma_pago_cliente, $this->connexion);	    	       	 				
			//forma_pago_cliente_logic_add::checkforma_pago_clienteToSaveAfter($this->forma_pago_cliente,$this->datosCliente,$this->connexion);			
			//$this->forma_pago_clienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->forma_pago_cliente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->forma_pago_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->forma_pago_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				forma_pago_cliente_util::refrescarFKDescripcion($this->forma_pago_cliente);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->forma_pago_cliente->getIsDeleted()) {
				$this->forma_pago_cliente=null;
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
						
			/*forma_pago_cliente_logic_add::checkforma_pago_clienteToSave($this->forma_pago_cliente,$this->datosCliente,$this->connexion);*/	        
			//forma_pago_cliente_logic_add::updateforma_pago_clienteToSave($this->forma_pago_cliente);			
			//$this->forma_pago_clienteLogicAdditional->checkGeneralEntityToSave($this,$this->forma_pago_cliente,$this->datosCliente,$this->connexion);			
			forma_pago_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->forma_pago_cliente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			forma_pago_cliente_data::save($this->forma_pago_cliente, $this->connexion);	    	       	 						
			/*forma_pago_cliente_logic_add::checkforma_pago_clienteToSaveAfter($this->forma_pago_cliente,$this->datosCliente,$this->connexion);*/			
			//$this->forma_pago_clienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->forma_pago_cliente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->forma_pago_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->forma_pago_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				forma_pago_cliente_util::refrescarFKDescripcion($this->forma_pago_cliente);				
			}
			
			if($this->forma_pago_cliente->getIsDeleted()) {
				$this->forma_pago_cliente=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(forma_pago_cliente $forma_pago_cliente,Connexion $connexion)  {
		$forma_pago_clienteLogic = new  forma_pago_cliente_logic();		  		  
        try {		
			$forma_pago_clienteLogic->setConnexion($connexion);			
			$forma_pago_clienteLogic->setforma_pago_cliente($forma_pago_cliente);			
			$forma_pago_clienteLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*forma_pago_cliente_logic_add::checkforma_pago_clienteToSaves($this->forma_pago_clientes,$this->datosCliente,$this->connexion);*/	        	
			//$this->forma_pago_clienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->forma_pago_clientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->forma_pago_clientes as $forma_pago_clienteLocal) {				
								
				//forma_pago_cliente_logic_add::updateforma_pago_clienteToSave($forma_pago_clienteLocal);	        	
				forma_pago_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$forma_pago_clienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				forma_pago_cliente_data::save($forma_pago_clienteLocal, $this->connexion);				
			}
			
			/*forma_pago_cliente_logic_add::checkforma_pago_clienteToSavesAfter($this->forma_pago_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->forma_pago_clienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->forma_pago_clientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_cliente_util::refrescarFKDescripciones($this->forma_pago_clientes);
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
			/*forma_pago_cliente_logic_add::checkforma_pago_clienteToSaves($this->forma_pago_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->forma_pago_clienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->forma_pago_clientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->forma_pago_clientes as $forma_pago_clienteLocal) {				
								
				//forma_pago_cliente_logic_add::updateforma_pago_clienteToSave($forma_pago_clienteLocal);	        	
				forma_pago_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$forma_pago_clienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				forma_pago_cliente_data::save($forma_pago_clienteLocal, $this->connexion);				
			}			
			
			/*forma_pago_cliente_logic_add::checkforma_pago_clienteToSavesAfter($this->forma_pago_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->forma_pago_clienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->forma_pago_clientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				forma_pago_cliente_util::refrescarFKDescripciones($this->forma_pago_clientes);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $forma_pago_clientes,Connexion $connexion)  {
		$forma_pago_clienteLogic = new  forma_pago_cliente_logic();
		  		  
        try {		
			$forma_pago_clienteLogic->setConnexion($connexion);			
			$forma_pago_clienteLogic->setforma_pago_clientes($forma_pago_clientes);			
			$forma_pago_clienteLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$forma_pago_clientesAux=array();
		
		foreach($this->forma_pago_clientes as $forma_pago_cliente) {
			if($forma_pago_cliente->getIsDeleted()==false) {
				$forma_pago_clientesAux[]=$forma_pago_cliente;
			}
		}
		
		$this->forma_pago_clientes=$forma_pago_clientesAux;
	}
	
	public function updateToGetsAuxiliar(array &$forma_pago_clientes) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->forma_pago_clientes as $forma_pago_cliente) {
				
				$forma_pago_cliente->setid_empresa_Descripcion(forma_pago_cliente_util::getempresaDescripcion($forma_pago_cliente->getempresa()));
				$forma_pago_cliente->setid_tipo_forma_pago_Descripcion(forma_pago_cliente_util::gettipo_forma_pagoDescripcion($forma_pago_cliente->gettipo_forma_pago()));
				$forma_pago_cliente->setid_cuenta_Descripcion(forma_pago_cliente_util::getcuentaDescripcion($forma_pago_cliente->getcuenta()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$forma_pago_cliente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$forma_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$forma_pago_cliente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$forma_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$forma_pago_cliente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$forma_pago_clienteForeignKey=new forma_pago_cliente_param_return();//forma_pago_clienteForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$forma_pago_clienteForeignKey,$forma_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_forma_pago',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_forma_pagosFK($this->connexion,$strRecargarFkQuery,$forma_pago_clienteForeignKey,$forma_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTipos,',')) {
				$this->cargarComboscuentasFK($this->connexion,$strRecargarFkQuery,$forma_pago_clienteForeignKey,$forma_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$forma_pago_clienteForeignKey,$forma_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_forma_pago',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_forma_pagosFK($this->connexion,' where id=-1 ',$forma_pago_clienteForeignKey,$forma_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuentasFK($this->connexion,' where id=-1 ',$forma_pago_clienteForeignKey,$forma_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $forma_pago_clienteForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$forma_pago_clienteForeignKey,$forma_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$forma_pago_clienteForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($forma_pago_cliente_session==null) {
			$forma_pago_cliente_session=new forma_pago_cliente_session();
		}
		
		if($forma_pago_cliente_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($forma_pago_clienteForeignKey->idempresaDefaultFK==0) {
					$forma_pago_clienteForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$forma_pago_clienteForeignKey->empresasFK[$empresaLocal->getId()]=forma_pago_cliente_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($forma_pago_cliente_session->bigidempresaActual!=null && $forma_pago_cliente_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($forma_pago_cliente_session->bigidempresaActual);//WithConnection

				$forma_pago_clienteForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=forma_pago_cliente_util::getempresaDescripcion($empresaLogic->getempresa());
				$forma_pago_clienteForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombostipo_forma_pagosFK($connexion=null,$strRecargarFkQuery='',$forma_pago_clienteForeignKey,$forma_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_forma_pagoLogic= new tipo_forma_pago_logic();
		$pagination= new Pagination();
		$forma_pago_clienteForeignKey->tipo_forma_pagosFK=array();

		$tipo_forma_pagoLogic->setConnexion($connexion);
		$tipo_forma_pagoLogic->gettipo_forma_pagoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($forma_pago_cliente_session==null) {
			$forma_pago_cliente_session=new forma_pago_cliente_session();
		}
		
		if($forma_pago_cliente_session->bitBusquedaDesdeFKSesiontipo_forma_pago!=true) {
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
				if($forma_pago_clienteForeignKey->idtipo_forma_pagoDefaultFK==0) {
					$forma_pago_clienteForeignKey->idtipo_forma_pagoDefaultFK=$tipo_forma_pagoLocal->getId();
				}

				$forma_pago_clienteForeignKey->tipo_forma_pagosFK[$tipo_forma_pagoLocal->getId()]=forma_pago_cliente_util::gettipo_forma_pagoDescripcion($tipo_forma_pagoLocal);
			}

		} else {

			if($forma_pago_cliente_session->bigidtipo_forma_pagoActual!=null && $forma_pago_cliente_session->bigidtipo_forma_pagoActual > 0) {
				$tipo_forma_pagoLogic->getEntity($forma_pago_cliente_session->bigidtipo_forma_pagoActual);//WithConnection

				$forma_pago_clienteForeignKey->tipo_forma_pagosFK[$tipo_forma_pagoLogic->gettipo_forma_pago()->getId()]=forma_pago_cliente_util::gettipo_forma_pagoDescripcion($tipo_forma_pagoLogic->gettipo_forma_pago());
				$forma_pago_clienteForeignKey->idtipo_forma_pagoDefaultFK=$tipo_forma_pagoLogic->gettipo_forma_pago()->getId();
			}
		}
	}

	public function cargarComboscuentasFK($connexion=null,$strRecargarFkQuery='',$forma_pago_clienteForeignKey,$forma_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$forma_pago_clienteForeignKey->cuentasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($forma_pago_cliente_session==null) {
			$forma_pago_cliente_session=new forma_pago_cliente_session();
		}
		
		if($forma_pago_cliente_session->bitBusquedaDesdeFKSesioncuenta!=true) {
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
				if($forma_pago_clienteForeignKey->idcuentaDefaultFK==0) {
					$forma_pago_clienteForeignKey->idcuentaDefaultFK=$cuentaLocal->getId();
				}

				$forma_pago_clienteForeignKey->cuentasFK[$cuentaLocal->getId()]=forma_pago_cliente_util::getcuentaDescripcion($cuentaLocal);
			}

		} else {

			if($forma_pago_cliente_session->bigidcuentaActual!=null && $forma_pago_cliente_session->bigidcuentaActual > 0) {
				$cuentaLogic->getEntity($forma_pago_cliente_session->bigidcuentaActual);//WithConnection

				$forma_pago_clienteForeignKey->cuentasFK[$cuentaLogic->getcuenta()->getId()]=forma_pago_cliente_util::getcuentaDescripcion($cuentaLogic->getcuenta());
				$forma_pago_clienteForeignKey->idcuentaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($forma_pago_cliente,$documentocuentacobrars,$pagocuentacobrars,$creditocuentacobrars) {
		$this->saveRelacionesBase($forma_pago_cliente,$documentocuentacobrars,$pagocuentacobrars,$creditocuentacobrars,true);
	}

	public function saveRelaciones($forma_pago_cliente,$documentocuentacobrars,$pagocuentacobrars,$creditocuentacobrars) {
		$this->saveRelacionesBase($forma_pago_cliente,$documentocuentacobrars,$pagocuentacobrars,$creditocuentacobrars,false);
	}

	public function saveRelacionesBase($forma_pago_cliente,$documentocuentacobrars=array(),$pagocuentacobrars=array(),$creditocuentacobrars=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$forma_pago_cliente->setdocumento_cuenta_cobrars($documentocuentacobrars);
			$forma_pago_cliente->setpago_cuenta_cobrars($pagocuentacobrars);
			$forma_pago_cliente->setcredito_cuenta_cobrars($creditocuentacobrars);
			$this->setforma_pago_cliente($forma_pago_cliente);

			if(true) {

				//forma_pago_cliente_logic_add::updateRelacionesToSave($forma_pago_cliente,$this);

				if(($this->forma_pago_cliente->getIsNew() || $this->forma_pago_cliente->getIsChanged()) && !$this->forma_pago_cliente->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($documentocuentacobrars,$pagocuentacobrars,$creditocuentacobrars);

				} else if($this->forma_pago_cliente->getIsDeleted()) {
					$this->saveRelacionesDetalles($documentocuentacobrars,$pagocuentacobrars,$creditocuentacobrars);
					$this->save();
				}

				//forma_pago_cliente_logic_add::updateRelacionesToSaveAfter($forma_pago_cliente,$this);

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
	
	
	public function saveRelacionesDetalles($documentocuentacobrars=array(),$pagocuentacobrars=array(),$creditocuentacobrars=array()) {
		try {
	

			$idforma_pago_clienteActual=$this->getforma_pago_cliente()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/documento_cuenta_cobrar_carga.php');
			documento_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$documentocuentacobrarLogic_Desde_forma_pago_cliente=new documento_cuenta_cobrar_logic();
			$documentocuentacobrarLogic_Desde_forma_pago_cliente->setdocumento_cuenta_cobrars($documentocuentacobrars);

			$documentocuentacobrarLogic_Desde_forma_pago_cliente->setConnexion($this->getConnexion());
			$documentocuentacobrarLogic_Desde_forma_pago_cliente->setDatosCliente($this->datosCliente);

			foreach($documentocuentacobrarLogic_Desde_forma_pago_cliente->getdocumento_cuenta_cobrars() as $documentocuentacobrar_Desde_forma_pago_cliente) {
				$documentocuentacobrar_Desde_forma_pago_cliente->setid_forma_pago_cliente($idforma_pago_clienteActual);

				$documentocuentacobrarLogic_Desde_forma_pago_cliente->setdocumento_cuenta_cobrar($documentocuentacobrar_Desde_forma_pago_cliente);
				$documentocuentacobrarLogic_Desde_forma_pago_cliente->save();

				$iddocumento_cuenta_cobrarActual=$documento_cuenta_cobrar_Desde_forma_pago_cliente->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_carga.php');
				factura_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$facturaLogic_Desde_documento_cuenta_cobrar=new factura_logic();

				if($documento_cuenta_cobrar_Desde_forma_pago_cliente->getfacturas()==null){
					$documento_cuenta_cobrar_Desde_forma_pago_cliente->setfacturas(array());
				}

				$facturaLogic_Desde_documento_cuenta_cobrar->setfacturas($documento_cuenta_cobrar_Desde_forma_pago_cliente->getfacturas());

				$facturaLogic_Desde_documento_cuenta_cobrar->setConnexion($this->getConnexion());
				$facturaLogic_Desde_documento_cuenta_cobrar->setDatosCliente($this->datosCliente);

				foreach($facturaLogic_Desde_documento_cuenta_cobrar->getfacturas() as $factura_Desde_documento_cuenta_cobrar) {
					$factura_Desde_documento_cuenta_cobrar->setid_documento_cuenta_cobrar($iddocumento_cuenta_cobrarActual);

					$facturaLogic_Desde_documento_cuenta_cobrar->setfactura($factura_Desde_documento_cuenta_cobrar);
					$facturaLogic_Desde_documento_cuenta_cobrar->save();

					$idfacturaActual=$factura_Desde_documento_cuenta_cobrar->getId();

					include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_detalle_carga.php');
					factura_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

					$facturadetalleLogic_Desde_factura=new factura_detalle_logic();

					if($factura_Desde_documento_cuenta_cobrar->getfactura_detalles()==null){
						$factura_Desde_documento_cuenta_cobrar->setfactura_detalles(array());
					}

					$facturadetalleLogic_Desde_factura->setfactura_detalles($factura_Desde_documento_cuenta_cobrar->getfactura_detalles());

					$facturadetalleLogic_Desde_factura->setConnexion($this->getConnexion());
					$facturadetalleLogic_Desde_factura->setDatosCliente($this->datosCliente);

					foreach($facturadetalleLogic_Desde_factura->getfactura_detalles() as $facturadetalle_Desde_factura) {
						$facturadetalle_Desde_factura->setid_factura($idfacturaActual);
					}

					$facturadetalleLogic_Desde_factura->saves();
				}


				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/imagen_documento_cuenta_cobrar_carga.php');
				imagen_documento_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$imagendocumentocuentacobrarLogic_Desde_documento_cuenta_cobrar=new imagen_documento_cuenta_cobrar_logic();

				if($documento_cuenta_cobrar_Desde_forma_pago_cliente->getimagen_documento_cuenta_cobrars()==null){
					$documento_cuenta_cobrar_Desde_forma_pago_cliente->setimagen_documento_cuenta_cobrars(array());
				}

				$imagendocumentocuentacobrarLogic_Desde_documento_cuenta_cobrar->setimagen_documento_cuenta_cobrars($documento_cuenta_cobrar_Desde_forma_pago_cliente->getimagen_documento_cuenta_cobrars());

				$imagendocumentocuentacobrarLogic_Desde_documento_cuenta_cobrar->setConnexion($this->getConnexion());
				$imagendocumentocuentacobrarLogic_Desde_documento_cuenta_cobrar->setDatosCliente($this->datosCliente);

				foreach($imagendocumentocuentacobrarLogic_Desde_documento_cuenta_cobrar->getimagen_documento_cuenta_cobrars() as $imagendocumentocuentacobrar_Desde_documento_cuenta_cobrar) {
					$imagendocumentocuentacobrar_Desde_documento_cuenta_cobrar->setid_documento_cuenta_cobrar($iddocumento_cuenta_cobrarActual);
				}

				$imagendocumentocuentacobrarLogic_Desde_documento_cuenta_cobrar->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_lote_carga.php');
				factura_lote_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$facturaloteLogic_Desde_documento_cuenta_cobrar=new factura_lote_logic();

				if($documento_cuenta_cobrar_Desde_forma_pago_cliente->getfactura_lotes()==null){
					$documento_cuenta_cobrar_Desde_forma_pago_cliente->setfactura_lotes(array());
				}

				$facturaloteLogic_Desde_documento_cuenta_cobrar->setfactura_lotes($documento_cuenta_cobrar_Desde_forma_pago_cliente->getfactura_lotes());

				$facturaloteLogic_Desde_documento_cuenta_cobrar->setConnexion($this->getConnexion());
				$facturaloteLogic_Desde_documento_cuenta_cobrar->setDatosCliente($this->datosCliente);

				foreach($facturaloteLogic_Desde_documento_cuenta_cobrar->getfactura_lotes() as $facturalote_Desde_documento_cuenta_cobrar) {
					$facturalote_Desde_documento_cuenta_cobrar->setid_documento_cuenta_cobrar($iddocumento_cuenta_cobrarActual);

					$facturaloteLogic_Desde_documento_cuenta_cobrar->setfactura_lote($facturalote_Desde_documento_cuenta_cobrar);
					$facturaloteLogic_Desde_documento_cuenta_cobrar->save();

					$idfactura_loteActual=$factura_lote_Desde_documento_cuenta_cobrar->getId();

					include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_lote_detalle_carga.php');
					factura_lote_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

					$facturalotedetalleLogic_Desde_factura_lote=new factura_lote_detalle_logic();

					if($factura_lote_Desde_documento_cuenta_cobrar->getfactura_lote_detalles()==null){
						$factura_lote_Desde_documento_cuenta_cobrar->setfactura_lote_detalles(array());
					}

					$facturalotedetalleLogic_Desde_factura_lote->setfactura_lote_detalles($factura_lote_Desde_documento_cuenta_cobrar->getfactura_lote_detalles());

					$facturalotedetalleLogic_Desde_factura_lote->setConnexion($this->getConnexion());
					$facturalotedetalleLogic_Desde_factura_lote->setDatosCliente($this->datosCliente);

					foreach($facturalotedetalleLogic_Desde_factura_lote->getfactura_lote_detalles() as $facturalotedetalle_Desde_factura_lote) {
						$facturalotedetalle_Desde_factura_lote->setid_factura_lote($idfactura_loteActual);
					}

					$facturalotedetalleLogic_Desde_factura_lote->saves();

					include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_modelo_carga.php');
					factura_modelo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

					$facturamodeloLogic_Desde_factura_lote=new factura_modelo_logic();

					if($factura_lote_Desde_documento_cuenta_cobrar->getfactura_modelos()==null){
						$factura_lote_Desde_documento_cuenta_cobrar->setfactura_modelos(array());
					}

					$facturamodeloLogic_Desde_factura_lote->setfactura_modelos($factura_lote_Desde_documento_cuenta_cobrar->getfactura_modelos());

					$facturamodeloLogic_Desde_factura_lote->setConnexion($this->getConnexion());
					$facturamodeloLogic_Desde_factura_lote->setDatosCliente($this->datosCliente);

					foreach($facturamodeloLogic_Desde_factura_lote->getfactura_modelos() as $facturamodelo_Desde_factura_lote) {
						$facturamodelo_Desde_factura_lote->setid_factura_lote($idfactura_loteActual);
					}

					$facturamodeloLogic_Desde_factura_lote->saves();
				}


				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/devolucion_factura_carga.php');
				devolucion_factura_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$devolucionfacturaLogic_Desde_documento_cuenta_cobrar=new devolucion_factura_logic();

				if($documento_cuenta_cobrar_Desde_forma_pago_cliente->getdevolucion_facturas()==null){
					$documento_cuenta_cobrar_Desde_forma_pago_cliente->setdevolucion_facturas(array());
				}

				$devolucionfacturaLogic_Desde_documento_cuenta_cobrar->setdevolucion_facturas($documento_cuenta_cobrar_Desde_forma_pago_cliente->getdevolucion_facturas());

				$devolucionfacturaLogic_Desde_documento_cuenta_cobrar->setConnexion($this->getConnexion());
				$devolucionfacturaLogic_Desde_documento_cuenta_cobrar->setDatosCliente($this->datosCliente);

				foreach($devolucionfacturaLogic_Desde_documento_cuenta_cobrar->getdevolucion_facturas() as $devolucionfactura_Desde_documento_cuenta_cobrar) {
					$devolucionfactura_Desde_documento_cuenta_cobrar->setid_documento_cuenta_cobrar($iddocumento_cuenta_cobrarActual);

					$devolucionfacturaLogic_Desde_documento_cuenta_cobrar->setdevolucion_factura($devolucionfactura_Desde_documento_cuenta_cobrar);
					$devolucionfacturaLogic_Desde_documento_cuenta_cobrar->save();

					$iddevolucion_facturaActual=$devolucion_factura_Desde_documento_cuenta_cobrar->getId();

					include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/devolucion_factura_detalle_carga.php');
					devolucion_factura_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

					$devolucionfacturadetalleLogic_Desde_devolucion_factura=new devolucion_factura_detalle_logic();

					if($devolucion_factura_Desde_documento_cuenta_cobrar->getdevolucion_factura_detalles()==null){
						$devolucion_factura_Desde_documento_cuenta_cobrar->setdevolucion_factura_detalles(array());
					}

					$devolucionfacturadetalleLogic_Desde_devolucion_factura->setdevolucion_factura_detalles($devolucion_factura_Desde_documento_cuenta_cobrar->getdevolucion_factura_detalles());

					$devolucionfacturadetalleLogic_Desde_devolucion_factura->setConnexion($this->getConnexion());
					$devolucionfacturadetalleLogic_Desde_devolucion_factura->setDatosCliente($this->datosCliente);

					foreach($devolucionfacturadetalleLogic_Desde_devolucion_factura->getdevolucion_factura_detalles() as $devolucionfacturadetalle_Desde_devolucion_factura) {
						$devolucionfacturadetalle_Desde_devolucion_factura->setid_devolucion_factura($iddevolucion_facturaActual);
					}

					$devolucionfacturadetalleLogic_Desde_devolucion_factura->saves();
				}

			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/pago_cuenta_cobrar_carga.php');
			pago_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$pagocuentacobrarLogic_Desde_forma_pago_cliente=new pago_cuenta_cobrar_logic();
			$pagocuentacobrarLogic_Desde_forma_pago_cliente->setpago_cuenta_cobrars($pagocuentacobrars);

			$pagocuentacobrarLogic_Desde_forma_pago_cliente->setConnexion($this->getConnexion());
			$pagocuentacobrarLogic_Desde_forma_pago_cliente->setDatosCliente($this->datosCliente);

			foreach($pagocuentacobrarLogic_Desde_forma_pago_cliente->getpago_cuenta_cobrars() as $pagocuentacobrar_Desde_forma_pago_cliente) {
				$pagocuentacobrar_Desde_forma_pago_cliente->setid_forma_pago_cliente($idforma_pago_clienteActual);
			}

			$pagocuentacobrarLogic_Desde_forma_pago_cliente->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/credito_cuenta_cobrar_carga.php');
			credito_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$creditocuentacobrarLogic_Desde_forma_pago_cliente=new credito_cuenta_cobrar_logic();
			$creditocuentacobrarLogic_Desde_forma_pago_cliente->setcredito_cuenta_cobrars($creditocuentacobrars);

			$creditocuentacobrarLogic_Desde_forma_pago_cliente->setConnexion($this->getConnexion());
			$creditocuentacobrarLogic_Desde_forma_pago_cliente->setDatosCliente($this->datosCliente);

			foreach($creditocuentacobrarLogic_Desde_forma_pago_cliente->getcredito_cuenta_cobrars() as $creditocuentacobrar_Desde_forma_pago_cliente) {
				$creditocuentacobrar_Desde_forma_pago_cliente->setid_forma_pago_cliente($idforma_pago_clienteActual);
			}

			$creditocuentacobrarLogic_Desde_forma_pago_cliente->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $forma_pago_clientes,forma_pago_cliente_param_return $forma_pago_clienteParameterGeneral) : forma_pago_cliente_param_return {
		$forma_pago_clienteReturnGeneral=new forma_pago_cliente_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $forma_pago_clienteReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $forma_pago_clientes,forma_pago_cliente_param_return $forma_pago_clienteParameterGeneral) : forma_pago_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$forma_pago_clienteReturnGeneral=new forma_pago_cliente_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $forma_pago_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $forma_pago_clientes,forma_pago_cliente $forma_pago_cliente,forma_pago_cliente_param_return $forma_pago_clienteParameterGeneral,bool $isEsNuevoforma_pago_cliente,array $clases) : forma_pago_cliente_param_return {
		 try {	
			$forma_pago_clienteReturnGeneral=new forma_pago_cliente_param_return();
	
			$forma_pago_clienteReturnGeneral->setforma_pago_cliente($forma_pago_cliente);
			$forma_pago_clienteReturnGeneral->setforma_pago_clientes($forma_pago_clientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$forma_pago_clienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $forma_pago_clienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $forma_pago_clientes,forma_pago_cliente $forma_pago_cliente,forma_pago_cliente_param_return $forma_pago_clienteParameterGeneral,bool $isEsNuevoforma_pago_cliente,array $clases) : forma_pago_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$forma_pago_clienteReturnGeneral=new forma_pago_cliente_param_return();
	
			$forma_pago_clienteReturnGeneral->setforma_pago_cliente($forma_pago_cliente);
			$forma_pago_clienteReturnGeneral->setforma_pago_clientes($forma_pago_clientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$forma_pago_clienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $forma_pago_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $forma_pago_clientes,forma_pago_cliente $forma_pago_cliente,forma_pago_cliente_param_return $forma_pago_clienteParameterGeneral,bool $isEsNuevoforma_pago_cliente,array $clases) : forma_pago_cliente_param_return {
		 try {	
			$forma_pago_clienteReturnGeneral=new forma_pago_cliente_param_return();
	
			$forma_pago_clienteReturnGeneral->setforma_pago_cliente($forma_pago_cliente);
			$forma_pago_clienteReturnGeneral->setforma_pago_clientes($forma_pago_clientes);
			
			
			
			return $forma_pago_clienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $forma_pago_clientes,forma_pago_cliente $forma_pago_cliente,forma_pago_cliente_param_return $forma_pago_clienteParameterGeneral,bool $isEsNuevoforma_pago_cliente,array $clases) : forma_pago_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$forma_pago_clienteReturnGeneral=new forma_pago_cliente_param_return();
	
			$forma_pago_clienteReturnGeneral->setforma_pago_cliente($forma_pago_cliente);
			$forma_pago_clienteReturnGeneral->setforma_pago_clientes($forma_pago_clientes);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $forma_pago_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,forma_pago_cliente $forma_pago_cliente,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,forma_pago_cliente $forma_pago_cliente,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		forma_pago_cliente_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		forma_pago_cliente_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(forma_pago_cliente $forma_pago_cliente,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//forma_pago_cliente_logic_add::updateforma_pago_clienteToGet($this->forma_pago_cliente);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$forma_pago_cliente->setempresa($this->forma_pago_clienteDataAccess->getempresa($this->connexion,$forma_pago_cliente));
		$forma_pago_cliente->settipo_forma_pago($this->forma_pago_clienteDataAccess->gettipo_forma_pago($this->connexion,$forma_pago_cliente));
		$forma_pago_cliente->setcuenta($this->forma_pago_clienteDataAccess->getcuenta($this->connexion,$forma_pago_cliente));
		$forma_pago_cliente->setdocumento_cuenta_cobrars($this->forma_pago_clienteDataAccess->getdocumento_cuenta_cobrars($this->connexion,$forma_pago_cliente));
		$forma_pago_cliente->setpago_cuenta_cobrars($this->forma_pago_clienteDataAccess->getpago_cuenta_cobrars($this->connexion,$forma_pago_cliente));
		$forma_pago_cliente->setcredito_cuenta_cobrars($this->forma_pago_clienteDataAccess->getcredito_cuenta_cobrars($this->connexion,$forma_pago_cliente));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$forma_pago_cliente->setempresa($this->forma_pago_clienteDataAccess->getempresa($this->connexion,$forma_pago_cliente));
				continue;
			}

			if($clas->clas==tipo_forma_pago::$class.'') {
				$forma_pago_cliente->settipo_forma_pago($this->forma_pago_clienteDataAccess->gettipo_forma_pago($this->connexion,$forma_pago_cliente));
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$forma_pago_cliente->setcuenta($this->forma_pago_clienteDataAccess->getcuenta($this->connexion,$forma_pago_cliente));
				continue;
			}

			if($clas->clas==documento_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$forma_pago_cliente->setdocumento_cuenta_cobrars($this->forma_pago_clienteDataAccess->getdocumento_cuenta_cobrars($this->connexion,$forma_pago_cliente));

				if($this->isConDeep) {
					$documentocuentacobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
					$documentocuentacobrarLogic->setdocumento_cuenta_cobrars($forma_pago_cliente->getdocumento_cuenta_cobrars());
					$classesLocal=documento_cuenta_cobrar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$documentocuentacobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					documento_cuenta_cobrar_util::refrescarFKDescripciones($documentocuentacobrarLogic->getdocumento_cuenta_cobrars());
					$forma_pago_cliente->setdocumento_cuenta_cobrars($documentocuentacobrarLogic->getdocumento_cuenta_cobrars());
				}

				continue;
			}

			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$forma_pago_cliente->setpago_cuenta_cobrars($this->forma_pago_clienteDataAccess->getpago_cuenta_cobrars($this->connexion,$forma_pago_cliente));

				if($this->isConDeep) {
					$pagocuentacobrarLogic= new pago_cuenta_cobrar_logic($this->connexion);
					$pagocuentacobrarLogic->setpago_cuenta_cobrars($forma_pago_cliente->getpago_cuenta_cobrars());
					$classesLocal=pago_cuenta_cobrar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$pagocuentacobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					pago_cuenta_cobrar_util::refrescarFKDescripciones($pagocuentacobrarLogic->getpago_cuenta_cobrars());
					$forma_pago_cliente->setpago_cuenta_cobrars($pagocuentacobrarLogic->getpago_cuenta_cobrars());
				}

				continue;
			}

			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$forma_pago_cliente->setcredito_cuenta_cobrars($this->forma_pago_clienteDataAccess->getcredito_cuenta_cobrars($this->connexion,$forma_pago_cliente));

				if($this->isConDeep) {
					$creditocuentacobrarLogic= new credito_cuenta_cobrar_logic($this->connexion);
					$creditocuentacobrarLogic->setcredito_cuenta_cobrars($forma_pago_cliente->getcredito_cuenta_cobrars());
					$classesLocal=credito_cuenta_cobrar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$creditocuentacobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					credito_cuenta_cobrar_util::refrescarFKDescripciones($creditocuentacobrarLogic->getcredito_cuenta_cobrars());
					$forma_pago_cliente->setcredito_cuenta_cobrars($creditocuentacobrarLogic->getcredito_cuenta_cobrars());
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
			$forma_pago_cliente->setempresa($this->forma_pago_clienteDataAccess->getempresa($this->connexion,$forma_pago_cliente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_forma_pago::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$forma_pago_cliente->settipo_forma_pago($this->forma_pago_clienteDataAccess->gettipo_forma_pago($this->connexion,$forma_pago_cliente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$forma_pago_cliente->setcuenta($this->forma_pago_clienteDataAccess->getcuenta($this->connexion,$forma_pago_cliente));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(documento_cuenta_cobrar::$class);
			$forma_pago_cliente->setdocumento_cuenta_cobrars($this->forma_pago_clienteDataAccess->getdocumento_cuenta_cobrars($this->connexion,$forma_pago_cliente));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_cobrar::$class);
			$forma_pago_cliente->setpago_cuenta_cobrars($this->forma_pago_clienteDataAccess->getpago_cuenta_cobrars($this->connexion,$forma_pago_cliente));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_cobrar::$class);
			$forma_pago_cliente->setcredito_cuenta_cobrars($this->forma_pago_clienteDataAccess->getcredito_cuenta_cobrars($this->connexion,$forma_pago_cliente));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$forma_pago_cliente->setempresa($this->forma_pago_clienteDataAccess->getempresa($this->connexion,$forma_pago_cliente));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($forma_pago_cliente->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$forma_pago_cliente->settipo_forma_pago($this->forma_pago_clienteDataAccess->gettipo_forma_pago($this->connexion,$forma_pago_cliente));
		$tipo_forma_pagoLogic= new tipo_forma_pago_logic($this->connexion);
		$tipo_forma_pagoLogic->deepLoad($forma_pago_cliente->gettipo_forma_pago(),$isDeep,$deepLoadType,$clases);
				
		$forma_pago_cliente->setcuenta($this->forma_pago_clienteDataAccess->getcuenta($this->connexion,$forma_pago_cliente));
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepLoad($forma_pago_cliente->getcuenta(),$isDeep,$deepLoadType,$clases);
				

		$forma_pago_cliente->setdocumento_cuenta_cobrars($this->forma_pago_clienteDataAccess->getdocumento_cuenta_cobrars($this->connexion,$forma_pago_cliente));

		foreach($forma_pago_cliente->getdocumento_cuenta_cobrars() as $documentocuentacobrar) {
			$documentocuentacobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
			$documentocuentacobrarLogic->deepLoad($documentocuentacobrar,$isDeep,$deepLoadType,$clases);
		}

		$forma_pago_cliente->setpago_cuenta_cobrars($this->forma_pago_clienteDataAccess->getpago_cuenta_cobrars($this->connexion,$forma_pago_cliente));

		foreach($forma_pago_cliente->getpago_cuenta_cobrars() as $pagocuentacobrar) {
			$pagocuentacobrarLogic= new pago_cuenta_cobrar_logic($this->connexion);
			$pagocuentacobrarLogic->deepLoad($pagocuentacobrar,$isDeep,$deepLoadType,$clases);
		}

		$forma_pago_cliente->setcredito_cuenta_cobrars($this->forma_pago_clienteDataAccess->getcredito_cuenta_cobrars($this->connexion,$forma_pago_cliente));

		foreach($forma_pago_cliente->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
			$creditocuentacobrarLogic= new credito_cuenta_cobrar_logic($this->connexion);
			$creditocuentacobrarLogic->deepLoad($creditocuentacobrar,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$forma_pago_cliente->setempresa($this->forma_pago_clienteDataAccess->getempresa($this->connexion,$forma_pago_cliente));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($forma_pago_cliente->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_forma_pago::$class.'') {
				$forma_pago_cliente->settipo_forma_pago($this->forma_pago_clienteDataAccess->gettipo_forma_pago($this->connexion,$forma_pago_cliente));
				$tipo_forma_pagoLogic= new tipo_forma_pago_logic($this->connexion);
				$tipo_forma_pagoLogic->deepLoad($forma_pago_cliente->gettipo_forma_pago(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$forma_pago_cliente->setcuenta($this->forma_pago_clienteDataAccess->getcuenta($this->connexion,$forma_pago_cliente));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($forma_pago_cliente->getcuenta(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==documento_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$forma_pago_cliente->setdocumento_cuenta_cobrars($this->forma_pago_clienteDataAccess->getdocumento_cuenta_cobrars($this->connexion,$forma_pago_cliente));

				foreach($forma_pago_cliente->getdocumento_cuenta_cobrars() as $documentocuentacobrar) {
					$documentocuentacobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
					$documentocuentacobrarLogic->deepLoad($documentocuentacobrar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$forma_pago_cliente->setpago_cuenta_cobrars($this->forma_pago_clienteDataAccess->getpago_cuenta_cobrars($this->connexion,$forma_pago_cliente));

				foreach($forma_pago_cliente->getpago_cuenta_cobrars() as $pagocuentacobrar) {
					$pagocuentacobrarLogic= new pago_cuenta_cobrar_logic($this->connexion);
					$pagocuentacobrarLogic->deepLoad($pagocuentacobrar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$forma_pago_cliente->setcredito_cuenta_cobrars($this->forma_pago_clienteDataAccess->getcredito_cuenta_cobrars($this->connexion,$forma_pago_cliente));

				foreach($forma_pago_cliente->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
					$creditocuentacobrarLogic= new credito_cuenta_cobrar_logic($this->connexion);
					$creditocuentacobrarLogic->deepLoad($creditocuentacobrar,$isDeep,$deepLoadType,$clases);
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
			$forma_pago_cliente->setempresa($this->forma_pago_clienteDataAccess->getempresa($this->connexion,$forma_pago_cliente));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($forma_pago_cliente->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_forma_pago::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$forma_pago_cliente->settipo_forma_pago($this->forma_pago_clienteDataAccess->gettipo_forma_pago($this->connexion,$forma_pago_cliente));
			$tipo_forma_pagoLogic= new tipo_forma_pago_logic($this->connexion);
			$tipo_forma_pagoLogic->deepLoad($forma_pago_cliente->gettipo_forma_pago(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$forma_pago_cliente->setcuenta($this->forma_pago_clienteDataAccess->getcuenta($this->connexion,$forma_pago_cliente));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($forma_pago_cliente->getcuenta(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(documento_cuenta_cobrar::$class);
			$forma_pago_cliente->setdocumento_cuenta_cobrars($this->forma_pago_clienteDataAccess->getdocumento_cuenta_cobrars($this->connexion,$forma_pago_cliente));

			foreach($forma_pago_cliente->getdocumento_cuenta_cobrars() as $documentocuentacobrar) {
				$documentocuentacobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
				$documentocuentacobrarLogic->deepLoad($documentocuentacobrar,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_cobrar::$class);
			$forma_pago_cliente->setpago_cuenta_cobrars($this->forma_pago_clienteDataAccess->getpago_cuenta_cobrars($this->connexion,$forma_pago_cliente));

			foreach($forma_pago_cliente->getpago_cuenta_cobrars() as $pagocuentacobrar) {
				$pagocuentacobrarLogic= new pago_cuenta_cobrar_logic($this->connexion);
				$pagocuentacobrarLogic->deepLoad($pagocuentacobrar,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_cobrar::$class);
			$forma_pago_cliente->setcredito_cuenta_cobrars($this->forma_pago_clienteDataAccess->getcredito_cuenta_cobrars($this->connexion,$forma_pago_cliente));

			foreach($forma_pago_cliente->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
				$creditocuentacobrarLogic= new credito_cuenta_cobrar_logic($this->connexion);
				$creditocuentacobrarLogic->deepLoad($creditocuentacobrar,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(forma_pago_cliente $forma_pago_cliente,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//forma_pago_cliente_logic_add::updateforma_pago_clienteToSave($this->forma_pago_cliente);			
			
			if(!$paraDeleteCascade) {				
				forma_pago_cliente_data::save($forma_pago_cliente, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($forma_pago_cliente->getempresa(),$this->connexion);
		tipo_forma_pago_data::save($forma_pago_cliente->gettipo_forma_pago(),$this->connexion);
		cuenta_data::save($forma_pago_cliente->getcuenta(),$this->connexion);

		foreach($forma_pago_cliente->getdocumento_cuenta_cobrars() as $documentocuentacobrar) {
			$documentocuentacobrar->setid_forma_pago_cliente($forma_pago_cliente->getId());
			documento_cuenta_cobrar_data::save($documentocuentacobrar,$this->connexion);
		}


		foreach($forma_pago_cliente->getpago_cuenta_cobrars() as $pagocuentacobrar) {
			$pagocuentacobrar->setid_forma_pago_cliente($forma_pago_cliente->getId());
			pago_cuenta_cobrar_data::save($pagocuentacobrar,$this->connexion);
		}


		foreach($forma_pago_cliente->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
			$creditocuentacobrar->setid_forma_pago_cliente($forma_pago_cliente->getId());
			credito_cuenta_cobrar_data::save($creditocuentacobrar,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($forma_pago_cliente->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_forma_pago::$class.'') {
				tipo_forma_pago_data::save($forma_pago_cliente->gettipo_forma_pago(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($forma_pago_cliente->getcuenta(),$this->connexion);
				continue;
			}


			if($clas->clas==documento_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($forma_pago_cliente->getdocumento_cuenta_cobrars() as $documentocuentacobrar) {
					$documentocuentacobrar->setid_forma_pago_cliente($forma_pago_cliente->getId());
					documento_cuenta_cobrar_data::save($documentocuentacobrar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($forma_pago_cliente->getpago_cuenta_cobrars() as $pagocuentacobrar) {
					$pagocuentacobrar->setid_forma_pago_cliente($forma_pago_cliente->getId());
					pago_cuenta_cobrar_data::save($pagocuentacobrar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($forma_pago_cliente->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
					$creditocuentacobrar->setid_forma_pago_cliente($forma_pago_cliente->getId());
					credito_cuenta_cobrar_data::save($creditocuentacobrar,$this->connexion);
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
			empresa_data::save($forma_pago_cliente->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_forma_pago::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_forma_pago_data::save($forma_pago_cliente->gettipo_forma_pago(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($forma_pago_cliente->getcuenta(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(documento_cuenta_cobrar::$class);

			foreach($forma_pago_cliente->getdocumento_cuenta_cobrars() as $documentocuentacobrar) {
				$documentocuentacobrar->setid_forma_pago_cliente($forma_pago_cliente->getId());
				documento_cuenta_cobrar_data::save($documentocuentacobrar,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_cobrar::$class);

			foreach($forma_pago_cliente->getpago_cuenta_cobrars() as $pagocuentacobrar) {
				$pagocuentacobrar->setid_forma_pago_cliente($forma_pago_cliente->getId());
				pago_cuenta_cobrar_data::save($pagocuentacobrar,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_cobrar::$class);

			foreach($forma_pago_cliente->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
				$creditocuentacobrar->setid_forma_pago_cliente($forma_pago_cliente->getId());
				credito_cuenta_cobrar_data::save($creditocuentacobrar,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($forma_pago_cliente->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($forma_pago_cliente->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_forma_pago_data::save($forma_pago_cliente->gettipo_forma_pago(),$this->connexion);
		$tipo_forma_pagoLogic= new tipo_forma_pago_logic($this->connexion);
		$tipo_forma_pagoLogic->deepSave($forma_pago_cliente->gettipo_forma_pago(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($forma_pago_cliente->getcuenta(),$this->connexion);
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepSave($forma_pago_cliente->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($forma_pago_cliente->getdocumento_cuenta_cobrars() as $documentocuentacobrar) {
			$documentocuentacobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
			$documentocuentacobrar->setid_forma_pago_cliente($forma_pago_cliente->getId());
			documento_cuenta_cobrar_data::save($documentocuentacobrar,$this->connexion);
			$documentocuentacobrarLogic->deepSave($documentocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($forma_pago_cliente->getpago_cuenta_cobrars() as $pagocuentacobrar) {
			$pagocuentacobrarLogic= new pago_cuenta_cobrar_logic($this->connexion);
			$pagocuentacobrar->setid_forma_pago_cliente($forma_pago_cliente->getId());
			pago_cuenta_cobrar_data::save($pagocuentacobrar,$this->connexion);
			$pagocuentacobrarLogic->deepSave($pagocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($forma_pago_cliente->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
			$creditocuentacobrarLogic= new credito_cuenta_cobrar_logic($this->connexion);
			$creditocuentacobrar->setid_forma_pago_cliente($forma_pago_cliente->getId());
			credito_cuenta_cobrar_data::save($creditocuentacobrar,$this->connexion);
			$creditocuentacobrarLogic->deepSave($creditocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($forma_pago_cliente->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($forma_pago_cliente->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_forma_pago::$class.'') {
				tipo_forma_pago_data::save($forma_pago_cliente->gettipo_forma_pago(),$this->connexion);
				$tipo_forma_pagoLogic= new tipo_forma_pago_logic($this->connexion);
				$tipo_forma_pagoLogic->deepSave($forma_pago_cliente->gettipo_forma_pago(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($forma_pago_cliente->getcuenta(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($forma_pago_cliente->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==documento_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($forma_pago_cliente->getdocumento_cuenta_cobrars() as $documentocuentacobrar) {
					$documentocuentacobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
					$documentocuentacobrar->setid_forma_pago_cliente($forma_pago_cliente->getId());
					documento_cuenta_cobrar_data::save($documentocuentacobrar,$this->connexion);
					$documentocuentacobrarLogic->deepSave($documentocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($forma_pago_cliente->getpago_cuenta_cobrars() as $pagocuentacobrar) {
					$pagocuentacobrarLogic= new pago_cuenta_cobrar_logic($this->connexion);
					$pagocuentacobrar->setid_forma_pago_cliente($forma_pago_cliente->getId());
					pago_cuenta_cobrar_data::save($pagocuentacobrar,$this->connexion);
					$pagocuentacobrarLogic->deepSave($pagocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($forma_pago_cliente->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
					$creditocuentacobrarLogic= new credito_cuenta_cobrar_logic($this->connexion);
					$creditocuentacobrar->setid_forma_pago_cliente($forma_pago_cliente->getId());
					credito_cuenta_cobrar_data::save($creditocuentacobrar,$this->connexion);
					$creditocuentacobrarLogic->deepSave($creditocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($forma_pago_cliente->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($forma_pago_cliente->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_forma_pago::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_forma_pago_data::save($forma_pago_cliente->gettipo_forma_pago(),$this->connexion);
			$tipo_forma_pagoLogic= new tipo_forma_pago_logic($this->connexion);
			$tipo_forma_pagoLogic->deepSave($forma_pago_cliente->gettipo_forma_pago(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($forma_pago_cliente->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($forma_pago_cliente->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(documento_cuenta_cobrar::$class);

			foreach($forma_pago_cliente->getdocumento_cuenta_cobrars() as $documentocuentacobrar) {
				$documentocuentacobrarLogic= new documento_cuenta_cobrar_logic($this->connexion);
				$documentocuentacobrar->setid_forma_pago_cliente($forma_pago_cliente->getId());
				documento_cuenta_cobrar_data::save($documentocuentacobrar,$this->connexion);
				$documentocuentacobrarLogic->deepSave($documentocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pago_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(pago_cuenta_cobrar::$class);

			foreach($forma_pago_cliente->getpago_cuenta_cobrars() as $pagocuentacobrar) {
				$pagocuentacobrarLogic= new pago_cuenta_cobrar_logic($this->connexion);
				$pagocuentacobrar->setid_forma_pago_cliente($forma_pago_cliente->getId());
				pago_cuenta_cobrar_data::save($pagocuentacobrar,$this->connexion);
				$pagocuentacobrarLogic->deepSave($pagocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==credito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(credito_cuenta_cobrar::$class);

			foreach($forma_pago_cliente->getcredito_cuenta_cobrars() as $creditocuentacobrar) {
				$creditocuentacobrarLogic= new credito_cuenta_cobrar_logic($this->connexion);
				$creditocuentacobrar->setid_forma_pago_cliente($forma_pago_cliente->getId());
				credito_cuenta_cobrar_data::save($creditocuentacobrar,$this->connexion);
				$creditocuentacobrarLogic->deepSave($creditocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				forma_pago_cliente_data::save($forma_pago_cliente, $this->connexion);
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
			
			$this->deepLoad($this->forma_pago_cliente,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->forma_pago_clientes as $forma_pago_cliente) {
				$this->deepLoad($forma_pago_cliente,$isDeep,$deepLoadType,$clases);
								
				forma_pago_cliente_util::refrescarFKDescripciones($this->forma_pago_clientes);
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
			
			foreach($this->forma_pago_clientes as $forma_pago_cliente) {
				$this->deepLoad($forma_pago_cliente,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->forma_pago_cliente,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->forma_pago_clientes as $forma_pago_cliente) {
				$this->deepSave($forma_pago_cliente,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->forma_pago_clientes as $forma_pago_cliente) {
				$this->deepSave($forma_pago_cliente,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(documento_cuenta_cobrar::$class);
				$classes[]=new Classe(pago_cuenta_cobrar::$class);
				$classes[]=new Classe(credito_cuenta_cobrar::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==documento_cuenta_cobrar::$class) {
						$classes[]=new Classe(documento_cuenta_cobrar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==pago_cuenta_cobrar::$class) {
						$classes[]=new Classe(pago_cuenta_cobrar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==credito_cuenta_cobrar::$class) {
						$classes[]=new Classe(credito_cuenta_cobrar::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==documento_cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(documento_cuenta_cobrar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==pago_cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(pago_cuenta_cobrar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==credito_cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(credito_cuenta_cobrar::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getforma_pago_cliente() : ?forma_pago_cliente {	
		/*
		forma_pago_cliente_logic_add::checkforma_pago_clienteToGet($this->forma_pago_cliente,$this->datosCliente);
		forma_pago_cliente_logic_add::updateforma_pago_clienteToGet($this->forma_pago_cliente);
		*/
			
		return $this->forma_pago_cliente;
	}
		
	public function setforma_pago_cliente(forma_pago_cliente $newforma_pago_cliente) {
		$this->forma_pago_cliente = $newforma_pago_cliente;
	}
	
	public function getforma_pago_clientes() : array {		
		/*
		forma_pago_cliente_logic_add::checkforma_pago_clienteToGets($this->forma_pago_clientes,$this->datosCliente);
		
		foreach ($this->forma_pago_clientes as $forma_pago_clienteLocal ) {
			forma_pago_cliente_logic_add::updateforma_pago_clienteToGet($forma_pago_clienteLocal);
		}
		*/
		
		return $this->forma_pago_clientes;
	}
	
	public function setforma_pago_clientes(array $newforma_pago_clientes) {
		$this->forma_pago_clientes = $newforma_pago_clientes;
	}
	
	public function getforma_pago_clienteDataAccess() : forma_pago_cliente_data {
		return $this->forma_pago_clienteDataAccess;
	}
	
	public function setforma_pago_clienteDataAccess(forma_pago_cliente_data $newforma_pago_clienteDataAccess) {
		$this->forma_pago_clienteDataAccess = $newforma_pago_clienteDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        forma_pago_cliente_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		factura_logic::$logger;
		factura_detalle_logic::$logger;
		imagen_documento_cuenta_cobrar_logic::$logger;
		factura_lote_logic::$logger;
		factura_lote_detalle_logic::$logger;
		factura_modelo_logic::$logger;
		devolucion_factura_logic::$logger;
		devolucion_factura_detalle_logic::$logger;
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
