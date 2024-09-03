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

namespace com\bydan\contabilidad\inventario\sub_categoria_producto\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_carga;
use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_param_return;

use com\bydan\contabilidad\inventario\sub_categoria_producto\presentation\session\sub_categoria_producto_session;

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

use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_util;
use com\bydan\contabilidad\inventario\sub_categoria_producto\business\entity\sub_categoria_producto;
use com\bydan\contabilidad\inventario\sub_categoria_producto\business\data\sub_categoria_producto_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\inventario\categoria_producto\business\entity\categoria_producto;
use com\bydan\contabilidad\inventario\categoria_producto\business\data\categoria_producto_data;
use com\bydan\contabilidad\inventario\categoria_producto\business\logic\categoria_producto_logic;
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_util;

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




class sub_categoria_producto_logic  extends GeneralEntityLogic implements sub_categoria_producto_logicI {	
	/*GENERAL*/
	public sub_categoria_producto_data $sub_categoria_productoDataAccess;
	//public ?sub_categoria_producto_logic_add $sub_categoria_productoLogicAdditional=null;
	public ?sub_categoria_producto $sub_categoria_producto;
	public array $sub_categoria_productos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->sub_categoria_productoDataAccess = new sub_categoria_producto_data();			
			$this->sub_categoria_productos = array();
			$this->sub_categoria_producto = new sub_categoria_producto();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->sub_categoria_productoLogicAdditional = new sub_categoria_producto_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->sub_categoria_productoLogicAdditional==null) {
		//	$this->sub_categoria_productoLogicAdditional=new sub_categoria_producto_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->sub_categoria_productoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->sub_categoria_productoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->sub_categoria_productoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->sub_categoria_productoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->sub_categoria_productos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->sub_categoria_productos=$this->sub_categoria_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sub_categoria_producto_util::refrescarFKDescripciones($this->sub_categoria_productos);
			}
			
			//sub_categoria_producto_logic_add::checksub_categoria_productoToGets($this->sub_categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sub_categoria_productos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->sub_categoria_productos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->sub_categoria_productos=$this->sub_categoria_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sub_categoria_producto_util::refrescarFKDescripciones($this->sub_categoria_productos);
			}
			
			//sub_categoria_producto_logic_add::checksub_categoria_productoToGets($this->sub_categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sub_categoria_productos);
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
		$this->sub_categoria_producto = new sub_categoria_producto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->sub_categoria_producto=$this->sub_categoria_productoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->sub_categoria_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				sub_categoria_producto_util::refrescarFKDescripcion($this->sub_categoria_producto);
			}
						
			//sub_categoria_producto_logic_add::checksub_categoria_productoToGet($this->sub_categoria_producto,$this->datosCliente);
			//sub_categoria_producto_logic_add::updatesub_categoria_productoToGet($this->sub_categoria_producto);
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
		$this->sub_categoria_producto = new  sub_categoria_producto();
		  		  
        try {		
			$this->sub_categoria_producto=$this->sub_categoria_productoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->sub_categoria_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				sub_categoria_producto_util::refrescarFKDescripcion($this->sub_categoria_producto);
			}
			
			//sub_categoria_producto_logic_add::checksub_categoria_productoToGet($this->sub_categoria_producto,$this->datosCliente);
			//sub_categoria_producto_logic_add::updatesub_categoria_productoToGet($this->sub_categoria_producto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?sub_categoria_producto {
		$sub_categoria_productoLogic = new  sub_categoria_producto_logic();
		  		  
        try {		
			$sub_categoria_productoLogic->setConnexion($connexion);			
			$sub_categoria_productoLogic->getEntity($id);			
			return $sub_categoria_productoLogic->getsub_categoria_producto();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->sub_categoria_producto = new  sub_categoria_producto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->sub_categoria_producto=$this->sub_categoria_productoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->sub_categoria_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				sub_categoria_producto_util::refrescarFKDescripcion($this->sub_categoria_producto);
			}
			
			//sub_categoria_producto_logic_add::checksub_categoria_productoToGet($this->sub_categoria_producto,$this->datosCliente);
			//sub_categoria_producto_logic_add::updatesub_categoria_productoToGet($this->sub_categoria_producto);
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
		$this->sub_categoria_producto = new  sub_categoria_producto();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->sub_categoria_producto=$this->sub_categoria_productoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->sub_categoria_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				sub_categoria_producto_util::refrescarFKDescripcion($this->sub_categoria_producto);
			}
			
			//sub_categoria_producto_logic_add::checksub_categoria_productoToGet($this->sub_categoria_producto,$this->datosCliente);
			//sub_categoria_producto_logic_add::updatesub_categoria_productoToGet($this->sub_categoria_producto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?sub_categoria_producto {
		$sub_categoria_productoLogic = new  sub_categoria_producto_logic();
		  		  
        try {		
			$sub_categoria_productoLogic->setConnexion($connexion);			
			$sub_categoria_productoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $sub_categoria_productoLogic->getsub_categoria_producto();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->sub_categoria_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->sub_categoria_productos=$this->sub_categoria_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sub_categoria_producto_util::refrescarFKDescripciones($this->sub_categoria_productos);
			}
			
			//sub_categoria_producto_logic_add::checksub_categoria_productoToGets($this->sub_categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sub_categoria_productos);			
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
		$this->sub_categoria_productos = array();
		  		  
        try {			
			$this->sub_categoria_productos=$this->sub_categoria_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sub_categoria_producto_util::refrescarFKDescripciones($this->sub_categoria_productos);
			}
			
			//sub_categoria_producto_logic_add::checksub_categoria_productoToGets($this->sub_categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sub_categoria_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->sub_categoria_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->sub_categoria_productos=$this->sub_categoria_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sub_categoria_producto_util::refrescarFKDescripciones($this->sub_categoria_productos);
			}
			
			//sub_categoria_producto_logic_add::checksub_categoria_productoToGets($this->sub_categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sub_categoria_productos);
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
		$this->sub_categoria_productos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->sub_categoria_productos=$this->sub_categoria_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sub_categoria_producto_util::refrescarFKDescripciones($this->sub_categoria_productos);
			}
			
			//sub_categoria_producto_logic_add::checksub_categoria_productoToGets($this->sub_categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sub_categoria_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$sub_categoria_productoLogic = new  sub_categoria_producto_logic();
		  		  
        try {		
			$sub_categoria_productoLogic->setConnexion($connexion);			
			$sub_categoria_productoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $sub_categoria_productoLogic->getsub_categoria_productos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->sub_categoria_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->sub_categoria_productos=$this->sub_categoria_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sub_categoria_producto_util::refrescarFKDescripciones($this->sub_categoria_productos);
			}
			
			//sub_categoria_producto_logic_add::checksub_categoria_productoToGets($this->sub_categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sub_categoria_productos);
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
		$this->sub_categoria_productos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->sub_categoria_productos=$this->sub_categoria_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sub_categoria_producto_util::refrescarFKDescripciones($this->sub_categoria_productos);
			}
			
			//sub_categoria_producto_logic_add::checksub_categoria_productoToGets($this->sub_categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sub_categoria_productos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->sub_categoria_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->sub_categoria_productos=$this->sub_categoria_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sub_categoria_producto_util::refrescarFKDescripciones($this->sub_categoria_productos);
			}
			
			//sub_categoria_producto_logic_add::checksub_categoria_productoToGets($this->sub_categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sub_categoria_productos);
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
		$this->sub_categoria_productos = array();
		  		  
        try {			
			$this->sub_categoria_productos=$this->sub_categoria_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sub_categoria_producto_util::refrescarFKDescripciones($this->sub_categoria_productos);
			}	
			
			//sub_categoria_producto_logic_add::checksub_categoria_productoToGets($this->sub_categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sub_categoria_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->sub_categoria_productos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->sub_categoria_productos=$this->sub_categoria_productoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sub_categoria_producto_util::refrescarFKDescripciones($this->sub_categoria_productos);
			}
			
			//sub_categoria_producto_logic_add::checksub_categoria_productoToGets($this->sub_categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sub_categoria_productos);
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
		$this->sub_categoria_productos = array();
		  		  
        try {		
			$this->sub_categoria_productos=$this->sub_categoria_productoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sub_categoria_producto_util::refrescarFKDescripciones($this->sub_categoria_productos);
			}
			
			//sub_categoria_producto_logic_add::checksub_categoria_productoToGets($this->sub_categoria_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->sub_categoria_productos);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_Idcategoria_productoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_categoria_producto) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_categoria_producto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_categoria_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_categoria_producto,sub_categoria_producto_util::$ID_CATEGORIA_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_categoria_producto);

			$this->sub_categoria_productos=$this->sub_categoria_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				sub_categoria_producto_util::refrescarFKDescripciones($this->sub_categoria_productos);
			}
			//sub_categoria_producto_logic_add::checksub_categoria_productoToGets($this->sub_categoria_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->sub_categoria_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcategoria_producto(string $strFinalQuery,Pagination $pagination,int $id_categoria_producto) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_categoria_producto= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_categoria_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_categoria_producto,sub_categoria_producto_util::$ID_CATEGORIA_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_categoria_producto);

			$this->sub_categoria_productos=$this->sub_categoria_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				sub_categoria_producto_util::refrescarFKDescripciones($this->sub_categoria_productos);
			}
			//sub_categoria_producto_logic_add::checksub_categoria_productoToGets($this->sub_categoria_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->sub_categoria_productos);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,sub_categoria_producto_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->sub_categoria_productos=$this->sub_categoria_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				sub_categoria_producto_util::refrescarFKDescripciones($this->sub_categoria_productos);
			}
			//sub_categoria_producto_logic_add::checksub_categoria_productoToGets($this->sub_categoria_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->sub_categoria_productos);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,sub_categoria_producto_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->sub_categoria_productos=$this->sub_categoria_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				sub_categoria_producto_util::refrescarFKDescripciones($this->sub_categoria_productos);
			}
			//sub_categoria_producto_logic_add::checksub_categoria_productoToGets($this->sub_categoria_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->sub_categoria_productos);
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
						
			//sub_categoria_producto_logic_add::checksub_categoria_productoToSave($this->sub_categoria_producto,$this->datosCliente,$this->connexion);	       
			//sub_categoria_producto_logic_add::updatesub_categoria_productoToSave($this->sub_categoria_producto);			
			sub_categoria_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->sub_categoria_producto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->sub_categoria_productoLogicAdditional->checkGeneralEntityToSave($this,$this->sub_categoria_producto,$this->datosCliente,$this->connexion);
			
			
			sub_categoria_producto_data::save($this->sub_categoria_producto, $this->connexion);	    	       	 				
			//sub_categoria_producto_logic_add::checksub_categoria_productoToSaveAfter($this->sub_categoria_producto,$this->datosCliente,$this->connexion);			
			//$this->sub_categoria_productoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->sub_categoria_producto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->sub_categoria_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->sub_categoria_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				sub_categoria_producto_util::refrescarFKDescripcion($this->sub_categoria_producto);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->sub_categoria_producto->getIsDeleted()) {
				$this->sub_categoria_producto=null;
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
						
			/*sub_categoria_producto_logic_add::checksub_categoria_productoToSave($this->sub_categoria_producto,$this->datosCliente,$this->connexion);*/	        
			//sub_categoria_producto_logic_add::updatesub_categoria_productoToSave($this->sub_categoria_producto);			
			//$this->sub_categoria_productoLogicAdditional->checkGeneralEntityToSave($this,$this->sub_categoria_producto,$this->datosCliente,$this->connexion);			
			sub_categoria_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->sub_categoria_producto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			sub_categoria_producto_data::save($this->sub_categoria_producto, $this->connexion);	    	       	 						
			/*sub_categoria_producto_logic_add::checksub_categoria_productoToSaveAfter($this->sub_categoria_producto,$this->datosCliente,$this->connexion);*/			
			//$this->sub_categoria_productoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->sub_categoria_producto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->sub_categoria_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->sub_categoria_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				sub_categoria_producto_util::refrescarFKDescripcion($this->sub_categoria_producto);				
			}
			
			if($this->sub_categoria_producto->getIsDeleted()) {
				$this->sub_categoria_producto=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(sub_categoria_producto $sub_categoria_producto,Connexion $connexion)  {
		$sub_categoria_productoLogic = new  sub_categoria_producto_logic();		  		  
        try {		
			$sub_categoria_productoLogic->setConnexion($connexion);			
			$sub_categoria_productoLogic->setsub_categoria_producto($sub_categoria_producto);			
			$sub_categoria_productoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*sub_categoria_producto_logic_add::checksub_categoria_productoToSaves($this->sub_categoria_productos,$this->datosCliente,$this->connexion);*/	        	
			//$this->sub_categoria_productoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->sub_categoria_productos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->sub_categoria_productos as $sub_categoria_productoLocal) {				
								
				//sub_categoria_producto_logic_add::updatesub_categoria_productoToSave($sub_categoria_productoLocal);	        	
				sub_categoria_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$sub_categoria_productoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				sub_categoria_producto_data::save($sub_categoria_productoLocal, $this->connexion);				
			}
			
			/*sub_categoria_producto_logic_add::checksub_categoria_productoToSavesAfter($this->sub_categoria_productos,$this->datosCliente,$this->connexion);*/			
			//$this->sub_categoria_productoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->sub_categoria_productos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sub_categoria_producto_util::refrescarFKDescripciones($this->sub_categoria_productos);
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
			/*sub_categoria_producto_logic_add::checksub_categoria_productoToSaves($this->sub_categoria_productos,$this->datosCliente,$this->connexion);*/			
			//$this->sub_categoria_productoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->sub_categoria_productos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->sub_categoria_productos as $sub_categoria_productoLocal) {				
								
				//sub_categoria_producto_logic_add::updatesub_categoria_productoToSave($sub_categoria_productoLocal);	        	
				sub_categoria_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$sub_categoria_productoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				sub_categoria_producto_data::save($sub_categoria_productoLocal, $this->connexion);				
			}			
			
			/*sub_categoria_producto_logic_add::checksub_categoria_productoToSavesAfter($this->sub_categoria_productos,$this->datosCliente,$this->connexion);*/			
			//$this->sub_categoria_productoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->sub_categoria_productos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				sub_categoria_producto_util::refrescarFKDescripciones($this->sub_categoria_productos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $sub_categoria_productos,Connexion $connexion)  {
		$sub_categoria_productoLogic = new  sub_categoria_producto_logic();
		  		  
        try {		
			$sub_categoria_productoLogic->setConnexion($connexion);			
			$sub_categoria_productoLogic->setsub_categoria_productos($sub_categoria_productos);			
			$sub_categoria_productoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$sub_categoria_productosAux=array();
		
		foreach($this->sub_categoria_productos as $sub_categoria_producto) {
			if($sub_categoria_producto->getIsDeleted()==false) {
				$sub_categoria_productosAux[]=$sub_categoria_producto;
			}
		}
		
		$this->sub_categoria_productos=$sub_categoria_productosAux;
	}
	
	public function updateToGetsAuxiliar(array &$sub_categoria_productos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->sub_categoria_productos as $sub_categoria_producto) {
				
				$sub_categoria_producto->setid_empresa_Descripcion(sub_categoria_producto_util::getempresaDescripcion($sub_categoria_producto->getempresa()));
				$sub_categoria_producto->setid_categoria_producto_Descripcion(sub_categoria_producto_util::getcategoria_productoDescripcion($sub_categoria_producto->getcategoria_producto()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$sub_categoria_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$sub_categoria_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$sub_categoria_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$sub_categoria_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$sub_categoria_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$sub_categoria_productoForeignKey=new sub_categoria_producto_param_return();//sub_categoria_productoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$sub_categoria_productoForeignKey,$sub_categoria_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_categoria_producto',$strRecargarFkTipos,',')) {
				$this->cargarComboscategoria_productosFK($this->connexion,$strRecargarFkQuery,$sub_categoria_productoForeignKey,$sub_categoria_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$sub_categoria_productoForeignKey,$sub_categoria_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_categoria_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscategoria_productosFK($this->connexion,' where id=-1 ',$sub_categoria_productoForeignKey,$sub_categoria_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $sub_categoria_productoForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$sub_categoria_productoForeignKey,$sub_categoria_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$sub_categoria_productoForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($sub_categoria_producto_session==null) {
			$sub_categoria_producto_session=new sub_categoria_producto_session();
		}
		
		if($sub_categoria_producto_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($sub_categoria_productoForeignKey->idempresaDefaultFK==0) {
					$sub_categoria_productoForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$sub_categoria_productoForeignKey->empresasFK[$empresaLocal->getId()]=sub_categoria_producto_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($sub_categoria_producto_session->bigidempresaActual!=null && $sub_categoria_producto_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($sub_categoria_producto_session->bigidempresaActual);//WithConnection

				$sub_categoria_productoForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=sub_categoria_producto_util::getempresaDescripcion($empresaLogic->getempresa());
				$sub_categoria_productoForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarComboscategoria_productosFK($connexion=null,$strRecargarFkQuery='',$sub_categoria_productoForeignKey,$sub_categoria_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$categoria_productoLogic= new categoria_producto_logic();
		$pagination= new Pagination();
		$sub_categoria_productoForeignKey->categoria_productosFK=array();

		$categoria_productoLogic->setConnexion($connexion);
		$categoria_productoLogic->getcategoria_productoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($sub_categoria_producto_session==null) {
			$sub_categoria_producto_session=new sub_categoria_producto_session();
		}
		
		if($sub_categoria_producto_session->bitBusquedaDesdeFKSesioncategoria_producto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=categoria_producto_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcategoria_producto=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcategoria_producto=Funciones::GetFinalQueryAppend($finalQueryGlobalcategoria_producto, '');
				$finalQueryGlobalcategoria_producto.=categoria_producto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcategoria_producto.$strRecargarFkQuery;		

				$categoria_productoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($categoria_productoLogic->getcategoria_productos() as $categoria_productoLocal ) {
				if($sub_categoria_productoForeignKey->idcategoria_productoDefaultFK==0) {
					$sub_categoria_productoForeignKey->idcategoria_productoDefaultFK=$categoria_productoLocal->getId();
				}

				$sub_categoria_productoForeignKey->categoria_productosFK[$categoria_productoLocal->getId()]=sub_categoria_producto_util::getcategoria_productoDescripcion($categoria_productoLocal);
			}

		} else {

			if($sub_categoria_producto_session->bigidcategoria_productoActual!=null && $sub_categoria_producto_session->bigidcategoria_productoActual > 0) {
				$categoria_productoLogic->getEntity($sub_categoria_producto_session->bigidcategoria_productoActual);//WithConnection

				$sub_categoria_productoForeignKey->categoria_productosFK[$categoria_productoLogic->getcategoria_producto()->getId()]=sub_categoria_producto_util::getcategoria_productoDescripcion($categoria_productoLogic->getcategoria_producto());
				$sub_categoria_productoForeignKey->idcategoria_productoDefaultFK=$categoria_productoLogic->getcategoria_producto()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($sub_categoria_producto,$productos,$listaproductos) {
		$this->saveRelacionesBase($sub_categoria_producto,$productos,$listaproductos,true);
	}

	public function saveRelaciones($sub_categoria_producto,$productos,$listaproductos) {
		$this->saveRelacionesBase($sub_categoria_producto,$productos,$listaproductos,false);
	}

	public function saveRelacionesBase($sub_categoria_producto,$productos=array(),$listaproductos=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$sub_categoria_producto->setproductos($productos);
			$sub_categoria_producto->setlista_productos($listaproductos);
			$this->setsub_categoria_producto($sub_categoria_producto);

			if(true) {

				//sub_categoria_producto_logic_add::updateRelacionesToSave($sub_categoria_producto,$this);

				if(($this->sub_categoria_producto->getIsNew() || $this->sub_categoria_producto->getIsChanged()) && !$this->sub_categoria_producto->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($productos,$listaproductos);

				} else if($this->sub_categoria_producto->getIsDeleted()) {
					$this->saveRelacionesDetalles($productos,$listaproductos);
					$this->save();
				}

				//sub_categoria_producto_logic_add::updateRelacionesToSaveAfter($sub_categoria_producto,$this);

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
	
	
	public function saveRelacionesDetalles($productos=array(),$listaproductos=array()) {
		try {
	

			$idsub_categoria_productoActual=$this->getsub_categoria_producto()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/producto_carga.php');
			producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$productoLogic_Desde_sub_categoria_producto=new producto_logic();
			$productoLogic_Desde_sub_categoria_producto->setproductos($productos);

			$productoLogic_Desde_sub_categoria_producto->setConnexion($this->getConnexion());
			$productoLogic_Desde_sub_categoria_producto->setDatosCliente($this->datosCliente);

			foreach($productoLogic_Desde_sub_categoria_producto->getproductos() as $producto_Desde_sub_categoria_producto) {
				$producto_Desde_sub_categoria_producto->setid_sub_categoria_producto($idsub_categoria_productoActual);

				$productoLogic_Desde_sub_categoria_producto->setproducto($producto_Desde_sub_categoria_producto);
				$productoLogic_Desde_sub_categoria_producto->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/lista_producto_carga.php');
			lista_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$listaproductoLogic_Desde_sub_categoria_producto=new lista_producto_logic();
			$listaproductoLogic_Desde_sub_categoria_producto->setlista_productos($listaproductos);

			$listaproductoLogic_Desde_sub_categoria_producto->setConnexion($this->getConnexion());
			$listaproductoLogic_Desde_sub_categoria_producto->setDatosCliente($this->datosCliente);

			foreach($listaproductoLogic_Desde_sub_categoria_producto->getlista_productos() as $listaproducto_Desde_sub_categoria_producto) {
				$listaproducto_Desde_sub_categoria_producto->setid_sub_categoria_producto($idsub_categoria_productoActual);
			}

			$listaproductoLogic_Desde_sub_categoria_producto->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $sub_categoria_productos,sub_categoria_producto_param_return $sub_categoria_productoParameterGeneral) : sub_categoria_producto_param_return {
		$sub_categoria_productoReturnGeneral=new sub_categoria_producto_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $sub_categoria_productoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $sub_categoria_productos,sub_categoria_producto_param_return $sub_categoria_productoParameterGeneral) : sub_categoria_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$sub_categoria_productoReturnGeneral=new sub_categoria_producto_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $sub_categoria_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $sub_categoria_productos,sub_categoria_producto $sub_categoria_producto,sub_categoria_producto_param_return $sub_categoria_productoParameterGeneral,bool $isEsNuevosub_categoria_producto,array $clases) : sub_categoria_producto_param_return {
		 try {	
			$sub_categoria_productoReturnGeneral=new sub_categoria_producto_param_return();
	
			$sub_categoria_productoReturnGeneral->setsub_categoria_producto($sub_categoria_producto);
			$sub_categoria_productoReturnGeneral->setsub_categoria_productos($sub_categoria_productos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$sub_categoria_productoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $sub_categoria_productoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $sub_categoria_productos,sub_categoria_producto $sub_categoria_producto,sub_categoria_producto_param_return $sub_categoria_productoParameterGeneral,bool $isEsNuevosub_categoria_producto,array $clases) : sub_categoria_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$sub_categoria_productoReturnGeneral=new sub_categoria_producto_param_return();
	
			$sub_categoria_productoReturnGeneral->setsub_categoria_producto($sub_categoria_producto);
			$sub_categoria_productoReturnGeneral->setsub_categoria_productos($sub_categoria_productos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$sub_categoria_productoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $sub_categoria_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $sub_categoria_productos,sub_categoria_producto $sub_categoria_producto,sub_categoria_producto_param_return $sub_categoria_productoParameterGeneral,bool $isEsNuevosub_categoria_producto,array $clases) : sub_categoria_producto_param_return {
		 try {	
			$sub_categoria_productoReturnGeneral=new sub_categoria_producto_param_return();
	
			$sub_categoria_productoReturnGeneral->setsub_categoria_producto($sub_categoria_producto);
			$sub_categoria_productoReturnGeneral->setsub_categoria_productos($sub_categoria_productos);
			
			
			
			return $sub_categoria_productoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $sub_categoria_productos,sub_categoria_producto $sub_categoria_producto,sub_categoria_producto_param_return $sub_categoria_productoParameterGeneral,bool $isEsNuevosub_categoria_producto,array $clases) : sub_categoria_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$sub_categoria_productoReturnGeneral=new sub_categoria_producto_param_return();
	
			$sub_categoria_productoReturnGeneral->setsub_categoria_producto($sub_categoria_producto);
			$sub_categoria_productoReturnGeneral->setsub_categoria_productos($sub_categoria_productos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $sub_categoria_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,sub_categoria_producto $sub_categoria_producto,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,sub_categoria_producto $sub_categoria_producto,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		sub_categoria_producto_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		sub_categoria_producto_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(sub_categoria_producto $sub_categoria_producto,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//sub_categoria_producto_logic_add::updatesub_categoria_productoToGet($this->sub_categoria_producto);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$sub_categoria_producto->setempresa($this->sub_categoria_productoDataAccess->getempresa($this->connexion,$sub_categoria_producto));
		$sub_categoria_producto->setcategoria_producto($this->sub_categoria_productoDataAccess->getcategoria_producto($this->connexion,$sub_categoria_producto));
		$sub_categoria_producto->setproductos($this->sub_categoria_productoDataAccess->getproductos($this->connexion,$sub_categoria_producto));
		$sub_categoria_producto->setlista_productos($this->sub_categoria_productoDataAccess->getlista_productos($this->connexion,$sub_categoria_producto));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$sub_categoria_producto->setempresa($this->sub_categoria_productoDataAccess->getempresa($this->connexion,$sub_categoria_producto));
				continue;
			}

			if($clas->clas==categoria_producto::$class.'') {
				$sub_categoria_producto->setcategoria_producto($this->sub_categoria_productoDataAccess->getcategoria_producto($this->connexion,$sub_categoria_producto));
				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$sub_categoria_producto->setproductos($this->sub_categoria_productoDataAccess->getproductos($this->connexion,$sub_categoria_producto));

				if($this->isConDeep) {
					$productoLogic= new producto_logic($this->connexion);
					$productoLogic->setproductos($sub_categoria_producto->getproductos());
					$classesLocal=producto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$productoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					producto_util::refrescarFKDescripciones($productoLogic->getproductos());
					$sub_categoria_producto->setproductos($productoLogic->getproductos());
				}

				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$sub_categoria_producto->setlista_productos($this->sub_categoria_productoDataAccess->getlista_productos($this->connexion,$sub_categoria_producto));

				if($this->isConDeep) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproductoLogic->setlista_productos($sub_categoria_producto->getlista_productos());
					$classesLocal=lista_producto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$listaproductoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					lista_producto_util::refrescarFKDescripciones($listaproductoLogic->getlista_productos());
					$sub_categoria_producto->setlista_productos($listaproductoLogic->getlista_productos());
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
			$sub_categoria_producto->setempresa($this->sub_categoria_productoDataAccess->getempresa($this->connexion,$sub_categoria_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==categoria_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$sub_categoria_producto->setcategoria_producto($this->sub_categoria_productoDataAccess->getcategoria_producto($this->connexion,$sub_categoria_producto));
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
			$sub_categoria_producto->setproductos($this->sub_categoria_productoDataAccess->getproductos($this->connexion,$sub_categoria_producto));
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
			$sub_categoria_producto->setlista_productos($this->sub_categoria_productoDataAccess->getlista_productos($this->connexion,$sub_categoria_producto));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$sub_categoria_producto->setempresa($this->sub_categoria_productoDataAccess->getempresa($this->connexion,$sub_categoria_producto));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($sub_categoria_producto->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$sub_categoria_producto->setcategoria_producto($this->sub_categoria_productoDataAccess->getcategoria_producto($this->connexion,$sub_categoria_producto));
		$categoria_productoLogic= new categoria_producto_logic($this->connexion);
		$categoria_productoLogic->deepLoad($sub_categoria_producto->getcategoria_producto(),$isDeep,$deepLoadType,$clases);
				

		$sub_categoria_producto->setproductos($this->sub_categoria_productoDataAccess->getproductos($this->connexion,$sub_categoria_producto));

		foreach($sub_categoria_producto->getproductos() as $producto) {
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
		}

		$sub_categoria_producto->setlista_productos($this->sub_categoria_productoDataAccess->getlista_productos($this->connexion,$sub_categoria_producto));

		foreach($sub_categoria_producto->getlista_productos() as $listaproducto) {
			$listaproductoLogic= new lista_producto_logic($this->connexion);
			$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$sub_categoria_producto->setempresa($this->sub_categoria_productoDataAccess->getempresa($this->connexion,$sub_categoria_producto));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($sub_categoria_producto->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==categoria_producto::$class.'') {
				$sub_categoria_producto->setcategoria_producto($this->sub_categoria_productoDataAccess->getcategoria_producto($this->connexion,$sub_categoria_producto));
				$categoria_productoLogic= new categoria_producto_logic($this->connexion);
				$categoria_productoLogic->deepLoad($sub_categoria_producto->getcategoria_producto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$sub_categoria_producto->setproductos($this->sub_categoria_productoDataAccess->getproductos($this->connexion,$sub_categoria_producto));

				foreach($sub_categoria_producto->getproductos() as $producto) {
					$productoLogic= new producto_logic($this->connexion);
					$productoLogic->deepLoad($producto,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$sub_categoria_producto->setlista_productos($this->sub_categoria_productoDataAccess->getlista_productos($this->connexion,$sub_categoria_producto));

				foreach($sub_categoria_producto->getlista_productos() as $listaproducto) {
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
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$sub_categoria_producto->setempresa($this->sub_categoria_productoDataAccess->getempresa($this->connexion,$sub_categoria_producto));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($sub_categoria_producto->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==categoria_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$sub_categoria_producto->setcategoria_producto($this->sub_categoria_productoDataAccess->getcategoria_producto($this->connexion,$sub_categoria_producto));
			$categoria_productoLogic= new categoria_producto_logic($this->connexion);
			$categoria_productoLogic->deepLoad($sub_categoria_producto->getcategoria_producto(),$isDeep,$deepLoadType,$clases);
				
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
			$sub_categoria_producto->setproductos($this->sub_categoria_productoDataAccess->getproductos($this->connexion,$sub_categoria_producto));

			foreach($sub_categoria_producto->getproductos() as $producto) {
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
			$sub_categoria_producto->setlista_productos($this->sub_categoria_productoDataAccess->getlista_productos($this->connexion,$sub_categoria_producto));

			foreach($sub_categoria_producto->getlista_productos() as $listaproducto) {
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
	
	public function deepSave(sub_categoria_producto $sub_categoria_producto,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//sub_categoria_producto_logic_add::updatesub_categoria_productoToSave($this->sub_categoria_producto);			
			
			if(!$paraDeleteCascade) {				
				sub_categoria_producto_data::save($sub_categoria_producto, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($sub_categoria_producto->getempresa(),$this->connexion);
		categoria_producto_data::save($sub_categoria_producto->getcategoria_producto(),$this->connexion);

		foreach($sub_categoria_producto->getproductos() as $producto) {
			$producto->setid_sub_categoria_producto($sub_categoria_producto->getId());
			producto_data::save($producto,$this->connexion);
		}


		foreach($sub_categoria_producto->getlista_productos() as $listaproducto) {
			$listaproducto->setid_sub_categoria_producto($sub_categoria_producto->getId());
			lista_producto_data::save($listaproducto,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($sub_categoria_producto->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==categoria_producto::$class.'') {
				categoria_producto_data::save($sub_categoria_producto->getcategoria_producto(),$this->connexion);
				continue;
			}


			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($sub_categoria_producto->getproductos() as $producto) {
					$producto->setid_sub_categoria_producto($sub_categoria_producto->getId());
					producto_data::save($producto,$this->connexion);
				}

				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($sub_categoria_producto->getlista_productos() as $listaproducto) {
					$listaproducto->setid_sub_categoria_producto($sub_categoria_producto->getId());
					lista_producto_data::save($listaproducto,$this->connexion);
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
			empresa_data::save($sub_categoria_producto->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==categoria_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			categoria_producto_data::save($sub_categoria_producto->getcategoria_producto(),$this->connexion);
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

			foreach($sub_categoria_producto->getproductos() as $producto) {
				$producto->setid_sub_categoria_producto($sub_categoria_producto->getId());
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

			foreach($sub_categoria_producto->getlista_productos() as $listaproducto) {
				$listaproducto->setid_sub_categoria_producto($sub_categoria_producto->getId());
				lista_producto_data::save($listaproducto,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($sub_categoria_producto->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($sub_categoria_producto->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		categoria_producto_data::save($sub_categoria_producto->getcategoria_producto(),$this->connexion);
		$categoria_productoLogic= new categoria_producto_logic($this->connexion);
		$categoria_productoLogic->deepSave($sub_categoria_producto->getcategoria_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($sub_categoria_producto->getproductos() as $producto) {
			$productoLogic= new producto_logic($this->connexion);
			$producto->setid_sub_categoria_producto($sub_categoria_producto->getId());
			producto_data::save($producto,$this->connexion);
			$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($sub_categoria_producto->getlista_productos() as $listaproducto) {
			$listaproductoLogic= new lista_producto_logic($this->connexion);
			$listaproducto->setid_sub_categoria_producto($sub_categoria_producto->getId());
			lista_producto_data::save($listaproducto,$this->connexion);
			$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($sub_categoria_producto->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($sub_categoria_producto->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==categoria_producto::$class.'') {
				categoria_producto_data::save($sub_categoria_producto->getcategoria_producto(),$this->connexion);
				$categoria_productoLogic= new categoria_producto_logic($this->connexion);
				$categoria_productoLogic->deepSave($sub_categoria_producto->getcategoria_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($sub_categoria_producto->getproductos() as $producto) {
					$productoLogic= new producto_logic($this->connexion);
					$producto->setid_sub_categoria_producto($sub_categoria_producto->getId());
					producto_data::save($producto,$this->connexion);
					$productoLogic->deepSave($producto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($sub_categoria_producto->getlista_productos() as $listaproducto) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproducto->setid_sub_categoria_producto($sub_categoria_producto->getId());
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
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			empresa_data::save($sub_categoria_producto->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($sub_categoria_producto->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==categoria_producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			categoria_producto_data::save($sub_categoria_producto->getcategoria_producto(),$this->connexion);
			$categoria_productoLogic= new categoria_producto_logic($this->connexion);
			$categoria_productoLogic->deepSave($sub_categoria_producto->getcategoria_producto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
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

			foreach($sub_categoria_producto->getproductos() as $producto) {
				$productoLogic= new producto_logic($this->connexion);
				$producto->setid_sub_categoria_producto($sub_categoria_producto->getId());
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

			foreach($sub_categoria_producto->getlista_productos() as $listaproducto) {
				$listaproductoLogic= new lista_producto_logic($this->connexion);
				$listaproducto->setid_sub_categoria_producto($sub_categoria_producto->getId());
				lista_producto_data::save($listaproducto,$this->connexion);
				$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				sub_categoria_producto_data::save($sub_categoria_producto, $this->connexion);
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
			
			$this->deepLoad($this->sub_categoria_producto,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->sub_categoria_productos as $sub_categoria_producto) {
				$this->deepLoad($sub_categoria_producto,$isDeep,$deepLoadType,$clases);
								
				sub_categoria_producto_util::refrescarFKDescripciones($this->sub_categoria_productos);
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
			
			foreach($this->sub_categoria_productos as $sub_categoria_producto) {
				$this->deepLoad($sub_categoria_producto,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->sub_categoria_producto,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->sub_categoria_productos as $sub_categoria_producto) {
				$this->deepSave($sub_categoria_producto,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->sub_categoria_productos as $sub_categoria_producto) {
				$this->deepSave($sub_categoria_producto,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(categoria_producto::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==categoria_producto::$class) {
						$classes[]=new Classe(categoria_producto::$class);
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
					if($clas->clas==categoria_producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(categoria_producto::$class);
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
	
	
	
	
	
	
	
	public function getsub_categoria_producto() : ?sub_categoria_producto {	
		/*
		sub_categoria_producto_logic_add::checksub_categoria_productoToGet($this->sub_categoria_producto,$this->datosCliente);
		sub_categoria_producto_logic_add::updatesub_categoria_productoToGet($this->sub_categoria_producto);
		*/
			
		return $this->sub_categoria_producto;
	}
		
	public function setsub_categoria_producto(sub_categoria_producto $newsub_categoria_producto) {
		$this->sub_categoria_producto = $newsub_categoria_producto;
	}
	
	public function getsub_categoria_productos() : array {		
		/*
		sub_categoria_producto_logic_add::checksub_categoria_productoToGets($this->sub_categoria_productos,$this->datosCliente);
		
		foreach ($this->sub_categoria_productos as $sub_categoria_productoLocal ) {
			sub_categoria_producto_logic_add::updatesub_categoria_productoToGet($sub_categoria_productoLocal);
		}
		*/
		
		return $this->sub_categoria_productos;
	}
	
	public function setsub_categoria_productos(array $newsub_categoria_productos) {
		$this->sub_categoria_productos = $newsub_categoria_productos;
	}
	
	public function getsub_categoria_productoDataAccess() : sub_categoria_producto_data {
		return $this->sub_categoria_productoDataAccess;
	}
	
	public function setsub_categoria_productoDataAccess(sub_categoria_producto_data $newsub_categoria_productoDataAccess) {
		$this->sub_categoria_productoDataAccess = $newsub_categoria_productoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        sub_categoria_producto_carga::$CONTROLLER;;        
		
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
