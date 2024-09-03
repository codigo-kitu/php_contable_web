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

namespace com\bydan\contabilidad\inventario\imagen_kardex\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\imagen_kardex\util\imagen_kardex_carga;
use com\bydan\contabilidad\inventario\imagen_kardex\util\imagen_kardex_param_return;


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

use com\bydan\contabilidad\inventario\imagen_kardex\util\imagen_kardex_util;
use com\bydan\contabilidad\inventario\imagen_kardex\business\entity\imagen_kardex;
use com\bydan\contabilidad\inventario\imagen_kardex\business\data\imagen_kardex_data;

//FK


//REL


//REL DETALLES




class imagen_kardex_logic  extends GeneralEntityLogic implements imagen_kardex_logicI {	
	/*GENERAL*/
	public imagen_kardex_data $imagen_kardexDataAccess;
	//public ?imagen_kardex_logic_add $imagen_kardexLogicAdditional=null;
	public ?imagen_kardex $imagen_kardex;
	public array $imagen_kardexs;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->imagen_kardexDataAccess = new imagen_kardex_data();			
			$this->imagen_kardexs = array();
			$this->imagen_kardex = new imagen_kardex();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->imagen_kardexLogicAdditional = new imagen_kardex_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->imagen_kardexLogicAdditional==null) {
		//	$this->imagen_kardexLogicAdditional=new imagen_kardex_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->imagen_kardexDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->imagen_kardexDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->imagen_kardexDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->imagen_kardexDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_kardexs = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_kardexs=$this->imagen_kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_kardex_util::refrescarFKDescripciones($this->imagen_kardexs);
			}
			
			//imagen_kardex_logic_add::checkimagen_kardexToGets($this->imagen_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_kardexs);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_kardexs = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_kardexs=$this->imagen_kardexDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_kardex_util::refrescarFKDescripciones($this->imagen_kardexs);
			}
			
			//imagen_kardex_logic_add::checkimagen_kardexToGets($this->imagen_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_kardexs);
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
		$this->imagen_kardex = new imagen_kardex();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->imagen_kardex=$this->imagen_kardexDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_kardex_util::refrescarFKDescripcion($this->imagen_kardex);
			}
						
			//imagen_kardex_logic_add::checkimagen_kardexToGet($this->imagen_kardex,$this->datosCliente);
			//imagen_kardex_logic_add::updateimagen_kardexToGet($this->imagen_kardex);
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
		$this->imagen_kardex = new  imagen_kardex();
		  		  
        try {		
			$this->imagen_kardex=$this->imagen_kardexDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_kardex_util::refrescarFKDescripcion($this->imagen_kardex);
			}
			
			//imagen_kardex_logic_add::checkimagen_kardexToGet($this->imagen_kardex,$this->datosCliente);
			//imagen_kardex_logic_add::updateimagen_kardexToGet($this->imagen_kardex);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?imagen_kardex {
		$imagen_kardexLogic = new  imagen_kardex_logic();
		  		  
        try {		
			$imagen_kardexLogic->setConnexion($connexion);			
			$imagen_kardexLogic->getEntity($id);			
			return $imagen_kardexLogic->getimagen_kardex();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->imagen_kardex = new  imagen_kardex();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->imagen_kardex=$this->imagen_kardexDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_kardex_util::refrescarFKDescripcion($this->imagen_kardex);
			}
			
			//imagen_kardex_logic_add::checkimagen_kardexToGet($this->imagen_kardex,$this->datosCliente);
			//imagen_kardex_logic_add::updateimagen_kardexToGet($this->imagen_kardex);
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
		$this->imagen_kardex = new  imagen_kardex();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_kardex=$this->imagen_kardexDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_kardex_util::refrescarFKDescripcion($this->imagen_kardex);
			}
			
			//imagen_kardex_logic_add::checkimagen_kardexToGet($this->imagen_kardex,$this->datosCliente);
			//imagen_kardex_logic_add::updateimagen_kardexToGet($this->imagen_kardex);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?imagen_kardex {
		$imagen_kardexLogic = new  imagen_kardex_logic();
		  		  
        try {		
			$imagen_kardexLogic->setConnexion($connexion);			
			$imagen_kardexLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $imagen_kardexLogic->getimagen_kardex();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_kardexs = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_kardexs=$this->imagen_kardexDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_kardex_util::refrescarFKDescripciones($this->imagen_kardexs);
			}
			
			//imagen_kardex_logic_add::checkimagen_kardexToGets($this->imagen_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_kardexs);			
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
		$this->imagen_kardexs = array();
		  		  
        try {			
			$this->imagen_kardexs=$this->imagen_kardexDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_kardex_util::refrescarFKDescripciones($this->imagen_kardexs);
			}
			
			//imagen_kardex_logic_add::checkimagen_kardexToGets($this->imagen_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_kardexs);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->imagen_kardexs = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_kardexs=$this->imagen_kardexDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_kardex_util::refrescarFKDescripciones($this->imagen_kardexs);
			}
			
			//imagen_kardex_logic_add::checkimagen_kardexToGets($this->imagen_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_kardexs);
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
		$this->imagen_kardexs = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_kardexs=$this->imagen_kardexDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_kardex_util::refrescarFKDescripciones($this->imagen_kardexs);
			}
			
			//imagen_kardex_logic_add::checkimagen_kardexToGets($this->imagen_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_kardexs);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$imagen_kardexLogic = new  imagen_kardex_logic();
		  		  
        try {		
			$imagen_kardexLogic->setConnexion($connexion);			
			$imagen_kardexLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $imagen_kardexLogic->getimagen_kardexs();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->imagen_kardexs = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_kardexs=$this->imagen_kardexDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_kardex_util::refrescarFKDescripciones($this->imagen_kardexs);
			}
			
			//imagen_kardex_logic_add::checkimagen_kardexToGets($this->imagen_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_kardexs);
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
		$this->imagen_kardexs = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_kardexs=$this->imagen_kardexDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_kardex_util::refrescarFKDescripciones($this->imagen_kardexs);
			}
			
			//imagen_kardex_logic_add::checkimagen_kardexToGets($this->imagen_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_kardexs);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->imagen_kardexs = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_kardexs=$this->imagen_kardexDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_kardex_util::refrescarFKDescripciones($this->imagen_kardexs);
			}
			
			//imagen_kardex_logic_add::checkimagen_kardexToGets($this->imagen_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_kardexs);
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
		$this->imagen_kardexs = array();
		  		  
        try {			
			$this->imagen_kardexs=$this->imagen_kardexDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_kardex_util::refrescarFKDescripciones($this->imagen_kardexs);
			}	
			
			//imagen_kardex_logic_add::checkimagen_kardexToGets($this->imagen_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_kardexs);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_kardexs = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_kardexs=$this->imagen_kardexDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_kardex_util::refrescarFKDescripciones($this->imagen_kardexs);
			}
			
			//imagen_kardex_logic_add::checkimagen_kardexToGets($this->imagen_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_kardexs);
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
		$this->imagen_kardexs = array();
		  		  
        try {		
			$this->imagen_kardexs=$this->imagen_kardexDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_kardex_util::refrescarFKDescripciones($this->imagen_kardexs);
			}
			
			//imagen_kardex_logic_add::checkimagen_kardexToGets($this->imagen_kardexs,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_kardexs);

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
						
			//imagen_kardex_logic_add::checkimagen_kardexToSave($this->imagen_kardex,$this->datosCliente,$this->connexion);	       
			//imagen_kardex_logic_add::updateimagen_kardexToSave($this->imagen_kardex);			
			imagen_kardex_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_kardex,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->imagen_kardexLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_kardex,$this->datosCliente,$this->connexion);
			
			
			imagen_kardex_data::save($this->imagen_kardex, $this->connexion);	    	       	 				
			//imagen_kardex_logic_add::checkimagen_kardexToSaveAfter($this->imagen_kardex,$this->datosCliente,$this->connexion);			
			//$this->imagen_kardexLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_kardex,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_kardex_util::refrescarFKDescripcion($this->imagen_kardex);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->imagen_kardex->getIsDeleted()) {
				$this->imagen_kardex=null;
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
						
			/*imagen_kardex_logic_add::checkimagen_kardexToSave($this->imagen_kardex,$this->datosCliente,$this->connexion);*/	        
			//imagen_kardex_logic_add::updateimagen_kardexToSave($this->imagen_kardex);			
			//$this->imagen_kardexLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_kardex,$this->datosCliente,$this->connexion);			
			imagen_kardex_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_kardex,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			imagen_kardex_data::save($this->imagen_kardex, $this->connexion);	    	       	 						
			/*imagen_kardex_logic_add::checkimagen_kardexToSaveAfter($this->imagen_kardex,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_kardexLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_kardex,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_kardex,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_kardex_util::refrescarFKDescripcion($this->imagen_kardex);				
			}
			
			if($this->imagen_kardex->getIsDeleted()) {
				$this->imagen_kardex=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(imagen_kardex $imagen_kardex,Connexion $connexion)  {
		$imagen_kardexLogic = new  imagen_kardex_logic();		  		  
        try {		
			$imagen_kardexLogic->setConnexion($connexion);			
			$imagen_kardexLogic->setimagen_kardex($imagen_kardex);			
			$imagen_kardexLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*imagen_kardex_logic_add::checkimagen_kardexToSaves($this->imagen_kardexs,$this->datosCliente,$this->connexion);*/	        	
			//$this->imagen_kardexLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_kardexs,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_kardexs as $imagen_kardexLocal) {				
								
				//imagen_kardex_logic_add::updateimagen_kardexToSave($imagen_kardexLocal);	        	
				imagen_kardex_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_kardexLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				imagen_kardex_data::save($imagen_kardexLocal, $this->connexion);				
			}
			
			/*imagen_kardex_logic_add::checkimagen_kardexToSavesAfter($this->imagen_kardexs,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_kardexLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_kardexs,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_kardex_util::refrescarFKDescripciones($this->imagen_kardexs);
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
			/*imagen_kardex_logic_add::checkimagen_kardexToSaves($this->imagen_kardexs,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_kardexLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_kardexs,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_kardexs as $imagen_kardexLocal) {				
								
				//imagen_kardex_logic_add::updateimagen_kardexToSave($imagen_kardexLocal);	        	
				imagen_kardex_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_kardexLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				imagen_kardex_data::save($imagen_kardexLocal, $this->connexion);				
			}			
			
			/*imagen_kardex_logic_add::checkimagen_kardexToSavesAfter($this->imagen_kardexs,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_kardexLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_kardexs,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_kardex_util::refrescarFKDescripciones($this->imagen_kardexs);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $imagen_kardexs,Connexion $connexion)  {
		$imagen_kardexLogic = new  imagen_kardex_logic();
		  		  
        try {		
			$imagen_kardexLogic->setConnexion($connexion);			
			$imagen_kardexLogic->setimagen_kardexs($imagen_kardexs);			
			$imagen_kardexLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$imagen_kardexsAux=array();
		
		foreach($this->imagen_kardexs as $imagen_kardex) {
			if($imagen_kardex->getIsDeleted()==false) {
				$imagen_kardexsAux[]=$imagen_kardex;
			}
		}
		
		$this->imagen_kardexs=$imagen_kardexsAux;
	}
	
	public function updateToGetsAuxiliar(array &$imagen_kardexs) {
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
	
	
	
	public function saveRelacionesWithConnection($imagen_kardex) {
		$this->saveRelacionesBase($imagen_kardex,true);
	}

	public function saveRelaciones($imagen_kardex) {
		$this->saveRelacionesBase($imagen_kardex,false);
	}

	public function saveRelacionesBase($imagen_kardex,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setimagen_kardex($imagen_kardex);

			if(true) {

				//imagen_kardex_logic_add::updateRelacionesToSave($imagen_kardex,$this);

				if(($this->imagen_kardex->getIsNew() || $this->imagen_kardex->getIsChanged()) && !$this->imagen_kardex->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->imagen_kardex->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//imagen_kardex_logic_add::updateRelacionesToSaveAfter($imagen_kardex,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $imagen_kardexs,imagen_kardex_param_return $imagen_kardexParameterGeneral) : imagen_kardex_param_return {
		$imagen_kardexReturnGeneral=new imagen_kardex_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $imagen_kardexReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $imagen_kardexs,imagen_kardex_param_return $imagen_kardexParameterGeneral) : imagen_kardex_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_kardexReturnGeneral=new imagen_kardex_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_kardexReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_kardexs,imagen_kardex $imagen_kardex,imagen_kardex_param_return $imagen_kardexParameterGeneral,bool $isEsNuevoimagen_kardex,array $clases) : imagen_kardex_param_return {
		 try {	
			$imagen_kardexReturnGeneral=new imagen_kardex_param_return();
	
			$imagen_kardexReturnGeneral->setimagen_kardex($imagen_kardex);
			$imagen_kardexReturnGeneral->setimagen_kardexs($imagen_kardexs);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_kardexReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $imagen_kardexReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_kardexs,imagen_kardex $imagen_kardex,imagen_kardex_param_return $imagen_kardexParameterGeneral,bool $isEsNuevoimagen_kardex,array $clases) : imagen_kardex_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_kardexReturnGeneral=new imagen_kardex_param_return();
	
			$imagen_kardexReturnGeneral->setimagen_kardex($imagen_kardex);
			$imagen_kardexReturnGeneral->setimagen_kardexs($imagen_kardexs);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_kardexReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_kardexReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_kardexs,imagen_kardex $imagen_kardex,imagen_kardex_param_return $imagen_kardexParameterGeneral,bool $isEsNuevoimagen_kardex,array $clases) : imagen_kardex_param_return {
		 try {	
			$imagen_kardexReturnGeneral=new imagen_kardex_param_return();
	
			$imagen_kardexReturnGeneral->setimagen_kardex($imagen_kardex);
			$imagen_kardexReturnGeneral->setimagen_kardexs($imagen_kardexs);
			
			
			
			return $imagen_kardexReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_kardexs,imagen_kardex $imagen_kardex,imagen_kardex_param_return $imagen_kardexParameterGeneral,bool $isEsNuevoimagen_kardex,array $clases) : imagen_kardex_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_kardexReturnGeneral=new imagen_kardex_param_return();
	
			$imagen_kardexReturnGeneral->setimagen_kardex($imagen_kardex);
			$imagen_kardexReturnGeneral->setimagen_kardexs($imagen_kardexs);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_kardexReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,imagen_kardex $imagen_kardex,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,imagen_kardex $imagen_kardex,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	
	
	public function deepLoad(imagen_kardex $imagen_kardex,bool $isDeep,string $deepLoadType,array $clases) {
		
		
		try {
			
			
			
			//imagen_kardex_logic_add::updateimagen_kardexToGet($this->imagen_kardex);
			
			
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		
	}
	
	public function deepSave(imagen_kardex $imagen_kardex,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		
		
		try {
			
			
			//imagen_kardex_logic_add::updateimagen_kardexToSave($this->imagen_kardex);			
			
			if(!$paraDeleteCascade) {				
				imagen_kardex_data::save($imagen_kardex, $this->connexion);
			}
			
			
			
			if($paraDeleteCascade) {				
				imagen_kardex_data::save($imagen_kardex, $this->connexion);
			}
			
		}catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}	
		
		
	}
		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			$this->deepLoad($this->imagen_kardex,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->imagen_kardexs as $imagen_kardex) {
				$this->deepLoad($imagen_kardex,$isDeep,$deepLoadType,$clases);
								
				imagen_kardex_util::refrescarFKDescripciones($this->imagen_kardexs);
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
			
			foreach($this->imagen_kardexs as $imagen_kardex) {
				$this->deepLoad($imagen_kardex,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->imagen_kardex,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->imagen_kardexs as $imagen_kardex) {
				$this->deepSave($imagen_kardex,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->imagen_kardexs as $imagen_kardex) {
				$this->deepSave($imagen_kardex,$isDeep,$deepLoadType,$clases,false);
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
	
	
	
	
	
	
	
	public function getimagen_kardex() : ?imagen_kardex {	
		/*
		imagen_kardex_logic_add::checkimagen_kardexToGet($this->imagen_kardex,$this->datosCliente);
		imagen_kardex_logic_add::updateimagen_kardexToGet($this->imagen_kardex);
		*/
			
		return $this->imagen_kardex;
	}
		
	public function setimagen_kardex(imagen_kardex $newimagen_kardex) {
		$this->imagen_kardex = $newimagen_kardex;
	}
	
	public function getimagen_kardexs() : array {		
		/*
		imagen_kardex_logic_add::checkimagen_kardexToGets($this->imagen_kardexs,$this->datosCliente);
		
		foreach ($this->imagen_kardexs as $imagen_kardexLocal ) {
			imagen_kardex_logic_add::updateimagen_kardexToGet($imagen_kardexLocal);
		}
		*/
		
		return $this->imagen_kardexs;
	}
	
	public function setimagen_kardexs(array $newimagen_kardexs) {
		$this->imagen_kardexs = $newimagen_kardexs;
	}
	
	public function getimagen_kardexDataAccess() : imagen_kardex_data {
		return $this->imagen_kardexDataAccess;
	}
	
	public function setimagen_kardexDataAccess(imagen_kardex_data $newimagen_kardexDataAccess) {
		$this->imagen_kardexDataAccess = $newimagen_kardexDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        imagen_kardex_carga::$CONTROLLER;;        
		
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
