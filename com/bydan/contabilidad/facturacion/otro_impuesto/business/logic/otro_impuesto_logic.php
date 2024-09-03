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

namespace com\bydan\contabilidad\facturacion\otro_impuesto\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_carga;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_param_return;

use com\bydan\contabilidad\facturacion\otro_impuesto\presentation\session\otro_impuesto_session;

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

use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_util;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\data\otro_impuesto_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL


use com\bydan\contabilidad\inventario\lista_producto\business\entity\lista_producto;
use com\bydan\contabilidad\inventario\lista_producto\business\data\lista_producto_data;
use com\bydan\contabilidad\inventario\lista_producto\business\logic\lista_producto_logic;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

//REL DETALLES




class otro_impuesto_logic  extends GeneralEntityLogic implements otro_impuesto_logicI {	
	/*GENERAL*/
	public otro_impuesto_data $otro_impuestoDataAccess;
	//public ?otro_impuesto_logic_add $otro_impuestoLogicAdditional=null;
	public ?otro_impuesto $otro_impuesto;
	public array $otro_impuestos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->otro_impuestoDataAccess = new otro_impuesto_data();			
			$this->otro_impuestos = array();
			$this->otro_impuesto = new otro_impuesto();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->otro_impuestoLogicAdditional = new otro_impuesto_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->otro_impuestoLogicAdditional==null) {
		//	$this->otro_impuestoLogicAdditional=new otro_impuesto_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->otro_impuestoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->otro_impuestoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->otro_impuestoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->otro_impuestoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->otro_impuestos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_impuestos=$this->otro_impuestoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_impuesto_util::refrescarFKDescripciones($this->otro_impuestos);
			}
			
			//otro_impuesto_logic_add::checkotro_impuestoToGets($this->otro_impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_impuestos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->otro_impuestos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_impuestos=$this->otro_impuestoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_impuesto_util::refrescarFKDescripciones($this->otro_impuestos);
			}
			
			//otro_impuesto_logic_add::checkotro_impuestoToGets($this->otro_impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_impuestos);
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
		$this->otro_impuesto = new otro_impuesto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->otro_impuesto=$this->otro_impuestoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->otro_impuesto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				otro_impuesto_util::refrescarFKDescripcion($this->otro_impuesto);
			}
						
			//otro_impuesto_logic_add::checkotro_impuestoToGet($this->otro_impuesto,$this->datosCliente);
			//otro_impuesto_logic_add::updateotro_impuestoToGet($this->otro_impuesto);
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
		$this->otro_impuesto = new  otro_impuesto();
		  		  
        try {		
			$this->otro_impuesto=$this->otro_impuestoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->otro_impuesto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				otro_impuesto_util::refrescarFKDescripcion($this->otro_impuesto);
			}
			
			//otro_impuesto_logic_add::checkotro_impuestoToGet($this->otro_impuesto,$this->datosCliente);
			//otro_impuesto_logic_add::updateotro_impuestoToGet($this->otro_impuesto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?otro_impuesto {
		$otro_impuestoLogic = new  otro_impuesto_logic();
		  		  
        try {		
			$otro_impuestoLogic->setConnexion($connexion);			
			$otro_impuestoLogic->getEntity($id);			
			return $otro_impuestoLogic->getotro_impuesto();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->otro_impuesto = new  otro_impuesto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->otro_impuesto=$this->otro_impuestoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->otro_impuesto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				otro_impuesto_util::refrescarFKDescripcion($this->otro_impuesto);
			}
			
			//otro_impuesto_logic_add::checkotro_impuestoToGet($this->otro_impuesto,$this->datosCliente);
			//otro_impuesto_logic_add::updateotro_impuestoToGet($this->otro_impuesto);
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
		$this->otro_impuesto = new  otro_impuesto();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_impuesto=$this->otro_impuestoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->otro_impuesto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				otro_impuesto_util::refrescarFKDescripcion($this->otro_impuesto);
			}
			
			//otro_impuesto_logic_add::checkotro_impuestoToGet($this->otro_impuesto,$this->datosCliente);
			//otro_impuesto_logic_add::updateotro_impuestoToGet($this->otro_impuesto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?otro_impuesto {
		$otro_impuestoLogic = new  otro_impuesto_logic();
		  		  
        try {		
			$otro_impuestoLogic->setConnexion($connexion);			
			$otro_impuestoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $otro_impuestoLogic->getotro_impuesto();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->otro_impuestos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->otro_impuestos=$this->otro_impuestoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_impuesto_util::refrescarFKDescripciones($this->otro_impuestos);
			}
			
			//otro_impuesto_logic_add::checkotro_impuestoToGets($this->otro_impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_impuestos);			
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
		$this->otro_impuestos = array();
		  		  
        try {			
			$this->otro_impuestos=$this->otro_impuestoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_impuesto_util::refrescarFKDescripciones($this->otro_impuestos);
			}
			
			//otro_impuesto_logic_add::checkotro_impuestoToGets($this->otro_impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_impuestos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->otro_impuestos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_impuestos=$this->otro_impuestoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_impuesto_util::refrescarFKDescripciones($this->otro_impuestos);
			}
			
			//otro_impuesto_logic_add::checkotro_impuestoToGets($this->otro_impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_impuestos);
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
		$this->otro_impuestos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_impuestos=$this->otro_impuestoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_impuesto_util::refrescarFKDescripciones($this->otro_impuestos);
			}
			
			//otro_impuesto_logic_add::checkotro_impuestoToGets($this->otro_impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_impuestos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$otro_impuestoLogic = new  otro_impuesto_logic();
		  		  
        try {		
			$otro_impuestoLogic->setConnexion($connexion);			
			$otro_impuestoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $otro_impuestoLogic->getotro_impuestos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->otro_impuestos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->otro_impuestos=$this->otro_impuestoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_impuesto_util::refrescarFKDescripciones($this->otro_impuestos);
			}
			
			//otro_impuesto_logic_add::checkotro_impuestoToGets($this->otro_impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_impuestos);
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
		$this->otro_impuestos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_impuestos=$this->otro_impuestoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_impuesto_util::refrescarFKDescripciones($this->otro_impuestos);
			}
			
			//otro_impuesto_logic_add::checkotro_impuestoToGets($this->otro_impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_impuestos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->otro_impuestos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_impuestos=$this->otro_impuestoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_impuesto_util::refrescarFKDescripciones($this->otro_impuestos);
			}
			
			//otro_impuesto_logic_add::checkotro_impuestoToGets($this->otro_impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_impuestos);
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
		$this->otro_impuestos = array();
		  		  
        try {			
			$this->otro_impuestos=$this->otro_impuestoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_impuesto_util::refrescarFKDescripciones($this->otro_impuestos);
			}	
			
			//otro_impuesto_logic_add::checkotro_impuestoToGets($this->otro_impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_impuestos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->otro_impuestos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->otro_impuestos=$this->otro_impuestoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_impuesto_util::refrescarFKDescripciones($this->otro_impuestos);
			}
			
			//otro_impuesto_logic_add::checkotro_impuestoToGets($this->otro_impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_impuestos);
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
		$this->otro_impuestos = array();
		  		  
        try {		
			$this->otro_impuestos=$this->otro_impuestoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_impuesto_util::refrescarFKDescripciones($this->otro_impuestos);
			}
			
			//otro_impuesto_logic_add::checkotro_impuestoToGets($this->otro_impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_impuestos);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_Idcuenta_comprasWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_cuenta_compras) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_compras= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_compras->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_compras,otro_impuesto_util::$ID_CUENTA_COMPRAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_compras);

			$this->otro_impuestos=$this->otro_impuestoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				otro_impuesto_util::refrescarFKDescripciones($this->otro_impuestos);
			}
			//otro_impuesto_logic_add::checkotro_impuestoToGets($this->otro_impuestos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->otro_impuestos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta_compras(string $strFinalQuery,Pagination $pagination,?int $id_cuenta_compras) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_compras= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_compras->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_compras,otro_impuesto_util::$ID_CUENTA_COMPRAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_compras);

			$this->otro_impuestos=$this->otro_impuestoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				otro_impuesto_util::refrescarFKDescripciones($this->otro_impuestos);
			}
			//otro_impuesto_logic_add::checkotro_impuestoToGets($this->otro_impuestos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->otro_impuestos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idcuenta_ventasWithConnection(string $strFinalQuery,Pagination $pagination,?int $id_cuenta_ventas) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_ventas= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_ventas->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_ventas,otro_impuesto_util::$ID_CUENTA_VENTAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_ventas);

			$this->otro_impuestos=$this->otro_impuestoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				otro_impuesto_util::refrescarFKDescripciones($this->otro_impuestos);
			}
			//otro_impuesto_logic_add::checkotro_impuestoToGets($this->otro_impuestos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->otro_impuestos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta_ventas(string $strFinalQuery,Pagination $pagination,?int $id_cuenta_ventas) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_ventas= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_ventas->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_ventas,otro_impuesto_util::$ID_CUENTA_VENTAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_ventas);

			$this->otro_impuestos=$this->otro_impuestoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				otro_impuesto_util::refrescarFKDescripciones($this->otro_impuestos);
			}
			//otro_impuesto_logic_add::checkotro_impuestoToGets($this->otro_impuestos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->otro_impuestos);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,otro_impuesto_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->otro_impuestos=$this->otro_impuestoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				otro_impuesto_util::refrescarFKDescripciones($this->otro_impuestos);
			}
			//otro_impuesto_logic_add::checkotro_impuestoToGets($this->otro_impuestos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->otro_impuestos);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,otro_impuesto_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->otro_impuestos=$this->otro_impuestoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				otro_impuesto_util::refrescarFKDescripciones($this->otro_impuestos);
			}
			//otro_impuesto_logic_add::checkotro_impuestoToGets($this->otro_impuestos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->otro_impuestos);
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
						
			//otro_impuesto_logic_add::checkotro_impuestoToSave($this->otro_impuesto,$this->datosCliente,$this->connexion);	       
			//otro_impuesto_logic_add::updateotro_impuestoToSave($this->otro_impuesto);			
			otro_impuesto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->otro_impuesto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->otro_impuestoLogicAdditional->checkGeneralEntityToSave($this,$this->otro_impuesto,$this->datosCliente,$this->connexion);
			
			
			otro_impuesto_data::save($this->otro_impuesto, $this->connexion);	    	       	 				
			//otro_impuesto_logic_add::checkotro_impuestoToSaveAfter($this->otro_impuesto,$this->datosCliente,$this->connexion);			
			//$this->otro_impuestoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->otro_impuesto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->otro_impuesto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->otro_impuesto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				otro_impuesto_util::refrescarFKDescripcion($this->otro_impuesto);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->otro_impuesto->getIsDeleted()) {
				$this->otro_impuesto=null;
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
						
			/*otro_impuesto_logic_add::checkotro_impuestoToSave($this->otro_impuesto,$this->datosCliente,$this->connexion);*/	        
			//otro_impuesto_logic_add::updateotro_impuestoToSave($this->otro_impuesto);			
			//$this->otro_impuestoLogicAdditional->checkGeneralEntityToSave($this,$this->otro_impuesto,$this->datosCliente,$this->connexion);			
			otro_impuesto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->otro_impuesto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			otro_impuesto_data::save($this->otro_impuesto, $this->connexion);	    	       	 						
			/*otro_impuesto_logic_add::checkotro_impuestoToSaveAfter($this->otro_impuesto,$this->datosCliente,$this->connexion);*/			
			//$this->otro_impuestoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->otro_impuesto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->otro_impuesto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->otro_impuesto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				otro_impuesto_util::refrescarFKDescripcion($this->otro_impuesto);				
			}
			
			if($this->otro_impuesto->getIsDeleted()) {
				$this->otro_impuesto=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(otro_impuesto $otro_impuesto,Connexion $connexion)  {
		$otro_impuestoLogic = new  otro_impuesto_logic();		  		  
        try {		
			$otro_impuestoLogic->setConnexion($connexion);			
			$otro_impuestoLogic->setotro_impuesto($otro_impuesto);			
			$otro_impuestoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*otro_impuesto_logic_add::checkotro_impuestoToSaves($this->otro_impuestos,$this->datosCliente,$this->connexion);*/	        	
			//$this->otro_impuestoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->otro_impuestos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->otro_impuestos as $otro_impuestoLocal) {				
								
				//otro_impuesto_logic_add::updateotro_impuestoToSave($otro_impuestoLocal);	        	
				otro_impuesto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$otro_impuestoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				otro_impuesto_data::save($otro_impuestoLocal, $this->connexion);				
			}
			
			/*otro_impuesto_logic_add::checkotro_impuestoToSavesAfter($this->otro_impuestos,$this->datosCliente,$this->connexion);*/			
			//$this->otro_impuestoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->otro_impuestos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_impuesto_util::refrescarFKDescripciones($this->otro_impuestos);
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
			/*otro_impuesto_logic_add::checkotro_impuestoToSaves($this->otro_impuestos,$this->datosCliente,$this->connexion);*/			
			//$this->otro_impuestoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->otro_impuestos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->otro_impuestos as $otro_impuestoLocal) {				
								
				//otro_impuesto_logic_add::updateotro_impuestoToSave($otro_impuestoLocal);	        	
				otro_impuesto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$otro_impuestoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				otro_impuesto_data::save($otro_impuestoLocal, $this->connexion);				
			}			
			
			/*otro_impuesto_logic_add::checkotro_impuestoToSavesAfter($this->otro_impuestos,$this->datosCliente,$this->connexion);*/			
			//$this->otro_impuestoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->otro_impuestos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_impuesto_util::refrescarFKDescripciones($this->otro_impuestos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $otro_impuestos,Connexion $connexion)  {
		$otro_impuestoLogic = new  otro_impuesto_logic();
		  		  
        try {		
			$otro_impuestoLogic->setConnexion($connexion);			
			$otro_impuestoLogic->setotro_impuestos($otro_impuestos);			
			$otro_impuestoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$otro_impuestosAux=array();
		
		foreach($this->otro_impuestos as $otro_impuesto) {
			if($otro_impuesto->getIsDeleted()==false) {
				$otro_impuestosAux[]=$otro_impuesto;
			}
		}
		
		$this->otro_impuestos=$otro_impuestosAux;
	}
	
	public function updateToGetsAuxiliar(array &$otro_impuestos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->otro_impuestos as $otro_impuesto) {
				
				$otro_impuesto->setid_empresa_Descripcion(otro_impuesto_util::getempresaDescripcion($otro_impuesto->getempresa()));
				$otro_impuesto->setid_cuenta_ventas_Descripcion(otro_impuesto_util::getcuenta_ventasDescripcion($otro_impuesto->getcuenta_ventas()));
				$otro_impuesto->setid_cuenta_compras_Descripcion(otro_impuesto_util::getcuenta_comprasDescripcion($otro_impuesto->getcuenta_compras()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$otro_impuesto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$otro_impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$otro_impuesto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$otro_impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$otro_impuesto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$otro_impuestoForeignKey=new otro_impuesto_param_return();//otro_impuestoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$otro_impuestoForeignKey,$otro_impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_ventas',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_ventassFK($this->connexion,$strRecargarFkQuery,$otro_impuestoForeignKey,$otro_impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_compras',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_comprassFK($this->connexion,$strRecargarFkQuery,$otro_impuestoForeignKey,$otro_impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$otro_impuestoForeignKey,$otro_impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_ventas',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_ventassFK($this->connexion,' where id=-1 ',$otro_impuestoForeignKey,$otro_impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_compras',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_comprassFK($this->connexion,' where id=-1 ',$otro_impuestoForeignKey,$otro_impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $otro_impuestoForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$otro_impuestoForeignKey,$otro_impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$otro_impuestoForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($otro_impuesto_session==null) {
			$otro_impuesto_session=new otro_impuesto_session();
		}
		
		if($otro_impuesto_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($otro_impuestoForeignKey->idempresaDefaultFK==0) {
					$otro_impuestoForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$otro_impuestoForeignKey->empresasFK[$empresaLocal->getId()]=otro_impuesto_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($otro_impuesto_session->bigidempresaActual!=null && $otro_impuesto_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($otro_impuesto_session->bigidempresaActual);//WithConnection

				$otro_impuestoForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=otro_impuesto_util::getempresaDescripcion($empresaLogic->getempresa());
				$otro_impuestoForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarComboscuenta_ventassFK($connexion=null,$strRecargarFkQuery='',$otro_impuestoForeignKey,$otro_impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$otro_impuestoForeignKey->cuenta_ventassFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($otro_impuesto_session==null) {
			$otro_impuesto_session=new otro_impuesto_session();
		}
		
		if($otro_impuesto_session->bitBusquedaDesdeFKSesioncuenta_ventas!=true) {
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
				if($otro_impuestoForeignKey->idcuenta_ventasDefaultFK==0) {
					$otro_impuestoForeignKey->idcuenta_ventasDefaultFK=$cuentaLocal->getId();
				}

				$otro_impuestoForeignKey->cuenta_ventassFK[$cuentaLocal->getId()]=otro_impuesto_util::getcuenta_ventasDescripcion($cuentaLocal);
			}

		} else {

			if($otro_impuesto_session->bigidcuenta_ventasActual!=null && $otro_impuesto_session->bigidcuenta_ventasActual > 0) {
				$cuentaLogic->getEntity($otro_impuesto_session->bigidcuenta_ventasActual);//WithConnection

				$otro_impuestoForeignKey->cuenta_ventassFK[$cuentaLogic->getcuenta()->getId()]=otro_impuesto_util::getcuenta_ventasDescripcion($cuentaLogic->getcuenta());
				$otro_impuestoForeignKey->idcuenta_ventasDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarComboscuenta_comprassFK($connexion=null,$strRecargarFkQuery='',$otro_impuestoForeignKey,$otro_impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$otro_impuestoForeignKey->cuenta_comprassFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($otro_impuesto_session==null) {
			$otro_impuesto_session=new otro_impuesto_session();
		}
		
		if($otro_impuesto_session->bitBusquedaDesdeFKSesioncuenta_compras!=true) {
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
				if($otro_impuestoForeignKey->idcuenta_comprasDefaultFK==0) {
					$otro_impuestoForeignKey->idcuenta_comprasDefaultFK=$cuentaLocal->getId();
				}

				$otro_impuestoForeignKey->cuenta_comprassFK[$cuentaLocal->getId()]=otro_impuesto_util::getcuenta_comprasDescripcion($cuentaLocal);
			}

		} else {

			if($otro_impuesto_session->bigidcuenta_comprasActual!=null && $otro_impuesto_session->bigidcuenta_comprasActual > 0) {
				$cuentaLogic->getEntity($otro_impuesto_session->bigidcuenta_comprasActual);//WithConnection

				$otro_impuestoForeignKey->cuenta_comprassFK[$cuentaLogic->getcuenta()->getId()]=otro_impuesto_util::getcuenta_comprasDescripcion($cuentaLogic->getcuenta());
				$otro_impuestoForeignKey->idcuenta_comprasDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($otro_impuesto,$listaproducto_comprass,$productos,$clientes,$proveedors) {
		$this->saveRelacionesBase($otro_impuesto,$listaproducto_comprass,$productos,$clientes,$proveedors,true);
	}

	public function saveRelaciones($otro_impuesto,$listaproducto_comprass,$productos,$clientes,$proveedors) {
		$this->saveRelacionesBase($otro_impuesto,$listaproducto_comprass,$productos,$clientes,$proveedors,false);
	}

	public function saveRelacionesBase($otro_impuesto,$listaproducto_comprass=array(),$productos=array(),$clientes=array(),$proveedors=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$otro_impuesto->setlista_producto_comprass($listaproducto_comprass);
			$otro_impuesto->setproductos($productos);
			$otro_impuesto->setclientes($clientes);
			$otro_impuesto->setproveedors($proveedors);
			$this->setotro_impuesto($otro_impuesto);

			if(true) {

				//otro_impuesto_logic_add::updateRelacionesToSave($otro_impuesto,$this);

				if(($this->otro_impuesto->getIsNew() || $this->otro_impuesto->getIsChanged()) && !$this->otro_impuesto->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($listaproducto_comprass,$productos,$clientes,$proveedors);

				} else if($this->otro_impuesto->getIsDeleted()) {
					$this->saveRelacionesDetalles($listaproducto_comprass,$productos,$clientes,$proveedors);
					$this->save();
				}

				//otro_impuesto_logic_add::updateRelacionesToSaveAfter($otro_impuesto,$this);

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
	
	
	public function saveRelacionesDetalles($listaproducto_comprass=array(),$productos=array(),$clientes=array(),$proveedors=array()) {
		try {
	

			$idotro_impuestoActual=$this->getotro_impuesto()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/lista_producto_carga.php');
			lista_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$listaproducto_comprasLogic_Desde_otro_impuesto=new lista_producto_logic();
			$listaproducto_comprasLogic_Desde_otro_impuesto->setlista_productos($listaproducto_comprass);

			$listaproducto_comprasLogic_Desde_otro_impuesto->setConnexion($this->getConnexion());
			$listaproducto_comprasLogic_Desde_otro_impuesto->setDatosCliente($this->datosCliente);

			foreach($listaproducto_comprasLogic_Desde_otro_impuesto->getlista_productos() as $listaproducto_Desde_otro_impuesto) {
				$listaproducto_Desde_otro_impuesto->setid_otro_impuesto_compras($idotro_impuestoActual);
			}

			$listaproducto_comprasLogic_Desde_otro_impuesto->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/producto_carga.php');
			producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$productoLogic_Desde_otro_impuesto=new producto_logic();
			$productoLogic_Desde_otro_impuesto->setproductos($productos);

			$productoLogic_Desde_otro_impuesto->setConnexion($this->getConnexion());
			$productoLogic_Desde_otro_impuesto->setDatosCliente($this->datosCliente);

			foreach($productoLogic_Desde_otro_impuesto->getproductos() as $producto_Desde_otro_impuesto) {
				$producto_Desde_otro_impuesto->setid_otro_impuesto($idotro_impuestoActual);

				$productoLogic_Desde_otro_impuesto->setproducto($producto_Desde_otro_impuesto);
				$productoLogic_Desde_otro_impuesto->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cliente_carga.php');
			cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$clienteLogic_Desde_otro_impuesto=new cliente_logic();
			$clienteLogic_Desde_otro_impuesto->setclientes($clientes);

			$clienteLogic_Desde_otro_impuesto->setConnexion($this->getConnexion());
			$clienteLogic_Desde_otro_impuesto->setDatosCliente($this->datosCliente);

			foreach($clienteLogic_Desde_otro_impuesto->getclientes() as $cliente_Desde_otro_impuesto) {
				$cliente_Desde_otro_impuesto->setid_otro_impuesto($idotro_impuestoActual);

				$clienteLogic_Desde_otro_impuesto->setcliente($cliente_Desde_otro_impuesto);
				$clienteLogic_Desde_otro_impuesto->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/proveedor_carga.php');
			proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$proveedorLogic_Desde_otro_impuesto=new proveedor_logic();
			$proveedorLogic_Desde_otro_impuesto->setproveedors($proveedors);

			$proveedorLogic_Desde_otro_impuesto->setConnexion($this->getConnexion());
			$proveedorLogic_Desde_otro_impuesto->setDatosCliente($this->datosCliente);

			foreach($proveedorLogic_Desde_otro_impuesto->getproveedors() as $proveedor_Desde_otro_impuesto) {
				$proveedor_Desde_otro_impuesto->setid_otro_impuesto($idotro_impuestoActual);

				$proveedorLogic_Desde_otro_impuesto->setproveedor($proveedor_Desde_otro_impuesto);
				$proveedorLogic_Desde_otro_impuesto->save();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $otro_impuestos,otro_impuesto_param_return $otro_impuestoParameterGeneral) : otro_impuesto_param_return {
		$otro_impuestoReturnGeneral=new otro_impuesto_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $otro_impuestoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $otro_impuestos,otro_impuesto_param_return $otro_impuestoParameterGeneral) : otro_impuesto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$otro_impuestoReturnGeneral=new otro_impuesto_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $otro_impuestoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $otro_impuestos,otro_impuesto $otro_impuesto,otro_impuesto_param_return $otro_impuestoParameterGeneral,bool $isEsNuevootro_impuesto,array $clases) : otro_impuesto_param_return {
		 try {	
			$otro_impuestoReturnGeneral=new otro_impuesto_param_return();
	
			$otro_impuestoReturnGeneral->setotro_impuesto($otro_impuesto);
			$otro_impuestoReturnGeneral->setotro_impuestos($otro_impuestos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$otro_impuestoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $otro_impuestoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $otro_impuestos,otro_impuesto $otro_impuesto,otro_impuesto_param_return $otro_impuestoParameterGeneral,bool $isEsNuevootro_impuesto,array $clases) : otro_impuesto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$otro_impuestoReturnGeneral=new otro_impuesto_param_return();
	
			$otro_impuestoReturnGeneral->setotro_impuesto($otro_impuesto);
			$otro_impuestoReturnGeneral->setotro_impuestos($otro_impuestos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$otro_impuestoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $otro_impuestoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $otro_impuestos,otro_impuesto $otro_impuesto,otro_impuesto_param_return $otro_impuestoParameterGeneral,bool $isEsNuevootro_impuesto,array $clases) : otro_impuesto_param_return {
		 try {	
			$otro_impuestoReturnGeneral=new otro_impuesto_param_return();
	
			$otro_impuestoReturnGeneral->setotro_impuesto($otro_impuesto);
			$otro_impuestoReturnGeneral->setotro_impuestos($otro_impuestos);
			
			
			
			return $otro_impuestoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $otro_impuestos,otro_impuesto $otro_impuesto,otro_impuesto_param_return $otro_impuestoParameterGeneral,bool $isEsNuevootro_impuesto,array $clases) : otro_impuesto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$otro_impuestoReturnGeneral=new otro_impuesto_param_return();
	
			$otro_impuestoReturnGeneral->setotro_impuesto($otro_impuesto);
			$otro_impuestoReturnGeneral->setotro_impuestos($otro_impuestos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $otro_impuestoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,otro_impuesto $otro_impuesto,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,otro_impuesto $otro_impuesto,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		otro_impuesto_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		otro_impuesto_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(otro_impuesto $otro_impuesto,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//otro_impuesto_logic_add::updateotro_impuestoToGet($this->otro_impuesto);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$otro_impuesto->setempresa($this->otro_impuestoDataAccess->getempresa($this->connexion,$otro_impuesto));
		$otro_impuesto->setcuenta_ventas($this->otro_impuestoDataAccess->getcuenta_ventas($this->connexion,$otro_impuesto));
		$otro_impuesto->setcuenta_compras($this->otro_impuestoDataAccess->getcuenta_compras($this->connexion,$otro_impuesto));
		$otro_impuesto->setlista_producto_comprass($this->otro_impuestoDataAccess->getlista_producto_comprass($this->connexion,$otro_impuesto));
		$otro_impuesto->setproductos($this->otro_impuestoDataAccess->getproductos($this->connexion,$otro_impuesto));
		$otro_impuesto->setclientes($this->otro_impuestoDataAccess->getclientes($this->connexion,$otro_impuesto));
		$otro_impuesto->setproveedors($this->otro_impuestoDataAccess->getproveedors($this->connexion,$otro_impuesto));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$otro_impuesto->setempresa($this->otro_impuestoDataAccess->getempresa($this->connexion,$otro_impuesto));
				continue;
			}

			if($clas->clas==cuenta::$class.'_ventas') {
				$otro_impuesto->setcuenta_ventas($this->otro_impuestoDataAccess->getcuenta_ventas($this->connexion,$otro_impuesto));
				continue;
			}

			if($clas->clas==cuenta::$class.'_compras') {
				$otro_impuesto->setcuenta_compras($this->otro_impuestoDataAccess->getcuenta_compras($this->connexion,$otro_impuesto));
				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$otro_impuesto->setlista_producto_comprass($this->otro_impuestoDataAccess->getlista_producto_comprass($this->connexion,$otro_impuesto));

				if($this->isConDeep) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproductoLogic->setlista_productos($otro_impuesto->getlista_producto_comprass());
					$classesLocal=lista_producto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$listaproductoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					lista_producto_util::refrescarFKDescripciones($listaproductoLogic->getlista_productos());
					$otro_impuesto->setlista_producto_comprass($listaproductoLogic->getlista_productos());
				}

				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$otro_impuesto->setproductos($this->otro_impuestoDataAccess->getproductos($this->connexion,$otro_impuesto));

				if($this->isConDeep) {
					$productoLogic= new producto_logic($this->connexion);
					$productoLogic->setproductos($otro_impuesto->getproductos());
					$classesLocal=producto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$productoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					producto_util::refrescarFKDescripciones($productoLogic->getproductos());
					$otro_impuesto->setproductos($productoLogic->getproductos());
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$otro_impuesto->setclientes($this->otro_impuestoDataAccess->getclientes($this->connexion,$otro_impuesto));

				if($this->isConDeep) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->setclientes($otro_impuesto->getclientes());
					$classesLocal=cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$clienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cliente_util::refrescarFKDescripciones($clienteLogic->getclientes());
					$otro_impuesto->setclientes($clienteLogic->getclientes());
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$otro_impuesto->setproveedors($this->otro_impuestoDataAccess->getproveedors($this->connexion,$otro_impuesto));

				if($this->isConDeep) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->setproveedors($otro_impuesto->getproveedors());
					$classesLocal=proveedor_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					proveedor_util::refrescarFKDescripciones($proveedorLogic->getproveedors());
					$otro_impuesto->setproveedors($proveedorLogic->getproveedors());
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
			$otro_impuesto->setempresa($this->otro_impuestoDataAccess->getempresa($this->connexion,$otro_impuesto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$otro_impuesto->setcuenta_ventas($this->otro_impuestoDataAccess->getcuenta_ventas($this->connexion,$otro_impuesto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$otro_impuesto->setcuenta_compras($this->otro_impuestoDataAccess->getcuenta_compras($this->connexion,$otro_impuesto));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_producto::$class);
			$otro_impuesto->setlista_producto_comprass($this->otro_impuestoDataAccess->getlista_producto_comprass($this->connexion,$otro_impuesto));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto::$class);
			$otro_impuesto->setproductos($this->otro_impuestoDataAccess->getproductos($this->connexion,$otro_impuesto));
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
			$otro_impuesto->setclientes($this->otro_impuestoDataAccess->getclientes($this->connexion,$otro_impuesto));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);
			$otro_impuesto->setproveedors($this->otro_impuestoDataAccess->getproveedors($this->connexion,$otro_impuesto));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$otro_impuesto->setempresa($this->otro_impuestoDataAccess->getempresa($this->connexion,$otro_impuesto));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($otro_impuesto->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$otro_impuesto->setcuenta_ventas($this->otro_impuestoDataAccess->getcuenta_ventas($this->connexion,$otro_impuesto));
		$cuenta_ventasLogic= new cuenta_logic($this->connexion);
		$cuenta_ventasLogic->deepLoad($otro_impuesto->getcuenta_ventas(),$isDeep,$deepLoadType,$clases);
				
		$otro_impuesto->setcuenta_compras($this->otro_impuestoDataAccess->getcuenta_compras($this->connexion,$otro_impuesto));
		$cuenta_comprasLogic= new cuenta_logic($this->connexion);
		$cuenta_comprasLogic->deepLoad($otro_impuesto->getcuenta_compras(),$isDeep,$deepLoadType,$clases);
				

		$otro_impuesto->setlista_producto_comprass($this->otro_impuestoDataAccess->getlista_producto_comprass($this->connexion,$otro_impuesto));

		foreach($otro_impuesto->getlista_producto_comprass() as $listaproducto) {
			$listaproductoLogic= new lista_producto_logic($this->connexion);
			$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
		}

		$otro_impuesto->setproductos($this->otro_impuestoDataAccess->getproductos($this->connexion,$otro_impuesto));

		foreach($otro_impuesto->getproductos() as $producto) {
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
		}

		$otro_impuesto->setclientes($this->otro_impuestoDataAccess->getclientes($this->connexion,$otro_impuesto));

		foreach($otro_impuesto->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
		}

		$otro_impuesto->setproveedors($this->otro_impuestoDataAccess->getproveedors($this->connexion,$otro_impuesto));

		foreach($otro_impuesto->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$otro_impuesto->setempresa($this->otro_impuestoDataAccess->getempresa($this->connexion,$otro_impuesto));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($otro_impuesto->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_ventas') {
				$otro_impuesto->setcuenta_ventas($this->otro_impuestoDataAccess->getcuenta_ventas($this->connexion,$otro_impuesto));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($otro_impuesto->getcuenta_ventas(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_compras') {
				$otro_impuesto->setcuenta_compras($this->otro_impuestoDataAccess->getcuenta_compras($this->connexion,$otro_impuesto));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($otro_impuesto->getcuenta_compras(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$otro_impuesto->setlista_producto_comprass($this->otro_impuestoDataAccess->getlista_producto_comprass($this->connexion,$otro_impuesto));

				foreach($otro_impuesto->getlista_producto_comprass() as $listaproducto) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$otro_impuesto->setproductos($this->otro_impuestoDataAccess->getproductos($this->connexion,$otro_impuesto));

				foreach($otro_impuesto->getproductos() as $producto) {
					$productoLogic= new producto_logic($this->connexion);
					$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$otro_impuesto->setclientes($this->otro_impuestoDataAccess->getclientes($this->connexion,$otro_impuesto));

				foreach($otro_impuesto->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$otro_impuesto->setproveedors($this->otro_impuestoDataAccess->getproveedors($this->connexion,$otro_impuesto));

				foreach($otro_impuesto->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
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
			$otro_impuesto->setempresa($this->otro_impuestoDataAccess->getempresa($this->connexion,$otro_impuesto));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($otro_impuesto->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$otro_impuesto->setcuenta_ventas($this->otro_impuestoDataAccess->getcuenta_ventas($this->connexion,$otro_impuesto));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($otro_impuesto->getcuenta_ventas(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$otro_impuesto->setcuenta_compras($this->otro_impuestoDataAccess->getcuenta_compras($this->connexion,$otro_impuesto));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($otro_impuesto->getcuenta_compras(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_producto::$class);
			$otro_impuesto->setlista_producto_comprass($this->otro_impuestoDataAccess->getlista_producto_comprass($this->connexion,$otro_impuesto));

			foreach($otro_impuesto->getlista_producto_comprass() as $listaproducto) {
				$listaproductoLogic= new lista_producto_logic($this->connexion);
				$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto::$class);
			$otro_impuesto->setproductos($this->otro_impuestoDataAccess->getproductos($this->connexion,$otro_impuesto));

			foreach($otro_impuesto->getproductos() as $producto) {
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
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
			$otro_impuesto->setclientes($this->otro_impuestoDataAccess->getclientes($this->connexion,$otro_impuesto));

			foreach($otro_impuesto->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);
			$otro_impuesto->setproveedors($this->otro_impuestoDataAccess->getproveedors($this->connexion,$otro_impuesto));

			foreach($otro_impuesto->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(otro_impuesto $otro_impuesto,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//otro_impuesto_logic_add::updateotro_impuestoToSave($this->otro_impuesto);			
			
			if(!$paraDeleteCascade) {				
				otro_impuesto_data::save($otro_impuesto, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($otro_impuesto->getempresa(),$this->connexion);
		cuenta_data::save($otro_impuesto->getcuenta_ventas(),$this->connexion);
		cuenta_data::save($otro_impuesto->getcuenta_compras(),$this->connexion);

		foreach($otro_impuesto->getlista_producto_comprass() as $listaproducto) {
			$listaproducto->setid_otro_impuesto($otro_impuesto->getId());
			lista_producto_data::save($listaproducto,$this->connexion);
		}


		foreach($otro_impuesto->getproductos() as $producto) {
			$producto->setid_otro_impuesto($otro_impuesto->getId());
			producto_data::save($producto,$this->connexion);
		}


		foreach($otro_impuesto->getclientes() as $cliente) {
			$cliente->setid_otro_impuesto($otro_impuesto->getId());
			cliente_data::save($cliente,$this->connexion);
		}


		foreach($otro_impuesto->getproveedors() as $proveedor) {
			$proveedor->setid_otro_impuesto($otro_impuesto->getId());
			proveedor_data::save($proveedor,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($otro_impuesto->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'_ventas') {
				cuenta_data::save($otro_impuesto->getcuenta_ventas(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'_compras') {
				cuenta_data::save($otro_impuesto->getcuenta_compras(),$this->connexion);
				continue;
			}


			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($otro_impuesto->getlista_producto_comprass() as $listaproducto) {
					$listaproducto->setid_otro_impuesto($otro_impuesto->getId());
					lista_producto_data::save($listaproducto,$this->connexion);
				}

				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($otro_impuesto->getproductos() as $producto) {
					$producto->setid_otro_impuesto($otro_impuesto->getId());
					producto_data::save($producto,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($otro_impuesto->getclientes() as $cliente) {
					$cliente->setid_otro_impuesto($otro_impuesto->getId());
					cliente_data::save($cliente,$this->connexion);
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($otro_impuesto->getproveedors() as $proveedor) {
					$proveedor->setid_otro_impuesto($otro_impuesto->getId());
					proveedor_data::save($proveedor,$this->connexion);
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
			empresa_data::save($otro_impuesto->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($otro_impuesto->getcuenta_ventas(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($otro_impuesto->getcuenta_compras(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_producto::$class);

			foreach($otro_impuesto->getlista_producto_comprass() as $listaproducto) {
				$listaproducto->setid_otro_impuesto($otro_impuesto->getId());
				lista_producto_data::save($listaproducto,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto::$class);

			foreach($otro_impuesto->getproductos() as $producto) {
				$producto->setid_otro_impuesto($otro_impuesto->getId());
				producto_data::save($producto,$this->connexion);
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

			foreach($otro_impuesto->getclientes() as $cliente) {
				$cliente->setid_otro_impuesto($otro_impuesto->getId());
				cliente_data::save($cliente,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);

			foreach($otro_impuesto->getproveedors() as $proveedor) {
				$proveedor->setid_otro_impuesto($otro_impuesto->getId());
				proveedor_data::save($proveedor,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($otro_impuesto->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($otro_impuesto->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($otro_impuesto->getcuenta_ventas(),$this->connexion);
		$cuenta_ventasLogic= new cuenta_logic($this->connexion);
		$cuenta_ventasLogic->deepSave($otro_impuesto->getcuenta_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($otro_impuesto->getcuenta_compras(),$this->connexion);
		$cuenta_comprasLogic= new cuenta_logic($this->connexion);
		$cuenta_comprasLogic->deepSave($otro_impuesto->getcuenta_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($otro_impuesto->getlista_producto_comprass() as $listaproducto) {
			$listaproductoLogic= new lista_producto_logic($this->connexion);
			$listaproducto->setid_otro_impuesto($otro_impuesto->getId());
			lista_producto_data::save($listaproducto,$this->connexion);
			$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($otro_impuesto->getproductos() as $producto) {
			$productoLogic= new producto_logic($this->connexion);
			$producto->setid_otro_impuesto($otro_impuesto->getId());
			producto_data::save($producto,$this->connexion);
			$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($otro_impuesto->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$cliente->setid_otro_impuesto($otro_impuesto->getId());
			cliente_data::save($cliente,$this->connexion);
			$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($otro_impuesto->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedor->setid_otro_impuesto($otro_impuesto->getId());
			proveedor_data::save($proveedor,$this->connexion);
			$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($otro_impuesto->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($otro_impuesto->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_ventas') {
				cuenta_data::save($otro_impuesto->getcuenta_ventas(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($otro_impuesto->getcuenta_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_compras') {
				cuenta_data::save($otro_impuesto->getcuenta_compras(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($otro_impuesto->getcuenta_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($otro_impuesto->getlista_producto_comprass() as $listaproducto) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproducto->setid_otro_impuesto($otro_impuesto->getId());
					lista_producto_data::save($listaproducto,$this->connexion);
					$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($otro_impuesto->getproductos() as $producto) {
					$productoLogic= new producto_logic($this->connexion);
					$producto->setid_otro_impuesto($otro_impuesto->getId());
					producto_data::save($producto,$this->connexion);
					$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($otro_impuesto->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$cliente->setid_otro_impuesto($otro_impuesto->getId());
					cliente_data::save($cliente,$this->connexion);
					$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($otro_impuesto->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedor->setid_otro_impuesto($otro_impuesto->getId());
					proveedor_data::save($proveedor,$this->connexion);
					$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($otro_impuesto->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($otro_impuesto->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($otro_impuesto->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($otro_impuesto->getcuenta_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($otro_impuesto->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($otro_impuesto->getcuenta_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(lista_producto::$class);

			foreach($otro_impuesto->getlista_producto_comprass() as $listaproducto) {
				$listaproductoLogic= new lista_producto_logic($this->connexion);
				$listaproducto->setid_otro_impuesto($otro_impuesto->getId());
				lista_producto_data::save($listaproducto,$this->connexion);
				$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(producto::$class);

			foreach($otro_impuesto->getproductos() as $producto) {
				$productoLogic= new producto_logic($this->connexion);
				$producto->setid_otro_impuesto($otro_impuesto->getId());
				producto_data::save($producto,$this->connexion);
				$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($otro_impuesto->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$cliente->setid_otro_impuesto($otro_impuesto->getId());
				cliente_data::save($cliente,$this->connexion);
				$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(proveedor::$class);

			foreach($otro_impuesto->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedor->setid_otro_impuesto($otro_impuesto->getId());
				proveedor_data::save($proveedor,$this->connexion);
				$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				otro_impuesto_data::save($otro_impuesto, $this->connexion);
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
			
			$this->deepLoad($this->otro_impuesto,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->otro_impuestos as $otro_impuesto) {
				$this->deepLoad($otro_impuesto,$isDeep,$deepLoadType,$clases);
								
				otro_impuesto_util::refrescarFKDescripciones($this->otro_impuestos);
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
			
			foreach($this->otro_impuestos as $otro_impuesto) {
				$this->deepLoad($otro_impuesto,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->otro_impuesto,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->otro_impuestos as $otro_impuesto) {
				$this->deepSave($otro_impuesto,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->otro_impuestos as $otro_impuesto) {
				$this->deepSave($otro_impuesto,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(cuenta::$class);
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
					if($clas->clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
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
				
				$classes[]=new Classe(lista_producto::$class);
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(cliente::$class);
				$classes[]=new Classe(proveedor::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==lista_producto::$class) {
						$classes[]=new Classe(lista_producto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==producto::$class) {
						$classes[]=new Classe(producto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==lista_producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(lista_producto::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(producto::$class);
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
					if($clas->clas==proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(proveedor::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getotro_impuesto() : ?otro_impuesto {	
		/*
		otro_impuesto_logic_add::checkotro_impuestoToGet($this->otro_impuesto,$this->datosCliente);
		otro_impuesto_logic_add::updateotro_impuestoToGet($this->otro_impuesto);
		*/
			
		return $this->otro_impuesto;
	}
		
	public function setotro_impuesto(otro_impuesto $newotro_impuesto) {
		$this->otro_impuesto = $newotro_impuesto;
	}
	
	public function getotro_impuestos() : array {		
		/*
		otro_impuesto_logic_add::checkotro_impuestoToGets($this->otro_impuestos,$this->datosCliente);
		
		foreach ($this->otro_impuestos as $otro_impuestoLocal ) {
			otro_impuesto_logic_add::updateotro_impuestoToGet($otro_impuestoLocal);
		}
		*/
		
		return $this->otro_impuestos;
	}
	
	public function setotro_impuestos(array $newotro_impuestos) {
		$this->otro_impuestos = $newotro_impuestos;
	}
	
	public function getotro_impuestoDataAccess() : otro_impuesto_data {
		return $this->otro_impuestoDataAccess;
	}
	
	public function setotro_impuestoDataAccess(otro_impuesto_data $newotro_impuestoDataAccess) {
		$this->otro_impuestoDataAccess = $newotro_impuestoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        otro_impuesto_carga::$CONTROLLER;;        
		
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
