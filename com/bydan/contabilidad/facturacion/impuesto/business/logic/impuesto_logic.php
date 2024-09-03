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

namespace com\bydan\contabilidad\facturacion\impuesto\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_carga;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_param_return;

use com\bydan\contabilidad\facturacion\impuesto\presentation\session\impuesto_session;

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

use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_util;
use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;
use com\bydan\contabilidad\facturacion\impuesto\business\data\impuesto_data;

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




class impuesto_logic  extends GeneralEntityLogic implements impuesto_logicI {	
	/*GENERAL*/
	public impuesto_data $impuestoDataAccess;
	//public ?impuesto_logic_add $impuestoLogicAdditional=null;
	public ?impuesto $impuesto;
	public array $impuestos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->impuestoDataAccess = new impuesto_data();			
			$this->impuestos = array();
			$this->impuesto = new impuesto();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->impuestoLogicAdditional = new impuesto_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->impuestoLogicAdditional==null) {
		//	$this->impuestoLogicAdditional=new impuesto_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->impuestoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->impuestoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->impuestoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->impuestoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->impuestos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->impuestos=$this->impuestoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				impuesto_util::refrescarFKDescripciones($this->impuestos);
			}
			
			//impuesto_logic_add::checkimpuestoToGets($this->impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->impuestos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->impuestos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->impuestos=$this->impuestoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				impuesto_util::refrescarFKDescripciones($this->impuestos);
			}
			
			//impuesto_logic_add::checkimpuestoToGets($this->impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->impuestos);
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
		$this->impuesto = new impuesto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->impuesto=$this->impuestoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->impuesto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				impuesto_util::refrescarFKDescripcion($this->impuesto);
			}
						
			//impuesto_logic_add::checkimpuestoToGet($this->impuesto,$this->datosCliente);
			//impuesto_logic_add::updateimpuestoToGet($this->impuesto);
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
		$this->impuesto = new  impuesto();
		  		  
        try {		
			$this->impuesto=$this->impuestoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->impuesto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				impuesto_util::refrescarFKDescripcion($this->impuesto);
			}
			
			//impuesto_logic_add::checkimpuestoToGet($this->impuesto,$this->datosCliente);
			//impuesto_logic_add::updateimpuestoToGet($this->impuesto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?impuesto {
		$impuestoLogic = new  impuesto_logic();
		  		  
        try {		
			$impuestoLogic->setConnexion($connexion);			
			$impuestoLogic->getEntity($id);			
			return $impuestoLogic->getimpuesto();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->impuesto = new  impuesto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->impuesto=$this->impuestoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->impuesto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				impuesto_util::refrescarFKDescripcion($this->impuesto);
			}
			
			//impuesto_logic_add::checkimpuestoToGet($this->impuesto,$this->datosCliente);
			//impuesto_logic_add::updateimpuestoToGet($this->impuesto);
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
		$this->impuesto = new  impuesto();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->impuesto=$this->impuestoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->impuesto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				impuesto_util::refrescarFKDescripcion($this->impuesto);
			}
			
			//impuesto_logic_add::checkimpuestoToGet($this->impuesto,$this->datosCliente);
			//impuesto_logic_add::updateimpuestoToGet($this->impuesto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?impuesto {
		$impuestoLogic = new  impuesto_logic();
		  		  
        try {		
			$impuestoLogic->setConnexion($connexion);			
			$impuestoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $impuestoLogic->getimpuesto();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->impuestos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->impuestos=$this->impuestoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				impuesto_util::refrescarFKDescripciones($this->impuestos);
			}
			
			//impuesto_logic_add::checkimpuestoToGets($this->impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->impuestos);			
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
		$this->impuestos = array();
		  		  
        try {			
			$this->impuestos=$this->impuestoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				impuesto_util::refrescarFKDescripciones($this->impuestos);
			}
			
			//impuesto_logic_add::checkimpuestoToGets($this->impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->impuestos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->impuestos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->impuestos=$this->impuestoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				impuesto_util::refrescarFKDescripciones($this->impuestos);
			}
			
			//impuesto_logic_add::checkimpuestoToGets($this->impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->impuestos);
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
		$this->impuestos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->impuestos=$this->impuestoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				impuesto_util::refrescarFKDescripciones($this->impuestos);
			}
			
			//impuesto_logic_add::checkimpuestoToGets($this->impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->impuestos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$impuestoLogic = new  impuesto_logic();
		  		  
        try {		
			$impuestoLogic->setConnexion($connexion);			
			$impuestoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $impuestoLogic->getimpuestos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->impuestos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->impuestos=$this->impuestoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				impuesto_util::refrescarFKDescripciones($this->impuestos);
			}
			
			//impuesto_logic_add::checkimpuestoToGets($this->impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->impuestos);
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
		$this->impuestos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->impuestos=$this->impuestoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				impuesto_util::refrescarFKDescripciones($this->impuestos);
			}
			
			//impuesto_logic_add::checkimpuestoToGets($this->impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->impuestos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->impuestos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->impuestos=$this->impuestoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				impuesto_util::refrescarFKDescripciones($this->impuestos);
			}
			
			//impuesto_logic_add::checkimpuestoToGets($this->impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->impuestos);
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
		$this->impuestos = array();
		  		  
        try {			
			$this->impuestos=$this->impuestoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				impuesto_util::refrescarFKDescripciones($this->impuestos);
			}	
			
			//impuesto_logic_add::checkimpuestoToGets($this->impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->impuestos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->impuestos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->impuestos=$this->impuestoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				impuesto_util::refrescarFKDescripciones($this->impuestos);
			}
			
			//impuesto_logic_add::checkimpuestoToGets($this->impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->impuestos);
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
		$this->impuestos = array();
		  		  
        try {		
			$this->impuestos=$this->impuestoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				impuesto_util::refrescarFKDescripciones($this->impuestos);
			}
			
			//impuesto_logic_add::checkimpuestoToGets($this->impuestos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->impuestos);

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
			$parameterSelectionGeneralid_cuenta_compras->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_compras,impuesto_util::$ID_CUENTA_COMPRAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_compras);

			$this->impuestos=$this->impuestoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				impuesto_util::refrescarFKDescripciones($this->impuestos);
			}
			//impuesto_logic_add::checkimpuestoToGets($this->impuestos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->impuestos);

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
			$parameterSelectionGeneralid_cuenta_compras->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_compras,impuesto_util::$ID_CUENTA_COMPRAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_compras);

			$this->impuestos=$this->impuestoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				impuesto_util::refrescarFKDescripciones($this->impuestos);
			}
			//impuesto_logic_add::checkimpuestoToGets($this->impuestos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->impuestos);
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
			$parameterSelectionGeneralid_cuenta_ventas->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_ventas,impuesto_util::$ID_CUENTA_VENTAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_ventas);

			$this->impuestos=$this->impuestoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				impuesto_util::refrescarFKDescripciones($this->impuestos);
			}
			//impuesto_logic_add::checkimpuestoToGets($this->impuestos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->impuestos);

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
			$parameterSelectionGeneralid_cuenta_ventas->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_ventas,impuesto_util::$ID_CUENTA_VENTAS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_ventas);

			$this->impuestos=$this->impuestoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				impuesto_util::refrescarFKDescripciones($this->impuestos);
			}
			//impuesto_logic_add::checkimpuestoToGets($this->impuestos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->impuestos);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,impuesto_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->impuestos=$this->impuestoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				impuesto_util::refrescarFKDescripciones($this->impuestos);
			}
			//impuesto_logic_add::checkimpuestoToGets($this->impuestos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->impuestos);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,impuesto_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->impuestos=$this->impuestoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				impuesto_util::refrescarFKDescripciones($this->impuestos);
			}
			//impuesto_logic_add::checkimpuestoToGets($this->impuestos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->impuestos);
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
						
			//impuesto_logic_add::checkimpuestoToSave($this->impuesto,$this->datosCliente,$this->connexion);	       
			//impuesto_logic_add::updateimpuestoToSave($this->impuesto);			
			impuesto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->impuesto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->impuestoLogicAdditional->checkGeneralEntityToSave($this,$this->impuesto,$this->datosCliente,$this->connexion);
			
			
			impuesto_data::save($this->impuesto, $this->connexion);	    	       	 				
			//impuesto_logic_add::checkimpuestoToSaveAfter($this->impuesto,$this->datosCliente,$this->connexion);			
			//$this->impuestoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->impuesto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->impuesto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->impuesto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				impuesto_util::refrescarFKDescripcion($this->impuesto);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->impuesto->getIsDeleted()) {
				$this->impuesto=null;
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
						
			/*impuesto_logic_add::checkimpuestoToSave($this->impuesto,$this->datosCliente,$this->connexion);*/	        
			//impuesto_logic_add::updateimpuestoToSave($this->impuesto);			
			//$this->impuestoLogicAdditional->checkGeneralEntityToSave($this,$this->impuesto,$this->datosCliente,$this->connexion);			
			impuesto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->impuesto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			impuesto_data::save($this->impuesto, $this->connexion);	    	       	 						
			/*impuesto_logic_add::checkimpuestoToSaveAfter($this->impuesto,$this->datosCliente,$this->connexion);*/			
			//$this->impuestoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->impuesto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->impuesto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->impuesto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				impuesto_util::refrescarFKDescripcion($this->impuesto);				
			}
			
			if($this->impuesto->getIsDeleted()) {
				$this->impuesto=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(impuesto $impuesto,Connexion $connexion)  {
		$impuestoLogic = new  impuesto_logic();		  		  
        try {		
			$impuestoLogic->setConnexion($connexion);			
			$impuestoLogic->setimpuesto($impuesto);			
			$impuestoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*impuesto_logic_add::checkimpuestoToSaves($this->impuestos,$this->datosCliente,$this->connexion);*/	        	
			//$this->impuestoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->impuestos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->impuestos as $impuestoLocal) {				
								
				//impuesto_logic_add::updateimpuestoToSave($impuestoLocal);	        	
				impuesto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$impuestoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				impuesto_data::save($impuestoLocal, $this->connexion);				
			}
			
			/*impuesto_logic_add::checkimpuestoToSavesAfter($this->impuestos,$this->datosCliente,$this->connexion);*/			
			//$this->impuestoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->impuestos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				impuesto_util::refrescarFKDescripciones($this->impuestos);
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
			/*impuesto_logic_add::checkimpuestoToSaves($this->impuestos,$this->datosCliente,$this->connexion);*/			
			//$this->impuestoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->impuestos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->impuestos as $impuestoLocal) {				
								
				//impuesto_logic_add::updateimpuestoToSave($impuestoLocal);	        	
				impuesto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$impuestoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				impuesto_data::save($impuestoLocal, $this->connexion);				
			}			
			
			/*impuesto_logic_add::checkimpuestoToSavesAfter($this->impuestos,$this->datosCliente,$this->connexion);*/			
			//$this->impuestoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->impuestos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				impuesto_util::refrescarFKDescripciones($this->impuestos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $impuestos,Connexion $connexion)  {
		$impuestoLogic = new  impuesto_logic();
		  		  
        try {		
			$impuestoLogic->setConnexion($connexion);			
			$impuestoLogic->setimpuestos($impuestos);			
			$impuestoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$impuestosAux=array();
		
		foreach($this->impuestos as $impuesto) {
			if($impuesto->getIsDeleted()==false) {
				$impuestosAux[]=$impuesto;
			}
		}
		
		$this->impuestos=$impuestosAux;
	}
	
	public function updateToGetsAuxiliar(array &$impuestos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->impuestos as $impuesto) {
				
				$impuesto->setid_empresa_Descripcion(impuesto_util::getempresaDescripcion($impuesto->getempresa()));
				$impuesto->setid_cuenta_ventas_Descripcion(impuesto_util::getcuenta_ventasDescripcion($impuesto->getcuenta_ventas()));
				$impuesto->setid_cuenta_compras_Descripcion(impuesto_util::getcuenta_comprasDescripcion($impuesto->getcuenta_compras()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$impuesto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$impuesto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$impuesto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$impuestoForeignKey=new impuesto_param_return();//impuestoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$impuestoForeignKey,$impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_ventas',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_ventassFK($this->connexion,$strRecargarFkQuery,$impuestoForeignKey,$impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_compras',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_comprassFK($this->connexion,$strRecargarFkQuery,$impuestoForeignKey,$impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$impuestoForeignKey,$impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_ventas',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_ventassFK($this->connexion,' where id=-1 ',$impuestoForeignKey,$impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_compras',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_comprassFK($this->connexion,' where id=-1 ',$impuestoForeignKey,$impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $impuestoForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$impuestoForeignKey,$impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$impuestoForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($impuesto_session==null) {
			$impuesto_session=new impuesto_session();
		}
		
		if($impuesto_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($impuestoForeignKey->idempresaDefaultFK==0) {
					$impuestoForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$impuestoForeignKey->empresasFK[$empresaLocal->getId()]=impuesto_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($impuesto_session->bigidempresaActual!=null && $impuesto_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($impuesto_session->bigidempresaActual);//WithConnection

				$impuestoForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=impuesto_util::getempresaDescripcion($empresaLogic->getempresa());
				$impuestoForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarComboscuenta_ventassFK($connexion=null,$strRecargarFkQuery='',$impuestoForeignKey,$impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$impuestoForeignKey->cuenta_ventassFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($impuesto_session==null) {
			$impuesto_session=new impuesto_session();
		}
		
		if($impuesto_session->bitBusquedaDesdeFKSesioncuenta_ventas!=true) {
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
				if($impuestoForeignKey->idcuenta_ventasDefaultFK==0) {
					$impuestoForeignKey->idcuenta_ventasDefaultFK=$cuentaLocal->getId();
				}

				$impuestoForeignKey->cuenta_ventassFK[$cuentaLocal->getId()]=impuesto_util::getcuenta_ventasDescripcion($cuentaLocal);
			}

		} else {

			if($impuesto_session->bigidcuenta_ventasActual!=null && $impuesto_session->bigidcuenta_ventasActual > 0) {
				$cuentaLogic->getEntity($impuesto_session->bigidcuenta_ventasActual);//WithConnection

				$impuestoForeignKey->cuenta_ventassFK[$cuentaLogic->getcuenta()->getId()]=impuesto_util::getcuenta_ventasDescripcion($cuentaLogic->getcuenta());
				$impuestoForeignKey->idcuenta_ventasDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarComboscuenta_comprassFK($connexion=null,$strRecargarFkQuery='',$impuestoForeignKey,$impuesto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$impuestoForeignKey->cuenta_comprassFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($impuesto_session==null) {
			$impuesto_session=new impuesto_session();
		}
		
		if($impuesto_session->bitBusquedaDesdeFKSesioncuenta_compras!=true) {
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
				if($impuestoForeignKey->idcuenta_comprasDefaultFK==0) {
					$impuestoForeignKey->idcuenta_comprasDefaultFK=$cuentaLocal->getId();
				}

				$impuestoForeignKey->cuenta_comprassFK[$cuentaLocal->getId()]=impuesto_util::getcuenta_comprasDescripcion($cuentaLocal);
			}

		} else {

			if($impuesto_session->bigidcuenta_comprasActual!=null && $impuesto_session->bigidcuenta_comprasActual > 0) {
				$cuentaLogic->getEntity($impuesto_session->bigidcuenta_comprasActual);//WithConnection

				$impuestoForeignKey->cuenta_comprassFK[$cuentaLogic->getcuenta()->getId()]=impuesto_util::getcuenta_comprasDescripcion($cuentaLogic->getcuenta());
				$impuestoForeignKey->idcuenta_comprasDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($impuesto,$listaproducto_comprass,$productos,$clientes,$proveedors) {
		$this->saveRelacionesBase($impuesto,$listaproducto_comprass,$productos,$clientes,$proveedors,true);
	}

	public function saveRelaciones($impuesto,$listaproducto_comprass,$productos,$clientes,$proveedors) {
		$this->saveRelacionesBase($impuesto,$listaproducto_comprass,$productos,$clientes,$proveedors,false);
	}

	public function saveRelacionesBase($impuesto,$listaproducto_comprass=array(),$productos=array(),$clientes=array(),$proveedors=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$impuesto->setlista_producto_comprass($listaproducto_comprass);
			$impuesto->setproductos($productos);
			$impuesto->setclientes($clientes);
			$impuesto->setproveedors($proveedors);
			$this->setimpuesto($impuesto);

			if(true) {

				//impuesto_logic_add::updateRelacionesToSave($impuesto,$this);

				if(($this->impuesto->getIsNew() || $this->impuesto->getIsChanged()) && !$this->impuesto->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($listaproducto_comprass,$productos,$clientes,$proveedors);

				} else if($this->impuesto->getIsDeleted()) {
					$this->saveRelacionesDetalles($listaproducto_comprass,$productos,$clientes,$proveedors);
					$this->save();
				}

				//impuesto_logic_add::updateRelacionesToSaveAfter($impuesto,$this);

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
	

			$idimpuestoActual=$this->getimpuesto()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/lista_producto_carga.php');
			lista_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$listaproducto_comprasLogic_Desde_impuesto=new lista_producto_logic();
			$listaproducto_comprasLogic_Desde_impuesto->setlista_productos($listaproducto_comprass);

			$listaproducto_comprasLogic_Desde_impuesto->setConnexion($this->getConnexion());
			$listaproducto_comprasLogic_Desde_impuesto->setDatosCliente($this->datosCliente);

			foreach($listaproducto_comprasLogic_Desde_impuesto->getlista_productos() as $listaproducto_Desde_impuesto) {
				$listaproducto_Desde_impuesto->setid_impuesto_compras($idimpuestoActual);
			}

			$listaproducto_comprasLogic_Desde_impuesto->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/producto_carga.php');
			producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$productoLogic_Desde_impuesto=new producto_logic();
			$productoLogic_Desde_impuesto->setproductos($productos);

			$productoLogic_Desde_impuesto->setConnexion($this->getConnexion());
			$productoLogic_Desde_impuesto->setDatosCliente($this->datosCliente);

			foreach($productoLogic_Desde_impuesto->getproductos() as $producto_Desde_impuesto) {
				$producto_Desde_impuesto->setid_impuesto($idimpuestoActual);

				$productoLogic_Desde_impuesto->setproducto($producto_Desde_impuesto);
				$productoLogic_Desde_impuesto->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cliente_carga.php');
			cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$clienteLogic_Desde_impuesto=new cliente_logic();
			$clienteLogic_Desde_impuesto->setclientes($clientes);

			$clienteLogic_Desde_impuesto->setConnexion($this->getConnexion());
			$clienteLogic_Desde_impuesto->setDatosCliente($this->datosCliente);

			foreach($clienteLogic_Desde_impuesto->getclientes() as $cliente_Desde_impuesto) {
				$cliente_Desde_impuesto->setid_impuesto($idimpuestoActual);

				$clienteLogic_Desde_impuesto->setcliente($cliente_Desde_impuesto);
				$clienteLogic_Desde_impuesto->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/proveedor_carga.php');
			proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$proveedorLogic_Desde_impuesto=new proveedor_logic();
			$proveedorLogic_Desde_impuesto->setproveedors($proveedors);

			$proveedorLogic_Desde_impuesto->setConnexion($this->getConnexion());
			$proveedorLogic_Desde_impuesto->setDatosCliente($this->datosCliente);

			foreach($proveedorLogic_Desde_impuesto->getproveedors() as $proveedor_Desde_impuesto) {
				$proveedor_Desde_impuesto->setid_impuesto($idimpuestoActual);

				$proveedorLogic_Desde_impuesto->setproveedor($proveedor_Desde_impuesto);
				$proveedorLogic_Desde_impuesto->save();
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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $impuestos,impuesto_param_return $impuestoParameterGeneral) : impuesto_param_return {
		$impuestoReturnGeneral=new impuesto_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $impuestoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $impuestos,impuesto_param_return $impuestoParameterGeneral) : impuesto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$impuestoReturnGeneral=new impuesto_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $impuestoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $impuestos,impuesto $impuesto,impuesto_param_return $impuestoParameterGeneral,bool $isEsNuevoimpuesto,array $clases) : impuesto_param_return {
		 try {	
			$impuestoReturnGeneral=new impuesto_param_return();
	
			$impuestoReturnGeneral->setimpuesto($impuesto);
			$impuestoReturnGeneral->setimpuestos($impuestos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$impuestoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $impuestoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $impuestos,impuesto $impuesto,impuesto_param_return $impuestoParameterGeneral,bool $isEsNuevoimpuesto,array $clases) : impuesto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$impuestoReturnGeneral=new impuesto_param_return();
	
			$impuestoReturnGeneral->setimpuesto($impuesto);
			$impuestoReturnGeneral->setimpuestos($impuestos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$impuestoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $impuestoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $impuestos,impuesto $impuesto,impuesto_param_return $impuestoParameterGeneral,bool $isEsNuevoimpuesto,array $clases) : impuesto_param_return {
		 try {	
			$impuestoReturnGeneral=new impuesto_param_return();
	
			$impuestoReturnGeneral->setimpuesto($impuesto);
			$impuestoReturnGeneral->setimpuestos($impuestos);
			
			
			
			return $impuestoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $impuestos,impuesto $impuesto,impuesto_param_return $impuestoParameterGeneral,bool $isEsNuevoimpuesto,array $clases) : impuesto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$impuestoReturnGeneral=new impuesto_param_return();
	
			$impuestoReturnGeneral->setimpuesto($impuesto);
			$impuestoReturnGeneral->setimpuestos($impuestos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $impuestoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,impuesto $impuesto,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,impuesto $impuesto,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		impuesto_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		impuesto_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(impuesto $impuesto,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//impuesto_logic_add::updateimpuestoToGet($this->impuesto);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$impuesto->setempresa($this->impuestoDataAccess->getempresa($this->connexion,$impuesto));
		$impuesto->setcuenta_ventas($this->impuestoDataAccess->getcuenta_ventas($this->connexion,$impuesto));
		$impuesto->setcuenta_compras($this->impuestoDataAccess->getcuenta_compras($this->connexion,$impuesto));
		$impuesto->setlista_producto_comprass($this->impuestoDataAccess->getlista_producto_comprass($this->connexion,$impuesto));
		$impuesto->setproductos($this->impuestoDataAccess->getproductos($this->connexion,$impuesto));
		$impuesto->setclientes($this->impuestoDataAccess->getclientes($this->connexion,$impuesto));
		$impuesto->setproveedors($this->impuestoDataAccess->getproveedors($this->connexion,$impuesto));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$impuesto->setempresa($this->impuestoDataAccess->getempresa($this->connexion,$impuesto));
				continue;
			}

			if($clas->clas==cuenta::$class.'_ventas') {
				$impuesto->setcuenta_ventas($this->impuestoDataAccess->getcuenta_ventas($this->connexion,$impuesto));
				continue;
			}

			if($clas->clas==cuenta::$class.'_compras') {
				$impuesto->setcuenta_compras($this->impuestoDataAccess->getcuenta_compras($this->connexion,$impuesto));
				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$impuesto->setlista_producto_comprass($this->impuestoDataAccess->getlista_producto_comprass($this->connexion,$impuesto));

				if($this->isConDeep) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproductoLogic->setlista_productos($impuesto->getlista_producto_comprass());
					$classesLocal=lista_producto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$listaproductoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					lista_producto_util::refrescarFKDescripciones($listaproductoLogic->getlista_productos());
					$impuesto->setlista_producto_comprass($listaproductoLogic->getlista_productos());
				}

				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$impuesto->setproductos($this->impuestoDataAccess->getproductos($this->connexion,$impuesto));

				if($this->isConDeep) {
					$productoLogic= new producto_logic($this->connexion);
					$productoLogic->setproductos($impuesto->getproductos());
					$classesLocal=producto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$productoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					producto_util::refrescarFKDescripciones($productoLogic->getproductos());
					$impuesto->setproductos($productoLogic->getproductos());
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$impuesto->setclientes($this->impuestoDataAccess->getclientes($this->connexion,$impuesto));

				if($this->isConDeep) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->setclientes($impuesto->getclientes());
					$classesLocal=cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$clienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cliente_util::refrescarFKDescripciones($clienteLogic->getclientes());
					$impuesto->setclientes($clienteLogic->getclientes());
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$impuesto->setproveedors($this->impuestoDataAccess->getproveedors($this->connexion,$impuesto));

				if($this->isConDeep) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->setproveedors($impuesto->getproveedors());
					$classesLocal=proveedor_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					proveedor_util::refrescarFKDescripciones($proveedorLogic->getproveedors());
					$impuesto->setproveedors($proveedorLogic->getproveedors());
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
			$impuesto->setempresa($this->impuestoDataAccess->getempresa($this->connexion,$impuesto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$impuesto->setcuenta_ventas($this->impuestoDataAccess->getcuenta_ventas($this->connexion,$impuesto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$impuesto->setcuenta_compras($this->impuestoDataAccess->getcuenta_compras($this->connexion,$impuesto));
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
			$impuesto->setlista_producto_comprass($this->impuestoDataAccess->getlista_producto_comprass($this->connexion,$impuesto));
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
			$impuesto->setproductos($this->impuestoDataAccess->getproductos($this->connexion,$impuesto));
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
			$impuesto->setclientes($this->impuestoDataAccess->getclientes($this->connexion,$impuesto));
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
			$impuesto->setproveedors($this->impuestoDataAccess->getproveedors($this->connexion,$impuesto));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$impuesto->setempresa($this->impuestoDataAccess->getempresa($this->connexion,$impuesto));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($impuesto->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$impuesto->setcuenta_ventas($this->impuestoDataAccess->getcuenta_ventas($this->connexion,$impuesto));
		$cuenta_ventasLogic= new cuenta_logic($this->connexion);
		$cuenta_ventasLogic->deepLoad($impuesto->getcuenta_ventas(),$isDeep,$deepLoadType,$clases);
				
		$impuesto->setcuenta_compras($this->impuestoDataAccess->getcuenta_compras($this->connexion,$impuesto));
		$cuenta_comprasLogic= new cuenta_logic($this->connexion);
		$cuenta_comprasLogic->deepLoad($impuesto->getcuenta_compras(),$isDeep,$deepLoadType,$clases);
				

		$impuesto->setlista_producto_comprass($this->impuestoDataAccess->getlista_producto_comprass($this->connexion,$impuesto));

		foreach($impuesto->getlista_producto_comprass() as $listaproducto) {
			$listaproductoLogic= new lista_producto_logic($this->connexion);
			$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
		}

		$impuesto->setproductos($this->impuestoDataAccess->getproductos($this->connexion,$impuesto));

		foreach($impuesto->getproductos() as $producto) {
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
		}

		$impuesto->setclientes($this->impuestoDataAccess->getclientes($this->connexion,$impuesto));

		foreach($impuesto->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
		}

		$impuesto->setproveedors($this->impuestoDataAccess->getproveedors($this->connexion,$impuesto));

		foreach($impuesto->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$impuesto->setempresa($this->impuestoDataAccess->getempresa($this->connexion,$impuesto));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($impuesto->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_ventas') {
				$impuesto->setcuenta_ventas($this->impuestoDataAccess->getcuenta_ventas($this->connexion,$impuesto));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($impuesto->getcuenta_ventas(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_compras') {
				$impuesto->setcuenta_compras($this->impuestoDataAccess->getcuenta_compras($this->connexion,$impuesto));
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepLoad($impuesto->getcuenta_compras(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$impuesto->setlista_producto_comprass($this->impuestoDataAccess->getlista_producto_comprass($this->connexion,$impuesto));

				foreach($impuesto->getlista_producto_comprass() as $listaproducto) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$impuesto->setproductos($this->impuestoDataAccess->getproductos($this->connexion,$impuesto));

				foreach($impuesto->getproductos() as $producto) {
					$productoLogic= new producto_logic($this->connexion);
					$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$impuesto->setclientes($this->impuestoDataAccess->getclientes($this->connexion,$impuesto));

				foreach($impuesto->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$impuesto->setproveedors($this->impuestoDataAccess->getproveedors($this->connexion,$impuesto));

				foreach($impuesto->getproveedors() as $proveedor) {
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
			$impuesto->setempresa($this->impuestoDataAccess->getempresa($this->connexion,$impuesto));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($impuesto->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$impuesto->setcuenta_ventas($this->impuestoDataAccess->getcuenta_ventas($this->connexion,$impuesto));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($impuesto->getcuenta_ventas(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$impuesto->setcuenta_compras($this->impuestoDataAccess->getcuenta_compras($this->connexion,$impuesto));
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepLoad($impuesto->getcuenta_compras(),$isDeep,$deepLoadType,$clases);
				
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
			$impuesto->setlista_producto_comprass($this->impuestoDataAccess->getlista_producto_comprass($this->connexion,$impuesto));

			foreach($impuesto->getlista_producto_comprass() as $listaproducto) {
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
			$impuesto->setproductos($this->impuestoDataAccess->getproductos($this->connexion,$impuesto));

			foreach($impuesto->getproductos() as $producto) {
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
			$impuesto->setclientes($this->impuestoDataAccess->getclientes($this->connexion,$impuesto));

			foreach($impuesto->getclientes() as $cliente) {
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
			$impuesto->setproveedors($this->impuestoDataAccess->getproveedors($this->connexion,$impuesto));

			foreach($impuesto->getproveedors() as $proveedor) {
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
	
	public function deepSave(impuesto $impuesto,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//impuesto_logic_add::updateimpuestoToSave($this->impuesto);			
			
			if(!$paraDeleteCascade) {				
				impuesto_data::save($impuesto, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($impuesto->getempresa(),$this->connexion);
		cuenta_data::save($impuesto->getcuenta_ventas(),$this->connexion);
		cuenta_data::save($impuesto->getcuenta_compras(),$this->connexion);

		foreach($impuesto->getlista_producto_comprass() as $listaproducto) {
			$listaproducto->setid_impuesto($impuesto->getId());
			lista_producto_data::save($listaproducto,$this->connexion);
		}


		foreach($impuesto->getproductos() as $producto) {
			$producto->setid_impuesto($impuesto->getId());
			producto_data::save($producto,$this->connexion);
		}


		foreach($impuesto->getclientes() as $cliente) {
			$cliente->setid_impuesto($impuesto->getId());
			cliente_data::save($cliente,$this->connexion);
		}


		foreach($impuesto->getproveedors() as $proveedor) {
			$proveedor->setid_impuesto($impuesto->getId());
			proveedor_data::save($proveedor,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($impuesto->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'_ventas') {
				cuenta_data::save($impuesto->getcuenta_ventas(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta::$class.'_compras') {
				cuenta_data::save($impuesto->getcuenta_compras(),$this->connexion);
				continue;
			}


			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($impuesto->getlista_producto_comprass() as $listaproducto) {
					$listaproducto->setid_impuesto($impuesto->getId());
					lista_producto_data::save($listaproducto,$this->connexion);
				}

				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($impuesto->getproductos() as $producto) {
					$producto->setid_impuesto($impuesto->getId());
					producto_data::save($producto,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($impuesto->getclientes() as $cliente) {
					$cliente->setid_impuesto($impuesto->getId());
					cliente_data::save($cliente,$this->connexion);
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($impuesto->getproveedors() as $proveedor) {
					$proveedor->setid_impuesto($impuesto->getId());
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
			empresa_data::save($impuesto->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($impuesto->getcuenta_ventas(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($impuesto->getcuenta_compras(),$this->connexion);
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

			foreach($impuesto->getlista_producto_comprass() as $listaproducto) {
				$listaproducto->setid_impuesto($impuesto->getId());
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

			foreach($impuesto->getproductos() as $producto) {
				$producto->setid_impuesto($impuesto->getId());
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

			foreach($impuesto->getclientes() as $cliente) {
				$cliente->setid_impuesto($impuesto->getId());
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

			foreach($impuesto->getproveedors() as $proveedor) {
				$proveedor->setid_impuesto($impuesto->getId());
				proveedor_data::save($proveedor,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($impuesto->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($impuesto->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($impuesto->getcuenta_ventas(),$this->connexion);
		$cuenta_ventasLogic= new cuenta_logic($this->connexion);
		$cuenta_ventasLogic->deepSave($impuesto->getcuenta_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_data::save($impuesto->getcuenta_compras(),$this->connexion);
		$cuenta_comprasLogic= new cuenta_logic($this->connexion);
		$cuenta_comprasLogic->deepSave($impuesto->getcuenta_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($impuesto->getlista_producto_comprass() as $listaproducto) {
			$listaproductoLogic= new lista_producto_logic($this->connexion);
			$listaproducto->setid_impuesto($impuesto->getId());
			lista_producto_data::save($listaproducto,$this->connexion);
			$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($impuesto->getproductos() as $producto) {
			$productoLogic= new producto_logic($this->connexion);
			$producto->setid_impuesto($impuesto->getId());
			producto_data::save($producto,$this->connexion);
			$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($impuesto->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$cliente->setid_impuesto($impuesto->getId());
			cliente_data::save($cliente,$this->connexion);
			$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($impuesto->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedor->setid_impuesto($impuesto->getId());
			proveedor_data::save($proveedor,$this->connexion);
			$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($impuesto->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($impuesto->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_ventas') {
				cuenta_data::save($impuesto->getcuenta_ventas(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($impuesto->getcuenta_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta::$class.'_compras') {
				cuenta_data::save($impuesto->getcuenta_compras(),$this->connexion);
				$cuentaLogic= new cuenta_logic($this->connexion);
				$cuentaLogic->deepSave($impuesto->getcuenta_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($impuesto->getlista_producto_comprass() as $listaproducto) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproducto->setid_impuesto($impuesto->getId());
					lista_producto_data::save($listaproducto,$this->connexion);
					$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($impuesto->getproductos() as $producto) {
					$productoLogic= new producto_logic($this->connexion);
					$producto->setid_impuesto($impuesto->getId());
					producto_data::save($producto,$this->connexion);
					$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($impuesto->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$cliente->setid_impuesto($impuesto->getId());
					cliente_data::save($cliente,$this->connexion);
					$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($impuesto->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedor->setid_impuesto($impuesto->getId());
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
			empresa_data::save($impuesto->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($impuesto->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_ventas') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($impuesto->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($impuesto->getcuenta_ventas(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta::$class.'_compras') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_data::save($impuesto->getcuenta(),$this->connexion);
			$cuentaLogic= new cuenta_logic($this->connexion);
			$cuentaLogic->deepSave($impuesto->getcuenta_compras(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
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

			foreach($impuesto->getlista_producto_comprass() as $listaproducto) {
				$listaproductoLogic= new lista_producto_logic($this->connexion);
				$listaproducto->setid_impuesto($impuesto->getId());
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

			foreach($impuesto->getproductos() as $producto) {
				$productoLogic= new producto_logic($this->connexion);
				$producto->setid_impuesto($impuesto->getId());
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

			foreach($impuesto->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$cliente->setid_impuesto($impuesto->getId());
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

			foreach($impuesto->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedor->setid_impuesto($impuesto->getId());
				proveedor_data::save($proveedor,$this->connexion);
				$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				impuesto_data::save($impuesto, $this->connexion);
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
			
			$this->deepLoad($this->impuesto,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->impuestos as $impuesto) {
				$this->deepLoad($impuesto,$isDeep,$deepLoadType,$clases);
								
				impuesto_util::refrescarFKDescripciones($this->impuestos);
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
			
			foreach($this->impuestos as $impuesto) {
				$this->deepLoad($impuesto,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->impuesto,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->impuestos as $impuesto) {
				$this->deepSave($impuesto,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->impuestos as $impuesto) {
				$this->deepSave($impuesto,$isDeep,$deepLoadType,$clases,false);
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
	
	
	
	
	
	
	
	public function getimpuesto() : ?impuesto {	
		/*
		impuesto_logic_add::checkimpuestoToGet($this->impuesto,$this->datosCliente);
		impuesto_logic_add::updateimpuestoToGet($this->impuesto);
		*/
			
		return $this->impuesto;
	}
		
	public function setimpuesto(impuesto $newimpuesto) {
		$this->impuesto = $newimpuesto;
	}
	
	public function getimpuestos() : array {		
		/*
		impuesto_logic_add::checkimpuestoToGets($this->impuestos,$this->datosCliente);
		
		foreach ($this->impuestos as $impuestoLocal ) {
			impuesto_logic_add::updateimpuestoToGet($impuestoLocal);
		}
		*/
		
		return $this->impuestos;
	}
	
	public function setimpuestos(array $newimpuestos) {
		$this->impuestos = $newimpuestos;
	}
	
	public function getimpuestoDataAccess() : impuesto_data {
		return $this->impuestoDataAccess;
	}
	
	public function setimpuestoDataAccess(impuesto_data $newimpuestoDataAccess) {
		$this->impuestoDataAccess = $newimpuestoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        impuesto_carga::$CONTROLLER;;        
		
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
