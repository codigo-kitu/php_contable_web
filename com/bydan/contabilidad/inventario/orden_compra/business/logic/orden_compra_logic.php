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

namespace com\bydan\contabilidad\inventario\orden_compra\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_param_return;

use com\bydan\contabilidad\inventario\orden_compra\presentation\session\orden_compra_session;

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

use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;
use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;
use com\bydan\contabilidad\inventario\orden_compra\business\data\orden_compra_data;

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


use com\bydan\contabilidad\inventario\orden_compra_detalle\business\entity\orden_compra_detalle;
use com\bydan\contabilidad\inventario\orden_compra_detalle\business\data\orden_compra_detalle_data;
use com\bydan\contabilidad\inventario\orden_compra_detalle\business\logic\orden_compra_detalle_logic;
use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_carga;
use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_util;

//REL DETALLES




class orden_compra_logic  extends GeneralEntityLogic implements orden_compra_logicI {	
	/*GENERAL*/
	public orden_compra_data $orden_compraDataAccess;
	public ?orden_compra_logic_add $orden_compraLogicAdditional=null;
	public ?orden_compra $orden_compra;
	public array $orden_compras;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->orden_compraDataAccess = new orden_compra_data();			
			$this->orden_compras = array();
			$this->orden_compra = new orden_compra();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->orden_compraLogicAdditional = new orden_compra_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->orden_compraLogicAdditional==null) {
			$this->orden_compraLogicAdditional=new orden_compra_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->orden_compraDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->orden_compraDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->orden_compraDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->orden_compraDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->orden_compras = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compras);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->orden_compras = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compras);
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
		$this->orden_compra = new orden_compra();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->orden_compra=$this->orden_compraDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->orden_compra,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				orden_compra_util::refrescarFKDescripcion($this->orden_compra);
			}
						
			orden_compra_logic_add::checkorden_compraToGet($this->orden_compra,$this->datosCliente);
			orden_compra_logic_add::updateorden_compraToGet($this->orden_compra);
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
		$this->orden_compra = new  orden_compra();
		  		  
        try {		
			$this->orden_compra=$this->orden_compraDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->orden_compra,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				orden_compra_util::refrescarFKDescripcion($this->orden_compra);
			}
			
			orden_compra_logic_add::checkorden_compraToGet($this->orden_compra,$this->datosCliente);
			orden_compra_logic_add::updateorden_compraToGet($this->orden_compra);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?orden_compra {
		$orden_compraLogic = new  orden_compra_logic();
		  		  
        try {		
			$orden_compraLogic->setConnexion($connexion);			
			$orden_compraLogic->getEntity($id);			
			return $orden_compraLogic->getorden_compra();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->orden_compra = new  orden_compra();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->orden_compra=$this->orden_compraDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->orden_compra,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				orden_compra_util::refrescarFKDescripcion($this->orden_compra);
			}
			
			orden_compra_logic_add::checkorden_compraToGet($this->orden_compra,$this->datosCliente);
			orden_compra_logic_add::updateorden_compraToGet($this->orden_compra);
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
		$this->orden_compra = new  orden_compra();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->orden_compra=$this->orden_compraDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->orden_compra,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				orden_compra_util::refrescarFKDescripcion($this->orden_compra);
			}
			
			orden_compra_logic_add::checkorden_compraToGet($this->orden_compra,$this->datosCliente);
			orden_compra_logic_add::updateorden_compraToGet($this->orden_compra);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?orden_compra {
		$orden_compraLogic = new  orden_compra_logic();
		  		  
        try {		
			$orden_compraLogic->setConnexion($connexion);			
			$orden_compraLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $orden_compraLogic->getorden_compra();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->orden_compras = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compras);			
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
		$this->orden_compras = array();
		  		  
        try {			
			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compras);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->orden_compras = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compras);
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
		$this->orden_compras = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compras);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$orden_compraLogic = new  orden_compra_logic();
		  		  
        try {		
			$orden_compraLogic->setConnexion($connexion);			
			$orden_compraLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $orden_compraLogic->getorden_compras();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->orden_compras = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->orden_compras=$this->orden_compraDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compras);
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
		$this->orden_compras = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->orden_compras=$this->orden_compraDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compras);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->orden_compras = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->orden_compras=$this->orden_compraDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compras);
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
		$this->orden_compras = array();
		  		  
        try {			
			$this->orden_compras=$this->orden_compraDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}	
			
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compras);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->orden_compras = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->orden_compras=$this->orden_compraDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compras);
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
		$this->orden_compras = array();
		  		  
        try {		
			$this->orden_compras=$this->orden_compraDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->orden_compras);

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
			$parameterSelectionGeneralid_asiento->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento,orden_compra_util::$ID_ASIENTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);

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
			$parameterSelectionGeneralid_asiento->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_asiento,orden_compra_util::$ID_ASIENTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_asiento);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);
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
			$parameterSelectionGeneralid_documento_cuenta_pagar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_cuenta_pagar,orden_compra_util::$ID_DOCUMENTO_CUENTA_PAGAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_cuenta_pagar);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);

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
			$parameterSelectionGeneralid_documento_cuenta_pagar->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_documento_cuenta_pagar,orden_compra_util::$ID_DOCUMENTO_CUENTA_PAGAR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_documento_cuenta_pagar);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);
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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,orden_compra_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,orden_compra_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,orden_compra_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,orden_compra_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);
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
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,orden_compra_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);

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
			$parameterSelectionGeneralid_estado->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado,orden_compra_util::$ID_ESTADO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);
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
			$parameterSelectionGeneralid_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_kardex,orden_compra_util::$ID_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_kardex);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);

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
			$parameterSelectionGeneralid_kardex->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_kardex,orden_compra_util::$ID_KARDEX,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_kardex);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);
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
			$parameterSelectionGeneralid_moneda->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_moneda,orden_compra_util::$ID_MONEDA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_moneda);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);

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
			$parameterSelectionGeneralid_moneda->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_moneda,orden_compra_util::$ID_MONEDA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_moneda);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);
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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,orden_compra_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);

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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,orden_compra_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);
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
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,orden_compra_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);

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
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,orden_compra_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);
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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,orden_compra_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);

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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,orden_compra_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);
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
			$parameterSelectionGeneralid_termino_pago_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_proveedor,orden_compra_util::$ID_TERMINO_PAGO_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_proveedor);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);

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
			$parameterSelectionGeneralid_termino_pago_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_termino_pago_proveedor,orden_compra_util::$ID_TERMINO_PAGO_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_termino_pago_proveedor);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,orden_compra_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,orden_compra_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);
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
			$parameterSelectionGeneralid_vendedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_vendedor,orden_compra_util::$ID_VENDEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_vendedor);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);

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
			$parameterSelectionGeneralid_vendedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_vendedor,orden_compra_util::$ID_VENDEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_vendedor);

			$this->orden_compras=$this->orden_compraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->orden_compras);
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
						
			//orden_compra_logic_add::checkorden_compraToSave($this->orden_compra,$this->datosCliente,$this->connexion);	       
			orden_compra_logic_add::updateorden_compraToSave($this->orden_compra);			
			orden_compra_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->orden_compra,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->orden_compraLogicAdditional->checkGeneralEntityToSave($this,$this->orden_compra,$this->datosCliente,$this->connexion);
			
			
			orden_compra_data::save($this->orden_compra, $this->connexion);	    	       	 				
			//orden_compra_logic_add::checkorden_compraToSaveAfter($this->orden_compra,$this->datosCliente,$this->connexion);			
			$this->orden_compraLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->orden_compra,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->orden_compra,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->orden_compra,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				orden_compra_util::refrescarFKDescripcion($this->orden_compra);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->orden_compra->getIsDeleted()) {
				$this->orden_compra=null;
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
						
			/*orden_compra_logic_add::checkorden_compraToSave($this->orden_compra,$this->datosCliente,$this->connexion);*/	        
			orden_compra_logic_add::updateorden_compraToSave($this->orden_compra);			
			$this->orden_compraLogicAdditional->checkGeneralEntityToSave($this,$this->orden_compra,$this->datosCliente,$this->connexion);			
			orden_compra_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->orden_compra,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			orden_compra_data::save($this->orden_compra, $this->connexion);	    	       	 						
			/*orden_compra_logic_add::checkorden_compraToSaveAfter($this->orden_compra,$this->datosCliente,$this->connexion);*/			
			$this->orden_compraLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->orden_compra,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->orden_compra,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->orden_compra,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				orden_compra_util::refrescarFKDescripcion($this->orden_compra);				
			}
			
			if($this->orden_compra->getIsDeleted()) {
				$this->orden_compra=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(orden_compra $orden_compra,Connexion $connexion)  {
		$orden_compraLogic = new  orden_compra_logic();		  		  
        try {		
			$orden_compraLogic->setConnexion($connexion);			
			$orden_compraLogic->setorden_compra($orden_compra);			
			$orden_compraLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*orden_compra_logic_add::checkorden_compraToSaves($this->orden_compras,$this->datosCliente,$this->connexion);*/	        	
			$this->orden_compraLogicAdditional->checkGeneralEntitiesToSaves($this,$this->orden_compras,$this->datosCliente,$this->connexion);
			
	   		foreach($this->orden_compras as $orden_compraLocal) {				
								
				orden_compra_logic_add::updateorden_compraToSave($orden_compraLocal);	        	
				orden_compra_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$orden_compraLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				orden_compra_data::save($orden_compraLocal, $this->connexion);				
			}
			
			/*orden_compra_logic_add::checkorden_compraToSavesAfter($this->orden_compras,$this->datosCliente,$this->connexion);*/			
			$this->orden_compraLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->orden_compras,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
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
			/*orden_compra_logic_add::checkorden_compraToSaves($this->orden_compras,$this->datosCliente,$this->connexion);*/			
			$this->orden_compraLogicAdditional->checkGeneralEntitiesToSaves($this,$this->orden_compras,$this->datosCliente,$this->connexion);
			
	   		foreach($this->orden_compras as $orden_compraLocal) {				
								
				orden_compra_logic_add::updateorden_compraToSave($orden_compraLocal);	        	
				orden_compra_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$orden_compraLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				orden_compra_data::save($orden_compraLocal, $this->connexion);				
			}			
			
			/*orden_compra_logic_add::checkorden_compraToSavesAfter($this->orden_compras,$this->datosCliente,$this->connexion);*/			
			$this->orden_compraLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->orden_compras,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $orden_compras,Connexion $connexion)  {
		$orden_compraLogic = new  orden_compra_logic();
		  		  
        try {		
			$orden_compraLogic->setConnexion($connexion);			
			$orden_compraLogic->setorden_compras($orden_compras);			
			$orden_compraLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$orden_comprasAux=array();
		
		foreach($this->orden_compras as $orden_compra) {
			if($orden_compra->getIsDeleted()==false) {
				$orden_comprasAux[]=$orden_compra;
			}
		}
		
		$this->orden_compras=$orden_comprasAux;
	}
	
	public function updateToGetsAuxiliar(array &$orden_compras) {
		if($this->orden_compraLogicAdditional==null) {
			$this->orden_compraLogicAdditional=new orden_compra_logic_add();
		}
		
		
		$this->orden_compraLogicAdditional->updateToGets($orden_compras,$this);					
		$this->orden_compraLogicAdditional->updateToGetsReferencia($orden_compras,$this);			
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->orden_compras as $orden_compra) {
				
				$orden_compra->setid_empresa_Descripcion(orden_compra_util::getempresaDescripcion($orden_compra->getempresa()));
				$orden_compra->setid_sucursal_Descripcion(orden_compra_util::getsucursalDescripcion($orden_compra->getsucursal()));
				$orden_compra->setid_ejercicio_Descripcion(orden_compra_util::getejercicioDescripcion($orden_compra->getejercicio()));
				$orden_compra->setid_periodo_Descripcion(orden_compra_util::getperiodoDescripcion($orden_compra->getperiodo()));
				$orden_compra->setid_usuario_Descripcion(orden_compra_util::getusuarioDescripcion($orden_compra->getusuario()));
				$orden_compra->setid_proveedor_Descripcion(orden_compra_util::getproveedorDescripcion($orden_compra->getproveedor()));
				$orden_compra->setid_vendedor_Descripcion(orden_compra_util::getvendedorDescripcion($orden_compra->getvendedor()));
				$orden_compra->setid_termino_pago_proveedor_Descripcion(orden_compra_util::gettermino_pago_proveedorDescripcion($orden_compra->gettermino_pago_proveedor()));
				$orden_compra->setid_moneda_Descripcion(orden_compra_util::getmonedaDescripcion($orden_compra->getmoneda()));
				$orden_compra->setid_estado_Descripcion(orden_compra_util::getestadoDescripcion($orden_compra->getestado()));
				$orden_compra->setid_asiento_Descripcion(orden_compra_util::getasientoDescripcion($orden_compra->getasiento()));
				$orden_compra->setid_documento_cuenta_pagar_Descripcion(orden_compra_util::getdocumento_cuenta_pagarDescripcion($orden_compra->getdocumento_cuenta_pagar()));
				$orden_compra->setid_kardex_Descripcion(orden_compra_util::getkardexDescripcion($orden_compra->getkardex()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$orden_compra_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$orden_compra_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$orden_compra_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$orden_compraForeignKey=new orden_compra_param_return();//orden_compraForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosproveedorsFK($this->connexion,$strRecargarFkQuery,$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_vendedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosvendedorsFK($this->connexion,$strRecargarFkQuery,$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_termino_pago_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombostermino_pago_proveedorsFK($this->connexion,$strRecargarFkQuery,$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_moneda',$strRecargarFkTipos,',')) {
				$this->cargarCombosmonedasFK($this->connexion,$strRecargarFkQuery,$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado',$strRecargarFkTipos,',')) {
				$this->cargarCombosestadosFK($this->connexion,$strRecargarFkQuery,$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_asiento',$strRecargarFkTipos,',')) {
				$this->cargarCombosasientosFK($this->connexion,$strRecargarFkQuery,$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_documento_cuenta_pagar',$strRecargarFkTipos,',')) {
				$this->cargarCombosdocumento_cuenta_pagarsFK($this->connexion,$strRecargarFkQuery,$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_kardex',$strRecargarFkTipos,',')) {
				$this->cargarComboskardexsFK($this->connexion,$strRecargarFkQuery,$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproveedorsFK($this->connexion,' where id=-1 ',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_vendedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosvendedorsFK($this->connexion,' where id=-1 ',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_termino_pago_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostermino_pago_proveedorsFK($this->connexion,' where id=-1 ',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_moneda',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosmonedasFK($this->connexion,' where id=-1 ',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_estado',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosestadosFK($this->connexion,' where id=-1 ',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_asiento',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosasientosFK($this->connexion,' where id=-1 ',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_documento_cuenta_pagar',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosdocumento_cuenta_pagarsFK($this->connexion,' where id=-1 ',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_kardex',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboskardexsFK($this->connexion,' where id=-1 ',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $orden_compraForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$orden_compraForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}
		
		if($orden_compra_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($orden_compraForeignKey->idempresaDefaultFK==0) {
					$orden_compraForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$orden_compraForeignKey->empresasFK[$empresaLocal->getId()]=orden_compra_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($orden_compra_session->bigidempresaActual!=null && $orden_compra_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($orden_compra_session->bigidempresaActual);//WithConnection

				$orden_compraForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=orden_compra_util::getempresaDescripcion($empresaLogic->getempresa());
				$orden_compraForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$orden_compraForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}
		
		if($orden_compra_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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
				if($orden_compraForeignKey->idsucursalDefaultFK==0) {
					$orden_compraForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$orden_compraForeignKey->sucursalsFK[$sucursalLocal->getId()]=orden_compra_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($orden_compra_session->bigidsucursalActual!=null && $orden_compra_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($orden_compra_session->bigidsucursalActual);//WithConnection

				$orden_compraForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=orden_compra_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$orden_compraForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$orden_compraForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}
		
		if($orden_compra_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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
				if($orden_compraForeignKey->idejercicioDefaultFK==0) {
					$orden_compraForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$orden_compraForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=orden_compra_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($orden_compra_session->bigidejercicioActual!=null && $orden_compra_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($orden_compra_session->bigidejercicioActual);//WithConnection

				$orden_compraForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=orden_compra_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$orden_compraForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$orden_compraForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}
		
		if($orden_compra_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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
				if($orden_compraForeignKey->idperiodoDefaultFK==0) {
					$orden_compraForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$orden_compraForeignKey->periodosFK[$periodoLocal->getId()]=orden_compra_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($orden_compra_session->bigidperiodoActual!=null && $orden_compra_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($orden_compra_session->bigidperiodoActual);//WithConnection

				$orden_compraForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=orden_compra_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$orden_compraForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$orden_compraForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}
		
		if($orden_compra_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($orden_compraForeignKey->idusuarioDefaultFK==0) {
					$orden_compraForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$orden_compraForeignKey->usuariosFK[$usuarioLocal->getId()]=orden_compra_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($orden_compra_session->bigidusuarioActual!=null && $orden_compra_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($orden_compra_session->bigidusuarioActual);//WithConnection

				$orden_compraForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=orden_compra_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$orden_compraForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosproveedorsFK($connexion=null,$strRecargarFkQuery='',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$proveedorLogic= new proveedor_logic();
		$pagination= new Pagination();
		$orden_compraForeignKey->proveedorsFK=array();

		$proveedorLogic->setConnexion($connexion);
		$proveedorLogic->getproveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}
		
		if($orden_compra_session->bitBusquedaDesdeFKSesionproveedor!=true) {
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
				if($orden_compraForeignKey->idproveedorDefaultFK==0) {
					$orden_compraForeignKey->idproveedorDefaultFK=$proveedorLocal->getId();
				}

				$orden_compraForeignKey->proveedorsFK[$proveedorLocal->getId()]=orden_compra_util::getproveedorDescripcion($proveedorLocal);
			}

		} else {

			if($orden_compra_session->bigidproveedorActual!=null && $orden_compra_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($orden_compra_session->bigidproveedorActual);//WithConnection

				$orden_compraForeignKey->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=orden_compra_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$orden_compraForeignKey->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	public function cargarCombosvendedorsFK($connexion=null,$strRecargarFkQuery='',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$vendedorLogic= new vendedor_logic();
		$pagination= new Pagination();
		$orden_compraForeignKey->vendedorsFK=array();

		$vendedorLogic->setConnexion($connexion);
		$vendedorLogic->getvendedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}
		
		if($orden_compra_session->bitBusquedaDesdeFKSesionvendedor!=true) {
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
				if($orden_compraForeignKey->idvendedorDefaultFK==0) {
					$orden_compraForeignKey->idvendedorDefaultFK=$vendedorLocal->getId();
				}

				$orden_compraForeignKey->vendedorsFK[$vendedorLocal->getId()]=orden_compra_util::getvendedorDescripcion($vendedorLocal);
			}

		} else {

			if($orden_compra_session->bigidvendedorActual!=null && $orden_compra_session->bigidvendedorActual > 0) {
				$vendedorLogic->getEntity($orden_compra_session->bigidvendedorActual);//WithConnection

				$orden_compraForeignKey->vendedorsFK[$vendedorLogic->getvendedor()->getId()]=orden_compra_util::getvendedorDescripcion($vendedorLogic->getvendedor());
				$orden_compraForeignKey->idvendedorDefaultFK=$vendedorLogic->getvendedor()->getId();
			}
		}
	}

	public function cargarCombostermino_pago_proveedorsFK($connexion=null,$strRecargarFkQuery='',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic();
		$pagination= new Pagination();
		$orden_compraForeignKey->termino_pago_proveedorsFK=array();

		$termino_pago_proveedorLogic->setConnexion($connexion);
		$termino_pago_proveedorLogic->gettermino_pago_proveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}
		
		if($orden_compra_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor!=true) {
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
				if($orden_compraForeignKey->idtermino_pago_proveedorDefaultFK==0) {
					$orden_compraForeignKey->idtermino_pago_proveedorDefaultFK=$termino_pago_proveedorLocal->getId();
				}

				$orden_compraForeignKey->termino_pago_proveedorsFK[$termino_pago_proveedorLocal->getId()]=orden_compra_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLocal);
			}

		} else {

			if($orden_compra_session->bigidtermino_pago_proveedorActual!=null && $orden_compra_session->bigidtermino_pago_proveedorActual > 0) {
				$termino_pago_proveedorLogic->getEntity($orden_compra_session->bigidtermino_pago_proveedorActual);//WithConnection

				$orden_compraForeignKey->termino_pago_proveedorsFK[$termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId()]=orden_compra_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLogic->gettermino_pago_proveedor());
				$orden_compraForeignKey->idtermino_pago_proveedorDefaultFK=$termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId();
			}
		}
	}

	public function cargarCombosmonedasFK($connexion=null,$strRecargarFkQuery='',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$monedaLogic= new moneda_logic();
		$pagination= new Pagination();
		$orden_compraForeignKey->monedasFK=array();

		$monedaLogic->setConnexion($connexion);
		$monedaLogic->getmonedaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}
		
		if($orden_compra_session->bitBusquedaDesdeFKSesionmoneda!=true) {
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
				if($orden_compraForeignKey->idmonedaDefaultFK==0) {
					$orden_compraForeignKey->idmonedaDefaultFK=$monedaLocal->getId();
				}

				$orden_compraForeignKey->monedasFK[$monedaLocal->getId()]=orden_compra_util::getmonedaDescripcion($monedaLocal);
			}

		} else {

			if($orden_compra_session->bigidmonedaActual!=null && $orden_compra_session->bigidmonedaActual > 0) {
				$monedaLogic->getEntity($orden_compra_session->bigidmonedaActual);//WithConnection

				$orden_compraForeignKey->monedasFK[$monedaLogic->getmoneda()->getId()]=orden_compra_util::getmonedaDescripcion($monedaLogic->getmoneda());
				$orden_compraForeignKey->idmonedaDefaultFK=$monedaLogic->getmoneda()->getId();
			}
		}
	}

	public function cargarCombosestadosFK($connexion=null,$strRecargarFkQuery='',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$estadoLogic= new estado_logic();
		$pagination= new Pagination();
		$orden_compraForeignKey->estadosFK=array();

		$estadoLogic->setConnexion($connexion);
		$estadoLogic->getestadoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}
		
		if($orden_compra_session->bitBusquedaDesdeFKSesionestado!=true) {
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
				if($orden_compraForeignKey->idestadoDefaultFK==0) {
					$orden_compraForeignKey->idestadoDefaultFK=$estadoLocal->getId();
				}

				$orden_compraForeignKey->estadosFK[$estadoLocal->getId()]=orden_compra_util::getestadoDescripcion($estadoLocal);
			}

		} else {

			if($orden_compra_session->bigidestadoActual!=null && $orden_compra_session->bigidestadoActual > 0) {
				$estadoLogic->getEntity($orden_compra_session->bigidestadoActual);//WithConnection

				$orden_compraForeignKey->estadosFK[$estadoLogic->getestado()->getId()]=orden_compra_util::getestadoDescripcion($estadoLogic->getestado());
				$orden_compraForeignKey->idestadoDefaultFK=$estadoLogic->getestado()->getId();
			}
		}
	}

	public function cargarCombosasientosFK($connexion=null,$strRecargarFkQuery='',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$asientoLogic= new asiento_logic();
		$pagination= new Pagination();
		$orden_compraForeignKey->asientosFK=array();

		$asientoLogic->setConnexion($connexion);
		$asientoLogic->getasientoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}
		
		if($orden_compra_session->bitBusquedaDesdeFKSesionasiento!=true) {
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
				if($orden_compraForeignKey->idasientoDefaultFK==0) {
					$orden_compraForeignKey->idasientoDefaultFK=$asientoLocal->getId();
				}

				$orden_compraForeignKey->asientosFK[$asientoLocal->getId()]=orden_compra_util::getasientoDescripcion($asientoLocal);
			}

		} else {

			if($orden_compra_session->bigidasientoActual!=null && $orden_compra_session->bigidasientoActual > 0) {
				$asientoLogic->getEntity($orden_compra_session->bigidasientoActual);//WithConnection

				$orden_compraForeignKey->asientosFK[$asientoLogic->getasiento()->getId()]=orden_compra_util::getasientoDescripcion($asientoLogic->getasiento());
				$orden_compraForeignKey->idasientoDefaultFK=$asientoLogic->getasiento()->getId();
			}
		}
	}

	public function cargarCombosdocumento_cuenta_pagarsFK($connexion=null,$strRecargarFkQuery='',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$documento_cuenta_pagarLogic= new documento_cuenta_pagar_logic();
		$pagination= new Pagination();
		$orden_compraForeignKey->documento_cuenta_pagarsFK=array();

		$documento_cuenta_pagarLogic->setConnexion($connexion);
		$documento_cuenta_pagarLogic->getdocumento_cuenta_pagarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}
		
		if($orden_compra_session->bitBusquedaDesdeFKSesiondocumento_cuenta_pagar!=true) {
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
				if($orden_compraForeignKey->iddocumento_cuenta_pagarDefaultFK==0) {
					$orden_compraForeignKey->iddocumento_cuenta_pagarDefaultFK=$documento_cuenta_pagarLocal->getId();
				}

				$orden_compraForeignKey->documento_cuenta_pagarsFK[$documento_cuenta_pagarLocal->getId()]=orden_compra_util::getdocumento_cuenta_pagarDescripcion($documento_cuenta_pagarLocal);
			}

		} else {

			if($orden_compra_session->bigiddocumento_cuenta_pagarActual!=null && $orden_compra_session->bigiddocumento_cuenta_pagarActual > 0) {
				$documento_cuenta_pagarLogic->getEntity($orden_compra_session->bigiddocumento_cuenta_pagarActual);//WithConnection

				$orden_compraForeignKey->documento_cuenta_pagarsFK[$documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getId()]=orden_compra_util::getdocumento_cuenta_pagarDescripcion($documento_cuenta_pagarLogic->getdocumento_cuenta_pagar());
				$orden_compraForeignKey->iddocumento_cuenta_pagarDefaultFK=$documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getId();
			}
		}
	}

	public function cargarComboskardexsFK($connexion=null,$strRecargarFkQuery='',$orden_compraForeignKey,$orden_compra_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$kardexLogic= new kardex_logic();
		$pagination= new Pagination();
		$orden_compraForeignKey->kardexsFK=array();

		$kardexLogic->setConnexion($connexion);
		$kardexLogic->getkardexDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}
		
		if($orden_compra_session->bitBusquedaDesdeFKSesionkardex!=true) {
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
				if($orden_compraForeignKey->idkardexDefaultFK==0) {
					$orden_compraForeignKey->idkardexDefaultFK=$kardexLocal->getId();
				}

				$orden_compraForeignKey->kardexsFK[$kardexLocal->getId()]=orden_compra_util::getkardexDescripcion($kardexLocal);
			}

		} else {

			if($orden_compra_session->bigidkardexActual!=null && $orden_compra_session->bigidkardexActual > 0) {
				$kardexLogic->getEntity($orden_compra_session->bigidkardexActual);//WithConnection

				$orden_compraForeignKey->kardexsFK[$kardexLogic->getkardex()->getId()]=orden_compra_util::getkardexDescripcion($kardexLogic->getkardex());
				$orden_compraForeignKey->idkardexDefaultFK=$kardexLogic->getkardex()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($orden_compra,$ordencompradetalles) {
		$this->saveRelacionesBase($orden_compra,$ordencompradetalles,true);
	}

	public function saveRelaciones($orden_compra,$ordencompradetalles) {
		$this->saveRelacionesBase($orden_compra,$ordencompradetalles,false);
	}

	public function saveRelacionesBase($orden_compra,$ordencompradetalles=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$orden_compra->setorden_compra_detalles($ordencompradetalles);
			$this->setorden_compra($orden_compra);

			if(orden_compra_logic_add::validarSaveRelaciones($orden_compra,$this)) {

				orden_compra_logic_add::updateRelacionesToSave($orden_compra,$this);

				if(($this->orden_compra->getIsNew() || $this->orden_compra->getIsChanged()) && !$this->orden_compra->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($ordencompradetalles);

				} else if($this->orden_compra->getIsDeleted()) {
					$this->saveRelacionesDetalles($ordencompradetalles);
					$this->save();
				}

				orden_compra_logic_add::updateRelacionesToSaveAfter($orden_compra,$this);

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
	
	
	public function saveRelacionesDetalles($ordencompradetalles=array()) {
		try {
	

			$idorden_compraActual=$this->getorden_compra()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/orden_compra_detalle_carga.php');
			orden_compra_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$ordencompradetalleLogic_Desde_orden_compra=new orden_compra_detalle_logic();
			$ordencompradetalleLogic_Desde_orden_compra->setorden_compra_detalles($ordencompradetalles);

			$ordencompradetalleLogic_Desde_orden_compra->setConnexion($this->getConnexion());
			$ordencompradetalleLogic_Desde_orden_compra->setDatosCliente($this->datosCliente);

			foreach($ordencompradetalleLogic_Desde_orden_compra->getorden_compra_detalles() as $ordencompradetalle_Desde_orden_compra) {
				$ordencompradetalle_Desde_orden_compra->setid_orden_compra($idorden_compraActual);
			}

			$ordencompradetalleLogic_Desde_orden_compra->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $orden_compras,orden_compra_param_return $orden_compraParameterGeneral) : orden_compra_param_return {
		$orden_compraReturnGeneral=new orden_compra_param_return();
	
		 try {	
			
			if($this->orden_compraLogicAdditional==null) {
				$this->orden_compraLogicAdditional=new orden_compra_logic_add();
			}
			
			$this->orden_compraLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$orden_compras,$orden_compraParameterGeneral,$orden_compraReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $orden_compraReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $orden_compras,orden_compra_param_return $orden_compraParameterGeneral) : orden_compra_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$orden_compraReturnGeneral=new orden_compra_param_return();
	
			
			if($this->orden_compraLogicAdditional==null) {
				$this->orden_compraLogicAdditional=new orden_compra_logic_add();
			}
			
			$this->orden_compraLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$orden_compras,$orden_compraParameterGeneral,$orden_compraReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $orden_compraReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $orden_compras,orden_compra $orden_compra,orden_compra_param_return $orden_compraParameterGeneral,bool $isEsNuevoorden_compra,array $clases) : orden_compra_param_return {
		 try {	
			$orden_compraReturnGeneral=new orden_compra_param_return();
	
			$orden_compraReturnGeneral->setorden_compra($orden_compra);
			$orden_compraReturnGeneral->setorden_compras($orden_compras);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$orden_compraReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->orden_compraLogicAdditional==null) {
				$this->orden_compraLogicAdditional=new orden_compra_logic_add();
			}
			
			$orden_compraReturnGeneral=$this->orden_compraLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$orden_compras,$orden_compra,$orden_compraParameterGeneral,$orden_compraReturnGeneral,$isEsNuevoorden_compra,$clases);
			
			/*orden_compraLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$orden_compras,$orden_compra,$orden_compraParameterGeneral,$orden_compraReturnGeneral,$isEsNuevoorden_compra,$clases);*/
			
			return $orden_compraReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $orden_compras,orden_compra $orden_compra,orden_compra_param_return $orden_compraParameterGeneral,bool $isEsNuevoorden_compra,array $clases) : orden_compra_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$orden_compraReturnGeneral=new orden_compra_param_return();
	
			$orden_compraReturnGeneral->setorden_compra($orden_compra);
			$orden_compraReturnGeneral->setorden_compras($orden_compras);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$orden_compraReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->orden_compraLogicAdditional==null) {
				$this->orden_compraLogicAdditional=new orden_compra_logic_add();
			}
			
			$orden_compraReturnGeneral=$this->orden_compraLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$orden_compras,$orden_compra,$orden_compraParameterGeneral,$orden_compraReturnGeneral,$isEsNuevoorden_compra,$clases);
			
			/*orden_compraLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$orden_compras,$orden_compra,$orden_compraParameterGeneral,$orden_compraReturnGeneral,$isEsNuevoorden_compra,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $orden_compraReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $orden_compras,orden_compra $orden_compra,orden_compra_param_return $orden_compraParameterGeneral,bool $isEsNuevoorden_compra,array $clases) : orden_compra_param_return {
		 try {	
			$orden_compraReturnGeneral=new orden_compra_param_return();
	
			$orden_compraReturnGeneral->setorden_compra($orden_compra);
			$orden_compraReturnGeneral->setorden_compras($orden_compras);
			
			
			
			if($this->orden_compraLogicAdditional==null) {
				$this->orden_compraLogicAdditional=new orden_compra_logic_add();
			}
			
			$orden_compraReturnGeneral=$this->orden_compraLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$orden_compras,$orden_compra,$orden_compraParameterGeneral,$orden_compraReturnGeneral,$isEsNuevoorden_compra,$clases);
			
			/*orden_compraLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$orden_compras,$orden_compra,$orden_compraParameterGeneral,$orden_compraReturnGeneral,$isEsNuevoorden_compra,$clases);*/
			
			return $orden_compraReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $orden_compras,orden_compra $orden_compra,orden_compra_param_return $orden_compraParameterGeneral,bool $isEsNuevoorden_compra,array $clases) : orden_compra_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$orden_compraReturnGeneral=new orden_compra_param_return();
	
			$orden_compraReturnGeneral->setorden_compra($orden_compra);
			$orden_compraReturnGeneral->setorden_compras($orden_compras);
			
			
			if($this->orden_compraLogicAdditional==null) {
				$this->orden_compraLogicAdditional=new orden_compra_logic_add();
			}
			
			$orden_compraReturnGeneral=$this->orden_compraLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$orden_compras,$orden_compra,$orden_compraParameterGeneral,$orden_compraReturnGeneral,$isEsNuevoorden_compra,$clases);
			
			/*orden_compraLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$orden_compras,$orden_compra,$orden_compraParameterGeneral,$orden_compraReturnGeneral,$isEsNuevoorden_compra,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $orden_compraReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,orden_compra $orden_compra,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,orden_compra $orden_compra,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		orden_compra_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		orden_compra_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(orden_compra $orden_compra,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			orden_compra_logic_add::updateorden_compraToGet($this->orden_compra);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$orden_compra->setempresa($this->orden_compraDataAccess->getempresa($this->connexion,$orden_compra));
		$orden_compra->setsucursal($this->orden_compraDataAccess->getsucursal($this->connexion,$orden_compra));
		$orden_compra->setejercicio($this->orden_compraDataAccess->getejercicio($this->connexion,$orden_compra));
		$orden_compra->setperiodo($this->orden_compraDataAccess->getperiodo($this->connexion,$orden_compra));
		$orden_compra->setusuario($this->orden_compraDataAccess->getusuario($this->connexion,$orden_compra));
		$orden_compra->setproveedor($this->orden_compraDataAccess->getproveedor($this->connexion,$orden_compra));
		$orden_compra->setvendedor($this->orden_compraDataAccess->getvendedor($this->connexion,$orden_compra));
		$orden_compra->settermino_pago_proveedor($this->orden_compraDataAccess->gettermino_pago_proveedor($this->connexion,$orden_compra));
		$orden_compra->setmoneda($this->orden_compraDataAccess->getmoneda($this->connexion,$orden_compra));
		$orden_compra->setestado($this->orden_compraDataAccess->getestado($this->connexion,$orden_compra));
		$orden_compra->setasiento($this->orden_compraDataAccess->getasiento($this->connexion,$orden_compra));
		$orden_compra->setdocumento_cuenta_pagar($this->orden_compraDataAccess->getdocumento_cuenta_pagar($this->connexion,$orden_compra));
		$orden_compra->setkardex($this->orden_compraDataAccess->getkardex($this->connexion,$orden_compra));
		$orden_compra->setorden_compra_detalles($this->orden_compraDataAccess->getorden_compra_detalles($this->connexion,$orden_compra));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$orden_compra->setempresa($this->orden_compraDataAccess->getempresa($this->connexion,$orden_compra));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$orden_compra->setsucursal($this->orden_compraDataAccess->getsucursal($this->connexion,$orden_compra));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$orden_compra->setejercicio($this->orden_compraDataAccess->getejercicio($this->connexion,$orden_compra));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$orden_compra->setperiodo($this->orden_compraDataAccess->getperiodo($this->connexion,$orden_compra));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$orden_compra->setusuario($this->orden_compraDataAccess->getusuario($this->connexion,$orden_compra));
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$orden_compra->setproveedor($this->orden_compraDataAccess->getproveedor($this->connexion,$orden_compra));
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				$orden_compra->setvendedor($this->orden_compraDataAccess->getvendedor($this->connexion,$orden_compra));
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				$orden_compra->settermino_pago_proveedor($this->orden_compraDataAccess->gettermino_pago_proveedor($this->connexion,$orden_compra));
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				$orden_compra->setmoneda($this->orden_compraDataAccess->getmoneda($this->connexion,$orden_compra));
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$orden_compra->setestado($this->orden_compraDataAccess->getestado($this->connexion,$orden_compra));
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				$orden_compra->setasiento($this->orden_compraDataAccess->getasiento($this->connexion,$orden_compra));
				continue;
			}

			if($clas->clas==documento_cuenta_pagar::$class.'') {
				$orden_compra->setdocumento_cuenta_pagar($this->orden_compraDataAccess->getdocumento_cuenta_pagar($this->connexion,$orden_compra));
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				$orden_compra->setkardex($this->orden_compraDataAccess->getkardex($this->connexion,$orden_compra));
				continue;
			}

			if($clas->clas==orden_compra_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$orden_compra->setorden_compra_detalles($this->orden_compraDataAccess->getorden_compra_detalles($this->connexion,$orden_compra));

				if($this->isConDeep) {
					$ordencompradetalleLogic= new orden_compra_detalle_logic($this->connexion);
					$ordencompradetalleLogic->setorden_compra_detalles($orden_compra->getorden_compra_detalles());
					$classesLocal=orden_compra_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$ordencompradetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					orden_compra_detalle_util::refrescarFKDescripciones($ordencompradetalleLogic->getorden_compra_detalles());
					$orden_compra->setorden_compra_detalles($ordencompradetalleLogic->getorden_compra_detalles());
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
			$orden_compra->setempresa($this->orden_compraDataAccess->getempresa($this->connexion,$orden_compra));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setsucursal($this->orden_compraDataAccess->getsucursal($this->connexion,$orden_compra));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setejercicio($this->orden_compraDataAccess->getejercicio($this->connexion,$orden_compra));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setperiodo($this->orden_compraDataAccess->getperiodo($this->connexion,$orden_compra));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setusuario($this->orden_compraDataAccess->getusuario($this->connexion,$orden_compra));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setproveedor($this->orden_compraDataAccess->getproveedor($this->connexion,$orden_compra));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setvendedor($this->orden_compraDataAccess->getvendedor($this->connexion,$orden_compra));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->settermino_pago_proveedor($this->orden_compraDataAccess->gettermino_pago_proveedor($this->connexion,$orden_compra));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setmoneda($this->orden_compraDataAccess->getmoneda($this->connexion,$orden_compra));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setestado($this->orden_compraDataAccess->getestado($this->connexion,$orden_compra));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setasiento($this->orden_compraDataAccess->getasiento($this->connexion,$orden_compra));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setdocumento_cuenta_pagar($this->orden_compraDataAccess->getdocumento_cuenta_pagar($this->connexion,$orden_compra));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setkardex($this->orden_compraDataAccess->getkardex($this->connexion,$orden_compra));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==orden_compra_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(orden_compra_detalle::$class);
			$orden_compra->setorden_compra_detalles($this->orden_compraDataAccess->getorden_compra_detalles($this->connexion,$orden_compra));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$orden_compra->setempresa($this->orden_compraDataAccess->getempresa($this->connexion,$orden_compra));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($orden_compra->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$orden_compra->setsucursal($this->orden_compraDataAccess->getsucursal($this->connexion,$orden_compra));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($orden_compra->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$orden_compra->setejercicio($this->orden_compraDataAccess->getejercicio($this->connexion,$orden_compra));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($orden_compra->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$orden_compra->setperiodo($this->orden_compraDataAccess->getperiodo($this->connexion,$orden_compra));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($orden_compra->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$orden_compra->setusuario($this->orden_compraDataAccess->getusuario($this->connexion,$orden_compra));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($orden_compra->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$orden_compra->setproveedor($this->orden_compraDataAccess->getproveedor($this->connexion,$orden_compra));
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepLoad($orden_compra->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		$orden_compra->setvendedor($this->orden_compraDataAccess->getvendedor($this->connexion,$orden_compra));
		$vendedorLogic= new vendedor_logic($this->connexion);
		$vendedorLogic->deepLoad($orden_compra->getvendedor(),$isDeep,$deepLoadType,$clases);
				
		$orden_compra->settermino_pago_proveedor($this->orden_compraDataAccess->gettermino_pago_proveedor($this->connexion,$orden_compra));
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
		$termino_pago_proveedorLogic->deepLoad($orden_compra->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases);
				
		$orden_compra->setmoneda($this->orden_compraDataAccess->getmoneda($this->connexion,$orden_compra));
		$monedaLogic= new moneda_logic($this->connexion);
		$monedaLogic->deepLoad($orden_compra->getmoneda(),$isDeep,$deepLoadType,$clases);
				
		$orden_compra->setestado($this->orden_compraDataAccess->getestado($this->connexion,$orden_compra));
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepLoad($orden_compra->getestado(),$isDeep,$deepLoadType,$clases);
				
		$orden_compra->setasiento($this->orden_compraDataAccess->getasiento($this->connexion,$orden_compra));
		$asientoLogic= new asiento_logic($this->connexion);
		$asientoLogic->deepLoad($orden_compra->getasiento(),$isDeep,$deepLoadType,$clases);
				
		$orden_compra->setdocumento_cuenta_pagar($this->orden_compraDataAccess->getdocumento_cuenta_pagar($this->connexion,$orden_compra));
		$documento_cuenta_pagarLogic= new documento_cuenta_pagar_logic($this->connexion);
		$documento_cuenta_pagarLogic->deepLoad($orden_compra->getdocumento_cuenta_pagar(),$isDeep,$deepLoadType,$clases);
				
		$orden_compra->setkardex($this->orden_compraDataAccess->getkardex($this->connexion,$orden_compra));
		$kardexLogic= new kardex_logic($this->connexion);
		$kardexLogic->deepLoad($orden_compra->getkardex(),$isDeep,$deepLoadType,$clases);
				

		$orden_compra->setorden_compra_detalles($this->orden_compraDataAccess->getorden_compra_detalles($this->connexion,$orden_compra));

		foreach($orden_compra->getorden_compra_detalles() as $ordencompradetalle) {
			$ordencompradetalleLogic= new orden_compra_detalle_logic($this->connexion);
			$ordencompradetalleLogic->deepLoad($ordencompradetalle,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$orden_compra->setempresa($this->orden_compraDataAccess->getempresa($this->connexion,$orden_compra));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($orden_compra->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$orden_compra->setsucursal($this->orden_compraDataAccess->getsucursal($this->connexion,$orden_compra));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($orden_compra->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$orden_compra->setejercicio($this->orden_compraDataAccess->getejercicio($this->connexion,$orden_compra));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($orden_compra->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$orden_compra->setperiodo($this->orden_compraDataAccess->getperiodo($this->connexion,$orden_compra));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($orden_compra->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$orden_compra->setusuario($this->orden_compraDataAccess->getusuario($this->connexion,$orden_compra));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($orden_compra->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$orden_compra->setproveedor($this->orden_compraDataAccess->getproveedor($this->connexion,$orden_compra));
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($orden_compra->getproveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				$orden_compra->setvendedor($this->orden_compraDataAccess->getvendedor($this->connexion,$orden_compra));
				$vendedorLogic= new vendedor_logic($this->connexion);
				$vendedorLogic->deepLoad($orden_compra->getvendedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				$orden_compra->settermino_pago_proveedor($this->orden_compraDataAccess->gettermino_pago_proveedor($this->connexion,$orden_compra));
				$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
				$termino_pago_proveedorLogic->deepLoad($orden_compra->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				$orden_compra->setmoneda($this->orden_compraDataAccess->getmoneda($this->connexion,$orden_compra));
				$monedaLogic= new moneda_logic($this->connexion);
				$monedaLogic->deepLoad($orden_compra->getmoneda(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				$orden_compra->setestado($this->orden_compraDataAccess->getestado($this->connexion,$orden_compra));
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepLoad($orden_compra->getestado(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				$orden_compra->setasiento($this->orden_compraDataAccess->getasiento($this->connexion,$orden_compra));
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepLoad($orden_compra->getasiento(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==documento_cuenta_pagar::$class.'') {
				$orden_compra->setdocumento_cuenta_pagar($this->orden_compraDataAccess->getdocumento_cuenta_pagar($this->connexion,$orden_compra));
				$documento_cuenta_pagarLogic= new documento_cuenta_pagar_logic($this->connexion);
				$documento_cuenta_pagarLogic->deepLoad($orden_compra->getdocumento_cuenta_pagar(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				$orden_compra->setkardex($this->orden_compraDataAccess->getkardex($this->connexion,$orden_compra));
				$kardexLogic= new kardex_logic($this->connexion);
				$kardexLogic->deepLoad($orden_compra->getkardex(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==orden_compra_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$orden_compra->setorden_compra_detalles($this->orden_compraDataAccess->getorden_compra_detalles($this->connexion,$orden_compra));

				foreach($orden_compra->getorden_compra_detalles() as $ordencompradetalle) {
					$ordencompradetalleLogic= new orden_compra_detalle_logic($this->connexion);
					$ordencompradetalleLogic->deepLoad($ordencompradetalle,$isDeep,$deepLoadType,$clases);
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
			$orden_compra->setempresa($this->orden_compraDataAccess->getempresa($this->connexion,$orden_compra));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($orden_compra->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setsucursal($this->orden_compraDataAccess->getsucursal($this->connexion,$orden_compra));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($orden_compra->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setejercicio($this->orden_compraDataAccess->getejercicio($this->connexion,$orden_compra));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($orden_compra->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setperiodo($this->orden_compraDataAccess->getperiodo($this->connexion,$orden_compra));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($orden_compra->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setusuario($this->orden_compraDataAccess->getusuario($this->connexion,$orden_compra));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($orden_compra->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setproveedor($this->orden_compraDataAccess->getproveedor($this->connexion,$orden_compra));
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($orden_compra->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setvendedor($this->orden_compraDataAccess->getvendedor($this->connexion,$orden_compra));
			$vendedorLogic= new vendedor_logic($this->connexion);
			$vendedorLogic->deepLoad($orden_compra->getvendedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->settermino_pago_proveedor($this->orden_compraDataAccess->gettermino_pago_proveedor($this->connexion,$orden_compra));
			$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
			$termino_pago_proveedorLogic->deepLoad($orden_compra->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setmoneda($this->orden_compraDataAccess->getmoneda($this->connexion,$orden_compra));
			$monedaLogic= new moneda_logic($this->connexion);
			$monedaLogic->deepLoad($orden_compra->getmoneda(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setestado($this->orden_compraDataAccess->getestado($this->connexion,$orden_compra));
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepLoad($orden_compra->getestado(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setasiento($this->orden_compraDataAccess->getasiento($this->connexion,$orden_compra));
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepLoad($orden_compra->getasiento(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setdocumento_cuenta_pagar($this->orden_compraDataAccess->getdocumento_cuenta_pagar($this->connexion,$orden_compra));
			$documento_cuenta_pagarLogic= new documento_cuenta_pagar_logic($this->connexion);
			$documento_cuenta_pagarLogic->deepLoad($orden_compra->getdocumento_cuenta_pagar(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$orden_compra->setkardex($this->orden_compraDataAccess->getkardex($this->connexion,$orden_compra));
			$kardexLogic= new kardex_logic($this->connexion);
			$kardexLogic->deepLoad($orden_compra->getkardex(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==orden_compra_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(orden_compra_detalle::$class);
			$orden_compra->setorden_compra_detalles($this->orden_compraDataAccess->getorden_compra_detalles($this->connexion,$orden_compra));

			foreach($orden_compra->getorden_compra_detalles() as $ordencompradetalle) {
				$ordencompradetalleLogic= new orden_compra_detalle_logic($this->connexion);
				$ordencompradetalleLogic->deepLoad($ordencompradetalle,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(orden_compra $orden_compra,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			orden_compra_logic_add::updateorden_compraToSave($this->orden_compra);			
			
			if(!$paraDeleteCascade) {				
				orden_compra_data::save($orden_compra, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($orden_compra->getempresa(),$this->connexion);
		sucursal_data::save($orden_compra->getsucursal(),$this->connexion);
		ejercicio_data::save($orden_compra->getejercicio(),$this->connexion);
		periodo_data::save($orden_compra->getperiodo(),$this->connexion);
		usuario_data::save($orden_compra->getusuario(),$this->connexion);
		proveedor_data::save($orden_compra->getproveedor(),$this->connexion);
		vendedor_data::save($orden_compra->getvendedor(),$this->connexion);
		termino_pago_proveedor_data::save($orden_compra->gettermino_pago_proveedor(),$this->connexion);
		moneda_data::save($orden_compra->getmoneda(),$this->connexion);
		estado_data::save($orden_compra->getestado(),$this->connexion);
		asiento_data::save($orden_compra->getasiento(),$this->connexion);
		documento_cuenta_pagar_data::save($orden_compra->getdocumento_cuenta_pagar(),$this->connexion);
		kardex_data::save($orden_compra->getkardex(),$this->connexion);

		foreach($orden_compra->getorden_compra_detalles() as $ordencompradetalle) {
			$ordencompradetalle->setid_orden_compra($orden_compra->getId());
			orden_compra_detalle_data::save($ordencompradetalle,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($orden_compra->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($orden_compra->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($orden_compra->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($orden_compra->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($orden_compra->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($orden_compra->getproveedor(),$this->connexion);
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				vendedor_data::save($orden_compra->getvendedor(),$this->connexion);
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				termino_pago_proveedor_data::save($orden_compra->gettermino_pago_proveedor(),$this->connexion);
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				moneda_data::save($orden_compra->getmoneda(),$this->connexion);
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($orden_compra->getestado(),$this->connexion);
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				asiento_data::save($orden_compra->getasiento(),$this->connexion);
				continue;
			}

			if($clas->clas==documento_cuenta_pagar::$class.'') {
				documento_cuenta_pagar_data::save($orden_compra->getdocumento_cuenta_pagar(),$this->connexion);
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				kardex_data::save($orden_compra->getkardex(),$this->connexion);
				continue;
			}


			if($clas->clas==orden_compra_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($orden_compra->getorden_compra_detalles() as $ordencompradetalle) {
					$ordencompradetalle->setid_orden_compra($orden_compra->getId());
					orden_compra_detalle_data::save($ordencompradetalle,$this->connexion);
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
			empresa_data::save($orden_compra->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($orden_compra->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($orden_compra->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($orden_compra->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($orden_compra->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($orden_compra->getproveedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			vendedor_data::save($orden_compra->getvendedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_proveedor_data::save($orden_compra->gettermino_pago_proveedor(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			moneda_data::save($orden_compra->getmoneda(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($orden_compra->getestado(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_data::save($orden_compra->getasiento(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_cuenta_pagar_data::save($orden_compra->getdocumento_cuenta_pagar(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			kardex_data::save($orden_compra->getkardex(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==orden_compra_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(orden_compra_detalle::$class);

			foreach($orden_compra->getorden_compra_detalles() as $ordencompradetalle) {
				$ordencompradetalle->setid_orden_compra($orden_compra->getId());
				orden_compra_detalle_data::save($ordencompradetalle,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($orden_compra->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($orden_compra->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($orden_compra->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($orden_compra->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($orden_compra->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($orden_compra->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($orden_compra->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($orden_compra->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($orden_compra->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($orden_compra->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		proveedor_data::save($orden_compra->getproveedor(),$this->connexion);
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepSave($orden_compra->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		vendedor_data::save($orden_compra->getvendedor(),$this->connexion);
		$vendedorLogic= new vendedor_logic($this->connexion);
		$vendedorLogic->deepSave($orden_compra->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		termino_pago_proveedor_data::save($orden_compra->gettermino_pago_proveedor(),$this->connexion);
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
		$termino_pago_proveedorLogic->deepSave($orden_compra->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		moneda_data::save($orden_compra->getmoneda(),$this->connexion);
		$monedaLogic= new moneda_logic($this->connexion);
		$monedaLogic->deepSave($orden_compra->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		estado_data::save($orden_compra->getestado(),$this->connexion);
		$estadoLogic= new estado_logic($this->connexion);
		$estadoLogic->deepSave($orden_compra->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		asiento_data::save($orden_compra->getasiento(),$this->connexion);
		$asientoLogic= new asiento_logic($this->connexion);
		$asientoLogic->deepSave($orden_compra->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		documento_cuenta_pagar_data::save($orden_compra->getdocumento_cuenta_pagar(),$this->connexion);
		$documento_cuenta_pagarLogic= new documento_cuenta_pagar_logic($this->connexion);
		$documento_cuenta_pagarLogic->deepSave($orden_compra->getdocumento_cuenta_pagar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		kardex_data::save($orden_compra->getkardex(),$this->connexion);
		$kardexLogic= new kardex_logic($this->connexion);
		$kardexLogic->deepSave($orden_compra->getkardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($orden_compra->getorden_compra_detalles() as $ordencompradetalle) {
			$ordencompradetalleLogic= new orden_compra_detalle_logic($this->connexion);
			$ordencompradetalle->setid_orden_compra($orden_compra->getId());
			orden_compra_detalle_data::save($ordencompradetalle,$this->connexion);
			$ordencompradetalleLogic->deepSave($ordencompradetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($orden_compra->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($orden_compra->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($orden_compra->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($orden_compra->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($orden_compra->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($orden_compra->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($orden_compra->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($orden_compra->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($orden_compra->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($orden_compra->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($orden_compra->getproveedor(),$this->connexion);
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepSave($orden_compra->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==vendedor::$class.'') {
				vendedor_data::save($orden_compra->getvendedor(),$this->connexion);
				$vendedorLogic= new vendedor_logic($this->connexion);
				$vendedorLogic->deepSave($orden_compra->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==termino_pago_proveedor::$class.'') {
				termino_pago_proveedor_data::save($orden_compra->gettermino_pago_proveedor(),$this->connexion);
				$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
				$termino_pago_proveedorLogic->deepSave($orden_compra->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==moneda::$class.'') {
				moneda_data::save($orden_compra->getmoneda(),$this->connexion);
				$monedaLogic= new moneda_logic($this->connexion);
				$monedaLogic->deepSave($orden_compra->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==estado::$class.'') {
				estado_data::save($orden_compra->getestado(),$this->connexion);
				$estadoLogic= new estado_logic($this->connexion);
				$estadoLogic->deepSave($orden_compra->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==asiento::$class.'') {
				asiento_data::save($orden_compra->getasiento(),$this->connexion);
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepSave($orden_compra->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==documento_cuenta_pagar::$class.'') {
				documento_cuenta_pagar_data::save($orden_compra->getdocumento_cuenta_pagar(),$this->connexion);
				$documento_cuenta_pagarLogic= new documento_cuenta_pagar_logic($this->connexion);
				$documento_cuenta_pagarLogic->deepSave($orden_compra->getdocumento_cuenta_pagar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==kardex::$class.'') {
				kardex_data::save($orden_compra->getkardex(),$this->connexion);
				$kardexLogic= new kardex_logic($this->connexion);
				$kardexLogic->deepSave($orden_compra->getkardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==orden_compra_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($orden_compra->getorden_compra_detalles() as $ordencompradetalle) {
					$ordencompradetalleLogic= new orden_compra_detalle_logic($this->connexion);
					$ordencompradetalle->setid_orden_compra($orden_compra->getId());
					orden_compra_detalle_data::save($ordencompradetalle,$this->connexion);
					$ordencompradetalleLogic->deepSave($ordencompradetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($orden_compra->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($orden_compra->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($orden_compra->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($orden_compra->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($orden_compra->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($orden_compra->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($orden_compra->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($orden_compra->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($orden_compra->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($orden_compra->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($orden_compra->getproveedor(),$this->connexion);
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepSave($orden_compra->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==vendedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			vendedor_data::save($orden_compra->getvendedor(),$this->connexion);
			$vendedorLogic= new vendedor_logic($this->connexion);
			$vendedorLogic->deepSave($orden_compra->getvendedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==termino_pago_proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			termino_pago_proveedor_data::save($orden_compra->gettermino_pago_proveedor(),$this->connexion);
			$termino_pago_proveedorLogic= new termino_pago_proveedor_logic($this->connexion);
			$termino_pago_proveedorLogic->deepSave($orden_compra->gettermino_pago_proveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==moneda::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			moneda_data::save($orden_compra->getmoneda(),$this->connexion);
			$monedaLogic= new moneda_logic($this->connexion);
			$monedaLogic->deepSave($orden_compra->getmoneda(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_data::save($orden_compra->getestado(),$this->connexion);
			$estadoLogic= new estado_logic($this->connexion);
			$estadoLogic->deepSave($orden_compra->getestado(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==asiento::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			asiento_data::save($orden_compra->getasiento(),$this->connexion);
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepSave($orden_compra->getasiento(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==documento_cuenta_pagar::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			documento_cuenta_pagar_data::save($orden_compra->getdocumento_cuenta_pagar(),$this->connexion);
			$documento_cuenta_pagarLogic= new documento_cuenta_pagar_logic($this->connexion);
			$documento_cuenta_pagarLogic->deepSave($orden_compra->getdocumento_cuenta_pagar(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==kardex::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			kardex_data::save($orden_compra->getkardex(),$this->connexion);
			$kardexLogic= new kardex_logic($this->connexion);
			$kardexLogic->deepSave($orden_compra->getkardex(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==orden_compra_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(orden_compra_detalle::$class);

			foreach($orden_compra->getorden_compra_detalles() as $ordencompradetalle) {
				$ordencompradetalleLogic= new orden_compra_detalle_logic($this->connexion);
				$ordencompradetalle->setid_orden_compra($orden_compra->getId());
				orden_compra_detalle_data::save($ordencompradetalle,$this->connexion);
				$ordencompradetalleLogic->deepSave($ordencompradetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				orden_compra_data::save($orden_compra, $this->connexion);
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
			
			$this->deepLoad($this->orden_compra,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->orden_compras as $orden_compra) {
				$this->deepLoad($orden_compra,$isDeep,$deepLoadType,$clases);
								
				orden_compra_util::refrescarFKDescripciones($this->orden_compras);
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
			
			foreach($this->orden_compras as $orden_compra) {
				$this->deepLoad($orden_compra,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->orden_compra,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->orden_compras as $orden_compra) {
				$this->deepSave($orden_compra,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->orden_compras as $orden_compra) {
				$this->deepSave($orden_compra,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(orden_compra_detalle::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==orden_compra_detalle::$class) {
						$classes[]=new Classe(orden_compra_detalle::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==orden_compra_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(orden_compra_detalle::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getorden_compra() : ?orden_compra {	
		/*
		orden_compra_logic_add::checkorden_compraToGet($this->orden_compra,$this->datosCliente);
		orden_compra_logic_add::updateorden_compraToGet($this->orden_compra);
		*/
			
		return $this->orden_compra;
	}
		
	public function setorden_compra(orden_compra $neworden_compra) {
		$this->orden_compra = $neworden_compra;
	}
	
	public function getorden_compras() : array {		
		/*
		orden_compra_logic_add::checkorden_compraToGets($this->orden_compras,$this->datosCliente);
		
		foreach ($this->orden_compras as $orden_compraLocal ) {
			orden_compra_logic_add::updateorden_compraToGet($orden_compraLocal);
		}
		*/
		
		return $this->orden_compras;
	}
	
	public function setorden_compras(array $neworden_compras) {
		$this->orden_compras = $neworden_compras;
	}
	
	public function getorden_compraDataAccess() : orden_compra_data {
		return $this->orden_compraDataAccess;
	}
	
	public function setorden_compraDataAccess(orden_compra_data $neworden_compraDataAccess) {
		$this->orden_compraDataAccess = $neworden_compraDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        orden_compra_carga::$CONTROLLER;;        
		
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
