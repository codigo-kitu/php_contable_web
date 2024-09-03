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

namespace com\bydan\contabilidad\seguridad\tipo_tecla_mascara\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\util\tipo_tecla_mascara_carga;
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\util\tipo_tecla_mascara_param_return;


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

use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\util\tipo_tecla_mascara_util;
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\business\entity\tipo_tecla_mascara;
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\business\data\tipo_tecla_mascara_data;

//FK


//REL


//REL DETALLES




class tipo_tecla_mascara_logic  extends GeneralEntityLogic implements tipo_tecla_mascara_logicI {	
	/*GENERAL*/
	public tipo_tecla_mascara_data $tipo_tecla_mascaraDataAccess;
	//public ?tipo_tecla_mascara_logic_add $tipo_tecla_mascaraLogicAdditional=null;
	public ?tipo_tecla_mascara $tipo_tecla_mascara;
	public array $tipo_tecla_mascaras;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->tipo_tecla_mascaraDataAccess = new tipo_tecla_mascara_data();			
			$this->tipo_tecla_mascaras = array();
			$this->tipo_tecla_mascara = new tipo_tecla_mascara();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->tipo_tecla_mascaraLogicAdditional = new tipo_tecla_mascara_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->tipo_tecla_mascaraLogicAdditional==null) {
		//	$this->tipo_tecla_mascaraLogicAdditional=new tipo_tecla_mascara_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->tipo_tecla_mascaraDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->tipo_tecla_mascaraDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->tipo_tecla_mascaraDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->tipo_tecla_mascaraDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_tecla_mascaras = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_tecla_mascaras=$this->tipo_tecla_mascaraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_tecla_mascara_util::refrescarFKDescripciones($this->tipo_tecla_mascaras);
			}
			
			//tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToGets($this->tipo_tecla_mascaras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_tecla_mascaras);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_tecla_mascaras = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_tecla_mascaras=$this->tipo_tecla_mascaraDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_tecla_mascara_util::refrescarFKDescripciones($this->tipo_tecla_mascaras);
			}
			
			//tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToGets($this->tipo_tecla_mascaras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_tecla_mascaras);
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
		$this->tipo_tecla_mascara = new tipo_tecla_mascara();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->tipo_tecla_mascara=$this->tipo_tecla_mascaraDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_tecla_mascara,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_tecla_mascara_util::refrescarFKDescripcion($this->tipo_tecla_mascara);
			}
						
			//tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToGet($this->tipo_tecla_mascara,$this->datosCliente);
			//tipo_tecla_mascara_logic_add::updatetipo_tecla_mascaraToGet($this->tipo_tecla_mascara);
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
		$this->tipo_tecla_mascara = new  tipo_tecla_mascara();
		  		  
        try {		
			$this->tipo_tecla_mascara=$this->tipo_tecla_mascaraDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_tecla_mascara,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_tecla_mascara_util::refrescarFKDescripcion($this->tipo_tecla_mascara);
			}
			
			//tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToGet($this->tipo_tecla_mascara,$this->datosCliente);
			//tipo_tecla_mascara_logic_add::updatetipo_tecla_mascaraToGet($this->tipo_tecla_mascara);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?tipo_tecla_mascara {
		$tipo_tecla_mascaraLogic = new  tipo_tecla_mascara_logic();
		  		  
        try {		
			$tipo_tecla_mascaraLogic->setConnexion($connexion);			
			$tipo_tecla_mascaraLogic->getEntity($id);			
			return $tipo_tecla_mascaraLogic->gettipo_tecla_mascara();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->tipo_tecla_mascara = new  tipo_tecla_mascara();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->tipo_tecla_mascara=$this->tipo_tecla_mascaraDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_tecla_mascara,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_tecla_mascara_util::refrescarFKDescripcion($this->tipo_tecla_mascara);
			}
			
			//tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToGet($this->tipo_tecla_mascara,$this->datosCliente);
			//tipo_tecla_mascara_logic_add::updatetipo_tecla_mascaraToGet($this->tipo_tecla_mascara);
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
		$this->tipo_tecla_mascara = new  tipo_tecla_mascara();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_tecla_mascara=$this->tipo_tecla_mascaraDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_tecla_mascara,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_tecla_mascara_util::refrescarFKDescripcion($this->tipo_tecla_mascara);
			}
			
			//tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToGet($this->tipo_tecla_mascara,$this->datosCliente);
			//tipo_tecla_mascara_logic_add::updatetipo_tecla_mascaraToGet($this->tipo_tecla_mascara);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?tipo_tecla_mascara {
		$tipo_tecla_mascaraLogic = new  tipo_tecla_mascara_logic();
		  		  
        try {		
			$tipo_tecla_mascaraLogic->setConnexion($connexion);			
			$tipo_tecla_mascaraLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $tipo_tecla_mascaraLogic->gettipo_tecla_mascara();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_tecla_mascaras = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_tecla_mascaras=$this->tipo_tecla_mascaraDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_tecla_mascara_util::refrescarFKDescripciones($this->tipo_tecla_mascaras);
			}
			
			//tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToGets($this->tipo_tecla_mascaras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_tecla_mascaras);			
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
		$this->tipo_tecla_mascaras = array();
		  		  
        try {			
			$this->tipo_tecla_mascaras=$this->tipo_tecla_mascaraDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_tecla_mascara_util::refrescarFKDescripciones($this->tipo_tecla_mascaras);
			}
			
			//tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToGets($this->tipo_tecla_mascaras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_tecla_mascaras);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->tipo_tecla_mascaras = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_tecla_mascaras=$this->tipo_tecla_mascaraDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_tecla_mascara_util::refrescarFKDescripciones($this->tipo_tecla_mascaras);
			}
			
			//tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToGets($this->tipo_tecla_mascaras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_tecla_mascaras);
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
		$this->tipo_tecla_mascaras = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_tecla_mascaras=$this->tipo_tecla_mascaraDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_tecla_mascara_util::refrescarFKDescripciones($this->tipo_tecla_mascaras);
			}
			
			//tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToGets($this->tipo_tecla_mascaras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_tecla_mascaras);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$tipo_tecla_mascaraLogic = new  tipo_tecla_mascara_logic();
		  		  
        try {		
			$tipo_tecla_mascaraLogic->setConnexion($connexion);			
			$tipo_tecla_mascaraLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $tipo_tecla_mascaraLogic->gettipo_tecla_mascaras();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->tipo_tecla_mascaras = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_tecla_mascaras=$this->tipo_tecla_mascaraDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_tecla_mascara_util::refrescarFKDescripciones($this->tipo_tecla_mascaras);
			}
			
			//tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToGets($this->tipo_tecla_mascaras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_tecla_mascaras);
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
		$this->tipo_tecla_mascaras = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_tecla_mascaras=$this->tipo_tecla_mascaraDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_tecla_mascara_util::refrescarFKDescripciones($this->tipo_tecla_mascaras);
			}
			
			//tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToGets($this->tipo_tecla_mascaras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_tecla_mascaras);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->tipo_tecla_mascaras = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_tecla_mascaras=$this->tipo_tecla_mascaraDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_tecla_mascara_util::refrescarFKDescripciones($this->tipo_tecla_mascaras);
			}
			
			//tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToGets($this->tipo_tecla_mascaras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_tecla_mascaras);
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
		$this->tipo_tecla_mascaras = array();
		  		  
        try {			
			$this->tipo_tecla_mascaras=$this->tipo_tecla_mascaraDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_tecla_mascara_util::refrescarFKDescripciones($this->tipo_tecla_mascaras);
			}	
			
			//tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToGets($this->tipo_tecla_mascaras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_tecla_mascaras);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_tecla_mascaras = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_tecla_mascaras=$this->tipo_tecla_mascaraDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_tecla_mascara_util::refrescarFKDescripciones($this->tipo_tecla_mascaras);
			}
			
			//tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToGets($this->tipo_tecla_mascaras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_tecla_mascaras);
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
		$this->tipo_tecla_mascaras = array();
		  		  
        try {		
			$this->tipo_tecla_mascaras=$this->tipo_tecla_mascaraDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_tecla_mascara_util::refrescarFKDescripciones($this->tipo_tecla_mascaras);
			}
			
			//tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToGets($this->tipo_tecla_mascaras,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_tecla_mascaras);

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
						
			//tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToSave($this->tipo_tecla_mascara,$this->datosCliente,$this->connexion);	       
			//tipo_tecla_mascara_logic_add::updatetipo_tecla_mascaraToSave($this->tipo_tecla_mascara);			
			tipo_tecla_mascara_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_tecla_mascara,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->tipo_tecla_mascaraLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_tecla_mascara,$this->datosCliente,$this->connexion);
			
			
			tipo_tecla_mascara_data::save($this->tipo_tecla_mascara, $this->connexion);	    	       	 				
			//tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToSaveAfter($this->tipo_tecla_mascara,$this->datosCliente,$this->connexion);			
			//$this->tipo_tecla_mascaraLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_tecla_mascara,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_tecla_mascara,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_tecla_mascara,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_tecla_mascara_util::refrescarFKDescripcion($this->tipo_tecla_mascara);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->tipo_tecla_mascara->getIsDeleted()) {
				$this->tipo_tecla_mascara=null;
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
						
			/*tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToSave($this->tipo_tecla_mascara,$this->datosCliente,$this->connexion);*/	        
			//tipo_tecla_mascara_logic_add::updatetipo_tecla_mascaraToSave($this->tipo_tecla_mascara);			
			//$this->tipo_tecla_mascaraLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_tecla_mascara,$this->datosCliente,$this->connexion);			
			tipo_tecla_mascara_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_tecla_mascara,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			tipo_tecla_mascara_data::save($this->tipo_tecla_mascara, $this->connexion);	    	       	 						
			/*tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToSaveAfter($this->tipo_tecla_mascara,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_tecla_mascaraLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_tecla_mascara,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_tecla_mascara,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_tecla_mascara,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_tecla_mascara_util::refrescarFKDescripcion($this->tipo_tecla_mascara);				
			}
			
			if($this->tipo_tecla_mascara->getIsDeleted()) {
				$this->tipo_tecla_mascara=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(tipo_tecla_mascara $tipo_tecla_mascara,Connexion $connexion)  {
		$tipo_tecla_mascaraLogic = new  tipo_tecla_mascara_logic();		  		  
        try {		
			$tipo_tecla_mascaraLogic->setConnexion($connexion);			
			$tipo_tecla_mascaraLogic->settipo_tecla_mascara($tipo_tecla_mascara);			
			$tipo_tecla_mascaraLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToSaves($this->tipo_tecla_mascaras,$this->datosCliente,$this->connexion);*/	        	
			//$this->tipo_tecla_mascaraLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_tecla_mascaras,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_tecla_mascaras as $tipo_tecla_mascaraLocal) {				
								
				//tipo_tecla_mascara_logic_add::updatetipo_tecla_mascaraToSave($tipo_tecla_mascaraLocal);	        	
				tipo_tecla_mascara_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_tecla_mascaraLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				tipo_tecla_mascara_data::save($tipo_tecla_mascaraLocal, $this->connexion);				
			}
			
			/*tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToSavesAfter($this->tipo_tecla_mascaras,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_tecla_mascaraLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_tecla_mascaras,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_tecla_mascara_util::refrescarFKDescripciones($this->tipo_tecla_mascaras);
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
			/*tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToSaves($this->tipo_tecla_mascaras,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_tecla_mascaraLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_tecla_mascaras,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_tecla_mascaras as $tipo_tecla_mascaraLocal) {				
								
				//tipo_tecla_mascara_logic_add::updatetipo_tecla_mascaraToSave($tipo_tecla_mascaraLocal);	        	
				tipo_tecla_mascara_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_tecla_mascaraLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				tipo_tecla_mascara_data::save($tipo_tecla_mascaraLocal, $this->connexion);				
			}			
			
			/*tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToSavesAfter($this->tipo_tecla_mascaras,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_tecla_mascaraLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_tecla_mascaras,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_tecla_mascara_util::refrescarFKDescripciones($this->tipo_tecla_mascaras);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $tipo_tecla_mascaras,Connexion $connexion)  {
		$tipo_tecla_mascaraLogic = new  tipo_tecla_mascara_logic();
		  		  
        try {		
			$tipo_tecla_mascaraLogic->setConnexion($connexion);			
			$tipo_tecla_mascaraLogic->settipo_tecla_mascaras($tipo_tecla_mascaras);			
			$tipo_tecla_mascaraLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$tipo_tecla_mascarasAux=array();
		
		foreach($this->tipo_tecla_mascaras as $tipo_tecla_mascara) {
			if($tipo_tecla_mascara->getIsDeleted()==false) {
				$tipo_tecla_mascarasAux[]=$tipo_tecla_mascara;
			}
		}
		
		$this->tipo_tecla_mascaras=$tipo_tecla_mascarasAux;
	}
	
	public function updateToGetsAuxiliar(array &$tipo_tecla_mascaras) {
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
	
	
	
	public function saveRelacionesWithConnection($tipo_tecla_mascara) {
		$this->saveRelacionesBase($tipo_tecla_mascara,true);
	}

	public function saveRelaciones($tipo_tecla_mascara) {
		$this->saveRelacionesBase($tipo_tecla_mascara,false);
	}

	public function saveRelacionesBase($tipo_tecla_mascara,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->settipo_tecla_mascara($tipo_tecla_mascara);

				if(($this->tipo_tecla_mascara->getIsNew() || $this->tipo_tecla_mascara->getIsChanged()) && !$this->tipo_tecla_mascara->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->tipo_tecla_mascara->getIsDeleted()) {
					$this->saveRelacionesDetalles();
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
	
	
	public function saveRelacionesDetalles() {
		try {
	

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $tipo_tecla_mascaras,tipo_tecla_mascara_param_return $tipo_tecla_mascaraParameterGeneral) : tipo_tecla_mascara_param_return {
		$tipo_tecla_mascaraReturnGeneral=new tipo_tecla_mascara_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $tipo_tecla_mascaraReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $tipo_tecla_mascaras,tipo_tecla_mascara_param_return $tipo_tecla_mascaraParameterGeneral) : tipo_tecla_mascara_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_tecla_mascaraReturnGeneral=new tipo_tecla_mascara_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_tecla_mascaraReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_tecla_mascaras,tipo_tecla_mascara $tipo_tecla_mascara,tipo_tecla_mascara_param_return $tipo_tecla_mascaraParameterGeneral,bool $isEsNuevotipo_tecla_mascara,array $clases) : tipo_tecla_mascara_param_return {
		 try {	
			$tipo_tecla_mascaraReturnGeneral=new tipo_tecla_mascara_param_return();
	
			$tipo_tecla_mascaraReturnGeneral->settipo_tecla_mascara($tipo_tecla_mascara);
			$tipo_tecla_mascaraReturnGeneral->settipo_tecla_mascaras($tipo_tecla_mascaras);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_tecla_mascaraReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $tipo_tecla_mascaraReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_tecla_mascaras,tipo_tecla_mascara $tipo_tecla_mascara,tipo_tecla_mascara_param_return $tipo_tecla_mascaraParameterGeneral,bool $isEsNuevotipo_tecla_mascara,array $clases) : tipo_tecla_mascara_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_tecla_mascaraReturnGeneral=new tipo_tecla_mascara_param_return();
	
			$tipo_tecla_mascaraReturnGeneral->settipo_tecla_mascara($tipo_tecla_mascara);
			$tipo_tecla_mascaraReturnGeneral->settipo_tecla_mascaras($tipo_tecla_mascaras);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_tecla_mascaraReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_tecla_mascaraReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_tecla_mascaras,tipo_tecla_mascara $tipo_tecla_mascara,tipo_tecla_mascara_param_return $tipo_tecla_mascaraParameterGeneral,bool $isEsNuevotipo_tecla_mascara,array $clases) : tipo_tecla_mascara_param_return {
		 try {	
			$tipo_tecla_mascaraReturnGeneral=new tipo_tecla_mascara_param_return();
	
			$tipo_tecla_mascaraReturnGeneral->settipo_tecla_mascara($tipo_tecla_mascara);
			$tipo_tecla_mascaraReturnGeneral->settipo_tecla_mascaras($tipo_tecla_mascaras);
			
			
			
			return $tipo_tecla_mascaraReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_tecla_mascaras,tipo_tecla_mascara $tipo_tecla_mascara,tipo_tecla_mascara_param_return $tipo_tecla_mascaraParameterGeneral,bool $isEsNuevotipo_tecla_mascara,array $clases) : tipo_tecla_mascara_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_tecla_mascaraReturnGeneral=new tipo_tecla_mascara_param_return();
	
			$tipo_tecla_mascaraReturnGeneral->settipo_tecla_mascara($tipo_tecla_mascara);
			$tipo_tecla_mascaraReturnGeneral->settipo_tecla_mascaras($tipo_tecla_mascaras);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_tecla_mascaraReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,tipo_tecla_mascara $tipo_tecla_mascara,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,tipo_tecla_mascara $tipo_tecla_mascara,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		tipo_tecla_mascara_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(tipo_tecla_mascara $tipo_tecla_mascara,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_tecla_mascara_logic_add::updatetipo_tecla_mascaraToGet($this->tipo_tecla_mascara);
			
			
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(tipo_tecla_mascara $tipo_tecla_mascara,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_tecla_mascara_logic_add::updatetipo_tecla_mascaraToSave($this->tipo_tecla_mascara);			
			
			if(!$paraDeleteCascade) {				
				tipo_tecla_mascara_data::save($tipo_tecla_mascara, $this->connexion);
			}
			
			
			
			if($paraDeleteCascade) {				
				tipo_tecla_mascara_data::save($tipo_tecla_mascara, $this->connexion);
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
			
			$this->deepLoad($this->tipo_tecla_mascara,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->tipo_tecla_mascaras as $tipo_tecla_mascara) {
				$this->deepLoad($tipo_tecla_mascara,$isDeep,$deepLoadType,$clases);
								
				tipo_tecla_mascara_util::refrescarFKDescripciones($this->tipo_tecla_mascaras);
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
			
			foreach($this->tipo_tecla_mascaras as $tipo_tecla_mascara) {
				$this->deepLoad($tipo_tecla_mascara,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->tipo_tecla_mascara,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->tipo_tecla_mascaras as $tipo_tecla_mascara) {
				$this->deepSave($tipo_tecla_mascara,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->tipo_tecla_mascaras as $tipo_tecla_mascara) {
				$this->deepSave($tipo_tecla_mascara,$isDeep,$deepLoadType,$clases,false);
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
	
	
	
	
	
	
	
	public function gettipo_tecla_mascara() : ?tipo_tecla_mascara {	
		/*
		tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToGet($this->tipo_tecla_mascara,$this->datosCliente);
		tipo_tecla_mascara_logic_add::updatetipo_tecla_mascaraToGet($this->tipo_tecla_mascara);
		*/
			
		return $this->tipo_tecla_mascara;
	}
		
	public function settipo_tecla_mascara(tipo_tecla_mascara $newtipo_tecla_mascara) {
		$this->tipo_tecla_mascara = $newtipo_tecla_mascara;
	}
	
	public function gettipo_tecla_mascaras() : array {		
		/*
		tipo_tecla_mascara_logic_add::checktipo_tecla_mascaraToGets($this->tipo_tecla_mascaras,$this->datosCliente);
		
		foreach ($this->tipo_tecla_mascaras as $tipo_tecla_mascaraLocal ) {
			tipo_tecla_mascara_logic_add::updatetipo_tecla_mascaraToGet($tipo_tecla_mascaraLocal);
		}
		*/
		
		return $this->tipo_tecla_mascaras;
	}
	
	public function settipo_tecla_mascaras(array $newtipo_tecla_mascaras) {
		$this->tipo_tecla_mascaras = $newtipo_tecla_mascaras;
	}
	
	public function gettipo_tecla_mascaraDataAccess() : tipo_tecla_mascara_data {
		return $this->tipo_tecla_mascaraDataAccess;
	}
	
	public function settipo_tecla_mascaraDataAccess(tipo_tecla_mascara_data $newtipo_tecla_mascaraDataAccess) {
		$this->tipo_tecla_mascaraDataAccess = $newtipo_tecla_mascaraDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        tipo_tecla_mascara_carga::$CONTROLLER;;        
		
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
