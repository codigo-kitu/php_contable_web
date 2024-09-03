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

namespace com\bydan\contabilidad\estimados\estimado\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\estimados\estimado\util\estimado_carga;
use com\bydan\contabilidad\estimados\estimado\util\estimado_param_return;

use com\bydan\contabilidad\estimados\estimado\presentation\session\estimado_session;

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

use com\bydan\contabilidad\estimados\estimado\util\estimado_util;
use com\bydan\contabilidad\estimados\estimado\business\entity\estimado;
use com\bydan\contabilidad\estimados\estimado\business\data\estimado_data;

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

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\business\data\vendedor_data;
use com\bydan\contabilidad\facturacion\vendedor\business\logic\vendedor_logic;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\data\termino_pago_cliente_data;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;
use com\bydan\contabilidad\contabilidad\moneda\business\data\moneda_data;
use com\bydan\contabilidad\contabilidad\moneda\business\logic\moneda_logic;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\data\estado_data;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL


use com\bydan\contabilidad\estimados\imagen_estimado\business\entity\imagen_estimado;
use com\bydan\contabilidad\estimados\imagen_estimado\business\data\imagen_estimado_data;
use com\bydan\contabilidad\estimados\imagen_estimado\business\logic\imagen_estimado_logic;
use com\bydan\contabilidad\estimados\imagen_estimado\util\imagen_estimado_carga;
use com\bydan\contabilidad\estimados\imagen_estimado\util\imagen_estimado_util;

use com\bydan\contabilidad\estimados\estimado_detalle\business\entity\estimado_detalle;
use com\bydan\contabilidad\estimados\estimado_detalle\business\data\estimado_detalle_data;
use com\bydan\contabilidad\estimados\estimado_detalle\business\logic\estimado_detalle_logic;
use com\bydan\contabilidad\estimados\estimado_detalle\util\estimado_detalle_carga;
use com\bydan\contabilidad\estimados\estimado_detalle\util\estimado_detalle_util;

//REL DETALLES




class estimado_logic  extends GeneralEntityLogic implements estimado_logicI {	
	/*GENERAL*/
	public estimado_data $estimadoDataAccess;
	//public ?estimado_logic_add $estimadoLogicAdditional=null;
	public ?estimado $estimado;
	public array $estimados;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->estimadoDataAccess = new estimado_data();			
			$this->estimados = array();
			$this->estimado = new estimado();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->estimadoLogicAdditional = new estimado_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->estimadoLogicAdditional==null) {
		//	$this->estimadoLogicAdditional=new estimado_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->estimadoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->estimadoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->estimadoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->estimadoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->estimados = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimados);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->estimados = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimados);
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
		$this->estimado = new estimado();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->estimado=$this->estimadoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->estimado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estimado_util::refrescarFKDescripcion($this->estimado);
			}
						
			//estimado_logic_add::checkestimadoToGet($this->estimado,$this->datosCliente);
			//estimado_logic_add::updateestimadoToGet($this->estimado);
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
		$this->estimado = new  estimado();
		  		  
        try {		
			$this->estimado=$this->estimadoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->estimado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estimado_util::refrescarFKDescripcion($this->estimado);
			}
			
			//estimado_logic_add::checkestimadoToGet($this->estimado,$this->datosCliente);
			//estimado_logic_add::updateestimadoToGet($this->estimado);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?estimado {
		$estimadoLogic = new  estimado_logic();
		  		  
        try {		
			$estimadoLogic->setConnexion($connexion);			
			$estimadoLogic->getEntity($id);			
			return $estimadoLogic->getestimado();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->estimado = new  estimado();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->estimado=$this->estimadoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->estimado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estimado_util::refrescarFKDescripcion($this->estimado);
			}
			
			//estimado_logic_add::checkestimadoToGet($this->estimado,$this->datosCliente);
			//estimado_logic_add::updateestimadoToGet($this->estimado);
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
		$this->estimado = new  estimado();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estimado=$this->estimadoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->estimado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				estimado_util::refrescarFKDescripcion($this->estimado);
			}
			
			//estimado_logic_add::checkestimadoToGet($this->estimado,$this->datosCliente);
			//estimado_logic_add::updateestimadoToGet($this->estimado);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?estimado {
		$estimadoLogic = new  estimado_logic();
		  		  
        try {		
			$estimadoLogic->setConnexion($connexion);			
			$estimadoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $estimadoLogic->getestimado();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->estimados = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimados);			
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
		$this->estimados = array();
		  		  
        try {			
			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimados);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->estimados = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimados);
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
		$this->estimados = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimados);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$estimadoLogic = new  estimado_logic();
		  		  
        try {		
			$estimadoLogic->setConnexion($connexion);			
			$estimadoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $estimadoLogic->getestimados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->estimados = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->estimados=$this->estimadoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimados);
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
		$this->estimados = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estimados=$this->estimadoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimados);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->estimados = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->estimados=$this->estimadoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimados);
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
		$this->estimados = array();
		  		  
        try {			
			$this->estimados=$this->estimadoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_util::refrescarFKDescripciones($this->estimados);
			}	
			
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimados);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->estimados = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->estimados=$this->estimadoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimados);
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
		$this->estimados = array();
		  		  
        try {		
			$this->estimados=$this->estimadoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->estimados);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdclienteWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_cliente) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,estimado_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcliente(string $strFinalQuery,Pagination $pagination,?int $id_cliente) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cliente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,estimado_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);
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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,estimado_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,estimado_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,estimado_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,estimado_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);
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
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,estimado_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);

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
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,estimado_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);
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
			$parameterSelectionGeneralid_moneda->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_moneda,estimado_util::$ID_MONEDA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_moneda);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);

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
			$parameterSelectionGeneralid_moneda->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_moneda,estimado_util::$ID_MONEDA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_moneda);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);
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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,estimado_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);

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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,estimado_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdproveedorWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_proveedor) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,estimado_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idproveedor(string $strFinalQuery,Pagination $pagination,?int $id_proveedor) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_proveedor= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,estimado_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);
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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,estimado_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);

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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,estimado_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);
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
			$parameterSelectionGeneralid_termino_pago_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_cliente,estimado_util::$ID_TERMINO_PAGO_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_cliente);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);

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
			$parameterSelectionGeneralid_termino_pago_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_cliente,estimado_util::$ID_TERMINO_PAGO_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_cliente);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,estimado_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,estimado_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);
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
			$parameterSelectionGeneralid_vendedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_vendedor,estimado_util::$ID_VENDEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_vendedor);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);

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
			$parameterSelectionGeneralid_vendedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_vendedor,estimado_util::$ID_VENDEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_vendedor);

			$this->estimados=$this->estimadoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			//estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->estimados);
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
						
			//estimado_logic_add::checkestimadoToSave($this->estimado,$this->datosCliente,$this->connexion);	       
			//estimado_logic_add::updateestimadoToSave($this->estimado);			
			estimado_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->estimado,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->estimadoLogicAdditional->checkGeneralEntityToSave($this,$this->estimado,$this->datosCliente,$this->connexion);
			
			
			estimado_data::save($this->estimado, $this->connexion);	    	       	 				
			//estimado_logic_add::checkestimadoToSaveAfter($this->estimado,$this->datosCliente,$this->connexion);			
			//$this->estimadoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->estimado,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->estimado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->estimado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				estimado_util::refrescarFKDescripcion($this->estimado);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->estimado->getIsDeleted()) {
				$this->estimado=null;
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
						
			/*estimado_logic_add::checkestimadoToSave($this->estimado,$this->datosCliente,$this->connexion);*/	        
			//estimado_logic_add::updateestimadoToSave($this->estimado);			
			//$this->estimadoLogicAdditional->checkGeneralEntityToSave($this,$this->estimado,$this->datosCliente,$this->connexion);			
			estimado_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->estimado,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			estimado_data::save($this->estimado, $this->connexion);	    	       	 						
			/*estimado_logic_add::checkestimadoToSaveAfter($this->estimado,$this->datosCliente,$this->connexion);*/			
			//$this->estimadoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->estimado,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->estimado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->estimado,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				estimado_util::refrescarFKDescripcion($this->estimado);				
			}
			
			if($this->estimado->getIsDeleted()) {
				$this->estimado=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(estimado $estimado,Connexion $connexion)  {
		$estimadoLogic = new  estimado_logic();		  		  
        try {		
			$estimadoLogic->setConnexion($connexion);			
			$estimadoLogic->setestimado($estimado);			
			$estimadoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*estimado_logic_add::checkestimadoToSaves($this->estimados,$this->datosCliente,$this->connexion);*/	        	
			//$this->estimadoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->estimados,$this->datosCliente,$this->connexion);
			
	   		foreach($this->estimados as $estimadoLocal) {				
								
				//estimado_logic_add::updateestimadoToSave($estimadoLocal);	        	
				estimado_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$estimadoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				estimado_data::save($estimadoLocal, $this->connexion);				
			}
			
			/*estimado_logic_add::checkestimadoToSavesAfter($this->estimados,$this->datosCliente,$this->connexion);*/			
			//$this->estimadoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->estimados,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_util::refrescarFKDescripciones($this->estimados);
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
			/*estimado_logic_add::checkestimadoToSaves($this->estimados,$this->datosCliente,$this->connexion);*/			
			//$this->estimadoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->estimados,$this->datosCliente,$this->connexion);
			
	   		foreach($this->estimados as $estimadoLocal) {				
								
				//estimado_logic_add::updateestimadoToSave($estimadoLocal);	        	
				estimado_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$estimadoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				estimado_data::save($estimadoLocal, $this->connexion);				
			}			
			
			/*estimado_logic_add::checkestimadoToSavesAfter($this->estimados,$this->datosCliente,$this->connexion);*/			
			//$this->estimadoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->estimados,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				estimado_util::refrescarFKDescripciones($this->estimados);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $estimados,Connexion $connexion)  {
		$estimadoLogic = new  estimado_logic();
		  		  
        try {		
			$estimadoLogic->setConnexion($connexion);			
			$estimadoLogic->setestimados($estimados);			
			$estimadoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$estimadosAux=array();
		
		foreach($this->estimados as $estimado) {
			if($estimado->getIsDeleted()==false) {
				$estimadosAux[]=$estimado;
			}
		}
		
		$this->estimados=$estimadosAux;
	}
	
	public function updateToGetsAuxiliar(array &$estimados) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->estimados as $estimado) {
				
				$estimado->setid_empresa_Descripcion(estimado_util::getempresaDescripcion($estimado->getempresa()));
				$estimado->setid_sucursal_Descripcion(estimado_util::getsucursalDescripcion($estimado->getsucursal()));
				$estimado->setid_ejercicio_Descripcion(estimado_util::getejercicioDescripcion($estimado->getejercicio()));
				$estimado->setid_periodo_Descripcion(estimado_util::getperiodoDescripcion($estimado->getperiodo()));
				$estimado->setid_usuario_Descripcion(estimado_util::getusuarioDescripcion($estimado->getusuario()));
				$estimado->setid_cliente_Descripcion(estimado_util::getclienteDescripcion($estimado->getcliente()));
				$estimado->setid_proveedor_Descripcion(estimado_util::getproveedorDescripcion($estimado->getproveedor()));
				$estimado->setid_vendedor_Descripcion(estimado_util::getvendedorDescripcion($estimado->getvendedor()));
				$estimado->setid_termino_pago_cliente_Descripcion(estimado_util::gettermino_pago_clienteDescripcion($estimado->gettermino_pago_cliente()));
				$estimado->setid_moneda_Descripcion(estimado_util::getmonedaDescripcion($estimado->getmoneda()));
				$estimado->setid_estado_Descripcion(estimado_util::getestadoDescripcion($estimado->getestado()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$estimado_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$estimado_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$estimado_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$estimadoForeignKey=new estimado_param_return();//estimadoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombosclientesFK($this->connexion,$strRecargarFkQuery,$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosproveedorsFK($this->connexion,$strRecargarFkQuery,$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_vendedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosvendedorsFK($this->connexion,$strRecargarFkQuery,$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_termino_pago_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombostermino_pago_clientesFK($this->connexion,$strRecargarFkQuery,$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_moneda',$strRecargarFkTipos,',')) {
				$this->cargarCombosmonedasFK($this->connexion,$strRecargarFkQuery,$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado',$strRecargarFkTipos,',')) {
				$this->cargarCombosestadosFK($this->connexion,$strRecargarFkQuery,$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosclientesFK($this->connexion,' where id=-1 ',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproveedorsFK($this->connexion,' where id=-1 ',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_vendedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosvendedorsFK($this->connexion,' where id=-1 ',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_termino_pago_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostermino_pago_clientesFK($this->connexion,' where id=-1 ',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_moneda',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosmonedasFK($this->connexion,' where id=-1 ',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_estado',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosestadosFK($this->connexion,' where id=-1 ',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $estimadoForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$estimadoForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($estimado_session==null) {
			$estimado_session=new estimado_session();
		}
		
		if($estimado_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($estimadoForeignKey->idempresaDefaultFK==0) {
					$estimadoForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$estimadoForeignKey->empresasFK[$empresaLocal->getId()]=estimado_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($estimado_session->bigidempresaActual!=null && $estimado_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($estimado_session->bigidempresaActual);//WithConnection

				$estimadoForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=estimado_util::getempresaDescripcion($empresaLogic->getempresa());
				$estimadoForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$estimadoForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($estimado_session==null) {
			$estimado_session=new estimado_session();
		}
		
		if($estimado_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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
				if($estimadoForeignKey->idsucursalDefaultFK==0) {
					$estimadoForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$estimadoForeignKey->sucursalsFK[$sucursalLocal->getId()]=estimado_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($estimado_session->bigidsucursalActual!=null && $estimado_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($estimado_session->bigidsucursalActual);//WithConnection

				$estimadoForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=estimado_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$estimadoForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$estimadoForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($estimado_session==null) {
			$estimado_session=new estimado_session();
		}
		
		if($estimado_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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
				if($estimadoForeignKey->idejercicioDefaultFK==0) {
					$estimadoForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$estimadoForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=estimado_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($estimado_session->bigidejercicioActual!=null && $estimado_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($estimado_session->bigidejercicioActual);//WithConnection

				$estimadoForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=estimado_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$estimadoForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$estimadoForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($estimado_session==null) {
			$estimado_session=new estimado_session();
		}
		
		if($estimado_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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
				if($estimadoForeignKey->idperiodoDefaultFK==0) {
					$estimadoForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$estimadoForeignKey->periodosFK[$periodoLocal->getId()]=estimado_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($estimado_session->bigidperiodoActual!=null && $estimado_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($estimado_session->bigidperiodoActual);//WithConnection

				$estimadoForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=estimado_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$estimadoForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$estimadoForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($estimado_session==null) {
			$estimado_session=new estimado_session();
		}
		
		if($estimado_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($estimadoForeignKey->idusuarioDefaultFK==0) {
					$estimadoForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$estimadoForeignKey->usuariosFK[$usuarioLocal->getId()]=estimado_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($estimado_session->bigidusuarioActual!=null && $estimado_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($estimado_session->bigidusuarioActual);//WithConnection

				$estimadoForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=estimado_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$estimadoForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosclientesFK($connexion=null,$strRecargarFkQuery='',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$clienteLogic= new cliente_logic();
		$pagination= new Pagination();
		$estimadoForeignKey->clientesFK=array();

		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($estimado_session==null) {
			$estimado_session=new estimado_session();
		}
		
		if($estimado_session->bitBusquedaDesdeFKSesioncliente!=true) {
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
				if($estimadoForeignKey->idclienteDefaultFK==0) {
					$estimadoForeignKey->idclienteDefaultFK=$clienteLocal->getId();
				}

				$estimadoForeignKey->clientesFK[$clienteLocal->getId()]=estimado_util::getclienteDescripcion($clienteLocal);
			}

		} else {

			if($estimado_session->bigidclienteActual!=null && $estimado_session->bigidclienteActual > 0) {
				$clienteLogic->getEntity($estimado_session->bigidclienteActual);//WithConnection

				$estimadoForeignKey->clientesFK[$clienteLogic->getcliente()->getId()]=estimado_util::getclienteDescripcion($clienteLogic->getcliente());
				$estimadoForeignKey->idclienteDefaultFK=$clienteLogic->getcliente()->getId();
			}
		}
	}

	public function cargarCombosproveedorsFK($connexion=null,$strRecargarFkQuery='',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$proveedorLogic= new proveedor_logic();
		$pagination= new Pagination();
		$estimadoForeignKey->proveedorsFK=array();

		$proveedorLogic->setConnexion($connexion);
		$proveedorLogic->getproveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($estimado_session==null) {
			$estimado_session=new estimado_session();
		}
		
		if($estimado_session->bitBusquedaDesdeFKSesionproveedor!=true) {
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
				if($estimadoForeignKey->idproveedorDefaultFK==0) {
					$estimadoForeignKey->idproveedorDefaultFK=$proveedorLocal->getId();
				}

				$estimadoForeignKey->proveedorsFK[$proveedorLocal->getId()]=estimado_util::getproveedorDescripcion($proveedorLocal);
			}

		} else {

			if($estimado_session->bigidproveedorActual!=null && $estimado_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($estimado_session->bigidproveedorActual);//WithConnection

				$estimadoForeignKey->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=estimado_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$estimadoForeignKey->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	public function cargarCombosvendedorsFK($connexion=null,$strRecargarFkQuery='',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$vendedorLogic= new vendedor_logic();
		$pagination= new Pagination();
		$estimadoForeignKey->vendedorsFK=array();

		$vendedorLogic->setConnexion($connexion);
		$vendedorLogic->getvendedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($estimado_session==null) {
			$estimado_session=new estimado_session();
		}
		
		if($estimado_session->bitBusquedaDesdeFKSesionvendedor!=true) {
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
				if($estimadoForeignKey->idvendedorDefaultFK==0) {
					$estimadoForeignKey->idvendedorDefaultFK=$vendedorLocal->getId();
				}

				$estimadoForeignKey->vendedorsFK[$vendedorLocal->getId()]=estimado_util::getvendedorDescripcion($vendedorLocal);
			}

		} else {

			if($estimado_session->bigidvendedorActual!=null && $estimado_session->bigidvendedorActual > 0) {
				$vendedorLogic->getEntity($estimado_session->bigidvendedorActual);//WithConnection

				$estimadoForeignKey->vendedorsFK[$vendedorLogic->getvendedor()->getId()]=estimado_util::getvendedorDescripcion($vendedorLogic->getvendedor());
				$estimadoForeignKey->idvendedorDefaultFK=$vendedorLogic->getvendedor()->getId();
			}
		}
	}

	public function cargarCombostermino_pago_clientesFK($connexion=null,$strRecargarFkQuery='',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$termino_pago_clienteLogic= new termino_pago_cliente_logic();
		$pagination= new Pagination();
		$estimadoForeignKey->termino_pago_clientesFK=array();

		$termino_pago_clienteLogic->setConnexion($connexion);
		$termino_pago_clienteLogic->gettermino_pago_clienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($estimado_session==null) {
			$estimado_session=new estimado_session();
		}
		
		if($estimado_session->bitBusquedaDesdeFKSesiontermino_pago_cliente!=true) {
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
				if($estimadoForeignKey->idtermino_pago_clienteDefaultFK==0) {
					$estimadoForeignKey->idtermino_pago_clienteDefaultFK=$termino_pago_clienteLocal->getId();
				}

				$estimadoForeignKey->termino_pago_clientesFK[$termino_pago_clienteLocal->getId()]=estimado_util::gettermino_pago_clienteDescripcion($termino_pago_clienteLocal);
			}

		} else {

			if($estimado_session->bigidtermino_pago_clienteActual!=null && $estimado_session->bigidtermino_pago_clienteActual > 0) {
				$termino_pago_clienteLogic->getEntity($estimado_session->bigidtermino_pago_clienteActual);//WithConnection

				$estimadoForeignKey->termino_pago_clientesFK[$termino_pago_clienteLogic->gettermino_pago_cliente()->getId()]=estimado_util::gettermino_pago_clienteDescripcion($termino_pago_clienteLogic->gettermino_pago_cliente());
				$estimadoForeignKey->idtermino_pago_clienteDefaultFK=$termino_pago_clienteLogic->gettermino_pago_cliente()->getId();
			}
		}
	}

	public function cargarCombosmonedasFK($connexion=null,$strRecargarFkQuery='',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$monedaLogic= new moneda_logic();
		$pagination= new Pagination();
		$estimadoForeignKey->monedasFK=array();

		$monedaLogic->setConnexion($connexion);
		$monedaLogic->getmonedaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($estimado_session==null) {
			$estimado_session=new estimado_session();
		}
		
		if($estimado_session->bitBusquedaDesdeFKSesionmoneda!=true) {
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
				if($estimadoForeignKey->idmonedaDefaultFK==0) {
					$estimadoForeignKey->idmonedaDefaultFK=$monedaLocal->getId();
				}

				$estimadoForeignKey->monedasFK[$monedaLocal->getId()]=estimado_util::getmonedaDescripcion($monedaLocal);
			}

		} else {

			if($estimado_session->bigidmonedaActual!=null && $estimado_session->bigidmonedaActual > 0) {
				$monedaLogic->getEntity($estimado_session->bigidmonedaActual);//WithConnection

				$estimadoForeignKey->monedasFK[$monedaLogic->getmoneda()->getId()]=estimado_util::getmonedaDescripcion($monedaLogic->getmoneda());
				$estimadoForeignKey->idmonedaDefaultFK=$monedaLogic->getmoneda()->getId();
			}
		}
	}

	public function cargarCombosestadosFK($connexion=null,$strRecargarFkQuery='',$estimadoForeignKey,$estimado_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$estadoLogic= new estado_logic();
		$pagination= new Pagination();
		$estimadoForeignKey->estadosFK=array();

		$estadoLogic->setConnexion($connexion);
		$estadoLogic->getestadoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($estimado_session==null) {
			$estimado_session=new estimado_session();
		}
		
		if($estimado_session->bitBusquedaDesdeFKSesionestado!=true) {
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
				if($estimadoForeignKey->idestadoDefaultFK==0) {
					$estimadoForeignKey->idestadoDefaultFK=$estadoLocal->getId();
				}

				$estimadoForeignKey->estadosFK[$estadoLocal->getId()]=estimado_util::getestadoDescripcion($estadoLocal);
			}

		} else {

			if($estimado_session->bigidestadoActual!=null && $estimado_session->bigidestadoActual > 0) {
				$estadoLogic->getEntity($estimado_session->bigidestadoActual);//WithConnection

				$estimadoForeignKey->estadosFK[$estadoLogic->getestado()->getId()]=estimado_util::getestadoDescripcion($estadoLogic->getestado());
				$estimadoForeignKey->idestadoDefaultFK=$estadoLogic->getestado()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($estimado,$imagenestimados,$estimadodetalles) {
		$this->saveRelacionesBase($estimado,$imagenestimados,$estimadodetalles,true);
	}

	public function saveRelaciones($estimado,$imagenestimados,$estimadodetalles) {
		$this->saveRelacionesBase($estimado,$imagenestimados,$estimadodetalles,false);
	}

	public function saveRelacionesBase($estimado,$imagenestimados=array(),$estimadodetalles=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$estimado->setimagen_estimados($imagenestimados);
			$estimado->setestimado_detalles($estimadodetalles);
			$this->setestimado($estimado);

			if(true) {

				//estimado_logic_add::updateRelacionesToSave($estimado,$this);

				if(($this->estimado->getIsNew() || $this->estimado->getIsChanged()) && !$this->estimado->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($imagenestimados,$estimadodetalles);

				} else if($this->estimado->getIsDeleted()) {
					$this->saveRelacionesDetalles($imagenestimados,$estimadodetalles);
					$this->save();
				}

				//estimado_logic_add::updateRelacionesToSaveAfter($estimado,$this);

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
	
	
	public function saveRelacionesDetalles($imagenestimados=array(),$estimadodetalles=array()) {
		try {
	

			$idestimadoActual=$this->getestimado()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/imagen_estimado_carga.php');
			imagen_estimado_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$imagenestimadoLogic_Desde_estimado=new imagen_estimado_logic();
			$imagenestimadoLogic_Desde_estimado->setimagen_estimados($imagenestimados);

			$imagenestimadoLogic_Desde_estimado->setConnexion($this->getConnexion());
			$imagenestimadoLogic_Desde_estimado->setDatosCliente($this->datosCliente);

			foreach($imagenestimadoLogic_Desde_estimado->getimagen_estimados() as $imagenestimado_Desde_estimado) {
				$imagenestimado_Desde_estimado->setid_estimado($idestimadoActual);
			}

			$imagenestimadoLogic_Desde_estimado->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/estimado_detalle_carga.php');
			estimado_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$estimadodetalleLogic_Desde_estimado=new estimado_detalle_logic();
			$estimadodetalleLogic_Desde_estimado->setestimado_detalles($estimadodetalles);

			$estimadodetalleLogic_Desde_estimado->setConnexion($this->getConnexion());
			$estimadodetalleLogic_Desde_estimado->setDatosCliente($this->datosCliente);

			foreach($estimadodetalleLogic_Desde_estimado->getestimado_detalles() as $estimadodetalle_Desde_estimado) {
				$estimadodetalle_Desde_estimado->setid_estimado($idestimadoActual);
			}

			$estimadodetalleLogic_Desde_estimado->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $estimados,estimado_param_return $estimadoParameterGeneral) : estimado_param_return {
		$estimadoReturnGeneral=new estimado_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $estimadoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $estimados,estimado_param_return $estimadoParameterGeneral) : estimado_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$estimadoReturnGeneral=new estimado_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $estimadoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estimados,estimado $estimado,estimado_param_return $estimadoParameterGeneral,bool $isEsNuevoestimado,array $clases) : estimado_param_return {
		 try {	
			$estimadoReturnGeneral=new estimado_param_return();
	
			$estimadoReturnGeneral->setestimado($estimado);
			$estimadoReturnGeneral->setestimados($estimados);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$estimadoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $estimadoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estimados,estimado $estimado,estimado_param_return $estimadoParameterGeneral,bool $isEsNuevoestimado,array $clases) : estimado_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$estimadoReturnGeneral=new estimado_param_return();
	
			$estimadoReturnGeneral->setestimado($estimado);
			$estimadoReturnGeneral->setestimados($estimados);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$estimadoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $estimadoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estimados,estimado $estimado,estimado_param_return $estimadoParameterGeneral,bool $isEsNuevoestimado,array $clases) : estimado_param_return {
		 try {	
			$estimadoReturnGeneral=new estimado_param_return();
	
			$estimadoReturnGeneral->setestimado($estimado);
			$estimadoReturnGeneral->setestimados($estimados);
			
			
			
			return $estimadoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $estimados,estimado $estimado,estimado_param_return $estimadoParameterGeneral,bool $isEsNuevoestimado,array $clases) : estimado_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$estimadoReturnGeneral=new estimado_param_return();
	
			$estimadoReturnGeneral->setestimado($estimado);
			$estimadoReturnGeneral->setestimados($estimados);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $estimadoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,estimado $estimado,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,estimado $estimado,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		estimado_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		estimado_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(estimado $estimado,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//estimado_logic_add::updateestimadoToGet($this->estimado);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$estimado->setempresa($this->estimadoDataAccess->getempresa($this->connexion,$estimado));
		$estimado->setsucursal($this->estimadoDataAccess->getsucursal($this->connexion,$estimado));
		$estimado->setejercicio($this->estimadoDataAccess->getejercicio($this->connexion,$estimado));
		$estimado->setperiodo($this->estimadoDataAccess->getperiodo($this->connexion,$estimado));
		$estimado->setusuario($this->estimadoDataAccess->getusuario($this->connexion,$estimado));
		$estimado->setcliente($this->estimadoDataAccess->getcliente($this->connexion,$estimado));
		$estimado->setproveedor($this->estimadoDataAccess->getproveedor($this->connexion,$estimado));
		$estimado->setvendedor($this->estimadoDataAccess->getvendedor($this->connexion,$estimado));
		$estimado->settermino_pago_cliente($this->estimadoDataAccess->gettermino_pago_cliente($this->connexion,$estimado));
		$estimado->setmoneda($this->estimadoDataAccess->getmoneda($this->connexion,$estimado));
		$estimado->setestado($this->estimadoDataAccess->getestado($this->connexion,$estimado));
		$estimado->setimagen_estimados($this->estimadoDataAccess->getimagen_estimados($this->connexion,$estimado));
		$estimado->setestimado_detalles($this->estimadoDataAccess->getestimado_detalles($this->connexion,$estimado));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$estimado->setempresa($this->estimadoDataAccess->getempresa($this->connexion,$estimado));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$estimado->setsucursal($this->estimadoDataAccess->getsucursal($this->connexion,$estimado));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$estimado->setejercicio($this->estimadoDataAccess->getejercicio($this->connexion,$estimado));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$estimado->setperiodo($this->estimadoDataAccess->getperiodo($this->connexion,$estimado));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$estimado->setusuario($this->estimadoDataAccess->getusuario($this->connexion,$estimado));
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$estimado->setcliente($this->estimadoDataAccess->getcliente($this->connexion,$estimado));
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$estimado->setproveedor($this->estimadoDataAccess->getproveedor($this->connexion,$estimado));
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				$estimado->setvendedor($this->estimadoDataAccess->getvendedor($this->connexion,$estimado));
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				$estimado->settermino_pago_cliente($this->estimadoDataAccess->gettermino_pago_cliente($this->connexion,$estimado));
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				$estimado->setmoneda($this->estimadoDataAccess->getmoneda($this->connexion,$estimado));
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$estimado->setestado($this->estimadoDataAccess->getestado($this->connexion,$estimado));
				continue;
			}

			if($clas->clas==imagen_estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estimado->setimagen_estimados($this->estimadoDataAccess->getimagen_estimados($this->connexion,$estimado));

				if($this->isConDeep) {
					$imagenestimadoLogic= new imagen_estimado_logic($this->connexion);
					$imagenestimadoLogic->setimagen_estimados($estimado->getimagen_estimados());
					$classesLocal=imagen_estimado_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$imagenestimadoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					imagen_estimado_util::refrescarFKDescripciones($imagenestimadoLogic->getimagen_estimados());
					$estimado->setimagen_estimados($imagenestimadoLogic->getimagen_estimados());
				}

				continue;
			}

			if($clas->clas==estimado_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estimado->setestimado_detalles($this->estimadoDataAccess->getestimado_detalles($this->connexion,$estimado));

				if($this->isConDeep) {
					$estimadodetalleLogic= new estimado_detalle_logic($this->connexion);
					$estimadodetalleLogic->setestimado_detalles($estimado->getestimado_detalles());
					$classesLocal=estimado_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$estimadodetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					estimado_detalle_util::refrescarFKDescripciones($estimadodetalleLogic->getestimado_detalles());
					$estimado->setestimado_detalles($estimadodetalleLogic->getestimado_detalles());
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
			$estimado->setempresa($this->estimadoDataAccess->getempresa($this->connexion,$estimado));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado->setsucursal($this->estimadoDataAccess->getsucursal($this->connexion,$estimado));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado->setejercicio($this->estimadoDataAccess->getejercicio($this->connexion,$estimado));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado->setperiodo($this->estimadoDataAccess->getperiodo($this->connexion,$estimado));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado->setusuario($this->estimadoDataAccess->getusuario($this->connexion,$estimado));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado->setcliente($this->estimadoDataAccess->getcliente($this->connexion,$estimado));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado->setproveedor($this->estimadoDataAccess->getproveedor($this->connexion,$estimado));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado->setvendedor($this->estimadoDataAccess->getvendedor($this->connexion,$estimado));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado->settermino_pago_cliente($this->estimadoDataAccess->gettermino_pago_cliente($this->connexion,$estimado));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado->setmoneda($this->estimadoDataAccess->getmoneda($this->connexion,$estimado));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado->setestado($this->estimadoDataAccess->getestado($this->connexion,$estimado));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_estimado::$class);
			$estimado->setimagen_estimados($this->estimadoDataAccess->getimagen_estimados($this->connexion,$estimado));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estimado_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(estimado_detalle::$class);
			$estimado->setestimado_detalles($this->estimadoDataAccess->getestimado_detalles($this->connexion,$estimado));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$estimado->setempresa($this->estimadoDataAccess->getempresa($this->connexion,$estimado));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($estimado->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$estimado->setsucursal($this->estimadoDataAccess->getsucursal($this->connexion,$estimado));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($estimado->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$estimado->setejercicio($this->estimadoDataAccess->getejercicio($this->connexion,$estimado));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($estimado->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$estimado->setperiodo($this->estimadoDataAccess->getperiodo($this->connexion,$estimado));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($estimado->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$estimado->setusuario($this->estimadoDataAccess->getusuario($this->connexion,$estimado));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($estimado->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$estimado->setcliente($this->estimadoDataAccess->getcliente($this->connexion,$estimado));
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepLoad($estimado->getcliente(),$isDeep,$deepLoadType,$clases);
				
		$estimado->setproveedor($this->estimadoDataAccess->getproveedor($this->connexion,$estimado));
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepLoad($estimado->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		$estimado->setvendedor($this->estimadoDataAccess->getvendedor($this->connexion,$estimado));
		$vendedorLogic= new vendedor_logic($this->connexion);
		$vendedorLogic->deepLoad($estimado->getvendedor(),$isDeep,$deepLoadType,$clases);
				
		$estimado->settermino_pago_cliente($this->estimadoDataAccess->gettermino_pago_cliente($this->connexion,$estimado));
		$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
		$termino_pago_clienteLogic->deepLoad($estimado->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases);
				
		$estimado->setmoneda($this->estimadoDataAccess->getmoneda($this->connexion,$estimado));
		$monedaLogic= new moneda_logic($this->connexion);
		$monedaLogic->deepLoad($estimado->getmoneda(),$isDeep,$deepLoadType,$clases);
				
		$estimado->setestado($this->estimadoDataAccess->getestado($this->connexion,$estimado));
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepLoad($estimado->getestado(),$isDeep,$deepLoadType,$clases);
				

		$estimado->setimagen_estimados($this->estimadoDataAccess->getimagen_estimados($this->connexion,$estimado));

		foreach($estimado->getimagen_estimados() as $imagenestimado) {
			$imagenestimadoLogic= new imagen_estimado_logic($this->connexion);
			$imagenestimadoLogic->deepLoad($imagenestimado,$isDeep,$deepLoadType,$clases);
		}

		$estimado->setestimado_detalles($this->estimadoDataAccess->getestimado_detalles($this->connexion,$estimado));

		foreach($estimado->getestimado_detalles() as $estimadodetalle) {
			$estimadodetalleLogic= new estimado_detalle_logic($this->connexion);
			$estimadodetalleLogic->deepLoad($estimadodetalle,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$estimado->setempresa($this->estimadoDataAccess->getempresa($this->connexion,$estimado));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($estimado->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$estimado->setsucursal($this->estimadoDataAccess->getsucursal($this->connexion,$estimado));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($estimado->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$estimado->setejercicio($this->estimadoDataAccess->getejercicio($this->connexion,$estimado));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($estimado->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$estimado->setperiodo($this->estimadoDataAccess->getperiodo($this->connexion,$estimado));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($estimado->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$estimado->setusuario($this->estimadoDataAccess->getusuario($this->connexion,$estimado));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($estimado->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$estimado->setcliente($this->estimadoDataAccess->getcliente($this->connexion,$estimado));
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($estimado->getcliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$estimado->setproveedor($this->estimadoDataAccess->getproveedor($this->connexion,$estimado));
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($estimado->getproveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				$estimado->setvendedor($this->estimadoDataAccess->getvendedor($this->connexion,$estimado));
				$vendedorLogic= new vendedor_logic($this->connexion);
				$vendedorLogic->deepLoad($estimado->getvendedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				$estimado->settermino_pago_cliente($this->estimadoDataAccess->gettermino_pago_cliente($this->connexion,$estimado));
				$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
				$termino_pago_clienteLogic->deepLoad($estimado->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				$estimado->setmoneda($this->estimadoDataAccess->getmoneda($this->connexion,$estimado));
				$monedaLogic= new moneda_logic($this->connexion);
				$monedaLogic->deepLoad($estimado->getmoneda(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$estimado->setestado($this->estimadoDataAccess->getestado($this->connexion,$estimado));
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepLoad($estimado->getestado(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==imagen_estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estimado->setimagen_estimados($this->estimadoDataAccess->getimagen_estimados($this->connexion,$estimado));

				foreach($estimado->getimagen_estimados() as $imagenestimado) {
					$imagenestimadoLogic= new imagen_estimado_logic($this->connexion);
					$imagenestimadoLogic->deepLoad($imagenestimado,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==estimado_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$estimado->setestimado_detalles($this->estimadoDataAccess->getestimado_detalles($this->connexion,$estimado));

				foreach($estimado->getestimado_detalles() as $estimadodetalle) {
					$estimadodetalleLogic= new estimado_detalle_logic($this->connexion);
					$estimadodetalleLogic->deepLoad($estimadodetalle,$isDeep,$deepLoadType,$clases);
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
			$estimado->setempresa($this->estimadoDataAccess->getempresa($this->connexion,$estimado));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($estimado->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado->setsucursal($this->estimadoDataAccess->getsucursal($this->connexion,$estimado));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($estimado->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado->setejercicio($this->estimadoDataAccess->getejercicio($this->connexion,$estimado));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($estimado->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado->setperiodo($this->estimadoDataAccess->getperiodo($this->connexion,$estimado));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($estimado->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado->setusuario($this->estimadoDataAccess->getusuario($this->connexion,$estimado));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($estimado->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado->setcliente($this->estimadoDataAccess->getcliente($this->connexion,$estimado));
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($estimado->getcliente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado->setproveedor($this->estimadoDataAccess->getproveedor($this->connexion,$estimado));
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($estimado->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado->setvendedor($this->estimadoDataAccess->getvendedor($this->connexion,$estimado));
			$vendedorLogic= new vendedor_logic($this->connexion);
			$vendedorLogic->deepLoad($estimado->getvendedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado->settermino_pago_cliente($this->estimadoDataAccess->gettermino_pago_cliente($this->connexion,$estimado));
			$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
			$termino_pago_clienteLogic->deepLoad($estimado->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado->setmoneda($this->estimadoDataAccess->getmoneda($this->connexion,$estimado));
			$monedaLogic= new moneda_logic($this->connexion);
			$monedaLogic->deepLoad($estimado->getmoneda(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$estimado->setestado($this->estimadoDataAccess->getestado($this->connexion,$estimado));
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepLoad($estimado->getestado(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_estimado::$class);
			$estimado->setimagen_estimados($this->estimadoDataAccess->getimagen_estimados($this->connexion,$estimado));

			foreach($estimado->getimagen_estimados() as $imagenestimado) {
				$imagenestimadoLogic= new imagen_estimado_logic($this->connexion);
				$imagenestimadoLogic->deepLoad($imagenestimado,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estimado_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(estimado_detalle::$class);
			$estimado->setestimado_detalles($this->estimadoDataAccess->getestimado_detalles($this->connexion,$estimado));

			foreach($estimado->getestimado_detalles() as $estimadodetalle) {
				$estimadodetalleLogic= new estimado_detalle_logic($this->connexion);
				$estimadodetalleLogic->deepLoad($estimadodetalle,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(estimado $estimado,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//estimado_logic_add::updateestimadoToSave($this->estimado);			
			
			if(!$paraDeleteCascade) {				
				estimado_data::save($estimado, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($estimado->getempresa(),$this->connexion);
		sucursal_data::save($estimado->getsucursal(),$this->connexion);
		ejercicio_data::save($estimado->getejercicio(),$this->connexion);
		periodo_data::save($estimado->getperiodo(),$this->connexion);
		usuario_data::save($estimado->getusuario(),$this->connexion);
		cliente_data::save($estimado->getcliente(),$this->connexion);
		proveedor_data::save($estimado->getproveedor(),$this->connexion);
		vendedor_data::save($estimado->getvendedor(),$this->connexion);
		termino_pago_cliente_data::save($estimado->gettermino_pago_cliente(),$this->connexion);
		moneda_data::save($estimado->getmoneda(),$this->connexion);
		estado_data::save($estimado->getestado(),$this->connexion);

		foreach($estimado->getimagen_estimados() as $imagenestimado) {
			$imagenestimado->setid_estimado($estimado->getId());
			imagen_estimado_data::save($imagenestimado,$this->connexion);
		}


		foreach($estimado->getestimado_detalles() as $estimadodetalle) {
			$estimadodetalle->setid_estimado($estimado->getId());
			estimado_detalle_data::save($estimadodetalle,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($estimado->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($estimado->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($estimado->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($estimado->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($estimado->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($estimado->getcliente(),$this->connexion);
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($estimado->getproveedor(),$this->connexion);
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				vendedor_data::save($estimado->getvendedor(),$this->connexion);
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				termino_pago_cliente_data::save($estimado->gettermino_pago_cliente(),$this->connexion);
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				moneda_data::save($estimado->getmoneda(),$this->connexion);
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($estimado->getestado(),$this->connexion);
				continue;
			}


			if($clas->clas==imagen_estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estimado->getimagen_estimados() as $imagenestimado) {
					$imagenestimado->setid_estimado($estimado->getId());
					imagen_estimado_data::save($imagenestimado,$this->connexion);
				}

				continue;
			}

			if($clas->clas==estimado_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estimado->getestimado_detalles() as $estimadodetalle) {
					$estimadodetalle->setid_estimado($estimado->getId());
					estimado_detalle_data::save($estimadodetalle,$this->connexion);
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
			empresa_data::save($estimado->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($estimado->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($estimado->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($estimado->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($estimado->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($estimado->getcliente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($estimado->getproveedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			vendedor_data::save($estimado->getvendedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_cliente_data::save($estimado->gettermino_pago_cliente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			moneda_data::save($estimado->getmoneda(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($estimado->getestado(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_estimado::$class);

			foreach($estimado->getimagen_estimados() as $imagenestimado) {
				$imagenestimado->setid_estimado($estimado->getId());
				imagen_estimado_data::save($imagenestimado,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estimado_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(estimado_detalle::$class);

			foreach($estimado->getestimado_detalles() as $estimadodetalle) {
				$estimadodetalle->setid_estimado($estimado->getId());
				estimado_detalle_data::save($estimadodetalle,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($estimado->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($estimado->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($estimado->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($estimado->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($estimado->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($estimado->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($estimado->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($estimado->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($estimado->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($estimado->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cliente_data::save($estimado->getcliente(),$this->connexion);
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepSave($estimado->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		proveedor_data::save($estimado->getproveedor(),$this->connexion);
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepSave($estimado->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		vendedor_data::save($estimado->getvendedor(),$this->connexion);
		$vendedorLogic= new vendedor_logic($this->connexion);
		$vendedorLogic->deepSave($estimado->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		termino_pago_cliente_data::save($estimado->gettermino_pago_cliente(),$this->connexion);
		$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
		$termino_pago_clienteLogic->deepSave($estimado->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		moneda_data::save($estimado->getmoneda(),$this->connexion);
		$monedaLogic= new moneda_logic($this->connexion);
		$monedaLogic->deepSave($estimado->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		estado_data::save($estimado->getestado(),$this->connexion);
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepSave($estimado->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($estimado->getimagen_estimados() as $imagenestimado) {
			$imagenestimadoLogic= new imagen_estimado_logic($this->connexion);
			$imagenestimado->setid_estimado($estimado->getId());
			imagen_estimado_data::save($imagenestimado,$this->connexion);
			$imagenestimadoLogic->deepSave($imagenestimado,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($estimado->getestimado_detalles() as $estimadodetalle) {
			$estimadodetalleLogic= new estimado_detalle_logic($this->connexion);
			$estimadodetalle->setid_estimado($estimado->getId());
			estimado_detalle_data::save($estimadodetalle,$this->connexion);
			$estimadodetalleLogic->deepSave($estimadodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($estimado->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($estimado->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($estimado->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($estimado->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($estimado->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($estimado->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($estimado->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($estimado->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($estimado->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($estimado->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($estimado->getcliente(),$this->connexion);
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepSave($estimado->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($estimado->getproveedor(),$this->connexion);
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepSave($estimado->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				vendedor_data::save($estimado->getvendedor(),$this->connexion);
				$vendedorLogic= new vendedor_logic($this->connexion);
				$vendedorLogic->deepSave($estimado->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				termino_pago_cliente_data::save($estimado->gettermino_pago_cliente(),$this->connexion);
				$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
				$termino_pago_clienteLogic->deepSave($estimado->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				moneda_data::save($estimado->getmoneda(),$this->connexion);
				$monedaLogic= new moneda_logic($this->connexion);
				$monedaLogic->deepSave($estimado->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($estimado->getestado(),$this->connexion);
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepSave($estimado->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==imagen_estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estimado->getimagen_estimados() as $imagenestimado) {
					$imagenestimadoLogic= new imagen_estimado_logic($this->connexion);
					$imagenestimado->setid_estimado($estimado->getId());
					imagen_estimado_data::save($imagenestimado,$this->connexion);
					$imagenestimadoLogic->deepSave($imagenestimado,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==estimado_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($estimado->getestimado_detalles() as $estimadodetalle) {
					$estimadodetalleLogic= new estimado_detalle_logic($this->connexion);
					$estimadodetalle->setid_estimado($estimado->getId());
					estimado_detalle_data::save($estimadodetalle,$this->connexion);
					$estimadodetalleLogic->deepSave($estimadodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($estimado->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($estimado->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($estimado->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($estimado->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($estimado->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($estimado->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($estimado->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($estimado->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($estimado->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($estimado->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($estimado->getcliente(),$this->connexion);
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepSave($estimado->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($estimado->getproveedor(),$this->connexion);
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepSave($estimado->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			vendedor_data::save($estimado->getvendedor(),$this->connexion);
			$vendedorLogic= new vendedor_logic($this->connexion);
			$vendedorLogic->deepSave($estimado->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_cliente_data::save($estimado->gettermino_pago_cliente(),$this->connexion);
			$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
			$termino_pago_clienteLogic->deepSave($estimado->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			moneda_data::save($estimado->getmoneda(),$this->connexion);
			$monedaLogic= new moneda_logic($this->connexion);
			$monedaLogic->deepSave($estimado->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($estimado->getestado(),$this->connexion);
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepSave($estimado->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_estimado::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_estimado::$class);

			foreach($estimado->getimagen_estimados() as $imagenestimado) {
				$imagenestimadoLogic= new imagen_estimado_logic($this->connexion);
				$imagenestimado->setid_estimado($estimado->getId());
				imagen_estimado_data::save($imagenestimado,$this->connexion);
				$imagenestimadoLogic->deepSave($imagenestimado,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estimado_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(estimado_detalle::$class);

			foreach($estimado->getestimado_detalles() as $estimadodetalle) {
				$estimadodetalleLogic= new estimado_detalle_logic($this->connexion);
				$estimadodetalle->setid_estimado($estimado->getId());
				estimado_detalle_data::save($estimadodetalle,$this->connexion);
				$estimadodetalleLogic->deepSave($estimadodetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				estimado_data::save($estimado, $this->connexion);
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
			
			$this->deepLoad($this->estimado,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->estimados as $estimado) {
				$this->deepLoad($estimado,$isDeep,$deepLoadType,$clases);
								
				estimado_util::refrescarFKDescripciones($this->estimados);
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
			
			foreach($this->estimados as $estimado) {
				$this->deepLoad($estimado,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->estimado,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->estimados as $estimado) {
				$this->deepSave($estimado,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->estimados as $estimado) {
				$this->deepSave($estimado,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(proveedor::$class);
				$classes[]=new Classe(vendedor::$class);
				$classes[]=new Classe(termino_pago_cliente::$class);
				$classes[]=new Classe(moneda::$class);
				$classes[]=new Classe(estado::$class);
				
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
					if($clas->clas==termino_pago_cliente::$class) {
						$classes[]=new Classe(termino_pago_cliente::$class);
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
				
				$classes[]=new Classe(imagen_estimado::$class);
				$classes[]=new Classe(estimado_detalle::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==imagen_estimado::$class) {
						$classes[]=new Classe(imagen_estimado::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==estimado_detalle::$class) {
						$classes[]=new Classe(estimado_detalle::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==imagen_estimado::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(imagen_estimado::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==estimado_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(estimado_detalle::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getestimado() : ?estimado {	
		/*
		estimado_logic_add::checkestimadoToGet($this->estimado,$this->datosCliente);
		estimado_logic_add::updateestimadoToGet($this->estimado);
		*/
			
		return $this->estimado;
	}
		
	public function setestimado(estimado $newestimado) {
		$this->estimado = $newestimado;
	}
	
	public function getestimados() : array {		
		/*
		estimado_logic_add::checkestimadoToGets($this->estimados,$this->datosCliente);
		
		foreach ($this->estimados as $estimadoLocal ) {
			estimado_logic_add::updateestimadoToGet($estimadoLocal);
		}
		*/
		
		return $this->estimados;
	}
	
	public function setestimados(array $newestimados) {
		$this->estimados = $newestimados;
	}
	
	public function getestimadoDataAccess() : estimado_data {
		return $this->estimadoDataAccess;
	}
	
	public function setestimadoDataAccess(estimado_data $newestimadoDataAccess) {
		$this->estimadoDataAccess = $newestimadoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        estimado_carga::$CONTROLLER;;        
		
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
