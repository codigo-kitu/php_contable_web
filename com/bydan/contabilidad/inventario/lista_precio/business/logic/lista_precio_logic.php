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

namespace com\bydan\contabilidad\inventario\lista_precio\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_carga;
use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_param_return;

use com\bydan\contabilidad\inventario\lista_precio\presentation\session\lista_precio_session;

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

use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_util;
use com\bydan\contabilidad\inventario\lista_precio\business\entity\lista_precio;
use com\bydan\contabilidad\inventario\lista_precio\business\data\lista_precio_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\data\bodega_data;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

//REL


//REL DETALLES




class lista_precio_logic  extends GeneralEntityLogic implements lista_precio_logicI {	
	/*GENERAL*/
	public lista_precio_data $lista_precioDataAccess;
	//public ?lista_precio_logic_add $lista_precioLogicAdditional=null;
	public ?lista_precio $lista_precio;
	public array $lista_precios;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->lista_precioDataAccess = new lista_precio_data();			
			$this->lista_precios = array();
			$this->lista_precio = new lista_precio();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->lista_precioLogicAdditional = new lista_precio_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->lista_precioLogicAdditional==null) {
		//	$this->lista_precioLogicAdditional=new lista_precio_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->lista_precioDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->lista_precioDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->lista_precioDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->lista_precioDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->lista_precios = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lista_precios=$this->lista_precioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
			}
			
			//lista_precio_logic_add::checklista_precioToGets($this->lista_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_precios);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->lista_precios = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lista_precios=$this->lista_precioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
			}
			
			//lista_precio_logic_add::checklista_precioToGets($this->lista_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_precios);
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
		$this->lista_precio = new lista_precio();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->lista_precio=$this->lista_precioDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->lista_precio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				lista_precio_util::refrescarFKDescripcion($this->lista_precio);
			}
						
			//lista_precio_logic_add::checklista_precioToGet($this->lista_precio,$this->datosCliente);
			//lista_precio_logic_add::updatelista_precioToGet($this->lista_precio);
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
		$this->lista_precio = new  lista_precio();
		  		  
        try {		
			$this->lista_precio=$this->lista_precioDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->lista_precio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				lista_precio_util::refrescarFKDescripcion($this->lista_precio);
			}
			
			//lista_precio_logic_add::checklista_precioToGet($this->lista_precio,$this->datosCliente);
			//lista_precio_logic_add::updatelista_precioToGet($this->lista_precio);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?lista_precio {
		$lista_precioLogic = new  lista_precio_logic();
		  		  
        try {		
			$lista_precioLogic->setConnexion($connexion);			
			$lista_precioLogic->getEntity($id);			
			return $lista_precioLogic->getlista_precio();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->lista_precio = new  lista_precio();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->lista_precio=$this->lista_precioDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->lista_precio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				lista_precio_util::refrescarFKDescripcion($this->lista_precio);
			}
			
			//lista_precio_logic_add::checklista_precioToGet($this->lista_precio,$this->datosCliente);
			//lista_precio_logic_add::updatelista_precioToGet($this->lista_precio);
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
		$this->lista_precio = new  lista_precio();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lista_precio=$this->lista_precioDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->lista_precio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				lista_precio_util::refrescarFKDescripcion($this->lista_precio);
			}
			
			//lista_precio_logic_add::checklista_precioToGet($this->lista_precio,$this->datosCliente);
			//lista_precio_logic_add::updatelista_precioToGet($this->lista_precio);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?lista_precio {
		$lista_precioLogic = new  lista_precio_logic();
		  		  
        try {		
			$lista_precioLogic->setConnexion($connexion);			
			$lista_precioLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $lista_precioLogic->getlista_precio();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->lista_precios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->lista_precios=$this->lista_precioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
			}
			
			//lista_precio_logic_add::checklista_precioToGets($this->lista_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_precios);			
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
		$this->lista_precios = array();
		  		  
        try {			
			$this->lista_precios=$this->lista_precioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
			}
			
			//lista_precio_logic_add::checklista_precioToGets($this->lista_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_precios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->lista_precios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lista_precios=$this->lista_precioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
			}
			
			//lista_precio_logic_add::checklista_precioToGets($this->lista_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_precios);
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
		$this->lista_precios = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lista_precios=$this->lista_precioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
			}
			
			//lista_precio_logic_add::checklista_precioToGets($this->lista_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_precios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$lista_precioLogic = new  lista_precio_logic();
		  		  
        try {		
			$lista_precioLogic->setConnexion($connexion);			
			$lista_precioLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $lista_precioLogic->getlista_precios();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->lista_precios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->lista_precios=$this->lista_precioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
			}
			
			//lista_precio_logic_add::checklista_precioToGets($this->lista_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_precios);
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
		$this->lista_precios = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lista_precios=$this->lista_precioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
			}
			
			//lista_precio_logic_add::checklista_precioToGets($this->lista_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_precios);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->lista_precios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->lista_precios=$this->lista_precioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
			}
			
			//lista_precio_logic_add::checklista_precioToGets($this->lista_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_precios);
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
		$this->lista_precios = array();
		  		  
        try {			
			$this->lista_precios=$this->lista_precioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
			}	
			
			//lista_precio_logic_add::checklista_precioToGets($this->lista_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_precios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->lista_precios = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->lista_precios=$this->lista_precioDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
			}
			
			//lista_precio_logic_add::checklista_precioToGets($this->lista_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_precios);
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
		$this->lista_precios = array();
		  		  
        try {		
			$this->lista_precios=$this->lista_precioDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
			}
			
			//lista_precio_logic_add::checklista_precioToGets($this->lista_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->lista_precios);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,lista_precio_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->lista_precios=$this->lista_precioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
			}
			//lista_precio_logic_add::checklista_precioToGets($this->lista_precios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_precios);

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
			$parameterSelectionGeneralid_bodega->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_bodega,lista_precio_util::$ID_BODEGA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_bodega);

			$this->lista_precios=$this->lista_precioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
			}
			//lista_precio_logic_add::checklista_precioToGets($this->lista_precios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_precios);
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,lista_precio_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->lista_precios=$this->lista_precioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
			}
			//lista_precio_logic_add::checklista_precioToGets($this->lista_precios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_precios);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,lista_precio_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->lista_precios=$this->lista_precioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
			}
			//lista_precio_logic_add::checklista_precioToGets($this->lista_precios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_precios);
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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,lista_precio_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->lista_precios=$this->lista_precioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
			}
			//lista_precio_logic_add::checklista_precioToGets($this->lista_precios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_precios);

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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,lista_precio_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->lista_precios=$this->lista_precioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
			}
			//lista_precio_logic_add::checklista_precioToGets($this->lista_precios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_precios);
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
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,lista_precio_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->lista_precios=$this->lista_precioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
			}
			//lista_precio_logic_add::checklista_precioToGets($this->lista_precios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_precios);

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
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,lista_precio_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->lista_precios=$this->lista_precioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
			}
			//lista_precio_logic_add::checklista_precioToGets($this->lista_precios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->lista_precios);
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
						
			//lista_precio_logic_add::checklista_precioToSave($this->lista_precio,$this->datosCliente,$this->connexion);	       
			//lista_precio_logic_add::updatelista_precioToSave($this->lista_precio);			
			lista_precio_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->lista_precio,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->lista_precioLogicAdditional->checkGeneralEntityToSave($this,$this->lista_precio,$this->datosCliente,$this->connexion);
			
			
			lista_precio_data::save($this->lista_precio, $this->connexion);	    	       	 				
			//lista_precio_logic_add::checklista_precioToSaveAfter($this->lista_precio,$this->datosCliente,$this->connexion);			
			//$this->lista_precioLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->lista_precio,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->lista_precio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->lista_precio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				lista_precio_util::refrescarFKDescripcion($this->lista_precio);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->lista_precio->getIsDeleted()) {
				$this->lista_precio=null;
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
						
			/*lista_precio_logic_add::checklista_precioToSave($this->lista_precio,$this->datosCliente,$this->connexion);*/	        
			//lista_precio_logic_add::updatelista_precioToSave($this->lista_precio);			
			//$this->lista_precioLogicAdditional->checkGeneralEntityToSave($this,$this->lista_precio,$this->datosCliente,$this->connexion);			
			lista_precio_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->lista_precio,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			lista_precio_data::save($this->lista_precio, $this->connexion);	    	       	 						
			/*lista_precio_logic_add::checklista_precioToSaveAfter($this->lista_precio,$this->datosCliente,$this->connexion);*/			
			//$this->lista_precioLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->lista_precio,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->lista_precio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->lista_precio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				lista_precio_util::refrescarFKDescripcion($this->lista_precio);				
			}
			
			if($this->lista_precio->getIsDeleted()) {
				$this->lista_precio=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(lista_precio $lista_precio,Connexion $connexion)  {
		$lista_precioLogic = new  lista_precio_logic();		  		  
        try {		
			$lista_precioLogic->setConnexion($connexion);			
			$lista_precioLogic->setlista_precio($lista_precio);			
			$lista_precioLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*lista_precio_logic_add::checklista_precioToSaves($this->lista_precios,$this->datosCliente,$this->connexion);*/	        	
			//$this->lista_precioLogicAdditional->checkGeneralEntitiesToSaves($this,$this->lista_precios,$this->datosCliente,$this->connexion);
			
	   		foreach($this->lista_precios as $lista_precioLocal) {				
								
				//lista_precio_logic_add::updatelista_precioToSave($lista_precioLocal);	        	
				lista_precio_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$lista_precioLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				lista_precio_data::save($lista_precioLocal, $this->connexion);				
			}
			
			/*lista_precio_logic_add::checklista_precioToSavesAfter($this->lista_precios,$this->datosCliente,$this->connexion);*/			
			//$this->lista_precioLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->lista_precios,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
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
			/*lista_precio_logic_add::checklista_precioToSaves($this->lista_precios,$this->datosCliente,$this->connexion);*/			
			//$this->lista_precioLogicAdditional->checkGeneralEntitiesToSaves($this,$this->lista_precios,$this->datosCliente,$this->connexion);
			
	   		foreach($this->lista_precios as $lista_precioLocal) {				
								
				//lista_precio_logic_add::updatelista_precioToSave($lista_precioLocal);	        	
				lista_precio_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$lista_precioLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				lista_precio_data::save($lista_precioLocal, $this->connexion);				
			}			
			
			/*lista_precio_logic_add::checklista_precioToSavesAfter($this->lista_precios,$this->datosCliente,$this->connexion);*/			
			//$this->lista_precioLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->lista_precios,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $lista_precios,Connexion $connexion)  {
		$lista_precioLogic = new  lista_precio_logic();
		  		  
        try {		
			$lista_precioLogic->setConnexion($connexion);			
			$lista_precioLogic->setlista_precios($lista_precios);			
			$lista_precioLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$lista_preciosAux=array();
		
		foreach($this->lista_precios as $lista_precio) {
			if($lista_precio->getIsDeleted()==false) {
				$lista_preciosAux[]=$lista_precio;
			}
		}
		
		$this->lista_precios=$lista_preciosAux;
	}
	
	public function updateToGetsAuxiliar(array &$lista_precios) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->lista_precios as $lista_precio) {
				
				$lista_precio->setid_empresa_Descripcion(lista_precio_util::getempresaDescripcion($lista_precio->getempresa()));
				$lista_precio->setid_bodega_Descripcion(lista_precio_util::getbodegaDescripcion($lista_precio->getbodega()));
				$lista_precio->setid_producto_Descripcion(lista_precio_util::getproductoDescripcion($lista_precio->getproducto()));
				$lista_precio->setid_proveedor_Descripcion(lista_precio_util::getproveedorDescripcion($lista_precio->getproveedor()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$lista_precio_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$lista_precio_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$lista_precio_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$lista_precio_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$lista_precio_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$lista_precioForeignKey=new lista_precio_param_return();//lista_precioForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$lista_precioForeignKey,$lista_precio_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTipos,',')) {
				$this->cargarCombosbodegasFK($this->connexion,$strRecargarFkQuery,$lista_precioForeignKey,$lista_precio_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombosproductosFK($this->connexion,$strRecargarFkQuery,$lista_precioForeignKey,$lista_precio_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosproveedorsFK($this->connexion,$strRecargarFkQuery,$lista_precioForeignKey,$lista_precio_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$lista_precioForeignKey,$lista_precio_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_bodega',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosbodegasFK($this->connexion,' where id=-1 ',$lista_precioForeignKey,$lista_precio_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproductosFK($this->connexion,' where id=-1 ',$lista_precioForeignKey,$lista_precio_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproveedorsFK($this->connexion,' where id=-1 ',$lista_precioForeignKey,$lista_precio_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $lista_precioForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$lista_precioForeignKey,$lista_precio_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$lista_precioForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_precio_session==null) {
			$lista_precio_session=new lista_precio_session();
		}
		
		if($lista_precio_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($lista_precioForeignKey->idempresaDefaultFK==0) {
					$lista_precioForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$lista_precioForeignKey->empresasFK[$empresaLocal->getId()]=lista_precio_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($lista_precio_session->bigidempresaActual!=null && $lista_precio_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($lista_precio_session->bigidempresaActual);//WithConnection

				$lista_precioForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=lista_precio_util::getempresaDescripcion($empresaLogic->getempresa());
				$lista_precioForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombosbodegasFK($connexion=null,$strRecargarFkQuery='',$lista_precioForeignKey,$lista_precio_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$lista_precioForeignKey->bodegasFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_precio_session==null) {
			$lista_precio_session=new lista_precio_session();
		}
		
		if($lista_precio_session->bitBusquedaDesdeFKSesionbodega!=true) {
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
				if($lista_precioForeignKey->idbodegaDefaultFK==0) {
					$lista_precioForeignKey->idbodegaDefaultFK=$bodegaLocal->getId();
				}

				$lista_precioForeignKey->bodegasFK[$bodegaLocal->getId()]=lista_precio_util::getbodegaDescripcion($bodegaLocal);
			}

		} else {

			if($lista_precio_session->bigidbodegaActual!=null && $lista_precio_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($lista_precio_session->bigidbodegaActual);//WithConnection

				$lista_precioForeignKey->bodegasFK[$bodegaLogic->getbodega()->getId()]=lista_precio_util::getbodegaDescripcion($bodegaLogic->getbodega());
				$lista_precioForeignKey->idbodegaDefaultFK=$bodegaLogic->getbodega()->getId();
			}
		}
	}

	public function cargarCombosproductosFK($connexion=null,$strRecargarFkQuery='',$lista_precioForeignKey,$lista_precio_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$lista_precioForeignKey->productosFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_precio_session==null) {
			$lista_precio_session=new lista_precio_session();
		}
		
		if($lista_precio_session->bitBusquedaDesdeFKSesionproducto!=true) {
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
				if($lista_precioForeignKey->idproductoDefaultFK==0) {
					$lista_precioForeignKey->idproductoDefaultFK=$productoLocal->getId();
				}

				$lista_precioForeignKey->productosFK[$productoLocal->getId()]=lista_precio_util::getproductoDescripcion($productoLocal);
			}

		} else {

			if($lista_precio_session->bigidproductoActual!=null && $lista_precio_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($lista_precio_session->bigidproductoActual);//WithConnection

				$lista_precioForeignKey->productosFK[$productoLogic->getproducto()->getId()]=lista_precio_util::getproductoDescripcion($productoLogic->getproducto());
				$lista_precioForeignKey->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	public function cargarCombosproveedorsFK($connexion=null,$strRecargarFkQuery='',$lista_precioForeignKey,$lista_precio_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$proveedorLogic= new proveedor_logic();
		$pagination= new Pagination();
		$lista_precioForeignKey->proveedorsFK=array();

		$proveedorLogic->setConnexion($connexion);
		$proveedorLogic->getproveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($lista_precio_session==null) {
			$lista_precio_session=new lista_precio_session();
		}
		
		if($lista_precio_session->bitBusquedaDesdeFKSesionproveedor!=true) {
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
				if($lista_precioForeignKey->idproveedorDefaultFK==0) {
					$lista_precioForeignKey->idproveedorDefaultFK=$proveedorLocal->getId();
				}

				$lista_precioForeignKey->proveedorsFK[$proveedorLocal->getId()]=lista_precio_util::getproveedorDescripcion($proveedorLocal);
			}

		} else {

			if($lista_precio_session->bigidproveedorActual!=null && $lista_precio_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($lista_precio_session->bigidproveedorActual);//WithConnection

				$lista_precioForeignKey->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=lista_precio_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$lista_precioForeignKey->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($lista_precio) {
		$this->saveRelacionesBase($lista_precio,true);
	}

	public function saveRelaciones($lista_precio) {
		$this->saveRelacionesBase($lista_precio,false);
	}

	public function saveRelacionesBase($lista_precio,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setlista_precio($lista_precio);

			if(true) {

				//lista_precio_logic_add::updateRelacionesToSave($lista_precio,$this);

				if(($this->lista_precio->getIsNew() || $this->lista_precio->getIsChanged()) && !$this->lista_precio->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->lista_precio->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//lista_precio_logic_add::updateRelacionesToSaveAfter($lista_precio,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $lista_precios,lista_precio_param_return $lista_precioParameterGeneral) : lista_precio_param_return {
		$lista_precioReturnGeneral=new lista_precio_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $lista_precioReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $lista_precios,lista_precio_param_return $lista_precioParameterGeneral) : lista_precio_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$lista_precioReturnGeneral=new lista_precio_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $lista_precioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $lista_precios,lista_precio $lista_precio,lista_precio_param_return $lista_precioParameterGeneral,bool $isEsNuevolista_precio,array $clases) : lista_precio_param_return {
		 try {	
			$lista_precioReturnGeneral=new lista_precio_param_return();
	
			$lista_precioReturnGeneral->setlista_precio($lista_precio);
			$lista_precioReturnGeneral->setlista_precios($lista_precios);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$lista_precioReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $lista_precioReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $lista_precios,lista_precio $lista_precio,lista_precio_param_return $lista_precioParameterGeneral,bool $isEsNuevolista_precio,array $clases) : lista_precio_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$lista_precioReturnGeneral=new lista_precio_param_return();
	
			$lista_precioReturnGeneral->setlista_precio($lista_precio);
			$lista_precioReturnGeneral->setlista_precios($lista_precios);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$lista_precioReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $lista_precioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $lista_precios,lista_precio $lista_precio,lista_precio_param_return $lista_precioParameterGeneral,bool $isEsNuevolista_precio,array $clases) : lista_precio_param_return {
		 try {	
			$lista_precioReturnGeneral=new lista_precio_param_return();
	
			$lista_precioReturnGeneral->setlista_precio($lista_precio);
			$lista_precioReturnGeneral->setlista_precios($lista_precios);
			
			
			
			return $lista_precioReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $lista_precios,lista_precio $lista_precio,lista_precio_param_return $lista_precioParameterGeneral,bool $isEsNuevolista_precio,array $clases) : lista_precio_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$lista_precioReturnGeneral=new lista_precio_param_return();
	
			$lista_precioReturnGeneral->setlista_precio($lista_precio);
			$lista_precioReturnGeneral->setlista_precios($lista_precios);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $lista_precioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,lista_precio $lista_precio,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,lista_precio $lista_precio,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		lista_precio_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(lista_precio $lista_precio,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//lista_precio_logic_add::updatelista_precioToGet($this->lista_precio);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$lista_precio->setempresa($this->lista_precioDataAccess->getempresa($this->connexion,$lista_precio));
		$lista_precio->setbodega($this->lista_precioDataAccess->getbodega($this->connexion,$lista_precio));
		$lista_precio->setproducto($this->lista_precioDataAccess->getproducto($this->connexion,$lista_precio));
		$lista_precio->setproveedor($this->lista_precioDataAccess->getproveedor($this->connexion,$lista_precio));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$lista_precio->setempresa($this->lista_precioDataAccess->getempresa($this->connexion,$lista_precio));
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$lista_precio->setbodega($this->lista_precioDataAccess->getbodega($this->connexion,$lista_precio));
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$lista_precio->setproducto($this->lista_precioDataAccess->getproducto($this->connexion,$lista_precio));
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$lista_precio->setproveedor($this->lista_precioDataAccess->getproveedor($this->connexion,$lista_precio));
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
			$lista_precio->setempresa($this->lista_precioDataAccess->getempresa($this->connexion,$lista_precio));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_precio->setbodega($this->lista_precioDataAccess->getbodega($this->connexion,$lista_precio));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_precio->setproducto($this->lista_precioDataAccess->getproducto($this->connexion,$lista_precio));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_precio->setproveedor($this->lista_precioDataAccess->getproveedor($this->connexion,$lista_precio));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$lista_precio->setempresa($this->lista_precioDataAccess->getempresa($this->connexion,$lista_precio));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($lista_precio->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$lista_precio->setbodega($this->lista_precioDataAccess->getbodega($this->connexion,$lista_precio));
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepLoad($lista_precio->getbodega(),$isDeep,$deepLoadType,$clases);
				
		$lista_precio->setproducto($this->lista_precioDataAccess->getproducto($this->connexion,$lista_precio));
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepLoad($lista_precio->getproducto(),$isDeep,$deepLoadType,$clases);
				
		$lista_precio->setproveedor($this->lista_precioDataAccess->getproveedor($this->connexion,$lista_precio));
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepLoad($lista_precio->getproveedor(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$lista_precio->setempresa($this->lista_precioDataAccess->getempresa($this->connexion,$lista_precio));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($lista_precio->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				$lista_precio->setbodega($this->lista_precioDataAccess->getbodega($this->connexion,$lista_precio));
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepLoad($lista_precio->getbodega(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				$lista_precio->setproducto($this->lista_precioDataAccess->getproducto($this->connexion,$lista_precio));
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($lista_precio->getproducto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$lista_precio->setproveedor($this->lista_precioDataAccess->getproveedor($this->connexion,$lista_precio));
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($lista_precio->getproveedor(),$isDeep,$deepLoadType,$clases);				
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
			$lista_precio->setempresa($this->lista_precioDataAccess->getempresa($this->connexion,$lista_precio));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($lista_precio->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_precio->setbodega($this->lista_precioDataAccess->getbodega($this->connexion,$lista_precio));
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepLoad($lista_precio->getbodega(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_precio->setproducto($this->lista_precioDataAccess->getproducto($this->connexion,$lista_precio));
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($lista_precio->getproducto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$lista_precio->setproveedor($this->lista_precioDataAccess->getproveedor($this->connexion,$lista_precio));
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($lista_precio->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(lista_precio $lista_precio,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//lista_precio_logic_add::updatelista_precioToSave($this->lista_precio);			
			
			if(!$paraDeleteCascade) {				
				lista_precio_data::save($lista_precio, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($lista_precio->getempresa(),$this->connexion);
		bodega_data::save($lista_precio->getbodega(),$this->connexion);
		producto_data::save($lista_precio->getproducto(),$this->connexion);
		proveedor_data::save($lista_precio->getproveedor(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($lista_precio->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($lista_precio->getbodega(),$this->connexion);
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($lista_precio->getproducto(),$this->connexion);
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($lista_precio->getproveedor(),$this->connexion);
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
			empresa_data::save($lista_precio->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($lista_precio->getbodega(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($lista_precio->getproducto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($lista_precio->getproveedor(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($lista_precio->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($lista_precio->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		bodega_data::save($lista_precio->getbodega(),$this->connexion);
		$bodegaLogic= new bodega_logic($this->connexion);
		$bodegaLogic->deepSave($lista_precio->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		producto_data::save($lista_precio->getproducto(),$this->connexion);
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepSave($lista_precio->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		proveedor_data::save($lista_precio->getproveedor(),$this->connexion);
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepSave($lista_precio->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($lista_precio->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($lista_precio->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==bodega::$class.'') {
				bodega_data::save($lista_precio->getbodega(),$this->connexion);
				$bodegaLogic= new bodega_logic($this->connexion);
				$bodegaLogic->deepSave($lista_precio->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==producto::$class.'') {
				producto_data::save($lista_precio->getproducto(),$this->connexion);
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepSave($lista_precio->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($lista_precio->getproveedor(),$this->connexion);
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepSave($lista_precio->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
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
			empresa_data::save($lista_precio->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($lista_precio->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==bodega::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			bodega_data::save($lista_precio->getbodega(),$this->connexion);
			$bodegaLogic= new bodega_logic($this->connexion);
			$bodegaLogic->deepSave($lista_precio->getbodega(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($lista_precio->getproducto(),$this->connexion);
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepSave($lista_precio->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($lista_precio->getproveedor(),$this->connexion);
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepSave($lista_precio->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				lista_precio_data::save($lista_precio, $this->connexion);
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
			
			$this->deepLoad($this->lista_precio,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->lista_precios as $lista_precio) {
				$this->deepLoad($lista_precio,$isDeep,$deepLoadType,$clases);
								
				lista_precio_util::refrescarFKDescripciones($this->lista_precios);
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
			
			foreach($this->lista_precios as $lista_precio) {
				$this->deepLoad($lista_precio,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->lista_precio,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->lista_precios as $lista_precio) {
				$this->deepSave($lista_precio,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->lista_precios as $lista_precio) {
				$this->deepSave($lista_precio,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(bodega::$class);
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(proveedor::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==bodega::$class) {
						$classes[]=new Classe(bodega::$class);
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
					if($clas->clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class);
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
					if($clas->clas==bodega::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(bodega::$class);
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
	
	
	
	
	
	
	
	public function getlista_precio() : ?lista_precio {	
		/*
		lista_precio_logic_add::checklista_precioToGet($this->lista_precio,$this->datosCliente);
		lista_precio_logic_add::updatelista_precioToGet($this->lista_precio);
		*/
			
		return $this->lista_precio;
	}
		
	public function setlista_precio(lista_precio $newlista_precio) {
		$this->lista_precio = $newlista_precio;
	}
	
	public function getlista_precios() : array {		
		/*
		lista_precio_logic_add::checklista_precioToGets($this->lista_precios,$this->datosCliente);
		
		foreach ($this->lista_precios as $lista_precioLocal ) {
			lista_precio_logic_add::updatelista_precioToGet($lista_precioLocal);
		}
		*/
		
		return $this->lista_precios;
	}
	
	public function setlista_precios(array $newlista_precios) {
		$this->lista_precios = $newlista_precios;
	}
	
	public function getlista_precioDataAccess() : lista_precio_data {
		return $this->lista_precioDataAccess;
	}
	
	public function setlista_precioDataAccess(lista_precio_data $newlista_precioDataAccess) {
		$this->lista_precioDataAccess = $newlista_precioDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        lista_precio_carga::$CONTROLLER;;        
		
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
