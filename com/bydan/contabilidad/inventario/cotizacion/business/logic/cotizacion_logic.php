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

namespace com\bydan\contabilidad\inventario\cotizacion\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_carga;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_param_return;

use com\bydan\contabilidad\inventario\cotizacion\presentation\session\cotizacion_session;

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

use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_util;
use com\bydan\contabilidad\inventario\cotizacion\business\entity\cotizacion;
use com\bydan\contabilidad\inventario\cotizacion\business\data\cotizacion_data;

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

//REL


use com\bydan\contabilidad\inventario\cotizacion_detalle\business\entity\cotizacion_detalle;
use com\bydan\contabilidad\inventario\cotizacion_detalle\business\data\cotizacion_detalle_data;
use com\bydan\contabilidad\inventario\cotizacion_detalle\business\logic\cotizacion_detalle_logic;
use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_carga;
use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_util;

//REL DETALLES




class cotizacion_logic  extends GeneralEntityLogic implements cotizacion_logicI {	
	/*GENERAL*/
	public cotizacion_data $cotizacionDataAccess;
	public ?cotizacion_logic_add $cotizacionLogicAdditional=null;
	public ?cotizacion $cotizacion;
	public array $cotizacions;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->cotizacionDataAccess = new cotizacion_data();			
			$this->cotizacions = array();
			$this->cotizacion = new cotizacion();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->cotizacionLogicAdditional = new cotizacion_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->cotizacionLogicAdditional==null) {
			$this->cotizacionLogicAdditional=new cotizacion_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->cotizacionDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->cotizacionDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->cotizacionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->cotizacionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->cotizacions = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacions);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->cotizacions = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacions);
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
		$this->cotizacion = new cotizacion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->cotizacion=$this->cotizacionDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cotizacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cotizacion_util::refrescarFKDescripcion($this->cotizacion);
			}
						
			cotizacion_logic_add::checkcotizacionToGet($this->cotizacion,$this->datosCliente);
			cotizacion_logic_add::updatecotizacionToGet($this->cotizacion);
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
		$this->cotizacion = new  cotizacion();
		  		  
        try {		
			$this->cotizacion=$this->cotizacionDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cotizacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cotizacion_util::refrescarFKDescripcion($this->cotizacion);
			}
			
			cotizacion_logic_add::checkcotizacionToGet($this->cotizacion,$this->datosCliente);
			cotizacion_logic_add::updatecotizacionToGet($this->cotizacion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?cotizacion {
		$cotizacionLogic = new  cotizacion_logic();
		  		  
        try {		
			$cotizacionLogic->setConnexion($connexion);			
			$cotizacionLogic->getEntity($id);			
			return $cotizacionLogic->getcotizacion();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->cotizacion = new  cotizacion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->cotizacion=$this->cotizacionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->cotizacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cotizacion_util::refrescarFKDescripcion($this->cotizacion);
			}
			
			cotizacion_logic_add::checkcotizacionToGet($this->cotizacion,$this->datosCliente);
			cotizacion_logic_add::updatecotizacionToGet($this->cotizacion);
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
		$this->cotizacion = new  cotizacion();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cotizacion=$this->cotizacionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->cotizacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				cotizacion_util::refrescarFKDescripcion($this->cotizacion);
			}
			
			cotizacion_logic_add::checkcotizacionToGet($this->cotizacion,$this->datosCliente);
			cotizacion_logic_add::updatecotizacionToGet($this->cotizacion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?cotizacion {
		$cotizacionLogic = new  cotizacion_logic();
		  		  
        try {		
			$cotizacionLogic->setConnexion($connexion);			
			$cotizacionLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $cotizacionLogic->getcotizacion();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cotizacions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacions);			
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
		$this->cotizacions = array();
		  		  
        try {			
			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->cotizacions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacions);
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
		$this->cotizacions = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$cotizacionLogic = new  cotizacion_logic();
		  		  
        try {		
			$cotizacionLogic->setConnexion($connexion);			
			$cotizacionLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $cotizacionLogic->getcotizacions();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->cotizacions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->cotizacions=$this->cotizacionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacions);
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
		$this->cotizacions = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cotizacions=$this->cotizacionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacions);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->cotizacions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->cotizacions=$this->cotizacionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacions);
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
		$this->cotizacions = array();
		  		  
        try {			
			$this->cotizacions=$this->cotizacionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}	
			
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->cotizacions = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->cotizacions=$this->cotizacionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacions);
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
		$this->cotizacions = array();
		  		  
        try {		
			$this->cotizacions=$this->cotizacionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->cotizacions);

		}  catch(Exception $e) {						
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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,cotizacion_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacions);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,cotizacion_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacions);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cotizacion_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacions);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,cotizacion_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacions);
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
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,cotizacion_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacions);

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
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,cotizacion_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacions);
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
			$parameterSelectionGeneralid_moneda->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_moneda,cotizacion_util::$ID_MONEDA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_moneda);

			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacions);

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
			$parameterSelectionGeneralid_moneda->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_moneda,cotizacion_util::$ID_MONEDA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_moneda);

			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacions);
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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,cotizacion_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacions);

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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,cotizacion_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacions);
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
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,cotizacion_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacions);

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
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,cotizacion_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacions);
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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,cotizacion_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacions);

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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,cotizacion_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacions);
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
			$parameterSelectionGeneralid_termino_pago_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_proveedor,cotizacion_util::$ID_TERMINO_PAGO_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_proveedor);

			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacions);

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
			$parameterSelectionGeneralid_termino_pago_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_proveedor,cotizacion_util::$ID_TERMINO_PAGO_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_proveedor);

			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacions);
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,cotizacion_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacions);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,cotizacion_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacions);
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
			$parameterSelectionGeneralid_vendedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_vendedor,cotizacion_util::$ID_VENDEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_vendedor);

			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacions);

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
			$parameterSelectionGeneralid_vendedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_vendedor,cotizacion_util::$ID_VENDEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_vendedor);

			$this->cotizacions=$this->cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->cotizacions);
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
						
			//cotizacion_logic_add::checkcotizacionToSave($this->cotizacion,$this->datosCliente,$this->connexion);	       
			cotizacion_logic_add::updatecotizacionToSave($this->cotizacion);			
			cotizacion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cotizacion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->cotizacionLogicAdditional->checkGeneralEntityToSave($this,$this->cotizacion,$this->datosCliente,$this->connexion);
			
			
			cotizacion_data::save($this->cotizacion, $this->connexion);	    	       	 				
			//cotizacion_logic_add::checkcotizacionToSaveAfter($this->cotizacion,$this->datosCliente,$this->connexion);			
			$this->cotizacionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cotizacion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cotizacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cotizacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cotizacion_util::refrescarFKDescripcion($this->cotizacion);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->cotizacion->getIsDeleted()) {
				$this->cotizacion=null;
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
						
			/*cotizacion_logic_add::checkcotizacionToSave($this->cotizacion,$this->datosCliente,$this->connexion);*/	        
			cotizacion_logic_add::updatecotizacionToSave($this->cotizacion);			
			$this->cotizacionLogicAdditional->checkGeneralEntityToSave($this,$this->cotizacion,$this->datosCliente,$this->connexion);			
			cotizacion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->cotizacion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			cotizacion_data::save($this->cotizacion, $this->connexion);	    	       	 						
			/*cotizacion_logic_add::checkcotizacionToSaveAfter($this->cotizacion,$this->datosCliente,$this->connexion);*/			
			$this->cotizacionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->cotizacion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->cotizacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->cotizacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				cotizacion_util::refrescarFKDescripcion($this->cotizacion);				
			}
			
			if($this->cotizacion->getIsDeleted()) {
				$this->cotizacion=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(cotizacion $cotizacion,Connexion $connexion)  {
		$cotizacionLogic = new  cotizacion_logic();		  		  
        try {		
			$cotizacionLogic->setConnexion($connexion);			
			$cotizacionLogic->setcotizacion($cotizacion);			
			$cotizacionLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*cotizacion_logic_add::checkcotizacionToSaves($this->cotizacions,$this->datosCliente,$this->connexion);*/	        	
			$this->cotizacionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cotizacions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cotizacions as $cotizacionLocal) {				
								
				cotizacion_logic_add::updatecotizacionToSave($cotizacionLocal);	        	
				cotizacion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cotizacionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				cotizacion_data::save($cotizacionLocal, $this->connexion);				
			}
			
			/*cotizacion_logic_add::checkcotizacionToSavesAfter($this->cotizacions,$this->datosCliente,$this->connexion);*/			
			$this->cotizacionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cotizacions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
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
			/*cotizacion_logic_add::checkcotizacionToSaves($this->cotizacions,$this->datosCliente,$this->connexion);*/			
			$this->cotizacionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->cotizacions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->cotizacions as $cotizacionLocal) {				
								
				cotizacion_logic_add::updatecotizacionToSave($cotizacionLocal);	        	
				cotizacion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$cotizacionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				cotizacion_data::save($cotizacionLocal, $this->connexion);				
			}			
			
			/*cotizacion_logic_add::checkcotizacionToSavesAfter($this->cotizacions,$this->datosCliente,$this->connexion);*/			
			$this->cotizacionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->cotizacions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $cotizacions,Connexion $connexion)  {
		$cotizacionLogic = new  cotizacion_logic();
		  		  
        try {		
			$cotizacionLogic->setConnexion($connexion);			
			$cotizacionLogic->setcotizacions($cotizacions);			
			$cotizacionLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$cotizacionsAux=array();
		
		foreach($this->cotizacions as $cotizacion) {
			if($cotizacion->getIsDeleted()==false) {
				$cotizacionsAux[]=$cotizacion;
			}
		}
		
		$this->cotizacions=$cotizacionsAux;
	}
	
	public function updateToGetsAuxiliar(array &$cotizacions) {
		if($this->cotizacionLogicAdditional==null) {
			$this->cotizacionLogicAdditional=new cotizacion_logic_add();
		}
		
		
		$this->cotizacionLogicAdditional->updateToGets($cotizacions,$this);					
		$this->cotizacionLogicAdditional->updateToGetsReferencia($cotizacions,$this);			
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->cotizacions as $cotizacion) {
				
				$cotizacion->setid_empresa_Descripcion(cotizacion_util::getempresaDescripcion($cotizacion->getempresa()));
				$cotizacion->setid_sucursal_Descripcion(cotizacion_util::getsucursalDescripcion($cotizacion->getsucursal()));
				$cotizacion->setid_ejercicio_Descripcion(cotizacion_util::getejercicioDescripcion($cotizacion->getejercicio()));
				$cotizacion->setid_periodo_Descripcion(cotizacion_util::getperiodoDescripcion($cotizacion->getperiodo()));
				$cotizacion->setid_usuario_Descripcion(cotizacion_util::getusuarioDescripcion($cotizacion->getusuario()));
				$cotizacion->setid_proveedor_Descripcion(cotizacion_util::getproveedorDescripcion($cotizacion->getproveedor()));
				$cotizacion->setid_vendedor_Descripcion(cotizacion_util::getvendedorDescripcion($cotizacion->getvendedor()));
				$cotizacion->setid_termino_pago_proveedor_Descripcion(cotizacion_util::gettermino_pago_proveedorDescripcion($cotizacion->gettermino_pago_proveedor()));
				$cotizacion->setid_moneda_Descripcion(cotizacion_util::getmonedaDescripcion($cotizacion->getmoneda()));
				$cotizacion->setid_estado_Descripcion(cotizacion_util::getestadoDescripcion($cotizacion->getestado()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cotizacion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cotizacion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$cotizacion_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$cotizacionForeignKey=new cotizacion_param_return();//cotizacionForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosproveedorsFK($this->connexion,$strRecargarFkQuery,$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_vendedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosvendedorsFK($this->connexion,$strRecargarFkQuery,$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_termino_pago_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombostermino_pago_proveedorsFK($this->connexion,$strRecargarFkQuery,$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_moneda',$strRecargarFkTipos,',')) {
				$this->cargarCombosmonedasFK($this->connexion,$strRecargarFkQuery,$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado',$strRecargarFkTipos,',')) {
				$this->cargarCombosestadosFK($this->connexion,$strRecargarFkQuery,$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproveedorsFK($this->connexion,' where id=-1 ',$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_vendedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosvendedorsFK($this->connexion,' where id=-1 ',$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_termino_pago_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostermino_pago_proveedorsFK($this->connexion,' where id=-1 ',$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_moneda',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosmonedasFK($this->connexion,' where id=-1 ',$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_estado',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosestadosFK($this->connexion,' where id=-1 ',$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $cotizacionForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$cotizacionForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		if($cotizacion_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($cotizacionForeignKey->idempresaDefaultFK==0) {
					$cotizacionForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$cotizacionForeignKey->empresasFK[$empresaLocal->getId()]=cotizacion_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($cotizacion_session->bigidempresaActual!=null && $cotizacion_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cotizacion_session->bigidempresaActual);//WithConnection

				$cotizacionForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=cotizacion_util::getempresaDescripcion($empresaLogic->getempresa());
				$cotizacionForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$cotizacionForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		if($cotizacion_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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
				if($cotizacionForeignKey->idsucursalDefaultFK==0) {
					$cotizacionForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$cotizacionForeignKey->sucursalsFK[$sucursalLocal->getId()]=cotizacion_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($cotizacion_session->bigidsucursalActual!=null && $cotizacion_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($cotizacion_session->bigidsucursalActual);//WithConnection

				$cotizacionForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=cotizacion_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$cotizacionForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$cotizacionForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		if($cotizacion_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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
				if($cotizacionForeignKey->idejercicioDefaultFK==0) {
					$cotizacionForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$cotizacionForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=cotizacion_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($cotizacion_session->bigidejercicioActual!=null && $cotizacion_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($cotizacion_session->bigidejercicioActual);//WithConnection

				$cotizacionForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=cotizacion_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$cotizacionForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$cotizacionForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		if($cotizacion_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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
				if($cotizacionForeignKey->idperiodoDefaultFK==0) {
					$cotizacionForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$cotizacionForeignKey->periodosFK[$periodoLocal->getId()]=cotizacion_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($cotizacion_session->bigidperiodoActual!=null && $cotizacion_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($cotizacion_session->bigidperiodoActual);//WithConnection

				$cotizacionForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=cotizacion_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$cotizacionForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$cotizacionForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		if($cotizacion_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($cotizacionForeignKey->idusuarioDefaultFK==0) {
					$cotizacionForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$cotizacionForeignKey->usuariosFK[$usuarioLocal->getId()]=cotizacion_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($cotizacion_session->bigidusuarioActual!=null && $cotizacion_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($cotizacion_session->bigidusuarioActual);//WithConnection

				$cotizacionForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=cotizacion_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$cotizacionForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosproveedorsFK($connexion=null,$strRecargarFkQuery='',$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$proveedorLogic= new proveedor_logic();
		$pagination= new Pagination();
		$cotizacionForeignKey->proveedorsFK=array();

		$proveedorLogic->setConnexion($connexion);
		$proveedorLogic->getproveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		if($cotizacion_session->bitBusquedaDesdeFKSesionproveedor!=true) {
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
				if($cotizacionForeignKey->idproveedorDefaultFK==0) {
					$cotizacionForeignKey->idproveedorDefaultFK=$proveedorLocal->getId();
				}

				$cotizacionForeignKey->proveedorsFK[$proveedorLocal->getId()]=cotizacion_util::getproveedorDescripcion($proveedorLocal);
			}

		} else {

			if($cotizacion_session->bigidproveedorActual!=null && $cotizacion_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($cotizacion_session->bigidproveedorActual);//WithConnection

				$cotizacionForeignKey->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=cotizacion_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$cotizacionForeignKey->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	public function cargarCombosvendedorsFK($connexion=null,$strRecargarFkQuery='',$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$vendedorLogic= new vendedor_logic();
		$pagination= new Pagination();
		$cotizacionForeignKey->vendedorsFK=array();

		$vendedorLogic->setConnexion($connexion);
		$vendedorLogic->getvendedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		if($cotizacion_session->bitBusquedaDesdeFKSesionvendedor!=true) {
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
				if($cotizacionForeignKey->idvendedorDefaultFK==0) {
					$cotizacionForeignKey->idvendedorDefaultFK=$vendedorLocal->getId();
				}

				$cotizacionForeignKey->vendedorsFK[$vendedorLocal->getId()]=cotizacion_util::getvendedorDescripcion($vendedorLocal);
			}

		} else {

			if($cotizacion_session->bigidvendedorActual!=null && $cotizacion_session->bigidvendedorActual > 0) {
				$vendedorLogic->getEntity($cotizacion_session->bigidvendedorActual);//WithConnection

				$cotizacionForeignKey->vendedorsFK[$vendedorLogic->getvendedor()->getId()]=cotizacion_util::getvendedorDescripcion($vendedorLogic->getvendedor());
				$cotizacionForeignKey->idvendedorDefaultFK=$vendedorLogic->getvendedor()->getId();
			}
		}
	}

	public function cargarCombostermino_pago_proveedorsFK($connexion=null,$strRecargarFkQuery='',$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic();
		$pagination= new Pagination();
		$cotizacionForeignKey->termino_pago_proveedorsFK=array();

		$termino_pago_proveedorLogic->setConnexion($connexion);
		$termino_pago_proveedorLogic->gettermino_pago_proveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		if($cotizacion_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor!=true) {
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
				if($cotizacionForeignKey->idtermino_pago_proveedorDefaultFK==0) {
					$cotizacionForeignKey->idtermino_pago_proveedorDefaultFK=$termino_pago_proveedorLocal->getId();
				}

				$cotizacionForeignKey->termino_pago_proveedorsFK[$termino_pago_proveedorLocal->getId()]=cotizacion_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLocal);
			}

		} else {

			if($cotizacion_session->bigidtermino_pago_proveedorActual!=null && $cotizacion_session->bigidtermino_pago_proveedorActual > 0) {
				$termino_pago_proveedorLogic->getEntity($cotizacion_session->bigidtermino_pago_proveedorActual);//WithConnection

				$cotizacionForeignKey->termino_pago_proveedorsFK[$termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId()]=cotizacion_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLogic->gettermino_pago_proveedor());
				$cotizacionForeignKey->idtermino_pago_proveedorDefaultFK=$termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId();
			}
		}
	}

	public function cargarCombosmonedasFK($connexion=null,$strRecargarFkQuery='',$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$monedaLogic= new moneda_logic();
		$pagination= new Pagination();
		$cotizacionForeignKey->monedasFK=array();

		$monedaLogic->setConnexion($connexion);
		$monedaLogic->getmonedaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		if($cotizacion_session->bitBusquedaDesdeFKSesionmoneda!=true) {
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
				if($cotizacionForeignKey->idmonedaDefaultFK==0) {
					$cotizacionForeignKey->idmonedaDefaultFK=$monedaLocal->getId();
				}

				$cotizacionForeignKey->monedasFK[$monedaLocal->getId()]=cotizacion_util::getmonedaDescripcion($monedaLocal);
			}

		} else {

			if($cotizacion_session->bigidmonedaActual!=null && $cotizacion_session->bigidmonedaActual > 0) {
				$monedaLogic->getEntity($cotizacion_session->bigidmonedaActual);//WithConnection

				$cotizacionForeignKey->monedasFK[$monedaLogic->getmoneda()->getId()]=cotizacion_util::getmonedaDescripcion($monedaLogic->getmoneda());
				$cotizacionForeignKey->idmonedaDefaultFK=$monedaLogic->getmoneda()->getId();
			}
		}
	}

	public function cargarCombosestadosFK($connexion=null,$strRecargarFkQuery='',$cotizacionForeignKey,$cotizacion_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$estadoLogic= new estado_logic();
		$pagination= new Pagination();
		$cotizacionForeignKey->estadosFK=array();

		$estadoLogic->setConnexion($connexion);
		$estadoLogic->getestadoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		if($cotizacion_session->bitBusquedaDesdeFKSesionestado!=true) {
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
				if($cotizacionForeignKey->idestadoDefaultFK==0) {
					$cotizacionForeignKey->idestadoDefaultFK=$estadoLocal->getId();
				}

				$cotizacionForeignKey->estadosFK[$estadoLocal->getId()]=cotizacion_util::getestadoDescripcion($estadoLocal);
			}

		} else {

			if($cotizacion_session->bigidestadoActual!=null && $cotizacion_session->bigidestadoActual > 0) {
				$estadoLogic->getEntity($cotizacion_session->bigidestadoActual);//WithConnection

				$cotizacionForeignKey->estadosFK[$estadoLogic->getestado()->getId()]=cotizacion_util::getestadoDescripcion($estadoLogic->getestado());
				$cotizacionForeignKey->idestadoDefaultFK=$estadoLogic->getestado()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($cotizacion,$cotizaciondetalles) {
		$this->saveRelacionesBase($cotizacion,$cotizaciondetalles,true);
	}

	public function saveRelaciones($cotizacion,$cotizaciondetalles) {
		$this->saveRelacionesBase($cotizacion,$cotizaciondetalles,false);
	}

	public function saveRelacionesBase($cotizacion,$cotizaciondetalles=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$cotizacion->setcotizacion_detalles($cotizaciondetalles);
			$this->setcotizacion($cotizacion);

			if(cotizacion_logic_add::validarSaveRelaciones($cotizacion,$this)) {

				cotizacion_logic_add::updateRelacionesToSave($cotizacion,$this);

				if(($this->cotizacion->getIsNew() || $this->cotizacion->getIsChanged()) && !$this->cotizacion->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($cotizaciondetalles);

				} else if($this->cotizacion->getIsDeleted()) {
					$this->saveRelacionesDetalles($cotizaciondetalles);
					$this->save();
				}

				cotizacion_logic_add::updateRelacionesToSaveAfter($cotizacion,$this);

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
	
	
	public function saveRelacionesDetalles($cotizaciondetalles=array()) {
		try {
	

			$idcotizacionActual=$this->getcotizacion()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/cotizacion_detalle_carga.php');
			cotizacion_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cotizaciondetalleLogic_Desde_cotizacion=new cotizacion_detalle_logic();
			$cotizaciondetalleLogic_Desde_cotizacion->setcotizacion_detalles($cotizaciondetalles);

			$cotizaciondetalleLogic_Desde_cotizacion->setConnexion($this->getConnexion());
			$cotizaciondetalleLogic_Desde_cotizacion->setDatosCliente($this->datosCliente);

			foreach($cotizaciondetalleLogic_Desde_cotizacion->getcotizacion_detalles() as $cotizaciondetalle_Desde_cotizacion) {
				$cotizaciondetalle_Desde_cotizacion->setid_cotizacion($idcotizacionActual);
			}

			$cotizaciondetalleLogic_Desde_cotizacion->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $cotizacions,cotizacion_param_return $cotizacionParameterGeneral) : cotizacion_param_return {
		$cotizacionReturnGeneral=new cotizacion_param_return();
	
		 try {	
			
			if($this->cotizacionLogicAdditional==null) {
				$this->cotizacionLogicAdditional=new cotizacion_logic_add();
			}
			
			$this->cotizacionLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$cotizacions,$cotizacionParameterGeneral,$cotizacionReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $cotizacionReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $cotizacions,cotizacion_param_return $cotizacionParameterGeneral) : cotizacion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cotizacionReturnGeneral=new cotizacion_param_return();
	
			
			if($this->cotizacionLogicAdditional==null) {
				$this->cotizacionLogicAdditional=new cotizacion_logic_add();
			}
			
			$this->cotizacionLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$cotizacions,$cotizacionParameterGeneral,$cotizacionReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $cotizacionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cotizacions,cotizacion $cotizacion,cotizacion_param_return $cotizacionParameterGeneral,bool $isEsNuevocotizacion,array $clases) : cotizacion_param_return {
		 try {	
			$cotizacionReturnGeneral=new cotizacion_param_return();
	
			$cotizacionReturnGeneral->setcotizacion($cotizacion);
			$cotizacionReturnGeneral->setcotizacions($cotizacions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cotizacionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->cotizacionLogicAdditional==null) {
				$this->cotizacionLogicAdditional=new cotizacion_logic_add();
			}
			
			$cotizacionReturnGeneral=$this->cotizacionLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cotizacions,$cotizacion,$cotizacionParameterGeneral,$cotizacionReturnGeneral,$isEsNuevocotizacion,$clases);
			
			/*cotizacionLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cotizacions,$cotizacion,$cotizacionParameterGeneral,$cotizacionReturnGeneral,$isEsNuevocotizacion,$clases);*/
			
			return $cotizacionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cotizacions,cotizacion $cotizacion,cotizacion_param_return $cotizacionParameterGeneral,bool $isEsNuevocotizacion,array $clases) : cotizacion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cotizacionReturnGeneral=new cotizacion_param_return();
	
			$cotizacionReturnGeneral->setcotizacion($cotizacion);
			$cotizacionReturnGeneral->setcotizacions($cotizacions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$cotizacionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->cotizacionLogicAdditional==null) {
				$this->cotizacionLogicAdditional=new cotizacion_logic_add();
			}
			
			$cotizacionReturnGeneral=$this->cotizacionLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cotizacions,$cotizacion,$cotizacionParameterGeneral,$cotizacionReturnGeneral,$isEsNuevocotizacion,$clases);
			
			/*cotizacionLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cotizacions,$cotizacion,$cotizacionParameterGeneral,$cotizacionReturnGeneral,$isEsNuevocotizacion,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $cotizacionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cotizacions,cotizacion $cotizacion,cotizacion_param_return $cotizacionParameterGeneral,bool $isEsNuevocotizacion,array $clases) : cotizacion_param_return {
		 try {	
			$cotizacionReturnGeneral=new cotizacion_param_return();
	
			$cotizacionReturnGeneral->setcotizacion($cotizacion);
			$cotizacionReturnGeneral->setcotizacions($cotizacions);
			
			
			
			if($this->cotizacionLogicAdditional==null) {
				$this->cotizacionLogicAdditional=new cotizacion_logic_add();
			}
			
			$cotizacionReturnGeneral=$this->cotizacionLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cotizacions,$cotizacion,$cotizacionParameterGeneral,$cotizacionReturnGeneral,$isEsNuevocotizacion,$clases);
			
			/*cotizacionLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cotizacions,$cotizacion,$cotizacionParameterGeneral,$cotizacionReturnGeneral,$isEsNuevocotizacion,$clases);*/
			
			return $cotizacionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $cotizacions,cotizacion $cotizacion,cotizacion_param_return $cotizacionParameterGeneral,bool $isEsNuevocotizacion,array $clases) : cotizacion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$cotizacionReturnGeneral=new cotizacion_param_return();
	
			$cotizacionReturnGeneral->setcotizacion($cotizacion);
			$cotizacionReturnGeneral->setcotizacions($cotizacions);
			
			
			if($this->cotizacionLogicAdditional==null) {
				$this->cotizacionLogicAdditional=new cotizacion_logic_add();
			}
			
			$cotizacionReturnGeneral=$this->cotizacionLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cotizacions,$cotizacion,$cotizacionParameterGeneral,$cotizacionReturnGeneral,$isEsNuevocotizacion,$clases);
			
			/*cotizacionLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$cotizacions,$cotizacion,$cotizacionParameterGeneral,$cotizacionReturnGeneral,$isEsNuevocotizacion,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $cotizacionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,cotizacion $cotizacion,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,cotizacion $cotizacion,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		cotizacion_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		cotizacion_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(cotizacion $cotizacion,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			cotizacion_logic_add::updatecotizacionToGet($this->cotizacion);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cotizacion->setempresa($this->cotizacionDataAccess->getempresa($this->connexion,$cotizacion));
		$cotizacion->setsucursal($this->cotizacionDataAccess->getsucursal($this->connexion,$cotizacion));
		$cotizacion->setejercicio($this->cotizacionDataAccess->getejercicio($this->connexion,$cotizacion));
		$cotizacion->setperiodo($this->cotizacionDataAccess->getperiodo($this->connexion,$cotizacion));
		$cotizacion->setusuario($this->cotizacionDataAccess->getusuario($this->connexion,$cotizacion));
		$cotizacion->setproveedor($this->cotizacionDataAccess->getproveedor($this->connexion,$cotizacion));
		$cotizacion->setvendedor($this->cotizacionDataAccess->getvendedor($this->connexion,$cotizacion));
		$cotizacion->settermino_pago_proveedor($this->cotizacionDataAccess->gettermino_pago_proveedor($this->connexion,$cotizacion));
		$cotizacion->setmoneda($this->cotizacionDataAccess->getmoneda($this->connexion,$cotizacion));
		$cotizacion->setestado($this->cotizacionDataAccess->getestado($this->connexion,$cotizacion));
		$cotizacion->setcotizacion_detalles($this->cotizacionDataAccess->getcotizacion_detalles($this->connexion,$cotizacion));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cotizacion->setempresa($this->cotizacionDataAccess->getempresa($this->connexion,$cotizacion));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$cotizacion->setsucursal($this->cotizacionDataAccess->getsucursal($this->connexion,$cotizacion));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$cotizacion->setejercicio($this->cotizacionDataAccess->getejercicio($this->connexion,$cotizacion));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$cotizacion->setperiodo($this->cotizacionDataAccess->getperiodo($this->connexion,$cotizacion));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$cotizacion->setusuario($this->cotizacionDataAccess->getusuario($this->connexion,$cotizacion));
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$cotizacion->setproveedor($this->cotizacionDataAccess->getproveedor($this->connexion,$cotizacion));
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				$cotizacion->setvendedor($this->cotizacionDataAccess->getvendedor($this->connexion,$cotizacion));
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				$cotizacion->settermino_pago_proveedor($this->cotizacionDataAccess->gettermino_pago_proveedor($this->connexion,$cotizacion));
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				$cotizacion->setmoneda($this->cotizacionDataAccess->getmoneda($this->connexion,$cotizacion));
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$cotizacion->setestado($this->cotizacionDataAccess->getestado($this->connexion,$cotizacion));
				continue;
			}

			if($clas->clas==cotizacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cotizacion->setcotizacion_detalles($this->cotizacionDataAccess->getcotizacion_detalles($this->connexion,$cotizacion));

				if($this->isConDeep) {
					$cotizaciondetalleLogic= new cotizacion_detalle_logic($this->connexion);
					$cotizaciondetalleLogic->setcotizacion_detalles($cotizacion->getcotizacion_detalles());
					$classesLocal=cotizacion_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cotizaciondetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cotizacion_detalle_util::refrescarFKDescripciones($cotizaciondetalleLogic->getcotizacion_detalles());
					$cotizacion->setcotizacion_detalles($cotizaciondetalleLogic->getcotizacion_detalles());
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
			$cotizacion->setempresa($this->cotizacionDataAccess->getempresa($this->connexion,$cotizacion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion->setsucursal($this->cotizacionDataAccess->getsucursal($this->connexion,$cotizacion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion->setejercicio($this->cotizacionDataAccess->getejercicio($this->connexion,$cotizacion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion->setperiodo($this->cotizacionDataAccess->getperiodo($this->connexion,$cotizacion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion->setusuario($this->cotizacionDataAccess->getusuario($this->connexion,$cotizacion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion->setproveedor($this->cotizacionDataAccess->getproveedor($this->connexion,$cotizacion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion->setvendedor($this->cotizacionDataAccess->getvendedor($this->connexion,$cotizacion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion->settermino_pago_proveedor($this->cotizacionDataAccess->gettermino_pago_proveedor($this->connexion,$cotizacion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion->setmoneda($this->cotizacionDataAccess->getmoneda($this->connexion,$cotizacion));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion->setestado($this->cotizacionDataAccess->getestado($this->connexion,$cotizacion));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cotizacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cotizacion_detalle::$class);
			$cotizacion->setcotizacion_detalles($this->cotizacionDataAccess->getcotizacion_detalles($this->connexion,$cotizacion));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$cotizacion->setempresa($this->cotizacionDataAccess->getempresa($this->connexion,$cotizacion));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($cotizacion->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$cotizacion->setsucursal($this->cotizacionDataAccess->getsucursal($this->connexion,$cotizacion));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($cotizacion->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$cotizacion->setejercicio($this->cotizacionDataAccess->getejercicio($this->connexion,$cotizacion));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($cotizacion->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$cotizacion->setperiodo($this->cotizacionDataAccess->getperiodo($this->connexion,$cotizacion));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($cotizacion->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$cotizacion->setusuario($this->cotizacionDataAccess->getusuario($this->connexion,$cotizacion));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($cotizacion->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$cotizacion->setproveedor($this->cotizacionDataAccess->getproveedor($this->connexion,$cotizacion));
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepLoad($cotizacion->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		$cotizacion->setvendedor($this->cotizacionDataAccess->getvendedor($this->connexion,$cotizacion));
		$vendedorLogic= new vendedor_logic($this->connexion);
		$vendedorLogic->deepLoad($cotizacion->getvendedor(),$isDeep,$deepLoadType,$clases);
				
		$cotizacion->settermino_pago_proveedor($this->cotizacionDataAccess->gettermino_pago_proveedor($this->connexion,$cotizacion));
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
		$termino_pago_proveedorLogic->deepLoad($cotizacion->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases);
				
		$cotizacion->setmoneda($this->cotizacionDataAccess->getmoneda($this->connexion,$cotizacion));
		$monedaLogic= new moneda_logic($this->connexion);
		$monedaLogic->deepLoad($cotizacion->getmoneda(),$isDeep,$deepLoadType,$clases);
				
		$cotizacion->setestado($this->cotizacionDataAccess->getestado($this->connexion,$cotizacion));
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepLoad($cotizacion->getestado(),$isDeep,$deepLoadType,$clases);
				

		$cotizacion->setcotizacion_detalles($this->cotizacionDataAccess->getcotizacion_detalles($this->connexion,$cotizacion));

		foreach($cotizacion->getcotizacion_detalles() as $cotizaciondetalle) {
			$cotizaciondetalleLogic= new cotizacion_detalle_logic($this->connexion);
			$cotizaciondetalleLogic->deepLoad($cotizaciondetalle,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$cotizacion->setempresa($this->cotizacionDataAccess->getempresa($this->connexion,$cotizacion));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($cotizacion->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$cotizacion->setsucursal($this->cotizacionDataAccess->getsucursal($this->connexion,$cotizacion));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($cotizacion->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$cotizacion->setejercicio($this->cotizacionDataAccess->getejercicio($this->connexion,$cotizacion));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($cotizacion->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$cotizacion->setperiodo($this->cotizacionDataAccess->getperiodo($this->connexion,$cotizacion));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($cotizacion->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$cotizacion->setusuario($this->cotizacionDataAccess->getusuario($this->connexion,$cotizacion));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($cotizacion->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$cotizacion->setproveedor($this->cotizacionDataAccess->getproveedor($this->connexion,$cotizacion));
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($cotizacion->getproveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				$cotizacion->setvendedor($this->cotizacionDataAccess->getvendedor($this->connexion,$cotizacion));
				$vendedorLogic= new vendedor_logic($this->connexion);
				$vendedorLogic->deepLoad($cotizacion->getvendedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				$cotizacion->settermino_pago_proveedor($this->cotizacionDataAccess->gettermino_pago_proveedor($this->connexion,$cotizacion));
				$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
				$termino_pago_proveedorLogic->deepLoad($cotizacion->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				$cotizacion->setmoneda($this->cotizacionDataAccess->getmoneda($this->connexion,$cotizacion));
				$monedaLogic= new moneda_logic($this->connexion);
				$monedaLogic->deepLoad($cotizacion->getmoneda(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$cotizacion->setestado($this->cotizacionDataAccess->getestado($this->connexion,$cotizacion));
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepLoad($cotizacion->getestado(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cotizacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$cotizacion->setcotizacion_detalles($this->cotizacionDataAccess->getcotizacion_detalles($this->connexion,$cotizacion));

				foreach($cotizacion->getcotizacion_detalles() as $cotizaciondetalle) {
					$cotizaciondetalleLogic= new cotizacion_detalle_logic($this->connexion);
					$cotizaciondetalleLogic->deepLoad($cotizaciondetalle,$isDeep,$deepLoadType,$clases);
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
			$cotizacion->setempresa($this->cotizacionDataAccess->getempresa($this->connexion,$cotizacion));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($cotizacion->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion->setsucursal($this->cotizacionDataAccess->getsucursal($this->connexion,$cotizacion));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($cotizacion->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion->setejercicio($this->cotizacionDataAccess->getejercicio($this->connexion,$cotizacion));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($cotizacion->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion->setperiodo($this->cotizacionDataAccess->getperiodo($this->connexion,$cotizacion));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($cotizacion->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion->setusuario($this->cotizacionDataAccess->getusuario($this->connexion,$cotizacion));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($cotizacion->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion->setproveedor($this->cotizacionDataAccess->getproveedor($this->connexion,$cotizacion));
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($cotizacion->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion->setvendedor($this->cotizacionDataAccess->getvendedor($this->connexion,$cotizacion));
			$vendedorLogic= new vendedor_logic($this->connexion);
			$vendedorLogic->deepLoad($cotizacion->getvendedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion->settermino_pago_proveedor($this->cotizacionDataAccess->gettermino_pago_proveedor($this->connexion,$cotizacion));
			$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
			$termino_pago_proveedorLogic->deepLoad($cotizacion->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion->setmoneda($this->cotizacionDataAccess->getmoneda($this->connexion,$cotizacion));
			$monedaLogic= new moneda_logic($this->connexion);
			$monedaLogic->deepLoad($cotizacion->getmoneda(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$cotizacion->setestado($this->cotizacionDataAccess->getestado($this->connexion,$cotizacion));
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepLoad($cotizacion->getestado(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cotizacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cotizacion_detalle::$class);
			$cotizacion->setcotizacion_detalles($this->cotizacionDataAccess->getcotizacion_detalles($this->connexion,$cotizacion));

			foreach($cotizacion->getcotizacion_detalles() as $cotizaciondetalle) {
				$cotizaciondetalleLogic= new cotizacion_detalle_logic($this->connexion);
				$cotizaciondetalleLogic->deepLoad($cotizaciondetalle,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(cotizacion $cotizacion,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			cotizacion_logic_add::updatecotizacionToSave($this->cotizacion);			
			
			if(!$paraDeleteCascade) {				
				cotizacion_data::save($cotizacion, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($cotizacion->getempresa(),$this->connexion);
		sucursal_data::save($cotizacion->getsucursal(),$this->connexion);
		ejercicio_data::save($cotizacion->getejercicio(),$this->connexion);
		periodo_data::save($cotizacion->getperiodo(),$this->connexion);
		usuario_data::save($cotizacion->getusuario(),$this->connexion);
		proveedor_data::save($cotizacion->getproveedor(),$this->connexion);
		vendedor_data::save($cotizacion->getvendedor(),$this->connexion);
		termino_pago_proveedor_data::save($cotizacion->gettermino_pago_proveedor(),$this->connexion);
		moneda_data::save($cotizacion->getmoneda(),$this->connexion);
		estado_data::save($cotizacion->getestado(),$this->connexion);

		foreach($cotizacion->getcotizacion_detalles() as $cotizaciondetalle) {
			$cotizaciondetalle->setid_cotizacion($cotizacion->getId());
			cotizacion_detalle_data::save($cotizaciondetalle,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cotizacion->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($cotizacion->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($cotizacion->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($cotizacion->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($cotizacion->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($cotizacion->getproveedor(),$this->connexion);
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				vendedor_data::save($cotizacion->getvendedor(),$this->connexion);
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				termino_pago_proveedor_data::save($cotizacion->gettermino_pago_proveedor(),$this->connexion);
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				moneda_data::save($cotizacion->getmoneda(),$this->connexion);
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($cotizacion->getestado(),$this->connexion);
				continue;
			}


			if($clas->clas==cotizacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cotizacion->getcotizacion_detalles() as $cotizaciondetalle) {
					$cotizaciondetalle->setid_cotizacion($cotizacion->getId());
					cotizacion_detalle_data::save($cotizaciondetalle,$this->connexion);
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
			empresa_data::save($cotizacion->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($cotizacion->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($cotizacion->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($cotizacion->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($cotizacion->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($cotizacion->getproveedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			vendedor_data::save($cotizacion->getvendedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_proveedor_data::save($cotizacion->gettermino_pago_proveedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			moneda_data::save($cotizacion->getmoneda(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($cotizacion->getestado(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cotizacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cotizacion_detalle::$class);

			foreach($cotizacion->getcotizacion_detalles() as $cotizaciondetalle) {
				$cotizaciondetalle->setid_cotizacion($cotizacion->getId());
				cotizacion_detalle_data::save($cotizaciondetalle,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($cotizacion->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($cotizacion->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($cotizacion->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($cotizacion->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($cotizacion->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($cotizacion->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($cotizacion->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($cotizacion->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($cotizacion->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($cotizacion->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		proveedor_data::save($cotizacion->getproveedor(),$this->connexion);
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepSave($cotizacion->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		vendedor_data::save($cotizacion->getvendedor(),$this->connexion);
		$vendedorLogic= new vendedor_logic($this->connexion);
		$vendedorLogic->deepSave($cotizacion->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		termino_pago_proveedor_data::save($cotizacion->gettermino_pago_proveedor(),$this->connexion);
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
		$termino_pago_proveedorLogic->deepSave($cotizacion->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		moneda_data::save($cotizacion->getmoneda(),$this->connexion);
		$monedaLogic= new moneda_logic($this->connexion);
		$monedaLogic->deepSave($cotizacion->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		estado_data::save($cotizacion->getestado(),$this->connexion);
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepSave($cotizacion->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($cotizacion->getcotizacion_detalles() as $cotizaciondetalle) {
			$cotizaciondetalleLogic= new cotizacion_detalle_logic($this->connexion);
			$cotizaciondetalle->setid_cotizacion($cotizacion->getId());
			cotizacion_detalle_data::save($cotizaciondetalle,$this->connexion);
			$cotizaciondetalleLogic->deepSave($cotizaciondetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($cotizacion->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($cotizacion->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($cotizacion->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($cotizacion->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($cotizacion->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($cotizacion->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($cotizacion->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($cotizacion->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($cotizacion->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($cotizacion->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($cotizacion->getproveedor(),$this->connexion);
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepSave($cotizacion->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				vendedor_data::save($cotizacion->getvendedor(),$this->connexion);
				$vendedorLogic= new vendedor_logic($this->connexion);
				$vendedorLogic->deepSave($cotizacion->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				termino_pago_proveedor_data::save($cotizacion->gettermino_pago_proveedor(),$this->connexion);
				$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
				$termino_pago_proveedorLogic->deepSave($cotizacion->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				moneda_data::save($cotizacion->getmoneda(),$this->connexion);
				$monedaLogic= new moneda_logic($this->connexion);
				$monedaLogic->deepSave($cotizacion->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($cotizacion->getestado(),$this->connexion);
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepSave($cotizacion->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==cotizacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($cotizacion->getcotizacion_detalles() as $cotizaciondetalle) {
					$cotizaciondetalleLogic= new cotizacion_detalle_logic($this->connexion);
					$cotizaciondetalle->setid_cotizacion($cotizacion->getId());
					cotizacion_detalle_data::save($cotizaciondetalle,$this->connexion);
					$cotizaciondetalleLogic->deepSave($cotizaciondetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($cotizacion->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($cotizacion->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($cotizacion->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($cotizacion->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($cotizacion->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($cotizacion->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($cotizacion->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($cotizacion->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($cotizacion->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($cotizacion->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($cotizacion->getproveedor(),$this->connexion);
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepSave($cotizacion->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			vendedor_data::save($cotizacion->getvendedor(),$this->connexion);
			$vendedorLogic= new vendedor_logic($this->connexion);
			$vendedorLogic->deepSave($cotizacion->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_proveedor_data::save($cotizacion->gettermino_pago_proveedor(),$this->connexion);
			$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
			$termino_pago_proveedorLogic->deepSave($cotizacion->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			moneda_data::save($cotizacion->getmoneda(),$this->connexion);
			$monedaLogic= new moneda_logic($this->connexion);
			$monedaLogic->deepSave($cotizacion->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($cotizacion->getestado(),$this->connexion);
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepSave($cotizacion->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cotizacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cotizacion_detalle::$class);

			foreach($cotizacion->getcotizacion_detalles() as $cotizaciondetalle) {
				$cotizaciondetalleLogic= new cotizacion_detalle_logic($this->connexion);
				$cotizaciondetalle->setid_cotizacion($cotizacion->getId());
				cotizacion_detalle_data::save($cotizaciondetalle,$this->connexion);
				$cotizaciondetalleLogic->deepSave($cotizaciondetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				cotizacion_data::save($cotizacion, $this->connexion);
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
			
			$this->deepLoad($this->cotizacion,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->cotizacions as $cotizacion) {
				$this->deepLoad($cotizacion,$isDeep,$deepLoadType,$clases);
								
				cotizacion_util::refrescarFKDescripciones($this->cotizacions);
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
			
			foreach($this->cotizacions as $cotizacion) {
				$this->deepLoad($cotizacion,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->cotizacion,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->cotizacions as $cotizacion) {
				$this->deepSave($cotizacion,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->cotizacions as $cotizacion) {
				$this->deepSave($cotizacion,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(cotizacion_detalle::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==cotizacion_detalle::$class) {
						$classes[]=new Classe(cotizacion_detalle::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==cotizacion_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cotizacion_detalle::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getcotizacion() : ?cotizacion {	
		/*
		cotizacion_logic_add::checkcotizacionToGet($this->cotizacion,$this->datosCliente);
		cotizacion_logic_add::updatecotizacionToGet($this->cotizacion);
		*/
			
		return $this->cotizacion;
	}
		
	public function setcotizacion(cotizacion $newcotizacion) {
		$this->cotizacion = $newcotizacion;
	}
	
	public function getcotizacions() : array {		
		/*
		cotizacion_logic_add::checkcotizacionToGets($this->cotizacions,$this->datosCliente);
		
		foreach ($this->cotizacions as $cotizacionLocal ) {
			cotizacion_logic_add::updatecotizacionToGet($cotizacionLocal);
		}
		*/
		
		return $this->cotizacions;
	}
	
	public function setcotizacions(array $newcotizacions) {
		$this->cotizacions = $newcotizacions;
	}
	
	public function getcotizacionDataAccess() : cotizacion_data {
		return $this->cotizacionDataAccess;
	}
	
	public function setcotizacionDataAccess(cotizacion_data $newcotizacionDataAccess) {
		$this->cotizacionDataAccess = $newcotizacionDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        cotizacion_carga::$CONTROLLER;;        
		
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
