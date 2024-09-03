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

namespace com\bydan\contabilidad\inventario\costo_producto\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\costo_producto\util\costo_producto_carga;
use com\bydan\contabilidad\inventario\costo_producto\util\costo_producto_param_return;

use com\bydan\contabilidad\inventario\costo_producto\presentation\session\costo_producto_session;

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

use com\bydan\contabilidad\inventario\costo_producto\util\costo_producto_util;
use com\bydan\contabilidad\inventario\costo_producto\business\entity\costo_producto;
use com\bydan\contabilidad\inventario\costo_producto\business\data\costo_producto_data;

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

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\general\tabla\business\entity\tabla;
use com\bydan\contabilidad\general\tabla\business\data\tabla_data;
use com\bydan\contabilidad\general\tabla\business\logic\tabla_logic;
use com\bydan\contabilidad\general\tabla\util\tabla_util;

//REL


//REL DETALLES




class costo_producto_logic  extends GeneralEntityLogic implements costo_producto_logicI {	
	/*GENERAL*/
	public costo_producto_data $costo_productoDataAccess;
	//public ?costo_producto_logic_add $costo_productoLogicAdditional=null;
	public ?costo_producto $costo_producto;
	public array $costo_productos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->costo_productoDataAccess = new costo_producto_data();			
			$this->costo_productos = array();
			$this->costo_producto = new costo_producto();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->costo_productoLogicAdditional = new costo_producto_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->costo_productoLogicAdditional==null) {
		//	$this->costo_productoLogicAdditional=new costo_producto_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->costo_productoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->costo_productoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->costo_productoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->costo_productoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->costo_productos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->costo_productos=$this->costo_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->costo_productos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->costo_productos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->costo_productos=$this->costo_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->costo_productos);
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
		$this->costo_producto = new costo_producto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->costo_producto=$this->costo_productoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->costo_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				costo_producto_util::refrescarFKDescripcion($this->costo_producto);
			}
						
			//costo_producto_logic_add::checkcosto_productoToGet($this->costo_producto,$this->datosCliente);
			//costo_producto_logic_add::updatecosto_productoToGet($this->costo_producto);
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
		$this->costo_producto = new  costo_producto();
		  		  
        try {		
			$this->costo_producto=$this->costo_productoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->costo_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				costo_producto_util::refrescarFKDescripcion($this->costo_producto);
			}
			
			//costo_producto_logic_add::checkcosto_productoToGet($this->costo_producto,$this->datosCliente);
			//costo_producto_logic_add::updatecosto_productoToGet($this->costo_producto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?costo_producto {
		$costo_productoLogic = new  costo_producto_logic();
		  		  
        try {		
			$costo_productoLogic->setConnexion($connexion);			
			$costo_productoLogic->getEntity($id);			
			return $costo_productoLogic->getcosto_producto();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->costo_producto = new  costo_producto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->costo_producto=$this->costo_productoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->costo_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				costo_producto_util::refrescarFKDescripcion($this->costo_producto);
			}
			
			//costo_producto_logic_add::checkcosto_productoToGet($this->costo_producto,$this->datosCliente);
			//costo_producto_logic_add::updatecosto_productoToGet($this->costo_producto);
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
		$this->costo_producto = new  costo_producto();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->costo_producto=$this->costo_productoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->costo_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				costo_producto_util::refrescarFKDescripcion($this->costo_producto);
			}
			
			//costo_producto_logic_add::checkcosto_productoToGet($this->costo_producto,$this->datosCliente);
			//costo_producto_logic_add::updatecosto_productoToGet($this->costo_producto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?costo_producto {
		$costo_productoLogic = new  costo_producto_logic();
		  		  
        try {		
			$costo_productoLogic->setConnexion($connexion);			
			$costo_productoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $costo_productoLogic->getcosto_producto();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->costo_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->costo_productos=$this->costo_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->costo_productos);			
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
		$this->costo_productos = array();
		  		  
        try {			
			$this->costo_productos=$this->costo_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->costo_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->costo_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->costo_productos=$this->costo_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->costo_productos);
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
		$this->costo_productos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->costo_productos=$this->costo_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->costo_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$costo_productoLogic = new  costo_producto_logic();
		  		  
        try {		
			$costo_productoLogic->setConnexion($connexion);			
			$costo_productoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $costo_productoLogic->getcosto_productos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->costo_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->costo_productos=$this->costo_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->costo_productos);
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
		$this->costo_productos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->costo_productos=$this->costo_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->costo_productos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->costo_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->costo_productos=$this->costo_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->costo_productos);
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
		$this->costo_productos = array();
		  		  
        try {			
			$this->costo_productos=$this->costo_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}	
			
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->costo_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->costo_productos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->costo_productos=$this->costo_productoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->costo_productos);
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
		$this->costo_productos = array();
		  		  
        try {		
			$this->costo_productos=$this->costo_productoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->costo_productos);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,costo_producto_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->costo_productos=$this->costo_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->costo_productos);

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
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,costo_producto_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->costo_productos=$this->costo_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->costo_productos);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,costo_producto_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->costo_productos=$this->costo_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->costo_productos);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,costo_producto_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->costo_productos=$this->costo_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->costo_productos);
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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,costo_producto_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->costo_productos=$this->costo_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->costo_productos);

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
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,costo_producto_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->costo_productos=$this->costo_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->costo_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdproductoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_producto) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_producto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,costo_producto_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->costo_productos=$this->costo_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->costo_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idproducto(string $strFinalQuery,Pagination $pagination,int $id_producto) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_producto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,costo_producto_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->costo_productos=$this->costo_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->costo_productos);
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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,costo_producto_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->costo_productos=$this->costo_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->costo_productos);

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
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,costo_producto_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->costo_productos=$this->costo_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->costo_productos);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdtablaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_tabla) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tabla= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tabla->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tabla,costo_producto_util::$ID_TABLA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tabla);

			$this->costo_productos=$this->costo_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->costo_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idtabla(string $strFinalQuery,Pagination $pagination,int $id_tabla) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_tabla= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_tabla->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_tabla,costo_producto_util::$ID_TABLA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_tabla);

			$this->costo_productos=$this->costo_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->costo_productos);
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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,costo_producto_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->costo_productos=$this->costo_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->costo_productos);

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
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,costo_producto_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->costo_productos=$this->costo_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			//costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->costo_productos);
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
						
			//costo_producto_logic_add::checkcosto_productoToSave($this->costo_producto,$this->datosCliente,$this->connexion);	       
			//costo_producto_logic_add::updatecosto_productoToSave($this->costo_producto);			
			costo_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->costo_producto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->costo_productoLogicAdditional->checkGeneralEntityToSave($this,$this->costo_producto,$this->datosCliente,$this->connexion);
			
			
			costo_producto_data::save($this->costo_producto, $this->connexion);	    	       	 				
			//costo_producto_logic_add::checkcosto_productoToSaveAfter($this->costo_producto,$this->datosCliente,$this->connexion);			
			//$this->costo_productoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->costo_producto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->costo_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->costo_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				costo_producto_util::refrescarFKDescripcion($this->costo_producto);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->costo_producto->getIsDeleted()) {
				$this->costo_producto=null;
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
						
			/*costo_producto_logic_add::checkcosto_productoToSave($this->costo_producto,$this->datosCliente,$this->connexion);*/	        
			//costo_producto_logic_add::updatecosto_productoToSave($this->costo_producto);			
			//$this->costo_productoLogicAdditional->checkGeneralEntityToSave($this,$this->costo_producto,$this->datosCliente,$this->connexion);			
			costo_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->costo_producto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			costo_producto_data::save($this->costo_producto, $this->connexion);	    	       	 						
			/*costo_producto_logic_add::checkcosto_productoToSaveAfter($this->costo_producto,$this->datosCliente,$this->connexion);*/			
			//$this->costo_productoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->costo_producto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->costo_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->costo_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				costo_producto_util::refrescarFKDescripcion($this->costo_producto);				
			}
			
			if($this->costo_producto->getIsDeleted()) {
				$this->costo_producto=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(costo_producto $costo_producto,Connexion $connexion)  {
		$costo_productoLogic = new  costo_producto_logic();		  		  
        try {		
			$costo_productoLogic->setConnexion($connexion);			
			$costo_productoLogic->setcosto_producto($costo_producto);			
			$costo_productoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*costo_producto_logic_add::checkcosto_productoToSaves($this->costo_productos,$this->datosCliente,$this->connexion);*/	        	
			//$this->costo_productoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->costo_productos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->costo_productos as $costo_productoLocal) {				
								
				//costo_producto_logic_add::updatecosto_productoToSave($costo_productoLocal);	        	
				costo_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$costo_productoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				costo_producto_data::save($costo_productoLocal, $this->connexion);				
			}
			
			/*costo_producto_logic_add::checkcosto_productoToSavesAfter($this->costo_productos,$this->datosCliente,$this->connexion);*/			
			//$this->costo_productoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->costo_productos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
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
			/*costo_producto_logic_add::checkcosto_productoToSaves($this->costo_productos,$this->datosCliente,$this->connexion);*/			
			//$this->costo_productoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->costo_productos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->costo_productos as $costo_productoLocal) {				
								
				//costo_producto_logic_add::updatecosto_productoToSave($costo_productoLocal);	        	
				costo_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$costo_productoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				costo_producto_data::save($costo_productoLocal, $this->connexion);				
			}			
			
			/*costo_producto_logic_add::checkcosto_productoToSavesAfter($this->costo_productos,$this->datosCliente,$this->connexion);*/			
			//$this->costo_productoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->costo_productos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $costo_productos,Connexion $connexion)  {
		$costo_productoLogic = new  costo_producto_logic();
		  		  
        try {		
			$costo_productoLogic->setConnexion($connexion);			
			$costo_productoLogic->setcosto_productos($costo_productos);			
			$costo_productoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$costo_productosAux=array();
		
		foreach($this->costo_productos as $costo_producto) {
			if($costo_producto->getIsDeleted()==false) {
				$costo_productosAux[]=$costo_producto;
			}
		}
		
		$this->costo_productos=$costo_productosAux;
	}
	
	public function updateToGetsAuxiliar(array &$costo_productos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->costo_productos as $costo_producto) {
				
				$costo_producto->setid_empresa_Descripcion(costo_producto_util::getempresaDescripcion($costo_producto->getempresa()));
				$costo_producto->setid_sucursal_Descripcion(costo_producto_util::getsucursalDescripcion($costo_producto->getsucursal()));
				$costo_producto->setid_ejercicio_Descripcion(costo_producto_util::getejercicioDescripcion($costo_producto->getejercicio()));
				$costo_producto->setid_periodo_Descripcion(costo_producto_util::getperiodoDescripcion($costo_producto->getperiodo()));
				$costo_producto->setid_usuario_Descripcion(costo_producto_util::getusuarioDescripcion($costo_producto->getusuario()));
				$costo_producto->setid_producto_Descripcion(costo_producto_util::getproductoDescripcion($costo_producto->getproducto()));
				$costo_producto->setid_tabla_Descripcion(costo_producto_util::gettablaDescripcion($costo_producto->gettabla()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$costo_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$costo_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$costo_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$costo_productoForeignKey=new costo_producto_param_return();//costo_productoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$costo_productoForeignKey,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$costo_productoForeignKey,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$costo_productoForeignKey,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$costo_productoForeignKey,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$costo_productoForeignKey,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombosproductosFK($this->connexion,$strRecargarFkQuery,$costo_productoForeignKey,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tabla',$strRecargarFkTipos,',')) {
				$this->cargarCombostablasFK($this->connexion,$strRecargarFkQuery,$costo_productoForeignKey,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$costo_productoForeignKey,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$costo_productoForeignKey,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$costo_productoForeignKey,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$costo_productoForeignKey,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$costo_productoForeignKey,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproductosFK($this->connexion,' where id=-1 ',$costo_productoForeignKey,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_tabla',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombostablasFK($this->connexion,' where id=-1 ',$costo_productoForeignKey,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $costo_productoForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$costo_productoForeignKey,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$costo_productoForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($costo_producto_session==null) {
			$costo_producto_session=new costo_producto_session();
		}
		
		if($costo_producto_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($costo_productoForeignKey->idempresaDefaultFK==0) {
					$costo_productoForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$costo_productoForeignKey->empresasFK[$empresaLocal->getId()]=costo_producto_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($costo_producto_session->bigidempresaActual!=null && $costo_producto_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($costo_producto_session->bigidempresaActual);//WithConnection

				$costo_productoForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=costo_producto_util::getempresaDescripcion($empresaLogic->getempresa());
				$costo_productoForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$costo_productoForeignKey,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$costo_productoForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($costo_producto_session==null) {
			$costo_producto_session=new costo_producto_session();
		}
		
		if($costo_producto_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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
				if($costo_productoForeignKey->idsucursalDefaultFK==0) {
					$costo_productoForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$costo_productoForeignKey->sucursalsFK[$sucursalLocal->getId()]=costo_producto_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($costo_producto_session->bigidsucursalActual!=null && $costo_producto_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($costo_producto_session->bigidsucursalActual);//WithConnection

				$costo_productoForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=costo_producto_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$costo_productoForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$costo_productoForeignKey,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$costo_productoForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($costo_producto_session==null) {
			$costo_producto_session=new costo_producto_session();
		}
		
		if($costo_producto_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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
				if($costo_productoForeignKey->idejercicioDefaultFK==0) {
					$costo_productoForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$costo_productoForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=costo_producto_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($costo_producto_session->bigidejercicioActual!=null && $costo_producto_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($costo_producto_session->bigidejercicioActual);//WithConnection

				$costo_productoForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=costo_producto_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$costo_productoForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$costo_productoForeignKey,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$costo_productoForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($costo_producto_session==null) {
			$costo_producto_session=new costo_producto_session();
		}
		
		if($costo_producto_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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
				if($costo_productoForeignKey->idperiodoDefaultFK==0) {
					$costo_productoForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$costo_productoForeignKey->periodosFK[$periodoLocal->getId()]=costo_producto_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($costo_producto_session->bigidperiodoActual!=null && $costo_producto_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($costo_producto_session->bigidperiodoActual);//WithConnection

				$costo_productoForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=costo_producto_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$costo_productoForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$costo_productoForeignKey,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$costo_productoForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($costo_producto_session==null) {
			$costo_producto_session=new costo_producto_session();
		}
		
		if($costo_producto_session->bitBusquedaDesdeFKSesionusuario!=true) {
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
				if($costo_productoForeignKey->idusuarioDefaultFK==0) {
					$costo_productoForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$costo_productoForeignKey->usuariosFK[$usuarioLocal->getId()]=costo_producto_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($costo_producto_session->bigidusuarioActual!=null && $costo_producto_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($costo_producto_session->bigidusuarioActual);//WithConnection

				$costo_productoForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=costo_producto_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$costo_productoForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosproductosFK($connexion=null,$strRecargarFkQuery='',$costo_productoForeignKey,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$costo_productoForeignKey->productosFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($costo_producto_session==null) {
			$costo_producto_session=new costo_producto_session();
		}
		
		if($costo_producto_session->bitBusquedaDesdeFKSesionproducto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=producto_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalproducto=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalproducto=Funciones::GetFinalQueryAppend($finalQueryGlobalproducto, '');
				$finalQueryGlobalproducto.=producto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalproducto.$strRecargarFkQuery;		

				$productoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($productoLogic->getproductos() as $productoLocal ) {
				if($costo_productoForeignKey->idproductoDefaultFK==0) {
					$costo_productoForeignKey->idproductoDefaultFK=$productoLocal->getId();
				}

				$costo_productoForeignKey->productosFK[$productoLocal->getId()]=costo_producto_util::getproductoDescripcion($productoLocal);
			}

		} else {

			if($costo_producto_session->bigidproductoActual!=null && $costo_producto_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($costo_producto_session->bigidproductoActual);//WithConnection

				$costo_productoForeignKey->productosFK[$productoLogic->getproducto()->getId()]=costo_producto_util::getproductoDescripcion($productoLogic->getproducto());
				$costo_productoForeignKey->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	public function cargarCombostablasFK($connexion=null,$strRecargarFkQuery='',$costo_productoForeignKey,$costo_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$tablaLogic= new tabla_logic();
		$pagination= new Pagination();
		$costo_productoForeignKey->tablasFK=array();

		$tablaLogic->setConnexion($connexion);
		$tablaLogic->gettablaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($costo_producto_session==null) {
			$costo_producto_session=new costo_producto_session();
		}
		
		if($costo_producto_session->bitBusquedaDesdeFKSesiontabla!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=tabla_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobaltabla=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltabla=Funciones::GetFinalQueryAppend($finalQueryGlobaltabla, '');
				$finalQueryGlobaltabla.=tabla_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltabla.$strRecargarFkQuery;		

				$tablaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($tablaLogic->gettablas() as $tablaLocal ) {
				if($costo_productoForeignKey->idtablaDefaultFK==0) {
					$costo_productoForeignKey->idtablaDefaultFK=$tablaLocal->getId();
				}

				$costo_productoForeignKey->tablasFK[$tablaLocal->getId()]=costo_producto_util::gettablaDescripcion($tablaLocal);
			}

		} else {

			if($costo_producto_session->bigidtablaActual!=null && $costo_producto_session->bigidtablaActual > 0) {
				$tablaLogic->getEntity($costo_producto_session->bigidtablaActual);//WithConnection

				$costo_productoForeignKey->tablasFK[$tablaLogic->gettabla()->getId()]=costo_producto_util::gettablaDescripcion($tablaLogic->gettabla());
				$costo_productoForeignKey->idtablaDefaultFK=$tablaLogic->gettabla()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($costo_producto) {
		$this->saveRelacionesBase($costo_producto,true);
	}

	public function saveRelaciones($costo_producto) {
		$this->saveRelacionesBase($costo_producto,false);
	}

	public function saveRelacionesBase($costo_producto,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setcosto_producto($costo_producto);

			if(true) {

				//costo_producto_logic_add::updateRelacionesToSave($costo_producto,$this);

				if(($this->costo_producto->getIsNew() || $this->costo_producto->getIsChanged()) && !$this->costo_producto->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->costo_producto->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//costo_producto_logic_add::updateRelacionesToSaveAfter($costo_producto,$this);

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
	
	
	public function saveRelacionesDetalles() {
		try {
	

		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
	
	/*PROCESAR ACCIONES*/
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $costo_productos,costo_producto_param_return $costo_productoParameterGeneral) : costo_producto_param_return {
		$costo_productoReturnGeneral=new costo_producto_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $costo_productoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $costo_productos,costo_producto_param_return $costo_productoParameterGeneral) : costo_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$costo_productoReturnGeneral=new costo_producto_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $costo_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $costo_productos,costo_producto $costo_producto,costo_producto_param_return $costo_productoParameterGeneral,bool $isEsNuevocosto_producto,array $clases) : costo_producto_param_return {
		 try {	
			$costo_productoReturnGeneral=new costo_producto_param_return();
	
			$costo_productoReturnGeneral->setcosto_producto($costo_producto);
			$costo_productoReturnGeneral->setcosto_productos($costo_productos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$costo_productoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $costo_productoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $costo_productos,costo_producto $costo_producto,costo_producto_param_return $costo_productoParameterGeneral,bool $isEsNuevocosto_producto,array $clases) : costo_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$costo_productoReturnGeneral=new costo_producto_param_return();
	
			$costo_productoReturnGeneral->setcosto_producto($costo_producto);
			$costo_productoReturnGeneral->setcosto_productos($costo_productos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$costo_productoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $costo_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $costo_productos,costo_producto $costo_producto,costo_producto_param_return $costo_productoParameterGeneral,bool $isEsNuevocosto_producto,array $clases) : costo_producto_param_return {
		 try {	
			$costo_productoReturnGeneral=new costo_producto_param_return();
	
			$costo_productoReturnGeneral->setcosto_producto($costo_producto);
			$costo_productoReturnGeneral->setcosto_productos($costo_productos);
			
			
			
			return $costo_productoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $costo_productos,costo_producto $costo_producto,costo_producto_param_return $costo_productoParameterGeneral,bool $isEsNuevocosto_producto,array $clases) : costo_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$costo_productoReturnGeneral=new costo_producto_param_return();
	
			$costo_productoReturnGeneral->setcosto_producto($costo_producto);
			$costo_productoReturnGeneral->setcosto_productos($costo_productos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $costo_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,costo_producto $costo_producto,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,costo_producto $costo_producto,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		costo_producto_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(costo_producto $costo_producto,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//costo_producto_logic_add::updatecosto_productoToGet($this->costo_producto);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$costo_producto->setempresa($this->costo_productoDataAccess->getempresa($this->connexion,$costo_producto));
		$costo_producto->setsucursal($this->costo_productoDataAccess->getsucursal($this->connexion,$costo_producto));
		$costo_producto->setejercicio($this->costo_productoDataAccess->getejercicio($this->connexion,$costo_producto));
		$costo_producto->setperiodo($this->costo_productoDataAccess->getperiodo($this->connexion,$costo_producto));
		$costo_producto->setusuario($this->costo_productoDataAccess->getusuario($this->connexion,$costo_producto));
		$costo_producto->setproducto($this->costo_productoDataAccess->getproducto($this->connexion,$costo_producto));
		$costo_producto->settabla($this->costo_productoDataAccess->gettabla($this->connexion,$costo_producto));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$costo_producto->setempresa($this->costo_productoDataAccess->getempresa($this->connexion,$costo_producto));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$costo_producto->setsucursal($this->costo_productoDataAccess->getsucursal($this->connexion,$costo_producto));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$costo_producto->setejercicio($this->costo_productoDataAccess->getejercicio($this->connexion,$costo_producto));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$costo_producto->setperiodo($this->costo_productoDataAccess->getperiodo($this->connexion,$costo_producto));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$costo_producto->setusuario($this->costo_productoDataAccess->getusuario($this->connexion,$costo_producto));
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$costo_producto->setproducto($this->costo_productoDataAccess->getproducto($this->connexion,$costo_producto));
				continue;
			}

			if($clas->clas==tabla::$class.'') {
				$costo_producto->settabla($this->costo_productoDataAccess->gettabla($this->connexion,$costo_producto));
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
			$costo_producto->setempresa($this->costo_productoDataAccess->getempresa($this->connexion,$costo_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$costo_producto->setsucursal($this->costo_productoDataAccess->getsucursal($this->connexion,$costo_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$costo_producto->setejercicio($this->costo_productoDataAccess->getejercicio($this->connexion,$costo_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$costo_producto->setperiodo($this->costo_productoDataAccess->getperiodo($this->connexion,$costo_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$costo_producto->setusuario($this->costo_productoDataAccess->getusuario($this->connexion,$costo_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$costo_producto->setproducto($this->costo_productoDataAccess->getproducto($this->connexion,$costo_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==tabla::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$costo_producto->settabla($this->costo_productoDataAccess->gettabla($this->connexion,$costo_producto));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$costo_producto->setempresa($this->costo_productoDataAccess->getempresa($this->connexion,$costo_producto));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($costo_producto->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$costo_producto->setsucursal($this->costo_productoDataAccess->getsucursal($this->connexion,$costo_producto));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($costo_producto->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$costo_producto->setejercicio($this->costo_productoDataAccess->getejercicio($this->connexion,$costo_producto));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($costo_producto->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$costo_producto->setperiodo($this->costo_productoDataAccess->getperiodo($this->connexion,$costo_producto));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($costo_producto->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$costo_producto->setusuario($this->costo_productoDataAccess->getusuario($this->connexion,$costo_producto));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($costo_producto->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$costo_producto->setproducto($this->costo_productoDataAccess->getproducto($this->connexion,$costo_producto));
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepLoad($costo_producto->getproducto(),$isDeep,$deepLoadType,$clases);
				
		$costo_producto->settabla($this->costo_productoDataAccess->gettabla($this->connexion,$costo_producto));
		$tablaLogic= new tabla_logic($this->connexion);
		$tablaLogic->deepLoad($costo_producto->gettabla(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$costo_producto->setempresa($this->costo_productoDataAccess->getempresa($this->connexion,$costo_producto));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($costo_producto->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$costo_producto->setsucursal($this->costo_productoDataAccess->getsucursal($this->connexion,$costo_producto));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($costo_producto->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$costo_producto->setejercicio($this->costo_productoDataAccess->getejercicio($this->connexion,$costo_producto));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($costo_producto->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$costo_producto->setperiodo($this->costo_productoDataAccess->getperiodo($this->connexion,$costo_producto));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($costo_producto->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$costo_producto->setusuario($this->costo_productoDataAccess->getusuario($this->connexion,$costo_producto));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($costo_producto->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$costo_producto->setproducto($this->costo_productoDataAccess->getproducto($this->connexion,$costo_producto));
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($costo_producto->getproducto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==tabla::$class.'') {
				$costo_producto->settabla($this->costo_productoDataAccess->gettabla($this->connexion,$costo_producto));
				$tablaLogic= new tabla_logic($this->connexion);
				$tablaLogic->deepLoad($costo_producto->gettabla(),$isDeep,$deepLoadType,$clases);				
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
			$costo_producto->setempresa($this->costo_productoDataAccess->getempresa($this->connexion,$costo_producto));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($costo_producto->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$costo_producto->setsucursal($this->costo_productoDataAccess->getsucursal($this->connexion,$costo_producto));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($costo_producto->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$costo_producto->setejercicio($this->costo_productoDataAccess->getejercicio($this->connexion,$costo_producto));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($costo_producto->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$costo_producto->setperiodo($this->costo_productoDataAccess->getperiodo($this->connexion,$costo_producto));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($costo_producto->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$costo_producto->setusuario($this->costo_productoDataAccess->getusuario($this->connexion,$costo_producto));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($costo_producto->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$costo_producto->setproducto($this->costo_productoDataAccess->getproducto($this->connexion,$costo_producto));
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($costo_producto->getproducto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tabla::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$costo_producto->settabla($this->costo_productoDataAccess->gettabla($this->connexion,$costo_producto));
			$tablaLogic= new tabla_logic($this->connexion);
			$tablaLogic->deepLoad($costo_producto->gettabla(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(costo_producto $costo_producto,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//costo_producto_logic_add::updatecosto_productoToSave($this->costo_producto);			
			
			if(!$paraDeleteCascade) {				
				costo_producto_data::save($costo_producto, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($costo_producto->getempresa(),$this->connexion);
		sucursal_data::save($costo_producto->getsucursal(),$this->connexion);
		ejercicio_data::save($costo_producto->getejercicio(),$this->connexion);
		periodo_data::save($costo_producto->getperiodo(),$this->connexion);
		usuario_data::save($costo_producto->getusuario(),$this->connexion);
		producto_data::save($costo_producto->getproducto(),$this->connexion);
		tabla_data::save($costo_producto->gettabla(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($costo_producto->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($costo_producto->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($costo_producto->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($costo_producto->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($costo_producto->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($costo_producto->getproducto(),$this->connexion);
				continue;
			}

			if($clas->clas==tabla::$class.'') {
				tabla_data::save($costo_producto->gettabla(),$this->connexion);
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
			empresa_data::save($costo_producto->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($costo_producto->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($costo_producto->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($costo_producto->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($costo_producto->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($costo_producto->getproducto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tabla::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tabla_data::save($costo_producto->gettabla(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($costo_producto->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($costo_producto->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($costo_producto->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($costo_producto->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($costo_producto->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($costo_producto->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($costo_producto->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($costo_producto->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($costo_producto->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($costo_producto->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		producto_data::save($costo_producto->getproducto(),$this->connexion);
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepSave($costo_producto->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		tabla_data::save($costo_producto->gettabla(),$this->connexion);
		$tablaLogic= new tabla_logic($this->connexion);
		$tablaLogic->deepSave($costo_producto->gettabla(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($costo_producto->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($costo_producto->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($costo_producto->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($costo_producto->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($costo_producto->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($costo_producto->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($costo_producto->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($costo_producto->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($costo_producto->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($costo_producto->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($costo_producto->getproducto(),$this->connexion);
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepSave($costo_producto->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==tabla::$class.'') {
				tabla_data::save($costo_producto->gettabla(),$this->connexion);
				$tablaLogic= new tabla_logic($this->connexion);
				$tablaLogic->deepSave($costo_producto->gettabla(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			empresa_data::save($costo_producto->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($costo_producto->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($costo_producto->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($costo_producto->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($costo_producto->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($costo_producto->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($costo_producto->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($costo_producto->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($costo_producto->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($costo_producto->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($costo_producto->getproducto(),$this->connexion);
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepSave($costo_producto->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==tabla::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			tabla_data::save($costo_producto->gettabla(),$this->connexion);
			$tablaLogic= new tabla_logic($this->connexion);
			$tablaLogic->deepSave($costo_producto->gettabla(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				costo_producto_data::save($costo_producto, $this->connexion);
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
			
			$this->deepLoad($this->costo_producto,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->costo_productos as $costo_producto) {
				$this->deepLoad($costo_producto,$isDeep,$deepLoadType,$clases);
								
				costo_producto_util::refrescarFKDescripciones($this->costo_productos);
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
			
			foreach($this->costo_productos as $costo_producto) {
				$this->deepLoad($costo_producto,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->costo_producto,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->costo_productos as $costo_producto) {
				$this->deepSave($costo_producto,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->costo_productos as $costo_producto) {
				$this->deepSave($costo_producto,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(tabla::$class);
				
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
					if($clas->clas==producto::$class) {
						$classes[]=new Classe(producto::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==tabla::$class) {
						$classes[]=new Classe(tabla::$class);
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
					if($clas->clas==producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(producto::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==tabla::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tabla::$class);
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
				
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getcosto_producto() : ?costo_producto {	
		/*
		costo_producto_logic_add::checkcosto_productoToGet($this->costo_producto,$this->datosCliente);
		costo_producto_logic_add::updatecosto_productoToGet($this->costo_producto);
		*/
			
		return $this->costo_producto;
	}
		
	public function setcosto_producto(costo_producto $newcosto_producto) {
		$this->costo_producto = $newcosto_producto;
	}
	
	public function getcosto_productos() : array {		
		/*
		costo_producto_logic_add::checkcosto_productoToGets($this->costo_productos,$this->datosCliente);
		
		foreach ($this->costo_productos as $costo_productoLocal ) {
			costo_producto_logic_add::updatecosto_productoToGet($costo_productoLocal);
		}
		*/
		
		return $this->costo_productos;
	}
	
	public function setcosto_productos(array $newcosto_productos) {
		$this->costo_productos = $newcosto_productos;
	}
	
	public function getcosto_productoDataAccess() : costo_producto_data {
		return $this->costo_productoDataAccess;
	}
	
	public function setcosto_productoDataAccess(costo_producto_data $newcosto_productoDataAccess) {
		$this->costo_productoDataAccess = $newcosto_productoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        costo_producto_carga::$CONTROLLER;;        
		
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
