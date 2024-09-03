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

namespace com\bydan\contabilidad\cuentaspagar\imagen_proveedor\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\util\imagen_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\util\imagen_proveedor_param_return;

use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\presentation\session\imagen_proveedor_session;

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

use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\util\imagen_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\business\entity\imagen_proveedor;
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\business\data\imagen_proveedor_data;

//FK


use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

//REL


//REL DETALLES




class imagen_proveedor_logic  extends GeneralEntityLogic implements imagen_proveedor_logicI {	
	/*GENERAL*/
	public imagen_proveedor_data $imagen_proveedorDataAccess;
	//public ?imagen_proveedor_logic_add $imagen_proveedorLogicAdditional=null;
	public ?imagen_proveedor $imagen_proveedor;
	public array $imagen_proveedors;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->imagen_proveedorDataAccess = new imagen_proveedor_data();			
			$this->imagen_proveedors = array();
			$this->imagen_proveedor = new imagen_proveedor();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->imagen_proveedorLogicAdditional = new imagen_proveedor_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->imagen_proveedorLogicAdditional==null) {
		//	$this->imagen_proveedorLogicAdditional=new imagen_proveedor_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->imagen_proveedorDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->imagen_proveedorDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->imagen_proveedorDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->imagen_proveedorDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_proveedors = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_proveedors=$this->imagen_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_proveedor_util::refrescarFKDescripciones($this->imagen_proveedors);
			}
			
			//imagen_proveedor_logic_add::checkimagen_proveedorToGets($this->imagen_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_proveedors);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_proveedors = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_proveedors=$this->imagen_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_proveedor_util::refrescarFKDescripciones($this->imagen_proveedors);
			}
			
			//imagen_proveedor_logic_add::checkimagen_proveedorToGets($this->imagen_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_proveedors);
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
		$this->imagen_proveedor = new imagen_proveedor();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->imagen_proveedor=$this->imagen_proveedorDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_proveedor_util::refrescarFKDescripcion($this->imagen_proveedor);
			}
						
			//imagen_proveedor_logic_add::checkimagen_proveedorToGet($this->imagen_proveedor,$this->datosCliente);
			//imagen_proveedor_logic_add::updateimagen_proveedorToGet($this->imagen_proveedor);
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
		$this->imagen_proveedor = new  imagen_proveedor();
		  		  
        try {		
			$this->imagen_proveedor=$this->imagen_proveedorDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_proveedor_util::refrescarFKDescripcion($this->imagen_proveedor);
			}
			
			//imagen_proveedor_logic_add::checkimagen_proveedorToGet($this->imagen_proveedor,$this->datosCliente);
			//imagen_proveedor_logic_add::updateimagen_proveedorToGet($this->imagen_proveedor);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?imagen_proveedor {
		$imagen_proveedorLogic = new  imagen_proveedor_logic();
		  		  
        try {		
			$imagen_proveedorLogic->setConnexion($connexion);			
			$imagen_proveedorLogic->getEntity($id);			
			return $imagen_proveedorLogic->getimagen_proveedor();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->imagen_proveedor = new  imagen_proveedor();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->imagen_proveedor=$this->imagen_proveedorDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_proveedor_util::refrescarFKDescripcion($this->imagen_proveedor);
			}
			
			//imagen_proveedor_logic_add::checkimagen_proveedorToGet($this->imagen_proveedor,$this->datosCliente);
			//imagen_proveedor_logic_add::updateimagen_proveedorToGet($this->imagen_proveedor);
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
		$this->imagen_proveedor = new  imagen_proveedor();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_proveedor=$this->imagen_proveedorDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_proveedor_util::refrescarFKDescripcion($this->imagen_proveedor);
			}
			
			//imagen_proveedor_logic_add::checkimagen_proveedorToGet($this->imagen_proveedor,$this->datosCliente);
			//imagen_proveedor_logic_add::updateimagen_proveedorToGet($this->imagen_proveedor);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?imagen_proveedor {
		$imagen_proveedorLogic = new  imagen_proveedor_logic();
		  		  
        try {		
			$imagen_proveedorLogic->setConnexion($connexion);			
			$imagen_proveedorLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $imagen_proveedorLogic->getimagen_proveedor();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_proveedors=$this->imagen_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_proveedor_util::refrescarFKDescripciones($this->imagen_proveedors);
			}
			
			//imagen_proveedor_logic_add::checkimagen_proveedorToGets($this->imagen_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_proveedors);			
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
		$this->imagen_proveedors = array();
		  		  
        try {			
			$this->imagen_proveedors=$this->imagen_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_proveedor_util::refrescarFKDescripciones($this->imagen_proveedors);
			}
			
			//imagen_proveedor_logic_add::checkimagen_proveedorToGets($this->imagen_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_proveedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->imagen_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_proveedors=$this->imagen_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_proveedor_util::refrescarFKDescripciones($this->imagen_proveedors);
			}
			
			//imagen_proveedor_logic_add::checkimagen_proveedorToGets($this->imagen_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_proveedors);
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
		$this->imagen_proveedors = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_proveedors=$this->imagen_proveedorDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_proveedor_util::refrescarFKDescripciones($this->imagen_proveedors);
			}
			
			//imagen_proveedor_logic_add::checkimagen_proveedorToGets($this->imagen_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_proveedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$imagen_proveedorLogic = new  imagen_proveedor_logic();
		  		  
        try {		
			$imagen_proveedorLogic->setConnexion($connexion);			
			$imagen_proveedorLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $imagen_proveedorLogic->getimagen_proveedors();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->imagen_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_proveedors=$this->imagen_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_proveedor_util::refrescarFKDescripciones($this->imagen_proveedors);
			}
			
			//imagen_proveedor_logic_add::checkimagen_proveedorToGets($this->imagen_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_proveedors);
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
		$this->imagen_proveedors = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_proveedors=$this->imagen_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_proveedor_util::refrescarFKDescripciones($this->imagen_proveedors);
			}
			
			//imagen_proveedor_logic_add::checkimagen_proveedorToGets($this->imagen_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_proveedors);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->imagen_proveedors = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_proveedors=$this->imagen_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_proveedor_util::refrescarFKDescripciones($this->imagen_proveedors);
			}
			
			//imagen_proveedor_logic_add::checkimagen_proveedorToGets($this->imagen_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_proveedors);
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
		$this->imagen_proveedors = array();
		  		  
        try {			
			$this->imagen_proveedors=$this->imagen_proveedorDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_proveedor_util::refrescarFKDescripciones($this->imagen_proveedors);
			}	
			
			//imagen_proveedor_logic_add::checkimagen_proveedorToGets($this->imagen_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_proveedors);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_proveedors = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_proveedors=$this->imagen_proveedorDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_proveedor_util::refrescarFKDescripciones($this->imagen_proveedors);
			}
			
			//imagen_proveedor_logic_add::checkimagen_proveedorToGets($this->imagen_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_proveedors);
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
		$this->imagen_proveedors = array();
		  		  
        try {		
			$this->imagen_proveedors=$this->imagen_proveedorDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_proveedor_util::refrescarFKDescripciones($this->imagen_proveedors);
			}
			
			//imagen_proveedor_logic_add::checkimagen_proveedorToGets($this->imagen_proveedors,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_proveedors);

		}  catch(Exception $e) {						
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
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,imagen_proveedor_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->imagen_proveedors=$this->imagen_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				imagen_proveedor_util::refrescarFKDescripciones($this->imagen_proveedors);
			}
			//imagen_proveedor_logic_add::checkimagen_proveedorToGets($this->imagen_proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->imagen_proveedors);

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
			$parameterSelectionGeneralid_proveedor->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_proveedor,imagen_proveedor_util::$ID_PROVEEDOR,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_proveedor);

			$this->imagen_proveedors=$this->imagen_proveedorDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				imagen_proveedor_util::refrescarFKDescripciones($this->imagen_proveedors);
			}
			//imagen_proveedor_logic_add::checkimagen_proveedorToGets($this->imagen_proveedors,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->imagen_proveedors);
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
						
			//imagen_proveedor_logic_add::checkimagen_proveedorToSave($this->imagen_proveedor,$this->datosCliente,$this->connexion);	       
			//imagen_proveedor_logic_add::updateimagen_proveedorToSave($this->imagen_proveedor);			
			imagen_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_proveedor,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->imagen_proveedorLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_proveedor,$this->datosCliente,$this->connexion);
			
			
			imagen_proveedor_data::save($this->imagen_proveedor, $this->connexion);	    	       	 				
			//imagen_proveedor_logic_add::checkimagen_proveedorToSaveAfter($this->imagen_proveedor,$this->datosCliente,$this->connexion);			
			//$this->imagen_proveedorLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_proveedor,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_proveedor_util::refrescarFKDescripcion($this->imagen_proveedor);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->imagen_proveedor->getIsDeleted()) {
				$this->imagen_proveedor=null;
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
						
			/*imagen_proveedor_logic_add::checkimagen_proveedorToSave($this->imagen_proveedor,$this->datosCliente,$this->connexion);*/	        
			//imagen_proveedor_logic_add::updateimagen_proveedorToSave($this->imagen_proveedor);			
			//$this->imagen_proveedorLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_proveedor,$this->datosCliente,$this->connexion);			
			imagen_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_proveedor,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			imagen_proveedor_data::save($this->imagen_proveedor, $this->connexion);	    	       	 						
			/*imagen_proveedor_logic_add::checkimagen_proveedorToSaveAfter($this->imagen_proveedor,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_proveedorLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_proveedor,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_proveedor,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_proveedor_util::refrescarFKDescripcion($this->imagen_proveedor);				
			}
			
			if($this->imagen_proveedor->getIsDeleted()) {
				$this->imagen_proveedor=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(imagen_proveedor $imagen_proveedor,Connexion $connexion)  {
		$imagen_proveedorLogic = new  imagen_proveedor_logic();		  		  
        try {		
			$imagen_proveedorLogic->setConnexion($connexion);			
			$imagen_proveedorLogic->setimagen_proveedor($imagen_proveedor);			
			$imagen_proveedorLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*imagen_proveedor_logic_add::checkimagen_proveedorToSaves($this->imagen_proveedors,$this->datosCliente,$this->connexion);*/	        	
			//$this->imagen_proveedorLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_proveedors,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_proveedors as $imagen_proveedorLocal) {				
								
				//imagen_proveedor_logic_add::updateimagen_proveedorToSave($imagen_proveedorLocal);	        	
				imagen_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_proveedorLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				imagen_proveedor_data::save($imagen_proveedorLocal, $this->connexion);				
			}
			
			/*imagen_proveedor_logic_add::checkimagen_proveedorToSavesAfter($this->imagen_proveedors,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_proveedorLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_proveedors,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_proveedor_util::refrescarFKDescripciones($this->imagen_proveedors);
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
			/*imagen_proveedor_logic_add::checkimagen_proveedorToSaves($this->imagen_proveedors,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_proveedorLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_proveedors,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_proveedors as $imagen_proveedorLocal) {				
								
				//imagen_proveedor_logic_add::updateimagen_proveedorToSave($imagen_proveedorLocal);	        	
				imagen_proveedor_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_proveedorLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				imagen_proveedor_data::save($imagen_proveedorLocal, $this->connexion);				
			}			
			
			/*imagen_proveedor_logic_add::checkimagen_proveedorToSavesAfter($this->imagen_proveedors,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_proveedorLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_proveedors,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_proveedor_util::refrescarFKDescripciones($this->imagen_proveedors);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $imagen_proveedors,Connexion $connexion)  {
		$imagen_proveedorLogic = new  imagen_proveedor_logic();
		  		  
        try {		
			$imagen_proveedorLogic->setConnexion($connexion);			
			$imagen_proveedorLogic->setimagen_proveedors($imagen_proveedors);			
			$imagen_proveedorLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$imagen_proveedorsAux=array();
		
		foreach($this->imagen_proveedors as $imagen_proveedor) {
			if($imagen_proveedor->getIsDeleted()==false) {
				$imagen_proveedorsAux[]=$imagen_proveedor;
			}
		}
		
		$this->imagen_proveedors=$imagen_proveedorsAux;
	}
	
	public function updateToGetsAuxiliar(array &$imagen_proveedors) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->imagen_proveedors as $imagen_proveedor) {
				
				$imagen_proveedor->setid_proveedor_Descripcion(imagen_proveedor_util::getproveedorDescripcion($imagen_proveedor->getproveedor()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_proveedor_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$imagen_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_proveedor_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$imagen_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$imagen_proveedor_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$imagen_proveedorForeignKey=new imagen_proveedor_param_return();//imagen_proveedorForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTipos,',')) {
				$this->cargarCombosproveedorsFK($this->connexion,$strRecargarFkQuery,$imagen_proveedorForeignKey,$imagen_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_proveedor',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosproveedorsFK($this->connexion,' where id=-1 ',$imagen_proveedorForeignKey,$imagen_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $imagen_proveedorForeignKey;
			
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
	
	
	public function cargarCombosproveedorsFK($connexion=null,$strRecargarFkQuery='',$imagen_proveedorForeignKey,$imagen_proveedor_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$proveedorLogic= new proveedor_logic();
		$pagination= new Pagination();
		$imagen_proveedorForeignKey->proveedorsFK=array();

		$proveedorLogic->setConnexion($connexion);
		$proveedorLogic->getproveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($imagen_proveedor_session==null) {
			$imagen_proveedor_session=new imagen_proveedor_session();
		}
		
		if($imagen_proveedor_session->bitBusquedaDesdeFKSesionproveedor!=true) {
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
				if($imagen_proveedorForeignKey->idproveedorDefaultFK==0) {
					$imagen_proveedorForeignKey->idproveedorDefaultFK=$proveedorLocal->getId();
				}

				$imagen_proveedorForeignKey->proveedorsFK[$proveedorLocal->getId()]=imagen_proveedor_util::getproveedorDescripcion($proveedorLocal);
			}

		} else {

			if($imagen_proveedor_session->bigidproveedorActual!=null && $imagen_proveedor_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($imagen_proveedor_session->bigidproveedorActual);//WithConnection

				$imagen_proveedorForeignKey->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=imagen_proveedor_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$imagen_proveedorForeignKey->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($imagen_proveedor) {
		$this->saveRelacionesBase($imagen_proveedor,true);
	}

	public function saveRelaciones($imagen_proveedor) {
		$this->saveRelacionesBase($imagen_proveedor,false);
	}

	public function saveRelacionesBase($imagen_proveedor,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setimagen_proveedor($imagen_proveedor);

			if(true) {

				//imagen_proveedor_logic_add::updateRelacionesToSave($imagen_proveedor,$this);

				if(($this->imagen_proveedor->getIsNew() || $this->imagen_proveedor->getIsChanged()) && !$this->imagen_proveedor->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->imagen_proveedor->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//imagen_proveedor_logic_add::updateRelacionesToSaveAfter($imagen_proveedor,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $imagen_proveedors,imagen_proveedor_param_return $imagen_proveedorParameterGeneral) : imagen_proveedor_param_return {
		$imagen_proveedorReturnGeneral=new imagen_proveedor_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $imagen_proveedorReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $imagen_proveedors,imagen_proveedor_param_return $imagen_proveedorParameterGeneral) : imagen_proveedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_proveedorReturnGeneral=new imagen_proveedor_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_proveedors,imagen_proveedor $imagen_proveedor,imagen_proveedor_param_return $imagen_proveedorParameterGeneral,bool $isEsNuevoimagen_proveedor,array $clases) : imagen_proveedor_param_return {
		 try {	
			$imagen_proveedorReturnGeneral=new imagen_proveedor_param_return();
	
			$imagen_proveedorReturnGeneral->setimagen_proveedor($imagen_proveedor);
			$imagen_proveedorReturnGeneral->setimagen_proveedors($imagen_proveedors);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_proveedorReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $imagen_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_proveedors,imagen_proveedor $imagen_proveedor,imagen_proveedor_param_return $imagen_proveedorParameterGeneral,bool $isEsNuevoimagen_proveedor,array $clases) : imagen_proveedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_proveedorReturnGeneral=new imagen_proveedor_param_return();
	
			$imagen_proveedorReturnGeneral->setimagen_proveedor($imagen_proveedor);
			$imagen_proveedorReturnGeneral->setimagen_proveedors($imagen_proveedors);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_proveedorReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_proveedors,imagen_proveedor $imagen_proveedor,imagen_proveedor_param_return $imagen_proveedorParameterGeneral,bool $isEsNuevoimagen_proveedor,array $clases) : imagen_proveedor_param_return {
		 try {	
			$imagen_proveedorReturnGeneral=new imagen_proveedor_param_return();
	
			$imagen_proveedorReturnGeneral->setimagen_proveedor($imagen_proveedor);
			$imagen_proveedorReturnGeneral->setimagen_proveedors($imagen_proveedors);
			
			
			
			return $imagen_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_proveedors,imagen_proveedor $imagen_proveedor,imagen_proveedor_param_return $imagen_proveedorParameterGeneral,bool $isEsNuevoimagen_proveedor,array $clases) : imagen_proveedor_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_proveedorReturnGeneral=new imagen_proveedor_param_return();
	
			$imagen_proveedorReturnGeneral->setimagen_proveedor($imagen_proveedor);
			$imagen_proveedorReturnGeneral->setimagen_proveedors($imagen_proveedors);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_proveedorReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,imagen_proveedor $imagen_proveedor,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,imagen_proveedor $imagen_proveedor,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		imagen_proveedor_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(imagen_proveedor $imagen_proveedor,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//imagen_proveedor_logic_add::updateimagen_proveedorToGet($this->imagen_proveedor);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$imagen_proveedor->setproveedor($this->imagen_proveedorDataAccess->getproveedor($this->connexion,$imagen_proveedor));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$imagen_proveedor->setproveedor($this->imagen_proveedorDataAccess->getproveedor($this->connexion,$imagen_proveedor));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$imagen_proveedor->setproveedor($this->imagen_proveedorDataAccess->getproveedor($this->connexion,$imagen_proveedor));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$imagen_proveedor->setproveedor($this->imagen_proveedorDataAccess->getproveedor($this->connexion,$imagen_proveedor));
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepLoad($imagen_proveedor->getproveedor(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$imagen_proveedor->setproveedor($this->imagen_proveedorDataAccess->getproveedor($this->connexion,$imagen_proveedor));
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepLoad($imagen_proveedor->getproveedor(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$imagen_proveedor->setproveedor($this->imagen_proveedorDataAccess->getproveedor($this->connexion,$imagen_proveedor));
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepLoad($imagen_proveedor->getproveedor(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(imagen_proveedor $imagen_proveedor,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			//imagen_proveedor_logic_add::updateimagen_proveedorToSave($this->imagen_proveedor);			
			
			if(!$paraDeleteCascade) {				
				imagen_proveedor_data::save($imagen_proveedor, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		proveedor_data::save($imagen_proveedor->getproveedor(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($imagen_proveedor->getproveedor(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($imagen_proveedor->getproveedor(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		proveedor_data::save($imagen_proveedor->getproveedor(),$this->connexion);
		$proveedorLogic= new proveedor_logic($this->connexion);
		$proveedorLogic->deepSave($imagen_proveedor->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				proveedor_data::save($imagen_proveedor->getproveedor(),$this->connexion);
				$proveedorLogic= new proveedor_logic($this->connexion);
				$proveedorLogic->deepSave($imagen_proveedor->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==proveedor::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			proveedor_data::save($imagen_proveedor->getproveedor(),$this->connexion);
			$proveedorLogic= new proveedor_logic($this->connexion);
			$proveedorLogic->deepSave($imagen_proveedor->getproveedor(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				imagen_proveedor_data::save($imagen_proveedor, $this->connexion);
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
			
			$this->deepLoad($this->imagen_proveedor,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->imagen_proveedors as $imagen_proveedor) {
				$this->deepLoad($imagen_proveedor,$isDeep,$deepLoadType,$clases);
								
				imagen_proveedor_util::refrescarFKDescripciones($this->imagen_proveedors);
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
			
			foreach($this->imagen_proveedors as $imagen_proveedor) {
				$this->deepLoad($imagen_proveedor,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->imagen_proveedor,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->imagen_proveedors as $imagen_proveedor) {
				$this->deepSave($imagen_proveedor,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->imagen_proveedors as $imagen_proveedor) {
				$this->deepSave($imagen_proveedor,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(proveedor::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
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
	
	
	
	
	
	
	
	public function getimagen_proveedor() : ?imagen_proveedor {	
		/*
		imagen_proveedor_logic_add::checkimagen_proveedorToGet($this->imagen_proveedor,$this->datosCliente);
		imagen_proveedor_logic_add::updateimagen_proveedorToGet($this->imagen_proveedor);
		*/
			
		return $this->imagen_proveedor;
	}
		
	public function setimagen_proveedor(imagen_proveedor $newimagen_proveedor) {
		$this->imagen_proveedor = $newimagen_proveedor;
	}
	
	public function getimagen_proveedors() : array {		
		/*
		imagen_proveedor_logic_add::checkimagen_proveedorToGets($this->imagen_proveedors,$this->datosCliente);
		
		foreach ($this->imagen_proveedors as $imagen_proveedorLocal ) {
			imagen_proveedor_logic_add::updateimagen_proveedorToGet($imagen_proveedorLocal);
		}
		*/
		
		return $this->imagen_proveedors;
	}
	
	public function setimagen_proveedors(array $newimagen_proveedors) {
		$this->imagen_proveedors = $newimagen_proveedors;
	}
	
	public function getimagen_proveedorDataAccess() : imagen_proveedor_data {
		return $this->imagen_proveedorDataAccess;
	}
	
	public function setimagen_proveedorDataAccess(imagen_proveedor_data $newimagen_proveedorDataAccess) {
		$this->imagen_proveedorDataAccess = $newimagen_proveedorDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        imagen_proveedor_carga::$CONTROLLER;;        
		
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
