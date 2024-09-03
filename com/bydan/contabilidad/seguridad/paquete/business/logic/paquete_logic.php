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

namespace com\bydan\contabilidad\seguridad\paquete\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\paquete\util\paquete_carga;
use com\bydan\contabilidad\seguridad\paquete\util\paquete_param_return;

use com\bydan\contabilidad\seguridad\paquete\presentation\session\paquete_session;

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

use com\bydan\contabilidad\seguridad\paquete\util\paquete_util;
use com\bydan\contabilidad\seguridad\paquete\business\entity\paquete;
use com\bydan\contabilidad\seguridad\paquete\business\data\paquete_data;

//FK


use com\bydan\contabilidad\seguridad\sistema\business\entity\sistema;
use com\bydan\contabilidad\seguridad\sistema\business\data\sistema_data;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_util;

//REL


use com\bydan\contabilidad\seguridad\modulo\business\data\modulo_data;
use com\bydan\contabilidad\seguridad\modulo\business\logic\modulo_logic;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;

//REL DETALLES




class paquete_logic  extends GeneralEntityLogic implements paquete_logicI {	
	/*GENERAL*/
	public paquete_data $paqueteDataAccess;
	//public ?paquete_logic_add $paqueteLogicAdditional=null;
	public ?paquete $paquete;
	public array $paquetes;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->paqueteDataAccess = new paquete_data();			
			$this->paquetes = array();
			$this->paquete = new paquete();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->paqueteLogicAdditional = new paquete_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->paqueteLogicAdditional==null) {
		//	$this->paqueteLogicAdditional=new paquete_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->paqueteDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->paqueteDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->paqueteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->paqueteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->paquetes = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->paquetes=$this->paqueteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				paquete_util::refrescarFKDescripciones($this->paquetes);
			}
			
			//paquete_logic_add::checkpaqueteToGets($this->paquetes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paquetes);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->paquetes = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->paquetes=$this->paqueteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				paquete_util::refrescarFKDescripciones($this->paquetes);
			}
			
			//paquete_logic_add::checkpaqueteToGets($this->paquetes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paquetes);
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
		$this->paquete = new paquete();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->paquete=$this->paqueteDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->paquete,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				paquete_util::refrescarFKDescripcion($this->paquete);
			}
						
			//paquete_logic_add::checkpaqueteToGet($this->paquete,$this->datosCliente);
			//paquete_logic_add::updatepaqueteToGet($this->paquete);
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
		$this->paquete = new  paquete();
		  		  
        try {		
			$this->paquete=$this->paqueteDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->paquete,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				paquete_util::refrescarFKDescripcion($this->paquete);
			}
			
			//paquete_logic_add::checkpaqueteToGet($this->paquete,$this->datosCliente);
			//paquete_logic_add::updatepaqueteToGet($this->paquete);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?paquete {
		$paqueteLogic = new  paquete_logic();
		  		  
        try {		
			$paqueteLogic->setConnexion($connexion);			
			$paqueteLogic->getEntity($id);			
			return $paqueteLogic->getpaquete();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->paquete = new  paquete();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->paquete=$this->paqueteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->paquete,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				paquete_util::refrescarFKDescripcion($this->paquete);
			}
			
			//paquete_logic_add::checkpaqueteToGet($this->paquete,$this->datosCliente);
			//paquete_logic_add::updatepaqueteToGet($this->paquete);
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
		$this->paquete = new  paquete();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->paquete=$this->paqueteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->paquete,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				paquete_util::refrescarFKDescripcion($this->paquete);
			}
			
			//paquete_logic_add::checkpaqueteToGet($this->paquete,$this->datosCliente);
			//paquete_logic_add::updatepaqueteToGet($this->paquete);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?paquete {
		$paqueteLogic = new  paquete_logic();
		  		  
        try {		
			$paqueteLogic->setConnexion($connexion);			
			$paqueteLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $paqueteLogic->getpaquete();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->paquetes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->paquetes=$this->paqueteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				paquete_util::refrescarFKDescripciones($this->paquetes);
			}
			
			//paquete_logic_add::checkpaqueteToGets($this->paquetes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paquetes);			
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
		$this->paquetes = array();
		  		  
        try {			
			$this->paquetes=$this->paqueteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				paquete_util::refrescarFKDescripciones($this->paquetes);
			}
			
			//paquete_logic_add::checkpaqueteToGets($this->paquetes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paquetes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->paquetes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->paquetes=$this->paqueteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				paquete_util::refrescarFKDescripciones($this->paquetes);
			}
			
			//paquete_logic_add::checkpaqueteToGets($this->paquetes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paquetes);
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
		$this->paquetes = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->paquetes=$this->paqueteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				paquete_util::refrescarFKDescripciones($this->paquetes);
			}
			
			//paquete_logic_add::checkpaqueteToGets($this->paquetes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paquetes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$paqueteLogic = new  paquete_logic();
		  		  
        try {		
			$paqueteLogic->setConnexion($connexion);			
			$paqueteLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $paqueteLogic->getpaquetes();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->paquetes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->paquetes=$this->paqueteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				paquete_util::refrescarFKDescripciones($this->paquetes);
			}
			
			//paquete_logic_add::checkpaqueteToGets($this->paquetes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paquetes);
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
		$this->paquetes = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->paquetes=$this->paqueteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				paquete_util::refrescarFKDescripciones($this->paquetes);
			}
			
			//paquete_logic_add::checkpaqueteToGets($this->paquetes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paquetes);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->paquetes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->paquetes=$this->paqueteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				paquete_util::refrescarFKDescripciones($this->paquetes);
			}
			
			//paquete_logic_add::checkpaqueteToGets($this->paquetes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paquetes);
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
		$this->paquetes = array();
		  		  
        try {			
			$this->paquetes=$this->paqueteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				paquete_util::refrescarFKDescripciones($this->paquetes);
			}	
			
			//paquete_logic_add::checkpaqueteToGets($this->paquetes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paquetes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->paquetes = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->paquetes=$this->paqueteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				paquete_util::refrescarFKDescripciones($this->paquetes);
			}
			
			//paquete_logic_add::checkpaqueteToGets($this->paquetes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paquetes);
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
		$this->paquetes = array();
		  		  
        try {		
			$this->paquetes=$this->paqueteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				paquete_util::refrescarFKDescripciones($this->paquetes);
			}
			
			//paquete_logic_add::checkpaqueteToGets($this->paquetes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->paquetes);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_IdsistemaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_sistema) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sistema= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sistema->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sistema,paquete_util::$ID_SISTEMA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sistema);

			$this->paquetes=$this->paqueteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				paquete_util::refrescarFKDescripciones($this->paquetes);
			}
			//paquete_logic_add::checkpaqueteToGets($this->paquetes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->paquetes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idsistema(string $strFinalQuery,Pagination $pagination,int $id_sistema) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sistema= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sistema->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sistema,paquete_util::$ID_SISTEMA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sistema);

			$this->paquetes=$this->paqueteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				paquete_util::refrescarFKDescripciones($this->paquetes);
			}
			//paquete_logic_add::checkpaqueteToGets($this->paquetes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->paquetes);
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
						
			//paquete_logic_add::checkpaqueteToSave($this->paquete,$this->datosCliente,$this->connexion);	       
			//paquete_logic_add::updatepaqueteToSave($this->paquete);			
			paquete_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->paquete,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->paqueteLogicAdditional->checkGeneralEntityToSave($this,$this->paquete,$this->datosCliente,$this->connexion);
			
			
			paquete_data::save($this->paquete, $this->connexion);	    	       	 				
			//paquete_logic_add::checkpaqueteToSaveAfter($this->paquete,$this->datosCliente,$this->connexion);			
			//$this->paqueteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->paquete,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->paquete,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->paquete,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				paquete_util::refrescarFKDescripcion($this->paquete);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->paquete->getIsDeleted()) {
				$this->paquete=null;
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
						
			/*paquete_logic_add::checkpaqueteToSave($this->paquete,$this->datosCliente,$this->connexion);*/	        
			//paquete_logic_add::updatepaqueteToSave($this->paquete);			
			//$this->paqueteLogicAdditional->checkGeneralEntityToSave($this,$this->paquete,$this->datosCliente,$this->connexion);			
			paquete_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->paquete,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			paquete_data::save($this->paquete, $this->connexion);	    	       	 						
			/*paquete_logic_add::checkpaqueteToSaveAfter($this->paquete,$this->datosCliente,$this->connexion);*/			
			//$this->paqueteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->paquete,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->paquete,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->paquete,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				paquete_util::refrescarFKDescripcion($this->paquete);				
			}
			
			if($this->paquete->getIsDeleted()) {
				$this->paquete=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(paquete $paquete,Connexion $connexion)  {
		$paqueteLogic = new  paquete_logic();		  		  
        try {		
			$paqueteLogic->setConnexion($connexion);			
			$paqueteLogic->setpaquete($paquete);			
			$paqueteLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*paquete_logic_add::checkpaqueteToSaves($this->paquetes,$this->datosCliente,$this->connexion);*/	        	
			//$this->paqueteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->paquetes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->paquetes as $paqueteLocal) {				
								
				//paquete_logic_add::updatepaqueteToSave($paqueteLocal);	        	
				paquete_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$paqueteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				paquete_data::save($paqueteLocal, $this->connexion);				
			}
			
			/*paquete_logic_add::checkpaqueteToSavesAfter($this->paquetes,$this->datosCliente,$this->connexion);*/			
			//$this->paqueteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->paquetes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				paquete_util::refrescarFKDescripciones($this->paquetes);
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
			/*paquete_logic_add::checkpaqueteToSaves($this->paquetes,$this->datosCliente,$this->connexion);*/			
			//$this->paqueteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->paquetes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->paquetes as $paqueteLocal) {				
								
				//paquete_logic_add::updatepaqueteToSave($paqueteLocal);	        	
				paquete_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$paqueteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				paquete_data::save($paqueteLocal, $this->connexion);				
			}			
			
			/*paquete_logic_add::checkpaqueteToSavesAfter($this->paquetes,$this->datosCliente,$this->connexion);*/			
			//$this->paqueteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->paquetes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				paquete_util::refrescarFKDescripciones($this->paquetes);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $paquetes,Connexion $connexion)  {
		$paqueteLogic = new  paquete_logic();
		  		  
        try {		
			$paqueteLogic->setConnexion($connexion);			
			$paqueteLogic->setpaquetes($paquetes);			
			$paqueteLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$paquetesAux=array();
		
		foreach($this->paquetes as $paquete) {
			if($paquete->getIsDeleted()==false) {
				$paquetesAux[]=$paquete;
			}
		}
		
		$this->paquetes=$paquetesAux;
	}
	
	public function updateToGetsAuxiliar(array &$paquetes) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->paquetes as $paquete) {
				
				$paquete->setid_sistema_Descripcion(paquete_util::getsistemaDescripcion($paquete->getsistema()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$paquete_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$paquete_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$paquete_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$paquete_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$paquete_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$paqueteForeignKey=new paquete_param_return();//paqueteForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sistema',$strRecargarFkTipos,',')) {
				$this->cargarCombossistemasFK($this->connexion,$strRecargarFkQuery,$paqueteForeignKey,$paquete_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sistema',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossistemasFK($this->connexion,' where id=-1 ',$paqueteForeignKey,$paquete_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $paqueteForeignKey;
			
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
	
	
	public function cargarCombossistemasFK($connexion=null,$strRecargarFkQuery='',$paqueteForeignKey,$paquete_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sistemaLogic= new sistema_logic();
		$pagination= new Pagination();
		$paqueteForeignKey->sistemasFK=array();

		$sistemaLogic->setConnexion($connexion);
		$sistemaLogic->getsistemaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($paquete_session==null) {
			$paquete_session=new paquete_session();
		}
		
		if($paquete_session->bitBusquedaDesdeFKSesionsistema!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=sistema_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalsistema=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalsistema=Funciones::GetFinalQueryAppend($finalQueryGlobalsistema, '');
				$finalQueryGlobalsistema.=sistema_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalsistema.$strRecargarFkQuery;		

				$sistemaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($sistemaLogic->getsistemas() as $sistemaLocal ) {
				if($paqueteForeignKey->idsistemaDefaultFK==0) {
					$paqueteForeignKey->idsistemaDefaultFK=$sistemaLocal->getId();
				}

				$paqueteForeignKey->sistemasFK[$sistemaLocal->getId()]=paquete_util::getsistemaDescripcion($sistemaLocal);
			}

		} else {

			if($paquete_session->bigidsistemaActual!=null && $paquete_session->bigidsistemaActual > 0) {
				$sistemaLogic->getEntity($paquete_session->bigidsistemaActual);//WithConnection

				$paqueteForeignKey->sistemasFK[$sistemaLogic->getsistema()->getId()]=paquete_util::getsistemaDescripcion($sistemaLogic->getsistema());
				$paqueteForeignKey->idsistemaDefaultFK=$sistemaLogic->getsistema()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($paquete,$modulos) {
		$this->saveRelacionesBase($paquete,$modulos,true);
	}

	public function saveRelaciones($paquete,$modulos) {
		$this->saveRelacionesBase($paquete,$modulos,false);
	}

	public function saveRelacionesBase($paquete,$modulos=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$paquete->setmodulos($modulos);
			$this->setpaquete($paquete);

			if(true) {

				//paquete_logic_add::updateRelacionesToSave($paquete,$this);

				if(($this->paquete->getIsNew() || $this->paquete->getIsChanged()) && !$this->paquete->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($modulos);

				} else if($this->paquete->getIsDeleted()) {
					$this->saveRelacionesDetalles($modulos);
					$this->save();
				}

				//paquete_logic_add::updateRelacionesToSaveAfter($paquete,$this);

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
	
	
	public function saveRelacionesDetalles($modulos=array()) {
		try {
	

			$idpaqueteActual=$this->getpaquete()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/util/modulo_carga.php');
			modulo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$moduloLogic_Desde_paquete=new modulo_logic();
			$moduloLogic_Desde_paquete->setmodulos($modulos);

			$moduloLogic_Desde_paquete->setConnexion($this->getConnexion());
			$moduloLogic_Desde_paquete->setDatosCliente($this->datosCliente);

			foreach($moduloLogic_Desde_paquete->getmodulos() as $modulo_Desde_paquete) {
				$modulo_Desde_paquete->setid_paquete($idpaqueteActual);
			}

			$moduloLogic_Desde_paquete->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $paquetes,paquete_param_return $paqueteParameterGeneral) : paquete_param_return {
		$paqueteReturnGeneral=new paquete_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $paqueteReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $paquetes,paquete_param_return $paqueteParameterGeneral) : paquete_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$paqueteReturnGeneral=new paquete_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $paqueteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $paquetes,paquete $paquete,paquete_param_return $paqueteParameterGeneral,bool $isEsNuevopaquete,array $clases) : paquete_param_return {
		 try {	
			$paqueteReturnGeneral=new paquete_param_return();
	
			$paqueteReturnGeneral->setpaquete($paquete);
			$paqueteReturnGeneral->setpaquetes($paquetes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$paqueteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $paqueteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $paquetes,paquete $paquete,paquete_param_return $paqueteParameterGeneral,bool $isEsNuevopaquete,array $clases) : paquete_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$paqueteReturnGeneral=new paquete_param_return();
	
			$paqueteReturnGeneral->setpaquete($paquete);
			$paqueteReturnGeneral->setpaquetes($paquetes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$paqueteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $paqueteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $paquetes,paquete $paquete,paquete_param_return $paqueteParameterGeneral,bool $isEsNuevopaquete,array $clases) : paquete_param_return {
		 try {	
			$paqueteReturnGeneral=new paquete_param_return();
	
			$paqueteReturnGeneral->setpaquete($paquete);
			$paqueteReturnGeneral->setpaquetes($paquetes);
			
			
			
			return $paqueteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $paquetes,paquete $paquete,paquete_param_return $paqueteParameterGeneral,bool $isEsNuevopaquete,array $clases) : paquete_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$paqueteReturnGeneral=new paquete_param_return();
	
			$paqueteReturnGeneral->setpaquete($paquete);
			$paqueteReturnGeneral->setpaquetes($paquetes);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $paqueteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,paquete $paquete,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,paquete $paquete,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		paquete_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		paquete_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(paquete $paquete,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//paquete_logic_add::updatepaqueteToGet($this->paquete);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$paquete->setsistema($this->paqueteDataAccess->getsistema($this->connexion,$paquete));
		$paquete->setmodulos($this->paqueteDataAccess->getmodulos($this->connexion,$paquete));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				$paquete->setsistema($this->paqueteDataAccess->getsistema($this->connexion,$paquete));
				continue;
			}

			if($clas->clas==modulo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$paquete->setmodulos($this->paqueteDataAccess->getmodulos($this->connexion,$paquete));

				if($this->isConDeep) {
					$moduloLogic= new modulo_logic($this->connexion);
					$moduloLogic->setmodulos($paquete->getmodulos());
					$classesLocal=modulo_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$moduloLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					modulo_util::refrescarFKDescripciones($moduloLogic->getmodulos());
					$paquete->setmodulos($moduloLogic->getmodulos());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$paquete->setsistema($this->paqueteDataAccess->getsistema($this->connexion,$paquete));
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(modulo::$class);
			$paquete->setmodulos($this->paqueteDataAccess->getmodulos($this->connexion,$paquete));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$paquete->setsistema($this->paqueteDataAccess->getsistema($this->connexion,$paquete));
		$sistemaLogic= new sistema_logic($this->connexion);
		$sistemaLogic->deepLoad($paquete->getsistema(),$isDeep,$deepLoadType,$clases);
				

		$paquete->setmodulos($this->paqueteDataAccess->getmodulos($this->connexion,$paquete));

		foreach($paquete->getmodulos() as $modulo) {
			$moduloLogic= new modulo_logic($this->connexion);
			$moduloLogic->deepLoad($modulo,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				$paquete->setsistema($this->paqueteDataAccess->getsistema($this->connexion,$paquete));
				$sistemaLogic= new sistema_logic($this->connexion);
				$sistemaLogic->deepLoad($paquete->getsistema(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==modulo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$paquete->setmodulos($this->paqueteDataAccess->getmodulos($this->connexion,$paquete));

				foreach($paquete->getmodulos() as $modulo) {
					$moduloLogic= new modulo_logic($this->connexion);
					$moduloLogic->deepLoad($modulo,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$paquete->setsistema($this->paqueteDataAccess->getsistema($this->connexion,$paquete));
			$sistemaLogic= new sistema_logic($this->connexion);
			$sistemaLogic->deepLoad($paquete->getsistema(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(modulo::$class);
			$paquete->setmodulos($this->paqueteDataAccess->getmodulos($this->connexion,$paquete));

			foreach($paquete->getmodulos() as $modulo) {
				$moduloLogic= new modulo_logic($this->connexion);
				$moduloLogic->deepLoad($modulo,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(paquete $paquete,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//paquete_logic_add::updatepaqueteToSave($this->paquete);			
			
			if(!$paraDeleteCascade) {				
				paquete_data::save($paquete, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		sistema_data::save($paquete->getsistema(),$this->connexion);

		foreach($paquete->getmodulos() as $modulo) {
			$modulo->setid_paquete($paquete->getId());
			modulo_data::save($modulo,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				sistema_data::save($paquete->getsistema(),$this->connexion);
				continue;
			}


			if($clas->clas==modulo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($paquete->getmodulos() as $modulo) {
					$modulo->setid_paquete($paquete->getId());
					modulo_data::save($modulo,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sistema_data::save($paquete->getsistema(),$this->connexion);
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(modulo::$class);

			foreach($paquete->getmodulos() as $modulo) {
				$modulo->setid_paquete($paquete->getId());
				modulo_data::save($modulo,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		sistema_data::save($paquete->getsistema(),$this->connexion);
		$sistemaLogic= new sistema_logic($this->connexion);
		$sistemaLogic->deepSave($paquete->getsistema(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		foreach($paquete->getmodulos() as $modulo) {
			$moduloLogic= new modulo_logic($this->connexion);
			$modulo->setid_paquete($paquete->getId());
			modulo_data::save($modulo,$this->connexion);
			$moduloLogic->deepSave($modulo,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				sistema_data::save($paquete->getsistema(),$this->connexion);
				$sistemaLogic= new sistema_logic($this->connexion);
				$sistemaLogic->deepSave($paquete->getsistema(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}


			if($clas->clas==modulo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($paquete->getmodulos() as $modulo) {
					$moduloLogic= new modulo_logic($this->connexion);
					$modulo->setid_paquete($paquete->getId());
					modulo_data::save($modulo,$this->connexion);
					$moduloLogic->deepSave($modulo,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sistema::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sistema_data::save($paquete->getsistema(),$this->connexion);
			$sistemaLogic= new sistema_logic($this->connexion);
			$sistemaLogic->deepSave($paquete->getsistema(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==modulo::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(modulo::$class);

			foreach($paquete->getmodulos() as $modulo) {
				$moduloLogic= new modulo_logic($this->connexion);
				$modulo->setid_paquete($paquete->getId());
				modulo_data::save($modulo,$this->connexion);
				$moduloLogic->deepSave($modulo,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				paquete_data::save($paquete, $this->connexion);
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
			
			$this->deepLoad($this->paquete,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->paquetes as $paquete) {
				$this->deepLoad($paquete,$isDeep,$deepLoadType,$clases);
								
				paquete_util::refrescarFKDescripciones($this->paquetes);
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
			
			foreach($this->paquetes as $paquete) {
				$this->deepLoad($paquete,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->paquete,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->paquetes as $paquete) {
				$this->deepSave($paquete,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->paquetes as $paquete) {
				$this->deepSave($paquete,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(sistema::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==sistema::$class) {
						$classes[]=new Classe(sistema::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==sistema::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(sistema::$class);
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
				
				$classes[]=new Classe(modulo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==modulo::$class) {
						$classes[]=new Classe(modulo::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==modulo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(modulo::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getpaquete() : ?paquete {	
		/*
		paquete_logic_add::checkpaqueteToGet($this->paquete,$this->datosCliente);
		paquete_logic_add::updatepaqueteToGet($this->paquete);
		*/
			
		return $this->paquete;
	}
		
	public function setpaquete(paquete $newpaquete) {
		$this->paquete = $newpaquete;
	}
	
	public function getpaquetes() : array {		
		/*
		paquete_logic_add::checkpaqueteToGets($this->paquetes,$this->datosCliente);
		
		foreach ($this->paquetes as $paqueteLocal ) {
			paquete_logic_add::updatepaqueteToGet($paqueteLocal);
		}
		*/
		
		return $this->paquetes;
	}
	
	public function setpaquetes(array $newpaquetes) {
		$this->paquetes = $newpaquetes;
	}
	
	public function getpaqueteDataAccess() : paquete_data {
		return $this->paqueteDataAccess;
	}
	
	public function setpaqueteDataAccess(paquete_data $newpaqueteDataAccess) {
		$this->paqueteDataAccess = $newpaqueteDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        paquete_carga::$CONTROLLER;;        
		
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
