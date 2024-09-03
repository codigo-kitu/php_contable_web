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

namespace com\bydan\contabilidad\cuentaspagar\proveedor\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_param_return;

use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;

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

use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\tipo_persona\business\entity\tipo_persona;
use com\bydan\contabilidad\general\tipo_persona\business\data\tipo_persona_data;
use com\bydan\contabilidad\general\tipo_persona\business\logic\tipo_persona_logic;
use com\bydan\contabilidad\general\tipo_persona\util\tipo_persona_util;

use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\business\entity\categoria_proveedor;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\business\data\categoria_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\business\logic\categoria_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\util\categoria_proveedor_util;

use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\business\entity\giro_negocio_proveedor;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\business\data\giro_negocio_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\business\logic\giro_negocio_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\util\giro_negocio_proveedor_util;

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

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\data\termino_pago_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;

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


use com\bydan\contabilidad\inventario\lista_precio\business\entity\lista_precio;
use com\bydan\contabilidad\inventario\lista_precio\business\data\lista_precio_data;
use com\bydan\contabilidad\inventario\lista_precio\business\logic\lista_precio_logic;
use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_carga;
use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_util;

use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;
use com\bydan\contabilidad\inventario\orden_compra\business\data\orden_compra_data;
use com\bydan\contabilidad\inventario\orden_compra\business\logic\orden_compra_logic;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\data\cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\logic\cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;

use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\business\entity\imagen_proveedor;
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\business\data\imagen_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\business\logic\imagen_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\util\imagen_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\util\imagen_proveedor_util;

use com\bydan\contabilidad\cuentaspagar\documento_proveedor\business\entity\documento_proveedor;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\business\data\documento_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\business\logic\documento_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_util;

use com\bydan\contabilidad\inventario\otro_suplidor\business\entity\otro_suplidor;
use com\bydan\contabilidad\inventario\otro_suplidor\business\data\otro_suplidor_data;
use com\bydan\contabilidad\inventario\otro_suplidor\business\logic\otro_suplidor_logic;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_carga;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_util;

//REL DETALLES

use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_carga;
use com\bydan\contabilidad\inventario\orden_compra_detalle\business\logic\orden_compra_detalle_logic;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\business\logic\documento_cliente_logic;
use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_carga;
use com\bydan\contabilidad\inventario\cotizacion_detalle\business\logic\cotizacion_detalle_logic;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
use com\bydan\contabilidad\inventario\lista_producto\business\logic\lista_producto_logic;



class proveedor_logic  extends GeneralEntityLogic implements proveedor_logicI {	
	/*GENERAL*/
	public proveedor_data $proveedorDataAccess;
	//public ?proveedor_logic_add $proveedorLogicAdditional=null;
	public ?proveedor $proveedor;
	public array $proveedors;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->proveedorDataAccess = new proveedor_data();			
			$this->proveedors = array();
			$this->proveedor = new proveedor();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->proveedorLogicAdditional = new proveedor_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->proveedorLogicAdditional==null) {
		//	$this->proveedorLogicAdditional=new proveedor_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->proveedorDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->proveedorDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->proveedorDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->proveedorDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->proveedors = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->proveedors);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->proveedors = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->proveedors);
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
		$this->proveedor = new proveedor();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->proveedor=$this->proveedorDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				proveedor_util::refrescarFKDescripcion($this->proveedor);
			}
						
			//proveedor_logic_add::checkproveedorToGet($this->proveedor,$this->datosCliente);
			//proveedor_logic_add::updateproveedorToGet($this->proveedor);
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
		$this->proveedor = new  proveedor();
		  		  
        try {		
			$this->proveedor=$this->proveedorDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				proveedor_util::refrescarFKDescripcion($this->proveedor);
			}
			
			//proveedor_logic_add::checkproveedorToGet($this->proveedor,$this->datosCliente);
			//proveedor_logic_add::updateproveedorToGet($this->proveedor);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?proveedor {
		$proveedorLogic = new  proveedor_logic();
		  		  
        try {		
			$proveedorLogic->setConnexion($connexion);			
			$proveedorLogic->getEntity($id);			
			return $proveedorLogic->getproveedor();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->proveedor = new  proveedor();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->proveedor=$this->proveedorDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				proveedor_util::refrescarFKDescripcion($this->proveedor);
			}
			
			//proveedor_logic_add::checkproveedorToGet($this->proveedor,$this->datosCliente);
			//proveedor_logic_add::updateproveedorToGet($this->proveedor);
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
		$this->proveedor = new  proveedor();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->proveedor=$this->proveedorDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				proveedor_util::refrescarFKDescripcion($this->proveedor);
			}
			
			//proveedor_logic_add::checkproveedorToGet($this->proveedor,$this->datosCliente);
			//proveedor_logic_add::updateproveedorToGet($this->proveedor);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?proveedor {
		$proveedorLogic = new  proveedor_logic();
		  		  
        try {		
			$proveedorLogic->setConnexion($connexion);			
			$proveedorLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $proveedorLogic->getproveedor();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->proveedors);			
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
		$this->proveedors = array();
		  		  
        try {			
			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->proveedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->proveedors);
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
		$this->proveedors = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->proveedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$proveedorLogic = new  proveedor_logic();
		  		  
        try {		
			$proveedorLogic->setConnexion($connexion);			
			$proveedorLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $proveedorLogic->getproveedors();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->proveedors=$this->proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->proveedors);
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
		$this->proveedors = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->proveedors=$this->proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->proveedors);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->proveedors=$this->proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->proveedors);
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
		$this->proveedors = array();
		  		  
        try {			
			$this->proveedors=$this->proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}	
			
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->proveedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->proveedors = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->proveedors=$this->proveedorDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->proveedors);
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
		$this->proveedors = array();
		  		  
        try {		
			$this->proveedors=$this->proveedorDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->proveedors);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_Idcategoria_proveedorWithConnection(string $strFinalQuery,Pagination $pagination,int $id_categoria_proveedor) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_categoria_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_categoria_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_categoria_proveedor,proveedor_util::$ID_CATEGORIA_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_categoria_proveedor);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcategoria_proveedor(string $strFinalQuery,Pagination $pagination,int $id_categoria_proveedor) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_categoria_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_categoria_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_categoria_proveedor,proveedor_util::$ID_CATEGORIA_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_categoria_proveedor);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);
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
			$parameterSelectionGeneralid_ciudad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ciudad,proveedor_util::$ID_CIUDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ciudad);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);

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
			$parameterSelectionGeneralid_ciudad->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ciudad,proveedor_util::$ID_CIUDAD,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ciudad);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);
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
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,proveedor_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);

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
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,proveedor_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,proveedor_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,proveedor_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idgiro_negocio_proveedorWithConnection(string $strFinalQuery,Pagination $pagination,int $id_giro_negocio_proveedor) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_giro_negocio_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_giro_negocio_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_giro_negocio_proveedor,proveedor_util::$ID_GIRO_NEGOCIO_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_giro_negocio_proveedor);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idgiro_negocio_proveedor(string $strFinalQuery,Pagination $pagination,int $id_giro_negocio_proveedor) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_giro_negocio_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_giro_negocio_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_giro_negocio_proveedor,proveedor_util::$ID_GIRO_NEGOCIO_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_giro_negocio_proveedor);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);
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
			$parameterSelectionGeneralid_impuesto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_impuesto,proveedor_util::$ID_IMPUESTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_impuesto);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);

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
			$parameterSelectionGeneralid_impuesto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_impuesto,proveedor_util::$ID_IMPUESTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_impuesto);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);
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
			$parameterSelectionGeneralid_otro_impuesto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_otro_impuesto,proveedor_util::$ID_OTRO_IMPUESTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_otro_impuesto);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);

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
			$parameterSelectionGeneralid_otro_impuesto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_otro_impuesto,proveedor_util::$ID_OTRO_IMPUESTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_otro_impuesto);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);
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
			$parameterSelectionGeneralid_pais->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_pais,proveedor_util::$ID_PAIS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_pais);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);

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
			$parameterSelectionGeneralid_pais->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_pais,proveedor_util::$ID_PAIS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_pais);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);
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
			$parameterSelectionGeneralid_provincia->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_provincia,proveedor_util::$ID_PROVINCIA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_provincia);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);

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
			$parameterSelectionGeneralid_provincia->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_provincia,proveedor_util::$ID_PROVINCIA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_provincia);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);
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
			$parameterSelectionGeneralid_retencion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_retencion,proveedor_util::$ID_RETENCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_retencion);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);

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
			$parameterSelectionGeneralid_retencion->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_retencion,proveedor_util::$ID_RETENCION,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_retencion);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);
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
			$parameterSelectionGeneralid_retencion_fuente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_retencion_fuente,proveedor_util::$ID_RETENCION_FUENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_retencion_fuente);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);

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
			$parameterSelectionGeneralid_retencion_fuente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_retencion_fuente,proveedor_util::$ID_RETENCION_FUENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_retencion_fuente);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);
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
			$parameterSelectionGeneralid_retencion_ica->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_retencion_ica,proveedor_util::$ID_RETENCION_ICA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_retencion_ica);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);

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
			$parameterSelectionGeneralid_retencion_ica->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_retencion_ica,proveedor_util::$ID_RETENCION_ICA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_retencion_ica);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtermino_pago_proveedorWithConnection(string $strFinalQuery,Pagination $pagination,int $id_termino_pago_proveedor) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_termino_pago_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_termino_pago_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_proveedor,proveedor_util::$ID_TERMINO_PAGO_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_proveedor);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtermino_pago_proveedor(string $strFinalQuery,Pagination $pagination,int $id_termino_pago_proveedor) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_termino_pago_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_termino_pago_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_proveedor,proveedor_util::$ID_TERMINO_PAGO_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_proveedor);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);
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
			$parameterSelectionGeneralid_tipo_persona->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_persona,proveedor_util::$ID_TIPO_PERSONA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_persona);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);

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
			$parameterSelectionGeneralid_tipo_persona->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_persona,proveedor_util::$ID_TIPO_PERSONA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_persona);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);
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
			$parameterSelectionGeneralid_vendedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_vendedor,proveedor_util::$ID_VENDEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_vendedor);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);

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
			$parameterSelectionGeneralid_vendedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_vendedor,proveedor_util::$ID_VENDEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_vendedor);

			$this->proveedors=$this->proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			//proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->proveedors);
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
						
			//proveedor_logic_add::checkproveedorToSave($this->proveedor,$this->datosCliente,$this->connexion);	       
			//proveedor_logic_add::updateproveedorToSave($this->proveedor);			
			proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->proveedor,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->proveedorLogicAdditional->checkGeneralEntityToSave($this,$this->proveedor,$this->datosCliente,$this->connexion);
			
			
			proveedor_data::save($this->proveedor, $this->connexion);	    	       	 				
			//proveedor_logic_add::checkproveedorToSaveAfter($this->proveedor,$this->datosCliente,$this->connexion);			
			//$this->proveedorLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->proveedor,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				proveedor_util::refrescarFKDescripcion($this->proveedor);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->proveedor->getIsDeleted()) {
				$this->proveedor=null;
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
						
			/*proveedor_logic_add::checkproveedorToSave($this->proveedor,$this->datosCliente,$this->connexion);*/	        
			//proveedor_logic_add::updateproveedorToSave($this->proveedor);			
			//$this->proveedorLogicAdditional->checkGeneralEntityToSave($this,$this->proveedor,$this->datosCliente,$this->connexion);			
			proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->proveedor,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			proveedor_data::save($this->proveedor, $this->connexion);	    	       	 						
			/*proveedor_logic_add::checkproveedorToSaveAfter($this->proveedor,$this->datosCliente,$this->connexion);*/			
			//$this->proveedorLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->proveedor,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				proveedor_util::refrescarFKDescripcion($this->proveedor);				
			}
			
			if($this->proveedor->getIsDeleted()) {
				$this->proveedor=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(proveedor $proveedor,Connexion $connexion)  {
		$proveedorLogic = new  proveedor_logic();		  		  
        try {		
			$proveedorLogic->setConnexion($connexion);			
			$proveedorLogic->setproveedor($proveedor);			
			$proveedorLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*proveedor_logic_add::checkproveedorToSaves($this->proveedors,$this->datosCliente,$this->connexion);*/	        	
			//$this->proveedorLogicAdditional->checkGeneralEntitiesToSaves($this,$this->proveedors,$this->datosCliente,$this->connexion);
			
	   		foreach($this->proveedors as $proveedorLocal) {				
								
				//proveedor_logic_add::updateproveedorToSave($proveedorLocal);	        	
				proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$proveedorLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				proveedor_data::save($proveedorLocal, $this->connexion);				
			}
			
			/*proveedor_logic_add::checkproveedorToSavesAfter($this->proveedors,$this->datosCliente,$this->connexion);*/			
			//$this->proveedorLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->proveedors,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				proveedor_util::refrescarFKDescripciones($this->proveedors);
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
			/*proveedor_logic_add::checkproveedorToSaves($this->proveedors,$this->datosCliente,$this->connexion);*/			
			//$this->proveedorLogicAdditional->checkGeneralEntitiesToSaves($this,$this->proveedors,$this->datosCliente,$this->connexion);
			
	   		foreach($this->proveedors as $proveedorLocal) {				
								
				//proveedor_logic_add::updateproveedorToSave($proveedorLocal);	        	
				proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$proveedorLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				proveedor_data::save($proveedorLocal, $this->connexion);				
			}			
			
			/*proveedor_logic_add::checkproveedorToSavesAfter($this->proveedors,$this->datosCliente,$this->connexion);*/			
			//$this->proveedorLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->proveedors,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				proveedor_util::refrescarFKDescripciones($this->proveedors);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $proveedors,Connexion $connexion)  {
		$proveedorLogic = new  proveedor_logic();
		  		  
        try {		
			$proveedorLogic->setConnexion($connexion);			
			$proveedorLogic->setproveedors($proveedors);			
			$proveedorLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$proveedorsAux=array();
		
		foreach($this->proveedors as $proveedor) {
			if($proveedor->getIsDeleted()==false) {
				$proveedorsAux[]=$proveedor;
			}
		}
		
		$this->proveedors=$proveedorsAux;
	}
	
	public function updateToGetsAuxiliar(array &$proveedors) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->proveedors as $proveedor) {
				
				$proveedor->setid_empresa_Descripcion(proveedor_util::getempresaDescripcion($proveedor->getempresa()));
				$proveedor->setid_tipo_persona_Descripcion(proveedor_util::gettipo_personaDescripcion($proveedor->gettipo_persona()));
				$proveedor->setid_categoria_proveedor_Descripcion(proveedor_util::getcategoria_proveedorDescripcion($proveedor->getcategoria_proveedor()));
				$proveedor->setid_giro_negocio_proveedor_Descripcion(proveedor_util::getgiro_negocio_proveedorDescripcion($proveedor->getgiro_negocio_proveedor()));
				$proveedor->setid_pais_Descripcion(proveedor_util::getpaisDescripcion($proveedor->getpais()));
				$proveedor->setid_provincia_Descripcion(proveedor_util::getprovinciaDescripcion($proveedor->getprovincia()));
				$proveedor->setid_ciudad_Descripcion(proveedor_util::getciudadDescripcion($proveedor->getciudad()));
				$proveedor->setid_vendedor_Descripcion(proveedor_util::getvendedorDescripcion($proveedor->getvendedor()));
				$proveedor->setid_termino_pago_proveedor_Descripcion(proveedor_util::gettermino_pago_proveedorDescripcion($proveedor->gettermino_pago_proveedor()));
				$proveedor->setid_cuenta_Descripcion(proveedor_util::getcuentaDescripcion($proveedor->getcuenta()));
				$proveedor->setid_impuesto_Descripcion(proveedor_util::getimpuestoDescripcion($proveedor->getimpuesto()));
				$proveedor->setid_retencion_Descripcion(proveedor_util::getretencionDescripcion($proveedor->getretencion()));
				$proveedor->setid_retencion_fuente_Descripcion(proveedor_util::getretencion_fuenteDescripcion($proveedor->getretencion_fuente()));
				$proveedor->setid_retencion_ica_Descripcion(proveedor_util::getretencion_icaDescripcion($proveedor->getretencion_ica()));
				$proveedor->setid_otro_impuesto_Descripcion(proveedor_util::getotro_impuestoDescripcion($proveedor->getotro_impuesto()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$proveedor_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$proveedor_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$proveedor_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$proveedorForeignKey=new proveedor_param_return();//proveedorForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_persona',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_personasFK($this->connexion,$strRecargarFkQuery,$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_categoria_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarComboscategoria_proveedorsFK($this->connexion,$strRecargarFkQuery,$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_giro_negocio_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosgiro_negocio_proveedorsFK($this->connexion,$strRecargarFkQuery,$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_pais',$strRecargarFkTipos,',')) {
				$this->cargarCombospaissFK($this->connexion,$strRecargarFkQuery,$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_provincia',$strRecargarFkTipos,',')) {
				$this->cargarCombosprovinciasFK($this->connexion,$strRecargarFkQuery,$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ciudad',$strRecargarFkTipos,',')) {
				$this->cargarCombosciudadsFK($this->connexion,$strRecargarFkQuery,$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_vendedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosvendedorsFK($this->connexion,$strRecargarFkQuery,$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_termino_pago_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombostermino_pago_proveedorsFK($this->connexion,$strRecargarFkQuery,$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTipos,',')) {
				$this->cargarComboscuentasFK($this->connexion,$strRecargarFkQuery,$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_impuesto',$strRecargarFkTipos,',')) {
				$this->cargarCombosimpuestosFK($this->connexion,$strRecargarFkQuery,$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_retencion',$strRecargarFkTipos,',')) {
				$this->cargarCombosretencionsFK($this->connexion,$strRecargarFkQuery,$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_retencion_fuente',$strRecargarFkTipos,',')) {
				$this->cargarCombosretencion_fuentesFK($this->connexion,$strRecargarFkQuery,$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_retencion_ica',$strRecargarFkTipos,',')) {
				$this->cargarCombosretencion_icasFK($this->connexion,$strRecargarFkQuery,$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_otro_impuesto',$strRecargarFkTipos,',')) {
				$this->cargarCombosotro_impuestosFK($this->connexion,$strRecargarFkQuery,$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_persona',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_personasFK($this->connexion,' where id=-1 ',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_categoria_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscategoria_proveedorsFK($this->connexion,' where id=-1 ',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_giro_negocio_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosgiro_negocio_proveedorsFK($this->connexion,' where id=-1 ',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_pais',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombospaissFK($this->connexion,' where id=-1 ',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_provincia',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosprovinciasFK($this->connexion,' where id=-1 ',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ciudad',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosciudadsFK($this->connexion,' where id=-1 ',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_vendedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosvendedorsFK($this->connexion,' where id=-1 ',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_termino_pago_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostermino_pago_proveedorsFK($this->connexion,' where id=-1 ',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuentasFK($this->connexion,' where id=-1 ',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_impuesto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosimpuestosFK($this->connexion,' where id=-1 ',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_retencion',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosretencionsFK($this->connexion,' where id=-1 ',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_retencion_fuente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosretencion_fuentesFK($this->connexion,' where id=-1 ',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_retencion_ica',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosretencion_icasFK($this->connexion,' where id=-1 ',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_otro_impuesto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosotro_impuestosFK($this->connexion,' where id=-1 ',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $proveedorForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$proveedorForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($proveedorForeignKey->idempresaDefaultFK==0) {
					$proveedorForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$proveedorForeignKey->empresasFK[$empresaLocal->getId()]=proveedor_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($proveedor_session->bigidempresaActual!=null && $proveedor_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($proveedor_session->bigidempresaActual);//WithConnection

				$proveedorForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=proveedor_util::getempresaDescripcion($empresaLogic->getempresa());
				$proveedorForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombostipo_personasFK($connexion=null,$strRecargarFkQuery='',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_personaLogic= new tipo_persona_logic();
		$pagination= new Pagination();
		$proveedorForeignKey->tipo_personasFK=array();

		$tipo_personaLogic->setConnexion($connexion);
		$tipo_personaLogic->gettipo_personaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesiontipo_persona!=true) {
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
				if($proveedorForeignKey->idtipo_personaDefaultFK==0) {
					$proveedorForeignKey->idtipo_personaDefaultFK=$tipo_personaLocal->getId();
				}

				$proveedorForeignKey->tipo_personasFK[$tipo_personaLocal->getId()]=proveedor_util::gettipo_personaDescripcion($tipo_personaLocal);
			}

		} else {

			if($proveedor_session->bigidtipo_personaActual!=null && $proveedor_session->bigidtipo_personaActual > 0) {
				$tipo_personaLogic->getEntity($proveedor_session->bigidtipo_personaActual);//WithConnection

				$proveedorForeignKey->tipo_personasFK[$tipo_personaLogic->gettipo_persona()->getId()]=proveedor_util::gettipo_personaDescripcion($tipo_personaLogic->gettipo_persona());
				$proveedorForeignKey->idtipo_personaDefaultFK=$tipo_personaLogic->gettipo_persona()->getId();
			}
		}
	}

	public function cargarComboscategoria_proveedorsFK($connexion=null,$strRecargarFkQuery='',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$categoria_proveedorLogic= new categoria_proveedor_logic();
		$pagination= new Pagination();
		$proveedorForeignKey->categoria_proveedorsFK=array();

		$categoria_proveedorLogic->setConnexion($connexion);
		$categoria_proveedorLogic->getcategoria_proveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesioncategoria_proveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=categoria_proveedor_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcategoria_proveedor=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcategoria_proveedor=Funciones::GetFinalQueryAppend($finalQueryGlobalcategoria_proveedor, '');
				$finalQueryGlobalcategoria_proveedor.=categoria_proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcategoria_proveedor.$strRecargarFkQuery;		

				$categoria_proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($categoria_proveedorLogic->getcategoria_proveedors() as $categoria_proveedorLocal ) {
				if($proveedorForeignKey->idcategoria_proveedorDefaultFK==0) {
					$proveedorForeignKey->idcategoria_proveedorDefaultFK=$categoria_proveedorLocal->getId();
				}

				$proveedorForeignKey->categoria_proveedorsFK[$categoria_proveedorLocal->getId()]=proveedor_util::getcategoria_proveedorDescripcion($categoria_proveedorLocal);
			}

		} else {

			if($proveedor_session->bigidcategoria_proveedorActual!=null && $proveedor_session->bigidcategoria_proveedorActual > 0) {
				$categoria_proveedorLogic->getEntity($proveedor_session->bigidcategoria_proveedorActual);//WithConnection

				$proveedorForeignKey->categoria_proveedorsFK[$categoria_proveedorLogic->getcategoria_proveedor()->getId()]=proveedor_util::getcategoria_proveedorDescripcion($categoria_proveedorLogic->getcategoria_proveedor());
				$proveedorForeignKey->idcategoria_proveedorDefaultFK=$categoria_proveedorLogic->getcategoria_proveedor()->getId();
			}
		}
	}

	public function cargarCombosgiro_negocio_proveedorsFK($connexion=null,$strRecargarFkQuery='',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$giro_negocio_proveedorLogic= new giro_negocio_proveedor_logic();
		$pagination= new Pagination();
		$proveedorForeignKey->giro_negocio_proveedorsFK=array();

		$giro_negocio_proveedorLogic->setConnexion($connexion);
		$giro_negocio_proveedorLogic->getgiro_negocio_proveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesiongiro_negocio_proveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=giro_negocio_proveedor_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalgiro_negocio_proveedor=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalgiro_negocio_proveedor=Funciones::GetFinalQueryAppend($finalQueryGlobalgiro_negocio_proveedor, '');
				$finalQueryGlobalgiro_negocio_proveedor.=giro_negocio_proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalgiro_negocio_proveedor.$strRecargarFkQuery;		

				$giro_negocio_proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($giro_negocio_proveedorLogic->getgiro_negocio_proveedors() as $giro_negocio_proveedorLocal ) {
				if($proveedorForeignKey->idgiro_negocio_proveedorDefaultFK==0) {
					$proveedorForeignKey->idgiro_negocio_proveedorDefaultFK=$giro_negocio_proveedorLocal->getId();
				}

				$proveedorForeignKey->giro_negocio_proveedorsFK[$giro_negocio_proveedorLocal->getId()]=proveedor_util::getgiro_negocio_proveedorDescripcion($giro_negocio_proveedorLocal);
			}

		} else {

			if($proveedor_session->bigidgiro_negocio_proveedorActual!=null && $proveedor_session->bigidgiro_negocio_proveedorActual > 0) {
				$giro_negocio_proveedorLogic->getEntity($proveedor_session->bigidgiro_negocio_proveedorActual);//WithConnection

				$proveedorForeignKey->giro_negocio_proveedorsFK[$giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->getId()]=proveedor_util::getgiro_negocio_proveedorDescripcion($giro_negocio_proveedorLogic->getgiro_negocio_proveedor());
				$proveedorForeignKey->idgiro_negocio_proveedorDefaultFK=$giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->getId();
			}
		}
	}

	public function cargarCombospaissFK($connexion=null,$strRecargarFkQuery='',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$paisLogic= new pais_logic();
		$pagination= new Pagination();
		$proveedorForeignKey->paissFK=array();

		$paisLogic->setConnexion($connexion);
		$paisLogic->getpaisDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesionpais!=true) {
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
				if($proveedorForeignKey->idpaisDefaultFK==0) {
					$proveedorForeignKey->idpaisDefaultFK=$paisLocal->getId();
				}

				$proveedorForeignKey->paissFK[$paisLocal->getId()]=proveedor_util::getpaisDescripcion($paisLocal);
			}

		} else {

			if($proveedor_session->bigidpaisActual!=null && $proveedor_session->bigidpaisActual > 0) {
				$paisLogic->getEntity($proveedor_session->bigidpaisActual);//WithConnection

				$proveedorForeignKey->paissFK[$paisLogic->getpais()->getId()]=proveedor_util::getpaisDescripcion($paisLogic->getpais());
				$proveedorForeignKey->idpaisDefaultFK=$paisLogic->getpais()->getId();
			}
		}
	}

	public function cargarCombosprovinciasFK($connexion=null,$strRecargarFkQuery='',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$provinciaLogic= new provincia_logic();
		$pagination= new Pagination();
		$proveedorForeignKey->provinciasFK=array();

		$provinciaLogic->setConnexion($connexion);
		$provinciaLogic->getprovinciaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesionprovincia!=true) {
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
				if($proveedorForeignKey->idprovinciaDefaultFK==0) {
					$proveedorForeignKey->idprovinciaDefaultFK=$provinciaLocal->getId();
				}

				$proveedorForeignKey->provinciasFK[$provinciaLocal->getId()]=proveedor_util::getprovinciaDescripcion($provinciaLocal);
			}

		} else {

			if($proveedor_session->bigidprovinciaActual!=null && $proveedor_session->bigidprovinciaActual > 0) {
				$provinciaLogic->getEntity($proveedor_session->bigidprovinciaActual);//WithConnection

				$proveedorForeignKey->provinciasFK[$provinciaLogic->getprovincia()->getId()]=proveedor_util::getprovinciaDescripcion($provinciaLogic->getprovincia());
				$proveedorForeignKey->idprovinciaDefaultFK=$provinciaLogic->getprovincia()->getId();
			}
		}
	}

	public function cargarCombosciudadsFK($connexion=null,$strRecargarFkQuery='',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ciudadLogic= new ciudad_logic();
		$pagination= new Pagination();
		$proveedorForeignKey->ciudadsFK=array();

		$ciudadLogic->setConnexion($connexion);
		$ciudadLogic->getciudadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesionciudad!=true) {
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
				if($proveedorForeignKey->idciudadDefaultFK==0) {
					$proveedorForeignKey->idciudadDefaultFK=$ciudadLocal->getId();
				}

				$proveedorForeignKey->ciudadsFK[$ciudadLocal->getId()]=proveedor_util::getciudadDescripcion($ciudadLocal);
			}

		} else {

			if($proveedor_session->bigidciudadActual!=null && $proveedor_session->bigidciudadActual > 0) {
				$ciudadLogic->getEntity($proveedor_session->bigidciudadActual);//WithConnection

				$proveedorForeignKey->ciudadsFK[$ciudadLogic->getciudad()->getId()]=proveedor_util::getciudadDescripcion($ciudadLogic->getciudad());
				$proveedorForeignKey->idciudadDefaultFK=$ciudadLogic->getciudad()->getId();
			}
		}
	}

	public function cargarCombosvendedorsFK($connexion=null,$strRecargarFkQuery='',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$vendedorLogic= new vendedor_logic();
		$pagination= new Pagination();
		$proveedorForeignKey->vendedorsFK=array();

		$vendedorLogic->setConnexion($connexion);
		$vendedorLogic->getvendedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesionvendedor!=true) {
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
				if($proveedorForeignKey->idvendedorDefaultFK==0) {
					$proveedorForeignKey->idvendedorDefaultFK=$vendedorLocal->getId();
				}

				$proveedorForeignKey->vendedorsFK[$vendedorLocal->getId()]=proveedor_util::getvendedorDescripcion($vendedorLocal);
			}

		} else {

			if($proveedor_session->bigidvendedorActual!=null && $proveedor_session->bigidvendedorActual > 0) {
				$vendedorLogic->getEntity($proveedor_session->bigidvendedorActual);//WithConnection

				$proveedorForeignKey->vendedorsFK[$vendedorLogic->getvendedor()->getId()]=proveedor_util::getvendedorDescripcion($vendedorLogic->getvendedor());
				$proveedorForeignKey->idvendedorDefaultFK=$vendedorLogic->getvendedor()->getId();
			}
		}
	}

	public function cargarCombostermino_pago_proveedorsFK($connexion=null,$strRecargarFkQuery='',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic();
		$pagination= new Pagination();
		$proveedorForeignKey->termino_pago_proveedorsFK=array();

		$termino_pago_proveedorLogic->setConnexion($connexion);
		$termino_pago_proveedorLogic->gettermino_pago_proveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=termino_pago_proveedor_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltermino_pago_proveedor=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltermino_pago_proveedor=Funciones::GetFinalQueryAppend($finalQueryGlobaltermino_pago_proveedor, '');
				$finalQueryGlobaltermino_pago_proveedor.=termino_pago_proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltermino_pago_proveedor.$strRecargarFkQuery;		

				$termino_pago_proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($termino_pago_proveedorLogic->gettermino_pago_proveedors() as $termino_pago_proveedorLocal ) {
				if($proveedorForeignKey->idtermino_pago_proveedorDefaultFK==0) {
					$proveedorForeignKey->idtermino_pago_proveedorDefaultFK=$termino_pago_proveedorLocal->getId();
				}

				$proveedorForeignKey->termino_pago_proveedorsFK[$termino_pago_proveedorLocal->getId()]=proveedor_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLocal);
			}

		} else {

			if($proveedor_session->bigidtermino_pago_proveedorActual!=null && $proveedor_session->bigidtermino_pago_proveedorActual > 0) {
				$termino_pago_proveedorLogic->getEntity($proveedor_session->bigidtermino_pago_proveedorActual);//WithConnection

				$proveedorForeignKey->termino_pago_proveedorsFK[$termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId()]=proveedor_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLogic->gettermino_pago_proveedor());
				$proveedorForeignKey->idtermino_pago_proveedorDefaultFK=$termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId();
			}
		}
	}

	public function cargarComboscuentasFK($connexion=null,$strRecargarFkQuery='',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$proveedorForeignKey->cuentasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesioncuenta!=true) {
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
				if($proveedorForeignKey->idcuentaDefaultFK==0) {
					$proveedorForeignKey->idcuentaDefaultFK=$cuentaLocal->getId();
				}

				$proveedorForeignKey->cuentasFK[$cuentaLocal->getId()]=proveedor_util::getcuentaDescripcion($cuentaLocal);
			}

		} else {

			if($proveedor_session->bigidcuentaActual!=null && $proveedor_session->bigidcuentaActual > 0) {
				$cuentaLogic->getEntity($proveedor_session->bigidcuentaActual);//WithConnection

				$proveedorForeignKey->cuentasFK[$cuentaLogic->getcuenta()->getId()]=proveedor_util::getcuentaDescripcion($cuentaLogic->getcuenta());
				$proveedorForeignKey->idcuentaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarCombosimpuestosFK($connexion=null,$strRecargarFkQuery='',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$impuestoLogic= new impuesto_logic();
		$pagination= new Pagination();
		$proveedorForeignKey->impuestosFK=array();

		$impuestoLogic->setConnexion($connexion);
		$impuestoLogic->getimpuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesionimpuesto!=true) {
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
				if($proveedorForeignKey->idimpuestoDefaultFK==0) {
					$proveedorForeignKey->idimpuestoDefaultFK=$impuestoLocal->getId();
				}

				$proveedorForeignKey->impuestosFK[$impuestoLocal->getId()]=proveedor_util::getimpuestoDescripcion($impuestoLocal);
			}

		} else {

			if($proveedor_session->bigidimpuestoActual!=null && $proveedor_session->bigidimpuestoActual > 0) {
				$impuestoLogic->getEntity($proveedor_session->bigidimpuestoActual);//WithConnection

				$proveedorForeignKey->impuestosFK[$impuestoLogic->getimpuesto()->getId()]=proveedor_util::getimpuestoDescripcion($impuestoLogic->getimpuesto());
				$proveedorForeignKey->idimpuestoDefaultFK=$impuestoLogic->getimpuesto()->getId();
			}
		}
	}

	public function cargarCombosretencionsFK($connexion=null,$strRecargarFkQuery='',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$retencionLogic= new retencion_logic();
		$pagination= new Pagination();
		$proveedorForeignKey->retencionsFK=array();

		$retencionLogic->setConnexion($connexion);
		$retencionLogic->getretencionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesionretencion!=true) {
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
				if($proveedorForeignKey->idretencionDefaultFK==0) {
					$proveedorForeignKey->idretencionDefaultFK=$retencionLocal->getId();
				}

				$proveedorForeignKey->retencionsFK[$retencionLocal->getId()]=proveedor_util::getretencionDescripcion($retencionLocal);
			}

		} else {

			if($proveedor_session->bigidretencionActual!=null && $proveedor_session->bigidretencionActual > 0) {
				$retencionLogic->getEntity($proveedor_session->bigidretencionActual);//WithConnection

				$proveedorForeignKey->retencionsFK[$retencionLogic->getretencion()->getId()]=proveedor_util::getretencionDescripcion($retencionLogic->getretencion());
				$proveedorForeignKey->idretencionDefaultFK=$retencionLogic->getretencion()->getId();
			}
		}
	}

	public function cargarCombosretencion_fuentesFK($connexion=null,$strRecargarFkQuery='',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$retencion_fuenteLogic= new retencion_fuente_logic();
		$pagination= new Pagination();
		$proveedorForeignKey->retencion_fuentesFK=array();

		$retencion_fuenteLogic->setConnexion($connexion);
		$retencion_fuenteLogic->getretencion_fuenteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesionretencion_fuente!=true) {
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
				if($proveedorForeignKey->idretencion_fuenteDefaultFK==0) {
					$proveedorForeignKey->idretencion_fuenteDefaultFK=$retencion_fuenteLocal->getId();
				}

				$proveedorForeignKey->retencion_fuentesFK[$retencion_fuenteLocal->getId()]=proveedor_util::getretencion_fuenteDescripcion($retencion_fuenteLocal);
			}

		} else {

			if($proveedor_session->bigidretencion_fuenteActual!=null && $proveedor_session->bigidretencion_fuenteActual > 0) {
				$retencion_fuenteLogic->getEntity($proveedor_session->bigidretencion_fuenteActual);//WithConnection

				$proveedorForeignKey->retencion_fuentesFK[$retencion_fuenteLogic->getretencion_fuente()->getId()]=proveedor_util::getretencion_fuenteDescripcion($retencion_fuenteLogic->getretencion_fuente());
				$proveedorForeignKey->idretencion_fuenteDefaultFK=$retencion_fuenteLogic->getretencion_fuente()->getId();
			}
		}
	}

	public function cargarCombosretencion_icasFK($connexion=null,$strRecargarFkQuery='',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$retencion_icaLogic= new retencion_ica_logic();
		$pagination= new Pagination();
		$proveedorForeignKey->retencion_icasFK=array();

		$retencion_icaLogic->setConnexion($connexion);
		$retencion_icaLogic->getretencion_icaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesionretencion_ica!=true) {
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
				if($proveedorForeignKey->idretencion_icaDefaultFK==0) {
					$proveedorForeignKey->idretencion_icaDefaultFK=$retencion_icaLocal->getId();
				}

				$proveedorForeignKey->retencion_icasFK[$retencion_icaLocal->getId()]=proveedor_util::getretencion_icaDescripcion($retencion_icaLocal);
			}

		} else {

			if($proveedor_session->bigidretencion_icaActual!=null && $proveedor_session->bigidretencion_icaActual > 0) {
				$retencion_icaLogic->getEntity($proveedor_session->bigidretencion_icaActual);//WithConnection

				$proveedorForeignKey->retencion_icasFK[$retencion_icaLogic->getretencion_ica()->getId()]=proveedor_util::getretencion_icaDescripcion($retencion_icaLogic->getretencion_ica());
				$proveedorForeignKey->idretencion_icaDefaultFK=$retencion_icaLogic->getretencion_ica()->getId();
			}
		}
	}

	public function cargarCombosotro_impuestosFK($connexion=null,$strRecargarFkQuery='',$proveedorForeignKey,$proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$otro_impuestoLogic= new otro_impuesto_logic();
		$pagination= new Pagination();
		$proveedorForeignKey->otro_impuestosFK=array();

		$otro_impuestoLogic->setConnexion($connexion);
		$otro_impuestoLogic->getotro_impuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesionotro_impuesto!=true) {
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
				if($proveedorForeignKey->idotro_impuestoDefaultFK==0) {
					$proveedorForeignKey->idotro_impuestoDefaultFK=$otro_impuestoLocal->getId();
				}

				$proveedorForeignKey->otro_impuestosFK[$otro_impuestoLocal->getId()]=proveedor_util::getotro_impuestoDescripcion($otro_impuestoLocal);
			}

		} else {

			if($proveedor_session->bigidotro_impuestoActual!=null && $proveedor_session->bigidotro_impuestoActual > 0) {
				$otro_impuestoLogic->getEntity($proveedor_session->bigidotro_impuestoActual);//WithConnection

				$proveedorForeignKey->otro_impuestosFK[$otro_impuestoLogic->getotro_impuesto()->getId()]=proveedor_util::getotro_impuestoDescripcion($otro_impuestoLogic->getotro_impuesto());
				$proveedorForeignKey->idotro_impuestoDefaultFK=$otro_impuestoLogic->getotro_impuesto()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($proveedor,$listaprecios,$ordencompras,$cuentapagars,$imagenproveedors,$documentoproveedors,$otrosuplidors) {
		$this->saveRelacionesBase($proveedor,$listaprecios,$ordencompras,$cuentapagars,$imagenproveedors,$documentoproveedors,$otrosuplidors,true);
	}

	public function saveRelaciones($proveedor,$listaprecios,$ordencompras,$cuentapagars,$imagenproveedors,$documentoproveedors,$otrosuplidors) {
		$this->saveRelacionesBase($proveedor,$listaprecios,$ordencompras,$cuentapagars,$imagenproveedors,$documentoproveedors,$otrosuplidors,false);
	}

	public function saveRelacionesBase($proveedor,$listaprecios=array(),$ordencompras=array(),$cuentapagars=array(),$imagenproveedors=array(),$documentoproveedors=array(),$otrosuplidors=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$proveedor->setlista_precios($listaprecios);
			$proveedor->setorden_compras($ordencompras);
			$proveedor->setcuenta_pagars($cuentapagars);
			$proveedor->setimagen_proveedors($imagenproveedors);
			$proveedor->setdocumento_proveedors($documentoproveedors);
			$proveedor->setotro_suplidors($otrosuplidors);
			$this->setproveedor($proveedor);

			if(true) {

				//proveedor_logic_add::updateRelacionesToSave($proveedor,$this);

				if(($this->proveedor->getIsNew() || $this->proveedor->getIsChanged()) && !$this->proveedor->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($listaprecios,$ordencompras,$cuentapagars,$imagenproveedors,$documentoproveedors,$otrosuplidors);

				} else if($this->proveedor->getIsDeleted()) {
					$this->saveRelacionesDetalles($listaprecios,$ordencompras,$cuentapagars,$imagenproveedors,$documentoproveedors,$otrosuplidors);
					$this->save();
				}

				//proveedor_logic_add::updateRelacionesToSaveAfter($proveedor,$this);

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
	
	
	public function saveRelacionesDetalles($listaprecios=array(),$ordencompras=array(),$cuentapagars=array(),$imagenproveedors=array(),$documentoproveedors=array(),$otrosuplidors=array()) {
		try {
	

			$idproveedorActual=$this->getproveedor()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/lista_precio_carga.php');
			lista_precio_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$listaprecioLogic_Desde_proveedor=new lista_precio_logic();
			$listaprecioLogic_Desde_proveedor->setlista_precios($listaprecios);

			$listaprecioLogic_Desde_proveedor->setConnexion($this->getConnexion());
			$listaprecioLogic_Desde_proveedor->setDatosCliente($this->datosCliente);

			foreach($listaprecioLogic_Desde_proveedor->getlista_precios() as $listaprecio_Desde_proveedor) {
				$listaprecio_Desde_proveedor->setid_proveedor($idproveedorActual);
			}

			$listaprecioLogic_Desde_proveedor->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/orden_compra_carga.php');
			orden_compra_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$ordencompraLogic_Desde_proveedor=new orden_compra_logic();
			$ordencompraLogic_Desde_proveedor->setorden_compras($ordencompras);

			$ordencompraLogic_Desde_proveedor->setConnexion($this->getConnexion());
			$ordencompraLogic_Desde_proveedor->setDatosCliente($this->datosCliente);

			foreach($ordencompraLogic_Desde_proveedor->getorden_compras() as $ordencompra_Desde_proveedor) {
				$ordencompra_Desde_proveedor->setid_proveedor($idproveedorActual);

				$ordencompraLogic_Desde_proveedor->setorden_compra($ordencompra_Desde_proveedor);
				$ordencompraLogic_Desde_proveedor->save();

				$idorden_compraActual=$orden_compra_Desde_proveedor->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/orden_compra_detalle_carga.php');
				orden_compra_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$ordencompradetalleLogic_Desde_orden_compra=new orden_compra_detalle_logic();

				if($orden_compra_Desde_proveedor->getorden_compra_detalles()==null){
					$orden_compra_Desde_proveedor->setorden_compra_detalles(array());
				}

				$ordencompradetalleLogic_Desde_orden_compra->setorden_compra_detalles($orden_compra_Desde_proveedor->getorden_compra_detalles());

				$ordencompradetalleLogic_Desde_orden_compra->setConnexion($this->getConnexion());
				$ordencompradetalleLogic_Desde_orden_compra->setDatosCliente($this->datosCliente);

				foreach($ordencompradetalleLogic_Desde_orden_compra->getorden_compra_detalles() as $ordencompradetalle_Desde_orden_compra) {
					$ordencompradetalle_Desde_orden_compra->setid_orden_compra($idorden_compraActual);
				}

				$ordencompradetalleLogic_Desde_orden_compra->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/cuenta_pagar_carga.php');
			cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cuentapagarLogic_Desde_proveedor=new cuenta_pagar_logic();
			$cuentapagarLogic_Desde_proveedor->setcuenta_pagars($cuentapagars);

			$cuentapagarLogic_Desde_proveedor->setConnexion($this->getConnexion());
			$cuentapagarLogic_Desde_proveedor->setDatosCliente($this->datosCliente);

			foreach($cuentapagarLogic_Desde_proveedor->getcuenta_pagars() as $cuentapagar_Desde_proveedor) {
				$cuentapagar_Desde_proveedor->setid_proveedor($idproveedorActual);

				$cuentapagarLogic_Desde_proveedor->setcuenta_pagar($cuentapagar_Desde_proveedor);
				$cuentapagarLogic_Desde_proveedor->save();

				$idcuenta_pagarActual=$cuenta_pagar_Desde_proveedor->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/debito_cuenta_pagar_carga.php');
				debito_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$debitocuentapagarLogic_Desde_cuenta_pagar=new debito_cuenta_pagar_logic();

				if($cuenta_pagar_Desde_proveedor->getdebito_cuenta_pagars()==null){
					$cuenta_pagar_Desde_proveedor->setdebito_cuenta_pagars(array());
				}

				$debitocuentapagarLogic_Desde_cuenta_pagar->setdebito_cuenta_pagars($cuenta_pagar_Desde_proveedor->getdebito_cuenta_pagars());

				$debitocuentapagarLogic_Desde_cuenta_pagar->setConnexion($this->getConnexion());
				$debitocuentapagarLogic_Desde_cuenta_pagar->setDatosCliente($this->datosCliente);

				foreach($debitocuentapagarLogic_Desde_cuenta_pagar->getdebito_cuenta_pagars() as $debitocuentapagar_Desde_cuenta_pagar) {
					$debitocuentapagar_Desde_cuenta_pagar->setid_cuenta_pagar($idcuenta_pagarActual);
				}

				$debitocuentapagarLogic_Desde_cuenta_pagar->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/credito_cuenta_pagar_carga.php');
				credito_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$creditocuentapagarLogic_Desde_cuenta_pagar=new credito_cuenta_pagar_logic();

				if($cuenta_pagar_Desde_proveedor->getcredito_cuenta_pagars()==null){
					$cuenta_pagar_Desde_proveedor->setcredito_cuenta_pagars(array());
				}

				$creditocuentapagarLogic_Desde_cuenta_pagar->setcredito_cuenta_pagars($cuenta_pagar_Desde_proveedor->getcredito_cuenta_pagars());

				$creditocuentapagarLogic_Desde_cuenta_pagar->setConnexion($this->getConnexion());
				$creditocuentapagarLogic_Desde_cuenta_pagar->setDatosCliente($this->datosCliente);

				foreach($creditocuentapagarLogic_Desde_cuenta_pagar->getcredito_cuenta_pagars() as $creditocuentapagar_Desde_cuenta_pagar) {
					$creditocuentapagar_Desde_cuenta_pagar->setid_cuenta_pagar($idcuenta_pagarActual);
				}

				$creditocuentapagarLogic_Desde_cuenta_pagar->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/pago_cuenta_pagar_carga.php');
				pago_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$pagocuentapagarLogic_Desde_cuenta_pagar=new pago_cuenta_pagar_logic();

				if($cuenta_pagar_Desde_proveedor->getpago_cuenta_pagars()==null){
					$cuenta_pagar_Desde_proveedor->setpago_cuenta_pagars(array());
				}

				$pagocuentapagarLogic_Desde_cuenta_pagar->setpago_cuenta_pagars($cuenta_pagar_Desde_proveedor->getpago_cuenta_pagars());

				$pagocuentapagarLogic_Desde_cuenta_pagar->setConnexion($this->getConnexion());
				$pagocuentapagarLogic_Desde_cuenta_pagar->setDatosCliente($this->datosCliente);

				foreach($pagocuentapagarLogic_Desde_cuenta_pagar->getpago_cuenta_pagars() as $pagocuentapagar_Desde_cuenta_pagar) {
					$pagocuentapagar_Desde_cuenta_pagar->setid_cuenta_pagar($idcuenta_pagarActual);
				}

				$pagocuentapagarLogic_Desde_cuenta_pagar->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/imagen_proveedor_carga.php');
			imagen_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$imagenproveedorLogic_Desde_proveedor=new imagen_proveedor_logic();
			$imagenproveedorLogic_Desde_proveedor->setimagen_proveedors($imagenproveedors);

			$imagenproveedorLogic_Desde_proveedor->setConnexion($this->getConnexion());
			$imagenproveedorLogic_Desde_proveedor->setDatosCliente($this->datosCliente);

			foreach($imagenproveedorLogic_Desde_proveedor->getimagen_proveedors() as $imagenproveedor_Desde_proveedor) {
				$imagenproveedor_Desde_proveedor->setid_proveedor($idproveedorActual);
			}

			$imagenproveedorLogic_Desde_proveedor->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/documento_proveedor_carga.php');
			documento_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$documentoproveedorLogic_Desde_proveedor=new documento_proveedor_logic();
			$documentoproveedorLogic_Desde_proveedor->setdocumento_proveedors($documentoproveedors);

			$documentoproveedorLogic_Desde_proveedor->setConnexion($this->getConnexion());
			$documentoproveedorLogic_Desde_proveedor->setDatosCliente($this->datosCliente);

			foreach($documentoproveedorLogic_Desde_proveedor->getdocumento_proveedors() as $documentoproveedor_Desde_proveedor) {
				$documentoproveedor_Desde_proveedor->setid_proveedor($idproveedorActual);

				$documentoproveedorLogic_Desde_proveedor->setdocumento_proveedor($documentoproveedor_Desde_proveedor);
				$documentoproveedorLogic_Desde_proveedor->save();

				$iddocumento_proveedorActual=$documento_proveedor_Desde_proveedor->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/documento_cliente_carga.php');
				documento_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$documentoclienteLogic_Desde_documento_proveedor=new documento_cliente_logic();

				if($documento_proveedor_Desde_proveedor->getdocumento_clientes()==null){
					$documento_proveedor_Desde_proveedor->setdocumento_clientes(array());
				}

				$documentoclienteLogic_Desde_documento_proveedor->setdocumento_clientes($documento_proveedor_Desde_proveedor->getdocumento_clientes());

				$documentoclienteLogic_Desde_documento_proveedor->setConnexion($this->getConnexion());
				$documentoclienteLogic_Desde_documento_proveedor->setDatosCliente($this->datosCliente);

				foreach($documentoclienteLogic_Desde_documento_proveedor->getdocumento_clientes() as $documentocliente_Desde_documento_proveedor) {
					$documentocliente_Desde_documento_proveedor->setid_documento_proveedor($iddocumento_proveedorActual);
				}

				$documentoclienteLogic_Desde_documento_proveedor->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/otro_suplidor_carga.php');
			otro_suplidor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$otrosuplidorLogic_Desde_proveedor=new otro_suplidor_logic();
			$otrosuplidorLogic_Desde_proveedor->setotro_suplidors($otrosuplidors);

			$otrosuplidorLogic_Desde_proveedor->setConnexion($this->getConnexion());
			$otrosuplidorLogic_Desde_proveedor->setDatosCliente($this->datosCliente);

			foreach($otrosuplidorLogic_Desde_proveedor->getotro_suplidors() as $otrosuplidor_Desde_proveedor) {
				$otrosuplidor_Desde_proveedor->setid_proveedor($idproveedorActual);

				$otrosuplidorLogic_Desde_proveedor->setotro_suplidor($otrosuplidor_Desde_proveedor);
				$otrosuplidorLogic_Desde_proveedor->save();

				$idotro_suplidorActual=$otro_suplidor_Desde_proveedor->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/cotizacion_detalle_carga.php');
				cotizacion_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$cotizaciondetalleLogic_Desde_otro_suplidor=new cotizacion_detalle_logic();

				if($otro_suplidor_Desde_proveedor->getcotizacion_detalles()==null){
					$otro_suplidor_Desde_proveedor->setcotizacion_detalles(array());
				}

				$cotizaciondetalleLogic_Desde_otro_suplidor->setcotizacion_detalles($otro_suplidor_Desde_proveedor->getcotizacion_detalles());

				$cotizaciondetalleLogic_Desde_otro_suplidor->setConnexion($this->getConnexion());
				$cotizaciondetalleLogic_Desde_otro_suplidor->setDatosCliente($this->datosCliente);

				foreach($cotizaciondetalleLogic_Desde_otro_suplidor->getcotizacion_detalles() as $cotizaciondetalle_Desde_otro_suplidor) {
					$cotizaciondetalle_Desde_otro_suplidor->setid_otro_suplidor($idotro_suplidorActual);
				}

				$cotizaciondetalleLogic_Desde_otro_suplidor->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/lista_producto_carga.php');
				lista_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$listaproductoLogic_Desde_otro_suplidor=new lista_producto_logic();

				if($otro_suplidor_Desde_proveedor->getlista_productos()==null){
					$otro_suplidor_Desde_proveedor->setlista_productos(array());
				}

				$listaproductoLogic_Desde_otro_suplidor->setlista_productos($otro_suplidor_Desde_proveedor->getlista_productos());

				$listaproductoLogic_Desde_otro_suplidor->setConnexion($this->getConnexion());
				$listaproductoLogic_Desde_otro_suplidor->setDatosCliente($this->datosCliente);

				foreach($listaproductoLogic_Desde_otro_suplidor->getlista_productos() as $listaproducto_Desde_otro_suplidor) {
					$listaproducto_Desde_otro_suplidor->setid_otro_suplidor($idotro_suplidorActual);
				}

				$listaproductoLogic_Desde_otro_suplidor->saves();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $proveedors,proveedor_param_return $proveedorParameterGeneral) : proveedor_param_return {
		$proveedorReturnGeneral=new proveedor_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $proveedorReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $proveedors,proveedor_param_return $proveedorParameterGeneral) : proveedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$proveedorReturnGeneral=new proveedor_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $proveedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $proveedors,proveedor $proveedor,proveedor_param_return $proveedorParameterGeneral,bool $isEsNuevoproveedor,array $clases) : proveedor_param_return {
		 try {	
			$proveedorReturnGeneral=new proveedor_param_return();
	
			$proveedorReturnGeneral->setproveedor($proveedor);
			$proveedorReturnGeneral->setproveedors($proveedors);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$proveedorReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $proveedorReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $proveedors,proveedor $proveedor,proveedor_param_return $proveedorParameterGeneral,bool $isEsNuevoproveedor,array $clases) : proveedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$proveedorReturnGeneral=new proveedor_param_return();
	
			$proveedorReturnGeneral->setproveedor($proveedor);
			$proveedorReturnGeneral->setproveedors($proveedors);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$proveedorReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $proveedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $proveedors,proveedor $proveedor,proveedor_param_return $proveedorParameterGeneral,bool $isEsNuevoproveedor,array $clases) : proveedor_param_return {
		 try {	
			$proveedorReturnGeneral=new proveedor_param_return();
	
			$proveedorReturnGeneral->setproveedor($proveedor);
			$proveedorReturnGeneral->setproveedors($proveedors);
			
			
			
			return $proveedorReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $proveedors,proveedor $proveedor,proveedor_param_return $proveedorParameterGeneral,bool $isEsNuevoproveedor,array $clases) : proveedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$proveedorReturnGeneral=new proveedor_param_return();
	
			$proveedorReturnGeneral->setproveedor($proveedor);
			$proveedorReturnGeneral->setproveedors($proveedors);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $proveedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,proveedor $proveedor,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,proveedor $proveedor,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		proveedor_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		proveedor_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(proveedor $proveedor,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//proveedor_logic_add::updateproveedorToGet($this->proveedor);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$proveedor->setempresa($this->proveedorDataAccess->getempresa($this->connexion,$proveedor));
		$proveedor->settipo_persona($this->proveedorDataAccess->gettipo_persona($this->connexion,$proveedor));
		$proveedor->setcategoria_proveedor($this->proveedorDataAccess->getcategoria_proveedor($this->connexion,$proveedor));
		$proveedor->setgiro_negocio_proveedor($this->proveedorDataAccess->getgiro_negocio_proveedor($this->connexion,$proveedor));
		$proveedor->setpais($this->proveedorDataAccess->getpais($this->connexion,$proveedor));
		$proveedor->setprovincia($this->proveedorDataAccess->getprovincia($this->connexion,$proveedor));
		$proveedor->setciudad($this->proveedorDataAccess->getciudad($this->connexion,$proveedor));
		$proveedor->setvendedor($this->proveedorDataAccess->getvendedor($this->connexion,$proveedor));
		$proveedor->settermino_pago_proveedor($this->proveedorDataAccess->gettermino_pago_proveedor($this->connexion,$proveedor));
		$proveedor->setcuenta($this->proveedorDataAccess->getcuenta($this->connexion,$proveedor));
		$proveedor->setimpuesto($this->proveedorDataAccess->getimpuesto($this->connexion,$proveedor));
		$proveedor->setretencion($this->proveedorDataAccess->getretencion($this->connexion,$proveedor));
		$proveedor->setretencion_fuente($this->proveedorDataAccess->getretencion_fuente($this->connexion,$proveedor));
		$proveedor->setretencion_ica($this->proveedorDataAccess->getretencion_ica($this->connexion,$proveedor));
		$proveedor->setotro_impuesto($this->proveedorDataAccess->getotro_impuesto($this->connexion,$proveedor));
		$proveedor->setlista_precios($this->proveedorDataAccess->getlista_precios($this->connexion,$proveedor));
		$proveedor->setorden_compras($this->proveedorDataAccess->getorden_compras($this->connexion,$proveedor));
		$proveedor->setcuenta_pagars($this->proveedorDataAccess->getcuenta_pagars($this->connexion,$proveedor));
		$proveedor->setimagen_proveedors($this->proveedorDataAccess->getimagen_proveedors($this->connexion,$proveedor));
		$proveedor->setdocumento_proveedors($this->proveedorDataAccess->getdocumento_proveedors($this->connexion,$proveedor));
		$proveedor->setotro_suplidors($this->proveedorDataAccess->getotro_suplidors($this->connexion,$proveedor));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$proveedor->setempresa($this->proveedorDataAccess->getempresa($this->connexion,$proveedor));
				continue;
			}

			if($clas->clas==tipo_persona::$class.'') {
				$proveedor->settipo_persona($this->proveedorDataAccess->gettipo_persona($this->connexion,$proveedor));
				continue;
			}

			if($clas->clas==categoria_proveedor::$class.'') {
				$proveedor->setcategoria_proveedor($this->proveedorDataAccess->getcategoria_proveedor($this->connexion,$proveedor));
				continue;
			}

			if($clas->clas==giro_negocio_proveedor::$class.'') {
				$proveedor->setgiro_negocio_proveedor($this->proveedorDataAccess->getgiro_negocio_proveedor($this->connexion,$proveedor));
				continue;
			}

			if($clas->clas==pais::$class.'') {
				$proveedor->setpais($this->proveedorDataAccess->getpais($this->connexion,$proveedor));
				continue;
			}

			if($clas->clas==provincia::$class.'') {
				$proveedor->setprovincia($this->proveedorDataAccess->getprovincia($this->connexion,$proveedor));
				continue;
			}

			if($clas->clas==ciudad::$class.'') {
				$proveedor->setciudad($this->proveedorDataAccess->getciudad($this->connexion,$proveedor));
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				$proveedor->setvendedor($this->proveedorDataAccess->getvendedor($this->connexion,$proveedor));
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				$proveedor->settermino_pago_proveedor($this->proveedorDataAccess->gettermino_pago_proveedor($this->connexion,$proveedor));
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$proveedor->setcuenta($this->proveedorDataAccess->getcuenta($this->connexion,$proveedor));
				continue;
			}

			if($clas->clas==impuesto::$class.'') {
				$proveedor->setimpuesto($this->proveedorDataAccess->getimpuesto($this->connexion,$proveedor));
				continue;
			}

			if($clas->clas==retencion::$class.'') {
				$proveedor->setretencion($this->proveedorDataAccess->getretencion($this->connexion,$proveedor));
				continue;
			}

			if($clas->clas==retencion_fuente::$class.'') {
				$proveedor->setretencion_fuente($this->proveedorDataAccess->getretencion_fuente($this->connexion,$proveedor));
				continue;
			}

			if($clas->clas==retencion_ica::$class.'') {
				$proveedor->setretencion_ica($this->proveedorDataAccess->getretencion_ica($this->connexion,$proveedor));
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'') {
				$proveedor->setotro_impuesto($this->proveedorDataAccess->getotro_impuesto($this->connexion,$proveedor));
				continue;
			}

			if($clas->clas==lista_precio::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$proveedor->setlista_precios($this->proveedorDataAccess->getlista_precios($this->connexion,$proveedor));

				if($this->isConDeep) {
					$listaprecioLogic= new lista_precio_logic($this->connexion);
					$listaprecioLogic->setlista_precios($proveedor->getlista_precios());
					$classesLocal=lista_precio_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$listaprecioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					lista_precio_util::refrescarFKDescripciones($listaprecioLogic->getlista_precios());
					$proveedor->setlista_precios($listaprecioLogic->getlista_precios());
				}

				continue;
			}

			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$proveedor->setorden_compras($this->proveedorDataAccess->getorden_compras($this->connexion,$proveedor));

				if($this->isConDeep) {
					$ordencompraLogic= new orden_compra_logic($this->connexion);
					$ordencompraLogic->setorden_compras($proveedor->getorden_compras());
					$classesLocal=orden_compra_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$ordencompraLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					orden_compra_util::refrescarFKDescripciones($ordencompraLogic->getorden_compras());
					$proveedor->setorden_compras($ordencompraLogic->getorden_compras());
				}

				continue;
			}

			if($clas->clas==cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$proveedor->setcuenta_pagars($this->proveedorDataAccess->getcuenta_pagars($this->connexion,$proveedor));

				if($this->isConDeep) {
					$cuentapagarLogic= new cuenta_pagar_logic($this->connexion);
					$cuentapagarLogic->setcuenta_pagars($proveedor->getcuenta_pagars());
					$classesLocal=cuenta_pagar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cuentapagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cuenta_pagar_util::refrescarFKDescripciones($cuentapagarLogic->getcuenta_pagars());
					$proveedor->setcuenta_pagars($cuentapagarLogic->getcuenta_pagars());
				}

				continue;
			}

			if($clas->clas==imagen_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$proveedor->setimagen_proveedors($this->proveedorDataAccess->getimagen_proveedors($this->connexion,$proveedor));

				if($this->isConDeep) {
					$imagenproveedorLogic= new imagen_proveedor_logic($this->connexion);
					$imagenproveedorLogic->setimagen_proveedors($proveedor->getimagen_proveedors());
					$classesLocal=imagen_proveedor_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$imagenproveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					imagen_proveedor_util::refrescarFKDescripciones($imagenproveedorLogic->getimagen_proveedors());
					$proveedor->setimagen_proveedors($imagenproveedorLogic->getimagen_proveedors());
				}

				continue;
			}

			if($clas->clas==documento_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$proveedor->setdocumento_proveedors($this->proveedorDataAccess->getdocumento_proveedors($this->connexion,$proveedor));

				if($this->isConDeep) {
					$documentoproveedorLogic= new documento_proveedor_logic($this->connexion);
					$documentoproveedorLogic->setdocumento_proveedors($proveedor->getdocumento_proveedors());
					$classesLocal=documento_proveedor_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$documentoproveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					documento_proveedor_util::refrescarFKDescripciones($documentoproveedorLogic->getdocumento_proveedors());
					$proveedor->setdocumento_proveedors($documentoproveedorLogic->getdocumento_proveedors());
				}

				continue;
			}

			if($clas->clas==otro_suplidor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$proveedor->setotro_suplidors($this->proveedorDataAccess->getotro_suplidors($this->connexion,$proveedor));

				if($this->isConDeep) {
					$otrosuplidorLogic= new otro_suplidor_logic($this->connexion);
					$otrosuplidorLogic->setotro_suplidors($proveedor->getotro_suplidors());
					$classesLocal=otro_suplidor_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$otrosuplidorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					otro_suplidor_util::refrescarFKDescripciones($otrosuplidorLogic->getotro_suplidors());
					$proveedor->setotro_suplidors($otrosuplidorLogic->getotro_suplidors());
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
			$proveedor->setempresa($this->proveedorDataAccess->getempresa($this->connexion,$proveedor));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_persona::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->settipo_persona($this->proveedorDataAccess->gettipo_persona($this->connexion,$proveedor));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==categoria_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setcategoria_proveedor($this->proveedorDataAccess->getcategoria_proveedor($this->connexion,$proveedor));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==giro_negocio_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setgiro_negocio_proveedor($this->proveedorDataAccess->getgiro_negocio_proveedor($this->connexion,$proveedor));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setpais($this->proveedorDataAccess->getpais($this->connexion,$proveedor));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==provincia::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setprovincia($this->proveedorDataAccess->getprovincia($this->connexion,$proveedor));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setciudad($this->proveedorDataAccess->getciudad($this->connexion,$proveedor));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setvendedor($this->proveedorDataAccess->getvendedor($this->connexion,$proveedor));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->settermino_pago_proveedor($this->proveedorDataAccess->gettermino_pago_proveedor($this->connexion,$proveedor));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setcuenta($this->proveedorDataAccess->getcuenta($this->connexion,$proveedor));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setimpuesto($this->proveedorDataAccess->getimpuesto($this->connexion,$proveedor));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setretencion($this->proveedorDataAccess->getretencion($this->connexion,$proveedor));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion_fuente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setretencion_fuente($this->proveedorDataAccess->getretencion_fuente($this->connexion,$proveedor));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==retencion_ica::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setretencion_ica($this->proveedorDataAccess->getretencion_ica($this->connexion,$proveedor));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setotro_impuesto($this->proveedorDataAccess->getotro_impuesto($this->connexion,$proveedor));
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
			$proveedor->setlista_precios($this->proveedorDataAccess->getlista_precios($this->connexion,$proveedor));
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
			$proveedor->setorden_compras($this->proveedorDataAccess->getorden_compras($this->connexion,$proveedor));
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
			$proveedor->setcuenta_pagars($this->proveedorDataAccess->getcuenta_pagars($this->connexion,$proveedor));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_proveedor::$class);
			$proveedor->setimagen_proveedors($this->proveedorDataAccess->getimagen_proveedors($this->connexion,$proveedor));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(documento_proveedor::$class);
			$proveedor->setdocumento_proveedors($this->proveedorDataAccess->getdocumento_proveedors($this->connexion,$proveedor));
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
			$proveedor->setotro_suplidors($this->proveedorDataAccess->getotro_suplidors($this->connexion,$proveedor));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$proveedor->setempresa($this->proveedorDataAccess->getempresa($this->connexion,$proveedor));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($proveedor->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$proveedor->settipo_persona($this->proveedorDataAccess->gettipo_persona($this->connexion,$proveedor));
		$tipo_personaLogic= new tipo_persona_logic($this->connexion);
		$tipo_personaLogic->deepLoad($proveedor->gettipo_persona(),$isDeep,$deepLoadType,$clases);
				
		$proveedor->setcategoria_proveedor($this->proveedorDataAccess->getcategoria_proveedor($this->connexion,$proveedor));
		$categoria_proveedorLogic= new categoria_proveedor_logic($this->connexion);
		$categoria_proveedorLogic->deepLoad($proveedor->getcategoria_proveedor(),$isDeep,$deepLoadType,$clases);
				
		$proveedor->setgiro_negocio_proveedor($this->proveedorDataAccess->getgiro_negocio_proveedor($this->connexion,$proveedor));
		$giro_negocio_proveedorLogic= new giro_negocio_proveedor_logic($this->connexion);
		$giro_negocio_proveedorLogic->deepLoad($proveedor->getgiro_negocio_proveedor(),$isDeep,$deepLoadType,$clases);
				
		$proveedor->setpais($this->proveedorDataAccess->getpais($this->connexion,$proveedor));
		$paisLogic= new pais_logic($this->connexion);
		$paisLogic->deepLoad($proveedor->getpais(),$isDeep,$deepLoadType,$clases);
				
		$proveedor->setprovincia($this->proveedorDataAccess->getprovincia($this->connexion,$proveedor));
		$provinciaLogic= new provincia_logic($this->connexion);
		$provinciaLogic->deepLoad($proveedor->getprovincia(),$isDeep,$deepLoadType,$clases);
				
		$proveedor->setciudad($this->proveedorDataAccess->getciudad($this->connexion,$proveedor));
		$ciudadLogic= new ciudad_logic($this->connexion);
		$ciudadLogic->deepLoad($proveedor->getciudad(),$isDeep,$deepLoadType,$clases);
				
		$proveedor->setvendedor($this->proveedorDataAccess->getvendedor($this->connexion,$proveedor));
		$vendedorLogic= new vendedor_logic($this->connexion);
		$vendedorLogic->deepLoad($proveedor->getvendedor(),$isDeep,$deepLoadType,$clases);
				
		$proveedor->settermino_pago_proveedor($this->proveedorDataAccess->gettermino_pago_proveedor($this->connexion,$proveedor));
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
		$termino_pago_proveedorLogic->deepLoad($proveedor->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases);
				
		$proveedor->setcuenta($this->proveedorDataAccess->getcuenta($this->connexion,$proveedor));
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepLoad($proveedor->getcuenta(),$isDeep,$deepLoadType,$clases);
				
		$proveedor->setimpuesto($this->proveedorDataAccess->getimpuesto($this->connexion,$proveedor));
		$impuestoLogic= new impuesto_logic($this->connexion);
		$impuestoLogic->deepLoad($proveedor->getimpuesto(),$isDeep,$deepLoadType,$clases);
				
		$proveedor->setretencion($this->proveedorDataAccess->getretencion($this->connexion,$proveedor));
		$retencionLogic= new retencion_logic($this->connexion);
		$retencionLogic->deepLoad($proveedor->getretencion(),$isDeep,$deepLoadType,$clases);
				
		$proveedor->setretencion_fuente($this->proveedorDataAccess->getretencion_fuente($this->connexion,$proveedor));
		$retencion_fuenteLogic= new retencion_fuente_logic($this->connexion);
		$retencion_fuenteLogic->deepLoad($proveedor->getretencion_fuente(),$isDeep,$deepLoadType,$clases);
				
		$proveedor->setretencion_ica($this->proveedorDataAccess->getretencion_ica($this->connexion,$proveedor));
		$retencion_icaLogic= new retencion_ica_logic($this->connexion);
		$retencion_icaLogic->deepLoad($proveedor->getretencion_ica(),$isDeep,$deepLoadType,$clases);
				
		$proveedor->setotro_impuesto($this->proveedorDataAccess->getotro_impuesto($this->connexion,$proveedor));
		$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
		$otro_impuestoLogic->deepLoad($proveedor->getotro_impuesto(),$isDeep,$deepLoadType,$clases);
				

		$proveedor->setlista_precios($this->proveedorDataAccess->getlista_precios($this->connexion,$proveedor));

		foreach($proveedor->getlista_precios() as $listaprecio) {
			$listaprecioLogic= new lista_precio_logic($this->connexion);
			$listaprecioLogic->deepLoad($listaprecio,$isDeep,$deepLoadType,$clases);
		}

		$proveedor->setorden_compras($this->proveedorDataAccess->getorden_compras($this->connexion,$proveedor));

		foreach($proveedor->getorden_compras() as $ordencompra) {
			$ordencompraLogic= new orden_compra_logic($this->connexion);
			$ordencompraLogic->deepLoad($ordencompra,$isDeep,$deepLoadType,$clases);
		}

		$proveedor->setcuenta_pagars($this->proveedorDataAccess->getcuenta_pagars($this->connexion,$proveedor));

		foreach($proveedor->getcuenta_pagars() as $cuentapagar) {
			$cuentapagarLogic= new cuenta_pagar_logic($this->connexion);
			$cuentapagarLogic->deepLoad($cuentapagar,$isDeep,$deepLoadType,$clases);
		}

		$proveedor->setimagen_proveedors($this->proveedorDataAccess->getimagen_proveedors($this->connexion,$proveedor));

		foreach($proveedor->getimagen_proveedors() as $imagenproveedor) {
			$imagenproveedorLogic= new imagen_proveedor_logic($this->connexion);
			$imagenproveedorLogic->deepLoad($imagenproveedor,$isDeep,$deepLoadType,$clases);
		}

		$proveedor->setdocumento_proveedors($this->proveedorDataAccess->getdocumento_proveedors($this->connexion,$proveedor));

		foreach($proveedor->getdocumento_proveedors() as $documentoproveedor) {
			$documentoproveedorLogic= new documento_proveedor_logic($this->connexion);
			$documentoproveedorLogic->deepLoad($documentoproveedor,$isDeep,$deepLoadType,$clases);
		}

		$proveedor->setotro_suplidors($this->proveedorDataAccess->getotro_suplidors($this->connexion,$proveedor));

		foreach($proveedor->getotro_suplidors() as $otrosuplidor) {
			$otrosuplidorLogic= new otro_suplidor_logic($this->connexion);
			$otrosuplidorLogic->deepLoad($otrosuplidor,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$proveedor->setempresa($this->proveedorDataAccess->getempresa($this->connexion,$proveedor));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($proveedor->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_persona::$class.'') {
				$proveedor->settipo_persona($this->proveedorDataAccess->gettipo_persona($this->connexion,$proveedor));
				$tipo_personaLogic= new tipo_persona_logic($this->connexion);
				$tipo_personaLogic->deepLoad($proveedor->gettipo_persona(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==categoria_proveedor::$class.'') {
				$proveedor->setcategoria_proveedor($this->proveedorDataAccess->getcategoria_proveedor($this->connexion,$proveedor));
				$categoria_proveedorLogic= new categoria_proveedor_logic($this->connexion);
				$categoria_proveedorLogic->deepLoad($proveedor->getcategoria_proveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==giro_negocio_proveedor::$class.'') {
				$proveedor->setgiro_negocio_proveedor($this->proveedorDataAccess->getgiro_negocio_proveedor($this->connexion,$proveedor));
				$giro_negocio_proveedorLogic= new giro_negocio_proveedor_logic($this->connexion);
				$giro_negocio_proveedorLogic->deepLoad($proveedor->getgiro_negocio_proveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==pais::$class.'') {
				$proveedor->setpais($this->proveedorDataAccess->getpais($this->connexion,$proveedor));
				$paisLogic= new pais_logic($this->connexion);
				$paisLogic->deepLoad($proveedor->getpais(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==provincia::$class.'') {
				$proveedor->setprovincia($this->proveedorDataAccess->getprovincia($this->connexion,$proveedor));
				$provinciaLogic= new provincia_logic($this->connexion);
				$provinciaLogic->deepLoad($proveedor->getprovincia(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ciudad::$class.'') {
				$proveedor->setciudad($this->proveedorDataAccess->getciudad($this->connexion,$proveedor));
				$ciudadLogic= new ciudad_logic($this->connexion);
				$ciudadLogic->deepLoad($proveedor->getciudad(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				$proveedor->setvendedor($this->proveedorDataAccess->getvendedor($this->connexion,$proveedor));
				$vendedorLogic= new vendedor_logic($this->connexion);
				$vendedorLogic->deepLoad($proveedor->getvendedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				$proveedor->settermino_pago_proveedor($this->proveedorDataAccess->gettermino_pago_proveedor($this->connexion,$proveedor));
				$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
				$termino_pago_proveedorLogic->deepLoad($proveedor->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$proveedor->setcuenta($this->proveedorDataAccess->getcuenta($this->connexion,$proveedor));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($proveedor->getcuenta(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==impuesto::$class.'') {
				$proveedor->setimpuesto($this->proveedorDataAccess->getimpuesto($this->connexion,$proveedor));
				$impuestoLogic= new impuesto_logic($this->connexion);
				$impuestoLogic->deepLoad($proveedor->getimpuesto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==retencion::$class.'') {
				$proveedor->setretencion($this->proveedorDataAccess->getretencion($this->connexion,$proveedor));
				$retencionLogic= new retencion_logic($this->connexion);
				$retencionLogic->deepLoad($proveedor->getretencion(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==retencion_fuente::$class.'') {
				$proveedor->setretencion_fuente($this->proveedorDataAccess->getretencion_fuente($this->connexion,$proveedor));
				$retencion_fuenteLogic= new retencion_fuente_logic($this->connexion);
				$retencion_fuenteLogic->deepLoad($proveedor->getretencion_fuente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==retencion_ica::$class.'') {
				$proveedor->setretencion_ica($this->proveedorDataAccess->getretencion_ica($this->connexion,$proveedor));
				$retencion_icaLogic= new retencion_ica_logic($this->connexion);
				$retencion_icaLogic->deepLoad($proveedor->getretencion_ica(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'') {
				$proveedor->setotro_impuesto($this->proveedorDataAccess->getotro_impuesto($this->connexion,$proveedor));
				$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
				$otro_impuestoLogic->deepLoad($proveedor->getotro_impuesto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==lista_precio::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$proveedor->setlista_precios($this->proveedorDataAccess->getlista_precios($this->connexion,$proveedor));

				foreach($proveedor->getlista_precios() as $listaprecio) {
					$listaprecioLogic= new lista_precio_logic($this->connexion);
					$listaprecioLogic->deepLoad($listaprecio,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$proveedor->setorden_compras($this->proveedorDataAccess->getorden_compras($this->connexion,$proveedor));

				foreach($proveedor->getorden_compras() as $ordencompra) {
					$ordencompraLogic= new orden_compra_logic($this->connexion);
					$ordencompraLogic->deepLoad($ordencompra,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$proveedor->setcuenta_pagars($this->proveedorDataAccess->getcuenta_pagars($this->connexion,$proveedor));

				foreach($proveedor->getcuenta_pagars() as $cuentapagar) {
					$cuentapagarLogic= new cuenta_pagar_logic($this->connexion);
					$cuentapagarLogic->deepLoad($cuentapagar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==imagen_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$proveedor->setimagen_proveedors($this->proveedorDataAccess->getimagen_proveedors($this->connexion,$proveedor));

				foreach($proveedor->getimagen_proveedors() as $imagenproveedor) {
					$imagenproveedorLogic= new imagen_proveedor_logic($this->connexion);
					$imagenproveedorLogic->deepLoad($imagenproveedor,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==documento_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$proveedor->setdocumento_proveedors($this->proveedorDataAccess->getdocumento_proveedors($this->connexion,$proveedor));

				foreach($proveedor->getdocumento_proveedors() as $documentoproveedor) {
					$documentoproveedorLogic= new documento_proveedor_logic($this->connexion);
					$documentoproveedorLogic->deepLoad($documentoproveedor,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==otro_suplidor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$proveedor->setotro_suplidors($this->proveedorDataAccess->getotro_suplidors($this->connexion,$proveedor));

				foreach($proveedor->getotro_suplidors() as $otrosuplidor) {
					$otrosuplidorLogic= new otro_suplidor_logic($this->connexion);
					$otrosuplidorLogic->deepLoad($otrosuplidor,$isDeep,$deepLoadType,$clases);
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
			$proveedor->setempresa($this->proveedorDataAccess->getempresa($this->connexion,$proveedor));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($proveedor->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_persona::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->settipo_persona($this->proveedorDataAccess->gettipo_persona($this->connexion,$proveedor));
			$tipo_personaLogic= new tipo_persona_logic($this->connexion);
			$tipo_personaLogic->deepLoad($proveedor->gettipo_persona(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==categoria_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setcategoria_proveedor($this->proveedorDataAccess->getcategoria_proveedor($this->connexion,$proveedor));
			$categoria_proveedorLogic= new categoria_proveedor_logic($this->connexion);
			$categoria_proveedorLogic->deepLoad($proveedor->getcategoria_proveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==giro_negocio_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setgiro_negocio_proveedor($this->proveedorDataAccess->getgiro_negocio_proveedor($this->connexion,$proveedor));
			$giro_negocio_proveedorLogic= new giro_negocio_proveedor_logic($this->connexion);
			$giro_negocio_proveedorLogic->deepLoad($proveedor->getgiro_negocio_proveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setpais($this->proveedorDataAccess->getpais($this->connexion,$proveedor));
			$paisLogic= new pais_logic($this->connexion);
			$paisLogic->deepLoad($proveedor->getpais(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==provincia::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setprovincia($this->proveedorDataAccess->getprovincia($this->connexion,$proveedor));
			$provinciaLogic= new provincia_logic($this->connexion);
			$provinciaLogic->deepLoad($proveedor->getprovincia(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setciudad($this->proveedorDataAccess->getciudad($this->connexion,$proveedor));
			$ciudadLogic= new ciudad_logic($this->connexion);
			$ciudadLogic->deepLoad($proveedor->getciudad(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setvendedor($this->proveedorDataAccess->getvendedor($this->connexion,$proveedor));
			$vendedorLogic= new vendedor_logic($this->connexion);
			$vendedorLogic->deepLoad($proveedor->getvendedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->settermino_pago_proveedor($this->proveedorDataAccess->gettermino_pago_proveedor($this->connexion,$proveedor));
			$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
			$termino_pago_proveedorLogic->deepLoad($proveedor->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setcuenta($this->proveedorDataAccess->getcuenta($this->connexion,$proveedor));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($proveedor->getcuenta(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setimpuesto($this->proveedorDataAccess->getimpuesto($this->connexion,$proveedor));
			$impuestoLogic= new impuesto_logic($this->connexion);
			$impuestoLogic->deepLoad($proveedor->getimpuesto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setretencion($this->proveedorDataAccess->getretencion($this->connexion,$proveedor));
			$retencionLogic= new retencion_logic($this->connexion);
			$retencionLogic->deepLoad($proveedor->getretencion(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion_fuente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setretencion_fuente($this->proveedorDataAccess->getretencion_fuente($this->connexion,$proveedor));
			$retencion_fuenteLogic= new retencion_fuente_logic($this->connexion);
			$retencion_fuenteLogic->deepLoad($proveedor->getretencion_fuente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion_ica::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setretencion_ica($this->proveedorDataAccess->getretencion_ica($this->connexion,$proveedor));
			$retencion_icaLogic= new retencion_ica_logic($this->connexion);
			$retencion_icaLogic->deepLoad($proveedor->getretencion_ica(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$proveedor->setotro_impuesto($this->proveedorDataAccess->getotro_impuesto($this->connexion,$proveedor));
			$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
			$otro_impuestoLogic->deepLoad($proveedor->getotro_impuesto(),$isDeep,$deepLoadType,$clases);
				
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
			$proveedor->setlista_precios($this->proveedorDataAccess->getlista_precios($this->connexion,$proveedor));

			foreach($proveedor->getlista_precios() as $listaprecio) {
				$listaprecioLogic= new lista_precio_logic($this->connexion);
				$listaprecioLogic->deepLoad($listaprecio,$isDeep,$deepLoadType,$clases);
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
			$proveedor->setorden_compras($this->proveedorDataAccess->getorden_compras($this->connexion,$proveedor));

			foreach($proveedor->getorden_compras() as $ordencompra) {
				$ordencompraLogic= new orden_compra_logic($this->connexion);
				$ordencompraLogic->deepLoad($ordencompra,$isDeep,$deepLoadType,$clases);
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
			$proveedor->setcuenta_pagars($this->proveedorDataAccess->getcuenta_pagars($this->connexion,$proveedor));

			foreach($proveedor->getcuenta_pagars() as $cuentapagar) {
				$cuentapagarLogic= new cuenta_pagar_logic($this->connexion);
				$cuentapagarLogic->deepLoad($cuentapagar,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_proveedor::$class);
			$proveedor->setimagen_proveedors($this->proveedorDataAccess->getimagen_proveedors($this->connexion,$proveedor));

			foreach($proveedor->getimagen_proveedors() as $imagenproveedor) {
				$imagenproveedorLogic= new imagen_proveedor_logic($this->connexion);
				$imagenproveedorLogic->deepLoad($imagenproveedor,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(documento_proveedor::$class);
			$proveedor->setdocumento_proveedors($this->proveedorDataAccess->getdocumento_proveedors($this->connexion,$proveedor));

			foreach($proveedor->getdocumento_proveedors() as $documentoproveedor) {
				$documentoproveedorLogic= new documento_proveedor_logic($this->connexion);
				$documentoproveedorLogic->deepLoad($documentoproveedor,$isDeep,$deepLoadType,$clases);
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
			$proveedor->setotro_suplidors($this->proveedorDataAccess->getotro_suplidors($this->connexion,$proveedor));

			foreach($proveedor->getotro_suplidors() as $otrosuplidor) {
				$otrosuplidorLogic= new otro_suplidor_logic($this->connexion);
				$otrosuplidorLogic->deepLoad($otrosuplidor,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(proveedor $proveedor,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//proveedor_logic_add::updateproveedorToSave($this->proveedor);			
			
			if(!$paraDeleteCascade) {				
				proveedor_data::save($proveedor, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($proveedor->getempresa(),$this->connexion);
		tipo_persona_data::save($proveedor->gettipo_persona(),$this->connexion);
		categoria_proveedor_data::save($proveedor->getcategoria_proveedor(),$this->connexion);
		giro_negocio_proveedor_data::save($proveedor->getgiro_negocio_proveedor(),$this->connexion);
		pais_data::save($proveedor->getpais(),$this->connexion);
		provincia_data::save($proveedor->getprovincia(),$this->connexion);
		ciudad_data::save($proveedor->getciudad(),$this->connexion);
		vendedor_data::save($proveedor->getvendedor(),$this->connexion);
		termino_pago_proveedor_data::save($proveedor->gettermino_pago_proveedor(),$this->connexion);
		cuenta_data::save($proveedor->getcuenta(),$this->connexion);
		impuesto_data::save($proveedor->getimpuesto(),$this->connexion);
		retencion_data::save($proveedor->getretencion(),$this->connexion);
		retencion_fuente_data::save($proveedor->getretencion_fuente(),$this->connexion);
		retencion_ica_data::save($proveedor->getretencion_ica(),$this->connexion);
		otro_impuesto_data::save($proveedor->getotro_impuesto(),$this->connexion);

		foreach($proveedor->getlista_precios() as $listaprecio) {
			$listaprecio->setid_proveedor($proveedor->getId());
			lista_precio_data::save($listaprecio,$this->connexion);
		}


		foreach($proveedor->getorden_compras() as $ordencompra) {
			$ordencompra->setid_proveedor($proveedor->getId());
			orden_compra_data::save($ordencompra,$this->connexion);
		}


		foreach($proveedor->getcuenta_pagars() as $cuentapagar) {
			$cuentapagar->setid_proveedor($proveedor->getId());
			cuenta_pagar_data::save($cuentapagar,$this->connexion);
		}


		foreach($proveedor->getimagen_proveedors() as $imagenproveedor) {
			$imagenproveedor->setid_proveedor($proveedor->getId());
			imagen_proveedor_data::save($imagenproveedor,$this->connexion);
		}


		foreach($proveedor->getdocumento_proveedors() as $documentoproveedor) {
			$documentoproveedor->setid_proveedor($proveedor->getId());
			documento_proveedor_data::save($documentoproveedor,$this->connexion);
		}


		foreach($proveedor->getotro_suplidors() as $otrosuplidor) {
			$otrosuplidor->setid_proveedor($proveedor->getId());
			otro_suplidor_data::save($otrosuplidor,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($proveedor->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_persona::$class.'') {
				tipo_persona_data::save($proveedor->gettipo_persona(),$this->connexion);
				continue;
			}

			if($clas->clas==categoria_proveedor::$class.'') {
				categoria_proveedor_data::save($proveedor->getcategoria_proveedor(),$this->connexion);
				continue;
			}

			if($clas->clas==giro_negocio_proveedor::$class.'') {
				giro_negocio_proveedor_data::save($proveedor->getgiro_negocio_proveedor(),$this->connexion);
				continue;
			}

			if($clas->clas==pais::$class.'') {
				pais_data::save($proveedor->getpais(),$this->connexion);
				continue;
			}

			if($clas->clas==provincia::$class.'') {
				provincia_data::save($proveedor->getprovincia(),$this->connexion);
				continue;
			}

			if($clas->clas==ciudad::$class.'') {
				ciudad_data::save($proveedor->getciudad(),$this->connexion);
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				vendedor_data::save($proveedor->getvendedor(),$this->connexion);
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				termino_pago_proveedor_data::save($proveedor->gettermino_pago_proveedor(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($proveedor->getcuenta(),$this->connexion);
				continue;
			}

			if($clas->clas==impuesto::$class.'') {
				impuesto_data::save($proveedor->getimpuesto(),$this->connexion);
				continue;
			}

			if($clas->clas==retencion::$class.'') {
				retencion_data::save($proveedor->getretencion(),$this->connexion);
				continue;
			}

			if($clas->clas==retencion_fuente::$class.'') {
				retencion_fuente_data::save($proveedor->getretencion_fuente(),$this->connexion);
				continue;
			}

			if($clas->clas==retencion_ica::$class.'') {
				retencion_ica_data::save($proveedor->getretencion_ica(),$this->connexion);
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'') {
				otro_impuesto_data::save($proveedor->getotro_impuesto(),$this->connexion);
				continue;
			}


			if($clas->clas==lista_precio::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($proveedor->getlista_precios() as $listaprecio) {
					$listaprecio->setid_proveedor($proveedor->getId());
					lista_precio_data::save($listaprecio,$this->connexion);
				}

				continue;
			}

			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($proveedor->getorden_compras() as $ordencompra) {
					$ordencompra->setid_proveedor($proveedor->getId());
					orden_compra_data::save($ordencompra,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($proveedor->getcuenta_pagars() as $cuentapagar) {
					$cuentapagar->setid_proveedor($proveedor->getId());
					cuenta_pagar_data::save($cuentapagar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==imagen_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($proveedor->getimagen_proveedors() as $imagenproveedor) {
					$imagenproveedor->setid_proveedor($proveedor->getId());
					imagen_proveedor_data::save($imagenproveedor,$this->connexion);
				}

				continue;
			}

			if($clas->clas==documento_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($proveedor->getdocumento_proveedors() as $documentoproveedor) {
					$documentoproveedor->setid_proveedor($proveedor->getId());
					documento_proveedor_data::save($documentoproveedor,$this->connexion);
				}

				continue;
			}

			if($clas->clas==otro_suplidor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($proveedor->getotro_suplidors() as $otrosuplidor) {
					$otrosuplidor->setid_proveedor($proveedor->getId());
					otro_suplidor_data::save($otrosuplidor,$this->connexion);
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
			empresa_data::save($proveedor->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_persona::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_persona_data::save($proveedor->gettipo_persona(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==categoria_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			categoria_proveedor_data::save($proveedor->getcategoria_proveedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==giro_negocio_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			giro_negocio_proveedor_data::save($proveedor->getgiro_negocio_proveedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			pais_data::save($proveedor->getpais(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==provincia::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			provincia_data::save($proveedor->getprovincia(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ciudad_data::save($proveedor->getciudad(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			vendedor_data::save($proveedor->getvendedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_proveedor_data::save($proveedor->gettermino_pago_proveedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($proveedor->getcuenta(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			impuesto_data::save($proveedor->getimpuesto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			retencion_data::save($proveedor->getretencion(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion_fuente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			retencion_fuente_data::save($proveedor->getretencion_fuente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion_ica::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			retencion_ica_data::save($proveedor->getretencion_ica(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			otro_impuesto_data::save($proveedor->getotro_impuesto(),$this->connexion);
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

			foreach($proveedor->getlista_precios() as $listaprecio) {
				$listaprecio->setid_proveedor($proveedor->getId());
				lista_precio_data::save($listaprecio,$this->connexion);
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

			foreach($proveedor->getorden_compras() as $ordencompra) {
				$ordencompra->setid_proveedor($proveedor->getId());
				orden_compra_data::save($ordencompra,$this->connexion);
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

			foreach($proveedor->getcuenta_pagars() as $cuentapagar) {
				$cuentapagar->setid_proveedor($proveedor->getId());
				cuenta_pagar_data::save($cuentapagar,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_proveedor::$class);

			foreach($proveedor->getimagen_proveedors() as $imagenproveedor) {
				$imagenproveedor->setid_proveedor($proveedor->getId());
				imagen_proveedor_data::save($imagenproveedor,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(documento_proveedor::$class);

			foreach($proveedor->getdocumento_proveedors() as $documentoproveedor) {
				$documentoproveedor->setid_proveedor($proveedor->getId());
				documento_proveedor_data::save($documentoproveedor,$this->connexion);
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

			foreach($proveedor->getotro_suplidors() as $otrosuplidor) {
				$otrosuplidor->setid_proveedor($proveedor->getId());
				otro_suplidor_data::save($otrosuplidor,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($proveedor->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($proveedor->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_persona_data::save($proveedor->gettipo_persona(),$this->connexion);
		$tipo_personaLogic= new tipo_persona_logic($this->connexion);
		$tipo_personaLogic->deepSave($proveedor->gettipo_persona(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		categoria_proveedor_data::save($proveedor->getcategoria_proveedor(),$this->connexion);
		$categoria_proveedorLogic= new categoria_proveedor_logic($this->connexion);
		$categoria_proveedorLogic->deepSave($proveedor->getcategoria_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		giro_negocio_proveedor_data::save($proveedor->getgiro_negocio_proveedor(),$this->connexion);
		$giro_negocio_proveedorLogic= new giro_negocio_proveedor_logic($this->connexion);
		$giro_negocio_proveedorLogic->deepSave($proveedor->getgiro_negocio_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		pais_data::save($proveedor->getpais(),$this->connexion);
		$paisLogic= new pais_logic($this->connexion);
		$paisLogic->deepSave($proveedor->getpais(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		provincia_data::save($proveedor->getprovincia(),$this->connexion);
		$provinciaLogic= new provincia_logic($this->connexion);
		$provinciaLogic->deepSave($proveedor->getprovincia(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ciudad_data::save($proveedor->getciudad(),$this->connexion);
		$ciudadLogic= new ciudad_logic($this->connexion);
		$ciudadLogic->deepSave($proveedor->getciudad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		vendedor_data::save($proveedor->getvendedor(),$this->connexion);
		$vendedorLogic= new vendedor_logic($this->connexion);
		$vendedorLogic->deepSave($proveedor->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		termino_pago_proveedor_data::save($proveedor->gettermino_pago_proveedor(),$this->connexion);
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
		$termino_pago_proveedorLogic->deepSave($proveedor->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($proveedor->getcuenta(),$this->connexion);
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepSave($proveedor->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		impuesto_data::save($proveedor->getimpuesto(),$this->connexion);
		$impuestoLogic= new impuesto_logic($this->connexion);
		$impuestoLogic->deepSave($proveedor->getimpuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		retencion_data::save($proveedor->getretencion(),$this->connexion);
		$retencionLogic= new retencion_logic($this->connexion);
		$retencionLogic->deepSave($proveedor->getretencion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		retencion_fuente_data::save($proveedor->getretencion_fuente(),$this->connexion);
		$retencion_fuenteLogic= new retencion_fuente_logic($this->connexion);
		$retencion_fuenteLogic->deepSave($proveedor->getretencion_fuente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		retencion_ica_data::save($proveedor->getretencion_ica(),$this->connexion);
		$retencion_icaLogic= new retencion_ica_logic($this->connexion);
		$retencion_icaLogic->deepSave($proveedor->getretencion_ica(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		otro_impuesto_data::save($proveedor->getotro_impuesto(),$this->connexion);
		$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
		$otro_impuestoLogic->deepSave($proveedor->getotro_impuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($proveedor->getlista_precios() as $listaprecio) {
			$listaprecioLogic= new lista_precio_logic($this->connexion);
			$listaprecio->setid_proveedor($proveedor->getId());
			lista_precio_data::save($listaprecio,$this->connexion);
			$listaprecioLogic->deepSave($listaprecio,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($proveedor->getorden_compras() as $ordencompra) {
			$ordencompraLogic= new orden_compra_logic($this->connexion);
			$ordencompra->setid_proveedor($proveedor->getId());
			orden_compra_data::save($ordencompra,$this->connexion);
			$ordencompraLogic->deepSave($ordencompra,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($proveedor->getcuenta_pagars() as $cuentapagar) {
			$cuentapagarLogic= new cuenta_pagar_logic($this->connexion);
			$cuentapagar->setid_proveedor($proveedor->getId());
			cuenta_pagar_data::save($cuentapagar,$this->connexion);
			$cuentapagarLogic->deepSave($cuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($proveedor->getimagen_proveedors() as $imagenproveedor) {
			$imagenproveedorLogic= new imagen_proveedor_logic($this->connexion);
			$imagenproveedor->setid_proveedor($proveedor->getId());
			imagen_proveedor_data::save($imagenproveedor,$this->connexion);
			$imagenproveedorLogic->deepSave($imagenproveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($proveedor->getdocumento_proveedors() as $documentoproveedor) {
			$documentoproveedorLogic= new documento_proveedor_logic($this->connexion);
			$documentoproveedor->setid_proveedor($proveedor->getId());
			documento_proveedor_data::save($documentoproveedor,$this->connexion);
			$documentoproveedorLogic->deepSave($documentoproveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($proveedor->getotro_suplidors() as $otrosuplidor) {
			$otrosuplidorLogic= new otro_suplidor_logic($this->connexion);
			$otrosuplidor->setid_proveedor($proveedor->getId());
			otro_suplidor_data::save($otrosuplidor,$this->connexion);
			$otrosuplidorLogic->deepSave($otrosuplidor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($proveedor->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($proveedor->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_persona::$class.'') {
				tipo_persona_data::save($proveedor->gettipo_persona(),$this->connexion);
				$tipo_personaLogic= new tipo_persona_logic($this->connexion);
				$tipo_personaLogic->deepSave($proveedor->gettipo_persona(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==categoria_proveedor::$class.'') {
				categoria_proveedor_data::save($proveedor->getcategoria_proveedor(),$this->connexion);
				$categoria_proveedorLogic= new categoria_proveedor_logic($this->connexion);
				$categoria_proveedorLogic->deepSave($proveedor->getcategoria_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==giro_negocio_proveedor::$class.'') {
				giro_negocio_proveedor_data::save($proveedor->getgiro_negocio_proveedor(),$this->connexion);
				$giro_negocio_proveedorLogic= new giro_negocio_proveedor_logic($this->connexion);
				$giro_negocio_proveedorLogic->deepSave($proveedor->getgiro_negocio_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==pais::$class.'') {
				pais_data::save($proveedor->getpais(),$this->connexion);
				$paisLogic= new pais_logic($this->connexion);
				$paisLogic->deepSave($proveedor->getpais(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==provincia::$class.'') {
				provincia_data::save($proveedor->getprovincia(),$this->connexion);
				$provinciaLogic= new provincia_logic($this->connexion);
				$provinciaLogic->deepSave($proveedor->getprovincia(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ciudad::$class.'') {
				ciudad_data::save($proveedor->getciudad(),$this->connexion);
				$ciudadLogic= new ciudad_logic($this->connexion);
				$ciudadLogic->deepSave($proveedor->getciudad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				vendedor_data::save($proveedor->getvendedor(),$this->connexion);
				$vendedorLogic= new vendedor_logic($this->connexion);
				$vendedorLogic->deepSave($proveedor->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				termino_pago_proveedor_data::save($proveedor->gettermino_pago_proveedor(),$this->connexion);
				$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
				$termino_pago_proveedorLogic->deepSave($proveedor->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($proveedor->getcuenta(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($proveedor->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==impuesto::$class.'') {
				impuesto_data::save($proveedor->getimpuesto(),$this->connexion);
				$impuestoLogic= new impuesto_logic($this->connexion);
				$impuestoLogic->deepSave($proveedor->getimpuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==retencion::$class.'') {
				retencion_data::save($proveedor->getretencion(),$this->connexion);
				$retencionLogic= new retencion_logic($this->connexion);
				$retencionLogic->deepSave($proveedor->getretencion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==retencion_fuente::$class.'') {
				retencion_fuente_data::save($proveedor->getretencion_fuente(),$this->connexion);
				$retencion_fuenteLogic= new retencion_fuente_logic($this->connexion);
				$retencion_fuenteLogic->deepSave($proveedor->getretencion_fuente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==retencion_ica::$class.'') {
				retencion_ica_data::save($proveedor->getretencion_ica(),$this->connexion);
				$retencion_icaLogic= new retencion_ica_logic($this->connexion);
				$retencion_icaLogic->deepSave($proveedor->getretencion_ica(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==otro_impuesto::$class.'') {
				otro_impuesto_data::save($proveedor->getotro_impuesto(),$this->connexion);
				$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
				$otro_impuestoLogic->deepSave($proveedor->getotro_impuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==lista_precio::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($proveedor->getlista_precios() as $listaprecio) {
					$listaprecioLogic= new lista_precio_logic($this->connexion);
					$listaprecio->setid_proveedor($proveedor->getId());
					lista_precio_data::save($listaprecio,$this->connexion);
					$listaprecioLogic->deepSave($listaprecio,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($proveedor->getorden_compras() as $ordencompra) {
					$ordencompraLogic= new orden_compra_logic($this->connexion);
					$ordencompra->setid_proveedor($proveedor->getId());
					orden_compra_data::save($ordencompra,$this->connexion);
					$ordencompraLogic->deepSave($ordencompra,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($proveedor->getcuenta_pagars() as $cuentapagar) {
					$cuentapagarLogic= new cuenta_pagar_logic($this->connexion);
					$cuentapagar->setid_proveedor($proveedor->getId());
					cuenta_pagar_data::save($cuentapagar,$this->connexion);
					$cuentapagarLogic->deepSave($cuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==imagen_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($proveedor->getimagen_proveedors() as $imagenproveedor) {
					$imagenproveedorLogic= new imagen_proveedor_logic($this->connexion);
					$imagenproveedor->setid_proveedor($proveedor->getId());
					imagen_proveedor_data::save($imagenproveedor,$this->connexion);
					$imagenproveedorLogic->deepSave($imagenproveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==documento_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($proveedor->getdocumento_proveedors() as $documentoproveedor) {
					$documentoproveedorLogic= new documento_proveedor_logic($this->connexion);
					$documentoproveedor->setid_proveedor($proveedor->getId());
					documento_proveedor_data::save($documentoproveedor,$this->connexion);
					$documentoproveedorLogic->deepSave($documentoproveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==otro_suplidor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($proveedor->getotro_suplidors() as $otrosuplidor) {
					$otrosuplidorLogic= new otro_suplidor_logic($this->connexion);
					$otrosuplidor->setid_proveedor($proveedor->getId());
					otro_suplidor_data::save($otrosuplidor,$this->connexion);
					$otrosuplidorLogic->deepSave($otrosuplidor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($proveedor->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($proveedor->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_persona::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_persona_data::save($proveedor->gettipo_persona(),$this->connexion);
			$tipo_personaLogic= new tipo_persona_logic($this->connexion);
			$tipo_personaLogic->deepSave($proveedor->gettipo_persona(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==categoria_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			categoria_proveedor_data::save($proveedor->getcategoria_proveedor(),$this->connexion);
			$categoria_proveedorLogic= new categoria_proveedor_logic($this->connexion);
			$categoria_proveedorLogic->deepSave($proveedor->getcategoria_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==giro_negocio_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			giro_negocio_proveedor_data::save($proveedor->getgiro_negocio_proveedor(),$this->connexion);
			$giro_negocio_proveedorLogic= new giro_negocio_proveedor_logic($this->connexion);
			$giro_negocio_proveedorLogic->deepSave($proveedor->getgiro_negocio_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			pais_data::save($proveedor->getpais(),$this->connexion);
			$paisLogic= new pais_logic($this->connexion);
			$paisLogic->deepSave($proveedor->getpais(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==provincia::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			provincia_data::save($proveedor->getprovincia(),$this->connexion);
			$provinciaLogic= new provincia_logic($this->connexion);
			$provinciaLogic->deepSave($proveedor->getprovincia(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ciudad_data::save($proveedor->getciudad(),$this->connexion);
			$ciudadLogic= new ciudad_logic($this->connexion);
			$ciudadLogic->deepSave($proveedor->getciudad(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			vendedor_data::save($proveedor->getvendedor(),$this->connexion);
			$vendedorLogic= new vendedor_logic($this->connexion);
			$vendedorLogic->deepSave($proveedor->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_proveedor_data::save($proveedor->gettermino_pago_proveedor(),$this->connexion);
			$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
			$termino_pago_proveedorLogic->deepSave($proveedor->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($proveedor->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($proveedor->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			impuesto_data::save($proveedor->getimpuesto(),$this->connexion);
			$impuestoLogic= new impuesto_logic($this->connexion);
			$impuestoLogic->deepSave($proveedor->getimpuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			retencion_data::save($proveedor->getretencion(),$this->connexion);
			$retencionLogic= new retencion_logic($this->connexion);
			$retencionLogic->deepSave($proveedor->getretencion(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion_fuente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			retencion_fuente_data::save($proveedor->getretencion_fuente(),$this->connexion);
			$retencion_fuenteLogic= new retencion_fuente_logic($this->connexion);
			$retencion_fuenteLogic->deepSave($proveedor->getretencion_fuente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==retencion_ica::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			retencion_ica_data::save($proveedor->getretencion_ica(),$this->connexion);
			$retencion_icaLogic= new retencion_ica_logic($this->connexion);
			$retencion_icaLogic->deepSave($proveedor->getretencion_ica(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==otro_impuesto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			otro_impuesto_data::save($proveedor->getotro_impuesto(),$this->connexion);
			$otro_impuestoLogic= new otro_impuesto_logic($this->connexion);
			$otro_impuestoLogic->deepSave($proveedor->getotro_impuesto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
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

			foreach($proveedor->getlista_precios() as $listaprecio) {
				$listaprecioLogic= new lista_precio_logic($this->connexion);
				$listaprecio->setid_proveedor($proveedor->getId());
				lista_precio_data::save($listaprecio,$this->connexion);
				$listaprecioLogic->deepSave($listaprecio,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($proveedor->getorden_compras() as $ordencompra) {
				$ordencompraLogic= new orden_compra_logic($this->connexion);
				$ordencompra->setid_proveedor($proveedor->getId());
				orden_compra_data::save($ordencompra,$this->connexion);
				$ordencompraLogic->deepSave($ordencompra,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($proveedor->getcuenta_pagars() as $cuentapagar) {
				$cuentapagarLogic= new cuenta_pagar_logic($this->connexion);
				$cuentapagar->setid_proveedor($proveedor->getId());
				cuenta_pagar_data::save($cuentapagar,$this->connexion);
				$cuentapagarLogic->deepSave($cuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_proveedor::$class);

			foreach($proveedor->getimagen_proveedors() as $imagenproveedor) {
				$imagenproveedorLogic= new imagen_proveedor_logic($this->connexion);
				$imagenproveedor->setid_proveedor($proveedor->getId());
				imagen_proveedor_data::save($imagenproveedor,$this->connexion);
				$imagenproveedorLogic->deepSave($imagenproveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(documento_proveedor::$class);

			foreach($proveedor->getdocumento_proveedors() as $documentoproveedor) {
				$documentoproveedorLogic= new documento_proveedor_logic($this->connexion);
				$documentoproveedor->setid_proveedor($proveedor->getId());
				documento_proveedor_data::save($documentoproveedor,$this->connexion);
				$documentoproveedorLogic->deepSave($documentoproveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($proveedor->getotro_suplidors() as $otrosuplidor) {
				$otrosuplidorLogic= new otro_suplidor_logic($this->connexion);
				$otrosuplidor->setid_proveedor($proveedor->getId());
				otro_suplidor_data::save($otrosuplidor,$this->connexion);
				$otrosuplidorLogic->deepSave($otrosuplidor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				proveedor_data::save($proveedor, $this->connexion);
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
			
			$this->deepLoad($this->proveedor,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->proveedors as $proveedor) {
				$this->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
								
				proveedor_util::refrescarFKDescripciones($this->proveedors);
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
			
			foreach($this->proveedors as $proveedor) {
				$this->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->proveedor,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->proveedors as $proveedor) {
				$this->deepSave($proveedor,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->proveedors as $proveedor) {
				$this->deepSave($proveedor,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(categoria_proveedor::$class);
				$classes[]=new Classe(giro_negocio_proveedor::$class);
				$classes[]=new Classe(pais::$class);
				$classes[]=new Classe(provincia::$class);
				$classes[]=new Classe(ciudad::$class);
				$classes[]=new Classe(vendedor::$class);
				$classes[]=new Classe(termino_pago_proveedor::$class);
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
					if($clas->clas==categoria_proveedor::$class) {
						$classes[]=new Classe(categoria_proveedor::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==giro_negocio_proveedor::$class) {
						$classes[]=new Classe(giro_negocio_proveedor::$class);
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
					if($clas->clas==termino_pago_proveedor::$class) {
						$classes[]=new Classe(termino_pago_proveedor::$class);
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
					if($clas->clas==categoria_proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(categoria_proveedor::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==giro_negocio_proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(giro_negocio_proveedor::$class);
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
					if($clas->clas==termino_pago_proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(termino_pago_proveedor::$class);
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
				
				$classes[]=new Classe(lista_precio::$class);
				$classes[]=new Classe(orden_compra::$class);
				$classes[]=new Classe(cuenta_pagar::$class);
				$classes[]=new Classe(imagen_proveedor::$class);
				$classes[]=new Classe(documento_proveedor::$class);
				$classes[]=new Classe(otro_suplidor::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==lista_precio::$class) {
						$classes[]=new Classe(lista_precio::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==orden_compra::$class) {
						$classes[]=new Classe(orden_compra::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==cuenta_pagar::$class) {
						$classes[]=new Classe(cuenta_pagar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==imagen_proveedor::$class) {
						$classes[]=new Classe(imagen_proveedor::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==documento_proveedor::$class) {
						$classes[]=new Classe(documento_proveedor::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==otro_suplidor::$class) {
						$classes[]=new Classe(otro_suplidor::$class);
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
					if($clas->clas==imagen_proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(imagen_proveedor::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==documento_proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(documento_proveedor::$class);
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

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getproveedor() : ?proveedor {	
		/*
		proveedor_logic_add::checkproveedorToGet($this->proveedor,$this->datosCliente);
		proveedor_logic_add::updateproveedorToGet($this->proveedor);
		*/
			
		return $this->proveedor;
	}
		
	public function setproveedor(proveedor $newproveedor) {
		$this->proveedor = $newproveedor;
	}
	
	public function getproveedors() : array {		
		/*
		proveedor_logic_add::checkproveedorToGets($this->proveedors,$this->datosCliente);
		
		foreach ($this->proveedors as $proveedorLocal ) {
			proveedor_logic_add::updateproveedorToGet($proveedorLocal);
		}
		*/
		
		return $this->proveedors;
	}
	
	public function setproveedors(array $newproveedors) {
		$this->proveedors = $newproveedors;
	}
	
	public function getproveedorDataAccess() : proveedor_data {
		return $this->proveedorDataAccess;
	}
	
	public function setproveedorDataAccess(proveedor_data $newproveedorDataAccess) {
		$this->proveedorDataAccess = $newproveedorDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        proveedor_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		orden_compra_detalle_logic::$logger;
		debito_cuenta_pagar_logic::$logger;
		credito_cuenta_pagar_logic::$logger;
		pago_cuenta_pagar_logic::$logger;
		documento_cliente_logic::$logger;
		cotizacion_detalle_logic::$logger;
		lista_producto_logic::$logger;
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
