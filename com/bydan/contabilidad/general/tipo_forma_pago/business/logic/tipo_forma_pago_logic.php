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

namespace com\bydan\contabilidad\general\tipo_forma_pago\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\general\tipo_forma_pago\util\tipo_forma_pago_carga;
use com\bydan\contabilidad\general\tipo_forma_pago\util\tipo_forma_pago_param_return;


use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\ParameterDbType;



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

use com\bydan\contabilidad\general\tipo_forma_pago\util\tipo_forma_pago_util;
use com\bydan\contabilidad\general\tipo_forma_pago\business\entity\tipo_forma_pago;
use com\bydan\contabilidad\general\tipo_forma_pago\business\data\tipo_forma_pago_data;

//FK


//REL


use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\entity\forma_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\data\forma_pago_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\logic\forma_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_util;

use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\entity\forma_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\data\forma_pago_cliente_data;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\logic\forma_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_util;

//REL DETALLES

use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\business\logic\debito_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\logic\documento_cuenta_pagar_logic;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\business\logic\orden_compra_logic;
use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_carga;
use com\bydan\contabilidad\inventario\orden_compra_detalle\business\logic\orden_compra_detalle_logic;
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\util\imagen_documento_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\business\logic\imagen_documento_cuenta_pagar_logic;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_carga;
use com\bydan\contabilidad\inventario\devolucion\business\logic\devolucion_logic;
use com\bydan\contabilidad\inventario\devolucion_detalle\util\devolucion_detalle_carga;
use com\bydan\contabilidad\inventario\devolucion_detalle\business\logic\devolucion_detalle_logic;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\logic\pago_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\logic\documento_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\util\pago_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\business\logic\pago_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\util\credito_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\business\logic\credito_cuenta_cobrar_logic;



class tipo_forma_pago_logic  extends GeneralEntityLogic implements tipo_forma_pago_logicI {	
	/*GENERAL*/
	public tipo_forma_pago_data $tipo_forma_pagoDataAccess;
	//public ?tipo_forma_pago_logic_add $tipo_forma_pagoLogicAdditional=null;
	public ?tipo_forma_pago $tipo_forma_pago;
	public array $tipo_forma_pagos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->tipo_forma_pagoDataAccess = new tipo_forma_pago_data();			
			$this->tipo_forma_pagos = array();
			$this->tipo_forma_pago = new tipo_forma_pago();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->tipo_forma_pagoLogicAdditional = new tipo_forma_pago_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->tipo_forma_pagoLogicAdditional==null) {
		//	$this->tipo_forma_pagoLogicAdditional=new tipo_forma_pago_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->tipo_forma_pagoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->tipo_forma_pagoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->tipo_forma_pagoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->tipo_forma_pagoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_forma_pagos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_forma_pagos=$this->tipo_forma_pagoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_forma_pago_util::refrescarFKDescripciones($this->tipo_forma_pagos);
			}
			
			//tipo_forma_pago_logic_add::checktipo_forma_pagoToGets($this->tipo_forma_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_forma_pagos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_forma_pagos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_forma_pagos=$this->tipo_forma_pagoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_forma_pago_util::refrescarFKDescripciones($this->tipo_forma_pagos);
			}
			
			//tipo_forma_pago_logic_add::checktipo_forma_pagoToGets($this->tipo_forma_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_forma_pagos);
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
		$this->tipo_forma_pago = new tipo_forma_pago();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->tipo_forma_pago=$this->tipo_forma_pagoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_forma_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_forma_pago_util::refrescarFKDescripcion($this->tipo_forma_pago);
			}
						
			//tipo_forma_pago_logic_add::checktipo_forma_pagoToGet($this->tipo_forma_pago,$this->datosCliente);
			//tipo_forma_pago_logic_add::updatetipo_forma_pagoToGet($this->tipo_forma_pago);
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
		$this->tipo_forma_pago = new  tipo_forma_pago();
		  		  
        try {		
			$this->tipo_forma_pago=$this->tipo_forma_pagoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_forma_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_forma_pago_util::refrescarFKDescripcion($this->tipo_forma_pago);
			}
			
			//tipo_forma_pago_logic_add::checktipo_forma_pagoToGet($this->tipo_forma_pago,$this->datosCliente);
			//tipo_forma_pago_logic_add::updatetipo_forma_pagoToGet($this->tipo_forma_pago);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?tipo_forma_pago {
		$tipo_forma_pagoLogic = new  tipo_forma_pago_logic();
		  		  
        try {		
			$tipo_forma_pagoLogic->setConnexion($connexion);			
			$tipo_forma_pagoLogic->getEntity($id);			
			return $tipo_forma_pagoLogic->gettipo_forma_pago();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->tipo_forma_pago = new  tipo_forma_pago();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->tipo_forma_pago=$this->tipo_forma_pagoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_forma_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_forma_pago_util::refrescarFKDescripcion($this->tipo_forma_pago);
			}
			
			//tipo_forma_pago_logic_add::checktipo_forma_pagoToGet($this->tipo_forma_pago,$this->datosCliente);
			//tipo_forma_pago_logic_add::updatetipo_forma_pagoToGet($this->tipo_forma_pago);
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
		$this->tipo_forma_pago = new  tipo_forma_pago();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_forma_pago=$this->tipo_forma_pagoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_forma_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_forma_pago_util::refrescarFKDescripcion($this->tipo_forma_pago);
			}
			
			//tipo_forma_pago_logic_add::checktipo_forma_pagoToGet($this->tipo_forma_pago,$this->datosCliente);
			//tipo_forma_pago_logic_add::updatetipo_forma_pagoToGet($this->tipo_forma_pago);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?tipo_forma_pago {
		$tipo_forma_pagoLogic = new  tipo_forma_pago_logic();
		  		  
        try {		
			$tipo_forma_pagoLogic->setConnexion($connexion);			
			$tipo_forma_pagoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $tipo_forma_pagoLogic->gettipo_forma_pago();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_forma_pagos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_forma_pagos=$this->tipo_forma_pagoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_forma_pago_util::refrescarFKDescripciones($this->tipo_forma_pagos);
			}
			
			//tipo_forma_pago_logic_add::checktipo_forma_pagoToGets($this->tipo_forma_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_forma_pagos);			
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
		$this->tipo_forma_pagos = array();
		  		  
        try {			
			$this->tipo_forma_pagos=$this->tipo_forma_pagoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_forma_pago_util::refrescarFKDescripciones($this->tipo_forma_pagos);
			}
			
			//tipo_forma_pago_logic_add::checktipo_forma_pagoToGets($this->tipo_forma_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_forma_pagos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->tipo_forma_pagos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_forma_pagos=$this->tipo_forma_pagoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_forma_pago_util::refrescarFKDescripciones($this->tipo_forma_pagos);
			}
			
			//tipo_forma_pago_logic_add::checktipo_forma_pagoToGets($this->tipo_forma_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_forma_pagos);
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
		$this->tipo_forma_pagos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_forma_pagos=$this->tipo_forma_pagoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_forma_pago_util::refrescarFKDescripciones($this->tipo_forma_pagos);
			}
			
			//tipo_forma_pago_logic_add::checktipo_forma_pagoToGets($this->tipo_forma_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_forma_pagos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$tipo_forma_pagoLogic = new  tipo_forma_pago_logic();
		  		  
        try {		
			$tipo_forma_pagoLogic->setConnexion($connexion);			
			$tipo_forma_pagoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $tipo_forma_pagoLogic->gettipo_forma_pagos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->tipo_forma_pagos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_forma_pagos=$this->tipo_forma_pagoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_forma_pago_util::refrescarFKDescripciones($this->tipo_forma_pagos);
			}
			
			//tipo_forma_pago_logic_add::checktipo_forma_pagoToGets($this->tipo_forma_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_forma_pagos);
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
		$this->tipo_forma_pagos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_forma_pagos=$this->tipo_forma_pagoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_forma_pago_util::refrescarFKDescripciones($this->tipo_forma_pagos);
			}
			
			//tipo_forma_pago_logic_add::checktipo_forma_pagoToGets($this->tipo_forma_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_forma_pagos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->tipo_forma_pagos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_forma_pagos=$this->tipo_forma_pagoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_forma_pago_util::refrescarFKDescripciones($this->tipo_forma_pagos);
			}
			
			//tipo_forma_pago_logic_add::checktipo_forma_pagoToGets($this->tipo_forma_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_forma_pagos);
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
		$this->tipo_forma_pagos = array();
		  		  
        try {			
			$this->tipo_forma_pagos=$this->tipo_forma_pagoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_forma_pago_util::refrescarFKDescripciones($this->tipo_forma_pagos);
			}	
			
			//tipo_forma_pago_logic_add::checktipo_forma_pagoToGets($this->tipo_forma_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_forma_pagos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_forma_pagos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_forma_pagos=$this->tipo_forma_pagoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_forma_pago_util::refrescarFKDescripciones($this->tipo_forma_pagos);
			}
			
			//tipo_forma_pago_logic_add::checktipo_forma_pagoToGets($this->tipo_forma_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_forma_pagos);
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
		$this->tipo_forma_pagos = array();
		  		  
        try {		
			$this->tipo_forma_pagos=$this->tipo_forma_pagoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_forma_pago_util::refrescarFKDescripciones($this->tipo_forma_pagos);
			}
			
			//tipo_forma_pago_logic_add::checktipo_forma_pagoToGets($this->tipo_forma_pagos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_forma_pagos);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
				
	
	/*MANTENIMIENTO*/
	public function saveWithConnection() {	
		 try {	
			$this->connexion = Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
						
			//tipo_forma_pago_logic_add::checktipo_forma_pagoToSave($this->tipo_forma_pago,$this->datosCliente,$this->connexion);	       
			//tipo_forma_pago_logic_add::updatetipo_forma_pagoToSave($this->tipo_forma_pago);			
			tipo_forma_pago_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_forma_pago,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->tipo_forma_pagoLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_forma_pago,$this->datosCliente,$this->connexion);
			
			
			tipo_forma_pago_data::save($this->tipo_forma_pago, $this->connexion);	    	       	 				
			//tipo_forma_pago_logic_add::checktipo_forma_pagoToSaveAfter($this->tipo_forma_pago,$this->datosCliente,$this->connexion);			
			//$this->tipo_forma_pagoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_forma_pago,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_forma_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_forma_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_forma_pago_util::refrescarFKDescripcion($this->tipo_forma_pago);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->tipo_forma_pago->getIsDeleted()) {
				$this->tipo_forma_pago=null;
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
						
			/*tipo_forma_pago_logic_add::checktipo_forma_pagoToSave($this->tipo_forma_pago,$this->datosCliente,$this->connexion);*/	        
			//tipo_forma_pago_logic_add::updatetipo_forma_pagoToSave($this->tipo_forma_pago);			
			//$this->tipo_forma_pagoLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_forma_pago,$this->datosCliente,$this->connexion);			
			tipo_forma_pago_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_forma_pago,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			tipo_forma_pago_data::save($this->tipo_forma_pago, $this->connexion);	    	       	 						
			/*tipo_forma_pago_logic_add::checktipo_forma_pagoToSaveAfter($this->tipo_forma_pago,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_forma_pagoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_forma_pago,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_forma_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_forma_pago,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_forma_pago_util::refrescarFKDescripcion($this->tipo_forma_pago);				
			}
			
			if($this->tipo_forma_pago->getIsDeleted()) {
				$this->tipo_forma_pago=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(tipo_forma_pago $tipo_forma_pago,Connexion $connexion)  {
		$tipo_forma_pagoLogic = new  tipo_forma_pago_logic();		  		  
        try {		
			$tipo_forma_pagoLogic->setConnexion($connexion);			
			$tipo_forma_pagoLogic->settipo_forma_pago($tipo_forma_pago);			
			$tipo_forma_pagoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*tipo_forma_pago_logic_add::checktipo_forma_pagoToSaves($this->tipo_forma_pagos,$this->datosCliente,$this->connexion);*/	        	
			//$this->tipo_forma_pagoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_forma_pagos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_forma_pagos as $tipo_forma_pagoLocal) {				
								
				//tipo_forma_pago_logic_add::updatetipo_forma_pagoToSave($tipo_forma_pagoLocal);	        	
				tipo_forma_pago_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_forma_pagoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				tipo_forma_pago_data::save($tipo_forma_pagoLocal, $this->connexion);				
			}
			
			/*tipo_forma_pago_logic_add::checktipo_forma_pagoToSavesAfter($this->tipo_forma_pagos,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_forma_pagoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_forma_pagos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_forma_pago_util::refrescarFKDescripciones($this->tipo_forma_pagos);
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
			/*tipo_forma_pago_logic_add::checktipo_forma_pagoToSaves($this->tipo_forma_pagos,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_forma_pagoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_forma_pagos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_forma_pagos as $tipo_forma_pagoLocal) {				
								
				//tipo_forma_pago_logic_add::updatetipo_forma_pagoToSave($tipo_forma_pagoLocal);	        	
				tipo_forma_pago_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_forma_pagoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				tipo_forma_pago_data::save($tipo_forma_pagoLocal, $this->connexion);				
			}			
			
			/*tipo_forma_pago_logic_add::checktipo_forma_pagoToSavesAfter($this->tipo_forma_pagos,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_forma_pagoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_forma_pagos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_forma_pago_util::refrescarFKDescripciones($this->tipo_forma_pagos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $tipo_forma_pagos,Connexion $connexion)  {
		$tipo_forma_pagoLogic = new  tipo_forma_pago_logic();
		  		  
        try {		
			$tipo_forma_pagoLogic->setConnexion($connexion);			
			$tipo_forma_pagoLogic->settipo_forma_pagos($tipo_forma_pagos);			
			$tipo_forma_pagoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$tipo_forma_pagosAux=array();
		
		foreach($this->tipo_forma_pagos as $tipo_forma_pago) {
			if($tipo_forma_pago->getIsDeleted()==false) {
				$tipo_forma_pagosAux[]=$tipo_forma_pago;
			}
		}
		
		$this->tipo_forma_pagos=$tipo_forma_pagosAux;
	}
	
	public function updateToGetsAuxiliar(array &$tipo_forma_pagos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	
	
	
	public function saveRelacionesWithConnection($tipo_forma_pago,$formapagoproveedors,$formapagoclientes) {
		$this->saveRelacionesBase($tipo_forma_pago,$formapagoproveedors,$formapagoclientes,true);
	}

	public function saveRelaciones($tipo_forma_pago,$formapagoproveedors,$formapagoclientes) {
		$this->saveRelacionesBase($tipo_forma_pago,$formapagoproveedors,$formapagoclientes,false);
	}

	public function saveRelacionesBase($tipo_forma_pago,$formapagoproveedors=array(),$formapagoclientes=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$tipo_forma_pago->setforma_pago_proveedors($formapagoproveedors);
			$tipo_forma_pago->setforma_pago_clientes($formapagoclientes);
			$this->settipo_forma_pago($tipo_forma_pago);

				if(($this->tipo_forma_pago->getIsNew() || $this->tipo_forma_pago->getIsChanged()) && !$this->tipo_forma_pago->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($formapagoproveedors,$formapagoclientes);

				} else if($this->tipo_forma_pago->getIsDeleted()) {
					$this->saveRelacionesDetalles($formapagoproveedors,$formapagoclientes);
					$this->save();
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
	
	
	public function saveRelacionesDetalles($formapagoproveedors=array(),$formapagoclientes=array()) {
		try {
	

			$idtipo_forma_pagoActual=$this->gettipo_forma_pago()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/forma_pago_proveedor_carga.php');
			forma_pago_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$formapagoproveedorLogic_Desde_tipo_forma_pago=new forma_pago_proveedor_logic();
			$formapagoproveedorLogic_Desde_tipo_forma_pago->setforma_pago_proveedors($formapagoproveedors);

			$formapagoproveedorLogic_Desde_tipo_forma_pago->setConnexion($this->getConnexion());
			$formapagoproveedorLogic_Desde_tipo_forma_pago->setDatosCliente($this->datosCliente);

			foreach($formapagoproveedorLogic_Desde_tipo_forma_pago->getforma_pago_proveedors() as $formapagoproveedor_Desde_tipo_forma_pago) {
				$formapagoproveedor_Desde_tipo_forma_pago->setid_tipo_forma_pago($idtipo_forma_pagoActual);

				$formapagoproveedorLogic_Desde_tipo_forma_pago->setforma_pago_proveedor($formapagoproveedor_Desde_tipo_forma_pago);
				$formapagoproveedorLogic_Desde_tipo_forma_pago->save();

				$idforma_pago_proveedorActual=$forma_pago_proveedor_Desde_tipo_forma_pago->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/debito_cuenta_pagar_carga.php');
				debito_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$debitocuentapagarLogic_Desde_forma_pago_proveedor=new debito_cuenta_pagar_logic();

				if($forma_pago_proveedor_Desde_tipo_forma_pago->getdebito_cuenta_pagars()==null){
					$forma_pago_proveedor_Desde_tipo_forma_pago->setdebito_cuenta_pagars(array());
				}

				$debitocuentapagarLogic_Desde_forma_pago_proveedor->setdebito_cuenta_pagars($forma_pago_proveedor_Desde_tipo_forma_pago->getdebito_cuenta_pagars());

				$debitocuentapagarLogic_Desde_forma_pago_proveedor->setConnexion($this->getConnexion());
				$debitocuentapagarLogic_Desde_forma_pago_proveedor->setDatosCliente($this->datosCliente);

				foreach($debitocuentapagarLogic_Desde_forma_pago_proveedor->getdebito_cuenta_pagars() as $debitocuentapagar_Desde_forma_pago_proveedor) {
					$debitocuentapagar_Desde_forma_pago_proveedor->setid_forma_pago_proveedor($idforma_pago_proveedorActual);
				}

				$debitocuentapagarLogic_Desde_forma_pago_proveedor->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/documento_cuenta_pagar_carga.php');
				documento_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$documentocuentapagarLogic_Desde_forma_pago_proveedor=new documento_cuenta_pagar_logic();

				if($forma_pago_proveedor_Desde_tipo_forma_pago->getdocumento_cuenta_pagars()==null){
					$forma_pago_proveedor_Desde_tipo_forma_pago->setdocumento_cuenta_pagars(array());
				}

				$documentocuentapagarLogic_Desde_forma_pago_proveedor->setdocumento_cuenta_pagars($forma_pago_proveedor_Desde_tipo_forma_pago->getdocumento_cuenta_pagars());

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

				if($forma_pago_proveedor_Desde_tipo_forma_pago->getpago_cuenta_pagars()==null){
					$forma_pago_proveedor_Desde_tipo_forma_pago->setpago_cuenta_pagars(array());
				}

				$pagocuentapagarLogic_Desde_forma_pago_proveedor->setpago_cuenta_pagars($forma_pago_proveedor_Desde_tipo_forma_pago->getpago_cuenta_pagars());

				$pagocuentapagarLogic_Desde_forma_pago_proveedor->setConnexion($this->getConnexion());
				$pagocuentapagarLogic_Desde_forma_pago_proveedor->setDatosCliente($this->datosCliente);

				foreach($pagocuentapagarLogic_Desde_forma_pago_proveedor->getpago_cuenta_pagars() as $pagocuentapagar_Desde_forma_pago_proveedor) {
					$pagocuentapagar_Desde_forma_pago_proveedor->setid_forma_pago_proveedor($idforma_pago_proveedorActual);
				}

				$pagocuentapagarLogic_Desde_forma_pago_proveedor->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/forma_pago_cliente_carga.php');
			forma_pago_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$formapagoclienteLogic_Desde_tipo_forma_pago=new forma_pago_cliente_logic();
			$formapagoclienteLogic_Desde_tipo_forma_pago->setforma_pago_clientes($formapagoclientes);

			$formapagoclienteLogic_Desde_tipo_forma_pago->setConnexion($this->getConnexion());
			$formapagoclienteLogic_Desde_tipo_forma_pago->setDatosCliente($this->datosCliente);

			foreach($formapagoclienteLogic_Desde_tipo_forma_pago->getforma_pago_clientes() as $formapagocliente_Desde_tipo_forma_pago) {
				$formapagocliente_Desde_tipo_forma_pago->setid_tipo_forma_pago($idtipo_forma_pagoActual);

				$formapagoclienteLogic_Desde_tipo_forma_pago->setforma_pago_cliente($formapagocliente_Desde_tipo_forma_pago);
				$formapagoclienteLogic_Desde_tipo_forma_pago->save();

				$idforma_pago_clienteActual=$forma_pago_cliente_Desde_tipo_forma_pago->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/documento_cuenta_cobrar_carga.php');
				documento_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$documentocuentacobrarLogic_Desde_forma_pago_cliente=new documento_cuenta_cobrar_logic();

				if($forma_pago_cliente_Desde_tipo_forma_pago->getdocumento_cuenta_cobrars()==null){
					$forma_pago_cliente_Desde_tipo_forma_pago->setdocumento_cuenta_cobrars(array());
				}

				$documentocuentacobrarLogic_Desde_forma_pago_cliente->setdocumento_cuenta_cobrars($forma_pago_cliente_Desde_tipo_forma_pago->getdocumento_cuenta_cobrars());

				$documentocuentacobrarLogic_Desde_forma_pago_cliente->setConnexion($this->getConnexion());
				$documentocuentacobrarLogic_Desde_forma_pago_cliente->setDatosCliente($this->datosCliente);

				foreach($documentocuentacobrarLogic_Desde_forma_pago_cliente->getdocumento_cuenta_cobrars() as $documentocuentacobrar_Desde_forma_pago_cliente) {
					$documentocuentacobrar_Desde_forma_pago_cliente->setid_forma_pago_cliente($idforma_pago_clienteActual);

					$documentocuentacobrarLogic_Desde_forma_pago_cliente->setdocumento_cuenta_cobrar($documentocuentacobrar_Desde_forma_pago_cliente);
					$documentocuentacobrarLogic_Desde_forma_pago_cliente->save();
				}


				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/pago_cuenta_cobrar_carga.php');
				pago_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$pagocuentacobrarLogic_Desde_forma_pago_cliente=new pago_cuenta_cobrar_logic();

				if($forma_pago_cliente_Desde_tipo_forma_pago->getpago_cuenta_cobrars()==null){
					$forma_pago_cliente_Desde_tipo_forma_pago->setpago_cuenta_cobrars(array());
				}

				$pagocuentacobrarLogic_Desde_forma_pago_cliente->setpago_cuenta_cobrars($forma_pago_cliente_Desde_tipo_forma_pago->getpago_cuenta_cobrars());

				$pagocuentacobrarLogic_Desde_forma_pago_cliente->setConnexion($this->getConnexion());
				$pagocuentacobrarLogic_Desde_forma_pago_cliente->setDatosCliente($this->datosCliente);

				foreach($pagocuentacobrarLogic_Desde_forma_pago_cliente->getpago_cuenta_cobrars() as $pagocuentacobrar_Desde_forma_pago_cliente) {
					$pagocuentacobrar_Desde_forma_pago_cliente->setid_forma_pago_cliente($idforma_pago_clienteActual);
				}

				$pagocuentacobrarLogic_Desde_forma_pago_cliente->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/credito_cuenta_cobrar_carga.php');
				credito_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$creditocuentacobrarLogic_Desde_forma_pago_cliente=new credito_cuenta_cobrar_logic();

				if($forma_pago_cliente_Desde_tipo_forma_pago->getcredito_cuenta_cobrars()==null){
					$forma_pago_cliente_Desde_tipo_forma_pago->setcredito_cuenta_cobrars(array());
				}

				$creditocuentacobrarLogic_Desde_forma_pago_cliente->setcredito_cuenta_cobrars($forma_pago_cliente_Desde_tipo_forma_pago->getcredito_cuenta_cobrars());

				$creditocuentacobrarLogic_Desde_forma_pago_cliente->setConnexion($this->getConnexion());
				$creditocuentacobrarLogic_Desde_forma_pago_cliente->setDatosCliente($this->datosCliente);

				foreach($creditocuentacobrarLogic_Desde_forma_pago_cliente->getcredito_cuenta_cobrars() as $creditocuentacobrar_Desde_forma_pago_cliente) {
					$creditocuentacobrar_Desde_forma_pago_cliente->setid_forma_pago_cliente($idforma_pago_clienteActual);
				}

				$creditocuentacobrarLogic_Desde_forma_pago_cliente->saves();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $tipo_forma_pagos,tipo_forma_pago_param_return $tipo_forma_pagoParameterGeneral) : tipo_forma_pago_param_return {
		$tipo_forma_pagoReturnGeneral=new tipo_forma_pago_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $tipo_forma_pagoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $tipo_forma_pagos,tipo_forma_pago_param_return $tipo_forma_pagoParameterGeneral) : tipo_forma_pago_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_forma_pagoReturnGeneral=new tipo_forma_pago_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_forma_pagoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_forma_pagos,tipo_forma_pago $tipo_forma_pago,tipo_forma_pago_param_return $tipo_forma_pagoParameterGeneral,bool $isEsNuevotipo_forma_pago,array $clases) : tipo_forma_pago_param_return {
		 try {	
			$tipo_forma_pagoReturnGeneral=new tipo_forma_pago_param_return();
	
			$tipo_forma_pagoReturnGeneral->settipo_forma_pago($tipo_forma_pago);
			$tipo_forma_pagoReturnGeneral->settipo_forma_pagos($tipo_forma_pagos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_forma_pagoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $tipo_forma_pagoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_forma_pagos,tipo_forma_pago $tipo_forma_pago,tipo_forma_pago_param_return $tipo_forma_pagoParameterGeneral,bool $isEsNuevotipo_forma_pago,array $clases) : tipo_forma_pago_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_forma_pagoReturnGeneral=new tipo_forma_pago_param_return();
	
			$tipo_forma_pagoReturnGeneral->settipo_forma_pago($tipo_forma_pago);
			$tipo_forma_pagoReturnGeneral->settipo_forma_pagos($tipo_forma_pagos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_forma_pagoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_forma_pagoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_forma_pagos,tipo_forma_pago $tipo_forma_pago,tipo_forma_pago_param_return $tipo_forma_pagoParameterGeneral,bool $isEsNuevotipo_forma_pago,array $clases) : tipo_forma_pago_param_return {
		 try {	
			$tipo_forma_pagoReturnGeneral=new tipo_forma_pago_param_return();
	
			$tipo_forma_pagoReturnGeneral->settipo_forma_pago($tipo_forma_pago);
			$tipo_forma_pagoReturnGeneral->settipo_forma_pagos($tipo_forma_pagos);
			
			
			
			return $tipo_forma_pagoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_forma_pagos,tipo_forma_pago $tipo_forma_pago,tipo_forma_pago_param_return $tipo_forma_pagoParameterGeneral,bool $isEsNuevotipo_forma_pago,array $clases) : tipo_forma_pago_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_forma_pagoReturnGeneral=new tipo_forma_pago_param_return();
	
			$tipo_forma_pagoReturnGeneral->settipo_forma_pago($tipo_forma_pago);
			$tipo_forma_pagoReturnGeneral->settipo_forma_pagos($tipo_forma_pagos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_forma_pagoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,tipo_forma_pago $tipo_forma_pago,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,tipo_forma_pago $tipo_forma_pago,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		tipo_forma_pago_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(tipo_forma_pago $tipo_forma_pago,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_forma_pago_logic_add::updatetipo_forma_pagoToGet($this->tipo_forma_pago);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$tipo_forma_pago->setforma_pago_proveedors($this->tipo_forma_pagoDataAccess->getforma_pago_proveedors($this->connexion,$tipo_forma_pago));
		$tipo_forma_pago->setforma_pago_clientes($this->tipo_forma_pagoDataAccess->getforma_pago_clientes($this->connexion,$tipo_forma_pago));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==forma_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_forma_pago->setforma_pago_proveedors($this->tipo_forma_pagoDataAccess->getforma_pago_proveedors($this->connexion,$tipo_forma_pago));

				if($this->isConDeep) {
					$formapagoproveedorLogic= new forma_pago_proveedor_logic($this->connexion);
					$formapagoproveedorLogic->setforma_pago_proveedors($tipo_forma_pago->getforma_pago_proveedors());
					$classesLocal=forma_pago_proveedor_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$formapagoproveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					forma_pago_proveedor_util::refrescarFKDescripciones($formapagoproveedorLogic->getforma_pago_proveedors());
					$tipo_forma_pago->setforma_pago_proveedors($formapagoproveedorLogic->getforma_pago_proveedors());
				}

				continue;
			}

			if($clas->clas==forma_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_forma_pago->setforma_pago_clientes($this->tipo_forma_pagoDataAccess->getforma_pago_clientes($this->connexion,$tipo_forma_pago));

				if($this->isConDeep) {
					$formapagoclienteLogic= new forma_pago_cliente_logic($this->connexion);
					$formapagoclienteLogic->setforma_pago_clientes($tipo_forma_pago->getforma_pago_clientes());
					$classesLocal=forma_pago_cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$formapagoclienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					forma_pago_cliente_util::refrescarFKDescripciones($formapagoclienteLogic->getforma_pago_clientes());
					$tipo_forma_pago->setforma_pago_clientes($formapagoclienteLogic->getforma_pago_clientes());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


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
			$tipo_forma_pago->setforma_pago_proveedors($this->tipo_forma_pagoDataAccess->getforma_pago_proveedors($this->connexion,$tipo_forma_pago));
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
			$tipo_forma_pago->setforma_pago_clientes($this->tipo_forma_pagoDataAccess->getforma_pago_clientes($this->connexion,$tipo_forma_pago));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$tipo_forma_pago->setforma_pago_proveedors($this->tipo_forma_pagoDataAccess->getforma_pago_proveedors($this->connexion,$tipo_forma_pago));

		foreach($tipo_forma_pago->getforma_pago_proveedors() as $formapagoproveedor) {
			$formapagoproveedorLogic= new forma_pago_proveedor_logic($this->connexion);
			$formapagoproveedorLogic->deepLoad($formapagoproveedor,$isDeep,$deepLoadType,$clases);
		}

		$tipo_forma_pago->setforma_pago_clientes($this->tipo_forma_pagoDataAccess->getforma_pago_clientes($this->connexion,$tipo_forma_pago));

		foreach($tipo_forma_pago->getforma_pago_clientes() as $formapagocliente) {
			$formapagoclienteLogic= new forma_pago_cliente_logic($this->connexion);
			$formapagoclienteLogic->deepLoad($formapagocliente,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==forma_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_forma_pago->setforma_pago_proveedors($this->tipo_forma_pagoDataAccess->getforma_pago_proveedors($this->connexion,$tipo_forma_pago));

				foreach($tipo_forma_pago->getforma_pago_proveedors() as $formapagoproveedor) {
					$formapagoproveedorLogic= new forma_pago_proveedor_logic($this->connexion);
					$formapagoproveedorLogic->deepLoad($formapagoproveedor,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==forma_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_forma_pago->setforma_pago_clientes($this->tipo_forma_pagoDataAccess->getforma_pago_clientes($this->connexion,$tipo_forma_pago));

				foreach($tipo_forma_pago->getforma_pago_clientes() as $formapagocliente) {
					$formapagoclienteLogic= new forma_pago_cliente_logic($this->connexion);
					$formapagoclienteLogic->deepLoad($formapagocliente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


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
			$tipo_forma_pago->setforma_pago_proveedors($this->tipo_forma_pagoDataAccess->getforma_pago_proveedors($this->connexion,$tipo_forma_pago));

			foreach($tipo_forma_pago->getforma_pago_proveedors() as $formapagoproveedor) {
				$formapagoproveedorLogic= new forma_pago_proveedor_logic($this->connexion);
				$formapagoproveedorLogic->deepLoad($formapagoproveedor,$isDeep,$deepLoadType,$clases);
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
			$tipo_forma_pago->setforma_pago_clientes($this->tipo_forma_pagoDataAccess->getforma_pago_clientes($this->connexion,$tipo_forma_pago));

			foreach($tipo_forma_pago->getforma_pago_clientes() as $formapagocliente) {
				$formapagoclienteLogic= new forma_pago_cliente_logic($this->connexion);
				$formapagoclienteLogic->deepLoad($formapagocliente,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(tipo_forma_pago $tipo_forma_pago,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_forma_pago_logic_add::updatetipo_forma_pagoToSave($this->tipo_forma_pago);			
			
			if(!$paraDeleteCascade) {				
				tipo_forma_pago_data::save($tipo_forma_pago, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($tipo_forma_pago->getforma_pago_proveedors() as $formapagoproveedor) {
			$formapagoproveedor->setid_tipo_forma_pago($tipo_forma_pago->getId());
			forma_pago_proveedor_data::save($formapagoproveedor,$this->connexion);
		}


		foreach($tipo_forma_pago->getforma_pago_clientes() as $formapagocliente) {
			$formapagocliente->setid_tipo_forma_pago($tipo_forma_pago->getId());
			forma_pago_cliente_data::save($formapagocliente,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==forma_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_forma_pago->getforma_pago_proveedors() as $formapagoproveedor) {
					$formapagoproveedor->setid_tipo_forma_pago($tipo_forma_pago->getId());
					forma_pago_proveedor_data::save($formapagoproveedor,$this->connexion);
				}

				continue;
			}

			if($clas->clas==forma_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_forma_pago->getforma_pago_clientes() as $formapagocliente) {
					$formapagocliente->setid_tipo_forma_pago($tipo_forma_pago->getId());
					forma_pago_cliente_data::save($formapagocliente,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


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

			foreach($tipo_forma_pago->getforma_pago_proveedors() as $formapagoproveedor) {
				$formapagoproveedor->setid_tipo_forma_pago($tipo_forma_pago->getId());
				forma_pago_proveedor_data::save($formapagoproveedor,$this->connexion);
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

			foreach($tipo_forma_pago->getforma_pago_clientes() as $formapagocliente) {
				$formapagocliente->setid_tipo_forma_pago($tipo_forma_pago->getId());
				forma_pago_cliente_data::save($formapagocliente,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($tipo_forma_pago->getforma_pago_proveedors() as $formapagoproveedor) {
			$formapagoproveedorLogic= new forma_pago_proveedor_logic($this->connexion);
			$formapagoproveedor->setid_tipo_forma_pago($tipo_forma_pago->getId());
			forma_pago_proveedor_data::save($formapagoproveedor,$this->connexion);
			$formapagoproveedorLogic->deepSave($formapagoproveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($tipo_forma_pago->getforma_pago_clientes() as $formapagocliente) {
			$formapagoclienteLogic= new forma_pago_cliente_logic($this->connexion);
			$formapagocliente->setid_tipo_forma_pago($tipo_forma_pago->getId());
			forma_pago_cliente_data::save($formapagocliente,$this->connexion);
			$formapagoclienteLogic->deepSave($formapagocliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==forma_pago_proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_forma_pago->getforma_pago_proveedors() as $formapagoproveedor) {
					$formapagoproveedorLogic= new forma_pago_proveedor_logic($this->connexion);
					$formapagoproveedor->setid_tipo_forma_pago($tipo_forma_pago->getId());
					forma_pago_proveedor_data::save($formapagoproveedor,$this->connexion);
					$formapagoproveedorLogic->deepSave($formapagoproveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==forma_pago_cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_forma_pago->getforma_pago_clientes() as $formapagocliente) {
					$formapagoclienteLogic= new forma_pago_cliente_logic($this->connexion);
					$formapagocliente->setid_tipo_forma_pago($tipo_forma_pago->getId());
					forma_pago_cliente_data::save($formapagocliente,$this->connexion);
					$formapagoclienteLogic->deepSave($formapagocliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {



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

			foreach($tipo_forma_pago->getforma_pago_proveedors() as $formapagoproveedor) {
				$formapagoproveedorLogic= new forma_pago_proveedor_logic($this->connexion);
				$formapagoproveedor->setid_tipo_forma_pago($tipo_forma_pago->getId());
				forma_pago_proveedor_data::save($formapagoproveedor,$this->connexion);
				$formapagoproveedorLogic->deepSave($formapagoproveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($tipo_forma_pago->getforma_pago_clientes() as $formapagocliente) {
				$formapagoclienteLogic= new forma_pago_cliente_logic($this->connexion);
				$formapagocliente->setid_tipo_forma_pago($tipo_forma_pago->getId());
				forma_pago_cliente_data::save($formapagocliente,$this->connexion);
				$formapagoclienteLogic->deepSave($formapagocliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				tipo_forma_pago_data::save($tipo_forma_pago, $this->connexion);
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
			
			$this->deepLoad($this->tipo_forma_pago,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->tipo_forma_pagos as $tipo_forma_pago) {
				$this->deepLoad($tipo_forma_pago,$isDeep,$deepLoadType,$clases);
								
				tipo_forma_pago_util::refrescarFKDescripciones($this->tipo_forma_pagos);
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
			
			foreach($this->tipo_forma_pagos as $tipo_forma_pago) {
				$this->deepLoad($tipo_forma_pago,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->tipo_forma_pago,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->tipo_forma_pagos as $tipo_forma_pago) {
				$this->deepSave($tipo_forma_pago,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->tipo_forma_pagos as $tipo_forma_pago) {
				$this->deepSave($tipo_forma_pago,$isDeep,$deepLoadType,$clases,false);
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
				
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
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
				
				$classes[]=new Classe(forma_pago_proveedor::$class);
				$classes[]=new Classe(forma_pago_cliente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==forma_pago_proveedor::$class) {
						$classes[]=new Classe(forma_pago_proveedor::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==forma_pago_cliente::$class) {
						$classes[]=new Classe(forma_pago_cliente::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

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
					if($clas->clas==forma_pago_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(forma_pago_cliente::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function gettipo_forma_pago() : ?tipo_forma_pago {	
		/*
		tipo_forma_pago_logic_add::checktipo_forma_pagoToGet($this->tipo_forma_pago,$this->datosCliente);
		tipo_forma_pago_logic_add::updatetipo_forma_pagoToGet($this->tipo_forma_pago);
		*/
			
		return $this->tipo_forma_pago;
	}
		
	public function settipo_forma_pago(tipo_forma_pago $newtipo_forma_pago) {
		$this->tipo_forma_pago = $newtipo_forma_pago;
	}
	
	public function gettipo_forma_pagos() : array {		
		/*
		tipo_forma_pago_logic_add::checktipo_forma_pagoToGets($this->tipo_forma_pagos,$this->datosCliente);
		
		foreach ($this->tipo_forma_pagos as $tipo_forma_pagoLocal ) {
			tipo_forma_pago_logic_add::updatetipo_forma_pagoToGet($tipo_forma_pagoLocal);
		}
		*/
		
		return $this->tipo_forma_pagos;
	}
	
	public function settipo_forma_pagos(array $newtipo_forma_pagos) {
		$this->tipo_forma_pagos = $newtipo_forma_pagos;
	}
	
	public function gettipo_forma_pagoDataAccess() : tipo_forma_pago_data {
		return $this->tipo_forma_pagoDataAccess;
	}
	
	public function settipo_forma_pagoDataAccess(tipo_forma_pago_data $newtipo_forma_pagoDataAccess) {
		$this->tipo_forma_pagoDataAccess = $newtipo_forma_pagoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        tipo_forma_pago_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		debito_cuenta_pagar_logic::$logger;
		documento_cuenta_pagar_logic::$logger;
		orden_compra_logic::$logger;
		orden_compra_detalle_logic::$logger;
		imagen_documento_cuenta_pagar_logic::$logger;
		devolucion_logic::$logger;
		devolucion_detalle_logic::$logger;
		pago_cuenta_pagar_logic::$logger;
		documento_cuenta_cobrar_logic::$logger;
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
