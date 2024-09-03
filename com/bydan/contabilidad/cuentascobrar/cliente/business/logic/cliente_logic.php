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

namespace com\bydan\contabilidad\cuentascobrar\cliente\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_param_return;

use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;

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

use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\tipo_persona\business\entity\tipo_persona;
use com\bydan\contabilidad\general\tipo_persona\business\data\tipo_persona_data;
use com\bydan\contabilidad\general\tipo_persona\business\logic\tipo_persona_logic;
use com\bydan\contabilidad\general\tipo_persona\util\tipo_persona_util;

use com\bydan\contabilidad\cuentascobrar\categoria_cliente\business\entity\categoria_cliente;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\business\data\categoria_cliente_data;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\business\logic\categoria_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\util\categoria_cliente_util;

use com\bydan\contabilidad\inventario\tipo_precio\business\entity\tipo_precio;
use com\bydan\contabilidad\inventario\tipo_precio\business\data\tipo_precio_data;
use com\bydan\contabilidad\inventario\tipo_precio\business\logic\tipo_precio_logic;
use com\bydan\contabilidad\inventario\tipo_precio\util\tipo_precio_util;

use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\business\entity\giro_negocio_cliente;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\business\data\giro_negocio_cliente_data;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\business\logic\giro_negocio_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\util\giro_negocio_cliente_util;

use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\business\data\pais_data;
use com\bydan\contabilidad\seguridad\pais\business\logic\pais_logic;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;

use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;
use com\bydan\contabilidad\seguridad\provincia\business\data\provincia_data;
use com\bydan\contabilidad\seguridad\provincia\business\logic\provincia_logic;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_util;

use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;
use com\bydan\contabilidad\seguridad\ciudad\business\data\ciudad_data;
use com\bydan\contabilidad\seguridad\ciudad\business\logic\ciudad_logic;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;

use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\business\data\vendedor_data;
use com\bydan\contabilidad\facturacion\vendedor\business\logic\vendedor_logic;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\data\termino_pago_cliente_data;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;
use com\bydan\contabilidad\facturacion\impuesto\business\data\impuesto_data;
use com\bydan\contabilidad\facturacion\impuesto\business\logic\impuesto_logic;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_util;

use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;
use com\bydan\contabilidad\facturacion\retencion\business\data\retencion_data;
use com\bydan\contabilidad\facturacion\retencion\business\logic\retencion_logic;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_util;

use com\bydan\contabilidad\facturacion\retencion_fuente\business\entity\retencion_fuente;
use com\bydan\contabilidad\facturacion\retencion_fuente\business\data\retencion_fuente_data;
use com\bydan\contabilidad\facturacion\retencion_fuente\business\logic\retencion_fuente_logic;
use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_util;

use com\bydan\contabilidad\facturacion\retencion_ica\business\entity\retencion_ica;
use com\bydan\contabilidad\facturacion\retencion_ica\business\data\retencion_ica_data;
use com\bydan\contabilidad\facturacion\retencion_ica\business\logic\retencion_ica_logic;
use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_util;

use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\data\otro_impuesto_data;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\logic\otro_impuesto_logic;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_util;

//REL


use com\bydan\contabilidad\facturacion\devolucion_factura\business\entity\devolucion_factura;
use com\bydan\contabilidad\facturacion\devolucion_factura\business\data\devolucion_factura_data;
use com\bydan\contabilidad\facturacion\devolucion_factura\business\logic\devolucion_factura_logic;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\data\cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\logic\cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_util;

use com\bydan\contabilidad\cuentascobrar\documento_cliente\business\entity\documento_cliente;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\business\data\documento_cliente_data;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\business\logic\documento_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_util;

use com\bydan\contabilidad\estimados\estimado\business\entity\estimado;
use com\bydan\contabilidad\estimados\estimado\business\data\estimado_data;
use com\bydan\contabilidad\estimados\estimado\business\logic\estimado_logic;
use com\bydan\contabilidad\estimados\estimado\util\estimado_carga;
use com\bydan\contabilidad\estimados\estimado\util\estimado_util;

use com\bydan\contabilidad\cuentascobrar\imagen_cliente\business\entity\imagen_cliente;
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\business\data\imagen_cliente_data;
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\business\logic\imagen_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\util\imagen_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\util\imagen_cliente_util;

use com\bydan\contabilidad\facturacion\factura\business\entity\factura;
use com\bydan\contabilidad\facturacion\factura\business\data\factura_data;
use com\bydan\contabilidad\facturacion\factura\business\logic\factura_logic;
use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;

use com\bydan\contabilidad\estimados\consignacion\business\entity\consignacion;
use com\bydan\contabilidad\estimados\consignacion\business\data\consignacion_data;
use com\bydan\contabilidad\estimados\consignacion\business\logic\consignacion_logic;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_carga;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;

use com\bydan\contabilidad\inventario\lista_cliente\business\entity\lista_cliente;
use com\bydan\contabilidad\inventario\lista_cliente\business\data\lista_cliente_data;
use com\bydan\contabilidad\inventario\lista_cliente\business\logic\lista_cliente_logic;
use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_carga;
use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_util;

//REL DETALLES

use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\util\devolucion_factura_detalle_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\business\logic\devolucion_factura_detalle_logic;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util\debito_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\util\pago_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\util\credito_cuenta_cobrar_carga;
use com\bydan\contabilidad\estimados\imagen_estimado\util\imagen_estimado_carga;
use com\bydan\contabilidad\estimados\imagen_estimado\business\logic\imagen_estimado_logic;
use com\bydan\contabilidad\estimados\estimado_detalle\util\estimado_detalle_carga;
use com\bydan\contabilidad\estimados\estimado_detalle\business\logic\estimado_detalle_logic;
use com\bydan\contabilidad\facturacion\factura_detalle\util\factura_detalle_carga;
use com\bydan\contabilidad\facturacion\factura_detalle\business\logic\factura_detalle_logic;
use com\bydan\contabilidad\estimados\imagen_consignacion\util\imagen_consignacion_carga;
use com\bydan\contabilidad\estimados\imagen_consignacion\business\logic\imagen_consignacion_logic;
use com\bydan\contabilidad\estimados\consignacion_detalle\util\consignacion_detalle_carga;
use com\bydan\contabilidad\estimados\consignacion_detalle\business\logic\consignacion_detalle_logic;



class cliente_logic  extends GeneralEntityLogic implements cliente_logicI {	
	/*GENERAL*/
	public cliente_data $clienteDataAccess;
	//public ?cliente_logic_add $clienteLogicAdditional=null;
	public ?cliente $cliente;
	public array $clientes;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->clienteDataAccess = new cliente_data();			
			$this->clientes = array();
			$this->cliente = new cliente();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->clienteLogicAdditional = new cliente_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->clienteLogicAdditional==null) {
		//	$this->clienteLogicAdditional=new cliente_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->clienteDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->clienteDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->clienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->clienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->clientes = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clientes);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->clientes = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clientes);
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
		$this->cliente = new cliente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->cliente=$this->clienteDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cliente_util::refrescarFKDescripcion($this->cliente);
			}
						
			//cliente_logic_add::checkclienteToGet($this->cliente,$this->datosCliente);
			//cliente_logic_add::updateclienteToGet($this->cliente);
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
		$this->cliente = new  cliente();
		  		  
        try {		
			$this->cliente=$this->clienteDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cliente_util::refrescarFKDescripcion($this->cliente);
			}
			
			//cliente_logic_add::checkclienteToGet($this->cliente,$this->datosCliente);
			//cliente_logic_add::updateclienteToGet($this->cliente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?cliente {
		$clienteLogic = new  cliente_logic();
		  		  
        try {		
			$clienteLogic->setConnexion($connexion);			
			$clienteLogic->getEntity($id);			
			return $clienteLogic->getcliente();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->cliente = new  cliente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->cliente=$this->clienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cliente_util::refrescarFKDescripcion($this->cliente);
			}
			
			//cliente_logic_add::checkclienteToGet($this->cliente,$this->datosCliente);
			//cliente_logic_add::updateclienteToGet($this->cliente);
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
		$this->cliente = new  cliente();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cliente=$this->clienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cliente_util::refrescarFKDescripcion($this->cliente);
			}
			
			//cliente_logic_add::checkclienteToGet($this->cliente,$this->datosCliente);
			//cliente_logic_add::updateclienteToGet($this->cliente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?cliente {
		$clienteLogic = new  cliente_logic();
		  		  
        try {		
			$clienteLogic->setConnexion($connexion);			
			$clienteLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $clienteLogic->getcliente();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clientes);			
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
		$this->clientes = array();
		  		  
        try {			
			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clientes);
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
		$this->clientes = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$clienteLogic = new  cliente_logic();
		  		  
        try {		
			$clienteLogic->setConnexion($connexion);			
			$clienteLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $clienteLogic->getclientes();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->clientes=$this->clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clientes);
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
		$this->clientes = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->clientes=$this->clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clientes);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->clientes=$this->clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clientes);
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
		$this->clientes = array();
		  		  
        try {			
			$this->clientes=$this->clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cliente_util::refrescarFKDescripciones($this->clientes);
			}	
			
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->clientes = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->clientes=$this->clienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clientes);
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
		$this->clientes = array();
		  		  
        try {		
			$this->clientes=$this->clienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->clientes);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_Idcategoria_clienteWithConnection(string $strFinalQuery,Pagination $pagination,int $id_categoria_cliente) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_categoria_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_categoria_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_categoria_cliente,cliente_util::$ID_CATEGORIA_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_categoria_cliente);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcategoria_cliente(string $strFinalQuery,Pagination $pagination,int $id_categoria_cliente) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_categoria_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_categoria_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_categoria_cliente,cliente_util::$ID_CATEGORIA_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_categoria_cliente);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdciudadWithConnection(string $strFinalQuery,Pagination $pagination,int $id_ciudad) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ciudad= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ciudad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ciudad,cliente_util::$ID_CIUDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ciudad);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idciudad(string $strFinalQuery,Pagination $pagination,int $id_ciudad) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ciudad= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ciudad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ciudad,cliente_util::$ID_CIUDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ciudad);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);
		} catch(Exception $e) {
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
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,cliente_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);

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
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,cliente_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cliente_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cliente_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idgiro_negocioWithConnection(string $strFinalQuery,Pagination $pagination,int $id_giro_negocio_cliente) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_giro_negocio_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_giro_negocio_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_giro_negocio_cliente,cliente_util::$ID_GIRO_NEGOCIO_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_giro_negocio_cliente);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idgiro_negocio(string $strFinalQuery,Pagination $pagination,int $id_giro_negocio_cliente) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_giro_negocio_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_giro_negocio_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_giro_negocio_cliente,cliente_util::$ID_GIRO_NEGOCIO_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_giro_negocio_cliente);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);
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
			$parameterSelectionGeneralid_impuesto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_impuesto,cliente_util::$ID_IMPUESTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_impuesto);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);

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
			$parameterSelectionGeneralid_impuesto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_impuesto,cliente_util::$ID_IMPUESTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_impuesto);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);
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
			$parameterSelectionGeneralid_otro_impuesto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_otro_impuesto,cliente_util::$ID_OTRO_IMPUESTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_otro_impuesto);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);

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
			$parameterSelectionGeneralid_otro_impuesto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_otro_impuesto,cliente_util::$ID_OTRO_IMPUESTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_otro_impuesto);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdpaisWithConnection(string $strFinalQuery,Pagination $pagination,int $id_pais) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_pais= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_pais->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_pais,cliente_util::$ID_PAIS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_pais);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idpais(string $strFinalQuery,Pagination $pagination,int $id_pais) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_pais= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_pais->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_pais,cliente_util::$ID_PAIS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_pais);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdprovinciaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_provincia) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_provincia= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_provincia->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_provincia,cliente_util::$ID_PROVINCIA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_provincia);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idprovincia(string $strFinalQuery,Pagination $pagination,int $id_provincia) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_provincia= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_provincia->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_provincia,cliente_util::$ID_PROVINCIA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_provincia);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);
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
			$parameterSelectionGeneralid_retencion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_retencion,cliente_util::$ID_RETENCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_retencion);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);

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
			$parameterSelectionGeneralid_retencion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_retencion,cliente_util::$ID_RETENCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_retencion);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idretencion_fuenteWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_retencion_fuente) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_retencion_fuente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_retencion_fuente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_retencion_fuente,cliente_util::$ID_RETENCION_FUENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_retencion_fuente);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idretencion_fuente(string $strFinalQuery,Pagination $pagination,?int $id_retencion_fuente) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_retencion_fuente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_retencion_fuente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_retencion_fuente,cliente_util::$ID_RETENCION_FUENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_retencion_fuente);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idretencion_icaWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_retencion_ica) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_retencion_ica= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_retencion_ica->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_retencion_ica,cliente_util::$ID_RETENCION_ICA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_retencion_ica);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idretencion_ica(string $strFinalQuery,Pagination $pagination,?int $id_retencion_ica) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_retencion_ica= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_retencion_ica->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_retencion_ica,cliente_util::$ID_RETENCION_ICA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_retencion_ica);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);
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
			$parameterSelectionGeneralid_termino_pago_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_cliente,cliente_util::$ID_TERMINO_PAGO_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_cliente);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);

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
			$parameterSelectionGeneralid_termino_pago_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_cliente,cliente_util::$ID_TERMINO_PAGO_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_cliente);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtipo_personaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_tipo_persona) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_persona= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_persona->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_persona,cliente_util::$ID_TIPO_PERSONA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_persona);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtipo_persona(string $strFinalQuery,Pagination $pagination,int $id_tipo_persona) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_persona= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_persona->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_persona,cliente_util::$ID_TIPO_PERSONA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_persona);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtipo_precioWithConnection(string $strFinalQuery,Pagination $pagination,int $id_tipo_precio) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_precio= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_precio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_precio,cliente_util::$ID_TIPO_PRECIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_precio);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtipo_precio(string $strFinalQuery,Pagination $pagination,int $id_tipo_precio) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tipo_precio= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tipo_precio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_precio,cliente_util::$ID_TIPO_PRECIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_precio);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);
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
			$parameterSelectionGeneralid_vendedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_vendedor,cliente_util::$ID_VENDEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_vendedor);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);

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
			$parameterSelectionGeneralid_vendedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_vendedor,cliente_util::$ID_VENDEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_vendedor);

			$this->clientes=$this->clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			//cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->clientes);
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
						
			//cliente_logic_add::checkclienteToSave($this->cliente,$this->datosCliente,$this->connexion);	       
			//cliente_logic_add::updateclienteToSave($this->cliente);			
			cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cliente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->clienteLogicAdditional->checkGeneralEntityToSave($this,$this->cliente,$this->datosCliente,$this->connexion);
			
			
			cliente_data::save($this->cliente, $this->connexion);	    	       	 				
			//cliente_logic_add::checkclienteToSaveAfter($this->cliente,$this->datosCliente,$this->connexion);			
			//$this->clienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cliente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cliente_util::refrescarFKDescripcion($this->cliente);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->cliente->getIsDeleted()) {
				$this->cliente=null;
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
						
			/*cliente_logic_add::checkclienteToSave($this->cliente,$this->datosCliente,$this->connexion);*/	        
			//cliente_logic_add::updateclienteToSave($this->cliente);			
			//$this->clienteLogicAdditional->checkGeneralEntityToSave($this,$this->cliente,$this->datosCliente,$this->connexion);			
			cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cliente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			cliente_data::save($this->cliente, $this->connexion);	    	       	 						
			/*cliente_logic_add::checkclienteToSaveAfter($this->cliente,$this->datosCliente,$this->connexion);*/			
			//$this->clienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cliente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cliente_util::refrescarFKDescripcion($this->cliente);				
			}
			
			if($this->cliente->getIsDeleted()) {
				$this->cliente=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(cliente $cliente,Connexion $connexion)  {
		$clienteLogic = new  cliente_logic();		  		  
        try {		
			$clienteLogic->setConnexion($connexion);			
			$clienteLogic->setcliente($cliente);			
			$clienteLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*cliente_logic_add::checkclienteToSaves($this->clientes,$this->datosCliente,$this->connexion);*/	        	
			//$this->clienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->clientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->clientes as $clienteLocal) {				
								
				//cliente_logic_add::updateclienteToSave($clienteLocal);	        	
				cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$clienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				cliente_data::save($clienteLocal, $this->connexion);				
			}
			
			/*cliente_logic_add::checkclienteToSavesAfter($this->clientes,$this->datosCliente,$this->connexion);*/			
			//$this->clienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->clientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cliente_util::refrescarFKDescripciones($this->clientes);
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
			/*cliente_logic_add::checkclienteToSaves($this->clientes,$this->datosCliente,$this->connexion);*/			
			//$this->clienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->clientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->clientes as $clienteLocal) {				
								
				//cliente_logic_add::updateclienteToSave($clienteLocal);	        	
				cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$clienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				cliente_data::save($clienteLocal, $this->connexion);				
			}			
			
			/*cliente_logic_add::checkclienteToSavesAfter($this->clientes,$this->datosCliente,$this->connexion);*/			
			//$this->clienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->clientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cliente_util::refrescarFKDescripciones($this->clientes);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $clientes,Connexion $connexion)  {
		$clienteLogic = new  cliente_logic();
		  		  
        try {		
			$clienteLogic->setConnexion($connexion);			
			$clienteLogic->setclientes($clientes);			
			$clienteLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$clientesAux=array();
		
		foreach($this->clientes as $cliente) {
			if($cliente->getIsDeleted()==false) {
				$clientesAux[]=$cliente;
			}
		}
		
		$this->clientes=$clientesAux;
	}
	
	public function updateToGetsAuxiliar(array &$clientes) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->clientes as $cliente) {
				
				$cliente->setid_empresa_Descripcion(cliente_util::getempresaDescripcion($cliente->getempresa()));
				$cliente->setid_tipo_persona_Descripcion(cliente_util::gettipo_personaDescripcion($cliente->gettipo_persona()));
				$cliente->setid_categoria_cliente_Descripcion(cliente_util::getcategoria_clienteDescripcion($cliente->getcategoria_cliente()));
				$cliente->setid_tipo_precio_Descripcion(cliente_util::gettipo_precioDescripcion($cliente->gettipo_precio()));
				$cliente->setid_giro_negocio_cliente_Descripcion(cliente_util::getgiro_negocio_clienteDescripcion($cliente->getgiro_negocio_cliente()));
				$cliente->setid_pais_Descripcion(cliente_util::getpaisDescripcion($cliente->getpais()));
				$cliente->setid_provincia_Descripcion(cliente_util::getprovinciaDescripcion($cliente->getprovincia()));
				$cliente->setid_ciudad_Descripcion(cliente_util::getciudadDescripcion($cliente->getciudad()));
				$cliente->setid_vendedor_Descripcion(cliente_util::getvendedorDescripcion($cliente->getvendedor()));
				$cliente->setid_termino_pago_cliente_Descripcion(cliente_util::gettermino_pago_clienteDescripcion($cliente->gettermino_pago_cliente()));
				$cliente->setid_cuenta_Descripcion(cliente_util::getcuentaDescripcion($cliente->getcuenta()));
				$cliente->setid_impuesto_Descripcion(cliente_util::getimpuestoDescripcion($cliente->getimpuesto()));
				$cliente->setid_retencion_Descripcion(cliente_util::getretencionDescripcion($cliente->getretencion()));
				$cliente->setid_retencion_fuente_Descripcion(cliente_util::getretencion_fuenteDescripcion($cliente->getretencion_fuente()));
				$cliente->setid_retencion_ica_Descripcion(cliente_util::getretencion_icaDescripcion($cliente->getretencion_ica()));
				$cliente->setid_otro_impuesto_Descripcion(cliente_util::getotro_impuestoDescripcion($cliente->getotro_impuesto()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cliente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cliente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cliente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$clienteForeignKey=new cliente_param_return();//clienteForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_persona',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_personasFK($this->connexion,$strRecargarFkQuery,$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_categoria_cliente',$strRecargarFkTipos,',')) {
				$this->cargarComboscategoria_clientesFK($this->connexion,$strRecargarFkQuery,$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_precio',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_preciosFK($this->connexion,$strRecargarFkQuery,$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_giro_negocio_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombosgiro_negocio_clientesFK($this->connexion,$strRecargarFkQuery,$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_pais',$strRecargarFkTipos,',')) {
				$this->cargarCombospaissFK($this->connexion,$strRecargarFkQuery,$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_provincia',$strRecargarFkTipos,',')) {
				$this->cargarCombosprovinciasFK($this->connexion,$strRecargarFkQuery,$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ciudad',$strRecargarFkTipos,',')) {
				$this->cargarCombosciudadsFK($this->connexion,$strRecargarFkQuery,$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_vendedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosvendedorsFK($this->connexion,$strRecargarFkQuery,$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_termino_pago_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombostermino_pago_clientesFK($this->connexion,$strRecargarFkQuery,$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTipos,',')) {
				$this->cargarComboscuentasFK($this->connexion,$strRecargarFkQuery,$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_impuesto',$strRecargarFkTipos,',')) {
				$this->cargarCombosimpuestosFK($this->connexion,$strRecargarFkQuery,$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_retencion',$strRecargarFkTipos,',')) {
				$this->cargarCombosretencionsFK($this->connexion,$strRecargarFkQuery,$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_retencion_fuente',$strRecargarFkTipos,',')) {
				$this->cargarCombosretencion_fuentesFK($this->connexion,$strRecargarFkQuery,$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_retencion_ica',$strRecargarFkTipos,',')) {
				$this->cargarCombosretencion_icasFK($this->connexion,$strRecargarFkQuery,$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_otro_impuesto',$strRecargarFkTipos,',')) {
				$this->cargarCombosotro_impuestosFK($this->connexion,$strRecargarFkQuery,$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_persona',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_personasFK($this->connexion,' where id=-1 ',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_categoria_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscategoria_clientesFK($this->connexion,' where id=-1 ',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_precio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_preciosFK($this->connexion,' where id=-1 ',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_giro_negocio_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosgiro_negocio_clientesFK($this->connexion,' where id=-1 ',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_pais',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombospaissFK($this->connexion,' where id=-1 ',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_provincia',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosprovinciasFK($this->connexion,' where id=-1 ',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ciudad',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosciudadsFK($this->connexion,' where id=-1 ',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_vendedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosvendedorsFK($this->connexion,' where id=-1 ',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_termino_pago_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostermino_pago_clientesFK($this->connexion,' where id=-1 ',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuentasFK($this->connexion,' where id=-1 ',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_impuesto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosimpuestosFK($this->connexion,' where id=-1 ',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_retencion',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosretencionsFK($this->connexion,' where id=-1 ',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_retencion_fuente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosretencion_fuentesFK($this->connexion,' where id=-1 ',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_retencion_ica',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosretencion_icasFK($this->connexion,' where id=-1 ',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_otro_impuesto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosotro_impuestosFK($this->connexion,' where id=-1 ',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $clienteForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$clienteForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($clienteForeignKey->idempresaDefaultFK==0) {
					$clienteForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$clienteForeignKey->empresasFK[$empresaLocal->getId()]=cliente_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($cliente_session->bigidempresaActual!=null && $cliente_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cliente_session->bigidempresaActual);//WithConnection

				$clienteForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=cliente_util::getempresaDescripcion($empresaLogic->getempresa());
				$clienteForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombostipo_personasFK($connexion=null,$strRecargarFkQuery='',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_personaLogic= new tipo_persona_logic();
		$pagination= new Pagination();
		$clienteForeignKey->tipo_personasFK=array();

		$tipo_personaLogic->setConnexion($connexion);
		$tipo_personaLogic->gettipo_personaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesiontipo_persona!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_persona_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltipo_persona=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_persona=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_persona, '');
				$finalQueryGlobaltipo_persona.=tipo_persona_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_persona.$strRecargarFkQuery;		

				$tipo_personaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($tipo_personaLogic->gettipo_personas() as $tipo_personaLocal ) {
				if($clienteForeignKey->idtipo_personaDefaultFK==0) {
					$clienteForeignKey->idtipo_personaDefaultFK=$tipo_personaLocal->getId();
				}

				$clienteForeignKey->tipo_personasFK[$tipo_personaLocal->getId()]=cliente_util::gettipo_personaDescripcion($tipo_personaLocal);
			}

		} else {

			if($cliente_session->bigidtipo_personaActual!=null && $cliente_session->bigidtipo_personaActual > 0) {
				$tipo_personaLogic->getEntity($cliente_session->bigidtipo_personaActual);//WithConnection

				$clienteForeignKey->tipo_personasFK[$tipo_personaLogic->gettipo_persona()->getId()]=cliente_util::gettipo_personaDescripcion($tipo_personaLogic->gettipo_persona());
				$clienteForeignKey->idtipo_personaDefaultFK=$tipo_personaLogic->gettipo_persona()->getId();
			}
		}
	}

	public function cargarComboscategoria_clientesFK($connexion=null,$strRecargarFkQuery='',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$categoria_clienteLogic= new categoria_cliente_logic();
		$pagination= new Pagination();
		$clienteForeignKey->categoria_clientesFK=array();

		$categoria_clienteLogic->setConnexion($connexion);
		$categoria_clienteLogic->getcategoria_clienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesioncategoria_cliente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=categoria_cliente_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcategoria_cliente=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcategoria_cliente=Funciones::GetFinalQueryAppend($finalQueryGlobalcategoria_cliente, '');
				$finalQueryGlobalcategoria_cliente.=categoria_cliente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcategoria_cliente.$strRecargarFkQuery;		

				$categoria_clienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($categoria_clienteLogic->getcategoria_clientes() as $categoria_clienteLocal ) {
				if($clienteForeignKey->idcategoria_clienteDefaultFK==0) {
					$clienteForeignKey->idcategoria_clienteDefaultFK=$categoria_clienteLocal->getId();
				}

				$clienteForeignKey->categoria_clientesFK[$categoria_clienteLocal->getId()]=cliente_util::getcategoria_clienteDescripcion($categoria_clienteLocal);
			}

		} else {

			if($cliente_session->bigidcategoria_clienteActual!=null && $cliente_session->bigidcategoria_clienteActual > 0) {
				$categoria_clienteLogic->getEntity($cliente_session->bigidcategoria_clienteActual);//WithConnection

				$clienteForeignKey->categoria_clientesFK[$categoria_clienteLogic->getcategoria_cliente()->getId()]=cliente_util::getcategoria_clienteDescripcion($categoria_clienteLogic->getcategoria_cliente());
				$clienteForeignKey->idcategoria_clienteDefaultFK=$categoria_clienteLogic->getcategoria_cliente()->getId();
			}
		}
	}

	public function cargarCombostipo_preciosFK($connexion=null,$strRecargarFkQuery='',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_precioLogic= new tipo_precio_logic();
		$pagination= new Pagination();
		$clienteForeignKey->tipo_preciosFK=array();

		$tipo_precioLogic->setConnexion($connexion);
		$tipo_precioLogic->gettipo_precioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesiontipo_precio!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_precio_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltipo_precio=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_precio=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_precio, '');
				$finalQueryGlobaltipo_precio.=tipo_precio_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_precio.$strRecargarFkQuery;		

				$tipo_precioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($tipo_precioLogic->gettipo_precios() as $tipo_precioLocal ) {
				if($clienteForeignKey->idtipo_precioDefaultFK==0) {
					$clienteForeignKey->idtipo_precioDefaultFK=$tipo_precioLocal->getId();
				}

				$clienteForeignKey->tipo_preciosFK[$tipo_precioLocal->getId()]=cliente_util::gettipo_precioDescripcion($tipo_precioLocal);
			}

		} else {

			if($cliente_session->bigidtipo_precioActual!=null && $cliente_session->bigidtipo_precioActual > 0) {
				$tipo_precioLogic->getEntity($cliente_session->bigidtipo_precioActual);//WithConnection

				$clienteForeignKey->tipo_preciosFK[$tipo_precioLogic->gettipo_precio()->getId()]=cliente_util::gettipo_precioDescripcion($tipo_precioLogic->gettipo_precio());
				$clienteForeignKey->idtipo_precioDefaultFK=$tipo_precioLogic->gettipo_precio()->getId();
			}
		}
	}

	public function cargarCombosgiro_negocio_clientesFK($connexion=null,$strRecargarFkQuery='',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$giro_negocio_clienteLogic= new giro_negocio_cliente_logic();
		$pagination= new Pagination();
		$clienteForeignKey->giro_negocio_clientesFK=array();

		$giro_negocio_clienteLogic->setConnexion($connexion);
		$giro_negocio_clienteLogic->getgiro_negocio_clienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesiongiro_negocio_cliente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=giro_negocio_cliente_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalgiro_negocio_cliente=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalgiro_negocio_cliente=Funciones::GetFinalQueryAppend($finalQueryGlobalgiro_negocio_cliente, '');
				$finalQueryGlobalgiro_negocio_cliente.=giro_negocio_cliente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalgiro_negocio_cliente.$strRecargarFkQuery;		

				$giro_negocio_clienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($giro_negocio_clienteLogic->getgiro_negocio_clientes() as $giro_negocio_clienteLocal ) {
				if($clienteForeignKey->idgiro_negocio_clienteDefaultFK==0) {
					$clienteForeignKey->idgiro_negocio_clienteDefaultFK=$giro_negocio_clienteLocal->getId();
				}

				$clienteForeignKey->giro_negocio_clientesFK[$giro_negocio_clienteLocal->getId()]=cliente_util::getgiro_negocio_clienteDescripcion($giro_negocio_clienteLocal);
			}

		} else {

			if($cliente_session->bigidgiro_negocio_clienteActual!=null && $cliente_session->bigidgiro_negocio_clienteActual > 0) {
				$giro_negocio_clienteLogic->getEntity($cliente_session->bigidgiro_negocio_clienteActual);//WithConnection

				$clienteForeignKey->giro_negocio_clientesFK[$giro_negocio_clienteLogic->getgiro_negocio_cliente()->getId()]=cliente_util::getgiro_negocio_clienteDescripcion($giro_negocio_clienteLogic->getgiro_negocio_cliente());
				$clienteForeignKey->idgiro_negocio_clienteDefaultFK=$giro_negocio_clienteLogic->getgiro_negocio_cliente()->getId();
			}
		}
	}

	public function cargarCombospaissFK($connexion=null,$strRecargarFkQuery='',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$paisLogic= new pais_logic();
		$pagination= new Pagination();
		$clienteForeignKey->paissFK=array();

		$paisLogic->setConnexion($connexion);
		$paisLogic->getpaisDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesionpais!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=pais_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalpais=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalpais=Funciones::GetFinalQueryAppend($finalQueryGlobalpais, '');
				$finalQueryGlobalpais.=pais_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalpais.$strRecargarFkQuery;		

				$paisLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($paisLogic->getpaiss() as $paisLocal ) {
				if($clienteForeignKey->idpaisDefaultFK==0) {
					$clienteForeignKey->idpaisDefaultFK=$paisLocal->getId();
				}

				$clienteForeignKey->paissFK[$paisLocal->getId()]=cliente_util::getpaisDescripcion($paisLocal);
			}

		} else {

			if($cliente_session->bigidpaisActual!=null && $cliente_session->bigidpaisActual > 0) {
				$paisLogic->getEntity($cliente_session->bigidpaisActual);//WithConnection

				$clienteForeignKey->paissFK[$paisLogic->getpais()->getId()]=cliente_util::getpaisDescripcion($paisLogic->getpais());
				$clienteForeignKey->idpaisDefaultFK=$paisLogic->getpais()->getId();
			}
		}
	}

	public function cargarCombosprovinciasFK($connexion=null,$strRecargarFkQuery='',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$provinciaLogic= new provincia_logic();
		$pagination= new Pagination();
		$clienteForeignKey->provinciasFK=array();

		$provinciaLogic->setConnexion($connexion);
		$provinciaLogic->getprovinciaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesionprovincia!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=provincia_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalprovincia=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalprovincia=Funciones::GetFinalQueryAppend($finalQueryGlobalprovincia, '');
				$finalQueryGlobalprovincia.=provincia_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalprovincia.$strRecargarFkQuery;		

				$provinciaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($provinciaLogic->getprovincias() as $provinciaLocal ) {
				if($clienteForeignKey->idprovinciaDefaultFK==0) {
					$clienteForeignKey->idprovinciaDefaultFK=$provinciaLocal->getId();
				}

				$clienteForeignKey->provinciasFK[$provinciaLocal->getId()]=cliente_util::getprovinciaDescripcion($provinciaLocal);
			}

		} else {

			if($cliente_session->bigidprovinciaActual!=null && $cliente_session->bigidprovinciaActual > 0) {
				$provinciaLogic->getEntity($cliente_session->bigidprovinciaActual);//WithConnection

				$clienteForeignKey->provinciasFK[$provinciaLogic->getprovincia()->getId()]=cliente_util::getprovinciaDescripcion($provinciaLogic->getprovincia());
				$clienteForeignKey->idprovinciaDefaultFK=$provinciaLogic->getprovincia()->getId();
			}
		}
	}

	public function cargarCombosciudadsFK($connexion=null,$strRecargarFkQuery='',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ciudadLogic= new ciudad_logic();
		$pagination= new Pagination();
		$clienteForeignKey->ciudadsFK=array();

		$ciudadLogic->setConnexion($connexion);
		$ciudadLogic->getciudadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesionciudad!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=ciudad_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalciudad=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalciudad=Funciones::GetFinalQueryAppend($finalQueryGlobalciudad, '');
				$finalQueryGlobalciudad.=ciudad_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalciudad.$strRecargarFkQuery;		

				$ciudadLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($ciudadLogic->getciudads() as $ciudadLocal ) {
				if($clienteForeignKey->idciudadDefaultFK==0) {
					$clienteForeignKey->idciudadDefaultFK=$ciudadLocal->getId();
				}

				$clienteForeignKey->ciudadsFK[$ciudadLocal->getId()]=cliente_util::getciudadDescripcion($ciudadLocal);
			}

		} else {

			if($cliente_session->bigidciudadActual!=null && $cliente_session->bigidciudadActual > 0) {
				$ciudadLogic->getEntity($cliente_session->bigidciudadActual);//WithConnection

				$clienteForeignKey->ciudadsFK[$ciudadLogic->getciudad()->getId()]=cliente_util::getciudadDescripcion($ciudadLogic->getciudad());
				$clienteForeignKey->idciudadDefaultFK=$ciudadLogic->getciudad()->getId();
			}
		}
	}

	public function cargarCombosvendedorsFK($connexion=null,$strRecargarFkQuery='',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$vendedorLogic= new vendedor_logic();
		$pagination= new Pagination();
		$clienteForeignKey->vendedorsFK=array();

		$vendedorLogic->setConnexion($connexion);
		$vendedorLogic->getvendedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesionvendedor!=true) {
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
				if($clienteForeignKey->idvendedorDefaultFK==0) {
					$clienteForeignKey->idvendedorDefaultFK=$vendedorLocal->getId();
				}

				$clienteForeignKey->vendedorsFK[$vendedorLocal->getId()]=cliente_util::getvendedorDescripcion($vendedorLocal);
			}

		} else {

			if($cliente_session->bigidvendedorActual!=null && $cliente_session->bigidvendedorActual > 0) {
				$vendedorLogic->getEntity($cliente_session->bigidvendedorActual);//WithConnection

				$clienteForeignKey->vendedorsFK[$vendedorLogic->getvendedor()->getId()]=cliente_util::getvendedorDescripcion($vendedorLogic->getvendedor());
				$clienteForeignKey->idvendedorDefaultFK=$vendedorLogic->getvendedor()->getId();
			}
		}
	}

	public function cargarCombostermino_pago_clientesFK($connexion=null,$strRecargarFkQuery='',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$termino_pago_clienteLogic= new termino_pago_cliente_logic();
		$pagination= new Pagination();
		$clienteForeignKey->termino_pago_clientesFK=array();

		$termino_pago_clienteLogic->setConnexion($connexion);
		$termino_pago_clienteLogic->gettermino_pago_clienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesiontermino_pago_cliente!=true) {
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
				if($clienteForeignKey->idtermino_pago_clienteDefaultFK==0) {
					$clienteForeignKey->idtermino_pago_clienteDefaultFK=$termino_pago_clienteLocal->getId();
				}

				$clienteForeignKey->termino_pago_clientesFK[$termino_pago_clienteLocal->getId()]=cliente_util::gettermino_pago_clienteDescripcion($termino_pago_clienteLocal);
			}

		} else {

			if($cliente_session->bigidtermino_pago_clienteActual!=null && $cliente_session->bigidtermino_pago_clienteActual > 0) {
				$termino_pago_clienteLogic->getEntity($cliente_session->bigidtermino_pago_clienteActual);//WithConnection

				$clienteForeignKey->termino_pago_clientesFK[$termino_pago_clienteLogic->gettermino_pago_cliente()->getId()]=cliente_util::gettermino_pago_clienteDescripcion($termino_pago_clienteLogic->gettermino_pago_cliente());
				$clienteForeignKey->idtermino_pago_clienteDefaultFK=$termino_pago_clienteLogic->gettermino_pago_cliente()->getId();
			}
		}
	}

	public function cargarComboscuentasFK($connexion=null,$strRecargarFkQuery='',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$clienteForeignKey->cuentasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesioncuenta!=true) {
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
				if($clienteForeignKey->idcuentaDefaultFK==0) {
					$clienteForeignKey->idcuentaDefaultFK=$cuentaLocal->getId();
				}

				$clienteForeignKey->cuentasFK[$cuentaLocal->getId()]=cliente_util::getcuentaDescripcion($cuentaLocal);
			}

		} else {

			if($cliente_session->bigidcuentaActual!=null && $cliente_session->bigidcuentaActual > 0) {
				$cuentaLogic->getEntity($cliente_session->bigidcuentaActual);//WithConnection

				$clienteForeignKey->cuentasFK[$cuentaLogic->getcuenta()->getId()]=cliente_util::getcuentaDescripcion($cuentaLogic->getcuenta());
				$clienteForeignKey->idcuentaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarCombosimpuestosFK($connexion=null,$strRecargarFkQuery='',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$impuestoLogic= new impuesto_logic();
		$pagination= new Pagination();
		$clienteForeignKey->impuestosFK=array();

		$impuestoLogic->setConnexion($connexion);
		$impuestoLogic->getimpuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesionimpuesto!=true) {
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
				if($clienteForeignKey->idimpuestoDefaultFK==0) {
					$clienteForeignKey->idimpuestoDefaultFK=$impuestoLocal->getId();
				}

				$clienteForeignKey->impuestosFK[$impuestoLocal->getId()]=cliente_util::getimpuestoDescripcion($impuestoLocal);
			}

		} else {

			if($cliente_session->bigidimpuestoActual!=null && $cliente_session->bigidimpuestoActual > 0) {
				$impuestoLogic->getEntity($cliente_session->bigidimpuestoActual);//WithConnection

				$clienteForeignKey->impuestosFK[$impuestoLogic->getimpuesto()->getId()]=cliente_util::getimpuestoDescripcion($impuestoLogic->getimpuesto());
				$clienteForeignKey->idimpuestoDefaultFK=$impuestoLogic->getimpuesto()->getId();
			}
		}
	}

	public function cargarCombosretencionsFK($connexion=null,$strRecargarFkQuery='',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$retencionLogic= new retencion_logic();
		$pagination= new Pagination();
		$clienteForeignKey->retencionsFK=array();

		$retencionLogic->setConnexion($connexion);
		$retencionLogic->getretencionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesionretencion!=true) {
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
				if($clienteForeignKey->idretencionDefaultFK==0) {
					$clienteForeignKey->idretencionDefaultFK=$retencionLocal->getId();
				}

				$clienteForeignKey->retencionsFK[$retencionLocal->getId()]=cliente_util::getretencionDescripcion($retencionLocal);
			}

		} else {

			if($cliente_session->bigidretencionActual!=null && $cliente_session->bigidretencionActual > 0) {
				$retencionLogic->getEntity($cliente_session->bigidretencionActual);//WithConnection

				$clienteForeignKey->retencionsFK[$retencionLogic->getretencion()->getId()]=cliente_util::getretencionDescripcion($retencionLogic->getretencion());
				$clienteForeignKey->idretencionDefaultFK=$retencionLogic->getretencion()->getId();
			}
		}
	}

	public function cargarCombosretencion_fuentesFK($connexion=null,$strRecargarFkQuery='',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$retencion_fuenteLogic= new retencion_fuente_logic();
		$pagination= new Pagination();
		$clienteForeignKey->retencion_fuentesFK=array();

		$retencion_fuenteLogic->setConnexion($connexion);
		$retencion_fuenteLogic->getretencion_fuenteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesionretencion_fuente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=retencion_fuente_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalretencion_fuente=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalretencion_fuente=Funciones::GetFinalQueryAppend($finalQueryGlobalretencion_fuente, '');
				$finalQueryGlobalretencion_fuente.=retencion_fuente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalretencion_fuente.$strRecargarFkQuery;		

				$retencion_fuenteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($retencion_fuenteLogic->getretencion_fuentes() as $retencion_fuenteLocal ) {
				if($clienteForeignKey->idretencion_fuenteDefaultFK==0) {
					$clienteForeignKey->idretencion_fuenteDefaultFK=$retencion_fuenteLocal->getId();
				}

				$clienteForeignKey->retencion_fuentesFK[$retencion_fuenteLocal->getId()]=cliente_util::getretencion_fuenteDescripcion($retencion_fuenteLocal);
			}

		} else {

			if($cliente_session->bigidretencion_fuenteActual!=null && $cliente_session->bigidretencion_fuenteActual > 0) {
				$retencion_fuenteLogic->getEntity($cliente_session->bigidretencion_fuenteActual);//WithConnection

				$clienteForeignKey->retencion_fuentesFK[$retencion_fuenteLogic->getretencion_fuente()->getId()]=cliente_util::getretencion_fuenteDescripcion($retencion_fuenteLogic->getretencion_fuente());
				$clienteForeignKey->idretencion_fuenteDefaultFK=$retencion_fuenteLogic->getretencion_fuente()->getId();
			}
		}
	}

	public function cargarCombosretencion_icasFK($connexion=null,$strRecargarFkQuery='',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$retencion_icaLogic= new retencion_ica_logic();
		$pagination= new Pagination();
		$clienteForeignKey->retencion_icasFK=array();

		$retencion_icaLogic->setConnexion($connexion);
		$retencion_icaLogic->getretencion_icaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesionretencion_ica!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=retencion_ica_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalretencion_ica=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalretencion_ica=Funciones::GetFinalQueryAppend($finalQueryGlobalretencion_ica, '');
				$finalQueryGlobalretencion_ica.=retencion_ica_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalretencion_ica.$strRecargarFkQuery;		

				$retencion_icaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($retencion_icaLogic->getretencion_icas() as $retencion_icaLocal ) {
				if($clienteForeignKey->idretencion_icaDefaultFK==0) {
					$clienteForeignKey->idretencion_icaDefaultFK=$retencion_icaLocal->getId();
				}

				$clienteForeignKey->retencion_icasFK[$retencion_icaLocal->getId()]=cliente_util::getretencion_icaDescripcion($retencion_icaLocal);
			}

		} else {

			if($cliente_session->bigidretencion_icaActual!=null && $cliente_session->bigidretencion_icaActual > 0) {
				$retencion_icaLogic->getEntity($cliente_session->bigidretencion_icaActual);//WithConnection

				$clienteForeignKey->retencion_icasFK[$retencion_icaLogic->getretencion_ica()->getId()]=cliente_util::getretencion_icaDescripcion($retencion_icaLogic->getretencion_ica());
				$clienteForeignKey->idretencion_icaDefaultFK=$retencion_icaLogic->getretencion_ica()->getId();
			}
		}
	}

	public function cargarCombosotro_impuestosFK($connexion=null,$strRecargarFkQuery='',$clienteForeignKey,$cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$otro_impuestoLogic= new otro_impuesto_logic();
		$pagination= new Pagination();
		$clienteForeignKey->otro_impuestosFK=array();

		$otro_impuestoLogic->setConnexion($connexion);
		$otro_impuestoLogic->getotro_impuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesionotro_impuesto!=true) {
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
				if($clienteForeignKey->idotro_impuestoDefaultFK==0) {
					$clienteForeignKey->idotro_impuestoDefaultFK=$otro_impuestoLocal->getId();
				}

				$clienteForeignKey->otro_impuestosFK[$otro_impuestoLocal->getId()]=cliente_util::getotro_impuestoDescripcion($otro_impuestoLocal);
			}

		} else {

			if($cliente_session->bigidotro_impuestoActual!=null && $cliente_session->bigidotro_impuestoActual > 0) {
				$otro_impuestoLogic->getEntity($cliente_session->bigidotro_impuestoActual);//WithConnection

				$clienteForeignKey->otro_impuestosFK[$otro_impuestoLogic->getotro_impuesto()->getId()]=cliente_util::getotro_impuestoDescripcion($otro_impuestoLogic->getotro_impuesto());
				$clienteForeignKey->idotro_impuestoDefaultFK=$otro_impuestoLogic->getotro_impuesto()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($cliente,$devolucionfacturas,$cuentacobrars,$documentoclientes,$estimados,$imagenclientes,$facturas,$consignacions,$listaclientes) {
		$this->saveRelacionesBase($cliente,$devolucionfacturas,$cuentacobrars,$documentoclientes,$estimados,$imagenclientes,$facturas,$consignacions,$listaclientes,true);
	}

	public function saveRelaciones($cliente,$devolucionfacturas,$cuentacobrars,$documentoclientes,$estimados,$imagenclientes,$facturas,$consignacions,$listaclientes) {
		$this->saveRelacionesBase($cliente,$devolucionfacturas,$cuentacobrars,$documentoclientes,$estimados,$imagenclientes,$facturas,$consignacions,$listaclientes,false);
	}

	public function saveRelacionesBase($cliente,$devolucionfacturas=array(),$cuentacobrars=array(),$documentoclientes=array(),$estimados=array(),$imagenclientes=array(),$facturas=array(),$consignacions=array(),$listaclientes=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$cliente->setdevolucion_facturas($devolucionfacturas);
			$cliente->setcuenta_cobrars($cuentacobrars);
			$cliente->setdocumento_clientes($documentoclientes);
			$cliente->setestimados($estimados);
			$cliente->setimagen_clientes($imagenclientes);
			$cliente->setfacturas($facturas);
			$cliente->setconsignacions($consignacions);
			$cliente->setlista_clientes($listaclientes);
			$this->setcliente($cliente);

			if(true) {

				//cliente_logic_add::updateRelacionesToSave($cliente,$this);

				if(($this->cliente->getIsNew() || $this->cliente->getIsChanged()) && !$this->cliente->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($devolucionfacturas,$cuentacobrars,$documentoclientes,$estimados,$imagenclientes,$facturas,$consignacions,$listaclientes);

				} else if($this->cliente->getIsDeleted()) {
					$this->saveRelacionesDetalles($devolucionfacturas,$cuentacobrars,$documentoclientes,$estimados,$imagenclientes,$facturas,$consignacions,$listaclientes);
					$this->save();
				}

				//cliente_logic_add::updateRelacionesToSaveAfter($cliente,$this);

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
	
	
	public function saveRelacionesDetalles($devolucionfacturas=array(),$cuentacobrars=array(),$documentoclientes=array(),$estimados=array(),$imagenclientes=array(),$facturas=array(),$consignacions=array(),$listaclientes=array()) {
		try {
	

			$idclienteActual=$this->getcliente()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/devolucion_factura_carga.php');
			devolucion_factura_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$devolucionfacturaLogic_Desde_cliente=new devolucion_factura_logic();
			$devolucionfacturaLogic_Desde_cliente->setdevolucion_facturas($devolucionfacturas);

			$devolucionfacturaLogic_Desde_cliente->setConnexion($this->getConnexion());
			$devolucionfacturaLogic_Desde_cliente->setDatosCliente($this->datosCliente);

			foreach($devolucionfacturaLogic_Desde_cliente->getdevolucion_facturas() as $devolucionfactura_Desde_cliente) {
				$devolucionfactura_Desde_cliente->setid_cliente($idclienteActual);

				$devolucionfacturaLogic_Desde_cliente->setdevolucion_factura($devolucionfactura_Desde_cliente);
				$devolucionfacturaLogic_Desde_cliente->save();

				$iddevolucion_facturaActual=$devolucion_factura_Desde_cliente->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/devolucion_factura_detalle_carga.php');
				devolucion_factura_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$devolucionfacturadetalleLogic_Desde_devolucion_factura=new devolucion_factura_detalle_logic();

				if($devolucion_factura_Desde_cliente->getdevolucion_factura_detalles()==null){
					$devolucion_factura_Desde_cliente->setdevolucion_factura_detalles(array());
				}

				$devolucionfacturadetalleLogic_Desde_devolucion_factura->setdevolucion_factura_detalles($devolucion_factura_Desde_cliente->getdevolucion_factura_detalles());

				$devolucionfacturadetalleLogic_Desde_devolucion_factura->setConnexion($this->getConnexion());
				$devolucionfacturadetalleLogic_Desde_devolucion_factura->setDatosCliente($this->datosCliente);

				foreach($devolucionfacturadetalleLogic_Desde_devolucion_factura->getdevolucion_factura_detalles() as $devolucionfacturadetalle_Desde_devolucion_factura) {
					$devolucionfacturadetalle_Desde_devolucion_factura->setid_devolucion_factura($iddevolucion_facturaActual);
				}

				$devolucionfacturadetalleLogic_Desde_devolucion_factura->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cuenta_cobrar_carga.php');
			cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cuentacobrarLogic_Desde_cliente=new cuenta_cobrar_logic();
			$cuentacobrarLogic_Desde_cliente->setcuenta_cobrars($cuentacobrars);

			$cuentacobrarLogic_Desde_cliente->setConnexion($this->getConnexion());
			$cuentacobrarLogic_Desde_cliente->setDatosCliente($this->datosCliente);

			foreach($cuentacobrarLogic_Desde_cliente->getcuenta_cobrars() as $cuentacobrar_Desde_cliente) {
				$cuentacobrar_Desde_cliente->setid_cliente($idclienteActual);

				$cuentacobrarLogic_Desde_cliente->setcuenta_cobrar($cuentacobrar_Desde_cliente);
				$cuentacobrarLogic_Desde_cliente->save();

				$idcuenta_cobrarActual=$cuenta_cobrar_Desde_cliente->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/debito_cuenta_cobrar_carga.php');
				debito_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$debitocuentacobrarLogic_Desde_cuenta_cobrar=new debito_cuenta_cobrar_logic();

				if($cuenta_cobrar_Desde_cliente->getdebito_cuenta_cobrars()==null){
					$cuenta_cobrar_Desde_cliente->setdebito_cuenta_cobrars(array());
				}

				$debitocuentacobrarLogic_Desde_cuenta_cobrar->setdebito_cuenta_cobrars($cuenta_cobrar_Desde_cliente->getdebito_cuenta_cobrars());

				$debitocuentacobrarLogic_Desde_cuenta_cobrar->setConnexion($this->getConnexion());
				$debitocuentacobrarLogic_Desde_cuenta_cobrar->setDatosCliente($this->datosCliente);

				foreach($debitocuentacobrarLogic_Desde_cuenta_cobrar->getdebito_cuenta_cobrars() as $debitocuentacobrar_Desde_cuenta_cobrar) {
					$debitocuentacobrar_Desde_cuenta_cobrar->setid_cuenta_cobrar($idcuenta_cobrarActual);
				}

				$debitocuentacobrarLogic_Desde_cuenta_cobrar->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/pago_cuenta_cobrar_carga.php');
				pago_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$pagocuentacobrarLogic_Desde_cuenta_cobrar=new pago_cuenta_cobrar_logic();

				if($cuenta_cobrar_Desde_cliente->getpago_cuenta_cobrars()==null){
					$cuenta_cobrar_Desde_cliente->setpago_cuenta_cobrars(array());
				}

				$pagocuentacobrarLogic_Desde_cuenta_cobrar->setpago_cuenta_cobrars($cuenta_cobrar_Desde_cliente->getpago_cuenta_cobrars());

				$pagocuentacobrarLogic_Desde_cuenta_cobrar->setConnexion($this->getConnexion());
				$pagocuentacobrarLogic_Desde_cuenta_cobrar->setDatosCliente($this->datosCliente);

				foreach($pagocuentacobrarLogic_Desde_cuenta_cobrar->getpago_cuenta_cobrars() as $pagocuentacobrar_Desde_cuenta_cobrar) {
					$pagocuentacobrar_Desde_cuenta_cobrar->setid_cuenta_cobrar($idcuenta_cobrarActual);
				}

				$pagocuentacobrarLogic_Desde_cuenta_cobrar->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/credito_cuenta_cobrar_carga.php');
				credito_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$creditocuentacobrarLogic_Desde_cuenta_cobrar=new credito_cuenta_cobrar_logic();

				if($cuenta_cobrar_Desde_cliente->getcredito_cuenta_cobrars()==null){
					$cuenta_cobrar_Desde_cliente->setcredito_cuenta_cobrars(array());
				}

				$creditocuentacobrarLogic_Desde_cuenta_cobrar->setcredito_cuenta_cobrars($cuenta_cobrar_Desde_cliente->getcredito_cuenta_cobrars());

				$creditocuentacobrarLogic_Desde_cuenta_cobrar->setConnexion($this->getConnexion());
				$creditocuentacobrarLogic_Desde_cuenta_cobrar->setDatosCliente($this->datosCliente);

				foreach($creditocuentacobrarLogic_Desde_cuenta_cobrar->getcredito_cuenta_cobrars() as $creditocuentacobrar_Desde_cuenta_cobrar) {
					$creditocuentacobrar_Desde_cuenta_cobrar->setid_cuenta_cobrar($idcuenta_cobrarActual);
				}

				$creditocuentacobrarLogic_Desde_cuenta_cobrar->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/documento_cliente_carga.php');
			documento_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$documentoclienteLogic_Desde_cliente=new documento_cliente_logic();
			$documentoclienteLogic_Desde_cliente->setdocumento_clientes($documentoclientes);

			$documentoclienteLogic_Desde_cliente->setConnexion($this->getConnexion());
			$documentoclienteLogic_Desde_cliente->setDatosCliente($this->datosCliente);

			foreach($documentoclienteLogic_Desde_cliente->getdocumento_clientes() as $documentocliente_Desde_cliente) {
				$documentocliente_Desde_cliente->setid_cliente($idclienteActual);
			}

			$documentoclienteLogic_Desde_cliente->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/estimado_carga.php');
			estimado_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$estimadoLogic_Desde_cliente=new estimado_logic();
			$estimadoLogic_Desde_cliente->setestimados($estimados);

			$estimadoLogic_Desde_cliente->setConnexion($this->getConnexion());
			$estimadoLogic_Desde_cliente->setDatosCliente($this->datosCliente);

			foreach($estimadoLogic_Desde_cliente->getestimados() as $estimado_Desde_cliente) {
				$estimado_Desde_cliente->setid_cliente($idclienteActual);

				$estimadoLogic_Desde_cliente->setestimado($estimado_Desde_cliente);
				$estimadoLogic_Desde_cliente->save();

				$idestimadoActual=$estimado_Desde_cliente->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/imagen_estimado_carga.php');
				imagen_estimado_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$imagenestimadoLogic_Desde_estimado=new imagen_estimado_logic();

				if($estimado_Desde_cliente->getimagen_estimados()==null){
					$estimado_Desde_cliente->setimagen_estimados(array());
				}

				$imagenestimadoLogic_Desde_estimado->setimagen_estimados($estimado_Desde_cliente->getimagen_estimados());

				$imagenestimadoLogic_Desde_estimado->setConnexion($this->getConnexion());
				$imagenestimadoLogic_Desde_estimado->setDatosCliente($this->datosCliente);

				foreach($imagenestimadoLogic_Desde_estimado->getimagen_estimados() as $imagenestimado_Desde_estimado) {
					$imagenestimado_Desde_estimado->setid_estimado($idestimadoActual);
				}

				$imagenestimadoLogic_Desde_estimado->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/estimado_detalle_carga.php');
				estimado_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$estimadodetalleLogic_Desde_estimado=new estimado_detalle_logic();

				if($estimado_Desde_cliente->getestimado_detalles()==null){
					$estimado_Desde_cliente->setestimado_detalles(array());
				}

				$estimadodetalleLogic_Desde_estimado->setestimado_detalles($estimado_Desde_cliente->getestimado_detalles());

				$estimadodetalleLogic_Desde_estimado->setConnexion($this->getConnexion());
				$estimadodetalleLogic_Desde_estimado->setDatosCliente($this->datosCliente);

				foreach($estimadodetalleLogic_Desde_estimado->getestimado_detalles() as $estimadodetalle_Desde_estimado) {
					$estimadodetalle_Desde_estimado->setid_estimado($idestimadoActual);
				}

				$estimadodetalleLogic_Desde_estimado->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/imagen_cliente_carga.php');
			imagen_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$imagenclienteLogic_Desde_cliente=new imagen_cliente_logic();
			$imagenclienteLogic_Desde_cliente->setimagen_clientes($imagenclientes);

			$imagenclienteLogic_Desde_cliente->setConnexion($this->getConnexion());
			$imagenclienteLogic_Desde_cliente->setDatosCliente($this->datosCliente);

			foreach($imagenclienteLogic_Desde_cliente->getimagen_clientes() as $imagencliente_Desde_cliente) {
				$imagencliente_Desde_cliente->setid_cliente($idclienteActual);
			}

			$imagenclienteLogic_Desde_cliente->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_carga.php');
			factura_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$facturaLogic_Desde_cliente=new factura_logic();
			$facturaLogic_Desde_cliente->setfacturas($facturas);

			$facturaLogic_Desde_cliente->setConnexion($this->getConnexion());
			$facturaLogic_Desde_cliente->setDatosCliente($this->datosCliente);

			foreach($facturaLogic_Desde_cliente->getfacturas() as $factura_Desde_cliente) {
				$factura_Desde_cliente->setid_cliente($idclienteActual);

				$facturaLogic_Desde_cliente->setfactura($factura_Desde_cliente);
				$facturaLogic_Desde_cliente->save();

				$idfacturaActual=$factura_Desde_cliente->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_detalle_carga.php');
				factura_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$facturadetalleLogic_Desde_factura=new factura_detalle_logic();

				if($factura_Desde_cliente->getfactura_detalles()==null){
					$factura_Desde_cliente->setfactura_detalles(array());
				}

				$facturadetalleLogic_Desde_factura->setfactura_detalles($factura_Desde_cliente->getfactura_detalles());

				$facturadetalleLogic_Desde_factura->setConnexion($this->getConnexion());
				$facturadetalleLogic_Desde_factura->setDatosCliente($this->datosCliente);

				foreach($facturadetalleLogic_Desde_factura->getfactura_detalles() as $facturadetalle_Desde_factura) {
					$facturadetalle_Desde_factura->setid_factura($idfacturaActual);
				}

				$facturadetalleLogic_Desde_factura->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/consignacion_carga.php');
			consignacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$consignacionLogic_Desde_cliente=new consignacion_logic();
			$consignacionLogic_Desde_cliente->setconsignacions($consignacions);

			$consignacionLogic_Desde_cliente->setConnexion($this->getConnexion());
			$consignacionLogic_Desde_cliente->setDatosCliente($this->datosCliente);

			foreach($consignacionLogic_Desde_cliente->getconsignacions() as $consignacion_Desde_cliente) {
				$consignacion_Desde_cliente->setid_cliente($idclienteActual);

				$consignacionLogic_Desde_cliente->setconsignacion($consignacion_Desde_cliente);
				$consignacionLogic_Desde_cliente->save();

				$idconsignacionActual=$consignacion_Desde_cliente->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/imagen_consignacion_carga.php');
				imagen_consignacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$imagenconsignacionLogic_Desde_consignacion=new imagen_consignacion_logic();

				if($consignacion_Desde_cliente->getimagen_consignacions()==null){
					$consignacion_Desde_cliente->setimagen_consignacions(array());
				}

				$imagenconsignacionLogic_Desde_consignacion->setimagen_consignacions($consignacion_Desde_cliente->getimagen_consignacions());

				$imagenconsignacionLogic_Desde_consignacion->setConnexion($this->getConnexion());
				$imagenconsignacionLogic_Desde_consignacion->setDatosCliente($this->datosCliente);

				foreach($imagenconsignacionLogic_Desde_consignacion->getimagen_consignacions() as $imagenconsignacion_Desde_consignacion) {
					$imagenconsignacion_Desde_consignacion->setid_consignacion($idconsignacionActual);
				}

				$imagenconsignacionLogic_Desde_consignacion->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/consignacion_detalle_carga.php');
				consignacion_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$consignaciondetalleLogic_Desde_consignacion=new consignacion_detalle_logic();

				if($consignacion_Desde_cliente->getconsignacion_detalles()==null){
					$consignacion_Desde_cliente->setconsignacion_detalles(array());
				}

				$consignaciondetalleLogic_Desde_consignacion->setconsignacion_detalles($consignacion_Desde_cliente->getconsignacion_detalles());

				$consignaciondetalleLogic_Desde_consignacion->setConnexion($this->getConnexion());
				$consignaciondetalleLogic_Desde_consignacion->setDatosCliente($this->datosCliente);

				foreach($consignaciondetalleLogic_Desde_consignacion->getconsignacion_detalles() as $consignaciondetalle_Desde_consignacion) {
					$consignaciondetalle_Desde_consignacion->setid_consignacion($idconsignacionActual);
				}

				$consignaciondetalleLogic_Desde_consignacion->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/lista_cliente_carga.php');
			lista_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$listaclienteLogic_Desde_cliente=new lista_cliente_logic();
			$listaclienteLogic_Desde_cliente->setlista_clientes($listaclientes);

			$listaclienteLogic_Desde_cliente->setConnexion($this->getConnexion());
			$listaclienteLogic_Desde_cliente->setDatosCliente($this->datosCliente);

			foreach($listaclienteLogic_Desde_cliente->getlista_clientes() as $listacliente_Desde_cliente) {
				$listacliente_Desde_cliente->setid_cliente($idclienteActual);
			}

			$listaclienteLogic_Desde_cliente->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $clientes,cliente_param_return $clienteParameterGeneral) : cliente_param_return {
		$clienteReturnGeneral=new cliente_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $clienteReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $clientes,cliente_param_return $clienteParameterGeneral) : cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$clienteReturnGeneral=new cliente_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $clientes,cliente $cliente,cliente_param_return $clienteParameterGeneral,bool $isEsNuevocliente,array $clases) : cliente_param_return {
		 try {	
			$clienteReturnGeneral=new cliente_param_return();
	
			$clienteReturnGeneral->setcliente($cliente);
			$clienteReturnGeneral->setclientes($clientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$clienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $clienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $clientes,cliente $cliente,cliente_param_return $clienteParameterGeneral,bool $isEsNuevocliente,array $clases) : cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$clienteReturnGeneral=new cliente_param_return();
	
			$clienteReturnGeneral->setcliente($cliente);
			$clienteReturnGeneral->setclientes($clientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$clienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $clientes,cliente $cliente,cliente_param_return $clienteParameterGeneral,bool $isEsNuevocliente,array $clases) : cliente_param_return {
		 try {	
			$clienteReturnGeneral=new cliente_param_return();
	
			$clienteReturnGeneral->setcliente($cliente);
			$clienteReturnGeneral->setclientes($clientes);
			
			
			
			return $clienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $clientes,cliente $cliente,cliente_param_return $clienteParameterGeneral,bool $isEsNuevocliente,array $clases) : cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$clienteReturnGeneral=new cliente_param_return();
	
			$clienteReturnGeneral->setcliente($cliente);
			$clienteReturnGeneral->setclientes($clientes);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,cliente $cliente,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,cliente $cliente,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		cliente_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		cliente_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(cliente $cliente,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//cliente_logic_add::updateclienteToGet($this->cliente);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cliente->setempresa($this->clienteDataAccess->getempresa($this->connexion,$cliente));
		$cliente->settipo_persona($this->clienteDataAccess->gettipo_persona($this->connexion,$cliente));
		$cliente->setcategoria_cliente($this->clienteDataAccess->getcategoria_cliente($this->connexion,$cliente));
		$cliente->settipo_precio($this->clienteDataAccess->gettipo_precio($this->connexion,$cliente));
		$cliente->setgiro_negocio_cliente($this->clienteDataAccess->getgiro_negocio_cliente($this->connexion,$cliente));
		$cliente->setpais($this->clienteDataAccess->getpais($this->connexion,$cliente));
		$cliente->setprovincia($this->clienteDataAccess->getprovincia($this->connexion,$cliente));
		$cliente->setciudad($this->clienteDataAccess->getciudad($this->connexion,$cliente));
		$cliente->setvendedor($this->clienteDataAccess->getvendedor($this->connexion,$cliente));
		$cliente->settermino_pago_cliente($this->clienteDataAccess->gettermino_pago_cliente($this->connexion,$cliente));
		$cliente->setcuenta($this->clienteDataAccess->getcuenta($this->connexion,$cliente));
		$cliente->setimpuesto($this->clienteDataAccess->getimpuesto($this->connexion,$cliente));
		$cliente->setretencion($this->clienteDataAccess->getretencion($this->connexion,$cliente));
		$cliente->setretencion_fuente($this->clienteDataAccess->getretencion_fuente($this->connexion,$cliente));
		$cliente->setretencion_ica($this->clienteDataAccess->getretencion_ica($this->connexion,$cliente));
		$cliente->setotro_impuesto($this->clienteDataAccess->getotro_impuesto($this->connexion,$cliente));
		$cliente->setdevolucion_facturas($this->clienteDataAccess->getdevolucion_facturas($this->connexion,$cliente));
		$cliente->setcuenta_cobrars($this->clienteDataAccess->getcuenta_cobrars($this->connexion,$cliente));
		$cliente->setdocumento_clientes($this->clienteDataAccess->getdocumento_clientes($this->connexion,$cliente));
		$cliente->setestimados($this->clienteDataAccess->getestimados($this->connexion,$cliente));
		$cliente->setimagen_clientes($this->clienteDataAccess->getimagen_clientes($this->connexion,$cliente));
		$cliente->setfacturas($this->clienteDataAccess->getfacturas($this->connexion,$cliente));
		$cliente->setconsignacions($this->clienteDataAccess->getconsignacions($this->connexion,$cliente));
		$cliente->setlista_clientes($this->clienteDataAccess->getlista_clientes($this->connexion,$cliente));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cliente->setempresa($this->clienteDataAccess->getempresa($this->connexion,$cliente));
				continue;
			}

			if($clas->clas==tipo_persona::$class.'') {
				$cliente->settipo_persona($this->clienteDataAccess->gettipo_persona($this->connexion,$cliente));
				continue;
			}

			if($clas->clas==categoria_cliente::$class.'') {
				$cliente->setcategoria_cliente($this->clienteDataAccess->getcategoria_cliente($this->connexion,$cliente));
				continue;
			}

			if($clas->clas==tipo_precio::$class.'') {
				$cliente->settipo_precio($this->clienteDataAccess->gettipo_precio($this->connexion,$cliente));
				continue;
			}

			if($clas->clas==giro_negocio_cliente::$class.'') {
				$cliente->setgiro_negocio_cliente($this->clienteDataAccess->getgiro_negocio_cliente($this->connexion,$cliente));
				continue;
			}

			if($clas->clas==pais::$class.'') {
				$cliente->setpais($this->clienteDataAccess->getpais($this->connexion,$cliente));
				continue;
			}

			if($clas->clas==provincia::$class.'') {
				$cliente->setprovincia($this->clienteDataAccess->getprovincia($this->connexion,$cliente));
				continue;
			}

			if($clas->clas==ciudad::$class.'') {
				$cliente->setciudad($this->clienteDataAccess->getciudad($this->connexion,$cliente));
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				$cliente->setvendedor($this->clienteDataAccess->getvendedor($this->connexion,$cliente));
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				$cliente->settermino_pago_cliente($this->clienteDataAccess->gettermino_pago_cliente($this->connexion,$cliente));
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$cliente->setcuenta($this->clienteDataAccess->getcuenta($this->connexion,$cliente));
				continue;
			}

			if($clas->clas==impuesto::$class.'') {
				$cliente->setimpuesto($this->clienteDataAccess->getimpuesto($this->connexion,$cliente));
				continue;
			}

			if($clas->clas==retencion::$class.'') {
				$cliente->setretencion($this->clienteDataAccess->getretencion($this->connexion,$cliente));
				continue;
			}

			if($clas->clas==retencion_fuente::$class.'') {
				$cliente->setretencion_fuente($this->clienteDataAccess->getretencion_fuente($this->connexion,$cliente));
				continue;
			}

			if($clas->clas==retencion_ica::$class.'') {
				$cliente->setretencion_ica($this->clienteDataAccess->getretencion_ica($this->connexion,$cliente));
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'') {
				$cliente->setotro_impuesto($this->clienteDataAccess->getotro_impuesto($this->connexion,$cliente));
				continue;
			}

			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cliente->setdevolucion_facturas($this->clienteDataAccess->getdevolucion_facturas($this->connexion,$cliente));

				if($this->isConDeep) {
					$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
					$devolucionfacturaLogic->setdevolucion_facturas($cliente->getdevolucion_facturas());
					$classesLocal=devolucion_factura_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$devolucionfacturaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					devolucion_factura_util::refrescarFKDescripciones($devolucionfacturaLogic->getdevolucion_facturas());
					$cliente->setdevolucion_facturas($devolucionfacturaLogic->getdevolucion_facturas());
				}

				continue;
			}

			if($clas->clas==cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cliente->setcuenta_cobrars($this->clienteDataAccess->getcuenta_cobrars($this->connexion,$cliente));

				if($this->isConDeep) {
					$cuentacobrarLogic= new cuenta_cobrar_logic($this->connexion);
					$cuentacobrarLogic->setcuenta_cobrars($cliente->getcuenta_cobrars());
					$classesLocal=cuenta_cobrar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cuentacobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cuenta_cobrar_util::refrescarFKDescripciones($cuentacobrarLogic->getcuenta_cobrars());
					$cliente->setcuenta_cobrars($cuentacobrarLogic->getcuenta_cobrars());
				}

				continue;
			}

			if($clas->clas==documento_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cliente->setdocumento_clientes($this->clienteDataAccess->getdocumento_clientes($this->connexion,$cliente));

				if($this->isConDeep) {
					$documentoclienteLogic= new documento_cliente_logic($this->connexion);
					$documentoclienteLogic->setdocumento_clientes($cliente->getdocumento_clientes());
					$classesLocal=documento_cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$documentoclienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					documento_cliente_util::refrescarFKDescripciones($documentoclienteLogic->getdocumento_clientes());
					$cliente->setdocumento_clientes($documentoclienteLogic->getdocumento_clientes());
				}

				continue;
			}

			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cliente->setestimados($this->clienteDataAccess->getestimados($this->connexion,$cliente));

				if($this->isConDeep) {
					$estimadoLogic= new estimado_logic($this->connexion);
					$estimadoLogic->setestimados($cliente->getestimados());
					$classesLocal=estimado_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$estimadoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					estimado_util::refrescarFKDescripciones($estimadoLogic->getestimados());
					$cliente->setestimados($estimadoLogic->getestimados());
				}

				continue;
			}

			if($clas->clas==imagen_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cliente->setimagen_clientes($this->clienteDataAccess->getimagen_clientes($this->connexion,$cliente));

				if($this->isConDeep) {
					$imagenclienteLogic= new imagen_cliente_logic($this->connexion);
					$imagenclienteLogic->setimagen_clientes($cliente->getimagen_clientes());
					$classesLocal=imagen_cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$imagenclienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					imagen_cliente_util::refrescarFKDescripciones($imagenclienteLogic->getimagen_clientes());
					$cliente->setimagen_clientes($imagenclienteLogic->getimagen_clientes());
				}

				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cliente->setfacturas($this->clienteDataAccess->getfacturas($this->connexion,$cliente));

				if($this->isConDeep) {
					$facturaLogic= new factura_logic($this->connexion);
					$facturaLogic->setfacturas($cliente->getfacturas());
					$classesLocal=factura_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$facturaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					factura_util::refrescarFKDescripciones($facturaLogic->getfacturas());
					$cliente->setfacturas($facturaLogic->getfacturas());
				}

				continue;
			}

			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cliente->setconsignacions($this->clienteDataAccess->getconsignacions($this->connexion,$cliente));

				if($this->isConDeep) {
					$consignacionLogic= new consignacion_logic($this->connexion);
					$consignacionLogic->setconsignacions($cliente->getconsignacions());
					$classesLocal=consignacion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$consignacionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					consignacion_util::refrescarFKDescripciones($consignacionLogic->getconsignacions());
					$cliente->setconsignacions($consignacionLogic->getconsignacions());
				}

				continue;
			}

			if($clas->clas==lista_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cliente->setlista_clientes($this->clienteDataAccess->getlista_clientes($this->connexion,$cliente));

				if($this->isConDeep) {
					$listaclienteLogic= new lista_cliente_logic($this->connexion);
					$listaclienteLogic->setlista_clientes($cliente->getlista_clientes());
					$classesLocal=lista_cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$listaclienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					lista_cliente_util::refrescarFKDescripciones($listaclienteLogic->getlista_clientes());
					$cliente->setlista_clientes($listaclienteLogic->getlista_clientes());
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
			$cliente->setempresa($this->clienteDataAccess->getempresa($this->connexion,$cliente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_persona::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->settipo_persona($this->clienteDataAccess->gettipo_persona($this->connexion,$cliente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==categoria_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setcategoria_cliente($this->clienteDataAccess->getcategoria_cliente($this->connexion,$cliente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_precio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->settipo_precio($this->clienteDataAccess->gettipo_precio($this->connexion,$cliente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==giro_negocio_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setgiro_negocio_cliente($this->clienteDataAccess->getgiro_negocio_cliente($this->connexion,$cliente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setpais($this->clienteDataAccess->getpais($this->connexion,$cliente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==provincia::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setprovincia($this->clienteDataAccess->getprovincia($this->connexion,$cliente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setciudad($this->clienteDataAccess->getciudad($this->connexion,$cliente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setvendedor($this->clienteDataAccess->getvendedor($this->connexion,$cliente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->settermino_pago_cliente($this->clienteDataAccess->gettermino_pago_cliente($this->connexion,$cliente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setcuenta($this->clienteDataAccess->getcuenta($this->connexion,$cliente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setimpuesto($this->clienteDataAccess->getimpuesto($this->connexion,$cliente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setretencion($this->clienteDataAccess->getretencion($this->connexion,$cliente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion_fuente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setretencion_fuente($this->clienteDataAccess->getretencion_fuente($this->connexion,$cliente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion_ica::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setretencion_ica($this->clienteDataAccess->getretencion_ica($this->connexion,$cliente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setotro_impuesto($this->clienteDataAccess->getotro_impuesto($this->connexion,$cliente));
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
			$cliente->setdevolucion_facturas($this->clienteDataAccess->getdevolucion_facturas($this->connexion,$cliente));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_cobrar::$class);
			$cliente->setcuenta_cobrars($this->clienteDataAccess->getcuenta_cobrars($this->connexion,$cliente));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(documento_cliente::$class);
			$cliente->setdocumento_clientes($this->clienteDataAccess->getdocumento_clientes($this->connexion,$cliente));
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
			$cliente->setestimados($this->clienteDataAccess->getestimados($this->connexion,$cliente));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_cliente::$class);
			$cliente->setimagen_clientes($this->clienteDataAccess->getimagen_clientes($this->connexion,$cliente));
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
			$cliente->setfacturas($this->clienteDataAccess->getfacturas($this->connexion,$cliente));
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
			$cliente->setconsignacions($this->clienteDataAccess->getconsignacions($this->connexion,$cliente));
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
			$cliente->setlista_clientes($this->clienteDataAccess->getlista_clientes($this->connexion,$cliente));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cliente->setempresa($this->clienteDataAccess->getempresa($this->connexion,$cliente));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($cliente->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$cliente->settipo_persona($this->clienteDataAccess->gettipo_persona($this->connexion,$cliente));
		$tipo_personaLogic= new tipo_persona_logic($this->connexion);
		$tipo_personaLogic->deepLoad($cliente->gettipo_persona(),$isDeep,$deepLoadType,$clases);
				
		$cliente->setcategoria_cliente($this->clienteDataAccess->getcategoria_cliente($this->connexion,$cliente));
		$categoria_clienteLogic= new categoria_cliente_logic($this->connexion);
		$categoria_clienteLogic->deepLoad($cliente->getcategoria_cliente(),$isDeep,$deepLoadType,$clases);
				
		$cliente->settipo_precio($this->clienteDataAccess->gettipo_precio($this->connexion,$cliente));
		$tipo_precioLogic= new tipo_precio_logic($this->connexion);
		$tipo_precioLogic->deepLoad($cliente->gettipo_precio(),$isDeep,$deepLoadType,$clases);
				
		$cliente->setgiro_negocio_cliente($this->clienteDataAccess->getgiro_negocio_cliente($this->connexion,$cliente));
		$giro_negocio_clienteLogic= new giro_negocio_cliente_logic($this->connexion);
		$giro_negocio_clienteLogic->deepLoad($cliente->getgiro_negocio_cliente(),$isDeep,$deepLoadType,$clases);
				
		$cliente->setpais($this->clienteDataAccess->getpais($this->connexion,$cliente));
		$paisLogic= new pais_logic($this->connexion);
		$paisLogic->deepLoad($cliente->getpais(),$isDeep,$deepLoadType,$clases);
				
		$cliente->setprovincia($this->clienteDataAccess->getprovincia($this->connexion,$cliente));
		$provinciaLogic= new provincia_logic($this->connexion);
		$provinciaLogic->deepLoad($cliente->getprovincia(),$isDeep,$deepLoadType,$clases);
				
		$cliente->setciudad($this->clienteDataAccess->getciudad($this->connexion,$cliente));
		$ciudadLogic= new ciudad_logic($this->connexion);
		$ciudadLogic->deepLoad($cliente->getciudad(),$isDeep,$deepLoadType,$clases);
				
		$cliente->setvendedor($this->clienteDataAccess->getvendedor($this->connexion,$cliente));
		$vendedorLogic= new vendedor_logic($this->connexion);
		$vendedorLogic->deepLoad($cliente->getvendedor(),$isDeep,$deepLoadType,$clases);
				
		$cliente->settermino_pago_cliente($this->clienteDataAccess->gettermino_pago_cliente($this->connexion,$cliente));
		$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
		$termino_pago_clienteLogic->deepLoad($cliente->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases);
				
		$cliente->setcuenta($this->clienteDataAccess->getcuenta($this->connexion,$cliente));
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepLoad($cliente->getcuenta(),$isDeep,$deepLoadType,$clases);
				
		$cliente->setimpuesto($this->clienteDataAccess->getimpuesto($this->connexion,$cliente));
		$impuestoLogic= new impuesto_logic($this->connexion);
		$impuestoLogic->deepLoad($cliente->getimpuesto(),$isDeep,$deepLoadType,$clases);
				
		$cliente->setretencion($this->clienteDataAccess->getretencion($this->connexion,$cliente));
		$retencionLogic= new retencion_logic($this->connexion);
		$retencionLogic->deepLoad($cliente->getretencion(),$isDeep,$deepLoadType,$clases);
				
		$cliente->setretencion_fuente($this->clienteDataAccess->getretencion_fuente($this->connexion,$cliente));
		$retencion_fuenteLogic= new retencion_fuente_logic($this->connexion);
		$retencion_fuenteLogic->deepLoad($cliente->getretencion_fuente(),$isDeep,$deepLoadType,$clases);
				
		$cliente->setretencion_ica($this->clienteDataAccess->getretencion_ica($this->connexion,$cliente));
		$retencion_icaLogic= new retencion_ica_logic($this->connexion);
		$retencion_icaLogic->deepLoad($cliente->getretencion_ica(),$isDeep,$deepLoadType,$clases);
				
		$cliente->setotro_impuesto($this->clienteDataAccess->getotro_impuesto($this->connexion,$cliente));
		$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
		$otro_impuestoLogic->deepLoad($cliente->getotro_impuesto(),$isDeep,$deepLoadType,$clases);
				

		$cliente->setdevolucion_facturas($this->clienteDataAccess->getdevolucion_facturas($this->connexion,$cliente));

		foreach($cliente->getdevolucion_facturas() as $devolucionfactura) {
			$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
			$devolucionfacturaLogic->deepLoad($devolucionfactura,$isDeep,$deepLoadType,$clases);
		}

		$cliente->setcuenta_cobrars($this->clienteDataAccess->getcuenta_cobrars($this->connexion,$cliente));

		foreach($cliente->getcuenta_cobrars() as $cuentacobrar) {
			$cuentacobrarLogic= new cuenta_cobrar_logic($this->connexion);
			$cuentacobrarLogic->deepLoad($cuentacobrar,$isDeep,$deepLoadType,$clases);
		}

		$cliente->setdocumento_clientes($this->clienteDataAccess->getdocumento_clientes($this->connexion,$cliente));

		foreach($cliente->getdocumento_clientes() as $documentocliente) {
			$documentoclienteLogic= new documento_cliente_logic($this->connexion);
			$documentoclienteLogic->deepLoad($documentocliente,$isDeep,$deepLoadType,$clases);
		}

		$cliente->setestimados($this->clienteDataAccess->getestimados($this->connexion,$cliente));

		foreach($cliente->getestimados() as $estimado) {
			$estimadoLogic= new estimado_logic($this->connexion);
			$estimadoLogic->deepLoad($estimado,$isDeep,$deepLoadType,$clases);
		}

		$cliente->setimagen_clientes($this->clienteDataAccess->getimagen_clientes($this->connexion,$cliente));

		foreach($cliente->getimagen_clientes() as $imagencliente) {
			$imagenclienteLogic= new imagen_cliente_logic($this->connexion);
			$imagenclienteLogic->deepLoad($imagencliente,$isDeep,$deepLoadType,$clases);
		}

		$cliente->setfacturas($this->clienteDataAccess->getfacturas($this->connexion,$cliente));

		foreach($cliente->getfacturas() as $factura) {
			$facturaLogic= new factura_logic($this->connexion);
			$facturaLogic->deepLoad($factura,$isDeep,$deepLoadType,$clases);
		}

		$cliente->setconsignacions($this->clienteDataAccess->getconsignacions($this->connexion,$cliente));

		foreach($cliente->getconsignacions() as $consignacion) {
			$consignacionLogic= new consignacion_logic($this->connexion);
			$consignacionLogic->deepLoad($consignacion,$isDeep,$deepLoadType,$clases);
		}

		$cliente->setlista_clientes($this->clienteDataAccess->getlista_clientes($this->connexion,$cliente));

		foreach($cliente->getlista_clientes() as $listacliente) {
			$listaclienteLogic= new lista_cliente_logic($this->connexion);
			$listaclienteLogic->deepLoad($listacliente,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cliente->setempresa($this->clienteDataAccess->getempresa($this->connexion,$cliente));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($cliente->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_persona::$class.'') {
				$cliente->settipo_persona($this->clienteDataAccess->gettipo_persona($this->connexion,$cliente));
				$tipo_personaLogic= new tipo_persona_logic($this->connexion);
				$tipo_personaLogic->deepLoad($cliente->gettipo_persona(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==categoria_cliente::$class.'') {
				$cliente->setcategoria_cliente($this->clienteDataAccess->getcategoria_cliente($this->connexion,$cliente));
				$categoria_clienteLogic= new categoria_cliente_logic($this->connexion);
				$categoria_clienteLogic->deepLoad($cliente->getcategoria_cliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_precio::$class.'') {
				$cliente->settipo_precio($this->clienteDataAccess->gettipo_precio($this->connexion,$cliente));
				$tipo_precioLogic= new tipo_precio_logic($this->connexion);
				$tipo_precioLogic->deepLoad($cliente->gettipo_precio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==giro_negocio_cliente::$class.'') {
				$cliente->setgiro_negocio_cliente($this->clienteDataAccess->getgiro_negocio_cliente($this->connexion,$cliente));
				$giro_negocio_clienteLogic= new giro_negocio_cliente_logic($this->connexion);
				$giro_negocio_clienteLogic->deepLoad($cliente->getgiro_negocio_cliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==pais::$class.'') {
				$cliente->setpais($this->clienteDataAccess->getpais($this->connexion,$cliente));
				$paisLogic= new pais_logic($this->connexion);
				$paisLogic->deepLoad($cliente->getpais(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==provincia::$class.'') {
				$cliente->setprovincia($this->clienteDataAccess->getprovincia($this->connexion,$cliente));
				$provinciaLogic= new provincia_logic($this->connexion);
				$provinciaLogic->deepLoad($cliente->getprovincia(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ciudad::$class.'') {
				$cliente->setciudad($this->clienteDataAccess->getciudad($this->connexion,$cliente));
				$ciudadLogic= new ciudad_logic($this->connexion);
				$ciudadLogic->deepLoad($cliente->getciudad(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				$cliente->setvendedor($this->clienteDataAccess->getvendedor($this->connexion,$cliente));
				$vendedorLogic= new vendedor_logic($this->connexion);
				$vendedorLogic->deepLoad($cliente->getvendedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				$cliente->settermino_pago_cliente($this->clienteDataAccess->gettermino_pago_cliente($this->connexion,$cliente));
				$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
				$termino_pago_clienteLogic->deepLoad($cliente->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$cliente->setcuenta($this->clienteDataAccess->getcuenta($this->connexion,$cliente));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($cliente->getcuenta(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==impuesto::$class.'') {
				$cliente->setimpuesto($this->clienteDataAccess->getimpuesto($this->connexion,$cliente));
				$impuestoLogic= new impuesto_logic($this->connexion);
				$impuestoLogic->deepLoad($cliente->getimpuesto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==retencion::$class.'') {
				$cliente->setretencion($this->clienteDataAccess->getretencion($this->connexion,$cliente));
				$retencionLogic= new retencion_logic($this->connexion);
				$retencionLogic->deepLoad($cliente->getretencion(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==retencion_fuente::$class.'') {
				$cliente->setretencion_fuente($this->clienteDataAccess->getretencion_fuente($this->connexion,$cliente));
				$retencion_fuenteLogic= new retencion_fuente_logic($this->connexion);
				$retencion_fuenteLogic->deepLoad($cliente->getretencion_fuente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==retencion_ica::$class.'') {
				$cliente->setretencion_ica($this->clienteDataAccess->getretencion_ica($this->connexion,$cliente));
				$retencion_icaLogic= new retencion_ica_logic($this->connexion);
				$retencion_icaLogic->deepLoad($cliente->getretencion_ica(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'') {
				$cliente->setotro_impuesto($this->clienteDataAccess->getotro_impuesto($this->connexion,$cliente));
				$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
				$otro_impuestoLogic->deepLoad($cliente->getotro_impuesto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cliente->setdevolucion_facturas($this->clienteDataAccess->getdevolucion_facturas($this->connexion,$cliente));

				foreach($cliente->getdevolucion_facturas() as $devolucionfactura) {
					$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
					$devolucionfacturaLogic->deepLoad($devolucionfactura,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cliente->setcuenta_cobrars($this->clienteDataAccess->getcuenta_cobrars($this->connexion,$cliente));

				foreach($cliente->getcuenta_cobrars() as $cuentacobrar) {
					$cuentacobrarLogic= new cuenta_cobrar_logic($this->connexion);
					$cuentacobrarLogic->deepLoad($cuentacobrar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==documento_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cliente->setdocumento_clientes($this->clienteDataAccess->getdocumento_clientes($this->connexion,$cliente));

				foreach($cliente->getdocumento_clientes() as $documentocliente) {
					$documentoclienteLogic= new documento_cliente_logic($this->connexion);
					$documentoclienteLogic->deepLoad($documentocliente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cliente->setestimados($this->clienteDataAccess->getestimados($this->connexion,$cliente));

				foreach($cliente->getestimados() as $estimado) {
					$estimadoLogic= new estimado_logic($this->connexion);
					$estimadoLogic->deepLoad($estimado,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==imagen_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cliente->setimagen_clientes($this->clienteDataAccess->getimagen_clientes($this->connexion,$cliente));

				foreach($cliente->getimagen_clientes() as $imagencliente) {
					$imagenclienteLogic= new imagen_cliente_logic($this->connexion);
					$imagenclienteLogic->deepLoad($imagencliente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cliente->setfacturas($this->clienteDataAccess->getfacturas($this->connexion,$cliente));

				foreach($cliente->getfacturas() as $factura) {
					$facturaLogic= new factura_logic($this->connexion);
					$facturaLogic->deepLoad($factura,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cliente->setconsignacions($this->clienteDataAccess->getconsignacions($this->connexion,$cliente));

				foreach($cliente->getconsignacions() as $consignacion) {
					$consignacionLogic= new consignacion_logic($this->connexion);
					$consignacionLogic->deepLoad($consignacion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==lista_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cliente->setlista_clientes($this->clienteDataAccess->getlista_clientes($this->connexion,$cliente));

				foreach($cliente->getlista_clientes() as $listacliente) {
					$listaclienteLogic= new lista_cliente_logic($this->connexion);
					$listaclienteLogic->deepLoad($listacliente,$isDeep,$deepLoadType,$clases);
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
			$cliente->setempresa($this->clienteDataAccess->getempresa($this->connexion,$cliente));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($cliente->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_persona::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->settipo_persona($this->clienteDataAccess->gettipo_persona($this->connexion,$cliente));
			$tipo_personaLogic= new tipo_persona_logic($this->connexion);
			$tipo_personaLogic->deepLoad($cliente->gettipo_persona(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==categoria_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setcategoria_cliente($this->clienteDataAccess->getcategoria_cliente($this->connexion,$cliente));
			$categoria_clienteLogic= new categoria_cliente_logic($this->connexion);
			$categoria_clienteLogic->deepLoad($cliente->getcategoria_cliente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_precio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->settipo_precio($this->clienteDataAccess->gettipo_precio($this->connexion,$cliente));
			$tipo_precioLogic= new tipo_precio_logic($this->connexion);
			$tipo_precioLogic->deepLoad($cliente->gettipo_precio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==giro_negocio_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setgiro_negocio_cliente($this->clienteDataAccess->getgiro_negocio_cliente($this->connexion,$cliente));
			$giro_negocio_clienteLogic= new giro_negocio_cliente_logic($this->connexion);
			$giro_negocio_clienteLogic->deepLoad($cliente->getgiro_negocio_cliente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setpais($this->clienteDataAccess->getpais($this->connexion,$cliente));
			$paisLogic= new pais_logic($this->connexion);
			$paisLogic->deepLoad($cliente->getpais(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==provincia::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setprovincia($this->clienteDataAccess->getprovincia($this->connexion,$cliente));
			$provinciaLogic= new provincia_logic($this->connexion);
			$provinciaLogic->deepLoad($cliente->getprovincia(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setciudad($this->clienteDataAccess->getciudad($this->connexion,$cliente));
			$ciudadLogic= new ciudad_logic($this->connexion);
			$ciudadLogic->deepLoad($cliente->getciudad(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setvendedor($this->clienteDataAccess->getvendedor($this->connexion,$cliente));
			$vendedorLogic= new vendedor_logic($this->connexion);
			$vendedorLogic->deepLoad($cliente->getvendedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->settermino_pago_cliente($this->clienteDataAccess->gettermino_pago_cliente($this->connexion,$cliente));
			$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
			$termino_pago_clienteLogic->deepLoad($cliente->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setcuenta($this->clienteDataAccess->getcuenta($this->connexion,$cliente));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($cliente->getcuenta(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setimpuesto($this->clienteDataAccess->getimpuesto($this->connexion,$cliente));
			$impuestoLogic= new impuesto_logic($this->connexion);
			$impuestoLogic->deepLoad($cliente->getimpuesto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setretencion($this->clienteDataAccess->getretencion($this->connexion,$cliente));
			$retencionLogic= new retencion_logic($this->connexion);
			$retencionLogic->deepLoad($cliente->getretencion(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion_fuente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setretencion_fuente($this->clienteDataAccess->getretencion_fuente($this->connexion,$cliente));
			$retencion_fuenteLogic= new retencion_fuente_logic($this->connexion);
			$retencion_fuenteLogic->deepLoad($cliente->getretencion_fuente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion_ica::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setretencion_ica($this->clienteDataAccess->getretencion_ica($this->connexion,$cliente));
			$retencion_icaLogic= new retencion_ica_logic($this->connexion);
			$retencion_icaLogic->deepLoad($cliente->getretencion_ica(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cliente->setotro_impuesto($this->clienteDataAccess->getotro_impuesto($this->connexion,$cliente));
			$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
			$otro_impuestoLogic->deepLoad($cliente->getotro_impuesto(),$isDeep,$deepLoadType,$clases);
				
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
			$cliente->setdevolucion_facturas($this->clienteDataAccess->getdevolucion_facturas($this->connexion,$cliente));

			foreach($cliente->getdevolucion_facturas() as $devolucionfactura) {
				$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
				$devolucionfacturaLogic->deepLoad($devolucionfactura,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_cobrar::$class);
			$cliente->setcuenta_cobrars($this->clienteDataAccess->getcuenta_cobrars($this->connexion,$cliente));

			foreach($cliente->getcuenta_cobrars() as $cuentacobrar) {
				$cuentacobrarLogic= new cuenta_cobrar_logic($this->connexion);
				$cuentacobrarLogic->deepLoad($cuentacobrar,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(documento_cliente::$class);
			$cliente->setdocumento_clientes($this->clienteDataAccess->getdocumento_clientes($this->connexion,$cliente));

			foreach($cliente->getdocumento_clientes() as $documentocliente) {
				$documentoclienteLogic= new documento_cliente_logic($this->connexion);
				$documentoclienteLogic->deepLoad($documentocliente,$isDeep,$deepLoadType,$clases);
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
			$cliente->setestimados($this->clienteDataAccess->getestimados($this->connexion,$cliente));

			foreach($cliente->getestimados() as $estimado) {
				$estimadoLogic= new estimado_logic($this->connexion);
				$estimadoLogic->deepLoad($estimado,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_cliente::$class);
			$cliente->setimagen_clientes($this->clienteDataAccess->getimagen_clientes($this->connexion,$cliente));

			foreach($cliente->getimagen_clientes() as $imagencliente) {
				$imagenclienteLogic= new imagen_cliente_logic($this->connexion);
				$imagenclienteLogic->deepLoad($imagencliente,$isDeep,$deepLoadType,$clases);
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
			$cliente->setfacturas($this->clienteDataAccess->getfacturas($this->connexion,$cliente));

			foreach($cliente->getfacturas() as $factura) {
				$facturaLogic= new factura_logic($this->connexion);
				$facturaLogic->deepLoad($factura,$isDeep,$deepLoadType,$clases);
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
			$cliente->setconsignacions($this->clienteDataAccess->getconsignacions($this->connexion,$cliente));

			foreach($cliente->getconsignacions() as $consignacion) {
				$consignacionLogic= new consignacion_logic($this->connexion);
				$consignacionLogic->deepLoad($consignacion,$isDeep,$deepLoadType,$clases);
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
			$cliente->setlista_clientes($this->clienteDataAccess->getlista_clientes($this->connexion,$cliente));

			foreach($cliente->getlista_clientes() as $listacliente) {
				$listaclienteLogic= new lista_cliente_logic($this->connexion);
				$listaclienteLogic->deepLoad($listacliente,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(cliente $cliente,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//cliente_logic_add::updateclienteToSave($this->cliente);			
			
			if(!$paraDeleteCascade) {				
				cliente_data::save($cliente, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($cliente->getempresa(),$this->connexion);
		tipo_persona_data::save($cliente->gettipo_persona(),$this->connexion);
		categoria_cliente_data::save($cliente->getcategoria_cliente(),$this->connexion);
		tipo_precio_data::save($cliente->gettipo_precio(),$this->connexion);
		giro_negocio_cliente_data::save($cliente->getgiro_negocio_cliente(),$this->connexion);
		pais_data::save($cliente->getpais(),$this->connexion);
		provincia_data::save($cliente->getprovincia(),$this->connexion);
		ciudad_data::save($cliente->getciudad(),$this->connexion);
		vendedor_data::save($cliente->getvendedor(),$this->connexion);
		termino_pago_cliente_data::save($cliente->gettermino_pago_cliente(),$this->connexion);
		cuenta_data::save($cliente->getcuenta(),$this->connexion);
		impuesto_data::save($cliente->getimpuesto(),$this->connexion);
		retencion_data::save($cliente->getretencion(),$this->connexion);
		retencion_fuente_data::save($cliente->getretencion_fuente(),$this->connexion);
		retencion_ica_data::save($cliente->getretencion_ica(),$this->connexion);
		otro_impuesto_data::save($cliente->getotro_impuesto(),$this->connexion);

		foreach($cliente->getdevolucion_facturas() as $devolucionfactura) {
			$devolucionfactura->setid_cliente($cliente->getId());
			devolucion_factura_data::save($devolucionfactura,$this->connexion);
		}


		foreach($cliente->getcuenta_cobrars() as $cuentacobrar) {
			$cuentacobrar->setid_cliente($cliente->getId());
			cuenta_cobrar_data::save($cuentacobrar,$this->connexion);
		}


		foreach($cliente->getdocumento_clientes() as $documentocliente) {
			$documentocliente->setid_cliente($cliente->getId());
			documento_cliente_data::save($documentocliente,$this->connexion);
		}


		foreach($cliente->getestimados() as $estimado) {
			$estimado->setid_cliente($cliente->getId());
			estimado_data::save($estimado,$this->connexion);
		}


		foreach($cliente->getimagen_clientes() as $imagencliente) {
			$imagencliente->setid_cliente($cliente->getId());
			imagen_cliente_data::save($imagencliente,$this->connexion);
		}


		foreach($cliente->getfacturas() as $factura) {
			$factura->setid_cliente($cliente->getId());
			factura_data::save($factura,$this->connexion);
		}


		foreach($cliente->getconsignacions() as $consignacion) {
			$consignacion->setid_cliente($cliente->getId());
			consignacion_data::save($consignacion,$this->connexion);
		}


		foreach($cliente->getlista_clientes() as $listacliente) {
			$listacliente->setid_cliente($cliente->getId());
			lista_cliente_data::save($listacliente,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cliente->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_persona::$class.'') {
				tipo_persona_data::save($cliente->gettipo_persona(),$this->connexion);
				continue;
			}

			if($clas->clas==categoria_cliente::$class.'') {
				categoria_cliente_data::save($cliente->getcategoria_cliente(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_precio::$class.'') {
				tipo_precio_data::save($cliente->gettipo_precio(),$this->connexion);
				continue;
			}

			if($clas->clas==giro_negocio_cliente::$class.'') {
				giro_negocio_cliente_data::save($cliente->getgiro_negocio_cliente(),$this->connexion);
				continue;
			}

			if($clas->clas==pais::$class.'') {
				pais_data::save($cliente->getpais(),$this->connexion);
				continue;
			}

			if($clas->clas==provincia::$class.'') {
				provincia_data::save($cliente->getprovincia(),$this->connexion);
				continue;
			}

			if($clas->clas==ciudad::$class.'') {
				ciudad_data::save($cliente->getciudad(),$this->connexion);
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				vendedor_data::save($cliente->getvendedor(),$this->connexion);
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				termino_pago_cliente_data::save($cliente->gettermino_pago_cliente(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($cliente->getcuenta(),$this->connexion);
				continue;
			}

			if($clas->clas==impuesto::$class.'') {
				impuesto_data::save($cliente->getimpuesto(),$this->connexion);
				continue;
			}

			if($clas->clas==retencion::$class.'') {
				retencion_data::save($cliente->getretencion(),$this->connexion);
				continue;
			}

			if($clas->clas==retencion_fuente::$class.'') {
				retencion_fuente_data::save($cliente->getretencion_fuente(),$this->connexion);
				continue;
			}

			if($clas->clas==retencion_ica::$class.'') {
				retencion_ica_data::save($cliente->getretencion_ica(),$this->connexion);
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'') {
				otro_impuesto_data::save($cliente->getotro_impuesto(),$this->connexion);
				continue;
			}


			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cliente->getdevolucion_facturas() as $devolucionfactura) {
					$devolucionfactura->setid_cliente($cliente->getId());
					devolucion_factura_data::save($devolucionfactura,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cliente->getcuenta_cobrars() as $cuentacobrar) {
					$cuentacobrar->setid_cliente($cliente->getId());
					cuenta_cobrar_data::save($cuentacobrar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==documento_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cliente->getdocumento_clientes() as $documentocliente) {
					$documentocliente->setid_cliente($cliente->getId());
					documento_cliente_data::save($documentocliente,$this->connexion);
				}

				continue;
			}

			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cliente->getestimados() as $estimado) {
					$estimado->setid_cliente($cliente->getId());
					estimado_data::save($estimado,$this->connexion);
				}

				continue;
			}

			if($clas->clas==imagen_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cliente->getimagen_clientes() as $imagencliente) {
					$imagencliente->setid_cliente($cliente->getId());
					imagen_cliente_data::save($imagencliente,$this->connexion);
				}

				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cliente->getfacturas() as $factura) {
					$factura->setid_cliente($cliente->getId());
					factura_data::save($factura,$this->connexion);
				}

				continue;
			}

			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cliente->getconsignacions() as $consignacion) {
					$consignacion->setid_cliente($cliente->getId());
					consignacion_data::save($consignacion,$this->connexion);
				}

				continue;
			}

			if($clas->clas==lista_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cliente->getlista_clientes() as $listacliente) {
					$listacliente->setid_cliente($cliente->getId());
					lista_cliente_data::save($listacliente,$this->connexion);
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
			empresa_data::save($cliente->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_persona::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_persona_data::save($cliente->gettipo_persona(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==categoria_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			categoria_cliente_data::save($cliente->getcategoria_cliente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_precio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_precio_data::save($cliente->gettipo_precio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==giro_negocio_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			giro_negocio_cliente_data::save($cliente->getgiro_negocio_cliente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			pais_data::save($cliente->getpais(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==provincia::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			provincia_data::save($cliente->getprovincia(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ciudad_data::save($cliente->getciudad(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			vendedor_data::save($cliente->getvendedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_cliente_data::save($cliente->gettermino_pago_cliente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($cliente->getcuenta(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			impuesto_data::save($cliente->getimpuesto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			retencion_data::save($cliente->getretencion(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion_fuente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			retencion_fuente_data::save($cliente->getretencion_fuente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion_ica::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			retencion_ica_data::save($cliente->getretencion_ica(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			otro_impuesto_data::save($cliente->getotro_impuesto(),$this->connexion);
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

			foreach($cliente->getdevolucion_facturas() as $devolucionfactura) {
				$devolucionfactura->setid_cliente($cliente->getId());
				devolucion_factura_data::save($devolucionfactura,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_cobrar::$class);

			foreach($cliente->getcuenta_cobrars() as $cuentacobrar) {
				$cuentacobrar->setid_cliente($cliente->getId());
				cuenta_cobrar_data::save($cuentacobrar,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(documento_cliente::$class);

			foreach($cliente->getdocumento_clientes() as $documentocliente) {
				$documentocliente->setid_cliente($cliente->getId());
				documento_cliente_data::save($documentocliente,$this->connexion);
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

			foreach($cliente->getestimados() as $estimado) {
				$estimado->setid_cliente($cliente->getId());
				estimado_data::save($estimado,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_cliente::$class);

			foreach($cliente->getimagen_clientes() as $imagencliente) {
				$imagencliente->setid_cliente($cliente->getId());
				imagen_cliente_data::save($imagencliente,$this->connexion);
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

			foreach($cliente->getfacturas() as $factura) {
				$factura->setid_cliente($cliente->getId());
				factura_data::save($factura,$this->connexion);
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

			foreach($cliente->getconsignacions() as $consignacion) {
				$consignacion->setid_cliente($cliente->getId());
				consignacion_data::save($consignacion,$this->connexion);
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

			foreach($cliente->getlista_clientes() as $listacliente) {
				$listacliente->setid_cliente($cliente->getId());
				lista_cliente_data::save($listacliente,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($cliente->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($cliente->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_persona_data::save($cliente->gettipo_persona(),$this->connexion);
		$tipo_personaLogic= new tipo_persona_logic($this->connexion);
		$tipo_personaLogic->deepSave($cliente->gettipo_persona(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		categoria_cliente_data::save($cliente->getcategoria_cliente(),$this->connexion);
		$categoria_clienteLogic= new categoria_cliente_logic($this->connexion);
		$categoria_clienteLogic->deepSave($cliente->getcategoria_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_precio_data::save($cliente->gettipo_precio(),$this->connexion);
		$tipo_precioLogic= new tipo_precio_logic($this->connexion);
		$tipo_precioLogic->deepSave($cliente->gettipo_precio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		giro_negocio_cliente_data::save($cliente->getgiro_negocio_cliente(),$this->connexion);
		$giro_negocio_clienteLogic= new giro_negocio_cliente_logic($this->connexion);
		$giro_negocio_clienteLogic->deepSave($cliente->getgiro_negocio_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		pais_data::save($cliente->getpais(),$this->connexion);
		$paisLogic= new pais_logic($this->connexion);
		$paisLogic->deepSave($cliente->getpais(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		provincia_data::save($cliente->getprovincia(),$this->connexion);
		$provinciaLogic= new provincia_logic($this->connexion);
		$provinciaLogic->deepSave($cliente->getprovincia(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ciudad_data::save($cliente->getciudad(),$this->connexion);
		$ciudadLogic= new ciudad_logic($this->connexion);
		$ciudadLogic->deepSave($cliente->getciudad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		vendedor_data::save($cliente->getvendedor(),$this->connexion);
		$vendedorLogic= new vendedor_logic($this->connexion);
		$vendedorLogic->deepSave($cliente->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		termino_pago_cliente_data::save($cliente->gettermino_pago_cliente(),$this->connexion);
		$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
		$termino_pago_clienteLogic->deepSave($cliente->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($cliente->getcuenta(),$this->connexion);
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepSave($cliente->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		impuesto_data::save($cliente->getimpuesto(),$this->connexion);
		$impuestoLogic= new impuesto_logic($this->connexion);
		$impuestoLogic->deepSave($cliente->getimpuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		retencion_data::save($cliente->getretencion(),$this->connexion);
		$retencionLogic= new retencion_logic($this->connexion);
		$retencionLogic->deepSave($cliente->getretencion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		retencion_fuente_data::save($cliente->getretencion_fuente(),$this->connexion);
		$retencion_fuenteLogic= new retencion_fuente_logic($this->connexion);
		$retencion_fuenteLogic->deepSave($cliente->getretencion_fuente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		retencion_ica_data::save($cliente->getretencion_ica(),$this->connexion);
		$retencion_icaLogic= new retencion_ica_logic($this->connexion);
		$retencion_icaLogic->deepSave($cliente->getretencion_ica(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		otro_impuesto_data::save($cliente->getotro_impuesto(),$this->connexion);
		$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
		$otro_impuestoLogic->deepSave($cliente->getotro_impuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($cliente->getdevolucion_facturas() as $devolucionfactura) {
			$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
			$devolucionfactura->setid_cliente($cliente->getId());
			devolucion_factura_data::save($devolucionfactura,$this->connexion);
			$devolucionfacturaLogic->deepSave($devolucionfactura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cliente->getcuenta_cobrars() as $cuentacobrar) {
			$cuentacobrarLogic= new cuenta_cobrar_logic($this->connexion);
			$cuentacobrar->setid_cliente($cliente->getId());
			cuenta_cobrar_data::save($cuentacobrar,$this->connexion);
			$cuentacobrarLogic->deepSave($cuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cliente->getdocumento_clientes() as $documentocliente) {
			$documentoclienteLogic= new documento_cliente_logic($this->connexion);
			$documentocliente->setid_cliente($cliente->getId());
			documento_cliente_data::save($documentocliente,$this->connexion);
			$documentoclienteLogic->deepSave($documentocliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cliente->getestimados() as $estimado) {
			$estimadoLogic= new estimado_logic($this->connexion);
			$estimado->setid_cliente($cliente->getId());
			estimado_data::save($estimado,$this->connexion);
			$estimadoLogic->deepSave($estimado,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cliente->getimagen_clientes() as $imagencliente) {
			$imagenclienteLogic= new imagen_cliente_logic($this->connexion);
			$imagencliente->setid_cliente($cliente->getId());
			imagen_cliente_data::save($imagencliente,$this->connexion);
			$imagenclienteLogic->deepSave($imagencliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cliente->getfacturas() as $factura) {
			$facturaLogic= new factura_logic($this->connexion);
			$factura->setid_cliente($cliente->getId());
			factura_data::save($factura,$this->connexion);
			$facturaLogic->deepSave($factura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cliente->getconsignacions() as $consignacion) {
			$consignacionLogic= new consignacion_logic($this->connexion);
			$consignacion->setid_cliente($cliente->getId());
			consignacion_data::save($consignacion,$this->connexion);
			$consignacionLogic->deepSave($consignacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($cliente->getlista_clientes() as $listacliente) {
			$listaclienteLogic= new lista_cliente_logic($this->connexion);
			$listacliente->setid_cliente($cliente->getId());
			lista_cliente_data::save($listacliente,$this->connexion);
			$listaclienteLogic->deepSave($listacliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cliente->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($cliente->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_persona::$class.'') {
				tipo_persona_data::save($cliente->gettipo_persona(),$this->connexion);
				$tipo_personaLogic= new tipo_persona_logic($this->connexion);
				$tipo_personaLogic->deepSave($cliente->gettipo_persona(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==categoria_cliente::$class.'') {
				categoria_cliente_data::save($cliente->getcategoria_cliente(),$this->connexion);
				$categoria_clienteLogic= new categoria_cliente_logic($this->connexion);
				$categoria_clienteLogic->deepSave($cliente->getcategoria_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_precio::$class.'') {
				tipo_precio_data::save($cliente->gettipo_precio(),$this->connexion);
				$tipo_precioLogic= new tipo_precio_logic($this->connexion);
				$tipo_precioLogic->deepSave($cliente->gettipo_precio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==giro_negocio_cliente::$class.'') {
				giro_negocio_cliente_data::save($cliente->getgiro_negocio_cliente(),$this->connexion);
				$giro_negocio_clienteLogic= new giro_negocio_cliente_logic($this->connexion);
				$giro_negocio_clienteLogic->deepSave($cliente->getgiro_negocio_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==pais::$class.'') {
				pais_data::save($cliente->getpais(),$this->connexion);
				$paisLogic= new pais_logic($this->connexion);
				$paisLogic->deepSave($cliente->getpais(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==provincia::$class.'') {
				provincia_data::save($cliente->getprovincia(),$this->connexion);
				$provinciaLogic= new provincia_logic($this->connexion);
				$provinciaLogic->deepSave($cliente->getprovincia(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ciudad::$class.'') {
				ciudad_data::save($cliente->getciudad(),$this->connexion);
				$ciudadLogic= new ciudad_logic($this->connexion);
				$ciudadLogic->deepSave($cliente->getciudad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				vendedor_data::save($cliente->getvendedor(),$this->connexion);
				$vendedorLogic= new vendedor_logic($this->connexion);
				$vendedorLogic->deepSave($cliente->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				termino_pago_cliente_data::save($cliente->gettermino_pago_cliente(),$this->connexion);
				$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
				$termino_pago_clienteLogic->deepSave($cliente->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($cliente->getcuenta(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($cliente->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==impuesto::$class.'') {
				impuesto_data::save($cliente->getimpuesto(),$this->connexion);
				$impuestoLogic= new impuesto_logic($this->connexion);
				$impuestoLogic->deepSave($cliente->getimpuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==retencion::$class.'') {
				retencion_data::save($cliente->getretencion(),$this->connexion);
				$retencionLogic= new retencion_logic($this->connexion);
				$retencionLogic->deepSave($cliente->getretencion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==retencion_fuente::$class.'') {
				retencion_fuente_data::save($cliente->getretencion_fuente(),$this->connexion);
				$retencion_fuenteLogic= new retencion_fuente_logic($this->connexion);
				$retencion_fuenteLogic->deepSave($cliente->getretencion_fuente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==retencion_ica::$class.'') {
				retencion_ica_data::save($cliente->getretencion_ica(),$this->connexion);
				$retencion_icaLogic= new retencion_ica_logic($this->connexion);
				$retencion_icaLogic->deepSave($cliente->getretencion_ica(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'') {
				otro_impuesto_data::save($cliente->getotro_impuesto(),$this->connexion);
				$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
				$otro_impuestoLogic->deepSave($cliente->getotro_impuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cliente->getdevolucion_facturas() as $devolucionfactura) {
					$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
					$devolucionfactura->setid_cliente($cliente->getId());
					devolucion_factura_data::save($devolucionfactura,$this->connexion);
					$devolucionfacturaLogic->deepSave($devolucionfactura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cliente->getcuenta_cobrars() as $cuentacobrar) {
					$cuentacobrarLogic= new cuenta_cobrar_logic($this->connexion);
					$cuentacobrar->setid_cliente($cliente->getId());
					cuenta_cobrar_data::save($cuentacobrar,$this->connexion);
					$cuentacobrarLogic->deepSave($cuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==documento_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cliente->getdocumento_clientes() as $documentocliente) {
					$documentoclienteLogic= new documento_cliente_logic($this->connexion);
					$documentocliente->setid_cliente($cliente->getId());
					documento_cliente_data::save($documentocliente,$this->connexion);
					$documentoclienteLogic->deepSave($documentocliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cliente->getestimados() as $estimado) {
					$estimadoLogic= new estimado_logic($this->connexion);
					$estimado->setid_cliente($cliente->getId());
					estimado_data::save($estimado,$this->connexion);
					$estimadoLogic->deepSave($estimado,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==imagen_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cliente->getimagen_clientes() as $imagencliente) {
					$imagenclienteLogic= new imagen_cliente_logic($this->connexion);
					$imagencliente->setid_cliente($cliente->getId());
					imagen_cliente_data::save($imagencliente,$this->connexion);
					$imagenclienteLogic->deepSave($imagencliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cliente->getfacturas() as $factura) {
					$facturaLogic= new factura_logic($this->connexion);
					$factura->setid_cliente($cliente->getId());
					factura_data::save($factura,$this->connexion);
					$facturaLogic->deepSave($factura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cliente->getconsignacions() as $consignacion) {
					$consignacionLogic= new consignacion_logic($this->connexion);
					$consignacion->setid_cliente($cliente->getId());
					consignacion_data::save($consignacion,$this->connexion);
					$consignacionLogic->deepSave($consignacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==lista_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cliente->getlista_clientes() as $listacliente) {
					$listaclienteLogic= new lista_cliente_logic($this->connexion);
					$listacliente->setid_cliente($cliente->getId());
					lista_cliente_data::save($listacliente,$this->connexion);
					$listaclienteLogic->deepSave($listacliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($cliente->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($cliente->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_persona::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_persona_data::save($cliente->gettipo_persona(),$this->connexion);
			$tipo_personaLogic= new tipo_persona_logic($this->connexion);
			$tipo_personaLogic->deepSave($cliente->gettipo_persona(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==categoria_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			categoria_cliente_data::save($cliente->getcategoria_cliente(),$this->connexion);
			$categoria_clienteLogic= new categoria_cliente_logic($this->connexion);
			$categoria_clienteLogic->deepSave($cliente->getcategoria_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_precio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_precio_data::save($cliente->gettipo_precio(),$this->connexion);
			$tipo_precioLogic= new tipo_precio_logic($this->connexion);
			$tipo_precioLogic->deepSave($cliente->gettipo_precio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==giro_negocio_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			giro_negocio_cliente_data::save($cliente->getgiro_negocio_cliente(),$this->connexion);
			$giro_negocio_clienteLogic= new giro_negocio_cliente_logic($this->connexion);
			$giro_negocio_clienteLogic->deepSave($cliente->getgiro_negocio_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			pais_data::save($cliente->getpais(),$this->connexion);
			$paisLogic= new pais_logic($this->connexion);
			$paisLogic->deepSave($cliente->getpais(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==provincia::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			provincia_data::save($cliente->getprovincia(),$this->connexion);
			$provinciaLogic= new provincia_logic($this->connexion);
			$provinciaLogic->deepSave($cliente->getprovincia(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ciudad_data::save($cliente->getciudad(),$this->connexion);
			$ciudadLogic= new ciudad_logic($this->connexion);
			$ciudadLogic->deepSave($cliente->getciudad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			vendedor_data::save($cliente->getvendedor(),$this->connexion);
			$vendedorLogic= new vendedor_logic($this->connexion);
			$vendedorLogic->deepSave($cliente->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_cliente_data::save($cliente->gettermino_pago_cliente(),$this->connexion);
			$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
			$termino_pago_clienteLogic->deepSave($cliente->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($cliente->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($cliente->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			impuesto_data::save($cliente->getimpuesto(),$this->connexion);
			$impuestoLogic= new impuesto_logic($this->connexion);
			$impuestoLogic->deepSave($cliente->getimpuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			retencion_data::save($cliente->getretencion(),$this->connexion);
			$retencionLogic= new retencion_logic($this->connexion);
			$retencionLogic->deepSave($cliente->getretencion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion_fuente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			retencion_fuente_data::save($cliente->getretencion_fuente(),$this->connexion);
			$retencion_fuenteLogic= new retencion_fuente_logic($this->connexion);
			$retencion_fuenteLogic->deepSave($cliente->getretencion_fuente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion_ica::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			retencion_ica_data::save($cliente->getretencion_ica(),$this->connexion);
			$retencion_icaLogic= new retencion_ica_logic($this->connexion);
			$retencion_icaLogic->deepSave($cliente->getretencion_ica(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			otro_impuesto_data::save($cliente->getotro_impuesto(),$this->connexion);
			$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
			$otro_impuestoLogic->deepSave($cliente->getotro_impuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
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

			foreach($cliente->getdevolucion_facturas() as $devolucionfactura) {
				$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
				$devolucionfactura->setid_cliente($cliente->getId());
				devolucion_factura_data::save($devolucionfactura,$this->connexion);
				$devolucionfacturaLogic->deepSave($devolucionfactura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_cobrar::$class);

			foreach($cliente->getcuenta_cobrars() as $cuentacobrar) {
				$cuentacobrarLogic= new cuenta_cobrar_logic($this->connexion);
				$cuentacobrar->setid_cliente($cliente->getId());
				cuenta_cobrar_data::save($cuentacobrar,$this->connexion);
				$cuentacobrarLogic->deepSave($cuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(documento_cliente::$class);

			foreach($cliente->getdocumento_clientes() as $documentocliente) {
				$documentoclienteLogic= new documento_cliente_logic($this->connexion);
				$documentocliente->setid_cliente($cliente->getId());
				documento_cliente_data::save($documentocliente,$this->connexion);
				$documentoclienteLogic->deepSave($documentocliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($cliente->getestimados() as $estimado) {
				$estimadoLogic= new estimado_logic($this->connexion);
				$estimado->setid_cliente($cliente->getId());
				estimado_data::save($estimado,$this->connexion);
				$estimadoLogic->deepSave($estimado,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_cliente::$class);

			foreach($cliente->getimagen_clientes() as $imagencliente) {
				$imagenclienteLogic= new imagen_cliente_logic($this->connexion);
				$imagencliente->setid_cliente($cliente->getId());
				imagen_cliente_data::save($imagencliente,$this->connexion);
				$imagenclienteLogic->deepSave($imagencliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($cliente->getfacturas() as $factura) {
				$facturaLogic= new factura_logic($this->connexion);
				$factura->setid_cliente($cliente->getId());
				factura_data::save($factura,$this->connexion);
				$facturaLogic->deepSave($factura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($cliente->getconsignacions() as $consignacion) {
				$consignacionLogic= new consignacion_logic($this->connexion);
				$consignacion->setid_cliente($cliente->getId());
				consignacion_data::save($consignacion,$this->connexion);
				$consignacionLogic->deepSave($consignacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($cliente->getlista_clientes() as $listacliente) {
				$listaclienteLogic= new lista_cliente_logic($this->connexion);
				$listacliente->setid_cliente($cliente->getId());
				lista_cliente_data::save($listacliente,$this->connexion);
				$listaclienteLogic->deepSave($listacliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				cliente_data::save($cliente, $this->connexion);
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
			
			$this->deepLoad($this->cliente,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->clientes as $cliente) {
				$this->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
								
				cliente_util::refrescarFKDescripciones($this->clientes);
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
			
			foreach($this->clientes as $cliente) {
				$this->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->cliente,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->clientes as $cliente) {
				$this->deepSave($cliente,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->clientes as $cliente) {
				$this->deepSave($cliente,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(tipo_persona::$class);
				$classes[]=new Classe(categoria_cliente::$class);
				$classes[]=new Classe(tipo_precio::$class);
				$classes[]=new Classe(giro_negocio_cliente::$class);
				$classes[]=new Classe(pais::$class);
				$classes[]=new Classe(provincia::$class);
				$classes[]=new Classe(ciudad::$class);
				$classes[]=new Classe(vendedor::$class);
				$classes[]=new Classe(termino_pago_cliente::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(impuesto::$class);
				$classes[]=new Classe(retencion::$class);
				$classes[]=new Classe(retencion_fuente::$class);
				$classes[]=new Classe(retencion_ica::$class);
				$classes[]=new Classe(otro_impuesto::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==tipo_persona::$class) {
						$classes[]=new Classe(tipo_persona::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==categoria_cliente::$class) {
						$classes[]=new Classe(categoria_cliente::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==tipo_precio::$class) {
						$classes[]=new Classe(tipo_precio::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==giro_negocio_cliente::$class) {
						$classes[]=new Classe(giro_negocio_cliente::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==pais::$class) {
						$classes[]=new Classe(pais::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==provincia::$class) {
						$classes[]=new Classe(provincia::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==ciudad::$class) {
						$classes[]=new Classe(ciudad::$class);
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
					if($clas->clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
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
					if($clas->clas==retencion::$class) {
						$classes[]=new Classe(retencion::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==retencion_fuente::$class) {
						$classes[]=new Classe(retencion_fuente::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==retencion_ica::$class) {
						$classes[]=new Classe(retencion_ica::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==otro_impuesto::$class) {
						$classes[]=new Classe(otro_impuesto::$class);
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
					if($clas->clas==tipo_persona::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_persona::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==categoria_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(categoria_cliente::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==tipo_precio::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_precio::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==giro_negocio_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(giro_negocio_cliente::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==pais::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(pais::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==provincia::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(provincia::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==ciudad::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(ciudad::$class);
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
					if($clas->clas==retencion_fuente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(retencion_fuente::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==retencion_ica::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(retencion_ica::$class);
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
				
				$classes[]=new Classe(devolucion_factura::$class);
				$classes[]=new Classe(cuenta_cobrar::$class);
				$classes[]=new Classe(documento_cliente::$class);
				$classes[]=new Classe(estimado::$class);
				$classes[]=new Classe(imagen_cliente::$class);
				$classes[]=new Classe(factura::$class);
				$classes[]=new Classe(consignacion::$class);
				$classes[]=new Classe(lista_cliente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==devolucion_factura::$class) {
						$classes[]=new Classe(devolucion_factura::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==cuenta_cobrar::$class) {
						$classes[]=new Classe(cuenta_cobrar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==documento_cliente::$class) {
						$classes[]=new Classe(documento_cliente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==estimado::$class) {
						$classes[]=new Classe(estimado::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==imagen_cliente::$class) {
						$classes[]=new Classe(imagen_cliente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==factura::$class) {
						$classes[]=new Classe(factura::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==consignacion::$class) {
						$classes[]=new Classe(consignacion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==lista_cliente::$class) {
						$classes[]=new Classe(lista_cliente::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

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
					if($clas->clas==cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_cobrar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==documento_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(documento_cliente::$class);
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
					if($clas->clas==imagen_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(imagen_cliente::$class);
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
					if($clas->clas==lista_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(lista_cliente::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getcliente() : ?cliente {	
		/*
		cliente_logic_add::checkclienteToGet($this->cliente,$this->datosCliente);
		cliente_logic_add::updateclienteToGet($this->cliente);
		*/
			
		return $this->cliente;
	}
		
	public function setcliente(cliente $newcliente) {
		$this->cliente = $newcliente;
	}
	
	public function getclientes() : array {		
		/*
		cliente_logic_add::checkclienteToGets($this->clientes,$this->datosCliente);
		
		foreach ($this->clientes as $clienteLocal ) {
			cliente_logic_add::updateclienteToGet($clienteLocal);
		}
		*/
		
		return $this->clientes;
	}
	
	public function setclientes(array $newclientes) {
		$this->clientes = $newclientes;
	}
	
	public function getclienteDataAccess() : cliente_data {
		return $this->clienteDataAccess;
	}
	
	public function setclienteDataAccess(cliente_data $newclienteDataAccess) {
		$this->clienteDataAccess = $newclienteDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        cliente_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		devolucion_factura_detalle_logic::$logger;
		debito_cuenta_cobrar_logic::$logger;
		pago_cuenta_cobrar_logic::$logger;
		credito_cuenta_cobrar_logic::$logger;
		imagen_estimado_logic::$logger;
		estimado_detalle_logic::$logger;
		factura_detalle_logic::$logger;
		imagen_consignacion_logic::$logger;
		consignacion_detalle_logic::$logger;
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
