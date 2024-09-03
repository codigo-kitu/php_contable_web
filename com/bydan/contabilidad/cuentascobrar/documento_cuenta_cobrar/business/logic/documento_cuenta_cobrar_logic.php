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

namespace com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_param_return;

use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\presentation\session\documento_cuenta_cobrar_session;

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

use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\entity\documento_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\data\documento_cuenta_cobrar_data;

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

use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\entity\forma_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\data\forma_pago_cliente_data;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\logic\forma_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_util;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\data\cuenta_corriente_data;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

//REL


use com\bydan\contabilidad\facturacion\factura\business\entity\factura;
use com\bydan\contabilidad\facturacion\factura\business\data\factura_data;
use com\bydan\contabilidad\facturacion\factura\business\logic\factura_logic;
use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;

use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\business\entity\imagen_documento_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\business\data\imagen_documento_cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\business\logic\imagen_documento_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\util\imagen_documento_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\util\imagen_documento_cuenta_cobrar_util;

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

//REL DETALLES

use com\bydan\contabilidad\facturacion\factura_detalle\util\factura_detalle_carga;
use com\bydan\contabilidad\facturacion\factura_detalle\business\logic\factura_detalle_logic;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\util\factura_lote_detalle_carga;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\business\logic\factura_lote_detalle_logic;
use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_carga;
use com\bydan\contabilidad\facturacion\factura_modelo\business\logic\factura_modelo_logic;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\util\devolucion_factura_detalle_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\business\logic\devolucion_factura_detalle_logic;



class documento_cuenta_cobrar_logic  extends GeneralEntityLogic implements documento_cuenta_cobrar_logicI {	
	/*GENERAL*/
	public documento_cuenta_cobrar_data $documento_cuenta_cobrarDataAccess;
	//public ?documento_cuenta_cobrar_logic_add $documento_cuenta_cobrarLogicAdditional=null;
	public ?documento_cuenta_cobrar $documento_cuenta_cobrar;
	public array $documento_cuenta_cobrars;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->documento_cuenta_cobrarDataAccess = new documento_cuenta_cobrar_data();			
			$this->documento_cuenta_cobrars = array();
			$this->documento_cuenta_cobrar = new documento_cuenta_cobrar();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->documento_cuenta_cobrarLogicAdditional = new documento_cuenta_cobrar_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->documento_cuenta_cobrarLogicAdditional==null) {
		//	$this->documento_cuenta_cobrarLogicAdditional=new documento_cuenta_cobrar_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->documento_cuenta_cobrarDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->documento_cuenta_cobrarDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->documento_cuenta_cobrarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->documento_cuenta_cobrarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->documento_cuenta_cobrars = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->documento_cuenta_cobrars = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);
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
		$this->documento_cuenta_cobrar = new documento_cuenta_cobrar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->documento_cuenta_cobrar=$this->documento_cuenta_cobrarDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->documento_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				documento_cuenta_cobrar_util::refrescarFKDescripcion($this->documento_cuenta_cobrar);
			}
						
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGet($this->documento_cuenta_cobrar,$this->datosCliente);
			//documento_cuenta_cobrar_logic_add::updatedocumento_cuenta_cobrarToGet($this->documento_cuenta_cobrar);
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
		$this->documento_cuenta_cobrar = new  documento_cuenta_cobrar();
		  		  
        try {		
			$this->documento_cuenta_cobrar=$this->documento_cuenta_cobrarDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->documento_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				documento_cuenta_cobrar_util::refrescarFKDescripcion($this->documento_cuenta_cobrar);
			}
			
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGet($this->documento_cuenta_cobrar,$this->datosCliente);
			//documento_cuenta_cobrar_logic_add::updatedocumento_cuenta_cobrarToGet($this->documento_cuenta_cobrar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?documento_cuenta_cobrar {
		$documento_cuenta_cobrarLogic = new  documento_cuenta_cobrar_logic();
		  		  
        try {		
			$documento_cuenta_cobrarLogic->setConnexion($connexion);			
			$documento_cuenta_cobrarLogic->getEntity($id);			
			return $documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->documento_cuenta_cobrar = new  documento_cuenta_cobrar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->documento_cuenta_cobrar=$this->documento_cuenta_cobrarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->documento_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				documento_cuenta_cobrar_util::refrescarFKDescripcion($this->documento_cuenta_cobrar);
			}
			
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGet($this->documento_cuenta_cobrar,$this->datosCliente);
			//documento_cuenta_cobrar_logic_add::updatedocumento_cuenta_cobrarToGet($this->documento_cuenta_cobrar);
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
		$this->documento_cuenta_cobrar = new  documento_cuenta_cobrar();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_cuenta_cobrar=$this->documento_cuenta_cobrarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->documento_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				documento_cuenta_cobrar_util::refrescarFKDescripcion($this->documento_cuenta_cobrar);
			}
			
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGet($this->documento_cuenta_cobrar,$this->datosCliente);
			//documento_cuenta_cobrar_logic_add::updatedocumento_cuenta_cobrarToGet($this->documento_cuenta_cobrar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?documento_cuenta_cobrar {
		$documento_cuenta_cobrarLogic = new  documento_cuenta_cobrar_logic();
		  		  
        try {		
			$documento_cuenta_cobrarLogic->setConnexion($connexion);			
			$documento_cuenta_cobrarLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->documento_cuenta_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);			
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
		$this->documento_cuenta_cobrars = array();
		  		  
        try {			
			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->documento_cuenta_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);
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
		$this->documento_cuenta_cobrars = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$documento_cuenta_cobrarLogic = new  documento_cuenta_cobrar_logic();
		  		  
        try {		
			$documento_cuenta_cobrarLogic->setConnexion($connexion);			
			$documento_cuenta_cobrarLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->documento_cuenta_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);
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
		$this->documento_cuenta_cobrars = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->documento_cuenta_cobrars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);
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
		$this->documento_cuenta_cobrars = array();
		  		  
        try {			
			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}	
			
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->documento_cuenta_cobrars = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);
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
		$this->documento_cuenta_cobrars = array();
		  		  
        try {		
			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);

		}  catch(Exception $e) {						
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
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,documento_cuenta_cobrar_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);

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
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,documento_cuenta_cobrar_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idcuenta_corrienteWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cuenta_corriente) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_corriente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_corriente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_corriente,documento_cuenta_cobrar_util::$ID_CUENTA_CORRIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_corriente);

			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta_corriente(string $strFinalQuery,Pagination $pagination,int $id_cuenta_corriente) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_corriente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_corriente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_corriente,documento_cuenta_cobrar_util::$ID_CUENTA_CORRIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_corriente);

			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);
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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,documento_cuenta_cobrar_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,documento_cuenta_cobrar_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,documento_cuenta_cobrar_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,documento_cuenta_cobrar_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idforma_pago_clienteWithConnection(string $strFinalQuery,Pagination $pagination,int $id_forma_pago_cliente) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_forma_pago_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_forma_pago_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_forma_pago_cliente,documento_cuenta_cobrar_util::$ID_FORMA_PAGO_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_forma_pago_cliente);

			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idforma_pago_cliente(string $strFinalQuery,Pagination $pagination,int $id_forma_pago_cliente) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_forma_pago_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_forma_pago_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_forma_pago_cliente,documento_cuenta_cobrar_util::$ID_FORMA_PAGO_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_forma_pago_cliente);

			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);
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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,documento_cuenta_cobrar_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);

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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,documento_cuenta_cobrar_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);
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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,documento_cuenta_cobrar_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);

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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,documento_cuenta_cobrar_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,documento_cuenta_cobrar_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,documento_cuenta_cobrar_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_cobrars);
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
						
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToSave($this->documento_cuenta_cobrar,$this->datosCliente,$this->connexion);	       
			//documento_cuenta_cobrar_logic_add::updatedocumento_cuenta_cobrarToSave($this->documento_cuenta_cobrar);			
			documento_cuenta_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->documento_cuenta_cobrar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->documento_cuenta_cobrarLogicAdditional->checkGeneralEntityToSave($this,$this->documento_cuenta_cobrar,$this->datosCliente,$this->connexion);
			
			
			documento_cuenta_cobrar_data::save($this->documento_cuenta_cobrar, $this->connexion);	    	       	 				
			//documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToSaveAfter($this->documento_cuenta_cobrar,$this->datosCliente,$this->connexion);			
			//$this->documento_cuenta_cobrarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->documento_cuenta_cobrar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->documento_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->documento_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				documento_cuenta_cobrar_util::refrescarFKDescripcion($this->documento_cuenta_cobrar);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->documento_cuenta_cobrar->getIsDeleted()) {
				$this->documento_cuenta_cobrar=null;
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
						
			/*documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToSave($this->documento_cuenta_cobrar,$this->datosCliente,$this->connexion);*/	        
			//documento_cuenta_cobrar_logic_add::updatedocumento_cuenta_cobrarToSave($this->documento_cuenta_cobrar);			
			//$this->documento_cuenta_cobrarLogicAdditional->checkGeneralEntityToSave($this,$this->documento_cuenta_cobrar,$this->datosCliente,$this->connexion);			
			documento_cuenta_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->documento_cuenta_cobrar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			documento_cuenta_cobrar_data::save($this->documento_cuenta_cobrar, $this->connexion);	    	       	 						
			/*documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToSaveAfter($this->documento_cuenta_cobrar,$this->datosCliente,$this->connexion);*/			
			//$this->documento_cuenta_cobrarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->documento_cuenta_cobrar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->documento_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->documento_cuenta_cobrar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				documento_cuenta_cobrar_util::refrescarFKDescripcion($this->documento_cuenta_cobrar);				
			}
			
			if($this->documento_cuenta_cobrar->getIsDeleted()) {
				$this->documento_cuenta_cobrar=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(documento_cuenta_cobrar $documento_cuenta_cobrar,Connexion $connexion)  {
		$documento_cuenta_cobrarLogic = new  documento_cuenta_cobrar_logic();		  		  
        try {		
			$documento_cuenta_cobrarLogic->setConnexion($connexion);			
			$documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrar($documento_cuenta_cobrar);			
			$documento_cuenta_cobrarLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToSaves($this->documento_cuenta_cobrars,$this->datosCliente,$this->connexion);*/	        	
			//$this->documento_cuenta_cobrarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->documento_cuenta_cobrars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->documento_cuenta_cobrars as $documento_cuenta_cobrarLocal) {				
								
				//documento_cuenta_cobrar_logic_add::updatedocumento_cuenta_cobrarToSave($documento_cuenta_cobrarLocal);	        	
				documento_cuenta_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$documento_cuenta_cobrarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				documento_cuenta_cobrar_data::save($documento_cuenta_cobrarLocal, $this->connexion);				
			}
			
			/*documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToSavesAfter($this->documento_cuenta_cobrars,$this->datosCliente,$this->connexion);*/			
			//$this->documento_cuenta_cobrarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->documento_cuenta_cobrars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
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
			/*documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToSaves($this->documento_cuenta_cobrars,$this->datosCliente,$this->connexion);*/			
			//$this->documento_cuenta_cobrarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->documento_cuenta_cobrars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->documento_cuenta_cobrars as $documento_cuenta_cobrarLocal) {				
								
				//documento_cuenta_cobrar_logic_add::updatedocumento_cuenta_cobrarToSave($documento_cuenta_cobrarLocal);	        	
				documento_cuenta_cobrar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$documento_cuenta_cobrarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				documento_cuenta_cobrar_data::save($documento_cuenta_cobrarLocal, $this->connexion);				
			}			
			
			/*documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToSavesAfter($this->documento_cuenta_cobrars,$this->datosCliente,$this->connexion);*/			
			//$this->documento_cuenta_cobrarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->documento_cuenta_cobrars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $documento_cuenta_cobrars,Connexion $connexion)  {
		$documento_cuenta_cobrarLogic = new  documento_cuenta_cobrar_logic();
		  		  
        try {		
			$documento_cuenta_cobrarLogic->setConnexion($connexion);			
			$documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars($documento_cuenta_cobrars);			
			$documento_cuenta_cobrarLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$documento_cuenta_cobrarsAux=array();
		
		foreach($this->documento_cuenta_cobrars as $documento_cuenta_cobrar) {
			if($documento_cuenta_cobrar->getIsDeleted()==false) {
				$documento_cuenta_cobrarsAux[]=$documento_cuenta_cobrar;
			}
		}
		
		$this->documento_cuenta_cobrars=$documento_cuenta_cobrarsAux;
	}
	
	public function updateToGetsAuxiliar(array &$documento_cuenta_cobrars) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->documento_cuenta_cobrars as $documento_cuenta_cobrar) {
				
				$documento_cuenta_cobrar->setid_empresa_Descripcion(documento_cuenta_cobrar_util::getempresaDescripcion($documento_cuenta_cobrar->getempresa()));
				$documento_cuenta_cobrar->setid_sucursal_Descripcion(documento_cuenta_cobrar_util::getsucursalDescripcion($documento_cuenta_cobrar->getsucursal()));
				$documento_cuenta_cobrar->setid_ejercicio_Descripcion(documento_cuenta_cobrar_util::getejercicioDescripcion($documento_cuenta_cobrar->getejercicio()));
				$documento_cuenta_cobrar->setid_periodo_Descripcion(documento_cuenta_cobrar_util::getperiodoDescripcion($documento_cuenta_cobrar->getperiodo()));
				$documento_cuenta_cobrar->setid_usuario_Descripcion(documento_cuenta_cobrar_util::getusuarioDescripcion($documento_cuenta_cobrar->getusuario()));
				$documento_cuenta_cobrar->setid_cliente_Descripcion(documento_cuenta_cobrar_util::getclienteDescripcion($documento_cuenta_cobrar->getcliente()));
				$documento_cuenta_cobrar->setid_forma_pago_cliente_Descripcion(documento_cuenta_cobrar_util::getforma_pago_clienteDescripcion($documento_cuenta_cobrar->getforma_pago_cliente()));
				$documento_cuenta_cobrar->setid_cuenta_corriente_Descripcion(documento_cuenta_cobrar_util::getcuenta_corrienteDescripcion($documento_cuenta_cobrar->getcuenta_corriente()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$documento_cuenta_cobrar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$documento_cuenta_cobrar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$documento_cuenta_cobrar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$documento_cuenta_cobrarForeignKey=new documento_cuenta_cobrar_param_return();//documento_cuenta_cobrarForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombosclientesFK($this->connexion,$strRecargarFkQuery,$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_forma_pago_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombosforma_pago_clientesFK($this->connexion,$strRecargarFkQuery,$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_corriente',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_corrientesFK($this->connexion,$strRecargarFkQuery,$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosclientesFK($this->connexion,' where id=-1 ',$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_forma_pago_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosforma_pago_clientesFK($this->connexion,' where id=-1 ',$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_corriente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_corrientesFK($this->connexion,' where id=-1 ',$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $documento_cuenta_cobrarForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$documento_cuenta_cobrarForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
		}
		
		if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($documento_cuenta_cobrarForeignKey->idempresaDefaultFK==0) {
					$documento_cuenta_cobrarForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$documento_cuenta_cobrarForeignKey->empresasFK[$empresaLocal->getId()]=documento_cuenta_cobrar_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($documento_cuenta_cobrar_session->bigidempresaActual!=null && $documento_cuenta_cobrar_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($documento_cuenta_cobrar_session->bigidempresaActual);//WithConnection

				$documento_cuenta_cobrarForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=documento_cuenta_cobrar_util::getempresaDescripcion($empresaLogic->getempresa());
				$documento_cuenta_cobrarForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$documento_cuenta_cobrarForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
		}
		
		if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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
				if($documento_cuenta_cobrarForeignKey->idsucursalDefaultFK==0) {
					$documento_cuenta_cobrarForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$documento_cuenta_cobrarForeignKey->sucursalsFK[$sucursalLocal->getId()]=documento_cuenta_cobrar_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($documento_cuenta_cobrar_session->bigidsucursalActual!=null && $documento_cuenta_cobrar_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($documento_cuenta_cobrar_session->bigidsucursalActual);//WithConnection

				$documento_cuenta_cobrarForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=documento_cuenta_cobrar_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$documento_cuenta_cobrarForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$documento_cuenta_cobrarForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
		}
		
		if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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
				if($documento_cuenta_cobrarForeignKey->idejercicioDefaultFK==0) {
					$documento_cuenta_cobrarForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$documento_cuenta_cobrarForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=documento_cuenta_cobrar_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($documento_cuenta_cobrar_session->bigidejercicioActual!=null && $documento_cuenta_cobrar_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($documento_cuenta_cobrar_session->bigidejercicioActual);//WithConnection

				$documento_cuenta_cobrarForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=documento_cuenta_cobrar_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$documento_cuenta_cobrarForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$documento_cuenta_cobrarForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
		}
		
		if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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
				if($documento_cuenta_cobrarForeignKey->idperiodoDefaultFK==0) {
					$documento_cuenta_cobrarForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$documento_cuenta_cobrarForeignKey->periodosFK[$periodoLocal->getId()]=documento_cuenta_cobrar_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($documento_cuenta_cobrar_session->bigidperiodoActual!=null && $documento_cuenta_cobrar_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($documento_cuenta_cobrar_session->bigidperiodoActual);//WithConnection

				$documento_cuenta_cobrarForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=documento_cuenta_cobrar_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$documento_cuenta_cobrarForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$documento_cuenta_cobrarForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
		}
		
		if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($documento_cuenta_cobrarForeignKey->idusuarioDefaultFK==0) {
					$documento_cuenta_cobrarForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$documento_cuenta_cobrarForeignKey->usuariosFK[$usuarioLocal->getId()]=documento_cuenta_cobrar_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($documento_cuenta_cobrar_session->bigidusuarioActual!=null && $documento_cuenta_cobrar_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($documento_cuenta_cobrar_session->bigidusuarioActual);//WithConnection

				$documento_cuenta_cobrarForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=documento_cuenta_cobrar_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$documento_cuenta_cobrarForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosclientesFK($connexion=null,$strRecargarFkQuery='',$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$clienteLogic= new cliente_logic();
		$pagination= new Pagination();
		$documento_cuenta_cobrarForeignKey->clientesFK=array();

		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
		}
		
		if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesioncliente!=true) {
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
				if($documento_cuenta_cobrarForeignKey->idclienteDefaultFK==0) {
					$documento_cuenta_cobrarForeignKey->idclienteDefaultFK=$clienteLocal->getId();
				}

				$documento_cuenta_cobrarForeignKey->clientesFK[$clienteLocal->getId()]=documento_cuenta_cobrar_util::getclienteDescripcion($clienteLocal);
			}

		} else {

			if($documento_cuenta_cobrar_session->bigidclienteActual!=null && $documento_cuenta_cobrar_session->bigidclienteActual > 0) {
				$clienteLogic->getEntity($documento_cuenta_cobrar_session->bigidclienteActual);//WithConnection

				$documento_cuenta_cobrarForeignKey->clientesFK[$clienteLogic->getcliente()->getId()]=documento_cuenta_cobrar_util::getclienteDescripcion($clienteLogic->getcliente());
				$documento_cuenta_cobrarForeignKey->idclienteDefaultFK=$clienteLogic->getcliente()->getId();
			}
		}
	}

	public function cargarCombosforma_pago_clientesFK($connexion=null,$strRecargarFkQuery='',$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$forma_pago_clienteLogic= new forma_pago_cliente_logic();
		$pagination= new Pagination();
		$documento_cuenta_cobrarForeignKey->forma_pago_clientesFK=array();

		$forma_pago_clienteLogic->setConnexion($connexion);
		$forma_pago_clienteLogic->getforma_pago_clienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
		}
		
		if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionforma_pago_cliente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=forma_pago_cliente_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalforma_pago_cliente=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalforma_pago_cliente=Funciones::GetFinalQueryAppend($finalQueryGlobalforma_pago_cliente, '');
				$finalQueryGlobalforma_pago_cliente.=forma_pago_cliente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalforma_pago_cliente.$strRecargarFkQuery;		

				$forma_pago_clienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($forma_pago_clienteLogic->getforma_pago_clientes() as $forma_pago_clienteLocal ) {
				if($documento_cuenta_cobrarForeignKey->idforma_pago_clienteDefaultFK==0) {
					$documento_cuenta_cobrarForeignKey->idforma_pago_clienteDefaultFK=$forma_pago_clienteLocal->getId();
				}

				$documento_cuenta_cobrarForeignKey->forma_pago_clientesFK[$forma_pago_clienteLocal->getId()]=documento_cuenta_cobrar_util::getforma_pago_clienteDescripcion($forma_pago_clienteLocal);
			}

		} else {

			if($documento_cuenta_cobrar_session->bigidforma_pago_clienteActual!=null && $documento_cuenta_cobrar_session->bigidforma_pago_clienteActual > 0) {
				$forma_pago_clienteLogic->getEntity($documento_cuenta_cobrar_session->bigidforma_pago_clienteActual);//WithConnection

				$documento_cuenta_cobrarForeignKey->forma_pago_clientesFK[$forma_pago_clienteLogic->getforma_pago_cliente()->getId()]=documento_cuenta_cobrar_util::getforma_pago_clienteDescripcion($forma_pago_clienteLogic->getforma_pago_cliente());
				$documento_cuenta_cobrarForeignKey->idforma_pago_clienteDefaultFK=$forma_pago_clienteLogic->getforma_pago_cliente()->getId();
			}
		}
	}

	public function cargarComboscuenta_corrientesFK($connexion=null,$strRecargarFkQuery='',$documento_cuenta_cobrarForeignKey,$documento_cuenta_cobrar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuenta_corrienteLogic= new cuenta_corriente_logic();
		$pagination= new Pagination();
		$documento_cuenta_cobrarForeignKey->cuenta_corrientesFK=array();

		$cuenta_corrienteLogic->setConnexion($connexion);
		$cuenta_corrienteLogic->getcuenta_corrienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
		}
		
		if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesioncuenta_corriente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_corriente_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcuenta_corriente=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta_corriente=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta_corriente, '');
				$finalQueryGlobalcuenta_corriente.=cuenta_corriente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta_corriente.$strRecargarFkQuery;		

				$cuenta_corrienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($cuenta_corrienteLogic->getcuenta_corrientes() as $cuenta_corrienteLocal ) {
				if($documento_cuenta_cobrarForeignKey->idcuenta_corrienteDefaultFK==0) {
					$documento_cuenta_cobrarForeignKey->idcuenta_corrienteDefaultFK=$cuenta_corrienteLocal->getId();
				}

				$documento_cuenta_cobrarForeignKey->cuenta_corrientesFK[$cuenta_corrienteLocal->getId()]=documento_cuenta_cobrar_util::getcuenta_corrienteDescripcion($cuenta_corrienteLocal);
			}

		} else {

			if($documento_cuenta_cobrar_session->bigidcuenta_corrienteActual!=null && $documento_cuenta_cobrar_session->bigidcuenta_corrienteActual > 0) {
				$cuenta_corrienteLogic->getEntity($documento_cuenta_cobrar_session->bigidcuenta_corrienteActual);//WithConnection

				$documento_cuenta_cobrarForeignKey->cuenta_corrientesFK[$cuenta_corrienteLogic->getcuenta_corriente()->getId()]=documento_cuenta_cobrar_util::getcuenta_corrienteDescripcion($cuenta_corrienteLogic->getcuenta_corriente());
				$documento_cuenta_cobrarForeignKey->idcuenta_corrienteDefaultFK=$cuenta_corrienteLogic->getcuenta_corriente()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($documento_cuenta_cobrar,$facturas,$imagendocumentocuentacobrars,$facturalotes,$devolucionfacturas) {
		$this->saveRelacionesBase($documento_cuenta_cobrar,$facturas,$imagendocumentocuentacobrars,$facturalotes,$devolucionfacturas,true);
	}

	public function saveRelaciones($documento_cuenta_cobrar,$facturas,$imagendocumentocuentacobrars,$facturalotes,$devolucionfacturas) {
		$this->saveRelacionesBase($documento_cuenta_cobrar,$facturas,$imagendocumentocuentacobrars,$facturalotes,$devolucionfacturas,false);
	}

	public function saveRelacionesBase($documento_cuenta_cobrar,$facturas=array(),$imagendocumentocuentacobrars=array(),$facturalotes=array(),$devolucionfacturas=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$documento_cuenta_cobrar->setfacturas($facturas);
			$documento_cuenta_cobrar->setimagen_documento_cuenta_cobrars($imagendocumentocuentacobrars);
			$documento_cuenta_cobrar->setfactura_lotes($facturalotes);
			$documento_cuenta_cobrar->setdevolucion_facturas($devolucionfacturas);
			$this->setdocumento_cuenta_cobrar($documento_cuenta_cobrar);

			if(true) {

				//documento_cuenta_cobrar_logic_add::updateRelacionesToSave($documento_cuenta_cobrar,$this);

				if(($this->documento_cuenta_cobrar->getIsNew() || $this->documento_cuenta_cobrar->getIsChanged()) && !$this->documento_cuenta_cobrar->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($facturas,$imagendocumentocuentacobrars,$facturalotes,$devolucionfacturas);

				} else if($this->documento_cuenta_cobrar->getIsDeleted()) {
					$this->saveRelacionesDetalles($facturas,$imagendocumentocuentacobrars,$facturalotes,$devolucionfacturas);
					$this->save();
				}

				//documento_cuenta_cobrar_logic_add::updateRelacionesToSaveAfter($documento_cuenta_cobrar,$this);

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
	
	
	public function saveRelacionesDetalles($facturas=array(),$imagendocumentocuentacobrars=array(),$facturalotes=array(),$devolucionfacturas=array()) {
		try {
	

			$iddocumento_cuenta_cobrarActual=$this->getdocumento_cuenta_cobrar()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_carga.php');
			factura_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$facturaLogic_Desde_documento_cuenta_cobrar=new factura_logic();
			$facturaLogic_Desde_documento_cuenta_cobrar->setfacturas($facturas);

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
			$imagendocumentocuentacobrarLogic_Desde_documento_cuenta_cobrar->setimagen_documento_cuenta_cobrars($imagendocumentocuentacobrars);

			$imagendocumentocuentacobrarLogic_Desde_documento_cuenta_cobrar->setConnexion($this->getConnexion());
			$imagendocumentocuentacobrarLogic_Desde_documento_cuenta_cobrar->setDatosCliente($this->datosCliente);

			foreach($imagendocumentocuentacobrarLogic_Desde_documento_cuenta_cobrar->getimagen_documento_cuenta_cobrars() as $imagendocumentocuentacobrar_Desde_documento_cuenta_cobrar) {
				$imagendocumentocuentacobrar_Desde_documento_cuenta_cobrar->setid_documento_cuenta_cobrar($iddocumento_cuenta_cobrarActual);
			}

			$imagendocumentocuentacobrarLogic_Desde_documento_cuenta_cobrar->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/util/factura_lote_carga.php');
			factura_lote_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$facturaloteLogic_Desde_documento_cuenta_cobrar=new factura_lote_logic();
			$facturaloteLogic_Desde_documento_cuenta_cobrar->setfactura_lotes($facturalotes);

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
			$devolucionfacturaLogic_Desde_documento_cuenta_cobrar->setdevolucion_facturas($devolucionfacturas);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $documento_cuenta_cobrars,documento_cuenta_cobrar_param_return $documento_cuenta_cobrarParameterGeneral) : documento_cuenta_cobrar_param_return {
		$documento_cuenta_cobrarReturnGeneral=new documento_cuenta_cobrar_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $documento_cuenta_cobrarReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $documento_cuenta_cobrars,documento_cuenta_cobrar_param_return $documento_cuenta_cobrarParameterGeneral) : documento_cuenta_cobrar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$documento_cuenta_cobrarReturnGeneral=new documento_cuenta_cobrar_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $documento_cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $documento_cuenta_cobrars,documento_cuenta_cobrar $documento_cuenta_cobrar,documento_cuenta_cobrar_param_return $documento_cuenta_cobrarParameterGeneral,bool $isEsNuevodocumento_cuenta_cobrar,array $clases) : documento_cuenta_cobrar_param_return {
		 try {	
			$documento_cuenta_cobrarReturnGeneral=new documento_cuenta_cobrar_param_return();
	
			$documento_cuenta_cobrarReturnGeneral->setdocumento_cuenta_cobrar($documento_cuenta_cobrar);
			$documento_cuenta_cobrarReturnGeneral->setdocumento_cuenta_cobrars($documento_cuenta_cobrars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$documento_cuenta_cobrarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $documento_cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $documento_cuenta_cobrars,documento_cuenta_cobrar $documento_cuenta_cobrar,documento_cuenta_cobrar_param_return $documento_cuenta_cobrarParameterGeneral,bool $isEsNuevodocumento_cuenta_cobrar,array $clases) : documento_cuenta_cobrar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$documento_cuenta_cobrarReturnGeneral=new documento_cuenta_cobrar_param_return();
	
			$documento_cuenta_cobrarReturnGeneral->setdocumento_cuenta_cobrar($documento_cuenta_cobrar);
			$documento_cuenta_cobrarReturnGeneral->setdocumento_cuenta_cobrars($documento_cuenta_cobrars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$documento_cuenta_cobrarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $documento_cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $documento_cuenta_cobrars,documento_cuenta_cobrar $documento_cuenta_cobrar,documento_cuenta_cobrar_param_return $documento_cuenta_cobrarParameterGeneral,bool $isEsNuevodocumento_cuenta_cobrar,array $clases) : documento_cuenta_cobrar_param_return {
		 try {	
			$documento_cuenta_cobrarReturnGeneral=new documento_cuenta_cobrar_param_return();
	
			$documento_cuenta_cobrarReturnGeneral->setdocumento_cuenta_cobrar($documento_cuenta_cobrar);
			$documento_cuenta_cobrarReturnGeneral->setdocumento_cuenta_cobrars($documento_cuenta_cobrars);
			
			
			
			return $documento_cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $documento_cuenta_cobrars,documento_cuenta_cobrar $documento_cuenta_cobrar,documento_cuenta_cobrar_param_return $documento_cuenta_cobrarParameterGeneral,bool $isEsNuevodocumento_cuenta_cobrar,array $clases) : documento_cuenta_cobrar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$documento_cuenta_cobrarReturnGeneral=new documento_cuenta_cobrar_param_return();
	
			$documento_cuenta_cobrarReturnGeneral->setdocumento_cuenta_cobrar($documento_cuenta_cobrar);
			$documento_cuenta_cobrarReturnGeneral->setdocumento_cuenta_cobrars($documento_cuenta_cobrars);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $documento_cuenta_cobrarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,documento_cuenta_cobrar $documento_cuenta_cobrar,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,documento_cuenta_cobrar $documento_cuenta_cobrar,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		documento_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(documento_cuenta_cobrar $documento_cuenta_cobrar,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//documento_cuenta_cobrar_logic_add::updatedocumento_cuenta_cobrarToGet($this->documento_cuenta_cobrar);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$documento_cuenta_cobrar->setempresa($this->documento_cuenta_cobrarDataAccess->getempresa($this->connexion,$documento_cuenta_cobrar));
		$documento_cuenta_cobrar->setsucursal($this->documento_cuenta_cobrarDataAccess->getsucursal($this->connexion,$documento_cuenta_cobrar));
		$documento_cuenta_cobrar->setejercicio($this->documento_cuenta_cobrarDataAccess->getejercicio($this->connexion,$documento_cuenta_cobrar));
		$documento_cuenta_cobrar->setperiodo($this->documento_cuenta_cobrarDataAccess->getperiodo($this->connexion,$documento_cuenta_cobrar));
		$documento_cuenta_cobrar->setusuario($this->documento_cuenta_cobrarDataAccess->getusuario($this->connexion,$documento_cuenta_cobrar));
		$documento_cuenta_cobrar->setcliente($this->documento_cuenta_cobrarDataAccess->getcliente($this->connexion,$documento_cuenta_cobrar));
		$documento_cuenta_cobrar->setforma_pago_cliente($this->documento_cuenta_cobrarDataAccess->getforma_pago_cliente($this->connexion,$documento_cuenta_cobrar));
		$documento_cuenta_cobrar->setcuenta_corriente($this->documento_cuenta_cobrarDataAccess->getcuenta_corriente($this->connexion,$documento_cuenta_cobrar));
		$documento_cuenta_cobrar->setfacturas($this->documento_cuenta_cobrarDataAccess->getfacturas($this->connexion,$documento_cuenta_cobrar));
		$documento_cuenta_cobrar->setimagen_documento_cuenta_cobrars($this->documento_cuenta_cobrarDataAccess->getimagen_documento_cuenta_cobrars($this->connexion,$documento_cuenta_cobrar));
		$documento_cuenta_cobrar->setfactura_lotes($this->documento_cuenta_cobrarDataAccess->getfactura_lotes($this->connexion,$documento_cuenta_cobrar));
		$documento_cuenta_cobrar->setdevolucion_facturas($this->documento_cuenta_cobrarDataAccess->getdevolucion_facturas($this->connexion,$documento_cuenta_cobrar));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$documento_cuenta_cobrar->setempresa($this->documento_cuenta_cobrarDataAccess->getempresa($this->connexion,$documento_cuenta_cobrar));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$documento_cuenta_cobrar->setsucursal($this->documento_cuenta_cobrarDataAccess->getsucursal($this->connexion,$documento_cuenta_cobrar));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$documento_cuenta_cobrar->setejercicio($this->documento_cuenta_cobrarDataAccess->getejercicio($this->connexion,$documento_cuenta_cobrar));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$documento_cuenta_cobrar->setperiodo($this->documento_cuenta_cobrarDataAccess->getperiodo($this->connexion,$documento_cuenta_cobrar));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$documento_cuenta_cobrar->setusuario($this->documento_cuenta_cobrarDataAccess->getusuario($this->connexion,$documento_cuenta_cobrar));
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$documento_cuenta_cobrar->setcliente($this->documento_cuenta_cobrarDataAccess->getcliente($this->connexion,$documento_cuenta_cobrar));
				continue;
			}

			if($clas->clas==forma_pago_cliente::$class.'') {
				$documento_cuenta_cobrar->setforma_pago_cliente($this->documento_cuenta_cobrarDataAccess->getforma_pago_cliente($this->connexion,$documento_cuenta_cobrar));
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				$documento_cuenta_cobrar->setcuenta_corriente($this->documento_cuenta_cobrarDataAccess->getcuenta_corriente($this->connexion,$documento_cuenta_cobrar));
				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$documento_cuenta_cobrar->setfacturas($this->documento_cuenta_cobrarDataAccess->getfacturas($this->connexion,$documento_cuenta_cobrar));

				if($this->isConDeep) {
					$facturaLogic= new factura_logic($this->connexion);
					$facturaLogic->setfacturas($documento_cuenta_cobrar->getfacturas());
					$classesLocal=factura_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$facturaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					factura_util::refrescarFKDescripciones($facturaLogic->getfacturas());
					$documento_cuenta_cobrar->setfacturas($facturaLogic->getfacturas());
				}

				continue;
			}

			if($clas->clas==imagen_documento_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$documento_cuenta_cobrar->setimagen_documento_cuenta_cobrars($this->documento_cuenta_cobrarDataAccess->getimagen_documento_cuenta_cobrars($this->connexion,$documento_cuenta_cobrar));

				if($this->isConDeep) {
					$imagendocumentocuentacobrarLogic= new imagen_documento_cuenta_cobrar_logic($this->connexion);
					$imagendocumentocuentacobrarLogic->setimagen_documento_cuenta_cobrars($documento_cuenta_cobrar->getimagen_documento_cuenta_cobrars());
					$classesLocal=imagen_documento_cuenta_cobrar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$imagendocumentocuentacobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					imagen_documento_cuenta_cobrar_util::refrescarFKDescripciones($imagendocumentocuentacobrarLogic->getimagen_documento_cuenta_cobrars());
					$documento_cuenta_cobrar->setimagen_documento_cuenta_cobrars($imagendocumentocuentacobrarLogic->getimagen_documento_cuenta_cobrars());
				}

				continue;
			}

			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$documento_cuenta_cobrar->setfactura_lotes($this->documento_cuenta_cobrarDataAccess->getfactura_lotes($this->connexion,$documento_cuenta_cobrar));

				if($this->isConDeep) {
					$facturaloteLogic= new factura_lote_logic($this->connexion);
					$facturaloteLogic->setfactura_lotes($documento_cuenta_cobrar->getfactura_lotes());
					$classesLocal=factura_lote_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$facturaloteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					factura_lote_util::refrescarFKDescripciones($facturaloteLogic->getfactura_lotes());
					$documento_cuenta_cobrar->setfactura_lotes($facturaloteLogic->getfactura_lotes());
				}

				continue;
			}

			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$documento_cuenta_cobrar->setdevolucion_facturas($this->documento_cuenta_cobrarDataAccess->getdevolucion_facturas($this->connexion,$documento_cuenta_cobrar));

				if($this->isConDeep) {
					$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
					$devolucionfacturaLogic->setdevolucion_facturas($documento_cuenta_cobrar->getdevolucion_facturas());
					$classesLocal=devolucion_factura_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$devolucionfacturaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					devolucion_factura_util::refrescarFKDescripciones($devolucionfacturaLogic->getdevolucion_facturas());
					$documento_cuenta_cobrar->setdevolucion_facturas($devolucionfacturaLogic->getdevolucion_facturas());
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
			$documento_cuenta_cobrar->setempresa($this->documento_cuenta_cobrarDataAccess->getempresa($this->connexion,$documento_cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_cobrar->setsucursal($this->documento_cuenta_cobrarDataAccess->getsucursal($this->connexion,$documento_cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_cobrar->setejercicio($this->documento_cuenta_cobrarDataAccess->getejercicio($this->connexion,$documento_cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_cobrar->setperiodo($this->documento_cuenta_cobrarDataAccess->getperiodo($this->connexion,$documento_cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_cobrar->setusuario($this->documento_cuenta_cobrarDataAccess->getusuario($this->connexion,$documento_cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_cobrar->setcliente($this->documento_cuenta_cobrarDataAccess->getcliente($this->connexion,$documento_cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==forma_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_cobrar->setforma_pago_cliente($this->documento_cuenta_cobrarDataAccess->getforma_pago_cliente($this->connexion,$documento_cuenta_cobrar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_cobrar->setcuenta_corriente($this->documento_cuenta_cobrarDataAccess->getcuenta_corriente($this->connexion,$documento_cuenta_cobrar));
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
			$documento_cuenta_cobrar->setfacturas($this->documento_cuenta_cobrarDataAccess->getfacturas($this->connexion,$documento_cuenta_cobrar));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_documento_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_documento_cuenta_cobrar::$class);
			$documento_cuenta_cobrar->setimagen_documento_cuenta_cobrars($this->documento_cuenta_cobrarDataAccess->getimagen_documento_cuenta_cobrars($this->connexion,$documento_cuenta_cobrar));
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
			$documento_cuenta_cobrar->setfactura_lotes($this->documento_cuenta_cobrarDataAccess->getfactura_lotes($this->connexion,$documento_cuenta_cobrar));
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
			$documento_cuenta_cobrar->setdevolucion_facturas($this->documento_cuenta_cobrarDataAccess->getdevolucion_facturas($this->connexion,$documento_cuenta_cobrar));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$documento_cuenta_cobrar->setempresa($this->documento_cuenta_cobrarDataAccess->getempresa($this->connexion,$documento_cuenta_cobrar));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($documento_cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$documento_cuenta_cobrar->setsucursal($this->documento_cuenta_cobrarDataAccess->getsucursal($this->connexion,$documento_cuenta_cobrar));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($documento_cuenta_cobrar->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$documento_cuenta_cobrar->setejercicio($this->documento_cuenta_cobrarDataAccess->getejercicio($this->connexion,$documento_cuenta_cobrar));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($documento_cuenta_cobrar->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$documento_cuenta_cobrar->setperiodo($this->documento_cuenta_cobrarDataAccess->getperiodo($this->connexion,$documento_cuenta_cobrar));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($documento_cuenta_cobrar->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$documento_cuenta_cobrar->setusuario($this->documento_cuenta_cobrarDataAccess->getusuario($this->connexion,$documento_cuenta_cobrar));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($documento_cuenta_cobrar->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$documento_cuenta_cobrar->setcliente($this->documento_cuenta_cobrarDataAccess->getcliente($this->connexion,$documento_cuenta_cobrar));
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepLoad($documento_cuenta_cobrar->getcliente(),$isDeep,$deepLoadType,$clases);
				
		$documento_cuenta_cobrar->setforma_pago_cliente($this->documento_cuenta_cobrarDataAccess->getforma_pago_cliente($this->connexion,$documento_cuenta_cobrar));
		$forma_pago_clienteLogic= new forma_pago_cliente_logic($this->connexion);
		$forma_pago_clienteLogic->deepLoad($documento_cuenta_cobrar->getforma_pago_cliente(),$isDeep,$deepLoadType,$clases);
				
		$documento_cuenta_cobrar->setcuenta_corriente($this->documento_cuenta_cobrarDataAccess->getcuenta_corriente($this->connexion,$documento_cuenta_cobrar));
		$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
		$cuenta_corrienteLogic->deepLoad($documento_cuenta_cobrar->getcuenta_corriente(),$isDeep,$deepLoadType,$clases);
				

		$documento_cuenta_cobrar->setfacturas($this->documento_cuenta_cobrarDataAccess->getfacturas($this->connexion,$documento_cuenta_cobrar));

		foreach($documento_cuenta_cobrar->getfacturas() as $factura) {
			$facturaLogic= new factura_logic($this->connexion);
			$facturaLogic->deepLoad($factura,$isDeep,$deepLoadType,$clases);
		}

		$documento_cuenta_cobrar->setimagen_documento_cuenta_cobrars($this->documento_cuenta_cobrarDataAccess->getimagen_documento_cuenta_cobrars($this->connexion,$documento_cuenta_cobrar));

		foreach($documento_cuenta_cobrar->getimagen_documento_cuenta_cobrars() as $imagendocumentocuentacobrar) {
			$imagendocumentocuentacobrarLogic= new imagen_documento_cuenta_cobrar_logic($this->connexion);
			$imagendocumentocuentacobrarLogic->deepLoad($imagendocumentocuentacobrar,$isDeep,$deepLoadType,$clases);
		}

		$documento_cuenta_cobrar->setfactura_lotes($this->documento_cuenta_cobrarDataAccess->getfactura_lotes($this->connexion,$documento_cuenta_cobrar));

		foreach($documento_cuenta_cobrar->getfactura_lotes() as $facturalote) {
			$facturaloteLogic= new factura_lote_logic($this->connexion);
			$facturaloteLogic->deepLoad($facturalote,$isDeep,$deepLoadType,$clases);
		}

		$documento_cuenta_cobrar->setdevolucion_facturas($this->documento_cuenta_cobrarDataAccess->getdevolucion_facturas($this->connexion,$documento_cuenta_cobrar));

		foreach($documento_cuenta_cobrar->getdevolucion_facturas() as $devolucionfactura) {
			$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
			$devolucionfacturaLogic->deepLoad($devolucionfactura,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$documento_cuenta_cobrar->setempresa($this->documento_cuenta_cobrarDataAccess->getempresa($this->connexion,$documento_cuenta_cobrar));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($documento_cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$documento_cuenta_cobrar->setsucursal($this->documento_cuenta_cobrarDataAccess->getsucursal($this->connexion,$documento_cuenta_cobrar));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($documento_cuenta_cobrar->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$documento_cuenta_cobrar->setejercicio($this->documento_cuenta_cobrarDataAccess->getejercicio($this->connexion,$documento_cuenta_cobrar));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($documento_cuenta_cobrar->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$documento_cuenta_cobrar->setperiodo($this->documento_cuenta_cobrarDataAccess->getperiodo($this->connexion,$documento_cuenta_cobrar));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($documento_cuenta_cobrar->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$documento_cuenta_cobrar->setusuario($this->documento_cuenta_cobrarDataAccess->getusuario($this->connexion,$documento_cuenta_cobrar));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($documento_cuenta_cobrar->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$documento_cuenta_cobrar->setcliente($this->documento_cuenta_cobrarDataAccess->getcliente($this->connexion,$documento_cuenta_cobrar));
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($documento_cuenta_cobrar->getcliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==forma_pago_cliente::$class.'') {
				$documento_cuenta_cobrar->setforma_pago_cliente($this->documento_cuenta_cobrarDataAccess->getforma_pago_cliente($this->connexion,$documento_cuenta_cobrar));
				$forma_pago_clienteLogic= new forma_pago_cliente_logic($this->connexion);
				$forma_pago_clienteLogic->deepLoad($documento_cuenta_cobrar->getforma_pago_cliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				$documento_cuenta_cobrar->setcuenta_corriente($this->documento_cuenta_cobrarDataAccess->getcuenta_corriente($this->connexion,$documento_cuenta_cobrar));
				$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
				$cuenta_corrienteLogic->deepLoad($documento_cuenta_cobrar->getcuenta_corriente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$documento_cuenta_cobrar->setfacturas($this->documento_cuenta_cobrarDataAccess->getfacturas($this->connexion,$documento_cuenta_cobrar));

				foreach($documento_cuenta_cobrar->getfacturas() as $factura) {
					$facturaLogic= new factura_logic($this->connexion);
					$facturaLogic->deepLoad($factura,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==imagen_documento_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$documento_cuenta_cobrar->setimagen_documento_cuenta_cobrars($this->documento_cuenta_cobrarDataAccess->getimagen_documento_cuenta_cobrars($this->connexion,$documento_cuenta_cobrar));

				foreach($documento_cuenta_cobrar->getimagen_documento_cuenta_cobrars() as $imagendocumentocuentacobrar) {
					$imagendocumentocuentacobrarLogic= new imagen_documento_cuenta_cobrar_logic($this->connexion);
					$imagendocumentocuentacobrarLogic->deepLoad($imagendocumentocuentacobrar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$documento_cuenta_cobrar->setfactura_lotes($this->documento_cuenta_cobrarDataAccess->getfactura_lotes($this->connexion,$documento_cuenta_cobrar));

				foreach($documento_cuenta_cobrar->getfactura_lotes() as $facturalote) {
					$facturaloteLogic= new factura_lote_logic($this->connexion);
					$facturaloteLogic->deepLoad($facturalote,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$documento_cuenta_cobrar->setdevolucion_facturas($this->documento_cuenta_cobrarDataAccess->getdevolucion_facturas($this->connexion,$documento_cuenta_cobrar));

				foreach($documento_cuenta_cobrar->getdevolucion_facturas() as $devolucionfactura) {
					$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
					$devolucionfacturaLogic->deepLoad($devolucionfactura,$isDeep,$deepLoadType,$clases);
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
			$documento_cuenta_cobrar->setempresa($this->documento_cuenta_cobrarDataAccess->getempresa($this->connexion,$documento_cuenta_cobrar));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($documento_cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_cobrar->setsucursal($this->documento_cuenta_cobrarDataAccess->getsucursal($this->connexion,$documento_cuenta_cobrar));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($documento_cuenta_cobrar->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_cobrar->setejercicio($this->documento_cuenta_cobrarDataAccess->getejercicio($this->connexion,$documento_cuenta_cobrar));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($documento_cuenta_cobrar->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_cobrar->setperiodo($this->documento_cuenta_cobrarDataAccess->getperiodo($this->connexion,$documento_cuenta_cobrar));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($documento_cuenta_cobrar->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_cobrar->setusuario($this->documento_cuenta_cobrarDataAccess->getusuario($this->connexion,$documento_cuenta_cobrar));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($documento_cuenta_cobrar->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_cobrar->setcliente($this->documento_cuenta_cobrarDataAccess->getcliente($this->connexion,$documento_cuenta_cobrar));
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($documento_cuenta_cobrar->getcliente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==forma_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_cobrar->setforma_pago_cliente($this->documento_cuenta_cobrarDataAccess->getforma_pago_cliente($this->connexion,$documento_cuenta_cobrar));
			$forma_pago_clienteLogic= new forma_pago_cliente_logic($this->connexion);
			$forma_pago_clienteLogic->deepLoad($documento_cuenta_cobrar->getforma_pago_cliente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_cobrar->setcuenta_corriente($this->documento_cuenta_cobrarDataAccess->getcuenta_corriente($this->connexion,$documento_cuenta_cobrar));
			$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
			$cuenta_corrienteLogic->deepLoad($documento_cuenta_cobrar->getcuenta_corriente(),$isDeep,$deepLoadType,$clases);
				
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
			$documento_cuenta_cobrar->setfacturas($this->documento_cuenta_cobrarDataAccess->getfacturas($this->connexion,$documento_cuenta_cobrar));

			foreach($documento_cuenta_cobrar->getfacturas() as $factura) {
				$facturaLogic= new factura_logic($this->connexion);
				$facturaLogic->deepLoad($factura,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_documento_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_documento_cuenta_cobrar::$class);
			$documento_cuenta_cobrar->setimagen_documento_cuenta_cobrars($this->documento_cuenta_cobrarDataAccess->getimagen_documento_cuenta_cobrars($this->connexion,$documento_cuenta_cobrar));

			foreach($documento_cuenta_cobrar->getimagen_documento_cuenta_cobrars() as $imagendocumentocuentacobrar) {
				$imagendocumentocuentacobrarLogic= new imagen_documento_cuenta_cobrar_logic($this->connexion);
				$imagendocumentocuentacobrarLogic->deepLoad($imagendocumentocuentacobrar,$isDeep,$deepLoadType,$clases);
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
			$documento_cuenta_cobrar->setfactura_lotes($this->documento_cuenta_cobrarDataAccess->getfactura_lotes($this->connexion,$documento_cuenta_cobrar));

			foreach($documento_cuenta_cobrar->getfactura_lotes() as $facturalote) {
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
			$documento_cuenta_cobrar->setdevolucion_facturas($this->documento_cuenta_cobrarDataAccess->getdevolucion_facturas($this->connexion,$documento_cuenta_cobrar));

			foreach($documento_cuenta_cobrar->getdevolucion_facturas() as $devolucionfactura) {
				$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
				$devolucionfacturaLogic->deepLoad($devolucionfactura,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(documento_cuenta_cobrar $documento_cuenta_cobrar,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//documento_cuenta_cobrar_logic_add::updatedocumento_cuenta_cobrarToSave($this->documento_cuenta_cobrar);			
			
			if(!$paraDeleteCascade) {				
				documento_cuenta_cobrar_data::save($documento_cuenta_cobrar, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($documento_cuenta_cobrar->getempresa(),$this->connexion);
		sucursal_data::save($documento_cuenta_cobrar->getsucursal(),$this->connexion);
		ejercicio_data::save($documento_cuenta_cobrar->getejercicio(),$this->connexion);
		periodo_data::save($documento_cuenta_cobrar->getperiodo(),$this->connexion);
		usuario_data::save($documento_cuenta_cobrar->getusuario(),$this->connexion);
		cliente_data::save($documento_cuenta_cobrar->getcliente(),$this->connexion);
		forma_pago_cliente_data::save($documento_cuenta_cobrar->getforma_pago_cliente(),$this->connexion);
		cuenta_corriente_data::save($documento_cuenta_cobrar->getcuenta_corriente(),$this->connexion);

		foreach($documento_cuenta_cobrar->getfacturas() as $factura) {
			$factura->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
			factura_data::save($factura,$this->connexion);
		}


		foreach($documento_cuenta_cobrar->getimagen_documento_cuenta_cobrars() as $imagendocumentocuentacobrar) {
			$imagendocumentocuentacobrar->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
			imagen_documento_cuenta_cobrar_data::save($imagendocumentocuentacobrar,$this->connexion);
		}


		foreach($documento_cuenta_cobrar->getfactura_lotes() as $facturalote) {
			$facturalote->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
			factura_lote_data::save($facturalote,$this->connexion);
		}


		foreach($documento_cuenta_cobrar->getdevolucion_facturas() as $devolucionfactura) {
			$devolucionfactura->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
			devolucion_factura_data::save($devolucionfactura,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($documento_cuenta_cobrar->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($documento_cuenta_cobrar->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($documento_cuenta_cobrar->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($documento_cuenta_cobrar->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($documento_cuenta_cobrar->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($documento_cuenta_cobrar->getcliente(),$this->connexion);
				continue;
			}

			if($clas->clas==forma_pago_cliente::$class.'') {
				forma_pago_cliente_data::save($documento_cuenta_cobrar->getforma_pago_cliente(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				cuenta_corriente_data::save($documento_cuenta_cobrar->getcuenta_corriente(),$this->connexion);
				continue;
			}


			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($documento_cuenta_cobrar->getfacturas() as $factura) {
					$factura->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
					factura_data::save($factura,$this->connexion);
				}

				continue;
			}

			if($clas->clas==imagen_documento_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($documento_cuenta_cobrar->getimagen_documento_cuenta_cobrars() as $imagendocumentocuentacobrar) {
					$imagendocumentocuentacobrar->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
					imagen_documento_cuenta_cobrar_data::save($imagendocumentocuentacobrar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($documento_cuenta_cobrar->getfactura_lotes() as $facturalote) {
					$facturalote->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
					factura_lote_data::save($facturalote,$this->connexion);
				}

				continue;
			}

			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($documento_cuenta_cobrar->getdevolucion_facturas() as $devolucionfactura) {
					$devolucionfactura->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
					devolucion_factura_data::save($devolucionfactura,$this->connexion);
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
			empresa_data::save($documento_cuenta_cobrar->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($documento_cuenta_cobrar->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($documento_cuenta_cobrar->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($documento_cuenta_cobrar->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($documento_cuenta_cobrar->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($documento_cuenta_cobrar->getcliente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==forma_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			forma_pago_cliente_data::save($documento_cuenta_cobrar->getforma_pago_cliente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_corriente_data::save($documento_cuenta_cobrar->getcuenta_corriente(),$this->connexion);
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

			foreach($documento_cuenta_cobrar->getfacturas() as $factura) {
				$factura->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
				factura_data::save($factura,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_documento_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_documento_cuenta_cobrar::$class);

			foreach($documento_cuenta_cobrar->getimagen_documento_cuenta_cobrars() as $imagendocumentocuentacobrar) {
				$imagendocumentocuentacobrar->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
				imagen_documento_cuenta_cobrar_data::save($imagendocumentocuentacobrar,$this->connexion);
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

			foreach($documento_cuenta_cobrar->getfactura_lotes() as $facturalote) {
				$facturalote->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
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

			foreach($documento_cuenta_cobrar->getdevolucion_facturas() as $devolucionfactura) {
				$devolucionfactura->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
				devolucion_factura_data::save($devolucionfactura,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($documento_cuenta_cobrar->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($documento_cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($documento_cuenta_cobrar->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($documento_cuenta_cobrar->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($documento_cuenta_cobrar->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($documento_cuenta_cobrar->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($documento_cuenta_cobrar->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($documento_cuenta_cobrar->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($documento_cuenta_cobrar->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($documento_cuenta_cobrar->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cliente_data::save($documento_cuenta_cobrar->getcliente(),$this->connexion);
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepSave($documento_cuenta_cobrar->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		forma_pago_cliente_data::save($documento_cuenta_cobrar->getforma_pago_cliente(),$this->connexion);
		$forma_pago_clienteLogic= new forma_pago_cliente_logic($this->connexion);
		$forma_pago_clienteLogic->deepSave($documento_cuenta_cobrar->getforma_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_corriente_data::save($documento_cuenta_cobrar->getcuenta_corriente(),$this->connexion);
		$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
		$cuenta_corrienteLogic->deepSave($documento_cuenta_cobrar->getcuenta_corriente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($documento_cuenta_cobrar->getfacturas() as $factura) {
			$facturaLogic= new factura_logic($this->connexion);
			$factura->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
			factura_data::save($factura,$this->connexion);
			$facturaLogic->deepSave($factura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($documento_cuenta_cobrar->getimagen_documento_cuenta_cobrars() as $imagendocumentocuentacobrar) {
			$imagendocumentocuentacobrarLogic= new imagen_documento_cuenta_cobrar_logic($this->connexion);
			$imagendocumentocuentacobrar->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
			imagen_documento_cuenta_cobrar_data::save($imagendocumentocuentacobrar,$this->connexion);
			$imagendocumentocuentacobrarLogic->deepSave($imagendocumentocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($documento_cuenta_cobrar->getfactura_lotes() as $facturalote) {
			$facturaloteLogic= new factura_lote_logic($this->connexion);
			$facturalote->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
			factura_lote_data::save($facturalote,$this->connexion);
			$facturaloteLogic->deepSave($facturalote,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($documento_cuenta_cobrar->getdevolucion_facturas() as $devolucionfactura) {
			$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
			$devolucionfactura->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
			devolucion_factura_data::save($devolucionfactura,$this->connexion);
			$devolucionfacturaLogic->deepSave($devolucionfactura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($documento_cuenta_cobrar->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($documento_cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($documento_cuenta_cobrar->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($documento_cuenta_cobrar->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($documento_cuenta_cobrar->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($documento_cuenta_cobrar->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($documento_cuenta_cobrar->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($documento_cuenta_cobrar->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($documento_cuenta_cobrar->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($documento_cuenta_cobrar->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($documento_cuenta_cobrar->getcliente(),$this->connexion);
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepSave($documento_cuenta_cobrar->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==forma_pago_cliente::$class.'') {
				forma_pago_cliente_data::save($documento_cuenta_cobrar->getforma_pago_cliente(),$this->connexion);
				$forma_pago_clienteLogic= new forma_pago_cliente_logic($this->connexion);
				$forma_pago_clienteLogic->deepSave($documento_cuenta_cobrar->getforma_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				cuenta_corriente_data::save($documento_cuenta_cobrar->getcuenta_corriente(),$this->connexion);
				$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
				$cuenta_corrienteLogic->deepSave($documento_cuenta_cobrar->getcuenta_corriente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($documento_cuenta_cobrar->getfacturas() as $factura) {
					$facturaLogic= new factura_logic($this->connexion);
					$factura->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
					factura_data::save($factura,$this->connexion);
					$facturaLogic->deepSave($factura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==imagen_documento_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($documento_cuenta_cobrar->getimagen_documento_cuenta_cobrars() as $imagendocumentocuentacobrar) {
					$imagendocumentocuentacobrarLogic= new imagen_documento_cuenta_cobrar_logic($this->connexion);
					$imagendocumentocuentacobrar->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
					imagen_documento_cuenta_cobrar_data::save($imagendocumentocuentacobrar,$this->connexion);
					$imagendocumentocuentacobrarLogic->deepSave($imagendocumentocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==factura_lote::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($documento_cuenta_cobrar->getfactura_lotes() as $facturalote) {
					$facturaloteLogic= new factura_lote_logic($this->connexion);
					$facturalote->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
					factura_lote_data::save($facturalote,$this->connexion);
					$facturaloteLogic->deepSave($facturalote,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==devolucion_factura::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($documento_cuenta_cobrar->getdevolucion_facturas() as $devolucionfactura) {
					$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
					$devolucionfactura->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
					devolucion_factura_data::save($devolucionfactura,$this->connexion);
					$devolucionfacturaLogic->deepSave($devolucionfactura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($documento_cuenta_cobrar->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($documento_cuenta_cobrar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($documento_cuenta_cobrar->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($documento_cuenta_cobrar->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($documento_cuenta_cobrar->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($documento_cuenta_cobrar->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($documento_cuenta_cobrar->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($documento_cuenta_cobrar->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($documento_cuenta_cobrar->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($documento_cuenta_cobrar->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($documento_cuenta_cobrar->getcliente(),$this->connexion);
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepSave($documento_cuenta_cobrar->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==forma_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			forma_pago_cliente_data::save($documento_cuenta_cobrar->getforma_pago_cliente(),$this->connexion);
			$forma_pago_clienteLogic= new forma_pago_cliente_logic($this->connexion);
			$forma_pago_clienteLogic->deepSave($documento_cuenta_cobrar->getforma_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_corriente_data::save($documento_cuenta_cobrar->getcuenta_corriente(),$this->connexion);
			$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
			$cuenta_corrienteLogic->deepSave($documento_cuenta_cobrar->getcuenta_corriente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
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

			foreach($documento_cuenta_cobrar->getfacturas() as $factura) {
				$facturaLogic= new factura_logic($this->connexion);
				$factura->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
				factura_data::save($factura,$this->connexion);
				$facturaLogic->deepSave($factura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_documento_cuenta_cobrar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_documento_cuenta_cobrar::$class);

			foreach($documento_cuenta_cobrar->getimagen_documento_cuenta_cobrars() as $imagendocumentocuentacobrar) {
				$imagendocumentocuentacobrarLogic= new imagen_documento_cuenta_cobrar_logic($this->connexion);
				$imagendocumentocuentacobrar->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
				imagen_documento_cuenta_cobrar_data::save($imagendocumentocuentacobrar,$this->connexion);
				$imagendocumentocuentacobrarLogic->deepSave($imagendocumentocuentacobrar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($documento_cuenta_cobrar->getfactura_lotes() as $facturalote) {
				$facturaloteLogic= new factura_lote_logic($this->connexion);
				$facturalote->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
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

			foreach($documento_cuenta_cobrar->getdevolucion_facturas() as $devolucionfactura) {
				$devolucionfacturaLogic= new devolucion_factura_logic($this->connexion);
				$devolucionfactura->setid_documento_cuenta_cobrar($documento_cuenta_cobrar->getId());
				devolucion_factura_data::save($devolucionfactura,$this->connexion);
				$devolucionfacturaLogic->deepSave($devolucionfactura,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				documento_cuenta_cobrar_data::save($documento_cuenta_cobrar, $this->connexion);
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
			
			$this->deepLoad($this->documento_cuenta_cobrar,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->documento_cuenta_cobrars as $documento_cuenta_cobrar) {
				$this->deepLoad($documento_cuenta_cobrar,$isDeep,$deepLoadType,$clases);
								
				documento_cuenta_cobrar_util::refrescarFKDescripciones($this->documento_cuenta_cobrars);
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
			
			foreach($this->documento_cuenta_cobrars as $documento_cuenta_cobrar) {
				$this->deepLoad($documento_cuenta_cobrar,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->documento_cuenta_cobrar,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->documento_cuenta_cobrars as $documento_cuenta_cobrar) {
				$this->deepSave($documento_cuenta_cobrar,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->documento_cuenta_cobrars as $documento_cuenta_cobrar) {
				$this->deepSave($documento_cuenta_cobrar,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(forma_pago_cliente::$class);
				$classes[]=new Classe(cuenta_corriente::$class);
				
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
					if($clas->clas==forma_pago_cliente::$class) {
						$classes[]=new Classe(forma_pago_cliente::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta_corriente::$class) {
						$classes[]=new Classe(cuenta_corriente::$class);
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
					if($clas->clas==forma_pago_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(forma_pago_cliente::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta_corriente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_corriente::$class);
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
				
				$classes[]=new Classe(factura::$class);
				$classes[]=new Classe(imagen_documento_cuenta_cobrar::$class);
				$classes[]=new Classe(factura_lote::$class);
				$classes[]=new Classe(devolucion_factura::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==factura::$class) {
						$classes[]=new Classe(factura::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==imagen_documento_cuenta_cobrar::$class) {
						$classes[]=new Classe(imagen_documento_cuenta_cobrar::$class);
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

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

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
					if($clas->clas==imagen_documento_cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(imagen_documento_cuenta_cobrar::$class);
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

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getdocumento_cuenta_cobrar() : ?documento_cuenta_cobrar {	
		/*
		documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGet($this->documento_cuenta_cobrar,$this->datosCliente);
		documento_cuenta_cobrar_logic_add::updatedocumento_cuenta_cobrarToGet($this->documento_cuenta_cobrar);
		*/
			
		return $this->documento_cuenta_cobrar;
	}
		
	public function setdocumento_cuenta_cobrar(documento_cuenta_cobrar $newdocumento_cuenta_cobrar) {
		$this->documento_cuenta_cobrar = $newdocumento_cuenta_cobrar;
	}
	
	public function getdocumento_cuenta_cobrars() : array {		
		/*
		documento_cuenta_cobrar_logic_add::checkdocumento_cuenta_cobrarToGets($this->documento_cuenta_cobrars,$this->datosCliente);
		
		foreach ($this->documento_cuenta_cobrars as $documento_cuenta_cobrarLocal ) {
			documento_cuenta_cobrar_logic_add::updatedocumento_cuenta_cobrarToGet($documento_cuenta_cobrarLocal);
		}
		*/
		
		return $this->documento_cuenta_cobrars;
	}
	
	public function setdocumento_cuenta_cobrars(array $newdocumento_cuenta_cobrars) {
		$this->documento_cuenta_cobrars = $newdocumento_cuenta_cobrars;
	}
	
	public function getdocumento_cuenta_cobrarDataAccess() : documento_cuenta_cobrar_data {
		return $this->documento_cuenta_cobrarDataAccess;
	}
	
	public function setdocumento_cuenta_cobrarDataAccess(documento_cuenta_cobrar_data $newdocumento_cuenta_cobrarDataAccess) {
		$this->documento_cuenta_cobrarDataAccess = $newdocumento_cuenta_cobrarDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        documento_cuenta_cobrar_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		factura_detalle_logic::$logger;
		factura_lote_detalle_logic::$logger;
		factura_modelo_logic::$logger;
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
