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

namespace com\bydan\contabilidad\inventario\devolucion\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\devolucion\util\devolucion_carga;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_param_return;

use com\bydan\contabilidad\inventario\devolucion\presentation\session\devolucion_session;

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

use com\bydan\contabilidad\inventario\devolucion\util\devolucion_util;
use com\bydan\contabilidad\inventario\devolucion\business\entity\devolucion;
use com\bydan\contabilidad\inventario\devolucion\business\data\devolucion_data;

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

use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\business\data\vendedor_data;
use com\bydan\contabilidad\facturacion\vendedor\business\logic\vendedor_logic;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\data\termino_pago_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;

use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;
use com\bydan\contabilidad\contabilidad\moneda\business\data\moneda_data;
use com\bydan\contabilidad\contabilidad\moneda\business\logic\moneda_logic;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\data\estado_data;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_util;

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\data\asiento_data;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\entity\documento_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\data\documento_cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\logic\documento_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_util;

use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;
use com\bydan\contabilidad\inventario\kardex\business\data\kardex_data;
use com\bydan\contabilidad\inventario\kardex\business\logic\kardex_logic;
use com\bydan\contabilidad\inventario\kardex\util\kardex_util;

//REL


use com\bydan\contabilidad\inventario\devolucion_detalle\business\entity\devolucion_detalle;
use com\bydan\contabilidad\inventario\devolucion_detalle\business\data\devolucion_detalle_data;
use com\bydan\contabilidad\inventario\devolucion_detalle\business\logic\devolucion_detalle_logic;
use com\bydan\contabilidad\inventario\devolucion_detalle\util\devolucion_detalle_carga;
use com\bydan\contabilidad\inventario\devolucion_detalle\util\devolucion_detalle_util;

//REL DETALLES




class devolucion_logic  extends GeneralEntityLogic implements devolucion_logicI {	
	/*GENERAL*/
	public devolucion_data $devolucionDataAccess;
	public ?devolucion_logic_add $devolucionLogicAdditional=null;
	public ?devolucion $devolucion;
	public array $devolucions;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->devolucionDataAccess = new devolucion_data();			
			$this->devolucions = array();
			$this->devolucion = new devolucion();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->devolucionLogicAdditional = new devolucion_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->devolucionLogicAdditional==null) {
			$this->devolucionLogicAdditional=new devolucion_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->devolucionDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->devolucionDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->devolucionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->devolucionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->devolucions = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucions);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->devolucions = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucions);
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
		$this->devolucion = new devolucion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->devolucion=$this->devolucionDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->devolucion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				devolucion_util::refrescarFKDescripcion($this->devolucion);
			}
						
			devolucion_logic_add::checkdevolucionToGet($this->devolucion,$this->datosCliente);
			devolucion_logic_add::updatedevolucionToGet($this->devolucion);
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
		$this->devolucion = new  devolucion();
		  		  
        try {		
			$this->devolucion=$this->devolucionDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->devolucion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				devolucion_util::refrescarFKDescripcion($this->devolucion);
			}
			
			devolucion_logic_add::checkdevolucionToGet($this->devolucion,$this->datosCliente);
			devolucion_logic_add::updatedevolucionToGet($this->devolucion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?devolucion {
		$devolucionLogic = new  devolucion_logic();
		  		  
        try {		
			$devolucionLogic->setConnexion($connexion);			
			$devolucionLogic->getEntity($id);			
			return $devolucionLogic->getdevolucion();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->devolucion = new  devolucion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->devolucion=$this->devolucionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->devolucion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				devolucion_util::refrescarFKDescripcion($this->devolucion);
			}
			
			devolucion_logic_add::checkdevolucionToGet($this->devolucion,$this->datosCliente);
			devolucion_logic_add::updatedevolucionToGet($this->devolucion);
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
		$this->devolucion = new  devolucion();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucion=$this->devolucionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->devolucion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				devolucion_util::refrescarFKDescripcion($this->devolucion);
			}
			
			devolucion_logic_add::checkdevolucionToGet($this->devolucion,$this->datosCliente);
			devolucion_logic_add::updatedevolucionToGet($this->devolucion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?devolucion {
		$devolucionLogic = new  devolucion_logic();
		  		  
        try {		
			$devolucionLogic->setConnexion($connexion);			
			$devolucionLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $devolucionLogic->getdevolucion();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->devolucions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucions);			
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
		$this->devolucions = array();
		  		  
        try {			
			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->devolucions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucions);
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
		$this->devolucions = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$devolucionLogic = new  devolucion_logic();
		  		  
        try {		
			$devolucionLogic->setConnexion($connexion);			
			$devolucionLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $devolucionLogic->getdevolucions();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->devolucions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->devolucions=$this->devolucionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucions);
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
		$this->devolucions = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucions=$this->devolucionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucions);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->devolucions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->devolucions=$this->devolucionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucions);
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
		$this->devolucions = array();
		  		  
        try {			
			$this->devolucions=$this->devolucionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}	
			
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->devolucions = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->devolucions=$this->devolucionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucions);
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
		$this->devolucions = array();
		  		  
        try {		
			$this->devolucions=$this->devolucionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->devolucions);

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
			$parameterSelectionGeneralid_asiento->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento,devolucion_util::$ID_ASIENTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);

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
			$parameterSelectionGeneralid_asiento->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento,devolucion_util::$ID_ASIENTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Iddocumento_cuenta_pagarWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_documento_cuenta_pagar) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_documento_cuenta_pagar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_documento_cuenta_pagar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_cuenta_pagar,devolucion_util::$ID_DOCUMENTO_CUENTA_PAGAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_cuenta_pagar);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Iddocumento_cuenta_pagar(string $strFinalQuery,Pagination $pagination,?int $id_documento_cuenta_pagar) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_documento_cuenta_pagar= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_documento_cuenta_pagar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_cuenta_pagar,devolucion_util::$ID_DOCUMENTO_CUENTA_PAGAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_cuenta_pagar);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);
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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,devolucion_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,devolucion_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,devolucion_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,devolucion_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);
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
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,devolucion_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);

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
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,devolucion_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);
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
			$parameterSelectionGeneralid_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_kardex,devolucion_util::$ID_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_kardex);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);

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
			$parameterSelectionGeneralid_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_kardex,devolucion_util::$ID_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_kardex);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);
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
			$parameterSelectionGeneralid_moneda->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_moneda,devolucion_util::$ID_MONEDA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_moneda);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);

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
			$parameterSelectionGeneralid_moneda->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_moneda,devolucion_util::$ID_MONEDA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_moneda);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);
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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,devolucion_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);

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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,devolucion_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);
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
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,devolucion_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);

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
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,devolucion_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);
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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,devolucion_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);

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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,devolucion_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idtermino_pagoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_termino_pago_proveedor) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_termino_pago_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_termino_pago_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_proveedor,devolucion_util::$ID_TERMINO_PAGO_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_proveedor);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtermino_pago(string $strFinalQuery,Pagination $pagination,int $id_termino_pago_proveedor) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_termino_pago_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_termino_pago_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_proveedor,devolucion_util::$ID_TERMINO_PAGO_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_proveedor);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,devolucion_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,devolucion_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);
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
			$parameterSelectionGeneralid_vendedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_vendedor,devolucion_util::$ID_VENDEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_vendedor);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);

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
			$parameterSelectionGeneralid_vendedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_vendedor,devolucion_util::$ID_VENDEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_vendedor);

			$this->devolucions=$this->devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->devolucions);
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
						
			//devolucion_logic_add::checkdevolucionToSave($this->devolucion,$this->datosCliente,$this->connexion);	       
			devolucion_logic_add::updatedevolucionToSave($this->devolucion);			
			devolucion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->devolucion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->devolucionLogicAdditional->checkGeneralEntityToSave($this,$this->devolucion,$this->datosCliente,$this->connexion);
			
			
			devolucion_data::save($this->devolucion, $this->connexion);	    	       	 				
			//devolucion_logic_add::checkdevolucionToSaveAfter($this->devolucion,$this->datosCliente,$this->connexion);			
			$this->devolucionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->devolucion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->devolucion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->devolucion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				devolucion_util::refrescarFKDescripcion($this->devolucion);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->devolucion->getIsDeleted()) {
				$this->devolucion=null;
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
						
			/*devolucion_logic_add::checkdevolucionToSave($this->devolucion,$this->datosCliente,$this->connexion);*/	        
			devolucion_logic_add::updatedevolucionToSave($this->devolucion);			
			$this->devolucionLogicAdditional->checkGeneralEntityToSave($this,$this->devolucion,$this->datosCliente,$this->connexion);			
			devolucion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->devolucion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			devolucion_data::save($this->devolucion, $this->connexion);	    	       	 						
			/*devolucion_logic_add::checkdevolucionToSaveAfter($this->devolucion,$this->datosCliente,$this->connexion);*/			
			$this->devolucionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->devolucion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->devolucion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->devolucion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				devolucion_util::refrescarFKDescripcion($this->devolucion);				
			}
			
			if($this->devolucion->getIsDeleted()) {
				$this->devolucion=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(devolucion $devolucion,Connexion $connexion)  {
		$devolucionLogic = new  devolucion_logic();		  		  
        try {		
			$devolucionLogic->setConnexion($connexion);			
			$devolucionLogic->setdevolucion($devolucion);			
			$devolucionLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*devolucion_logic_add::checkdevolucionToSaves($this->devolucions,$this->datosCliente,$this->connexion);*/	        	
			$this->devolucionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->devolucions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->devolucions as $devolucionLocal) {				
								
				devolucion_logic_add::updatedevolucionToSave($devolucionLocal);	        	
				devolucion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$devolucionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				devolucion_data::save($devolucionLocal, $this->connexion);				
			}
			
			/*devolucion_logic_add::checkdevolucionToSavesAfter($this->devolucions,$this->datosCliente,$this->connexion);*/			
			$this->devolucionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->devolucions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_util::refrescarFKDescripciones($this->devolucions);
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
			/*devolucion_logic_add::checkdevolucionToSaves($this->devolucions,$this->datosCliente,$this->connexion);*/			
			$this->devolucionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->devolucions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->devolucions as $devolucionLocal) {				
								
				devolucion_logic_add::updatedevolucionToSave($devolucionLocal);	        	
				devolucion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$devolucionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				devolucion_data::save($devolucionLocal, $this->connexion);				
			}			
			
			/*devolucion_logic_add::checkdevolucionToSavesAfter($this->devolucions,$this->datosCliente,$this->connexion);*/			
			$this->devolucionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->devolucions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				devolucion_util::refrescarFKDescripciones($this->devolucions);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $devolucions,Connexion $connexion)  {
		$devolucionLogic = new  devolucion_logic();
		  		  
        try {		
			$devolucionLogic->setConnexion($connexion);			
			$devolucionLogic->setdevolucions($devolucions);			
			$devolucionLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$devolucionsAux=array();
		
		foreach($this->devolucions as $devolucion) {
			if($devolucion->getIsDeleted()==false) {
				$devolucionsAux[]=$devolucion;
			}
		}
		
		$this->devolucions=$devolucionsAux;
	}
	
	public function updateToGetsAuxiliar(array &$devolucions) {
		if($this->devolucionLogicAdditional==null) {
			$this->devolucionLogicAdditional=new devolucion_logic_add();
		}
		
		
		$this->devolucionLogicAdditional->updateToGets($devolucions,$this);					
		$this->devolucionLogicAdditional->updateToGetsReferencia($devolucions,$this);			
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->devolucions as $devolucion) {
				
				$devolucion->setid_empresa_Descripcion(devolucion_util::getempresaDescripcion($devolucion->getempresa()));
				$devolucion->setid_sucursal_Descripcion(devolucion_util::getsucursalDescripcion($devolucion->getsucursal()));
				$devolucion->setid_ejercicio_Descripcion(devolucion_util::getejercicioDescripcion($devolucion->getejercicio()));
				$devolucion->setid_periodo_Descripcion(devolucion_util::getperiodoDescripcion($devolucion->getperiodo()));
				$devolucion->setid_usuario_Descripcion(devolucion_util::getusuarioDescripcion($devolucion->getusuario()));
				$devolucion->setid_proveedor_Descripcion(devolucion_util::getproveedorDescripcion($devolucion->getproveedor()));
				$devolucion->setid_vendedor_Descripcion(devolucion_util::getvendedorDescripcion($devolucion->getvendedor()));
				$devolucion->setid_termino_pago_proveedor_Descripcion(devolucion_util::gettermino_pago_proveedorDescripcion($devolucion->gettermino_pago_proveedor()));
				$devolucion->setid_moneda_Descripcion(devolucion_util::getmonedaDescripcion($devolucion->getmoneda()));
				$devolucion->setid_estado_Descripcion(devolucion_util::getestadoDescripcion($devolucion->getestado()));
				$devolucion->setid_asiento_Descripcion(devolucion_util::getasientoDescripcion($devolucion->getasiento()));
				$devolucion->setid_documento_cuenta_pagar_Descripcion(devolucion_util::getdocumento_cuenta_pagarDescripcion($devolucion->getdocumento_cuenta_pagar()));
				$devolucion->setid_kardex_Descripcion(devolucion_util::getkardexDescripcion($devolucion->getkardex()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$devolucion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$devolucion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$devolucion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$devolucionForeignKey=new devolucion_param_return();//devolucionForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosproveedorsFK($this->connexion,$strRecargarFkQuery,$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_vendedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosvendedorsFK($this->connexion,$strRecargarFkQuery,$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_termino_pago_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombostermino_pago_proveedorsFK($this->connexion,$strRecargarFkQuery,$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_moneda',$strRecargarFkTipos,',')) {
				$this->cargarCombosmonedasFK($this->connexion,$strRecargarFkQuery,$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado',$strRecargarFkTipos,',')) {
				$this->cargarCombosestadosFK($this->connexion,$strRecargarFkQuery,$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_asiento',$strRecargarFkTipos,',')) {
				$this->cargarCombosasientosFK($this->connexion,$strRecargarFkQuery,$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_documento_cuenta_pagar',$strRecargarFkTipos,',')) {
				$this->cargarCombosdocumento_cuenta_pagarsFK($this->connexion,$strRecargarFkQuery,$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_kardex',$strRecargarFkTipos,',')) {
				$this->cargarComboskardexsFK($this->connexion,$strRecargarFkQuery,$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproveedorsFK($this->connexion,' where id=-1 ',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_vendedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosvendedorsFK($this->connexion,' where id=-1 ',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_termino_pago_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostermino_pago_proveedorsFK($this->connexion,' where id=-1 ',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_moneda',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosmonedasFK($this->connexion,' where id=-1 ',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_estado',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosestadosFK($this->connexion,' where id=-1 ',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_asiento',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosasientosFK($this->connexion,' where id=-1 ',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_documento_cuenta_pagar',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosdocumento_cuenta_pagarsFK($this->connexion,' where id=-1 ',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_kardex',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboskardexsFK($this->connexion,' where id=-1 ',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $devolucionForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$devolucionForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_session==null) {
			$devolucion_session=new devolucion_session();
		}
		
		if($devolucion_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($devolucionForeignKey->idempresaDefaultFK==0) {
					$devolucionForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$devolucionForeignKey->empresasFK[$empresaLocal->getId()]=devolucion_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($devolucion_session->bigidempresaActual!=null && $devolucion_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($devolucion_session->bigidempresaActual);//WithConnection

				$devolucionForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=devolucion_util::getempresaDescripcion($empresaLogic->getempresa());
				$devolucionForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$devolucionForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_session==null) {
			$devolucion_session=new devolucion_session();
		}
		
		if($devolucion_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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
				if($devolucionForeignKey->idsucursalDefaultFK==0) {
					$devolucionForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$devolucionForeignKey->sucursalsFK[$sucursalLocal->getId()]=devolucion_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($devolucion_session->bigidsucursalActual!=null && $devolucion_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($devolucion_session->bigidsucursalActual);//WithConnection

				$devolucionForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=devolucion_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$devolucionForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$devolucionForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_session==null) {
			$devolucion_session=new devolucion_session();
		}
		
		if($devolucion_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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
				if($devolucionForeignKey->idejercicioDefaultFK==0) {
					$devolucionForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$devolucionForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=devolucion_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($devolucion_session->bigidejercicioActual!=null && $devolucion_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($devolucion_session->bigidejercicioActual);//WithConnection

				$devolucionForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=devolucion_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$devolucionForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$devolucionForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_session==null) {
			$devolucion_session=new devolucion_session();
		}
		
		if($devolucion_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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
				if($devolucionForeignKey->idperiodoDefaultFK==0) {
					$devolucionForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$devolucionForeignKey->periodosFK[$periodoLocal->getId()]=devolucion_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($devolucion_session->bigidperiodoActual!=null && $devolucion_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($devolucion_session->bigidperiodoActual);//WithConnection

				$devolucionForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=devolucion_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$devolucionForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$devolucionForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_session==null) {
			$devolucion_session=new devolucion_session();
		}
		
		if($devolucion_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($devolucionForeignKey->idusuarioDefaultFK==0) {
					$devolucionForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$devolucionForeignKey->usuariosFK[$usuarioLocal->getId()]=devolucion_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($devolucion_session->bigidusuarioActual!=null && $devolucion_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($devolucion_session->bigidusuarioActual);//WithConnection

				$devolucionForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=devolucion_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$devolucionForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosproveedorsFK($connexion=null,$strRecargarFkQuery='',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$proveedorLogic= new proveedor_logic();
		$pagination= new Pagination();
		$devolucionForeignKey->proveedorsFK=array();

		$proveedorLogic->setConnexion($connexion);
		$proveedorLogic->getproveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_session==null) {
			$devolucion_session=new devolucion_session();
		}
		
		if($devolucion_session->bitBusquedaDesdeFKSesionproveedor!=true) {
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
				if($devolucionForeignKey->idproveedorDefaultFK==0) {
					$devolucionForeignKey->idproveedorDefaultFK=$proveedorLocal->getId();
				}

				$devolucionForeignKey->proveedorsFK[$proveedorLocal->getId()]=devolucion_util::getproveedorDescripcion($proveedorLocal);
			}

		} else {

			if($devolucion_session->bigidproveedorActual!=null && $devolucion_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($devolucion_session->bigidproveedorActual);//WithConnection

				$devolucionForeignKey->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=devolucion_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$devolucionForeignKey->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	public function cargarCombosvendedorsFK($connexion=null,$strRecargarFkQuery='',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$vendedorLogic= new vendedor_logic();
		$pagination= new Pagination();
		$devolucionForeignKey->vendedorsFK=array();

		$vendedorLogic->setConnexion($connexion);
		$vendedorLogic->getvendedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_session==null) {
			$devolucion_session=new devolucion_session();
		}
		
		if($devolucion_session->bitBusquedaDesdeFKSesionvendedor!=true) {
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
				if($devolucionForeignKey->idvendedorDefaultFK==0) {
					$devolucionForeignKey->idvendedorDefaultFK=$vendedorLocal->getId();
				}

				$devolucionForeignKey->vendedorsFK[$vendedorLocal->getId()]=devolucion_util::getvendedorDescripcion($vendedorLocal);
			}

		} else {

			if($devolucion_session->bigidvendedorActual!=null && $devolucion_session->bigidvendedorActual > 0) {
				$vendedorLogic->getEntity($devolucion_session->bigidvendedorActual);//WithConnection

				$devolucionForeignKey->vendedorsFK[$vendedorLogic->getvendedor()->getId()]=devolucion_util::getvendedorDescripcion($vendedorLogic->getvendedor());
				$devolucionForeignKey->idvendedorDefaultFK=$vendedorLogic->getvendedor()->getId();
			}
		}
	}

	public function cargarCombostermino_pago_proveedorsFK($connexion=null,$strRecargarFkQuery='',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic();
		$pagination= new Pagination();
		$devolucionForeignKey->termino_pago_proveedorsFK=array();

		$termino_pago_proveedorLogic->setConnexion($connexion);
		$termino_pago_proveedorLogic->gettermino_pago_proveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_session==null) {
			$devolucion_session=new devolucion_session();
		}
		
		if($devolucion_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor!=true) {
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
				if($devolucionForeignKey->idtermino_pago_proveedorDefaultFK==0) {
					$devolucionForeignKey->idtermino_pago_proveedorDefaultFK=$termino_pago_proveedorLocal->getId();
				}

				$devolucionForeignKey->termino_pago_proveedorsFK[$termino_pago_proveedorLocal->getId()]=devolucion_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLocal);
			}

		} else {

			if($devolucion_session->bigidtermino_pago_proveedorActual!=null && $devolucion_session->bigidtermino_pago_proveedorActual > 0) {
				$termino_pago_proveedorLogic->getEntity($devolucion_session->bigidtermino_pago_proveedorActual);//WithConnection

				$devolucionForeignKey->termino_pago_proveedorsFK[$termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId()]=devolucion_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLogic->gettermino_pago_proveedor());
				$devolucionForeignKey->idtermino_pago_proveedorDefaultFK=$termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId();
			}
		}
	}

	public function cargarCombosmonedasFK($connexion=null,$strRecargarFkQuery='',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$monedaLogic= new moneda_logic();
		$pagination= new Pagination();
		$devolucionForeignKey->monedasFK=array();

		$monedaLogic->setConnexion($connexion);
		$monedaLogic->getmonedaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_session==null) {
			$devolucion_session=new devolucion_session();
		}
		
		if($devolucion_session->bitBusquedaDesdeFKSesionmoneda!=true) {
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
				if($devolucionForeignKey->idmonedaDefaultFK==0) {
					$devolucionForeignKey->idmonedaDefaultFK=$monedaLocal->getId();
				}

				$devolucionForeignKey->monedasFK[$monedaLocal->getId()]=devolucion_util::getmonedaDescripcion($monedaLocal);
			}

		} else {

			if($devolucion_session->bigidmonedaActual!=null && $devolucion_session->bigidmonedaActual > 0) {
				$monedaLogic->getEntity($devolucion_session->bigidmonedaActual);//WithConnection

				$devolucionForeignKey->monedasFK[$monedaLogic->getmoneda()->getId()]=devolucion_util::getmonedaDescripcion($monedaLogic->getmoneda());
				$devolucionForeignKey->idmonedaDefaultFK=$monedaLogic->getmoneda()->getId();
			}
		}
	}

	public function cargarCombosestadosFK($connexion=null,$strRecargarFkQuery='',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$estadoLogic= new estado_logic();
		$pagination= new Pagination();
		$devolucionForeignKey->estadosFK=array();

		$estadoLogic->setConnexion($connexion);
		$estadoLogic->getestadoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_session==null) {
			$devolucion_session=new devolucion_session();
		}
		
		if($devolucion_session->bitBusquedaDesdeFKSesionestado!=true) {
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
				if($devolucionForeignKey->idestadoDefaultFK==0) {
					$devolucionForeignKey->idestadoDefaultFK=$estadoLocal->getId();
				}

				$devolucionForeignKey->estadosFK[$estadoLocal->getId()]=devolucion_util::getestadoDescripcion($estadoLocal);
			}

		} else {

			if($devolucion_session->bigidestadoActual!=null && $devolucion_session->bigidestadoActual > 0) {
				$estadoLogic->getEntity($devolucion_session->bigidestadoActual);//WithConnection

				$devolucionForeignKey->estadosFK[$estadoLogic->getestado()->getId()]=devolucion_util::getestadoDescripcion($estadoLogic->getestado());
				$devolucionForeignKey->idestadoDefaultFK=$estadoLogic->getestado()->getId();
			}
		}
	}

	public function cargarCombosasientosFK($connexion=null,$strRecargarFkQuery='',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$asientoLogic= new asiento_logic();
		$pagination= new Pagination();
		$devolucionForeignKey->asientosFK=array();

		$asientoLogic->setConnexion($connexion);
		$asientoLogic->getasientoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_session==null) {
			$devolucion_session=new devolucion_session();
		}
		
		if($devolucion_session->bitBusquedaDesdeFKSesionasiento!=true) {
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
				if($devolucionForeignKey->idasientoDefaultFK==0) {
					$devolucionForeignKey->idasientoDefaultFK=$asientoLocal->getId();
				}

				$devolucionForeignKey->asientosFK[$asientoLocal->getId()]=devolucion_util::getasientoDescripcion($asientoLocal);
			}

		} else {

			if($devolucion_session->bigidasientoActual!=null && $devolucion_session->bigidasientoActual > 0) {
				$asientoLogic->getEntity($devolucion_session->bigidasientoActual);//WithConnection

				$devolucionForeignKey->asientosFK[$asientoLogic->getasiento()->getId()]=devolucion_util::getasientoDescripcion($asientoLogic->getasiento());
				$devolucionForeignKey->idasientoDefaultFK=$asientoLogic->getasiento()->getId();
			}
		}
	}

	public function cargarCombosdocumento_cuenta_pagarsFK($connexion=null,$strRecargarFkQuery='',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$documento_cuenta_pagarLogic= new documento_cuenta_pagar_logic();
		$pagination= new Pagination();
		$devolucionForeignKey->documento_cuenta_pagarsFK=array();

		$documento_cuenta_pagarLogic->setConnexion($connexion);
		$documento_cuenta_pagarLogic->getdocumento_cuenta_pagarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_session==null) {
			$devolucion_session=new devolucion_session();
		}
		
		if($devolucion_session->bitBusquedaDesdeFKSesiondocumento_cuenta_pagar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=documento_cuenta_pagar_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaldocumento_cuenta_pagar=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaldocumento_cuenta_pagar=Funciones::GetFinalQueryAppend($finalQueryGlobaldocumento_cuenta_pagar, '');
				$finalQueryGlobaldocumento_cuenta_pagar.=documento_cuenta_pagar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaldocumento_cuenta_pagar.$strRecargarFkQuery;		

				$documento_cuenta_pagarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($documento_cuenta_pagarLogic->getdocumento_cuenta_pagars() as $documento_cuenta_pagarLocal ) {
				if($devolucionForeignKey->iddocumento_cuenta_pagarDefaultFK==0) {
					$devolucionForeignKey->iddocumento_cuenta_pagarDefaultFK=$documento_cuenta_pagarLocal->getId();
				}

				$devolucionForeignKey->documento_cuenta_pagarsFK[$documento_cuenta_pagarLocal->getId()]=devolucion_util::getdocumento_cuenta_pagarDescripcion($documento_cuenta_pagarLocal);
			}

		} else {

			if($devolucion_session->bigiddocumento_cuenta_pagarActual!=null && $devolucion_session->bigiddocumento_cuenta_pagarActual > 0) {
				$documento_cuenta_pagarLogic->getEntity($devolucion_session->bigiddocumento_cuenta_pagarActual);//WithConnection

				$devolucionForeignKey->documento_cuenta_pagarsFK[$documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getId()]=devolucion_util::getdocumento_cuenta_pagarDescripcion($documento_cuenta_pagarLogic->getdocumento_cuenta_pagar());
				$devolucionForeignKey->iddocumento_cuenta_pagarDefaultFK=$documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getId();
			}
		}
	}

	public function cargarComboskardexsFK($connexion=null,$strRecargarFkQuery='',$devolucionForeignKey,$devolucion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$kardexLogic= new kardex_logic();
		$pagination= new Pagination();
		$devolucionForeignKey->kardexsFK=array();

		$kardexLogic->setConnexion($connexion);
		$kardexLogic->getkardexDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($devolucion_session==null) {
			$devolucion_session=new devolucion_session();
		}
		
		if($devolucion_session->bitBusquedaDesdeFKSesionkardex!=true) {
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
				if($devolucionForeignKey->idkardexDefaultFK==0) {
					$devolucionForeignKey->idkardexDefaultFK=$kardexLocal->getId();
				}

				$devolucionForeignKey->kardexsFK[$kardexLocal->getId()]=devolucion_util::getkardexDescripcion($kardexLocal);
			}

		} else {

			if($devolucion_session->bigidkardexActual!=null && $devolucion_session->bigidkardexActual > 0) {
				$kardexLogic->getEntity($devolucion_session->bigidkardexActual);//WithConnection

				$devolucionForeignKey->kardexsFK[$kardexLogic->getkardex()->getId()]=devolucion_util::getkardexDescripcion($kardexLogic->getkardex());
				$devolucionForeignKey->idkardexDefaultFK=$kardexLogic->getkardex()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($devolucion,$devoluciondetalles) {
		$this->saveRelacionesBase($devolucion,$devoluciondetalles,true);
	}

	public function saveRelaciones($devolucion,$devoluciondetalles) {
		$this->saveRelacionesBase($devolucion,$devoluciondetalles,false);
	}

	public function saveRelacionesBase($devolucion,$devoluciondetalles=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$devolucion->setdevolucion_detalles($devoluciondetalles);
			$this->setdevolucion($devolucion);

			if(devolucion_logic_add::validarSaveRelaciones($devolucion,$this)) {

				devolucion_logic_add::updateRelacionesToSave($devolucion,$this);

				if(($this->devolucion->getIsNew() || $this->devolucion->getIsChanged()) && !$this->devolucion->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($devoluciondetalles);

				} else if($this->devolucion->getIsDeleted()) {
					$this->saveRelacionesDetalles($devoluciondetalles);
					$this->save();
				}

				devolucion_logic_add::updateRelacionesToSaveAfter($devolucion,$this);

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
	
	
	public function saveRelacionesDetalles($devoluciondetalles=array()) {
		try {
	

			$iddevolucionActual=$this->getdevolucion()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/devolucion_detalle_carga.php');
			devolucion_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$devoluciondetalleLogic_Desde_devolucion=new devolucion_detalle_logic();
			$devoluciondetalleLogic_Desde_devolucion->setdevolucion_detalles($devoluciondetalles);

			$devoluciondetalleLogic_Desde_devolucion->setConnexion($this->getConnexion());
			$devoluciondetalleLogic_Desde_devolucion->setDatosCliente($this->datosCliente);

			foreach($devoluciondetalleLogic_Desde_devolucion->getdevolucion_detalles() as $devoluciondetalle_Desde_devolucion) {
				$devoluciondetalle_Desde_devolucion->setid_devolucion($iddevolucionActual);
			}

			$devoluciondetalleLogic_Desde_devolucion->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $devolucions,devolucion_param_return $devolucionParameterGeneral) : devolucion_param_return {
		$devolucionReturnGeneral=new devolucion_param_return();
	
		 try {	
			
			if($this->devolucionLogicAdditional==null) {
				$this->devolucionLogicAdditional=new devolucion_logic_add();
			}
			
			$this->devolucionLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$devolucions,$devolucionParameterGeneral,$devolucionReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $devolucionReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $devolucions,devolucion_param_return $devolucionParameterGeneral) : devolucion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$devolucionReturnGeneral=new devolucion_param_return();
	
			
			if($this->devolucionLogicAdditional==null) {
				$this->devolucionLogicAdditional=new devolucion_logic_add();
			}
			
			$this->devolucionLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$devolucions,$devolucionParameterGeneral,$devolucionReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $devolucionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $devolucions,devolucion $devolucion,devolucion_param_return $devolucionParameterGeneral,bool $isEsNuevodevolucion,array $clases) : devolucion_param_return {
		 try {	
			$devolucionReturnGeneral=new devolucion_param_return();
	
			$devolucionReturnGeneral->setdevolucion($devolucion);
			$devolucionReturnGeneral->setdevolucions($devolucions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$devolucionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->devolucionLogicAdditional==null) {
				$this->devolucionLogicAdditional=new devolucion_logic_add();
			}
			
			$devolucionReturnGeneral=$this->devolucionLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$devolucions,$devolucion,$devolucionParameterGeneral,$devolucionReturnGeneral,$isEsNuevodevolucion,$clases);
			
			/*devolucionLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$devolucions,$devolucion,$devolucionParameterGeneral,$devolucionReturnGeneral,$isEsNuevodevolucion,$clases);*/
			
			return $devolucionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $devolucions,devolucion $devolucion,devolucion_param_return $devolucionParameterGeneral,bool $isEsNuevodevolucion,array $clases) : devolucion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$devolucionReturnGeneral=new devolucion_param_return();
	
			$devolucionReturnGeneral->setdevolucion($devolucion);
			$devolucionReturnGeneral->setdevolucions($devolucions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$devolucionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->devolucionLogicAdditional==null) {
				$this->devolucionLogicAdditional=new devolucion_logic_add();
			}
			
			$devolucionReturnGeneral=$this->devolucionLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$devolucions,$devolucion,$devolucionParameterGeneral,$devolucionReturnGeneral,$isEsNuevodevolucion,$clases);
			
			/*devolucionLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$devolucions,$devolucion,$devolucionParameterGeneral,$devolucionReturnGeneral,$isEsNuevodevolucion,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $devolucionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $devolucions,devolucion $devolucion,devolucion_param_return $devolucionParameterGeneral,bool $isEsNuevodevolucion,array $clases) : devolucion_param_return {
		 try {	
			$devolucionReturnGeneral=new devolucion_param_return();
	
			$devolucionReturnGeneral->setdevolucion($devolucion);
			$devolucionReturnGeneral->setdevolucions($devolucions);
			
			
			
			if($this->devolucionLogicAdditional==null) {
				$this->devolucionLogicAdditional=new devolucion_logic_add();
			}
			
			$devolucionReturnGeneral=$this->devolucionLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$devolucions,$devolucion,$devolucionParameterGeneral,$devolucionReturnGeneral,$isEsNuevodevolucion,$clases);
			
			/*devolucionLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$devolucions,$devolucion,$devolucionParameterGeneral,$devolucionReturnGeneral,$isEsNuevodevolucion,$clases);*/
			
			return $devolucionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $devolucions,devolucion $devolucion,devolucion_param_return $devolucionParameterGeneral,bool $isEsNuevodevolucion,array $clases) : devolucion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$devolucionReturnGeneral=new devolucion_param_return();
	
			$devolucionReturnGeneral->setdevolucion($devolucion);
			$devolucionReturnGeneral->setdevolucions($devolucions);
			
			
			if($this->devolucionLogicAdditional==null) {
				$this->devolucionLogicAdditional=new devolucion_logic_add();
			}
			
			$devolucionReturnGeneral=$this->devolucionLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$devolucions,$devolucion,$devolucionParameterGeneral,$devolucionReturnGeneral,$isEsNuevodevolucion,$clases);
			
			/*devolucionLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$devolucions,$devolucion,$devolucionParameterGeneral,$devolucionReturnGeneral,$isEsNuevodevolucion,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $devolucionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,devolucion $devolucion,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,devolucion $devolucion,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		devolucion_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		devolucion_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(devolucion $devolucion,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			devolucion_logic_add::updatedevolucionToGet($this->devolucion);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$devolucion->setempresa($this->devolucionDataAccess->getempresa($this->connexion,$devolucion));
		$devolucion->setsucursal($this->devolucionDataAccess->getsucursal($this->connexion,$devolucion));
		$devolucion->setejercicio($this->devolucionDataAccess->getejercicio($this->connexion,$devolucion));
		$devolucion->setperiodo($this->devolucionDataAccess->getperiodo($this->connexion,$devolucion));
		$devolucion->setusuario($this->devolucionDataAccess->getusuario($this->connexion,$devolucion));
		$devolucion->setproveedor($this->devolucionDataAccess->getproveedor($this->connexion,$devolucion));
		$devolucion->setvendedor($this->devolucionDataAccess->getvendedor($this->connexion,$devolucion));
		$devolucion->settermino_pago_proveedor($this->devolucionDataAccess->gettermino_pago_proveedor($this->connexion,$devolucion));
		$devolucion->setmoneda($this->devolucionDataAccess->getmoneda($this->connexion,$devolucion));
		$devolucion->setestado($this->devolucionDataAccess->getestado($this->connexion,$devolucion));
		$devolucion->setasiento($this->devolucionDataAccess->getasiento($this->connexion,$devolucion));
		$devolucion->setdocumento_cuenta_pagar($this->devolucionDataAccess->getdocumento_cuenta_pagar($this->connexion,$devolucion));
		$devolucion->setkardex($this->devolucionDataAccess->getkardex($this->connexion,$devolucion));
		$devolucion->setdevolucion_detalles($this->devolucionDataAccess->getdevolucion_detalles($this->connexion,$devolucion));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$devolucion->setempresa($this->devolucionDataAccess->getempresa($this->connexion,$devolucion));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$devolucion->setsucursal($this->devolucionDataAccess->getsucursal($this->connexion,$devolucion));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$devolucion->setejercicio($this->devolucionDataAccess->getejercicio($this->connexion,$devolucion));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$devolucion->setperiodo($this->devolucionDataAccess->getperiodo($this->connexion,$devolucion));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$devolucion->setusuario($this->devolucionDataAccess->getusuario($this->connexion,$devolucion));
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$devolucion->setproveedor($this->devolucionDataAccess->getproveedor($this->connexion,$devolucion));
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				$devolucion->setvendedor($this->devolucionDataAccess->getvendedor($this->connexion,$devolucion));
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				$devolucion->settermino_pago_proveedor($this->devolucionDataAccess->gettermino_pago_proveedor($this->connexion,$devolucion));
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				$devolucion->setmoneda($this->devolucionDataAccess->getmoneda($this->connexion,$devolucion));
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$devolucion->setestado($this->devolucionDataAccess->getestado($this->connexion,$devolucion));
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				$devolucion->setasiento($this->devolucionDataAccess->getasiento($this->connexion,$devolucion));
				continue;
			}

			if($clas->clas==documento_cuenta_pagar::$class.'') {
				$devolucion->setdocumento_cuenta_pagar($this->devolucionDataAccess->getdocumento_cuenta_pagar($this->connexion,$devolucion));
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				$devolucion->setkardex($this->devolucionDataAccess->getkardex($this->connexion,$devolucion));
				continue;
			}

			if($clas->clas==devolucion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$devolucion->setdevolucion_detalles($this->devolucionDataAccess->getdevolucion_detalles($this->connexion,$devolucion));

				if($this->isConDeep) {
					$devoluciondetalleLogic= new devolucion_detalle_logic($this->connexion);
					$devoluciondetalleLogic->setdevolucion_detalles($devolucion->getdevolucion_detalles());
					$classesLocal=devolucion_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$devoluciondetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					devolucion_detalle_util::refrescarFKDescripciones($devoluciondetalleLogic->getdevolucion_detalles());
					$devolucion->setdevolucion_detalles($devoluciondetalleLogic->getdevolucion_detalles());
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
			$devolucion->setempresa($this->devolucionDataAccess->getempresa($this->connexion,$devolucion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setsucursal($this->devolucionDataAccess->getsucursal($this->connexion,$devolucion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setejercicio($this->devolucionDataAccess->getejercicio($this->connexion,$devolucion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setperiodo($this->devolucionDataAccess->getperiodo($this->connexion,$devolucion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setusuario($this->devolucionDataAccess->getusuario($this->connexion,$devolucion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setproveedor($this->devolucionDataAccess->getproveedor($this->connexion,$devolucion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setvendedor($this->devolucionDataAccess->getvendedor($this->connexion,$devolucion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->settermino_pago_proveedor($this->devolucionDataAccess->gettermino_pago_proveedor($this->connexion,$devolucion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setmoneda($this->devolucionDataAccess->getmoneda($this->connexion,$devolucion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setestado($this->devolucionDataAccess->getestado($this->connexion,$devolucion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setasiento($this->devolucionDataAccess->getasiento($this->connexion,$devolucion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setdocumento_cuenta_pagar($this->devolucionDataAccess->getdocumento_cuenta_pagar($this->connexion,$devolucion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setkardex($this->devolucionDataAccess->getkardex($this->connexion,$devolucion));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion_detalle::$class);
			$devolucion->setdevolucion_detalles($this->devolucionDataAccess->getdevolucion_detalles($this->connexion,$devolucion));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$devolucion->setempresa($this->devolucionDataAccess->getempresa($this->connexion,$devolucion));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($devolucion->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$devolucion->setsucursal($this->devolucionDataAccess->getsucursal($this->connexion,$devolucion));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($devolucion->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$devolucion->setejercicio($this->devolucionDataAccess->getejercicio($this->connexion,$devolucion));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($devolucion->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$devolucion->setperiodo($this->devolucionDataAccess->getperiodo($this->connexion,$devolucion));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($devolucion->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$devolucion->setusuario($this->devolucionDataAccess->getusuario($this->connexion,$devolucion));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($devolucion->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$devolucion->setproveedor($this->devolucionDataAccess->getproveedor($this->connexion,$devolucion));
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepLoad($devolucion->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		$devolucion->setvendedor($this->devolucionDataAccess->getvendedor($this->connexion,$devolucion));
		$vendedorLogic= new vendedor_logic($this->connexion);
		$vendedorLogic->deepLoad($devolucion->getvendedor(),$isDeep,$deepLoadType,$clases);
				
		$devolucion->settermino_pago_proveedor($this->devolucionDataAccess->gettermino_pago_proveedor($this->connexion,$devolucion));
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
		$termino_pago_proveedorLogic->deepLoad($devolucion->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases);
				
		$devolucion->setmoneda($this->devolucionDataAccess->getmoneda($this->connexion,$devolucion));
		$monedaLogic= new moneda_logic($this->connexion);
		$monedaLogic->deepLoad($devolucion->getmoneda(),$isDeep,$deepLoadType,$clases);
				
		$devolucion->setestado($this->devolucionDataAccess->getestado($this->connexion,$devolucion));
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepLoad($devolucion->getestado(),$isDeep,$deepLoadType,$clases);
				
		$devolucion->setasiento($this->devolucionDataAccess->getasiento($this->connexion,$devolucion));
		$asientoLogic= new asiento_logic($this->connexion);
		$asientoLogic->deepLoad($devolucion->getasiento(),$isDeep,$deepLoadType,$clases);
				
		$devolucion->setdocumento_cuenta_pagar($this->devolucionDataAccess->getdocumento_cuenta_pagar($this->connexion,$devolucion));
		$documento_cuenta_pagarLogic= new documento_cuenta_pagar_logic($this->connexion);
		$documento_cuenta_pagarLogic->deepLoad($devolucion->getdocumento_cuenta_pagar(),$isDeep,$deepLoadType,$clases);
				
		$devolucion->setkardex($this->devolucionDataAccess->getkardex($this->connexion,$devolucion));
		$kardexLogic= new kardex_logic($this->connexion);
		$kardexLogic->deepLoad($devolucion->getkardex(),$isDeep,$deepLoadType,$clases);
				

		$devolucion->setdevolucion_detalles($this->devolucionDataAccess->getdevolucion_detalles($this->connexion,$devolucion));

		foreach($devolucion->getdevolucion_detalles() as $devoluciondetalle) {
			$devoluciondetalleLogic= new devolucion_detalle_logic($this->connexion);
			$devoluciondetalleLogic->deepLoad($devoluciondetalle,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$devolucion->setempresa($this->devolucionDataAccess->getempresa($this->connexion,$devolucion));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($devolucion->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$devolucion->setsucursal($this->devolucionDataAccess->getsucursal($this->connexion,$devolucion));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($devolucion->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$devolucion->setejercicio($this->devolucionDataAccess->getejercicio($this->connexion,$devolucion));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($devolucion->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$devolucion->setperiodo($this->devolucionDataAccess->getperiodo($this->connexion,$devolucion));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($devolucion->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$devolucion->setusuario($this->devolucionDataAccess->getusuario($this->connexion,$devolucion));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($devolucion->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$devolucion->setproveedor($this->devolucionDataAccess->getproveedor($this->connexion,$devolucion));
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($devolucion->getproveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				$devolucion->setvendedor($this->devolucionDataAccess->getvendedor($this->connexion,$devolucion));
				$vendedorLogic= new vendedor_logic($this->connexion);
				$vendedorLogic->deepLoad($devolucion->getvendedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				$devolucion->settermino_pago_proveedor($this->devolucionDataAccess->gettermino_pago_proveedor($this->connexion,$devolucion));
				$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
				$termino_pago_proveedorLogic->deepLoad($devolucion->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				$devolucion->setmoneda($this->devolucionDataAccess->getmoneda($this->connexion,$devolucion));
				$monedaLogic= new moneda_logic($this->connexion);
				$monedaLogic->deepLoad($devolucion->getmoneda(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$devolucion->setestado($this->devolucionDataAccess->getestado($this->connexion,$devolucion));
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepLoad($devolucion->getestado(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				$devolucion->setasiento($this->devolucionDataAccess->getasiento($this->connexion,$devolucion));
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepLoad($devolucion->getasiento(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==documento_cuenta_pagar::$class.'') {
				$devolucion->setdocumento_cuenta_pagar($this->devolucionDataAccess->getdocumento_cuenta_pagar($this->connexion,$devolucion));
				$documento_cuenta_pagarLogic= new documento_cuenta_pagar_logic($this->connexion);
				$documento_cuenta_pagarLogic->deepLoad($devolucion->getdocumento_cuenta_pagar(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				$devolucion->setkardex($this->devolucionDataAccess->getkardex($this->connexion,$devolucion));
				$kardexLogic= new kardex_logic($this->connexion);
				$kardexLogic->deepLoad($devolucion->getkardex(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==devolucion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$devolucion->setdevolucion_detalles($this->devolucionDataAccess->getdevolucion_detalles($this->connexion,$devolucion));

				foreach($devolucion->getdevolucion_detalles() as $devoluciondetalle) {
					$devoluciondetalleLogic= new devolucion_detalle_logic($this->connexion);
					$devoluciondetalleLogic->deepLoad($devoluciondetalle,$isDeep,$deepLoadType,$clases);
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
			$devolucion->setempresa($this->devolucionDataAccess->getempresa($this->connexion,$devolucion));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($devolucion->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setsucursal($this->devolucionDataAccess->getsucursal($this->connexion,$devolucion));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($devolucion->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setejercicio($this->devolucionDataAccess->getejercicio($this->connexion,$devolucion));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($devolucion->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setperiodo($this->devolucionDataAccess->getperiodo($this->connexion,$devolucion));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($devolucion->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setusuario($this->devolucionDataAccess->getusuario($this->connexion,$devolucion));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($devolucion->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setproveedor($this->devolucionDataAccess->getproveedor($this->connexion,$devolucion));
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($devolucion->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setvendedor($this->devolucionDataAccess->getvendedor($this->connexion,$devolucion));
			$vendedorLogic= new vendedor_logic($this->connexion);
			$vendedorLogic->deepLoad($devolucion->getvendedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->settermino_pago_proveedor($this->devolucionDataAccess->gettermino_pago_proveedor($this->connexion,$devolucion));
			$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
			$termino_pago_proveedorLogic->deepLoad($devolucion->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setmoneda($this->devolucionDataAccess->getmoneda($this->connexion,$devolucion));
			$monedaLogic= new moneda_logic($this->connexion);
			$monedaLogic->deepLoad($devolucion->getmoneda(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setestado($this->devolucionDataAccess->getestado($this->connexion,$devolucion));
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepLoad($devolucion->getestado(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setasiento($this->devolucionDataAccess->getasiento($this->connexion,$devolucion));
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepLoad($devolucion->getasiento(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setdocumento_cuenta_pagar($this->devolucionDataAccess->getdocumento_cuenta_pagar($this->connexion,$devolucion));
			$documento_cuenta_pagarLogic= new documento_cuenta_pagar_logic($this->connexion);
			$documento_cuenta_pagarLogic->deepLoad($devolucion->getdocumento_cuenta_pagar(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$devolucion->setkardex($this->devolucionDataAccess->getkardex($this->connexion,$devolucion));
			$kardexLogic= new kardex_logic($this->connexion);
			$kardexLogic->deepLoad($devolucion->getkardex(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion_detalle::$class);
			$devolucion->setdevolucion_detalles($this->devolucionDataAccess->getdevolucion_detalles($this->connexion,$devolucion));

			foreach($devolucion->getdevolucion_detalles() as $devoluciondetalle) {
				$devoluciondetalleLogic= new devolucion_detalle_logic($this->connexion);
				$devoluciondetalleLogic->deepLoad($devoluciondetalle,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(devolucion $devolucion,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			devolucion_logic_add::updatedevolucionToSave($this->devolucion);			
			
			if(!$paraDeleteCascade) {				
				devolucion_data::save($devolucion, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($devolucion->getempresa(),$this->connexion);
		sucursal_data::save($devolucion->getsucursal(),$this->connexion);
		ejercicio_data::save($devolucion->getejercicio(),$this->connexion);
		periodo_data::save($devolucion->getperiodo(),$this->connexion);
		usuario_data::save($devolucion->getusuario(),$this->connexion);
		proveedor_data::save($devolucion->getproveedor(),$this->connexion);
		vendedor_data::save($devolucion->getvendedor(),$this->connexion);
		termino_pago_proveedor_data::save($devolucion->gettermino_pago_proveedor(),$this->connexion);
		moneda_data::save($devolucion->getmoneda(),$this->connexion);
		estado_data::save($devolucion->getestado(),$this->connexion);
		asiento_data::save($devolucion->getasiento(),$this->connexion);
		documento_cuenta_pagar_data::save($devolucion->getdocumento_cuenta_pagar(),$this->connexion);
		kardex_data::save($devolucion->getkardex(),$this->connexion);

		foreach($devolucion->getdevolucion_detalles() as $devoluciondetalle) {
			$devoluciondetalle->setid_devolucion($devolucion->getId());
			devolucion_detalle_data::save($devoluciondetalle,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($devolucion->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($devolucion->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($devolucion->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($devolucion->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($devolucion->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($devolucion->getproveedor(),$this->connexion);
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				vendedor_data::save($devolucion->getvendedor(),$this->connexion);
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				termino_pago_proveedor_data::save($devolucion->gettermino_pago_proveedor(),$this->connexion);
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				moneda_data::save($devolucion->getmoneda(),$this->connexion);
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($devolucion->getestado(),$this->connexion);
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				asiento_data::save($devolucion->getasiento(),$this->connexion);
				continue;
			}

			if($clas->clas==documento_cuenta_pagar::$class.'') {
				documento_cuenta_pagar_data::save($devolucion->getdocumento_cuenta_pagar(),$this->connexion);
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				kardex_data::save($devolucion->getkardex(),$this->connexion);
				continue;
			}


			if($clas->clas==devolucion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($devolucion->getdevolucion_detalles() as $devoluciondetalle) {
					$devoluciondetalle->setid_devolucion($devolucion->getId());
					devolucion_detalle_data::save($devoluciondetalle,$this->connexion);
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
			empresa_data::save($devolucion->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($devolucion->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($devolucion->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($devolucion->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($devolucion->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($devolucion->getproveedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			vendedor_data::save($devolucion->getvendedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_proveedor_data::save($devolucion->gettermino_pago_proveedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			moneda_data::save($devolucion->getmoneda(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($devolucion->getestado(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_data::save($devolucion->getasiento(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_cuenta_pagar_data::save($devolucion->getdocumento_cuenta_pagar(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			kardex_data::save($devolucion->getkardex(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion_detalle::$class);

			foreach($devolucion->getdevolucion_detalles() as $devoluciondetalle) {
				$devoluciondetalle->setid_devolucion($devolucion->getId());
				devolucion_detalle_data::save($devoluciondetalle,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($devolucion->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($devolucion->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($devolucion->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($devolucion->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($devolucion->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($devolucion->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($devolucion->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($devolucion->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($devolucion->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($devolucion->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		proveedor_data::save($devolucion->getproveedor(),$this->connexion);
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepSave($devolucion->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		vendedor_data::save($devolucion->getvendedor(),$this->connexion);
		$vendedorLogic= new vendedor_logic($this->connexion);
		$vendedorLogic->deepSave($devolucion->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		termino_pago_proveedor_data::save($devolucion->gettermino_pago_proveedor(),$this->connexion);
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
		$termino_pago_proveedorLogic->deepSave($devolucion->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		moneda_data::save($devolucion->getmoneda(),$this->connexion);
		$monedaLogic= new moneda_logic($this->connexion);
		$monedaLogic->deepSave($devolucion->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		estado_data::save($devolucion->getestado(),$this->connexion);
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepSave($devolucion->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		asiento_data::save($devolucion->getasiento(),$this->connexion);
		$asientoLogic= new asiento_logic($this->connexion);
		$asientoLogic->deepSave($devolucion->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		documento_cuenta_pagar_data::save($devolucion->getdocumento_cuenta_pagar(),$this->connexion);
		$documento_cuenta_pagarLogic= new documento_cuenta_pagar_logic($this->connexion);
		$documento_cuenta_pagarLogic->deepSave($devolucion->getdocumento_cuenta_pagar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		kardex_data::save($devolucion->getkardex(),$this->connexion);
		$kardexLogic= new kardex_logic($this->connexion);
		$kardexLogic->deepSave($devolucion->getkardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($devolucion->getdevolucion_detalles() as $devoluciondetalle) {
			$devoluciondetalleLogic= new devolucion_detalle_logic($this->connexion);
			$devoluciondetalle->setid_devolucion($devolucion->getId());
			devolucion_detalle_data::save($devoluciondetalle,$this->connexion);
			$devoluciondetalleLogic->deepSave($devoluciondetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($devolucion->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($devolucion->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($devolucion->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($devolucion->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($devolucion->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($devolucion->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($devolucion->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($devolucion->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($devolucion->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($devolucion->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($devolucion->getproveedor(),$this->connexion);
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepSave($devolucion->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				vendedor_data::save($devolucion->getvendedor(),$this->connexion);
				$vendedorLogic= new vendedor_logic($this->connexion);
				$vendedorLogic->deepSave($devolucion->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				termino_pago_proveedor_data::save($devolucion->gettermino_pago_proveedor(),$this->connexion);
				$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
				$termino_pago_proveedorLogic->deepSave($devolucion->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				moneda_data::save($devolucion->getmoneda(),$this->connexion);
				$monedaLogic= new moneda_logic($this->connexion);
				$monedaLogic->deepSave($devolucion->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($devolucion->getestado(),$this->connexion);
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepSave($devolucion->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				asiento_data::save($devolucion->getasiento(),$this->connexion);
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepSave($devolucion->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==documento_cuenta_pagar::$class.'') {
				documento_cuenta_pagar_data::save($devolucion->getdocumento_cuenta_pagar(),$this->connexion);
				$documento_cuenta_pagarLogic= new documento_cuenta_pagar_logic($this->connexion);
				$documento_cuenta_pagarLogic->deepSave($devolucion->getdocumento_cuenta_pagar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				kardex_data::save($devolucion->getkardex(),$this->connexion);
				$kardexLogic= new kardex_logic($this->connexion);
				$kardexLogic->deepSave($devolucion->getkardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==devolucion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($devolucion->getdevolucion_detalles() as $devoluciondetalle) {
					$devoluciondetalleLogic= new devolucion_detalle_logic($this->connexion);
					$devoluciondetalle->setid_devolucion($devolucion->getId());
					devolucion_detalle_data::save($devoluciondetalle,$this->connexion);
					$devoluciondetalleLogic->deepSave($devoluciondetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($devolucion->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($devolucion->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($devolucion->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($devolucion->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($devolucion->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($devolucion->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($devolucion->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($devolucion->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($devolucion->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($devolucion->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($devolucion->getproveedor(),$this->connexion);
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepSave($devolucion->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			vendedor_data::save($devolucion->getvendedor(),$this->connexion);
			$vendedorLogic= new vendedor_logic($this->connexion);
			$vendedorLogic->deepSave($devolucion->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_proveedor_data::save($devolucion->gettermino_pago_proveedor(),$this->connexion);
			$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
			$termino_pago_proveedorLogic->deepSave($devolucion->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			moneda_data::save($devolucion->getmoneda(),$this->connexion);
			$monedaLogic= new moneda_logic($this->connexion);
			$monedaLogic->deepSave($devolucion->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($devolucion->getestado(),$this->connexion);
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepSave($devolucion->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_data::save($devolucion->getasiento(),$this->connexion);
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepSave($devolucion->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_cuenta_pagar_data::save($devolucion->getdocumento_cuenta_pagar(),$this->connexion);
			$documento_cuenta_pagarLogic= new documento_cuenta_pagar_logic($this->connexion);
			$documento_cuenta_pagarLogic->deepSave($devolucion->getdocumento_cuenta_pagar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			kardex_data::save($devolucion->getkardex(),$this->connexion);
			$kardexLogic= new kardex_logic($this->connexion);
			$kardexLogic->deepSave($devolucion->getkardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==devolucion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(devolucion_detalle::$class);

			foreach($devolucion->getdevolucion_detalles() as $devoluciondetalle) {
				$devoluciondetalleLogic= new devolucion_detalle_logic($this->connexion);
				$devoluciondetalle->setid_devolucion($devolucion->getId());
				devolucion_detalle_data::save($devoluciondetalle,$this->connexion);
				$devoluciondetalleLogic->deepSave($devoluciondetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				devolucion_data::save($devolucion, $this->connexion);
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
			
			$this->deepLoad($this->devolucion,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->devolucions as $devolucion) {
				$this->deepLoad($devolucion,$isDeep,$deepLoadType,$clases);
								
				devolucion_util::refrescarFKDescripciones($this->devolucions);
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
			
			foreach($this->devolucions as $devolucion) {
				$this->deepLoad($devolucion,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->devolucion,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->devolucions as $devolucion) {
				$this->deepSave($devolucion,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->devolucions as $devolucion) {
				$this->deepSave($devolucion,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(vendedor::$class);
				$classes[]=new Classe(termino_pago_proveedor::$class);
				$classes[]=new Classe(moneda::$class);
				$classes[]=new Classe(estado::$class);
				$classes[]=new Classe(asiento::$class);
				$classes[]=new Classe(documento_cuenta_pagar::$class);
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
					if($clas->clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class);
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
					if($clas->clas==moneda::$class) {
						$classes[]=new Classe(moneda::$class);
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
					if($clas->clas==documento_cuenta_pagar::$class) {
						$classes[]=new Classe(documento_cuenta_pagar::$class);
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
					if($clas->clas==documento_cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(documento_cuenta_pagar::$class);
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
				
				$classes[]=new Classe(devolucion_detalle::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==devolucion_detalle::$class) {
						$classes[]=new Classe(devolucion_detalle::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==devolucion_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(devolucion_detalle::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getdevolucion() : ?devolucion {	
		/*
		devolucion_logic_add::checkdevolucionToGet($this->devolucion,$this->datosCliente);
		devolucion_logic_add::updatedevolucionToGet($this->devolucion);
		*/
			
		return $this->devolucion;
	}
		
	public function setdevolucion(devolucion $newdevolucion) {
		$this->devolucion = $newdevolucion;
	}
	
	public function getdevolucions() : array {		
		/*
		devolucion_logic_add::checkdevolucionToGets($this->devolucions,$this->datosCliente);
		
		foreach ($this->devolucions as $devolucionLocal ) {
			devolucion_logic_add::updatedevolucionToGet($devolucionLocal);
		}
		*/
		
		return $this->devolucions;
	}
	
	public function setdevolucions(array $newdevolucions) {
		$this->devolucions = $newdevolucions;
	}
	
	public function getdevolucionDataAccess() : devolucion_data {
		return $this->devolucionDataAccess;
	}
	
	public function setdevolucionDataAccess(devolucion_data $newdevolucionDataAccess) {
		$this->devolucionDataAccess = $newdevolucionDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        devolucion_carga::$CONTROLLER;;        
		
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
