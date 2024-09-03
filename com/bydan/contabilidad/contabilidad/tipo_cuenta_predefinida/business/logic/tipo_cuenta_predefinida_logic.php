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

namespace com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util\tipo_cuenta_predefinida_carga;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util\tipo_cuenta_predefinida_param_return;


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

use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util\tipo_cuenta_predefinida_util;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\entity\tipo_cuenta_predefinida;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\data\tipo_cuenta_predefinida_data;

//FK


//REL


use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\entity\cuenta_predefinida;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\data\cuenta_predefinida_data;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\logic\cuenta_predefinida_logic;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_carga;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_util;

//REL DETALLES




class tipo_cuenta_predefinida_logic  extends GeneralEntityLogic implements tipo_cuenta_predefinida_logicI {	
	/*GENERAL*/
	public tipo_cuenta_predefinida_data $tipo_cuenta_predefinidaDataAccess;
	//public ?tipo_cuenta_predefinida_logic_add $tipo_cuenta_predefinidaLogicAdditional=null;
	public ?tipo_cuenta_predefinida $tipo_cuenta_predefinida;
	public array $tipo_cuenta_predefinidas;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->tipo_cuenta_predefinidaDataAccess = new tipo_cuenta_predefinida_data();			
			$this->tipo_cuenta_predefinidas = array();
			$this->tipo_cuenta_predefinida = new tipo_cuenta_predefinida();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->tipo_cuenta_predefinidaLogicAdditional = new tipo_cuenta_predefinida_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->tipo_cuenta_predefinidaLogicAdditional==null) {
		//	$this->tipo_cuenta_predefinidaLogicAdditional=new tipo_cuenta_predefinida_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->tipo_cuenta_predefinidaDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->tipo_cuenta_predefinidaDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->tipo_cuenta_predefinidaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->tipo_cuenta_predefinidaDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_cuenta_predefinidas = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_cuenta_predefinidas=$this->tipo_cuenta_predefinidaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_predefinida_util::refrescarFKDescripciones($this->tipo_cuenta_predefinidas);
			}
			
			//tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToGets($this->tipo_cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuenta_predefinidas);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->tipo_cuenta_predefinidas = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_cuenta_predefinidas=$this->tipo_cuenta_predefinidaDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_predefinida_util::refrescarFKDescripciones($this->tipo_cuenta_predefinidas);
			}
			
			//tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToGets($this->tipo_cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuenta_predefinidas);
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
		$this->tipo_cuenta_predefinida = new tipo_cuenta_predefinida();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->tipo_cuenta_predefinida=$this->tipo_cuenta_predefinidaDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_cuenta_predefinida,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_cuenta_predefinida_util::refrescarFKDescripcion($this->tipo_cuenta_predefinida);
			}
						
			//tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToGet($this->tipo_cuenta_predefinida,$this->datosCliente);
			//tipo_cuenta_predefinida_logic_add::updatetipo_cuenta_predefinidaToGet($this->tipo_cuenta_predefinida);
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
		$this->tipo_cuenta_predefinida = new  tipo_cuenta_predefinida();
		  		  
        try {		
			$this->tipo_cuenta_predefinida=$this->tipo_cuenta_predefinidaDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_cuenta_predefinida,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_cuenta_predefinida_util::refrescarFKDescripcion($this->tipo_cuenta_predefinida);
			}
			
			//tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToGet($this->tipo_cuenta_predefinida,$this->datosCliente);
			//tipo_cuenta_predefinida_logic_add::updatetipo_cuenta_predefinidaToGet($this->tipo_cuenta_predefinida);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?tipo_cuenta_predefinida {
		$tipo_cuenta_predefinidaLogic = new  tipo_cuenta_predefinida_logic();
		  		  
        try {		
			$tipo_cuenta_predefinidaLogic->setConnexion($connexion);			
			$tipo_cuenta_predefinidaLogic->getEntity($id);			
			return $tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->tipo_cuenta_predefinida = new  tipo_cuenta_predefinida();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->tipo_cuenta_predefinida=$this->tipo_cuenta_predefinidaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_cuenta_predefinida,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_cuenta_predefinida_util::refrescarFKDescripcion($this->tipo_cuenta_predefinida);
			}
			
			//tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToGet($this->tipo_cuenta_predefinida,$this->datosCliente);
			//tipo_cuenta_predefinida_logic_add::updatetipo_cuenta_predefinidaToGet($this->tipo_cuenta_predefinida);
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
		$this->tipo_cuenta_predefinida = new  tipo_cuenta_predefinida();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_cuenta_predefinida=$this->tipo_cuenta_predefinidaDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->tipo_cuenta_predefinida,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				tipo_cuenta_predefinida_util::refrescarFKDescripcion($this->tipo_cuenta_predefinida);
			}
			
			//tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToGet($this->tipo_cuenta_predefinida,$this->datosCliente);
			//tipo_cuenta_predefinida_logic_add::updatetipo_cuenta_predefinidaToGet($this->tipo_cuenta_predefinida);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?tipo_cuenta_predefinida {
		$tipo_cuenta_predefinidaLogic = new  tipo_cuenta_predefinida_logic();
		  		  
        try {		
			$tipo_cuenta_predefinidaLogic->setConnexion($connexion);			
			$tipo_cuenta_predefinidaLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_cuenta_predefinidas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_cuenta_predefinidas=$this->tipo_cuenta_predefinidaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_predefinida_util::refrescarFKDescripciones($this->tipo_cuenta_predefinidas);
			}
			
			//tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToGets($this->tipo_cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuenta_predefinidas);			
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
		$this->tipo_cuenta_predefinidas = array();
		  		  
        try {			
			$this->tipo_cuenta_predefinidas=$this->tipo_cuenta_predefinidaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_predefinida_util::refrescarFKDescripciones($this->tipo_cuenta_predefinidas);
			}
			
			//tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToGets($this->tipo_cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuenta_predefinidas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->tipo_cuenta_predefinidas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_cuenta_predefinidas=$this->tipo_cuenta_predefinidaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_predefinida_util::refrescarFKDescripciones($this->tipo_cuenta_predefinidas);
			}
			
			//tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToGets($this->tipo_cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuenta_predefinidas);
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
		$this->tipo_cuenta_predefinidas = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_cuenta_predefinidas=$this->tipo_cuenta_predefinidaDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_predefinida_util::refrescarFKDescripciones($this->tipo_cuenta_predefinidas);
			}
			
			//tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToGets($this->tipo_cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuenta_predefinidas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$tipo_cuenta_predefinidaLogic = new  tipo_cuenta_predefinida_logic();
		  		  
        try {		
			$tipo_cuenta_predefinidaLogic->setConnexion($connexion);			
			$tipo_cuenta_predefinidaLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->tipo_cuenta_predefinidas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_cuenta_predefinidas=$this->tipo_cuenta_predefinidaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_predefinida_util::refrescarFKDescripciones($this->tipo_cuenta_predefinidas);
			}
			
			//tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToGets($this->tipo_cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuenta_predefinidas);
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
		$this->tipo_cuenta_predefinidas = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_cuenta_predefinidas=$this->tipo_cuenta_predefinidaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_predefinida_util::refrescarFKDescripciones($this->tipo_cuenta_predefinidas);
			}
			
			//tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToGets($this->tipo_cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuenta_predefinidas);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->tipo_cuenta_predefinidas = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->tipo_cuenta_predefinidas=$this->tipo_cuenta_predefinidaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_predefinida_util::refrescarFKDescripciones($this->tipo_cuenta_predefinidas);
			}
			
			//tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToGets($this->tipo_cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuenta_predefinidas);
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
		$this->tipo_cuenta_predefinidas = array();
		  		  
        try {			
			$this->tipo_cuenta_predefinidas=$this->tipo_cuenta_predefinidaDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_predefinida_util::refrescarFKDescripciones($this->tipo_cuenta_predefinidas);
			}	
			
			//tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToGets($this->tipo_cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuenta_predefinidas);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->tipo_cuenta_predefinidas = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->tipo_cuenta_predefinidas=$this->tipo_cuenta_predefinidaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_predefinida_util::refrescarFKDescripciones($this->tipo_cuenta_predefinidas);
			}
			
			//tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToGets($this->tipo_cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuenta_predefinidas);
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
		$this->tipo_cuenta_predefinidas = array();
		  		  
        try {		
			$this->tipo_cuenta_predefinidas=$this->tipo_cuenta_predefinidaDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_predefinida_util::refrescarFKDescripciones($this->tipo_cuenta_predefinidas);
			}
			
			//tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToGets($this->tipo_cuenta_predefinidas,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->tipo_cuenta_predefinidas);

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
						
			//tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToSave($this->tipo_cuenta_predefinida,$this->datosCliente,$this->connexion);	       
			//tipo_cuenta_predefinida_logic_add::updatetipo_cuenta_predefinidaToSave($this->tipo_cuenta_predefinida);			
			tipo_cuenta_predefinida_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_cuenta_predefinida,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->tipo_cuenta_predefinidaLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_cuenta_predefinida,$this->datosCliente,$this->connexion);
			
			
			tipo_cuenta_predefinida_data::save($this->tipo_cuenta_predefinida, $this->connexion);	    	       	 				
			//tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToSaveAfter($this->tipo_cuenta_predefinida,$this->datosCliente,$this->connexion);			
			//$this->tipo_cuenta_predefinidaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_cuenta_predefinida,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_cuenta_predefinida,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_cuenta_predefinida,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_cuenta_predefinida_util::refrescarFKDescripcion($this->tipo_cuenta_predefinida);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->tipo_cuenta_predefinida->getIsDeleted()) {
				$this->tipo_cuenta_predefinida=null;
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
						
			/*tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToSave($this->tipo_cuenta_predefinida,$this->datosCliente,$this->connexion);*/	        
			//tipo_cuenta_predefinida_logic_add::updatetipo_cuenta_predefinidaToSave($this->tipo_cuenta_predefinida);			
			//$this->tipo_cuenta_predefinidaLogicAdditional->checkGeneralEntityToSave($this,$this->tipo_cuenta_predefinida,$this->datosCliente,$this->connexion);			
			tipo_cuenta_predefinida_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->tipo_cuenta_predefinida,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			tipo_cuenta_predefinida_data::save($this->tipo_cuenta_predefinida, $this->connexion);	    	       	 						
			/*tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToSaveAfter($this->tipo_cuenta_predefinida,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_cuenta_predefinidaLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->tipo_cuenta_predefinida,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->tipo_cuenta_predefinida,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->tipo_cuenta_predefinida,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				tipo_cuenta_predefinida_util::refrescarFKDescripcion($this->tipo_cuenta_predefinida);				
			}
			
			if($this->tipo_cuenta_predefinida->getIsDeleted()) {
				$this->tipo_cuenta_predefinida=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(tipo_cuenta_predefinida $tipo_cuenta_predefinida,Connexion $connexion)  {
		$tipo_cuenta_predefinidaLogic = new  tipo_cuenta_predefinida_logic();		  		  
        try {		
			$tipo_cuenta_predefinidaLogic->setConnexion($connexion);			
			$tipo_cuenta_predefinidaLogic->settipo_cuenta_predefinida($tipo_cuenta_predefinida);			
			$tipo_cuenta_predefinidaLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToSaves($this->tipo_cuenta_predefinidas,$this->datosCliente,$this->connexion);*/	        	
			//$this->tipo_cuenta_predefinidaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_cuenta_predefinidas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_cuenta_predefinidas as $tipo_cuenta_predefinidaLocal) {				
								
				//tipo_cuenta_predefinida_logic_add::updatetipo_cuenta_predefinidaToSave($tipo_cuenta_predefinidaLocal);	        	
				tipo_cuenta_predefinida_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_cuenta_predefinidaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				tipo_cuenta_predefinida_data::save($tipo_cuenta_predefinidaLocal, $this->connexion);				
			}
			
			/*tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToSavesAfter($this->tipo_cuenta_predefinidas,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_cuenta_predefinidaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_cuenta_predefinidas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_predefinida_util::refrescarFKDescripciones($this->tipo_cuenta_predefinidas);
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
			/*tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToSaves($this->tipo_cuenta_predefinidas,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_cuenta_predefinidaLogicAdditional->checkGeneralEntitiesToSaves($this,$this->tipo_cuenta_predefinidas,$this->datosCliente,$this->connexion);
			
	   		foreach($this->tipo_cuenta_predefinidas as $tipo_cuenta_predefinidaLocal) {				
								
				//tipo_cuenta_predefinida_logic_add::updatetipo_cuenta_predefinidaToSave($tipo_cuenta_predefinidaLocal);	        	
				tipo_cuenta_predefinida_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$tipo_cuenta_predefinidaLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				tipo_cuenta_predefinida_data::save($tipo_cuenta_predefinidaLocal, $this->connexion);				
			}			
			
			/*tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToSavesAfter($this->tipo_cuenta_predefinidas,$this->datosCliente,$this->connexion);*/			
			//$this->tipo_cuenta_predefinidaLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->tipo_cuenta_predefinidas,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				tipo_cuenta_predefinida_util::refrescarFKDescripciones($this->tipo_cuenta_predefinidas);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $tipo_cuenta_predefinidas,Connexion $connexion)  {
		$tipo_cuenta_predefinidaLogic = new  tipo_cuenta_predefinida_logic();
		  		  
        try {		
			$tipo_cuenta_predefinidaLogic->setConnexion($connexion);			
			$tipo_cuenta_predefinidaLogic->settipo_cuenta_predefinidas($tipo_cuenta_predefinidas);			
			$tipo_cuenta_predefinidaLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$tipo_cuenta_predefinidasAux=array();
		
		foreach($this->tipo_cuenta_predefinidas as $tipo_cuenta_predefinida) {
			if($tipo_cuenta_predefinida->getIsDeleted()==false) {
				$tipo_cuenta_predefinidasAux[]=$tipo_cuenta_predefinida;
			}
		}
		
		$this->tipo_cuenta_predefinidas=$tipo_cuenta_predefinidasAux;
	}
	
	public function updateToGetsAuxiliar(array &$tipo_cuenta_predefinidas) {
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
	
	
	
	public function saveRelacionesWithConnection($tipo_cuenta_predefinida,$cuentapredefinidas) {
		$this->saveRelacionesBase($tipo_cuenta_predefinida,$cuentapredefinidas,true);
	}

	public function saveRelaciones($tipo_cuenta_predefinida,$cuentapredefinidas) {
		$this->saveRelacionesBase($tipo_cuenta_predefinida,$cuentapredefinidas,false);
	}

	public function saveRelacionesBase($tipo_cuenta_predefinida,$cuentapredefinidas=array(),$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$tipo_cuenta_predefinida->setcuenta_predefinidas($cuentapredefinidas);
			$this->settipo_cuenta_predefinida($tipo_cuenta_predefinida);

			if(true) {

				//tipo_cuenta_predefinida_logic_add::updateRelacionesToSave($tipo_cuenta_predefinida,$this);

				if(($this->tipo_cuenta_predefinida->getIsNew() || $this->tipo_cuenta_predefinida->getIsChanged()) && !$this->tipo_cuenta_predefinida->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles($cuentapredefinidas);

				} else if($this->tipo_cuenta_predefinida->getIsDeleted()) {
					$this->saveRelacionesDetalles($cuentapredefinidas);
					$this->save();
				}

				//tipo_cuenta_predefinida_logic_add::updateRelacionesToSaveAfter($tipo_cuenta_predefinida,$this);

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
	
	
	public function saveRelacionesDetalles($cuentapredefinidas=array()) {
		try {
	

			$idtipo_cuenta_predefinidaActual=$this->gettipo_cuenta_predefinida()->getId();

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/util/cuenta_predefinida_carga.php');
			cuenta_predefinida_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);

			$cuentapredefinidaLogic_Desde_tipo_cuenta_predefinida=new cuenta_predefinida_logic();
			$cuentapredefinidaLogic_Desde_tipo_cuenta_predefinida->setcuenta_predefinidas($cuentapredefinidas);

			$cuentapredefinidaLogic_Desde_tipo_cuenta_predefinida->setConnexion($this->getConnexion());
			$cuentapredefinidaLogic_Desde_tipo_cuenta_predefinida->setDatosCliente($this->datosCliente);

			foreach($cuentapredefinidaLogic_Desde_tipo_cuenta_predefinida->getcuenta_predefinidas() as $cuentapredefinida_Desde_tipo_cuenta_predefinida) {
				$cuentapredefinida_Desde_tipo_cuenta_predefinida->setid_tipo_cuenta_predefinida($idtipo_cuenta_predefinidaActual);
			}

			$cuentapredefinidaLogic_Desde_tipo_cuenta_predefinida->saves();

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $tipo_cuenta_predefinidas,tipo_cuenta_predefinida_param_return $tipo_cuenta_predefinidaParameterGeneral) : tipo_cuenta_predefinida_param_return {
		$tipo_cuenta_predefinidaReturnGeneral=new tipo_cuenta_predefinida_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $tipo_cuenta_predefinidaReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $tipo_cuenta_predefinidas,tipo_cuenta_predefinida_param_return $tipo_cuenta_predefinidaParameterGeneral) : tipo_cuenta_predefinida_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_cuenta_predefinidaReturnGeneral=new tipo_cuenta_predefinida_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_cuenta_predefinidaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_cuenta_predefinidas,tipo_cuenta_predefinida $tipo_cuenta_predefinida,tipo_cuenta_predefinida_param_return $tipo_cuenta_predefinidaParameterGeneral,bool $isEsNuevotipo_cuenta_predefinida,array $clases) : tipo_cuenta_predefinida_param_return {
		 try {	
			$tipo_cuenta_predefinidaReturnGeneral=new tipo_cuenta_predefinida_param_return();
	
			$tipo_cuenta_predefinidaReturnGeneral->settipo_cuenta_predefinida($tipo_cuenta_predefinida);
			$tipo_cuenta_predefinidaReturnGeneral->settipo_cuenta_predefinidas($tipo_cuenta_predefinidas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_cuenta_predefinidaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $tipo_cuenta_predefinidaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_cuenta_predefinidas,tipo_cuenta_predefinida $tipo_cuenta_predefinida,tipo_cuenta_predefinida_param_return $tipo_cuenta_predefinidaParameterGeneral,bool $isEsNuevotipo_cuenta_predefinida,array $clases) : tipo_cuenta_predefinida_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_cuenta_predefinidaReturnGeneral=new tipo_cuenta_predefinida_param_return();
	
			$tipo_cuenta_predefinidaReturnGeneral->settipo_cuenta_predefinida($tipo_cuenta_predefinida);
			$tipo_cuenta_predefinidaReturnGeneral->settipo_cuenta_predefinidas($tipo_cuenta_predefinidas);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$tipo_cuenta_predefinidaReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_cuenta_predefinidaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_cuenta_predefinidas,tipo_cuenta_predefinida $tipo_cuenta_predefinida,tipo_cuenta_predefinida_param_return $tipo_cuenta_predefinidaParameterGeneral,bool $isEsNuevotipo_cuenta_predefinida,array $clases) : tipo_cuenta_predefinida_param_return {
		 try {	
			$tipo_cuenta_predefinidaReturnGeneral=new tipo_cuenta_predefinida_param_return();
	
			$tipo_cuenta_predefinidaReturnGeneral->settipo_cuenta_predefinida($tipo_cuenta_predefinida);
			$tipo_cuenta_predefinidaReturnGeneral->settipo_cuenta_predefinidas($tipo_cuenta_predefinidas);
			
			
			
			return $tipo_cuenta_predefinidaReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $tipo_cuenta_predefinidas,tipo_cuenta_predefinida $tipo_cuenta_predefinida,tipo_cuenta_predefinida_param_return $tipo_cuenta_predefinidaParameterGeneral,bool $isEsNuevotipo_cuenta_predefinida,array $clases) : tipo_cuenta_predefinida_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$tipo_cuenta_predefinidaReturnGeneral=new tipo_cuenta_predefinida_param_return();
	
			$tipo_cuenta_predefinidaReturnGeneral->settipo_cuenta_predefinida($tipo_cuenta_predefinida);
			$tipo_cuenta_predefinidaReturnGeneral->settipo_cuenta_predefinidas($tipo_cuenta_predefinidas);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $tipo_cuenta_predefinidaReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,tipo_cuenta_predefinida $tipo_cuenta_predefinida,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,tipo_cuenta_predefinida $tipo_cuenta_predefinida,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo) {
		tipo_cuenta_predefinida_carga::cargarArchivosPaquetesRelaciones($paqueteTipo);	
	}		
	
	
	public function deepLoad(tipo_cuenta_predefinida $tipo_cuenta_predefinida,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			
			if($isDeep) {
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_cuenta_predefinida_logic_add::updatetipo_cuenta_predefinidaToGet($this->tipo_cuenta_predefinida);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$tipo_cuenta_predefinida->setcuenta_predefinidas($this->tipo_cuenta_predefinidaDataAccess->getcuenta_predefinidas($this->connexion,$tipo_cuenta_predefinida));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta_predefinida::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_cuenta_predefinida->setcuenta_predefinidas($this->tipo_cuenta_predefinidaDataAccess->getcuenta_predefinidas($this->connexion,$tipo_cuenta_predefinida));

				if($this->isConDeep) {
					$cuentapredefinidaLogic= new cuenta_predefinida_logic($this->connexion);
					$cuentapredefinidaLogic->setcuenta_predefinidas($tipo_cuenta_predefinida->getcuenta_predefinidas());
					$classesLocal=cuenta_predefinida_util::getClassesFKsOf(array(),DeepLoadType::$NONE);
					$cuentapredefinidaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classesLocal,'');
					cuenta_predefinida_util::refrescarFKDescripciones($cuentapredefinidaLogic->getcuenta_predefinidas());
					$tipo_cuenta_predefinida->setcuenta_predefinidas($cuentapredefinidaLogic->getcuenta_predefinidas());
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_predefinida::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_predefinida::$class);
			$tipo_cuenta_predefinida->setcuenta_predefinidas($this->tipo_cuenta_predefinidaDataAccess->getcuenta_predefinidas($this->connexion,$tipo_cuenta_predefinida));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {


		$tipo_cuenta_predefinida->setcuenta_predefinidas($this->tipo_cuenta_predefinidaDataAccess->getcuenta_predefinidas($this->connexion,$tipo_cuenta_predefinida));

		foreach($tipo_cuenta_predefinida->getcuenta_predefinidas() as $cuentapredefinida) {
			$cuentapredefinidaLogic= new cuenta_predefinida_logic($this->connexion);
			$cuentapredefinidaLogic->deepLoad($cuentapredefinida,$isDeep,$deepLoadType,$clases);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==cuenta_predefinida::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$tipo_cuenta_predefinida->setcuenta_predefinidas($this->tipo_cuenta_predefinidaDataAccess->getcuenta_predefinidas($this->connexion,$tipo_cuenta_predefinida));

				foreach($tipo_cuenta_predefinida->getcuenta_predefinidas() as $cuentapredefinida) {
					$cuentapredefinidaLogic= new cuenta_predefinida_logic($this->connexion);
					$cuentapredefinidaLogic->deepLoad($cuentapredefinida,$isDeep,$deepLoadType,$clases);
				}
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_predefinida::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_predefinida::$class);
			$tipo_cuenta_predefinida->setcuenta_predefinidas($this->tipo_cuenta_predefinidaDataAccess->getcuenta_predefinidas($this->connexion,$tipo_cuenta_predefinida));

			foreach($tipo_cuenta_predefinida->getcuenta_predefinidas() as $cuentapredefinida) {
				$cuentapredefinidaLogic= new cuenta_predefinida_logic($this->connexion);
				$cuentapredefinidaLogic->deepLoad($cuentapredefinida,$isDeep,$deepLoadType,$clases);
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
	
	public function deepSave(tipo_cuenta_predefinida $tipo_cuenta_predefinida,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			
			if($isDeep) {				
				$this->cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			}
			
			//tipo_cuenta_predefinida_logic_add::updatetipo_cuenta_predefinidaToSave($this->tipo_cuenta_predefinida);			
			
			if(!$paraDeleteCascade) {				
				tipo_cuenta_predefinida_data::save($tipo_cuenta_predefinida, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($tipo_cuenta_predefinida->getcuenta_predefinidas() as $cuentapredefinida) {
			$cuentapredefinida->setid_tipo_cuenta_predefinida($tipo_cuenta_predefinida->getId());
			cuenta_predefinida_data::save($cuentapredefinida,$this->connexion);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==cuenta_predefinida::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_cuenta_predefinida->getcuenta_predefinidas() as $cuentapredefinida) {
					$cuentapredefinida->setid_tipo_cuenta_predefinida($tipo_cuenta_predefinida->getId());
					cuenta_predefinida_data::save($cuentapredefinida,$this->connexion);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_predefinida::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_predefinida::$class);

			foreach($tipo_cuenta_predefinida->getcuenta_predefinidas() as $cuentapredefinida) {
				$cuentapredefinida->setid_tipo_cuenta_predefinida($tipo_cuenta_predefinida->getId());
				cuenta_predefinida_data::save($cuentapredefinida,$this->connexion);
			}

		}
	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		foreach($tipo_cuenta_predefinida->getcuenta_predefinidas() as $cuentapredefinida) {
			$cuentapredefinidaLogic= new cuenta_predefinida_logic($this->connexion);
			$cuentapredefinida->setid_tipo_cuenta_predefinida($tipo_cuenta_predefinida->getId());
			cuenta_predefinida_data::save($cuentapredefinida,$this->connexion);
			$cuentapredefinidaLogic->deepSave($cuentapredefinida,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
		}
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {

			if($clas->clas==cuenta_predefinida::$class && $clas->blnActivo) {
				$clas->blnActivo=false;

				foreach($tipo_cuenta_predefinida->getcuenta_predefinidas() as $cuentapredefinida) {
					$cuentapredefinidaLogic= new cuenta_predefinida_logic($this->connexion);
					$cuentapredefinida->setid_tipo_cuenta_predefinida($tipo_cuenta_predefinida->getId());
					cuenta_predefinida_data::save($cuentapredefinida,$this->connexion);
					$cuentapredefinidaLogic->deepSave($cuentapredefinida,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				}

				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {



		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_predefinida::$class && $clas->blnActivo) {
				$clas->blnActivo=false;
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$clases[]=new Classe(cuenta_predefinida::$class);

			foreach($tipo_cuenta_predefinida->getcuenta_predefinidas() as $cuentapredefinida) {
				$cuentapredefinidaLogic= new cuenta_predefinida_logic($this->connexion);
				$cuentapredefinida->setid_tipo_cuenta_predefinida($tipo_cuenta_predefinida->getId());
				cuenta_predefinida_data::save($cuentapredefinida,$this->connexion);
				$cuentapredefinidaLogic->deepSave($cuentapredefinida,$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
			}
		}
	}
}
			
			if($paraDeleteCascade) {				
				tipo_cuenta_predefinida_data::save($tipo_cuenta_predefinida, $this->connexion);
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
			
			$this->deepLoad($this->tipo_cuenta_predefinida,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->tipo_cuenta_predefinidas as $tipo_cuenta_predefinida) {
				$this->deepLoad($tipo_cuenta_predefinida,$isDeep,$deepLoadType,$clases);
								
				tipo_cuenta_predefinida_util::refrescarFKDescripciones($this->tipo_cuenta_predefinidas);
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
			
			foreach($this->tipo_cuenta_predefinidas as $tipo_cuenta_predefinida) {
				$this->deepLoad($tipo_cuenta_predefinida,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->tipo_cuenta_predefinida,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->tipo_cuenta_predefinidas as $tipo_cuenta_predefinida) {
				$this->deepSave($tipo_cuenta_predefinida,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->tipo_cuenta_predefinidas as $tipo_cuenta_predefinida) {
				$this->deepSave($tipo_cuenta_predefinida,$isDeep,$deepLoadType,$clases,false);
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
				
				$classes[]=new Classe(cuenta_predefinida::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas->clas==cuenta_predefinida::$class) {
						$classes[]=new Classe(cuenta_predefinida::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas->clas==cuenta_predefinida::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_predefinida::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function gettipo_cuenta_predefinida() : ?tipo_cuenta_predefinida {	
		/*
		tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToGet($this->tipo_cuenta_predefinida,$this->datosCliente);
		tipo_cuenta_predefinida_logic_add::updatetipo_cuenta_predefinidaToGet($this->tipo_cuenta_predefinida);
		*/
			
		return $this->tipo_cuenta_predefinida;
	}
		
	public function settipo_cuenta_predefinida(tipo_cuenta_predefinida $newtipo_cuenta_predefinida) {
		$this->tipo_cuenta_predefinida = $newtipo_cuenta_predefinida;
	}
	
	public function gettipo_cuenta_predefinidas() : array {		
		/*
		tipo_cuenta_predefinida_logic_add::checktipo_cuenta_predefinidaToGets($this->tipo_cuenta_predefinidas,$this->datosCliente);
		
		foreach ($this->tipo_cuenta_predefinidas as $tipo_cuenta_predefinidaLocal ) {
			tipo_cuenta_predefinida_logic_add::updatetipo_cuenta_predefinidaToGet($tipo_cuenta_predefinidaLocal);
		}
		*/
		
		return $this->tipo_cuenta_predefinidas;
	}
	
	public function settipo_cuenta_predefinidas(array $newtipo_cuenta_predefinidas) {
		$this->tipo_cuenta_predefinidas = $newtipo_cuenta_predefinidas;
	}
	
	public function gettipo_cuenta_predefinidaDataAccess() : tipo_cuenta_predefinida_data {
		return $this->tipo_cuenta_predefinidaDataAccess;
	}
	
	public function settipo_cuenta_predefinidaDataAccess(tipo_cuenta_predefinida_data $newtipo_cuenta_predefinidaDataAccess) {
		$this->tipo_cuenta_predefinidaDataAccess = $newtipo_cuenta_predefinidaDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        tipo_cuenta_predefinida_carga::$CONTROLLER;;        
		
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
