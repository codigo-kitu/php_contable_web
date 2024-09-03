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

namespace com\bydan\contabilidad\contabilidad\cuenta\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_param_return;

use com\bydan\contabilidad\contabilidad\cuenta\presentation\session\cuenta_session;

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

use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\entity\tipo_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\data\tipo_cuenta_data;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\logic\tipo_cuenta_logic;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_util;

use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\entity\tipo_nivel_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\data\tipo_nivel_cuenta_data;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\logic\tipo_nivel_cuenta_logic;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\util\tipo_nivel_cuenta_util;

//REL


use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\entity\categoria_cheque;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\data\categoria_cheque_data;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\logic\categoria_cheque_logic;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_util;

use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\data\otro_impuesto_data;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\logic\otro_impuesto_logic;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_carga;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_util;

use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;
use com\bydan\contabilidad\facturacion\impuesto\business\data\impuesto_data;
use com\bydan\contabilidad\facturacion\impuesto\business\logic\impuesto_logic;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_carga;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_util;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\data\cuenta_corriente_data;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\business\entity\instrumento_pago;
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\business\data\instrumento_pago_data;
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\business\logic\instrumento_pago_logic;
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\util\instrumento_pago_carga;
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\util\instrumento_pago_util;

use com\bydan\contabilidad\inventario\lista_producto\business\entity\lista_producto;
use com\bydan\contabilidad\inventario\lista_producto\business\data\lista_producto_data;
use com\bydan\contabilidad\inventario\lista_producto\business\logic\lista_producto_logic;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;

use com\bydan\contabilidad\contabilidad\asiento_detalle\business\entity\asiento_detalle;
use com\bydan\contabilidad\contabilidad\asiento_detalle\business\data\asiento_detalle_data;
use com\bydan\contabilidad\contabilidad\asiento_detalle\business\logic\asiento_detalle_logic;
use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_util;

use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;
use com\bydan\contabilidad\facturacion\retencion\business\data\retencion_data;
use com\bydan\contabilidad\facturacion\retencion\business\logic\retencion_logic;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_carga;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_util;

use com\bydan\contabilidad\facturacion\retencion_fuente\business\entity\retencion_fuente;
use com\bydan\contabilidad\facturacion\retencion_fuente\business\data\retencion_fuente_data;
use com\bydan\contabilidad\facturacion\retencion_fuente\business\logic\retencion_fuente_logic;
use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_carga;
use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\entity\forma_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\data\forma_pago_cliente_data;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\logic\forma_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_util;

use com\bydan\contabilidad\contabilidad\saldo_cuenta\business\entity\saldo_cuenta;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\business\data\saldo_cuenta_data;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\business\logic\saldo_cuenta_logic;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_carga;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_util;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\data\termino_pago_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;

use com\bydan\contabilidad\facturacion\retencion_ica\business\entity\retencion_ica;
use com\bydan\contabilidad\facturacion\retencion_ica\business\data\retencion_ica_data;
use com\bydan\contabilidad\facturacion\retencion_ica\business\logic\retencion_ica_logic;
use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_carga;
use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_util;

use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\business\entity\asiento_predefinido_detalle;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\business\data\asiento_predefinido_detalle_data;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\business\logic\asiento_predefinido_detalle_logic;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\business\entity\asiento_automatico_detalle;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\business\data\asiento_automatico_detalle_data;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\business\logic\asiento_automatico_detalle_logic;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_util;

use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\entity\forma_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\data\forma_pago_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\logic\forma_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_util;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\data\termino_pago_cliente_data;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

//REL DETALLES

use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\logic\cheque_cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\logic\clasificacion_cheque_logic;



class cuenta_logic  extends GeneralEntityLogic implements cuenta_logicI {	
	/*GENERAL*/
	public cuenta_data $cuentaDataAccess;
	//public ?cuenta_logic_add $cuentaLogicAdditional=null;
	public ?cuenta $cuenta;
	public array $cuentas;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->cuentaDataAccess = new cuenta_data();			
			$this->cuentas = array();
			$this->cuenta = new cuenta();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->cuentaLogicAdditional = new cuenta_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->cuentaLogicAdditional==null) {
		//	$this->cuentaLogicAdditional=new cuenta_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->cuentaDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->cuentaDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->cuentaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->cuentaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->cuentas = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuentas=$this->cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_util::refrescarFKDescripciones($this->cuentas);
			}
			
			//cuenta_logic_add::checkcuentaToGets($this->cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuentas);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->cuentas = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuentas=$this->cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_util::refrescarFKDescripciones($this->cuentas);
			}
			
			//cuenta_logic_add::checkcuentaToGets($this->cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuentas);
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
		$this->cuenta = new cuenta();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->cuenta=$this->cuentaDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_util::refrescarFKDescripcion($this->cuenta);
			}
						
			//cuenta_logic_add::checkcuentaToGet($this->cuenta,$this->datosCliente);
			//cuenta_logic_add::updatecuentaToGet($this->cuenta);
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
		$this->cuenta = new  cuenta();
		  		  
        try {		
			$this->cuenta=$this->cuentaDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_util::refrescarFKDescripcion($this->cuenta);
			}
			
			//cuenta_logic_add::checkcuentaToGet($this->cuenta,$this->datosCliente);
			//cuenta_logic_add::updatecuentaToGet($this->cuenta);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?cuenta {
		$cuentaLogic = new  cuenta_logic();
		  		  
        try {		
			$cuentaLogic->setConnexion($connexion);			
			$cuentaLogic->getEntity($id);			
			return $cuentaLogic->getcuenta();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->cuenta = new  cuenta();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->cuenta=$this->cuentaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_util::refrescarFKDescripcion($this->cuenta);
			}
			
			//cuenta_logic_add::checkcuentaToGet($this->cuenta,$this->datosCliente);
			//cuenta_logic_add::updatecuentaToGet($this->cuenta);
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
		$this->cuenta = new  cuenta();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuenta=$this->cuentaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cuenta_util::refrescarFKDescripcion($this->cuenta);
			}
			
			//cuenta_logic_add::checkcuentaToGet($this->cuenta,$this->datosCliente);
			//cuenta_logic_add::updatecuentaToGet($this->cuenta);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?cuenta {
		$cuentaLogic = new  cuenta_logic();
		  		  
        try {		
			$cuentaLogic->setConnexion($connexion);			
			$cuentaLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $cuentaLogic->getcuenta();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cuentas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cuentas=$this->cuentaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_util::refrescarFKDescripciones($this->cuentas);
			}
			
			//cuenta_logic_add::checkcuentaToGets($this->cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuentas);			
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
		$this->cuentas = array();
		  		  
        try {			
			$this->cuentas=$this->cuentaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_util::refrescarFKDescripciones($this->cuentas);
			}
			
			//cuenta_logic_add::checkcuentaToGets($this->cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuentas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->cuentas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuentas=$this->cuentaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_util::refrescarFKDescripciones($this->cuentas);
			}
			
			//cuenta_logic_add::checkcuentaToGets($this->cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuentas);
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
		$this->cuentas = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuentas=$this->cuentaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_util::refrescarFKDescripciones($this->cuentas);
			}
			
			//cuenta_logic_add::checkcuentaToGets($this->cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuentas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$cuentaLogic = new  cuenta_logic();
		  		  
        try {		
			$cuentaLogic->setConnexion($connexion);			
			$cuentaLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $cuentaLogic->getcuentas();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->cuentas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cuentas=$this->cuentaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_util::refrescarFKDescripciones($this->cuentas);
			}
			
			//cuenta_logic_add::checkcuentaToGets($this->cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuentas);
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
		$this->cuentas = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuentas=$this->cuentaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_util::refrescarFKDescripciones($this->cuentas);
			}
			
			//cuenta_logic_add::checkcuentaToGets($this->cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuentas);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->cuentas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cuentas=$this->cuentaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_util::refrescarFKDescripciones($this->cuentas);
			}
			
			//cuenta_logic_add::checkcuentaToGets($this->cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuentas);
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
		$this->cuentas = array();
		  		  
        try {			
			$this->cuentas=$this->cuentaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_util::refrescarFKDescripciones($this->cuentas);
			}	
			
			//cuenta_logic_add::checkcuentaToGets($this->cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuentas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cuentas = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->cuentas=$this->cuentaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_util::refrescarFKDescripciones($this->cuentas);
			}
			
			//cuenta_logic_add::checkcuentaToGets($this->cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuentas);
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
		$this->cuentas = array();
		  		  
        try {		
			$this->cuentas=$this->cuentaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_util::refrescarFKDescripciones($this->cuentas);
			}
			
			//cuenta_logic_add::checkcuentaToGets($this->cuentas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cuentas);

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
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,cuenta_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->cuentas=$this->cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_util::refrescarFKDescripciones($this->cuentas);
			}
			//cuenta_logic_add::checkcuentaToGets($this->cuentas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuentas);

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
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,cuenta_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->cuentas=$this->cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_util::refrescarFKDescripciones($this->cuentas);
			}
			//cuenta_logic_add::checkcuentaToGets($this->cuentas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuentas);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cuenta_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->cuentas=$this->cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_util::refrescarFKDescripciones($this->cuentas);
			}
			//cuenta_logic_add::checkcuentaToGets($this->cuentas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuentas);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cuenta_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->cuentas=$this->cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_util::refrescarFKDescripciones($this->cuentas);
			}
			//cuenta_logic_add::checkcuentaToGets($this->cuentas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuentas);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtipo_cuentaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_tipo_cuenta) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_cuenta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_cuenta,cuenta_util::$ID_TIPO_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_cuenta);

			$this->cuentas=$this->cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_util::refrescarFKDescripciones($this->cuentas);
			}
			//cuenta_logic_add::checkcuentaToGets($this->cuentas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuentas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtipo_cuenta(string $strFinalQuery,Pagination $pagination,int $id_tipo_cuenta) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_cuenta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_cuenta,cuenta_util::$ID_TIPO_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_cuenta);

			$this->cuentas=$this->cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_util::refrescarFKDescripciones($this->cuentas);
			}
			//cuenta_logic_add::checkcuentaToGets($this->cuentas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuentas);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtipo_nivel_cuentaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_tipo_nivel_cuenta) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_nivel_cuenta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_nivel_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_nivel_cuenta,cuenta_util::$ID_TIPO_NIVEL_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_nivel_cuenta);

			$this->cuentas=$this->cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_util::refrescarFKDescripciones($this->cuentas);
			}
			//cuenta_logic_add::checkcuentaToGets($this->cuentas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuentas);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtipo_nivel_cuenta(string $strFinalQuery,Pagination $pagination,int $id_tipo_nivel_cuenta) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_nivel_cuenta= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_nivel_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_nivel_cuenta,cuenta_util::$ID_TIPO_NIVEL_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_nivel_cuenta);

			$this->cuentas=$this->cuentaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cuenta_util::refrescarFKDescripciones($this->cuentas);
			}
			//cuenta_logic_add::checkcuentaToGets($this->cuentas,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cuentas);
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
						
			//cuenta_logic_add::checkcuentaToSave($this->cuenta,$this->datosCliente,$this->connexion);	       
			//cuenta_logic_add::updatecuentaToSave($this->cuenta);			
			cuenta_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cuenta,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->cuentaLogicAdditional->checkGeneralEntityToSave($this,$this->cuenta,$this->datosCliente,$this->connexion);
			
			
			cuenta_data::save($this->cuenta, $this->connexion);	    	       	 				
			//cuenta_logic_add::checkcuentaToSaveAfter($this->cuenta,$this->datosCliente,$this->connexion);			
			//$this->cuentaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cuenta,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cuenta_util::refrescarFKDescripcion($this->cuenta);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->cuenta->getIsDeleted()) {
				$this->cuenta=null;
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
						
			/*cuenta_logic_add::checkcuentaToSave($this->cuenta,$this->datosCliente,$this->connexion);*/	        
			//cuenta_logic_add::updatecuentaToSave($this->cuenta);			
			//$this->cuentaLogicAdditional->checkGeneralEntityToSave($this,$this->cuenta,$this->datosCliente,$this->connexion);			
			cuenta_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cuenta,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			cuenta_data::save($this->cuenta, $this->connexion);	    	       	 						
			/*cuenta_logic_add::checkcuentaToSaveAfter($this->cuenta,$this->datosCliente,$this->connexion);*/			
			//$this->cuentaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cuenta,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cuenta,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cuenta_util::refrescarFKDescripcion($this->cuenta);				
			}
			
			if($this->cuenta->getIsDeleted()) {
				$this->cuenta=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(cuenta $cuenta,Connexion $connexion)  {
		$cuentaLogic = new  cuenta_logic();		  		  
        try {		
			$cuentaLogic->setConnexion($connexion);			
			$cuentaLogic->setcuenta($cuenta);			
			$cuentaLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*cuenta_logic_add::checkcuentaToSaves($this->cuentas,$this->datosCliente,$this->connexion);*/	        	
			//$this->cuentaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cuentas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cuentas as $cuentaLocal) {				
								
				//cuenta_logic_add::updatecuentaToSave($cuentaLocal);	        	
				cuenta_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cuentaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				cuenta_data::save($cuentaLocal, $this->connexion);				
			}
			
			/*cuenta_logic_add::checkcuentaToSavesAfter($this->cuentas,$this->datosCliente,$this->connexion);*/			
			//$this->cuentaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cuentas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_util::refrescarFKDescripciones($this->cuentas);
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
			/*cuenta_logic_add::checkcuentaToSaves($this->cuentas,$this->datosCliente,$this->connexion);*/			
			//$this->cuentaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cuentas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cuentas as $cuentaLocal) {				
								
				//cuenta_logic_add::updatecuentaToSave($cuentaLocal);	        	
				cuenta_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cuentaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				cuenta_data::save($cuentaLocal, $this->connexion);				
			}			
			
			/*cuenta_logic_add::checkcuentaToSavesAfter($this->cuentas,$this->datosCliente,$this->connexion);*/			
			//$this->cuentaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cuentas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cuenta_util::refrescarFKDescripciones($this->cuentas);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $cuentas,Connexion $connexion)  {
		$cuentaLogic = new  cuenta_logic();
		  		  
        try {		
			$cuentaLogic->setConnexion($connexion);			
			$cuentaLogic->setcuentas($cuentas);			
			$cuentaLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$cuentasAux=array();
		
		foreach($this->cuentas as $cuenta) {
			if($cuenta->getIsDeleted()==false) {
				$cuentasAux[]=$cuenta;
			}
		}
		
		$this->cuentas=$cuentasAux;
	}
	
	public function updateToGetsAuxiliar(array &$cuentas) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->cuentas as $cuenta) {
				
				$cuenta->setid_empresa_Descripcion(cuenta_util::getempresaDescripcion($cuenta->getempresa()));
				$cuenta->setid_tipo_cuenta_Descripcion(cuenta_util::gettipo_cuentaDescripcion($cuenta->gettipo_cuenta()));
				$cuenta->setid_tipo_nivel_cuenta_Descripcion(cuenta_util::gettipo_nivel_cuentaDescripcion($cuenta->gettipo_nivel_cuenta()));
				$cuenta->setid_cuenta_Descripcion(cuenta_util::getcuentaDescripcion($cuenta->getcuenta()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cuenta_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cuenta_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cuenta_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$cuentaForeignKey=new cuenta_param_return();//cuentaForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$cuentaForeignKey,$cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_cuenta',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_cuentasFK($this->connexion,$strRecargarFkQuery,$cuentaForeignKey,$cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_nivel_cuenta',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_nivel_cuentasFK($this->connexion,$strRecargarFkQuery,$cuentaForeignKey,$cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTipos,',')) {
				$this->cargarComboscuentasFK($this->connexion,$strRecargarFkQuery,$cuentaForeignKey,$cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$cuentaForeignKey,$cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_cuenta',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_cuentasFK($this->connexion,' where id=-1 ',$cuentaForeignKey,$cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_nivel_cuenta',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_nivel_cuentasFK($this->connexion,' where id=-1 ',$cuentaForeignKey,$cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuentasFK($this->connexion,' where id=-1 ',$cuentaForeignKey,$cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $cuentaForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$cuentaForeignKey,$cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$cuentaForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_session==null) {
			$cuenta_session=new cuenta_session();
		}
		
		if($cuenta_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($cuentaForeignKey->idempresaDefaultFK==0) {
					$cuentaForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$cuentaForeignKey->empresasFK[$empresaLocal->getId()]=cuenta_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($cuenta_session->bigidempresaActual!=null && $cuenta_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cuenta_session->bigidempresaActual);//WithConnection

				$cuentaForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=cuenta_util::getempresaDescripcion($empresaLogic->getempresa());
				$cuentaForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombostipo_cuentasFK($connexion=null,$strRecargarFkQuery='',$cuentaForeignKey,$cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_cuentaLogic= new tipo_cuenta_logic();
		$pagination= new Pagination();
		$cuentaForeignKey->tipo_cuentasFK=array();

		$tipo_cuentaLogic->setConnexion($connexion);
		$tipo_cuentaLogic->gettipo_cuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_session==null) {
			$cuenta_session=new cuenta_session();
		}
		
		if($cuenta_session->bitBusquedaDesdeFKSesiontipo_cuenta!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_cuenta_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltipo_cuenta=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_cuenta=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_cuenta, '');
				$finalQueryGlobaltipo_cuenta.=tipo_cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_cuenta.$strRecargarFkQuery;		

				$tipo_cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($tipo_cuentaLogic->gettipo_cuentas() as $tipo_cuentaLocal ) {
				if($cuentaForeignKey->idtipo_cuentaDefaultFK==0) {
					$cuentaForeignKey->idtipo_cuentaDefaultFK=$tipo_cuentaLocal->getId();
				}

				$cuentaForeignKey->tipo_cuentasFK[$tipo_cuentaLocal->getId()]=cuenta_util::gettipo_cuentaDescripcion($tipo_cuentaLocal);
			}

		} else {

			if($cuenta_session->bigidtipo_cuentaActual!=null && $cuenta_session->bigidtipo_cuentaActual > 0) {
				$tipo_cuentaLogic->getEntity($cuenta_session->bigidtipo_cuentaActual);//WithConnection

				$cuentaForeignKey->tipo_cuentasFK[$tipo_cuentaLogic->gettipo_cuenta()->getId()]=cuenta_util::gettipo_cuentaDescripcion($tipo_cuentaLogic->gettipo_cuenta());
				$cuentaForeignKey->idtipo_cuentaDefaultFK=$tipo_cuentaLogic->gettipo_cuenta()->getId();
			}
		}
	}

	public function cargarCombostipo_nivel_cuentasFK($connexion=null,$strRecargarFkQuery='',$cuentaForeignKey,$cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_nivel_cuentaLogic= new tipo_nivel_cuenta_logic();
		$pagination= new Pagination();
		$cuentaForeignKey->tipo_nivel_cuentasFK=array();

		$tipo_nivel_cuentaLogic->setConnexion($connexion);
		$tipo_nivel_cuentaLogic->gettipo_nivel_cuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_session==null) {
			$cuenta_session=new cuenta_session();
		}
		
		if($cuenta_session->bitBusquedaDesdeFKSesiontipo_nivel_cuenta!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_nivel_cuenta_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltipo_nivel_cuenta=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_nivel_cuenta=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_nivel_cuenta, '');
				$finalQueryGlobaltipo_nivel_cuenta.=tipo_nivel_cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_nivel_cuenta.$strRecargarFkQuery;		

				$tipo_nivel_cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($tipo_nivel_cuentaLogic->gettipo_nivel_cuentas() as $tipo_nivel_cuentaLocal ) {
				if($cuentaForeignKey->idtipo_nivel_cuentaDefaultFK==0) {
					$cuentaForeignKey->idtipo_nivel_cuentaDefaultFK=$tipo_nivel_cuentaLocal->getId();
				}

				$cuentaForeignKey->tipo_nivel_cuentasFK[$tipo_nivel_cuentaLocal->getId()]=cuenta_util::gettipo_nivel_cuentaDescripcion($tipo_nivel_cuentaLocal);
			}

		} else {

			if($cuenta_session->bigidtipo_nivel_cuentaActual!=null && $cuenta_session->bigidtipo_nivel_cuentaActual > 0) {
				$tipo_nivel_cuentaLogic->getEntity($cuenta_session->bigidtipo_nivel_cuentaActual);//WithConnection

				$cuentaForeignKey->tipo_nivel_cuentasFK[$tipo_nivel_cuentaLogic->gettipo_nivel_cuenta()->getId()]=cuenta_util::gettipo_nivel_cuentaDescripcion($tipo_nivel_cuentaLogic->gettipo_nivel_cuenta());
				$cuentaForeignKey->idtipo_nivel_cuentaDefaultFK=$tipo_nivel_cuentaLogic->gettipo_nivel_cuenta()->getId();
			}
		}
	}

	public function cargarComboscuentasFK($connexion=null,$strRecargarFkQuery='',$cuentaForeignKey,$cuenta_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$cuentaForeignKey->cuentasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cuenta_session==null) {
			$cuenta_session=new cuenta_session();
		}
		
		if($cuenta_session->bitBusquedaDesdeFKSesioncuenta!=true) {
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
				if($cuentaForeignKey->idcuentaDefaultFK==0) {
					$cuentaForeignKey->idcuentaDefaultFK=$cuentaLocal->getId();
				}

				$cuentaForeignKey->cuentasFK[$cuentaLocal->getId()]=cuenta_util::getcuentaDescripcion($cuentaLocal);
			}

		} else {

			if($cuenta_session->bigidcuentaActual!=null && $cuenta_session->bigidcuentaActual > 0) {
				$cuentaLogic->getEntity($cuenta_session->bigidcuentaActual);//WithConnection

				$cuentaForeignKey->cuentasFK[$cuentaLogic->getcuenta()->getId()]=cuenta_util::getcuentaDescripcion($cuentaLogic->getcuenta());
				$cuentaForeignKey->idcuentaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($cuenta,$categoriacheques,$otroimpuesto_ventass,$impuesto_ventass,$cuentacorrientes,$producto_ventas,$instrumentopago_ventass,$listaproducto_ventas,$asientodetalles,$retencion_comprass,$retencionfuente_comprass,$cuentas,$proveedors,$formapagoclientes,$saldocuentas,$terminopagoproveedors,$retencionica_ventass,$asientopredefinidodetalles,$clientes,$asientoautomaticodetalles,$formapagoproveedors,$terminopagoclientes) {
		$this->saveRelacionesBase($cuenta,$categoriacheques,$otroimpuesto_ventass,$impuesto_ventass,$cuentacorrientes,$producto_ventas,$instrumentopago_ventass,$listaproducto_ventas,$asientodetalles,$retencion_comprass,$retencionfuente_comprass,$cuentas,$proveedors,$formapagoclientes,$saldocuentas,$terminopagoproveedors,$retencionica_ventass,$asientopredefinidodetalles,$clientes,$asientoautomaticodetalles,$formapagoproveedors,$terminopagoclientes,true);
	}

	public function saveRelaciones($cuenta,$categoriacheques,$otroimpuesto_ventass,$impuesto_ventass,$cuentacorrientes,$producto_ventas,$instrumentopago_ventass,$listaproducto_ventas,$asientodetalles,$retencion_comprass,$retencionfuente_comprass,$cuentas,$proveedors,$formapagoclientes,$saldocuentas,$terminopagoproveedors,$retencionica_ventass,$asientopredefinidodetalles,$clientes,$asientoautomaticodetalles,$formapagoproveedors,$terminopagoclientes) {
		$this->saveRelacionesBase($cuenta,$categoriacheques,$otroimpuesto_ventass,$impuesto_ventass,$cuentacorrientes,$producto_ventas,$instrumentopago_ventass,$listaproducto_ventas,$asientodetalles,$retencion_comprass,$retencionfuente_comprass,$cuentas,$proveedors,$formapagoclientes,$saldocuentas,$terminopagoproveedors,$retencionica_ventass,$asientopredefinidodetalles,$clientes,$asientoautomaticodetalles,$formapagoproveedors,$terminopagoclientes,false);
	}

	public function saveRelacionesBase($cuenta,$categoriacheques=array(),$otroimpuesto_ventass=array(),$impuesto_ventass=array(),$cuentacorrientes=array(),$producto_ventas=array(),$instrumentopago_ventass=array(),$listaproducto_ventas=array(),$asientodetalles=array(),$retencion_comprass=array(),$retencionfuente_comprass=array(),$cuentas=array(),$proveedors=array(),$formapagoclientes=array(),$saldocuentas=array(),$terminopagoproveedors=array(),$retencionica_ventass=array(),$asientopredefinidodetalles=array(),$clientes=array(),$asientoautomaticodetalles=array(),$formapagoproveedors=array(),$terminopagoclientes=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$cuenta->setcategoria_cheques($categoriacheques);
			$cuenta->setotro_impuesto_ventass($otroimpuesto_ventass);
			$cuenta->setimpuesto_ventass($impuesto_ventass);
			$cuenta->setcuenta_corrientes($cuentacorrientes);
			$cuenta->setproducto_ventas($producto_ventas);
			$cuenta->setinstrumento_pago_ventass($instrumentopago_ventass);
			$cuenta->setlista_producto_ventas($listaproducto_ventas);
			$cuenta->setasiento_detalles($asientodetalles);
			$cuenta->setretencion_comprass($retencion_comprass);
			$cuenta->setretencion_fuente_comprass($retencionfuente_comprass);
			$cuenta->setcuentas($cuentas);
			$cuenta->setproveedors($proveedors);
			$cuenta->setforma_pago_clientes($formapagoclientes);
			$cuenta->setsaldo_cuentas($saldocuentas);
			$cuenta->settermino_pago_proveedors($terminopagoproveedors);
			$cuenta->setretencion_ica_ventass($retencionica_ventass);
			$cuenta->setasiento_predefinido_detalles($asientopredefinidodetalles);
			$cuenta->setclientes($clientes);
			$cuenta->setasiento_automatico_detalles($asientoautomaticodetalles);
			$cuenta->setforma_pago_proveedors($formapagoproveedors);
			$cuenta->settermino_pago_clientes($terminopagoclientes);
			$this->setcuenta($cuenta);

			if(true) {

				//cuenta_logic_add::updateRelacionesToSave($cuenta,$this);

				if(($this->cuenta->getIsNew() || $this->cuenta->getIsChanged()) && !$this->cuenta->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($categoriacheques,$otroimpuesto_ventass,$impuesto_ventass,$cuentacorrientes,$producto_ventas,$instrumentopago_ventass,$listaproducto_ventas,$asientodetalles,$retencion_comprass,$retencionfuente_comprass,$cuentas,$proveedors,$formapagoclientes,$saldocuentas,$terminopagoproveedors,$retencionica_ventass,$asientopredefinidodetalles,$clientes,$asientoautomaticodetalles,$formapagoproveedors,$terminopagoclientes);

				} else if($this->cuenta->getIsDeleted()) {
					$this->saveRelacionesDetalles($categoriacheques,$otroimpuesto_ventass,$impuesto_ventass,$cuentacorrientes,$producto_ventas,$instrumentopago_ventass,$listaproducto_ventas,$asientodetalles,$retencion_comprass,$retencionfuente_comprass,$cuentas,$proveedors,$formapagoclientes,$saldocuentas,$terminopagoproveedors,$retencionica_ventass,$asientopredefinidodetalles,$clientes,$asientoautomaticodetalles,$formapagoproveedors,$terminopagoclientes);
					$this->save();
				}

				//cuenta_logic_add::updateRelacionesToSaveAfter($cuenta,$this);

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
	
	
	public function saveRelacionesDetalles($categoriacheques=array(),$otroimpuesto_ventass=array(),$impuesto_ventass=array(),$cuentacorrientes=array(),$producto_ventas=array(),$instrumentopago_ventass=array(),$listaproducto_ventas=array(),$asientodetalles=array(),$retencion_comprass=array(),$retencionfuente_comprass=array(),$cuentas=array(),$proveedors=array(),$formapagoclientes=array(),$saldocuentas=array(),$terminopagoproveedors=array(),$retencionica_ventass=array(),$asientopredefinidodetalles=array(),$clientes=array(),$asientoautomaticodetalles=array(),$formapagoproveedors=array(),$terminopagoclientes=array()) {
		try {
	

			$idcuentaActual=$this->getcuenta()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/categoria_cheque_carga.php');
			categoria_cheque_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$categoriachequeLogic_Desde_cuenta=new categoria_cheque_logic();
			$categoriachequeLogic_Desde_cuenta->setcategoria_cheques($categoriacheques);

			$categoriachequeLogic_Desde_cuenta->setConnexion($this->getConnexion());
			$categoriachequeLogic_Desde_cuenta->setDatosCliente($this->datosCliente);

			foreach($categoriachequeLogic_Desde_cuenta->getcategoria_cheques() as $categoriacheque_Desde_cuenta) {
				$categoriacheque_Desde_cuenta->setid_cuenta($idcuentaActual);

				$categoriachequeLogic_Desde_cuenta->setcategoria_cheque($categoriacheque_Desde_cuenta);
				$categoriachequeLogic_Desde_cuenta->save();

				$idcategoria_chequeActual=$categoria_cheque_Desde_cuenta->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/cheque_cuenta_corriente_carga.php');
				cheque_cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$chequecuentacorrienteLogic_Desde_categoria_cheque=new cheque_cuenta_corriente_logic();

				if($categoria_cheque_Desde_cuenta->getcheque_cuenta_corrientes()==null){
					$categoria_cheque_Desde_cuenta->setcheque_cuenta_corrientes(array());
				}

				$chequecuentacorrienteLogic_Desde_categoria_cheque->setcheque_cuenta_corrientes($categoria_cheque_Desde_cuenta->getcheque_cuenta_corrientes());

				$chequecuentacorrienteLogic_Desde_categoria_cheque->setConnexion($this->getConnexion());
				$chequecuentacorrienteLogic_Desde_categoria_cheque->setDatosCliente($this->datosCliente);

				foreach($chequecuentacorrienteLogic_Desde_categoria_cheque->getcheque_cuenta_corrientes() as $chequecuentacorriente_Desde_categoria_cheque) {
					$chequecuentacorriente_Desde_categoria_cheque->setid_categoria_cheque($idcategoria_chequeActual);
				}

				$chequecuentacorrienteLogic_Desde_categoria_cheque->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/clasificacion_cheque_carga.php');
				clasificacion_cheque_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$clasificacionchequeLogic_Desde_categoria_cheque=new clasificacion_cheque_logic();

				if($categoria_cheque_Desde_cuenta->getclasificacion_cheques()==null){
					$categoria_cheque_Desde_cuenta->setclasificacion_cheques(array());
				}

				$clasificacionchequeLogic_Desde_categoria_cheque->setclasificacion_cheques($categoria_cheque_Desde_cuenta->getclasificacion_cheques());

				$clasificacionchequeLogic_Desde_categoria_cheque->setConnexion($this->getConnexion());
				$clasificacionchequeLogic_Desde_categoria_cheque->setDatosCliente($this->datosCliente);

				foreach($clasificacionchequeLogic_Desde_categoria_cheque->getclasificacion_cheques() as $clasificacioncheque_Desde_categoria_cheque) {
					$clasificacioncheque_Desde_categoria_cheque->setid_categoria_cheque($idcategoria_chequeActual);
				}

				$clasificacionchequeLogic_Desde_categoria_cheque->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/otro_impuesto_carga.php');
			otro_impuesto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$otroimpuesto_ventasLogic_Desde_cuenta=new otro_impuesto_logic();
			$otroimpuesto_ventasLogic_Desde_cuenta->setotro_impuestos($otroimpuesto_ventass);

			$otroimpuesto_ventasLogic_Desde_cuenta->setConnexion($this->getConnexion());
			$otroimpuesto_ventasLogic_Desde_cuenta->setDatosCliente($this->datosCliente);

			foreach($otroimpuesto_ventasLogic_Desde_cuenta->getotro_impuestos() as $otroimpuesto_Desde_cuenta) {
				$otroimpuesto_Desde_cuenta->setid_cuenta_ventas($idcuentaActual);

				$otroimpuesto_ventasLogic_Desde_cuenta->setotro_impuesto($otroimpuesto_Desde_cuenta);
				$otroimpuesto_ventasLogic_Desde_cuenta->save();

				$idotro_impuestoActual=$otro_impuesto_Desde_cuenta->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/lista_producto_carga.php');
				lista_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$listaproducto_comprasLogic_Desde_otro_impuesto=new lista_producto_logic();

				if($otro_impuesto_Desde_cuenta->getlista_producto_comprass()==null){
					$otro_impuesto_Desde_cuenta->setlista_producto_comprass(array());
				}

				$listaproducto_comprasLogic_Desde_otro_impuesto->setlista_productos($otro_impuesto_Desde_cuenta->getlista_producto_comprass());

				$listaproducto_comprasLogic_Desde_otro_impuesto->setConnexion($this->getConnexion());
				$listaproducto_comprasLogic_Desde_otro_impuesto->setDatosCliente($this->datosCliente);

				foreach($listaproducto_comprasLogic_Desde_otro_impuesto->getlista_productos() as $listaproducto_Desde_otro_impuesto) {
					$listaproducto_Desde_otro_impuesto->setid_otro_impuesto_compras($idotro_impuestoActual);
				}

				$listaproducto_comprasLogic_Desde_otro_impuesto->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/producto_carga.php');
				producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$productoLogic_Desde_otro_impuesto=new producto_logic();

				if($otro_impuesto_Desde_cuenta->getproductos()==null){
					$otro_impuesto_Desde_cuenta->setproductos(array());
				}

				$productoLogic_Desde_otro_impuesto->setproductos($otro_impuesto_Desde_cuenta->getproductos());

				$productoLogic_Desde_otro_impuesto->setConnexion($this->getConnexion());
				$productoLogic_Desde_otro_impuesto->setDatosCliente($this->datosCliente);

				foreach($productoLogic_Desde_otro_impuesto->getproductos() as $producto_Desde_otro_impuesto) {
					$producto_Desde_otro_impuesto->setid_otro_impuesto($idotro_impuestoActual);

					$productoLogic_Desde_otro_impuesto->setproducto($producto_Desde_otro_impuesto);
					$productoLogic_Desde_otro_impuesto->save();
				}


				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cliente_carga.php');
				cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$clienteLogic_Desde_otro_impuesto=new cliente_logic();

				if($otro_impuesto_Desde_cuenta->getclientes()==null){
					$otro_impuesto_Desde_cuenta->setclientes(array());
				}

				$clienteLogic_Desde_otro_impuesto->setclientes($otro_impuesto_Desde_cuenta->getclientes());

				$clienteLogic_Desde_otro_impuesto->setConnexion($this->getConnexion());
				$clienteLogic_Desde_otro_impuesto->setDatosCliente($this->datosCliente);

				foreach($clienteLogic_Desde_otro_impuesto->getclientes() as $cliente_Desde_otro_impuesto) {
					$cliente_Desde_otro_impuesto->setid_otro_impuesto($idotro_impuestoActual);

					$clienteLogic_Desde_otro_impuesto->setcliente($cliente_Desde_otro_impuesto);
					$clienteLogic_Desde_otro_impuesto->save();
				}


				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/proveedor_carga.php');
				proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$proveedorLogic_Desde_otro_impuesto=new proveedor_logic();

				if($otro_impuesto_Desde_cuenta->getproveedors()==null){
					$otro_impuesto_Desde_cuenta->setproveedors(array());
				}

				$proveedorLogic_Desde_otro_impuesto->setproveedors($otro_impuesto_Desde_cuenta->getproveedors());

				$proveedorLogic_Desde_otro_impuesto->setConnexion($this->getConnexion());
				$proveedorLogic_Desde_otro_impuesto->setDatosCliente($this->datosCliente);

				foreach($proveedorLogic_Desde_otro_impuesto->getproveedors() as $proveedor_Desde_otro_impuesto) {
					$proveedor_Desde_otro_impuesto->setid_otro_impuesto($idotro_impuestoActual);

					$proveedorLogic_Desde_otro_impuesto->setproveedor($proveedor_Desde_otro_impuesto);
					$proveedorLogic_Desde_otro_impuesto->save();
				}

			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/impuesto_carga.php');
			impuesto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$impuesto_ventasLogic_Desde_cuenta=new impuesto_logic();
			$impuesto_ventasLogic_Desde_cuenta->setimpuestos($impuesto_ventass);

			$impuesto_ventasLogic_Desde_cuenta->setConnexion($this->getConnexion());
			$impuesto_ventasLogic_Desde_cuenta->setDatosCliente($this->datosCliente);

			foreach($impuesto_ventasLogic_Desde_cuenta->getimpuestos() as $impuesto_Desde_cuenta) {
				$impuesto_Desde_cuenta->setid_cuenta_ventas($idcuentaActual);

				$impuesto_ventasLogic_Desde_cuenta->setimpuesto($impuesto_Desde_cuenta);
				$impuesto_ventasLogic_Desde_cuenta->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/cuenta_corriente_carga.php');
			cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cuentacorrienteLogic_Desde_cuenta=new cuenta_corriente_logic();
			$cuentacorrienteLogic_Desde_cuenta->setcuenta_corrientes($cuentacorrientes);

			$cuentacorrienteLogic_Desde_cuenta->setConnexion($this->getConnexion());
			$cuentacorrienteLogic_Desde_cuenta->setDatosCliente($this->datosCliente);

			foreach($cuentacorrienteLogic_Desde_cuenta->getcuenta_corrientes() as $cuentacorriente_Desde_cuenta) {
				$cuentacorriente_Desde_cuenta->setid_cuenta($idcuentaActual);

				$cuentacorrienteLogic_Desde_cuenta->setcuenta_corriente($cuentacorriente_Desde_cuenta);
				$cuentacorrienteLogic_Desde_cuenta->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/producto_carga.php');
			producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$producto_ventaLogic_Desde_cuenta=new producto_logic();
			$producto_ventaLogic_Desde_cuenta->setproductos($producto_ventas);

			$producto_ventaLogic_Desde_cuenta->setConnexion($this->getConnexion());
			$producto_ventaLogic_Desde_cuenta->setDatosCliente($this->datosCliente);

			foreach($producto_ventaLogic_Desde_cuenta->getproductos() as $producto_Desde_cuenta) {
				$producto_Desde_cuenta->setid_cuenta_venta($idcuentaActual);

				$producto_ventaLogic_Desde_cuenta->setproducto($producto_Desde_cuenta);
				$producto_ventaLogic_Desde_cuenta->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/util/instrumento_pago_carga.php');
			instrumento_pago_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$instrumentopago_ventasLogic_Desde_cuenta=new instrumento_pago_logic();
			$instrumentopago_ventasLogic_Desde_cuenta->setinstrumento_pagos($instrumentopago_ventass);

			$instrumentopago_ventasLogic_Desde_cuenta->setConnexion($this->getConnexion());
			$instrumentopago_ventasLogic_Desde_cuenta->setDatosCliente($this->datosCliente);

			foreach($instrumentopago_ventasLogic_Desde_cuenta->getinstrumento_pagos() as $instrumentopago_Desde_cuenta) {
				$instrumentopago_Desde_cuenta->setid_cuenta_ventas($idcuentaActual);
			}

			$instrumentopago_ventasLogic_Desde_cuenta->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/lista_producto_carga.php');
			lista_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$listaproducto_ventaLogic_Desde_cuenta=new lista_producto_logic();
			$listaproducto_ventaLogic_Desde_cuenta->setlista_productos($listaproducto_ventas);

			$listaproducto_ventaLogic_Desde_cuenta->setConnexion($this->getConnexion());
			$listaproducto_ventaLogic_Desde_cuenta->setDatosCliente($this->datosCliente);

			foreach($listaproducto_ventaLogic_Desde_cuenta->getlista_productos() as $listaproducto_Desde_cuenta) {
				$listaproducto_Desde_cuenta->setid_cuenta_venta($idcuentaActual);
			}

			$listaproducto_ventaLogic_Desde_cuenta->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_detalle_carga.php');
			asiento_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$asientodetalleLogic_Desde_cuenta=new asiento_detalle_logic();
			$asientodetalleLogic_Desde_cuenta->setasiento_detalles($asientodetalles);

			$asientodetalleLogic_Desde_cuenta->setConnexion($this->getConnexion());
			$asientodetalleLogic_Desde_cuenta->setDatosCliente($this->datosCliente);

			foreach($asientodetalleLogic_Desde_cuenta->getasiento_detalles() as $asientodetalle_Desde_cuenta) {
				$asientodetalle_Desde_cuenta->setid_cuenta($idcuentaActual);
			}

			$asientodetalleLogic_Desde_cuenta->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/retencion_carga.php');
			retencion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$retencion_comprasLogic_Desde_cuenta=new retencion_logic();
			$retencion_comprasLogic_Desde_cuenta->setretencions($retencion_comprass);

			$retencion_comprasLogic_Desde_cuenta->setConnexion($this->getConnexion());
			$retencion_comprasLogic_Desde_cuenta->setDatosCliente($this->datosCliente);

			foreach($retencion_comprasLogic_Desde_cuenta->getretencions() as $retencion_Desde_cuenta) {
				$retencion_Desde_cuenta->setid_cuenta_compras($idcuentaActual);

				$retencion_comprasLogic_Desde_cuenta->setretencion($retencion_Desde_cuenta);
				$retencion_comprasLogic_Desde_cuenta->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/retencion_fuente_carga.php');
			retencion_fuente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$retencionfuente_comprasLogic_Desde_cuenta=new retencion_fuente_logic();
			$retencionfuente_comprasLogic_Desde_cuenta->setretencion_fuentes($retencionfuente_comprass);

			$retencionfuente_comprasLogic_Desde_cuenta->setConnexion($this->getConnexion());
			$retencionfuente_comprasLogic_Desde_cuenta->setDatosCliente($this->datosCliente);

			foreach($retencionfuente_comprasLogic_Desde_cuenta->getretencion_fuentes() as $retencionfuente_Desde_cuenta) {
				$retencionfuente_Desde_cuenta->setid_cuenta_compras($idcuentaActual);

				$retencionfuente_comprasLogic_Desde_cuenta->setretencion_fuente($retencionfuente_Desde_cuenta);
				$retencionfuente_comprasLogic_Desde_cuenta->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/cuenta_carga.php');
			cuenta_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cuentaLogicHijos_Desde_cuenta=new cuenta_logic();
			$cuentaLogicHijos_Desde_cuenta->setcuentas($cuentas);

			$cuentaLogicHijos_Desde_cuenta->setConnexion($this->getConnexion());
			$cuentaLogicHijos_Desde_cuenta->setDatosCliente($this->datosCliente);

			foreach($cuentaLogicHijos_Desde_cuenta->getcuentas() as $cuentaHijos_Desde_cuenta) {
				$cuentaHijos_Desde_cuenta->setid_cuenta($idcuentaActual);

				$cuentaLogicHijos_Desde_cuenta->setcuenta($cuentaHijos_Desde_cuenta);
				$cuentaLogicHijos_Desde_cuenta->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/proveedor_carga.php');
			proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$proveedorLogic_Desde_cuenta=new proveedor_logic();
			$proveedorLogic_Desde_cuenta->setproveedors($proveedors);

			$proveedorLogic_Desde_cuenta->setConnexion($this->getConnexion());
			$proveedorLogic_Desde_cuenta->setDatosCliente($this->datosCliente);

			foreach($proveedorLogic_Desde_cuenta->getproveedors() as $proveedor_Desde_cuenta) {
				$proveedor_Desde_cuenta->setid_cuenta($idcuentaActual);

				$proveedorLogic_Desde_cuenta->setproveedor($proveedor_Desde_cuenta);
				$proveedorLogic_Desde_cuenta->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/forma_pago_cliente_carga.php');
			forma_pago_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$formapagoclienteLogic_Desde_cuenta=new forma_pago_cliente_logic();
			$formapagoclienteLogic_Desde_cuenta->setforma_pago_clientes($formapagoclientes);

			$formapagoclienteLogic_Desde_cuenta->setConnexion($this->getConnexion());
			$formapagoclienteLogic_Desde_cuenta->setDatosCliente($this->datosCliente);

			foreach($formapagoclienteLogic_Desde_cuenta->getforma_pago_clientes() as $formapagocliente_Desde_cuenta) {
				$formapagocliente_Desde_cuenta->setid_cuenta($idcuentaActual);

				$formapagoclienteLogic_Desde_cuenta->setforma_pago_cliente($formapagocliente_Desde_cuenta);
				$formapagoclienteLogic_Desde_cuenta->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/saldo_cuenta_carga.php');
			saldo_cuenta_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$saldocuentaLogic_Desde_cuenta=new saldo_cuenta_logic();
			$saldocuentaLogic_Desde_cuenta->setsaldo_cuentas($saldocuentas);

			$saldocuentaLogic_Desde_cuenta->setConnexion($this->getConnexion());
			$saldocuentaLogic_Desde_cuenta->setDatosCliente($this->datosCliente);

			foreach($saldocuentaLogic_Desde_cuenta->getsaldo_cuentas() as $saldocuenta_Desde_cuenta) {
				$saldocuenta_Desde_cuenta->setid_cuenta($idcuentaActual);
			}

			$saldocuentaLogic_Desde_cuenta->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/termino_pago_proveedor_carga.php');
			termino_pago_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$terminopagoproveedorLogic_Desde_cuenta=new termino_pago_proveedor_logic();
			$terminopagoproveedorLogic_Desde_cuenta->settermino_pago_proveedors($terminopagoproveedors);

			$terminopagoproveedorLogic_Desde_cuenta->setConnexion($this->getConnexion());
			$terminopagoproveedorLogic_Desde_cuenta->setDatosCliente($this->datosCliente);

			foreach($terminopagoproveedorLogic_Desde_cuenta->gettermino_pago_proveedors() as $terminopagoproveedor_Desde_cuenta) {
				$terminopagoproveedor_Desde_cuenta->setid_cuenta($idcuentaActual);

				$terminopagoproveedorLogic_Desde_cuenta->settermino_pago_proveedor($terminopagoproveedor_Desde_cuenta);
				$terminopagoproveedorLogic_Desde_cuenta->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/retencion_ica_carga.php');
			retencion_ica_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$retencionica_ventasLogic_Desde_cuenta=new retencion_ica_logic();
			$retencionica_ventasLogic_Desde_cuenta->setretencion_icas($retencionica_ventass);

			$retencionica_ventasLogic_Desde_cuenta->setConnexion($this->getConnexion());
			$retencionica_ventasLogic_Desde_cuenta->setDatosCliente($this->datosCliente);

			foreach($retencionica_ventasLogic_Desde_cuenta->getretencion_icas() as $retencionica_Desde_cuenta) {
				$retencionica_Desde_cuenta->setid_cuenta_ventas($idcuentaActual);

				$retencionica_ventasLogic_Desde_cuenta->setretencion_ica($retencionica_Desde_cuenta);
				$retencionica_ventasLogic_Desde_cuenta->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_predefinido_detalle_carga.php');
			asiento_predefinido_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$asientopredefinidodetalleLogic_Desde_cuenta=new asiento_predefinido_detalle_logic();
			$asientopredefinidodetalleLogic_Desde_cuenta->setasiento_predefinido_detalles($asientopredefinidodetalles);

			$asientopredefinidodetalleLogic_Desde_cuenta->setConnexion($this->getConnexion());
			$asientopredefinidodetalleLogic_Desde_cuenta->setDatosCliente($this->datosCliente);

			foreach($asientopredefinidodetalleLogic_Desde_cuenta->getasiento_predefinido_detalles() as $asientopredefinidodetalle_Desde_cuenta) {
				$asientopredefinidodetalle_Desde_cuenta->setid_cuenta($idcuentaActual);
			}

			$asientopredefinidodetalleLogic_Desde_cuenta->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cliente_carga.php');
			cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$clienteLogic_Desde_cuenta=new cliente_logic();
			$clienteLogic_Desde_cuenta->setclientes($clientes);

			$clienteLogic_Desde_cuenta->setConnexion($this->getConnexion());
			$clienteLogic_Desde_cuenta->setDatosCliente($this->datosCliente);

			foreach($clienteLogic_Desde_cuenta->getclientes() as $cliente_Desde_cuenta) {
				$cliente_Desde_cuenta->setid_cuenta($idcuentaActual);

				$clienteLogic_Desde_cuenta->setcliente($cliente_Desde_cuenta);
				$clienteLogic_Desde_cuenta->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_automatico_detalle_carga.php');
			asiento_automatico_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$asientoautomaticodetalleLogic_Desde_cuenta=new asiento_automatico_detalle_logic();
			$asientoautomaticodetalleLogic_Desde_cuenta->setasiento_automatico_detalles($asientoautomaticodetalles);

			$asientoautomaticodetalleLogic_Desde_cuenta->setConnexion($this->getConnexion());
			$asientoautomaticodetalleLogic_Desde_cuenta->setDatosCliente($this->datosCliente);

			foreach($asientoautomaticodetalleLogic_Desde_cuenta->getasiento_automatico_detalles() as $asientoautomaticodetalle_Desde_cuenta) {
				$asientoautomaticodetalle_Desde_cuenta->setid_cuenta($idcuentaActual);
			}

			$asientoautomaticodetalleLogic_Desde_cuenta->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/forma_pago_proveedor_carga.php');
			forma_pago_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$formapagoproveedorLogic_Desde_cuenta=new forma_pago_proveedor_logic();
			$formapagoproveedorLogic_Desde_cuenta->setforma_pago_proveedors($formapagoproveedors);

			$formapagoproveedorLogic_Desde_cuenta->setConnexion($this->getConnexion());
			$formapagoproveedorLogic_Desde_cuenta->setDatosCliente($this->datosCliente);

			foreach($formapagoproveedorLogic_Desde_cuenta->getforma_pago_proveedors() as $formapagoproveedor_Desde_cuenta) {
				$formapagoproveedor_Desde_cuenta->setid_cuenta($idcuentaActual);

				$formapagoproveedorLogic_Desde_cuenta->setforma_pago_proveedor($formapagoproveedor_Desde_cuenta);
				$formapagoproveedorLogic_Desde_cuenta->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/termino_pago_cliente_carga.php');
			termino_pago_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$terminopagoclienteLogic_Desde_cuenta=new termino_pago_cliente_logic();
			$terminopagoclienteLogic_Desde_cuenta->settermino_pago_clientes($terminopagoclientes);

			$terminopagoclienteLogic_Desde_cuenta->setConnexion($this->getConnexion());
			$terminopagoclienteLogic_Desde_cuenta->setDatosCliente($this->datosCliente);

			foreach($terminopagoclienteLogic_Desde_cuenta->gettermino_pago_clientes() as $terminopagocliente_Desde_cuenta) {
				$terminopagocliente_Desde_cuenta->setid_cuenta($idcuentaActual);

				$terminopagoclienteLogic_Desde_cuenta->settermino_pago_cliente($terminopagocliente_Desde_cuenta);
				$terminopagoclienteLogic_Desde_cuenta->save();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $cuentas,cuenta_param_return $cuentaParameterGeneral) : cuenta_param_return {
		$cuentaReturnGeneral=new cuenta_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $cuentaReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $cuentas,cuenta_param_return $cuentaParameterGeneral) : cuenta_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cuentaReturnGeneral=new cuenta_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $cuentaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuentas,cuenta $cuenta,cuenta_param_return $cuentaParameterGeneral,bool $isEsNuevocuenta,array $clases) : cuenta_param_return {
		 try {	
			$cuentaReturnGeneral=new cuenta_param_return();
	
			$cuentaReturnGeneral->setcuenta($cuenta);
			$cuentaReturnGeneral->setcuentas($cuentas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cuentaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $cuentaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuentas,cuenta $cuenta,cuenta_param_return $cuentaParameterGeneral,bool $isEsNuevocuenta,array $clases) : cuenta_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cuentaReturnGeneral=new cuenta_param_return();
	
			$cuentaReturnGeneral->setcuenta($cuenta);
			$cuentaReturnGeneral->setcuentas($cuentas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cuentaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $cuentaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuentas,cuenta $cuenta,cuenta_param_return $cuentaParameterGeneral,bool $isEsNuevocuenta,array $clases) : cuenta_param_return {
		 try {	
			$cuentaReturnGeneral=new cuenta_param_return();
	
			$cuentaReturnGeneral->setcuenta($cuenta);
			$cuentaReturnGeneral->setcuentas($cuentas);
			
			
			
			return $cuentaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cuentas,cuenta $cuenta,cuenta_param_return $cuentaParameterGeneral,bool $isEsNuevocuenta,array $clases) : cuenta_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cuentaReturnGeneral=new cuenta_param_return();
	
			$cuentaReturnGeneral->setcuenta($cuenta);
			$cuentaReturnGeneral->setcuentas($cuentas);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $cuentaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,cuenta $cuenta,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,cuenta $cuenta,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		cuenta_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		cuenta_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(cuenta $cuenta,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//cuenta_logic_add::updatecuentaToGet($this->cuenta);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cuenta->setempresa($this->cuentaDataAccess->getempresa($this->connexion,$cuenta));
		$cuenta->settipo_cuenta($this->cuentaDataAccess->gettipo_cuenta($this->connexion,$cuenta));
		$cuenta->settipo_nivel_cuenta($this->cuentaDataAccess->gettipo_nivel_cuenta($this->connexion,$cuenta));
		$cuenta->setcuenta($this->cuentaDataAccess->getcuenta($this->connexion,$cuenta));
		$cuenta->setcategoria_cheques($this->cuentaDataAccess->getcategoria_cheques($this->connexion,$cuenta));
		$cuenta->setotro_impuesto_ventass($this->cuentaDataAccess->getotro_impuesto_ventass($this->connexion,$cuenta));
		$cuenta->setimpuesto_ventass($this->cuentaDataAccess->getimpuesto_ventass($this->connexion,$cuenta));
		$cuenta->setcuenta_corrientes($this->cuentaDataAccess->getcuenta_corrientes($this->connexion,$cuenta));
		$cuenta->setproducto_ventas($this->cuentaDataAccess->getproducto_ventas($this->connexion,$cuenta));
		$cuenta->setinstrumento_pago_ventass($this->cuentaDataAccess->getinstrumento_pago_ventass($this->connexion,$cuenta));
		$cuenta->setlista_producto_ventas($this->cuentaDataAccess->getlista_producto_ventas($this->connexion,$cuenta));
		$cuenta->setasiento_detalles($this->cuentaDataAccess->getasiento_detalles($this->connexion,$cuenta));
		$cuenta->setretencion_comprass($this->cuentaDataAccess->getretencion_comprass($this->connexion,$cuenta));
		$cuenta->setretencion_fuente_comprass($this->cuentaDataAccess->getretencion_fuente_comprass($this->connexion,$cuenta));
		$cuenta->setcuentas($this->cuentaDataAccess->getcuentas($this->connexion,$cuenta));
		$cuenta->setproveedors($this->cuentaDataAccess->getproveedors($this->connexion,$cuenta));
		$cuenta->setforma_pago_clientes($this->cuentaDataAccess->getforma_pago_clientes($this->connexion,$cuenta));
		$cuenta->setsaldo_cuentas($this->cuentaDataAccess->getsaldo_cuentas($this->connexion,$cuenta));
		$cuenta->settermino_pago_proveedors($this->cuentaDataAccess->gettermino_pago_proveedors($this->connexion,$cuenta));
		$cuenta->setretencion_ica_ventass($this->cuentaDataAccess->getretencion_ica_ventass($this->connexion,$cuenta));
		$cuenta->setasiento_predefinido_detalles($this->cuentaDataAccess->getasiento_predefinido_detalles($this->connexion,$cuenta));
		$cuenta->setclientes($this->cuentaDataAccess->getclientes($this->connexion,$cuenta));
		$cuenta->setasiento_automatico_detalles($this->cuentaDataAccess->getasiento_automatico_detalles($this->connexion,$cuenta));
		$cuenta->setforma_pago_proveedors($this->cuentaDataAccess->getforma_pago_proveedors($this->connexion,$cuenta));
		$cuenta->settermino_pago_clientes($this->cuentaDataAccess->gettermino_pago_clientes($this->connexion,$cuenta));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cuenta->setempresa($this->cuentaDataAccess->getempresa($this->connexion,$cuenta));
				continue;
			}

			if($clas->clas==tipo_cuenta::$class.'') {
				$cuenta->settipo_cuenta($this->cuentaDataAccess->gettipo_cuenta($this->connexion,$cuenta));
				continue;
			}

			if($clas->clas==tipo_nivel_cuenta::$class.'') {
				$cuenta->settipo_nivel_cuenta($this->cuentaDataAccess->gettipo_nivel_cuenta($this->connexion,$cuenta));
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$cuenta->setcuenta($this->cuentaDataAccess->getcuenta($this->connexion,$cuenta));
				continue;
			}

			if($clas->clas==categoria_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setcategoria_cheques($this->cuentaDataAccess->getcategoria_cheques($this->connexion,$cuenta));

				if($this->isConDeep) {
					$categoriachequeLogic= new categoria_cheque_logic($this->connexion);
					$categoriachequeLogic->setcategoria_cheques($cuenta->getcategoria_cheques());
					$classesLocal=categoria_cheque_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$categoriachequeLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					categoria_cheque_util::refrescarFKDescripciones($categoriachequeLogic->getcategoria_cheques());
					$cuenta->setcategoria_cheques($categoriachequeLogic->getcategoria_cheques());
				}

				continue;
			}

			if($clas->clas==otro_impuesto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setotro_impuesto_ventass($this->cuentaDataAccess->getotro_impuesto_ventass($this->connexion,$cuenta));

				if($this->isConDeep) {
					$otroimpuestoLogic= new otro_impuesto_logic($this->connexion);
					$otroimpuestoLogic->setotro_impuestos($cuenta->getotro_impuesto_ventass());
					$classesLocal=otro_impuesto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$otroimpuestoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					otro_impuesto_util::refrescarFKDescripciones($otroimpuestoLogic->getotro_impuestos());
					$cuenta->setotro_impuesto_ventass($otroimpuestoLogic->getotro_impuestos());
				}

				continue;
			}

			if($clas->clas==impuesto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setimpuesto_ventass($this->cuentaDataAccess->getimpuesto_ventass($this->connexion,$cuenta));

				if($this->isConDeep) {
					$impuestoLogic= new impuesto_logic($this->connexion);
					$impuestoLogic->setimpuestos($cuenta->getimpuesto_ventass());
					$classesLocal=impuesto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$impuestoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					impuesto_util::refrescarFKDescripciones($impuestoLogic->getimpuestos());
					$cuenta->setimpuesto_ventass($impuestoLogic->getimpuestos());
				}

				continue;
			}

			if($clas->clas==cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setcuenta_corrientes($this->cuentaDataAccess->getcuenta_corrientes($this->connexion,$cuenta));

				if($this->isConDeep) {
					$cuentacorrienteLogic= new cuenta_corriente_logic($this->connexion);
					$cuentacorrienteLogic->setcuenta_corrientes($cuenta->getcuenta_corrientes());
					$classesLocal=cuenta_corriente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cuentacorrienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cuenta_corriente_util::refrescarFKDescripciones($cuentacorrienteLogic->getcuenta_corrientes());
					$cuenta->setcuenta_corrientes($cuentacorrienteLogic->getcuenta_corrientes());
				}

				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setproducto_ventas($this->cuentaDataAccess->getproducto_ventas($this->connexion,$cuenta));

				if($this->isConDeep) {
					$productoLogic= new producto_logic($this->connexion);
					$productoLogic->setproductos($cuenta->getproducto_ventas());
					$classesLocal=producto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$productoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					producto_util::refrescarFKDescripciones($productoLogic->getproductos());
					$cuenta->setproducto_ventas($productoLogic->getproductos());
				}

				continue;
			}

			if($clas->clas==instrumento_pago::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setinstrumento_pago_ventass($this->cuentaDataAccess->getinstrumento_pago_ventass($this->connexion,$cuenta));

				if($this->isConDeep) {
					$instrumentopagoLogic= new instrumento_pago_logic($this->connexion);
					$instrumentopagoLogic->setinstrumento_pagos($cuenta->getinstrumento_pago_ventass());
					$classesLocal=instrumento_pago_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$instrumentopagoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					instrumento_pago_util::refrescarFKDescripciones($instrumentopagoLogic->getinstrumento_pagos());
					$cuenta->setinstrumento_pago_ventass($instrumentopagoLogic->getinstrumento_pagos());
				}

				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setlista_producto_ventas($this->cuentaDataAccess->getlista_producto_ventas($this->connexion,$cuenta));

				if($this->isConDeep) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproductoLogic->setlista_productos($cuenta->getlista_producto_ventas());
					$classesLocal=lista_producto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$listaproductoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					lista_producto_util::refrescarFKDescripciones($listaproductoLogic->getlista_productos());
					$cuenta->setlista_producto_ventas($listaproductoLogic->getlista_productos());
				}

				continue;
			}

			if($clas->clas==asiento_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setasiento_detalles($this->cuentaDataAccess->getasiento_detalles($this->connexion,$cuenta));

				if($this->isConDeep) {
					$asientodetalleLogic= new asiento_detalle_logic($this->connexion);
					$asientodetalleLogic->setasiento_detalles($cuenta->getasiento_detalles());
					$classesLocal=asiento_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$asientodetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					asiento_detalle_util::refrescarFKDescripciones($asientodetalleLogic->getasiento_detalles());
					$cuenta->setasiento_detalles($asientodetalleLogic->getasiento_detalles());
				}

				continue;
			}

			if($clas->clas==retencion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setretencion_comprass($this->cuentaDataAccess->getretencion_comprass($this->connexion,$cuenta));

				if($this->isConDeep) {
					$retencionLogic= new retencion_logic($this->connexion);
					$retencionLogic->setretencions($cuenta->getretencion_comprass());
					$classesLocal=retencion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$retencionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					retencion_util::refrescarFKDescripciones($retencionLogic->getretencions());
					$cuenta->setretencion_comprass($retencionLogic->getretencions());
				}

				continue;
			}

			if($clas->clas==retencion_fuente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setretencion_fuente_comprass($this->cuentaDataAccess->getretencion_fuente_comprass($this->connexion,$cuenta));

				if($this->isConDeep) {
					$retencionfuenteLogic= new retencion_fuente_logic($this->connexion);
					$retencionfuenteLogic->setretencion_fuentes($cuenta->getretencion_fuente_comprass());
					$classesLocal=retencion_fuente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$retencionfuenteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					retencion_fuente_util::refrescarFKDescripciones($retencionfuenteLogic->getretencion_fuentes());
					$cuenta->setretencion_fuente_comprass($retencionfuenteLogic->getretencion_fuentes());
				}

				continue;
			}

			if($clas->clas==cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setcuentas($this->cuentaDataAccess->getcuentas($this->connexion,$cuenta));

				if($this->isConDeep) {
					$cuentaLogic= new cuenta_logic($this->connexion);
					$cuentaLogic->setcuentas($cuenta->getcuentas());
					$classesLocal=cuenta_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cuentaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cuenta_util::refrescarFKDescripciones($cuentaLogic->getcuentas());
					$cuenta->setcuentas($cuentaLogic->getcuentas());
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setproveedors($this->cuentaDataAccess->getproveedors($this->connexion,$cuenta));

				if($this->isConDeep) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->setproveedors($cuenta->getproveedors());
					$classesLocal=proveedor_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					proveedor_util::refrescarFKDescripciones($proveedorLogic->getproveedors());
					$cuenta->setproveedors($proveedorLogic->getproveedors());
				}

				continue;
			}

			if($clas->clas==forma_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setforma_pago_clientes($this->cuentaDataAccess->getforma_pago_clientes($this->connexion,$cuenta));

				if($this->isConDeep) {
					$formapagoclienteLogic= new forma_pago_cliente_logic($this->connexion);
					$formapagoclienteLogic->setforma_pago_clientes($cuenta->getforma_pago_clientes());
					$classesLocal=forma_pago_cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$formapagoclienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					forma_pago_cliente_util::refrescarFKDescripciones($formapagoclienteLogic->getforma_pago_clientes());
					$cuenta->setforma_pago_clientes($formapagoclienteLogic->getforma_pago_clientes());
				}

				continue;
			}

			if($clas->clas==saldo_cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setsaldo_cuentas($this->cuentaDataAccess->getsaldo_cuentas($this->connexion,$cuenta));

				if($this->isConDeep) {
					$saldocuentaLogic= new saldo_cuenta_logic($this->connexion);
					$saldocuentaLogic->setsaldo_cuentas($cuenta->getsaldo_cuentas());
					$classesLocal=saldo_cuenta_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$saldocuentaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					saldo_cuenta_util::refrescarFKDescripciones($saldocuentaLogic->getsaldo_cuentas());
					$cuenta->setsaldo_cuentas($saldocuentaLogic->getsaldo_cuentas());
				}

				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->settermino_pago_proveedors($this->cuentaDataAccess->gettermino_pago_proveedors($this->connexion,$cuenta));

				if($this->isConDeep) {
					$terminopagoproveedorLogic= new termino_pago_proveedor_logic($this->connexion);
					$terminopagoproveedorLogic->settermino_pago_proveedors($cuenta->gettermino_pago_proveedors());
					$classesLocal=termino_pago_proveedor_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$terminopagoproveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					termino_pago_proveedor_util::refrescarFKDescripciones($terminopagoproveedorLogic->gettermino_pago_proveedors());
					$cuenta->settermino_pago_proveedors($terminopagoproveedorLogic->gettermino_pago_proveedors());
				}

				continue;
			}

			if($clas->clas==retencion_ica::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setretencion_ica_ventass($this->cuentaDataAccess->getretencion_ica_ventass($this->connexion,$cuenta));

				if($this->isConDeep) {
					$retencionicaLogic= new retencion_ica_logic($this->connexion);
					$retencionicaLogic->setretencion_icas($cuenta->getretencion_ica_ventass());
					$classesLocal=retencion_ica_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$retencionicaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					retencion_ica_util::refrescarFKDescripciones($retencionicaLogic->getretencion_icas());
					$cuenta->setretencion_ica_ventass($retencionicaLogic->getretencion_icas());
				}

				continue;
			}

			if($clas->clas==asiento_predefinido_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setasiento_predefinido_detalles($this->cuentaDataAccess->getasiento_predefinido_detalles($this->connexion,$cuenta));

				if($this->isConDeep) {
					$asientopredefinidodetalleLogic= new asiento_predefinido_detalle_logic($this->connexion);
					$asientopredefinidodetalleLogic->setasiento_predefinido_detalles($cuenta->getasiento_predefinido_detalles());
					$classesLocal=asiento_predefinido_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$asientopredefinidodetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					asiento_predefinido_detalle_util::refrescarFKDescripciones($asientopredefinidodetalleLogic->getasiento_predefinido_detalles());
					$cuenta->setasiento_predefinido_detalles($asientopredefinidodetalleLogic->getasiento_predefinido_detalles());
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setclientes($this->cuentaDataAccess->getclientes($this->connexion,$cuenta));

				if($this->isConDeep) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->setclientes($cuenta->getclientes());
					$classesLocal=cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$clienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cliente_util::refrescarFKDescripciones($clienteLogic->getclientes());
					$cuenta->setclientes($clienteLogic->getclientes());
				}

				continue;
			}

			if($clas->clas==asiento_automatico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setasiento_automatico_detalles($this->cuentaDataAccess->getasiento_automatico_detalles($this->connexion,$cuenta));

				if($this->isConDeep) {
					$asientoautomaticodetalleLogic= new asiento_automatico_detalle_logic($this->connexion);
					$asientoautomaticodetalleLogic->setasiento_automatico_detalles($cuenta->getasiento_automatico_detalles());
					$classesLocal=asiento_automatico_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$asientoautomaticodetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					asiento_automatico_detalle_util::refrescarFKDescripciones($asientoautomaticodetalleLogic->getasiento_automatico_detalles());
					$cuenta->setasiento_automatico_detalles($asientoautomaticodetalleLogic->getasiento_automatico_detalles());
				}

				continue;
			}

			if($clas->clas==forma_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setforma_pago_proveedors($this->cuentaDataAccess->getforma_pago_proveedors($this->connexion,$cuenta));

				if($this->isConDeep) {
					$formapagoproveedorLogic= new forma_pago_proveedor_logic($this->connexion);
					$formapagoproveedorLogic->setforma_pago_proveedors($cuenta->getforma_pago_proveedors());
					$classesLocal=forma_pago_proveedor_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$formapagoproveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					forma_pago_proveedor_util::refrescarFKDescripciones($formapagoproveedorLogic->getforma_pago_proveedors());
					$cuenta->setforma_pago_proveedors($formapagoproveedorLogic->getforma_pago_proveedors());
				}

				continue;
			}

			if($clas->clas==termino_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->settermino_pago_clientes($this->cuentaDataAccess->gettermino_pago_clientes($this->connexion,$cuenta));

				if($this->isConDeep) {
					$terminopagoclienteLogic= new termino_pago_cliente_logic($this->connexion);
					$terminopagoclienteLogic->settermino_pago_clientes($cuenta->gettermino_pago_clientes());
					$classesLocal=termino_pago_cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$terminopagoclienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					termino_pago_cliente_util::refrescarFKDescripciones($terminopagoclienteLogic->gettermino_pago_clientes());
					$cuenta->settermino_pago_clientes($terminopagoclienteLogic->gettermino_pago_clientes());
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
			$cuenta->setempresa($this->cuentaDataAccess->getempresa($this->connexion,$cuenta));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta->settipo_cuenta($this->cuentaDataAccess->gettipo_cuenta($this->connexion,$cuenta));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_nivel_cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta->settipo_nivel_cuenta($this->cuentaDataAccess->gettipo_nivel_cuenta($this->connexion,$cuenta));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta->setcuenta($this->cuentaDataAccess->getcuenta($this->connexion,$cuenta));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==categoria_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(categoria_cheque::$class);
			$cuenta->setcategoria_cheques($this->cuentaDataAccess->getcategoria_cheques($this->connexion,$cuenta));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(otro_impuesto::$class);
			$cuenta->setotro_impuesto_ventass($this->cuentaDataAccess->getotro_impuesto_ventass($this->connexion,$cuenta));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(impuesto::$class);
			$cuenta->setimpuesto_ventass($this->cuentaDataAccess->getimpuesto_ventass($this->connexion,$cuenta));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_corriente::$class);
			$cuenta->setcuenta_corrientes($this->cuentaDataAccess->getcuenta_corrientes($this->connexion,$cuenta));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto::$class);
			$cuenta->setproducto_ventas($this->cuentaDataAccess->getproducto_ventas($this->connexion,$cuenta));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==instrumento_pago::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(instrumento_pago::$class);
			$cuenta->setinstrumento_pago_ventass($this->cuentaDataAccess->getinstrumento_pago_ventass($this->connexion,$cuenta));
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
			$cuenta->setlista_producto_ventas($this->cuentaDataAccess->getlista_producto_ventas($this->connexion,$cuenta));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_detalle::$class);
			$cuenta->setasiento_detalles($this->cuentaDataAccess->getasiento_detalles($this->connexion,$cuenta));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(retencion::$class);
			$cuenta->setretencion_comprass($this->cuentaDataAccess->getretencion_comprass($this->connexion,$cuenta));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion_fuente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(retencion_fuente::$class);
			$cuenta->setretencion_fuente_comprass($this->cuentaDataAccess->getretencion_fuente_comprass($this->connexion,$cuenta));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta::$class);
			$cuenta->setcuentas($this->cuentaDataAccess->getcuentas($this->connexion,$cuenta));
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
			$cuenta->setproveedors($this->cuentaDataAccess->getproveedors($this->connexion,$cuenta));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==forma_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(forma_pago_cliente::$class);
			$cuenta->setforma_pago_clientes($this->cuentaDataAccess->getforma_pago_clientes($this->connexion,$cuenta));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==saldo_cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(saldo_cuenta::$class);
			$cuenta->setsaldo_cuentas($this->cuentaDataAccess->getsaldo_cuentas($this->connexion,$cuenta));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(termino_pago_proveedor::$class);
			$cuenta->settermino_pago_proveedors($this->cuentaDataAccess->gettermino_pago_proveedors($this->connexion,$cuenta));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion_ica::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(retencion_ica::$class);
			$cuenta->setretencion_ica_ventass($this->cuentaDataAccess->getretencion_ica_ventass($this->connexion,$cuenta));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_predefinido_detalle::$class);
			$cuenta->setasiento_predefinido_detalles($this->cuentaDataAccess->getasiento_predefinido_detalles($this->connexion,$cuenta));
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
			$cuenta->setclientes($this->cuentaDataAccess->getclientes($this->connexion,$cuenta));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_automatico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_automatico_detalle::$class);
			$cuenta->setasiento_automatico_detalles($this->cuentaDataAccess->getasiento_automatico_detalles($this->connexion,$cuenta));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==forma_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(forma_pago_proveedor::$class);
			$cuenta->setforma_pago_proveedors($this->cuentaDataAccess->getforma_pago_proveedors($this->connexion,$cuenta));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(termino_pago_cliente::$class);
			$cuenta->settermino_pago_clientes($this->cuentaDataAccess->gettermino_pago_clientes($this->connexion,$cuenta));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cuenta->setempresa($this->cuentaDataAccess->getempresa($this->connexion,$cuenta));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($cuenta->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$cuenta->settipo_cuenta($this->cuentaDataAccess->gettipo_cuenta($this->connexion,$cuenta));
		$tipo_cuentaLogic= new tipo_cuenta_logic($this->connexion);
		$tipo_cuentaLogic->deepLoad($cuenta->gettipo_cuenta(),$isDeep,$deepLoadType,$clases);
				
		$cuenta->settipo_nivel_cuenta($this->cuentaDataAccess->gettipo_nivel_cuenta($this->connexion,$cuenta));
		$tipo_nivel_cuentaLogic= new tipo_nivel_cuenta_logic($this->connexion);
		$tipo_nivel_cuentaLogic->deepLoad($cuenta->gettipo_nivel_cuenta(),$isDeep,$deepLoadType,$clases);
				
		$cuenta->setcuenta($this->cuentaDataAccess->getcuenta($this->connexion,$cuenta));
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepLoad($cuenta->getcuenta(),$isDeep,$deepLoadType,$clases);
				

		$cuenta->setcategoria_cheques($this->cuentaDataAccess->getcategoria_cheques($this->connexion,$cuenta));

		foreach($cuenta->getcategoria_cheques() as $categoriacheque) {
			$categoriachequeLogic= new categoria_cheque_logic($this->connexion);
			$categoriachequeLogic->deepLoad($categoriacheque,$isDeep,$deepLoadType,$clases);
		}

		$cuenta->setotro_impuesto_ventass($this->cuentaDataAccess->getotro_impuesto_ventass($this->connexion,$cuenta));

		foreach($cuenta->getotro_impuesto_ventass() as $otroimpuesto) {
			$otroimpuestoLogic= new otro_impuesto_logic($this->connexion);
			$otroimpuestoLogic->deepLoad($otroimpuesto,$isDeep,$deepLoadType,$clases);
		}

		$cuenta->setimpuesto_ventass($this->cuentaDataAccess->getimpuesto_ventass($this->connexion,$cuenta));

		foreach($cuenta->getimpuesto_ventass() as $impuesto) {
			$impuestoLogic= new impuesto_logic($this->connexion);
			$impuestoLogic->deepLoad($impuesto,$isDeep,$deepLoadType,$clases);
		}

		$cuenta->setcuenta_corrientes($this->cuentaDataAccess->getcuenta_corrientes($this->connexion,$cuenta));

		foreach($cuenta->getcuenta_corrientes() as $cuentacorriente) {
			$cuentacorrienteLogic= new cuenta_corriente_logic($this->connexion);
			$cuentacorrienteLogic->deepLoad($cuentacorriente,$isDeep,$deepLoadType,$clases);
		}

		$cuenta->setproducto_ventas($this->cuentaDataAccess->getproducto_ventas($this->connexion,$cuenta));

		foreach($cuenta->getproducto_ventas() as $producto) {
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
		}

		$cuenta->setinstrumento_pago_ventass($this->cuentaDataAccess->getinstrumento_pago_ventass($this->connexion,$cuenta));

		foreach($cuenta->getinstrumento_pago_ventass() as $instrumentopago) {
			$instrumentopagoLogic= new instrumento_pago_logic($this->connexion);
			$instrumentopagoLogic->deepLoad($instrumentopago,$isDeep,$deepLoadType,$clases);
		}

		$cuenta->setlista_producto_ventas($this->cuentaDataAccess->getlista_producto_ventas($this->connexion,$cuenta));

		foreach($cuenta->getlista_producto_ventas() as $listaproducto) {
			$listaproductoLogic= new lista_producto_logic($this->connexion);
			$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
		}

		$cuenta->setasiento_detalles($this->cuentaDataAccess->getasiento_detalles($this->connexion,$cuenta));

		foreach($cuenta->getasiento_detalles() as $asientodetalle) {
			$asientodetalleLogic= new asiento_detalle_logic($this->connexion);
			$asientodetalleLogic->deepLoad($asientodetalle,$isDeep,$deepLoadType,$clases);
		}

		$cuenta->setretencion_comprass($this->cuentaDataAccess->getretencion_comprass($this->connexion,$cuenta));

		foreach($cuenta->getretencion_comprass() as $retencion) {
			$retencionLogic= new retencion_logic($this->connexion);
			$retencionLogic->deepLoad($retencion,$isDeep,$deepLoadType,$clases);
		}

		$cuenta->setretencion_fuente_comprass($this->cuentaDataAccess->getretencion_fuente_comprass($this->connexion,$cuenta));

		foreach($cuenta->getretencion_fuente_comprass() as $retencionfuente) {
			$retencionfuenteLogic= new retencion_fuente_logic($this->connexion);
			$retencionfuenteLogic->deepLoad($retencionfuente,$isDeep,$deepLoadType,$clases);
		}

		$cuenta->setcuentas($this->cuentaDataAccess->getcuentas($this->connexion,$cuenta));

		foreach($cuenta->getcuentas() as $cuenta) {
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($cuenta,$isDeep,$deepLoadType,$clases);
		}

		$cuenta->setproveedors($this->cuentaDataAccess->getproveedors($this->connexion,$cuenta));

		foreach($cuenta->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
		}

		$cuenta->setforma_pago_clientes($this->cuentaDataAccess->getforma_pago_clientes($this->connexion,$cuenta));

		foreach($cuenta->getforma_pago_clientes() as $formapagocliente) {
			$formapagoclienteLogic= new forma_pago_cliente_logic($this->connexion);
			$formapagoclienteLogic->deepLoad($formapagocliente,$isDeep,$deepLoadType,$clases);
		}

		$cuenta->setsaldo_cuentas($this->cuentaDataAccess->getsaldo_cuentas($this->connexion,$cuenta));

		foreach($cuenta->getsaldo_cuentas() as $saldocuenta) {
			$saldocuentaLogic= new saldo_cuenta_logic($this->connexion);
			$saldocuentaLogic->deepLoad($saldocuenta,$isDeep,$deepLoadType,$clases);
		}

		$cuenta->settermino_pago_proveedors($this->cuentaDataAccess->gettermino_pago_proveedors($this->connexion,$cuenta));

		foreach($cuenta->gettermino_pago_proveedors() as $terminopagoproveedor) {
			$terminopagoproveedorLogic= new termino_pago_proveedor_logic($this->connexion);
			$terminopagoproveedorLogic->deepLoad($terminopagoproveedor,$isDeep,$deepLoadType,$clases);
		}

		$cuenta->setretencion_ica_ventass($this->cuentaDataAccess->getretencion_ica_ventass($this->connexion,$cuenta));

		foreach($cuenta->getretencion_ica_ventass() as $retencionica) {
			$retencionicaLogic= new retencion_ica_logic($this->connexion);
			$retencionicaLogic->deepLoad($retencionica,$isDeep,$deepLoadType,$clases);
		}

		$cuenta->setasiento_predefinido_detalles($this->cuentaDataAccess->getasiento_predefinido_detalles($this->connexion,$cuenta));

		foreach($cuenta->getasiento_predefinido_detalles() as $asientopredefinidodetalle) {
			$asientopredefinidodetalleLogic= new asiento_predefinido_detalle_logic($this->connexion);
			$asientopredefinidodetalleLogic->deepLoad($asientopredefinidodetalle,$isDeep,$deepLoadType,$clases);
		}

		$cuenta->setclientes($this->cuentaDataAccess->getclientes($this->connexion,$cuenta));

		foreach($cuenta->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
		}

		$cuenta->setasiento_automatico_detalles($this->cuentaDataAccess->getasiento_automatico_detalles($this->connexion,$cuenta));

		foreach($cuenta->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
			$asientoautomaticodetalleLogic= new asiento_automatico_detalle_logic($this->connexion);
			$asientoautomaticodetalleLogic->deepLoad($asientoautomaticodetalle,$isDeep,$deepLoadType,$clases);
		}

		$cuenta->setforma_pago_proveedors($this->cuentaDataAccess->getforma_pago_proveedors($this->connexion,$cuenta));

		foreach($cuenta->getforma_pago_proveedors() as $formapagoproveedor) {
			$formapagoproveedorLogic= new forma_pago_proveedor_logic($this->connexion);
			$formapagoproveedorLogic->deepLoad($formapagoproveedor,$isDeep,$deepLoadType,$clases);
		}

		$cuenta->settermino_pago_clientes($this->cuentaDataAccess->gettermino_pago_clientes($this->connexion,$cuenta));

		foreach($cuenta->gettermino_pago_clientes() as $terminopagocliente) {
			$terminopagoclienteLogic= new termino_pago_cliente_logic($this->connexion);
			$terminopagoclienteLogic->deepLoad($terminopagocliente,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cuenta->setempresa($this->cuentaDataAccess->getempresa($this->connexion,$cuenta));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($cuenta->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_cuenta::$class.'') {
				$cuenta->settipo_cuenta($this->cuentaDataAccess->gettipo_cuenta($this->connexion,$cuenta));
				$tipo_cuentaLogic= new tipo_cuenta_logic($this->connexion);
				$tipo_cuentaLogic->deepLoad($cuenta->gettipo_cuenta(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_nivel_cuenta::$class.'') {
				$cuenta->settipo_nivel_cuenta($this->cuentaDataAccess->gettipo_nivel_cuenta($this->connexion,$cuenta));
				$tipo_nivel_cuentaLogic= new tipo_nivel_cuenta_logic($this->connexion);
				$tipo_nivel_cuentaLogic->deepLoad($cuenta->gettipo_nivel_cuenta(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$cuenta->setcuenta($this->cuentaDataAccess->getcuenta($this->connexion,$cuenta));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($cuenta->getcuenta(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==categoria_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setcategoria_cheques($this->cuentaDataAccess->getcategoria_cheques($this->connexion,$cuenta));

				foreach($cuenta->getcategoria_cheques() as $categoriacheque) {
					$categoriachequeLogic= new categoria_cheque_logic($this->connexion);
					$categoriachequeLogic->deepLoad($categoriacheque,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==otro_impuesto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setotro_impuesto_ventass($this->cuentaDataAccess->getotro_impuesto_ventass($this->connexion,$cuenta));

				foreach($cuenta->getotro_impuesto_ventass() as $otroimpuesto) {
					$otroimpuestoLogic= new otro_impuesto_logic($this->connexion);
					$otroimpuestoLogic->deepLoad($otroimpuesto,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==impuesto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setimpuesto_ventass($this->cuentaDataAccess->getimpuesto_ventass($this->connexion,$cuenta));

				foreach($cuenta->getimpuesto_ventass() as $impuesto) {
					$impuestoLogic= new impuesto_logic($this->connexion);
					$impuestoLogic->deepLoad($impuesto,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setcuenta_corrientes($this->cuentaDataAccess->getcuenta_corrientes($this->connexion,$cuenta));

				foreach($cuenta->getcuenta_corrientes() as $cuentacorriente) {
					$cuentacorrienteLogic= new cuenta_corriente_logic($this->connexion);
					$cuentacorrienteLogic->deepLoad($cuentacorriente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setproducto_ventas($this->cuentaDataAccess->getproducto_ventas($this->connexion,$cuenta));

				foreach($cuenta->getproducto_ventas() as $producto) {
					$productoLogic= new producto_logic($this->connexion);
					$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==instrumento_pago::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setinstrumento_pago_ventass($this->cuentaDataAccess->getinstrumento_pago_ventass($this->connexion,$cuenta));

				foreach($cuenta->getinstrumento_pago_ventass() as $instrumentopago) {
					$instrumentopagoLogic= new instrumento_pago_logic($this->connexion);
					$instrumentopagoLogic->deepLoad($instrumentopago,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setlista_producto_ventas($this->cuentaDataAccess->getlista_producto_ventas($this->connexion,$cuenta));

				foreach($cuenta->getlista_producto_ventas() as $listaproducto) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==asiento_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setasiento_detalles($this->cuentaDataAccess->getasiento_detalles($this->connexion,$cuenta));

				foreach($cuenta->getasiento_detalles() as $asientodetalle) {
					$asientodetalleLogic= new asiento_detalle_logic($this->connexion);
					$asientodetalleLogic->deepLoad($asientodetalle,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==retencion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setretencion_comprass($this->cuentaDataAccess->getretencion_comprass($this->connexion,$cuenta));

				foreach($cuenta->getretencion_comprass() as $retencion) {
					$retencionLogic= new retencion_logic($this->connexion);
					$retencionLogic->deepLoad($retencion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==retencion_fuente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setretencion_fuente_comprass($this->cuentaDataAccess->getretencion_fuente_comprass($this->connexion,$cuenta));

				foreach($cuenta->getretencion_fuente_comprass() as $retencionfuente) {
					$retencionfuenteLogic= new retencion_fuente_logic($this->connexion);
					$retencionfuenteLogic->deepLoad($retencionfuente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setcuentas($this->cuentaDataAccess->getcuentas($this->connexion,$cuenta));

				foreach($cuenta->getcuentas() as $cuenta) {
					$cuentaLogic= new cuenta_logic($this->connexion);
					$cuentaLogic->deepLoad($cuenta,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setproveedors($this->cuentaDataAccess->getproveedors($this->connexion,$cuenta));

				foreach($cuenta->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==forma_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setforma_pago_clientes($this->cuentaDataAccess->getforma_pago_clientes($this->connexion,$cuenta));

				foreach($cuenta->getforma_pago_clientes() as $formapagocliente) {
					$formapagoclienteLogic= new forma_pago_cliente_logic($this->connexion);
					$formapagoclienteLogic->deepLoad($formapagocliente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==saldo_cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setsaldo_cuentas($this->cuentaDataAccess->getsaldo_cuentas($this->connexion,$cuenta));

				foreach($cuenta->getsaldo_cuentas() as $saldocuenta) {
					$saldocuentaLogic= new saldo_cuenta_logic($this->connexion);
					$saldocuentaLogic->deepLoad($saldocuenta,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->settermino_pago_proveedors($this->cuentaDataAccess->gettermino_pago_proveedors($this->connexion,$cuenta));

				foreach($cuenta->gettermino_pago_proveedors() as $terminopagoproveedor) {
					$terminopagoproveedorLogic= new termino_pago_proveedor_logic($this->connexion);
					$terminopagoproveedorLogic->deepLoad($terminopagoproveedor,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==retencion_ica::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setretencion_ica_ventass($this->cuentaDataAccess->getretencion_ica_ventass($this->connexion,$cuenta));

				foreach($cuenta->getretencion_ica_ventass() as $retencionica) {
					$retencionicaLogic= new retencion_ica_logic($this->connexion);
					$retencionicaLogic->deepLoad($retencionica,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==asiento_predefinido_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setasiento_predefinido_detalles($this->cuentaDataAccess->getasiento_predefinido_detalles($this->connexion,$cuenta));

				foreach($cuenta->getasiento_predefinido_detalles() as $asientopredefinidodetalle) {
					$asientopredefinidodetalleLogic= new asiento_predefinido_detalle_logic($this->connexion);
					$asientopredefinidodetalleLogic->deepLoad($asientopredefinidodetalle,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setclientes($this->cuentaDataAccess->getclientes($this->connexion,$cuenta));

				foreach($cuenta->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==asiento_automatico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setasiento_automatico_detalles($this->cuentaDataAccess->getasiento_automatico_detalles($this->connexion,$cuenta));

				foreach($cuenta->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
					$asientoautomaticodetalleLogic= new asiento_automatico_detalle_logic($this->connexion);
					$asientoautomaticodetalleLogic->deepLoad($asientoautomaticodetalle,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==forma_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->setforma_pago_proveedors($this->cuentaDataAccess->getforma_pago_proveedors($this->connexion,$cuenta));

				foreach($cuenta->getforma_pago_proveedors() as $formapagoproveedor) {
					$formapagoproveedorLogic= new forma_pago_proveedor_logic($this->connexion);
					$formapagoproveedorLogic->deepLoad($formapagoproveedor,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cuenta->settermino_pago_clientes($this->cuentaDataAccess->gettermino_pago_clientes($this->connexion,$cuenta));

				foreach($cuenta->gettermino_pago_clientes() as $terminopagocliente) {
					$terminopagoclienteLogic= new termino_pago_cliente_logic($this->connexion);
					$terminopagoclienteLogic->deepLoad($terminopagocliente,$isDeep,$deepLoadType,$clases);
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
			$cuenta->setempresa($this->cuentaDataAccess->getempresa($this->connexion,$cuenta));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($cuenta->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta->settipo_cuenta($this->cuentaDataAccess->gettipo_cuenta($this->connexion,$cuenta));
			$tipo_cuentaLogic= new tipo_cuenta_logic($this->connexion);
			$tipo_cuentaLogic->deepLoad($cuenta->gettipo_cuenta(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_nivel_cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta->settipo_nivel_cuenta($this->cuentaDataAccess->gettipo_nivel_cuenta($this->connexion,$cuenta));
			$tipo_nivel_cuentaLogic= new tipo_nivel_cuenta_logic($this->connexion);
			$tipo_nivel_cuentaLogic->deepLoad($cuenta->gettipo_nivel_cuenta(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cuenta->setcuenta($this->cuentaDataAccess->getcuenta($this->connexion,$cuenta));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($cuenta->getcuenta(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==categoria_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(categoria_cheque::$class);
			$cuenta->setcategoria_cheques($this->cuentaDataAccess->getcategoria_cheques($this->connexion,$cuenta));

			foreach($cuenta->getcategoria_cheques() as $categoriacheque) {
				$categoriachequeLogic= new categoria_cheque_logic($this->connexion);
				$categoriachequeLogic->deepLoad($categoriacheque,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(otro_impuesto::$class);
			$cuenta->setotro_impuesto_ventass($this->cuentaDataAccess->getotro_impuesto_ventass($this->connexion,$cuenta));

			foreach($cuenta->getotro_impuesto_ventass() as $otroimpuesto) {
				$otroimpuestoLogic= new otro_impuesto_logic($this->connexion);
				$otroimpuestoLogic->deepLoad($otroimpuesto,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(impuesto::$class);
			$cuenta->setimpuesto_ventass($this->cuentaDataAccess->getimpuesto_ventass($this->connexion,$cuenta));

			foreach($cuenta->getimpuesto_ventass() as $impuesto) {
				$impuestoLogic= new impuesto_logic($this->connexion);
				$impuestoLogic->deepLoad($impuesto,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_corriente::$class);
			$cuenta->setcuenta_corrientes($this->cuentaDataAccess->getcuenta_corrientes($this->connexion,$cuenta));

			foreach($cuenta->getcuenta_corrientes() as $cuentacorriente) {
				$cuentacorrienteLogic= new cuenta_corriente_logic($this->connexion);
				$cuentacorrienteLogic->deepLoad($cuentacorriente,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto::$class);
			$cuenta->setproducto_ventas($this->cuentaDataAccess->getproducto_ventas($this->connexion,$cuenta));

			foreach($cuenta->getproducto_ventas() as $producto) {
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==instrumento_pago::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(instrumento_pago::$class);
			$cuenta->setinstrumento_pago_ventass($this->cuentaDataAccess->getinstrumento_pago_ventass($this->connexion,$cuenta));

			foreach($cuenta->getinstrumento_pago_ventass() as $instrumentopago) {
				$instrumentopagoLogic= new instrumento_pago_logic($this->connexion);
				$instrumentopagoLogic->deepLoad($instrumentopago,$isDeep,$deepLoadType,$clases);
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
			$cuenta->setlista_producto_ventas($this->cuentaDataAccess->getlista_producto_ventas($this->connexion,$cuenta));

			foreach($cuenta->getlista_producto_ventas() as $listaproducto) {
				$listaproductoLogic= new lista_producto_logic($this->connexion);
				$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_detalle::$class);
			$cuenta->setasiento_detalles($this->cuentaDataAccess->getasiento_detalles($this->connexion,$cuenta));

			foreach($cuenta->getasiento_detalles() as $asientodetalle) {
				$asientodetalleLogic= new asiento_detalle_logic($this->connexion);
				$asientodetalleLogic->deepLoad($asientodetalle,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(retencion::$class);
			$cuenta->setretencion_comprass($this->cuentaDataAccess->getretencion_comprass($this->connexion,$cuenta));

			foreach($cuenta->getretencion_comprass() as $retencion) {
				$retencionLogic= new retencion_logic($this->connexion);
				$retencionLogic->deepLoad($retencion,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion_fuente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(retencion_fuente::$class);
			$cuenta->setretencion_fuente_comprass($this->cuentaDataAccess->getretencion_fuente_comprass($this->connexion,$cuenta));

			foreach($cuenta->getretencion_fuente_comprass() as $retencionfuente) {
				$retencionfuenteLogic= new retencion_fuente_logic($this->connexion);
				$retencionfuenteLogic->deepLoad($retencionfuente,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta::$class);
			$cuenta->setcuentas($this->cuentaDataAccess->getcuentas($this->connexion,$cuenta));

			foreach($cuenta->getcuentas() as $cuenta) {
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($cuenta,$isDeep,$deepLoadType,$clases);
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
			$cuenta->setproveedors($this->cuentaDataAccess->getproveedors($this->connexion,$cuenta));

			foreach($cuenta->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==forma_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(forma_pago_cliente::$class);
			$cuenta->setforma_pago_clientes($this->cuentaDataAccess->getforma_pago_clientes($this->connexion,$cuenta));

			foreach($cuenta->getforma_pago_clientes() as $formapagocliente) {
				$formapagoclienteLogic= new forma_pago_cliente_logic($this->connexion);
				$formapagoclienteLogic->deepLoad($formapagocliente,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==saldo_cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(saldo_cuenta::$class);
			$cuenta->setsaldo_cuentas($this->cuentaDataAccess->getsaldo_cuentas($this->connexion,$cuenta));

			foreach($cuenta->getsaldo_cuentas() as $saldocuenta) {
				$saldocuentaLogic= new saldo_cuenta_logic($this->connexion);
				$saldocuentaLogic->deepLoad($saldocuenta,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(termino_pago_proveedor::$class);
			$cuenta->settermino_pago_proveedors($this->cuentaDataAccess->gettermino_pago_proveedors($this->connexion,$cuenta));

			foreach($cuenta->gettermino_pago_proveedors() as $terminopagoproveedor) {
				$terminopagoproveedorLogic= new termino_pago_proveedor_logic($this->connexion);
				$terminopagoproveedorLogic->deepLoad($terminopagoproveedor,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion_ica::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(retencion_ica::$class);
			$cuenta->setretencion_ica_ventass($this->cuentaDataAccess->getretencion_ica_ventass($this->connexion,$cuenta));

			foreach($cuenta->getretencion_ica_ventass() as $retencionica) {
				$retencionicaLogic= new retencion_ica_logic($this->connexion);
				$retencionicaLogic->deepLoad($retencionica,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_predefinido_detalle::$class);
			$cuenta->setasiento_predefinido_detalles($this->cuentaDataAccess->getasiento_predefinido_detalles($this->connexion,$cuenta));

			foreach($cuenta->getasiento_predefinido_detalles() as $asientopredefinidodetalle) {
				$asientopredefinidodetalleLogic= new asiento_predefinido_detalle_logic($this->connexion);
				$asientopredefinidodetalleLogic->deepLoad($asientopredefinidodetalle,$isDeep,$deepLoadType,$clases);
			}
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
			$cuenta->setclientes($this->cuentaDataAccess->getclientes($this->connexion,$cuenta));

			foreach($cuenta->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_automatico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_automatico_detalle::$class);
			$cuenta->setasiento_automatico_detalles($this->cuentaDataAccess->getasiento_automatico_detalles($this->connexion,$cuenta));

			foreach($cuenta->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
				$asientoautomaticodetalleLogic= new asiento_automatico_detalle_logic($this->connexion);
				$asientoautomaticodetalleLogic->deepLoad($asientoautomaticodetalle,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==forma_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(forma_pago_proveedor::$class);
			$cuenta->setforma_pago_proveedors($this->cuentaDataAccess->getforma_pago_proveedors($this->connexion,$cuenta));

			foreach($cuenta->getforma_pago_proveedors() as $formapagoproveedor) {
				$formapagoproveedorLogic= new forma_pago_proveedor_logic($this->connexion);
				$formapagoproveedorLogic->deepLoad($formapagoproveedor,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(termino_pago_cliente::$class);
			$cuenta->settermino_pago_clientes($this->cuentaDataAccess->gettermino_pago_clientes($this->connexion,$cuenta));

			foreach($cuenta->gettermino_pago_clientes() as $terminopagocliente) {
				$terminopagoclienteLogic= new termino_pago_cliente_logic($this->connexion);
				$terminopagoclienteLogic->deepLoad($terminopagocliente,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(cuenta $cuenta,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//cuenta_logic_add::updatecuentaToSave($this->cuenta);			
			
			if(!$paraDeleteCascade) {				
				cuenta_data::save($cuenta, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($cuenta->getempresa(),$this->connexion);
		tipo_cuenta_data::save($cuenta->gettipo_cuenta(),$this->connexion);
		tipo_nivel_cuenta_data::save($cuenta->gettipo_nivel_cuenta(),$this->connexion);
		cuenta_data::save($cuenta->getcuenta(),$this->connexion);

		foreach($cuenta->getcategoria_cheques() as $categoriacheque) {
			$categoriacheque->setid_cuenta($cuenta->getId());
			categoria_cheque_data::save($categoriacheque,$this->connexion);
		}


		foreach($cuenta->getotro_impuesto_ventass() as $otroimpuesto) {
			$otroimpuesto->setid_cuenta($cuenta->getId());
			otro_impuesto_data::save($otroimpuesto,$this->connexion);
		}


		foreach($cuenta->getimpuesto_ventass() as $impuesto) {
			$impuesto->setid_cuenta($cuenta->getId());
			impuesto_data::save($impuesto,$this->connexion);
		}


		foreach($cuenta->getcuenta_corrientes() as $cuentacorriente) {
			$cuentacorriente->setid_cuenta($cuenta->getId());
			cuenta_corriente_data::save($cuentacorriente,$this->connexion);
		}


		foreach($cuenta->getproducto_ventas() as $producto) {
			$producto->setid_cuenta($cuenta->getId());
			producto_data::save($producto,$this->connexion);
		}


		foreach($cuenta->getinstrumento_pago_ventass() as $instrumentopago) {
			$instrumentopago->setid_cuenta($cuenta->getId());
			instrumento_pago_data::save($instrumentopago,$this->connexion);
		}


		foreach($cuenta->getlista_producto_ventas() as $listaproducto) {
			$listaproducto->setid_cuenta($cuenta->getId());
			lista_producto_data::save($listaproducto,$this->connexion);
		}


		foreach($cuenta->getasiento_detalles() as $asientodetalle) {
			$asientodetalle->setid_cuenta($cuenta->getId());
			asiento_detalle_data::save($asientodetalle,$this->connexion);
		}


		foreach($cuenta->getretencion_comprass() as $retencion) {
			$retencion->setid_cuenta($cuenta->getId());
			retencion_data::save($retencion,$this->connexion);
		}


		foreach($cuenta->getretencion_fuente_comprass() as $retencionfuente) {
			$retencionfuente->setid_cuenta($cuenta->getId());
			retencion_fuente_data::save($retencionfuente,$this->connexion);
		}


		foreach($cuenta->getcuentas() as $cuenta) {
			$cuenta->setid_cuenta($cuenta->getId());
			cuenta_data::save($cuenta,$this->connexion);
		}


		foreach($cuenta->getproveedors() as $proveedor) {
			$proveedor->setid_cuenta($cuenta->getId());
			proveedor_data::save($proveedor,$this->connexion);
		}


		foreach($cuenta->getforma_pago_clientes() as $formapagocliente) {
			$formapagocliente->setid_cuenta($cuenta->getId());
			forma_pago_cliente_data::save($formapagocliente,$this->connexion);
		}


		foreach($cuenta->getsaldo_cuentas() as $saldocuenta) {
			$saldocuenta->setid_cuenta($cuenta->getId());
			saldo_cuenta_data::save($saldocuenta,$this->connexion);
		}


		foreach($cuenta->gettermino_pago_proveedors() as $terminopagoproveedor) {
			$terminopagoproveedor->setid_cuenta($cuenta->getId());
			termino_pago_proveedor_data::save($terminopagoproveedor,$this->connexion);
		}


		foreach($cuenta->getretencion_ica_ventass() as $retencionica) {
			$retencionica->setid_cuenta($cuenta->getId());
			retencion_ica_data::save($retencionica,$this->connexion);
		}


		foreach($cuenta->getasiento_predefinido_detalles() as $asientopredefinidodetalle) {
			$asientopredefinidodetalle->setid_cuenta($cuenta->getId());
			asiento_predefinido_detalle_data::save($asientopredefinidodetalle,$this->connexion);
		}


		foreach($cuenta->getclientes() as $cliente) {
			$cliente->setid_cuenta($cuenta->getId());
			cliente_data::save($cliente,$this->connexion);
		}


		foreach($cuenta->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
			$asientoautomaticodetalle->setid_cuenta($cuenta->getId());
			asiento_automatico_detalle_data::save($asientoautomaticodetalle,$this->connexion);
		}


		foreach($cuenta->getforma_pago_proveedors() as $formapagoproveedor) {
			$formapagoproveedor->setid_cuenta($cuenta->getId());
			forma_pago_proveedor_data::save($formapagoproveedor,$this->connexion);
		}


		foreach($cuenta->gettermino_pago_clientes() as $terminopagocliente) {
			$terminopagocliente->setid_cuenta($cuenta->getId());
			termino_pago_cliente_data::save($terminopagocliente,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cuenta->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_cuenta::$class.'') {
				tipo_cuenta_data::save($cuenta->gettipo_cuenta(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_nivel_cuenta::$class.'') {
				tipo_nivel_cuenta_data::save($cuenta->gettipo_nivel_cuenta(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($cuenta->getcuenta(),$this->connexion);
				continue;
			}


			if($clas->clas==categoria_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getcategoria_cheques() as $categoriacheque) {
					$categoriacheque->setid_cuenta($cuenta->getId());
					categoria_cheque_data::save($categoriacheque,$this->connexion);
				}

				continue;
			}

			if($clas->clas==otro_impuesto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getotro_impuesto_ventass() as $otroimpuesto) {
					$otroimpuesto->setid_cuenta($cuenta->getId());
					otro_impuesto_data::save($otroimpuesto,$this->connexion);
				}

				continue;
			}

			if($clas->clas==impuesto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getimpuesto_ventass() as $impuesto) {
					$impuesto->setid_cuenta($cuenta->getId());
					impuesto_data::save($impuesto,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getcuenta_corrientes() as $cuentacorriente) {
					$cuentacorriente->setid_cuenta($cuenta->getId());
					cuenta_corriente_data::save($cuentacorriente,$this->connexion);
				}

				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getproducto_ventas() as $producto) {
					$producto->setid_cuenta($cuenta->getId());
					producto_data::save($producto,$this->connexion);
				}

				continue;
			}

			if($clas->clas==instrumento_pago::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getinstrumento_pago_ventass() as $instrumentopago) {
					$instrumentopago->setid_cuenta($cuenta->getId());
					instrumento_pago_data::save($instrumentopago,$this->connexion);
				}

				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getlista_producto_ventas() as $listaproducto) {
					$listaproducto->setid_cuenta($cuenta->getId());
					lista_producto_data::save($listaproducto,$this->connexion);
				}

				continue;
			}

			if($clas->clas==asiento_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getasiento_detalles() as $asientodetalle) {
					$asientodetalle->setid_cuenta($cuenta->getId());
					asiento_detalle_data::save($asientodetalle,$this->connexion);
				}

				continue;
			}

			if($clas->clas==retencion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getretencion_comprass() as $retencion) {
					$retencion->setid_cuenta($cuenta->getId());
					retencion_data::save($retencion,$this->connexion);
				}

				continue;
			}

			if($clas->clas==retencion_fuente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getretencion_fuente_comprass() as $retencionfuente) {
					$retencionfuente->setid_cuenta($cuenta->getId());
					retencion_fuente_data::save($retencionfuente,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getcuentas() as $cuenta) {
					$cuenta->setid_cuenta($cuenta->getId());
					cuenta_data::save($cuenta,$this->connexion);
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getproveedors() as $proveedor) {
					$proveedor->setid_cuenta($cuenta->getId());
					proveedor_data::save($proveedor,$this->connexion);
				}

				continue;
			}

			if($clas->clas==forma_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getforma_pago_clientes() as $formapagocliente) {
					$formapagocliente->setid_cuenta($cuenta->getId());
					forma_pago_cliente_data::save($formapagocliente,$this->connexion);
				}

				continue;
			}

			if($clas->clas==saldo_cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getsaldo_cuentas() as $saldocuenta) {
					$saldocuenta->setid_cuenta($cuenta->getId());
					saldo_cuenta_data::save($saldocuenta,$this->connexion);
				}

				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->gettermino_pago_proveedors() as $terminopagoproveedor) {
					$terminopagoproveedor->setid_cuenta($cuenta->getId());
					termino_pago_proveedor_data::save($terminopagoproveedor,$this->connexion);
				}

				continue;
			}

			if($clas->clas==retencion_ica::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getretencion_ica_ventass() as $retencionica) {
					$retencionica->setid_cuenta($cuenta->getId());
					retencion_ica_data::save($retencionica,$this->connexion);
				}

				continue;
			}

			if($clas->clas==asiento_predefinido_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getasiento_predefinido_detalles() as $asientopredefinidodetalle) {
					$asientopredefinidodetalle->setid_cuenta($cuenta->getId());
					asiento_predefinido_detalle_data::save($asientopredefinidodetalle,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getclientes() as $cliente) {
					$cliente->setid_cuenta($cuenta->getId());
					cliente_data::save($cliente,$this->connexion);
				}

				continue;
			}

			if($clas->clas==asiento_automatico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
					$asientoautomaticodetalle->setid_cuenta($cuenta->getId());
					asiento_automatico_detalle_data::save($asientoautomaticodetalle,$this->connexion);
				}

				continue;
			}

			if($clas->clas==forma_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getforma_pago_proveedors() as $formapagoproveedor) {
					$formapagoproveedor->setid_cuenta($cuenta->getId());
					forma_pago_proveedor_data::save($formapagoproveedor,$this->connexion);
				}

				continue;
			}

			if($clas->clas==termino_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->gettermino_pago_clientes() as $terminopagocliente) {
					$terminopagocliente->setid_cuenta($cuenta->getId());
					termino_pago_cliente_data::save($terminopagocliente,$this->connexion);
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
			empresa_data::save($cuenta->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_cuenta_data::save($cuenta->gettipo_cuenta(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_nivel_cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_nivel_cuenta_data::save($cuenta->gettipo_nivel_cuenta(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($cuenta->getcuenta(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==categoria_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(categoria_cheque::$class);

			foreach($cuenta->getcategoria_cheques() as $categoriacheque) {
				$categoriacheque->setid_cuenta($cuenta->getId());
				categoria_cheque_data::save($categoriacheque,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(otro_impuesto::$class);

			foreach($cuenta->getotro_impuesto_ventass() as $otroimpuesto) {
				$otroimpuesto->setid_cuenta($cuenta->getId());
				otro_impuesto_data::save($otroimpuesto,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(impuesto::$class);

			foreach($cuenta->getimpuesto_ventass() as $impuesto) {
				$impuesto->setid_cuenta($cuenta->getId());
				impuesto_data::save($impuesto,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_corriente::$class);

			foreach($cuenta->getcuenta_corrientes() as $cuentacorriente) {
				$cuentacorriente->setid_cuenta($cuenta->getId());
				cuenta_corriente_data::save($cuentacorriente,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto::$class);

			foreach($cuenta->getproducto_ventas() as $producto) {
				$producto->setid_cuenta($cuenta->getId());
				producto_data::save($producto,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==instrumento_pago::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(instrumento_pago::$class);

			foreach($cuenta->getinstrumento_pago_ventass() as $instrumentopago) {
				$instrumentopago->setid_cuenta($cuenta->getId());
				instrumento_pago_data::save($instrumentopago,$this->connexion);
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

			foreach($cuenta->getlista_producto_ventas() as $listaproducto) {
				$listaproducto->setid_cuenta($cuenta->getId());
				lista_producto_data::save($listaproducto,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_detalle::$class);

			foreach($cuenta->getasiento_detalles() as $asientodetalle) {
				$asientodetalle->setid_cuenta($cuenta->getId());
				asiento_detalle_data::save($asientodetalle,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(retencion::$class);

			foreach($cuenta->getretencion_comprass() as $retencion) {
				$retencion->setid_cuenta($cuenta->getId());
				retencion_data::save($retencion,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion_fuente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(retencion_fuente::$class);

			foreach($cuenta->getretencion_fuente_comprass() as $retencionfuente) {
				$retencionfuente->setid_cuenta($cuenta->getId());
				retencion_fuente_data::save($retencionfuente,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta::$class);

			foreach($cuenta->getcuentas() as $cuenta) {
				$cuenta->setid_cuenta($cuenta->getId());
				cuenta_data::save($cuenta,$this->connexion);
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

			foreach($cuenta->getproveedors() as $proveedor) {
				$proveedor->setid_cuenta($cuenta->getId());
				proveedor_data::save($proveedor,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==forma_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(forma_pago_cliente::$class);

			foreach($cuenta->getforma_pago_clientes() as $formapagocliente) {
				$formapagocliente->setid_cuenta($cuenta->getId());
				forma_pago_cliente_data::save($formapagocliente,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==saldo_cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(saldo_cuenta::$class);

			foreach($cuenta->getsaldo_cuentas() as $saldocuenta) {
				$saldocuenta->setid_cuenta($cuenta->getId());
				saldo_cuenta_data::save($saldocuenta,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(termino_pago_proveedor::$class);

			foreach($cuenta->gettermino_pago_proveedors() as $terminopagoproveedor) {
				$terminopagoproveedor->setid_cuenta($cuenta->getId());
				termino_pago_proveedor_data::save($terminopagoproveedor,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion_ica::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(retencion_ica::$class);

			foreach($cuenta->getretencion_ica_ventass() as $retencionica) {
				$retencionica->setid_cuenta($cuenta->getId());
				retencion_ica_data::save($retencionica,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_predefinido_detalle::$class);

			foreach($cuenta->getasiento_predefinido_detalles() as $asientopredefinidodetalle) {
				$asientopredefinidodetalle->setid_cuenta($cuenta->getId());
				asiento_predefinido_detalle_data::save($asientopredefinidodetalle,$this->connexion);
			}

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

			foreach($cuenta->getclientes() as $cliente) {
				$cliente->setid_cuenta($cuenta->getId());
				cliente_data::save($cliente,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_automatico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_automatico_detalle::$class);

			foreach($cuenta->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
				$asientoautomaticodetalle->setid_cuenta($cuenta->getId());
				asiento_automatico_detalle_data::save($asientoautomaticodetalle,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==forma_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(forma_pago_proveedor::$class);

			foreach($cuenta->getforma_pago_proveedors() as $formapagoproveedor) {
				$formapagoproveedor->setid_cuenta($cuenta->getId());
				forma_pago_proveedor_data::save($formapagoproveedor,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(termino_pago_cliente::$class);

			foreach($cuenta->gettermino_pago_clientes() as $terminopagocliente) {
				$terminopagocliente->setid_cuenta($cuenta->getId());
				termino_pago_cliente_data::save($terminopagocliente,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($cuenta->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($cuenta->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_cuenta_data::save($cuenta->gettipo_cuenta(),$this->connexion);
		$tipo_cuentaLogic= new tipo_cuenta_logic($this->connexion);
		$tipo_cuentaLogic->deepSave($cuenta->gettipo_cuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_nivel_cuenta_data::save($cuenta->gettipo_nivel_cuenta(),$this->connexion);
		$tipo_nivel_cuentaLogic= new tipo_nivel_cuenta_logic($this->connexion);
		$tipo_nivel_cuentaLogic->deepSave($cuenta->gettipo_nivel_cuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($cuenta->getcuenta(),$this->connexion);
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepSave($cuenta->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($cuenta->getcategoria_cheques() as $categoriacheque) {
			$categoriachequeLogic= new categoria_cheque_logic($this->connexion);
			$categoriacheque->setid_cuenta($cuenta->getId());
			categoria_cheque_data::save($categoriacheque,$this->connexion);
			$categoriachequeLogic->deepSave($categoriacheque,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta->getotro_impuesto_ventass() as $otroimpuesto) {
			$otroimpuestoLogic= new otro_impuesto_logic($this->connexion);
			$otroimpuesto->setid_cuenta($cuenta->getId());
			otro_impuesto_data::save($otroimpuesto,$this->connexion);
			$otroimpuestoLogic->deepSave($otroimpuesto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta->getimpuesto_ventass() as $impuesto) {
			$impuestoLogic= new impuesto_logic($this->connexion);
			$impuesto->setid_cuenta($cuenta->getId());
			impuesto_data::save($impuesto,$this->connexion);
			$impuestoLogic->deepSave($impuesto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta->getcuenta_corrientes() as $cuentacorriente) {
			$cuentacorrienteLogic= new cuenta_corriente_logic($this->connexion);
			$cuentacorriente->setid_cuenta($cuenta->getId());
			cuenta_corriente_data::save($cuentacorriente,$this->connexion);
			$cuentacorrienteLogic->deepSave($cuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta->getproducto_ventas() as $producto) {
			$productoLogic= new producto_logic($this->connexion);
			$producto->setid_cuenta($cuenta->getId());
			producto_data::save($producto,$this->connexion);
			$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta->getinstrumento_pago_ventass() as $instrumentopago) {
			$instrumentopagoLogic= new instrumento_pago_logic($this->connexion);
			$instrumentopago->setid_cuenta($cuenta->getId());
			instrumento_pago_data::save($instrumentopago,$this->connexion);
			$instrumentopagoLogic->deepSave($instrumentopago,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta->getlista_producto_ventas() as $listaproducto) {
			$listaproductoLogic= new lista_producto_logic($this->connexion);
			$listaproducto->setid_cuenta($cuenta->getId());
			lista_producto_data::save($listaproducto,$this->connexion);
			$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta->getasiento_detalles() as $asientodetalle) {
			$asientodetalleLogic= new asiento_detalle_logic($this->connexion);
			$asientodetalle->setid_cuenta($cuenta->getId());
			asiento_detalle_data::save($asientodetalle,$this->connexion);
			$asientodetalleLogic->deepSave($asientodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta->getretencion_comprass() as $retencion) {
			$retencionLogic= new retencion_logic($this->connexion);
			$retencion->setid_cuenta($cuenta->getId());
			retencion_data::save($retencion,$this->connexion);
			$retencionLogic->deepSave($retencion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta->getretencion_fuente_comprass() as $retencionfuente) {
			$retencionfuenteLogic= new retencion_fuente_logic($this->connexion);
			$retencionfuente->setid_cuenta($cuenta->getId());
			retencion_fuente_data::save($retencionfuente,$this->connexion);
			$retencionfuenteLogic->deepSave($retencionfuente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta->getcuentas() as $cuenta) {
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuenta->setid_cuenta($cuenta->getId());
			cuenta_data::save($cuenta,$this->connexion);
			$cuentaLogic->deepSave($cuenta,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedor->setid_cuenta($cuenta->getId());
			proveedor_data::save($proveedor,$this->connexion);
			$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta->getforma_pago_clientes() as $formapagocliente) {
			$formapagoclienteLogic= new forma_pago_cliente_logic($this->connexion);
			$formapagocliente->setid_cuenta($cuenta->getId());
			forma_pago_cliente_data::save($formapagocliente,$this->connexion);
			$formapagoclienteLogic->deepSave($formapagocliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta->getsaldo_cuentas() as $saldocuenta) {
			$saldocuentaLogic= new saldo_cuenta_logic($this->connexion);
			$saldocuenta->setid_cuenta($cuenta->getId());
			saldo_cuenta_data::save($saldocuenta,$this->connexion);
			$saldocuentaLogic->deepSave($saldocuenta,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta->gettermino_pago_proveedors() as $terminopagoproveedor) {
			$terminopagoproveedorLogic= new termino_pago_proveedor_logic($this->connexion);
			$terminopagoproveedor->setid_cuenta($cuenta->getId());
			termino_pago_proveedor_data::save($terminopagoproveedor,$this->connexion);
			$terminopagoproveedorLogic->deepSave($terminopagoproveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta->getretencion_ica_ventass() as $retencionica) {
			$retencionicaLogic= new retencion_ica_logic($this->connexion);
			$retencionica->setid_cuenta($cuenta->getId());
			retencion_ica_data::save($retencionica,$this->connexion);
			$retencionicaLogic->deepSave($retencionica,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta->getasiento_predefinido_detalles() as $asientopredefinidodetalle) {
			$asientopredefinidodetalleLogic= new asiento_predefinido_detalle_logic($this->connexion);
			$asientopredefinidodetalle->setid_cuenta($cuenta->getId());
			asiento_predefinido_detalle_data::save($asientopredefinidodetalle,$this->connexion);
			$asientopredefinidodetalleLogic->deepSave($asientopredefinidodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$cliente->setid_cuenta($cuenta->getId());
			cliente_data::save($cliente,$this->connexion);
			$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
			$asientoautomaticodetalleLogic= new asiento_automatico_detalle_logic($this->connexion);
			$asientoautomaticodetalle->setid_cuenta($cuenta->getId());
			asiento_automatico_detalle_data::save($asientoautomaticodetalle,$this->connexion);
			$asientoautomaticodetalleLogic->deepSave($asientoautomaticodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta->getforma_pago_proveedors() as $formapagoproveedor) {
			$formapagoproveedorLogic= new forma_pago_proveedor_logic($this->connexion);
			$formapagoproveedor->setid_cuenta($cuenta->getId());
			forma_pago_proveedor_data::save($formapagoproveedor,$this->connexion);
			$formapagoproveedorLogic->deepSave($formapagoproveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cuenta->gettermino_pago_clientes() as $terminopagocliente) {
			$terminopagoclienteLogic= new termino_pago_cliente_logic($this->connexion);
			$terminopagocliente->setid_cuenta($cuenta->getId());
			termino_pago_cliente_data::save($terminopagocliente,$this->connexion);
			$terminopagoclienteLogic->deepSave($terminopagocliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cuenta->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($cuenta->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_cuenta::$class.'') {
				tipo_cuenta_data::save($cuenta->gettipo_cuenta(),$this->connexion);
				$tipo_cuentaLogic= new tipo_cuenta_logic($this->connexion);
				$tipo_cuentaLogic->deepSave($cuenta->gettipo_cuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_nivel_cuenta::$class.'') {
				tipo_nivel_cuenta_data::save($cuenta->gettipo_nivel_cuenta(),$this->connexion);
				$tipo_nivel_cuentaLogic= new tipo_nivel_cuenta_logic($this->connexion);
				$tipo_nivel_cuentaLogic->deepSave($cuenta->gettipo_nivel_cuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($cuenta->getcuenta(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($cuenta->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==categoria_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getcategoria_cheques() as $categoriacheque) {
					$categoriachequeLogic= new categoria_cheque_logic($this->connexion);
					$categoriacheque->setid_cuenta($cuenta->getId());
					categoria_cheque_data::save($categoriacheque,$this->connexion);
					$categoriachequeLogic->deepSave($categoriacheque,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==otro_impuesto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getotro_impuesto_ventass() as $otroimpuesto) {
					$otroimpuestoLogic= new otro_impuesto_logic($this->connexion);
					$otroimpuesto->setid_cuenta($cuenta->getId());
					otro_impuesto_data::save($otroimpuesto,$this->connexion);
					$otroimpuestoLogic->deepSave($otroimpuesto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==impuesto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getimpuesto_ventass() as $impuesto) {
					$impuestoLogic= new impuesto_logic($this->connexion);
					$impuesto->setid_cuenta($cuenta->getId());
					impuesto_data::save($impuesto,$this->connexion);
					$impuestoLogic->deepSave($impuesto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getcuenta_corrientes() as $cuentacorriente) {
					$cuentacorrienteLogic= new cuenta_corriente_logic($this->connexion);
					$cuentacorriente->setid_cuenta($cuenta->getId());
					cuenta_corriente_data::save($cuentacorriente,$this->connexion);
					$cuentacorrienteLogic->deepSave($cuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getproducto_ventas() as $producto) {
					$productoLogic= new producto_logic($this->connexion);
					$producto->setid_cuenta($cuenta->getId());
					producto_data::save($producto,$this->connexion);
					$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==instrumento_pago::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getinstrumento_pago_ventass() as $instrumentopago) {
					$instrumentopagoLogic= new instrumento_pago_logic($this->connexion);
					$instrumentopago->setid_cuenta($cuenta->getId());
					instrumento_pago_data::save($instrumentopago,$this->connexion);
					$instrumentopagoLogic->deepSave($instrumentopago,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getlista_producto_ventas() as $listaproducto) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproducto->setid_cuenta($cuenta->getId());
					lista_producto_data::save($listaproducto,$this->connexion);
					$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==asiento_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getasiento_detalles() as $asientodetalle) {
					$asientodetalleLogic= new asiento_detalle_logic($this->connexion);
					$asientodetalle->setid_cuenta($cuenta->getId());
					asiento_detalle_data::save($asientodetalle,$this->connexion);
					$asientodetalleLogic->deepSave($asientodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==retencion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getretencion_comprass() as $retencion) {
					$retencionLogic= new retencion_logic($this->connexion);
					$retencion->setid_cuenta($cuenta->getId());
					retencion_data::save($retencion,$this->connexion);
					$retencionLogic->deepSave($retencion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==retencion_fuente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getretencion_fuente_comprass() as $retencionfuente) {
					$retencionfuenteLogic= new retencion_fuente_logic($this->connexion);
					$retencionfuente->setid_cuenta($cuenta->getId());
					retencion_fuente_data::save($retencionfuente,$this->connexion);
					$retencionfuenteLogic->deepSave($retencionfuente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getcuentas() as $cuenta) {
					$cuentaLogic= new cuenta_logic($this->connexion);
					$cuenta->setid_cuenta($cuenta->getId());
					cuenta_data::save($cuenta,$this->connexion);
					$cuentaLogic->deepSave($cuenta,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedor->setid_cuenta($cuenta->getId());
					proveedor_data::save($proveedor,$this->connexion);
					$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==forma_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getforma_pago_clientes() as $formapagocliente) {
					$formapagoclienteLogic= new forma_pago_cliente_logic($this->connexion);
					$formapagocliente->setid_cuenta($cuenta->getId());
					forma_pago_cliente_data::save($formapagocliente,$this->connexion);
					$formapagoclienteLogic->deepSave($formapagocliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==saldo_cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getsaldo_cuentas() as $saldocuenta) {
					$saldocuentaLogic= new saldo_cuenta_logic($this->connexion);
					$saldocuenta->setid_cuenta($cuenta->getId());
					saldo_cuenta_data::save($saldocuenta,$this->connexion);
					$saldocuentaLogic->deepSave($saldocuenta,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->gettermino_pago_proveedors() as $terminopagoproveedor) {
					$terminopagoproveedorLogic= new termino_pago_proveedor_logic($this->connexion);
					$terminopagoproveedor->setid_cuenta($cuenta->getId());
					termino_pago_proveedor_data::save($terminopagoproveedor,$this->connexion);
					$terminopagoproveedorLogic->deepSave($terminopagoproveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==retencion_ica::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getretencion_ica_ventass() as $retencionica) {
					$retencionicaLogic= new retencion_ica_logic($this->connexion);
					$retencionica->setid_cuenta($cuenta->getId());
					retencion_ica_data::save($retencionica,$this->connexion);
					$retencionicaLogic->deepSave($retencionica,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==asiento_predefinido_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getasiento_predefinido_detalles() as $asientopredefinidodetalle) {
					$asientopredefinidodetalleLogic= new asiento_predefinido_detalle_logic($this->connexion);
					$asientopredefinidodetalle->setid_cuenta($cuenta->getId());
					asiento_predefinido_detalle_data::save($asientopredefinidodetalle,$this->connexion);
					$asientopredefinidodetalleLogic->deepSave($asientopredefinidodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$cliente->setid_cuenta($cuenta->getId());
					cliente_data::save($cliente,$this->connexion);
					$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==asiento_automatico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
					$asientoautomaticodetalleLogic= new asiento_automatico_detalle_logic($this->connexion);
					$asientoautomaticodetalle->setid_cuenta($cuenta->getId());
					asiento_automatico_detalle_data::save($asientoautomaticodetalle,$this->connexion);
					$asientoautomaticodetalleLogic->deepSave($asientoautomaticodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==forma_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->getforma_pago_proveedors() as $formapagoproveedor) {
					$formapagoproveedorLogic= new forma_pago_proveedor_logic($this->connexion);
					$formapagoproveedor->setid_cuenta($cuenta->getId());
					forma_pago_proveedor_data::save($formapagoproveedor,$this->connexion);
					$formapagoproveedorLogic->deepSave($formapagoproveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==termino_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cuenta->gettermino_pago_clientes() as $terminopagocliente) {
					$terminopagoclienteLogic= new termino_pago_cliente_logic($this->connexion);
					$terminopagocliente->setid_cuenta($cuenta->getId());
					termino_pago_cliente_data::save($terminopagocliente,$this->connexion);
					$terminopagoclienteLogic->deepSave($terminopagocliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($cuenta->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($cuenta->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_cuenta_data::save($cuenta->gettipo_cuenta(),$this->connexion);
			$tipo_cuentaLogic= new tipo_cuenta_logic($this->connexion);
			$tipo_cuentaLogic->deepSave($cuenta->gettipo_cuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_nivel_cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_nivel_cuenta_data::save($cuenta->gettipo_nivel_cuenta(),$this->connexion);
			$tipo_nivel_cuentaLogic= new tipo_nivel_cuenta_logic($this->connexion);
			$tipo_nivel_cuentaLogic->deepSave($cuenta->gettipo_nivel_cuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($cuenta->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($cuenta->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==categoria_cheque::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(categoria_cheque::$class);

			foreach($cuenta->getcategoria_cheques() as $categoriacheque) {
				$categoriachequeLogic= new categoria_cheque_logic($this->connexion);
				$categoriacheque->setid_cuenta($cuenta->getId());
				categoria_cheque_data::save($categoriacheque,$this->connexion);
				$categoriachequeLogic->deepSave($categoriacheque,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(otro_impuesto::$class);

			foreach($cuenta->getotro_impuesto_ventass() as $otroimpuesto) {
				$otroimpuestoLogic= new otro_impuesto_logic($this->connexion);
				$otroimpuesto->setid_cuenta($cuenta->getId());
				otro_impuesto_data::save($otroimpuesto,$this->connexion);
				$otroimpuestoLogic->deepSave($otroimpuesto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(impuesto::$class);

			foreach($cuenta->getimpuesto_ventass() as $impuesto) {
				$impuestoLogic= new impuesto_logic($this->connexion);
				$impuesto->setid_cuenta($cuenta->getId());
				impuesto_data::save($impuesto,$this->connexion);
				$impuestoLogic->deepSave($impuesto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_corriente::$class);

			foreach($cuenta->getcuenta_corrientes() as $cuentacorriente) {
				$cuentacorrienteLogic= new cuenta_corriente_logic($this->connexion);
				$cuentacorriente->setid_cuenta($cuenta->getId());
				cuenta_corriente_data::save($cuentacorriente,$this->connexion);
				$cuentacorrienteLogic->deepSave($cuentacorriente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto::$class);

			foreach($cuenta->getproducto_ventas() as $producto) {
				$productoLogic= new producto_logic($this->connexion);
				$producto->setid_cuenta($cuenta->getId());
				producto_data::save($producto,$this->connexion);
				$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==instrumento_pago::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(instrumento_pago::$class);

			foreach($cuenta->getinstrumento_pago_ventass() as $instrumentopago) {
				$instrumentopagoLogic= new instrumento_pago_logic($this->connexion);
				$instrumentopago->setid_cuenta($cuenta->getId());
				instrumento_pago_data::save($instrumentopago,$this->connexion);
				$instrumentopagoLogic->deepSave($instrumentopago,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($cuenta->getlista_producto_ventas() as $listaproducto) {
				$listaproductoLogic= new lista_producto_logic($this->connexion);
				$listaproducto->setid_cuenta($cuenta->getId());
				lista_producto_data::save($listaproducto,$this->connexion);
				$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_detalle::$class);

			foreach($cuenta->getasiento_detalles() as $asientodetalle) {
				$asientodetalleLogic= new asiento_detalle_logic($this->connexion);
				$asientodetalle->setid_cuenta($cuenta->getId());
				asiento_detalle_data::save($asientodetalle,$this->connexion);
				$asientodetalleLogic->deepSave($asientodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(retencion::$class);

			foreach($cuenta->getretencion_comprass() as $retencion) {
				$retencionLogic= new retencion_logic($this->connexion);
				$retencion->setid_cuenta($cuenta->getId());
				retencion_data::save($retencion,$this->connexion);
				$retencionLogic->deepSave($retencion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion_fuente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(retencion_fuente::$class);

			foreach($cuenta->getretencion_fuente_comprass() as $retencionfuente) {
				$retencionfuenteLogic= new retencion_fuente_logic($this->connexion);
				$retencionfuente->setid_cuenta($cuenta->getId());
				retencion_fuente_data::save($retencionfuente,$this->connexion);
				$retencionfuenteLogic->deepSave($retencionfuente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta::$class);

			foreach($cuenta->getcuentas() as $cuenta) {
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuenta->setid_cuenta($cuenta->getId());
				cuenta_data::save($cuenta,$this->connexion);
				$cuentaLogic->deepSave($cuenta,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($cuenta->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedor->setid_cuenta($cuenta->getId());
				proveedor_data::save($proveedor,$this->connexion);
				$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==forma_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(forma_pago_cliente::$class);

			foreach($cuenta->getforma_pago_clientes() as $formapagocliente) {
				$formapagoclienteLogic= new forma_pago_cliente_logic($this->connexion);
				$formapagocliente->setid_cuenta($cuenta->getId());
				forma_pago_cliente_data::save($formapagocliente,$this->connexion);
				$formapagoclienteLogic->deepSave($formapagocliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==saldo_cuenta::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(saldo_cuenta::$class);

			foreach($cuenta->getsaldo_cuentas() as $saldocuenta) {
				$saldocuentaLogic= new saldo_cuenta_logic($this->connexion);
				$saldocuenta->setid_cuenta($cuenta->getId());
				saldo_cuenta_data::save($saldocuenta,$this->connexion);
				$saldocuentaLogic->deepSave($saldocuenta,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(termino_pago_proveedor::$class);

			foreach($cuenta->gettermino_pago_proveedors() as $terminopagoproveedor) {
				$terminopagoproveedorLogic= new termino_pago_proveedor_logic($this->connexion);
				$terminopagoproveedor->setid_cuenta($cuenta->getId());
				termino_pago_proveedor_data::save($terminopagoproveedor,$this->connexion);
				$terminopagoproveedorLogic->deepSave($terminopagoproveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion_ica::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(retencion_ica::$class);

			foreach($cuenta->getretencion_ica_ventass() as $retencionica) {
				$retencionicaLogic= new retencion_ica_logic($this->connexion);
				$retencionica->setid_cuenta($cuenta->getId());
				retencion_ica_data::save($retencionica,$this->connexion);
				$retencionicaLogic->deepSave($retencionica,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_predefinido_detalle::$class);

			foreach($cuenta->getasiento_predefinido_detalles() as $asientopredefinidodetalle) {
				$asientopredefinidodetalleLogic= new asiento_predefinido_detalle_logic($this->connexion);
				$asientopredefinidodetalle->setid_cuenta($cuenta->getId());
				asiento_predefinido_detalle_data::save($asientopredefinidodetalle,$this->connexion);
				$asientopredefinidodetalleLogic->deepSave($asientopredefinidodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
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

			foreach($cuenta->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$cliente->setid_cuenta($cuenta->getId());
				cliente_data::save($cliente,$this->connexion);
				$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_automatico_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_automatico_detalle::$class);

			foreach($cuenta->getasiento_automatico_detalles() as $asientoautomaticodetalle) {
				$asientoautomaticodetalleLogic= new asiento_automatico_detalle_logic($this->connexion);
				$asientoautomaticodetalle->setid_cuenta($cuenta->getId());
				asiento_automatico_detalle_data::save($asientoautomaticodetalle,$this->connexion);
				$asientoautomaticodetalleLogic->deepSave($asientoautomaticodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==forma_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(forma_pago_proveedor::$class);

			foreach($cuenta->getforma_pago_proveedors() as $formapagoproveedor) {
				$formapagoproveedorLogic= new forma_pago_proveedor_logic($this->connexion);
				$formapagoproveedor->setid_cuenta($cuenta->getId());
				forma_pago_proveedor_data::save($formapagoproveedor,$this->connexion);
				$formapagoproveedorLogic->deepSave($formapagoproveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(termino_pago_cliente::$class);

			foreach($cuenta->gettermino_pago_clientes() as $terminopagocliente) {
				$terminopagoclienteLogic= new termino_pago_cliente_logic($this->connexion);
				$terminopagocliente->setid_cuenta($cuenta->getId());
				termino_pago_cliente_data::save($terminopagocliente,$this->connexion);
				$terminopagoclienteLogic->deepSave($terminopagocliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				cuenta_data::save($cuenta, $this->connexion);
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
			
			$this->deepLoad($this->cuenta,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->cuentas as $cuenta) {
				$this->deepLoad($cuenta,$isDeep,$deepLoadType,$clases);
								
				cuenta_util::refrescarFKDescripciones($this->cuentas);
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
			
			foreach($this->cuentas as $cuenta) {
				$this->deepLoad($cuenta,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->cuenta,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->cuentas as $cuenta) {
				$this->deepSave($cuenta,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->cuentas as $cuenta) {
				$this->deepSave($cuenta,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(tipo_cuenta::$class);
				$classes[]=new Classe(tipo_nivel_cuenta::$class);
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
					if($clas->clas==tipo_cuenta::$class) {
						$classes[]=new Classe(tipo_cuenta::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==tipo_nivel_cuenta::$class) {
						$classes[]=new Classe(tipo_nivel_cuenta::$class);
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
					if($clas->clas==tipo_cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_cuenta::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==tipo_nivel_cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_nivel_cuenta::$class);
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
				
				$classes[]=new Classe(categoria_cheque::$class);
				$classes[]=new Classe(otro_impuesto::$class);
				$classes[]=new Classe(impuesto::$class);
				$classes[]=new Classe(cuenta_corriente::$class);
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(instrumento_pago::$class);
				$classes[]=new Classe(lista_producto::$class);
				$classes[]=new Classe(asiento_detalle::$class);
				$classes[]=new Classe(retencion::$class);
				$classes[]=new Classe(retencion_fuente::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(proveedor::$class);
				$classes[]=new Classe(forma_pago_cliente::$class);
				$classes[]=new Classe(saldo_cuenta::$class);
				$classes[]=new Classe(termino_pago_proveedor::$class);
				$classes[]=new Classe(retencion_ica::$class);
				$classes[]=new Classe(asiento_predefinido_detalle::$class);
				$classes[]=new Classe(cliente::$class);
				$classes[]=new Classe(asiento_automatico_detalle::$class);
				$classes[]=new Classe(forma_pago_proveedor::$class);
				$classes[]=new Classe(termino_pago_cliente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==categoria_cheque::$class) {
						$classes[]=new Classe(categoria_cheque::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==otro_impuesto::$class) {
						$classes[]=new Classe(otro_impuesto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==impuesto::$class) {
						$classes[]=new Classe(impuesto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==cuenta_corriente::$class) {
						$classes[]=new Classe(cuenta_corriente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==producto::$class) {
						$classes[]=new Classe(producto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==instrumento_pago::$class) {
						$classes[]=new Classe(instrumento_pago::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==lista_producto::$class) {
						$classes[]=new Classe(lista_producto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==asiento_detalle::$class) {
						$classes[]=new Classe(asiento_detalle::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==retencion::$class) {
						$classes[]=new Classe(retencion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==retencion_fuente::$class) {
						$classes[]=new Classe(retencion_fuente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==forma_pago_cliente::$class) {
						$classes[]=new Classe(forma_pago_cliente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==saldo_cuenta::$class) {
						$classes[]=new Classe(saldo_cuenta::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==termino_pago_proveedor::$class) {
						$classes[]=new Classe(termino_pago_proveedor::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==retencion_ica::$class) {
						$classes[]=new Classe(retencion_ica::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==asiento_predefinido_detalle::$class) {
						$classes[]=new Classe(asiento_predefinido_detalle::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==asiento_automatico_detalle::$class) {
						$classes[]=new Classe(asiento_automatico_detalle::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==forma_pago_proveedor::$class) {
						$classes[]=new Classe(forma_pago_proveedor::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==termino_pago_cliente::$class) {
						$classes[]=new Classe(termino_pago_cliente::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==categoria_cheque::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(categoria_cheque::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==otro_impuesto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(otro_impuesto::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==impuesto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(impuesto::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==cuenta_corriente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_corriente::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(producto::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==instrumento_pago::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(instrumento_pago::$class);
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

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==asiento_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento_detalle::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==retencion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(retencion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==retencion_fuente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(retencion_fuente::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta::$class);
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
					if($clas->clas==forma_pago_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(forma_pago_cliente::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==saldo_cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(saldo_cuenta::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==termino_pago_proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(termino_pago_proveedor::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==retencion_ica::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(retencion_ica::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==asiento_predefinido_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento_predefinido_detalle::$class);
				}

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
					if($clas->clas==asiento_automatico_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento_automatico_detalle::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==forma_pago_proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(forma_pago_proveedor::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==termino_pago_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(termino_pago_cliente::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getcuenta() : ?cuenta {	
		/*
		cuenta_logic_add::checkcuentaToGet($this->cuenta,$this->datosCliente);
		cuenta_logic_add::updatecuentaToGet($this->cuenta);
		*/
			
		return $this->cuenta;
	}
		
	public function setcuenta(cuenta $newcuenta) {
		$this->cuenta = $newcuenta;
	}
	
	public function getcuentas() : array {		
		/*
		cuenta_logic_add::checkcuentaToGets($this->cuentas,$this->datosCliente);
		
		foreach ($this->cuentas as $cuentaLocal ) {
			cuenta_logic_add::updatecuentaToGet($cuentaLocal);
		}
		*/
		
		return $this->cuentas;
	}
	
	public function setcuentas(array $newcuentas) {
		$this->cuentas = $newcuentas;
	}
	
	public function getcuentaDataAccess() : cuenta_data {
		return $this->cuentaDataAccess;
	}
	
	public function setcuentaDataAccess(cuenta_data $newcuentaDataAccess) {
		$this->cuentaDataAccess = $newcuentaDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        cuenta_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		cheque_cuenta_corriente_logic::$logger;
		clasificacion_cheque_logic::$logger;
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
