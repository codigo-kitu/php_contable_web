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

namespace com\bydan\contabilidad\contabilidad\fuente\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\fuente\util\fuente_carga;
use com\bydan\contabilidad\contabilidad\fuente\util\fuente_param_return;


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

use com\bydan\contabilidad\contabilidad\fuente\util\fuente_util;
use com\bydan\contabilidad\contabilidad\fuente\business\entity\fuente;
use com\bydan\contabilidad\contabilidad\fuente\business\data\fuente_data;

//FK


//REL


use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\entity\asiento_predefinido;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\data\asiento_predefinido_data;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\logic\asiento_predefinido_logic;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;

use com\bydan\contabilidad\contabilidad\asiento_automatico\business\entity\asiento_automatico;
use com\bydan\contabilidad\contabilidad\asiento_automatico\business\data\asiento_automatico_data;
use com\bydan\contabilidad\contabilidad\asiento_automatico\business\logic\asiento_automatico_logic;
use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_util;

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\data\asiento_data;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

//REL DETALLES

use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_carga;



class fuente_logic  extends GeneralEntityLogic implements fuente_logicI {	
	/*GENERAL*/
	public fuente_data $fuenteDataAccess;
	//public ?fuente_logic_add $fuenteLogicAdditional=null;
	public ?fuente $fuente;
	public array $fuentes;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->fuenteDataAccess = new fuente_data();			
			$this->fuentes = array();
			$this->fuente = new fuente();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->fuenteLogicAdditional = new fuente_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->fuenteLogicAdditional==null) {
		//	$this->fuenteLogicAdditional=new fuente_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->fuenteDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->fuenteDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->fuenteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->fuenteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->fuentes = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->fuentes=$this->fuenteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				fuente_util::refrescarFKDescripciones($this->fuentes);
			}
			
			//fuente_logic_add::checkfuenteToGets($this->fuentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->fuentes);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->fuentes = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->fuentes=$this->fuenteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				fuente_util::refrescarFKDescripciones($this->fuentes);
			}
			
			//fuente_logic_add::checkfuenteToGets($this->fuentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->fuentes);
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
		$this->fuente = new fuente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->fuente=$this->fuenteDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->fuente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				fuente_util::refrescarFKDescripcion($this->fuente);
			}
						
			//fuente_logic_add::checkfuenteToGet($this->fuente,$this->datosCliente);
			//fuente_logic_add::updatefuenteToGet($this->fuente);
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
		$this->fuente = new  fuente();
		  		  
        try {		
			$this->fuente=$this->fuenteDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->fuente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				fuente_util::refrescarFKDescripcion($this->fuente);
			}
			
			//fuente_logic_add::checkfuenteToGet($this->fuente,$this->datosCliente);
			//fuente_logic_add::updatefuenteToGet($this->fuente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?fuente {
		$fuenteLogic = new  fuente_logic();
		  		  
        try {		
			$fuenteLogic->setConnexion($connexion);			
			$fuenteLogic->getEntity($id);			
			return $fuenteLogic->getfuente();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->fuente = new  fuente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->fuente=$this->fuenteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->fuente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				fuente_util::refrescarFKDescripcion($this->fuente);
			}
			
			//fuente_logic_add::checkfuenteToGet($this->fuente,$this->datosCliente);
			//fuente_logic_add::updatefuenteToGet($this->fuente);
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
		$this->fuente = new  fuente();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->fuente=$this->fuenteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->fuente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				fuente_util::refrescarFKDescripcion($this->fuente);
			}
			
			//fuente_logic_add::checkfuenteToGet($this->fuente,$this->datosCliente);
			//fuente_logic_add::updatefuenteToGet($this->fuente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?fuente {
		$fuenteLogic = new  fuente_logic();
		  		  
        try {		
			$fuenteLogic->setConnexion($connexion);			
			$fuenteLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $fuenteLogic->getfuente();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->fuentes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->fuentes=$this->fuenteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				fuente_util::refrescarFKDescripciones($this->fuentes);
			}
			
			//fuente_logic_add::checkfuenteToGets($this->fuentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->fuentes);			
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
		$this->fuentes = array();
		  		  
        try {			
			$this->fuentes=$this->fuenteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				fuente_util::refrescarFKDescripciones($this->fuentes);
			}
			
			//fuente_logic_add::checkfuenteToGets($this->fuentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->fuentes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->fuentes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->fuentes=$this->fuenteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				fuente_util::refrescarFKDescripciones($this->fuentes);
			}
			
			//fuente_logic_add::checkfuenteToGets($this->fuentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->fuentes);
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
		$this->fuentes = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->fuentes=$this->fuenteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				fuente_util::refrescarFKDescripciones($this->fuentes);
			}
			
			//fuente_logic_add::checkfuenteToGets($this->fuentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->fuentes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$fuenteLogic = new  fuente_logic();
		  		  
        try {		
			$fuenteLogic->setConnexion($connexion);			
			$fuenteLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $fuenteLogic->getfuentes();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->fuentes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->fuentes=$this->fuenteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				fuente_util::refrescarFKDescripciones($this->fuentes);
			}
			
			//fuente_logic_add::checkfuenteToGets($this->fuentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->fuentes);
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
		$this->fuentes = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->fuentes=$this->fuenteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				fuente_util::refrescarFKDescripciones($this->fuentes);
			}
			
			//fuente_logic_add::checkfuenteToGets($this->fuentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->fuentes);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->fuentes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->fuentes=$this->fuenteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				fuente_util::refrescarFKDescripciones($this->fuentes);
			}
			
			//fuente_logic_add::checkfuenteToGets($this->fuentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->fuentes);
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
		$this->fuentes = array();
		  		  
        try {			
			$this->fuentes=$this->fuenteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				fuente_util::refrescarFKDescripciones($this->fuentes);
			}	
			
			//fuente_logic_add::checkfuenteToGets($this->fuentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->fuentes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->fuentes = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->fuentes=$this->fuenteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				fuente_util::refrescarFKDescripciones($this->fuentes);
			}
			
			//fuente_logic_add::checkfuenteToGets($this->fuentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->fuentes);
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
		$this->fuentes = array();
		  		  
        try {		
			$this->fuentes=$this->fuenteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				fuente_util::refrescarFKDescripciones($this->fuentes);
			}
			
			//fuente_logic_add::checkfuenteToGets($this->fuentes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->fuentes);

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
						
			//fuente_logic_add::checkfuenteToSave($this->fuente,$this->datosCliente,$this->connexion);	       
			//fuente_logic_add::updatefuenteToSave($this->fuente);			
			fuente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->fuente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->fuenteLogicAdditional->checkGeneralEntityToSave($this,$this->fuente,$this->datosCliente,$this->connexion);
			
			
			fuente_data::save($this->fuente, $this->connexion);	    	       	 				
			//fuente_logic_add::checkfuenteToSaveAfter($this->fuente,$this->datosCliente,$this->connexion);			
			//$this->fuenteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->fuente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->fuente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->fuente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				fuente_util::refrescarFKDescripcion($this->fuente);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->fuente->getIsDeleted()) {
				$this->fuente=null;
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
						
			/*fuente_logic_add::checkfuenteToSave($this->fuente,$this->datosCliente,$this->connexion);*/	        
			//fuente_logic_add::updatefuenteToSave($this->fuente);			
			//$this->fuenteLogicAdditional->checkGeneralEntityToSave($this,$this->fuente,$this->datosCliente,$this->connexion);			
			fuente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->fuente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			fuente_data::save($this->fuente, $this->connexion);	    	       	 						
			/*fuente_logic_add::checkfuenteToSaveAfter($this->fuente,$this->datosCliente,$this->connexion);*/			
			//$this->fuenteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->fuente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->fuente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->fuente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				fuente_util::refrescarFKDescripcion($this->fuente);				
			}
			
			if($this->fuente->getIsDeleted()) {
				$this->fuente=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(fuente $fuente,Connexion $connexion)  {
		$fuenteLogic = new  fuente_logic();		  		  
        try {		
			$fuenteLogic->setConnexion($connexion);			
			$fuenteLogic->setfuente($fuente);			
			$fuenteLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*fuente_logic_add::checkfuenteToSaves($this->fuentes,$this->datosCliente,$this->connexion);*/	        	
			//$this->fuenteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->fuentes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->fuentes as $fuenteLocal) {				
								
				//fuente_logic_add::updatefuenteToSave($fuenteLocal);	        	
				fuente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$fuenteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				fuente_data::save($fuenteLocal, $this->connexion);				
			}
			
			/*fuente_logic_add::checkfuenteToSavesAfter($this->fuentes,$this->datosCliente,$this->connexion);*/			
			//$this->fuenteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->fuentes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				fuente_util::refrescarFKDescripciones($this->fuentes);
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
			/*fuente_logic_add::checkfuenteToSaves($this->fuentes,$this->datosCliente,$this->connexion);*/			
			//$this->fuenteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->fuentes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->fuentes as $fuenteLocal) {				
								
				//fuente_logic_add::updatefuenteToSave($fuenteLocal);	        	
				fuente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$fuenteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				fuente_data::save($fuenteLocal, $this->connexion);				
			}			
			
			/*fuente_logic_add::checkfuenteToSavesAfter($this->fuentes,$this->datosCliente,$this->connexion);*/			
			//$this->fuenteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->fuentes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				fuente_util::refrescarFKDescripciones($this->fuentes);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $fuentes,Connexion $connexion)  {
		$fuenteLogic = new  fuente_logic();
		  		  
        try {		
			$fuenteLogic->setConnexion($connexion);			
			$fuenteLogic->setfuentes($fuentes);			
			$fuenteLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$fuentesAux=array();
		
		foreach($this->fuentes as $fuente) {
			if($fuente->getIsDeleted()==false) {
				$fuentesAux[]=$fuente;
			}
		}
		
		$this->fuentes=$fuentesAux;
	}
	
	public function updateToGetsAuxiliar(array &$fuentes) {
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
	
	
	
	public function saveRelacionesWithConnection($fuente,$asientopredefinidos,$asientoautomaticos,$asientos) {
		$this->saveRelacionesBase($fuente,$asientopredefinidos,$asientoautomaticos,$asientos,true);
	}

	public function saveRelaciones($fuente,$asientopredefinidos,$asientoautomaticos,$asientos) {
		$this->saveRelacionesBase($fuente,$asientopredefinidos,$asientoautomaticos,$asientos,false);
	}

	public function saveRelacionesBase($fuente,$asientopredefinidos=array(),$asientoautomaticos=array(),$asientos=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$fuente->setasiento_predefinidos($asientopredefinidos);
			$fuente->setasiento_automaticos($asientoautomaticos);
			$fuente->setasientos($asientos);
			$this->setfuente($fuente);

				if(($this->fuente->getIsNew() || $this->fuente->getIsChanged()) && !$this->fuente->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($asientopredefinidos,$asientoautomaticos,$asientos);

				} else if($this->fuente->getIsDeleted()) {
					$this->saveRelacionesDetalles($asientopredefinidos,$asientoautomaticos,$asientos);
					$this->save();
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
	
	
	public function saveRelacionesDetalles($asientopredefinidos=array(),$asientoautomaticos=array(),$asientos=array()) {
		try {
	

			$idfuenteActual=$this->getfuente()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_predefinido_carga.php');
			asiento_predefinido_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$asientopredefinidoLogic_Desde_fuente=new asiento_predefinido_logic();
			$asientopredefinidoLogic_Desde_fuente->setasiento_predefinidos($asientopredefinidos);

			$asientopredefinidoLogic_Desde_fuente->setConnexion($this->getConnexion());
			$asientopredefinidoLogic_Desde_fuente->setDatosCliente($this->datosCliente);

			foreach($asientopredefinidoLogic_Desde_fuente->getasiento_predefinidos() as $asientopredefinido_Desde_fuente) {
				$asientopredefinido_Desde_fuente->setid_fuente($idfuenteActual);

				$asientopredefinidoLogic_Desde_fuente->setasiento_predefinido($asientopredefinido_Desde_fuente);
				$asientopredefinidoLogic_Desde_fuente->save();

				$idasiento_predefinidoActual=$asiento_predefinido_Desde_fuente->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_predefinido_detalle_carga.php');
				asiento_predefinido_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$asientopredefinidodetalleLogic_Desde_asiento_predefinido=new asiento_predefinido_detalle_logic();

				if($asiento_predefinido_Desde_fuente->getasiento_predefinido_detalles()==null){
					$asiento_predefinido_Desde_fuente->setasiento_predefinido_detalles(array());
				}

				$asientopredefinidodetalleLogic_Desde_asiento_predefinido->setasiento_predefinido_detalles($asiento_predefinido_Desde_fuente->getasiento_predefinido_detalles());

				$asientopredefinidodetalleLogic_Desde_asiento_predefinido->setConnexion($this->getConnexion());
				$asientopredefinidodetalleLogic_Desde_asiento_predefinido->setDatosCliente($this->datosCliente);

				foreach($asientopredefinidodetalleLogic_Desde_asiento_predefinido->getasiento_predefinido_detalles() as $asientopredefinidodetalle_Desde_asiento_predefinido) {
					$asientopredefinidodetalle_Desde_asiento_predefinido->setid_asiento_predefinido($idasiento_predefinidoActual);
				}

				$asientopredefinidodetalleLogic_Desde_asiento_predefinido->saves();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_carga.php');
				asiento_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$asientoLogic_Desde_asiento_predefinido=new asiento_logic();

				if($asiento_predefinido_Desde_fuente->getasientos()==null){
					$asiento_predefinido_Desde_fuente->setasientos(array());
				}

				$asientoLogic_Desde_asiento_predefinido->setasientos($asiento_predefinido_Desde_fuente->getasientos());

				$asientoLogic_Desde_asiento_predefinido->setConnexion($this->getConnexion());
				$asientoLogic_Desde_asiento_predefinido->setDatosCliente($this->datosCliente);

				foreach($asientoLogic_Desde_asiento_predefinido->getasientos() as $asiento_Desde_asiento_predefinido) {
					$asiento_Desde_asiento_predefinido->setid_asiento_predefinido($idasiento_predefinidoActual);

					$asientoLogic_Desde_asiento_predefinido->setasiento($asiento_Desde_asiento_predefinido);
					$asientoLogic_Desde_asiento_predefinido->save();

					$idasientoActual=$asiento_Desde_asiento_predefinido->getId();

					include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_detalle_carga.php');
					asiento_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

					$asientodetalleLogic_Desde_asiento=new asiento_detalle_logic();

					if($asiento_Desde_asiento_predefinido->getasiento_detalles()==null){
						$asiento_Desde_asiento_predefinido->setasiento_detalles(array());
					}

					$asientodetalleLogic_Desde_asiento->setasiento_detalles($asiento_Desde_asiento_predefinido->getasiento_detalles());

					$asientodetalleLogic_Desde_asiento->setConnexion($this->getConnexion());
					$asientodetalleLogic_Desde_asiento->setDatosCliente($this->datosCliente);

					foreach($asientodetalleLogic_Desde_asiento->getasiento_detalles() as $asientodetalle_Desde_asiento) {
						$asientodetalle_Desde_asiento->setid_asiento($idasientoActual);
					}

					$asientodetalleLogic_Desde_asiento->saves();
				}

			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_automatico_carga.php');
			asiento_automatico_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$asientoautomaticoLogic_Desde_fuente=new asiento_automatico_logic();
			$asientoautomaticoLogic_Desde_fuente->setasiento_automaticos($asientoautomaticos);

			$asientoautomaticoLogic_Desde_fuente->setConnexion($this->getConnexion());
			$asientoautomaticoLogic_Desde_fuente->setDatosCliente($this->datosCliente);

			foreach($asientoautomaticoLogic_Desde_fuente->getasiento_automaticos() as $asientoautomatico_Desde_fuente) {
				$asientoautomatico_Desde_fuente->setid_fuente($idfuenteActual);

				$asientoautomaticoLogic_Desde_fuente->setasiento_automatico($asientoautomatico_Desde_fuente);
				$asientoautomaticoLogic_Desde_fuente->save();

				$idasiento_automaticoActual=$asiento_automatico_Desde_fuente->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_automatico_detalle_carga.php');
				asiento_automatico_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$asientoautomaticodetalleLogic_Desde_asiento_automatico=new asiento_automatico_detalle_logic();

				if($asiento_automatico_Desde_fuente->getasiento_automatico_detalles()==null){
					$asiento_automatico_Desde_fuente->setasiento_automatico_detalles(array());
				}

				$asientoautomaticodetalleLogic_Desde_asiento_automatico->setasiento_automatico_detalles($asiento_automatico_Desde_fuente->getasiento_automatico_detalles());

				$asientoautomaticodetalleLogic_Desde_asiento_automatico->setConnexion($this->getConnexion());
				$asientoautomaticodetalleLogic_Desde_asiento_automatico->setDatosCliente($this->datosCliente);

				foreach($asientoautomaticodetalleLogic_Desde_asiento_automatico->getasiento_automatico_detalles() as $asientoautomaticodetalle_Desde_asiento_automatico) {
					$asientoautomaticodetalle_Desde_asiento_automatico->setid_asiento_automatico($idasiento_automaticoActual);
				}

				$asientoautomaticodetalleLogic_Desde_asiento_automatico->saves();
			}


			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_carga.php');
			asiento_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$asientoLogic_Desde_fuente=new asiento_logic();
			$asientoLogic_Desde_fuente->setasientos($asientos);

			$asientoLogic_Desde_fuente->setConnexion($this->getConnexion());
			$asientoLogic_Desde_fuente->setDatosCliente($this->datosCliente);

			foreach($asientoLogic_Desde_fuente->getasientos() as $asiento_Desde_fuente) {
				$asiento_Desde_fuente->setid_fuente($idfuenteActual);

				$asientoLogic_Desde_fuente->setasiento($asiento_Desde_fuente);
				$asientoLogic_Desde_fuente->save();

				$idasientoActual=$asiento_Desde_fuente->getId();

				include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/asiento_detalle_carga.php');
				asiento_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

				$asientodetalleLogic_Desde_asiento=new asiento_detalle_logic();

				if($asiento_Desde_fuente->getasiento_detalles()==null){
					$asiento_Desde_fuente->setasiento_detalles(array());
				}

				$asientodetalleLogic_Desde_asiento->setasiento_detalles($asiento_Desde_fuente->getasiento_detalles());

				$asientodetalleLogic_Desde_asiento->setConnexion($this->getConnexion());
				$asientodetalleLogic_Desde_asiento->setDatosCliente($this->datosCliente);

				foreach($asientodetalleLogic_Desde_asiento->getasiento_detalles() as $asientodetalle_Desde_asiento) {
					$asientodetalle_Desde_asiento->setid_asiento($idasientoActual);
				}

				$asientodetalleLogic_Desde_asiento->saves();
			}


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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $fuentes,fuente_param_return $fuenteParameterGeneral) : fuente_param_return {
		$fuenteReturnGeneral=new fuente_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $fuenteReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $fuentes,fuente_param_return $fuenteParameterGeneral) : fuente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$fuenteReturnGeneral=new fuente_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $fuenteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $fuentes,fuente $fuente,fuente_param_return $fuenteParameterGeneral,bool $isEsNuevofuente,array $clases) : fuente_param_return {
		 try {	
			$fuenteReturnGeneral=new fuente_param_return();
	
			$fuenteReturnGeneral->setfuente($fuente);
			$fuenteReturnGeneral->setfuentes($fuentes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$fuenteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $fuenteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $fuentes,fuente $fuente,fuente_param_return $fuenteParameterGeneral,bool $isEsNuevofuente,array $clases) : fuente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$fuenteReturnGeneral=new fuente_param_return();
	
			$fuenteReturnGeneral->setfuente($fuente);
			$fuenteReturnGeneral->setfuentes($fuentes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$fuenteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $fuenteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $fuentes,fuente $fuente,fuente_param_return $fuenteParameterGeneral,bool $isEsNuevofuente,array $clases) : fuente_param_return {
		 try {	
			$fuenteReturnGeneral=new fuente_param_return();
	
			$fuenteReturnGeneral->setfuente($fuente);
			$fuenteReturnGeneral->setfuentes($fuentes);
			
			
			
			return $fuenteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $fuentes,fuente $fuente,fuente_param_return $fuenteParameterGeneral,bool $isEsNuevofuente,array $clases) : fuente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$fuenteReturnGeneral=new fuente_param_return();
	
			$fuenteReturnGeneral->setfuente($fuente);
			$fuenteReturnGeneral->setfuentes($fuentes);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $fuenteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,fuente $fuente,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,fuente $fuente,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		fuente_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(fuente $fuente,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//fuente_logic_add::updatefuenteToGet($this->fuente);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$fuente->setasiento_predefinidos($this->fuenteDataAccess->getasiento_predefinidos($this->connexion,$fuente));
		$fuente->setasiento_automaticos($this->fuenteDataAccess->getasiento_automaticos($this->connexion,$fuente));
		$fuente->setasientos($this->fuenteDataAccess->getasientos($this->connexion,$fuente));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$fuente->setasiento_predefinidos($this->fuenteDataAccess->getasiento_predefinidos($this->connexion,$fuente));

				if($this->isConDeep) {
					$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
					$asientopredefinidoLogic->setasiento_predefinidos($fuente->getasiento_predefinidos());
					$classesLocal=asiento_predefinido_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$asientopredefinidoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					asiento_predefinido_util::refrescarFKDescripciones($asientopredefinidoLogic->getasiento_predefinidos());
					$fuente->setasiento_predefinidos($asientopredefinidoLogic->getasiento_predefinidos());
				}

				continue;
			}

			if($clas->clas==asiento_automatico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$fuente->setasiento_automaticos($this->fuenteDataAccess->getasiento_automaticos($this->connexion,$fuente));

				if($this->isConDeep) {
					$asientoautomaticoLogic= new asiento_automatico_logic($this->connexion);
					$asientoautomaticoLogic->setasiento_automaticos($fuente->getasiento_automaticos());
					$classesLocal=asiento_automatico_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$asientoautomaticoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					asiento_automatico_util::refrescarFKDescripciones($asientoautomaticoLogic->getasiento_automaticos());
					$fuente->setasiento_automaticos($asientoautomaticoLogic->getasiento_automaticos());
				}

				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$fuente->setasientos($this->fuenteDataAccess->getasientos($this->connexion,$fuente));

				if($this->isConDeep) {
					$asientoLogic= new asiento_logic($this->connexion);
					$asientoLogic->setasientos($fuente->getasientos());
					$classesLocal=asiento_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$asientoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					asiento_util::refrescarFKDescripciones($asientoLogic->getasientos());
					$fuente->setasientos($asientoLogic->getasientos());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_predefinido::$class);
			$fuente->setasiento_predefinidos($this->fuenteDataAccess->getasiento_predefinidos($this->connexion,$fuente));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_automatico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_automatico::$class);
			$fuente->setasiento_automaticos($this->fuenteDataAccess->getasiento_automaticos($this->connexion,$fuente));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento::$class);
			$fuente->setasientos($this->fuenteDataAccess->getasientos($this->connexion,$fuente));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$fuente->setasiento_predefinidos($this->fuenteDataAccess->getasiento_predefinidos($this->connexion,$fuente));

		foreach($fuente->getasiento_predefinidos() as $asientopredefinido) {
			$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
			$asientopredefinidoLogic->deepLoad($asientopredefinido,$isDeep,$deepLoadType,$clases);
		}

		$fuente->setasiento_automaticos($this->fuenteDataAccess->getasiento_automaticos($this->connexion,$fuente));

		foreach($fuente->getasiento_automaticos() as $asientoautomatico) {
			$asientoautomaticoLogic= new asiento_automatico_logic($this->connexion);
			$asientoautomaticoLogic->deepLoad($asientoautomatico,$isDeep,$deepLoadType,$clases);
		}

		$fuente->setasientos($this->fuenteDataAccess->getasientos($this->connexion,$fuente));

		foreach($fuente->getasientos() as $asiento) {
			$asientoLogic= new asiento_logic($this->connexion);
			$asientoLogic->deepLoad($asiento,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$fuente->setasiento_predefinidos($this->fuenteDataAccess->getasiento_predefinidos($this->connexion,$fuente));

				foreach($fuente->getasiento_predefinidos() as $asientopredefinido) {
					$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
					$asientopredefinidoLogic->deepLoad($asientopredefinido,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==asiento_automatico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$fuente->setasiento_automaticos($this->fuenteDataAccess->getasiento_automaticos($this->connexion,$fuente));

				foreach($fuente->getasiento_automaticos() as $asientoautomatico) {
					$asientoautomaticoLogic= new asiento_automatico_logic($this->connexion);
					$asientoautomaticoLogic->deepLoad($asientoautomatico,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$fuente->setasientos($this->fuenteDataAccess->getasientos($this->connexion,$fuente));

				foreach($fuente->getasientos() as $asiento) {
					$asientoLogic= new asiento_logic($this->connexion);
					$asientoLogic->deepLoad($asiento,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_predefinido::$class);
			$fuente->setasiento_predefinidos($this->fuenteDataAccess->getasiento_predefinidos($this->connexion,$fuente));

			foreach($fuente->getasiento_predefinidos() as $asientopredefinido) {
				$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
				$asientopredefinidoLogic->deepLoad($asientopredefinido,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_automatico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_automatico::$class);
			$fuente->setasiento_automaticos($this->fuenteDataAccess->getasiento_automaticos($this->connexion,$fuente));

			foreach($fuente->getasiento_automaticos() as $asientoautomatico) {
				$asientoautomaticoLogic= new asiento_automatico_logic($this->connexion);
				$asientoautomaticoLogic->deepLoad($asientoautomatico,$isDeep,$deepLoadType,$clases);
			}
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento::$class);
			$fuente->setasientos($this->fuenteDataAccess->getasientos($this->connexion,$fuente));

			foreach($fuente->getasientos() as $asiento) {
				$asientoLogic= new asiento_logic($this->connexion);
				$asientoLogic->deepLoad($asiento,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(fuente $fuente,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//fuente_logic_add::updatefuenteToSave($this->fuente);			
			
			if(!$paraDeleteCascade) {				
				fuente_data::save($fuente, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($fuente->getasiento_predefinidos() as $asientopredefinido) {
			$asientopredefinido->setid_fuente($fuente->getId());
			asiento_predefinido_data::save($asientopredefinido,$this->connexion);
		}


		foreach($fuente->getasiento_automaticos() as $asientoautomatico) {
			$asientoautomatico->setid_fuente($fuente->getId());
			asiento_automatico_data::save($asientoautomatico,$this->connexion);
		}


		foreach($fuente->getasientos() as $asiento) {
			$asiento->setid_fuente($fuente->getId());
			asiento_data::save($asiento,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($fuente->getasiento_predefinidos() as $asientopredefinido) {
					$asientopredefinido->setid_fuente($fuente->getId());
					asiento_predefinido_data::save($asientopredefinido,$this->connexion);
				}

				continue;
			}

			if($clas->clas==asiento_automatico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($fuente->getasiento_automaticos() as $asientoautomatico) {
					$asientoautomatico->setid_fuente($fuente->getId());
					asiento_automatico_data::save($asientoautomatico,$this->connexion);
				}

				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($fuente->getasientos() as $asiento) {
					$asiento->setid_fuente($fuente->getId());
					asiento_data::save($asiento,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_predefinido::$class);

			foreach($fuente->getasiento_predefinidos() as $asientopredefinido) {
				$asientopredefinido->setid_fuente($fuente->getId());
				asiento_predefinido_data::save($asientopredefinido,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_automatico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_automatico::$class);

			foreach($fuente->getasiento_automaticos() as $asientoautomatico) {
				$asientoautomatico->setid_fuente($fuente->getId());
				asiento_automatico_data::save($asientoautomatico,$this->connexion);
			}

		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento::$class);

			foreach($fuente->getasientos() as $asiento) {
				$asiento->setid_fuente($fuente->getId());
				asiento_data::save($asiento,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($fuente->getasiento_predefinidos() as $asientopredefinido) {
			$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
			$asientopredefinido->setid_fuente($fuente->getId());
			asiento_predefinido_data::save($asientopredefinido,$this->connexion);
			$asientopredefinidoLogic->deepSave($asientopredefinido,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($fuente->getasiento_automaticos() as $asientoautomatico) {
			$asientoautomaticoLogic= new asiento_automatico_logic($this->connexion);
			$asientoautomatico->setid_fuente($fuente->getId());
			asiento_automatico_data::save($asientoautomatico,$this->connexion);
			$asientoautomaticoLogic->deepSave($asientoautomatico,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}


		foreach($fuente->getasientos() as $asiento) {
			$asientoLogic= new asiento_logic($this->connexion);
			$asiento->setid_fuente($fuente->getId());
			asiento_data::save($asiento,$this->connexion);
			$asientoLogic->deepSave($asiento,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($fuente->getasiento_predefinidos() as $asientopredefinido) {
					$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
					$asientopredefinido->setid_fuente($fuente->getId());
					asiento_predefinido_data::save($asientopredefinido,$this->connexion);
					$asientopredefinidoLogic->deepSave($asientopredefinido,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==asiento_automatico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($fuente->getasiento_automaticos() as $asientoautomatico) {
					$asientoautomaticoLogic= new asiento_automatico_logic($this->connexion);
					$asientoautomatico->setid_fuente($fuente->getId());
					asiento_automatico_data::save($asientoautomatico,$this->connexion);
					$asientoautomaticoLogic->deepSave($asientoautomatico,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}

			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($fuente->getasientos() as $asiento) {
					$asientoLogic= new asiento_logic($this->connexion);
					$asiento->setid_fuente($fuente->getId());
					asiento_data::save($asiento,$this->connexion);
					$asientoLogic->deepSave($asiento,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {



		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_predefinido::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_predefinido::$class);

			foreach($fuente->getasiento_predefinidos() as $asientopredefinido) {
				$asientopredefinidoLogic= new asiento_predefinido_logic($this->connexion);
				$asientopredefinido->setid_fuente($fuente->getId());
				asiento_predefinido_data::save($asientopredefinido,$this->connexion);
				$asientopredefinidoLogic->deepSave($asientopredefinido,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento_automatico::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento_automatico::$class);

			foreach($fuente->getasiento_automaticos() as $asientoautomatico) {
				$asientoautomaticoLogic= new asiento_automatico_logic($this->connexion);
				$asientoautomatico->setid_fuente($fuente->getId());
				asiento_automatico_data::save($asientoautomatico,$this->connexion);
				$asientoautomaticoLogic->deepSave($asientoautomatico,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==asiento::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(asiento::$class);

			foreach($fuente->getasientos() as $asiento) {
				$asientoLogic= new asiento_logic($this->connexion);
				$asiento->setid_fuente($fuente->getId());
				asiento_data::save($asiento,$this->connexion);
				$asientoLogic->deepSave($asiento,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				fuente_data::save($fuente, $this->connexion);
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
			
			$this->deepLoad($this->fuente,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->fuentes as $fuente) {
				$this->deepLoad($fuente,$isDeep,$deepLoadType,$clases);
								
				fuente_util::refrescarFKDescripciones($this->fuentes);
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
			
			foreach($this->fuentes as $fuente) {
				$this->deepLoad($fuente,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->fuente,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->fuentes as $fuente) {
				$this->deepSave($fuente,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->fuentes as $fuente) {
				$this->deepSave($fuente,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(asiento_predefinido::$class);
				$classes[]=new Classe(asiento_automatico::$class);
				$classes[]=new Classe(asiento::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==asiento_predefinido::$class) {
						$classes[]=new Classe(asiento_predefinido::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==asiento_automatico::$class) {
						$classes[]=new Classe(asiento_automatico::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas->clas==asiento::$class) {
						$classes[]=new Classe(asiento::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==asiento_predefinido::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento_predefinido::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==asiento_automatico::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento_automatico::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==asiento::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getfuente() : ?fuente {	
		/*
		fuente_logic_add::checkfuenteToGet($this->fuente,$this->datosCliente);
		fuente_logic_add::updatefuenteToGet($this->fuente);
		*/
			
		return $this->fuente;
	}
		
	public function setfuente(fuente $newfuente) {
		$this->fuente = $newfuente;
	}
	
	public function getfuentes() : array {		
		/*
		fuente_logic_add::checkfuenteToGets($this->fuentes,$this->datosCliente);
		
		foreach ($this->fuentes as $fuenteLocal ) {
			fuente_logic_add::updatefuenteToGet($fuenteLocal);
		}
		*/
		
		return $this->fuentes;
	}
	
	public function setfuentes(array $newfuentes) {
		$this->fuentes = $newfuentes;
	}
	
	public function getfuenteDataAccess() : fuente_data {
		return $this->fuenteDataAccess;
	}
	
	public function setfuenteDataAccess(fuente_data $newfuenteDataAccess) {
		$this->fuenteDataAccess = $newfuenteDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        fuente_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
		asiento_predefinido_detalle_logic::$logger;
		asiento_detalle_logic::$logger;
		asiento_automatico_detalle_logic::$logger;
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
