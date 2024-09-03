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

namespace com\bydan\contabilidad\estimados\consignacion\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\estimados\consignacion\util\consignacion_carga;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_param_return;

use com\bydan\contabilidad\estimados\consignacion\presentation\session\consignacion_session;

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

use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;
use com\bydan\contabilidad\estimados\consignacion\business\entity\consignacion;
use com\bydan\contabilidad\estimados\consignacion\business\data\consignacion_data;

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

use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;
use com\bydan\contabilidad\inventario\kardex\business\data\kardex_data;
use com\bydan\contabilidad\inventario\kardex\business\logic\kardex_logic;
use com\bydan\contabilidad\inventario\kardex\util\kardex_util;

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\data\asiento_data;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

//REL


use com\bydan\contabilidad\estimados\imagen_consignacion\business\entity\imagen_consignacion;
use com\bydan\contabilidad\estimados\imagen_consignacion\business\data\imagen_consignacion_data;
use com\bydan\contabilidad\estimados\imagen_consignacion\business\logic\imagen_consignacion_logic;
use com\bydan\contabilidad\estimados\imagen_consignacion\util\imagen_consignacion_carga;
use com\bydan\contabilidad\estimados\imagen_consignacion\util\imagen_consignacion_util;

use com\bydan\contabilidad\estimados\consignacion_detalle\business\entity\consignacion_detalle;
use com\bydan\contabilidad\estimados\consignacion_detalle\business\data\consignacion_detalle_data;
use com\bydan\contabilidad\estimados\consignacion_detalle\business\logic\consignacion_detalle_logic;
use com\bydan\contabilidad\estimados\consignacion_detalle\util\consignacion_detalle_carga;
use com\bydan\contabilidad\estimados\consignacion_detalle\util\consignacion_detalle_util;

//REL DETALLES




class consignacion_logic  extends GeneralEntityLogic implements consignacion_logicI {	
	/*GENERAL*/
	public consignacion_data $consignacionDataAccess;
	//public ?consignacion_logic_add $consignacionLogicAdditional=null;
	public ?consignacion $consignacion;
	public array $consignacions;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->consignacionDataAccess = new consignacion_data();			
			$this->consignacions = array();
			$this->consignacion = new consignacion();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->consignacionLogicAdditional = new consignacion_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->consignacionLogicAdditional==null) {
		//	$this->consignacionLogicAdditional=new consignacion_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->consignacionDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->consignacionDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->consignacionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->consignacionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->consignacions = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacions);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->consignacions = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacions);
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
		$this->consignacion = new consignacion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->consignacion=$this->consignacionDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->consignacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				consignacion_util::refrescarFKDescripcion($this->consignacion);
			}
						
			//consignacion_logic_add::checkconsignacionToGet($this->consignacion,$this->datosCliente);
			//consignacion_logic_add::updateconsignacionToGet($this->consignacion);
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
		$this->consignacion = new  consignacion();
		  		  
        try {		
			$this->consignacion=$this->consignacionDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->consignacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				consignacion_util::refrescarFKDescripcion($this->consignacion);
			}
			
			//consignacion_logic_add::checkconsignacionToGet($this->consignacion,$this->datosCliente);
			//consignacion_logic_add::updateconsignacionToGet($this->consignacion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?consignacion {
		$consignacionLogic = new  consignacion_logic();
		  		  
        try {		
			$consignacionLogic->setConnexion($connexion);			
			$consignacionLogic->getEntity($id);			
			return $consignacionLogic->getconsignacion();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->consignacion = new  consignacion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->consignacion=$this->consignacionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->consignacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				consignacion_util::refrescarFKDescripcion($this->consignacion);
			}
			
			//consignacion_logic_add::checkconsignacionToGet($this->consignacion,$this->datosCliente);
			//consignacion_logic_add::updateconsignacionToGet($this->consignacion);
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
		$this->consignacion = new  consignacion();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->consignacion=$this->consignacionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->consignacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				consignacion_util::refrescarFKDescripcion($this->consignacion);
			}
			
			//consignacion_logic_add::checkconsignacionToGet($this->consignacion,$this->datosCliente);
			//consignacion_logic_add::updateconsignacionToGet($this->consignacion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?consignacion {
		$consignacionLogic = new  consignacion_logic();
		  		  
        try {		
			$consignacionLogic->setConnexion($connexion);			
			$consignacionLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $consignacionLogic->getconsignacion();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->consignacions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacions);			
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
		$this->consignacions = array();
		  		  
        try {			
			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->consignacions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacions);
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
		$this->consignacions = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$consignacionLogic = new  consignacion_logic();
		  		  
        try {		
			$consignacionLogic->setConnexion($connexion);			
			$consignacionLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $consignacionLogic->getconsignacions();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->consignacions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->consignacions=$this->consignacionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacions);
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
		$this->consignacions = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->consignacions=$this->consignacionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacions);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->consignacions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->consignacions=$this->consignacionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacions);
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
		$this->consignacions = array();
		  		  
        try {			
			$this->consignacions=$this->consignacionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}	
			
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->consignacions = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->consignacions=$this->consignacionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacions);
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
		$this->consignacions = array();
		  		  
        try {		
			$this->consignacions=$this->consignacionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->consignacions);

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
			$parameterSelectionGeneralid_asiento->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento,consignacion_util::$ID_ASIENTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);

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
			$parameterSelectionGeneralid_asiento->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento,consignacion_util::$ID_ASIENTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);
		} catch(Exception $e) {
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
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,consignacion_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);

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
			$parameterSelectionGeneralid_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cliente,consignacion_util::$ID_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cliente);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);
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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,consignacion_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,consignacion_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,consignacion_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,consignacion_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);
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
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,consignacion_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);

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
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,consignacion_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);
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
			$parameterSelectionGeneralid_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_kardex,consignacion_util::$ID_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_kardex);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);

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
			$parameterSelectionGeneralid_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_kardex,consignacion_util::$ID_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_kardex);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);
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
			$parameterSelectionGeneralid_moneda->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_moneda,consignacion_util::$ID_MONEDA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_moneda);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);

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
			$parameterSelectionGeneralid_moneda->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_moneda,consignacion_util::$ID_MONEDA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_moneda);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);
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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,consignacion_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);

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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,consignacion_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);
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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,consignacion_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);

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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,consignacion_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);
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
			$parameterSelectionGeneralid_termino_pago_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_cliente,consignacion_util::$ID_TERMINO_PAGO_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_cliente);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);

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
			$parameterSelectionGeneralid_termino_pago_cliente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_cliente,consignacion_util::$ID_TERMINO_PAGO_CLIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_cliente);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,consignacion_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,consignacion_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);
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
			$parameterSelectionGeneralid_vendedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_vendedor,consignacion_util::$ID_VENDEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_vendedor);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);

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
			$parameterSelectionGeneralid_vendedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_vendedor,consignacion_util::$ID_VENDEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_vendedor);

			$this->consignacions=$this->consignacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			//consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->consignacions);
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
						
			//consignacion_logic_add::checkconsignacionToSave($this->consignacion,$this->datosCliente,$this->connexion);	       
			//consignacion_logic_add::updateconsignacionToSave($this->consignacion);			
			consignacion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->consignacion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->consignacionLogicAdditional->checkGeneralEntityToSave($this,$this->consignacion,$this->datosCliente,$this->connexion);
			
			
			consignacion_data::save($this->consignacion, $this->connexion);	    	       	 				
			//consignacion_logic_add::checkconsignacionToSaveAfter($this->consignacion,$this->datosCliente,$this->connexion);			
			//$this->consignacionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->consignacion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->consignacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->consignacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				consignacion_util::refrescarFKDescripcion($this->consignacion);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->consignacion->getIsDeleted()) {
				$this->consignacion=null;
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
						
			/*consignacion_logic_add::checkconsignacionToSave($this->consignacion,$this->datosCliente,$this->connexion);*/	        
			//consignacion_logic_add::updateconsignacionToSave($this->consignacion);			
			//$this->consignacionLogicAdditional->checkGeneralEntityToSave($this,$this->consignacion,$this->datosCliente,$this->connexion);			
			consignacion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->consignacion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			consignacion_data::save($this->consignacion, $this->connexion);	    	       	 						
			/*consignacion_logic_add::checkconsignacionToSaveAfter($this->consignacion,$this->datosCliente,$this->connexion);*/			
			//$this->consignacionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->consignacion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->consignacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->consignacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				consignacion_util::refrescarFKDescripcion($this->consignacion);				
			}
			
			if($this->consignacion->getIsDeleted()) {
				$this->consignacion=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(consignacion $consignacion,Connexion $connexion)  {
		$consignacionLogic = new  consignacion_logic();		  		  
        try {		
			$consignacionLogic->setConnexion($connexion);			
			$consignacionLogic->setconsignacion($consignacion);			
			$consignacionLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*consignacion_logic_add::checkconsignacionToSaves($this->consignacions,$this->datosCliente,$this->connexion);*/	        	
			//$this->consignacionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->consignacions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->consignacions as $consignacionLocal) {				
								
				//consignacion_logic_add::updateconsignacionToSave($consignacionLocal);	        	
				consignacion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$consignacionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				consignacion_data::save($consignacionLocal, $this->connexion);				
			}
			
			/*consignacion_logic_add::checkconsignacionToSavesAfter($this->consignacions,$this->datosCliente,$this->connexion);*/			
			//$this->consignacionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->consignacions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_util::refrescarFKDescripciones($this->consignacions);
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
			/*consignacion_logic_add::checkconsignacionToSaves($this->consignacions,$this->datosCliente,$this->connexion);*/			
			//$this->consignacionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->consignacions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->consignacions as $consignacionLocal) {				
								
				//consignacion_logic_add::updateconsignacionToSave($consignacionLocal);	        	
				consignacion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$consignacionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				consignacion_data::save($consignacionLocal, $this->connexion);				
			}			
			
			/*consignacion_logic_add::checkconsignacionToSavesAfter($this->consignacions,$this->datosCliente,$this->connexion);*/			
			//$this->consignacionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->consignacions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				consignacion_util::refrescarFKDescripciones($this->consignacions);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $consignacions,Connexion $connexion)  {
		$consignacionLogic = new  consignacion_logic();
		  		  
        try {		
			$consignacionLogic->setConnexion($connexion);			
			$consignacionLogic->setconsignacions($consignacions);			
			$consignacionLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$consignacionsAux=array();
		
		foreach($this->consignacions as $consignacion) {
			if($consignacion->getIsDeleted()==false) {
				$consignacionsAux[]=$consignacion;
			}
		}
		
		$this->consignacions=$consignacionsAux;
	}
	
	public function updateToGetsAuxiliar(array &$consignacions) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->consignacions as $consignacion) {
				
				$consignacion->setid_empresa_Descripcion(consignacion_util::getempresaDescripcion($consignacion->getempresa()));
				$consignacion->setid_sucursal_Descripcion(consignacion_util::getsucursalDescripcion($consignacion->getsucursal()));
				$consignacion->setid_ejercicio_Descripcion(consignacion_util::getejercicioDescripcion($consignacion->getejercicio()));
				$consignacion->setid_periodo_Descripcion(consignacion_util::getperiodoDescripcion($consignacion->getperiodo()));
				$consignacion->setid_usuario_Descripcion(consignacion_util::getusuarioDescripcion($consignacion->getusuario()));
				$consignacion->setid_cliente_Descripcion(consignacion_util::getclienteDescripcion($consignacion->getcliente()));
				$consignacion->setid_vendedor_Descripcion(consignacion_util::getvendedorDescripcion($consignacion->getvendedor()));
				$consignacion->setid_termino_pago_cliente_Descripcion(consignacion_util::gettermino_pago_clienteDescripcion($consignacion->gettermino_pago_cliente()));
				$consignacion->setid_moneda_Descripcion(consignacion_util::getmonedaDescripcion($consignacion->getmoneda()));
				$consignacion->setid_estado_Descripcion(consignacion_util::getestadoDescripcion($consignacion->getestado()));
				$consignacion->setid_kardex_Descripcion(consignacion_util::getkardexDescripcion($consignacion->getkardex()));
				$consignacion->setid_asiento_Descripcion(consignacion_util::getasientoDescripcion($consignacion->getasiento()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$consignacion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$consignacion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$consignacion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$consignacionForeignKey=new consignacion_param_return();//consignacionForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombosclientesFK($this->connexion,$strRecargarFkQuery,$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_vendedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosvendedorsFK($this->connexion,$strRecargarFkQuery,$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_termino_pago_cliente',$strRecargarFkTipos,',')) {
				$this->cargarCombostermino_pago_clientesFK($this->connexion,$strRecargarFkQuery,$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_moneda',$strRecargarFkTipos,',')) {
				$this->cargarCombosmonedasFK($this->connexion,$strRecargarFkQuery,$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado',$strRecargarFkTipos,',')) {
				$this->cargarCombosestadosFK($this->connexion,$strRecargarFkQuery,$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_kardex',$strRecargarFkTipos,',')) {
				$this->cargarComboskardexsFK($this->connexion,$strRecargarFkQuery,$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_asiento',$strRecargarFkTipos,',')) {
				$this->cargarCombosasientosFK($this->connexion,$strRecargarFkQuery,$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosclientesFK($this->connexion,' where id=-1 ',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_vendedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosvendedorsFK($this->connexion,' where id=-1 ',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_termino_pago_cliente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostermino_pago_clientesFK($this->connexion,' where id=-1 ',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_moneda',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosmonedasFK($this->connexion,' where id=-1 ',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_estado',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosestadosFK($this->connexion,' where id=-1 ',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_kardex',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboskardexsFK($this->connexion,' where id=-1 ',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_asiento',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosasientosFK($this->connexion,' where id=-1 ',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $consignacionForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$consignacionForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($consignacion_session==null) {
			$consignacion_session=new consignacion_session();
		}
		
		if($consignacion_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($consignacionForeignKey->idempresaDefaultFK==0) {
					$consignacionForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$consignacionForeignKey->empresasFK[$empresaLocal->getId()]=consignacion_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($consignacion_session->bigidempresaActual!=null && $consignacion_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($consignacion_session->bigidempresaActual);//WithConnection

				$consignacionForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=consignacion_util::getempresaDescripcion($empresaLogic->getempresa());
				$consignacionForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$consignacionForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($consignacion_session==null) {
			$consignacion_session=new consignacion_session();
		}
		
		if($consignacion_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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
				if($consignacionForeignKey->idsucursalDefaultFK==0) {
					$consignacionForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$consignacionForeignKey->sucursalsFK[$sucursalLocal->getId()]=consignacion_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($consignacion_session->bigidsucursalActual!=null && $consignacion_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($consignacion_session->bigidsucursalActual);//WithConnection

				$consignacionForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=consignacion_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$consignacionForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$consignacionForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($consignacion_session==null) {
			$consignacion_session=new consignacion_session();
		}
		
		if($consignacion_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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
				if($consignacionForeignKey->idejercicioDefaultFK==0) {
					$consignacionForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$consignacionForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=consignacion_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($consignacion_session->bigidejercicioActual!=null && $consignacion_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($consignacion_session->bigidejercicioActual);//WithConnection

				$consignacionForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=consignacion_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$consignacionForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$consignacionForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($consignacion_session==null) {
			$consignacion_session=new consignacion_session();
		}
		
		if($consignacion_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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
				if($consignacionForeignKey->idperiodoDefaultFK==0) {
					$consignacionForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$consignacionForeignKey->periodosFK[$periodoLocal->getId()]=consignacion_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($consignacion_session->bigidperiodoActual!=null && $consignacion_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($consignacion_session->bigidperiodoActual);//WithConnection

				$consignacionForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=consignacion_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$consignacionForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$consignacionForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($consignacion_session==null) {
			$consignacion_session=new consignacion_session();
		}
		
		if($consignacion_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($consignacionForeignKey->idusuarioDefaultFK==0) {
					$consignacionForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$consignacionForeignKey->usuariosFK[$usuarioLocal->getId()]=consignacion_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($consignacion_session->bigidusuarioActual!=null && $consignacion_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($consignacion_session->bigidusuarioActual);//WithConnection

				$consignacionForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=consignacion_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$consignacionForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosclientesFK($connexion=null,$strRecargarFkQuery='',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$clienteLogic= new cliente_logic();
		$pagination= new Pagination();
		$consignacionForeignKey->clientesFK=array();

		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($consignacion_session==null) {
			$consignacion_session=new consignacion_session();
		}
		
		if($consignacion_session->bitBusquedaDesdeFKSesioncliente!=true) {
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
				if($consignacionForeignKey->idclienteDefaultFK==0) {
					$consignacionForeignKey->idclienteDefaultFK=$clienteLocal->getId();
				}

				$consignacionForeignKey->clientesFK[$clienteLocal->getId()]=consignacion_util::getclienteDescripcion($clienteLocal);
			}

		} else {

			if($consignacion_session->bigidclienteActual!=null && $consignacion_session->bigidclienteActual > 0) {
				$clienteLogic->getEntity($consignacion_session->bigidclienteActual);//WithConnection

				$consignacionForeignKey->clientesFK[$clienteLogic->getcliente()->getId()]=consignacion_util::getclienteDescripcion($clienteLogic->getcliente());
				$consignacionForeignKey->idclienteDefaultFK=$clienteLogic->getcliente()->getId();
			}
		}
	}

	public function cargarCombosvendedorsFK($connexion=null,$strRecargarFkQuery='',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$vendedorLogic= new vendedor_logic();
		$pagination= new Pagination();
		$consignacionForeignKey->vendedorsFK=array();

		$vendedorLogic->setConnexion($connexion);
		$vendedorLogic->getvendedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($consignacion_session==null) {
			$consignacion_session=new consignacion_session();
		}
		
		if($consignacion_session->bitBusquedaDesdeFKSesionvendedor!=true) {
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
				if($consignacionForeignKey->idvendedorDefaultFK==0) {
					$consignacionForeignKey->idvendedorDefaultFK=$vendedorLocal->getId();
				}

				$consignacionForeignKey->vendedorsFK[$vendedorLocal->getId()]=consignacion_util::getvendedorDescripcion($vendedorLocal);
			}

		} else {

			if($consignacion_session->bigidvendedorActual!=null && $consignacion_session->bigidvendedorActual > 0) {
				$vendedorLogic->getEntity($consignacion_session->bigidvendedorActual);//WithConnection

				$consignacionForeignKey->vendedorsFK[$vendedorLogic->getvendedor()->getId()]=consignacion_util::getvendedorDescripcion($vendedorLogic->getvendedor());
				$consignacionForeignKey->idvendedorDefaultFK=$vendedorLogic->getvendedor()->getId();
			}
		}
	}

	public function cargarCombostermino_pago_clientesFK($connexion=null,$strRecargarFkQuery='',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$termino_pago_clienteLogic= new termino_pago_cliente_logic();
		$pagination= new Pagination();
		$consignacionForeignKey->termino_pago_clientesFK=array();

		$termino_pago_clienteLogic->setConnexion($connexion);
		$termino_pago_clienteLogic->gettermino_pago_clienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($consignacion_session==null) {
			$consignacion_session=new consignacion_session();
		}
		
		if($consignacion_session->bitBusquedaDesdeFKSesiontermino_pago_cliente!=true) {
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
				if($consignacionForeignKey->idtermino_pago_clienteDefaultFK==0) {
					$consignacionForeignKey->idtermino_pago_clienteDefaultFK=$termino_pago_clienteLocal->getId();
				}

				$consignacionForeignKey->termino_pago_clientesFK[$termino_pago_clienteLocal->getId()]=consignacion_util::gettermino_pago_clienteDescripcion($termino_pago_clienteLocal);
			}

		} else {

			if($consignacion_session->bigidtermino_pago_clienteActual!=null && $consignacion_session->bigidtermino_pago_clienteActual > 0) {
				$termino_pago_clienteLogic->getEntity($consignacion_session->bigidtermino_pago_clienteActual);//WithConnection

				$consignacionForeignKey->termino_pago_clientesFK[$termino_pago_clienteLogic->gettermino_pago_cliente()->getId()]=consignacion_util::gettermino_pago_clienteDescripcion($termino_pago_clienteLogic->gettermino_pago_cliente());
				$consignacionForeignKey->idtermino_pago_clienteDefaultFK=$termino_pago_clienteLogic->gettermino_pago_cliente()->getId();
			}
		}
	}

	public function cargarCombosmonedasFK($connexion=null,$strRecargarFkQuery='',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$monedaLogic= new moneda_logic();
		$pagination= new Pagination();
		$consignacionForeignKey->monedasFK=array();

		$monedaLogic->setConnexion($connexion);
		$monedaLogic->getmonedaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($consignacion_session==null) {
			$consignacion_session=new consignacion_session();
		}
		
		if($consignacion_session->bitBusquedaDesdeFKSesionmoneda!=true) {
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
				if($consignacionForeignKey->idmonedaDefaultFK==0) {
					$consignacionForeignKey->idmonedaDefaultFK=$monedaLocal->getId();
				}

				$consignacionForeignKey->monedasFK[$monedaLocal->getId()]=consignacion_util::getmonedaDescripcion($monedaLocal);
			}

		} else {

			if($consignacion_session->bigidmonedaActual!=null && $consignacion_session->bigidmonedaActual > 0) {
				$monedaLogic->getEntity($consignacion_session->bigidmonedaActual);//WithConnection

				$consignacionForeignKey->monedasFK[$monedaLogic->getmoneda()->getId()]=consignacion_util::getmonedaDescripcion($monedaLogic->getmoneda());
				$consignacionForeignKey->idmonedaDefaultFK=$monedaLogic->getmoneda()->getId();
			}
		}
	}

	public function cargarCombosestadosFK($connexion=null,$strRecargarFkQuery='',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$estadoLogic= new estado_logic();
		$pagination= new Pagination();
		$consignacionForeignKey->estadosFK=array();

		$estadoLogic->setConnexion($connexion);
		$estadoLogic->getestadoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($consignacion_session==null) {
			$consignacion_session=new consignacion_session();
		}
		
		if($consignacion_session->bitBusquedaDesdeFKSesionestado!=true) {
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
				if($consignacionForeignKey->idestadoDefaultFK==0) {
					$consignacionForeignKey->idestadoDefaultFK=$estadoLocal->getId();
				}

				$consignacionForeignKey->estadosFK[$estadoLocal->getId()]=consignacion_util::getestadoDescripcion($estadoLocal);
			}

		} else {

			if($consignacion_session->bigidestadoActual!=null && $consignacion_session->bigidestadoActual > 0) {
				$estadoLogic->getEntity($consignacion_session->bigidestadoActual);//WithConnection

				$consignacionForeignKey->estadosFK[$estadoLogic->getestado()->getId()]=consignacion_util::getestadoDescripcion($estadoLogic->getestado());
				$consignacionForeignKey->idestadoDefaultFK=$estadoLogic->getestado()->getId();
			}
		}
	}

	public function cargarComboskardexsFK($connexion=null,$strRecargarFkQuery='',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$kardexLogic= new kardex_logic();
		$pagination= new Pagination();
		$consignacionForeignKey->kardexsFK=array();

		$kardexLogic->setConnexion($connexion);
		$kardexLogic->getkardexDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($consignacion_session==null) {
			$consignacion_session=new consignacion_session();
		}
		
		if($consignacion_session->bitBusquedaDesdeFKSesionkardex!=true) {
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
				if($consignacionForeignKey->idkardexDefaultFK==0) {
					$consignacionForeignKey->idkardexDefaultFK=$kardexLocal->getId();
				}

				$consignacionForeignKey->kardexsFK[$kardexLocal->getId()]=consignacion_util::getkardexDescripcion($kardexLocal);
			}

		} else {

			if($consignacion_session->bigidkardexActual!=null && $consignacion_session->bigidkardexActual > 0) {
				$kardexLogic->getEntity($consignacion_session->bigidkardexActual);//WithConnection

				$consignacionForeignKey->kardexsFK[$kardexLogic->getkardex()->getId()]=consignacion_util::getkardexDescripcion($kardexLogic->getkardex());
				$consignacionForeignKey->idkardexDefaultFK=$kardexLogic->getkardex()->getId();
			}
		}
	}

	public function cargarCombosasientosFK($connexion=null,$strRecargarFkQuery='',$consignacionForeignKey,$consignacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$asientoLogic= new asiento_logic();
		$pagination= new Pagination();
		$consignacionForeignKey->asientosFK=array();

		$asientoLogic->setConnexion($connexion);
		$asientoLogic->getasientoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($consignacion_session==null) {
			$consignacion_session=new consignacion_session();
		}
		
		if($consignacion_session->bitBusquedaDesdeFKSesionasiento!=true) {
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
				if($consignacionForeignKey->idasientoDefaultFK==0) {
					$consignacionForeignKey->idasientoDefaultFK=$asientoLocal->getId();
				}

				$consignacionForeignKey->asientosFK[$asientoLocal->getId()]=consignacion_util::getasientoDescripcion($asientoLocal);
			}

		} else {

			if($consignacion_session->bigidasientoActual!=null && $consignacion_session->bigidasientoActual > 0) {
				$asientoLogic->getEntity($consignacion_session->bigidasientoActual);//WithConnection

				$consignacionForeignKey->asientosFK[$asientoLogic->getasiento()->getId()]=consignacion_util::getasientoDescripcion($asientoLogic->getasiento());
				$consignacionForeignKey->idasientoDefaultFK=$asientoLogic->getasiento()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($consignacion,$imagenconsignacions,$consignaciondetalles) {
		$this->saveRelacionesBase($consignacion,$imagenconsignacions,$consignaciondetalles,true);
	}

	public function saveRelaciones($consignacion,$imagenconsignacions,$consignaciondetalles) {
		$this->saveRelacionesBase($consignacion,$imagenconsignacions,$consignaciondetalles,false);
	}

	public function saveRelacionesBase($consignacion,$imagenconsignacions=array(),$consignaciondetalles=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$consignacion->setimagen_consignacions($imagenconsignacions);
			$consignacion->setconsignacion_detalles($consignaciondetalles);
			$this->setconsignacion($consignacion);

			if(true) {

				//consignacion_logic_add::updateRelacionesToSave($consignacion,$this);

				if(($this->consignacion->getIsNew() || $this->consignacion->getIsChanged()) && !$this->consignacion->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($imagenconsignacions,$consignaciondetalles);

				} else if($this->consignacion->getIsDeleted()) {
					$this->saveRelacionesDetalles($imagenconsignacions,$consignaciondetalles);
					$this->save();
				}

				//consignacion_logic_add::updateRelacionesToSaveAfter($consignacion,$this);

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
	
	
	public function saveRelacionesDetalles($imagenconsignacions=array(),$consignaciondetalles=array()) {
		try {
	

			$idconsignacionActual=$this->getconsignacion()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/imagen_consignacion_carga.php');
			imagen_consignacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$imagenconsignacionLogic_Desde_consignacion=new imagen_consignacion_logic();
			$imagenconsignacionLogic_Desde_consignacion->setimagen_consignacions($imagenconsignacions);

			$imagenconsignacionLogic_Desde_consignacion->setConnexion($this->getConnexion());
			$imagenconsignacionLogic_Desde_consignacion->setDatosCliente($this->datosCliente);

			foreach($imagenconsignacionLogic_Desde_consignacion->getimagen_consignacions() as $imagenconsignacion_Desde_consignacion) {
				$imagenconsignacion_Desde_consignacion->setid_consignacion($idconsignacionActual);
			}

			$imagenconsignacionLogic_Desde_consignacion->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/util/consignacion_detalle_carga.php');
			consignacion_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$consignaciondetalleLogic_Desde_consignacion=new consignacion_detalle_logic();
			$consignaciondetalleLogic_Desde_consignacion->setconsignacion_detalles($consignaciondetalles);

			$consignaciondetalleLogic_Desde_consignacion->setConnexion($this->getConnexion());
			$consignaciondetalleLogic_Desde_consignacion->setDatosCliente($this->datosCliente);

			foreach($consignaciondetalleLogic_Desde_consignacion->getconsignacion_detalles() as $consignaciondetalle_Desde_consignacion) {
				$consignaciondetalle_Desde_consignacion->setid_consignacion($idconsignacionActual);
			}

			$consignaciondetalleLogic_Desde_consignacion->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $consignacions,consignacion_param_return $consignacionParameterGeneral) : consignacion_param_return {
		$consignacionReturnGeneral=new consignacion_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $consignacionReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $consignacions,consignacion_param_return $consignacionParameterGeneral) : consignacion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$consignacionReturnGeneral=new consignacion_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $consignacionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $consignacions,consignacion $consignacion,consignacion_param_return $consignacionParameterGeneral,bool $isEsNuevoconsignacion,array $clases) : consignacion_param_return {
		 try {	
			$consignacionReturnGeneral=new consignacion_param_return();
	
			$consignacionReturnGeneral->setconsignacion($consignacion);
			$consignacionReturnGeneral->setconsignacions($consignacions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$consignacionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $consignacionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $consignacions,consignacion $consignacion,consignacion_param_return $consignacionParameterGeneral,bool $isEsNuevoconsignacion,array $clases) : consignacion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$consignacionReturnGeneral=new consignacion_param_return();
	
			$consignacionReturnGeneral->setconsignacion($consignacion);
			$consignacionReturnGeneral->setconsignacions($consignacions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$consignacionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $consignacionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $consignacions,consignacion $consignacion,consignacion_param_return $consignacionParameterGeneral,bool $isEsNuevoconsignacion,array $clases) : consignacion_param_return {
		 try {	
			$consignacionReturnGeneral=new consignacion_param_return();
	
			$consignacionReturnGeneral->setconsignacion($consignacion);
			$consignacionReturnGeneral->setconsignacions($consignacions);
			
			
			
			return $consignacionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $consignacions,consignacion $consignacion,consignacion_param_return $consignacionParameterGeneral,bool $isEsNuevoconsignacion,array $clases) : consignacion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$consignacionReturnGeneral=new consignacion_param_return();
	
			$consignacionReturnGeneral->setconsignacion($consignacion);
			$consignacionReturnGeneral->setconsignacions($consignacions);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $consignacionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,consignacion $consignacion,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,consignacion $consignacion,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		consignacion_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		consignacion_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(consignacion $consignacion,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//consignacion_logic_add::updateconsignacionToGet($this->consignacion);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$consignacion->setempresa($this->consignacionDataAccess->getempresa($this->connexion,$consignacion));
		$consignacion->setsucursal($this->consignacionDataAccess->getsucursal($this->connexion,$consignacion));
		$consignacion->setejercicio($this->consignacionDataAccess->getejercicio($this->connexion,$consignacion));
		$consignacion->setperiodo($this->consignacionDataAccess->getperiodo($this->connexion,$consignacion));
		$consignacion->setusuario($this->consignacionDataAccess->getusuario($this->connexion,$consignacion));
		$consignacion->setcliente($this->consignacionDataAccess->getcliente($this->connexion,$consignacion));
		$consignacion->setvendedor($this->consignacionDataAccess->getvendedor($this->connexion,$consignacion));
		$consignacion->settermino_pago_cliente($this->consignacionDataAccess->gettermino_pago_cliente($this->connexion,$consignacion));
		$consignacion->setmoneda($this->consignacionDataAccess->getmoneda($this->connexion,$consignacion));
		$consignacion->setestado($this->consignacionDataAccess->getestado($this->connexion,$consignacion));
		$consignacion->setkardex($this->consignacionDataAccess->getkardex($this->connexion,$consignacion));
		$consignacion->setasiento($this->consignacionDataAccess->getasiento($this->connexion,$consignacion));
		$consignacion->setimagen_consignacions($this->consignacionDataAccess->getimagen_consignacions($this->connexion,$consignacion));
		$consignacion->setconsignacion_detalles($this->consignacionDataAccess->getconsignacion_detalles($this->connexion,$consignacion));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$consignacion->setempresa($this->consignacionDataAccess->getempresa($this->connexion,$consignacion));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$consignacion->setsucursal($this->consignacionDataAccess->getsucursal($this->connexion,$consignacion));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$consignacion->setejercicio($this->consignacionDataAccess->getejercicio($this->connexion,$consignacion));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$consignacion->setperiodo($this->consignacionDataAccess->getperiodo($this->connexion,$consignacion));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$consignacion->setusuario($this->consignacionDataAccess->getusuario($this->connexion,$consignacion));
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$consignacion->setcliente($this->consignacionDataAccess->getcliente($this->connexion,$consignacion));
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				$consignacion->setvendedor($this->consignacionDataAccess->getvendedor($this->connexion,$consignacion));
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				$consignacion->settermino_pago_cliente($this->consignacionDataAccess->gettermino_pago_cliente($this->connexion,$consignacion));
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				$consignacion->setmoneda($this->consignacionDataAccess->getmoneda($this->connexion,$consignacion));
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$consignacion->setestado($this->consignacionDataAccess->getestado($this->connexion,$consignacion));
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				$consignacion->setkardex($this->consignacionDataAccess->getkardex($this->connexion,$consignacion));
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				$consignacion->setasiento($this->consignacionDataAccess->getasiento($this->connexion,$consignacion));
				continue;
			}

			if($clas->clas==imagen_consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$consignacion->setimagen_consignacions($this->consignacionDataAccess->getimagen_consignacions($this->connexion,$consignacion));

				if($this->isConDeep) {
					$imagenconsignacionLogic= new imagen_consignacion_logic($this->connexion);
					$imagenconsignacionLogic->setimagen_consignacions($consignacion->getimagen_consignacions());
					$classesLocal=imagen_consignacion_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$imagenconsignacionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					imagen_consignacion_util::refrescarFKDescripciones($imagenconsignacionLogic->getimagen_consignacions());
					$consignacion->setimagen_consignacions($imagenconsignacionLogic->getimagen_consignacions());
				}

				continue;
			}

			if($clas->clas==consignacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$consignacion->setconsignacion_detalles($this->consignacionDataAccess->getconsignacion_detalles($this->connexion,$consignacion));

				if($this->isConDeep) {
					$consignaciondetalleLogic= new consignacion_detalle_logic($this->connexion);
					$consignaciondetalleLogic->setconsignacion_detalles($consignacion->getconsignacion_detalles());
					$classesLocal=consignacion_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$consignaciondetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					consignacion_detalle_util::refrescarFKDescripciones($consignaciondetalleLogic->getconsignacion_detalles());
					$consignacion->setconsignacion_detalles($consignaciondetalleLogic->getconsignacion_detalles());
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
			$consignacion->setempresa($this->consignacionDataAccess->getempresa($this->connexion,$consignacion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->setsucursal($this->consignacionDataAccess->getsucursal($this->connexion,$consignacion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->setejercicio($this->consignacionDataAccess->getejercicio($this->connexion,$consignacion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->setperiodo($this->consignacionDataAccess->getperiodo($this->connexion,$consignacion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->setusuario($this->consignacionDataAccess->getusuario($this->connexion,$consignacion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->setcliente($this->consignacionDataAccess->getcliente($this->connexion,$consignacion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->setvendedor($this->consignacionDataAccess->getvendedor($this->connexion,$consignacion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->settermino_pago_cliente($this->consignacionDataAccess->gettermino_pago_cliente($this->connexion,$consignacion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->setmoneda($this->consignacionDataAccess->getmoneda($this->connexion,$consignacion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->setestado($this->consignacionDataAccess->getestado($this->connexion,$consignacion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->setkardex($this->consignacionDataAccess->getkardex($this->connexion,$consignacion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->setasiento($this->consignacionDataAccess->getasiento($this->connexion,$consignacion));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_consignacion::$class);
			$consignacion->setimagen_consignacions($this->consignacionDataAccess->getimagen_consignacions($this->connexion,$consignacion));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==consignacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(consignacion_detalle::$class);
			$consignacion->setconsignacion_detalles($this->consignacionDataAccess->getconsignacion_detalles($this->connexion,$consignacion));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$consignacion->setempresa($this->consignacionDataAccess->getempresa($this->connexion,$consignacion));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($consignacion->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$consignacion->setsucursal($this->consignacionDataAccess->getsucursal($this->connexion,$consignacion));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($consignacion->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$consignacion->setejercicio($this->consignacionDataAccess->getejercicio($this->connexion,$consignacion));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($consignacion->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$consignacion->setperiodo($this->consignacionDataAccess->getperiodo($this->connexion,$consignacion));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($consignacion->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$consignacion->setusuario($this->consignacionDataAccess->getusuario($this->connexion,$consignacion));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($consignacion->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$consignacion->setcliente($this->consignacionDataAccess->getcliente($this->connexion,$consignacion));
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepLoad($consignacion->getcliente(),$isDeep,$deepLoadType,$clases);
				
		$consignacion->setvendedor($this->consignacionDataAccess->getvendedor($this->connexion,$consignacion));
		$vendedorLogic= new vendedor_logic($this->connexion);
		$vendedorLogic->deepLoad($consignacion->getvendedor(),$isDeep,$deepLoadType,$clases);
				
		$consignacion->settermino_pago_cliente($this->consignacionDataAccess->gettermino_pago_cliente($this->connexion,$consignacion));
		$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
		$termino_pago_clienteLogic->deepLoad($consignacion->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases);
				
		$consignacion->setmoneda($this->consignacionDataAccess->getmoneda($this->connexion,$consignacion));
		$monedaLogic= new moneda_logic($this->connexion);
		$monedaLogic->deepLoad($consignacion->getmoneda(),$isDeep,$deepLoadType,$clases);
				
		$consignacion->setestado($this->consignacionDataAccess->getestado($this->connexion,$consignacion));
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepLoad($consignacion->getestado(),$isDeep,$deepLoadType,$clases);
				
		$consignacion->setkardex($this->consignacionDataAccess->getkardex($this->connexion,$consignacion));
		$kardexLogic= new kardex_logic($this->connexion);
		$kardexLogic->deepLoad($consignacion->getkardex(),$isDeep,$deepLoadType,$clases);
				
		$consignacion->setasiento($this->consignacionDataAccess->getasiento($this->connexion,$consignacion));
		$asientoLogic= new asiento_logic($this->connexion);
		$asientoLogic->deepLoad($consignacion->getasiento(),$isDeep,$deepLoadType,$clases);
				

		$consignacion->setimagen_consignacions($this->consignacionDataAccess->getimagen_consignacions($this->connexion,$consignacion));

		foreach($consignacion->getimagen_consignacions() as $imagenconsignacion) {
			$imagenconsignacionLogic= new imagen_consignacion_logic($this->connexion);
			$imagenconsignacionLogic->deepLoad($imagenconsignacion,$isDeep,$deepLoadType,$clases);
		}

		$consignacion->setconsignacion_detalles($this->consignacionDataAccess->getconsignacion_detalles($this->connexion,$consignacion));

		foreach($consignacion->getconsignacion_detalles() as $consignaciondetalle) {
			$consignaciondetalleLogic= new consignacion_detalle_logic($this->connexion);
			$consignaciondetalleLogic->deepLoad($consignaciondetalle,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$consignacion->setempresa($this->consignacionDataAccess->getempresa($this->connexion,$consignacion));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($consignacion->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$consignacion->setsucursal($this->consignacionDataAccess->getsucursal($this->connexion,$consignacion));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($consignacion->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$consignacion->setejercicio($this->consignacionDataAccess->getejercicio($this->connexion,$consignacion));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($consignacion->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$consignacion->setperiodo($this->consignacionDataAccess->getperiodo($this->connexion,$consignacion));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($consignacion->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$consignacion->setusuario($this->consignacionDataAccess->getusuario($this->connexion,$consignacion));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($consignacion->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				$consignacion->setcliente($this->consignacionDataAccess->getcliente($this->connexion,$consignacion));
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($consignacion->getcliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				$consignacion->setvendedor($this->consignacionDataAccess->getvendedor($this->connexion,$consignacion));
				$vendedorLogic= new vendedor_logic($this->connexion);
				$vendedorLogic->deepLoad($consignacion->getvendedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				$consignacion->settermino_pago_cliente($this->consignacionDataAccess->gettermino_pago_cliente($this->connexion,$consignacion));
				$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
				$termino_pago_clienteLogic->deepLoad($consignacion->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				$consignacion->setmoneda($this->consignacionDataAccess->getmoneda($this->connexion,$consignacion));
				$monedaLogic= new moneda_logic($this->connexion);
				$monedaLogic->deepLoad($consignacion->getmoneda(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$consignacion->setestado($this->consignacionDataAccess->getestado($this->connexion,$consignacion));
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepLoad($consignacion->getestado(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				$consignacion->setkardex($this->consignacionDataAccess->getkardex($this->connexion,$consignacion));
				$kardexLogic= new kardex_logic($this->connexion);
				$kardexLogic->deepLoad($consignacion->getkardex(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				$consignacion->setasiento($this->consignacionDataAccess->getasiento($this->connexion,$consignacion));
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepLoad($consignacion->getasiento(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==imagen_consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$consignacion->setimagen_consignacions($this->consignacionDataAccess->getimagen_consignacions($this->connexion,$consignacion));

				foreach($consignacion->getimagen_consignacions() as $imagenconsignacion) {
					$imagenconsignacionLogic= new imagen_consignacion_logic($this->connexion);
					$imagenconsignacionLogic->deepLoad($imagenconsignacion,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==consignacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$consignacion->setconsignacion_detalles($this->consignacionDataAccess->getconsignacion_detalles($this->connexion,$consignacion));

				foreach($consignacion->getconsignacion_detalles() as $consignaciondetalle) {
					$consignaciondetalleLogic= new consignacion_detalle_logic($this->connexion);
					$consignaciondetalleLogic->deepLoad($consignaciondetalle,$isDeep,$deepLoadType,$clases);
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
			$consignacion->setempresa($this->consignacionDataAccess->getempresa($this->connexion,$consignacion));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($consignacion->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->setsucursal($this->consignacionDataAccess->getsucursal($this->connexion,$consignacion));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($consignacion->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->setejercicio($this->consignacionDataAccess->getejercicio($this->connexion,$consignacion));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($consignacion->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->setperiodo($this->consignacionDataAccess->getperiodo($this->connexion,$consignacion));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($consignacion->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->setusuario($this->consignacionDataAccess->getusuario($this->connexion,$consignacion));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($consignacion->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->setcliente($this->consignacionDataAccess->getcliente($this->connexion,$consignacion));
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($consignacion->getcliente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->setvendedor($this->consignacionDataAccess->getvendedor($this->connexion,$consignacion));
			$vendedorLogic= new vendedor_logic($this->connexion);
			$vendedorLogic->deepLoad($consignacion->getvendedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->settermino_pago_cliente($this->consignacionDataAccess->gettermino_pago_cliente($this->connexion,$consignacion));
			$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
			$termino_pago_clienteLogic->deepLoad($consignacion->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->setmoneda($this->consignacionDataAccess->getmoneda($this->connexion,$consignacion));
			$monedaLogic= new moneda_logic($this->connexion);
			$monedaLogic->deepLoad($consignacion->getmoneda(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->setestado($this->consignacionDataAccess->getestado($this->connexion,$consignacion));
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepLoad($consignacion->getestado(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->setkardex($this->consignacionDataAccess->getkardex($this->connexion,$consignacion));
			$kardexLogic= new kardex_logic($this->connexion);
			$kardexLogic->deepLoad($consignacion->getkardex(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$consignacion->setasiento($this->consignacionDataAccess->getasiento($this->connexion,$consignacion));
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepLoad($consignacion->getasiento(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_consignacion::$class);
			$consignacion->setimagen_consignacions($this->consignacionDataAccess->getimagen_consignacions($this->connexion,$consignacion));

			foreach($consignacion->getimagen_consignacions() as $imagenconsignacion) {
				$imagenconsignacionLogic= new imagen_consignacion_logic($this->connexion);
				$imagenconsignacionLogic->deepLoad($imagenconsignacion,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==consignacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(consignacion_detalle::$class);
			$consignacion->setconsignacion_detalles($this->consignacionDataAccess->getconsignacion_detalles($this->connexion,$consignacion));

			foreach($consignacion->getconsignacion_detalles() as $consignaciondetalle) {
				$consignaciondetalleLogic= new consignacion_detalle_logic($this->connexion);
				$consignaciondetalleLogic->deepLoad($consignaciondetalle,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(consignacion $consignacion,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//consignacion_logic_add::updateconsignacionToSave($this->consignacion);			
			
			if(!$paraDeleteCascade) {				
				consignacion_data::save($consignacion, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($consignacion->getempresa(),$this->connexion);
		sucursal_data::save($consignacion->getsucursal(),$this->connexion);
		ejercicio_data::save($consignacion->getejercicio(),$this->connexion);
		periodo_data::save($consignacion->getperiodo(),$this->connexion);
		usuario_data::save($consignacion->getusuario(),$this->connexion);
		cliente_data::save($consignacion->getcliente(),$this->connexion);
		vendedor_data::save($consignacion->getvendedor(),$this->connexion);
		termino_pago_cliente_data::save($consignacion->gettermino_pago_cliente(),$this->connexion);
		moneda_data::save($consignacion->getmoneda(),$this->connexion);
		estado_data::save($consignacion->getestado(),$this->connexion);
		kardex_data::save($consignacion->getkardex(),$this->connexion);
		asiento_data::save($consignacion->getasiento(),$this->connexion);

		foreach($consignacion->getimagen_consignacions() as $imagenconsignacion) {
			$imagenconsignacion->setid_consignacion($consignacion->getId());
			imagen_consignacion_data::save($imagenconsignacion,$this->connexion);
		}


		foreach($consignacion->getconsignacion_detalles() as $consignaciondetalle) {
			$consignaciondetalle->setid_consignacion($consignacion->getId());
			consignacion_detalle_data::save($consignaciondetalle,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($consignacion->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($consignacion->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($consignacion->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($consignacion->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($consignacion->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($consignacion->getcliente(),$this->connexion);
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				vendedor_data::save($consignacion->getvendedor(),$this->connexion);
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				termino_pago_cliente_data::save($consignacion->gettermino_pago_cliente(),$this->connexion);
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				moneda_data::save($consignacion->getmoneda(),$this->connexion);
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($consignacion->getestado(),$this->connexion);
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				kardex_data::save($consignacion->getkardex(),$this->connexion);
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				asiento_data::save($consignacion->getasiento(),$this->connexion);
				continue;
			}


			if($clas->clas==imagen_consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($consignacion->getimagen_consignacions() as $imagenconsignacion) {
					$imagenconsignacion->setid_consignacion($consignacion->getId());
					imagen_consignacion_data::save($imagenconsignacion,$this->connexion);
				}

				continue;
			}

			if($clas->clas==consignacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($consignacion->getconsignacion_detalles() as $consignaciondetalle) {
					$consignaciondetalle->setid_consignacion($consignacion->getId());
					consignacion_detalle_data::save($consignaciondetalle,$this->connexion);
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
			empresa_data::save($consignacion->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($consignacion->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($consignacion->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($consignacion->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($consignacion->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($consignacion->getcliente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			vendedor_data::save($consignacion->getvendedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_cliente_data::save($consignacion->gettermino_pago_cliente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			moneda_data::save($consignacion->getmoneda(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($consignacion->getestado(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			kardex_data::save($consignacion->getkardex(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_data::save($consignacion->getasiento(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_consignacion::$class);

			foreach($consignacion->getimagen_consignacions() as $imagenconsignacion) {
				$imagenconsignacion->setid_consignacion($consignacion->getId());
				imagen_consignacion_data::save($imagenconsignacion,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==consignacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(consignacion_detalle::$class);

			foreach($consignacion->getconsignacion_detalles() as $consignaciondetalle) {
				$consignaciondetalle->setid_consignacion($consignacion->getId());
				consignacion_detalle_data::save($consignaciondetalle,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($consignacion->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($consignacion->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($consignacion->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($consignacion->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($consignacion->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($consignacion->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($consignacion->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($consignacion->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($consignacion->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($consignacion->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cliente_data::save($consignacion->getcliente(),$this->connexion);
		$clienteLogic= new cliente_logic($this->connexion);
		$clienteLogic->deepSave($consignacion->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		vendedor_data::save($consignacion->getvendedor(),$this->connexion);
		$vendedorLogic= new vendedor_logic($this->connexion);
		$vendedorLogic->deepSave($consignacion->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		termino_pago_cliente_data::save($consignacion->gettermino_pago_cliente(),$this->connexion);
		$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
		$termino_pago_clienteLogic->deepSave($consignacion->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		moneda_data::save($consignacion->getmoneda(),$this->connexion);
		$monedaLogic= new moneda_logic($this->connexion);
		$monedaLogic->deepSave($consignacion->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		estado_data::save($consignacion->getestado(),$this->connexion);
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepSave($consignacion->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		kardex_data::save($consignacion->getkardex(),$this->connexion);
		$kardexLogic= new kardex_logic($this->connexion);
		$kardexLogic->deepSave($consignacion->getkardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		asiento_data::save($consignacion->getasiento(),$this->connexion);
		$asientoLogic= new asiento_logic($this->connexion);
		$asientoLogic->deepSave($consignacion->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($consignacion->getimagen_consignacions() as $imagenconsignacion) {
			$imagenconsignacionLogic= new imagen_consignacion_logic($this->connexion);
			$imagenconsignacion->setid_consignacion($consignacion->getId());
			imagen_consignacion_data::save($imagenconsignacion,$this->connexion);
			$imagenconsignacionLogic->deepSave($imagenconsignacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($consignacion->getconsignacion_detalles() as $consignaciondetalle) {
			$consignaciondetalleLogic= new consignacion_detalle_logic($this->connexion);
			$consignaciondetalle->setid_consignacion($consignacion->getId());
			consignacion_detalle_data::save($consignaciondetalle,$this->connexion);
			$consignaciondetalleLogic->deepSave($consignaciondetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($consignacion->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($consignacion->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($consignacion->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($consignacion->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($consignacion->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($consignacion->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($consignacion->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($consignacion->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($consignacion->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($consignacion->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cliente::$class.'') {
				cliente_data::save($consignacion->getcliente(),$this->connexion);
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepSave($consignacion->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				vendedor_data::save($consignacion->getvendedor(),$this->connexion);
				$vendedorLogic= new vendedor_logic($this->connexion);
				$vendedorLogic->deepSave($consignacion->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==termino_pago_cliente::$class.'') {
				termino_pago_cliente_data::save($consignacion->gettermino_pago_cliente(),$this->connexion);
				$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
				$termino_pago_clienteLogic->deepSave($consignacion->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				moneda_data::save($consignacion->getmoneda(),$this->connexion);
				$monedaLogic= new moneda_logic($this->connexion);
				$monedaLogic->deepSave($consignacion->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($consignacion->getestado(),$this->connexion);
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepSave($consignacion->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				kardex_data::save($consignacion->getkardex(),$this->connexion);
				$kardexLogic= new kardex_logic($this->connexion);
				$kardexLogic->deepSave($consignacion->getkardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				asiento_data::save($consignacion->getasiento(),$this->connexion);
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepSave($consignacion->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==imagen_consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($consignacion->getimagen_consignacions() as $imagenconsignacion) {
					$imagenconsignacionLogic= new imagen_consignacion_logic($this->connexion);
					$imagenconsignacion->setid_consignacion($consignacion->getId());
					imagen_consignacion_data::save($imagenconsignacion,$this->connexion);
					$imagenconsignacionLogic->deepSave($imagenconsignacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==consignacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($consignacion->getconsignacion_detalles() as $consignaciondetalle) {
					$consignaciondetalleLogic= new consignacion_detalle_logic($this->connexion);
					$consignaciondetalle->setid_consignacion($consignacion->getId());
					consignacion_detalle_data::save($consignaciondetalle,$this->connexion);
					$consignaciondetalleLogic->deepSave($consignaciondetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($consignacion->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($consignacion->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($consignacion->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($consignacion->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($consignacion->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($consignacion->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($consignacion->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($consignacion->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($consignacion->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($consignacion->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cliente_data::save($consignacion->getcliente(),$this->connexion);
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepSave($consignacion->getcliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			vendedor_data::save($consignacion->getvendedor(),$this->connexion);
			$vendedorLogic= new vendedor_logic($this->connexion);
			$vendedorLogic->deepSave($consignacion->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_cliente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_cliente_data::save($consignacion->gettermino_pago_cliente(),$this->connexion);
			$termino_pago_clienteLogic= new termino_pago_cliente_logic($this->connexion);
			$termino_pago_clienteLogic->deepSave($consignacion->gettermino_pago_cliente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			moneda_data::save($consignacion->getmoneda(),$this->connexion);
			$monedaLogic= new moneda_logic($this->connexion);
			$monedaLogic->deepSave($consignacion->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($consignacion->getestado(),$this->connexion);
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepSave($consignacion->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			kardex_data::save($consignacion->getkardex(),$this->connexion);
			$kardexLogic= new kardex_logic($this->connexion);
			$kardexLogic->deepSave($consignacion->getkardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_data::save($consignacion->getasiento(),$this->connexion);
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepSave($consignacion->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==imagen_consignacion::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(imagen_consignacion::$class);

			foreach($consignacion->getimagen_consignacions() as $imagenconsignacion) {
				$imagenconsignacionLogic= new imagen_consignacion_logic($this->connexion);
				$imagenconsignacion->setid_consignacion($consignacion->getId());
				imagen_consignacion_data::save($imagenconsignacion,$this->connexion);
				$imagenconsignacionLogic->deepSave($imagenconsignacion,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==consignacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(consignacion_detalle::$class);

			foreach($consignacion->getconsignacion_detalles() as $consignaciondetalle) {
				$consignaciondetalleLogic= new consignacion_detalle_logic($this->connexion);
				$consignaciondetalle->setid_consignacion($consignacion->getId());
				consignacion_detalle_data::save($consignaciondetalle,$this->connexion);
				$consignaciondetalleLogic->deepSave($consignaciondetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				consignacion_data::save($consignacion, $this->connexion);
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
			
			$this->deepLoad($this->consignacion,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->consignacions as $consignacion) {
				$this->deepLoad($consignacion,$isDeep,$deepLoadType,$clases);
								
				consignacion_util::refrescarFKDescripciones($this->consignacions);
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
			
			foreach($this->consignacions as $consignacion) {
				$this->deepLoad($consignacion,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->consignacion,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->consignacions as $consignacion) {
				$this->deepSave($consignacion,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->consignacions as $consignacion) {
				$this->deepSave($consignacion,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(vendedor::$class);
				$classes[]=new Classe(termino_pago_cliente::$class);
				$classes[]=new Classe(moneda::$class);
				$classes[]=new Classe(estado::$class);
				$classes[]=new Classe(kardex::$class);
				$classes[]=new Classe(asiento::$class);
				
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

				foreach($classesP as $clas)
				{
					if($clas->clas==kardex::$class) {
						$classes[]=new Classe(kardex::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==asiento::$class) {
						$classes[]=new Classe(asiento::$class);
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
				
				$classes[]=new Classe(imagen_consignacion::$class);
				$classes[]=new Classe(consignacion_detalle::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==imagen_consignacion::$class) {
						$classes[]=new Classe(imagen_consignacion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==consignacion_detalle::$class) {
						$classes[]=new Classe(consignacion_detalle::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==imagen_consignacion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(imagen_consignacion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==consignacion_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(consignacion_detalle::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getconsignacion() : ?consignacion {	
		/*
		consignacion_logic_add::checkconsignacionToGet($this->consignacion,$this->datosCliente);
		consignacion_logic_add::updateconsignacionToGet($this->consignacion);
		*/
			
		return $this->consignacion;
	}
		
	public function setconsignacion(consignacion $newconsignacion) {
		$this->consignacion = $newconsignacion;
	}
	
	public function getconsignacions() : array {		
		/*
		consignacion_logic_add::checkconsignacionToGets($this->consignacions,$this->datosCliente);
		
		foreach ($this->consignacions as $consignacionLocal ) {
			consignacion_logic_add::updateconsignacionToGet($consignacionLocal);
		}
		*/
		
		return $this->consignacions;
	}
	
	public function setconsignacions(array $newconsignacions) {
		$this->consignacions = $newconsignacions;
	}
	
	public function getconsignacionDataAccess() : consignacion_data {
		return $this->consignacionDataAccess;
	}
	
	public function setconsignacionDataAccess(consignacion_data $newconsignacionDataAccess) {
		$this->consignacionDataAccess = $newconsignacionDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        consignacion_carga::$CONTROLLER;;        
		
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
