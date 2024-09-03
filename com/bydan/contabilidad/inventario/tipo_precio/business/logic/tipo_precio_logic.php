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

namespace com\bydan\contabilidad\inventario\tipo_precio\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\tipo_precio\util\tipo_precio_carga;
use com\bydan\contabilidad\inventario\tipo_precio\util\tipo_precio_param_return;

use com\bydan\contabilidad\inventario\tipo_precio\presentation\session\tipo_precio_session;

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

use com\bydan\contabilidad\inventario\tipo_precio\util\tipo_precio_util;
use com\bydan\contabilidad\inventario\tipo_precio\business\entity\tipo_precio;
use com\bydan\contabilidad\inventario\tipo_precio\business\data\tipo_precio_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\inventario\precio_producto\business\entity\precio_producto;
use com\bydan\contabilidad\inventario\precio_producto\business\data\precio_producto_data;
use com\bydan\contabilidad\inventario\precio_producto\business\logic\precio_producto_logic;
use com\bydan\contabilidad\inventario\precio_producto\util\precio_producto_carga;
use com\bydan\contabilidad\inventario\precio_producto\util\precio_producto_util;

//REL DETALLES




class tipo_precio_logic  extends GeneralEntityLogic implements tipo_precio_logicI {	
	/*GENERAL*/
	public tipo_precio_data $tipo_precioDataAccess;
	//public ?tipo_precio_logic_add $tipo_precioLogicAdditional=null;
	public ?tipo_precio $tipo_precio;
	public array $tipo_precios;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->tipo_precioDataAccess = new tipo_precio_data();			
			$this->tipo_precios = array();
			$this->tipo_precio = new tipo_precio();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->tipo_precioLogicAdditional = new tipo_precio_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->tipo_precioLogicAdditional==null) {
		//	$this->tipo_precioLogicAdditional=new tipo_precio_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->tipo_precioDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->tipo_precioDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->tipo_precioDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->tipo_precioDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_precios = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_precios=$this->tipo_precioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_precio_util::refrescarFKDescripciones($this->tipo_precios);
			}
			
			//tipo_precio_logic_add::checktipo_precioToGets($this->tipo_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_precios);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_precios = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_precios=$this->tipo_precioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_precio_util::refrescarFKDescripciones($this->tipo_precios);
			}
			
			//tipo_precio_logic_add::checktipo_precioToGets($this->tipo_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_precios);
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
		$this->tipo_precio = new tipo_precio();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->tipo_precio=$this->tipo_precioDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_precio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_precio_util::refrescarFKDescripcion($this->tipo_precio);
			}
						
			//tipo_precio_logic_add::checktipo_precioToGet($this->tipo_precio,$this->datosCliente);
			//tipo_precio_logic_add::updatetipo_precioToGet($this->tipo_precio);
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
		$this->tipo_precio = new  tipo_precio();
		  		  
        try {		
			$this->tipo_precio=$this->tipo_precioDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_precio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_precio_util::refrescarFKDescripcion($this->tipo_precio);
			}
			
			//tipo_precio_logic_add::checktipo_precioToGet($this->tipo_precio,$this->datosCliente);
			//tipo_precio_logic_add::updatetipo_precioToGet($this->tipo_precio);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?tipo_precio {
		$tipo_precioLogic = new  tipo_precio_logic();
		  		  
        try {		
			$tipo_precioLogic->setConnexion($connexion);			
			$tipo_precioLogic->getEntity($id);			
			return $tipo_precioLogic->gettipo_precio();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->tipo_precio = new  tipo_precio();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->tipo_precio=$this->tipo_precioDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_precio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_precio_util::refrescarFKDescripcion($this->tipo_precio);
			}
			
			//tipo_precio_logic_add::checktipo_precioToGet($this->tipo_precio,$this->datosCliente);
			//tipo_precio_logic_add::updatetipo_precioToGet($this->tipo_precio);
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
		$this->tipo_precio = new  tipo_precio();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_precio=$this->tipo_precioDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_precio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_precio_util::refrescarFKDescripcion($this->tipo_precio);
			}
			
			//tipo_precio_logic_add::checktipo_precioToGet($this->tipo_precio,$this->datosCliente);
			//tipo_precio_logic_add::updatetipo_precioToGet($this->tipo_precio);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?tipo_precio {
		$tipo_precioLogic = new  tipo_precio_logic();
		  		  
        try {		
			$tipo_precioLogic->setConnexion($connexion);			
			$tipo_precioLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $tipo_precioLogic->gettipo_precio();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_precios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_precios=$this->tipo_precioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_precio_util::refrescarFKDescripciones($this->tipo_precios);
			}
			
			//tipo_precio_logic_add::checktipo_precioToGets($this->tipo_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_precios);			
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
		$this->tipo_precios = array();
		  		  
        try {			
			$this->tipo_precios=$this->tipo_precioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_precio_util::refrescarFKDescripciones($this->tipo_precios);
			}
			
			//tipo_precio_logic_add::checktipo_precioToGets($this->tipo_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_precios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->tipo_precios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_precios=$this->tipo_precioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_precio_util::refrescarFKDescripciones($this->tipo_precios);
			}
			
			//tipo_precio_logic_add::checktipo_precioToGets($this->tipo_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_precios);
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
		$this->tipo_precios = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_precios=$this->tipo_precioDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_precio_util::refrescarFKDescripciones($this->tipo_precios);
			}
			
			//tipo_precio_logic_add::checktipo_precioToGets($this->tipo_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_precios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$tipo_precioLogic = new  tipo_precio_logic();
		  		  
        try {		
			$tipo_precioLogic->setConnexion($connexion);			
			$tipo_precioLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $tipo_precioLogic->gettipo_precios();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->tipo_precios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_precios=$this->tipo_precioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_precio_util::refrescarFKDescripciones($this->tipo_precios);
			}
			
			//tipo_precio_logic_add::checktipo_precioToGets($this->tipo_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_precios);
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
		$this->tipo_precios = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_precios=$this->tipo_precioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_precio_util::refrescarFKDescripciones($this->tipo_precios);
			}
			
			//tipo_precio_logic_add::checktipo_precioToGets($this->tipo_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_precios);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->tipo_precios = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_precios=$this->tipo_precioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_precio_util::refrescarFKDescripciones($this->tipo_precios);
			}
			
			//tipo_precio_logic_add::checktipo_precioToGets($this->tipo_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_precios);
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
		$this->tipo_precios = array();
		  		  
        try {			
			$this->tipo_precios=$this->tipo_precioDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_precio_util::refrescarFKDescripciones($this->tipo_precios);
			}	
			
			//tipo_precio_logic_add::checktipo_precioToGets($this->tipo_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_precios);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_precios = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_precios=$this->tipo_precioDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_precio_util::refrescarFKDescripciones($this->tipo_precios);
			}
			
			//tipo_precio_logic_add::checktipo_precioToGets($this->tipo_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_precios);
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
		$this->tipo_precios = array();
		  		  
        try {		
			$this->tipo_precios=$this->tipo_precioDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_precio_util::refrescarFKDescripciones($this->tipo_precios);
			}
			
			//tipo_precio_logic_add::checktipo_precioToGets($this->tipo_precios,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_precios);

		}  catch(Exception $e) {						
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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,tipo_precio_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->tipo_precios=$this->tipo_precioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				tipo_precio_util::refrescarFKDescripciones($this->tipo_precios);
			}
			//tipo_precio_logic_add::checktipo_precioToGets($this->tipo_precios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->tipo_precios);

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
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,tipo_precio_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->tipo_precios=$this->tipo_precioDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				tipo_precio_util::refrescarFKDescripciones($this->tipo_precios);
			}
			//tipo_precio_logic_add::checktipo_precioToGets($this->tipo_precios,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->tipo_precios);
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
						
			//tipo_precio_logic_add::checktipo_precioToSave($this->tipo_precio,$this->datosCliente,$this->connexion);	       
			//tipo_precio_logic_add::updatetipo_precioToSave($this->tipo_precio);			
			tipo_precio_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_precio,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->tipo_precioLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_precio,$this->datosCliente,$this->connexion);
			
			
			tipo_precio_data::save($this->tipo_precio, $this->connexion);	    	       	 				
			//tipo_precio_logic_add::checktipo_precioToSaveAfter($this->tipo_precio,$this->datosCliente,$this->connexion);			
			//$this->tipo_precioLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_precio,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_precio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_precio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_precio_util::refrescarFKDescripcion($this->tipo_precio);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->tipo_precio->getIsDeleted()) {
				$this->tipo_precio=null;
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
						
			/*tipo_precio_logic_add::checktipo_precioToSave($this->tipo_precio,$this->datosCliente,$this->connexion);*/	        
			//tipo_precio_logic_add::updatetipo_precioToSave($this->tipo_precio);			
			//$this->tipo_precioLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_precio,$this->datosCliente,$this->connexion);			
			tipo_precio_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_precio,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			tipo_precio_data::save($this->tipo_precio, $this->connexion);	    	       	 						
			/*tipo_precio_logic_add::checktipo_precioToSaveAfter($this->tipo_precio,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_precioLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_precio,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_precio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_precio,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_precio_util::refrescarFKDescripcion($this->tipo_precio);				
			}
			
			if($this->tipo_precio->getIsDeleted()) {
				$this->tipo_precio=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(tipo_precio $tipo_precio,Connexion $connexion)  {
		$tipo_precioLogic = new  tipo_precio_logic();		  		  
        try {		
			$tipo_precioLogic->setConnexion($connexion);			
			$tipo_precioLogic->settipo_precio($tipo_precio);			
			$tipo_precioLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*tipo_precio_logic_add::checktipo_precioToSaves($this->tipo_precios,$this->datosCliente,$this->connexion);*/	        	
			//$this->tipo_precioLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_precios,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_precios as $tipo_precioLocal) {				
								
				//tipo_precio_logic_add::updatetipo_precioToSave($tipo_precioLocal);	        	
				tipo_precio_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_precioLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				tipo_precio_data::save($tipo_precioLocal, $this->connexion);				
			}
			
			/*tipo_precio_logic_add::checktipo_precioToSavesAfter($this->tipo_precios,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_precioLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_precios,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_precio_util::refrescarFKDescripciones($this->tipo_precios);
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
			/*tipo_precio_logic_add::checktipo_precioToSaves($this->tipo_precios,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_precioLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_precios,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_precios as $tipo_precioLocal) {				
								
				//tipo_precio_logic_add::updatetipo_precioToSave($tipo_precioLocal);	        	
				tipo_precio_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_precioLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				tipo_precio_data::save($tipo_precioLocal, $this->connexion);				
			}			
			
			/*tipo_precio_logic_add::checktipo_precioToSavesAfter($this->tipo_precios,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_precioLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_precios,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_precio_util::refrescarFKDescripciones($this->tipo_precios);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $tipo_precios,Connexion $connexion)  {
		$tipo_precioLogic = new  tipo_precio_logic();
		  		  
        try {		
			$tipo_precioLogic->setConnexion($connexion);			
			$tipo_precioLogic->settipo_precios($tipo_precios);			
			$tipo_precioLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$tipo_preciosAux=array();
		
		foreach($this->tipo_precios as $tipo_precio) {
			if($tipo_precio->getIsDeleted()==false) {
				$tipo_preciosAux[]=$tipo_precio;
			}
		}
		
		$this->tipo_precios=$tipo_preciosAux;
	}
	
	public function updateToGetsAuxiliar(array &$tipo_precios) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->tipo_precios as $tipo_precio) {
				
				$tipo_precio->setid_empresa_Descripcion(tipo_precio_util::getempresaDescripcion($tipo_precio->getempresa()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$tipo_precio_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$tipo_precio_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$tipo_precio_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$tipo_precio_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$tipo_precio_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$tipo_precioForeignKey=new tipo_precio_param_return();//tipo_precioForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$tipo_precioForeignKey,$tipo_precio_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$tipo_precioForeignKey,$tipo_precio_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $tipo_precioForeignKey;
			
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
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$tipo_precioForeignKey,$tipo_precio_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$tipo_precioForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($tipo_precio_session==null) {
			$tipo_precio_session=new tipo_precio_session();
		}
		
		if($tipo_precio_session->bitBusquedaDesdeFKSesionempresa!=true) {
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
				if($tipo_precioForeignKey->idempresaDefaultFK==0) {
					$tipo_precioForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$tipo_precioForeignKey->empresasFK[$empresaLocal->getId()]=tipo_precio_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($tipo_precio_session->bigidempresaActual!=null && $tipo_precio_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($tipo_precio_session->bigidempresaActual);//WithConnection

				$tipo_precioForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=tipo_precio_util::getempresaDescripcion($empresaLogic->getempresa());
				$tipo_precioForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($tipo_precio,$clientes,$precioproductos) {
		$this->saveRelacionesBase($tipo_precio,$clientes,$precioproductos,true);
	}

	public function saveRelaciones($tipo_precio,$clientes,$precioproductos) {
		$this->saveRelacionesBase($tipo_precio,$clientes,$precioproductos,false);
	}

	public function saveRelacionesBase($tipo_precio,$clientes=array(),$precioproductos=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$tipo_precio->setclientes($clientes);
			$tipo_precio->setprecio_productos($precioproductos);
			$this->settipo_precio($tipo_precio);

			if(true) {

				//tipo_precio_logic_add::updateRelacionesToSave($tipo_precio,$this);

				if(($this->tipo_precio->getIsNew() || $this->tipo_precio->getIsChanged()) && !$this->tipo_precio->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($clientes,$precioproductos);

				} else if($this->tipo_precio->getIsDeleted()) {
					$this->saveRelacionesDetalles($clientes,$precioproductos);
					$this->save();
				}

				//tipo_precio_logic_add::updateRelacionesToSaveAfter($tipo_precio,$this);

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
	
	
	public function saveRelacionesDetalles($clientes=array(),$precioproductos=array()) {
		try {
	

			$idtipo_precioActual=$this->gettipo_precio()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cliente_carga.php');
			cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$clienteLogic_Desde_tipo_precio=new cliente_logic();
			$clienteLogic_Desde_tipo_precio->setclientes($clientes);

			$clienteLogic_Desde_tipo_precio->setConnexion($this->getConnexion());
			$clienteLogic_Desde_tipo_precio->setDatosCliente($this->datosCliente);

			foreach($clienteLogic_Desde_tipo_precio->getclientes() as $cliente_Desde_tipo_precio) {
				$cliente_Desde_tipo_precio->setid_tipo_precio($idtipo_precioActual);

				$clienteLogic_Desde_tipo_precio->setcliente($cliente_Desde_tipo_precio);
				$clienteLogic_Desde_tipo_precio->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/precio_producto_carga.php');
			precio_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$precioproductoLogic_Desde_tipo_precio=new precio_producto_logic();
			$precioproductoLogic_Desde_tipo_precio->setprecio_productos($precioproductos);

			$precioproductoLogic_Desde_tipo_precio->setConnexion($this->getConnexion());
			$precioproductoLogic_Desde_tipo_precio->setDatosCliente($this->datosCliente);

			foreach($precioproductoLogic_Desde_tipo_precio->getprecio_productos() as $precioproducto_Desde_tipo_precio) {
				$precioproducto_Desde_tipo_precio->setid_tipo_precio($idtipo_precioActual);
			}

			$precioproductoLogic_Desde_tipo_precio->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $tipo_precios,tipo_precio_param_return $tipo_precioParameterGeneral) : tipo_precio_param_return {
		$tipo_precioReturnGeneral=new tipo_precio_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $tipo_precioReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $tipo_precios,tipo_precio_param_return $tipo_precioParameterGeneral) : tipo_precio_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_precioReturnGeneral=new tipo_precio_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_precioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_precios,tipo_precio $tipo_precio,tipo_precio_param_return $tipo_precioParameterGeneral,bool $isEsNuevotipo_precio,array $clases) : tipo_precio_param_return {
		 try {	
			$tipo_precioReturnGeneral=new tipo_precio_param_return();
	
			$tipo_precioReturnGeneral->settipo_precio($tipo_precio);
			$tipo_precioReturnGeneral->settipo_precios($tipo_precios);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_precioReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $tipo_precioReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_precios,tipo_precio $tipo_precio,tipo_precio_param_return $tipo_precioParameterGeneral,bool $isEsNuevotipo_precio,array $clases) : tipo_precio_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_precioReturnGeneral=new tipo_precio_param_return();
	
			$tipo_precioReturnGeneral->settipo_precio($tipo_precio);
			$tipo_precioReturnGeneral->settipo_precios($tipo_precios);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_precioReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_precioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_precios,tipo_precio $tipo_precio,tipo_precio_param_return $tipo_precioParameterGeneral,bool $isEsNuevotipo_precio,array $clases) : tipo_precio_param_return {
		 try {	
			$tipo_precioReturnGeneral=new tipo_precio_param_return();
	
			$tipo_precioReturnGeneral->settipo_precio($tipo_precio);
			$tipo_precioReturnGeneral->settipo_precios($tipo_precios);
			
			
			
			return $tipo_precioReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_precios,tipo_precio $tipo_precio,tipo_precio_param_return $tipo_precioParameterGeneral,bool $isEsNuevotipo_precio,array $clases) : tipo_precio_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_precioReturnGeneral=new tipo_precio_param_return();
	
			$tipo_precioReturnGeneral->settipo_precio($tipo_precio);
			$tipo_precioReturnGeneral->settipo_precios($tipo_precios);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_precioReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,tipo_precio $tipo_precio,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,tipo_precio $tipo_precio,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		tipo_precio_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		tipo_precio_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(tipo_precio $tipo_precio,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_precio_logic_add::updatetipo_precioToGet($this->tipo_precio);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$tipo_precio->setempresa($this->tipo_precioDataAccess->getempresa($this->connexion,$tipo_precio));
		$tipo_precio->setclientes($this->tipo_precioDataAccess->getclientes($this->connexion,$tipo_precio));
		$tipo_precio->setprecio_productos($this->tipo_precioDataAccess->getprecio_productos($this->connexion,$tipo_precio));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$tipo_precio->setempresa($this->tipo_precioDataAccess->getempresa($this->connexion,$tipo_precio));
				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_precio->setclientes($this->tipo_precioDataAccess->getclientes($this->connexion,$tipo_precio));

				if($this->isConDeep) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->setclientes($tipo_precio->getclientes());
					$classesLocal=cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$clienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cliente_util::refrescarFKDescripciones($clienteLogic->getclientes());
					$tipo_precio->setclientes($clienteLogic->getclientes());
				}

				continue;
			}

			if($clas->clas==precio_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_precio->setprecio_productos($this->tipo_precioDataAccess->getprecio_productos($this->connexion,$tipo_precio));

				if($this->isConDeep) {
					$precioproductoLogic= new precio_producto_logic($this->connexion);
					$precioproductoLogic->setprecio_productos($tipo_precio->getprecio_productos());
					$classesLocal=precio_producto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$precioproductoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					precio_producto_util::refrescarFKDescripciones($precioproductoLogic->getprecio_productos());
					$tipo_precio->setprecio_productos($precioproductoLogic->getprecio_productos());
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
			$tipo_precio->setempresa($this->tipo_precioDataAccess->getempresa($this->connexion,$tipo_precio));
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
			$tipo_precio->setclientes($this->tipo_precioDataAccess->getclientes($this->connexion,$tipo_precio));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==precio_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(precio_producto::$class);
			$tipo_precio->setprecio_productos($this->tipo_precioDataAccess->getprecio_productos($this->connexion,$tipo_precio));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$tipo_precio->setempresa($this->tipo_precioDataAccess->getempresa($this->connexion,$tipo_precio));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($tipo_precio->getempresa(),$isDeep,$deepLoadType,$clases);
				

		$tipo_precio->setclientes($this->tipo_precioDataAccess->getclientes($this->connexion,$tipo_precio));

		foreach($tipo_precio->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
		}

		$tipo_precio->setprecio_productos($this->tipo_precioDataAccess->getprecio_productos($this->connexion,$tipo_precio));

		foreach($tipo_precio->getprecio_productos() as $precioproducto) {
			$precioproductoLogic= new precio_producto_logic($this->connexion);
			$precioproductoLogic->deepLoad($precioproducto,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$tipo_precio->setempresa($this->tipo_precioDataAccess->getempresa($this->connexion,$tipo_precio));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($tipo_precio->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_precio->setclientes($this->tipo_precioDataAccess->getclientes($this->connexion,$tipo_precio));

				foreach($tipo_precio->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==precio_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_precio->setprecio_productos($this->tipo_precioDataAccess->getprecio_productos($this->connexion,$tipo_precio));

				foreach($tipo_precio->getprecio_productos() as $precioproducto) {
					$precioproductoLogic= new precio_producto_logic($this->connexion);
					$precioproductoLogic->deepLoad($precioproducto,$isDeep,$deepLoadType,$clases);
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
			$tipo_precio->setempresa($this->tipo_precioDataAccess->getempresa($this->connexion,$tipo_precio));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($tipo_precio->getempresa(),$isDeep,$deepLoadType,$clases);
				
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
			$tipo_precio->setclientes($this->tipo_precioDataAccess->getclientes($this->connexion,$tipo_precio));

			foreach($tipo_precio->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==precio_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(precio_producto::$class);
			$tipo_precio->setprecio_productos($this->tipo_precioDataAccess->getprecio_productos($this->connexion,$tipo_precio));

			foreach($tipo_precio->getprecio_productos() as $precioproducto) {
				$precioproductoLogic= new precio_producto_logic($this->connexion);
				$precioproductoLogic->deepLoad($precioproducto,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(tipo_precio $tipo_precio,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_precio_logic_add::updatetipo_precioToSave($this->tipo_precio);			
			
			if(!$paraDeleteCascade) {				
				tipo_precio_data::save($tipo_precio, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($tipo_precio->getempresa(),$this->connexion);

		foreach($tipo_precio->getclientes() as $cliente) {
			$cliente->setid_tipo_precio($tipo_precio->getId());
			cliente_data::save($cliente,$this->connexion);
		}


		foreach($tipo_precio->getprecio_productos() as $precioproducto) {
			$precioproducto->setid_tipo_precio($tipo_precio->getId());
			precio_producto_data::save($precioproducto,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($tipo_precio->getempresa(),$this->connexion);
				continue;
			}


			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_precio->getclientes() as $cliente) {
					$cliente->setid_tipo_precio($tipo_precio->getId());
					cliente_data::save($cliente,$this->connexion);
				}

				continue;
			}

			if($clas->clas==precio_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_precio->getprecio_productos() as $precioproducto) {
					$precioproducto->setid_tipo_precio($tipo_precio->getId());
					precio_producto_data::save($precioproducto,$this->connexion);
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
			empresa_data::save($tipo_precio->getempresa(),$this->connexion);
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

			foreach($tipo_precio->getclientes() as $cliente) {
				$cliente->setid_tipo_precio($tipo_precio->getId());
				cliente_data::save($cliente,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==precio_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(precio_producto::$class);

			foreach($tipo_precio->getprecio_productos() as $precioproducto) {
				$precioproducto->setid_tipo_precio($tipo_precio->getId());
				precio_producto_data::save($precioproducto,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($tipo_precio->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($tipo_precio->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($tipo_precio->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$cliente->setid_tipo_precio($tipo_precio->getId());
			cliente_data::save($cliente,$this->connexion);
			$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($tipo_precio->getprecio_productos() as $precioproducto) {
			$precioproductoLogic= new precio_producto_logic($this->connexion);
			$precioproducto->setid_tipo_precio($tipo_precio->getId());
			precio_producto_data::save($precioproducto,$this->connexion);
			$precioproductoLogic->deepSave($precioproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($tipo_precio->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($tipo_precio->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_precio->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$cliente->setid_tipo_precio($tipo_precio->getId());
					cliente_data::save($cliente,$this->connexion);
					$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==precio_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_precio->getprecio_productos() as $precioproducto) {
					$precioproductoLogic= new precio_producto_logic($this->connexion);
					$precioproducto->setid_tipo_precio($tipo_precio->getId());
					precio_producto_data::save($precioproducto,$this->connexion);
					$precioproductoLogic->deepSave($precioproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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
			empresa_data::save($tipo_precio->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($tipo_precio->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
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

			foreach($tipo_precio->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$cliente->setid_tipo_precio($tipo_precio->getId());
				cliente_data::save($cliente,$this->connexion);
				$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==precio_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(precio_producto::$class);

			foreach($tipo_precio->getprecio_productos() as $precioproducto) {
				$precioproductoLogic= new precio_producto_logic($this->connexion);
				$precioproducto->setid_tipo_precio($tipo_precio->getId());
				precio_producto_data::save($precioproducto,$this->connexion);
				$precioproductoLogic->deepSave($precioproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				tipo_precio_data::save($tipo_precio, $this->connexion);
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
			
			$this->deepLoad($this->tipo_precio,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->tipo_precios as $tipo_precio) {
				$this->deepLoad($tipo_precio,$isDeep,$deepLoadType,$clases);
								
				tipo_precio_util::refrescarFKDescripciones($this->tipo_precios);
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
			
			foreach($this->tipo_precios as $tipo_precio) {
				$this->deepLoad($tipo_precio,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->tipo_precio,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->tipo_precios as $tipo_precio) {
				$this->deepSave($tipo_precio,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->tipo_precios as $tipo_precio) {
				$this->deepSave($tipo_precio,$isDeep,$deepLoadType,$clases,false);
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
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
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
				
				$classes[]=new Classe(cliente::$class);
				$classes[]=new Classe(precio_producto::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==precio_producto::$class) {
						$classes[]=new Classe(precio_producto::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

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
					if($clas->clas==precio_producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(precio_producto::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function gettipo_precio() : ?tipo_precio {	
		/*
		tipo_precio_logic_add::checktipo_precioToGet($this->tipo_precio,$this->datosCliente);
		tipo_precio_logic_add::updatetipo_precioToGet($this->tipo_precio);
		*/
			
		return $this->tipo_precio;
	}
		
	public function settipo_precio(tipo_precio $newtipo_precio) {
		$this->tipo_precio = $newtipo_precio;
	}
	
	public function gettipo_precios() : array {		
		/*
		tipo_precio_logic_add::checktipo_precioToGets($this->tipo_precios,$this->datosCliente);
		
		foreach ($this->tipo_precios as $tipo_precioLocal ) {
			tipo_precio_logic_add::updatetipo_precioToGet($tipo_precioLocal);
		}
		*/
		
		return $this->tipo_precios;
	}
	
	public function settipo_precios(array $newtipo_precios) {
		$this->tipo_precios = $newtipo_precios;
	}
	
	public function gettipo_precioDataAccess() : tipo_precio_data {
		return $this->tipo_precioDataAccess;
	}
	
	public function settipo_precioDataAccess(tipo_precio_data $newtipo_precioDataAccess) {
		$this->tipo_precioDataAccess = $newtipo_precioDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        tipo_precio_carga::$CONTROLLER;;        
		
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
