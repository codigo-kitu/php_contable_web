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

namespace com\bydan\contabilidad\inventario\serial_producto\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\serial_producto\util\serial_producto_carga;
use com\bydan\contabilidad\inventario\serial_producto\util\serial_producto_param_return;

use com\bydan\contabilidad\inventario\serial_producto\presentation\session\serial_producto_session;

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

use com\bydan\contabilidad\inventario\serial_producto\util\serial_producto_util;
use com\bydan\contabilidad\inventario\serial_producto\business\entity\serial_producto;
use com\bydan\contabilidad\inventario\serial_producto\business\data\serial_producto_data;

//FK


use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\data\bodega_data;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

//REL


//REL DETALLES




class serial_producto_logic  extends GeneralEntityLogic implements serial_producto_logicI {	
	/*GENERAL*/
	public serial_producto_data $serial_productoDataAccess;
	//public ?serial_producto_logic_add $serial_productoLogicAdditional=null;
	public ?serial_producto $serial_producto;
	public array $serial_productos;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->serial_productoDataAccess = new serial_producto_data();			
			$this->serial_productos = array();
			$this->serial_producto = new serial_producto();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->serial_productoLogicAdditional = new serial_producto_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->serial_productoLogicAdditional==null) {
		//	$this->serial_productoLogicAdditional=new serial_producto_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->serial_productoDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->serial_productoDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->serial_productoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->serial_productoDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->serial_productos = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->serial_productos=$this->serial_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				serial_producto_util::refrescarFKDescripciones($this->serial_productos);
			}
			
			//serial_producto_logic_add::checkserial_productoToGets($this->serial_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->serial_productos);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->serial_productos = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->serial_productos=$this->serial_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				serial_producto_util::refrescarFKDescripciones($this->serial_productos);
			}
			
			//serial_producto_logic_add::checkserial_productoToGets($this->serial_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->serial_productos);
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
		$this->serial_producto = new serial_producto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->serial_producto=$this->serial_productoDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->serial_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				serial_producto_util::refrescarFKDescripcion($this->serial_producto);
			}
						
			//serial_producto_logic_add::checkserial_productoToGet($this->serial_producto,$this->datosCliente);
			//serial_producto_logic_add::updateserial_productoToGet($this->serial_producto);
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
		$this->serial_producto = new  serial_producto();
		  		  
        try {		
			$this->serial_producto=$this->serial_productoDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->serial_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				serial_producto_util::refrescarFKDescripcion($this->serial_producto);
			}
			
			//serial_producto_logic_add::checkserial_productoToGet($this->serial_producto,$this->datosCliente);
			//serial_producto_logic_add::updateserial_productoToGet($this->serial_producto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?serial_producto {
		$serial_productoLogic = new  serial_producto_logic();
		  		  
        try {		
			$serial_productoLogic->setConnexion($connexion);			
			$serial_productoLogic->getEntity($id);			
			return $serial_productoLogic->getserial_producto();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->serial_producto = new  serial_producto();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->serial_producto=$this->serial_productoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->serial_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				serial_producto_util::refrescarFKDescripcion($this->serial_producto);
			}
			
			//serial_producto_logic_add::checkserial_productoToGet($this->serial_producto,$this->datosCliente);
			//serial_producto_logic_add::updateserial_productoToGet($this->serial_producto);
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
		$this->serial_producto = new  serial_producto();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->serial_producto=$this->serial_productoDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->serial_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				serial_producto_util::refrescarFKDescripcion($this->serial_producto);
			}
			
			//serial_producto_logic_add::checkserial_productoToGet($this->serial_producto,$this->datosCliente);
			//serial_producto_logic_add::updateserial_productoToGet($this->serial_producto);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?serial_producto {
		$serial_productoLogic = new  serial_producto_logic();
		  		  
        try {		
			$serial_productoLogic->setConnexion($connexion);			
			$serial_productoLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $serial_productoLogic->getserial_producto();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->serial_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->serial_productos=$this->serial_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				serial_producto_util::refrescarFKDescripciones($this->serial_productos);
			}
			
			//serial_producto_logic_add::checkserial_productoToGets($this->serial_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->serial_productos);			
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
		$this->serial_productos = array();
		  		  
        try {			
			$this->serial_productos=$this->serial_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				serial_producto_util::refrescarFKDescripciones($this->serial_productos);
			}
			
			//serial_producto_logic_add::checkserial_productoToGets($this->serial_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->serial_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->serial_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->serial_productos=$this->serial_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				serial_producto_util::refrescarFKDescripciones($this->serial_productos);
			}
			
			//serial_producto_logic_add::checkserial_productoToGets($this->serial_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->serial_productos);
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
		$this->serial_productos = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->serial_productos=$this->serial_productoDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				serial_producto_util::refrescarFKDescripciones($this->serial_productos);
			}
			
			//serial_producto_logic_add::checkserial_productoToGets($this->serial_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->serial_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$serial_productoLogic = new  serial_producto_logic();
		  		  
        try {		
			$serial_productoLogic->setConnexion($connexion);			
			$serial_productoLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $serial_productoLogic->getserial_productos();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->serial_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->serial_productos=$this->serial_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				serial_producto_util::refrescarFKDescripciones($this->serial_productos);
			}
			
			//serial_producto_logic_add::checkserial_productoToGets($this->serial_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->serial_productos);
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
		$this->serial_productos = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->serial_productos=$this->serial_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				serial_producto_util::refrescarFKDescripciones($this->serial_productos);
			}
			
			//serial_producto_logic_add::checkserial_productoToGets($this->serial_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->serial_productos);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->serial_productos = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->serial_productos=$this->serial_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				serial_producto_util::refrescarFKDescripciones($this->serial_productos);
			}
			
			//serial_producto_logic_add::checkserial_productoToGets($this->serial_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->serial_productos);
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
		$this->serial_productos = array();
		  		  
        try {			
			$this->serial_productos=$this->serial_productoDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				serial_producto_util::refrescarFKDescripciones($this->serial_productos);
			}	
			
			//serial_producto_logic_add::checkserial_productoToGets($this->serial_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->serial_productos);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->serial_productos = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->serial_productos=$this->serial_productoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				serial_producto_util::refrescarFKDescripciones($this->serial_productos);
			}
			
			//serial_producto_logic_add::checkserial_productoToGets($this->serial_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->serial_productos);
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
		$this->serial_productos = array();
		  		  
        try {		
			$this->serial_productos=$this->serial_productoDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				serial_producto_util::refrescarFKDescripciones($this->serial_productos);
			}
			
			//serial_producto_logic_add::checkserial_productoToGets($this->serial_productos,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->serial_productos);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdbodegaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_bodega) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_bodega= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,serial_producto_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->serial_productos=$this->serial_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				serial_producto_util::refrescarFKDescripciones($this->serial_productos);
			}
			//serial_producto_logic_add::checkserial_productoToGets($this->serial_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->serial_productos);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idbodega(string $strFinalQuery,Pagination $pagination,int $id_bodega) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_bodega= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,serial_producto_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->serial_productos=$this->serial_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				serial_producto_util::refrescarFKDescripciones($this->serial_productos);
			}
			//serial_producto_logic_add::checkserial_productoToGets($this->serial_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->serial_productos);
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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,serial_producto_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->serial_productos=$this->serial_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				serial_producto_util::refrescarFKDescripciones($this->serial_productos);
			}
			//serial_producto_logic_add::checkserial_productoToGets($this->serial_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->serial_productos);

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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,serial_producto_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->serial_productos=$this->serial_productoDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				serial_producto_util::refrescarFKDescripciones($this->serial_productos);
			}
			//serial_producto_logic_add::checkserial_productoToGets($this->serial_productos,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->serial_productos);
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
						
			//serial_producto_logic_add::checkserial_productoToSave($this->serial_producto,$this->datosCliente,$this->connexion);	       
			//serial_producto_logic_add::updateserial_productoToSave($this->serial_producto);			
			serial_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->serial_producto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->serial_productoLogicAdditional->checkGeneralEntityToSave($this,$this->serial_producto,$this->datosCliente,$this->connexion);
			
			
			serial_producto_data::save($this->serial_producto, $this->connexion);	    	       	 				
			//serial_producto_logic_add::checkserial_productoToSaveAfter($this->serial_producto,$this->datosCliente,$this->connexion);			
			//$this->serial_productoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->serial_producto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->serial_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->serial_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				serial_producto_util::refrescarFKDescripcion($this->serial_producto);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->serial_producto->getIsDeleted()) {
				$this->serial_producto=null;
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
						
			/*serial_producto_logic_add::checkserial_productoToSave($this->serial_producto,$this->datosCliente,$this->connexion);*/	        
			//serial_producto_logic_add::updateserial_productoToSave($this->serial_producto);			
			//$this->serial_productoLogicAdditional->checkGeneralEntityToSave($this,$this->serial_producto,$this->datosCliente,$this->connexion);			
			serial_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->serial_producto,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			serial_producto_data::save($this->serial_producto, $this->connexion);	    	       	 						
			/*serial_producto_logic_add::checkserial_productoToSaveAfter($this->serial_producto,$this->datosCliente,$this->connexion);*/			
			//$this->serial_productoLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->serial_producto,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->serial_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->serial_producto,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				serial_producto_util::refrescarFKDescripcion($this->serial_producto);				
			}
			
			if($this->serial_producto->getIsDeleted()) {
				$this->serial_producto=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(serial_producto $serial_producto,Connexion $connexion)  {
		$serial_productoLogic = new  serial_producto_logic();		  		  
        try {		
			$serial_productoLogic->setConnexion($connexion);			
			$serial_productoLogic->setserial_producto($serial_producto);			
			$serial_productoLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*serial_producto_logic_add::checkserial_productoToSaves($this->serial_productos,$this->datosCliente,$this->connexion);*/	        	
			//$this->serial_productoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->serial_productos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->serial_productos as $serial_productoLocal) {				
								
				//serial_producto_logic_add::updateserial_productoToSave($serial_productoLocal);	        	
				serial_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$serial_productoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				serial_producto_data::save($serial_productoLocal, $this->connexion);				
			}
			
			/*serial_producto_logic_add::checkserial_productoToSavesAfter($this->serial_productos,$this->datosCliente,$this->connexion);*/			
			//$this->serial_productoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->serial_productos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				serial_producto_util::refrescarFKDescripciones($this->serial_productos);
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
			/*serial_producto_logic_add::checkserial_productoToSaves($this->serial_productos,$this->datosCliente,$this->connexion);*/			
			//$this->serial_productoLogicAdditional->checkGeneralEntitiesToSaves($this,$this->serial_productos,$this->datosCliente,$this->connexion);
			
	   		foreach($this->serial_productos as $serial_productoLocal) {				
								
				//serial_producto_logic_add::updateserial_productoToSave($serial_productoLocal);	        	
				serial_producto_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$serial_productoLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				serial_producto_data::save($serial_productoLocal, $this->connexion);				
			}			
			
			/*serial_producto_logic_add::checkserial_productoToSavesAfter($this->serial_productos,$this->datosCliente,$this->connexion);*/			
			//$this->serial_productoLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->serial_productos,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				serial_producto_util::refrescarFKDescripciones($this->serial_productos);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $serial_productos,Connexion $connexion)  {
		$serial_productoLogic = new  serial_producto_logic();
		  		  
        try {		
			$serial_productoLogic->setConnexion($connexion);			
			$serial_productoLogic->setserial_productos($serial_productos);			
			$serial_productoLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$serial_productosAux=array();
		
		foreach($this->serial_productos as $serial_producto) {
			if($serial_producto->getIsDeleted()==false) {
				$serial_productosAux[]=$serial_producto;
			}
		}
		
		$this->serial_productos=$serial_productosAux;
	}
	
	public function updateToGetsAuxiliar(array &$serial_productos) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->serial_productos as $serial_producto) {
				
				$serial_producto->setid_producto_Descripcion(serial_producto_util::getproductoDescripcion($serial_producto->getproducto()));
				$serial_producto->setid_bodega_Descripcion(serial_producto_util::getbodegaDescripcion($serial_producto->getbodega()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$serial_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$serial_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$serial_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$serial_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$serial_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$serial_productoForeignKey=new serial_producto_param_return();//serial_productoForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombosproductosFK($this->connexion,$strRecargarFkQuery,$serial_productoForeignKey,$serial_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTipos,',')) {
				$this->cargarCombosbodegasFK($this->connexion,$strRecargarFkQuery,$serial_productoForeignKey,$serial_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproductosFK($this->connexion,' where id=-1 ',$serial_productoForeignKey,$serial_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosbodegasFK($this->connexion,' where id=-1 ',$serial_productoForeignKey,$serial_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $serial_productoForeignKey;
			
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
	
	
	public function cargarCombosproductosFK($connexion=null,$strRecargarFkQuery='',$serial_productoForeignKey,$serial_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$serial_productoForeignKey->productosFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($serial_producto_session==null) {
			$serial_producto_session=new serial_producto_session();
		}
		
		if($serial_producto_session->bitBusquedaDesdeFKSesionproducto!=true) {
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
				if($serial_productoForeignKey->idproductoDefaultFK==0) {
					$serial_productoForeignKey->idproductoDefaultFK=$productoLocal->getId();
				}

				$serial_productoForeignKey->productosFK[$productoLocal->getId()]=serial_producto_util::getproductoDescripcion($productoLocal);
			}

		} else {

			if($serial_producto_session->bigidproductoActual!=null && $serial_producto_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($serial_producto_session->bigidproductoActual);//WithConnection

				$serial_productoForeignKey->productosFK[$productoLogic->getproducto()->getId()]=serial_producto_util::getproductoDescripcion($productoLogic->getproducto());
				$serial_productoForeignKey->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	public function cargarCombosbodegasFK($connexion=null,$strRecargarFkQuery='',$serial_productoForeignKey,$serial_producto_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$serial_productoForeignKey->bodegasFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($serial_producto_session==null) {
			$serial_producto_session=new serial_producto_session();
		}
		
		if($serial_producto_session->bitBusquedaDesdeFKSesionbodega!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=bodega_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalbodega=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalbodega=Funciones::GetFinalQueryAppend($finalQueryGlobalbodega, '');
				$finalQueryGlobalbodega.=bodega_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalbodega.$strRecargarFkQuery;		

				$bodegaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($bodegaLogic->getbodegas() as $bodegaLocal ) {
				if($serial_productoForeignKey->idbodegaDefaultFK==0) {
					$serial_productoForeignKey->idbodegaDefaultFK=$bodegaLocal->getId();
				}

				$serial_productoForeignKey->bodegasFK[$bodegaLocal->getId()]=serial_producto_util::getbodegaDescripcion($bodegaLocal);
			}

		} else {

			if($serial_producto_session->bigidbodegaActual!=null && $serial_producto_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($serial_producto_session->bigidbodegaActual);//WithConnection

				$serial_productoForeignKey->bodegasFK[$bodegaLogic->getbodega()->getId()]=serial_producto_util::getbodegaDescripcion($bodegaLogic->getbodega());
				$serial_productoForeignKey->idbodegaDefaultFK=$bodegaLogic->getbodega()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($serial_producto) {
		$this->saveRelacionesBase($serial_producto,true);
	}

	public function saveRelaciones($serial_producto) {
		$this->saveRelacionesBase($serial_producto,false);
	}

	public function saveRelacionesBase($serial_producto,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setserial_producto($serial_producto);

			if(true) {

				//serial_producto_logic_add::updateRelacionesToSave($serial_producto,$this);

				if(($this->serial_producto->getIsNew() || $this->serial_producto->getIsChanged()) && !$this->serial_producto->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->serial_producto->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//serial_producto_logic_add::updateRelacionesToSaveAfter($serial_producto,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $serial_productos,serial_producto_param_return $serial_productoParameterGeneral) : serial_producto_param_return {
		$serial_productoReturnGeneral=new serial_producto_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $serial_productoReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $serial_productos,serial_producto_param_return $serial_productoParameterGeneral) : serial_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$serial_productoReturnGeneral=new serial_producto_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $serial_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $serial_productos,serial_producto $serial_producto,serial_producto_param_return $serial_productoParameterGeneral,bool $isEsNuevoserial_producto,array $clases) : serial_producto_param_return {
		 try {	
			$serial_productoReturnGeneral=new serial_producto_param_return();
	
			$serial_productoReturnGeneral->setserial_producto($serial_producto);
			$serial_productoReturnGeneral->setserial_productos($serial_productos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$serial_productoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $serial_productoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $serial_productos,serial_producto $serial_producto,serial_producto_param_return $serial_productoParameterGeneral,bool $isEsNuevoserial_producto,array $clases) : serial_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$serial_productoReturnGeneral=new serial_producto_param_return();
	
			$serial_productoReturnGeneral->setserial_producto($serial_producto);
			$serial_productoReturnGeneral->setserial_productos($serial_productos);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$serial_productoReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $serial_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $serial_productos,serial_producto $serial_producto,serial_producto_param_return $serial_productoParameterGeneral,bool $isEsNuevoserial_producto,array $clases) : serial_producto_param_return {
		 try {	
			$serial_productoReturnGeneral=new serial_producto_param_return();
	
			$serial_productoReturnGeneral->setserial_producto($serial_producto);
			$serial_productoReturnGeneral->setserial_productos($serial_productos);
			
			
			
			return $serial_productoReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $serial_productos,serial_producto $serial_producto,serial_producto_param_return $serial_productoParameterGeneral,bool $isEsNuevoserial_producto,array $clases) : serial_producto_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$serial_productoReturnGeneral=new serial_producto_param_return();
	
			$serial_productoReturnGeneral->setserial_producto($serial_producto);
			$serial_productoReturnGeneral->setserial_productos($serial_productos);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $serial_productoReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,serial_producto $serial_producto,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,serial_producto $serial_producto,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		serial_producto_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(serial_producto $serial_producto,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//serial_producto_logic_add::updateserial_productoToGet($this->serial_producto);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$serial_producto->setproducto($this->serial_productoDataAccess->getproducto($this->connexion,$serial_producto));
		$serial_producto->setbodega($this->serial_productoDataAccess->getbodega($this->connexion,$serial_producto));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$serial_producto->setproducto($this->serial_productoDataAccess->getproducto($this->connexion,$serial_producto));
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$serial_producto->setbodega($this->serial_productoDataAccess->getbodega($this->connexion,$serial_producto));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$serial_producto->setproducto($this->serial_productoDataAccess->getproducto($this->connexion,$serial_producto));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$serial_producto->setbodega($this->serial_productoDataAccess->getbodega($this->connexion,$serial_producto));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$serial_producto->setproducto($this->serial_productoDataAccess->getproducto($this->connexion,$serial_producto));
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepLoad($serial_producto->getproducto(),$isDeep,$deepLoadType,$clases);
				
		$serial_producto->setbodega($this->serial_productoDataAccess->getbodega($this->connexion,$serial_producto));
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepLoad($serial_producto->getbodega(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$serial_producto->setproducto($this->serial_productoDataAccess->getproducto($this->connexion,$serial_producto));
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($serial_producto->getproducto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$serial_producto->setbodega($this->serial_productoDataAccess->getbodega($this->connexion,$serial_producto));
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepLoad($serial_producto->getbodega(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$serial_producto->setproducto($this->serial_productoDataAccess->getproducto($this->connexion,$serial_producto));
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($serial_producto->getproducto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$serial_producto->setbodega($this->serial_productoDataAccess->getbodega($this->connexion,$serial_producto));
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepLoad($serial_producto->getbodega(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(serial_producto $serial_producto,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//serial_producto_logic_add::updateserial_productoToSave($this->serial_producto);			
			
			if(!$paraDeleteCascade) {				
				serial_producto_data::save($serial_producto, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		producto_data::save($serial_producto->getproducto(),$this->connexion);
		bodega_data::save($serial_producto->getbodega(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				producto_data::save($serial_producto->getproducto(),$this->connexion);
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($serial_producto->getbodega(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($serial_producto->getproducto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($serial_producto->getbodega(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		producto_data::save($serial_producto->getproducto(),$this->connexion);
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepSave($serial_producto->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		bodega_data::save($serial_producto->getbodega(),$this->connexion);
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepSave($serial_producto->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				producto_data::save($serial_producto->getproducto(),$this->connexion);
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepSave($serial_producto->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($serial_producto->getbodega(),$this->connexion);
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepSave($serial_producto->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($serial_producto->getproducto(),$this->connexion);
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepSave($serial_producto->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($serial_producto->getbodega(),$this->connexion);
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepSave($serial_producto->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				serial_producto_data::save($serial_producto, $this->connexion);
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
			
			$this->deepLoad($this->serial_producto,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->serial_productos as $serial_producto) {
				$this->deepLoad($serial_producto,$isDeep,$deepLoadType,$clases);
								
				serial_producto_util::refrescarFKDescripciones($this->serial_productos);
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
			
			foreach($this->serial_productos as $serial_producto) {
				$this->deepLoad($serial_producto,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->serial_producto,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->serial_productos as $serial_producto) {
				$this->deepSave($serial_producto,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->serial_productos as $serial_producto) {
				$this->deepSave($serial_producto,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(bodega::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==producto::$class) {
						$classes[]=new Classe(producto::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==bodega::$class) {
						$classes[]=new Classe(bodega::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

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
					if($clas->clas==bodega::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(bodega::$class);
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
	
	
	
	
	
	
	
	public function getserial_producto() : ?serial_producto {	
		/*
		serial_producto_logic_add::checkserial_productoToGet($this->serial_producto,$this->datosCliente);
		serial_producto_logic_add::updateserial_productoToGet($this->serial_producto);
		*/
			
		return $this->serial_producto;
	}
		
	public function setserial_producto(serial_producto $newserial_producto) {
		$this->serial_producto = $newserial_producto;
	}
	
	public function getserial_productos() : array {		
		/*
		serial_producto_logic_add::checkserial_productoToGets($this->serial_productos,$this->datosCliente);
		
		foreach ($this->serial_productos as $serial_productoLocal ) {
			serial_producto_logic_add::updateserial_productoToGet($serial_productoLocal);
		}
		*/
		
		return $this->serial_productos;
	}
	
	public function setserial_productos(array $newserial_productos) {
		$this->serial_productos = $newserial_productos;
	}
	
	public function getserial_productoDataAccess() : serial_producto_data {
		return $this->serial_productoDataAccess;
	}
	
	public function setserial_productoDataAccess(serial_producto_data $newserial_productoDataAccess) {
		$this->serial_productoDataAccess = $newserial_productoDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        serial_producto_carga::$CONTROLLER;;        
		
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
