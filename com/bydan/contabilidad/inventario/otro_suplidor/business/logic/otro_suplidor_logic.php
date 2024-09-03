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

namespace com\bydan\contabilidad\inventario\otro_suplidor\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_carga;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_param_return;

use com\bydan\contabilidad\inventario\otro_suplidor\presentation\session\otro_suplidor_session;

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

use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_util;
use com\bydan\contabilidad\inventario\otro_suplidor\business\entity\otro_suplidor;
use com\bydan\contabilidad\inventario\otro_suplidor\business\data\otro_suplidor_data;

//FK


use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

//REL


use com\bydan\contabilidad\inventario\cotizacion_detalle\business\entity\cotizacion_detalle;
use com\bydan\contabilidad\inventario\cotizacion_detalle\business\data\cotizacion_detalle_data;
use com\bydan\contabilidad\inventario\cotizacion_detalle\business\logic\cotizacion_detalle_logic;
use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_carga;
use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_util;

use com\bydan\contabilidad\inventario\lista_producto\business\entity\lista_producto;
use com\bydan\contabilidad\inventario\lista_producto\business\data\lista_producto_data;
use com\bydan\contabilidad\inventario\lista_producto\business\logic\lista_producto_logic;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;

//REL DETALLES




class otro_suplidor_logic  extends GeneralEntityLogic implements otro_suplidor_logicI {	
	/*GENERAL*/
	public otro_suplidor_data $otro_suplidorDataAccess;
	//public ?otro_suplidor_logic_add $otro_suplidorLogicAdditional=null;
	public ?otro_suplidor $otro_suplidor;
	public array $otro_suplidors;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->otro_suplidorDataAccess = new otro_suplidor_data();			
			$this->otro_suplidors = array();
			$this->otro_suplidor = new otro_suplidor();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->otro_suplidorLogicAdditional = new otro_suplidor_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->otro_suplidorLogicAdditional==null) {
		//	$this->otro_suplidorLogicAdditional=new otro_suplidor_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->otro_suplidorDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->otro_suplidorDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->otro_suplidorDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->otro_suplidorDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->otro_suplidors = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_suplidors=$this->otro_suplidorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_suplidor_util::refrescarFKDescripciones($this->otro_suplidors);
			}
			
			//otro_suplidor_logic_add::checkotro_suplidorToGets($this->otro_suplidors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_suplidors);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->otro_suplidors = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_suplidors=$this->otro_suplidorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_suplidor_util::refrescarFKDescripciones($this->otro_suplidors);
			}
			
			//otro_suplidor_logic_add::checkotro_suplidorToGets($this->otro_suplidors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_suplidors);
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
		$this->otro_suplidor = new otro_suplidor();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->otro_suplidor=$this->otro_suplidorDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->otro_suplidor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				otro_suplidor_util::refrescarFKDescripcion($this->otro_suplidor);
			}
						
			//otro_suplidor_logic_add::checkotro_suplidorToGet($this->otro_suplidor,$this->datosCliente);
			//otro_suplidor_logic_add::updateotro_suplidorToGet($this->otro_suplidor);
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
		$this->otro_suplidor = new  otro_suplidor();
		  		  
        try {		
			$this->otro_suplidor=$this->otro_suplidorDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->otro_suplidor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				otro_suplidor_util::refrescarFKDescripcion($this->otro_suplidor);
			}
			
			//otro_suplidor_logic_add::checkotro_suplidorToGet($this->otro_suplidor,$this->datosCliente);
			//otro_suplidor_logic_add::updateotro_suplidorToGet($this->otro_suplidor);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?otro_suplidor {
		$otro_suplidorLogic = new  otro_suplidor_logic();
		  		  
        try {		
			$otro_suplidorLogic->setConnexion($connexion);			
			$otro_suplidorLogic->getEntity($id);			
			return $otro_suplidorLogic->getotro_suplidor();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->otro_suplidor = new  otro_suplidor();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->otro_suplidor=$this->otro_suplidorDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->otro_suplidor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				otro_suplidor_util::refrescarFKDescripcion($this->otro_suplidor);
			}
			
			//otro_suplidor_logic_add::checkotro_suplidorToGet($this->otro_suplidor,$this->datosCliente);
			//otro_suplidor_logic_add::updateotro_suplidorToGet($this->otro_suplidor);
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
		$this->otro_suplidor = new  otro_suplidor();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_suplidor=$this->otro_suplidorDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->otro_suplidor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				otro_suplidor_util::refrescarFKDescripcion($this->otro_suplidor);
			}
			
			//otro_suplidor_logic_add::checkotro_suplidorToGet($this->otro_suplidor,$this->datosCliente);
			//otro_suplidor_logic_add::updateotro_suplidorToGet($this->otro_suplidor);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?otro_suplidor {
		$otro_suplidorLogic = new  otro_suplidor_logic();
		  		  
        try {		
			$otro_suplidorLogic->setConnexion($connexion);			
			$otro_suplidorLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $otro_suplidorLogic->getotro_suplidor();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->otro_suplidors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->otro_suplidors=$this->otro_suplidorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_suplidor_util::refrescarFKDescripciones($this->otro_suplidors);
			}
			
			//otro_suplidor_logic_add::checkotro_suplidorToGets($this->otro_suplidors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_suplidors);			
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
		$this->otro_suplidors = array();
		  		  
        try {			
			$this->otro_suplidors=$this->otro_suplidorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_suplidor_util::refrescarFKDescripciones($this->otro_suplidors);
			}
			
			//otro_suplidor_logic_add::checkotro_suplidorToGets($this->otro_suplidors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_suplidors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->otro_suplidors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_suplidors=$this->otro_suplidorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_suplidor_util::refrescarFKDescripciones($this->otro_suplidors);
			}
			
			//otro_suplidor_logic_add::checkotro_suplidorToGets($this->otro_suplidors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_suplidors);
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
		$this->otro_suplidors = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_suplidors=$this->otro_suplidorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_suplidor_util::refrescarFKDescripciones($this->otro_suplidors);
			}
			
			//otro_suplidor_logic_add::checkotro_suplidorToGets($this->otro_suplidors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_suplidors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$otro_suplidorLogic = new  otro_suplidor_logic();
		  		  
        try {		
			$otro_suplidorLogic->setConnexion($connexion);			
			$otro_suplidorLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $otro_suplidorLogic->getotro_suplidors();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->otro_suplidors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->otro_suplidors=$this->otro_suplidorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_suplidor_util::refrescarFKDescripciones($this->otro_suplidors);
			}
			
			//otro_suplidor_logic_add::checkotro_suplidorToGets($this->otro_suplidors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_suplidors);
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
		$this->otro_suplidors = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_suplidors=$this->otro_suplidorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_suplidor_util::refrescarFKDescripciones($this->otro_suplidors);
			}
			
			//otro_suplidor_logic_add::checkotro_suplidorToGets($this->otro_suplidors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_suplidors);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->otro_suplidors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->otro_suplidors=$this->otro_suplidorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_suplidor_util::refrescarFKDescripciones($this->otro_suplidors);
			}
			
			//otro_suplidor_logic_add::checkotro_suplidorToGets($this->otro_suplidors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_suplidors);
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
		$this->otro_suplidors = array();
		  		  
        try {			
			$this->otro_suplidors=$this->otro_suplidorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_suplidor_util::refrescarFKDescripciones($this->otro_suplidors);
			}	
			
			//otro_suplidor_logic_add::checkotro_suplidorToGets($this->otro_suplidors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_suplidors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->otro_suplidors = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->otro_suplidors=$this->otro_suplidorDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_suplidor_util::refrescarFKDescripciones($this->otro_suplidors);
			}
			
			//otro_suplidor_logic_add::checkotro_suplidorToGets($this->otro_suplidors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_suplidors);
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
		$this->otro_suplidors = array();
		  		  
        try {		
			$this->otro_suplidors=$this->otro_suplidorDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_suplidor_util::refrescarFKDescripciones($this->otro_suplidors);
			}
			
			//otro_suplidor_logic_add::checkotro_suplidorToGets($this->otro_suplidors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->otro_suplidors);

		}  catch(Exception $e) {						
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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,otro_suplidor_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->otro_suplidors=$this->otro_suplidorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				otro_suplidor_util::refrescarFKDescripciones($this->otro_suplidors);
			}
			//otro_suplidor_logic_add::checkotro_suplidorToGets($this->otro_suplidors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->otro_suplidors);

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
			$parameterSelectionGeneralid_producto->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_producto,otro_suplidor_util::$ID_PRODUCTO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_producto);

			$this->otro_suplidors=$this->otro_suplidorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				otro_suplidor_util::refrescarFKDescripciones($this->otro_suplidors);
			}
			//otro_suplidor_logic_add::checkotro_suplidorToGets($this->otro_suplidors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->otro_suplidors);
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
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,otro_suplidor_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->otro_suplidors=$this->otro_suplidorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				otro_suplidor_util::refrescarFKDescripciones($this->otro_suplidors);
			}
			//otro_suplidor_logic_add::checkotro_suplidorToGets($this->otro_suplidors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->otro_suplidors);

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
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,otro_suplidor_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->otro_suplidors=$this->otro_suplidorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				otro_suplidor_util::refrescarFKDescripciones($this->otro_suplidors);
			}
			//otro_suplidor_logic_add::checkotro_suplidorToGets($this->otro_suplidors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->otro_suplidors);
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
						
			//otro_suplidor_logic_add::checkotro_suplidorToSave($this->otro_suplidor,$this->datosCliente,$this->connexion);	       
			//otro_suplidor_logic_add::updateotro_suplidorToSave($this->otro_suplidor);			
			otro_suplidor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->otro_suplidor,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->otro_suplidorLogicAdditional->checkGeneralEntityToSave($this,$this->otro_suplidor,$this->datosCliente,$this->connexion);
			
			
			otro_suplidor_data::save($this->otro_suplidor, $this->connexion);	    	       	 				
			//otro_suplidor_logic_add::checkotro_suplidorToSaveAfter($this->otro_suplidor,$this->datosCliente,$this->connexion);			
			//$this->otro_suplidorLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->otro_suplidor,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->otro_suplidor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->otro_suplidor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				otro_suplidor_util::refrescarFKDescripcion($this->otro_suplidor);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->otro_suplidor->getIsDeleted()) {
				$this->otro_suplidor=null;
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
						
			/*otro_suplidor_logic_add::checkotro_suplidorToSave($this->otro_suplidor,$this->datosCliente,$this->connexion);*/	        
			//otro_suplidor_logic_add::updateotro_suplidorToSave($this->otro_suplidor);			
			//$this->otro_suplidorLogicAdditional->checkGeneralEntityToSave($this,$this->otro_suplidor,$this->datosCliente,$this->connexion);			
			otro_suplidor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->otro_suplidor,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			otro_suplidor_data::save($this->otro_suplidor, $this->connexion);	    	       	 						
			/*otro_suplidor_logic_add::checkotro_suplidorToSaveAfter($this->otro_suplidor,$this->datosCliente,$this->connexion);*/			
			//$this->otro_suplidorLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->otro_suplidor,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->otro_suplidor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->otro_suplidor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				otro_suplidor_util::refrescarFKDescripcion($this->otro_suplidor);				
			}
			
			if($this->otro_suplidor->getIsDeleted()) {
				$this->otro_suplidor=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(otro_suplidor $otro_suplidor,Connexion $connexion)  {
		$otro_suplidorLogic = new  otro_suplidor_logic();		  		  
        try {		
			$otro_suplidorLogic->setConnexion($connexion);			
			$otro_suplidorLogic->setotro_suplidor($otro_suplidor);			
			$otro_suplidorLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*otro_suplidor_logic_add::checkotro_suplidorToSaves($this->otro_suplidors,$this->datosCliente,$this->connexion);*/	        	
			//$this->otro_suplidorLogicAdditional->checkGeneralEntitiesToSaves($this,$this->otro_suplidors,$this->datosCliente,$this->connexion);
			
	   		foreach($this->otro_suplidors as $otro_suplidorLocal) {				
								
				//otro_suplidor_logic_add::updateotro_suplidorToSave($otro_suplidorLocal);	        	
				otro_suplidor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$otro_suplidorLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				otro_suplidor_data::save($otro_suplidorLocal, $this->connexion);				
			}
			
			/*otro_suplidor_logic_add::checkotro_suplidorToSavesAfter($this->otro_suplidors,$this->datosCliente,$this->connexion);*/			
			//$this->otro_suplidorLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->otro_suplidors,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_suplidor_util::refrescarFKDescripciones($this->otro_suplidors);
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
			/*otro_suplidor_logic_add::checkotro_suplidorToSaves($this->otro_suplidors,$this->datosCliente,$this->connexion);*/			
			//$this->otro_suplidorLogicAdditional->checkGeneralEntitiesToSaves($this,$this->otro_suplidors,$this->datosCliente,$this->connexion);
			
	   		foreach($this->otro_suplidors as $otro_suplidorLocal) {				
								
				//otro_suplidor_logic_add::updateotro_suplidorToSave($otro_suplidorLocal);	        	
				otro_suplidor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$otro_suplidorLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				otro_suplidor_data::save($otro_suplidorLocal, $this->connexion);				
			}			
			
			/*otro_suplidor_logic_add::checkotro_suplidorToSavesAfter($this->otro_suplidors,$this->datosCliente,$this->connexion);*/			
			//$this->otro_suplidorLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->otro_suplidors,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				otro_suplidor_util::refrescarFKDescripciones($this->otro_suplidors);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $otro_suplidors,Connexion $connexion)  {
		$otro_suplidorLogic = new  otro_suplidor_logic();
		  		  
        try {		
			$otro_suplidorLogic->setConnexion($connexion);			
			$otro_suplidorLogic->setotro_suplidors($otro_suplidors);			
			$otro_suplidorLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$otro_suplidorsAux=array();
		
		foreach($this->otro_suplidors as $otro_suplidor) {
			if($otro_suplidor->getIsDeleted()==false) {
				$otro_suplidorsAux[]=$otro_suplidor;
			}
		}
		
		$this->otro_suplidors=$otro_suplidorsAux;
	}
	
	public function updateToGetsAuxiliar(array &$otro_suplidors) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->otro_suplidors as $otro_suplidor) {
				
				$otro_suplidor->setid_producto_Descripcion(otro_suplidor_util::getproductoDescripcion($otro_suplidor->getproducto()));
				$otro_suplidor->setid_proveedor_Descripcion(otro_suplidor_util::getproveedorDescripcion($otro_suplidor->getproveedor()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$otro_suplidor_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$otro_suplidor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$otro_suplidor_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$otro_suplidor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$otro_suplidor_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$otro_suplidorForeignKey=new otro_suplidor_param_return();//otro_suplidorForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$strRecargarFkTipos,',')) {
				$this->cargarCombosproductosFK($this->connexion,$strRecargarFkQuery,$otro_suplidorForeignKey,$otro_suplidor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosproveedorsFK($this->connexion,$strRecargarFkQuery,$otro_suplidorForeignKey,$otro_suplidor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_producto',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproductosFK($this->connexion,' where id=-1 ',$otro_suplidorForeignKey,$otro_suplidor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproveedorsFK($this->connexion,' where id=-1 ',$otro_suplidorForeignKey,$otro_suplidor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $otro_suplidorForeignKey;
			
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
	
	
	public function cargarCombosproductosFK($connexion=null,$strRecargarFkQuery='',$otro_suplidorForeignKey,$otro_suplidor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$otro_suplidorForeignKey->productosFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($otro_suplidor_session==null) {
			$otro_suplidor_session=new otro_suplidor_session();
		}
		
		if($otro_suplidor_session->bitBusquedaDesdeFKSesionproducto!=true) {
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
				if($otro_suplidorForeignKey->idproductoDefaultFK==0) {
					$otro_suplidorForeignKey->idproductoDefaultFK=$productoLocal->getId();
				}

				$otro_suplidorForeignKey->productosFK[$productoLocal->getId()]=otro_suplidor_util::getproductoDescripcion($productoLocal);
			}

		} else {

			if($otro_suplidor_session->bigidproductoActual!=null && $otro_suplidor_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($otro_suplidor_session->bigidproductoActual);//WithConnection

				$otro_suplidorForeignKey->productosFK[$productoLogic->getproducto()->getId()]=otro_suplidor_util::getproductoDescripcion($productoLogic->getproducto());
				$otro_suplidorForeignKey->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	public function cargarCombosproveedorsFK($connexion=null,$strRecargarFkQuery='',$otro_suplidorForeignKey,$otro_suplidor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$proveedorLogic= new proveedor_logic();
		$pagination= new Pagination();
		$otro_suplidorForeignKey->proveedorsFK=array();

		$proveedorLogic->setConnexion($connexion);
		$proveedorLogic->getproveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($otro_suplidor_session==null) {
			$otro_suplidor_session=new otro_suplidor_session();
		}
		
		if($otro_suplidor_session->bitBusquedaDesdeFKSesionproveedor!=true) {
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
				if($otro_suplidorForeignKey->idproveedorDefaultFK==0) {
					$otro_suplidorForeignKey->idproveedorDefaultFK=$proveedorLocal->getId();
				}

				$otro_suplidorForeignKey->proveedorsFK[$proveedorLocal->getId()]=otro_suplidor_util::getproveedorDescripcion($proveedorLocal);
			}

		} else {

			if($otro_suplidor_session->bigidproveedorActual!=null && $otro_suplidor_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($otro_suplidor_session->bigidproveedorActual);//WithConnection

				$otro_suplidorForeignKey->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=otro_suplidor_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$otro_suplidorForeignKey->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($otro_suplidor,$cotizaciondetalles,$listaproductos) {
		$this->saveRelacionesBase($otro_suplidor,$cotizaciondetalles,$listaproductos,true);
	}

	public function saveRelaciones($otro_suplidor,$cotizaciondetalles,$listaproductos) {
		$this->saveRelacionesBase($otro_suplidor,$cotizaciondetalles,$listaproductos,false);
	}

	public function saveRelacionesBase($otro_suplidor,$cotizaciondetalles=array(),$listaproductos=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$otro_suplidor->setcotizacion_detalles($cotizaciondetalles);
			$otro_suplidor->setlista_productos($listaproductos);
			$this->setotro_suplidor($otro_suplidor);

			if(true) {

				//otro_suplidor_logic_add::updateRelacionesToSave($otro_suplidor,$this);

				if(($this->otro_suplidor->getIsNew() || $this->otro_suplidor->getIsChanged()) && !$this->otro_suplidor->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($cotizaciondetalles,$listaproductos);

				} else if($this->otro_suplidor->getIsDeleted()) {
					$this->saveRelacionesDetalles($cotizaciondetalles,$listaproductos);
					$this->save();
				}

				//otro_suplidor_logic_add::updateRelacionesToSaveAfter($otro_suplidor,$this);

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
	
	
	public function saveRelacionesDetalles($cotizaciondetalles=array(),$listaproductos=array()) {
		try {
	

			$idotro_suplidorActual=$this->getotro_suplidor()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/cotizacion_detalle_carga.php');
			cotizacion_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cotizaciondetalleLogic_Desde_otro_suplidor=new cotizacion_detalle_logic();
			$cotizaciondetalleLogic_Desde_otro_suplidor->setcotizacion_detalles($cotizaciondetalles);

			$cotizaciondetalleLogic_Desde_otro_suplidor->setConnexion($this->getConnexion());
			$cotizaciondetalleLogic_Desde_otro_suplidor->setDatosCliente($this->datosCliente);

			foreach($cotizaciondetalleLogic_Desde_otro_suplidor->getcotizacion_detalles() as $cotizaciondetalle_Desde_otro_suplidor) {
				$cotizaciondetalle_Desde_otro_suplidor->setid_otro_suplidor($idotro_suplidorActual);
			}

			$cotizaciondetalleLogic_Desde_otro_suplidor->saves();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/util/lista_producto_carga.php');
			lista_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$listaproductoLogic_Desde_otro_suplidor=new lista_producto_logic();
			$listaproductoLogic_Desde_otro_suplidor->setlista_productos($listaproductos);

			$listaproductoLogic_Desde_otro_suplidor->setConnexion($this->getConnexion());
			$listaproductoLogic_Desde_otro_suplidor->setDatosCliente($this->datosCliente);

			foreach($listaproductoLogic_Desde_otro_suplidor->getlista_productos() as $listaproducto_Desde_otro_suplidor) {
				$listaproducto_Desde_otro_suplidor->setid_otro_suplidor($idotro_suplidorActual);
			}

			$listaproductoLogic_Desde_otro_suplidor->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $otro_suplidors,otro_suplidor_param_return $otro_suplidorParameterGeneral) : otro_suplidor_param_return {
		$otro_suplidorReturnGeneral=new otro_suplidor_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $otro_suplidorReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $otro_suplidors,otro_suplidor_param_return $otro_suplidorParameterGeneral) : otro_suplidor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$otro_suplidorReturnGeneral=new otro_suplidor_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $otro_suplidorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $otro_suplidors,otro_suplidor $otro_suplidor,otro_suplidor_param_return $otro_suplidorParameterGeneral,bool $isEsNuevootro_suplidor,array $clases) : otro_suplidor_param_return {
		 try {	
			$otro_suplidorReturnGeneral=new otro_suplidor_param_return();
	
			$otro_suplidorReturnGeneral->setotro_suplidor($otro_suplidor);
			$otro_suplidorReturnGeneral->setotro_suplidors($otro_suplidors);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$otro_suplidorReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $otro_suplidorReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $otro_suplidors,otro_suplidor $otro_suplidor,otro_suplidor_param_return $otro_suplidorParameterGeneral,bool $isEsNuevootro_suplidor,array $clases) : otro_suplidor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$otro_suplidorReturnGeneral=new otro_suplidor_param_return();
	
			$otro_suplidorReturnGeneral->setotro_suplidor($otro_suplidor);
			$otro_suplidorReturnGeneral->setotro_suplidors($otro_suplidors);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$otro_suplidorReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $otro_suplidorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $otro_suplidors,otro_suplidor $otro_suplidor,otro_suplidor_param_return $otro_suplidorParameterGeneral,bool $isEsNuevootro_suplidor,array $clases) : otro_suplidor_param_return {
		 try {	
			$otro_suplidorReturnGeneral=new otro_suplidor_param_return();
	
			$otro_suplidorReturnGeneral->setotro_suplidor($otro_suplidor);
			$otro_suplidorReturnGeneral->setotro_suplidors($otro_suplidors);
			
			
			
			return $otro_suplidorReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $otro_suplidors,otro_suplidor $otro_suplidor,otro_suplidor_param_return $otro_suplidorParameterGeneral,bool $isEsNuevootro_suplidor,array $clases) : otro_suplidor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$otro_suplidorReturnGeneral=new otro_suplidor_param_return();
	
			$otro_suplidorReturnGeneral->setotro_suplidor($otro_suplidor);
			$otro_suplidorReturnGeneral->setotro_suplidors($otro_suplidors);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $otro_suplidorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,otro_suplidor $otro_suplidor,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,otro_suplidor $otro_suplidor,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		otro_suplidor_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		otro_suplidor_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(otro_suplidor $otro_suplidor,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//otro_suplidor_logic_add::updateotro_suplidorToGet($this->otro_suplidor);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$otro_suplidor->setproducto($this->otro_suplidorDataAccess->getproducto($this->connexion,$otro_suplidor));
		$otro_suplidor->setproveedor($this->otro_suplidorDataAccess->getproveedor($this->connexion,$otro_suplidor));
		$otro_suplidor->setcotizacion_detalles($this->otro_suplidorDataAccess->getcotizacion_detalles($this->connexion,$otro_suplidor));
		$otro_suplidor->setlista_productos($this->otro_suplidorDataAccess->getlista_productos($this->connexion,$otro_suplidor));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$otro_suplidor->setproducto($this->otro_suplidorDataAccess->getproducto($this->connexion,$otro_suplidor));
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$otro_suplidor->setproveedor($this->otro_suplidorDataAccess->getproveedor($this->connexion,$otro_suplidor));
				continue;
			}

			if($clas->clas==cotizacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$otro_suplidor->setcotizacion_detalles($this->otro_suplidorDataAccess->getcotizacion_detalles($this->connexion,$otro_suplidor));

				if($this->isConDeep) {
					$cotizaciondetalleLogic= new cotizacion_detalle_logic($this->connexion);
					$cotizaciondetalleLogic->setcotizacion_detalles($otro_suplidor->getcotizacion_detalles());
					$classesLocal=cotizacion_detalle_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cotizaciondetalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cotizacion_detalle_util::refrescarFKDescripciones($cotizaciondetalleLogic->getcotizacion_detalles());
					$otro_suplidor->setcotizacion_detalles($cotizaciondetalleLogic->getcotizacion_detalles());
				}

				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$otro_suplidor->setlista_productos($this->otro_suplidorDataAccess->getlista_productos($this->connexion,$otro_suplidor));

				if($this->isConDeep) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproductoLogic->setlista_productos($otro_suplidor->getlista_productos());
					$classesLocal=lista_producto_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$listaproductoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					lista_producto_util::refrescarFKDescripciones($listaproductoLogic->getlista_productos());
					$otro_suplidor->setlista_productos($listaproductoLogic->getlista_productos());
				}

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
			$otro_suplidor->setproducto($this->otro_suplidorDataAccess->getproducto($this->connexion,$otro_suplidor));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$otro_suplidor->setproveedor($this->otro_suplidorDataAccess->getproveedor($this->connexion,$otro_suplidor));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cotizacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cotizacion_detalle::$class);
			$otro_suplidor->setcotizacion_detalles($this->otro_suplidorDataAccess->getcotizacion_detalles($this->connexion,$otro_suplidor));
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
			$otro_suplidor->setlista_productos($this->otro_suplidorDataAccess->getlista_productos($this->connexion,$otro_suplidor));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$otro_suplidor->setproducto($this->otro_suplidorDataAccess->getproducto($this->connexion,$otro_suplidor));
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepLoad($otro_suplidor->getproducto(),$isDeep,$deepLoadType,$clases);
				
		$otro_suplidor->setproveedor($this->otro_suplidorDataAccess->getproveedor($this->connexion,$otro_suplidor));
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepLoad($otro_suplidor->getproveedor(),$isDeep,$deepLoadType,$clases);
				

		$otro_suplidor->setcotizacion_detalles($this->otro_suplidorDataAccess->getcotizacion_detalles($this->connexion,$otro_suplidor));

		foreach($otro_suplidor->getcotizacion_detalles() as $cotizaciondetalle) {
			$cotizaciondetalleLogic= new cotizacion_detalle_logic($this->connexion);
			$cotizaciondetalleLogic->deepLoad($cotizaciondetalle,$isDeep,$deepLoadType,$clases);
		}

		$otro_suplidor->setlista_productos($this->otro_suplidorDataAccess->getlista_productos($this->connexion,$otro_suplidor));

		foreach($otro_suplidor->getlista_productos() as $listaproducto) {
			$listaproductoLogic= new lista_producto_logic($this->connexion);
			$listaproductoLogic->deepLoad($listaproducto,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				$otro_suplidor->setproducto($this->otro_suplidorDataAccess->getproducto($this->connexion,$otro_suplidor));
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepLoad($otro_suplidor->getproducto(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				$otro_suplidor->setproveedor($this->otro_suplidorDataAccess->getproveedor($this->connexion,$otro_suplidor));
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($otro_suplidor->getproveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cotizacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$otro_suplidor->setcotizacion_detalles($this->otro_suplidorDataAccess->getcotizacion_detalles($this->connexion,$otro_suplidor));

				foreach($otro_suplidor->getcotizacion_detalles() as $cotizaciondetalle) {
					$cotizaciondetalleLogic= new cotizacion_detalle_logic($this->connexion);
					$cotizaciondetalleLogic->deepLoad($cotizaciondetalle,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$otro_suplidor->setlista_productos($this->otro_suplidorDataAccess->getlista_productos($this->connexion,$otro_suplidor));

				foreach($otro_suplidor->getlista_productos() as $listaproducto) {
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
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$otro_suplidor->setproducto($this->otro_suplidorDataAccess->getproducto($this->connexion,$otro_suplidor));
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepLoad($otro_suplidor->getproducto(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$otro_suplidor->setproveedor($this->otro_suplidorDataAccess->getproveedor($this->connexion,$otro_suplidor));
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($otro_suplidor->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cotizacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cotizacion_detalle::$class);
			$otro_suplidor->setcotizacion_detalles($this->otro_suplidorDataAccess->getcotizacion_detalles($this->connexion,$otro_suplidor));

			foreach($otro_suplidor->getcotizacion_detalles() as $cotizaciondetalle) {
				$cotizaciondetalleLogic= new cotizacion_detalle_logic($this->connexion);
				$cotizaciondetalleLogic->deepLoad($cotizaciondetalle,$isDeep,$deepLoadType,$clases);
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
			$otro_suplidor->setlista_productos($this->otro_suplidorDataAccess->getlista_productos($this->connexion,$otro_suplidor));

			foreach($otro_suplidor->getlista_productos() as $listaproducto) {
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
	
	public function deepSave(otro_suplidor $otro_suplidor,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//otro_suplidor_logic_add::updateotro_suplidorToSave($this->otro_suplidor);			
			
			if(!$paraDeleteCascade) {				
				otro_suplidor_data::save($otro_suplidor, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		producto_data::save($otro_suplidor->getproducto(),$this->connexion);
		proveedor_data::save($otro_suplidor->getproveedor(),$this->connexion);

		foreach($otro_suplidor->getcotizacion_detalles() as $cotizaciondetalle) {
			$cotizaciondetalle->setid_otro_suplidor($otro_suplidor->getId());
			cotizacion_detalle_data::save($cotizaciondetalle,$this->connexion);
		}


		foreach($otro_suplidor->getlista_productos() as $listaproducto) {
			$listaproducto->setid_otro_suplidor($otro_suplidor->getId());
			lista_producto_data::save($listaproducto,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				producto_data::save($otro_suplidor->getproducto(),$this->connexion);
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($otro_suplidor->getproveedor(),$this->connexion);
				continue;
			}


			if($clas->clas==cotizacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($otro_suplidor->getcotizacion_detalles() as $cotizaciondetalle) {
					$cotizaciondetalle->setid_otro_suplidor($otro_suplidor->getId());
					cotizacion_detalle_data::save($cotizaciondetalle,$this->connexion);
				}

				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($otro_suplidor->getlista_productos() as $listaproducto) {
					$listaproducto->setid_otro_suplidor($otro_suplidor->getId());
					lista_producto_data::save($listaproducto,$this->connexion);
				}

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
			producto_data::save($otro_suplidor->getproducto(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($otro_suplidor->getproveedor(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cotizacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cotizacion_detalle::$class);

			foreach($otro_suplidor->getcotizacion_detalles() as $cotizaciondetalle) {
				$cotizaciondetalle->setid_otro_suplidor($otro_suplidor->getId());
				cotizacion_detalle_data::save($cotizaciondetalle,$this->connexion);
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

			foreach($otro_suplidor->getlista_productos() as $listaproducto) {
				$listaproducto->setid_otro_suplidor($otro_suplidor->getId());
				lista_producto_data::save($listaproducto,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		producto_data::save($otro_suplidor->getproducto(),$this->connexion);
		$productoLogic= new producto_logic($this->connexion);
		$productoLogic->deepSave($otro_suplidor->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		proveedor_data::save($otro_suplidor->getproveedor(),$this->connexion);
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepSave($otro_suplidor->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($otro_suplidor->getcotizacion_detalles() as $cotizaciondetalle) {
			$cotizaciondetalleLogic= new cotizacion_detalle_logic($this->connexion);
			$cotizaciondetalle->setid_otro_suplidor($otro_suplidor->getId());
			cotizacion_detalle_data::save($cotizaciondetalle,$this->connexion);
			$cotizaciondetalleLogic->deepSave($cotizaciondetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($otro_suplidor->getlista_productos() as $listaproducto) {
			$listaproductoLogic= new lista_producto_logic($this->connexion);
			$listaproducto->setid_otro_suplidor($otro_suplidor->getId());
			lista_producto_data::save($listaproducto,$this->connexion);
			$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==producto::$class.'') {
				producto_data::save($otro_suplidor->getproducto(),$this->connexion);
				$productoLogic= new producto_logic($this->connexion);
				$productoLogic->deepSave($otro_suplidor->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($otro_suplidor->getproveedor(),$this->connexion);
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepSave($otro_suplidor->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==cotizacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($otro_suplidor->getcotizacion_detalles() as $cotizaciondetalle) {
					$cotizaciondetalleLogic= new cotizacion_detalle_logic($this->connexion);
					$cotizaciondetalle->setid_otro_suplidor($otro_suplidor->getId());
					cotizacion_detalle_data::save($cotizaciondetalle,$this->connexion);
					$cotizaciondetalleLogic->deepSave($cotizaciondetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==lista_producto::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($otro_suplidor->getlista_productos() as $listaproducto) {
					$listaproductoLogic= new lista_producto_logic($this->connexion);
					$listaproducto->setid_otro_suplidor($otro_suplidor->getId());
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
			if($clas->clas==producto::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			producto_data::save($otro_suplidor->getproducto(),$this->connexion);
			$productoLogic= new producto_logic($this->connexion);
			$productoLogic->deepSave($otro_suplidor->getproducto(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($otro_suplidor->getproveedor(),$this->connexion);
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepSave($otro_suplidor->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cotizacion_detalle::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cotizacion_detalle::$class);

			foreach($otro_suplidor->getcotizacion_detalles() as $cotizaciondetalle) {
				$cotizaciondetalleLogic= new cotizacion_detalle_logic($this->connexion);
				$cotizaciondetalle->setid_otro_suplidor($otro_suplidor->getId());
				cotizacion_detalle_data::save($cotizaciondetalle,$this->connexion);
				$cotizaciondetalleLogic->deepSave($cotizaciondetalle,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($otro_suplidor->getlista_productos() as $listaproducto) {
				$listaproductoLogic= new lista_producto_logic($this->connexion);
				$listaproducto->setid_otro_suplidor($otro_suplidor->getId());
				lista_producto_data::save($listaproducto,$this->connexion);
				$listaproductoLogic->deepSave($listaproducto,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				otro_suplidor_data::save($otro_suplidor, $this->connexion);
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
			
			$this->deepLoad($this->otro_suplidor,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->otro_suplidors as $otro_suplidor) {
				$this->deepLoad($otro_suplidor,$isDeep,$deepLoadType,$clases);
								
				otro_suplidor_util::refrescarFKDescripciones($this->otro_suplidors);
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
			
			foreach($this->otro_suplidors as $otro_suplidor) {
				$this->deepLoad($otro_suplidor,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->otro_suplidor,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->otro_suplidors as $otro_suplidor) {
				$this->deepSave($otro_suplidor,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->otro_suplidors as $otro_suplidor) {
				$this->deepSave($otro_suplidor,$isDeep,$deepLoadType,$clases,false);
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
				$classes[]=new Classe(proveedor::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
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
				
				$classes[]=new Classe(cotizacion_detalle::$class);
				$classes[]=new Classe(lista_producto::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==cotizacion_detalle::$class) {
						$classes[]=new Classe(cotizacion_detalle::$class);
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
					if($clas->clas==cotizacion_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cotizacion_detalle::$class);
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
	
	
	
	
	
	
	
	public function getotro_suplidor() : ?otro_suplidor {	
		/*
		otro_suplidor_logic_add::checkotro_suplidorToGet($this->otro_suplidor,$this->datosCliente);
		otro_suplidor_logic_add::updateotro_suplidorToGet($this->otro_suplidor);
		*/
			
		return $this->otro_suplidor;
	}
		
	public function setotro_suplidor(otro_suplidor $newotro_suplidor) {
		$this->otro_suplidor = $newotro_suplidor;
	}
	
	public function getotro_suplidors() : array {		
		/*
		otro_suplidor_logic_add::checkotro_suplidorToGets($this->otro_suplidors,$this->datosCliente);
		
		foreach ($this->otro_suplidors as $otro_suplidorLocal ) {
			otro_suplidor_logic_add::updateotro_suplidorToGet($otro_suplidorLocal);
		}
		*/
		
		return $this->otro_suplidors;
	}
	
	public function setotro_suplidors(array $newotro_suplidors) {
		$this->otro_suplidors = $newotro_suplidors;
	}
	
	public function getotro_suplidorDataAccess() : otro_suplidor_data {
		return $this->otro_suplidorDataAccess;
	}
	
	public function setotro_suplidorDataAccess(otro_suplidor_data $newotro_suplidorDataAccess) {
		$this->otro_suplidorDataAccess = $newotro_suplidorDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        otro_suplidor_carga::$CONTROLLER;;        
		
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
