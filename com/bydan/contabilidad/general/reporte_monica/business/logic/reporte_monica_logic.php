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

namespace com\bydan\contabilidad\general\reporte_monica\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\general\reporte_monica\util\reporte_monica_carga;
use com\bydan\contabilidad\general\reporte_monica\util\reporte_monica_param_return;


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

use com\bydan\contabilidad\general\reporte_monica\util\reporte_monica_util;
use com\bydan\contabilidad\general\reporte_monica\business\entity\reporte_monica;
use com\bydan\contabilidad\general\reporte_monica\business\data\reporte_monica_data;

//FK


//REL


//REL DETALLES




class reporte_monica_logic  extends GeneralEntityLogic implements reporte_monica_logicI {	
	/*GENERAL*/
	public reporte_monica_data $reporte_monicaDataAccess;
	//public ?reporte_monica_logic_add $reporte_monicaLogicAdditional=null;
	public ?reporte_monica $reporte_monica;
	public array $reporte_monicas;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->reporte_monicaDataAccess = new reporte_monica_data();			
			$this->reporte_monicas = array();
			$this->reporte_monica = new reporte_monica();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->reporte_monicaLogicAdditional = new reporte_monica_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->reporte_monicaLogicAdditional==null) {
		//	$this->reporte_monicaLogicAdditional=new reporte_monica_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->reporte_monicaDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->reporte_monicaDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->reporte_monicaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->reporte_monicaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->reporte_monicas = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->reporte_monicas=$this->reporte_monicaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				reporte_monica_util::refrescarFKDescripciones($this->reporte_monicas);
			}
			
			//reporte_monica_logic_add::checkreporte_monicaToGets($this->reporte_monicas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->reporte_monicas);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->reporte_monicas = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->reporte_monicas=$this->reporte_monicaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				reporte_monica_util::refrescarFKDescripciones($this->reporte_monicas);
			}
			
			//reporte_monica_logic_add::checkreporte_monicaToGets($this->reporte_monicas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->reporte_monicas);
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
		$this->reporte_monica = new reporte_monica();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->reporte_monica=$this->reporte_monicaDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->reporte_monica,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				reporte_monica_util::refrescarFKDescripcion($this->reporte_monica);
			}
						
			//reporte_monica_logic_add::checkreporte_monicaToGet($this->reporte_monica,$this->datosCliente);
			//reporte_monica_logic_add::updatereporte_monicaToGet($this->reporte_monica);
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
		$this->reporte_monica = new  reporte_monica();
		  		  
        try {		
			$this->reporte_monica=$this->reporte_monicaDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->reporte_monica,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				reporte_monica_util::refrescarFKDescripcion($this->reporte_monica);
			}
			
			//reporte_monica_logic_add::checkreporte_monicaToGet($this->reporte_monica,$this->datosCliente);
			//reporte_monica_logic_add::updatereporte_monicaToGet($this->reporte_monica);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?reporte_monica {
		$reporte_monicaLogic = new  reporte_monica_logic();
		  		  
        try {		
			$reporte_monicaLogic->setConnexion($connexion);			
			$reporte_monicaLogic->getEntity($id);			
			return $reporte_monicaLogic->getreporte_monica();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->reporte_monica = new  reporte_monica();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->reporte_monica=$this->reporte_monicaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->reporte_monica,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				reporte_monica_util::refrescarFKDescripcion($this->reporte_monica);
			}
			
			//reporte_monica_logic_add::checkreporte_monicaToGet($this->reporte_monica,$this->datosCliente);
			//reporte_monica_logic_add::updatereporte_monicaToGet($this->reporte_monica);
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
		$this->reporte_monica = new  reporte_monica();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->reporte_monica=$this->reporte_monicaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->reporte_monica,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				reporte_monica_util::refrescarFKDescripcion($this->reporte_monica);
			}
			
			//reporte_monica_logic_add::checkreporte_monicaToGet($this->reporte_monica,$this->datosCliente);
			//reporte_monica_logic_add::updatereporte_monicaToGet($this->reporte_monica);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?reporte_monica {
		$reporte_monicaLogic = new  reporte_monica_logic();
		  		  
        try {		
			$reporte_monicaLogic->setConnexion($connexion);			
			$reporte_monicaLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $reporte_monicaLogic->getreporte_monica();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->reporte_monicas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->reporte_monicas=$this->reporte_monicaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				reporte_monica_util::refrescarFKDescripciones($this->reporte_monicas);
			}
			
			//reporte_monica_logic_add::checkreporte_monicaToGets($this->reporte_monicas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->reporte_monicas);			
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
		$this->reporte_monicas = array();
		  		  
        try {			
			$this->reporte_monicas=$this->reporte_monicaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				reporte_monica_util::refrescarFKDescripciones($this->reporte_monicas);
			}
			
			//reporte_monica_logic_add::checkreporte_monicaToGets($this->reporte_monicas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->reporte_monicas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->reporte_monicas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->reporte_monicas=$this->reporte_monicaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				reporte_monica_util::refrescarFKDescripciones($this->reporte_monicas);
			}
			
			//reporte_monica_logic_add::checkreporte_monicaToGets($this->reporte_monicas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->reporte_monicas);
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
		$this->reporte_monicas = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->reporte_monicas=$this->reporte_monicaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				reporte_monica_util::refrescarFKDescripciones($this->reporte_monicas);
			}
			
			//reporte_monica_logic_add::checkreporte_monicaToGets($this->reporte_monicas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->reporte_monicas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$reporte_monicaLogic = new  reporte_monica_logic();
		  		  
        try {		
			$reporte_monicaLogic->setConnexion($connexion);			
			$reporte_monicaLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $reporte_monicaLogic->getreporte_monicas();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->reporte_monicas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->reporte_monicas=$this->reporte_monicaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				reporte_monica_util::refrescarFKDescripciones($this->reporte_monicas);
			}
			
			//reporte_monica_logic_add::checkreporte_monicaToGets($this->reporte_monicas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->reporte_monicas);
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
		$this->reporte_monicas = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->reporte_monicas=$this->reporte_monicaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				reporte_monica_util::refrescarFKDescripciones($this->reporte_monicas);
			}
			
			//reporte_monica_logic_add::checkreporte_monicaToGets($this->reporte_monicas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->reporte_monicas);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->reporte_monicas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->reporte_monicas=$this->reporte_monicaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				reporte_monica_util::refrescarFKDescripciones($this->reporte_monicas);
			}
			
			//reporte_monica_logic_add::checkreporte_monicaToGets($this->reporte_monicas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->reporte_monicas);
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
		$this->reporte_monicas = array();
		  		  
        try {			
			$this->reporte_monicas=$this->reporte_monicaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				reporte_monica_util::refrescarFKDescripciones($this->reporte_monicas);
			}	
			
			//reporte_monica_logic_add::checkreporte_monicaToGets($this->reporte_monicas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->reporte_monicas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->reporte_monicas = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->reporte_monicas=$this->reporte_monicaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				reporte_monica_util::refrescarFKDescripciones($this->reporte_monicas);
			}
			
			//reporte_monica_logic_add::checkreporte_monicaToGets($this->reporte_monicas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->reporte_monicas);
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
		$this->reporte_monicas = array();
		  		  
        try {		
			$this->reporte_monicas=$this->reporte_monicaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				reporte_monica_util::refrescarFKDescripciones($this->reporte_monicas);
			}
			
			//reporte_monica_logic_add::checkreporte_monicaToGets($this->reporte_monicas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->reporte_monicas);

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
						
			//reporte_monica_logic_add::checkreporte_monicaToSave($this->reporte_monica,$this->datosCliente,$this->connexion);	       
			//reporte_monica_logic_add::updatereporte_monicaToSave($this->reporte_monica);			
			reporte_monica_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->reporte_monica,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->reporte_monicaLogicAdditional->checkGeneralEntityToSave($this,$this->reporte_monica,$this->datosCliente,$this->connexion);
			
			
			reporte_monica_data::save($this->reporte_monica, $this->connexion);	    	       	 				
			//reporte_monica_logic_add::checkreporte_monicaToSaveAfter($this->reporte_monica,$this->datosCliente,$this->connexion);			
			//$this->reporte_monicaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->reporte_monica,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->reporte_monica,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->reporte_monica,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				reporte_monica_util::refrescarFKDescripcion($this->reporte_monica);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->reporte_monica->getIsDeleted()) {
				$this->reporte_monica=null;
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
						
			/*reporte_monica_logic_add::checkreporte_monicaToSave($this->reporte_monica,$this->datosCliente,$this->connexion);*/	        
			//reporte_monica_logic_add::updatereporte_monicaToSave($this->reporte_monica);			
			//$this->reporte_monicaLogicAdditional->checkGeneralEntityToSave($this,$this->reporte_monica,$this->datosCliente,$this->connexion);			
			reporte_monica_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->reporte_monica,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			reporte_monica_data::save($this->reporte_monica, $this->connexion);	    	       	 						
			/*reporte_monica_logic_add::checkreporte_monicaToSaveAfter($this->reporte_monica,$this->datosCliente,$this->connexion);*/			
			//$this->reporte_monicaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->reporte_monica,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->reporte_monica,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->reporte_monica,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				reporte_monica_util::refrescarFKDescripcion($this->reporte_monica);				
			}
			
			if($this->reporte_monica->getIsDeleted()) {
				$this->reporte_monica=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(reporte_monica $reporte_monica,Connexion $connexion)  {
		$reporte_monicaLogic = new  reporte_monica_logic();		  		  
        try {		
			$reporte_monicaLogic->setConnexion($connexion);			
			$reporte_monicaLogic->setreporte_monica($reporte_monica);			
			$reporte_monicaLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*reporte_monica_logic_add::checkreporte_monicaToSaves($this->reporte_monicas,$this->datosCliente,$this->connexion);*/	        	
			//$this->reporte_monicaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->reporte_monicas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->reporte_monicas as $reporte_monicaLocal) {				
								
				//reporte_monica_logic_add::updatereporte_monicaToSave($reporte_monicaLocal);	        	
				reporte_monica_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$reporte_monicaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				reporte_monica_data::save($reporte_monicaLocal, $this->connexion);				
			}
			
			/*reporte_monica_logic_add::checkreporte_monicaToSavesAfter($this->reporte_monicas,$this->datosCliente,$this->connexion);*/			
			//$this->reporte_monicaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->reporte_monicas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				reporte_monica_util::refrescarFKDescripciones($this->reporte_monicas);
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
			/*reporte_monica_logic_add::checkreporte_monicaToSaves($this->reporte_monicas,$this->datosCliente,$this->connexion);*/			
			//$this->reporte_monicaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->reporte_monicas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->reporte_monicas as $reporte_monicaLocal) {				
								
				//reporte_monica_logic_add::updatereporte_monicaToSave($reporte_monicaLocal);	        	
				reporte_monica_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$reporte_monicaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				reporte_monica_data::save($reporte_monicaLocal, $this->connexion);				
			}			
			
			/*reporte_monica_logic_add::checkreporte_monicaToSavesAfter($this->reporte_monicas,$this->datosCliente,$this->connexion);*/			
			//$this->reporte_monicaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->reporte_monicas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				reporte_monica_util::refrescarFKDescripciones($this->reporte_monicas);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $reporte_monicas,Connexion $connexion)  {
		$reporte_monicaLogic = new  reporte_monica_logic();
		  		  
        try {		
			$reporte_monicaLogic->setConnexion($connexion);			
			$reporte_monicaLogic->setreporte_monicas($reporte_monicas);			
			$reporte_monicaLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$reporte_monicasAux=array();
		
		foreach($this->reporte_monicas as $reporte_monica) {
			if($reporte_monica->getIsDeleted()==false) {
				$reporte_monicasAux[]=$reporte_monica;
			}
		}
		
		$this->reporte_monicas=$reporte_monicasAux;
	}
	
	public function updateToGetsAuxiliar(array &$reporte_monicas) {
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
	
	
	
	public function saveRelacionesWithConnection($reporte_monica) {
		$this->saveRelacionesBase($reporte_monica,true);
	}

	public function saveRelaciones($reporte_monica) {
		$this->saveRelacionesBase($reporte_monica,false);
	}

	public function saveRelacionesBase($reporte_monica,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setreporte_monica($reporte_monica);

			if(true) {

				//reporte_monica_logic_add::updateRelacionesToSave($reporte_monica,$this);

				if(($this->reporte_monica->getIsNew() || $this->reporte_monica->getIsChanged()) && !$this->reporte_monica->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->reporte_monica->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//reporte_monica_logic_add::updateRelacionesToSaveAfter($reporte_monica,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $reporte_monicas,reporte_monica_param_return $reporte_monicaParameterGeneral) : reporte_monica_param_return {
		$reporte_monicaReturnGeneral=new reporte_monica_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $reporte_monicaReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $reporte_monicas,reporte_monica_param_return $reporte_monicaParameterGeneral) : reporte_monica_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$reporte_monicaReturnGeneral=new reporte_monica_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $reporte_monicaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $reporte_monicas,reporte_monica $reporte_monica,reporte_monica_param_return $reporte_monicaParameterGeneral,bool $isEsNuevoreporte_monica,array $clases) : reporte_monica_param_return {
		 try {	
			$reporte_monicaReturnGeneral=new reporte_monica_param_return();
	
			$reporte_monicaReturnGeneral->setreporte_monica($reporte_monica);
			$reporte_monicaReturnGeneral->setreporte_monicas($reporte_monicas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$reporte_monicaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $reporte_monicaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $reporte_monicas,reporte_monica $reporte_monica,reporte_monica_param_return $reporte_monicaParameterGeneral,bool $isEsNuevoreporte_monica,array $clases) : reporte_monica_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$reporte_monicaReturnGeneral=new reporte_monica_param_return();
	
			$reporte_monicaReturnGeneral->setreporte_monica($reporte_monica);
			$reporte_monicaReturnGeneral->setreporte_monicas($reporte_monicas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$reporte_monicaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $reporte_monicaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $reporte_monicas,reporte_monica $reporte_monica,reporte_monica_param_return $reporte_monicaParameterGeneral,bool $isEsNuevoreporte_monica,array $clases) : reporte_monica_param_return {
		 try {	
			$reporte_monicaReturnGeneral=new reporte_monica_param_return();
	
			$reporte_monicaReturnGeneral->setreporte_monica($reporte_monica);
			$reporte_monicaReturnGeneral->setreporte_monicas($reporte_monicas);
			
			
			
			return $reporte_monicaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $reporte_monicas,reporte_monica $reporte_monica,reporte_monica_param_return $reporte_monicaParameterGeneral,bool $isEsNuevoreporte_monica,array $clases) : reporte_monica_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$reporte_monicaReturnGeneral=new reporte_monica_param_return();
	
			$reporte_monicaReturnGeneral->setreporte_monica($reporte_monica);
			$reporte_monicaReturnGeneral->setreporte_monicas($reporte_monicas);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $reporte_monicaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,reporte_monica $reporte_monica,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,reporte_monica $reporte_monica,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	
	
	public function deepLoad(reporte_monica $reporte_monica,bool $isDeep,string $deepLoadType,array $clases) {
		
		
		try {
			
			
			
			//reporte_monica_logic_add::updatereporte_monicaToGet($this->reporte_monica);
			
			
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		
	}
	
	public function deepSave(reporte_monica $reporte_monica,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		
		
		try {
			
			
			//reporte_monica_logic_add::updatereporte_monicaToSave($this->reporte_monica);			
			
			if(!$paraDeleteCascade) {				
				reporte_monica_data::save($reporte_monica, $this->connexion);
			}
			
			
			
			if($paraDeleteCascade) {				
				reporte_monica_data::save($reporte_monica, $this->connexion);
			}
			
		}catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}	
		
		
	}
		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			$this->deepLoad($this->reporte_monica,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->reporte_monicas as $reporte_monica) {
				$this->deepLoad($reporte_monica,$isDeep,$deepLoadType,$clases);
								
				reporte_monica_util::refrescarFKDescripciones($this->reporte_monicas);
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
			
			foreach($this->reporte_monicas as $reporte_monica) {
				$this->deepLoad($reporte_monica,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->reporte_monica,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->reporte_monicas as $reporte_monica) {
				$this->deepSave($reporte_monica,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->reporte_monicas as $reporte_monica) {
				$this->deepSave($reporte_monica,$isDeep,$deepLoadType,$clases,false);
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
	
	
	
	
	
	
	
	public function getreporte_monica() : ?reporte_monica {	
		/*
		reporte_monica_logic_add::checkreporte_monicaToGet($this->reporte_monica,$this->datosCliente);
		reporte_monica_logic_add::updatereporte_monicaToGet($this->reporte_monica);
		*/
			
		return $this->reporte_monica;
	}
		
	public function setreporte_monica(reporte_monica $newreporte_monica) {
		$this->reporte_monica = $newreporte_monica;
	}
	
	public function getreporte_monicas() : array {		
		/*
		reporte_monica_logic_add::checkreporte_monicaToGets($this->reporte_monicas,$this->datosCliente);
		
		foreach ($this->reporte_monicas as $reporte_monicaLocal ) {
			reporte_monica_logic_add::updatereporte_monicaToGet($reporte_monicaLocal);
		}
		*/
		
		return $this->reporte_monicas;
	}
	
	public function setreporte_monicas(array $newreporte_monicas) {
		$this->reporte_monicas = $newreporte_monicas;
	}
	
	public function getreporte_monicaDataAccess() : reporte_monica_data {
		return $this->reporte_monicaDataAccess;
	}
	
	public function setreporte_monicaDataAccess(reporte_monica_data $newreporte_monicaDataAccess) {
		$this->reporte_monicaDataAccess = $newreporte_monicaDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        reporte_monica_carga::$CONTROLLER;;        
		
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
