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

namespace com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_param_return;

use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\presentation\session\documento_cuenta_pagar_session;

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

use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\entity\documento_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\data\documento_cuenta_pagar_data;

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

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\entity\forma_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\data\forma_pago_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\logic\forma_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_util;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\data\cuenta_corriente_data;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

//REL


use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;
use com\bydan\contabilidad\inventario\orden_compra\business\data\orden_compra_data;
use com\bydan\contabilidad\inventario\orden_compra\business\logic\orden_compra_logic;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;

use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\business\entity\imagen_documento_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\business\data\imagen_documento_cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\business\logic\imagen_documento_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\util\imagen_documento_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\util\imagen_documento_cuenta_pagar_util;

use com\bydan\contabilidad\inventario\devolucion\business\entity\devolucion;
use com\bydan\contabilidad\inventario\devolucion\business\data\devolucion_data;
use com\bydan\contabilidad\inventario\devolucion\business\logic\devolucion_logic;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_carga;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_util;

//REL DETALLES

use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_carga;
use com\bydan\contabilidad\inventario\orden_compra_detalle\business\logic\orden_compra_detalle_logic;
use com\bydan\contabilidad\inventario\devolucion_detalle\util\devolucion_detalle_carga;
use com\bydan\contabilidad\inventario\devolucion_detalle\business\logic\devolucion_detalle_logic;



class documento_cuenta_pagar_logic  extends GeneralEntityLogic implements documento_cuenta_pagar_logicI {	
	/*GENERAL*/
	public documento_cuenta_pagar_data $documento_cuenta_pagarDataAccess;
	//public ?documento_cuenta_pagar_logic_add $documento_cuenta_pagarLogicAdditional=null;
	public ?documento_cuenta_pagar $documento_cuenta_pagar;
	public array $documento_cuenta_pagars;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->documento_cuenta_pagarDataAccess = new documento_cuenta_pagar_data();			
			$this->documento_cuenta_pagars = array();
			$this->documento_cuenta_pagar = new documento_cuenta_pagar();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->documento_cuenta_pagarLogicAdditional = new documento_cuenta_pagar_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->documento_cuenta_pagarLogicAdditional==null) {
		//	$this->documento_cuenta_pagarLogicAdditional=new documento_cuenta_pagar_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->documento_cuenta_pagarDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->documento_cuenta_pagarDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->documento_cuenta_pagarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->documento_cuenta_pagarDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->documento_cuenta_pagars = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->documento_cuenta_pagars = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);
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
		$this->documento_cuenta_pagar = new documento_cuenta_pagar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->documento_cuenta_pagar=$this->documento_cuenta_pagarDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->documento_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				documento_cuenta_pagar_util::refrescarFKDescripcion($this->documento_cuenta_pagar);
			}
						
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGet($this->documento_cuenta_pagar,$this->datosCliente);
			//documento_cuenta_pagar_logic_add::updatedocumento_cuenta_pagarToGet($this->documento_cuenta_pagar);
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
		$this->documento_cuenta_pagar = new  documento_cuenta_pagar();
		  		  
        try {		
			$this->documento_cuenta_pagar=$this->documento_cuenta_pagarDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->documento_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				documento_cuenta_pagar_util::refrescarFKDescripcion($this->documento_cuenta_pagar);
			}
			
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGet($this->documento_cuenta_pagar,$this->datosCliente);
			//documento_cuenta_pagar_logic_add::updatedocumento_cuenta_pagarToGet($this->documento_cuenta_pagar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?documento_cuenta_pagar {
		$documento_cuenta_pagarLogic = new  documento_cuenta_pagar_logic();
		  		  
        try {		
			$documento_cuenta_pagarLogic->setConnexion($connexion);			
			$documento_cuenta_pagarLogic->getEntity($id);			
			return $documento_cuenta_pagarLogic->getdocumento_cuenta_pagar();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->documento_cuenta_pagar = new  documento_cuenta_pagar();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->documento_cuenta_pagar=$this->documento_cuenta_pagarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->documento_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				documento_cuenta_pagar_util::refrescarFKDescripcion($this->documento_cuenta_pagar);
			}
			
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGet($this->documento_cuenta_pagar,$this->datosCliente);
			//documento_cuenta_pagar_logic_add::updatedocumento_cuenta_pagarToGet($this->documento_cuenta_pagar);
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
		$this->documento_cuenta_pagar = new  documento_cuenta_pagar();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_cuenta_pagar=$this->documento_cuenta_pagarDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->documento_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				documento_cuenta_pagar_util::refrescarFKDescripcion($this->documento_cuenta_pagar);
			}
			
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGet($this->documento_cuenta_pagar,$this->datosCliente);
			//documento_cuenta_pagar_logic_add::updatedocumento_cuenta_pagarToGet($this->documento_cuenta_pagar);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?documento_cuenta_pagar {
		$documento_cuenta_pagarLogic = new  documento_cuenta_pagar_logic();
		  		  
        try {		
			$documento_cuenta_pagarLogic->setConnexion($connexion);			
			$documento_cuenta_pagarLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $documento_cuenta_pagarLogic->getdocumento_cuenta_pagar();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->documento_cuenta_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);			
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
		$this->documento_cuenta_pagars = array();
		  		  
        try {			
			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->documento_cuenta_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);
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
		$this->documento_cuenta_pagars = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$documento_cuenta_pagarLogic = new  documento_cuenta_pagar_logic();
		  		  
        try {		
			$documento_cuenta_pagarLogic->setConnexion($connexion);			
			$documento_cuenta_pagarLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $documento_cuenta_pagarLogic->getdocumento_cuenta_pagars();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->documento_cuenta_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);
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
		$this->documento_cuenta_pagars = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->documento_cuenta_pagars = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);
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
		$this->documento_cuenta_pagars = array();
		  		  
        try {			
			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}	
			
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->documento_cuenta_pagars = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);
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
		$this->documento_cuenta_pagars = array();
		  		  
        try {		
			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);

		}  catch(Exception $e) {						
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
			$parameterSelectionGeneralid_cuenta_corriente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_corriente,documento_cuenta_pagar_util::$ID_CUENTA_CORRIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_corriente);

			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);

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
			$parameterSelectionGeneralid_cuenta_corriente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_corriente,documento_cuenta_pagar_util::$ID_CUENTA_CORRIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_corriente);

			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);
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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,documento_cuenta_pagar_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,documento_cuenta_pagar_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,documento_cuenta_pagar_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,documento_cuenta_pagar_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idforma_pago_proveedorWithConnection(string $strFinalQuery,Pagination $pagination,int $id_forma_pago_proveedor) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_forma_pago_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_forma_pago_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_forma_pago_proveedor,documento_cuenta_pagar_util::$ID_FORMA_PAGO_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_forma_pago_proveedor);

			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idforma_pago_proveedor(string $strFinalQuery,Pagination $pagination,int $id_forma_pago_proveedor) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_forma_pago_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_forma_pago_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_forma_pago_proveedor,documento_cuenta_pagar_util::$ID_FORMA_PAGO_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_forma_pago_proveedor);

			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);
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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,documento_cuenta_pagar_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);

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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,documento_cuenta_pagar_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdproveedorWithConnection(string $strFinalQuery,Pagination $pagination,int $id_proveedor) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,documento_cuenta_pagar_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idproveedor(string $strFinalQuery,Pagination $pagination,int $id_proveedor) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,documento_cuenta_pagar_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);
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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,documento_cuenta_pagar_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);

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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,documento_cuenta_pagar_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,documento_cuenta_pagar_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,documento_cuenta_pagar_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->documento_cuenta_pagars);
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
						
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToSave($this->documento_cuenta_pagar,$this->datosCliente,$this->connexion);	       
			//documento_cuenta_pagar_logic_add::updatedocumento_cuenta_pagarToSave($this->documento_cuenta_pagar);			
			documento_cuenta_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->documento_cuenta_pagar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->documento_cuenta_pagarLogicAdditional->checkGeneralEntityToSave($this,$this->documento_cuenta_pagar,$this->datosCliente,$this->connexion);
			
			
			documento_cuenta_pagar_data::save($this->documento_cuenta_pagar, $this->connexion);	    	       	 				
			//documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToSaveAfter($this->documento_cuenta_pagar,$this->datosCliente,$this->connexion);			
			//$this->documento_cuenta_pagarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->documento_cuenta_pagar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->documento_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->documento_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				documento_cuenta_pagar_util::refrescarFKDescripcion($this->documento_cuenta_pagar);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->documento_cuenta_pagar->getIsDeleted()) {
				$this->documento_cuenta_pagar=null;
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
						
			/*documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToSave($this->documento_cuenta_pagar,$this->datosCliente,$this->connexion);*/	        
			//documento_cuenta_pagar_logic_add::updatedocumento_cuenta_pagarToSave($this->documento_cuenta_pagar);			
			//$this->documento_cuenta_pagarLogicAdditional->checkGeneralEntityToSave($this,$this->documento_cuenta_pagar,$this->datosCliente,$this->connexion);			
			documento_cuenta_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->documento_cuenta_pagar,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			documento_cuenta_pagar_data::save($this->documento_cuenta_pagar, $this->connexion);	    	       	 						
			/*documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToSaveAfter($this->documento_cuenta_pagar,$this->datosCliente,$this->connexion);*/			
			//$this->documento_cuenta_pagarLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->documento_cuenta_pagar,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->documento_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->documento_cuenta_pagar,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				documento_cuenta_pagar_util::refrescarFKDescripcion($this->documento_cuenta_pagar);				
			}
			
			if($this->documento_cuenta_pagar->getIsDeleted()) {
				$this->documento_cuenta_pagar=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(documento_cuenta_pagar $documento_cuenta_pagar,Connexion $connexion)  {
		$documento_cuenta_pagarLogic = new  documento_cuenta_pagar_logic();		  		  
        try {		
			$documento_cuenta_pagarLogic->setConnexion($connexion);			
			$documento_cuenta_pagarLogic->setdocumento_cuenta_pagar($documento_cuenta_pagar);			
			$documento_cuenta_pagarLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToSaves($this->documento_cuenta_pagars,$this->datosCliente,$this->connexion);*/	        	
			//$this->documento_cuenta_pagarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->documento_cuenta_pagars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->documento_cuenta_pagars as $documento_cuenta_pagarLocal) {				
								
				//documento_cuenta_pagar_logic_add::updatedocumento_cuenta_pagarToSave($documento_cuenta_pagarLocal);	        	
				documento_cuenta_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$documento_cuenta_pagarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				documento_cuenta_pagar_data::save($documento_cuenta_pagarLocal, $this->connexion);				
			}
			
			/*documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToSavesAfter($this->documento_cuenta_pagars,$this->datosCliente,$this->connexion);*/			
			//$this->documento_cuenta_pagarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->documento_cuenta_pagars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
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
			/*documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToSaves($this->documento_cuenta_pagars,$this->datosCliente,$this->connexion);*/			
			//$this->documento_cuenta_pagarLogicAdditional->checkGeneralEntitiesToSaves($this,$this->documento_cuenta_pagars,$this->datosCliente,$this->connexion);
			
	   		foreach($this->documento_cuenta_pagars as $documento_cuenta_pagarLocal) {				
								
				//documento_cuenta_pagar_logic_add::updatedocumento_cuenta_pagarToSave($documento_cuenta_pagarLocal);	        	
				documento_cuenta_pagar_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$documento_cuenta_pagarLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				documento_cuenta_pagar_data::save($documento_cuenta_pagarLocal, $this->connexion);				
			}			
			
			/*documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToSavesAfter($this->documento_cuenta_pagars,$this->datosCliente,$this->connexion);*/			
			//$this->documento_cuenta_pagarLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->documento_cuenta_pagars,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $documento_cuenta_pagars,Connexion $connexion)  {
		$documento_cuenta_pagarLogic = new  documento_cuenta_pagar_logic();
		  		  
        try {		
			$documento_cuenta_pagarLogic->setConnexion($connexion);			
			$documento_cuenta_pagarLogic->setdocumento_cuenta_pagars($documento_cuenta_pagars);			
			$documento_cuenta_pagarLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$documento_cuenta_pagarsAux=array();
		
		foreach($this->documento_cuenta_pagars as $documento_cuenta_pagar) {
			if($documento_cuenta_pagar->getIsDeleted()==false) {
				$documento_cuenta_pagarsAux[]=$documento_cuenta_pagar;
			}
		}
		
		$this->documento_cuenta_pagars=$documento_cuenta_pagarsAux;
	}
	
	public function updateToGetsAuxiliar(array &$documento_cuenta_pagars) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->documento_cuenta_pagars as $documento_cuenta_pagar) {
				
				$documento_cuenta_pagar->setid_empresa_Descripcion(documento_cuenta_pagar_util::getempresaDescripcion($documento_cuenta_pagar->getempresa()));
				$documento_cuenta_pagar->setid_sucursal_Descripcion(documento_cuenta_pagar_util::getsucursalDescripcion($documento_cuenta_pagar->getsucursal()));
				$documento_cuenta_pagar->setid_ejercicio_Descripcion(documento_cuenta_pagar_util::getejercicioDescripcion($documento_cuenta_pagar->getejercicio()));
				$documento_cuenta_pagar->setid_periodo_Descripcion(documento_cuenta_pagar_util::getperiodoDescripcion($documento_cuenta_pagar->getperiodo()));
				$documento_cuenta_pagar->setid_usuario_Descripcion(documento_cuenta_pagar_util::getusuarioDescripcion($documento_cuenta_pagar->getusuario()));
				$documento_cuenta_pagar->setid_proveedor_Descripcion(documento_cuenta_pagar_util::getproveedorDescripcion($documento_cuenta_pagar->getproveedor()));
				$documento_cuenta_pagar->setid_forma_pago_proveedor_Descripcion(documento_cuenta_pagar_util::getforma_pago_proveedorDescripcion($documento_cuenta_pagar->getforma_pago_proveedor()));
				$documento_cuenta_pagar->setid_cuenta_corriente_Descripcion(documento_cuenta_pagar_util::getcuenta_corrienteDescripcion($documento_cuenta_pagar->getcuenta_corriente()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$documento_cuenta_pagar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$documento_cuenta_pagar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$documento_cuenta_pagar_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$documento_cuenta_pagarForeignKey=new documento_cuenta_pagar_param_return();//documento_cuenta_pagarForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosproveedorsFK($this->connexion,$strRecargarFkQuery,$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_forma_pago_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosforma_pago_proveedorsFK($this->connexion,$strRecargarFkQuery,$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_corriente',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_corrientesFK($this->connexion,$strRecargarFkQuery,$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproveedorsFK($this->connexion,' where id=-1 ',$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_forma_pago_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosforma_pago_proveedorsFK($this->connexion,' where id=-1 ',$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_corriente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_corrientesFK($this->connexion,' where id=-1 ',$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $documento_cuenta_pagarForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$documento_cuenta_pagarForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($documento_cuenta_pagar_session==null) {
			$documento_cuenta_pagar_session=new documento_cuenta_pagar_session();
		}
		
		if($documento_cuenta_pagar_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($documento_cuenta_pagarForeignKey->idempresaDefaultFK==0) {
					$documento_cuenta_pagarForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$documento_cuenta_pagarForeignKey->empresasFK[$empresaLocal->getId()]=documento_cuenta_pagar_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($documento_cuenta_pagar_session->bigidempresaActual!=null && $documento_cuenta_pagar_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($documento_cuenta_pagar_session->bigidempresaActual);//WithConnection

				$documento_cuenta_pagarForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=documento_cuenta_pagar_util::getempresaDescripcion($empresaLogic->getempresa());
				$documento_cuenta_pagarForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$documento_cuenta_pagarForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($documento_cuenta_pagar_session==null) {
			$documento_cuenta_pagar_session=new documento_cuenta_pagar_session();
		}
		
		if($documento_cuenta_pagar_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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
				if($documento_cuenta_pagarForeignKey->idsucursalDefaultFK==0) {
					$documento_cuenta_pagarForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$documento_cuenta_pagarForeignKey->sucursalsFK[$sucursalLocal->getId()]=documento_cuenta_pagar_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($documento_cuenta_pagar_session->bigidsucursalActual!=null && $documento_cuenta_pagar_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($documento_cuenta_pagar_session->bigidsucursalActual);//WithConnection

				$documento_cuenta_pagarForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=documento_cuenta_pagar_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$documento_cuenta_pagarForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$documento_cuenta_pagarForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($documento_cuenta_pagar_session==null) {
			$documento_cuenta_pagar_session=new documento_cuenta_pagar_session();
		}
		
		if($documento_cuenta_pagar_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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
				if($documento_cuenta_pagarForeignKey->idejercicioDefaultFK==0) {
					$documento_cuenta_pagarForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$documento_cuenta_pagarForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=documento_cuenta_pagar_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($documento_cuenta_pagar_session->bigidejercicioActual!=null && $documento_cuenta_pagar_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($documento_cuenta_pagar_session->bigidejercicioActual);//WithConnection

				$documento_cuenta_pagarForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=documento_cuenta_pagar_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$documento_cuenta_pagarForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$documento_cuenta_pagarForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($documento_cuenta_pagar_session==null) {
			$documento_cuenta_pagar_session=new documento_cuenta_pagar_session();
		}
		
		if($documento_cuenta_pagar_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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
				if($documento_cuenta_pagarForeignKey->idperiodoDefaultFK==0) {
					$documento_cuenta_pagarForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$documento_cuenta_pagarForeignKey->periodosFK[$periodoLocal->getId()]=documento_cuenta_pagar_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($documento_cuenta_pagar_session->bigidperiodoActual!=null && $documento_cuenta_pagar_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($documento_cuenta_pagar_session->bigidperiodoActual);//WithConnection

				$documento_cuenta_pagarForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=documento_cuenta_pagar_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$documento_cuenta_pagarForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$documento_cuenta_pagarForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($documento_cuenta_pagar_session==null) {
			$documento_cuenta_pagar_session=new documento_cuenta_pagar_session();
		}
		
		if($documento_cuenta_pagar_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($documento_cuenta_pagarForeignKey->idusuarioDefaultFK==0) {
					$documento_cuenta_pagarForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$documento_cuenta_pagarForeignKey->usuariosFK[$usuarioLocal->getId()]=documento_cuenta_pagar_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($documento_cuenta_pagar_session->bigidusuarioActual!=null && $documento_cuenta_pagar_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($documento_cuenta_pagar_session->bigidusuarioActual);//WithConnection

				$documento_cuenta_pagarForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=documento_cuenta_pagar_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$documento_cuenta_pagarForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosproveedorsFK($connexion=null,$strRecargarFkQuery='',$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$proveedorLogic= new proveedor_logic();
		$pagination= new Pagination();
		$documento_cuenta_pagarForeignKey->proveedorsFK=array();

		$proveedorLogic->setConnexion($connexion);
		$proveedorLogic->getproveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($documento_cuenta_pagar_session==null) {
			$documento_cuenta_pagar_session=new documento_cuenta_pagar_session();
		}
		
		if($documento_cuenta_pagar_session->bitBusquedaDesdeFKSesionproveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=proveedor_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalproveedor=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalproveedor=Funciones::GetFinalQueryAppend($finalQueryGlobalproveedor, '');
				$finalQueryGlobalproveedor.=proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalproveedor.$strRecargarFkQuery;		

				$proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($proveedorLogic->getproveedors() as $proveedorLocal ) {
				if($documento_cuenta_pagarForeignKey->idproveedorDefaultFK==0) {
					$documento_cuenta_pagarForeignKey->idproveedorDefaultFK=$proveedorLocal->getId();
				}

				$documento_cuenta_pagarForeignKey->proveedorsFK[$proveedorLocal->getId()]=documento_cuenta_pagar_util::getproveedorDescripcion($proveedorLocal);
			}

		} else {

			if($documento_cuenta_pagar_session->bigidproveedorActual!=null && $documento_cuenta_pagar_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($documento_cuenta_pagar_session->bigidproveedorActual);//WithConnection

				$documento_cuenta_pagarForeignKey->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=documento_cuenta_pagar_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$documento_cuenta_pagarForeignKey->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	public function cargarCombosforma_pago_proveedorsFK($connexion=null,$strRecargarFkQuery='',$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$forma_pago_proveedorLogic= new forma_pago_proveedor_logic();
		$pagination= new Pagination();
		$documento_cuenta_pagarForeignKey->forma_pago_proveedorsFK=array();

		$forma_pago_proveedorLogic->setConnexion($connexion);
		$forma_pago_proveedorLogic->getforma_pago_proveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($documento_cuenta_pagar_session==null) {
			$documento_cuenta_pagar_session=new documento_cuenta_pagar_session();
		}
		
		if($documento_cuenta_pagar_session->bitBusquedaDesdeFKSesionforma_pago_proveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=forma_pago_proveedor_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalforma_pago_proveedor=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalforma_pago_proveedor=Funciones::GetFinalQueryAppend($finalQueryGlobalforma_pago_proveedor, '');
				$finalQueryGlobalforma_pago_proveedor.=forma_pago_proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalforma_pago_proveedor.$strRecargarFkQuery;		

				$forma_pago_proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($forma_pago_proveedorLogic->getforma_pago_proveedors() as $forma_pago_proveedorLocal ) {
				if($documento_cuenta_pagarForeignKey->idforma_pago_proveedorDefaultFK==0) {
					$documento_cuenta_pagarForeignKey->idforma_pago_proveedorDefaultFK=$forma_pago_proveedorLocal->getId();
				}

				$documento_cuenta_pagarForeignKey->forma_pago_proveedorsFK[$forma_pago_proveedorLocal->getId()]=documento_cuenta_pagar_util::getforma_pago_proveedorDescripcion($forma_pago_proveedorLocal);
			}

		} else {

			if($documento_cuenta_pagar_session->bigidforma_pago_proveedorActual!=null && $documento_cuenta_pagar_session->bigidforma_pago_proveedorActual > 0) {
				$forma_pago_proveedorLogic->getEntity($documento_cuenta_pagar_session->bigidforma_pago_proveedorActual);//WithConnection

				$documento_cuenta_pagarForeignKey->forma_pago_proveedorsFK[$forma_pago_proveedorLogic->getforma_pago_proveedor()->getId()]=documento_cuenta_pagar_util::getforma_pago_proveedorDescripcion($forma_pago_proveedorLogic->getforma_pago_proveedor());
				$documento_cuenta_pagarForeignKey->idforma_pago_proveedorDefaultFK=$forma_pago_proveedorLogic->getforma_pago_proveedor()->getId();
			}
		}
	}

	public function cargarComboscuenta_corrientesFK($connexion=null,$strRecargarFkQuery='',$documento_cuenta_pagarForeignKey,$documento_cuenta_pagar_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuenta_corrienteLogic= new cuenta_corriente_logic();
		$pagination= new Pagination();
		$documento_cuenta_pagarForeignKey->cuenta_corrientesFK=array();

		$cuenta_corrienteLogic->setConnexion($connexion);
		$cuenta_corrienteLogic->getcuenta_corrienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($documento_cuenta_pagar_session==null) {
			$documento_cuenta_pagar_session=new documento_cuenta_pagar_session();
		}
		
		if($documento_cuenta_pagar_session->bitBusquedaDesdeFKSesioncuenta_corriente!=true) {
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
				if($documento_cuenta_pagarForeignKey->idcuenta_corrienteDefaultFK==0) {
					$documento_cuenta_pagarForeignKey->idcuenta_corrienteDefaultFK=$cuenta_corrienteLocal->getId();
				}

				$documento_cuenta_pagarForeignKey->cuenta_corrientesFK[$cuenta_corrienteLocal->getId()]=documento_cuenta_pagar_util::getcuenta_corrienteDescripcion($cuenta_corrienteLocal);
			}

		} else {

			if($documento_cuenta_pagar_session->bigidcuenta_corrienteActual!=null && $documento_cuenta_pagar_session->bigidcuenta_corrienteActual > 0) {
				$cuenta_corrienteLogic->getEntity($documento_cuenta_pagar_session->bigidcuenta_corrienteActual);//WithConnection

				$documento_cuenta_pagarForeignKey->cuenta_corrientesFK[$cuenta_corrienteLogic->getcuenta_corriente()->getId()]=documento_cuenta_pagar_util::getcuenta_corrienteDescripcion($cuenta_corrienteLogic->getcuenta_corriente());
				$documento_cuenta_pagarForeignKey->idcuenta_corrienteDefaultFK=$cuenta_corrienteLogic->getcuenta_corriente()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($documento_cuenta_pagar,$ordencompras,$imagendocumentocuentapagars,$devolucions) {
		$this->saveRelacionesBase($documento_cuenta_pagar,$ordencompras,$imagendocumentocuentapagars,$devolucions,true);
	}

	public function saveRelaciones($documento_cuenta_pagar,$ordencompras,$imagendocumentocuentapagars,$devolucions) {
		$this->saveRelacionesBase($documento_cuenta_pagar,$ordencompras,$imagendocumentocuentapagars,$devolucions,false);
	}

	public function saveRelacionesBase($documento_cuenta_pagar,$ordencompras=array(),$imagendocumentocuentapagars=array(),$devolucions=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$documento_cuenta_pagar->setorden_compras($ordencompras);
			$documento_cuenta_pagar->setimagen_documento_cuenta_pagars($imagendocumentocuentapagars);
			$documento_cuenta_pagar->setdevolucions($devolucions);
			$this->setdocumento_cuenta_pagar($documento_cuenta_pagar);

			if(true) {

				//documento_cuenta_pagar_logic_add::updateRelacionesToSave($documento_cuenta_pagar,$this);

				if(($this->documento_cuenta_pagar->getIsNew() || $this->documento_cuenta_pagar->getIsChanged()) && !$this->documento_cuenta_pagar->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($ordencompras,$imagendocumentocuentapagars,$devolucions);

				} else if($this->documento_cuenta_pagar->getIsDeleted()) {
					$this->saveRelacionesDetalles($ordencompras,$imagendocumentocuentapagars,$devolucions);
					$this->save();
				}

				//documento_cuenta_pagar_logic_add::updateRelacionesToSaveAfter($documento_cuenta_pagar,$this);

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
	
	
	public function saveRelacionesDetalles($ordencompras=array(),$imagendocumentocuentapagars=array(),$devolucions=array()) {
		try {
	

			$iddocumento_cuenta_pagarActual=$this->getdocumento_cuenta_pagar()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/orden_compra_carga.php');
			orden_compra_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$ordencompraLogic_Desde_documento_cuenta_pagar=new orden_compra_logic();
			$ordencompraLogic_Desde_documento_cuenta_pagar->setorden_compras($ordencompras);

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
			$imagendocumentocuentapagarLogic_Desde_documento_cuenta_pagar->setimagen_documento_cuenta_pagars($imagendocumentocuentapagars);

			$imagendocumentocuentapagarLogic_Desde_documento_cuenta_pagar->setConnexion($this->getConnexion());
			$imagendocumentocuentapagarLogic_Desde_documento_cuenta_pagar->setDatosCliente($this->datosCliente);

			foreach($imagendocumentocuentapagarLogic_Desde_documento_cuenta_pagar->getimagen_documento_cuenta_pagars() as $imagendocumentocuentapagar_Desde_documento_cuenta_pagar) {
				$imagendocumentocuentapagar_Desde_documento_cuenta_pagar->setid_documento_cuenta_pagar($iddocumento_cuenta_pagarActual);
			}

			$imagendocumentocuentapagarLogic_Desde_documento_cuenta_pagar->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/devolucion_carga.php');
			devolucion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$devolucionLogic_Desde_documento_cuenta_pagar=new devolucion_logic();
			$devolucionLogic_Desde_documento_cuenta_pagar->setdevolucions($devolucions);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $documento_cuenta_pagars,documento_cuenta_pagar_param_return $documento_cuenta_pagarParameterGeneral) : documento_cuenta_pagar_param_return {
		$documento_cuenta_pagarReturnGeneral=new documento_cuenta_pagar_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $documento_cuenta_pagarReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $documento_cuenta_pagars,documento_cuenta_pagar_param_return $documento_cuenta_pagarParameterGeneral) : documento_cuenta_pagar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$documento_cuenta_pagarReturnGeneral=new documento_cuenta_pagar_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $documento_cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $documento_cuenta_pagars,documento_cuenta_pagar $documento_cuenta_pagar,documento_cuenta_pagar_param_return $documento_cuenta_pagarParameterGeneral,bool $isEsNuevodocumento_cuenta_pagar,array $clases) : documento_cuenta_pagar_param_return {
		 try {	
			$documento_cuenta_pagarReturnGeneral=new documento_cuenta_pagar_param_return();
	
			$documento_cuenta_pagarReturnGeneral->setdocumento_cuenta_pagar($documento_cuenta_pagar);
			$documento_cuenta_pagarReturnGeneral->setdocumento_cuenta_pagars($documento_cuenta_pagars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$documento_cuenta_pagarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $documento_cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $documento_cuenta_pagars,documento_cuenta_pagar $documento_cuenta_pagar,documento_cuenta_pagar_param_return $documento_cuenta_pagarParameterGeneral,bool $isEsNuevodocumento_cuenta_pagar,array $clases) : documento_cuenta_pagar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$documento_cuenta_pagarReturnGeneral=new documento_cuenta_pagar_param_return();
	
			$documento_cuenta_pagarReturnGeneral->setdocumento_cuenta_pagar($documento_cuenta_pagar);
			$documento_cuenta_pagarReturnGeneral->setdocumento_cuenta_pagars($documento_cuenta_pagars);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$documento_cuenta_pagarReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $documento_cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $documento_cuenta_pagars,documento_cuenta_pagar $documento_cuenta_pagar,documento_cuenta_pagar_param_return $documento_cuenta_pagarParameterGeneral,bool $isEsNuevodocumento_cuenta_pagar,array $clases) : documento_cuenta_pagar_param_return {
		 try {	
			$documento_cuenta_pagarReturnGeneral=new documento_cuenta_pagar_param_return();
	
			$documento_cuenta_pagarReturnGeneral->setdocumento_cuenta_pagar($documento_cuenta_pagar);
			$documento_cuenta_pagarReturnGeneral->setdocumento_cuenta_pagars($documento_cuenta_pagars);
			
			
			
			return $documento_cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $documento_cuenta_pagars,documento_cuenta_pagar $documento_cuenta_pagar,documento_cuenta_pagar_param_return $documento_cuenta_pagarParameterGeneral,bool $isEsNuevodocumento_cuenta_pagar,array $clases) : documento_cuenta_pagar_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$documento_cuenta_pagarReturnGeneral=new documento_cuenta_pagar_param_return();
	
			$documento_cuenta_pagarReturnGeneral->setdocumento_cuenta_pagar($documento_cuenta_pagar);
			$documento_cuenta_pagarReturnGeneral->setdocumento_cuenta_pagars($documento_cuenta_pagars);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $documento_cuenta_pagarReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,documento_cuenta_pagar $documento_cuenta_pagar,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,documento_cuenta_pagar $documento_cuenta_pagar,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		documento_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		documento_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(documento_cuenta_pagar $documento_cuenta_pagar,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//documento_cuenta_pagar_logic_add::updatedocumento_cuenta_pagarToGet($this->documento_cuenta_pagar);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$documento_cuenta_pagar->setempresa($this->documento_cuenta_pagarDataAccess->getempresa($this->connexion,$documento_cuenta_pagar));
		$documento_cuenta_pagar->setsucursal($this->documento_cuenta_pagarDataAccess->getsucursal($this->connexion,$documento_cuenta_pagar));
		$documento_cuenta_pagar->setejercicio($this->documento_cuenta_pagarDataAccess->getejercicio($this->connexion,$documento_cuenta_pagar));
		$documento_cuenta_pagar->setperiodo($this->documento_cuenta_pagarDataAccess->getperiodo($this->connexion,$documento_cuenta_pagar));
		$documento_cuenta_pagar->setusuario($this->documento_cuenta_pagarDataAccess->getusuario($this->connexion,$documento_cuenta_pagar));
		$documento_cuenta_pagar->setproveedor($this->documento_cuenta_pagarDataAccess->getproveedor($this->connexion,$documento_cuenta_pagar));
		$documento_cuenta_pagar->setforma_pago_proveedor($this->documento_cuenta_pagarDataAccess->getforma_pago_proveedor($this->connexion,$documento_cuenta_pagar));
		$documento_cuenta_pagar->setcuenta_corriente($this->documento_cuenta_pagarDataAccess->getcuenta_corriente($this->connexion,$documento_cuenta_pagar));
		$documento_cuenta_pagar->setorden_compras($this->documento_cuenta_pagarDataAccess->getorden_compras($this->connexion,$documento_cuenta_pagar));
		$documento_cuenta_pagar->setimagen_documento_cuenta_pagars($this->documento_cuenta_pagarDataAccess->getimagen_documento_cuenta_pagars($this->connexion,$documento_cuenta_pagar));
		$documento_cuenta_pagar->setdevolucions($this->documento_cuenta_pagarDataAccess->getdevolucions($this->connexion,$documento_cuenta_pagar));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$documento_cuenta_pagar->setempresa($this->documento_cuenta_pagarDataAccess->getempresa($this->connexion,$documento_cuenta_pagar));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$documento_cuenta_pagar->setsucursal($this->documento_cuenta_pagarDataAccess->getsucursal($this->connexion,$documento_cuenta_pagar));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$documento_cuenta_pagar->setejercicio($this->documento_cuenta_pagarDataAccess->getejercicio($this->connexion,$documento_cuenta_pagar));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$documento_cuenta_pagar->setperiodo($this->documento_cuenta_pagarDataAccess->getperiodo($this->connexion,$documento_cuenta_pagar));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$documento_cuenta_pagar->setusuario($this->documento_cuenta_pagarDataAccess->getusuario($this->connexion,$documento_cuenta_pagar));
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$documento_cuenta_pagar->setproveedor($this->documento_cuenta_pagarDataAccess->getproveedor($this->connexion,$documento_cuenta_pagar));
				continue;
			}

			if($clas->clas==forma_pago_proveedor::$class.'') {
				$documento_cuenta_pagar->setforma_pago_proveedor($this->documento_cuenta_pagarDataAccess->getforma_pago_proveedor($this->connexion,$documento_cuenta_pagar));
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				$documento_cuenta_pagar->setcuenta_corriente($this->documento_cuenta_pagarDataAccess->getcuenta_corriente($this->connexion,$documento_cuenta_pagar));
				continue;
			}

			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$documento_cuenta_pagar->setorden_compras($this->documento_cuenta_pagarDataAccess->getorden_compras($this->connexion,$documento_cuenta_pagar));

				if($this->isConDeep) {
					$ordencompraLogic= new orden_compra_logic($this->connexion);
					$ordencompraLogic->setorden_compras($documento_cuenta_pagar->getorden_compras());
					$classesLocal=orden_compra_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$ordencompraLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					orden_compra_util::refrescarFKDescripciones($ordencompraLogic->getorden_compras());
					$documento_cuenta_pagar->setorden_compras($ordencompraLogic->getorden_compras());
				}

				continue;
			}

			if($clas->clas==imagen_documento_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$documento_cuenta_pagar->setimagen_documento_cuenta_pagars($this->documento_cuenta_pagarDataAccess->getimagen_documento_cuenta_pagars($this->connexion,$documento_cuenta_pagar));

				if($this->isConDeep) {
					$imagendocumentocuentapagarLogic= new imagen_documento_cuenta_pagar_logic($this->connexion);
					$imagendocumentocuentapagarLogic->setimagen_documento_cuenta_pagars($documento_cuenta_pagar->getimagen_documento_cuenta_pagars());
					$classesLocal=imagen_documento_cuenta_pagar_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$imagendocumentocuentapagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					imagen_documento_cuenta_pagar_util::refrescarFKDescripciones($imagendocumentocuentapagarLogic->getimagen_documento_cuenta_pagars());
					$documento_cuenta_pagar->setimagen_documento_cuenta_pagars($imagendocumentocuentapagarLogic->getimagen_documento_cuenta_pagars());
				}

				continue;
			}

			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$documento_cuenta_pagar->setdevolucions($this->documento_cuenta_pagarDataAccess->getdevolucions($this->connexion,$documento_cuenta_pagar));

				if($this->isConDeep) {
					$devolucionLogic= new devolucion_logic($this->connexion);
					$devolucionLogic->setdevolucions($documento_cuenta_pagar->getdevolucions());
					$classesLocal=devolucion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$devolucionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					devolucion_util::refrescarFKDescripciones($devolucionLogic->getdevolucions());
					$documento_cuenta_pagar->setdevolucions($devolucionLogic->getdevolucions());
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
			$documento_cuenta_pagar->setempresa($this->documento_cuenta_pagarDataAccess->getempresa($this->connexion,$documento_cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_pagar->setsucursal($this->documento_cuenta_pagarDataAccess->getsucursal($this->connexion,$documento_cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_pagar->setejercicio($this->documento_cuenta_pagarDataAccess->getejercicio($this->connexion,$documento_cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_pagar->setperiodo($this->documento_cuenta_pagarDataAccess->getperiodo($this->connexion,$documento_cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_pagar->setusuario($this->documento_cuenta_pagarDataAccess->getusuario($this->connexion,$documento_cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_pagar->setproveedor($this->documento_cuenta_pagarDataAccess->getproveedor($this->connexion,$documento_cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==forma_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_pagar->setforma_pago_proveedor($this->documento_cuenta_pagarDataAccess->getforma_pago_proveedor($this->connexion,$documento_cuenta_pagar));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_pagar->setcuenta_corriente($this->documento_cuenta_pagarDataAccess->getcuenta_corriente($this->connexion,$documento_cuenta_pagar));
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
			$documento_cuenta_pagar->setorden_compras($this->documento_cuenta_pagarDataAccess->getorden_compras($this->connexion,$documento_cuenta_pagar));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_documento_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_documento_cuenta_pagar::$class);
			$documento_cuenta_pagar->setimagen_documento_cuenta_pagars($this->documento_cuenta_pagarDataAccess->getimagen_documento_cuenta_pagars($this->connexion,$documento_cuenta_pagar));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion::$class);
			$documento_cuenta_pagar->setdevolucions($this->documento_cuenta_pagarDataAccess->getdevolucions($this->connexion,$documento_cuenta_pagar));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$documento_cuenta_pagar->setempresa($this->documento_cuenta_pagarDataAccess->getempresa($this->connexion,$documento_cuenta_pagar));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($documento_cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$documento_cuenta_pagar->setsucursal($this->documento_cuenta_pagarDataAccess->getsucursal($this->connexion,$documento_cuenta_pagar));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($documento_cuenta_pagar->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$documento_cuenta_pagar->setejercicio($this->documento_cuenta_pagarDataAccess->getejercicio($this->connexion,$documento_cuenta_pagar));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($documento_cuenta_pagar->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$documento_cuenta_pagar->setperiodo($this->documento_cuenta_pagarDataAccess->getperiodo($this->connexion,$documento_cuenta_pagar));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($documento_cuenta_pagar->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$documento_cuenta_pagar->setusuario($this->documento_cuenta_pagarDataAccess->getusuario($this->connexion,$documento_cuenta_pagar));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($documento_cuenta_pagar->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$documento_cuenta_pagar->setproveedor($this->documento_cuenta_pagarDataAccess->getproveedor($this->connexion,$documento_cuenta_pagar));
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepLoad($documento_cuenta_pagar->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		$documento_cuenta_pagar->setforma_pago_proveedor($this->documento_cuenta_pagarDataAccess->getforma_pago_proveedor($this->connexion,$documento_cuenta_pagar));
		$forma_pago_proveedorLogic= new forma_pago_proveedor_logic($this->connexion);
		$forma_pago_proveedorLogic->deepLoad($documento_cuenta_pagar->getforma_pago_proveedor(),$isDeep,$deepLoadType,$clases);
				
		$documento_cuenta_pagar->setcuenta_corriente($this->documento_cuenta_pagarDataAccess->getcuenta_corriente($this->connexion,$documento_cuenta_pagar));
		$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
		$cuenta_corrienteLogic->deepLoad($documento_cuenta_pagar->getcuenta_corriente(),$isDeep,$deepLoadType,$clases);
				

		$documento_cuenta_pagar->setorden_compras($this->documento_cuenta_pagarDataAccess->getorden_compras($this->connexion,$documento_cuenta_pagar));

		foreach($documento_cuenta_pagar->getorden_compras() as $ordencompra) {
			$ordencompraLogic= new orden_compra_logic($this->connexion);
			$ordencompraLogic->deepLoad($ordencompra,$isDeep,$deepLoadType,$clases);
		}

		$documento_cuenta_pagar->setimagen_documento_cuenta_pagars($this->documento_cuenta_pagarDataAccess->getimagen_documento_cuenta_pagars($this->connexion,$documento_cuenta_pagar));

		foreach($documento_cuenta_pagar->getimagen_documento_cuenta_pagars() as $imagendocumentocuentapagar) {
			$imagendocumentocuentapagarLogic= new imagen_documento_cuenta_pagar_logic($this->connexion);
			$imagendocumentocuentapagarLogic->deepLoad($imagendocumentocuentapagar,$isDeep,$deepLoadType,$clases);
		}

		$documento_cuenta_pagar->setdevolucions($this->documento_cuenta_pagarDataAccess->getdevolucions($this->connexion,$documento_cuenta_pagar));

		foreach($documento_cuenta_pagar->getdevolucions() as $devolucion) {
			$devolucionLogic= new devolucion_logic($this->connexion);
			$devolucionLogic->deepLoad($devolucion,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$documento_cuenta_pagar->setempresa($this->documento_cuenta_pagarDataAccess->getempresa($this->connexion,$documento_cuenta_pagar));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($documento_cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$documento_cuenta_pagar->setsucursal($this->documento_cuenta_pagarDataAccess->getsucursal($this->connexion,$documento_cuenta_pagar));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($documento_cuenta_pagar->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$documento_cuenta_pagar->setejercicio($this->documento_cuenta_pagarDataAccess->getejercicio($this->connexion,$documento_cuenta_pagar));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($documento_cuenta_pagar->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$documento_cuenta_pagar->setperiodo($this->documento_cuenta_pagarDataAccess->getperiodo($this->connexion,$documento_cuenta_pagar));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($documento_cuenta_pagar->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$documento_cuenta_pagar->setusuario($this->documento_cuenta_pagarDataAccess->getusuario($this->connexion,$documento_cuenta_pagar));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($documento_cuenta_pagar->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$documento_cuenta_pagar->setproveedor($this->documento_cuenta_pagarDataAccess->getproveedor($this->connexion,$documento_cuenta_pagar));
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($documento_cuenta_pagar->getproveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==forma_pago_proveedor::$class.'') {
				$documento_cuenta_pagar->setforma_pago_proveedor($this->documento_cuenta_pagarDataAccess->getforma_pago_proveedor($this->connexion,$documento_cuenta_pagar));
				$forma_pago_proveedorLogic= new forma_pago_proveedor_logic($this->connexion);
				$forma_pago_proveedorLogic->deepLoad($documento_cuenta_pagar->getforma_pago_proveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				$documento_cuenta_pagar->setcuenta_corriente($this->documento_cuenta_pagarDataAccess->getcuenta_corriente($this->connexion,$documento_cuenta_pagar));
				$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
				$cuenta_corrienteLogic->deepLoad($documento_cuenta_pagar->getcuenta_corriente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$documento_cuenta_pagar->setorden_compras($this->documento_cuenta_pagarDataAccess->getorden_compras($this->connexion,$documento_cuenta_pagar));

				foreach($documento_cuenta_pagar->getorden_compras() as $ordencompra) {
					$ordencompraLogic= new orden_compra_logic($this->connexion);
					$ordencompraLogic->deepLoad($ordencompra,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==imagen_documento_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$documento_cuenta_pagar->setimagen_documento_cuenta_pagars($this->documento_cuenta_pagarDataAccess->getimagen_documento_cuenta_pagars($this->connexion,$documento_cuenta_pagar));

				foreach($documento_cuenta_pagar->getimagen_documento_cuenta_pagars() as $imagendocumentocuentapagar) {
					$imagendocumentocuentapagarLogic= new imagen_documento_cuenta_pagar_logic($this->connexion);
					$imagendocumentocuentapagarLogic->deepLoad($imagendocumentocuentapagar,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$documento_cuenta_pagar->setdevolucions($this->documento_cuenta_pagarDataAccess->getdevolucions($this->connexion,$documento_cuenta_pagar));

				foreach($documento_cuenta_pagar->getdevolucions() as $devolucion) {
					$devolucionLogic= new devolucion_logic($this->connexion);
					$devolucionLogic->deepLoad($devolucion,$isDeep,$deepLoadType,$clases);
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
			$documento_cuenta_pagar->setempresa($this->documento_cuenta_pagarDataAccess->getempresa($this->connexion,$documento_cuenta_pagar));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($documento_cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_pagar->setsucursal($this->documento_cuenta_pagarDataAccess->getsucursal($this->connexion,$documento_cuenta_pagar));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($documento_cuenta_pagar->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_pagar->setejercicio($this->documento_cuenta_pagarDataAccess->getejercicio($this->connexion,$documento_cuenta_pagar));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($documento_cuenta_pagar->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_pagar->setperiodo($this->documento_cuenta_pagarDataAccess->getperiodo($this->connexion,$documento_cuenta_pagar));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($documento_cuenta_pagar->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_pagar->setusuario($this->documento_cuenta_pagarDataAccess->getusuario($this->connexion,$documento_cuenta_pagar));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($documento_cuenta_pagar->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_pagar->setproveedor($this->documento_cuenta_pagarDataAccess->getproveedor($this->connexion,$documento_cuenta_pagar));
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($documento_cuenta_pagar->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==forma_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_pagar->setforma_pago_proveedor($this->documento_cuenta_pagarDataAccess->getforma_pago_proveedor($this->connexion,$documento_cuenta_pagar));
			$forma_pago_proveedorLogic= new forma_pago_proveedor_logic($this->connexion);
			$forma_pago_proveedorLogic->deepLoad($documento_cuenta_pagar->getforma_pago_proveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$documento_cuenta_pagar->setcuenta_corriente($this->documento_cuenta_pagarDataAccess->getcuenta_corriente($this->connexion,$documento_cuenta_pagar));
			$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
			$cuenta_corrienteLogic->deepLoad($documento_cuenta_pagar->getcuenta_corriente(),$isDeep,$deepLoadType,$clases);
				
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
			$documento_cuenta_pagar->setorden_compras($this->documento_cuenta_pagarDataAccess->getorden_compras($this->connexion,$documento_cuenta_pagar));

			foreach($documento_cuenta_pagar->getorden_compras() as $ordencompra) {
				$ordencompraLogic= new orden_compra_logic($this->connexion);
				$ordencompraLogic->deepLoad($ordencompra,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_documento_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_documento_cuenta_pagar::$class);
			$documento_cuenta_pagar->setimagen_documento_cuenta_pagars($this->documento_cuenta_pagarDataAccess->getimagen_documento_cuenta_pagars($this->connexion,$documento_cuenta_pagar));

			foreach($documento_cuenta_pagar->getimagen_documento_cuenta_pagars() as $imagendocumentocuentapagar) {
				$imagendocumentocuentapagarLogic= new imagen_documento_cuenta_pagar_logic($this->connexion);
				$imagendocumentocuentapagarLogic->deepLoad($imagendocumentocuentapagar,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion::$class);
			$documento_cuenta_pagar->setdevolucions($this->documento_cuenta_pagarDataAccess->getdevolucions($this->connexion,$documento_cuenta_pagar));

			foreach($documento_cuenta_pagar->getdevolucions() as $devolucion) {
				$devolucionLogic= new devolucion_logic($this->connexion);
				$devolucionLogic->deepLoad($devolucion,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(documento_cuenta_pagar $documento_cuenta_pagar,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//documento_cuenta_pagar_logic_add::updatedocumento_cuenta_pagarToSave($this->documento_cuenta_pagar);			
			
			if(!$paraDeleteCascade) {				
				documento_cuenta_pagar_data::save($documento_cuenta_pagar, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($documento_cuenta_pagar->getempresa(),$this->connexion);
		sucursal_data::save($documento_cuenta_pagar->getsucursal(),$this->connexion);
		ejercicio_data::save($documento_cuenta_pagar->getejercicio(),$this->connexion);
		periodo_data::save($documento_cuenta_pagar->getperiodo(),$this->connexion);
		usuario_data::save($documento_cuenta_pagar->getusuario(),$this->connexion);
		proveedor_data::save($documento_cuenta_pagar->getproveedor(),$this->connexion);
		forma_pago_proveedor_data::save($documento_cuenta_pagar->getforma_pago_proveedor(),$this->connexion);
		cuenta_corriente_data::save($documento_cuenta_pagar->getcuenta_corriente(),$this->connexion);

		foreach($documento_cuenta_pagar->getorden_compras() as $ordencompra) {
			$ordencompra->setid_documento_cuenta_pagar($documento_cuenta_pagar->getId());
			orden_compra_data::save($ordencompra,$this->connexion);
		}


		foreach($documento_cuenta_pagar->getimagen_documento_cuenta_pagars() as $imagendocumentocuentapagar) {
			$imagendocumentocuentapagar->setid_documento_cuenta_pagar($documento_cuenta_pagar->getId());
			imagen_documento_cuenta_pagar_data::save($imagendocumentocuentapagar,$this->connexion);
		}


		foreach($documento_cuenta_pagar->getdevolucions() as $devolucion) {
			$devolucion->setid_documento_cuenta_pagar($documento_cuenta_pagar->getId());
			devolucion_data::save($devolucion,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($documento_cuenta_pagar->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($documento_cuenta_pagar->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($documento_cuenta_pagar->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($documento_cuenta_pagar->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($documento_cuenta_pagar->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($documento_cuenta_pagar->getproveedor(),$this->connexion);
				continue;
			}

			if($clas->clas==forma_pago_proveedor::$class.'') {
				forma_pago_proveedor_data::save($documento_cuenta_pagar->getforma_pago_proveedor(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				cuenta_corriente_data::save($documento_cuenta_pagar->getcuenta_corriente(),$this->connexion);
				continue;
			}


			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($documento_cuenta_pagar->getorden_compras() as $ordencompra) {
					$ordencompra->setid_documento_cuenta_pagar($documento_cuenta_pagar->getId());
					orden_compra_data::save($ordencompra,$this->connexion);
				}

				continue;
			}

			if($clas->clas==imagen_documento_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($documento_cuenta_pagar->getimagen_documento_cuenta_pagars() as $imagendocumentocuentapagar) {
					$imagendocumentocuentapagar->setid_documento_cuenta_pagar($documento_cuenta_pagar->getId());
					imagen_documento_cuenta_pagar_data::save($imagendocumentocuentapagar,$this->connexion);
				}

				continue;
			}

			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($documento_cuenta_pagar->getdevolucions() as $devolucion) {
					$devolucion->setid_documento_cuenta_pagar($documento_cuenta_pagar->getId());
					devolucion_data::save($devolucion,$this->connexion);
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
			empresa_data::save($documento_cuenta_pagar->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($documento_cuenta_pagar->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($documento_cuenta_pagar->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($documento_cuenta_pagar->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($documento_cuenta_pagar->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($documento_cuenta_pagar->getproveedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==forma_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			forma_pago_proveedor_data::save($documento_cuenta_pagar->getforma_pago_proveedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_corriente_data::save($documento_cuenta_pagar->getcuenta_corriente(),$this->connexion);
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

			foreach($documento_cuenta_pagar->getorden_compras() as $ordencompra) {
				$ordencompra->setid_documento_cuenta_pagar($documento_cuenta_pagar->getId());
				orden_compra_data::save($ordencompra,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_documento_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_documento_cuenta_pagar::$class);

			foreach($documento_cuenta_pagar->getimagen_documento_cuenta_pagars() as $imagendocumentocuentapagar) {
				$imagendocumentocuentapagar->setid_documento_cuenta_pagar($documento_cuenta_pagar->getId());
				imagen_documento_cuenta_pagar_data::save($imagendocumentocuentapagar,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion::$class);

			foreach($documento_cuenta_pagar->getdevolucions() as $devolucion) {
				$devolucion->setid_documento_cuenta_pagar($documento_cuenta_pagar->getId());
				devolucion_data::save($devolucion,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($documento_cuenta_pagar->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($documento_cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($documento_cuenta_pagar->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($documento_cuenta_pagar->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($documento_cuenta_pagar->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($documento_cuenta_pagar->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($documento_cuenta_pagar->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($documento_cuenta_pagar->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($documento_cuenta_pagar->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($documento_cuenta_pagar->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		proveedor_data::save($documento_cuenta_pagar->getproveedor(),$this->connexion);
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepSave($documento_cuenta_pagar->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		forma_pago_proveedor_data::save($documento_cuenta_pagar->getforma_pago_proveedor(),$this->connexion);
		$forma_pago_proveedorLogic= new forma_pago_proveedor_logic($this->connexion);
		$forma_pago_proveedorLogic->deepSave($documento_cuenta_pagar->getforma_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_corriente_data::save($documento_cuenta_pagar->getcuenta_corriente(),$this->connexion);
		$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
		$cuenta_corrienteLogic->deepSave($documento_cuenta_pagar->getcuenta_corriente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($documento_cuenta_pagar->getorden_compras() as $ordencompra) {
			$ordencompraLogic= new orden_compra_logic($this->connexion);
			$ordencompra->setid_documento_cuenta_pagar($documento_cuenta_pagar->getId());
			orden_compra_data::save($ordencompra,$this->connexion);
			$ordencompraLogic->deepSave($ordencompra,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($documento_cuenta_pagar->getimagen_documento_cuenta_pagars() as $imagendocumentocuentapagar) {
			$imagendocumentocuentapagarLogic= new imagen_documento_cuenta_pagar_logic($this->connexion);
			$imagendocumentocuentapagar->setid_documento_cuenta_pagar($documento_cuenta_pagar->getId());
			imagen_documento_cuenta_pagar_data::save($imagendocumentocuentapagar,$this->connexion);
			$imagendocumentocuentapagarLogic->deepSave($imagendocumentocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($documento_cuenta_pagar->getdevolucions() as $devolucion) {
			$devolucionLogic= new devolucion_logic($this->connexion);
			$devolucion->setid_documento_cuenta_pagar($documento_cuenta_pagar->getId());
			devolucion_data::save($devolucion,$this->connexion);
			$devolucionLogic->deepSave($devolucion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($documento_cuenta_pagar->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($documento_cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($documento_cuenta_pagar->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($documento_cuenta_pagar->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($documento_cuenta_pagar->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($documento_cuenta_pagar->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($documento_cuenta_pagar->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($documento_cuenta_pagar->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($documento_cuenta_pagar->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($documento_cuenta_pagar->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($documento_cuenta_pagar->getproveedor(),$this->connexion);
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepSave($documento_cuenta_pagar->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==forma_pago_proveedor::$class.'') {
				forma_pago_proveedor_data::save($documento_cuenta_pagar->getforma_pago_proveedor(),$this->connexion);
				$forma_pago_proveedorLogic= new forma_pago_proveedor_logic($this->connexion);
				$forma_pago_proveedorLogic->deepSave($documento_cuenta_pagar->getforma_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				cuenta_corriente_data::save($documento_cuenta_pagar->getcuenta_corriente(),$this->connexion);
				$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
				$cuenta_corrienteLogic->deepSave($documento_cuenta_pagar->getcuenta_corriente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==orden_compra::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($documento_cuenta_pagar->getorden_compras() as $ordencompra) {
					$ordencompraLogic= new orden_compra_logic($this->connexion);
					$ordencompra->setid_documento_cuenta_pagar($documento_cuenta_pagar->getId());
					orden_compra_data::save($ordencompra,$this->connexion);
					$ordencompraLogic->deepSave($ordencompra,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==imagen_documento_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($documento_cuenta_pagar->getimagen_documento_cuenta_pagars() as $imagendocumentocuentapagar) {
					$imagendocumentocuentapagarLogic= new imagen_documento_cuenta_pagar_logic($this->connexion);
					$imagendocumentocuentapagar->setid_documento_cuenta_pagar($documento_cuenta_pagar->getId());
					imagen_documento_cuenta_pagar_data::save($imagendocumentocuentapagar,$this->connexion);
					$imagendocumentocuentapagarLogic->deepSave($imagendocumentocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($documento_cuenta_pagar->getdevolucions() as $devolucion) {
					$devolucionLogic= new devolucion_logic($this->connexion);
					$devolucion->setid_documento_cuenta_pagar($documento_cuenta_pagar->getId());
					devolucion_data::save($devolucion,$this->connexion);
					$devolucionLogic->deepSave($devolucion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($documento_cuenta_pagar->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($documento_cuenta_pagar->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($documento_cuenta_pagar->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($documento_cuenta_pagar->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($documento_cuenta_pagar->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($documento_cuenta_pagar->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($documento_cuenta_pagar->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($documento_cuenta_pagar->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($documento_cuenta_pagar->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($documento_cuenta_pagar->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($documento_cuenta_pagar->getproveedor(),$this->connexion);
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepSave($documento_cuenta_pagar->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==forma_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			forma_pago_proveedor_data::save($documento_cuenta_pagar->getforma_pago_proveedor(),$this->connexion);
			$forma_pago_proveedorLogic= new forma_pago_proveedor_logic($this->connexion);
			$forma_pago_proveedorLogic->deepSave($documento_cuenta_pagar->getforma_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_corriente_data::save($documento_cuenta_pagar->getcuenta_corriente(),$this->connexion);
			$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
			$cuenta_corrienteLogic->deepSave($documento_cuenta_pagar->getcuenta_corriente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
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

			foreach($documento_cuenta_pagar->getorden_compras() as $ordencompra) {
				$ordencompraLogic= new orden_compra_logic($this->connexion);
				$ordencompra->setid_documento_cuenta_pagar($documento_cuenta_pagar->getId());
				orden_compra_data::save($ordencompra,$this->connexion);
				$ordencompraLogic->deepSave($ordencompra,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_documento_cuenta_pagar::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_documento_cuenta_pagar::$class);

			foreach($documento_cuenta_pagar->getimagen_documento_cuenta_pagars() as $imagendocumentocuentapagar) {
				$imagendocumentocuentapagarLogic= new imagen_documento_cuenta_pagar_logic($this->connexion);
				$imagendocumentocuentapagar->setid_documento_cuenta_pagar($documento_cuenta_pagar->getId());
				imagen_documento_cuenta_pagar_data::save($imagendocumentocuentapagar,$this->connexion);
				$imagendocumentocuentapagarLogic->deepSave($imagendocumentocuentapagar,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion::$class);

			foreach($documento_cuenta_pagar->getdevolucions() as $devolucion) {
				$devolucionLogic= new devolucion_logic($this->connexion);
				$devolucion->setid_documento_cuenta_pagar($documento_cuenta_pagar->getId());
				devolucion_data::save($devolucion,$this->connexion);
				$devolucionLogic->deepSave($devolucion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				documento_cuenta_pagar_data::save($documento_cuenta_pagar, $this->connexion);
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
			
			$this->deepLoad($this->documento_cuenta_pagar,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->documento_cuenta_pagars as $documento_cuenta_pagar) {
				$this->deepLoad($documento_cuenta_pagar,$isDeep,$deepLoadType,$clases);
								
				documento_cuenta_pagar_util::refrescarFKDescripciones($this->documento_cuenta_pagars);
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
			
			foreach($this->documento_cuenta_pagars as $documento_cuenta_pagar) {
				$this->deepLoad($documento_cuenta_pagar,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->documento_cuenta_pagar,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->documento_cuenta_pagars as $documento_cuenta_pagar) {
				$this->deepSave($documento_cuenta_pagar,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->documento_cuenta_pagars as $documento_cuenta_pagar) {
				$this->deepSave($documento_cuenta_pagar,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(proveedor::$class);
				$classes[]=new Classe(forma_pago_proveedor::$class);
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
					if($clas->clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==forma_pago_proveedor::$class) {
						$classes[]=new Classe(forma_pago_proveedor::$class);
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
					if($clas->clas==proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(proveedor::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==forma_pago_proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(forma_pago_proveedor::$class);
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
				
				$classes[]=new Classe(orden_compra::$class);
				$classes[]=new Classe(imagen_documento_cuenta_pagar::$class);
				$classes[]=new Classe(devolucion::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==orden_compra::$class) {
						$classes[]=new Classe(orden_compra::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==imagen_documento_cuenta_pagar::$class) {
						$classes[]=new Classe(imagen_documento_cuenta_pagar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==devolucion::$class) {
						$classes[]=new Classe(devolucion::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

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
					if($clas->clas==imagen_documento_cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(imagen_documento_cuenta_pagar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==devolucion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(devolucion::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getdocumento_cuenta_pagar() : ?documento_cuenta_pagar {	
		/*
		documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGet($this->documento_cuenta_pagar,$this->datosCliente);
		documento_cuenta_pagar_logic_add::updatedocumento_cuenta_pagarToGet($this->documento_cuenta_pagar);
		*/
			
		return $this->documento_cuenta_pagar;
	}
		
	public function setdocumento_cuenta_pagar(documento_cuenta_pagar $newdocumento_cuenta_pagar) {
		$this->documento_cuenta_pagar = $newdocumento_cuenta_pagar;
	}
	
	public function getdocumento_cuenta_pagars() : array {		
		/*
		documento_cuenta_pagar_logic_add::checkdocumento_cuenta_pagarToGets($this->documento_cuenta_pagars,$this->datosCliente);
		
		foreach ($this->documento_cuenta_pagars as $documento_cuenta_pagarLocal ) {
			documento_cuenta_pagar_logic_add::updatedocumento_cuenta_pagarToGet($documento_cuenta_pagarLocal);
		}
		*/
		
		return $this->documento_cuenta_pagars;
	}
	
	public function setdocumento_cuenta_pagars(array $newdocumento_cuenta_pagars) {
		$this->documento_cuenta_pagars = $newdocumento_cuenta_pagars;
	}
	
	public function getdocumento_cuenta_pagarDataAccess() : documento_cuenta_pagar_data {
		return $this->documento_cuenta_pagarDataAccess;
	}
	
	public function setdocumento_cuenta_pagarDataAccess(documento_cuenta_pagar_data $newdocumento_cuenta_pagarDataAccess) {
		$this->documento_cuenta_pagarDataAccess = $newdocumento_cuenta_pagarDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        documento_cuenta_pagar_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		orden_compra_detalle_logic::$logger;
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
