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

namespace com\bydan\contabilidad\inventario\tipo_producto\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\tipo_producto\util\tipo_producto_carga;
use com\bydan\contabilidad\inventario\tipo_producto\util\tipo_producto_param_return;


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

use com\bydan\contabilidad\inventario\tipo_producto\util\tipo_producto_util;
use com\bydan\contabilidad\inventario\tipo_producto\business\entity\tipo_producto;
use com\bydan\contabilidad\inventario\tipo_producto\business\data\tipo_producto_data;

//FK


//REL


use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\lista_producto\business\entity\lista_producto;
use com\bydan\contabilidad\inventario\lista_producto\business\data\lista_producto_data;
use com\bydan\contabilidad\inventario\lista_producto\business\logic\lista_producto_logic;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;

//REL DETALLES




class tipo_producto_logic  extends GeneralEntityLogic implements tipo_producto_logicI {	
	/*GENERAL*/
	public tipo_producto_data $tipo_productoDataAccess;
	//public ?tipo_producto_logic_add $tipo_productoLogicAdditional=null;
	public ?tipo_producto $tipo_producto;
	public array $tipo_productos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->tipo_productoDataAccess = new tipo_producto_data();			
			$this->tipo_productos = array();
			$this->tipo_producto = new tipo_producto();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->tipo_productoLogicAdditional = new tipo_producto_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->tipo_productoLogicAdditional==null) {
		//	$this->tipo_productoLogicAdditional=new tipo_producto_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->tipo_productoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->tipo_productoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->tipo_productoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->tipo_productoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_productos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_productos=$this->tipo_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_producto_util::refrescarFKDescripciones($this->tipo_productos);
			}
			
			//tipo_producto_logic_add::checktipo_productoToGets($this->tipo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_productos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_productos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_productos=$this->tipo_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_producto_util::refrescarFKDescripciones($this->tipo_productos);
			}
			
			//tipo_producto_logic_add::checktipo_productoToGets($this->tipo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_productos);
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
		$this->tipo_producto = new tipo_producto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->tipo_producto=$this->tipo_productoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_producto_util::refrescarFKDescripcion($this->tipo_producto);
			}
						
			//tipo_producto_logic_add::checktipo_productoToGet($this->tipo_producto,$this->datosCliente);
			//tipo_producto_logic_add::updatetipo_productoToGet($this->tipo_producto);
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
		$this->tipo_producto = new  tipo_producto();
		  		  
        try {		
			$this->tipo_producto=$this->tipo_productoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_producto_util::refrescarFKDescripcion($this->tipo_producto);
			}
			
			//tipo_producto_logic_add::checktipo_productoToGet($this->tipo_producto,$this->datosCliente);
			//tipo_producto_logic_add::updatetipo_productoToGet($this->tipo_producto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?tipo_producto {
		$tipo_productoLogic = new  tipo_producto_logic();
		  		  
        try {		
			$tipo_productoLogic->setConnexion($connexion);			
			$tipo_productoLogic->getEntity($id);			
			return $tipo_productoLogic->gettipo_producto();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->tipo_producto = new  tipo_producto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->tipo_producto=$this->tipo_productoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_producto_util::refrescarFKDescripcion($this->tipo_producto);
			}
			
			//tipo_producto_logic_add::checktipo_productoToGet($this->tipo_producto,$this->datosCliente);
			//tipo_producto_logic_add::updatetipo_productoToGet($this->tipo_producto);
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
		$this->tipo_producto = new  tipo_producto();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_producto=$this->tipo_productoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_producto_util::refrescarFKDescripcion($this->tipo_producto);
			}
			
			//tipo_producto_logic_add::checktipo_productoToGet($this->tipo_producto,$this->datosCliente);
			//tipo_producto_logic_add::updatetipo_productoToGet($this->tipo_producto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?tipo_producto {
		$tipo_productoLogic = new  tipo_producto_logic();
		  		  
        try {		
			$tipo_productoLogic->setConnexion($connexion);			
			$tipo_productoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $tipo_productoLogic->gettipo_producto();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_productos=$this->tipo_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_producto_util::refrescarFKDescripciones($this->tipo_productos);
			}
			
			//tipo_producto_logic_add::checktipo_productoToGets($this->tipo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_productos);			
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
		$this->tipo_productos = array();
		  		  
        try {			
			$this->tipo_productos=$this->tipo_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_producto_util::refrescarFKDescripciones($this->tipo_productos);
			}
			
			//tipo_producto_logic_add::checktipo_productoToGets($this->tipo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->tipo_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_productos=$this->tipo_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_producto_util::refrescarFKDescripciones($this->tipo_productos);
			}
			
			//tipo_producto_logic_add::checktipo_productoToGets($this->tipo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_productos);
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
		$this->tipo_productos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_productos=$this->tipo_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_producto_util::refrescarFKDescripciones($this->tipo_productos);
			}
			
			//tipo_producto_logic_add::checktipo_productoToGets($this->tipo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$tipo_productoLogic = new  tipo_producto_logic();
		  		  
        try {		
			$tipo_productoLogic->setConnexion($connexion);			
			$tipo_productoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $tipo_productoLogic->gettipo_productos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->tipo_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_productos=$this->tipo_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_producto_util::refrescarFKDescripciones($this->tipo_productos);
			}
			
			//tipo_producto_logic_add::checktipo_productoToGets($this->tipo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_productos);
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
		$this->tipo_productos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_productos=$this->tipo_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_producto_util::refrescarFKDescripciones($this->tipo_productos);
			}
			
			//tipo_producto_logic_add::checktipo_productoToGets($this->tipo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_productos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->tipo_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_productos=$this->tipo_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_producto_util::refrescarFKDescripciones($this->tipo_productos);
			}
			
			//tipo_producto_logic_add::checktipo_productoToGets($this->tipo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_productos);
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
		$this->tipo_productos = array();
		  		  
        try {			
			$this->tipo_productos=$this->tipo_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_producto_util::refrescarFKDescripciones($this->tipo_productos);
			}	
			
			//tipo_producto_logic_add::checktipo_productoToGets($this->tipo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_productos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_productos=$this->tipo_productoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_producto_util::refrescarFKDescripciones($this->tipo_productos);
			}
			
			//tipo_producto_logic_add::checktipo_productoToGets($this->tipo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_productos);
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
		$this->tipo_productos = array();
		  		  
        try {		
			$this->tipo_productos=$this->tipo_productoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_producto_util::refrescarFKDescripciones($this->tipo_productos);
			}
			
			//tipo_producto_logic_add::checktipo_productoToGets($this->tipo_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_productos);

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
						
			//tipo_producto_logic_add::checktipo_productoToSave($this->tipo_producto,$this->datosCliente,$this->connexion);	       
			//tipo_producto_logic_add::updatetipo_productoToSave($this->tipo_producto);			
			tipo_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_producto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->tipo_productoLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_producto,$this->datosCliente,$this->connexion);
			
			
			tipo_producto_data::save($this->tipo_producto, $this->connexion);	    	       	 				
			//tipo_producto_logic_add::checktipo_productoToSaveAfter($this->tipo_producto,$this->datosCliente,$this->connexion);			
			//$this->tipo_productoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_producto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_producto_util::refrescarFKDescripcion($this->tipo_producto);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->tipo_producto->getIsDeleted()) {
				$this->tipo_producto=null;
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
						
			/*tipo_producto_logic_add::checktipo_productoToSave($this->tipo_producto,$this->datosCliente,$this->connexion);*/	        
			//tipo_producto_logic_add::updatetipo_productoToSave($this->tipo_producto);			
			//$this->tipo_productoLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_producto,$this->datosCliente,$this->connexion);			
			tipo_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_producto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			tipo_producto_data::save($this->tipo_producto, $this->connexion);	    	       	 						
			/*tipo_producto_logic_add::checktipo_productoToSaveAfter($this->tipo_producto,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_productoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_producto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_producto_util::refrescarFKDescripcion($this->tipo_producto);				
			}
			
			if($this->tipo_producto->getIsDeleted()) {
				$this->tipo_producto=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(tipo_producto $tipo_producto,Connexion $connexion)  {
		$tipo_productoLogic = new  tipo_producto_logic();		  		  
        try {		
			$tipo_productoLogic->setConnexion($connexion);			
			$tipo_productoLogic->settipo_producto($tipo_producto);			
			$tipo_productoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*tipo_producto_logic_add::checktipo_productoToSaves($this->tipo_productos,$this->datosCliente,$this->connexion);*/	        	
			//$this->tipo_productoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_productos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_productos as $tipo_productoLocal) {				
								
				//tipo_producto_logic_add::updatetipo_productoToSave($tipo_productoLocal);	        	
				tipo_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_productoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				tipo_producto_data::save($tipo_productoLocal, $this->connexion);				
			}
			
			/*tipo_producto_logic_add::checktipo_productoToSavesAfter($this->tipo_productos,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_productoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_productos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_producto_util::refrescarFKDescripciones($this->tipo_productos);
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
			/*tipo_producto_logic_add::checktipo_productoToSaves($this->tipo_productos,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_productoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_productos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_productos as $tipo_productoLocal) {				
								
				//tipo_producto_logic_add::updatetipo_productoToSave($tipo_productoLocal);	        	
				tipo_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_productoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				tipo_producto_data::save($tipo_productoLocal, $this->connexion);				
			}			
			
			/*tipo_producto_logic_add::checktipo_productoToSavesAfter($this->tipo_productos,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_productoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_productos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_producto_util::refrescarFKDescripciones($this->tipo_productos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $tipo_productos,Connexion $connexion)  {
		$tipo_productoLogic = new  tipo_producto_logic();
		  		  
        try {		
			$tipo_productoLogic->setConnexion($connexion);			
			$tipo_productoLogic->settipo_productos($tipo_productos);			
			$tipo_productoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$tipo_productosAux=array();
		
		foreach($this->tipo_productos as $tipo_producto) {
			if($tipo_producto->getIsDeleted()==false) {
				$tipo_productosAux[]=$tipo_producto;
			}
		}
		
		$this->tipo_productos=$tipo_productosAux;
	}
	
	public function updateToGetsAuxiliar(array &$tipo_productos) {
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
	
	
	
	public function saveRelacionesWithConnection($tipo_producto,$productos,$listaproductos) {
		$this->saveRelacionesBase($tipo_producto,$productos,$listaproductos,true);
	}

	public function saveRelaciones($tipo_producto,$productos,$listaproductos) {
		$this->saveRelacionesBase($tipo_producto,$productos,$listaproductos,false);
	}

	public function saveRelacionesBase($tipo_producto,$productos=array(),$listaproductos=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$tipo_producto->setproductos($productos);
			$tipo_producto->setlista_productos($listaproductos);
			$this->settipo_producto($tipo_producto);

				if(($this->tipo_producto->getIsNew() || $this->tipo_producto->getIsChanged()) && !$this->tipo_producto->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($productos,$listaproductos);

				} else if($this->tipo_producto->getIsDeleted()) {
					$this->saveRelacionesDetalles($productos,$listaproductos);
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
	
	
	public function saveRelacionesDetalles($productos=array(),$listaproductos=array()) {
		try {
	

			$idtipo_productoActual=$this->gettipo_producto()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/producto_carga.php');
			producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$productoLogic_Desde_tipo_producto=new producto_logic();
			$productoLogic_Desde_tipo_producto->setproductos($productos);

			$productoLogic_Desde_tipo_producto->setConnexion($this->getConnexion());
			$productoLogic_Desde_tipo_producto->setDatosCliente($this->datosCliente);

			foreach($productoLogic_Desde_tipo_producto->getproductos() as $producto_Desde_tipo_producto) {
				$producto_Desde_tipo_producto->setid_tipo_producto($idtipo_productoActual);

				$productoLogic_Desde_tipo_producto->setproducto($producto_Desde_tipo_producto);
				$productoLogic_Desde_tipo_producto->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/lista_producto_carga.php');
			lista_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$listaproductoLogic_Desde_tipo_producto=new lista_producto_logic();
			$listaproductoLogic_Desde_tipo_producto->setlista_productos($listaproductos);

			$listaproductoLogic_Desde_tipo_producto->setConnexion($this->getConnexion());
			$listaproductoLogic_Desde_tipo_producto->setDatosCliente($this->datosCliente);

			foreach($listaproductoLogic_Desde_tipo_producto->getlista_productos() as $listaproducto_Desde_tipo_producto) {
				$listaproducto_Desde_tipo_producto->setid_tipo_producto($idtipo_productoActual);
			}

			$listaproductoLogic_Desde_tipo_producto->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $tipo_productos,tipo_producto_param_return $tipo_productoParameterGeneral) : tipo_producto_param_return {
		$tipo_productoReturnGeneral=new tipo_producto_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $tipo_productoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $tipo_productos,tipo_producto_param_return $tipo_productoParameterGeneral) : tipo_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_productoReturnGeneral=new tipo_producto_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_productos,tipo_producto $tipo_producto,tipo_producto_param_return $tipo_productoParameterGeneral,bool $isEsNuevotipo_producto,array $clases) : tipo_producto_param_return {
		 try {	
			$tipo_productoReturnGeneral=new tipo_producto_param_return();
	
			$tipo_productoReturnGeneral->settipo_producto($tipo_producto);
			$tipo_productoReturnGeneral->settipo_productos($tipo_productos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_productoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $tipo_productoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_productos,tipo_producto $tipo_producto,tipo_producto_param_return $tipo_productoParameterGeneral,bool $isEsNuevotipo_producto,array $clases) : tipo_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_productoReturnGeneral=new tipo_producto_param_return();
	
			$tipo_productoReturnGeneral->settipo_producto($tipo_producto);
			$tipo_productoReturnGeneral->settipo_productos($tipo_productos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_productoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_productos,tipo_producto $tipo_producto,tipo_producto_param_return $tipo_productoParameterGeneral,bool $isEsNuevotipo_producto,array $clases) : tipo_producto_param_return {
		 try {	
			$tipo_productoReturnGeneral=new tipo_producto_param_return();
	
			$tipo_productoReturnGeneral->settipo_producto($tipo_producto);
			$tipo_productoReturnGeneral->settipo_productos($tipo_productos);
			
			
			
			return $tipo_productoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_productos,tipo_producto $tipo_producto,tipo_producto_param_return $tipo_productoParameterGeneral,bool $isEsNuevotipo_producto,array $clases) : tipo_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_productoReturnGeneral=new tipo_producto_param_return();
	
			$tipo_productoReturnGeneral->settipo_producto($tipo_producto);
			$tipo_productoReturnGeneral->settipo_productos($tipo_productos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,tipo_producto $tipo_producto,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,tipo_producto $tipo_producto,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		tipo_producto_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(tipo_producto $tipo_producto,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_producto_logic_add::updatetipo_productoToGet($this->tipo_producto);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$tipo_producto->setproductos($this->tipo_productoDataAccess->getproductos($this->connexion,$tipo_producto));
		$tipo_producto->setlista_productos($this->tipo_productoDataAccess->getlista_productos($this->connexion,$tipo_producto));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_producto->setproductos($this->tipo_productoDataAccess->getproductos($this->connexion,$tipo_producto));

				if($this->isConDeep) {
					$productoLogic= new producto_logic($this->connexion);
					$productoLogic->setproductos($tipo_producto->getproductos());
					$classesLocal=producto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$productoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					producto_util::refrescarFKDescripciones($productoLogic->getproductos());
					$tipo_producto->setproductos($productoLogic->getproductos());
				}

				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_producto->setlista_productos($this->tipo_productoDataAccess->getlista_productos($this->connexion,$tipo_producto));

				if($this->isConDeep) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproductoLogic->setlista_productos($tipo_producto->getlista_productos());
					$classesLocal=lista_producto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$listaproductoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					lista_producto_util::refrescarFKDescripciones($listaproductoLogic->getlista_productos());
					$tipo_producto->setlista_productos($listaproductoLogic->getlista_productos());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


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
			$tipo_producto->setproductos($this->tipo_productoDataAccess->getproductos($this->connexion,$tipo_producto));
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
			$tipo_producto->setlista_productos($this->tipo_productoDataAccess->getlista_productos($this->connexion,$tipo_producto));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$tipo_producto->setproductos($this->tipo_productoDataAccess->getproductos($this->connexion,$tipo_producto));

		foreach($tipo_producto->getproductos() as $producto) {
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
		}

		$tipo_producto->setlista_productos($this->tipo_productoDataAccess->getlista_productos($this->connexion,$tipo_producto));

		foreach($tipo_producto->getlista_productos() as $listaproducto) {
			$listaproductoLogic= new lista_producto_logic($this->connexion);
			$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_producto->setproductos($this->tipo_productoDataAccess->getproductos($this->connexion,$tipo_producto));

				foreach($tipo_producto->getproductos() as $producto) {
					$productoLogic= new producto_logic($this->connexion);
					$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_producto->setlista_productos($this->tipo_productoDataAccess->getlista_productos($this->connexion,$tipo_producto));

				foreach($tipo_producto->getlista_productos() as $listaproducto) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


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
			$tipo_producto->setproductos($this->tipo_productoDataAccess->getproductos($this->connexion,$tipo_producto));

			foreach($tipo_producto->getproductos() as $producto) {
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
			}
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
			$tipo_producto->setlista_productos($this->tipo_productoDataAccess->getlista_productos($this->connexion,$tipo_producto));

			foreach($tipo_producto->getlista_productos() as $listaproducto) {
				$listaproductoLogic= new lista_producto_logic($this->connexion);
				$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(tipo_producto $tipo_producto,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_producto_logic_add::updatetipo_productoToSave($this->tipo_producto);			
			
			if(!$paraDeleteCascade) {				
				tipo_producto_data::save($tipo_producto, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($tipo_producto->getproductos() as $producto) {
			$producto->setid_tipo_producto($tipo_producto->getId());
			producto_data::save($producto,$this->connexion);
		}


		foreach($tipo_producto->getlista_productos() as $listaproducto) {
			$listaproducto->setid_tipo_producto($tipo_producto->getId());
			lista_producto_data::save($listaproducto,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_producto->getproductos() as $producto) {
					$producto->setid_tipo_producto($tipo_producto->getId());
					producto_data::save($producto,$this->connexion);
				}

				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_producto->getlista_productos() as $listaproducto) {
					$listaproducto->setid_tipo_producto($tipo_producto->getId());
					lista_producto_data::save($listaproducto,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


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

			foreach($tipo_producto->getproductos() as $producto) {
				$producto->setid_tipo_producto($tipo_producto->getId());
				producto_data::save($producto,$this->connexion);
			}

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

			foreach($tipo_producto->getlista_productos() as $listaproducto) {
				$listaproducto->setid_tipo_producto($tipo_producto->getId());
				lista_producto_data::save($listaproducto,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($tipo_producto->getproductos() as $producto) {
			$productoLogic= new producto_logic($this->connexion);
			$producto->setid_tipo_producto($tipo_producto->getId());
			producto_data::save($producto,$this->connexion);
			$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($tipo_producto->getlista_productos() as $listaproducto) {
			$listaproductoLogic= new lista_producto_logic($this->connexion);
			$listaproducto->setid_tipo_producto($tipo_producto->getId());
			lista_producto_data::save($listaproducto,$this->connexion);
			$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_producto->getproductos() as $producto) {
					$productoLogic= new producto_logic($this->connexion);
					$producto->setid_tipo_producto($tipo_producto->getId());
					producto_data::save($producto,$this->connexion);
					$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_producto->getlista_productos() as $listaproducto) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproducto->setid_tipo_producto($tipo_producto->getId());
					lista_producto_data::save($listaproducto,$this->connexion);
					$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {



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

			foreach($tipo_producto->getproductos() as $producto) {
				$productoLogic= new producto_logic($this->connexion);
				$producto->setid_tipo_producto($tipo_producto->getId());
				producto_data::save($producto,$this->connexion);
				$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
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

			foreach($tipo_producto->getlista_productos() as $listaproducto) {
				$listaproductoLogic= new lista_producto_logic($this->connexion);
				$listaproducto->setid_tipo_producto($tipo_producto->getId());
				lista_producto_data::save($listaproducto,$this->connexion);
				$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				tipo_producto_data::save($tipo_producto, $this->connexion);
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
			
			$this->deepLoad($this->tipo_producto,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->tipo_productos as $tipo_producto) {
				$this->deepLoad($tipo_producto,$isDeep,$deepLoadType,$clases);
								
				tipo_producto_util::refrescarFKDescripciones($this->tipo_productos);
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
			
			foreach($this->tipo_productos as $tipo_producto) {
				$this->deepLoad($tipo_producto,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->tipo_producto,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->tipo_productos as $tipo_producto) {
				$this->deepSave($tipo_producto,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->tipo_productos as $tipo_producto) {
				$this->deepSave($tipo_producto,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(lista_producto::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==producto::$class) {
						$classes[]=new Classe(producto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==lista_producto::$class) {
						$classes[]=new Classe(lista_producto::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

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
					if($clas->clas==lista_producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(lista_producto::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function gettipo_producto() : ?tipo_producto {	
		/*
		tipo_producto_logic_add::checktipo_productoToGet($this->tipo_producto,$this->datosCliente);
		tipo_producto_logic_add::updatetipo_productoToGet($this->tipo_producto);
		*/
			
		return $this->tipo_producto;
	}
		
	public function settipo_producto(tipo_producto $newtipo_producto) {
		$this->tipo_producto = $newtipo_producto;
	}
	
	public function gettipo_productos() : array {		
		/*
		tipo_producto_logic_add::checktipo_productoToGets($this->tipo_productos,$this->datosCliente);
		
		foreach ($this->tipo_productos as $tipo_productoLocal ) {
			tipo_producto_logic_add::updatetipo_productoToGet($tipo_productoLocal);
		}
		*/
		
		return $this->tipo_productos;
	}
	
	public function settipo_productos(array $newtipo_productos) {
		$this->tipo_productos = $newtipo_productos;
	}
	
	public function gettipo_productoDataAccess() : tipo_producto_data {
		return $this->tipo_productoDataAccess;
	}
	
	public function settipo_productoDataAccess(tipo_producto_data $newtipo_productoDataAccess) {
		$this->tipo_productoDataAccess = $newtipo_productoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        tipo_producto_carga::$CONTROLLER;;        
		
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
