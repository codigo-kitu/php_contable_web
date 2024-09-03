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

namespace com\bydan\contabilidad\inventario\kit_producto\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\kit_producto\util\kit_producto_carga;
use com\bydan\contabilidad\inventario\kit_producto\util\kit_producto_param_return;


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

use com\bydan\contabilidad\inventario\kit_producto\util\kit_producto_util;
use com\bydan\contabilidad\inventario\kit_producto\business\entity\kit_producto;
use com\bydan\contabilidad\inventario\kit_producto\business\data\kit_producto_data;

//FK


//REL


//REL DETALLES




class kit_producto_logic  extends GeneralEntityLogic implements kit_producto_logicI {	
	/*GENERAL*/
	public kit_producto_data $kit_productoDataAccess;
	//public ?kit_producto_logic_add $kit_productoLogicAdditional=null;
	public ?kit_producto $kit_producto;
	public array $kit_productos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->kit_productoDataAccess = new kit_producto_data();			
			$this->kit_productos = array();
			$this->kit_producto = new kit_producto();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->kit_productoLogicAdditional = new kit_producto_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->kit_productoLogicAdditional==null) {
		//	$this->kit_productoLogicAdditional=new kit_producto_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->kit_productoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->kit_productoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->kit_productoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->kit_productoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->kit_productos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->kit_productos=$this->kit_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kit_producto_util::refrescarFKDescripciones($this->kit_productos);
			}
			
			//kit_producto_logic_add::checkkit_productoToGets($this->kit_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kit_productos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->kit_productos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->kit_productos=$this->kit_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kit_producto_util::refrescarFKDescripciones($this->kit_productos);
			}
			
			//kit_producto_logic_add::checkkit_productoToGets($this->kit_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kit_productos);
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
		$this->kit_producto = new kit_producto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->kit_producto=$this->kit_productoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->kit_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				kit_producto_util::refrescarFKDescripcion($this->kit_producto);
			}
						
			//kit_producto_logic_add::checkkit_productoToGet($this->kit_producto,$this->datosCliente);
			//kit_producto_logic_add::updatekit_productoToGet($this->kit_producto);
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
		$this->kit_producto = new  kit_producto();
		  		  
        try {		
			$this->kit_producto=$this->kit_productoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->kit_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				kit_producto_util::refrescarFKDescripcion($this->kit_producto);
			}
			
			//kit_producto_logic_add::checkkit_productoToGet($this->kit_producto,$this->datosCliente);
			//kit_producto_logic_add::updatekit_productoToGet($this->kit_producto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?kit_producto {
		$kit_productoLogic = new  kit_producto_logic();
		  		  
        try {		
			$kit_productoLogic->setConnexion($connexion);			
			$kit_productoLogic->getEntity($id);			
			return $kit_productoLogic->getkit_producto();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->kit_producto = new  kit_producto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->kit_producto=$this->kit_productoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->kit_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				kit_producto_util::refrescarFKDescripcion($this->kit_producto);
			}
			
			//kit_producto_logic_add::checkkit_productoToGet($this->kit_producto,$this->datosCliente);
			//kit_producto_logic_add::updatekit_productoToGet($this->kit_producto);
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
		$this->kit_producto = new  kit_producto();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->kit_producto=$this->kit_productoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->kit_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				kit_producto_util::refrescarFKDescripcion($this->kit_producto);
			}
			
			//kit_producto_logic_add::checkkit_productoToGet($this->kit_producto,$this->datosCliente);
			//kit_producto_logic_add::updatekit_productoToGet($this->kit_producto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?kit_producto {
		$kit_productoLogic = new  kit_producto_logic();
		  		  
        try {		
			$kit_productoLogic->setConnexion($connexion);			
			$kit_productoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $kit_productoLogic->getkit_producto();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->kit_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->kit_productos=$this->kit_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kit_producto_util::refrescarFKDescripciones($this->kit_productos);
			}
			
			//kit_producto_logic_add::checkkit_productoToGets($this->kit_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kit_productos);			
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
		$this->kit_productos = array();
		  		  
        try {			
			$this->kit_productos=$this->kit_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kit_producto_util::refrescarFKDescripciones($this->kit_productos);
			}
			
			//kit_producto_logic_add::checkkit_productoToGets($this->kit_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kit_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->kit_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->kit_productos=$this->kit_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kit_producto_util::refrescarFKDescripciones($this->kit_productos);
			}
			
			//kit_producto_logic_add::checkkit_productoToGets($this->kit_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kit_productos);
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
		$this->kit_productos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->kit_productos=$this->kit_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kit_producto_util::refrescarFKDescripciones($this->kit_productos);
			}
			
			//kit_producto_logic_add::checkkit_productoToGets($this->kit_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kit_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$kit_productoLogic = new  kit_producto_logic();
		  		  
        try {		
			$kit_productoLogic->setConnexion($connexion);			
			$kit_productoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $kit_productoLogic->getkit_productos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->kit_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->kit_productos=$this->kit_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kit_producto_util::refrescarFKDescripciones($this->kit_productos);
			}
			
			//kit_producto_logic_add::checkkit_productoToGets($this->kit_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kit_productos);
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
		$this->kit_productos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->kit_productos=$this->kit_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kit_producto_util::refrescarFKDescripciones($this->kit_productos);
			}
			
			//kit_producto_logic_add::checkkit_productoToGets($this->kit_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kit_productos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->kit_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->kit_productos=$this->kit_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kit_producto_util::refrescarFKDescripciones($this->kit_productos);
			}
			
			//kit_producto_logic_add::checkkit_productoToGets($this->kit_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kit_productos);
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
		$this->kit_productos = array();
		  		  
        try {			
			$this->kit_productos=$this->kit_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kit_producto_util::refrescarFKDescripciones($this->kit_productos);
			}	
			
			//kit_producto_logic_add::checkkit_productoToGets($this->kit_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kit_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->kit_productos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->kit_productos=$this->kit_productoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kit_producto_util::refrescarFKDescripciones($this->kit_productos);
			}
			
			//kit_producto_logic_add::checkkit_productoToGets($this->kit_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kit_productos);
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
		$this->kit_productos = array();
		  		  
        try {		
			$this->kit_productos=$this->kit_productoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kit_producto_util::refrescarFKDescripciones($this->kit_productos);
			}
			
			//kit_producto_logic_add::checkkit_productoToGets($this->kit_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->kit_productos);

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
						
			//kit_producto_logic_add::checkkit_productoToSave($this->kit_producto,$this->datosCliente,$this->connexion);	       
			//kit_producto_logic_add::updatekit_productoToSave($this->kit_producto);			
			kit_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->kit_producto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->kit_productoLogicAdditional->checkGeneralEntityToSave($this,$this->kit_producto,$this->datosCliente,$this->connexion);
			
			
			kit_producto_data::save($this->kit_producto, $this->connexion);	    	       	 				
			//kit_producto_logic_add::checkkit_productoToSaveAfter($this->kit_producto,$this->datosCliente,$this->connexion);			
			//$this->kit_productoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->kit_producto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->kit_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->kit_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				kit_producto_util::refrescarFKDescripcion($this->kit_producto);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->kit_producto->getIsDeleted()) {
				$this->kit_producto=null;
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
						
			/*kit_producto_logic_add::checkkit_productoToSave($this->kit_producto,$this->datosCliente,$this->connexion);*/	        
			//kit_producto_logic_add::updatekit_productoToSave($this->kit_producto);			
			//$this->kit_productoLogicAdditional->checkGeneralEntityToSave($this,$this->kit_producto,$this->datosCliente,$this->connexion);			
			kit_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->kit_producto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			kit_producto_data::save($this->kit_producto, $this->connexion);	    	       	 						
			/*kit_producto_logic_add::checkkit_productoToSaveAfter($this->kit_producto,$this->datosCliente,$this->connexion);*/			
			//$this->kit_productoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->kit_producto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->kit_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->kit_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				kit_producto_util::refrescarFKDescripcion($this->kit_producto);				
			}
			
			if($this->kit_producto->getIsDeleted()) {
				$this->kit_producto=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(kit_producto $kit_producto,Connexion $connexion)  {
		$kit_productoLogic = new  kit_producto_logic();		  		  
        try {		
			$kit_productoLogic->setConnexion($connexion);			
			$kit_productoLogic->setkit_producto($kit_producto);			
			$kit_productoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*kit_producto_logic_add::checkkit_productoToSaves($this->kit_productos,$this->datosCliente,$this->connexion);*/	        	
			//$this->kit_productoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->kit_productos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->kit_productos as $kit_productoLocal) {				
								
				//kit_producto_logic_add::updatekit_productoToSave($kit_productoLocal);	        	
				kit_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$kit_productoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				kit_producto_data::save($kit_productoLocal, $this->connexion);				
			}
			
			/*kit_producto_logic_add::checkkit_productoToSavesAfter($this->kit_productos,$this->datosCliente,$this->connexion);*/			
			//$this->kit_productoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->kit_productos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kit_producto_util::refrescarFKDescripciones($this->kit_productos);
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
			/*kit_producto_logic_add::checkkit_productoToSaves($this->kit_productos,$this->datosCliente,$this->connexion);*/			
			//$this->kit_productoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->kit_productos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->kit_productos as $kit_productoLocal) {				
								
				//kit_producto_logic_add::updatekit_productoToSave($kit_productoLocal);	        	
				kit_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$kit_productoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				kit_producto_data::save($kit_productoLocal, $this->connexion);				
			}			
			
			/*kit_producto_logic_add::checkkit_productoToSavesAfter($this->kit_productos,$this->datosCliente,$this->connexion);*/			
			//$this->kit_productoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->kit_productos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				kit_producto_util::refrescarFKDescripciones($this->kit_productos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $kit_productos,Connexion $connexion)  {
		$kit_productoLogic = new  kit_producto_logic();
		  		  
        try {		
			$kit_productoLogic->setConnexion($connexion);			
			$kit_productoLogic->setkit_productos($kit_productos);			
			$kit_productoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$kit_productosAux=array();
		
		foreach($this->kit_productos as $kit_producto) {
			if($kit_producto->getIsDeleted()==false) {
				$kit_productosAux[]=$kit_producto;
			}
		}
		
		$this->kit_productos=$kit_productosAux;
	}
	
	public function updateToGetsAuxiliar(array &$kit_productos) {
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
	
	
	
	public function saveRelacionesWithConnection($kit_producto) {
		$this->saveRelacionesBase($kit_producto,true);
	}

	public function saveRelaciones($kit_producto) {
		$this->saveRelacionesBase($kit_producto,false);
	}

	public function saveRelacionesBase($kit_producto,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setkit_producto($kit_producto);

			if(true) {

				//kit_producto_logic_add::updateRelacionesToSave($kit_producto,$this);

				if(($this->kit_producto->getIsNew() || $this->kit_producto->getIsChanged()) && !$this->kit_producto->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->kit_producto->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//kit_producto_logic_add::updateRelacionesToSaveAfter($kit_producto,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $kit_productos,kit_producto_param_return $kit_productoParameterGeneral) : kit_producto_param_return {
		$kit_productoReturnGeneral=new kit_producto_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $kit_productoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $kit_productos,kit_producto_param_return $kit_productoParameterGeneral) : kit_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$kit_productoReturnGeneral=new kit_producto_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $kit_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $kit_productos,kit_producto $kit_producto,kit_producto_param_return $kit_productoParameterGeneral,bool $isEsNuevokit_producto,array $clases) : kit_producto_param_return {
		 try {	
			$kit_productoReturnGeneral=new kit_producto_param_return();
	
			$kit_productoReturnGeneral->setkit_producto($kit_producto);
			$kit_productoReturnGeneral->setkit_productos($kit_productos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$kit_productoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $kit_productoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $kit_productos,kit_producto $kit_producto,kit_producto_param_return $kit_productoParameterGeneral,bool $isEsNuevokit_producto,array $clases) : kit_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$kit_productoReturnGeneral=new kit_producto_param_return();
	
			$kit_productoReturnGeneral->setkit_producto($kit_producto);
			$kit_productoReturnGeneral->setkit_productos($kit_productos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$kit_productoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $kit_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $kit_productos,kit_producto $kit_producto,kit_producto_param_return $kit_productoParameterGeneral,bool $isEsNuevokit_producto,array $clases) : kit_producto_param_return {
		 try {	
			$kit_productoReturnGeneral=new kit_producto_param_return();
	
			$kit_productoReturnGeneral->setkit_producto($kit_producto);
			$kit_productoReturnGeneral->setkit_productos($kit_productos);
			
			
			
			return $kit_productoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $kit_productos,kit_producto $kit_producto,kit_producto_param_return $kit_productoParameterGeneral,bool $isEsNuevokit_producto,array $clases) : kit_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$kit_productoReturnGeneral=new kit_producto_param_return();
	
			$kit_productoReturnGeneral->setkit_producto($kit_producto);
			$kit_productoReturnGeneral->setkit_productos($kit_productos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $kit_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,kit_producto $kit_producto,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,kit_producto $kit_producto,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	
	
	public function deepLoad(kit_producto $kit_producto,bool $isDeep,string $deepLoadType,array $clases) {
		
		
		try {
			
			
			
			//kit_producto_logic_add::updatekit_productoToGet($this->kit_producto);
			
			
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		
	}
	
	public function deepSave(kit_producto $kit_producto,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		
		
		try {
			
			
			//kit_producto_logic_add::updatekit_productoToSave($this->kit_producto);			
			
			if(!$paraDeleteCascade) {				
				kit_producto_data::save($kit_producto, $this->connexion);
			}
			
			
			
			if($paraDeleteCascade) {				
				kit_producto_data::save($kit_producto, $this->connexion);
			}
			
		}catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}	
		
		
	}
		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			$this->deepLoad($this->kit_producto,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->kit_productos as $kit_producto) {
				$this->deepLoad($kit_producto,$isDeep,$deepLoadType,$clases);
								
				kit_producto_util::refrescarFKDescripciones($this->kit_productos);
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
			
			foreach($this->kit_productos as $kit_producto) {
				$this->deepLoad($kit_producto,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->kit_producto,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->kit_productos as $kit_producto) {
				$this->deepSave($kit_producto,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->kit_productos as $kit_producto) {
				$this->deepSave($kit_producto,$isDeep,$deepLoadType,$clases,false);
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
	
	
	
	
	
	
	
	public function getkit_producto() : ?kit_producto {	
		/*
		kit_producto_logic_add::checkkit_productoToGet($this->kit_producto,$this->datosCliente);
		kit_producto_logic_add::updatekit_productoToGet($this->kit_producto);
		*/
			
		return $this->kit_producto;
	}
		
	public function setkit_producto(kit_producto $newkit_producto) {
		$this->kit_producto = $newkit_producto;
	}
	
	public function getkit_productos() : array {		
		/*
		kit_producto_logic_add::checkkit_productoToGets($this->kit_productos,$this->datosCliente);
		
		foreach ($this->kit_productos as $kit_productoLocal ) {
			kit_producto_logic_add::updatekit_productoToGet($kit_productoLocal);
		}
		*/
		
		return $this->kit_productos;
	}
	
	public function setkit_productos(array $newkit_productos) {
		$this->kit_productos = $newkit_productos;
	}
	
	public function getkit_productoDataAccess() : kit_producto_data {
		return $this->kit_productoDataAccess;
	}
	
	public function setkit_productoDataAccess(kit_producto_data $newkit_productoDataAccess) {
		$this->kit_productoDataAccess = $newkit_productoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        kit_producto_carga::$CONTROLLER;;        
		
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
