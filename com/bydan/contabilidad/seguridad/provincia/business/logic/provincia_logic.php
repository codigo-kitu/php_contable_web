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

namespace com\bydan\contabilidad\seguridad\provincia\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\provincia\util\provincia_carga;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_param_return;

use com\bydan\contabilidad\seguridad\provincia\presentation\session\provincia_session;

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

use com\bydan\contabilidad\seguridad\provincia\util\provincia_util;
use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;
use com\bydan\contabilidad\seguridad\provincia\business\data\provincia_data;

//FK


use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\business\data\pais_data;
use com\bydan\contabilidad\seguridad\pais\business\logic\pais_logic;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;

//REL


use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;
use com\bydan\contabilidad\seguridad\ciudad\business\data\ciudad_data;
use com\bydan\contabilidad\seguridad\ciudad\business\logic\ciudad_logic;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_carga;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\seguridad\dato_general_usuario\business\entity\dato_general_usuario;
use com\bydan\contabilidad\seguridad\dato_general_usuario\business\data\dato_general_usuario_data;
use com\bydan\contabilidad\seguridad\dato_general_usuario\business\logic\dato_general_usuario_logic;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_carga;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_util;

//REL DETALLES

use com\bydan\contabilidad\general\sucursal\util\sucursal_carga;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;



class provincia_logic  extends GeneralEntityLogic implements provincia_logicI {	
	/*GENERAL*/
	public provincia_data $provinciaDataAccess;
	//public ?provincia_logic_add $provinciaLogicAdditional=null;
	public ?provincia $provincia;
	public array $provincias;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->provinciaDataAccess = new provincia_data();			
			$this->provincias = array();
			$this->provincia = new provincia();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->provinciaLogicAdditional = new provincia_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->provinciaLogicAdditional==null) {
		//	$this->provinciaLogicAdditional=new provincia_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->provinciaDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->provinciaDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->provinciaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->provinciaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->provincias = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->provincias=$this->provinciaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				provincia_util::refrescarFKDescripciones($this->provincias);
			}
			
			//provincia_logic_add::checkprovinciaToGets($this->provincias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->provincias);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->provincias = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->provincias=$this->provinciaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				provincia_util::refrescarFKDescripciones($this->provincias);
			}
			
			//provincia_logic_add::checkprovinciaToGets($this->provincias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->provincias);
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
		$this->provincia = new provincia();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->provincia=$this->provinciaDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->provincia,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				provincia_util::refrescarFKDescripcion($this->provincia);
			}
						
			//provincia_logic_add::checkprovinciaToGet($this->provincia,$this->datosCliente);
			//provincia_logic_add::updateprovinciaToGet($this->provincia);
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
		$this->provincia = new  provincia();
		  		  
        try {		
			$this->provincia=$this->provinciaDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->provincia,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				provincia_util::refrescarFKDescripcion($this->provincia);
			}
			
			//provincia_logic_add::checkprovinciaToGet($this->provincia,$this->datosCliente);
			//provincia_logic_add::updateprovinciaToGet($this->provincia);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?provincia {
		$provinciaLogic = new  provincia_logic();
		  		  
        try {		
			$provinciaLogic->setConnexion($connexion);			
			$provinciaLogic->getEntity($id);			
			return $provinciaLogic->getprovincia();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->provincia = new  provincia();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->provincia=$this->provinciaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->provincia,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				provincia_util::refrescarFKDescripcion($this->provincia);
			}
			
			//provincia_logic_add::checkprovinciaToGet($this->provincia,$this->datosCliente);
			//provincia_logic_add::updateprovinciaToGet($this->provincia);
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
		$this->provincia = new  provincia();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->provincia=$this->provinciaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->provincia,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				provincia_util::refrescarFKDescripcion($this->provincia);
			}
			
			//provincia_logic_add::checkprovinciaToGet($this->provincia,$this->datosCliente);
			//provincia_logic_add::updateprovinciaToGet($this->provincia);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?provincia {
		$provinciaLogic = new  provincia_logic();
		  		  
        try {		
			$provinciaLogic->setConnexion($connexion);			
			$provinciaLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $provinciaLogic->getprovincia();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->provincias = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->provincias=$this->provinciaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				provincia_util::refrescarFKDescripciones($this->provincias);
			}
			
			//provincia_logic_add::checkprovinciaToGets($this->provincias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->provincias);			
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
		$this->provincias = array();
		  		  
        try {			
			$this->provincias=$this->provinciaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				provincia_util::refrescarFKDescripciones($this->provincias);
			}
			
			//provincia_logic_add::checkprovinciaToGets($this->provincias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->provincias);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->provincias = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->provincias=$this->provinciaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				provincia_util::refrescarFKDescripciones($this->provincias);
			}
			
			//provincia_logic_add::checkprovinciaToGets($this->provincias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->provincias);
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
		$this->provincias = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->provincias=$this->provinciaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				provincia_util::refrescarFKDescripciones($this->provincias);
			}
			
			//provincia_logic_add::checkprovinciaToGets($this->provincias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->provincias);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$provinciaLogic = new  provincia_logic();
		  		  
        try {		
			$provinciaLogic->setConnexion($connexion);			
			$provinciaLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $provinciaLogic->getprovincias();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->provincias = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->provincias=$this->provinciaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				provincia_util::refrescarFKDescripciones($this->provincias);
			}
			
			//provincia_logic_add::checkprovinciaToGets($this->provincias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->provincias);
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
		$this->provincias = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->provincias=$this->provinciaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				provincia_util::refrescarFKDescripciones($this->provincias);
			}
			
			//provincia_logic_add::checkprovinciaToGets($this->provincias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->provincias);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->provincias = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->provincias=$this->provinciaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				provincia_util::refrescarFKDescripciones($this->provincias);
			}
			
			//provincia_logic_add::checkprovinciaToGets($this->provincias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->provincias);
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
		$this->provincias = array();
		  		  
        try {			
			$this->provincias=$this->provinciaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				provincia_util::refrescarFKDescripciones($this->provincias);
			}	
			
			//provincia_logic_add::checkprovinciaToGets($this->provincias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->provincias);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->provincias = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->provincias=$this->provinciaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				provincia_util::refrescarFKDescripciones($this->provincias);
			}
			
			//provincia_logic_add::checkprovinciaToGets($this->provincias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->provincias);
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
		$this->provincias = array();
		  		  
        try {		
			$this->provincias=$this->provinciaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				provincia_util::refrescarFKDescripciones($this->provincias);
			}
			
			//provincia_logic_add::checkprovinciaToGets($this->provincias,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->provincias);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsBusquedaPorcodigoWithConnection(string $strFinalQuery,Pagination $pagination,string $codigo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralcodigo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralcodigo->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$codigo."%",provincia_util::$CODIGO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralcodigo);

			$this->provincias=$this->provinciaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				provincia_util::refrescarFKDescripciones($this->provincias);
			}
			//provincia_logic_add::checkprovinciaToGets($this->provincias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->provincias);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPorcodigo(string $strFinalQuery,Pagination $pagination,string $codigo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralcodigo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralcodigo->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$codigo."%",provincia_util::$CODIGO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralcodigo);

			$this->provincias=$this->provinciaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				provincia_util::refrescarFKDescripciones($this->provincias);
			}
			//provincia_logic_add::checkprovinciaToGets($this->provincias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->provincias);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsBusquedaPornombreWithConnection(string $strFinalQuery,Pagination $pagination,string $nombre) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralnombre= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre."%",provincia_util::$NOMBRE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre);

			$this->provincias=$this->provinciaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				provincia_util::refrescarFKDescripciones($this->provincias);
			}
			//provincia_logic_add::checkprovinciaToGets($this->provincias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->provincias);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsBusquedaPornombre(string $strFinalQuery,Pagination $pagination,string $nombre) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralnombre= new ParameterSelectionGeneral();
			$parameterSelectionGeneralnombre->setParameterSelectionGeneralLike(ParameterType::$STRING,"%".$nombre."%",provincia_util::$NOMBRE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralnombre);

			$this->provincias=$this->provinciaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				provincia_util::refrescarFKDescripciones($this->provincias);
			}
			//provincia_logic_add::checkprovinciaToGets($this->provincias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->provincias);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdpaisWithConnection(string $strFinalQuery,Pagination $pagination,int $id_pais) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_pais= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_pais->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_pais,provincia_util::$ID_PAIS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_pais);

			$this->provincias=$this->provinciaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				provincia_util::refrescarFKDescripciones($this->provincias);
			}
			//provincia_logic_add::checkprovinciaToGets($this->provincias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->provincias);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idpais(string $strFinalQuery,Pagination $pagination,int $id_pais) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_pais= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_pais->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_pais,provincia_util::$ID_PAIS,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_pais);

			$this->provincias=$this->provinciaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				provincia_util::refrescarFKDescripciones($this->provincias);
			}
			//provincia_logic_add::checkprovinciaToGets($this->provincias,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->provincias);
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
						
			//provincia_logic_add::checkprovinciaToSave($this->provincia,$this->datosCliente,$this->connexion);	       
			//provincia_logic_add::updateprovinciaToSave($this->provincia);			
			provincia_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->provincia,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->provinciaLogicAdditional->checkGeneralEntityToSave($this,$this->provincia,$this->datosCliente,$this->connexion);
			
			
			provincia_data::save($this->provincia, $this->connexion);	    	       	 				
			//provincia_logic_add::checkprovinciaToSaveAfter($this->provincia,$this->datosCliente,$this->connexion);			
			//$this->provinciaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->provincia,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->provincia,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->provincia,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				provincia_util::refrescarFKDescripcion($this->provincia);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->provincia->getIsDeleted()) {
				$this->provincia=null;
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
						
			/*provincia_logic_add::checkprovinciaToSave($this->provincia,$this->datosCliente,$this->connexion);*/	        
			//provincia_logic_add::updateprovinciaToSave($this->provincia);			
			//$this->provinciaLogicAdditional->checkGeneralEntityToSave($this,$this->provincia,$this->datosCliente,$this->connexion);			
			provincia_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->provincia,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			provincia_data::save($this->provincia, $this->connexion);	    	       	 						
			/*provincia_logic_add::checkprovinciaToSaveAfter($this->provincia,$this->datosCliente,$this->connexion);*/			
			//$this->provinciaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->provincia,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->provincia,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->provincia,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				provincia_util::refrescarFKDescripcion($this->provincia);				
			}
			
			if($this->provincia->getIsDeleted()) {
				$this->provincia=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(provincia $provincia,Connexion $connexion)  {
		$provinciaLogic = new  provincia_logic();		  		  
        try {		
			$provinciaLogic->setConnexion($connexion);			
			$provinciaLogic->setprovincia($provincia);			
			$provinciaLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*provincia_logic_add::checkprovinciaToSaves($this->provincias,$this->datosCliente,$this->connexion);*/	        	
			//$this->provinciaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->provincias,$this->datosCliente,$this->connexion);
			
	   		foreach($this->provincias as $provinciaLocal) {				
								
				//provincia_logic_add::updateprovinciaToSave($provinciaLocal);	        	
				provincia_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$provinciaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				provincia_data::save($provinciaLocal, $this->connexion);				
			}
			
			/*provincia_logic_add::checkprovinciaToSavesAfter($this->provincias,$this->datosCliente,$this->connexion);*/			
			//$this->provinciaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->provincias,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				provincia_util::refrescarFKDescripciones($this->provincias);
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
			/*provincia_logic_add::checkprovinciaToSaves($this->provincias,$this->datosCliente,$this->connexion);*/			
			//$this->provinciaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->provincias,$this->datosCliente,$this->connexion);
			
	   		foreach($this->provincias as $provinciaLocal) {				
								
				//provincia_logic_add::updateprovinciaToSave($provinciaLocal);	        	
				provincia_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$provinciaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				provincia_data::save($provinciaLocal, $this->connexion);				
			}			
			
			/*provincia_logic_add::checkprovinciaToSavesAfter($this->provincias,$this->datosCliente,$this->connexion);*/			
			//$this->provinciaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->provincias,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				provincia_util::refrescarFKDescripciones($this->provincias);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $provincias,Connexion $connexion)  {
		$provinciaLogic = new  provincia_logic();
		  		  
        try {		
			$provinciaLogic->setConnexion($connexion);			
			$provinciaLogic->setprovincias($provincias);			
			$provinciaLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$provinciasAux=array();
		
		foreach($this->provincias as $provincia) {
			if($provincia->getIsDeleted()==false) {
				$provinciasAux[]=$provincia;
			}
		}
		
		$this->provincias=$provinciasAux;
	}
	
	public function updateToGetsAuxiliar(array &$provincias) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->provincias as $provincia) {
				
				$provincia->setid_pais_Descripcion(provincia_util::getpaisDescripcion($provincia->getpais()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$provincia_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$provincia_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$provincia_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$provincia_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$provincia_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$provinciaForeignKey=new provincia_param_return();//provinciaForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_pais',$strRecargarFkTipos,',')) {
				$this->cargarCombospaissFK($this->connexion,$strRecargarFkQuery,$provinciaForeignKey,$provincia_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_pais',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombospaissFK($this->connexion,' where id=-1 ',$provinciaForeignKey,$provincia_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $provinciaForeignKey;
			
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
	
	
	public function cargarCombospaissFK($connexion=null,$strRecargarFkQuery='',$provinciaForeignKey,$provincia_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$paisLogic= new pais_logic();
		$pagination= new Pagination();
		$provinciaForeignKey->paissFK=array();

		$paisLogic->setConnexion($connexion);
		$paisLogic->getpaisDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($provincia_session==null) {
			$provincia_session=new provincia_session();
		}
		
		if($provincia_session->bitBusquedaDesdeFKSesionpais!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=pais_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalpais=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalpais=Funciones::GetFinalQueryAppend($finalQueryGlobalpais, '');
				$finalQueryGlobalpais.=pais_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalpais.$strRecargarFkQuery;		

				$paisLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($paisLogic->getpaiss() as $paisLocal ) {
				if($provinciaForeignKey->idpaisDefaultFK==0) {
					$provinciaForeignKey->idpaisDefaultFK=$paisLocal->getId();
				}

				$provinciaForeignKey->paissFK[$paisLocal->getId()]=provincia_util::getpaisDescripcion($paisLocal);
			}

		} else {

			if($provincia_session->bigidpaisActual!=null && $provincia_session->bigidpaisActual > 0) {
				$paisLogic->getEntity($provincia_session->bigidpaisActual);//WithConnection

				$provinciaForeignKey->paissFK[$paisLogic->getpais()->getId()]=provincia_util::getpaisDescripcion($paisLogic->getpais());
				$provinciaForeignKey->idpaisDefaultFK=$paisLogic->getpais()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($provincia,$ciudads,$proveedors,$clientes,$datogeneralusuarios) {
		$this->saveRelacionesBase($provincia,$ciudads,$proveedors,$clientes,$datogeneralusuarios,true);
	}

	public function saveRelaciones($provincia,$ciudads,$proveedors,$clientes,$datogeneralusuarios) {
		$this->saveRelacionesBase($provincia,$ciudads,$proveedors,$clientes,$datogeneralusuarios,false);
	}

	public function saveRelacionesBase($provincia,$ciudads=array(),$proveedors=array(),$clientes=array(),$datogeneralusuarios=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$provincia->setciudads($ciudads);
			$provincia->setproveedors($proveedors);
			$provincia->setclientes($clientes);
			$provincia->setdato_general_usuarios($datogeneralusuarios);
			$this->setprovincia($provincia);

			if(true) {

				//provincia_logic_add::updateRelacionesToSave($provincia,$this);

				if(($this->provincia->getIsNew() || $this->provincia->getIsChanged()) && !$this->provincia->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($ciudads,$proveedors,$clientes,$datogeneralusuarios);

				} else if($this->provincia->getIsDeleted()) {
					$this->saveRelacionesDetalles($ciudads,$proveedors,$clientes,$datogeneralusuarios);
					$this->save();
				}

				//provincia_logic_add::updateRelacionesToSaveAfter($provincia,$this);

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
	
	
	public function saveRelacionesDetalles($ciudads=array(),$proveedors=array(),$clientes=array(),$datogeneralusuarios=array()) {
		try {
	

			$idprovinciaActual=$this->getprovincia()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/ciudad_carga.php');
			ciudad_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$ciudadLogic_Desde_provincia=new ciudad_logic();
			$ciudadLogic_Desde_provincia->setciudads($ciudads);

			$ciudadLogic_Desde_provincia->setConnexion($this->getConnexion());
			$ciudadLogic_Desde_provincia->setDatosCliente($this->datosCliente);

			foreach($ciudadLogic_Desde_provincia->getciudads() as $ciudad_Desde_provincia) {
				$ciudad_Desde_provincia->setid_provincia($idprovinciaActual);

				$ciudadLogic_Desde_provincia->setciudad($ciudad_Desde_provincia);
				$ciudadLogic_Desde_provincia->save();

				$idciudadActual=$ciudad_Desde_provincia->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/proveedor_carga.php');
				proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$proveedorLogic_Desde_ciudad=new proveedor_logic();

				if($ciudad_Desde_provincia->getproveedors()==null){
					$ciudad_Desde_provincia->setproveedors(array());
				}

				$proveedorLogic_Desde_ciudad->setproveedors($ciudad_Desde_provincia->getproveedors());

				$proveedorLogic_Desde_ciudad->setConnexion($this->getConnexion());
				$proveedorLogic_Desde_ciudad->setDatosCliente($this->datosCliente);

				foreach($proveedorLogic_Desde_ciudad->getproveedors() as $proveedor_Desde_ciudad) {
					$proveedor_Desde_ciudad->setid_ciudad($idciudadActual);

					$proveedorLogic_Desde_ciudad->setproveedor($proveedor_Desde_ciudad);
					$proveedorLogic_Desde_ciudad->save();
				}


				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cliente_carga.php');
				cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$clienteLogic_Desde_ciudad=new cliente_logic();

				if($ciudad_Desde_provincia->getclientes()==null){
					$ciudad_Desde_provincia->setclientes(array());
				}

				$clienteLogic_Desde_ciudad->setclientes($ciudad_Desde_provincia->getclientes());

				$clienteLogic_Desde_ciudad->setConnexion($this->getConnexion());
				$clienteLogic_Desde_ciudad->setDatosCliente($this->datosCliente);

				foreach($clienteLogic_Desde_ciudad->getclientes() as $cliente_Desde_ciudad) {
					$cliente_Desde_ciudad->setid_ciudad($idciudadActual);

					$clienteLogic_Desde_ciudad->setcliente($cliente_Desde_ciudad);
					$clienteLogic_Desde_ciudad->save();
				}


				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/dato_general_usuario_carga.php');
				dato_general_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$datogeneralusuarioLogic_Desde_ciudad=new dato_general_usuario_logic();

				if($ciudad_Desde_provincia->getdato_general_usuarios()==null){
					$ciudad_Desde_provincia->setdato_general_usuarios(array());
				}

				$datogeneralusuarioLogic_Desde_ciudad->setdato_general_usuarios($ciudad_Desde_provincia->getdato_general_usuarios());

				$datogeneralusuarioLogic_Desde_ciudad->setConnexion($this->getConnexion());
				$datogeneralusuarioLogic_Desde_ciudad->setDatosCliente($this->datosCliente);

				foreach($datogeneralusuarioLogic_Desde_ciudad->getdato_general_usuarios() as $datogeneralusuario_Desde_ciudad) {
					$datogeneralusuario_Desde_ciudad->setid_ciudad($idciudadActual);
				}

				$datogeneralusuarioLogic_Desde_ciudad->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/util/sucursal_carga.php');
				sucursal_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$sucursalLogic_Desde_ciudad=new sucursal_logic();

				if($ciudad_Desde_provincia->getsucursals()==null){
					$ciudad_Desde_provincia->setsucursals(array());
				}

				$sucursalLogic_Desde_ciudad->setsucursals($ciudad_Desde_provincia->getsucursals());

				$sucursalLogic_Desde_ciudad->setConnexion($this->getConnexion());
				$sucursalLogic_Desde_ciudad->setDatosCliente($this->datosCliente);

				foreach($sucursalLogic_Desde_ciudad->getsucursals() as $sucursal_Desde_ciudad) {
					$sucursal_Desde_ciudad->setid_ciudad($idciudadActual);
				}

				$sucursalLogic_Desde_ciudad->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/util/empresa_carga.php');
				empresa_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$empresaLogic_Desde_ciudad=new empresa_logic();

				if($ciudad_Desde_provincia->getempresas()==null){
					$ciudad_Desde_provincia->setempresas(array());
				}

				$empresaLogic_Desde_ciudad->setempresas($ciudad_Desde_provincia->getempresas());

				$empresaLogic_Desde_ciudad->setConnexion($this->getConnexion());
				$empresaLogic_Desde_ciudad->setDatosCliente($this->datosCliente);

				foreach($empresaLogic_Desde_ciudad->getempresas() as $empresa_Desde_ciudad) {
					$empresa_Desde_ciudad->setid_ciudad($idciudadActual);
				}

				$empresaLogic_Desde_ciudad->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/util/proveedor_carga.php');
			proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$proveedorLogic_Desde_provincia=new proveedor_logic();
			$proveedorLogic_Desde_provincia->setproveedors($proveedors);

			$proveedorLogic_Desde_provincia->setConnexion($this->getConnexion());
			$proveedorLogic_Desde_provincia->setDatosCliente($this->datosCliente);

			foreach($proveedorLogic_Desde_provincia->getproveedors() as $proveedor_Desde_provincia) {
				$proveedor_Desde_provincia->setid_provincia($idprovinciaActual);

				$proveedorLogic_Desde_provincia->setproveedor($proveedor_Desde_provincia);
				$proveedorLogic_Desde_provincia->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/util/cliente_carga.php');
			cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$clienteLogic_Desde_provincia=new cliente_logic();
			$clienteLogic_Desde_provincia->setclientes($clientes);

			$clienteLogic_Desde_provincia->setConnexion($this->getConnexion());
			$clienteLogic_Desde_provincia->setDatosCliente($this->datosCliente);

			foreach($clienteLogic_Desde_provincia->getclientes() as $cliente_Desde_provincia) {
				$cliente_Desde_provincia->setid_provincia($idprovinciaActual);

				$clienteLogic_Desde_provincia->setcliente($cliente_Desde_provincia);
				$clienteLogic_Desde_provincia->save();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/dato_general_usuario_carga.php');
			dato_general_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$datogeneralusuarioLogic_Desde_provincia=new dato_general_usuario_logic();
			$datogeneralusuarioLogic_Desde_provincia->setdato_general_usuarios($datogeneralusuarios);

			$datogeneralusuarioLogic_Desde_provincia->setConnexion($this->getConnexion());
			$datogeneralusuarioLogic_Desde_provincia->setDatosCliente($this->datosCliente);

			foreach($datogeneralusuarioLogic_Desde_provincia->getdato_general_usuarios() as $datogeneralusuario_Desde_provincia) {
				$datogeneralusuario_Desde_provincia->setid_provincia($idprovinciaActual);
			}

			$datogeneralusuarioLogic_Desde_provincia->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $provincias,provincia_param_return $provinciaParameterGeneral) : provincia_param_return {
		$provinciaReturnGeneral=new provincia_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $provinciaReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $provincias,provincia_param_return $provinciaParameterGeneral) : provincia_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$provinciaReturnGeneral=new provincia_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $provinciaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $provincias,provincia $provincia,provincia_param_return $provinciaParameterGeneral,bool $isEsNuevoprovincia,array $clases) : provincia_param_return {
		 try {	
			$provinciaReturnGeneral=new provincia_param_return();
	
			$provinciaReturnGeneral->setprovincia($provincia);
			$provinciaReturnGeneral->setprovincias($provincias);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$provinciaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $provinciaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $provincias,provincia $provincia,provincia_param_return $provinciaParameterGeneral,bool $isEsNuevoprovincia,array $clases) : provincia_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$provinciaReturnGeneral=new provincia_param_return();
	
			$provinciaReturnGeneral->setprovincia($provincia);
			$provinciaReturnGeneral->setprovincias($provincias);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$provinciaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $provinciaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $provincias,provincia $provincia,provincia_param_return $provinciaParameterGeneral,bool $isEsNuevoprovincia,array $clases) : provincia_param_return {
		 try {	
			$provinciaReturnGeneral=new provincia_param_return();
	
			$provinciaReturnGeneral->setprovincia($provincia);
			$provinciaReturnGeneral->setprovincias($provincias);
			
			
			
			return $provinciaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $provincias,provincia $provincia,provincia_param_return $provinciaParameterGeneral,bool $isEsNuevoprovincia,array $clases) : provincia_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$provinciaReturnGeneral=new provincia_param_return();
	
			$provinciaReturnGeneral->setprovincia($provincia);
			$provinciaReturnGeneral->setprovincias($provincias);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $provinciaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,provincia $provincia,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,provincia $provincia,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		provincia_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		provincia_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(provincia $provincia,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//provincia_logic_add::updateprovinciaToGet($this->provincia);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$provincia->setpais($this->provinciaDataAccess->getpais($this->connexion,$provincia));
		$provincia->setciudads($this->provinciaDataAccess->getciudads($this->connexion,$provincia));
		$provincia->setproveedors($this->provinciaDataAccess->getproveedors($this->connexion,$provincia));
		$provincia->setclientes($this->provinciaDataAccess->getclientes($this->connexion,$provincia));
		$provincia->setdato_general_usuarios($this->provinciaDataAccess->getdato_general_usuarios($this->connexion,$provincia));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$provincia->setpais($this->provinciaDataAccess->getpais($this->connexion,$provincia));
				continue;
			}

			if($clas->clas==ciudad::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$provincia->setciudads($this->provinciaDataAccess->getciudads($this->connexion,$provincia));

				if($this->isConDeep) {
					$ciudadLogic= new ciudad_logic($this->connexion);
					$ciudadLogic->setciudads($provincia->getciudads());
					$classesLocal=ciudad_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$ciudadLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					ciudad_util::refrescarFKDescripciones($ciudadLogic->getciudads());
					$provincia->setciudads($ciudadLogic->getciudads());
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$provincia->setproveedors($this->provinciaDataAccess->getproveedors($this->connexion,$provincia));

				if($this->isConDeep) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->setproveedors($provincia->getproveedors());
					$classesLocal=proveedor_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					proveedor_util::refrescarFKDescripciones($proveedorLogic->getproveedors());
					$provincia->setproveedors($proveedorLogic->getproveedors());
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$provincia->setclientes($this->provinciaDataAccess->getclientes($this->connexion,$provincia));

				if($this->isConDeep) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->setclientes($provincia->getclientes());
					$classesLocal=cliente_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$clienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cliente_util::refrescarFKDescripciones($clienteLogic->getclientes());
					$provincia->setclientes($clienteLogic->getclientes());
				}

				continue;
			}

			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$provincia->setdato_general_usuarios($this->provinciaDataAccess->getdato_general_usuarios($this->connexion,$provincia));

				if($this->isConDeep) {
					$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
					$datogeneralusuarioLogic->setdato_general_usuarios($provincia->getdato_general_usuarios());
					$classesLocal=dato_general_usuario_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$datogeneralusuarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					dato_general_usuario_util::refrescarFKDescripciones($datogeneralusuarioLogic->getdato_general_usuarios());
					$provincia->setdato_general_usuarios($datogeneralusuarioLogic->getdato_general_usuarios());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$provincia->setpais($this->provinciaDataAccess->getpais($this->connexion,$provincia));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(ciudad::$class);
			$provincia->setciudads($this->provinciaDataAccess->getciudads($this->connexion,$provincia));
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
			$provincia->setproveedors($this->provinciaDataAccess->getproveedors($this->connexion,$provincia));
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
			$provincia->setclientes($this->provinciaDataAccess->getclientes($this->connexion,$provincia));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(dato_general_usuario::$class);
			$provincia->setdato_general_usuarios($this->provinciaDataAccess->getdato_general_usuarios($this->connexion,$provincia));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$provincia->setpais($this->provinciaDataAccess->getpais($this->connexion,$provincia));
		$paisLogic= new pais_logic($this->connexion);
		$paisLogic->deepLoad($provincia->getpais(),$isDeep,$deepLoadType,$clases);
				

		$provincia->setciudads($this->provinciaDataAccess->getciudads($this->connexion,$provincia));

		foreach($provincia->getciudads() as $ciudad) {
			$ciudadLogic= new ciudad_logic($this->connexion);
			$ciudadLogic->deepLoad($ciudad,$isDeep,$deepLoadType,$clases);
		}

		$provincia->setproveedors($this->provinciaDataAccess->getproveedors($this->connexion,$provincia));

		foreach($provincia->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
		}

		$provincia->setclientes($this->provinciaDataAccess->getclientes($this->connexion,$provincia));

		foreach($provincia->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
		}

		$provincia->setdato_general_usuarios($this->provinciaDataAccess->getdato_general_usuarios($this->connexion,$provincia));

		foreach($provincia->getdato_general_usuarios() as $datogeneralusuario) {
			$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
			$datogeneralusuarioLogic->deepLoad($datogeneralusuario,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$provincia->setpais($this->provinciaDataAccess->getpais($this->connexion,$provincia));
				$paisLogic= new pais_logic($this->connexion);
				$paisLogic->deepLoad($provincia->getpais(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ciudad::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$provincia->setciudads($this->provinciaDataAccess->getciudads($this->connexion,$provincia));

				foreach($provincia->getciudads() as $ciudad) {
					$ciudadLogic= new ciudad_logic($this->connexion);
					$ciudadLogic->deepLoad($ciudad,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$provincia->setproveedors($this->provinciaDataAccess->getproveedors($this->connexion,$provincia));

				foreach($provincia->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$provincia->setclientes($this->provinciaDataAccess->getclientes($this->connexion,$provincia));

				foreach($provincia->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$provincia->setdato_general_usuarios($this->provinciaDataAccess->getdato_general_usuarios($this->connexion,$provincia));

				foreach($provincia->getdato_general_usuarios() as $datogeneralusuario) {
					$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
					$datogeneralusuarioLogic->deepLoad($datogeneralusuario,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$provincia->setpais($this->provinciaDataAccess->getpais($this->connexion,$provincia));
			$paisLogic= new pais_logic($this->connexion);
			$paisLogic->deepLoad($provincia->getpais(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(ciudad::$class);
			$provincia->setciudads($this->provinciaDataAccess->getciudads($this->connexion,$provincia));

			foreach($provincia->getciudads() as $ciudad) {
				$ciudadLogic= new ciudad_logic($this->connexion);
				$ciudadLogic->deepLoad($ciudad,$isDeep,$deepLoadType,$clases);
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
			$provincia->setproveedors($this->provinciaDataAccess->getproveedors($this->connexion,$provincia));

			foreach($provincia->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($proveedor,$isDeep,$deepLoadType,$clases);
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
			$provincia->setclientes($this->provinciaDataAccess->getclientes($this->connexion,$provincia));

			foreach($provincia->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$clienteLogic->deepLoad($cliente,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(dato_general_usuario::$class);
			$provincia->setdato_general_usuarios($this->provinciaDataAccess->getdato_general_usuarios($this->connexion,$provincia));

			foreach($provincia->getdato_general_usuarios() as $datogeneralusuario) {
				$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
				$datogeneralusuarioLogic->deepLoad($datogeneralusuario,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(provincia $provincia,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//provincia_logic_add::updateprovinciaToSave($this->provincia);			
			
			if(!$paraDeleteCascade) {				
				provincia_data::save($provincia, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		pais_data::save($provincia->getpais(),$this->connexion);

		foreach($provincia->getciudads() as $ciudad) {
			$ciudad->setid_provincia($provincia->getId());
			ciudad_data::save($ciudad,$this->connexion);
		}


		foreach($provincia->getproveedors() as $proveedor) {
			$proveedor->setid_provincia($provincia->getId());
			proveedor_data::save($proveedor,$this->connexion);
		}


		foreach($provincia->getclientes() as $cliente) {
			$cliente->setid_provincia($provincia->getId());
			cliente_data::save($cliente,$this->connexion);
		}


		foreach($provincia->getdato_general_usuarios() as $datogeneralusuario) {
			$datogeneralusuario->setid_provincia($provincia->getId());
			dato_general_usuario_data::save($datogeneralusuario,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				pais_data::save($provincia->getpais(),$this->connexion);
				continue;
			}


			if($clas->clas==ciudad::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($provincia->getciudads() as $ciudad) {
					$ciudad->setid_provincia($provincia->getId());
					ciudad_data::save($ciudad,$this->connexion);
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($provincia->getproveedors() as $proveedor) {
					$proveedor->setid_provincia($provincia->getId());
					proveedor_data::save($proveedor,$this->connexion);
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($provincia->getclientes() as $cliente) {
					$cliente->setid_provincia($provincia->getId());
					cliente_data::save($cliente,$this->connexion);
				}

				continue;
			}

			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($provincia->getdato_general_usuarios() as $datogeneralusuario) {
					$datogeneralusuario->setid_provincia($provincia->getId());
					dato_general_usuario_data::save($datogeneralusuario,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			pais_data::save($provincia->getpais(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(ciudad::$class);

			foreach($provincia->getciudads() as $ciudad) {
				$ciudad->setid_provincia($provincia->getId());
				ciudad_data::save($ciudad,$this->connexion);
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

			foreach($provincia->getproveedors() as $proveedor) {
				$proveedor->setid_provincia($provincia->getId());
				proveedor_data::save($proveedor,$this->connexion);
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

			foreach($provincia->getclientes() as $cliente) {
				$cliente->setid_provincia($provincia->getId());
				cliente_data::save($cliente,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(dato_general_usuario::$class);

			foreach($provincia->getdato_general_usuarios() as $datogeneralusuario) {
				$datogeneralusuario->setid_provincia($provincia->getId());
				dato_general_usuario_data::save($datogeneralusuario,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		pais_data::save($provincia->getpais(),$this->connexion);
		$paisLogic= new pais_logic($this->connexion);
		$paisLogic->deepSave($provincia->getpais(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($provincia->getciudads() as $ciudad) {
			$ciudadLogic= new ciudad_logic($this->connexion);
			$ciudad->setid_provincia($provincia->getId());
			ciudad_data::save($ciudad,$this->connexion);
			$ciudadLogic->deepSave($ciudad,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($provincia->getproveedors() as $proveedor) {
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedor->setid_provincia($provincia->getId());
			proveedor_data::save($proveedor,$this->connexion);
			$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($provincia->getclientes() as $cliente) {
			$clienteLogic= new cliente_logic($this->connexion);
			$cliente->setid_provincia($provincia->getId());
			cliente_data::save($cliente,$this->connexion);
			$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($provincia->getdato_general_usuarios() as $datogeneralusuario) {
			$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
			$datogeneralusuario->setid_provincia($provincia->getId());
			dato_general_usuario_data::save($datogeneralusuario,$this->connexion);
			$datogeneralusuarioLogic->deepSave($datogeneralusuario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				pais_data::save($provincia->getpais(),$this->connexion);
				$paisLogic= new pais_logic($this->connexion);
				$paisLogic->deepSave($provincia->getpais(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==ciudad::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($provincia->getciudads() as $ciudad) {
					$ciudadLogic= new ciudad_logic($this->connexion);
					$ciudad->setid_provincia($provincia->getId());
					ciudad_data::save($ciudad,$this->connexion);
					$ciudadLogic->deepSave($ciudad,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==proveedor::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($provincia->getproveedors() as $proveedor) {
					$proveedorLogic= new proveedor_logic($this->connexion);
					$proveedor->setid_provincia($provincia->getId());
					proveedor_data::save($proveedor,$this->connexion);
					$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==cliente::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($provincia->getclientes() as $cliente) {
					$clienteLogic= new cliente_logic($this->connexion);
					$cliente->setid_provincia($provincia->getId());
					cliente_data::save($cliente,$this->connexion);
					$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($provincia->getdato_general_usuarios() as $datogeneralusuario) {
					$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
					$datogeneralusuario->setid_provincia($provincia->getId());
					dato_general_usuario_data::save($datogeneralusuario,$this->connexion);
					$datogeneralusuarioLogic->deepSave($datogeneralusuario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==pais::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			pais_data::save($provincia->getpais(),$this->connexion);
			$paisLogic= new pais_logic($this->connexion);
			$paisLogic->deepSave($provincia->getpais(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ciudad::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(ciudad::$class);

			foreach($provincia->getciudads() as $ciudad) {
				$ciudadLogic= new ciudad_logic($this->connexion);
				$ciudad->setid_provincia($provincia->getId());
				ciudad_data::save($ciudad,$this->connexion);
				$ciudadLogic->deepSave($ciudad,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($provincia->getproveedors() as $proveedor) {
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedor->setid_provincia($provincia->getId());
				proveedor_data::save($proveedor,$this->connexion);
				$proveedorLogic->deepSave($proveedor,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
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

			foreach($provincia->getclientes() as $cliente) {
				$clienteLogic= new cliente_logic($this->connexion);
				$cliente->setid_provincia($provincia->getId());
				cliente_data::save($cliente,$this->connexion);
				$clienteLogic->deepSave($cliente,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==dato_general_usuario::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(dato_general_usuario::$class);

			foreach($provincia->getdato_general_usuarios() as $datogeneralusuario) {
				$datogeneralusuarioLogic= new dato_general_usuario_logic($this->connexion);
				$datogeneralusuario->setid_provincia($provincia->getId());
				dato_general_usuario_data::save($datogeneralusuario,$this->connexion);
				$datogeneralusuarioLogic->deepSave($datogeneralusuario,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				provincia_data::save($provincia, $this->connexion);
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
			
			$this->deepLoad($this->provincia,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->provincias as $provincia) {
				$this->deepLoad($provincia,$isDeep,$deepLoadType,$clases);
								
				provincia_util::refrescarFKDescripciones($this->provincias);
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
			
			foreach($this->provincias as $provincia) {
				$this->deepLoad($provincia,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->provincia,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->provincias as $provincia) {
				$this->deepSave($provincia,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->provincias as $provincia) {
				$this->deepSave($provincia,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(pais::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==pais::$class) {
						$classes[]=new Classe(pais::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==pais::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(pais::$class);
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
				
				$classes[]=new Classe(ciudad::$class);
				$classes[]=new Classe(proveedor::$class);
				$classes[]=new Classe(cliente::$class);
				$classes[]=new Classe(dato_general_usuario::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==ciudad::$class) {
						$classes[]=new Classe(ciudad::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==dato_general_usuario::$class) {
						$classes[]=new Classe(dato_general_usuario::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==ciudad::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(ciudad::$class);
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
					if($clas->clas==dato_general_usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(dato_general_usuario::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getprovincia() : ?provincia {	
		/*
		provincia_logic_add::checkprovinciaToGet($this->provincia,$this->datosCliente);
		provincia_logic_add::updateprovinciaToGet($this->provincia);
		*/
			
		return $this->provincia;
	}
		
	public function setprovincia(provincia $newprovincia) {
		$this->provincia = $newprovincia;
	}
	
	public function getprovincias() : array {		
		/*
		provincia_logic_add::checkprovinciaToGets($this->provincias,$this->datosCliente);
		
		foreach ($this->provincias as $provinciaLocal ) {
			provincia_logic_add::updateprovinciaToGet($provinciaLocal);
		}
		*/
		
		return $this->provincias;
	}
	
	public function setprovincias(array $newprovincias) {
		$this->provincias = $newprovincias;
	}
	
	public function getprovinciaDataAccess() : provincia_data {
		return $this->provinciaDataAccess;
	}
	
	public function setprovinciaDataAccess(provincia_data $newprovinciaDataAccess) {
		$this->provinciaDataAccess = $newprovinciaDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        provincia_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		sucursal_logic::$logger;
		empresa_logic::$logger;
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
