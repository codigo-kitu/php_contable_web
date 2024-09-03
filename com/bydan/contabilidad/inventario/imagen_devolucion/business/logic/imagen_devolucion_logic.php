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

namespace com\bydan\contabilidad\inventario\imagen_devolucion\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\imagen_devolucion\util\imagen_devolucion_carga;
use com\bydan\contabilidad\inventario\imagen_devolucion\util\imagen_devolucion_param_return;


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

use com\bydan\contabilidad\inventario\imagen_devolucion\util\imagen_devolucion_util;
use com\bydan\contabilidad\inventario\imagen_devolucion\business\entity\imagen_devolucion;
use com\bydan\contabilidad\inventario\imagen_devolucion\business\data\imagen_devolucion_data;

//FK


//REL


//REL DETALLES




class imagen_devolucion_logic  extends GeneralEntityLogic implements imagen_devolucion_logicI {	
	/*GENERAL*/
	public imagen_devolucion_data $imagen_devolucionDataAccess;
	//public ?imagen_devolucion_logic_add $imagen_devolucionLogicAdditional=null;
	public ?imagen_devolucion $imagen_devolucion;
	public array $imagen_devolucions;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->imagen_devolucionDataAccess = new imagen_devolucion_data();			
			$this->imagen_devolucions = array();
			$this->imagen_devolucion = new imagen_devolucion();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->imagen_devolucionLogicAdditional = new imagen_devolucion_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->imagen_devolucionLogicAdditional==null) {
		//	$this->imagen_devolucionLogicAdditional=new imagen_devolucion_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->imagen_devolucionDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->imagen_devolucionDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->imagen_devolucionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->imagen_devolucionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_devolucions = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_devolucions=$this->imagen_devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_util::refrescarFKDescripciones($this->imagen_devolucions);
			}
			
			//imagen_devolucion_logic_add::checkimagen_devolucionToGets($this->imagen_devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucions);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_devolucions = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_devolucions=$this->imagen_devolucionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_util::refrescarFKDescripciones($this->imagen_devolucions);
			}
			
			//imagen_devolucion_logic_add::checkimagen_devolucionToGets($this->imagen_devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucions);
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
		$this->imagen_devolucion = new imagen_devolucion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->imagen_devolucion=$this->imagen_devolucionDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_devolucion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_devolucion_util::refrescarFKDescripcion($this->imagen_devolucion);
			}
						
			//imagen_devolucion_logic_add::checkimagen_devolucionToGet($this->imagen_devolucion,$this->datosCliente);
			//imagen_devolucion_logic_add::updateimagen_devolucionToGet($this->imagen_devolucion);
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
		$this->imagen_devolucion = new  imagen_devolucion();
		  		  
        try {		
			$this->imagen_devolucion=$this->imagen_devolucionDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_devolucion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_devolucion_util::refrescarFKDescripcion($this->imagen_devolucion);
			}
			
			//imagen_devolucion_logic_add::checkimagen_devolucionToGet($this->imagen_devolucion,$this->datosCliente);
			//imagen_devolucion_logic_add::updateimagen_devolucionToGet($this->imagen_devolucion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?imagen_devolucion {
		$imagen_devolucionLogic = new  imagen_devolucion_logic();
		  		  
        try {		
			$imagen_devolucionLogic->setConnexion($connexion);			
			$imagen_devolucionLogic->getEntity($id);			
			return $imagen_devolucionLogic->getimagen_devolucion();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->imagen_devolucion = new  imagen_devolucion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->imagen_devolucion=$this->imagen_devolucionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_devolucion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_devolucion_util::refrescarFKDescripcion($this->imagen_devolucion);
			}
			
			//imagen_devolucion_logic_add::checkimagen_devolucionToGet($this->imagen_devolucion,$this->datosCliente);
			//imagen_devolucion_logic_add::updateimagen_devolucionToGet($this->imagen_devolucion);
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
		$this->imagen_devolucion = new  imagen_devolucion();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_devolucion=$this->imagen_devolucionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_devolucion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_devolucion_util::refrescarFKDescripcion($this->imagen_devolucion);
			}
			
			//imagen_devolucion_logic_add::checkimagen_devolucionToGet($this->imagen_devolucion,$this->datosCliente);
			//imagen_devolucion_logic_add::updateimagen_devolucionToGet($this->imagen_devolucion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?imagen_devolucion {
		$imagen_devolucionLogic = new  imagen_devolucion_logic();
		  		  
        try {		
			$imagen_devolucionLogic->setConnexion($connexion);			
			$imagen_devolucionLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $imagen_devolucionLogic->getimagen_devolucion();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_devolucions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_devolucions=$this->imagen_devolucionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_util::refrescarFKDescripciones($this->imagen_devolucions);
			}
			
			//imagen_devolucion_logic_add::checkimagen_devolucionToGets($this->imagen_devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucions);			
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
		$this->imagen_devolucions = array();
		  		  
        try {			
			$this->imagen_devolucions=$this->imagen_devolucionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_util::refrescarFKDescripciones($this->imagen_devolucions);
			}
			
			//imagen_devolucion_logic_add::checkimagen_devolucionToGets($this->imagen_devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->imagen_devolucions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_devolucions=$this->imagen_devolucionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_util::refrescarFKDescripciones($this->imagen_devolucions);
			}
			
			//imagen_devolucion_logic_add::checkimagen_devolucionToGets($this->imagen_devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucions);
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
		$this->imagen_devolucions = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_devolucions=$this->imagen_devolucionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_util::refrescarFKDescripciones($this->imagen_devolucions);
			}
			
			//imagen_devolucion_logic_add::checkimagen_devolucionToGets($this->imagen_devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$imagen_devolucionLogic = new  imagen_devolucion_logic();
		  		  
        try {		
			$imagen_devolucionLogic->setConnexion($connexion);			
			$imagen_devolucionLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $imagen_devolucionLogic->getimagen_devolucions();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->imagen_devolucions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_devolucions=$this->imagen_devolucionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_util::refrescarFKDescripciones($this->imagen_devolucions);
			}
			
			//imagen_devolucion_logic_add::checkimagen_devolucionToGets($this->imagen_devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucions);
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
		$this->imagen_devolucions = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_devolucions=$this->imagen_devolucionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_util::refrescarFKDescripciones($this->imagen_devolucions);
			}
			
			//imagen_devolucion_logic_add::checkimagen_devolucionToGets($this->imagen_devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucions);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->imagen_devolucions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_devolucions=$this->imagen_devolucionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_util::refrescarFKDescripciones($this->imagen_devolucions);
			}
			
			//imagen_devolucion_logic_add::checkimagen_devolucionToGets($this->imagen_devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucions);
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
		$this->imagen_devolucions = array();
		  		  
        try {			
			$this->imagen_devolucions=$this->imagen_devolucionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_util::refrescarFKDescripciones($this->imagen_devolucions);
			}	
			
			//imagen_devolucion_logic_add::checkimagen_devolucionToGets($this->imagen_devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_devolucions = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_devolucions=$this->imagen_devolucionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_util::refrescarFKDescripciones($this->imagen_devolucions);
			}
			
			//imagen_devolucion_logic_add::checkimagen_devolucionToGets($this->imagen_devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucions);
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
		$this->imagen_devolucions = array();
		  		  
        try {		
			$this->imagen_devolucions=$this->imagen_devolucionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_util::refrescarFKDescripciones($this->imagen_devolucions);
			}
			
			//imagen_devolucion_logic_add::checkimagen_devolucionToGets($this->imagen_devolucions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_devolucions);

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
						
			//imagen_devolucion_logic_add::checkimagen_devolucionToSave($this->imagen_devolucion,$this->datosCliente,$this->connexion);	       
			//imagen_devolucion_logic_add::updateimagen_devolucionToSave($this->imagen_devolucion);			
			imagen_devolucion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_devolucion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->imagen_devolucionLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_devolucion,$this->datosCliente,$this->connexion);
			
			
			imagen_devolucion_data::save($this->imagen_devolucion, $this->connexion);	    	       	 				
			//imagen_devolucion_logic_add::checkimagen_devolucionToSaveAfter($this->imagen_devolucion,$this->datosCliente,$this->connexion);			
			//$this->imagen_devolucionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_devolucion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_devolucion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_devolucion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_devolucion_util::refrescarFKDescripcion($this->imagen_devolucion);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->imagen_devolucion->getIsDeleted()) {
				$this->imagen_devolucion=null;
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
						
			/*imagen_devolucion_logic_add::checkimagen_devolucionToSave($this->imagen_devolucion,$this->datosCliente,$this->connexion);*/	        
			//imagen_devolucion_logic_add::updateimagen_devolucionToSave($this->imagen_devolucion);			
			//$this->imagen_devolucionLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_devolucion,$this->datosCliente,$this->connexion);			
			imagen_devolucion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_devolucion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			imagen_devolucion_data::save($this->imagen_devolucion, $this->connexion);	    	       	 						
			/*imagen_devolucion_logic_add::checkimagen_devolucionToSaveAfter($this->imagen_devolucion,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_devolucionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_devolucion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_devolucion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_devolucion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_devolucion_util::refrescarFKDescripcion($this->imagen_devolucion);				
			}
			
			if($this->imagen_devolucion->getIsDeleted()) {
				$this->imagen_devolucion=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(imagen_devolucion $imagen_devolucion,Connexion $connexion)  {
		$imagen_devolucionLogic = new  imagen_devolucion_logic();		  		  
        try {		
			$imagen_devolucionLogic->setConnexion($connexion);			
			$imagen_devolucionLogic->setimagen_devolucion($imagen_devolucion);			
			$imagen_devolucionLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*imagen_devolucion_logic_add::checkimagen_devolucionToSaves($this->imagen_devolucions,$this->datosCliente,$this->connexion);*/	        	
			//$this->imagen_devolucionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_devolucions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_devolucions as $imagen_devolucionLocal) {				
								
				//imagen_devolucion_logic_add::updateimagen_devolucionToSave($imagen_devolucionLocal);	        	
				imagen_devolucion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_devolucionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				imagen_devolucion_data::save($imagen_devolucionLocal, $this->connexion);				
			}
			
			/*imagen_devolucion_logic_add::checkimagen_devolucionToSavesAfter($this->imagen_devolucions,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_devolucionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_devolucions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_util::refrescarFKDescripciones($this->imagen_devolucions);
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
			/*imagen_devolucion_logic_add::checkimagen_devolucionToSaves($this->imagen_devolucions,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_devolucionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_devolucions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_devolucions as $imagen_devolucionLocal) {				
								
				//imagen_devolucion_logic_add::updateimagen_devolucionToSave($imagen_devolucionLocal);	        	
				imagen_devolucion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_devolucionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				imagen_devolucion_data::save($imagen_devolucionLocal, $this->connexion);				
			}			
			
			/*imagen_devolucion_logic_add::checkimagen_devolucionToSavesAfter($this->imagen_devolucions,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_devolucionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_devolucions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_devolucion_util::refrescarFKDescripciones($this->imagen_devolucions);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $imagen_devolucions,Connexion $connexion)  {
		$imagen_devolucionLogic = new  imagen_devolucion_logic();
		  		  
        try {		
			$imagen_devolucionLogic->setConnexion($connexion);			
			$imagen_devolucionLogic->setimagen_devolucions($imagen_devolucions);			
			$imagen_devolucionLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$imagen_devolucionsAux=array();
		
		foreach($this->imagen_devolucions as $imagen_devolucion) {
			if($imagen_devolucion->getIsDeleted()==false) {
				$imagen_devolucionsAux[]=$imagen_devolucion;
			}
		}
		
		$this->imagen_devolucions=$imagen_devolucionsAux;
	}
	
	public function updateToGetsAuxiliar(array &$imagen_devolucions) {
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
	
	
	
	public function saveRelacionesWithConnection($imagen_devolucion) {
		$this->saveRelacionesBase($imagen_devolucion,true);
	}

	public function saveRelaciones($imagen_devolucion) {
		$this->saveRelacionesBase($imagen_devolucion,false);
	}

	public function saveRelacionesBase($imagen_devolucion,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setimagen_devolucion($imagen_devolucion);

			if(true) {

				//imagen_devolucion_logic_add::updateRelacionesToSave($imagen_devolucion,$this);

				if(($this->imagen_devolucion->getIsNew() || $this->imagen_devolucion->getIsChanged()) && !$this->imagen_devolucion->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->imagen_devolucion->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//imagen_devolucion_logic_add::updateRelacionesToSaveAfter($imagen_devolucion,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $imagen_devolucions,imagen_devolucion_param_return $imagen_devolucionParameterGeneral) : imagen_devolucion_param_return {
		$imagen_devolucionReturnGeneral=new imagen_devolucion_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $imagen_devolucionReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $imagen_devolucions,imagen_devolucion_param_return $imagen_devolucionParameterGeneral) : imagen_devolucion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_devolucionReturnGeneral=new imagen_devolucion_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_devolucionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_devolucions,imagen_devolucion $imagen_devolucion,imagen_devolucion_param_return $imagen_devolucionParameterGeneral,bool $isEsNuevoimagen_devolucion,array $clases) : imagen_devolucion_param_return {
		 try {	
			$imagen_devolucionReturnGeneral=new imagen_devolucion_param_return();
	
			$imagen_devolucionReturnGeneral->setimagen_devolucion($imagen_devolucion);
			$imagen_devolucionReturnGeneral->setimagen_devolucions($imagen_devolucions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_devolucionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $imagen_devolucionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_devolucions,imagen_devolucion $imagen_devolucion,imagen_devolucion_param_return $imagen_devolucionParameterGeneral,bool $isEsNuevoimagen_devolucion,array $clases) : imagen_devolucion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_devolucionReturnGeneral=new imagen_devolucion_param_return();
	
			$imagen_devolucionReturnGeneral->setimagen_devolucion($imagen_devolucion);
			$imagen_devolucionReturnGeneral->setimagen_devolucions($imagen_devolucions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_devolucionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_devolucionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_devolucions,imagen_devolucion $imagen_devolucion,imagen_devolucion_param_return $imagen_devolucionParameterGeneral,bool $isEsNuevoimagen_devolucion,array $clases) : imagen_devolucion_param_return {
		 try {	
			$imagen_devolucionReturnGeneral=new imagen_devolucion_param_return();
	
			$imagen_devolucionReturnGeneral->setimagen_devolucion($imagen_devolucion);
			$imagen_devolucionReturnGeneral->setimagen_devolucions($imagen_devolucions);
			
			
			
			return $imagen_devolucionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_devolucions,imagen_devolucion $imagen_devolucion,imagen_devolucion_param_return $imagen_devolucionParameterGeneral,bool $isEsNuevoimagen_devolucion,array $clases) : imagen_devolucion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_devolucionReturnGeneral=new imagen_devolucion_param_return();
	
			$imagen_devolucionReturnGeneral->setimagen_devolucion($imagen_devolucion);
			$imagen_devolucionReturnGeneral->setimagen_devolucions($imagen_devolucions);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_devolucionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,imagen_devolucion $imagen_devolucion,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,imagen_devolucion $imagen_devolucion,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	
	
	public function deepLoad(imagen_devolucion $imagen_devolucion,bool $isDeep,string $deepLoadType,array $clases) {
		
		
		try {
			
			
			
			//imagen_devolucion_logic_add::updateimagen_devolucionToGet($this->imagen_devolucion);
			
			
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		
	}
	
	public function deepSave(imagen_devolucion $imagen_devolucion,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		
		
		try {
			
			
			//imagen_devolucion_logic_add::updateimagen_devolucionToSave($this->imagen_devolucion);			
			
			if(!$paraDeleteCascade) {				
				imagen_devolucion_data::save($imagen_devolucion, $this->connexion);
			}
			
			
			
			if($paraDeleteCascade) {				
				imagen_devolucion_data::save($imagen_devolucion, $this->connexion);
			}
			
		}catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}	
		
		
	}
		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			$this->deepLoad($this->imagen_devolucion,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->imagen_devolucions as $imagen_devolucion) {
				$this->deepLoad($imagen_devolucion,$isDeep,$deepLoadType,$clases);
								
				imagen_devolucion_util::refrescarFKDescripciones($this->imagen_devolucions);
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
			
			foreach($this->imagen_devolucions as $imagen_devolucion) {
				$this->deepLoad($imagen_devolucion,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->imagen_devolucion,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->imagen_devolucions as $imagen_devolucion) {
				$this->deepSave($imagen_devolucion,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->imagen_devolucions as $imagen_devolucion) {
				$this->deepSave($imagen_devolucion,$isDeep,$deepLoadType,$clases,false);
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
	
	
	
	
	
	
	
	public function getimagen_devolucion() : ?imagen_devolucion {	
		/*
		imagen_devolucion_logic_add::checkimagen_devolucionToGet($this->imagen_devolucion,$this->datosCliente);
		imagen_devolucion_logic_add::updateimagen_devolucionToGet($this->imagen_devolucion);
		*/
			
		return $this->imagen_devolucion;
	}
		
	public function setimagen_devolucion(imagen_devolucion $newimagen_devolucion) {
		$this->imagen_devolucion = $newimagen_devolucion;
	}
	
	public function getimagen_devolucions() : array {		
		/*
		imagen_devolucion_logic_add::checkimagen_devolucionToGets($this->imagen_devolucions,$this->datosCliente);
		
		foreach ($this->imagen_devolucions as $imagen_devolucionLocal ) {
			imagen_devolucion_logic_add::updateimagen_devolucionToGet($imagen_devolucionLocal);
		}
		*/
		
		return $this->imagen_devolucions;
	}
	
	public function setimagen_devolucions(array $newimagen_devolucions) {
		$this->imagen_devolucions = $newimagen_devolucions;
	}
	
	public function getimagen_devolucionDataAccess() : imagen_devolucion_data {
		return $this->imagen_devolucionDataAccess;
	}
	
	public function setimagen_devolucionDataAccess(imagen_devolucion_data $newimagen_devolucionDataAccess) {
		$this->imagen_devolucionDataAccess = $newimagen_devolucionDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        imagen_devolucion_carga::$CONTROLLER;;        
		
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
