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

namespace com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_param_return;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\presentation\session\termino_pago_cliente_session;

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

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\data\termino_pago_cliente_data;

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


use com\bydan\contabilidad\facturacion\parametro_facturacion\business\entity\parametro_facturacion;
use com\bydan\contabilidad\facturacion\parametro_facturacion\business\data\parametro_facturacion_data;
use com\bydan\contabilidad\facturacion\parametro_facturacion\business\logic\parametro_facturacion_logic;
use com\bydan\contabilidad\facturacion\parametro_facturacion\util\parametro_facturacion_carga;
use com\bydan\contabilidad\facturacion\parametro_facturacion\util\parametro_facturacion_util;

use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\business\entity\debito_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\business\data\debito_cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\business\logic\debito_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util\debito_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util\debito_cuenta_cobrar_util;

use com\bydan\contabilidad\facturacion\devolucion_factura\business\entity\devolucion_factura;
use com\bydan\contabilidad\facturacion\devolucion_factura\business\data\devolucion_factura_data;
use com\bydan\contabilidad\facturacion\devolucion_factura\business\logic\devolucion_factura_logic;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;

use com\bydan\contabilidad\facturacion\factura_lote\business\entity\factura_lote;
use com\bydan\contabilidad\facturacion\factura_lote\business\data\factura_lote_data;
use com\bydan\contabilidad\facturacion\factura_lote\business\logic\factura_lote_logic;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_carga;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;

use com\bydan\contabilidad\estimados\estimado\business\entity\estimado;
use com\bydan\contabilidad\estimados\estimado\business\data\estimado_data;
use com\bydan\contabilidad\estimados\estimado\business\logic\estimado_logic;
use com\bydan\contabilidad\estimados\estimado\util\estimado_carga;
use com\bydan\contabilidad\estimados\estimado\util\estimado_util;

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\data\cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\logic\cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

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

//REL DETALLES

use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\util\devolucion_factura_detalle_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\business\logic\devolucion_factura_detalle_logic;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\util\factura_lote_detalle_carga;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\business\logic\factura_lote_detalle_logic;
use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_carga;
use com\bydan\contabilidad\facturacion\factura_modelo\business\logic\factura_modelo_logic;
use com\bydan\contabilidad\estimados\imagen_estimado\util\imagen_estimado_carga;
use com\bydan\contabilidad\estimados\imagen_estimado\business\logic\imagen_estimado_logic;
use com\bydan\contabilidad\estimados\estimado_detalle\util\estimado_detalle_carga;
use com\bydan\contabilidad\estimados\estimado_detalle\business\logic\estimado_detalle_logic;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\util\pago_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\util\credito_cuenta_cobrar_carga;



class termino_pago_cliente_logic  extends GeneralEntityLogic implements termino_pago_cliente_logicI {	
	/*GENERAL*/
	public termino_pago_cliente_data $termino_pago_clienteDataAccess;
	//public ?termino_pago_cliente_logic_add $termino_pago_clienteLogicAdditional=null;
	public ?termino_pago_cliente $termino_pago_cliente;
	public array $termino_pago_clientes;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->termino_pago_clienteDataAccess = new termino_pago_cliente_data();			
			$this->termino_pago_clientes = array();
			$this->termino_pago_cliente = new termino_pago_cliente();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->termino_pago_clienteLogicAdditional = new termino_pago_cliente_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->termino_pago_clienteLogicAdditional==null) {
		//	$this->termino_pago_clienteLogicAdditional=new termino_pago_cliente_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->termino_pago_clienteDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->termino_pago_clienteDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->termino_pago_clienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->termino_pago_clienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->termino_pago_clientes = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->termino_pago_clientes=$this->termino_pago_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_cliente_util::refrescarFKDescripciones($this->termino_pago_clientes);
			}
			
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGets($this->termino_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_clientes);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->termino_pago_clientes = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->termino_pago_clientes=$this->termino_pago_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_cliente_util::refrescarFKDescripciones($this->termino_pago_clientes);
			}
			
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGets($this->termino_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_clientes);
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
		$this->termino_pago_cliente = new termino_pago_cliente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->termino_pago_cliente=$this->termino_pago_clienteDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->termino_pago_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				termino_pago_cliente_util::refrescarFKDescripcion($this->termino_pago_cliente);
			}
						
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGet($this->termino_pago_cliente,$this->datosCliente);
			//termino_pago_cliente_logic_add::updatetermino_pago_clienteToGet($this->termino_pago_cliente);
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
		$this->termino_pago_cliente = new  termino_pago_cliente();
		  		  
        try {		
			$this->termino_pago_cliente=$this->termino_pago_clienteDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->termino_pago_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				termino_pago_cliente_util::refrescarFKDescripcion($this->termino_pago_cliente);
			}
			
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGet($this->termino_pago_cliente,$this->datosCliente);
			//termino_pago_cliente_logic_add::updatetermino_pago_clienteToGet($this->termino_pago_cliente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?termino_pago_cliente {
		$termino_pago_clienteLogic = new  termino_pago_cliente_logic();
		  		  
        try {		
			$termino_pago_clienteLogic->setConnexion($connexion);			
			$termino_pago_clienteLogic->getEntity($id);			
			return $termino_pago_clienteLogic->gettermino_pago_cliente();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->termino_pago_cliente = new  termino_pago_cliente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->termino_pago_cliente=$this->termino_pago_clienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->termino_pago_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				termino_pago_cliente_util::refrescarFKDescripcion($this->termino_pago_cliente);
			}
			
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGet($this->termino_pago_cliente,$this->datosCliente);
			//termino_pago_cliente_logic_add::updatetermino_pago_clienteToGet($this->termino_pago_cliente);
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
		$this->termino_pago_cliente = new  termino_pago_cliente();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->termino_pago_cliente=$this->termino_pago_clienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->termino_pago_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				termino_pago_cliente_util::refrescarFKDescripcion($this->termino_pago_cliente);
			}
			
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGet($this->termino_pago_cliente,$this->datosCliente);
			//termino_pago_cliente_logic_add::updatetermino_pago_clienteToGet($this->termino_pago_cliente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?termino_pago_cliente {
		$termino_pago_clienteLogic = new  termino_pago_cliente_logic();
		  		  
        try {		
			$termino_pago_clienteLogic->setConnexion($connexion);			
			$termino_pago_clienteLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $termino_pago_clienteLogic->gettermino_pago_cliente();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->termino_pago_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->termino_pago_clientes=$this->termino_pago_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_cliente_util::refrescarFKDescripciones($this->termino_pago_clientes);
			}
			
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGets($this->termino_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_clientes);			
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
		$this->termino_pago_clientes = array();
		  		  
        try {			
			$this->termino_pago_clientes=$this->termino_pago_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_cliente_util::refrescarFKDescripciones($this->termino_pago_clientes);
			}
			
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGets($this->termino_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->termino_pago_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->termino_pago_clientes=$this->termino_pago_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_cliente_util::refrescarFKDescripciones($this->termino_pago_clientes);
			}
			
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGets($this->termino_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_clientes);
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
		$this->termino_pago_clientes = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->termino_pago_clientes=$this->termino_pago_clienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_cliente_util::refrescarFKDescripciones($this->termino_pago_clientes);
			}
			
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGets($this->termino_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$termino_pago_clienteLogic = new  termino_pago_cliente_logic();
		  		  
        try {		
			$termino_pago_clienteLogic->setConnexion($connexion);			
			$termino_pago_clienteLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $termino_pago_clienteLogic->gettermino_pago_clientes();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->termino_pago_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->termino_pago_clientes=$this->termino_pago_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_cliente_util::refrescarFKDescripciones($this->termino_pago_clientes);
			}
			
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGets($this->termino_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_clientes);
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
		$this->termino_pago_clientes = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->termino_pago_clientes=$this->termino_pago_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_cliente_util::refrescarFKDescripciones($this->termino_pago_clientes);
			}
			
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGets($this->termino_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_clientes);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->termino_pago_clientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->termino_pago_clientes=$this->termino_pago_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_cliente_util::refrescarFKDescripciones($this->termino_pago_clientes);
			}
			
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGets($this->termino_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_clientes);
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
		$this->termino_pago_clientes = array();
		  		  
        try {			
			$this->termino_pago_clientes=$this->termino_pago_clienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_cliente_util::refrescarFKDescripciones($this->termino_pago_clientes);
			}	
			
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGets($this->termino_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_clientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->termino_pago_clientes = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->termino_pago_clientes=$this->termino_pago_clienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_cliente_util::refrescarFKDescripciones($this->termino_pago_clientes);
			}
			
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGets($this->termino_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_clientes);
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
		$this->termino_pago_clientes = array();
		  		  
        try {		
			$this->termino_pago_clientes=$this->termino_pago_clienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_cliente_util::refrescarFKDescripciones($this->termino_pago_clientes);
			}
			
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGets($this->termino_pago_clientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->termino_pago_clientes);

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
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,termino_pago_cliente_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->termino_pago_clientes=$this->termino_pago_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				termino_pago_cliente_util::refrescarFKDescripciones($this->termino_pago_clientes);
			}
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGets($this->termino_pago_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->termino_pago_clientes);

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
			$parameterSelectionGeneralid_cuenta->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta,termino_pago_cliente_util::$ID_CUENTA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta);

			$this->termino_pago_clientes=$this->termino_pago_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				termino_pago_cliente_util::refrescarFKDescripciones($this->termino_pago_clientes);
			}
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGets($this->termino_pago_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->termino_pago_clientes);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,termino_pago_cliente_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->termino_pago_clientes=$this->termino_pago_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				termino_pago_cliente_util::refrescarFKDescripciones($this->termino_pago_clientes);
			}
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGets($this->termino_pago_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->termino_pago_clientes);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,termino_pago_cliente_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->termino_pago_clientes=$this->termino_pago_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				termino_pago_cliente_util::refrescarFKDescripciones($this->termino_pago_clientes);
			}
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGets($this->termino_pago_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->termino_pago_clientes);
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
			$parameterSelectionGeneralid_tipo_termino_pago->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_termino_pago,termino_pago_cliente_util::$ID_TIPO_TERMINO_PAGO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_termino_pago);

			$this->termino_pago_clientes=$this->termino_pago_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				termino_pago_cliente_util::refrescarFKDescripciones($this->termino_pago_clientes);
			}
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGets($this->termino_pago_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->termino_pago_clientes);

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
			$parameterSelectionGeneralid_tipo_termino_pago->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tipo_termino_pago,termino_pago_cliente_util::$ID_TIPO_TERMINO_PAGO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tipo_termino_pago);

			$this->termino_pago_clientes=$this->termino_pago_clienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				termino_pago_cliente_util::refrescarFKDescripciones($this->termino_pago_clientes);
			}
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToGets($this->termino_pago_clientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->termino_pago_clientes);
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
						
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToSave($this->termino_pago_cliente,$this->datosCliente,$this->connexion);	       
			//termino_pago_cliente_logic_add::updatetermino_pago_clienteToSave($this->termino_pago_cliente);			
			termino_pago_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->termino_pago_cliente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->termino_pago_clienteLogicAdditional->checkGeneralEntityToSave($this,$this->termino_pago_cliente,$this->datosCliente,$this->connexion);
			
			
			termino_pago_cliente_data::save($this->termino_pago_cliente, $this->connexion);	    	       	 				
			//termino_pago_cliente_logic_add::checktermino_pago_clienteToSaveAfter($this->termino_pago_cliente,$this->datosCliente,$this->connexion);			
			//$this->termino_pago_clienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->termino_pago_cliente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->termino_pago_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->termino_pago_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				termino_pago_cliente_util::refrescarFKDescripcion($this->termino_pago_cliente);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->termino_pago_cliente->getIsDeleted()) {
				$this->termino_pago_cliente=null;
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
						
			/*termino_pago_cliente_logic_add::checktermino_pago_clienteToSave($this->termino_pago_cliente,$this->datosCliente,$this->connexion);*/	        
			//termino_pago_cliente_logic_add::updatetermino_pago_clienteToSave($this->termino_pago_cliente);			
			//$this->termino_pago_clienteLogicAdditional->checkGeneralEntityToSave($this,$this->termino_pago_cliente,$this->datosCliente,$this->connexion);			
			termino_pago_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->termino_pago_cliente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			termino_pago_cliente_data::save($this->termino_pago_cliente, $this->connexion);	    	       	 						
			/*termino_pago_cliente_logic_add::checktermino_pago_clienteToSaveAfter($this->termino_pago_cliente,$this->datosCliente,$this->connexion);*/			
			//$this->termino_pago_clienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->termino_pago_cliente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->termino_pago_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->termino_pago_cliente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				termino_pago_cliente_util::refrescarFKDescripcion($this->termino_pago_cliente);				
			}
			
			if($this->termino_pago_cliente->getIsDeleted()) {
				$this->termino_pago_cliente=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(termino_pago_cliente $termino_pago_cliente,Connexion $connexion)  {
		$termino_pago_clienteLogic = new  termino_pago_cliente_logic();		  		  
        try {		
			$termino_pago_clienteLogic->setConnexion($connexion);			
			$termino_pago_clienteLogic->settermino_pago_cliente($termino_pago_cliente);			
			$termino_pago_clienteLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*termino_pago_cliente_logic_add::checktermino_pago_clienteToSaves($this->termino_pago_clientes,$this->datosCliente,$this->connexion);*/	        	
			//$this->termino_pago_clienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->termino_pago_clientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->termino_pago_clientes as $termino_pago_clienteLocal) {				
								
				//termino_pago_cliente_logic_add::updatetermino_pago_clienteToSave($termino_pago_clienteLocal);	        	
				termino_pago_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$termino_pago_clienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				termino_pago_cliente_data::save($termino_pago_clienteLocal, $this->connexion);				
			}
			
			/*termino_pago_cliente_logic_add::checktermino_pago_clienteToSavesAfter($this->termino_pago_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->termino_pago_clienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->termino_pago_clientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_cliente_util::refrescarFKDescripciones($this->termino_pago_clientes);
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
			/*termino_pago_cliente_logic_add::checktermino_pago_clienteToSaves($this->termino_pago_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->termino_pago_clienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->termino_pago_clientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->termino_pago_clientes as $termino_pago_clienteLocal) {				
								
				//termino_pago_cliente_logic_add::updatetermino_pago_clienteToSave($termino_pago_clienteLocal);	        	
				termino_pago_cliente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$termino_pago_clienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				termino_pago_cliente_data::save($termino_pago_clienteLocal, $this->connexion);				
			}			
			
			/*termino_pago_cliente_logic_add::checktermino_pago_clienteToSavesAfter($this->termino_pago_clientes,$this->datosCliente,$this->connexion);*/			
			//$this->termino_pago_clienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->termino_pago_clientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				termino_pago_cliente_util::refrescarFKDescripciones($this->termino_pago_clientes);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $termino_pago_clientes,Connexion $connexion)  {
		$termino_pago_clienteLogic = new  termino_pago_cliente_logic();
		  		  
        try {		
			$termino_pago_clienteLogic->setConnexion($connexion);			
			$termino_pago_clienteLogic->settermino_pago_clientes($termino_pago_clientes);			
			$termino_pago_clienteLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$termino_pago_clientesAux=array();
		
		foreach($this->termino_pago_clientes as $termino_pago_cliente) {
			if($termino_pago_cliente->getIsDeleted()==false) {
				$termino_pago_clientesAux[]=$termino_pago_cliente;
			}
		}
		
		$this->termino_pago_clientes=$termino_pago_clientesAux;
	}
	
	public function updateToGetsAuxiliar(array &$termino_pago_clientes) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->termino_pago_clientes as $termino_pago_cliente) {
				
				$termino_pago_cliente->setid_empresa_Descripcion(termino_pago_cliente_util::getempresaDescripcion($termino_pago_cliente->getempresa()));
				$termino_pago_cliente->setid_tipo_termino_pago_Descripcion(termino_pago_cliente_util::gettipo_termino_pagoDescripcion($termino_pago_cliente->gettipo_termino_pago()));
				$termino_pago_cliente->setid_cuenta_Descripcion(termino_pago_cliente_util::getcuentaDescripcion($termino_pago_cliente->getcuenta()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$termino_pago_cliente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$termino_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$termino_pago_cliente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$termino_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$termino_pago_cliente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$termino_pago_clienteForeignKey=new termino_pago_cliente_param_return();//termino_pago_clienteForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$termino_pago_clienteForeignKey,$termino_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_termino_pago',$strRecargarFkTipos,',')) {
				$this->cargarCombostipo_termino_pagosFK($this->connexion,$strRecargarFkQuery,$termino_pago_clienteForeignKey,$termino_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTipos,',')) {
				$this->cargarComboscuentasFK($this->connexion,$strRecargarFkQuery,$termino_pago_clienteForeignKey,$termino_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$termino_pago_clienteForeignKey,$termino_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tipo_termino_pago',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostipo_termino_pagosFK($this->connexion,' where id=-1 ',$termino_pago_clienteForeignKey,$termino_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuentasFK($this->connexion,' where id=-1 ',$termino_pago_clienteForeignKey,$termino_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $termino_pago_clienteForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$termino_pago_clienteForeignKey,$termino_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$termino_pago_clienteForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($termino_pago_cliente_session==null) {
			$termino_pago_cliente_session=new termino_pago_cliente_session();
		}
		
		if($termino_pago_cliente_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($termino_pago_clienteForeignKey->idempresaDefaultFK==0) {
					$termino_pago_clienteForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$termino_pago_clienteForeignKey->empresasFK[$empresaLocal->getId()]=termino_pago_cliente_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($termino_pago_cliente_session->bigidempresaActual!=null && $termino_pago_cliente_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($termino_pago_cliente_session->bigidempresaActual);//WithConnection

				$termino_pago_clienteForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=termino_pago_cliente_util::getempresaDescripcion($empresaLogic->getempresa());
				$termino_pago_clienteForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombostipo_termino_pagosFK($connexion=null,$strRecargarFkQuery='',$termino_pago_clienteForeignKey,$termino_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tipo_termino_pagoLogic= new tipo_termino_pago_logic();
		$pagination= new Pagination();
		$termino_pago_clienteForeignKey->tipo_termino_pagosFK=array();

		$tipo_termino_pagoLogic->setConnexion($connexion);
		$tipo_termino_pagoLogic->gettipo_termino_pagoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($termino_pago_cliente_session==null) {
			$termino_pago_cliente_session=new termino_pago_cliente_session();
		}
		
		if($termino_pago_cliente_session->bitBusquedaDesdeFKSesiontipo_termino_pago!=true) {
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
				if($termino_pago_clienteForeignKey->idtipo_termino_pagoDefaultFK==0) {
					$termino_pago_clienteForeignKey->idtipo_termino_pagoDefaultFK=$tipo_termino_pagoLocal->getId();
				}

				$termino_pago_clienteForeignKey->tipo_termino_pagosFK[$tipo_termino_pagoLocal->getId()]=termino_pago_cliente_util::gettipo_termino_pagoDescripcion($tipo_termino_pagoLocal);
			}

		} else {

			if($termino_pago_cliente_session->bigidtipo_termino_pagoActual!=null && $termino_pago_cliente_session->bigidtipo_termino_pagoActual > 0) {
				$tipo_termino_pagoLogic->getEntity($termino_pago_cliente_session->bigidtipo_termino_pagoActual);//WithConnection

				$termino_pago_clienteForeignKey->tipo_termino_pagosFK[$tipo_termino_pagoLogic->gettipo_termino_pago()->getId()]=termino_pago_cliente_util::gettipo_termino_pagoDescripcion($tipo_termino_pagoLogic->gettipo_termino_pago());
				$termino_pago_clienteForeignKey->idtipo_termino_pagoDefaultFK=$tipo_termino_pagoLogic->gettipo_termino_pago()->getId();
			}
		}
	}

	public function cargarComboscuentasFK($connexion=null,$strRecargarFkQuery='',$termino_pago_clienteForeignKey,$termino_pago_cliente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$termino_pago_clienteForeignKey->cuentasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($termino_pago_cliente_session==null) {
			$termino_pago_cliente_session=new termino_pago_cliente_session();
		}
		
		if($termino_pago_cliente_session->bitBusquedaDesdeFKSesioncuenta!=true) {
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
				if($termino_pago_clienteForeignKey->idcuentaDefaultFK==0) {
					$termino_pago_clienteForeignKey->idcuentaDefaultFK=$cuentaLocal->getId();
				}

				$termino_pago_clienteForeignKey->cuentasFK[$cuentaLocal->getId()]=termino_pago_cliente_util::getcuentaDescripcion($cuentaLocal);
			}

		} else {

			if($termino_pago_cliente_session->bigidcuentaActual!=null && $termino_pago_cliente_session->bigidcuentaActual > 0) {
				$cuentaLogic->getEntity($termino_pago_cliente_session->bigidcuentaActual);//WithConnection

				$termino_pago_clienteForeignKey->cuentasFK[$cuentaLogic->getcuenta()->getId()]=termino_pago_cliente_util::getcuentaDescripcion($cuentaLogic->getcuenta());
				$termino_pago_clienteForeignKey->idcuentaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($termino_pago_cliente,$parametrofacturacions,$debitocuentacobrars,$devolucionfacturas,$facturaloteid_termino_pagos,$estimados,$cuentacobrars,$clientes,$facturas,$consignacions) {
		$this->saveRelacionesBase($termino_pago_cliente,$parametrofacturacions,$debitocuentacobrars,$devolucionfacturas,$facturaloteid_termino_pagos,$estimados,$cuentacobrars,$clientes,$facturas,$consignacions,true);
	}

	public function saveRelaciones($termino_pago_cliente,$parametrofacturacions,$debitocuentacobrars,$devolucionfacturas,$facturaloteid_termino_pagos,$estimados,$cuentacobrars,$clientes,$facturas,$consignacions) {
		$this->saveRelacionesBase($termino_pago_cliente,$parametrofacturacions,$debitocuentacobrars,$devolucionfacturas,$facturaloteid_termino_pagos,$estimados,$cuentacobrars,$clientes,$facturas,$consignacions,false);
	}

	public function saveRelacionesBase($termino_pago_cliente,$parametrofacturacions=array(),$debitocuentacobrars=array(),$devolucionfacturas=array(),$facturaloteid_termino_pagos=array(),$estimados=array(),$cuentacobrars=array(),$clientes=array(),$facturas=array(),$consignacions=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$termino_pago_cliente->setparametro_facturacions($parametrofacturacions);
			$termino_pago_cliente->setdebito_cuenta_cobrars($debitocuentacobrars);
			$termino_pago_cliente->setdevolucion_facturas($devolucionfacturas);
			$termino_pago_cliente->setfactura_loteid_termino_pagos($facturaloteid_termino_pagos);
			$termino_pago_cliente->setestimados($estimados);
			$termino_pago_cliente->setcuenta_cobrars($cuentacobrars);
			$termino_pago_cliente->setclientes($clientes);
			$termino_pago_cliente->setfacturas($facturas);
			$termino_pago_cliente->setconsignacions($consignacions);
			$this->settermino_pago_cliente($termino_pago_cliente);

			if(true) {

				//termino_pago_cliente_logic_add::updateRelacionesToSave($termino_pago_cliente,$this);

				if(($this->termino_pago_cliente->getIsNew() || $this->termino_pago_cliente->getIsChanged()) && !$this->termino_pago_cliente->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($parametrofacturacions,$debitocuentacobrars,$devolucionfacturas,$facturaloteid_termino_pagos,$estimados,$cuentacobrars,$clientes,$facturas,$consignacions);

				} else if($this->termino_pago_cliente->getIsDeleted()) {
					$this->saveRelacionesDetalles($parametrofacturacions,$debitocuentacobrars,$devolucionfacturas,$facturaloteid_termino_pagos,$estimados,$cuentacobrars,$clientes,$facturas,$consignacions);
					$this->save();
				}

				//termino_pago_cliente_logic_add::updateRelacionesToSaveAfter($termino_pago_cliente,$this);

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
	
	
	public function saveRelacionesDetalles($parametrofacturacions=array(),$debitocuentacobrars=array(),$devolucionfacturas=array(),$facturaloteid_termino_pagos=array(),$estimados=array(),$cuentacobrars=array(),$clientes=array(),$facturas=array(),$consignacions=array()) {
		try {
	

			$idtermino_pago_clienteActual=$this->gettermino_pago_cliente()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/parametro_facturacion_carga.php');
			parametro_facturacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$parametrofacturacionLogic_Desde_termino_pago_cliente=new parametro_facturacion_logic();
			$parametrofacturacionLogic_Desde_termino_pago_cliente->setparametro_facturacions($parametrofacturacions);

			$parametrofacturacionLogic_Desde_termino_pago_cliente->setConnexion($this->getConnexion());
			$parametrofacturacionLogic_Desde_termino_pago_cliente->setDatosCliente($this->datosCliente);

			foreach($parametrofacturacionLogic_Desde_termino_pago_cliente->getparametro_facturacions() as $parametrofacturacion_Desde_termino_pago_cliente) {
				$parametrofacturacion_Desde_termino_pago_cliente->setid_termino_pago_cliente($idtermino_pago_clienteActual);
			}

			$parametrofacturacionLogic_Desde_termino_pago_cliente->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/debito_cuenta_cobrar_carga.php');
			debito_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$debitocuentacobrarLogic_Desde_termino_pago_cliente=new debito_cuenta_cobrar_logic();
			$debitocuentacobrarLogic_Desde_termino_pago_cliente->setdebito_cuenta_cobrars($debitocuentacobrars);

			$debitocuentacobrarLogic_Desde_termino_pago_cliente->setConnexion($this->getConnexion());
			$debitocuentacobrarLogic_Desde_termino_pago_cliente->setDatosCliente($this->datosCliente);

			foreach($debitocuentacobrarLogic_Desde_termino_pago_cliente->getdebito_cuenta_cobrars() as $debitocuentacobrar_Desde_termino_pago_cliente) {
				$debitocuentacobrar_Desde_termino_pago_cliente->setid_termino_pago_cliente($idtermino_pago_clienteActual);
			}

			$debitocuentacobrarLogic_Desde_termino_pago_cliente->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/devolucion_factura_carga.php');
			devolucion_factura_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$devolucionfacturaLogic_Desde_termino_pago_cliente=new devolucion_factura_logic();
			$devolucionfacturaLogic_Desde_termino_pago_cliente->setdevolucion_facturas($devolucionfacturas);

			$devolucionfacturaLogic_Desde_termino_pago_cliente->setConnexion($this->getConnexion());
			$devolucionfacturaLogic_Desde_termino_pago_cliente->setDatosCliente($this->datosCliente);

			foreach($devolucionfacturaLogic_Desde_termino_pago_cliente->getdevolucion_facturas() as $devolucionfactura_Desde_termino_pago_cliente) {
				$devolucionfactura_Desde_termino_pago_cliente->setid_termino_pago_cliente($idtermino_pago_clienteActual);

				$devolucionfacturaLogic_Desde_termino_pago_cliente->setdevolucion_factura($devolucionfactura_Desde_termino_pago_cliente);
				$devolucionfacturaLogic_Desde_termino_pago_cliente->save();

				$iddevolucion_facturaActual=$devolucion_factura_Desde_termino_pago_cliente->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/devolucion_factura_detalle_carga.php');
				devolucion_factura_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$devolucionfacturadetalleLogic_Desde_devolucion_factura=new devolucion_factura_detalle_logic();

				if($devolucion_factura_Desde_termino_pago_cliente->getdevolucion_factura_detalles()==null){
					$devolucion_factura_Desde_termino_pago_cliente->setdevolucion_factura_detalles(array());
				}

				$devolucionfacturadetalleLogic_Desde_devolucion_factura->setdevolucion_factura_detalles($devolucion_factura_Desde_termino_pago_cliente->getdevolucion_factura_detalles());

				$devolucionfacturadetalleLogic_Desde_devolucion_factura->setConnexion($this->getConnexion());
				$devolucionfacturadetalleLogic_Desde_devolucion_factura->setDatosCliente($this->datosCliente);

				foreach($devolucionfacturadetalleLogic_Desde_devolucion_factura->getdevolucion_factura_detalles() as $devolucionfacturadetalle_Desde_devolucion_factura) {
					$devolucionfacturadetalle_Desde_devolucion_factura->setid_devolucion_factura($iddevolucion_facturaActual);
				}

				$devolucionfacturadetalleLogic_Desde_devolucion_factura->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_lote_carga.php');
			factura_lote_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$facturaloteid_termino_pagoLogic_Desde_termino_pago_cliente=new factura_lote_logic();
			$facturaloteid_termino_pagoLogic_Desde_termino_pago_cliente->setfactura_lotes($facturaloteid_termino_pagos);

			$facturaloteid_termino_pagoLogic_Desde_termino_pago_cliente->setConnexion($this->getConnexion());
			$facturaloteid_termino_pagoLogic_Desde_termino_pago_cliente->setDatosCliente($this->datosCliente);

			foreach($facturaloteid_termino_pagoLogic_Desde_termino_pago_cliente->getfactura_lotes() as $facturalote_Desde_termino_pago_cliente) {
				$facturalote_Desde_termino_pago_cliente->setid_termino_pago($idtermino_pago_clienteActual);

				$facturaloteid_termino_pagoLogic_Desde_termino_pago_cliente->setfactura_lote($facturalote_Desde_termino_pago_cliente);
				$facturaloteid_termino_pagoLogic_Desde_termino_pago_cliente->save();

				$idfactura_loteActual=$factura_lote_Desde_termino_pago_cliente->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_lote_detalle_carga.php');
				factura_lote_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$facturalotedetalleLogic_Desde_factura_lote=new factura_lote_detalle_logic();

				if($factura_lote_Desde_termino_pago_cliente->getfactura_lote_detalles()==null){
					$factura_lote_Desde_termino_pago_cliente->setfactura_lote_detalles(array());
				}

				$facturalotedetalleLogic_Desde_factura_lote->setfactura_lote_detalles($factura_lote_Desde_termino_pago_cliente->getfactura_lote_detalles());

				$facturalotedetalleLogic_Desde_factura_lote->setConnexion($this->getConnexion());
				$facturalotedetalleLogic_Desde_factura_lote->setDatosCliente($this->datosCliente);

				foreach($facturalotedetalleLogic_Desde_factura_lote->getfactura_lote_detalles() as $facturalotedetalle_Desde_factura_lote) {
					$facturalotedetalle_Desde_factura_lote->setid_factura_lote($idfactura_loteActual);
				}

				$facturalotedetalleLogic_Desde_factura_lote->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_modelo_carga.php');
				factura_modelo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$facturamodeloLogic_Desde_factura_lote=new factura_modelo_logic();

				if($factura_lote_Desde_termino_pago_cliente->getfactura_modelos()==null){
					$factura_lote_Desde_termino_pago_cliente->setfactura_modelos(array());
				}

				$facturamodeloLogic_Desde_factura_lote->setfactura_modelos($factura_lote_Desde_termino_pago_cliente->getfactura_modelos());

				$facturamodeloLogic_Desde_factura_lote->setConnexion($this->getConnexion());
				$facturamodeloLogic_Desde_factura_lote->setDatosCliente($this->datosCliente);

				foreach($facturamodeloLogic_Desde_factura_lote->getfactura_modelos() as $facturamodelo_Desde_factura_lote) {
					$facturamodelo_Desde_factura_lote->setid_factura_lote($idfactura_loteActual);
				}

				$facturamodeloLogic_Desde_factura_lote->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/estimado_carga.php');
			estimado_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$estimadoLogic_Desde_termino_pago_cliente=new estimado_logic();
			$estimadoLogic_Desde_termino_pago_cliente->setestimados($estimados);

			$estimadoLogic_Desde_termino_pago_cliente->setConnexion($this->getConnexion());
			$estimadoLogic_Desde_termino_pago_cliente->setDatosCliente($this->datosCliente);

			foreach($estimadoLogic_Desde_termino_pago_cliente->getestimados() as $estimado_Desde_termino_pago_cliente) {
				$estimado_Desde_termino_pago_cliente->setid_termino_pago_cliente($idtermino_pago_clienteActual);

				$estimadoLogic_Desde_termino_pago_cliente->setestimado($estimado_Desde_termino_pago_cliente);
				$estimadoLogic_Desde_termino_pago_cliente->save();

				$idestimadoActual=$estimado_Desde_termino_pago_cliente->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/imagen_estimado_carga.php');
				imagen_estimado_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$imagenestimadoLogic_Desde_estimado=new imagen_estimado_logic();

				if($estimado_Desde_termino_pago_cliente->getimagen_estimados()==null){
					$estimado_Desde_termino_pago_cliente->setimagen_estimados(array());
				}

				$imagenestimadoLogic_Desde_estimado->setimagen_estimados($estimado_Desde_termino_pago_cliente->getimagen_estimados());

				$imagenestimadoLogic_Desde_estimado->setConnexion($this->getConnexion());
				$imagenestimadoLogic_Desde_estimado->setDatosCliente($this->datosCliente);

				foreach($imagenestimadoLogic_Desde_estimado->getimagen_estimados() as $imagenestimado_Desde_estimado) {
					$imagenestimado_Desde_estimado->setid_estimado($idestimadoActual);
				}

				$imagenestimadoLogic_Desde_estimado->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/estimado_detalle_carga.php');
				estimado_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$estimadodetalleLogic_Desde_estimado=new estimado_detalle_logic();

				if($estimado_Desde_termino_pago_cliente->getestimado_detalles()==null){
					$estimado_Desde_termino_pago_cliente->setestimado_detalles(array());
				}

				$estimadodetalleLogic_Desde_estimado->setestimado_detalles($estimado_Desde_termino_pago_cliente->getestimado_detalles());

				$estimadodetalleLogic_Desde_estimado->setConnexion($this->getConnexion());
				$estimadodetalleLogic_Desde_estimado->setDatosCliente($this->datosCliente);

				foreach($estimadodetalleLogic_Desde_estimado->getestimado_detalles() as $estimadodetalle_Desde_estimado) {
					$estimadodetalle_Desde_estimado->setid_estimado($idestimadoActual);
				}

				$estimadodetalleLogic_Desde_estimado->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cuenta_cobrar_carga.php');
			cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cuentacobrarLogic_Desde_termino_pago_cliente=new cuenta_cobrar_logic();
			$cuentacobrarLogic_Desde_termino_pago_cliente->setcuenta_cobrars($cuentacobrars);

			$cuentacobrarLogic_Desde_termino_pago_cliente->setConnexion($this->getConnexion());
			$cuentacobrarLogic_Desde_termino_pago_cliente->setDatosCliente($this->datosCliente);

			foreach($cuentacobrarLogic_Desde_termino_pago_cliente->getcuenta_cobrars() as $cuentacobrar_Desde_termino_pago_cliente) {
				$cuentacobrar_Desde_termino_pago_cliente->setid_termino_pago_cliente($idtermino_pago_clienteActual);

				$cuentacobrarLogic_Desde_termino_pago_cliente->setcuenta_cobrar($cuentacobrar_Desde_termino_pago_cliente);
				$cuentacobrarLogic_Desde_termino_pago_cliente->save();

				$idcuenta_cobrarActual=$cuenta_cobrar_Desde_termino_pago_cliente->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/debito_cuenta_cobrar_carga.php');
				debito_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$debitocuentacobrarLogic_Desde_cuenta_cobrar=new debito_cuenta_cobrar_logic();

				if($cuenta_cobrar_Desde_termino_pago_cliente->getdebito_cuenta_cobrars()==null){
					$cuenta_cobrar_Desde_termino_pago_cliente->setdebito_cuenta_cobrars(array());
				}

				$debitocuentacobrarLogic_Desde_cuenta_cobrar->setdebito_cuenta_cobrars($cuenta_cobrar_Desde_termino_pago_cliente->getdebito_cuenta_cobrars());

				$debitocuentacobrarLogic_Desde_cuenta_cobrar->setConnexion($this->getConnexion());
				$debitocuentacobrarLogic_Desde_cuenta_cobrar->setDatosCliente($this->datosCliente);

				foreach($debitocuentacobrarLogic_Desde_cuenta_cobrar->getdebito_cuenta_cobrars() as $debitocuentacobrar_Desde_cuenta_cobrar) {
					$debitocuentacobrar_Desde_cuenta_cobrar->setid_cuenta_cobrar($idcuenta_cobrarActual);
				}

				$debitocuentacobrarLogic_Desde_cuenta_cobrar->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/pago_cuenta_cobrar_carga.php');
				pago_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$pagocuentacobrarLogic_Desde_cuenta_cobrar=new pago_cuenta_cobrar_logic();

				if($cuenta_cobrar_Desde_termino_pago_cliente->getpago_cuenta_cobrars()==null){
					$cuenta_cobrar_Desde_termino_pago_cliente->setpago_cuenta_cobrars(array());
				}

				$pagocuentacobrarLogic_Desde_cuenta_cobrar->setpago_cuenta_cobrars($cuenta_cobrar_Desde_termino_pago_cliente->getpago_cuenta_cobrars());

				$pagocuentacobrarLogic_Desde_cuenta_cobrar->setConnexion($this->getConnexion());
				$pagocuentacobrarLogic_Desde_cuenta_cobrar->setDatosCliente($this->datosCliente);

				foreach($pagocuentacobrarLogic_Desde_cuenta_cobrar->getpago_cuenta_cobrars() as $pagocuentacobrar_Desde_cuenta_cobrar) {
					$pagocuentacobrar_Desde_cuenta_cobrar->setid_cuenta_cobrar($idcuenta_cobrarActual);
				}

				$pagocuentacobrarLogic_Desde_cuenta_cobrar->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/credito_cuenta_cobrar_carga.php');
				credito_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$creditocuentacobrarLogic_Desde_cuenta_cobrar=new credito_cuenta_cobrar_logic();

				if($cuenta_cobrar_Desde_termino_pago_cliente->getcredito_cuenta_cobrars()==null){
					$cuenta_cobrar_Desde_termino_pago_cliente->setcredito_cuenta_cobrars(array());
				}

				$creditocuentacobrarLogic_Desde_cuenta_cobrar->setcredito_cuenta_cobrars($cuenta_cobrar_Desde_termino_pago_cliente->getcredito_cuenta_cobrars());

				$creditocuentacobrarLogic_Desde_cuenta_cobrar->setConnexion($this->getConnexion());
				$creditocuentacobrarLogic_Desde_cuenta_cobrar->setDatosCliente($this->datosCliente);

				foreach($creditocuentacobrarLogic_Desde_cuenta_cobrar->getcredito_cuenta_cobrars() as $creditocuentacobrar_Desde_cuenta_cobrar) {
					$creditocuentacobrar_Desde_cuenta_cobrar->setid_cuenta_cobrar($idcuenta_cobrarActual);
				}

				$creditocuentacobrarLogic_Desde_cuenta_cobrar->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cliente_carga.php');
			cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$clienteLogic_Desde_termino_pago_cliente=new cliente_logic();
			$clienteLogic_Desde_termino_pago_cliente->setclientes($clientes);

			$clienteLogic_Desde_termino_pago_cliente->setConnexion($this->getConnexion());
			$clienteLogic_Desde_termino_pago_cliente->setDatosCliente($this->datosCliente);

			foreach($clienteLogic_Desde_termino_pago_cliente->getclientes() as $cliente_Desde_termino_pago_cliente) {
				$cliente_Desde_termino_pago_cliente->setid_termino_pago_cliente($idtermino_pago_clienteActual);

				$clienteLogic_Desde_termino_pago_cliente->setcliente($cliente_Desde_termino_pago_cliente);
				$clienteLogic_Desde_termino_pago_cliente->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_carga.php');
			factura_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$facturaLogic_Desde_termino_pago_cliente=new factura_logic();
			$facturaLogic_Desde_termino_pago_cliente->setfacturas($facturas);

			$facturaLogic_Desde_termino_pago_cliente->setConnexion($this->getConnexion());
			$facturaLogic_Desde_termino_pago_cliente->setDatosCliente($this->datosCliente);

			foreach($facturaLogic_Desde_termino_pago_cliente->getfacturas() as $factura_Desde_termino_pago_cliente) {
				$factura_Desde_termino_pago_cliente->setid_termino_pago_cliente($idtermino_pago_clienteActual);

				$facturaLogic_Desde_termino_pago_cliente->setfactura($factura_Desde_termino_pago_cliente);
				$facturaLogic_Desde_termino_pago_cliente->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/consignacion_carga.php');
			consignacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$consignacionLogic_Desde_termino_pago_cliente=new consignacion_logic();
			$consignacionLogic_Desde_termino_pago_cliente->setconsignacions($consignacions);

			$consignacionLogic_Desde_termino_pago_cliente->setConnexion($this->getConnexion());
			$consignacionLogic_Desde_termino_pago_cliente->setDatosCliente($this->datosCliente);

			foreach($consignacionLogic_Desde_termino_pago_cliente->getconsignacions() as $consignacion_Desde_termino_pago_cliente) {
				$consignacion_Desde_termino_pago_cliente->setid_termino_pago_cliente($idtermino_pago_clienteActual);

				$consignacionLogic_Desde_termino_pago_cliente->setconsignacion($consignacion_Desde_termino_pago_cliente);
				$consignacionLogic_Desde_termino_pago_cliente->save();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $termino_pago_clientes,termino_pago_cliente_param_return $termino_pago_clienteParameterGeneral) : termino_pago_cliente_param_return {
		$termino_pago_clienteReturnGeneral=new termino_pago_cliente_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $termino_pago_clienteReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $termino_pago_clientes,termino_pago_cliente_param_return $termino_pago_clienteParameterGeneral) : termino_pago_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$termino_pago_clienteReturnGeneral=new termino_pago_cliente_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $termino_pago_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $termino_pago_clientes,termino_pago_cliente $termino_pago_cliente,termino_pago_cliente_param_return $termino_pago_clienteParameterGeneral,bool $isEsNuevotermino_pago_cliente,array $clases) : termino_pago_cliente_param_return {
		 try {	
			$termino_pago_clienteReturnGeneral=new termino_pago_cliente_param_return();
	
			$termino_pago_clienteReturnGeneral->settermino_pago_cliente($termino_pago_cliente);
			$termino_pago_clienteReturnGeneral->settermino_pago_clientes($termino_pago_clientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$termino_pago_clienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $termino_pago_clienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $termino_pago_clientes,termino_pago_cliente $termino_pago_cliente,termino_pago_cliente_param_return $termino_pago_clienteParameterGeneral,bool $isEsNuevotermino_pago_cliente,array $clases) : termino_pago_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$termino_pago_clienteReturnGeneral=new termino_pago_cliente_param_return();
	
			$termino_pago_clienteReturnGeneral->settermino_pago_cliente($termino_pago_cliente);
			$termino_pago_clienteReturnGeneral->settermino_pago_clientes($termino_pago_clientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$termino_pago_clienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $termino_pago_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $termino_pago_clientes,termino_pago_cliente $termino_pago_cliente,termino_pago_cliente_param_return $termino_pago_clienteParameterGeneral,bool $isEsNuevotermino_pago_cliente,array $clases) : termino_pago_cliente_param_return {
		 try {	
			$termino_pago_clienteReturnGeneral=new termino_pago_cliente_param_return();
	
			$termino_pago_clienteReturnGeneral->settermino_pago_cliente($termino_pago_cliente);
			$termino_pago_clienteReturnGeneral->settermino_pago_clientes($termino_pago_clientes);
			
			
			
			return $termino_pago_clienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $termino_pago_clientes,termino_pago_cliente $termino_pago_cliente,termino_pago_cliente_param_return $termino_pago_clienteParameterGeneral,bool $isEsNuevotermino_pago_cliente,array $clases) : termino_pago_cliente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$termino_pago_clienteReturnGeneral=new termino_pago_cliente_param_return();
	
			$termino_pago_clienteReturnGeneral->settermino_pago_cliente($termino_pago_cliente);
			$termino_pago_clienteReturnGeneral->settermino_pago_clientes($termino_pago_clientes);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $termino_pago_clienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,termino_pago_cliente $termino_pago_cliente,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,termino_pago_cliente $termino_pago_cliente,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		termino_pago_cliente_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(termino_pago_cliente $termino_pago_cliente,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//termino_pago_cliente_logic_add::updatetermino_pago_clienteToGet($this->termino_pago_cliente);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$termino_pago_cliente->setempresa($this->termino_pago_clienteDataAccess->getempresa($this->connexion,$termino_pago_cliente));
		$termino_pago_cliente->settipo_termino_pago($this->termino_pago_clienteDataAccess->gettipo_termino_pago($this->connexion,$termino_pago_cliente));
		$termino_pago_cliente->setcuenta($this->termino_pago_clienteDataAccess->getcuenta($this->connexion,$termino_pago_cliente));
		$termino_pago_cliente->setparametro_facturacions($this->termino_pago_clienteDataAccess->getparametro_facturacions($this->connexion,$termino_pago_cliente));
		$termino_pago_cliente->setdebito_cuenta_cobrars($this->termino_pago_clienteDataAccess->getdebito_cuenta_cobrars($this->connexion,$termino_pago_cliente));
		$termino_pago_cliente->setdevolucion_facturas($this->termino_pago_clienteDataAccess->getdevolucion_facturas($this->connexion,$termino_pago_cliente));
		$termino_pago_cliente->setfactura_loteid_termino_pagos($this->termino_pago_clienteDataAccess->getfactura_loteid_termino_pagos($this->connexion,$termino_pago_cliente));
		$termino_pago_cliente->setestimados($this->termino_pago_clienteDataAccess->getestimados($this->connexion,$termino_pago_cliente));
		$termino_pago_cliente->setcuenta_cobrars($this->termino_pago_clienteDataAccess->getcuenta_cobrars($this->connexion,$termino_pago_cliente));
		$termino_pago_cliente->setclientes($this->termino_pago_clienteDataAccess->getclientes($this->connexion,$termino_pago_cliente));
		$termino_pago_cliente->setfacturas($this->termino_pago_clienteDataAccess->getfacturas($this->connexion,$termino_pago_cliente));
		$termino_pago_cliente->setconsignacions($this->termino_pago_clienteDataAccess->getconsignacions($this->connexion,$termino_pago_cliente));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$termino_pago_cliente->setempresa($this->termino_pago_clienteDataAccess->getempresa($this->connexion,$termino_pago_cliente));
				continue;
			}

			if($clas->clas==tipo_termino_pago::$class.'') {
				$termino_pago_cliente->settipo_termino_pago($this->termino_pago_clienteDataAccess->gettipo_termino_pago($this->connexion,$termino_pago_cliente));
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$termino_pago_cliente->setcuenta($this->termino_pago_clienteDataAccess->getcuenta($this->connexion,$termino_pago_cliente));
				continue;
			}

			if($clas->clas==parametro_facturacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_cliente->setparametro_facturacions($this->termino_pago_clienteDataAccess->getparametro_facturacions($this->connexion,$termino_pago_cliente));

				if($this->isConDeep) {
					$parametrofacturacionLogic= new parametro_facturacion_logic($this->connexion);
					$parametrofacturacionLogic->setparametro_facturacions($termino_pago_cliente->getparametro_facturacions());
					$classesLocal=parametro_facturacion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$parametrofacturacionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					parametro_facturacion_util::refrescarFKDescripciones($parametrofacturacionLogic->getparametro_facturacions());
					$termino_pago_cliente->setparametro_facturacions($parametrofacturacionLogic->getparametro_facturacions());
				}

				continue;
			}

			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_cliente->setdebito_cuenta_cobrars($this->termino_pago_clienteDataAccess->getdebito_cuenta_cobrars($this->connexion,$termino_pago_cliente));

				if($this->isConDeep) {
					$debitocuentacobrarLogic= new debito_cuenta_cobrar_logic($this->connexion);
					$debitocuentacobrarLogic->setdebito_cuenta_cobrars($termino_pago_cliente->getdebito_cuenta_cobrars());
					$classesLocal=debito_cuenta_cobrar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$debitocuentacobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					debito_cuenta_cobrar_util::refrescarFKDescripciones($debitocuentacobrarLogic->getdebito_cuenta_cobrars());
					$termino_pago_cliente->setdebito_cuenta_cobrars($debitocuentacobrarLogic->getdebito_cuenta_cobrars());
				}

				continue;
			}

			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_cliente->setdevolucion_facturas($this->termino_pago_clienteDataAccess->getdevolucion_facturas($this->connexion,$termino_pago_cliente));

				if($this->isConDeep) {
					$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
					$devolucionfacturaLogic->setdevolucion_facturas($termino_pago_cliente->getdevolucion_facturas());
					$classesLocal=devolucion_factura_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$devolucionfacturaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					devolucion_factura_util::refrescarFKDescripciones($devolucionfacturaLogic->getdevolucion_facturas());
					$termino_pago_cliente->setdevolucion_facturas($devolucionfacturaLogic->getdevolucion_facturas());
				}

				continue;
			}

			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_cliente->setfactura_loteid_termino_pagos($this->termino_pago_clienteDataAccess->getfactura_loteid_termino_pagos($this->connexion,$termino_pago_cliente));

				if($this->isConDeep) {
					$facturaloteLogic= new factura_lote_logic($this->connexion);
					$facturaloteLogic->setfactura_lotes($termino_pago_cliente->getfactura_loteid_termino_pagos());
					$classesLocal=factura_lote_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$facturaloteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					factura_lote_util::refrescarFKDescripciones($facturaloteLogic->getfactura_lotes());
					$termino_pago_cliente->setfactura_loteid_termino_pagos($facturaloteLogic->getfactura_lotes());
				}

				continue;
			}

			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_cliente->setestimados($this->termino_pago_clienteDataAccess->getestimados($this->connexion,$termino_pago_cliente));

				if($this->isConDeep) {
					$estimadoLogic= new estimado_logic($this->connexion);
					$estimadoLogic->setestimados($termino_pago_cliente->getestimados());
					$classesLocal=estimado_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$estimadoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					estimado_util::refrescarFKDescripciones($estimadoLogic->getestimados());
					$termino_pago_cliente->setestimados($estimadoLogic->getestimados());
				}

				continue;
			}

			if($clas->clas==cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_cliente->setcuenta_cobrars($this->termino_pago_clienteDataAccess->getcuenta_cobrars($this->connexion,$termino_pago_cliente));

				if($this->isConDeep) {
					$cuentacobrarLogic= new cuenta_cobrar_logic($this->connexion);
					$cuentacobrarLogic->setcuenta_cobrars($termino_pago_cliente->getcuenta_cobrars());
					$classesLocal=cuenta_cobrar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cuentacobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cuenta_cobrar_util::refrescarFKDescripciones($cuentacobrarLogic->getcuenta_cobrars());
					$termino_pago_cliente->setcuenta_cobrars($cuentacobrarLogic->getcuenta_cobrars());
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_cliente->setclientes($this->termino_pago_clienteDataAccess->getclientes($this->connexion,$termino_pago_cliente));

				if($this->isConDeep) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->setclientes($termino_pago_cliente->getclientes());
					$classesLocal=cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$clienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cliente_util::refrescarFKDescripciones($clienteLogic->getclientes());
					$termino_pago_cliente->setclientes($clienteLogic->getclientes());
				}

				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_cliente->setfacturas($this->termino_pago_clienteDataAccess->getfacturas($this->connexion,$termino_pago_cliente));

				if($this->isConDeep) {
					$facturaLogic= new factura_logic($this->connexion);
					$facturaLogic->setfacturas($termino_pago_cliente->getfacturas());
					$classesLocal=factura_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$facturaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					factura_util::refrescarFKDescripciones($facturaLogic->getfacturas());
					$termino_pago_cliente->setfacturas($facturaLogic->getfacturas());
				}

				continue;
			}

			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_cliente->setconsignacions($this->termino_pago_clienteDataAccess->getconsignacions($this->connexion,$termino_pago_cliente));

				if($this->isConDeep) {
					$consignacionLogic= new consignacion_logic($this->connexion);
					$consignacionLogic->setconsignacions($termino_pago_cliente->getconsignacions());
					$classesLocal=consignacion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$consignacionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					consignacion_util::refrescarFKDescripciones($consignacionLogic->getconsignacions());
					$termino_pago_cliente->setconsignacions($consignacionLogic->getconsignacions());
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
			$termino_pago_cliente->setempresa($this->termino_pago_clienteDataAccess->getempresa($this->connexion,$termino_pago_cliente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tipo_termino_pago::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$termino_pago_cliente->settipo_termino_pago($this->termino_pago_clienteDataAccess->gettipo_termino_pago($this->connexion,$termino_pago_cliente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$termino_pago_cliente->setcuenta($this->termino_pago_clienteDataAccess->getcuenta($this->connexion,$termino_pago_cliente));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_facturacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_facturacion::$class);
			$termino_pago_cliente->setparametro_facturacions($this->termino_pago_clienteDataAccess->getparametro_facturacions($this->connexion,$termino_pago_cliente));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_cobrar::$class);
			$termino_pago_cliente->setdebito_cuenta_cobrars($this->termino_pago_clienteDataAccess->getdebito_cuenta_cobrars($this->connexion,$termino_pago_cliente));
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
			$termino_pago_cliente->setdevolucion_facturas($this->termino_pago_clienteDataAccess->getdevolucion_facturas($this->connexion,$termino_pago_cliente));
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
			$termino_pago_cliente->setfactura_loteid_termino_pagos($this->termino_pago_clienteDataAccess->getfactura_loteid_termino_pagos($this->connexion,$termino_pago_cliente));
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
			$termino_pago_cliente->setestimados($this->termino_pago_clienteDataAccess->getestimados($this->connexion,$termino_pago_cliente));
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
			$termino_pago_cliente->setcuenta_cobrars($this->termino_pago_clienteDataAccess->getcuenta_cobrars($this->connexion,$termino_pago_cliente));
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
			$termino_pago_cliente->setclientes($this->termino_pago_clienteDataAccess->getclientes($this->connexion,$termino_pago_cliente));
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
			$termino_pago_cliente->setfacturas($this->termino_pago_clienteDataAccess->getfacturas($this->connexion,$termino_pago_cliente));
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
			$termino_pago_cliente->setconsignacions($this->termino_pago_clienteDataAccess->getconsignacions($this->connexion,$termino_pago_cliente));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$termino_pago_cliente->setempresa($this->termino_pago_clienteDataAccess->getempresa($this->connexion,$termino_pago_cliente));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($termino_pago_cliente->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$termino_pago_cliente->settipo_termino_pago($this->termino_pago_clienteDataAccess->gettipo_termino_pago($this->connexion,$termino_pago_cliente));
		$tipo_termino_pagoLogic= new tipo_termino_pago_logic($this->connexion);
		$tipo_termino_pagoLogic->deepLoad($termino_pago_cliente->gettipo_termino_pago(),$isDeep,$deepLoadType,$clases);
				
		$termino_pago_cliente->setcuenta($this->termino_pago_clienteDataAccess->getcuenta($this->connexion,$termino_pago_cliente));
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepLoad($termino_pago_cliente->getcuenta(),$isDeep,$deepLoadType,$clases);
				

		$termino_pago_cliente->setparametro_facturacions($this->termino_pago_clienteDataAccess->getparametro_facturacions($this->connexion,$termino_pago_cliente));

		foreach($termino_pago_cliente->getparametro_facturacions() as $parametrofacturacion) {
			$parametrofacturacionLogic= new parametro_facturacion_logic($this->connexion);
			$parametrofacturacionLogic->deepLoad($parametrofacturacion,$isDeep,$deepLoadType,$clases);
		}

		$termino_pago_cliente->setdebito_cuenta_cobrars($this->termino_pago_clienteDataAccess->getdebito_cuenta_cobrars($this->connexion,$termino_pago_cliente));

		foreach($termino_pago_cliente->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
			$debitocuentacobrarLogic= new debito_cuenta_cobrar_logic($this->connexion);
			$debitocuentacobrarLogic->deepLoad($debitocuentacobrar,$isDeep,$deepLoadType,$clases);
		}

		$termino_pago_cliente->setdevolucion_facturas($this->termino_pago_clienteDataAccess->getdevolucion_facturas($this->connexion,$termino_pago_cliente));

		foreach($termino_pago_cliente->getdevolucion_facturas() as $devolucionfactura) {
			$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
			$devolucionfacturaLogic->deepLoad($devolucionfactura,$isDeep,$deepLoadType,$clases);
		}

		$termino_pago_cliente->setfactura_loteid_termino_pagos($this->termino_pago_clienteDataAccess->getfactura_loteid_termino_pagos($this->connexion,$termino_pago_cliente));

		foreach($termino_pago_cliente->getfactura_loteid_termino_pagos() as $facturalote) {
			$facturaloteLogic= new factura_lote_logic($this->connexion);
			$facturaloteLogic->deepLoad($facturalote,$isDeep,$deepLoadType,$clases);
		}

		$termino_pago_cliente->setestimados($this->termino_pago_clienteDataAccess->getestimados($this->connexion,$termino_pago_cliente));

		foreach($termino_pago_cliente->getestimados() as $estimado) {
			$estimadoLogic= new estimado_logic($this->connexion);
			$estimadoLogic->deepLoad($estimado,$isDeep,$deepLoadType,$clases);
		}

		$termino_pago_cliente->setcuenta_cobrars($this->termino_pago_clienteDataAccess->getcuenta_cobrars($this->connexion,$termino_pago_cliente));

		foreach($termino_pago_cliente->getcuenta_cobrars() as $cuentacobrar) {
			$cuentacobrarLogic= new cuenta_cobrar_logic($this->connexion);
			$cuentacobrarLogic->deepLoad($cuentacobrar,$isDeep,$deepLoadType,$clases);
		}

		$termino_pago_cliente->setclientes($this->termino_pago_clienteDataAccess->getclientes($this->connexion,$termino_pago_cliente));

		foreach($termino_pago_cliente->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
		}

		$termino_pago_cliente->setfacturas($this->termino_pago_clienteDataAccess->getfacturas($this->connexion,$termino_pago_cliente));

		foreach($termino_pago_cliente->getfacturas() as $factura) {
			$facturaLogic= new factura_logic($this->connexion);
			$facturaLogic->deepLoad($factura,$isDeep,$deepLoadType,$clases);
		}

		$termino_pago_cliente->setconsignacions($this->termino_pago_clienteDataAccess->getconsignacions($this->connexion,$termino_pago_cliente));

		foreach($termino_pago_cliente->getconsignacions() as $consignacion) {
			$consignacionLogic= new consignacion_logic($this->connexion);
			$consignacionLogic->deepLoad($consignacion,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$termino_pago_cliente->setempresa($this->termino_pago_clienteDataAccess->getempresa($this->connexion,$termino_pago_cliente));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($termino_pago_cliente->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tipo_termino_pago::$class.'') {
				$termino_pago_cliente->settipo_termino_pago($this->termino_pago_clienteDataAccess->gettipo_termino_pago($this->connexion,$termino_pago_cliente));
				$tipo_termino_pagoLogic= new tipo_termino_pago_logic($this->connexion);
				$tipo_termino_pagoLogic->deepLoad($termino_pago_cliente->gettipo_termino_pago(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				$termino_pago_cliente->setcuenta($this->termino_pago_clienteDataAccess->getcuenta($this->connexion,$termino_pago_cliente));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($termino_pago_cliente->getcuenta(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==parametro_facturacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_cliente->setparametro_facturacions($this->termino_pago_clienteDataAccess->getparametro_facturacions($this->connexion,$termino_pago_cliente));

				foreach($termino_pago_cliente->getparametro_facturacions() as $parametrofacturacion) {
					$parametrofacturacionLogic= new parametro_facturacion_logic($this->connexion);
					$parametrofacturacionLogic->deepLoad($parametrofacturacion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_cliente->setdebito_cuenta_cobrars($this->termino_pago_clienteDataAccess->getdebito_cuenta_cobrars($this->connexion,$termino_pago_cliente));

				foreach($termino_pago_cliente->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
					$debitocuentacobrarLogic= new debito_cuenta_cobrar_logic($this->connexion);
					$debitocuentacobrarLogic->deepLoad($debitocuentacobrar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_cliente->setdevolucion_facturas($this->termino_pago_clienteDataAccess->getdevolucion_facturas($this->connexion,$termino_pago_cliente));

				foreach($termino_pago_cliente->getdevolucion_facturas() as $devolucionfactura) {
					$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
					$devolucionfacturaLogic->deepLoad($devolucionfactura,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_cliente->setfactura_loteid_termino_pagos($this->termino_pago_clienteDataAccess->getfactura_loteid_termino_pagos($this->connexion,$termino_pago_cliente));

				foreach($termino_pago_cliente->getfactura_loteid_termino_pagos() as $facturalote) {
					$facturaloteLogic= new factura_lote_logic($this->connexion);
					$facturaloteLogic->deepLoad($facturalote,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_cliente->setestimados($this->termino_pago_clienteDataAccess->getestimados($this->connexion,$termino_pago_cliente));

				foreach($termino_pago_cliente->getestimados() as $estimado) {
					$estimadoLogic= new estimado_logic($this->connexion);
					$estimadoLogic->deepLoad($estimado,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_cliente->setcuenta_cobrars($this->termino_pago_clienteDataAccess->getcuenta_cobrars($this->connexion,$termino_pago_cliente));

				foreach($termino_pago_cliente->getcuenta_cobrars() as $cuentacobrar) {
					$cuentacobrarLogic= new cuenta_cobrar_logic($this->connexion);
					$cuentacobrarLogic->deepLoad($cuentacobrar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_cliente->setclientes($this->termino_pago_clienteDataAccess->getclientes($this->connexion,$termino_pago_cliente));

				foreach($termino_pago_cliente->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_cliente->setfacturas($this->termino_pago_clienteDataAccess->getfacturas($this->connexion,$termino_pago_cliente));

				foreach($termino_pago_cliente->getfacturas() as $factura) {
					$facturaLogic= new factura_logic($this->connexion);
					$facturaLogic->deepLoad($factura,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$termino_pago_cliente->setconsignacions($this->termino_pago_clienteDataAccess->getconsignacions($this->connexion,$termino_pago_cliente));

				foreach($termino_pago_cliente->getconsignacions() as $consignacion) {
					$consignacionLogic= new consignacion_logic($this->connexion);
					$consignacionLogic->deepLoad($consignacion,$isDeep,$deepLoadType,$clases);
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
			$termino_pago_cliente->setempresa($this->termino_pago_clienteDataAccess->getempresa($this->connexion,$termino_pago_cliente));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($termino_pago_cliente->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_termino_pago::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$termino_pago_cliente->settipo_termino_pago($this->termino_pago_clienteDataAccess->gettipo_termino_pago($this->connexion,$termino_pago_cliente));
			$tipo_termino_pagoLogic= new tipo_termino_pago_logic($this->connexion);
			$tipo_termino_pagoLogic->deepLoad($termino_pago_cliente->gettipo_termino_pago(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$termino_pago_cliente->setcuenta($this->termino_pago_clienteDataAccess->getcuenta($this->connexion,$termino_pago_cliente));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($termino_pago_cliente->getcuenta(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_facturacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_facturacion::$class);
			$termino_pago_cliente->setparametro_facturacions($this->termino_pago_clienteDataAccess->getparametro_facturacions($this->connexion,$termino_pago_cliente));

			foreach($termino_pago_cliente->getparametro_facturacions() as $parametrofacturacion) {
				$parametrofacturacionLogic= new parametro_facturacion_logic($this->connexion);
				$parametrofacturacionLogic->deepLoad($parametrofacturacion,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_cobrar::$class);
			$termino_pago_cliente->setdebito_cuenta_cobrars($this->termino_pago_clienteDataAccess->getdebito_cuenta_cobrars($this->connexion,$termino_pago_cliente));

			foreach($termino_pago_cliente->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
				$debitocuentacobrarLogic= new debito_cuenta_cobrar_logic($this->connexion);
				$debitocuentacobrarLogic->deepLoad($debitocuentacobrar,$isDeep,$deepLoadType,$clases);
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
			$termino_pago_cliente->setdevolucion_facturas($this->termino_pago_clienteDataAccess->getdevolucion_facturas($this->connexion,$termino_pago_cliente));

			foreach($termino_pago_cliente->getdevolucion_facturas() as $devolucionfactura) {
				$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
				$devolucionfacturaLogic->deepLoad($devolucionfactura,$isDeep,$deepLoadType,$clases);
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
			$termino_pago_cliente->setfactura_loteid_termino_pagos($this->termino_pago_clienteDataAccess->getfactura_loteid_termino_pagos($this->connexion,$termino_pago_cliente));

			foreach($termino_pago_cliente->getfactura_loteid_termino_pagos() as $facturalote) {
				$facturaloteLogic= new factura_lote_logic($this->connexion);
				$facturaloteLogic->deepLoad($facturalote,$isDeep,$deepLoadType,$clases);
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
			$termino_pago_cliente->setestimados($this->termino_pago_clienteDataAccess->getestimados($this->connexion,$termino_pago_cliente));

			foreach($termino_pago_cliente->getestimados() as $estimado) {
				$estimadoLogic= new estimado_logic($this->connexion);
				$estimadoLogic->deepLoad($estimado,$isDeep,$deepLoadType,$clases);
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
			$termino_pago_cliente->setcuenta_cobrars($this->termino_pago_clienteDataAccess->getcuenta_cobrars($this->connexion,$termino_pago_cliente));

			foreach($termino_pago_cliente->getcuenta_cobrars() as $cuentacobrar) {
				$cuentacobrarLogic= new cuenta_cobrar_logic($this->connexion);
				$cuentacobrarLogic->deepLoad($cuentacobrar,$isDeep,$deepLoadType,$clases);
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
			$termino_pago_cliente->setclientes($this->termino_pago_clienteDataAccess->getclientes($this->connexion,$termino_pago_cliente));

			foreach($termino_pago_cliente->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
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
			$termino_pago_cliente->setfacturas($this->termino_pago_clienteDataAccess->getfacturas($this->connexion,$termino_pago_cliente));

			foreach($termino_pago_cliente->getfacturas() as $factura) {
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
			$termino_pago_cliente->setconsignacions($this->termino_pago_clienteDataAccess->getconsignacions($this->connexion,$termino_pago_cliente));

			foreach($termino_pago_cliente->getconsignacions() as $consignacion) {
				$consignacionLogic= new consignacion_logic($this->connexion);
				$consignacionLogic->deepLoad($consignacion,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(termino_pago_cliente $termino_pago_cliente,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//termino_pago_cliente_logic_add::updatetermino_pago_clienteToSave($this->termino_pago_cliente);			
			
			if(!$paraDeleteCascade) {				
				termino_pago_cliente_data::save($termino_pago_cliente, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($termino_pago_cliente->getempresa(),$this->connexion);
		tipo_termino_pago_data::save($termino_pago_cliente->gettipo_termino_pago(),$this->connexion);
		cuenta_data::save($termino_pago_cliente->getcuenta(),$this->connexion);

		foreach($termino_pago_cliente->getparametro_facturacions() as $parametrofacturacion) {
			$parametrofacturacion->setid_termino_pago_cliente($termino_pago_cliente->getId());
			parametro_facturacion_data::save($parametrofacturacion,$this->connexion);
		}


		foreach($termino_pago_cliente->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
			$debitocuentacobrar->setid_termino_pago_cliente($termino_pago_cliente->getId());
			debito_cuenta_cobrar_data::save($debitocuentacobrar,$this->connexion);
		}


		foreach($termino_pago_cliente->getdevolucion_facturas() as $devolucionfactura) {
			$devolucionfactura->setid_termino_pago_cliente($termino_pago_cliente->getId());
			devolucion_factura_data::save($devolucionfactura,$this->connexion);
		}


		foreach($termino_pago_cliente->getfactura_loteid_termino_pagos() as $facturalote) {
			$facturalote->setid_termino_pago_cliente($termino_pago_cliente->getId());
			factura_lote_data::save($facturalote,$this->connexion);
		}


		foreach($termino_pago_cliente->getestimados() as $estimado) {
			$estimado->setid_termino_pago_cliente($termino_pago_cliente->getId());
			estimado_data::save($estimado,$this->connexion);
		}


		foreach($termino_pago_cliente->getcuenta_cobrars() as $cuentacobrar) {
			$cuentacobrar->setid_termino_pago_cliente($termino_pago_cliente->getId());
			cuenta_cobrar_data::save($cuentacobrar,$this->connexion);
		}


		foreach($termino_pago_cliente->getclientes() as $cliente) {
			$cliente->setid_termino_pago_cliente($termino_pago_cliente->getId());
			cliente_data::save($cliente,$this->connexion);
		}


		foreach($termino_pago_cliente->getfacturas() as $factura) {
			$factura->setid_termino_pago_cliente($termino_pago_cliente->getId());
			factura_data::save($factura,$this->connexion);
		}


		foreach($termino_pago_cliente->getconsignacions() as $consignacion) {
			$consignacion->setid_termino_pago_cliente($termino_pago_cliente->getId());
			consignacion_data::save($consignacion,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($termino_pago_cliente->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==tipo_termino_pago::$class.'') {
				tipo_termino_pago_data::save($termino_pago_cliente->gettipo_termino_pago(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($termino_pago_cliente->getcuenta(),$this->connexion);
				continue;
			}


			if($clas->clas==parametro_facturacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_cliente->getparametro_facturacions() as $parametrofacturacion) {
					$parametrofacturacion->setid_termino_pago_cliente($termino_pago_cliente->getId());
					parametro_facturacion_data::save($parametrofacturacion,$this->connexion);
				}

				continue;
			}

			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_cliente->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
					$debitocuentacobrar->setid_termino_pago_cliente($termino_pago_cliente->getId());
					debito_cuenta_cobrar_data::save($debitocuentacobrar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_cliente->getdevolucion_facturas() as $devolucionfactura) {
					$devolucionfactura->setid_termino_pago_cliente($termino_pago_cliente->getId());
					devolucion_factura_data::save($devolucionfactura,$this->connexion);
				}

				continue;
			}

			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_cliente->getfactura_loteid_termino_pagos() as $facturalote) {
					$facturalote->setid_termino_pago_cliente($termino_pago_cliente->getId());
					factura_lote_data::save($facturalote,$this->connexion);
				}

				continue;
			}

			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_cliente->getestimados() as $estimado) {
					$estimado->setid_termino_pago_cliente($termino_pago_cliente->getId());
					estimado_data::save($estimado,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_cliente->getcuenta_cobrars() as $cuentacobrar) {
					$cuentacobrar->setid_termino_pago_cliente($termino_pago_cliente->getId());
					cuenta_cobrar_data::save($cuentacobrar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_cliente->getclientes() as $cliente) {
					$cliente->setid_termino_pago_cliente($termino_pago_cliente->getId());
					cliente_data::save($cliente,$this->connexion);
				}

				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_cliente->getfacturas() as $factura) {
					$factura->setid_termino_pago_cliente($termino_pago_cliente->getId());
					factura_data::save($factura,$this->connexion);
				}

				continue;
			}

			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_cliente->getconsignacions() as $consignacion) {
					$consignacion->setid_termino_pago_cliente($termino_pago_cliente->getId());
					consignacion_data::save($consignacion,$this->connexion);
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
			empresa_data::save($termino_pago_cliente->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_termino_pago::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_termino_pago_data::save($termino_pago_cliente->gettipo_termino_pago(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($termino_pago_cliente->getcuenta(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_facturacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_facturacion::$class);

			foreach($termino_pago_cliente->getparametro_facturacions() as $parametrofacturacion) {
				$parametrofacturacion->setid_termino_pago_cliente($termino_pago_cliente->getId());
				parametro_facturacion_data::save($parametrofacturacion,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_cobrar::$class);

			foreach($termino_pago_cliente->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
				$debitocuentacobrar->setid_termino_pago_cliente($termino_pago_cliente->getId());
				debito_cuenta_cobrar_data::save($debitocuentacobrar,$this->connexion);
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

			foreach($termino_pago_cliente->getdevolucion_facturas() as $devolucionfactura) {
				$devolucionfactura->setid_termino_pago_cliente($termino_pago_cliente->getId());
				devolucion_factura_data::save($devolucionfactura,$this->connexion);
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

			foreach($termino_pago_cliente->getfactura_loteid_termino_pagos() as $facturalote) {
				$facturalote->setid_termino_pago_cliente($termino_pago_cliente->getId());
				factura_lote_data::save($facturalote,$this->connexion);
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

			foreach($termino_pago_cliente->getestimados() as $estimado) {
				$estimado->setid_termino_pago_cliente($termino_pago_cliente->getId());
				estimado_data::save($estimado,$this->connexion);
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

			foreach($termino_pago_cliente->getcuenta_cobrars() as $cuentacobrar) {
				$cuentacobrar->setid_termino_pago_cliente($termino_pago_cliente->getId());
				cuenta_cobrar_data::save($cuentacobrar,$this->connexion);
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

			foreach($termino_pago_cliente->getclientes() as $cliente) {
				$cliente->setid_termino_pago_cliente($termino_pago_cliente->getId());
				cliente_data::save($cliente,$this->connexion);
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

			foreach($termino_pago_cliente->getfacturas() as $factura) {
				$factura->setid_termino_pago_cliente($termino_pago_cliente->getId());
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

			foreach($termino_pago_cliente->getconsignacions() as $consignacion) {
				$consignacion->setid_termino_pago_cliente($termino_pago_cliente->getId());
				consignacion_data::save($consignacion,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($termino_pago_cliente->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($termino_pago_cliente->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tipo_termino_pago_data::save($termino_pago_cliente->gettipo_termino_pago(),$this->connexion);
		$tipo_termino_pagoLogic= new tipo_termino_pago_logic($this->connexion);
		$tipo_termino_pagoLogic->deepSave($termino_pago_cliente->gettipo_termino_pago(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($termino_pago_cliente->getcuenta(),$this->connexion);
		$cuentaLogic= new cuenta_logic($this->connexion);
		$cuentaLogic->deepSave($termino_pago_cliente->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($termino_pago_cliente->getparametro_facturacions() as $parametrofacturacion) {
			$parametrofacturacionLogic= new parametro_facturacion_logic($this->connexion);
			$parametrofacturacion->setid_termino_pago_cliente($termino_pago_cliente->getId());
			parametro_facturacion_data::save($parametrofacturacion,$this->connexion);
			$parametrofacturacionLogic->deepSave($parametrofacturacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($termino_pago_cliente->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
			$debitocuentacobrarLogic= new debito_cuenta_cobrar_logic($this->connexion);
			$debitocuentacobrar->setid_termino_pago_cliente($termino_pago_cliente->getId());
			debito_cuenta_cobrar_data::save($debitocuentacobrar,$this->connexion);
			$debitocuentacobrarLogic->deepSave($debitocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($termino_pago_cliente->getdevolucion_facturas() as $devolucionfactura) {
			$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
			$devolucionfactura->setid_termino_pago_cliente($termino_pago_cliente->getId());
			devolucion_factura_data::save($devolucionfactura,$this->connexion);
			$devolucionfacturaLogic->deepSave($devolucionfactura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($termino_pago_cliente->getfactura_loteid_termino_pagos() as $facturalote) {
			$facturaloteLogic= new factura_lote_logic($this->connexion);
			$facturalote->setid_termino_pago_cliente($termino_pago_cliente->getId());
			factura_lote_data::save($facturalote,$this->connexion);
			$facturaloteLogic->deepSave($facturalote,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($termino_pago_cliente->getestimados() as $estimado) {
			$estimadoLogic= new estimado_logic($this->connexion);
			$estimado->setid_termino_pago_cliente($termino_pago_cliente->getId());
			estimado_data::save($estimado,$this->connexion);
			$estimadoLogic->deepSave($estimado,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($termino_pago_cliente->getcuenta_cobrars() as $cuentacobrar) {
			$cuentacobrarLogic= new cuenta_cobrar_logic($this->connexion);
			$cuentacobrar->setid_termino_pago_cliente($termino_pago_cliente->getId());
			cuenta_cobrar_data::save($cuentacobrar,$this->connexion);
			$cuentacobrarLogic->deepSave($cuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($termino_pago_cliente->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$cliente->setid_termino_pago_cliente($termino_pago_cliente->getId());
			cliente_data::save($cliente,$this->connexion);
			$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($termino_pago_cliente->getfacturas() as $factura) {
			$facturaLogic= new factura_logic($this->connexion);
			$factura->setid_termino_pago_cliente($termino_pago_cliente->getId());
			factura_data::save($factura,$this->connexion);
			$facturaLogic->deepSave($factura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($termino_pago_cliente->getconsignacions() as $consignacion) {
			$consignacionLogic= new consignacion_logic($this->connexion);
			$consignacion->setid_termino_pago_cliente($termino_pago_cliente->getId());
			consignacion_data::save($consignacion,$this->connexion);
			$consignacionLogic->deepSave($consignacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($termino_pago_cliente->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($termino_pago_cliente->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tipo_termino_pago::$class.'') {
				tipo_termino_pago_data::save($termino_pago_cliente->gettipo_termino_pago(),$this->connexion);
				$tipo_termino_pagoLogic= new tipo_termino_pago_logic($this->connexion);
				$tipo_termino_pagoLogic->deepSave($termino_pago_cliente->gettipo_termino_pago(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'') {
				cuenta_data::save($termino_pago_cliente->getcuenta(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($termino_pago_cliente->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==parametro_facturacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_cliente->getparametro_facturacions() as $parametrofacturacion) {
					$parametrofacturacionLogic= new parametro_facturacion_logic($this->connexion);
					$parametrofacturacion->setid_termino_pago_cliente($termino_pago_cliente->getId());
					parametro_facturacion_data::save($parametrofacturacion,$this->connexion);
					$parametrofacturacionLogic->deepSave($parametrofacturacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_cliente->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
					$debitocuentacobrarLogic= new debito_cuenta_cobrar_logic($this->connexion);
					$debitocuentacobrar->setid_termino_pago_cliente($termino_pago_cliente->getId());
					debito_cuenta_cobrar_data::save($debitocuentacobrar,$this->connexion);
					$debitocuentacobrarLogic->deepSave($debitocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_cliente->getdevolucion_facturas() as $devolucionfactura) {
					$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
					$devolucionfactura->setid_termino_pago_cliente($termino_pago_cliente->getId());
					devolucion_factura_data::save($devolucionfactura,$this->connexion);
					$devolucionfacturaLogic->deepSave($devolucionfactura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_cliente->getfactura_loteid_termino_pagos() as $facturalote) {
					$facturaloteLogic= new factura_lote_logic($this->connexion);
					$facturalote->setid_termino_pago_cliente($termino_pago_cliente->getId());
					factura_lote_data::save($facturalote,$this->connexion);
					$facturaloteLogic->deepSave($facturalote,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_cliente->getestimados() as $estimado) {
					$estimadoLogic= new estimado_logic($this->connexion);
					$estimado->setid_termino_pago_cliente($termino_pago_cliente->getId());
					estimado_data::save($estimado,$this->connexion);
					$estimadoLogic->deepSave($estimado,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_cliente->getcuenta_cobrars() as $cuentacobrar) {
					$cuentacobrarLogic= new cuenta_cobrar_logic($this->connexion);
					$cuentacobrar->setid_termino_pago_cliente($termino_pago_cliente->getId());
					cuenta_cobrar_data::save($cuentacobrar,$this->connexion);
					$cuentacobrarLogic->deepSave($cuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_cliente->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$cliente->setid_termino_pago_cliente($termino_pago_cliente->getId());
					cliente_data::save($cliente,$this->connexion);
					$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_cliente->getfacturas() as $factura) {
					$facturaLogic= new factura_logic($this->connexion);
					$factura->setid_termino_pago_cliente($termino_pago_cliente->getId());
					factura_data::save($factura,$this->connexion);
					$facturaLogic->deepSave($factura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($termino_pago_cliente->getconsignacions() as $consignacion) {
					$consignacionLogic= new consignacion_logic($this->connexion);
					$consignacion->setid_termino_pago_cliente($termino_pago_cliente->getId());
					consignacion_data::save($consignacion,$this->connexion);
					$consignacionLogic->deepSave($consignacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($termino_pago_cliente->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($termino_pago_cliente->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tipo_termino_pago::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tipo_termino_pago_data::save($termino_pago_cliente->gettipo_termino_pago(),$this->connexion);
			$tipo_termino_pagoLogic= new tipo_termino_pago_logic($this->connexion);
			$tipo_termino_pagoLogic->deepSave($termino_pago_cliente->gettipo_termino_pago(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($termino_pago_cliente->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($termino_pago_cliente->getcuenta(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==parametro_facturacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(parametro_facturacion::$class);

			foreach($termino_pago_cliente->getparametro_facturacions() as $parametrofacturacion) {
				$parametrofacturacionLogic= new parametro_facturacion_logic($this->connexion);
				$parametrofacturacion->setid_termino_pago_cliente($termino_pago_cliente->getId());
				parametro_facturacion_data::save($parametrofacturacion,$this->connexion);
				$parametrofacturacionLogic->deepSave($parametrofacturacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==debito_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(debito_cuenta_cobrar::$class);

			foreach($termino_pago_cliente->getdebito_cuenta_cobrars() as $debitocuentacobrar) {
				$debitocuentacobrarLogic= new debito_cuenta_cobrar_logic($this->connexion);
				$debitocuentacobrar->setid_termino_pago_cliente($termino_pago_cliente->getId());
				debito_cuenta_cobrar_data::save($debitocuentacobrar,$this->connexion);
				$debitocuentacobrarLogic->deepSave($debitocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($termino_pago_cliente->getdevolucion_facturas() as $devolucionfactura) {
				$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
				$devolucionfactura->setid_termino_pago_cliente($termino_pago_cliente->getId());
				devolucion_factura_data::save($devolucionfactura,$this->connexion);
				$devolucionfacturaLogic->deepSave($devolucionfactura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($termino_pago_cliente->getfactura_loteid_termino_pagos() as $facturalote) {
				$facturaloteLogic= new factura_lote_logic($this->connexion);
				$facturalote->setid_termino_pago_cliente($termino_pago_cliente->getId());
				factura_lote_data::save($facturalote,$this->connexion);
				$facturaloteLogic->deepSave($facturalote,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($termino_pago_cliente->getestimados() as $estimado) {
				$estimadoLogic= new estimado_logic($this->connexion);
				$estimado->setid_termino_pago_cliente($termino_pago_cliente->getId());
				estimado_data::save($estimado,$this->connexion);
				$estimadoLogic->deepSave($estimado,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($termino_pago_cliente->getcuenta_cobrars() as $cuentacobrar) {
				$cuentacobrarLogic= new cuenta_cobrar_logic($this->connexion);
				$cuentacobrar->setid_termino_pago_cliente($termino_pago_cliente->getId());
				cuenta_cobrar_data::save($cuentacobrar,$this->connexion);
				$cuentacobrarLogic->deepSave($cuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($termino_pago_cliente->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$cliente->setid_termino_pago_cliente($termino_pago_cliente->getId());
				cliente_data::save($cliente,$this->connexion);
				$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($termino_pago_cliente->getfacturas() as $factura) {
				$facturaLogic= new factura_logic($this->connexion);
				$factura->setid_termino_pago_cliente($termino_pago_cliente->getId());
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

			foreach($termino_pago_cliente->getconsignacions() as $consignacion) {
				$consignacionLogic= new consignacion_logic($this->connexion);
				$consignacion->setid_termino_pago_cliente($termino_pago_cliente->getId());
				consignacion_data::save($consignacion,$this->connexion);
				$consignacionLogic->deepSave($consignacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				termino_pago_cliente_data::save($termino_pago_cliente, $this->connexion);
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
			
			$this->deepLoad($this->termino_pago_cliente,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->termino_pago_clientes as $termino_pago_cliente) {
				$this->deepLoad($termino_pago_cliente,$isDeep,$deepLoadType,$clases);
								
				termino_pago_cliente_util::refrescarFKDescripciones($this->termino_pago_clientes);
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
			
			foreach($this->termino_pago_clientes as $termino_pago_cliente) {
				$this->deepLoad($termino_pago_cliente,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->termino_pago_cliente,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->termino_pago_clientes as $termino_pago_cliente) {
				$this->deepSave($termino_pago_cliente,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->termino_pago_clientes as $termino_pago_cliente) {
				$this->deepSave($termino_pago_cliente,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(parametro_facturacion::$class);
				$classes[]=new Classe(debito_cuenta_cobrar::$class);
				$classes[]=new Classe(devolucion_factura::$class);
				$classes[]=new Classe(factura_lote::$class);
				$classes[]=new Classe(estimado::$class);
				$classes[]=new Classe(cuenta_cobrar::$class);
				$classes[]=new Classe(cliente::$class);
				$classes[]=new Classe(factura::$class);
				$classes[]=new Classe(consignacion::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==parametro_facturacion::$class) {
						$classes[]=new Classe(parametro_facturacion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==debito_cuenta_cobrar::$class) {
						$classes[]=new Classe(debito_cuenta_cobrar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==devolucion_factura::$class) {
						$classes[]=new Classe(devolucion_factura::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==factura_lote::$class) {
						$classes[]=new Classe(factura_lote::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==estimado::$class) {
						$classes[]=new Classe(estimado::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==cuenta_cobrar::$class) {
						$classes[]=new Classe(cuenta_cobrar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class);
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

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==parametro_facturacion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(parametro_facturacion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==debito_cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(debito_cuenta_cobrar::$class);
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

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function gettermino_pago_cliente() : ?termino_pago_cliente {	
		/*
		termino_pago_cliente_logic_add::checktermino_pago_clienteToGet($this->termino_pago_cliente,$this->datosCliente);
		termino_pago_cliente_logic_add::updatetermino_pago_clienteToGet($this->termino_pago_cliente);
		*/
			
		return $this->termino_pago_cliente;
	}
		
	public function settermino_pago_cliente(termino_pago_cliente $newtermino_pago_cliente) {
		$this->termino_pago_cliente = $newtermino_pago_cliente;
	}
	
	public function gettermino_pago_clientes() : array {		
		/*
		termino_pago_cliente_logic_add::checktermino_pago_clienteToGets($this->termino_pago_clientes,$this->datosCliente);
		
		foreach ($this->termino_pago_clientes as $termino_pago_clienteLocal ) {
			termino_pago_cliente_logic_add::updatetermino_pago_clienteToGet($termino_pago_clienteLocal);
		}
		*/
		
		return $this->termino_pago_clientes;
	}
	
	public function settermino_pago_clientes(array $newtermino_pago_clientes) {
		$this->termino_pago_clientes = $newtermino_pago_clientes;
	}
	
	public function gettermino_pago_clienteDataAccess() : termino_pago_cliente_data {
		return $this->termino_pago_clienteDataAccess;
	}
	
	public function settermino_pago_clienteDataAccess(termino_pago_cliente_data $newtermino_pago_clienteDataAccess) {
		$this->termino_pago_clienteDataAccess = $newtermino_pago_clienteDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        termino_pago_cliente_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		devolucion_factura_detalle_logic::$logger;
		factura_lote_detalle_logic::$logger;
		factura_modelo_logic::$logger;
		imagen_estimado_logic::$logger;
		estimado_detalle_logic::$logger;
		pago_cuenta_cobrar_logic::$logger;
		credito_cuenta_cobrar_logic::$logger;
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
